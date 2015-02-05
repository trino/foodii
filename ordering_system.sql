-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2014 at 07:07 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ordering_system`
--
CREATE DATABASE IF NOT EXISTS `ordering_system` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ordering_system`;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL DEFAULT '1',
  `res_id` int(11) NOT NULL,
  `menu_item` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `display_order` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `has_complimentary` int(11) NOT NULL DEFAULT '0',
  `has_regular` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1:veg 2:spicy',
  `is_multiple` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1203 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `cat_id`, `res_id`, `menu_item`, `description`, `price`, `display_order`, `featured`, `active`, `has_complimentary`, `has_regular`, `image`, `type`, `is_multiple`) VALUES
(1189, 1, 24, 'Doughnuts', 'Sample description goes here.', '$0.5', 1, 1, 1, 0, 0, '1.png', 1, 0),
(1190, 1, 24, 'Chocklate Cookies', 'Sample description goes here.', '$0.5', 1, 0, 1, 0, 0, '2.png', 1, 0),
(1191, 1, 24, 'Black Forest', 'Sample description goes here', '$12', 3, 0, 1, 0, 0, '3.png', 1, 0),
(1192, 2, 24, 'Coke', 'Sample description goes here', '$1.5', 4, 2, 1, 0, 0, '4.png', 1, 0),
(1193, 2, 24, 'Sprite', 'Sample description goes here', '$1.5', 5, 0, 1, 0, 0, '5.png', 1, 0),
(1194, 3, 24, 'Fruit Salad', 'Sample description goes here', '$5', 6, 3, 1, 0, 0, '6.png', 1, 0),
(1195, 3, 24, 'Green Salad', 'Sample description goes here', '$10', 7, 0, 1, 0, 0, '7.png', 1, 0),
(1196, 4, 24, 'Milk Shake', 'Sample description goes here', '$3', 8, 0, 1, 0, 0, '8.png', 1, 0),
(1197, 4, 24, 'Fruit Juice', 'Sample description goes here', '$3', 9, 1, 1, 0, 0, '9.png', 1, 0),
(1198, 5, 24, 'Skinny Ranch fries', 'Sample description goes here', '$5', 10, 0, 1, 0, 0, '11.png', 1, 0),
(1199, 5, 24, 'French Fries', 'Sample description goes here', '$6', 11, 1, 1, 0, 0, '10.png', 1, 0),
(1200, 6, 24, 'Lamp Barbecue', 'Sample description goes here', '$60', 12, 0, 1, 0, 0, '12.png', 2, 0),
(1201, 6, 24, 'Lamb Kebab', 'Sample description goes here', '$30', 13, 1, 1, 0, 0, '13.png', 1, 0),
(1202, 0, 24, 'Tomato Pizza', 'Sample description', '$10', 14, 1, 1, 0, 0, '14.png', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu_categories`
--

CREATE TABLE IF NOT EXISTS `menu_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `title` varchar(255) NOT NULL,
  `res_id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `cattype` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `menu_categories`
--

INSERT INTO `menu_categories` (`id`, `description`, `title`, `res_id`, `order`, `cattype`) VALUES
(1, 'Description of Bakery Item', 'Bakery', 24, 1, 2),
(2, 'Cold Drinks description', 'Cold Drinks', 24, 2, 1),
(3, 'Salad Description', 'Salad', 24, 3, 1),
(4, 'Juice Description', 'Juice', 24, 4, 1),
(5, 'Fries Description', 'Fries', 24, 5, 1),
(6, 'Lamb Description', 'Lamb', 24, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `menu_pdfs`
--

CREATE TABLE IF NOT EXISTS `menu_pdfs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `res_id` int(11) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE IF NOT EXISTS `restaurants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `prov_state` varchar(255) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `website` varchar(255) NOT NULL,
  `max_party_size` int(255) NOT NULL,
  `cuisine` varchar(255) NOT NULL,
  `style` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_on` date NOT NULL,
  `day_open_from` varchar(255) NOT NULL,
  `day_open_to` varchar(255) NOT NULL,
  `day_open` varchar(255) NOT NULL,
  `day_close_from` varchar(255) NOT NULL,
  `day_close_to` varchar(255) NOT NULL,
  `day_close` varchar(255) NOT NULL,
  `time_open` time NOT NULL,
  `time_close` time NOT NULL,
  `reservation_start` time NOT NULL,
  `reservation_end` time NOT NULL,
  `HST` varchar(255) DEFAULT NULL,
  `pos_zip` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `fax` int(11) DEFAULT NULL,
  `cell_phone` varchar(255) DEFAULT NULL,
  `carrier` varchar(255) DEFAULT NULL,
  `default_printer` varchar(255) DEFAULT NULL,
  `default_printer_id` varchar(255) DEFAULT NULL,
  `fax_true` int(11) DEFAULT NULL,
  `sms_true` int(11) DEFAULT NULL,
  `print_true` int(11) DEFAULT NULL,
  `sunday` text NOT NULL,
  `monday` text NOT NULL,
  `tuesday` text NOT NULL,
  `wednesday` text NOT NULL,
  `thursday` text NOT NULL,
  `friday` text NOT NULL,
  `saturday` text NOT NULL,
  `featured` int(11) NOT NULL,
  `lunchtill` time NOT NULL,
  `dinnertill` time NOT NULL,
  `menutype` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `street`, `city`, `prov_state`, `latitude`, `longitude`, `website`, `max_party_size`, `cuisine`, `style`, `phone`, `description`, `picture`, `slug`, `active`, `email`, `password`, `registered_on`, `day_open_from`, `day_open_to`, `day_open`, `day_close_from`, `day_close_to`, `day_close`, `time_open`, `time_close`, `reservation_start`, `reservation_end`, `HST`, `pos_zip`, `created`, `modified`, `fax`, `cell_phone`, `carrier`, `default_printer`, `default_printer_id`, `fax_true`, `sms_true`, `print_true`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `featured`, `lunchtill`, `dinnertill`, `menutype`) VALUES
