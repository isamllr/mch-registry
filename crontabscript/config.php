<?php
// Define the MySQL database parameters.
$DB_HOST = 'localhost'; // MySQL server hostname
$DB_PORT = '';      // MySQL server port number (default 3306)
$DB_NAME = 'registry';      // MySQL database name
$DB_USER = 'root';  // MySQL username
$DB_PASS = '';      // password

$USE_TIMEZONE = 'Europe/Kiev'; //Supported timezones: http://php.net/manual/en/timezones.php

//SMS PROVIDER SETTINGS
//---------------------
//BEGIN Clickatell Settings
$CLICKATELL_USER = 'swisstph';
$CLICKATELL_PASS = 'eBFSBRKUaKgXaP';
$CLICKATELL_HTTP_API = 3475961;
$CLICKATELL_SOAP_API = 3480882;
$CLICKATELL_XML_API = 3480883;
//Use Unicode for Cyrillic symbols. Length of Unicode SMS: 70 symbols/message. Multiple messages used: 63 symbols/message.
//Supported by Clickatell only
$USE_UNICODE = 1;
//Across how many messages a notification will be split at max. Notification will not be sent if more messages are needed (applicable for Clickatell)
//- use this to keep an eye on the budget. A Cyrillic notification usually requires about 3-5 SMS.
$DEFAULT_CONCAT_SMS = 10;
//END Clickatell Settings

//BEGIN ecall Settings
$ECALL_USER = 'FHNW';
$ECALL_PASS = '13480';
//END ecall

//How many days should old notifications be kept in the history?
$DAYS_TO_KEEP_HISTORY = 270;

//Configure language of notifications
//Affects the language in which the messages are generated from the back-end only.
//Does not affect the language in the front-end!
// - leave this to UK, even if you would like to use another language (feature open to extension)
$DEFAULT_LANGUAGE_FOR_NOTIFICATIONS = 'UK';

//DEFAULT NOTIFICATION SETTINGS
//Messages can be sent between 06:00 and 22:00 - if you define an earlier/later time, messages will not be sent
//Configuration applicable for all facilities/pregnancies/employees without specific notification settings
// If you turn off all messages by default, these settings won't be used at all
$DEFAULT_SUBSCRIBE_ON = 0;
$DEFAULT_SUBSCRIBE_TIME = '09:00:00'; //Between 06:00 and 22:00
$DEFAULT_SUBSCRIBE_DAYS_AFTER = 1;  //Should at least be 1

$DEFAULT_UNSUBSCRIBE_ON = 0;
$DEFAULT_UNSUBSCRIBE_TIME = '09:30:00'; //Between 06:00 and 22:00
$DEFAULT_UNSUBSCRIBE_DAYS_AFTER = 1;  //Should at least be 1

$DEFAULT_RECOMMENDATIONS_ON = 0;
$DEFAULT_RECOMMENDATIONS_ON_PREGNANCY_LEVEL = 0;
$DEFAULT_RECOMMENDATIONS_TIME = '10:00:00'; //Between 06:00 and 22:00

$DEFAULT_REMINDERS_ON = 0;
$DEFAULT_REMINDERS_ON_PREGNANCY_LEVEL = 0;
$DEFAULT_REMINDERS_DAYS_IN_ADVANCE = 2; //Should at least be 1
$DEFAULT_REMINDERS_TIME = '10:30:00'; //Between 06:00 and 22:00

$DEFAULT_HIGH_RISK_REMINDERS_ON = 0;
$DEFAULT_HIGH_RISK_REMINDERS_DAYS_IN_ADVANCE = 1; //Should at least be 1
$DEFAULT_HIGH_RISK_REMINDERS_TIME = '08:00:00'; //Between 06:00 and 22:00

$DEFAULT_HIGH_RISK_PREGNANCY_SUMMARY_ON = 0;
$DEFAULT_HIGH_RISK_PREGNANCY_SUMMARY_ON_EMPLOYEE_LEVEL = 0;
$DEFAULT_HIGH_RISK_PREGNANCY_SUMMARY_DAY_OF_MONTH = 28; //At least 1 and not higher than 28 (February)
$DEFAULT_HIGH_RISK_PREGNANCY_SUMMARY_TIME = '08:30:00'; //Between 06:00 and 22:00

$DEFAULT_PATIENT_DISCHARGED_REFERRAL_ON = 0;
$DEFAULT_PATIENT_DISCHARGED_REFERRAL_DAYS_AFTER = 1; //Should at least be 1
$DEFAULT_PATIENT_DISCHARGED_REFERRAL_TIME = '08:30:00'; //Between 06:00 and 22:00
?>