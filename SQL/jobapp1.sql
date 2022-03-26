-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 05:23 AM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_today_submissions` (INOUT `today's` INT)  SELECT * from submissions WHERE date=DATE(NOW())$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `app_id` int(11) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`app_id`, `photo`, `name`, `email`, `mob`, `dob`) VALUES
(4, 'vilas hegde-1.jpg', 'Vilas', 'vilasrhegde@gmail.com', '2147483647', '2001-05-23'),
(6, 'DSC_0127.jpg', 'Tushar', 'test@gmail.com', '2147483647', '2000-03-12'),
(8, 'CRS_2480 (1)-modified.png', 'Sujna', 'sujna@gmail.com', '2147483647', '1998-07-17'),
(9, './images/715b7c57643210db8fa8e2d131a8d84bCRS_2480 (1)-modified-min.png', 'Hema', 'hema@gmail.com', '2147483647', '1986-05-01'),
(13, './images/9099d9b7273fc5c9200001a1131f57a9DSC_0108.JPG', 'Sushmitha', 'sushmitha@gmail.com', '2147483647', '1992-04-12'),
(14, './images/628dde3e3319a38a45039ff820e7bf60girl2.jpg', 'Aesha', 'aesha@gmail.com', '2147483647', '1991-07-12'),
(15, './images/491e18865b9aa4f9c76af9b0449cdd5egirl2.jpg', 'Varsha', 'varsha@gmail.com', '2147483647', '1997-02-12'),
(16, './images/d15923576314b5c0379a2d9f69bbe5a3girl4.jpg', 'Suahana', 'suhana@gmail.com', '9873874387', '1999-02-09'),
(17, './images/794d8cc7e63a32b0ebe53de6953bb732Untitled design (1).png', 'Romi', 'romi@gmail.com', '9473874837', '1999-06-07');

--
-- Triggers `applicant`
--
DELIMITER $$
CREATE TRIGGER `insert_log` AFTER INSERT ON `applicant` FOR EACH ROW INSERT into insert_log SET app_id=NEW.app_id,name=NEW.name,photo=NEW.photo,mobile=NEW.mob
$$
DELIMITER ;

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
(6, 'Tushar', 'HCL', 1, 'Competitive programming'),
(8, 'Sujna', 'Fresher', 0, 'Competitive programming'),
(9, 'Hema', 'Google', 2, 'Competitive programming'),
(13, 'Sushmitha', 'Bosch', 5, 'Communication'),
(14, 'Aesha', 'HCL', 7, 'Ethical hacking'),
(15, 'Varsha', 'Fresher', 0, 'Web design'),
(16, 'Suahana', 'Apple', 3, 'Marketing'),
(17, 'Romi', 'HCL', 3, 'SQL');

-- --------------------------------------------------------

--
-- Table structure for table `delete_log`
--

