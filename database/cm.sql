-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2019 at 03:24 PM
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
  `id` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `payable_amount` double NOT NULL,
  `paid_amount` double NOT NULL,
  `due` double NOT NULL,
  `fine` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts_detail`
--

INSERT INTO `accounts_detail` (`id`, `StudentId`, `payable_amount`, `paid_amount`, `due`, `fine`) VALUES
(1, 11, 11, 11, 11, 11),
(2, 11, 11, 11, 11, 11),
(3, 11, 11, 11, 11, 111),
(4, 11, 11, 11, 11, 111),
(5, 11, 11, 11, 11, 111),
(6, 11, 11, 11, 11, 111),
(7, 11, 11, 11, 11, 110);

-- --------------------------------------------------------

--
-- Table structure for table `certificate_nametype`
--

CREATE TABLE `certificate_nametype` (
  `id` int(11) NOT NULL,
  `Certifiate_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `certificate_nametype`
--

INSERT INTO `certificate_nametype` (`id`, `Certifiate_name`) VALUES
(1, 'assssssssssssssssss'),
(10, 'assssssssssssssssss'),
(11, 'assssssssssssssssss'),
(12, 'assssssssssssssssss'),
(13, 'sss'),
(14, 'ujjjjjj'),
(15, 'juuuu'),
(16, 'juuuu'),
(17, 'khan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `email`, `pass`) VALUES
(1, 'shuvo', 'shuvo', 'shuvo@daffodil.ac', '698d51a19d8a121ce581499d7b701668'),
(3, 'khan', 'khan', 'khan@gmail.com', '698d51a19d8a121ce581499d7b701668'),
(4, 'khan', '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(9, 'tanvir', 'kh', 'sakhan70774@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b'),
(13, 'ahamded', 'ah', 'a@gmail.com', '698d51a19d8a121ce581499d7b701668'),
(18, 'j', 'w', 'w@g.com', 'c4ca4238a0b923820dcc509a6f75849b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_detail`
--
ALTER TABLE `accounts_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate_nametype`
--
ALTER TABLE `certificate_nametype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_detail`
--
ALTER TABLE `accounts_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `certificate_nametype`
--
ALTER TABLE `certificate_nametype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
