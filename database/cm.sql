-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 03:14 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cm`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_detail`
--

CREATE TABLE `accounts_detail` (
  `local_id` int(11) NOT NULL,
  `payable_amount` double NOT NULL,
  `paid_amount` double NOT NULL,
  `due` double NOT NULL,
  `fine` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts_detail`
--

INSERT INTO `accounts_detail` (`local_id`, `payable_amount`, `paid_amount`, `due`, `fine`) VALUES
(100876, 3000, 3000, 0, 0),
(1000876, 3000, 2000, 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_info`
--

CREATE TABLE `course_info` (
  `id` int(11) NOT NULL,
  `course` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_info`
--

INSERT INTO `course_info` (`id`, `course`) VALUES
(921217, 'IFY');

-- --------------------------------------------------------

--
-- Table structure for table `session_info`
--

CREATE TABLE `session_info` (
  `id` int(20) NOT NULL,
  `course_id` int(50) NOT NULL,
  `session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session_info`
--

INSERT INTO `session_info` (`id`, `course_id`, `session`) VALUES
(40, 921217, 'March'),
(41, 921217, 'June');

-- --------------------------------------------------------

--
-- Table structure for table `students_info`
--

CREATE TABLE `students_info` (
  `local_id` varchar(11) NOT NULL,
  `ncc_id` varchar(11) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT '12345',
  `library_clearance` int(1) NOT NULL COMMENT '0=clear(yes)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students_info`
--

INSERT INTO `students_info` (`local_id`, `ncc_id`, `full_name`, `dob`, `email`, `phone`, `password`, `library_clearance`) VALUES
('100876', '00171363', 'Sharif', '2019-10-15', '1000876@daffodil.ac', '01836691343', '12345', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `id` int(11) NOT NULL,
  `ncc_id` varchar(11) NOT NULL,
  `session` varchar(200) NOT NULL,
  `course_id` varchar(200) NOT NULL,
  `delivery_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`id`, `ncc_id`, `session`, `course_id`, `delivery_date`) VALUES
(11, '00171363', '40', '921217', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `pass`) VALUES
(1, 'Admin', 'admin@g.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_detail`
--
ALTER TABLE `accounts_detail`
  ADD PRIMARY KEY (`local_id`);

--
-- Indexes for table `course_info`
--
ALTER TABLE `course_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_info`
--
ALTER TABLE `session_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_info`
--
ALTER TABLE `students_info`
  ADD PRIMARY KEY (`local_id`),
  ADD UNIQUE KEY `ncc_id` (`ncc_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `session_info`
--
ALTER TABLE `session_info`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `student_course`
--
ALTER TABLE `student_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
