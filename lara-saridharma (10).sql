-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2020 at 08:15 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara-saridharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` int(10) UNSIGNED NOT NULL,
  `nocm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asuransi`
--

CREATE TABLE `asuransi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nm_asuransi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_departemen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `nm_departemen`, `created_at`, `updated_at`) VALUES
(1, 'Medis', NULL, NULL),
(2, 'Perawat', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detil_pembayaran`
--

CREATE TABLE `detil_pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembayaran_id` int(11) NOT NULL,
  `transaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `katagori_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_jual` decimal(8,2) NOT NULL,
  `payer_net` decimal(8,2) DEFAULT NULL,
  `pasien_net` decimal(8,2) DEFAULT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `users_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_dokter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spesialis_id` int(11) NOT NULL,
  `subspesialis_id` int(11) NOT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `users_id`, `nik`, `nama_dokter`, `email`, `no_telp`, `alamat`, `tgl_lahir`, `tempat_lahir`, `spesialis_id`, `subspesialis_id`, `aktif`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, '1121400073', 'Dr Umum', 'wayan.budiastra@gmail.com', '087860333326', 'rsgm', '2019-12-11', 'denpasar', 1, 1, 'Y', NULL, '2019-12-12 01:23:44', '2019-12-12 01:23:44'),
