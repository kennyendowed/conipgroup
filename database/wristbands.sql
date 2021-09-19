-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2021 at 02:26 AM
-- Server version: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.2.34-9+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wristbands`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'kenneth Akpan', 'kenneyg50@gmail.com', 0, '2021-01-18 13:30:20', '2021-01-18 14:00:18'),
(2, 'kenneth Akpan johnson', 'kennyendowed@ymail.com', 0, '2021-01-18 13:30:30', '2021-01-18 14:00:18'),
(3, 'ayo', 'ayo4real2009@gmail.com', 0, '2021-01-18 13:32:18', '2021-01-18 14:00:18');

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
(3, '2020_06_10_134846_create_products_table', 1),
(4, '2020_07_09_110713_create_user_transcations_table', 2),
(5, '2020_07_09_110723_create_transcations_table', 2),
(6, '2020_11_20_141028_create_sales_table', 3);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `description`, `name`, `color`, `author`, `url`, `price`, `Quantity`, `category`, `created_at`, `updated_at`) VALUES
(7, NULL, 'Tyvek paper Sky blue', NULL, '41', 'products/tyvek paper Sky blue.png', '80', '20000', 'Paper-Tyvek-wristbands', '2020-08-08 21:34:41', '2021-01-25 08:53:59'),
(8, NULL, 'Tyvek paper Lemon green', NULL, '41', 'products/tyvek paper Lemon green.png', '80', '16500', 'Paper-Tyvek-wristbands', '2020-08-08 21:35:54', '2021-01-25 09:09:43'),
(9, NULL, 'Tyvek paper Neon green', NULL, '41', 'products/tyvek paper Dark green.png', '80', '23500', 'Paper-Tyvek-wristbands', '2020-08-08 21:37:07', '2021-01-25 09:11:08'),
(10, NULL, 'Tyvek paper Neon pink', NULL, '41', 'products/tyvek paper Neon pink.png', '80', '16000', 'Paper-Tyvek-wristbands', '2020-08-08 21:37:43', '2021-01-25 08:54:46'),
(11, NULL, 'Tyvek paper Purple', NULL, '41', 'products/tyvek paper Purple.png', '80', '7500', 'Paper-Tyvek-wristbands', '2020-08-08 21:38:19', '2021-01-22 12:48:17'),
(12, NULL, 'Tyvek paper Gray', NULL, '1', 'products/tyvek paper Gray.png', '80', '0', 'Paper-Tyvek-wristbands', '2020-08-08 21:39:23', '2020-08-08 21:39:23'),
(13, NULL, 'Tyvek paper White', NULL, '41', 'products/tyvek paper White.png', '80', '89500', 'Paper-Tyvek-wristbands', '2020-08-08 21:39:50', '2021-01-22 12:42:49'),
(14, NULL, 'Tyvek paper black', NULL, '41', 'products/tyvek paper black.png', '80', '22000', 'Paper-Tyvek-wristbands', '2020-08-08 21:40:39', '2021-01-25 08:18:30'),
(16, NULL, 'Tyvek paper Red', NULL, '41', 'products/tyvek paper Red.png', '80', '22220', 'Paper-Tyvek-wristbands', '2020-08-08 21:42:41', '2021-01-22 12:28:27'),
(17, NULL, 'Tyvek paper Neon- Yellow', NULL, '41', 'products/tyvek paper Yellow.png', '80', '28830', 'Paper-Tyvek-wristbands', '2020-08-08 21:43:13', '2021-01-25 08:17:20'),
(18, NULL, 'Tyvek paper Lavender', NULL, '1', 'products/tyvek paper Lavender.png', '80', '0', 'Paper-Tyvek-wristbands', '2020-08-08 21:44:09', '2020-08-08 21:44:09'),
(19, '', 'tyvek paper Neon orange', NULL, '41', 'products/tyvek paper Neon orange.png', '80', '19500', 'Paper-Tyvek-wristbands', '2020-08-08 21:45:46', '2021-01-22 12:37:59'),
(21, NULL, 'Wide face vinyl plastic White', NULL, '1', 'products/Wide face vinyl plastic White.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-08 22:05:24', '2020-08-08 22:05:24'),
(22, NULL, 'Wide face vinyl plastic Black', NULL, '1', 'products/Wide face vinyl plastic Black.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-08 22:06:37', '2020-08-08 22:06:37'),
(23, NULL, 'Wide face vinyl plastic Neon purple', NULL, '1', 'products/Wide face vinyl plastic Neon purple.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-08 22:08:26', '2020-08-08 22:08:26'),
(24, NULL, 'Wide face vinyl plastic Navy blue', NULL, '1', 'products/Wide face vinyl plastic Navy blue.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-08 22:10:20', '2020-08-08 22:10:20'),
(25, NULL, 'Wide face vinyl plastic Lime green', NULL, '1', 'products/Wide face vinyl plastic Lime green.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-14 14:43:53', '2020-08-14 14:43:53'),
(26, NULL, 'Wide face vinyl plastic Gray', NULL, '1', 'products/Wide face vinyl plastic Gray.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-14 14:45:02', '2020-08-14 14:45:02'),
(27, NULL, 'Wide face vinyl plastic Neon blue', NULL, '1', 'products/Wide face vinyl plastic Neon blue.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-14 14:46:05', '2020-08-14 14:46:05'),
(28, NULL, 'Wide face vinyl plastic Red', NULL, '1', 'products/Wide face vinyl plastic Red.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-14 14:47:01', '2020-08-14 14:47:01'),
(29, NULL, 'Wide face vinyl plastic Orange', NULL, '1', 'products/Wide face vinyl plastic Orange.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-14 14:47:59', '2020-08-14 14:47:59'),
(30, NULL, 'Wide face vinyl plastic yellow Lime', NULL, '1', 'products/Wide face vinyl plastic yellow Lime.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-14 14:51:17', '2020-08-14 14:51:17'),
(31, NULL, 'Wide face vinyl plastic Coffee', NULL, '1', 'products/Wide face vinyl plastic Coffee.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-14 14:54:15', '2020-08-14 14:54:15'),
(32, NULL, 'Wide face holographic sparkle Blue', NULL, '1', 'products/Wide face holographic sparkle Blue.png', '150', '0', 'Sparkle-Holographic', '2020-08-14 15:02:02', '2020-08-14 15:02:02'),
(33, NULL, 'Wide face holographic sparkle Gold', NULL, '1', 'products/Wide face holographic sparkle Gold.png', '150', '0', 'Sparkle-Holographic', '2020-08-14 15:03:00', '2020-08-14 15:03:00'),
(34, NULL, 'Wide face holographic sparkle Green', NULL, '1', 'products/Wide face holographic sparkle Green.png', '150', '30', 'Sparkle-Holographic', '2020-08-14 15:05:29', '2020-08-14 15:05:29'),
(35, NULL, 'Wide face holographic sparkle Red', NULL, '1', 'products/Wide face holographic sparkle Red.png', '150', '3', 'Sparkle-Holographic', '2020-08-14 15:05:57', '2021-01-29 12:02:32'),
(36, NULL, 'Wide face holographic sparkle Silver', NULL, '1', 'products/Wide face holographic sparkle Silver.png', '150', '0', 'Sparkle-Holographic', '2020-08-14 15:07:07', '2020-08-14 15:07:07'),
(37, NULL, 'L-Shaped vinyl plastic Lime green', NULL, '1', 'products/L-Shaped vinyl plastic Lime green.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-14 15:11:21', '2020-08-14 15:11:21'),
(38, NULL, 'L-Shaped vinyl plastic Red', NULL, '1', 'products/L-Shaped vinyl plastic Red.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-14 15:11:56', '2020-08-14 15:11:56'),
(39, NULL, 'L-Shaped vinyl plastic Navy blue', NULL, '1', 'products/L-Shaped vinyl plastic Navy blue.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-14 15:15:08', '2020-08-14 15:15:08'),
(40, NULL, 'L-Shaped vinyl plastic Gray', NULL, '1', 'products/L-Shaped vinyl plastic Gray.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-14 15:19:23', '2020-08-14 15:19:23'),
(41, NULL, 'L-Shaped vinyl plastic Neon purple', NULL, '1', 'products/L-Shaped vinyl plastic Neon purple.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-14 15:20:46', '2020-08-14 15:20:46'),
(42, NULL, 'L-Shaped vinyl plastic Black', NULL, '1', 'products/L-Shaped vinyl plastic Black.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-14 15:21:51', '2020-08-14 15:21:51'),
(43, NULL, 'L-Shaped vinyl plastic Neon pink', NULL, '1', 'products/L-Shaped vinyl plastic Neon pink.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-14 15:22:48', '2021-01-29 12:12:51'),
(44, NULL, 'Wavy shaped vinyl plastic Dark green', NULL, '1', 'products/Wavy shaped vinyl plastic Dark green.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-14 15:24:40', '2020-08-14 15:24:40'),
(45, NULL, 'Wavy shaped vinyl plastic Red', NULL, '1', 'products/Wavy shaped vinyl plastic Red.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-14 15:26:02', '2020-08-14 15:26:02'),
(46, NULL, 'Wavy shaped vinyl plastic Neon purple', NULL, '1', 'products/Wavy shaped vinyl plastic Neon purple.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-14 15:26:48', '2020-08-14 15:26:48'),
(47, NULL, 'Wavy shaped vinyl plastic Dark orange', NULL, '1', 'products/Wavy shaped vinyl plastic Dark orange.png', '100', '0', 'Plastic-Vinyl-wristbands', '2020-08-14 15:28:09', '2021-01-30 14:52:46'),
(48, NULL, 'Wavy shaped vinyl plastic Neon blue', NULL, '1', 'products/Wavy shaped vinyl plastic Neon blue.png', '100', '900', 'Plastic-Vinyl-wristbands', '2020-08-14 15:29:54', '2020-11-12 02:51:03'),
(49, NULL, 'Wavy shaped vinyl plastic Lime green', NULL, '1', 'products/Wavy shaped vinyl plastic Lime green.png', '100', '8000', 'Plastic-Vinyl-wristbands', '2020-08-14 15:31:13', '2020-11-12 02:50:52'),
(53, NULL, 'L-Shaped vinyl plastic Neon purple', NULL, '1', 'products/L-Shaped vinyl plastic Neon purple.png', '100', '800', 'Plastic-Vinyl-wristbands', '2020-11-12 02:42:33', '2020-11-12 02:42:33'),
(54, NULL, 'Berry', NULL, '42', 'products/Berry.png', '80', '28000', 'Paper-Tyvek-wristbands', '2021-01-22 12:51:47', '2021-01-29 14:50:51'),
(55, NULL, 'Neon Red', NULL, '22', 'products/Neon Red.png', '500', '31000', 'Paper-Tyvek-wristbands', '2021-01-25 08:51:40', '2021-01-31 00:13:02'),
(56, NULL, 'orange', NULL, '22', 'products/orange.png', '80', '25000', 'Paper-Tyvek-wristbands', '2021-01-25 09:06:57', '2021-01-31 00:02:40'),
(57, NULL, 'Gold', NULL, '22', 'products/Gold.png', '80', '19000', 'Paper-Tyvek-wristbands', '2021-01-25 09:12:03', '2021-01-30 23:50:36'),
(58, NULL, 'Light Gold', NULL, '22', 'products/Light Gold.png', '80', '7500', 'Paper-Tyvek-wristbands', '2021-01-25 09:14:30', '2021-01-30 23:48:01'),
(59, NULL, 'Silver', NULL, '22', 'products/Silver.png', '80', '12000', 'Paper-Tyvek-wristbands', '2021-01-25 09:16:20', '2021-01-30 23:45:04'),
(60, NULL, 'Kelly Green', NULL, '22', 'products/Kelly Green.png', '80', '3500', 'Paper-Tyvek-wristbands', '2021-01-25 09:18:06', '2021-01-30 23:30:00'),
(61, NULL, 'Pantone Green', NULL, '22', 'products/Pantone Green.png', '80', '25000', 'Paper-Tyvek-wristbands', '2021-01-25 09:18:32', '2021-01-31 00:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `printcontent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wristband_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `customer`, `printcontent`, `color`, `author`, `date`, `price`, `Quantity`, `wristband_id`, `created_at`, `updated_at`) VALUES
(1, 'samule joe', 'lady fine mad', 'yellow', '41', '2020-11-20', '300', '500', 34, '2020-11-20 14:33:36', '2020-11-20 14:33:36'),
(2, 'samule joe', 'lady fine mad', 'yellow', '41', '2020-11-20', '300', '50', 18, '2020-11-20 14:39:31', '2020-11-20 14:39:31'),
(3, 'samule joe', 'lady fine mad', 'yellow', '41', '2020-11-20', '300', '5', 16, '2020-11-20 14:49:17', '2020-11-20 14:49:17'),
(4, 'samule joe', 'lady fine mad', 'yellow', '41', '2020-11-20', '300', '50', 7, '2020-11-20 14:51:20', '2020-11-20 14:51:20'),
(5, 'samule joe', 'lady fine mad', 'yellow', '41', '2020-11-20', '800', '40', 7, '2020-11-20 15:03:09', '2020-11-20 15:03:09'),
(6, 'samule joe', 'lady fine mad', 'yellow', '41', '2020-11-20', '300', '50', 7, '2020-11-20 15:05:27', '2020-11-20 15:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `transcations`
--

CREATE TABLE `transcations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `trans_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` bigint(20) NOT NULL,
  `paid_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trans_refs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transcations`
--

INSERT INTO `transcations` (`id`, `user_id`, `trans_id`, `amount`, `paid_at`, `trans_refs`, `payment_status`, `confirm_by`, `created_at`, `updated_at`) VALUES
(1, 41, '7aoC7FwqWX9QU2xIHAVbBjsra-25579575', 300, '2020-11-23 04:38:04', '7aoC7FwqWX9QU2xIHAVbBjsra-25579575', 'Awaiting Payment', '', '2020-11-23 03:38:04', '2020-11-23 03:38:04'),
(2, 41, 'qgjqzfakcmyWi3n1x8Mw20psK-4366943', 2240, '2020-11-23 04:39:21', 'qgjqzfakcmyWi3n1x8Mw20psK-4366943', 'successful', 'kenneth Akpan', '2020-11-23 03:39:21', '2020-11-30 13:27:56'),
(3, 41, '39015375', 2850, '2020-11-23 04:52:41', '1QO55iS1LeFZGGit26MRmz42b-39015375', 'successful', 'kenneth Akpan', '2020-11-23 03:52:41', '2020-11-30 13:24:58'),
(4, 41, '52805430', 17760, '2021-01-29 01:31:24', 'KvqfvjcXhPDSSMCybWR0CmNxl-52805430', 'Awaiting Payment', NULL, '2021-01-29 00:31:24', '2021-01-29 00:31:24'),
(5, 41, '4240130', 20500, '2021-01-29 02:07:23', 'iLy6IFsDC5ydqJldZyUMXmaO0-4240130', 'successful', 'kenneth Akpan', '2021-01-29 01:07:23', '2021-01-29 01:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `is_permission` tinyint(4) DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `phone`, `user_id`, `is_permission`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 'Wristbands.ng', 'sales@wristbands.ng ', '2020-07-11 02:35:18', '$2y$10$8GerAum/IgRFX/qLtfwzP.NoymtM5OMDym.bDIRLIjF8JrtsE82fi', NULL, 'xbY5PRTo86R4gwkBl8EgB6Jj9z7KvyGejk175l3dHCY690nom4gkGkLKFJPe', '08120960876', 190, 1, '129.205.124.57', '2020-07-11 02:33:25', '2020-07-11 02:33:25'),
(3, 'Justice Edigin', 'mudia147@yahoo.com', '2020-07-16 08:30:51', '$2y$10$sJjkRtPp2f43DIF/oRWQv.jzm9NLDa6sxz.FJF0cdeehMMmwI00rq', NULL, NULL, '08109419498', 4347, 3, '197.210.8.110', '2020-07-16 08:30:03', '2020-07-16 08:30:03'),
(4, 'Erioluwa Ajayi', 'erioluwaajayi@gmail.com', NULL, '$2y$10$dvjj8Lah/GXOLM5eyqKd0u2KGhSSHPbeEKA2in9MBiYhvW/vAVFEy', NULL, NULL, '08140064104', 6776, 3, '197.210.61.111', '2020-07-23 12:22:35', '2020-07-23 12:22:35'),
(5, 'Ololade', 'loladepedro@gmail.com', '2020-09-14 10:45:15', '$2y$10$NsBgQ8II43HYefI6haPdc.6ib/WJXTksy3jnmpqYlvyRwGaevNIx2', NULL, NULL, '08057099118', 785, 3, '41.190.30.169', '2020-09-07 12:28:08', '2020-09-07 12:28:08'),
(6, 'Essien Samuel Essien', 'essienessiensam@gmail.com', NULL, '$2y$10$Qweq1oTN2LJ2.SvseJYgoe/zoy5PzSMEzvmM3PmM1OuFvAFLSJfbm', NULL, 'oCwYJfMCI9xwSsdN6hJhcyu6jHux8QLPtkKwwWHlb2pZ7gURcn4rfoTibbfV', '08186004455', 338, 3, '41.58.103.115', '2020-09-10 12:17:31', '2020-09-10 12:17:31'),
(7, 'Samuel Familusi', 'stumilara@gmail.com', '2020-09-28 10:32:03', '$2y$10$aRiBmyX70GObefAhWq7BEOofDRrr1uzC3p6RzSEU0eEdE.cOun5.K', NULL, NULL, '08132000047', 9683, 3, '197.210.47.70', '2020-09-27 21:49:04', '2020-09-27 21:49:04'),
(8, 'Goodness Azuka', 'azukachukwunonso@gmail.com', NULL, '$2y$10$XwPIvbqK2kdc/TiDfUncQOkGJAsZx0hO1A7BxFIIgsaCkD0PJ1YpC', NULL, NULL, '08063553768', 57, 3, '197.210.71.26', '2020-09-30 09:49:56', '2020-09-30 09:49:56'),
(9, 'Oluwamayowa olatunji', 'olatunji3296@gmail.com', '2020-11-07 09:37:59', '$2y$10$xhfahw07hFvAewPoOafryOn3zv515a9EGe4.XRAXBZ6MSsztYfCnq', NULL, 'ynfWb75naYDn9VkvQhiTA560mcKgJMLt8eJQUktCWFOGPPNCSWfxhQxDB4IY', '08155781945', 4595, 3, '102.89.1.226', '2020-11-07 09:32:46', '2020-11-07 09:32:46'),
(10, 'Oyindamola', 'oyindamolasaka@gmail.com', NULL, '$2y$10$wFCtrTlJpF/c.0C/9nGBSumVwX82olyiAnACK909LUUvWeHLqw7Ii', NULL, NULL, '08100829322', 582, 3, '197.210.65.157', '2020-11-09 17:24:51', '2020-11-09 17:24:51'),
(11, 'Yusuf', 'kyusufowoseni@gmail.com', NULL, '$2y$10$94fkWKfG9pVov6zCE9fbVuefFatRF50w0S.gSR4fqLXkH3Hhd.wA2', NULL, NULL, '08054027536', 7204, 1, '197.210.71.191', '2020-11-16 07:47:49', '2020-11-16 07:47:49'),
(13, 'ayomide onabajo', 'ayo4real2009@gmail.com', NULL, '$2y$10$9LMos2LMg3d6CxLbWP17tuSkev2jxOzPKFpv/46/AoTlOFlkL5s9q', NULL, 'uF3GyCPGods8YJVTVcD4s4ecybld6o3ohrJ6HAblUUswKZIchpsgvhFRziUT', '08137550255', 174, 3, '197.210.71.106', '2020-11-16 08:36:37', '2020-11-16 08:36:37'),
(16, 'Rachel Akpedeye', 'rachelakp@yahoo.com', '2020-11-19 00:19:53', '$2y$10$L9ZSqK.TjbO84gVJ1hK.NOAmJ/NTvR5Ta2wv5./vRP/2fLlISIjCq', NULL, NULL, '09070716928', 1904, 3, '41.79.66.128', '2020-11-19 12:18:08', '2020-11-19 12:18:08'),
(17, 'HANIFAT', 'yhanifat@yahoo.com', NULL, '$2y$10$qMKsaNtAADw9xoEpAAlFRufSpLDN9.o994PF/4TjNjzelvivCkytm', NULL, NULL, '08181111383', 4460, 2, '197.210.65.208', '2020-11-20 08:23:16', '2020-11-20 08:23:16'),
(20, 'Danjuma', 'danjuwam@gmail.com', '2020-11-21 23:38:11', '$2y$10$JC2Z47hABOYqDNyhMFENlOeJrAYsnUkCmo/3Qlk6mliYqhRsZUIB.', NULL, NULL, '08176147871', 745, 3, '41.190.14.41', '2020-11-22 11:30:01', '2020-11-22 11:30:01'),
(21, 'Hammed  Akinyemi', 'hakra911@gmail.com', NULL, '$2y$10$QIsXZLGVE73lfYcLxr22LeW9/X1XDlHlg0vVAD7qEV/Bm12XszYLu', NULL, 'OyLFgZe95KLBtNlVDjAuQZ1eVmWGyISSASMgW6Ifhhyh1SFDv7imw7sCoc2p', '08062474043', 202, 3, '197.210.28.134', '2020-11-22 20:55:27', '2020-11-22 20:55:27'),
(22, 'wristband IT Department', 'itsupport@centric.ng', '2020-11-23 03:02:50', '$2y$10$a8vxq3OZfEM21LrDQWZCbum7.jm4yWyfd2ThJ86wnoHrrFcehsZ2i', NULL, NULL, '08120960876', 2710, 1, '129.205.124.190', '2020-11-23 03:01:33', '2020-11-23 03:01:33'),
(23, 'Alexx Telles', 'livingseed@hotmail.com', NULL, '$2y$10$QUFaMSS8dr69TN49B7mCbuQqIKirXqTH5hRJ1sfqd/O1Wn3MxIB7O', NULL, NULL, '08117633020', 724, 3, '41.204.234.156', '2020-11-23 04:42:05', '2020-11-23 04:42:05'),
(24, 'Claire', 'joyotuya0@gmail.com', NULL, '$2y$10$pL1NUHjj5usGU/9ed0ZxjOzu3.ewQCbMhWKJmA0I94GSBSThrnelu', NULL, NULL, '08152006314', 3415, 3, '102.67.7.117', '2020-11-24 10:26:18', '2020-11-24 10:26:18'),
(25, 'Leonard', 'pixelsandbots@outlook.com', NULL, '$2y$10$eXfPGkyqMnUw7JCQucWMxurMzjVVuOwN6MaUXlj2RLJU8TphcCAMO', NULL, 'dEX9SxV6Kp9GLFbMhVgzI7kUAHZ66VddSvX59YUl9cZ9TUlYR0Wz4rioG98V', '09035585881', 4723, 3, '197.210.8.9', '2020-11-24 10:36:18', '2020-11-24 10:36:18'),
(26, 'Vivi', 'yourcvplug@gmail.com', NULL, '$2y$10$kF.P7yGxoBNgEviZ8ME5IelFlRAFj3bwHBXgAEIQ0SPocgjrrqB1O', NULL, NULL, '08165719103', 820, 3, '105.112.74.205', '2020-11-24 22:31:54', '2020-11-24 22:31:54'),
(27, 'Kingston Stratis', 'voiceofkingston@gmail.com', NULL, '$2y$10$gA7goRHjbN1mMC3U1W.yUunngFqvqHZwgVMMPKigh5RecTVtNEfRK', NULL, 'ZMQt52Z098UVxFVUpX7HDoKfJMXCp7nhaj1Tu6p1V2YTuKnEQ2qu7gMjnSls', '09019688080', 224, 3, '129.205.113.248', '2020-11-27 15:47:31', '2020-11-27 15:47:31'),
(28, 'shegzbanj', 'adebanjoshegun@gmail.com', '2020-11-30 06:56:23', '$2y$10$hHoFjfApDqP.Hh.uv6D56OGvFD1WSBzqXVA7hOJpZY7mibDTjBGtS', NULL, 'yZd7Fa0OriNg8knYBbCHPYkejr4zL0mtprbC8YBKABChPQIMOffXx8ujyBhT', '08165575660', 829, 3, '129.205.113.249', '2020-11-30 18:55:01', '2020-11-30 18:55:01'),
(29, 'Olajide Ahmed', 'olajide2006@yahoo.com', '2020-12-03 08:21:35', '$2y$10$xyGlH0uXaIxxK1kpMXBQGe0OqA1k3MMQ97CSQGxe7gToW637p67fS', NULL, '0kDTjDA8Nr2Pzztw5pnUvtbU36IIIVmaB05UVK110EYf03qTRiCxVUb1OtC6', '07081019019', 2542, 3, '154.120.97.223', '2020-12-03 08:18:53', '2020-12-07 11:11:33'),
(31, 'Abimsola', 'abimsolan@gmail.com', NULL, '$2y$10$VbMWipwVhkqLCt.d3D39juetk.HTMRKOc4GTTYnXk/SNt4Jss2eh6', NULL, NULL, '08087431406', 1826, 3, '129.205.113.251', '2020-12-03 16:22:27', '2020-12-03 16:22:27'),
(32, 'lola awoks', 'lawokulehin@gmail.com', '2020-12-04 08:49:56', '$2y$10$0MZugHD4dBglNFettM8iSuZypMM16URtpRx4VyRdpD0lEzrVj.B1S', NULL, 'M83f8MWsKRMBzPmecNPw6s9I1cl700WDPNyYJMbD9hJiep1BXFdHbgcwY3Vg', '08033277437', 3471, 3, '196.1.182.34', '2020-12-04 08:49:20', '2020-12-04 08:49:20'),
(33, 'Austin Okolo', 'austinokolo2020@gmail.com', '2020-12-06 04:00:52', '$2y$10$uzkaTHLI/EQKVzToPM4EH.AvCyUt07D0/PyQA1uN2K.fKl43ltHWm', NULL, 'V93A6SUwMEwmqJRaoBF3qoopDlSUkx4YKQT0nHAUFpW3dWK3aea8IEED8sFz', '08063464656', 166, 3, '197.210.85.83', '2020-12-06 04:00:25', '2020-12-06 04:00:25'),
(34, 'Emmanuel Adeyemo', 'em.adeyemo@gmail.com', NULL, '$2y$10$hUs3w8TDeR6xssBa5MYf7u9dki5OOFmXbdj1JNLUXCxk2G82v569C', NULL, '1Cbjtxleh07Xq5EBZwnDpQGqlIVFgPP6icxb6CTGG2jvLvUyHCGCVRIXy05y', '09032771986', 957, 3, '169.239.193.193', '2020-12-08 01:20:50', '2020-12-08 01:20:50'),
(35, 'Adepoju Olalekan Ademola', 'adepojuademola@gmail.com', NULL, '$2y$10$zKrmjTJYEtDu7UUqFTSYFOxXc6ttK1jSalfSuDVMccVgoYiYpPvl.', NULL, '5PhWoiONfSGnGgVh1ucp8Vq0rs0LjjsMSTgM9z6Xnay4ExYJ9ZS3twZljFKR', '08132244945', 2700, 3, '129.205.113.251', '2020-12-08 09:47:55', '2020-12-08 09:47:55'),
(36, 'Ife Kaizer', 'adesinaife285@gmail.com', '2020-12-08 10:51:59', '$2y$10$pFrlsqLqkuQYNXxdv1J8tOqhhD0Z8GbedBytT0ueqt4mmbBJXlWeK', NULL, NULL, '08060132915', 612, 3, '154.73.9.34', '2020-12-08 10:51:36', '2020-12-08 10:51:36'),
(37, 'Effiong Usin', 'effiong.usin@yahoo.com', '2020-12-12 04:39:45', '$2y$10$MwRWCzbebqMBy3oHX.tbJe.DS6gNItXxIcJz0yprVOVUN8VkqQm/m', NULL, '3B7t6zrVT1jzPhn7XlZD0633R5MwBnaUtiMtY7TewWajJAU2nYAmH0GYOldx', '08027339257', 6931, 3, '193.189.54.50', '2020-12-12 16:37:34', '2020-12-12 16:37:34'),
(38, 'Dotun Oguntona', 'dhortunoguntona@gmail.com', '2020-12-13 01:57:02', '$2y$10$Fr2PxdqE3eRy51hYsCJ6aOP88rxycTRpOwZO6vW7f9YmqTzpFv6lq', NULL, NULL, '08052772413', 5203, 3, '129.205.124.232', '2020-12-13 09:41:30', '2020-12-13 09:41:30'),
(39, 'Franklin Hayes', 'upliftedfranklin@gmail.com', NULL, '$2y$10$DpQYhNyLDs691D4ys9aCSOQqjVAIIxFm3nuFetVFHOjOIJsWwViZG', NULL, NULL, '08060575360', 1210, 3, '197.210.63.188', '2020-12-13 18:10:25', '2020-12-13 18:10:25'),
(40, 'Isaiah Obadare', 'gemcomp1@gmail.com', NULL, '$2y$10$hrQyqzAHelMWH4hoxPQ6LO/WnO2JUKjEaiaGeg1qXEnawmwiV71K6', NULL, 'F1nU1PWO9N4Xa3QGZYcYOCB9KZ40rOO2OcC7K4nlBoiMGNUp3domHNZeZ30m', '08146768600', 1626, 3, '197.210.64.36', '2020-12-14 16:10:11', '2020-12-14 16:10:11'),
(41, '5POINTS', '5pointsevents@gmail.com', '2020-12-15 08:36:22', '$2y$10$rwR9o/dal0HTXeQyRLI14OsFrApvDQueBxRLvW7HtxMxC.R73y05W', NULL, NULL, '07031932650', 1657, 3, '154.120.92.119', '2020-12-15 08:35:26', '2020-12-15 08:35:26'),
(42, 'Bukunola', 'oyebukunola02@gmail.com', NULL, '$2y$10$8U8ugNiRfCXSlEPUpG5OseUcx0u3hwvs0NNaM.L5xm4rQftGXLJ4W', NULL, NULL, '08059002062', 3259, 3, '129.205.112.46', '2020-12-15 19:10:26', '2020-12-15 19:10:26'),
(43, 'DAGA PAUL', 'Mywordworld3@yahoo.com', '2020-12-17 08:20:43', '$2y$10$KsvqavNDaPF4Lla7tFSeu.Sx/Hxecnd7.si2n1hYsHGnptcGPPW82', NULL, NULL, '08034300865', 1051, 3, '197.210.55.156', '2020-12-17 08:20:10', '2020-12-17 08:20:10'),
(44, 'Dewunmi', 'blackulturecreation@gmail.com', NULL, '$2y$10$XhEURZ6f0muEDs1OpsjS8OU/je9rt2BhFp5GTrmKeH20F0vFE7zI6', NULL, NULL, '08089888836', 90, 3, '129.56.32.139', '2020-12-17 12:37:58', '2020-12-17 12:37:58'),
(45, 'Simisola', 'asiwajudadasimisola@gmail.com', '2020-12-23 01:15:29', '$2y$10$FFNK/XxYMCwTiZeRsiS6H.T8p2EniWiBFL9sbQ95WEpPRTHZf8Bcm', NULL, NULL, '09038269949', 6837, 3, '197.210.65.85', '2020-12-23 01:13:09', '2020-12-23 01:13:09'),
(46, 'Mr Ugo Ebeniro', 'ugo_ebeniro@yahoo.com', '2021-01-31 01:40:29', '$2y$10$NB5Xzk4Luetifci1xDtuCeiUKu6GQYULKuPZDqnA1BTtLhupYjWO2', NULL, NULL, '08060397238', 1942, 1, '129.205.124.56', '2021-01-31 00:09:39', '2021-01-31 00:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_transcations`
--

CREATE TABLE `user_transcations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` bigint(20) NOT NULL,
  `items` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quqntity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_transcations`
--

INSERT INTO `user_transcations` (`id`, `user_id`, `payment_id`, `total_amount`, `items`, `quqntity`, `item_price`, `created_at`, `updated_at`) VALUES
(1, 41, '7aoC7FwqWX9QU2xIHAVbBjsra-25579575', 150, 'Wide face holographic sparkle Gold', '1', '150', '2020-11-23 03:38:04', '2020-11-23 03:38:04'),
(2, 41, '7aoC7FwqWX9QU2xIHAVbBjsra-25579575', 150, 'Wide face holographic sparkle Red', '1', '150', '2020-11-23 03:38:04', '2020-11-23 03:38:04'),
(3, 41, 'qgjqzfakcmyWi3n1x8Mw20psK-4366943', 880, 'Tyvek paper Lemon green', '11', '80', '2020-11-23 03:39:21', '2020-11-23 03:39:21'),
(4, 41, 'qgjqzfakcmyWi3n1x8Mw20psK-4366943', 1280, 'Tyvek paper Dark green', '16', '80', '2020-11-23 03:39:21', '2020-11-23 03:39:21'),
(5, 41, 'qgjqzfakcmyWi3n1x8Mw20psK-4366943', 80, 'Tyvek paper Neon pink', '1', '80', '2020-11-23 03:39:21', '2020-11-23 03:39:21'),
(6, 41, '39015375', 1350, 'Wide face holographic sparkle Gold', '9', '150', '2020-11-23 03:52:41', '2020-11-23 03:52:41'),
(7, 41, '39015375', 150, 'Wide face holographic sparkle Blue', '1', '150', '2020-11-23 03:52:41', '2020-11-23 03:52:41'),
(8, 41, '39015375', 1350, 'Wide face holographic sparkle Green', '9', '150', '2020-11-23 03:52:41', '2020-11-23 03:52:41'),
(9, 41, '4240130', 10200, 'Wide face vinyl plastic Black', '102', '100', '2021-01-29 01:07:23', '2021-01-29 01:07:23'),
(10, 41, '4240130', 10300, 'Wide face vinyl plastic Lime green', '103', '100', '2021-01-29 01:07:23', '2021-01-29 01:07:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transcations`
--
ALTER TABLE `transcations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_transcations`
--
ALTER TABLE `user_transcations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transcations`
--
ALTER TABLE `transcations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `user_transcations`
--
ALTER TABLE `user_transcations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
