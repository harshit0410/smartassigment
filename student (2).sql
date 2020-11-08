-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 10:04 PM
-- Server version: 5.5.14
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `aid` int(11) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `afile` varchar(100) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  `sid` varchar(10) DEFAULT NULL,
  `sname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`aid`, `description`, `afile`, `tid`, `sid`, `sname`) VALUES
(2, 'This is second assignment', 'abc.docx', 1001, 'CS301', 'Algoritm'),
(3, 'hhhhh', 'abc.docx', 1001, 'CS301', 'Algorithm'),
(4, 'esrtdfghjkhgfxdgvhbjnkm', 'Compiler assignment1.docx', 1001, 'CS304', 'Compiler Design');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sapid` int(11) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `sem` varchar(10) NOT NULL,
  `roll` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`name`, `email`, `sapid`, `password`, `sem`, `roll`) VALUES
('Damanpreet Singh', 'damanpreet@gmail.com', 1000002099, 'd28a7db3d4ba96b5be47f0296811470a', '5', 170102099),
('Yash Singhal', 'yash@gmail.com', 1000008447, 'c9de0d97a9d6a6ab0a0c2ab9babe8fec', '6', 170102060),
('Harshit Singhal', 'harshitsinghal0410@gmail.com', 1000008448, '43d3e51d58de8a5cec3f6de57523d85a', '5', 170102031),
('Nikita Dabral', 'nikitadarbal30@gmail.com', 1000008657, '3708e92cd9ebc744b30bd349d916c80a', '5', 170102035),
('maitri mehta', 'maitrimehta2012@gmail.com', 1000008888, 'b72c7bb43c7445f15e97ae61317ec740', '5', 170102044);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sid` varchar(10) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `sem` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sid`, `sname`, `sem`) VALUES
('CS301', 'Algorithm', '5'),
('CS302', 'AI', '5');

-- --------------------------------------------------------

--
-- Table structure for table `submit`
--

CREATE TABLE `submit` (
  `aid` int(11) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  `sid` varchar(10) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `roll` int(11) DEFAULT NULL,
  `sfile` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `submit`
--

INSERT INTO `submit` (`aid`, `tid`, `sid`, `name`, `roll`, `sfile`) VALUES
(1, 1001, 'CS-101', 'Harshit', 170102031, 'abcd.docx'),
(1, 1002, 'CS-102', 'Harshit', 170102031, '51701-abcd.docx'),
(1, 1002, 'CS-102', 'Harshit', 170102031, '5377-abcd.docx'),
(2, 1001, 'CS301', 'Harshit Singhal', 170102031, '84497-Ad first page.docx'),
(3, 1001, 'CS301', 'Harshit Singhal', 170102031, '29102-Ad synopsys.docx');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tid` int(11) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tid`, `email`, `name`, `password`) VALUES
(1001, 'rahul@gmail.com', 'Rahul Kumae', 'rahul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`sapid`),
  ADD UNIQUE KEY `roll` (`roll`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
