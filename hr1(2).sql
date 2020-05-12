-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 10:01 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr1`
--

-- --------------------------------------------------------

--
-- Table structure for table `calc`
--

CREATE TABLE `calc` (
  `no` int(11) NOT NULL,
  `humans_id` varchar(255) NOT NULL,
  `position` text DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `pdate` date NOT NULL,
  `knowledge` float DEFAULT NULL,
  `wspeed` float DEFAULT NULL,
  `wsoul` float DEFAULT NULL,
  `wqual` float DEFAULT NULL,
  `wpress` float DEFAULT NULL,
  `teamwork` float DEFAULT NULL,
  `communicate` float DEFAULT NULL,
  `responbility` float DEFAULT NULL,
  `learning` float DEFAULT NULL,
  `dicipline` float DEFAULT NULL,
  `initiative` float DEFAULT NULL,
  `creativity` float DEFAULT NULL,
  `honestly` float DEFAULT NULL,
  `obedience` float DEFAULT NULL,
  `loyalty` float DEFAULT NULL,
  `organate` float DEFAULT NULL,
  `coaching` float DEFAULT NULL,
  `controling` float DEFAULT NULL,
  `planing` float DEFAULT NULL,
  `delegate` float DEFAULT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calc`
--

INSERT INTO `calc` (`no`, `humans_id`, `position`, `location`, `pdate`, `knowledge`, `wspeed`, `wsoul`, `wqual`, `wpress`, `teamwork`, `communicate`, `responbility`, `learning`, `dicipline`, `initiative`, `creativity`, `honestly`, `obedience`, `loyalty`, `organate`, `coaching`, `controling`, `planing`, `delegate`, `total`) VALUES
(1, '0', '', '', '0000-00-00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, '0', '', '', '0000-00-00', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, '0', '', '', '0000-00-00', 0.6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, '0', '', '', '0000-00-00', 0.6, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, '0', '', '', '0000-00-00', 0.6, 0.6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, '0', '', '', '0000-00-00', 0.6, 0.6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, '0', '', '', '0000-00-00', 0.6, 0.6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, '0', '', '', '0000-00-00', 3.25, 4.35, 2.75, 0.75, 4.9, 4.9, 2.8, 2.4, 3.9, 3.25, 1.15, 4.4, 4.95, 3.9, 2.7, 4.75, 2.4, 4.75, 3.4, 3.9, 69.55),
(9, '0', 'Staff', '', '2020-03-13', 2.7, 3.4, 3.9, 0.6, 4.7, 3.35, 4.25, 4.95, 2.7, 3.4, 0.9, 2.7, 1.6, 4.7, 1.9, 4.4, 2.75, 3.2, 1.55, 4.4, 62.05),
(10, '0', 'Staff', '', '2020-03-11', 2.7, 4.35, 3.25, 4.9, 2.75, 1, 4.35, 4.7, 4.25, 3.75, 1.1, 3.9, 2.7, 1.05, 3.3, 1.1, 3.9, 3.25, 3.85, 4.95, 65.1),
(11, '0', 'Staff', '', '2020-03-11', 2.7, 4.35, 3.25, 4.9, 2.75, 1, 4.35, 4.7, 4.25, 3.75, 1.1, 3.9, 2.7, 1.05, 3.3, 1.1, 3.9, 3.25, 3.85, 4.95, 65.1),
(12, '0', 'Staff', '', '2020-03-11', 2.7, 4.35, 3.25, 4.9, 2.75, 1, 4.35, 4.7, 4.25, 3.75, 1.1, 3.9, 2.7, 1.05, 3.3, 1.1, 3.9, 3.25, 3.85, 4.95, 65.1),
(13, '0', 'Staff', '', '2020-03-11', 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 12),
(14, '0', 'Driver', '', '2020-03-18', 4.35, 2.7, 4.9, 2.9, 3.4, 3.85, 4.75, 2.45, 4.3, 0.75, 4.4, 3.75, 4.75, 2.25, 4.8, 4.35, 4.75, 3.2, 4.3, 2.25, 73.15),
(15, '0', 'Staff', '', '2020-03-11', 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 12),
(16, '0', 'Staff', '', '2020-03-01', 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 12),
(17, '0', 'Staff', '', '2020-03-03', 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 12),
(18, '0', 'Staff', '', '2020-03-03', 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 12),
(19, '0', 'Staff', '', '2020-03-03', 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 12),
(20, '0', 'Staff', '', '2020-03-10', 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 12),
(21, '0', 'Driver', '', '2020-03-03', 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 12),
(22, '0', 'Driver', '', '2020-03-03', 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 12),
(23, '0', 'Staff', '', '2020-03-04', 0.6, 1.15, 1.15, 0.7, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 13.2),
(24, '0', 'Staff', '', '2020-03-24', 1.15, 0.6, 2.25, 0.6, 3.35, 2.25, 0.8, 4.5, 3.9, 2.25, 1.15, 3.7, 1.35, 0.6, 4.45, 0, 0, 0, 0, 0, 32.9),
(25, '0', 'Driver', '', '2020-03-24', 1.7, 0, 0, 2.7, 0, 1.15, 0.6, 0, 0, 3.85, 4.95, 0, 2.8, 1.7, 1.15, 0, 0, 0, 0, 0, 20.6),
(26, '0', 'Helper', 'Kania 710', '2020-04-02', 0.6, 0, 0, 0.6, 0, 0.6, 0.6, 0, 0, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0, 0, 0, 0, 0, 6),
(27, '0', 'Staff Accounting & Tax', 'Tania Lombok', '2020-04-02', 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0, 0, 0, 0, 0, 9),
(28, '0', 'Staff Production', 'Berkat Karunia Jaya', '2020-04-02', 1.7, 1.7, 1.7, 1.7, 1.7, 1.7, 1.7, 1.7, 1.7, 1.7, 1.7, 1.7, 1.7, 1.7, 1.7, 0, 0, 0, 0, 0, 25.5),
(29, '0', 'Staff Finance', 'Manna Sejahterah Galvalume', '2020-04-02', 0.6, 0.6, 0.6, 0.65, 0.65, 0.65, 0.65, 0.65, 0.65, 0.65, 0.65, 0.65, 0.65, 0.65, 0.65, 0, 0, 0, 0, 0, 9.6),
(30, '0', 'Kepala Outlet/Divisi', 'Tritan', '2020-04-23', 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 12),
(31, '0', 'Driver/Helper', 'Kania 710', '2020-04-03', 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 12),
(32, '0', 'Helper', 'UD. Menggala', '2020-04-03', 1.8, NULL, NULL, 0.6, NULL, 1.8, 1.3, NULL, NULL, 1.3, 0.65, 1.3, 1.3, 1.95, 0.65, NULL, NULL, NULL, NULL, NULL, 12.65),
(33, '0', 'Helper', 'UD. Menggala', '2020-04-03', 1.8, NULL, NULL, 0.6, NULL, 1.8, 1.3, NULL, NULL, 1.3, 0.65, 1.3, 1.3, 1.95, 0.65, NULL, NULL, NULL, NULL, NULL, 12.65),
(34, '0', 'Helper', 'Manna Sejahterah Galvalume', '2020-04-03', 1.95, NULL, NULL, 0.65, NULL, 1.95, 1.3, NULL, NULL, 1.3, 0.65, 1.3, 1.3, 1.95, 0.65, NULL, NULL, NULL, NULL, NULL, 13),
(35, '0', 'Staff Marketing', 'Tania Tidar', '2020-04-11', 4.35, 4.25, 4.4, 4.45, 4.45, 4.25, 4.4, 4.5, 4.25, 4.5, 4.4, 4.4, 4.5, 4.5, 4.75, 0, 0, 0, 0, 0, 66.35),
(36, '0', 'Staff Marketing', 'Tania Tidar', '2020-04-11', 13.05, 8.5, 8.8, 8.9, 4.45, 4.25, 4.4, 4.5, 4.25, 4.5, 4.4, 4.4, 4.5, 4.5, 4.75, NULL, NULL, NULL, NULL, NULL, 74.9),
(37, '0', 'Staff Marketing', 'Tania Tidar', '2020-04-04', 13.05, 8.5, 8.8, 8.9, 4.45, 4.25, 4.4, 4.5, 4.25, 4.5, 4.4, 4.4, 4.5, 4.5, 4.75, NULL, NULL, NULL, NULL, NULL, 74.9),
(38, '0', 'Staff Marketing', 'Tania Tidar', '2020-04-11', 13.05, 8.5, 8.8, 8.9, 4.45, 4.25, 4.4, 4.5, 4.25, 4.5, 4.4, 4.4, 4.5, 4.5, 4.75, NULL, NULL, NULL, NULL, NULL, 74.9),
(39, '0', 'Staff Marketing', 'Tania Tidar', '2020-04-11', 13.05, 8.5, 8.8, 8.9, 4.45, 4.25, 4.4, 4.5, 4.25, 4.5, 4.4, 4.4, 4.5, 4.5, 4.75, NULL, NULL, NULL, NULL, NULL, 88.15),
(40, '0', 'Staff IT', 'jakarta', '2020-04-27', 12, 8, 8, 8, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, NULL, NULL, NULL, NULL, 80),
(41, '0', 'Staff Digital Marketing', 'Tritan', '2020-04-30', 1.8, 1.2, 1.2, 1.2, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, 0.6, NULL, NULL, NULL, NULL, NULL, 12),
(42, '0', 'Staff Purchasing', 'Erli Pratiwi', '2020-05-04', 12, 8, 8, 8, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, NULL, NULL, NULL, NULL, 80),
(43, '0', 'Staff Purchasing', 'Tania Tidar', '2020-05-04', 7.5, 5, 5, 5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, NULL, NULL, NULL, NULL, NULL, 50),
(44, '0', 'Staff HRD', 'Manna', '2020-05-04', 10.5, 7, 7, 7, 3.5, 3.5, 3.5, 3.5, 3.5, 3.5, 3.5, 3.5, 3.5, 3.5, 3.5, NULL, NULL, NULL, NULL, NULL, 70),
(45, '0', 'Staff Marketing', 'BKJ', '2020-05-04', 6.75, 4.5, 4.5, 4.5, 2.25, 2.25, 2.25, 2.25, 2.25, 2.25, 2.25, 2.25, 2.25, 2.25, 2.25, NULL, NULL, NULL, NULL, NULL, 45),
(46, '0', 'Staff Purchasing', 'ABM', '2020-05-04', 11.25, 7.5, 7.5, 7.5, 3.75, 3.75, 3.75, 3.75, 3.75, 3.75, 3.75, 3.75, 3.75, 3.75, 3.75, NULL, NULL, NULL, NULL, NULL, 75),
(47, '0', 'Staff Expedition', 'Kania710', '2020-05-04', 4.5, 3, 3, 3, 0, 1.5, 1.5, 1.5, 1.5, 1.5, 1.5, 1.5, 1.5, 1.5, 1.5, NULL, NULL, NULL, NULL, NULL, 28.5),
(48, '0', 'Staff HRD', 'Menggala', '2020-05-04', 11.7, 7.8, 7.8, 7.8, 3.9, 3.9, 3.9, 3.9, 3.9, 3.9, 3.9, 3.9, 3.9, 3.9, 3.9, NULL, NULL, NULL, NULL, NULL, 78),
(49, '0', 'Staff Purchasing', 'Tritan', '2020-05-15', 12, 8, 8, 8, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, NULL, NULL, NULL, NULL, 80),
(50, '0', 'Staff Purchasing', 'Tritan', '2020-05-22', 6.75, 4.5, 4.5, 4.5, 2.25, 2.25, 2.25, 2.25, 2.25, 2.25, 2.25, 2.25, 2.25, 2.25, 2.25, NULL, NULL, NULL, NULL, NULL, 45),
(51, '[{\"id\":6}]', 'Staff IT', 'Tania Tidar', '2020-05-13', 12, 8, 8, 8, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, NULL, NULL, NULL, NULL, 80),
(52, '7', 'Staff Purchasing', 'Tania Tidar', '2020-05-12', 12, 8, 8, 8, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, NULL, NULL, NULL, NULL, 80),
(53, '6', 'Staff IT', 'Tania Tidar', '2020-05-12', 10.5, 7, 7, 7, 3.5, 3.5, 3.5, 3.5, 3.5, 3.5, 3.5, 3.5, 3.5, 3.5, 3.5, NULL, NULL, NULL, NULL, NULL, 70),
(54, '7', 'Staff HRD', 'Tania Tidar', '2020-05-12', 13.5, 9, 9, 9, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, 4.5, NULL, NULL, NULL, NULL, NULL, 90),
(55, '9', NULL, 'Tania Tidar', '2020-05-13', 6, 4, 4, 4, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, NULL, NULL, NULL, NULL, NULL, 40),
(56, '5', NULL, 'Tania Tidar', '2020-05-15', 6, 4, 4, 4, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, NULL, NULL, NULL, NULL, NULL, 40);

-- --------------------------------------------------------

--
-- Table structure for table `chps`
--

CREATE TABLE `chps` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `vat` tinyint(1) NOT NULL,
  `total_cost` decimal(10,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `submit` tinyint(1) NOT NULL DEFAULT 0,
  `deliver` tinyint(1) NOT NULL DEFAULT 0,
  `delivery_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chps`
--

INSERT INTO `chps` (`id`, `customer_id`, `user_id`, `vat`, `total_cost`, `note`, `status`, `submit`, `deliver`, `delivery_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 7, 0, '5.00', '', 0, 0, 0, '2020-04-16', '2020-04-15 20:53:04', '2020-04-16 20:52:36', NULL),
(4, 1, 7, 0, '10.00', '', 0, 0, 0, '2020-04-16', '2020-04-16 00:48:27', '2020-04-16 20:39:42', NULL),
(5, 1, 7, 0, '6.00', '', 0, 0, 0, '2020-04-26', '2020-04-24 23:32:36', '2020-04-24 23:32:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chp_details`
--

CREATE TABLE `chp_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `total_cost` decimal(10,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `chp_details`
--

INSERT INTO `chp_details` (`id`, `order_id`, `product_id`, `quantity`, `total_cost`, `created_at`, `updated_at`) VALUES
(4, 3, 1, 1, '5.00', '2020-04-15 20:53:04', '2020-04-15 20:53:04'),
(5, 4, 5, 1, '5.00', '2020-04-16 00:48:27', '2020-04-16 00:48:27'),
(6, 3, 2, 1, '6.00', '2020-04-16 19:06:13', '2020-04-16 19:06:13'),
(7, 3, 18, 1, '5.00', '2020-04-16 19:06:13', '2020-04-16 19:06:13'),
(8, 4, 5, 1, '5.00', '2020-04-16 20:39:28', '2020-04-16 20:39:28'),
(9, 4, 17, 1, '5.00', '2020-04-16 20:39:28', '2020-04-16 20:39:28'),
(10, 4, 5, 1, '5.00', '2020-04-16 20:39:42', '2020-04-16 20:39:42'),
(11, 4, 17, 1, '5.00', '2020-04-16 20:39:42', '2020-04-16 20:39:42'),
(12, 3, 2, 1, '6.00', '2020-04-16 20:43:07', '2020-04-16 20:43:07'),
(13, 3, 18, 1, '5.00', '2020-04-16 20:43:07', '2020-04-16 20:43:07'),
(14, 3, 2, 1, '6.00', '2020-04-16 20:49:10', '2020-04-16 20:49:10'),
(15, 3, 18, 1, '5.00', '2020-04-16 20:49:10', '2020-04-16 20:49:10'),
(16, 3, 18, 1, '5.00', '2020-04-16 20:49:27', '2020-04-16 20:49:27'),
(17, 3, 18, 1, '5.00', '2020-04-16 20:52:36', '2020-04-16 20:52:36'),
(18, 5, 3, 1, '1.00', '2020-04-24 23:32:37', '2020-04-24 23:32:37'),
(19, 5, 19, 1, '5.00', '2020-04-24 23:32:37', '2020-04-24 23:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_num` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `tax_num`, `address1`, `address2`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'ABC', '123456', '123 Street', NULL, '0911111111', '2020-01-21 20:41:28', '2020-01-21 20:41:28'),
(2, 'DEF', '56789', '456 Street', NULL, '0922222222', '2020-01-21 20:41:28', '2020-01-21 20:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `humans`
--

CREATE TABLE `humans` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_day` date NOT NULL,
  `birth` date NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idnum` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `humans`
--

INSERT INTO `humans` (`id`, `name`, `job`, `start_day`, `birth`, `gender`, `address1`, `address2`, `phone`, `idnum`, `photo`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2016-10-01', '1980-01-01', 'male', 'Admin address', NULL, '090000000', '123456789', NULL, '', '2020-01-21 20:41:29', '2020-01-21 20:41:29'),
(2, 'Business', 'business', '2016-10-01', '1980-02-02', 'female', 'Business address', NULL, '090000001', '123456780', NULL, '', '2020-01-21 20:41:29', '2020-01-21 20:41:29'),
(3, 'Employee', 'employee', '2016-10-01', '1980-02-02', 'male', 'Employee address', NULL, '090000002', '123456781', NULL, '', '2020-01-21 20:41:29', '2020-01-21 20:41:29'),
(4, 'Inventory Manager', 'manager', '2016-10-01', '1980-02-02', 'male', 'Manager address', NULL, '090000003', '123456782', NULL, '', '2020-01-21 20:41:29', '2020-01-21 20:41:29'),
(5, 'dewi', 'Admin ', '2020-01-24', '1995-01-19', 'female', 'asd', 'qwe', '12312312312', '123123123123', NULL, '', '2020-01-24 00:17:05', '2020-01-24 00:17:05'),
(6, 'Ogy', 'Staff IT', '2018-02-17', '1994-08-26', 'male', 'asddfgqwe', '', '0812134111', '222456789123', NULL, '', '2020-02-17 01:47:06', '2020-02-17 01:47:06'),
(7, 'gule', 'produksi', '2020-05-16', '2020-05-20', 'male', 'jl in aja dulu', 'dsda', '01234567896', '12345678989', '', '', '2020-05-08 21:23:19', '2020-05-08 21:23:19'),
(8, 'kambing', 'produksi', '2020-05-23', '2020-05-20', 'female', 'jl amsmda', 'dsda', '123456789', '12345678910', '', 'Tritan', '2020-05-08 22:01:38', '2020-05-08 22:01:38'),
(9, 'mamunah', 'STAFF MARKETING', '2020-05-12', '2006-05-03', 'female', 'JL KOKOA', 'DALO', '1234567890', '1234546987', '1589265552Dewi.jpg', 'Tania Tidar', '2020-05-11 19:33:58', '2020-05-11 23:39:12'),
(10, 'kiki', 'Staff Purchasing', '2020-05-04', '2006-05-30', 'female', 'jl mu jl ku', 'jl komp', '9876543210', '0909090909', '1589265459agam.png', 'Tania Tidar', '2020-05-11 23:37:27', '2020-05-11 23:37:39'),
(11, 'ello', 'Staff Purchasing', '2020-05-01', '1994-04-25', 'female', 'jl muy u', 'jl', '9876541232', '01256347898', '1589266362ella.png', 'Tania Tidar', '2020-05-11 23:51:14', '2020-05-11 23:52:42'),
(12, 'popo', 'Staff Purchasing', '2020-05-13', '2020-05-04', 'male', 'kookok', 'joi', '7894561423', '123545879', '', 'Tania Tidar', '2020-05-12 00:02:49', '2020-05-12 00:02:49'),
(13, 'aadam', 'Staff Digital Marketing', '2020-05-01', '1990-05-15', 'male', 'hyuysaa', '', '98745446321', '1234567987', '1589267444angga.png', 'Tania Tidar', '2020-05-12 00:09:57', '2020-05-12 00:10:44'),
(15, 'bram', 'Staff Purchasing', '2020-05-03', '1987-05-04', 'female', 'freeefire', '', '9876543215', '365214789', '1589268457edu.jpeg', 'Tania Tidar', '2020-05-12 00:26:21', '2020-05-12 00:27:37'),
(18, 'logue', 'Staff Finance', '2020-05-06', '1995-05-10', 'male', 'rewtw', '', '1234569874', '4563217898', '1589270226LINGGA.jpg', 'Tania Tidar', '2020-05-12 00:57:06', '2020-05-12 00:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(10) UNSIGNED NOT NULL,
  `human_id` int(10) UNSIGNED NOT NULL,
  `annual_leave` tinyint(3) UNSIGNED NOT NULL DEFAULT 10,
  `avai_annual_leave` tinyint(3) UNSIGNED NOT NULL DEFAULT 10,
  `unpaid_leave` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `human_id`, `annual_leave`, `avai_annual_leave`, `unpaid_leave`, `created_at`, `updated_at`) VALUES
(1, 5, 10, 10, 0, '2020-01-24 00:17:05', '2020-01-24 00:17:05'),
(2, 6, 10, 10, 0, '2020-02-17 01:47:06', '2020-02-17 01:47:06'),
(3, 7, 10, 10, 0, '2020-05-08 21:23:19', '2020-05-08 21:23:19'),
(4, 8, 10, 10, 0, '2020-05-08 22:01:38', '2020-05-08 22:01:38'),
(5, 9, 10, 10, 0, '2020-05-11 19:33:58', '2020-05-11 19:33:58'),
(6, 10, 10, 10, 0, '2020-05-11 23:37:27', '2020-05-11 23:37:27'),
(7, 11, 10, 10, 0, '2020-05-11 23:51:14', '2020-05-11 23:51:14'),
(8, 12, 10, 10, 0, '2020-05-12 00:02:49', '2020-05-12 00:02:49'),
(9, 13, 10, 10, 0, '2020-05-12 00:09:57', '2020-05-12 00:09:57'),
(11, 15, 10, 10, 0, '2020-05-12 00:26:21', '2020-05-12 00:26:21'),
(14, 18, 10, 10, 0, '2020-05-12 00:57:07', '2020-05-12 00:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` decimal(5,2) UNSIGNED NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `vat_rate` tinyint(3) UNSIGNED NOT NULL DEFAULT 5,
  `vat` tinyint(1) NOT NULL DEFAULT 1,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name`, `cost`, `unit_id`, `vat_rate`, `vat`, `quantity`, `created_at`, `updated_at`) VALUES
(1, '350ml Bottle', '1.10', 3, 5, 1, 100, '2020-01-21 20:41:28', '2020-01-31 02:22:21'),
(2, '550ml Bottle', '1.50', 3, 5, 1, 0, '2020-01-21 20:41:28', '2020-01-21 20:41:28'),
(3, '20l Hod', '0.20', 2, 5, 1, 0, '2020-01-21 20:41:28', '2020-01-21 20:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_08_09_160444_create_roles_table', 1),
(4, '2016_08_12_064435_add_photo_id_to_users', 1),
(5, '2016_08_12_091028_create_photos_table', 1),
(6, '2016_08_25_085612_create_humans_table', 1),
(7, '2016_08_30_103456_create_salaries_table', 1),
(8, '2016_09_09_095707_create_leaves_table', 1),
(9, '2016_09_19_104036_create_orders_table', 1),
(10, '2016_09_19_105348_create_customers_table', 1),
(11, '2016_09_19_105401_create_products_table', 1),
(12, '2016_09_20_071642_create_units_table', 1),
(13, '2016_09_21_141501_create_materials_table', 1),
(14, '2016_09_24_151342_create_purchases_table', 1),
(15, '2016_09_24_151401_create_suppliers_table', 1),
(16, '2016_11_22_051212_create_order_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `vat` tinyint(1) NOT NULL,
  `total_cost` decimal(10,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `submit` tinyint(1) NOT NULL DEFAULT 0,
  `deliver` tinyint(1) NOT NULL DEFAULT 0,
  `delivery_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `user_id`, `vat`, `total_cost`, `note`, `status`, `submit`, `deliver`, `delivery_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 7, 0, '35.00', '', 1, 1, 1, '2020-02-07', '2020-01-30 00:48:40', '2020-01-31 02:24:20', NULL),
(2, 2, 7, 1, '26.25', '', 1, 1, 1, '2020-02-07', '2020-01-31 02:06:16', '2020-01-31 02:41:17', NULL),
(3, 1, 7, 1, '21.00', '', 0, 1, 0, '2020-02-03', '2020-01-31 02:22:56', '2020-01-31 02:23:12', '2020-01-31 02:23:12'),
(4, 1, 7, 0, '66.00', '', 0, 0, 0, '2020-04-08', '2020-04-06 23:42:48', '2020-04-17 00:25:38', NULL),
(5, 1, 7, 0, '20.00', '', 0, 0, 0, '1970-01-01', '2020-04-09 00:36:51', '2020-04-09 00:36:51', NULL),
(6, 1, 7, 0, '240.00', '', 0, 1, 0, '2020-04-14', '2020-04-12 19:47:56', '2020-04-13 02:42:39', NULL),
(7, 1, 7, 0, '240.00', '', 0, 0, 0, '2020-04-15', '2020-04-12 19:51:44', '2020-04-12 19:51:44', NULL),
(8, 1, 7, 0, '132.00', '', 0, 0, 0, '2020-04-13', '2020-04-12 19:55:30', '2020-04-12 19:55:31', NULL),
(9, 1, 7, 0, '72.00', '', 0, 0, 0, '2020-04-13', '2020-04-12 19:57:48', '2020-04-12 19:57:48', NULL),
(10, 1, 7, 0, '10.00', '', 0, 1, 0, '2020-04-13', '2020-04-12 20:01:36', '2020-04-13 02:42:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `total_cost` decimal(10,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `total_cost`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 7, '35.00', '2020-01-30 00:48:40', '2020-01-30 00:48:40'),
(2, 2, 1, 5, '26.25', '2020-01-31 02:06:16', '2020-01-31 02:06:16'),
(3, 3, 1, 4, '21.00', '2020-01-31 02:22:56', '2020-01-31 02:22:56'),
(7, 5, 4, 1, '15.00', '2020-04-09 00:36:51', '2020-04-09 00:36:51'),
(8, 5, 15, 1, '5.00', '2020-04-09 00:36:51', '2020-04-09 00:36:51'),
(9, 6, 4, 12, '180.00', '2020-04-12 19:47:56', '2020-04-12 19:47:56'),
(10, 6, 12, 12, '60.00', '2020-04-12 19:47:56', '2020-04-12 19:47:56'),
(11, 7, 4, 12, '180.00', '2020-04-12 19:51:44', '2020-04-12 19:51:44'),
(12, 7, 16, 12, '60.00', '2020-04-12 19:51:44', '2020-04-12 19:51:44'),
(13, 8, 2, 12, '72.00', '2020-04-12 19:55:30', '2020-04-12 19:55:30'),
(14, 8, 13, 12, '60.00', '2020-04-12 19:55:30', '2020-04-12 19:55:30'),
(15, 9, 2, 12, '72.00', '2020-04-12 19:57:48', '2020-04-12 19:57:48'),
(16, 10, 10, 1, '5.00', '2020-04-12 20:01:36', '2020-04-12 20:01:36'),
(17, 10, 19, 1, '5.00', '2020-04-12 20:01:36', '2020-04-12 20:01:36'),
(18, 1, 3, 1, '1.00', '2020-04-12 21:07:48', '2020-04-12 21:07:48'),
(19, 1, 19, 1, '5.00', '2020-04-12 21:07:48', '2020-04-12 21:07:48'),
(22, 4, 2, 11, '66.00', '2020-04-17 00:25:38', '2020-04-17 00:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `file`, `created_at`, `updated_at`) VALUES
(1, '1581931418GUNADI WHITE.jpg', '2020-02-17 02:23:38', '2020-02-17 02:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `material_id` int(10) UNSIGNED NOT NULL,
  `cost` decimal(5,2) UNSIGNED NOT NULL,
  `vat_rate` tinyint(4) NOT NULL DEFAULT 5,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `extra` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `material_id`, `cost`, `vat_rate`, `unit_id`, `quantity`, `extra`, `created_at`, `updated_at`) VALUES
(1, 'C 80 X 0.75', 1, '5.00', 5, 1, 0, 0, '2020-01-21 20:41:28', '2020-01-31 02:24:06'),
(2, 'C 75 X 1.00', 2, '6.00', 5, 1, 0, 0, '2020-01-21 20:41:28', '2020-01-21 20:41:28'),
(3, 'C 75 X 0.75', 3, '1.00', 5, 1, 0, 0, '2020-01-21 20:41:28', '2020-01-21 20:41:28'),
(4, 'C 75 X 0.60', 4, '15.00', 5, 1, 0, 0, '2020-04-07 17:00:00', '2020-04-07 17:00:00'),
(5, 'RENG KECIL 0.45', 1, '5.00', 5, 1, 0, 0, '2020-04-07 17:00:00', '2020-04-07 17:00:00'),
(6, 'RENG BESAR 0.45', 1, '5.00', 5, 1, 0, 0, '2020-01-16 08:10:00', '2020-04-07 17:00:00'),
(7, 'C 75 X 0.75\r\n', 1, '0.00', 5, 1, 0, 0, '2020-01-16 08:10:00', '2020-04-07 17:00:00'),
(8, 'C 75 X 1.00', 1, '5.00', 5, 1, 0, 0, '2020-01-16 08:10:00', '2020-04-07 17:00:00'),
(9, 'C 75 X 0.60', 1, '5.00', 5, 1, 0, 0, '2020-01-16 08:10:00', '2020-04-07 17:00:00'),
(10, 'RENG KECIL 0.40', 1, '5.00', 5, 1, 0, 0, '2020-01-16 08:10:00', '2020-04-07 17:00:00'),
(11, 'RENG BESAR 0.40', 1, '5.00', 5, 1, 0, 0, '2020-01-16 08:10:00', '2020-04-07 17:00:00'),
(12, 'Gypsum IGP', 1, '5.00', 5, 2, 0, 0, '2020-04-07 17:00:00', '2020-04-07 17:00:00'),
(13, 'Gypsum Gyproc', 1, '5.00', 5, 2, 0, 0, '2020-01-16 08:10:00', '2020-04-07 17:00:00'),
(14, 'Kalsi 3.5', 1, '5.00', 5, 2, 0, 0, '2020-04-07 17:00:00', '2020-04-07 17:00:00'),
(15, 'Gypsum Star', 1, '5.00', 5, 2, 0, 0, '2020-01-16 08:10:00', '2020-04-07 17:00:00'),
(16, 'Gypsum Applus', 1, '5.00', 5, 2, 0, 0, '2020-04-07 17:00:00', '2020-04-07 17:00:00'),
(17, 'Gypsum ….', 1, '5.00', 5, 2, 0, 0, '2020-01-16 08:10:00', '2020-04-07 17:00:00'),
(18, 'SPANDEK TBL = 0,25', 1, '5.00', 5, 2, 0, 0, '2020-01-16 08:10:00', '2020-04-07 17:00:00'),
(19, 'SPANDEK TBL = 0,30', 1, '5.00', 5, 2, 0, 0, '2020-04-07 17:00:00', '2020-04-07 17:00:00'),
(20, 'SPANDEK TBL = 0,35', 1, '5.00', 5, 2, 0, 0, '2020-01-16 08:10:00', '2020-04-07 17:00:00'),
(21, 'SPANDEK TBL = 0,40', 1, '5.00', 5, 2, 0, 0, '2020-04-07 17:00:00', '2020-04-07 17:00:00'),
(22, 'HOLLOW 2 X 4', 1, '5.00', 5, 1, 0, 0, '2020-01-16 08:10:00', '2020-04-07 17:00:00'),
(23, 'HOLLOW 4 X 4', 1, '5.00', 5, 1, 0, 0, '2020-04-07 17:00:00', '2020-04-07 17:00:00'),
(24, 'GENTENG PASIR', 1, '5.00', 5, 2, 0, 0, '2020-01-16 08:10:00', '2020-04-07 17:00:00'),
(25, 'GENTENG METAL\r\n', 1, '5.00', 5, 2, 0, 0, '2020-04-07 17:00:00', '2020-04-07 17:00:00'),
(26, 'Talang Datar 60 X..', 1, '5.00', 5, 3, 0, 0, '2020-01-16 08:10:00', '2020-04-07 17:00:00'),
(27, 'Talang Datar 90 X..', 1, '5.00', 5, 3, 0, 0, '2020-04-07 17:00:00', '2020-04-08 17:00:00'),
(28, 'Talang Datar 120 X..', 1, '5.00', 5, 3, 0, 0, '2020-01-16 08:10:00', '2020-04-07 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `material_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `material_id`, `quantity`, `supplier_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 100, 1, 1, '2020-01-31 02:00:10', '2020-01-31 02:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-01-21 20:41:28', '2020-01-21 20:41:28'),
(2, 'manager', '2020-01-21 20:41:29', '2020-01-21 20:41:29'),
(3, 'business', '2020-01-21 20:41:29', '2020-01-21 20:41:29'),
(4, 'bfm', '2020-01-21 20:41:29', '2020-01-21 20:41:29'),
(5, 'unknown', '2020-01-21 20:41:29', '2020-01-21 20:41:29'),
(6, 'HRD', '2020-04-05 17:00:00', '2020-04-05 17:00:00'),
(7, 'outlet', '2020-04-16 17:00:00', '2020-04-16 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `human_id` int(10) UNSIGNED NOT NULL,
  `basic_salary` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `nondeduct_leave` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deduct_leave` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `change` int(11) NOT NULL DEFAULT 0,
  `dates` date NOT NULL DEFAULT '2020-01-01',
  `total` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `human_id`, `basic_salary`, `nondeduct_leave`, `deduct_leave`, `change`, `dates`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 0, NULL, NULL, 0, '2020-01-01', 0, '2020-01-21 20:55:07', '2020-01-21 20:55:07'),
(2, 2, 0, NULL, NULL, 0, '2020-01-01', 0, '2020-01-21 20:55:07', '2020-01-21 20:55:07'),
(3, 3, 0, NULL, NULL, 0, '2020-01-01', 0, '2020-01-21 20:55:07', '2020-01-21 20:55:07'),
(4, 4, 0, NULL, NULL, 0, '2020-01-01', 0, '2020-01-21 20:55:07', '2020-01-21 20:55:07'),
(5, 5, 0, NULL, NULL, 0, '2020-01-01', 0, '2020-01-24 00:17:05', '2020-01-24 00:17:05'),
(6, 1, 0, NULL, NULL, 0, '2020-02-01', 0, '2020-02-06 02:28:19', '2020-02-06 02:28:19'),
(7, 2, 0, NULL, NULL, 0, '2020-02-01', 0, '2020-02-06 02:28:19', '2020-02-06 02:28:19'),
(8, 3, 0, NULL, NULL, 0, '2020-02-01', 0, '2020-02-06 02:28:19', '2020-02-06 02:28:19'),
(9, 4, 0, NULL, NULL, 0, '2020-02-01', 0, '2020-02-06 02:28:19', '2020-02-06 02:28:19'),
(10, 5, 0, NULL, NULL, 0, '2020-02-01', 0, '2020-02-06 02:28:19', '2020-02-06 02:28:19'),
(11, 6, 0, NULL, NULL, 0, '2020-01-01', 0, '2020-02-17 01:47:06', '2020-02-17 01:47:06'),
(12, 7, 0, NULL, NULL, 0, '2020-01-01', 0, '2020-05-08 21:23:19', '2020-05-08 21:23:19'),
(13, 8, 0, NULL, NULL, 0, '2020-01-01', 0, '2020-05-08 22:01:38', '2020-05-08 22:01:38'),
(14, 9, 0, NULL, NULL, 0, '2020-01-01', 0, '2020-05-11 19:33:58', '2020-05-11 19:33:58'),
(15, 10, 0, NULL, NULL, 0, '2020-01-01', 0, '2020-05-11 23:37:27', '2020-05-11 23:37:27'),
(16, 11, 0, NULL, NULL, 0, '2020-01-01', 0, '2020-05-11 23:51:14', '2020-05-11 23:51:14'),
(17, 12, 0, NULL, NULL, 0, '2020-01-01', 0, '2020-05-12 00:02:49', '2020-05-12 00:02:49'),
(18, 13, 0, NULL, NULL, 0, '2020-01-01', 0, '2020-05-12 00:09:57', '2020-05-12 00:09:57'),
(20, 15, 0, NULL, NULL, 0, '2020-01-01', 0, '2020-05-12 00:26:21', '2020-05-12 00:26:21'),
(23, 18, 0, NULL, NULL, 0, '2020-01-01', 0, '2020-05-12 00:57:07', '2020-05-12 00:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `sques`
--

CREATE TABLE `sques` (
  `id_Q` int(11) NOT NULL,
  `knowledge` int(11) NOT NULL,
  `wspeed` int(11) NOT NULL,
  `wsolu` int(11) NOT NULL,
  `wqual` int(11) NOT NULL,
  `wpress` int(11) NOT NULL,
  `teamwork` int(11) NOT NULL,
  `communicate` int(11) NOT NULL,
  `responbility` int(11) NOT NULL,
  `wdicipline` int(11) NOT NULL,
  `initiative` int(11) NOT NULL,
  `creativity` int(11) NOT NULL,
  `honestly` int(11) NOT NULL,
  `obedience` int(11) NOT NULL,
  `loyality` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address1`, `address2`, `phone`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Supplier 1', 'Supplier 1 Address', NULL, '12345678', NULL, '2020-01-21 20:41:28', '2020-01-21 20:41:28'),
(2, 'Supplier 2', 'Supplier 2 Address', NULL, '23456789', NULL, '2020-01-21 20:41:28', '2020-01-21 20:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `equi` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `equi`, `created_at`, `updated_at`) VALUES
(1, 'btg', 24, '2020-01-21 20:41:28', '2020-01-21 20:41:28'),
(2, 'lbr', 1, '2020-01-21 20:41:28', '2020-01-21 20:41:28'),
(3, 'mtr', 40, '2020-01-21 20:41:28', '2020-01-21 20:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT 5,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `role_id`, `is_active`, `remember_token`, `created_at`, `updated_at`, `photo_id`) VALUES
(5, 'ogy', 'ogi.rians3@gmail.com', 'ogy', '$2y$10$BlBxcNiOQe200aVdJ/nE1OHtTG0iYjO76.cVTjRT5Hi2gULlFJqSq', 1, 1, 'Co9jeWS12aRF13rfXBabMazFF8rKeKe8aAECGpnjLy0H16B8k3Vm8vNVftOB', '2020-01-22 21:19:49', '2020-01-22 21:19:49', NULL),
(7, 'yahya', 'yahyatrison@gmail.com', 'yahya', '$2y$10$SCU13pT82yvPRUxjFZj72O/BdKnt.s4qdOsamlPYko/87xSgR67sO', 3, 1, 'HglCZtraSkHacxwVeEqVzFLnGCtI38auKRes2Ik4d6OvfNTdeqkNwxqAcaq7', '2020-01-23 01:19:02', '2020-01-23 01:19:02', NULL),
(8, 'Aisyah', 'aisyahmawar@gmail.com', 'aisyah', '$2y$10$bJwdJY0ZZN8oSWpTdjngvO9Te6EPfAzLNpkGjRaDGkdrXquOdo2km', 2, 1, 'fHXdE1B8aBPOnzg9Eq6N6Tv2wLz7qEJfEYP3XE2hGeOkkJcEurfiyEkSO6bJ', '2020-01-23 02:24:41', '2020-01-23 02:24:41', NULL),
(9, 'Intan', 'intan@gmail.com', 'Intan', '$2y$10$c9UaRofIoe.cTNDBsSafte0fnJ/ibXlxfGGXqap42CvdF3Bmz8bgu', 4, 1, 'Ab3AGQMtMJ9nUG80XeTBU5XNXejLa8TTcwAehTdyvOIbvZVNm8QlbAAzPtOm', '2020-01-23 02:26:43', '2020-02-17 02:23:38', 1),
(10, 'Lingga', 'Lingga@gmail.com', 'Lingga', '$2y$10$5SgMYffdAwpJlm7o9WwUxO/gte3SYFBsiN2XtebPi9uZe2s5dtm7i', 5, 1, 'HjdmLGIgDNsls2qtLi5No8GMRjIMN6oB4PMhyfDPqGF9DA6cAuvFpaBtR8UP', '2020-01-23 02:31:36', '2020-01-23 20:15:23', NULL),
(11, 'Dewi', 'dewi@gmail.com', 'dewi', '$2y$10$00XUwkPTLIwM7BbMhCkileuXRGOC1ofkJLtYSEvakfQ5sTh0Vuue6', 4, 1, 'u253xvH1grfxI38dSTUzxXdMds2orGRqTZPiUj6KgPEFDPaTqzD9oTj8aD5P', '2020-01-30 20:22:49', '2020-01-30 20:22:49', NULL),
(12, 'qwe', 'asd@zxc', 'qwe', '$2y$10$SKIUvppPALS.ukDzmwGDauxQQQRstIrPRmBCATRJmVoV0QP5z83HG', 4, 1, NULL, '2020-02-24 02:14:17', '2020-02-24 02:14:17', NULL),
(13, 'Erli Pratiwi', 'HRD_Erli@indoberka.com', 'HRD_Erli', '$2y$10$qUilTdpmZhfeKE0IXoXfhupE/UsMx7scM/R0I1p7EnWV9dSJVCERm', 6, 1, 'jtzw5KVIHG9EIhAcrXHcFN51jzQVl08qWZtZCiAGYUrkFy95oa8XMr56i8kv', '2020-04-05 21:28:00', '2020-04-05 21:28:00', NULL),
(15, 'Tritan', 'tritan@indoberka.com', 'Tritan', '$2y$10$0Hz6qsWteL6GV4zP3qXVwOrZ1vx3UEQppKuDPH4IQOpKlUabHSEm6', 7, 1, 'ncbcjkTRKZHtjMmW1PDdj6x2sUq0zyXeF9uTEdKkZIC1sQ0ePikssDlJgZQN', '2020-04-20 21:29:01', '2020-04-20 21:29:01', NULL),
(16, 'Menggala', 'Menggala@indoberka.com', 'Menggala', '$2y$10$k1FBtYwJaTip.AMn/P4QU.1UgHUSH3HUtRYqXSY0Io.G52A9xWlAm', 7, 1, 'VNRJVqLutC2cltkI1CK8wP4llhnib8i54zijwt48iK1CzhuRbPh3tLPBBC8W', '2020-04-21 00:40:16', '2020-04-21 00:40:16', NULL),
(17, 'Kania710', 'Kania710@indoberka.com', 'Kania710', '$2y$10$o4OUDZkBrpAC16wFh0.U4eqz3yBjcThAzg2QW0LuR3mjG47tCND7e', 7, 1, 'lvyIFxAiFKYeB24XoFK6lMYUAU7gzHnUBmQN0BoGWwIcmpxf3WBFF30dKBWV', '2020-04-21 00:57:17', '2020-04-21 00:57:17', NULL),
(18, 'ABM', 'abm@indoberka.com', 'ABM', '$2y$10$kF1x4cQ9fJnkExFs9EflbeH4DUkFNYS4tXqFq9KIB5uRKieboIPrS', 7, 1, 'p0oPfpVKdQE0ZQIpXFnQViagCsy9S02EfrSY79Vm9cwMNGWdEI3QhPme8yac', '2020-04-21 01:37:36', '2020-04-21 01:37:36', NULL),
(19, 'Tania Lombok', 'Tanialombok@indoberka.com', 'Tania', '$2y$10$EbbN0UUqeVXnTC1hdAQNZuVA5jXPJA/v7Cihm3Hnm9UPOSGDWFu3S', 7, 1, 'JuWIkIuNFJ55YnIdUAzlZkNJDvDhf3LWz6dshP6oQgE3NnGGA2QTN6XmQNAZ', '2020-04-21 01:53:36', '2020-05-03 19:41:21', NULL),
(20, 'BKJ', 'bkj@indoberka.com', 'BKJ', '$2y$10$ia5k2AgbNO/UBriFudL8cOxZauKg80OFgXTDxk4pSo7r5FeRJcx6C', 7, 1, '01mK3uoxVE44NNN2WT0nvPdqpuUedqT2qDQ0zvGwsFz6SlNXsAd1YTRPJCc4', '2020-04-21 02:35:34', '2020-04-21 02:35:34', NULL),
(21, 'Manna', 'manna@indoberka.com', 'Manna', '$2y$10$/YKnMFILPjUgVXgx50Q0rOv98tAsTMpVU77vLZEf4eOkOmCHvhTD2', 7, 1, 'BzBHd0Ow4eYXRMlP45uo5RfLt59lAjm3Pygy2NjwwxstQ67SHeITsuF7Uoqv', '2020-04-21 02:42:11', '2020-04-21 02:42:11', NULL),
(22, 'Tania Tidar', 'taniatidar@indoberka.com', 'Tidar', '$2y$10$O7/3yAgMhnXoYWuffGMxGuTS8x9dImnHyicZmkHeAhdrGBivXu64a', 7, 1, 'wfaH4ZHmBtpBtqVCLfs0pwfrEN1my7QMXKLPtS4JVpv5umLE3P4amse0zytS', '2020-04-21 21:29:40', '2020-05-03 19:41:55', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calc`
--
ALTER TABLE `calc`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `chps`
--
ALTER TABLE `chps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chp_details`
--
ALTER TABLE `chp_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`),
  ADD UNIQUE KEY `customers_tax_num_unique` (`tax_num`);

--
-- Indexes for table `humans`
--
ALTER TABLE `humans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `humans_phone_unique` (`phone`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaves_human_id_index` (`human_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_human_id_index` (`human_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_phone_unique` (`phone`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calc`
--
ALTER TABLE `calc`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `humans`
--
ALTER TABLE `humans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_human_id_foreign` FOREIGN KEY (`human_id`) REFERENCES `humans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_human_id_foreign` FOREIGN KEY (`human_id`) REFERENCES `humans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
