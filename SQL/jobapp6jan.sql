-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 05:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobapp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `app_id` int(11) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` int(11) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`app_id`, `photo`, `name`, `email`, `mob`, `dob`) VALUES
(4, 'vilas hegde-1.jpg', 'Vilas', 'vilasrhegde@gmail.com', 2147483647, '2001-05-23'),
(5, 'CRS_2480 (1)-modified.png', 'Bharath', 'vilasrhegde@gmail.co', 2147483647, '1996-03-06'),
(6, 'DSC_0127.jpg', 'Tushar', 'test@gmail.com', 2147483647, '2000-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

CREATE TABLE `background` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lwc` varchar(100) NOT NULL,
  `xp` int(11) NOT NULL,
  `skill` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `background`
--

INSERT INTO `background` (`id`, `name`, `lwc`, `xp`, `skill`) VALUES
(4, 'Vilas', 'Google', 2, 'Data Analysis'),
(5, 'Bharath', 'Google', 2, 'Web design'),
(6, 'Tushar', 'HCL', 1, 'Competitive programming');

-- --------------------------------------------------------

--
-- Table structure for table `locate`
--

CREATE TABLE `locate` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locate`
--

INSERT INTO `locate` (`id`, `name`, `branch`, `position`, `mobile`) VALUES
(4, 'Vilas', 'Banglore', 'Data Analytics', 2147483647),
(5, 'Bharath', 'jojw', 'Cybersecurity', 2147483647),
(6, 'Tushar', 'Shimoga', 'Cybersecurity', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `recruit`
--

CREATE TABLE `recruit` (
  `id` int(11) NOT NULL,
  `dev` int(11) NOT NULL,
  `test` int(11) NOT NULL,
  `hr` int(11) NOT NULL,
  `support` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recruit`
--

INSERT INTO `recruit` (`id`, `dev`, `test`, `hr`, `support`) VALUES
(1, 250, 100, 50, 350);

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `relocate` varchar(10) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `fname`, `lname`, `email`, `linkedin`, `position`, `branch`, `relocate`, `date`) VALUES
(4, 'Vilas', 'Hegde', 'vilasrhegde@gmail.com', 'http://kedin.com/in/vilasrhegde', 'Data Analytics', 'Banglore', 'Yes', '2022-01-06'),
(5, 'Bharath', 'Test', 'vilasrhegde@gmail.co', 'https://linkedin.com/alex', 'Cybersecurity', 'jojw', 'Yes', '2022-01-06'),
(6, 'Tushar', 'Belpu', 'test@gmail.com', 'https://linkedin.com/tushar', 'Cybersecurity', 'Shimoga', 'No', '2022-01-06');

-- --------------------------------------------------------

--
-- Stand-in structure for view `total`
-- (See below for the actual view)
--
CREATE TABLE `total` (
`id` int(11)
,`fname` varchar(100)
,`photo` varchar(500)
,`lname` varchar(100)
,`email` varchar(100)
,`linkedin` varchar(100)
,`position` varchar(100)
,`branch` varchar(100)
,`relocate` varchar(10)
,`dob` date
,`lwc` varchar(100)
,`xp` int(11)
,`skill` varchar(100)
,`mobile` int(11)
,`vision` text
);

-- --------------------------------------------------------

--
-- Table structure for table `visions`
--

CREATE TABLE `visions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `vision` text NOT NULL,
  `skills` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visions`
--

INSERT INTO `visions` (`id`, `name`, `vision`, `skills`) VALUES
(4, 'Vilas', 'Nothing', 'Data Analysis'),
(5, 'Bharath', '2qdd', 'Web design'),
(6, 'Tushar', 'ffdg t tet ttrywy trt yyu uiii77i', 'Competitive programming');

-- --------------------------------------------------------

--
-- Structure for view `total`
--
DROP TABLE IF EXISTS `total`;

CREATE ALGORITHM=MERGE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total`  AS SELECT `s`.`id` AS `id`, `s`.`fname` AS `fname`, `a`.`photo` AS `photo`, `s`.`lname` AS `lname`, `s`.`email` AS `email`, `s`.`linkedin` AS `linkedin`, `s`.`position` AS `position`, `s`.`branch` AS `branch`, `s`.`relocate` AS `relocate`, `a`.`dob` AS `dob`, `b`.`lwc` AS `lwc`, `b`.`xp` AS `xp`, `b`.`skill` AS `skill`, `l`.`mobile` AS `mobile`, `v`.`vision` AS `vision` FROM ((((`submissions` `s` join `applicant` `a`) join `locate` `l`) join `background` `b`) join `visions` `v`) WHERE `s`.`id` = `a`.`app_id` AND `s`.`id` = `l`.`id` AND `s`.`id` = `v`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `background`
--
ALTER TABLE `background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locate`
--
ALTER TABLE `locate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruit`
--
ALTER TABLE `recruit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `visions`
--
ALTER TABLE `visions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
  ADD CONSTRAINT `app_sub_id` FOREIGN KEY (`app_id`) REFERENCES `submissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `background`
--
ALTER TABLE `background`
  ADD CONSTRAINT `background_ibfk_1` FOREIGN KEY (`id`) REFERENCES `applicant` (`app_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `locate`
--
ALTER TABLE `locate`
  ADD CONSTRAINT `locate_ibfk_1` FOREIGN KEY (`id`) REFERENCES `submissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visions`
--
ALTER TABLE `visions`
  ADD CONSTRAINT `visions_ibfk_1` FOREIGN KEY (`id`) REFERENCES `submissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
