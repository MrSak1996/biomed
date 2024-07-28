-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 04:08 PM
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
-- Table structure for table `tbl_joborder`
--

CREATE TABLE `tbl_joborder` (
  `id` int(11) NOT NULL,
  `control_no` varchar(200) NOT NULL,
  `request_by` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `start_date` date NOT NULL,
  `completed_date` date NOT NULL,
  `received_by` int(11) NOT NULL,
  `particulars` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_joborder`
--

INSERT INTO `tbl_joborder` (`id`, `control_no`, `request_by`, `request_date`, `start_date`, `completed_date`, `received_by`, `particulars`, `status`, `updated_at`, `created_at`) VALUES
(1, 'JOB-ORDER--2024-07-0001', 1, '2024-07-27', '2024-07-27', '2024-07-27', 2, 'jawofeidefewefwgwgrwgw', 1, '2024-07-27 01:37:44', '2024-07-27 01:37:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_joborder`
--
ALTER TABLE `tbl_joborder`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_joborder`
--
ALTER TABLE `tbl_joborder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
