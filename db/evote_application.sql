-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2021 at 09:20 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evote_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `display`, `created_at`, `updated_at`) VALUES
(1, 'Kenya', 1, '2021-04-24 22:34:30', '2021-04-24 22:34:30'),
(2, 'USA', 1, '2021-04-24 22:34:30', '2021-04-24 22:34:30'),
(3, 'Bangladesh', 1, '2021-04-24 22:34:30', '2021-04-24 22:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `display`, `created_at`, `updated_at`) VALUES
(1, 'System Admin', 0, '2021-04-24 22:34:30', '2021-04-24 22:34:30'),
(2, 'Polling Station', 1, '2021-04-24 22:34:30', '2021-04-24 23:35:01'),
(3, 'Voter', 1, '2021-04-24 22:34:30', '2021-04-24 22:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `group_permission`
--

DROP TABLE IF EXISTS `group_permission`;
CREATE TABLE IF NOT EXISTS `group_permission` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_permission_group_id_permission_id_unique` (`group_id`,`permission_id`),
  KEY `group_permission_permission_id_foreign` (`permission_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_permission`
--

INSERT INTO `group_permission` (`id`, `created_at`, `updated_at`, `permission_id`, `group_id`) VALUES
(1, '2021-04-25 01:53:42', '2021-04-25 01:53:42', 10, 2),
(2, '2021-04-25 01:53:42', '2021-04-25 01:53:42', 12, 2),
(3, '2021-04-25 01:53:42', '2021-04-25 01:53:42', 11, 2),
(4, '2021-04-25 01:53:42', '2021-04-25 01:53:42', 13, 2),
(5, '2021-04-25 01:54:33', '2021-04-25 01:54:33', 14, 2),
(6, '2021-04-25 02:18:47', '2021-04-25 02:18:47', 14, 3),
(7, '2021-04-25 02:18:47', '2021-04-25 02:18:47', 10, 3),
(8, '2021-04-25 02:18:47', '2021-04-25 02:18:47', 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_25_040206_create_groups_table', 1),
(5, '2021_04_25_040223_create_modules_table', 1),
(6, '2021_04_25_040240_create_permissions_table', 1),
(7, '2021_04_25_040353_create_countries_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `label`, `url`, `created_at`, `updated_at`) VALUES
(4, 'Modules', 'modules', '2021-04-24 23:43:18', '2021-04-24 23:43:18'),
(3, 'Permissions', 'permissions', '2021-04-24 23:31:51', '2021-04-24 23:31:51'),
(5, 'Groups', 'group', '2021-04-24 23:43:39', '2021-04-24 23:43:39'),
(6, 'Votes', 'vote', '2021-04-25 01:48:38', '2021-04-25 01:48:38'),
(7, 'Question', 'question', '2021-04-25 01:53:23', '2021-04-25 01:53:23'),
(8, 'All Votes', 'opinion', '2021-04-25 01:55:45', '2021-04-25 01:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_module_id_foreign` (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `codename`, `created_at`, `updated_at`, `module_id`) VALUES
(1, 'View Groups', 'view_group', NULL, NULL, 5),
(2, 'Add Groups', 'add_group', NULL, NULL, 5),
(3, 'Change Groups', 'change_group', NULL, NULL, 5),
(4, 'Delete Groups', 'delete_group', NULL, NULL, 5),
(10, 'View Question', 'view_question', NULL, NULL, 7),
(12, 'Change Question', 'change_question', NULL, NULL, 7),
(11, 'Add Question', 'add_question', NULL, NULL, 7),
(9, 'All Votes', 'all_votes', NULL, NULL, 6),
(13, 'Delete Question', 'delete_question', NULL, NULL, 7),
(14, 'View Votes Result', 'view_votes_result', NULL, NULL, 6),
(15, 'View All Votes', 'view_opinion', NULL, NULL, 8),
(17, 'Change All Votes', 'change_opinion', NULL, NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `constituency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_system_user` tinyint(4) NOT NULL DEFAULT '0',
  `sub_county` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_group_id_foreign` (`group_id`),
  KEY `users_country_id_foreign` (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `province`, `constituency`, `is_system_user`, `sub_county`, `active`, `remember_token`, `created_at`, `updated_at`, `group_id`, `country_id`) VALUES
(1, 'System Admin', 'admin@evote.com', NULL, '$2y$10$HT/GibwgEXGkOxRRnT8Ow.4gbqCJf5YOkIvuxSi96y3xFNNEJyet6', 'Province', 'Constituency', 1, 'Sub County', 1, 'GUIZWwmiY8b1uPJiulLTPBtcjegabVbbbfEhZgPMRXfDi8j2Jcutfcozlv7N', '2021-04-24 22:34:31', '2021-04-24 22:34:31', 1, 1),
(2, 'Polling Station', 'polling.station@evote.com', NULL, '$2y$10$8j8tcKpkrVmSMH8g6UGPJeB9BJNF9JljZ8C3Ac.p1ibjLbZOvX.EO', 'Province', 'Constituency', 0, 'Sub County', 1, NULL, '2021-04-24 22:34:31', '2021-04-24 22:34:31', 2, 1),
(3, 'voter', 'voter@evote.com', NULL, '$2y$10$zhIYLCsPSAm.Tn665Yg.9u16PQCw8jANTSTAWdaRML8TM/bKIuHia', 'Province', 'Constituency', 0, 'Sub County', 1, NULL, '2021-04-24 22:34:31', '2021-04-24 22:34:31', 3, 1),
(4, 'Masud', 'masud@gmail.com', NULL, '$2y$10$b01dxGhYM4iI8bgabcacT.3DD2KluhCxhRV8a1U23tLtrc6xSSwUu', 'Dhaka', 'Dhaka', 0, 'Dhaka', 1, NULL, '2021-04-24 23:25:23', NULL, 3, 3),
(5, 'test', 'test@gmail.com', NULL, '$2y$10$OnRDdDJYZxbIRrJ4G7Yb3uNzQNJK/PZQMAoXHxSJhi2hyt6ciXim.', 'test', 'test', 0, 'test', 1, NULL, '2021-04-25 00:28:27', NULL, 2, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