(2, 21, '11215456', 'dr. taufan halim', 'taufan.halim@gmail.com', '087860333326', 'rsgm', '2017-01-01', 'denpasar', 1, 1, 'Y', NULL, '2019-12-13 17:22:59', '2019-12-13 17:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `dokter_poli`
--

CREATE TABLE `dokter_poli` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `poli_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faskes`
--

CREATE TABLE `faskes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_faskes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faskes`
--

INSERT INTO `faskes` (`id`, `kode`, `nm_faskes`, `alamat`, `no_hp`, `email`, `created_at`, `updated_at`) VALUES
(1, '-', 'Klinik Siloam F1 Mertanadhi', 'Jl Mertenadi No 200', '0879664231', 'mertanadi@gmail.com1', '2019-07-12 21:36:53', '2019-12-05 22:15:17'),
(2, '-', 'Klinik Siloam SiliGita', 'Jl Siligita', 'tes', '0564874862', '2019-07-12 21:48:12', '2019-07-12 21:48:12'),
(3, '-', 'tes', 'rsgm', '087860333326', 'wayan.budia@gmail.com', '2019-12-03 23:58:09', '2019-12-03 23:58:09'),
(4, 'G1', 'dr. taufan halim', 'rsgm', '087860333326', 'halim@gmail.com', '2019-12-04 00:02:37', '2019-12-04 00:02:37'),
(5, 'G6', 'tes 2', 'rsgm', '087860333326', 'waastra07@gmail.com', '2019-12-04 00:03:16', '2019-12-04 00:03:16'),
(6, 'G6', 'tes 2', 'rsgm1', '087860333326', 'wayan@gmail.com', '2019-12-04 00:03:44', '2019-12-04 00:03:44'),
(7, 'G7', 'tes 8', 'rsgm1', '087860333326', 'wadiastra@gmail.com', '2019-12-04 00:04:13', '2019-12-04 00:04:13'),
(8, 'tes', 'tes', 'rsgm', '087860333326', 'wayokok@gmail.com', '2019-12-04 00:04:33', '2019-12-04 00:04:33'),
(9, 'G9', 'tes 29', 'rsgm1', '087860333326', 'iastra07@gmail.com', '2019-12-04 00:06:11', '2019-12-04 00:06:11'),
(10, 'G6', 'tes 89', 'rsgm 2', '087860333326', 'budias@gmail.com', '2019-12-04 00:06:42', '2019-12-04 00:06:42'),
(11, 'G66', 'tes 266', 'rsgm 9', '087860333326', 'wayan.bu6@gmail.com', '2019-12-04 00:07:05', '2019-12-04 00:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jasa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jasakatagori_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual` decimal(8,2) NOT NULL,
  `fee_dokter` decimal(8,2) DEFAULT NULL,
  `fee_asisten` decimal(8,2) DEFAULT NULL,
  `fee_staff` decimal(8,2) DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id`, `kode`, `nama_jasa`, `jasakatagori_id`, `harga_jual`, `fee_dokter`, `fee_asisten`, `fee_staff`, `keterangan`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'KJT-00001', 'Admin - Reg Umum', '2', '5000.00', '2000.00', '1000.00', NULL, 'tes', 'N', '2019-12-29 15:17:52', '2019-12-29 15:34:42'),
(2, 'KJT-00002', 'Jarit Luka', '1', '15000.00', '8000.00', '2000.00', NULL, 'tes', 'Y', '2019-12-29 15:18:39', '2019-12-29 15:18:39'),
(3, 'KJT-00003', 'Cek Tensi', '1', '6500.00', '2000.00', '2000.00', NULL, 'tes', 'Y', '2019-12-29 15:24:42', '2019-12-29 15:24:42'),
(4, 'KJT-00004', 'Admin - Reg Spesialis 1', '2', '10000.00', '5000.00', '2000.00', NULL, 'tes', 'Y', '2019-12-29 15:35:39', '2019-12-29 15:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `jasakatagori`
--

CREATE TABLE `jasakatagori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jasakatagori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jasakatagori`
--

INSERT INTO `jasakatagori` (`id`, `nama_jasakatagori`, `keterangan`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'Prosedure', 'tes', 'Y', '2019-12-29 05:30:40', '2019-12-29 05:30:40'),
(2, 'Admin', 'Tes', 'Y', '2019-12-29 05:31:04', '2019-12-29 05:31:04'),
(3, 'Labolatory', 'tes', 'N', '2019-12-29 05:31:29', '2019-12-29 05:40:13'),
(4, 'Radiology', 'tes', 'N', '2019-12-29 05:31:44', '2019-12-29 05:40:04'),
(5, 'Cathlab', 'tes', 'Y', '2019-12-29 05:40:48', '2019-12-29 05:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `kartustok`
--

CREATE TABLE `kartustok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk_item_id` int(11) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `stok_masuk` int(11) NOT NULL,
  `stok_keluar` int(11) NOT NULL,
  `stok_akhir` int(11) NOT NULL,
  `transaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `users_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kartustok`
--

INSERT INTO `kartustok` (`id`, `periode`, `produk_item_id`, `stok_awal`, `stok_masuk`, `stok_keluar`, `stok_akhir`, `transaksi`, `keterangan`, `users_id`, `created_at`, `updated_at`) VALUES
(1, '202001', 2, 213, 10, 0, 223, 'PENERIMAAN', 'penerimaan barang dengan nomor PMA-00001', 1, '2020-01-05 13:24:49', '2020-01-05 13:24:49'),
(2, '202001', 3, 738, 60, 0, 798, 'PENERIMAAN', 'penerimaan barang dengan nomor PMA-00001', 1, '2020-01-05 13:24:49', '2020-01-05 13:24:49'),
(3, '202001', 2, 223, 10, 0, 233, 'PENERIMAAN', 'penerimaan barang dengan nomor PMA-00001', 1, '2020-01-05 13:27:20', '2020-01-05 13:27:20'),
(4, '202001', 3, 798, 60, 0, 858, 'PENERIMAAN', 'penerimaan barang dengan nomor PMA-00001', 1, '2020-01-05 13:27:20', '2020-01-05 13:27:20'),
(5, '202001', 2, 233, 10, 0, 243, 'PENERIMAAN', 'penerimaan barang dengan nomor PMA-00001', 1, '2020-01-05 13:28:04', '2020-01-05 13:28:04'),
(6, '202001', 3, 858, 60, 0, 918, 'PENERIMAAN', 'penerimaan barang dengan nomor PMA-00001', 1, '2020-01-05 13:28:04', '2020-01-05 13:28:04'),
(7, '202001', 2, 243, 10, 0, 253, 'PENERIMAAN', 'penerimaan barang dengan nomor PMA-00001', 1, '2020-01-05 13:28:24', '2020-01-05 13:28:24'),
(8, '202001', 3, 918, 60, 0, 978, 'PENERIMAAN', 'penerimaan barang dengan nomor PMA-00001', 1, '2020-01-05 13:28:24', '2020-01-05 13:28:24'),
(9, '202001', 2, 253, 10, 0, 263, 'PENERIMAAN', 'penerimaan barang dengan nomor PMA-00001', 1, '2020-01-05 13:34:55', '2020-01-05 13:34:55'),
(10, '202001', 3, 978, 60, 0, 1038, 'PENERIMAAN', 'penerimaan barang dengan nomor PMA-00001', 1, '2020-01-05 13:34:55', '2020-01-05 13:34:55'),
(11, '202001', 2, 263, 0, 10, 253, 'CENCEL', 'Cencel Posting penerimaan barang dengan nomor PMA-00001', 1, '2020-01-05 13:36:15', '2020-01-05 13:36:15'),
(12, '202001', 3, 1038, 0, 60, 978, 'CENCEL', 'Cencel Posting penerimaan barang dengan nomor PMA-00001', 1, '2020-01-05 13:36:16', '2020-01-05 13:36:16'),
(13, '202001', 2, 253, 10, 0, 263, 'PENERIMAAN', 'penerimaan barang dengan nomor PMA-00001', 1, '2020-01-05 13:36:22', '2020-01-05 13:36:22'),
(14, '202001', 3, 978, 60, 0, 1038, 'PENERIMAAN', 'penerimaan barang dengan nomor PMA-00001', 1, '2020-01-05 13:36:22', '2020-01-05 13:36:22'),
(15, '202001', 2, 263, 0, 10, 253, 'CENCEL', 'Cencel Posting penerimaan barang dengan nomor PMA-00001', 1, '2020-01-05 13:38:26', '2020-01-05 13:38:26'),
(16, '202001', 3, 1038, 0, 60, 978, 'CENCEL', 'Cencel Posting penerimaan barang dengan nomor PMA-00001', 1, '2020-01-05 13:38:26', '2020-01-05 13:38:26'),
(17, '202001', 2, 253, 10, 0, 263, 'PENERIMAAN', 'penerimaan barang dengan nomor PMA-00001', 1, '2020-01-05 13:38:33', '2020-01-05 13:38:33'),
(18, '202001', 3, 978, 60, 0, 1038, 'PENERIMAAN', 'penerimaan barang dengan nomor PMA-00001', 1, '2020-01-05 13:38:34', '2020-01-05 13:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmp_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `divisi_id` int(11) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departemen_id` int(11) DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `status_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nik`, `nama`, `tmp_lahir`, `no_hp`, `tgl_lahir`, `grade_id`, `divisi_id`, `jenis_kelamin`, `departemen_id`, `alamat`, `status_id`, `created_at`, `updated_at`) VALUES
(1, '1121400073', 'I Wayan Budiastra', 'denpasar', '087860333326', NULL, NULL, NULL, NULL, NULL, 'jl.turi no 26 a dps', NULL, '2019-08-02 02:34:10', '2019-08-02 02:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_open` date NOT NULL,
  `tgl_close` date DEFAULT NULL,
  `kas_awal` decimal(8,2) NOT NULL,
  `total_tunai` decimal(8,2) NOT NULL,
  `total_debit` decimal(8,2) NOT NULL,
  `total_kredit` decimal(8,2) NOT NULL,
  `total_lain` decimal(8,2) NOT NULL,
  `total_transaksi` decimal(8,2) NOT NULL,
  `total_kembali` decimal(8,2) NOT NULL,
  `kas_akhir` decimal(8,2) NOT NULL,
  `users_id` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id`, `tgl_open`, `tgl_close`, `kas_awal`, `total_tunai`, `total_debit`, `total_kredit`, `total_lain`, `total_transaksi`, `total_kembali`, `kas_akhir`, `users_id`, `keterangan`, `aktif`, `created_at`, `updated_at`) VALUES
(1, '2019-12-15', NULL, '400000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 1, 'tes', 'Y', '2019-12-15 04:31:06', '2019-12-15 04:31:06'),
(2, '2019-12-15', NULL, '800000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 1, 'tes2', 'Y', '2019-12-15 04:36:35', '2019-12-15 04:36:35'),
(3, '2019-12-18', NULL, '500000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 1, 'tes', 'Y', '2019-12-17 16:37:37', '2019-12-17 16:37:37'),
(4, '2019-12-29', NULL, '400000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 1, 'tes', 'Y', '2019-12-29 04:28:45', '2019-12-29 04:28:45'),
(5, '2020-01-03', NULL, '100000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 1, 'cash', 'Y', '2020-01-03 00:13:43', '2020-01-03 00:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `kas_detil`
--

CREATE TABLE `kas_detil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kas_id` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `transaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_tunai` decimal(8,2) NOT NULL,
  `total_debit` decimal(8,2) NOT NULL,
  `total_kredit` decimal(8,2) NOT NULL,
  `total_lainya` decimal(8,2) NOT NULL,
  `total_pembayaran` decimal(8,2) NOT NULL,
  `total_kembali` decimal(8,2) NOT NULL,
  `kurang_bayar` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_lokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `nm_lokasi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Klinik Utama Rawat Inap', 'Jl. Pulau Seram No 1', '2019-07-30 20:43:39', '2019-07-30 20:49:07'),
(2, 'Ruko - Praktek Bersama', 'Tes Alamat', '2019-07-30 20:49:40', '2019-07-30 20:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_user`
--

CREATE TABLE `lokasi_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lokasi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lokasi_user`
--

INSERT INTO `lokasi_user` (`id`, `lokasi_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(3, 2, 1, '0000-00-00 00:00:00', NULL);

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
(3, '2019_02_01_080059_create_siswa_table', 1),
(4, '2019_04_09_030544_create_guru', 2),
(5, '2019_04_14_014603_create_kelas', 3),
(6, '2019_04_15_174015_pembayaran', 4),
(7, '2019_07_08_144736_create_agama', 5),
(8, '2019_07_08_144957_create_nurse', 5),
(9, '2019_07_10_121600_create_asuransi', 5),
(10, '2019_07_13_015611_create_rujukan', 6),
(11, '2019_07_13_052456_create_faskes', 7),
(12, '2019_07_13_055755_create_tindakan', 8),
(13, '2019_07_13_060420_create_katagoritindakan', 9),
(14, '2019_07_17_104526_create_itemmedis', 10),
(15, '2019_07_18_071249_create_satuan', 11),
(16, '2019_07_29_053900_create_karyawan', 11),
(17, '2019_07_29_055831_create_gradekaryawan', 12),
(18, '2019_07_29_055941_create_departemen', 12),
(19, '2019_07_30_025209_create_pemeriksaan1', 13),
(20, '2019_07_30_025315_create_registrasi1', 13),
(21, '2019_07_31_030858_create_lokasi', 14),
(22, '2019_07_31_042231_create_lokasi_user', 14),
(23, '2019_07_31_074904_create_poli', 15),
(24, '2019_08_09_035740_create_katagoriitemmedis', 16),
(25, '2019_08_09_035814_create_typeitemmedis', 16),
(26, '2019_12_07_112512_create_dokter', 17),
(27, '2019_12_07_113055_create_spesialis', 18),
(28, '2019_12_07_113118_create_sub__spesialis', 18),
(29, '2019_12_10_084046_create_table_sepesialis', 19),
(30, '2019_12_10_084150_create_table_sub_spesialis', 19),
(31, '2019_12_10_084245_create_table_dokter', 19),
(32, '2019_12_10_084309_create_table_poli', 20),
(33, '2019_12_12_095306_create_dokter_poli', 21),
(34, '2019_12_14_013401_create_staff', 22),
(35, '2019_12_15_110636_create_kas', 23),
(36, '2019_12_15_111642_create_pembayaran', 24),
(37, '2019_12_15_113817_create_kas_detil', 25),
(38, '2019_12_18_025745_create_detil_pembayaran', 26),
(39, '2019_12_18_031326_create_pembayaran_detil', 27),
(40, '2019_12_18_031412_drop_detil_pembayaran', 28),
(41, '2019_12_18_042618_create_tindakan_item', 28),
(42, '2019_12_18_042701_create_tindakan_katagori', 28),
(43, '2019_12_18_042755_create_produk_item', 28),
(44, '2019_12_18_042811_create_produk_katagori', 28),
(45, '2019_12_20_075518_create_satuan_besar', 29),
(46, '2019_12_20_075540_create_satuan_kecil', 29),
(47, '2019_12_20_102239_create_produk_item_harga', 29),
(48, '2019_12_24_024538_create_suplier', 30),
(49, '2019_12_24_062248_create_suplier_produkitem', 30),
(50, '2019_12_24_063910_create_produk_item_suplier', 30),
(51, '2019_12_25_235435_create__pelayanan', 31),
(52, '2019_12_27_051327_create_jasakatagori', 31),
(53, '2019_12_27_051340_create_jasa', 31),
(54, '2020_01_02_231602_create_penerimaan', 32),
(55, '2020_01_02_231635_create_penerimaan_detil', 32),
(56, '2020_01_02_231914_create_kartustok', 32);

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `str` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `masa_berlaku` date DEFAULT NULL,
  `karyawan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(10) UNSIGNED NOT NULL,
  `nocm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pekerjaan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identitas` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_identitas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nocm`, `nama`, `alamat`, `tempat_lahir`, `tgl_lahir`, `pekerjaan`, `identitas`, `no_identitas`, `pendidikan`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, '000001', 'Asman Cahyono Sinaga S.H.', 'Jln. Sutarto No. 559, Bontang 66022, Jambi', 'Tangerang Selatan', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(2, '000002', 'Puspa Wulandari', 'Gg. Gading No. 400, Bima 94142, KalBar', 'Surakarta', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(3, '000003', 'Agnes Elvina Nasyiah', 'Kpg. Uluwatu No. 404, Tarakan 20338, JaTeng', 'Bogor', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(4, '000004', 'Yessi Novitasari', 'Psr. Cihampelas No. 174, Bekasi 96820, SulBar', 'Sawahlunto', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(5, '000005', 'Keisha Yulianti', 'Psr. Setia Budi No. 879, Singkawang 83366, JaTim', 'Bandar Lampung', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(6, '000006', 'Kunthara Latupono S.Farm', 'Jln. Radio No. 567, Ternate 57886, SumSel', 'Metro', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(7, '000007', 'Kenes Adriansyah M.Ak', 'Dk. Yap Tjwan Bing No. 923, Pontianak 16165, NTB', 'Cilegon', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(8, '000008', 'Darimin Yoga Januar', 'Gg. Gatot Subroto No. 496, Tangerang 36699, Gorontalo', 'Kendari', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(9, '000009', 'Titi Permata', 'Gg. Gedebage Selatan No. 435, Bogor 65366, Riau', 'Probolinggo', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(10, '000010', 'Shania Zulaika M.TI.', 'Psr. Madrasah No. 336, Surakarta 64237, KalSel', 'Surakarta', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(11, '000011', 'Dina Yolanda', 'Gg. Bambon No. 455, Pontianak 44450, KalSel', 'Solok', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(12, '000012', 'Zelda Nasyidah', 'Kpg. Yogyakarta No. 69, Bekasi 15248, SulUt', 'Kendari', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(13, '000013', 'Shakila Tira Pratiwi S.I.Kom', 'Kpg. B.Agam Dlm No. 970, Administrasi Jakarta Pusat 23013, SumBar', 'Pariaman', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(14, '000014', 'Ami Hasanah S.Kom', 'Ki. Laswi No. 866, Lubuklinggau 19444, JaBar', 'Pangkal Pinang', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(15, '000015', 'Yahya Uwais', 'Jr. Arifin No. 562, Magelang 27371, MalUt', 'Tual', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(16, '000016', 'Najam Mulyono Iswahyudi S.E.', 'Ds. Babadan No. 63, Bitung 76313, SumUt', 'Tebing Tinggi', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(17, '000017', 'Kariman Hakim', 'Psr. Teuku Umar No. 837, Langsa 69209, Gorontalo', 'Padangsidempuan', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(18, '000018', 'Padmi Rahimah', 'Ds. Dago No. 441, Yogyakarta 65670, SulTeng', 'Palembang', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(19, '000019', 'Febi Michelle Uyainah', 'Gg. Sudirman No. 662, Administrasi Jakarta Utara 78664, Aceh', 'Parepare', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(20, '000020', 'Garda Setiawan', 'Jln. Muwardi No. 108, Mojokerto 38870, Banten', 'Sukabumi', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(21, '000021', 'Kusuma Wahyudin', 'Psr. Abdul Rahmat No. 873, Banjarbaru 61074, Gorontalo', 'Tual', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(22, '000022', 'Michelle Azalea Yuniar', 'Jln. Gegerkalong Hilir No. 804, Samarinda 28970, BaBel', 'Padangpanjang', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(23, '000023', 'Zizi Aisyah Hartati M.Pd', 'Jr. Bacang No. 252, Administrasi Jakarta Timur 10234, SulBar', 'Denpasar', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(24, '000024', 'Novi Hasanah', 'Gg. Kebangkitan Nasional No. 141, Administrasi Jakarta Selatan 12640, KalSel', 'Cimahi', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(25, '000025', 'Cemani Daliono Pangestu', 'Kpg. Halim No. 486, Surakarta 12100, DIY', 'Sungai Penuh', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(26, '000026', 'Cakrabuana Dimaz Prasetya', 'Dk. Tangkuban Perahu No. 570, Surakarta 40877, JaBar', 'Padangsidempuan', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(27, '000027', 'Maida Nuraini', 'Kpg. Kali No. 216, Padangsidempuan 60750, SulTra', 'Parepare', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(28, '000028', 'Garang Kenzie Siregar', 'Ds. Sutarto No. 560, Solok 35041, NTB', 'Pekanbaru', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(29, '000029', 'Samiah Rahayu S.Kom', 'Ds. Sentot Alibasa No. 241, Gunungsitoli 49953, Riau', 'Banda Aceh', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(30, '000030', 'Jati Ramadan', 'Kpg. Ters. Kiaracondong No. 856, Sungai Penuh 78024, KalUt', 'Padang', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(31, '000031', 'Kawaya Mahendra S.Kom', 'Jln. Pelajar Pejuang 45 No. 131, Semarang 86829, Riau', 'Langsa', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(32, '000032', 'Unjani Fujiati S.Psi', 'Ds. Jakarta No. 541, Banjarbaru 17025, Jambi', 'Palangka Raya', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(33, '000033', 'Jinawi Pandu Utama M.TI.', 'Jr. Ciumbuleuit No. 415, Depok 92199, SulTra', 'Kendari', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(34, '000034', 'Zaenab Patricia Anggraini M.Kom.', 'Dk. Jayawijaya No. 228, Gunungsitoli 19406, SulTeng', 'Sungai Penuh', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(35, '000035', 'Wardi Maman Prasasta S.Sos', 'Dk. Bara No. 344, Padang 25732, KalTim', 'Samarinda', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(36, '000036', 'Maria Paulin Lestari', 'Kpg. B.Agam 1 No. 279, Administrasi Jakarta Utara 61954, SulTra', 'Tebing Tinggi', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(37, '000037', 'Aslijan Winarno', 'Ki. Bakti No. 487, Padangpanjang 86224, KalTim', 'Tomohon', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(38, '000038', 'Anom Tarihoran', 'Ki. Krakatau No. 440, Sabang 71495, SulUt', 'Pasuruan', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(39, '000039', 'Belinda Nasyiah', 'Jr. Badak No. 432, Lhokseumawe 16338, KalSel', 'Blitar', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(40, '000040', 'Olivia Winda Winarsih', 'Dk. Dipenogoro No. 841, Mataram 38866, Bengkulu', 'Tarakan', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(41, '000041', 'Daruna Caraka Tampubolon S.Pt', 'Jr. Bakin No. 873, Padangsidempuan 68872, Gorontalo', 'Cilegon', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(42, '000042', 'Mitra Hidayat S.Farm', 'Ki. Cikutra Timur No. 764, Pematangsiantar 65230, SulUt', 'Mojokerto', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(43, '000043', 'Septi Nadine Aryani S.Pt', 'Jr. Pasir Koja No. 500, Solok 94426, MalUt', 'Prabumulih', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(44, '000044', 'Vanesa Eli Namaga', 'Jr. Samanhudi No. 352, Pangkal Pinang 41445, JaBar', 'Kupang', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(45, '000045', 'Cemani Sihotang M.M.', 'Jr. Sugiono No. 615, Pagar Alam 56429, JaTim', 'Subulussalam', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(46, '000046', 'Tantri Haryanti S.T.', 'Kpg. Abdul. Muis No. 947, Jambi 25947, Maluku', 'Sawahlunto', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(47, '000047', 'Aisyah Melani', 'Dk. Supomo No. 368, Tanjungbalai 10322, NTB', 'Probolinggo', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(48, '000048', 'Catur Marbun', 'Dk. Hasanuddin No. 586, Probolinggo 53655, JaTim', 'Administrasi Jakarta Pusat', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(49, '000049', 'Syahrini Lailasari', 'Kpg. Moch. Yamin No. 448, Pematangsiantar 14946, SulBar', 'Ternate', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(50, '000050', 'Kenzie Simanjuntak', 'Jr. Labu No. 445, Ambon 66207, JaTeng', 'Magelang', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(51, '000051', 'Pandu Cawisono Pangestu', 'Jr. Ketandan No. 104, Bima 23135, KalTim', 'Cilegon', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(52, '000052', 'Balidin Hidayat', 'Gg. Basudewo No. 79, Lhokseumawe 58064, KalTim', 'Administrasi Jakarta Barat', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(53, '000053', 'Sarah Namaga', 'Jr. Bakaru No. 191, Kotamobagu 86839, Riau', 'Tarakan', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(54, '000054', 'Ina Widiastuti', 'Jr. Sutami No. 846, Administrasi Jakarta Selatan 36693, SumBar', 'Administrasi Jakarta Barat', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(55, '000055', 'Tina Purwanti S.Kom', 'Dk. Lumban Tobing No. 476, Padang 78931, KepR', 'Makassar', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(56, '000056', 'Ami Yolanda M.Farm', 'Jln. Basmol Raya No. 149, Tual 27399, SulSel', 'Metro', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(57, '000057', 'Murti Kurniawan', 'Gg. Salam No. 454, Pangkal Pinang 12877, SulUt', 'Makassar', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(58, '000058', 'Warta Wacana S.Psi', 'Gg. Casablanca No. 987, Tangerang 54698, Jambi', 'Metro', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(59, '000059', 'Titin Kuswandari S.Pd', 'Psr. Ters. Jakarta No. 8, Padangpanjang 95642, Maluku', 'Tanjung Pinang', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(60, '000060', 'Padmi Prastuti', 'Dk. Labu No. 495, Sawahlunto 76004, Papua', 'Surakarta', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(61, '000061', 'Yono Manullang', 'Jr. Baing No. 168, Tanjungbalai 79599, Jambi', 'Depok', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(62, '000062', 'Catur Utama', 'Jln. Raden No. 359, Lubuklinggau 41188, Jambi', 'Tangerang Selatan', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(63, '000063', 'Dasa Luthfi Latupono', 'Psr. Sukajadi No. 751, Semarang 63010, JaBar', 'Surakarta', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(64, '000064', 'Marsudi Ardianto', 'Jln. Bagonwoto  No. 440, Pontianak 63412, MalUt', 'Batam', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(65, '000065', 'Widya Melani', 'Jln. Bawal No. 928, Tangerang Selatan 84248, Bali', 'Cimahi', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(66, '000066', 'Chandra Nababan', 'Jr. Ciwastra No. 714, Prabumulih 95308, JaTeng', 'Balikpapan', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(67, '000067', 'Jarwa Widodo', 'Psr. Flora No. 979, Tarakan 97929, NTB', 'Ternate', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(68, '000068', 'Amelia Nurdiyanti', 'Gg. Nangka No. 366, Probolinggo 34682, Maluku', 'Lhokseumawe', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(69, '000069', 'Raihan Caraka Pratama', 'Ds. Ki Hajar Dewantara No. 403, Tangerang Selatan 19281, Banten', 'Cilegon', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(70, '000070', 'Nilam Utami M.Pd', 'Psr. Pattimura No. 662, Bima 40654, SumUt', 'Batam', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(71, '000071', 'Syahrini Yulianti S.H.', 'Psr. Wahidin No. 185, Salatiga 98823, Papua', 'Bogor', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(72, '000072', 'Ivan Nashiruddin S.Farm', 'Jln. Abdul. Muis No. 480, Kupang 34584, SulTeng', 'Administrasi Jakarta Timur', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(73, '000073', 'Dacin Wijaya S.E.', 'Ki. Villa No. 269, Palu 81994, KalUt', 'Tual', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(74, '000074', 'Yulia Palastri S.E.I', 'Psr. Ahmad Dahlan No. 219, Kendari 11493, JaTeng', 'Bima', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(75, '000075', 'Maya Shakila Yulianti S.E.', 'Jr. Jambu No. 991, Probolinggo 22865, KalTim', 'Padang', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(76, '000076', 'Cawisono Sinaga', 'Gg. Baha No. 391, Palembang 33407, Riau', 'Bengkulu', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(77, '000077', 'Melinda Aryani', 'Ki. Gardujati No. 209, Palangka Raya 53496, SulSel', 'Makassar', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(78, '000078', 'Opung Permadi S.E.', 'Gg. Sam Ratulangi No. 700, Banjarmasin 95590, SumBar', 'Tanjungbalai', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(79, '000079', 'Harjaya Situmorang', 'Dk. Monginsidi No. 520, Tangerang 20425, SulBar', 'Bitung', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(80, '000080', 'Rosman Iswahyudi', 'Psr. Kebangkitan Nasional No. 336, Sibolga 43241, Bengkulu', 'Administrasi Jakarta Pusat', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(81, '000081', 'Tugiman Maryadi', 'Ki. Supomo No. 567, Subulussalam 53482, JaBar', 'Tarakan', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(82, '000082', 'Bakijan Emin Pradipta', 'Jr. Sutami No. 796, Sawahlunto 80745, Maluku', 'Kediri', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(83, '000083', 'Ibrahim Setiawan S.Sos', 'Jr. Astana Anyar No. 155, Langsa 50538, JaTeng', 'Bukittinggi', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(84, '000084', 'Jelita Namaga', 'Kpg. Kyai Mojo No. 300, Batam 37878, MalUt', 'Dumai', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(85, '000085', 'Lurhur Habibi', 'Gg. Ki Hajar Dewantara No. 743, Tegal 37212, DKI', 'Salatiga', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(86, '000086', 'Prima Habibi', 'Psr. Dahlia No. 875, Banjarbaru 62709, Bali', 'Sungai Penuh', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(87, '000087', 'Rizki Prakasa', 'Jr. Sudirman No. 261, Palangka Raya 77133, BaBel', 'Lubuklinggau', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(88, '000088', 'Cahyo Wacana S.T.', 'Ki. Baja Raya No. 483, Kupang 35923, Lampung', 'Bengkulu', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(89, '000089', 'Shakila Fujiati S.E.I', 'Ds. Adisucipto No. 393, Kupang 92358, SulUt', 'Parepare', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(90, '000090', 'Arta Ibrahim Narpati', 'Kpg. Bappenas No. 871, Administrasi Jakarta Utara 19915, Bengkulu', 'Parepare', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(91, '000091', 'Cindy Wulandari M.TI.', 'Jr. Padang No. 776, Prabumulih 81987, SulBar', 'Surakarta', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(92, '000092', 'Jono Jatmiko Prasasta M.M.', 'Dk. Suryo No. 97, Semarang 92834, Bali', 'Padang', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(93, '000093', 'Nadine Safitri S.Farm', 'Gg. Bakit  No. 74, Palu 77618, Jambi', 'Administrasi Jakarta Timur', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(94, '000094', 'Najib Pangestu S.H.', 'Jr. Labu No. 34, Pasuruan 55050, KalUt', 'Banda Aceh', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(95, '000095', 'Sidiq Parman Hutasoit', 'Ds. Flores No. 120, Tomohon 29493, JaBar', 'Prabumulih', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(96, '000096', 'Warsita Hardana Sirait S.IP', 'Jln. Setia Budi No. 669, Bogor 15247, JaBar', 'Pasuruan', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(97, '000097', 'Warji Damanik', 'Ds. Katamso No. 106, Pontianak 53455, KalTim', 'Banda Aceh', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(98, '000098', 'Diah Haryanti', 'Dk. Pasirkoja No. 505, Padangpanjang 15200, SulTra', 'Singkawang', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(99, '000099', 'Slamet Gaiman Maulana S.IP', 'Dk. Cihampelas No. 478, Banjarbaru 12669, SumSel', 'Jambi', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(100, '000100', 'Jane Suryatmi S.Ked', 'Jln. Adisumarmo No. 658, Bandung 60776, DIY', 'Tomohon', '2000-01-01', 'Pengusahan', '', '', 'S1', '', NULL, NULL),
(101, '000101', 'Ian Prabowo', 'Ds. Dahlia No. 812, Depok 30128, Bali', 'Sibolga', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(102, '000102', 'Karimah Pratiwi', 'Gg. Abdullah No. 732, Sungai Penuh 77473, Lampung', 'Tangerang Selatan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(103, '000103', 'Zulfa Rahayu S.Pt', 'Psr. Sudirman No. 371, Gorontalo 20725, SumUt', 'Tanjung Pinang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(104, '000104', 'Diah Nasyiah', 'Psr. Ketandan No. 499, Palu 15512, Gorontalo', 'Pariaman', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(105, '000105', 'Ifa Handayani', 'Kpg. Sunaryo No. 869, Surabaya 42841, DKI', 'Lhokseumawe', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(106, '000106', 'Yulia Nasyiah', 'Jln. Bak Mandi No. 926, Mataram 29317, SumSel', 'Kotamobagu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(107, '000107', 'Damu Sitorus S.T.', 'Jr. Laswi No. 285, Tidore Kepulauan 70646, Banten', 'Surakarta', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(108, '000108', 'Cawuk Santoso', 'Ds. Lada No. 64, Tanjung Pinang 95707, JaBar', 'Jayapura', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(109, '000109', 'Zahra Fathonah Nurdiyanti', 'Ds. Gardujati No. 358, Tangerang 31933, KalTim', 'Tanjungbalai', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(110, '000110', 'Salwa Puji Halimah M.Kom.', 'Jr. R.M. Said No. 453, Tarakan 32359, SulSel', 'Tasikmalaya', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(111, '000111', 'Karta Tampubolon', 'Jr. Gambang No. 264, Pasuruan 29905, SumSel', 'Subulussalam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(112, '000112', 'Gantar Natsir', 'Jr. Bayan No. 419, Magelang 62881, SumBar', 'Bima', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(113, '000113', 'Praba Rajata S.Kom', 'Jr. Abdullah No. 201, Tanjungbalai 64208, DKI', 'Padang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(114, '000114', 'Raihan Eko Wibowo S.T.', 'Ds. Reksoninten No. 527, Palu 64440, Bengkulu', 'Tegal', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(115, '000115', 'Kasusra Prasasta S.Pd', 'Dk. Baing No. 335, Pasuruan 54985, SumUt', 'Palopo', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(116, '000116', 'Laila Wijayanti S.Kom', 'Psr. Honggowongso No. 181, Gunungsitoli 44935, KalUt', 'Administrasi Jakarta Pusat', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(117, '000117', 'Liman Ajimin Hutasoit S.Gz', 'Ds. Banal No. 66, Pematangsiantar 24934, BaBel', 'Batam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(118, '000118', 'Daliono Wijaya S.Pt', 'Gg. Bambu No. 349, Bontang 45762, KepR', 'Singkawang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(119, '000119', 'Tira Handayani', 'Gg. Basudewo No. 355, Cilegon 89853, JaBar', 'Banjar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(120, '000120', 'Cayadi Atmaja Anggriawan', 'Ds. Pasirkoja No. 946, Ambon 82119, SulSel', 'Sabang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(121, '000121', 'Fathonah Wastuti', 'Psr. Bawal No. 157, Semarang 55735, PapBar', 'Administrasi Jakarta Timur', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(122, '000122', 'Balamantri Mandala', 'Jr. Wahid Hasyim No. 288, Tual 89019, SulTra', 'Tual', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(123, '000123', 'Nova Hasanah', 'Dk. Untung Suropati No. 759, Solok 64677, Jambi', 'Gorontalo', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(124, '000124', 'Elvin Suryono', 'Gg. Sutoyo No. 608, Padangpanjang 57796, KalSel', 'Magelang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(125, '000125', 'Olivia Kamaria Padmasari', 'Gg. Abang No. 517, Palopo 88817, DKI', 'Jambi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(126, '000126', 'Prasetya Hutapea', 'Ki. Sentot Alibasa No. 458, Bontang 41675, SulUt', 'Tasikmalaya', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(127, '000127', 'Maida Yuliarti', 'Jr. Reksoninten No. 236, Cilegon 93256, NTT', 'Bandar Lampung', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(128, '000128', 'Hana Fujiati', 'Ki. Dipenogoro No. 894, Serang 22489, PapBar', 'Cirebon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(129, '000129', 'Najib Raden Maulana', 'Dk. Bazuka Raya No. 508, Cirebon 37731, BaBel', 'Bitung', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(130, '000130', 'Hasna Andriani', 'Psr. Sudiarto No. 197, Tarakan 33922, SulBar', 'Prabumulih', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(131, '000131', 'Purwanto Bancar Mahendra S.Farm', 'Jr. Muwardi No. 371, Batam 21474, KalSel', 'Administrasi Jakarta Timur', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(132, '000132', 'Cahyadi Cawuk Mansur S.Psi', 'Gg. Bakin No. 244, Manado 76103, NTB', 'Batam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(133, '000133', 'Zizi Mandasari', 'Ds. Bagas Pati No. 878, Tidore Kepulauan 14866, Papua', 'Kendari', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(134, '000134', 'Mahdi Prasasta', 'Kpg. Ujung No. 947, Balikpapan 51286, SumBar', 'Tangerang Selatan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(135, '000135', 'Rahman Manullang', 'Kpg. Basuki No. 968, Makassar 37584, DKI', 'Depok', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(136, '000136', 'Ulva Raisa Susanti', 'Ki. Otista No. 171, Tanjung Pinang 29482, PapBar', 'Pontianak', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(137, '000137', 'Radika Manullang', 'Kpg. Industri No. 85, Pangkal Pinang 75571, Bengkulu', 'Pematangsiantar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(138, '000138', 'Praba Rendy Mansur', 'Gg. Baladewa No. 358, Metro 47866, Jambi', 'Ambon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(139, '000139', 'Radit Maheswara', 'Dk. Casablanca No. 190, Tasikmalaya 86088, Banten', 'Tanjung Pinang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(140, '000140', 'Faizah Laras Rahayu', 'Dk. Pacuan Kuda No. 792, Pematangsiantar 28630, SulSel', 'Tanjung Pinang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(141, '000141', 'Citra Paulin Wahyuni', 'Ds. R.M. Said No. 310, Kupang 10594, Aceh', 'Tidore Kepulauan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(142, '000142', 'Mitra Prasetya', 'Jln. Sutarto No. 346, Pekalongan 30390, Papua', 'Makassar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(143, '000143', 'Budi Maheswara', 'Ki. Dr. Junjunan No. 129, Tanjungbalai 97297, SulBar', 'Cimahi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(144, '000144', 'Lutfan Darijan Wacana', 'Jln. Jend. Sudirman No. 859, Semarang 43817, PapBar', 'Parepare', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(145, '000145', 'Suci Wastuti', 'Psr. Casablanca No. 242, Makassar 37047, DIY', 'Lhokseumawe', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(146, '000146', 'Ida Andriani S.Farm', 'Dk. Babakan No. 543, Samarinda 62557, SumBar', 'Ternate', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(147, '000147', 'Ika Putri Palastri S.IP', 'Gg. Veteran No. 103, Tual 86535, Gorontalo', 'Prabumulih', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(148, '000148', 'Umay Heru Tamba', 'Kpg. Flora No. 808, Bandar Lampung 58500, Maluku', 'Makassar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(149, '000149', 'Kania Hasanah', 'Jr. Bhayangkara No. 623, Tomohon 43314, SulTeng', 'Pematangsiantar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(150, '000150', 'Budi Hutagalung', 'Psr. Sumpah Pemuda No. 131, Palangka Raya 25159, Bengkulu', 'Salatiga', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(151, '000151', 'Dinda Usada', 'Gg. Supomo No. 980, Pontianak 95707, Bali', 'Pontianak', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(152, '000152', 'Adiarja Maman Sihombing M.TI.', 'Dk. Umalas No. 899, Sabang 30110, KalTeng', 'Bima', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(153, '000153', 'Kawaca Mahendra M.M.', 'Ds. Suniaraja No. 697, Palu 44812, SulSel', 'Sungai Penuh', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(154, '000154', 'Viktor Catur Suryono M.Ak', 'Kpg. Kyai Gede No. 280, Bontang 62320, Gorontalo', 'Ambon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(155, '000155', 'Bakda Nasrullah Permadi', 'Ds. Fajar No. 433, Tarakan 63934, Banten', 'Administrasi Jakarta Timur', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(156, '000156', 'Bahuraksa Arta Latupono M.Ak', 'Kpg. Hasanuddin No. 383, Batam 35546, Bengkulu', 'Banjarmasin', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(157, '000157', 'Anita Kusmawati', 'Dk. Bahagia No. 351, Tasikmalaya 25950, Riau', 'Bekasi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(158, '000158', 'Dipa Halim', 'Kpg. Pasirkoja No. 706, Medan 98079, Aceh', 'Prabumulih', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(159, '000159', 'Cornelia Puspasari', 'Gg. Bank Dagang Negara No. 61, Blitar 73091, BaBel', 'Administrasi Jakarta Pusat', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(160, '000160', 'Michelle Karimah Wastuti', 'Ds. Gegerkalong Hilir No. 496, Metro 54059, Papua', 'Binjai', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(161, '000161', 'Belinda Wastuti S.Kom', 'Ki. Suryo No. 208, Madiun 86153, SumSel', 'Samarinda', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(162, '000162', 'Zelaya Ade Pertiwi M.Pd', 'Psr. Bakti No. 703, Probolinggo 94828, KalSel', 'Lubuklinggau', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(163, '000163', 'Galuh Ghani Pranowo M.TI.', 'Ki. Bakau No. 707, Batam 63748, DIY', 'Banjarbaru', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(164, '000164', 'Gamblang Gunawan', 'Kpg. Kali No. 795, Pangkal Pinang 35936, SulBar', 'Sungai Penuh', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(165, '000165', 'Rendy Daru Maheswara', 'Psr. Kebangkitan Nasional No. 893, Pagar Alam 56781, SulBar', 'Batam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(166, '000166', 'Janet Rahmawati', 'Jr. Bagas Pati No. 873, Sabang 94884, Maluku', 'Lhokseumawe', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(167, '000167', 'Langgeng Waskita', 'Psr. Raya Ujungberung No. 60, Kotamobagu 63156, SumBar', 'Dumai', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(168, '000168', 'Rudi Sirait', 'Jln. Wahid No. 85, Surakarta 98138, SulSel', 'Cilegon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(169, '000169', 'Karimah Mala Mardhiyah S.Pd', 'Psr. Baranang No. 469, Kotamobagu 70512, SumBar', 'Yogyakarta', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(170, '000170', 'Waluyo Nainggolan S.T.', 'Jr. Salatiga No. 250, Bandung 77430, BaBel', 'Tomohon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(171, '000171', 'Icha Icha Oktaviani S.Ked', 'Psr. Bakti No. 486, Tegal 38915, DKI', 'Balikpapan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(172, '000172', 'Himawan Prabowo S.Pd', 'Gg. Ters. Buah Batu No. 782, Tangerang 72970, SulTeng', 'Denpasar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(173, '000173', 'Akarsana Gangsar Mahendra', 'Ki. Asia Afrika No. 757, Mojokerto 95778, SumSel', 'Tual', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(174, '000174', 'Rahmi Najwa Prastuti S.I.Kom', 'Ki. W.R. Supratman No. 139, Banjar 74567, NTB', 'Semarang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(175, '000175', 'Atma Sihombing', 'Jr. Warga No. 151, Binjai 88162, Bengkulu', 'Padangpanjang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(176, '000176', 'Ulya Puspita', 'Dk. Elang No. 72, Kendari 95918, JaBar', 'Lubuklinggau', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(177, '000177', 'Ifa Laila Laksmiwati', 'Ki. Babadan No. 44, Administrasi Jakarta Selatan 49143, JaTeng', 'Parepare', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(178, '000178', 'Paiman Capa Hidayanto', 'Jln. Bata Putih No. 699, Sawahlunto 11491, JaBar', 'Palembang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(179, '000179', 'Digdaya Prakasa', 'Ki. Baranang No. 1, Magelang 86478, JaTeng', 'Metro', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(180, '000180', 'Langgeng Rajasa', 'Gg. Jend. A. Yani No. 102, Semarang 68927, KalTim', 'Bukittinggi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(181, '000181', 'Anggabaya Dabukke', 'Ds. Bass No. 48, Madiun 46945, JaTeng', 'Kendari', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(182, '000182', 'Hasta Limar Marpaung S.T.', 'Ki. Hang No. 931, Dumai 37257, DKI', 'Surakarta', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(183, '000183', 'Ifa Nuraini S.Pt', 'Dk. Tentara Pelajar No. 98, Tanjung Pinang 89192, KalTim', 'Banjarbaru', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(184, '000184', 'Ajiman Waskita', 'Psr. Achmad Yani No. 922, Bontang 96018, DIY', 'Bandar Lampung', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(185, '000185', 'Novi Talia Purwanti S.E.', 'Jr. Bayam No. 45, Bekasi 38437, KalBar', 'Surabaya', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(186, '000186', 'Karsa Jayadi Mandala S.H.', 'Dk. Gardujati No. 6, Bekasi 44395, Aceh', 'Pekalongan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(187, '000187', 'Eja Adika Irawan', 'Gg. Babakan No. 534, Prabumulih 13360, Aceh', 'Bontang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(188, '000188', 'Gara Sidiq Marbun', 'Jln. Babah No. 912, Kupang 51593, SulSel', 'Manado', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(189, '000189', 'Hamima Ratna Namaga', 'Psr. Eka No. 28, Bogor 31749, SumSel', 'Depok', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(190, '000190', 'Warta Kadir Firgantoro S.Psi', 'Jln. Perintis Kemerdekaan No. 214, Solok 82164, NTT', 'Batam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(191, '000191', 'Amelia Lidya Mandasari', 'Ds. Bakit  No. 382, Cimahi 99034, PapBar', 'Sungai Penuh', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(192, '000192', 'Jinawi Nugroho', 'Psr. Sukabumi No. 704, Sabang 69286, SumBar', 'Tarakan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(193, '000193', 'Tantri Hastuti', 'Gg. Baik No. 68, Singkawang 73416, Maluku', 'Banjar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(194, '000194', 'Raditya Asirwanda Megantara', 'Dk. B.Agam 1 No. 317, Administrasi Jakarta Selatan 51354, Banten', 'Bandung', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(195, '000195', 'Labuh Sirait', 'Dk. Bank Dagang Negara No. 811, Palu 77314, Lampung', 'Cilegon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(196, '000196', 'Victoria Palastri M.M.', 'Ki. Peta No. 464, Solok 39278, JaTim', 'Semarang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(197, '000197', 'Makara Anggriawan', 'Ki. Badak No. 878, Tangerang Selatan 15982, PapBar', 'Salatiga', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(198, '000198', 'Pandu Suwarno S.Farm', 'Dk. Bagas Pati No. 626, Subulussalam 94543, DIY', 'Lubuklinggau', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(199, '000199', 'Zaenab Zamira Pudjiastuti', 'Kpg. Jambu No. 337, Banda Aceh 94102, SumSel', 'Padangpanjang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(200, '000200', 'Cici Pudjiastuti', 'Jln. Ciwastra No. 209, Administrasi Jakarta Utara 93814, Gorontalo', 'Pematangsiantar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(201, '000201', 'Puji Suryatmi', 'Ds. Thamrin No. 83, Yogyakarta 58907, BaBel', 'Bengkulu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(202, '000202', 'Rachel Mandasari M.Ak', 'Ki. Banceng Pondok No. 19, Bandung 95521, Riau', 'Pontianak', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(203, '000203', 'Maida Zamira Astuti S.Psi', 'Jr. Kyai Gede No. 535, Bontang 70643, NTT', 'Tangerang Selatan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(204, '000204', 'Salwa Mayasari', 'Psr. Juanda No. 113, Pangkal Pinang 92858, SulUt', 'Balikpapan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(205, '000205', 'Winda Nurdiyanti', 'Jr. Bagis Utama No. 248, Semarang 87445, Riau', 'Sukabumi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(206, '000206', 'Elma Uyainah', 'Ds. Sudirman No. 314, Banjarmasin 92458, Lampung', 'Sukabumi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(207, '000207', 'Luwar Gilang Sitompul', 'Dk. Baing No. 457, Jambi 90548, KalTeng', 'Banjar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(208, '000208', 'Zelda Mardhiyah S.I.Kom', 'Kpg. Villa No. 761, Padangsidempuan 10560, Papua', 'Palu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(209, '000209', 'Salsabila Rahimah M.M.', 'Gg. Dipenogoro No. 340, Mojokerto 30967, SulUt', 'Palopo', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(210, '000210', 'Anastasia Faizah Pertiwi', 'Dk. Bak Mandi No. 255, Pematangsiantar 75565, KalTeng', 'Surakarta', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(211, '000211', 'Darsirah Nainggolan', 'Gg. Moch. Ramdan No. 624, Magelang 44029, SumSel', 'Kendari', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(212, '000212', 'Usman Cemeti Suryono', 'Dk. Bazuka Raya No. 954, Bengkulu 98443, KalUt', 'Palu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(213, '000213', 'Bahuwarna Galuh Hardiansyah S.Ked', 'Jln. Ikan No. 563, Pontianak 43165, Maluku', 'Banda Aceh', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(214, '000214', 'Ade Padmasari M.Pd', 'Gg. Daan No. 966, Binjai 39788, BaBel', 'Palembang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(215, '000215', 'Vino Ardianto S.Psi', 'Jln. Merdeka No. 901, Denpasar 80743, Jambi', 'Bengkulu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(216, '000216', 'Farhunnisa Unjani Yolanda S.Pd', 'Ki. Kyai Gede No. 750, Tasikmalaya 35152, Banten', 'Bukittinggi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(217, '000217', 'Nadine Mandasari', 'Kpg. Abang No. 228, Semarang 15210, SumBar', 'Semarang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(218, '000218', 'Estiawan Siregar', 'Ds. Kyai Mojo No. 770, Yogyakarta 12810, Bali', 'Tangerang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(219, '000219', 'Najwa Najwa Laksita', 'Ds. Nangka No. 48, Pangkal Pinang 41680, SumSel', 'Banda Aceh', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(220, '000220', 'Syahrini Fathonah Anggraini', 'Dk. Sadang Serang No. 217, Bogor 53017, JaTim', 'Tegal', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(221, '000221', 'Garan Megantara S.Ked', 'Dk. Gremet No. 227, Palangka Raya 32203, BaBel', 'Tebing Tinggi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(222, '000222', 'Fathonah Haryanti M.Pd', 'Kpg. Dipenogoro No. 239, Kotamobagu 35019, JaTeng', 'Administrasi Jakarta Utara', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(223, '000223', 'Marwata Mansur M.TI.', 'Psr. Banal No. 403, Sukabumi 14671, KalSel', 'Singkawang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(224, '000224', 'Sadina Suryatmi', 'Ki. Cihampelas No. 635, Banjarbaru 56517, SulUt', 'Banjar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(225, '000225', 'Qori Safitri', 'Kpg. Bahagia  No. 891, Depok 43358, DKI', 'Bima', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(226, '000226', 'Irfan Pangestu', 'Ki. Baranang Siang No. 877, Bitung 40205, NTT', 'Tanjung Pinang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(227, '000227', 'Kalim Emil Megantara S.E.I', 'Kpg. Supomo No. 918, Subulussalam 77529, MalUt', 'Blitar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(228, '000228', 'Kani Mandasari', 'Kpg. B.Agam Dlm No. 403, Semarang 81608, SulTra', 'Gunungsitoli', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(229, '000229', 'Winda Agustina', 'Ds. Kiaracondong No. 371, Bima 63755, NTB', 'Subulussalam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(230, '000230', 'Jais Firmansyah', 'Jr. Bara Tambar No. 672, Pasuruan 91780, SulTra', 'Yogyakarta', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(231, '000231', 'Tania Yulianti S.Psi', 'Ds. Baranangsiang No. 164, Pangkal Pinang 58676, NTT', 'Balikpapan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(232, '000232', 'Belinda Maida Andriani M.Kom.', 'Jln. Panjaitan No. 763, Administrasi Jakarta Barat 10944, SulBar', 'Tegal', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(233, '000233', 'Harjo Teguh Nugroho S.E.I', 'Gg. B.Agam Dlm No. 173, Padang 45361, SulTeng', 'Padang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(234, '000234', 'Widya Aryani S.Kom', 'Ki. Wahid No. 257, Bima 51372, SumBar', 'Bontang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(235, '000235', 'Virman Saputra', 'Jln. Banda No. 667, Kediri 40774, SumSel', 'Serang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(236, '000236', 'Ajimin Darmana Dongoran M.M.', 'Gg. Pattimura No. 528, Tegal 20230, Bengkulu', 'Mataram', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(237, '000237', 'Vivi Anggraini', 'Jln. K.H. Maskur No. 691, Cirebon 99702, Aceh', 'Prabumulih', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(238, '000238', 'Ozy Putra', 'Gg. Hang No. 429, Bandung 52395, JaBar', 'Sukabumi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(239, '000239', 'Jaiman Santoso', 'Ki. Basket No. 703, Dumai 22100, Gorontalo', 'Administrasi Jakarta Barat', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(240, '000240', 'Hana Amelia Nuraini M.Ak', 'Psr. Suniaraja No. 155, Bau-Bau 86792, Bengkulu', 'Tangerang Selatan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(241, '000241', 'Oskar Daliman Prakasa', 'Ki. Sumpah Pemuda No. 259, Kediri 70773, Jambi', 'Tebing Tinggi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(242, '000242', 'Catur Hardana Gunarto S.E.I', 'Ds. Pattimura No. 414, Bitung 38361, DKI', 'Sawahlunto', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(243, '000243', 'Jayadi Wibisono', 'Psr. Astana Anyar No. 64, Probolinggo 64065, KepR', 'Lubuklinggau', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(244, '000244', 'Rahayu Uyainah', 'Dk. Sutoyo No. 960, Makassar 29920, Jambi', 'Bandar Lampung', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(245, '000245', 'Ikin Prakasa', 'Dk. Fajar No. 958, Jambi 70961, KalSel', 'Tual', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(246, '000246', 'Restu Kuswandari', 'Ds. Moch. Yamin No. 837, Administrasi Jakarta Pusat 88708, SumUt', 'Cirebon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(247, '000247', 'Irma Aisyah Sudiati M.Ak', 'Ds. Pahlawan No. 149, Tanjungbalai 53389, SulTeng', 'Administrasi Jakarta Selatan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(248, '000248', 'Kenari Darimin Pratama M.TI.', 'Jln. Baladewa No. 373, Banjarbaru 11239, SumSel', 'Padangsidempuan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(249, '000249', 'Indra Nrima Firgantoro', 'Kpg. Ters. Kiaracondong No. 923, Tanjung Pinang 85630, SumBar', 'Parepare', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(250, '000250', 'Raina Ida Hastuti', 'Kpg. Baing No. 796, Administrasi Jakarta Pusat 40718, SumBar', 'Denpasar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(251, '000251', 'Jinawi Sihombing M.M.', 'Ds. Sumpah Pemuda No. 537, Pangkal Pinang 94826, KalBar', 'Gorontalo', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(252, '000252', 'Lidya Lala Padmasari S.Sos', 'Jr. Baya Kali Bungur No. 559, Pematangsiantar 57123, Aceh', 'Bontang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(253, '000253', 'Jaeman Prayoga', 'Gg. Banda No. 822, Medan 14387, KalTim', 'Tanjungbalai', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(254, '000254', 'Humaira Jessica Pertiwi S.E.I', 'Ki. PHH. Mustofa No. 847, Cilegon 33108, KalTim', 'Tegal', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(255, '000255', 'Yessi Kusmawati', 'Gg. Babakan No. 287, Magelang 78383, KepR', 'Bitung', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(256, '000256', 'Winda Puspita', 'Gg. Jamika No. 582, Bandar Lampung 51606, Bengkulu', 'Payakumbuh', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(257, '000257', 'Rika Mayasari', 'Gg. Honggowongso No. 707, Bontang 33491, Jambi', 'Gorontalo', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(258, '000258', 'Prakosa Endra Ramadan', 'Ki. Bakaru No. 197, Tanjungbalai 56847, Bali', 'Parepare', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(259, '000259', 'Ghaliyati Hastuti', 'Ki. Achmad Yani No. 395, Manado 97657, SulSel', 'Tasikmalaya', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(260, '000260', 'Garang Haryanto', 'Psr. Camar No. 482, Pontianak 75559, KalTeng', 'Denpasar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(261, '000261', 'Harsana Sakti Maheswara', 'Ds. Bambu No. 80, Padangpanjang 99510, Aceh', 'Mataram', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(262, '000262', 'Lutfan Megantara', 'Jr. Yap Tjwan Bing No. 547, Gunungsitoli 73204, SulTeng', 'Gorontalo', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(263, '000263', 'Adiarja Suwarno S.Pt', 'Jr. Ekonomi No. 447, Banjar 71286, NTT', 'Mataram', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(264, '000264', 'Sabri Legawa Hutapea', 'Ki. Padma No. 895, Tangerang Selatan 70646, SumSel', 'Sibolga', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(265, '000265', 'Oskar Gilang Mahendra S.Farm', 'Jr. Moch. Toha No. 684, Denpasar 33513, Maluku', 'Banjarmasin', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(266, '000266', 'Anom Bancar Prayoga S.I.Kom', 'Jr. Basuki No. 208, Probolinggo 44987, SulTeng', 'Semarang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(267, '000267', 'Daliono Firgantoro', 'Ki. Wahid No. 970, Jambi 85105, NTT', 'Mojokerto', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(268, '000268', 'Ina Prastuti', 'Kpg. Urip Sumoharjo No. 204, Ternate 81364, Bengkulu', 'Magelang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(269, '000269', 'Hamima Zulaika', 'Gg. Supomo No. 94, Cilegon 89627, Riau', 'Administrasi Jakarta Utara', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(270, '000270', 'Waluyo Leo Wibowo S.I.Kom', 'Jln. Flores No. 607, Binjai 38834, MalUt', 'Palu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(271, '000271', 'Laras Prastuti S.Gz', 'Jr. Astana Anyar No. 562, Batam 88005, JaTim', 'Administrasi Jakarta Pusat', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(272, '000272', 'Puput Agustina', 'Dk. Abdullah No. 309, Tual 89601, DIY', 'Bandar Lampung', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(273, '000273', 'Yunita Maryati M.Farm', 'Jr. Cihampelas No. 420, Banjar 27900, SumBar', 'Lhokseumawe', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(274, '000274', 'Jayadi Januar', 'Psr. Baung No. 928, Padang 21195, Lampung', 'Mataram', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(275, '000275', 'Ghani Prasetya S.Ked', 'Ds. Kusmanto No. 176, Magelang 17361, SulSel', 'Sorong', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(276, '000276', 'Hasna Gasti Kuswandari', 'Ds. Yos No. 858, Sabang 41092, Bali', 'Serang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(277, '000277', 'Langgeng Putra', 'Jln. Kebangkitan Nasional No. 836, Cilegon 85381, Banten', 'Administrasi Jakarta Timur', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(278, '000278', 'Gandi Atmaja Pradana', 'Kpg. Kartini No. 219, Langsa 28962, Lampung', 'Cilegon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(279, '000279', 'Devi Jamalia Handayani S.I.Kom', 'Ki. Baja No. 432, Samarinda 14259, Aceh', 'Batam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(280, '000280', 'Keisha Nova Suryatmi M.M.', 'Kpg. Halim No. 27, Bandung 75437, Bali', 'Banda Aceh', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(281, '000281', 'Bakiono Anggriawan M.Kom.', 'Kpg. Wahid No. 942, Padang 94438, KalSel', 'Gorontalo', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(282, '000282', 'Kacung Dongoran', 'Jln. Nangka No. 74, Yogyakarta 18541, BaBel', 'Bitung', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(283, '000283', 'Harsana Galih Sitompul S.Ked', 'Ds. Salam No. 247, Jayapura 62194, KepR', 'Bengkulu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(284, '000284', 'Fathonah Astuti', 'Ki. Juanda No. 833, Kediri 76602, SumBar', 'Tasikmalaya', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(285, '000285', 'Ikin Sihotang M.Kom.', 'Ds. Ujung No. 451, Manado 29687, Papua', 'Metro', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(286, '000286', 'Prabowo Ramadan', 'Gg. Suryo Pranoto No. 142, Pangkal Pinang 91962, JaTim', 'Sibolga', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(287, '000287', 'Chandra Maulana', 'Dk. Warga No. 634, Parepare 69498, Maluku', 'Tangerang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(288, '000288', 'Jati Rajasa', 'Jln. HOS. Cjokroaminoto (Pasirkaliki) No. 773, Binjai 75578, DKI', 'Batam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(289, '000289', 'Ciaobella Paramita Nasyidah S.Farm', 'Ki. B.Agam Dlm No. 440, Madiun 99262, NTT', 'Salatiga', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(290, '000290', 'Wawan Wardi Hidayat', 'Psr. Nangka No. 186, Magelang 62179, PapBar', 'Bekasi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(291, '000291', 'Prabu Bakiadi Mansur S.Ked', 'Jln. Cemara No. 860, Kendari 20244, Jambi', 'Palu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(292, '000292', 'Emin Mangunsong S.Kom', 'Kpg. Pahlawan No. 505, Bengkulu 43527, JaBar', 'Salatiga', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(293, '000293', 'Betania Nurdiyanti', 'Kpg. Pattimura No. 270, Blitar 35408, Bali', 'Palu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(294, '000294', 'Oni Laksita S.Pd', 'Jln. Teuku Umar No. 147, Palembang 59570, KalSel', 'Pekalongan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(295, '000295', 'Ganjaran Budiyanto', 'Gg. Kebangkitan Nasional No. 924, Tanjungbalai 47689, KalTim', 'Probolinggo', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(296, '000296', 'Ratih Usada M.M.', 'Kpg. Achmad Yani No. 844, Ternate 75298, KalSel', 'Gorontalo', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(297, '000297', 'Hani Juli Maryati', 'Kpg. Dipenogoro No. 474, Pariaman 47950, KalUt', 'Bau-Bau', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(298, '000298', 'Ira Paramita Sudiati', 'Ds. Tambak No. 591, Gorontalo 71010, SumUt', 'Tanjung Pinang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(299, '000299', 'Kezia Icha Susanti', 'Jr. Sukabumi No. 725, Pagar Alam 45138, SulSel', 'Palangka Raya', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(300, '000300', 'Salwa Zelaya Puspita S.Sos', 'Jr. Pahlawan No. 468, Jayapura 60512, Maluku', 'Cirebon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(301, '000301', 'Mursita Tamba', 'Ds. Wahidin Sudirohusodo No. 660, Lhokseumawe 96784, Gorontalo', 'Mataram', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(302, '000302', 'Bakianto Hasim Pranowo S.E.', 'Jln. Bak Mandi No. 585, Mataram 65676, Banten', 'Subulussalam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(303, '000303', 'Dadi Saefullah', 'Dk. Baing No. 606, Solok 50561, Riau', 'Tegal', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(304, '000304', 'Silvia Bella Nuraini M.Kom.', 'Kpg. Basket No. 156, Denpasar 40839, NTB', 'Sungai Penuh', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(305, '000305', 'Upik Ozy Gunarto S.Pt', 'Gg. Mulyadi No. 837, Administrasi Jakarta Pusat 14611, KepR', 'Mataram', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(306, '000306', 'Sarah Riyanti', 'Ds. Gajah Mada No. 716, Singkawang 15195, Lampung', 'Ambon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(307, '000307', 'Safina Hartati', 'Jr. Dipenogoro No. 400, Kotamobagu 23202, SulSel', 'Pontianak', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(308, '000308', 'Vanya Ina Laksita', 'Gg. Baabur Royan No. 78, Palopo 53129, SulUt', 'Madiun', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(309, '000309', 'Michelle Pratiwi', 'Dk. Sunaryo No. 325, Probolinggo 71291, Bali', 'Manado', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(310, '000310', 'Kuncara Narpati', 'Ki. Rajawali No. 627, Manado 90069, JaTim', 'Solok', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(311, '000311', 'Dagel Wawan Dabukke S.I.Kom', 'Jln. Peta No. 501, Makassar 49572, DIY', 'Singkawang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(312, '000312', 'Alambana Gatot Gunawan', 'Jln. Haji No. 175, Yogyakarta 99719, SumBar', 'Prabumulih', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(313, '000313', 'Teguh Hakim M.TI.', 'Psr. Antapani Lama No. 928, Salatiga 82109, NTB', 'Gorontalo', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(314, '000314', 'Lanang Halim M.Ak', 'Gg. Bappenas No. 281, Administrasi Jakarta Barat 56421, KalTeng', 'Manado', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(315, '000315', 'Prasetyo Damanik S.IP', 'Gg. Basoka Raya No. 643, Pekanbaru 40067, SulSel', 'Palangka Raya', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(316, '000316', 'Cinta Susanti', 'Dk. Babadan No. 190, Prabumulih 91145, Lampung', 'Bau-Bau', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL);
INSERT INTO `pasien` (`id`, `nocm`, `nama`, `alamat`, `tempat_lahir`, `tgl_lahir`, `pekerjaan`, `identitas`, `no_identitas`, `pendidikan`, `no_telp`, `created_at`, `updated_at`) VALUES
(317, '000317', 'Siska Riyanti', 'Ds. Hang No. 103, Sabang 49978, DKI', 'Batam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(318, '000318', 'Ulva Elma Padmasari M.Pd', 'Gg. B.Agam 1 No. 903, Magelang 39501, Lampung', 'Yogyakarta', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(319, '000319', 'Silvia Wulandari', 'Gg. Setiabudhi No. 269, Sukabumi 28653, KalUt', 'Depok', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(320, '000320', 'Cici Hassanah', 'Ds. Yap Tjwan Bing No. 434, Administrasi Jakarta Pusat 74597, JaTim', 'Palopo', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(321, '000321', 'Bancar Setiawan', 'Gg. B.Agam Dlm No. 205, Bengkulu 71261, NTT', 'Denpasar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(322, '000322', 'Dalimin Sihotang S.Psi', 'Dk. B.Agam 1 No. 165, Tangerang 20523, SulTra', 'Palopo', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(323, '000323', 'Cahyono Saragih', 'Gg. Fajar No. 586, Sorong 82336, NTB', 'Bontang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(324, '000324', 'Perkasa Wisnu Saputra M.Ak', 'Dk. Asia Afrika No. 996, Sukabumi 87121, Maluku', 'Sukabumi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(325, '000325', 'Kania Novitasari', 'Ki. Ketandan No. 155, Magelang 49540, KepR', 'Balikpapan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(326, '000326', 'Cecep Perkasa Ramadan M.Kom.', 'Ki. Aceh No. 677, Metro 10993, KepR', 'Padang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(327, '000327', 'Chandra Saptono', 'Kpg. Kyai Mojo No. 584, Cilegon 44051, SulTeng', 'Pekalongan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(328, '000328', 'Wirda Yulianti', 'Psr. Uluwatu No. 883, Administrasi Jakarta Utara 91591, Banten', 'Palembang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(329, '000329', 'Emas Megantara', 'Ki. Dewi Sartika No. 734, Sibolga 76523, Aceh', 'Serang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(330, '000330', 'Cinta Yance Puspita M.Kom.', 'Jln. Pattimura No. 667, Kupang 12927, SulTeng', 'Padangsidempuan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(331, '000331', 'Bagya Situmorang S.Ked', 'Ki. Raden Saleh No. 846, Palembang 25221, KepR', 'Bandar Lampung', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(332, '000332', 'Dewi Safitri S.I.Kom', 'Dk. Moch. Toha No. 344, Surakarta 16644, JaTeng', 'Banda Aceh', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(333, '000333', 'Jatmiko Upik Wibowo S.Kom', 'Jr. Flora No. 505, Tidore Kepulauan 85358, Jambi', 'Depok', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(334, '000334', 'Samiah Usamah M.TI.', 'Ds. Samanhudi No. 377, Subulussalam 70955, KepR', 'Yogyakarta', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(335, '000335', 'Harjaya Prasetyo Mansur', 'Kpg. Eka No. 118, Tomohon 29009, Lampung', 'Depok', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(336, '000336', 'Luluh Firgantoro', 'Ds. Suryo Pranoto No. 271, Tidore Kepulauan 94022, SumSel', 'Tomohon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(337, '000337', 'Utama Virman Nababan', 'Kpg. Gardujati No. 756, Salatiga 29612, Jambi', 'Parepare', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(338, '000338', 'Natalia Zulaika', 'Dk. Daan No. 245, Jayapura 96697, SumSel', 'Batam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(339, '000339', 'Paris Widiastuti', 'Ds. Abdul Rahmat No. 821, Pariaman 15772, Maluku', 'Bengkulu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(340, '000340', 'Laswi Nashiruddin', 'Kpg. Adisumarmo No. 853, Tasikmalaya 92566, NTB', 'Blitar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(341, '000341', 'Harsana Uda Latupono', 'Ki. Thamrin No. 957, Kediri 57150, Jambi', 'Samarinda', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(342, '000342', 'Kacung Mandala', 'Ds. Ciumbuleuit No. 972, Kupang 87262, MalUt', 'Palu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(343, '000343', 'Ade Najmudin', 'Gg. Flora No. 256, Bengkulu 26533, Lampung', 'Prabumulih', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(344, '000344', 'Latif Nababan', 'Kpg. R.M. Said No. 31, Metro 21265, Bengkulu', 'Tangerang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(345, '000345', 'Kanda Hidayat', 'Gg. PHH. Mustofa No. 494, Lhokseumawe 96603, DIY', 'Sungai Penuh', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(346, '000346', 'Gabriella Yulianti', 'Jln. Salatiga No. 50, Tebing Tinggi 18223, Bengkulu', 'Cimahi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(347, '000347', 'Sadina Mayasari', 'Psr. Baranangsiang No. 147, Tual 93479, KalTeng', 'Tanjung Pinang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(348, '000348', 'Gangsar Thamrin', 'Jln. Wahid No. 518, Pasuruan 59781, KalUt', 'Pematangsiantar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(349, '000349', 'Drajat Pranowo M.Kom.', 'Kpg. Casablanca No. 42, Banjarbaru 44893, JaTeng', 'Surabaya', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(350, '000350', 'Hendra Maulana', 'Ki. Villa No. 723, Banda Aceh 38382, SumBar', 'Kendari', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(351, '000351', 'Candrakanta Prasetyo', 'Ki. Laswi No. 528, Malang 85129, Papua', 'Jambi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(352, '000352', 'Ratna Permata', 'Kpg. Suprapto No. 684, Sungai Penuh 13330, JaTeng', 'Parepare', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(353, '000353', 'Edward Megantara', 'Dk. Otista No. 623, Kupang 89143, SulTra', 'Palopo', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(354, '000354', 'Michelle Purnawati S.Psi', 'Ds. Taman No. 737, Sorong 63261, SulUt', 'Cirebon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(355, '000355', 'Cakrawangsa Kusumo', 'Dk. Laswi No. 621, Palopo 87533, Bali', 'Medan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(356, '000356', 'Elvina Yunita Hassanah', 'Kpg. Untung Suropati No. 345, Payakumbuh 22756, Aceh', 'Batu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(357, '000357', 'Puput Ida Mandasari', 'Dk. Moch. Yamin No. 341, Dumai 38295, DIY', 'Kendari', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(358, '000358', 'Zelda Puspita', 'Dk. Gading No. 693, Tangerang Selatan 80279, BaBel', 'Makassar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(359, '000359', 'Paris Hastuti', 'Kpg. Tentara Pelajar No. 477, Bandung 15485, KepR', 'Bitung', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(360, '000360', 'Kamal Wibisono', 'Psr. Daan No. 836, Administrasi Jakarta Timur 77861, NTB', 'Pagar Alam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(361, '000361', 'Balijan Mansur', 'Psr. R.M. Said No. 408, Pariaman 15887, Maluku', 'Semarang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(362, '000362', 'Amalia Dinda Andriani M.Kom.', 'Gg. Rajawali Timur No. 174, Lhokseumawe 45620, SulSel', 'Palopo', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(363, '000363', 'Koko Respati Thamrin', 'Dk. Yosodipuro No. 702, Pagar Alam 64160, KalSel', 'Tarakan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(364, '000364', 'Daliono Dabukke', 'Jln. Otista No. 465, Bandung 14890, Jambi', 'Sabang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(365, '000365', 'Cengkal Balidin Wacana S.Farm', 'Gg. Bakti No. 127, Subulussalam 22166, DIY', 'Kotamobagu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(366, '000366', 'Balapati Drajat Suryono', 'Psr. Tentara Pelajar No. 522, Madiun 34809, Bali', 'Surakarta', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(367, '000367', 'Titin Padma Pratiwi', 'Psr. Jakarta No. 291, Jambi 28838, Aceh', 'Subulussalam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(368, '000368', 'Salsabila Zahra Utami', 'Jln. BKR No. 482, Gunungsitoli 40512, NTT', 'Pekalongan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(369, '000369', 'Lembah Sinaga', 'Dk. Bakau No. 41, Serang 88848, DKI', 'Depok', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(370, '000370', 'Bagus Dimaz Prasetyo', 'Kpg. Ters. Pasir Koja No. 508, Administrasi Jakarta Timur 73872, JaTim', 'Gorontalo', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(371, '000371', 'Nilam Tira Hariyah', 'Dk. Astana Anyar No. 522, Solok 95564, SumSel', 'Pematangsiantar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(372, '000372', 'Vivi Agustina', 'Dk. Ciwastra No. 684, Administrasi Jakarta Selatan 70482, KalSel', 'Payakumbuh', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(373, '000373', 'Adika Sihombing S.T.', 'Dk. Pasirkoja No. 205, Pekalongan 11268, Aceh', 'Ambon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(374, '000374', 'Jelita Pertiwi', 'Jln. Abdul. Muis No. 308, Tomohon 37072, SulUt', 'Manado', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(375, '000375', 'Jelita Wulan Halimah', 'Kpg. Bakhita No. 66, Binjai 69883, SulTra', 'Salatiga', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(376, '000376', 'Cinthia Nasyidah', 'Jr. Sunaryo No. 620, Singkawang 67221, PapBar', 'Tebing Tinggi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(377, '000377', 'Gamani Nugroho', 'Jln. Baranang Siang Indah No. 73, Singkawang 46446, KalSel', 'Padang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(378, '000378', 'Taufan Hardiansyah', 'Gg. Gotong Royong No. 656, Sabang 55193, Lampung', 'Bekasi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(379, '000379', 'Paramita Paramita Astuti M.M.', 'Psr. Sam Ratulangi No. 85, Bima 74070, NTT', 'Banjarmasin', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(380, '000380', 'Diah Agustina S.Pt', 'Dk. Bagas Pati No. 260, Tanjungbalai 22137, KepR', 'Gunungsitoli', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(381, '000381', 'Salimah Anastasia Suartini', 'Psr. Kartini No. 829, Palu 33130, Jambi', 'Sungai Penuh', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(382, '000382', 'Jono Najam Marpaung M.Pd', 'Dk. Warga No. 67, Pariaman 19627, KalUt', 'Yogyakarta', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(383, '000383', 'Yoga Raden Wijaya S.Kom', 'Gg. Pasirkoja No. 539, Bengkulu 31334, NTT', 'Banjarbaru', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(384, '000384', 'Anom Bancar Saefullah', 'Dk. Imam No. 474, Pontianak 80514, PapBar', 'Pangkal Pinang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(385, '000385', 'Harimurti Budiman', 'Jr. Padma No. 464, Makassar 27831, KalBar', 'Sibolga', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(386, '000386', 'Ciaobella Usyi Riyanti S.Sos', 'Ds. Gedebage Selatan No. 458, Tidore Kepulauan 18463, SumUt', 'Tidore Kepulauan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(387, '000387', 'Yoga Firmansyah', 'Ki. Baranang Siang Indah No. 295, Cirebon 14769, Bengkulu', 'Ternate', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(388, '000388', 'Kariman Mursinin Sihombing S.IP', 'Dk. Acordion No. 565, Sorong 11347, Papua', 'Ambon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(389, '000389', 'Joko Dongoran', 'Jr. Teuku Umar No. 330, Binjai 93722, JaTim', 'Kediri', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(390, '000390', 'Gandewa Gatot Hakim', 'Psr. Jambu No. 923, Palopo 93361, KepR', 'Ternate', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(391, '000391', 'Tania Suryatmi', 'Ki. Kalimantan No. 624, Lubuklinggau 92939, MalUt', 'Tegal', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(392, '000392', 'Natalia Laksita', 'Dk. Peta No. 889, Tual 75350, PapBar', 'Subulussalam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(393, '000393', 'Cahya Banawi Nashiruddin', 'Gg. Banceng Pondok No. 813, Pasuruan 72036, SulTeng', 'Pematangsiantar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(394, '000394', 'Yoga Hidayanto', 'Jln. Basoka No. 814, Ambon 14175, Aceh', 'Palu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(395, '000395', 'Lembah Irsad Prabowo S.Pd', 'Psr. W.R. Supratman No. 940, Serang 17920, KalUt', 'Pematangsiantar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(396, '000396', 'Pangestu Sirait', 'Ds. Banda No. 171, Administrasi Jakarta Selatan 48208, SulSel', 'Yogyakarta', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(397, '000397', 'Oliva Haryanti', 'Kpg. Bahagia  No. 423, Kotamobagu 49966, Bengkulu', 'Administrasi Jakarta Selatan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(398, '000398', 'Ajiono Kusumo', 'Gg. Suniaraja No. 413, Administrasi Jakarta Barat 32625, JaTeng', 'Prabumulih', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(399, '000399', 'Heryanto Hutasoit', 'Jln. Lumban Tobing No. 912, Bima 43831, SulBar', 'Langsa', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(400, '000400', 'Gandi Lazuardi S.E.', 'Gg. HOS. Cjokroaminoto (Pasirkaliki) No. 30, Probolinggo 97014, KalBar', 'Jayapura', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(401, '000401', 'Lalita Endah Lailasari', 'Jr. Baranang No. 878, Gorontalo 18516, JaTim', 'Manado', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(402, '000402', 'Nurul Rahimah', 'Psr. Jend. A. Yani No. 704, Gorontalo 91565, JaTeng', 'Bitung', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(403, '000403', 'Harsaya Megantara', 'Ds. Rajiman No. 604, Kotamobagu 57765, Lampung', 'Lubuklinggau', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(404, '000404', 'Edison Gunarto S.Ked', 'Jln. Hasanuddin No. 318, Banjarmasin 19352, Lampung', 'Tangerang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(405, '000405', 'Halima Kusmawati S.Gz', 'Ki. Dipatiukur No. 229, Medan 32859, Banten', 'Batu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(406, '000406', 'Siti Handayani', 'Ki. Kartini No. 466, Cirebon 84603, KalBar', 'Bengkulu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(407, '000407', 'Ibun Bakiman Prabowo', 'Ki. Jend. Sudirman No. 814, Bima 89202, BaBel', 'Palangka Raya', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(408, '000408', 'Lembah Dongoran', 'Gg. Raya Setiabudhi No. 477, Bukittinggi 82234, SulTeng', 'Padangsidempuan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(409, '000409', 'Eko Kajen Gunawan M.Farm', 'Jr. Baranang Siang Indah No. 543, Banjar 80809, SulTra', 'Jambi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(410, '000410', 'Tania Wahyuni', 'Psr. Kali No. 901, Kotamobagu 35452, NTT', 'Palu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(411, '000411', 'Eli Haryanti S.T.', 'Dk. Gremet No. 1, Madiun 59863, SumUt', 'Batam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(412, '000412', 'Emil Indra Saragih', 'Gg. Pasteur No. 321, Palembang 72561, JaTim', 'Sibolga', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(413, '000413', 'Carub Nainggolan M.Kom.', 'Kpg. Suniaraja No. 413, Kupang 64252, Riau', 'Mataram', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(414, '000414', 'Emas Saragih S.IP', 'Gg. Raden No. 17, Pangkal Pinang 37666, SulSel', 'Batam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(415, '000415', 'Jane Rahayu M.Kom.', 'Jln. Abang No. 477, Denpasar 52395, KepR', 'Kendari', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(416, '000416', 'Dalima Puspasari', 'Kpg. Kartini No. 773, Padangsidempuan 83627, Jambi', 'Bogor', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(417, '000417', 'Hartaka Hardiansyah S.Pt', 'Psr. Gedebage Selatan No. 351, Parepare 24093, SumSel', 'Pematangsiantar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(418, '000418', 'Irfan Radika Winarno', 'Jr. Bawal No. 486, Bitung 58585, Bali', 'Balikpapan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(419, '000419', 'Clara Nurdiyanti S.Kom', 'Jr. Flores No. 920, Tangerang Selatan 42939, SumUt', 'Surabaya', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(420, '000420', 'Dimas Pratama', 'Ki. Sampangan No. 883, Gunungsitoli 26369, SumUt', 'Manado', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(421, '000421', 'Oni Pertiwi', 'Jln. PHH. Mustofa No. 370, Jayapura 84221, SulSel', 'Pagar Alam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(422, '000422', 'Jarwi Prakasa', 'Ki. Cut Nyak Dien No. 120, Tebing Tinggi 22443, JaTeng', 'Administrasi Jakarta Timur', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(423, '000423', 'Tugiman Wasis Prabowo', 'Dk. Sutarjo No. 571, Palopo 37060, Gorontalo', 'Singkawang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(424, '000424', 'Tugiman Kacung Samosir', 'Ki. Villa No. 270, Metro 43864, SulTra', 'Tomohon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(425, '000425', 'Dalima Laksmiwati', 'Ds. Pahlawan No. 494, Bontang 62218, KalBar', 'Tebing Tinggi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(426, '000426', 'Galuh Kariman Mandala', 'Psr. Raden No. 356, Bima 32042, KepR', 'Lubuklinggau', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(427, '000427', 'Kamal Kasiran Lazuardi', 'Psr. Lada No. 132, Pekanbaru 74332, Riau', 'Ternate', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(428, '000428', 'Edward Asman Maheswara M.Ak', 'Ki. Raya Setiabudhi No. 817, Bima 30103, SulUt', 'Surakarta', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(429, '000429', 'Almira Farida', 'Dk. Jend. A. Yani No. 104, Tual 13238, KepR', 'Cirebon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(430, '000430', 'Tami Lailasari M.Farm', 'Ki. Wahidin No. 437, Administrasi Jakarta Pusat 94747, Lampung', 'Kediri', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(431, '000431', 'Nilam Wahyuni', 'Ki. Baja No. 806, Gunungsitoli 74132, KalTeng', 'Sorong', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(432, '000432', 'Mala Hasna Susanti S.Pt', 'Gg. Flores No. 231, Ternate 46400, Papua', 'Samarinda', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(433, '000433', 'Ilyas Tamba', 'Dk. Bah Jaya No. 157, Palembang 36489, SulTeng', 'Tasikmalaya', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(434, '000434', 'Olga Permadi', 'Jr. Jend. A. Yani No. 748, Tegal 40095, DIY', 'Administrasi Jakarta Barat', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(435, '000435', 'Puji Zulaika M.Kom.', 'Ds. Tubagus Ismail No. 451, Pekalongan 11098, JaTeng', 'Administrasi Jakarta Barat', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(436, '000436', 'Sadina Gabriella Mardhiyah S.Psi', 'Psr. Baik No. 94, Parepare 71533, PapBar', 'Pariaman', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(437, '000437', 'Puspa Nasyiah', 'Ki. Baja No. 786, Balikpapan 96724, Maluku', 'Surakarta', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(438, '000438', 'Keisha Susanti', 'Psr. Basoka No. 152, Tangerang Selatan 62348, DIY', 'Samarinda', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(439, '000439', 'Asman Widodo S.Gz', 'Psr. Baranang No. 715, Banjar 49417, KalTeng', 'Administrasi Jakarta Barat', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(440, '000440', 'Tedi Wisnu Saputra', 'Jr. Bacang No. 185, Metro 38270, SulUt', 'Kotamobagu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(441, '000441', 'Danu Uwais', 'Psr. Perintis Kemerdekaan No. 117, Tangerang Selatan 51084, Maluku', 'Bontang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(442, '000442', 'Halima Tina Palastri', 'Psr. Muwardi No. 434, Palangka Raya 92649, Bali', 'Bukittinggi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(443, '000443', 'Kariman Prakasa', 'Gg. Hasanuddin No. 771, Banda Aceh 94086, SulTeng', 'Tasikmalaya', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(444, '000444', 'Gilda Farida', 'Gg. Bak Mandi No. 776, Gorontalo 62890, KalSel', 'Tegal', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(445, '000445', 'Puput Hasna Mardhiyah', 'Gg. Kebangkitan Nasional No. 872, Pekanbaru 56647, SulBar', 'Administrasi Jakarta Utara', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(446, '000446', 'Kamaria Anggraini S.T.', 'Ds. Yosodipuro No. 30, Serang 79455, NTT', 'Palu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(447, '000447', 'Hardana Ajimat Utama', 'Gg. Casablanca No. 343, Bandar Lampung 17774, Jambi', 'Banjarmasin', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(448, '000448', 'Pardi Putra', 'Ds. Hasanuddin No. 172, Sungai Penuh 40592, JaBar', 'Manado', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(449, '000449', 'Wahyu Waluyo', 'Jln. Jamika No. 967, Dumai 83256, KalUt', 'Mojokerto', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(450, '000450', 'Vanesa Agnes Sudiati S.I.Kom', 'Jr. Surapati No. 216, Surakarta 54983, KepR', 'Kendari', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(451, '000451', 'Ikhsan Kamidin Salahudin', 'Dk. Ters. Buah Batu No. 117, Jambi 15912, DKI', 'Administrasi Jakarta Barat', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(452, '000452', 'Rendy Sinaga S.Ked', 'Gg. Ir. H. Juanda No. 106, Pekalongan 22109, SulBar', 'Administrasi Jakarta Timur', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(453, '000453', 'Yoga Manullang', 'Kpg. W.R. Supratman No. 130, Kupang 42094, Banten', 'Banda Aceh', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(454, '000454', 'Dalima Namaga', 'Jln. Basuki No. 500, Tangerang 59938, DKI', 'Bima', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(455, '000455', 'Gilang Jaga Adriansyah S.IP', 'Ki. Cokroaminoto No. 165, Pekanbaru 49458, KalTeng', 'Lubuklinggau', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(456, '000456', 'Latika Safitri', 'Ds. Karel S. Tubun No. 296, Depok 98198, Riau', 'Metro', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(457, '000457', 'Jarwadi Hidayanto', 'Dk. Barat No. 623, Administrasi Jakarta Utara 43026, SulBar', 'Sorong', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(458, '000458', 'Gading Panca Nainggolan', 'Ki. Abdullah No. 667, Lubuklinggau 27050, SulUt', 'Palembang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(459, '000459', 'Mala Clara Purwanti S.Sos', 'Kpg. Babadak No. 114, Bima 66831, BaBel', 'Mataram', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(460, '000460', 'Elma Salsabila Suartini S.T.', 'Dk. Bayam No. 258, Manado 30527, SumBar', 'Ambon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(461, '000461', 'Pranawa Irawan', 'Dk. Flora No. 842, Administrasi Jakarta Pusat 22738, DKI', 'Bengkulu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(462, '000462', 'Edward Narpati', 'Dk. Pelajar Pejuang 45 No. 233, Administrasi Jakarta Barat 13228, Maluku', 'Sungai Penuh', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(463, '000463', 'Hardi Megantara', 'Jln. Bagas Pati No. 803, Mojokerto 10654, SumUt', 'Banda Aceh', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(464, '000464', 'Fathonah Latika Yulianti S.T.', 'Jln. Kalimantan No. 9, Tangerang 23271, SumBar', 'Pekalongan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(465, '000465', 'Hafshah Hastuti', 'Psr. Wahidin No. 715, Binjai 66110, SulTeng', 'Batam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(466, '000466', 'Sabri Saragih', 'Ki. Jend. Sudirman No. 114, Langsa 18723, SulUt', 'Manado', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(467, '000467', 'Nova Ade Astuti', 'Psr. Siliwangi No. 744, Padangsidempuan 26391, SulTeng', 'Bogor', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(468, '000468', 'Raisa Pia Sudiati', 'Jr. Baranang Siang Indah No. 542, Balikpapan 18258, Banten', 'Administrasi Jakarta Pusat', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(469, '000469', 'Michelle Mardhiyah', 'Dk. Mahakam No. 335, Payakumbuh 49591, SulUt', 'Malang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(470, '000470', 'Shakila Laksmiwati S.T.', 'Ds. Raya Setiabudhi No. 246, Sukabumi 28852, JaBar', 'Administrasi Jakarta Timur', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(471, '000471', 'Silvia Puspita S.IP', 'Dk. Yos Sudarso No. 897, Prabumulih 95726, Lampung', 'Palopo', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(472, '000472', 'Chelsea Hartati', 'Dk. Banda No. 233, Banjarmasin 60918, Papua', 'Medan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(473, '000473', 'Sari Hastuti S.I.Kom', 'Jr. Baladewa No. 964, Samarinda 41365, PapBar', 'Bekasi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(474, '000474', 'Wira Suwarno S.Sos', 'Psr. Asia Afrika No. 420, Kotamobagu 41259, KalTim', 'Gorontalo', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(475, '000475', 'Restu Silvia Suryatmi S.E.I', 'Psr. Warga No. 93, Ambon 47916, SulSel', 'Tidore Kepulauan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(476, '000476', 'Nadia Kusmawati', 'Gg. Baya Kali Bungur No. 878, Pontianak 64979, SumBar', 'Tanjung Pinang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(477, '000477', 'Ulva Prastuti', 'Jln. Qrisdoren No. 203, Banjarbaru 45894, KalSel', 'Cimahi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(478, '000478', 'Jono Hardiansyah', 'Kpg. Basket No. 776, Surakarta 19027, KalTeng', 'Pagar Alam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(479, '000479', 'Aswani Raditya Ramadan S.Gz', 'Dk. Suniaraja No. 597, Manado 51882, Jambi', 'Lhokseumawe', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(480, '000480', 'Raihan Sihotang', 'Kpg. Arifin No. 876, Ternate 53181, Bengkulu', 'Pariaman', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(481, '000481', 'Ibun Galak Pranowo', 'Psr. Sutarto No. 325, Singkawang 64699, KalUt', 'Sibolga', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(482, '000482', 'Oskar Prayogo Utama M.Ak', 'Jr. Pasir Koja No. 313, Pasuruan 82004, Gorontalo', 'Madiun', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(483, '000483', 'Rina Rahmi Mulyani M.TI.', 'Kpg. Barat No. 460, Makassar 39031, DIY', 'Pariaman', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(484, '000484', 'Oni Titi Winarsih S.Farm', 'Gg. Dr. Junjunan No. 239, Sukabumi 74669, Lampung', 'Makassar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(485, '000485', 'Widya Lailasari', 'Psr. Sutoyo No. 986, Bukittinggi 95845, Gorontalo', 'Pekanbaru', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(486, '000486', 'Umi Yulianti', 'Gg. Jaksa No. 764, Batam 48027, JaBar', 'Madiun', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(487, '000487', 'Janet Hastuti', 'Psr. Babah No. 35, Lubuklinggau 34280, SulSel', 'Bima', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(488, '000488', 'Fitriani Hastuti', 'Gg. Gajah Mada No. 706, Tanjung Pinang 13477, JaTim', 'Bontang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(489, '000489', 'Nasrullah Cakrabuana Tampubolon S.Sos', 'Dk. Bhayangkara No. 625, Magelang 31456, SulBar', 'Banjarmasin', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(490, '000490', 'Aris Waluyo', 'Ds. Muwardi No. 511, Administrasi Jakarta Pusat 75516, KalTim', 'Batu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(491, '000491', 'Galar Mahendra', 'Psr. Suryo No. 182, Mataram 62222, Papua', 'Singkawang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(492, '000492', 'Qori Lailasari', 'Kpg. Rajiman No. 486, Tarakan 98140, DKI', 'Palembang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(493, '000493', 'Artawan Harsaya Maryadi', 'Jln. Bata Putih No. 275, Sabang 24427, Gorontalo', 'Denpasar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(494, '000494', 'Kacung Saragih', 'Kpg. Padang No. 272, Medan 50035, Bengkulu', 'Bekasi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(495, '000495', 'Sarah Restu Kusmawati', 'Psr. Ekonomi No. 790, Magelang 79568, Jambi', 'Sawahlunto', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(496, '000496', 'Rahmat Latupono', 'Dk. Babadan No. 37, Tangerang Selatan 79995, Lampung', 'Pasuruan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(497, '000497', 'Mala Ika Rahimah', 'Jr. Ters. Pasir Koja No. 195, Batam 40109, Lampung', 'Pariaman', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(498, '000498', 'Cemani Wahyudin', 'Jr. Peta No. 25, Lhokseumawe 22132, SumSel', 'Sorong', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(499, '000499', 'Jarwi Sirait', 'Jln. Sudirman No. 851, Samarinda 32623, SumBar', 'Ternate', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(500, '000500', 'Oman Haryanto', 'Ki. Baranang No. 898, Metro 36485, NTT', 'Surabaya', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(501, '000501', 'Eli Ida Nasyidah S.I.Kom', 'Jln. Halim No. 581, Bandung 24292, DKI', 'Samarinda', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(502, '000502', 'Najib Raditya Winarno', 'Jr. Bambon No. 388, Administrasi Jakarta Timur 67715, SulTeng', 'Pematangsiantar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(503, '000503', 'Raina Palastri', 'Jln. Imam No. 7, Tanjungbalai 85426, SulTeng', 'Tangerang Selatan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(504, '000504', 'Janet Paris Hassanah S.Pt', 'Gg. Wahid No. 767, Bukittinggi 48346, PapBar', 'Bitung', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(505, '000505', 'Darsirah Prima Prasetya', 'Ki. Agus Salim No. 790, Cirebon 61689, KalTeng', 'Bukittinggi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(506, '000506', 'Aslijan Anggriawan S.Pd', 'Gg. Flora No. 144, Tarakan 35428, Bengkulu', 'Tegal', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(507, '000507', 'Arta Muni Permadi', 'Psr. Baja No. 70, Cimahi 71824, SumSel', 'Makassar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(508, '000508', 'Ihsan Prasasta', 'Ds. Eka No. 213, Serang 39861, SulUt', 'Administrasi Jakarta Timur', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(509, '000509', 'Dewi Winarsih', 'Dk. Sudiarto No. 347, Padangsidempuan 59491, Papua', 'Bogor', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(510, '000510', 'Waluyo Wibisono S.Farm', 'Ki. Sudirman No. 439, Bekasi 94055, SumSel', 'Yogyakarta', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(511, '000511', 'Hamima Laksita M.TI.', 'Ki. Ki Hajar Dewantara No. 911, Pasuruan 80195, KalSel', 'Tebing Tinggi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(512, '000512', 'Nabila Dina Lestari S.IP', 'Ds. Lada No. 98, Mataram 92011, Bengkulu', 'Semarang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(513, '000513', 'Aurora Widiastuti', 'Gg. Ahmad Dahlan No. 833, Bontang 38317, NTT', 'Bogor', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(514, '000514', 'Ajiono Permadi', 'Psr. Wora Wari No. 559, Sawahlunto 30912, MalUt', 'Batam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(515, '000515', 'Rahmi Pudjiastuti', 'Ds. Yos No. 551, Tidore Kepulauan 94836, Banten', 'Kendari', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(516, '000516', 'Kayla Tania Wahyuni M.Farm', 'Dk. Gotong Royong No. 462, Yogyakarta 67387, DKI', 'Ambon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(517, '000517', 'Ratna Namaga', 'Dk. Sukabumi No. 502, Tangerang Selatan 93501, SulTeng', 'Ternate', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(518, '000518', 'Gamani Hakim S.E.I', 'Ki. Ters. Buah Batu No. 372, Bukittinggi 28846, SulBar', 'Dumai', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(519, '000519', 'Azalea Ifa Hastuti S.Kom', 'Ki. R.M. Said No. 329, Cilegon 26912, PapBar', 'Salatiga', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(520, '000520', 'Puspa Andriani', 'Jln. Sutoyo No. 318, Pasuruan 46395, SumBar', 'Pangkal Pinang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(521, '000521', 'Dewi Agustina', 'Dk. Soekarno Hatta No. 565, Padangsidempuan 66923, Riau', 'Payakumbuh', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(522, '000522', 'Victoria Pratiwi S.Gz', 'Gg. Sadang Serang No. 154, Cilegon 20537, PapBar', 'Gorontalo', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(523, '000523', 'Tira Yuliarti', 'Dk. Banal No. 470, Payakumbuh 23100, KalUt', 'Batam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(524, '000524', 'Yuni Kusmawati', 'Dk. Suryo Pranoto No. 176, Binjai 23649, KalBar', 'Surabaya', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(525, '000525', 'Pia Nurdiyanti', 'Dk. Dago No. 629, Prabumulih 19012, Gorontalo', 'Singkawang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(526, '000526', 'Shania Hastuti S.Kom', 'Dk. Padma No. 871, Pekalongan 12234, JaBar', 'Subulussalam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(527, '000527', 'Halim Prabowo', 'Dk. Ters. Buah Batu No. 824, Metro 61173, SumSel', 'Pekalongan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(528, '000528', 'Puti Ulya Astuti S.Pd', 'Kpg. Salam No. 273, Surabaya 51717, JaTeng', 'Kotamobagu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(529, '000529', 'Ozy Hutagalung', 'Jln. Villa No. 703, Singkawang 19785, Bengkulu', 'Malang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(530, '000530', 'Endah Mardhiyah M.Ak', 'Psr. Tubagus Ismail No. 669, Madiun 60040, BaBel', 'Lhokseumawe', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(531, '000531', 'Karma Jailani', 'Kpg. Dr. Junjunan No. 348, Tangerang Selatan 59455, DKI', 'Administrasi Jakarta Timur', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(532, '000532', 'Edison Pangestu', 'Dk. Cihampelas No. 194, Makassar 15634, NTT', 'Ambon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(533, '000533', 'Anita Zulaika M.TI.', 'Jln. Pattimura No. 993, Tanjung Pinang 24671, SumUt', 'Magelang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(534, '000534', 'Dwi Anggriawan', 'Psr. Eka No. 923, Palembang 47930, KalUt', 'Tangerang Selatan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(535, '000535', 'Nyana Natsir', 'Ds. Cemara No. 684, Mojokerto 38650, Papua', 'Padang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(536, '000536', 'Zamira Utami', 'Psr. Adisumarmo No. 191, Pontianak 89894, Riau', 'Bau-Bau', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(537, '000537', 'Tasdik Nainggolan S.Ked', 'Psr. Bagonwoto  No. 189, Sungai Penuh 64046, Bali', 'Cimahi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(538, '000538', 'Adhiarja Rahman Budiyanto', 'Kpg. Kebangkitan Nasional No. 270, Madiun 60727, KalTeng', 'Kotamobagu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(539, '000539', 'Clara Widiastuti', 'Jr. Muwardi No. 529, Bukittinggi 23742, KalTeng', 'Makassar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(540, '000540', 'Eli Kusmawati', 'Jr. Gambang No. 923, Palu 30665, NTT', 'Salatiga', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(541, '000541', 'Jamalia Safitri', 'Jr. Industri No. 700, Dumai 32584, KalTeng', 'Cirebon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(542, '000542', 'Olivia Amalia Anggraini', 'Gg. Krakatau No. 630, Cimahi 80428, KepR', 'Mataram', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(543, '000543', 'Nilam Suryatmi S.I.Kom', 'Psr. Umalas No. 91, Surabaya 34665, KalTeng', 'Surabaya', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(544, '000544', 'Emin Wacana', 'Jln. Cikutra Timur No. 177, Binjai 33848, PapBar', 'Padangsidempuan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(545, '000545', 'Kamila Victoria Puspasari M.M.', 'Gg. Yogyakarta No. 522, Langsa 18482, JaTeng', 'Palu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(546, '000546', 'Anita Prastuti', 'Gg. Teuku Umar No. 572, Binjai 37320, PapBar', 'Bogor', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(547, '000547', 'Warsita Emong Wacana', 'Gg. Orang No. 333, Pekanbaru 37874, KalUt', 'Pontianak', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(548, '000548', 'Jasmani Latupono M.Pd', 'Psr. Asia Afrika No. 982, Tual 21794, SulUt', 'Palangka Raya', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(549, '000549', 'Balidin Prabowo', 'Psr. Kalimantan No. 88, Administrasi Jakarta Utara 93105, DIY', 'Lubuklinggau', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(550, '000550', 'Hasta Budiman', 'Dk. Madrasah No. 53, Binjai 74707, PapBar', 'Denpasar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(551, '000551', 'Lasmanto Ardianto S.E.I', 'Psr. Barasak No. 812, Tarakan 29451, KalBar', 'Administrasi Jakarta Barat', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(552, '000552', 'Gatra Dabukke', 'Psr. Villa No. 608, Sibolga 31294, MalUt', 'Mataram', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(553, '000553', 'Daruna Prasetya', 'Gg. Nanas No. 27, Ternate 89681, KalTim', 'Magelang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(554, '000554', 'Edison Marsito Natsir S.E.', 'Jln. Tambak No. 680, Pagar Alam 76468, Jambi', 'Langsa', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(555, '000555', 'Soleh Tedi Maryadi', 'Jr. Bagis Utama No. 130, Jayapura 27078, NTB', 'Pangkal Pinang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(556, '000556', 'Najwa Puspita S.Ked', 'Ki. Muwardi No. 436, Tarakan 94502, Papua', 'Prabumulih', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(557, '000557', 'Laras Laksita', 'Gg. Haji No. 99, Lhokseumawe 92005, SulTeng', 'Payakumbuh', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(558, '000558', 'Eka Kusmawati M.Pd', 'Jln. Bagonwoto  No. 250, Metro 83386, SulBar', 'Banjarmasin', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(559, '000559', 'Zelda Kamila Nasyidah S.Psi', 'Psr. Rajiman No. 100, Tarakan 51454, SulTra', 'Ambon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(560, '000560', 'Calista Pudjiastuti', 'Ki. Teuku Umar No. 621, Tomohon 81311, Lampung', 'Kotamobagu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(561, '000561', 'Balidin Utama S.IP', 'Gg. Setia Budi No. 805, Pagar Alam 63824, NTB', 'Tangerang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(562, '000562', 'Ellis Wahyuni', 'Psr. Aceh No. 344, Sawahlunto 21742, MalUt', 'Balikpapan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(563, '000563', 'Novi Haryanti', 'Dk. Basudewo No. 434, Langsa 72041, JaTim', 'Semarang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(564, '000564', 'Humaira Shania Usamah M.Farm', 'Ki. Agus Salim No. 999, Bogor 33093, KalTeng', 'Subulussalam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(565, '000565', 'Ihsan Kairav Sirait S.H.', 'Kpg. Banda No. 209, Pekalongan 77228, Gorontalo', 'Administrasi Jakarta Pusat', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(566, '000566', 'Dimas Uwais', 'Ds. Rumah Sakit No. 94, Cilegon 94099, MalUt', 'Sukabumi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(567, '000567', 'Cengkir Salahudin', 'Psr. Gedebage Selatan No. 536, Depok 37875, DKI', 'Tegal', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(568, '000568', 'Kanda Sihombing', 'Dk. Yap Tjwan Bing No. 662, Administrasi Jakarta Pusat 38497, MalUt', 'Jambi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(569, '000569', 'Oliva Yolanda S.I.Kom', 'Gg. Basmol Raya No. 451, Balikpapan 13085, SumSel', 'Manado', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(570, '000570', 'Pia Pratiwi', 'Gg. Baha No. 453, Tual 16609, SumSel', 'Bukittinggi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(571, '000571', 'Mala Aisyah Purnawati', 'Jr. Baing No. 112, Bogor 10113, MalUt', 'Kotamobagu', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(572, '000572', 'Cemani Jais Hutasoit', 'Gg. Suharso No. 512, Surabaya 41350, NTB', 'Bandar Lampung', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(573, '000573', 'Yosef Tarihoran', 'Jln. Dewi Sartika No. 619, Bogor 17734, JaTim', 'Subulussalam', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(574, '000574', 'Warsa Putra', 'Ds. Bass No. 989, Lhokseumawe 63211, KalTeng', 'Sabang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(575, '000575', 'Elma Hassanah', 'Ki. Samanhudi No. 518, Dumai 35428, KalTim', 'Metro', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(576, '000576', 'Baktiadi Makuta Salahudin', 'Jln. Imam No. 39, Sabang 65146, SulTeng', 'Lubuklinggau', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(577, '000577', 'Raina Mandasari', 'Jr. Dago No. 668, Administrasi Jakarta Barat 35514, SulTeng', 'Palembang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(578, '000578', 'Genta Farhunnisa Yulianti M.Ak', 'Ds. Abdul Rahmat No. 399, Payakumbuh 43915, Papua', 'Lubuklinggau', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(579, '000579', 'Elvina Wijayanti', 'Gg. Barat No. 754, Solok 90028, SulUt', 'Bukittinggi', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(580, '000580', 'Catur Salahudin', 'Ds. Bara No. 138, Payakumbuh 91650, KalSel', 'Banjar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(581, '000581', 'Yance Elma Suartini', 'Psr. Cihampelas No. 21, Pagar Alam 47247, Bengkulu', 'Ternate', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(582, '000582', 'Ajeng Hariyah', 'Dk. Wahid No. 305, Pekanbaru 29010, Aceh', 'Tomohon', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(583, '000583', 'Karen Kuswandari M.TI.', 'Gg. Sutarjo No. 514, Palu 43061, SulTra', 'Metro', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(584, '000584', 'Cakrajiya Sihombing', 'Ds. Padma No. 468, Dumai 61202, KalTim', 'Surakarta', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(585, '000585', 'Vinsen Narji Wahyudin M.Kom.', 'Gg. Jend. Sudirman No. 470, Banda Aceh 42317, MalUt', 'Bandung', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(586, '000586', 'Yance Indah Astuti S.Pd', 'Dk. Pelajar Pejuang 45 No. 470, Lubuklinggau 92058, Aceh', 'Lubuklinggau', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(587, '000587', 'Nabila Ratna Yolanda M.Pd', 'Kpg. Bank Dagang Negara No. 830, Padangpanjang 30702, SulBar', 'Gorontalo', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(588, '000588', 'Yessi Astuti', 'Gg. Salak No. 664, Cilegon 86121, Banten', 'Banjarbaru', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(589, '000589', 'Kania Ella Widiastuti', 'Ki. Taman No. 557, Batu 57954, Banten', 'Palangka Raya', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(590, '000590', 'Lili Vicky Farida', 'Jln. Bakhita No. 913, Tasikmalaya 99488, Bali', 'Jayapura', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(591, '000591', 'Reksa Mangunsong M.Kom.', 'Jr. Yogyakarta No. 550, Jayapura 33249, Lampung', 'Administrasi Jakarta Utara', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(592, '000592', 'Agnes Nasyidah M.Kom.', 'Jln. Pacuan Kuda No. 683, Kendari 81433, KepR', 'Denpasar', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(593, '000593', 'Natalia Namaga', 'Dk. Ters. Jakarta No. 748, Dumai 89749, SumSel', 'Administrasi Jakarta Selatan', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(594, '000594', 'Ami Halimah', 'Gg. Orang No. 523, Sibolga 75252, JaTim', 'Ternate', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(595, '000595', 'Prayogo Nainggolan M.Ak', 'Dk. Baya Kali Bungur No. 174, Kediri 84565, KalUt', 'Pekanbaru', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(596, '000596', 'Ciaobella Purnawati M.TI.', 'Ki. Dahlia No. 962, Kupang 73372, KalSel', 'Kupang', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(597, '000597', 'Hasim Santoso', 'Ki. Supono No. 904, Sukabumi 30709, BaBel', 'Bau-Bau', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(598, '000598', 'Juli Novi Rahimah S.H.', 'Gg. Untung Suropati No. 482, Jayapura 69832, JaBar', 'Manado', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(599, '000599', 'Cindy Yance Nasyiah M.Farm', 'Jln. Sampangan No. 127, Bukittinggi 36399, JaTeng', 'Tual', '2000-01-01', 'Investor', '', '', 'S1', '', NULL, NULL),
(600, '000600', 'I Wayan Budiastra', 'Ki. Bara No. 479, Mojokerto 24697, BaBel', 'denpasar', '2000-01-01', 'Investor', 'KTP', '32165465498651354966', 'S1', '087860333326', NULL, '2019-12-09 17:57:38'),
(601, '000601', 'I Wayan astra', 'jl.turi no 26 a dps', 'denpasar', '2019-05-01', 'Swasta', 'KTP', '49846565165', 'SD', '087860333326', '2019-12-13 04:38:53', '2019-12-13 04:38:53'),
(602, '000602', 'I Wayan Kaka Astra', 'jl.turi no 26 a dps', 'denpasar', '2019-05-01', 'Swasta', 'KTP', '49846565165', 'SD', '087860333326', '2019-12-13 04:40:00', '2019-12-13 04:40:00'),
(603, '000603', 'I Wayan Budi purnama', 'jl.turi no 26 a dps', 'denpasar', '2019-09-01', 'Swasta', 'KTP', '49846565165', 'SD', '087860333326', '2019-12-13 04:41:40', '2019-12-13 04:41:40'),
(604, '000604', 'I Wayan Budi purnama', 'jl.turi no 26 a dps', 'denpasar', '2019-09-01', 'Swasta', 'KTP', '49846565165', 'SD', '087860333326', '2019-12-13 04:42:30', '2019-12-13 04:42:30'),
(605, '000605', 'I Wayan Budi Gunawan', 'jl.turi no 26 a dps', 'denpasar', '2019-12-04', 'Swasta', 'KTP', '49846565165', 'SD', '087860333326', '2019-12-13 04:46:26', '2019-12-13 04:46:26'),
(606, '000606', 'I Wayan Budi Waseso', 'jl.turi no 26 a dps', 'denpasar', '2019-12-04', 'tes', 'KTP', '49846565165', 'SD', '087860333326', '2019-12-13 04:48:22', '2019-12-13 04:48:22'),
(607, '000607', 'I Wayan Astika Putra', 'Jl.Seroja Gang Tunas Mekar no 5 C Denpasar', 'Denpasar', '2013-01-01', 'swasta', 'KTP', '12345678', 'SD', '081353375758', '2020-01-03 00:12:19', '2020-01-03 00:12:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kas_id` int(11) NOT NULL,
  `registrasi1_id` int(11) NOT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `total_transaksi` decimal(8,2) NOT NULL,
  `total_diskon` decimal(8,2) NOT NULL,
  `total_kembali` decimal(8,2) NOT NULL,
  `total_pembayaran` decimal(10,0) NOT NULL,
  `kurang_bayar` decimal(8,2) DEFAULT NULL,
  `invoice` int(11) DEFAULT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `cencel` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `kas_id`, `registrasi1_id`, `tgl_pembayaran`, `total_transaksi`, `total_diskon`, `total_kembali`, `total_pembayaran`, `kurang_bayar`, `invoice`, `aktif`, `cencel`, `created_at`, `updated_at`) VALUES
(1, 3, 5, '2019-12-18', '0.00', '0.00', '0.00', '0', '0.00', NULL, 'Y', 'N', '2019-12-17 16:40:37', '2019-12-17 16:40:37'),
(2, 3, 6, '2019-12-18', '0.00', '0.00', '0.00', '0', '0.00', NULL, 'Y', 'N', '2019-12-17 17:57:41', '2019-12-17 17:57:41'),
(3, 4, 7, '2019-12-29', '0.00', '0.00', '0.00', '0', '0.00', NULL, 'Y', 'N', '2019-12-29 04:29:00', '2019-12-29 04:29:00'),
(4, 5, 8, '2020-01-03', '0.00', '0.00', '0.00', '0', '0.00', NULL, 'Y', 'N', '2020-01-03 00:14:32', '2020-01-03 00:14:32'),
(5, 5, 9, '2020-01-03', '0.00', '0.00', '0.00', '0', '0.00', NULL, 'Y', 'N', '2020-01-03 00:15:53', '2020-01-03 00:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_detil`
--

CREATE TABLE `pembayaran_detil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembayaran_id` int(11) NOT NULL,
  `transaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `katagori_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_jual` decimal(8,2) NOT NULL,
  `diskon` decimal(10,0) NOT NULL,
  `payer_net` decimal(8,2) DEFAULT NULL,
  `pasien_net` decimal(8,2) DEFAULT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `users_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran_detil`
--

INSERT INTO `pembayaran_detil` (`id`, `pembayaran_id`, `transaksi`, `kode_item`, `nama_item`, `katagori_item`, `qty`, `harga_jual`, `diskon`, `payer_net`, `pasien_net`, `subtotal`, `aktif`, `users_id`, `created_at`, `updated_at`) VALUES
(4, 1, 'Obat', 'G1', 'Mixagrip - Flu', 'Obat - Sirup', 2, '1000.00', '0', '0.00', '0.00', '2000.00', 'N', 1, '2019-12-25 17:05:41', '2019-12-29 00:18:05'),
(5, 1, 'obat', 'G7', 'Sana Flu', 'Obat - Sirup', 5, '700.00', '0', '0.00', '0.00', '3500.00', 'N', 1, '2019-12-29 00:16:08', '2019-12-29 00:18:05'),
(6, 1, 'obat', 'G1', 'Mixagrip - Flu', 'Obat - Sirup', 5, '1000.00', '0', '0.00', '0.00', '5000.00', 'N', 1, '2019-12-29 00:16:24', '2019-12-29 00:18:05'),
(7, 3, 'obat', 'KP-002', 'Mixagrip - Flu', 'Obat - Sirup', 5, '1000.00', '0', '0.00', '0.00', '5000.00', 'Y', 1, '2019-12-29 04:31:55', '2019-12-29 15:51:13'),
(8, 3, 'obat', 'KP-0002', 'Mixagrip - Flu', 'Obat - Sirup', 5, '1000.00', '0', '0.00', '0.00', '5000.00', 'Y', 1, '2019-12-29 15:58:46', '2019-12-29 15:58:46'),
(10, 3, 'jasa', 'KJT-00004', 'Admin - Reg Spesialis 1', 'Admin', 1, '10000.00', '0', '0.00', '0.00', '10000.00', 'Y', 1, '2019-12-29 16:06:34', '2019-12-29 16:06:34'),
(11, 3, 'jasa', 'KJT-00003', 'Cek Tensi', 'Prosedure', 1, '6500.00', '0', '0.00', '0.00', '6500.00', 'Y', 1, '2019-12-29 16:07:49', '2019-12-29 16:07:49'),
(12, 3, 'obat', 'KP-0003', 'Sana Flu', 'Obat - Sirup', 10, '700.00', '0', '0.00', '0.00', '7000.00', 'Y', 1, '2019-12-29 16:14:12', '2019-12-29 16:14:12'),
(13, 2, 'obat', 'KP-0001', 'Mixagrip', 'Obat - Sirup', 1, '6500.00', '0', '0.00', '0.00', '6500.00', 'Y', 1, '2020-01-02 15:12:46', '2020-01-02 15:12:46'),
(14, 2, 'jasa', 'KJT-00003', 'Cek Tensi', 'Prosedure', 1, '6500.00', '0', '0.00', '0.00', '6500.00', 'Y', 1, '2020-01-02 15:13:18', '2020-01-02 15:13:18'),
(15, 2, 'jasa', 'KJT-00003', 'Cek Tensi', 'Prosedure', 1, '6500.00', '0', '0.00', '0.00', '6500.00', 'Y', 1, '2020-01-02 15:13:28', '2020-01-02 15:13:28'),
(16, 2, 'obat', 'KP-0002', 'Mixagrip - Flu', 'Obat - Sirup', 1, '1000.00', '0', '0.00', '0.00', '1000.00', 'Y', 1, '2020-01-02 15:13:40', '2020-01-02 15:13:40'),
(17, 5, 'jasa', 'KJT-00003', 'Cek Tensi', 'Prosedure', 1, '6500.00', '0', '0.00', '0.00', '6500.00', 'Y', 1, '2020-01-03 00:17:45', '2020-01-03 00:33:52'),
(18, 5, 'obat', 'KP-0002', 'Mixagrip - Flu', 'Obat - Sirup', 1, '1000.00', '0', '0.00', '0.00', '1000.00', 'Y', 1, '2020-01-03 00:17:55', '2020-01-03 00:33:52'),
(19, 5, 'obat', 'KP-0001', 'Mixagrip', 'Obat - Sirup', 1, '6500.00', '500', '0.00', '0.00', '6000.00', 'Y', 1, '2020-01-03 00:18:13', '2020-01-03 00:33:52'),
(20, 5, 'obat', 'KP-0001', 'Mixagrip', 'Obat - Sirup', 10, '6500.00', '500', '0.00', '0.00', '60000.00', 'Y', 1, '2020-01-03 00:20:41', '2020-01-03 00:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan1`
--

CREATE TABLE `pemeriksaan1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registrasi_id` int(11) NOT NULL,
  `poli_id` int(11) NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `riwayat_alergi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keluhan_utama` text COLLATE utf8mb4_unicode_ci,
  `riwayat_penyakit_sekarang` text COLLATE utf8mb4_unicode_ci,
  `riwayat_penyakit_dahulu` text COLLATE utf8mb4_unicode_ci,
  `riwayat_pengobatan` text COLLATE utf8mb4_unicode_ci,
  `keadaan_umum` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gcs_e` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gcs_v` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gcs_m` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berat_badan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggi_badan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tekanan_darah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suhu_tubuh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nadi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `respirasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saturasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saturasi_pada` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_penerimaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refensi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suplier_id` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `posting` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `tgl_add` date NOT NULL,
  `jam_add` time NOT NULL,
  `users_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id`, `nomor_penerimaan`, `refensi`, `suplier_id`, `keterangan`, `posting`, `aktif`, `tgl_add`, `jam_add`, `users_id`, `created_at`, `updated_at`) VALUES
(1, 'PMA-00001', '-', 2, 'tes', 'N', 'N', '2020-01-05', '06:32:51', 1, '2020-01-04 22:32:51', '2020-01-05 13:38:34'),
(2, 'PMA-00002', '-', 3, 'tes', 'N', 'Y', '2020-01-05', '14:55:12', 1, '2020-01-05 06:55:12', '2020-01-05 06:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan_detil`
--

CREATE TABLE `penerimaan_detil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penerimaan_id` int(11) NOT NULL,
  `nama_item` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk_item_id` int(11) NOT NULL,
  `satuan_kecil_id` int(11) NOT NULL,
  `satuan_besar_id` int(11) NOT NULL,
  `isi_satuan` int(11) NOT NULL,
  `harga_beli` decimal(8,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `users_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerimaan_detil`
--

INSERT INTO `penerimaan_detil` (`id`, `penerimaan_id`, `nama_item`, `produk_item_id`, `satuan_kecil_id`, `satuan_besar_id`, `isi_satuan`, `harga_beli`, `qty`, `subtotal`, `aktif`, `users_id`, `created_at`, `updated_at`) VALUES
(9, 1, 'Mixagrip - Flu', 2, 1, 1, 10, '7000.00', 10, '70000.00', 'Y', 1, '2020-01-05 10:49:12', '2020-01-05 13:38:34'),
(14, 1, 'Sana Flu', 3, 1, 1, 12, '500.00', 60, '30000.00', 'Y', 1, '2020-01-05 12:33:48', '2020-01-05 13:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_poli` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id`, `nama_poli`, `keterangan`, `aktif`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Poli Umum', 'Tes', 'Y', NULL, '2019-12-12 02:31:29', '2019-12-12 01:35:52'),
(2, 'Poli Bedah', 'Tes', 'Y', NULL, '2019-12-12 02:07:36', '2019-12-12 02:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `produk_item`
--

CREATE TABLE `produk_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `katagori_item_id` int(11) NOT NULL,
  `satuan_besar_id` int(11) NOT NULL,
  `satuan_kecil_id` int(11) NOT NULL,
  `isi_satuan` int(11) NOT NULL,
  `harga_beli` decimal(8,2) NOT NULL,
  `harga_jual` decimal(8,2) NOT NULL,
  `fee_dokter` decimal(8,2) DEFAULT NULL,
  `fee_asisten` decimal(8,2) DEFAULT NULL,
  `fee_staff` decimal(8,2) DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `stok` int(11) DEFAULT NULL,
  `stok_max` int(11) DEFAULT NULL,
  `stok_min` int(11) DEFAULT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk_item`
--

INSERT INTO `produk_item` (`id`, `kode`, `nama_item`, `katagori_item_id`, `satuan_besar_id`, `satuan_kecil_id`, `isi_satuan`, `harga_beli`, `harga_jual`, `fee_dokter`, `fee_asisten`, `fee_staff`, `keterangan`, `stok`, `stok_max`, `stok_min`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'KP-0001', 'Mixagrip', 2, 1, 1, 1, '7000.00', '6500.00', '2000.00', '1000.00', NULL, 'tes', 71, 100, 10, 'Y', '2019-12-23 19:26:07', '2020-01-03 00:20:41'),
(2, 'KP-0002', 'Mixagrip - Flu', 2, 1, 1, 10, '7000.00', '1000.00', '2000.00', '1000.00', NULL, 'tes2', 263, 100, 10, 'Y', '2019-12-23 19:28:24', '2020-01-05 13:38:33'),
(3, 'KP-0003', 'Sana Flu', 2, 1, 1, 12, '500.00', '700.00', '200.00', '100.00', NULL, 'tes2', 1038, 100, 10, 'Y', '2019-12-23 19:49:32', '2020-01-05 13:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `produk_item_harga`
--

CREATE TABLE `produk_item_harga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_item_id` int(11) NOT NULL,
  `identitas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_master` decimal(8,2) NOT NULL,
  `markup` decimal(8,2) NOT NULL,
  `harga_publish` decimal(8,2) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk_item_suplier`
--

CREATE TABLE `produk_item_suplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_item_id` int(11) NOT NULL,
  `suplier_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk_item_suplier`
--

INSERT INTO `produk_item_suplier` (`id`, `produk_item_id`, `suplier_id`, `created_at`, `updated_at`) VALUES
(9, 2, 2, '2019-12-24 23:42:16', '2019-12-24 23:42:16'),
(10, 3, 2, '2019-12-24 23:43:04', '2019-12-24 23:43:04'),
(11, 1, 2, '2019-12-25 00:03:12', '2019-12-25 00:03:12'),
(12, 2, 1, '2019-12-25 00:04:13', '2019-12-25 00:04:13'),
(13, 3, 1, '2019-12-25 00:05:13', '2019-12-25 00:05:13'),
(14, 1, 1, '2019-12-25 00:05:26', '2019-12-25 00:05:26'),
(15, 2, 3, '2019-12-25 03:35:51', '2019-12-25 03:35:51'),
(16, 3, 3, '2019-12-29 00:02:05', '2019-12-29 00:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `produk_katagori`
--

CREATE TABLE `produk_katagori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk_katagori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk_katagori`
--

INSERT INTO `produk_katagori` (`id`, `nama_produk_katagori`, `keterangan`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'Alkes', NULL, 'Y', '2019-12-18 05:40:45', '2019-12-18 05:40:45'),
(2, 'Obat - Sirup', NULL, 'Y', '2019-12-18 05:41:13', '2019-12-18 05:41:13'),
(3, 'Vitamin', 'tes Vitamin', 'Y', '2019-12-18 05:41:31', '2019-12-18 05:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `produk_suplier`
--

CREATE TABLE `produk_suplier` (
  `produk_item_id` int(10) UNSIGNED NOT NULL,
  `suplier_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk_suplier`
--

INSERT INTO `produk_suplier` (`produk_item_id`, `suplier_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 2, NULL, NULL),
(2, 1, NULL, NULL),
(3, 1, NULL, NULL),
(3, 2, NULL, NULL),
(3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `noreg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_reg` date NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `statusreg_id` int(11) NOT NULL,
  `lob` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrasi1`
--

CREATE TABLE `registrasi1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_registrasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_registrasi_id` int(11) DEFAULT NULL,
  `poli_id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `ruangan_id` int(11) DEFAULT NULL,
  `dokter_id` int(11) NOT NULL,
  `rujukan` int(11) DEFAULT NULL,
  `tgl_reg` date NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `users_id` int(11) NOT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `iscencel` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrasi1`
--

INSERT INTO `registrasi1` (`id`, `periode`, `no_registrasi`, `jenis_registrasi_id`, `poli_id`, `pasien_id`, `ruangan_id`, `dokter_id`, `rujukan`, `tgl_reg`, `keterangan`, `users_id`, `aktif`, `iscencel`, `created_at`, `updated_at`) VALUES
(2, '201912', '0000001', NULL, 1, 54, NULL, 1, NULL, '2019-12-07', NULL, 1, 'N', 'Y', '2019-12-07 05:18:29', '2019-12-15 17:00:22'),
(3, '201912', '0000002', NULL, 2, 229, NULL, 1, NULL, '2019-12-08', NULL, 1, 'N', 'Y', '2019-12-08 01:01:46', '2019-12-15 17:02:25'),
(4, '201912', '0000003', NULL, 1, 229, NULL, 1, NULL, '2019-12-13', NULL, 1, 'N', 'Y', '2019-12-12 17:54:49', '2019-12-15 17:04:52'),
(5, '201912', '0000004', NULL, 1, 18, NULL, 1, NULL, '2019-12-13', 'tes umum', 1, 'N', 'N', '2019-12-12 19:19:34', '2019-12-17 16:40:37'),
(6, '201912', '0000005', NULL, 2, 606, NULL, 1, NULL, '2019-12-13', 'tes', 1, 'N', 'N', '2019-12-13 04:48:22', '2019-12-17 17:57:41'),
(7, '201912', '0000006', NULL, 2, 606, NULL, 1, NULL, '2019-12-29', 'tes', 1, 'N', 'N', '2019-12-29 04:27:27', '2019-12-29 04:29:00'),
(8, '201912', '0000007', NULL, 1, 597, NULL, 1, NULL, '2019-12-29', 'tes', 1, 'N', 'N', '2019-12-29 04:28:13', '2020-01-03 00:14:32'),
(9, '202001', '0000008', NULL, 1, 607, NULL, 2, NULL, '2020-01-03', 'test', 1, 'N', 'N', '2020-01-03 00:12:19', '2020-01-03 00:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `rujukan`
--

CREATE TABLE `rujukan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_rujukan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rujukan`
--

INSERT INTO `rujukan` (`id`, `kode`, `nm_rujukan`, `alamat`, `no_hp`, `email`, `created_at`, `updated_at`) VALUES
(1, '-', 'Bakti Rahayu', 'Jl Mertenadi', '0879664231', 'mertanadi@gmail.com', '2019-07-12 18:48:43', '2019-07-12 21:42:14'),
(2, '-', 'Puri Bunda', 'Jl Teku Umar', '3254875133', 'bunda@gmail.com', '2019-07-12 18:52:09', '2019-07-12 18:52:09'),
(3, '-', 'Puri Bunda Nusa Dua', 'tes', '087860333326', 'nusaduabunda@gmail.com', '2019-07-30 18:59:34', '2019-07-30 18:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_satuan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `satuan_besar`
--

CREATE TABLE `satuan_besar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_satuan_besar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satuan_besar`
--

INSERT INTO `satuan_besar` (`id`, `nama_satuan_besar`, `keterangan`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'PCS', 'tes', 'Y', '2019-12-21 05:08:42', '2019-12-21 05:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `satuan_kecil`
--

CREATE TABLE `satuan_kecil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_satuan_kecil` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satuan_kecil`
--

INSERT INTO `satuan_kecil` (`id`, `nama_satuan_kecil`, `keterangan`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'PCS', 'tes', 'Y', '2019-12-24 01:20:13', '2019-12-24 01:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `spesialis`
--

CREATE TABLE `spesialis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_spesialis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spesialis`
--

INSERT INTO `spesialis` (`id`, `nama_spesialis`, `keterangan`, `aktif`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'umum', 'tes', 'N', NULL, '2019-12-12 02:14:20', '2019-12-12 02:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_staff` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int(11) NOT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `nik`, `nama_staff`, `email`, `no_telp`, `alamat`, `tgl_lahir`, `tempat_lahir`, `users_id`, `aktif`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1121400073', 'I Wayan Budiastra', 'wayan.budiastra87@gmail.com', '087860333326', 'rsgm', '2016-12-31', 'denpasar', 22, 'Y', NULL, '2019-12-13 18:40:33', '2019-12-13 18:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `sub_spesialis`
--

CREATE TABLE `sub_spesialis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `spesialis_id` int(11) NOT NULL,
  `nama_spesialis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_spesialis`
--

INSERT INTO `sub_spesialis` (`id`, `spesialis_id`, `nama_spesialis`, `keterangan`, `aktif`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'umum', 'tes', 'N', NULL, '2019-12-12 02:14:59', '2019-12-12 02:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_suplier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_suplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id`, `kode_suplier`, `nama_suplier`, `email`, `no_telp`, `pic`, `alamat`, `aktif`, `created_at`, `updated_at`) VALUES
(1, '-', 'Adi Guna', 'wayan.budiastra07@gmail.com', '087860333326', NULL, 'jl.turi no 26 a dps', 'Y', '2019-12-24 01:18:10', '2019-12-24 01:18:10'),
(2, '5656', 'Kimia Farma', 'kimia@gmail.com', '087860333326', 'agus', 'jl.turi no 26 a dps', 'Y', '2019-12-24 05:22:00', '2019-12-24 05:22:00'),
(3, '5651', 'Duta Farma', 'wayan.budiastra07@gmail.com', '087860333326', 'agus', 'jl.turi no 26 a dps', 'Y', '2019-12-25 03:35:28', '2019-12-25 03:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `suplier_produkitem`
--

CREATE TABLE `suplier_produkitem` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `suplier_id` int(11) NOT NULL,
  `produk_item_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_tindakan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `katagoritindakan_id` int(11) DEFAULT NULL,
  `tarif` decimal(8,2) DEFAULT NULL,
  `feedokter` decimal(8,2) DEFAULT NULL,
  `feenurse` decimal(8,2) DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`id`, `kode`, `nm_tindakan`, `katagoritindakan_id`, `tarif`, `feedokter`, `feenurse`, `keterangan`, `aktif`, `created_at`, `updated_at`) VALUES
(1, '-', 'Cek Darah', 1, '1500.00', '500.00', '100.00', 'tes', 'Y', '2019-07-12 22:41:29', '2019-07-12 22:41:29'),
(2, '-', 'Konsult Poli Umum', 1, '50000.00', '35000.00', '5000.00', 'tes', 'Y', '2019-07-12 22:48:40', '2019-07-12 22:48:40'),
(3, '-', 'Konsult Poli Umum - BPJS', 1, '50000.00', '30000.00', '0.00', '-', 'Y', '2019-07-16 23:39:50', '2019-07-17 02:37:58'),
(4, '-', 'Cek Darah', 2, '50000.00', '35000.00', '5000.00', '-', 'N', '2019-07-16 23:55:37', '2019-07-17 02:35:58'),
(5, '-', 'Konsult Poli Gigi', 1, '50000.00', '35000.00', '5000.00', '-', 'N', '2019-07-17 02:37:04', '2019-08-01 21:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `tindakan_item`
--

CREATE TABLE `tindakan_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_tindakan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `katagori_tindakan_id` int(11) NOT NULL,
  `harga_jual` decimal(8,2) NOT NULL,
  `fee_dokter` decimal(8,2) DEFAULT NULL,
  `fee_asisten` decimal(8,2) DEFAULT NULL,
  `fee_staff` decimal(8,2) DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tindakan_katagori`
--

CREATE TABLE `tindakan_katagori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_tindakan_katagori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `typeitemmedis`
--

CREATE TABLE `typeitemmedis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Budiastra', 'admin.manika@gmail.com', '$2y$10$mFEyk4IrgE/uSwOlF1ZtrO.t41KV/H5GwrpUWhIzfXC.vHClfhC7S', 'pQ27mCxIN2yFmfRbx9gwWTfLdP65we16oWP5zwVfxAIGqY6DJrBiMMvn4rdw', '2019-02-03 18:46:11', '2019-02-03 18:46:11'),
(4, 'siswa', 'putu', 'suja@gmail.com', '$2y$10$Lcbg.jWUOnC0iuFPd9bYFuOXinlUTdrjgaVLMT0IAtkHpT.fGKRwa', 'Jg1P3ml6owEahHUwnirIaT7gLC05GAjR1zjyftet3awLan72EGCSWQHmd3ru', '2019-02-17 15:49:05', '2019-02-17 15:49:05'),
(5, 'siswa', 'Ni Wayan Mei Ekayanti', 'yanmeika@gmail.com', '$2y$10$sN9uzArggpNDeSZJmQikWOgY/iipZozAJRiWmVA/OsYmCifX74Jgq', 'QZ3CkVj2CKUPCgR0SLTShg6UESDLVi1E2sBXikRXyH0VHgg01hyoeE6jjAI4', '2019-04-08 05:51:15', '2019-04-08 05:51:15'),
(7, 'siswa', 'Kirana', 'wayan.budiastra27@gmail.com', '$2y$10$ui.fqcBQNEsWfQUe73k12..EcSHg/gl4Q5kbEauoIsw6UiATRqCbO', '56Si9O4hI3e8pCrHOUuON84tHAzdcuq5qJjoReiXo2SPnbTP19nw55yG0ku1', '2019-04-08 06:02:28', '2019-04-08 06:02:28'),
(11, 'guru', 'Ni Wayan Mei Eka Yanti', 'meikayanti@gmail.com', '$2y$10$XQwbqjnliz3jGZVMGr3ZauaSKZ4mgfBoMNKtXDvIppkt5TlUVFwIy', 'PdBtROpf5VjhppaaVOPpdOplyxkMZgewFQ6FxFi01e2pa2JFou2v856NYDxz', '2019-04-10 23:47:35', '2019-04-10 23:47:35'),
(12, 'guru', 'I Nyoman Berata', 'berata@gmail.com', '$2y$10$p8YM.SBwaZUOuUlLRz3WGu0Mu.gx11ekge8LIzJOFRUAxzYH7U.jm', 'f671B0UPBm0B4P45VfkKyA8gT3gj32DYm7XaFbzrLSAQz19svj3YOppsfHV2', '2019-04-10 23:48:30', '2019-04-10 23:48:30'),
(14, 'guru', 'AK', 'wayan.budiastra007@gmail.com', '$2y$10$droUy.RBQsEdh5MaFkXV/eGhcl5KauahjXB13q0.vqHcLiUJ7EDWW', 'CgEx0DVR2JutjndLFevMsxHM6MJXMT3Odq8Q45cPnd3frXmbb2tBxfFHsOo0', '2019-04-13 18:28:16', '2019-04-13 18:28:16'),
(18, 'siswa', 'agus Budiastra', 'wayan.budiastra7777@gmail.com', '$2y$10$vGuVgTBpsqqJDZGmokD8Netlo3ZDUAKB8auylSGsOXJU4yIOIuj7a', 'a7NhzClu5nmj3wU0CazeNGB9FjGrxDa2s30JobkvS50b4MpFb9OFqY0oIf4j', '2019-04-14 21:13:31', '2019-04-14 21:13:31'),
(19, 'siswa', 'Ni Wayan Mei Purnama yanti', 'meipurnama.yanti@gmail.com', '$2y$10$VYGyHcITdWZvdOgVRIVmSuZ6kkZkORcEDBHdpOUYMUMbUBDE47kw.', 'eTSPx4mSIuIjNsTd3gyyBOx0wiffHf8kXb96GcIEi7awRVTM0RrQgWKY4GW7', '2019-04-14 21:23:23', '2019-04-14 21:23:23'),
(20, 'siswa', 'Wayan bawa putra', 'bawa.putra@gmail.com', '$2y$10$vqWU8IGflFEq1wth.2lTOeR8qCRTQ8OmJe3axJ7cYDjCZ2npfTB4u', 'lB5xRJ9E5KnGqxZshPfoNGnc82ZQHtaaPNtBvLI0aABHOHsjPrs5p3FfRdNR', '2019-04-14 21:24:38', '2019-04-14 21:24:38'),
(21, 'dokter', 'dr. taufan halim', 'taufan.halim@gmail.com', '$2y$10$u9YYvApufLtxlvxodt9gpevGUq4y80CpGTraTiEkzi9jmaBxwGUqy', 'yynIZWs33x4oV1QrnUiGNwai764EhRfBNO3iNAgNVwgD2juZ9SDOfIprt3Iz', '2019-12-13 17:22:59', '2019-12-13 17:22:59'),
(22, 'staff', 'I Wayan Budiastra', 'wayan.budiastra87@gmail.com', '$2y$10$knqqMOjsdYXS7Ye5dKg3wOY8sonT1.7KrHtcFATdqE8B.uBqKP94.', 'pPwpILWcI6ZHwcNQhH20zf6yIqOFfOH8hYwcTTcwGbXETbR7E9yAok7M6orK', '2019-12-13 18:40:33', '2019-12-13 18:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `_pelayanan`
--

CREATE TABLE `_pelayanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asuransi`
--
ALTER TABLE `asuransi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detil_pembayaran`
--
ALTER TABLE `detil_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter_poli`
--
ALTER TABLE `dokter_poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faskes`
--
ALTER TABLE `faskes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasakatagori`
--
ALTER TABLE `jasakatagori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kartustok`
--
ALTER TABLE `kartustok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kas_detil`
--
ALTER TABLE `kas_detil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_user`
--
ALTER TABLE `lokasi_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran_detil`
--
ALTER TABLE `pembayaran_detil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemeriksaan1`
--
ALTER TABLE `pemeriksaan1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerimaan_detil`
--
ALTER TABLE `penerimaan_detil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_item`
--
ALTER TABLE `produk_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_item_harga`
--
ALTER TABLE `produk_item_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_item_suplier`
--
ALTER TABLE `produk_item_suplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_katagori`
--
ALTER TABLE `produk_katagori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_suplier`
--
ALTER TABLE `produk_suplier`
  ADD PRIMARY KEY (`produk_item_id`,`suplier_id`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrasi1`
--
ALTER TABLE `registrasi1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rujukan`
--
ALTER TABLE `rujukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan_besar`
--
ALTER TABLE `satuan_besar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan_kecil`
--
ALTER TABLE `satuan_kecil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spesialis`
--
ALTER TABLE `spesialis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_spesialis`
--
ALTER TABLE `sub_spesialis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suplier_produkitem`
--
ALTER TABLE `suplier_produkitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tindakan_item`
--
ALTER TABLE `tindakan_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tindakan_katagori`
--
ALTER TABLE `tindakan_katagori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typeitemmedis`
--
ALTER TABLE `typeitemmedis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `_pelayanan`
--
ALTER TABLE `_pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asuransi`
--
ALTER TABLE `asuransi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detil_pembayaran`
--
ALTER TABLE `detil_pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dokter_poli`
--
ALTER TABLE `dokter_poli`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faskes`
--
ALTER TABLE `faskes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jasakatagori`
--
ALTER TABLE `jasakatagori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kartustok`
--
ALTER TABLE `kartustok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kas_detil`
--
ALTER TABLE `kas_detil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lokasi_user`
--
ALTER TABLE `lokasi_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=608;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran_detil`
--
ALTER TABLE `pembayaran_detil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pemeriksaan1`
--
ALTER TABLE `pemeriksaan1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penerimaan_detil`
--
ALTER TABLE `penerimaan_detil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk_item`
--
ALTER TABLE `produk_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk_item_harga`
--
ALTER TABLE `produk_item_harga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk_item_suplier`
--
ALTER TABLE `produk_item_suplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `produk_katagori`
--
ALTER TABLE `produk_katagori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrasi1`
--
ALTER TABLE `registrasi1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rujukan`
--
ALTER TABLE `rujukan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satuan_besar`
--
ALTER TABLE `satuan_besar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `satuan_kecil`
--
ALTER TABLE `satuan_kecil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spesialis`
--
ALTER TABLE `spesialis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_spesialis`
--
ALTER TABLE `sub_spesialis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suplier_produkitem`
--
ALTER TABLE `suplier_produkitem`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tindakan_item`
--
ALTER TABLE `tindakan_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tindakan_katagori`
--
ALTER TABLE `tindakan_katagori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `typeitemmedis`
--
ALTER TABLE `typeitemmedis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `_pelayanan`
--
ALTER TABLE `_pelayanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
