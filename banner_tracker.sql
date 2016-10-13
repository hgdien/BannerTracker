-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 10, 2010 at 06:06 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banner_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `bs1_associate`
--

CREATE TABLE IF NOT EXISTS `bs1_associate` (
  `AssociateID` int(11) NOT NULL AUTO_INCREMENT,
  `BannerID` int(11) NOT NULL,
  `CampaignID` int(11) NOT NULL,
  PRIMARY KEY (`AssociateID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `bs1_associate`
--


-- --------------------------------------------------------

--
-- Table structure for table `bs1_banner`
--

CREATE TABLE IF NOT EXISTS `bs1_banner` (
  `BannerID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Desc` varchar(400) NOT NULL,
  `Link` varchar(200) NOT NULL,
  `Date` date NOT NULL,
  `ClickCount` int(11) NOT NULL,
  PRIMARY KEY (`BannerID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `bs1_banner`
--


-- --------------------------------------------------------

--
-- Table structure for table `bs1_campaign`
--

CREATE TABLE IF NOT EXISTS `bs1_campaign` (
  `CampaignID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Desc` varchar(400) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`CampaignID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `bs1_campaign`
--


-- --------------------------------------------------------

--
-- Table structure for table `bs1_click`
--

CREATE TABLE IF NOT EXISTS `bs1_click` (
  `ClickID` int(11) NOT NULL AUTO_INCREMENT,
  `BannerID` int(11) NOT NULL,
  `Date` int(11) NOT NULL,
  PRIMARY KEY (`ClickID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `bs1_click`
--


-- --------------------------------------------------------

--
-- Table structure for table `bs1_user`
--

CREATE TABLE IF NOT EXISTS `bs1_user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `bs1_user`
--

INSERT INTO `bs1_user` (`UserID`, `UserName`, `Password`) VALUES
(2, 'hgdien', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
