-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2013 at 11:41 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `birdsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `birds`
--

CREATE TABLE IF NOT EXISTS `birds` (
  `bird_id` mediumint(4) unsigned NOT NULL AUTO_INCREMENT,
  `bird_name` tinytext NOT NULL,
  `rarity` tinytext NOT NULL,
  `best_time` tinytext NOT NULL,
  PRIMARY KEY (`bird_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `birds`
--

INSERT INTO `birds` (`bird_id`, `bird_name`, `rarity`, `best_time`) VALUES
(1, 'Goldeneye', 'Common', 'Winter'),
(2, 'Wryneck', 'Rare', 'Summer'),
(3, 'Avocet', 'Common', 'Winter'),
(4, 'Moorhen', 'Common', 'Any time');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
