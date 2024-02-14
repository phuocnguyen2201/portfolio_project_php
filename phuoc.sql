-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Feb 14, 2024 at 08:36 PM
-- Server version: 8.0.34
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`) VALUES
(1, 'phuoc23000', '123'),
(2, 'trang23000', '123'),
(11, 'alex23000', '123'),
(13, 'sfsaf', '33333'),
(20, 'sieng23000', '123'),
(21, 'phuoc222', '123');

-- --------------------------------------------------------

--
-- Table structure for table `acc_skills`
--

CREATE TABLE `acc_skills` (
  `id` int NOT NULL,
  `acc_id` int DEFAULT NULL,
  `skill_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `acc_skills`
--

INSERT INTO `acc_skills` (`id`, `acc_id`, `skill_id`) VALUES
(24, 2, 1),
(37, 11, 1),
(71, 21, 1),
(83, 1, 1),
(84, 1, 2),
(85, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `s_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `s_name`) VALUES
(1, 'Coding'),
(2, 'Planning'),
(3, 'Design'),
(4, 'Game Design');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `image_url` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `alt_text` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `first_name`, `last_name`, `title`, `image_url`, `description`, `alt_text`) VALUES
(1, 'Phuoc', 'Nguyen', 'Team Lead, Developer', 'profilephuoc23000.jpg', 'Currently%2C+I%27m+a+student+seeking+my+first+degree+besides+some+certificate+related+to+the+IT+domain.+Moreover%2C+I%27m+looking+for+a+remote%2Fhybrid+job%2C+so+don%27t+hesitate+to+reach+me.', 'phuoc%27s+portrait'),
(2, 'Trang', 'vo', 'student', 'profiletrang23000.jpg', 'Previous a travel agency, looking for opportunity in software development', 'Trang%27s+Portrait'),
(21, NULL, NULL, NULL, 'profilephuoc222.jpg', NULL, 'alex');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_skills`
--
ALTER TABLE `acc_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acc_id` (`acc_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `acc_skills`
--
ALTER TABLE `acc_skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acc_skills`
--
ALTER TABLE `acc_skills`
  ADD CONSTRAINT `acc_skills_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `account` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `acc_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`id`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
