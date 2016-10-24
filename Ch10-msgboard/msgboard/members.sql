-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 10, 2013 at 08:06 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `theforumdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(12) NOT NULL,
  `email` varchar(60) NOT NULL,
  `psword` char(40) NOT NULL,
  `reg_date` datetime NOT NULL,
  `member_level` tinyint(2) NOT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `uname`, `email`, `psword`, `reg_date`, `member_level`) VALUES
(1, 'lilythepink', 'jsmith@myisp.co.uk', '142538398d314976ea42f3ced3f7ac21fe04d051', '2013-06-26 14:58:38', 0),
(4, 'giantstep12', 'ndean@myisp.co.uk', 'c49cf9693d9e55792d7b1eae8df555dcd9407861', '2013-06-26 15:34:16', 0),
(5, 'mechanic7', 'jdoe@myisp.co.uk', '594df833c346b9a1502a64d3c7e478b4d2497d8f', '2013-06-26 19:02:25', 0),
(6, 'skivvy', 'jsmith@outcook.com', 'dd7389b52807de1b3682b746a33c675a8cf9b945', '2013-07-01 18:25:24', 1),
(7, 'mythking', 'fincense@myisp.net', '738cb4689523ce580dde81a08f60d7f75bc8065d', '2013-07-01 18:57:08', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
