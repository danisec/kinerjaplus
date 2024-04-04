-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2024 at 12:13 PM
-- Server version: 8.0.33
-- PHP Version: 8.2.14

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
  `kode_alternatif` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_alternatif` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk_kerja` date NOT NULL,
  `nip` bigint NOT NULL,
  `jabatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `kode_alternatif`, `nama_alternatif`, `jenis_kelamin`, `tanggal_masuk_kerja`, `nip`, `jabatan`, `pendidikan`, `created_at`, `updated_at`) VALUES
(1, 'A1', 'Narenda Fadilla', 'Laki-laki', '2023-11-06', 1283031201, 'Manajer', 'S2', '2023-11-05 17:04:29', '2023-11-05 17:23:41'),
(2, 'A2', 'John Doe', 'Laki-laki', '2023-01-01', 7393493421, 'Pimpinan', 'S2', '2023-11-05 17:11:34', '2023-11-05 17:24:59'),
(5, 'A3', 'Muthia Rana', 'Perempuan', '2022-04-01', 1836394292, 'Guru', 'S1', '2023-11-29 02:50:28', '2023-11-29 02:50:28'),
(6, 'A4', 'Shinta Eka Tedjo', 'Perempuan', '2022-09-14', 1793202312, 'Guru', 'S2', '2024-01-02 03:22:22', '2024-01-02 03:22:22'),
(7, 'A5', 'Hizrian Aiman', 'Laki-laki', '2022-10-25', 8749654320, 'Guru', 'S2', '2024-01-02 03:23:14', '2024-01-02 03:23:14'),
(8, 'A6', 'Emir Bryan Agustina', 'Perempuan', '2022-07-15', 9834038291, 'Guru', 'S2', '2024-01-02 03:23:40', '2024-01-02 03:23:40'),
(9, 'A7', 'Aggil Farida', 'Perempuan', '2022-07-06', 8302834218, 'Guru', 'S2', '2024-01-02 03:24:06', '2024-01-02 03:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `bobot_prioritas_alternatif`
--

CREATE TABLE `bobot_prioritas_alternatif` (
  `id_bobot_prioritas_alternatif` bigint UNSIGNED NOT NULL,
  `kode_kriteria` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_alternatif` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 1, 0.58693333333333, '2024-02-12 12:46:58', '2024-02-12 12:46:58'),
