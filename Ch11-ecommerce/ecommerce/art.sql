-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 08, 2013 at 06:58 PM
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
-- Table structure for table `art`
--

CREATE TABLE IF NOT EXISTS `art` (
  `art_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `thumb` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` decimal(6,2) unsigned NOT NULL,
  `medium` varchar(50) NOT NULL,
  `artist` varchar(50) NOT NULL,
  `mini_descr` varchar(150) NOT NULL,
  `ppcode` text NOT NULL,
  PRIMARY KEY (`art_id`),
  KEY `art_name` (`thumb`,`price`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`art_id`, `thumb`, `type`, `price`, `medium`, `artist`, `mini_descr`, `ppcode`) VALUES
(1, '"images/aw-brown-vessel-thumb.jpg"', 'Still-life', 60.00, 'Oil-painting', 'Adrian-W-West', 'First exhibited in Coventry City Art Gallery 1968. Painted on durable tempered hardboard.', '<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post"> <input name="cmd" value="_s-xclick" type="hidden"> <input name="hosted_button_id" value="5159065" type="hidden"> <p> <input src="https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online." style="float: left;" border="0" type="image"> <img alt="" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" border="0" height="1" width="1"></p> </form>'),
(2, '"images/k-copper-kettle-thumb.jpg"', 'Still-life', 750.00, 'Oil-painting', 'James-Kessell', 'James Kessell (RA and RABA) painted this on tempered hard board for an appreciative audience. It was exhibited at the Birmingham Art Gallery in 1967.', '<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post"> <input name="cmd" value="_s-xclick" type="hidden"> <input name="hosted_button_id" value="5159065" type="hidden"> <p> <input src="https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online." style="float: left;" border="0" type="image"> <img alt="" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" border="0" height="1" width="1"></p> </form>'),
(3, '"images/aw-white-jug-thumb.jpg"', 'Still-life', 70.00, 'Oil-painting', 'Adrian-W-West', 'Painted on tempered hardboard in 1968 and exhibited first at Coventry City Art Gallery in the same year.', '<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post"> <input name="cmd" value="_s-xclick" type="hidden"> <input name="hosted_button_id" value="5159065" type="hidden"> <p> <input src="https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online." style="float: left;" border="0" type="image"> <img alt="" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" border="0" height="1" width="1"></p> </form>'),
(4, '"images/rsb-beer-thumb.jpg"', 'Nature', 40.00, 'Colored-etching', 'Roger-St-Barbe', 'Looking back at Beer beach, South East Devon. ', '<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post"> <input name="cmd" value="_s-xclick" type="hidden"> <input name="hosted_button_id" value="5159065" type="hidden"> <p> <input src="https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online." style="float: left;" border="0" type="image"> <img alt="" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" border="0" height="1" width="1"></p> </form>'),
(5, '"images/rsb-blue-thumb.jpg"', 'Nature', 40.00, 'Colored-etching', 'Roger-St-Barbe', 'Roger produces excellent etchings of Devon''s native butterflies. ', '<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post"> <input name="cmd" value="_s-xclick" type="hidden"> <input name="hosted_button_id" value="5159065" type="hidden"> <p> <input src="https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online." style="float: left;" border="0" type="image"> <img alt="" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" border="0" height="1" width="1"></p> </form>'),
(6, '"images/rsb-fritillary-thumb.jpg"', 'Nature', 40.00, 'Colored-etching', 'Roger-St-Barbe', 'The silver washed fritillary is a less common Devon butterfly.', '<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post"> <input name="cmd" value="_s-xclick" type="hidden"> <input name="hosted_button_id" value="5159065" type="hidden"> <p> <input src="https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online." style="float: left;" border="0" type="image"> <img alt="" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" border="0" height="1" width="1"></p> </form>'),
(7, '"images/rsb-lyme-thumb.jpg"', 'Nature', 40.00, 'Colored-etching', 'Roger-St-Barbe', 'Lyme Regis is a popular Devon seaside resort with a spectacular sea wall called the Cobb.', '<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post"> <input name="cmd" value="_s-xclick" type="hidden"> <input name="hosted_button_id" value="5159065" type="hidden"> <p> <input src="https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online." style="float: left;" border="0" type="image"> <img alt="" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" border="0" height="1" width="1"></p> </form>'),
(22, '"images/rsb-lyme-thumb.jpg"', 'Landscape', 40.00, 'Colored-etching', 'Roger-St-Barbe', 'Lyme Regis is a popular Devon seaside resort with a spectacular sea wall called the Cobb.', '<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post"> <input name="cmd" value="_s-xclick" type="hidden"> <input name="hosted_button_id" value="5159065" type="hidden"> <p> <input src="https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online." style="float: left;" border="0" type="image"> <img alt="" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" border="0" height="1" width="1"></p> </form>'),
(23, '"images/k-abstract-squares-thumb.jpg"', 'Abstract', 800.00, 'Oil-painting', 'James-Kessell', 'Composition of squares and circles in tasteful pastel colors. Painted on high quality tempered board.', '<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post"> <input name="cmd" value="_s-xclick" type="hidden"> <input name="hosted_button_id" value="5159065" type="hidden"> <p> <input src="https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online." style="float: left;" border="0" type="image"> <img alt="" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" border="0" height="1" width="1"></p> </form>'),
(21, '"images/rsb-beer-thumb.jpg"', 'Landscape', 40.00, 'Colored-etching', 'Roger-St-Barbe', 'Looking back at Beer beach, South East Devon. ', '<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post"> <input name="cmd" value="_s-xclick" type="hidden"> <input name="hosted_button_id" value="5159065" type="hidden"> <p> <input src="https://www.paypal.com/en_GB/i/btn/btn_cart_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online." style="float: left;" border="0" type="image"> <img alt="" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" border="0" height="1" width="1"></p> </form>');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
