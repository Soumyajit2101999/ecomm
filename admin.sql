-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 02:50 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `admin_email` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, '2021_09_22_081436_create_user_table', 1),
(6, '2021_09_22_093313_create_destination_table', 1),
(7, '2021_09_22_093522_create_booking_table', 2),
(8, '2021_09_22_094343_create_admins_table', 2),
(9, '2021_09_22_094544_create_package_table', 2),
(10, '2021_09_22_095351_create_contact_table', 2),
(11, '2021_09_22_095654_create_tour_category_table', 2),
(12, '2021_09_22_095822_create_package_details_table', 2),
(13, '2021_09_22_101603_create_review_table', 2),
(14, '2014_10_12_200000_add_two_factor_columns_to_users_table', 3),
(15, '2021_09_22_115050_create_sessions_table', 3),
(16, '2021_09_25_104837_create_slider_table', 4),
(17, '2021_09_25_112907_create_testimonials_table', 5),
(18, '2021_09_25_123553_create_partners_table', 6),
(19, '2021_09_27_151018_create_coupon_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('soumyajitdas2101999@gmail.com', '$2y$10$Z1gSmmDouyxeuy2PMMmrqu204f2bpoFNlTM/GYb.Hf.rBihsr0U7O', '2021-10-06 07:13:50');

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Fg53lCnUDW4q2dP9xVnWUwkUk7BH4gcJ8QXRkzpV', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiQUVjRUV2WUhUTzd2TE9jWUlIWWN3TEtWZEx2UGV4OXFzNlEyTzVlNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFY5ZlZrd1ZmNDh4ZDMydjdlQ25NNU9yelZmVDA1WC40NVNuc21jNHZQY0FhYi5UL3l0bFhPIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRWOWZWa3dWZjQ4eGQzMnY3ZUNuTTVPcnpWZlQwNVguNDVTbnNtYzR2UGNBYWIuVC95dGxYTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrZW5kL2Jvb2tpbmdfZGV0YWlsLzciO31zOjU6InJhbmdlIjtpOjUwO3M6NDoiZGF0ZSI7YTo4OntpOjA7czoxMDoiMjAyMS0wOS0yNyI7aToxO3M6MTA6IjIwMjEtMDktMjgiO2k6MjtzOjEwOiIyMDIxLTA5LTI5IjtpOjM7czoxMDoiMjAyMS0wOS0zMCI7aTo0O3M6MTA6IjIwMjEtMTAtMDEiO2k6NTtzOjEwOiIyMDIxLTEwLTAyIjtpOjY7czoxMDoiMjAyMS0xMC0wMyI7aTo3O3M6MTA6IjIwMjEtMTAtMDQiO31zOjQ6ImRhdGEiO2E6ODp7aTowO2k6MDtpOjE7aToxO2k6MjtpOjA7aTozO2k6MDtpOjQ7aTowO2k6NTtpOjM7aTo2O2k6NDtpOjc7aTowO319', 1633328325),
('HSndApOI7PRnWYWP2r8TmSSeW34jBbhyfijbs7ct', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiSzVjenc3S0xBbEg3RmFCTncyR0hwOUMwR1RvS2txRkliRmlPbGJXUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1633410089),
('jhtzVZgnyyrk3o4ATDBcpztjytltLQNXSajR6tlf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibU9uWnF4SkpVRG1rWVdUVmlxOWpzUE5PMVVza2k4MjFzdTBJUmE3USI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrZW5kL2ZvcmdvdC1wYXNzd29yZCI7fX0=', 1633524240),
('k70vzxLFii18q91BeoGL4ny9agiVlDPPaIqPEnxR', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiRTdxaFdnZW41R3BURDdnMU1mV2FMYnpBVjdtaTFsWkx0ZlRlZkYyMyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFY5ZlZrd1ZmNDh4ZDMydjdlQ25NNU9yelZmVDA1WC40NVNuc21jNHZQY0FhYi5UL3l0bFhPIjtzOjU6InJhbmdlIjtpOjUwO3M6NDoiZGF0ZSI7YTo4OntpOjA7czoxMDoiMjAyMS0wOS0yNyI7aToxO3M6MTA6IjIwMjEtMDktMjgiO2k6MjtzOjEwOiIyMDIxLTA5LTI5IjtpOjM7czoxMDoiMjAyMS0wOS0zMCI7aTo0O3M6MTA6IjIwMjEtMTAtMDEiO2k6NTtzOjEwOiIyMDIxLTEwLTAyIjtpOjY7czoxMDoiMjAyMS0xMC0wMyI7aTo3O3M6MTA6IjIwMjEtMTAtMDQiO31zOjQ6ImRhdGEiO2E6ODp7aTowO2k6MDtpOjE7aToxO2k6MjtpOjA7aTozO2k6MDtpOjQ7aTowO2k6NTtpOjM7aTo2O2k6NDtpOjc7aTowO31zOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRWOWZWa3dWZjQ4eGQzMnY3ZUNuTTVPcnpWZlQwNVguNDVTbnNtYzR2UGNBYWIuVC95dGxYTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO319', 1633347801),
('odAVJgMM8ByZjQhnqwKTEEWcL6EbxM7TsTMFK1o6', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNUc5REJwN2ZHSVRjZ1ZxbXEzU01UTWF5ejlDQW41OGtHQWhPQ3dQRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkanp4WU9nZlhHeGNSc2NCeGJZbjVxZXh2cHJJU3ZzVU9aNE1oYTNEMFZWbWVpa1JjQm54a0siO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGp6eFlPZ2ZYR3hjUnNjQnhiWW41cWV4dnBySVN2c1VPWjRNaGEzRDBWVm1laWtSY0JueGtLIjt9', 1633524354),
('oYchQlxihpJX93s1nZ3HCRpHeSmx7YiNuvQBAjwO', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiRW1FcEFheXdGTG9NNk5hN0JSR1VJRDZvc01JeVlBb25TMHZ0alpUWCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFY5ZlZrd1ZmNDh4ZDMydjdlQ25NNU9yelZmVDA1WC40NVNuc21jNHZQY0FhYi5UL3l0bFhPIjtzOjQ6ImRhdGUiO2E6ODp7aTowO3M6MTA6IjIwMjEtMDktMjYiO2k6MTtzOjEwOiIyMDIxLTA5LTI3IjtpOjI7czoxMDoiMjAyMS0wOS0yOCI7aTozO3M6MTA6IjIwMjEtMDktMjkiO2k6NDtzOjEwOiIyMDIxLTA5LTMwIjtpOjU7czoxMDoiMjAyMS0xMC0wMSI7aTo2O3M6MTA6IjIwMjEtMTAtMDIiO2k6NztzOjEwOiIyMDIxLTEwLTAzIjt9czo0OiJkYXRhIjthOjg6e2k6MDtpOjA7aToxO2k6MDtpOjI7aToxO2k6MztpOjA7aTo0O2k6MDtpOjU7aTowO2k6NjtpOjM7aTo3O2k6NDt9czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkVjlmVmt3VmY0OHhkMzJ2N2VDbk01T3J6VmZUMDVYLjQ1U25zbWM0dlBjQWFiLlQveXRsWE8iO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo1OiJyYW5nZSI7aToxMDt9', 1633250512);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Soumyajit', 'soumyajitdas2101999@gmail.com', 'rfaerar', NULL, NULL);

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Soumyajit Das', 'soumyajitdas2101999@gmail.com', NULL, '$2y$10$jzxYOgfXGxcRscBxbYn5qexvprISvsUOZ4Mha3D0VVmeikRcBnxkK', NULL, NULL, 'NDcDUPNR017oDNLrQbdUm0n5bMZFfVym1mio6dVvfUC6ZJPH6bboDNvXXDVK', '2021-09-22 06:32:02', '2021-09-23 02:14:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
