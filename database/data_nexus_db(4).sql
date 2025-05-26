-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2025 at 05:37 AM
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
-- Database: `data_nexus_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `expressions_of_interest`
--

CREATE TABLE `expressions_of_interest` (
  `EOInumber` int(11) NOT NULL,
  `job_ref` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(46) NOT NULL,
  `suburb` varchar(60) NOT NULL,
  `state` varchar(3) NOT NULL,
  `postcode` varchar(4) NOT NULL,
  `email_address` varchar(360) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `skills` varchar(500) NOT NULL,
  `other_skills` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expressions_of_interest`
--

INSERT INTO `expressions_of_interest` (`EOInumber`, `job_ref`, `first_name`, `last_name`, `gender`, `address`, `suburb`, `state`, `postcode`, `email_address`, `phone_number`, `skills`, `other_skills`, `status`) VALUES
(1, 1, 'Tom', 'Jerry', 'Male', '21 Jump Street, California', 'Geelong', 'QLD', '3336', 'something@something.com', '0456223778', 'wwwww', 'wwwww', 'New'),
(2, 1, 'Tom', 'Jerry', 'Male', '21 Jump Street, California', 'Geelong', 'QLD', '3336', 'something@something.com', '0456223778', 'wwwww', 'wwwww', 'New'),
(3, 1, 'Tom', 'Jerry', 'Male', '21 Jump Street, California', 'Geelong', 'QLD', '3336', 'something@something.com', '0456223778', 'wwwww', 'wwwww', 'New');

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

INSERT INTO `jobs` (`id`, `position`, `company`, `location`, `salary`, `description`, `responsibilities`, `essential_qualifications`, `preferable_qualifications`, `languages`) VALUES
(1, 'Cybersecurity Specialist', 'Data Nexus', 'Melbourne', '$100,000', 'Manage security systems', 'Monitor networks', 'Bachelor\'s Degree', 'Certifications', 'English'),
(2, 'Investigation Team Lead', 'Data Nexus', 'Sydney', '$120,000', 'Lead investigations', 'Team management', 'Bachelor\'s Degree', 'Master\'s Degree', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'adminHR', 'adminHR123');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expressions_of_interest`
--
ALTER TABLE `expressions_of_interest`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
