-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2021 at 02:55 PM
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
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `dob` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `name`, `email`, `mobile`, `dob`) VALUES
(23, 'shuvam', 'shivam', 86453216, '2021-11-07'),
(52, 'Surya K', 'surya@gmail.com', 2147483647, '2021-11-09'),
(55, 'Bhavish', 'bhavish@gmail.com', 2147483647, '2021-11-09'),
(57, 'Suchitra P', 'suchitra@gmail.com', 2147483647, '2021-11-09'),
(59, 'suvarna ', 'suvarna@gmail.com', 2147483647, '0000-00-00'),
(61, 'Sooraj', 'sooraj@gmail.com', 982738927, '2001-02-02'),
(65, 'Raj', 'raj@gmail.com', 973928737, '1995-12-10'),
(71, 'Samarth', 'samarht@gmail.com', 2147483647, '0000-00-00');

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
(23, 'shuvam', 'TCS', 2, 'Web deveopment'),
(52, 'Surya K', 'infosys', 2, 'Data entry'),
(55, 'Bhavish', 'Zerodha', 2, 'Testing'),
(57, 'Suchitra P', 'infosys', 2, 'Data entry'),
(59, 'suvarna ', 'infosys', 2, 'Data entry'),
(61, 'Sooraj', 'Bosch', 4, 'Server side'),
(65, 'Raj', 'Microsoft', 3, 'Big data'),
(71, 'Samarth', 'Google', 5, 'Web deveopment');

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
(23, 'shuvam', 'Kolkatta', 'HR', 86453216),
(52, 'Surya', 'Manglore', 'Developer', 65643554),
(55, 'Bhavish', 'Banglore', 'Tester', 2147483647),
(57, 'Suchitra', 'Pune', 'Web', 2147483647),
(59, 'suvarna ', '', 'Data Analytics', 2147483647),
(61, 'Sooraj', 'Mysore', 'Tester', 982738927),
(65, 'Raj', 'Bengaluru', 'HR', 973928737),
(71, 'Samarth', 'Banglore', 'Cybersecurity', 2147483647);

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
(23, 'shivam', 'ravan', 'shivam@gmail.com', 'https://www.linkedin.com/in/vilas-hegde-1a2796197/', 'HR', 'Kolkatta', '', '2021-11-09'),
(44, 'Thena', 'Therous', 'thena@gmail.com', 'https://www.linkedin.com/thena', 'Developer', 'Eros', 'No', '2021-11-07'),
(52, 'Surya K', 'Bhat', 'surya@gmail.com', 'https://www.linkedin.com/surya', 'Developer', 'Manglore', '', '2021-11-09'),
(55, 'Bhavish', 'Samanii', 'bhavish@gmail.com', 'http://https://github.com/ishanpatel27/Job-Application-Assignment', 'Tester', 'Banglore', 'No', '2021-11-09'),
(56, 'Bhavish', 'Samani', 'bhavish@gmail.com', 'http://https://github.com/ishanpatel27/Job-Application-Assignment', 'Tester', 'Banglore', 'No', '2021-11-08'),
(57, 'Suchitra P', 'Salaga', 'suchitra@gmail.com', 'https://www.linkedin.com/suchi', 'Web', 'Pune', 'Yes', '2021-11-09'),
(58, 'Suchitra', 'Salaga', 'suchitra@gmail.com', 'https://www.linkedin.com/suchi', 'Web', 'Pune', 'Yes', '2021-11-08'),
(59, 'suvarna ', 'sunugar', 'suvarna@gmail.com', 'https://www.linkedin.com/suvu', 'Data Analytics', '', 'Yes', '2021-11-08'),
(61, 'Sooraj', 'Sharma', 'sooraj@gmail.com', 'https://www.linkedin.com/sooraj', 'Tester', 'Mysore', 'Yes', '2021-11-09'),
(65, 'Raj', 'Kumar', 'raj@gmail.com', 'https://www.linkedin.com/raj', 'HR', 'Bengaluru', 'Yes', '2021-11-09'),
(71, 'Samarth', 'Bhat', 'samarht@gmail.com', 'https://www.linkedin.com/samarth', 'Cybersecurity', 'Banglore', 'Yes', '2021-11-09'),
(72, 'Samarth', 'Bhat', 'samarht@gmail.com', 'https://www.linkedin.com/samarth', 'Cybersecurity', 'Banglore', 'Yes', '2021-11-09');

-- --------------------------------------------------------

--
-- Stand-in structure for view `total`
-- (See below for the actual view)
--
CREATE TABLE `total` (
`fname` varchar(100)
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
(23, 'shuvam', 'NOTHING', 'Web deveopment'),
(52, 'Surya K', 'Many things', 'Data entry'),
(55, 'Bhavish', 'nothing', 'Testing'),
(57, 'Suchitra P', 'nothing', 'Data entry'),
(59, 'suvarna ', 'nothing\r\n\r\n\r\n', 'Data entry'),
(61, 'Sooraj', 'Booming future', 'Server side'),
(65, 'Raj', 'No aims', 'Big data'),
(71, 'Samarth', 'Nothing as of now\r\n', 'Web deveopment');

-- --------------------------------------------------------

--
-- Structure for view `total`
--
DROP TABLE IF EXISTS `total`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total`  AS SELECT `s`.`fname` AS `fname`, `s`.`lname` AS `lname`, `s`.`email` AS `email`, `s`.`linkedin` AS `linkedin`, `s`.`position` AS `position`, `s`.`branch` AS `branch`, `s`.`relocate` AS `relocate`, `a`.`dob` AS `dob`, `b`.`lwc` AS `lwc`, `b`.`xp` AS `xp`, `b`.`skill` AS `skill`, `l`.`mobile` AS `mobile`, `v`.`vision` AS `vision` FROM ((((`submissions` `s` join `applicant` `a`) join `locate` `l`) join `background` `b`) join `visions` `v`) WHERE `s`.`fname` = `a`.`name` AND `s`.`fname` = `l`.`name` AND `s`.`fname` = `b`.`name` AND `s`.`fname` = `v`.`name` AND `s`.`id` = `a`.`id` = `l`.`id` = `b`.`id` = `v`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`,`email`);

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
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `visions`
--
ALTER TABLE `visions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
  ADD CONSTRAINT `applicant_ibfk_1` FOREIGN KEY (`id`) REFERENCES `submissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `background`
--
ALTER TABLE `background`
  ADD CONSTRAINT `background_ibfk_1` FOREIGN KEY (`id`) REFERENCES `submissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
