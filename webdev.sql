-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2017 at 11:03 AM
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
  `student1` varchar(20) NOT NULL,
  `student2` varchar(30) NOT NULL,
  `student3` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `lessonID` int(6) NOT NULL,
  `lessonname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lessonID`, `lessonname`) VALUES
(2, 'Java'),
(3, 'Databases I'),
(4, 'Databases II'),
(5, 'Web Development'),
(6, 'Buisness Analytics'),
(7, 'Physics I'),
(8, 'Physics II'),
(9, 'Information Retrieval'),
(10, 'Data Mining');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectID` int(11) NOT NULL,
  `teacher` varchar(20) NOT NULL,
  `students_number` tinyint(4) NOT NULL,
  `student1` varchar(20) DEFAULT NULL,
  `student2` varchar(20) DEFAULT NULL,
  `student3` varchar(20) NOT NULL,
  `projectname` varchar(50) NOT NULL,
  `summary` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL,
  `grade` float DEFAULT NULL,
  `folder` varchar(20) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_approved` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_finished` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectID`, `teacher`, `students_number`, `student1`, `student2`, `student3`, `projectname`, `summary`, `status`, `grade`, `folder`, `date_creation`, `date_approved`, `date_finished`) VALUES
(1, 'maragkoudakis', 2, 'empty', 'empty', 'empty', 'data mining techniques', 'Modern techniques of data mining and information retrieval via rapid miner', 'not applied', NULL, 'project0', '2017-06-04 09:37:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'kambourakis', 3, 'empty', 'empty', 'empty', 'penetration testing', 'penetration testing on aegean\'s webserver', 'not applied', NULL, 'project2', '2017-06-04 09:37:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'kambourakis', 1, 'empty', 'empty', 'empty', 'firewalls security', 'firewall installation and configuration on aegean webserver', 'not applied', NULL, 'project3', '2017-06-08 09:02:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'maragkoudakis', 2, 'empty', 'empty', 'empty', 'information retrieval algorithms', 'studying and researching on modern ir algorithms', 'not applied', NULL, 'project4', '2017-06-04 09:37:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'kambourakis', 3, 'empty', 'empty', 'empty', 'forensics techniques', 'research and investigating on recent attacks on aegean websever via forensics', 'not applied', NULL, 'project7', '2017-06-04 09:38:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_confirms`
--

CREATE TABLE `project_confirms` (
  `confirmID` int(6) NOT NULL,
  `project` int(11) NOT NULL,
  `teacher` varchar(20) NOT NULL,
  `application` int(20) NOT NULL,
  `confirm` varchar(20) NOT NULL,
  `confirmed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_grades`
--

CREATE TABLE `project_grades` (
  `project_gradeID` int(6) NOT NULL,
  `project` int(11) NOT NULL,
  `teacher` varchar(20) NOT NULL,
  `grade` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `status` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `confirm` varchar(20) NOT NULL,
  `grade` int(11) DEFAULT NULL,
  `profile` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `type`, `confirm`, `grade`, `profile`) VALUES
('empty', 'empty', 'empty', 'empty', 'empty', NULL, ''),
('giwrgos', '123', 'giwrgos@gmail.com', 'student', 'confirmed', 7, ''),
('kambourakis', '123', 'test@windowslive.com', 'teacher', 'confirmed', NULL, ''),
('maragkoudakis', '123', 'nikos.fourtounis95@gmail.com', 'teacher', 'confirmed', NULL, ''),
('nikos', '123asdA', 'nikos.fourtounis957@gmail.com', 'student', 'confirmed', 9, 'NickFourtounisCV.pdf'),
('papadimos', '123', 'papadimos@gmail.com', 'teacher', 'confirmed', NULL, ''),
('paul', '1234567Aa', 'pavlos_sk@hotmail.com', 'student', 'confirmed', NULL, ''),
('stergiou', '123', 'nickfortune@windowslive.com', 'teacher', 'confirmed', NULL, ''),
('tselepis', '123', 'icsd13195@icsd.aegean.gr', 'teacher', 'confirmed', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`applicationID`),
  ADD KEY `student1` (`student1`),
  ADD KEY `student2` (`student2`),
  ADD KEY `student3` (`student3`),
  ADD KEY `project` (`projectID`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lessonID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectID`),
  ADD UNIQUE KEY `projectname` (`projectname`),
  ADD KEY `teacher` (`teacher`),
  ADD KEY `student1` (`student1`),
  ADD KEY `student2` (`student2`),
  ADD KEY `projects_ibfk_6` (`student3`);

--
-- Indexes for table `project_confirms`
--
ALTER TABLE `project_confirms`
  ADD PRIMARY KEY (`confirmID`),
  ADD KEY `project` (`project`),
  ADD KEY `teacher` (`teacher`),
  ADD KEY `application` (`application`);

--
-- Indexes for table `project_grades`
--
ALTER TABLE `project_grades`
  ADD PRIMARY KEY (`project_gradeID`),
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
  MODIFY `applicationID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lessonID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `project_confirms`
--
ALTER TABLE `project_confirms`
  MODIFY `confirmID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `project_grades`
--
ALTER TABLE `project_grades`
  MODIFY `project_gradeID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_stages`
--
ALTER TABLE `project_stages`
  MODIFY `project_stagesID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `uploadID` int(6) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`student1`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_ibfk_3` FOREIGN KEY (`student2`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_ibfk_4` FOREIGN KEY (`student3`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_ibfk_5` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`student1`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`student2`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_ibfk_6` FOREIGN KEY (`student3`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_FK` FOREIGN KEY (`teacher`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_confirms`
--
ALTER TABLE `project_confirms`
  ADD CONSTRAINT `project_confirms_ibfk_2` FOREIGN KEY (`teacher`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_confirms_ibfk_3` FOREIGN KEY (`project`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_confirms_ibfk_4` FOREIGN KEY (`application`) REFERENCES `applications` (`applicationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_grades`
--
ALTER TABLE `project_grades`
  ADD CONSTRAINT `project_grades_ibfk_2` FOREIGN KEY (`teacher`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_grades_ibfk_3` FOREIGN KEY (`project`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_stages`
--
ALTER TABLE `project_stages`
  ADD CONSTRAINT `project_stages_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_ibfk_2` FOREIGN KEY (`uploader`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uploads_ibfk_3` FOREIGN KEY (`project_stage`) REFERENCES `project_stages` (`project_stagesID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uploads_ibfk_4` FOREIGN KEY (`project`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
