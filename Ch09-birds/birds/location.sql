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
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` mediumint(3) unsigned NOT NULL AUTO_INCREMENT,
  `location` tinytext NOT NULL,
  `location_type` tinytext NOT NULL,
  `bird_id` mediumint(4) unsigned NOT NULL,
  PRIMARY KEY (`location_id`),
  KEY `bird_id` (`bird_id`),
  KEY `bird_id_2` (`bird_id`),
  KEY `bird_id_3` (`bird_id`),
  KEY `bird_id_4` (`bird_id`),
  KEY `bird_id_5` (`bird_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location`, `location_type`, `bird_id`) VALUES
(1, 'Southpark', 'Ponds', 4),
(2, 'Westlands', 'Estuary', 3),
(3, 'Lakeland', 'Lakes', 1),
(4, 'Moorfield', 'Moorland', 2),
(5, 'Heathville', 'Heath', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`bird_id`) REFERENCES `birds` (`bird_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
