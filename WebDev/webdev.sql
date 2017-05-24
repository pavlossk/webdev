-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2017 at 05:05 PM
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
(1, 0, 'Nikos', 'applied'),
(2, 0, 'Nikos', 'applied'),
(3, 2, 'Nikos', 'applied'),
(4, 0, 'Nikos', 'applied'),
(5, 0, 'Nikos', 'applied');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectID` int(11) NOT NULL,
  `teacher` varchar(20) NOT NULL,
  `projectname` varchar(20) NOT NULL,
  `summary` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL,
  `grade` int(4) DEFAULT NULL,
  `folder` varchar(20) NOT NULL,
  `student1` varchar(20) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_approved` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_finished` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectID`, `teacher`, `projectname`, `summary`, `status`, `grade`, `folder`, `student1`, `date_creation`, `date_approved`, `date_finished`) VALUES
(0, 'maragkoudakis', 'data mining techniqu', 'Modern techniques of data mining and information retrieval via rapid miner', 'complete', 10, 'project0', '', '2017-05-24 15:03:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Soras', 'EllhnwnSynelefsh', 'Polla Lefta', 'not applied', NULL, '', '', '2017-05-24 15:03:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Soras', 'thes na se dhrw', 'polu ksulo h fash', 'applied', NULL, '', '', '2017-05-24 15:03:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Maragkoudakis', 'WebDev', 'Project sta plaisia tou programmatismou sto diadiktio', 'approved', NULL, 'project4', '', '2017-05-24 15:03:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Soras', 'opou se vrw', 'fapes mia zwh', 'ready', NULL, 'project7', '', '2017-05-24 15:03:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `confirm` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `type`, `confirm`) VALUES
('Maragkoudakis', '123', 'maragkoudakis@gmail.', 'teacher', 'confirmed'),
('Nikos', '123', 'nickfortune@windowsl', 'student', 'confirmed'),
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
  ADD KEY `student1_2` (`student1`);

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
  MODIFY `applicationID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`teacher`) REFERENCES `users` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
