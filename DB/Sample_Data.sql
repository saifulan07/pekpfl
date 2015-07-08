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
-- Dumping data for table eemelreq.admin: ~2 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`AD_ID`, `AD_NAME`, `AD_EMAIL`, `AD_PSWD`) VALUES
	(1, 'Admin Syafiq', 'admin', 'admin'),
	(2, 'Admin2', 'admin2', 'admin2');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping data for table eemelreq.application: ~12 rows (approximately)
/*!40000 ALTER TABLE `application` DISABLE KEYS */;
INSERT INTO `application` (`APP_ID`, `APP_POSID`, `APP_NAME`, `APP_IC`, `APP_EMAIL`, `APP_STATLDR`, `APP_STATAD`) VALUES
	(2, 6, 'HexenMeister', '111111111111', 'hexen@meister.com', 'PENDING', 'PENDING'),
	(3, 4, 'Naruuku', '222222222222', 'Naruuku@meister.com', 'APPROVED', 'PENDING'),
	(4, 5, 'xShia', '333333333333', 'xshia@meister.com', 'APPROVED', 'PENDING'),
	(5, 7, 'SaintExia', '444444444444', 'Saint@exia.com', 'APPROVED', 'APPROVED'),
	(6, 2, 'DexKyrios', '898980001111', 'Dexkyrios@meister.com', 'PENDING', 'PENDING'),
	(7, 2, 'Masurou', '123123123456', 'masurou@meister.com', 'APPROVED', 'PENDING'),
	(9, 1, 'bdk HR', '000000000000', 'bdk@hr.com', 'PENDING', 'PENDING'),
	(28, 4, 'Skytanic', '123456789101', 'skytanic@meister.com', 'PENDING', 'PENDING'),
	(29, 5, 'Elucidator', '987654321111', 'elucidator@meister.com', 'PENDING', 'PENDING'),
	(30, 6, 'syafiq si pemohon', '123123123456', 'exia_evo@yahoo.com', 'PENDING', 'PENDING'),
	(31, 7, 'Mohamad Syafiq Azwan Bin Mustafa', '911128105627', 'syafiq.azwan091@gmail.com', 'APPROVED', 'APPROVED'),
	(32, 7, 'pemohon emel', '911128105627', 'syafiq.azwan@fiction-labs.com', 'APPROVED', 'APPROVED');
/*!40000 ALTER TABLE `application` ENABLE KEYS */;

-- Dumping data for table eemelreq.department: ~3 rows (approximately)
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`DEPT_ID`, `DEPT_NAME`) VALUES
	(1, 'Sumber Manusia'),
	(2, 'Teknologi Informasi'),
	(3, 'Accounting Department');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;

-- Dumping data for table eemelreq.deptldr: ~2 rows (approximately)
/*!40000 ALTER TABLE `deptldr` DISABLE KEYS */;
INSERT INTO `deptldr` (`DL_ID`, `DL_DEPTID`, `DL_NAME`, `DL_EMAIL`, `DL_PSWD`) VALUES
	(6, 2, 'Syafiq Fiction Labs', 'syafiq.azwan@fiction-labs.com', '123456'),
	(9, 1, 'bami', 'bami@hr.com', '123456');
/*!40000 ALTER TABLE `deptldr` ENABLE KEYS */;

-- Dumping data for table eemelreq.position: ~8 rows (approximately)
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` (`POS_ID`, `POS_DEPTID`, `POS_NAME`) VALUES
	(1, 1, 'Kerani'),
	(2, 1, 'Eksekutif Rekrut'),
	(3, 1, 'Eksekutif ape ntah'),
	(4, 2, 'Programmer'),
	(5, 2, 'Desiger'),
	(6, 2, 'Front-End Developer'),
	(7, 2, 'Back-End Developer'),
	(8, 2, 'Software Engineer');
/*!40000 ALTER TABLE `position` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
