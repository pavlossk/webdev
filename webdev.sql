-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2017 at 10:23 AM
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
(8, 2, 'dimitris', 'paul', 'nikos', 'approved'),
(9, 3, 'nikos', 'empty', 'empty', 'teacher_approved');

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
  `date_creation` date NOT NULL,
  `date_approved` date NOT NULL,
  `date_finished` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectID`, `teacher`, `students_number`, `student1`, `student2`, `student3`, `projectname`, `summary`, `status`, `grade`, `folder`, `date_creation`, `date_approved`, `date_finished`) VALUES
(1, 'maragkoudakis', 2, 'empty', 'empty', 'empty', 'data mining techniques', 'Modern techniques of data mining and information retrieval via rapid miner', 'complete', 10, 'project0', '2017-02-01', '2017-03-03', '2017-06-08'),
(2, 'kambourakis', 3, 'dimitris', 'paul', 'empty', 'penetration testing', 'penetration testing on aegean\'s webserver', 'complete', 9.5, 'project2', '2017-01-10', '2017-02-28', '2017-06-08'),
(3, 'kambourakis', 1, 'empty', 'empty', 'empty', 'firewalls security', 'firewall installation and configuration on aegean webserver', 'ready', NULL, 'project3', '2017-06-08', '0000-00-00', '0000-00-00'),
(4, 'maragkoudakis', 2, 'empty', 'empty', 'empty', 'information retrieval algorithms', 'studying and researching on modern ir algorithms', 'not applied', NULL, 'project4', '2017-06-04', '0000-00-00', '0000-00-00'),
(7, 'kambourakis', 3, 'empty', 'empty', 'empty', 'forensics techniques', 'research and investigating on recent attacks on aegean websever via forensics', 'not applied', NULL, 'project7', '2017-06-04', '0000-00-00', '0000-00-00');

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

--
-- Dumping data for table `project_confirms`
--

INSERT INTO `project_confirms` (`confirmID`, `project`, `teacher`, `application`, `confirm`, `confirmed`) VALUES
(18, 2, 'maragkoudakis', 8, 'zz412uH5fx', 1),
(19, 2, 'stergiou', 8, 'AT7jsNaUwC', 1),
(20, 2, 'tselepis', 8, 'kVwH4qEUn2', 1),
(35, 2, 'maragkoudakis', 0, 'M29JW29PHy', 0),
(36, 2, 'stergiou', 0, 'h20agHlYkF', 0),
(37, 2, 'tselepis', 0, 'Gzbhu23oKZ', 0),
(38, 2, 'maragkoudakis', 0, 'UGNUM2L2ay', 0),
(39, 2, 'stergiou', 0, 'QIEUnrlld9', 0),
(40, 2, 'tselepis', 0, 'OAIk9PGXYO', 0);

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
(8, 2, 'kambourakis', 10),
(10, 2, 'stergiou', 9),
(11, 2, 'tselepis', 9),
(12, 2, 'maragkoudakis', 10);

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
(1, 2, 'vivliografia', '...', 1, 'done', '2017-04-12', '2017-05-08'),
(2, 2, 'Ylopoihsh', '....', 2, 'done', '2017-05-08', '2017-06-08'),
(4, 1, 'vivliografia', '...', 1, 'done', '2017-03-08', '2017-03-29'),
(5, 1, 'efarmogh', '...', 2, 'done', '2017-03-29', '2017-05-10'),
(6, 1, 'teliko', '...', 3, 'done', '2017-05-10', '2017-06-08');

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
(1, 'paul', 2, '2017-06-07 21:00:00', 'project2', 'analytiki vathmologia (1).pdf', 1);

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
  `profile` varchar(30) NOT NULL,
  `signature` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `type`, `confirm`, `grade`, `profile`, `signature`) VALUES
('dimitris', '123', 'citysens.contanct@gmail.com', 'student', 'confirmed', 8, 'analytiki vathmologia (1).pdf', ''),
('empty', 'empty', 'empty', 'empty', 'empty', NULL, '', ''),
('giwrgos', '123', 'giwrgos@gmail.com', 'student', 'confirmed', 7, '', ''),
('kambourakis', '123', 'test@windowslive.com', 'teacher', 'confirmed', NULL, '', 'signature1'),
('maragkoudakis', '123', 'nikos.fourtounis95@gmail.com', 'teacher', 'confirmed', NULL, '', 'signature2'),
('nikos', '123', 'nikos.fourtounis957@gmail.com', 'student', 'confirmed', 9, 'NickFourtounisCV.pdf', ''),
('papadimos', '123', 'papadimos@gmail.com', 'teacher', 'confirmed', NULL, '', ''),
('paul', '123', 'pavlos_sk@hotmail.com', 'student', 'confirmed', NULL, '', ''),
('stergiou', '123', 'nickfortune@windowslive.com', 'teacher', 'confirmed', NULL, '', 'signature3'),
('tselepis', '123', 'icsd13195@icsd.aegean.gr', 'teacher', 'confirmed', NULL, '', 'signature4');

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
  MODIFY `applicationID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  MODIFY `confirmID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `project_grades`
--
ALTER TABLE `project_grades`
  MODIFY `project_gradeID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `project_stages`
--
ALTER TABLE `project_stages`
  MODIFY `project_stagesID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `uploadID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  ADD CONSTRAINT `project_confirms_ibfk_3` FOREIGN KEY (`project`) REFERENCES `projects` (`projectID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
