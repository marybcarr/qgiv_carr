-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 15, 2022 at 06:31 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qgiv_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldonors`
--

DROP TABLE IF EXISTS `tbldonors`;
CREATE TABLE IF NOT EXISTS `tbldonors` (
  `DonorID` int(7) NOT NULL AUTO_INCREMENT,
  `Title` varchar(20) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `PrimaryPhone` varchar(40) NOT NULL,
  `CellPhone` varchar(40) NOT NULL,
  `DOB` varchar(50) DEFAULT NULL,
  `Age` int(3) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `RegistrationDate` date DEFAULT NULL,
  `RegistrationAge` int(11) DEFAULT NULL,
  `Address1` varchar(200) DEFAULT NULL,
  `Address2` varchar(200) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `StateProvince` varchar(50) DEFAULT NULL,
  `PostalCode` varchar(30) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `TimeZoneOffset` varchar(40) DEFAULT NULL,
  `TimeZoneDesc` varchar(100) DEFAULT NULL,
  `ImageSmall` varchar(300) DEFAULT NULL,
  `ImageLarge` varchar(300) DEFAULT NULL,
  `ImageThumbnail` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`DonorID`)
) ENGINE=MyISAM AUTO_INCREMENT=2191 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbltransactions`
--

DROP TABLE IF EXISTS `tbltransactions`;
CREATE TABLE IF NOT EXISTS `tbltransactions` (
  `TransID` int(11) NOT NULL AUTO_INCREMENT,
  `DonorID` int(7) NOT NULL,
  `TimeStamp` date NOT NULL,
  `Amount` decimal(9,2) NOT NULL,
  `PaymentStatus` varchar(30) DEFAULT NULL,
  `PaymentMethod` varchar(30) DEFAULT NULL,
  `FundID` varchar(20) DEFAULT NULL,
  `ProjectName` varchar(300) DEFAULT NULL,
  `Anonymous` tinyint(1) DEFAULT NULL,
  `Note` text,
  PRIMARY KEY (`TransID`)
) ENGINE=MyISAM AUTO_INCREMENT=1054 DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
