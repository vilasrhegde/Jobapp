-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 06:35 PM
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
(3, 'Seeddtaram', 'Naiksa', 'seyet@gmail.com', 'linkedin/segggggete', 'Tester', 'Bombay', 'Not sure', '2021-11-06'),
(5, 'mama', 'gaonkar', 'manu@gmail.com', 'https://www.linkedin.com/in/shyam-535ff535/', 'Noob', 'Manglore', 'Yes', '2021-11-06'),
(7, 'manoj', 'gafdfdsonkar', 'manu@gmail.com', 'linkedin/', 'Noob', 'Manglore', 'Yes', '2021-11-06'),
(8, 'ffdasd', 'gaonkar', 'manu@gmail.com', 'linkedin/', 'Noob', 'Manglore', 'Yes', '2021-11-06'),
(9, 'ffff', 'asgaonkar', 'manu@gmail.com', 'linkedin/', 'chooo', 'Manglore', 'Yes', '2021-11-06'),
(10, 'ss', 'gaonkar', 'manu@gmail.com', 'linkedin/', 'Noob', 'Manglore', 'Yes', '2021-11-06'),
(11, 'Vilas', 'Hegde', 'vilasrhegde@gmail.com', 'https://www.linkedin.com', 'Web', 'Sirsi', 'No', '2021-11-06'),
(12, 'sandesh', 'japani', 'sandesh@GMAIL.COM', 'https://github.com/search?q=job+application+dbms', 'Web', 'Shimoga', 'No', '2021-11-06'),
(13, '', '', 'vivek', 'http://https://github.com/search?q=job+application+dbms', 'Developer', 'Shimoga', '', '0000-00-00'),
(14, '', '', 'raj@gmail.com', 'https://www.linkedin.com/inraj/', 'Developer', 'Banglore', '', '0000-00-00'),
(15, 'rakshit', 'Shetty', 'raok@gmail.com', 'https://www.linkedin.com/rakh', 'HR', 'Manglore', '', '0000-00-00'),
(16, 'rama', 'shyama', 'bhama@gmail.com', 'https://www.linkedin.com/ram', 'HR', 'Banglore', 'No', '2021-11-06'),
(17, 'sulekha', 'karanth', 'sulekha@gmail.com', 'https://www.linkedin.com/sulekha', 'Tester', 'hasan', 'Notsure', '2021-11-06'),
(18, 'Vikas', 'Hegde', 'vilasrhegde@gmail.com', 'https://www.linkedin.com', 'Developer', 'Banglore', 'No', '2021-11-06');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
