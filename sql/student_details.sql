-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 08:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academia`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `sid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `course` varchar(50) NOT NULL,
  `specialisation` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` int(6) NOT NULL,
  `is_approved` int(2) NOT NULL DEFAULT 0,
  `dob` date NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `community` varchar(50) NOT NULL,
  `caste` varchar(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `aadhar` int(12) NOT NULL,
  `pan` varchar(10) NOT NULL,
  `passport` varchar(9) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `foccupation` varchar(50) NOT NULL,
  `fmobile` bigint(10) NOT NULL,
  `femail` varchar(50) NOT NULL,
  `fincome` bigint(10) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `moccupation` varchar(50) NOT NULL,
  `mmobile` bigint(10) NOT NULL,
  `memail` varchar(50) NOT NULL,
  `mincome` bigint(10) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `goccupation` varchar(50) NOT NULL,
  `gmobile` bigint(10) NOT NULL,
  `gemail` varchar(50) NOT NULL,
  `gincome` bigint(10) NOT NULL,
  `marks_card` blob NOT NULL,
  `transfer` blob NOT NULL,
  `migration` blob NOT NULL,
  `photo` blob NOT NULL,
  `caste_img` blob NOT NULL,
  `sign` blob NOT NULL,
  `pdf` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
