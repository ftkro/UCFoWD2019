#!/bin/sh
mkdir working
DirName=$1
source ./Credential.sh
if [ ${DirName} = "" ] ; then
    echo "You need specify Directory Name on '$1'"
    exit 1
fi
echo "OK, Starting download..."
wget -q -e robots=off -r -l inf -A html --page-requisites --no-directories --directory-prefix=working/${DirName} -H -np -nc homepages.uc.edu/~${UserName}/${DirName}/index.html >/dev/null 2>&1
echo "Zipping and cleaning files..."
cd working
zip -q -r ${DirName}.zip ${DirName}
rm -r ${DirName}
cd ../
echo "Validating Website and Submitting to Blackboard..."
php Webdriver.php ${DirName}
rm -r working/
echo "Well done."
exit 0