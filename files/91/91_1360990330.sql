-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2013 at 11:33 PM
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
-- Table structure for table `deals`
--

CREATE TABLE IF NOT EXISTS `deals` (
  `client_id` int(30) NOT NULL COMMENT 'Owner Client',
  `deal_id` int(30) NOT NULL AUTO_INCREMENT COMMENT 'Deal ID',
  `deal_name` varchar(50) NOT NULL COMMENT 'Title',
  `deal_text` text NOT NULL COMMENT 'Description',
  `deal_img` varchar(200) NOT NULL COMMENT 'Img path',
  `deal_start` date NOT NULL COMMENT 'Start date',
  `deal_end` date NOT NULL COMMENT 'End date',
  `deal_redemptions` int(10) NOT NULL COMMENT '# redemptions',
  `deal_max` int(10) NOT NULL COMMENT 'Max avail',
  KEY `deal_id` (`deal_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`client_id`, `deal_id`, `deal_name`, `deal_text`, `deal_img`, `deal_start`, `deal_end`, `deal_redemptions`, `deal_max`) VALUES
(1, 1, 'Deal from Database', 'This is the dopest deal ever. Test deal text this is a big fat test text description. Test deal text this is a big fat test text description. Test deal text this is a big fat test text description. Test deal text this is a big fat test text description.', 'https://lastpass.com/media/pressroom/LastPassButton100x100.gif', '2012-10-01', '2013-10-31', 0, 100),
(2, 2, 'Some Deal from the Database', 'Test deal text this is a big fat test text description. Test deal text this is a big fat test text description. Test deal text this is a big fat test text description.', 'https://lastpass.com/media/pressroom/LastPassButton100x100.gif', '2012-10-01', '2013-10-31', 0, 100),
(3, 3, 'Another deal from the database', 'test deal text test deal text test deal text test deal text test deal text test deal text test deal text test deal texttest deal text test deal text test deal text test deal text test deal text', 'https://lastpass.com/media/pressroom/LastPassButton100x100.gif', '2012-10-01', '2013-10-26', 0, 100);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
