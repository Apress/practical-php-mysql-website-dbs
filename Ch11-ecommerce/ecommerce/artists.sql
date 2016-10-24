-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 08, 2013 at 06:59 PM
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
-- Table structure for table `artists`
--

CREATE TABLE IF NOT EXISTS `artists` (
  `artist_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `afname` varchar(30) DEFAULT NULL,
  `amname` varchar(30) DEFAULT NULL,
  `alname` varchar(30) NOT NULL,
  PRIMARY KEY (`artist_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artist_id`, `afname`, `amname`, `alname`) VALUES
(1, 'Adrian', 'W', 'West'),
(2, 'Roger', 'St.', 'Barbe'),
(3, 'James', '', 'Kessell'),
(4, 'Charlie', 'S', 'Farnsbarns');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
