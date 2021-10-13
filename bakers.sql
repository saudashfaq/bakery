-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2021 at 11:19 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakers`
--

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` bigint(20) UNSIGNED NOT NULL,
  `old_values` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_values` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audits`
--

INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_type`, `auditable_id`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":7001}', '{\"price\":\"750\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-27 05:43:38', '2021-09-27 05:43:38'),
(2, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 1, '{\"price\":1200}', '{\"price\":\"1500\"}', 'http://127.0.0.1:8000/edit-stock/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-27 06:27:46', '2021-09-27 06:27:46'),
(3, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":750}', '{\"price\":\"700\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-27 08:18:02', '2021-09-27 08:18:02'),
(4, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":700}', '{\"price\":\"70012\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-27 13:51:23', '2021-09-27 13:51:23'),
(5, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":70012}', '{\"price\":\"70056\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-27 13:52:05', '2021-09-27 13:52:05'),
(6, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":70056}', '{\"price\":\"700\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-27 13:52:24', '2021-09-27 13:52:24'),
(7, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":700}', '{\"price\":\"750\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-27 13:54:22', '2021-09-27 13:54:22'),
(8, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":750}', '{\"price\":\"800\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-27 13:54:44', '2021-09-27 13:54:44'),
(9, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":800}', '{\"price\":\"80\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-27 13:56:21', '2021-09-27 13:56:21'),
(10, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":80}', '{\"price\":\"8000\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-27 14:02:42', '2021-09-27 14:02:42'),
(11, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":8000}', '{\"price\":\"7000\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-27 14:07:14', '2021-09-27 14:07:14'),
(12, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":7000}', '{\"price\":\"750\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-27 14:08:06', '2021-09-27 14:08:06'),
(13, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 10, '{\"price\":150,\"unit_id\":2}', '{\"price\":\"1500\",\"unit_id\":\"1\"}', 'http://127.0.0.1:8000/edit-stock/10', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-27 14:18:09', '2021-09-27 14:18:09'),
(14, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":750}', '{\"price\":\"700\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-27 14:40:26', '2021-09-27 14:40:26'),
(15, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 10, '{\"price\":1500}', '{\"price\":\"1550\"}', 'http://127.0.0.1:8000/edit-stock/10', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-27 14:42:03', '2021-09-27 14:42:03'),
(16, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 7, '{\"price\":700}', '{\"price\":\"1200\"}', 'http://127.0.0.1:8000/edit-stock/7', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-28 13:50:58', '2021-09-28 13:50:58'),
(17, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 7, '{\"price\":1200}', '{\"price\":\"1250\"}', 'http://127.0.0.1:8000/edit-stock/7', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-28 13:52:38', '2021-09-28 13:52:38'),
(18, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\Stock', 10, '{\"id\":10,\"product\":\"oil2\",\"price\":1550,\"unit_id\":1,\"quantity\":4,\"user_id\":1}', '[]', 'http://127.0.0.1:8000/stocks/10', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-28 14:19:24', '2021-09-28 14:19:24'),
(19, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\Stock', 7, '{\"id\":7,\"product\":\"salt\",\"price\":1250,\"unit_id\":1,\"quantity\":12,\"user_id\":1}', '[]', 'http://127.0.0.1:8000/stocks/7', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-28 14:28:19', '2021-09-28 14:28:19'),
(20, 'App\\Models\\User', 1, 'created', 'App\\Models\\Stock', 37, '[]', '{\"product\":\"oil\",\"price\":\"300\",\"unit_id\":\"1\",\"quantity\":\"1\",\"user_id\":1,\"id\":37}', 'http://127.0.0.1:8000/stocks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-28 14:32:05', '2021-09-28 14:32:05'),
(21, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\Stock', 37, '{\"id\":37,\"product\":\"oil\",\"price\":300,\"unit_id\":1,\"quantity\":1,\"user_id\":1}', '[]', 'http://127.0.0.1:8000/stocks/37', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-28 14:39:30', '2021-09-28 14:39:30'),
(22, 'App\\Models\\User', 1, 'created', 'App\\Models\\Stock', 38, '[]', '{\"product\":\"dwdwd\",\"price\":\"344\",\"unit_id\":\"1\",\"quantity\":\"2\",\"user_id\":1,\"id\":38}', 'http://127.0.0.1:8000/stocks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-28 14:41:19', '2021-09-28 14:41:19'),
(23, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\Stock', 38, '{\"id\":38,\"product\":\"dwdwd\",\"price\":344,\"unit_id\":1,\"quantity\":2,\"user_id\":1}', '[]', 'http://127.0.0.1:8000/stocks/38', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-28 14:42:47', '2021-09-28 14:42:47'),
(24, 'App\\Models\\User', 1, 'created', 'App\\Models\\Stock', 39, '[]', '{\"product\":\"qww\",\"price\":\"23\",\"unit_id\":\"1\",\"quantity\":\"1\",\"user_id\":1,\"id\":39}', 'http://127.0.0.1:8000/stocks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-28 14:43:43', '2021-09-28 14:43:43'),
(25, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\Stock', 39, '{\"id\":39,\"product\":\"qww\",\"price\":23,\"unit_id\":1,\"quantity\":1,\"user_id\":1}', '[]', 'http://127.0.0.1:8000/stocks/39', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-28 14:46:02', '2021-09-28 14:46:02'),
(26, 'App\\Models\\User', 1, 'created', 'App\\Models\\Stock', 40, '[]', '{\"product\":\"3ee\",\"price\":\"332\",\"unit_id\":\"1\",\"quantity\":\"1\",\"user_id\":1,\"id\":40}', 'http://127.0.0.1:8000/stocks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-28 14:46:41', '2021-09-28 14:46:41'),
(27, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\Stock', 40, '{\"id\":40,\"product\":\"3ee\",\"price\":332,\"unit_id\":1,\"quantity\":1,\"user_id\":1}', '[]', 'http://127.0.0.1:8000/stocks/40', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-28 14:46:45', '2021-09-28 14:46:45'),
(28, 'App\\Models\\User', 1, 'created', 'App\\Models\\Stock', 41, '[]', '{\"product\":\"oil\",\"price\":\"234\",\"unit_id\":\"1\",\"quantity\":\"23\",\"user_id\":1,\"id\":41}', 'http://127.0.0.1:8000/stocks', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-28 14:47:40', '2021-09-28 14:47:40'),
(29, 'App\\Models\\User', 1, 'deleted', 'App\\Models\\Stock', 41, '{\"id\":41,\"product\":\"oil\",\"price\":234,\"unit_id\":1,\"quantity\":23,\"user_id\":1}', '[]', 'http://127.0.0.1:8000/stocks/41', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-28 14:48:15', '2021-09-28 14:48:15'),
(30, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":700}', '{\"price\":\"702\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-28 14:51:18', '2021-09-28 14:51:18'),
(31, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":702}', '{\"price\":\"2200\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 03:15:47', '2021-09-29 03:15:47'),
(32, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":2200}', '{\"price\":\"2300\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 03:56:40', '2021-09-29 03:56:40'),
(33, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 1, '{\"price\":1500}', '{\"price\":\"1550\"}', 'http://127.0.0.1:8000/edit-stock/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 08:39:19', '2021-09-29 08:39:19'),
(34, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 6, '{\"price\":1000,\"unit_id\":2}', '{\"price\":\"1500\",\"unit_id\":\"1\"}', 'http://127.0.0.1:8000/edit-stock/6', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 08:43:28', '2021-09-29 08:43:28'),
(35, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"unit_id\":1}', '{\"unit_id\":\"2\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 08:44:14', '2021-09-29 08:44:14'),
(36, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"unit_id\":2}', '{\"unit_id\":\"1\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 08:45:04', '2021-09-29 08:45:04'),
(37, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 6, '{\"unit_id\":1}', '{\"unit_id\":\"2\"}', 'http://127.0.0.1:8000/edit-stock/6', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 08:45:17', '2021-09-29 08:45:17'),
(38, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 1, '{\"price\":1550}', '{\"price\":\"1600\"}', 'http://127.0.0.1:8000/edit-stock/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 09:57:23', '2021-09-29 09:57:23'),
(39, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 1, '{\"price\":1600}', '{\"price\":\"1620\"}', 'http://127.0.0.1:8000/edit-stock/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 09:59:11', '2021-09-29 09:59:11'),
(40, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 1, '{\"price\":1620}', '{\"price\":\"1650\"}', 'http://127.0.0.1:8000/edit-stock/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 09:59:49', '2021-09-29 09:59:49'),
(41, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":23000}', '{\"price\":\"2300\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 10:00:32', '2021-09-29 10:00:32'),
(42, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 1, '{\"price\":1650}', '{\"price\":\"1640\"}', 'http://127.0.0.1:8000/edit-stock/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 10:02:07', '2021-09-29 10:02:07'),
(43, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 1, '{\"price\":1640}', '{\"price\":\"1650\"}', 'http://127.0.0.1:8000/edit-stock/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 10:05:14', '2021-09-29 10:05:14'),
(44, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 1, '{\"price\":1650}', '{\"price\":\"1640\"}', 'http://127.0.0.1:8000/edit-stock/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 10:14:03', '2021-09-29 10:14:03'),
(45, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 1, '{\"price\":1640}', '{\"price\":\"1650\"}', 'http://127.0.0.1:8000/edit-stock/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 10:15:10', '2021-09-29 10:15:10'),
(46, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 1, '{\"price\":1650}', '{\"price\":\"1660\"}', 'http://127.0.0.1:8000/edit-stock/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 10:16:10', '2021-09-29 10:16:10'),
(47, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 1, '{\"price\":1660}', '{\"price\":\"1670\"}', 'http://127.0.0.1:8000/edit-stock/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 10:39:43', '2021-09-29 10:39:43'),
(48, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 6, '{\"price\":1500}', '{\"price\":\"1400\"}', 'http://127.0.0.1:8000/edit-stock/6', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 12:07:18', '2021-09-29 12:07:18'),
(49, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":2300}', '{\"price\":\"2400\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 13:39:45', '2021-09-29 13:39:45'),
(50, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 6, '{\"price\":1400}', '{\"price\":\"1670\"}', 'http://127.0.0.1:8000/edit-stock/6', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 13:39:58', '2021-09-29 13:39:58'),
(51, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 1, '{\"price\":1670}', '{\"price\":\"1850\"}', 'http://127.0.0.1:8000/edit-stock/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 13:40:23', '2021-09-29 13:40:23'),
(52, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":2400}', '{\"price\":\"2300\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-29 13:40:33', '2021-09-29 13:40:33'),
(53, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":2300}', '{\"price\":\"2400\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-30 00:41:56', '2021-09-30 00:41:56'),
(54, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":2400}', '{\"price\":\"2500\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-30 05:18:12', '2021-09-30 05:18:12'),
(55, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 6, '{\"price\":1670}', '{\"price\":\"1700\"}', 'http://127.0.0.1:8000/edit-stock/6', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-09-30 05:18:46', '2021-09-30 05:18:46'),
(56, 'App\\Models\\User', 1, 'updated', 'App\\Models\\Stock', 20, '{\"price\":2500}', '{\"price\":\"2600\"}', 'http://127.0.0.1:8000/edit-stock/20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', NULL, '2021-10-04 08:56:25', '2021-10-04 08:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cake', '2021-09-19 18:43:03', '2021-09-19 18:43:03'),
(2, 'Pastries', '2021-10-05 18:43:03', '2021-10-05 18:43:03'),
(3, 'breads', '2021-10-05 08:04:20', '2021-10-05 08:04:20'),
(4, 'buns', '2021-10-05 08:05:51', '2021-10-05 08:05:51');

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
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `finished_goods` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `product_id`, `finished_goods`, `created_at`, `updated_at`) VALUES
(1, 26, 3, '2021-10-12 02:57:18', '2021-10-12 02:57:18'),
(39, 26, 3, '2021-10-13 01:21:28', '2021-10-13 01:21:28'),
(40, 26, 3, '2021-10-13 01:23:22', '2021-10-13 01:23:22'),
(41, 26, 3, '2021-10-13 01:24:13', '2021-10-13 01:24:13'),
(42, 26, 3, '2021-10-13 01:24:18', '2021-10-13 01:24:18'),
(43, 26, 2, '2021-10-13 01:24:37', '2021-10-13 01:24:37'),
(44, 26, 2, '2021-10-13 01:46:21', '2021-10-13 01:46:21'),
(45, 26, 2, '2021-10-13 01:47:15', '2021-10-13 01:47:15'),
(46, 26, 2, '2021-10-13 01:48:46', '2021-10-13 01:48:46'),
(47, 26, 2, '2021-10-13 01:52:55', '2021-10-13 01:52:55'),
(48, 26, 2, '2021-10-13 01:53:33', '2021-10-13 01:53:33'),
(49, 26, 1, '2021-10-13 01:53:52', '2021-10-13 01:53:52'),
(50, 26, 2, '2021-10-13 01:54:53', '2021-10-13 01:54:53'),
(51, 26, 2, '2021-10-13 01:55:50', '2021-10-13 01:55:50'),
(52, 26, 1, '2021-10-13 01:56:16', '2021-10-13 01:56:16'),
(53, 26, 1, '2021-10-13 01:57:19', '2021-10-13 01:57:19'),
(54, 26, 1, '2021-10-13 01:57:45', '2021-10-13 01:57:45'),
(55, 26, 2, '2021-10-13 01:58:21', '2021-10-13 01:58:21'),
(56, 26, 1, '2021-10-13 01:59:13', '2021-10-13 01:59:13'),
(57, 26, 3, '2021-10-13 02:00:17', '2021-10-13 02:00:17'),
(58, 26, 3, '2021-10-13 02:00:34', '2021-10-13 02:00:34'),
(59, 26, 3, '2021-10-13 02:07:46', '2021-10-13 02:07:46'),
(60, 26, 3, '2021-10-13 02:08:16', '2021-10-13 02:08:16'),
(61, 26, 3, '2021-10-13 02:09:04', '2021-10-13 02:09:04'),
(62, 26, 3, '2021-10-13 02:13:58', '2021-10-13 02:13:58'),
(63, 26, 1, '2021-10-13 02:14:14', '2021-10-13 02:14:14'),
(64, 26, 2, '2021-10-13 02:14:24', '2021-10-13 02:14:24'),
(65, 26, 2, '2021-10-13 02:14:43', '2021-10-13 02:14:43'),
(66, 26, 2, '2021-10-13 02:15:15', '2021-10-13 02:15:15'),
(67, 26, 3, '2021-10-13 02:15:28', '2021-10-13 02:15:28'),
(68, 26, 3, '2021-10-13 02:18:04', '2021-10-13 02:18:04'),
(69, 26, 3, '2021-10-13 02:18:07', '2021-10-13 02:18:07'),
(70, 26, 1, '2021-10-13 02:18:15', '2021-10-13 02:18:15'),
(71, 26, 2, '2021-10-13 02:18:28', '2021-10-13 02:18:28'),
(72, 26, 2, '2021-10-13 03:01:42', '2021-10-13 03:01:42'),
(73, 26, 2, '2021-10-13 03:02:36', '2021-10-13 03:02:36'),
(74, 26, 2, '2021-10-13 03:03:53', '2021-10-13 03:03:53'),
(75, 26, 2, '2021-10-13 03:04:22', '2021-10-13 03:04:22'),
(76, 26, 1, '2021-10-13 03:04:38', '2021-10-13 03:04:38'),
(77, 26, 1, '2021-10-13 03:04:41', '2021-10-13 03:04:41'),
(78, 26, 3, '2021-10-13 03:04:52', '2021-10-13 03:04:52'),
(79, 26, 3, '2021-10-13 03:05:15', '2021-10-13 03:05:15'),
(88, 26, 2, '2021-10-13 03:19:41', '2021-10-13 03:19:41'),
(89, 26, 2, '2021-10-13 03:20:39', '2021-10-13 03:20:39'),
(90, 26, 2, '2021-10-13 03:21:12', '2021-10-13 03:21:12'),
(91, 26, 2, '2021-10-13 03:21:38', '2021-10-13 03:21:38'),
(92, 26, 2, '2021-10-13 03:23:49', '2021-10-13 03:23:49'),
(93, 26, 2, '2021-10-13 03:24:41', '2021-10-13 03:24:41'),
(94, 26, 2, '2021-10-13 03:26:28', '2021-10-13 03:26:28'),
(95, 26, 2, '2021-10-13 03:26:29', '2021-10-13 03:26:29'),
(96, 26, 2, '2021-10-13 03:26:42', '2021-10-13 03:26:42'),
(97, 26, 2, '2021-10-13 03:26:59', '2021-10-13 03:26:59'),
(98, 26, 2, '2021-10-13 03:27:20', '2021-10-13 03:27:20'),
(99, 26, 2, '2021-10-13 03:28:24', '2021-10-13 03:28:24'),
(100, 26, 2, '2021-10-13 03:28:46', '2021-10-13 03:28:46'),
(101, 26, 2, '2021-10-13 03:29:25', '2021-10-13 03:29:25'),
(102, 26, 2, '2021-10-13 03:30:39', '2021-10-13 03:30:39'),
(103, 26, 2, '2021-10-13 04:02:40', '2021-10-13 04:02:40'),
(104, 26, 2, '2021-10-13 04:04:04', '2021-10-13 04:04:04'),
(105, 26, 1, '2021-10-13 04:04:33', '2021-10-13 04:04:33'),
(106, 26, 1, '2021-10-13 04:10:23', '2021-10-13 04:10:23'),
(107, 26, 1, '2021-10-13 04:10:53', '2021-10-13 04:10:53');

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
(5, '2021_09_19_161922_create_products_table', 1),
(6, '2021_09_19_162839_create_categories_table', 2),
(7, '2021_09_19_191710_add_price_to_products', 3),
(8, '2021_09_20_081222_create_units_table', 4),
(9, '2021_09_20_093718_create_stocks_table', 5),
(10, '2021_09_20_100455_add_user_id_to_stocks', 6),
(11, '2021_09_20_100609_add_unit_id_to_stocks', 7),
(12, '2021_09_20_101314_add_user_id_to_stocks', 8),
(13, '2021_09_27_103541_create_audits_table', 9),
(14, '2021_09_27_141439_create_stock_histories_table', 10),
(15, '2021_09_27_143423_add_product_id_to_stock_histories', 11),
(16, '2021_09_27_143423_add_stock_id_to_stock_histories', 12),
(17, '2021_09_29_143046_add_increment_to_stock_histories', 13),
(18, '2021_09_29_150344_add_decrement_to_stock_histories', 14),
(19, '2021_10_04_072050_create_productions_table', 15),
(20, '2021_10_05_061722_add_stock_id_to_productions', 16),
(21, '2021_10_05_081623_add_item_to_products', 17),
(22, '2021_10_05_082040_add_quantity_to_products', 18),
(23, '2021_10_05_082231_add_unit_to_products', 19),
(24, '2021_10_06_125955_ad_recipe_to_products', 20),
(26, '2021_10_08_054949_change_products_column_type', 22),
(27, '2021_10_08_055139_change_products_recipe_column_type', 22),
(29, '2021_10_08_055837_change_products_recipe_column_type', 23),
(30, '2021_10_06_133337_rename_decrement_column', 24),
(31, '2021_10_11_062726_add_stock_id_to_products', 25),
(32, '2021_10_12_063320_create_inventories_table', 26),
(33, '2021_10_12_065715_add_product_id_to_inventories', 27);

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
-- Table structure for table `productions`
--

CREATE TABLE `productions` (
  `id` int(10) UNSIGNED NOT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productions`
