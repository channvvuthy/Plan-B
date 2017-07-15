-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2017 at 03:15 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emps`
--

-- --------------------------------------------------------

--
-- Table structure for table `bases`
--

CREATE TABLE `bases` (
  `id` int(10) UNSIGNED NOT NULL,
  `variation_id` int(10) UNSIGNED DEFAULT NULL,
  `pattern_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `version_name` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `version_id` int(200) NOT NULL,
  `type_id` int(11) NOT NULL,
  `type_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `column` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used_by_id` int(11) NOT NULL,
  `used` int(10) UNSIGNED DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `your_url` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leader_base_url` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leader_check_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leader_check_result` int(10) UNSIGNED DEFAULT NULL,
  `leader_check_problem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_checker_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_checker_result` int(11) DEFAULT NULL,
  `first_checker_problem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_checker_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_checker_result` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_checker_problem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `get_it` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `day` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `base_layout`
--

CREATE TABLE `base_layout` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `layout_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `base_layout`
--

INSERT INTO `base_layout` (`id`, `base_id`, `layout_id`, `created_at`, `updated_at`) VALUES
(33, 26, 1, NULL, NULL),
(34, 26, 2, NULL, NULL),
(35, 26, 3, NULL, NULL),
(36, 26, 4, NULL, NULL),
(37, 26, 5, NULL, NULL),
(38, 26, 6, NULL, NULL),
(39, 26, 7, NULL, NULL),
(40, 26, 8, NULL, NULL),
(41, 26, 9, NULL, NULL),
(42, 26, 10, NULL, NULL),
(43, 26, 11, NULL, NULL),
(44, 26, 12, NULL, NULL),
(45, 26, 13, NULL, NULL),
(46, 26, 14, NULL, NULL),
(47, 26, 15, NULL, NULL),
(48, 26, 16, NULL, NULL),
(49, 26, 17, NULL, NULL),
(50, 26, 18, NULL, NULL),
(51, 26, 19, NULL, NULL),
(52, 26, 20, NULL, NULL),
(53, 33, 8, NULL, NULL),
(54, 33, 9, NULL, NULL),
(55, 33, 10, NULL, NULL),
(56, 33, 11, NULL, NULL),
(57, 33, 12, NULL, NULL),
(58, 33, 13, NULL, NULL),
(59, 33, 14, NULL, NULL),
(60, 33, 15, NULL, NULL),
(61, 33, 16, NULL, NULL),
(62, 33, 17, NULL, NULL),
(63, 33, 18, NULL, NULL),
(64, 33, 19, NULL, NULL),
(65, 33, 20, NULL, NULL),
(66, 33, 21, NULL, NULL),
(67, 33, 22, NULL, NULL),
(68, 33, 23, NULL, NULL),
(69, 33, 24, NULL, NULL),
(70, 33, 25, NULL, NULL),
(71, 33, 26, NULL, NULL),
(72, 33, 27, NULL, NULL),
(73, 32, 12, NULL, NULL),
(74, 32, 13, NULL, NULL),
(75, 32, 14, NULL, NULL),
(76, 32, 15, NULL, NULL),
(77, 32, 16, NULL, NULL),
(78, 32, 17, NULL, NULL),
(79, 32, 18, NULL, NULL),
(80, 32, 19, NULL, NULL),
(81, 32, 20, NULL, NULL),
(82, 32, 21, NULL, NULL),
(83, 32, 22, NULL, NULL),
(84, 32, 23, NULL, NULL),
(85, 32, 24, NULL, NULL),
(86, 32, 25, NULL, NULL),
(87, 32, 26, NULL, NULL),
(88, 32, 27, NULL, NULL),
(89, 31, 9, NULL, NULL),
(90, 31, 10, NULL, NULL),
(91, 31, 11, NULL, NULL),
(92, 31, 12, NULL, NULL),
(93, 31, 13, NULL, NULL),
(94, 31, 14, NULL, NULL),
(95, 31, 15, NULL, NULL),
(96, 31, 16, NULL, NULL),
(97, 31, 17, NULL, NULL),
(98, 31, 18, NULL, NULL),
(99, 31, 19, NULL, NULL),
(100, 31, 20, NULL, NULL),
(101, 31, 21, NULL, NULL),
(102, 31, 22, NULL, NULL),
(103, 31, 23, NULL, NULL),
(104, 31, 24, NULL, NULL),
(105, 31, 25, NULL, NULL),
(106, 31, 26, NULL, NULL),
(107, 31, 27, NULL, NULL),
(108, 27, 8, NULL, NULL),
(109, 27, 9, NULL, NULL),
(110, 27, 10, NULL, NULL),
(111, 27, 11, NULL, NULL),
(112, 27, 12, NULL, NULL),
(113, 27, 13, NULL, NULL),
(114, 27, 14, NULL, NULL),
(115, 27, 15, NULL, NULL),
(116, 28, 9, NULL, NULL),
(117, 28, 10, NULL, NULL),
(118, 28, 11, NULL, NULL),
(119, 28, 12, NULL, NULL),
(120, 28, 13, NULL, NULL),
(121, 28, 14, NULL, NULL),
(122, 28, 15, NULL, NULL),
(123, 28, 16, NULL, NULL),
(124, 28, 17, NULL, NULL),
(125, 29, 9, NULL, NULL),
(126, 29, 10, NULL, NULL),
(127, 29, 11, NULL, NULL),
(128, 29, 12, NULL, NULL),
(129, 29, 13, NULL, NULL),
(130, 29, 14, NULL, NULL),
(131, 29, 15, NULL, NULL),
(132, 29, 16, NULL, NULL),
(133, 29, 17, NULL, NULL),
(134, 30, 7, NULL, NULL),
(135, 30, 8, NULL, NULL),
(136, 30, 9, NULL, NULL),
(137, 30, 10, NULL, NULL),
(138, 30, 11, NULL, NULL),
(139, 30, 12, NULL, NULL),
(140, 30, 13, NULL, NULL),
(141, 30, 14, NULL, NULL),
(142, 30, 15, NULL, NULL),
(143, 30, 16, NULL, NULL),
(144, 30, 17, NULL, NULL),
(145, 34, 2, NULL, NULL),
(146, 34, 3, NULL, NULL),
(147, 34, 4, NULL, NULL),
(148, 34, 5, NULL, NULL),
(149, 34, 6, NULL, NULL),
(150, 34, 7, NULL, NULL),
(151, 34, 8, NULL, NULL),
(152, 34, 9, NULL, NULL),
(153, 34, 10, NULL, NULL),
(154, 34, 11, NULL, NULL),
(155, 34, 12, NULL, NULL),
(156, 34, 13, NULL, NULL),
(157, 34, 14, NULL, NULL),
(158, 34, 15, NULL, NULL),
(159, 34, 16, NULL, NULL),
(160, 34, 17, NULL, NULL),
(161, 34, 18, NULL, NULL),
(162, 34, 19, NULL, NULL),
(163, 34, 20, NULL, NULL),
(164, 34, 21, NULL, NULL),
(165, 34, 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exports`
--

