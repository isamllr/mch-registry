#!/bin/sh
#shell script that will run php script
#FillNotificationQueue.php
 
if ps -ef | grep -v grep | grep FillNotificationQueue.php ; then
       echo 'Cronjob FillNotificationQueue already running'
       exit 0
else
       echo 'Run Cronjob FillNotificationQueue'
       php FillNotificationQueue.php
       exit 0
fi