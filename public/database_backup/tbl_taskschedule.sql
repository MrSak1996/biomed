-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 04:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biomed`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_taskschedule`
--

CREATE TABLE `tbl_taskschedule` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `technician_id` int(11) DEFAULT NULL,
  `office` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `division_color` char(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `enp` int(11) DEFAULT NULL,
  `posted_by` int(11) DEFAULT NULL,
  `posteddate` date DEFAULT NULL,
  `realenddate` date DEFAULT NULL,
  `cancelflag` char(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `isRead` char(10) DEFAULT NULL,
  `isGenerateRO` char(10) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `priority` char(10) DEFAULT NULL,
  `program` varchar(100) DEFAULT NULL,
  `is_new` int(11) DEFAULT NULL,
  `code_series` varchar(100) DEFAULT NULL,
  `event_reminder` int(11) DEFAULT NULL,
  `isSent` char(10) DEFAULT NULL,
  `updated_at` date DEFAULT current_timestamp(),
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_taskschedule`
--

INSERT INTO `tbl_taskschedule` (`id`, `client_id`, `technician_id`, `office`, `title`, `start_date`, `end_date`, `division_color`, `description`, `venue`, `enp`, `posted_by`, `posteddate`, `realenddate`, `cancelflag`, `status`, `isRead`, `isGenerateRO`, `remarks`, `comments`, `priority`, `program`, `is_new`, `code_series`, `event_reminder`, `isSent`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 1, 'PMS 1', '2024-07-27', '2024-07-31', '#0097A7', 'wdwdw', '', 0, 0, '2024-07-27', '2024-07-27', '', 0, '', '', '', '', '', '', 0, '', 0, '', '2024-07-27', '2024-07-27'),
(2, 1, 3, 1, 'PMS 2', NULL, NULL, NULL, 'dw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-27', '2024-07-27'),
(3, NULL, 2, NULL, 'PMS 4', NULL, NULL, '#0097A7', 'wdwdwd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-27', '2024-07-27'),
(4, NULL, 4, NULL, 'PMS5', '2024-07-27', '2024-07-29', '#0097A7', 'ferfrgrg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-27', '2024-07-27'),
(5, NULL, 1, NULL, 'PMS 6', '2024-07-27', '2024-07-28', '#0097A7', 'wddwdw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-27', '2024-07-27'),
(6, NULL, 2, NULL, 'PMS 3', '2024-07-27', '2024-07-29', '#0097A7', 'wdffe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-27', '2024-07-27'),
(7, NULL, 4, NULL, 'PMS 7', '2024-07-27', '2024-07-30', '#0097A7', 'dwdwdwdw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-27', '2024-07-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_taskschedule`
--
ALTER TABLE `tbl_taskschedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_taskschedule`
--
ALTER TABLE `tbl_taskschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
