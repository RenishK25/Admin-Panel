-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 08:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_history`
--

CREATE TABLE `activity_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `changes` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_history`
--

INSERT INTO `activity_history` (`id`, `admin_id`, `admin_name`, `changes`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Add Category', '2023-05-02 06:02:10', '2023-05-02 06:02:10'),
(2, 1, 'admin', 'Update Color Value', '2023-05-02 06:39:16', '2023-05-02 06:39:16'),
(3, 1, 'admin', 'Update Color Value', '2023-05-02 06:39:29', '2023-05-02 06:39:29'),
(4, 1, 'admin', 'Add Category', '2023-05-02 06:54:03', '2023-05-02 06:54:03'),
(5, 1, 'admin', 'Delete Category', '2023-05-02 23:57:27', '2023-05-02 23:57:27'),
(6, 1, 'admin', 'Delete Category', '2023-05-02 23:58:16', '2023-05-02 23:58:16'),
(7, 1, 'admin', 'Delete Category', '2023-05-02 23:58:22', '2023-05-02 23:58:22'),
(8, 1, 'admin', 'Add Category', '2023-05-03 00:00:51', '2023-05-03 00:00:51'),
(9, 1, 'admin', 'Delete Category', '2023-05-03 00:06:21', '2023-05-03 00:06:21'),
(10, 1, 'admin', 'Add Category', '2023-05-03 00:06:49', '2023-05-03 00:06:49'),
(11, 1, 'admin', 'Add Category', '2023-05-03 00:07:35', '2023-05-03 00:07:35'),
(12, 1, 'admin', 'Add Category', '2023-05-03 00:18:29', '2023-05-03 00:18:29'),
(13, 1, 'admin', 'Update Category', '2023-05-03 00:42:17', '2023-05-03 00:42:17'),
(14, 1, 'admin', 'Add Category', '2023-05-03 00:43:46', '2023-05-03 00:43:46'),
(15, 1, 'admin', 'Delete Category', '2023-05-03 00:47:00', '2023-05-03 00:47:00'),
(16, 1, 'admin', 'Update Category', '2023-05-03 00:50:40', '2023-05-03 00:50:40'),
(17, 1, 'admin', 'Update Category', '2023-05-03 00:53:11', '2023-05-03 00:53:11'),
(18, 1, 'admin', 'Update Category', '2023-05-03 00:54:21', '2023-05-03 00:54:21'),
(19, 1, 'admin', 'Update Category', '2023-05-03 00:54:42', '2023-05-03 00:54:42'),
(20, 1, 'admin', 'Update Product Brand', '2023-05-03 01:08:53', '2023-05-03 01:08:53'),
(21, 1, 'admin', 'Update Product Brand', '2023-05-03 01:10:07', '2023-05-03 01:10:07'),
(22, 1, 'admin', 'Add Product Brand', '2023-05-03 01:10:51', '2023-05-03 01:10:51'),
(23, 1, 'admin', 'Delete Product Brand', '2023-05-03 01:11:09', '2023-05-03 01:11:09'),
(24, 1, 'admin', 'Add Product Brand', '2023-05-03 01:12:27', '2023-05-03 01:12:27'),
(25, 1, 'admin', 'Delete Product Brand', '2023-05-03 01:12:35', '2023-05-03 01:12:35'),
(26, 1, 'admin', 'Add Subcategory', '2023-05-03 01:20:42', '2023-05-03 01:20:42'),
(27, 1, 'admin', 'Delete Subcategory', '2023-05-03 01:21:00', '2023-05-03 01:21:00'),
(28, 1, 'admin', 'Delete Subcategory', '2023-05-03 01:22:33', '2023-05-03 01:22:33'),
(29, 1, 'admin', 'Add Subcategory', '2023-05-03 01:22:49', '2023-05-03 01:22:49'),
(30, 1, 'admin', 'Delete Subcategory', '2023-05-03 01:23:04', '2023-05-03 01:23:04'),
(31, 1, 'admin', 'Delete Subcategory', '2023-05-03 01:23:38', '2023-05-03 01:23:38'),
(32, 1, 'admin', 'Add Subcategory', '2023-05-03 01:24:21', '2023-05-03 01:24:21'),
(33, 1, 'admin', 'Delete Subcategory', '2023-05-03 01:26:25', '2023-05-03 01:26:25'),
(34, 1, 'admin', 'Delete Product Size', '2023-05-03 01:37:08', '2023-05-03 01:37:08'),
(35, 1, 'admin', 'Update Color Value', '2023-05-03 01:40:23', '2023-05-03 01:40:23'),
(36, 1, 'admin', 'Update Color', '2023-05-03 01:50:02', '2023-05-03 01:50:02'),
(37, 1, 'admin', 'Update Color', '2023-05-03 01:50:15', '2023-05-03 01:50:15'),
(38, 1, 'admin', 'Update Color', '2023-05-03 01:50:20', '2023-05-03 01:50:20'),
(39, 1, 'admin', 'Update Color', '2023-05-03 01:52:17', '2023-05-03 01:52:17'),
(40, 1, 'admin', 'Update Color', '2023-05-03 01:58:49', '2023-05-03 01:58:49'),
(41, 1, 'admin', 'Update Color', '2023-05-03 03:02:41', '2023-05-03 03:02:41'),
(42, 1, 'admin', 'Update Color', '2023-05-03 23:10:04', '2023-05-03 23:10:04'),
(43, 1, 'admin', 'Update Color', '2023-05-03 23:10:09', '2023-05-03 23:10:09'),
(44, 1, 'admin', 'Update Color', '2023-05-03 23:10:14', '2023-05-03 23:10:14'),
(45, 1, 'admin', 'Update Color', '2023-05-03 23:10:18', '2023-05-03 23:10:18'),
(46, 1, 'admin', 'Update Color', '2023-05-03 23:10:24', '2023-05-03 23:10:24'),
(47, 1, 'admin', 'Update Color', '2023-05-03 23:10:28', '2023-05-03 23:10:28'),
(48, 1, 'admin', 'Update Color', '2023-05-03 23:10:31', '2023-05-03 23:10:31'),
(49, 1, 'admin', 'Update Color', '2023-05-03 23:17:38', '2023-05-03 23:17:38'),
(50, 1, 'admin', 'Update Color', '2023-05-03 23:17:42', '2023-05-03 23:17:42'),
(51, 1, 'admin', 'Update Color', '2023-05-03 23:17:52', '2023-05-03 23:17:52'),
(52, 1, 'admin', 'Update Color', '2023-05-03 23:18:06', '2023-05-03 23:18:06'),
(53, 1, 'admin', 'Update Color', '2023-05-03 23:18:09', '2023-05-03 23:18:09'),
(54, 1, 'admin', 'Update Name Or Color', '2023-05-03 23:19:22', '2023-05-03 23:19:22'),
(55, 1, 'admin', 'Update Name Or Color', '2023-05-03 23:19:26', '2023-05-03 23:19:26'),
(56, 1, 'admin', 'Update Product Size', '2023-05-03 23:27:18', '2023-05-03 23:27:18'),
(57, 1, 'admin', 'Add Product Size', '2023-05-03 23:43:33', '2023-05-03 23:43:33'),
(58, 1, 'admin', 'Add Product', '2023-05-04 01:25:48', '2023-05-04 01:25:48'),
(59, 1, 'admin', 'Update Product Dimension', '2023-05-04 01:49:32', '2023-05-04 01:49:32'),
(60, 1, 'admin', 'Update Product', '2023-05-04 03:31:44', '2023-05-04 03:31:44'),
(61, 1, 'admin', 'Update Product', '2023-05-04 03:31:53', '2023-05-04 03:31:53'),
(62, 1, 'admin', 'Add Product Dimension', '2023-05-05 01:13:41', '2023-05-05 01:13:41'),
(63, 1, 'admin', 'Add Product Dimension', '2023-05-05 01:15:26', '2023-05-05 01:15:26'),
(64, 1, 'admin', 'Delete Product Dimension', '2023-05-05 01:15:44', '2023-05-05 01:15:44'),
(65, 1, 'admin', 'Update Product Dimension', '2023-05-05 01:17:05', '2023-05-05 01:17:05'),
(66, 1, 'admin', 'Add Product', '2023-05-05 05:16:02', '2023-05-05 05:16:02'),
(67, 1, 'admin', 'Add Product', '2023-05-05 05:16:25', '2023-05-05 05:16:25'),
(68, 1, 'admin', 'Add Product Dimension', '2023-05-05 06:15:48', '2023-05-05 06:15:48'),
(69, 1, 'admin', 'Add Product Dimension', '2023-05-05 06:16:59', '2023-05-05 06:16:59'),
(70, 1, 'admin', 'Add Product Dimension', '2023-05-05 06:37:28', '2023-05-05 06:37:28'),
(71, 1, 'admin', 'Add Product Dimension', '2023-05-05 06:37:58', '2023-05-05 06:37:58'),
(72, 1, 'admin', 'Add Product Size', '2023-05-05 07:21:28', '2023-05-05 07:21:28'),
(73, 1, 'admin', 'Add Product Detail', '2023-05-08 00:32:23', '2023-05-08 00:32:23'),
(74, 1, 'admin', 'Add Product Size', '2023-05-15 03:22:44', '2023-05-15 03:22:44'),
(75, 1, 'admin', 'Add Product', '2023-05-16 07:44:08', '2023-05-16 07:44:08'),
(76, 1, 'admin', 'Add Product', '2023-05-16 07:54:35', '2023-05-16 07:54:35'),
(77, 1, 'admin', 'Add Product', '2023-05-16 07:55:15', '2023-05-16 07:55:15'),
(78, 1, 'admin', 'Add Product', '2023-05-16 07:55:30', '2023-05-16 07:55:30'),
(79, 1, 'admin', 'Add Product', '2023-05-16 07:55:57', '2023-05-16 07:55:57'),
(80, 1, 'admin', 'Add Product', '2023-05-16 07:59:00', '2023-05-16 07:59:00'),
(81, 1, 'admin', 'Add Product', '2023-05-16 07:59:26', '2023-05-16 07:59:26'),
(82, 1, 'admin', 'Add Product', '2023-05-16 07:59:41', '2023-05-16 07:59:41'),
(83, 1, 'admin', 'Add Product', '2023-05-16 08:05:10', '2023-05-16 08:05:10'),
(84, 1, 'admin', 'Add Product', '2023-05-16 08:06:04', '2023-05-16 08:06:04'),
(85, 1, 'admin', 'Add Product Dimension', '2023-05-16 08:06:04', '2023-05-16 08:06:04'),
(86, 1, 'admin', 'Add Product', '2023-05-16 23:10:34', '2023-05-16 23:10:34'),
(87, 1, 'admin', 'Add Product Dimension', '2023-05-16 23:10:34', '2023-05-16 23:10:34'),
(88, 1, 'admin', 'Add Product', '2023-05-17 00:20:32', '2023-05-17 00:20:32'),
(89, 1, 'admin', 'Add Product', '2023-05-17 00:23:12', '2023-05-17 00:23:12'),
(90, 1, 'admin', 'Add Product', '2023-05-17 04:34:28', '2023-05-17 04:34:28'),
(91, 1, 'admin', 'Add Product', '2023-05-17 04:35:27', '2023-05-17 04:35:27'),
(92, 1, 'admin', 'Add Product', '2023-05-17 04:37:17', '2023-05-17 04:37:17'),
(93, 1, 'admin', 'Add Product', '2023-05-17 04:37:49', '2023-05-17 04:37:49'),
(94, 1, 'admin', 'Add Product', '2023-05-17 04:43:42', '2023-05-17 04:43:42'),
(95, 1, 'admin', 'Add Product', '2023-05-17 05:02:33', '2023-05-17 05:02:33'),
(96, 1, 'admin', 'Add Product', '2023-05-17 05:02:54', '2023-05-17 05:02:54'),
(97, 1, 'admin', 'Add Product', '2023-05-17 05:03:45', '2023-05-17 05:03:45'),
(98, 1, 'admin', 'Add Product', '2023-05-17 05:05:00', '2023-05-17 05:05:00'),
(99, 1, 'admin', 'Add Product', '2023-05-17 05:37:25', '2023-05-17 05:37:25'),
(100, 1, 'admin', 'Add Product', '2023-05-17 05:39:56', '2023-05-17 05:39:56'),
(101, 1, 'admin', 'Add Product', '2023-05-17 05:46:50', '2023-05-17 05:46:50'),
(102, 1, 'admin', 'Add Product', '2023-05-17 06:11:05', '2023-05-17 06:11:05'),
(103, 1, 'admin', 'Add Product', '2023-05-17 23:48:23', '2023-05-17 23:48:23'),
(104, 1, 'admin', 'Add Product', '2023-05-17 23:57:58', '2023-05-17 23:57:58'),
(105, 1, 'admin', 'Add Product', '2023-05-17 23:58:10', '2023-05-17 23:58:10'),
(106, 1, 'admin', 'Add Product', '2023-05-17 23:59:50', '2023-05-17 23:59:50'),
(107, 1, 'admin', 'Add Product', '2023-05-18 00:11:28', '2023-05-18 00:11:28'),
(108, 1, 'admin', 'Add Product', '2023-05-18 00:13:32', '2023-05-18 00:13:32'),
(109, 1, 'admin', 'Add Product', '2023-05-18 00:13:43', '2023-05-18 00:13:43'),
(110, 1, 'admin', 'Add Product', '2023-05-18 00:14:10', '2023-05-18 00:14:10'),
(111, 1, 'admin', 'Add Product', '2023-05-18 00:14:39', '2023-05-18 00:14:39'),
(112, 1, 'admin', 'Add Product', '2023-05-18 00:15:55', '2023-05-18 00:15:55'),
(113, 1, 'admin', 'Add Product', '2023-05-18 00:16:46', '2023-05-18 00:16:46'),
(114, 1, 'admin', 'Add Product', '2023-05-18 00:17:03', '2023-05-18 00:17:03'),
(115, 1, 'admin', 'Add Product', '2023-05-18 00:17:55', '2023-05-18 00:17:55'),
(116, 1, 'admin', 'Add Product', '2023-05-18 00:18:23', '2023-05-18 00:18:23'),
(117, 1, 'admin', 'Add Product', '2023-05-18 00:18:43', '2023-05-18 00:18:43'),
(118, 1, 'admin', 'Add Product', '2023-05-18 00:19:17', '2023-05-18 00:19:17'),
(119, 1, 'admin', 'Add Product', '2023-05-18 00:20:27', '2023-05-18 00:20:27'),
(120, 1, 'admin', 'Add Product', '2023-05-18 00:21:14', '2023-05-18 00:21:14'),
(121, 1, 'admin', 'Add Product', '2023-05-18 00:22:30', '2023-05-18 00:22:30'),
(122, 1, 'admin', 'Add Product', '2023-05-18 00:25:22', '2023-05-18 00:25:22'),
(123, 1, 'admin', 'Add Product', '2023-05-18 00:26:43', '2023-05-18 00:26:43'),
(124, 1, 'admin', 'Add Product', '2023-05-18 06:44:58', '2023-05-18 06:44:58'),
(125, 1, 'admin', 'Add Product', '2023-05-18 07:05:09', '2023-05-18 07:05:09'),
(126, 1, 'admin', 'Add Product', '2023-05-18 07:07:45', '2023-05-18 07:07:45'),
(127, 1, 'admin', 'Add Product', '2023-05-18 07:08:18', '2023-05-18 07:08:18'),
(128, 1, 'admin', 'Add Product', '2023-05-18 07:08:31', '2023-05-18 07:08:31'),
(129, 1, 'admin', 'Add Product', '2023-05-18 07:09:55', '2023-05-18 07:09:55'),
(130, 1, 'admin', 'Add Product', '2023-05-18 07:10:21', '2023-05-18 07:10:21'),
(131, 1, 'admin', 'Add Product', '2023-05-18 07:10:48', '2023-05-18 07:10:48'),
(132, 1, 'admin', 'Add Product', '2023-05-18 07:12:35', '2023-05-18 07:12:35'),
(133, 1, 'admin', 'Add Product', '2023-05-18 07:14:37', '2023-05-18 07:14:37'),
(134, 1, 'admin', 'Add Product', '2023-05-18 08:22:54', '2023-05-18 08:22:54'),
(135, 1, 'admin', 'Add Product', '2023-05-18 08:23:12', '2023-05-18 08:23:12'),
(136, 1, 'admin', 'Delete Color', '2023-05-20 08:04:47', '2023-05-20 08:04:47'),
(137, 1, 'admin', 'Add Product', '2023-05-20 08:15:34', '2023-05-20 08:15:34'),
(138, 1, 'admin', 'Add Product', '2023-06-02 04:23:28', '2023-06-02 04:23:28'),
(139, 1, 'admin', 'Update Product', '2023-06-02 04:52:33', '2023-06-02 04:52:33'),
(140, 1, 'admin', 'Update Product', '2023-06-02 04:52:54', '2023-06-02 04:52:54'),
(141, 1, 'admin', 'Update Product', '2023-06-02 04:53:22', '2023-06-02 04:53:22'),
(142, 1, 'admin', 'Update Product', '2023-06-02 04:53:27', '2023-06-02 04:53:27'),
(143, 1, 'admin', 'Update Product', '2023-06-02 04:56:38', '2023-06-02 04:56:38'),
(144, 1, 'admin', 'Update Product', '2023-06-02 04:56:57', '2023-06-02 04:56:57'),
(145, 1, 'admin', 'Update Product', '2023-06-02 04:57:41', '2023-06-02 04:57:41'),
(146, 1, 'admin', 'Update Product', '2023-06-02 05:00:05', '2023-06-02 05:00:05'),
(147, 1, 'admin', 'Update Product', '2023-06-02 05:00:39', '2023-06-02 05:00:39'),
(148, 1, 'admin', 'Update Product', '2023-06-02 05:01:22', '2023-06-02 05:01:22'),
(149, 1, 'admin', 'Update Product', '2023-06-02 05:02:10', '2023-06-02 05:02:10'),
(150, 1, 'admin', 'Update Product', '2023-06-02 05:02:22', '2023-06-02 05:02:22'),
(151, 1, 'admin', 'Update Product', '2023-06-02 05:16:08', '2023-06-02 05:16:08'),
(152, 1, 'admin', 'Update Product', '2023-06-02 05:16:54', '2023-06-02 05:16:54'),
(153, 1, 'admin', 'Update Product', '2023-06-02 05:17:10', '2023-06-02 05:17:10'),
(154, 1, 'admin', 'Update Product', '2023-06-02 05:18:14', '2023-06-02 05:18:14'),
(155, 1, 'admin', 'Update Product', '2023-06-02 05:18:32', '2023-06-02 05:18:32'),
(156, 1, 'admin', 'Update Product', '2023-06-02 05:18:49', '2023-06-02 05:18:49'),
(157, 1, 'admin', 'Update Product', '2023-06-02 05:18:59', '2023-06-02 05:18:59'),
(158, 1, 'admin', 'Update Product', '2023-06-02 05:19:47', '2023-06-02 05:19:47'),
(159, 1, 'admin', 'Update Product', '2023-06-06 23:43:31', '2023-06-06 23:43:31'),
(160, 1, 'admin', 'Update Product', '2023-06-06 23:43:48', '2023-06-06 23:43:48'),
(161, 1, 'admin', 'Update Product', '2023-06-06 23:48:57', '2023-06-06 23:48:57'),
(162, 1, 'admin', 'Update Product', '2023-06-06 23:49:36', '2023-06-06 23:49:36'),
(163, 1, 'admin', 'Update Product', '2023-06-06 23:49:43', '2023-06-06 23:49:43'),
(164, 1, 'admin', 'Update Product', '2023-06-06 23:51:15', '2023-06-06 23:51:15'),
(165, 1, 'admin', 'Update Product', '2023-06-06 23:53:16', '2023-06-06 23:53:16'),
(166, 1, 'admin', 'Update Product', '2023-06-06 23:53:40', '2023-06-06 23:53:40'),
(167, 1, 'admin', 'Update Product', '2023-06-07 00:07:25', '2023-06-07 00:07:25'),
(168, 1, 'admin', 'Update Product', '2023-06-07 00:13:48', '2023-06-07 00:13:48'),
(169, 1, 'admin', 'Add Product', '2023-06-07 00:17:17', '2023-06-07 00:17:17'),
(170, 1, 'admin', 'Update Product', '2023-06-07 00:18:20', '2023-06-07 00:18:20'),
(171, 1, 'admin', 'Update Product', '2023-06-07 00:22:10', '2023-06-07 00:22:10'),
(172, 1, 'admin', 'Update Product', '2023-06-07 00:42:49', '2023-06-07 00:42:49'),
(173, 1, 'admin', 'Update Product', '2023-06-07 00:51:48', '2023-06-07 00:51:48'),
(174, 1, 'admin', 'Update Product', '2023-06-07 00:52:06', '2023-06-07 00:52:06'),
(175, 1, 'admin', 'Update Product', '2023-06-07 00:53:18', '2023-06-07 00:53:18'),
(176, 1, 'admin', 'Update Product', '2023-06-07 00:54:07', '2023-06-07 00:54:07'),
(177, 1, 'admin', 'Update Product', '2023-06-07 00:55:02', '2023-06-07 00:55:02'),
(178, 1, 'admin', 'Update Product', '2023-06-07 00:55:17', '2023-06-07 00:55:17'),
(179, 1, 'admin', 'Update Product', '2023-06-07 00:55:27', '2023-06-07 00:55:27'),
(180, 1, 'admin', 'Update Product', '2023-06-07 00:56:04', '2023-06-07 00:56:04'),
(181, 1, 'admin', 'Update Product', '2023-06-07 00:56:15', '2023-06-07 00:56:15'),
(182, 1, 'admin', 'Update Product', '2023-06-07 00:56:34', '2023-06-07 00:56:34'),
(183, 1, 'admin', 'Update Product', '2023-06-07 00:56:41', '2023-06-07 00:56:41'),
(184, 1, 'admin', 'Update Product', '2023-06-07 00:56:51', '2023-06-07 00:56:51'),
(185, 1, 'admin', 'Update Product', '2023-06-07 00:57:11', '2023-06-07 00:57:11'),
(186, 1, 'admin', 'Update Product', '2023-06-07 00:57:47', '2023-06-07 00:57:47'),
(187, 1, 'admin', 'Update Product', '2023-06-07 00:58:42', '2023-06-07 00:58:42'),
(188, 1, 'admin', 'Update Product', '2023-06-07 01:00:01', '2023-06-07 01:00:01'),
(189, 1, 'admin', 'Update Product', '2023-06-07 01:00:27', '2023-06-07 01:00:27'),
(190, 1, 'admin', 'Update Product', '2023-06-07 01:00:50', '2023-06-07 01:00:50'),
(191, 1, 'admin', 'Update Product', '2023-06-07 01:02:04', '2023-06-07 01:02:04'),
(192, 1, 'admin', 'Update Product', '2023-06-07 01:11:39', '2023-06-07 01:11:39'),
(193, 1, 'admin', 'Update Product', '2023-06-07 01:11:52', '2023-06-07 01:11:52'),
(194, 1, 'admin', 'Update Product', '2023-06-07 01:12:03', '2023-06-07 01:12:03'),
(195, 1, 'admin', 'Update Product', '2023-06-07 01:12:12', '2023-06-07 01:12:12'),
(196, 1, 'admin', 'Update Product', '2023-06-07 01:13:23', '2023-06-07 01:13:23'),
(197, 1, 'admin', 'Update Product', '2023-06-07 01:13:46', '2023-06-07 01:13:46'),
(198, 1, 'admin', 'Update Product', '2023-06-07 01:14:16', '2023-06-07 01:14:16'),
(199, 1, 'admin', 'Update Product', '2023-06-07 01:14:34', '2023-06-07 01:14:34'),
(200, 1, 'admin', 'Update Product', '2023-06-07 01:14:53', '2023-06-07 01:14:53'),
(201, 1, 'admin', 'Update Product', '2023-06-07 01:15:01', '2023-06-07 01:15:01'),
(202, 1, 'admin', 'Update Product', '2023-06-07 01:15:19', '2023-06-07 01:15:19'),
(203, 1, 'admin', 'Update Product', '2023-06-07 01:16:25', '2023-06-07 01:16:25'),
(204, 1, 'admin', 'Update Product', '2023-06-07 01:16:29', '2023-06-07 01:16:29'),
(205, 1, 'admin', 'Update Product', '2023-06-07 01:16:46', '2023-06-07 01:16:46'),
(206, 1, 'admin', 'Update Product', '2023-06-07 01:19:39', '2023-06-07 01:19:39'),
(207, 1, 'admin', 'Update Product', '2023-06-07 01:23:10', '2023-06-07 01:23:10'),
(208, 1, 'admin', 'Update Product', '2023-06-07 01:23:23', '2023-06-07 01:23:23'),
(209, 1, 'admin', 'Update Product', '2023-06-07 01:24:13', '2023-06-07 01:24:13'),
(210, 1, 'admin', 'Update Product', '2023-06-07 01:24:28', '2023-06-07 01:24:28'),
(211, 1, 'admin', 'Update Product', '2023-06-07 01:25:31', '2023-06-07 01:25:31'),
(212, 1, 'admin', 'Update Product', '2023-06-07 01:27:00', '2023-06-07 01:27:00'),
(213, 1, 'admin', 'Update Product', '2023-06-07 01:46:46', '2023-06-07 01:46:46'),
(214, 1, 'admin', 'Update Product', '2023-06-07 01:47:28', '2023-06-07 01:47:28'),
(215, 1, 'admin', 'Update Product', '2023-06-07 01:47:56', '2023-06-07 01:47:56'),
(216, 1, 'admin', 'Update Product', '2023-06-07 01:48:31', '2023-06-07 01:48:31'),
(217, 1, 'admin', 'Update Product', '2023-06-07 01:49:32', '2023-06-07 01:49:32'),
(218, 1, 'admin', 'Update Product', '2023-06-07 01:49:50', '2023-06-07 01:49:50'),
(219, 1, 'admin', 'Update Product', '2023-06-07 01:50:31', '2023-06-07 01:50:31'),
(220, 1, 'admin', 'Update Product', '2023-06-07 01:54:31', '2023-06-07 01:54:31'),
(221, 1, 'admin', 'Update Product', '2023-06-07 01:57:55', '2023-06-07 01:57:55'),
(222, 1, 'admin', 'Update Product', '2023-06-07 01:58:26', '2023-06-07 01:58:26'),
(223, 1, 'admin', 'Update Product', '2023-06-07 01:59:02', '2023-06-07 01:59:02'),
(224, 1, 'admin', 'Update Product', '2023-06-07 01:59:31', '2023-06-07 01:59:31'),
(225, 1, 'admin', 'Update Product', '2023-06-07 03:16:14', '2023-06-07 03:16:14'),
(226, 1, 'admin', 'Update Product', '2023-06-07 03:18:38', '2023-06-07 03:18:38'),
(227, 1, 'admin', 'Update Product', '2023-06-07 03:19:35', '2023-06-07 03:19:35'),
(228, 1, 'admin', 'Update Product', '2023-06-07 03:19:46', '2023-06-07 03:19:46'),
(229, 1, 'admin', 'Update Product', '2023-06-07 03:19:49', '2023-06-07 03:19:49'),
(230, 1, 'admin', 'Update Product', '2023-06-07 03:20:31', '2023-06-07 03:20:31'),
(231, 1, 'admin', 'Update Product', '2023-06-07 03:22:23', '2023-06-07 03:22:23'),
(232, 1, 'admin', 'Update Product', '2023-06-07 03:22:46', '2023-06-07 03:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','super_admin') NOT NULL DEFAULT 'admin',
  `password` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'eyJpdiI6IndWR2FmbVBQUFNBVXJicVA0dFlZbkE9PSIsInZhbHVlIjoiUXdZOFhtbW9BVnB1b2RrcVBGeDJvVU5vQ2k5OElwVEYybnRKQ0U2YzNGWT0iLCJtYWMiOiI0NjcxZmM4OWI5NGJlYjRhZDg4ZDgzNDQ5Y2E4ZTAzMGFlMTVjMTg1NTkzMzAwMWFkZWQyZDRhZDAyYzEwZGE4IiwidGFnIjoiIn0=', NULL, NULL),
(2, 'super_admin', 'superadmin@gmail.com', 'super_admin', 'eyJpdiI6IkhvWmtXd0cwSkNFNk1LUmNJYlVnTUE9PSIsInZhbHVlIjoibCtXUnFlZlBubW5Oem1oZnRiRDBiYVIvNklNQXEyMEdiY1BQU1B4Mi85WT0iLCJtYWMiOiI3MDNmMzY4MDEyYjlhMmYxOTM4YjRiOThiZjkwYmQ3YmVhNzA0OTAxNzE0N2NhMzkyY2MwZTI4MTM4OTAzNWFmIiwidGFnIjoiIn0=', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_detail`
--

