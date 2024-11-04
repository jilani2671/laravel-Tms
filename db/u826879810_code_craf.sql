-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2024 at 09:51 AM
-- Server version: 10.11.9-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u826879810_code_craf`
--

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `installment1` decimal(8,2) DEFAULT NULL,
  `installment2` decimal(8,2) DEFAULT NULL,
  `total_fees` decimal(8,2) NOT NULL DEFAULT 0.00,
  `remaining_fees` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`id`, `full_name`, `email`, `phone_number`, `course`, `installment1`, `installment2`, `total_fees`, `remaining_fees`, `created_at`, `updated_at`) VALUES
(6, 'Ajit Babar', 'ajit@gmail.com', '9356950795', 'Java', '5000.00', '5000.00', '10000.00', NULL, '2024-08-31 08:18:56', '2024-09-10 04:57:38'),
(7, 'Yash Deshmukh', 'yash@gmail.com', '9325744223', 'Java', '5000.00', NULL, '10000.00', NULL, '2024-08-31 08:19:04', '2024-08-31 08:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `bawork`
--

CREATE TABLE `bawork` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `tech` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `dev_team` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `business_analyst_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bawork`
--

INSERT INTO `bawork` (`id`, `project_name`, `tech`, `status`, `dev_team`, `start_date`, `end_date`, `business_analyst_name`, `created_at`, `updated_at`) VALUES
(2, 'Durga cafe', 'Front end - HTML,CSS, Bootstrap.', 'completed', 'Jilani, Bhagyashree mam.', '2024-08-28', '2024-08-30', 'Neha Thombare', '2024-08-29 16:10:54', '2024-09-04 09:54:24'),
(3, 'Emrich Ladies Saloon Academy', 'UI', 'completed', 'Prashant', '2024-09-03', '2024-09-07', 'Neha Thombare', '2024-09-04 09:53:10', '2024-09-13 07:34:19'),
(4, 'Shreva\'s Pralor and Institute', 'UI', 'completed', 'Prashant', '2024-09-04', '2024-09-14', 'Neha Thombare', '2024-09-04 09:58:00', '2024-09-06 05:18:09'),
(5, 'Mahalakshmi Sandwich', 'Angular', 'completed', 'Abrar,Aishwarya,Shramik,Shubham sir', '2024-08-21', '2024-09-07', 'Neha Thombare', '2024-09-04 10:03:08', '2024-09-13 07:35:52'),
(6, 'Learning Institute Pune', 'HTML/CSS,Bootstrap,Javascript.', 'completed', 'Bhagyashree Mam', '2024-07-15', '2024-08-15', 'Neha Thombare', '2024-09-04 10:06:40', '2024-09-04 11:12:15'),
(9, 'Mahalakshmi Handmades', 'Yet to confirm', 'upcoming', 'Not Fixed', '2024-09-15', '2024-10-15', 'Neha Thombare', '2024-09-05 06:30:04', '2024-09-05 06:30:04'),
(10, 'Seventh Sense', 'WordPress', 'completed', 'Shifa', '2024-08-21', '2024-09-15', 'gita', '2024-09-10 05:57:39', '2024-10-01 06:52:55'),
(11, 'Harmoony Design Studio', 'HTML,CSS ,Bootstrap', 'completed', 'Vaishnavi Mam', '2024-07-18', '2024-09-16', 'gita', '2024-09-10 06:01:10', '2024-10-01 06:52:39'),
(12, 'Payroll System', 'Python(Desktop Application)', 'ongoing', 'Shubham Sir', '2024-08-07', '2024-09-15', 'gita', '2024-09-10 06:04:52', '2024-09-10 06:04:52'),
(13, 'Aura Skin Clinic', 'HTML,CSS ,Js and Bootstrap', 'ongoing', 'Vaishnavi Mam and Bhagyashri Mam', '2024-09-26', '2024-10-03', 'gita', '2024-10-01 06:57:39', '2024-10-01 06:57:39'),
(14, 'Impladent', 'Not Fix', 'upcoming', 'Not Fix', NULL, NULL, 'gita', '2024-10-01 07:01:31', '2024-10-01 07:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(7, 'Charles S.', 'pat@aneesho.com', '8102440753', 'Do you need help with graphic design - brochures, banners, flyers, advertisements, social media posts, logos etc.?\r\n\r\nWe charge a low fixed monthly fee. Let me know if you\'re interested and would like to see our portfolio.', '2024-09-23 09:11:39', '2024-09-23 09:11:39'),
(9, 'Stuart J.', 'pat@aneesho.com', '3128780396', 'Do you need help with graphic design - brochures, banners, flyers, advertisements, social media posts, logos etc.?\r\n\r\nWe charge a low fixed monthly fee. Let me know if you\'re interested and would like to see our portfolio.', '2024-09-30 13:33:26', '2024-09-30 13:33:26');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE `login_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'Jilani javed pathan', 'pjilani4566@gmail.com', 'jilani@123', '2024-07-28 04:47:20', '2024-07-30 07:24:56'),
(9, 'manorama', 'codecrafterservices@gmail.com', 'varad@123', '2024-07-30 02:00:19', '2024-07-30 02:00:19');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_07_02_075907_create_table_name', 1),
(5, '2024_07_02_080103_registration', 1),
(6, '2024_07_04_093058_create_admissions_table', 2),
(7, '2024_07_08_053411_create_admissions_table', 3),
(8, '2024_07_09_101739_admissions', 4),
(9, '2024_07_09_103240_admissions', 5),
(10, '2024_07_18_071630_create_user_regis_table', 6),
(11, '2024_07_23_051709_create_bawork_table', 7),
(12, '2024_07_27_143620_create_admin_logins_table', 8),
(13, '2024_07_30_060206_create_enquiries_table', 9),
(14, '2024_07_30_060834_create_enquiry_table', 10);

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
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `course` varchar(255) DEFAULT NULL,
  `enquiries` text DEFAULT NULL,
  `agree_terms` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `full_name`, `email`, `phone_number`, `date_of_birth`, `course`, `enquiries`, `agree_terms`, `created_at`, `updated_at`) VALUES
