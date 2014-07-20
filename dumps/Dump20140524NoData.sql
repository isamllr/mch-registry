CREATE DATABASE  IF NOT EXISTS `registry` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `registry`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
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
-- Table structure for table `pregnancy`
-- TODO
--ALTER TABLE `pregnancy` (
--`ReminderNotifications` tinyint(4),
--`RecommendationNotifications` tinyint(4),


--
-- Table structure for table `notificationtext`
--

DROP TABLE IF EXISTS `notificationtext`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificationtext` (
  `NotificationTextID` int(10) NOT NULL AUTO_INCREMENT,
  `NotificationID` int(10) NOT NULL,
  `Text` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `LanguageCode` varchar(2) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`NotificationTextID`),
  UNIQUE KEY `RecomendationTextID_UNIQUE` (`NotificationTextID`),
  KEY `NotificationID_idx` (`NotificationID`),
  CONSTRAINT `NotificationID` FOREIGN KEY (`NotificationID`) REFERENCES `notification` (`NotificationID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=355 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `notificationqueuehistory`
--

DROP TABLE IF EXISTS `notificationqueuehistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificationqueuehistory` (
  `NotificationQueueID` bigint(20) NOT NULL,
  `MobilePhone` varchar(13) COLLATE utf8_bin NOT NULL,
  `NotificationText` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `DateTimeToSend` datetime DEFAULT NULL,
  PRIMARY KEY (`NotificationQueueID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `notificationsmsservice`
--

DROP TABLE IF EXISTS `notificationsmsservice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificationsmsservice` (
  `NotificationSMSServiceID` int(11) NOT NULL AUTO_INCREMENT,
  `notificationProvider` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `notificationProtocol` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`NotificationSMSServiceID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `NotificationID` int(11) NOT NULL AUTO_INCREMENT,
  `Day` int(10) unsigned zerofill DEFAULT NULL,
  `NotificationTypeID` int(10) DEFAULT NULL,
  PRIMARY KEY (`NotificationID`),
  UNIQUE KEY `idrecommendations_UNIQUE` (`NotificationID`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `notificationconfiguration`
--

DROP TABLE IF EXISTS `notificationconfiguration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificationconfiguration` (
  `NotificationConfigurationID` int(11) NOT NULL AUTO_INCREMENT,
  `DaysBeforeOrAfter` int(10) DEFAULT NULL,
  `TimeToSend` time DEFAULT NULL,
  `Enabled` tinyint(1) DEFAULT NULL,
  `FacilityID` int(10) DEFAULT NULL,
  `NotificationTypeID` int(10) DEFAULT NULL,
  PRIMARY KEY (`NotificationConfigurationID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `notificationqueue`
--

DROP TABLE IF EXISTS `notificationqueue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificationqueue` (
  `NotificationQueueID` bigint(20) NOT NULL AUTO_INCREMENT,
  `MobilePhone` varchar(13) COLLATE utf8_bin NOT NULL,
  `NotificationText` varchar(2500) COLLATE utf8_bin DEFAULT NULL,
  `DateTimeToSend` datetime DEFAULT NULL,
  PRIMARY KEY (`NotificationQueueID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `notificationtype`
--

DROP TABLE IF EXISTS `notificationtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificationtype` (
  `NotificationTypeID` int(11) NOT NULL,
  `TypeName` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`NotificationTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping routines for database 'registry'
--
/*!50003 DROP PROCEDURE IF EXISTS `insertnotification` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
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

-- Dump completed on 2014-05-24 20:35:36
