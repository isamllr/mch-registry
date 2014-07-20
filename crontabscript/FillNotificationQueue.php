<?php
header ( 'Content-Type: text/html; charset=utf-8' );
require_once 'config.php';
date_default_timezone_set($GLOBALS ['USE_TIMEZONE']);

class FillNotificationQueue {
	
	public function __construct() {
	}

	public function fillQueue(){		
	
		try {
			// Create a PDO database connection
			$dbConn = new PDO("mysql:host=".$GLOBALS['DB_HOST'].";port=".$GLOBALS['DB_PORT'].";dbname=".$GLOBALS['DB_NAME']."", $GLOBALS['DB_USER'], $GLOBALS['DB_PASS'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exception
		
			// Run SQL statements	
			
			//Get notification type names
			$sth = $dbConn->prepare("SELECT NotificationTypeID, TypeName FROM notificationtype ORDER BY NotificationTypeID ASC;");
			$sth->execute();
			$notificationTypeName = $sth->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_GROUP); //maps IDs	as keys of the array
			//Strip unneeded dimensions from returned array
			$notificationTypeName = array_map('reset', $notificationTypeName);
			$notificationTypeName = array_map('reset', $notificationTypeName);
			$sth->closeCursor();
			
			//Get Last successful run date for each notification type
			$sth = $dbConn->prepare("SELECT NotificationqueuelastfillID, lastFillDate FROM notificationqueuelastfill ORDER BY NotificationTypeID ASC;");
			$sth->execute();
			$fillDate = $sth->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_GROUP); //maps IDs	as keys of the array			
			//Strip unneeded dimensions from returned array
			$fillDate = array_map('reset', $fillDate);
			$fillDate = array_map('reset', $fillDate);
			$sth->closeCursor();
			
			$currentFillDate = array();
			$currentFillDate = $fillDate;
			$loc = 0;
			
			//Calculate new fill date based on last fill date from database
			foreach($fillDate as $value){			
				$loc++;
				$isDate = DateTime::createFromFormat('Y-m-d', $value); //converts to false if format is not matching
				if(empty($value) || !isset($value) || !$isDate){	//various checks for null for compatibility reasons
					//Queue has never been filled before, fill now
					$currentFillDate[$loc] =  new datetime(date('Y-m-d'));			
				}
				else{
					$valueDate = new datetime($value);
					$todayDate = new datetime(date('Y-m-d'));
					$intDiffDays = $valueDate->diff($todayDate)->format('%R%a');
					
					if($intDiffDays > 7){
						//Last filling too far in the past, generating notifications from last 7 days
						//First fill day is 6 days back
						$todayDate = new datetime(date('Y-m-d'));
						$currentFillDate[$loc] =  $todayDate->sub(new DateInterval( "P6D" ));
					}
					else if($intDiffDays <= 7 && $intDiffDays > 0){
						//Retrospective filling applicable
						//First fill day is 1 day after that date
						$valueDate = new datetime($value);
						$currentFillDate[$loc] = $valueDate->add(new DateInterval( "P1D" ));
					}
					else if($intDiffDays == 0){
						//Filling already completed today, do not fill, set fill date to max date
						$currentFillDate[$loc] =  new datetime(date('2038-01-19'));
					}
					else{
						//Not applicable, do not fill, set fill date to max date
						$currentFillDate[$loc] =  new datetime(date('2038-01-19'));
					}
				}						
			}				
			
			gc_enable(); // Enable Garbage Collector
			$tempDate = new datetime(date('Y-m-d'));
			$todayDate = $tempDate->format('Y-m-d');
			
			//Fill queue for each type
			for ($i = 1; $i <= 7; $i++) {	
				$catchedError = false;	
				try{
					for($currentDate = $currentFillDate[$i]; $this->getNrOfDaysUntilToday($currentDate) <= 0; $currentDate = $currentDate->add(new DateInterval( "P1D" ))){
						
						$rowCount = 0; $rowCountVisit = 0;					
						$sth = $dbConn->prepare($this->getStatement($i, $currentDate->format('Y-m-d')));
						$sth->execute();
						$sth->closeCursor();						
						
						//Get number of created notifications
						$nrOfNotifications = $dbConn->query("select @nrOfNotifications")->fetch(PDO::FETCH_ASSOC);					
						$rowCount = $nrOfNotifications["@nrOfNotifications"];
						
						if($i==2){//Second visit type notification						
							$sth = $dbConn->prepare($this->getStatement(0, $currentDate->format('Y-m-d')));
							$sth->execute();
							$sth->closeCursor();						
							
							//Get number of created notifications
							$nrOfNotificationsVisit = $dbConn->query("select @nrOfNotifications")->fetch(PDO::FETCH_ASSOC);					
							$rowCountVisit = $nrOfNotificationsVisit["@nrOfNotifications"];
							$rowCount = $rowCount + $rowCountVisit;						
						}
						
						//Prepare log message
						$retro = "";
						if($currentDate<(new datetime(date('Y-m-d')))){$retro = ' Retrospective filling for ' .$currentDate->format('Y-m-d').'. ';}
						echo date("Y-m-d H:i:s").' Notification Queue filled with ' .$rowCount. ' '.$notificationTypeName[$i].' notification(s). ' . $retro . '<br \>'."\n";
					}
				}catch(Exception $e){
					$catchedError = true;
					echo date("Y-m-d H:i:s") . ' Caught exception while filling '.$notificationTypeName[$i].' notification into queue. Message: ',  $e->getMessage(), '<br \>'."\n";
				}				
				if(!$catchedError){$dbConn->exec("UPDATE notificationqueuelastfill SET lastFillDate = '" . $todayDate . "' WHERE NotificationTypeID=".$i.";");}				
			}		
			
			//Move expired messages to the Notification Queue History
			$rowCount = $dbConn->exec("
				REPLACE INTO notificationqueuehistory
				SELECT NotificationQueueID,
					MobilePhone,
					NotificationText,
					DateTimeToSend,
					0 as SucessfullySent,
					NULL as DateTimeSent
				FROM notificationqueue
				WHERE DATE(LatestBy) < '" . $todayDate . "';
		   ");
			echo date("Y-m-d H:i:s") , ' Moved ', $rowCount, ' expired message(s) to the  Notification Queue History.<br \>'."\n";
			
			//Delete expired messages from Notification Queue after moving
			$rowCount = $dbConn->exec("
				DELETE FROM notificationqueue WHERE DATE(LatestBy) < '" . $todayDate . "';
		   ");
			//echo date("Y-m-d H:i:s") , ' Deleted ', $rowCount, ' expired message(s) from the Notification Queue after moving them to the  Notification Queue History.<br \>'."\n";
		
			//Clean Notification Queue History
			$rowCount = $dbConn->exec("
				DELETE FROM notificationqueuehistory
				WHERE DATEDIFF(DateTimeToSend, '" . $todayDate . "') >". $GLOBALS['DAYS_TO_KEEP_HISTORY'] .";
		   ");
			echo date("Y-m-d H:i:s") , ' Removed ', $rowCount, ' message(s) older than '. $GLOBALS['DAYS_TO_KEEP_HISTORY'] .' days from the Notification Queue History.<br \>'."\n";
		
			//Close the database connection
			$dbConn = NULL;			
			
			// Disable Garbage Collector
			gc_disable(); 
		
		} catch (PDOException $e) {
			$fileName = basename($e->getFile(), ".php"); //Filename that triggers the exception
			$lineNumber = $e->getLine();         //Line number that triggers the exception
			die(date("Y-m-d H:i:s") . " [$fileName][$lineNumber] Database error: " . $e->getMessage());
		}
		
	}
	
	
	private function getStatement($notificationTypeID, $currentDate){
		switch ($notificationTypeID) {
			case 1:
				return "CALL fillRecommendationNotificationForPatients('". $GLOBALS ['USE_MYSQL_TIMEZONE'] ."', '" . $currentDate . "', '". $GLOBALS['DEFAULT_LANGUAGE_FOR_NOTIFICATIONS'] ."', '". $GLOBALS['DEFAULT_RECOMMENDATIONS_TIME'] ."', " . $GLOBALS['DEFAULT_RECOMMENDATIONS_ON'] . ", " . $GLOBALS['DEFAULT_RECOMMENDATIONS_ON_PREGNANCY_LEVEL'] . ", '" . quotemeta(quotemeta($GLOBALS['FOLDER_PATH'] . "Recommendations" . $currentDate . ".csv")) . "', @nrOfNotifications);";
			case 2:
				return "CALL fillVisitReminderNotificationForPatients('". $GLOBALS ['USE_MYSQL_TIMEZONE'] ."', '" . $currentDate."', '". $GLOBALS['DEFAULT_LANGUAGE_FOR_NOTIFICATIONS'] ."', ". $GLOBALS['DEFAULT_REMINDERS_DAYS_IN_ADVANCE'] .", '". $GLOBALS['DEFAULT_REMINDERS_TIME'] ."', " . $GLOBALS['DEFAULT_REMINDERS_ON'] . ", " . $GLOBALS['DEFAULT_REMINDERS_ON_PREGNANCY_LEVEL'] . ", '" . quotemeta(quotemeta($GLOBALS['FOLDER_PATH'] . "Reminders" . $currentDate . ".csv")) . "', @nrOfNotifications);";
			case 3:
				return "CALL fillHighRiskVisitReminderNotificationForDoctors('". $GLOBALS ['USE_MYSQL_TIMEZONE'] ."', '" . $currentDate."', '". $GLOBALS['DEFAULT_LANGUAGE_FOR_NOTIFICATIONS'] ."', ". $GLOBALS['DEFAULT_HIGH_RISK_REMINDERS_DAYS_IN_ADVANCE'] .", '". $GLOBALS['DEFAULT_HIGH_RISK_REMINDERS_TIME'] ."', " . $GLOBALS['DEFAULT_HIGH_RISK_REMINDERS_ON'] . ", @nrOfNotifications);";
			case 4:
				return "CALL fillHighRiskPregnancySummaryNotificationForOblastUsers('". $GLOBALS ['USE_MYSQL_TIMEZONE'] ."', '" . $currentDate."', '". $GLOBALS['DEFAULT_LANGUAGE_FOR_NOTIFICATIONS'] ."', ". $GLOBALS['DEFAULT_HIGH_RISK_PREGNANCY_SUMMARY_DAY_OF_MONTH'] .", '" . $GLOBALS['DEFAULT_HIGH_RISK_PREGNANCY_SUMMARY_TIME'] .  "', ". $GLOBALS['DEFAULT_HIGH_RISK_PREGNANCY_SUMMARY_ON'] .", ". $GLOBALS['DEFAULT_HIGH_RISK_PREGNANCY_SUMMARY_ON_EMPLOYEE_LEVEL'] .", @nrOfNotifications);";
			case 5:
				return "CALL fillPatientDischargedFromHospitalisationNotificationToDoctors('". $GLOBALS ['USE_MYSQL_TIMEZONE'] ."', '" . $currentDate."', '". $GLOBALS['DEFAULT_LANGUAGE_FOR_NOTIFICATIONS'] ."', ". $GLOBALS['DEFAULT_PATIENT_DISCHARGED_REFERRAL_DAYS_AFTER'] .", '". $GLOBALS['DEFAULT_PATIENT_DISCHARGED_REFERRAL_TIME'] ."', " . $GLOBALS['DEFAULT_PATIENT_DISCHARGED_REFERRAL_ON'] .", @nrOfNotifications);";
			case 6:
				return "CALL fillSubscribeToPatients('". $GLOBALS ['USE_MYSQL_TIMEZONE'] ."', '" . $currentDate."', '". $GLOBALS['DEFAULT_LANGUAGE_FOR_NOTIFICATIONS'] ."', ". $GLOBALS['DEFAULT_SUBSCRIBE_DAYS_AFTER'] .", '". $GLOBALS['DEFAULT_SUBSCRIBE_TIME'] ."', " . $GLOBALS['DEFAULT_SUBSCRIBE_ON'] . ", " . $GLOBALS['DEFAULT_REMINDERS_ON_PREGNANCY_LEVEL'] . ", " . $GLOBALS['DEFAULT_RECOMMENDATIONS_ON_PREGNANCY_LEVEL'] . ", @nrOfNotifications);";
			case 7:
				return "CALL fillUnsubscribeToPatients('". $GLOBALS ['USE_MYSQL_TIMEZONE'] ."', '" . $currentDate."', '". $GLOBALS['DEFAULT_LANGUAGE_FOR_NOTIFICATIONS'] ."', ". $GLOBALS['DEFAULT_UNSUBSCRIBE_DAYS_AFTER'] .", '". $GLOBALS['DEFAULT_UNSUBSCRIBE_TIME'] ."', " . $GLOBALS['DEFAULT_UNSUBSCRIBE_ON'] . ", " . $GLOBALS['DEFAULT_REMINDERS_ON_PREGNANCY_LEVEL'] . ", " . $GLOBALS['DEFAULT_RECOMMENDATIONS_ON_PREGNANCY_LEVEL'] . ", @nrOfNotifications);";
			case 0:
				return "CALL fillVisitReminderHospitalisationNotificationForPatients('". $GLOBALS ['USE_MYSQL_TIMEZONE'] ."', '" . $currentDate."', '". $GLOBALS['DEFAULT_LANGUAGE_FOR_NOTIFICATIONS'] ."', ". $GLOBALS['DEFAULT_REMINDERS_DAYS_IN_ADVANCE'] .", '". $GLOBALS['DEFAULT_REMINDERS_TIME'] ."', " . $GLOBALS['DEFAULT_REMINDERS_ON'] . ", " . $GLOBALS['DEFAULT_REMINDERS_ON_PREGNANCY_LEVEL'] . ", '" . quotemeta(quotemeta($GLOBALS['FOLDER_PATH'] . "RemindersHosp" . $currentDate . ".csv")) . "', @nrOfNotifications);";
			default:
				throw (new Exception('Notification Type ' . $notificationTypeID . ' unknown. <br>' ."\n"));
				break;
		}
	}
	
	private function getNrOfDaysUntilToday($fillDate){
		$todayDate = new datetime(date('Y-m-d'));
		$days = $todayDate->diff($fillDate);
		return (int)$days->format('%R%a');
	}				
}

$myFillNotificationQueue = new FillNotificationQueue();
$myFillNotificationQueue->fillQueue();

?>