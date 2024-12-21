-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2024 at 09:42 PM
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
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `number` text NOT NULL,
  `dob` text NOT NULL,
  `address` text NOT NULL,
  `photo` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `full_name`, `email`, `username`, `number`, `dob`, `address`, `photo`, `password`) VALUES
(1, 'ankit', 'ankit@gmail.com', 'ankit0411', '8394834953', '04-11-2002', 'rishikesh', 'profile/profile1.jpeg\r\n\r\n', 'ankit');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(24, 'HR'),
(25, 'IT'),
(26, 'SALES'),
(27, 'Finance');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `department` text NOT NULL,
  `number` text NOT NULL,
  `address` text NOT NULL,
  `dob` text NOT NULL,
  `date_of_joining` text NOT NULL,
  `photo` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `full_name`, `email`, `username`, `department`, `number`, `address`, `dob`, `date_of_joining`, `photo`, `password`) VALUES
(1, 'Mangal Pandey', 'mangal420@gmail.com', 'salse', 'Sales', '3434343434', 'diuhfkz,gsf', '2024-08-07', '2024-08-03', 'profile/earth.jpeg', 'mangal420'),
(4, 'Mangal Pandey', 'mangal420@gmail.com', 'salse', 'RC', '3434343434', 'diuhfkz,gsf', '2024-08-16', '2024-08-18', 'profile/profile1.jpeg', 'zdfgs'),
(5, 'Mangal Pandey', 'mangal420@gmail.com', 'salse', 'RC', '3434343434', 'diuhfkz,gsf', '2024-08-16', '2024-08-18', 'profile/profile1.jpeg', 'zdfgs'),
(6, 'ankit', 'mangal420@gmail.com', 'ankit', 'J&ampR', 'ankit', 'ankit', '2024-08-20', '2024-08-13', 'profile/earth.jpeg', 'ankit'),
(7, 'flast', 'last@gmail.com', 'ulast', 'J&ampR', '123', '', '2024-08-06', '2024-08-06', 'profile/dig-one.png', 'lastp'),
(8, 'zkjbdvjk', 'last@gmail.com', 'zkjdvnkjn', 'Shakti Traders', 'zkjkbdvkj', 'zkjlhzj', '2024-08-06', '2024-08-06', 'profile/dig-one.png', 'ulkzv'),
(9, 'skjdfnzn', 'last@gmail.com', 'k.fnvknz.dknfvnKJZN', 'Shakti Traders', 'lkcfnvznl', 'last', '2024-08-06', '2024-08-06', 'profile/dig-one.png', 'last'),
(11, 'ankit sharma', 'ankit@gmail.com', 'ak@12', 'J&ampR', '8394834953', 'rishikesh', '2024-08-07', '2024-08-07', 'profile/earth.jpeg', 'ankit'),
(12, 'amit', 'amit@gmial.com', 'amit', 'J&ampR', '83948349', 'rksh', '2024-12-11', '2024-12-19', 'profile/img3.jpg', 'amit');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendance`
--

CREATE TABLE `employee_attendance` (
  `att_id` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `photo` text NOT NULL,
  `datetime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_attendance`
--

INSERT INTO `employee_attendance` (`att_id`, `eid`, `photo`, `datetime`) VALUES
(20, 6, 'attendance-picture/photo_20241222020130.png', '2024-12-22 02:01:30'),
(23, 6, 'attendance-picture/photo_20241222020552.png', '2024-12-22 02:05:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  ADD PRIMARY KEY (`att_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
