-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2025 at 04:18 PM
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
-- Database: `personaldatasheet`
--

-- --------------------------------------------------------

--
-- Table structure for table `personal_data_sheet`
--

CREATE TABLE `personal_data_sheet` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `name_extension` varchar(50) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `height` decimal(5,2) DEFAULT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `civil_status` varchar(50) DEFAULT NULL,
  `telephone_no` varchar(30) DEFAULT NULL,
  `mobile_no` varchar(30) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `blood_type` varchar(5) DEFAULT NULL,
  `citizenship_status` varchar(100) DEFAULT NULL,
  `dual_country` varchar(100) DEFAULT NULL,
  `res_house` varchar(100) DEFAULT NULL,
  `res_street` varchar(150) DEFAULT NULL,
  `res_subdivision` varchar(150) DEFAULT NULL,
  `res_barangay` varchar(150) DEFAULT NULL,
  `res_city` varchar(150) DEFAULT NULL,
  `res_province` varchar(150) DEFAULT NULL,
  `res_zip_code` varchar(20) DEFAULT NULL,
  `perm_house` varchar(100) DEFAULT NULL,
  `perm_street` varchar(150) DEFAULT NULL,
  `perm_subdivision` varchar(150) DEFAULT NULL,
  `perm_barangay` varchar(150) DEFAULT NULL,
  `perm_city` varchar(150) DEFAULT NULL,
  `perm_province` varchar(150) DEFAULT NULL,
  `perm_zip_code` varchar(20) DEFAULT NULL,
  `gsis_id` varchar(50) DEFAULT NULL,
  `sss_no` varchar(50) DEFAULT NULL,
  `pagibig_id` varchar(50) DEFAULT NULL,
  `tin_no` varchar(50) DEFAULT NULL,
  `philhealth_id` varchar(50) DEFAULT NULL,
  `agency_employee_no` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_data_sheet`
--

INSERT INTO `personal_data_sheet` (`id`, `first_name`, `middle_name`, `last_name`, `name_extension`, `birth_date`, `sex`, `height`, `weight`, `civil_status`, `telephone_no`, `mobile_no`, `email`, `blood_type`, `citizenship_status`, `dual_country`, `res_house`, `res_street`, `res_subdivision`, `res_barangay`, `res_city`, `res_province`, `res_zip_code`, `perm_house`, `perm_street`, `perm_subdivision`, `perm_barangay`, `perm_city`, `perm_province`, `perm_zip_code`, `gsis_id`, `sss_no`, `pagibig_id`, `tin_no`, `philhealth_id`, `agency_employee_no`, `created_at`) VALUES
(3, 'Jebreil ', 'Solis', 'Blancada', '', '2005-07-20', 'Male', 163.00, 62.00, 'Single', '', '09123456789', 'jebjebsolis20@gmail.com', '', 'filipino', '', '1509 Sawata Area 1 ', 'Alley 3', '', '35', 'Caloocan City', 'Metro Manila', '1410', '1509 Sawata Area 1 ', 'Alley 3', '', '35', 'Caloocan City', 'Metro Manila', '1410', '', '', '', '', '', '', '2025-09-29 14:18:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_data_sheet`
--
ALTER TABLE `personal_data_sheet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_data_sheet`
--
ALTER TABLE `personal_data_sheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
