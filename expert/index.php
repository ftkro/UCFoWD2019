<?php
if ($_SERVER["HTTPS"] == "off" || empty($_SERVER["HTTPS"])) {
    //Unencrypted HTTP Detected so redirect to HTTPS website
    header("{$_SERVER["SERVER_PROTOCOL"]} 302 Found");
    header("Location: https://{$_SERVER["SERVER_NAME"]}{$_SERVER["REQUEST_URI"]}");
    exit;
} else {
    //HTTPS Detected so add HSTS for the safety
    header("Strict-Transport-Security: max-age=3600;");
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Takuro Fukuda's UC Website</title>
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="node_modules/reboot.css/dist/reboot.min.css">
</head>
<body class="top">
<div class="container">
    <div class="cover">
        <video src="static/files/bg.mov" poster="static/files/bg.png" playsinline autoplay loop muted></video>
        <div class="top-cover">
            <h1 class="center-title">Takuro Fukuda</h1>
            <a href="#main" class="center-title-link" data-scroll>▼</a>
        </div>
    </div>
    <div id="main" class="main">
        <h2>Under construction</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Est, ut dicis, inquam. At enim, qua in vita est aliquid mali, ea beata esse non potest.
            Aut haec tibi, Torquate, sunt vituperanda aut patrocinium voluptatis repudiandum.
            Cum autem venissemus in Academiae non sine causa nobilitata spatia, solitudo erat ea, quam volueramus.
            Verba tu fingas et ea dicas, quae non sentias?</p>
        <p>Praeterea et appetendi et refugiendi et omnino rerum gerendarum initia proficiscuntur aut a voluptate aut a
            dolore.
            Duo Reges: constructio interrete.
            Eaedem enim utilitates poterunt eas labefactare atque pervertere.
            Teneo, inquit, finem illi videri nihil dolere.
            Sunt autem, qui dicant foedus esse quoddam sapientium, ut ne minus amicos quam se ipsos diligant.
            Ut proverbia non nulla veriora sint quam vestra dogmata. Esse enim quam vellet iniquus iustus poterat
            inpune.
            Atqui reperies, inquit, in hoc quidem pertinacem;</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Est, ut dicis, inquam. At enim, qua in vita est aliquid mali, ea beata esse non potest.
            Aut haec tibi, Torquate, sunt vituperanda aut patrocinium voluptatis repudiandum.
            Cum autem venissemus in Academiae non sine causa nobilitata spatia, solitudo erat ea, quam volueramus.
            Verba tu fingas et ea dicas, quae non sentias?</p>
        <p>Praeterea et appetendi et refugiendi et omnino rerum gerendarum initia proficiscuntur aut a voluptate aut a
            dolore.
            Duo Reges: constructio interrete.
            Eaedem enim utilitates poterunt eas labefactare atque pervertere.
            Teneo, inquit, finem illi videri nihil dolere.
            Sunt autem, qui dicant foedus esse quoddam sapientium, ut ne minus amicos quam se ipsos diligant.
            Ut proverbia non nulla veriora sint quam vestra dogmata. Esse enim quam vellet iniquus iustus poterat
            inpune.
            Atqui reperies, inquit, in hoc quidem pertinacem;</p>
        <p>あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。</p>
        <p>あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。</p>
        <p>あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。</p>
        <p>あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Est, ut dicis, inquam. At enim, qua in vita est aliquid mali, ea beata esse non potest.
            Aut haec tibi, Torquate, sunt vituperanda aut patrocinium voluptatis repudiandum.
            Cum autem venissemus in Academiae non sine causa nobilitata spatia, solitudo erat ea, quam volueramus.
            Verba tu fingas et ea dicas, quae non sentias?</p>
        <p>Praeterea et appetendi et refugiendi et omnino rerum gerendarum initia proficiscuntur aut a voluptate aut a
            dolore.
            Duo Reges: constructio interrete.
            Eaedem enim utilitates poterunt eas labefactare atque pervertere.
            Teneo, inquit, finem illi videri nihil dolere.
            Sunt autem, qui dicant foedus esse quoddam sapientium, ut ne minus amicos quam se ipsos diligant.
            Ut proverbia non nulla veriora sint quam vestra dogmata. Esse enim quam vellet iniquus iustus poterat
            inpune.
            Atqui reperies, inquit, in hoc quidem pertinacem;</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Est, ut dicis, inquam. At enim, qua in vita est aliquid mali, ea beata esse non potest.
            Aut haec tibi, Torquate, sunt vituperanda aut patrocinium voluptatis repudiandum.
            Cum autem venissemus in Academiae non sine causa nobilitata spatia, solitudo erat ea, quam volueramus.
            Verba tu fingas et ea dicas, quae non sentias?</p>
        <p>Praeterea et appetendi et refugiendi et omnino rerum gerendarum initia proficiscuntur aut a voluptate aut a
            dolore.
            Duo Reges: constructio interrete.
            Eaedem enim utilitates poterunt eas labefactare atque pervertere.
            Teneo, inquit, finem illi videri nihil dolere.
            Sunt autem, qui dicant foedus esse quoddam sapientium, ut ne minus amicos quam se ipsos diligant.
            Ut proverbia non nulla veriora sint quam vestra dogmata. Esse enim quam vellet iniquus iustus poterat
            inpune.
            Atqui reperies, inquit, in hoc quidem pertinacem;</p>
        <p>あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。</p>
        <p>あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。</p>
        <p>あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。</p>
        <p>あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Est, ut dicis, inquam. At enim, qua in vita est aliquid mali, ea beata esse non potest.
            Aut haec tibi, Torquate, sunt vituperanda aut patrocinium voluptatis repudiandum.
            Cum autem venissemus in Academiae non sine causa nobilitata spatia, solitudo erat ea, quam volueramus.
            Verba tu fingas et ea dicas, quae non sentias?</p>
        <p>Praeterea et appetendi et refugiendi et omnino rerum gerendarum initia proficiscuntur aut a voluptate aut a
            dolore.
            Duo Reges: constructio interrete.
            Eaedem enim utilitates poterunt eas labefactare atque pervertere.
            Teneo, inquit, finem illi videri nihil dolere.
            Sunt autem, qui dicant foedus esse quoddam sapientium, ut ne minus amicos quam se ipsos diligant.
            Ut proverbia non nulla veriora sint quam vestra dogmata. Esse enim quam vellet iniquus iustus poterat
            inpune.
            Atqui reperies, inquit, in hoc quidem pertinacem;</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Est, ut dicis, inquam. At enim, qua in vita est aliquid mali, ea beata esse non potest.
            Aut haec tibi, Torquate, sunt vituperanda aut patrocinium voluptatis repudiandum.
            Cum autem venissemus in Academiae non sine causa nobilitata spatia, solitudo erat ea, quam volueramus.
            Verba tu fingas et ea dicas, quae non sentias?</p>
        <p>Praeterea et appetendi et refugiendi et omnino rerum gerendarum initia proficiscuntur aut a voluptate aut a
            dolore.
            Duo Reges: constructio interrete.
            Eaedem enim utilitates poterunt eas labefactare atque pervertere.
            Teneo, inquit, finem illi videri nihil dolere.
            Sunt autem, qui dicant foedus esse quoddam sapientium, ut ne minus amicos quam se ipsos diligant.
            Ut proverbia non nulla veriora sint quam vestra dogmata. Esse enim quam vellet iniquus iustus poterat
            inpune.
            Atqui reperies, inquit, in hoc quidem pertinacem;</p>
        <p>あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。</p>
        <p>あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。</p>
        <p>あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。</p>
        <p>あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Est, ut dicis, inquam. At enim, qua in vita est aliquid mali, ea beata esse non potest.
            Aut haec tibi, Torquate, sunt vituperanda aut patrocinium voluptatis repudiandum.
            Cum autem venissemus in Academiae non sine causa nobilitata spatia, solitudo erat ea, quam volueramus.
            Verba tu fingas et ea dicas, quae non sentias?</p>
        <p>Praeterea et appetendi et refugiendi et omnino rerum gerendarum initia proficiscuntur aut a voluptate aut a
            dolore.
            Duo Reges: constructio interrete.
            Eaedem enim utilitates poterunt eas labefactare atque pervertere.
            Teneo, inquit, finem illi videri nihil dolere.
            Sunt autem, qui dicant foedus esse quoddam sapientium, ut ne minus amicos quam se ipsos diligant.
            Ut proverbia non nulla veriora sint quam vestra dogmata. Esse enim quam vellet iniquus iustus poterat
            inpune.
            Atqui reperies, inquit, in hoc quidem pertinacem;</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Est, ut dicis, inquam. At enim, qua in vita est aliquid mali, ea beata esse non potest.
            Aut haec tibi, Torquate, sunt vituperanda aut patrocinium voluptatis repudiandum.
            Cum autem venissemus in Academiae non sine causa nobilitata spatia, solitudo erat ea, quam volueramus.
            Verba tu fingas et ea dicas, quae non sentias?</p>
        <p>Praeterea et appetendi et refugiendi et omnino rerum gerendarum initia proficiscuntur aut a voluptate aut a
            dolore.
            Duo Reges: constructio interrete.
            Eaedem enim utilitates poterunt eas labefactare atque pervertere.
            Teneo, inquit, finem illi videri nihil dolere.
            Sunt autem, qui dicant foedus esse quoddam sapientium, ut ne minus amicos quam se ipsos diligant.
            Ut proverbia non nulla veriora sint quam vestra dogmata. Esse enim quam vellet iniquus iustus poterat
            inpune.
            Atqui reperies, inquit, in hoc quidem pertinacem;</p>
        <p>あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。</p>
        <p>あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。</p>
        <p>あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。</p>
        <p>あのイーハトーヴォのすきとおった風、夏でも底に冷たさをもつ青いそら、うつくしい森で飾られたモリーオ市、郊外のぎらぎらひかる草の波。</p>
    </div>
</div>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/jquery-smooth-scroll/jquery.smooth-scroll.min.js"></script>
</body>
</html>