-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2023 at 06:14 PM
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
-- Database: `cnapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criteria` varchar(255) NOT NULL,
  `minMax` varchar(255) NOT NULL,
  `weight` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `criteria`, `minMax`, `weight`, `created_at`, `updated_at`) VALUES
(1, 'Keaktifan', 'max', 5, '2023-07-19 14:57:46', '2023-07-21 15:33:48'),
(2, 'Tepat Waktu', 'max', 4, '2023-07-19 14:57:53', '2023-07-19 14:57:53'),
(3, 'Kepemimpinan', 'max', 3, '2023-07-19 14:58:09', '2023-07-19 14:58:24'),
(4, 'Komunikasi', 'max', 4, '2023-07-19 14:58:32', '2023-07-19 14:58:32'),
(7, 'Tidak Hadir', 'min', 3, '2023-07-26 19:34:11', '2023-07-26 19:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `div_name` varchar(255) NOT NULL,
  `descripyion` varchar(255) DEFAULT NULL,
  `dept_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `kandidat_penilaians`
--

CREATE TABLE `kandidat_penilaians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `id_rekap` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kandidat_penilaians`
--

INSERT INTO `kandidat_penilaians` (`id`, `user_id`, `id_rekap`, `created_at`, `updated_at`) VALUES
(6, 1, 2, '2023-07-20 15:06:09', '2023-07-20 15:06:09'),
(7, 2, 2, '2023-07-20 15:06:27', '2023-07-20 15:06:27'),
(8, 3, 1, '2023-07-21 18:22:50', '2023-07-21 18:22:50'),
(10, 4, 1, '2023-07-21 18:23:26', '2023-07-21 18:23:26'),
(11, 1, 1, '2023-07-21 18:23:31', '2023-07-21 18:23:31'),
(12, 2, 1, '2023-07-21 18:23:34', '2023-07-21 18:23:34'),
(15, 7, 1, '2023-07-26 19:48:21', '2023-07-26 19:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_penilaians`
--

CREATE TABLE `kriteria_penilaians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `id_rekap` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria_penilaians`
--

INSERT INTO `kriteria_penilaians` (`id`, `criteria_id`, `id_rekap`, `created_at`, `updated_at`) VALUES
(6, 1, 2, '2023-07-20 15:06:13', '2023-07-20 15:06:13'),
(7, 2, 2, '2023-07-20 15:06:31', '2023-07-20 15:06:31'),
(9, 1, 1, '2023-07-26 19:34:49', '2023-07-26 19:34:49'),
(10, 2, 1, '2023-07-26 19:34:56', '2023-07-26 19:34:56'),
(11, 3, 1, '2023-07-26 19:34:59', '2023-07-26 19:34:59'),
(12, 4, 1, '2023-07-26 19:35:02', '2023-07-26 19:35:02'),
(13, 7, 1, '2023-07-26 19:35:08', '2023-07-26 19:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `logbooks`
--

CREATE TABLE `logbooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logbook` varchar(255) NOT NULL,
  `accepted` tinyint(4) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `approver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_27_184358_create_positions_table', 1),
(6, '2022_12_01_074623_create_departments_table', 1),
(7, '2022_12_02_135600_create_divisions_table', 1),
(8, '2022_12_09_011956_create_logbooks_table', 1),
(9, '2022_12_26_140209_create_criterias_table', 1),
(10, '2022_12_29_001842_create_scorings_table', 1),
(11, '2023_06_14_000747_create_rekaps_table', 1),
(12, '2023_06_23_012032_create_normalisasis_table', 1),
(13, '2023_06_23_012117_create_rankings_table', 1),
(14, '2023_06_26_163328_create_kriteria_penilaians_table', 1),
(15, '2023_06_29_003102_create_kandidat_penilaians_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `normalisasis`
--

CREATE TABLE `normalisasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kandidat_penilaian` bigint(20) UNSIGNED DEFAULT NULL,
  `nilai_normalisasi` double(8,3) NOT NULL,
  `kriteria_penilaian` bigint(20) UNSIGNED DEFAULT NULL,
  `id_rekap` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `normalisasis`
--

INSERT INTO `normalisasis` (`id`, `kandidat_penilaian`, `nilai_normalisasi`, `kriteria_penilaian`, `id_rekap`, `created_at`, `updated_at`) VALUES
(75, 8, 0.918, 9, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(76, 10, 0.816, 9, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(77, 11, 1.000, 9, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(78, 12, 0.898, 9, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(79, 8, 0.867, 10, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(80, 10, 1.000, 10, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(81, 11, 0.922, 10, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(82, 12, 1.000, 10, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(83, 8, 0.895, 11, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(84, 10, 0.968, 11, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(85, 11, 1.000, 11, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(86, 12, 0.895, 11, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(87, 8, 0.753, 12, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(88, 10, 0.935, 12, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(89, 11, 0.968, 12, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(90, 12, 1.000, 12, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(91, 8, 1.000, 13, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(92, 10, 0.500, 13, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(93, 11, 0.500, 13, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(94, 12, 0.333, 13, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(95, 15, 0.510, 9, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(96, 15, 0.778, 10, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(97, 15, 0.842, 11, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(98, 15, 0.860, 12, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(99, 15, 1.000, 13, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `div_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `div_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rankings`
--

CREATE TABLE `rankings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kandidat_penilaian` bigint(20) UNSIGNED DEFAULT NULL,
  `nilai_ranking` double(8,3) NOT NULL,
  `id_rekap` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rankings`
--

INSERT INTO `rankings` (`id`, `kandidat_penilaian`, `nilai_ranking`, `id_rekap`, `created_at`, `updated_at`) VALUES
(18, 8, 0.882, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(19, 10, 0.854, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(20, 11, 0.898, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(21, 12, 0.851, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55'),
(22, 15, 0.770, 1, '2023-07-26 19:48:55', '2023-07-26 19:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `rekaps`
--

CREATE TABLE `rekaps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_rekap` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekaps`
--

INSERT INTO `rekaps` (`id`, `nama_rekap`, `created_at`, `updated_at`) VALUES
(1, 'Rekap Bulan Juli', '2023-07-19 14:58:55', '2023-07-19 14:58:55'),
(2, 'Rekap Bulan Agustus', '2023-07-20 15:06:02', '2023-07-20 15:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `scorings`
--

CREATE TABLE `scorings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kandidat_penilaian` bigint(20) UNSIGNED DEFAULT NULL,
  `nilai` int(11) NOT NULL DEFAULT 0,
  `kriteria_penilaian` bigint(20) UNSIGNED DEFAULT NULL,
  `id_rekap` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scorings`
--

INSERT INTO `scorings` (`id`, `kandidat_penilaian`, `nilai`, `kriteria_penilaian`, `id_rekap`, `created_at`, `updated_at`) VALUES
(26, 6, 56, 6, 2, '2023-07-20 15:06:13', '2023-07-20 15:06:35'),
(27, 7, 70, 6, 2, '2023-07-20 15:06:27', '2023-07-20 15:06:41'),
(28, 6, 89, 7, 2, '2023-07-20 15:06:32', '2023-07-20 15:06:35'),
(29, 7, 80, 7, 2, '2023-07-20 15:06:32', '2023-07-20 15:06:41'),
(58, 8, 90, 9, 1, '2023-07-26 19:34:49', '2023-07-26 19:36:23'),
(59, 10, 80, 9, 1, '2023-07-26 19:34:49', '2023-07-26 19:37:47'),
(60, 11, 98, 9, 1, '2023-07-26 19:34:49', '2023-07-26 19:36:55'),
(61, 12, 88, 9, 1, '2023-07-26 19:34:49', '2023-07-26 19:45:48'),
(62, 8, 78, 10, 1, '2023-07-26 19:34:56', '2023-07-26 19:36:23'),
(63, 10, 90, 10, 1, '2023-07-26 19:34:56', '2023-07-26 19:37:47'),
(64, 11, 83, 10, 1, '2023-07-26 19:34:56', '2023-07-26 19:36:55'),
(65, 12, 90, 10, 1, '2023-07-26 19:34:56', '2023-07-26 19:45:48'),
(66, 8, 85, 11, 1, '2023-07-26 19:34:59', '2023-07-26 19:36:23'),
(67, 10, 92, 11, 1, '2023-07-26 19:34:59', '2023-07-26 19:37:47'),
(68, 11, 95, 11, 1, '2023-07-26 19:34:59', '2023-07-26 19:36:55'),
(69, 12, 85, 11, 1, '2023-07-26 19:34:59', '2023-07-26 19:45:48'),
(70, 8, 70, 12, 1, '2023-07-26 19:35:02', '2023-07-26 19:36:23'),
(71, 10, 87, 12, 1, '2023-07-26 19:35:02', '2023-07-26 19:37:47'),
(72, 11, 90, 12, 1, '2023-07-26 19:35:02', '2023-07-26 19:36:55'),
(73, 12, 93, 12, 1, '2023-07-26 19:35:02', '2023-07-26 19:45:48'),
(74, 8, 10, 13, 1, '2023-07-26 19:35:08', '2023-07-26 19:36:23'),
(75, 10, 20, 13, 1, '2023-07-26 19:35:08', '2023-07-26 19:37:47'),
(76, 11, 20, 13, 1, '2023-07-26 19:35:08', '2023-07-26 19:36:55'),
(77, 12, 30, 13, 1, '2023-07-26 19:35:08', '2023-07-26 19:45:48'),
(83, 15, 50, 9, 1, '2023-07-26 19:48:21', '2023-07-26 19:48:49'),
(84, 15, 70, 10, 1, '2023-07-26 19:48:21', '2023-07-26 19:48:49'),
(85, 15, 80, 11, 1, '2023-07-26 19:48:21', '2023-07-26 19:48:49'),
(86, 15, 80, 12, 1, '2023-07-26 19:48:21', '2023-07-26 19:48:49'),
(87, 15, 10, 13, 1, '2023-07-26 19:48:21', '2023-07-26 19:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT 'user',
  `position` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `user_type` tinyint(4) NOT NULL DEFAULT 3,
  `div_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `position`, `status`, `user_type`, `div_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Andreas Prasetya', 'andre@gmail.com', NULL, '$2y$10$iXC0sGIMzgqm4Ehgvx5cSe6FzHDWGmANJEd0uKibmLvmrNMezee8K', NULL, 1, 3, NULL, NULL, '2023-07-19 14:56:11', '2023-07-19 14:56:11'),
(2, 'Krimi Panda', 'krimi@gmail.com', NULL, '$2y$10$FVxoA3/W047rJtSgpSVo.ezEjQhJmrwLEhW6sHOClk.hyFoqLElei', NULL, 1, 3, NULL, NULL, '2023-07-19 14:56:25', '2023-07-19 14:56:25'),
(3, 'Andi', 'andi@gmail.com', NULL, '$2y$10$lyuoHqIpU9YjpVzSiFJlDOVCGX9oxfNv34vxK8yRNS2X/H55tXhMm', NULL, 1, 3, NULL, NULL, '2023-07-19 14:56:36', '2023-07-19 14:56:36'),
(4, 'Vincenzo', 'cassano@gmail.com', NULL, '$2y$10$oLowSRcGsB4aDaqQFmxfE.UaJ9RL0UMpHODcufbOv/tyRz6Ricf3O', NULL, 1, 3, NULL, NULL, '2023-07-19 14:56:54', '2023-07-19 14:56:54'),
(7, 'Doni', 'doni@gmail.com', NULL, '$2y$10$MOET1tUnXAmC0Zp.V7gkSOtzmqvIm2p2iAIcbv615Tk4CRe9UnRQW', '2', 1, 3, NULL, NULL, '2023-07-26 19:40:37', '2023-07-26 19:40:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kandidat_penilaians`
--
ALTER TABLE `kandidat_penilaians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria_penilaians`
--
ALTER TABLE `kriteria_penilaians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logbooks`
--
ALTER TABLE `logbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `normalisasis`
--
ALTER TABLE `normalisasis`
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
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rankings`
--
ALTER TABLE `rankings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekaps`
--
ALTER TABLE `rekaps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scorings`
--
ALTER TABLE `scorings`
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
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kandidat_penilaians`
--
ALTER TABLE `kandidat_penilaians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kriteria_penilaians`
--
ALTER TABLE `kriteria_penilaians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `logbooks`
--
ALTER TABLE `logbooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `normalisasis`
--
ALTER TABLE `normalisasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rankings`
--
ALTER TABLE `rankings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `rekaps`
--
ALTER TABLE `rekaps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `scorings`
--
ALTER TABLE `scorings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
