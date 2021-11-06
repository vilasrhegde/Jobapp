-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2021 at 06:00 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `application`
--

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

DROP TABLE IF EXISTS `submissions`;
CREATE TABLE IF NOT EXISTS `submissions` (
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  `email` varchar(300) NOT NULL,
  `linkedin_link` varchar(300) NOT NULL,
  `drupal_link` varchar(300) NOT NULL,
  `position` varchar(300) NOT NULL,
  `start_date` varchar(300) NOT NULL,
  `mobile_number` varchar(300) NOT NULL,
  `current_city` varchar(300) NOT NULL,
  `city_name` varchar(300) NOT NULL,
  `relocate` varchar(300) NOT NULL,
  `last_comp_name` varchar(300) NOT NULL,
  `comments` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`First_Name`, `Last_Name`, `date_time`, `email`, `linkedin_link`, `drupal_link`, `position`, `start_date`, `mobile_number`, `current_city`, `city_name`, `relocate`, `last_comp_name`, `comments`) VALUES
('Ishan', 'Patel', '2021-06-11 16:04:35', 'ishanpatel415@gmail.com', 'http://linkedin.com/in/ishanpatel27', 'http://drupal.com/test', 'Drupal Developer', '01/07/2021', '08458911706', 'Other', 'INDORE', 'Notsure', 'Test Company', 'Test--Commnet'),
('IshanAbc', 'Patel', '2021-06-11 23:24:14', 'ishanpatel415@gmail.com', 'http://linkedin.com/in/ishanpatel27', 'http://drupal.com/test', 'Drupal Developer', '01/07/2021', '08458911706', 'Other', 'INDORE', 'Notsure', 'GOOD', ''),
('IshanTest', 'Patel', '2021-06-11 23:29:31', 'ishanpatel415@gmail.com', 'http://linkedin.com/in/ishanpatel27', 'http://drupal.com/test', 'Drupal Developer', '01/07/2021', '08458911706', 'Delhi', 'INDORE', '', 'http://', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;