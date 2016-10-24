-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 07, 2013 at 09:22 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `estatedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE IF NOT EXISTS `houses` (
  `ref_num` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  `loctn` tinytext NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `type` tinytext NOT NULL,
  `mini_descr` varchar(100) NOT NULL,
  `b_rooms` tinyint(2) NOT NULL,
  `thumb` varchar(45) NOT NULL,
  `status` tinytext NOT NULL,
  `full_spec` varchar(60) NOT NULL,
  PRIMARY KEY (`ref_num`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1034 ;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`ref_num`, `loctn`, `price`, `type`, `mini_descr`, `b_rooms`, `thumb`, `status`, `full_spec`) VALUES
(1000, 'South_Devon', 350000.00, 'Det-bung', 'New property in rural situation but close to village shops', 3, 'images/house01-191.gif', 'Sold', '<a href=#''>Details</a>'),
(1001, 'North_Devon', 320000.00, 'Det-bung', 'Delightful rural location but close to village shops', 3, 'images/house01-191.gif', 'Available', '<a href=#''>Details</a>'),
(1002, 'Mid_Devon', 300000.00, 'Det-bung', 'Delightful rural location but close to village shops', 3, 'images/house01-191.gif', 'Available', '<a href=#''>Details</a>'),
(1003, 'South_Devon', 400000.00, 'Det-house', 'Located on the outskirts of a thriving town. Stunning rural views.', 4, 'images/house10-151.gif', 'Available', '<a href=''descriptions/spec_1003.php''>Details</a>'),
(1004, 'North_Devon', 380000.00, 'Det-house', 'Semi rural location within walking distance of Townsville ', 4, 'images/house10-151.gif', 'Available', '<a href=#''>Details</a>'),
(1005, 'Mid_Devon', 360000.00, 'Det-house', 'Located on the edge of the town of Townsville.', 4, 'images/house10-151.gif', 'Available', '<a href=#''>Details</a>'),
(1006, 'Mid_Devon', 330000.00, 'Det-house', 'Semi rural with magnificent views of the countryside', 4, 'images/house10-151.gif', 'Available', '<a href=#''>Details</a>'),
(1007, 'South_Devon', 390000.00, 'Det-house', 'A town house with rural views. Located close to shops. ', 4, '"images/house12-102.gif"', 'Available', '<a href=#''>Details</a>'),
(1008, 'Mid_Devon', 390000.00, 'Det-house', 'New build in rural loaction within walking distance of shops.', 4, '"images/house02-120.gif"', 'Available', '<a href=#''>Details</a>'),
(1009, 'South_Devon', 390000.00, 'Det-house', 'A town house with character ', 4, '"images/house06-126.gif"', 'Available', '<a href=#''>Details</a>'),
(1010, 'South_Devon', 295000.00, 'Det_house', 'In need of refurbishment', 4, '"images/house06-126.gif"', 'Available', '<a href=#''>Details</a>'),
(1011, 'South_Devon', 295000.00, 'Det-house', 'In need of refurbishment', 4, '"images/house06-126.gif"', 'Available', '<a href=#''>Details</a>'),
(1012, 'South_Devon', 350000.00, 'Semi-det-house', 'Recently refurbished throughout. Quiet urban location.', 3, '"images/house03-137-semi.gif"', 'Available', ''),
(1013, 'South_Devon', 290000.00, 'Semi-det-house', 'Grade 2 Listed. Needs some refurbishment  Quiet rural location.', 3, '"images/house09-semi-110.gif"', 'Available', ''),
(1014, 'South_Devon', 290000.00, 'Det-house', 'Modern town house in quiet location', 3, '"images/house12-102.gif"', 'Available', ''),
(1015, 'North_Devon', 390000.00, 'Det-house', 'Modern town house in quiet location', 3, '"images/house10-151.gif"', 'Available', ''),
(1016, 'North_Devon', 290000.00, 'Sem-det-bung', 'Modern bugalow in quiet location', 3, '"images/bung13-semi-thumb.gif"', 'Available', ''),
(1017, 'North_Devon', 250000.00, 'Sem-det-bung', 'Modern bungalow in quiet location', 2, '"images/bung13-semi-thumb.gif"', 'Available', ''),
(1018, 'North_Devon', 150000.00, 'Det-bung', 'Bungalow with character in rural location. Needs some refurbishment.', 2, '"images/house08.jpg"', 'Available', ''),
(1019, 'Mid_Devon', 150000.00, 'Det-bung', 'Bungalow with character in rural location. Needs some refurbishment.', 2, '"images/house08.jpg"', 'Available', ''),
(1020, 'South_Devon', 150000.00, 'Det-bung', 'Bungalow with character in rural location. Needs some refurbishment.', 2, '"images/house08.jpg"', 'Available', ''),
(1021, 'South_Devon', 290000.00, 'Det-house', 'Beach house. Needs some refurbishment.', 2, '"images/house05-104.gif"', 'Available', ''),
(1022, 'Mid_Devon', 270000.00, 'Det-house', 'Rural locstion. House needs some refurbishment.', 3, '"images/house07-153.gif"', 'Available', ''),
(1023, 'South_Devon', 280000.00, 'Det-house', 'Rural location. House needs some refurbishment.', 3, '"images/house07-153.gif"', 'Available', ''),
(1024, 'South_Devon', 320000.00, 'Det-house', 'Rubbish', 3, '"images/house06-126.gif"', 'Withdrawn', ''),
(1025, 'South_Devon', 320000.00, 'Det-house', 'Rubbish', 3, '"images/house06-126.gif"', 'Withdrawn', ''),
(1026, 'Mid_Devon', 270000.00, 'Sem-det-bung', 'Recently built semi-detached bungalow in a pleasant cul-de-sac n and bathroom. Good gardens.', 3, '"images/bung13-semi-thumb.gif"', 'Available', ''),
(1027, 'North_Devon', 270000.00, 'Sem-det-bung', 'Recently built semi-detached bungalow in a pleasant cul-de-sac n and bathroom. Good gardens.', 3, '"images/bung13-semi-thumb.gif"', 'Available', ''),
(1028, 'Mid_Devon', 250000.00, 'Sem-det-bung', 'Recently refurbished semi- detached bungalow. Pleasant estate, quiet and tree lined. ', 3, '"images/bung13-semi-thumb.gif"', 'Available', ''),
(1029, 'Mid_Devon', 270000.00, 'Sem-det-bung', 'Located in a delightful village with post office and general stores. Landscaped rear garden. Rural v', 3, '"images/bung13-semi-thumb.gif"', 'Available', ''),
(1030, 'Mid_Devon', 270000.00, 'Sem-det-bung', 'Located in a delightful village with post office and general stores. Landscaped rear garden. Rural v', 3, '"images/bung13-semi-thumb.gif"', 'Available', ''),
(1031, 'North_Devon', 280000.00, 'Det-bung', 'Recently built house in an attractive location with full amenities, including school, general stores', 3, '"images/house02-120.gif"', 'Available', ''),
(1032, 'North_Devon', 290000.00, 'Semi-det-house', 'Delightful semi- detached house in a pleasant urban location', 2, '"images/house03-137-semi.gif"', 'Available', ''),
(1033, 'Mid_Devon', 250000.00, 'Semi-det-house', 'Well presented semi-detached house in pleasant surroundings.', 2, '"images/house03-137-semi.gif"', 'Available', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
