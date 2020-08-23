-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2020 at 10:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bantuandesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `bantuans`
--

CREATE TABLE `bantuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `penduduk_id` bigint(20) UNSIGNED NOT NULL,
  `jenisbantuan_id` bigint(20) UNSIGNED NOT NULL,
  `profil` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kk` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bantuans`
--

CREATE TABLE `jenis_bantuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_bantuan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bentuk_bantuan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int(10) UNSIGNED NOT NULL,
  `kuota_tetap` int(11) NOT NULL,
  `kuota` int(11) NOT NULL,
  `tempat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_penyuluhan` datetime NOT NULL,
  `sasaran_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kuotas`
--

CREATE TABLE `kuotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenisbantuan_id` bigint(20) UNSIGNED NOT NULL,
  `tersampaikan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuotas`
--

INSERT INTO `kuotas` (`id`, `jenisbantuan_id`, `tersampaikan`, `created_at`, `updated_at`) VALUES
(1, 7, 23, '2020-07-15 08:05:40', '2020-07-15 08:15:17');

-- --------------------------------------------------------

--
-- Table structure for table `lampirans`
--

CREATE TABLE `lampirans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenisbantuan_id` bigint(20) UNSIGNED NOT NULL,
  `foto1` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto2` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto3` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto4` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto5` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_11_191254_create_penduduks_table', 1),
(5, '2014_10_12_000000_create_users_table', 5),
(7, '2020_07_13_062637_create_jenis_bantuans_table', 7),
(8, '2020_07_13_061628_create_bantuans_table', 4),
(10, '2020_07_13_105447_create_penyuluhans_table', 6),
(11, '2020_07_14_120434_create_sasarans_table', 8),
(14, '2020_07_15_143756_create_kuotas_table', 9),
(16, '2020_07_26_085813_create_lampirans_table', 10),
(17, '2020_07_29_052207_create_pekerjaans_table', 11);

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
-- Table structure for table `pekerjaans`
--

CREATE TABLE `pekerjaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pekerjaan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pekerjaans`
--

INSERT INTO `pekerjaans` (`id`, `pekerjaan`, `penghasilan`, `created_at`, `updated_at`) VALUES
(1, 'kuli sejati', 80000, '2020-07-28 22:35:35', '2020-08-15 09:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `penduduks`
--

CREATE TABLE `penduduks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kk` bigint(20) DEFAULT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_keluarga` int(11) DEFAULT NULL,
  `pekerjaan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penduduks`
--

INSERT INTO `penduduks` (`id`, `nik`, `nama`, `alamat`, `kk`, `no_hp`, `jenis_kelamin`, `pendidikan`, `jumlah_keluarga`, `pekerjaan_id`, `created_at`, `updated_at`) VALUES
(6, 12345678, 'admin', 'bandung', 87654321, '089666288087', 'L', 'S1', 1, 1, NULL, NULL),
(8, 12345, 'jaenudin', 'Bandung', 8764321, '01237654', 'L', 'S1', 5, 1, '2020-07-28 23:03:53', '2020-07-28 23:03:53'),
(11, 12, 'wqe', 'weq', 12, '1231231', 'L', '12', 123, 1, '2020-08-17 04:49:48', '2020-08-17 04:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `penyuluhans`
--

CREATE TABLE `penyuluhans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bantuan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `jenisbantuan_id` bigint(20) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sasarans`
--

CREATE TABLE `sasarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pekerjaan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penduduk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `penduduk_id`, `nik`, `name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 6, '12345678', 'admin', '$2y$12$jNSxt5dNJkEcbBdoZytiRe8DyGvzigJ5aI3dMxjAV9ed1wlRM64ty', NULL, NULL, NULL),
(11, 8, '12345', 'jaenudin', '$2y$10$yszCKvhx1jP9JhEWKaMazOJrdiLETG/Keyj7dJb7OA577O4IU.of2', NULL, '2020-07-28 23:04:18', '2020-08-15 11:25:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bantuans`
--
ALTER TABLE `bantuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bantuans_user_id_foreign` (`user_id`),
  ADD KEY `bantuans_penduduk_id_foreign` (`penduduk_id`),
  ADD KEY `bantuans_jenisbantuan_id_foreign` (`jenisbantuan_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_bantuans`
--
ALTER TABLE `jenis_bantuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sasaran_id` (`sasaran_id`);

--
-- Indexes for table `kuotas`
--
ALTER TABLE `kuotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kuotas_jenisbantuan_id_foreign` (`jenisbantuan_id`);

--
-- Indexes for table `lampirans`
--
ALTER TABLE `lampirans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lampirans_jenisbantuan_id_foreign` (`jenisbantuan_id`);

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
-- Indexes for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduks`
--
ALTER TABLE `penduduks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penduduks_nik_unique` (`nik`),
  ADD KEY `pekerjaan_id` (`pekerjaan_id`);

--
-- Indexes for table `penyuluhans`
--
ALTER TABLE `penyuluhans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penyuluhans_bantuan_id_foreign` (`bantuan_id`);

--
-- Indexes for table `sasarans`
--
ALTER TABLE `sasarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sasarans_ibfk_1` (`pekerjaan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_penduduk_id_index` (`penduduk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bantuans`
--
ALTER TABLE `bantuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_bantuans`
--
ALTER TABLE `jenis_bantuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kuotas`
--
ALTER TABLE `kuotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lampirans`
--
ALTER TABLE `lampirans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penduduks`
--
ALTER TABLE `penduduks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penyuluhans`
--
ALTER TABLE `penyuluhans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sasarans`
--
ALTER TABLE `sasarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bantuans`
--
ALTER TABLE `bantuans`
  ADD CONSTRAINT `bantuans_jenisbantuan_id_foreign` FOREIGN KEY (`jenisbantuan_id`) REFERENCES `jenis_bantuans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bantuans_penduduk_id_foreign` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bantuans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jenis_bantuans`
--
ALTER TABLE `jenis_bantuans`
  ADD CONSTRAINT `jenis_bantuans_ibfk_1` FOREIGN KEY (`sasaran_id`) REFERENCES `sasarans` (`id`);

--
-- Constraints for table `lampirans`
--
ALTER TABLE `lampirans`
  ADD CONSTRAINT `lampirans_jenisbantuan_id_foreign` FOREIGN KEY (`jenisbantuan_id`) REFERENCES `jenis_bantuans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penduduks`
--
ALTER TABLE `penduduks`
  ADD CONSTRAINT `penduduks_ibfk_1` FOREIGN KEY (`pekerjaan_id`) REFERENCES `pekerjaans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penyuluhans`
--
ALTER TABLE `penyuluhans`
  ADD CONSTRAINT `penyuluhans_bantuan_id_foreign` FOREIGN KEY (`bantuan_id`) REFERENCES `bantuans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sasarans`
--
ALTER TABLE `sasarans`
  ADD CONSTRAINT `sasarans_ibfk_1` FOREIGN KEY (`pekerjaan_id`) REFERENCES `pekerjaans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_penduduk_id_foreign` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
