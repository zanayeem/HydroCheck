-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 07:04 PM
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
-- Database: `hydrocheck`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(4) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_uname` varchar(30) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_cell` varchar(11) NOT NULL,
  `admin_photo` varchar(200) NOT NULL,
  `admin_status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_uname`, `admin_email`, `admin_password`, `admin_cell`, `admin_photo`, `admin_status`) VALUES
(4, 'Zannatun Nayeem', 'zanayeem', 'nayeem123able@gmail.com', '$2y$10$hF3j/YbzoPZ69gA51cDSUOI.GERPthVP.qFh1QkjVEHNuPpT3nXUq', '', '', 'inactive'),
(5, 'Imtiaz Malek ', 'imtiaz', 'imtiaz@gmail.com', '$2y$10$bj/HKXowJxYjML7S64Q4N.C2MXYNFvMiJreeyk4NEVQpKxfPq1xpu', '', '', 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
