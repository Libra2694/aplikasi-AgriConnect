-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2025 at 03:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tani_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `asuransi_pertanians`
--

CREATE TABLE `asuransi_pertanians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanaman_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_asuransi` varchar(255) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `status` enum('Menunggu','Diterima','Ditolak') NOT NULL DEFAULT 'Menunggu',
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asuransi_pertanians`
--

INSERT INTO `asuransi_pertanians` (`id`, `user_id`, `tanaman_id`, `jenis_asuransi`, `tanggal_daftar`, `status`, `catatan`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'Asuransi Tani Makmur', '2025-08-05', 'Menunggu', 'asdawd', '2025-08-05 01:08:28', '2025-08-05 01:08:28'),
(3, 1, 1, 'Asuransi Tani Makmur Jaya', '2025-08-05', 'Diterima', 'dasdasd', '2025-08-05 02:09:04', '2025-08-05 02:15:29');

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
-- Table structure for table `harga_pasars`
--

CREATE TABLE `harga_pasars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `komoditas` varchar(255) NOT NULL,
  `wilayah` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `harga_pasars`
--

INSERT INTO `harga_pasars` (`id`, `komoditas`, `wilayah`, `satuan`, `harga`, `tanggal`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Beras Super', 'Jambi', 'Kg', 15000, '2025-08-05', 'Harga Turun', '2025-08-04 19:20:14', '2025-08-04 19:20:14');

-- --------------------------------------------------------

--
-- Table structure for table `informasi_petanis`
--

CREATE TABLE `informasi_petanis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` enum('Hama','Penyakit','Tips','Cuaca','Lainnya') NOT NULL,
  `konten` text NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informasi_petanis`
--

INSERT INTO `informasi_petanis` (`id`, `judul`, `kategori`, `konten`, `tanggal_terbit`, `created_at`, `updated_at`) VALUES
(1, 'Hama yang menyerang', 'Hama', 'hama yang menyerang tanaman terutama pada tanaman padi', '2025-08-06', '2025-08-05 21:24:38', '2025-08-05 21:28:47'),
(2, 'Penyakit Tanaman Padi', 'Penyakit', 'Penyakit yang sering menyerang tanaman padi dan membuat gagal panen', '2025-08-06', '2025-08-06 05:22:39', '2025-08-06 05:22:39'),
(3, 'Hama dan Penyakit Tanaman Padi', 'Lainnya', 'dasdasdasdasdsa', '2025-08-06', '2025-08-06 05:31:15', '2025-08-06 05:31:15'),
(4, 'Cuaca Kemarau Panjang', 'Cuaca', 'Cuaca kemarau panjang dapat berpengaruh besar terhadap masa panen pada beberapa tanaman terutama padi', '2025-08-06', '2025-08-06 05:38:40', '2025-08-06 05:38:40');

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
-- Table structure for table `kegiatans`
--

CREATE TABLE `kegiatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanaman_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_kegiatan` varchar(255) NOT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatans`
--

INSERT INTO `kegiatans` (`id`, `tanaman_id`, `tanggal`, `jenis_kegiatan`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-08-05', 'Penanaman', 'Mulai dari penanaman', '2025-08-04 20:37:40', '2025-08-04 20:37:40');

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
(4, '2025_08_04_113826_create_produks_table', 1),
(5, '2025_08_04_133512_create_harga_pasars_table', 1),
(6, '2025_08_04_153052_create_tanamen_table', 1),
(7, '2025_08_04_153109_create_kegiatans_table', 1),
(8, '2025_08_04_153139_create_penggunaan_obats_table', 1),
(9, '2025_08_05_020743_create_transaksis_table', 2),
(10, '2025_08_05_030717_create_pinjaman_modals_table', 3),
(11, '2025_08_05_073019_create_asuransi_pertanians_table', 4),
(12, '2025_08_06_011745_create_komunitas_threads_table', 5),
(13, '2025_08_06_012118_create_komentar_komunitas_table', 6),
(14, '2025_08_06_040205_create_informasi_petanis_table', 7);

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
-- Table structure for table `penggunaan_obats`
--

CREATE TABLE `penggunaan_obats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanaman_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `dosis` varchar(255) NOT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penggunaan_obats`
--

INSERT INTO `penggunaan_obats` (`id`, `tanaman_id`, `tanggal`, `nama_obat`, `dosis`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-08-05', 'Obat pupuk', '10 ml', 'adaw awawa', '2025-08-04 20:59:17', '2025-08-04 21:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman_modals`
--

CREATE TABLE `pinjaman_modals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `status` enum('Menunggu','Disetujui','Ditolak') NOT NULL DEFAULT 'Menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pinjaman_modals`
--

INSERT INTO `pinjaman_modals` (`id`, `user_id`, `judul`, `deskripsi`, `jumlah`, `tanggal_pengajuan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Peminjaman Modal', NULL, 1500000.00, '2025-08-06', 'Menunggu', '2025-08-06 05:46:27', '2025-08-06 05:46:27');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `petani_id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga_per_kg` int(11) NOT NULL,
  `stok_kg` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status_produk` enum('Tersedia','Habis','Nonaktif') NOT NULL DEFAULT 'Tersedia',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `petani_id`, `nama_produk`, `kategori`, `deskripsi`, `harga_per_kg`, `stok_kg`, `satuan`, `gambar`, `status_produk`, `created_at`, `updated_at`) VALUES
(1, 1, 'Beras', 'Bahan Pokok', 'Beras dengan kualitas baik', 16000, 100, 'Ton', 'produk/dOu5Kz82jjEMDBMnEwNbWuQjV91ueDJe0XsXxGQk.jpg', 'Tersedia', '2025-08-04 08:38:19', '2025-08-04 08:38:19'),
(2, 1, 'Jagung', 'Tanaman Pangan', 'Jagung manis', 8000, 350, 'Kg', 'produk/qHUb856iUVl9SFmWSpPq09XTG7laOxP72S6XzFyo.jpg', 'Tersedia', '2025-08-04 18:04:29', '2025-08-04 18:04:29'),
(3, 1, 'Bayam Hijau', 'Sayuran Hijau', 'Sayuran hijau organik', 7000, 200, 'Kg', 'produk/81Nbcie0A17kmQARx1vseGQ1SRteJUzfOH5SZjdL.jpg', 'Habis', '2025-08-04 18:06:11', '2025-08-04 18:06:11'),
(4, 1, 'Mangga Harum Manis', 'Buah Tropis', 'Mangga harus manis dengan daging buah yang tebal', 25000, 500, 'Kg', 'produk/TrMtztjATJzpMyXZFH7WpFygc3pbZQ1BLdqoaXiO.jpg', 'Tersedia', '2025-08-04 18:07:19', '2025-08-04 18:07:19');

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
('cUG3QzlYeUPrdnUMLuPQzjLucpAIXKFsQgTvHBw5', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicUN3Zk1EaEtCVWd0dU9iSGRFeDZRVExQbXBNNHVFbktmRTRpNjVUbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1754531239),
('k6LjRIE2g9VJ1IOYCQZ4ZsNTAIPeNKg1o6wEmMpp', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRGMwTlFSSUNTM0l1VXRBTkdFY0tzck5sMkg3MnBqQU1DMGxUclR0RyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pbmZvcm1hc2kiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1754484758);

-- --------------------------------------------------------

--
-- Table structure for table `tanamen`
--

CREATE TABLE `tanamen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_tanaman` varchar(255) NOT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `tanggal_tanam` date NOT NULL,
  `perkiraan_panen` date DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tanamen`
--

INSERT INTO `tanamen` (`id`, `user_id`, `nama_tanaman`, `jenis`, `tanggal_tanam`, `perkiraan_panen`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Benih Padi', 'Tanaman Pangan', '2025-08-05', '2025-08-29', 'asd', '2025-08-04 20:36:00', '2025-08-04 20:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` enum('Pemasukan','Pengeluaran') NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `jumlah` decimal(15,2) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `user_id`, `tanggal`, `jenis`, `kategori`, `jumlah`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, 1, '2025-08-05', 'Pengeluaran', 'Pembelian Pupuk', 250000.00, 'Pembelian pupuk NPK untuk tanaman cabai bulan Agustus', '2025-08-04 19:55:01', '2025-08-04 19:55:01');

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
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$SN9ee5DvtWpDpdkoPwcAbOuyO9rqczJYRvBQaYNG4Ket2O/sKeXk2', 'user', NULL, '2025-08-04 08:36:33', '2025-08-04 08:36:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asuransi_pertanians`
--
ALTER TABLE `asuransi_pertanians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asuransi_pertanians_user_id_foreign` (`user_id`),
  ADD KEY `asuransi_pertanians_tanaman_id_foreign` (`tanaman_id`);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `harga_pasars`
--
ALTER TABLE `harga_pasars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi_petanis`
--
ALTER TABLE `informasi_petanis`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatans_tanaman_id_foreign` (`tanaman_id`);

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
-- Indexes for table `penggunaan_obats`
--
ALTER TABLE `penggunaan_obats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penggunaan_obats_tanaman_id_foreign` (`tanaman_id`);

--
-- Indexes for table `pinjaman_modals`
--
ALTER TABLE `pinjaman_modals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pinjaman_modals_user_id_foreign` (`user_id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produks_petani_id_foreign` (`petani_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tanamen`
--
ALTER TABLE `tanamen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tanamen_user_id_foreign` (`user_id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `asuransi_pertanians`
--
ALTER TABLE `asuransi_pertanians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `harga_pasars`
--
ALTER TABLE `harga_pasars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `informasi_petanis`
--
ALTER TABLE `informasi_petanis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `penggunaan_obats`
--
ALTER TABLE `penggunaan_obats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pinjaman_modals`
--
ALTER TABLE `pinjaman_modals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tanamen`
--
ALTER TABLE `tanamen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asuransi_pertanians`
--
ALTER TABLE `asuransi_pertanians`
  ADD CONSTRAINT `asuransi_pertanians_tanaman_id_foreign` FOREIGN KEY (`tanaman_id`) REFERENCES `tanamen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `asuransi_pertanians_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD CONSTRAINT `kegiatans_tanaman_id_foreign` FOREIGN KEY (`tanaman_id`) REFERENCES `tanamen` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penggunaan_obats`
--
ALTER TABLE `penggunaan_obats`
  ADD CONSTRAINT `penggunaan_obats_tanaman_id_foreign` FOREIGN KEY (`tanaman_id`) REFERENCES `tanamen` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pinjaman_modals`
--
ALTER TABLE `pinjaman_modals`
  ADD CONSTRAINT `pinjaman_modals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `produks_petani_id_foreign` FOREIGN KEY (`petani_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tanamen`
--
ALTER TABLE `tanamen`
  ADD CONSTRAINT `tanamen_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
