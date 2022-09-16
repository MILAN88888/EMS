-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2022 at 01:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbemployee`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmpId` bigint(20) NOT NULL,
  `RegNo` varchar(100) NOT NULL,
  `Emp_name` varchar(150) NOT NULL,
  `Designation` varchar(100) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone_no` bigint(20) NOT NULL,
  `Birth_date` date NOT NULL,
  `hobby` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmpId`, `RegNo`, `Emp_name`, `Designation`, `Email`, `Phone_no`, `Birth_date`, `hobby`) VALUES
(1, 'reg10', 'Raju shreth', 'Manager', 'raju@gmail.com', 9867799116, '1998-04-12', 'batminton, cricket'),
(2, 'reg02', 'Ram Sharma', 'Manager', 'ram@gmail.com', 9807445409, '1993-09-15', 'batminton, cricket'),
(3, 'reg03', 'Hari Chaudhary', 'Accountant', 'hari@gmail.com', 9807445408, '2002-09-18', 'batminton, chess'),
(4, 'reg04', 'Hariram Chaudhary', 'Designer', 'hariram@gmail.com', 9807445408, '2000-09-18', 'batminton, cricket, chess'),
(5, 'reg05', 'Harimaya Chaudhary', 'Tester', 'harimaya@gmail.com', 9807445407, '2001-09-18', 'batminton, football'),
(6, 'reg06', 'Bhoj Chaudhary', 'Developer', 'bhoj@gmail.com', 9807445418, '1997-09-18', 'football, volleyball'),
(7, 'reg07', 'BhojRaj Chaudhary', 'Developer', 'bhojraj@gmail.com', 9807445518, '2002-10-18', 'football, chess, volleyball'),
(8, 'reg08', 'Shiwam Chaudhary', 'Designer', 'shiwam@gmail.com', 9807445408, '2005-09-18', 'batminton, football, cricket'),
(25, 'reg18', 'Niraj dhwal', 'Developer', 'niraj23@gmail.com', 9832763566, '1997-09-09', 'batminton'),
(39, 'reg14', 'bivek chaudhary', 'Developer', 'bivek@gmail.com', 9807446409, '2014-08-06', 'batminton, football'),
(43, 'reg15', 'anjuli chaudhary', 'Developer', 'anjulii@gmail.com', 9803454358, '2013-12-04', 'volleyball'),
(44, 'reg16', 'sankar chaudhary', 'Manager', 'sankar@gmail.com', 9807515120, '1997-05-27', 'football, volleyball'),
(45, 'reg17', 'pawan chaudhary', 'Accountant', 'pawan@gmail.com', 9867788225, '2005-10-13', 'cricket, volleyball'),
(60, 'reg19', 'amit chaudhary', 'Developer', 'amit@gmail.com', 9867799116, '2002-08-12', 'chess, volleyball'),
(84, 'reg20', 'Lokman chaudhary', 'Designer', 'lokman@gmail.com', 9815488334, '1998-10-07', 'batminton, chess, volleyball'),
(86, 'reg21', 'Hari shar', 'Tester', 'harishah@gmail.com', 9807445489, '2001-10-10', 'batminton, football, volleyball'),
(88, 'reg22', 'pratima chaudhary', 'Developer', 'pratima@gmail.com', 9864456753, '2005-12-06', 'batminton, volleyball'),
(89, 'reg23', 'Krishana chaudhary', 'Developer', 'krish@gmail.com', 9806523436, '2002-10-08', 'volleyball'),
(90, 'reg24', 'Shivraj Chaudhary', 'Developer', 'shivraj@gmail.com', 9867755645, '1998-07-28', 'batminton, volleyball'),
(91, 'reg25', 'mausami bohora', 'Designer', 'mausami@gmail.com', 9815423445, '1996-09-10', 'batminton, volleyball'),
(92, 'reg26', 'sonu chaudhary', 'Designer', 'sonu@gmail.com', 9815234524, '2001-08-14', 'batminton, football, cricket'),
(93, 'reg27', 'Kanti sharma', 'Tester', 'karnti@gmail.com', 9867745672, '2001-09-12', 'batminton, football'),
(94, 'reg28', 'Nikhil Kumar Maurya', 'Developer', 'nikhilmau@gmail.com', 9835542674, '1994-10-04', 'cricket, volleyball'),
(95, 'reg29', 'Sandip Thapa', 'Tester', 'sandip@gmail.com', 9853478394, '1996-10-15', 'football, chess'),
(96, 'reg30', 'Nishika sharma', 'Designer', 'nishika@gmail.com', 9834576452, '2000-12-19', 'football, chess'),
(97, 'reg31', 'Nilam chaudhary', 'Designer', 'nilam@gmail.com', 9815487335, '1997-05-27', 'batminton, volleyball'),
(98, 'reg32', 'Harish Tamang', 'Designer', 'harish@gmail.com', 9834567894, '2001-09-11', 'cricket, chess'),
(99, 'reg33', 'Rohan Nair', 'Tester', 'rohan@gmail.com', 8756524568, '1998-09-22', 'football, volleyball'),
(100, 'reg34', 'Suman chaudhary', 'Designer', 'suman@gmail.com', 9845643576, '2005-09-13', 'football, cricket');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD UNIQUE KEY `EmpId` (`EmpId`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmpId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