(2, 2, 0.33233333333333, '2024-02-12 12:46:58', '2024-02-12 12:46:58'),
(3, 3, 0.080566666666667, '2024-02-12 12:46:58', '2024-02-12 12:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `bobot_prioritas_subkriteria`
--

CREATE TABLE `bobot_prioritas_subkriteria` (
  `id_bobot_prioritas_subkriteria` bigint UNSIGNED NOT NULL,
  `kode_kriteria` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_prioritas` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bobot_prioritas_subkriteria`
--

INSERT INTO `bobot_prioritas_subkriteria` (`id_bobot_prioritas_subkriteria`, `kode_kriteria`, `bobot_prioritas`, `created_at`, `updated_at`) VALUES
(1, 'K1', 0.58675725333333, '2024-02-12 13:05:39', '2024-02-12 13:05:39'),
(2, 'K2', 0.33203423333333, '2024-02-12 13:05:39', '2024-02-12 13:05:39'),
(3, 'K3', 0.080566666666667, '2024-02-12 13:05:39', '2024-02-12 13:05:39');

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
-- Table structure for table `indikator_subkriteria`
--

CREATE TABLE `indikator_subkriteria` (
  `id_indikator_subkriteria` bigint UNSIGNED NOT NULL,
  `kode_subkriteria` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indikator_subkriteria` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indikator_subkriteria`
--

INSERT INTO `indikator_subkriteria` (`id_indikator_subkriteria`, `kode_subkriteria`, `indikator_subkriteria`, `created_at`, `updated_at`) VALUES
(114, 'SK1', 'Menjalankan nilai-nilai Alkitab.', '2024-01-24 15:34:13', '2024-01-24 15:34:13'),
(115, 'SK1', 'Melakukan tanggung jawab selaras dengan etika kerja dan aturan instansi.', '2024-01-24 15:34:13', '2024-01-24 15:34:13'),
(116, 'SK1', 'Menghadapi dan menyelesaikan konflik dengan tepat.', '2024-01-24 15:34:13', '2024-01-24 15:34:13'),
(117, 'SK2', 'Melaksanakan tugas dengan percaya diri dan penuh tanggung jawab.', '2024-01-24 15:36:09', '2024-01-24 15:36:09'),
(118, 'SK2', 'Mampu membagikan visi instansi kepada orang lain.', '2024-01-24 15:36:09', '2024-01-24 15:36:09'),
(119, 'SK2', 'Memberikan pertolongan bagi orang lain sesuai kemampuan yang dimiliki.', '2024-01-24 15:36:09', '2024-01-24 15:36:09'),
(120, 'SK2', 'Memberdayakan orang lain.', '2024-01-24 15:36:09', '2024-01-24 15:36:09'),
(121, 'SK3', 'Menghargai dan memperlakukan orang lain secara terhormat.', '2024-01-24 15:37:22', '2024-01-24 15:37:22'),
(122, 'SK3', 'Bekerja sama dengan orang lain, saling membantu satu sama lainnya dalam mewujudkan tujuan bersama.', '2024-01-24 15:37:22', '2024-01-24 15:37:22'),
(123, 'SK3', 'Memelihara ciptaan Tuhan, menjaga dan melestarikan lingkungan.', '2024-01-24 15:37:22', '2024-01-24 15:37:22'),
(124, 'SK4', 'Guru menyiapkan fisik dan psikis murid dengan menyapa dan memberi salam.', '2024-01-24 15:48:25', '2024-01-24 15:48:25'),
(125, 'SK5', 'Guru mengajukan pertanyaan pemantik yang menantang untuk memotivasi murid.', '2024-01-24 15:48:54', '2024-01-24 15:48:54'),
(126, 'SK6', 'Guru menyampaikan capaian pembelajaran dan tujuan pembelajaran  yang akan dicapai.', '2024-01-24 15:49:35', '2024-01-24 15:49:35'),
(127, 'SK7', 'Guru menyampaikan topik materi ajar untuk mengarahkan siswa menjawab  pertanyaan pemantik sesuai dengan tujuan pembelajaran.', '2024-01-27 15:07:53', '2024-02-14 04:14:37'),
(128, 'SK8', 'Guru melaksanakan pembelajaran yang kontekstual untuk menumbuhkan dan mengembangkan keterampilan, kebiasaaan dan sikap positif sesuai dengan alokasi waktu yang direncanakan.', '2024-01-27 15:08:48', '2024-01-27 15:08:48'),
(129, 'SK8', 'Guru melaksanakan pembelajaran yang menumbuhkan partisipasi aktif murid dalam mengajukan pertanyaan.', '2024-01-27 15:08:48', '2024-01-27 15:08:48'),
(130, 'SK9', 'Melaksanakan pembelajaran yang mengasah kemampuan Creativity , Critical , Communication, Collaboration thingking (menumbuhkan KSE Murid).', '2024-01-27 15:09:17', '2024-01-27 15:09:17'),
(131, 'SK10', 'Menciptakan suasana kelas yang kondusif untuk proses belajar mengajar (sesuai dengan kesepakatakan kelas dan KSE).', '2024-01-27 15:10:49', '2024-01-27 15:10:49'),
(132, 'SK10', 'Mengomunikasikan pesan bahwa guru percaya akan kemampuan semua murid untuk  belajar dan berprestasi secara akademik.', '2024-01-27 15:10:49', '2024-01-27 15:10:49'),
(133, 'SK10', 'Melaksanakan praktik adaptasi pengajaran sebagai respon atas umpan balik dan respon murid terhadap kebutuhan belajarnya, dapat memberikan konten materi berbeda dalam capaian pembelajaran yang sama di beberapa kelompok (Diferensiasi Konten).', '2024-01-27 15:10:49', '2024-01-27 15:10:49'),
(134, 'SK10', 'Menunjukkan keterampilan dalam penggunaan sumber belajar yang bervariasi dalam bentuk visual, Audio dan kinestetik (Diferensiasi Proses).', '2024-01-27 15:10:49', '2024-01-27 15:10:49'),
(135, 'SK10', 'Menunjukkan keterampilan dalam penggunaan media pembelajaran.', '2024-01-27 15:10:49', '2024-01-27 15:10:49'),
(136, 'SK10', 'Guru dapat menggunakan bahasa lisan secara jelas dan dapat menggunakan bahasa tulis yang baik dan benar (komunikasi efektif).', '2024-01-27 15:10:49', '2024-01-27 15:10:49'),
(137, 'SK11', 'Melakukan pengajaran yang mendorong keterampilan literasi dan numerasi murid.', '2024-01-27 15:11:13', '2024-01-27 15:11:13'),
(138, 'SK12', 'Memfasilitasi dan membimbing murid merangkum materi pelajaran. (refleksi)', '2024-01-27 15:25:59', '2024-01-27 15:25:59'),
(139, 'SK13', 'Melaksanakan penilaian produk melalui  proyek/hasil produk (Diferensiasi Produk).', '2024-01-27 15:26:22', '2024-01-27 15:26:22'),
(140, 'SK14', 'RPP dan berkas administrasi yang lengkap dan memenuhi aspek sesuai ketentuan.', '2024-01-27 15:29:22', '2024-01-27 15:29:22'),
(141, 'SK14', 'Ketepatan waktu kehadiran dan penyerahan berkas.', '2024-01-27 15:29:22', '2024-01-27 15:29:22'),
(142, 'SK14', 'Keikutsertaan dalam  kegiatan wajib di luar jam kerja.', '2024-01-27 15:29:22', '2024-01-27 15:29:22'),
(143, 'SK14', 'Kehadiran (presensi).', '2024-01-27 15:29:22', '2024-01-27 15:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` bigint UNSIGNED NOT NULL,
  `kode_kriteria` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_kriteria` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `bobot_kriteria`, `created_at`, `updated_at`) VALUES
(1, 'K1', 'Kompetensi', 40, '2024-01-24 15:13:54', '2024-01-24 15:13:54'),
(2, 'K2', 'Keterampilan Mengelola Proses Belajar Mengajar', 40, '2024-01-24 15:14:10', '2024-01-24 15:14:10'),
(3, 'K3', 'Kepatuhan', 20, '2024-01-24 15:14:28', '2024-01-24 15:23:48');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2023_10_03_101417_create_ratio_index_table', 6),
(32, '2023_10_30_095058_create_kriteria_table', 7),
(56, '2023_10_30_100000_create_sub_kriteria_table', 8),
(57, '2023_10_30_100145_create_fk_sub_kriteria_table', 8),
(58, '2023_10_30_100308_create_indikator_sub_kriteria_table', 9),
(59, '2023_11_07_131546_create_penilaian_table', 10),
(60, '2023_11_07_132145_create_fk_penilaian_table', 10),
(62, '2023_11_07_133516_create_penilaian_indikator_table', 11),
(63, '2023_11_07_133718_create_fk_penilaian_indikator_table', 11),
(64, '2023_11_12_183005_create_perhitungan_kriteria_table', 12),
(65, '2023_11_12_183159_create_fk_perhitungan_kriteria_table', 12),
(66, '2023_11_12_184602_create_bobot_prioritas_kriteria_table', 13),
(67, '2023_11_12_184631_create_fk_bobot_prioritas_kriteria_table', 13),
(68, '2023_11_14_041534_create_perhitungan_subkriteria_table', 14),
(69, '2023_11_14_041621_create_fk_perhitungan_subkriteria_table', 14),
(70, '2023_11_29_100219_create_perhitungan_alternatif_table', 15),
(71, '2023_11_29_100255_create_fk_perhitungan_alternatif_table', 15),
(72, '2023_11_29_100527_create_bobot_prioritas_alternatif_table', 16),
(73, '2023_11_29_100553_create_fk_bobot_prioritas_alternatif_table', 16),
(74, '2023_12_04_105928_create_bobot_prioritas_subkriteria_table', 17),
(75, '2023_12_04_110017_create_fk_bobot_prioritas_subkriteria_table', 17),
(77, '2023_12_12_082717_create_skala_indikator_table', 18),
(78, '2023_12_12_085155_create_fk_skala_indikator_table', 18),
(79, '2023_12_12_101716_create_skala_indikator_detail_table', 19),
(80, '2023_12_12_101837_create_fk_skala_indikator_detail_table', 19),
(81, '2023_12_20_151033_create_nilai_skala_table', 20),
(82, '2023_12_25_171917_create_ranking_table', 21),
(83, '2023_12_25_173403_create_fk_ranking_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_skala`
--

CREATE TABLE `nilai_skala` (
  `id_nilai_skala` bigint UNSIGNED NOT NULL,
  `skala` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_skala` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_skala`
--

INSERT INTO `nilai_skala` (`id_nilai_skala`, `skala`, `nilai_skala`, `created_at`, `updated_at`) VALUES
(1, '1', 70, '2023-12-24 23:31:08', '2023-12-25 17:27:25'),
(2, '2', 75, '2023-12-24 23:31:08', '2023-12-25 17:27:25'),
(3, '3', 85, '2023-12-24 23:31:08', '2023-12-25 17:27:25'),
(4, '4', 100, '2023-12-24 23:31:08', '2023-12-25 17:27:25');

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
  `tahun_ajaran` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternatif_pertama` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternatif_kedua` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `kode_kriteria` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternatif_pertama` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternatif_kedua` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'K1', 'K1', 1, '2024-01-29 17:04:58', '2024-01-29 17:04:58'),
(2, 'K1', 'K2', 3, '2024-01-29 17:04:58', '2024-01-29 17:04:58'),
(3, 'K1', 'K3', 5, '2024-01-29 17:04:58', '2024-01-29 17:04:58'),
(4, 'K2', 'K1', 0.3333, '2024-01-29 17:04:58', '2024-01-29 17:04:58'),
(5, 'K2', 'K2', 1, '2024-01-29 17:04:58', '2024-01-29 17:04:58'),
(6, 'K2', 'K3', 7, '2024-01-29 17:04:58', '2024-01-29 17:04:58'),
(7, 'K3', 'K1', 0.2, '2024-01-29 17:04:58', '2024-01-29 17:04:58'),
(8, 'K3', 'K2', 0.1429, '2024-01-29 17:04:58', '2024-01-29 17:04:58'),
(9, 'K3', 'K3', 1, '2024-01-29 17:04:58', '2024-01-29 17:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan_subkriteria`
--

CREATE TABLE `perhitungan_subkriteria` (
  `id_perhitungan_subkriteria` bigint UNSIGNED NOT NULL,
  `kode_kriteria` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subkriteria_pertama` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subkriteria_kedua` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_subkriteria` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perhitungan_subkriteria`
--

INSERT INTO `perhitungan_subkriteria` (`id_perhitungan_subkriteria`, `kode_kriteria`, `subkriteria_pertama`, `subkriteria_kedua`, `nilai_subkriteria`, `created_at`, `updated_at`) VALUES
(1, 'K1', 'SK1', 'SK1', 1, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(2, 'K1', 'SK1', 'SK2', 3, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(3, 'K1', 'SK1', 'SK3', 5, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(4, 'K1', 'SK2', 'SK1', 0.3333, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(5, 'K1', 'SK2', 'SK2', 1, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(6, 'K1', 'SK2', 'SK3', 7, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(7, 'K1', 'SK3', 'SK1', 0.2, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(8, 'K1', 'SK3', 'SK2', 0.1429, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(9, 'K1', 'SK3', 'SK3', 1, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(10, 'K2', 'SK4', 'SK4', 1, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(11, 'K2', 'SK4', 'SK5', 3, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(12, 'K2', 'SK4', 'SK6', 5, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(13, 'K2', 'SK4', 'SK7', 6, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(14, 'K2', 'SK4', 'SK8', 7, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(15, 'K2', 'SK4', 'SK9', 6, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(16, 'K2', 'SK4', 'SK10', 4, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(17, 'K2', 'SK4', 'SK11', 5, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(18, 'K2', 'SK4', 'SK12', 3, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(19, 'K2', 'SK4', 'SK13', 7, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(20, 'K2', 'SK5', 'SK4', 0.3333, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(21, 'K2', 'SK5', 'SK5', 1, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(22, 'K2', 'SK5', 'SK6', 5, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(23, 'K2', 'SK5', 'SK7', 6, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(24, 'K2', 'SK5', 'SK8', 6, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(25, 'K2', 'SK5', 'SK9', 2, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(26, 'K2', 'SK5', 'SK10', 6, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(27, 'K2', 'SK5', 'SK11', 3, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(28, 'K2', 'SK5', 'SK12', 5, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(29, 'K2', 'SK5', 'SK13', 9, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(30, 'K2', 'SK6', 'SK4', 0.2, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(31, 'K2', 'SK6', 'SK5', 0.2, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(32, 'K2', 'SK6', 'SK6', 1, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(33, 'K2', 'SK6', 'SK7', 5, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(34, 'K2', 'SK6', 'SK8', 5, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(35, 'K2', 'SK6', 'SK9', 8, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(36, 'K2', 'SK6', 'SK10', 6, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(37, 'K2', 'SK6', 'SK11', 6, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(38, 'K2', 'SK6', 'SK12', 3, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(39, 'K2', 'SK6', 'SK13', 7, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(40, 'K2', 'SK7', 'SK4', 0.1667, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(41, 'K2', 'SK7', 'SK5', 0.1667, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(42, 'K2', 'SK7', 'SK6', 0.2, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(43, 'K2', 'SK7', 'SK7', 1, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(44, 'K2', 'SK7', 'SK8', 3, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(45, 'K2', 'SK7', 'SK9', 6, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(46, 'K2', 'SK7', 'SK10', 5, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(47, 'K2', 'SK7', 'SK11', 5, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(48, 'K2', 'SK7', 'SK12', 7, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(49, 'K2', 'SK7', 'SK13', 8, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(50, 'K2', 'SK8', 'SK4', 0.1429, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(51, 'K2', 'SK8', 'SK5', 0.1667, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(52, 'K2', 'SK8', 'SK6', 0.2, '2024-02-12 12:43:48', '2024-02-12 12:43:48'),
(53, 'K2', 'SK8', 'SK7', 0.3333, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(54, 'K2', 'SK8', 'SK8', 1, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(55, 'K2', 'SK8', 'SK9', 4, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(56, 'K2', 'SK8', 'SK10', 4, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(57, 'K2', 'SK8', 'SK11', 7, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(58, 'K2', 'SK8', 'SK12', 6, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(59, 'K2', 'SK8', 'SK13', 4, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(60, 'K2', 'SK9', 'SK4', 0.1667, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(61, 'K2', 'SK9', 'SK5', 0.5, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(62, 'K2', 'SK9', 'SK6', 0.125, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(63, 'K2', 'SK9', 'SK7', 0.1667, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(64, 'K2', 'SK9', 'SK8', 0.25, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(65, 'K2', 'SK9', 'SK9', 1, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(66, 'K2', 'SK9', 'SK10', 5, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(67, 'K2', 'SK9', 'SK11', 5, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(68, 'K2', 'SK9', 'SK12', 6, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(69, 'K2', 'SK9', 'SK13', 8, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(70, 'K2', 'SK10', 'SK4', 0.25, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(71, 'K2', 'SK10', 'SK5', 0.1667, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(72, 'K2', 'SK10', 'SK6', 0.1667, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(73, 'K2', 'SK10', 'SK7', 0.2, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(74, 'K2', 'SK10', 'SK8', 0.25, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(75, 'K2', 'SK10', 'SK9', 0.2, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(76, 'K2', 'SK10', 'SK10', 1, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(77, 'K2', 'SK10', 'SK11', 3, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(78, 'K2', 'SK10', 'SK12', 6, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(79, 'K2', 'SK10', 'SK13', 7, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(80, 'K2', 'SK11', 'SK4', 0.2, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(81, 'K2', 'SK11', 'SK5', 0.3333, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(82, 'K2', 'SK11', 'SK6', 0.1667, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(83, 'K2', 'SK11', 'SK7', 0.2, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(84, 'K2', 'SK11', 'SK8', 0.1429, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(85, 'K2', 'SK11', 'SK9', 0.2, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(86, 'K2', 'SK11', 'SK10', 0.3333, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(87, 'K2', 'SK11', 'SK11', 1, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(88, 'K2', 'SK11', 'SK12', 3, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(89, 'K2', 'SK11', 'SK13', 5, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(90, 'K2', 'SK12', 'SK4', 0.3333, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(91, 'K2', 'SK12', 'SK5', 0.2, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(92, 'K2', 'SK12', 'SK6', 0.3333, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(93, 'K2', 'SK12', 'SK7', 0.1429, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(94, 'K2', 'SK12', 'SK8', 0.1667, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(95, 'K2', 'SK12', 'SK9', 0.1667, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(96, 'K2', 'SK12', 'SK10', 0.1667, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(97, 'K2', 'SK12', 'SK11', 0.3333, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(98, 'K2', 'SK12', 'SK12', 1, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(99, 'K2', 'SK12', 'SK13', 7, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(100, 'K2', 'SK13', 'SK4', 0.1429, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(101, 'K2', 'SK13', 'SK5', 0.1111, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(102, 'K2', 'SK13', 'SK6', 0.1429, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(103, 'K2', 'SK13', 'SK7', 0.125, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(104, 'K2', 'SK13', 'SK8', 0.25, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(105, 'K2', 'SK13', 'SK9', 0.125, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(106, 'K2', 'SK13', 'SK10', 0.1429, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(107, 'K2', 'SK13', 'SK11', 0.2, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(108, 'K2', 'SK13', 'SK12', 0.1429, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(109, 'K2', 'SK13', 'SK13', 1, '2024-02-12 12:43:49', '2024-02-12 12:43:49'),
(110, 'K3', 'SK14', 'SK14', 1, '2024-02-12 12:43:49', '2024-02-12 12:43:49');

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
  `tahun_ajaran` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_alternatif` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 1, 0, '2023-12-04 04:36:30', '2023-12-04 04:36:30'),
(2, 2, 0, '2023-12-04 04:36:30', '2023-12-04 04:36:30'),
(3, 3, 0.58, '2023-12-04 04:36:30', '2023-12-04 04:36:30'),
(4, 4, 0.9, '2023-12-04 04:36:31', '2023-12-04 04:36:31'),
(5, 5, 1.12, '2023-12-04 04:36:31', '2023-12-04 04:36:31'),
(6, 6, 1.24, '2023-12-04 04:36:31', '2023-12-04 04:36:31'),
(7, 7, 1.32, '2023-12-04 04:36:31', '2023-12-04 04:36:31'),
(8, 8, 1.41, '2023-12-04 04:36:31', '2023-12-04 04:36:31'),
(9, 9, 1.45, '2023-12-04 04:36:31', '2023-12-04 04:36:31'),
(10, 10, 1.49, '2023-12-04 04:36:31', '2023-12-04 04:36:31'),
(11, 11, 1.51, '2023-12-04 04:36:31', '2023-12-04 04:36:31'),
(12, 12, 1.48, '2023-12-04 04:36:31', '2023-12-04 04:36:31'),
(13, 13, 1.56, '2023-12-04 04:36:31', '2023-12-04 04:36:31'),
(14, 14, 1.57, '2023-12-04 04:36:31', '2023-12-04 04:36:31'),
(15, 15, 1.59, '2023-12-04 04:36:31', '2023-12-04 04:36:31'),
(16, 16, 1.605, '2023-12-04 04:36:31', '2023-12-04 04:36:31'),
(17, 17, 1.61, '2023-12-04 04:36:31', '2023-12-04 04:36:31'),
(18, 18, 1.615, '2023-12-04 04:36:31', '2023-12-04 04:36:31'),
(19, 19, 1.62, '2023-12-04 04:36:31', '2023-12-04 04:36:31'),
(20, 20, 1.625, '2023-12-04 04:36:31', '2023-12-04 04:36:31');

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
(1, 114, '2024-01-24 15:38:47', '2024-01-24 15:38:47'),
(2, 115, '2024-01-24 15:39:31', '2024-01-24 15:39:31'),
(3, 116, '2024-01-24 15:40:14', '2024-01-24 15:40:14'),
(4, 117, '2024-01-24 15:42:06', '2024-01-24 15:42:06'),
(5, 118, '2024-01-24 15:42:38', '2024-01-24 15:42:38'),
(6, 119, '2024-01-24 15:43:09', '2024-01-24 15:43:09'),
(7, 120, '2024-01-24 15:43:43', '2024-01-24 15:43:43'),
(8, 121, '2024-01-24 15:44:19', '2024-01-24 15:44:19'),
(9, 122, '2024-01-24 15:45:30', '2024-01-24 15:45:30'),
(10, 123, '2024-01-24 15:46:00', '2024-01-24 15:46:00'),
(11, 124, '2024-01-27 15:04:02', '2024-01-27 15:04:02'),
(12, 125, '2024-01-27 15:04:59', '2024-01-27 15:04:59'),
(13, 126, '2024-01-27 15:06:13', '2024-01-27 15:06:13'),
(14, 127, '2024-01-27 15:13:02', '2024-01-27 15:13:02'),
(15, 128, '2024-01-27 15:13:57', '2024-01-27 15:13:57'),
(16, 129, '2024-01-27 15:14:58', '2024-01-27 15:14:58'),
(17, 130, '2024-01-27 15:15:45', '2024-01-27 15:15:45'),
(18, 131, '2024-01-27 15:17:02', '2024-01-27 15:17:02'),
(19, 132, '2024-01-27 15:18:46', '2024-01-27 15:18:46'),
(20, 133, '2024-01-27 15:19:38', '2024-01-27 15:19:38'),
(21, 134, '2024-01-27 15:23:07', '2024-01-27 15:23:07'),
(22, 135, '2024-01-27 15:23:51', '2024-01-27 15:23:51'),
(23, 136, '2024-01-27 15:24:36', '2024-01-27 15:24:36'),
(24, 137, '2024-01-27 15:25:22', '2024-01-27 15:25:22'),
(25, 138, '2024-01-27 15:27:09', '2024-01-27 15:27:09'),
(26, 139, '2024-01-27 15:27:58', '2024-01-27 15:27:58'),
(27, 140, '2024-01-27 15:30:03', '2024-01-27 15:30:03'),
(28, 141, '2024-01-27 15:30:37', '2024-01-27 15:30:37'),
(29, 142, '2024-01-27 15:31:14', '2024-01-27 15:31:14'),
(30, 143, '2024-01-27 15:31:48', '2024-01-27 15:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `skala_indikator_detail`
--

CREATE TABLE `skala_indikator_detail` (
  `id_skala_indikator_detail` bigint UNSIGNED NOT NULL,
  `id_skala_indikator` bigint UNSIGNED NOT NULL,
  `skala` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_skala` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skala_indikator_detail`
--

INSERT INTO `skala_indikator_detail` (`id_skala_indikator_detail`, `id_skala_indikator`, `skala`, `deskripsi_skala`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'Tidak mengakui kesalahan, menutupi informasi/kejadian. Melemparkan kesalahan/tanggung jawab kepada orang lain.', '2024-01-24 15:38:47', '2024-01-24 15:38:47'),
(2, 1, '2', 'Mengakui kesalahan karena terpaksa, bukan atas inisiatif sendiri; melibatkan pihak lain untuk ikut bertanggung jawab atas masalah.', '2024-01-24 15:38:47', '2024-01-24 15:38:47'),
(3, 1, '3', 'Jujur, mengakui kesalahan dengan segera, tidak menutupi informasi/ kejadian dan bersedia menanggung konsekuensi yang terjadi.', '2024-01-24 15:38:47', '2024-01-24 15:38:47'),
(4, 1, '4', 'Terbuka terhadap fakta, informasi, kejadian. Sangat minim melakukan kesalahan karena menjalankan nilai Alkitab dengan konsisten.', '2024-01-24 15:38:47', '2024-01-24 15:38:47'),
(5, 2, '1', 'Melakukan cara atau tindakan yang bertentangan dengan aturan instansi secara sengaja.', '2024-01-24 15:39:31', '2024-01-24 15:39:31'),
(6, 2, '2', 'Mengambil keputusan/bertindak berdasarkan suatu kejadian saja tanpa mengacu aturan/ prosedur instansi.', '2024-01-24 15:39:31', '2024-01-24 15:39:31'),
(7, 2, '3', 'Mengambil keputusan/bertindak sesuai dengan aturan/prosedur instansi dengan mempertimbangkan konteks.', '2024-01-24 15:39:31', '2024-01-24 15:39:31'),
(8, 2, '4', 'Mengambil keputusan sesuai aturan/prosedur instansi dengan mempertimbangkan konteks dan tanggung jawab serta nilai moral/etika.', '2024-01-24 15:39:31', '2024-01-24 15:39:31'),
(9, 3, '1', 'Menghindari konflik, tidak bersedia terlibat situasi/tanggung jawab yang berpotensi terjadi konflik. Meniadakan konflik, tidak mau menghadapinya.', '2024-01-24 15:40:14', '2024-01-24 15:40:14'),
(10, 3, '2', 'Membutuhkan bantuan solusi dan pendampingan dari atasan/rekan kerja untuk menyelesaikan konflik.', '2024-01-24 15:40:14', '2024-01-24 15:40:14'),
(11, 3, '3', 'Menghadapi pihak lain yang terlibat konflik dengan terbuka dan menemukan win-win solution meskipun masih memerlukan pendampingan/mediasi.', '2024-01-24 15:40:14', '2024-01-24 15:40:14'),
(12, 3, '4', 'Mampu memahami kepentingan pihak lain yang terlibat konflik, dan mampu menyelesaikan secara mandiri bersama pihak terkait selaras dengan nilai dan etika.', '2024-01-24 15:40:14', '2024-01-24 15:40:14'),
(13, 4, '1', 'Belum menunjukkan inisiatif dalam mengerjakan tugas, mengalami kesulitan memenuhi standar dan batas waktu yang ditetapkan.', '2024-01-24 15:42:06', '2024-01-24 15:42:06'),
(14, 4, '2', 'Ada insiatif untuk mengerjakan tugas dan mencari bantuan, namun membutuhkan pendampingan/\r\npengawasan agar selesai sesuai standar.', '2024-01-24 15:42:06', '2024-01-24 15:42:06'),
(15, 4, '3', 'Dapat menyelesaikan tugasnya dengan pengawasan yang minimal sesuai dengan standar dan batas waktu.', '2024-01-24 15:42:06', '2024-01-24 15:42:06'),
(16, 4, '4', 'Mampu membagi waktu maupun menentukan prioritas kerja dengan efektif dan menyelesaikan tugas secara mandiri di atas standar yang ditetapkan.', '2024-01-24 15:42:06', '2024-01-24 15:42:06'),
(17, 5, '1', 'Tidak mengetahui visi instansi.', '2024-01-24 15:42:38', '2024-01-24 15:42:38'),
(18, 5, '2', 'Dapat menyebutkan visi instansi namun belum mengenali penerapannya dalam lingkup tugas sehari-hari.', '2024-01-24 15:42:38', '2024-01-24 15:42:38'),
(19, 5, '3', 'Dapat menyampaikan visi instansi dengan kontekstual dalam kegiatan kerja sehari-hari.', '2024-01-24 15:42:38', '2024-01-24 15:42:38'),
(20, 5, '4', 'Memahami visi instansi dan mampu menerapkan secara komprehensif dalam pekerjaan sehari-hari.', '2024-01-24 15:42:38', '2024-01-24 15:42:38'),
(21, 6, '1', 'Enggan untuk memberikan pertolongan; bersedia memberikan bantuan terbatas saat ditugaskan oleh atasan.', '2024-01-24 15:43:09', '2024-01-24 15:43:09'),
(22, 6, '2', 'Bersedia memberikan bantuan apabila ada pihak yang meminta.', '2024-01-24 15:43:09', '2024-01-24 15:43:09'),
(23, 6, '3', 'Menunjukkan inisiatif untuk menawarkan bantuan kepada sesama rekan kerja maupun siswa.', '2024-01-24 15:43:09', '2024-01-24 15:43:09'),
(24, 6, '4', 'Proaktif untuk menawarkan bantuan dan mampu menyesuaikan bentuk/jenis bantuan bagi rekan kerja/siswa secara spesifik.', '2024-01-24 15:43:09', '2024-01-24 15:43:09'),
(25, 7, '1', 'Tidak memberikan kesempatan bagi siswa/rekan kerja untuk belajar/melakukan hal baru.', '2024-01-24 15:43:43', '2024-01-24 15:43:43'),
(26, 7, '2', 'Memberikan pendampingan/melatih siswa/rekan kerja dengan sporadis, untuk situasi tertentu.', '2024-01-24 15:43:43', '2024-01-24 15:43:43'),
(27, 7, '3', 'Mengenali minat/potensi rekan kerja/siswa dan memberikan kesempatan belajar melalui penugasan dan pendampingan.', '2024-01-24 15:43:43', '2024-01-24 15:43:43'),
(28, 7, '4', 'Mampu bertindak sebagai mentor bagi siswa/rekan melalui bantuan/pen dampingan terencana dalam kurun waktu tertentu.', '2024-01-24 15:43:43', '2024-01-24 15:43:43'),
(29, 8, '1', 'Bersikap berdasarkan suasana hati tanpa memperhatikan situasi, menunjukkan sikap/ tindakan berdasarkan status/golongan seseorang.', '2024-01-24 15:44:19', '2024-01-24 15:44:19'),
(30, 8, '2', 'Memberikan tanggapan dan bersikap seadanya, sebatas tuntutan yang menjadi aturan instansi.', '2024-01-24 15:44:19', '2024-01-24 15:44:19'),
(31, 8, '3', 'Dapat berinteraksi dengan orang lain sesuai situasi dengan memperhatikan sopan santun.', '2024-01-24 15:44:19', '2024-01-24 15:44:19'),
(32, 8, '4', 'Bertindak/ bercakap dengan menghargai dan peka terhadap keadaan orang lain serta mampu melakukan penyesuaian yang diperlukan.', '2024-01-24 15:44:19', '2024-01-24 15:44:19'),
(33, 9, '1', 'Menolak umpan balik yang diberikan oleh pihak lain.', '2024-01-24 15:45:30', '2024-01-24 15:45:30'),
(34, 9, '2', 'Menjalankan umpan balik apabila hal tersebut diwajibkan instansi atau mempengaruhi hasil kerja.', '2024-01-24 15:45:30', '2024-01-24 15:45:30'),
(35, 9, '3', 'Bersikap terbuka dan menghargai pendapat/ masukan orang lain serta menjalankan perbaikan berdasarkan hal tersebut.', '2024-01-24 15:45:30', '2024-01-24 15:45:30'),
(36, 9, '4', 'Proaktif mencari umpan balik/masukan terhadap hasil kerja maupun kegiatan yang dilakukan, terutama dari orang lain yang lebih ahli dalam bidang tsb dan bersedia menjalankannya.', '2024-01-24 15:45:30', '2024-01-24 15:45:30'),
(37, 10, '1', 'Melakukan tindakan/perbuatan yang membahayakan dan mengotori lingkungan.', '2024-01-24 15:46:00', '2024-01-24 15:46:00'),
(38, 10, '2', 'Menjaga kebersihan lingkungan yang berada langsung dalam lingkup kerjanya.', '2024-01-24 15:46:00', '2024-01-24 15:46:00'),
(39, 10, '3', 'Menjaga kebersihan area sekolah dan tempat tinggal serta memberikan cara-cara praktis bagi siswa dan rekan kerja untuk melakukan hal yang sama.', '2024-01-24 15:46:00', '2024-01-24 15:46:00'),
(40, 10, '4', 'Melakukan cara-cara yang terarah untuk mengedukasi siswa dan rekan kerja menjaga kelestarian lingkungan sekitar.', '2024-01-24 15:46:00', '2024-01-24 15:46:00'),
(41, 11, '1', 'Menyapa, memberi salam dan mengajak berdoa yang dipimpin oleh siswa.', '2024-01-27 15:04:02', '2024-01-27 15:04:02'),
(42, 11, '2', 'Menyapa,memberi salam,  mengajak berdoa dan mengajukan beberapa pertanyaan berkaitan materi yang sudah dipelajari.', '2024-01-27 15:04:02', '2024-01-27 15:04:02'),
(43, 11, '3', 'Menyapa, memberi salam, mengajak berdoa dan mengajukan beberapa pertanyaan berkaitan materi yang sudah dipelajari dan menyampaikan rencana kegiatan pembelajaran yang akan dipelajari.', '2024-01-27 15:04:02', '2024-01-27 15:04:02'),
(44, 11, '4', 'Menyapa,memberi salam,  mengajak berdoa dan mengajukan beberapa pertanyaan berkaitan materi yang sudah dipelajari dan menyampaikan rencana kegiatan pembelajaran yang akan dipelajari dengan menggunakan media kreatif.', '2024-01-27 15:04:02', '2024-01-27 15:04:02'),
(45, 12, '1', 'Mengajukan pertanyaan pemantik.', '2024-01-27 15:04:59', '2024-01-27 15:04:59'),
(46, 12, '2', 'Mengajukan pertanyaan pemantik yang menantang dan membangun motivasi siswa.', '2024-01-27 15:04:59', '2024-01-27 15:04:59'),
(47, 12, '3', 'Mengajukan pertanyaan pemantik yang menantang dan membangun motivasi siswa dan  menyampaikan manfaat hal yang akan dipelajari dalam kehidupan sehari-hari.', '2024-01-27 15:04:59', '2024-01-27 15:04:59'),
(48, 12, '4', 'Mengajukan pertanyaan pemantik yang menantang, membangun motivasi siswa dan menyampaikan manfaat hal yang akan dipelajari dalam kehidupan sehari-hari dengan menggunakan media kreatif.', '2024-01-27 15:04:59', '2024-01-27 15:04:59'),
(49, 13, '1', 'Menyampaikan capaian dan tujuan pembelajaran.', '2024-01-27 15:06:13', '2024-01-27 15:06:13'),
(50, 13, '2', 'Menyampaikan capaian, tujuan pembelajaran dengan mengaitkan materi pembelajaran dengan materi sebelumnya.', '2024-01-27 15:06:13', '2024-01-27 15:06:13'),
(51, 13, '3', 'Menyampaikan capaian, tujuan pembelajaran dan mengaitkan materi pembelajaran dengan materi sebelumnya serta mampu mengarahkan siswa fokus pada materi yang diajarkan.', '2024-01-27 15:06:13', '2024-01-27 15:06:13'),
(52, 13, '4', 'Menyampaikan capaian, tujuan pembelajaran dan mengaitkan materi pembelajaran dengan materi sebelumnya serta mampu mengarahkan siswa fokus pada materi yang diajarkan dengan mengenal emosi siswa.', '2024-01-27 15:06:13', '2024-01-27 15:06:13'),
(53, 14, '1', 'Menyampaikan topik materi ajar dan pertanyaan pemantik.', '2024-01-27 15:13:02', '2024-01-27 15:13:02'),
(54, 14, '2', 'Menyampaikan topik materi ajar, pertanyaan pemantik, mencari jawaban pertanyaan pemantik  dengan pengetahuan lain yang relevan, perkembangan iptek, budaya positif dan kehidupan nyata.', '2024-01-27 15:13:02', '2024-01-27 15:13:02'),
(55, 14, '3', 'Menyampaikan topik materi ajar, pertanyaan pemantik, mencari jawaban pertanyaan pemantik  dengan pengetahuan lain yang relevan, perkembangan iptek, budaya positif dan kehidupan nyata dan menyajikan pembahasan materi pembelajaran yang tepat secara sistematis.', '2024-01-27 15:13:02', '2024-01-27 15:13:02'),
(56, 14, '4', 'Menyampaikan topik materi ajar, pertanyaan pemantik, mencari jawaban pertanyaan pemantik  dengan pengetahuan lain yang relevan, perkembangan iptek, budaya positif dan kehidupan nyata dan menyajikan pembahasan materi pembelajaran yang tepat secara sistematis dengan menggunakan media kreatif.', '2024-01-27 15:13:02', '2024-01-27 15:13:02'),
(57, 15, '1', 'Melaksanakan pembelajaran sesuai dengan kompetensi yang akan dicapai.', '2024-01-27 15:13:57', '2024-01-27 15:13:57'),
(58, 15, '2', 'Melaksanakan pembelajaran sesuai dengan kompetensi yang akan dicapai dengan membentuk kelompok siswa berdasarkan kriteria gaya belajar.', '2024-01-27 15:13:57', '2024-01-27 15:13:57'),
(59, 15, '3', 'Melaksanakan pembelajaran sesuai dengan kompetensi yang akan dicapai dengan membentuk kelompok siswa berdasarkan kriteria gaya belajar yang menumbuhkan dan mengembangkan keterampilan, kebiasaaan dan sikap positif.', '2024-01-27 15:13:57', '2024-01-27 15:13:57'),
(60, 15, '4', 'Melaksanakan pembelajaran sesuai dengan kompetensi yang akan dicapai dengan membentuk kelompok siswa berdasarkan kriteria gaya belajar yang menumbuhkan dan mengembangkan keterampilan, kebiasaaan dan sikap positif, sesuai alokasi waktu yang direncanakan.', '2024-01-27 15:13:57', '2024-01-27 15:13:57'),
(61, 16, '1', 'melaksanakan pembelajaran yang menumbuhkan partisipasi aktif.', '2024-01-27 15:14:58', '2024-01-27 15:14:58'),
(62, 16, '2', 'Melaksanakan pembelajaran yang menumbuhkan partisipasi aktif dalam diskusi kelompok.', '2024-01-27 15:14:58', '2024-01-27 15:14:58'),
(63, 16, '3', 'Melaksanakan pembelajaran yang menumbuhkan partisipasi aktif dalam diskusi kelompok serta mempresentasikan hasil diskusi.', '2024-01-27 15:14:58', '2024-01-27 15:14:58'),
(64, 16, '4', 'Melaksanakan pembelajaran yang menumbuhkan partisipasi aktif dalam diskusi kelompok dan mempresentasikan hasil diskusi serta menghasilkan karya tulis/ produk.', '2024-01-27 15:14:58', '2024-01-27 15:14:58'),
(65, 17, '1', 'melaksanakan pembelajaran yang mengasah kreatif dan kritis siswa.', '2024-01-27 15:15:45', '2024-01-27 15:15:45'),
(66, 17, '2', 'Melaksanakan pembelajaran yang mengasah kreativitas, menumbuhkan pemikiran yang kritis  dan mampu mengkomunikasikan materi yang didapat saat pembelajaran.', '2024-01-27 15:15:45', '2024-01-27 15:15:45'),
(67, 17, '3', 'Melaksanakan pembelajaran yang mengasah kreativitas, menumbuhkan pemikiran yang kritis,  mengkomunikasikan serta mampu berkolaborasi antar siswa sesuai materi yang didapat saat pembelajaran.', '2024-01-27 15:15:45', '2024-01-27 15:15:45'),
(68, 17, '4', 'Melaksanakan pembelajaran yang mengasah kreativitas,  menumbuhkan pemikiran yang kritis,  mengkomunikasikan serta mampu berkolaborasi antar siswa sesuai materi yang didapat saat pembelajaran dengan menggunakan berbagai media belajar.', '2024-01-27 15:15:45', '2024-01-27 15:15:45'),
(69, 18, '1', 'Menciptakan suasana kelas yang kondusif untuk proses belajar mengajar.', '2024-01-27 15:17:02', '2024-01-27 15:17:02'),
(70, 18, '2', 'Menciptakan suasana kelas yang kondusif  dengan menerapkan prinsip disiplin positif untuk proses belajar mengajar.', '2024-01-27 15:17:02', '2024-01-27 15:17:02'),
(71, 18, '3', 'Menciptakan suasana kelas yang kondusif  dengan menerapkan prinsip disiplin positif untuk membentuk perilaku adaptif yang telah disepakati dalam proses belajar mengajar.', '2024-01-27 15:17:02', '2024-01-27 15:17:02'),
(72, 18, '4', 'Menciptakan suasana kelas yang kondusif  dengan menerapkan prinsip disiplin positif untuk membentuk perilaku adaptif yang telah disepakati dan menuliskan komitmen kelas dalam proses belajar mengajar.', '2024-01-27 15:17:02', '2024-01-27 15:17:02'),
(73, 19, '1', 'Mengomunikasikan pesan bahwa guru percaya akan kemampuan semua murid untuk  belajar dan berprestasi secara akademik.', '2024-01-27 15:18:46', '2024-01-27 15:18:46'),
(74, 19, '2', 'Mengomunikasikan pesan bahwa guru percaya akan kemampuan semua murid untuk  belajar, member I perhatian dan bantuan ekstra sesuai kebutuhan belajar setiap siswa.', '2024-01-27 15:18:46', '2024-01-27 15:18:46'),
(75, 19, '3', 'Mengomunikasikan pesan bahwa guru percaya akan kemampuan semua murid untuk  belajar, memberi perhatian, bantuan ekstra, melakukan evaluasi dan motivasi sesuai kebutuhan belajar.', '2024-01-27 15:18:46', '2024-01-27 15:18:46'),
(76, 19, '4', 'Mengomunikasikan pesan bahwa guru percaya akan kemampuan semua murid untuk  belajar, memberi perhatian, bantuan ekstra, melakukan evaluasi dan motivasi sesuai kebutuhan belajar setiap dan membuat rubrik prestasi belajar.', '2024-01-27 15:18:46', '2024-01-27 15:18:46'),
(77, 20, '1', 'melaksanakan praktik adaptasi pengajaran sebagai respon atas umpan balik dan respon murid terhadap kebutuhan belajarnya.', '2024-01-27 15:19:38', '2024-01-27 15:19:38'),
(78, 20, '2', 'Melaksanakan praktik adaptasi pengajaran sebagai respon atas umpan balik terhadap kebutuhan belajarnya dan memberi konten materi berbeda dalam capaian pembelajaran yang sama.', '2024-01-27 15:19:38', '2024-01-27 15:19:38'),
(79, 20, '3', 'Melaksanakan praktik adaptasi pengajaran sebagai respon atas umpan balik dan respon murid terhadap kebutuhan belajarnya dan member konten materi berbeda dalam capaian pembelajaran yang sama di beberapa kelompok yang berbeda dan mampu menerapka serta berkolaborasi dalam memaknai materi ajar.', '2024-01-27 15:19:38', '2024-01-27 15:19:38'),
(80, 20, '4', 'Melaksanakan praktik adaptasi pengajaran sebagai respon atas umpan balik dan respon murid terhadap kebutuhan belajarnya dan member konten materi berbeda dalam capaian pembelajaran yang sama di beberapa kelompok yang berbeda dan mampu menerapka serta berkolaborasi dalam memaknai materi ajar dalam setiap pembelajaran.', '2024-01-27 15:19:38', '2024-01-27 15:19:38'),
(81, 21, '1', 'Menunjukkan keterampilan dalam penggunaan sumber belajar yang bervariasi.', '2024-01-27 15:23:07', '2024-01-27 15:23:07'),
(82, 21, '2', 'Menunjukkan keterampilan dalam penggunaan sumber belajar , media yang bervariasi yaitu visual dan audio.', '2024-01-27 15:23:07', '2024-01-27 15:23:07'),
(83, 21, '3', 'Menunjukkan keterampilan dalam penggunaan sumber belajar , media yang bervariasi yaitu visual, Audio dan kinestetik.', '2024-01-27 15:23:07', '2024-01-27 15:23:07'),
(84, 21, '4', 'Menunjukkan keterampilan dalam penggunaan sumber belajar , media yang bervariasi yaitu visual, Audio dan kinestetik yang menarik.', '2024-01-27 15:23:07', '2024-01-27 15:23:07'),
(85, 22, '1', 'Membawa alat peraga dalam kelas.', '2024-01-27 15:23:51', '2024-01-27 15:23:51'),
(86, 22, '2', 'Membawa alat peraga dalam kelas dan menggunakannya saat pembelajaran.', '2024-01-27 15:23:51', '2024-01-27 15:23:51'),
(87, 22, '3', 'Membawa alat peraga dalam kelas dan menggunakannya saat pembelajaran serta melibatkan siswa dalam menggunakan alat tersebut.', '2024-01-27 15:23:51', '2024-01-27 15:23:51'),
(88, 22, '4', 'Membawa alat peraga dalam kelas, menggunakannya saat pembelajaran dan melibatkan siswa dalam menggunakan alat tersebut serta dapat membuat alat peraga sendiri.', '2024-01-27 15:23:51', '2024-01-27 15:23:51'),
(89, 23, '1', 'Dapat menggunakan bahasa lisan secara jelas dan lancar.', '2024-01-27 15:24:36', '2024-01-27 15:24:36'),
(90, 23, '2', 'Dapat menggunakan bahasa lisan secara jelas, lancar dan menggunakan Bahasa tulis yang baik dan benar.', '2024-01-27 15:24:36', '2024-01-27 15:24:36'),
(91, 23, '3', 'Dapat menggunakan bahasa lisan secara jelas, lancar dan menggunakan Bahasa tulis yang baik dan benar serta memberi motivasi untuk menerapkan bahasa lisan,  tulisan yang baik dan benar.', '2024-01-27 15:24:36', '2024-01-27 15:24:36'),
(92, 23, '4', 'Dapat menggunakan bahasa lisan secara jelas, lancar dan menggunakan bahasa tulis yang baik dan benar serta memberi motivasi untuk menerapkan bahasa lisan,  tulisan yang baik dan benar dengan membuat satu contoh karya tulis.', '2024-01-27 15:24:36', '2024-01-27 15:24:36'),
(93, 24, '1', 'Melakukan pengajaran yang mendorong keterampilan literasi murid.', '2024-01-27 15:25:22', '2024-01-27 15:25:22'),
(94, 24, '2', 'Melakukan pengajaran yang mendorong keterampilan literasi dan numerasi murid.', '2024-01-27 15:25:22', '2024-01-27 15:25:22'),
(95, 24, '3', 'Melakukan pengajaran yang mendorong keterampilan literasi, numerasi dan mendorong siswa untuk membuat projek hasil karya literasi.', '2024-01-27 15:25:22', '2024-01-27 15:25:22'),
(96, 24, '4', 'Melakukan pengajaran dan menerapkan keterampilan literasi, dengan melakukan PTK.', '2024-01-27 15:25:22', '2024-01-27 15:25:22'),
(97, 25, '1', 'Memfasilitasi dan membimbing murid merangkum materi pelajaran dalam bentuk penugasan.', '2024-01-27 15:27:09', '2024-01-27 15:27:09'),
(98, 25, '2', 'Memfasilitasi dan membimbing murid merangkum materi dalam bentuk penugasan terstuktur.', '2024-01-27 15:27:09', '2024-01-27 15:27:09'),
(99, 25, '3', 'Memfasilitasi dan membimbing murid merangkum materi dalam bentuk penugasan terstuktur untuk meningkatkan pengetahuan, keterampilan mengajar.', '2024-01-27 15:27:09', '2024-01-27 15:27:09'),
(100, 25, '4', 'Memfasilitasi dan membimbing murid merangkum materi dalam bentuk penugasan terstuktur untuk meningkatkan pengetahuan, keterampilan mengajar, evaluasi dengan memberikan angket penilaian teman sejawat.', '2024-01-27 15:27:09', '2024-01-27 15:27:09'),
(101, 26, '1', 'Melaksanakan penilaian produk melalui  projek / hasil produk.', '2024-01-27 15:27:58', '2024-01-27 15:27:58'),
(102, 26, '2', 'Melaksanakan penilaian produk melalui  projek / hasil produk dan melaksanakan penilaian pengetahuan melalui tes formatif.', '2024-01-27 15:27:58', '2024-01-27 15:27:58'),
(103, 26, '3', 'Melaksanakan penilaian produk melalui  projek / hasil produk, melaksanakan penilaian pengetahuan melalui tes formatif serta penilaian sikap.', '2024-01-27 15:27:58', '2024-01-27 15:27:58'),
(104, 26, '4', 'Melaksanakan penilaian produk melalui  projek / hasil produk, melaksanakan penilaian pengetahuan melalui tes formatif serta penilaian sikap yang disajikan dengan rubrik penilaian.', '2024-01-27 15:27:58', '2024-01-27 15:27:58'),
(105, 27, '1', 'Dibawah 75%.', '2024-01-27 15:30:03', '2024-01-27 15:30:03'),
(106, 27, '2', '75% sampai 85%.', '2024-01-27 15:30:03', '2024-01-27 15:30:03'),
(107, 27, '3', '85% sampai dengan 95%.', '2024-01-27 15:30:03', '2024-01-27 15:30:03'),
(108, 27, '4', 'Lebih dari 95%.', '2024-01-27 15:30:03', '2024-01-27 15:30:03'),
(109, 28, '1', 'Dibawah 75%.', '2024-01-27 15:30:37', '2024-01-27 15:30:37'),
(110, 28, '2', '75% sampai 85%.', '2024-01-27 15:30:37', '2024-01-27 15:30:37'),
(111, 28, '3', '85% sampai dengan 95%.', '2024-01-27 15:30:37', '2024-01-27 15:30:37'),
(112, 28, '4', 'Lebih dari 95%.', '2024-01-27 15:30:37', '2024-01-27 15:30:37'),
(113, 29, '1', 'Dibawah 75%.', '2024-01-27 15:31:14', '2024-01-27 15:31:14'),
(114, 29, '2', '75% sampai 85%.', '2024-01-27 15:31:14', '2024-01-27 15:31:14'),
(115, 29, '3', '85% sampai dengan 95%.', '2024-01-27 15:31:14', '2024-01-27 15:31:14'),
(116, 29, '4', 'Lebih dari 95%.', '2024-01-27 15:31:14', '2024-01-27 15:31:14'),
(117, 30, '1', 'Dibawah 75%.', '2024-01-27 15:31:48', '2024-01-27 15:31:48'),
(118, 30, '2', '75% sampai 85%.', '2024-01-27 15:31:48', '2024-01-27 15:31:48'),
(119, 30, '3', '85% sampai dengan 95%.', '2024-01-27 15:31:48', '2024-01-27 15:31:48'),
(120, 30, '4', 'Lebih dari 95%.', '2024-01-27 15:31:48', '2024-01-27 15:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` bigint UNSIGNED NOT NULL,
  `kode_kriteria` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_subkriteria` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_subkriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_subkriteria` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `kode_kriteria`, `kode_subkriteria`, `nama_subkriteria`, `deskripsi_subkriteria`, `created_at`, `updated_at`) VALUES
(1, 'K1', 'SK1', 'Spiritualitas dan Integritas', 'Menunjukkan sikap terhormat dalam ucapan dan tindakan, bahkan ketika tidak ada yang melihat; mengikuti prinsip moral dan etika dalam seluruh aspek kehidupan.', '2024-01-24 15:34:13', '2024-01-24 15:34:13'),
(2, 'K1', 'SK2', 'Kepemimpinan dan Keteladanan dalam tanggung jawab kerja', 'Menunjukkan sikap dan keterampilan yang mendorong orang lain untuk meraih hal yang serupa; mampu menjadi inspirasi bagi orang lain untuk menampilkan kinerja yang lebih baik maupun membangun keterampilan tersebut.', '2024-01-24 15:36:09', '2024-01-24 15:36:09'),
(3, 'K1', 'SK3', 'Keterampilan Interpersonal', 'Kemampuan untuk bersikap selaras dengan lingkungan dan komunitas; melakukan interaksi dengan orang lain dan kelompok untuk membangun dan menjaga relasi yang sehat dan saling menguntungkan; disertai upaya menjaga kelestarian dan kebersihan lingkungan.', '2024-01-24 15:37:22', '2024-01-24 15:37:22'),
(4, 'K2', 'SK4', 'Orientasi', NULL, '2024-01-24 15:48:25', '2024-01-24 15:48:25'),
(5, 'K2', 'SK5', 'Motivasi', NULL, '2024-01-24 15:48:54', '2024-01-24 15:48:54'),
(6, 'K2', 'SK6', 'Apersepsi', NULL, '2024-01-24 15:49:35', '2024-01-24 15:49:35'),
(7, 'K2', 'SK7', 'Penguasaan materi pembelajaran', NULL, '2024-01-27 15:07:53', '2024-02-14 04:14:37'),
(8, 'K2', 'SK8', 'Penerapan strategi pembelajaran yang mendidik', NULL, '2024-01-27 15:08:48', '2024-01-27 15:08:48'),
(9, 'K2', 'SK9', 'Aktivitas Pembelajaran HOTS dan Kecakapan Abad 21 (4C)', NULL, '2024-01-27 15:09:17', '2024-01-27 15:09:17'),
(10, 'K2', 'SK10', 'Manajemen Kelas', NULL, '2024-01-27 15:10:49', '2024-01-27 15:10:49'),
(11, 'K2', 'SK11', 'Pembelajaran Literasi Dan Numerasi', NULL, '2024-01-27 15:11:13', '2024-01-27 15:11:13'),
(12, 'K2', 'SK12', 'Proses rangkuman, refleksi, dan tindak lanjut', NULL, '2024-01-27 15:25:59', '2024-01-27 15:25:59'),
(13, 'K2', 'SK13', 'Pelaksanaan Penilaian Hasil Belajar', NULL, '2024-01-27 15:26:22', '2024-01-27 15:26:22'),
(14, 'K3', 'SK14', 'Kepatuhan terhadap Proses Kerja yang berlaku', NULL, '2024-01-27 15:29:22', '2024-01-27 15:29:22');

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
  `role` int DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dani Aprilyanto', 'daniaprilyanto', 'daniaprilyanto@hotmail.com', NULL, '$2y$10$PYpiFNlmx3gI/Z.J2ZbsE.3zoXfoqdoqcs1HRJB7yaJ6tH5AaqvUu', 0, 'vXHrS2IOSKbJkTptEEQwch0PcwGPa1fspte2oIB7A0T2tdqSKa72840WbFlD', '2023-08-29 11:02:31', '2023-08-29 11:02:31', NULL),
(2, 'John Doe', 'johndoe', 'johndoe@gmail.com', NULL, '$2y$10$9.c7apTl8ZJ9lSYyjPoRR.oQa/Fluh2Je0WsQ82wJrJNQjh6.v00W', 2, NULL, '2023-10-03 07:00:45', '2023-11-28 03:07:35', NULL),
(4, 'Muthia Rana', 'muthia', 'muthiarana@gmail.com', NULL, '$2y$10$P9s0VwaotJuW73KBtc/2duk3LnPibGbMMlduiMwh0hF7GE17OWwdW', 3, NULL, '2023-10-29 06:30:03', '2023-11-28 03:07:40', NULL),
(9, 'Narenda Fadilla', 'narenda', 'narendafadilla@gmail.com', NULL, '$2y$10$kwUhyyw7oLIHOf90l3HzpuhsiNpQKygRQ3IDxwZMbXqPXVwrrYbI.', 4, NULL, '2023-11-09 16:04:02', '2023-11-28 03:25:39', NULL),
(10, 'Faisal Rinaldi', 'faisal', 'faisalrinaldi@gmail.com', NULL, '$2y$10$/ms/LnZB1wNxP1sU789XGuvhJC4kNrSWi6hxtxb8qzPyQVJiMMcVK', 1, NULL, '2023-11-09 23:10:16', '2023-11-28 03:07:30', NULL),
(11, 'Riska', 'riska', 'riska@gmail.com', NULL, '$2y$10$OVHaMSv6rKkRGzSYN8543e990G.KNv/tK83QEkzukzr9dkuTSFbla', 5, NULL, '2023-11-28 03:22:39', '2023-11-28 03:22:39', NULL),
(12, 'Shinta Eka Tedjo', 'shinta', 'shinta@gmail.com', NULL, '$2y$10$KyaR8ErQKTE28mUJbVBT3O8FgzYScXGjLIv.tclEVdutMagHBf06e', 4, NULL, '2024-01-02 01:29:17', '2024-01-02 01:29:17', NULL),
(13, 'Aggil Farida', 'Anggil', 'Anggil@gmail.com', NULL, '$2y$10$Ge4k44eWBif9lOKY9cwxDO4ykSRrlMP5otxpGBAUZyPNzB7o0fW1C', 4, NULL, '2024-01-02 03:19:19', '2024-01-02 04:11:57', NULL),
(14, 'Hizrian Aiman', 'Hizrian', 'Hizrian@gmail.com', NULL, '$2y$10$KFEEk8C/21zP1iEVD50N1O2SHrHwQbsqrFICUcRjMMiQN/YbUxfiW', 4, NULL, '2024-01-02 03:19:47', '2024-01-02 03:19:47', NULL),
(15, 'Emir Bryan Agustina', 'Emir', 'Emir@gmail.com', NULL, '$2y$10$a3z.U.UDGZwXXNi0thzzEOONU.FAUV6BOmGEJhD5h8L8upnvjq8eq', 4, NULL, '2024-01-02 03:20:29', '2024-01-02 03:20:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
  ADD KEY `kode_alternatif` (`kode_alternatif`),
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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `indikator_subkriteria`
--
ALTER TABLE `indikator_subkriteria`
  ADD PRIMARY KEY (`id_indikator_subkriteria`),
  ADD KEY `fk_indikator_subkriteria_kode_subkriteria` (`kode_subkriteria`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `kode_kriteria` (`kode_kriteria`);

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
  ADD KEY `fk_penilaian_alternatif_pertama_alternatif_kode_alternatif` (`alternatif_pertama`),
  ADD KEY `fk_penilaian_alternatif_kedua_alternatif_kode_alternatif` (`alternatif_kedua`);

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
  ADD KEY `fk_perhitungan_subkriteria_subkriteria_pertama` (`subkriteria_pertama`),
  ADD KEY `fk_perhitungan_subkriteria_subkriteria_kedua` (`subkriteria_kedua`),
  ADD KEY `fk_perhitungan_subkriteria_kode_kriteria` (`kode_kriteria`);

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
  ADD KEY `fk_ranking_kode_alternatif` (`kode_alternatif`);

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
  ADD KEY `fk_skala_indikator_detail_id_skala_indikator` (`id_skala_indikator`),
  ADD KEY `skala` (`skala`);

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
  ADD KEY `fullname` (`fullname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bobot_prioritas_alternatif`
--
ALTER TABLE `bobot_prioritas_alternatif`
  MODIFY `id_bobot_prioritas_alternatif` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indikator_subkriteria`
--
ALTER TABLE `indikator_subkriteria`
  MODIFY `id_indikator_subkriteria` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

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
  MODIFY `id_perhitungan_alternatif` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `perhitungan_kriteria`
--
ALTER TABLE `perhitungan_kriteria`
  MODIFY `id_perhitungan_kriteria` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `perhitungan_subkriteria`
--
ALTER TABLE `perhitungan_subkriteria`
  MODIFY `id_perhitungan_subkriteria` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

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
  MODIFY `id_skala_indikator_detail` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- Constraints for table `indikator_subkriteria`
--
ALTER TABLE `indikator_subkriteria`
  ADD CONSTRAINT `fk_indikator_subkriteria_kode_subkriteria` FOREIGN KEY (`kode_subkriteria`) REFERENCES `subkriteria` (`kode_subkriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `fk_penilaian_alternatif_kedua_alternatif_kode_alternatif` FOREIGN KEY (`alternatif_kedua`) REFERENCES `alternatif` (`kode_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_penilaian_alternatif_pertama_alternatif_kode_alternatif` FOREIGN KEY (`alternatif_pertama`) REFERENCES `alternatif` (`kode_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_perhitungan_alternatif_alternatif_kedua` FOREIGN KEY (`alternatif_kedua`) REFERENCES `alternatif` (`kode_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_perhitungan_alternatif_alternatif_pertama` FOREIGN KEY (`alternatif_pertama`) REFERENCES `alternatif` (`kode_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `fk_ranking_kode_alternatif` FOREIGN KEY (`kode_alternatif`) REFERENCES `alternatif` (`kode_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

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