CREATE TABLE `delete_log` (
  `id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delete_log`
--

INSERT INTO `delete_log` (`id`, `app_id`, `name`, `position`, `email`, `date`) VALUES
(0, 5, 'Bharath', 'Cybersecurity', 'vilasrhegde@gmail.co', '2022-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `insert_log`
--

CREATE TABLE `insert_log` (
  `app_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insert_log`
--

INSERT INTO `insert_log` (`app_id`, `name`, `photo`, `mobile`) VALUES
(14, 'Aesha', './images/628dde3e3319a38a45039ff820e7bf60girl2.jpg', '2147483647'),
(15, 'Varsha', './images/491e18865b9aa4f9c76af9b0449cdd5egirl2.jpg', '2147483647'),
(16, 'Suahana', './images/d15923576314b5c0379a2d9f69bbe5a3girl4.jpg', '2147483647'),
(17, 'Romi', './images/794d8cc7e63a32b0ebe53de6953bb732Untitled design (1).png', '9473874837');

-- --------------------------------------------------------

--
-- Table structure for table `locate`
--

CREATE TABLE `locate` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locate`
--

INSERT INTO `locate` (`id`, `name`, `branch`, `position`, `mobile`) VALUES
(4, 'Vilas', 'Banglore', 'Data Analytics', '2147483647'),
(6, 'Tushar', 'Shimoga', 'Cybersecurity', '2147483647'),
(8, 'Sujna', 'Sirsi', 'Web', '2147483647'),
(9, 'Hema', 'Jaipur', 'Web', '2147483647'),
(13, 'Sushmitha', 'Chikmanglore', 'Data Analytics', '2147483647'),
(14, 'Aesha', 'Delhi', 'Cybersecurity', '2147483647'),
(15, 'Varsha', 'Banglore', 'Web', '2147483647'),
(16, 'Suahana', 'Trivendrum', 'Tester', '9873874387'),
(17, 'Romi', 'Tumkur', 'Web', '9473874837');

--
-- Triggers `locate`
--
DELIMITER $$
CREATE TRIGGER `update_info` BEFORE UPDATE ON `locate` FOR EACH ROW INSERT into update_log SET name=OLD.name,position=OLD.position,app_id=OLD.id,city=OLD.branch
$$
DELIMITER ;

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
(6, 'Tushar', 'Belpu', 'test@gmail.com', 'https://linkedin.com/tushar', 'Cybersecurity', 'Shimoga', 'No', '2022-01-06'),
(8, 'Sujna', 'Gaonkar', 'sujna@gmail.com', 'https://linkedin.com/sujna', 'Web developer', 'Sirsi', 'Yes', '2022-01-06'),
(9, 'Hema', 'Kapoor', 'hema@gmail.com', 'https://linkedin.com/hema', 'Web developer', 'Jaipur', 'Yes', '2022-01-12'),
(13, 'Sushmitha', 'Raj', 'sushmitha@gmail.com', 'https://linkedin.com/sushmitharaj', 'Tester', 'Chikmanglore', 'Yes', '2022-01-15'),
(14, 'Aesha', 'Khan', 'aesha@gmail.com', 'https://linkedin.com/aesha', 'HR', 'Delhi', 'Yes', '2022-01-15'),
(15, 'Varsha', 'Hegde', 'varsha@gmail.com', 'https://linkedin.com/varsha', 'Web', 'Banglore', 'Yes', '2022-01-15'),
(16, 'Suahana', 'Sharma', 'suhana@gmail.com', 'https://linkedin.com/suhana', 'Tester', 'Trivendrum', 'No', '2022-01-15'),
(17, 'Romi', 'Raza', 'romi@gmail.com', 'https://linkedin.com/romi', 'Web', 'Tumkur', 'Yes', '2022-03-12');

--
-- Triggers `submissions`
--
DELIMITER $$
CREATE TRIGGER `delete_data` BEFORE DELETE ON `submissions` FOR EACH ROW INSERT into delete_log SET name=OLD.fname,position=OLD.position,email=OLD.email,app_id=OLD.id,date=OLD.date
$$
DELIMITER ;

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
,`mobile` varchar(10)
,`vision` text
);

-- --------------------------------------------------------

--
-- Table structure for table `update_log`
--

CREATE TABLE `update_log` (
  `app_id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `update_log`
--

INSERT INTO `update_log` (`app_id`, `position`, `city`, `Name`) VALUES
(13, 'Web', 'Chikmanglore', 'Sushmitha');

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
(6, 'Tushar', 'ffdg t tet ttrywy trt yyu uiii77i', 'Competitive programming'),
(8, 'Sujna', 'safef ry', 'Competitive programming'),
(9, 'Hema', 'Nothing', 'Competitive programming'),
(13, 'Sushmitha', 'f tretyty yuuuyuuiii qwjori  irewrp[ewr', 'Communication'),
(14, 'Aesha', 'e tt y66 u5u757 7u7  trretr', 'Ethical hacking'),
(15, 'Varsha', 'the faculty or state of being able to see.', 'Web design'),
(16, 'Suahana', 'the faculty or state of being able to see.', 'Marketing'),
(17, 'Romi', 'Nothing as of now', 'SQL');

-- --------------------------------------------------------

--
-- Structure for view `total`
--
DROP TABLE IF EXISTS `total`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total`  AS   (select `s`.`id` AS `id`,`s`.`fname` AS `fname`,`a`.`photo` AS `photo`,`s`.`lname` AS `lname`,`s`.`email` AS `email`,`s`.`linkedin` AS `linkedin`,`s`.`position` AS `position`,`s`.`branch` AS `branch`,`s`.`relocate` AS `relocate`,`a`.`dob` AS `dob`,`b`.`lwc` AS `lwc`,`b`.`xp` AS `xp`,`b`.`skill` AS `skill`,`l`.`mobile` AS `mobile`,`v`.`vision` AS `vision` from ((((`submissions` `s` join `applicant` `a`) join `locate` `l`) join `background` `b`) join `visions` `v`) where `s`.`id` = `a`.`app_id` and `s`.`id` = `l`.`id` and `s`.`id` = `v`.`id`)  ;

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
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
