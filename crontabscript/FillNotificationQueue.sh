#!/bin/sh
#shell script that will run php script
#FillNotificationQueue.php

if ps -ef | grep -v grep | grep FillNotificationQueue.php ; then
       echo 'Cronjob FillNotificationQueue already running'
else
       echo 'Run Cronjob FillNotificationQueue'
#       php /opt/lampp/htdocs/mch-registry/crontabscript/FillNotificationQueue.php
fi

cd google_appengine

startDate=$(date +"%Y-%m-%d")
numDays=7

for i in `seq 1 $numDays`
do 
	useDate=`date +%Y-%m-%d -d "${startDate}-${i} days"`

	echo 'swisstphukraine' | python appcfg.py upload_data --config_file=bulkloader_reminders.yaml --filename=Reminders$useDate.csv --kind=Reminders --url=http://mch-registry.appspot.com/remote_api --email=mchregistry@gmail.com --passin

	echo 'swisstphukraine' | python appcfg.py upload_data --config_file=bulkloader_reminders.yaml --filename=RemindersHosp$useDate.csv --kind=Reminders --url=http://mch-registry.appspot.com/remote_api --email=mchregistry@gmail.com --passin

	echo 'swisstphukraine' | python appcfg.py upload_data --config_file=bulkloader_recommendations.yaml --filename=Recommendations$useDate.csv --kind=Recommendations --url=http://mch-registry.appspot.com/remote_api --email=mchregistry@gmail.com --passin

done

rm -f Reminders*.csv
rm -f RemindersHosp*.csv
rm -f Recommendations*.csv

exit 0