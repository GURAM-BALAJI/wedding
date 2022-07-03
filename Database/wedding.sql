-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 04:52 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` bigint(20) NOT NULL,
  `admin_email` varchar(1100) NOT NULL,
  `admin_password` varchar(2000) NOT NULL,
  `admin_name` varchar(1100) NOT NULL,
  `admin_phone` bigint(50) NOT NULL,
  `admin_photo` varchar(5000) NOT NULL,
  `admin_status` tinyint(1) NOT NULL,
  `invitation_view` tinyint(1) NOT NULL,
  `invitation_create` tinyint(1) NOT NULL,
  `invitation_edit` tinyint(1) NOT NULL,
  `invitation_del` tinyint(1) NOT NULL,
  `admin_view` tinyint(1) NOT NULL,
  `admin_create` tinyint(1) NOT NULL,
  `admin_edit` tinyint(1) NOT NULL,
  `admin_del` tinyint(1) NOT NULL,
  `photographer_view` tinyint(1) NOT NULL,
  `photographer_create` tinyint(1) NOT NULL,
  `photographer_edit` tinyint(1) NOT NULL,
  `photographer_del` tinyint(1) NOT NULL,
  `call_logs_view` tinyint(1) NOT NULL,
  `call_logs_create` tinyint(1) NOT NULL,
  `call_logs_edit` tinyint(1) NOT NULL,
  `call_logs_del` tinyint(1) NOT NULL,
  `admin_special` tinyint(1) NOT NULL,
  `admin_delete` tinyint(1) NOT NULL,
  `admin_added_date` varchar(50) NOT NULL,
  `admin_updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_req` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `admin_photo`, `admin_status`, `invitation_view`, `invitation_create`, `invitation_edit`, `invitation_del`, `admin_view`, `admin_create`, `admin_edit`, `admin_del`, `photographer_view`, `photographer_create`, `photographer_edit`, `photographer_del`, `call_logs_view`, `call_logs_create`, `call_logs_edit`, `call_logs_del`, `admin_special`, `admin_delete`, `admin_added_date`, `admin_updated_date`, `admin_req`) VALUES
(6, 'admin@admin.com', '$2y$10$tlJ7HiO6SfJcqzd0sztEgePf0Pl1GNHxcxkv36kppNjnesT8og7M.', 'wedding', 12345678, '2022-07-02_1656776593.png', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, '18-11-2021 11:13:30 pm', '2022-07-03 14:27:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `call_logs`
--

CREATE TABLE `call_logs` (
  `call_logs_id` bigint(20) NOT NULL,
  `call_logs_name` varchar(1000) NOT NULL,
  `call_logs_phone` bigint(20) NOT NULL,
  `call_logs_remark` varchar(2000) NOT NULL,
  `call_logs_updated_date` varchar(20) NOT NULL,
  `call_logs_created_date` varchar(20) NOT NULL,
  `call_logs_date` varchar(10) NOT NULL,
  `call_logs_by` bigint(20) NOT NULL,
  `call_logs_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invitation`
--

CREATE TABLE `invitation` (
  `invitation_id` bigint(20) NOT NULL,
  `invitation_search_name` varchar(100) NOT NULL,
  `invitation_photographer_id` bigint(20) NOT NULL,
  `invitation_name1` varchar(50) NOT NULL,
  `invitation_name2` varchar(50) NOT NULL,
  `invitation_name1_profession` varchar(50) DEFAULT NULL,
  `invitation_name2_profession` varchar(50) DEFAULT NULL,
  `invitation_name1_social_media1_type` varchar(10) DEFAULT NULL,
  `invitation_name2_social_media1_type` varchar(10) DEFAULT NULL,
  `invitation_name1_social_media1` varchar(200) DEFAULT NULL,
  `invitation_name2_social_media1` varchar(200) DEFAULT NULL,
  `invitation_name1_social_media2_type` varchar(10) DEFAULT NULL,
  `invitation_name2_social_media2_type` varchar(10) DEFAULT NULL,
  `invitation_name1_social_media2` varchar(200) DEFAULT NULL,
  `invitation_name2_social_media2` varchar(200) DEFAULT NULL,
  `invitation_single_image1` varchar(100) NOT NULL,
  `invitation_single_image2` varchar(100) NOT NULL,
  `invitation_date_time` varchar(74) NOT NULL,
  `invitation_youtube_link` varchar(100) NOT NULL,
  `invitation_sq_image1` varchar(100) NOT NULL,
  `invitation_sq_image2` varchar(100) NOT NULL,
  `invitation_sq_image3` varchar(100) NOT NULL,
  `invitation_long_image1` varchar(100) NOT NULL,
  `invitation_long_image2` varchar(100) NOT NULL,
  `invitation_full_image1` varchar(100) NOT NULL,
  `invitation_streaming_id` varchar(100) NOT NULL,
  `invitation_streaming_password` varchar(100) NOT NULL,
  `invitation_updated_date` varchar(50) NOT NULL,
  `invitation_created_date` varchar(50) NOT NULL,
  `invitation_added_by` bigint(20) NOT NULL,
  `invitation_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photographer`
--

CREATE TABLE `photographer` (
  `photographer_id` bigint(20) NOT NULL,
  `photographer_name` varchar(500) NOT NULL,
  `photographer_banner` varchar(100) NOT NULL,
  `photographer_email` varchar(500) NOT NULL,
  `photographer_phone` bigint(20) NOT NULL,
  `photographer_address` varchar(1000) NOT NULL,
  `photographer_address_map` varchar(1000) NOT NULL,
  `photographer_website` varchar(100) NOT NULL,
  `photographer_updated_date` varchar(50) NOT NULL,
  `photographer_created_date` varchar(50) NOT NULL,
  `photographer_deleted` set('0','1') NOT NULL DEFAULT '0',
  `photographer_added_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `call_logs`
--
ALTER TABLE `call_logs`
  ADD PRIMARY KEY (`call_logs_id`);

--
-- Indexes for table `invitation`
--
ALTER TABLE `invitation`
  ADD PRIMARY KEY (`invitation_id`);

--
-- Indexes for table `photographer`
--
ALTER TABLE `photographer`
  ADD PRIMARY KEY (`photographer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `call_logs`
--
ALTER TABLE `call_logs`
  MODIFY `call_logs_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invitation`
--
ALTER TABLE `invitation`
  MODIFY `invitation_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photographer`
--
ALTER TABLE `photographer`
  MODIFY `photographer_id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
