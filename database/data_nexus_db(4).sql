-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 09:29 AM
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
  `suburb` int(60) NOT NULL,
  `state` int(3) NOT NULL,
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
(1, 1, 'MMM', 'DDD', 'Male', '13 Buffet st', 0, 0, '3131', 'xxxx@xxxx.com', 411205302, '1321313123', '12313123', 'New');

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
(2, 'Investigation Team Leader', 'DataNexus\'s CyberSec', 'Melbourne HQ', '$95,000 - $130,000', 'The Investigation Leader will be responsible for overseeing cybersecurity investigations related to incident response, digital forensics, and threat analysis. They will lead a team to identify and mitigate cybersecurity threats while ensuring the integrity of digital evidence and maintaining a high standard of investigative practices.', 'Lead and manage cybersecurity investigations. Collaborate with internal cybersecurity teams. Analyse and document findings. Ensure digital evidence complies with legal standards. Mentor junior investigators. Stay updated on current trends.', 'Bachelor\'s degree in Cybersecurity, IT, or related field. 5+ years experience in cybersecurity investigations. Proven leadership experience. Knowledge of cybersecurity frameworks/tools. Strong analytical and communication skills.', 'Master\'s degree in Cybersecurity or related field. Relevant certifications (e.g. CEH, CISSP, CCFP). Experience with cloud security. Familiarity with malware analysis.', 'English (fluent, both written and spoken). Additional languages (Spanish, French, Mandarin) are a pl');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
