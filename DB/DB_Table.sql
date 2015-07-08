-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.42 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for eemelreq
CREATE DATABASE IF NOT EXISTS `eemelreq` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `eemelreq`;


-- Dumping structure for table eemelreq.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `AD_ID` int(11) NOT NULL AUTO_INCREMENT,
  `AD_NAME` text,
  `AD_EMAIL` text,
  `AD_PSWD` text,
  PRIMARY KEY (`AD_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table eemelreq.application
CREATE TABLE IF NOT EXISTS `application` (
  `APP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `APP_POSID` int(11) NOT NULL,
  `APP_NAME` text,
  `APP_IC` varchar(12) DEFAULT NULL,
  `APP_EMAIL` varchar(45) DEFAULT NULL,
  `APP_STATLDR` varchar(45) DEFAULT NULL,
  `APP_STATAD` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`APP_ID`),
  KEY `fk_APPLICATION_POSITION1_idx` (`APP_POSID`),
  CONSTRAINT `fk_APPLICATION_POSITION1` FOREIGN KEY (`APP_POSID`) REFERENCES `position` (`POS_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table eemelreq.department
CREATE TABLE IF NOT EXISTS `department` (
  `DEPT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DEPT_NAME` text,
  PRIMARY KEY (`DEPT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table eemelreq.deptldr
CREATE TABLE IF NOT EXISTS `deptldr` (
  `DL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DL_DEPTID` int(11) NOT NULL,
  `DL_NAME` text,
  `DL_EMAIL` text,
  `DL_PSWD` text,
  PRIMARY KEY (`DL_ID`),
  KEY `fk_DEPTLDR_DEPARTMENT1_idx` (`DL_DEPTID`),
  CONSTRAINT `fk_DEPTLDR_DEPARTMENT1` FOREIGN KEY (`DL_DEPTID`) REFERENCES `department` (`DEPT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.


-- Dumping structure for table eemelreq.position
CREATE TABLE IF NOT EXISTS `position` (
  `POS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `POS_DEPTID` int(11) NOT NULL,
  `POS_NAME` text,
  PRIMARY KEY (`POS_ID`),
  KEY `fk_POSITION_DEPARTMENT_idx` (`POS_DEPTID`),
  CONSTRAINT `fk_POSITION_DEPARTMENT` FOREIGN KEY (`POS_DEPTID`) REFERENCES `department` (`DEPT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
