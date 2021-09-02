-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 06:35 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `a_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_telpn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `a_name`, `a_address`, `a_telpn`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Dahlia Stokes', '3525 Bonnie Manor Suite 572East Johnpaul, MS 28206', '082131', '2021-09-01 20:00:45', '2021-09-01 20:14:55'),
(2, 'Sheila Schuster', '239 Sanford TurnpikeWest Armani, NM 76873', '09131', '2021-09-01 20:00:45', '2021-09-01 20:14:48'),
(3, 'Adah O\'Reilly', '887 Bins Wall Suite 116Cummingschester, WY 38933', '0821313', '2021-09-01 20:00:45', '2021-09-01 20:14:41'),
(4, 'Ulises Howe', '48512 Johnston TrafficwayWebsterside, MS 43625-1744', '123131', '2021-09-01 20:00:45', '2021-09-01 20:14:33'),
(5, 'Deshawn Cummerata', '37912 Pacocha Row Apt. 328Estevanstad, WA 18195', '12311', '2021-09-01 20:00:45', '2021-09-01 20:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `b_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_date_procurement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `writer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `user_id`, `b_title`, `b_year`, `b_qty`, `b_date_procurement`, `b_image`, `author_id`, `writer_id`, `created_at`, `updated_at`) VALUES
(2, 1, 'Buku Baheula 12', '2019', '16', '2020-12-31', '1630553503.jpg', 1, 2, '2021-09-01 20:31:43', '2021-09-01 20:32:03');

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
(4, '2021_09_02_025941_create_authors_table', 2),
(5, '2021_09_02_030100_create_writers_table', 3),
(6, '2021_09_02_030130_create_racks_table', 3),
(7, '2021_09_02_030202_create_books_table', 3),
(8, '2021_09_02_030302_create_registration_books_table', 3);

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
-- Table structure for table `racks`
--

CREATE TABLE `racks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `r_kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `racks`
--

INSERT INTO `racks` (`id`, `r_kode`, `r_location`, `created_at`, `updated_at`) VALUES
(5, 'RK0001', 'Belakang meja', '2021-09-01 21:25:40', '2021-09-01 21:25:40'),
(7, 'RK0002', 'Belakang meja timur 1', '2021-09-01 21:26:33', '2021-09-01 21:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `registration_books`
--

CREATE TABLE `registration_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `r_kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `rack_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2021-09-01 19:59:34', '$2y$10$L9FS1WvIgQGbzAvgT4QFgezJZF/4ecYxqwJStxw5qTaQuvs77X3vq', NULL, 'admin', '2021-09-01 19:59:34', NULL),
(2, 'User', 'asyarif644@gmail.com', '2021-09-01 19:59:34', '$2y$10$hWQqYWIwkrPQGoqBWpd61ux/rLvBaaPRxaQx8BQ4S.hlYhpY7fstC', NULL, 'user', '2021-09-01 19:59:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `writers`
--

CREATE TABLE `writers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `w_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `w_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `w_telpn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `writers`
--

INSERT INTO `writers` (`id`, `w_name`, `w_address`, `w_telpn`, `created_at`, `updated_at`) VALUES
(1, 'Rebecca Corkery', '283 Muller Mission Apt. 725North Marcia, MN 25300-9184', '08213113', '2021-09-01 20:04:18', '2021-09-01 20:17:52'),
(2, 'Miss Taya Kiehn', '8605 Hegmann Unions Suite 713Boscoport, NM 05230', '08213112', '2021-09-01 20:04:18', '2021-09-01 20:17:45'),
(3, 'Prof. Marty Huels MD', '23009 Doyle Courts Suite 308Loraineshire, OH 18882-1480', '082131', '2021-09-01 20:04:18', '2021-09-01 20:17:40'),
(4, 'Marlene Goyette', '34028 Edison Ford Apt. 431East Desireechester, VA 50589', '082131', '2021-09-01 20:04:18', '2021-09-01 20:17:34'),
(5, 'Agnes Marks', '63335 D\'Amore Garden Suite 312Roobside, NM 37610', '082131', '2021-09-01 20:04:18', '2021-09-01 20:17:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_b_title_unique` (`b_title`),
  ADD KEY `books_user_id_foreign` (`user_id`),
  ADD KEY `books_author_id_foreign` (`author_id`),
  ADD KEY `books_writer_id_foreign` (`writer_id`);

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
-- Indexes for table `racks`
--
ALTER TABLE `racks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `racks_r_kode_unique` (`r_kode`);

--
-- Indexes for table `registration_books`
--
ALTER TABLE `registration_books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registration_books_r_kode_unique` (`r_kode`),
  ADD KEY `registration_books_user_id_foreign` (`user_id`),
  ADD KEY `registration_books_book_id_foreign` (`book_id`),
  ADD KEY `registration_books_rack_id_foreign` (`rack_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `racks`
--
ALTER TABLE `racks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registration_books`
--
ALTER TABLE `registration_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `writers`
--
ALTER TABLE `writers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_writer_id_foreign` FOREIGN KEY (`writer_id`) REFERENCES `writers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `registration_books`
--
ALTER TABLE `registration_books`
  ADD CONSTRAINT `registration_books_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registration_books_rack_id_foreign` FOREIGN KEY (`rack_id`) REFERENCES `racks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registration_books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
