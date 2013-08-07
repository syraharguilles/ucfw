-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 09, 2012 at 09:27 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u909955738_ucfw`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `actno` int(11) NOT NULL AUTO_INCREMENT,
  `actname` varchar(60) NOT NULL,
  `actheld` varchar(60) NOT NULL,
  `actdatefrom` date NOT NULL,
  `actdateto` date NOT NULL,
  `actsem` varchar(10) NOT NULL,
  `actyear` varchar(10) NOT NULL,
  `orgno` int(11) DEFAULT NULL,
  `deptno` int(11) DEFAULT NULL,
  `colno` int(11) DEFAULT NULL,
  `progno` int(11) DEFAULT NULL,
  `campusno` int(11) NOT NULL,
  `actaddedby` int(11) NOT NULL,
  `acttimeadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `actstat` char(10) NOT NULL,
  PRIMARY KEY (`actno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`actno`, `actname`, `actheld`, `actdatefrom`, `actdateto`, `actsem`, `actyear`, `orgno`, `deptno`, `colno`, `progno`, `campusno`, `actaddedby`, `acttimeadded`, `actstat`) VALUES
(1, 'superact', 'wala', '2012-10-06', '2012-10-08', '1st sem', '2012-2013', NULL, NULL, NULL, NULL, 0, 123456, '2012-10-06 19:13:00', 'inactive'),
(2, 'accountingact', 'wala', '2012-10-08', '2012-10-09', '1st sem', '2012-2013', NULL, 1, NULL, NULL, 1, 1, '2012-10-07 05:50:57', 'active'),
(3, 'cicsact', 'wala', '2012-10-07', '2012-10-08', '1st sem', '2012-2013', NULL, NULL, 1, 0, 1, 1, '2012-10-07 12:36:36', 'active'),
(4, 'bsitact', 'wala', '2012-10-07', '2012-10-08', '1st sem', '2012-2013', NULL, NULL, 1, 1, 1, 1, '2012-10-07 15:47:48', 'active'),
(5, 'globalorg', 'wala', '2012-10-08', '2012-10-09', '1st sem', '2012-2013', 1, NULL, NULL, NULL, 1, 123456, '2012-10-08 14:33:45', 'active'),
(6, 'bsitorgact', 'wala', '2012-10-09', '2012-10-09', '1st sem', '2012-2013', 4, NULL, 1, 1, 1, 123456, '2012-10-08 15:06:19', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `campuses`
--

CREATE TABLE IF NOT EXISTS `campuses` (
  `campusno` int(11) NOT NULL AUTO_INCREMENT,
  `campusname` varchar(60) NOT NULL,
  `campusabbr` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zipcode` int(4) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `actno` int(11) DEFAULT NULL,
  `gsno` int(11) NOT NULL,
  `campusaddedby` int(11) NOT NULL,
  `campustimeadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `campusstat` char(10) NOT NULL,
  PRIMARY KEY (`campusno`),
  UNIQUE KEY `campusabbr` (`campusabbr`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `campuses`
--

INSERT INTO `campuses` (`campusno`, `campusname`, `campusabbr`, `address`, `zipcode`, `telephone`, `actno`, `gsno`, `campusaddedby`, `campustimeadded`, `campusstat`) VALUES
(1, 'University of Cebu Main ', 'uc-main', 'Sanciangko St. Cebu City', 6000, '255-7777', NULL, 0, 123456, '2012-08-12 13:55:27', 'active'),
(2, 'University of Cebu Banilad', 'uc-banilad', 'Banilad Cebu City', 6000, '255-7777', NULL, 0, 123456, '2012-08-12 13:59:03', 'active'),
(3, 'University of Cebu Lapu-lapu Mandaue', 'uc-lm', 'Lapu-lapu Mandaue City', 6000, '255-7777', NULL, 0, 123456, '2012-09-25 09:39:33', 'active'),
(4, 'University of Cebu Maritime Training Center', 'uc-metc', 'mambaling city', 6000, '255-7777', NULL, 0, 123456, '2012-09-17 11:58:11', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
  `colno` int(11) NOT NULL AUTO_INCREMENT,
  `colname` varchar(100) NOT NULL,
  `colabbr` varchar(20) NOT NULL,
  `colbldgname` varchar(60) NOT NULL,
  `colflrno` int(11) NOT NULL,
  `collocalno` int(11) NOT NULL,
  `coldean` varchar(70) NOT NULL,
  `actno` int(11) DEFAULT NULL,
  `campusno` int(11) NOT NULL,
  `coladdedby` int(11) NOT NULL,
  `coltimeadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `colstat` char(10) NOT NULL,
  PRIMARY KEY (`colno`),
  UNIQUE KEY `colabbr` (`colabbr`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`colno`, `colname`, `colabbr`, `colbldgname`, `colflrno`, `collocalno`, `coldean`, `actno`, `campusno`, `coladdedby`, `coltimeadded`, `colstat`) VALUES
(1, 'College of Information and Computer Science', 'cics', 'wala', 5, 231, 'Mr. Melvin Ninal', 0, 1, 123456, '2012-09-24 17:43:06', 'active'),
(2, 'College of Commerce and Accountancy', 'CCA', 'wala', 3, 123, 'Mr. Claro  Ventic', NULL, 1, 123456, '2012-09-09 19:42:11', 'active'),
(3, 'College of Criminal Justice', 'CCJ', 'wala', 3, 123, 'wala', NULL, 1, 123456, '2012-09-09 19:43:36', 'active'),
(4, 'College of Information and Computer Science', 'cics-bans', 'wala', 1, 123, 'wala', NULL, 2, 123456, '2012-09-17 11:59:19', 'active'),
(5, 'College of Commerce of Accountancy', 'CCA-bans', 'wala', 1, 123, 'wala', NULL, 2, 123456, '2012-09-17 11:59:19', 'active'),
(6, 'College of Criminal Justice', 'CCJ-bans', 'wala', 1, 123, 'wala', NULL, 2, 123456, '2012-09-17 11:59:19', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `deptno` int(11) NOT NULL AUTO_INCREMENT,
  `deptname` varchar(100) NOT NULL,
  `deptabbr` char(20) NOT NULL,
  `deptbldgname` varchar(60) NOT NULL,
  `deptflrno` int(11) NOT NULL,
  `deptlocalno` int(11) NOT NULL,
  `depthead` varchar(70) NOT NULL,
  `actno` int(11) DEFAULT NULL,
  `orgno` int(11) DEFAULT NULL,
  `campusno` int(11) NOT NULL,
  `deptaddedby` int(11) NOT NULL,
  `depttimeadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deptstat` char(10) NOT NULL,
  PRIMARY KEY (`deptno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`deptno`, `deptname`, `deptabbr`, `deptbldgname`, `deptflrno`, `deptlocalno`, `depthead`, `actno`, `orgno`, `campusno`, `deptaddedby`, `depttimeadded`, `deptstat`) VALUES
(1, 'Accounting', 'accounting', 'gotianoy', 1, 123, 'wala', NULL, NULL, 1, 123456, '2012-09-09 19:36:11', 'active'),
(2, 'Registrar', 'registrar', 'gotianoy', 1, 123, 'wala', NULL, NULL, 1, 123456, '2012-09-17 11:59:03', 'active'),
(3, 'Cashier', 'cashier', 'gotianoy', 1, 231, 'wala', NULL, NULL, 1, 123456, '2012-09-17 11:59:03', 'active'),
(4, 'Purchasing', 'purchasing', 'gotianoy', 1, 123, 'wala', NULL, NULL, 1, 123456, '2012-09-17 11:59:03', 'active'),
(5, 'Accounting', 'accounting-bans', 'wala', 1, 123, 'wala', NULL, NULL, 2, 123456, '2012-09-17 11:59:03', 'active'),
(6, 'Registrar', 'registrar-bans', 'wala', 2, 234, 'wala', NULL, NULL, 2, 123456, '2012-09-17 11:59:03', 'active'),
(7, 'Cashier', 'cashier-bans', 'wala', 1, 123, 'wala', NULL, NULL, 2, 123456, '2012-09-17 11:59:03', 'active'),
(8, 'Purchasing', 'purchasing', 'wala', 1, 231, 'wala', NULL, NULL, 2, 123456, '2012-09-17 11:59:03', 'active'),
(57, 'dept', 'dept', 'wala', 1, 123, 'depthead', NULL, NULL, 3, 20, '2012-09-25 11:36:38', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `gsmajors`
--

CREATE TABLE IF NOT EXISTS `gsmajors` (
  `gsmajorno` int(11) NOT NULL AUTO_INCREMENT,
  `gsmajorname` varchar(60) NOT NULL,
  `gsmajoracronyms` char(10) NOT NULL,
  `gsprogno` int(11) NOT NULL,
  `orgno` int(11) NOT NULL,
  `campusno` int(11) NOT NULL,
  `gsmajoraddedby` int(11) NOT NULL,
  `gsmajortimeadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gsmajorstat` char(10) NOT NULL,
  PRIMARY KEY (`gsmajorno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gsmajors`
--


-- --------------------------------------------------------

--
-- Table structure for table `gsprograms`
--

CREATE TABLE IF NOT EXISTS `gsprograms` (
  `gsprogno` int(11) NOT NULL AUTO_INCREMENT,
  `gsprogname` varchar(100) NOT NULL,
  `gsprogabbr` varchar(20) NOT NULL,
  `gsprogbldgname` varchar(60) NOT NULL,
  `gsprogflrno` int(11) NOT NULL,
  `gsproglocalno` int(11) NOT NULL,
  `gsprogdean` varchar(70) NOT NULL,
  `actno` int(11) NOT NULL,
  `campusno` int(11) NOT NULL,
  `gsprogaddedby` int(11) NOT NULL,
  `gsprogtimeadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gsprogstat` char(10) NOT NULL,
  PRIMARY KEY (`gsprogno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gsprograms`
--


-- --------------------------------------------------------

--
-- Table structure for table `imgs`
--

CREATE TABLE IF NOT EXISTS `imgs` (
  `imgno` int(11) NOT NULL AUTO_INCREMENT,
  `imgpath` varchar(60) NOT NULL,
  `imgpostno` int(11) NOT NULL,
  `imgstat` char(10) NOT NULL,
  PRIMARY KEY (`imgno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `imgs`
--


-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `logidno` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `timein` datetime NOT NULL,
  `timeout` datetime NOT NULL,
  PRIMARY KEY (`logidno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--


-- --------------------------------------------------------

--
-- Table structure for table `meridiem`
--

CREATE TABLE IF NOT EXISTS `meridiem` (
  `mno` int(11) NOT NULL AUTO_INCREMENT,
  `meridiem` char(2) NOT NULL,
  PRIMARY KEY (`mno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `meridiem`
--

INSERT INTO `meridiem` (`mno`, `meridiem`) VALUES
(1, 'am'),
(2, 'pm');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `notifyno` int(11) NOT NULL AUTO_INCREMENT,
  `notifydate` date NOT NULL,
  `notifytime` time NOT NULL,
  `idnoreported` int(11) NOT NULL,
  `idnospammed` int(11) NOT NULL,
  `postno` int(11) NOT NULL,
  `actno` int(11) NOT NULL,
  `orgno` int(11) NOT NULL,
  `deptno` int(11) NOT NULL,
  `colno` int(11) NOT NULL,
  `campusno` int(11) NOT NULL,
  `notifystat` char(10) NOT NULL,
  PRIMARY KEY (`notifyno`,`notifydate`,`notifytime`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `notifications`
--


-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `orgno` int(11) NOT NULL AUTO_INCREMENT,
  `orgname` varchar(100) NOT NULL,
  `orgabbr` varchar(20) NOT NULL,
  `orgtype` char(10) DEFAULT NULL,
  `orgbldgname` varchar(60) NOT NULL,
  `orgflrno` int(11) NOT NULL,
  `orglocalno` int(11) NOT NULL,
  `deptno` int(11) DEFAULT NULL,
  `colno` int(11) DEFAULT NULL,
  `progno` int(11) DEFAULT NULL,
  `gsprogno` int(11) NOT NULL,
  `actno` int(11) DEFAULT NULL,
  `campusno` int(11) NOT NULL,
  `orgaddedby` int(11) NOT NULL,
  `orgtimeadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orgstat` char(10) NOT NULL,
  PRIMARY KEY (`orgno`),
  UNIQUE KEY `orgabbr` (`orgabbr`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`orgno`, `orgname`, `orgabbr`, `orgtype`, `orgbldgname`, `orgflrno`, `orglocalno`, `deptno`, `colno`, `progno`, `gsprogno`, `actno`, `campusno`, `orgaddedby`, `orgtimeadded`, `orgstat`) VALUES
(1, 'University of Cebu Teachers Association', 'UCTA', NULL, 'wala', 1, 123, NULL, NULL, NULL, 0, NULL, 1, 123456, '2012-09-17 07:23:25', 'active'),
(2, 'University of Cebu Council''s of President', 'UCCP', NULL, 'wala', 1, 231, NULL, NULL, NULL, 0, NULL, 1, 123456, '2012-09-17 12:00:01', 'active'),
(3, 'Association of Working Scholar', 'AWS', NULL, 'wala', 2, 123, NULL, NULL, NULL, 0, NULL, 1, 123456, '2012-09-17 12:00:01', 'active'),
(4, 'BSIT ORG', 'BSIT ORG', 'acad', 'WALA', 1, 123, NULL, 1, 1, 0, NULL, 1, 123456, '2012-09-17 07:23:25', 'active'),
(5, 'ACT ORG', 'ACT ORG', 'acad', 'WALA', 1, 123, NULL, 1, 2, 0, NULL, 1, 123456, '2012-09-17 12:00:01', 'active'),
(6, 'ANIMATION ORG', 'ANIMATION ORG', 'acad', 'WALA', 1, 123, NULL, 1, 3, 0, NULL, 1, 123456, '2012-09-17 12:00:01', 'active'),
(7, 'BSBA ORG', 'BSBA ORG', 'acad', 'WALA', 1, 123, NULL, 2, 4, 0, NULL, 1, 123456, '2012-09-17 12:00:01', 'active'),
(8, 'BSA ORG', 'BSA ORG', 'acad', 'WALA', 1, 123, NULL, 2, 5, 0, NULL, 1, 123456, '2012-09-17 12:00:01', 'active'),
(9, 'BSHRDM ORG', 'BSHRDM ORG', 'acad', 'WALA', 2, 123, NULL, 2, 6, 0, NULL, 1, 123456, '2012-09-17 12:00:01', 'active'),
(10, 'BSCRIM ORG', 'BSCRIM ORG', 'acad', 'WALA', 1, 123, NULL, 3, 7, 0, NULL, 1, 123456, '2012-09-17 12:00:01', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `postno` int(11) NOT NULL AUTO_INCREMENT,
  `postdatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `postTitleNo` varchar(60) NOT NULL,
  `postcontent` mediumtext NOT NULL,
  `idno` int(11) NOT NULL,
  `actno` int(11) NOT NULL,
  `orgno` int(11) NOT NULL,
  `deptno` int(11) NOT NULL,
  `colno` int(11) NOT NULL,
  `progno` int(11) DEFAULT NULL,
  `campusno` int(11) NOT NULL,
  `postcolor` varchar(30) NOT NULL,
  `postApproval` varchar(10) NOT NULL,
  `postDelete` int(11) NOT NULL,
  `poststat` char(10) NOT NULL,
  PRIMARY KEY (`postno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postno`, `postdatetime`, `postTitleNo`, `postcontent`, `idno`, `actno`, `orgno`, `deptno`, `colno`, `progno`, `campusno`, `postcolor`, `postApproval`, `postDelete`, `poststat`) VALUES
(1, '2012-10-08 15:49:49', '', 'content/upload/images/Lighthouse.jpg', 100000, 0, 0, 0, 0, NULL, 1, '', 'approved', 1, 'active'),
(2, '2012-10-08 15:50:17', '', 'GUEST!!!,..', 100000, 0, 0, 0, 0, NULL, 1, 'green', 'approved', 1, 'active'),
(3, '2012-10-08 15:51:01', '', 'data:image/png;base64,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', 100000, 0, 0, 0, 0, NULL, 1, 'skyblue', 'approved', 1, 'active'),
(4, '2012-10-09 07:25:28', '', 'WAJA', 100000, 0, 0, 0, 0, NULL, 1, 'yellow', 'approved', 1, 'active'),
(5, '2012-10-09 07:29:52', '', 'Syrah mae Arguilles', 123456, 0, 2, 0, 0, 0, 1, 'yellow', 'approved', 1, 'active'),
(6, '2012-10-09 16:01:33', '', 'sample', 123456, 0, 2, 0, 0, 0, 1, 'red', 'approved', 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `posttitles`
--

CREATE TABLE IF NOT EXISTS `posttitles` (
  `postTitleNo` int(11) NOT NULL AUTO_INCREMENT,
  `posttitle` varchar(100) NOT NULL,
  `postitledateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idno` int(11) NOT NULL,
  `posttitlemgttype` int(11) NOT NULL,
  `campusno` int(11) NOT NULL,
  `posttitlestatus` char(10) NOT NULL,
  PRIMARY KEY (`postTitleNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `posttitles`
--


-- --------------------------------------------------------

--
-- Table structure for table `postvote`
--

CREATE TABLE IF NOT EXISTS `postvote` (
  `postno` int(11) NOT NULL,
  `idno` int(11) NOT NULL,
  `votedate` date NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postvote`
--

INSERT INTO `postvote` (`postno`, `idno`, `votedate`, `type`) VALUES
(7, 8, '2012-10-08', 1),
(7, 8, '2012-10-08', -1),
(2, 123456, '2012-10-08', 1),
(2, 123456, '2012-10-08', -1),
(5, 123456, '2012-10-09', 1),
(5, 123456, '2012-10-09', -1);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE IF NOT EXISTS `programs` (
  `progno` int(11) NOT NULL AUTO_INCREMENT,
  `progname` varchar(60) NOT NULL,
  `progacronyms` char(25) NOT NULL,
  `colno` int(11) NOT NULL,
  `orgno` int(11) DEFAULT NULL,
  `campusno` int(11) NOT NULL,
  `progaddedby` int(11) NOT NULL,
  `progtimeadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `progstat` char(10) NOT NULL,
  PRIMARY KEY (`progno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`progno`, `progname`, `progacronyms`, `colno`, `orgno`, `campusno`, `progaddedby`, `progtimeadded`, `progstat`) VALUES
(1, 'Bachelor of Science in Information Technology', 'BSIT', 1, NULL, 1, 123456, '2012-09-09 20:19:19', 'active'),
(2, 'Associate Information Technology', 'ACT', 1, NULL, 1, 123456, '2012-09-09 20:19:50', 'active'),
(3, 'Animation', 'Animation', 1, NULL, 1, 123456, '2012-09-09 20:20:07', 'active'),
(4, 'Bachelor of Business Administration', 'BSBA', 2, NULL, 1, 123456, '2012-09-09 20:20:42', 'active'),
(5, 'Bachelor of Science and Accountancy ', 'BSA', 2, NULL, 1, 123456, '2012-09-09 20:21:14', 'active'),
(6, 'Bachelor of Science in Human Resource Management', 'BSHRDM', 2, NULL, 1, 123456, '2012-09-09 20:22:30', 'active'),
(7, 'Bachelor of Science in Criminology', 'BSCRIM', 3, NULL, 1, 123456, '2012-09-09 20:23:12', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE IF NOT EXISTS `userdetails` (
  `idno` int(11) NOT NULL,
  `orgno` int(11) DEFAULT NULL,
  `deptno` int(11) DEFAULT NULL,
  `colno` int(11) DEFAULT NULL,
  `progno` int(11) DEFAULT NULL,
  `actno` int(11) DEFAULT NULL,
  `campusno` int(11) DEFAULT NULL,
  `useraddedby` int(11) NOT NULL,
  `userupdatedby` int(11) NOT NULL,
  `usertimeadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userstat` char(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`idno`, `orgno`, `deptno`, `colno`, `progno`, `actno`, `campusno`, `useraddedby`, `userupdatedby`, `usertimeadded`, `userstat`) VALUES
(123456, NULL, NULL, NULL, NULL, NULL, NULL, 123456, 0, '2012-08-30 08:24:02', 'active'),
(11, NULL, NULL, 1, 1, NULL, 1, 3, 0, '2012-09-20 23:30:48', 'active'),
(9, 1, NULL, 1, 2, NULL, 1, 3, 3, '2012-09-20 20:46:22', 'active'),
(10, NULL, NULL, 1, 1, NULL, 1, 3, 3, '2012-09-20 23:24:38', 'active'),
(8, 1, NULL, 1, NULL, NULL, 1, 3, 0, '2012-09-20 23:09:58', 'active'),
(7, 1, NULL, 1, NULL, NULL, 1, 3, 3, '2012-09-20 23:09:58', 'active'),
(6, 1, 1, NULL, NULL, NULL, 1, 2, 0, '2012-09-20 23:09:58', 'active'),
(5, 4, NULL, 1, 1, NULL, 1, 123456, 0, '2012-09-09 20:38:04', 'active'),
(12, NULL, NULL, NULL, NULL, NULL, 2, 123456, 0, '2012-09-19 19:35:41', 'active'),
(4, 1, NULL, NULL, NULL, NULL, 1, 123456, 0, '2012-09-09 20:37:00', 'active'),
(3, NULL, NULL, 1, NULL, NULL, 1, 123456, 0, '2012-09-09 20:36:18', 'active'),
(2, NULL, 1, NULL, NULL, NULL, 1, 123456, 0, '2012-09-09 20:35:22', 'active'),
(1, NULL, NULL, NULL, NULL, NULL, 1, 123456, 0, '2012-09-12 05:15:05', 'active'),
(20, NULL, NULL, NULL, NULL, NULL, 3, 123456, 0, '2012-09-25 10:55:41', 'active'),
(22, NULL, NULL, 2, NULL, NULL, 1, 123456, 0, '2012-09-25 11:02:27', 'active'),
(34, NULL, NULL, NULL, NULL, NULL, 4, 123456, 0, '2012-09-25 11:48:49', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `userguests`
--

CREATE TABLE IF NOT EXISTS `userguests` (
  `userguestidno` int(11) NOT NULL AUTO_INCREMENT,
  `userguestfname` varchar(30) NOT NULL,
  `userguestmname` varchar(30) NOT NULL,
  `userguestlname` varchar(30) NOT NULL,
  `userguestemail` varchar(50) NOT NULL,
  `usergueststatus` varchar(10) NOT NULL,
  PRIMARY KEY (`userguestidno`),
  UNIQUE KEY `userguestfname` (`userguestfname`,`userguestlname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `userguests`
--

INSERT INTO `userguests` (`userguestidno`, `userguestfname`, `userguestmname`, `userguestlname`, `userguestemail`, `usergueststatus`) VALUES
(1, 'guest', '', '', '', 'active'),
(2, 'Syrah', '', 'Arguilles', 'wenniethepooh4@yahoo.com', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `userheader`
--

CREATE TABLE IF NOT EXISTS `userheader` (
  `idno` int(11) NOT NULL,
  `userfname` varchar(60) NOT NULL,
  `userlname` varchar(60) NOT NULL,
  `usermidname` varchar(60) NOT NULL,
  `usergender` char(1) NOT NULL,
  `useremail` varchar(60) NOT NULL,
  `usercompname` varchar(70) DEFAULT NULL,
  `userbdate` date DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nickname` varchar(60) NOT NULL,
  `usertype` varchar(30) NOT NULL,
  PRIMARY KEY (`idno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userheader`
--

INSERT INTO `userheader` (`idno`, `userfname`, `userlname`, `usermidname`, `usergender`, `useremail`, `usercompname`, `userbdate`, `username`, `password`, `nickname`, `usertype`) VALUES
(123456, 'syrah mae', 'arguilles', 'alcuirez', 'f', 'wenniethepooh4@yahoo.com', NULL, NULL, 'syrah', '123456', 'syrah', 'super-admin'),
(9, 'a', 'a', 'a', 'f', 'a', NULL, NULL, NULL, NULL, '', 'user-col-stud'),
(8, 'cathy', 'wala', 'wala', 'f', 'cathywala@yahoo.com', NULL, NULL, 'cathy', '12345', '', 'user-col-staff'),
(7, 'jennifer ', 'amores', 'wala', 'f', 'jenniferamores@yahoo.com', NULL, NULL, NULL, NULL, '', 'user-col-fac'),
(6, 'argie', 'polgo', 'wala', 'f', 'argiepolgo@yahoo.com', NULL, NULL, 'argie', '12345', '', 'user-dept-emp'),
(5, 'angelica', 'bulotano', 'wala', 'f', 'angelicabulotano@yahoo.com', NULL, NULL, 'angelica', '12345', '', 'org-col-prog-admin'),
(2, 'harvey', 'cagape', 'wala', 'm', 'harveycagape@yahoo.com', NULL, NULL, 'harvey', '12345', '', 'dept-admin'),
(3, 'jake', 'arellano', 'wala', 'm', 'jakearellano@yahoo.com', NULL, NULL, 'jake', '12345', '', 'col-admin'),
(1, 'jocelyn', 'benlot', 'wala', 'f', 'jocelynbenlot@yahoo.com', NULL, NULL, 'jocelyn', '12345', '', 'campus-admin'),
(4, 'veverly', 'ricaza', 'wala', 'f', 'veverlyricaza@yahoo.com', NULL, NULL, 'veverly', '12345', '', 'org-campus-admin'),
(10, 'a', 'a', 'a', 'f', 'a', NULL, '2012-09-11', NULL, NULL, '', 'user-alumni'),
(11, 'b', 'b', 'b', 'f', 'b', NULL, '2012-09-18', NULL, NULL, '', 'user-alumni'),
(12, 'tata', 'arguilles', 'wala', 'm', 'tata@yahoo.com', NULL, NULL, 'tata', '12345', '', 'campus-admin'),
(20, 'campusadmin', 'campusadmin', 'wala', 'f', 'campuadmin@yahoo.com', NULL, NULL, 'campusadmin', '12345', '', 'campus-admin'),
(22, 'coladmin', 'coladmin', 'wala', 'f', 'coladmin@yahoo.com', NULL, NULL, 'coladmin', '12345', '', 'col-admin'),
(34, 'sample', 'sample', 'wala', 'f', 'sample@yahoo.com', NULL, NULL, 'sample', '12345', '', 'campus-admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