(24, 'Bombay Bhel', 'ABC', 'CDE', 'Toronto', 43.6366, 79.4, 'http://canada-toronto.com/', 100, 'Indian', 'Spicy', '12345678', 'Bombay Bhel, located on Yonge Street and North York Avenue. It was a mild tasted-buffet, I believe for those who are not use to eat spicy food, but so far was good enough, for those who are in the area and feel like eating food with stronger tastes.', '1.jpg', 'bombay-bhel', 1, 'justdoit.2045@yahoo.com', 'anwar', '2014-08-26', 'Monday', 'Friday', 'Monday-Friday', '', '', 'Saturday-Sunday', '10:00:00', '22:00:00', '00:00:00', '00:00:00', NULL, NULL, '2014-08-26 00:00:00', '2014-08-26 00:00:00', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '10:00AM - 22:00PM', '10:00AM - 22:00PM', '10:00AM - 22:00PM', '10:00AM - 22:00PM', '10:00AM - 22:00PM', '10:00AM - 22:00PM', '10:00AM - 22:00PM', 1, '15:00:00', '10:00:00', 1),
(25, 'ABC Restaurant', 'ABC', 'CDE', 'Toronto', 43.6366, 79.4, 'http://www.abc.com/', 100, 'American', 'Spicy', '98765432', 'Sample descrption of this restaurant goes here. This is 2 paragraphs. Sample descrption of this restaurant goes here. This is 2 paragraphs.\r\n\r\nSample descrption of this restaurant goes here. This is 2 paragraphs. Sample descrption of this restaurant goes here. This is 2 paragraphs.', '2.jpg', 'abc-restaurant', 1, 'justdoit2045@gmail.com', 'anwar', '2014-08-28', 'Sunday', 'Friday', 'Sunday - Friday', '', '', 'Saturday', '10:00:00', '22:00:00', '00:00:00', '00:00:00', NULL, NULL, '2014-08-28 00:00:00', '2014-08-28 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 1, '15:00:00', '10:00:00', 1),
(26, 'CDE Restaurand', 'ABC', 'CDE', 'Toronto', 43.6366, 79.4, 'http://cde.com', 100, 'Chinese', 'Soupy', '12345675', 'Sample descrption of this restaurant goes here. This is 2 paragraphs. Sample descrption of this restaurant goes here. This is 2 paragraphs.\r\nSample descrption of this restaurant goes here. This is 2 paragraphs. Sample descrption of this restaurant goes here. This is 2 paragraphs.', '3.jpg', 'cde-restaurant', 1, 'admin@web-nepal.com', 'anwar', '2014-08-28', 'Sunday', 'Friday', 'Sunday - Friday', '', '', 'Saturday', '10:00:00', '20:00:00', '00:00:00', '00:00:00', NULL, NULL, '2014-08-28 00:00:00', '2014-08-28 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 1, '15:00:00', '22:00:00', 1),
(27, 'FGH Restaurant', 'ABC', 'CDE', 'Toronto', 43.6366, 79.4, 'http://www.abc.com/', 100, 'American', 'Spicy', '98765432', 'Sample descrption of this restaurant goes here. This is 2 paragraphs. Sample descrption of this restaurant goes here. This is 2 paragraphs.\r\n\r\nSample descrption of this restaurant goes here. This is 2 paragraphs. Sample descrption of this restaurant goes here. This is 2 paragraphs.', '4.jpg', 'fgh-restaurant', 1, 'justdoit_2045@hotmail.com', 'anwar', '2014-08-28', 'Sunday', 'Friday', 'Sunday - Friday', '', '', 'Saturday', '10:00:00', '22:00:00', '00:00:00', '00:00:00', NULL, NULL, '2014-08-28 00:00:00', '2014-08-28 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', 1, '15:00:00', '10:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `res_images`
--

CREATE TABLE IF NOT EXISTS `res_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `res_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