--

INSERT INTO `productions` (`id`, `item`, `quantity`, `unit`, `created_at`, `updated_at`) VALUES
(1, '5', 12, '2', NULL, NULL),
(2, '1', 324, '2', NULL, NULL),
(3, '6', 22, '1', NULL, NULL),
(4, '20', 3323, '1', NULL, NULL),
(5, '6', 1, '2', NULL, NULL),
(6, '6', 1, '1', NULL, NULL),
(7, '6', 455, '1', NULL, NULL),
(8, '6', 1224, '2', NULL, NULL),
(9, '5', 12, '1', NULL, NULL),
(10, '5', 12, '1', NULL, NULL),
(11, '1', 1111111111111, '1', NULL, NULL),
(12, '1', 12, '1', NULL, NULL),
(13, '6', 12, '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipe` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `stock_id`, `title`, `description`, `size`, `image`, `recipe`, `category_id`, `item`, `quantity`, `unit`, `created_at`, `updated_at`) VALUES
(25, 0, 'Chocolate Cake', 'Chocolate cake is a cake flavored with melted chocolate, cocoa powder', '1pond', '1633527829.jpg', '[{\"item\":\"1\",\"quantity\":\"1\",\"unit\":\"1\"},{\"item\":\"5\",\"quantity\":\"2\",\"unit\":\"1\"},{\"item\":\"6\",\"quantity\":\"1\",\"unit\":\"2\"}]', 1, NULL, NULL, NULL, '2021-10-06 08:43:49', '2021-10-06 08:43:49'),
(26, 0, 'Chocolate truffle cake', 'The cake itself is dense and moist, just like proper chocolate cake should be, and the frosting…. oh that frosting! Pure chocolate .The cake itself is dense and moist, just like proper chocolate cake should be, and the frosting…. oh that frosting! Pure chocolate', '1pond', '1633528332.jpg', '[{\"item\":\"5\",\"quantity\":\"2\",\"unit\":\"1\"},{\"item\":\"1\",\"quantity\":\"1\",\"unit\":\"1\"},{\"item\":\"6\",\"quantity\":\"3\",\"unit\":\"2\"}]', 1, NULL, NULL, NULL, '2021-10-06 08:52:12', '2021-10-06 08:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `unit_id` int(11) NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product`, `price`, `unit_id`, `quantity`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'sugar', 1850, 1, '5', 1, '2021-09-21 05:29:40', '2021-09-29 13:40:23'),
(5, 'cream', 1500, 1, '3', 1, '2021-09-16 08:17:41', '2021-09-08 08:17:45'),
(6, 'Milk', 1700, 2, '8', 1, '2021-09-03 08:17:49', '2021-09-30 05:18:46'),
(20, 'white sugar', 2600, 1, '4', 1, '2021-09-24 06:21:19', '2021-10-04 08:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `stock_histories`
--

CREATE TABLE `stock_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `stock_id` int(11) NOT NULL,
  `old_price` double NOT NULL,
  `new_price` double NOT NULL,
  `increment` double NOT NULL,
  `decrement` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_histories`
--

INSERT INTO `stock_histories` (`id`, `stock_id`, `old_price`, `new_price`, `increment`, `decrement`, `created_at`, `updated_at`) VALUES
(22, 1, 1640, 1650, 10, 0, '2021-09-29 10:05:14', '2021-09-29 10:05:14'),
(23, 1, 1650, 1640, 0, -10, '2021-09-29 10:14:03', '2021-09-29 10:14:03'),
(24, 1, 1640, 1650, 10, 0, '2021-09-29 10:15:10', '2021-09-29 10:15:10'),
(25, 1, 1650, 1660, 10, 0, '2021-09-29 10:16:10', '2021-09-29 10:16:10'),
(27, 1, 1660, 1670, 10, 0, '2021-09-29 10:39:43', '2021-09-29 10:39:43'),
(28, 6, 1500, 1400, 0, -100, '2021-09-29 12:07:18', '2021-09-29 12:07:18'),
(29, 20, 2300, 2400, 100, 0, '2021-09-29 13:39:45', '2021-09-29 13:39:45'),
(30, 6, 1400, 1670, 270, 0, '2021-09-29 13:39:58', '2021-09-29 13:39:58'),
(31, 1, 1670, 1850, 180, 0, '2021-09-29 13:40:23', '2021-09-29 13:40:23'),
(32, 20, 2400, 2300, 0, -100, '2021-09-29 13:40:33', '2021-09-29 13:40:33'),
(34, 20, 2300, 2400, 100, 0, '2021-09-30 00:41:56', '2021-09-30 00:41:56'),
(35, 20, 2400, 2500, 100, 0, '2021-09-30 05:18:11', '2021-09-30 05:18:11'),
(36, 6, 1670, 1700, 30, 0, '2021-09-30 05:18:46', '2021-09-30 05:18:46'),
(37, 20, 2500, 2500, 0, 0, '2021-09-30 05:38:01', '2021-09-30 05:38:01'),
(38, 20, 2500, 2600, 100, 0, '2021-10-04 08:56:25', '2021-10-04 08:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kg', '2021-09-20 08:16:10', '2021-09-20 08:16:10'),
(2, 'Liter', '2021-09-20 08:16:10', '2021-09-20 08:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ali', 'ali123@gmail.com', NULL, '$2y$10$29XvfZJNgZ35Gw4/5oujm.AvBM3xgEmNA/Sibv3N5R3n/EM56qe5m', NULL, '2021-09-20 03:04:27', '2021-09-20 03:04:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  ADD KEY `audits_user_id_user_type_index` (`user_id`,`user_type`);

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
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `productions`
--
ALTER TABLE `productions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product` (`product`);

--
-- Indexes for table `stock_histories`
--
ALTER TABLE `stock_histories`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productions`
--
ALTER TABLE `productions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `stock_histories`
--
ALTER TABLE `stock_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
