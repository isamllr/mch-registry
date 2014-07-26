USE registry; 

-- removal of an hospitalisation was not occurring due to the fact that the connection to reasonhospitalisation was restricting it, instead of cascading it
ALTER TABLE `reasonhospitalisation` DROP FOREIGN KEY `reasonhospitalisation_ibfk_1` ,
ADD FOREIGN KEY ( `HospitalisationID` ) REFERENCES `registry`.`hospitalisation` (
`HospitalisationID`
) ON DELETE CASCADE ON UPDATE RESTRICT ;

-- завдання 295 видаляємо з бази даних наступних користувачів
DELETE FROM `registry`.`login` WHERE `login`.`username` = "shvets1";
DELETE FROM `registry`.`login` WHERE `login`.`username` = "klekotsyuk1";
DELETE FROM `registry`.`login` WHERE `login`.`username` = "noon";

-- для завдання 224 створюємо нове поле і нову таблицю
ALTER TABLE `referral` ADD `ReferralTypeID` INT( 11 ) NOT NULL DEFAULT '99',
ADD INDEX ( `ReferralTypeID` ); 

-- Створюємо нову таблицю
CREATE TABLE `registry`.`referraltype` (
`ReferralTypeID` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`TypeName` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;



INSERT INTO `registry`.`referraltype` (
`ReferralTypeID` ,
`TypeName`
)
VALUES (
'1', 'Скерована на пологи'
), (
'2', 'Скерована на консультацію'
), (
'99', 'Невідомо'
), (
'3', 'Скерована на лікування'
);


ALTER TABLE `referral` ADD FOREIGN KEY ( `ReferralTypeID` ) REFERENCES `registry`.`referraltype` (
`ReferralTypeID`
);


-- для завдання 275 створюємо нове поле і нову таблицю
ALTER TABLE `newborn` ADD `DiedID` INT( 10 ) NULL AFTER `DischargeID` ,
ADD INDEX ( `DiedID` ); 

ALTER TABLE `newborn` ADD `Died` TINYINT( 4 ) NULL AFTER `DischargeID`; 

-- Створюємо нову таблицю
CREATE TABLE `registry`.`died` (
`DiedID` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`DiedName` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;



INSERT INTO `registry`.`died` (
`DiedID` ,
`DiedName`
)
VALUES (
'1', 'До початку пологів'
), (
'2', 'Під час пологів'
), (
'3', '0-6 діб життя'
), (
'4', '7-27 діб життя'
);


ALTER TABLE `newborn` ADD FOREIGN KEY ( `DiedID` ) REFERENCES `registry`.`died` (
`DiedID`
);
