-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 19, 2019 at 02:28 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gasagency`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationdate`) VALUES
(100, 'admin', 'admin', '2019-04-04 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

DROP TABLE IF EXISTS `connection`;
CREATE TABLE IF NOT EXISTS `connection` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `spname` varchar(100) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pin` bigint(20) NOT NULL,
  `cno` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `poi` varchar(255) NOT NULL,
  `cardNo` bigint(20) NOT NULL,
  `subsidy` varchar(25) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `accNo` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `sign` varchar(2555) NOT NULL,
  `user_email_status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connection`
--

INSERT INTO `connection` (`id`, `userid`, `name`, `dob`, `fname`, `mname`, `spname`, `gender`, `address`, `state`, `district`, `city`, `pin`, `cno`, `email`, `poi`, `cardNo`, `subsidy`, `bank`, `accNo`, `photo`, `sign`, `user_email_status`) VALUES
(21, 805730, 'Palash', '2004-03-17', 'Apurba', 'Rinu', 'Gedi', 'Male', 'Beltola', 'Assam', 'Kamrup', 'Guwahati', 781025, 5623147890, 'palashpratim60@gmail.com', 'Aadhaar Card', 1111111111000000, 'No', 'SBI', '45210369', 'photo1.JPG', 'IMG_20180104_131135.jpg', 'Accepted'),
(24, 703843, 'Dulusmita Bora', '2019-03-31', 'Pramod Bora', 'Ukhamoni Bora', '', 'Female', 'Dhekial', 'Assam', 'Golaghat', 'Dhekial', 785622, 4512360125, 'dulusmita.bora222@gmail.com', 'Voter ID', 1111111111111111, 'No', 'PNB', 'PNB42102365', 'girl_redhead_tattoo_face_model_69728_3840x2160.jpg', 'Sports.jpg', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `orderdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentmethod` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `orderdate`, `paymentmethod`, `status`) VALUES
(21, 957983, '2019-06-04 06:58:54', 'cod', NULL),
(15, 957983, '2019-05-11 06:40:08', 'cod', NULL),
(16, 703843, '2019-05-16 15:08:40', 'cod', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

DROP TABLE IF EXISTS `ordertrackhistory`;
CREATE TABLE IF NOT EXISTS `ordertrackhistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `remark` mediumtext NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderid`, `status`, `remark`, `postingdate`) VALUES
(1, 6, 'in Process', 'Your order is being processed..', '2019-04-12 15:27:14'),
(2, 6, 'Delivered', 'Dilu kela delivery', '2019-04-12 15:28:02'),
(3, 13, 'Delivered', 'dfhsrtherth', '2019-05-13 15:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

DROP TABLE IF EXISTS `query`;
CREATE TABLE IF NOT EXISTS `query` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
