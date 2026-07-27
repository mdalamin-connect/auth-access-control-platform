-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2025 at 02:53 AM
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
-- Database: `mirsaige`
--
CREATE DATABASE IF NOT EXISTS `mirsaige` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mirsaige`;

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_activity_logs`
--

DROP TABLE IF EXISTS `mpmc_activity_logs`;
CREATE TABLE IF NOT EXISTS `mpmc_activity_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `activity_type` varchar(30) NOT NULL,
  `ip_address` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_activity_logs`
--

TRUNCATE TABLE `mpmc_activity_logs`;
--
-- Dumping data for table `mpmc_activity_logs`
--

INSERT INTO `mpmc_activity_logs` (`id`, `user_id`, `activity_type`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 1, 'login', '127.0.0.1', '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(2, 1, 'logout', '127.0.0.1', '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(3, 2, 'login', '127.0.0.1', '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(4, 2, 'logout', '127.0.0.1', '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(5, 1, 'login', '127.0.0.1', '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(6, 1, 'logout', '127.0.0.1', '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(7, 1, 'login', '127.0.0.1', '2025-07-12 18:42:30', '2025-07-12 18:42:30'),
(8, 1, 'logout', '127.0.0.1', '2025-07-12 20:58:50', '2025-07-12 20:58:50'),
(9, 1, 'login', '127.0.0.1', '2025-07-12 20:59:02', '2025-07-12 20:59:02'),
(10, 1, 'login', '127.0.0.1', '2025-07-12 21:02:51', '2025-07-12 21:02:51'),
(11, 1, 'login', '127.0.0.1', '2025-07-13 09:37:14', '2025-07-13 09:37:14'),
(12, 1, 'logout', '127.0.0.1', '2025-07-13 20:47:12', '2025-07-13 20:47:12'),
(13, 1, 'login', '127.0.0.1', '2025-07-13 20:47:44', '2025-07-13 20:47:44'),
(14, 3, 'login', '127.0.0.1', '2025-07-14 11:40:07', '2025-07-14 11:40:07'),
(15, 3, 'logout', '127.0.0.1', '2025-07-14 11:42:15', '2025-07-14 11:42:15'),
(16, 1, 'login', '127.0.0.1', '2025-07-14 11:42:36', '2025-07-14 11:42:36'),
(17, 1, 'login', '127.0.0.1', '2025-07-15 05:31:38', '2025-07-15 05:31:38'),
(18, 1, 'logout', '127.0.0.1', '2025-07-15 06:00:11', '2025-07-15 06:00:11'),
(19, 1, 'login', '127.0.0.1', '2025-07-15 06:19:49', '2025-07-15 06:19:49'),
(20, 1, 'login', '127.0.0.1', '2025-07-15 07:06:54', '2025-07-15 07:06:54'),
(21, 1, 'login', '127.0.0.1', '2025-07-15 13:40:53', '2025-07-15 13:40:53'),
(22, 1, 'login', '127.0.0.1', '2025-07-15 13:40:54', '2025-07-15 13:40:54'),
(23, 1, 'login', '127.0.0.1', '2025-07-15 13:40:54', '2025-07-15 13:40:54'),
(24, 1, 'login', '127.0.0.1', '2025-07-15 13:40:54', '2025-07-15 13:40:54'),
(25, 1, 'login', '127.0.0.1', '2025-07-15 13:40:54', '2025-07-15 13:40:54'),
(26, 1, 'login', '127.0.0.1', '2025-07-15 13:40:54', '2025-07-15 13:40:54'),
(27, 1, 'login', '127.0.0.1', '2025-07-15 13:40:54', '2025-07-15 13:40:54'),
(28, 1, 'login', '127.0.0.1', '2025-07-15 13:40:55', '2025-07-15 13:40:55'),
(29, 1, 'login', '127.0.0.1', '2025-07-15 13:40:55', '2025-07-15 13:40:55'),
(30, 1, 'login', '127.0.0.1', '2025-07-15 13:40:55', '2025-07-15 13:40:55'),
(31, 1, 'login', '127.0.0.1', '2025-07-15 13:40:55', '2025-07-15 13:40:55'),
(32, 1, 'login', '127.0.0.1', '2025-07-15 13:40:55', '2025-07-15 13:40:55'),
(33, 1, 'login', '127.0.0.1', '2025-07-15 13:40:55', '2025-07-15 13:40:55'),
(34, 1, 'login', '127.0.0.1', '2025-07-15 13:40:56', '2025-07-15 13:40:56'),
(35, 1, 'login', '127.0.0.1', '2025-07-15 13:40:56', '2025-07-15 13:40:56'),
(36, 1, 'login', '127.0.0.1', '2025-07-15 13:40:56', '2025-07-15 13:40:56'),
(37, 1, 'login', '127.0.0.1', '2025-07-15 13:40:56', '2025-07-15 13:40:56'),
(38, 1, 'login', '127.0.0.1', '2025-07-15 14:01:37', '2025-07-15 14:01:37'),
(39, 1, 'login', '127.0.0.1', '2025-07-15 22:50:13', '2025-07-15 22:50:13'),
(40, 1, 'logout', '127.0.0.1', '2025-07-16 00:13:53', '2025-07-16 00:13:53'),
(41, 1, 'login', '127.0.0.1', '2025-07-16 00:32:42', '2025-07-16 00:32:42'),
(42, 1, 'logout', '127.0.0.1', '2025-07-16 00:32:46', '2025-07-16 00:32:46'),
(43, 1, 'login', '127.0.0.1', '2025-07-16 00:38:53', '2025-07-16 00:38:53'),
(44, 1, 'logout', '127.0.0.1', '2025-07-16 00:38:56', '2025-07-16 00:38:56'),
(45, 1, 'login', '127.0.0.1', '2025-07-16 00:48:14', '2025-07-16 00:48:14'),
(46, 1, 'logout', '127.0.0.1', '2025-07-16 00:48:20', '2025-07-16 00:48:20'),
(47, 1, 'login', '127.0.0.1', '2025-07-16 00:48:33', '2025-07-16 00:48:33'),
(48, 1, 'logout', '127.0.0.1', '2025-07-16 00:48:37', '2025-07-16 00:48:37'),
(49, 1, 'login', '127.0.0.1', '2025-07-16 00:53:51', '2025-07-16 00:53:51'),
(50, 1, 'logout', '127.0.0.1', '2025-07-16 13:16:47', '2025-07-16 13:16:47'),
(51, 1, 'login', '127.0.0.1', '2025-07-16 13:16:58', '2025-07-16 13:16:58'),
(52, 1, 'logout', '127.0.0.1', '2025-07-16 14:03:02', '2025-07-16 14:03:02'),
(53, 1, 'login', '127.0.0.1', '2025-07-16 14:03:07', '2025-07-16 14:03:07'),
(54, 1, 'login', '127.0.0.1', '2025-07-17 08:53:55', '2025-07-17 08:53:55'),
(55, 1, 'login', '127.0.0.1', '2025-07-19 15:35:57', '2025-07-19 15:35:57'),
(56, 1, 'logout', '127.0.0.1', '2025-07-19 15:36:33', '2025-07-19 15:36:33'),
(57, 1, 'login', '127.0.0.1', '2025-07-19 15:37:28', '2025-07-19 15:37:28'),
(58, 1, 'logout', '127.0.0.1', '2025-07-19 15:38:01', '2025-07-19 15:38:01'),
(59, 1, 'login', '127.0.0.1', '2025-07-19 16:04:33', '2025-07-19 16:04:33'),
(60, 1, 'login', '127.0.0.1', '2025-07-19 16:05:03', '2025-07-19 16:05:03'),
(61, 1, 'logout', '127.0.0.1', '2025-07-19 16:05:22', '2025-07-19 16:05:22'),
(62, 1, 'login', '127.0.0.1', '2025-07-19 16:05:26', '2025-07-19 16:05:26'),
(63, 1, 'logout', '127.0.0.1', '2025-07-19 16:05:39', '2025-07-19 16:05:39'),
(64, 1, 'login', '127.0.0.1', '2025-07-19 16:05:43', '2025-07-19 16:05:43'),
(65, 1, 'login', '127.0.0.1', '2025-07-20 16:22:45', '2025-07-20 16:22:45'),
(66, 1, 'login', '127.0.0.1', '2025-07-29 06:51:52', '2025-07-29 06:51:52'),
(67, 1, 'login', '127.0.0.1', '2025-07-29 13:33:41', '2025-07-29 13:33:41'),
(68, 1, 'login', '127.0.0.1', '2025-07-29 19:56:49', '2025-07-29 19:56:49'),
(69, 1, 'logout', '127.0.0.1', '2025-07-29 22:20:12', '2025-07-29 22:20:12'),
(70, 8, 'login', '127.0.0.1', '2025-07-29 22:20:36', '2025-07-29 22:20:36'),
(71, 8, 'logout', '127.0.0.1', '2025-07-29 23:54:41', '2025-07-29 23:54:41'),
(72, 1, 'login', '127.0.0.1', '2025-07-29 23:54:55', '2025-07-29 23:54:55'),
(73, 1, 'login', '127.0.0.1', '2025-07-30 05:49:39', '2025-07-30 05:49:39'),
(74, 1, 'login', '127.0.0.1', '2025-07-30 05:53:41', '2025-07-30 05:53:41'),
(75, 1, 'login', '127.0.0.1', '2025-07-30 06:15:36', '2025-07-30 06:15:36'),
(76, 1, 'login', '127.0.0.1', '2025-07-30 09:10:15', '2025-07-30 09:10:15'),
(77, 1, 'login', '127.0.0.1', '2025-07-30 09:36:38', '2025-07-30 09:36:38'),
(78, 1, 'login', '127.0.0.1', '2025-07-30 10:01:46', '2025-07-30 10:01:46'),
(79, 1, 'login', '127.0.0.1', '2025-07-30 11:46:48', '2025-07-30 11:46:48'),
(80, 1, 'login', '127.0.0.1', '2025-07-30 14:52:37', '2025-07-30 14:52:37'),
(81, 1, 'login', '127.0.0.1', '2025-07-30 14:58:32', '2025-07-30 14:58:32'),
(82, 1, 'login', '127.0.0.1', '2025-07-31 05:14:40', '2025-07-31 05:14:40'),
(83, 1, 'login', '127.0.0.1', '2025-07-31 14:39:39', '2025-07-31 14:39:39'),
(84, 1, 'login', '127.0.0.1', '2025-07-31 14:39:42', '2025-07-31 14:39:42'),
(85, 1, 'login', '127.0.0.1', '2025-07-31 14:39:47', '2025-07-31 14:39:47'),
(86, 1, 'login', '127.0.0.1', '2025-07-31 14:39:51', '2025-07-31 14:39:51'),
(87, 1, 'login', '127.0.0.1', '2025-07-31 14:39:55', '2025-07-31 14:39:55'),
(88, 1, 'logout', '127.0.0.1', '2025-07-31 18:35:55', '2025-07-31 18:35:55'),
(89, 8, 'login', '127.0.0.1', '2025-07-31 18:36:17', '2025-07-31 18:36:17'),
(90, 8, 'logout', '127.0.0.1', '2025-07-31 18:36:39', '2025-07-31 18:36:39'),
(91, 1, 'login', '127.0.0.1', '2025-07-31 18:37:12', '2025-07-31 18:37:12'),
(92, 1, 'logout', '127.0.0.1', '2025-07-31 19:06:07', '2025-07-31 19:06:07'),
(93, 1, 'login', '127.0.0.1', '2025-07-31 19:06:11', '2025-07-31 19:06:11'),
(94, 1, 'login', '127.0.0.1', '2025-08-08 07:55:02', '2025-08-08 07:55:02'),
(95, 1, 'login', '127.0.0.1', '2025-08-10 13:53:39', '2025-08-10 13:53:39'),
(96, 1, 'logout', '127.0.0.1', '2025-08-10 14:55:52', '2025-08-10 14:55:52'),
(97, 9, 'login', '127.0.0.1', '2025-08-10 14:56:09', '2025-08-10 14:56:09'),
(98, 9, 'logout', '127.0.0.1', '2025-08-10 14:56:18', '2025-08-10 14:56:18'),
(99, 1, 'login', '127.0.0.1', '2025-08-10 14:56:36', '2025-08-10 14:56:36'),
(100, 1, 'logout', '127.0.0.1', '2025-08-10 15:45:14', '2025-08-10 15:45:14'),
(101, 10, 'login', '127.0.0.1', '2025-08-10 15:45:42', '2025-08-10 15:45:42'),
(102, 10, 'logout', '127.0.0.1', '2025-08-10 15:50:05', '2025-08-10 15:50:05'),
(103, 1, 'login', '127.0.0.1', '2025-08-10 15:51:28', '2025-08-10 15:51:28'),
(104, 1, 'login', '127.0.0.1', '2025-08-11 05:31:36', '2025-08-11 05:31:36'),
(105, 1, 'login', '127.0.0.1', '2025-08-13 07:35:26', '2025-08-13 07:35:26'),
(106, 1, 'login', '127.0.0.1', '2025-08-13 07:45:47', '2025-08-13 07:45:47'),
(107, 1, 'logout', '127.0.0.1', '2025-08-13 08:17:08', '2025-08-13 08:17:08'),
(108, 1, 'login', '127.0.0.1', '2025-08-13 08:18:08', '2025-08-13 08:18:08'),
(109, 1, 'logout', '127.0.0.1', '2025-08-13 08:20:09', '2025-08-13 08:20:09'),
(110, 11, 'login', '127.0.0.1', '2025-08-13 08:20:38', '2025-08-13 08:20:38'),
(111, 11, 'login', '127.0.0.1', '2025-08-13 09:06:54', '2025-08-13 09:06:54'),
(112, 11, 'login', '127.0.0.1', '2025-08-13 09:08:17', '2025-08-13 09:08:17'),
(113, 1, 'login', '127.0.0.1', '2025-08-13 09:43:28', '2025-08-13 09:43:28'),
(114, 11, 'login', '127.0.0.1', '2025-08-13 14:55:53', '2025-08-13 14:55:53'),
(115, 11, 'login', '127.0.0.1', '2025-08-13 14:56:21', '2025-08-13 14:56:21'),
(116, 11, 'login', '127.0.0.1', '2025-08-13 14:56:50', '2025-08-13 14:56:50'),
(117, 1, 'login', '127.0.0.1', '2025-08-13 14:57:05', '2025-08-13 14:57:05'),
(118, 11, 'login', '127.0.0.1', '2025-08-13 14:57:30', '2025-08-13 14:57:30'),
(119, 11, 'login', '127.0.0.1', '2025-08-13 14:58:05', '2025-08-13 14:58:05'),
(120, 11, 'login', '127.0.0.1', '2025-08-13 14:58:22', '2025-08-13 14:58:22'),
(121, 12, 'login', '127.0.0.1', '2025-08-13 15:04:07', '2025-08-13 15:04:07'),
(122, 12, 'login', '127.0.0.1', '2025-08-13 15:06:03', '2025-08-13 15:06:03'),
(123, 1, 'logout', '127.0.0.1', '2025-09-09 16:25:32', '2025-09-09 16:25:32'),
(124, 1, 'login', '127.0.0.1', '2025-09-09 16:25:45', '2025-09-09 16:25:45'),
(125, 1, 'login', '127.0.0.1', '2025-09-11 17:42:28', '2025-09-11 17:42:28'),
(126, 1, 'login', '127.0.0.1', '2025-09-18 20:15:52', '2025-09-18 20:15:52'),
(127, 1, 'login', '127.0.0.1', '2025-09-19 01:14:00', '2025-09-19 01:14:00'),
(128, 1, 'login', '127.0.0.1', '2025-09-19 01:14:01', '2025-09-19 01:14:01'),
(129, 1, 'login', '127.0.0.1', '2025-09-23 15:56:31', '2025-09-23 15:56:31'),
(130, 1, 'logout', '127.0.0.1', '2025-09-23 16:54:32', '2025-09-23 16:54:32'),
(131, 13, 'login', '127.0.0.1', '2025-09-23 16:54:58', '2025-09-23 16:54:58'),
(132, 13, 'logout', '127.0.0.1', '2025-09-23 16:55:09', '2025-09-23 16:55:09'),
(133, 1, 'login', '127.0.0.1', '2025-09-23 16:55:39', '2025-09-23 16:55:39'),
(134, 13, 'login', '127.0.0.1', '2025-09-23 17:00:24', '2025-09-23 17:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_attendances`
--

DROP TABLE IF EXISTS `mpmc_attendances`;
CREATE TABLE IF NOT EXISTS `mpmc_attendances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `check_in` time DEFAULT NULL,
  `check_out` time DEFAULT NULL,
  `status` enum('present','absent','late','half_day','holiday','leave') NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_attendances`
--

TRUNCATE TABLE `mpmc_attendances`;
--
-- Dumping data for table `mpmc_attendances`
--

INSERT INTO `mpmc_attendances` (`id`, `employee_id`, `date`, `check_in`, `check_out`, `status`, `notes`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, '2025-07-30', '09:00:00', '17:00:00', 'present', 'On time', '2025-07-31 11:16:22', '2025-07-31 11:16:22', 1, 1),
(2, 2, '2025-07-30', '09:45:00', '17:00:00', 'late', 'Late by 45 min', '2025-07-31 11:16:22', '2025-07-31 11:16:22', 1, 1),
(7, 1, '2025-07-01', '09:00:00', '17:00:00', 'present', 'Full', '2025-07-31 10:51:31', '2025-07-31 10:51:31', 1, NULL),
(8, 1, '2025-07-02', '09:00:00', '17:00:00', 'present', 'F', '2025-07-31 10:51:59', '2025-07-31 10:51:59', 1, NULL),
(9, 1, '2025-08-12', '10:00:00', '18:00:00', 'present', NULL, '2025-08-13 01:37:48', '2025-08-13 01:37:48', 1, NULL),
(10, 1, '2025-08-11', '10:00:00', '18:00:00', 'present', NULL, '2025-08-13 01:38:25', '2025-08-13 01:38:25', 1, NULL),
(11, 1, '2025-08-01', NULL, NULL, 'holiday', NULL, '2025-08-13 01:47:20', '2025-08-13 01:47:20', 1, NULL),
(12, 1, '2025-08-02', '10:00:00', '18:00:00', 'present', NULL, '2025-08-13 01:47:36', '2025-08-13 01:47:36', 1, NULL),
(13, 1, '2025-08-03', '10:00:00', '18:00:00', 'present', NULL, '2025-08-13 01:47:50', '2025-08-13 01:47:50', 1, NULL),
(14, 1, '2025-08-04', '10:00:00', '18:00:00', 'present', NULL, '2025-08-13 01:48:05', '2025-08-13 01:48:05', 1, NULL),
(15, 1, '2025-08-05', '10:00:00', '18:00:00', 'present', NULL, '2025-08-13 01:48:27', '2025-08-13 01:48:27', 1, NULL),
(16, 1, '2025-08-06', '10:00:00', '18:00:00', 'present', NULL, '2025-08-13 01:48:48', '2025-08-13 01:48:48', 1, NULL),
(17, 1, '2025-08-07', '10:00:00', '18:00:00', 'present', NULL, '2025-08-13 01:49:06', '2025-08-13 01:49:06', 1, NULL),
(19, 1, '2025-08-08', NULL, NULL, 'holiday', NULL, '2025-08-13 01:49:44', '2025-08-13 01:49:44', 1, NULL),
(20, 1, '2025-08-09', '10:00:00', '18:00:00', 'present', NULL, '2025-08-13 01:50:16', '2025-08-13 01:50:16', 1, NULL),
(21, 1, '2025-08-10', '10:00:00', '18:00:00', 'present', NULL, '2025-08-13 01:50:43', '2025-08-13 01:50:43', 1, NULL),
(22, 13, '2025-09-23', '18:06:29', '18:06:41', 'present', NULL, '2025-09-23 12:06:29', '2025-09-23 12:06:41', 13, 13);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_categories`
--

DROP TABLE IF EXISTS `mpmc_categories`;
CREATE TABLE IF NOT EXISTS `mpmc_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL DEFAULT 0,
  `updated_by` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_categories`
--

TRUNCATE TABLE `mpmc_categories`;
--
-- Dumping data for table `mpmc_categories`
--

INSERT INTO `mpmc_categories` (`id`, `name`, `department_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Cement', 3, '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 1),
(2, 'Sand', 3, '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(3, 'Bricks', 3, '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(4, 'Tiles', 3, '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(5, 'Stone', 3, '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(6, 'Basin', 3, '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(7, 'Pedestal', 3, '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_departments`
--

DROP TABLE IF EXISTS `mpmc_departments`;
CREATE TABLE IF NOT EXISTS `mpmc_departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_departments`
--

TRUNCATE TABLE `mpmc_departments`;
--
-- Dumping data for table `mpmc_departments`
--

INSERT INTO `mpmc_departments` (`id`, `name`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Finance And Accounting Department', '', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(2, 'Civil Engineering Department', '', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(3, 'Information Technology', '', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(4, 'Head Of Business Development And Brands', '', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(5, 'Operations', '', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 1),
(6, 'Developer', '', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 1),
(9, 'MD AL-AMIN', 'Miraz1', '2025-07-15 16:41:00', '2025-07-19 12:33:14', 1, 1),
(10, 'HR', 'Human Resources', '2025-09-23 10:53:02', '2025-09-23 10:53:02', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_designations`
--

DROP TABLE IF EXISTS `mpmc_designations`;
CREATE TABLE IF NOT EXISTS `mpmc_designations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(10) NOT NULL DEFAULT 0,
  `updated_by` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_designations`
--

TRUNCATE TABLE `mpmc_designations`;
--
-- Dumping data for table `mpmc_designations`
--

INSERT INTO `mpmc_designations` (`id`, `name`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Chairman & CEO', 'Mir Arman', '2025-07-12 18:42:19', '2025-07-19 18:36:48', 1, 1),
(2, 'Managing Director & CFO', 'Shatila Rahman', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 0),
(3, 'Head of Business Development & Brands', 'Zishan Mahmood', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 0),
(4, 'JR. Ex Assistant to CEO', 'Samia Afrin', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 0),
(5, 'HR & Admin', 'Nusrat Jahan Rimu', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 1),
(6, 'Sr. Project Engineer', 'Md. Shahinur Islam', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 0),
(7, 'Jr. Interior Architect', 'Md. Arafat Rahman', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 0),
(8, 'Jr. Project Engineer', 'Shihab Shadik', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 0),
(9, 'Sr. Ex. Sales & Operations', 'Wahidul Haque', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 0),
(10, 'Marketing Lead', 'Ahmad Faisal', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 0),
(11, 'Jr. Ex. ERP Development', 'Tahura Nasrin Mitu', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 0),
(12, 'Creative Designer', 'Md. Abu Zubaer', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 0),
(13, 'EX. Web Development', 'Mirza Abdul Kaiyum', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 0),
(14, 'Manager, Sales & Business Development', 'Md.Tanjirul Islam', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 0),
(15, 'Manager, Business Development & Operations', 'Khadija Akter', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 0),
(16, 'Ex. Engineering & Creative Design', 'Md. Abu Syem Mozumder', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 0),
(17, 'Ex. Accounts', 'Kumkum', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 0),
(18, 'Import Officer, Commercial', 'Md. Aminur Rahman Russel', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 0),
(19, 'Sales Officer, Elitspire', 'Salman E Admia', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 1),
(20, 'Operations Manager, Biancaffe', 'Md. Didarul Islam', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 0),
(21, 'Support Staff', 'Md. Bellal Hossain 1', '2025-07-19 18:32:37', '2025-07-19 18:32:37', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_employees`
--

DROP TABLE IF EXISTS `mpmc_employees`;
CREATE TABLE IF NOT EXISTS `mpmc_employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `employee_id` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `nid` varchar(20) DEFAULT NULL,
  `cv` varchar(255) NOT NULL,
  `joining_date` date NOT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `gender` varchar(20) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `designation_id` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL DEFAULT 0,
  `updated_by` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_employees`
--

TRUNCATE TABLE `mpmc_employees`;
--
-- Dumping data for table `mpmc_employees`
--

INSERT INTO `mpmc_employees` (`id`, `name`, `employee_id`, `email`, `phone`, `address`, `nid`, `cv`, `joining_date`, `salary`, `status`, `gender`, `department_id`, `designation_id`, `photo`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, 'Tahura Nasrin Mitu', NULL, 'tahuranasrin9@gmail.com', '01721184712', 'Mayapuri, 263, Noya Ati, Dhaka', '12345678901234', '2.docx', '2023-07-01', 25000.00, 1, 'Female', 1, 11, '2.png', '2025-07-29 14:27:55', '2025-07-29 14:27:55', 1, 0),
(3, 'Sharavogue', NULL, 'srmiraz80@gmail.com', '01826661262', 'Mayapuri, 263, Noya Ati,', '123456789012345', '3.docx', '2023-06-01', 30000.00, 1, 'Male', 2, 17, '3.jpg', '2025-07-29 14:43:13', '2025-07-29 14:43:13', 1, 0),
(8, 'MD AL-AMIN', NULL, 'mdalamin.connect@yahoo.com', '01886677907', NULL, NULL, '1758650317_cv.docx', '2025-09-01', 50000.00, 1, 'Male', 1, 17, '1758650317_photo.jpg', '2025-09-23 11:58:37', '2025-09-23 11:58:37', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_holidays`
--

DROP TABLE IF EXISTS `mpmc_holidays`;
CREATE TABLE IF NOT EXISTS `mpmc_holidays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `description` text DEFAULT NULL,
  `is_recurring` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_holidays`
--

TRUNCATE TABLE `mpmc_holidays`;
--
-- Dumping data for table `mpmc_holidays`
--

INSERT INTO `mpmc_holidays` (`id`, `name`, `date`, `description`, `is_recurring`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Independence Day', '2025-03-26', 'National holiday', 1, '2025-07-31 11:16:23', '2025-07-31 11:16:23', 1, 1),
(2, 'Eid-ul-Fitr', '2025-04-21', 'Religious festival', 0, '2025-07-31 11:16:23', '2025-07-31 11:16:23', 1, 1),
(3, 'Victory Day', '2025-12-16', 'National holiday', 1, '2025-07-31 11:16:23', '2025-07-31 11:16:23', 1, 1),
(4, 'Christmas Day', '2025-12-25', 'Christian festival', 1, '2025-07-31 11:16:23', '2025-07-31 11:16:23', 1, 1),
(5, 'Janmashtami', '2025-08-16', 'Hindu festival', 0, '2025-08-13 12:24:24', '2025-08-13 12:24:24', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_leaves`
--

DROP TABLE IF EXISTS `mpmc_leaves`;
CREATE TABLE IF NOT EXISTS `mpmc_leaves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` text NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  KEY `leave_type_id` (`leave_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_leaves`
--

TRUNCATE TABLE `mpmc_leaves`;
--
-- Dumping data for table `mpmc_leaves`
--

INSERT INTO `mpmc_leaves` (`id`, `employee_id`, `leave_type_id`, `start_date`, `end_date`, `reason`, `status`, `comments`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 3, 2, '2025-07-29', '2025-07-31', 'Fever and headache', 'approved', 'Get well soon', '2025-07-31 11:16:22', '2025-07-31 11:16:22', 1, 1),
(3, 1, 3, '2025-09-01', '2025-09-10', 'Travel', 'rejected', 'Not eligible yet', '2025-07-31 11:16:22', '2025-07-31 11:16:22', 1, 1),
(4, 1, 1, '2025-08-01', '2025-08-03', 'ckjfhvsfdvkhu besifvkbferwfb bugbrbgfv.hdb ds', 'approved', NULL, '2025-07-31 12:00:25', '2025-07-31 12:23:59', 1, 1),
(6, 1, 2, '2025-08-09', '2025-08-20', 'i am sick', 'approved', NULL, '2025-08-08 02:30:57', '2025-08-08 02:32:37', 1, 1),
(7, 12, 1, '2025-08-13', '2025-08-15', 'Sick', 'pending', NULL, '2025-08-13 10:18:48', '2025-08-13 10:18:48', 12, NULL),
(8, 1, 1, '2025-09-27', '2025-09-30', 'sick live', 'pending', NULL, '2025-09-23 12:02:42', '2025-09-23 12:02:42', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_leave_types`
--

DROP TABLE IF EXISTS `mpmc_leave_types`;
CREATE TABLE IF NOT EXISTS `mpmc_leave_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `days_per_year` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_leave_types`
--

TRUNCATE TABLE `mpmc_leave_types`;
--
-- Dumping data for table `mpmc_leave_types`
--

INSERT INTO `mpmc_leave_types` (`id`, `name`, `days_per_year`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Casual Leave', 10, 'For personal matters', '2025-07-31 11:16:22', '2025-07-31 11:16:22', 1, 1),
(2, 'Sick Leave', 12, 'Medical-related leave', '2025-07-31 11:16:22', '2025-07-31 11:16:22', 1, 1),
(3, 'Earned Leave', 15, 'Long-term leave earned annually', '2025-07-31 11:16:22', '2025-07-31 11:16:22', 1, 1),
(4, 'Maternity Leave', 90, 'For maternity purposes', '2025-07-31 11:16:22', '2025-07-31 11:16:22', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_password_resets`
--

DROP TABLE IF EXISTS `mpmc_password_resets`;
CREATE TABLE IF NOT EXISTS `mpmc_password_resets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) DEFAULT NULL,
  `token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_password_resets`
--

TRUNCATE TABLE `mpmc_password_resets`;
--
-- Dumping data for table `mpmc_password_resets`
--

INSERT INTO `mpmc_password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(1, 'mirarman123@gmail.com', 'lE7BR5pqwhkNAy6sFwV5OZdTcblJrEhuz3NXrsd6UkykULvS9Ey5FnNeatjhKs2u', '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(2, 'mirarman123@gmail.com', 't3jl2yFKtaJLHBhgGLDwJ581Ur0AHYM7UYvjWlXqSUxquiJyeeFQAYPsCsiNbFiU', '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(4, 'tahuranmitu@gmail.com', 'HmjMIXTtDGWaQGq1de6tgoBDAyPwPEMezkHw9HZ06qVQgxsHuSIYsoZZcuGEcrLi', '2025-07-12 18:42:19', '2025-07-12 18:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_permissions`
--

DROP TABLE IF EXISTS `mpmc_permissions`;
CREATE TABLE IF NOT EXISTS `mpmc_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(120) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL DEFAULT 0,
  `updated_by` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_permissions`
--

TRUNCATE TABLE `mpmc_permissions`;
--
-- Dumping data for table `mpmc_permissions`
--

INSERT INTO `mpmc_permissions` (`id`, `name`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Create User', 'This permission allows the user to create new user accounts within the system.', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(2, 'Manage User', 'Users with this permission can oversee and control various aspects of user management, such as assigning roles, updating', '2025-07-15 22:26:32', '2025-07-15 22:26:32', 0, 1),
(3, 'Edit User', 'Users with this permission can modify the details and settings of existing user accounts.', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(4, 'Show User', 'This permission grants the ability to view the details and information of user accounts.', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(5, 'Delete User', 'Users with this permission can delete user accounts from the system.', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(6, 'Roles List', 'List of Role', '2025-07-12 18:42:19', '2025-08-13 10:18:44', 0, 1),
(12, 'Create Roles', 'Permission for Creating Roles', '2025-08-13 10:19:52', '2025-08-13 10:19:52', 1, 0),
(13, 'Edit Roles', 'Permission for Editing', '2025-08-13 10:20:51', '2025-08-13 10:20:51', 1, 0),
(14, 'Roles Details', 'Permission for review details page', '2025-08-13 10:22:27', '2025-08-13 10:22:27', 1, 0),
(15, 'Delete Roles', 'Permission for deleting', '2025-08-13 10:23:12', '2025-08-13 10:23:12', 1, 0),
(16, 'Permission List', 'Permission for List', '2025-08-13 11:07:23', '2025-08-13 11:07:23', 1, 0),
(17, 'Create Permission', 'Permission for create permission', '2025-08-13 11:10:18', '2025-08-13 11:10:18', 1, 0),
(18, 'Edit Permission', 'Permission for edit permission', '2025-08-13 11:11:05', '2025-08-13 11:11:05', 1, 0),
(19, 'Permission Details', 'Review permission details page', '2025-08-13 11:15:38', '2025-08-13 11:15:38', 1, 0),
(20, 'Delete Permission', 'Permission for delete permission', '2025-08-13 11:17:19', '2025-08-13 11:17:19', 1, 0),
(21, 'Employee List', 'List Of Employees', '2025-08-13 11:35:12', '2025-08-13 11:35:12', 1, 0),
(22, 'Create Employee', 'Permission to create employee', '2025-08-13 11:38:29', '2025-08-13 11:38:29', 1, 0),
(23, 'Edit Employee', 'Permission To Edit', '2025-08-13 11:40:34', '2025-08-13 11:40:34', 1, 0),
(24, 'Employee Details', 'Permission for employee details', '2025-08-13 11:43:33', '2025-08-13 11:43:33', 1, 0),
(25, 'Delete Employee', 'Permission to delete Employee', '2025-08-13 11:45:15', '2025-08-13 11:45:15', 1, 0),
(26, 'Department List', 'Permission to department list', '2025-08-13 11:46:36', '2025-08-13 11:46:36', 1, 0),
(27, 'Create Department', 'Permission to create department', '2025-08-13 11:51:20', '2025-08-13 11:51:20', 1, 0),
(28, 'Edit Department', 'Permission to edit department', '2025-08-13 11:51:49', '2025-08-13 11:51:49', 1, 0),
(29, 'Department Details', 'Permission to review department details page', '2025-08-13 11:52:54', '2025-08-13 11:52:54', 1, 0),
(30, 'Delete Department', 'Permission to delete department', '2025-08-13 11:54:07', '2025-08-13 11:54:07', 1, 0),
(31, 'Designation List', 'List of Designation', '2025-08-13 11:56:50', '2025-08-13 11:56:50', 1, 0),
(32, 'Create Designation', 'Permission to create designation', '2025-08-13 11:59:25', '2025-08-13 15:56:22', 1, 1),
(33, 'Edit Designation', 'Permission to edit designation', '2025-08-13 12:05:13', '2025-08-13 12:05:13', 1, 0),
(34, 'Designation Details', 'Review designation details', '2025-08-13 12:11:57', '2025-08-13 12:11:57', 1, 0),
(35, 'Delete Designation', 'Permission to delete designation', '2025-08-13 12:17:46', '2025-08-13 12:17:46', 1, 0),
(36, 'Attendance List', 'List Of attendance', '2025-08-13 12:30:41', '2025-08-13 12:30:41', 1, 0),
(37, 'Create Attendance', 'Permission to create attendance', '2025-08-13 12:31:31', '2025-08-13 12:31:31', 1, 0),
(38, 'Edit Attendance', 'Permission to edit attendance', '2025-08-13 12:32:17', '2025-08-13 12:32:17', 1, 0),
(39, 'Attendance Details', 'Review attendance details page', '2025-08-13 12:33:57', '2025-08-13 12:33:57', 1, 0),
(40, 'Delete Attendance', 'Permission to delete attendance', '2025-08-13 12:34:42', '2025-08-13 12:34:42', 1, 0),
(41, 'Leaves Count List', 'Leaves Balance', '2025-08-13 12:51:03', '2025-08-13 12:51:03', 1, 0),
(42, 'Apply For Leave', 'Permission to create leave application', '2025-08-13 12:51:43', '2025-08-13 12:55:45', 1, 1),
(43, 'Edit Application', 'Permission to edit application', '2025-08-13 13:07:14', '2025-08-13 13:07:14', 1, 0),
(44, 'Application Details', 'Permission to review application file', '2025-08-13 13:31:07', '2025-08-13 13:31:07', 1, 0),
(45, 'Delete Application', 'Permission to delete application', '2025-08-13 13:32:28', '2025-08-13 13:32:28', 1, 0),
(46, 'Holiday List', 'Holidays list', '2025-08-13 13:36:13', '2025-08-13 13:36:13', 1, 0),
(47, 'Create Holiday', 'permission to create holiday', '2025-08-13 13:36:48', '2025-08-13 13:36:48', 1, 0),
(48, 'Edit Holiday', 'Permission to edit Holiday', '2025-08-13 13:37:19', '2025-08-13 13:37:19', 1, 0),
(49, 'Holiday Details', 'Permission to review holidays', '2025-08-13 13:59:37', '2025-08-13 13:59:37', 1, 0),
(50, 'Delete Holiday', 'Permission to delete holiday', '2025-08-13 14:01:25', '2025-08-13 14:01:25', 1, 0),
(51, 'Salary List', 'Salary List', '2025-08-13 14:06:24', '2025-08-13 14:06:24', 1, 0),
(52, 'Create Salary', 'Permission to create salary', '2025-08-13 14:07:59', '2025-08-13 14:07:59', 1, 0),
(53, 'Edit Salary', 'Permission to edit salary', '2025-08-13 14:09:38', '2025-08-13 14:09:38', 1, 0),
(54, 'Salary Details', 'Permission to review salary details', '2025-08-13 14:12:13', '2025-08-13 14:12:13', 1, 0),
(55, 'Delete Salary', 'Permission to delete salary', '2025-08-13 14:12:45', '2025-08-13 14:12:45', 1, 0),
(56, 'Create Product', 'Create Product', '2025-09-23 18:11:10', '2025-09-23 18:11:10', 1, 0),
(57, 'Manage Product', 'Manage Product', '2025-09-23 18:20:39', '2025-09-23 18:20:39', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_products`
--

DROP TABLE IF EXISTS `mpmc_products`;
CREATE TABLE IF NOT EXISTS `mpmc_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `offer_price` double DEFAULT NULL,
  `regular_price` double NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `uom_id` int(10) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `star` int(10) UNSIGNED DEFAULT NULL,
  `is_brand` tinyint(1) DEFAULT 0,
  `offer_discount` float DEFAULT 0,
  `weight` varchar(20) DEFAULT NULL,
  `barcode` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL DEFAULT 0,
  `updated_by` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni_barcode` (`barcode`),
  UNIQUE KEY `uni_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_products`
--

TRUNCATE TABLE `mpmc_products`;
--
-- Dumping data for table `mpmc_products`
--

INSERT INTO `mpmc_products` (`id`, `name`, `offer_price`, `regular_price`, `description`, `photo`, `category_id`, `uom_id`, `is_featured`, `star`, `is_brand`, `offer_discount`, `weight`, `barcode`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '12 mm rod', 4599, 4800, '12mm BSRM Rod', '', 1, 1, NULL, 5, NULL, 299, '39', '4456342342', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 2),
(2, 'Rod', 500, 600, 'SRMB Rod', 'Supercrete Cement.jpg', 10, 2, NULL, 1, NULL, 100, '50', '124', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 0, 0),
(3, 'Floor Tiles', 76, 80, 'code-001, DOUBLE CHARGE', 'Floor Tiles.png', 5, 4, NULL, 4, NULL, 4, '12.5', '002w', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 0, 0),
(4, 'Hand Shower', 550, 620, 'stella star', 'Hand Shower.png', 8, 1, NULL, 4, NULL, 50, '500gm', 'xy2', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 0, 0),
(5, 'Akij Tiles(floor)', 180, 190, '(Surface) Rustic', 'Akij Tiles(floor).png', 5, 4, NULL, 5, NULL, 10, '60x60CM/600x600MM', '6 SM 03 BE', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 0, 0),
(6, 'JAMGO', 125, 130, 'qwsqs', 'amm.png', 3, 2, 0, 5, 0, 5, '5', 'ADFHSUFHU', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(7, 'Row Coffee Beans', 4500, 5000, 'Authentic Italian Coffee Beans', 'Row Coffee Beans.png', 11, 2, 0, 5, 0, 500, '10kg', 'dbng12', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_projects`
--

DROP TABLE IF EXISTS `mpmc_projects`;
CREATE TABLE IF NOT EXISTS `mpmc_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `department_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `locations` varchar(30) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `descriptions` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL DEFAULT 0,
  `updated_by` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_projects`
--

TRUNCATE TABLE `mpmc_projects`;
--
-- Dumping data for table `mpmc_projects`
--

INSERT INTO `mpmc_projects` (`id`, `name`, `department_id`, `start_date`, `end_date`, `status`, `locations`, `photo`, `descriptions`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Sharavogue', 3, '2025-07-01', '2026-07-31', 'Planning', 'Priyanka Runway City, Uttara', 'Sharavogue.webp', '<div><div class=\"elementor-element elementor-element-260bf9e e-flex e-con-boxed e-con e-parent e-lazyloaded\" data-id=\"260bf9e\" data-element_type=\"container\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: row; --flex-wrap: initial; --justify-content: space-between; --align-items: initial; --align-content: initial; --gap: 0px 0px; --flex-basis: auto; --flex-grow: 0; --flex-shrink: 1; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; --border-radius: 0; --border-top-width: 0px; --border-right-width: 0px; --border-bottom-width: 0px; --border-left-width: 0px; --border-style: initial; --border-color: initial; --container-widget-width: initial; --container-widget-height: 100%; --container-widget-flex-grow: 1; --container-widget-align-self: stretch; --content-width: min(100%,1440px); --width: 100%; --min-height: initial; --height: auto; --text-align: initial; --margin-top: 100px; --margin-right: 0px; --margin-bottom: 0px; --margin-left: 0px; --padding-top: 10px; --padding-right: 10px; --padding-bottom: 10px; --padding-left: 10px; --position: relative; --z-index: revert; --overflow: visible; --row-gap: 0px; --column-gap: 0px; --overlay-mix-blend-mode: initial; --overlay-opacity: 1; --overlay-transition: 0.3s; --e-con-grid-template-columns: repeat(3,1fr); --e-con-grid-template-rows: repeat(2,1fr); border-radius: 0px; height: auto; min-height: auto; min-width: 0px; overflow: visible; position: relative; width: 100%; z-index: auto; --flex-wrap-mobile: wrap; margin-block: 100px 0px; margin-inline: 0px; padding-inline: 10px; transition: background 0.3s, border 0.3s, box-shadow 0.3s, transform 0.4s; --margin-block-start: 100px; --margin-block-end: 0px; --margin-inline-start: 0px; --margin-inline-end: 0px; --padding-inline-start: 10px; --padding-inline-end: 10px; --padding-block-start: 10px; --padding-block-end: 10px; --border-block-start-width: 0px; --border-block-end-width: 0px; --border-inline-start-width: 0px; --border-inline-end-width: 0px; display: flex; gap: initial; --container-max-width: 1440px; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; place-content: normal; align-items: normal; flex-flow: column; max-width: 100%; --display: flex; color: rgb(51, 51, 51); font-family: &quot;DM Sans&quot;, sans-serif; background-color: rgb(32, 35, 52);\"><div class=\"e-con-inner\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); padding-block: 10px; display: flex; gap: 0px; height: 76px; margin-right: auto; margin-left: auto; max-width: min(100%, 1440px); padding-inline: 0px; width: 1440px; flex-flow: row; place-content: normal space-between; align-items: normal; align-self: auto; flex: 1 1 auto;\"><div class=\"elementor-element elementor-element-29b38d9 e-con-full e-flex e-con e-child\" data-id=\"29b38d9\" data-element_type=\"container\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: column; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: 20px 20px; --flex-basis: auto; --flex-grow: 0; --flex-shrink: 1; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: column; gap: 20px; --border-radius: 0; --border-top-width: 0px; --border-right-width: 0px; --border-bottom-width: 0px; --border-left-width: 0px; --border-style: initial; --border-color: initial; --container-widget-width: 100%; --container-widget-height: initial; --container-widget-flex-grow: 0; --container-widget-align-self: initial; --content-width: min(100%,1440px); --width: 35%; --min-height: initial; --height: auto; --text-align: initial; --margin-top: 0px; --margin-right: 0px; --margin-bottom: 0px; --margin-left: 0px; --padding-top: 10px; --padding-right: 10px; --padding-bottom: 10px; --padding-left: 10px; --position: relative; --z-index: revert; --overflow: visible; --row-gap: 20px; --column-gap: 20px; --overlay-mix-blend-mode: initial; --overlay-opacity: 1; --overlay-transition: 0.3s; --e-con-grid-template-columns: repeat(3,1fr); --e-con-grid-template-rows: repeat(2,1fr); border-radius: 0px; height: auto; min-height: auto; min-width: 0px; overflow: visible; position: relative; width: 35%; z-index: auto; --flex-wrap-mobile: wrap; margin-block: 0px; margin-inline: 0px; padding-inline: 10px; transition: background 0.3s, border 0.3s, box-shadow 0.3s, transform 0.4s; --margin-block-start: 0px; --margin-block-end: 0px; --margin-inline-start: 0px; --margin-inline-end: 0px; --padding-inline-start: 10px; --padding-inline-end: 10px; --padding-block-start: 10px; --padding-block-end: 10px; --border-block-start-width: 0px; --border-block-end-width: 0px; --border-inline-start-width: 0px; --border-inline-end-width: 0px; padding-block: 10px; display: flex; --container-max-width: 1440px; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; --display: flex;\"><div class=\"elementor-element elementor-element-ef4f139 elementor-widget elementor-widget-heading\" data-id=\"ef4f139\" data-element_type=\"widget\" data-widget_type=\"heading.default\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; min-width: 0px; margin-block-end: 0px; max-width: 100%;\"><div class=\"elementor-widget-container\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 36px; margin-top: -20px;\"><h2 class=\"elementor-heading-title elementor-size-default\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); margin-block: 0.5rem 1rem; font-family: Bulter, sans-serif; font-weight: 600; line-height: 1; color: rgb(255, 255, 255); font-size: 56px; margin-bottom: 0px;\">Project&nbsp;<span style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); color: rgb(221, 153, 51);\">Overview</span></h2></div></div></div></div></div><div class=\"elementor-element elementor-element-46bf5ba e-flex e-con-boxed e-con e-parent e-lazyloaded\" data-id=\"46bf5ba\" data-element_type=\"container\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: row; --flex-wrap: initial; --justify-content: space-between; --align-items: initial; --align-content: initial; --gap: 0px 0px; --flex-basis: auto; --flex-grow: 0; --flex-shrink: 1; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; --border-radius: 0; --border-top-width: 0px; --border-right-width: 0px; --border-bottom-width: 0px; --border-left-width: 0px; --border-style: initial; --border-color: initial; --container-widget-width: initial; --container-widget-height: 100%; --container-widget-flex-grow: 1; --container-widget-align-self: stretch; --content-width: min(100%,1440px); --width: 100%; --min-height: initial; --height: auto; --text-align: initial; --margin-top: -20px; --margin-right: 0px; --margin-bottom: 100px; --margin-left: 0px; --padding-top: 10px; --padding-right: 10px; --padding-bottom: 10px; --padding-left: 10px; --position: relative; --z-index: revert; --overflow: visible; --row-gap: 0px; --column-gap: 0px; --overlay-mix-blend-mode: initial; --overlay-opacity: 1; --overlay-transition: 0.3s; --e-con-grid-template-columns: repeat(3,1fr); --e-con-grid-template-rows: repeat(2,1fr); border-radius: 0px; height: auto; min-height: auto; min-width: 0px; overflow: visible; position: relative; width: 100%; z-index: auto; --flex-wrap-mobile: wrap; margin-block: -20px 100px; margin-inline: 0px; padding-inline: 10px; transition: background 0.3s, border 0.3s, box-shadow 0.3s, transform 0.4s; --margin-block-start: -20px; --margin-block-end: 100px; --margin-inline-start: 0px; --margin-inline-end: 0px; --padding-inline-start: 10px; --padding-inline-end: 10px; --padding-block-start: 10px; --padding-block-end: 10px; --border-block-start-width: 0px; --border-block-end-width: 0px; --border-inline-start-width: 0px; --border-inline-end-width: 0px; display: flex; gap: initial; --container-max-width: 1440px; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; place-content: normal; align-items: normal; flex-flow: column; max-width: 100%; --display: flex; color: rgb(51, 51, 51); font-family: &quot;DM Sans&quot;, sans-serif; background-color: rgb(32, 35, 52);\"><div class=\"e-con-inner\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); padding-block: 10px; display: flex; gap: 0px; height: 289px; margin-right: auto; margin-left: auto; max-width: min(100%, 1440px); padding-inline: 0px; width: 1440px; flex-flow: row; place-content: normal space-between; align-items: normal; align-self: auto; flex: 1 1 auto;\"><div class=\"elementor-element elementor-element-643614c e-con-full e-flex e-con e-child\" data-id=\"643614c\" data-element_type=\"container\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: column; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: 20px 20px; --flex-basis: auto; --flex-grow: 0; --flex-shrink: 1; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: column; gap: 20px; --border-radius: 0; --border-top-width: 0px; --border-right-width: 0px; --border-bottom-width: 0px; --border-left-width: 0px; --border-style: initial; --border-color: initial; --container-widget-width: 100%; --container-widget-height: initial; --container-widget-flex-grow: 0; --container-widget-align-self: initial; --content-width: min(100%,1440px); --width: 35%; --min-height: initial; --height: auto; --text-align: initial; --margin-top: 0px; --margin-right: 0px; --margin-bottom: 0px; --margin-left: 0px; --padding-top: 10px; --padding-right: 10px; --padding-bottom: 10px; --padding-left: 10px; --position: relative; --z-index: revert; --overflow: visible; --row-gap: 20px; --column-gap: 20px; --overlay-mix-blend-mode: initial; --overlay-opacity: 1; --overlay-transition: 0.3s; --e-con-grid-template-columns: repeat(3,1fr); --e-con-grid-template-rows: repeat(2,1fr); border-radius: 0px; height: auto; min-height: auto; min-width: 0px; overflow: visible; position: relative; width: 35%; z-index: auto; --flex-wrap-mobile: wrap; margin-block: 0px; margin-inline: 0px; padding-inline: 10px; transition: background 0.3s, border 0.3s, box-shadow 0.3s, transform 0.4s; --margin-block-start: 0px; --margin-block-end: 0px; --margin-inline-start: 0px; --margin-inline-end: 0px; --padding-inline-start: 10px; --padding-inline-end: 10px; --padding-block-start: 10px; --padding-block-end: 10px; --border-block-start-width: 0px; --border-block-end-width: 0px; --border-inline-start-width: 0px; --border-inline-end-width: 0px; padding-block: 10px; display: flex; --container-max-width: 1440px; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; --display: flex;\"><div class=\"elementor-element elementor-element-e4dcffe elementor-widget elementor-widget-jet-listing-dynamic-field\" data-id=\"e4dcffe\" data-element_type=\"widget\" data-widget_type=\"jet-listing-dynamic-field.default\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; min-width: 0px; margin-block-end: 0px; --kit-widget-spacing: 0px; max-width: 100%;\"><div class=\"elementor-widget-container\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 5.6px; display: flex; width: 484px; margin-top: -10px; margin-bottom: -30px;\"><div class=\"jet-listing-dynamic-field__icon is-svg-icon\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); margin-right: 10px; display: inline-flex; color: rgb(255, 255, 255); font-size: 20px; margin-top: 8px;\"><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" fill=\"currentColor\"><path d=\"M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z\"></path></svg></div><h1 class=\"jet-listing-dynamic-field__content\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); margin-block: 0.5rem 1rem; font-weight: 600; color: rgb(255, 255, 255); font-size: 18px; max-width: 100%; flex: 1 0 auto;\">Sharavogue</h1></div></div><div class=\"elementor-element elementor-element-fece4e1 elementor-widget elementor-widget-text-editor\" data-id=\"fece4e1\" data-element_type=\"widget\" data-widget_type=\"text-editor.default\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; color: rgba(224, 236, 255, 0.8); min-width: 0px; margin-block-end: 0px; --kit-widget-spacing: 0px; max-width: 100%;\"><div class=\"elementor-widget-container\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 158.4px;\"><p style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); margin-block: 0px 0.9rem;\">Welcome to Sharavogue, a prestigious residential development nestled in the heart of Priyanka Runway City, Dhaka. Offering luxurious living spaces, Sharavogue presents a harmonious blend of elegance and modernity. With spacious units ranging from simplex to duplex layouts, each meticulously designed to meet the highest standards of comfort and functionality.</p></div></div><div class=\"elementor-element elementor-element-5f9b995 button__state elementor-widget elementor-widget-jet-listing-dynamic-link\" data-id=\"5f9b995\" data-element_type=\"widget\" data-widget_type=\"jet-listing-dynamic-link.default\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; transition-duration: 0.2s; transition-timing-function: cubic-bezier(0, 0, 0.2, 1); min-width: 0px; margin-block-end: 0px; max-width: 100%;\"><br></div></div><div class=\"elementor-element elementor-element-51cfc3e e-con-full e-flex e-con e-child\" data-id=\"51cfc3e\" data-element_type=\"container\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: column; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: 20px 20px; --flex-basis: auto; --flex-grow: 0; --flex-shrink: 1; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: column; gap: 20px; --border-radius: 0; --border-top-width: 0px; --border-right-width: 0px; --border-bottom-width: 0px; --border-left-width: 0px; --border-style: initial; --border-color: initial; --container-widget-width: 100%; --container-widget-height: initial; --container-widget-flex-grow: 0; --container-widget-align-self: initial; --content-width: min(100%,1440px); --width: 50%; --min-height: initial; --height: auto; --text-align: initial; --margin-top: 0px; --margin-right: 0px; --margin-bottom: 0px; --margin-left: 0px; --padding-top: 0px; --padding-right: 0px; --padding-bottom: 0px; --padding-left: 0px; --position: relative; --z-index: revert; --overflow: visible; --row-gap: 20px; --column-gap: 20px; --overlay-mix-blend-mode: initial; --overlay-opacity: 1; --overlay-transition: 0.3s; --e-con-grid-template-columns: repeat(3,1fr); --e-con-grid-template-rows: repeat(2,1fr); border-radius: 0px; height: auto; min-height: auto; min-width: 0px; overflow: visible; position: relative; width: 50%; z-index: auto; --flex-wrap-mobile: wrap; margin-block: 0px; margin-inline: 0px; padding-inline: 0px; transition: background 0.3s, border 0.3s, box-shadow 0.3s, transform 0.4s; --margin-block-start: 0px; --margin-block-end: 0px; --margin-inline-start: 0px; --margin-inline-end: 0px; --padding-inline-start: 0px; --padding-inline-end: 0px; --padding-block-start: 0px; --padding-block-end: 0px; --border-block-start-width: 0px; --border-block-end-width: 0px; --border-inline-start-width: 0px; --border-inline-end-width: 0px; padding-block: 0px; display: flex; --container-max-width: 1440px; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; --display: flex;\"><div class=\"elementor-element elementor-element-da4031a elementor-widget elementor-widget-jet-listing-dynamic-repeater\" data-id=\"da4031a\" data-element_type=\"widget\" data-widget_type=\"jet-listing-dynamic-repeater.default\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; min-width: 0px; margin-block-end: 0px; max-width: 100%;\"><div class=\"elementor-widget-container\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 140px;\"><div class=\"jet-listing jet-listing-dynamic-repeater\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0);\"><div class=\"jet-listing-dynamic-repeater__items \" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); display: flex; flex-direction: column; justify-content: flex-start;\"><div class=\"jet-listing-dynamic-repeater__item\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0);\"><div class=\"repeater-list-items\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); display: flex; gap: 10px; align-items: center; justify-content: flex-start; margin-top: 8px;\"><img data-lazyloaded=\"1\" src=\"https://mirsaige-bd.com/wp-content/uploads/layers-01-1.svg\" class=\"repeater-icon entered litespeed-loaded\" data-src=\"/wp-content/uploads/layers-01-1.svg\" data-ll-status=\"loaded\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); border: none; height: auto; max-width: 100%; width: 20px; border-radius: 0px; box-shadow: none;\"><span class=\"repeater-text repeater-dark-bg\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); color: rgb(255, 255, 255); font-size: 18px;\">Luxurious Duplex and Simplex</span></div></div><div class=\"jet-listing-dynamic-repeater__item\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0);\"><div class=\"repeater-list-items\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); display: flex; gap: 10px; align-items: center; justify-content: flex-start; margin-top: 8px;\"><img data-lazyloaded=\"1\" src=\"https://mirsaige-bd.com/wp-content/uploads/layers-01-1.svg\" class=\"repeater-icon entered litespeed-loaded\" data-src=\"/wp-content/uploads/layers-01-1.svg\" data-ll-status=\"loaded\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); border: none; height: auto; max-width: 100%; width: 20px; border-radius: 0px; box-shadow: none;\"><span class=\"repeater-text repeater-dark-bg\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); color: rgb(255, 255, 255); font-size: 18px;\">Exclusive Southwest-facing corner residence</span></div></div><div class=\"jet-listing-dynamic-repeater__item\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0);\"><div class=\"repeater-list-items\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); display: flex; gap: 10px; align-items: center; justify-content: flex-start; margin-top: 8px;\"><img data-lazyloaded=\"1\" src=\"https://mirsaige-bd.com/wp-content/uploads/layers-01-1.svg\" class=\"repeater-icon entered litespeed-loaded\" data-src=\"/wp-content/uploads/layers-01-1.svg\" data-ll-status=\"loaded\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); border: none; height: auto; max-width: 100%; width: 20px; border-radius: 0px; box-shadow: none;\"><span class=\"repeater-text repeater-dark-bg\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); color: rgb(255, 255, 255); font-size: 18px;\">Earthquake-resistant design state-of-the-art fire safety features</span></div></div><div class=\"jet-listing-dynamic-repeater__item\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0);\"><div class=\"repeater-list-items\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); display: flex; gap: 10px; align-items: center; justify-content: flex-start; margin-top: 8px;\"><img data-lazyloaded=\"1\" src=\"https://mirsaige-bd.com/wp-content/uploads/layers-01-1.svg\" class=\"repeater-icon entered litespeed-loaded\" data-src=\"/wp-content/uploads/layers-01-1.svg\" data-ll-status=\"loaded\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); border: none; height: auto; max-width: 100%; width: 20px; border-radius: 0px; box-shadow: none;\"><span class=\"repeater-text repeater-dark-bg\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); color: rgb(255, 255, 255); font-size: 18px;\">Crafted with curated durability ensuring best cement and Steel</span></div></div></div></div></div></div></div></div></div></div><div><h2 class=\"elementor-heading-title elementor-size-default\" style=\"margin-top: 1.5rem; margin-bottom: 0px; font-weight: 600; line-height: 1; font-size: 56px; background-color: rgb(32, 35, 52); -webkit-tap-highlight-color: rgba(255, 255, 255, 0); margin-block: 0.5rem 1rem; font-family: Bulter, sans-serif;\"><span style=\"font-size: 48px;\">Project&nbsp;</span><font color=\"#dd9933\"><span style=\"font-size: 48px;\">Location</span></font></h2></div><div>Our interactive map offers a detailed view of each closest landmark of our properties, allowing you to get a better idea of distances.</div><div><br></div><div>Some of the landmarks close to this project are-</div><div>Metro Railway Station (3.1 km)</div><div>Hazrat Shahjalal International Airport (9.5 km)</div><div>Lubana General Hospital (4.2 km)</div><div>Scholastica (3.8 km)</div><div>Shanto-Mariam University of Creative Technology (4 km)</div>', '2025-07-13 20:30:30', '2025-07-13 20:30:30', 1, 1);
INSERT INTO `mpmc_projects` (`id`, `name`, `department_id`, `start_date`, `end_date`, `status`, `locations`, `photo`, `descriptions`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, 'Hazeldene', 3, '2021-07-01', '2025-07-31', 'Completed', 'Priyanka Runway City, Uttara', 'Hazeldene.webp', '<h2 class=\"elementor-heading-title elementor-size-default\" style=\"box-sizing: border-box; -webkit-tap-highlight-color: rgba(255, 255, 255, 0); margin-block: 0.5rem 1rem; font-family: Bulter, sans-serif; font-weight: 600; line-height: 1; color: rgb(255, 255, 255); font-size: 56px; margin: 0px; padding: 0px;\">Project<span>&nbsp;</span><span style=\"box-sizing: border-box; -webkit-tap-highlight-color: rgba(255, 255, 255, 0); color: rgb(221, 153, 51);\">Overview</span></h2><h1 class=\"h1\" style=\"line-height: 1.6;\"><div class=\"elementor-element elementor-element-260bf9e e-flex e-con-boxed e-con e-parent e-lazyloaded\" data-id=\"260bf9e\" data-element_type=\"container\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: row; --flex-wrap: initial; --justify-content: space-between; --align-items: initial; --align-content: initial; --gap: 0px 0px; --flex-basis: auto; --flex-grow: 0; --flex-shrink: 1; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; --border-radius: 0; --border-top-width: 0px; --border-right-width: 0px; --border-bottom-width: 0px; --border-left-width: 0px; --border-style: initial; --border-color: initial; --container-widget-width: initial; --container-widget-height: 100%; --container-widget-flex-grow: 1; --container-widget-align-self: stretch; --content-width: min(100%,1440px); --width: 100%; --min-height: initial; --height: auto; --text-align: initial; --margin-top: 100px; --margin-right: 0px; --margin-bottom: 0px; --margin-left: 0px; --padding-top: 10px; --padding-right: 10px; --padding-bottom: 10px; --padding-left: 10px; --position: relative; --z-index: revert; --overflow: visible; --row-gap: 0px; --column-gap: 0px; --overlay-mix-blend-mode: initial; --overlay-opacity: 1; --overlay-transition: 0.3s; --e-con-grid-template-columns: repeat(3,1fr); --e-con-grid-template-rows: repeat(2,1fr); border-radius: 0px; height: auto; min-height: auto; min-width: 0px; overflow: visible; position: relative; width: 100%; z-index: auto; --flex-wrap-mobile: wrap; margin-block: 100px 0px; margin-inline: 0px; padding-inline: 10px; transition: background 0.3s, border 0.3s, box-shadow 0.3s, transform 0.4s; --margin-block-start: 100px; --margin-block-end: 0px; --margin-inline-start: 0px; --margin-inline-end: 0px; --padding-inline-start: 10px; --padding-inline-end: 10px; --padding-block-start: 10px; --padding-block-end: 10px; --border-block-start-width: 0px; --border-block-end-width: 0px; --border-inline-start-width: 0px; --border-inline-end-width: 0px; display: flex; gap: initial; --container-max-width: 1440px; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; place-content: normal; align-items: normal; flex-flow: column; max-width: 100%; --display: flex; color: rgb(51, 51, 51); font-family: &quot;DM Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(32, 35, 52);\"><div class=\"e-con-inner\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); padding-block: 10px; display: flex; gap: 0px; height: 76px; margin-right: auto; margin-left: auto; max-width: min(100%, 1440px); padding-inline: 0px; width: 1440px; flex-flow: row; place-content: normal space-between; align-items: normal; align-self: auto; flex: 1 1 auto;\"><div class=\"elementor-element elementor-element-29b38d9 e-con-full e-flex e-con e-child\" data-id=\"29b38d9\" data-element_type=\"container\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: column; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: 20px 20px; --flex-basis: auto; --flex-grow: 0; --flex-shrink: 1; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: column; gap: 20px; --border-radius: 0; --border-top-width: 0px; --border-right-width: 0px; --border-bottom-width: 0px; --border-left-width: 0px; --border-style: initial; --border-color: initial; --container-widget-width: 100%; --container-widget-height: initial; --container-widget-flex-grow: 0; --container-widget-align-self: initial; --content-width: min(100%,1440px); --width: 35%; --min-height: initial; --height: auto; --text-align: initial; --margin-top: 0px; --margin-right: 0px; --margin-bottom: 0px; --margin-left: 0px; --padding-top: 10px; --padding-right: 10px; --padding-bottom: 10px; --padding-left: 10px; --position: relative; --z-index: revert; --overflow: visible; --row-gap: 20px; --column-gap: 20px; --overlay-mix-blend-mode: initial; --overlay-opacity: 1; --overlay-transition: 0.3s; --e-con-grid-template-columns: repeat(3,1fr); --e-con-grid-template-rows: repeat(2,1fr); border-radius: 0px; height: auto; min-height: auto; min-width: 0px; overflow: visible; position: relative; width: 35%; z-index: auto; --flex-wrap-mobile: wrap; margin-block: 0px; margin-inline: 0px; padding-inline: 10px; transition: background 0.3s, border 0.3s, box-shadow 0.3s, transform 0.4s; --margin-block-start: 0px; --margin-block-end: 0px; --margin-inline-start: 0px; --margin-inline-end: 0px; --padding-inline-start: 10px; --padding-inline-end: 10px; --padding-block-start: 10px; --padding-block-end: 10px; --border-block-start-width: 0px; --border-block-end-width: 0px; --border-inline-start-width: 0px; --border-inline-end-width: 0px; padding-block: 10px; display: flex; --container-max-width: 1440px; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; --display: flex;\"><div class=\"elementor-element elementor-element-ef4f139 elementor-widget elementor-widget-heading\" data-id=\"ef4f139\" data-element_type=\"widget\" data-widget_type=\"heading.default\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; min-width: 0px; margin-block-end: 0px; max-width: 100%;\"><div class=\"elementor-widget-container\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 36px; margin-top: -20px;\"><br><span style=\"font-size: 18px; font-weight: 600; background-color: var(--mirsaige-dark-blue); color: var(--mirsaige-white);\">Hazeldene</span></div></div></div></div></div></h1><h1 class=\"h1\" style=\"line-height: 1.6;\"><div class=\"elementor-element elementor-element-46bf5ba e-flex e-con-boxed e-con e-parent e-lazyloaded\" data-id=\"46bf5ba\" data-element_type=\"container\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: row; --flex-wrap: initial; --justify-content: space-between; --align-items: initial; --align-content: initial; --gap: 0px 0px; --flex-basis: auto; --flex-grow: 0; --flex-shrink: 1; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; --border-radius: 0; --border-top-width: 0px; --border-right-width: 0px; --border-bottom-width: 0px; --border-left-width: 0px; --border-style: initial; --border-color: initial; --container-widget-width: initial; --container-widget-height: 100%; --container-widget-flex-grow: 1; --container-widget-align-self: stretch; --content-width: min(100%,1440px); --width: 100%; --min-height: initial; --height: auto; --text-align: initial; --margin-top: -20px; --margin-right: 0px; --margin-bottom: 100px; --margin-left: 0px; --padding-top: 10px; --padding-right: 10px; --padding-bottom: 10px; --padding-left: 10px; --position: relative; --z-index: revert; --overflow: visible; --row-gap: 0px; --column-gap: 0px; --overlay-mix-blend-mode: initial; --overlay-opacity: 1; --overlay-transition: 0.3s; --e-con-grid-template-columns: repeat(3,1fr); --e-con-grid-template-rows: repeat(2,1fr); border-radius: 0px; height: auto; min-height: auto; min-width: 0px; overflow: visible; position: relative; width: 100%; z-index: auto; --flex-wrap-mobile: wrap; margin-block: -20px 100px; margin-inline: 0px; padding-inline: 10px; transition: background 0.3s, border 0.3s, box-shadow 0.3s, transform 0.4s; --margin-block-start: -20px; --margin-block-end: 100px; --margin-inline-start: 0px; --margin-inline-end: 0px; --padding-inline-start: 10px; --padding-inline-end: 10px; --padding-block-start: 10px; --padding-block-end: 10px; --border-block-start-width: 0px; --border-block-end-width: 0px; --border-inline-start-width: 0px; --border-inline-end-width: 0px; display: flex; gap: initial; --container-max-width: 1440px; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; place-content: normal; align-items: normal; flex-flow: column; max-width: 100%; --display: flex; color: rgb(51, 51, 51); font-family: &quot;DM Sans&quot;, sans-serif; font-size: 16px; background-color: rgb(32, 35, 52);\"><div class=\"e-con-inner\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); padding-block: 10px; display: flex; gap: 0px; height: 241px; margin-right: auto; margin-left: auto; max-width: min(100%, 1440px); padding-inline: 0px; width: 1440px; flex-flow: row; place-content: normal space-between; align-items: normal; align-self: auto; flex: 1 1 auto;\"><div class=\"elementor-element elementor-element-643614c e-con-full e-flex e-con e-child\" data-id=\"643614c\" data-element_type=\"container\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: column; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: 20px 20px; --flex-basis: auto; --flex-grow: 0; --flex-shrink: 1; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: column; gap: 20px; --border-radius: 0; --border-top-width: 0px; --border-right-width: 0px; --border-bottom-width: 0px; --border-left-width: 0px; --border-style: initial; --border-color: initial; --container-widget-width: 100%; --container-widget-height: initial; --container-widget-flex-grow: 0; --container-widget-align-self: initial; --content-width: min(100%,1440px); --width: 35%; --min-height: initial; --height: auto; --text-align: initial; --margin-top: 0px; --margin-right: 0px; --margin-bottom: 0px; --margin-left: 0px; --padding-top: 10px; --padding-right: 10px; --padding-bottom: 10px; --padding-left: 10px; --position: relative; --z-index: revert; --overflow: visible; --row-gap: 20px; --column-gap: 20px; --overlay-mix-blend-mode: initial; --overlay-opacity: 1; --overlay-transition: 0.3s; --e-con-grid-template-columns: repeat(3,1fr); --e-con-grid-template-rows: repeat(2,1fr); border-radius: 0px; height: auto; min-height: auto; min-width: 0px; overflow: visible; position: relative; width: 35%; z-index: auto; --flex-wrap-mobile: wrap; margin-block: 0px; margin-inline: 0px; padding-inline: 10px; transition: background 0.3s, border 0.3s, box-shadow 0.3s, transform 0.4s; --margin-block-start: 0px; --margin-block-end: 0px; --margin-inline-start: 0px; --margin-inline-end: 0px; --padding-inline-start: 10px; --padding-inline-end: 10px; --padding-block-start: 10px; --padding-block-end: 10px; --border-block-start-width: 0px; --border-block-end-width: 0px; --border-inline-start-width: 0px; --border-inline-end-width: 0px; padding-block: 10px; display: flex; --container-max-width: 1440px; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; --display: flex;\"><div class=\"elementor-element elementor-element-e4dcffe elementor-widget elementor-widget-jet-listing-dynamic-field\" data-id=\"e4dcffe\" data-element_type=\"widget\" data-widget_type=\"jet-listing-dynamic-field.default\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; min-width: 0px; margin-block-end: 0px; --kit-widget-spacing: 0px; max-width: 100%;\"><div class=\"elementor-widget-container\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 5.6px; display: flex; width: 484px; margin-top: -10px; margin-bottom: -30px;\"></div></div><div class=\"elementor-element elementor-element-fece4e1 elementor-widget elementor-widget-text-editor\" data-id=\"fece4e1\" data-element_type=\"widget\" data-widget_type=\"text-editor.default\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; color: rgba(224, 236, 255, 0.8); --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; min-width: 0px; margin-block-end: 0px; --kit-widget-spacing: 0px; max-width: 100%;\"><div class=\"elementor-widget-container\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 110.4px;\"><p style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); margin-block: 0px 0.9rem;\">Hazeldene is more than just a residence; it is a haven. Designed by expert lifestyle crafters, great care has been taken to ensure the complex lives up to its name—amplifying light, air, happiness and joy for its residents.</p></div></div><div class=\"elementor-element elementor-element-5f9b995 button__state elementor-widget elementor-widget-jet-listing-dynamic-link\" data-id=\"5f9b995\" data-element_type=\"widget\" data-widget_type=\"jet-listing-dynamic-link.default\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; transition-duration: 0.2s; transition-timing-function: cubic-bezier(0, 0, 0.2, 1); --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; min-width: 0px; margin-block-end: 0px; max-width: 100%;\"><br></div></div><div class=\"elementor-element elementor-element-51cfc3e e-con-full e-flex e-con e-child\" data-id=\"51cfc3e\" data-element_type=\"container\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: column; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: 20px 20px; --flex-basis: auto; --flex-grow: 0; --flex-shrink: 1; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: column; gap: 20px; --border-radius: 0; --border-top-width: 0px; --border-right-width: 0px; --border-bottom-width: 0px; --border-left-width: 0px; --border-style: initial; --border-color: initial; --container-widget-width: 100%; --container-widget-height: initial; --container-widget-flex-grow: 0; --container-widget-align-self: initial; --content-width: min(100%,1440px); --width: 50%; --min-height: initial; --height: auto; --text-align: initial; --margin-top: 0px; --margin-right: 0px; --margin-bottom: 0px; --margin-left: 0px; --padding-top: 0px; --padding-right: 0px; --padding-bottom: 0px; --padding-left: 0px; --position: relative; --z-index: revert; --overflow: visible; --row-gap: 20px; --column-gap: 20px; --overlay-mix-blend-mode: initial; --overlay-opacity: 1; --overlay-transition: 0.3s; --e-con-grid-template-columns: repeat(3,1fr); --e-con-grid-template-rows: repeat(2,1fr); border-radius: 0px; height: auto; min-height: auto; min-width: 0px; overflow: visible; position: relative; width: 50%; z-index: auto; --flex-wrap-mobile: wrap; margin-block: 0px; margin-inline: 0px; padding-inline: 0px; transition: background 0.3s, border 0.3s, box-shadow 0.3s, transform 0.4s; --margin-block-start: 0px; --margin-block-end: 0px; --margin-inline-start: 0px; --margin-inline-end: 0px; --padding-inline-start: 0px; --padding-inline-end: 0px; --padding-block-start: 0px; --padding-block-end: 0px; --border-block-start-width: 0px; --border-block-end-width: 0px; --border-inline-start-width: 0px; --border-inline-end-width: 0px; padding-block: 0px; display: flex; --container-max-width: 1440px; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; --display: flex;\"><div class=\"elementor-element elementor-element-da4031a elementor-widget elementor-widget-jet-listing-dynamic-repeater\" data-id=\"da4031a\" data-element_type=\"widget\" data-widget_type=\"jet-listing-dynamic-repeater.default\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; --swiper-theme-color: #000; --swiper-navigation-size: 44px; --swiper-pagination-bullet-size: 6px; --swiper-pagination-bullet-horizontal-gap: 6px; min-width: 0px; margin-block-end: 0px; max-width: 100%;\"><div class=\"elementor-widget-container\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 140px;\"><div class=\"jet-listing jet-listing-dynamic-repeater\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0);\"><div class=\"jet-listing-dynamic-repeater__items \" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); display: flex; flex-direction: column; justify-content: flex-start;\"><div class=\"jet-listing-dynamic-repeater__item\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0);\"><div class=\"repeater-list-items\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); display: flex; gap: 10px; align-items: center; justify-content: flex-start; margin-top: 8px;\"><img data-lazyloaded=\"1\" src=\"https://mirsaige-bd.com/wp-content/uploads/layers-01-1.svg\" class=\"repeater-icon entered litespeed-loaded\" data-src=\"/wp-content/uploads/layers-01-1.svg\" data-ll-status=\"loaded\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); border: none; height: auto; max-width: 100%; width: 20px; border-radius: 0px; box-shadow: none;\"><span class=\"repeater-text repeater-dark-bg\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); color: rgb(255, 255, 255); font-size: 18px;\">Spacious 4 bed, 4 bath units</span></div></div><div class=\"jet-listing-dynamic-repeater__item\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0);\"><div class=\"repeater-list-items\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); display: flex; gap: 10px; align-items: center; justify-content: flex-start; margin-top: 8px;\"><img data-lazyloaded=\"1\" src=\"https://mirsaige-bd.com/wp-content/uploads/layers-01-1.svg\" class=\"repeater-icon entered litespeed-loaded\" data-src=\"/wp-content/uploads/layers-01-1.svg\" data-ll-status=\"loaded\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); border: none; height: auto; max-width: 100%; width: 20px; border-radius: 0px; box-shadow: none;\"><span class=\"repeater-text repeater-dark-bg\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); color: rgb(255, 255, 255); font-size: 18px;\">Ornate ground floor with serene green space</span></div></div><div class=\"jet-listing-dynamic-repeater__item\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0);\"><div class=\"repeater-list-items\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); display: flex; gap: 10px; align-items: center; justify-content: flex-start; margin-top: 8px;\"><img data-lazyloaded=\"1\" src=\"https://mirsaige-bd.com/wp-content/uploads/layers-01-1.svg\" class=\"repeater-icon entered litespeed-loaded\" data-src=\"/wp-content/uploads/layers-01-1.svg\" data-ll-status=\"loaded\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); border: none; height: auto; max-width: 100%; width: 20px; border-radius: 0px; box-shadow: none;\"><span class=\"repeater-text repeater-dark-bg\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); color: rgb(255, 255, 255); font-size: 18px;\">Palatial bedrooms and lavish living area</span></div></div><div class=\"jet-listing-dynamic-repeater__item\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0);\"><div class=\"repeater-list-items\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); display: flex; gap: 10px; align-items: center; justify-content: flex-start; margin-top: 8px;\"><img data-lazyloaded=\"1\" src=\"https://mirsaige-bd.com/wp-content/uploads/layers-01-1.svg\" class=\"repeater-icon entered litespeed-loaded\" data-src=\"/wp-content/uploads/layers-01-1.svg\" data-ll-status=\"loaded\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); border: none; height: auto; max-width: 100%; width: 20px; border-radius: 0px; box-shadow: none;\"><span class=\"repeater-text repeater-dark-bg\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0); color: rgb(255, 255, 255); font-size: 18px;\">Landscaped rooftop relaxation area</span></div></div></div></div></div></div></div></div></div></h1><div class=\"repeater-list-items\" style=\"margin-top: 8px; -webkit-tap-highlight-color: rgba(255, 255, 255, 0); display: flex; gap: 10px; align-items: center; justify-content: flex-start;\"><span class=\"repeater-text repeater-white-bg\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0);\"><h2 class=\"elementor-heading-title elementor-size-default\" style=\"margin-top: 1.5rem; margin-bottom: 0px; font-weight: 600; line-height: 1; font-size: 56px; background-color: rgb(32, 35, 52); -webkit-tap-highlight-color: rgba(255, 255, 255, 0); margin-block: 0.5rem 1rem; font-family: Bulter, sans-serif;\"><span style=\"font-size: 48px;\">Project&nbsp;</span><font color=\"#dd9933\"><span style=\"font-size: 48px;\">Location<br></span></font><span style=\"background-color: var(--mirsaige-dark-blue); color: var(--mirsaige-white); font-size: 18px; font-weight: 500; font-family: sans-serif;\">Our interactive map offers a detailed view of each closest landmark of our properties, allowing you to get a better idea of distances.</span><font color=\"#dd9933\"><span style=\"font-size: 48px;\"></span></font></h2></span></div><div style=\"line-height: 1.6;\"><b style=\"font-size: 32px; color: var(--mirsaige-white);\">Some of the landmarks close to this project are-</b></div><div style=\"line-height: 1.6;\"><span style=\"font-size: 18px; background-color: rgb(39, 42, 61);\">Metro Railway Station (3.1 km)</span></div><div style=\"line-height: 1.6;\"><span style=\"font-size: 18px; background-color: rgb(39, 42, 61);\">Hazrat Shahjalal International Airport (9.5 km)</span></div><div style=\"line-height: 1.6;\"><span style=\"font-size: 18px; background-color: rgb(39, 42, 61);\">Lubana General Hospital (4.2 km)</span></div><div style=\"line-height: 1.6;\"><span style=\"font-size: 18px; background-color: rgb(39, 42, 61);\">Scholastica (3.8 km)</span></div><div style=\"line-height: 1.6;\"><span style=\"font-size: 18px; background-color: rgb(39, 42, 61);\">Shanto-Mariam University of Creative Technology (4 km)</span></div>', '2025-07-13 20:25:59', '2025-07-13 20:25:59', 1, 1),
(3, 'Suncroft', 3, '2025-01-01', '2027-12-31', 'Planning', 'Priyanka Runway City, Uttara', 'Suncroft.webp', '<div class=\"repeater-list-items\" style=\"margin-top: 8px; color: rgb(131, 141, 151); font-family: &quot;DM Sans&quot;, sans-serif; -webkit-tap-highlight-color: rgba(255, 255, 255, 0); display: flex; gap: 10px; align-items: center; justify-content: flex-start;\"><span class=\"repeater-text repeater-white-bg\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0);\"><h2 class=\"elementor-heading-title elementor-size-default\" style=\"margin-top: 1.5rem; margin-bottom: 0px; font-weight: 600; line-height: 1; font-size: 56px; color: rgb(255, 255, 255); background-color: rgb(32, 35, 52); -webkit-tap-highlight-color: rgba(255, 255, 255, 0); margin-block: 0.5rem 1rem; font-family: Bulter, sans-serif;\"><span style=\"font-size: 48px;\">Project&nbsp;</span><font color=\"#dd9933\"><span style=\"font-size: 48px;\">Location<br></span></font><span style=\"background-color: rgb(39, 42, 61); font-size: 18px; font-weight: 500; font-family: sans-serif;\">Our interactive map offers a detailed view of each closest landmark of our properties, allowing you to get a better idea of distances.</span><font color=\"#dd9933\"><span style=\"font-size: 48px;\"></span></font></h2></span></div><div style=\"color: rgb(131, 141, 151); font-family: &quot;DM Sans&quot;, sans-serif; line-height: 1.6;\"><span style=\"font-weight: bolder; font-size: 32px; color: rgb(255, 255, 255);\">Some of the landmarks close to this project are-</span></div><div style=\"color: rgb(131, 141, 151); font-family: &quot;DM Sans&quot;, sans-serif; line-height: 1.6;\"><span style=\"font-size: 18px;\">Metro Railway Station (3.1 km)</span></div><div style=\"color: rgb(131, 141, 151); font-family: &quot;DM Sans&quot;, sans-serif; line-height: 1.6;\"><span style=\"font-size: 18px;\">Hazrat Shahjalal International Airport (9.5 km)</span></div><div style=\"color: rgb(131, 141, 151); font-family: &quot;DM Sans&quot;, sans-serif; line-height: 1.6;\"><span style=\"font-size: 18px;\">Lubana General Hospital (4.2 km)</span></div><div style=\"color: rgb(131, 141, 151); font-family: &quot;DM Sans&quot;, sans-serif; line-height: 1.6;\"><span style=\"font-size: 18px;\">Scholastica (3.8 km)</span></div><div style=\"color: rgb(131, 141, 151); font-family: &quot;DM Sans&quot;, sans-serif; line-height: 1.6;\"><span style=\"font-size: 18px;\">Shanto-Mariam University of Creative Technology (4 km)</span></div>', '2025-07-13 20:46:37', '2025-07-13 20:46:37', 1, 1),
(4, 'Anisa Kabir Aaloy', 3, '2024-01-01', '2026-12-31', 'Planning', 'Priyanka Runway City, Uttara', 'Anisa Kabir Aaloy.webp', '<div class=\"repeater-list-items\" style=\"margin-top: 8px; color: rgb(131, 141, 151); font-family: &quot;DM Sans&quot;, sans-serif; -webkit-tap-highlight-color: rgba(255, 255, 255, 0); display: flex; gap: 10px; align-items: center; justify-content: flex-start;\"><span class=\"repeater-text repeater-white-bg\" style=\"-webkit-tap-highlight-color: rgba(255, 255, 255, 0);\"><h2 class=\"elementor-heading-title elementor-size-default\" style=\"margin-top: 1.5rem; margin-bottom: 0px; font-weight: 600; line-height: 1; font-size: 56px; color: rgb(255, 255, 255); background-color: rgb(32, 35, 52); -webkit-tap-highlight-color: rgba(255, 255, 255, 0); margin-block: 0.5rem 1rem; font-family: Bulter, sans-serif;\"><span style=\"font-size: 48px;\">Project&nbsp;</span><font color=\"#dd9933\"><span style=\"font-size: 48px;\">Location<br></span></font><span style=\"background-color: rgb(39, 42, 61); font-size: 18px; font-weight: 500; font-family: sans-serif;\">Our interactive map offers a detailed view of each closest landmark of our properties, allowing you to get a better idea of distances.</span><font color=\"#dd9933\"><span style=\"font-size: 48px;\"></span></font></h2></span></div><div style=\"color: rgb(131, 141, 151); font-family: &quot;DM Sans&quot;, sans-serif; line-height: 1.6;\"><span style=\"font-weight: bolder; font-size: 32px; color: rgb(255, 255, 255);\">Some of the landmarks close to this project are-</span></div><div style=\"color: rgb(131, 141, 151); font-family: &quot;DM Sans&quot;, sans-serif; line-height: 1.6;\"><span style=\"font-size: 18px;\">Metro Railway Station (3.1 km)</span></div><div style=\"color: rgb(131, 141, 151); font-family: &quot;DM Sans&quot;, sans-serif; line-height: 1.6;\"><span style=\"font-size: 18px;\">Hazrat Shahjalal International Airport (9.5 km)</span></div><div style=\"color: rgb(131, 141, 151); font-family: &quot;DM Sans&quot;, sans-serif; line-height: 1.6;\"><span style=\"font-size: 18px;\">Lubana General Hospital (4.2 km)</span></div><div style=\"color: rgb(131, 141, 151); font-family: &quot;DM Sans&quot;, sans-serif; line-height: 1.6;\"><span style=\"font-size: 18px;\">Scholastica (3.8 km)</span></div><div style=\"color: rgb(131, 141, 151); font-family: &quot;DM Sans&quot;, sans-serif; line-height: 1.6;\"><span style=\"font-size: 18px;\">Shanto-Mariam University of Creative Technology (4 km)</span></div>', '2025-07-13 20:46:48', '2025-07-13 20:46:48', 1, 1),
(5, 'Tahura Nasrin mitu', 2, '2025-08-01', '2025-08-29', 'Planning', 'Priyanka Runway City, Uttara', 'Tahura Nasrin mitu.jpg', '<p>bdvuydfbvd vbesvbjuy k</p>', '2025-08-11 05:33:02', '2025-08-11 05:33:02', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_purchases`
--

DROP TABLE IF EXISTS `mpmc_purchases`;
CREATE TABLE IF NOT EXISTS `mpmc_purchases` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) UNSIGNED DEFAULT NULL,
  `purchase_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `shipping_address` text DEFAULT NULL,
  `purchase_total` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `vat` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_purchases`
--

TRUNCATE TABLE `mpmc_purchases`;
--
-- Dumping data for table `mpmc_purchases`
--

INSERT INTO `mpmc_purchases` (`id`, `supplier_id`, `purchase_date`, `delivery_date`, `shipping_address`, `purchase_total`, `paid_amount`, `remark`, `discount`, `vat`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-07-12', '2024-07-12', 'Dhaka', 2493.75, 0, 'test', NULL, 118.75, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(2, 2, '2024-07-28', '2024-07-28', 'Basundhara, Dhaka', 24696, 20000, 'n/a', NULL, 1176, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(3, 3, '2024-07-28', '2024-07-28', 'Banani', 98784, 80000, 'n/a', NULL, 4704, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(4, 4, '2024-07-29', '2024-07-29', 'Sector-14, Uttara, Dhaka.', 49896, 20000, 'n/a', NULL, 2376, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(5, 5, '2024-07-29', '2024-07-29', 'Bangla-Motor, Dhaka, Bangladesh', 160524, 150000, 'n/a', NULL, 7644, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(6, 1, '2025-04-28', '2025-04-28', 'cumilla', 122850, 90000, 'n/a', NULL, 5850, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(7, 2, '2025-04-28', '2025-04-28', 'dhaka', 82320, NULL, 'n/a', NULL, 3920, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(8, 3, '2025-06-21', '2025-06-21', 'uttra', 123480, 10000, 'n/a', NULL, 5880, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(9, 4, '2025-06-21', '2025-06-21', 'cumilla', 103950, 10000, 'n/a', NULL, 4950, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(10, 5, '2025-06-21', '2025-06-21', 'cumilla', 2984100, 200000, 'n/a', NULL, 142100, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(11, 2, '2025-07-01', '2025-07-01', 'chittagong', 9775.5, 9775, 'n/a', NULL, 465.5, '2025-07-12 18:42:19', '2025-07-12 18:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_purchase_details`
--

DROP TABLE IF EXISTS `mpmc_purchase_details`;
CREATE TABLE IF NOT EXISTS `mpmc_purchase_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` float NOT NULL,
  `uom_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `vat` float NOT NULL,
  `discount` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_purchase_details`
--

TRUNCATE TABLE `mpmc_purchase_details`;
--
-- Dumping data for table `mpmc_purchase_details`
--

INSERT INTO `mpmc_purchase_details` (`id`, `purchase_id`, `project_id`, `product_id`, `qty`, `uom_id`, `price`, `vat`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 5, 2, 500, 0, 5, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(2, 2, 2, 2, 200, 4, 120, 0, 2, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(3, 3, 3, 3, 1200, 4, 80, 0, 2, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(4, 4, 4, 4, 80, 1, 600, 0, 1, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(5, 5, 1, 5, 1300, 2, 120, 0, 2, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(6, 6, 2, 1, 1300, 4, 90, 0, 2, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(7, 7, 3, 2, 800, 4, 100, 0, 2, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(8, 8, 4, 3, 100, 4, 1200, 0, 2, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(9, 9, 1, 4, 1000, 4, 100, 0, 1, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(10, 10, 5, 2, 2900, 4, 1000, 0, 2, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(11, 11, 1, 3, 50, 4, 190, 0, 2, '2025-07-12 18:42:19', '2025-07-12 18:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_requisitions`
--

DROP TABLE IF EXISTS `mpmc_requisitions`;
CREATE TABLE IF NOT EXISTS `mpmc_requisitions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `requisition_date` datetime NOT NULL,
  `needed_date` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `remark` varchar(45) NOT NULL,
  `is_new` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_requisitions`
--

TRUNCATE TABLE `mpmc_requisitions`;
--
-- Dumping data for table `mpmc_requisitions`
--

INSERT INTO `mpmc_requisitions` (`id`, `user_id`, `requisition_date`, `needed_date`, `status`, `remark`, `is_new`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-04-28 00:00:00', '2025-04-28', 'Complete', 'N/A', 1, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(2, 2, '2025-04-28 00:00:00', '2025-05-03', 'Complete', 'N/A', 1, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(3, 3, '2025-04-28 00:00:00', '2025-05-08', 'Complete', 'n/a', 1, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(4, 1, '2025-05-06 00:00:00', '2025-05-07', 'Complete', 'n/a', 1, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(7, 1, '2025-06-25 00:00:00', '2025-06-27', 'Pending', 'n/a', 1, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(8, 2, '2025-06-25 00:00:00', '2025-06-27', 'Pending', 'n/a', 1, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(9, 3, '2025-06-25 00:00:00', '2025-06-27', 'Pending', 'n/a', 1, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(10, 1, '2025-06-25 00:00:00', '2025-06-27', 'Pending', 'n/a', 1, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(11, 7, '2025-09-11 00:00:00', '2025-09-12', 'Pending', 'N/A', 1, '2025-09-11 17:49:48', '2025-09-11 11:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_requisition_details`
--

DROP TABLE IF EXISTS `mpmc_requisition_details`;
CREATE TABLE IF NOT EXISTS `mpmc_requisition_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requisition_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` float NOT NULL,
  `uom_id` int(11) NOT NULL,
  `approve_qty` int(11) DEFAULT NULL,
  `approve_uom_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_requisition_details`
--

TRUNCATE TABLE `mpmc_requisition_details`;
--
-- Dumping data for table `mpmc_requisition_details`
--

INSERT INTO `mpmc_requisition_details` (`id`, `requisition_id`, `project_id`, `task_id`, `product_id`, `qty`, `uom_id`, `approve_qty`, `approve_uom_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 1, 1300, 4, NULL, NULL, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(2, 2, 2, 3, 2, 1200, 4, NULL, NULL, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(3, 3, 3, 1, 3, 800, 4, NULL, NULL, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(4, 4, 4, 2, 4, 800, 4, NULL, NULL, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(7, 7, 3, 2, 2, 50, 4, NULL, NULL, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(8, 8, 4, 2, 3, 60, 4, NULL, NULL, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(9, 9, 1, 2, 4, 60, 4, NULL, NULL, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(10, 10, 2, 2, 5, 60, 4, NULL, NULL, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(11, 11, 1, 1, 1, 10, 1, 8, NULL, '2025-09-11 17:49:48', '2025-09-11 11:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_roles`
--

DROP TABLE IF EXISTS `mpmc_roles`;
CREATE TABLE IF NOT EXISTS `mpmc_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `permission_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL DEFAULT 0,
  `updated_by` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_roles`
--

TRUNCATE TABLE `mpmc_roles`;
--
-- Dumping data for table `mpmc_roles`
--

INSERT INTO `mpmc_roles` (`id`, `name`, `permission_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Super-Admin', 1, '2025-07-12 12:42:19', '2025-09-23 12:21:22', 1, 1),
(2, 'Admin', 1, '2025-07-12 12:42:19', '2025-07-12 12:42:19', 0, 0),
(3, 'HR ', 1, '2025-07-12 12:42:19', '2025-08-13 09:25:25', 0, 1),
(4, 'employee', 1, '2025-07-15 14:41:45', '2025-07-15 14:41:45', 1, 0),
(5, 'Manager', 1, '2025-08-08 06:29:01', '2025-09-23 10:58:19', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_role_permissions`
--

DROP TABLE IF EXISTS `mpmc_role_permissions`;
CREATE TABLE IF NOT EXISTS `mpmc_role_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL DEFAULT 0,
  `updated_by` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `permission_id` (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_role_permissions`
--

TRUNCATE TABLE `mpmc_role_permissions`;
--
-- Dumping data for table `mpmc_role_permissions`
--

INSERT INTO `mpmc_role_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 1, '2025-07-12 12:42:19', '2025-07-12 12:42:19', 0, 0),
(2, 1, 2, '2025-07-12 12:42:19', '2025-07-12 12:42:19', 0, 0),
(3, 1, 3, '2025-07-12 12:42:19', '2025-07-12 12:42:19', 0, 0),
(4, 1, 4, '2025-07-12 12:42:19', '2025-07-12 12:42:19', 0, 0),
(5, 1, 5, '2025-07-12 12:42:19', '2025-07-12 12:42:19', 0, 0),
(6, 2, 1, '2025-07-12 12:42:19', '2025-07-12 12:42:19', 0, 0),
(7, 2, 2, '2025-07-12 12:42:19', '2025-07-12 12:42:19', 0, 0),
(8, 2, 5, '2025-07-12 12:42:19', '2025-07-12 12:42:19', 0, 0),
(9, 2, 3, '2025-07-12 12:42:19', '2025-07-12 12:42:19', 0, 0),
(12, 1, 6, '2025-07-12 12:42:19', '2025-07-12 12:42:19', 0, 0),
(15, 4, 1, '2025-07-15 14:41:45', '2025-07-15 14:41:45', 0, 0),
(16, 4, 2, '2025-07-15 14:41:45', '2025-07-15 14:41:45', 0, 0),
(17, 4, 3, '2025-07-15 14:41:45', '2025-07-15 14:41:45', 0, 0),
(18, 4, 4, '2025-07-15 14:41:45', '2025-07-15 14:41:45', 0, 0),
(19, 4, 5, '2025-07-15 14:41:45', '2025-07-15 14:41:45', 0, 0),
(20, 4, 6, '2025-07-15 14:41:45', '2025-07-15 14:41:45', 0, 0),
(26, 5, 1, '2025-08-08 06:29:01', '2025-08-08 06:29:01', 0, 0),
(27, 5, 2, '2025-08-08 06:29:01', '2025-08-08 06:29:01', 0, 0),
(28, 5, 3, '2025-08-08 06:29:01', '2025-08-08 06:29:01', 0, 0),
(29, 5, 4, '2025-08-08 06:29:01', '2025-08-08 06:29:01', 0, 0),
(31, 5, 6, '2025-08-08 06:29:01', '2025-08-08 06:29:01', 0, 0),
(35, 3, 2, '2025-08-13 09:05:55', '2025-08-13 09:05:55', 0, 0),
(37, 1, 12, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(38, 1, 13, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(39, 1, 14, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(40, 1, 15, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(41, 1, 16, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(42, 1, 17, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(43, 1, 18, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(44, 1, 19, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(45, 1, 20, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(46, 1, 21, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(47, 1, 22, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(48, 1, 23, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(49, 1, 24, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(50, 1, 25, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(51, 1, 26, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(52, 1, 27, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(53, 1, 28, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(54, 1, 29, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(55, 1, 30, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(56, 1, 31, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(57, 1, 32, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(58, 1, 33, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(59, 1, 34, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(60, 1, 35, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(61, 1, 36, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(62, 1, 37, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(63, 1, 38, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(64, 1, 39, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(65, 1, 40, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(66, 1, 41, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(67, 1, 42, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(68, 1, 43, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(69, 1, 44, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(70, 1, 45, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(71, 1, 46, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(72, 1, 47, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(73, 1, 48, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(74, 1, 49, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(75, 1, 50, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(76, 1, 51, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(77, 1, 52, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(78, 1, 53, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(79, 1, 54, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(80, 1, 55, '2025-08-13 09:21:57', '2025-08-13 09:21:57', 0, 0),
(81, 3, 12, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(82, 3, 13, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(83, 3, 14, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(84, 3, 21, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(85, 3, 22, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(86, 3, 23, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(87, 3, 24, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(88, 3, 26, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(89, 3, 27, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(90, 3, 28, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(91, 3, 29, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(92, 3, 31, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(93, 3, 32, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(94, 3, 33, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(95, 3, 34, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(96, 3, 36, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(97, 3, 37, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(98, 3, 38, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(99, 3, 39, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(100, 3, 41, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(101, 3, 42, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(102, 3, 43, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(103, 3, 44, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(104, 3, 46, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(105, 3, 47, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(106, 3, 48, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(107, 3, 49, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(108, 3, 51, '2025-09-23 10:58:19', '2025-09-23 10:58:19', 0, 0),
(109, 1, 56, '2025-09-23 12:11:35', '2025-09-23 12:11:35', 0, 0),
(110, 1, 57, '2025-09-23 12:21:22', '2025-09-23 12:21:22', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_salary_payments`
--

DROP TABLE IF EXISTS `mpmc_salary_payments`;
CREATE TABLE IF NOT EXISTS `mpmc_salary_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `salary_structure_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `gross_salary` decimal(10,2) NOT NULL,
  `deductions` decimal(10,2) DEFAULT 0.00,
  `bonus` decimal(10,2) DEFAULT 0.00,
  `net_salary` decimal(10,2) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_method` enum('cash','bank_transfer','cheque','mobile_banking') NOT NULL,
  `transaction_reference` varchar(100) DEFAULT NULL,
  `status` enum('pending','paid','cancelled') NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  KEY `salary_structure_id` (`salary_structure_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_salary_payments`
--

TRUNCATE TABLE `mpmc_salary_payments`;
--
-- Dumping data for table `mpmc_salary_payments`
--

INSERT INTO `mpmc_salary_payments` (`id`, `employee_id`, `salary_structure_id`, `month`, `year`, `gross_salary`, `deductions`, `bonus`, `net_salary`, `payment_date`, `payment_method`, `transaction_reference`, `status`, `notes`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 1, 7, 2025, 33500.00, 1000.00, 500.00, 33000.00, '2025-07-31', 'bank_transfer', 'TRX202507001', 'paid', 'July Salary', '2025-07-31 11:16:23', '2025-07-31 11:16:23', 1, 1),
(2, 2, 2, 7, 2025, 40800.00, 1500.00, 1000.00, 40300.00, '2025-07-31', 'cheque', 'TRX202507002', 'paid', 'July Salary with bonus', '2025-07-31 11:16:23', '2025-07-31 11:16:23', 1, 1),
(3, 3, 3, 7, 2025, 26600.00, 500.00, 0.00, 26100.00, '2025-07-31', 'cash', 'TRX202507003', 'pending', 'Awaiting clearance', '2025-07-31 11:16:23', '2025-07-31 11:16:23', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_salary_structures`
--

DROP TABLE IF EXISTS `mpmc_salary_structures`;
CREATE TABLE IF NOT EXISTS `mpmc_salary_structures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `basic_salary` decimal(10,2) NOT NULL,
  `house_rent` decimal(10,2) DEFAULT 0.00,
  `medical_allowance` decimal(10,2) DEFAULT 0.00,
  `transport_allowance` decimal(10,2) DEFAULT 0.00,
  `other_allowance` decimal(10,2) DEFAULT 0.00,
  `effective_from` date NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_salary_structures`
--

TRUNCATE TABLE `mpmc_salary_structures`;
--
-- Dumping data for table `mpmc_salary_structures`
--

INSERT INTO `mpmc_salary_structures` (`id`, `employee_id`, `basic_salary`, `house_rent`, `medical_allowance`, `transport_allowance`, `other_allowance`, `effective_from`, `notes`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 25000.00, 5000.00, 2000.00, 1000.00, 500.00, '2025-01-01', 'Standard package', '2025-07-31 11:16:23', '2025-07-31 11:16:23', 1, 1),
(2, 2, 30000.00, 6000.00, 2500.00, 1500.00, 800.00, '2025-03-01', 'Updated after promotion', '2025-07-31 11:16:23', '2025-07-31 11:16:23', 1, 1),
(3, 3, 20000.00, 4000.00, 1500.00, 800.00, 300.00, '2025-05-01', NULL, '2025-07-31 11:16:23', '2025-07-31 11:16:23', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_status`
--

DROP TABLE IF EXISTS `mpmc_status`;
CREATE TABLE IF NOT EXISTS `mpmc_status` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `descriptions` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL DEFAULT 0,
  `updated_by` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_status`
--

TRUNCATE TABLE `mpmc_status`;
--
-- Dumping data for table `mpmc_status`
--

INSERT INTO `mpmc_status` (`id`, `name`, `descriptions`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Processing', 'Processing', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 1),
(2, 'Shifted', 'Shifted ok', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 1),
(3, 'Delivered', 'OK', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 1),
(4, 'Approved', 'Approved', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(5, 'Damaged Products', 'Damaged Products', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(6, 'APPROVAL', 'ON1', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 1),
(7, 'done', 'po', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(8, 'type', 'okokok', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_stocks`
--

DROP TABLE IF EXISTS `mpmc_stocks`;
CREATE TABLE IF NOT EXISTS `mpmc_stocks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `uom_id` int(11) NOT NULL,
  `transaction_type` varchar(45) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_stocks`
--

TRUNCATE TABLE `mpmc_stocks`;
--
-- Dumping data for table `mpmc_stocks`
--

INSERT INTO `mpmc_stocks` (`id`, `project_id`, `product_id`, `qty`, `uom_id`, `transaction_type`, `remark`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1300, 4, 'Purchase', NULL, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(2, 2, 2, 500, 4, 'Used', NULL, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(3, 3, 3, 100, 4, 'Damage', NULL, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(4, 4, 4, 800, 4, 'Purchase', NULL, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(5, 1, 1, 100, 4, 'Purchase', NULL, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(6, 2, 2, 1000, 4, 'Purchase', NULL, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(7, 3, 3, 2900, 4, 'Purchase', NULL, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(8, 4, 4, 100, 4, 'Purchase', NULL, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(9, 1, 5, 50, 4, 'Purchase', NULL, '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(10, 2, 6, 80, 4, 'Purchase', NULL, '2025-07-12 18:42:19', '2025-07-12 18:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_stock_adjustments`
--

DROP TABLE IF EXISTS `mpmc_stock_adjustments`;
CREATE TABLE IF NOT EXISTS `mpmc_stock_adjustments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `stock_adjustment_type_id` int(11) DEFAULT NULL,
  `remark` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_stock_adjustments`
--

TRUNCATE TABLE `mpmc_stock_adjustments`;
--
-- Dumping data for table `mpmc_stock_adjustments`
--

INSERT INTO `mpmc_stock_adjustments` (`id`, `name`, `user_id`, `stock_adjustment_type_id`, `remark`, `created_at`, `updated_at`) VALUES
(1, NULL, 2, 1, 'abcdrfwef', '2025-07-12 18:42:19', '2025-07-12 18:42:19'),
(2, NULL, 2, NULL, 'sfge', '2025-07-12 18:42:19', '2025-07-12 18:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_stock_adjustment_details`
--

DROP TABLE IF EXISTS `mpmc_stock_adjustment_details`;
CREATE TABLE IF NOT EXISTS `mpmc_stock_adjustment_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `stock_adjustment_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_stock_adjustment_details`
--

TRUNCATE TABLE `mpmc_stock_adjustment_details`;
--
-- Dumping data for table `mpmc_stock_adjustment_details`
--

INSERT INTO `mpmc_stock_adjustment_details` (`id`, `stock_adjustment_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 20, '2025-07-12 18:42:19', '2025-07-12 18:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_stock_adjustment_types`
--

DROP TABLE IF EXISTS `mpmc_stock_adjustment_types`;
CREATE TABLE IF NOT EXISTS `mpmc_stock_adjustment_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_stock_adjustment_types`
--

TRUNCATE TABLE `mpmc_stock_adjustment_types`;
--
-- Dumping data for table `mpmc_stock_adjustment_types`
--

INSERT INTO `mpmc_stock_adjustment_types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'data', 'given', '2025-07-12 18:42:19', '2025-07-12 18:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_suppliers`
--

DROP TABLE IF EXISTS `mpmc_suppliers`;
CREATE TABLE IF NOT EXISTS `mpmc_suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(25) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `address` varchar(80) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL DEFAULT 0,
  `updated_by` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_suppliers`
--

TRUNCATE TABLE `mpmc_suppliers`;
--
-- Dumping data for table `mpmc_suppliers`
--

INSERT INTO `mpmc_suppliers` (`id`, `name`, `phone`, `email`, `company_name`, `address`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Joynul Abedin (BSRM Corporate)', '+8802333360301', 'mail@bsrm.com', 'BSRM Corporate Office, Motijheel, Dhaka', 'Ali Mansion, 1207/ 1099, Sadarghat Road, Dhaka, Bangladesh', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 1),
(2, 'Shimul Mostafa (ADSR Corp)', '016398545556', 'abedin123@gmail.com', 'ADSR Corporate Office', 'Bangla Motor, Dhaka- 1212, Bangladesh', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(3, 'Mofidul Haque (Stella Star)', '013698545663', 'stellastar@gmail.com', 'Stella Star', 'Bangla Motor, Dhaka, Bangladesh', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(4, 'Amir Uddin (DBL Ceramics)', '0136958456', 'dbl@ceramics.gmail.com', 'DBL Ceramics Ltd.', 'Gulshan 1, Dhaka, Bangladesh', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(5, 'Jony Sarkar (Great Wall)', '01369854569', 'greatwall@gmail.com', 'Great Wall Ceramic Industries Ltd.', 'Bangla Motor, Dhaka, Bangladesh', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(6, 'Moidul Mridha (Fu-Wang)', '01369857458', 'fuwang@gmail.com', 'Fu-Wang Ceramics Industries Ltd.', 'Joint Venture Company', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(7, 'Mridul Saha (Shinepukur)', '0136985695', 'shinepukur@gmail.com', 'Shinepukur Ceramics', 'BEXIMCO Industrial Park, Dhaka Export Processing Zone (DEPZ)', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(8, 'Ruhul Mianji (Akij Ceramics)', '0156985696', 'akijceramics@gmail.com', 'Akij Ceramics Ltd.', 'Bangla Motor, Dhaka Bangladesh', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(9, 'MD Atiqur Rahman', '0165894855', 'atiqur12@gmail.com', 'AhaminGroup', 'Banani, Dhaka, Bangladesh', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(10, 'almaniya', '0136985464', '123almi@gmail.com', 'xyla', 'uttara', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_tasks`
--

DROP TABLE IF EXISTS `mpmc_tasks`;
CREATE TABLE IF NOT EXISTS `mpmc_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `project_id` int(11) NOT NULL,
  `locations` text NOT NULL,
  `status` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_time` date DEFAULT NULL,
  `end_time` date DEFAULT NULL,
  `estimated_time` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL DEFAULT 0,
  `updated_by` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_tasks`
--

TRUNCATE TABLE `mpmc_tasks`;
--
-- Dumping data for table `mpmc_tasks`
--

INSERT INTO `mpmc_tasks` (`id`, `name`, `description`, `project_id`, `locations`, `status`, `user_id`, `start_time`, `end_time`, `estimated_time`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Back Pilling', '', 1, 'Dhaka', 'Finished', 1, NULL, NULL, 0, '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 1),
(2, 'Foundation Work', '', 1, 'Baunia, Dhaka', 'On work', 1, '2019-06-12', '2014-06-12', 0, '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(3, 'Structural Framing', '', 1, 'Baunia, Dhaka', 'On Work', 1, '2019-06-12', '2014-06-12', 0, '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(4, 'Electric', '', 1, 'bownia', 'running', 1, '2025-06-20', '2026-02-28', 0, '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 1),
(5, 'Anisa Kabir Aaloy', 'Complete On time', 1, 'Priyanka Runway City, Uttara', 'In Progress', 3, '2025-07-26', '2025-07-30', 10, '2025-07-21 01:37:52', '2025-07-21 01:37:52', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_teams`
--

DROP TABLE IF EXISTS `mpmc_teams`;
CREATE TABLE IF NOT EXISTS `mpmc_teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_teams`
--

TRUNCATE TABLE `mpmc_teams`;
-- --------------------------------------------------------

--
-- Table structure for table `mpmc_transaction_types`
--

DROP TABLE IF EXISTS `mpmc_transaction_types`;
CREATE TABLE IF NOT EXISTS `mpmc_transaction_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `descriptions` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL DEFAULT 0,
  `updated_by` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_transaction_types`
--

TRUNCATE TABLE `mpmc_transaction_types`;
--
-- Dumping data for table `mpmc_transaction_types`
--

INSERT INTO `mpmc_transaction_types` (`id`, `name`, `descriptions`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Purchase Order', 'Purchase Order', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 1),
(2, 'Purchase Return', 'Purchase Return', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(3, 'Project Deliverd', 'Project Deliverd', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(4, 'Project Return', 'Project Return', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 0, 0),
(5, 'return productuiwedqiwhi', 'damage23', '2025-07-12 18:42:19', '2025-07-12 18:42:19', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_uoms`
--

DROP TABLE IF EXISTS `mpmc_uoms`;
CREATE TABLE IF NOT EXISTS `mpmc_uoms` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL DEFAULT 0,
  `updated_by` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_uoms`
--

TRUNCATE TABLE `mpmc_uoms`;
--
-- Dumping data for table `mpmc_uoms`
--

INSERT INTO `mpmc_uoms` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Piece (PC)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(2, 'Kilogram (KG)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(3, 'Gram (G)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(4, 'Tonne (T)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(5, 'Litre (L)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(6, 'Millilitre (ML)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(7, 'Metre (M)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(8, 'Centimetre (CM)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(9, 'Square Metre (SQ M)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(10, 'Square Foot (SQ FT)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(11, 'Cubic Metre (CBM)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(12, 'Dozen (DZ)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(13, 'Box (BX)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(14, 'Pack (PK)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(15, 'Pair (PR)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(16, 'Hour (HR)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(17, 'Minute (MIN)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(18, 'Watt (W)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(19, 'Kilowatt (KW)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1),
(20, 'Barrel (BBL)', '2025-07-13 00:42:19', '2025-07-13 00:42:19', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_users`
--

DROP TABLE IF EXISTS `mpmc_users`;
CREATE TABLE IF NOT EXISTS `mpmc_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(80) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `gender` text NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `designation_id` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(10) NOT NULL DEFAULT 0,
  `updated_by` int(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_users`
--

TRUNCATE TABLE `mpmc_users`;
--
-- Dumping data for table `mpmc_users`
--

INSERT INTO `mpmc_users` (`id`, `name`, `username`, `email`, `phone`, `address`, `password`, `role_id`, `status`, `gender`, `department_id`, `designation_id`, `photo`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'MIR ARMAN', 'CEO Director', 'mirarman123@gmail.com', '0165984875', 'Uttara-14', '$2y$10$y1ZOJFdg/Bl2QsQRmsdp9.TPTkJt.XcGJb.42LzKey4GFZj9NyfUa', 1, 1, '', 3, 1, 'CEO Director.png', '2025-07-12 18:42:20', '2025-07-12 18:42:20', 1, 1),
(2, 'ZISHAN MAHMOOD', 'Zishan Mahmood', 'zishanm@gmail.com', '01756669091', 'Gulsan-2, Dhaka, Bangladesh', '$2y$10$HDdQmZY9VCecU17HkNLJfuGD9FQFP46lCPBarnJdGfomSNg/p.lbm', 1, 1, '', 5, 3, 'Zishan Mahmood.jpg', '2025-07-12 18:42:20', '2025-07-12 18:42:20', 0, 1),
(3, 'Tahura Nasrin Mitu', 'tahura', 'info@tahuranasrin.com', '01826661262', 'Mayapuri, 263, Noya Ati, Dhaka', '$2y$10$xCo2z/nxbnH6b4MsLXdIPeHxHRvn2CJa9JpUFsjlTnTvztVJEN6u6', 1, 1, 'Male', 4, 11, 'tahura.jpg', '2025-07-12 18:42:20', '2025-07-12 18:42:20', 1, 0),
(7, 'MD AL-AMIN', 'alamin', 'mdalamin.connect@gmail.com', '01721184712', '570, Senpara,', '$2y$10$WrU/wfkMTZ3LMT5jUV.6IOfPo/wpePpZvgFFNRl4vgaoqVXhMNGbK', 1, 0, 'Male', 3, 13, 'alamin.png', '2025-07-15 20:59:54', '2025-07-15 20:59:54', 1, 0),
(12, 'Miraz', 'miraz', 'miraz@gmail.com', '01721184712', 'Mayapuri, 263, Noya Ati,', '$2y$10$66I56Zrd6fqx48RfgdtRGOvnlO5QaV5lAn.GXNIX1/nsx4vuRdCh2', 3, 1, 'Male', 2, 11, 'miraz.png', '2025-08-13 15:00:38', '2025-08-13 15:00:38', 1, 0),
(13, 'MD AL-AMIN', 'mirarman123@gmail.com', 'mdalamin.connect@yahoo.com', '01886677907', '570, Senpara,', '$2y$10$eRZQgyioMiDfiyxac7mw2uolQFAnfIyMMVhUnpkKfAWt/AcAeKM1m', 6, 1, 'Male', 10, 5, 'mirarman123@gmail.com.png', '2025-09-23 16:54:18', '2025-09-23 16:54:18', 1, 0),
(14, 'MIraz', 'mirazsr', 'srmiraz80@gmail.com', '01721184712', '570, Senpara,', '$2y$10$89WgIje6M2lTewe8JohJb.TG42c2FffIHqFRHP/pihLkn.dk0M9q6', 6, 1, 'Male', 10, 5, 'mirazsr.png', '2025-09-23 17:40:44', '2025-09-23 17:40:44', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_use_products`
--

DROP TABLE IF EXISTS `mpmc_use_products`;
CREATE TABLE IF NOT EXISTS `mpmc_use_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_use_products`
--

TRUNCATE TABLE `mpmc_use_products`;
--
-- Dumping data for table `mpmc_use_products`
--

INSERT INTO `mpmc_use_products` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'used', '2025-07-12 18:42:20', '2025-07-12 18:42:20'),
(2, 1, 'damaged', '2025-07-12 18:42:20', '2025-07-12 18:42:20'),
(3, 2, 'Damage', '2025-07-12 18:42:20', '2025-07-12 18:42:20'),
(4, 3, 'Damage', '2025-07-12 18:42:20', '2025-07-12 18:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `mpmc_use_product_details`
--

DROP TABLE IF EXISTS `mpmc_use_product_details`;
CREATE TABLE IF NOT EXISTS `mpmc_use_product_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `use_product_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `uom_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `mpmc_use_product_details`
--

TRUNCATE TABLE `mpmc_use_product_details`;
--
-- Dumping data for table `mpmc_use_product_details`
--

INSERT INTO `mpmc_use_product_details` (`id`, `use_product_id`, `project_id`, `task_id`, `product_id`, `uom_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 4, 500, '2025-07-12 18:42:20', '2025-07-12 18:42:20'),
(2, 2, 2, 1, 2, 4, 100, '2025-07-12 18:42:20', '2025-07-12 18:42:20'),
(3, 3, 3, 2, 3, 4, 20, '2025-07-12 18:42:20', '2025-07-12 18:42:20'),
(4, 4, 4, 3, 1, 1, 50, '2025-07-12 18:42:20', '2025-07-12 18:42:20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
