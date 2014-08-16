-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2013 at 10:02 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `itrepo`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `item_id`, `cost`, `complaint_date`, `resolved_date`, `complaint`) VALUES
(4, 1, 0.00, '1992-11-11', '1992-11-18', 'deed'),
(5, 7, 0.00, '2013-04-07', '2013-04-14', 'anshul');

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

--
-- Dumping data for table `hardware`
--

INSERT INTO `hardware` (`item_id`, `serial_number`, `mfg_date`, `warranty_period`) VALUES
(14, '', '0000-00-00', 0),
(13, '12345', '1234-11-11', 22);

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
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_id`),
  KEY `vendor_id` (`vendor_id`),
  KEY `replaced_item_id` (`replaced_item_id`),
  KEY `location_id` (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `manufacturer`, `purchase_date`, `cost`, `shipment_cost`, `vendor_id`, `location_id`, `complaint`, `replaced`, `replaced_item_id`, `deleted`) VALUES
(1, 'anshul', 0, '1994-08-03', 23000, 0, 1, 2, 1, 0, NULL, 0),
(2, 'ashish', 0, '1234-12-12', 0, 0, 1, 2, 1, 0, NULL, 0),
(3, 'Ashish', 0, '1993-01-31', 44000.9, 1200.87, 1, 1, 1, 0, NULL, 0),
(4, 'Ashish', 0, '1234-12-12', 0, 0, 1, 1, 1, 0, NULL, 0),
(5, 'qwert', 0, '1234-12-12', 0, 0, 1, 1, 1, 0, NULL, 0),
(6, 'fere', 0, '1234-11-11', 11, 22, 1, 1, 1, 0, NULL, 0),
(7, 'asde', 232, '1234-11-11', 22, 22, 1, 1, 1, 0, NULL, 0),
(8, '121', 0, '1234-11-11', 22, 22, 1, 1, 1, 0, NULL, 0),
(9, 'xsxsx', 0, '1234-11-11', 22, 33, 1, 1, 1, 0, NULL, 0),
(10, 'xsxsx', 0, '1234-11-11', 22, 33, 1, 1, 1, 0, NULL, 0),
(11, 'xsxsx', 0, '1234-11-11', 22, 33, 1, 1, 1, 0, NULL, 0),
(12, 'xsxsx', 0, '1234-11-11', 22, 33, 1, 1, 1, 0, NULL, 0),
(13, 'xsxsx', 0, '1234-11-11', 22, 33, 1, 1, 1, 0, NULL, 0),
(14, 'zxcnv', 0, '3232-11-11', 234, 44.22, 4, 2, 1, 0, NULL, 0),
(15, 'sdsads', 22, '1234-11-11', 33, 44, 1, 1, 1, 0, NULL, 0),
(16, 'dedewd', 0, '2331-11-11', 4343.33, 22.22, 1, 1, 1, 0, NULL, 0),
(17, 'cndcd', 0, '2322-11-11', 2222, 232, 1, 1, 1, 0, NULL, 0);

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

--
-- Dumping data for table `licensed_software`
--

INSERT INTO `licensed_software` (`licensed_key`, `reg_user`, `expiry_date`, `item_id`) VALUES
('0101010101', 'mvmvmvm', '2323-11-11', 17),
('12324', 'ashd', '2222-11-11', 15),
('3838383883', 'asndasdla', '2331-11-23', 16),
('987654', 'anshul', '0000-00-00', 14);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(5) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`) VALUES
(1, 'BH1'),
(2, 'BH2'),
(3, 'GH'),
(4, 'Server Room'),
(5, 'Computer Lab 1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `address`, `phone`) VALUES
(1, 'as', 's', 0),
(2, '', '', 0),
(3, '', '', 0),
(4, 'Ashish', 'C-105', 232323232);

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
