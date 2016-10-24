-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 08, 2013 at 07:03 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopperdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE IF NOT EXISTS `buyers` (
  `buyer_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` tinytext NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `psword` char(40) NOT NULL,
  `user_level` int(2) unsigned NOT NULL,
  `addr1` varchar(50) NOT NULL,
  `addr2` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `county` char(15) NOT NULL,
  `pcode` char(10) NOT NULL,
  `phone` char(10) DEFAULT NULL,
  PRIMARY KEY (`buyer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`buyer_id`, `title`, `fname`, `lname`, `email`, `psword`, `user_level`, `addr1`, `addr2`, `city`, `county`, `pcode`, `phone`) VALUES
(1, 'Mr', 'Dan', 'Druff', 'ddruff@myisp.co.uk', '41de553831e9d0e7f32c6167b08f013505d2becb', 51, '1 The Street', '', 'Townsville', 'Devon', 'EX01 9ZZ', ''),
(7, 'Mrs', 'Rose', 'Bush', 'rbush@myisp.co.uk', '0f2ded3794a9f1ae11c2aba8ff6dff00dd1e4ac6', 0, '2 The Street', '', 'Townsville', 'Devon', 'EX12 9ZZ', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
