#!/bin/sh
#DirNameはLab3とかそんな感じ
mkdir working
DirName=$1
UserName=fukudato
source ./Credential.sh
if [ ${DirName} = "" ] ; then
    echo "You need specify Directory Name on '$1'"
    exit 1
fi
echo "First, doing event task..."
gulp  --dirname ../ --labdir ${DirName}
echo "Waiting for the reflect..."
sleep 3
echo "OK, Starting download..."
wget --no-check-certificate -q -e robots=off -r -l inf -A html --page-requisites --no-directories --directory-prefix=working/${DirName} -H -np -nc homepages.uc.edu/~${UserName}/${DirName}/index.html >/dev/null 2>&1
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