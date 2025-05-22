-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2025 at 10:00 AM
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
-- Database: `data_nexus.db`
--

-- --------------------------------------------------------

--
-- Table structure for table `expressions_of_interest`
--

CREATE TABLE `expressions_of_interest` (
  `EOInumber` int(11) NOT NULL,
  `job_reference_number` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `street_address` varchar(46) NOT NULL,
  `suburb` int(60) NOT NULL,
  `state` int(3) NOT NULL,
  `postcode` varchar(4) NOT NULL,
  `email address` varchar(360) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `skills` varchar(500) NOT NULL,
  `other_skills` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `position` varchar(60) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `salary` varchar(40) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `responsibilities` varchar(1000) DEFAULT NULL,
  `essential_qualifications` varchar(1000) DEFAULT NULL,
  `preferable_qualifications` varchar(1000) DEFAULT NULL,
  `languages` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` ( `position`, `company`, `location`, `salary`, `description`, `responsibilities`, `essential_qualifications`, `preferable_qualifications`, `languages`) VALUES
('Cybersecurity Specialist', 'DataNexus\s CyberSec', 'Melbourne HQ', '$90,000 - $130,000', NULL, NULL, NULL, NULL, NULL),
('Investigation Team Leader', 'DataNexus\s CyberSec', 'Melbourne HQ', '$95,000 - $130,000', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expressions_of_interest`
--
ALTER TABLE `expressions_of_interest`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expressions_of_interest`
--
ALTER TABLE `expressions_of_interest`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
