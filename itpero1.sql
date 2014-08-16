-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2013 at 08:24 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `item_id`, `cost`, `complaint_date`, `resolved_date`, `complaint`) VALUES
(2, 8, 0.00, '2013-04-01', '2013-04-08', 'not working'),
(3, 5, 0.00, '2013-04-01', '2013-04-08', 'not working'),
(4, 7, 0.00, '2013-04-01', '2013-04-08', 'Crashed'),
(5, 6, 0.00, '2013-04-01', '2013-04-08', 'Crashing'),
(6, 4, 0.00, '2013-04-01', '2013-04-08', 'Broken'),
(7, 1, 0.00, '2013-04-01', '2013-04-08', 'Not Working'),
(8, 2, 0.00, '2013-04-02', '2013-04-09', 'Corrupted');

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
(1, '', '0000-00-00', 0),
(3, 'A1234', '2011-02-22', 6),
(16, 'A123456', '2012-12-12', 36),
(4, 'B1000', '2009-01-20', 6),
(13, 'B32312', '2013-01-05', 12),
(5, 'C9876', '2013-01-05', 12),
(18, 'D444', '2013-01-01', 24),
(9, 'D92892', '2008-02-11', 12),
(8, 'F1000', '2012-01-01', 12),
(20, 'F4231', '2009-03-20', 6),
(12, 'G2341', '2013-01-05', 12),
(11, 'G42313', '2012-01-01', 12),
(17, 'H35647', '2013-01-09', 12);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(5) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `manufacturer`, `purchase_date`, `cost`, `shipment_cost`, `vendor_id`, `location_id`, `complaint`, `replaced`, `replaced_item_id`) VALUES
(1, 'MATLAB', 'ABC Tech.', '2012-09-09', 10000, 0, 3, 11, 1, 0, NULL),
(2, 'Photoshop', 'XYZ Tech.', '2010-03-03', 0, 0, 4, 11, 1, 0, NULL),
(3, 'Keyboard', 'Raj Computers', '2012-04-10', 100, 10, 1, 8, 0, 0, NULL),
(4, 'Mouse', 'Remson Ltd.', '2009-12-22', 120, 5, 4, 10, 1, 1, 20),
(5, 'Monitor', 'Ramesh', '2010-10-10', 1500, 100, 3, 11, 0, 1, 19),
(6, 'Flash', 'Suresh', '2010-03-03', 0, 0, 5, 5, 1, 1, 15),
(7, 'Windows', 'Raj Computers', '2013-01-01', 4000, 0, 2, 7, 1, 1, 14),
(8, 'Web camera', 'Remson Ltd.', '2012-06-20', 2000, 50, 4, 8, 1, 1, 11),
(9, 'Laptop', 'ABC Ltd.', '2008-10-09', 40000, 1000, 1, 4, 0, 0, NULL),
(11, 'Web', 'Remson', '2012-06-20', 2000, 50, 4, 8, 0, 0, NULL),
(12, 'Monitor', 'Ramesh', '2010-10-10', 1500, 100, 3, 11, 0, 0, NULL),
(13, 'Monitor', 'Ramesh', '2010-10-10', 1500, 100, 3, 11, 0, 0, NULL),
(14, 'Windows', 'Raj', '2013-01-01', 4000, 0, 2, 7, 0, 0, NULL),
(15, 'Flash', 'Suresh', '2010-03-03', 0, 0, 5, 5, 0, 0, NULL),
(16, 'Workstation', 'Dell', '2013-01-01', 200000, 1000, 1, 4, 1, 1, NULL),
(17, 'Monitor', 'Ramesh', '2010-10-10', 1500, 100, 3, 11, 0, 0, NULL),
(18, 'laptop', 'sony', '2013-04-01', 30000, 1000, 3, 4, 0, 0, NULL),
(19, 'Monitor', 'Ramesh', '2010-10-10', 1500, 100, 3, 11, 0, 0, NULL),
(20, 'Mouse', 'Remson', '2009-12-22', 120, 5, 4, 10, 0, 0, NULL);

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
('123-123-123', 'Jitesh', '2013-09-09', 1),
('156-156-123', 'Alisha', '2015-01-01', 7);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int(5) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`) VALUES
(4, 'BH1'),
(5, 'BH2'),
(6, 'BH3'),
(7, 'GH'),
(8, 'Library'),
(9, 'Faculty'),
(10, 'CP lab-1'),
(11, 'CP lab-2'),
(12, 'Server room'),
(13, 'Academics'),
(14, 'Admin Block');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `address`, `phone`) VALUES
(1, 'Harish Technologies', 'M-120', 2147483647),
(2, 'Mahesh Technologies', 'D-107,BH-2', 27016888),
(3, 'Surya Infotechs', 'A vihar', 8362872),
(4, 'CS pvt ltd', 'A-2/1', 2147483647),
(5, 'ABC Info.', 'B-120', 8782389);

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
