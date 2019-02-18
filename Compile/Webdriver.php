<?php
/**
 * Created by IntelliJ IDEA.
 * User: takurof
 * Date: 2019-02-17
 * Time: 18:40
 */
require_once './vendor/autoload.php';

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;

require_once __DIR__ . '/Credential.php';

class ScreenShot
{
    //コア
    private $CSSList, $LinkList, $Driver, $Target;

    public function __construct()
    {
        global $argv;
        $this->Target = "http://homepages.uc.edu/~fukudato/${argv[1]}/index.html";
        $options = new ChromeOptions();
        $options->addArguments(array(
            '--headless',
            '--user-agent="ScreenShotTaker/1.0 (Selenium/Chrome); You can always contact me by mail to tea_hugutaku at yahoo.co.jp"',
        ));
        $capabilities = DesiredCapabilities::chrome();
        $capabilities->setCapability(ChromeOptions::CAPABILITY, $options);
        $this->Driver = RemoteWebDriver::create(SELENIUM_HOST, $capabilities);
        $this->Driver->manage()->window()->maximize();
        $this->Driver->get($this->Target);
    }

    public function __destruct()
    {
        sleep(1);
        $this->Driver->close();
        $this->Driver->quit();
    }

    public function Start_Take()
    {
        $this->LinkCorrector();
        $this->ScreenShot_Engine();
        $text = $this->Generate_Result();
        $this->UploadToBb($text);
    }

    private function LinkCorrector()
    {
        foreach ($this->Driver->findElements(WebDriverBy::cssSelector("a")) as $No => $Links) {
            //とりま今はシンプルな構造だからこれでいける
            if (false !== filter_var($Links->getAttribute("href"), FILTER_VALIDATE_URL)
                && preg_match('@^https?+://@i', $Links->getAttribute("href"))) {
                $handle = curl_init($Links->getAttribute("href"));
                curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
                /* Get the HTML or whatever is linked in $url. */
                curl_exec($handle);
                $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                if ($httpCode == 200) {
                    $this->LinkList[] = $Links->getAttribute("href");
                }

                curl_close($handle);
            }
        }
        foreach ($this->Driver->findElements(WebDriverBy::cssSelector("link")) as $No => $Links) {
            //とりま今はシンプルな構造だからこれでいける
            if ($Links->getAttribute("rel") == "stylesheet") {
                $this->CSSList[] = $Links->getAttribute("href");
            }
        }
    }

    private function ScreenShot_Engine()
    {
        global $argv;
        if (count($this->LinkList) > 0) {
            foreach ($this->LinkList as $Link) {
                $this->Driver->get(W3C_VALIDATOR);
                try {
                    $this->Driver->wait()->until(
                        WebDriverExpectedCondition::titleIs("Ready to check - Nu Html Checker")
                    );
                } catch (\Exception $e) {
                    die("Error!");
                }
                $this->Driver->findElement(WebDriverBy::cssSelector("#doc"))->sendKeys("$Link");
                $this->Driver->findElement(WebDriverBy::cssSelector("#submit"))->click();
                //成功しているかチェック
                if ($this->Driver->findElement(WebDriverBy::xpath("//*[@id=\"results\"]/p[1]"))
                        ->getAttribute("class") != "success") {
                    die("Validation Failed on: $Link. Please visit W3C HTML Validator for the details. Exiting.");
                }
                $this->Driver->takeScreenshot("working/HTML-${argv[1]}-" . basename($Link, ".html") . ".png");
            }
        }
        if (count($this->CSSList) > 0) {
            foreach ($this->CSSList as $Link) {
                $this->Driver->get(CSS_VALIDATOR);
                try {
                    $this->Driver->wait()->until(
                        WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::xpath("//*[@id=\"validate-by-uri\"]/form/p[3]/label/a"))
                    );
                } catch (\Exception $e) {
                    die("Error!");
                }
                $this->Driver->findElement(WebDriverBy::cssSelector("#uri"))->sendKeys("$Link");
                $this->Driver->findElement(WebDriverBy::xpath("//*[@id=\"validate-by-uri\"]/form/p[3]/label/a"))->click();
                if (count($this->Driver->findElements(WebDriverBy::id("congrats"))) === 0) {
                    die("Validation Failed on: $Link. Please visit W3C CSS Validator for the details. Exiting.");
                }
                $this->Driver->takeScreenshot("working/CSS-${argv[1]}-" . basename($Link, ".css") . ".png");
            }
        }
    }

    private function Generate_Result()
    {
        global $argv;
        $text = null;
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $phpWord->getCompatibility()->setOoxmlVersion(15);
        $section = $phpWord->addSection();
        if (count($this->CSSList) > 0) {
            foreach ($this->LinkList as $item) {
                $text .= $item . "\n";
                $section->addImage(realpath(__DIR__ . "/working/HTML-${argv[1]}-" . basename($item, ".html") . ".png"), array('width' => 450, 'height' => 338, 'align' => 'center'));
            }
        }
        if (count($this->CSSList) > 0) {
            foreach ($this->CSSList as $item) {
                $section->addImage(realpath(__DIR__ . "/working/CSS-${argv[1]}-" . basename($item, ".css") . ".png"), array('width' => 450, 'height' => 338, 'align' => 'center'));
            }
        }
        file_put_contents(__DIR__ . '/working/SiteList.txt', $text);
        try {
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
            $objWriter->save("working/${argv[1]}.docx");
        } catch (\Exception $e) {
            die("Error! Word");
        }
        return $text;
    }

    //メイン

    private function UploadToBb($text)
    {
        global $argv;
        $this->Driver->get(BB_LOGIN);
        $this->Driver->findElement(WebDriverBy::xpath("//*[@id=\"user_id\"]"))->sendKeys(UC_UName);
        $this->Driver->findElement(WebDriverBy::xpath("//*[@id=\"password\"]"))->sendKeys(UC_PWD);
        $this->Driver->findElement(WebDriverBy::xpath("//*[@id=\"entry-login\"]"))->click();
        $this->Driver->get(BB_TARGET);
        foreach ($this->Driver->findElements(WebDriverBy::cssSelector("h3 a span")) as $Assignment) {
            $AssignmentName = preg_replace('/[^0-9]/', '', $Assignment->getText());
            $LabName = preg_replace('/[^0-9]/', '', $argv[1]);
            if ($AssignmentName == $LabName and strpos($Assignment->getText(), 'Lab') !== false) {
                $Assignment = $Assignment->findElement(WebDriverBy::xpath(".."));
                $this->Driver->get($Assignment->getAttribute("href") . "&action=newAttempt");
                break;
            }
        }
        //正直使える自信ない、あとで試してみる
        $Files = __DIR__ . "/working/${argv[1]}.docx" . "\n" . __DIR__ . "/working/${argv[1]}.zip";
        $this->Driver->executeScript("document.getElementById(\"submissionLink\").click();");
        $this->Driver->findElement(WebDriverBy::xpath("//*[@id=\"studentSubmission.text\"]"))->sendKeys($text);
        $this->Driver->findElement(WebDriverBy::xpath("//*[@id=\"newFile_chooseLocalFile\"]"))->getLocationOnScreenOnceScrolledIntoView();
        $this->Driver->findElement(WebDriverBy::xpath("//*[@id=\"newFile_chooseLocalFile\"]"))->sendKeys($Files);
        $this->Driver->executeScript("document.getElementsByName(\"bottom_Submit\")[0].click();");
    }
}

$Boot = new ScreenShot();
$Boot->Start_Take();