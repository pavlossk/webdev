-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2017 at 12:22 PM
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

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`applicationID`, `projectID`, `student1`, `student2`, `student3`, `status`) VALUES
(10, 2, 'Nikos', 'pavlos', 'giwrgos', 'approved'),
(13, 3, 'Nikos', 'empty', 'empty', 'applied'),
(14, 4, 'Nikos', 'pavlos', 'empty', 'applied'),
(15, 7, 'Nikos', 'pavlos', 'giwrgos', 'applied'),
(16, 3, 'paul', 'empty', 'empty', 'approved'),
(18, 0, 'Nikos', 'pavlos', 'empty', 'applied');

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
  `projectname` varchar(20) NOT NULL,
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
(0, 'Maragkoudakis', 2, 'empty', 'empty', 'empty', 'data mining techniqu', 'Modern techniques of data mining and information retrieval via rapid miner', 'applied', NULL, 'project0', '2017-06-02 08:51:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Soras', 3, 'giwrgos', 'Nikos', 'pavlos', 'EllhnwnSynelefsh', 'Polla Lefta', 'complete', 9.5, 'project2', '2017-06-02 08:40:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Soras', 1, 'paul', 'empty', 'empty', 'thes na se dhrw', 'polu ksulo h fash', 'approved', 9.25, 'project3', '2017-06-02 09:16:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Maragkoudakis', 2, 'empty', 'empty', 'empty', 'WebDev', 'Project sta plaisia tou programmatismou sto diadiktio', 'applied', NULL, 'project4', '2017-06-02 08:46:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Soras', 3, 'empty', 'empty', 'empty', 'opou se vrw', 'fapes mia zwh', 'applied', NULL, 'project7', '2017-06-02 08:47:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(16, 2, 'Maragkoudakis', 'o84V0eUYQw', 1),
(17, 2, 'stergiou', 'XugtkJ72Cn', 1),
(18, 2, 'tselepis', 'JHUEYpOiaE', 1),
(52, 2, 'Maragkoudakis', 'Eyj3uiMaOM', 0),
(53, 2, 'stergiou', '6bIc55Lj6k', 0),
(54, 2, 'tselepis', '4iZReT4ckj', 0),
(55, 2, 'Maragkoudakis', 'zbhTJPS25H', 0),
(56, 2, 'stergiou', 'YM6TLWJZYS', 0),
(57, 2, 'tselepis', 'r5OqeN1Wxc', 0),
(58, 3, 'Maragkoudakis', '0rc4SM9jrY', 1),
(59, 3, 'stergiou', 'ge0wD2soRr', 1),
(60, 3, 'tselepis', '611GOpJsU1', 1),
(61, 3, 'Maragkoudakis', '0EpqpT8P0v', 0),
(62, 3, 'stergiou', 'xo6XGmAebq', 0),
(63, 3, 'tselepis', 'LL8Ouz7f74', 0);

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

--
-- Dumping data for table `project_grades`
--

INSERT INTO `project_grades` (`project_gradeID`, `project`, `teacher`, `grade`) VALUES
(13, 2, 'tselepis', 10),
(14, 2, 'Soras', 10),
(15, 2, 'Maragkoudakis', 9),
(16, 2, 'stergiou', 9),
(17, 3, 'Soras', 10),
(18, 3, 'Soras', 10),
(19, 3, 'stergiou', 9),
(20, 3, 'Maragkoudakis', 8);

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

--
-- Dumping data for table `project_stages`
--

INSERT INTO `project_stages` (`project_stagesID`, `projectID`, `stage_name`, `stage_summary`, `stage_number`, `status`, `start_date`, `end_date`) VALUES
(1, 2, 'Vivliografia', '...', 1, 'done', '2017-04-02', '2017-05-04'),
(5, 0, 'vivliografia', '...', 1, 'done', '2017-04-18', '2017-05-17'),
(6, 0, 'Ylopoihsh', '...', 2, 'done', '2017-05-17', '2017-05-31'),
(10, 0, 'erevna', '...', 3, 'done', '2017-05-31', '2017-05-31'),
(11, 0, 'telikh analysh', '...', 4, 'current', '2017-05-31', '0000-00-00'),
(12, 3, 'vivliografia', '...', 1, 'done', '2017-05-01', '2017-05-17'),
(13, 3, 'Ylopoihsh', '...', 2, 'done', '2017-05-17', '2017-06-02'),
(35, 2, 'Ylopoihsh', '...', 2, 'done', '0000-00-00', '2017-06-01'),
(36, 2, 'teliko', '...', 3, 'done', '2017-06-01', '2017-06-01'),
(37, 3, 'teliko', '....', 3, 'done', '2017-06-02', '2017-06-02');

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
(26, 'Nikos', 2, '2017-05-29 21:00:00', 'project2', 'IMG_20170301_212258.jpg', 1),
(28, 'Nikos', 0, '2017-05-30 21:00:00', 'project0', 'NickFourtounisCV.pdf', 5),
(29, 'pavlos', 0, '2017-05-30 21:00:00', 'project0', 'Î’ÎµÎ²Î±Î¯Ï‰ÏƒÎ·_Î£Ï€Î¿Ï…Î´ÏŽÎ½.pdf', 5),
(30, 'paul', 3, '2017-06-01 21:00:00', 'project3', 'Î•ÏÎ³Î±ÏƒÎ¹ÌÎ± 2016-17.pdf', 13),
(31, 'Soras', 3, '2017-06-01 21:00:00', 'project3', '', 13),
(32, 'Soras', 3, '2017-06-01 21:00:00', 'project3', 'Î‘Î¦Îœ.pdf', 13),
(33, 'Soras', 3, '2017-06-01 21:00:00', 'project3', 'analytiki vathmologia (1).pdf', 12);

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
  `grade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `type`, `confirm`, `grade`) VALUES
('empty', 'empty', 'empty', 'empty', 'empty', NULL),
('giwrgos', '123', 'giwrgos@gmail.com', 'student', 'confirmed', 7),
('Maragkoudakis', '123', 'nikos.fourtounis95@gmail.com', 'teacher', 'confirmed', NULL),
('Nikos', '123', 'nikos@gmail.com', 'student', 'confirmed', 6),
('nikos2', '123', 'nikos2@gmail.com', 'student', 'confirmed', 5),
('papadimos', '123', 'papadimos@gmail.com', 'teacher', 'confirmed', NULL),
('paul', '1234567Aa', 'pavlos_sk@hotmail.com', 'student', 'confirmed', NULL),
('pavlos', '123', 'pavlaras@gmail', 'student', 'confirmed', 9),
('Soras', '123', 'test@windowslive.com', 'teacher', 'confirmed', NULL),
('stergiou', '123', 'nickfortune@windowslive.com', 'teacher', 'confirmed', NULL),
('tselepis', '123', 'icsd13195@icsd.aegean.gr', 'teacher', 'confirmed', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`applicationID`),
  ADD KEY `projectID` (`projectID`),
  ADD KEY `student1` (`student1`),
  ADD KEY `student2` (`student2`),
  ADD KEY `student3` (`student3`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectID`),
  ADD UNIQUE KEY `projectname` (`projectname`),
  ADD KEY `teacher` (`teacher`),
  ADD KEY `student1` (`student1`),
  ADD KEY `student2` (`student2`),
  ADD KEY `student3` (`student3`);

