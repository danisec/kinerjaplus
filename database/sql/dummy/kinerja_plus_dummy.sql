-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2024 at 12:25 PM
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
-- Database: `kinerja_plus_dummy`
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
(1, 'A1', 'Mary Wahyuningsih, S.Kom', 'Perempuan', '2001-07-01', 101001, 'Deputi 1', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(2, 'A2', 'Lucia Sutarni, S.Pd', 'Perempuan', '2004-07-01', 402002, 'Kepala Sekolah TK', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(3, 'A3', 'Irmina Sihura', 'Perempuan', '2005-07-01', 502003, 'Guru', 'D3', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(4, 'A4', 'Hendriette Aphrodite Naomi Angelique Salakory', 'Perempuan', '2006-07-01', 602005, 'Guru', 'PGTK', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(5, 'A5', 'Tiyas Wulandari, S.Psi', 'Perempuan', '2008-07-01', 802008, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(6, 'A6', 'Selamat, M.Pd', 'Laki-laki', '2009-07-01', 901009, 'Deputi 2', 'S2', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(7, 'A7', 'Tek Hok, S.Kom', 'Laki-laki', '2010-01-01', 1002016, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(8, 'A8', 'Leni Sihombing, S.Pd', 'Perempuan', '2010-07-01', 1002018, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(9, 'A9', 'Diyah Kartika S,S.H', 'Perempuan', '2011-07-01', 1102026, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(10, 'A10', 'Muddin Sidabalok, S.Pd', 'Laki-laki', '2011-07-01', 1102030, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(11, 'A11', 'Ninik Kristoermadiarsih, M.M', 'Perempuan', '2011-10-17', 1102035, 'Kepala Sekolah SD', 'S2', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(12, 'A12', 'Christina Puloraran', 'Perempuan', '2012-01-25', 1202040, 'Guru', 'PGTK', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(13, 'A13', 'Tanasia. S.Th', 'Perempuan', '2012-07-01', 1202044, 'Guru', 'S2', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(14, 'A14', 'Lusiana Sele, S.Pd', 'Perempuan', '2012-07-01', 1202047, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(15, 'A15', 'Iria Kharisma Joseph, ST', 'Laki-laki', '2012-07-01', 1202049, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(16, 'A16', 'Lisa Julita Mokosandi, S.Th', 'Perempuan', '2013-07-01', 1302072, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(17, 'A17', 'Theresia Rusmiyati', 'Perempuan', '2013-07-01', 1302075, 'Guru', 'D3', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(18, 'A18', 'Yacobus Santana, S.Pd', 'Laki-laki', '2014-07-01', 1402085, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(19, 'A19', 'R.AB.Susi Hastono, S.E', 'Laki-laki', '2014-07-01', 1402087, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(20, 'A20', 'Marusaha Samosir, S.Pd', 'Laki-laki', '2014-07-01', 1402089, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(21, 'A21', 'Aprilliana Grace Wilma Thenu, S.Sos', 'Perempuan', '2014-07-01', 1402092, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(22, 'A22', 'Gani Praditja Sakti, S.Pd', 'Laki-laki', '2015-07-01', 1502101, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(23, 'A23', 'Fransisca X.Suharti, S.Pd', 'Laki-laki', '2015-07-01', 1502104, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(24, 'A24', 'Kristiani Dwi Nugrohowati Djatiningsih, S.E', 'Perempuan', '2015-10-01', 1502107, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(25, 'A25', 'Elisabeth, S.Pd', 'Perempuan', '2016-07-01', 1602108, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(26, 'A26', 'Sovia Nainggolan, M.Pd', 'Perempuan', '2016-07-01', 1602111, 'Kepala Sekolah SMP', 'S2', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(27, 'A27', 'Cornelius Wiwit, S.Pd', 'Laki-laki', '2016-07-01', 1602112, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(28, 'A28', 'Artha Maulina Rochendraty, S.Pd', 'Perempuan', '2016-07-01', 1602123, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(29, 'A29', 'Siti Limaria Silaban, S.Pd', 'Perempuan', '2016-07-01', 1602125, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(30, 'A30', 'Steven Evan Edifianto, S.Pd', 'Laki-laki', '2016-07-01', 1602126, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(31, 'A31', 'Linda Tiur Mauly, M.M', 'Perempuan', '2017-07-01', 1702138, 'Guru', 'S2', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(32, 'A32', 'Heri Prasetya, S.Pd', 'Laki-laki', '2018-07-01', 1802143, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(33, 'A33', 'Martha Septiningtyas, S.Pd, M.Hum.', 'Perempuan', '2018-07-01', 1802145, 'Guru', 'S2', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(34, 'A34', 'Pesta Maria Siburian, S.Pd', 'Perempuan', '2019-07-01', 1902151, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(35, 'A35', 'Ronica Sales Julianti Siahaan, S.Pd', 'Perempuan', '2019-07-01', 1902152, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(36, 'A36', 'Roslinah, S.Pd', 'Perempuan', '2019-07-01', 1902154, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(37, 'A37', 'Elvina Br. Manik, S.Pd', 'Perempuan', '2020-07-01', 2002161, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(38, 'A38', 'Rian Hendri Tupamahu, S.Pd', 'Laki-laki', '2020-07-01', 2002163, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(39, 'A39', 'Rachel Oktaviani Hutahaean, S.Pd', 'Perempuan', '2021-01-01', 2102164, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(40, 'A40', 'Prima Caesar, B.Ed, S.Pd.', 'Perempuan', '2020-07-01', 2102165, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(41, 'A41', 'Jelda Febrina Sesfaot, S.Pd', 'Perempuan', '2021-01-01', 2102167, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(42, 'A42', 'Romi Poire Sihotang, S.Kom', 'Laki-laki', '2022-01-01', 2102168, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(43, 'A43', 'Sriningsih Hutabarat, S.Pd', 'Perempuan', '2023-07-01', 2307201, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(44, 'A44', 'Theresa Christina Yoel, S.Pd', 'Perempuan', '2023-07-01', 2307202, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(45, 'A45', 'Erni Maduma BR Marbun, S.Pd', 'Perempuan', '2023-07-01', 2307203, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(46, 'A46', 'Tanty Chandra Siregar, S.Pd', 'Perempuan', '2023-07-01', 2307204, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(47, 'A47', 'Agnes Paul, S.Pd', 'Perempuan', '2023-07-01', 2307205, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(48, 'A48', 'Missy Friska Margaretha', 'Perempuan', '2024-04-17', 2407209, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(49, 'A49', 'Andre Saputra Julianto', 'Laki-laki', '2024-04-22', 2407210, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(50, 'A50', 'Ekam Sehari Manalu', 'Laki-laki', '2024-07-01', 2407212, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-06-15 02:24:33'),
(51, 'A51', 'Odaligo Zega', 'Laki-laki', '2024-07-01', 2407213, 'Guru', 'S1', '2024-06-15 02:24:33', '2024-07-31 22:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `bobot_prioritas_alternatif`
--

CREATE TABLE `bobot_prioritas_alternatif` (
  `id_bobot_prioritas_alternatif` bigint UNSIGNED NOT NULL,
  `id_tanggal_penilaian` bigint UNSIGNED NOT NULL,
  `kode_kriteria` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_alternatif` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_prioritas` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bobot_prioritas_alternatif`
--

INSERT INTO `bobot_prioritas_alternatif` (`id_bobot_prioritas_alternatif`, `id_tanggal_penilaian`, `kode_kriteria`, `kode_alternatif`, `bobot_prioritas`, `created_at`, `updated_at`) VALUES
(1, 1, 'K1', 'A10', 0.021, '2024-08-12 04:11:09', '2024-08-14 14:41:53'),
(2, 1, 'K1', 'A2', 0.1673, '2024-08-12 04:11:09', '2024-08-14 14:41:53'),
(3, 1, 'K1', 'A3', 0.3176, '2024-08-12 04:11:09', '2024-08-14 14:41:53'),
(4, 1, 'K1', 'A4', 0.2456, '2024-08-12 04:11:09', '2024-08-14 14:41:53'),
(5, 1, 'K1', 'A5', 0.1169, '2024-08-12 04:11:09', '2024-08-14 14:41:53'),
(6, 1, 'K1', 'A8', 0.0852, '2024-08-12 04:11:09', '2024-08-14 14:41:53'),
(7, 1, 'K1', 'A9', 0.0458, '2024-08-12 04:11:09', '2024-08-14 14:41:53'),
(8, 1, 'K2', 'A10', 0.041, '2024-08-12 04:11:09', '2024-08-14 14:41:53'),
(9, 1, 'K2', 'A2', 0.1968, '2024-08-12 04:11:09', '2024-08-14 14:41:53'),
(10, 1, 'K2', 'A3', 0.2529, '2024-08-12 04:11:09', '2024-08-14 14:41:53'),
(11, 1, 'K2', 'A4', 0.1723, '2024-08-12 04:11:09', '2024-08-14 14:41:53'),
(12, 1, 'K2', 'A5', 0.126, '2024-08-12 04:11:09', '2024-08-14 14:51:48'),
(13, 1, 'K2', 'A8', 0.1205, '2024-08-12 04:11:09', '2024-08-14 14:41:53'),
(14, 1, 'K2', 'A9', 0.0899, '2024-08-12 04:11:09', '2024-08-14 14:41:53'),
(15, 1, 'K3', 'A10', 0.0973, '2024-08-12 04:11:09', '2024-08-14 14:41:53'),
(16, 1, 'K3', 'A2', 0.2565, '2024-08-12 04:11:09', '2024-08-14 14:41:53'),
(17, 1, 'K3', 'A3', 0.2272, '2024-08-12 04:11:09', '2024-08-14 14:41:53'),
(18, 1, 'K3', 'A4', 0.1552, '2024-08-12 04:11:09', '2024-08-14 14:41:53'),
(19, 1, 'K3', 'A5', 0.1267, '2024-08-12 04:11:09', '2024-08-14 14:41:53'),
(20, 1, 'K3', 'A8', 0.0691, '2024-08-12 04:11:09', '2024-08-14 14:41:53'),
(21, 1, 'K3', 'A9', 0.0674, '2024-08-12 04:11:09', '2024-08-14 14:41:53');

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
(1, 1, 0.65543333333333, '2024-08-18 05:03:40', '2024-08-18 05:03:40'),
(2, 2, 0.1867, '2024-08-18 05:03:40', '2024-08-18 05:03:40'),
(3, 3, 0.15773333333333, '2024-08-18 05:03:40', '2024-08-18 05:03:40');

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

--
-- Dumping data for table `bobot_prioritas_subkriteria`
--

INSERT INTO `bobot_prioritas_subkriteria` (`id_bobot_prioritas_subkriteria`, `kode_kriteria`, `bobot_prioritas`, `created_at`, `updated_at`) VALUES
(1, 'K1', 0.65523670333333, '2024-08-18 04:50:08', '2024-08-18 04:50:08'),
(2, 'K2', 0.18655064, '2024-08-18 04:50:08', '2024-08-18 04:50:08'),
(3, 'K3', 0.15773333333333, '2024-08-18 04:50:08', '2024-08-18 04:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `catatan_karyawan`
--

CREATE TABLE `catatan_karyawan` (
  `id_catatan_karyawan` bigint UNSIGNED NOT NULL,
  `id_penilaian` bigint UNSIGNED NOT NULL,
  `id_tanggal_penilaian` bigint UNSIGNED NOT NULL,
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

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, '231db180-558b-448a-8f26-8dad0211a708', 'database', 'default', '{\"uuid\":\"231db180-558b-448a-8f26-8dad0211a708\",\"displayName\":\"App\\\\Jobs\\\\PerhitunganAlternatifJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\PerhitunganAlternatifJob\",\"command\":\"O:33:\\\"App\\\\Jobs\\\\PerhitunganAlternatifJob\\\":1:{s:10:\\\"\\u0000*\\u0000matriks\\\";a:1:{i:4;a:3:{s:2:\\\"K1\\\";a:7:{s:2:\\\"A2\\\";a:7:{s:2:\\\"A2\\\";s:1:\\\"1\\\";s:2:\\\"A3\\\";s:1:\\\"4\\\";s:2:\\\"A4\\\";s:1:\\\"6\\\";s:2:\\\"A5\\\";s:1:\\\"5\\\";s:2:\\\"A8\\\";s:1:\\\"5\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"6\\\";}s:2:\\\"A3\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2500\\\";s:2:\\\"A3\\\";s:1:\\\"1\\\";s:2:\\\"A4\\\";s:1:\\\"6\\\";s:2:\\\"A5\\\";s:1:\\\"6\\\";s:2:\\\"A8\\\";s:1:\\\"5\\\";s:2:\\\"A9\\\";s:1:\\\"7\\\";s:3:\\\"A10\\\";s:1:\\\"6\\\";}s:2:\\\"A4\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.1667\\\";s:2:\\\"A4\\\";s:1:\\\"1\\\";s:2:\\\"A5\\\";s:1:\\\"6\\\";s:2:\\\"A8\\\";s:1:\\\"6\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"5\\\";}s:2:\\\"A5\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2000\\\";s:2:\\\"A3\\\";s:6:\\\"0.1667\\\";s:2:\\\"A4\\\";s:6:\\\"0.1667\\\";s:2:\\\"A5\\\";s:1:\\\"1\\\";s:2:\\\"A8\\\";s:1:\\\"7\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"4\\\";}s:2:\\\"A8\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2000\\\";s:2:\\\"A3\\\";s:6:\\\"0.2000\\\";s:2:\\\"A4\\\";s:6:\\\"0.1667\\\";s:2:\\\"A5\\\";s:6:\\\"0.1429\\\";s:2:\\\"A8\\\";s:1:\\\"1\\\";s:2:\\\"A9\\\";s:1:\\\"3\\\";s:3:\\\"A10\\\";s:1:\\\"4\\\";}s:2:\\\"A9\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.1429\\\";s:2:\\\"A4\\\";s:6:\\\"0.1667\\\";s:2:\\\"A5\\\";s:6:\\\"0.1667\\\";s:2:\\\"A8\\\";s:6:\\\"0.3333\\\";s:2:\\\"A9\\\";s:1:\\\"1\\\";s:3:\\\"A10\\\";s:1:\\\"4\\\";}s:3:\\\"A10\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.1667\\\";s:2:\\\"A4\\\";s:6:\\\"0.2000\\\";s:2:\\\"A5\\\";s:6:\\\"0.2500\\\";s:2:\\\"A8\\\";s:6:\\\"0.2500\\\";s:2:\\\"A9\\\";s:6:\\\"0.2500\\\";s:3:\\\"A10\\\";s:1:\\\"1\\\";}}s:2:\\\"K2\\\";a:7:{s:2:\\\"A2\\\";a:7:{s:2:\\\"A2\\\";s:1:\\\"1\\\";s:2:\\\"A3\\\";s:1:\\\"6\\\";s:2:\\\"A4\\\";s:1:\\\"7\\\";s:2:\\\"A5\\\";s:1:\\\"6\\\";s:2:\\\"A8\\\";s:1:\\\"7\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"5\\\";}s:2:\\\"A3\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:1:\\\"1\\\";s:2:\\\"A4\\\";s:1:\\\"4\\\";s:2:\\\"A5\\\";s:1:\\\"5\\\";s:2:\\\"A8\\\";s:1:\\\"5\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"5\\\";}s:2:\\\"A4\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1429\\\";s:2:\\\"A3\\\";s:6:\\\"0.2500\\\";s:2:\\\"A4\\\";s:1:\\\"1\\\";s:2:\\\"A5\\\";s:1:\\\"5\\\";s:2:\\\"A8\\\";s:1:\\\"4\\\";s:2:\\\"A9\\\";s:1:\\\"4\\\";s:3:\\\"A10\\\";s:1:\\\"4\\\";}s:2:\\\"A5\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.2000\\\";s:2:\\\"A4\\\";s:6:\\\"0.2000\\\";s:2:\\\"A5\\\";s:1:\\\"1\\\";s:2:\\\"A8\\\";s:1:\\\"3\\\";s:2:\\\"A9\\\";s:1:\\\"5\\\";s:3:\\\"A10\\\";s:1:\\\"4\\\";}s:2:\\\"A8\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1429\\\";s:2:\\\"A3\\\";s:6:\\\"0.2000\\\";s:2:\\\"A4\\\";s:6:\\\"0.2500\\\";s:2:\\\"A5\\\";s:6:\\\"0.3333\\\";s:2:\\\"A8\\\";s:1:\\\"1\\\";s:2:\\\"A9\\\";s:1:\\\"5\\\";s:3:\\\"A10\\\";s:1:\\\"6\\\";}s:2:\\\"A9\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.1667\\\";s:2:\\\"A4\\\";s:6:\\\"0.2500\\\";s:2:\\\"A5\\\";s:6:\\\"0.2000\\\";s:2:\\\"A8\\\";s:6:\\\"0.2000\\\";s:2:\\\"A9\\\";s:1:\\\"1\\\";s:3:\\\"A10\\\";s:1:\\\"5\\\";}s:3:\\\"A10\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2000\\\";s:2:\\\"A3\\\";s:6:\\\"0.2000\\\";s:2:\\\"A4\\\";s:6:\\\"0.2500\\\";s:2:\\\"A5\\\";s:6:\\\"0.2500\\\";s:2:\\\"A8\\\";s:6:\\\"0.1667\\\";s:2:\\\"A9\\\";s:6:\\\"0.2000\\\";s:3:\\\"A10\\\";s:1:\\\"1\\\";}}s:2:\\\"K3\\\";a:7:{s:2:\\\"A2\\\";a:7:{s:2:\\\"A2\\\";s:1:\\\"1\\\";s:2:\\\"A3\\\";s:1:\\\"7\\\";s:2:\\\"A4\\\";s:1:\\\"7\\\";s:2:\\\"A5\\\";s:1:\\\"6\\\";s:2:\\\"A8\\\";s:1:\\\"5\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"7\\\";}s:2:\\\"A3\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1429\\\";s:2:\\\"A3\\\";s:1:\\\"1\\\";s:2:\\\"A4\\\";s:1:\\\"6\\\";s:2:\\\"A5\\\";s:1:\\\"3\\\";s:2:\\\"A8\\\";s:1:\\\"4\\\";s:2:\\\"A9\\\";s:1:\\\"7\\\";s:3:\\\"A10\\\";s:1:\\\"5\\\";}s:2:\\\"A4\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1429\\\";s:2:\\\"A3\\\";s:6:\\\"0.1667\\\";s:2:\\\"A4\\\";s:1:\\\"1\\\";s:2:\\\"A5\\\";s:1:\\\"7\\\";s:2:\\\"A8\\\";s:1:\\\"4\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"5\\\";}s:2:\\\"A5\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.3333\\\";s:2:\\\"A4\\\";s:6:\\\"0.1429\\\";s:2:\\\"A5\\\";s:1:\\\"1\\\";s:2:\\\"A8\\\";s:1:\\\"5\\\";s:2:\\\"A9\\\";s:1:\\\"5\\\";s:3:\\\"A10\\\";s:1:\\\"6\\\";}s:2:\\\"A8\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2000\\\";s:2:\\\"A3\\\";s:6:\\\"0.2500\\\";s:2:\\\"A4\\\";s:6:\\\"0.2500\\\";s:2:\\\"A5\\\";s:6:\\\"0.2000\\\";s:2:\\\"A8\\\";s:1:\\\"1\\\";s:2:\\\"A9\\\";s:1:\\\"5\\\";s:3:\\\"A10\\\";s:1:\\\"4\\\";}s:2:\\\"A9\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.1429\\\";s:2:\\\"A4\\\";s:6:\\\"0.1667\\\";s:2:\\\"A5\\\";s:6:\\\"0.2000\\\";s:2:\\\"A8\\\";s:6:\\\"0.2000\\\";s:2:\\\"A9\\\";s:1:\\\"1\\\";s:3:\\\"A10\\\";s:1:\\\"7\\\";}s:3:\\\"A10\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1429\\\";s:2:\\\"A3\\\";s:6:\\\"0.2000\\\";s:2:\\\"A4\\\";s:6:\\\"0.2000\\\";s:2:\\\"A5\\\";s:6:\\\"0.1667\\\";s:2:\\\"A8\\\";s:6:\\\"0.2500\\\";s:2:\\\"A9\\\";s:6:\\\"0.1429\\\";s:3:\\\"A10\\\";s:1:\\\"1\\\";}}}}}\"}}', 'Exception: Data perbandingan karyawan gagal disimpan in D:\\Web Project\\kinerja-ahp\\app\\Jobs\\PerhitunganAlternatifJob.php:57\nStack trace:\n#0 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\PerhitunganAlternatifJob->handle()\n#1 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#2 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#3 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#6 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\PerhitunganAlternatifJob))\n#7 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\PerhitunganAlternatifJob))\n#8 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\PerhitunganAlternatifJob), false)\n#10 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\PerhitunganAlternatifJob))\n#11 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\PerhitunganAlternatifJob))\n#12 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#13 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\PerhitunganAlternatifJob))\n#14 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#15 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#16 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#17 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#18 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(137): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(120): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#20 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#21 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#22 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#23 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#24 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#25 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#26 D:\\Web Project\\kinerja-ahp\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#27 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 D:\\Web Project\\kinerja-ahp\\vendor\\symfony\\console\\Application.php(1081): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 D:\\Web Project\\kinerja-ahp\\vendor\\symfony\\console\\Application.php(320): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 D:\\Web Project\\kinerja-ahp\\vendor\\symfony\\console\\Application.php(174): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 D:\\Web Project\\kinerja-ahp\\artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 {main}', '2024-08-10 02:40:32'),
(2, '222c089a-fbbf-4c8b-bbee-d23eee83a6c8', 'database', 'default', '{\"uuid\":\"222c089a-fbbf-4c8b-bbee-d23eee83a6c8\",\"displayName\":\"App\\\\Jobs\\\\PerhitunganAlternatifJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\PerhitunganAlternatifJob\",\"command\":\"O:33:\\\"App\\\\Jobs\\\\PerhitunganAlternatifJob\\\":1:{s:10:\\\"\\u0000*\\u0000matriks\\\";a:1:{i:4;a:3:{s:2:\\\"K1\\\";a:7:{s:2:\\\"A2\\\";a:7:{s:2:\\\"A2\\\";s:1:\\\"1\\\";s:2:\\\"A3\\\";s:1:\\\"7\\\";s:2:\\\"A4\\\";s:1:\\\"5\\\";s:2:\\\"A5\\\";s:1:\\\"6\\\";s:2:\\\"A8\\\";s:1:\\\"6\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"6\\\";}s:2:\\\"A3\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1429\\\";s:2:\\\"A3\\\";s:1:\\\"1\\\";s:2:\\\"A4\\\";s:1:\\\"5\\\";s:2:\\\"A5\\\";s:1:\\\"5\\\";s:2:\\\"A8\\\";s:1:\\\"6\\\";s:2:\\\"A9\\\";s:1:\\\"5\\\";s:3:\\\"A10\\\";s:1:\\\"5\\\";}s:2:\\\"A4\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2000\\\";s:2:\\\"A3\\\";s:6:\\\"0.2000\\\";s:2:\\\"A4\\\";s:1:\\\"1\\\";s:2:\\\"A5\\\";s:1:\\\"5\\\";s:2:\\\"A8\\\";s:1:\\\"5\\\";s:2:\\\"A9\\\";s:1:\\\"5\\\";s:3:\\\"A10\\\";s:1:\\\"5\\\";}s:2:\\\"A5\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.2000\\\";s:2:\\\"A4\\\";s:6:\\\"0.2000\\\";s:2:\\\"A5\\\";s:1:\\\"1\\\";s:2:\\\"A8\\\";s:1:\\\"5\\\";s:2:\\\"A9\\\";s:1:\\\"5\\\";s:3:\\\"A10\\\";s:1:\\\"5\\\";}s:2:\\\"A8\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.1667\\\";s:2:\\\"A4\\\";s:6:\\\"0.2000\\\";s:2:\\\"A5\\\";s:6:\\\"0.2000\\\";s:2:\\\"A8\\\";s:1:\\\"1\\\";s:2:\\\"A9\\\";s:1:\\\"4\\\";s:3:\\\"A10\\\";s:1:\\\"4\\\";}s:2:\\\"A9\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.2000\\\";s:2:\\\"A4\\\";s:6:\\\"0.2000\\\";s:2:\\\"A5\\\";s:6:\\\"0.2000\\\";s:2:\\\"A8\\\";s:6:\\\"0.2500\\\";s:2:\\\"A9\\\";s:1:\\\"1\\\";s:3:\\\"A10\\\";s:1:\\\"3\\\";}s:3:\\\"A10\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.2000\\\";s:2:\\\"A4\\\";s:6:\\\"0.2000\\\";s:2:\\\"A5\\\";s:6:\\\"0.2000\\\";s:2:\\\"A8\\\";s:6:\\\"0.2500\\\";s:2:\\\"A9\\\";s:6:\\\"0.3333\\\";s:3:\\\"A10\\\";s:1:\\\"1\\\";}}s:2:\\\"K2\\\";a:7:{s:2:\\\"A2\\\";a:7:{s:2:\\\"A2\\\";s:1:\\\"1\\\";s:2:\\\"A3\\\";s:1:\\\"5\\\";s:2:\\\"A4\\\";s:1:\\\"4\\\";s:2:\\\"A5\\\";s:1:\\\"5\\\";s:2:\\\"A8\\\";s:1:\\\"5\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"5\\\";}s:2:\\\"A3\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2000\\\";s:2:\\\"A3\\\";s:1:\\\"1\\\";s:2:\\\"A4\\\";s:1:\\\"7\\\";s:2:\\\"A5\\\";s:1:\\\"6\\\";s:2:\\\"A8\\\";s:1:\\\"5\\\";s:2:\\\"A9\\\";s:1:\\\"8\\\";s:3:\\\"A10\\\";s:1:\\\"6\\\";}s:2:\\\"A4\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2500\\\";s:2:\\\"A3\\\";s:6:\\\"0.1429\\\";s:2:\\\"A4\\\";s:1:\\\"1\\\";s:2:\\\"A5\\\";s:1:\\\"5\\\";s:2:\\\"A8\\\";s:1:\\\"4\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"5\\\";}s:2:\\\"A5\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2000\\\";s:2:\\\"A3\\\";s:6:\\\"0.1667\\\";s:2:\\\"A4\\\";s:6:\\\"0.2000\\\";s:2:\\\"A5\\\";s:1:\\\"1\\\";s:2:\\\"A8\\\";s:1:\\\"6\\\";s:2:\\\"A9\\\";s:1:\\\"3\\\";s:3:\\\"A10\\\";s:1:\\\"6\\\";}s:2:\\\"A8\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2000\\\";s:2:\\\"A3\\\";s:6:\\\"0.2000\\\";s:2:\\\"A4\\\";s:6:\\\"0.2500\\\";s:2:\\\"A5\\\";s:6:\\\"0.1667\\\";s:2:\\\"A8\\\";s:1:\\\"1\\\";s:2:\\\"A9\\\";s:1:\\\"3\\\";s:3:\\\"A10\\\";s:1:\\\"4\\\";}s:2:\\\"A9\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.1250\\\";s:2:\\\"A4\\\";s:6:\\\"0.1667\\\";s:2:\\\"A5\\\";s:6:\\\"0.3333\\\";s:2:\\\"A8\\\";s:6:\\\"0.3333\\\";s:2:\\\"A9\\\";s:1:\\\"1\\\";s:3:\\\"A10\\\";s:1:\\\"3\\\";}s:3:\\\"A10\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2000\\\";s:2:\\\"A3\\\";s:6:\\\"0.1667\\\";s:2:\\\"A4\\\";s:6:\\\"0.2000\\\";s:2:\\\"A5\\\";s:6:\\\"0.1667\\\";s:2:\\\"A8\\\";s:6:\\\"0.2500\\\";s:2:\\\"A9\\\";s:6:\\\"0.3333\\\";s:3:\\\"A10\\\";s:1:\\\"1\\\";}}s:2:\\\"K3\\\";a:7:{s:2:\\\"A2\\\";a:7:{s:2:\\\"A2\\\";s:1:\\\"1\\\";s:2:\\\"A3\\\";s:1:\\\"5\\\";s:2:\\\"A4\\\";s:1:\\\"5\\\";s:2:\\\"A5\\\";s:1:\\\"4\\\";s:2:\\\"A8\\\";s:1:\\\"4\\\";s:2:\\\"A9\\\";s:1:\\\"4\\\";s:3:\\\"A10\\\";s:1:\\\"4\\\";}s:2:\\\"A3\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2000\\\";s:2:\\\"A3\\\";s:1:\\\"1\\\";s:2:\\\"A4\\\";s:1:\\\"3\\\";s:2:\\\"A5\\\";s:1:\\\"3\\\";s:2:\\\"A8\\\";s:1:\\\"4\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"4\\\";}s:2:\\\"A4\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2000\\\";s:2:\\\"A3\\\";s:6:\\\"0.3333\\\";s:2:\\\"A4\\\";s:1:\\\"1\\\";s:2:\\\"A5\\\";s:1:\\\"4\\\";s:2:\\\"A8\\\";s:1:\\\"3\\\";s:2:\\\"A9\\\";s:1:\\\"4\\\";s:3:\\\"A10\\\";s:1:\\\"3\\\";}s:2:\\\"A5\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2500\\\";s:2:\\\"A3\\\";s:6:\\\"0.3333\\\";s:2:\\\"A4\\\";s:6:\\\"0.2500\\\";s:2:\\\"A5\\\";s:1:\\\"1\\\";s:2:\\\"A8\\\";s:1:\\\"4\\\";s:2:\\\"A9\\\";s:1:\\\"4\\\";s:3:\\\"A10\\\";s:1:\\\"6\\\";}s:2:\\\"A8\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2500\\\";s:2:\\\"A3\\\";s:6:\\\"0.2500\\\";s:2:\\\"A4\\\";s:6:\\\"0.3333\\\";s:2:\\\"A5\\\";s:6:\\\"0.2500\\\";s:2:\\\"A8\\\";s:1:\\\"1\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"5\\\";}s:2:\\\"A9\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2500\\\";s:2:\\\"A3\\\";s:6:\\\"0.1667\\\";s:2:\\\"A4\\\";s:6:\\\"0.2500\\\";s:2:\\\"A5\\\";s:6:\\\"0.2500\\\";s:2:\\\"A8\\\";s:6:\\\"0.1667\\\";s:2:\\\"A9\\\";s:1:\\\"1\\\";s:3:\\\"A10\\\";s:1:\\\"7\\\";}s:3:\\\"A10\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2500\\\";s:2:\\\"A3\\\";s:6:\\\"0.2500\\\";s:2:\\\"A4\\\";s:6:\\\"0.3333\\\";s:2:\\\"A5\\\";s:6:\\\"0.1667\\\";s:2:\\\"A8\\\";s:6:\\\"0.2000\\\";s:2:\\\"A9\\\";s:6:\\\"0.1429\\\";s:3:\\\"A10\\\";s:1:\\\"1\\\";}}}}}\"}}', 'Exception: Data perbandingan karyawan gagal disimpan in D:\\Web Project\\kinerja-ahp\\app\\Jobs\\PerhitunganAlternatifJob.php:57\nStack trace:\n#0 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\PerhitunganAlternatifJob->handle()\n#1 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#2 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#3 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#6 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\PerhitunganAlternatifJob))\n#7 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\PerhitunganAlternatifJob))\n#8 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\PerhitunganAlternatifJob), false)\n#10 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\PerhitunganAlternatifJob))\n#11 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\PerhitunganAlternatifJob))\n#12 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#13 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\PerhitunganAlternatifJob))\n#14 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#15 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#16 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#17 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#18 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(137): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(120): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#20 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#21 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#22 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#23 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#24 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#25 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#26 D:\\Web Project\\kinerja-ahp\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#27 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 D:\\Web Project\\kinerja-ahp\\vendor\\symfony\\console\\Application.php(1081): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 D:\\Web Project\\kinerja-ahp\\vendor\\symfony\\console\\Application.php(320): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 D:\\Web Project\\kinerja-ahp\\vendor\\symfony\\console\\Application.php(174): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 D:\\Web Project\\kinerja-ahp\\artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 {main}', '2024-08-10 02:44:26'),
(3, '502bfb72-6426-444d-96f3-43aa137d72d3', 'database', 'default', '{\"uuid\":\"502bfb72-6426-444d-96f3-43aa137d72d3\",\"displayName\":\"App\\\\Jobs\\\\PerhitunganAlternatifJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\PerhitunganAlternatifJob\",\"command\":\"O:33:\\\"App\\\\Jobs\\\\PerhitunganAlternatifJob\\\":1:{s:10:\\\"\\u0000*\\u0000matriks\\\";a:1:{i:4;a:3:{s:2:\\\"K1\\\";a:7:{s:2:\\\"A2\\\";a:7:{s:2:\\\"A2\\\";s:1:\\\"1\\\";s:2:\\\"A3\\\";s:1:\\\"5\\\";s:2:\\\"A4\\\";s:1:\\\"6\\\";s:2:\\\"A5\\\";s:1:\\\"7\\\";s:2:\\\"A8\\\";s:1:\\\"6\\\";s:2:\\\"A9\\\";s:1:\\\"7\\\";s:3:\\\"A10\\\";s:1:\\\"6\\\";}s:2:\\\"A3\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2000\\\";s:2:\\\"A3\\\";s:1:\\\"1\\\";s:2:\\\"A4\\\";s:1:\\\"5\\\";s:2:\\\"A5\\\";s:1:\\\"6\\\";s:2:\\\"A8\\\";s:1:\\\"7\\\";s:2:\\\"A9\\\";s:1:\\\"8\\\";s:3:\\\"A10\\\";s:1:\\\"8\\\";}s:2:\\\"A4\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.2000\\\";s:2:\\\"A4\\\";s:1:\\\"1\\\";s:2:\\\"A5\\\";s:1:\\\"5\\\";s:2:\\\"A8\\\";s:1:\\\"6\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"6\\\";}s:2:\\\"A5\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1429\\\";s:2:\\\"A3\\\";s:6:\\\"0.1667\\\";s:2:\\\"A4\\\";s:6:\\\"0.2000\\\";s:2:\\\"A5\\\";s:1:\\\"1\\\";s:2:\\\"A8\\\";s:1:\\\"6\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"6\\\";}s:2:\\\"A8\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.1429\\\";s:2:\\\"A4\\\";s:6:\\\"0.1667\\\";s:2:\\\"A5\\\";s:6:\\\"0.1667\\\";s:2:\\\"A8\\\";s:1:\\\"1\\\";s:2:\\\"A9\\\";s:1:\\\"5\\\";s:3:\\\"A10\\\";s:1:\\\"7\\\";}s:2:\\\"A9\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1429\\\";s:2:\\\"A3\\\";s:6:\\\"0.1250\\\";s:2:\\\"A4\\\";s:6:\\\"0.1667\\\";s:2:\\\"A5\\\";s:6:\\\"0.1667\\\";s:2:\\\"A8\\\";s:6:\\\"0.2000\\\";s:2:\\\"A9\\\";s:1:\\\"1\\\";s:3:\\\"A10\\\";s:1:\\\"5\\\";}s:3:\\\"A10\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.1250\\\";s:2:\\\"A4\\\";s:6:\\\"0.1667\\\";s:2:\\\"A5\\\";s:6:\\\"0.1667\\\";s:2:\\\"A8\\\";s:6:\\\"0.1429\\\";s:2:\\\"A9\\\";s:6:\\\"0.2000\\\";s:3:\\\"A10\\\";s:1:\\\"1\\\";}}s:2:\\\"K2\\\";a:7:{s:2:\\\"A2\\\";a:7:{s:2:\\\"A2\\\";s:1:\\\"1\\\";s:2:\\\"A3\\\";s:1:\\\"4\\\";s:2:\\\"A4\\\";s:1:\\\"4\\\";s:2:\\\"A5\\\";s:1:\\\"7\\\";s:2:\\\"A8\\\";s:1:\\\"6\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"6\\\";}s:2:\\\"A3\\\";a:6:{s:2:\\\"A2\\\";s:6:\\\"0.2500\\\";s:2:\\\"A3\\\";s:1:\\\"1\\\";s:2:\\\"A5\\\";s:1:\\\"6\\\";s:2:\\\"A8\\\";s:1:\\\"7\\\";s:2:\\\"A9\\\";s:1:\\\"7\\\";s:3:\\\"A10\\\";s:1:\\\"7\\\";}s:2:\\\"A4\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2500\\\";s:2:\\\"A3\\\";s:1:\\\"0\\\";s:2:\\\"A4\\\";s:1:\\\"1\\\";s:2:\\\"A5\\\";s:1:\\\"7\\\";s:2:\\\"A8\\\";s:1:\\\"5\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"6\\\";}s:2:\\\"A5\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1429\\\";s:2:\\\"A3\\\";s:6:\\\"0.1667\\\";s:2:\\\"A4\\\";s:6:\\\"0.1429\\\";s:2:\\\"A5\\\";s:1:\\\"1\\\";s:2:\\\"A8\\\";s:1:\\\"4\\\";s:2:\\\"A9\\\";s:1:\\\"5\\\";s:3:\\\"A10\\\";s:1:\\\"5\\\";}s:2:\\\"A8\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.1429\\\";s:2:\\\"A4\\\";s:6:\\\"0.2000\\\";s:2:\\\"A5\\\";s:6:\\\"0.2500\\\";s:2:\\\"A8\\\";s:1:\\\"1\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"4\\\";}s:2:\\\"A9\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.1429\\\";s:2:\\\"A4\\\";s:6:\\\"0.1667\\\";s:2:\\\"A5\\\";s:6:\\\"0.2000\\\";s:2:\\\"A8\\\";s:6:\\\"0.1667\\\";s:2:\\\"A9\\\";s:1:\\\"1\\\";s:3:\\\"A10\\\";s:1:\\\"4\\\";}s:3:\\\"A10\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.1429\\\";s:2:\\\"A4\\\";s:6:\\\"0.1667\\\";s:2:\\\"A5\\\";s:6:\\\"0.2000\\\";s:2:\\\"A8\\\";s:6:\\\"0.2500\\\";s:2:\\\"A9\\\";s:6:\\\"0.2500\\\";s:3:\\\"A10\\\";s:1:\\\"1\\\";}}s:2:\\\"K3\\\";a:7:{s:2:\\\"A2\\\";a:7:{s:2:\\\"A2\\\";s:1:\\\"1\\\";s:2:\\\"A3\\\";s:1:\\\"5\\\";s:2:\\\"A4\\\";s:1:\\\"7\\\";s:2:\\\"A5\\\";s:1:\\\"6\\\";s:2:\\\"A8\\\";s:1:\\\"6\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"5\\\";}s:2:\\\"A3\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2000\\\";s:2:\\\"A3\\\";s:1:\\\"1\\\";s:2:\\\"A4\\\";s:1:\\\"4\\\";s:2:\\\"A5\\\";s:1:\\\"4\\\";s:2:\\\"A8\\\";s:1:\\\"6\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"7\\\";}s:2:\\\"A4\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1429\\\";s:2:\\\"A3\\\";s:6:\\\"0.2500\\\";s:2:\\\"A4\\\";s:1:\\\"1\\\";s:2:\\\"A5\\\";s:1:\\\"5\\\";s:2:\\\"A8\\\";s:1:\\\"5\\\";s:2:\\\"A9\\\";s:1:\\\"5\\\";s:3:\\\"A10\\\";s:1:\\\"6\\\";}s:2:\\\"A5\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.2500\\\";s:2:\\\"A4\\\";s:6:\\\"0.2000\\\";s:2:\\\"A5\\\";s:1:\\\"1\\\";s:2:\\\"A8\\\";s:1:\\\"4\\\";s:2:\\\"A9\\\";s:1:\\\"4\\\";s:3:\\\"A10\\\";s:1:\\\"3\\\";}s:2:\\\"A8\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.1667\\\";s:2:\\\"A4\\\";s:6:\\\"0.2000\\\";s:2:\\\"A5\\\";s:6:\\\"0.2500\\\";s:2:\\\"A8\\\";s:1:\\\"1\\\";s:2:\\\"A9\\\";s:1:\\\"3\\\";s:3:\\\"A10\\\";s:1:\\\"6\\\";}s:2:\\\"A9\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.1667\\\";s:2:\\\"A4\\\";s:6:\\\"0.2000\\\";s:2:\\\"A5\\\";s:6:\\\"0.2500\\\";s:2:\\\"A8\\\";s:6:\\\"0.3333\\\";s:2:\\\"A9\\\";s:1:\\\"1\\\";s:3:\\\"A10\\\";s:1:\\\"7\\\";}s:3:\\\"A10\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2000\\\";s:2:\\\"A3\\\";s:6:\\\"0.1429\\\";s:2:\\\"A4\\\";s:6:\\\"0.1667\\\";s:2:\\\"A5\\\";s:6:\\\"0.3333\\\";s:2:\\\"A8\\\";s:6:\\\"0.1667\\\";s:2:\\\"A9\\\";s:6:\\\"0.1429\\\";s:3:\\\"A10\\\";s:1:\\\"1\\\";}}}}}\"}}', 'Exception: Data perbandingan karyawan gagal disimpan in D:\\Web Project\\kinerja-ahp\\app\\Jobs\\PerhitunganAlternatifJob.php:57\nStack trace:\n#0 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\PerhitunganAlternatifJob->handle()\n#1 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#2 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#3 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#6 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\PerhitunganAlternatifJob))\n#7 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\PerhitunganAlternatifJob))\n#8 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\PerhitunganAlternatifJob), false)\n#10 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\PerhitunganAlternatifJob))\n#11 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\PerhitunganAlternatifJob))\n#12 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#13 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\PerhitunganAlternatifJob))\n#14 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#15 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#16 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#17 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#18 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(137): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(120): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#20 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#21 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#22 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#23 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#24 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#25 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#26 D:\\Web Project\\kinerja-ahp\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#27 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 D:\\Web Project\\kinerja-ahp\\vendor\\symfony\\console\\Application.php(1081): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 D:\\Web Project\\kinerja-ahp\\vendor\\symfony\\console\\Application.php(320): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 D:\\Web Project\\kinerja-ahp\\vendor\\symfony\\console\\Application.php(174): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 D:\\Web Project\\kinerja-ahp\\artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 {main}', '2024-08-10 02:49:53');
INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(4, 'c5bf8885-4c29-45a7-a23c-9775cf9a8a3d', 'database', 'default', '{\"uuid\":\"c5bf8885-4c29-45a7-a23c-9775cf9a8a3d\",\"displayName\":\"App\\\\Jobs\\\\PerhitunganAlternatifJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\PerhitunganAlternatifJob\",\"command\":\"O:33:\\\"App\\\\Jobs\\\\PerhitunganAlternatifJob\\\":1:{s:10:\\\"\\u0000*\\u0000matriks\\\";a:1:{i:4;a:3:{s:2:\\\"K1\\\";a:7:{s:2:\\\"A2\\\";a:7:{s:2:\\\"A2\\\";s:1:\\\"1\\\";s:2:\\\"A3\\\";s:1:\\\"7\\\";s:2:\\\"A4\\\";s:1:\\\"7\\\";s:2:\\\"A5\\\";s:1:\\\"8\\\";s:2:\\\"A8\\\";s:1:\\\"8\\\";s:2:\\\"A9\\\";s:1:\\\"8\\\";s:3:\\\"A10\\\";s:1:\\\"7\\\";}s:2:\\\"A3\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1429\\\";s:2:\\\"A3\\\";s:1:\\\"1\\\";s:2:\\\"A4\\\";s:1:\\\"7\\\";s:2:\\\"A5\\\";s:1:\\\"8\\\";s:2:\\\"A8\\\";s:1:\\\"5\\\";s:2:\\\"A9\\\";s:1:\\\"7\\\";s:3:\\\"A10\\\";s:1:\\\"5\\\";}s:2:\\\"A4\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1429\\\";s:2:\\\"A3\\\";s:6:\\\"0.1429\\\";s:2:\\\"A4\\\";s:1:\\\"1\\\";s:2:\\\"A5\\\";s:1:\\\"4\\\";s:2:\\\"A8\\\";s:1:\\\"6\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"7\\\";}s:2:\\\"A5\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1250\\\";s:2:\\\"A3\\\";s:6:\\\"0.1250\\\";s:2:\\\"A4\\\";s:6:\\\"0.2500\\\";s:2:\\\"A5\\\";s:1:\\\"1\\\";s:2:\\\"A8\\\";s:1:\\\"5\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"7\\\";}s:2:\\\"A8\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1250\\\";s:2:\\\"A3\\\";s:6:\\\"0.2000\\\";s:2:\\\"A4\\\";s:6:\\\"0.1667\\\";s:2:\\\"A5\\\";s:6:\\\"0.2000\\\";s:2:\\\"A8\\\";s:1:\\\"1\\\";s:2:\\\"A9\\\";s:1:\\\"5\\\";s:3:\\\"A10\\\";s:1:\\\"7\\\";}s:2:\\\"A9\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1250\\\";s:2:\\\"A3\\\";s:6:\\\"0.1429\\\";s:2:\\\"A4\\\";s:6:\\\"0.1667\\\";s:2:\\\"A5\\\";s:6:\\\"0.1667\\\";s:2:\\\"A8\\\";s:6:\\\"0.2000\\\";s:2:\\\"A9\\\";s:1:\\\"1\\\";s:3:\\\"A10\\\";s:1:\\\"5\\\";}s:3:\\\"A10\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1429\\\";s:2:\\\"A3\\\";s:6:\\\"0.2000\\\";s:2:\\\"A4\\\";s:6:\\\"0.1429\\\";s:2:\\\"A5\\\";s:6:\\\"0.1429\\\";s:2:\\\"A8\\\";s:6:\\\"0.1429\\\";s:2:\\\"A9\\\";s:6:\\\"0.2000\\\";s:3:\\\"A10\\\";s:1:\\\"1\\\";}}s:2:\\\"K2\\\";a:7:{s:2:\\\"A2\\\";a:7:{s:2:\\\"A2\\\";s:1:\\\"1\\\";s:2:\\\"A3\\\";s:1:\\\"6\\\";s:2:\\\"A4\\\";s:1:\\\"7\\\";s:2:\\\"A5\\\";s:1:\\\"9\\\";s:2:\\\"A8\\\";s:1:\\\"5\\\";s:2:\\\"A9\\\";s:1:\\\"7\\\";s:3:\\\"A10\\\";s:1:\\\"5\\\";}s:2:\\\"A3\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:1:\\\"1\\\";s:2:\\\"A4\\\";s:1:\\\"6\\\";s:2:\\\"A5\\\";s:1:\\\"7\\\";s:2:\\\"A8\\\";s:1:\\\"8\\\";s:2:\\\"A9\\\";s:1:\\\"7\\\";s:3:\\\"A10\\\";s:1:\\\"7\\\";}s:2:\\\"A4\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1429\\\";s:2:\\\"A3\\\";s:6:\\\"0.1667\\\";s:2:\\\"A4\\\";s:1:\\\"1\\\";s:2:\\\"A5\\\";s:1:\\\"5\\\";s:2:\\\"A8\\\";s:1:\\\"7\\\";s:2:\\\"A9\\\";s:1:\\\"5\\\";s:3:\\\"A10\\\";s:1:\\\"4\\\";}s:2:\\\"A5\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1111\\\";s:2:\\\"A3\\\";s:6:\\\"0.1429\\\";s:2:\\\"A4\\\";s:6:\\\"0.2000\\\";s:2:\\\"A5\\\";s:1:\\\"1\\\";s:2:\\\"A8\\\";s:1:\\\"4\\\";s:2:\\\"A9\\\";s:1:\\\"4\\\";s:3:\\\"A10\\\";s:1:\\\"4\\\";}s:2:\\\"A8\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2000\\\";s:2:\\\"A3\\\";s:6:\\\"0.1250\\\";s:2:\\\"A4\\\";s:6:\\\"0.1429\\\";s:2:\\\"A5\\\";s:6:\\\"0.2500\\\";s:2:\\\"A8\\\";s:1:\\\"1\\\";s:2:\\\"A9\\\";s:1:\\\"4\\\";s:3:\\\"A10\\\";s:1:\\\"4\\\";}s:2:\\\"A9\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1429\\\";s:2:\\\"A3\\\";s:6:\\\"0.1429\\\";s:2:\\\"A4\\\";s:6:\\\"0.2000\\\";s:2:\\\"A5\\\";s:6:\\\"0.2500\\\";s:2:\\\"A8\\\";s:6:\\\"0.2500\\\";s:2:\\\"A9\\\";s:1:\\\"1\\\";s:3:\\\"A10\\\";s:1:\\\"4\\\";}s:3:\\\"A10\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2000\\\";s:2:\\\"A3\\\";s:6:\\\"0.1429\\\";s:2:\\\"A4\\\";s:6:\\\"0.2500\\\";s:2:\\\"A5\\\";s:6:\\\"0.2500\\\";s:2:\\\"A8\\\";s:6:\\\"0.2500\\\";s:2:\\\"A9\\\";s:6:\\\"0.2500\\\";s:3:\\\"A10\\\";s:1:\\\"1\\\";}}s:2:\\\"K3\\\";a:7:{s:2:\\\"A2\\\";a:7:{s:2:\\\"A2\\\";s:1:\\\"1\\\";s:2:\\\"A3\\\";s:1:\\\"4\\\";s:2:\\\"A4\\\";s:1:\\\"5\\\";s:2:\\\"A5\\\";s:1:\\\"5\\\";s:2:\\\"A8\\\";s:1:\\\"6\\\";s:2:\\\"A9\\\";s:1:\\\"4\\\";s:3:\\\"A10\\\";s:1:\\\"7\\\";}s:2:\\\"A3\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2500\\\";s:2:\\\"A3\\\";s:1:\\\"1\\\";s:2:\\\"A4\\\";s:1:\\\"4\\\";s:2:\\\"A5\\\";s:1:\\\"5\\\";s:2:\\\"A8\\\";s:1:\\\"5\\\";s:2:\\\"A9\\\";s:1:\\\"6\\\";s:3:\\\"A10\\\";s:1:\\\"6\\\";}s:2:\\\"A4\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2000\\\";s:2:\\\"A3\\\";s:6:\\\"0.2500\\\";s:2:\\\"A4\\\";s:1:\\\"1\\\";s:2:\\\"A5\\\";s:1:\\\"5\\\";s:2:\\\"A8\\\";s:1:\\\"5\\\";s:2:\\\"A9\\\";s:1:\\\"5\\\";s:3:\\\"A10\\\";s:1:\\\"6\\\";}s:2:\\\"A5\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2000\\\";s:2:\\\"A3\\\";s:6:\\\"0.2000\\\";s:2:\\\"A4\\\";s:6:\\\"0.2000\\\";s:2:\\\"A5\\\";s:1:\\\"1\\\";s:2:\\\"A8\\\";s:1:\\\"4\\\";s:2:\\\"A9\\\";s:1:\\\"5\\\";s:3:\\\"A10\\\";s:1:\\\"6\\\";}s:2:\\\"A8\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1667\\\";s:2:\\\"A3\\\";s:6:\\\"0.2000\\\";s:2:\\\"A4\\\";s:6:\\\"0.2000\\\";s:2:\\\"A5\\\";s:6:\\\"0.2500\\\";s:2:\\\"A8\\\";s:1:\\\"1\\\";s:2:\\\"A9\\\";s:1:\\\"5\\\";s:3:\\\"A10\\\";s:1:\\\"5\\\";}s:2:\\\"A9\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.2500\\\";s:2:\\\"A3\\\";s:6:\\\"0.1667\\\";s:2:\\\"A4\\\";s:6:\\\"0.2000\\\";s:2:\\\"A5\\\";s:6:\\\"0.2000\\\";s:2:\\\"A8\\\";s:6:\\\"0.2000\\\";s:2:\\\"A9\\\";s:1:\\\"1\\\";s:3:\\\"A10\\\";s:1:\\\"8\\\";}s:3:\\\"A10\\\";a:7:{s:2:\\\"A2\\\";s:6:\\\"0.1429\\\";s:2:\\\"A3\\\";s:6:\\\"0.1667\\\";s:2:\\\"A4\\\";s:6:\\\"0.1667\\\";s:2:\\\"A5\\\";s:6:\\\"0.1667\\\";s:2:\\\"A8\\\";s:6:\\\"0.2000\\\";s:2:\\\"A9\\\";s:6:\\\"0.1250\\\";s:3:\\\"A10\\\";s:1:\\\"1\\\";}}}}}\"}}', 'Exception: Data perbandingan karyawan gagal disimpan in D:\\Web Project\\kinerja-ahp\\app\\Jobs\\PerhitunganAlternatifJob.php:57\nStack trace:\n#0 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\PerhitunganAlternatifJob->handle()\n#1 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#2 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#3 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#4 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#5 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#6 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\PerhitunganAlternatifJob))\n#7 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\PerhitunganAlternatifJob))\n#8 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#9 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(123): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\PerhitunganAlternatifJob), false)\n#10 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(141): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\PerhitunganAlternatifJob))\n#11 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(116): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\PerhitunganAlternatifJob))\n#12 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(122): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#13 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\PerhitunganAlternatifJob))\n#14 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#15 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#16 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#17 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#18 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(137): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#19 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(120): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#20 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#21 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#22 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#23 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(35): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#24 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#25 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#26 D:\\Web Project\\kinerja-ahp\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#27 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(180): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#28 D:\\Web Project\\kinerja-ahp\\vendor\\symfony\\console\\Application.php(1081): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#29 D:\\Web Project\\kinerja-ahp\\vendor\\symfony\\console\\Application.php(320): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#30 D:\\Web Project\\kinerja-ahp\\vendor\\symfony\\console\\Application.php(174): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#31 D:\\Web Project\\kinerja-ahp\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#32 D:\\Web Project\\kinerja-ahp\\artisan(35): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#33 {main}', '2024-08-10 02:51:54');

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

--
-- Dumping data for table `group_karyawan`
--

INSERT INTO `group_karyawan` (`id_group_karyawan`, `nama_group_karyawan`, `kepala_sekolah`, `created_at`, `updated_at`) VALUES
(1, 'Taman Kanak-Kanak', 'A2', '2024-06-15 02:29:21', '2024-08-14 05:23:51'),
(2, 'Sekolah Dasar', 'A11', '2024-06-15 02:32:42', '2024-06-15 02:32:42'),
(3, 'Sekolah menengah Pertama', 'A26', '2024-06-28 04:57:00', '2024-06-28 04:57:00');

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

--
-- Dumping data for table `group_karyawan_detail`
--

INSERT INTO `group_karyawan_detail` (`id_group_karyawan_detail`, `id_group_karyawan`, `kode_alternatif`, `created_at`, `updated_at`) VALUES
(7, 2, 'A21', '2024-06-15 02:32:42', '2024-06-15 02:32:42'),
(8, 2, 'A12', '2024-06-15 02:32:42', '2024-06-15 02:32:42'),
(9, 2, 'A25', '2024-06-15 02:32:42', '2024-06-15 02:32:42'),
(10, 2, 'A23', '2024-06-15 02:32:42', '2024-06-15 02:32:42'),
(11, 2, 'A22', '2024-06-15 02:32:42', '2024-06-15 02:32:42'),
(12, 2, 'A15', '2024-06-15 02:32:42', '2024-06-15 02:32:42'),
(13, 2, 'A24', '2024-06-15 02:32:42', '2024-06-15 02:32:42'),
(14, 2, 'A16', '2024-06-15 02:32:42', '2024-06-15 02:32:42'),
(15, 2, 'A14', '2024-06-15 02:32:42', '2024-06-15 02:32:42'),
(16, 2, 'A20', '2024-06-15 02:32:42', '2024-06-15 02:32:42'),
(17, 2, 'A19', '2024-06-15 02:32:42', '2024-06-15 02:32:42'),
(18, 2, 'A13', '2024-06-15 02:32:42', '2024-06-15 02:32:42'),
(19, 2, 'A7', '2024-06-15 02:32:42', '2024-06-15 02:32:42'),
(20, 2, 'A17', '2024-06-15 02:32:42', '2024-06-15 02:32:42'),
(21, 2, 'A18', '2024-06-15 02:32:42', '2024-06-15 02:32:42'),
(22, 3, 'A47', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(23, 3, 'A49', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(24, 3, 'A28', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(25, 3, 'A27', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(26, 3, 'A50', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(27, 3, 'A37', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(28, 3, 'A32', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(29, 3, 'A41', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(30, 3, 'A31', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(31, 3, 'A33', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(32, 3, 'A48', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(33, 3, 'A51', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(34, 3, 'A34', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(35, 3, 'A40', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(36, 3, 'A39', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(37, 3, 'A38', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(38, 3, 'A42', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(39, 3, 'A35', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(40, 3, 'A36', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(41, 3, 'A29', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(42, 3, 'A43', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(43, 3, 'A30', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(44, 3, 'A46', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(45, 3, 'A44', '2024-06-28 04:57:00', '2024-06-28 04:57:00'),
(46, 1, 'A9', '2024-08-14 05:23:51', '2024-08-14 05:23:51'),
(47, 1, 'A4', '2024-08-14 05:23:51', '2024-08-14 05:23:51'),
(48, 1, 'A3', '2024-08-14 05:23:51', '2024-08-14 05:23:51'),
(49, 1, 'A8', '2024-08-14 05:23:51', '2024-08-14 05:23:51'),
(50, 1, 'A10', '2024-08-14 05:23:51', '2024-08-14 05:23:51'),
(51, 1, 'A5', '2024-08-14 05:23:51', '2024-08-14 05:23:51');

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

--
-- Dumping data for table `group_penilaian`
--

INSERT INTO `group_penilaian` (`id_group_penilaian`, `id_group_karyawan`, `alternatif_pertama`, `created_at`, `updated_at`) VALUES
(1, 1, 'A2', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(2, 1, 'A9', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(3, 1, 'A4', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(4, 1, 'A3', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(5, 1, 'A8', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(6, 1, 'A10', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(7, 1, 'A5', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(8, 2, 'A11', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(9, 2, 'A21', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(10, 2, 'A12', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(11, 2, 'A25', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(12, 2, 'A23', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(13, 2, 'A22', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(14, 2, 'A15', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(15, 2, 'A24', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(16, 2, 'A16', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(17, 2, 'A14', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(18, 2, 'A20', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(19, 2, 'A19', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(20, 2, 'A13', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(21, 2, 'A7', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(22, 2, 'A17', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(23, 2, 'A18', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(24, 3, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(25, 3, 'A47', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(26, 3, 'A49', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(27, 3, 'A28', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(28, 3, 'A27', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(29, 3, 'A50', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(30, 3, 'A37', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(31, 3, 'A32', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(32, 3, 'A41', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(33, 3, 'A31', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(34, 3, 'A33', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(35, 3, 'A48', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(36, 3, 'A51', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(37, 3, 'A34', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(38, 3, 'A40', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(39, 3, 'A39', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(40, 3, 'A38', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(41, 3, 'A42', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(42, 3, 'A35', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(43, 3, 'A36', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(44, 3, 'A29', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(45, 3, 'A43', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(46, 3, 'A30', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(47, 3, 'A46', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(48, 3, 'A44', '2024-06-28 05:02:08', '2024-06-28 05:02:08');

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

--
-- Dumping data for table `group_penilaian_detail`
--

INSERT INTO `group_penilaian_detail` (`id_group_penilaian_detail`, `id_group_penilaian`, `alternatif_kedua`, `created_at`, `updated_at`) VALUES
(1, 1, 'A9', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(2, 1, 'A4', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(3, 1, 'A3', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(4, 1, 'A8', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(5, 1, 'A10', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(6, 1, 'A5', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(7, 2, 'A2', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(8, 2, 'A4', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(9, 2, 'A3', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(10, 2, 'A8', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(11, 2, 'A10', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(12, 2, 'A5', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(13, 3, 'A2', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(14, 3, 'A9', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(15, 3, 'A3', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(16, 3, 'A8', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(17, 3, 'A10', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(18, 3, 'A5', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(19, 4, 'A2', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(20, 4, 'A9', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(21, 4, 'A4', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(22, 4, 'A8', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(23, 4, 'A10', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(24, 4, 'A5', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(25, 5, 'A2', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(26, 5, 'A9', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(27, 5, 'A4', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(28, 5, 'A3', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(29, 5, 'A10', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(30, 5, 'A5', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(31, 6, 'A2', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(32, 6, 'A9', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(33, 6, 'A4', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(34, 6, 'A3', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(35, 6, 'A8', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(36, 6, 'A5', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(37, 7, 'A2', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(38, 7, 'A9', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(39, 7, 'A4', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(40, 7, 'A3', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(41, 7, 'A8', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(42, 7, 'A10', '2024-06-15 02:30:36', '2024-06-15 02:30:36'),
(43, 8, 'A21', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(44, 8, 'A12', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(45, 8, 'A25', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(46, 8, 'A23', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(47, 8, 'A22', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(48, 8, 'A15', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(49, 8, 'A24', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(50, 8, 'A16', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(51, 8, 'A14', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(52, 8, 'A20', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(53, 8, 'A19', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(54, 8, 'A13', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(55, 8, 'A7', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(56, 8, 'A17', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(57, 8, 'A18', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(58, 9, 'A11', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(59, 9, 'A12', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(60, 9, 'A25', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(61, 9, 'A23', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(62, 9, 'A22', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(63, 10, 'A11', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(64, 10, 'A21', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(65, 10, 'A25', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(66, 10, 'A23', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(67, 10, 'A22', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(68, 11, 'A11', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(69, 11, 'A21', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(70, 11, 'A12', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(71, 11, 'A23', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(72, 11, 'A22', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(73, 12, 'A11', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(74, 12, 'A21', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(75, 12, 'A12', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(76, 12, 'A25', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(77, 12, 'A22', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(78, 13, 'A11', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(79, 13, 'A21', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(80, 13, 'A12', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(81, 13, 'A25', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(82, 13, 'A23', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(83, 14, 'A11', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(84, 14, 'A24', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(85, 14, 'A16', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(86, 14, 'A14', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(87, 14, 'A20', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(88, 15, 'A11', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(89, 15, 'A15', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(90, 15, 'A16', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(91, 15, 'A14', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(92, 15, 'A20', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(93, 16, 'A11', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(94, 16, 'A15', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(95, 16, 'A24', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(96, 16, 'A14', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(97, 16, 'A20', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(98, 17, 'A11', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(99, 17, 'A15', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(100, 17, 'A24', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(101, 17, 'A16', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(102, 17, 'A20', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(103, 18, 'A11', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(104, 18, 'A15', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(105, 18, 'A24', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(106, 18, 'A16', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(107, 18, 'A14', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(108, 19, 'A11', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(109, 19, 'A13', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(110, 19, 'A7', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(111, 19, 'A17', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(112, 19, 'A18', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(113, 20, 'A11', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(114, 20, 'A19', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(115, 20, 'A7', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(116, 20, 'A17', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(117, 20, 'A18', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(118, 21, 'A11', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(119, 21, 'A19', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(120, 21, 'A13', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(121, 21, 'A17', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(122, 21, 'A18', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(123, 22, 'A11', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(124, 22, 'A19', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(125, 22, 'A13', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(126, 22, 'A7', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(127, 22, 'A18', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(128, 23, 'A11', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(129, 23, 'A19', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(130, 23, 'A13', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(131, 23, 'A7', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(132, 23, 'A17', '2024-06-15 02:35:33', '2024-06-15 02:35:33'),
(133, 24, 'A47', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(134, 24, 'A49', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(135, 24, 'A28', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(136, 24, 'A27', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(137, 24, 'A50', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(138, 24, 'A37', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(139, 24, 'A32', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(140, 24, 'A41', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(141, 24, 'A31', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(142, 24, 'A33', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(143, 24, 'A48', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(144, 24, 'A51', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(145, 24, 'A34', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(146, 24, 'A40', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(147, 24, 'A39', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(148, 24, 'A38', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(149, 24, 'A42', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(150, 24, 'A35', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(151, 24, 'A36', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(152, 24, 'A29', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(153, 24, 'A43', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(154, 24, 'A30', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(155, 24, 'A46', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(156, 24, 'A44', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(157, 25, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(158, 25, 'A49', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(159, 25, 'A28', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(160, 25, 'A27', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(161, 25, 'A50', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(162, 26, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(163, 26, 'A47', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(164, 26, 'A28', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(165, 26, 'A27', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(166, 26, 'A50', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(167, 27, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(168, 27, 'A47', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(169, 27, 'A49', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(170, 27, 'A27', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(171, 27, 'A50', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(172, 28, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(173, 28, 'A47', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(174, 28, 'A49', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(175, 28, 'A28', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(176, 28, 'A50', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(177, 29, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(178, 29, 'A47', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(179, 29, 'A49', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(180, 29, 'A28', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(181, 29, 'A27', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(182, 30, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(183, 30, 'A32', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(184, 30, 'A41', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(185, 30, 'A31', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(186, 30, 'A33', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(187, 31, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(188, 31, 'A37', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(189, 31, 'A41', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(190, 31, 'A31', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(191, 31, 'A33', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(192, 32, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(193, 32, 'A37', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(194, 32, 'A32', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(195, 32, 'A31', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(196, 32, 'A33', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(197, 33, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(198, 33, 'A37', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(199, 33, 'A32', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(200, 33, 'A41', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(201, 33, 'A33', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(202, 34, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(203, 34, 'A37', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(204, 34, 'A32', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(205, 34, 'A41', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(206, 34, 'A31', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(207, 35, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(208, 35, 'A51', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(209, 35, 'A34', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(210, 35, 'A40', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(211, 35, 'A39', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(212, 36, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(213, 36, 'A48', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(214, 36, 'A34', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(215, 36, 'A40', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(216, 36, 'A39', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(217, 37, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(218, 37, 'A48', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(219, 37, 'A51', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(220, 37, 'A40', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(221, 37, 'A39', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(222, 38, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(223, 38, 'A48', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(224, 38, 'A51', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(225, 38, 'A34', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(226, 38, 'A39', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(227, 39, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(228, 39, 'A48', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(229, 39, 'A51', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(230, 39, 'A34', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(231, 39, 'A40', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(232, 40, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(233, 40, 'A42', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(234, 40, 'A35', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(235, 40, 'A36', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(236, 40, 'A29', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(237, 41, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(238, 41, 'A38', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(239, 41, 'A35', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(240, 41, 'A36', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(241, 41, 'A29', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(242, 42, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(243, 42, 'A38', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(244, 42, 'A42', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(245, 42, 'A36', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(246, 42, 'A29', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(247, 43, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(248, 43, 'A38', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(249, 43, 'A42', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(250, 43, 'A35', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(251, 43, 'A29', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(252, 44, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(253, 44, 'A38', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(254, 44, 'A42', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(255, 44, 'A35', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(256, 44, 'A36', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(257, 45, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(258, 45, 'A30', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(259, 45, 'A46', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(260, 45, 'A44', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(261, 46, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(262, 46, 'A43', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(263, 46, 'A46', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(264, 46, 'A44', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(265, 47, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(266, 47, 'A43', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(267, 47, 'A30', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(268, 47, 'A44', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(269, 48, 'A26', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(270, 48, 'A43', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(271, 48, 'A30', '2024-06-28 05:02:08', '2024-06-28 05:02:08'),
(272, 48, 'A46', '2024-06-28 05:02:08', '2024-06-28 05:02:08');

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
(46, '2024_01_01_000046_create_fk_ranking_table', 2),
(47, '2024_07_05_193256_create_permission_tables', 3),
(48, '2024_07_31_101903_create_tanggal_penilaian_table', 4),
(49, '2024_08_01_033816_create_fk_tanggal_penilaian_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 4),
(9, 'App\\Models\\User', 4),
(10, 'App\\Models\\User', 4),
(11, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 63),
(2, 'App\\Models\\User', 63),
(3, 'App\\Models\\User', 63),
(4, 'App\\Models\\User', 63),
(5, 'App\\Models\\User', 63),
(6, 'App\\Models\\User', 63),
(10, 'App\\Models\\User', 63),
(11, 'App\\Models\\User', 63);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(5, 'App\\Models\\User', 3),
(5, 'App\\Models\\User', 4),
(6, 'App\\Models\\User', 5),
(6, 'App\\Models\\User', 6),
(6, 'App\\Models\\User', 7),
(7, 'App\\Models\\User', 8),
(7, 'App\\Models\\User', 9),
(7, 'App\\Models\\User', 10),
(7, 'App\\Models\\User', 11),
(7, 'App\\Models\\User', 12),
(7, 'App\\Models\\User', 13),
(7, 'App\\Models\\User', 14),
(7, 'App\\Models\\User', 15),
(7, 'App\\Models\\User', 16),
(7, 'App\\Models\\User', 17),
(7, 'App\\Models\\User', 18),
(7, 'App\\Models\\User', 19),
(7, 'App\\Models\\User', 20),
(7, 'App\\Models\\User', 21),
(7, 'App\\Models\\User', 22),
(7, 'App\\Models\\User', 23),
(7, 'App\\Models\\User', 24),
(7, 'App\\Models\\User', 25),
(7, 'App\\Models\\User', 26),
(7, 'App\\Models\\User', 27),
(7, 'App\\Models\\User', 28),
(7, 'App\\Models\\User', 29),
(7, 'App\\Models\\User', 30),
(7, 'App\\Models\\User', 31),
(7, 'App\\Models\\User', 32),
(7, 'App\\Models\\User', 33),
(7, 'App\\Models\\User', 34),
(7, 'App\\Models\\User', 35),
(7, 'App\\Models\\User', 36),
(7, 'App\\Models\\User', 37),
(7, 'App\\Models\\User', 38),
(7, 'App\\Models\\User', 39),
(7, 'App\\Models\\User', 40),
(7, 'App\\Models\\User', 41),
(7, 'App\\Models\\User', 42),
(7, 'App\\Models\\User', 43),
(7, 'App\\Models\\User', 44),
(7, 'App\\Models\\User', 45),
(7, 'App\\Models\\User', 46),
(7, 'App\\Models\\User', 47),
(7, 'App\\Models\\User', 48),
(7, 'App\\Models\\User', 49),
(7, 'App\\Models\\User', 50),
(7, 'App\\Models\\User', 51),
(7, 'App\\Models\\User', 52),
(7, 'App\\Models\\User', 53),
(8, 'App\\Models\\User', 54),
(8, 'App\\Models\\User', 55),
(8, 'App\\Models\\User', 56),
(8, 'App\\Models\\User', 57),
(8, 'App\\Models\\User', 58),
(10, 'App\\Models\\User', 59),
(11, 'App\\Models\\User', 60),
(1, 'App\\Models\\User', 61),
(3, 'App\\Models\\User', 61),
(3, 'App\\Models\\User', 62),
(4, 'App\\Models\\User', 63);

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
(1, '1', 60, '2024-05-30 12:30:10', '2024-06-28 00:44:35'),
(2, '2', 75, '2024-05-30 12:30:10', '2024-06-28 00:44:35'),
(3, '3', 85, '2024-05-30 12:30:10', '2024-06-28 00:44:35'),
(4, '4', 100, '2024-05-30 12:30:10', '2024-06-28 00:44:35');

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
  `id_tanggal_penilaian` bigint UNSIGNED NOT NULL,
  `alternatif_pertama` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternatif_kedua` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Disetujui','Tidak Disetujui') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_tanggal_penilaian`, `alternatif_pertama`, `alternatif_kedua`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'A2', 'A2', 'Disetujui', '2024-08-11 07:48:51', '2024-08-14 06:01:02'),
(2, 1, 'A2', 'A9', 'Disetujui', '2024-08-11 07:53:43', '2024-08-11 08:09:17'),
(3, 1, 'A2', 'A4', 'Disetujui', '2024-08-11 07:53:43', '2024-08-11 07:53:43'),
(4, 1, 'A2', 'A3', 'Disetujui', '2024-08-11 07:53:43', '2024-08-11 07:53:43'),
(5, 1, 'A2', 'A8', 'Disetujui', '2024-08-11 07:53:43', '2024-08-11 07:53:43'),
(6, 1, 'A2', 'A10', 'Disetujui', '2024-08-11 07:53:43', '2024-08-11 07:53:43'),
(7, 1, 'A2', 'A5', 'Disetujui', '2024-08-11 07:53:43', '2024-08-11 07:53:43'),
(8, 1, 'A9', 'A9', 'Disetujui', '2024-08-11 08:24:44', '2024-08-11 08:24:44'),
(9, 1, 'A9', 'A2', 'Disetujui', '2024-08-11 08:24:44', '2024-08-11 08:24:44'),
(10, 1, 'A9', 'A4', 'Disetujui', '2024-08-11 08:24:44', '2024-08-11 08:24:44'),
(11, 1, 'A9', 'A3', 'Disetujui', '2024-08-11 08:24:44', '2024-08-11 08:24:44'),
(12, 1, 'A9', 'A8', 'Disetujui', '2024-08-11 08:24:44', '2024-08-11 08:24:44'),
(13, 1, 'A9', 'A10', 'Disetujui', '2024-08-11 08:24:44', '2024-08-11 08:24:44'),
(14, 1, 'A9', 'A5', 'Disetujui', '2024-08-11 08:24:44', '2024-08-11 08:24:44'),
(15, 1, 'A4', 'A4', 'Disetujui', '2024-08-11 08:27:02', '2024-08-11 08:27:02'),
(16, 1, 'A4', 'A2', 'Disetujui', '2024-08-11 08:27:02', '2024-08-11 08:27:02'),
(17, 1, 'A4', 'A9', 'Disetujui', '2024-08-11 08:27:02', '2024-08-11 08:27:02'),
(18, 1, 'A4', 'A3', 'Disetujui', '2024-08-11 08:27:02', '2024-08-11 08:27:02'),
(19, 1, 'A4', 'A8', 'Disetujui', '2024-08-11 08:27:02', '2024-08-11 08:27:02'),
(20, 1, 'A4', 'A10', 'Disetujui', '2024-08-11 08:27:02', '2024-08-11 08:27:02'),
(21, 1, 'A4', 'A5', 'Disetujui', '2024-08-11 08:27:02', '2024-08-11 08:27:02'),
(22, 1, 'A3', 'A3', 'Disetujui', '2024-08-11 08:29:13', '2024-08-11 08:29:13'),
(23, 1, 'A3', 'A2', 'Disetujui', '2024-08-11 08:29:13', '2024-08-11 08:29:13'),
(24, 1, 'A3', 'A9', 'Disetujui', '2024-08-11 08:29:13', '2024-08-11 08:29:13'),
(25, 1, 'A3', 'A4', 'Disetujui', '2024-08-11 08:29:13', '2024-08-11 08:29:13'),
(26, 1, 'A3', 'A8', 'Disetujui', '2024-08-11 08:29:13', '2024-08-11 08:29:13'),
(27, 1, 'A3', 'A10', 'Disetujui', '2024-08-11 08:29:13', '2024-08-11 08:29:13'),
(28, 1, 'A3', 'A5', 'Disetujui', '2024-08-11 08:29:13', '2024-08-11 08:29:13'),
(29, 1, 'A8', 'A8', 'Disetujui', '2024-08-11 08:30:23', '2024-08-11 08:30:23'),
(30, 1, 'A8', 'A2', 'Disetujui', '2024-08-11 08:30:23', '2024-08-11 08:30:23'),
(31, 1, 'A8', 'A9', 'Disetujui', '2024-08-11 08:30:23', '2024-08-11 08:30:23'),
(32, 1, 'A8', 'A4', 'Disetujui', '2024-08-11 08:30:23', '2024-08-11 08:30:23'),
(33, 1, 'A8', 'A3', 'Disetujui', '2024-08-11 08:30:23', '2024-08-11 08:30:23'),
(34, 1, 'A8', 'A10', 'Disetujui', '2024-08-11 08:30:23', '2024-08-11 08:30:23'),
(35, 1, 'A8', 'A5', 'Disetujui', '2024-08-11 08:30:23', '2024-08-11 08:30:23'),
(36, 1, 'A10', 'A10', 'Disetujui', '2024-08-11 08:31:49', '2024-08-11 08:31:49'),
(37, 1, 'A10', 'A2', 'Disetujui', '2024-08-11 08:31:49', '2024-08-11 08:31:49'),
(38, 1, 'A10', 'A9', 'Disetujui', '2024-08-11 08:31:49', '2024-08-11 08:31:49'),
(39, 1, 'A10', 'A4', 'Disetujui', '2024-08-11 08:31:49', '2024-08-11 08:31:49'),
(40, 1, 'A10', 'A3', 'Disetujui', '2024-08-11 08:31:49', '2024-08-11 08:31:49'),
(41, 1, 'A10', 'A8', 'Disetujui', '2024-08-11 08:31:49', '2024-08-11 08:31:49'),
(42, 1, 'A10', 'A5', 'Disetujui', '2024-08-11 08:31:49', '2024-08-11 08:31:49'),
(43, 1, 'A5', 'A5', 'Disetujui', '2024-08-11 08:32:50', '2024-08-11 08:32:50'),
(44, 1, 'A5', 'A2', 'Disetujui', '2024-08-11 08:32:50', '2024-08-11 08:32:50'),
(45, 1, 'A5', 'A9', 'Disetujui', '2024-08-11 08:32:50', '2024-08-11 08:32:50'),
(46, 1, 'A5', 'A4', 'Disetujui', '2024-08-11 08:32:50', '2024-08-11 08:32:50'),
(47, 1, 'A5', 'A3', 'Disetujui', '2024-08-11 08:32:50', '2024-08-11 08:32:50'),
(48, 1, 'A5', 'A8', 'Disetujui', '2024-08-11 08:32:50', '2024-08-11 08:32:50'),
(49, 1, 'A5', 'A10', 'Disetujui', '2024-08-11 08:32:50', '2024-08-11 08:32:50');

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

--
-- Dumping data for table `penilaian_indikator`
--

INSERT INTO `penilaian_indikator` (`id_penilaian_indikator`, `id_penilaian`, `id_skala_indikator_detail`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(2, 1, 7, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(3, 1, 10, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(4, 1, 15, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(5, 1, 18, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(6, 1, 23, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(7, 1, 26, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(8, 1, 32, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(9, 1, 35, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(10, 1, 38, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(11, 1, 43, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(12, 1, 48, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(13, 1, 51, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(14, 1, 54, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(15, 1, 59, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(16, 1, 64, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(17, 1, 67, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(18, 1, 70, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(19, 1, 75, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(20, 1, 78, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(21, 1, 83, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(22, 1, 88, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(23, 1, 90, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(24, 1, 96, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(25, 1, 98, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(26, 1, 103, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(27, 1, 106, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(28, 1, 110, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(29, 1, 115, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(30, 1, 119, '2024-08-11 07:48:51', '2024-08-11 07:48:51'),
(31, 2, 3, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(32, 2, 8, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(33, 2, 12, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(34, 2, 15, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(35, 2, 20, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(36, 2, 24, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(37, 2, 26, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(38, 2, 31, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(39, 2, 36, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(40, 2, 40, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(41, 2, 43, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(42, 2, 46, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(43, 2, 50, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(44, 2, 54, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(45, 2, 58, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(46, 2, 63, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(47, 2, 67, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(48, 2, 72, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(49, 2, 74, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(50, 2, 78, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(51, 2, 84, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(52, 2, 88, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(53, 2, 91, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(54, 2, 94, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(55, 2, 100, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(56, 2, 103, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(57, 2, 107, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(58, 2, 110, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(59, 2, 116, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(60, 2, 118, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(61, 3, 3, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(62, 3, 6, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(63, 3, 10, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(64, 3, 14, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(65, 3, 20, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(66, 3, 24, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(67, 3, 28, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(68, 3, 31, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(69, 3, 35, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(70, 3, 40, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(71, 3, 42, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(72, 3, 46, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(73, 3, 52, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(74, 3, 55, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(75, 3, 59, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(76, 3, 63, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(77, 3, 68, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(78, 3, 70, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(79, 3, 74, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(80, 3, 78, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(81, 3, 84, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(82, 3, 86, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(83, 3, 91, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(84, 3, 95, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(85, 3, 98, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(86, 3, 104, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(87, 3, 108, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(88, 3, 112, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(89, 3, 115, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(90, 3, 120, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(91, 4, 3, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(92, 4, 6, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(93, 4, 12, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(94, 4, 14, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(95, 4, 18, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(96, 4, 23, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(97, 4, 26, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(98, 4, 32, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(99, 4, 34, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(100, 4, 39, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(101, 4, 44, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(102, 4, 47, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(103, 4, 51, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(104, 4, 55, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(105, 4, 60, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(106, 4, 64, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(107, 4, 66, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(108, 4, 72, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(109, 4, 74, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(110, 4, 79, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(111, 4, 82, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(112, 4, 86, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(113, 4, 90, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(114, 4, 96, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(115, 4, 99, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(116, 4, 102, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(117, 4, 106, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(118, 4, 112, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(119, 4, 115, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(120, 4, 119, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(121, 5, 3, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(122, 5, 8, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(123, 5, 11, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(124, 5, 14, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(125, 5, 19, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(126, 5, 22, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(127, 5, 27, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(128, 5, 32, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(129, 5, 36, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(130, 5, 38, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(131, 5, 42, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(132, 5, 47, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(133, 5, 50, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(134, 5, 54, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(135, 5, 59, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(136, 5, 62, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(137, 5, 66, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(138, 5, 71, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(139, 5, 75, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(140, 5, 79, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(141, 5, 83, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(142, 5, 86, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(143, 5, 92, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(144, 5, 96, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(145, 5, 98, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(146, 5, 103, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(147, 5, 107, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(148, 5, 110, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(149, 5, 116, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(150, 5, 119, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(151, 6, 4, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(152, 6, 7, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(153, 6, 12, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(154, 6, 14, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(155, 6, 19, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(156, 6, 24, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(157, 6, 28, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(158, 6, 31, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(159, 6, 34, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(160, 6, 39, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(161, 6, 42, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(162, 6, 46, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(163, 6, 52, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(164, 6, 56, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(165, 6, 59, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(166, 6, 62, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(167, 6, 66, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(168, 6, 71, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(169, 6, 75, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(170, 6, 79, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(171, 6, 84, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(172, 6, 88, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(173, 6, 90, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(174, 6, 94, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(175, 6, 100, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(176, 6, 102, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(177, 6, 107, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(178, 6, 111, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(179, 6, 114, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(180, 6, 120, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(181, 7, 3, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(182, 7, 8, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(183, 7, 11, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(184, 7, 16, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(185, 7, 18, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(186, 7, 24, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(187, 7, 26, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(188, 7, 32, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(189, 7, 35, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(190, 7, 38, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(191, 7, 43, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(192, 7, 47, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(193, 7, 50, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(194, 7, 55, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(195, 7, 60, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(196, 7, 62, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(197, 7, 68, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(198, 7, 70, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(199, 7, 74, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(200, 7, 78, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(201, 7, 83, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(202, 7, 88, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(203, 7, 92, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(204, 7, 95, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(205, 7, 98, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(206, 7, 102, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(207, 7, 106, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(208, 7, 110, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(209, 7, 114, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(210, 7, 119, '2024-08-11 07:59:44', '2024-08-11 07:59:44'),
(211, 8, 2, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(212, 8, 8, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(213, 8, 10, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(214, 8, 14, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(215, 8, 20, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(216, 8, 23, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(217, 8, 26, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(218, 8, 30, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(219, 8, 35, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(220, 8, 38, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(221, 8, 43, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(222, 8, 48, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(223, 8, 50, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(224, 8, 55, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(225, 8, 60, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(226, 8, 64, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(227, 8, 67, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(228, 8, 70, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(229, 8, 76, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(230, 8, 78, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(231, 8, 83, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(232, 8, 86, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(233, 8, 90, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(234, 8, 94, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(235, 8, 100, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(236, 8, 103, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(237, 8, 108, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(238, 8, 111, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(239, 8, 115, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(240, 8, 119, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(241, 9, 2, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(242, 9, 6, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(243, 9, 10, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(244, 9, 16, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(245, 9, 18, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(246, 9, 24, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(247, 9, 26, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(248, 9, 30, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(249, 9, 35, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(250, 9, 38, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(251, 9, 42, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(252, 9, 46, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(253, 9, 50, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(254, 9, 54, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(255, 9, 58, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(256, 9, 62, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(257, 9, 67, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(258, 9, 71, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(259, 9, 75, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(260, 9, 78, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(261, 9, 83, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(262, 9, 88, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(263, 9, 90, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(264, 9, 94, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(265, 9, 99, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(266, 9, 103, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(267, 9, 106, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(268, 9, 111, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(269, 9, 116, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(270, 9, 120, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(271, 10, 2, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(272, 10, 7, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(273, 10, 12, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(274, 10, 15, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(275, 10, 20, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(276, 10, 24, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(277, 10, 27, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(278, 10, 31, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(279, 10, 34, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(280, 10, 40, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(281, 10, 43, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(282, 10, 47, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(283, 10, 50, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(284, 10, 55, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(285, 10, 59, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(286, 10, 63, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(287, 10, 66, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(288, 10, 71, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(289, 10, 76, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(290, 10, 79, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(291, 10, 82, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(292, 10, 87, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(293, 10, 92, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(294, 10, 96, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(295, 10, 98, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(296, 10, 103, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(297, 10, 108, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(298, 10, 110, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(299, 10, 114, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(300, 10, 118, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(301, 11, 4, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(302, 11, 7, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(303, 11, 11, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(304, 11, 15, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(305, 11, 18, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(306, 11, 22, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(307, 11, 28, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(308, 11, 30, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(309, 11, 34, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(310, 11, 39, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(311, 11, 44, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(312, 11, 46, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(313, 11, 51, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(314, 11, 55, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(315, 11, 60, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(316, 11, 62, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(317, 11, 66, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(318, 11, 70, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(319, 11, 76, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(320, 11, 78, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(321, 11, 83, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(322, 11, 88, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(323, 11, 91, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(324, 11, 94, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(325, 11, 99, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(326, 11, 102, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(327, 11, 107, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(328, 11, 110, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(329, 11, 115, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(330, 11, 118, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(331, 12, 4, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(332, 12, 8, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(333, 12, 10, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(334, 12, 14, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(335, 12, 20, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(336, 12, 22, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(337, 12, 27, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(338, 12, 30, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(339, 12, 35, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(340, 12, 38, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(341, 12, 42, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(342, 12, 47, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(343, 12, 52, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(344, 12, 54, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(345, 12, 58, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(346, 12, 63, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(347, 12, 68, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(348, 12, 71, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(349, 12, 75, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(350, 12, 78, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(351, 12, 83, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(352, 12, 88, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(353, 12, 90, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(354, 12, 96, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(355, 12, 100, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(356, 12, 103, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(357, 12, 107, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(358, 12, 112, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(359, 12, 114, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(360, 12, 118, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(361, 13, 4, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(362, 13, 7, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(363, 13, 11, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(364, 13, 14, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(365, 13, 18, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(366, 13, 22, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(367, 13, 27, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(368, 13, 30, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(369, 13, 36, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(370, 13, 40, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(371, 13, 44, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(372, 13, 46, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(373, 13, 50, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(374, 13, 56, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(375, 13, 59, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(376, 13, 62, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(377, 13, 67, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(378, 13, 70, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(379, 13, 75, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(380, 13, 79, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(381, 13, 82, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(382, 13, 87, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(383, 13, 90, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(384, 13, 95, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(385, 13, 98, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(386, 13, 104, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(387, 13, 108, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(388, 13, 112, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(389, 13, 116, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(390, 13, 119, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(391, 14, 2, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(392, 14, 6, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(393, 14, 10, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(394, 14, 16, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(395, 14, 18, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(396, 14, 22, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(397, 14, 27, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(398, 14, 31, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(399, 14, 34, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(400, 14, 40, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(401, 14, 44, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(402, 14, 48, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(403, 14, 50, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(404, 14, 54, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(405, 14, 60, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(406, 14, 63, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(407, 14, 66, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(408, 14, 70, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(409, 14, 74, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(410, 14, 80, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(411, 14, 82, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(412, 14, 87, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(413, 14, 91, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(414, 14, 94, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(415, 14, 98, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(416, 14, 102, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(417, 14, 108, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(418, 14, 112, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(419, 14, 114, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(420, 14, 120, '2024-08-11 08:25:18', '2024-08-11 08:25:18'),
(421, 15, 2, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(422, 15, 8, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(423, 15, 12, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(424, 15, 16, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(425, 15, 19, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(426, 15, 23, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(427, 15, 27, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(428, 15, 31, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(429, 15, 36, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(430, 15, 38, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(431, 15, 42, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(432, 15, 48, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(433, 15, 50, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(434, 15, 55, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(435, 15, 59, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(436, 15, 62, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(437, 15, 66, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(438, 15, 72, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(439, 15, 76, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(440, 15, 78, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(441, 15, 82, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(442, 15, 88, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(443, 15, 92, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(444, 15, 95, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(445, 15, 99, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(446, 15, 104, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(447, 15, 106, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(448, 15, 112, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(449, 15, 116, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(450, 15, 120, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(451, 16, 3, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(452, 16, 6, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(453, 16, 10, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(454, 16, 14, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(455, 16, 18, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(456, 16, 23, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(457, 16, 28, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(458, 16, 30, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(459, 16, 35, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(460, 16, 40, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(461, 16, 43, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(462, 16, 48, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(463, 16, 51, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(464, 16, 54, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(465, 16, 58, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(466, 16, 64, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(467, 16, 68, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(468, 16, 72, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(469, 16, 74, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(470, 16, 78, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(471, 16, 82, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(472, 16, 88, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(473, 16, 90, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(474, 16, 96, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(475, 16, 100, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(476, 16, 102, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(477, 16, 107, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(478, 16, 112, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(479, 16, 116, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(480, 16, 118, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(481, 17, 2, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(482, 17, 8, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(483, 17, 12, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(484, 17, 15, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(485, 17, 19, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(486, 17, 24, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(487, 17, 28, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(488, 17, 30, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(489, 17, 35, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(490, 17, 40, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(491, 17, 42, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(492, 17, 47, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(493, 17, 52, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(494, 17, 54, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(495, 17, 58, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(496, 17, 63, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(497, 17, 68, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(498, 17, 71, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(499, 17, 75, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(500, 17, 78, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(501, 17, 84, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(502, 17, 86, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(503, 17, 92, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(504, 17, 94, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(505, 17, 99, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(506, 17, 102, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(507, 17, 108, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(508, 17, 110, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(509, 17, 115, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(510, 17, 120, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(511, 18, 3, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(512, 18, 6, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(513, 18, 12, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(514, 18, 15, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(515, 18, 20, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(516, 18, 22, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(517, 18, 27, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(518, 18, 30, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(519, 18, 34, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(520, 18, 40, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(521, 18, 44, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(522, 18, 46, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(523, 18, 51, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(524, 18, 54, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(525, 18, 58, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(526, 18, 63, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(527, 18, 66, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(528, 18, 70, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(529, 18, 76, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(530, 18, 79, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(531, 18, 83, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(532, 18, 86, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(533, 18, 91, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(534, 18, 94, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(535, 18, 99, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(536, 18, 103, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(537, 18, 108, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(538, 18, 112, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(539, 18, 115, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(540, 18, 120, '2024-08-11 08:27:30', '2024-08-11 08:27:30'),
(541, 19, 3, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(542, 19, 7, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(543, 19, 11, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(544, 19, 16, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(545, 19, 19, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(546, 19, 22, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(547, 19, 27, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(548, 19, 30, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(549, 19, 36, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(550, 19, 39, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(551, 19, 44, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(552, 19, 46, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(553, 19, 52, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(554, 19, 56, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(555, 19, 60, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(556, 19, 64, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(557, 19, 66, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(558, 19, 71, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(559, 19, 76, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(560, 19, 80, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(561, 19, 83, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(562, 19, 88, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(563, 19, 90, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(564, 19, 94, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(565, 19, 99, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(566, 19, 103, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(567, 19, 108, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(568, 19, 111, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(569, 19, 115, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(570, 19, 118, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(571, 20, 3, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(572, 20, 7, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(573, 20, 10, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(574, 20, 16, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(575, 20, 20, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(576, 20, 24, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(577, 20, 28, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(578, 20, 32, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(579, 20, 35, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(580, 20, 39, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(581, 20, 44, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(582, 20, 48, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(583, 20, 51, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(584, 20, 54, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(585, 20, 58, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(586, 20, 63, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(587, 20, 66, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(588, 20, 70, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(589, 20, 74, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(590, 20, 79, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(591, 20, 83, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(592, 20, 86, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(593, 20, 90, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(594, 20, 96, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(595, 20, 98, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(596, 20, 104, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(597, 20, 106, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(598, 20, 111, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(599, 20, 115, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(600, 20, 119, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(601, 21, 4, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(602, 21, 8, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(603, 21, 11, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(604, 21, 14, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(605, 21, 20, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(606, 21, 22, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(607, 21, 27, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(608, 21, 32, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(609, 21, 35, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(610, 21, 39, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(611, 21, 42, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(612, 21, 47, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(613, 21, 50, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(614, 21, 55, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(615, 21, 59, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(616, 21, 64, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(617, 21, 68, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(618, 21, 72, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(619, 21, 76, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(620, 21, 79, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(621, 21, 84, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(622, 21, 87, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(623, 21, 92, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(624, 21, 94, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(625, 21, 99, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(626, 21, 103, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(627, 21, 108, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(628, 21, 112, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(629, 21, 114, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(630, 21, 120, '2024-08-11 08:27:31', '2024-08-11 08:27:31'),
(631, 22, 2, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(632, 22, 6, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(633, 22, 10, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(634, 22, 14, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(635, 22, 19, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(636, 22, 24, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(637, 22, 28, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(638, 22, 31, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(639, 22, 35, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(640, 22, 38, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(641, 22, 42, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(642, 22, 46, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(643, 22, 52, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(644, 22, 55, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(645, 22, 60, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(646, 22, 63, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(647, 22, 66, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(648, 22, 71, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(649, 22, 76, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(650, 22, 78, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(651, 22, 83, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(652, 22, 88, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(653, 22, 92, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(654, 22, 94, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(655, 22, 99, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(656, 22, 103, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(657, 22, 108, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(658, 22, 110, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(659, 22, 114, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(660, 22, 120, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(661, 23, 2, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(662, 23, 7, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(663, 23, 12, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(664, 23, 16, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(665, 23, 18, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(666, 23, 24, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(667, 23, 26, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(668, 23, 31, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(669, 23, 35, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(670, 23, 38, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(671, 23, 44, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(672, 23, 47, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(673, 23, 50, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(674, 23, 55, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(675, 23, 58, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(676, 23, 63, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(677, 23, 67, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(678, 23, 72, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(679, 23, 74, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(680, 23, 79, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(681, 23, 83, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(682, 23, 86, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(683, 23, 91, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(684, 23, 96, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(685, 23, 99, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(686, 23, 103, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(687, 23, 107, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(688, 23, 112, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(689, 23, 115, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(690, 23, 119, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(691, 24, 3, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(692, 24, 8, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(693, 24, 10, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(694, 24, 15, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(695, 24, 18, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(696, 24, 24, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(697, 24, 26, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(698, 24, 32, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(699, 24, 36, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(700, 24, 40, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(701, 24, 44, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(702, 24, 46, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(703, 24, 50, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(704, 24, 55, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(705, 24, 58, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(706, 24, 64, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(707, 24, 66, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(708, 24, 71, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(709, 24, 75, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(710, 24, 80, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(711, 24, 83, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(712, 24, 86, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(713, 24, 92, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(714, 24, 94, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(715, 24, 100, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(716, 24, 102, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(717, 24, 107, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(718, 24, 110, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(719, 24, 116, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(720, 24, 120, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(721, 25, 3, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(722, 25, 6, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(723, 25, 11, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(724, 25, 16, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(725, 25, 18, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(726, 25, 22, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(727, 25, 28, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(728, 25, 30, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(729, 25, 35, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(730, 25, 40, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(731, 25, 44, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(732, 25, 46, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(733, 25, 52, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(734, 25, 55, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(735, 25, 59, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(736, 25, 62, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(737, 25, 68, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(738, 25, 70, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(739, 25, 75, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(740, 25, 80, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(741, 25, 84, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(742, 25, 86, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(743, 25, 90, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(744, 25, 95, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(745, 25, 98, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(746, 25, 104, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(747, 25, 106, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(748, 25, 112, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(749, 25, 115, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(750, 25, 118, '2024-08-11 08:29:48', '2024-08-11 08:29:48'),
(751, 26, 3, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(752, 26, 6, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(753, 26, 11, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(754, 26, 15, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(755, 26, 18, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(756, 26, 22, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(757, 26, 28, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(758, 26, 30, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(759, 26, 35, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(760, 26, 40, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(761, 26, 44, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(762, 26, 46, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(763, 26, 50, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(764, 26, 55, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(765, 26, 58, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(766, 26, 63, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(767, 26, 66, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(768, 26, 72, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(769, 26, 74, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(770, 26, 80, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(771, 26, 83, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(772, 26, 87, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(773, 26, 90, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(774, 26, 95, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(775, 26, 98, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(776, 26, 103, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(777, 26, 108, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(778, 26, 110, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(779, 26, 115, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(780, 26, 120, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(781, 27, 3, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(782, 27, 8, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(783, 27, 12, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(784, 27, 14, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(785, 27, 20, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(786, 27, 24, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(787, 27, 27, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(788, 27, 30, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(789, 27, 34, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(790, 27, 38, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(791, 27, 42, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(792, 27, 46, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(793, 27, 50, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(794, 27, 54, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(795, 27, 60, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(796, 27, 62, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(797, 27, 68, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(798, 27, 72, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(799, 27, 75, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(800, 27, 79, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(801, 27, 84, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(802, 27, 87, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(803, 27, 92, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(804, 27, 95, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(805, 27, 100, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(806, 27, 102, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(807, 27, 106, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(808, 27, 111, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(809, 27, 114, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(810, 27, 118, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(811, 28, 2, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(812, 28, 8, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(813, 28, 12, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(814, 28, 15, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(815, 28, 18, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(816, 28, 24, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(817, 28, 27, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(818, 28, 31, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(819, 28, 36, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(820, 28, 38, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(821, 28, 44, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(822, 28, 48, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(823, 28, 50, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(824, 28, 55, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(825, 28, 60, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(826, 28, 62, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(827, 28, 66, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(828, 28, 71, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(829, 28, 76, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(830, 28, 80, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(831, 28, 82, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(832, 28, 87, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(833, 28, 91, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(834, 28, 95, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(835, 28, 99, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(836, 28, 104, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(837, 28, 106, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(838, 28, 110, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(839, 28, 114, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(840, 28, 119, '2024-08-11 08:29:49', '2024-08-11 08:29:49'),
(841, 29, 3, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(842, 29, 8, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(843, 29, 12, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(844, 29, 14, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(845, 29, 18, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(846, 29, 23, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(847, 29, 28, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(848, 29, 31, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(849, 29, 35, '2024-08-11 08:30:43', '2024-08-11 08:30:43');
INSERT INTO `penilaian_indikator` (`id_penilaian_indikator`, `id_penilaian`, `id_skala_indikator_detail`, `created_at`, `updated_at`) VALUES
(850, 29, 39, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(851, 29, 42, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(852, 29, 47, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(853, 29, 50, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(854, 29, 54, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(855, 29, 59, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(856, 29, 63, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(857, 29, 66, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(858, 29, 70, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(859, 29, 76, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(860, 29, 79, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(861, 29, 82, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(862, 29, 87, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(863, 29, 90, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(864, 29, 95, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(865, 29, 100, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(866, 29, 102, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(867, 29, 108, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(868, 29, 110, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(869, 29, 116, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(870, 29, 119, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(871, 30, 4, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(872, 30, 8, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(873, 30, 12, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(874, 30, 14, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(875, 30, 19, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(876, 30, 23, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(877, 30, 27, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(878, 30, 30, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(879, 30, 36, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(880, 30, 40, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(881, 30, 44, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(882, 30, 47, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(883, 30, 52, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(884, 30, 56, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(885, 30, 60, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(886, 30, 62, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(887, 30, 68, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(888, 30, 72, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(889, 30, 75, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(890, 30, 80, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(891, 30, 83, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(892, 30, 86, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(893, 30, 92, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(894, 30, 95, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(895, 30, 98, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(896, 30, 102, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(897, 30, 106, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(898, 30, 111, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(899, 30, 114, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(900, 30, 120, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(901, 31, 2, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(902, 31, 7, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(903, 31, 11, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(904, 31, 15, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(905, 31, 19, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(906, 31, 23, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(907, 31, 26, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(908, 31, 32, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(909, 31, 36, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(910, 31, 39, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(911, 31, 42, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(912, 31, 46, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(913, 31, 50, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(914, 31, 56, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(915, 31, 58, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(916, 31, 64, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(917, 31, 68, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(918, 31, 70, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(919, 31, 76, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(920, 31, 79, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(921, 31, 83, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(922, 31, 87, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(923, 31, 92, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(924, 31, 96, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(925, 31, 100, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(926, 31, 103, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(927, 31, 108, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(928, 31, 111, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(929, 31, 115, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(930, 31, 119, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(931, 32, 2, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(932, 32, 6, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(933, 32, 11, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(934, 32, 14, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(935, 32, 18, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(936, 32, 22, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(937, 32, 28, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(938, 32, 31, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(939, 32, 35, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(940, 32, 39, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(941, 32, 43, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(942, 32, 46, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(943, 32, 52, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(944, 32, 54, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(945, 32, 58, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(946, 32, 63, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(947, 32, 68, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(948, 32, 70, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(949, 32, 76, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(950, 32, 80, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(951, 32, 82, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(952, 32, 86, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(953, 32, 91, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(954, 32, 94, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(955, 32, 100, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(956, 32, 102, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(957, 32, 107, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(958, 32, 112, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(959, 32, 116, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(960, 32, 120, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(961, 33, 3, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(962, 33, 6, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(963, 33, 12, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(964, 33, 15, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(965, 33, 18, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(966, 33, 23, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(967, 33, 28, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(968, 33, 30, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(969, 33, 36, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(970, 33, 40, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(971, 33, 43, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(972, 33, 46, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(973, 33, 51, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(974, 33, 56, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(975, 33, 58, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(976, 33, 64, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(977, 33, 68, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(978, 33, 71, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(979, 33, 74, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(980, 33, 79, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(981, 33, 83, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(982, 33, 88, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(983, 33, 91, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(984, 33, 95, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(985, 33, 100, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(986, 33, 103, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(987, 33, 108, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(988, 33, 110, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(989, 33, 115, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(990, 33, 120, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(991, 34, 2, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(992, 34, 7, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(993, 34, 12, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(994, 34, 15, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(995, 34, 19, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(996, 34, 23, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(997, 34, 26, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(998, 34, 31, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(999, 34, 36, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1000, 34, 39, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1001, 34, 42, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1002, 34, 47, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1003, 34, 51, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1004, 34, 55, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1005, 34, 58, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1006, 34, 64, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1007, 34, 68, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1008, 34, 71, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1009, 34, 75, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1010, 34, 78, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1011, 34, 84, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1012, 34, 86, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1013, 34, 90, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1014, 34, 95, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1015, 34, 100, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1016, 34, 103, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1017, 34, 106, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1018, 34, 110, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1019, 34, 115, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1020, 34, 120, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1021, 35, 2, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1022, 35, 8, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1023, 35, 10, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1024, 35, 14, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1025, 35, 20, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1026, 35, 24, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1027, 35, 28, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1028, 35, 30, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1029, 35, 34, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1030, 35, 40, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1031, 35, 43, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1032, 35, 46, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1033, 35, 50, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1034, 35, 55, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1035, 35, 59, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1036, 35, 62, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1037, 35, 66, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1038, 35, 70, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1039, 35, 75, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1040, 35, 79, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1041, 35, 82, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1042, 35, 88, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1043, 35, 92, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1044, 35, 95, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1045, 35, 100, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1046, 35, 104, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1047, 35, 108, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1048, 35, 112, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1049, 35, 115, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1050, 35, 118, '2024-08-11 08:30:43', '2024-08-11 08:30:43'),
(1051, 36, 4, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1052, 36, 7, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1053, 36, 10, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1054, 36, 15, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1055, 36, 19, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1056, 36, 22, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1057, 36, 28, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1058, 36, 30, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1059, 36, 36, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1060, 36, 39, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1061, 36, 42, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1062, 36, 46, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1063, 36, 52, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1064, 36, 56, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1065, 36, 58, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1066, 36, 62, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1067, 36, 66, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1068, 36, 70, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1069, 36, 75, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1070, 36, 78, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1071, 36, 83, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1072, 36, 88, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1073, 36, 92, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1074, 36, 96, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1075, 36, 99, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1076, 36, 103, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1077, 36, 106, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1078, 36, 111, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1079, 36, 116, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1080, 36, 118, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1081, 37, 2, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1082, 37, 7, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1083, 37, 10, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1084, 37, 16, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1085, 37, 18, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1086, 37, 23, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1087, 37, 26, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1088, 37, 31, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1089, 37, 36, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1090, 37, 40, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1091, 37, 43, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1092, 37, 46, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1093, 37, 51, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1094, 37, 54, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1095, 37, 60, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1096, 37, 63, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1097, 37, 66, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1098, 37, 72, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1099, 37, 76, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1100, 37, 80, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1101, 37, 83, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1102, 37, 88, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1103, 37, 92, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1104, 37, 96, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1105, 37, 100, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1106, 37, 102, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1107, 37, 108, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1108, 37, 111, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1109, 37, 116, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1110, 37, 118, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1111, 38, 4, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1112, 38, 7, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1113, 38, 11, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1114, 38, 16, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1115, 38, 20, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1116, 38, 23, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1117, 38, 26, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1118, 38, 30, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1119, 38, 34, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1120, 38, 39, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1121, 38, 43, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1122, 38, 47, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1123, 38, 52, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1124, 38, 56, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1125, 38, 59, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1126, 38, 62, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1127, 38, 67, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1128, 38, 70, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1129, 38, 75, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1130, 38, 79, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1131, 38, 83, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1132, 38, 86, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1133, 38, 90, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1134, 38, 95, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1135, 38, 98, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1136, 38, 104, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1137, 38, 108, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1138, 38, 110, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1139, 38, 115, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1140, 38, 118, '2024-08-11 08:32:23', '2024-08-11 08:32:23'),
(1141, 39, 2, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1142, 39, 8, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1143, 39, 12, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1144, 39, 16, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1145, 39, 18, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1146, 39, 24, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1147, 39, 28, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1148, 39, 32, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1149, 39, 36, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1150, 39, 39, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1151, 39, 44, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1152, 39, 47, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1153, 39, 51, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1154, 39, 55, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1155, 39, 59, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1156, 39, 63, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1157, 39, 67, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1158, 39, 72, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1159, 39, 75, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1160, 39, 79, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1161, 39, 82, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1162, 39, 86, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1163, 39, 90, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1164, 39, 96, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1165, 39, 98, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1166, 39, 102, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1167, 39, 107, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1168, 39, 110, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1169, 39, 116, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1170, 39, 120, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1171, 40, 3, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1172, 40, 6, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1173, 40, 12, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1174, 40, 16, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1175, 40, 19, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1176, 40, 22, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1177, 40, 27, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1178, 40, 31, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1179, 40, 34, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1180, 40, 38, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1181, 40, 44, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1182, 40, 47, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1183, 40, 51, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1184, 40, 54, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1185, 40, 59, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1186, 40, 62, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1187, 40, 68, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1188, 40, 70, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1189, 40, 76, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1190, 40, 80, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1191, 40, 83, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1192, 40, 87, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1193, 40, 90, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1194, 40, 96, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1195, 40, 100, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1196, 40, 104, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1197, 40, 107, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1198, 40, 112, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1199, 40, 116, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1200, 40, 118, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1201, 41, 3, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1202, 41, 6, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1203, 41, 11, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1204, 41, 15, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1205, 41, 20, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1206, 41, 23, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1207, 41, 28, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1208, 41, 30, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1209, 41, 36, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1210, 41, 38, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1211, 41, 42, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1212, 41, 48, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1213, 41, 50, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1214, 41, 54, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1215, 41, 59, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1216, 41, 64, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1217, 41, 66, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1218, 41, 72, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1219, 41, 74, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1220, 41, 78, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1221, 41, 82, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1222, 41, 87, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1223, 41, 92, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1224, 41, 94, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1225, 41, 99, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1226, 41, 103, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1227, 41, 108, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1228, 41, 110, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1229, 41, 114, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1230, 41, 119, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1231, 42, 4, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1232, 42, 7, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1233, 42, 10, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1234, 42, 14, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1235, 42, 19, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1236, 42, 22, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1237, 42, 26, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1238, 42, 30, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1239, 42, 34, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1240, 42, 40, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1241, 42, 42, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1242, 42, 48, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1243, 42, 51, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1244, 42, 56, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1245, 42, 58, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1246, 42, 64, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1247, 42, 68, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1248, 42, 71, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1249, 42, 74, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1250, 42, 80, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1251, 42, 83, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1252, 42, 87, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1253, 42, 90, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1254, 42, 96, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1255, 42, 99, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1256, 42, 103, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1257, 42, 107, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1258, 42, 112, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1259, 42, 114, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1260, 42, 120, '2024-08-11 08:32:24', '2024-08-11 08:32:24'),
(1261, 43, 3, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1262, 43, 6, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1263, 43, 12, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1264, 43, 14, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1265, 43, 20, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1266, 43, 24, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1267, 43, 28, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1268, 43, 31, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1269, 43, 35, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1270, 43, 39, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1271, 43, 42, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1272, 43, 47, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1273, 43, 52, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1274, 43, 54, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1275, 43, 59, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1276, 43, 63, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1277, 43, 66, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1278, 43, 71, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1279, 43, 76, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1280, 43, 78, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1281, 43, 82, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1282, 43, 86, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1283, 43, 91, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1284, 43, 96, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1285, 43, 98, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1286, 43, 102, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1287, 43, 106, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1288, 43, 111, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1289, 43, 114, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1290, 43, 120, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1291, 44, 3, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1292, 44, 7, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1293, 44, 11, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1294, 44, 15, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1295, 44, 18, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1296, 44, 22, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1297, 44, 27, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1298, 44, 32, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1299, 44, 36, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1300, 44, 40, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1301, 44, 44, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1302, 44, 46, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1303, 44, 51, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1304, 44, 54, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1305, 44, 58, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1306, 44, 64, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1307, 44, 68, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1308, 44, 72, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1309, 44, 74, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1310, 44, 78, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1311, 44, 82, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1312, 44, 88, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1313, 44, 90, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1314, 44, 95, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1315, 44, 98, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1316, 44, 104, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1317, 44, 107, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1318, 44, 110, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1319, 44, 114, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1320, 44, 119, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1321, 45, 4, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1322, 45, 7, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1323, 45, 11, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1324, 45, 16, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1325, 45, 20, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1326, 45, 22, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1327, 45, 28, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1328, 45, 30, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1329, 45, 35, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1330, 45, 39, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1331, 45, 43, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1332, 45, 48, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1333, 45, 50, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1334, 45, 55, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1335, 45, 60, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1336, 45, 64, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1337, 45, 66, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1338, 45, 71, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1339, 45, 76, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1340, 45, 80, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1341, 45, 82, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1342, 45, 87, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1343, 45, 91, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1344, 45, 95, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1345, 45, 100, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1346, 45, 104, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1347, 45, 107, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1348, 45, 111, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1349, 45, 114, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1350, 45, 120, '2024-08-11 08:33:10', '2024-08-11 08:33:10'),
(1351, 46, 2, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1352, 46, 6, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1353, 46, 10, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1354, 46, 16, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1355, 46, 19, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1356, 46, 24, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1357, 46, 27, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1358, 46, 30, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1359, 46, 35, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1360, 46, 39, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1361, 46, 44, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1362, 46, 47, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1363, 46, 50, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1364, 46, 56, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1365, 46, 60, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1366, 46, 62, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1367, 46, 67, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1368, 46, 70, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1369, 46, 76, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1370, 46, 78, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1371, 46, 82, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1372, 46, 87, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1373, 46, 90, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1374, 46, 95, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1375, 46, 98, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1376, 46, 104, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1377, 46, 108, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1378, 46, 110, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1379, 46, 114, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1380, 46, 119, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1381, 47, 3, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1382, 47, 6, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1383, 47, 10, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1384, 47, 15, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1385, 47, 20, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1386, 47, 24, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1387, 47, 27, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1388, 47, 31, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1389, 47, 36, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1390, 47, 38, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1391, 47, 44, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1392, 47, 48, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1393, 47, 51, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1394, 47, 54, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1395, 47, 59, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1396, 47, 64, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1397, 47, 67, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1398, 47, 70, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1399, 47, 74, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1400, 47, 79, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1401, 47, 84, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1402, 47, 88, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1403, 47, 90, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1404, 47, 96, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1405, 47, 100, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1406, 47, 102, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1407, 47, 108, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1408, 47, 110, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1409, 47, 115, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1410, 47, 120, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1411, 48, 3, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1412, 48, 6, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1413, 48, 11, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1414, 48, 14, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1415, 48, 18, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1416, 48, 23, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1417, 48, 27, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1418, 48, 32, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1419, 48, 36, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1420, 48, 39, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1421, 48, 43, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1422, 48, 47, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1423, 48, 51, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1424, 48, 54, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1425, 48, 60, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1426, 48, 62, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1427, 48, 67, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1428, 48, 71, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1429, 48, 75, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1430, 48, 79, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1431, 48, 83, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1432, 48, 87, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1433, 48, 92, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1434, 48, 95, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1435, 48, 99, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1436, 48, 102, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1437, 48, 106, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1438, 48, 110, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1439, 48, 116, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1440, 48, 118, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1441, 49, 4, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1442, 49, 8, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1443, 49, 12, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1444, 49, 15, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1445, 49, 18, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1446, 49, 23, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1447, 49, 27, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1448, 49, 32, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1449, 49, 36, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1450, 49, 38, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1451, 49, 44, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1452, 49, 47, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1453, 49, 52, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1454, 49, 56, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1455, 49, 59, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1456, 49, 62, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1457, 49, 68, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1458, 49, 71, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1459, 49, 76, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1460, 49, 78, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1461, 49, 84, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1462, 49, 86, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1463, 49, 90, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1464, 49, 95, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1465, 49, 100, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1466, 49, 104, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1467, 49, 107, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1468, 49, 112, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1469, 49, 114, '2024-08-11 08:33:11', '2024-08-11 08:33:11'),
(1470, 49, 119, '2024-08-11 08:33:11', '2024-08-11 08:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan_alternatif`
--

CREATE TABLE `perhitungan_alternatif` (
  `id_perhitungan_alternatif` bigint UNSIGNED NOT NULL,
  `id_tanggal_penilaian` bigint UNSIGNED NOT NULL,
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
(1, 'K1', 'K1', 1, '2024-08-16 03:20:07', '2024-08-16 03:20:07'),
(2, 'K1', 'K2', 3, '2024-08-16 03:20:07', '2024-08-16 03:20:07'),
(3, 'K1', 'K3', 5, '2024-08-16 03:20:07', '2024-08-16 03:20:07'),
(4, 'K2', 'K1', 0.3333, '2024-08-16 03:20:07', '2024-08-16 03:20:07'),
(5, 'K2', 'K2', 1, '2024-08-16 03:20:07', '2024-08-16 03:20:07'),
(6, 'K2', 'K3', 1, '2024-08-16 03:20:07', '2024-08-16 03:20:07'),
(7, 'K3', 'K1', 0.2, '2024-08-16 03:20:07', '2024-08-16 03:20:07'),
(8, 'K3', 'K2', 1, '2024-08-16 03:20:07', '2024-08-16 03:20:07'),
(9, 'K3', 'K3', 1, '2024-08-16 03:20:07', '2024-08-16 03:20:07');

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
(1, 'K1', 'SK1.1', 'SK1.1', 1, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(2, 'K1', 'SK1.1', 'SK1.2', 5, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(3, 'K1', 'SK1.1', 'SK1.3', 5, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(4, 'K1', 'SK1.2', 'SK1.1', 0.2, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(5, 'K1', 'SK1.2', 'SK1.2', 1, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(6, 'K1', 'SK1.2', 'SK1.3', 3, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(7, 'K1', 'SK1.3', 'SK1.1', 0.2, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(8, 'K1', 'SK1.3', 'SK1.2', 0.3333, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(9, 'K1', 'SK1.3', 'SK1.3', 1, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(10, 'K2', 'SK2.1', 'SK2.1', 1, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(11, 'K2', 'SK2.1', 'SK2.2', 1, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(12, 'K2', 'SK2.1', 'SK2.3', 1, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(13, 'K2', 'SK2.1', 'SK2.4', 0.2, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(14, 'K2', 'SK2.1', 'SK2.5', 0.2, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(15, 'K2', 'SK2.1', 'SK2.6', 0.1429, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(16, 'K2', 'SK2.1', 'SK2.7', 0.2, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(17, 'K2', 'SK2.1', 'SK2.8', 0.2, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(18, 'K2', 'SK2.1', 'SK2.9', 1, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(19, 'K2', 'SK2.2', 'SK2.1', 1, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(20, 'K2', 'SK2.2', 'SK2.2', 1, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(21, 'K2', 'SK2.2', 'SK2.3', 1, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(22, 'K2', 'SK2.2', 'SK2.4', 0.3333, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(23, 'K2', 'SK2.2', 'SK2.5', 3, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(24, 'K2', 'SK2.2', 'SK2.6', 0.2, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(25, 'K2', 'SK2.2', 'SK2.7', 0.3333, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(26, 'K2', 'SK2.2', 'SK2.8', 0.3333, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(27, 'K2', 'SK2.2', 'SK2.9', 1, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(28, 'K2', 'SK2.3', 'SK2.1', 1, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(29, 'K2', 'SK2.3', 'SK2.2', 1, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(30, 'K2', 'SK2.3', 'SK2.3', 1, '2024-08-16 03:32:28', '2024-08-16 03:32:28'),
(31, 'K2', 'SK2.3', 'SK2.4', 0.2, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(32, 'K2', 'SK2.3', 'SK2.5', 0.2, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(33, 'K2', 'SK2.3', 'SK2.6', 0.2, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(34, 'K2', 'SK2.3', 'SK2.7', 0.3333, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(35, 'K2', 'SK2.3', 'SK2.8', 0.3333, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(36, 'K2', 'SK2.3', 'SK2.9', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(37, 'K2', 'SK2.4', 'SK2.1', 5, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(38, 'K2', 'SK2.4', 'SK2.2', 3, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(39, 'K2', 'SK2.4', 'SK2.3', 5, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(40, 'K2', 'SK2.4', 'SK2.4', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(41, 'K2', 'SK2.4', 'SK2.5', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(42, 'K2', 'SK2.4', 'SK2.6', 0.3333, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(43, 'K2', 'SK2.4', 'SK2.7', 3, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(44, 'K2', 'SK2.4', 'SK2.8', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(45, 'K2', 'SK2.4', 'SK2.9', 5, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(46, 'K2', 'SK2.5', 'SK2.1', 5, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(47, 'K2', 'SK2.5', 'SK2.2', 0.3333, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(48, 'K2', 'SK2.5', 'SK2.3', 5, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(49, 'K2', 'SK2.5', 'SK2.4', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(50, 'K2', 'SK2.5', 'SK2.5', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(51, 'K2', 'SK2.5', 'SK2.6', 0.3333, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(52, 'K2', 'SK2.5', 'SK2.7', 5, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(53, 'K2', 'SK2.5', 'SK2.8', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(54, 'K2', 'SK2.5', 'SK2.9', 5, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(55, 'K2', 'SK2.6', 'SK2.1', 7, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(56, 'K2', 'SK2.6', 'SK2.2', 5, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(57, 'K2', 'SK2.6', 'SK2.3', 5, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(58, 'K2', 'SK2.6', 'SK2.4', 3, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(59, 'K2', 'SK2.6', 'SK2.5', 3, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(60, 'K2', 'SK2.6', 'SK2.6', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(61, 'K2', 'SK2.6', 'SK2.7', 5, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(62, 'K2', 'SK2.6', 'SK2.8', 3, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(63, 'K2', 'SK2.6', 'SK2.9', 7, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(64, 'K2', 'SK2.7', 'SK2.1', 5, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(65, 'K2', 'SK2.7', 'SK2.2', 3, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(66, 'K2', 'SK2.7', 'SK2.3', 3, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(67, 'K2', 'SK2.7', 'SK2.4', 0.3333, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(68, 'K2', 'SK2.7', 'SK2.5', 0.2, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(69, 'K2', 'SK2.7', 'SK2.6', 0.2, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(70, 'K2', 'SK2.7', 'SK2.7', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(71, 'K2', 'SK2.7', 'SK2.8', 0.3333, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(72, 'K2', 'SK2.7', 'SK2.9', 3, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(73, 'K2', 'SK2.8', 'SK2.1', 5, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(74, 'K2', 'SK2.8', 'SK2.2', 3, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(75, 'K2', 'SK2.8', 'SK2.3', 3, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(76, 'K2', 'SK2.8', 'SK2.4', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(77, 'K2', 'SK2.8', 'SK2.5', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(78, 'K2', 'SK2.8', 'SK2.6', 0.3333, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(79, 'K2', 'SK2.8', 'SK2.7', 3, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(80, 'K2', 'SK2.8', 'SK2.8', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(81, 'K2', 'SK2.8', 'SK2.9', 5, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(82, 'K2', 'SK2.9', 'SK2.1', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(83, 'K2', 'SK2.9', 'SK2.2', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(84, 'K2', 'SK2.9', 'SK2.3', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(85, 'K2', 'SK2.9', 'SK2.4', 0.2, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(86, 'K2', 'SK2.9', 'SK2.5', 0.2, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(87, 'K2', 'SK2.9', 'SK2.6', 0.1429, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(88, 'K2', 'SK2.9', 'SK2.7', 0.3333, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(89, 'K2', 'SK2.9', 'SK2.8', 0.2, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(90, 'K2', 'SK2.9', 'SK2.9', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(91, 'K3', 'SK3.1', 'SK3.1', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(92, 'K3', 'SK3.1', 'SK3.2', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(93, 'K3', 'SK3.2', 'SK3.1', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29'),
(94, 'K3', 'SK3.2', 'SK3.2', 1, '2024-08-16 03:32:29', '2024-08-16 03:32:29');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(2, 'karyawan', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(3, 'group-karyawan', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(4, 'kriteria', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(5, 'subkriteria', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(6, 'skala-indikator', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(7, 'perbandingan-kriteria', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(8, 'perbandingan-subkriteria', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(9, 'kelola-akun', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(10, 'penilaian', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(11, 'riwayat-penilaian', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(12, 'persetujuan-penilaian', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(13, 'catatan-karyawan', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(14, 'view perbandingan-kriteria', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(15, 'view perbandingan-subkriteria', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(16, 'perbandingan-karyawan', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(17, 'perankingan', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31');

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
  `id_tanggal_penilaian` bigint UNSIGNED NOT NULL,
  `kode_alternatif` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` double NOT NULL,
  `rank` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id_ranking`, `id_tanggal_penilaian`, `kode_alternatif`, `nilai`, `rank`, `created_at`, `updated_at`) VALUES
(1, 1, 'A10', 87.530952380952, 1, '2024-08-11 08:33:54', '2024-08-16 03:50:59'),
(2, 1, 'A9', 87.009523809524, 2, '2024-08-11 08:33:54', '2024-08-16 03:50:59'),
(3, 1, 'A4', 86.804761904762, 3, '2024-08-11 08:33:54', '2024-08-16 03:50:59'),
(4, 1, 'A5', 86.004761904762, 4, '2024-08-11 08:33:54', '2024-08-16 03:50:59'),
(5, 1, 'A2', 85.561904761905, 5, '2024-08-11 08:33:54', '2024-08-16 03:50:59'),
(6, 1, 'A3', 85.47380952381, 6, '2024-08-11 08:33:54', '2024-08-16 03:50:59'),
(7, 1, 'A8', 84.592857142857, 7, '2024-08-11 08:33:54', '2024-08-16 03:50:59');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(2, 'admin', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(3, 'IT', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(4, 'yayasan', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(5, 'deputi', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(6, 'kepala sekolah', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(7, 'guru', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(8, 'tata usaha tenaga pendidikan', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(9, 'tata usaha non tenaga pendidikan', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(10, 'kerohanian tenaga pendidikan', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31'),
(11, 'kerohanian non tenaga pendidikan', 'web', '2024-07-30 23:37:31', '2024-07-30 23:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(1, 3),
(9, 3),
(1, 4),
(10, 4),
(11, 4),
(1, 5),
(10, 5),
(11, 5),
(1, 6),
(10, 6),
(11, 6),
(12, 6),
(13, 6),
(14, 6),
(15, 6),
(16, 6),
(17, 6),
(1, 7),
(10, 7),
(11, 7),
(1, 8),
(10, 8),
(11, 8),
(1, 9),
(10, 9),
(11, 9),
(1, 10),
(10, 10),
(11, 10),
(1, 11),
(10, 11),
(11, 11);

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
(1, 1, '1', 'Tidak mengakui kesalahan, menutupi informasi/kejadian. Melemparkan kesalahan/tanggung jawab kepada orang lain.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(2, 1, '2', 'Mengakui kesalahan karena terpaksa, bukan atas inisiatif sendiri; melibatkan pihak lain untuk ikut bertanggung jawab atas masalah.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(3, 1, '3', 'Jujur, mengakui kesalahan dengan segera, tidak menutupi informasi/ kejadian dan bersedia menanggung konsekuensi yang terjadi.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(4, 1, '4', 'Terbuka terhadap fakta, informasi, kejadian. Sangat minim melakukan kesalahan karena menjalankan nilai Alkitab dengan konsisten.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(5, 2, '1', 'Melakukan cara atau tindakan yang bertentangan dengan aturan instansi secara sengaja.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(6, 2, '2', 'Mengambil keputusan/bertindak berdasarkan suatu kejadian saja tanpa mengacu aturan/ prosedur instansi.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(7, 2, '3', 'Mengambil keputusan/bertindak sesuai dengan aturan/prosedur instansi dengan mempertimbangkan konteks.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(8, 2, '4', 'Mengambil keputusan sesuai aturan/prosedur instansi dengan mempertimbangkan konteks dan tanggung jawab serta nilai moral/etika.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(9, 3, '1', 'Menghindari konflik, tidak bersedia terlibat situasi/tanggung jawab yang berpotensi terjadi konflik. Meniadakan konflik, tidak mau menghadapinya.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(10, 3, '2', 'Membutuhkan bantuan solusi dan pendampingan dari atasan/rekan kerja untuk menyelesaikan konflik.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(11, 3, '3', 'Menghadapi pihak lain yang terlibat konflik dengan terbuka dan menemukan win-win solution meskipun masih memerlukan pendampingan/mediasi.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(12, 3, '4', 'Mampu memahami kepentingan pihak lain yang terlibat konflik, dan mampu menyelesaikan secara mandiri bersama pihak terkait selaras dengan nilai dan etika.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(13, 4, '1', 'Belum menunjukkan inisiatif dalam mengerjakan tugas, mengalami kesulitan memenuhi standar dan batas waktu yang ditetapkan.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(14, 4, '2', 'Ada insiatif untuk mengerjakan tugas dan mencari bantuan, namun membutuhkan pendampingan/\npengawasan agar selesai sesuai standar.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(15, 4, '3', 'Dapat menyelesaikan tugasnya dengan pengawasan yang minimal sesuai dengan standar dan batas waktu.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(16, 4, '4', 'Dapat menyelesaikan tugasnya dengan pengawasan yang minimal sesuai dengan standar dan batas waktu.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(17, 5, '1', 'Tidak mengetahui visi instansi.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(18, 5, '2', 'Dapat menyebutkan visi instansi namun belum mengenali penerapannya dalam lingkup tugas sehari-hari.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(19, 5, '3', 'Dapat menyampaikan visi instansi dengan kontekstual dalam kegiatan kerja sehari-hari.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(20, 5, '4', 'Memahami visi instansi dan mampu menerapkan secara komprehensif dalam pekerjaan sehari-hari.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(21, 6, '1', 'Enggan untuk memberikan pertolongan; bersedia memberikan bantuan terbatas saat ditugaskan oleh atasan.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(22, 6, '2', 'Bersedia memberikan bantuan apabila ada pihak yang meminta.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(23, 6, '3', 'Menunjukkan inisiatif untuk menawarkan bantuan kepada sesama rekan kerja maupun siswa.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(24, 6, '4', 'Proaktif untuk menawarkan bantuan dan mampu menyesuaikan bentuk/jenis bantuan bagi rekan kerja/siswa secara spesifik.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(25, 7, '1', 'Tidak memberikan kesempatan bagi siswa/rekan kerja untuk belajar/melakukan hal baru.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(26, 7, '2', 'Memberikan pendampingan/melatih siswa/rekan kerja dengan sporadis, untuk situasi tertentu.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(27, 7, '3', 'Mengenali minat/potensi rekan kerja/siswa dan memberikan kesempatan belajar melalui penugasan dan pendampingan.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(28, 7, '4', 'Mampu bertindak sebagai mentor bagi siswa/rekan melalui bantuan/pen dampingan terencana dalam kurun waktu tertentu.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(29, 8, '1', 'Bersikap berdasarkan suasana hati tanpa memperhatikan situasi, menunjukkan sikap/ tindakan berdasarkan status/golongan seseorang.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(30, 8, '2', 'Memberikan tanggapan dan bersikap seadanya, sebatas tuntutan yang menjadi aturan instansi.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(31, 8, '3', 'Dapat berinteraksi dengan orang lain sesuai situasi dengan memperhatikan sopan santun.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(32, 8, '4', 'Bertindak/ bercakap dengan menghargai dan peka terhadap keadaan orang lain serta mampu melakukan penyesuaian yang diperlukan.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(33, 9, '1', 'Menolak umpan balik yang diberikan oleh pihak lain.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(34, 9, '2', 'Menjalankan umpan balik apabila hal tersebut diwajibkan instansi atau mempengaruhi hasil kerja.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(35, 9, '3', 'Bersikap terbuka dan menghargai pendapat/ masukan orang lain serta menjalankan perbaikan berdasarkan hal tersebut.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(36, 9, '4', 'Proaktif mencari umpan balik/masukan terhadap hasil kerja maupun kegiatan yang dilakukan, terutama dari orang lain yang lebih ahli dalam bidang tsb dan bersedia menjalankannya.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(37, 10, '1', 'Melakukan tindakan/perbuatan yang membahayakan dan mengotori lingkungan.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(38, 10, '2', 'Menjaga kebersihan lingkungan yang berada langsung dalam lingkup kerjanya.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(39, 10, '3', 'Menjaga kebersihan area sekolah dan tempat tinggal serta memberikan cara-cara praktis bagi siswa dan rekan kerja untuk melakukan hal yang sama.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(40, 10, '4', 'Melakukan cara-cara yang terarah untuk mengedukasi siswa dan rekan kerja menjaga kelestarian lingkungan sekitar.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(41, 11, '1', 'Menyapa, memberi salam dan mengajak berdoa yang dipimpin oleh siswa.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(42, 11, '2', 'Menyapa, memberi salam, mengajak berdoa dan mengajukan beberapa pertanyaan berkaitan materi yang sudah dipelajari.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(43, 11, '3', 'Menyapa, memberi salam, mengajak berdoa dan mengajukan beberapa pertanyaan berkaitan materi yang sudah dipelajari dan menyampaikan rencana kegiatan pembelajaran yang akan dipelajari.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(44, 11, '4', 'Menyapa, memberi salam, mengajak berdoa dan mengajukan beberapa pertanyaan berkaitan materi yang sudah dipelajari dan menyampaikan rencana kegiatan pembelajaran yang akan dipelajari dengan menggunakan media kreatif.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(45, 12, '1', 'Mengajukan pertanyaan pemantik.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(46, 12, '2', 'Mengajukan pertanyaan pemantik yang menantang dan membangun motivasi siswa.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(47, 12, '3', 'Mengajukan pertanyaan pemantik yang menantang dan membangun motivasi siswa dan menyampaikan manfaat hal yang akan dipelajari dalam kehidupan sehari-hari.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(48, 12, '4', 'Mengajukan pertanyaan pemantik yang menantang, membangun motivasi siswa dan menyampaikan manfaat hal yang akan dipelajari dalam kehidupan sehari-hari dengan menggunakan media kreatif.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(49, 13, '1', 'Menyampaikan capaian dan tujuan pembelajaran.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(50, 13, '2', 'Menyampaikan capaian, tujuan pembelajaran dengan mengaitkan materi pembelajaran dengan materi sebelumnya.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(51, 13, '3', 'Menyampaikan capaian, tujuan pembelajaran dan mengaitkan materi pembelajaran dengan materi sebelumnya serta mampu mengarahkan siswa fokus pada materi yang diajarkan.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(52, 13, '4', 'Menyampaikan capaian, tujuan pembelajaran dan mengaitkan materi pembelajaran dengan materi sebelumnya serta mampu mengarahkan siswa fokus pada materi yang diajarkan dengan mengenal emosi siswa.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(53, 14, '1', 'Menyampaikan topik materi ajar dan pertanyaan pemantik.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(54, 14, '2', 'Menyampaikan topik materi ajar, pertanyaan pemantik, mencari jawaban pertanyaan pemantik dengan pengetahuan lain yang relevan, perkembangan IPTEK, budaya positif dan kehidupan nyata.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(55, 14, '3', 'Menyampaikan topik materi ajar, pertanyaan pemantik, mencari jawaban pertanyaan pemantik dengan pengetahuan lain yang relevan, perkembangan IPTEK, budaya positif dan kehidupan nyata dan menyajikan pembahasan materi pembelajaran yang tepat secara sistematis.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(56, 14, '4', 'Menyampaikan topik materi ajar, pertanyaan pemantik, mencari jawaban pertanyaan pemantik dengan pengetahuan lain yang relevan, perkembangan IPTEK, budaya positif dan kehidupan nyata dan menyajikan pembahasan materi pembelajaran yang tepat secara sistematis dengan menggunakan media kreatif.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(57, 15, '1', 'Melaksanakan pembelajaran sesuai dengan kompetensi yang akan dicapai.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(58, 15, '2', 'Melaksanakan pembelajaran sesuai dengan kompetensi yang akan dicapai dengan membentuk kelompok siswa berdasarkan kriteria gaya belajar.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(59, 15, '3', 'Melaksanakan pembelajaran sesuai dengan kompetensi yang akan dicapai dengan membentuk kelompok siswa berdasarkan kriteria gaya belajar yang menumbuhkan dan mengembangkan keterampilan, kebiasaan dan sikap positif.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(60, 15, '4', 'Melaksanakan pembelajaran sesuai dengan kompetensi yang akan dicapai dengan membentuk kelompok siswa berdasarkan kriteria gaya belajar yang menumbuhkan dan mengembangkan keterampilan, kebiasaan dan sikap positif, sesuai alokasi waktu yang direncanakan.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(61, 16, '1', 'melaksanakan pembelajaran yang menumbuhkan partisipasi aktif.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(62, 16, '2', 'Melaksanakan pembelajaran yang menumbuhkan partisipasi aktif dalam diskusi kelompok.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(63, 16, '3', 'Melaksanakan pembelajaran yang menumbuhkan partisipasi aktif dalam diskusi kelompok serta mempresentasikan hasil diskusi.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(64, 16, '4', 'Melaksanakan pembelajaran yang menumbuhkan partisipasi aktif dalam diskusi kelompok dan mempresentasikan hasil diskusi serta menghasilkan karya tulis/ produk.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(65, 17, '1', 'Melaksanakan pembelajaran yang mengasah kreatif dan kritis siswa.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(66, 17, '2', 'Melaksanakan pembelajaran yang mengasah kreativitas, menumbuhkan pemikiran yang kritis dan mampu mengomunikasikan materi yang didapat saat pembelajaran.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(67, 17, '3', 'Melaksanakan pembelajaran yang mengasah kreativitas, menumbuhkan pemikiran yang kritis, mengomunikasikan serta mampu berkolaborasi antar siswa sesuai materi yang didapat saat pembelajaran.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(68, 17, '4', 'Melaksanakan pembelajaran yang mengasah kreativitas, menumbuhkan pemikiran yang kritis, mengomunikasikan serta mampu berkolaborasi antar siswa sesuai materi yang didapat saat pembelajaran dengan menggunakan berbagai media belajar.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(69, 18, '1', 'Menciptakan suasana kelas yang kondusif untuk proses belajar mengajar.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(70, 18, '2', 'Menciptakan suasana kelas yang kondusif dengan menerapkan prinsip disiplin positif untuk proses belajar mengajar.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(71, 18, '3', 'Menciptakan suasana kelas yang kondusif dengan menerapkan prinsip disiplin positif untuk membentuk perilaku adaptif yang telah disepakati dalam proses belajar mengajar.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(72, 18, '4', 'Menciptakan suasana kelas yang kondusif dengan menerapkan prinsip disiplin positif untuk membentuk perilaku adaptif yang telah disepakati dan menuliskan komitmen kelas dalam proses belajar mengajar.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(73, 19, '1', 'Mengomunikasikan pesan bahwa guru percaya akan kemampuan semua murid untuk belajar dan berprestasi secara akademik.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(74, 19, '2', 'Mengomunikasikan pesan bahwa guru percaya akan kemampuan semua murid untuk belajar, member I perhatian dan bantuan ekstra sesuai kebutuhan belajar setiap siswa.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(75, 19, '3', 'Mengomunikasikan pesan bahwa guru percaya akan kemampuan semua murid untuk belajar, memberi perhatian, bantuan ekstra, melakukan evaluasi dan motivasi sesuai kebutuhan belajar.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(76, 19, '4', 'Mengomunikasikan pesan bahwa guru percaya akan kemampuan semua murid untuk belajar, memberi perhatian, bantuan ekstra, melakukan evaluasi dan motivasi sesuai kebutuhan belajar setiap dan membuat rubrik prestasi belajar.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(77, 20, '1', 'melaksanakan praktik adaptasi pengajaran sebagai respon atas umpan balik dan respon murid terhadap kebutuhan belajarnya.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(78, 20, '2', 'Melaksanakan praktik adaptasi pengajaran sebagai respon atas umpan balik terhadap kebutuhan belajarnya dan memberi konten materi berbeda dalam capaian pembelajaran yang sama.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(79, 20, '3', 'Melaksanakan praktik adaptasi pengajaran sebagai respon atas umpan balik dan respon murid terhadap kebutuhan belajarnya dan member konten materi berbeda dalam capaian pembelajaran yang sama di beberapa kelompok yang berbeda dan mampu menerapkan serta berkolaborasi dalam memaknai materi ajar.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(80, 20, '4', 'Melaksanakan praktik adaptasi pengajaran sebagai respon atas umpan balik dan respon murid terhadap kebutuhan belajarnya dan member konten materi berbeda dalam capaian pembelajaran yang sama di beberapa kelompok yang berbeda dan mampu menerapka serta berkolaborasi dalam memaknai materi ajar dalam setiap pembelajaran.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(81, 21, '1', 'Menunjukkan keterampilan dalam penggunaan sumber belajar yang bervariasi.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(82, 21, '2', 'Menunjukkan keterampilan dalam penggunaan sumber belajar, media yang bervariasi yaitu visual dan audio.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(83, 21, '3', 'Menunjukkan keterampilan dalam penggunaan sumber belajar, media yang bervariasi yaitu visual, Audio dan kinestetik.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(84, 21, '4', 'Menunjukkan keterampilan dalam penggunaan sumber belajar, media yang bervariasi yaitu visual, Audio dan kinestetik yang menarik.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(85, 22, '1', 'Membawa alat peraga dalam kelas.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(86, 22, '2', 'Membawa alat peraga dalam kelas dan menggunakannya saat pembelajaran.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(87, 22, '3', 'Membawa alat peraga dalam kelas dan menggunakannya saat pembelajaran serta melibatkan siswa dalam menggunakan alat tersebut.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(88, 22, '4', 'Membawa alat peraga dalam kelas, menggunakannya saat pembelajaran dan melibatkan siswa dalam menggunakan alat tersebut serta dapat membuat alat peraga sendiri.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(89, 23, '1', 'Dapat menggunakan bahasa lisan secara jelas dan lancar.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(90, 23, '2', 'Dapat menggunakan bahasa lisan secara jelas, lancar dan menggunakan Bahasa tulis yang baik dan benar.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(91, 23, '3', 'Dapat menggunakan bahasa lisan secara jelas, lancar dan menggunakan Bahasa tulis yang baik dan benar serta memberi motivasi untuk menerapkan bahasa lisan, tulisan yang baik dan benar.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(92, 23, '4', 'Dapat menggunakan bahasa lisan secara jelas, lancar dan menggunakan bahasa tulis yang baik dan benar serta memberi motivasi untuk menerapkan bahasa lisan, tulisan yang baik dan benar dengan membuat satu contoh karya tulis.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(93, 24, '1', 'Melakukan pengajaran yang mendorong keterampilan literasi murid.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(94, 24, '2', 'Melakukan pengajaran yang mendorong keterampilan literasi dan numerasi murid.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(95, 24, '3', 'Melakukan pengajaran yang mendorong keterampilan literasi, numerasi dan mendorong siswa untuk membuat proyek hasil karya literasi.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(96, 24, '4', 'Melakukan pengajaran dan menerapkan keterampilan literasi, dengan melakukan PTK.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(97, 25, '1', 'Memfasilitasi dan membimbing murid merangkum materi pelajaran dalam bentuk penugasan.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(98, 25, '2', 'Memfasilitasi dan membimbing murid merangkum materi dalam bentuk penugasan terstruktur.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(99, 25, '3', 'Memfasilitasi dan membimbing murid merangkum materi dalam bentuk penugasan terstruktur untuk meningkatkan pengetahuan, keterampilan mengajar.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(100, 25, '4', 'Memfasilitasi dan membimbing murid merangkum materi dalam bentuk penugasan terstruktur untuk meningkatkan pengetahuan, keterampilan mengajar, evaluasi dengan memberikan angket penilaian teman sejawat.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(101, 26, '1', 'Melaksanakan penilaian produk melalui proyek / hasil produk.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(102, 26, '2', 'Melaksanakan penilaian produk melalui proyek / hasil produk dan melaksanakan penilaian pengetahuan melalui tes formatif.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(103, 26, '3', 'Melaksanakan penilaian produk melalui proyek / hasil produk, melaksanakan penilaian pengetahuan melalui tes formatif serta penilaian sikap.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(104, 26, '4', 'Melaksanakan penilaian produk melalui proyek / hasil produk, melaksanakan penilaian pengetahuan melalui tes formatif serta penilaian sikap yang disajikan dengan rubrik penilaian.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(105, 27, '1', 'Dibawah 75%.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(106, 27, '2', '75% sampai 85%.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(107, 27, '3', '85% sampai dengan 95%.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(108, 27, '4', 'Lebih dari 95%.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(109, 28, '1', 'Dibawah 75%.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(110, 28, '2', '75% sampai 85%.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(111, 28, '3', '85% sampai dengan 95%.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(112, 28, '4', 'Lebih dari 95%.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(113, 29, '1', 'Dibawah 75%.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(114, 29, '2', '75% sampai 85%.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(115, 29, '3', '85% sampai dengan 95%.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(116, 29, '4', 'Lebih dari 95%.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(117, 30, '1', 'Dibawah 75%.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(118, 30, '2', '75% sampai 85%.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(119, 30, '3', '85% sampai dengan 95%.', '2024-06-27 23:39:55', '2024-06-27 23:39:55'),
(120, 30, '4', 'Lebih dari 95%.', '2024-06-27 23:39:55', '2024-06-27 23:39:55');

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
-- Table structure for table `tanggal_penilaian`
--

CREATE TABLE `tanggal_penilaian` (
  `id_tanggal_penilaian` bigint UNSIGNED NOT NULL,
  `id_group_karyawan` bigint UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` enum('ganjil','genap') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `awal_tanggal_penilaian` date NOT NULL,
  `akhir_tanggal_penilaian` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tanggal_penilaian`
--

INSERT INTO `tanggal_penilaian` (`id_tanggal_penilaian`, `id_group_karyawan`, `tahun_ajaran`, `semester`, `awal_tanggal_penilaian`, `akhir_tanggal_penilaian`, `created_at`, `updated_at`) VALUES
(1, 1, '2024/2025', 'ganjil', '2024-08-05', '2024-08-19', '2024-08-11 07:48:06', '2024-08-11 07:48:06');

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
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'superadmin', 'superadmin', 'superadmin@gmail.com', NULL, '$2y$10$OdSDAJer3S988TtJWNauier0Z8nA8miq8OTjeyshFvo9.RrvpqDsO', NULL, '2024-07-30 23:42:17', '2024-07-30 23:42:17', NULL),
(2, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$O3RqltRZ.o2sfHg/DyFkZ..zNgQX81AeA/V71570K03DDzVRHdCOK', NULL, '2024-07-30 23:42:17', '2024-07-30 23:42:17', NULL),
(3, 'Mary Wahyuningsih, S.Kom', 'mary', 'marywahyuningsih@gmail.com', NULL, '$2y$10$0fJb7jpo0SSvdTOd6KNK5.Do95FeTYjtS3A1ooZfHxfh4nLOBbNqC', NULL, '2024-07-30 23:42:17', '2024-07-30 23:42:17', NULL),
(4, 'Selamat, M.Pd', 'selamat', 'selamat@gmail.com', NULL, '$2y$10$nI3SppFnbUhH0xEcgrbGa.dfvRU4xHWLBHh/1tHm7Q4sj604qRKZK', NULL, '2024-07-30 23:42:17', '2024-07-30 23:42:17', NULL),
(5, 'Lucia Sutarni, S.Pd', 'lucia', 'luciasutarni@gmail.com', NULL, '$2y$10$xr6M2bLWA8DKQy6cibHMrOIJaJUo2dSftahT8zexifbnKOvZlnbnO', NULL, '2024-07-30 23:42:17', '2024-07-30 23:42:17', NULL),
(6, 'Ninik Kristoermadiarsih, M.M', 'ninik', 'ninikkristoermadiarsih@gmail.com', NULL, '$2y$10$BxjXi1GnG23R0j.0ZXphsuxjKMwxeqxiTzR4hdknPM7LVtcGThwLK', NULL, '2024-07-30 23:42:17', '2024-07-30 23:42:17', NULL),
(7, 'Sovia Nainggolan, M.Pd', 'sovia', 'sovianainggolan@gmail.com', NULL, '$2y$10$BwYrJYWypHxtAZ4Kxy3o6u6uRaE4vx9kXg4jCmt9F8AAdanDouuHa', NULL, '2024-07-30 23:42:17', '2024-07-30 23:42:17', NULL),
(8, 'Irmina Sihura', 'irmina', 'irminasihura@gmail.com', NULL, '$2y$10$Nreu8ap5EYOVMNWXjuYUbehvnSNjf9elbcb5zHPWnaIoxKebusqXO', NULL, '2024-07-30 23:42:17', '2024-07-30 23:42:17', NULL),
(9, 'Hendriette Aphrodite Naomi Angelique Salakory', 'hendriette', 'hendriette@gmail.com', NULL, '$2y$10$ijsB2Pzth5rwxJafPUmGTe0IbCpN6fK8L3asMdjgXeyl01fkN9Eyq', NULL, '2024-07-30 23:42:17', '2024-07-30 23:42:17', NULL),
(10, 'Tiyas Wulandari, S.Psi', 'tiyas', 'tiyaswulandari@gmail.com', NULL, '$2y$10$ij8vWNJBtSrnOgTS7cW/.u6lOowxRnwYElfl8ZEBHAPOZYGR5pDmi', NULL, '2024-07-30 23:42:18', '2024-07-30 23:42:18', NULL),
(11, 'Tek Hok, S.Kom', 'tekhok', 'tekhok@gmail.com', NULL, '$2y$10$Vbr7Flkw90O3U4395iv.Nu239J2VMZ.dJxyqHdSbGb4P25QOemoAe', NULL, '2024-07-30 23:42:18', '2024-07-30 23:42:18', NULL),
(12, 'Leni Sihombing, S.Pd', 'leni', 'lenisihombing@gmail.com', NULL, '$2y$10$vvgjBb8zHx.SN.0g0txvxeLTst.yDt2KuPc19m/SGO8/GFknS/dM6', NULL, '2024-07-30 23:42:18', '2024-07-30 23:42:18', NULL),
(13, 'Diyah Kartika S,S.H', 'diyah', 'diyahkartika@gmail.com', NULL, '$2y$10$VF.va52AooqQAAPvgogIx.0MI/ZxJ0WtpcMSYsB7BeKi/F1qkLvTm', NULL, '2024-07-30 23:42:18', '2024-07-30 23:42:18', NULL),
(14, 'Muddin Sidabalok, S.Pd', 'muddin', 'muddinsidabalok@gmail.com', NULL, '$2y$10$YAH2NT0lPndjFcyG1IzwfuVrzbmA4TDGt.xlyJ5ULeUOPKPvd1xZW', NULL, '2024-07-30 23:42:18', '2024-07-30 23:42:18', NULL),
(15, 'Christina Puloraran', 'christina', 'christinapuloraran@gmail.com', NULL, '$2y$10$8L1FMom6s7jlW7YwbxqqGut2Ci5TOj/IVUp0.zx50fC7GseaF.lg.', NULL, '2024-07-30 23:42:18', '2024-07-30 23:42:18', NULL),
(16, 'Tanasia. S.Th', 'tanasia', 'tanasia@gmail.com', NULL, '$2y$10$jytbrljHhM6T7R/G9ukdCeeNnoc7ofLb0bL29SM4orqKE8x7INKlq', NULL, '2024-07-30 23:42:18', '2024-07-30 23:42:18', NULL),
(17, 'Lusiana Sele, S.Pd', 'lusiana', 'lusiana@gmail.com', NULL, '$2y$10$FEg/mge7O7N0IIkMR7hJLONbCd3zMoJmr6068.XxJFynOvfX1uzl6', NULL, '2024-07-30 23:42:18', '2024-07-30 23:42:18', NULL),
(18, 'Iria Kharisma Joseph, ST', 'iria', 'iriakharismajoseph@gmail.com', NULL, '$2y$10$eRmueDVN7ZmGBu6TxHZTv.5TKJxFNtPBcDWXh1/aMDWbLzlv0kY6i', NULL, '2024-07-30 23:42:18', '2024-07-30 23:42:18', NULL),
(19, 'Lisa Julita Mokosandi, S.Th', 'lisa', 'lisajulitamokosandi@gmail.com', NULL, '$2y$10$Quk7Om3SF5FhqBM/sA/yLu7rqu1JLupUH/YVgHfceVoetGPgeE4Y6', NULL, '2024-07-30 23:42:18', '2024-07-30 23:42:18', NULL),
(20, 'Theresia Rusmiyati', 'theresia', 'theresia@gmail.com', NULL, '$2y$10$lA6/rKHeddjWWPmPQxGGlun/wP1RGAn2uZIcppb1rrZ1mhPRyCAv.', NULL, '2024-07-30 23:42:18', '2024-07-30 23:42:18', NULL),
(21, 'Yacobus Santana, S.Pd', 'yacobus', 'yacobussantana@gmail.com', NULL, '$2y$10$hlO/r919BNz5H4x.AAbRU.G5VRivYF1DrpOMmRKBhmbDE5WmWPqTi', NULL, '2024-07-30 23:42:18', '2024-07-30 23:42:18', NULL),
(22, 'R.AB.Susi Hastono, S.E', 'susi', 'susihastono@gmail.com', NULL, '$2y$10$Q62DcdLLWZfUruJIR7pkK.NNVgfXLt1Ff4H5G7CdMfaHlxrYNSlDC', NULL, '2024-07-30 23:42:18', '2024-07-30 23:42:18', NULL),
(23, 'Marusaha Samosir, S.Pd', 'marusaha', 'marusahasamosir@gmail.com', NULL, '$2y$10$4DtBqMPZ4FxPKpoIP4EVIe2z/x7p1bOPG3BSf2CoDHgz7uy3tLjjC', NULL, '2024-07-30 23:42:18', '2024-07-30 23:42:18', NULL),
(24, 'Aprilliana Grace Wilma Thenu, S.Sos', 'aprilliana', 'aprillianagrace@gmail.com', NULL, '$2y$10$Q5HFmv/OrSHOZxYMZvpNHu92INXhXdt8GbZMwSjTyT5pfPYJGeBSm', NULL, '2024-07-30 23:42:18', '2024-07-30 23:42:18', NULL),
(25, 'Gani Praditja Sakti, S.Pd', 'gani', 'ganipraditjasakti@gmail.com', NULL, '$2y$10$VlD52qKt89HhidrL/eQaz.lQWS7AKd1I/LU3q1hisX/TXagaLS8.O', NULL, '2024-07-30 23:42:18', '2024-07-30 23:42:18', NULL),
(26, 'Fransisca X.Suharti, S.Pd', 'fransisca', 'fransisca@gmail.com', NULL, '$2y$10$Kvhf6PH2denG8oLaF20zG.koyxBWwD5JEXThnONGSZlzSUNCfBuIy', NULL, '2024-07-30 23:42:18', '2024-07-30 23:42:18', NULL),
(27, 'Kristiani Dwi Nugrohowati Djatiningsih, S.E', 'kristiana', 'kristiana@gmail.com', NULL, '$2y$10$noPZq8Av3G.zT1DuhfQGK.gA062bA7LRUIh62Y3TqcjF7TdYg3bMm', NULL, '2024-07-30 23:42:18', '2024-07-30 23:42:18', NULL),
(28, 'Elisabeth, S.Pd', 'elisabeth', 'elisabeth@gmail.com', NULL, '$2y$10$CLB0cpoXpXbVorCRYaVteu2JugplLaLkUry5oyxdLYTvnK3pX76/C', NULL, '2024-07-30 23:42:18', '2024-07-30 23:42:18', NULL),
(29, 'Cornelius Wiwit, S.Pd', 'cornelius', 'corneliuswiwit@gmail.com', NULL, '$2y$10$sHWOr0BN1Rraz2iAC0Ua3O/9PTgOqrNfqghZroEaOGagCPpkjiePO', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(30, 'Artha Maulina Rochendraty, S.Pd', 'artha', 'arthamaulina@gmail.com', NULL, '$2y$10$EexekC.D6h5gaZVp6GkpxugXcAIJYJGbipmcYqdpXxu/pU5/vHUoC', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(31, 'Siti Limaria Silaban, S.Pd', 'siti', 'sitilimariasilaban@gmail.com', NULL, '$2y$10$D/mnq3VTOcM8.fjNqvD/7Oru77sj0F1H5cP5M.qDqicwBRnoImeC.', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(32, 'Steven Evan Edifianto, S.Pd', 'stevan', 'stevanevanedifianto@gmail.com', NULL, '$2y$10$Gw2QNcvrRZ5NfeaAiMSPyO6xSi8IWEAgRVBEP2fOMc1hr.02odRdq', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(33, 'Linda Tiur Mauly, M.M', 'linda', 'lindatiurmauly@gmail.com', NULL, '$2y$10$8tlVMC9MXDCL0jxGUUwQsecaOH50PdzP8flr4tSX5pJyiZSVsTILK', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(34, 'Heri Prasetya, S.Pd', 'heri', 'heriprasetya@gmail.com', NULL, '$2y$10$YBY3GjxOQWfwIZ/aq12Z3uO5p1VG0JR10MOp17fNh.8y2RxfSlnT.', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(35, 'Martha Septiningtyas, S.Pd, M.Hum.', 'martha', 'marthaseptiningtyas@gmail.com', NULL, '$2y$10$agqpC0TJZjz.5NBe7SvRieDyHe1lz0PoXS9drrzN8nZyrYponMxvO', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(36, 'Pesta Maria Siburian, S.Pd', 'pesta', 'pestamariasiburian@gmail.com', NULL, '$2y$10$hhAqvrj7AlgAWa5wNfQ76OgDIsMer5vd88qp4oTdpUrl3Jj4pL.1O', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(37, 'Ronica Sales Julianti Siahaan, S.Pd', 'ronica', 'ronicasales@gmail.com', NULL, '$2y$10$E6Kk5a.C.48Kc77ZFEzff.P5rFqegmlZPnQpaGNoue2xjk80XZi8O', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(38, 'Roslinah, S.Pd', 'roslinah', 'roslinah@gmail.com', NULL, '$2y$10$3RzrObvggn5TwH/0k0Oeted/ffzBjV0/ZttzbEAA99JqaJrdgGgmC', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(39, 'Elvina Br. Manik, S.Pd', 'elvina', 'elvina@gmail.com', NULL, '$2y$10$Un1TuIfAllWN94R77HSBqOLzc6bQHsi.iYnMpFVtlHPHVnwYsj3Wi', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(40, 'Rian Hendri Tupamahu, S.Pd', 'rian', 'rianhendritupamahu@gmail.com', NULL, '$2y$10$gYTqdK3LGh49Hxv3cm6yLutljAvF8iD2xbNptNyaeNiMouRwdmLY.', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(41, 'Rachel Oktaviani Hutahaean, S.Pd', 'rachel', 'racheloktavianihutahaean@gmail.com', NULL, '$2y$10$I0oj1Yt3E7zBV.cOiPqaxOGtghAytgV/B2a7YWPNXoQBF0fJCRloe', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(42, 'Prima Caesar, B.Ed, S.Pd.', 'prima', 'primacaesar@gmail.com', NULL, '$2y$10$t9gF0dGcQ7iYIwGPL7JbRuWNzcsR.garJoNSqaQMdS5pYZsY6a0xW', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(43, 'Jelda Febrina Sesfaot, S.Pd', 'jelda', 'jeldafebrinasesfaoti@gmail.com', NULL, '$2y$10$/yvyJJjAHRbqoPXS8sXOU.OfErnVn5yC.8LPimB.Wt/AKyx0VwcdO', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(44, 'Romi Poire Sihotang, S.Kom', 'romi', 'romipoiresihotang@gmail.com', NULL, '$2y$10$vImAZL.mAzkp7UWBMX312ee1tVUX1.FmeWM4Pg0aGe7RmOw34U1XK', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(45, 'Sriningsih Hutabarat, S.Pd', 'sriningsih', 'sriningsihhutabarat@gmail.com', NULL, '$2y$10$PlqU5mEXt4lnMJCVVjNq/OWPqsLhkJ0NxxQ1rSNtHN9xGcfraTgei', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(46, 'Theresa Christina Yoel, S.Pd', 'theresa', 'theresachristinayoel@gmail.com', NULL, '$2y$10$VsB/igYGvw2zN0MudttCneZYJoiHwboAjF2bGXK2Xmmuaialfj2Ta', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(47, 'Erni Maduma BR Marbun, S.Pd', 'erni', 'ernimaduma@gmail.com', NULL, '$2y$10$W6Mr7V3iRoGa9e4KdsUvzOkvdqtoXLPHFgYokGCFCJQj4CV4vo6v.', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(48, 'Tanty Chandra Siregar, S.Pd', 'tanty', 'tantychandrasiregar@gmail.com', NULL, '$2y$10$j6b9dNBm/phuq6uEQwXgDeZs.Xzzwsiaf/PpTtoho/gyQ88Uj3lQ.', NULL, '2024-07-30 23:42:19', '2024-07-30 23:42:19', NULL),
(49, 'Agnes Paul, S.Pd', 'agnes', 'agnespaul@gmail.com', NULL, '$2y$10$7cZApBhjpuCzllJ4vlPBw.kAK9GmP/uARd6YGLG7mZArW9gc4Jcgi', NULL, '2024-07-30 23:42:20', '2024-07-30 23:42:20', NULL),
(50, 'Missy Friska Margaretha', 'missy', 'missyfriskamargaretha@gmail.com', NULL, '$2y$10$fhPEw4T0h1lPaRHs3FsHnu1cuJEatuGAatipwVt6LgxcxJvjKCaHC', NULL, '2024-07-30 23:42:20', '2024-07-30 23:42:20', NULL),
(51, 'Andre Saputra Julianto', 'andre', 'andresaputrajulianto@gmail.com', NULL, '$2y$10$gdA04qp6bBT/bcZL6rAsu.1UGOyDXgkrXSmS7wvigG3fZ8RAsj.Pm', NULL, '2024-07-30 23:42:20', '2024-07-30 23:42:20', NULL),
(52, 'Ekam Sehari Manalu', 'ekam', 'ekamseharimanalu@gmail.com', NULL, '$2y$10$bxziisq/8/Z5WK28PUhOFOuIhOWXI0CNS1kbzelkArWl3yUuW7zeq', NULL, '2024-07-30 23:42:20', '2024-07-30 23:42:20', NULL),
(53, 'Odaligo Zega', 'odaligo', 'odaligozega@gmail.com', NULL, '$2y$10$e4YhXzL.iOa8awZy6VcFxOTToVaq1TvW/HjroiU6PWlAHRylv0/2e', NULL, '2024-07-30 23:42:20', '2024-07-30 23:42:20', NULL),
(54, 'Rita Sofiani', 'rita', 'ritasofiani@gmail.com', NULL, '$2y$10$AU4616uvGEJMbGaCFe77Ju57TXfHyaoovPjpCz73rdxh2AHKkBIDC', NULL, '2024-07-30 23:42:20', '2024-07-30 23:42:20', NULL),
(55, 'Elna Santosa Manuel', 'elna', 'elna@gmail.com', NULL, '$2y$10$bJxedLDr0/XkzQgEyjwlO.p3Gyyfj0v0Jtlqgoc2KbWu.7.wCN15m', NULL, '2024-07-30 23:42:20', '2024-07-30 23:42:20', NULL),
(56, 'Delinda', 'delinda', 'delinda@gmail.com', NULL, '$2y$10$ypSN4Zcu5nt6x2ixw3Zmr.rm4fwrGJFKPI91m4WCRHD686FG3NQ46', NULL, '2024-07-30 23:42:20', '2024-07-30 23:42:20', NULL),
(57, 'Dhea Khanti Nathali', 'dhea', 'dheakhantinathali@gmail.com', NULL, '$2y$10$pKw8jrjWAAyfcmquoX2SxOBUzAKRphl5G7sDiL0CGFz5FQcEBVTWi', NULL, '2024-07-30 23:42:20', '2024-07-30 23:42:20', NULL),
(58, 'Yeny Irawati', 'yeny', 'yenyirawati@gmail.com', NULL, '$2y$10$gal4SsgKwfbF6BFzZsAtAO7aMGJw7qebbKoArH8VKdfzQNA1QLPsK', NULL, '2024-07-30 23:42:20', '2024-07-30 23:42:20', NULL),
(59, 'Triyono, S.E, M.Div', 'triyono', 'triyono@gmail.com', NULL, '$2y$10$dnC8tG9n4LOxrv0DuPnHmemIBbQ4ficrKu81yRRzv.tW7/UqWcqQO', NULL, '2024-07-30 23:42:20', '2024-07-30 23:42:20', NULL),
(60, 'Jaka Winarta,M.Div', 'jaka', 'jakawinarta@gmail.com', NULL, '$2y$10$PxcQoa3yLjJoXECw6.zOs.nYWKSaaLbG1e3DiYAS1uBqj.U.vdz2u', NULL, '2024-07-30 23:42:20', '2024-07-30 23:42:20', NULL),
(62, 'IT', 'it', 'it@gmail.com', NULL, '$2y$10$vKN7tZKMPZVGFuRoA/OP5.LrwLvS/04zmz6.pETeFZrZK7WSJ.saC', NULL, '2024-08-13 06:25:32', '2024-08-13 06:34:00', NULL),
(63, 'Christiene', 'christiene', 'christiene@gmail.com', NULL, '$2y$10$WaPeWnP1aldXcYdWVCEatOIetWA3kckGJe5PI/7sbrXvxOW7hH9oa', NULL, '2024-08-13 07:39:51', '2024-08-13 07:39:51', NULL);

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
  ADD KEY `fk_bobot_prioritas_alternatif_alternatif` (`kode_alternatif`),
  ADD KEY `fk_bobot_prioritas_alternatif_id_tanggal_penilaian` (`id_tanggal_penilaian`);

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
  ADD KEY `fk_id_penilaian_penilaian` (`id_penilaian`),
  ADD KEY `fk_id_tanggal_penilaian_catatan_karyawan_tanggal_penilaian` (`id_tanggal_penilaian`);

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

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
  ADD KEY `fk_alternatif_kedua_group_penilaian` (`alternatif_kedua`),
  ADD KEY `fk_id_tanggal_penilaian_tanggal_penilaian` (`id_tanggal_penilaian`);

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
  ADD KEY `fk_perhitungan_alternatif_alternatif_kedua` (`alternatif_kedua`),
  ADD KEY `fk_perhitungan_alternatif_id_tanggal_penilaian` (`id_tanggal_penilaian`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
  ADD KEY `fk_kode_alternatif_ranking_group_penilaian` (`kode_alternatif`),
  ADD KEY `fk_id_tanggal_penilaian_ranking_id_tanggal_penilaian` (`id_tanggal_penilaian`);

--
-- Indexes for table `ratio_index`
--
ALTER TABLE `ratio_index`
  ADD PRIMARY KEY (`id_ratio_index`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- Indexes for table `tanggal_penilaian`
--
ALTER TABLE `tanggal_penilaian`
  ADD PRIMARY KEY (`id_tanggal_penilaian`),
  ADD KEY `fk_tanggal_penilaian_id_group_karyawan` (`id_group_karyawan`);

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
  MODIFY `id_alternatif` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `bobot_prioritas_alternatif`
--
ALTER TABLE `bobot_prioritas_alternatif`
  MODIFY `id_bobot_prioritas_alternatif` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bobot_prioritas_kriteria`
--
ALTER TABLE `bobot_prioritas_kriteria`
  MODIFY `id_bobot_prioritas_kriteria` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bobot_prioritas_subkriteria`
--
ALTER TABLE `bobot_prioritas_subkriteria`
  MODIFY `id_bobot_prioritas_subkriteria` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `catatan_karyawan`
--
ALTER TABLE `catatan_karyawan`
  MODIFY `id_catatan_karyawan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `group_karyawan`
--
ALTER TABLE `group_karyawan`
  MODIFY `id_group_karyawan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_karyawan_detail`
--
ALTER TABLE `group_karyawan_detail`
  MODIFY `id_group_karyawan_detail` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `group_penilaian`
--
ALTER TABLE `group_penilaian`
  MODIFY `id_group_penilaian` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `group_penilaian_detail`
--
ALTER TABLE `group_penilaian_detail`
  MODIFY `id_group_penilaian_detail` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `indikator_subkriteria`
--
ALTER TABLE `indikator_subkriteria`
  MODIFY `id_indikator_subkriteria` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `nilai_skala`
--
ALTER TABLE `nilai_skala`
  MODIFY `id_nilai_skala` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `penilaian_indikator`
--
ALTER TABLE `penilaian_indikator`
  MODIFY `id_penilaian_indikator` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1471;

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
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id_ranking` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ratio_index`
--
ALTER TABLE `ratio_index`
  MODIFY `id_ratio_index` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `skala_indikator`
--
ALTER TABLE `skala_indikator`
  MODIFY `id_skala_indikator` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `skala_indikator_detail`
--
ALTER TABLE `skala_indikator_detail`
  MODIFY `id_skala_indikator_detail` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tanggal_penilaian`
--
ALTER TABLE `tanggal_penilaian`
  MODIFY `id_tanggal_penilaian` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
  ADD CONSTRAINT `fk_bobot_prioritas_alternatif_id_tanggal_penilaian` FOREIGN KEY (`id_tanggal_penilaian`) REFERENCES `tanggal_penilaian` (`id_tanggal_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `fk_id_penilaian_penilaian` FOREIGN KEY (`id_penilaian`) REFERENCES `penilaian` (`id_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_tanggal_penilaian_catatan_karyawan_tanggal_penilaian` FOREIGN KEY (`id_tanggal_penilaian`) REFERENCES `tanggal_penilaian` (`id_tanggal_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `fk_alternatif_kedua_group_penilaian` FOREIGN KEY (`alternatif_kedua`) REFERENCES `group_penilaian` (`alternatif_pertama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alternatif_pertama_group_penilaian` FOREIGN KEY (`alternatif_pertama`) REFERENCES `group_penilaian` (`alternatif_pertama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_tanggal_penilaian_tanggal_penilaian` FOREIGN KEY (`id_tanggal_penilaian`) REFERENCES `tanggal_penilaian` (`id_tanggal_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_perhitungan_alternatif_id_tanggal_penilaian` FOREIGN KEY (`id_tanggal_penilaian`) REFERENCES `tanggal_penilaian` (`id_tanggal_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `fk_id_tanggal_penilaian_ranking_id_tanggal_penilaian` FOREIGN KEY (`id_tanggal_penilaian`) REFERENCES `tanggal_penilaian` (`id_tanggal_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_alternatif_ranking_group_penilaian` FOREIGN KEY (`kode_alternatif`) REFERENCES `group_penilaian` (`alternatif_pertama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

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

--
-- Constraints for table `tanggal_penilaian`
--
ALTER TABLE `tanggal_penilaian`
  ADD CONSTRAINT `fk_tanggal_penilaian_id_group_karyawan` FOREIGN KEY (`id_group_karyawan`) REFERENCES `group_karyawan` (`id_group_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
