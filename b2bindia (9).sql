-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 07:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b2bindia`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Create', 'create', '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(2, 'Read', 'read', '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(3, 'Update', 'update', '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(4, 'Delete', 'delete', '2022-09-07 00:47:40', '2022-09-07 00:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandLogo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coverImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortDescription` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longDescription` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metaTitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metaKeyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metaDescription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortDescription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metaTitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metaKeyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metaDescription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longDescription` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnailImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iconImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coverImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `shortDescription`, `metaTitle`, `metaKeyword`, `metaDescription`, `longDescription`, `thumbnailImage`, `iconImage`, `coverImage`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'aaax', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2022-09-13 03:37:25', '2022-09-15 03:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `customersdetails`
--

CREATE TABLE `customersdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customersdetails`
--

INSERT INTO `customersdetails` (`id`, `user_id`, `number`, `customer_name`, `email`, `city`, `state`, `country`, `address1`, `address2`, `zipcode`, `reference`, `created_at`, `updated_at`) VALUES
(19, 38, '701663794', 'chirag pariyani', 'parihani46@gmail.com', 'ahmedabad', 'GJ', 'India', 'b/6', 'opp', '382470', 'mahipal', '2022-10-13 06:44:58', '2022-10-13 06:44:58'),
(20, 39, '02016637926', 'chirag pariyani', 'pdriyani46@gmail.com', 'ahmedabad', 'GJ', 'India', 'b/6 mahipal nagar', 'opp chandkheda rly station', '382470', 'chirag bhai', '2022-10-13 06:45:17', '2022-10-13 06:45:17'),
(21, 43, '7016637671122220000', 'chirag pariyani', NULL, NULL, 'GJ', 'India', NULL, NULL, NULL, NULL, '2022-11-05 03:09:02', '2022-11-05 03:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', '2022-09-07 06:17:40', '2022-09-07 06:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_12_120905_create_roles_table', 1),
(6, '2022_03_12_120924_create_modules_table', 1),
(7, '2022_03_12_124200_create_actions_table', 1),
(8, '2022_03_12_125016_create_role_module_table', 1),
(9, '2022_03_12_125927_create_user_role_table', 1),
(10, '2022_03_12_130957_create_user_permission_table', 1),
(11, '2022_03_14_112601_create_permissions_table', 1),
(12, '2022_03_21_095721_create_categories_table', 1),
(13, '2022_03_29_123254_create_language_table', 1),
(14, '2022_04_01_050603_create_vendor_details_table', 1),
(15, '2022_04_16_121026_create_brand_table', 1),
(16, '2022_05_08_114943_create_attributes_table', 1),
(17, '2022_05_08_164455_create_attribute_values_table', 1),
(18, '2022_09_07_085232_create_customers_table', 2),
(19, '2022_09_07_115701_add_columns_to_customersdetails', 3),
(20, '2022_09_07_120539_add_columns_to_customersdetails', 4),
(21, '2022_09_21_074146_create_order_table', 5),
(22, '2022_09_21_091146_create_order_details_table', 6),
(23, '2022_09_21_093500_create_order_measurement_table', 7),
(24, '2022_09_21_095633_create_order_images_table', 8),
(25, '2022_09_23_121917_add_column_to_customersdetails', 9),
(26, '2022_10_07_091012_create_order_images_table', 10),
(27, '2022_10_07_125304_create_table_order_measurement', 11),
(28, '2022_10_07_131201_create_table_order_measurement', 12),
(29, '2022_10_12_060858_create_table_task_detail', 13),
(30, '2022_10_20_093316_create_order_measurement_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Modules', 'modules', '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(2, 'Dashboard', 'dashboard', '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(3, 'Users', 'users', '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(4, 'Roles', 'roles', '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(5, 'Language', 'language', '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(6, 'Category', 'category', '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(7, 'Customers', 'customers', '2022-09-07 00:54:36', '2022-09-07 00:54:36'),
(8, 'vendors', 'Vendors', '2022-09-07 03:01:07', '2022-09-07 03:01:07'),
(9, 'Order', 'order', '2022-09-08 07:49:50', '2022-09-09 00:08:10'),
(10, 'Measurement', 'measurement', '2022-10-04 00:06:04', '2022-10-04 00:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `completed_date` date NOT NULL,
  `total_amt` decimal(10,2) NOT NULL,
  `advance_amt` decimal(10,2) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_products` int(11) NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `delivery_status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `order_no`, `customer_id`, `customer_name`, `order_date`, `delivery_date`, `completed_date`, `total_amt`, `advance_amt`, `comment`, `num_products`, `status`, `delivery_status`, `added_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, '1001', 19, 'chirag pariyani', '2022-10-13', '2022-10-22', '2022-10-22', '20200.00', '0.00', '<p>wdsdsdgngn</p>', 3, '0', '0', NULL, NULL, '2022-10-13 06:46:20', '2022-11-14 03:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_total` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_name`, `rate`, `quantity`, `item_total`, `status`, `added_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(7, 3, '-pajama', '5000.00', 4, 20000, 0, NULL, NULL, '2022-10-13 12:16:20', '2022-11-14 03:22:20'),
(8, 3, 'hell', '100.00', 2, 200, 0, NULL, NULL, '2022-10-13 12:16:20', '2022-11-14 03:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_images`
--

CREATE TABLE `order_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_detail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_images`
--

INSERT INTO `order_images` (`id`, `order_detail_id`, `image`, `added_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 7, '1665663481.jpg', NULL, NULL, '2022-10-13 06:48:01', '2022-10-13 06:48:01'),
(2, 7, '1665663485.png', NULL, NULL, '2022-10-13 06:48:05', '2022-10-13 06:48:05'),
(3, 8, '1666249526.jpg', NULL, NULL, '2022-10-20 01:35:26', '2022-10-20 01:35:26'),
(4, 7, '1666249549.png', NULL, NULL, '2022-10-20 01:35:49', '2022-10-20 01:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_measurement`
--

CREATE TABLE `order_measurement` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_detail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `b_shoulder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_length` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_chest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_waist` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_chest_up` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_Sleeves` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_mori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_mundo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_magismory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_front_neck` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_back_neck` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_shoulder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_length` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_chest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_waist` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_chest_up` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_Sleeves` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_mori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_mundo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_magismory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_front_neck` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_back_neck` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_full_length` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_kotho` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `k_other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_length` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_mori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_nefo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_seat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_thai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_knee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pe_length` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pe_nefo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pe_seat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pe_gher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pe_typeof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pe_other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `huk` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `pad` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sample` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `design` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_measurement`
--

INSERT INTO `order_measurement` (`id`, `order_detail_id`, `b_shoulder`, `b_length`, `b_chest`, `b_waist`, `b_chest_up`, `b_Sleeves`, `b_mori`, `b_mundo`, `b_magismory`, `b_front_neck`, `b_back_neck`, `b_other`, `k_shoulder`, `k_length`, `k_chest`, `k_waist`, `k_chest_up`, `k_Sleeves`, `k_mori`, `k_mundo`, `k_magismory`, `k_front_neck`, `k_back_neck`, `k_full_length`, `k_kotho`, `k_other`, `p_length`, `p_mori`, `p_nefo`, `p_seat`, `p_thai`, `p_knee`, `p_other`, `pe_length`, `pe_nefo`, `pe_seat`, `pe_gher`, `pe_typeof`, `pe_other`, `remarks`, `huk`, `pad`, `sample`, `design`, `added_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 7, '10', '12', '12', '41', '12', '12', '45', '44', '25', '20', '42', '22', '11', '4', '45', '40', '02', '25', '55', '44', '44', '74', '54', '74', '41', '12', '12', '12', '02', '12', '21', '21', '21', '12', '44', '45', '45', '47', '55', '45 chirag pariyani', '1', '0', '1', '0', 12, 25, '2022-10-20 09:57:03', '2022-10-20 05:20:45'),
(2, NULL, 'sdsad', 'sdsad', 'sxc', 'xcd', 'dfdf', 'dfvcx', 'cxved', 'fvc', 'dffd', 'vcv', 'cv', 'vcv', 'vcvcvv', 'cvc', NULL, 'vcv', 'c', NULL, 'cvcv', 'cv', NULL, 'cv', 'c', NULL, 'vcv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '1', '0', NULL, NULL, '2022-10-20 06:15:15', '2022-10-20 06:15:15'),
(3, NULL, 'aafd', NULL, NULL, 'fdsfdsfdsfds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '1', '0', NULL, NULL, '2022-10-20 06:17:18', '2022-10-20 06:17:18'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45 chirag pariyani', '1', '0', '1', '0', NULL, NULL, '2022-10-20 06:21:07', '2022-10-20 06:21:07'),
(5, NULL, 'swfdsaf', NULL, NULL, 'dsfdsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '1', '0', '1', NULL, NULL, '2022-10-20 06:29:40', '2022-10-20 06:29:40'),
(6, NULL, 'fdsygfd', 'fgdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '1', '0', NULL, NULL, '2022-10-20 06:31:09', '2022-10-20 06:31:09'),
(7, 8, 'dfds', 'fsdfds', 'sdf', 'fdsdf', 'dfs', 'sdfs', 'sdf', 'sdf', 'dsfds', 'fsdf', 'dsf', 'df', NULL, NULL, NULL, NULL, NULL, NULL, 'sdfdsf', 'dsfdsf', 'sdfd', 'sdfsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dsfdf', NULL, NULL, NULL, NULL, NULL, 'sdfds', '0', '1', '0', '1', NULL, NULL, '2022-10-20 06:33:03', '2022-10-20 06:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`user_id`, `module_id`, `action_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 1, 2, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 1, 3, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 1, 4, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 2, 1, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 2, 2, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 2, 3, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 2, 4, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 3, 1, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 3, 2, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 3, 3, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 3, 4, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 4, 1, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 4, 2, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 4, 3, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 4, 4, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 5, 1, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 5, 2, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 5, 3, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 5, 4, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 6, 4, '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(1, 7, 1, NULL, NULL),
(1, 7, 2, NULL, NULL),
(1, 7, 3, NULL, NULL),
(1, 7, 4, NULL, NULL),
(1, 1, 1, NULL, NULL),
(1, 1, 2, NULL, NULL),
(1, 1, 3, NULL, NULL),
(1, 1, 4, NULL, NULL),
(1, 2, 1, NULL, NULL),
(1, 2, 2, NULL, NULL),
(1, 2, 3, NULL, NULL),
(1, 2, 4, NULL, NULL),
(1, 3, 1, NULL, NULL),
(1, 3, 2, NULL, NULL),
(1, 3, 3, NULL, NULL),
(1, 3, 4, NULL, NULL),
(1, 4, 1, NULL, NULL),
(1, 4, 2, NULL, NULL),
(1, 4, 3, NULL, NULL),
(1, 4, 4, NULL, NULL),
(1, 5, 1, NULL, NULL),
(1, 5, 2, NULL, NULL),
(1, 5, 3, NULL, NULL),
(1, 5, 4, NULL, NULL),
(1, 6, 4, NULL, NULL),
(1, 7, 1, NULL, NULL),
(1, 7, 2, NULL, NULL),
(1, 7, 3, NULL, NULL),
(1, 7, 4, NULL, NULL),
(1, 9, 1, NULL, NULL),
(1, 9, 2, NULL, NULL),
(1, 9, 3, NULL, NULL),
(1, 9, 4, NULL, NULL),
(1, 6, 3, NULL, NULL),
(1, 6, 2, NULL, NULL),
(1, 6, 1, NULL, NULL),
(1, 10, 1, NULL, NULL),
(1, 10, 2, NULL, NULL),
(1, 10, 3, NULL, NULL),
(1, 10, 4, NULL, NULL),
(30, 10, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super-admin', '2022-09-07 00:47:40', '2022-09-07 00:47:40'),
(2, 'Sales', 'sales', '2022-10-06 03:35:50', '2022-10-06 03:35:50'),
(3, 'Daying', 'daying', '2022-10-06 03:36:09', '2022-10-06 03:36:09'),
(4, 'Master', 'master', '2022-10-06 03:36:21', '2022-10-06 03:36:21'),
(5, 'Khat work', 'khatwork', '2022-10-06 03:36:30', '2022-10-06 03:36:30'),
(6, 'Pita Work', 'pitawork', '2022-10-06 03:36:38', '2022-10-06 03:36:38'),
(7, 'Tailor', 'tailor', '2022-10-06 03:36:45', '2022-10-06 03:36:45'),
(8, 'Finishing Work', 'finishingwork', '2022-10-06 03:36:53', '2022-10-06 03:36:53'),
(9, 'Iron', 'iron', '2022-10-06 03:37:04', '2022-10-06 03:37:04'),
(10, 'Qc', 'qc', '2022-10-06 03:37:09', '2022-10-06 03:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `role_module`
--

CREATE TABLE `role_module` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_module`
--

INSERT INTO `role_module` (`role_id`, `module_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 2, NULL, NULL),
(1, 3, NULL, NULL),
(1, 4, NULL, NULL),
(1, 5, NULL, NULL),
(1, 6, NULL, NULL),
(1, 7, NULL, NULL),
(1, 8, NULL, NULL),
(1, 9, NULL, NULL),
(1, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_task_detail`
--

CREATE TABLE `table_task_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_detail_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(11) NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_task_detail`
--

INSERT INTO `table_task_detail` (`id`, `order_detail_id`, `user_id`, `status`, `added_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(63, 7, 30, '1', NULL, NULL, '2022-10-13 06:46:38', '2022-10-13 07:03:36'),
(64, 7, 31, '0', NULL, NULL, '2022-10-13 06:46:45', '2022-10-13 06:46:45'),
(65, 8, 31, '0', NULL, NULL, '2022-10-13 06:46:54', '2022-10-13 06:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `isAdminUser` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `avatar`, `email`, `phone`, `email_verified_at`, `password`, `status`, `isAdminUser`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sup_admin', 'Jaykishan Patel', '', 'myemail@mail.com', '9909999099', NULL, '$2y$10$bYMtYeU.T9ZRuah4mVdngOw8j9NyU7CV6EX86zBzFF71SDZGbGPhS', 1, 2, NULL, '2022-09-07 06:17:40', '2022-10-10 06:12:46'),
(7, 'pariyani74@gmail.com', 'chirag ', NULL, 'pariyani74@gmail.com', '0701663745', NULL, '$2y$10$4uT6U9Kxt/q780WIqLdriu9wMu6qodhj/6vInTHVgMhZt0zvCEAp6', 1, 0, NULL, '2022-09-08 03:32:06', '2022-09-27 02:27:24'),
(8, 'pariyanu46@gmail.com', 'chirag ', NULL, 'pariyanu46@gmail.com', '07016637929', NULL, '$2y$10$eDRAkru/FGk.WJGYwyTSk.1LQDtsx6.mkVGUWEzmRnO9CDEYyeWL6', 1, 0, NULL, '2022-09-08 03:38:23', '2022-09-15 04:58:35'),
(12, 'pariyanddu46@gmail.com', 'priya ', NULL, 'pariyanddu46@gmail.com', '07016637977', NULL, '$2y$10$wvNlo8zDfA74SOmTnWcrKugmDNO0IKT/EK5w6HFtXHsGwv5m3.54y', 1, 0, NULL, '2022-09-08 06:13:40', '2022-09-08 06:13:40'),
(14, 'parani46@gmail.com', 'chiragdd ', NULL, 'parani46@gmail.com', '0701663794545', NULL, '$2y$10$jQpvxuOioYTzhY9HOeCY2OFcIFU9zTybsvaysF99rUkMf21tuFFAe', 1, 0, NULL, '2022-09-08 06:15:13', '2022-09-08 06:15:13'),
(15, 'parffrfni46@gmail.com', 'chirag ', NULL, 'parffrfni46@gmail.com', '07016637444', NULL, '$2y$10$rcrmEs2auqmGM.WUwJKdBOBheVt8UqHqPghPfTv7dx9XBUO3tf5ky', 1, 0, NULL, '2022-09-08 06:18:17', '2022-09-08 06:18:26'),
(17, 'pareyani46@gmail.com', 'chirag pariyani', NULL, 'pareyani46@gmail.com', '07016637921', NULL, '$2y$10$CukgFVeXyKl5awiXk5SY1uYwl6iNrxtfBw4/PGd/GeZH2P5myvxRy', 1, 0, NULL, '2022-09-08 06:35:54', '2022-09-08 06:35:54'),
(18, 'pariyani46@gmail.com', 'chirag pariyani', NULL, 'pariyani46@gmail.com', '07016637926', NULL, '$2y$10$PV2ozegOSyXlI9hTWET67eKKgUz6T8avYWdG3CNKJiGiVpZiUjlzW', 1, 0, NULL, '2022-10-06 03:20:35', '2022-10-06 03:20:35'),
(19, 'pargfani46@gmail.com', 'chirag pariyani', NULL, 'pargfani46@gmail.com', '07016637955', NULL, '$2y$10$uhzpGU3n.0ZyTbGtNr8fwOxeuoi1Qkwtp.NGUyJacNNC5IQehafM.', 1, 0, NULL, '2022-10-06 03:21:21', '2022-10-06 03:21:21'),
(20, 'pariyan246@gmail.com', 'chirag pariyani', NULL, 'pariyan246@gmail.com', '070166374', NULL, '$2y$10$BmFaK8RueLR9nHM/PRMgaOP0ch4yJWmlWxrLGx0qKz3iiDu216zJC', 1, 0, NULL, '2022-10-06 03:21:39', '2022-10-06 03:21:39'),
(21, 'pariyan546@gmail.com', 'chirag pariyani', NULL, 'pariyan546@gmail.com', '070166373', NULL, '$2y$10$t2AYoaB5gz5Eid2HEFzCFOwPS7aRLHQcWNAccuEhB5Y0sWm5qXOte', 1, 0, NULL, '2022-10-06 03:23:29', '2022-10-06 03:23:29'),
(22, 'pariy2n546@gmail.com', 'chirag pariyani', NULL, 'pariy2n546@gmail.com', '070166375', NULL, '$2y$10$EYvT5g8nkKWYe2QC4YSJ5O/JCiTUt1/D55fX8QHr.C9.fKZNkTixC', 1, 0, NULL, '2022-10-06 03:26:52', '2022-10-06 03:26:52'),
(23, 'sales1', 'sales-1', NULL, 'sales1@gmail.com', '1321231231', NULL, '$2y$10$QyiHd4bM4PaY4/nRryXUf.mcST0ULGbJeZT6b5fEqzgqWQjHaxKKi', 1, 1, NULL, '2022-10-06 03:40:06', '2022-10-06 03:40:06'),
(24, 'pariyan846@gmail.com', 'chirag pariyani', NULL, 'pariyan846@gmail.com', '07016633926', NULL, '$2y$10$K0HUBGRiuxUFVS/qmbz9AuUtn2p1FUeS3laO6eWJ/9bFaL85MuXUW', 1, 0, NULL, '2022-10-06 07:14:03', '2022-10-06 07:14:03'),
(25, 'pariyan746@gmail.com', 'mahipal nagar', NULL, 'pariyan746@gmail.com', '07016637946', NULL, '$2y$10$Lv40HjkmnzMmsGzY57eONeTjZU7Pz8p981jDeM08idNNMIvkK5rV6', 1, 0, NULL, '2022-10-06 07:19:04', '2022-10-12 00:01:21'),
(26, 'padiyani46@gmail.com', 'mahipal nagar', NULL, 'padiyani46@gmail.com', '07011637921', NULL, '$2y$10$fmJvqhYeKDYBu8pMoDP1G.fBanZA5Ee5Ld2hruYBNwfQQhXqViQTm', 1, 0, NULL, '2022-10-06 07:21:48', '2022-10-12 00:01:10'),
(27, 'pariyani426@gmail.com', 'chirag pariyani', NULL, 'pariyani426@gmail.com', '7016637926', NULL, '$2y$10$GLcTc2tBRB/JoWVKdnam7ezZ8WYH6MIQvUWuM9UpjdelPPvCFqqP2', 1, 0, NULL, '2022-10-06 07:57:34', '2022-10-12 00:01:14'),
(29, 'pariyani26@gmail.com', 'chirag pariyani', NULL, 'pariyani26@gmail.com', '17016637926', NULL, '$2y$10$FU0QK5Q40T2sStN.itYkT.aUpeCk8j73e4BuRHa.DnGWVBElaO0cq', 1, 0, NULL, '2022-10-07 01:33:34', '2022-10-07 01:33:34'),
(30, 'daying1', 'daying-1', NULL, 'daying1@gmail.com', '123456789', NULL, '$2y$10$Y.BaJuWQ2vbQr3MsGjET5OhwHk9pfod3imUJd4qT2nP8XgDQnfhMW', 1, 1, NULL, '2022-10-07 04:32:58', '2022-10-07 04:32:58'),
(31, 'master1', 'master-1', NULL, 'master1@gmail.com', '234567890', NULL, '$2y$10$VsUD/1nHPTrSSYX4QDCNM.Zz9XELXmS3DDdAXHrYHBRod5GIN0Zzy', 1, 1, NULL, '2022-10-07 04:33:28', '2022-10-07 04:33:28'),
(32, 'khatwork1', 'khat work-1', NULL, 'khatwork1@gmail.com', '345678901', NULL, '$2y$10$R4Ih42lahuE3/lsr68AWV.xXRqa7KdBYKx3pmULBqeEOqS4OgSt56', 1, 1, NULL, '2022-10-07 04:34:13', '2022-10-07 04:34:13'),
(33, 'pitawork1', 'pita work-1', NULL, 'pitawork1@gmail.com', '456789123', NULL, '$2y$10$RyM.TrhQt5f.Dy237TuQPea1TYNhl91TItIR/M5rjbzU8B2NAJ.8S', 1, 1, NULL, '2022-10-07 04:34:52', '2022-10-07 04:45:38'),
(34, 'tailor1', 'tailor-1', NULL, 'tailor1@gmail.com', '789123456', NULL, '$2y$10$L4L/FDocCTJzDyFJ0s9/vOh3NkPbYoLJa/tyrpWVY8P8nRZTOIjyu', 1, 1, NULL, '2022-10-07 04:37:00', '2022-10-07 04:37:00'),
(35, 'finishingwork1', 'Finishing work-1', NULL, 'finishingwork1@gmail.com', '147852369', NULL, '$2y$10$HMOs05H0CS6OHdEPaBB9SuuzLgQ2Ex8YnEN.yLB1KSWcAkTLBmfd6', 1, 1, NULL, '2022-10-07 04:38:26', '2022-10-07 04:38:26'),
(36, 'iron1', 'iron-1', NULL, 'iron1@gmail.com', '258963147', NULL, '$2y$10$gMtjfSdX3R0QnPNq1JvltuIc/ySeDgAg6MZNvR2yAgWYq6GkFFo1C', 1, 1, NULL, '2022-10-07 04:39:07', '2022-10-07 04:39:07'),
(37, 'qc1', 'Qc-1', NULL, 'qc1@gmail.com', '369852147', NULL, '$2y$10$X5vVJy4PWni3IpNryxqTGO5MNsDXYrqQEpDHj8a32tH4QiuPkKg8K', 1, 1, NULL, '2022-10-07 04:40:22', '2022-10-07 04:40:22'),
(38, 'parihani46@gmail.com', 'chirag pariyani', NULL, 'parihani46@gmail.com', '701663794', NULL, '$2y$10$KnJgpH2IIUoeleHuPd57Mu5MpGesDGZOwEYnS544EGtmGMAStf.X2', 1, 0, NULL, '2022-10-13 06:44:58', '2022-10-13 06:44:58'),
(39, 'pdriyani46@gmail.com', 'chirag pariyani', NULL, 'pdriyani46@gmail.com', '02016637926', NULL, '$2y$10$2tQE2sz/5LYaqwInEtoGueSZFDqCBlWcQb.Lmm9biAjqGU5lzQQZS', 1, 0, NULL, '2022-10-13 06:45:17', '2022-10-13 06:45:17'),
(40, NULL, 'fgf fgfg', NULL, NULL, '101010101010', NULL, '$2y$10$yhTFD5srqv3JfNmdhTvigOjO.evbQrKc3U3m.hQMqaHcPQxWtvC9G', 1, 0, NULL, '2022-11-05 03:05:39', '2022-11-05 03:05:39'),
(41, NULL, 'chirag pariyani', NULL, NULL, '70166376711', NULL, '$2y$10$tOGFYe0a76nOolKC1YJwPeVpLL1rDQWLCfyTKlHao1mDFVZZRGTwS', 1, 0, NULL, '2022-11-05 03:06:28', '2022-11-05 03:06:28'),
(42, NULL, 'chirag pariyani', NULL, NULL, '701663767112222', NULL, '$2y$10$82wA77RRx2AM14DCtGjQoue6/ejE4pjuaq/vNaYHkV14a9W0MxM.i', 1, 0, NULL, '2022-11-05 03:07:52', '2022-11-05 03:07:52'),
(43, NULL, 'chirag pariyani', NULL, NULL, '7016637671122220000', NULL, '$2y$10$Wi30mXd/ertcG2PtizPGBey/lLCe1cDuMVQeaSxS3p1v/If/LWyTK', 1, 0, NULL, '2022-11-05 03:09:02', '2022-11-05 03:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE `user_permission` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `action_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(23, 2, NULL, NULL),
(30, 3, NULL, NULL),
(31, 4, NULL, NULL),
(32, 5, NULL, NULL),
(33, 6, NULL, NULL),
(34, 7, NULL, NULL),
(35, 8, NULL, NULL),
(36, 9, NULL, NULL),
(37, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendordetails`
--

CREATE TABLE `vendordetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `panNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gstNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `websiteLink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `actions_name_unique` (`name`),
  ADD UNIQUE KEY `actions_slug_unique` (`slug`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attributes_name_unique` (`name`),
  ADD UNIQUE KEY `attributes_slug_unique` (`slug`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_values_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `customersdetails`
--
ALTER TABLE `customersdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customersdetails_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_name_unique` (`name`),
  ADD UNIQUE KEY `languages_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modules_name_unique` (`name`),
  ADD UNIQUE KEY `modules_slug_unique` (`slug`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_order_no_unique` (`order_no`),
  ADD KEY `order_customer_id_foreign` (`customer_id`),
  ADD KEY `order_added_by_foreign` (`added_by`),
  ADD KEY `order_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_added_by_foreign` (`added_by`),
  ADD KEY `order_details_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `order_images`
--
ALTER TABLE `order_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_images_order_detail_id_foreign` (`order_detail_id`),
  ADD KEY `order_images_added_by_foreign` (`added_by`),
  ADD KEY `order_images_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `order_measurement`
--
ALTER TABLE `order_measurement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_measurement_order_detail_id_foreign` (`order_detail_id`),
  ADD KEY `order_measurement_added_by_foreign` (`added_by`),
  ADD KEY `order_measurement_updated_by_foreign` (`updated_by`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_module`
--
ALTER TABLE `role_module`
  ADD PRIMARY KEY (`role_id`,`module_id`),
  ADD KEY `role_module_module_id_foreign` (`module_id`);

--
-- Indexes for table `table_task_detail`
--
ALTER TABLE `table_task_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_task_detail_order_detail_id_foreign` (`order_detail_id`),
  ADD KEY `table_task_detail_added_by_foreign` (`added_by`),
  ADD KEY `table_task_detail_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`user_id`,`module_id`,`action_id`),
  ADD KEY `user_permission_module_id_foreign` (`module_id`),
  ADD KEY `user_permission_action_id_foreign` (`action_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `vendordetails`
--
ALTER TABLE `vendordetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendordetails_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customersdetails`
--
ALTER TABLE `customersdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_images`
--
ALTER TABLE `order_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_measurement`
--
ALTER TABLE `order_measurement`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `table_task_detail`
--
ALTER TABLE `table_task_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `vendordetails`
--
ALTER TABLE `vendordetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customersdetails`
--
ALTER TABLE `customersdetails`
  ADD CONSTRAINT `customersdetails_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customersdetails` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_images`
--
ALTER TABLE `order_images`
  ADD CONSTRAINT `order_images_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_images_order_detail_id_foreign` FOREIGN KEY (`order_detail_id`) REFERENCES `order_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_images_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_measurement`
--
ALTER TABLE `order_measurement`
  ADD CONSTRAINT `order_measurement_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_measurement_order_detail_id_foreign` FOREIGN KEY (`order_detail_id`) REFERENCES `order_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_measurement_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `role_module`
--
ALTER TABLE `role_module`
  ADD CONSTRAINT `role_module_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_module_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `table_task_detail`
--
ALTER TABLE `table_task_detail`
  ADD CONSTRAINT `table_task_detail_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `table_task_detail_order_detail_id_foreign` FOREIGN KEY (`order_detail_id`) REFERENCES `order_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_task_detail_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD CONSTRAINT `user_permission_action_id_foreign` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_permission_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_permission_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendordetails`
--
ALTER TABLE `vendordetails`
  ADD CONSTRAINT `vendordetails_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
