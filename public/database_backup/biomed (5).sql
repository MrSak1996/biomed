-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2024 at 07:17 AM
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
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth-token', '96cb8f64981ce3fe7411bf2a20d24b41182ae3b251f8997455127bba92659abb', '[\"*\"]', NULL, '2024-07-02 22:14:44', '2024-07-02 22:14:44'),
(2, 'App\\Models\\User', 1, 'auth-token', '9b91d2297a230f9b4e480f00cd9eff588d7e2b034bbb7e5e2f81cf5c41fd6966', '[\"*\"]', NULL, '2024-07-02 22:15:12', '2024-07-02 22:15:12'),
(3, 'App\\Models\\User', 1, 'auth-token', '1894e1f6360dae01c0ead89b2e2f1c75850b2e40fdc5f586ff8ee8dbd29b4089', '[\"*\"]', NULL, '2024-07-02 22:33:30', '2024-07-02 22:33:30'),
(4, 'App\\Models\\User', 1, 'auth-token', '995a523d56e8971adbaa40f1a3ebb03d0a27422d573320d5b4341d553b024a89', '[\"*\"]', NULL, '2024-07-03 16:46:53', '2024-07-03 16:46:53'),
(5, 'App\\Models\\User', 1, 'auth-token', 'af1aef31aa889a4c64ec4db2f050ae9a5828709dce260619c2bf052ef94017bb', '[\"*\"]', NULL, '2024-07-08 21:11:27', '2024-07-08 21:11:27'),
(6, 'App\\Models\\User', 1, 'auth-token', '6e8d4cce6035bbb54cbaeef70ff307797202323a56ff98933e53e30580b5dd50', '[\"*\"]', NULL, '2024-07-08 21:12:09', '2024-07-08 21:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id` int(11) NOT NULL,
  `control_no` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `client` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city_province` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id`, `control_no`, `department_id`, `client`, `address`, `city_province`) VALUES
(1, 'BTSI-ASH', 1, 'AMOSUP Seamen\'s Hospital', 'San Jose St., Intramuros', 'Metro Manila'),
(2, 'BTSI-BMC', 2, 'Batangas Medical Center', 'Bihi Road, Kumintang Ibaba', 'Batangas City'),
(3, 'BTSI-BLH', 3, 'Binangonan Lakeview Hospital', 'Brgy. KM31 Manila East Road Tagpos', 'Binangonan, Rizal'),
(4, 'BTSI-BDL', 4, 'Blesces Diagnostic Laboratory', 'Laguna National Highway', 'Alaminos, Laguna'),
(5, 'BTSI-CEC', 5, 'Calamba Eye Center', '2nd flr, CMC Annex Building, Crossing', 'Calamba, Laguna'),
(6, 'BTSI-CMC', 6, 'Calamba Medical Center', 'CMC Avenue, Brgy. Real', 'Calamba, Laguna'),
(7, 'BTSI-CSGH', 7, 'Christ the Savior General Hospital', 'Bayan ng Rosario', 'Batangas City'),
(8, 'BTSI-GCMCC', 8, 'Global Care Medical Center of Canlubang', 'J. Yulo Avenue, Brgy. Canlubang', 'Calamba, Laguna'),
(9, 'BTSI-GMCL', 9, 'Global Medical Center of Laguna', 'National Highway, Brgy. Banlic', 'Cabuyao City, Laguna'),
(10, 'BTSI-ICHSP', 10, 'Immaculate Conception Hospital of San Pablo', 'P. Alcantara St., Brgy. VII - A', 'San Pablo City, Laguna'),
(11, 'BTSI-IDGH', 11, 'Isabela Doctors General Hospital', 'Baligatan', 'Ilagan, Isabela'),
(12, 'BTSI-LDMH', 12, 'Laurel District Memorial Hospital', 'Talisay - Tanauan Road', 'Tanauan, Batangas'),
(13, 'BTSI-MRDH', 13, 'Metro Rizal Doctors Hospital', 'Santo Domingo', 'Cainta, Rizal'),
(14, 'NPDC-Dialysis', 14, 'Nephro Plus Dialysis Center', 'Marciano Brion St.', 'San Pablo City, Laguna'),
(15, 'BTSI-OHHC', 15, 'Ortigas Hospital & Healthcare Center', 'Ortigas Avenue Extension corner ', 'Cainta, Rizal'),
(16, 'BTSI-RCTDC', 16, 'Rotary Club of Tanauan Dialysis Center', 'Benita Laurel St.', 'Tanauan, Batangas'),
(17, 'BTSI-SPCCHC', 17, 'San Pablo City Community General Hospital', 'C. Colago Ave, Brgy. San Roque', 'San Pablo City, Laguna'),
(18, 'BTSI-SPDGH', 18, 'San Pablo Doctors General Hospital', '55 A. Mabini Street', 'San Pablo City, Laguna'),
(19, 'BTSI-SPCMC', 19, 'SPC Medical Center', 'Pan-Philippine Highway', 'San Pablo City, Laguna'),
(20, 'BTSI-SFCMH', 20, 'ST. Frances Cabrini Medical Hospital', 'President Jose P. Laurel Highway', 'Sto. Thomas, Batangas'),
(21, 'BTSI-SJBMCI', 21, 'St. John the Baptist Medical Center INC.', 'Brgy. Parian', 'Calamba, Laguna'),
(22, 'BTSI-TDMH', 22, 'Taytay Doctors Multispeciality Hospital, Inc.', 'Rizal Avenue', 'Taytay, Rizal'),
(23, 'BTSI-TMCSL', 23, 'The Medical City South Luzon', 'L. United Blvd, Don Jose', 'Santa Rosa, Laguna'),
(24, 'Oceanagold', 24, 'OceanaGold (Philippines) Inc.', 'Didipio Mine, Didipio Kasibu,', 'Nueva Vizcaya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_department`
--

CREATE TABLE `tbl_client_department` (
  `id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_client_department`
--

INSERT INTO `tbl_client_department` (`id`, `department_id`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0),
(21, 0),
(22, 0),
(23, 0),
(24, 0),
(25, 0),
(26, 0),
(27, 0),
(28, 0),
(29, 0),
(30, 0),
(31, 0),
(32, 0),
(33, 0),
(34, 0),
(35, 0),
(36, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `department`) VALUES
(1, 'CPN'),
(2, 'CATH LAB'),
(3, 'CHEMO'),
(4, 'CPU'),
(5, 'CSR'),
(6, 'DIALYSIS'),
(7, 'Emergency Room'),
(8, 'GNU 6TH FLOOR'),
(9, 'GNU 5TH FLOOR'),
(10, 'HEART STATION'),
(11, 'HEMODIALYSIS'),
(12, 'ICU'),
(13, 'INDUSTRIAL CLINIC'),
(14, 'LABORATORY'),
(15, 'NICU'),
(16, 'OPD 3RD'),
(17, 'OPD 4TH'),
(18, 'Operating Room'),
(19, 'PHARMACY'),
(20, 'PICU'),
(21, 'HEART CENTER'),
(22, 'PULMONARY'),
(23, 'RADIOLOGY'),
(24, 'REHAB'),
(25, 'WARD 2A'),
(26, 'WARD 2B'),
(27, 'WARD 3'),
(28, 'WARD 4'),
(29, 'INFUSION'),
(30, 'HEART & VASCULAR'),
(31, 'GNU 7TH FLOOR'),
(32, 'NURSE STATION 3'),
(33, 'NURSE STATION 4B'),
(34, 'CANCER CENTER'),
(35, 'NEURO-SCIENCES'),
(36, 'PMR');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipment`
--

CREATE TABLE `tbl_equipment` (
  `id` int(11) NOT NULL,
  `equipment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_equipment`
--

INSERT INTO `tbl_equipment` (`id`, `equipment`) VALUES
(1, 'PULSEOXIMETER / SPO2'),
(2, 'WEIGHING SCALE'),
(3, 'SPHYGMOMANOMETER'),
(4, 'DEFIBRILLATOR'),
(5, 'TDS Meter                                    '),
(6, 'SUCTION MACHINE '),
(7, 'ECG MACHINE'),
(8, 'AIR FLOW O2 GAUGE - FLOW METER'),
(9, 'Patient Monitor'),
(10, 'HOSPITAL BED/STRECHER'),
(11, 'ANESTHESIA MACHINE'),
(12, 'AUTOCLAVE'),
(13, 'BLOOD BANK REFRIGERATOR'),
(14, 'CAUTERY MACHINE'),
(15, 'CENTRIFUGE'),
(16, 'COLD PLATE'),
(17, 'CRYO THERAPY'),
(18, 'CRYOSTAT MICROTOME             '),
(19, 'DEEP FREEZER'),
(20, 'DENTAL SUCTION MACHINE'),
(21, 'DIGITAL BP App'),
(22, 'DROP LIGHT'),
(23, 'DRY BATH'),
(24, 'DRYING OVEN '),
(25, 'EMBEDDING MACHINE'),
(26, 'ERGOMETER'),
(27, 'FETAL DOPPLER'),
(28, 'FETAL MONITOR'),
(29, 'FLOATATION BATH'),
(30, 'INFANT INCUBATOR'),
(31, 'Infrared Thermometer              '),
(32, 'INFUSION PUMP'),
(33, 'LABORATORY INCUBATOR'),
(34, 'Laryngoscope '),
(35, 'MEDICAL REFRIGERATOR'),
(36, 'MICROSCOPE'),
(37, 'Microtome'),
(38, 'NEBULIZER'),
(39, 'OXYGEN CONCENTRATOR'),
(40, 'PARAFIN WAX BATH'),
(41, 'PATIENT MONITOR'),
(42, 'PHOTOTHERAPY UNIT / BILI LIGHT'),
(43, 'PIPPETTE'),
(44, 'Plasma Expressor                '),
(45, 'PORTABLE TENS'),
(46, 'RADIANT WARMER'),
(47, 'RESPIRATOR'),
(48, 'SHOCKWAVE'),
(49, 'SURGICAL LIGHTS'),
(50, 'O.R TABLE'),
(51, 'SYRINGE PUMP'),
(52, 'TRACTION MACHINE'),
(53, 'TREADMILL'),
(54, 'ULTRASOUND'),
(55, 'ULTRASOUND THERAPY'),
(56, 'VACUUM REGULATOR'),
(57, 'VEIN TRACER '),
(58, 'VENTILATOR'),
(59, 'WATER BATH'),
(60, 'X-RAY MACHINE'),
(61, 'BABY WEIGHING SCALE'),
(62, 'HOLTER ECG'),
(63, 'OTOREAD - SCREENER'),
(64, 'CARDIAC MONITOR'),
(65, 'TELEMETER'),
(66, 'HYDROCOLLATOR'),
(67, 'ANALYTICAL BALANCE'),
(68, 'BIOSAFETY CABINET'),
(69, 'OPTHALMOSCOPE'),
(70, 'O.R LIGHT (SINGLE HEAD )'),
(71, 'O.R LIGHTS ( DOUBLE HEAD )'),
(72, 'LARYNGOSCOPE'),
(73, 'UV LIGHTS'),
(74, 'AUDIO METER'),
(75, 'BP / SPHYGMOMANOMETER'),
(76, 'O.R LIGHT'),
(77, 'PHARMACY REFRIGERATOR'),
(78, 'PULSE GENERATOR PACEMAKER'),
(79, 'GLUCOMETER'),
(80, 'DIGITAL THERMOMETER'),
(81, 'PATIENT WARMER'),
(82, 'AMBULATORY BP'),
(83, 'HIGH FLOW NASAL CANNULA'),
(84, 'SHOCKMASTER'),
(85, 'Computer Monitor'),
(86, 'BLOOD WARMER'),
(87, 'DERMATOME'),
(88, 'Platelet Rotator'),
(89, 'Laboratory Oven'),
(90, 'Hot Plate'),
(91, 'Biomedical Refrigerator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipment_category`
--

CREATE TABLE `tbl_equipment_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_equipment_category`
--

INSERT INTO `tbl_equipment_category` (`id`, `category_name`) VALUES
(1, 'Visual Inspection'),
(2, 'Cleaning'),
(3, 'Battery Maintenance'),
(4, 'Electrical Safety Test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipment_info`
--

CREATE TABLE `tbl_equipment_info` (
  `id` int(11) NOT NULL,
  `equipment_id` int(11) DEFAULT NULL,
  `equipment_category_id` int(11) DEFAULT NULL,
  `equipment_info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_equipment_info`
--

INSERT INTO `tbl_equipment_info` (`id`, `equipment_id`, `equipment_category_id`, `equipment_info`) VALUES
(1, 8, 1, 'General condition\r\n'),
(2, 8, 1, 'Connectors/Gas supply Inlet\r\n'),
(3, 8, 1, 'Gauges/ Flowmeters indicator\r\n'),
(4, 8, 1, 'Flow control\r\n'),
(5, 8, 1, 'Air flow Regulator \r\n'),
(6, 8, 1, 'Safety labels and inscription\r\n'),
(7, 8, 1, 'Hospital label'),
(8, 8, 2, 'Display'),
(9, 8, 2, 'Exterior surfaces\r\n'),
(10, 8, 2, 'Replace deteriorated components\r\n');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pms`
--

CREATE TABLE `tbl_pms` (
  `id` int(11) NOT NULL,
  `control_no` varchar(255) DEFAULT '',
  `equipment_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `serial_asset_no` varchar(255) DEFAULT '',
  `model` varchar(255) DEFAULT '',
  `brand` varchar(255) DEFAULT '',
  `ppm_date` date DEFAULT NULL,
  `next_due_date` date DEFAULT NULL,
  `ppm_end_time` time DEFAULT NULL,
  `other_info1` varchar(255) DEFAULT '',
  `other_info2` varchar(255) DEFAULT '',
  `other_info3` varchar(255) DEFAULT '',
  `other_info4` varchar(255) DEFAULT '',
  `other_info5` varchar(255) DEFAULT '',
  `other_info6` varchar(255) DEFAULT '',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pms`
--

INSERT INTO `tbl_pms` (`id`, `control_no`, `equipment_id`, `client_id`, `department_id`, `serial_asset_no`, `model`, `brand`, `ppm_date`, `next_due_date`, `ppm_end_time`, `other_info1`, `other_info2`, `other_info3`, `other_info4`, `other_info5`, `other_info6`, `updated_at`, `created_at`) VALUES
(1, 'BTSI-BLH', 8, 3, 5, 'a', 'a', 'a', '2024-08-12', '2024-08-12', '14:44:00', 'a', 'a', 'a', 'a', 'a', 'a', '2024-08-12 06:44:51', '2024-08-12 06:44:51'),
(2, 'BTSI-SJBMCI', 8, 21, 1, 'a', 'a', 'a', '2024-08-12', '2024-08-12', '14:45:00', 'a', 'a', 'a', 'a', 'a', 'a', '2024-08-12 06:46:01', '2024-08-12 06:46:01'),
(3, 'BTSI-MRDH', 8, 13, 15, 'sample', 'sample', 'sample', '2024-08-22', '2024-08-22', '13:48:00', 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', '2024-08-22 05:48:48', '2024-08-22 05:48:48'),
(4, 'BTSI-BMC', 8, 2, 1, 'a', 'a', 'a', '2024-08-28', '2024-08-28', '09:18:00', 'a', 'a', 'a', 'a', 'a', 'a', '2024-08-28 01:18:19', '2024-08-28 01:18:19'),
(5, 'BTSI-ASH', 8, 1, 1, NULL, 'a', 'a', '2024-08-28', '2024-08-28', '09:18:00', 'a', 'q', 'q', 'q', 'q', 'q', '2024-08-28 01:24:39', '2024-08-28 01:24:39'),
(6, 'BTSI-ASH', 8, 1, 1, NULL, 'a', 'a', '2024-08-28', '2024-08-28', '09:18:00', 'a', 'q', 'q', 'q', 'q', 'q', '2024-08-28 01:24:40', '2024-08-28 01:24:40'),
(7, 'BTSI-ASH', 8, 1, 1, 'a', 'a', 'a', '2024-08-28', '2024-08-28', '09:25:00', 'a', 'a', 'a', 'a', 'a', 'a', '2024-08-28 01:25:26', '2024-08-28 01:25:26'),
(8, 'BTSI-ASH', 8, 1, 1, 'a', 'a', 'a', '2024-08-28', '2024-08-28', '09:25:00', 'a', 'a', 'a', 'a', 'a', 'a', '2024-08-28 01:25:27', '2024-08-28 01:25:27'),
(9, 'BTSI-ASH', 8, 1, 2, 'a', 'a', 'a', '2024-08-28', '2024-08-28', '09:34:00', 'a', 'a', 'a', 'a', 'a', 'a', '2024-08-28 01:34:11', '2024-08-28 01:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pms_checklist`
--

CREATE TABLE `tbl_pms_checklist` (
  `id` int(11) NOT NULL,
  `pms_id` int(11) DEFAULT NULL,
  `equipment_id` int(11) DEFAULT NULL,
  `equipment_info_id` int(11) NOT NULL,
  `equipment_category` int(11) DEFAULT NULL,
  `is_pass` char(50) DEFAULT NULL,
  `is_fail` char(50) DEFAULT NULL,
  `is_na` char(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pms_checklist`
--

INSERT INTO `tbl_pms_checklist` (`id`, `pms_id`, `equipment_id`, `equipment_info_id`, `equipment_category`, `is_pass`, `is_fail`, `is_na`, `updated_at`, `created_at`) VALUES
(1, 1, 8, 1, 1, '1', '0', '0', '2024-08-12 06:44:51', '2024-08-12 06:44:51'),
(2, 1, 8, 2, 1, '1', '0', '0', '2024-08-12 06:44:51', '2024-08-12 06:44:51'),
(3, 1, 8, 3, 1, '1', '0', '0', '2024-08-12 06:44:51', '2024-08-12 06:44:51'),
(4, 1, 8, 4, 1, '1', '0', '0', '2024-08-12 06:44:51', '2024-08-12 06:44:51'),
(5, 1, 8, 5, 1, '1', '0', '0', '2024-08-12 06:44:51', '2024-08-12 06:44:51'),
(6, 1, 8, 6, 1, '1', '0', '0', '2024-08-12 06:44:51', '2024-08-12 06:44:51'),
(7, 1, 8, 7, 1, '1', '0', '0', '2024-08-12 06:44:51', '2024-08-12 06:44:51'),
(8, 1, 8, 8, 2, '1', '0', '0', '2024-08-12 06:44:51', '2024-08-12 06:44:51'),
(9, 1, 8, 9, 2, '1', '0', '0', '2024-08-12 06:44:51', '2024-08-12 06:44:51'),
(10, 1, 8, 10, 2, '1', '0', '0', '2024-08-12 06:44:51', '2024-08-12 06:44:51'),
(11, 2, 8, 1, 1, '1', '0', '0', '2024-08-12 06:46:01', '2024-08-12 06:46:01'),
(12, 2, 8, 2, 1, '1', '0', '0', '2024-08-12 06:46:01', '2024-08-12 06:46:01'),
(13, 2, 8, 3, 1, '1', '0', '0', '2024-08-12 06:46:01', '2024-08-12 06:46:01'),
(14, 2, 8, 4, 1, '1', '0', '0', '2024-08-12 06:46:01', '2024-08-12 06:46:01'),
(15, 2, 8, 5, 1, '1', '0', '0', '2024-08-12 06:46:01', '2024-08-12 06:46:01'),
(16, 2, 8, 6, 1, '1', '0', '0', '2024-08-12 06:46:01', '2024-08-12 06:46:01'),
(17, 2, 8, 7, 1, '1', '0', '0', '2024-08-12 06:46:01', '2024-08-12 06:46:01'),
(18, 2, 8, 8, 2, '1', '0', '0', '2024-08-12 06:46:01', '2024-08-12 06:46:01'),
(19, 2, 8, 9, 2, '1', '0', '0', '2024-08-12 06:46:01', '2024-08-12 06:46:01'),
(20, 2, 8, 10, 2, '1', '0', '0', '2024-08-12 06:46:01', '2024-08-12 06:46:01'),
(21, 3, 8, 1, 1, '1', '0', '0', '2024-08-22 05:48:48', '2024-08-22 05:48:48'),
(22, 3, 8, 2, 1, '1', '0', '0', '2024-08-22 05:48:49', '2024-08-22 05:48:49'),
(23, 3, 8, 3, 1, '1', '0', '0', '2024-08-22 05:48:49', '2024-08-22 05:48:49'),
(24, 3, 8, 4, 1, '1', '0', '0', '2024-08-22 05:48:49', '2024-08-22 05:48:49'),
(25, 3, 8, 5, 1, '1', '0', '0', '2024-08-22 05:48:49', '2024-08-22 05:48:49'),
(26, 3, 8, 6, 1, '1', '0', '0', '2024-08-22 05:48:49', '2024-08-22 05:48:49'),
(27, 3, 8, 7, 1, '1', '0', '0', '2024-08-22 05:48:49', '2024-08-22 05:48:49'),
(28, 3, 8, 8, 2, '1', '0', '0', '2024-08-22 05:48:49', '2024-08-22 05:48:49'),
(29, 3, 8, 9, 2, '1', '0', '0', '2024-08-22 05:48:49', '2024-08-22 05:48:49'),
(30, 3, 8, 10, 2, '1', '0', '0', '2024-08-22 05:48:49', '2024-08-22 05:48:49'),
(31, 4, 8, 1, 1, '1', '0', '0', '2024-08-28 01:18:19', '2024-08-28 01:18:19'),
(32, 4, 8, 2, 1, '1', '0', '0', '2024-08-28 01:18:19', '2024-08-28 01:18:19'),
(33, 4, 8, 3, 1, '1', '0', '0', '2024-08-28 01:18:19', '2024-08-28 01:18:19'),
(34, 4, 8, 4, 1, '1', '0', '0', '2024-08-28 01:18:19', '2024-08-28 01:18:19'),
(35, 4, 8, 5, 1, '1', '0', '0', '2024-08-28 01:18:19', '2024-08-28 01:18:19'),
(36, 4, 8, 6, 1, '1', '0', '0', '2024-08-28 01:18:19', '2024-08-28 01:18:19'),
(37, 4, 8, 7, 1, '1', '0', '0', '2024-08-28 01:18:19', '2024-08-28 01:18:19'),
(38, 4, 8, 8, 2, '1', '0', '0', '2024-08-28 01:18:19', '2024-08-28 01:18:19'),
(39, 4, 8, 9, 2, '1', '0', '0', '2024-08-28 01:18:19', '2024-08-28 01:18:19'),
(40, 4, 8, 10, 2, '1', '0', '0', '2024-08-28 01:18:19', '2024-08-28 01:18:19'),
(41, 5, 8, 1, 1, '1', '0', '0', '2024-08-28 01:24:39', '2024-08-28 01:24:39'),
(42, 5, 8, 2, 1, '1', '0', '0', '2024-08-28 01:24:39', '2024-08-28 01:24:39'),
(43, 5, 8, 3, 1, '1', '0', '0', '2024-08-28 01:24:39', '2024-08-28 01:24:39'),
(44, 5, 8, 4, 1, '1', '0', '0', '2024-08-28 01:24:39', '2024-08-28 01:24:39'),
(45, 5, 8, 5, 1, '1', '0', '0', '2024-08-28 01:24:39', '2024-08-28 01:24:39'),
(46, 5, 8, 6, 1, '1', '0', '0', '2024-08-28 01:24:39', '2024-08-28 01:24:39'),
(47, 5, 8, 7, 1, '1', '0', '0', '2024-08-28 01:24:39', '2024-08-28 01:24:39'),
(48, 5, 8, 8, 2, '0', '0', '0', '2024-08-28 01:24:39', '2024-08-28 01:24:39'),
(49, 5, 8, 9, 2, '0', '0', '0', '2024-08-28 01:24:39', '2024-08-28 01:24:39'),
(50, 5, 8, 10, 2, '0', '0', '0', '2024-08-28 01:24:39', '2024-08-28 01:24:39'),
(51, 6, 8, 1, 1, '1', '0', '0', '2024-08-28 01:24:40', '2024-08-28 01:24:40'),
(52, 6, 8, 2, 1, '1', '0', '0', '2024-08-28 01:24:40', '2024-08-28 01:24:40'),
(53, 6, 8, 3, 1, '1', '0', '0', '2024-08-28 01:24:40', '2024-08-28 01:24:40'),
(54, 6, 8, 4, 1, '1', '0', '0', '2024-08-28 01:24:40', '2024-08-28 01:24:40'),
(55, 6, 8, 5, 1, '1', '0', '0', '2024-08-28 01:24:40', '2024-08-28 01:24:40'),
(56, 6, 8, 6, 1, '1', '0', '0', '2024-08-28 01:24:40', '2024-08-28 01:24:40'),
(57, 6, 8, 7, 1, '1', '0', '0', '2024-08-28 01:24:40', '2024-08-28 01:24:40'),
(58, 6, 8, 8, 2, '0', '0', '0', '2024-08-28 01:24:40', '2024-08-28 01:24:40'),
(59, 6, 8, 9, 2, '0', '0', '0', '2024-08-28 01:24:40', '2024-08-28 01:24:40'),
(60, 6, 8, 10, 2, '0', '0', '0', '2024-08-28 01:24:40', '2024-08-28 01:24:40'),
(61, 7, 8, 1, 1, '1', '0', '0', '2024-08-28 01:25:26', '2024-08-28 01:25:26'),
(62, 7, 8, 2, 1, '1', '0', '0', '2024-08-28 01:25:26', '2024-08-28 01:25:26'),
(63, 7, 8, 3, 1, '1', '0', '0', '2024-08-28 01:25:26', '2024-08-28 01:25:26'),
(64, 7, 8, 4, 1, '1', '0', '0', '2024-08-28 01:25:26', '2024-08-28 01:25:26'),
(65, 7, 8, 5, 1, '1', '0', '0', '2024-08-28 01:25:26', '2024-08-28 01:25:26'),
(66, 7, 8, 6, 1, '1', '0', '0', '2024-08-28 01:25:26', '2024-08-28 01:25:26'),
(67, 7, 8, 7, 1, '1', '0', '0', '2024-08-28 01:25:26', '2024-08-28 01:25:26'),
(68, 7, 8, 8, 2, '0', '0', '0', '2024-08-28 01:25:26', '2024-08-28 01:25:26'),
(69, 7, 8, 9, 2, '0', '0', '0', '2024-08-28 01:25:26', '2024-08-28 01:25:26'),
(70, 7, 8, 10, 2, '0', '0', '0', '2024-08-28 01:25:27', '2024-08-28 01:25:27'),
(71, 8, 8, 1, 1, '1', '0', '0', '2024-08-28 01:25:27', '2024-08-28 01:25:27'),
(72, 8, 8, 2, 1, '1', '0', '0', '2024-08-28 01:25:27', '2024-08-28 01:25:27'),
(73, 8, 8, 3, 1, '1', '0', '0', '2024-08-28 01:25:27', '2024-08-28 01:25:27'),
(74, 8, 8, 4, 1, '1', '0', '0', '2024-08-28 01:25:27', '2024-08-28 01:25:27'),
(75, 8, 8, 5, 1, '1', '0', '0', '2024-08-28 01:25:27', '2024-08-28 01:25:27'),
(76, 8, 8, 6, 1, '1', '0', '0', '2024-08-28 01:25:27', '2024-08-28 01:25:27'),
(77, 8, 8, 7, 1, '1', '0', '0', '2024-08-28 01:25:27', '2024-08-28 01:25:27'),
(78, 8, 8, 8, 2, '0', '0', '0', '2024-08-28 01:25:27', '2024-08-28 01:25:27'),
(79, 8, 8, 9, 2, '0', '0', '0', '2024-08-28 01:25:27', '2024-08-28 01:25:27'),
(80, 8, 8, 10, 2, '0', '0', '0', '2024-08-28 01:25:27', '2024-08-28 01:25:27'),
(81, 9, 8, 1, 1, '1', '0', '0', '2024-08-28 01:34:12', '2024-08-28 01:34:12'),
(82, 9, 8, 2, 1, '1', '0', '0', '2024-08-28 01:34:12', '2024-08-28 01:34:12'),
(83, 9, 8, 3, 1, '1', '0', '0', '2024-08-28 01:34:12', '2024-08-28 01:34:12'),
(84, 9, 8, 4, 1, '1', '0', '0', '2024-08-28 01:34:12', '2024-08-28 01:34:12'),
(85, 9, 8, 5, 1, '1', '0', '0', '2024-08-28 01:34:12', '2024-08-28 01:34:12'),
(86, 9, 8, 6, 1, '1', '0', '0', '2024-08-28 01:34:12', '2024-08-28 01:34:12'),
(87, 9, 8, 7, 1, '1', '0', '0', '2024-08-28 01:34:12', '2024-08-28 01:34:12'),
(88, 9, 8, 8, 2, '0', '0', '0', '2024-08-28 01:34:12', '2024-08-28 01:34:12'),
(89, 9, 8, 9, 2, '0', '0', '0', '2024-08-28 01:34:13', '2024-08-28 01:34:13'),
(90, 9, 8, 10, 2, '0', '0', '0', '2024-08-28 01:34:13', '2024-08-28 01:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL,
  `role_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `role_title`) VALUES
(1, 'admin'),
(2, 'technician');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_details`
--

CREATE TABLE `tbl_service_details` (
  `id` int(11) NOT NULL,
  `service_type` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `service_date` date NOT NULL,
  `equipment_type` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `problem_reported` text NOT NULL,
  `service_rendered` text NOT NULL,
  `defects_found` text NOT NULL,
  `action_taken` text NOT NULL,
  `status_after_service` text NOT NULL,
  `engineers_remarks` text NOT NULL,
  `warranty` varchar(50) DEFAULT '',
  `work_started` date DEFAULT NULL,
  `work_completed` date DEFAULT NULL,
  `date` date DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_service_details`
--

INSERT INTO `tbl_service_details` (`id`, `service_type`, `client_id`, `service_date`, `equipment_type`, `model`, `brand`, `serial_no`, `location`, `problem_reported`, `service_rendered`, `defects_found`, `action_taken`, `status_after_service`, `engineers_remarks`, `warranty`, `work_started`, `work_completed`, `date`, `remarks`, `updated_at`, `created_at`) VALUES
(1, 1, 2, '2024-08-21', 'aa', 'aa', 'aa', 'aa', NULL, 'aa', 'aa', 'aa', 'aa', 'aa', 'aa', 'waaaaaaaa', '2024-08-22', '2024-08-22', '2024-08-22', 'wdwwd', '2024-08-22 05:44:10', '2024-08-14 06:01:17'),
(2, 2, 8, '2024-08-14', 'sample', 'sample', 'sample', 'sample', NULL, 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', 'waaaaaaaa', '2024-08-31', '2024-08-31', '2024-08-31', 'aaaawdwdwdw', '2024-08-14 08:02:13', '2024-08-14 06:07:13'),
(3, 1, 2, '2024-08-14', 'a', 'a', 'a', 'a', NULL, 'a', 'a', 'a', 'a', 'a', 'a', 'wfdawddwd', '2024-08-14', '2024-08-14', '2024-08-14', 'wdawdwdwdw', '2024-08-14 08:03:13', '2024-08-14 06:43:32'),
(4, 3, 1, '2024-08-23', 'a', 'a', 'a', 'a', NULL, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2024-08-15', '2024-08-15', '2024-08-15', 'aa', '2024-08-15 06:40:02', '2024-08-15 06:39:12'),
(5, 3, 7, '2024-08-22', 'sample', 'sample', 'sample', 'sample', NULL, 'sample', 'sample', 'sample', 'sample', 'sample', 'sample', '', NULL, NULL, NULL, NULL, '2024-08-22 05:43:10', '2024-08-22 05:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_quotation`
--

CREATE TABLE `tbl_service_quotation` (
  `id` int(11) NOT NULL,
  `service_quotation_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `labor` double NOT NULL,
  `parts` varchar(50) NOT NULL,
  `total_cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_quotation_info`
--

CREATE TABLE `tbl_service_quotation_info` (
  `id` int(11) NOT NULL,
  `control_no` varchar(100) NOT NULL,
  `client_id` int(11) NOT NULL,
  `service_type_id` int(11) NOT NULL,
  `service_date` date NOT NULL,
  `equipment_type_id` int(11) NOT NULL,
  `model` varchar(50) NOT NULL DEFAULT '',
  `brand` varchar(50) NOT NULL DEFAULT '',
  `serial_no` varchar(50) NOT NULL DEFAULT '',
  `department_id` int(11) NOT NULL,
  `complaint` varchar(50) NOT NULL,
  `defects` varchar(50) NOT NULL,
  `work_done` varchar(50) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `assessed_by` varchar(50) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_service_quotation_info`
--

INSERT INTO `tbl_service_quotation_info` (`id`, `control_no`, `client_id`, `service_type_id`, `service_date`, `equipment_type_id`, `model`, `brand`, `serial_no`, `department_id`, `complaint`, `defects`, `work_done`, `remarks`, `assessed_by`, `updated_at`, `created_at`) VALUES
(1, '1234', 1, 2, '2024-08-15', 14, 'aa', 'aa', 'aa', 16, 'aa', 'aa', 'a', 'a', 'a', '2024-08-15 06:38:28', '2024-08-15 06:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_type`
--

CREATE TABLE `tbl_service_type` (
  `id` int(11) NOT NULL,
  `service_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_service_type`
--

INSERT INTO `tbl_service_type` (`id`, `service_type`) VALUES
(1, 'Assessment'),
(2, 'Assessment/Repair'),
(3, 'Repair'),
(4, 'Corrective Maintenance'),
(5, 'PMS Calibration');

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
(7, NULL, 4, NULL, 'PMS 7', '2024-07-27', '2024-07-30', '#0097A7', 'dwdwdwdw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-27', '2024-07-27'),
(8, NULL, NULL, NULL, 'sasasa', '2024-07-22', '2024-07-23', '#0097A7', 'efefef', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-30', '2024-07-30'),
(9, NULL, NULL, NULL, 'sasasa', '2024-07-22', '2024-07-23', '#0097A7', 'efefef', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-30', '2024-07-30'),
(10, NULL, NULL, NULL, 'dww', '2024-07-16', '2024-07-17', '#0097A7', 'wdwdwdwdw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-30', '2024-07-30'),
(11, NULL, NULL, NULL, 'sample', '2024-08-23', '2024-08-24', '#0097A7', 'sample', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-22', '2024-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `api_token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `remember_token`, `api_token`, `created_at`, `updated_at`) VALUES
(1, 'Mark Kim Sacluti', 'kimsacluti10101996@gmail.com', NULL, '123456', NULL, '6|pTAEcDS5KUQo3jYHFSwDG2ZervggaMGw3xDriBL4', NULL, '2024-07-08 21:12:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_department` (`department_id`);

--
-- Indexes for table `tbl_client_department`
--
ALTER TABLE `tbl_client_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_equipment`
--
ALTER TABLE `tbl_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_equipment_category`
--
ALTER TABLE `tbl_equipment_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_equipment_info`
--
ALTER TABLE `tbl_equipment_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_equipment_id` (`equipment_id`),
  ADD KEY `fk_equipment_cat` (`equipment_category_id`);

--
-- Indexes for table `tbl_joborder`
--
ALTER TABLE `tbl_joborder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pms`
--
ALTER TABLE `tbl_pms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_dept_id` (`department_id`),
  ADD KEY `equipment_id` (`equipment_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `tbl_pms_checklist`
--
ALTER TABLE `tbl_pms_checklist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipment_id` (`equipment_id`),
  ADD KEY `equipment_category` (`equipment_category`),
  ADD KEY `pms_id` (`pms_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service_details`
--
ALTER TABLE `tbl_service_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_client_id` (`client_id`);

--
-- Indexes for table `tbl_service_quotation`
--
ALTER TABLE `tbl_service_quotation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_service_quotation_id` (`service_quotation_id`);

--
-- Indexes for table `tbl_service_quotation_info`
--
ALTER TABLE `tbl_service_quotation_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `equipment_type_id` (`equipment_type_id`);

--
-- Indexes for table `tbl_service_type`
--
ALTER TABLE `tbl_service_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_taskschedule`
--
ALTER TABLE `tbl_taskschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_client_department`
--
ALTER TABLE `tbl_client_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_equipment`
--
ALTER TABLE `tbl_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tbl_equipment_category`
--
ALTER TABLE `tbl_equipment_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_equipment_info`
--
ALTER TABLE `tbl_equipment_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_joborder`
--
ALTER TABLE `tbl_joborder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pms`
--
ALTER TABLE `tbl_pms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_pms_checklist`
--
ALTER TABLE `tbl_pms_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_service_details`
--
ALTER TABLE `tbl_service_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_service_quotation_info`
--
ALTER TABLE `tbl_service_quotation_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_taskschedule`
--
ALTER TABLE `tbl_taskschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD CONSTRAINT `fk_department` FOREIGN KEY (`department_id`) REFERENCES `tbl_client_department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_equipment_info`
--
ALTER TABLE `tbl_equipment_info`
  ADD CONSTRAINT `fk_equipment_cat` FOREIGN KEY (`equipment_category_id`) REFERENCES `tbl_equipment_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipment_id` FOREIGN KEY (`equipment_id`) REFERENCES `tbl_equipment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_pms`
--
ALTER TABLE `tbl_pms`
  ADD CONSTRAINT `FK_dept_id` FOREIGN KEY (`department_id`) REFERENCES `tbl_department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_pms_ibfk_1` FOREIGN KEY (`equipment_id`) REFERENCES `tbl_equipment` (`id`),
  ADD CONSTRAINT `tbl_pms_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`id`);

--
-- Constraints for table `tbl_pms_checklist`
--
ALTER TABLE `tbl_pms_checklist`
  ADD CONSTRAINT `tbl_pms_checklist_ibfk_1` FOREIGN KEY (`equipment_id`) REFERENCES `tbl_equipment` (`id`),
  ADD CONSTRAINT `tbl_pms_checklist_ibfk_2` FOREIGN KEY (`equipment_category`) REFERENCES `tbl_equipment_category` (`id`),
  ADD CONSTRAINT `tbl_pms_checklist_ibfk_3` FOREIGN KEY (`pms_id`) REFERENCES `tbl_pms` (`id`);

--
-- Constraints for table `tbl_service_details`
--
ALTER TABLE `tbl_service_details`
  ADD CONSTRAINT `FK_client_id` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_service_quotation`
--
ALTER TABLE `tbl_service_quotation`
  ADD CONSTRAINT `FK_service_quotation_id` FOREIGN KEY (`service_quotation_id`) REFERENCES `tbl_service_quotation_info` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_service_quotation_info`
--
ALTER TABLE `tbl_service_quotation_info`
  ADD CONSTRAINT `tbl_service_quotation_info_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `tbl_client` (`id`),
  ADD CONSTRAINT `tbl_service_quotation_info_ibfk_2` FOREIGN KEY (`equipment_type_id`) REFERENCES `tbl_equipment` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
