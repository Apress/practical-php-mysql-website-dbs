-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 08, 2013 at 06:53 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(12) CHARACTER SET utf8 NOT NULL,
  `fname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `lname` varchar(40) CHARACTER SET utf8 NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 NOT NULL,
  `psword` char(40) CHARACTER SET utf8 NOT NULL,
  `reg_date` datetime NOT NULL,
  `user_level` int(2) NOT NULL,
  `addr1` varchar(50) NOT NULL,
  `addr2` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `county` varchar(30) NOT NULL,
  `pcode` varchar(10) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `title`, `fname`, `lname`, `email`, `psword`, `reg_date`, `user_level`, `addr1`, `addr2`, `city`, `county`, `pcode`, `phone`) VALUES
(1, 'Mr', 'Mike', 'Rosoft', 'miker@myisp.com', '315806a3a2ae3ae81d1294746df09ac6ceaa587c', '2013-09-07 18:54:49', 51, '2 The Street', NULL, 'Townsville', 'Devon', 'EY5 6ZZ', NULL),
(2, 'Mrs', 'Rose', 'Bush', 'rbush@myisp.co.uk', '0f2ded3794a9f1ae11c2aba8ff6dff00dd1e4ac6', '2013-09-13 12:30:11', 0, '2 The Srreet', NULL, 'Townsville', 'Devon', 'EY5 6ZZ', NULL),
(3, 'Mr', 'Dan', 'Druff', 'ddruff@myisp.co.uk', '41de553831e9d0e7f32c6167b08f013505d2becb', '2013-09-13 12:32:00', 0, '2 The Street', '', 'Townsville', 'Devon', 'EX24 1AA', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
