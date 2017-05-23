-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2017 at 05:33 PM
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
(12, 2, 'Nikos', 'applied'),
(14, 7, 'nikos', 'applied'),
(15, 7, 'Nikos ', 'applied');

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
  `grade` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectID`, `teacher`, `projectname`, `summary`, `status`, `grade`) VALUES
(0, 'maragkoudakis', 'data mining techniqu', 'Modern techniques of data mining and information retrieval via rapid miner', 'complete', 10),
(2, 'Soras', 'EllhnwnSynelefsh', 'Polla Lefta', 'not applied', 0),
(7, 'Soras', 'opou se vrw', 'fapes mia zwh', 'ready', 0),
(3, 'Soras', 'thes na se dhrw', 'polu ksulo h fash', 'applied', 0),
(4, 'Maragkoudakis', 'WebDev', 'Project sta plaisia tou programmatismou sto diadiktio', 'approved', 0);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD UNIQUE KEY `projectname` (`projectname`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
