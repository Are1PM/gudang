-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 22, 2020 at 05:33 AM
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
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `bagian_id` int(11) NOT NULL,
  `bagian_nama` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`bagian_id`, `bagian_nama`) VALUES
(2, 'asdfafdfsfs'),
(3, 'faewaef');

-- --------------------------------------------------------

--
-- Table structure for table `barang_perlengkapan`
--

CREATE TABLE `barang_perlengkapan` (
  `bp_id` int(11) NOT NULL,
  `bp_nama` varchar(145) CHARACTER SET utf8mb4 DEFAULT NULL,
  `bp_thn_perolehan` varchar(45) CHARACTER SET utf8mb4 DEFAULT NULL,
  `bp_sumber` varchar(145) CHARACTER SET utf8mb4 DEFAULT NULL,
  `bp_no_inventaris` varchar(145) CHARACTER SET utf8mb4 DEFAULT NULL,
  `bp_tgl_masuk` date DEFAULT NULL,
  `bp_tgl_keluar` date DEFAULT NULL,
  `bp_jenis_barang` varchar(145) CHARACTER SET utf8mb4 DEFAULT NULL,
  `bp_jumlah_masuk` int(11) DEFAULT NULL,
  `bp_jumlah_keluar` int(11) DEFAULT NULL,
  `bp_stok_brg` int(11) DEFAULT NULL,
  `bp_image` varchar(145) CHARACTER SET utf8mb4 DEFAULT NULL,
  `bp_kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang_perlengkapan`
--

INSERT INTO `barang_perlengkapan` (`bp_id`, `bp_nama`, `bp_thn_perolehan`, `bp_sumber`, `bp_no_inventaris`, `bp_tgl_masuk`, `bp_tgl_keluar`, `bp_jenis_barang`, `bp_jumlah_masuk`, `bp_jumlah_keluar`, `bp_stok_brg`, `bp_image`, `bp_kategori_id`) VALUES
(2, 'spidol', '2000', 'bak', 'skdfjskfd', '2020-09-02', '2020-09-19', 'buah', 45, 5, 8, NULL, 1),
(4, 'kertas', '7', 'bak', 'skfakf', '2020-09-12', '2020-09-26', 'lembar', 4, 5, 32, '242368.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang_perlengkapan_has_transaksi_perlengkapan`
--

CREATE TABLE `barang_perlengkapan_has_transaksi_perlengkapan` (
  `bp_id` int(11) NOT NULL,
  `tp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `barang_prodi`
--

CREATE TABLE `barang_prodi` (
  `brg_prodi_id` int(11) NOT NULL,
  `brg_prodi_nama` varchar(145) CHARACTER SET utf8mb4 DEFAULT NULL,
  `brg_prodi_jumlah` int(11) DEFAULT NULL,
  `brg_prodi_stok` int(11) DEFAULT NULL,
  `brg_prodi_tgl_masuk` date DEFAULT NULL,
  `brg_prodi_tgl_keluar` date DEFAULT NULL,
  `brg_prodi_jml_masuk` int(11) DEFAULT NULL,
  `brg_prodi_jml_keluar` int(11) DEFAULT NULL,
  `brg_prodi_prodi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang_prodi`
--

INSERT INTO `barang_prodi` (`brg_prodi_id`, `brg_prodi_nama`, `brg_prodi_jumlah`, `brg_prodi_stok`, `brg_prodi_tgl_masuk`, `brg_prodi_tgl_keluar`, `brg_prodi_jml_masuk`, `brg_prodi_jml_keluar`, `brg_prodi_prodi_id`) VALUES
(2, 'keranjang', 4, 5, '2020-09-10', '2020-09-12', 5, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `barang_prodi_has_transaksi_prodi`
--

CREATE TABLE `barang_prodi_has_transaksi_prodi` (
  `brg_prodi_id` int(11) NOT NULL,
  `t_prodi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `kategori_jumlah` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`, `kategori_jumlah`) VALUES
(1, 'buah', 3);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `username` varchar(45) CHARACTER SET utf8mb4 DEFAULT NULL,
  `password` varchar(145) CHARACTER SET utf8mb4 DEFAULT NULL,
  `level` varchar(45) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `username`, `password`, `level`) VALUES
(1, 'andi', '12345', 'perlengkapan'),
(2, 'prodi', '12345', 'prodi'),
(3, 'pegawai', '12345', 'pegawai'),
(4, 'bagian', '12345', 'bagian');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `pegawai_nip_nid` varchar(45) CHARACTER SET utf8mb4 DEFAULT NULL,
  `pegawai_nama` varchar(45) CHARACTER SET utf8mb4 DEFAULT NULL,
  `pegawai_jabatan` varchar(45) CHARACTER SET utf8mb4 DEFAULT NULL,
  `pegawai_no_hp` varchar(45) CHARACTER SET utf8mb4 DEFAULT NULL,
  `pegawai_bagian_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `pegawai_nip_nid`, `pegawai_nama`, `pegawai_jabatan`, `pegawai_no_hp`, `pegawai_bagian_id`) VALUES
(4, 'adfad', 'gawerwaa', 'gadwwfs', '3435dfas', 3);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `prodi_id` int(11) NOT NULL,
  `prodi_nama` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`prodi_id`, `prodi_nama`) VALUES
(3, 'ILKOM');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_perlengkapan`
--

CREATE TABLE `transaksi_perlengkapan` (
  `tp_id` int(11) NOT NULL,
  `tp_tgl_transaksi` date DEFAULT NULL,
  `tp_jumlah` int(11) DEFAULT NULL,
  `tp_bagian_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi_perlengkapan`
--

INSERT INTO `transaksi_perlengkapan` (`tp_id`, `tp_tgl_transaksi`, `tp_jumlah`, `tp_bagian_id`) VALUES
(3, '2020-09-11', 3, 2),
(5, '2020-09-13', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_prodi`
--

CREATE TABLE `transaksi_prodi` (
  `t_prodi_id` int(11) NOT NULL,
  `t_prodi_tgl_transaksi` date DEFAULT NULL,
  `t_prodi_pegawai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi_prodi`
--

INSERT INTO `transaksi_prodi` (`t_prodi_id`, `t_prodi_tgl_transaksi`, `t_prodi_pegawai_id`) VALUES
(3, '2020-09-30', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`bagian_id`);

--
-- Indexes for table `barang_perlengkapan`
--
ALTER TABLE `barang_perlengkapan`
  ADD PRIMARY KEY (`bp_id`),
  ADD KEY `fk_barang_perlengkapan_kategori1_idx` (`bp_kategori_id`);

--
-- Indexes for table `barang_perlengkapan_has_transaksi_perlengkapan`
--
ALTER TABLE `barang_perlengkapan_has_transaksi_perlengkapan`
  ADD PRIMARY KEY (`bp_id`,`tp_id`),
  ADD KEY `fk_barang_perlengkapan_has_transaksi_perlengkapan_transaksi_idx` (`tp_id`),
  ADD KEY `fk_barang_perlengkapan_has_transaksi_perlengkapan_barang_pe_idx` (`bp_id`);

--
-- Indexes for table `barang_prodi`
--
ALTER TABLE `barang_prodi`
  ADD PRIMARY KEY (`brg_prodi_id`),
  ADD KEY `fk_barang_prodi_prodi1_idx` (`brg_prodi_prodi_id`);

--
-- Indexes for table `barang_prodi_has_transaksi_prodi`
--
ALTER TABLE `barang_prodi_has_transaksi_prodi`
  ADD PRIMARY KEY (`brg_prodi_id`,`t_prodi_id`),
  ADD KEY `fk_barang_prodi_has_transaksi_prodi_transaksi_prodi1_idx` (`t_prodi_id`),
  ADD KEY `fk_barang_prodi_has_transaksi_prodi_barang_prodi1_idx` (`brg_prodi_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pegawai_id`),
  ADD KEY `fk_pegawai_bagian1_idx` (`pegawai_bagian_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`prodi_id`);

--
-- Indexes for table `transaksi_perlengkapan`
--
ALTER TABLE `transaksi_perlengkapan`
  ADD PRIMARY KEY (`tp_id`),
  ADD KEY `fk_transaksi_perlengkapan_bagian_idx` (`tp_bagian_id`);

--
-- Indexes for table `transaksi_prodi`
--
ALTER TABLE `transaksi_prodi`
  ADD PRIMARY KEY (`t_prodi_id`),
  ADD KEY `fk_transaksi_prodi_pegawai1_idx` (`t_prodi_pegawai_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `bagian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang_perlengkapan`
--
ALTER TABLE `barang_perlengkapan`
  MODIFY `bp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barang_prodi`
--
ALTER TABLE `barang_prodi`
  MODIFY `brg_prodi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `prodi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi_perlengkapan`
--
ALTER TABLE `transaksi_perlengkapan`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi_prodi`
--
ALTER TABLE `transaksi_prodi`
  MODIFY `t_prodi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_perlengkapan`
--
ALTER TABLE `barang_perlengkapan`
  ADD CONSTRAINT `fk_barang_perlengkapan_kategori1` FOREIGN KEY (`bp_kategori_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_perlengkapan_has_transaksi_perlengkapan`
--
ALTER TABLE `barang_perlengkapan_has_transaksi_perlengkapan`
  ADD CONSTRAINT `fk_barang_perlengkapan_has_transaksi_perlengkapan_barang_perl1` FOREIGN KEY (`bp_id`) REFERENCES `barang_perlengkapan` (`bp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_barang_perlengkapan_has_transaksi_perlengkapan_transaksi_p1` FOREIGN KEY (`tp_id`) REFERENCES `transaksi_perlengkapan` (`tp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `barang_prodi`
--
ALTER TABLE `barang_prodi`
  ADD CONSTRAINT `fk_barang_prodi_prodi1` FOREIGN KEY (`brg_prodi_prodi_id`) REFERENCES `prodi` (`prodi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `barang_prodi_has_transaksi_prodi`
--
ALTER TABLE `barang_prodi_has_transaksi_prodi`
  ADD CONSTRAINT `fk_barang_prodi_has_transaksi_prodi_barang_prodi1` FOREIGN KEY (`brg_prodi_id`) REFERENCES `barang_prodi` (`brg_prodi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_barang_prodi_has_transaksi_prodi_transaksi_prodi1` FOREIGN KEY (`t_prodi_id`) REFERENCES `transaksi_prodi` (`t_prodi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk_pegawai_bagian1` FOREIGN KEY (`pegawai_bagian_id`) REFERENCES `bagian` (`bagian_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi_perlengkapan`
--
ALTER TABLE `transaksi_perlengkapan`
  ADD CONSTRAINT `fk_transaksi_perlengkapan_bagian` FOREIGN KEY (`tp_bagian_id`) REFERENCES `bagian` (`bagian_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi_prodi`
--
ALTER TABLE `transaksi_prodi`
  ADD CONSTRAINT `fk_transaksi_prodi_pegawai1` FOREIGN KEY (`t_prodi_pegawai_id`) REFERENCES `pegawai` (`pegawai_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
