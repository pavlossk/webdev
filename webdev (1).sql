-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2017 at 08:54 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `applicationID` int(20) NOT NULL,
  `projectID` int(11) NOT NULL,
  `studentID` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`applicationID`, `projectID`, `studentID`, `status`) VALUES
(1, 2, 'nikos', 'applied'),
(2, 4, 'nikos', 'applied'),
(3, 2, 'nikos', 'applied'),
(4, 4, 'nikos', 'applied'),
(5, 2, 'nikos', 'applied'),
(6, 2, 'nikos', 'applied'),
(7, 2, 'nikos', 'applied'),
(8, 2, 'nikos', 'applied'),
(9, 2, 'nikos', 'applied'),
(10, 2, 'soras', 'applied'),
(11, 4, 'Nikos', 'applied'),
(12, 2, 'Nikos', 'applied');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectID` int(11) NOT NULL,
  `teacher` varchar(20) NOT NULL,
  `projectname` varchar(20) NOT NULL,
  `summary` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectID`, `teacher`, `projectname`, `summary`) VALUES
(2, 'Soras', 'EllhnwnSynelefsh', 'Polla Lefta'),
(4, 'Maragkoudakis', 'WebDev', 'Project sta plaisia tou programmatismou sto diadiktio');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `TableID` int(6) UNSIGNED NOT NULL,
  `ShopID` int(6) UNSIGNED DEFAULT NULL,
  `TableName` varchar(20) NOT NULL,
  `Available` tinyint(1) UNSIGNED DEFAULT '0',
  `created` datetime DEFAULT NULL COMMENT 'Created Datetime',
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Updated Datetime'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`TableID`, `ShopID`, `TableName`, `Available`, `created`, `updated`) VALUES
(2, 6, '1', 1, '2017-04-23 13:57:50', '2017-05-22 11:24:26'),
(3, 6, '2', 1, '2017-04-23 16:44:11', '2017-05-22 11:24:26'),
(4, 6, '3', 1, '2017-05-18 16:29:21', '2017-05-22 11:24:26'),
(5, 6, '4', 1, '2017-04-23 16:44:29', '2017-05-22 11:24:26'),
(6, 6, '5', 1, '2017-04-23 16:44:34', '2017-05-22 11:24:26'),
(7, 6, '6', 1, '2017-04-23 16:48:24', '2017-05-22 11:24:26'),
(8, 6, '7', 1, '2017-04-23 16:48:28', '2017-05-22 11:24:26'),
(9, 6, '8', 1, '2017-04-23 16:48:33', '2017-05-22 11:24:26'),
(10, 6, '9', 1, '2017-04-23 16:48:37', '2017-05-22 11:24:26'),
(11, 6, '10', 1, '2017-04-23 16:48:40', '2017-05-22 11:24:26'),
(12, 6, '11', 1, '2017-04-23 16:48:45', '2017-05-22 11:24:26'),
(13, 6, '12', 1, '2017-04-23 16:48:48', '2017-05-22 11:24:26'),
(14, 4, '1', 1, '2017-05-18 16:31:22', '2017-05-22 11:24:26'),
(15, 4, '2', 1, '2017-05-18 16:31:22', '2017-05-22 11:24:26'),
(16, 4, '3', 1, '2017-05-18 16:31:22', '2017-05-22 11:24:26'),
(17, 4, '4', 1, '2017-05-18 16:31:22', '2017-05-22 11:24:26'),
(18, 4, '5', 1, '2017-05-18 16:31:22', '2017-05-22 11:24:26'),
(19, 4, '6', 1, '2017-05-18 16:31:22', '2017-05-22 11:24:26'),
(20, 4, '7', 1, '2017-05-18 16:31:22', '2017-05-22 11:24:26'),
(21, 4, '8', 1, '2017-05-18 16:31:22', '2017-05-22 11:24:26'),
(23, 4, '10', 1, '2017-05-18 16:31:22', '2017-05-22 11:24:26'),
(24, 4, '11', 1, '2017-05-18 16:31:22', '2017-05-22 11:24:26'),
(25, 7, '1', 1, '2017-05-18 16:38:10', '2017-05-22 11:24:26'),
(26, 7, '2', 1, '2017-05-18 16:38:10', '2017-05-22 11:24:26'),
(27, 7, '3', 1, '2017-05-18 16:38:10', '2017-05-22 11:24:26'),
(28, 7, '4', 1, '2017-05-18 16:38:10', '2017-05-22 11:24:26'),
(29, 7, '5', 1, '2017-05-18 16:38:10', '2017-05-22 11:24:26'),
(30, 7, '6', 1, '2017-05-18 16:38:10', '2017-05-22 11:24:26'),
(31, 7, '7', 1, '2017-05-18 16:38:10', '2017-05-22 11:24:26'),
(32, 7, '8', 1, '2017-05-18 16:38:10', '2017-05-22 11:24:26'),
(33, 7, '9', 1, '2017-05-18 16:38:10', '2017-05-22 11:24:26'),
(34, 7, '10', 1, '2017-05-18 16:38:10', '2017-05-22 11:24:26'),
(35, 7, '11', 1, '2017-05-18 16:38:10', '2017-05-22 11:24:26'),
(36, 7, '12', 1, '2017-05-18 16:38:10', '2017-05-22 11:24:26'),
(37, 7, '13', 1, '2017-05-18 16:38:10', '2017-05-22 11:24:26'),
(38, 7, '14', 1, '2017-05-18 16:38:10', '2017-05-22 11:24:26'),
(39, 7, '15', 1, '2017-05-18 16:38:10', '2017-05-22 11:24:26'),
(40, 7, '16', 1, '2017-05-18 16:38:10', '2017-05-22 11:24:26'),
(41, 7, '17', 1, '2017-05-18 16:38:10', '2017-05-22 11:24:26'),
(42, 7, '18', 1, '2017-05-18 16:38:10', '2017-05-22 11:24:26'),
(43, 7, '19', 1, '2017-05-18 16:38:10', '2017-05-22 11:24:26'),
(44, 8, '1', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(45, 8, '2', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(46, 8, '3', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(47, 8, '4', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(48, 8, '5', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(49, 8, '6', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(50, 8, '7', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(51, 8, '8', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(52, 8, '9', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(53, 8, '10', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(54, 8, '11', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(55, 8, '12', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(56, 8, '13', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(57, 8, '14', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(58, 8, '15', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(59, 8, '16', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(60, 8, '17', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(61, 8, '18', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(62, 8, '19', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(63, 8, '20', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(64, 8, '21', 1, '2017-05-18 16:41:54', '2017-05-22 11:24:26'),
(66, 1, '1', 1, '2017-05-20 11:53:50', '2017-05-22 11:24:26'),
(67, 1, '2', 1, '2017-05-20 11:58:20', '2017-05-22 11:24:26'),
(68, 1, '3', 1, '2017-05-20 11:58:20', '2017-05-22 11:24:26'),
(69, 1, '4', 1, '2017-05-20 11:58:20', '2017-05-22 11:24:26'),
(70, 1, '5', 1, '2017-05-20 11:58:20', '2017-05-22 11:24:26'),
(71, 2, '1', 1, '2017-05-20 11:59:13', '2017-05-22 11:24:26'),
(72, 2, '2', 1, '2017-05-20 11:59:13', '2017-05-22 11:24:26'),
(73, 2, '3', 1, '2017-05-20 11:59:13', '2017-05-22 11:24:26'),
(74, 2, '4', 1, '2017-05-20 11:59:13', '2017-05-22 11:24:26'),
(75, 2, '5', 1, '2017-05-20 11:59:13', '2017-05-22 11:24:26'),
(76, 2, '6', 1, '2017-05-20 11:59:13', '2017-05-22 11:24:26'),
(77, 2, '7', 1, '2017-05-20 11:59:13', '2017-05-22 11:24:26'),
(78, 2, '8', 1, '2017-05-20 11:59:13', '2017-05-22 11:24:26'),
(79, 3, '1', 1, '2017-05-20 12:03:40', '2017-05-22 11:24:26'),
(80, 3, '2', 1, '2017-05-20 12:03:40', '2017-05-22 11:24:26'),
(81, 3, '3', 1, '2017-05-20 12:03:40', '2017-05-22 11:24:26'),
(82, 3, '4', 1, '2017-05-20 12:03:40', '2017-05-22 11:24:26'),
(83, 3, '5', 1, '2017-05-20 12:03:40', '2017-05-22 11:24:26'),
(84, 3, '6', 1, '2017-05-20 12:03:40', '2017-05-22 11:24:26'),
(85, 3, '7', 1, '2017-05-20 12:03:40', '2017-05-22 11:24:26'),
(86, 3, '8', 1, '2017-05-20 12:03:40', '2017-05-22 11:24:26'),
(87, 3, '9', 1, '2017-05-20 12:03:40', '2017-05-22 11:24:26'),
(88, 4, '12', 1, '2017-05-20 14:51:04', '2017-05-22 11:24:26'),
(90, 4, '13', 1, '2017-05-20 14:54:43', '2017-05-22 11:24:26'),
(95, 4, '14', 1, '2017-05-20 17:37:23', '2017-05-22 11:24:26'),
(96, 4, '15', 1, '2017-05-20 17:38:13', '2017-05-22 11:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `type`) VALUES
('Maragkoudakis', '123', 'maragkoudakis@gmail.', 'teacher'),
('Nikos', '123', 'nickfortune@windowsl', 'student'),
('Soras', '123', 'soras123@gmail.com', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`applicationID`),
  ADD KEY `projectID` (`projectID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectID`),
  ADD KEY `users.username` (`teacher`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`TableID`),
  ADD KEY `ShopID` (`ShopID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `applicationID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `TableID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `projectID` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE,
  ADD CONSTRAINT `studentID` FOREIGN KEY (`studentID`) REFERENCES `users` (`username`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`teacher`) REFERENCES `users` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
