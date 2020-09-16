-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 16, 2020 at 03:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambil_barang`
--

CREATE TABLE `ambil_barang` (
  `id_ambil_brg` int(5) NOT NULL,
  `kode_brg` varchar(10) NOT NULL,
  `jumlah_ambil` int(5) NOT NULL,
  `tgl_ambil` date NOT NULL,
  `id_prodi` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ambil_barang`
--

INSERT INTO `ambil_barang` (`id_ambil_brg`, `kode_brg`, `jumlah_ambil`, `tgl_ambil`, `id_prodi`) VALUES
(1, 'BRG0000003', 0, '2020-06-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_brg` varchar(10) NOT NULL,
  `nama_brg` varchar(30) NOT NULL,
  `no_inventaris` varchar(15) NOT NULL,
  `jenis_brg` varchar(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `tahun_perolehan` year(4) NOT NULL,
  `id_satuan` int(3) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_brg`, `nama_brg`, `no_inventaris`, `jenis_brg`, `tgl_masuk`, `tgl_keluar`, `jumlah_masuk`, `jumlah_keluar`, `tahun_perolehan`, `id_satuan`, `id_kategori`, `image`) VALUES
('BRG0000003', 'Nuvo Sabun Mandi 200grm', 'cara 2', 'Sabun', '2020-06-03', '2020-06-03', 30, 1, 2019, 2, 1, 'images.jpg'),
('BRG0000005', 'Pasta Gigi Pepsodent 1A', '', 'Pasta', '0000-00-00', '0000-00-00', 20, 0, 0000, 0, 0, 'images (1).jpg'),
('BRG0000017', 'Daia Jeruk Orange 1Kg', '3456dff', 'Detergen', '2020-06-19', '2020-06-13', 3, 2, 2019, 3, 1, ''),
('BRG0000015', 'Gula', '20100jdeee', 'Dapur', '2020-07-16', '2020-07-25', 13, 2, 2016, 3, 1, ''),
('BRG0000034', 'shampo', '20100jdEVEW', 'shampo', '2020-07-08', '2020-07-23', 25, 3, 2020, 3, 1, ''),
('BRG0000019', 'lemari', '20100wejw', 'mabel', '2020-07-09', '2020-07-18', 19, 3, 2019, 2, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(3) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Jakarta Utara');

-- --------------------------------------------------------

--
-- Table structure for table `pakai_barang`
--

CREATE TABLE `pakai_barang` (
  `id_pakai_brg` int(5) NOT NULL,
  `tgl_pakai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pakai_barang`
--

INSERT INTO `pakai_barang` (`id_pakai_brg`, `tgl_pakai`) VALUES
(2, '2020-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(3) NOT NULL,
  `nip_nid` varchar(25) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `id_prodi` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip_nid`, `nama_pegawai`, `jabatan`, `id_prodi`) VALUES
(2, 'f1a316005', 'Andi Kota', 'Mahasiswa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(3) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`) VALUES
(1, 'Ilmu Komputer S1');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(5) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  `pj` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `pj`) VALUES
(2, 'kolaka', 'bupati'),
(5, 'Kendari 2', 'walikota 2');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(3) NOT NULL,
  `nama_satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(2, 'buah'),
(3, 'lembar');

-- --------------------------------------------------------

--
-- Table structure for table `tempat_brg`
--

CREATE TABLE `tempat_brg` (
  `id_tempat` int(3) NOT NULL,
  `kode_brg` varchar(10) NOT NULL,
  `id_ruangan` int(5) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `keadaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempat_brg`
--

INSERT INTO `tempat_brg` (`id_tempat`, `kode_brg`, `id_ruangan`, `tgl_masuk`, `keadaan`) VALUES
(1, 'BRG0000003', 2, '2020-06-20', 'Baik');

-- --------------------------------------------------------

--
-- Table structure for table `user_perlengkapan`
--

CREATE TABLE `user_perlengkapan` (
  `id_user_perlengkapan` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_perlengkapan`
--

INSERT INTO `user_perlengkapan` (`id_user_perlengkapan`, `username`, `password`) VALUES
(1, 'perlengkapan', 'perlengkapan');

-- --------------------------------------------------------

--
-- Table structure for table `user_prodi`
--

CREATE TABLE `user_prodi` (
  `id_user_prodi` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_prodi` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_prodi`
--

INSERT INTO `user_prodi` (`id_user_prodi`, `username`, `password`, `id_prodi`) VALUES
(8, 'prodi', 'prodi', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambil_barang`
--
ALTER TABLE `ambil_barang`
  ADD PRIMARY KEY (`id_ambil_brg`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_brg`),
  ADD KEY `id_satuan` (`id_satuan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pakai_barang`
--
ALTER TABLE `pakai_barang`
  ADD PRIMARY KEY (`id_pakai_brg`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tempat_brg`
--
ALTER TABLE `tempat_brg`
  ADD PRIMARY KEY (`id_tempat`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `user_perlengkapan`
--
ALTER TABLE `user_perlengkapan`
  ADD PRIMARY KEY (`id_user_perlengkapan`);

--
-- Indexes for table `user_prodi`
--
ALTER TABLE `user_prodi`
  ADD PRIMARY KEY (`id_user_prodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambil_barang`
--
ALTER TABLE `ambil_barang`
  MODIFY `id_ambil_brg` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pakai_barang`
--
ALTER TABLE `pakai_barang`
  MODIFY `id_pakai_brg` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tempat_brg`
--
ALTER TABLE `tempat_brg`
  MODIFY `id_tempat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_perlengkapan`
--
ALTER TABLE `user_perlengkapan`
  MODIFY `id_user_perlengkapan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_prodi`
--
ALTER TABLE `user_prodi`
  MODIFY `id_user_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ambil_barang`
--
ALTER TABLE `ambil_barang`
  ADD CONSTRAINT `ambil_barang_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `tempat_brg`
--
ALTER TABLE `tempat_brg`
  ADD CONSTRAINT `tempat_brg_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
