-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 15, 2022 at 06:28 AM
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

--
-- Dumping data for table `tbldonors`
--

INSERT INTO `tbldonors` (`DonorID`, `Title`, `FirstName`, `LastName`, `Email`, `PrimaryPhone`, `CellPhone`, `DOB`, `Age`, `Gender`, `RegistrationDate`, `RegistrationAge`, `Address1`, `Address2`, `City`, `StateProvince`, `PostalCode`, `Country`, `TimeZoneOffset`, `TimeZoneDesc`, `ImageSmall`, `ImageLarge`, `ImageThumbnail`) VALUES
(2186, 'Mr', 'Roger', 'Mitchell', 'roger.mitchell@example.com', '(681) 447-3947', '(716) 530-6950', '1971-02-12', 51, 'male', '2015-05-09', 7, '4054 W Pecan St', NULL, 'Lewisville', 'Pennsylvania', '16989', 'United States', '-12:00', 'Eniwetok, Kwajalein', 'https://randomuser.me/api/portraits/men/92.jpg', 'https://randomuser.me/api/portraits/med/men/92.jpg', 'https://randomuser.me/api/portraits/thumb/men/92.jpg'),
(2187, 'Mr', 'Bobby', 'Mendoza', 'bobby.mendoza@example.com', '(960) 251-9787', '(248) 296-5348', '2001-03-31', 21, 'male', '2007-05-01', 15, '5551 Parker Rd', NULL, 'Milwaukee', 'Mississippi', '45256', 'United States', '-4:00', 'Atlantic Time (Canada), Caracas, La Paz', 'https://randomuser.me/api/portraits/men/57.jpg', 'https://randomuser.me/api/portraits/med/men/57.jpg', 'https://randomuser.me/api/portraits/thumb/men/57.jpg'),
(2188, 'Mrs', 'Janet', 'Herrera', 'janet.herrera@example.com', '(578) 264-4973', '(796) 737-3147', '1964-08-06', 58, 'female', '2016-04-27', 6, '290 Bruce St', NULL, 'Cupertino', 'Rhode Island', '22093', 'United States', '+10:00', 'Eastern Australia, Guam, Vladivostok', 'https://randomuser.me/api/portraits/women/18.jpg', 'https://randomuser.me/api/portraits/med/women/18.jpg', 'https://randomuser.me/api/portraits/thumb/women/18.jpg'),
(2189, 'Ms', 'Cathy', 'Edwards', 'cathy.edwards@example.com', '(697) 492-7978', '(893) 651-1294', '1945-04-13', 77, 'female', '2008-09-13', 13, '8375 Sunset St', NULL, 'Boulder', 'Delaware', '33647', 'United States', '+11:00', 'Magadan, Solomon Islands, New Caledonia', 'https://randomuser.me/api/portraits/women/59.jpg', 'https://randomuser.me/api/portraits/med/women/59.jpg', 'https://randomuser.me/api/portraits/thumb/women/59.jpg'),
(2190, 'Mr', 'Antonio', 'Steward', 'antonio.steward@example.com', '(738) 529-9044', '(831) 553-7971', '1949-04-04', 73, 'male', '2006-12-27', 15, '4622 Oak Ridge Ln', NULL, 'West Palm Beach', 'Vermont', '44020', 'United States', '+3:00', 'Baghdad, Riyadh, Moscow, St. Petersburg', 'https://randomuser.me/api/portraits/men/90.jpg', 'https://randomuser.me/api/portraits/med/men/90.jpg', 'https://randomuser.me/api/portraits/thumb/men/90.jpg');

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

--
-- Dumping data for table `tbltransactions`
--

INSERT INTO `tbltransactions` (`TransID`, `DonorID`, `TimeStamp`, `Amount`, `PaymentStatus`, `PaymentMethod`, `FundID`, `ProjectName`, `Anonymous`, `Note`) VALUES
(1049, 2186, '1965-02-12', '534.16', 'Authorized', 'Discover', 'YEND2020', 'Year End Giving', 0, 'Just in time for taxes!!'),
(1050, 2187, '1943-07-20', '906.15', 'Invalid', 'Paypal', 'GIFT0034', 'Mike Green Support', 0, 'Good work Mike! Hope this helps'),
(1051, 2188, '1982-06-01', '714.95', 'Authorized', 'Mastercard', 'CAMP8831', 'Wellness Center Campaign', 0, 'To help with the community fitness program'),
(1052, 2189, '2018-01-25', '979.41', 'Declined', 'Mastercard', 'FUND1323', 'Building Fundraiser', 0, 'Awesome blueprints and vision!'),
(1053, 2190, '1960-06-22', '324.83', 'Canceled', 'American Express', 'FUND2745', 'Jenny Bowdy Fundraiser', 0, 'Love you Jenny');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
