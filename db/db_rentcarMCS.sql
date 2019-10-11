-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2017 at 11:25 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rentcarMCS`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_perawatan`
--

CREATE TABLE `detail_perawatan` (
  `id_perawatan` int(7) DEFAULT NULL,
  `id_suku_cadang` int(7) DEFAULT NULL,
  `suku_cadang_terpakai` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_unit_kendaraan`
--

CREATE TABLE `detail_unit_kendaraan` (
  `id_unit_kendaraan` int(5) DEFAULT NULL,
  `id_kendaraan` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_unit_kendaraan`
--

INSERT INTO `detail_unit_kendaraan` (`id_unit_kendaraan`, `id_kendaraan`) VALUES
(1820, 4),
(1820, 5);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(12) NOT NULL,
  `foto` text NOT NULL,
  `no_polisi` varchar(10) DEFAULT NULL,
  `merk` varchar(20) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `warna` varchar(15) DEFAULT NULL,
  `tahun_produksi` year(4) DEFAULT NULL,
  `no_mesin` int(17) DEFAULT NULL,
  `kapasitas_mesin` varchar(10) DEFAULT NULL,
  `biaya_sewa_kendaraan` int(11) NOT NULL,
  `status_kendaraan` enum('tersedia','rental') DEFAULT 'tersedia',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `foto`, `no_polisi`, `merk`, `type`, `warna`, `tahun_produksi`, `no_mesin`, `kapasitas_mesin`, `biaya_sewa_kendaraan`, `status_kendaraan`, `created_at`, `updated_at`) VALUES
