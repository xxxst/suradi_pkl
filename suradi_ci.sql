-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2021 at 11:55 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suradi_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `naskah`
--

CREATE TABLE `naskah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tglnaskah` datetime NOT NULL,
  `penandatanganan` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klasifikasi` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitbidang` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisnaskah` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuansurat` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `naskah`
--

INSERT INTO `naskah` (`id`, `tglnaskah`, `penandatanganan`, `klasifikasi`, `unitbidang`, `jenisnaskah`, `tujuansurat`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '2021-06-22 00:00:00', 'Indri Fatikhu, S.Mat, M.Si', '001', 'Statistik dan Persandian', 'Surat Kuasa', 'UIN Sunan Ampel Surabaya', 'Indri', '2021-06-22 08:54:42', '2021-06-23 19:57:34'),
(2, '2021-06-23 00:00:00', 'Ahmad Zidan Nur Hakim, S.mat, M.Si', '001', 'KIP', 'Surat Kuasa', 'Diskominfo', 'Jalan', '2021-06-23 03:03:34', '2021-06-23 19:46:19'),
(4, '2021-06-23 00:00:00', 'Indri Fatikhu, S.mat, M.Si', '002', 'Aptika', 'Surat Kuasa', 'UIN Maulana Malik Ibrahim Malang', 'Dengan adanya surat ini, kami mengucapkan terima kasih atas kerja sama yang telah terjadi.', '2021-06-22 21:34:15', '2021-06-23 19:44:22'),
(6, '2021-06-23 00:00:00', 'Egi Novaldi, S.mat, M.Si', '002', 'KIP', 'Surat Pemberitahuan', 'Keluarga Besar Diskominfo Kota Malang', 'Pemberitahuan Libur Besar Hari Raya', '2021-06-22 23:06:07', '2021-06-22 23:06:07'),
(7, '2021-06-23 00:00:00', 'Siti Habibatul Ma\'rifah, S.mat, M.Si', '002', 'KIP', 'Surat Dinas', 'UIN Maulana Malik Ibrahim Malang', 'Baru', '2021-06-22 23:07:30', '2021-06-23 19:42:06'),
(10, '2021-07-02 00:00:00', 'Muhamad Habibullah, S.mat, M.Si', 'Agenda Kerja Kedepannya', 'Aptika', 'Surat Dinas', 'Diskominfo Kota Malang', 'Dengan adanya surat ini, kami mengucapkan terima kasih atas kerja sama yang telah terjadi.', '2021-06-23 20:02:30', '2021-06-23 20:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkas`
--

CREATE TABLE `tb_berkas` (
  `kd_berkas` int(11) NOT NULL,
  `nama_berkas` varchar(500) NOT NULL,
  `keterangan_berkas` varchar(100) NOT NULL,
  `tipe_berkas` varchar(100) NOT NULL,
  `ukuran_berkas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berkas`
--

INSERT INTO `tb_berkas` (`kd_berkas`, `nama_berkas`, `keterangan_berkas`, `tipe_berkas`, `ukuran_berkas`) VALUES
(1, 'a8fdb0c1915c6487b119c73b7a16e008.docx', 'cuk', '.docx', 283.43);

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin,2:staff,3:kasi,4:kabid,5:sekdin,6:kadin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id`, `username`, `password`, `nama`, `nip`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Ahmad Zidan Nur Hakim', '18610070', 1),
(2, 'staff', '6ccb4b7c39a6e77f76ecfa935a855c6c46ad5611', 'Staff', '18610071', 2),
(5, 'adminkedua', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a', 'M.A. Harisma Excel SP', '17610070', 1),
(6, 'kadin', '0a32a18df08e3c8373443baf18e76f321d793bff', 'Muhammad Nur Widiyanto, S.Sos', '123123', 6),
(7, 'sekdin', 'e40b4bd653bf56dbe7a6e6156847b7c91d2e6e41', 'Moh. Sulthon, S.Sos, MM.', '1313', 5),
(8, 'kasii', '6cde234ea568883c60b9df73be0520f7ca77024c', 'Kasi', '18610077', 3),
(9, 'kabid', 'ffa5f74ca843cfda0dcd6cb51750ae163d27f9af', 'Kabid', '123123', 4);

-- --------------------------------------------------------

--
-- Table structure for table `t_crud`
--

CREATE TABLE `t_crud` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nomorhp` bigint(20) NOT NULL,
  `tglizin` date NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_crud`
--

INSERT INTO `t_crud` (`id`, `nama`, `nip`, `nomorhp`, `tglizin`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Zidan Nur Hakim', '18610070', 8113610299, '2021-08-28', 'Pulang Kampung ke Banyuwangi', '2021-08-06 09:12:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_riwayatsurat`
--

CREATE TABLE `t_riwayatsurat` (
  `id` int(11) NOT NULL,
  `nama_surat` varchar(500) NOT NULL,
  `jenissurat` varchar(100) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `penandatanganan` varchar(255) NOT NULL,
  `klasifikasi` varchar(255) NOT NULL,
  `nomorurut` int(55) NOT NULL,
  `module` varchar(255) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `verifikator1` int(1) NOT NULL COMMENT 'kasi',
  `ket_verifikator1` varchar(1000) DEFAULT NULL,
  `verifikator2` int(1) NOT NULL COMMENT 'kabid',
  `ket_verifikator2` varchar(1000) DEFAULT NULL,
  `verifikator3` int(1) NOT NULL COMMENT 'sekdin',
  `ket_verifikator3` varchar(1000) DEFAULT NULL,
  `verifikator4` int(1) NOT NULL COMMENT 'kadin',
  `ket_verifikator4` varchar(1000) DEFAULT NULL,
  `nama_file` varchar(500) DEFAULT NULL,
  `tte_oleh` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_riwayatsurat`
--

INSERT INTO `t_riwayatsurat` (`id`, `nama_surat`, `jenissurat`, `tanggal`, `penandatanganan`, `klasifikasi`, `nomorurut`, `module`, `keterangan`, `tujuan`, `verifikator1`, `ket_verifikator1`, `verifikator2`, `ket_verifikator2`, `verifikator3`, `ket_verifikator3`, `verifikator4`, `ket_verifikator4`, `nama_file`, `tte_oleh`, `created_at`, `updated_at`) VALUES
(18, 'Surat Undangan', '001', '2021-08-28', 'Ahmad Zidan Nur Hakim, S.mat, M.Si', '001', 1211, 'Diskominfo', 'Segera', 'Diskominfo', 1, 'Sekdin oke', 1, 'kabid oke', 1, 'Sekdin Oke', 1, 'Kadin Menyetujui', 'diskominfo-210813-b56f2c5bd1.png', 'Muhammad Nur Widiyanto, S.Sos', '2021-08-13 09:03:53', '0000-00-00 00:00:00'),
(19, 'Surat Undangan', '001', '2021-08-19', 'Ahmad Zidan Nur Hakim, S.mat, M.Si', '001', 0, 'Diskominfo', 'Segera', 'Bapenda', 1, NULL, 1, NULL, 1, NULL, 1, NULL, 'diskominfo-210813-aac273182e.pdf', '', '2021-08-13 09:07:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_suratkeluar`
--

CREATE TABLE `t_suratkeluar` (
  `id` int(11) NOT NULL,
  `tanggalsurat` varchar(100) NOT NULL,
  `penandatanganan` varchar(100) NOT NULL,
  `klasifikasi` varchar(50) NOT NULL,
  `jenissurat` varchar(100) NOT NULL,
  `module` varchar(255) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `dibuattanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_suratkeluar`
--

INSERT INTO `t_suratkeluar` (`id`, `tanggalsurat`, `penandatanganan`, `klasifikasi`, `jenissurat`, `module`, `tujuan`, `keterangan`, `nama_file`, `dibuattanggal`) VALUES
(1, '2021-07-22 10:47:42', 'Indri Fatikhu, S.Mat, M.Si', '001', 'Surat Undangan', '', 'Bapenda', 'Segera', '', '2021-07-22 11:21:17'),
(6, '2021-07-29', 'Moh. Sulthon, S.Sos, MM.', '470 - Surat Kuasa', '470 - Surat Kuasa', 'Bapenda', 'Bapenda', 'segera', 'flowchart_UTS.docx', '2021-07-27 14:46:32'),
(7, '2021-07-30', 'Muhammad Nur Widianto,S.Sos.', '474 - Surat Keterangan', '474 - Surat Keterangan', 'Kelurahan Karangbesuki', 'Diskominfo', 'pkl', 'UTS.docx', '2021-07-27 15:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `t_suratmasuk`
--

CREATE TABLE `t_suratmasuk` (
  `id` int(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `klasifikasi` varchar(250) NOT NULL,
  `jenis_surat` varchar(250) NOT NULL,
  `tujuan_surat` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `model` varchar(250) NOT NULL,
  `nama_file` varchar(250) NOT NULL,
  `nomor_surat` varchar(250) NOT NULL,
  `dibuat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_template`
--

CREATE TABLE `t_template` (
  `id` int(11) NOT NULL,
  `nama_surat` varchar(255) NOT NULL,
  `klasifikasi` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_template`
--

INSERT INTO `t_template` (`id`, `nama_surat`, `klasifikasi`, `module`, `nama_file`, `created_at`, `updated_at`) VALUES
(27, 'Surat Undangan', '001 - Surat Undangan', 'Diskominfo', 'templatesurat_diskominfo-210813-c5abce8f02.png', '2021-08-13 10:15:02', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `naskah`
--
ALTER TABLE `naskah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD PRIMARY KEY (`kd_berkas`);

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_crud`
--
ALTER TABLE `t_crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_riwayatsurat`
--
ALTER TABLE `t_riwayatsurat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_suratkeluar`
--
ALTER TABLE `t_suratkeluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_suratmasuk`
--
ALTER TABLE `t_suratmasuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_template`
--
ALTER TABLE `t_template`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `naskah`
--
ALTER TABLE `naskah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  MODIFY `kd_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_crud`
--
ALTER TABLE `t_crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_riwayatsurat`
--
ALTER TABLE `t_riwayatsurat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `t_suratkeluar`
--
ALTER TABLE `t_suratkeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_suratmasuk`
--
ALTER TABLE `t_suratmasuk`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_template`
--
ALTER TABLE `t_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
