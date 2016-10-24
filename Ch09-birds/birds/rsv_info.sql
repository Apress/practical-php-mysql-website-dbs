-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2013 at 11:42 AM
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
-- Table structure for table `rsv_info`
--

CREATE TABLE IF NOT EXISTS `rsv_info` (
  `rsv_id` mediumint(4) unsigned NOT NULL AUTO_INCREMENT,
  `bird_hides` enum('yes','no') NOT NULL,
  `entr_memb` tinytext NOT NULL,
  `entr_n_memb` tinytext NOT NULL,
  `location_id` mediumint(4) unsigned NOT NULL,
  PRIMARY KEY (`rsv_id`),
  KEY `location_id` (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `rsv_info`
--

INSERT INTO `rsv_info` (`rsv_id`, `bird_hides`, `entr_memb`, `entr_n_memb`, `location_id`) VALUES
(1, 'yes', 'Free', '£1', 1),
(2, 'yes', '£1', '£2', 2),
(3, 'yes', 'Free', '£1', 3),
(4, 'no', 'Free', 'Free', 4),
(5, 'no', 'Free', 'Free', 5);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rsv_info`
--
ALTER TABLE `rsv_info`
  ADD CONSTRAINT `rsv_info_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
