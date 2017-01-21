-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2017 at 11:07 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dblibsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `haha`
--

CREATE TABLE IF NOT EXISTS `haha` (
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hahax`
--

CREATE TABLE IF NOT EXISTS `hahax` (
  `id` int(11) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_accounts`
--

CREATE TABLE IF NOT EXISTS `tb_accounts` (
  `accntID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` varchar(250) NOT NULL,
  `UserType` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`accntID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tb_accounts`
--

INSERT INTO `tb_accounts` (`accntID`, `UserID`, `UserType`, `Password`) VALUES
(32, 'UDMLib-20170001', 'tb_users', 'UDMLib-20170001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_acquisition`
--

CREATE TABLE IF NOT EXISTS `tb_acquisition` (
  `AcquisitionId` int(11) NOT NULL AUTO_INCREMENT,
  `Barcode` varchar(250) NOT NULL,
  `Title` varchar(250) NOT NULL,
  `Author` varchar(250) NOT NULL,
  `Lastname` varchar(250) NOT NULL,
  `First` varchar(250) NOT NULL,
  `CopyRight` varchar(250) NOT NULL,
  `Edition` varchar(250) NOT NULL,
  `CallNo` varchar(250) NOT NULL,
  `AcquisitionMet` varchar(250) NOT NULL,
  `NoOfCopies` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Publisher` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `AccessionNum` varchar(250) NOT NULL,
  `Series` varchar(250) NOT NULL,
  `Volume` varchar(250) NOT NULL,
  `Placeofpub` varchar(250) NOT NULL,
  `Mater` varchar(250) NOT NULL,
  `Notearea` varchar(250) NOT NULL,
  PRIMARY KEY (`AcquisitionId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_audittrail`
--

CREATE TABLE IF NOT EXISTS `tb_audittrail` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL,
  `day` date NOT NULL,
  `login` time NOT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=510 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_book`
--

CREATE TABLE IF NOT EXISTS `tb_book` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AcquisitionId` int(11) NOT NULL,
  `ISBN` varchar(250) NOT NULL,
  `DateBookAdded` varchar(30) NOT NULL,
  `ArchivedDateExt` varchar(30) NOT NULL,
  `SubAuthors` varchar(250) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Status` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_borrowandreturn`
--

CREATE TABLE IF NOT EXISTS `tb_borrowandreturn` (
  `BorrowingReturningID` int(11) NOT NULL AUTO_INCREMENT,
  `BorrowerID` int(11) NOT NULL,
  `AccessionID` int(11) NOT NULL,
  `DateBorrowed` date NOT NULL,
  `DateToReturn` date NOT NULL,
  `trans` int(11) NOT NULL,
  `ActualDateReturned` date NOT NULL,
  `Penalty` int(11) NOT NULL,
  `transReturn` int(11) NOT NULL,
  `lostdamage` int(11) NOT NULL,
  PRIMARY KEY (`BorrowingReturningID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_borrower`
--

CREATE TABLE IF NOT EXISTS `tb_borrower` (
  `BorrowerID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` varchar(250) NOT NULL,
  `FirstName` varchar(250) NOT NULL,
  `LastName` varchar(250) NOT NULL,
  `BorrowerType` varchar(250) NOT NULL,
  `ContactNo` varchar(250) NOT NULL,
  `BookOnHand` int(250) NOT NULL,
  `Birthday` varchar(20) NOT NULL,
  `Active` int(11) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `middilename` varchar(250) NOT NULL,
  PRIMARY KEY (`BorrowerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_borrowing`
--

CREATE TABLE IF NOT EXISTS `tb_borrowing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `BookID` int(11) NOT NULL,
  `AccessionID` int(11) NOT NULL,
  `BorrowerID` int(11) NOT NULL,
  `Barcode` int(11) NOT NULL,
  `DateLoan` date NOT NULL,
  `ValidUntil` date NOT NULL,
  `DateReturn` date NOT NULL,
  `Penalty` decimal(10,0) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `ValidUntilNoH` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE IF NOT EXISTS `tb_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id`, `category`) VALUES
(26, 'Donate'),
(27, 'Purchase');

-- --------------------------------------------------------

--
-- Table structure for table `tb_categoryy`
--

CREATE TABLE IF NOT EXISTS `tb_categoryy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bkcategory` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tb_categoryy`
--

INSERT INTO `tb_categoryy` (`id`, `bkcategory`) VALUES
(8, 'General Works'),
(9, 'Philosophy'),
(10, 'Psychology Religion'),
(11, 'History'),
(12, 'Geography'),
(13, 'Horror'),
(14, 'Science'),
(15, 'Comedy');

-- --------------------------------------------------------

--
-- Table structure for table `tb_holidays`
--

CREATE TABLE IF NOT EXISTS `tb_holidays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `HolidayName` varchar(50) NOT NULL,
  `HolidayDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_logs`
--

CREATE TABLE IF NOT EXISTS `tb_logs` (
  `AttendanceNo` int(11) NOT NULL AUTO_INCREMENT,
  `BorrowerID` int(11) NOT NULL,
  `TimeLog` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` varchar(5) NOT NULL,
  PRIMARY KEY (`AttendanceNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_module`
--

CREATE TABLE IF NOT EXISTS `tb_module` (
  `moduleID` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(100) NOT NULL,
  `loginId` int(11) NOT NULL,
  PRIMARY KEY (`moduleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6102 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_price`
--

CREATE TABLE IF NOT EXISTS `tb_price` (
  `Price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_price`
--

INSERT INTO `tb_price` (`Price`) VALUES
('5');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reservation`
--

CREATE TABLE IF NOT EXISTS `tb_reservation` (
  `ReservationID` int(11) NOT NULL AUTO_INCREMENT,
  `BookID` int(11) NOT NULL,
  `BorrowerID` int(11) NOT NULL,
  `DateReserved` date NOT NULL,
  `Status` varchar(30) NOT NULL,
  PRIMARY KEY (`ReservationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `FirstName` varchar(250) NOT NULL,
  `LastName` varchar(250) NOT NULL,
  `Active` int(11) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`UserID`, `UserName`, `Password`, `FirstName`, `LastName`, `Active`) VALUES
(12, 'UDMLib-20170001', 'UDMLib-20170001', 'Avengers', 'Ultron', 0);

-- --------------------------------------------------------

--
-- Table structure for table `temp_borrow`
--

CREATE TABLE IF NOT EXISTS `temp_borrow` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BarcodeID` varchar(50) NOT NULL,
  `Accession` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_return`
--

CREATE TABLE IF NOT EXISTS `temp_return` (
  `ID` int(11) NOT NULL,
  `BarcodeID` varchar(15) NOT NULL,
  `Accession` int(11) NOT NULL,
  `Penalty` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transcation`
--

CREATE TABLE IF NOT EXISTS `transcation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `transcation`
--

INSERT INTO `transcation` (`id`, `type`) VALUES
(1, 'borrow'),
(2, 'return'),
(3, 'borrow'),
(4, 'return'),
(5, 'borrow'),
(6, 'return'),
(7, 'borrow'),
(8, 'return'),
(9, 'borrow'),
(10, 'return'),
(11, 'borrow'),
(12, 'return'),
(13, 'borrow'),
(14, 'return');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