--
-- Indexes for table `project_confirms`
--
ALTER TABLE `project_confirms`
  ADD PRIMARY KEY (`confirmID`),
  ADD KEY `project` (`project`),
  ADD KEY `teacher` (`teacher`);

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
  MODIFY `applicationID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `project_confirms`
--
ALTER TABLE `project_confirms`
  MODIFY `confirmID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `project_grades`
--
ALTER TABLE `project_grades`
  MODIFY `project_gradeID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `project_stages`
--
ALTER TABLE `project_stages`
  MODIFY `project_stagesID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `uploadID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`student1`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_ibfk_3` FOREIGN KEY (`student2`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_ibfk_4` FOREIGN KEY (`student3`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`student1`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`student2`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_ibfk_6` FOREIGN KEY (`student3`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `user_FK` FOREIGN KEY (`teacher`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_confirms`
--
ALTER TABLE `project_confirms`
  ADD CONSTRAINT `project_confirms_ibfk_1` FOREIGN KEY (`project`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_confirms_ibfk_2` FOREIGN KEY (`teacher`) REFERENCES `users` (`username`);

--
-- Constraints for table `project_grades`
--
ALTER TABLE `project_grades`
  ADD CONSTRAINT `project_grades_ibfk_1` FOREIGN KEY (`project`) REFERENCES `projects` (`projectID`),
  ADD CONSTRAINT `project_grades_ibfk_2` FOREIGN KEY (`teacher`) REFERENCES `users` (`username`);

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
