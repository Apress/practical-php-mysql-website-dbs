-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 28, 2013 at 09:20 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lmnmigrate`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `psword` char(40) NOT NULL,
  `uname` char(12) NOT NULL,
  `registration_date` datetime NOT NULL,
  `class` char(20) NOT NULL,
  `user_level` tinyint(2) unsigned NOT NULL,
  `addr1` varchar(50) NOT NULL,
  `addr2` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `county` char(20) NOT NULL,
  `pcode` char(10) NOT NULL,
  `phone` char(11) DEFAULT NULL,
  `paid` enum('No','Yes') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `title`, `fname`, `lname`, `email`, `psword`, `uname`, `registration_date`, `class`, `user_level`, `addr1`, `addr2`, `city`, `county`, `pcode`, `phone`, `paid`) VALUES
(1, 'Mr', 'Jack', 'Smith', 'jsmith@outcook.com', 'bda7aeb2f7a4cf6f6f26b7c9e96e009913b2594b', 'wagglytail', '2013-01-05 20:34:41', '30', 1, '1 The Street', '', 'Townsville', 'Devon', 'EX12 6RE', '', 'Yes'),
(2, 'Mr', 'James', 'Smith', 'jsmith@myisp.co.uk', '34ae707a963ad8a1fb248f8c1f50a4d3d5dd2e64', 'muscleman', '2013-01-06 11:37:02', '30', 0, '3 The Street', 'The Village', 'Townsville', 'Devon', 'EX12 8RE', '', 'Yes'),
(3, 'Mr', 'Mike', 'Rosoft', 'miker@myisp.com', '315806a3a2ae3ae81d1294746df09ac6ceaa587c', 'benefactor', '2013-02-02 13:02:34', '125', 0, '4 The Street', 'The Village', 'Townsville', 'Devon', 'EX14 6RE', '011114446', 'Yes'),
(4, 'Ms', 'Olive', 'Branch', 'obranch@myisp.co.uk', 'e832f6808645a6c6304fd90e99f5685c1403b245', 'mspopeye', '2013-02-02 13:06:09', '30', 0, '4 The Street', 'The Village', 'Townsville', 'Devon', 'EX12 6RE', '', 'Yes'),
(5, 'Mr', 'Frank', 'Incense', 'fincense@myisp.net', '71ea58aa789b63d377fa73c441348da5840bd0dc', 'mythking', '2013-02-02 13:08:39', '30', 0, '5 The Street', '', 'Townsville', 'Devon', 'EX24 6PG', '01111 444 6', 'Yes'),
(52, 'Mrs', 'Annie', 'Versary', 'aversary@myisp.com', '2f635f6d20e3fde0c53075a84b68fb07dcec9b03', 'celebrate', '2013-03-29 12:13:30', '30', 0, '6 The Street', 'The Village', 'Townsville', 'Devon', 'EX12 6RE', '', 'Yes'),
(53, 'Mr', 'Terry', 'Fide', 'tforide@myisp.co.uk', '55deee02330052a7bb715168f9405b33ef752662', 'trembling', '2013-03-29 12:17:21', '30', 0, '8 The Street', '', 'Townsville', 'Devon', 'EX12 6RE', '', 'Yes'),
(54, 'Mrs', 'Annie', 'Mossity', 'amossity@myisp.org.uk', '5097e90d39e6fd70da7651222a400b843e77bc56', 'acrimony', '2013-03-29 12:27:52', '30', 0, '9 The Street', '', 'Townsville', 'Devon', 'EX12 6RE', '01111 622 3', 'Yes'),
(55, 'Mr', 'Percy', 'Veer', 'pveer@myisp.com', '4ac6f592d402e8f092fc0d9ce146f19e2cc089f7', 'doggedly', '2013-03-29 12:37:18', '30', 0, '9 The Street', '', 'Townsville', 'Devon', 'EX12 6RE', '', 'Yes'),
(56, 'Mr', 'Darrel', 'Doo', 'ddoo@myisp.co.uk', 'a34b2d93b414ea65c52ac05fb5aac57041ded75b', 'contented', '2013-03-29 12:41:12', '30', 0, '10 The Street', 'The Village', 'Townsville', 'Devon', 'EX12 6RE', '01234 777 6', 'Yes'),
(57, 'Mr', 'Stan', 'Dard', 'sdard@myisp.net', 'c46b524b22c5e2b8633474eb8045a8bab5bfef1c', 'warbanner', '2013-03-29 15:41:07', '30', 0, '10 The Street', '', 'Townsville', 'Devon', 'EX12 6RE', '', 'Yes'),
(58, 'Miss', 'Nora', 'Bone', 'nbone@myisp.com', '916671ef4cc4c2348d55d7d9da64340afef9c57d', 'strongteeth', '2013-03-29 15:55:35', '30', 0, '11 The Street', 'The Village', 'Townsville', 'Devon', 'EX12 6RE', '01297123123', 'Yes'),
(59, 'Mrs', 'Barry', 'Cade', 'bcade@myisp.co.uk', '2496e6e4e2f44fb00a6111369e0d8e108a8e3777', 'mybarrier', '2013-03-29 15:57:43', '30', 0, '12 The Street', '', 'Townsville', 'Devon', 'EX12 6RE', '01297 77777', 'Yes'),
(60, 'Miss', 'Dee', 'Jected', 'djected@myisp.org.uk', '9b5a7d91f8f01eb9cb45b3fe4b349f6699ca44d7', 'pessimist', '2013-03-29 16:57:33', '30', 0, '13 The Sreet', '', 'Townsville', 'Devon', 'EX12 6RE', '01297553888', 'Yes'),
(61, 'Mrs', 'Lynn', 'Seed', 'lseed@myisp.com', 'a2614195adf5952916965acba1b4111058453ba4', 'artistic', '2013-03-29 17:10:19', '30', 0, '14 The Street', 'The Village', 'Townsville', 'Devon', 'EX12 6RE', '', 'Yes'),
(62, 'Mr', 'Barry', 'Tone', 'btone@myisp.net', '4070f1e15f4b49a01213ec61164b90100354fcf6', 'midrange', '2013-03-29 17:13:00', '30', 0, '15 The Street', '', 'Townsville', 'Devon', 'EX12 6RE', '10297555444', ''),
(65, 'Miss', 'Minnie', 'Mouse', 'mmouse@myisp.co.uk', 'c9b80bb35f975546bd0533520f529b9c294ccf42', 'cheesy', '2013-03-31 11:08:40', '30', 0, '55 Astbury Street', '', 'Townsville', 'Devon', 'EX12 6RE', '01111222333', ''),
(66, 'Mrs', 'Rose', 'Bush', 'rbush@myisp.co.uk', '0f2ded3794a9f1ae11c2aba8ff6dff00dd1e4ac6', 'pricklystems', '2013-03-31 16:46:08', '30', 0, '8 The Street', 'The Village', 'Townsville', 'Cornwall', 'EX12 6RE', '01234777666', 'Yes');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
