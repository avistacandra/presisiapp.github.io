-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 19 Jul 2023 pada 15.30
-- Versi server: 5.7.34
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presi_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_28_050613_create_tb_mapels_table', 1),
(6, '2023_06_30_030233_create_tb_kelas_table', 1),
(7, '2023_06_30_072556_create_tb_gurus_table', 2),
(8, '2023_07_01_033423_create_tb_semesters_table', 3),
(9, '2023_07_01_090133_create_tb_thn_ajarans_table', 4),
(10, '2023_07_01_111917_create_tb_siswas_table', 5),
(11, '2023_07_01_141050_create_tb_guru_pikets_table', 6),
(16, '2023_07_02_043940_create_tb_siswas_table', 7),
(17, '2023_07_03_082020_create_tb_gurus_table', 8),
(18, '2023_07_03_093213_create_tb_semesters_table', 9),
(20, '2023_07_03_100224_create_tb_thn_ajarans_table', 10),
(22, '2023_07_03_130816_create_tb_jadwalbelajars_table', 11),
(23, '2023_07_04_040646_create_tb_gurus_table', 12),
(24, '2023_07_04_041217_create_tb_siswas_table', 13),
(25, '2023_07_04_041757_create_tb_jadwalbelajars_table', 14),
(31, '2023_07_05_074452_create_tb_presensis_table', 15),
(32, '2023_07_07_043005_create_tb_ijinkeluars_table', 15),
(34, '2023_07_07_081159_create_tb_ijinmasuks_table', 16),
(35, '2023_07_07_125825_create_tb_ijinkeluars_table', 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` char(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_guru` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `je_kel` enum('P','L') COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgs_tambahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id`, `nip`, `nm_guru`, `je_kel`, `golongan`, `tgs_tambahan`, `created_at`, `updated_at`) VALUES
(1, '728281818189287653', 'Avista Candra Dewi, S.Kom.', 'P', 'PNS', 'Sekretaris', NULL, NULL),
(3, '728281818189287654', 'Joko Widodo, S.H.', 'L', 'Honorer', 'Guru bijak', NULL, NULL),
(5, '728281818189287659', 'Sri Wahyuni, S.Pd.', 'P', 'PNS', 'Sekretaris', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru_piket`
--

CREATE TABLE `tb_guru_piket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_gp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `je_kel` enum('P','L') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_guru_piket`
--

INSERT INTO `tb_guru_piket` (`id`, `nm_gp`, `je_kel`, `created_at`, `updated_at`) VALUES
(2, 'Ratnasari Dwiaryani', 'P', NULL, NULL),
(3, 'Budiyana', 'L', NULL, NULL),
(4, 'Sutarman', 'L', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ijinkeluar`
--

CREATE TABLE `tb_ijinkeluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gurupiket_id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `ijin_jam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_ijinkeluar` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_ijinkeluar`
--

INSERT INTO `tb_ijinkeluar` (`id`, `gurupiket_id`, `siswa_id`, `kelas_id`, `ijin_jam`, `ket`, `alasan`, `tgl_ijinkeluar`, `created_at`, `updated_at`) VALUES
(2, 3, 3, 39, '11.30-12.00', 'izin', 'olahraga renang', '2023-07-08', '2023-07-08 07:42:04', NULL),
(3, 4, 4, 39, '18.59-19.00', 'izin', 'makan', '2023-07-14', '2023-07-08 00:47:16', '2023-07-08 00:47:16'),
(4, 2, 3, 45, '11.00 - 12.00', 'Ngambil Uang', 'Ngambil uang di atm', '2023-07-19', '2023-07-19 02:58:46', '2023-07-19 02:59:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ijinmasuk`
--

CREATE TABLE `tb_ijinmasuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gurupiket_id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `jam_masuk` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_ijinmasuk` date NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_ijinmasuk`
--

INSERT INTO `tb_ijinmasuk` (`id`, `gurupiket_id`, `siswa_id`, `kelas_id`, `jam_masuk`, `tgl_ijinmasuk`, `ket`, `alasan`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 39, '11.00', '2023-07-10', 'Keluar kota ikut orang tua', 'Keluar Kota', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwalbelajar`
--

CREATE TABLE `tb_jadwalbelajar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` bigint(20) UNSIGNED NOT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `hari` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_belajar` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `tahunajaran_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_jadwalbelajar`
--

INSERT INTO `tb_jadwalbelajar` (`id`, `guru_id`, `mapel_id`, `kelas_id`, `hari`, `jam_belajar`, `semester_id`, `tahunajaran_id`, `created_at`, `updated_at`) VALUES
(9, 1, 15, 39, 'Jumat', '07.00 - 09.00', 4, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_kelas` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `nm_kelas`, `created_at`, `updated_at`) VALUES
(39, 'VII-A', '2023-07-04 17:39:37', '2023-07-04 17:39:37'),
(40, 'VII-G', '2023-07-04 17:39:42', '2023-07-05 00:27:55'),
(41, 'VII-C', '2023-07-04 17:39:46', '2023-07-04 17:39:46'),
(44, 'VII-D', '2023-07-04 17:40:56', '2023-07-04 17:40:56'),
(45, 'VII-E', '2023-07-05 00:27:28', '2023-07-05 00:27:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_mapel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id`, `nm_mapel`, `created_at`, `updated_at`) VALUES
(15, 'Pendidikan Agama Islam', '2023-07-04 17:41:07', '2023-07-04 17:41:07'),
(16, 'Sosiologi', '2023-07-04 17:41:15', '2023-07-04 17:41:15'),
(17, 'PPKn', '2023-07-04 17:41:23', '2023-07-04 17:41:23'),
(18, 'Ilmu Pengetahuan Alam', '2023-07-04 17:41:28', '2023-07-04 17:41:28'),
(19, 'Ilmu Pengetahuan Sosial', '2023-07-04 17:41:35', '2023-07-04 17:41:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_presensi`
--

CREATE TABLE `tb_presensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `pertemuan_ke` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jadwalbelajar_id` bigint(20) UNSIGNED NOT NULL,
  `ket_presensi` enum('H','I','S','A') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_absen` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_presensi`
--

INSERT INTO `tb_presensi` (`id`, `siswa_id`, `mapel_id`, `kelas_id`, `pertemuan_ke`, `jadwalbelajar_id`, `ket_presensi`, `tgl_absen`, `created_at`, `updated_at`) VALUES
(3, 1, 15, 39, '1', 9, 'I', '2023-07-19', '2023-07-19 02:47:19', '2023-07-19 02:48:00'),
(4, 3, 16, 40, '3', 9, 'H', '2023-07-18', '2023-07-19 07:30:04', '2023-07-19 07:30:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_semester`
--

CREATE TABLE `tb_semester` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semester` enum('Ganjil','Genap') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ganjil',
  `status_sem` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_semester`
--

INSERT INTO `tb_semester` (`id`, `semester`, `status_sem`, `created_at`, `updated_at`) VALUES
(4, 'Ganjil', 'Tidak Aktif', NULL, NULL),
(5, 'Genap', 'Aktif', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_siswa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `jns_kelamin` enum('P','L') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `nis`, `nm_siswa`, `kelas_id`, `jns_kelamin`, `created_at`, `updated_at`) VALUES
(1, '7022', 'Alwi', 40, 'L', NULL, NULL),
(3, '7023', 'Avista Candra Dewi', 39, 'P', NULL, NULL),
(4, '7024', 'Fida Aliyyah', 40, 'P', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_thn_ajaran`
--

CREATE TABLE `tb_thn_ajaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thn_ajaran` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_ta` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_thn_ajaran`
--

INSERT INTO `tb_thn_ajaran` (`id`, `thn_ajaran`, `status_ta`, `created_at`, `updated_at`) VALUES
(3, '2023/2024', 'Aktif', NULL, NULL),
(5, '2020/2021', 'Aktif', NULL, NULL),
(6, '2013/2014', 'Tidak Aktif', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'adminavista@gmail.com', 'admin', NULL, '$2y$10$6i2GRdRzRvuJKG/VLigk3ecODDXlDc/LfurF/9r5IVy1wuq.YtiPC', '1', NULL, '2023-06-29 23:00:47', '2023-06-29 23:00:47'),
(2, 'Kenny Widiastuti', 'kennyguru@gmail.com', 'guru', NULL, '$2y$10$TkHUoLsoOkZ6yI846tNiiuXpu6G1Yx3Sa/wtdnEG.4jYhh/3Olftu', '2', NULL, '2023-06-29 23:00:47', '2023-06-29 23:00:47'),
(3, 'Mayang Sari', 'mayangtatausaha@gmail.com', 'tata usaha', NULL, '$2y$10$9eire/ZzC91ZxzD4FioQj.C4IUMZMc88l.5x7eorGneSp9ULwVnCC', '3', NULL, '2023-06-29 23:00:47', '2023-06-29 23:00:47'),
(4, 'Rodiyah Saidah', 'rodiyahgurupiket@gmail.com', 'guru piket', NULL, '$2y$10$HLkkE2tSe.w7vIRGwwE4oefG9RnPH9ELme6EnQba49ymmT7jOb8f6', '4', NULL, '2023-06-29 23:00:47', '2023-06-29 23:00:47'),
(5, 'Bella Andika', 'wagelaseh@gmail.com', 'pengguns', NULL, '$2y$10$CuB2.i1ovSWPesPlFy7IV.gU9MTqld80PY1Cg/KNrBmCFoexoWh6u', '5', NULL, '2023-07-03 22:00:07', '2023-07-03 22:00:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_guru_nip_unique` (`nip`);

--
-- Indeks untuk tabel `tb_guru_piket`
--
ALTER TABLE `tb_guru_piket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_ijinkeluar`
--
ALTER TABLE `tb_ijinkeluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_ijinkeluar_gurupiket_id_foreign` (`gurupiket_id`),
  ADD KEY `tb_ijinkeluar_siswa_id_foreign` (`siswa_id`),
  ADD KEY `tb_ijinkeluar_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `tb_ijinmasuk`
--
ALTER TABLE `tb_ijinmasuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_ijinmasuk_gurupiket_id_foreign` (`gurupiket_id`),
  ADD KEY `tb_ijinmasuk_siswa_id_foreign` (`siswa_id`),
  ADD KEY `tb_ijinmasuk_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `tb_jadwalbelajar`
--
ALTER TABLE `tb_jadwalbelajar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_jadwalbelajar_guru_id_foreign` (`guru_id`),
  ADD KEY `tb_jadwalbelajar_mapel_id_foreign` (`mapel_id`),
  ADD KEY `tb_jadwalbelajar_kelas_id_foreign` (`kelas_id`),
  ADD KEY `tb_jadwalbelajar_semester_id_foreign` (`semester_id`),
  ADD KEY `tb_jadwalbelajar_tahunajaran_id_foreign` (`tahunajaran_id`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_presensi_siswa_id_foreign` (`siswa_id`),
  ADD KEY `tb_presensi_mapel_id_foreign` (`mapel_id`),
  ADD KEY `tb_presensi_kelas_id_foreign` (`kelas_id`),
  ADD KEY `tb_presensi_jadwalbelajar_id_foreign` (`jadwalbelajar_id`);

--
-- Indeks untuk tabel `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_siswa_nis_unique` (`nis`),
  ADD KEY `tb_siswa_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `tb_thn_ajaran`
--
ALTER TABLE `tb_thn_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_guru_piket`
--
ALTER TABLE `tb_guru_piket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_ijinkeluar`
--
ALTER TABLE `tb_ijinkeluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_ijinmasuk`
--
ALTER TABLE `tb_ijinmasuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_jadwalbelajar`
--
ALTER TABLE `tb_jadwalbelajar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_thn_ajaran`
--
ALTER TABLE `tb_thn_ajaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_ijinkeluar`
--
ALTER TABLE `tb_ijinkeluar`
  ADD CONSTRAINT `tb_ijinkeluar_gurupiket_id_foreign` FOREIGN KEY (`gurupiket_id`) REFERENCES `tb_guru_piket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_ijinkeluar_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_ijinkeluar_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `tb_siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_ijinmasuk`
--
ALTER TABLE `tb_ijinmasuk`
  ADD CONSTRAINT `tb_ijinmasuk_gurupiket_id_foreign` FOREIGN KEY (`gurupiket_id`) REFERENCES `tb_guru_piket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_ijinmasuk_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_ijinmasuk_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `tb_siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_jadwalbelajar`
--
ALTER TABLE `tb_jadwalbelajar`
  ADD CONSTRAINT `tb_jadwalbelajar_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `tb_guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwalbelajar_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwalbelajar_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `tb_mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwalbelajar_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `tb_semester` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwalbelajar_tahunajaran_id_foreign` FOREIGN KEY (`tahunajaran_id`) REFERENCES `tb_thn_ajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD CONSTRAINT `tb_presensi_jadwalbelajar_id_foreign` FOREIGN KEY (`jadwalbelajar_id`) REFERENCES `tb_jadwalbelajar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_presensi_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_presensi_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `tb_mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_presensi_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `tb_siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
