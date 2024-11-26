-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Apr 2020 pada 16.03
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absens`
--

CREATE TABLE `absens` (
  `id` int(10) UNSIGNED NOT NULL,
  `krs_id` int(10) UNSIGNED NOT NULL,
  `tahun` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `izin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sakit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alpha` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absens`
--

INSERT INTO `absens` (`id`, `krs_id`, `tahun`, `izin`, `sakit`, `alpha`, `created_at`, `updated_at`) VALUES
(2, 12, '2020', '1', '1', '1', '2020-04-17 04:46:21', '2020-04-17 04:46:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatans`
--

CREATE TABLE `catatans` (
  `id` int(10) UNSIGNED NOT NULL,
  `krs_id` int(10) UNSIGNED NOT NULL,
  `tahun` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `catatans`
--

INSERT INTO `catatans` (`id`, `krs_id`, `tahun`, `catatan`, `ket`, `created_at`, `updated_at`) VALUES
(2, 12, '2020', 'Perbaiki cara berbicara nya', '-', '2020-04-17 04:52:39', '2020-04-17 04:52:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `eskuls`
--

CREATE TABLE `eskuls` (
  `id` int(10) UNSIGNED NOT NULL,
  `krs_id` int(10) UNSIGNED NOT NULL,
  `tahun` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kegiatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `eskuls`
--

INSERT INTO `eskuls` (`id`, `krs_id`, `tahun`, `kegiatan`, `ket`, `created_at`, `updated_at`) VALUES
(2, 12, '2020', 'Volly', 'Sangat baik dalam berlatih dan terampil dalam memainkan bola volly', '2020-04-17 04:56:02', '2020-04-17 04:56:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurus`
--

CREATE TABLE `gurus` (
  `id` int(10) UNSIGNED NOT NULL,
  `nip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gurus`
--

INSERT INTO `gurus` (`id`, `nip`, `nama_lengkap`, `jk`, `nik`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `pic`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '200401', 'Buaddin Hasan', 'L', '3526020807870003', 'BANGKALAN', '1987-07-08', 'Dsn. Jaddih Barat II', 'belum', 4, '2020-04-08 03:35:42', '2020-04-08 03:35:42'),
(2, '200402', 'Faradina Ayu Puspita Sari', 'P', '3529064105910001', 'SUMENEP', '1991-05-01', 'PERUMAHAN GRIYA ANUGERAH D5 NO 17', 'belum', 5, '2020-04-08 03:35:42', '2020-04-08 03:35:42'),
(3, '200403', 'Holis', 'L', '3526181202920003', 'BANGKALAN', '1992-02-12', 'DSN.BATU BANTAL', 'belum', 6, '2020-04-08 03:35:42', '2020-04-08 03:35:42'),
(4, '200404', 'Husnan', 'L', '3526011707860006', 'Sambas', '1986-07-17', 'Jl. Halim Perdana Kusuma (Ring Road)', 'belum', 7, '2020-04-08 03:35:42', '2020-04-08 03:35:42'),
(5, '200405', 'Mariatun', 'P', '3526026509820001', 'SAMBAS', '1982-09-25', 'Dsn. Langgulang', 'belum', 8, '2020-04-08 03:35:42', '2020-04-08 03:35:42'),
(6, '200406', 'Moh. Ismail', 'L', '3528021405920005', 'PAMEKASAN', '1992-05-14', 'DESAN DUSUN SELATAN', 'belum', 9, '2020-04-08 03:35:43', '2020-04-08 03:35:43'),
(7, '200407', 'Mohammad Salimun', 'L', '3526030501940005', 'BANGKALAN', '1994-01-05', 'JL. LAUT ARAFURU 18/NO.04', 'belum', 10, '2020-04-08 03:35:43', '2020-04-08 03:35:43'),
(8, '200408', 'Nurul Aini', 'P', '1804054106930003', 'SUMBERJAYA', '1993-06-01', 'WAY PETAI', 'belum', 11, '2020-04-08 03:35:43', '2020-04-08 03:35:43'),
(9, '200409', 'Rahmad Gunawan', 'L', '3526021305900001', 'BANGKALAN', '1990-05-13', 'Jl. Durian', 'belum', 12, '2020-04-08 03:35:43', '2020-04-08 03:35:43'),
(10, '200410', 'Sani', 'L', '3526010207860011', 'BANJARMASIN', '1986-07-02', 'JL. HALIM PERDANA KUSUMA NO.9', 'belum', 13, '2020-04-08 03:35:43', '2020-04-08 03:35:43'),
(11, '200411', 'Sujono', 'L', '3526010207830002', 'Sumenep', '1983-07-02', 'Perum Nilam Bangkalan Indah Blok TM No. 571', 'belum', 14, '2020-04-08 03:35:43', '2020-04-08 03:38:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusans`
--

CREATE TABLE `jurusans` (
  `id` int(10) UNSIGNED NOT NULL,
  `jurusan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `daya_tampung` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusans`
--

INSERT INTO `jurusans` (`id`, `jurusan`, `daya_tampung`, `created_at`, `updated_at`) VALUES
(1, 'Agribisnis dan Perikanan Air Tawar', 40, '2020-04-08 03:43:08', '2020-04-08 18:13:23'),
(2, 'Teknik Komputer dan Jaringan', 40, '2020-04-08 18:13:14', '2020-04-08 18:13:14'),
(3, 'Teknik dan Bisnis Sepeda Motor', 40, '2020-04-10 06:00:20', '2020-04-10 06:00:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kd_mapels`
--

CREATE TABLE `kd_mapels` (
  `id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `no_kd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kd_mapels`
--

INSERT INTO `kd_mapels` (`id`, `mapel_id`, `no_kd`, `kd`, `kriteria`, `created_at`, `updated_at`) VALUES
(1, 2, '1.1', 'Melakukan perhitungan bilangan', 'PENGETAHUAN', '2020-04-17 21:56:01', '2020-04-17 21:56:01'),
(2, 2, '1.2', 'Memahami bilangan bulat', 'PENGETAHUAN', '2020-04-17 21:56:16', '2020-04-17 21:56:16'),
(3, 2, '1.3', 'Memahami bilangan pecahan', 'PENGETAHUAN', '2020-04-17 21:56:33', '2020-04-17 21:56:33'),
(4, 2, '4.1', 'Melakukan perhitungan bilangan', 'KETERAMPILAN', '2020-04-17 21:57:52', '2020-04-17 21:57:52'),
(5, 2, '4.2', 'Melakukan perhitungan bilangan pecahan', 'KETERAMPILAN', '2020-04-17 21:58:15', '2020-04-17 21:58:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_id` int(10) UNSIGNED NOT NULL,
  `guru_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`, `ket`, `jurusan_id`, `guru_id`, `created_at`, `updated_at`) VALUES
(2, 'X - APAT A', 'Kelas reguler', 1, 11, '2020-04-17 00:12:51', '2020-04-17 00:12:51'),
(3, 'X - TKJ 1', 'Kelas reguler', 2, 10, '2020-04-17 21:41:41', '2020-04-17 21:41:41'),
(4, 'XI - APAT A', 'Kelas reguler', 1, 9, '2020-04-18 00:22:07', '2020-04-18 00:22:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `semester` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `krs`
--

INSERT INTO `krs` (`id`, `kelas_id`, `siswa_id`, `semester`, `tahun`, `created_at`, `updated_at`) VALUES
(9, 2, 1, 'GANJIL', '2020', '2020-04-17 00:49:24', '2020-04-17 00:49:24'),
(10, 2, 2, 'GANJIL', '2020', '2020-04-17 00:49:24', '2020-04-17 00:49:24'),
(11, 2, 3, 'GANJIL', '2020', '2020-04-17 00:49:24', '2020-04-17 00:49:24'),
(12, 2, 3, 'GENAP', '2020', '2020-04-17 02:11:22', '2020-04-17 02:11:22'),
(13, 4, 4, 'GANJIL', '2020', '2020-04-18 00:23:31', '2020-04-18 00:23:31'),
(14, 4, 5, 'GANJIL', '2020', '2020-04-18 00:23:31', '2020-04-18 00:23:31'),
(15, 3, 12, 'GANJIL', '2020', '2020-04-18 05:26:40', '2020-04-18 05:26:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapels`
--

CREATE TABLE `mapels` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_mapel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `guru_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mapels`
--

INSERT INTO `mapels` (`id`, `nama_mapel`, `ket`, `kategori`, `semester`, `tahun`, `jurusan_id`, `kelas_id`, `guru_id`, `created_at`, `updated_at`) VALUES
(2, 'Matematika', '70', 'KELOMPOK B', 'GANJIL', '2019-2020', 1, 2, 11, '2020-04-17 00:41:02', '2020-04-17 07:59:26'),
(3, 'Fisika', '75', 'KELOMPOK A', 'GANJIL', '2019-2020', 1, 2, 10, '2020-04-17 22:44:42', '2020-04-17 22:44:42'),
(5, 'Matematika', '75', 'KELOMPOK A', 'GENAP', '2019-2020', 1, 2, 11, '2020-04-17 22:48:35', '2020-04-17 22:48:35');

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
(1, '2014_10_11_111501_create_roles_table', 1),
(2, '2020_03_24_010742_create_jurusans_table', 1),
(3, '2020_03_25_000000_create_users_table', 1),
(4, '2020_03_26_131420_create_siswas_table', 1),
(5, '2020_03_27_131420_create_gurus_table', 1),
(6, '2020_04_01_051715_create_p_bukti_tfs_table', 1),
(45, '2020_04_04_075917_create_kelas_table', 2),
(46, '2020_04_04_080151_create_mapels_table', 2),
(47, '2020_04_08_085438_create_krs_table', 2),
(48, '2020_04_09_024951_create_kd_mapels_table', 2),
(49, '2020_04_12_031840_create_nilai_pengetahuans_table', 2),
(50, '2020_04_12_133800_create_nilai_keterampilans_table', 2),
(51, '2020_04_12_134031_create_nilai_sikaps_table', 2),
(57, '2020_04_17_061701_create_prakerins_table', 3),
(58, '2020_04_17_061958_create_eskuls_table', 3),
(59, '2020_04_17_062013_create_prestasis_table', 3),
(60, '2020_04_17_062036_create_absens_table', 3),
(61, '2020_04_17_062054_create_catatans_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_keterampilans`
--

CREATE TABLE `nilai_keterampilans` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `praktik1` int(11) DEFAULT NULL,
  `praktik2` int(11) DEFAULT NULL,
  `praktik3` int(11) DEFAULT NULL,
  `praktik4` int(11) DEFAULT NULL,
  `praktik5` int(11) DEFAULT NULL,
  `praktik6` int(11) DEFAULT NULL,
  `portofolio1` int(11) DEFAULT NULL,
  `portofolio2` int(11) DEFAULT NULL,
  `portofolio3` int(11) DEFAULT NULL,
  `portofolio4` int(11) DEFAULT NULL,
  `portofolio5` int(11) DEFAULT NULL,
  `portofolio6` int(11) DEFAULT NULL,
  `proyek1` int(11) DEFAULT NULL,
  `proyek2` int(11) DEFAULT NULL,
  `proyek3` int(11) DEFAULT NULL,
  `proyek4` int(11) DEFAULT NULL,
  `proyek5` int(11) DEFAULT NULL,
  `proyek6` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilai_keterampilans`
--

INSERT INTO `nilai_keterampilans` (`id`, `kelas_id`, `mapel_id`, `siswa_id`, `praktik1`, `praktik2`, `praktik3`, `praktik4`, `praktik5`, `praktik6`, `portofolio1`, `portofolio2`, `portofolio3`, `portofolio4`, `portofolio5`, `portofolio6`, `proyek1`, `proyek2`, `proyek3`, `proyek4`, `proyek5`, `proyek6`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, 100, NULL, NULL, NULL, NULL, NULL, 90, NULL, NULL, NULL, NULL, NULL, 80, NULL, NULL, NULL, NULL, NULL, '2020-04-17 21:59:48', '2020-04-17 22:01:22'),
(2, 2, 2, 2, 75, NULL, NULL, NULL, NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, 85, NULL, NULL, NULL, NULL, NULL, '2020-04-17 21:59:48', '2020-04-17 22:01:34'),
(3, 2, 2, 3, 85, NULL, NULL, NULL, NULL, NULL, 90, NULL, NULL, NULL, NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, '2020-04-17 21:59:48', '2020-04-17 22:01:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_pengetahuans`
--

CREATE TABLE `nilai_pengetahuans` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `tugas1` int(11) DEFAULT NULL,
  `tugas2` int(11) DEFAULT NULL,
  `tugas3` int(11) DEFAULT NULL,
  `tugas4` int(11) DEFAULT NULL,
  `tugas5` int(11) DEFAULT NULL,
  `tugas6` int(11) DEFAULT NULL,
  `uh1` int(11) DEFAULT NULL,
  `uh2` int(11) DEFAULT NULL,
  `uh3` int(11) DEFAULT NULL,
  `uh4` int(11) DEFAULT NULL,
  `uh5` int(11) DEFAULT NULL,
  `uh6` int(11) DEFAULT NULL,
  `uts` int(11) DEFAULT NULL,
  `uas` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilai_pengetahuans`
--

INSERT INTO `nilai_pengetahuans` (`id`, `kelas_id`, `mapel_id`, `siswa_id`, `tugas1`, `tugas2`, `tugas3`, `tugas4`, `tugas5`, `tugas6`, `uh1`, `uh2`, `uh3`, `uh4`, `uh5`, `uh6`, `uts`, `uas`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, 90, NULL, NULL, NULL, NULL, NULL, 100, NULL, NULL, NULL, NULL, NULL, 80, 80, '2020-04-17 21:50:39', '2020-04-17 21:54:49'),
(2, 2, 2, 2, 100, NULL, NULL, NULL, NULL, NULL, 75, NULL, NULL, NULL, NULL, NULL, 80, 100, '2020-04-17 21:50:39', '2020-04-17 21:54:56'),
(3, 2, 2, 3, 95, NULL, NULL, NULL, NULL, NULL, 80, NULL, NULL, NULL, NULL, NULL, 100, 80, '2020-04-17 21:50:39', '2020-04-17 21:55:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_sikaps`
--

CREATE TABLE `nilai_sikaps` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `sikap` int(11) DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alpha` int(11) DEFAULT NULL,
  `izin` int(11) DEFAULT NULL,
  `sakit` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilai_sikaps`
--

INSERT INTO `nilai_sikaps` (`id`, `kelas_id`, `mapel_id`, `siswa_id`, `sikap`, `deskripsi`, `alpha`, `izin`, `sakit`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, 100, 'Mampu belajar berhitung dengan baik', NULL, NULL, NULL, '2020-04-17 21:46:03', '2020-04-17 21:48:04'),
(2, 2, 2, 2, 80, 'Mampu belajar menjumlakan dengan baik', NULL, NULL, NULL, '2020-04-17 21:46:03', '2020-04-17 21:48:23'),
(3, 2, 2, 3, 90, 'Mampu belajar membagi dengan baik', NULL, NULL, NULL, '2020-04-17 21:46:03', '2020-04-17 21:48:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prakerins`
--

CREATE TABLE `prakerins` (
  `id` int(10) UNSIGNED NOT NULL,
  `krs_id` int(10) UNSIGNED NOT NULL,
  `tahun` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mitra` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lama` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prakerins`
--

INSERT INTO `prakerins` (`id`, `krs_id`, `tahun`, `mitra`, `lokasi`, `lama`, `ket`, `created_at`, `updated_at`) VALUES
(2, 12, '2020', 'Jaya Host', 'Bandung', '3', 'Terlau baik', '2020-04-17 05:07:05', '2020-04-17 05:07:05'),
(3, 12, '2019', 'Moto Jaya', 'Bangkalan', '3', 'Dapat melakukan tugas dengan baik', '2020-04-18 05:19:47', '2020-04-18 05:19:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasis`
--

CREATE TABLE `prestasis` (
  `id` int(10) UNSIGNED NOT NULL,
  `krs_id` int(10) UNSIGNED NOT NULL,
  `tahun` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_prestasi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prestasis`
--

INSERT INTO `prestasis` (`id`, `krs_id`, `tahun`, `jenis_prestasi`, `ket`, `created_at`, `updated_at`) VALUES
(2, 12, '2020', 'Juara 1 Baca Puisi', 'Sangat baik dalam membawakan puisi', '2020-04-17 05:00:38', '2020-04-17 05:00:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_bukti_tfs`
--

CREATE TABLE `p_bukti_tfs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `jumlah_tf` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `v_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `p_bukti_tfs`
--

INSERT INTO `p_bukti_tfs` (`id`, `user_id`, `jumlah_tf`, `pic`, `v_status`, `created_at`, `updated_at`) VALUES
(2, 2, '100000', 'public/buti_tf/y2A6T73EpCXGCBRa2ZscXC59bRTDNbIiBXjkPWCE.png', 'Verified', '2020-04-08 03:08:16', '2020-04-08 03:08:49'),
(3, 15, '8000000', 'public/buti_tf/uEXnYWHh8297uiE2j4MddzGfRPamYJENfUeJk4xR.jpeg', 'Verified', '2020-04-08 21:06:37', '2020-04-08 21:07:39'),
(4, 16, '1000000', 'public/buti_tf/xaMMDH6jYwIAHMN7wsZ0sQTDulSRehdpIhPv8Ccm.jpeg', 'Verified', '2020-04-10 01:59:43', '2020-04-10 02:01:00'),
(5, 17, '800000', 'public/buti_tf/vtSHzLJ0CEyRuVpBQw76lt1HDuJaq1vknNdS0tWz.jpeg', 'Verified', '2020-04-10 03:07:30', '2020-04-10 03:08:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Untuk admin', '2020-03-29 17:00:00', '2020-03-29 17:00:00'),
(2, 'Siswa', 'untuk siswa', '2020-03-29 17:00:00', '2020-03-29 17:00:00'),
(3, 'Pendaftar', 'Untuk pendaftar', NULL, NULL),
(4, 'Guru', 'Untuk Guru', NULL, NULL),
(5, 'Sarpras', 'Untuk sarana dan prasarana', NULL, NULL),
(6, 'Perpustakaan', 'Untuk perpustakaan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswas`
--

CREATE TABLE `siswas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_lengkap` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_kk` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_akte` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bahasa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggi_badan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berat_badan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anak_ke` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saudara_kandung` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saudara_tiri` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `riwayat_sakit` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buta_warna` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelainan_fisik` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sekolah_asal` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npsn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_sekolah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desa_sekolah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan_sekolah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten_sekolah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi_sekolah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos_sekolah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lama_sekolah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npun` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ijazah_sd` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skhun_sd` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orang_tua_sd` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ijazah_smp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skhun_smp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orang_tua_smp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nisn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan_jurusan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukuran_baju` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ayah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_ayah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_ayah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir_ayah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_ayah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ayah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_ayah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ayah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_ibu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_ibu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir_ibu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_ibu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_ibu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_ibu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_ibu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_wali` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_wali` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_wali` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir_wali` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_wali` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_wali` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_wali` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penghasilan_wali` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_kip` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_pkh` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_sk` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswas`
--

INSERT INTO `siswas` (`id`, `nama_lengkap`, `jk`, `nomor_kk`, `nik`, `nomor_akte`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `no_hp`, `bahasa`, `tinggi_badan`, `berat_badan`, `anak_ke`, `saudara_kandung`, `saudara_tiri`, `hobi`, `riwayat_sakit`, `buta_warna`, `kelainan_fisik`, `sekolah_asal`, `npsn`, `alamat_sekolah`, `desa_sekolah`, `kecamatan_sekolah`, `kabupaten_sekolah`, `provinsi_sekolah`, `kode_pos_sekolah`, `lama_sekolah`, `npun`, `ijazah_sd`, `skhun_sd`, `orang_tua_sd`, `ijazah_smp`, `skhun_smp`, `orang_tua_smp`, `nis`, `nisn`, `pilihan_jurusan`, `tahun`, `ukuran_baju`, `nama_ayah`, `nik_ayah`, `nomor_ayah`, `tempat_lahir_ayah`, `tanggal_lahir_ayah`, `pekerjaan_ayah`, `pendidikan_ayah`, `penghasilan_ayah`, `nama_ibu`, `nik_ibu`, `nomor_ibu`, `tempat_lahir_ibu`, `tanggal_lahir_ibu`, `pekerjaan_ibu`, `pendidikan_ibu`, `penghasilan_ibu`, `nama_wali`, `nik_wali`, `nomor_wali`, `tempat_lahir_wali`, `tanggal_lahir_wali`, `pekerjaan_wali`, `pendidikan_wali`, `penghasilan_wali`, `nomor_kip`, `nomor_pkh`, `nomor_sk`, `pic`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Nor Rahman', 'L', '234567', '234567', '234567', 'Pamekasan', '2020-04-08', 'kamal', 'bajang', 'pakong', 'pamekasan', 'jatim', '4356', '123', 'Bahasa Indonesia', '160', '40', '1', '1', '1', 'Mendaki', '-', 'TIDAK', '-', 'smp', '1212', 'pakong', 'pakong', 'pakong', 'pamekasan', 'jatim', '23456', '3', '23456', '123456', '12345', 'badri', '234567', '234567', 'badri', '54271612', '123', 'TKJ', '2020-04-08', 'M', 'badri', '234567', '456789', 'pamekasan', '2020-04-08', 'tani', 'smp', '234567', 'ertyu', '234567', '56789', 'rtyui', '2020-04-08', 'dfhjk', 'wertyui', '234567', 'retyu', '345678', '45678', 'yhjkl', '2020-04-08', 'yui', 'rtyui', '9876', '213456', '2134', '1234', 'public/profile/WxpGBJ4AHND1vXlPE48du6MBPx96bYSkWCH1zCd2.png', 2, '2020-04-08 03:01:10', '2020-04-08 03:24:15'),
(2, 'Ria', 'L', '212', '1245', '4567', 'ytui', '2020-03-13', 'qwer', 'werty', 'qw', 'gfds', 'dfgh', '678', '085204945546', 'Bahasa Indonesia', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '12332', '99887760', 'TKJ', '2020-04-01', 'M', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'belum', 3, '2020-04-08 03:33:16', '2020-04-08 11:57:46'),
(3, 'Eka Fatikhul F', 'L', '987654321', '7786543219985', '54321776598', 'ngawi', '1997-05-24', 'bringin', 'bringin', 'bringin', 'ngawi', 'jawa timur', '63285', '085607400012', 'Bahasa Indonesia', '160', '51', '1', '3', '0', 'sepak bola', '-', 'IYA\"', '-', 'SMPN 1 BRINGIN', '667778543254321', 'Jalan Krompil 6321', 'Bringin', 'Bringin', 'Ngawi', 'Jawa Timur', '63285', '3', '987765432342', '778666543243', '654567788983243', 'Ibrahim', '8765676545678', '8765434545456677', 'Ibrahim', '8876543998765', '130541100128', 'TBSM', '2019-07-18', 'XXL', 'ibrahim', '77689954563', '0', 'ngawi', '1971-08-27', 'wiraswasta', '-', '0', 'shinta', '887657889765', '089877564321', 'ngawi', '1982-04-23', 'rumah tangga', 'tidak sekolah', '0', 'harun', '3456788987654', '098977658976', 'bangkalan', '1982-01-30', 'tani', 'sma', '4000000', '0987654321', '654321', '0567894321', 'public/profile/4POTiDMCGCtIsotIjZa9iWlkoHKfZnT1CPrxuU9T.jpeg', 15, '2020-04-08 20:39:12', '2020-04-10 05:31:31'),
(4, 'Dwi Haryati Pratiwi', 'P', '139986765890564567', '88786545678898', '897600549897765', 'bangkalan', '2007-05-24', 'jalan sawo no 10', 'banyuajuh', 'kamal', 'bangkalan', 'jawa timur', '62191', '081336632726', 'Bahasa Indonesia', '167', '57', '2', '2', '0', 'baca buku', '-', 'TIDAK', '-', 'MTs Al Karomah Winong', '121340987668', 'jalan kedungdung no 110', 'banyuajuh', 'kamal', 'bangkalan', 'jawa timur', '62191', '3', '987689007658', 'DN Ma 15-097-1567', '098765456789032-00-87', 'Hamdan', 'MI 0987-9876 ed', 'SMP -01-ne-9876876', 'Hamdan', '778965431098765', '130541100127', 'APAT', '2017-04-10', 'L', 'Hamdan', '9877765678456743', '0898997609876', 'bangkalan', '1981-12-27', 'TNI', 'S1', '32000000', 'Halimah', '121340987654789', '089877663344', 'bangkalan', '1987-09-27', 'ibu rumah tangga', 'SMA', '8000000', 'Rohim', '987645677654', '081265433456', 'Bali', '1987-06-18', 'wiraswasta', 'S3', '19000000', NULL, NULL, NULL, 'public/profile/rQr1wxSsn0OyUgp8ELatpsljdFEwNn5Ey9konAkz.jpeg', 16, '2020-04-10 01:55:28', '2020-04-10 03:01:15'),
(5, 'Andi Nur Jianto', 'L', '9876547890432', '5678654438769', '5436789076547', 'lamongan', '2007-05-24', 'Jalan Parengan No 11', 'Romben Rana', 'Dungkek', 'Sumenep', 'Jawa Timur', '612137', '082133445566', 'Bahasa Indonesia', '171', '67', '1', '4', '0', 'sepak bola', '-', 'IYA\"', 'Tangan Kiri Patah', 'SMP Maduran Lamongan', '0987644578765', 'Jalan Maduran No 18', 'Maduran', 'Maduran', 'Lamongan', 'Maluku', '658832', '7', '0987654876765987', 'SD-9876-mi-9876789', 'MU-0O33456-A9', 'Barkah', 'MAD-9087-Uyt78654345', 'Mad-879FH-00987', 'Barkah', '77655483900263748', '130541100129', 'TKJ', '2017-07-25', 'L', 'Adam', '5364728373465', '089765437896', 'romben rana', '1978-04-27', 'wiraswasta', 'SMA', '7000000', 'Rumi', '5467389876453829456', '085127345764', 'Dungkek', '1981-09-18', 'rumah tangga', 'S2', '4000000', 'Ragil', '453678276453', '089877654433', 'Tangerang', '1987-06-27', 'Guru', 'S1', '5600000', '98765498765', '543678987654', '5436278987654', 'public/profile/2y6T1GdRem1MQx1TSL0wIOKd5CILfsnsFIktxjeR.jpeg', 17, '2020-04-10 03:06:48', '2020-04-10 05:44:04'),
(8, 'RIA', 'L', '88765432', '3303020420070001', '66098712', 'BANGKALAN', '-', '-', '-', '-', '-', '-', '-', '085204945546', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '98766166', '1305411', 'TKJ', '43922', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'belum', 20, '2020-04-10 20:31:32', '2020-04-10 20:31:32'),
(9, 'PUTRI ASIH ', 'P', '88765433', '3303020420070001', '66098713', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766167', '1305412', 'TKJ', '43923', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 21, '2020-04-10 20:31:32', '2020-04-10 20:31:32'),
(10, 'NAFIATUN NISA AMELIA', 'P', '88765434', '3303210820070001', '66098714', 'BANGKALAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766168', '1305413', 'TKJ', '43924', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 22, '2020-04-10 20:31:32', '2020-04-10 20:31:32'),
(11, 'RAFIQ', 'L', '88765435', '3303270320070002', '66098715', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766169', '1305414', 'TKJ', '43925', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 23, '2020-04-10 20:31:32', '2020-04-10 20:31:32'),
(12, 'ANIF HIDAYATULLOH', 'L', '88765436', '3303130420070003', '66098716', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766170', '1305415', 'APAT', '43926', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 24, '2020-04-10 20:31:32', '2020-04-10 20:31:32'),
(13, 'SANG FATMA ', 'P', '88765437', '3303270920070004', '66098717', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766171', '1305416', 'APAT', '43927', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 25, '2020-04-10 20:31:32', '2020-04-10 20:31:32'),
(14, 'RADIF MUNAWAR ', 'L', '88765438', '3303170920070002', '66098718', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766172', '1305417', 'APAT', '43928', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 26, '2020-04-10 20:31:32', '2020-04-10 20:31:32'),
(15, 'MUHAMAD ', 'L', '88765439', '3303130820070002', '66098719', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766173', '1305418', 'APAT', '43929', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 27, '2020-04-10 20:31:32', '2020-04-10 20:31:32'),
(16, 'PUJI RAHAYU', 'P', '88765440', '3303130720070002', '66098720', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766174', '1305419', 'TBM', '43930', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 28, '2020-04-10 20:31:32', '2020-04-10 20:31:32'),
(17, 'MUCHOLIMAH', 'P', '88765441', '3303140620070002', '66098721', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766175', '1305420', 'TBM', '43931', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 29, '2020-04-10 20:31:32', '2020-04-10 20:31:32'),
(18, 'PUJI LESTARI', 'P', '88765442', '3303150520070003', '66098722', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766176', '1305421', 'TBM', '43932', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 30, '2020-04-10 20:31:33', '2020-04-10 20:31:33'),
(19, 'HAYUN NISA', 'P', '88765443', '3303110920070004', '66098723', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766177', '1305422', 'TBM', '43933', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 31, '2020-04-10 20:31:33', '2020-04-10 20:31:33'),
(20, ' HUSEIN', 'L', '88765444', '3303120820070002', '66098724', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766178', '1305423', 'TKJ', '43568', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 32, '2020-04-10 20:31:33', '2020-04-10 20:31:33'),
(21, ' FAHRUR FAUZI', 'L', '88765445', '3303140720070003', '66098725', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766179', '1305424', 'TKJ', '43569', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 33, '2020-04-10 20:31:33', '2020-04-10 20:31:33'),
(22, 'MAHMUD', 'L', '88765446', '3303180620070003', '66098726', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766180', '1305425', 'TKJ', '43570', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 34, '2020-04-10 20:31:33', '2020-04-10 20:31:33'),
(23, 'Hilda Nathaniela', 'P', '88765447', '3303180620070004', '66098727', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766181', '1305426', 'TKJ', '43571', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 35, '2020-04-10 20:31:33', '2020-04-10 20:31:33'),
(24, 'Maulana Alif Anugrah ', 'P', '88765448', '3303180920070004', '66098728', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766182', '1305427', 'APAT', '43572', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 36, '2020-04-10 20:31:33', '2020-04-10 20:31:33'),
(25, 'Ckasinta Winda S ', 'P', '88765449', '3303140720070004', '66098729', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766183', '1305428', 'APAT', '43573', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 37, '2020-04-10 20:31:33', '2020-04-10 20:31:33'),
(26, 'Nadya Saphira Esfandiari ', 'P', '88765450', '3303120320070004', '66098730', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766184', '1305429', 'APAT', '43574', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 38, '2020-04-10 20:31:33', '2020-04-10 20:31:33'),
(27, 'Feggy Rizkiana', 'P', '88765451', '3303140720070004', '66098731', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766185', '1305430', 'APAT', '43575', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 39, '2020-04-10 20:31:33', '2020-04-10 20:31:33'),
(28, 'Herman ', 'L', '88765452', '3303180620070005', '66098732', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766186', '1305431', 'TBM', '43576', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 40, '2020-04-10 20:31:33', '2020-04-10 20:31:33'),
(29, 'Peter Sulaeman', 'L', '88765453', '3303180620070006', '66098733', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766187', '1305432', 'TBM', '43577', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 41, '2020-04-10 20:31:34', '2020-04-10 20:31:34'),
(30, 'Armelia Nur', 'P', '88765454', '3303180620070007', '66098734', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766188', '1305433', 'TBM', '43578', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 42, '2020-04-10 20:31:34', '2020-04-10 20:31:34'),
(31, 'Asyiffa  ', 'P', '88765455', '3303180620070008', '66098735', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766189', '1305434', 'TBM', '43579', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 43, '2020-04-10 20:31:34', '2020-04-10 20:31:34'),
(32, 'Arya Mahardika', 'P', '88765456', '3303180620070009', '66098736', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766190', '1305435', 'TKJ', '43215', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 44, '2020-04-10 20:31:34', '2020-04-10 20:31:34'),
(33, 'Ahmad', 'L', '88765457', '3303180620070010', '66098737', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766191', '1305436', 'TKJ', '43216', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 45, '2020-04-10 20:31:34', '2020-04-10 20:31:34'),
(34, 'fauzan naufal', 'L', '88765458', '3303180620070011', '66098738', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766192', '1305437', 'TKJ', '43217', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 46, '2020-04-10 20:31:34', '2020-04-10 20:31:34'),
(35, 'Renaya', 'P', '88765459', '3303180620070012', '66098739', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766193', '1305438', 'TKJ', '43218', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 47, '2020-04-10 20:31:34', '2020-04-10 20:31:34'),
(36, 'Sarasti ', 'P', '88765460', '3303180620070013', '66098740', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766194', '1305439', 'APAT', '43219', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 48, '2020-04-10 20:31:34', '2020-04-10 20:31:34'),
(37, 'Lucky', 'P', '88765461', '3303180620070014', '66098741', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766195', '1305440', 'APAT', '43220', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 49, '2020-04-10 20:31:34', '2020-04-10 20:31:34'),
(38, 'Wiratama', 'L', '88765462', '3303180620070015', '66098742', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766196', '1305441', 'APAT', '43221', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 50, '2020-04-10 20:31:34', '2020-04-10 20:31:34'),
(39, 'Suganda', 'L', '88765463', '3303180620070016', '66098743', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766197', '1305442', 'APAT', '43222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 51, '2020-04-10 20:31:34', '2020-04-10 20:31:34'),
(40, 'Gracia vini ', 'P', '88765464', '3303180620070017', '66098744', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766198', '1305443', 'TBM', '43223', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 52, '2020-04-10 20:31:34', '2020-04-10 20:31:34'),
(41, 'Yolanda Novitri', 'P', '88765465', '3303180620070018', '66098745', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766199', '1305444', 'TBM', '43224', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 53, '2020-04-10 20:31:35', '2020-04-10 20:31:35'),
(42, 'Setiawan ', 'L', '88765466', '3303180620070019', '66098746', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766200', '1305445', 'TBM', '43225', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 54, '2020-04-10 20:31:35', '2020-04-10 20:31:35'),
(43, 'Hazana Delfani ', 'P', '88765467', '3303180620070020', '66098747', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98766201', '1305446', 'TBM', '43226', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'belum', 55, '2020-04-10 20:31:35', '2020-04-10 20:31:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `pic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role_id`, `pic`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$30lK/suaQuzciFjc0Q.cjuByZWRybJhSYKID4ME8M5KwAOQgKI/J.', 1, 'belum', 'admin', NULL, NULL, NULL),
(2, 'Nor Rahman', '123', '$2y$10$Egurle5GhAj4bGPZ0A0D6uqpGs/xrWwaSdEAlmeEim/Pj4twoNXVC', 2, 'belum', 'ibnucholil', NULL, NULL, '2020-04-08 03:08:49'),
(3, 'Ria', '-', '$2y$10$Xx2DYnWbaPwB1rwfRfhqN.FgjlqDhGFf2ydCr56SVqNe4iw3lrmqC', 2, '-', 'ibnucholil', NULL, NULL, NULL),
(4, 'Buaddin Hasan', '200401', '$2y$10$jcVSlxeksdUQAtqaEa5d.Ouw.NWovyo74V.MKq2NTrTRH1.kY59wS', 4, 'belum', 'ibnucholil', NULL, NULL, NULL),
(5, 'Faradina Ayu Puspita Sari', '200402', '$2y$10$dicZYoDifqKfp/hGhFd1xueM7BqsypUUlDpQYr9/fmNCYC8WMTRgu', 4, 'belum', 'ibnucholil', NULL, NULL, NULL),
(6, 'Holis', '200403', '$2y$10$B3Pjth.dd8IdZ246mLuN9eFVkx8eSSYXGdf.3S.Jje4AVF4R7Dj5y', 4, 'belum', 'ibnucholil', NULL, NULL, NULL),
(7, 'Husnan', '200404', '$2y$10$VIFTOt/znAltn0vq0swuW.K7/yv5GgMdJozq86Y6MRBxpqAcNuoYu', 4, 'belum', 'ibnucholil', NULL, NULL, NULL),
(8, 'Mariatun', '200405', '$2y$10$RH.87Rne7OUkyxFiHcPdpuhxmF1cDZ9CWo/ksjscRCaKxB0.vgWfK', 4, 'belum', 'ibnucholil', NULL, NULL, NULL),
(9, 'Moh. Ismail', '200406', '$2y$10$IFJBM42L2xLYgYhi2vBs8.jzdaR3tmr2z9S6THC/l68vT7t1700o2', 4, 'belum', 'ibnucholil', NULL, NULL, NULL),
(10, 'Mohammad Salimun', '200407', '$2y$10$z78.oK2FyFQwyivUcuG35e70t7GRFH/HfODL8eDpaIYYUwGArbtLG', 4, 'belum', 'ibnucholil', NULL, NULL, NULL),
(11, 'Nurul Aini', '200408', '$2y$10$0FRbRX8mwQ5I63OJ2sia7uPPpa3CmkQ0/sCoii/6D8pKMRb29Nb/.', 4, 'belum', 'ibnucholil', NULL, NULL, NULL),
(12, 'Rahmad Gunawan', '200409', '$2y$10$3GLFR5qoRMsThy0qoZ9YC.agAaSEsn.A983m7xn41gUSg9uFOHlRi', 4, 'belum', 'ibnucholil', NULL, NULL, NULL),
(13, 'Sani', '200410', '$2y$10$7UWxsGEEezgvLq.CjcXOUeDf2xFOoPLVzYq6n2lPHrWGvavXXM2mm', 4, 'belum', 'ibnucholil', NULL, NULL, NULL),
(14, 'Sujono', '200411', '$2y$10$TntsVcXyyteeLrAr/vFzAuVFLbl.W7g3f4yKaeIA.iugv6YZltEn.', 4, 'belum', 'ibnucholil', NULL, NULL, NULL),
(15, 'Eka Fatikhul F', '130541100128', '$2y$10$WPgmI21mI8emODqRSc9JW.Dzw9y1Roy98f8CiWVE4KKaUqIdar5X6', 2, 'belum', 'ibnucholil', NULL, NULL, '2020-04-08 21:07:39'),
(16, 'Dwi Haryati Pratiwi', '130541100127', '$2y$10$bVJ3b2pbHPKYqutqzbH0jOaxvk0AqX08nkbBEq8pYYTcLOcUyjoNq', 2, 'belum', 'ibnucholil', NULL, NULL, '2020-04-10 02:01:00'),
(17, 'Andi Nur Jianto', '130541100129', '$2y$10$ZzUmt/hDsdjQocd7EMfRTuTKDdrLO2pVEGvpc4jKkiHpTVYOwwglm', 2, 'belum', 'ibnucholil', NULL, NULL, '2020-04-10 03:08:26'),
(20, 'RIA', '1305411', '$2y$10$T9Nxs79PMV3.zBzkn7okS.fkPDyyCiFv68P2wwiUDJ9VTcnj9bLi2', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(21, 'PUTRI ASIH ', '1305412', '$2y$10$NBkUK8rIlmw4YKMqJKcLNe3xmj9Pg2RKlSYIv6QiXBkktd9xtnLvW', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(22, 'NAFIATUN NISA AMELIA', '1305413', '$2y$10$3F6zeimTsbl/FuLkv8uE1Od5l7Kp8G8I8yCRPGNUP0KBGgswtYi12', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(23, 'RAFIQ', '1305414', '$2y$10$COWcSBjTN9QhdFW7ql7aDu2f1Eq51yG33hI14HohVDQgGaDTa09c.', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(24, 'ANIF HIDAYATULLOH', '1305415', '$2y$10$Io8EWmFIVGtLP5yl6D9GRu6zHVKAJEAzuvh3ciYYVBT4bG0LPQ59q', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(25, 'SANG FATMA ', '1305416', '$2y$10$QxHNsPL7Wn6LuUGK5fIjFue44XkG.BJkFvjq7Z3CHQovLiiEzIDXC', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(26, 'RADIF MUNAWAR ', '1305417', '$2y$10$u9A5MNGknRBwZvvaS1EGze4rdTl6t0khZ4pyZsiS1zL6EOZ.EcO5S', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(27, 'MUHAMAD ', '1305418', '$2y$10$EDP8aoxrO6G4t5BIjUKlSuY9KBSD7CM5qmDoyqkZkWAS2QrKpCuxC', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(28, 'PUJI RAHAYU', '1305419', '$2y$10$bJsM5/D2teRwOz3dHBzF2e399G.OvAf8pCTDgisLcRbN7pwT8Onsy', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(29, 'MUCHOLIMAH', '1305420', '$2y$10$AidaiuszbKZyhYgm1ad3bOpWIu7RoaSub9yF0LcoCf8tDDYU2y1tW', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(30, 'PUJI LESTARI', '1305421', '$2y$10$c8iQnZeSXWAP9YMsH4u1N.Ju1rDdDInABsKw0zWfmcn5Z4epa/BYm', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(31, 'HAYUN NISA', '1305422', '$2y$10$bRIRZk8urTC6hPJbGoGwvO5bOtYsysfEe0BBbOrTmctt3Ykib7CTm', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(32, ' HUSEIN', '1305423', '$2y$10$r2TawhtGiYM9JIdQQbnA0u8l98x9vvtwdpjKNq79RjSJpNcfIS8be', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(33, ' FAHRUR FAUZI', '1305424', '$2y$10$1rEz95flE1Xdiz02ebve.uEp65Lv24bze77.HWUZJrcC/H6CrcJ5y', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(34, 'MAHMUD', '1305425', '$2y$10$Z5R.rsBbt0x77Up/.w1VhuVnWRMt5BLbBQT0A6VzqI.33WuL2ke7a', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(35, 'Hilda Nathaniela', '1305426', '$2y$10$s3lquhouK0t6PCYFSe.xd.a5RzvlTN8mFlIC0mWW08Vs7AX67znDK', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(36, 'Maulana Alif Anugrah ', '1305427', '$2y$10$c0m5lbcLFyUZeKWE8b4Jcud2pp2yR5ZT6uEF/R4pAUyPPCXHyTNhi', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(37, 'Ckasinta Winda S ', '1305428', '$2y$10$worz1bzCB6ktR.4IzPX2suR.psZ1JSt3mq6abrUVEWad6o3trDcFC', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(38, 'Nadya Saphira Esfandiari ', '1305429', '$2y$10$MpbP9HELEZ9Sfe4mmbmvaugy2I0wJh6Z5vAeuETwOSYC89FfTONEy', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(39, 'Feggy Rizkiana', '1305430', '$2y$10$S1Les.Scpi.MJBfp1a6pYenN849j729X7MbP1hwZfIUUBnrf5ohhK', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(40, 'Herman ', '1305431', '$2y$10$co.3eFxKhDocGgz69FrmY.8SnolHbS1VpU07kBNy3.yyyFVhydJiS', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(41, 'Peter Sulaeman', '1305432', '$2y$10$kvrhK1KkwPRhw/07a4cVnuhYjqoQANupj4X1YM5X2yAMfPPBq7n6a', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(42, 'Armelia Nur', '1305433', '$2y$10$thd2z3T0Tmmv2W2wFvifx.XmqhvhmHb9ZNrv70Xo2KCJ55OZ.QCXK', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(43, 'Asyiffa  ', '1305434', '$2y$10$T2FVRmwujW0IoRugIOjtEuuRlQJiOrmsCWXEdcA4bVglyOc68FJE2', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(44, 'Arya Mahardika', '1305435', '$2y$10$uFysM6Xxpdbet9m0JEusROgGBDhONBh.Zv1N0mlP3dwvycXuf7CPi', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(45, 'Ahmad', '1305436', '$2y$10$.Ayz41866CGIr8pPJLmF8OE8gS9tl7pt4i6KUHgubK8KQA/KdJIo2', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(46, 'fauzan naufal', '1305437', '$2y$10$bJi57OuksOC1fuxBHY4pFOcA8J3.fCvFVtVWILsAa.9mMTlXMfBpW', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(47, 'Renaya', '1305438', '$2y$10$tcj04u6ohFAUvcCIyYgVRupMK6SbbUNjq1V2oOkfnDgBrw..IYWIq', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(48, 'Sarasti ', '1305439', '$2y$10$lH4eGvQV/GEmZcEWoyYIAOy0jYhpeQ89o6bsHq.7rSlxwg9zNDSPq', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(49, 'Lucky', '1305440', '$2y$10$VKpyIYh5q8F5wjY4f.VsWOv7cqmeTYooVPZqoUAFaw81ozWyK0CaK', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(50, 'Wiratama', '1305441', '$2y$10$bS1EnfHRq2Q6FzHY3uNPr.PRgy4lC5J/oSBec5baB5TiJ.nA/N9iS', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(51, 'Suganda', '1305442', '$2y$10$BW1C8FLpUagIz.vBAIiE0.qCYIXvd1oJ4G.5NJz6KY1M/e1k6eME6', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(52, 'Gracia vini ', '1305443', '$2y$10$FzxyWDed6hX4SbcYcJmeHeeWjpNyzn07O3xw.L1lg8TP6vnDKNzTa', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(53, 'Yolanda Novitri', '1305444', '$2y$10$re71hLw8XQQ4FHkB08C4TORHm7XhTq9U4q/4Ap6t1P.IOvpoOP0EW', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(54, 'Setiawan ', '1305445', '$2y$10$c9LuNa5TnLvobvgqWZO7Fed/r4droOAgMqjyBAA6v9g2Me7ioEsGy', 2, 'belum', 'ibnucholil', NULL, NULL, NULL),
(55, 'Hazana Delfani ', '1305446', '$2y$10$Y6iWBLrJgo22uekVQpltk.0j1fjTDLFYuE1glVN.NYJ/RoK8BW7b6', 2, 'belum', 'ibnucholil', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absens`
--
ALTER TABLE `absens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absens_krs_id_foreign` (`krs_id`);

--
-- Indeks untuk tabel `catatans`
--
ALTER TABLE `catatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catatans_krs_id_foreign` (`krs_id`);

--
-- Indeks untuk tabel `eskuls`
--
ALTER TABLE `eskuls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eskuls_krs_id_foreign` (`krs_id`);

--
-- Indeks untuk tabel `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gurus_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kd_mapels`
--
ALTER TABLE `kd_mapels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_mapels_mapel_id_foreign` (`mapel_id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_jurusan_id_foreign` (`jurusan_id`),
  ADD KEY `kelas_guru_id_foreign` (`guru_id`);

--
-- Indeks untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `krs_kelas_id_foreign` (`kelas_id`),
  ADD KEY `krs_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapels_jurusan_id_foreign` (`jurusan_id`),
  ADD KEY `mapels_kelas_id_foreign` (`kelas_id`),
  ADD KEY `mapels_guru_id_foreign` (`guru_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_keterampilans`
--
ALTER TABLE `nilai_keterampilans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_keterampilans_kelas_id_foreign` (`kelas_id`),
  ADD KEY `nilai_keterampilans_mapel_id_foreign` (`mapel_id`),
  ADD KEY `nilai_keterampilans_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `nilai_pengetahuans`
--
ALTER TABLE `nilai_pengetahuans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_pengetahuans_kelas_id_foreign` (`kelas_id`),
  ADD KEY `nilai_pengetahuans_mapel_id_foreign` (`mapel_id`),
  ADD KEY `nilai_pengetahuans_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `nilai_sikaps`
--
ALTER TABLE `nilai_sikaps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_sikaps_kelas_id_foreign` (`kelas_id`),
  ADD KEY `nilai_sikaps_mapel_id_foreign` (`mapel_id`),
  ADD KEY `nilai_sikaps_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `prakerins`
--
ALTER TABLE `prakerins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prakerins_krs_id_foreign` (`krs_id`);

--
-- Indeks untuk tabel `prestasis`
--
ALTER TABLE `prestasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prestasis_krs_id_foreign` (`krs_id`);

--
-- Indeks untuk tabel `p_bukti_tfs`
--
ALTER TABLE `p_bukti_tfs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_bukti_tfs_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absens`
--
ALTER TABLE `absens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `catatans`
--
ALTER TABLE `catatans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `eskuls`
--
ALTER TABLE `eskuls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kd_mapels`
--
ALTER TABLE `kd_mapels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `krs`
--
ALTER TABLE `krs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `nilai_keterampilans`
--
ALTER TABLE `nilai_keterampilans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `nilai_pengetahuans`
--
ALTER TABLE `nilai_pengetahuans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `nilai_sikaps`
--
ALTER TABLE `nilai_sikaps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `prakerins`
--
ALTER TABLE `prakerins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `prestasis`
--
ALTER TABLE `prestasis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `p_bukti_tfs`
--
ALTER TABLE `p_bukti_tfs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absens`
--
ALTER TABLE `absens`
  ADD CONSTRAINT `absens_krs_id_foreign` FOREIGN KEY (`krs_id`) REFERENCES `krs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `catatans`
--
ALTER TABLE `catatans`
  ADD CONSTRAINT `catatans_krs_id_foreign` FOREIGN KEY (`krs_id`) REFERENCES `krs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `eskuls`
--
ALTER TABLE `eskuls`
  ADD CONSTRAINT `eskuls_krs_id_foreign` FOREIGN KEY (`krs_id`) REFERENCES `krs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gurus`
--
ALTER TABLE `gurus`
  ADD CONSTRAINT `gurus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kd_mapels`
--
ALTER TABLE `kd_mapels`
  ADD CONSTRAINT `kd_mapels_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `krs_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mapels`
--
ALTER TABLE `mapels`
  ADD CONSTRAINT `mapels_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mapels_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mapels_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_keterampilans`
--
ALTER TABLE `nilai_keterampilans`
  ADD CONSTRAINT `nilai_keterampilans_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_keterampilans_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_keterampilans_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_pengetahuans`
--
ALTER TABLE `nilai_pengetahuans`
  ADD CONSTRAINT `nilai_pengetahuans_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_pengetahuans_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_pengetahuans_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_sikaps`
--
ALTER TABLE `nilai_sikaps`
  ADD CONSTRAINT `nilai_sikaps_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_sikaps_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_sikaps_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prakerins`
--
ALTER TABLE `prakerins`
  ADD CONSTRAINT `prakerins_krs_id_foreign` FOREIGN KEY (`krs_id`) REFERENCES `krs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prestasis`
--
ALTER TABLE `prestasis`
  ADD CONSTRAINT `prestasis_krs_id_foreign` FOREIGN KEY (`krs_id`) REFERENCES `krs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `p_bukti_tfs`
--
ALTER TABLE `p_bukti_tfs`
  ADD CONSTRAINT `p_bukti_tfs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
migrations