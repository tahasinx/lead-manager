-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 01, 2023 at 11:30 AM
-- Server version: 5.7.43
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activity_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activist_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_for` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_zone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_month` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `activity_id`, `activist_id`, `activity_type`, `activity_for`, `activity_zone`, `reference_id`, `activity_info`, `activity_date`, `activity_month`, `activity_year`, `created_at`, `updated_at`) VALUES
(1, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'login', 'admin', 'auth', 'Gw9tUhZTgz', 'Logged in', '2023-07-25', 'July', 2023, '2023-07-25 12:52:40', '2023-07-25 12:52:40'),
(2, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'login', 'admin', 'auth', 'Gw9tUhZTgz', 'Logged in', '2023-07-25', 'July', 2023, '2023-07-25 17:27:03', '2023-07-25 17:27:03'),
(3, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'store data', 'Gw9tUhZTgz', 'Store data:', '2023-07-25', 'July', 2023, '2023-07-25 17:28:21', '2023-07-25 17:28:21'),
(4, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'store data', 'Gw9tUhZTgz', 'Store data:', '2023-07-25', 'July', 2023, '2023-07-25 17:28:21', '2023-07-25 17:28:21'),
(5, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'store data', 'Gw9tUhZTgz', 'Store data:', '2023-07-25', 'July', 2023, '2023-07-25 17:28:21', '2023-07-25 17:28:21'),
(6, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'store data', 'Gw9tUhZTgz', 'Store data:', '2023-07-25', 'July', 2023, '2023-07-25 17:28:21', '2023-07-25 17:28:21'),
(7, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'store data', 'Gw9tUhZTgz', 'Store data:', '2023-07-25', 'July', 2023, '2023-07-25 17:28:41', '2023-07-25 17:28:41'),
(8, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workzone', 'provider-202307251ep2QCCalH3sRDnj232812', 'Create a new workzone:Mr Admin', '2023-07-25', 'July', 2023, '2023-07-25 17:28:45', '2023-07-25 17:28:45'),
(9, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'store data', 'Gw9tUhZTgz', 'Store data:', '2023-07-25', 'July', 2023, '2023-07-25 17:29:13', '2023-07-25 17:29:13'),
(10, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'receiver', 'receiver-20230725z3Xi6ak1A1SILfeD233027', 'Created a new receiver:Tahsin Bhai', '2023-07-25', 'July', 2023, '2023-07-25 17:30:27', '2023-07-25 17:30:27'),
(11, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workorder store data', 'Gw9tUhZTgz', 'workorder Store data:', '2023-07-25', 'July', 2023, '2023-07-25 17:31:35', '2023-07-25 17:31:35'),
(12, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workorder store data', 'Gw9tUhZTgz', 'workorder Store data:', '2023-07-25', 'July', 2023, '2023-07-25 17:31:38', '2023-07-25 17:31:38'),
(13, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workorder store data', 'Gw9tUhZTgz', 'workorder Store data:', '2023-07-25', 'July', 2023, '2023-07-25 17:31:56', '2023-07-25 17:31:56'),
(14, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workorder store data', 'Gw9tUhZTgz', 'workorder Store data:', '2023-07-25', 'July', 2023, '2023-07-25 17:31:59', '2023-07-25 17:31:59'),
(15, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workorder store data', 'Gw9tUhZTgz', 'workorder Store data:', '2023-07-25', 'July', 2023, '2023-07-25 17:32:01', '2023-07-25 17:32:01'),
(16, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'login', 'provider', 'auth', 'provider-202307251ep2QCCalH3sRDnj232812', 'Logged in', '2023-07-25', 'July', 2023, '2023-07-25 17:35:12', '2023-07-25 17:35:12'),
(17, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'login', 'provider', 'auth', 'provider-202307251ep2QCCalH3sRDnj232812', 'Logged in', '2023-07-25', 'July', 2023, '2023-07-25 17:53:31', '2023-07-25 17:53:31'),
(18, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'login', 'admin', 'auth', 'Gw9tUhZTgz', 'Logged in', '2023-07-25', 'July', 2023, '2023-07-25 17:58:32', '2023-07-25 17:58:32'),
(19, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230725mVgWIIBEb4suQvOC235914', 'Created a new Category:', '2023-07-25', 'July', 2023, '2023-07-25 17:59:14', '2023-07-25 17:59:14'),
(20, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'store data', 'Gw9tUhZTgz', 'Store data:', '2023-07-25', 'July', 2023, '2023-07-25 17:59:26', '2023-07-25 17:59:26'),
(21, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'store data', 'Gw9tUhZTgz', 'Store data:', '2023-07-25', 'July', 2023, '2023-07-25 17:59:27', '2023-07-25 17:59:27'),
(22, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'add', 'admin', 'service category', 'Gw9tUhZTgz', 'Category Add', '2023-07-25', 'July', 2023, '2023-07-25 17:59:53', '2023-07-25 17:59:53'),
(23, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230726Op5uODHZfYWRiqbD000041', 'Created a new Category:', '2023-07-26', 'July', 2023, '2023-07-25 18:00:41', '2023-07-25 18:00:41'),
(24, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'delete', 'admin', 'Category', 'category-20230726Op5uODHZfYWRiqbD000041', 'Deleted a Category: ', '2023-07-26', 'July', 2023, '2023-07-25 18:00:53', '2023-07-25 18:00:53'),
(25, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'delete', 'admin', 'Category', 'category-20230725mVgWIIBEb4suQvOC235914', 'Deleted a Category: ', '2023-07-26', 'July', 2023, '2023-07-25 18:00:57', '2023-07-25 18:00:57'),
(26, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-202307265g0JjhPwBBbVducT000105', 'Created a new Category:', '2023-07-26', 'July', 2023, '2023-07-25 18:01:05', '2023-07-25 18:01:05'),
(27, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'update', 'admin', 'Category', 'category-202307265g0JjhPwBBbVducT000105', 'Updated a Category:', '2023-07-26', 'July', 2023, '2023-07-25 18:01:30', '2023-07-25 18:01:30'),
(28, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230726b9pNlBFo8dNJnHS9000152', 'Created a new Category:', '2023-07-26', 'July', 2023, '2023-07-25 18:01:52', '2023-07-25 18:01:52'),
(29, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230726E63H9mCbVBxoHsGs000249', 'Created a new Category:', '2023-07-26', 'July', 2023, '2023-07-25 18:02:49', '2023-07-25 18:02:49'),
(30, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'delete', 'admin', 'service category', 'Gw9tUhZTgz', 'Category deleted', '2023-07-26', 'July', 2023, '2023-07-25 18:04:15', '2023-07-25 18:04:15'),
(31, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'add', 'admin', 'service category', 'Gw9tUhZTgz', 'Category Add', '2023-07-26', 'July', 2023, '2023-07-25 18:04:22', '2023-07-25 18:04:22'),
(32, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'store data', 'Gw9tUhZTgz', 'Store data:', '2023-07-26', 'July', 2023, '2023-07-25 18:05:43', '2023-07-25 18:05:43'),
(33, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'store data', 'Gw9tUhZTgz', 'Store data:', '2023-07-26', 'July', 2023, '2023-07-25 18:05:45', '2023-07-25 18:05:45'),
(34, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'store data', 'Gw9tUhZTgz', 'Store data:', '2023-07-26', 'July', 2023, '2023-07-25 18:05:49', '2023-07-25 18:05:49'),
(35, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workzone', 'provider-20230725qnL71lTFBaV3dzRA235924', 'Create a new workzone:Mr Admin', '2023-07-26', 'July', 2023, '2023-07-25 18:07:10', '2023-07-25 18:07:10'),
(36, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workzone', 'provider-20230725qnL71lTFBaV3dzRA235924', 'Create a new workzone:Mr Admin', '2023-07-26', 'July', 2023, '2023-07-25 18:07:10', '2023-07-25 18:07:10'),
(37, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workzone', 'provider-20230725qnL71lTFBaV3dzRA235924', 'Create a new workzone:Mr Admin', '2023-07-26', 'July', 2023, '2023-07-25 18:07:10', '2023-07-25 18:07:10'),
(38, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workzone', 'provider-20230725qnL71lTFBaV3dzRA235924', 'Create a new workzone:Mr Admin', '2023-07-26', 'July', 2023, '2023-07-25 18:07:10', '2023-07-25 18:07:10'),
(39, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'worktime', 'provider-20230725qnL71lTFBaV3dzRA235924', 'Create a new worktime:Mr Admin', '2023-07-26', 'July', 2023, '2023-07-25 18:09:13', '2023-07-25 18:09:13'),
(40, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'worktime', 'provider-20230725qnL71lTFBaV3dzRA235924', 'Create a new worktime:Mr Admin', '2023-07-26', 'July', 2023, '2023-07-25 18:09:46', '2023-07-25 18:09:46'),
(41, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'delete', 'admin', 'Workorder', 'workorder-202307257V6atp44SIpajlnP233055', 'Deleted a workorder: ', '2023-07-26', 'July', 2023, '2023-07-25 18:12:32', '2023-07-25 18:12:32'),
(42, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-25 18:12:57', '2023-07-25 18:12:57'),
(43, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workorder store data', 'Gw9tUhZTgz', 'workorder Store data:', '2023-07-26', 'July', 2023, '2023-07-25 18:13:27', '2023-07-25 18:13:27'),
(44, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workorder store data', 'Gw9tUhZTgz', 'workorder Store data:', '2023-07-26', 'July', 2023, '2023-07-25 18:13:29', '2023-07-25 18:13:29'),
(45, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workorder store data', 'Gw9tUhZTgz', 'workorder Store data:', '2023-07-26', 'July', 2023, '2023-07-25 18:13:35', '2023-07-25 18:13:35'),
(46, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'add', 'provider', 'service category', 'provider-202307251ep2QCCalH3sRDnj232812', 'Category Add', '2023-07-26', 'July', 2023, '2023-07-25 18:13:43', '2023-07-25 18:13:43'),
(47, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workorder store data', 'Gw9tUhZTgz', 'workorder Store data:', '2023-07-26', 'July', 2023, '2023-07-25 18:13:44', '2023-07-25 18:13:44'),
(48, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workorder store data', 'Gw9tUhZTgz', 'workorder Store data:', '2023-07-26', 'July', 2023, '2023-07-25 18:13:48', '2023-07-25 18:13:48'),
(49, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'user', 'provider', 'auth', 'provider-202307251ep2QCCalH3sRDnj232812', 'Profile details has been updated.', '2023-07-26', 'July', 2023, '2023-07-25 18:13:56', '2023-07-25 18:13:56'),
(50, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workorder image uploaded', 'Gw9tUhZTgz', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-25 18:14:08', '2023-07-25 18:14:08'),
(51, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workorder image uploaded', 'Gw9tUhZTgz', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-25 18:14:08', '2023-07-25 18:14:08'),
(52, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workorder image uploaded', 'Gw9tUhZTgz', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-25 18:14:08', '2023-07-25 18:14:08'),
(53, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'store data', 'Gw9tUhZTgz', 'Store data:', '2023-07-26', 'July', 2023, '2023-07-25 18:23:01', '2023-07-25 18:23:01'),
(54, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'store data', 'Gw9tUhZTgz', 'Store data:', '2023-07-26', 'July', 2023, '2023-07-25 18:23:01', '2023-07-25 18:23:01'),
(55, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workorder store data', 'Gw9tUhZTgz', 'workorder Store data:', '2023-07-26', 'July', 2023, '2023-07-25 18:34:18', '2023-07-25 18:34:18'),
(56, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workorder store data', 'Gw9tUhZTgz', 'workorder Store data:', '2023-07-26', 'July', 2023, '2023-07-25 18:34:21', '2023-07-25 18:34:21'),
(57, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workorder store data', 'Gw9tUhZTgz', 'workorder Store data:', '2023-07-26', 'July', 2023, '2023-07-25 18:34:25', '2023-07-25 18:34:25'),
(58, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workorder store data', 'Gw9tUhZTgz', 'workorder Store data:', '2023-07-26', 'July', 2023, '2023-07-25 18:34:28', '2023-07-25 18:34:28'),
(59, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'workorder store data', 'Gw9tUhZTgz', 'workorder Store data:', '2023-07-26', 'July', 2023, '2023-07-25 18:34:31', '2023-07-25 18:34:31'),
(60, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-25 18:35:46', '2023-07-25 18:35:46'),
(61, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-25 18:36:19', '2023-07-25 18:36:19'),
(62, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'login', 'provider', 'auth', 'provider-202307251ep2QCCalH3sRDnj232812', 'Logged in', '2023-07-26', 'July', 2023, '2023-07-26 03:18:32', '2023-07-26 03:18:32'),
(63, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'login', 'provider', 'auth', 'provider-202307251ep2QCCalH3sRDnj232812', 'Logged in', '2023-07-26', 'July', 2023, '2023-07-26 03:19:14', '2023-07-26 03:19:14'),
(64, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-26 03:21:05', '2023-07-26 03:21:05'),
(65, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-26 03:21:05', '2023-07-26 03:21:05'),
(66, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-26 03:43:31', '2023-07-26 03:43:31'),
(67, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-26 03:45:36', '2023-07-26 03:45:36'),
(68, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'user', 'provider', 'auth', 'provider-202307251ep2QCCalH3sRDnj232812', 'Profile Picture has been updated.', '2023-07-26', 'July', 2023, '2023-07-26 08:50:59', '2023-07-26 08:50:59'),
(69, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'user', 'provider', 'auth', 'provider-202307251ep2QCCalH3sRDnj232812', 'Profile Picture has been updated.', '2023-07-26', 'July', 2023, '2023-07-26 08:51:11', '2023-07-26 08:51:11'),
(70, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'user', 'provider', 'auth', 'provider-202307251ep2QCCalH3sRDnj232812', 'Profile Picture has been updated.', '2023-07-26', 'July', 2023, '2023-07-26 09:13:09', '2023-07-26 09:13:09'),
(71, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'user', 'provider', 'auth', 'provider-202307251ep2QCCalH3sRDnj232812', 'Profile Picture has been updated.', '2023-07-26', 'July', 2023, '2023-07-26 09:13:52', '2023-07-26 09:13:52'),
(72, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'user', 'provider', 'auth', 'provider-202307251ep2QCCalH3sRDnj232812', 'Profile Picture has been updated.', '2023-07-26', 'July', 2023, '2023-07-26 09:14:34', '2023-07-26 09:14:34'),
(73, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'user', 'provider', 'auth', 'provider-202307251ep2QCCalH3sRDnj232812', 'Profile Picture has been updated.', '2023-07-26', 'July', 2023, '2023-07-26 09:16:55', '2023-07-26 09:16:55'),
(74, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'user', 'provider', 'auth', 'provider-202307251ep2QCCalH3sRDnj232812', 'Profile Picture has been updated.', '2023-07-26', 'July', 2023, '2023-07-26 09:49:32', '2023-07-26 09:49:32'),
(75, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'user', 'provider', 'auth', 'provider-202307251ep2QCCalH3sRDnj232812', 'Profile Picture has been updated.', '2023-07-26', 'July', 2023, '2023-07-26 10:14:26', '2023-07-26 10:14:26'),
(76, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'user', 'provider', 'auth', 'provider-202307251ep2QCCalH3sRDnj232812', 'Profile Picture has been updated.', '2023-07-26', 'July', 2023, '2023-07-26 10:14:44', '2023-07-26 10:14:44'),
(77, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-26 10:19:36', '2023-07-26 10:19:36'),
(78, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-26 10:19:53', '2023-07-26 10:19:53'),
(79, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-26 10:26:05', '2023-07-26 10:26:05'),
(80, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-26 10:26:05', '2023-07-26 10:26:05'),
(81, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-26 10:34:21', '2023-07-26 10:34:21'),
(82, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-26 10:34:21', '2023-07-26 10:34:21'),
(83, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-26 10:41:20', '2023-07-26 10:41:20'),
(84, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-26 10:41:20', '2023-07-26 10:41:20'),
(85, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-26 10:41:20', '2023-07-26 10:41:20'),
(86, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-26', 'July', 2023, '2023-07-26 10:41:20', '2023-07-26 10:41:20'),
(87, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'login', 'admin', 'auth', 'Gw9tUhZTgz', 'Logged in', '2023-07-26', 'July', 2023, '2023-07-26 16:40:00', '2023-07-26 16:40:00'),
(88, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230726q5uvxM6QIELho5eZ224500', 'Created a new Category:', '2023-07-26', 'July', 2023, '2023-07-26 16:45:00', '2023-07-26 16:45:00'),
(89, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230726SptbuqgeetU28XGT224646', 'Created a new Category:', '2023-07-26', 'July', 2023, '2023-07-26 16:46:46', '2023-07-26 16:46:46'),
(90, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-202307264SivJJlFa1ys7rQ4224841', 'Created a new Category:', '2023-07-26', 'July', 2023, '2023-07-26 16:48:41', '2023-07-26 16:48:41'),
(91, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 06:52:24', '2023-07-27 06:52:24'),
(92, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 06:52:24', '2023-07-27 06:52:24'),
(93, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 06:52:24', '2023-07-27 06:52:24'),
(94, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 06:52:56', '2023-07-27 06:52:56'),
(95, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 06:52:56', '2023-07-27 06:52:56'),
(96, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:13:11', '2023-07-27 07:13:11'),
(97, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:13:11', '2023-07-27 07:13:11'),
(98, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:13:11', '2023-07-27 07:13:11'),
(99, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:20:06', '2023-07-27 07:20:06'),
(100, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:20:18', '2023-07-27 07:20:18'),
(101, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:26:05', '2023-07-27 07:26:05'),
(102, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:26:24', '2023-07-27 07:26:24'),
(103, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:26:24', '2023-07-27 07:26:24'),
(104, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:26:24', '2023-07-27 07:26:24'),
(105, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:26:40', '2023-07-27 07:26:40'),
(106, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:26:40', '2023-07-27 07:26:40'),
(107, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:00', '2023-07-27 07:27:00'),
(108, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:05', '2023-07-27 07:27:05'),
(109, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:07', '2023-07-27 07:27:07'),
(110, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:10', '2023-07-27 07:27:10'),
(111, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:11', '2023-07-27 07:27:11'),
(112, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:13', '2023-07-27 07:27:13'),
(113, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:15', '2023-07-27 07:27:15'),
(114, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:16', '2023-07-27 07:27:16'),
(115, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:17', '2023-07-27 07:27:17'),
(116, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:19', '2023-07-27 07:27:19'),
(117, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:20', '2023-07-27 07:27:20'),
(118, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:22', '2023-07-27 07:27:22'),
(119, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:23', '2023-07-27 07:27:23'),
(120, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:25', '2023-07-27 07:27:25'),
(121, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:28', '2023-07-27 07:27:28'),
(122, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:30', '2023-07-27 07:27:30'),
(123, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:32', '2023-07-27 07:27:32'),
(124, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:36', '2023-07-27 07:27:36'),
(125, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:38', '2023-07-27 07:27:38'),
(126, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:40', '2023-07-27 07:27:40'),
(127, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:44', '2023-07-27 07:27:44'),
(128, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:45', '2023-07-27 07:27:45'),
(129, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:47', '2023-07-27 07:27:47'),
(130, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:51', '2023-07-27 07:27:51'),
(131, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:53', '2023-07-27 07:27:53'),
(132, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:54', '2023-07-27 07:27:54'),
(133, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:56', '2023-07-27 07:27:56'),
(134, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:57', '2023-07-27 07:27:57'),
(135, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:27:59', '2023-07-27 07:27:59'),
(136, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:28:00', '2023-07-27 07:28:00'),
(137, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:28:02', '2023-07-27 07:28:02'),
(138, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:28:11', '2023-07-27 07:28:11'),
(139, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:28:14', '2023-07-27 07:28:14'),
(140, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:28:43', '2023-07-27 07:28:43'),
(141, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 07:28:49', '2023-07-27 07:28:49'),
(142, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727xjjFB7EVEjOi3K59133038', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 07:30:38', '2023-07-27 07:30:38'),
(143, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727cbiEVbUb6jw5ravy133218', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 07:32:18', '2023-07-27 07:32:18'),
(144, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727i4cCOfCPMlvuUfLm133303', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 07:33:03', '2023-07-27 07:33:03'),
(145, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727uboUchPszrKVG0Uq133328', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 07:33:28', '2023-07-27 07:33:28'),
(146, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727unFxccNXMWBkpS5k133343', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 07:33:43', '2023-07-27 07:33:43'),
(147, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727c5Al53AJNfunC2vS133411', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 07:34:11', '2023-07-27 07:34:11'),
(148, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727qZIa7epUGtZkorFu133448', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 07:34:48', '2023-07-27 07:34:48'),
(149, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727rGI7XZNyy1YRBpe8133503', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 07:35:03', '2023-07-27 07:35:03'),
(150, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727bJJ0Ohb0UF9lrWjc133520', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 07:35:20', '2023-07-27 07:35:20'),
(151, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727ePIJGse8x2mdGRpi133543', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 07:35:43', '2023-07-27 07:35:43'),
(152, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727E4NgNLTse9mJlwGq133602', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 07:36:02', '2023-07-27 07:36:02'),
(153, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-202307274WFAAW5MV1D6oRz9133616', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 07:36:16', '2023-07-27 07:36:16'),
(154, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727RDhJZGnfhFwSYM1B133630', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 07:36:30', '2023-07-27 07:36:30'),
(155, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727pRvlMfSNYjFLA3eb133648', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 07:36:48', '2023-07-27 07:36:48'),
(156, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'user', 'provider', 'auth', 'provider-202307251ep2QCCalH3sRDnj232812', 'Profile Picture has been updated.', '2023-07-27', 'July', 2023, '2023-07-27 07:37:01', '2023-07-27 07:37:01'),
(157, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727Nso8ubxG89dvI7NV133706', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 07:37:06', '2023-07-27 07:37:06'),
(158, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727GCe9RjhmvrlQkNga133736', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 07:37:36', '2023-07-27 07:37:36'),
(159, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 08:33:48', '2023-07-27 08:33:48'),
(160, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 08:33:48', '2023-07-27 08:33:48'),
(161, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 08:33:48', '2023-07-27 08:33:48'),
(162, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 08:34:04', '2023-07-27 08:34:04'),
(163, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 08:34:04', '2023-07-27 08:34:04'),
(164, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'create', 'provider', 'workorder image uploaded', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 08:34:15', '2023-07-27 08:34:15'),
(165, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 08:34:26', '2023-07-27 08:34:26'),
(166, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 08:34:28', '2023-07-27 08:34:28'),
(167, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 08:34:30', '2023-07-27 08:34:30'),
(168, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'delete', 'provider', 'workorder image deleted', 'provider-202307251ep2QCCalH3sRDnj232812', 'workorder image', '2023-07-27', 'July', 2023, '2023-07-27 08:34:31', '2023-07-27 08:34:31'),
(169, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'delete', 'admin', 'Category', 'category-20230727GCe9RjhmvrlQkNga133736', 'Deleted a Category: ', '2023-07-27', 'July', 2023, '2023-07-27 10:34:53', '2023-07-27 10:34:53'),
(170, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'login', 'admin', 'auth', 'Gw9tUhZTgz', 'Logged in', '2023-07-27', 'July', 2023, '2023-07-27 10:37:38', '2023-07-27 10:37:38'),
(171, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727JjXw9esqpbWba1Oe163826', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:38:26', '2023-07-27 10:38:26'),
(172, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727tGVkH1FmDRB9Vhnd163903', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:39:03', '2023-07-27 10:39:03'),
(173, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727EgIPhILYZ3JsR3jY163917', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:39:17', '2023-07-27 10:39:17'),
(174, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727s47e6pWQMbjqFNrR163931', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:39:31', '2023-07-27 10:39:31'),
(175, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-202307273oiigo7anDPr3VaQ163945', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:39:45', '2023-07-27 10:39:45'),
(176, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727ittKLZctUzpnum9k164005', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:40:05', '2023-07-27 10:40:05'),
(177, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727dHjcaORm86IKDKnC164036', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:40:36', '2023-07-27 10:40:36'),
(178, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727tOvEHV62S4EI5NC7164103', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:41:03', '2023-07-27 10:41:03'),
(179, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'login', 'admin', 'auth', 'Gw9tUhZTgz', 'Logged in', '2023-07-27', 'July', 2023, '2023-07-27 10:42:14', '2023-07-27 10:42:14'),
(180, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727GRFl2fWmUrxJXLaf164504', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:45:04', '2023-07-27 10:45:04'),
(181, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727UuG9Yt6SPisq1b0p164524', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:45:24', '2023-07-27 10:45:24'),
(182, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727QmV6ksQCo9yDZaCQ164540', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:45:40', '2023-07-27 10:45:40'),
(183, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727RpALztEvZctcwokb164551', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:45:51', '2023-07-27 10:45:51'),
(184, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727gVfJisFfh6LaUXm4164614', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:46:14', '2023-07-27 10:46:14'),
(185, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727TMVWgOuHZ9kzA1Dd164629', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:46:29', '2023-07-27 10:46:29'),
(186, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727TNURrireLCXcCWKP164645', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:46:45', '2023-07-27 10:46:45'),
(187, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727coL3UKINmRnipHal164703', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:47:03', '2023-07-27 10:47:03'),
(188, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727ev1DOR1rWxcNzOjI164722', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:47:22', '2023-07-27 10:47:22'),
(189, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727fdSmPgD51lz5p8OG164756', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:47:56', '2023-07-27 10:47:56'),
(190, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'update', 'admin', 'Category', 'category-20230727RpALztEvZctcwokb164551', 'Updated a Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:49:15', '2023-07-27 10:49:15'),
(191, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'update', 'admin', 'Category', 'category-20230727ev1DOR1rWxcNzOjI164722', 'Updated a Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:49:34', '2023-07-27 10:49:34'),
(192, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727vUqZOCHrZMWLhR6p165021', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:50:21', '2023-07-27 10:50:21'),
(193, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-2023072732J4XEClxZHNK46t165039', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:50:39', '2023-07-27 10:50:39'),
(194, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-202307274wOevUxvD2rqFWr2165104', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:51:04', '2023-07-27 10:51:04'),
(195, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-202307277HZu68OFGvWvvZb1165130', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:51:30', '2023-07-27 10:51:30'),
(196, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727giqgpPnS6tm5rfNL165227', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:52:27', '2023-07-27 10:52:27'),
(197, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727vkoNUZEC0ERDRrpK165252', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:52:52', '2023-07-27 10:52:52');
INSERT INTO `activities` (`id`, `activity_id`, `activist_id`, `activity_type`, `activity_for`, `activity_zone`, `reference_id`, `activity_info`, `activity_date`, `activity_month`, `activity_year`, `created_at`, `updated_at`) VALUES
(198, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727uy3bjWyHSOg5nsjn165315', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:53:15', '2023-07-27 10:53:15'),
(199, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727k6r3LmaKT2nk9N2G165334', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:53:34', '2023-07-27 10:53:34'),
(200, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727Ja6c2szNjyRLIut7165359', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:53:59', '2023-07-27 10:53:59'),
(201, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727H4V1OyI9YeuH14pg165427', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:54:27', '2023-07-27 10:54:27'),
(202, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727rIIfq2hHwJvvOFfT165507', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:55:07', '2023-07-27 10:55:07'),
(203, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-202307276iLSo9X575xhOMEt165523', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:55:23', '2023-07-27 10:55:23'),
(204, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727BoncXB2FT58h4YEd165646', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:56:46', '2023-07-27 10:56:46'),
(205, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727tUtiI1nGv4MMkuPj165703', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:57:03', '2023-07-27 10:57:03'),
(206, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727Ww24mPvTto7QXCoI165726', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:57:26', '2023-07-27 10:57:26'),
(207, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727mmP98oUpR3Gb2zrL165825', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:58:25', '2023-07-27 10:58:25'),
(208, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-202307271XPs8UzhgpUBNWjA165841', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:58:41', '2023-07-27 10:58:41'),
(209, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727Y6SxmimMHW9WYtas165856', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:58:56', '2023-07-27 10:58:56'),
(210, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727OCMtxJoQegGVDkxX165940', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 10:59:40', '2023-07-27 10:59:40'),
(211, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727DvbYCeGmagOIRkCR170030', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:00:30', '2023-07-27 11:00:30'),
(212, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727dP4E2QQGoC9axKVx170050', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:00:50', '2023-07-27 11:00:50'),
(213, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727kmlc1FpH5FmAwZlS170104', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:01:04', '2023-07-27 11:01:04'),
(214, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727HmYAbwJYIfmF6zIf170121', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:01:21', '2023-07-27 11:01:21'),
(215, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727BO3sEBj2HNqZ5FpS170136', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:01:36', '2023-07-27 11:01:36'),
(216, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727AjMbY8kihu1rEHmB170150', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:01:50', '2023-07-27 11:01:50'),
(217, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727Nu2gnwkVxpa4c0Kh170209', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:02:09', '2023-07-27 11:02:09'),
(218, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727dTHSZghSu7kcQpSv170234', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:02:34', '2023-07-27 11:02:34'),
(219, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-202307271065azzEer2exve9170246', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:02:46', '2023-07-27 11:02:46'),
(220, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727R1Ddeq1KHi9RYiFG170335', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:03:35', '2023-07-27 11:03:35'),
(221, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727lFC2fTZwugPhl7EF170407', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:04:07', '2023-07-27 11:04:07'),
(222, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727DELTVSw7K2hl2oRQ170436', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:04:36', '2023-07-27 11:04:36'),
(223, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727HogNuPHN7ykFlMUq170557', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:05:57', '2023-07-27 11:05:57'),
(224, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727YA8WCju2BiCfFo50171224', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:12:24', '2023-07-27 11:12:24'),
(225, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727sy8bbYmicFUnKWnp171907', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:19:07', '2023-07-27 11:19:07'),
(226, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727egDMcwqmI6nOTyXu171921', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:19:21', '2023-07-27 11:19:21'),
(227, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727yktpAd7kPBpCOAa2172010', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:20:10', '2023-07-27 11:20:10'),
(228, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727tMNXnR3AT1sh0hSq172128', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:21:28', '2023-07-27 11:21:28'),
(229, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-2023072701BS22VyGTosgeaY172146', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:21:46', '2023-07-27 11:21:46'),
(230, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727mN3etH1W4vKZdlTq172204', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:22:04', '2023-07-27 11:22:04'),
(231, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727GFcORpgOuTT32qKm172220', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:22:20', '2023-07-27 11:22:20'),
(232, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-202307277qrJvuk0ee1Ahmrc172236', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:22:36', '2023-07-27 11:22:36'),
(233, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727nRvjO1dI1MCZ7lO1172306', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:23:06', '2023-07-27 11:23:06'),
(234, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727ZTTPeUAkZp60GCat172321', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:23:21', '2023-07-27 11:23:21'),
(235, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727mvfPIc2i0lAWd0E8172335', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:23:35', '2023-07-27 11:23:35'),
(236, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727NnmnTBhirGLhZPXH172348', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:23:48', '2023-07-27 11:23:48'),
(237, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'create', 'admin', 'Category', 'category-20230727e3bmvSFCBvLMVqcB172409', 'Created a new Category:', '2023-07-27', 'July', 2023, '2023-07-27 11:24:09', '2023-07-27 11:24:09'),
(238, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'login', 'admin', 'auth', 'Gw9tUhZTgz', 'Logged in', '2023-07-27', 'July', 2023, '2023-07-27 13:35:17', '2023-07-27 13:35:17'),
(239, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'login', 'admin', 'auth', 'Gw9tUhZTgz', 'Logged in', '2023-07-27', 'July', 2023, '2023-07-27 14:32:55', '2023-07-27 14:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `reg_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `user_id`, `agency_id`, `name`, `pic`, `bio`, `reg_no`, `created_by`, `updated_by`, `deleted_by`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'provider-202307251ep2QCCalH3sRDnj232812', 'agency-202307318iz1jizy6NGE2sWS161311', 'hrt6', NULL, 'yrrtggy', '2422', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 0, '2023-07-31 10:13:11', '2023-07-31 10:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `agency_members`
--

CREATE TABLE `agency_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agency_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssn` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_id`, `parent_id`, `category_name`, `category_type`, `created_by`, `updated_by`, `deleted_by`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'category-20230725mVgWIIBEb4suQvOC235914', NULL, 'Plumbing', 'skill', 'Gw9tUhZTgz', NULL, 'Gw9tUhZTgz', 0, 1, '2023-07-25 17:59:14', '2023-07-25 18:00:57'),
(2, 'category-20230726Op5uODHZfYWRiqbD000041', 'category-20230725mVgWIIBEb4suQvOC235914', 'Maintenance', 'skill', 'Gw9tUhZTgz', NULL, 'Gw9tUhZTgz', 0, 1, '2023-07-25 18:00:41', '2023-07-25 18:00:53'),
(3, 'category-202307265g0JjhPwBBbVducT000105', NULL, 'Maintenance & Repairs', 'skill', 'Gw9tUhZTgz', 'Gw9tUhZTgz', NULL, 0, 0, '2023-07-25 18:01:05', '2023-07-25 18:01:30'),
(4, 'category-20230726b9pNlBFo8dNJnHS9000152', 'category-202307265g0JjhPwBBbVducT000105', 'Plumbing', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-25 18:01:52', '2023-07-25 18:01:52'),
(5, 'category-20230726E63H9mCbVBxoHsGs000249', 'category-20230726b9pNlBFo8dNJnHS9000152', 'Leakage Repairing', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-25 18:02:49', '2023-07-25 18:02:49'),
(6, 'category-20230726q5uvxM6QIELho5eZ224500', 'category-20230726b9pNlBFo8dNJnHS9000152', 'Drain cleaning', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-26 16:45:00', '2023-07-26 16:45:00'),
(7, 'category-20230726SptbuqgeetU28XGT224646', 'category-20230726b9pNlBFo8dNJnHS9000152', 'Pipe installations', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-26 16:46:46', '2023-07-26 16:46:46'),
(8, 'category-202307264SivJJlFa1ys7rQ4224841', 'category-20230726b9pNlBFo8dNJnHS9000152', 'Toilet repairs', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-26 16:48:41', '2023-07-26 16:48:41'),
(9, 'category-20230727xjjFB7EVEjOi3K59133038', 'category-202307265g0JjhPwBBbVducT000105', 'Electrical', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 07:30:38', '2023-07-27 07:30:38'),
(10, 'category-20230727cbiEVbUb6jw5ravy133218', 'category-20230727xjjFB7EVEjOi3K59133038', 'Wiring and rewiring', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 07:32:18', '2023-07-27 07:32:18'),
(11, 'category-20230727i4cCOfCPMlvuUfLm133303', 'category-20230727xjjFB7EVEjOi3K59133038', 'Lighting installations', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 07:33:03', '2023-07-27 07:33:03'),
(12, 'category-20230727uboUchPszrKVG0Uq133328', 'category-20230727xjjFB7EVEjOi3K59133038', 'Circuit breaker replacements', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 07:33:28', '2023-07-27 07:33:28'),
(13, 'category-20230727unFxccNXMWBkpS5k133343', 'category-20230727xjjFB7EVEjOi3K59133038', 'Outlet and switch repairs', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 07:33:43', '2023-07-27 07:33:43'),
(14, 'category-20230727c5Al53AJNfunC2vS133411', 'category-202307265g0JjhPwBBbVducT000105', 'HVAC', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 07:34:11', '2023-07-27 07:34:11'),
(15, 'category-20230727qZIa7epUGtZkorFu133448', 'category-20230727c5Al53AJNfunC2vS133411', 'Air conditioning installation and repair', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 07:34:48', '2023-07-27 07:34:48'),
(16, 'category-20230727rGI7XZNyy1YRBpe8133503', 'category-20230727c5Al53AJNfunC2vS133411', 'Heating system maintenance', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 07:35:03', '2023-07-27 07:35:03'),
(17, 'category-20230727bJJ0Ohb0UF9lrWjc133520', 'category-20230727c5Al53AJNfunC2vS133411', 'Air duct cleaning', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 07:35:20', '2023-07-27 07:35:20'),
(18, 'category-20230727ePIJGse8x2mdGRpi133543', 'category-20230727c5Al53AJNfunC2vS133411', 'Thermostat installation', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 07:35:43', '2023-07-27 07:35:43'),
(19, 'category-20230727E4NgNLTse9mJlwGq133602', 'category-202307265g0JjhPwBBbVducT000105', 'Appliance Repair', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 07:36:02', '2023-07-27 07:36:02'),
(20, 'category-202307274WFAAW5MV1D6oRz9133616', 'category-20230727E4NgNLTse9mJlwGq133602', 'Refrigerator repairs', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 07:36:16', '2023-07-27 07:36:16'),
(21, 'category-20230727RDhJZGnfhFwSYM1B133630', 'category-20230727E4NgNLTse9mJlwGq133602', 'Washer and dryer servicing', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 07:36:30', '2023-07-27 07:36:30'),
(22, 'category-20230727pRvlMfSNYjFLA3eb133648', 'category-20230727E4NgNLTse9mJlwGq133602', 'Oven and stove repairs', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 07:36:48', '2023-07-27 07:36:48'),
(23, 'category-20230727Nso8ubxG89dvI7NV133706', 'category-20230727E4NgNLTse9mJlwGq133602', 'Dishwasher troubleshooting', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 07:37:06', '2023-07-27 07:37:06'),
(24, 'category-20230727GCe9RjhmvrlQkNga133736', NULL, 'Renovation and Remodeling', 'skill', 'Gw9tUhZTgz', NULL, 'Gw9tUhZTgz', 0, 1, '2023-07-27 07:37:36', '2023-07-27 10:34:53'),
(25, 'category-20230727JjXw9esqpbWba1Oe163826', NULL, 'Renovation and Remodeling', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:38:26', '2023-07-27 10:38:26'),
(26, 'category-20230727tGVkH1FmDRB9Vhnd163903', 'category-20230727JjXw9esqpbWba1Oe163826', 'Kitchen Renovation', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:39:03', '2023-07-27 10:39:03'),
(27, 'category-20230727EgIPhILYZ3JsR3jY163917', 'category-20230727tGVkH1FmDRB9Vhnd163903', 'Cabinet installations', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:39:17', '2023-07-27 10:39:17'),
(28, 'category-20230727s47e6pWQMbjqFNrR163931', 'category-20230727tGVkH1FmDRB9Vhnd163903', 'Countertop replacements', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:39:31', '2023-07-27 10:39:31'),
(29, 'category-202307273oiigo7anDPr3VaQ163945', 'category-20230727tGVkH1FmDRB9Vhnd163903', 'Tile backsplash installations', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:39:45', '2023-07-27 10:39:45'),
(30, 'category-20230727ittKLZctUzpnum9k164005', 'category-20230727tGVkH1FmDRB9Vhnd163903', 'Appliance upgrades', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:40:05', '2023-07-27 10:40:05'),
(31, 'category-20230727dHjcaORm86IKDKnC164036', 'category-20230727JjXw9esqpbWba1Oe163826', 'Bathroom Remodeling', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:40:36', '2023-07-27 10:40:36'),
(32, 'category-20230727tOvEHV62S4EI5NC7164103', 'category-20230727dHjcaORm86IKDKnC164036', 'Shower and bathtub installations', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:41:03', '2023-07-27 10:41:03'),
(33, 'category-20230727GRFl2fWmUrxJXLaf164504', 'category-20230727dHjcaORm86IKDKnC164036', 'Vanity replacements', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:45:04', '2023-07-27 10:45:04'),
(34, 'category-20230727UuG9Yt6SPisq1b0p164524', 'category-20230727dHjcaORm86IKDKnC164036', 'Tile flooring and wall installations', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:45:24', '2023-07-27 10:45:24'),
(35, 'category-20230727QmV6ksQCo9yDZaCQ164540', 'category-20230727dHjcaORm86IKDKnC164036', 'Plumbing fixture upgrades', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:45:40', '2023-07-27 10:45:40'),
(36, 'category-20230727RpALztEvZctcwokb164551', 'category-20230727JjXw9esqpbWba1Oe163826', 'Basement Finishing', 'skill', 'Gw9tUhZTgz', 'Gw9tUhZTgz', NULL, 0, 0, '2023-07-27 10:45:51', '2023-07-27 10:49:15'),
(37, 'category-20230727gVfJisFfh6LaUXm4164614', 'category-20230727RpALztEvZctcwokb164551', 'Drywall installation', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:46:14', '2023-07-27 10:46:14'),
(38, 'category-20230727TMVWgOuHZ9kzA1Dd164629', 'category-20230727RpALztEvZctcwokb164551', 'Flooring installations', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:46:29', '2023-07-27 10:46:29'),
(39, 'category-20230727TNURrireLCXcCWKP164645', 'category-20230727RpALztEvZctcwokb164551', 'Basement waterproofing', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:46:45', '2023-07-27 10:46:45'),
(40, 'category-20230727coL3UKINmRnipHal164703', 'category-20230727RpALztEvZctcwokb164551', 'Lighting and electrical enhancements', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:47:03', '2023-07-27 10:47:03'),
(41, 'category-20230727ev1DOR1rWxcNzOjI164722', 'category-20230727JjXw9esqpbWba1Oe163826', 'Room Additions', 'skill', 'Gw9tUhZTgz', 'Gw9tUhZTgz', NULL, 0, 0, '2023-07-27 10:47:22', '2023-07-27 10:49:34'),
(42, 'category-20230727fdSmPgD51lz5p8OG164756', 'category-20230727ev1DOR1rWxcNzOjI164722', 'Foundation and structural work', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:47:56', '2023-07-27 10:47:56'),
(43, 'category-20230727vUqZOCHrZMWLhR6p165021', 'category-20230727ev1DOR1rWxcNzOjI164722', 'Framing and roofing', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:50:21', '2023-07-27 10:50:21'),
(44, 'category-2023072732J4XEClxZHNK46t165039', 'category-20230727ev1DOR1rWxcNzOjI164722', 'Flooring and wall installations', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:50:39', '2023-07-27 10:50:39'),
(45, 'category-202307274wOevUxvD2rqFWr2165104', 'category-20230727ev1DOR1rWxcNzOjI164722', 'Window and door installations', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:51:04', '2023-07-27 10:51:04'),
(46, 'category-202307277HZu68OFGvWvvZb1165130', NULL, 'Outdoor Services', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:51:30', '2023-07-27 10:51:30'),
(47, 'category-20230727giqgpPnS6tm5rfNL165227', 'category-202307277HZu68OFGvWvvZb1165130', 'Landscaping and Gardening', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:52:27', '2023-07-27 10:52:27'),
(48, 'category-20230727vkoNUZEC0ERDRrpK165252', 'category-20230727giqgpPnS6tm5rfNL165227', 'Lawn maintenance', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:52:52', '2023-07-27 10:52:52'),
(49, 'category-20230727uy3bjWyHSOg5nsjn165315', 'category-20230727giqgpPnS6tm5rfNL165227', 'Planting and pruning', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:53:15', '2023-07-27 10:53:15'),
(50, 'category-20230727k6r3LmaKT2nk9N2G165334', 'category-20230727giqgpPnS6tm5rfNL165227', 'Irrigation system installations', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:53:34', '2023-07-27 10:53:34'),
(51, 'category-20230727Ja6c2szNjyRLIut7165359', 'category-20230727giqgpPnS6tm5rfNL165227', 'Garden design and landscaping', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:53:59', '2023-07-27 10:53:59'),
(52, 'category-20230727H4V1OyI9YeuH14pg165427', 'category-202307277HZu68OFGvWvvZb1165130', 'Pool and Spa Services', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:54:27', '2023-07-27 10:54:27'),
(53, 'category-20230727rIIfq2hHwJvvOFfT165507', 'category-20230727H4V1OyI9YeuH14pg165427', 'Pool cleaning and maintenance', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:55:07', '2023-07-27 10:55:07'),
(54, 'category-202307276iLSo9X575xhOMEt165523', 'category-20230727H4V1OyI9YeuH14pg165427', 'Chemical balancing', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:55:23', '2023-07-27 10:55:23'),
(55, 'category-20230727BoncXB2FT58h4YEd165646', 'category-20230727H4V1OyI9YeuH14pg165427', 'Equipment repairs and upgrades', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:56:46', '2023-07-27 10:56:46'),
(56, 'category-20230727tUtiI1nGv4MMkuPj165703', 'category-20230727H4V1OyI9YeuH14pg165427', 'Spa and hot tub installations', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:57:03', '2023-07-27 10:57:03'),
(57, 'category-20230727Ww24mPvTto7QXCoI165726', 'category-202307277HZu68OFGvWvvZb1165130', 'Deck and Patio', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:57:26', '2023-07-27 10:57:26'),
(58, 'category-20230727mmP98oUpR3Gb2zrL165825', 'category-20230727Ww24mPvTto7QXCoI165726', 'Deck construction and repair', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:58:25', '2023-07-27 10:58:25'),
(59, 'category-202307271XPs8UzhgpUBNWjA165841', 'category-20230727Ww24mPvTto7QXCoI165726', 'Patio installations', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:58:41', '2023-07-27 10:58:41'),
(60, 'category-20230727Y6SxmimMHW9WYtas165856', 'category-20230727Ww24mPvTto7QXCoI165726', 'Fence installations', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:58:56', '2023-07-27 10:58:56'),
(61, 'category-20230727OCMtxJoQegGVDkxX165940', 'category-20230727Ww24mPvTto7QXCoI165726', 'Outdoor lighting and amenities', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 10:59:40', '2023-07-27 10:59:40'),
(62, 'category-20230727DvbYCeGmagOIRkCR170030', NULL, 'Cleaning and Organization', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:00:30', '2023-07-27 11:00:30'),
(63, 'category-20230727dP4E2QQGoC9axKVx170050', 'category-20230727DvbYCeGmagOIRkCR170030', 'House Cleaning', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:00:50', '2023-07-27 11:00:50'),
(64, 'category-20230727kmlc1FpH5FmAwZlS170104', 'category-20230727dP4E2QQGoC9axKVx170050', 'Regular cleaning services', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:01:04', '2023-07-27 11:01:04'),
(65, 'category-20230727HmYAbwJYIfmF6zIf170121', 'category-20230727dP4E2QQGoC9axKVx170050', 'Deep cleaning and move-in/move-out cleaning', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:01:21', '2023-07-27 11:01:21'),
(66, 'category-20230727BO3sEBj2HNqZ5FpS170136', 'category-20230727dP4E2QQGoC9axKVx170050', 'Window washing', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:01:36', '2023-07-27 11:01:36'),
(67, 'category-20230727AjMbY8kihu1rEHmB170150', 'category-20230727dP4E2QQGoC9axKVx170050', 'Carpet and upholstery cleaning', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:01:50', '2023-07-27 11:01:50'),
(68, 'category-20230727Nu2gnwkVxpa4c0Kh170209', 'category-20230727DvbYCeGmagOIRkCR170030', 'Home Organization', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:02:09', '2023-07-27 11:02:09'),
(69, 'category-20230727dTHSZghSu7kcQpSv170234', 'category-20230727Nu2gnwkVxpa4c0Kh170209', 'Closet organization', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:02:34', '2023-07-27 11:02:34'),
(70, 'category-202307271065azzEer2exve9170246', 'category-20230727Nu2gnwkVxpa4c0Kh170209', 'Garage organization', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:02:46', '2023-07-27 11:02:46'),
(71, 'category-20230727R1Ddeq1KHi9RYiFG170335', 'category-20230727Nu2gnwkVxpa4c0Kh170209', 'Home office setup', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:03:35', '2023-07-27 11:03:35'),
(72, 'category-20230727lFC2fTZwugPhl7EF170407', 'category-20230727Nu2gnwkVxpa4c0Kh170209', 'Storage solutions', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:04:07', '2023-07-27 11:04:07'),
(73, 'category-20230727DELTVSw7K2hl2oRQ170436', NULL, 'Security and Safety', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:04:36', '2023-07-27 11:04:36'),
(74, 'category-20230727HogNuPHN7ykFlMUq170557', 'category-20230727DELTVSw7K2hl2oRQ170436', 'Home Security Systems', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:05:57', '2023-07-27 11:05:57'),
(75, 'category-20230727YA8WCju2BiCfFo50171224', 'category-20230727HogNuPHN7ykFlMUq170557', 'Alarm system installations', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:12:24', '2023-07-27 11:12:24'),
(76, 'category-20230727sy8bbYmicFUnKWnp171907', 'category-20230727HogNuPHN7ykFlMUq170557', 'Surveillance camera installations', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:19:07', '2023-07-27 11:19:07'),
(77, 'category-20230727egDMcwqmI6nOTyXu171921', 'category-20230727HogNuPHN7ykFlMUq170557', 'Access control systems', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:19:21', '2023-07-27 11:19:21'),
(78, 'category-20230727yktpAd7kPBpCOAa2172010', 'category-20230727HogNuPHN7ykFlMUq170557', 'Monitoring services', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:20:10', '2023-07-27 11:20:10'),
(79, 'category-20230727tMNXnR3AT1sh0hSq172128', 'category-20230727DELTVSw7K2hl2oRQ170436', 'Fire and Smoke Safety', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:21:28', '2023-07-27 11:21:28'),
(80, 'category-2023072701BS22VyGTosgeaY172146', 'category-20230727tMNXnR3AT1sh0hSq172128', 'Smoke detector installations', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:21:46', '2023-07-27 11:21:46'),
(81, 'category-20230727mN3etH1W4vKZdlTq172204', 'category-20230727tMNXnR3AT1sh0hSq172128', 'Fire extinguisher placements', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:22:04', '2023-07-27 11:22:04'),
(82, 'category-20230727GFcORpgOuTT32qKm172220', 'category-20230727tMNXnR3AT1sh0hSq172128', 'Fire alarm system maintenance', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:22:20', '2023-07-27 11:22:20'),
(83, 'category-202307277qrJvuk0ee1Ahmrc172236', 'category-20230727tMNXnR3AT1sh0hSq172128', 'Fire escape planning', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:22:36', '2023-07-27 11:22:36'),
(84, 'category-20230727nRvjO1dI1MCZ7lO1172306', 'category-20230727DELTVSw7K2hl2oRQ170436', 'Childproofing and Elderly Safety', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:23:06', '2023-07-27 11:23:06'),
(85, 'category-20230727ZTTPeUAkZp60GCat172321', 'category-20230727nRvjO1dI1MCZ7lO1172306', 'Babyproofing services', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:23:21', '2023-07-27 11:23:21'),
(86, 'category-20230727mvfPIc2i0lAWd0E8172335', 'category-20230727nRvjO1dI1MCZ7lO1172306', 'Handrail installations', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:23:35', '2023-07-27 11:23:35'),
(87, 'category-20230727NnmnTBhirGLhZPXH172348', 'category-20230727nRvjO1dI1MCZ7lO1172306', 'Accessibility modifications', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:23:48', '2023-07-27 11:23:48'),
(88, 'category-20230727e3bmvSFCBvLMVqcB172409', 'category-20230727nRvjO1dI1MCZ7lO1172306', 'Bathroom safety enhancements', 'skill', 'Gw9tUhZTgz', NULL, NULL, 0, 0, '2023-07-27 11:24:09', '2023-07-27 11:24:09');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_for` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workorder_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workorder_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workorder_price` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_charge` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workorder_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jobtype_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_05_22_091613_create_v_codes_table', 1),
(7, '2023_05_27_031510_create_activities_table', 1),
(8, '2023_05_27_031754_create_user_logins_table', 1),
(9, '2023_05_29_095628_create_workorders_table', 1),
(10, '2023_05_30_064050_create_categories_table', 1),
(11, '2023_06_01_062728_create_workorder_reviews_table', 1),
(12, '2023_06_04_054950_create_workorder_images_table', 1),
(13, '2023_06_04_093832_create_notifications_table', 1),
(14, '2023_06_08_025515_create_invoices_table', 1),
(15, '2023_06_12_072827_create_user_infos_table', 1),
(16, '2023_06_21_093914_create_workorder_statuses_table', 1),
(17, '2023_06_24_063115_create_role_permissions_table', 1),
(18, '2023_07_08_151145_create_work_zones_table', 1),
(19, '2023_07_09_121605_create_work_times_table', 1),
(20, '2023_07_10_085424_create_skills_table', 1),
(21, '2023_07_12_174205_create_workorder_providers_table', 1),
(22, '2023_07_13_105436_create_phone_managers_table', 1),
(23, '2023_07_16_133049_create_workorder_categories_table', 1),
(24, '2023_07_17_092950_create_agencies_table', 1),
(25, '2023_07_17_094300_create_agency_members_table', 1),
(26, '2023_07_18_100306_create_workorder_notes_table', 1),
(27, '2023_07_19_124038_create_job_types_table', 1),
(28, '2023_07_20_094949_create_skill_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notification_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workorder_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notificable_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referred_user` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci,
  `route_panel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perameters` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT '0',
  `is_notified` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notification_id`, `workorder_id`, `type`, `reference_id`, `notificable_user`, `referred_user`, `data`, `route_panel`, `route_path`, `perameters`, `icon`, `is_seen`, `is_notified`, `created_at`, `updated_at`) VALUES
(1, 'notification-20230725nN8gi475hmT2cY1e233512', NULL, 'login', 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'provider-202307251ep2QCCalH3sRDnj232812', 'Bijoy Kumar Nathsigned in.', NULL, '', NULL, NULL, 0, 1, '2023-07-25 17:35:12', '2023-07-27 07:43:29'),
(2, 'notification-20230725t1G5gQT5pYxOqCeh235331', NULL, 'login', 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'provider-202307251ep2QCCalH3sRDnj232812', 'Bijoy Kumar Nathsigned in.', NULL, '', NULL, NULL, 0, 1, '2023-07-25 17:53:31', '2023-07-27 07:43:29'),
(3, 'notification-202307268MeCtE6asczizst7003627', 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'on_the_way', 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'receiver-20230725z3Xi6ak1A1SILfeD233027', 'provider-202307251ep2QCCalH3sRDnj232812', 'Provider is on the way', NULL, '', NULL, NULL, 0, 0, '2023-07-25 18:36:27', '2023-07-25 18:36:27'),
(4, 'notification-20230726snC97uGZ57yqXYXg003633', 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'started', 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'receiver-20230725z3Xi6ak1A1SILfeD233027', 'provider-202307251ep2QCCalH3sRDnj232812', 'Workorder start', NULL, '', NULL, NULL, 0, 0, '2023-07-25 18:36:33', '2023-07-25 18:36:33'),
(5, 'notification-20230726FVpv36SX4q3815EZ091832', NULL, 'login', 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'provider-202307251ep2QCCalH3sRDnj232812', 'Bijoy Kumar Nathsigned in.', NULL, '', NULL, NULL, 0, 1, '2023-07-26 03:18:32', '2023-07-27 07:43:29'),
(6, 'notification-20230726DWsBaGnCWMkUMsoo091914', NULL, 'login', 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'provider-202307251ep2QCCalH3sRDnj232812', 'Bijoy Kumar Nathsigned in.', NULL, '', NULL, NULL, 0, 1, '2023-07-26 03:19:14', '2023-07-27 07:43:29'),
(7, 'notification-20230727wWOJvcplmTati3cb203255', NULL, 'login', 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'Gw9tUhZTgz', 'Mr Adminsigned in.', NULL, '', NULL, NULL, 0, 1, '2023-07-27 14:32:55', '2023-07-27 14:35:32');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phone_managers`
--

CREATE TABLE `phone_managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tracking_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_sid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchased_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `released_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_released` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` tinyint(1) DEFAULT '0',
  `can_category_create` tinyint(1) DEFAULT '0',
  `can_category_update` tinyint(1) DEFAULT '0',
  `can_category_delete` tinyint(1) DEFAULT '0',
  `receiver` tinyint(1) DEFAULT '0',
  `can_receiver_create` tinyint(1) DEFAULT '0',
  `can_receiver_view` tinyint(1) DEFAULT '0',
  `can_receiver_update` tinyint(1) DEFAULT '0',
  `can_receiver_delete` tinyint(1) DEFAULT '0',
  `provider` tinyint(1) DEFAULT '0',
  `can_provider_create` tinyint(1) DEFAULT '0',
  `can_provider_view` tinyint(1) DEFAULT '0',
  `can_provider_update` tinyint(1) DEFAULT '0',
  `can_provider_delete` tinyint(1) DEFAULT '0',
  `member` tinyint(1) DEFAULT '0',
  `can_member_create` tinyint(1) DEFAULT '0',
  `can_member_view` tinyint(1) DEFAULT '0',
  `can_member_update` tinyint(1) DEFAULT '0',
  `can_member_delete` tinyint(1) DEFAULT '0',
  `workorder` tinyint(1) DEFAULT '0',
  `can_workorder_create` tinyint(1) DEFAULT '0',
  `can_workorder_view` tinyint(1) DEFAULT '0',
  `can_workorder_update` tinyint(1) DEFAULT '0',
  `can_workorder_delete` tinyint(1) DEFAULT '0',
  `role` tinyint(1) DEFAULT '0',
  `can_role_create` tinyint(1) DEFAULT '0',
  `can_role_manager` tinyint(1) DEFAULT '0',
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skill_categories`
--

CREATE TABLE `skill_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum_price` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_no` bigint(20) DEFAULT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skill_categories`
--

INSERT INTO `skill_categories` (`id`, `provider_id`, `category_id`, `minimum_price`, `serial_no`, `created_by`, `updated_by`, `deleted_by`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'provider-20230725qnL71lTFBaV3dzRA235924', 'category-20230725mVgWIIBEb4suQvOC235914', '100', NULL, 'Gw9tUhZTgz', NULL, NULL, 1, 1, '2023-07-25 17:59:53', '2023-07-25 18:04:15'),
(2, 'provider-20230725qnL71lTFBaV3dzRA235924', 'category-202307265g0JjhPwBBbVducT000105', '100', NULL, 'Gw9tUhZTgz', NULL, NULL, 1, 0, '2023-07-25 18:04:22', '2023-07-25 18:04:22'),
(3, 'provider-202307251ep2QCCalH3sRDnj232812', 'category-202307265g0JjhPwBBbVducT000105', '2666', NULL, 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 0, '2023-07-25 18:13:43', '2023-07-25 18:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` text COLLATE utf8mb4_unicode_ci,
  `last_name` text COLLATE utf8mb4_unicode_ci,
  `user_type` text COLLATE utf8mb4_unicode_ci,
  `pro_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `notification_token` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_deactive` tinyint(1) NOT NULL DEFAULT '0',
  `deactivation_cause` text COLLATE utf8mb4_unicode_ci,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_loggedin` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `role_id`, `first_name`, `last_name`, `user_type`, `pro_pic`, `email`, `phone`, `note`, `bio`, `notification_token`, `password`, `pass`, `remember_token`, `created_by`, `updated_by`, `deleted_by`, `is_verified`, `is_active`, `is_deactive`, `deactivation_cause`, `is_deleted`, `is_admin`, `is_loggedin`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'Gw9tUhZTgz', NULL, 'Mr', 'Admin', 'admin', NULL, 'admin@trybpoltd.com', '1-224-779-1450', NULL, NULL, 'eLiBAHxPSEiKi6kZzlAdzp:APA91bF785HNfLOMDKKS-TxsAEZ6mdzGZ4mGKU5rM93MLfxN-oJjWWeYXQ3TkrKiqW7xgif5B3x3Iq_wBUfDE7d90VZyfGXWtjsz3pNOkMcisq2Jhwcj8PAcoHL8Vkkdbw6l3v99JMqo', '$2y$10$IcwWKf6rOYK4sReb/6gdEOeU2mTLE5nCs.Nh3/8riUf6aJKbSAL6G', NULL, 'pPtqfyPbcm', NULL, NULL, NULL, 1, 1, 0, NULL, 0, 1, 1, '2023-07-25 06:52:30', '2023-07-25 06:52:30', '2023-07-27 14:32:55'),
(2, 'provider-202307251ep2QCCalH3sRDnj232812', NULL, 'Bijoy Kumar', 'Nath', 'provider', 'f7VfFK1kDA20230727133701.jpg', 'bijoykumarnath999@gmail.com', '01831980819', NULL, 'bioooooo bioooooo bioooooo', 'e8jDACoKRG20xN1qp8kf7P:APA91bHk8ul1s1fHtGItY5pf_7LNltmqMNaVF37G9SR4fryUCGdPSHfq71XehCCs8Oqw4opsWs4bnhqlmzDjryMNUzKPm0WN5c3m_HLxVPRz3ROGXXe0w9Nd7rk_qEuxJvs8ivuNPFA3', '$2y$10$whUsnfktrL94EBlkmMlZ5eINiHLFEgDDGia47HjCWvP5D.aQu3xpi', 'eyJpdiI6ImloZ1VCTVFLMlUzMnRZcnRndTJjekE9PSIsInZhbHVlIjoiNHo5RmFEOGRPMXZURUlOMFUxYlZFQT09IiwibWFjIjoiOGY4OGFmZjE2MGMzMzAzZDhlODRkNGY2ZWFjNGMwODVmMTI2ZGYwYzM2ZTlhYTU4ZGRmNzFiZmUxZWQxMjA2MSIsInRhZyI6IiJ9', NULL, 'Gw9tUhZTgz', NULL, NULL, 1, 1, 0, NULL, 0, 0, 1, NULL, '2023-07-25 17:28:12', '2023-07-31 08:42:11'),
(3, 'receiver-20230725z3Xi6ak1A1SILfeD233027', NULL, 'Tahsin', 'Bhai', 'receiver', NULL, 'tahsinbhai@gmail.com', '4404747376', NULL, NULL, 'JlUxCMi', '$2y$10$2kgKsdpTFVOH4YA..eg9kOfEpYNxkZrJ189sHg7PNQKYP4Hz0YRpi', NULL, NULL, 'Gw9tUhZTgz', NULL, NULL, 1, 1, 0, NULL, 0, 0, 0, NULL, '2023-07-25 17:30:27', '2023-07-25 17:30:27'),
(4, 'provider-20230725qnL71lTFBaV3dzRA235924', NULL, 'Tahasin', 'Islam', 'provider', NULL, 'admin@trybpoltd.com', '01780602502', NULL, NULL, 'Zzg2lLL', '$2y$10$YTyA.QrpARb7PzFXrU1loOmmw8PrT4RRCIUYNRsTR0pG1pT6kfnwe', 'eyJpdiI6IkJkR0Q3UVF0RTZVbGs0UmN6endqR0E9PSIsInZhbHVlIjoiMXBkT08vZjZkUFJCT25uWXVEUWFYQT09IiwibWFjIjoiYzY2OWQxMDkzN2M1YjU0YjM5ZWFmNzUzZTlkMDA0ODI2ODY2MjQyMDIxYjlmODk1OTBhYTA3M2Y5OGFiNWZmNyIsInRhZyI6IiJ9', NULL, 'Gw9tUhZTgz', NULL, NULL, 1, 1, 0, NULL, 0, 0, 0, NULL, '2023-07-25 17:59:24', '2023-07-25 18:05:49'),
(5, 'provider-20230726bPlRH6WJ6idZlP3k002259', NULL, NULL, NULL, 'provider', NULL, '01780602502', NULL, NULL, NULL, 'KwFsmXV', '$2y$10$Fja4TPlTXB7zc5r0JsokI.LtBIS/WqvJla6W52iMoFWy7cOa9LtvS', 'eyJpdiI6IkwxZ1pDeENJVHJaWDFGYU84NWNOcXc9PSIsInZhbHVlIjoiblA4QjBYTUhWYzJhRDZwRHI5K3YrZz09IiwibWFjIjoiMzYzNmFiNTJiNzU5NTJkMDQ5OWY2MzUwY2U5Y2Q0MzdhNzkyYjhhODQ5NzVjZWYwMDkyMWE0ZWViODc1NDRhNCIsInRhZyI6IiJ9', NULL, 'Gw9tUhZTgz', NULL, NULL, 1, 1, 0, NULL, 0, 0, 0, NULL, '2023-07-25 18:22:59', '2023-07-25 18:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE `user_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `minimum_price` text COLLATE utf8mb4_unicode_ci,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_infos`
--

INSERT INTO `user_infos` (`id`, `user_id`, `zip`, `state`, `city`, `country`, `address`, `minimum_price`, `created_by`, `updated_by`, `deleted_by`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'receiver-20230725z3Xi6ak1A1SILfeD233027', '1001', 'NY', 'NY', 'USA', 'NY', NULL, 'Gw9tUhZTgz', NULL, NULL, 1, 0, '2023-07-25 17:30:27', '2023-07-25 17:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activity_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_data` text COLLATE utf8mb4_unicode_ci,
  `login_timezone` text COLLATE utf8mb4_unicode_ci,
  `logout_timezone` text COLLATE utf8mb4_unicode_ci,
  `login_ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logout_ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_time` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logout_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logout_time` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_loggedin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `activity_id`, `user_id`, `device_id`, `device_data`, `login_timezone`, `logout_timezone`, `login_ip`, `logout_ip`, `login_date`, `login_time`, `logout_date`, `logout_time`, `is_loggedin`, `created_at`, `updated_at`) VALUES
(1, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'device-2023-07-25GBEPZ4BJoyjZJYjLkJlumbUoo9vv5R183836', NULL, 'Asia/Dhaka', NULL, '103.230.62.0', NULL, '2023-07-25', '18:52:40', NULL, NULL, 1, '2023-07-25 12:52:40', '2023-07-25 12:52:40'),
(2, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', NULL, NULL, 'Asia/Dhaka', NULL, '202.134.10.132', NULL, '2023-07-25', '23:27:03', NULL, NULL, 1, '2023-07-25 17:27:03', '2023-07-25 17:27:03'),
(3, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', '333ec9e51fa962b6', '{\"model\":\"RMX3471\",\"android_version\":\"33\",\"ip\":\"202.134.10.132\\n\"}', 'Asia/Dhaka', NULL, '202.134.10.132', NULL, '2023-07-25', '23:35:12', NULL, NULL, 1, '2023-07-25 17:35:12', '2023-07-25 17:35:12'),
(4, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', '8eab0a29f7ceee24', '{\"model\":\"RMX3471\",\"android_version\":\"33\",\"ip\":\"202.134.10.132\\n\"}', 'Asia/Dhaka', NULL, '202.134.10.132', NULL, '2023-07-25', '23:53:31', NULL, NULL, 1, '2023-07-25 17:53:31', '2023-07-25 17:53:31'),
(5, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', NULL, NULL, 'Asia/Dhaka', NULL, '103.103.98.28', NULL, '2023-07-25', '23:58:32', NULL, NULL, 1, '2023-07-25 17:58:32', '2023-07-25 17:58:32'),
(6, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', 'c24c39e6b1b05d88', '{\"model\":\"RMX3195\",\"android_version\":\"33\",\"ip\":\"103.230.62.2\\n\"}', 'Asia/Dhaka', NULL, '103.230.62.0', NULL, '2023-07-26', '09:18:32', NULL, NULL, 1, '2023-07-26 03:18:32', '2023-07-26 03:18:32'),
(7, 'activity-20230725CSNeBzrxBA40De6lvcb1233512', 'provider-202307251ep2QCCalH3sRDnj232812', '333ec9e51fa962b6', '{\"model\":\"RMX3471\",\"android_version\":\"33\",\"ip\":\"103.230.62.1\\n\"}', 'Asia/Dhaka', NULL, '103.230.62.0', NULL, '2023-07-26', '09:19:14', NULL, NULL, 1, '2023-07-26 03:19:14', '2023-07-26 03:19:14'),
(8, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', NULL, NULL, 'Asia/Dhaka', NULL, '103.136.98.11', NULL, '2023-07-26', '22:40:00', NULL, NULL, 1, '2023-07-26 16:40:00', '2023-07-26 16:40:00'),
(9, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', 'device-2023-07-26b7v2YfHSwvbxaJnsFYuOotCj66O3JO224000', NULL, 'Asia/Dhaka', NULL, '103.136.98.11', NULL, '2023-07-27', '16:37:38', NULL, NULL, 1, '2023-07-27 10:37:38', '2023-07-27 10:37:38'),
(10, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', NULL, NULL, 'Asia/Dhaka', NULL, '103.230.62.0', NULL, '2023-07-27', '16:42:14', NULL, NULL, 1, '2023-07-27 10:42:14', '2023-07-27 10:42:14'),
(11, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', NULL, NULL, 'Asia/Dhaka', NULL, '103.230.106.59', NULL, '2023-07-27', '19:35:17', NULL, NULL, 1, '2023-07-27 13:35:17', '2023-07-27 13:35:17'),
(12, 'activity-20230725debQ4rqJlmxDeht4rUua185240', 'Gw9tUhZTgz', '8878d6e6f2d0d2d8', '{\"model\":\"Redmi Note 8\",\"android_version\":\"30\",\"ip\":\"103.136.98.9\\n\"}', 'Asia/Dhaka', NULL, '103.136.98.11', NULL, '2023-07-27', '20:32:55', NULL, NULL, 1, '2023-07-27 14:32:55', '2023-07-27 14:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `v_codes`
--

CREATE TABLE `v_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tracking_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_validated` tinyint(1) NOT NULL DEFAULT '0',
  `is_expired` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workorders`
--

CREATE TABLE `workorders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workorder_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workorder_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ratings` tinyint(1) DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_accepted` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `provider_accepted` tinyint(1) NOT NULL DEFAULT '0',
  `receiver_accepted` tinyint(1) NOT NULL DEFAULT '0',
  `is_rejected` tinyint(1) NOT NULL DEFAULT '0',
  `is_cancelled_p` tinyint(1) NOT NULL DEFAULT '0',
  `is_cancelled_r` tinyint(1) NOT NULL DEFAULT '0',
  `is_on_the_way` tinyint(1) NOT NULL DEFAULT '0',
  `is_reached` tinyint(1) NOT NULL DEFAULT '0',
  `is_started` tinyint(1) NOT NULL DEFAULT '0',
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `is_completed_p` tinyint(1) NOT NULL DEFAULT '0',
  `is_completed_r` tinyint(1) NOT NULL DEFAULT '0',
  `is_closed` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted_p` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted_r` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workorders`
--

INSERT INTO `workorders` (`id`, `workorder_id`, `workorder_no`, `provider_id`, `receiver_id`, `category_id`, `address`, `date`, `time`, `price`, `ratings`, `description`, `note`, `created_by`, `updated_by`, `deleted_by`, `is_accepted`, `is_active`, `provider_accepted`, `receiver_accepted`, `is_rejected`, `is_cancelled_p`, `is_cancelled_r`, `is_on_the_way`, `is_reached`, `is_started`, `is_completed`, `is_completed_p`, `is_completed_r`, `is_closed`, `is_deleted`, `is_deleted_p`, `is_deleted_r`, `created_at`, `updated_at`) VALUES
(1, 'workorder-202307257V6atp44SIpajlnP233055', 'XUT0TN', 'provider-20230725qnL71lTFBaV3dzRA235924', 'receiver-20230725z3Xi6ak1A1SILfeD233027', NULL, 'Ny', '2023-07-25', '11:32 PM', '1209', 0, 'Description Description  Description Description', NULL, NULL, NULL, 'Gw9tUhZTgz', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, '2023-07-25 17:30:55', '2023-07-25 18:12:32'),
(2, 'workorder-20230726QqME879uJMVO7iSN001236', 'CRVUWL', 'provider-20230725qnL71lTFBaV3dzRA235924', 'receiver-20230725z3Xi6ak1A1SILfeD233027', NULL, '123', '2023-07-26', '00:13', '100', 0, 'aaaaaadasdsa', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-07-25 18:12:36', '2023-07-25 18:13:48'),
(3, 'workorder-20230726tTSFSuJHfy9LkqLw003345', '35BWLZ', 'provider-202307251ep2QCCalH3sRDnj232812', 'receiver-20230725z3Xi6ak1A1SILfeD233027', NULL, '123', '2023-07-26', '12:34 AM', '100', 0, 'asadasd', NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, '2023-07-25 18:33:45', '2023-07-25 18:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `workorder_categories`
--

CREATE TABLE `workorder_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workorder_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_no` bigint(20) DEFAULT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workorder_images`
--

CREATE TABLE `workorder_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workorder_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workorder_images`
--

INSERT INTO `workorder_images` (`id`, `workorder_id`, `track_id`, `image`, `type`, `created_by`, `updated_by`, `deleted_by`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'workorder-202307257V6atp44SIpajlnP233055', 'track-20230726BYetoYnUq0bHterj001257', 'R6LfHZa8sh20230726001257.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 0, '2023-07-25 18:12:57', '2023-07-25 18:12:57'),
(2, 'workorder-20230726QqME879uJMVO7iSN001236', 'track-20230726G9U1Q87aXIwQXnMx001408', 'JyGEUhcCr520230726001408.jpg', 'workorder', 'Gw9tUhZTgz', NULL, NULL, 1, 0, '2023-07-25 18:14:08', '2023-07-25 18:14:08'),
(3, 'workorder-20230726QqME879uJMVO7iSN001236', 'track-2023072638ZNZC7YelM54il2001408', 'UJ4irggawd20230726001408.jpg', 'workorder', 'Gw9tUhZTgz', NULL, NULL, 1, 0, '2023-07-25 18:14:08', '2023-07-25 18:14:08'),
(4, 'workorder-20230726QqME879uJMVO7iSN001236', 'track-202307262IXpnIeRpd9UqjYw001408', 'QjMfpigaWu20230726001408.jpg', 'workorder', 'Gw9tUhZTgz', NULL, NULL, 1, 0, '2023-07-25 18:14:08', '2023-07-25 18:14:08'),
(5, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230726WnwhkWBmk1Blr137003546', 'KwLOpe09Pv20230726003546.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-25 18:35:46', '2023-07-25 18:36:19'),
(6, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230726You0Va4OQThJYbCK092105', 'JNr017svql20230726092105.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-26 03:21:05', '2023-07-27 07:27:36'),
(7, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230726mTecfpzSmwBo5fAM092105', 'nls1wUG8Xk20230726092105.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-26 03:21:05', '2023-07-27 07:27:38'),
(8, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230726ElAOSMZajnOH4nJI094331', 'CM1eCPCPoj20230726094331.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-26 03:43:31', '2023-07-27 07:27:40'),
(9, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-202307262QiofzHHfaY7zubh094536', 'gLvk7wdB7w20230726094536.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-26 03:45:36', '2023-07-27 07:27:44'),
(10, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230726Lr8GW7K8eoh1KH8q161936', 'aJnAUVPV0r20230726161936.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-26 10:19:36', '2023-07-27 07:27:45'),
(11, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230726BTi2gX9bQHLTcTtH161953', 'UPnNz2JeFd20230726161953.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-26 10:19:53', '2023-07-27 07:27:47'),
(12, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230726AcBB2psTesUk8KgT162605', 'PJoFpPw8d920230726162605.avif', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-26 10:26:05', '2023-07-27 07:27:28'),
(13, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-202307265S1ze7jHun6yByXa162605', 'L4ZklKoNbx20230726162605.png', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-26 10:26:05', '2023-07-27 07:27:30'),
(14, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230726LwUQuxo7JzoqJJrU163421', 'y5TvCaPTd520230726163421.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-26 10:34:21', '2023-07-27 07:27:32'),
(15, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230726oB4opybUQS5k3kmu163421', 'HVBXQkcicD20230726163421.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-26 10:34:21', '2023-07-27 07:27:17'),
(16, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-202307261H12VfjwwsIMtmoi164120', 'Xgy68Sb3Zo20230726164120.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-26 10:41:20', '2023-07-27 07:27:25'),
(17, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230726bVJF7Vdil1QdDC2X164120', 'EPlGCrQ4ZV20230726164120.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-26 10:41:20', '2023-07-27 07:27:51'),
(18, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230726t8IFKFBoAXo6gDLA164120', '49SAD36NEh20230726164120.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-26 10:41:20', '2023-07-27 07:27:15'),
(19, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230726DNxvXcCgtkv9zETf164120', 'QXpepjD5ML20230726164120.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-26 10:41:20', '2023-07-27 07:27:16'),
(20, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727uUq8Uzc9TIPzbpoB125223', 'KpgeXivrj520230727125223.png', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 06:52:24', '2023-07-27 07:27:53'),
(21, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727PfiJeixCYxDJrx0a125224', 'H4dBdUeis820230727125224.png', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 06:52:24', '2023-07-27 07:27:13'),
(22, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727kyHkqVkASu8NXJC5125224', 'NESPdCgMxm20230727125224.png', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 06:52:24', '2023-07-27 07:27:19'),
(23, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727i01l3z9P6zM25bzR125256', 'khsQOEkKU420230727125256.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 06:52:56', '2023-07-27 07:27:23'),
(24, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727lDhC5eoS1PjeVVda125256', 'ht7AGlBu8D20230727125256.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 06:52:56', '2023-07-27 07:27:54'),
(25, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727Y4wK9TR6AvNvDwSU131311', '2bOqMpjp9920230727131311.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 07:13:11', '2023-07-27 07:27:56'),
(26, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727aIaxoEJcq2kVq5c4131311', 'bEIaCjqxie20230727131311.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 07:13:11', '2023-07-27 07:27:20'),
(27, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727Gd1fdHe683wBJe6e131311', 'QjWhwREtUh20230727131311.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 07:13:11', '2023-07-27 07:27:11'),
(28, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727DWRdpvO1obmIHfG3132006', '0mXBsCKpcC20230727132006.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 07:20:06', '2023-07-27 07:27:22'),
(29, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727s9UIeGUtQo2fD7Vq132018', 'bWMrJJhhKY20230727132018.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 07:20:18', '2023-07-27 07:27:57'),
(30, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727hoZwTmDOLnHd6Gaz132605', 'lLtytltYY020230727132605.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 07:26:05', '2023-07-27 07:27:07'),
(31, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-202307271hymcV34KMVWUA4v132624', 'Kx9aV0fp4d20230727132624.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 07:26:24', '2023-07-27 07:27:59'),
(32, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727566eGjn79nMQV595132624', 'iREhYbAf5o20230727132624.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 07:26:24', '2023-07-27 07:28:00'),
(33, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727DFU1NNGDEC6vGgof132624', '77xegvnE6D20230727132624.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 07:26:24', '2023-07-27 07:28:02'),
(34, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727fKjt1W9tswDx9lPy132640', 'FF0v9qEv3D20230727132640.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 07:26:40', '2023-07-27 07:27:05'),
(35, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727qxrOhpPv78J7s1Ro132640', 'nESL4gQQMy20230727132640.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 07:26:40', '2023-07-27 07:27:10'),
(36, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727eK5cbhvZYkTPZhAk132700', 'jqEFrGzJAD20230727132700.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 0, '2023-07-27 07:27:00', '2023-07-27 07:27:00'),
(37, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-2023072767Z6nhXzO5vzeraD132811', 'Ph0JD7kyjc20230727132811.png', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 07:28:11', '2023-07-27 07:28:14'),
(38, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727tr2pEYaMd5ZrdIMk132843', 'l4BsaRwMhz20230727132843.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 07:28:43', '2023-07-27 07:28:49'),
(39, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727p9ZAhUuWhTvwbBFH143348', 'BirC0EUv1t20230727143348.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 0, '2023-07-27 08:33:48', '2023-07-27 08:33:48'),
(40, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727SP5TguvxyVL899Zo143348', 'XVn6VLakwJ20230727143348.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 0, '2023-07-27 08:33:48', '2023-07-27 08:33:48'),
(41, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727wX4JkFdBMvIsL9u3143348', '7cGlqpXxpM20230727143348.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 08:33:48', '2023-07-27 08:34:28'),
(42, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727Mm67GBJvOFGKgQ3R143404', 'cEQT4JpAPL20230727143404.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 08:34:04', '2023-07-27 08:34:31'),
(43, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727g7eMVelZKCCbaPUG143404', 'zdcqoOJQDj20230727143404.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 08:34:04', '2023-07-27 08:34:30'),
(44, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'track-20230727qgO8Mfvm4GRThtdj143415', 'GQcol1H5bO20230727143415.jpg', 'workorder', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 1, '2023-07-27 08:34:15', '2023-07-27 08:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `workorder_notes`
--

CREATE TABLE `workorder_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workorder_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `for_admin` tinyint(1) NOT NULL DEFAULT '0',
  `for_provider` tinyint(1) NOT NULL DEFAULT '0',
  `for_receiver` tinyint(1) NOT NULL DEFAULT '0',
  `notified` tinyint(1) NOT NULL DEFAULT '0',
  `note` text COLLATE utf8mb4_unicode_ci,
  `note_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workorder_notes`
--

INSERT INTO `workorder_notes` (`id`, `workorder_id`, `for_admin`, `for_provider`, `for_receiver`, `notified`, `note`, `note_id`, `created_by`, `updated_by`, `deleted_by`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'workorder-202307257V6atp44SIpajlnP233055', 1, 1, 1, 0, 'Udhdhhdhdd', 'note-20230725Z9UH5PJOZpn49bSe233220', 'Gw9tUhZTgz', NULL, NULL, 1, 0, '2023-07-25 17:32:20', '2023-07-25 17:32:20'),
(2, 'workorder-202307257V6atp44SIpajlnP233055', 0, 1, 0, 0, 'ndjdjfjf', 'note-20230725SHTzjN3UZcBvnc9q235355', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 0, '2023-07-25 17:53:55', '2023-07-25 17:53:55'),
(3, 'workorder-20230726QqME879uJMVO7iSN001236', 1, 1, 0, 0, 'aaaa', 'note-20230726xrBtPqpLXeyrdfxZ001522', 'Gw9tUhZTgz', NULL, NULL, 1, 0, '2023-07-25 18:15:22', '2023-07-25 18:15:22'),
(4, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 0, 1, 0, 0, 'hftyy6', 'note-20230726S8Yx2iJjTc69ZvXB003440', 'provider-202307251ep2QCCalH3sRDnj232812', NULL, NULL, 1, 0, '2023-07-25 18:34:40', '2023-07-25 18:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `workorder_providers`
--

CREATE TABLE `workorder_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workorder_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_selected` tinyint(1) NOT NULL DEFAULT '0',
  `price` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workorder_providers`
--

INSERT INTO `workorder_providers` (`id`, `workorder_id`, `provider_id`, `is_selected`, `price`, `note`, `created_by`, `updated_by`, `deleted_by`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'workorder-202307257V6atp44SIpajlnP233055', 'provider-202307251ep2QCCalH3sRDnj232812', 0, '1200', 'Okayyyy', 'Gw9tUhZTgz', 'Gw9tUhZTgz', 'Gw9tUhZTgz', 1, 1, '2023-07-25 17:31:20', '2023-07-25 18:11:49'),
(2, 'workorder-202307257V6atp44SIpajlnP233055', 'provider-20230725qnL71lTFBaV3dzRA235924', 0, '100', 'JHDas dashdasjkdhas dasd', 'Gw9tUhZTgz', 'Gw9tUhZTgz', 'Gw9tUhZTgz', 1, 1, '2023-07-25 18:11:07', '2023-07-25 18:12:09'),
(3, 'workorder-20230726QqME879uJMVO7iSN001236', 'provider-20230725qnL71lTFBaV3dzRA235924', 1, '100', 'Noteeeeeeeeeeeeeeeee', 'Gw9tUhZTgz', 'Gw9tUhZTgz', NULL, 1, 0, '2023-07-25 18:13:06', '2023-07-25 18:13:12'),
(4, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'provider-202307251ep2QCCalH3sRDnj232812', 1, '100', 'aasdsadasd', 'Gw9tUhZTgz', 'Gw9tUhZTgz', NULL, 1, 0, '2023-07-25 18:34:12', '2023-07-25 18:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `workorder_reviews`
--

CREATE TABLE `workorder_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workorder_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `note` text COLLATE utf8mb4_unicode_ci,
  `ratings` tinyint(1) DEFAULT '0',
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workorder_statuses`
--

CREATE TABLE `workorder_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workorder_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `note` text COLLATE utf8mb4_unicode_ci,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `is_assign` tinyint(1) NOT NULL DEFAULT '0',
  `is_close` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workorder_statuses`
--

INSERT INTO `workorder_statuses` (`id`, `workorder_id`, `status`, `date`, `time`, `message`, `note`, `is_published`, `is_assign`, `is_close`, `created_by`, `updated_by`, `deleted_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'workorder-202307257V6atp44SIpajlnP233055', NULL, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, 0, '2023-07-25 17:30:55', '2023-07-25 18:12:09'),
(2, 'workorder-20230726QqME879uJMVO7iSN001236', NULL, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, 0, '2023-07-25 18:12:36', '2023-07-25 18:13:12'),
(3, 'workorder-20230726tTSFSuJHfy9LkqLw003345', NULL, NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, NULL, 0, '2023-07-25 18:33:45', '2023-07-25 18:34:15'),
(4, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'is_on_the_way', '2023-07-26', '12:36 AM', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, 0, '2023-07-25 18:36:27', '2023-07-25 18:36:27'),
(5, 'workorder-20230726tTSFSuJHfy9LkqLw003345', 'is_started', '2023-07-26', '12:36 AM', NULL, NULL, 0, 0, 0, NULL, NULL, NULL, 0, '2023-07-25 18:36:33', '2023-07-25 18:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `work_times`
--

CREATE TABLE `work_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `worktime_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_times`
--

INSERT INTO `work_times` (`id`, `user_id`, `worktime_id`, `start_time`, `end_time`, `day`, `created_by`, `updated_by`, `deleted_by`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'provider-20230725qnL71lTFBaV3dzRA235924', 'worktime-20230726caBBxWeswRGo8OtL000913', '12:08 AM', '02:09 AM', 'Sunday', 'Gw9tUhZTgz', NULL, NULL, 1, 0, '2023-07-25 18:09:13', '2023-07-25 18:09:13'),
(2, 'provider-20230725qnL71lTFBaV3dzRA235924', 'worktime-202307262Oum4mrkePVLjfjV000946', '12:09 AM', '04:09 AM', 'Monday', 'Gw9tUhZTgz', NULL, NULL, 1, 0, '2023-07-25 18:09:46', '2023-07-25 18:09:46');

-- --------------------------------------------------------

--
-- Table structure for table `work_zones`
--

CREATE TABLE `work_zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workzone_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_zones`
--

INSERT INTO `work_zones` (`id`, `user_id`, `workzone_id`, `city`, `state`, `zip`, `country`, `created_by`, `updated_by`, `deleted_by`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'provider-202307251ep2QCCalH3sRDnj232812', 'workzone-20230725X2VVOCSbQrLNWBkg232845', 'New York City', 'New York', '10001', 'United States', 'Gw9tUhZTgz', NULL, NULL, 1, 0, '2023-07-25 17:28:45', '2023-07-25 17:28:45'),
(2, 'provider-20230725qnL71lTFBaV3dzRA235924', 'workzone-20230726Omxn01rz3TTgHyRt000710', 'Memphis', 'Tennessee', '38108', 'United States', 'Gw9tUhZTgz', NULL, NULL, 1, 0, '2023-07-25 18:07:10', '2023-07-25 18:07:10'),
(3, 'provider-20230725qnL71lTFBaV3dzRA235924', 'workzone-20230726paZbDRFTVUHM1QWK000710', 'Memphis', 'Tennessee', '38128', 'United States', 'Gw9tUhZTgz', NULL, NULL, 1, 0, '2023-07-25 18:07:10', '2023-07-25 18:07:10'),
(4, 'provider-20230725qnL71lTFBaV3dzRA235924', 'workzone-2023072618XdhQgoyXmWQWCz000710', 'Memphis', 'Tennessee', '38126', 'United States', 'Gw9tUhZTgz', NULL, NULL, 1, 0, '2023-07-25 18:07:10', '2023-07-25 18:07:10'),
(5, 'provider-20230725qnL71lTFBaV3dzRA235924', 'workzone-20230726UxsfZ3UvOumee7K5000710', 'Memphis', 'Tennessee', '38127', 'United States', 'Gw9tUhZTgz', NULL, NULL, 1, 0, '2023-07-25 18:07:10', '2023-07-25 18:07:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agency_members`
--
ALTER TABLE `agency_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phone_managers`
--
ALTER TABLE `phone_managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_categories`
--
ALTER TABLE `skill_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_codes`
--
ALTER TABLE `v_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workorders`
--
ALTER TABLE `workorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workorder_categories`
--
ALTER TABLE `workorder_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workorder_images`
--
ALTER TABLE `workorder_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workorder_notes`
--
ALTER TABLE `workorder_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workorder_providers`
--
ALTER TABLE `workorder_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workorder_reviews`
--
ALTER TABLE `workorder_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workorder_statuses`
--
ALTER TABLE `workorder_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_times`
--
ALTER TABLE `work_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_zones`
--
ALTER TABLE `work_zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agency_members`
--
ALTER TABLE `agency_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phone_managers`
--
ALTER TABLE `phone_managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skill_categories`
--
ALTER TABLE `skill_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `v_codes`
--
ALTER TABLE `v_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workorders`
--
ALTER TABLE `workorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `workorder_categories`
--
ALTER TABLE `workorder_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workorder_images`
--
ALTER TABLE `workorder_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `workorder_notes`
--
ALTER TABLE `workorder_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workorder_providers`
--
ALTER TABLE `workorder_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workorder_reviews`
--
ALTER TABLE `workorder_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workorder_statuses`
--
ALTER TABLE `workorder_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `work_times`
--
ALTER TABLE `work_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `work_zones`
--
ALTER TABLE `work_zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
