-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 06, 2014 at 08:37 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `median_vip`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
  `user_id` int(10) NOT NULL,
  `year` int(4) NOT NULL,
  `make` varchar(15) NOT NULL,
  `model` varchar(15) NOT NULL,
  `trim` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  `parent_cat` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `parent_cat`) VALUES
(45, 'Air & Fuel Delivery', 0),
(46, 'Brake Systems', 0),
(47, 'Chassis & Suspension', 0),
(48, 'Cooling & Heating', 0),
(49, 'Drivetrain', 0),
(50, 'Engines & Components', 0),
(51, 'Exhaust', 0),
(52, 'Exterior & Accessories', 0),
(53, 'Fasteners & Hardware', 0),
(54, 'Fittings & Hoses', 0),
(55, 'Gaskets & Seals', 0),
(56, 'Gauges & Accessories', 0),
(57, 'Ignitions & Electrical', 0),
(58, 'Interior & Accessories', 0),
(59, 'Mobile Electronics', 0),
(60, 'Oils, Fluids & Sealer', 0),
(61, 'Outdoor & Recreation', 0),
(62, 'Paints & Finishing', 0),
(63, 'Safety Equipment', 0),
(64, 'Tools & Shop Equipment', 0),
(65, 'Wheels & Tires', 0),
(66, 'Detailing Services', 0),
(67, 'Mechanical Services', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deal2cat`
--

CREATE TABLE IF NOT EXISTS `deal2cat` (
  `deal_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deal2cat`
--

INSERT INTO `deal2cat` (`deal_id`, `cat_id`) VALUES
(45, 45),
(46, 47),
(46, 48),
(46, 49),
(46, 50),
(46, 51),
(46, 52),
(46, 53);

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE IF NOT EXISTS `dealers` (
  `dealer_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Dealer ID',
  `user_id` int(20) NOT NULL COMMENT 'User_id',
  `dealer_name` varchar(50) NOT NULL COMMENT 'Dealer Name',
  `dealer_address1` varchar(50) NOT NULL COMMENT 'Address 1',
  `dealer_address2` varchar(50) NOT NULL COMMENT 'Address 2',
  `dealer_state` varchar(20) NOT NULL COMMENT 'State',
  `dealer_zip` varchar(15) NOT NULL COMMENT 'Zip',
  `dealer_phone` varchar(20) NOT NULL COMMENT 'Phone',
  `dealer_email` varchar(30) NOT NULL COMMENT 'dealer email',
  `start_date` date NOT NULL COMMENT 'Start Date',
  `end_date` date NOT NULL COMMENT 'End Date',
  `dealer_active` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Active',
  PRIMARY KEY (`dealer_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`dealer_id`, `user_id`, `dealer_name`, `dealer_address1`, `dealer_address2`, `dealer_state`, `dealer_zip`, `dealer_phone`, `dealer_email`, `start_date`, `end_date`, `dealer_active`) VALUES
(1, 91, 'MadMike''s Bikes', '4242 Asshat St.', '', 'VT', '01851', '603-866-0727', 'astraffin@everonit.com', '2014-05-29', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE IF NOT EXISTS `deals` (
  `dealer_id` int(30) NOT NULL COMMENT 'Owner Client',
  `deal_id` int(30) NOT NULL AUTO_INCREMENT COMMENT 'Deal ID',
  `deal_name` varchar(50) NOT NULL COMMENT 'Title',
  `deal_text` text NOT NULL COMMENT 'Description',
  `deal_img` varchar(200) NOT NULL COMMENT 'Img path',
  `deal_start` date NOT NULL COMMENT 'Start date',
  `deal_end` date NOT NULL COMMENT 'End date',
  `deal_oprice` decimal(10,2) NOT NULL COMMENT 'Original Price',
  `deal_vprice` decimal(10,2) NOT NULL COMMENT 'VIP Price',
  `deal_redemptions` int(10) NOT NULL COMMENT '# redemptions',
  `deal_max` int(10) NOT NULL COMMENT 'Max avail',
  `deal_active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`deal_id`),
  KEY `deal_id` (`deal_id`),
  KEY `deal_id_2` (`deal_id`),
  KEY `deal_id_3` (`deal_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`dealer_id`, `deal_id`, `deal_name`, `deal_text`, `deal_img`, `deal_start`, `deal_end`, `deal_oprice`, `deal_vprice`, `deal_redemptions`, `deal_max`, `deal_active`) VALUES
(1, 46, 'test deal', 'test deal', 'files/91/91_1403370900.jpg', '2014-06-21', '0000-00-00', '100.00', '75.00', 0, 0, 1),
(1, 45, 'Deal of a lifetime', 'This is the general description of the deal. This is the general description of the deal. This is the general description of the deal. This is the general description of the deal. \r\n\r\nThis is the general description of the deal. This is the general description of the deal. \r\nThis is the general description of the deal. This is the general description of the deal. This is the general description of the deal. \r\n\r\nThis is the general description of the deal. \r\nThis is the general description of the deal. This is the general description of the deal. This is the general description of the deal. \r\n\r\nThis is the general description of the deal. This is the general description of the deal. This is the general description of the deal. ', 'files/91/91_1401403927.png', '2014-05-29', '0000-00-00', '88.00', '65.00', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user2cat`
--

CREATE TABLE IF NOT EXISTS `user2cat` (
  `user_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user2cat`
--

INSERT INTO `user2cat` (`user_id`, `cat_id`) VALUES
(91, 45),
(91, 46),
(91, 47),
(91, 48),
(91, 49),
(91, 50),
(91, 51),
(91, 52),
(91, 53),
(91, 54),
(91, 56),
(91, 57),
(91, 58);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'AI UID',
  `username` varchar(30) NOT NULL COMMENT 'usernames',
  `fname` varchar(30) NOT NULL COMMENT 'First Name',
  `lname` varchar(30) NOT NULL COMMENT 'Last Name',
  `address1` varchar(50) NOT NULL COMMENT 'Address 1',
  `address2` varchar(50) NOT NULL COMMENT 'Address 2',
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` int(10) NOT NULL,
  `email` varchar(50) NOT NULL COMMENT 'email',
  `birthdate` date NOT NULL,
  `income` int(4) NOT NULL COMMENT '1=25k, 2=24-25, 3=45-75. 4=75+',
  `hashed_password` varchar(40) NOT NULL COMMENT 'Hashed Passwords (SHA1)',
  `is_setup` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Setup (Selections)',
  `is_dealer` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Dealer (Dealer Tools)',
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `alerts` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=yes, 0=no',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `email` (`email`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `fname`, `lname`, `address1`, `address2`, `city`, `state`, `zip`, `email`, `birthdate`, `income`, `hashed_password`, `is_setup`, `is_dealer`, `start_date`, `alerts`) VALUES
(91, 'astraffin', 'Alex', 'Straffin', '1975 Middlesex St.', 'Unit #48', 'Lowell', 'MA', 1851, 'alex.straffin@gmail.com', '1984-06-09', 3, 'cfbcc814f03543ef38fe70a456e1f83e3bb61cf5', 1, 1, '2014-05-29 22:50:57', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
