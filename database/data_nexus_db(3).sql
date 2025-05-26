-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2025 at 01:33 PM
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

--
-- Table structure for table `expressions_of_interest`
--

-- Corrected SQL Dump for Data Nexus

-- USERS TABLE
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`username`, `password`) VALUES
('adminHR', 'adminHR123');

-- JOBS TABLE
CREATE TABLE `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(60) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `salary` varchar(40) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `responsibilities` varchar(1000) DEFAULT NULL,
  `essential_qualifications` varchar(1000) DEFAULT NULL,
  `preferable_qualifications` varchar(1000) DEFAULT NULL,
  `languages` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `jobs` (`position`, `company`, `location`, `salary`, `description`, `responsibilities`, `essential_qualifications`, `preferable_qualifications`, `languages`) VALUES
('Cybersecurity Specialist', 'Data Nexus', 'Melbourne', '$100,000', 'Manage security systems', 'Monitor networks', 'Bachelor''s Degree', 'Certifications', 'English'),
('Investigation Team Lead', 'Data Nexus', 'Sydney', '$120,000', 'Lead investigations', 'Team management', 'Bachelor''s Degree', 'Master''s Degree', 'English');

-- EXPRESSIONS OF INTEREST TABLE
CREATE TABLE `expressions_of_interest` (
  `EOInumber` int(11) NOT NULL AUTO_INCREMENT,
  `job_reference_number` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `street_address` varchar(46) NOT NULL,
  `suburb` varchar(60) NOT NULL,
  `state` varchar(3) NOT NULL,
  `postcode` varchar(4) NOT NULL,
  `email_address` varchar(360) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `skills` varchar(500) NOT NULL,
  `other_skills` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'New',
  PRIMARY KEY (`EOInumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;