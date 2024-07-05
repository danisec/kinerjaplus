-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2024 at 01:15 PM
-- Server version: 8.0.33
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kinerja_plus`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` bigint UNSIGNED NOT NULL,
  `kode_alternatif` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_alternatif` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk_kerja` date NOT NULL,
  `nip` bigint NOT NULL,
  `jabatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `kode_alternatif`, `nama_alternatif`, `jenis_kelamin`, `tanggal_masuk_kerja`, `nip`, `jabatan`, `pendidikan`, `created_at`, `updated_at`) VALUES
(1, 'A1', 'Mary Wahyuningsih, S.Kom', 'Perempuan', '2001-07-01', 101001, 'Deputi 1', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(2, 'A2', 'Lucia Sutarni, S.Pd', 'Perempuan', '2004-07-01', 402002, 'Kepala Sekolah TK', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(3, 'A3', 'Irmina Sihura', 'Perempuan', '2005-07-01', 502003, 'Guru', 'D3', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(4, 'A4', 'Rita Sofiani', 'Perempuan', '2006-04-01', 604004, 'Tata Usaha', 'SMA', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(5, 'A5', 'Hendriette Aphrodite Naomi Angelique Salakory', 'Perempuan', '2006-07-01', 602005, 'Guru', 'PGTK', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(6, 'A6', 'Tiyas Wulandari, S.Psi', 'Perempuan', '2008-07-01', 802008, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(7, 'A7', 'Selamat, M.Pd', 'Laki-laki', '2009-07-01', 901009, 'Deputi 2', 'S2', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(8, 'A8', 'Tek Hok, S.Kom', 'Laki-laki', '2010-01-01', 1002016, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(9, 'A9', 'Leni Sihombing, S.Pd', 'Perempuan', '2010-07-01', 1002018, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(10, 'A10', 'Diyah Kartika S,S.H', 'Perempuan', '2011-07-01', 1102026, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(11, 'A11', 'Muddin Sidabalok, S.Pd', 'Laki-laki', '2011-07-01', 1102030, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(12, 'A12', 'Ninik Kristoermadiarsih, M.M', 'Perempuan', '2011-10-17', 1102035, 'Kepala Sekolah SD', 'S2', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(13, 'A13', 'Christina Puloraran', 'Perempuan', '2012-01-25', 1202040, 'Guru', 'PGTK', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(14, 'A14', 'Triyono, S.E, M.Div', 'Laki-laki', '2012-07-01', 1202043, 'Kerohanian', 'S2', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(15, 'A15', 'Tanasia. S.Th', 'Perempuan', '2012-07-01', 1202044, 'Guru', 'S2', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(16, 'A16', 'Lusiana Sele, S.Pd', 'Perempuan', '2012-07-01', 1202047, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(17, 'A17', 'Iria Kharisma Joseph, ST', 'Laki-laki', '2012-07-01', 1202049, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(18, 'A18', 'Lisa Julita Mokosandi, S.Th', 'Perempuan', '2013-07-01', 1302072, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(19, 'A19', 'Theresia Rusmiyati', 'Perempuan', '2013-07-01', 1302075, 'Guru', 'D3', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(20, 'A20', 'Elna Santosa Manuel', 'Perempuan', '2013-07-01', 1304077, 'Tata Usaha', 'SMA', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(21, 'A21', 'Yacobus Santana, S.Pd', 'Laki-laki', '2014-07-01', 1402085, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(22, 'A22', 'R.AB.Susi Hastono, S.E', 'Laki-laki', '2014-07-01', 1402087, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(23, 'A23', 'Marusaha Samosir, S.Pd', 'Laki-laki', '2014-07-01', 1402089, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(24, 'A24', 'Aprilliana Grace Wilma Thenu, S.Sos', 'Perempuan', '2014-07-01', 1402092, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(25, 'A25', 'Gani Praditja Sakti, S.Pd', 'Laki-laki', '2015-07-01', 1502101, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(26, 'A26', 'Fransisca X.Suharti, S.Pd', 'Laki-laki', '2015-07-01', 1502104, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(27, 'A27', 'Kristiani Dwi Nugrohowati Djatiningsih, S.E', 'Perempuan', '2015-10-01', 1502107, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(28, 'A28', 'Elisabeth, S.Pd', 'Perempuan', '2016-07-01', 1602108, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(29, 'A29', 'Sovia Nainggolan, M.Pd', 'Perempuan', '2016-07-01', 1602111, 'Kepala Sekolah SMP', 'S2', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(30, 'A30', 'Cornelius Wiwit, S.Pd', 'Laki-laki', '2016-07-01', 1602112, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(31, 'A31', 'Artha Maulina Rochendraty, S.Pd', 'Perempuan', '2016-07-01', 1602123, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(32, 'A32', 'Siti Limaria Silaban, S.Pd', 'Perempuan', '2016-07-01', 1602125, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(33, 'A33', 'Steven Evan Edifianto, S.Pd', 'Laki-laki', '2016-07-01', 1602126, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(34, 'A34', 'Delinda', 'Perempuan', '2016-07-01', 1604128, 'Tata Usaha', 'SMA', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(35, 'A35', 'Linda Tiur Mauly, M.M', 'Perempuan', '2017-07-01', 1702138, 'Guru', 'S2', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(36, 'A36', 'Jaka Winarta,M.Div', 'Laki-laki', '2017-07-01', 1702139, 'Kerohanian', 'S2', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(37, 'A37', 'Heri Prasetya, S.Pd', 'Laki-laki', '2018-07-01', 1802143, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(38, 'A38', 'Martha Septiningtyas, S.Pd, M.Hum.', 'Perempuan', '2018-07-01', 1802145, 'Guru', 'S2', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(39, 'A39', 'Pesta Maria Siburian, S.Pd', 'Perempuan', '2019-07-01', 1902151, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(40, 'A40', 'Ronica Sales Julianti Siahaan, S.Pd', 'Perempuan', '2019-07-01', 1902152, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(41, 'A41', 'Roslinah, S.Pd', 'Perempuan', '2019-07-01', 1902154, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(42, 'A42', 'Elvina Br. Manik, S.Pd', 'Perempuan', '2020-07-01', 2002161, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(43, 'A43', 'Rian Hendri Tupamahu, S.Pd', 'Laki-laki', '2020-07-01', 2002163, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(44, 'A44', 'Rachel Oktaviani Hutahaean, S.Pd', 'Perempuan', '2021-01-01', 2102164, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(45, 'A45', 'Prima Caesar, B.Ed, S.Pd.', 'Perempuan', '2020-07-01', 2102165, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(46, 'A46', 'Dhea Khanti Nathali', 'Perempuan', '2021-10-01', 2102166, 'Tata Usaha', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(47, 'A47', 'Jelda Febrina Sesfaot, S.Pd', 'Perempuan', '2021-01-01', 2102167, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(48, 'A48', 'Romi Poire Sihotang, S.Kom', 'Laki-laki', '2022-01-01', 2102168, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(49, 'A49', 'Sriningsih Hutabarat, S.Pd', 'Perempuan', '2023-07-01', 2307201, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(50, 'A50', 'Theresa Christina Yoel, S.Pd', 'Perempuan', '2023-07-01', 2307202, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(51, 'A51', 'Erni Maduma BR Marbun, S.Pd', 'Perempuan', '2023-07-01', 2307203, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(52, 'A52', 'Tanty Chandra Siregar, S.Pd', 'Perempuan', '2023-07-01', 2307204, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(53, 'A53', 'Agnes Paul, S.Pd', 'Perempuan', '2023-07-01', 2307205, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(54, 'A54', 'Missy Friska Margaretha', 'Perempuan', '2024-04-17', 2407209, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(55, 'A55', 'Andre Saputra Julianto', 'Laki-laki', '2024-04-22', 2407210, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(56, 'A56', 'Yeny Irawati', 'Perempuan', '2024-06-01', 2402211, 'Tata Usaha', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(57, 'A57', 'Ekam Sehari Manalu', 'Laki-laki', '2024-07-01', 2407212, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59'),
(58, 'A58', 'Odaligo Zega', 'Laki-laki', '2024-07-01', 2407213, 'Guru', 'S1', '2024-06-06 19:30:59', '2024-06-06 19:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `bobot_prioritas_alternatif`
--

CREATE TABLE `bobot_prioritas_alternatif` (
  `id_bobot_prioritas_alternatif` bigint UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kriteria` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_alternatif` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_prioritas` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bobot_prioritas_kriteria`
--

CREATE TABLE `bobot_prioritas_kriteria` (
  `id_bobot_prioritas_kriteria` bigint UNSIGNED NOT NULL,
  `id_kriteria` bigint UNSIGNED NOT NULL,
  `bobot_prioritas` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bobot_prioritas_kriteria`
--

