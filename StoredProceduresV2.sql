CREATE DATABASE  IF NOT EXISTS `registry` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `registry`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: registry
-- ------------------------------------------------------
-- Server version	5.6.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping events for database 'registry'
--

--
-- Dumping routines for database 'registry'
--
/*!50003 DROP FUNCTION IF EXISTS `HighRiskPregnancySummary` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `HighRiskPregnancySummary`(nLoginID INT(10)) RETURNS varchar(2500) CHARSET utf8 COLLATE utf8_bin
BEGIN

RETURN (
SELECT 
    group_concat(report.reportrow
        separator ', ')
FROM
    (SELECT 
        concat_ws(': ', f.facilityname, COUNT(*)) as reportrow
    FROM pregnancy p
			JOIN 
			(SELECT vi.FacilityID, vt.PregnancyID, vi.RiskGroup, vt.NextVisit FROM 
				(SELECT pregnancyID, MAX(NextVisit) as NextVisit 
				FROM visit 
				GROUP BY PregnancyID) vt 
		JOIN visit vi on vt.pregnancyid = vi.PregnancyID 
		WHERE vt.NextVisit = vi.NextVisit
		AND vi.RiskGroup=1
		GROUP BY NextVisit) v
	ON v.PregnancyID = p.pregnancyID
    JOIN facilities f ON f.FacilityID = v.FacilityID
	JOIN patient pat on pat.PatientID = p.PatientID
	LEFT JOIN delivery d ON p.PregnancyID = d.PregnancyID
    WHERE
			v.RiskGroup =1
			AND DATEDIFF(DATE_ADD(p.Calc_DeliveryDate, INTERVAL 31 DAY), NOW()) > 0
			AND pat.Discharged = 0
			AND d.DeliveryID IS NULL
            AND f.FacilityID IN (SELECT f.FacilityID
            FROM ((districts
            INNER JOIN province ON districts.ProvinceID = province.ProvinceID)
            INNER JOIN facilities f ON f.DistrictID = districts.DistrictID)
            INNER JOIN countries c ON province.CountryID = c.CountryID
            WHERE
                province.ProvinceID = (SELECT 
                        province.ProvinceID
                    FROM
                        ((districts
                    INNER JOIN province ON districts.ProvinceID = province.ProvinceID)
                    INNER JOIN facilities f ON f.DistrictID = districts.DistrictID)
                    INNER JOIN countries c ON province.CountryID = c.CountryID
                    WHERE
                        f.facilityID = (SELECT 
                                loc.facilityID
                            FROM
                                login l
                            JOIN employees e ON e.LoginID = l.LoginID
                            JOIN location loc ON loc.LocationID = e.LocationID
                            WHERE
                                l.GroupID = 2 AND l.LoginID = nLoginID)))
    GROUP BY f.FacilityID) report);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fillHighRiskPregnancySummaryNotificationForOblastUsers` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fillHighRiskPregnancySummaryNotificationForOblastUsers`(IN nCurrentDate varchar(10), nLanguageCode varchar(2), nDayOfMonth INT(10), nDefaultTime varchar(8), nDefaultON TINYINT(1), nDefaultEmployeeLevelON TINYINT(1), OUT nrOfNotifications INT(10))
BEGIN

CREATE TEMPORARY TABLE IF NOT EXISTS `tempQueueHRO` (
  `MobilePhone` varchar(13) COLLATE utf8_bin NOT NULL,
  `NotificationText` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `DateTimeToSend` datetime DEFAULT NULL,
  `LatestBy` date DEFAULT NULL,
   HighRiskPregnancySummary varchar(2500),
   doctorName varchar(250)
);

INSERT INTO tempQueueHRO
SELECT
					e.HandPhone as MobilePhone,
					(SELECT nt.text FROM notification n JOIN notificationtext nt on nt.NotificationID = n.NotificationID WHERE n.NotificationTypeID=4 AND nt.LanguageCode=nLanguageCode) as NotificationText,
					TIMESTAMP(nCurrentDate, IFNULL((SELECT nc.TimeToSend
												FROM notificationconfiguration nc
												WHERE nc.NotificationTypeID=4
												AND nc.FacilityID=loc.FacilityID), nDefaultTime)) as DateTimeToSend,
					TIMESTAMP(DATE_ADD(nCurrentDate, INTERVAL 7 DAY), IFNULL((SELECT nc.TimeToSend
												FROM notificationconfiguration nc
												WHERE nc.NotificationTypeID=4
												AND nc.FacilityID=loc.FacilityID), nDefaultTime)) as LatestBy,
					
					HighRiskPregnancySummary(l.LoginID) as HighRiskPregnancySummary,											
					CONCAT_WS(' ', e.Firstname,  IFNULL(e.Lastname, 'лікар')) as doctorName

					FROM login l
					JOIN employees e ON e.LoginID = l.LoginID
					JOIN location loc ON loc.LocationID = e.LocationID
					WHERE l.GroupID = 2
					AND IFNULL(e.HighRiskPregnanciesSummaryNotification, nDefaultEmployeeLevelON) = 1
					AND IFNULL((SELECT nc.Enabled FROM notificationconfiguration nc WHERE nc.NotificationTypeID=4 AND nc.FacilityID=loc.FacilityID), nDefaultON)=1
					AND IFNULL((SELECT nc.DaysBeforeOrAfter FROM notificationconfiguration nc WHERE nc.NotificationTypeID=4 AND nc.FacilityID=loc.FacilityID), nDayOfMonth) = DAYOFMONTH(nCurrentDate)
					AND HighRiskPregnancySummary(l.LoginID) IS NOT NULL;
	

INSERT IGNORE INTO notificationqueue
SELECT
	NULL as NotificationQueueID, 
	MobilePhone, 
	REPLACE(	
		REPLACE(
			REPLACE(
				REPLACE(
					REPLACE(
						REPLACE(NotificationText, '[visitdate]', ''), 
					'[facilityname]', ''), 
				'[patientname]', ''),
			'[reportdate]', DATE_FORMAT(CURDATE(),'%d.%m.%Y')),
		'[report]', HighRiskPregnancySummary),
	'[doctorname]', doctorName) as NotificationText, 
	DateTimeToSend, 
	LatestBy,
	4 as NotificationTypeID,
	0 as MobileApp
	FROM
	tempQueueHRO;

SELECT (SELECT Count(LatestBy) FROM tempQueueHRO) INTO nrOfNotifications;
DROP TABLE tempQueueHRO;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fillHighRiskVisitReminderNotificationForDoctors` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fillHighRiskVisitReminderNotificationForDoctors`(IN nCurrentDate varchar(10), nLanguageCode varchar(2), nDaysInAdvance INT(2), nDefaultTime varchar(8), nDefaultON TINYINT(1), OUT nrOfNotifications INT(10))
BEGIN


CREATE TEMPORARY TABLE IF NOT EXISTS `tempQueueD` (
  `MobilePhone` varchar(13) COLLATE utf8_bin NOT NULL,
  `NotificationText` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `DateTimeToSend` datetime DEFAULT NULL,
  `LatestBy` date DEFAULT NULL,
   visitDate varchar(10),
   facilityName varchar(250),
   doctorName varchar(250),
   patientName varchar(250)
);

INSERT INTO tempQueueD
						SELECT
						e.HandPhone as MobilePhone,
						(SELECT nt.text FROM notification n
										JOIN notificationtext nt on nt.NotificationID = n.NotificationID
										WHERE n.NotificationTypeID=3
										AND STRCMP(nt.LanguageCode, nLanguageCode) = 0) as NotificationText,
						TIMESTAMP(v.NextVisit-IFNULL(nc.DaysBeforeOrAfter, nDaysInAdvance), IFNULL(nc.TimeToSend, nDefaultTime)) as DateTimeToSend,
						TIMESTAMP(DATE_ADD(v.NextVisit, INTERVAL -1 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) as LatestBy,

						DATE_FORMAT(v.NextVisit,'%d.%m.%Y') as visitDate,
						f.FacilityName as facilityName,						
						CONCAT_WS(' ', e.Firstname,  IFNULL(e.Lastname, 'лікар')) as doctorName,
						CONCAT_WS(' ', pat.GivenName,  pat.FamilyName) as patientName

						FROM visit v
						JOIN pregnancy p on v.PregnancyID = p.PregnancyID
						JOIN patient pat on pat.PatientID = p.PatientID
						LEFT JOIN (SELECT * FROM notificationconfiguration WHERE NotificationTypeID=3) nc on p.FacilityID = nc.FacilityID
						JOIN facilities f on f.FacilityID = v.FacilityID
						JOIN employees e on e.EmployeeID = v.EmployeeID
						LEFT JOIN delivery d ON p.PregnancyID = d.PregnancyID
						WHERE IFNULL(nc.Enabled, nDefaultON)=1
						AND DATEDIFF(DATE_ADD(v.NextVisit, INTERVAL (-(IFNULL(nc.DaysBeforeOrAfter, nDaysInAdvance))) day), nCurrentDate)=0
						AND v.RiskGroup=1
						AND DATEDIFF(DATE_ADD(p.Calc_DeliveryDate, INTERVAL 31 DAY), nCurrentDate) > 0
						AND pat.Discharged = 0
						AND d.DeliveryID IS NULL
						AND TIMESTAMP(DATE_ADD(v.NextVisit, INTERVAL -1 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) >= Date(NOW())
						ORDER BY DateTimeToSend ASC;


INSERT IGNORE INTO notificationqueue
SELECT
	NULL as NotificationQueueID, 
	MobilePhone, 
	REPLACE(
		REPLACE(
			REPLACE(
				REPLACE(NotificationText, '[visitdate]', visitDate), 
			'[facilityname]', facilityName), 
		'[patientname]', patientName),
	'[doctorname]', doctorName) as NotificationText, 
	DateTimeToSend, 
	LatestBy,
	3 as NotificationTypeID,
	0 as MobileApp
	FROM
	tempQueueD;

SELECT (SELECT Count(LatestBy) FROM tempQueueD) INTO nrOfNotifications;
DROP TABLE tempQueueD;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fillPatientDischargedFromHospitalisationNotificationToDoctors` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fillPatientDischargedFromHospitalisationNotificationToDoctors`(IN nCurrentDate varchar(10), nLanguageCode varchar(2), nDaysAfter INT(10), nDefaultTime varchar(8), nDefaultON TINYINT(1), OUT nrOfNotifications INT(10))
BEGIN

CREATE TEMPORARY TABLE IF NOT EXISTS `tempQueueD` (
  `MobilePhone` varchar(13) COLLATE utf8_bin NOT NULL,
  `NotificationText` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `DateTimeToSend` datetime DEFAULT NULL,
  `LatestBy` date DEFAULT NULL,
   dischargeDate varchar(10),
   facilityName varchar(250),
   doctorName varchar(250),
   patientName varchar(250)
);

INSERT INTO tempQueueD
				   SELECT
						e.HandPhone as MobilePhone,
						(SELECT nt.text FROM notification n
										JOIN notificationtext nt on nt.NotificationID = n.NotificationID
										WHERE n.NotificationTypeID=5
										AND STRCMP(nt.LanguageCode, nLanguageCode) = 0) as NotificationText,
						TIMESTAMP(h.DischargeDate+IFNULL(nc.DaysBeforeOrAfter, nDaysAfter), IFNULL(nc.TimeToSend, nDefaultTime)) as DateTimeToSend,
						TIMESTAMP(DATE_ADD(h.DischargeDate, INTERVAL 7 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) as LatestBy,

						DATE_FORMAT(h.DischargeDate,'%d.%m.%Y') as dischargeDate,
						f.FacilityName as facilityName,						
						CONCAT_WS(' ', e.Firstname,  IFNULL(e.Lastname, 'лікар')) as doctorName,
						CONCAT_WS(' ', pat.GivenName,  pat.FamilyName) as patientName

					FROM pregnancy p
					JOIN hospitalisation h on p.PregnancyID = h.PregnancyID
					JOIN patient pat on pat.PatientID = p.PatientID
					LEFT JOIN (SELECT * FROM notificationconfiguration WHERE NotificationTypeID=5) nc on p.FacilityID = nc.FacilityID
					JOIN facilities f on f.FacilityID = h.FacilityID
					JOIN employees e on e.EmployeeID = p.EmployeeID
					LEFT JOIN delivery d ON p.PregnancyID = d.PregnancyID
					WHERE IFNULL(nc.Enabled, nDefaultON)=1
					AND h.DischargeDate IS NOT NULL
					AND DATEDIFF(DATE_ADD(h.DischargeDate, INTERVAL((IFNULL(nc.DaysBeforeOrAfter, nDaysAfter))) day), nCurrentDate)=0
					AND DATEDIFF(DATE_ADD(p.Calc_DeliveryDate, INTERVAL 31 DAY), nCurrentDate) > 0
					AND pat.Discharged = 0
					AND d.DeliveryID IS NULL
					ORDER BY DateTimeToSend ASC;

INSERT IGNORE INTO notificationqueue
SELECT
	NULL as NotificationQueueID, 
	MobilePhone, 
	REPLACE(
		REPLACE(
			REPLACE(
				REPLACE(NotificationText, '[dischargedate]', dischargeDate), 
			'[facilityname]', facilityName), 
		'[patientname]', patientName),
	'[doctorname]', doctorName) as NotificationText, 
	DateTimeToSend, 
	LatestBy,
	5 as NotificationTypeID,
	0 as MobileApp
	FROM
	tempQueueD;

SELECT (SELECT Count(LatestBy) FROM tempQueueD) INTO nrOfNotifications;
DROP TABLE tempQueueD;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fillRecommendationNotificationForPatients` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fillRecommendationNotificationForPatients`(IN nCurrentDate varchar(10), nLanguageCode varchar(2), nDefaultTime varchar(8), nDefaultON TINYINT(1), nDefaultPregnancyLevelON TINYINT(1), OUT nrOfNotifications INT(10))
BEGIN
INSERT IGNORE INTO notificationqueue
					SELECT
						NULL as NotificationQueueID,
						pat.MobilePhone,
						nt.Text as NotificationText,
						TIMESTAMP(nCurrentDate, IFNULL(nc.TimeToSend, nDefaultTime)) as DateTimeToSend,
						TIMESTAMP(DATE_ADD(nCurrentDate, INTERVAL 7 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) as LatestBy,
						1 as NotificationTypeID,
						pr.MobileApp as MobileApp
					FROM (SELECT PatientID,
							FacilityID,
							PregnancyID,
							(280-DATEDIFF(Calc_DeliveryDate, nCurrentDate)) as dayofpregnancy,
							MobileApp
							FROM pregnancy
							WHERE DATEDIFF(DATE_ADD(Calc_DeliveryDate, INTERVAL 31 DAY), nCurrentDate) >= 0
							AND IFNULL(RecommendationNotifications, nDefaultPregnancyLevelON)=1) pr
					JOIN (SELECT NotificationID, notification.Day as dayToSend FROM notification WHERE NotificationTypeID=1) n on n.dayToSend = pr.dayOfPregnancy
					JOIN patient pat on pr.PatientID = pat.PatientID
					JOIN notificationtext nt on nt.NotificationID = n.NotificationID
					LEFT JOIN (SELECT * FROM notificationconfiguration WHERE NotificationTypeID=1) nc on pr.FacilityID = nc.FacilityID
					LEFT JOIN delivery d ON pr.PregnancyID = d.PregnancyID
					WHERE STRCMP(nt.LanguageCode, nLanguageCode) = 0
					AND IFNULL(nc.Enabled, nDefaultON)= 1
					AND pat.discharged = 0
					AND d.DeliveryID IS NULL
					ORDER BY DateTimeToSend ASC;

SELECT ROW_COUNT() INTO nrOfNotifications;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fillSubscribeToPatients` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fillSubscribeToPatients`(IN nCurrentDate varchar(10), nLanguageCode varchar(2), nDaysAfter INT(10), nDefaultTime varchar(8), nDefaultON TINYINT(1), nDefaultReminderPregnancyLevelON TINYINT(1), nDefaultRecommendationPregnancyLevelON TINYINT(1), OUT nrOfNotifications INT(10))
BEGIN

CREATE TEMPORARY TABLE IF NOT EXISTS `tempQueueSub` (
  `MobilePhone` varchar(13) COLLATE utf8_bin NOT NULL,
  `NotificationText` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `DateTimeToSend` datetime DEFAULT NULL,
  `LatestBy` date DEFAULT NULL,
   facilityName varchar(250),
   doctorName varchar(250),
   patientName varchar(250)
);

INSERT INTO tempQueueSub
					SELECT
						pat.MobilePhone as MobilePhone,
						(SELECT nt.text FROM notification n
										JOIN notificationtext nt on nt.NotificationID = n.NotificationID
										WHERE n.NotificationTypeID=6
										AND STRCMP(nt.LanguageCode, nLanguageCode) = 0) as NotificationText,
						TIMESTAMP(nCurrentDate, IFNULL(nc.TimeToSend, nDefaultTime)) as DateTimeToSend,
						TIMESTAMP(DATE_ADD(nCurrentDate, INTERVAL 7 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) as LatestBy,
					
						f.FacilityName as facilityName,						
						CONCAT_WS(' ', e.Firstname,  IFNULL(e.Lastname, 'лікар')) as doctorName,
						CONCAT_WS(' ', pat.GivenName,  pat.FamilyName) as patientName

					FROM pregnancy p
					JOIN patient pat on pat.PatientID = p.PatientID
					JOIN facilities f on f.FacilityID = pat.FacilityID
					LEFT JOIN employees e on e.EmployeeID = p.EmployeeID
					LEFT JOIN (SELECT * FROM notificationconfiguration WHERE NotificationTypeID=6) nc on p.FacilityID = nc.FacilityID
					LEFT JOIN delivery d ON p.PregnancyID = d.PregnancyID
					WHERE (IFNULL(nc.Enabled, nDefaultON)=1)
					AND ((IFNULL(p.ReminderNotifications, nDefaultReminderPregnancyLevelON)=1 OR (IFNULL(p.RecommendationNotifications, nDefaultRecommendationPregnancyLevelON)=1)))
					AND DATE(p.created) = DATE_SUB(nCurrentDate, INTERVAL IFNULL(nc.DaysBeforeOrAfter, nDaysAfter) day)
					AND DATEDIFF(DATE_ADD(p.Calc_DeliveryDate, INTERVAL 31 DAY), nCurrentDate) > 0
					AND pat.Discharged = 0
					AND d.DeliveryID IS NULL					
					ORDER BY DateTimeToSend ASC;

INSERT IGNORE INTO notificationqueue
SELECT
	NULL as NotificationQueueID, 
	MobilePhone, 
	REPLACE(
		REPLACE(
			REPLACE(
				REPLACE(NotificationText, '[visitdate]', ''), 
			'[facilityname]', facilityName), 
		'[patientname]', patientName),
	'[doctorname]', doctorName) as NotificationText, 
	DateTimeToSend, 
	LatestBy,
	6 as NotificationTypeID,
	0 as MobileApp
	FROM
	tempQueueSub;

SELECT (SELECT Count(LatestBy) FROM tempQueueSub) INTO nrOfNotifications;
DROP TABLE tempQueueSub;
					
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fillUnsubscribeToPatients` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fillUnsubscribeToPatients`(IN nCurrentDate varchar(10), nLanguageCode varchar(2), nDaysAfter INT(10), nDefaultTime varchar(8), nDefaultON TINYINT(1), nDefaultReminderPregnancyLevelON TINYINT(1), nDefaultRecommendationPregnancyLevelON TINYINT(1), OUT nrOfNotifications INT(10))
BEGIN

CREATE TEMPORARY TABLE IF NOT EXISTS `tempQueueUnsub` (
  `MobilePhone` varchar(13) COLLATE utf8_bin NOT NULL,
  `NotificationText` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `DateTimeToSend` datetime DEFAULT NULL,
  `LatestBy` date DEFAULT NULL,
   facilityName varchar(250),
   doctorName varchar(250),
   patientName varchar(250)
);

INSERT INTO tempQueueUnsub
					SELECT
						pat.MobilePhone as MobilePhone,
						(SELECT nt.text FROM notification n
										JOIN notificationtext nt on nt.NotificationID = n.NotificationID
										WHERE n.NotificationTypeID=7
										AND STRCMP(nt.LanguageCode, nLanguageCode) = 0) as NotificationText,
						TIMESTAMP(nCurrentDate, IFNULL(nc.TimeToSend, nDefaultTime)) as DateTimeToSend,
						TIMESTAMP(DATE_ADD(nCurrentDate, INTERVAL 7 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) as LatestBy,
					
						f.FacilityName as facilityName,						
						CONCAT_WS(' ', e.Firstname,  IFNULL(e.Lastname, 'лікар')) as doctorName,
						CONCAT_WS(' ', pat.GivenName,  pat.FamilyName) as patientName

					FROM pregnancy p
					JOIN patient pat on pat.PatientID = p.PatientID
					JOIN facilities f on f.FacilityID = pat.FacilityID
					LEFT JOIN employees e on e.EmployeeID = p.EmployeeID
					LEFT JOIN (SELECT * FROM notificationconfiguration WHERE NotificationTypeID=7) nc on p.FacilityID = nc.FacilityID
					LEFT JOIN delivery d ON p.PregnancyID = d.PregnancyID
					WHERE (IFNULL(nc.Enabled, nDefaultON)=1)
					AND IFNULL(p.ReminderNotifications, nDefaultReminderPregnancyLevelON)=0 
					AND IFNULL(p.RecommendationNotifications, nDefaultRecommendationPregnancyLevelON)=0
					AND DATEDIFF(DATE_ADD(p.Calc_DeliveryDate, INTERVAL 31 DAY), nCurrentDate) > 0
					AND pat.Discharged = 0
					AND d.DeliveryID IS NULL
					AND DATE(p.created) = DATE_SUB(nCurrentDate, INTERVAL IFNULL(nc.DaysBeforeOrAfter, nDaysAfter) day)
					ORDER BY DateTimeToSend ASC;

INSERT IGNORE INTO notificationqueue
SELECT
	NULL as NotificationQueueID, 
	MobilePhone, 
	REPLACE(
		REPLACE(
			REPLACE(
				REPLACE(NotificationText, '[visitdate]', ''), 
			'[facilityname]', facilityName), 
		'[patientname]', patientName),
	'[doctorname]', doctorName) as NotificationText, 
	DateTimeToSend, 
	LatestBy,
	7 as NotificationTypeID,
	0 as MobileApp
	FROM
	tempQueueUnsub;

SELECT (SELECT Count(LatestBy) FROM tempQueueUnsub) INTO nrOfNotifications;
DROP TABLE tempQueueUnsub;
					
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fillVisitReminderHospitalisationNotificationForPatients` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fillVisitReminderHospitalisationNotificationForPatients`(IN nCurrentDate varchar(10), nLanguageCode varchar(2), nDaysInAdvance INT(10), nDefaultTime varchar(8), nDefaultON TINYINT(1), nDefaultPregnancyLevelON TINYINT(1), OUT nrOfNotifications INT(10))
BEGIN

CREATE TEMPORARY TABLE IF NOT EXISTS `tempQueueVRH` (
  `MobilePhone` varchar(13) COLLATE utf8_bin NOT NULL,
  `NotificationText` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `DateTimeToSend` datetime DEFAULT NULL,
  `LatestBy` date DEFAULT NULL,
   NotificationTypeID TINYINT(10) DEFAULT NULL,
   MobileApp TINYINT(1) DEFAULT NULL,
   visitDate varchar(10),
   facilityName varchar(250),
   patientName varchar(250)
);

INSERT INTO tempQueueVRH
					SELECT
						pat.MobilePhone as MobilePhone,
						(SELECT nt.text FROM notification n
							JOIN notificationtext nt on nt.NotificationID = n.NotificationID
							WHERE n.NotificationTypeID=2
							AND STRCMP(nt.LanguageCode, nLanguageCode) = 0) as NotificationText,
						TIMESTAMP(h.RecomObstetricExaminationDate-IFNULL(nc.DaysBeforeOrAfter, nDaysInAdvance), IFNULL(nc.TimeToSend, nDefaultTime)) as DateTimeToSend,
						TIMESTAMP(DATE_ADD(h.RecomObstetricExaminationDate, INTERVAL -1 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) as LatestBy,
						2 as NotificationTypeID,
						p.MobileApp as MobileApp,					
						DATE_FORMAT(h.RecomObstetricExaminationDate,'%d.%m.%Y') as visitDate,
						hf.FacilityName as facilityName,
						CONCAT_WS(' ', pat.GivenName,  pat.FamilyName) as patientName

					FROM pregnancy p					
					JOIN patient pat on pat.PatientID = p.PatientID
					JOIN hospitalisation h on h.PregnancyID = p.PregnancyID
					JOIN facilities hf on h.facilityID = hf.FacilityID					
					LEFT JOIN (SELECT * FROM notificationconfiguration WHERE NotificationTypeID=2) nc on p.FacilityID = nc.FacilityID
					LEFT JOIN delivery d ON p.PregnancyID = d.PregnancyID
					WHERE IFNULL(nc.Enabled, nDefaultON)=1
					AND h.RecomObstetricExamination = 1
					AND IFNULL(p.ReminderNotifications, nDefaultPregnancyLevelON)=1
					AND DATEDIFF(DATE_ADD(h.RecomObstetricExaminationDate, INTERVAL (-(IFNULL(nc.DaysBeforeOrAfter, nDaysInAdvance))) day), nCurrentDate)=0
					AND DATEDIFF(DATE_ADD(p.Calc_DeliveryDate, INTERVAL 31 DAY), nCurrentDate) > 0
					AND pat.Discharged = 0
					AND d.DeliveryID IS NULL
					AND TIMESTAMP(DATE_ADD(h.RecomObstetricExaminationDate, INTERVAL -1 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) >= Date(NOW())
					ORDER BY DateTimeToSend ASC;

INSERT IGNORE INTO notificationqueue
SELECT
	NULL as NotificationQueueID, 
	MobilePhone, 
	REPLACE(
		REPLACE(
			REPLACE(
				REPLACE(NotificationText, '[visitdate]', visitDate), 
			'[facilityname]', facilityName), 
		'[doctorname]', ''),
	'[patientname]', patientName) as NotificationText, 
	DateTimeToSend, 
	LatestBy,
	NotificationTypeID,
	MobileApp
	FROM
	tempQueueVRH;

SELECT (SELECT Count(LatestBy) FROM tempQueueVRH) INTO nrOfNotifications;
DROP TABLE tempQueueVRH;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fillVisitReminderNotificationForPatients` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `fillVisitReminderNotificationForPatients`(IN nCurrentDate varchar(10), nLanguageCode varchar(2), nDaysInAdvance INT(10), nDefaultTime varchar(8), nDefaultON TINYINT(1), nDefaultPregnancyLevelON TINYINT(1), OUT nrOfNotifications INT(10))
BEGIN

CREATE TEMPORARY TABLE IF NOT EXISTS `tempQueueP` (
  `MobilePhone` varchar(13) COLLATE utf8_bin NOT NULL,
  `NotificationText` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `DateTimeToSend` datetime DEFAULT NULL,
  `LatestBy` date DEFAULT NULL,
   NotificationTypeID TINYINT(10) DEFAULT NULL,
   MobileApp TINYINT(1) DEFAULT NULL,
   visitDate varchar(10),
   facilityName varchar(250),
   doctorName varchar(250),
   patientName varchar(250)
);

INSERT INTO tempQueueP
					SELECT
						pat.MobilePhone as MobilePhone,
						(SELECT nt.text FROM notification n
										JOIN notificationtext nt on nt.NotificationID = n.NotificationID
										WHERE n.NotificationTypeID=2
										AND STRCMP(nt.LanguageCode, nLanguageCode) = 0) as NotificationText,
						TIMESTAMP(v.NextVisit-IFNULL(nc.DaysBeforeOrAfter, nDaysInAdvance), IFNULL(nc.TimeToSend, nDefaultTime)) as DateTimeToSend,
						TIMESTAMP(DATE_ADD(v.NextVisit, INTERVAL -1 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) as LatestBy,
						2 as NotificationTypeID,
						p.MobileApp as MobileApp,						
						DATE_FORMAT(v.NextVisit,'%d.%m.%Y') as visitDate,
						f.FacilityName as facilityName,						
						CONCAT_WS(' ', e.Firstname,  IFNULL(e.Lastname, 'лікар')) as doctorName,
						CONCAT_WS(' ', pat.GivenName,  pat.FamilyName) as patientName

					FROM visit v
					JOIN pregnancy p on v.PregnancyID = p.PregnancyID
					JOIN patient pat on pat.PatientID = p.PatientID
					JOIN facilities f on f.FacilityID = p.FacilityID
					LEFT JOIN employees e on e.EmployeeID = v.EmployeeID
					LEFT JOIN (SELECT * FROM notificationconfiguration WHERE NotificationTypeID=2) nc on p.FacilityID = nc.FacilityID
					LEFT JOIN delivery d ON p.PregnancyID = d.PregnancyID
					WHERE IFNULL(nc.Enabled, nDefaultON)=1
					AND IFNULL(p.ReminderNotifications, nDefaultPregnancyLevelON)=1
					AND DATEDIFF(DATE_ADD(v.NextVisit, INTERVAL (-(IFNULL(nc.DaysBeforeOrAfter, nDaysInAdvance))) day), nCurrentDate)=0
					AND DATEDIFF(DATE_ADD(p.Calc_DeliveryDate, INTERVAL 31 DAY), nCurrentDate) > 0
					AND pat.Discharged = 0
					AND d.DeliveryID IS NULL
					AND TIMESTAMP(DATE_ADD(v.NextVisit, INTERVAL -1 DAY), IFNULL(nc.TimeToSend, nDefaultTime)) >= Date(NOW())
					ORDER BY DateTimeToSend ASC;

INSERT IGNORE INTO notificationqueue
SELECT
	NULL as NotificationQueueID, 
	MobilePhone, 
	REPLACE(
		REPLACE(
			REPLACE(
				REPLACE(NotificationText, '[visitdate]', visitDate), 
			'[facilityname]', facilityName), 
		'[patientname]', patientName),
	'[doctorname]', doctorName) as NotificationText, 
	DateTimeToSend, 
	LatestBy,
	NotificationTypeID,
	MobileApp
	FROM
	tempQueueP;

SELECT (SELECT Count(LatestBy) FROM tempQueueP) INTO nrOfNotifications;
DROP TABLE tempQueueP;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertnotification` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertnotification`(IN nText varchar(2500), nDay INT(10), nType INT(10), nLanguageCode varchar(2))
BEGIN
INSERT INTO notification
(Day,
NotificationTypeID)
VALUES
(nDay,
nType);
INSERT INTO notificationtext
(NotificationID,
Text,
LanguageCode)
VALUES
(LAST_INSERT_ID(),
nText,
nLanguageCode);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-26 22:25:05
