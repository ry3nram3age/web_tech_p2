-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2025 at 01:17 PM
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
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `job_reference_number` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `street_address` varchar(46) NOT NULL,
  `suburb` varchar(60) NOT NULL,
  `state` varchar(3) NOT NULL,
  `postcode` varchar(4) NOT NULL,
  `email_address` varchar(360) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `skills` varchar(500) NOT NULL,
  `other_skills` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `job_reference_number`, `first_name`, `last_name`, `gender`, `street_address`, `suburb`, `state`, `postcode`, `email_address`, `phone_number`, `skills`, `other_skills`, `status`) VALUES
(5, 2, 'John', 'Doe', 'Male', '123 Main St', 'Melbourne', 'VIC', '3333', 'john.doe@example.com', 412345678, 'Java, PHP', 'Graphic Design', 'New'),
(6, 2, 'Jane', 'Smith', 'Female', '456 King St', 'Sydney', 'NSW', '2000', 'jane.smith@example.com', 423456789, 'Python, SQL', 'Public Speaking', 'New'),
(7, 2, 'Alice', 'Johnson', 'Female', '789 Queen St', 'Brisbane', 'QLD', '4000', 'alice.j@example.com', 434567890, 'C#, .NET', 'Marketing', 'Approved'),
(8, 1, 'Bob', 'Williams', 'Male', '321 Collins St', 'Melbourne', 'VIC', '3000', 'bob.w@example.com', 445678901, 'React, JavaScript', 'UI Design', 'Rejected'),
(9, 1, 'Charlie', 'Brown', 'Male', '654 George St', 'Sydney', 'NSW', '2000', 'charlie.b@example.com', 456789012, 'Linux, Docker', 'DevOps', 'New'),
(10, 2, 'Emily', 'Davis', 'Female', '987 Ann St', 'Brisbane', 'QLD', '4000', 'emily.d@example.com', 467890123, 'HTML, CSS', 'Content Writing', 'Approved'),
(11, 1, 'David', 'Taylor', 'Male', '111 Swanston St', 'Melbourne', 'VIC', '3000', 'david.t@example.com', 478901234, 'Angular, TypeScript', 'Team Leadership', 'Rejected'),
(12, 2, 'Sophie', 'Martin', 'Female', '222 Pitt St', 'Sydney', 'NSW', '2000', 'sophie.m@example.com', 489012345, 'Node.js, Express', 'Project Management', 'New'),
(13, 1, 'Thomas', 'Johnson', 'Male', '123 Main Street, Melbourne VIC 3000', 'Geelong', 'VIC', '3345', 'something@something.com', 444687754, 'Python, Javascript and Node JS', 'Microsoft Word', 'New');

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
(1, 'Cybersecurity Specialist', 'DataNexus\'s CyberSec', 'Melbourne HQ', '$90,000 - $130,000', 'The Cybersecurity Specialist at DataNexus\'s CyberSec will play a key role in safeguarding our clients\' digital assets by identifying vulnerabilities, implementing security protocols, and responding to incidents. You will work with advanced technologies to ensure robust security across systems and networks.', 'Perform vulnerability assessments and penetration testing. Lead incident response and security breach resolution. Design and implement secure networks and systems. Monitor security alerts and proactively defend against cyber threats. Conduct security audits and provide recommendations for improvements.', '3+ years of hands-on cybersecurity experience. Strong knowledge of network protocols, firewalls, and security tools. Certifications: CISSP, CEH, CompTIA Security+, or equivalent. Experience with security platforms like Splunk, Nessus, or Wireshark. Excellent problem-solving and communication skills.', 'Experience in a Security Operations Center (SOC). Advanced certifications (e.g., CISM, CCSP, OSCP). Programming knowledge (Python, PowerShell, Bash). Experience with cloud security (AWS, Azure, GCP).', 'English (fluent, written and spoken). Additional languages (Spanish, Mandarin) are a plus.'),
(2, 'Investigation Team Leader', 'DataNexus\'s CyberSec', 'Melbourne HQ', '$95,000 - $130,000', 'The Investigation Leader will be responsible for overseeing cybersecurity investigations related to incident response, digital forensics, and threat analysis. They will lead a team to identify and mitigate cybersecurity threats while ensuring the integrity of digital evidence and maintaining a high standard of investigative practices.', 'Lead and manage cybersecurity investigations. Collaborate with internal cybersecurity teams. Analyse and document findings. Ensure digital evidence complies with legal standards. Mentor junior investigators. Stay updated on current trends.', 'Bachelor\'s degree in Cybersecurity, IT, or related field. 5+ years experience in cybersecurity investigations. Proven leadership experience. Knowledge of cybersecurity frameworks/tools. Strong analytical and communication skills.', 'Master\'s degree in Cybersecurity or related field. Relevant certifications (e.g., CEH, CISSP, CCFP). Experience with cloud security. Familiarity with malware analysis.', 'English (fluent, both written and spoken). Additional languages (Spanish, French, Mandarin)');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `attempts` int(11) NOT NULL DEFAULT 0,
  `last_attempt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `locked_until` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `username`, `attempts`, `last_attempt`, `locked_until`) VALUES
(6, 'adminHR', 4, '2025-05-28 11:16:07', '2025-05-28 03:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `username`, `password`) VALUES
(1, 'adminHR', '$2y$10$.0Hr.Jp48Fg9inZ2QPmFhOfyBVmRcC8YRZI5vLl/ZoH56iZf85QQK'),
(2, 'JohnManager', '$2y$10$6JLDBxIWZF7ZnF/6tlsRH..VR2e8PRsnC1km.lkscNqEZqhHjBgUm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
