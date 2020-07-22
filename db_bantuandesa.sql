-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 03:04 PM
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
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bantuans`
--

INSERT INTO `bantuans` (`id`, `user_id`, `penduduk_id`, `jenisbantuan_id`, `status`, `created_at`, `updated_at`) VALUES
(5, 4, 3, 7, 'Diterima', '2020-07-14 06:53:48', '2020-07-14 07:01:52'),
(6, 4, 3, 7, 'Diterima', '2020-07-14 07:21:38', '2020-07-14 07:22:09'),
(7, 5, 4, 7, NULL, '2020-07-15 08:19:24', '2020-07-15 08:19:24'),
(8, 4, 3, 7, NULL, '2020-07-15 11:00:12', '2020-07-15 11:00:12'),
(9, 5, 4, 7, 'Diterima', '2020-07-17 06:50:51', '2020-07-17 06:51:37'),
(10, 4, 3, 7, NULL, '2020-07-18 06:25:37', '2020-07-18 06:25:37'),
(11, 4, 3, 7, NULL, '2020-07-20 05:52:02', '2020-07-20 05:52:02');

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
  `kuota` int(11) NOT NULL,
  `sasaran_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_bantuans`
--

INSERT INTO `jenis_bantuans` (`id`, `nama`, `asal_bantuan`, `bentuk_bantuan`, `nominal`, `kuota`, `sasaran_id`, `created_at`, `updated_at`) VALUES
(7, 'Bantuan Langsung Tunai Petani', 'Pemerintah', 'Uang', 10000, 20, 1, '2020-07-14 06:36:31', '2020-07-14 06:36:31');

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
(14, '2020_07_15_143756_create_kuotas_table', 9);

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
-- Table structure for table `penduduks`
--

CREATE TABLE `penduduks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kk` int(11) DEFAULT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan` int(11) DEFAULT NULL,
  `pendidikan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_keluarga` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penduduks`
--

INSERT INTO `penduduks` (`id`, `nik`, `nama`, `alamat`, `pekerjaan`, `kk`, `no_hp`, `jenis_kelamin`, `penghasilan`, `pendidikan`, `jumlah_keluarga`, `created_at`, `updated_at`) VALUES
(1, 233124, 'admin', 'Bandung', 'kuli', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-12 21:47:08'),
(3, 3291384, 'Fauzi', 'Bandung', 'Programmer', 12841235, '089777222333', 'L', 500000, 'S1', 5, '2020-07-13 02:11:10', '2020-07-13 02:11:10'),
(4, 5124123, 'yayang', 'bandung', 'manager', 12512412, '08912345678', 'L', 10000000, 'S3', 10, '2020-07-13 04:25:21', '2020-07-13 04:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `penyuluhans`
--

CREATE TABLE `penyuluhans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bantuan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tanggal_penyuluhan` date NOT NULL DEFAULT current_timestamp(),
  `tempat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyuluhans`
--

INSERT INTO `penyuluhans` (`id`, `bantuan_id`, `user_id`, `tanggal_penyuluhan`, `tempat`, `status`, `created_at`, `updated_at`) VALUES
(10, 5, 4, '2020-07-08', 'asd', 'Sudah Dilaksanakan', '2020-07-17 07:31:31', '2020-07-17 07:31:31'),
(12, 6, 4, '2020-07-10', 'rt', 'Tidak Dilaksanakan', '2020-07-19 11:37:59', '2020-07-19 11:37:59'),
(13, 9, 5, '2020-07-02', 'fda', 'Sudah Dilaksanakan', '2020-07-20 19:42:06', '2020-07-20 19:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `sasarans`
--

CREATE TABLE `sasarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sasaran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kriteria` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sasarans`
--

INSERT INTO `sasarans` (`id`, `sasaran`, `kriteria`, `created_at`, `updated_at`) VALUES
(1, 'Petani', '10.000 - 100.000', NULL, '2020-07-14 06:24:06'),
(2, 'Buruh', '8.000 - 80.000', '2020-07-14 06:18:14', '2020-07-14 06:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penduduk_id` bigint(20) UNSIGNED DEFAULT NULL,
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

INSERT INTO `users` (`id`, `penduduk_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin123@gmail.com', NULL, '$2y$10$HI0LCy/HcgYpOdMo00TktOG2B4sV475obJr67852K3kNHPn6p7Ca6', NULL, '2020-07-12 20:22:00', '2020-07-12 20:22:00'),
(4, 3, 'fauzi', 'fauzi@gmail.com', NULL, '$2y$10$zdRQFqYgoVRKg2TjQnuJFe.DcFU3BZhgrKyIOK11noBrhW5YTvn7G', NULL, '2020-07-13 02:11:47', '2020-07-13 02:11:47'),
(5, 4, 'yayang', 'yayang@gmail.com', NULL, '$2y$10$oeruh3a4bU6v0NVR8qyt7Oo0EGG0vSJWuLH/iwWGiG/H17.7LQKFi', NULL, '2020-07-13 04:25:49', '2020-07-13 04:25:49');

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
  ADD KEY `sasaran_id_foreign_key` (`sasaran_id`);

--
-- Indexes for table `kuotas`
--
ALTER TABLE `kuotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kuotas_jenisbantuan_id_foreign` (`jenisbantuan_id`);

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
-- Indexes for table `penduduks`
--
ALTER TABLE `penduduks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penduduks_nik_unique` (`nik`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_penduduk_id_index` (`penduduk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bantuans`
--
ALTER TABLE `bantuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_bantuans`
--
ALTER TABLE `jenis_bantuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kuotas`
--
ALTER TABLE `kuotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `penduduks`
--
ALTER TABLE `penduduks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penyuluhans`
--
ALTER TABLE `penyuluhans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sasarans`
--
ALTER TABLE `sasarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `kuotas`
--
ALTER TABLE `kuotas`
  ADD CONSTRAINT `kuotas_jenisbantuan_id_foreign` FOREIGN KEY (`jenisbantuan_id`) REFERENCES `jenis_bantuans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penyuluhans`
--
ALTER TABLE `penyuluhans`
  ADD CONSTRAINT `penyuluhans_bantuan_id_foreign` FOREIGN KEY (`bantuan_id`) REFERENCES `bantuans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_penduduk_id_foreign` FOREIGN KEY (`penduduk_id`) REFERENCES `penduduks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
