-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2023 pada 18.33
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `kode_mhs` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_dosen`
--

CREATE TABLE `data_dosen` (
  `id` int(10) NOT NULL,
  `nidn` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `days` varchar(15) NOT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `barcode` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_dosen`
--

INSERT INTO `data_dosen` (`id`, `nidn`, `user_id`, `nama`, `id_matkul`, `days`, `start`, `end`, `barcode`, `created_at`, `updated_at`) VALUES
(10, '123456', 2, 'Budi Ariyadi,S.T,M.Kom', 1, 'Rabu', '17:00:00', '20:00:00', 878031519, '2023-11-22 23:09:20', '2023-11-22 23:09:20'),
(11, '123456', 3, 'Cecep Rahmat,S.S,M.Si', 6, 'Minggu', '09:00:00', '11:25:00', 878031518, '2023-11-22 23:14:58', '2023-11-22 23:14:58'),
(12, '123456', 4, 'Erwan H,S,T.Kom,M.Kom', 3, 'Sabtu', '14:00:00', '15:30:00', 878031510, '2023-11-22 23:18:30', '2023-11-22 23:18:30'),
(13, '123456', 5, 'Himawan Tajiri,S.Kom', 2, 'Sabtu', '15:30:00', '17:55:00', 878031517, '2023-11-22 23:19:13', '2023-11-22 23:19:13'),
(14, '123456', 6, 'Sudin S,S.Kom,M.Kom', 4, 'Sabtu', '09:00:00', '12:00:00', 878031511, '2023-11-22 23:20:30', '2023-11-22 23:20:30'),
(15, '123456', 7, 'Dr. Setiawati', 5, 'Minggu', '15:25:00', '16:55:00', 878031512, '2023-11-22 23:21:23', '2023-11-22 23:21:23'),
(16, '123456', 8, 'Aman Nulhaqin,M.Pd', 7, 'Sabtu', '12:30:00', '14:00:00', 878031516, '2023-11-23 00:50:35', '2023-11-23 00:50:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosens`
--

CREATE TABLE `dosens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nidn` varchar(255) NOT NULL,
  `matkul` varchar(255) NOT NULL,
  `ttl` date NOT NULL,
  `agama` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosens`
--

INSERT INTO `dosens` (`id`, `nama`, `nidn`, `matkul`, `ttl`, `agama`, `jk`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 'Agil Ayu Kinanty', '030322001', 'akuntansi', '2001-02-24', 'Islam', 'Perempuan', 'neglasari', '2023-11-22 06:23:50', '2023-11-22 06:23:50'),
(3, 'Purwa Adi Wicaksana', '030322002', 'c++', '2001-09-06', 'Islam', 'Laki-Laki', 'kp.negla', '2023-11-22 06:25:22', '2023-11-22 06:25:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `id` int(11) NOT NULL,
  `nm_matkul` varchar(123) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`id`, `nm_matkul`, `created_at`, `updated_at`) VALUES
(1, 'ANSI / PSI', NULL, NULL),
(2, 'Pengantar Hardware', NULL, '2023-11-22 23:44:36'),
(3, 'E-Commerce', NULL, NULL),
(4, 'Pemrograman 2', NULL, NULL),
(5, 'Bahasa Indonesia', NULL, NULL),
(6, 'Bahasa Inggris 2', NULL, NULL),
(7, 'Pengantar Ekonomi', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2023_11_22_130032_create_dosens_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `profile_mahasiswa`
--

CREATE TABLE `profile_mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` text NOT NULL,
  `ttl` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `prodi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profile_mahasiswa`
--

INSERT INTO `profile_mahasiswa` (`id`, `nim`, `nama`, `ttl`, `jk`, `agama`, `alamat`, `prodi`, `created_at`, `updated_at`) VALUES
(5, 30322201, 'Andika Pratama', '2003-12-23', 'Laki-Laki', 'Islam', 'Kp. Cikembar', 'Manajemen Informatika', '2023-11-23 06:37:09', '2023-11-23 06:37:09'),
(6, 30322202, 'Aulia Hermayanti', '2003-11-23', 'Perempuan', 'Islam', 'Jl. Bayangkara', 'Manajemen Informatika', '2023-11-23 06:39:04', '2023-11-23 06:39:04'),
(7, 30322203, 'Bahrul Saidul Mutaqin', '2002-08-03', 'Laki-Laki', 'Islam', 'Bogor', 'Manajemen Informatika', '2023-11-23 06:39:48', '2023-11-23 06:39:48'),
(8, 30322204, 'Bunga Mareta', '2004-03-03', 'Perempuan', 'Islam', 'Kp. Cibarengkok', 'Manajemen Informatika', '2023-11-23 06:40:36', '2023-11-23 06:40:36'),
(9, 30322205, 'Dandi Irawan', '2003-12-12', 'Laki-Laki', 'Islam', 'Kp. Cikembar', 'Manajemen Informatika', '2023-11-23 06:41:33', '2023-11-23 06:41:33'),
(10, 30322206, 'Deva Putra Respati', '2003-03-13', 'Laki-Laki', 'Islam', 'Kp. Cikembar', 'Manajemen Informatika', '2023-11-23 06:42:17', '2023-11-23 06:42:17'),
(11, 30322207, 'Siti Rahmawati', '2005-01-16', 'Perempuan', 'Islam', 'Kp. Cikembar', 'Manajemen Informatika', '2023-11-23 06:42:55', '2023-11-23 06:42:55'),
(12, 30322208, 'Suci Khairunnisa', '2004-08-23', 'Perempuan', 'Islam', 'Kp. Cikembar', 'Manajemen Informatika', '2023-11-23 06:43:34', '2023-11-23 06:43:34'),
(13, 30322009, 'Viola Alvianita', '2004-03-31', 'Perempuan', 'Islam', 'Kp. Cikembar', 'Manajemen Informatika', '2023-11-23 06:44:52', '2023-11-23 06:44:52'),
(14, 3032210, 'Visyarah Azzahra', '2003-09-28', 'Perempuan', 'Islam', 'Jl. Raya Cikole', 'Manajemen Informatika', '2023-11-23 06:46:55', '2023-11-23 06:46:55'),
(15, 3032211, 'Nabillah Nurchita', '2004-09-08', 'Perempuan', 'Islam', 'Kp. Sekarwangi', 'Manajemen Informatika', '2023-11-23 06:47:41', '2023-11-23 06:47:41'),
(16, 3032212, 'Nursyifa', '2003-09-18', 'Perempuan', 'Islam', 'Kp. Sekarwangi', 'Manajemen Informatika', '2023-11-23 06:49:12', '2023-11-23 06:49:12'),
(17, 30322001, 'Agil Ayu Kinanty', '2001-02-24', 'Perempuan', 'Islam', 'Kp. Neglasari', 'Manajemen Informatika', '2023-11-23 06:49:52', '2023-11-23 06:49:52'),
(18, 30322008, 'M Yusuf Maulana', '2002-03-16', 'Perempuan', 'Islam', 'Kp. Palabuhanratu', 'Manajemen Informatika', '2023-11-23 06:50:52', '2023-11-23 06:50:52'),
(19, 30322008, 'Salwa Putri', '2001-12-16', 'Perempuan', 'Islam', 'Kalibunder', 'Manajemen Informatika', '2023-11-23 06:52:00', '2023-11-23 06:52:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_absen`
--

CREATE TABLE `rekap_absen` (
  `id` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rekap_absen`
--

INSERT INTO `rekap_absen` (`id`, `id_mahasiswa`, `id_dosen`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 5, 10, '2023-12-07 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `level` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `level`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'dosen', NULL, NULL),
(3, 'mahasiswa', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(2, 2, 'Budi Ariyadi,S.T,M.Kom', 'budi.ariyadi140886@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(3, 2, 'Cecep Rahmat,S.S,M.Si', 'ceceprahmat@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(4, 2, 'Erwan H,S,T.Kom,M.Kom', 'erwanh@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(5, 2, 'Himawan Tajiri,S.Kom', 'himawantajiri@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(6, 2, 'Sudin S,S.Kom,M.Kom', 'sudins@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(7, 2, 'Dr. Setiawati', 'drsetiawati@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(8, 2, 'Aman Nulhaqin,M.Pd', 'amannulhaqin@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(9, 3, 'Andika Pratama', 'andikapratama@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(10, 3, 'Aulia Hermayanti', 'auliahermayanti@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(11, 3, 'Bahrul Saidul Mutaqin', 'bahrulmutaqin@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(12, 3, 'Bunga Mareta', 'bungamareta@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(13, 3, 'Dandi Irawan', 'dandiirawan@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(14, 3, 'Deva Putra Respati', 'devarespati@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(15, 3, 'Siti Rahmawati', 'sitirahmawati@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(16, 3, 'Suci Khairunnisa', 'sucikhairunnisa@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(17, 3, 'Viola Alvianita', 'violaalvianita@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(18, 3, 'Visyarah Azzahra', 'visyarahazzahra@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(19, 3, 'Nabillah Nurchita', 'nabillahnurchita@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(20, 3, 'Nursyifa', 'nursyifanursyifa@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(21, 3, 'Agil Ayu Kinanty', 'agilkinanty@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(22, 3, 'M Yusuf Maulana', 'mmaulana@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL),
(23, 3, 'Salwa Putri', 'salwaputri@gmail.com', NULL, '$2y$10$Yph3Aw..tCedbz48ACibS.6nXESIaXlbKH7ZMAb4bVtRkx9LMuBGu', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_dosen`
--
ALTER TABLE `data_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `profile_mahasiswa`
--
ALTER TABLE `profile_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekap_absen`
--
ALTER TABLE `rekap_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT untuk tabel `data_dosen`
--
ALTER TABLE `data_dosen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profile_mahasiswa`
--
ALTER TABLE `profile_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `rekap_absen`
--
ALTER TABLE `rekap_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
