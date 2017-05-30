-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2017 at 02:16 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectID` int(11) NOT NULL,
  `teacher` varchar(20) NOT NULL,
  `student1` varchar(20) DEFAULT NULL,
  `student2` varchar(20) DEFAULT NULL,
  `student3` varchar(20) NOT NULL,
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

INSERT INTO `projects` (`projectID`, `teacher`, `student1`, `student2`, `student3`, `projectname`, `summary`, `status`, `grade`, `folder`, `date_creation`, `date_approved`, `date_finished`) VALUES
(0, 'maragkoudakis', 'empty', 'empty', 'empty', 'data mining techniqu', 'Modern techniques of data mining and information retrieval via rapid miner', 'not applied', NULL, 'project0', '2017-05-27 14:45:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Soras', 'nikos', 'empty', 'empty', 'EllhnwnSynelefsh', 'Polla Lefta', 'not applied', NULL, 'project2', '2017-05-30 10:09:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Soras', 'empty', 'empty', 'empty', 'thes na se dhrw', 'polu ksulo h fash', 'complete', NULL, 'project3', '2017-05-28 17:04:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Maragkoudakis', 'empty', 'empty', 'empty', 'WebDev', 'Project sta plaisia tou programmatismou sto diadiktio', 'not applied', NULL, 'project4', '2017-05-27 14:45:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Soras', 'empty', 'empty', 'empty', 'opou se vrw', 'fapes mia zwh', 'not applied', NULL, 'project7', '2017-05-27 14:45:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_confirms`
--

CREATE TABLE `project_confirms` (
  `confirmID` int(6) NOT NULL,
  `project` int(11) NOT NULL,
  `teacher` varchar(20) NOT NULL,
  `confirm` varchar(20) NOT NULL,
  `confirmed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_confirms`
--

INSERT INTO `project_confirms` (`confirmID`, `project`, `teacher`, `confirm`, `confirmed`) VALUES
(2, 0, 'soras', 'asdd', 0),
(3, 3, 'soras', 'asdd', 0),
(4, 3, 'Maragkoudakis', 'qVKpL5Gn5a', 1),
(5, 3, 'Soras', 'BzKEAdAwe2', 0),
(6, 3, 'tselepis', 'WeDfFKoz5x', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_stages`
--

CREATE TABLE `project_stages` (
  `project_stagesID` int(6) NOT NULL,
  `projectID` int(11) NOT NULL,
  `stage_name` varchar(50) NOT NULL,
  `stage_summary` varchar(50) NOT NULL,
  `stage_number` tinyint(4) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_stages`
--

INSERT INTO `project_stages` (`project_stagesID`, `projectID`, `stage_name`, `stage_summary`, `stage_number`, `status`) VALUES
(1, 2, 'Vivliografia', '...', 1, 'done'),
(3, 2, 'Sxediasmos', '...', 2, 'pending'),
(4, 2, 'Ylopoihsh', '...', 3, 'pending');

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
  `file` varchar(50) NOT NULL,
  `project_stage` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`uploadID`, `uploader`, `project`, `date_creation`, `folder`, `file`, `project_stage`) VALUES
(20, 'nikos', 2, '2017-05-30 10:19:32', 'project2', 'IMG_20170124_135205.jpg', 1),
(25, 'Nikos', 2, '2017-05-29 21:00:00', 'project2', 'IMG_20170124_135255.jpg', 1),
(26, 'Nikos', 2, '2017-05-29 21:00:00', 'project2', 'IMG_20170301_212258.jpg', 1);

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
('empty', 'empty', 'empty', 'empty', 'empty'),
('giwrgos', '123', 'giwrgos@gmail.com', 'student', 'confirmed'),
('Maragkoudakis', '123', 'nikos.fourtounis95@gmail.com', 'teacher', 'confirmed'),
('Nikos', '123', 'nikos@gmail.com', 'student', 'confirmed'),
('nikos2', '123', 'nikos2@gmail.com', 'student', 'confirmed'),
('papadimos', '123', 'papadimos@gmail.com', 'teacher', 'confirmed'),
('pavlos', '123', 'pavlaras@gmail', 'student', 'confirmed'),
('Soras', '123', 'nickfortune@windowslive.com', 'teacher', 'confirmed'),
('stergiou', '123', 'stergiou@gmail.com', 'teacher', 'confirmed'),
('tselepis', '123', 'icsd13195@icsd.aegean.gr', 'teacher', 'confirmed');

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
-- Indexes for table `project_confirms`
--
ALTER TABLE `project_confirms`
  ADD PRIMARY KEY (`confirmID`),
  ADD KEY `project` (`project`),
  ADD KEY `teacher` (`teacher`);

--
-- Indexes for table `project_stages`
--
ALTER TABLE `project_stages`
  ADD PRIMARY KEY (`project_stagesID`),
  ADD KEY `projectID` (`projectID`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`uploadID`),
  ADD UNIQUE KEY `file` (`file`),
  ADD KEY `uploader` (`uploader`),
  ADD KEY `project` (`project`),
  ADD KEY `project_stage` (`project_stage`);

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
  MODIFY `applicationID` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_confirms`
--
ALTER TABLE `project_confirms`
  MODIFY `confirmID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `project_stages`
--
ALTER TABLE `project_stages`
  MODIFY `project_stagesID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `uploadID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
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
-- Constraints for table `project_confirms`
--
ALTER TABLE `project_confirms`
  ADD CONSTRAINT `project_confirms_ibfk_1` FOREIGN KEY (`project`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_confirms_ibfk_2` FOREIGN KEY (`teacher`) REFERENCES `users` (`username`);

--
-- Constraints for table `project_stages`
--
ALTER TABLE `project_stages`
  ADD CONSTRAINT `project_stages_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_ibfk_1` FOREIGN KEY (`project`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uploads_ibfk_2` FOREIGN KEY (`uploader`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uploads_ibfk_3` FOREIGN KEY (`project_stage`) REFERENCES `project_stages` (`project_stagesID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
