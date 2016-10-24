-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 10, 2013 at 08:03 PM
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
-- Table structure for table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `post_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(12) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `message` text NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`post_id`, `uname`, `subject`, `message`, `post_date`) VALUES
(1, 'lilythepink', 'Wise Quotes', '"Adversity causes some men to break: others to break records" William Arthur Ward', '2013-07-02 21:21:54'),
(2, 'mechanic7', 'Comical Quotes', '"I love deadlines. I like the whooshing sound they make as they fly by" Douglas Adams', '2013-06-26 19:52:48'),
(3, 'lilythepink', 'Comical Quotes', '"Golf is a good walk spoiled" Mark Twain', '2013-06-26 16:02:56'),
(4, 'lilythepink', 'Comical Quotes', '"Life is one darned thing after another" Mark Twain', '2013-06-26 16:37:23'),
(5, 'giantstep12', 'Comical Quotes', 'Jack Benny once said "Give me golf clubs, fresh air and a beautiful partner and you can keep the golf clubs and fresh air"', '2013-06-26 18:17:54'),
(6, 'mythking', 'Wise Quotes', '"Nothing great was ever achieved without great enthusiasm" Ralph Waldo Emerson', '2013-07-03 12:29:31'),
(7, 'mythking', 'Wise Quotes', '"Wise sayings often fall on barren ground, but a kind word is never thrown away" Arthur Helps', '2013-07-03 12:31:48'),
(8, 'mythking', 'Comical Quotes', '"Many a small thing has been made large by the right kind of advertising" Mark Twain', '2013-07-03 17:46:04'),
(9, 'mythking', 'Wise Quotes', '"To do two things at once is to do neither" Publilius Syrus', '2013-07-03 17:52:20'),
(11, 'giantstep12', 'Wise Quotes', '"Anyone who has never made a mistake has never tried anything new" Albert Einstein', '2013-07-03 20:33:01'),
(13, 'giantstep12', 'Comical Quotes', '"Experience is simply the name we give our mistakes" Oscar Wilde', '2013-07-04 11:04:22'),
(14, 'giantstep12', 'Comical Quotes', '"If you want to recapture your youth, just cut off his allowance" Al Bernstein', '2013-07-04 11:30:52'),
(17, 'mechanic7', 'Comical Quotes', '"Technological progress has merely provided us with a more efficient means for going backwards" Aldous Huxley', '2013-07-04 15:01:34'),
(28, 'lilythepink', 'Wise Quotes', '"Real knowledge is to know the extent of one''s ignorance" Confucius', '2013-07-06 11:51:21'),
(29, 'mechanic7', 'Wise Quotes', '"It is amazing what you can accomplish if you do not care who gets the credit" Harry. S. Truman', '2013-07-06 12:03:55');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
