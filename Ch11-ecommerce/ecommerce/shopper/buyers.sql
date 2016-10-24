-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 04, 2013 at 08:16 PM
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
  PRIMARY KEY (`buyer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`buyer_id`, `title`, `fname`, `lname`, `email`, `psword`, `user_level`) VALUES
(2, 'Mr', 'Jim', 'Nastics', 'jnastics@myisp.com', 'f62d888cbc60e8661231fca132b6e47dbc9dedf0', 51),
(1, 'Mr', 'Dan', 'Druff', 'ddruff@myisp.co.uk', '41de553831e9d0e7f32c6167b08f013505d2becb', 0),
(3, 'Miss', 'June', 'Ipper', 'jipper@myisp.com', 'ed95d57f53dfaeff38b53d71d119f5e629755c1f', 0),
(4, 'Mrs', 'Grace', 'Full', 'gfull@myisp.org.uk', 'b6693b8cac7ad1bc1090b19afb0c11487459c077', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
