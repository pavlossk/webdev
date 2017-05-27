-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2017 at 01:12 PM
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
(8, 2, 'Nikos', 'approved'),
(9, 3, 'Nikos', 'applied'),
(11, 2, 'nikos2', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectID` int(11) NOT NULL,
  `teacher` varchar(20) NOT NULL,
  `student1` varchar(20) DEFAULT NULL,
  `student2` varchar(20) DEFAULT NULL,
  `projectname` varchar(20) NOT NULL,
  `summary` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL,
  `grade` int(4) DEFAULT NULL,
  `folder` varchar(20) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_approved` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_finished` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectID`, `teacher`, `student1`, `student2`, `projectname`, `summary`, `status`, `grade`, `folder`, `date_creation`, `date_approved`, `date_finished`) VALUES
(0, 'maragkoudakis', 'nikos', 'pavlos', 'data mining techniqu', 'Modern techniques of data mining and information retrieval via rapid miner', 'complete', 10, 'project0', '2017-05-25 10:07:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Soras', 'nikos2', 'Soras', 'EllhnwnSynelefsh', 'Polla Lefta', 'approved', NULL, 'project2', '2017-05-26 18:00:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Soras', 'nikos', 'Soras', 'thes na se dhrw', 'polu ksulo h fash', 'approved', NULL, 'project3', '2017-05-26 18:00:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Maragkoudakis', 'Maragkoudakis', 'Maragkoudakis', 'WebDev', 'Project sta plaisia tou programmatismou sto diadiktio', 'approved', NULL, 'project4', '2017-05-25 10:07:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Soras', 'Soras', 'Soras', 'opou se vrw', 'fapes mia zwh', 'ready', NULL, 'project7', '2017-05-25 10:07:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `uploadID` int(6) NOT NULL,
  `uploader` varchar(20) NOT NULL,
  `project` int(6) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `folder` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`uploadID`, `uploader`, `project`, `date_creation`, `folder`, `file`) VALUES
(17, 'Soras', 2, '2017-05-26 21:00:00', 'project2', 'IMG_20170124_135205.jpg'),
(18, 'Soras', 3, '2017-05-26 21:00:00', 'project3', 'IMG_20170304_143547.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `confirm` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `type`, `confirm`) VALUES
('Maragkoudakis', '123', 'maragkoudakis@gmail.', 'teacher', 'confirmed'),
('Nikos', '123', 'nickfortune@windowslive.com', 'student', 'confirmed'),
('nikos2', 'E#4acyxg', 'nikos.fourtounis95@gmail.com', 'student', 'confirmed'),
('pavlos', '123', 'pavlaras@gmail', 'student', 'confirmed'),
('sd', '', '', '', '2mDljTIpH8'),
('sdasdd', 'asd123A', 'dd', '', 'WoCwBkwOVz'),
('Soras', '123', 'soras123@gmail.com', 'teacher', 'confirmed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`applicationID`),
  ADD KEY `projectID` (`projectID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectID`),
  ADD UNIQUE KEY `projectname` (`projectname`),
  ADD KEY `teacher` (`teacher`),
  ADD KEY `student1` (`student1`),
  ADD KEY `student2` (`student2`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`uploadID`),
  ADD UNIQUE KEY `file` (`file`),
  ADD KEY `uploader` (`uploader`),
  ADD KEY `project` (`project`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `applicationID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `uploadID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`student1`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`student2`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_FK` FOREIGN KEY (`teacher`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_ibfk_1` FOREIGN KEY (`project`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uploads_ibfk_2` FOREIGN KEY (`uploader`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
