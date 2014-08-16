-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2012 at 09:19 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prison_break`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum13`
--

CREATE TABLE IF NOT EXISTS `forum13` (
  `post_id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Post Id',
  `fb_user_id` bigint(32) unsigned NOT NULL COMMENT 'FB User Id from users',
  `first_name` varchar(32) COLLATE latin1_general_ci NOT NULL COMMENT 'First Name from users',
  `last_name` varchar(32) COLLATE latin1_general_ci NOT NULL COMMENT 'Last Name from users',
  `custom_username` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `college` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'College from users',
  `post` varchar(255) CHARACTER SET latin1 NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flagset` enum('0','1') COLLATE latin1_general_ci NOT NULL DEFAULT '0' COMMENT 'allow post?',
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forum46`
--

CREATE TABLE IF NOT EXISTS `forum46` (
  `post_id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Post Id',
  `fb_user_id` bigint(32) unsigned NOT NULL COMMENT 'FB User Id from users',
  `first_name` varchar(32) COLLATE latin1_general_ci NOT NULL COMMENT 'First Name from users',
  `last_name` varchar(32) COLLATE latin1_general_ci NOT NULL COMMENT 'Last Name from users',
  `custom_username` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `college` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'College from users',
  `post` varchar(255) CHARACTER SET latin1 NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flagset` enum('0','1') COLLATE latin1_general_ci NOT NULL DEFAULT '0' COMMENT 'allow post?',
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forum79`
--

CREATE TABLE IF NOT EXISTS `forum79` (
  `post_id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Post Id',
  `fb_user_id` bigint(32) unsigned NOT NULL COMMENT 'FB User Id from users',
  `first_name` varchar(32) COLLATE latin1_general_ci NOT NULL COMMENT 'First Name from users',
  `last_name` varchar(32) COLLATE latin1_general_ci NOT NULL COMMENT 'Last Name from users',
  `custom_username` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `college` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'College from users',
  `post` varchar(255) CHARACTER SET latin1 NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flagset` enum('0','1') COLLATE latin1_general_ci NOT NULL DEFAULT '0' COMMENT 'allow post?',
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forum1012`
--

CREATE TABLE IF NOT EXISTS `forum1012` (
  `post_id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Post Id',
  `fb_user_id` bigint(32) unsigned NOT NULL COMMENT 'FB User Id from users',
  `first_name` varchar(32) COLLATE latin1_general_ci NOT NULL COMMENT 'First Name from users',
  `last_name` varchar(32) COLLATE latin1_general_ci NOT NULL COMMENT 'Last Name from users',
  `custom_username` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `college` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'College from users',
  `post` varchar(255) CHARACTER SET latin1 NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flagset` enum('0','1') COLLATE latin1_general_ci NOT NULL DEFAULT '0' COMMENT 'allow post?',
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forum1315`
--

CREATE TABLE IF NOT EXISTS `forum1315` (
  `post_id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Post Id',
  `fb_user_id` bigint(32) unsigned NOT NULL COMMENT 'FB User Id from users',
  `first_name` varchar(32) COLLATE latin1_general_ci NOT NULL COMMENT 'First Name from users',
  `last_name` varchar(32) COLLATE latin1_general_ci NOT NULL COMMENT 'Last Name from users',
  `custom_username` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `college` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'College from users',
  `post` varchar(255) CHARACTER SET latin1 NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flagset` enum('0','1') COLLATE latin1_general_ci NOT NULL DEFAULT '0' COMMENT 'allow post?',
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forum1618`
--

CREATE TABLE IF NOT EXISTS `forum1618` (
  `post_id` int(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Post Id',
  `fb_user_id` bigint(32) unsigned NOT NULL COMMENT 'FB User Id from users',
  `first_name` varchar(32) COLLATE latin1_general_ci NOT NULL COMMENT 'First Name from users',
  `last_name` varchar(32) COLLATE latin1_general_ci NOT NULL COMMENT 'Last Name from users',
  `custom_username` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `college` varchar(255) COLLATE latin1_general_ci DEFAULT NULL COMMENT 'College from users',
  `post` varchar(255) CHARACTER SET latin1 NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flagset` enum('0','1') COLLATE latin1_general_ci NOT NULL DEFAULT '0' COMMENT 'allow post?',
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(3) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique Id',
  `first_name` varchar(32) NOT NULL COMMENT 'First Name',
  `last_name` varchar(32) NOT NULL COMMENT 'Last Name',
  `fb_username` varchar(32) DEFAULT NULL COMMENT 'Facebook Username (Can be null)',
  `custom_username` varchar(32) DEFAULT NULL COMMENT 'Custom Username',
  `fb_user_id` bigint(32) unsigned NOT NULL COMMENT 'Facebook UserID',
  `fb_profile_link` varchar(255) NOT NULL COMMENT 'Facebook Profile link',
  `email` varchar(32) NOT NULL COMMENT 'Email Address',
  `college` varchar(255) DEFAULT NULL COMMENT 'College Name',
  `level` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT 'Levels Cleared',
  `bonus` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'Bonus, if awarded',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'timestamp',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `fb_user_id` (`fb_user_id`),
  UNIQUE KEY `custom_username` (`custom_username`),
  KEY `college` (`college`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `fb_username`, `custom_username`, `fb_user_id`, `fb_profile_link`, `email`, `college`, `level`, `bonus`, `timestamp`) VALUES
(1, 'Anshul', 'Gupta', 'anshulgupta0803', 'Admin', 100000544038460, 'http://www.facebook.com/anshulgupta0803', 'anshulgupta0803@gmail.com', 'The LNM Institute of Information Technology', 0, '0', '2012-10-19 18:38:13');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