(9, 'Jilani Pathan', 'pjilani@gmail.com', '07620144566', '2024-09-03', 'Aws', 'welcome', 1, '2024-09-03 07:14:49', '2024-09-03 07:14:49'),
(10, 'Nadim Devale', 'devalenadim@gmail.com', '08421844224', '2002-03-23', 'Java', NULL, 1, '2024-09-09 09:33:05', '2024-09-09 09:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4W9Rf4WRWB0xrgs6obiz1Gg6mxV56Jah1LoE0iR6', NULL, '103.93.98.190', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieVBDWEh1cHdONTJ4YVlxRzQ4aVZRMEdpeUR5aGE4bWdWQjVlTXpZdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vY29kZS1jcmFmdGVyLmluIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1728546413),
('9CSUqpujWjxXhpjfIbY80mDqgZEgVdQtK8PM6RKT', NULL, '142.93.152.200', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVXlkU1llUmlkUXpQZ3haZTBXOXpzYmp2b2Z3Q2c0YVBNUmZBTmhqVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LmNvZGUtY3JhZnRlci5pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1728505550),
('JmP7BGMByjY2BKTwfc0hHwc5dVYUJhBWu8jhtLhi', NULL, '2401:4900:1b89:843b:9891:5a6c:39e0:df17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDlUMUpXSHBPSGlqNmh3TG1QdDFmVHV1MTBJUmlqVkRld2pSdWJSeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vY29kZS1jcmFmdGVyLmluL2FkbWlubG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1728480192),
('pVvIDywM1AI5qcBIlU0CHGMMhEuXhwd9wiAYZt7a', NULL, '207.154.210.59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid1hsVnljSFpXbHkwMThLRWJGZk0wQkVDdks1OWdUS29mcmVvbzBCQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vY29kZS1jcmFmdGVyLmluIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1728525776),
('x0UHlzqMsO5KwP7PdDqgP70m5NwbN55TDzNpIs0v', NULL, '66.249.68.66', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.6668.89 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVBxeFh5S2FSSm10TDg1QVhxampvc0x4WkJhSG9aQnFzSjZjTVhjbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHBzOi8vY29kZS1jcmFmdGVyLmluIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1728495024),
('ZgyCEmge0v1PcfN8d3QYZYVgSlqkOE3U8umH53Ym', NULL, '2a02:4780:11:c0de::21', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoidVhGQjBTbkYyMFZlZ3J2WnZiRG1IMmZhbVB5WGd3SmdhZXJpbVdpdyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1728499044);

-- --------------------------------------------------------

--
-- Table structure for table `user_regis`
--

CREATE TABLE `user_regis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_regis`
--

INSERT INTO `user_regis` (`id`, `name`, `email`, `phone_no`, `password`, `created_at`, `updated_at`) VALUES
(9, 'Neha Thombare', 'df.vpn.23@gmail.com', '7757880896', '$2y$12$92PmsYOYPQtXtcrmShoWzefO7nZc6JnRdEviaCOaSoX8Ks9lU.fPi', '2024-07-30 02:09:49', '2024-07-30 02:09:49'),
(10, 'jilani', 'pjilani4566@gmail.com', '7620144566', '$2y$12$NEKkGBZ2IWUK8oN/6ibAcuXR1Pk6cmn5v.KEZ3m67S7AVYWivPb7m', '2024-07-30 02:24:42', '2024-07-30 02:24:42'),
(18, 'gita', 'gitanjalinaidu1907@gmail.com', '8459719385', '$2y$12$wHnsILX8Y2D4Qpsvf.0Cce81Pownfy0OtXVAUDe/EiUV1Rzwdm2V.', '2024-09-10 04:52:22', '2024-09-10 04:52:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bawork`
--
ALTER TABLE `bawork`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registrations_email_unique` (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `user_regis`
--
ALTER TABLE `user_regis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_regis_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bawork`
--
ALTER TABLE `bawork`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_regis`
--
ALTER TABLE `user_regis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
