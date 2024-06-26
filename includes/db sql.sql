-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 15, 2024 at 09:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj-alloc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `password`, `name`) VALUES
('ab1234', '1234', 'albus dumbledore');

-- --------------------------------------------------------

--
-- Table structure for table `alloted-students`
--

CREATE TABLE `alloted-students` (
  `regNo` varchar(200) NOT NULL,
  `facultyId` varchar(200) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `proposal` longtext NOT NULL,
  `project_name` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `regNo` varchar(200) NOT NULL,
  `facultyId` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `comment` mediumtext NOT NULL,
  `no` int(11) NOT NULL,
  `proposal` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `name` varchar(200) NOT NULL,
  `facultyId` varchar(200) NOT NULL,
  `phoneNo` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `studentsAlloted` int(15) NOT NULL,
  `driveLink` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `specialization` varchar(200) NOT NULL,
  `maxCap` int(200) NOT NULL DEFAULT 12,
  `user_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`name`, `facultyId`, `phoneNo`, `email`, `password`, `studentsAlloted`, `driveLink`, `designation`, `specialization`, `maxCap`, `user_image`) VALUES
('Albus DumbleDore', 'ab1234', '8527621952', 'albus@hogwarts.uk', '1234', 0, 'https://drive.google.com/file/d/1uXbzLcbNH-GW6Tzk22RBg1uc_XU9iQFf/view?usp=sharing', 'Head Master', 'Magic', 12, ''),
('prof snape', 'sn1234', '7894561230', 'snape@voldy.co', '1234', 0, 'https://drive.google.com/drive/folders/10LTmw-E-Zkm8ukeVnjNMmWpqB4JeVnLT', 'dark arts ', 'portions master', 20, '');

-- --------------------------------------------------------

--
-- Table structure for table `probstatements`
--

CREATE TABLE `probstatements` (
  `facultyId` varchar(200) NOT NULL,
  `probId` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `regNo` varchar(200) NOT NULL,
  `facultyId` varchar(200) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `proposal` mediumtext NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `accepted` int(11) DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(200) NOT NULL,
  `regNo` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phoneNo` varchar(20) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `year` int(3) NOT NULL,
  `mentorId` varchar(200) DEFAULT NULL,
  `user_image` varchar(200) NOT NULL,
  `req` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `regNo`, `email`, `password`, `phoneNo`, `branch`, `year`, `mentorId`, `user_image`, `req`) VALUES
('Arsh Kasid', '219301556', 'arshkasid046@gmail.com', '1234', '2147483647', 'Computer and Computer Engineering', 3, NULL, 'pp.png', 0),
('nishant', '219301590', 'nishnat@outlook.com', '1234', '1234567891', '123', 3, '', 'pp.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alloted-students`
--
ALTER TABLE `alloted-students`
  ADD PRIMARY KEY (`regNo`,`facultyId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`facultyId`);

--
-- Indexes for table `probstatements`
--
ALTER TABLE `probstatements`
  ADD PRIMARY KEY (`probId`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`regNo`,`facultyId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`regNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `probstatements`
--
ALTER TABLE `probstatements`
  MODIFY `probId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
