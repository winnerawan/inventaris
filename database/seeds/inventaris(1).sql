-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Agu 2018 pada 13.02
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Elektronik', '2018-07-26 10:13:20', '2018-08-02 01:53:23'),
(3, 'Perabotan', '2018-08-02 01:53:43', '2018-08-02 01:53:43'),
(4, 'Aksesoris', '2018-08-02 01:53:57', '2018-08-02 01:53:57'),
(5, 'ATK', '2018-08-03 04:08:32', '2018-08-03 04:08:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `conditions`
--

CREATE TABLE `conditions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `conditions`
--

INSERT INTO `conditions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Baik', NULL, NULL),
(2, 'Perlu Perbaikan', NULL, NULL),
(3, 'Rusak', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `stuff_id` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id`, `stuff_id`, `location`, `condition_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'R. Prodi Informasi', 1, 9, '2018-08-02 14:51:59', '2018-08-02 14:51:59'),
(2, 1, 'R. Prodi Informasi', 2, 0, '2018-08-02 14:51:59', '2018-08-02 14:51:59'),
(3, 1, 'R. Prodi Informasi', 3, 0, '2018-08-02 14:51:59', '2018-08-02 14:51:59'),
(4, 2, 'R. Prodi Informasi', 1, 3, '2018-08-02 14:52:38', '2018-08-02 14:52:38'),
(5, 2, 'R. Prodi Informasi', 2, 0, '2018-08-02 14:52:38', '2018-08-02 14:52:38'),
(6, 2, 'R. Prodi Informasi', 3, 0, '2018-08-02 14:52:38', '2018-08-02 14:52:38'),
(7, 3, 'R. Prodi Informasi', 1, 3, '2018-08-02 14:53:12', '2018-08-02 14:53:12'),
(8, 3, 'R. Prodi Informasi', 2, 0, '2018-08-02 14:53:12', '2018-08-02 14:53:12'),
(9, 3, 'R. Prodi Informasi', 3, 0, '2018-08-02 14:53:12', '2018-08-02 14:53:12'),
(10, 4, 'R. Prodi Informasi', 1, 3, '2018-08-02 14:53:38', '2018-08-02 14:53:38'),
(11, 4, 'R. Prodi Informasi', 2, 0, '2018-08-02 14:53:38', '2018-08-02 14:53:38'),
(12, 4, 'R. Prodi Informasi', 3, 0, '2018-08-02 14:53:38', '2018-08-02 14:53:38'),
(13, 5, 'R. Prodi Informasi', 1, 1, '2018-08-02 14:54:07', '2018-08-02 14:54:07'),
(14, 5, 'R. Prodi Informasi', 2, 0, '2018-08-02 14:54:07', '2018-08-02 14:54:07'),
(15, 5, 'R. Prodi Informasi', 3, 0, '2018-08-02 14:54:07', '2018-08-02 14:54:07'),
(16, 6, 'R. Prodi Informasi', 1, 1, '2018-08-02 14:54:31', '2018-08-02 14:54:31'),
(17, 6, 'R. Prodi Informasi', 2, 0, '2018-08-02 14:54:31', '2018-08-02 14:54:31'),
(18, 6, 'R. Prodi Informasi', 3, 0, '2018-08-02 14:54:31', '2018-08-02 14:54:31'),
(19, 7, 'R. Prodi Informasi', 1, 4, '2018-08-02 14:54:59', '2018-08-02 14:54:59'),
(20, 7, 'R. Prodi Informasi', 2, 0, '2018-08-02 14:54:59', '2018-08-02 14:54:59'),
(21, 7, 'R. Prodi Informasi', 3, 0, '2018-08-02 14:54:59', '2018-08-02 14:54:59'),
(22, 8, 'R. Prodi Informasi', 1, 1, '2018-08-02 14:55:28', '2018-08-02 14:55:28'),
(23, 8, 'R. Prodi Informasi', 2, 0, '2018-08-02 14:55:28', '2018-08-02 14:55:28'),
(24, 8, 'R. Prodi Informasi', 3, 0, '2018-08-02 14:55:28', '2018-08-02 14:55:28'),
(25, 9, 'R. Prodi Informasi', 1, 1, '2018-08-02 14:55:47', '2018-08-02 14:55:47'),
(26, 9, 'R. Prodi Informasi', 2, 0, '2018-08-02 14:55:48', '2018-08-02 14:55:48'),
(27, 9, 'R. Prodi Informasi', 3, 0, '2018-08-02 14:55:48', '2018-08-02 14:55:48'),
(28, 10, 'R. Prodi Industri', 1, 9, '2018-08-02 15:00:14', '2018-08-02 15:00:14'),
(29, 10, 'R. Prodi Industri', 2, 0, '2018-08-02 15:00:14', '2018-08-02 15:00:14'),
(30, 10, 'R. Prodi Industri', 3, 0, '2018-08-02 15:00:14', '2018-08-02 15:00:14'),
(31, 11, 'R. Prodi Industri', 1, 3, '2018-08-02 15:00:35', '2018-08-02 15:00:35'),
(32, 11, 'R. Prodi Industri', 2, 0, '2018-08-02 15:00:36', '2018-08-02 15:00:36'),
(33, 11, 'R. Prodi Industri', 3, 0, '2018-08-02 15:00:36', '2018-08-02 15:00:36'),
(34, 12, 'R. Prodi Industri', 1, 3, '2018-08-02 15:00:58', '2018-08-02 15:00:58'),
(35, 12, 'R. Prodi Industri', 2, 0, '2018-08-02 15:00:58', '2018-08-02 15:00:58'),
(36, 12, 'R. Prodi Industri', 3, 0, '2018-08-02 15:00:58', '2018-08-02 15:00:58'),
(37, 13, 'R. Prodi Industri', 1, 3, '2018-08-02 15:01:27', '2018-08-02 15:01:27'),
(38, 13, 'R. Prodi Industri', 2, 0, '2018-08-02 15:01:27', '2018-08-02 15:01:27'),
(39, 13, 'R. Prodi Industri', 3, 0, '2018-08-02 15:01:27', '2018-08-02 15:01:27'),
(40, 14, 'R. Prodi Industri', 1, 1, '2018-08-02 15:01:55', '2018-08-02 15:01:55'),
(41, 14, 'R. Prodi Industri', 2, 0, '2018-08-02 15:01:55', '2018-08-02 15:01:55'),
(42, 14, 'R. Prodi Industri', 3, 0, '2018-08-02 15:01:55', '2018-08-02 15:01:55'),
(43, 15, 'R. Prodi Industri', 1, 1, '2018-08-02 15:02:15', '2018-08-02 15:02:15'),
(44, 15, 'R. Prodi Industri', 2, 0, '2018-08-02 15:02:15', '2018-08-02 15:02:15'),
(45, 15, 'R. Prodi Industri', 3, 0, '2018-08-02 15:02:16', '2018-08-02 15:02:16'),
(46, 16, 'R. Prodi Industri', 1, 4, '2018-08-02 15:02:36', '2018-08-02 15:02:36'),
(47, 16, 'R. Prodi Industri', 2, 0, '2018-08-02 15:02:36', '2018-08-02 15:02:36'),
(48, 16, 'R. Prodi Industri', 3, 0, '2018-08-02 15:02:36', '2018-08-02 15:02:36'),
(49, 17, 'R. Prodi Industri', 1, 1, '2018-08-02 15:03:00', '2018-08-02 15:03:00'),
(50, 17, 'R. Prodi Industri', 2, 0, '2018-08-02 15:03:00', '2018-08-02 15:03:00'),
(51, 17, 'R. Prodi Industri', 3, 0, '2018-08-02 15:03:00', '2018-08-02 15:03:00'),
(52, 18, 'R. Prodi Industri', 1, 1, '2018-08-02 15:03:20', '2018-08-02 15:03:20'),
(53, 18, 'R. Prodi Industri', 2, 0, '2018-08-02 15:03:20', '2018-08-02 15:03:20'),
(54, 18, 'R. Prodi Industri', 3, 0, '2018-08-02 15:03:20', '2018-08-02 15:03:20'),
(55, 19, 'R. Prodi Kimia', 1, 2, '2018-08-02 15:56:45', '2018-08-02 15:56:45'),
(56, 19, 'R. Prodi Kimia', 2, 0, '2018-08-02 15:56:45', '2018-08-02 15:56:45'),
(57, 19, 'R. Prodi Kimia', 3, 0, '2018-08-02 15:56:45', '2018-08-02 15:56:45'),
(58, 20, 'R. Prodi Kimia', 1, 1, '2018-08-02 15:57:09', '2018-08-02 15:57:09'),
(59, 20, 'R. Prodi Kimia', 2, 0, '2018-08-02 15:57:09', '2018-08-02 15:57:09'),
(60, 20, 'R. Prodi Kimia', 3, 0, '2018-08-02 15:57:09', '2018-08-02 15:57:09'),
(61, 21, 'R. Prodi Kimia', 1, 2, '2018-08-02 15:57:35', '2018-08-02 15:57:35'),
(62, 21, 'R. Prodi Kimia', 2, 0, '2018-08-02 15:57:35', '2018-08-02 15:57:35'),
(63, 21, 'R. Prodi Kimia', 3, 0, '2018-08-02 15:57:35', '2018-08-02 15:57:35'),
(64, 22, 'R. Prodi Kimia', 1, 6, '2018-08-02 15:58:02', '2018-08-02 15:58:02'),
(65, 22, 'R. Prodi Kimia', 2, 0, '2018-08-02 15:58:02', '2018-08-02 15:58:02'),
(66, 22, 'R. Prodi Kimia', 3, 0, '2018-08-02 15:58:02', '2018-08-02 15:58:02'),
(67, 23, 'R. Prodi Kimia', 1, 1, '2018-08-02 15:58:22', '2018-08-02 15:58:22'),
(68, 23, 'R. Prodi Kimia', 2, 0, '2018-08-02 15:58:22', '2018-08-02 15:58:22'),
(69, 23, 'R. Prodi Kimia', 3, 0, '2018-08-02 15:58:22', '2018-08-02 15:58:22'),
(70, 24, 'R. Prodi Kimia', 1, 2, '2018-08-02 15:58:43', '2018-08-02 15:58:43'),
(71, 24, 'R. Prodi Kimia', 2, 0, '2018-08-02 15:58:43', '2018-08-02 15:58:43'),
(72, 24, 'R. Prodi Kimia', 3, 0, '2018-08-02 15:58:43', '2018-08-02 15:58:43'),
(73, 25, 'R. Prodi Kimia', 1, 2, '2018-08-02 15:59:03', '2018-08-02 15:59:03'),
(74, 25, 'R. Prodi Kimia', 2, 1, '2018-08-02 15:59:03', '2018-08-02 15:59:03'),
(75, 25, 'R. Prodi Kimia', 3, 0, '2018-08-02 15:59:03', '2018-08-02 15:59:03'),
(76, 26, 'R. Prodi Kimia', 1, 1, '2018-08-02 15:59:23', '2018-08-02 15:59:23'),
(77, 26, 'R. Prodi Kimia', 2, 0, '2018-08-02 15:59:23', '2018-08-02 15:59:23'),
(78, 26, 'R. Prodi Kimia', 3, 0, '2018-08-02 15:59:23', '2018-08-02 15:59:23'),
(79, 27, 'R. Prodi Elektro', 1, 0, '2018-08-02 16:05:11', '2018-08-02 16:05:11'),
(80, 27, 'R. Prodi Elektro', 2, 1, '2018-08-02 16:05:11', '2018-08-02 16:05:11'),
(81, 27, 'R. Prodi Elektro', 3, 0, '2018-08-02 16:05:11', '2018-08-02 16:05:11'),
(82, 28, 'R. Prodi Elektro', 1, 1, '2018-08-02 16:05:31', '2018-08-02 16:05:31'),
(83, 28, 'R. Prodi Elektro', 2, 0, '2018-08-02 16:05:31', '2018-08-02 16:05:31'),
(84, 28, 'R. Prodi Elektro', 3, 0, '2018-08-02 16:05:31', '2018-08-02 16:05:31'),
(85, 29, 'R. Prodi Elektro', 1, 1, '2018-08-02 16:05:54', '2018-08-02 16:05:54'),
(86, 29, 'R. Prodi Elektro', 2, 3, '2018-08-02 16:05:54', '2018-08-02 16:05:54'),
(87, 29, 'R. Prodi Elektro', 3, 0, '2018-08-02 16:05:54', '2018-08-02 16:05:54'),
(88, 31, 'R. Prodi Elektro', 1, 0, '2018-08-02 16:06:19', '2018-08-02 16:06:19'),
(89, 31, 'R. Prodi Elektro', 2, 2, '2018-08-02 16:06:19', '2018-08-02 16:06:19'),
(90, 31, 'R. Prodi Elektro', 3, 0, '2018-08-02 16:06:19', '2018-08-02 16:06:19'),
(91, 30, 'R. Prodi Elektro', 1, 4, '2018-08-02 16:06:41', '2018-08-02 16:06:41'),
(92, 30, 'R. Prodi Elektro', 2, 0, '2018-08-02 16:06:41', '2018-08-02 16:06:41'),
(93, 30, 'R. Prodi Elektro', 3, 0, '2018-08-02 16:06:41', '2018-08-02 16:06:41'),
(94, 32, 'R. Prodi Elektro', 1, 0, '2018-08-02 16:07:13', '2018-08-02 16:07:13'),
(95, 32, 'R. Prodi Elektro', 2, 2, '2018-08-02 16:07:13', '2018-08-02 16:07:13'),
(96, 32, 'R. Prodi Elektro', 3, 0, '2018-08-02 16:07:13', '2018-08-02 16:07:13'),
(97, 33, 'R. Prodi Elektro', 1, 0, '2018-08-02 16:07:53', '2018-08-02 16:07:53'),
(98, 33, 'R. Prodi Elektro', 2, 1, '2018-08-02 16:07:53', '2018-08-02 16:07:53'),
(99, 33, 'R. Prodi Elektro', 3, 0, '2018-08-02 16:07:53', '2018-08-02 16:07:53'),
(100, 34, 'R. Prodi Elektro', 1, 0, '2018-08-02 16:08:17', '2018-08-02 16:08:17'),
(101, 34, 'R. Prodi Elektro', 2, 1, '2018-08-02 16:08:17', '2018-08-02 16:08:17'),
(102, 34, 'R. Prodi Elektro', 3, 0, '2018-08-02 16:08:17', '2018-08-02 16:08:17'),
(103, 35, 'R. Prodi Elektro', 1, 0, '2018-08-02 16:08:41', '2018-08-02 16:08:41'),
(104, 35, 'R. Prodi Elektro', 2, 1, '2018-08-02 16:08:41', '2018-08-02 16:08:41'),
(105, 35, 'R. Prodi Elektro', 3, 0, '2018-08-02 16:08:41', '2018-08-02 16:08:41'),
(106, 36, 'R. Prodi Elektro', 1, 1, '2018-08-02 16:08:59', '2018-08-02 16:08:59'),
(107, 36, 'R. Prodi Elektro', 2, 0, '2018-08-02 16:08:59', '2018-08-02 16:08:59'),
(108, 36, 'R. Prodi Elektro', 3, 0, '2018-08-02 16:08:59', '2018-08-02 16:08:59'),
(109, 37, 'R. TU', 1, 1, '2018-08-02 16:15:23', '2018-08-02 16:15:23'),
(110, 37, 'R. TU', 2, 0, '2018-08-02 16:15:23', '2018-08-02 16:15:23'),
(111, 37, 'R. TU', 3, 0, '2018-08-02 16:15:23', '2018-08-02 16:15:23'),
(112, 38, 'R. TU', 1, 1, '2018-08-02 16:15:42', '2018-08-02 16:15:42'),
(113, 38, 'R. TU', 2, 0, '2018-08-02 16:15:42', '2018-08-02 16:15:42'),
(114, 38, 'R. TU', 3, 0, '2018-08-02 16:15:42', '2018-08-02 16:15:42'),
(115, 39, 'R. TU', 1, 0, '2018-08-02 16:16:04', '2018-08-02 16:16:04'),
(116, 39, 'R. TU', 2, 1, '2018-08-02 16:16:04', '2018-08-02 16:16:04'),
(117, 39, 'R. TU', 3, 0, '2018-08-02 16:16:04', '2018-08-02 16:16:04'),
(118, 40, 'R. TU', 1, 0, '2018-08-02 16:16:29', '2018-08-02 16:16:29'),
(119, 40, 'R. TU', 2, 1, '2018-08-02 16:16:29', '2018-08-02 16:16:29'),
(120, 40, 'R. TU', 3, 0, '2018-08-02 16:16:29', '2018-08-02 16:16:29'),
(121, 41, 'R. TU', 1, 1, '2018-08-02 16:16:59', '2018-08-02 16:16:59'),
(122, 41, 'R. TU', 2, 0, '2018-08-02 16:16:59', '2018-08-02 16:16:59'),
(123, 41, 'R. TU', 3, 0, '2018-08-02 16:16:59', '2018-08-02 16:16:59'),
(124, 42, 'R. TU', 1, 1, '2018-08-02 16:17:25', '2018-08-02 16:17:25'),
(125, 42, 'R. TU', 2, 0, '2018-08-02 16:17:25', '2018-08-02 16:17:25'),
(126, 42, 'R. TU', 3, 0, '2018-08-02 16:17:25', '2018-08-02 16:17:25'),
(127, 37, 'R. Sekprodi', 1, 1, '2018-08-02 16:24:10', '2018-08-02 16:24:10'),
(128, 37, 'R. Sekprodi', 2, 0, '2018-08-02 16:24:10', '2018-08-02 16:24:10'),
(129, 37, 'R. Sekprodi', 3, 0, '2018-08-02 16:24:10', '2018-08-02 16:24:10'),
(130, 38, 'R. Sekprodi', 1, 1, '2018-08-02 16:25:32', '2018-08-02 16:25:32'),
(131, 38, 'R. Sekprodi', 2, 0, '2018-08-02 16:25:32', '2018-08-02 16:25:32'),
(132, 38, 'R. Sekprodi', 3, 0, '2018-08-02 16:25:32', '2018-08-02 16:25:32'),
(133, 39, 'R. Sekprodi', 1, 1, '2018-08-02 16:25:52', '2018-08-02 16:25:52'),
(134, 39, 'R. Sekprodi', 2, 0, '2018-08-02 16:25:52', '2018-08-02 16:25:52'),
(135, 39, 'R. Sekprodi', 3, 0, '2018-08-02 16:25:52', '2018-08-02 16:25:52'),
(136, 40, 'R. Sekprodi', 1, 1, '2018-08-02 16:26:11', '2018-08-02 16:26:11'),
(137, 40, 'R. Sekprodi', 2, 0, '2018-08-02 16:26:11', '2018-08-02 16:26:11'),
(138, 40, 'R. Sekprodi', 3, 0, '2018-08-02 16:26:11', '2018-08-02 16:26:11'),
(139, 41, 'R. Sekprodi', 1, 1, '2018-08-02 16:26:29', '2018-08-02 16:26:29'),
(140, 41, 'R. Sekprodi', 2, 0, '2018-08-02 16:26:29', '2018-08-02 16:26:29'),
(141, 41, 'R. Sekprodi', 3, 0, '2018-08-02 16:26:29', '2018-08-02 16:26:29'),
(142, 37, 'R. Dosen TIF', 1, 2, '2018-08-02 16:27:05', '2018-08-02 16:27:05'),
(143, 37, 'R. Dosen TIF', 2, 0, '2018-08-02 16:27:05', '2018-08-02 16:27:05'),
(144, 37, 'R. Dosen TIF', 3, 0, '2018-08-02 16:27:05', '2018-08-02 16:27:05'),
(145, 38, 'R. Dosen TIF', 1, 2, '2018-08-02 16:27:27', '2018-08-02 16:27:27'),
(146, 38, 'R. Dosen TIF', 2, 0, '2018-08-02 16:27:27', '2018-08-02 16:27:27'),
(147, 38, 'R. Dosen TIF', 3, 0, '2018-08-02 16:27:27', '2018-08-02 16:27:27'),
(148, 40, 'R. Dosen TIF', 1, 2, '2018-08-02 16:27:45', '2018-08-02 16:27:45'),
(149, 40, 'R. Dosen TIF', 2, 0, '2018-08-02 16:27:45', '2018-08-02 16:27:45'),
(150, 40, 'R. Dosen TIF', 3, 0, '2018-08-02 16:27:45', '2018-08-02 16:27:45'),
(151, 41, 'R. Dosen TIF', 1, 2, '2018-08-02 16:28:04', '2018-08-02 16:28:04'),
(152, 41, 'R. Dosen TIF', 2, 0, '2018-08-02 16:28:04', '2018-08-02 16:28:04'),
(153, 41, 'R. Dosen TIF', 3, 0, '2018-08-02 16:28:04', '2018-08-02 16:28:04'),
(154, 37, 'R. Prodi TIF', 1, 1, '2018-08-02 16:31:18', '2018-08-02 16:31:18'),
(155, 37, 'R. Prodi TIF', 2, 0, '2018-08-02 16:31:18', '2018-08-02 16:31:18'),
(156, 37, 'R. Prodi TIF', 3, 0, '2018-08-02 16:31:18', '2018-08-02 16:31:18'),
(157, 44, 'R. Prodi TIF', 1, 0, '2018-08-02 16:31:43', '2018-08-02 16:31:43'),
(158, 44, 'R. Prodi TIF', 2, 1, '2018-08-02 16:31:43', '2018-08-02 16:31:43'),
(159, 44, 'R. Prodi TIF', 3, 0, '2018-08-02 16:31:43', '2018-08-02 16:31:43'),
(160, 45, 'R. Prodi TIF', 1, 5, '2018-08-02 16:32:03', '2018-08-02 16:32:03'),
(161, 45, 'R. Prodi TIF', 2, 0, '2018-08-02 16:32:04', '2018-08-02 16:32:04'),
(162, 45, 'R. Prodi TIF', 3, 0, '2018-08-02 16:32:04', '2018-08-02 16:32:04'),
(163, 46, 'R. Prodi TIF', 1, 17, '2018-08-02 16:32:35', '2018-08-02 16:32:35'),
(164, 46, 'R. Prodi TIF', 2, 0, '2018-08-02 16:32:35', '2018-08-02 16:32:35'),
(165, 46, 'R. Prodi TIF', 3, 0, '2018-08-02 16:32:35', '2018-08-02 16:32:35'),
(166, 47, 'R. Prodi TIF', 1, 5, '2018-08-02 16:32:55', '2018-08-02 16:32:55'),
(167, 47, 'R. Prodi TIF', 2, 0, '2018-08-02 16:32:55', '2018-08-02 16:32:55'),
(168, 47, 'R. Prodi TIF', 3, 0, '2018-08-02 16:32:55', '2018-08-02 16:32:55'),
(169, 48, 'R. Prodi TIF', 1, 3, '2018-08-02 16:33:21', '2018-08-02 16:33:21'),
(170, 48, 'R. Prodi TIF', 2, 0, '2018-08-02 16:33:21', '2018-08-02 16:33:21'),
(171, 48, 'R. Prodi TIF', 3, 0, '2018-08-02 16:33:21', '2018-08-02 16:33:21'),
(172, 49, 'R. Prodi TIF', 1, 16, '2018-08-02 16:33:44', '2018-08-02 16:33:44'),
(173, 49, 'R. Prodi TIF', 2, 0, '2018-08-02 16:33:44', '2018-08-02 16:33:44'),
(174, 49, 'R. Prodi TIF', 3, 0, '2018-08-02 16:33:44', '2018-08-02 16:33:44'),
(175, 51, 'R. Prodi TIF', 1, 1, '2018-08-02 16:34:05', '2018-08-02 16:34:05'),
(176, 51, 'R. Prodi TIF', 2, 0, '2018-08-02 16:34:05', '2018-08-02 16:34:05'),
(177, 51, 'R. Prodi TIF', 3, 0, '2018-08-02 16:34:05', '2018-08-02 16:34:05'),
(178, 50, 'R. Prodi TIF', 1, 1, '2018-08-02 16:34:22', '2018-08-02 16:34:22'),
(179, 50, 'R. Prodi TIF', 2, 0, '2018-08-02 16:34:22', '2018-08-02 16:34:22'),
(180, 50, 'R. Prodi TIF', 3, 0, '2018-08-02 16:34:22', '2018-08-02 16:34:22'),
(181, 52, 'R. Prodi TIF', 1, 1, '2018-08-02 16:36:58', '2018-08-02 16:36:58'),
(182, 52, 'R. Prodi TIF', 2, 1, '2018-08-02 16:36:58', '2018-08-02 16:36:58'),
(183, 52, 'R. Prodi TIF', 3, 0, '2018-08-02 16:36:58', '2018-08-02 16:36:58'),
(184, 53, 'R. Prodi TIF', 1, 4, '2018-08-02 16:37:23', '2018-08-02 16:37:23'),
(185, 53, 'R. Prodi TIF', 2, 0, '2018-08-02 16:37:23', '2018-08-02 16:37:23'),
(186, 53, 'R. Prodi TIF', 3, 0, '2018-08-02 16:37:23', '2018-08-02 16:37:23'),
(187, 54, 'R. Prodi TIF', 1, 1, '2018-08-02 16:37:45', '2018-08-02 16:37:45'),
(188, 54, 'R. Prodi TIF', 2, 0, '2018-08-02 16:37:45', '2018-08-02 16:37:45'),
(189, 54, 'R. Prodi TIF', 3, 0, '2018-08-02 16:37:45', '2018-08-02 16:37:45'),
(190, 55, 'R. Prodi TIF', 1, 1, '2018-08-02 16:38:13', '2018-08-02 16:38:13'),
(191, 55, 'R. Prodi TIF', 2, 0, '2018-08-02 16:38:13', '2018-08-02 16:38:13'),
(192, 55, 'R. Prodi TIF', 3, 1, '2018-08-02 16:38:13', '2018-08-02 16:38:13'),
(193, 57, 'R. Prodi TIF', 1, 2, '2018-08-02 16:38:34', '2018-08-02 16:38:34'),
(194, 57, 'R. Prodi TIF', 2, 0, '2018-08-02 16:38:34', '2018-08-02 16:38:34'),
(195, 57, 'R. Prodi TIF', 3, 0, '2018-08-02 16:38:34', '2018-08-02 16:38:34'),
(196, 56, 'R. Prodi TIF', 1, 2, '2018-08-02 16:38:55', '2018-08-02 16:38:55'),
(197, 56, 'R. Prodi TIF', 2, 0, '2018-08-02 16:38:55', '2018-08-02 16:38:55'),
(198, 56, 'R. Prodi TIF', 3, 0, '2018-08-02 16:38:55', '2018-08-02 16:38:55'),
(199, 58, 'R. Multimedia', 1, 1, '2018-08-02 16:41:26', '2018-08-02 16:41:26'),
(200, 58, 'R. Multimedia', 2, 0, '2018-08-02 16:41:26', '2018-08-02 16:41:26'),
(201, 58, 'R. Multimedia', 3, 0, '2018-08-02 16:41:27', '2018-08-02 16:41:27'),
(202, 59, 'R. Multimedia', 1, 1, '2018-08-02 16:41:48', '2018-08-02 16:41:48'),
(203, 59, 'R. Multimedia', 2, 0, '2018-08-02 16:41:48', '2018-08-02 16:41:48'),
(204, 59, 'R. Multimedia', 3, 0, '2018-08-02 16:41:49', '2018-08-02 16:41:49'),
(205, 60, 'R. Multimedia', 1, 1, '2018-08-02 16:42:08', '2018-08-02 16:42:08'),
(206, 60, 'R. Multimedia', 2, 0, '2018-08-02 16:42:08', '2018-08-02 16:42:08'),
(207, 60, 'R. Multimedia', 3, 0, '2018-08-02 16:42:08', '2018-08-02 16:42:08'),
(208, 61, 'R. Multimedia', 1, 2, '2018-08-02 16:42:31', '2018-08-02 16:42:31'),
(209, 61, 'R. Multimedia', 2, 0, '2018-08-02 16:42:31', '2018-08-02 16:42:31'),
(210, 61, 'R. Multimedia', 3, 0, '2018-08-02 16:42:31', '2018-08-02 16:42:31'),
(211, 52, 'R. Multimedia', 1, 0, '2018-08-02 16:42:58', '2018-08-02 16:42:58'),
(212, 52, 'R. Multimedia', 2, 0, '2018-08-02 16:42:58', '2018-08-02 16:42:58'),
(213, 52, 'R. Multimedia', 3, 3, '2018-08-02 16:42:58', '2018-08-02 16:42:58'),
(214, 45, 'R. Multimedia', 1, 1, '2018-08-02 16:43:20', '2018-08-02 16:43:20'),
(215, 45, 'R. Multimedia', 2, 0, '2018-08-02 16:43:20', '2018-08-02 16:43:20'),
(216, 45, 'R. Multimedia', 3, 0, '2018-08-02 16:43:20', '2018-08-02 16:43:20'),
(217, 37, 'R. Multimedia', 1, 1, '2018-08-02 16:43:41', '2018-08-02 16:43:41'),
(218, 37, 'R. Multimedia', 2, 0, '2018-08-02 16:43:41', '2018-08-02 16:43:41'),
(219, 37, 'R. Multimedia', 3, 0, '2018-08-02 16:43:41', '2018-08-02 16:43:41'),
(220, 52, 'R. Lab Komputer', 1, 3, '2018-08-02 16:46:17', '2018-08-02 16:46:17'),
(221, 52, 'R. Lab Komputer', 2, 0, '2018-08-02 16:46:17', '2018-08-02 16:46:17'),
(222, 52, 'R. Lab Komputer', 3, 0, '2018-08-02 16:46:18', '2018-08-02 16:46:18'),
(223, 62, 'R. Lab Komputer', 1, 30, '2018-08-02 16:46:40', '2018-08-02 16:46:40'),
(224, 62, 'R. Lab Komputer', 2, 0, '2018-08-02 16:46:40', '2018-08-02 16:46:40'),
(225, 62, 'R. Lab Komputer', 3, 0, '2018-08-02 16:46:40', '2018-08-02 16:46:40'),
(226, 47, 'R. Lab Komputer', 1, 30, '2018-08-02 16:47:03', '2018-08-02 16:47:03'),
(227, 47, 'R. Lab Komputer', 2, 0, '2018-08-02 16:47:03', '2018-08-02 16:47:03'),
(228, 47, 'R. Lab Komputer', 3, 0, '2018-08-02 16:47:03', '2018-08-02 16:47:03'),
(229, 63, 'R. Lab Komputer', 1, 1, '2018-08-02 16:47:22', '2018-08-02 16:47:22'),
(230, 63, 'R. Lab Komputer', 2, 0, '2018-08-02 16:47:22', '2018-08-02 16:47:22'),
(231, 63, 'R. Lab Komputer', 3, 0, '2018-08-02 16:47:22', '2018-08-02 16:47:22'),
(232, 49, 'R. Lab Komputer', 1, 1, '2018-08-02 16:47:45', '2018-08-02 16:47:45'),
(233, 49, 'R. Lab Komputer', 2, 0, '2018-08-02 16:47:45', '2018-08-02 16:47:45'),
(234, 49, 'R. Lab Komputer', 3, 0, '2018-08-02 16:47:45', '2018-08-02 16:47:45'),
(235, 64, 'R.104', 1, 3, '2018-08-03 04:05:04', '2018-08-03 04:07:08'),
(236, 64, 'R.104', 2, 1, '2018-08-03 04:05:04', '2018-08-03 04:06:06'),
(237, 64, 'R.104', 3, 0, '2018-08-03 04:05:04', '2018-08-03 04:05:04'),
(238, 65, 'R.202', 1, 2, '2018-08-03 04:09:57', '2018-08-03 04:10:56'),
(239, 65, 'R.202', 2, 0, '2018-08-03 04:09:57', '2018-08-03 04:10:24'),
(240, 65, 'R.202', 3, 0, '2018-08-03 04:09:57', '2018-08-03 04:09:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_25_060126_create_programs_table', 1),
(4, '2018_07_26_072539_create_categories_table', 1),
(5, '2018_07_26_072702_create_stuffs_table', 1),
(6, '2018_07_26_072801_create_items_table', 1),
(7, '2018_07_26_072825_create_conditions_table', 1),
(8, '2018_07_26_072920_create_repairs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `programs`
--

CREATE TABLE `programs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `programs`
--

INSERT INTO `programs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Informatika', '2018-07-26 10:13:20', NULL),
(2, 'Teknik Elektro', '2018-07-26 10:13:20', '2018-08-02 01:57:44'),
(3, 'Teknik Industri', '2018-07-26 10:13:20', NULL),
(4, 'Sistem Informasi', '2018-07-26 22:29:18', '2018-07-26 22:29:18'),
(5, 'Teknik Kimia', '2018-07-26 22:29:55', '2018-07-26 22:29:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `repairs`
--

CREATE TABLE `repairs` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stuffs`
--

CREATE TABLE `stuffs` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stuffs`
--

INSERT INTO `stuffs` (`id`, `category_id`, `program_id`, `name`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 'Meja', 9, '2018-08-02 14:47:49', '2018-08-02 14:51:59'),
(2, 1, 4, 'PC Komputer', 3, '2018-08-02 14:48:04', '2018-08-02 14:52:38'),
(3, 1, 4, 'Monitor', 3, '2018-08-02 14:48:42', '2018-08-02 14:53:12'),
(4, 1, 4, 'Printer', 3, '2018-08-02 14:48:56', '2018-08-02 14:53:38'),
(5, 1, 4, 'Dispenser', 1, '2018-08-02 14:49:14', '2018-08-02 14:54:07'),
(6, 1, 4, 'Jam Dinding', 1, '2018-08-02 14:49:38', '2018-08-02 14:54:31'),
(7, 3, 4, 'Almari Besi', 4, '2018-08-02 14:49:58', '2018-08-02 14:54:59'),
(8, 4, 4, 'Foto Presiden dan Wakilnya', 1, '2018-08-02 14:50:25', '2018-08-02 14:55:28'),
(9, 4, 4, 'Garuda Pancasila', 1, '2018-08-02 14:50:46', '2018-08-02 14:55:48'),
(10, 3, 3, 'Meja', 9, '2018-08-02 14:57:04', '2018-08-02 15:00:14'),
(11, 1, 3, 'PC Komputer', 3, '2018-08-02 14:57:28', '2018-08-02 15:00:36'),
(12, 1, 3, 'Monitor', 3, '2018-08-02 14:57:41', '2018-08-02 15:00:58'),
(13, 1, 3, 'Printer', 3, '2018-08-02 14:57:52', '2018-08-02 15:01:27'),
(14, 1, 3, 'Dispenser', 1, '2018-08-02 14:58:03', '2018-08-02 15:01:55'),
(15, 1, 3, 'Jam Dinding', 1, '2018-08-02 14:58:15', '2018-08-02 15:02:16'),
(16, 3, 3, 'Almari Besi', 4, '2018-08-02 14:58:31', '2018-08-02 15:02:37'),
(17, 4, 3, 'Foto Presiden dan Wakilnya', 1, '2018-08-02 14:58:44', '2018-08-02 15:03:00'),
(18, 4, 3, 'Garuda Pancasila', 1, '2018-08-02 14:58:57', '2018-08-02 15:03:20'),
(19, 1, 5, 'Meja Dosen', 2, '2018-08-02 15:48:24', '2018-08-02 15:56:45'),
(20, 3, 5, 'Loker', 1, '2018-08-02 15:53:29', '2018-08-02 15:57:09'),
(21, 3, 5, 'Lemari Kaca', 2, '2018-08-02 15:53:50', '2018-08-02 15:57:35'),
(22, 3, 5, 'Kursi', 6, '2018-08-02 15:54:35', '2018-08-02 15:58:02'),
(23, 1, 5, 'Dispenser', 1, '2018-08-02 15:54:52', '2018-08-02 15:58:22'),
(24, 1, 5, 'Komputer', 2, '2018-08-02 15:55:16', '2018-08-02 15:58:43'),
(25, 1, 5, 'Printer', 3, '2018-08-02 15:55:45', '2018-08-02 15:59:03'),
(26, 1, 5, 'Hardisk Eksternal', 1, '2018-08-02 15:56:09', '2018-08-02 15:59:23'),
(27, 3, 2, 'Almari File', 1, '2018-08-02 16:00:24', '2018-08-02 16:05:11'),
(28, 3, 2, 'Kursi Dosen', 1, '2018-08-02 16:00:41', '2018-08-02 16:05:31'),
(29, 3, 2, 'Meja Dosen', 4, '2018-08-02 16:01:06', '2018-08-02 16:05:54'),
(30, 3, 2, 'Kursi Putar', 4, '2018-08-02 16:01:41', '2018-08-02 16:06:41'),
(31, 3, 2, 'Meja Kaprodi', 2, '2018-08-02 16:02:36', '2018-08-02 16:06:20'),
(32, 3, 2, 'Meja Komputer', 2, '2018-08-02 16:02:56', '2018-08-02 16:07:13'),
(33, 1, 2, 'PC Unit', 1, '2018-08-02 16:03:16', '2018-08-02 16:07:53'),
(34, 1, 2, 'Printer', 1, '2018-08-02 16:03:31', '2018-08-02 16:08:17'),
(35, 1, 2, 'UPS', 1, '2018-08-02 16:03:53', '2018-08-02 16:08:41'),
(36, 1, 2, 'Wireless Aplifer', 1, '2018-08-02 16:04:23', '2018-08-02 16:08:59'),
(37, 1, 1, 'LCD', 6, '2018-08-02 16:13:41', '2018-08-02 16:43:41'),
(38, 1, 1, 'CPU', 4, '2018-08-02 16:13:57', '2018-08-02 16:27:27'),
(39, 1, 1, 'Keyboard', 2, '2018-08-02 16:14:10', '2018-08-02 16:25:52'),
(40, 1, 1, 'Mouse', 4, '2018-08-02 16:14:21', '2018-08-02 16:27:45'),
(41, 1, 1, 'Printer', 4, '2018-08-02 16:14:34', '2018-08-02 16:28:04'),
(42, 1, 1, 'Sound', 1, '2018-08-02 16:14:51', '2018-08-02 16:17:25'),
(43, 3, 1, 'Rak Panjang', 0, '2018-08-02 16:28:37', '2018-08-02 16:28:37'),
(44, 1, 1, 'Dispenser', 1, '2018-08-02 16:28:54', '2018-08-02 16:31:43'),
(45, 3, 1, 'Lemari Besi Outner', 6, '2018-08-02 16:29:14', '2018-08-02 16:43:20'),
(46, 3, 1, 'Meja', 17, '2018-08-02 16:29:28', '2018-08-02 16:32:35'),
(47, 3, 1, 'Meja Komputer', 35, '2018-08-02 16:29:43', '2018-08-02 16:47:03'),
(48, 3, 1, 'Kursi Putar', 3, '2018-08-02 16:29:56', '2018-08-02 16:33:21'),
(49, 3, 1, 'Kursi Biru Futura', 17, '2018-08-02 16:30:19', '2018-08-02 16:47:45'),
(50, 1, 1, 'KUlkas', 1, '2018-08-02 16:30:32', '2018-08-02 16:34:22'),
(51, 1, 1, 'TV', 1, '2018-08-02 16:30:43', '2018-08-02 16:34:05'),
(52, 1, 1, 'AC', 8, '2018-08-02 16:34:49', '2018-08-02 16:46:18'),
(53, 3, 1, 'Rak Susun Warna', 4, '2018-08-02 16:35:15', '2018-08-02 16:37:23'),
(54, 3, 1, 'Kotak Obat', 1, '2018-08-02 16:35:40', '2018-08-02 16:37:45'),
(55, 1, 1, 'Jam Dinding', 2, '2018-08-02 16:35:56', '2018-08-02 16:38:13'),
(56, 4, 1, 'Garuda Pancasila', 2, '2018-08-02 16:36:09', '2018-08-02 16:38:55'),
(57, 4, 1, 'Foto Presiden dan Wakilnya', 2, '2018-08-02 16:36:25', '2018-08-02 16:38:34'),
(58, 1, 1, 'Kamera DCR-SD100', 1, '2018-08-02 16:39:26', '2018-08-02 16:41:27'),
(59, 1, 1, 'Kamera Vidio', 1, '2018-08-02 16:39:40', '2018-08-02 16:41:49'),
(60, 1, 1, 'Kamera DSLR', 1, '2018-08-02 16:39:59', '2018-08-02 16:42:08'),
(61, 4, 1, 'Tripot', 2, '2018-08-02 16:40:22', '2018-08-02 16:42:31'),
(62, 1, 1, 'Komputer', 30, '2018-08-02 16:44:56', '2018-08-02 16:46:40'),
(63, 3, 1, 'Meja Dosen', 1, '2018-08-02 16:45:15', '2018-08-02 16:47:22'),
(64, 3, 1, 'Papan Tulis', 4, '2018-08-03 04:04:03', '2018-08-03 04:05:04'),
(65, 5, 4, 'Buku', 2, '2018-08-03 04:09:18', '2018-08-03 04:09:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `program_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@unipma.ac.id', '$2y$10$Ueh4j.SO6OyFSqNRABX3WuHM1baTEM.CHeNvHFQ1tX2l11h0Y60Wa', 'admin', 1, 'l0AFJaCLfs1UBCvhmGYmENLV7HNs3PcoVMTTkRBDxHo677ZPOAnVFYOej5Bw', NULL, '2018-08-02 12:40:34'),
(2, 'Unit Inventaris', 'unit@unipma.ac.id', '$2y$10$Kq4M7Or4GDS9w0RC/5sYBu.yOMqgV7xKfjJyxdjSlqxDWn6k9VuwS', 'unit', 1, 'mHxM7EDydlIUZk1rSWH1KUf5WnTv4wioKu07Hzin9dAPKLzy9B9kPjWzjbfH', NULL, NULL),
(3, 'Teknik Informatika', 'informatika@unipma.ac.id', '$2y$10$pdEUjaiNqAgZgBMlf5T4ru4M.UIkxrVOgNmheO7YDfFoxRh/iNR8e', 'program_study', 1, 'Pyes0g6rJo9OY6nLlxJpLKwxIK71JfJazVwSsCnCnjNLlDNGxrkEM8qBESLC', NULL, '2018-08-01 10:12:19'),
(5, 'Teknik Industri', 'industri@unipma.ac.id', '$2y$10$enM/mQrdDcaBANBmnUE1/.PFRPkIPo.VrAhek.26TZDbi2puo4Ds2', 'program_study', 3, 'Zv9pwbmpDdJwzSwWe7eZjIq0JlggHgOsQmIvKvnbTMldbB8lh2q9fs5kh5Ss', NULL, '2018-08-02 02:10:14'),
(6, 'Teknik Kimia', 'kimia@unipma.ac.id', '$2y$10$379IHYcxdnUd.fQbiaSHe.MmR1hYyP2Z3njBxwPqDHviFxMeEykty', 'program_study', 5, 'qZ5X3b78t6WOchGm46pX1xmggGcTnV84KyiUpi5cgYg994nBaWDplK47Iiy6', '2018-08-02 01:56:16', '2018-08-02 01:56:16'),
(7, 'Sistem Informasi', 'sisteminformasi@unipma.ac.id', '$2y$10$fqMNbHPhlmYiKsOnnrwOMes7An7FLBMjzsHnPyr79y7PKQ1fdckiy', 'program_study', 4, '5TDH2as38RAJWYHdKw01QEsunHBVtK0d0Oomd2bqskRUxB5kbJs7v89dbTVy', '2018-08-02 01:57:15', '2018-08-02 14:47:01'),
(8, 'Teknik Elektro', 'elektro@unipma.ac.id', '$2y$10$38HQF4K6ljJkGdpj7Tb59OR5R0cibyP7a1xqcDNjV3Ycgk.tUXBnO', 'program_study', 2, 'yy5gdaBHhtU8R8KO65sG9OAow3dvv14g18HEnJM8l6Yp135PhaZfQArpat7H', '2018-08-02 01:58:29', '2018-08-02 01:58:29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `repairs`
--
ALTER TABLE `repairs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stuffs`
--
ALTER TABLE `stuffs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `repairs`
--
ALTER TABLE `repairs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stuffs`
--
ALTER TABLE `stuffs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