(4, 'avanzaveloz.jpg', 'bm 1020 ky', 'suzuki', 'avanza veloz', 'silver', 2014, 12313123, '1000 cc', 100000, 'rental', '2017-05-11 08:01:20', '2017-06-12 01:28:49'),
(5, '', '98', 'sdfsdf', 'sdfsdf', 'sdfsdfds', 2004, 234234, '234234', 1200000, 'rental', '2017-05-11 08:33:33', '2017-06-12 01:28:49'),
(6, 'avanzaveloz.jpg', 'bm 1043 ky', 'suzuki', 'avanza velvet', 'silver', 2013, 1312312, '1000 cc', 100000, 'tersedia', '2017-05-11 08:01:20', '2017-06-11 22:57:16'),
(7, 'avanzaveloz.jpg', 'bm 1045 ky', 'suzuki', 'avanza velvet', 'silver', 2011, 13112399, '1500 cc', 5000000, 'tersedia', '2017-05-11 08:01:20', '2017-06-11 22:57:19'),
(8, '', 'bm 1201 kj', 'gege', 'type', 'red', 0000, 2147483647, '2000', 40000, 'tersedia', '2017-06-12 00:45:17', '2017-06-12 00:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `ketentuan`
--

CREATE TABLE `ketentuan` (
  `no_ketentuan` int(100) NOT NULL,
  `nama_ketentuan` varchar(100) DEFAULT NULL,
  `jenis_ketentuan` enum('perentalan','perpanjangan') DEFAULT NULL,
  `rincian_ketentuan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ketentuan`
--

INSERT INTO `ketentuan` (`no_ketentuan`, `nama_ketentuan`, `jenis_ketentuan`, `rincian_ketentuan`, `created_at`, `updated_at`) VALUES
(1, 'pelayanan', 'perentalan', 'mendapatkan pelayanan perawatan setiap bulan', '2017-05-11 01:41:24', '2017-05-29 22:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(12) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `nama_pelanggan` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_telepon` varchar(12) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tujuan_rental` varchar(255) DEFAULT 'Alat pendukung Transportasi Instansi',
  `status_pelanggan` enum('sedang merental','tidak merental') DEFAULT 'tidak merental',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `nama_pelanggan`, `email`, `no_telepon`, `alamat`, `tujuan_rental`, `status_pelanggan`, `created_at`, `updated_at`) VALUES
(41, 'pe', 'pe', 'pe@pe', '231313', 'pe', 'Alat pendukung Transportasi Instansi', 'sedang merental', '2017-05-28 07:31:14', '2017-06-12 01:28:49'),
(42, 'abd', 'ahmarul', 'ah@gmail', '863653', 'bangau', 'Alat pendukung Transportasi Instansi', 'tidak merental', '2017-06-12 02:35:03', '2017-06-12 02:35:03'),
(43, 'ah', 'aha', 'ah@gmail', '99786', 'ah', 'Alat pendukung Transportasi Instansi', 'tidak merental', '2017-06-12 02:37:16', '2017-06-12 02:37:16'),
(44, 'a', 'am', 'a@yahoo', '97977', 'a', 'Alat pendukung Transportasi Instansi', 'tidak merental', '2017-06-12 02:45:32', '2017-06-12 02:45:32'),
(45, 'ade', 'ade k', 'ade@gmail', '86677', 'taman karya', 'Alat pendukung Transportasi Instansi', 'tidak merental', '2017-06-12 02:48:01', '2017-06-12 02:48:01');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `hak_akses` enum('administrator','manager','pelanggan') DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `hak_akses`, `foto`, `created_at`, `updated_at`) VALUES
('', 'a3dcb4d229de6fde0db5686dee47145d', 'pelanggan', NULL, '2017-06-09 19:07:08', '2017-06-09 19:07:08'),
('a', 'bcbdd9611d9287e0a1b5c256905bb8f0', 'pelanggan', '', '2017-06-12 02:45:32', '2017-06-12 02:45:32'),
('abd', 'ae057aebf678c6848ed7d0e0b7e44511', 'pelanggan', '', '2017-06-12 02:35:03', '2017-06-12 02:35:03'),
('ade', 'fa6a6bd136dec26a1dd5e326b7e43254', 'pelanggan', '', '2017-06-12 02:48:01', '2017-06-12 02:48:01'),
('admin', '0192023a7bbd73250516f069df18b500', 'administrator', 'avatar.png', '2017-05-08 02:11:26', '2017-05-08 02:11:26'),
('admin2', 'c84258e9c39059a89ab77d846ddab909', 'administrator', 'avatar.png', '2017-05-08 02:11:26', '2017-06-09 18:39:00'),
('ah', 'ae057aebf678c6848ed7d0e0b7e44511', 'pelanggan', '', '2017-06-12 02:37:16', '2017-06-12 02:37:16'),
('asd', 'd41d8cd98f00b204e9800998ecf8427e', 'administrator', '', '2017-06-09 19:07:30', '2017-06-09 19:07:30'),
('asdasd', 'd41d8cd98f00b204e9800998ecf8427e', 'administrator', '', '2017-06-09 19:07:26', '2017-06-09 19:07:26'),
('asdasdadsad', 'd41d8cd98f00b204e9800998ecf8427e', 'administrator', '', '2017-06-09 19:07:54', '2017-06-09 19:07:54'),
('asdasdasdasd', 'd41d8cd98f00b204e9800998ecf8427e', 'administrator', '', '2017-06-09 19:07:50', '2017-06-09 19:07:50'),
('asdfff', 'a3dcb4d229de6fde0db5686dee47145d', 'pelanggan', NULL, '2017-06-09 19:07:01', '2017-06-09 19:07:01'),
('asdsadasd', 'd41d8cd98f00b204e9800998ecf8427e', 'administrator', '', '2017-06-09 19:07:45', '2017-06-09 19:07:45'),
('asdsadsad', 'd41d8cd98f00b204e9800998ecf8427e', 'administrator', '', '2017-06-09 19:07:42', '2017-06-09 19:07:42'),
('ma', 'a589e9efdfe4754a29d176b13c9122ca', 'manager', 'avatar2.png', '2017-05-08 02:13:15', '2017-05-08 02:13:15'),
('pe', '94eedc562f158d14046d2f00c85ec443', 'pelanggan', '1.png', '2017-05-28 07:31:14', '2017-05-28 07:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

CREATE TABLE `perawatan` (
  `id_perawatan` int(11) NOT NULL,
  `id_unit_kendaraan` int(255) NOT NULL,
  `jumlah_terpakai` int(7) DEFAULT NULL,
  `tindakan` varchar(255) DEFAULT NULL,
  `biaya_tindakan` varchar(10) DEFAULT NULL,
  `total_harga` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suku_cadang`
--

CREATE TABLE `suku_cadang` (
  `id_suku_cadang` int(7) NOT NULL,
  `jenis_suku_cadang` varchar(30) DEFAULT NULL,
  `nama_suku_cadang` varchar(30) DEFAULT NULL,
  `rincian_suku_cadang` varchar(255) DEFAULT NULL,
  `harga_satuan` int(10) DEFAULT NULL,
  `stok` int(3) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suku_cadang`
--

INSERT INTO `suku_cadang` (`id_suku_cadang`, `jenis_suku_cadang`, `nama_suku_cadang`, `rincian_suku_cadang`, `harga_satuan`, `stok`, `created_at`, `updated_at`) VALUES
(7, 'ban', 'swallo', 'swallow 100', 400000, 8, '2017-05-11 07:41:35', '2017-06-11 17:34:56'),
(8, 'oli', 'mpx', 'mpx 200lt', 900000, 8, '2017-05-11 07:42:32', '2017-06-11 23:12:44'),
(9, 'hasdhb', 'iasdbaisdb', 'ibasdi', 1000, 10, '2017-05-11 10:42:49', '2017-06-11 23:12:44'),
(10, 'ban', 'bridgeston', 'bridgeston 270mm', 500000, 3, '2017-05-27 19:10:02', '2017-06-11 17:34:56'),
(11, 'wwerwerwer', 'srerwerj', 'werwerwer', 100000, 8, '2017-05-27 19:15:54', '2017-06-11 17:34:56'),
(12, 'ban', 'swallo', 'swallow 100', 400000, 11, '2017-05-11 07:41:35', '2017-06-11 17:33:10'),
(13, 'hasdhb', 'iasdbaisdb', 'ibasdi', 1000, 8, '2017-05-11 10:42:49', '2017-06-11 17:34:56');

-- --------------------------------------------------------

--
-- Table structure for table `syarat`
--

CREATE TABLE `syarat` (
  `no_syarat` int(100) NOT NULL,
  `nama_syarat` varchar(100) DEFAULT NULL,
  `jenis_syarat` enum('perentalan','perpanjangan') DEFAULT NULL,
  `rincian_syarat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syarat`
--

INSERT INTO `syarat` (`no_syarat`, `nama_syarat`, `jenis_syarat`, `rincian_syarat`, `created_at`, `updated_at`) VALUES
(3, 'sim', 'perentalan', 'sim dibawa ketika pertama kali rental', '2017-05-10 04:27:38', '2017-05-29 21:35:43'),
(4, 'sim', 'perentalan', 'asfakbfaf', '2017-05-10 04:29:12', '2017-05-29 22:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kendaraan`
--

CREATE TABLE `unit_kendaraan` (
  `id_unit_kendaraan` int(255) NOT NULL,
  `id_pelanggan` int(12) DEFAULT NULL,
  `jumlah_kendaraan` int(5) DEFAULT NULL,
  `tanggal_rental` datetime NOT NULL,
  `tanggal_kembali` datetime NOT NULL,
  `tanggal_booking` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `waktu_booking` datetime DEFAULT NULL,
  `total_biaya` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_kendaraan`
--

INSERT INTO `unit_kendaraan` (`id_unit_kendaraan`, `id_pelanggan`, `jumlah_kendaraan`, `tanggal_rental`, `tanggal_kembali`, `tanggal_booking`, `waktu_booking`, `total_biaya`, `created_at`, `updated_at`) VALUES
(1820, 41, 2, '2017-06-22 00:00:00', '2017-07-08 00:00:00', '2017-06-12 01:28:49', '2017-07-08 00:00:00', 1300000, '2017-06-12 01:28:49', '2017-06-12 02:08:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_perawatan`
--
ALTER TABLE `detail_perawatan`
  ADD UNIQUE KEY `id_suku_cadang` (`id_suku_cadang`),
  ADD KEY `detail_perawatan_ibfk_1` (`id_perawatan`);

--
-- Indexes for table `detail_unit_kendaraan`
--
ALTER TABLE `detail_unit_kendaraan`
  ADD KEY `id_kendaraan` (`id_kendaraan`),
  ADD KEY `detail_unit_kendaraan_ibfk` (`id_unit_kendaraan`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `ketentuan`
--
ALTER TABLE `ketentuan`
  ADD PRIMARY KEY (`no_ketentuan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `fk_username` (`username`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id_perawatan`),
  ADD UNIQUE KEY `id_perawatan` (`id_perawatan`),
  ADD KEY `perawatan_ibfk_1` (`id_unit_kendaraan`);

--
-- Indexes for table `suku_cadang`
--
ALTER TABLE `suku_cadang`
  ADD PRIMARY KEY (`id_suku_cadang`);

--
-- Indexes for table `syarat`
--
ALTER TABLE `syarat`
  ADD PRIMARY KEY (`no_syarat`);

--
-- Indexes for table `unit_kendaraan`
--
ALTER TABLE `unit_kendaraan`
  ADD PRIMARY KEY (`id_unit_kendaraan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ketentuan`
--
ALTER TABLE `ketentuan`
  MODIFY `no_ketentuan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `suku_cadang`
--
ALTER TABLE `suku_cadang`
  MODIFY `id_suku_cadang` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `syarat`
--
ALTER TABLE `syarat`
  MODIFY `no_syarat` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_perawatan`
--
ALTER TABLE `detail_perawatan`
  ADD CONSTRAINT `detail_perawatan_ibfk_1` FOREIGN KEY (`id_perawatan`) REFERENCES `perawatan` (`id_perawatan`),
  ADD CONSTRAINT `detail_perawatan_ibfk_2` FOREIGN KEY (`id_suku_cadang`) REFERENCES `suku_cadang` (`id_suku_cadang`);

--
-- Constraints for table `detail_unit_kendaraan`
--
ALTER TABLE `detail_unit_kendaraan`
  ADD CONSTRAINT `detail_unit_kendaraan_ibfk` FOREIGN KEY (`id_unit_kendaraan`) REFERENCES `unit_kendaraan` (`id_unit_kendaraan`),
  ADD CONSTRAINT `detail_unit_kendaraan_ibfk_2` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`);

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`);

--
-- Constraints for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD CONSTRAINT `perawatan_ibfk_1` FOREIGN KEY (`id_unit_kendaraan`) REFERENCES `unit_kendaraan` (`id_unit_kendaraan`);

--
-- Constraints for table `unit_kendaraan`
--
ALTER TABLE `unit_kendaraan`
  ADD CONSTRAINT `unit_kendaraan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