INSERT INTO `bobot_prioritas_kriteria` (`id_bobot_prioritas_kriteria`, `id_kriteria`, `bobot_prioritas`, `created_at`, `updated_at`) VALUES
(1, 1, 0.65543333333333, '2024-05-30 21:00:12', '2024-05-30 21:00:12'),
(2, 2, 0.1867, '2024-05-30 21:00:12', '2024-05-30 21:00:12'),
(3, 3, 0.15773333333333, '2024-05-30 21:00:12', '2024-05-30 21:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `bobot_prioritas_subkriteria`
--

CREATE TABLE `bobot_prioritas_subkriteria` (
  `id_bobot_prioritas_subkriteria` bigint UNSIGNED NOT NULL,
  `kode_kriteria` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_prioritas` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catatan_karyawan`
--

CREATE TABLE `catatan_karyawan` (
  `id_catatan_karyawan` bigint UNSIGNED NOT NULL,
  `id_penilaian` bigint UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_karyawan`
--

CREATE TABLE `group_karyawan` (
  `id_group_karyawan` bigint UNSIGNED NOT NULL,
  `nama_group_karyawan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepala_sekolah` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_karyawan_detail`
--

CREATE TABLE `group_karyawan_detail` (
  `id_group_karyawan_detail` bigint UNSIGNED NOT NULL,
  `id_group_karyawan` bigint UNSIGNED NOT NULL,
  `kode_alternatif` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_penilaian`
--

CREATE TABLE `group_penilaian` (
  `id_group_penilaian` bigint UNSIGNED NOT NULL,
  `id_group_karyawan` bigint UNSIGNED NOT NULL,
  `alternatif_pertama` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_penilaian_detail`
--

CREATE TABLE `group_penilaian_detail` (
  `id_group_penilaian_detail` bigint UNSIGNED NOT NULL,
  `id_group_penilaian` bigint UNSIGNED NOT NULL,
  `alternatif_kedua` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indikator_subkriteria`
--

CREATE TABLE `indikator_subkriteria` (
  `id_indikator_subkriteria` bigint UNSIGNED NOT NULL,
  `kode_subkriteria` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `indikator_subkriteria` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indikator_subkriteria`
--

INSERT INTO `indikator_subkriteria` (`id_indikator_subkriteria`, `kode_subkriteria`, `indikator_subkriteria`, `created_at`, `updated_at`) VALUES
(1, 'SK1.1', 'Menjalankan nilai-nilai Alkitab.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(2, 'SK1.1', 'Melakukan tanggung jawab selaras dengan etika kerja dan aturan instansi.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(3, 'SK1.1', 'Menghadapi dan menyelesaikan konflik dengan tepat.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(4, 'SK1.2', 'Melaksanakan tugas dengan percaya diri dan penuh tanggung jawab.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(5, 'SK1.2', 'Mampu membagikan visi instansi kepada orang lain.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(6, 'SK1.2', 'Memberikan pertolongan bagi orang lain sesuai kemampuan yang dimiliki.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(7, 'SK1.2', 'Memberdayakan orang lain.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(8, 'SK1.3', 'Menghargai dan memperlakukan orang lain secara terhormat.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(9, 'SK1.3', 'Bekerja sama dengan orang lain, saling membantu satu sama lainnya dalam mewujudkan tujuan bersama.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(10, 'SK1.3', 'Memelihara ciptaan Tuhan, menjaga dan melestarikan lingkungan.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(11, 'SK2.1', 'Guru menyiapkan fisik dan psikis murid dengan menyapa dan memberi salam.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(12, 'SK2.2', 'Guru mengajukan pertanyaan pemantik yang menantang untuk memotivasi murid.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(13, 'SK2.3', 'Guru menyampaikan capaian pembelajaran dan tujuan pembelajaran yang akan dicapai.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(14, 'SK2.4', 'Guru menyampaikan topik materi ajar untuk mengarahkan siswa menjawab pertanyaan pemantik sesuai dengan tujuan pembelajaran.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(15, 'SK2.5', 'Guru melaksanakan pembelajaran yang kontekstual untuk menumbuhkan dan mengembangkan keterampilan, kebiasaan dan sikap positif sesuai dengan alokasi waktu yang direncanakan.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(16, 'SK2.5', 'Guru melaksanakan pembelajaran yang menumbuhkan partisipasi aktif murid dalam mengajukan pertanyaan.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(17, 'SK2.6', 'Melaksanakan pembelajaran yang mengasah kemampuan Creativity, Critical, Communication, Collaboration thinking (menumbuhkan KSE Murid).', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(18, 'SK2.7', 'Menciptakan suasana kelas yang kondusif untuk proses belajar mengajar (sesuai dengan kesepakatan kelas dan KSE).', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(19, 'SK2.7', 'Mengomunikasikan pesan bahwa guru percaya akan kemampuan semua murid untuk belajar dan berprestasi secara akademik.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(20, 'SK2.7', 'Melaksanakan praktik adaptasi pengajaran sebagai respon atas umpan balik dan respon murid terhadap kebutuhan belajarnya, dapat memberikan konten materi berbeda dalam capaian pembelajaran yang sama di beberapa kelompok (Diferensiasi Konten).', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(21, 'SK2.7', 'Menunjukkan keterampilan dalam penggunaan sumber belajar yang bervariasi dalam bentuk visual, Audio dan kinestetik (Diferensiasi Proses).', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(22, 'SK2.7', 'Menunjukkan keterampilan dalam penggunaan media pembelajaran.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(23, 'SK2.7', 'Guru dapat menggunakan bahasa lisan secara jelas dan dapat menggunakan bahasa tulis yang baik dan benar (komunikasi efektif).', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(24, 'SK2.8', 'Melakukan pengajaran yang mendorong keterampilan literasi dan numerasi murid.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(25, 'SK2.9', 'Memfasilitasi dan membimbing murid merangkum materi pelajaran. (refleksi)', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(26, 'SK3.1', 'Melaksanakan penilaian produk melalui proyek / hasil produk (Diferensiasi Produk).', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(27, 'SK3.2', 'RPP dan berkas administrasi yang lengkap dan memenuhi aspek sesuai ketentuan.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(28, 'SK3.2', 'Ketepatan waktu kehadiran dan penyerahan berkas.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(29, 'SK3.2', 'Keikutsertaan dalam kegiatan wajib di luar jam kerja.', '2024-05-30 10:25:51', '2024-05-30 10:25:51'),
(30, 'SK3.2', 'Kehadiran (presensi).', '2024-05-30 10:25:51', '2024-05-30 10:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` bigint UNSIGNED NOT NULL,
  `kode_kriteria` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kriteria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_kriteria` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `bobot_kriteria`, `created_at`, `updated_at`) VALUES
(1, 'K1', 'Kompetensi', 40, '2024-05-30 10:16:30', '2024-05-30 10:16:30'),
(2, 'K2', 'Keterampilan Mengelola Proses Belajar Mengajar', 40, '2024-05-30 10:16:30', '2024-05-30 10:16:30'),
(3, 'K3', 'Kepatuhan', 20, '2024-05-30 10:16:30', '2024-05-30 10:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_01_01_000001_create_password_reset_tokens_table', 1),
(2, '2024_01_01_000002_create_personal_access_tokens_table', 1),
(3, '2024_01_01_000003_create_jobs_table', 1),
(4, '2024_01_01_000004_create_failed_jobs_table', 1),
(5, '2024_01_01_000005_create_users_table', 2),
(6, '2024_01_01_000006_create_alternatif_table', 2),
(7, '2024_01_01_000007_create_fk_alternatif_table', 2),
(8, '2024_01_01_000008_create_kriteria_table', 2),
(9, '2024_01_01_000009_create_subkriteria_table', 2),
(10, '2024_01_01_000010_create_fk_subkriteria_table', 2),
(11, '2024_01_01_000011_create_indikator_sub_kriteria_table', 2),
(12, '2024_01_01_000012_create_fk_indikator_sub_kriteria_table', 2),
(13, '2024_01_01_000013_create_ratio_index_table', 2),
(14, '2024_01_01_000014_create_skala_indikator_table', 2),
(15, '2024_01_01_000015_create_skala_indikator_detail_table', 2),
(16, '2024_01_01_000016_create_fk_skala_indikator_table', 2),
(17, '2024_01_01_000017_create_nilai_skala_table', 2),
(18, '2024_01_01_000018_create_fk_skala_indikator_detail_table', 2),
(19, '2024_01_01_000019_create_group_karyawan_table', 2),
(20, '2024_01_01_000020_create_fk_group_karyawan', 2),
(21, '2024_01_01_000021_create_group_karyawan_detail_table', 2),
(22, '2024_01_01_000022_create_fk_group_karyawan_detail_table', 2),
(23, '2024_01_01_000023_create_group_penilaian', 2),
(24, '2024_01_01_000024_create_fk_group_penilaian', 2),
(25, '2024_01_01_000025_create_group_penilaian_detail', 2),
(26, '2024_01_01_000026_create_fk_group_penilaian_detail', 2),
(27, '2024_01_01_000027_create_penilaian_table', 2),
(28, '2024_01_01_000028_create_fk_penilaian_table', 2),
(29, '2024_01_01_000029_create_penilaian_indikator_table', 2),
(30, '2024_01_01_000030_create_fk_penilaian_indikator_table', 2),
(31, '2024_01_01_000031_create_catatan_karyawan_table', 2),
(32, '2024_01_01_000032_create_fk_catatan_karyawan_table', 2),
(33, '2024_01_01_000033_create_perhitungan_kriteria_table', 2),
(34, '2024_01_01_000034_create_fk_perhitungan_kriteria_table', 2),
(35, '2024_01_01_000035_create_bobot_prioritas_kriteria_table', 2),
(36, '2024_01_01_000036_create_fk_bobot_prioritas_kriteria_table', 2),
(37, '2024_01_01_000037_create_perhitungan_subkriteria_table', 2),
(38, '2024_01_01_000038_create_fk_perhitungan_subkriteria_table', 2),
(39, '2024_01_01_000039_create_bobot_prioritas_subkriteria_table', 2),
(40, '2024_01_01_000040_create_fk_bobot_prioritas_subkriteria_table', 2),
(41, '2024_01_01_000041_create_perhitungan_alternatif_table', 2),
(42, '2024_01_01_000042_create_fk_perhitungan_alternatif_table', 2),
(43, '2024_01_01_000043_create_bobot_prioritas_alternatif_table', 2),
(44, '2024_01_01_000044_create_fk_bobot_prioritas_alternatif_table', 2),
(45, '2024_01_01_000045_create_ranking_table', 2),
(46, '2024_01_01_000046_create_fk_ranking_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_skala`
--

CREATE TABLE `nilai_skala` (
  `id_nilai_skala` bigint UNSIGNED NOT NULL,
  `skala` enum('1','2','3','4') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_skala` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_skala`
--

INSERT INTO `nilai_skala` (`id_nilai_skala`, `skala`, `nilai_skala`, `created_at`, `updated_at`) VALUES
(1, '1', 70, '2024-05-30 12:30:10', '2024-05-30 12:30:10'),
(2, '2', 75, '2024-05-30 12:30:10', '2024-05-30 12:30:10'),
(3, '3', 85, '2024-05-30 12:30:10', '2024-05-30 12:30:10'),
(4, '4', 100, '2024-05-30 12:30:10', '2024-05-30 12:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` bigint UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternatif_pertama` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternatif_kedua` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Disetujui','Tidak Disetujui') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_indikator`
--

CREATE TABLE `penilaian_indikator` (
  `id_penilaian_indikator` bigint UNSIGNED NOT NULL,
  `id_penilaian` bigint UNSIGNED NOT NULL,
  `id_skala_indikator_detail` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan_alternatif`
--

CREATE TABLE `perhitungan_alternatif` (
  `id_perhitungan_alternatif` bigint UNSIGNED NOT NULL,
  `kode_kriteria` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternatif_pertama` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternatif_kedua` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_alternatif` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan_kriteria`
--

CREATE TABLE `perhitungan_kriteria` (
  `id_perhitungan_kriteria` bigint UNSIGNED NOT NULL,
  `kriteria_pertama` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kriteria_kedua` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_kriteria` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perhitungan_kriteria`
--

INSERT INTO `perhitungan_kriteria` (`id_perhitungan_kriteria`, `kriteria_pertama`, `kriteria_kedua`, `nilai_kriteria`, `created_at`, `updated_at`) VALUES
(1, 'K1', 'K1', 1, '2024-05-30 13:28:57', '2024-05-30 13:28:57'),
(2, 'K1', 'K2', 3, '2024-05-30 13:28:57', '2024-05-30 13:28:57'),
(3, 'K1', 'K3', 5, '2024-05-30 13:28:57', '2024-05-30 13:28:57'),
(4, 'K2', 'K1', 0.3333, '2024-05-30 13:28:57', '2024-05-30 13:28:57'),
(5, 'K2', 'K2', 1, '2024-05-30 13:28:57', '2024-05-30 13:28:57'),
(6, 'K2', 'K3', 1, '2024-05-30 13:28:57', '2024-05-30 13:28:57'),
(7, 'K3', 'K1', 0.2, '2024-05-30 13:28:57', '2024-05-30 13:28:57'),
(8, 'K3', 'K2', 1, '2024-05-30 13:28:57', '2024-05-30 13:28:57'),
(9, 'K3', 'K3', 1, '2024-05-30 13:28:57', '2024-05-30 13:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan_subkriteria`
--

CREATE TABLE `perhitungan_subkriteria` (
  `id_perhitungan_subkriteria` bigint UNSIGNED NOT NULL,
  `kode_kriteria` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subkriteria_pertama` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subkriteria_kedua` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_subkriteria` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perhitungan_subkriteria`
--

INSERT INTO `perhitungan_subkriteria` (`id_perhitungan_subkriteria`, `kode_kriteria`, `subkriteria_pertama`, `subkriteria_kedua`, `nilai_subkriteria`, `created_at`, `updated_at`) VALUES
(1, 'K1', 'SK1.1', 'SK1.1', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(2, 'K1', 'SK1.1', 'SK1.2', 5, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(3, 'K1', 'SK1.1', 'SK1.3', 5, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(4, 'K1', 'SK1.2', 'SK1.1', 0.2, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(5, 'K1', 'SK1.2', 'SK1.2', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(6, 'K1', 'SK1.2', 'SK1.3', 3, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(7, 'K1', 'SK1.3', 'SK1.1', 0.2, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(8, 'K1', 'SK1.3', 'SK1.2', 0.3333, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(9, 'K1', 'SK1.3', 'SK1.3', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(10, 'K2', 'SK2.1', 'SK2.1', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(11, 'K2', 'SK2.1', 'SK2.2', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(12, 'K2', 'SK2.1', 'SK2.3', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(13, 'K2', 'SK2.1', 'SK2.4', 5, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(14, 'K2', 'SK2.1', 'SK2.5', 5, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(15, 'K2', 'SK2.1', 'SK2.6', 7, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(16, 'K2', 'SK2.1', 'SK2.7', 5, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(17, 'K2', 'SK2.1', 'SK2.8', 5, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(18, 'K2', 'SK2.1', 'SK2.9', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(19, 'K2', 'SK2.2', 'SK2.1', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(20, 'K2', 'SK2.2', 'SK2.2', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(21, 'K2', 'SK2.2', 'SK2.3', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(22, 'K2', 'SK2.2', 'SK2.4', 3, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(23, 'K2', 'SK2.2', 'SK2.5', 3, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(24, 'K2', 'SK2.2', 'SK2.6', 5, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(25, 'K2', 'SK2.2', 'SK2.7', 3, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(26, 'K2', 'SK2.2', 'SK2.8', 3, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(27, 'K2', 'SK2.2', 'SK2.9', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(28, 'K2', 'SK2.3', 'SK2.1', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(29, 'K2', 'SK2.3', 'SK2.2', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(30, 'K2', 'SK2.3', 'SK2.3', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(31, 'K2', 'SK2.3', 'SK2.4', 5, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(32, 'K2', 'SK2.3', 'SK2.5', 5, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(33, 'K2', 'SK2.3', 'SK2.6', 5, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(34, 'K2', 'SK2.3', 'SK2.7', 3, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(35, 'K2', 'SK2.3', 'SK2.8', 3, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(36, 'K2', 'SK2.3', 'SK2.9', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(37, 'K2', 'SK2.4', 'SK2.1', 0.2, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(38, 'K2', 'SK2.4', 'SK2.2', 0.3333, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(39, 'K2', 'SK2.4', 'SK2.3', 0.2, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(40, 'K2', 'SK2.4', 'SK2.4', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(41, 'K2', 'SK2.4', 'SK2.5', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(42, 'K2', 'SK2.4', 'SK2.6', 3, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(43, 'K2', 'SK2.4', 'SK2.7', 3, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(44, 'K2', 'SK2.4', 'SK2.8', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(45, 'K2', 'SK2.4', 'SK2.9', 5, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(46, 'K2', 'SK2.5', 'SK2.1', 0.2, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(47, 'K2', 'SK2.5', 'SK2.2', 0.3333, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(48, 'K2', 'SK2.5', 'SK2.3', 0.2, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(49, 'K2', 'SK2.5', 'SK2.4', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(50, 'K2', 'SK2.5', 'SK2.5', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(51, 'K2', 'SK2.5', 'SK2.6', 3, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(52, 'K2', 'SK2.5', 'SK2.7', 5, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(53, 'K2', 'SK2.5', 'SK2.8', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(54, 'K2', 'SK2.5', 'SK2.9', 5, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(55, 'K2', 'SK2.6', 'SK2.1', 0.1429, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(56, 'K2', 'SK2.6', 'SK2.2', 0.2, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(57, 'K2', 'SK2.6', 'SK2.3', 0.2, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(58, 'K2', 'SK2.6', 'SK2.4', 0.3333, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(59, 'K2', 'SK2.6', 'SK2.5', 0.3333, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(60, 'K2', 'SK2.6', 'SK2.6', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(61, 'K2', 'SK2.6', 'SK2.7', 5, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(62, 'K2', 'SK2.6', 'SK2.8', 3, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(63, 'K2', 'SK2.6', 'SK2.9', 7, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(64, 'K2', 'SK2.7', 'SK2.1', 0.2, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(65, 'K2', 'SK2.7', 'SK2.2', 0.3333, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(66, 'K2', 'SK2.7', 'SK2.3', 0.3333, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(67, 'K2', 'SK2.7', 'SK2.4', 0.3333, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(68, 'K2', 'SK2.7', 'SK2.5', 0.2, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(69, 'K2', 'SK2.7', 'SK2.6', 0.2, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(70, 'K2', 'SK2.7', 'SK2.7', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(71, 'K2', 'SK2.7', 'SK2.8', 3, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(72, 'K2', 'SK2.7', 'SK2.9', 3, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(73, 'K2', 'SK2.8', 'SK2.1', 0.2, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(74, 'K2', 'SK2.8', 'SK2.2', 0.3333, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(75, 'K2', 'SK2.8', 'SK2.3', 0.3333, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(76, 'K2', 'SK2.8', 'SK2.4', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(77, 'K2', 'SK2.8', 'SK2.5', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(78, 'K2', 'SK2.8', 'SK2.6', 0.3333, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(79, 'K2', 'SK2.8', 'SK2.7', 0.3333, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(80, 'K2', 'SK2.8', 'SK2.8', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(81, 'K2', 'SK2.8', 'SK2.9', 5, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(82, 'K2', 'SK2.9', 'SK2.1', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(83, 'K2', 'SK2.9', 'SK2.2', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(84, 'K2', 'SK2.9', 'SK2.3', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(85, 'K2', 'SK2.9', 'SK2.4', 0.2, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(86, 'K2', 'SK2.9', 'SK2.5', 0.2, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(87, 'K2', 'SK2.9', 'SK2.6', 0.1429, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(88, 'K2', 'SK2.9', 'SK2.7', 0.3333, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(89, 'K2', 'SK2.9', 'SK2.8', 0.2, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(90, 'K2', 'SK2.9', 'SK2.9', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(91, 'K3', 'SK3.1', 'SK3.1', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(92, 'K3', 'SK3.1', 'SK3.2', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(93, 'K3', 'SK3.2', 'SK3.1', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43'),
(94, 'K3', 'SK3.2', 'SK3.2', 1, '2024-05-30 13:38:43', '2024-05-30 13:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id_ranking` bigint UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_alternatif` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` double NOT NULL,
  `rank` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratio_index`
--

CREATE TABLE `ratio_index` (
  `id_ratio_index` bigint UNSIGNED NOT NULL,
  `ordo_matriks` bigint UNSIGNED NOT NULL,
  `nilai_ratio_index` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratio_index`
--

INSERT INTO `ratio_index` (`id_ratio_index`, `ordo_matriks`, `nilai_ratio_index`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2024-05-30 13:16:27', '2024-05-30 13:16:27'),
(2, 2, 0, '2024-05-30 13:16:27', '2024-05-30 13:16:27'),
(3, 3, 0.58, '2024-05-30 13:16:27', '2024-05-30 13:16:27'),
(4, 4, 0.9, '2024-05-30 13:16:27', '2024-05-30 13:16:27'),
(5, 5, 1.12, '2024-05-30 13:16:27', '2024-05-30 13:16:27'),
(6, 6, 1.24, '2024-05-30 13:16:27', '2024-05-30 13:16:27'),
(7, 7, 1.32, '2024-05-30 13:16:27', '2024-05-30 13:16:27'),
(8, 8, 1.41, '2024-05-30 13:16:27', '2024-05-30 13:16:27'),
(9, 9, 1.45, '2024-05-30 13:16:27', '2024-05-30 13:16:27'),
(10, 10, 1.49, '2024-05-30 13:16:27', '2024-05-30 13:16:27'),
(11, 11, 1.51, '2024-05-30 13:16:27', '2024-05-30 13:16:27'),
(12, 12, 1.48, '2024-05-30 13:16:27', '2024-05-30 13:16:27'),
(13, 13, 1.56, '2024-05-30 13:16:27', '2024-05-30 13:16:27'),
(14, 14, 1.57, '2024-05-30 13:16:27', '2024-05-30 13:16:27'),
(15, 15, 1.59, '2024-05-30 13:16:27', '2024-05-30 13:16:27'),
(16, 16, 1.605, '2024-05-30 13:16:27', '2024-05-30 13:16:27'),
(17, 17, 1.61, '2024-05-30 13:16:27', '2024-05-30 13:16:27'),
(18, 18, 1.615, '2024-05-30 13:16:27', '2024-05-30 13:16:27'),
(19, 19, 1.62, '2024-05-30 13:16:27', '2024-05-30 13:16:27'),
(20, 20, 1.625, '2024-05-30 13:16:27', '2024-05-30 13:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `skala_indikator`
--

CREATE TABLE `skala_indikator` (
  `id_skala_indikator` bigint UNSIGNED NOT NULL,
  `id_indikator_subkriteria` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skala_indikator`
--

INSERT INTO `skala_indikator` (`id_skala_indikator`, `id_indikator_subkriteria`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(2, 2, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(3, 3, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(4, 4, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(5, 5, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(6, 6, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(7, 7, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(8, 8, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(9, 9, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(10, 10, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(11, 11, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(12, 12, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(13, 13, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(14, 14, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(15, 15, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(16, 16, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(17, 17, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(18, 18, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(19, 19, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(20, 20, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(21, 21, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(22, 22, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(23, 23, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(24, 24, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(25, 25, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(26, 26, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(27, 27, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(28, 28, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(29, 29, '2024-05-30 10:29:30', '2024-05-30 10:29:30'),
(30, 30, '2024-05-30 10:29:30', '2024-05-30 10:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `skala_indikator_detail`
--

CREATE TABLE `skala_indikator_detail` (
  `id_skala_indikator_detail` bigint UNSIGNED NOT NULL,
  `id_skala_indikator` bigint UNSIGNED NOT NULL,
  `skala` enum('1','2','3','4') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_skala` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skala_indikator_detail`
--

INSERT INTO `skala_indikator_detail` (`id_skala_indikator_detail`, `id_skala_indikator`, `skala`, `deskripsi_skala`, `created_at`, `updated_at`) VALUES
(2, 1, '1', 'Tidak mengakui kesalahan, menutupi informasi/kejadian. Melemparkan kesalahan/tanggung jawab kepada orang lain.', '2024-05-30 12:30:42', '2024-05-30 12:30:42'),
(3, 1, '2', 'Mengakui kesalahan karena terpaksa, bukan atas inisiatif sendiri; melibatkan pihak lain untuk ikut bertanggung jawab atas masalah.', '2024-05-30 12:30:42', '2024-05-30 12:30:42'),
(4, 1, '3', 'Jujur, mengakui kesalahan dengan segera, tidak menutupi informasi/ kejadian dan bersedia menanggung konsekuensi yang terjadi.', '2024-05-30 12:30:42', '2024-05-30 12:30:42'),
(5, 1, '4', 'Terbuka terhadap fakta, informasi, kejadian. Sangat minim melakukan kesalahan karena menjalankan nilai Alkitab dengan konsisten.', '2024-05-30 12:30:42', '2024-05-30 12:30:42'),
(6, 2, '1', 'Melakukan cara atau tindakan yang bertentangan dengan aturan instansi secara sengaja.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(7, 2, '2', 'Mengambil keputusan/bertindak berdasarkan suatu kejadian saja tanpa mengacu aturan/ prosedur instansi.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(8, 2, '3', 'Mengambil keputusan/bertindak sesuai dengan aturan/prosedur instansi dengan mempertimbangkan konteks.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(9, 2, '4', 'Mengambil keputusan sesuai aturan/prosedur instansi dengan mempertimbangkan konteks dan tanggung jawab serta nilai moral/etika.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(10, 3, '1', 'Menghindari konflik, tidak bersedia terlibat situasi/tanggung jawab yang berpotensi terjadi konflik. Meniadakan konflik, tidak mau menghadapinya.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(11, 3, '2', 'Membutuhkan bantuan solusi dan pendampingan dari atasan/rekan kerja untuk menyelesaikan konflik.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(12, 3, '3', 'Menghadapi pihak lain yang terlibat konflik dengan terbuka dan menemukan win-win solution meskipun masih memerlukan pendampingan/mediasi.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(13, 3, '4', 'Mampu memahami kepentingan pihak lain yang terlibat konflik, dan mampu menyelesaikan secara mandiri bersama pihak terkait selaras dengan nilai dan etika.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(14, 4, '1', 'Belum menunjukkan inisiatif dalam mengerjakan tugas, mengalami kesulitan memenuhi standar dan batas waktu yang ditetapkan.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(15, 4, '2', 'Ada insiatif untuk mengerjakan tugas dan mencari bantuan, namun membutuhkan pendampingan/\npengawasan agar selesai sesuai standar.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(16, 4, '3', 'Dapat menyelesaikan tugasnya dengan pengawasan yang minimal sesuai dengan standar dan batas waktu.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(17, 4, '4', 'Dapat menyelesaikan tugasnya dengan pengawasan yang minimal sesuai dengan standar dan batas waktu.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(18, 5, '1', 'Tidak mengetahui visi instansi.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(19, 5, '2', 'Dapat menyebutkan visi instansi namun belum mengenali penerapannya dalam lingkup tugas sehari-hari.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(20, 5, '3', 'Dapat menyampaikan visi instansi dengan kontekstual dalam kegiatan kerja sehari-hari.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(21, 5, '4', 'Memahami visi instansi dan mampu menerapkan secara komprehensif dalam pekerjaan sehari-hari.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(22, 6, '1', 'Enggan untuk memberikan pertolongan; bersedia memberikan bantuan terbatas saat ditugaskan oleh atasan.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(23, 6, '2', 'Bersedia memberikan bantuan apabila ada pihak yang meminta.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(24, 6, '3', 'Menunjukkan inisiatif untuk menawarkan bantuan kepada sesama rekan kerja maupun siswa.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(25, 6, '4', 'Proaktif untuk menawarkan bantuan dan mampu menyesuaikan bentuk/jenis bantuan bagi rekan kerja/siswa secara spesifik.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(26, 7, '1', 'Tidak memberikan kesempatan bagi siswa/rekan kerja untuk belajar/melakukan hal baru.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(27, 7, '2', 'Memberikan pendampingan/melatih siswa/rekan kerja dengan sporadis, untuk situasi tertentu.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(28, 7, '3', 'Mengenali minat/potensi rekan kerja/siswa dan memberikan kesempatan belajar melalui penugasan dan pendampingan.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(29, 7, '4', 'Mampu bertindak sebagai mentor bagi siswa/rekan melalui bantuan/pen dampingan terencana dalam kurun waktu tertentu.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(30, 8, '1', 'Bersikap berdasarkan suasana hati tanpa memperhatikan situasi, menunjukkan sikap/ tindakan berdasarkan status/golongan seseorang.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(31, 8, '2', 'Memberikan tanggapan dan bersikap seadanya, sebatas tuntutan yang menjadi aturan instansi.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(32, 8, '3', 'Dapat berinteraksi dengan orang lain sesuai situasi dengan memperhatikan sopan santun.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(33, 8, '4', 'Bertindak/ bercakap dengan menghargai dan peka terhadap keadaan orang lain serta mampu melakukan penyesuaian yang diperlukan.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(34, 9, '1', 'Menolak umpan balik yang diberikan oleh pihak lain.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(35, 9, '2', 'Menjalankan umpan balik apabila hal tersebut diwajibkan instansi atau mempengaruhi hasil kerja.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(36, 9, '3', 'Bersikap terbuka dan menghargai pendapat/ masukan orang lain serta menjalankan perbaikan berdasarkan hal tersebut.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(37, 9, '4', 'Proaktif mencari umpan balik/masukan terhadap hasil kerja maupun kegiatan yang dilakukan, terutama dari orang lain yang lebih ahli dalam bidang tsb dan bersedia menjalankannya.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(38, 10, '1', 'Melakukan tindakan/perbuatan yang membahayakan dan mengotori lingkungan.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(39, 10, '2', 'Menjaga kebersihan lingkungan yang berada langsung dalam lingkup kerjanya.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(40, 10, '3', 'Menjaga kebersihan area sekolah dan tempat tinggal serta memberikan cara-cara praktis bagi siswa dan rekan kerja untuk melakukan hal yang sama.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(41, 10, '4', 'Melakukan cara-cara yang terarah untuk mengedukasi siswa dan rekan kerja menjaga kelestarian lingkungan sekitar.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(42, 11, '1', 'Menyapa, memberi salam dan mengajak berdoa yang dipimpin oleh siswa.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(43, 11, '2', 'Menyapa, memberi salam, mengajak berdoa dan mengajukan beberapa pertanyaan berkaitan materi yang sudah dipelajari.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(44, 11, '3', 'Menyapa, memberi salam, mengajak berdoa dan mengajukan beberapa pertanyaan berkaitan materi yang sudah dipelajari dan menyampaikan rencana kegiatan pembelajaran yang akan dipelajari.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(45, 11, '4', 'Menyapa, memberi salam, mengajak berdoa dan mengajukan beberapa pertanyaan berkaitan materi yang sudah dipelajari dan menyampaikan rencana kegiatan pembelajaran yang akan dipelajari dengan menggunakan media kreatif.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(46, 12, '1', 'Mengajukan pertanyaan pemantik.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(47, 12, '2', 'Mengajukan pertanyaan pemantik yang menantang dan membangun motivasi siswa.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(48, 12, '3', 'Mengajukan pertanyaan pemantik yang menantang dan membangun motivasi siswa dan menyampaikan manfaat hal yang akan dipelajari dalam kehidupan sehari-hari.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(49, 12, '4', 'Mengajukan pertanyaan pemantik yang menantang, membangun motivasi siswa dan menyampaikan manfaat hal yang akan dipelajari dalam kehidupan sehari-hari dengan menggunakan media kreatif.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(50, 13, '1', 'Menyampaikan capaian dan tujuan pembelajaran.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(51, 13, '2', 'Menyampaikan capaian, tujuan pembelajaran dengan mengaitkan materi pembelajaran dengan materi sebelumnya.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(52, 13, '3', 'Menyampaikan capaian, tujuan pembelajaran dan mengaitkan materi pembelajaran dengan materi sebelumnya serta mampu mengarahkan siswa fokus pada materi yang diajarkan.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(53, 13, '4', 'Menyampaikan capaian, tujuan pembelajaran dan mengaitkan materi pembelajaran dengan materi sebelumnya serta mampu mengarahkan siswa fokus pada materi yang diajarkan dengan mengenal emosi siswa.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(54, 14, '1', 'Menyampaikan topik materi ajar dan pertanyaan pemantik.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(55, 14, '2', 'Menyampaikan topik materi ajar, pertanyaan pemantik, mencari jawaban pertanyaan pemantik dengan pengetahuan lain yang relevan, perkembangan IPTEK, budaya positif dan kehidupan nyata.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(56, 14, '3', 'Menyampaikan topik materi ajar, pertanyaan pemantik, mencari jawaban pertanyaan pemantik dengan pengetahuan lain yang relevan, perkembangan IPTEK, budaya positif dan kehidupan nyata dan menyajikan pembahasan materi pembelajaran yang tepat secara sistematis.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(57, 14, '4', 'Menyampaikan topik materi ajar, pertanyaan pemantik, mencari jawaban pertanyaan pemantik dengan pengetahuan lain yang relevan, perkembangan IPTEK, budaya positif dan kehidupan nyata dan menyajikan pembahasan materi pembelajaran yang tepat secara sistematis dengan menggunakan media kreatif.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(58, 15, '1', 'Melaksanakan pembelajaran sesuai dengan kompetensi yang akan dicapai.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(59, 15, '2', 'Melaksanakan pembelajaran sesuai dengan kompetensi yang akan dicapai dengan membentuk kelompok siswa berdasarkan kriteria gaya belajar.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(60, 15, '3', 'Melaksanakan pembelajaran sesuai dengan kompetensi yang akan dicapai dengan membentuk kelompok siswa berdasarkan kriteria gaya belajar yang menumbuhkan dan mengembangkan keterampilan, kebiasaan dan sikap positif.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(61, 15, '4', 'Melaksanakan pembelajaran sesuai dengan kompetensi yang akan dicapai dengan membentuk kelompok siswa berdasarkan kriteria gaya belajar yang menumbuhkan dan mengembangkan keterampilan, kebiasaan dan sikap positif, sesuai alokasi waktu yang direncanakan.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(62, 16, '1', 'melaksanakan pembelajaran yang menumbuhkan partisipasi aktif.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(63, 16, '2', 'Melaksanakan pembelajaran yang menumbuhkan partisipasi aktif dalam diskusi kelompok.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(64, 16, '3', 'Melaksanakan pembelajaran yang menumbuhkan partisipasi aktif dalam diskusi kelompok serta mempresentasikan hasil diskusi.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(65, 16, '4', 'Melaksanakan pembelajaran yang menumbuhkan partisipasi aktif dalam diskusi kelompok dan mempresentasikan hasil diskusi serta menghasilkan karya tulis/ produk.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(66, 17, '1', 'Melaksanakan pembelajaran yang mengasah kreatif dan kritis siswa.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(67, 17, '2', 'Melaksanakan pembelajaran yang mengasah kreativitas, menumbuhkan pemikiran yang kritis dan mampu mengomunikasikan materi yang didapat saat pembelajaran.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(68, 17, '3', 'Melaksanakan pembelajaran yang mengasah kreativitas, menumbuhkan pemikiran yang kritis, mengomunikasikan serta mampu berkolaborasi antar siswa sesuai materi yang didapat saat pembelajaran.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(69, 17, '4', 'Melaksanakan pembelajaran yang mengasah kreativitas, menumbuhkan pemikiran yang kritis, mengomunikasikan serta mampu berkolaborasi antar siswa sesuai materi yang didapat saat pembelajaran dengan menggunakan berbagai media belajar.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(70, 18, '1', 'Menciptakan suasana kelas yang kondusif untuk proses belajar mengajar.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(71, 18, '2', 'Menciptakan suasana kelas yang kondusif dengan menerapkan prinsip disiplin positif untuk proses belajar mengajar.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(72, 18, '3', 'Menciptakan suasana kelas yang kondusif dengan menerapkan prinsip disiplin positif untuk membentuk perilaku adaptif yang telah disepakati dalam proses belajar mengajar.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(73, 18, '4', 'Menciptakan suasana kelas yang kondusif dengan menerapkan prinsip disiplin positif untuk membentuk perilaku adaptif yang telah disepakati dan menuliskan komitmen kelas dalam proses belajar mengajar.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(74, 19, '1', 'Mengomunikasikan pesan bahwa guru percaya akan kemampuan semua murid untuk belajar dan berprestasi secara akademik.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(75, 19, '2', 'Mengomunikasikan pesan bahwa guru percaya akan kemampuan semua murid untuk belajar, member I perhatian dan bantuan ekstra sesuai kebutuhan belajar setiap siswa.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(76, 19, '3', 'Mengomunikasikan pesan bahwa guru percaya akan kemampuan semua murid untuk belajar, memberi perhatian, bantuan ekstra, melakukan evaluasi dan motivasi sesuai kebutuhan belajar.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(77, 19, '4', 'Mengomunikasikan pesan bahwa guru percaya akan kemampuan semua murid untuk belajar, memberi perhatian, bantuan ekstra, melakukan evaluasi dan motivasi sesuai kebutuhan belajar setiap dan membuat rubrik prestasi belajar.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(78, 20, '1', 'melaksanakan praktik adaptasi pengajaran sebagai respon atas umpan balik dan respon murid terhadap kebutuhan belajarnya.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(79, 20, '2', 'Melaksanakan praktik adaptasi pengajaran sebagai respon atas umpan balik terhadap kebutuhan belajarnya dan memberi konten materi berbeda dalam capaian pembelajaran yang sama.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(80, 20, '3', 'Melaksanakan praktik adaptasi pengajaran sebagai respon atas umpan balik dan respon murid terhadap kebutuhan belajarnya dan member konten materi berbeda dalam capaian pembelajaran yang sama di beberapa kelompok yang berbeda dan mampu menerapkan serta berkolaborasi dalam memaknai materi ajar.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(81, 20, '4', 'Melaksanakan praktik adaptasi pengajaran sebagai respon atas umpan balik dan respon murid terhadap kebutuhan belajarnya dan member konten materi berbeda dalam capaian pembelajaran yang sama di beberapa kelompok yang berbeda dan mampu menerapka serta berkolaborasi dalam memaknai materi ajar dalam setiap pembelajaran.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(82, 21, '1', 'Menunjukkan keterampilan dalam penggunaan sumber belajar yang bervariasi.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(83, 21, '2', 'Menunjukkan keterampilan dalam penggunaan sumber belajar, media yang bervariasi yaitu visual dan audio.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(84, 21, '3', 'Menunjukkan keterampilan dalam penggunaan sumber belajar, media yang bervariasi yaitu visual, Audio dan kinestetik.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(85, 21, '4', 'Menunjukkan keterampilan dalam penggunaan sumber belajar, media yang bervariasi yaitu visual, Audio dan kinestetik yang menarik.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(86, 22, '1', 'Membawa alat peraga dalam kelas.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(87, 22, '2', 'Membawa alat peraga dalam kelas dan menggunakannya saat pembelajaran.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(88, 22, '3', 'Membawa alat peraga dalam kelas dan menggunakannya saat pembelajaran serta melibatkan siswa dalam menggunakan alat tersebut.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(89, 22, '4', 'Membawa alat peraga dalam kelas, menggunakannya saat pembelajaran dan melibatkan siswa dalam menggunakan alat tersebut serta dapat membuat alat peraga sendiri.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(90, 23, '1', 'Dapat menggunakan bahasa lisan secara jelas dan lancar.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(91, 23, '2', 'Dapat menggunakan bahasa lisan secara jelas, lancar dan menggunakan Bahasa tulis yang baik dan benar.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(92, 23, '3', 'Dapat menggunakan bahasa lisan secara jelas, lancar dan menggunakan Bahasa tulis yang baik dan benar serta memberi motivasi untuk menerapkan bahasa lisan, tulisan yang baik dan benar.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(93, 23, '4', 'Dapat menggunakan bahasa lisan secara jelas, lancar dan menggunakan bahasa tulis yang baik dan benar serta memberi motivasi untuk menerapkan bahasa lisan, tulisan yang baik dan benar dengan membuat satu contoh karya tulis.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(94, 24, '1', 'Melakukan pengajaran yang mendorong keterampilan literasi murid.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(95, 24, '2', 'Melakukan pengajaran yang mendorong keterampilan literasi dan numerasi murid.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(96, 24, '3', 'Melakukan pengajaran yang mendorong keterampilan literasi, numerasi dan mendorong siswa untuk membuat proyek hasil karya literasi.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(97, 24, '4', 'Melakukan pengajaran dan menerapkan keterampilan literasi, dengan melakukan PTK.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(98, 25, '1', 'Memfasilitasi dan membimbing murid merangkum materi pelajaran dalam bentuk penugasan.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(99, 25, '2', 'Memfasilitasi dan membimbing murid merangkum materi dalam bentuk penugasan terstruktur.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(100, 25, '3', 'Memfasilitasi dan membimbing murid merangkum materi dalam bentuk penugasan terstruktur untuk meningkatkan pengetahuan, keterampilan mengajar.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(101, 25, '4', 'Memfasilitasi dan membimbing murid merangkum materi dalam bentuk penugasan terstruktur untuk meningkatkan pengetahuan, keterampilan mengajar, evaluasi dengan memberikan angket penilaian teman sejawat.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(102, 26, '1', 'Melaksanakan penilaian produk melalui proyek / hasil produk.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(103, 26, '2', 'Melaksanakan penilaian produk melalui proyek / hasil produk dan melaksanakan penilaian pengetahuan melalui tes formatif.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(104, 26, '3', 'Melaksanakan penilaian produk melalui proyek / hasil produk, melaksanakan penilaian pengetahuan melalui tes formatif serta penilaian sikap.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(105, 26, '4', 'Melaksanakan penilaian produk melalui proyek / hasil produk, melaksanakan penilaian pengetahuan melalui tes formatif serta penilaian sikap yang disajikan dengan rubrik penilaian.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(106, 27, '1', 'Dibawah 75%.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(107, 27, '2', '75% sampai 85%.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(108, 27, '3', '85% sampai dengan 95%.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(109, 27, '4', 'Lebih dari 95%.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(110, 28, '1', 'Dibawah 75%.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(111, 28, '2', '75% sampai 85%.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(112, 28, '3', '85% sampai dengan 95%.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(113, 28, '4', 'Lebih dari 95%.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(114, 29, '1', 'Dibawah 75%.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(115, 29, '2', '75% sampai 85%.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(116, 29, '3', '85% sampai dengan 95%.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(117, 29, '4', 'Lebih dari 95%.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(118, 30, '1', 'Dibawah 75%.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(119, 30, '2', '75% sampai 85%.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(120, 30, '3', '85% sampai dengan 95%.', '2024-05-30 13:01:46', '2024-05-30 13:01:46'),
(121, 30, '4', 'Lebih dari 95%.', '2024-05-30 13:01:46', '2024-05-30 13:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` bigint UNSIGNED NOT NULL,
  `kode_kriteria` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_subkriteria` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_subkriteria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_subkriteria` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bobot_subkriteria` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `kode_kriteria`, `kode_subkriteria`, `nama_subkriteria`, `deskripsi_subkriteria`, `bobot_subkriteria`, `created_at`, `updated_at`) VALUES
(1, 'K1', 'SK1.1', 'Spiritualitas dan Integritas', NULL, 20, '2024-05-30 10:22:37', '2024-05-30 10:22:37'),
(2, 'K1', 'SK1.2', 'Kepemimpinan dan Keteladanan dalam tanggung jawab kerja', NULL, 10, '2024-05-30 10:22:37', '2024-05-30 10:22:37'),
(3, 'K1', 'SK1.3', 'Keterampilan Interpersonal', NULL, 10, '2024-05-30 10:22:37', '2024-05-30 10:22:37'),
(4, 'K2', 'SK2.1', 'Orientasi', NULL, 3, '2024-05-30 10:22:37', '2024-05-30 10:22:37'),
(5, 'K2', 'SK2.2', 'Motivasi', NULL, 3, '2024-05-30 10:22:37', '2024-05-30 10:22:37'),
(6, 'K2', 'SK2.3', 'Apersepsi', NULL, 3, '2024-05-30 10:22:37', '2024-05-30 10:22:37'),
(7, 'K2', 'SK2.4', 'Penguasaan materi pembelajaran', NULL, 5, '2024-05-30 10:22:37', '2024-05-30 10:22:37'),
(8, 'K2', 'SK2.5', 'Penerapan strategi pembelajaran yang mendidik', NULL, 5, '2024-05-30 10:22:37', '2024-05-30 10:22:37'),
(9, 'K2', 'SK2.6', 'Aktivitas Pembelajaran HOTS dan Kecakapan Abad 21 (4C)', NULL, 10, '2024-05-30 10:22:37', '2024-05-30 10:22:37'),
(10, 'K2', 'SK2.7', 'Manajemen Kelas', NULL, 3, '2024-05-30 10:22:37', '2024-05-30 10:22:37'),
(11, 'K2', 'SK2.8', 'Pembelajaran Literasi Dan Numerasi', NULL, 5, '2024-05-30 10:22:37', '2024-05-30 10:22:37'),
(12, 'K2', 'SK2.9', 'Proses rangkuman, refleksi, dan tindak lanjut', NULL, 3, '2024-05-30 10:22:37', '2024-05-30 10:22:37'),
(13, 'K3', 'SK3.1', 'Pelaksanaan Penilaian Hasil Belajar', NULL, 10, '2024-05-30 10:22:37', '2024-05-30 10:22:37'),
(14, 'K3', 'SK3.2', 'Kepatuhan terhadap Proses Kerja yang berlaku', NULL, 10, '2024-05-30 10:22:37', '2024-05-30 10:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$WFfzYwXdQ60KnYqAKOmUKepWymcFdc54sZnEDA224GaeLw5u2a3/a', 0, NULL, '2024-06-06 12:10:39', '2024-06-06 12:10:39', NULL),
(2, 'Mary Wahyuningsih, S.Kom', 'mary', 'marywahyuningsih@gmail.com', NULL, '$2y$10$ZSUqsuciKFZYc228tXY3V.zZgkJuDporuwLfRO0XGQL.XUBMZapsy', 2, NULL, '2024-06-06 12:10:39', '2024-06-06 12:10:39', NULL),
(3, 'Lucia Sutarni, S.Pd', 'lucia', 'luciasutarni@gmail.com', NULL, '$2y$10$d2V24.OROVH/ekQd2mwvyeu27pNLn8bkoaV66PrNS8KrJmPXSf1Je', 3, NULL, '2024-06-06 12:10:39', '2024-06-06 12:10:39', NULL),
(4, 'Irmina Sihura', 'irmina', 'irminasihura@gmail.com', NULL, '$2y$10$2oQiSIAFr9YaxW1dPczPKuXxhgX5vHcyl90XKC1E2Lr0FSSQh6Rba', 4, NULL, '2024-06-06 12:10:40', '2024-06-06 12:10:40', NULL),
(5, 'Rita Sofiani', 'rita', 'ritasofiani@gmail.com', NULL, '$2y$10$C4GBM0cj6us/9t0tJIopoOPMZRCo4Bh50wuQKMhZtqcrdkGjnPyFy', 7, NULL, '2024-06-06 12:10:40', '2024-06-06 12:10:40', NULL),
(6, 'Hendriette Aphrodite Naomi Angelique Salakory', 'hendriette', 'hendriette@gmail.com', NULL, '$2y$10$bAHLy0n0Pdco389KetJQWe8uHFyuN85Z7pIOMuN4r.bK./C3akrVe', 4, NULL, '2024-06-06 12:10:40', '2024-06-06 12:10:40', NULL),
(7, 'Tiyas Wulandari, S.Psi', 'tiyas', 'tiyaswulandari@gmail.com', NULL, '$2y$10$RMViEPBBJaQHaaBuYL.xreGN5AnjSJLW3Up0TSFr1RiROLGTcbnfq', 4, NULL, '2024-06-06 12:10:40', '2024-06-06 12:10:40', NULL),
(8, 'Selamat, M.Pd', 'selamat', 'selamat@gmail.com', NULL, '$2y$10$GWDxKEamIMol8/QEmzE1p.s8R1Fha9zeyDmCnFB0PgC/0wb2/7U52', 2, NULL, '2024-06-06 12:10:40', '2024-06-06 12:10:40', NULL),
(9, 'Tek Hok, S.Kom', 'tekhok', 'tekhok@gmail.com', NULL, '$2y$10$L9QieHhn7Hr0DyCxzjJbsuWZiTmTmYzuKvGw4A6.tLMVlUtFZ8psG', 4, NULL, '2024-06-06 12:10:40', '2024-06-06 12:10:40', NULL),
(10, 'Leni Sihombing, S.Pd', 'leni', 'lenisihombing@gmail.com', NULL, '$2y$10$hJFcjO0nex9rtij1KFSvN.ivReU/j3sXo30.eCwUDCxuNb9cCGmOu', 4, NULL, '2024-06-06 12:10:40', '2024-06-06 12:10:40', NULL),
(11, 'Diyah Kartika S,S.H', 'diyah', 'diyahkartika@gmail.com', NULL, '$2y$10$OH9RXcI8JWLgcv/oQdMR0e3V9v7vc/cwPUdLpQeW/8FFody8ZkJBO', 4, NULL, '2024-06-06 12:10:40', '2024-06-06 12:10:40', NULL),
(12, 'Muddin Sidabalok, S.Pd', 'muddin', 'muddinsidabalok@gmail.com', NULL, '$2y$10$UGwqpFtTUzOKk6hRYArZV.HPh8zypT0NkpHGBIAErnwqlB2C4bN/y', 4, NULL, '2024-06-06 12:10:40', '2024-06-06 12:10:40', NULL),
(13, 'Ninik Kristoermadiarsih, M.M', 'ninik', 'ninikkristoermadiarsih@gmail.com', NULL, '$2y$10$4AhRr2CTWQmcRxhMoUvavuSr1mj7IGosvD1C2KHpaHwSAZPb/n9DW', 3, NULL, '2024-06-06 12:10:40', '2024-06-06 12:10:40', NULL),
(14, 'Christina Puloraran', 'christina', 'christinapuloraran@gmail.com', NULL, '$2y$10$X3kyedTlaJeA.facFivDc.abxa9GqPOO41jU.t1xUdFRXKiGcWIRC', 4, NULL, '2024-06-06 12:10:40', '2024-06-06 12:10:40', NULL),
(15, 'Triyono, S.E, M.Div', 'triyono', 'triyono@gmail.com', NULL, '$2y$10$MABjpF5d6yMnC04o8Vl4gOuu2WZj3okQ9Fvof9Xbh838hb7zlYQOi', 9, NULL, '2024-06-06 12:10:40', '2024-06-06 18:53:00', NULL),
(16, 'Tanasia. S.Th', 'tanasia', 'tanasia@gmail.com', NULL, '$2y$10$3jMLyuIlW.I8hb54tf7lKeZZCrhzdqAl0r/cFdjEm66jjzWK3Bw86', 4, NULL, '2024-06-06 12:10:40', '2024-06-06 12:10:40', NULL),
(17, 'Lusiana Sele, S.Pd', 'lusiana', 'lusiana@gmail.com', NULL, '$2y$10$gH/2o0dd9E0IbTpGBFDgZeDFrMJjp5oAI2PZFB0xHNvu1YwhTs26i', 4, NULL, '2024-06-06 12:10:40', '2024-06-06 12:10:40', NULL),
(18, 'Iria Kharisma Joseph, ST', 'iria', 'iriakharismajoseph@gmail.com', NULL, '$2y$10$/yAZROJUgFrST2b4K5tSk.jMxfSf2W1kl3ej5GHv6LCY4x5Jl7cXa', 4, NULL, '2024-06-06 12:10:40', '2024-06-06 12:10:40', NULL),
(19, 'Lisa Julita Mokosandi, S.Th', 'lisa', 'lisajulitamokosandi@gmail.com', NULL, '$2y$10$taCKfbaPxM7j5moLtHaBz.jFkW6unrqncVruuC5sb4eGh6UNpQpwO', 4, NULL, '2024-06-06 12:10:40', '2024-06-06 12:10:40', NULL),
(20, 'Theresia Rusmiyati', 'theresia', 'theresia@gmail.com', NULL, '$2y$10$m1/Sb.FZm4zeq2LWUnre/.FsKoR/Z2ubVjdeljTM3rm.kRtwH5D42', 4, NULL, '2024-06-06 12:10:40', '2024-06-06 12:10:40', NULL),
(21, 'Elna Santosa Manuel', 'elna', 'elna@gmail.com', NULL, '$2y$10$kIQmVG27lYN5W2MP5.ZpreJzJkgfW37J5ZR3cf1dancyCOuSDBwVa', 7, NULL, '2024-06-06 12:10:40', '2024-06-06 12:10:40', NULL),
(22, 'Yacobus Santana, S.Pd', 'yacobus', 'yacobussantana@gmail.com', NULL, '$2y$10$8p5SvnYFgGJbqsKZLugLyON7MEiF34GFeR96aKuzZDbP/nrwzmEGG', 4, NULL, '2024-06-06 12:10:40', '2024-06-06 12:10:40', NULL),
(23, 'R.AB.Susi Hastono, S.E', 'susi', 'susihastono@gmail.com', NULL, '$2y$10$WP3GWTKfs8ldD4Y8Mdckf.tZe6dyaFv1ccOSxIGXmNGNuJtbwrmj.', 4, NULL, '2024-06-06 12:10:40', '2024-06-06 12:10:40', NULL),
(24, 'Marusaha Samosir, S.Pd', 'marusaha', 'marusahasamosir@gmail.com', NULL, '$2y$10$vvkShWwlPPwjI1XyKCQosuuhkvNznUgFoWGJPZ4Twf2S8oLUMxuMe', 4, NULL, '2024-06-06 12:10:41', '2024-06-06 12:10:41', NULL),
(25, 'Aprilliana Grace Wilma Thenu, S.Sos', 'aprilliana', 'aprillianagrace@gmail.com', NULL, '$2y$10$hYVQB6bU4MqudJdWMUuXmOKhHA1S.tQl2XECW3wGjpUf/nWICpBYi', 4, NULL, '2024-06-06 12:10:41', '2024-06-06 12:10:41', NULL),
(26, 'Gani Praditja Sakti, S.Pd', 'gani', 'ganipraditjasakti@gmail.com', NULL, '$2y$10$YEkBlz3hQwzsYstIhVsM7.E3EiB9vYzTw6JMrYbRsdSCubaROiOwy', 4, NULL, '2024-06-06 12:10:41', '2024-06-06 12:10:41', NULL),
(27, 'Fransisca X.Suharti, S.Pd', 'fransisca', 'fransisca@gmail.com', NULL, '$2y$10$/Nvp1/6pcmXrgkSt9O1cmOz4EJ551w64Jd3KPRvZ0LQ1SlTUb7yPC', 4, NULL, '2024-06-06 12:10:41', '2024-06-06 12:10:41', NULL),
(28, 'Kristiani Dwi Nugrohowati Djatiningsih, S.E', 'kristiana', 'kristiana@gmail.com', NULL, '$2y$10$4nxgy3inhTm3m2bGHyznceh3oMwED3fHbqPyaSd6AhhMYE9XsyWYu', 4, NULL, '2024-06-06 12:10:41', '2024-06-06 12:10:41', NULL),
(29, 'Elisabeth, S.Pd', 'elisabeth', 'elisabeth@gmail.com', NULL, '$2y$10$Vr2QQptHawCGe6Zs5IvtQuRIOpE4Smu6TAPMGAOOwqhzo26RFpS4m', 4, NULL, '2024-06-06 12:10:41', '2024-06-06 12:10:41', NULL),
(30, 'Sovia Nainggolan, M.Pd', 'sovia', 'sovianainggolan@gmail.com', NULL, '$2y$10$.Icx4Y8p0NE0Jt3XM56dqeF5GOAmmO1as64PQdP0LxT7enB93Yn0u', 3, NULL, '2024-06-06 12:10:41', '2024-06-06 12:10:41', NULL),
(31, 'Cornelius Wiwit, S.Pd', 'cornelius', 'corneliuswiwit@gmail.com', NULL, '$2y$10$R9nfaTxgPjBM6BCV/epMZOnj3c2WSGzJks14.xBSYOCHqghsRdZ/i', 4, NULL, '2024-06-06 12:10:41', '2024-06-06 12:10:41', NULL),
(32, 'Artha Maulina Rochendraty, S.Pd', 'artha', 'arthamaulina@gmail.com', NULL, '$2y$10$dNnIrUsz/SECb3yLwIDKo.FvtNfBJ1vqwjbndEgUMd34oF0QFLGbC', 4, NULL, '2024-06-06 12:10:41', '2024-06-06 12:10:41', NULL),
(33, 'Siti Limaria Silaban, S.Pd', 'siti', 'sitilimariasilaban@gmail.com', NULL, '$2y$10$sfeIpPm6y70/JWU8nnuC8u6Oj98oM6S8Ba0/jX3u20bONZGn.S9gm', 4, NULL, '2024-06-06 12:10:41', '2024-06-06 12:10:41', NULL),
(34, 'Steven Evan Edifianto, S.Pd', 'stevan', 'stevanevanedifianto@gmail.com', NULL, '$2y$10$qQnnBBDC5AMEph3jEiTV2uoxBqWBHt6P.r4/rWJ2KfBqFIHWTvlOC', 4, NULL, '2024-06-06 12:10:41', '2024-06-06 12:10:41', NULL),
(35, 'Delinda', 'delinda', 'delinda@gmail.com', NULL, '$2y$10$1p5dTKP6wDEbf4n1bMoAA.q1qJy.0oBOBqc6fnSWhtdaQQk0en6eC', 7, NULL, '2024-06-06 12:10:41', '2024-06-06 12:10:41', NULL),
(36, 'Linda Tiur Mauly, M.M', 'linda', 'lindatiurmauly@gmail.com', NULL, '$2y$10$T6Rx5i4G5NgBYaNONXjrmO5m9DTfWgolBn.P3RFpQednUcTKfayYy', 4, NULL, '2024-06-06 12:10:41', '2024-06-06 12:10:41', NULL),
(37, 'Jaka Winarta,M.Div', 'jaka', 'jakawinarta@gmail.com', NULL, '$2y$10$pEqwgWL3XbPuttU6DF5ZiuAEA8NtjDkZtXC5IX.W6ko9L4LlBp6ye', 10, NULL, '2024-06-06 12:10:41', '2024-06-06 12:10:41', NULL),
(38, 'Heri Prasetya, S.Pd', 'heri', 'heriprasetya@gmail.com', NULL, '$2y$10$rnwTnfzfC0pd4kqzO1a6aumW1I0LH78ttv24LZUWVMwAxSo0B/tW2', 4, NULL, '2024-06-06 12:10:41', '2024-06-06 12:10:41', NULL),
(39, 'Martha Septiningtyas, S.Pd, M.Hum.', 'martha', 'marthaseptiningtyas@gmail.com', NULL, '$2y$10$W.ypxn5GtHuhKgYP/AmFqeIVvfZ.ODFhfDl55E0OqDM/PIp8NokMS', 4, NULL, '2024-06-06 12:10:41', '2024-06-06 12:10:41', NULL),
(40, 'Pesta Maria Siburian, S.Pd', 'pesta', 'pestamariasiburian@gmail.com', NULL, '$2y$10$yzkcaMftcSzLwZXoZU2bbexiFHOC1AVPM.WS1s0A4ZWJstgMhGpom', 4, NULL, '2024-06-06 12:10:41', '2024-06-06 12:10:41', NULL),
(41, 'Ronica Sales Julianti Siahaan, S.Pd', 'ronica', 'ronicasales@gmail.com', NULL, '$2y$10$THCkjx7oteHrE8Gfdnl/Ne1J9kxmFefo/zOPQv1aOuS6ePG9FM6F.', 4, NULL, '2024-06-06 12:10:41', '2024-06-06 12:10:41', NULL),
(42, 'Roslinah, S.Pd', 'roslinah', 'roslinah@gmail.com', NULL, '$2y$10$z4jZ2lJyBkQu/uutZdKZieuINsKrYHVdlxX6ZSgd/cpkBB9JXQ8ZG', 4, NULL, '2024-06-06 12:10:41', '2024-06-06 12:10:41', NULL),
(43, 'Elvina Br. Manik, S.Pd', 'elvina', 'elvina@gmail.com', NULL, '$2y$10$FB7ZuHWicQTf1dEqxvmU.u4KdupJS/BMn92kRKaMooWDWJ9mWb5/e', 4, NULL, '2024-06-06 12:10:42', '2024-06-06 12:10:42', NULL),
(44, 'Rian Hendri Tupamahu, S.Pd', 'rian', 'rianhendritupamahu@gmail.com', NULL, '$2y$10$k7Jy6VBO/BhgNjKh.zBMzuwstTjxB7B6qbsZewKcM3tIzWPgNGeG2', 4, NULL, '2024-06-06 12:10:42', '2024-06-06 12:10:42', NULL),
(45, 'Rachel Oktaviani Hutahaean, S.Pd', 'rachel', 'racheloktavianihutahaean@gmail.com', NULL, '$2y$10$M6KD1eylyXBjHE5Br6/iweN3LanQZkJwtB2nAE2TW4cYSR2BGi0IC', 4, NULL, '2024-06-06 12:10:42', '2024-06-06 12:10:42', NULL),
(46, 'Prima Caesar, B.Ed, S.Pd.', 'prima', 'primacaesar@gmail.com', NULL, '$2y$10$RwOXJ98Hze0Uoe.S.avC4.cxyC0dd1tDQS3JxrCKjja0kEDHDYIWO', 4, NULL, '2024-06-06 12:10:42', '2024-06-06 12:10:42', NULL),
(47, 'Dhea Khanti Nathali', 'dhea', 'dheakhantinathali@gmail.com', NULL, '$2y$10$hCsqCkxadrXfirh9.VErFeauKabtUaZG/wxN/YmyQyQnSuXr7gebq', 7, NULL, '2024-06-06 12:10:42', '2024-06-06 12:10:42', NULL),
(48, 'Jelda Febrina Sesfaot, S.Pd', 'jelda', 'jeldafebrinasesfaoti@gmail.com', NULL, '$2y$10$mgV3LZ66dcNE8ay/ERoRPeasWEu8Ty9yWSd/Hpoz8sGKJJSS6FqdC', 4, NULL, '2024-06-06 12:10:42', '2024-06-06 12:10:42', NULL),
(49, 'Romi Poire Sihotang, S.Kom', 'romi', 'romipoiresihotang@gmail.com', NULL, '$2y$10$O4TwbAYE4bJ1SG/GrIwpOerUv4.P70xp.ORj.EgrZldQgsIE2ePES', 4, NULL, '2024-06-06 12:10:42', '2024-06-06 12:10:42', NULL),
(50, 'Sriningsih Hutabarat, S.Pd', 'sriningsih', 'sriningsihhutabarat@gmail.com', NULL, '$2y$10$MqCFxV.WQXPH727egV/KROn3Bf2wedzQ/IY5icKG4f8mMIi2bxu.S', 4, NULL, '2024-06-06 12:10:42', '2024-06-06 12:10:42', NULL),
(51, 'Theresa Christina Yoel, S.Pd', 'theresa', 'theresachristinayoel@gmail.com', NULL, '$2y$10$u1dxZlAjvdUu7tce3i5Eqex2o9h2nSgr7zDufFXcom1eLWfEvKqIa', 4, NULL, '2024-06-06 12:10:42', '2024-06-06 12:10:42', NULL),
(52, 'Erni Maduma BR Marbun, S.Pd', 'erni', 'ernimaduma@gmail.com', NULL, '$2y$10$wmelZpcY294wOK4kD7lAwOZ4in3Y.lRtfXOhrWldIpF45tYj5rBbC', 4, NULL, '2024-06-06 12:10:42', '2024-06-06 12:10:42', NULL),
(53, 'Tanty Chandra Siregar, S.Pd', 'tanty', 'tantychandrasiregar@gmail.com', NULL, '$2y$10$0BSAKqKb4DzxHshM/rClye9RuBQrylOw5u3iGENxRhpTel93umibq', 4, NULL, '2024-06-06 12:10:42', '2024-06-06 12:10:42', NULL),
(54, 'Agnes Paul, S.Pd', 'agnes', 'agnespaul@gmail.com', NULL, '$2y$10$HjcMvbTNYjbJdctMQHWal.3ppa..mqP1LanyYzfKQB5b4Yl0Ysc0u', 4, NULL, '2024-06-06 12:10:42', '2024-06-06 12:10:42', NULL),
(55, 'Missy Friska Margaretha', 'missy', 'missyfriskamargaretha@gmail.com', NULL, '$2y$10$EpeElCPcZUm3ejQuagLe/uBbDwZ2xuZ22iGgwxDnIeRxnOcgdTyty', 4, NULL, '2024-06-06 12:10:42', '2024-06-06 12:10:42', NULL),
(56, 'Andre Saputra Julianto', 'andre', 'andresaputrajulianto@gmail.com', NULL, '$2y$10$fQjU9zTub1ok3HsGq4JjsOJ5hrKgIQFOzCATeVWaK5evlLgrKdAKu', 4, NULL, '2024-06-06 12:10:42', '2024-06-06 12:10:42', NULL),
(57, 'Yeny Irawati', 'yeny', 'yenyirawati@gmail.com', NULL, '$2y$10$l/IMtSnBLXleZC3KFoCpzeJDR0vSjHXp6V0E0Ah0bC.Ce0PezM0he', 7, NULL, '2024-06-06 12:10:42', '2024-06-06 12:10:42', NULL),
(58, 'Ekam Sehari Manalu', 'ekam', 'ekamseharimanalu@gmail.com', NULL, '$2y$10$MJwEFGLSYROZ.ATHmsa/1OMQDOY.GS2mzFOL3.mGOYhEjfPsQy7yq', 4, NULL, '2024-06-06 12:10:42', '2024-06-06 12:10:42', NULL),
(59, 'Odaligo Zega', 'odaligo', 'odaligozega@gmail.com', NULL, '$2y$10$yRG3nE/QBu5DMEQNP7bdC.qqoliHpCQCBCd/FVjH6nVLOw0ADMBGi', 4, NULL, '2024-06-06 12:10:42', '2024-06-06 12:10:42', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
  ADD KEY `alternatif_kode_alternatif_index` (`kode_alternatif`),
  ADD KEY `fk_nama_alternatif_alternatif_fullname_users` (`nama_alternatif`);

--
-- Indexes for table `bobot_prioritas_alternatif`
--
ALTER TABLE `bobot_prioritas_alternatif`
  ADD PRIMARY KEY (`id_bobot_prioritas_alternatif`),
  ADD KEY `fk_bobot_prioritas_alternatif_kriteria` (`kode_kriteria`),
  ADD KEY `fk_bobot_prioritas_alternatif_alternatif` (`kode_alternatif`);

--
-- Indexes for table `bobot_prioritas_kriteria`
--
ALTER TABLE `bobot_prioritas_kriteria`
  ADD PRIMARY KEY (`id_bobot_prioritas_kriteria`),
  ADD KEY `fk_bobot_prioritas_kriteria_kriteria` (`id_kriteria`);

--
-- Indexes for table `bobot_prioritas_subkriteria`
--
ALTER TABLE `bobot_prioritas_subkriteria`
  ADD PRIMARY KEY (`id_bobot_prioritas_subkriteria`),
  ADD KEY `fk_bobot_prioritas_subkriteria_kriteria` (`kode_kriteria`);

--
-- Indexes for table `catatan_karyawan`
--
ALTER TABLE `catatan_karyawan`
  ADD PRIMARY KEY (`id_catatan_karyawan`),
  ADD KEY `fk_id_penilaian_penilaian` (`id_penilaian`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `group_karyawan`
--
ALTER TABLE `group_karyawan`
  ADD PRIMARY KEY (`id_group_karyawan`),
  ADD KEY `fk_kepala_sekolah_alternatif` (`kepala_sekolah`);

--
-- Indexes for table `group_karyawan_detail`
--
ALTER TABLE `group_karyawan_detail`
  ADD PRIMARY KEY (`id_group_karyawan_detail`),
  ADD KEY `fk_id_group_karyawan_group_karyawan` (`id_group_karyawan`),
  ADD KEY `fk_kode_alternatif_group_karyawan` (`kode_alternatif`);

--
-- Indexes for table `group_penilaian`
--
ALTER TABLE `group_penilaian`
  ADD PRIMARY KEY (`id_group_penilaian`),
  ADD KEY `fk_id_group_karyawan_group_penilaian_group_karyawan` (`id_group_karyawan`),
  ADD KEY `fk_alternatif_pertama_alternatif` (`alternatif_pertama`);

--
-- Indexes for table `group_penilaian_detail`
--
ALTER TABLE `group_penilaian_detail`
  ADD PRIMARY KEY (`id_group_penilaian_detail`),
  ADD KEY `fk_id_group_penilaian_penilaian` (`id_group_penilaian`),
  ADD KEY `fk_alternatif_kedua_alternatif` (`alternatif_kedua`);

--
-- Indexes for table `indikator_subkriteria`
--
ALTER TABLE `indikator_subkriteria`
  ADD PRIMARY KEY (`id_indikator_subkriteria`),
  ADD KEY `fk_indikator_subkriteria_kode_subkriteria` (`kode_subkriteria`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `kriteria_kode_kriteria_index` (`kode_kriteria`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_skala`
--
ALTER TABLE `nilai_skala`
  ADD PRIMARY KEY (`id_nilai_skala`),
  ADD KEY `nilai_skala_skala_index` (`skala`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `fk_alternatif_pertama_group_penilaian` (`alternatif_pertama`),
  ADD KEY `fk_alternatif_kedua_group_penilaian` (`alternatif_kedua`);

--
-- Indexes for table `penilaian_indikator`
--
ALTER TABLE `penilaian_indikator`
  ADD PRIMARY KEY (`id_penilaian_indikator`),
  ADD KEY `fk_penilaian_id_penilaian_penilaian_id_penilaian` (`id_penilaian`),
  ADD KEY `fk_penilaian_id_skala_indikator_detail` (`id_skala_indikator_detail`);

--
-- Indexes for table `perhitungan_alternatif`
--
ALTER TABLE `perhitungan_alternatif`
  ADD PRIMARY KEY (`id_perhitungan_alternatif`),
  ADD KEY `fk_perhitungan_alternatif_kode_kriteria` (`kode_kriteria`),
  ADD KEY `fk_perhitungan_alternatif_alternatif_pertama` (`alternatif_pertama`),
  ADD KEY `fk_perhitungan_alternatif_alternatif_kedua` (`alternatif_kedua`);

--
-- Indexes for table `perhitungan_kriteria`
--
ALTER TABLE `perhitungan_kriteria`
  ADD PRIMARY KEY (`id_perhitungan_kriteria`),
  ADD KEY `fk_perhitungan_kriteria_kriteria_pertama` (`kriteria_pertama`),
  ADD KEY `fk_perhitungan_kriteria_kriteria_kedua` (`kriteria_kedua`);

--
-- Indexes for table `perhitungan_subkriteria`
--
ALTER TABLE `perhitungan_subkriteria`
  ADD PRIMARY KEY (`id_perhitungan_subkriteria`),
  ADD KEY `fk_perhitungan_subkriteria_kode_kriteria` (`kode_kriteria`),
  ADD KEY `fk_perhitungan_subkriteria_subkriteria_pertama` (`subkriteria_pertama`),
  ADD KEY `fk_perhitungan_subkriteria_subkriteria_kedua` (`subkriteria_kedua`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_ranking`),
  ADD KEY `fk_kode_alternatif_ranking_group_penilaian` (`kode_alternatif`);

--
-- Indexes for table `ratio_index`
--
ALTER TABLE `ratio_index`
  ADD PRIMARY KEY (`id_ratio_index`);

--
-- Indexes for table `skala_indikator`
--
ALTER TABLE `skala_indikator`
  ADD PRIMARY KEY (`id_skala_indikator`),
  ADD KEY `fk_skala_indikator_id_indikator_subkriteria` (`id_indikator_subkriteria`);

--
-- Indexes for table `skala_indikator_detail`
--
ALTER TABLE `skala_indikator_detail`
  ADD PRIMARY KEY (`id_skala_indikator_detail`),
  ADD KEY `skala_indikator_detail_skala_index` (`skala`),
  ADD KEY `fk_skala_indikator_detail_id_skala_indikator` (`id_skala_indikator`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `subkriteria_kode_subkriteria_index` (`kode_subkriteria`),
  ADD KEY `fk_subkriteria_kode_kriteria` (`kode_kriteria`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_fullname_index` (`fullname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `bobot_prioritas_alternatif`
--
ALTER TABLE `bobot_prioritas_alternatif`
  MODIFY `id_bobot_prioritas_alternatif` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bobot_prioritas_kriteria`
--
ALTER TABLE `bobot_prioritas_kriteria`
  MODIFY `id_bobot_prioritas_kriteria` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bobot_prioritas_subkriteria`
--
ALTER TABLE `bobot_prioritas_subkriteria`
  MODIFY `id_bobot_prioritas_subkriteria` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catatan_karyawan`
--
ALTER TABLE `catatan_karyawan`
  MODIFY `id_catatan_karyawan` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_karyawan`
--
ALTER TABLE `group_karyawan`
  MODIFY `id_group_karyawan` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_karyawan_detail`
--
ALTER TABLE `group_karyawan_detail`
  MODIFY `id_group_karyawan_detail` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_penilaian`
--
ALTER TABLE `group_penilaian`
  MODIFY `id_group_penilaian` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_penilaian_detail`
--
ALTER TABLE `group_penilaian_detail`
  MODIFY `id_group_penilaian_detail` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indikator_subkriteria`
--
ALTER TABLE `indikator_subkriteria`
  MODIFY `id_indikator_subkriteria` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `nilai_skala`
--
ALTER TABLE `nilai_skala`
  MODIFY `id_nilai_skala` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaian_indikator`
--
ALTER TABLE `penilaian_indikator`
  MODIFY `id_penilaian_indikator` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perhitungan_alternatif`
--
ALTER TABLE `perhitungan_alternatif`
  MODIFY `id_perhitungan_alternatif` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perhitungan_kriteria`
--
ALTER TABLE `perhitungan_kriteria`
  MODIFY `id_perhitungan_kriteria` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `perhitungan_subkriteria`
--
ALTER TABLE `perhitungan_subkriteria`
  MODIFY `id_perhitungan_subkriteria` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id_ranking` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratio_index`
--
ALTER TABLE `ratio_index`
  MODIFY `id_ratio_index` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `skala_indikator`
--
ALTER TABLE `skala_indikator`
  MODIFY `id_skala_indikator` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `skala_indikator_detail`
--
ALTER TABLE `skala_indikator_detail`
  MODIFY `id_skala_indikator_detail` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `fk_nama_alternatif_alternatif_fullname_users` FOREIGN KEY (`nama_alternatif`) REFERENCES `users` (`fullname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bobot_prioritas_alternatif`
--
ALTER TABLE `bobot_prioritas_alternatif`
  ADD CONSTRAINT `fk_bobot_prioritas_alternatif_alternatif` FOREIGN KEY (`kode_alternatif`) REFERENCES `alternatif` (`kode_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bobot_prioritas_alternatif_kriteria` FOREIGN KEY (`kode_kriteria`) REFERENCES `kriteria` (`kode_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bobot_prioritas_kriteria`
--
ALTER TABLE `bobot_prioritas_kriteria`
  ADD CONSTRAINT `fk_bobot_prioritas_kriteria_kriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bobot_prioritas_subkriteria`
--
ALTER TABLE `bobot_prioritas_subkriteria`
  ADD CONSTRAINT `fk_bobot_prioritas_subkriteria_kriteria` FOREIGN KEY (`kode_kriteria`) REFERENCES `kriteria` (`kode_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `catatan_karyawan`
--
ALTER TABLE `catatan_karyawan`
  ADD CONSTRAINT `fk_id_penilaian_penilaian` FOREIGN KEY (`id_penilaian`) REFERENCES `penilaian` (`id_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_karyawan`
--
ALTER TABLE `group_karyawan`
  ADD CONSTRAINT `fk_kepala_sekolah_alternatif` FOREIGN KEY (`kepala_sekolah`) REFERENCES `alternatif` (`kode_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_karyawan_detail`
--
ALTER TABLE `group_karyawan_detail`
  ADD CONSTRAINT `fk_id_group_karyawan_group_karyawan` FOREIGN KEY (`id_group_karyawan`) REFERENCES `group_karyawan` (`id_group_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_alternatif_group_karyawan` FOREIGN KEY (`kode_alternatif`) REFERENCES `alternatif` (`kode_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_penilaian`
--
ALTER TABLE `group_penilaian`
  ADD CONSTRAINT `fk_alternatif_pertama_alternatif` FOREIGN KEY (`alternatif_pertama`) REFERENCES `alternatif` (`kode_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_group_karyawan_group_penilaian_group_karyawan` FOREIGN KEY (`id_group_karyawan`) REFERENCES `group_karyawan` (`id_group_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_penilaian_detail`
--
ALTER TABLE `group_penilaian_detail`
  ADD CONSTRAINT `fk_alternatif_kedua_alternatif` FOREIGN KEY (`alternatif_kedua`) REFERENCES `alternatif` (`kode_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_group_penilaian_penilaian` FOREIGN KEY (`id_group_penilaian`) REFERENCES `group_penilaian` (`id_group_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `indikator_subkriteria`
--
ALTER TABLE `indikator_subkriteria`
  ADD CONSTRAINT `fk_indikator_subkriteria_kode_subkriteria` FOREIGN KEY (`kode_subkriteria`) REFERENCES `subkriteria` (`kode_subkriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `fk_alternatif_kedua_group_penilaian` FOREIGN KEY (`alternatif_kedua`) REFERENCES `group_penilaian` (`alternatif_pertama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alternatif_pertama_group_penilaian` FOREIGN KEY (`alternatif_pertama`) REFERENCES `group_penilaian` (`alternatif_pertama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian_indikator`
--
ALTER TABLE `penilaian_indikator`
  ADD CONSTRAINT `fk_penilaian_id_penilaian_penilaian_id_penilaian` FOREIGN KEY (`id_penilaian`) REFERENCES `penilaian` (`id_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_penilaian_id_skala_indikator_detail` FOREIGN KEY (`id_skala_indikator_detail`) REFERENCES `skala_indikator_detail` (`id_skala_indikator_detail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perhitungan_alternatif`
--
ALTER TABLE `perhitungan_alternatif`
  ADD CONSTRAINT `fk_perhitungan_alternatif_alternatif_kedua` FOREIGN KEY (`alternatif_kedua`) REFERENCES `group_penilaian` (`alternatif_pertama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_perhitungan_alternatif_alternatif_pertama` FOREIGN KEY (`alternatif_pertama`) REFERENCES `group_penilaian` (`alternatif_pertama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_perhitungan_alternatif_kode_kriteria` FOREIGN KEY (`kode_kriteria`) REFERENCES `kriteria` (`kode_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perhitungan_kriteria`
--
ALTER TABLE `perhitungan_kriteria`
  ADD CONSTRAINT `fk_perhitungan_kriteria_kriteria_kedua` FOREIGN KEY (`kriteria_kedua`) REFERENCES `kriteria` (`kode_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_perhitungan_kriteria_kriteria_pertama` FOREIGN KEY (`kriteria_pertama`) REFERENCES `kriteria` (`kode_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perhitungan_subkriteria`
--
ALTER TABLE `perhitungan_subkriteria`
  ADD CONSTRAINT `fk_perhitungan_subkriteria_kode_kriteria` FOREIGN KEY (`kode_kriteria`) REFERENCES `kriteria` (`kode_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_perhitungan_subkriteria_subkriteria_kedua` FOREIGN KEY (`subkriteria_kedua`) REFERENCES `subkriteria` (`kode_subkriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_perhitungan_subkriteria_subkriteria_pertama` FOREIGN KEY (`subkriteria_pertama`) REFERENCES `subkriteria` (`kode_subkriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ranking`
--
ALTER TABLE `ranking`
  ADD CONSTRAINT `fk_kode_alternatif_ranking_group_penilaian` FOREIGN KEY (`kode_alternatif`) REFERENCES `group_penilaian` (`alternatif_pertama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skala_indikator`
--
ALTER TABLE `skala_indikator`
  ADD CONSTRAINT `fk_skala_indikator_id_indikator_subkriteria` FOREIGN KEY (`id_indikator_subkriteria`) REFERENCES `indikator_subkriteria` (`id_indikator_subkriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skala_indikator_detail`
--
ALTER TABLE `skala_indikator_detail`
  ADD CONSTRAINT `fk_skala_indikator_detail_id_skala_indikator` FOREIGN KEY (`id_skala_indikator`) REFERENCES `skala_indikator` (`id_skala_indikator`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_skala_indikator_detail_nilai_skala` FOREIGN KEY (`skala`) REFERENCES `nilai_skala` (`skala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `fk_subkriteria_kode_kriteria` FOREIGN KEY (`kode_kriteria`) REFERENCES `kriteria` (`kode_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
