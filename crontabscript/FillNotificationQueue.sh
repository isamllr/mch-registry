#!/bin/sh
#shell script that will run php script
#FillNotificationQueue.php
export TZ="/usr/share/zoneinfo/Europe/Kiev"
now=$(date +"%Y-%m-%d")
adayago="$(date -d '1 day ago' +"%Y-%m-%d")"

#rm -f Reminders*.csv
#rm -f RemindersHosp*.csv
#rm -f Recommendations*.csv

if ps -ef | grep -v grep | grep FillNotificationQueue.php ; then
       echo 'Cronjob FillNotificationQueue already running'
else
       echo 'Run Cronjob FillNotificationQueue'
#       php /opt/lampp/htdocs/mch-registry/crontabscript/FillNotificationQueue.php
fi

#TODO: do for all 7 days, if not exists....
cd google_appengine
echo 'swisstphukraine' | python appcfg.py upload_data --config_file=bulkloader_reminders.yaml --filename=Reminders$now.csv --kind=Reminders --url=http://mch-registry.appspot.com/remote_api --email=mchregistry@gmail.com

echo 'swisstphukraine' | python appcfg.py upload_data --config_file=bulkloader_reminders.yaml --filename=RemindersHosp$now.csv --kind=Reminders --url=http://mch-registry.appspot.com/remote_api --email=mchregistry@gmail.com

echo 'swisstphukraine' | python appcfg.py upload_data --config_file=bulkloader_recommendations.yaml --filename=Recommendations$now.csv --kind=Recommendations --url=http://mch-registry.appspot.com/remote_api --email=mchregistry@gmail.com

exit 0
