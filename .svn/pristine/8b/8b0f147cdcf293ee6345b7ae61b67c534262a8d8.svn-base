#!/bin/sh
#shell script that will run php script
#SendSms.php
 
if ps -ef | grep -v grep | grep SendSms.php ; then
       echo 'Cronjob SendSms already running'
       exit 0
else
       echo 'Run Cronjob SendSms'
       php /opt/lampp/htdocs/mch-registry/crontabscript/SendSms.php
       exit 0
fi
