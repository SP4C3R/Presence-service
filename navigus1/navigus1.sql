-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2020 at 06:31 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `navigus1`
--

-- --------------------------------------------------------

--
-- Table structure for table `filevisit`
--

CREATE TABLE IF NOT EXISTS `filevisit` (
  `srno` int(11) NOT NULL AUTO_INCREMENT,
  `fid` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `current` text NOT NULL,
  `last` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `previous` text NOT NULL,
  PRIMARY KEY (`srno`),
  UNIQUE KEY `srno` (`srno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `filevisit`
--

INSERT INTO `filevisit` (`srno`, `fid`, `email`, `current`, `last`, `previous`) VALUES
(8, '5ecbfbad00fd5', 'gshivang682@gmail.com', 'open', '2020-05-26 01:18:16', 'working');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `srno` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` text NOT NULL,
  `connection` text NOT NULL,
  `timeout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `totaltime` text NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `srno` (`srno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`srno`, `name`, `phone`, `email`, `password`, `image`, `connection`, `timeout`, `totaltime`) VALUES
(20, 'Shivang Gupta', '8729013108', 'gshivang682@gmail.com', 'shivang16', 'img/profile.png', 'open', '2020-05-25 11:17:03', '50-5-7 11:17:3'),
(18, 'Prince', '9988489350', 'princegoyal155@gmail.com', 'shivang16', 'img/profile.png', 'close', '2020-05-24 06:50:33', '0-0-0 0:0:15'),
(17, 'shivang', '8729013108', 'shivang16gupta@gmail.com', 'shivang16', 'img/profile.png', 'close', '2020-05-24 06:49:39', '0-0-0 0:0:58');

-- --------------------------------------------------------

--
-- Table structure for table `sfile`
--

CREATE TABLE IF NOT EXISTS `sfile` (
  `srno` int(11) NOT NULL AUTO_INCREMENT,
  `fileID` varchar(20) NOT NULL,
  `fileAD` text NOT NULL,
  PRIMARY KEY (`srno`),
  UNIQUE KEY `srno` (`srno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sfile`
--

INSERT INTO `sfile` (`srno`, `fileID`, `fileAD`) VALUES
(1, '5ecbfbad00fd5', 'files/1590426541truYum-use-case-specification.pdf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