CREATE TABLE `bank_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `detail` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Clothes', '505770934.jpg', '2023-04-29 04:10:18', '2023-05-03 00:54:42'),
(5, 'deswsd', '1291161281.jpg', '2023-05-02 04:10:06', '2023-05-02 04:10:06'),
(10, 'test trupen 456', '1545969283.png', '2023-05-02 04:17:13', '2023-05-02 04:18:11'),
(15, 'Mi', '147297816.png', '2023-05-03 00:06:49', '2023-05-03 00:06:49'),
(16, 'Mi22', '86114778.png', '2023-05-03 00:07:35', '2023-05-03 00:07:35'),
(17, 'inch', '1213007410.png', '2023-05-03 00:18:29', '2023-05-03 00:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Red', '#fa0000', '2023-04-29 04:11:31', '2023-05-03 23:18:09'),
(3, 'test tr test', '#575252', '2023-05-01 01:50:54', '2023-05-03 23:19:26');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_25_122602_create_admins_table', 1),
(6, '2023_04_25_123407_create_activity_history_table', 1),
(7, '2023_04_25_123614_create_categories_table', 1),
(8, '2023_04_25_123744_create_subcategories_table', 1),
(9, '2023_04_25_124025_create_color_table', 1),
(10, '2023_04_25_124208_create_size_table', 1),
(11, '2023_04_25_124329_create_product_brands_table', 1),
(12, '2023_04_25_124741_create_products_table', 1),
(13, '2023_04_25_125242_create_product_images_table', 1),
(14, '2023_04_25_125521_create_product_dimension_table', 1),
(15, '2023_04_26_123221_create_product_weight_table', 1),
(16, '2023_04_26_123319_create_product_special_feature_table', 1),
(17, '2023_04_26_123524_create_product_material_table', 1),
(18, '2023_04_26_123604_create_product_size_color_table', 1),
(19, '2023_04_28_092431_create_product_detail_table', 1),
(20, '2023_04_28_100257_create_bank_detail_table', 1),
(21, '2023_04_28_100847_create_product_offer_table', 1),
(22, '2023_04_28_101257_create_product_offer_terms_table', 1),
(23, '2023_04_28_101836_create_product_guarantee_warranty_table', 1),
(24, '2023_04_28_102113_create_product_guarantee_warranty_terms_table', 1),
(25, '2023_04_28_102255_create_product_product_emi_table', 1),
(26, '2023_04_25_123407_create_activity_history_2_table', 2),
(27, '2023_04_25_124208_create_size_table_2_', 3),
(28, '2023_04_26_123604_create_product_size_color_table_2_', 4),
(29, '2023_04_26_123319_create_product_special_feature_table_2_', 5),
(30, '2023_04_28_092431_create_product_detail_2_table', 6),
(31, '2023_05_17_083855_add_color_size_combination_column_to_product_size_color_table', 7),
(32, '2023_05_17_101135_add_color_size_combination_column_to_product_detail_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 4, 'my-app-token', 'd38046f3cee72a54f92ff238d1862d3fcfab13ecc7f3b3f9ac3d8b00ce6f07c7', '[\"*\"]', NULL, NULL, '2023-06-01 03:53:04', '2023-06-01 03:53:04'),
(2, 'App\\Models\\User', 4, 'my-app-token', 'b36bac77c362b1b0823a49491ed2865e40abc006873f31a0a82685e700e168dd', '[\"*\"]', NULL, NULL, '2023-06-01 03:53:23', '2023-06-01 03:53:23'),
(3, 'App\\Models\\User', 4, 'my-app-token', '35783dc2d181be43e8e84228dafdfbb06298ce7862734c1b2004e1e1ca051559', '[\"*\"]', NULL, NULL, '2023-06-01 03:54:24', '2023-06-01 03:54:24'),
(4, 'App\\Models\\User', 4, 'my-app-token', 'a21852e24635e9c16fb0e573a306fd377b4b709f0377d658036abdcde16963e4', '[\"*\"]', NULL, NULL, '2023-06-01 04:27:06', '2023-06-01 04:27:06'),
(5, 'App\\Models\\User', 4, 'my-app-token', '07bc8e3f774bf48b21fa00a28b09d587b37dd65d1bba0765e6fe74966e743639', '[\"*\"]', '2023-06-01 04:37:44', NULL, '2023-06-01 04:29:57', '2023-06-01 04:37:44'),
(6, 'App\\Models\\User', 1, 'my-app-token', '6864ac8dbc5201473704cdce2d5a9d5aeba1ed5c5e3254e599dab9acb1e26932', '[\"*\"]', '2023-06-01 04:45:43', NULL, '2023-06-01 04:45:12', '2023-06-01 04:45:43'),
(7, 'App\\Models\\User', 1, 'my-app-token', '9dd99dc0c7aa6aa176141d9db3dc6cb48ad6508c9e9343edf1648e9617076957', '[\"*\"]', '2023-06-01 05:09:01', NULL, '2023-06-01 05:04:12', '2023-06-01 05:09:01'),
(8, 'App\\Models\\User', 1, 'my-app-token', '175a6daeafe1a1423261e4066988682d3e3249c52bd629cb071163918ace8eb8', '[\"*\"]', '2023-06-03 03:21:31', NULL, '2023-06-02 00:21:19', '2023-06-03 03:21:31'),
(9, 'App\\Models\\User', 1, 'my-app-token', '29242c29657116006f5daf2c77fe4b083cab956102e4f2f0712ffb89356d3dd3', '[\"*\"]', NULL, NULL, '2023-06-02 07:54:55', '2023-06-02 07:54:55'),
(10, 'App\\Models\\User', 1, 'my-app-token', '2d10b248b725594fb02407a4d7459cc4329695fef6c6443c0b5546f7c5af29a3', '[\"*\"]', NULL, NULL, '2023-06-02 08:24:13', '2023-06-02 08:24:13'),
(11, 'App\\Models\\User', 1, 'my-app-token', '7e930dc0a10f601cd352fd0c8caa6a5f25a18a6e33d46a20148a9fef000266af', '[\"*\"]', '2023-06-03 03:50:08', NULL, '2023-06-03 03:21:00', '2023-06-03 03:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `brand_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 1, 'Redmi 8', '2023-05-04 01:25:48', '2023-05-04 03:31:53'),
(88, 2, 4, 1, 'qqqqq', '2023-05-18 08:22:54', '2023-05-18 08:22:54'),
(89, 2, 4, 1, 'qqqqq', '2023-05-18 08:23:12', '2023-06-07 00:13:48'),
(90, 2, 4, 1, 'TEST TEST', '2023-05-20 08:15:34', '2023-05-20 08:15:34'),
(91, 2, 4, 1, 'New Product Test', '2023-06-07 00:17:17', '2023-06-07 03:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_brands`
--

CREATE TABLE `product_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_brands`
--

INSERT INTO `product_brands` (`id`, `name`, `logo`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Mi', '864746493.png', 'This is Mi', '2023-04-29 04:45:02', '2023-05-03 01:08:53'),
(3, 'aaa', '1563661567.png', 'this is brand', '2023-05-01 01:52:51', '2023-05-02 03:30:07'),
(4, 'deep', '165790319.png', 'karigar', '2023-05-02 04:26:02', '2023-05-03 01:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_size_color_id` bigint(20) UNSIGNED NOT NULL,
  `color_size_combination` text NOT NULL,
  `description` text NOT NULL,
  `title` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `discount_type` enum('flat','percentage') NOT NULL DEFAULT 'percentage',
  `discount_price` int(11) NOT NULL,
  `mrp` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`id`, `product_size_color_id`, `color_size_combination`, `description`, `title`, `quantity`, `discount`, `discount_type`, `discount_price`, `mrp`, `created_at`, `updated_at`) VALUES
(1, 1, '123 - Red', '4Gb 4Gb', 'Red Remi - 8', 10, 1000, 'flat', 7000, 8000, '2023-05-08 00:32:23', '2023-05-08 00:32:23'),
(2, 15, '123 - Red', '<p>52143w152415425145215</p>', '11111111111451454154', 15, 10, 'flat', 99990, 100000, '2023-05-17 04:43:42', '2023-05-17 04:43:42'),
(3, 16, '123 - test tr test', '<p>52143w152415425145215</p>', '11111111111451454154', 15, 5000, 'flat', 15000, 20000, '2023-05-17 04:43:42', '2023-05-17 04:43:42'),
(62, 78, 'width - test tr test', '<p>qqqqqqqqq</p>', 'qqq', 5, 20, 'percentage', 8000, 10000, '2023-05-18 08:22:55', '2023-05-18 08:22:55'),
(63, 79, 'width - Red', '<p>qqqqqqqqq</p>', 'qqq', 10, 10, 'percentage', 9000, 10000, '2023-05-18 08:23:12', '2023-05-18 08:23:12'),
(64, 80, 'width - test tr test', '<p>qqqqqqqqq</p>', 'qqq', 5, 20, 'percentage', 8000, 10000, '2023-05-18 08:23:12', '2023-05-18 08:23:12'),
(65, 81, 'width - Red', '<p>TEST TEST TEST TEST</p>', 'TEST TEST TEST TEST', 10, 10, 'percentage', 90000, 100000, '2023-05-20 08:15:34', '2023-05-20 08:15:34'),
(66, 82, '123 - Red', '<p>TEST TEST TEST TEST</p>', 'TEST TEST TEST TEST', 20, 20, 'percentage', 16000, 20000, '2023-05-20 08:15:34', '2023-05-20 08:15:34'),
(67, 83, 'width - test tr test', '<p>TEST TEST TEST TEST</p>', 'TEST TEST TEST TEST', 30, 30, 'percentage', 21000, 30000, '2023-05-20 08:15:34', '2023-05-20 08:15:34'),
(68, 84, '123 - test tr test', '<p>TEST TEST TEST TEST</p>', 'TEST TEST TEST TEST', 40, 40, 'percentage', 24000, 40000, '2023-05-20 08:15:34', '2023-05-20 08:15:34'),
(69, 85, 'width - Red', '<p>NEW PRODUCT TEST NEW PRODUCT TEST NEW PRODUCT TEST NEW PRODUCT TEST NEW PRODUCT TEST NEW PRODUCT TEST&nbsp;</p><p>&nbsp;</p>', 'NEW PRODUCT TEST', 15, 10, 'percentage', 90000, 100000, '2023-06-07 00:17:17', '2023-06-07 03:22:46'),
(70, 86, 'width - test tr test', '<p>NEW PRODUCT TEST NEW PRODUCT TEST NEW PRODUCT TEST NEW PRODUCT TEST NEW PRODUCT TEST NEW PRODUCT TEST&nbsp;</p><p>&nbsp;</p>', 'NEW PRODUCT TEST', 10, 15000, 'flat', 35000, 50000, '2023-06-07 00:17:17', '2023-06-07 03:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_dimension`
--

CREATE TABLE `product_dimension` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_dimension`
--

INSERT INTO `product_dimension` (`id`, `category_id`, `sub_category_id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(3, 10, 7, 'test test', 'tt1 1rt65  *jjk * 415asd5f1e', '2023-05-01 01:53:31', '2023-05-04 01:49:32'),
(5, 2, 4, 'inch', 'XXL', '2023-05-02 03:31:06', '2023-05-02 03:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_guarantee_warranty`
--

CREATE TABLE `product_guarantee_warranty` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('warranty','guarantee') DEFAULT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_guarantee_warranty_terms`
--

CREATE TABLE `product_guarantee_warranty_terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_g_w_id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_detail_id` bigint(20) UNSIGNED NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_detail_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 15, '562240925.JPG', '2023-05-17 23:48:23', '2023-05-17 23:48:23'),
(2, 15, '1731496612.JPG', '2023-05-17 23:48:23', '2023-05-17 23:48:23'),
(3, 15, '2006457627.JPG', '2023-05-17 23:48:23', '2023-05-17 23:48:23'),
(4, 15, '667581338.JPG', '2023-05-17 23:48:23', '2023-05-17 23:48:23'),
(5, 63, '792330682.jpg', '2023-05-18 08:23:13', '2023-05-18 08:23:13'),
(6, 63, '1373132689.jpg', '2023-05-18 08:23:13', '2023-05-18 08:23:13'),
(7, 64, '644521044.jpg', '2023-05-18 08:23:13', '2023-05-18 08:23:13'),
(8, 64, '20510296.jpg', '2023-05-18 08:23:13', '2023-05-18 08:23:13'),
(9, 65, '1722402552.jpg', '2023-05-20 08:15:34', '2023-05-20 08:15:34'),
(10, 66, '772266379.jpg', '2023-05-20 08:15:34', '2023-05-20 08:15:34'),
(11, 67, '1830644686.jpg', '2023-05-20 08:15:34', '2023-05-20 08:15:34'),
(12, 68, '156701310.jpg', '2023-05-20 08:15:34', '2023-05-20 08:15:34'),
(13, 69, '1714801839.jpg', '2023-06-07 00:17:17', '2023-06-07 00:17:17'),
(14, 69, '616609379.jpg', '2023-06-07 00:17:17', '2023-06-07 00:17:17'),
(15, 70, '1502706328.jpg', '2023-06-07 00:17:17', '2023-06-07 00:17:17'),
(16, 70, '1513998505.jpg', '2023-06-07 00:17:17', '2023-06-07 00:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `product_material`
--

CREATE TABLE `product_material` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_material`
--

INSERT INTO `product_material` (`id`, `category_id`, `sub_category_id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(3, 2, 4, 'sdsdfew', 'wdewsds', '2023-05-05 01:15:25', '2023-05-05 01:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_offer`
--

CREATE TABLE `product_offer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `bank_detail_id` bigint(20) UNSIGNED NOT NULL,
  `name` enum('company','bank','partner') DEFAULT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_offer_terms`
--

CREATE TABLE `product_offer_terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_offer_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `bank_name` text NOT NULL,
  `company__name` text NOT NULL,
  `partner_name` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_product_emi`
--

CREATE TABLE `product_product_emi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_offer_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('no_cost','credit') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_size_color`
--

CREATE TABLE `product_size_color` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `product_weight_id` bigint(20) UNSIGNED NOT NULL,
  `product_dimension_id` bigint(20) UNSIGNED NOT NULL,
  `product_special_feature_id` bigint(20) UNSIGNED NOT NULL,
  `product_material_id` bigint(20) UNSIGNED NOT NULL,
  `available_stock` enum('yes','no') NOT NULL DEFAULT 'no',
  `today's_deal` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_size_color`
--

INSERT INTO `product_size_color` (`id`, `product_id`, `color_id`, `size_id`, `product_weight_id`, `product_dimension_id`, `product_special_feature_id`, `product_material_id`, `available_stock`, `today's_deal`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 4, 3, 2, 3, 'yes', 'yes', '2023-05-05 06:37:28', '2023-06-07 01:00:50'),
(78, 88, 3, 1, 1, 5, 2, 3, 'no', 'no', '2023-05-18 08:22:54', '2023-05-18 08:22:54'),
(79, 89, 1, 1, 1, 5, 2, 3, 'yes', 'no', '2023-05-18 08:23:12', '2023-05-18 08:23:12'),
(80, 89, 3, 1, 1, 5, 2, 3, 'yes', 'no', '2023-05-18 08:23:12', '2023-05-18 08:23:12'),
(81, 90, 1, 1, 1, 5, 2, 3, 'no', 'no', '2023-05-20 08:15:34', '2023-05-20 08:15:34'),
(82, 90, 3, 1, 1, 5, 2, 3, 'no', 'no', '2023-05-20 08:15:34', '2023-05-20 08:15:34'),
(83, 90, 1, 3, 1, 5, 2, 3, 'no', 'no', '2023-05-20 08:15:34', '2023-05-20 08:15:34'),
(84, 90, 3, 3, 1, 5, 2, 3, 'no', 'no', '2023-05-20 08:15:34', '2023-05-20 08:15:34'),
(85, 91, 1, 1, 1, 5, 1, 3, 'no', 'no', '2023-06-07 00:17:17', '2023-06-07 03:22:46'),
(86, 91, 3, 1, 1, 5, 1, 3, 'no', 'no', '2023-06-07 00:17:17', '2023-06-07 03:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_special_feature`
--

CREATE TABLE `product_special_feature` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_special_feature`
--

INSERT INTO `product_special_feature` (`id`, `category_id`, `sub_category_id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 10, 7, 'Mi', 'XXL', '2023-05-05 06:15:48', '2023-05-05 06:15:48'),
(2, 2, 4, 'Ram', '10 GB Extra', '2023-05-05 06:16:59', '2023-05-05 06:16:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_weight`
--

CREATE TABLE `product_weight` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_weight`
--

INSERT INTO `product_weight` (`id`, `category_id`, `sub_category_id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 'Kg', '1.5', '2023-04-29 06:54:51', '2023-05-02 00:10:47'),
(4, 2, 4, 'sasasa', 'sasa', '2023-05-02 03:36:01', '2023-05-02 03:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `category_id`, `sub_category_id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 'width', '100px', '2023-05-03 23:43:33', '2023-05-03 23:43:33'),
(2, 10, 7, 'WIDTH', '200PX', '2023-05-05 07:21:28', '2023-05-05 07:21:28'),
(3, 2, 4, '123', '13', '2023-05-15 03:22:44', '2023-05-15 03:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(4, 2, 'test trupen 123', '37267637.jpg', '2023-05-01 01:50:08', '2023-05-01 01:50:39'),
(7, 10, 'test trupen test 789', '1567052676.png', '2023-05-02 04:19:02', '2023-05-02 04:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Renish Kalariya', 'renish@gmail.com', NULL, 'eyJpdiI6IkpGNTVHZngycm01M0oreXFYUHc3VEE9PSIsInZhbHVlIjoiem4wUzlNOGljZXJUcjErR3ZBejMwdz09IiwibWFjIjoiOTMyYTZhZDAzYjIwM2RiNzFiMWMxOTU1MTEzYWNkYzQ1NTkzMDRkNzJjODQ4ZDJmZTVjZmQ5MDZmMDAzMDI2OSIsInRhZyI6IiJ9', NULL, NULL, NULL),
(2, 'renish', 'reniskalariyah@gmail.com', NULL, 'renish', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_history`
--
ALTER TABLE `activity_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_history_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bank_detail`
--
ALTER TABLE `bank_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_brands`
--
ALTER TABLE `product_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_detail_product_size_color_id_foreign` (`product_size_color_id`);

--
-- Indexes for table `product_dimension`
--
ALTER TABLE `product_dimension`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_dimension_category_id_foreign` (`category_id`),
  ADD KEY `product_dimension_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `product_guarantee_warranty`
--
ALTER TABLE `product_guarantee_warranty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_guarantee_warranty_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_guarantee_warranty_terms`
--
ALTER TABLE `product_guarantee_warranty_terms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_guarantee_warranty_terms_product_id_foreign` (`product_id`),
  ADD KEY `product_guarantee_warranty_terms_product_g_w_id_foreign` (`product_g_w_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_detail_id_foreign` (`product_detail_id`);

--
-- Indexes for table `product_material`
--
ALTER TABLE `product_material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_material_category_id_foreign` (`category_id`),
  ADD KEY `product_material_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `product_offer`
--
ALTER TABLE `product_offer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_offer_product_id_foreign` (`product_id`),
  ADD KEY `product_offer_bank_detail_id_foreign` (`bank_detail_id`);

--
-- Indexes for table `product_offer_terms`
--
ALTER TABLE `product_offer_terms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_offer_terms_product_id_foreign` (`product_id`),
  ADD KEY `product_offer_terms_product_offer_id_foreign` (`product_offer_id`);

--
-- Indexes for table `product_product_emi`
--
ALTER TABLE `product_product_emi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_product_emi_product_id_foreign` (`product_id`),
  ADD KEY `product_product_emi_product_offer_id_foreign` (`product_offer_id`);

--
-- Indexes for table `product_size_color`
--
ALTER TABLE `product_size_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_size_color_product_id_foreign` (`product_id`),
  ADD KEY `product_size_color_color_id_foreign` (`color_id`),
  ADD KEY `product_size_color_size_id_foreign` (`size_id`),
  ADD KEY `product_size_color_product_weight_id_foreign` (`product_weight_id`),
  ADD KEY `product_size_color_product_dimension_id_foreign` (`product_dimension_id`),
  ADD KEY `product_size_color_product_special_feature_id_foreign` (`product_special_feature_id`),
  ADD KEY `product_size_color_product_material_id_foreign` (`product_material_id`);

--
-- Indexes for table `product_special_feature`
--
ALTER TABLE `product_special_feature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_special_feature_category_id_foreign` (`category_id`),
  ADD KEY `product_special_feature_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `product_weight`
--
ALTER TABLE `product_weight`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_weight_category_id_foreign` (`category_id`),
  ADD KEY `product_weight_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `size_category_id_foreign` (`category_id`),
  ADD KEY `size_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_history`
--
ALTER TABLE `activity_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_detail`
--
ALTER TABLE `bank_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `product_brands`
--
ALTER TABLE `product_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `product_dimension`
--
ALTER TABLE `product_dimension`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_guarantee_warranty`
--
ALTER TABLE `product_guarantee_warranty`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_guarantee_warranty_terms`
--
ALTER TABLE `product_guarantee_warranty_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_material`
--
ALTER TABLE `product_material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_offer`
--
ALTER TABLE `product_offer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_offer_terms`
--
ALTER TABLE `product_offer_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_product_emi`
--
ALTER TABLE `product_product_emi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_size_color`
--
ALTER TABLE `product_size_color`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `product_special_feature`
--
ALTER TABLE `product_special_feature`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_weight`
--
ALTER TABLE `product_weight`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_history`
--
ALTER TABLE `activity_history`
  ADD CONSTRAINT `activity_history_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `product_brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_product_size_color_id_foreign` FOREIGN KEY (`product_size_color_id`) REFERENCES `product_size_color` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_dimension`
--
ALTER TABLE `product_dimension`
  ADD CONSTRAINT `product_dimension_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_dimension_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_guarantee_warranty`
--
ALTER TABLE `product_guarantee_warranty`
  ADD CONSTRAINT `product_guarantee_warranty_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_guarantee_warranty_terms`
--
ALTER TABLE `product_guarantee_warranty_terms`
  ADD CONSTRAINT `product_guarantee_warranty_terms_product_g_w_id_foreign` FOREIGN KEY (`product_g_w_id`) REFERENCES `product_guarantee_warranty` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_guarantee_warranty_terms_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_detail_id_foreign` FOREIGN KEY (`product_detail_id`) REFERENCES `product_detail` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_material`
--
ALTER TABLE `product_material`
  ADD CONSTRAINT `product_material_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_material_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_offer`
--
ALTER TABLE `product_offer`
  ADD CONSTRAINT `product_offer_bank_detail_id_foreign` FOREIGN KEY (`bank_detail_id`) REFERENCES `bank_detail` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_offer_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_offer_terms`
--
ALTER TABLE `product_offer_terms`
  ADD CONSTRAINT `product_offer_terms_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_offer_terms_product_offer_id_foreign` FOREIGN KEY (`product_offer_id`) REFERENCES `product_offer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_product_emi`
--
ALTER TABLE `product_product_emi`
  ADD CONSTRAINT `product_product_emi_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_product_emi_product_offer_id_foreign` FOREIGN KEY (`product_offer_id`) REFERENCES `product_offer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_size_color`
--
ALTER TABLE `product_size_color`
  ADD CONSTRAINT `product_size_color_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_size_color_product_dimension_id_foreign` FOREIGN KEY (`product_dimension_id`) REFERENCES `product_dimension` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_size_color_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_size_color_product_material_id_foreign` FOREIGN KEY (`product_material_id`) REFERENCES `product_material` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_size_color_product_special_feature_id_foreign` FOREIGN KEY (`product_special_feature_id`) REFERENCES `product_special_feature` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_size_color_product_weight_id_foreign` FOREIGN KEY (`product_weight_id`) REFERENCES `product_weight` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_size_color_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_special_feature`
--
ALTER TABLE `product_special_feature`
  ADD CONSTRAINT `product_special_feature_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_special_feature_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_weight`
--
ALTER TABLE `product_weight`
  ADD CONSTRAINT `product_weight_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_weight_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `size_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
