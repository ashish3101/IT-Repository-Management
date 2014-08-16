-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2013 at 10:46 AM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `itpero1`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE IF NOT EXISTS `complaint` (
  `complaint_id` int(5) NOT NULL AUTO_INCREMENT,
  `item_id` int(5) NOT NULL,
  `cost` float(8,2) NOT NULL,
  `complaint_date` date NOT NULL,
  `resolved_date` date NOT NULL,
  `complaint` varchar(255) NOT NULL,
  PRIMARY KEY (`complaint_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hardware`
--

CREATE TABLE IF NOT EXISTS `hardware` (
  `item_id` int(5) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `mfg_date` date NOT NULL,
  `warranty_period` int(3) NOT NULL,
  PRIMARY KEY (`serial_number`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(5) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) NOT NULL,
  `manufacturer` int(255) NOT NULL,
  `purchase_date` date NOT NULL,
  `cost` float NOT NULL,
  `shipment_cost` float NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `location_id` int(5) NOT NULL,
  `complaint` tinyint(1) NOT NULL DEFAULT '0',
  `replaced` tinyint(1) NOT NULL DEFAULT '0',
  `replaced_item_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `vendor_id` (`vendor_id`),
  KEY `replaced_item_id` (`replaced_item_id`),
  KEY `location_id` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `licensed_software`
--

CREATE TABLE IF NOT EXISTS `licensed_software` (
  `licensed_key` varchar(255) NOT NULL,
  `reg_user` varchar(255) NOT NULL,
  `expiry_date` date NOT NULL,
  `item_id` int(5) NOT NULL,
  PRIMARY KEY (`licensed_key`),
  KEY `item_id` (`item_id`),
  KEY `item_id_2` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(5) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchased_from`
--

CREATE TABLE IF NOT EXISTS `purchased_from` (
  `item_id` int(5) NOT NULL,
  `vendor_id` int(5) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  PRIMARY KEY (`item_id`,`vendor_id`),
  KEY `vendor_id` (`vendor_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `vendor_id` int(5) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hardware`
--
ALTER TABLE `hardware`
  ADD CONSTRAINT `hardware_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`replaced_item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_ibfk_3` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `licensed_software`
--
ALTER TABLE `licensed_software`
  ADD CONSTRAINT `licensed_software_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchased_from`
--
ALTER TABLE `purchased_from`
  ADD CONSTRAINT `purchased_from_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchased_from_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `item` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