CREATE TABLE `exports` (
  `id` int(11) NOT NULL,
  `Base_Name` varchar(100) NOT NULL,
  `Layout_Name` varchar(100) NOT NULL,
  `type` varchar(110) NOT NULL,
  `version` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `active`, `type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(13, 'Srey  Neth', 1, 'first', 'Group that create template to support SEO ', 1, '2017-06-30 20:16:13', '2017-06-30 20:55:34'),
(14, 'Vannda', 1, 'first', 'Group first create template for SEO', 1, '2017-06-30 20:58:35', '2017-06-30 20:58:35'),
(15, 'Seng Muyti', 1, 'first', 'Group create first template', 1, '2017-06-30 20:58:54', '2017-06-30 20:58:54'),
(16, 'Bong Bach', 1, 'base', 'Group create main template to group fist to generate 20 another website', 1, '2017-06-30 20:59:25', '2017-06-30 20:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `layouts`
--

CREATE TABLE `layouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layouts`
--

INSERT INTO `layouts` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'S111', '<p>for base three column</p>', 1, '2017-04-20 07:54:15', '2017-06-30 21:37:51'),
(2, 'S01-078', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(3, ' S02-079', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(4, ' S03-080', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(5, ' S04-081', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(6, ' S25-082', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(7, ' S26-083', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(8, ' S27-084', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(9, ' S28-085', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(10, ' S05-040', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(11, ' S06-041', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(12, ' S07-042', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(13, ' S10-043', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(14, ' S13-044', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(15, ' S14-045', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(16, ' S29-066', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(17, ' S30-067', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(18, ' S32-068', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(19, ' S34-069', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(20, ' S37-070', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(21, ' S38-071', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(22, ' S54-040', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(23, ' S56-041', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(24, ' S57-042', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(25, ' S59-043', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(26, ' S54-050', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25'),
(27, ' S53-070', '<p>Layout For This Month</p>', 1, '2017-04-28 01:23:25', '2017-04-28 01:23:25');

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
(2, '2017_03_28_145412_create_table_users', 1),
(3, '2017_03_28_145653_create_table_roles', 1),
(4, '2017_03_28_145909_create_table_role_user', 1),
(5, '2017_03_28_151020_create_table_groups', 2),
(6, '2017_03_28_151050_create_table_group_user', 2),
(7, '2017_04_01_145554_create_settings_table', 3),
(8, '2017_04_11_140951_create_variations_table', 4),
(9, '2017_04_17_070038_create_patterns_table', 5),
(10, '2017_04_20_144255_create_layouts_table', 6),
(11, '2017_04_21_033837_create_user_patterns_table', 7),
(12, '2017_04_22_231818_create_paths_table', 8),
(13, '2017_04_25_142843_create_bases_table', 9),
(14, '2017_05_06_025728_create_versions_table', 10),
(15, '2017_05_06_025749_create_types_table', 10),
(16, '2017_06_15_135743_create_sessions_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(222) NOT NULL,
  `category` varchar(100) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `top_page` varchar(50) NOT NULL,
  `sub_page` varchar(50) NOT NULL,
  `dateline` varchar(100) NOT NULL,
  `base_name` varchar(100) NOT NULL,
  `layout` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `member_name` varchar(100) NOT NULL,
  `leader_check_result` varchar(255) NOT NULL,
  `leader_check_description` varchar(255) NOT NULL,
  `qc_check_name` varchar(255) NOT NULL,
  `qc_check_result` varchar(255) NOT NULL,
  `qc_check_description` varchar(255) NOT NULL,
  `qc_second_check_name` varchar(255) NOT NULL,
  `qc_second_check_result` varchar(255) NOT NULL,
  `qc_second_check_description` varchar(22) NOT NULL,
  `date_upload` varchar(22) NOT NULL,
  `upload_status` varchar(22) NOT NULL,
  `group_name` varchar(222) NOT NULL,
  `old_url` varchar(255) NOT NULL,
  `date_ready` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `isdelete` int(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `category`, `keyword`, `top_page`, `sub_page`, `dateline`, `base_name`, `layout`, `type`, `member_id`, `member_name`, `leader_check_result`, `leader_check_description`, `qc_check_name`, `qc_check_result`, `qc_check_description`, `qc_second_check_name`, `qc_second_check_result`, `qc_second_check_description`, `date_upload`, `upload_status`, `group_name`, `old_url`, `date_ready`, `status`, `isdelete`, `created_at`, `updated_at`) VALUES
(1, '2339242', '', '', '', '', '5/17/2017', '1105_VSSS_161201_A2_2MI', 'S41-034', '', 1, 'Sovanraksmey', '1', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 20:13:21', '2017-06-10 03:13:21'),
(2, '2339243', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S49-046', '', NULL, 'Sovanraksmey', '3', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(3, '2339244', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S52-074', '', NULL, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(4, '2339245', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S62-076', '', NULL, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(5, '2339246', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S63-075', '', NULL, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(6, '2339247', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S64-058', '', NULL, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(7, '2339248', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S50-041', '', NULL, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(8, '2339252', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S65-068', '', NULL, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(9, '2339301', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S61-069', '', NULL, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(10, '2339302', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S51-068', '', NULL, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(11, '2339303', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S60-042', '', NULL, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(12, '2339304', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S13-019', '', NULL, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(13, '2339305', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S14-020', '', NULL, 'Eingtray', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(14, '2339306', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S18-021', '', 14, 'Eingtray', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 19:56:25', '2017-06-10 02:56:25'),
(15, '2339309', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S20-022', '', NULL, 'Eingtray', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(16, '2339310', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S21-023', '', NULL, 'Eingtray', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(17, '2339311', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S26-008', '', NULL, 'Eingtray', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(18, '2339312', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S27-009', '', NULL, 'Piseth', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(19, '2339313', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S28-013', '', NULL, 'Piseth', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(20, '2339314', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S29-011', '', NULL, 'Piseth', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(21, '2339315', '', '', '', '', '5/17/2017', '1117_VSSS_161213_E3_2C', 'S30-012', '', NULL, 'Piseth', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(22, '2339316', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S05-079', '', NULL, 'Piseth', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(23, '2339317', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S06-080', '', NULL, 'Piseth', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(24, '2339318', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S07-081', '', NULL, 'Piseth', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(25, '2339319', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S01-082', '', NULL, 'Piseth', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(26, '2339320', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S26-083', '', NULL, 'Piseth', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(27, '2339341', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S27-084', '', NULL, 'Piseth', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(28, '2339342', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S28-085', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(29, '2339343', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S29-080', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(30, '2339344', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S10-053', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(31, '2339345', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S13-054', '', NULL, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(32, '2339370', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S14-055', '', NULL, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(33, '2339371', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S18-056', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(34, '2339372', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S20-057', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(35, '2339694', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S21-061', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(36, '2339695', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S32-073', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(37, '2339696', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S25-074', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(38, '2339697', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S34-075', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(39, '2339698', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S37-076', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(40, '2339699', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S38-077', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(41, '2339700', '', '', '', '', '5/17/2017', '1117_VSSS_161222_B2_3C', 'S39-072', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(42, '2339701', '', '', '', '', '5/17/2017', '1105_VSSS_161129_B3_2IM', 'S55-075', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(43, '2336733', '', '', '', '', '5/17/2017', '1105_VSSS_161129_B3_2IM', 'S58-045', '', NULL, 'Piseth', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-17 18:09:29', '2017-05-25 20:52:22'),
(44, '2336734', '', '', '', '', '5/17/2017', '1105_VSSS_161129_B3_2IM', 'S53-064', '', NULL, 'Piseth', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(45, '2336735', '', '', '', '', '5/17/2017', '1105_VSSS_161129_B3_2IM', 'S58-076', '', NULL, 'Piseth', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(46, '2336736', '', '', '', '', '5/17/2017', '1117_VSSS_161213_B5_2C', 'S49-046', '', NULL, 'Piseth', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(47, '2336737', '', '', '', '', '5/17/2017', '1117_VSSS_161213_B5_2C', 'S52-074', '', NULL, 'Piseth', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(48, '2336738', '', '', '', '', '5/17/2017', '1117_VSSS_161213_B5_2C', 'S62-076', '', NULL, 'Piseth', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(49, '2336739', '', '', '', '', '5/17/2017', '1117_VSSS_161213_B5_2C', 'S63-075', '', NULL, 'Piseth', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(50, '2336740', '', '', '', '', '5/17/2017', '1117_VSSS_161213_B5_2C', 'S64-058', '', NULL, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(51, '2336741', '', '', '', '', '5/17/2017', '1117_VSSS_161213_B5_2C', 'S50-041', '', NULL, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(52, '2336742', '', '', '', '', '5/17/2017', '1117_VSSS_161213_B5_2C', 'S65-068', '', NULL, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(53, '2336743', '', '', '', '', '5/17/2017', '1117_VSSS_161213_B5_2C', 'S61-069', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(54, '2336744', '', '', '', '', '5/17/2017', '1117_VSSS_161213_B5_2C', 'S51-068', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(55, '2336745', '', '', '', '', '5/17/2017', '1117_VSSS_161213_B5_2C', 'S60-042', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(56, '2336746', '', '', '', '', '5/17/2017', '1117_VSSS_161213_B5_2C', 'S13-019', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(57, '2336747', '', '', '', '', '5/17/2017', '1117_VSSS_161213_B5_2C', 'S14-020', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(58, '2336748', '', '', '', '', '5/17/2017', '1117_VSSS_161213_B5_2C', 'S18-021', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(59, '2336749', '', '', '', '', '5/17/2017', '1117_VSSS_161213_B5_2C', 'S26-008', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(60, '2336750', '', '', '', '', '5/17/2017', '1117_VSSS_161213_B5_2C', 'S27-009', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(61, '2336845', '', '', '', '', '5/18/2017', '1117_VSSS_161222_A1_2C', 'S25-028', '', 14, 'Vannak', '3', 'Very Good', '', '', '', '', '', '', '', '', 'Srey Neth', 'No changclass', '', 0, 1, '2017-06-09 22:03:15', '2017-06-10 05:03:15'),
(62, '2336846', '', '', '', '', '5/18/2017', '1117_VSSS_161222_A1_2C', 'S30-029', '', 1, 'Vannak', '1', 'Hello', '', '', '', '', '', '', '', '', 'Muyti', 'No changclass', '', 0, 1, '2017-06-09 21:49:07', '2017-06-10 04:49:07'),
(63, '2336847', '', '', '', '', '5/18/2017', '1117_VSSS_161222_A1_2C', 'S32-030', '', 14, 'Sovanraksmey', '1', 'Hello', '', '', '', '', '', '', '', '', 'Muyti', 'No changclass', '', 0, 1, '2017-06-09 21:49:38', '2017-06-10 04:49:38'),
(64, '2336848', '', '', '', '', '5/18/2017', '1117_VSSS_161222_A1_2C', 'S34-031', '', 14, 'Sovanraksmey', '', 'Hello', '', '', '', '', '', '', '', '', 'Srey Neth', 'No changclass', '', 0, 1, '2017-06-09 20:18:20', '2017-06-10 03:18:20'),
(65, '2336849', '', '', '', '', '5/18/2017', '1117_VSSS_161222_A1_2C', 'S38-033', '', 14, 'Sovanraksmey', '2', 'Hello', '', '', '', '', '', '', '', '', 'Srey Neth', 'No changclass', '', 0, 1, '2017-06-09 21:58:26', '2017-06-10 04:58:26'),
(66, '2336850', '', '', '', '', '5/18/2017', '1117_VSSS_161222_A1_2C', 'S30-075', '', 14, 'Sovanraksmey', '1', 'Hello World', '', '', '', '', '', '', '', '', 'Vanna', 'No changclass', '', 0, 1, '2017-06-09 21:59:26', '2017-06-10 04:59:26'),
(67, '2336851', '', '', '', '', '5/18/2017', '1117_VSSS_161222_A1_2C', 'S13-007', '', 14, 'Sovanraksmey', '4', '', '', '', '', '', '', '', '', '', 'Srey Neth', 'No changclass', '', 0, 1, '2017-06-09 21:57:27', '2017-06-10 04:57:27'),
(68, '2336852', '', '', '', '', '5/18/2017', '1117_VSSS_161222_A1_2C', 'S14-008', '', 14, 'Sovanraksmey', '4', '', '', '', '', '', '', '', '', '', 'Srey Neth', 'No changclass', '', 0, 1, '2017-06-09 21:58:58', '2017-06-10 04:58:58'),
(69, '2336853', '', '', '', '', '5/18/2017', '1117_VSSS_161222_A1_2C', 'S18-009', '', 14, 'Sovanraksmey', '1', 'ffdfs', '', '', '', '', '', '', '', '', 'Muyti', 'No changclass', '', 0, 1, '2017-06-09 21:58:18', '2017-06-10 04:58:18'),
(70, '2336854', '', '', '', '', '5/18/2017', '1117_VSSS_161222_A1_2C', 'S20-010', '', 0, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:51:04', '2017-06-10 01:51:04'),
(71, '2336855', '', '', '', '', '5/18/2017', '1105_VSSS_161125_B3_3C', 'S25-074', '', 0, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:51:04', '2017-06-10 01:51:04'),
(72, '2336856', '', '', '', '', '5/18/2017', '1105_VSSS_161125_B3_3C', 'S34-075', '', 0, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:51:04', '2017-06-10 01:51:04'),
(73, '2336857', '', '', '', '', '5/18/2017', '1105_VSSS_161125_B3_3C', 'S37-076', '', 0, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:51:04', '2017-06-10 01:51:04'),
(74, '2336858', '', '', '', '', '5/18/2017', '1105_VSSS_161125_B3_3C', 'S38-077', '', 0, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:51:04', '2017-06-10 01:51:04'),
(75, '2336859', '', '', '', '', '5/18/2017', '1117_VSSS_161221_A5_3C', 'S38-044', '', 0, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:51:04', '2017-06-10 01:51:04'),
(76, '2336860', '', '', '', '', '5/18/2017', '1117_VSSS_161221_A5_3C', 'S39-045', '', 0, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:51:04', '2017-06-10 01:51:04'),
(77, '2336880', '', '', '', '', '5/18/2017', '1117_VSSS_161221_A5_3C', 'S40-046', '', 0, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:51:04', '2017-06-10 01:51:04'),
(78, '2336881', '', '', '', '', '5/18/2017', '1117_VSSS_161221_A5_3C', 'S30-047', '', 0, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:51:04', '2017-06-10 01:51:04'),
(79, '2336882', '', '', '', '', '5/18/2017', '1117_VSSS_161221_A5_3C', 'S32-048', '', 0, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:51:04', '2017-06-10 01:51:04'),
(80, '2336883', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S01-046', '', 0, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:51:04', '2017-06-10 01:51:04'),
(81, '2336884', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S02-049', '', 0, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:51:04', '2017-06-10 01:51:04'),
(82, '2336885', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S03-054', '', 0, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:51:04', '2017-06-10 01:51:04'),
(83, '2336887', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S04-044', '', 0, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:51:05', '2017-06-10 01:51:05'),
(84, '2336888', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S05-045', '', 0, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:51:05', '2017-06-10 01:51:05'),
(85, '2336889', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S25-067', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(86, '2336890', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S26-077', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(87, '2336906', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S27-069', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(88, '2336907', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S28-070', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(89, '2336969', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S32-071', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(90, '2336978', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S06-002', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(91, '2336979', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S07-003', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(92, '2336992', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S10-004', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(93, '2337059', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S13-005', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(94, '2337060', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S14-006', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(95, '2337084', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S34-076', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(96, '2337085', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S29-069', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(97, '2337122', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S39-068', '', NULL, 'Sivhong', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(98, '2337123', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S30-064', '', NULL, 'Sivhong', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(99, '2337124', '', '', '', '', '5/18/2017', '1117_VSSS_161213_C1_2C', 'S37-062', '', NULL, 'Sivhong', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(100, '2337125', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S13-046', '', NULL, 'Sivhong', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(101, '2337192', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S14-047', '', NULL, 'Sivhong', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(102, '2337193', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S18-048', '', NULL, 'Sivhong', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(103, '2337194', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S20-049', '', NULL, 'Sivhong', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(104, '2337195', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S21-050', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(105, '2337196', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S25-055', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(106, '2337197', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S29-073', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(107, '2337198', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S27-074', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(108, '2337199', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S28-075', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(109, '2337200', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S26-076', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(110, '2337201', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S06-007', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(111, '2337202', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S07-008', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(112, '2337203', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S10-009', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(113, '2337204', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S01-010', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(114, '2337205', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S02-011', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(115, '2337206', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S30-038', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(116, '2337207', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S32-020', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(117, '2337208', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S34-033', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(118, '2337209', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S37-034', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(119, '2337210', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A1_2C', 'S38-035', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(120, '2337211', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S13-079', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(121, '2337212', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S14-080', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(122, '2337213', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S18-081', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(123, '2337252', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S20-082', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(124, '2337253', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S41-083', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(125, '2337254', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S44-084', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(126, '2337255', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S47-085', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(127, '2337256', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S48-083', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(128, '2337257', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S01-057', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(129, '2337258', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S02-060', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(130, '2337259', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S03-061', '', NULL, 'CHANNA', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(131, '2337264', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S04-062', '', NULL, 'CHANNA', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(132, '2337265', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S05-063', '', NULL, 'CHANNA', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(133, '2337331', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S06-064', '', NULL, 'CHANNA', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(134, '2337332', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S26-067', '', NULL, 'CHANNA', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(135, '2337333', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S27-068', '', NULL, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(136, '2337334', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S28-069', '', NULL, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(137, '2337335', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S29-070', '', NULL, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(138, '2337336', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S30-071', '', NULL, 'Sovanraksmey', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(139, '2337337', '', '', '', '', '5/18/2017', '1117_VSSS_161221_B3_3C', 'S32-072', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(140, '2337338', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S49-046', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(141, '2337339', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S52-047', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(142, '2337340', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S62-058', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(143, '2337341', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S63-071', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(144, '2337342', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S64-064', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(145, '2337344', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S61-067', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(146, '2337345', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S51-057', '', NULL, 'CHANNA', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(147, '2337346', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S60-069', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(148, '2337347', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S50-066', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(149, '2337348', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S65-073', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(150, '2337349', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S01-022', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(151, '2337350', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S02-023', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(152, '2337351', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S03-024', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(153, '2337352', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S04-025', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(154, '2337353', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S05-026', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(155, '2337354', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S26-004', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(156, '2337355', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S27-005', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(157, '2337356', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S28-006', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(158, '2337357', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S29-007', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(159, '2337362', '', '', '', '', '5/18/2017', '1105_VSSS_161221_A2_2C', 'S30-008', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(160, '2337363', '', '', '', '', '5/18/2017', '1117_VSSS_161129_B1_2IM', 'S01-041', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(161, '2336893', '', '', '', '', '5/19/2017', '1117_VSSS_161222_A1_2C', 'S10-042', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(162, '2336930', '', '', '', '', '5/19/2017', '1117_VSSS_161222_A1_2C', 'S01-043', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(163, '2336931', '', '', '', '', '5/19/2017', '1117_VSSS_161222_A1_2C', 'S02-044', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(164, '2336932', '', '', '', '', '5/19/2017', '1117_VSSS_161222_A1_2C', 'S03-045', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(165, '2336933', '', '', '', '', '5/19/2017', '1117_VSSS_161222_A1_2C', 'S04-046', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(166, '2336934', '', '', '', '', '5/19/2017', '1117_VSSS_161222_A1_2C', 'S26-071', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(167, '2336935', '', '', '', '', '5/19/2017', '1117_VSSS_161222_A1_2C', 'S27-072', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(168, '2336936', '', '', '', '', '5/19/2017', '1117_VSSS_161222_A1_2C', 'S28-073', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(169, '2336937', '', '', '', '', '5/19/2017', '1117_VSSS_161222_A1_2C', 'S29-074', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(170, '2336938', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S01-046', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:22'),
(171, '2336939', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S02-049', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(172, '2337022', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S03-054', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(173, '2337108', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S04-044', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(174, '2337109', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S05-045', '', NULL, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(175, '2337139', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S25-067', '', NULL, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(176, '2337140', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S26-077', '', NULL, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(177, '2337141', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S27-069', '', NULL, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(178, '2337142', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S28-070', '', NULL, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(179, '2337148', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S32-071', '', NULL, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(180, '2337149', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S06-002', '', NULL, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(181, '2337150', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S07-003', '', NULL, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(182, '2337151', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S10-004', '', NULL, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(183, '2337152', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S13-005', '', NULL, 'Sokleap', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(184, '2337153', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S14-006', '', NULL, 'Sivhong', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(185, '2337154', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S34-076', '', NULL, 'Sivhong', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(186, '2337155', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S29-069', '', NULL, 'Sivhong', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(187, '2337240', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S39-068', '', NULL, 'Sivhong', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(188, '2337241', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S30-064', '', NULL, 'Sivhong', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(189, '2337242', '', '', '', '', '5/19/2017', '1105_VSSS_161221_A5_2C', 'S37-062', '', NULL, 'Sivhong', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(190, '2337243', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S13-046', '', NULL, 'Sivhong', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(191, '2337244', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S14-047', '', NULL, 'Sivhong', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(192, '2337245', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S18-048', '', NULL, 'Sivhong', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(193, '2337262', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S20-049', '', NULL, 'Sivhong', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(194, '2337263', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S21-050', '', NULL, 'Sivhong', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(195, '2337591', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S25-055', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(196, '2337592', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S29-073', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(197, '2337593', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S27-074', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(198, '2337594', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S28-075', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(199, '2337595', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S26-076', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(200, '2337596', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S06-007', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(201, '2337597', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S07-008', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(202, '2337598', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S10-009', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(203, '2337599', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S01-010', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(204, '2337625', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S02-011', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(205, '2337626', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S30-038', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(206, '2337627', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S32-020', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(207, '2337628', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S34-033', '', NULL, 'SREYDEN', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(208, '2337629', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S37-034', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(209, '2337630', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A1_3C', 'S38-035', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(210, '2337638', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S13-079', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(211, '2337647', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S14-080', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(212, '2337648', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S18-081', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(213, '2337670', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S20-082', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(214, '2337671', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S41-083', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(215, '2337672', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S44-084', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(216, '2337673', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S47-085', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(217, '2337674', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S48-083', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(218, '2337680', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S01-057', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(219, '2337681', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S02-060', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(220, '2337682', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S03-061', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23');
INSERT INTO `orders` (`id`, `order_id`, `category`, `keyword`, `top_page`, `sub_page`, `dateline`, `base_name`, `layout`, `type`, `member_id`, `member_name`, `leader_check_result`, `leader_check_description`, `qc_check_name`, `qc_check_result`, `qc_check_description`, `qc_second_check_name`, `qc_second_check_result`, `qc_second_check_description`, `date_upload`, `upload_status`, `group_name`, `old_url`, `date_ready`, `status`, `isdelete`, `created_at`, `updated_at`) VALUES
(221, '2337746', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S04-062', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(222, '2337747', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S05-063', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(223, '2337748', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S06-064', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(224, '2337749', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S26-067', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(225, '2337750', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S27-068', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(226, '2337751', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S28-069', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(227, '2337752', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S29-070', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(228, '2337754', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S30-071', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(229, '2337755', '', '', '', '', '5/19/2017', '1119_VSSS_161128_A3_3C', 'S32-072', '', NULL, 'Sothea', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(230, '2337756', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S49-046', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(231, '2337757', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S52-047', '', NULL, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(232, '2337758', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S62-058', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(233, '2337759', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S63-071', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(234, '2337760', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S64-064', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(235, '2337761', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S61-067', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(236, '2337762', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S51-057', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(237, '2338658', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S60-069', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(238, '2338659', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S50-066', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(239, '2338660', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S65-073', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(240, '2338661', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S01-022', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(241, '2338662', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S02-023', '', NULL, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(242, '2338663', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S03-024', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(243, '2338664', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S04-025', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(244, '2338677', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S05-026', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(245, '2338678', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S26-004', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(246, '2338679', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S27-005', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(247, '2339039', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S28-006', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(248, '2339040', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S29-007', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(249, '2339041', '', '', '', '', '5/19/2017', '1117_VSSS_161221_A2_2C', 'S30-008', '', NULL, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-09 18:09:29', '2017-05-25 20:52:23'),
(250, '2339152', '', '', '', '', '5/19/2017', '.', 'S01-041', '', 0, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-16 15:51:33', '2017-06-16 22:51:33'),
(251, '2339153', '', '', '', '', '5/19/2017', '1112_VSSS_161201_A2_3C', 'S02-042', '', 0, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-16 15:51:33', '2017-06-16 22:51:33'),
(252, '2339154', '', '', '', '', '5/19/2017', '1112_VSSS_161201_A2_3C', 'S03-043', '', 0, 'Vannak', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-16 15:51:33', '2017-06-16 22:51:33'),
(253, '2339238', '', '', '', '', '5/19/2017', '1112_VSSS_161201_A2_3C', 'S04-054', '', 1, 'Chakriya', '', '', '', '', '', '', '', '', '', '', 'Muyti', 'No changclass', '', 0, 1, '2017-06-16 15:48:37', '2017-06-16 22:48:37'),
(254, '2339453', '', '', '', '', '5/21/2017', '1105_VSSS_161213_B3_2MI', 'S53-064', '', 1, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'Muyti', 'No changclass', '', 0, 1, '2017-06-16 15:48:37', '2017-06-16 22:48:37'),
(255, '2339579', '', '', '', '', '5/21/2017', '1105_VSSS_161213_B3_2MI', 'S58-076', '', 1, 'VUTHY', '', '', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-16 15:48:37', '2017-06-16 22:48:37'),
(256, '2339691', '', '', '', '', '5/21/2017', '1105_VSSS_161213_B3_2MI', 'S53-077', '', 0, 'VUTHY', '1', 'Please Change Design', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-16 15:51:50', '2017-06-16 22:51:50'),
(257, '2339692', '', '', '', '', '5/21/2017', '1105_VSSS_161213_B3_2MI', 'S27-010', '', 1, 'VUTHY', '4', 'Update,', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-16 15:52:05', '2017-06-16 22:52:05'),
(258, '2339723', '', '', '', '', '5/21/2017', '1105_VSSS_161213_B3_2MI', 'S28-011', '', 14, 'VUTHY', '3', 'Very Good', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 1, '2017-06-16 15:51:29', '2017-06-16 22:51:29'),
(259, '2339724', '', '', '', '', '5/21/2017', '1105_VSSS_161213_B3_2MI', 'S29-012', '', 14, 'VUTHY', '', 'Hello', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 0, '2017-06-16 15:33:30', '2017-06-16 22:33:30'),
(260, '2339733', '', '', '', '', '5/21/2017', '1105_VSSS_161213_B3_2MI', 'S30-013', '', 14, 'VUTHY', '', 'Hello', '', '', '', '', '', '', '', '', 'VANNA', 'No changclass', '', 0, 0, '2017-06-16 15:33:30', '2017-06-16 22:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `paths`
--

CREATE TABLE `paths` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path_for` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paths`
--

INSERT INTO `paths` (`id`, `user_id`, `path`, `path_for`, `description`, `active`, `created_at`, `updated_at`) VALUES
(9, 18, '\\\\192.168.0.10\\web\\6PRODUCTION\\5_BASE\\1-Member\\1-Kosal\\May\\DF', 'base', '<p>Directory for store Base Template</p>', 1, '2017-06-30 23:13:17', '2017-06-30 23:13:17'),
(10, 19, '\\\\192.168.0.10\\web\\6PRODUCTION\\5_BASE\\1-Member\\1-Kosal\\May\\DF', NULL, '<p>My directory store my template</p>', 1, '2017-06-30 23:25:23', '2017-06-30 23:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `patterns`
--

CREATE TABLE `patterns` (
  `id` int(10) UNSIGNED NOT NULL,
  `variation_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patterns`
--

INSERT INTO `patterns` (`id`, `variation_id`, `name`, `url`, `file_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pattern1', 'http://192.168.0.11/PRODUCTION/G.Base_Template/6-Base%20Var%20Sample/Feb%202017/Pattern%201/index.php', '1492608184Pattern2.zip', '<p><strong>&gt;Block variation 3-7 (No readmore)</strong><br /><strong>&gt;Pankuzu</strong><br /><strong>&gt;Home icon</strong></p>', 0, '2017-04-17 01:31:38', '2017-04-19 06:27:08'),
(2, 1, 'Pattern', 'http://192.168.0.11/PRODUCTION/G.Base_Template/6-Base%20Var%20Sample/Feb%202017/Pattern%202/index.php', '1492418244Pattern1.zip', '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;&gt;Block variation 3-7 (No readmore)\\n&gt;Pankuzu\\n&gt;Home icon&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:573,&quot;3&quot;:{&quot;1&quot;:0},&quot;5&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;6&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;7&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;8&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;12&quot;:0}\">&gt;Block variation 3-7 (No readmore)<br />&gt;Pankuzu<br />&gt;Home icon</span></p>', 1, '2017-04-17 01:37:24', '2017-04-17 01:37:24'),
(3, 1, 'Pattern3', 'http://192.168.0.11/PRODUCTION/G.Base_Template/6-Base%20Var%20Sample/Feb%202017/Pattern%203/', '1492418344Pattern3.zip', '<p><span data-sheets-value=\"{&quot;1&quot;:2,&quot;2&quot;:&quot;&gt;Block variation 3-7 (No readmore)\\n&gt;Block eyecatch (no image)&quot;}\" data-sheets-userformat=\"{&quot;2&quot;:573,&quot;3&quot;:{&quot;1&quot;:0},&quot;5&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;6&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;7&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;8&quot;:{&quot;1&quot;:[{&quot;1&quot;:2,&quot;2&quot;:0,&quot;5&quot;:{&quot;1&quot;:2,&quot;2&quot;:0}},{&quot;1&quot;:0,&quot;2&quot;:0,&quot;3&quot;:3},{&quot;1&quot;:1,&quot;2&quot;:0,&quot;4&quot;:1}]},&quot;12&quot;:0}\">&gt;Block variation 3-7 (No readmore)<br />&gt;Block eyecatch (no image)</span></p>', 1, '2017-04-17 01:39:04', '2017-04-17 01:39:04'),
(4, 2, 'Pattern 101233', 'http://192.168.0.11/PRODUCTION/G.Base_Template/6-Base%20Var%20Sample/Feb%202017/Pattern%203/', '1492744870Pattern1.zip', '<p>&gt;Block variation 3-7 (No readmore)<br />&gt;Pankuzu<br />&gt;Home icon</p>', 1, '2017-04-20 20:21:10', '2017-04-20 20:21:10'),
(5, 2, 'Pattern 12335', 'http://192.168.0.11/PRODUCTION/G.Base_Template/6-Base%20Var%20Sample/Feb%202017/Pattern%203/', '1492744893Pattern2.zip', '<p>&gt;Block variation 3-7 (No readmore)<br />&gt;Pankuzu<br />&gt;Home icon</p>', 1, '2017-04-20 20:21:33', '2017-04-20 20:21:33'),
(6, 3, 'Pattern 12094', 'http://192.168.0.11/PRODUCTION/G.Base_Template/6-Base%20Var%20Sample/Feb%202017/Pattern%203/', '1492744923Pattern3.zip', '<p>&gt;Block variation 3-7 (No readmore)<br />&gt;Pankuzu<br />&gt;Home icon</p>', 1, '2017-04-20 20:22:03', '2017-04-20 20:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(22) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permission`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'Controller anything like user and group', NULL, '2017-04-01 02:49:39'),
(5, 'Leader', 'leader', 'Manage everything about first template', '2017-06-30 21:05:18', '2017-06-30 21:05:18'),
(6, 'Member', 'member', 'Get order form leader and implement website', '2017-06-30 21:05:56', '2017-06-30 21:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(34, 1, 1, '2017-07-01 17:00:00', '2017-07-02 17:00:00'),
(35, 18, 5, NULL, NULL),
(36, 19, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1f0366e5a22fb2582e9048fbd831084ed817a034', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOFdFd2Y2VnV5a254NXl5THp2YTlkSXJWbHN5Q2RPMXhzbDlKTU9qdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly9sb2NhbGhvc3QvVGVzaGlzL3B1YmxpYy9hZG1pbmlzdHJhdG9yL2xvZ2luIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTUwMDA4MTMxMTtzOjE6ImMiO2k6MTUwMDA4MTMwOTtzOjE6ImwiO3M6MToiMCI7fX0=', 1500081312),
('2932a40ac9c6afd904b34ba69e97202a4f8521d2', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZUtSbFNFODFRdTQ1SkZXc1JNMUVIc0dhQ3ltcDFkcUJCanB5QnhKVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHA6Ly9sb2NhbGhvc3QvVGVzaGlzL3B1YmxpYy9hZG1pbmlzdHJhdG9yL2NyZWF0ZS1yb2xlIjt9czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNDk4OTAwMTgwO3M6MToiYyI7aToxNDk4OTAwMTUyO3M6MToibCI7czoxOiIwIjt9fQ==', 1498900180);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `auto_backup` tinyint(1) NOT NULL DEFAULT '1',
  `alert` tinyint(1) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `auto_backup`, `alert`, `date`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '5', '2017-04-01 17:23:41', '2017-04-08 06:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `lavel` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `remember_token` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `lavel`, `group_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'chann vuthy', 'channvutyit@gmail.com', '$2y$10$.bgdzBLFtsZ70OMh16cP8.vucpfBvKhhLuekSmUm2T6WIwESEYpQe', 1, NULL, NULL, 'XQ1nGymoyWvo10uGN0A4HFkNtNgpnBEhk3HwhqKmOwNo3NLIilNXM2Hbufh0', NULL, '2017-06-30 23:19:08'),
(18, 'Bong Bach', 'bongbach@gmail.com', '$2y$10$jvKdY8vw50KoyCa0nvo0P.iXrNO9C/j/AfTPljnjRltFwvy7W0ZLO', 1, NULL, 16, 'sAPnYHPOwNeV889KzVFXE6w5pftkL1IXTvMxeDGihqLYYTSrCNerUkYWhoqs', '2017-06-30 21:15:31', '2017-06-30 23:23:28'),
(19, 'Heang Kosal', 'heangkosal@gmail.com', '$2y$10$AoJzw5AV94yTCljl6jJBSupIYtdOn8tB1AJxQee/LZzKzdey/YUae', 1, NULL, 16, 'eCFqBUaN3rzTYa8XUShmBTV4AkWefzL0KbWP2bCsq3NiRhAyrsE0vEy5KLsl', '2017-06-30 21:16:32', '2017-06-30 23:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_patterns`
--

CREATE TABLE `user_patterns` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pattern_id` int(10) UNSIGNED NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_patterns`
--

INSERT INTO `user_patterns` (`id`, `user_id`, `pattern_id`, `note`, `created_at`, `updated_at`) VALUES
(5, 8, 2, NULL, '2017-04-20 21:26:23', '2017-04-20 21:26:23'),
(6, 8, 3, NULL, '2017-04-20 21:26:23', '2017-04-20 21:26:23'),
(11, 9, 4, NULL, '2017-04-22 17:13:39', '2017-04-22 17:13:39'),
(12, 9, 5, NULL, '2017-04-22 17:13:39', '2017-04-22 17:13:39'),
(13, 10, 2, NULL, '2017-04-24 08:59:30', '2017-04-24 08:59:30'),
(14, 12, 2, NULL, '2017-04-25 06:46:15', '2017-04-25 06:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Feb/2017', '<p><strong>1 Block variation 3-7 (No readmore)&nbsp;</strong><br /><strong>2 Pankuzu </strong><br /><strong>3 Sitemap </strong><br /><strong>4 Home icon </strong><br /><strong>5 Block eyecatch (no image) </strong></p>', 1, '2017-04-11 07:24:57', '2017-06-30 21:21:45'),
(2, '3/1/2017', '<p><strong>1 Block variation 3-7 (No readmore) </strong><br /><strong>3 Block no border style </strong><br /><strong>2 Sitemap </strong><br /><strong>4 Block aligned main image </strong><br /><strong>5 Eye catch image (not square or rectangle) </strong></p>', 1, '2017-04-11 07:28:24', '2017-04-11 07:28:24'),
(3, '4/1/2017', '<p><strong>1 Block variation 0-7 </strong><br /><strong>2 Pankuzu </strong><br /><strong>3 Variation h2 in block icatch on image </strong><br /><strong>4 Top button (scroll to the top) </strong><br /><strong>5 Block Icatch top content (Full &amp; have bg) </strong><br /><strong>6 2 Column New sideber</strong></p>', 1, '2017-04-11 07:29:08', '2017-04-13 19:39:49'),
(4, 'May/2017', '<p><strong>1 Block variation 3-7 (No readmore) </strong><br /><strong>3 Block no border style </strong><br /><strong>2 Sitemap </strong><br /><strong>4 Block aligned main image </strong><br /><strong>5 Eye catch image (not square or rectangle)</strong></p>', 1, '2017-04-11 07:29:40', '2017-04-13 22:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `versions`
--

CREATE TABLE `versions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT '1',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `versions`
--

INSERT INTO `versions` (`id`, `name`, `status`, `description`, `created_at`, `updated_at`) VALUES
(2, 'xx-ss-x-003', 1, 'xx-ss-x-003 The latest version for make Base Template', '2017-05-05 22:02:47', '2017-05-06 19:00:01'),
(3, 'First Version', 0, 'First Version', '2017-05-05 22:05:20', '2017-05-05 22:11:05'),
(4, 'xx-ss-001', 1, 'The first version for make Base Template', '2017-05-06 16:38:04', '2017-05-06 16:38:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bases`
--
ALTER TABLE `bases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `base_layout`
--
ALTER TABLE `base_layout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exports`
--
ALTER TABLE `exports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layouts`
--
ALTER TABLE `layouts`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_name` (`order_id`);

--
-- Indexes for table `paths`
--
ALTER TABLE `paths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patterns`
--
ALTER TABLE `patterns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`(191));

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_patterns`
--
ALTER TABLE `user_patterns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `versions`
--
ALTER TABLE `versions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bases`
--
ALTER TABLE `bases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `base_layout`
--
ALTER TABLE `base_layout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `exports`
--
ALTER TABLE `exports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `layouts`
--
ALTER TABLE `layouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;
--
-- AUTO_INCREMENT for table `paths`
--
ALTER TABLE `paths`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `patterns`
--
ALTER TABLE `patterns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user_patterns`
--
ALTER TABLE `user_patterns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `versions`
--
ALTER TABLE `versions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
