-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 05:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemin_alat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `nama_Lengkap` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `nama_Lengkap`, `email`, `password`, `level`) VALUES
(21, 'user', 'Muhammad Bintang\r\n', 'bintangalkausar6@gmail.com', 'user', 'user'),
(22, 'bintang', '', 'bin@gmail.com', '12345', 'user'),
(23, 'admin', '', 'admin', '12345', 'admin'),
(24, 'user', 'user', 'user@gmail.com', 'user', 'user'),
(1235675, 'qe', 'wahuy', 'qw', '12345', 'user'),
(226661049, 'user', '', 'bin@gmail.com', '12345', 'user'),
(226661929, 'ivan', '', 'koko@gmail.com', '12345', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id_alat` int(11) NOT NULL,
  `nama_alat` varchar(225) NOT NULL,
  `spesifikasi_vol` varchar(225) NOT NULL,
  `stok_alat` int(11) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `stok_brg` varchar(255) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_brg`, `nama_brg`, `stok_brg`, `foto`, `status`) VALUES
(15, '2 propanol', '172', '', '-'),
(16, 'Amilum M1252', '109', '', '-'),
(17, 'Ammonia Solution 25% Merck', '83', '', '-'),
(18, 'Ammonia Chloride (NH4CL) 1kg', '2', '', '-'),
(19, 'Amonium Besi II Sulfat', '133', '', '-'),
(20, 'Amonium Besi III Sulfat', '134', '', '-'),
(21, 'Amonium Klorida', '17', '', '-'),
(22, 'Amonium Nitrat', '136', '', '136');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_smt` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_lab` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_smt`, `id_job`, `id_prodi`, `id`, `id_lab`, `id_brg`, `qty`, `id_kelas`, `id_transaksi`, `keterangan`, `status`) VALUES
(3, 10, 1, 21, 2, 15, 2, 1, 26, 'ok', 2),
(3, 10, 1, 21, 2, 16, 2, 1, 26, 'ok', 2),
(3, 10, 1, 21, 2, 17, 1, 1, 26, 'ok', 2),
(3, 10, 1, 21, 2, 18, 1, 1, 26, 'ok', 2),
(3, 10, 1, 21, 2, 19, 1, 1, 26, 'ok', 2),
(3, 10, 1, 21, 2, 20, 1, 1, 26, 'ok', 2),
(3, 10, 1, 21, 2, 21, 1, 1, 26, 'ok', 2),
(3, 10, 1, 21, 2, 22, 1, 1, 26, 'ok', 2),
(3, 13, 1, 21, 2, 15, 2, 1, 29, '-\r\n', 2),
(3, 13, 1, 21, 2, 16, 2, 1, 29, '-\r\n', 2),
(3, 13, 1, 21, 2, 17, 1, 1, 29, '-\r\n', 2),
(3, 13, 1, 21, 2, 18, 1, 1, 29, '-\r\n', 2),
(3, 13, 1, 21, 2, 19, 1, 1, 29, '-\r\n', 2),
(3, 13, 1, 21, 2, 20, 1, 1, 29, '-\r\n', 2),
(3, 13, 1, 21, 2, 21, 1, 1, 29, '-\r\n', 2),
(3, 13, 1, 21, 2, 22, 1, 1, 29, '-\r\n', 2),
(3, 15, 1, 21, 1, 16, 1, 1, 31, '', 1),
(3, 16, 1, 21, 1, 16, 1, 1, 32, '', 1),
(3, 17, 1, 21, 1, 16, 1, 1, 33, '', 1),
(3, 18, 1, 21, 1, 16, 1, 1, 34, '', 1),
(3, 19, 1, 21, 1, 16, 1, 1, 35, '', 1),
(4, 14, 2, 21, 1, 15, 1, 1, 30, '-', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id_lab` int(11) NOT NULL,
  `laboratorium` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id_lab`, `laboratorium`) VALUES
(1, 'cps'),
(2, 'iot\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `percobaan`
--

CREATE TABLE `percobaan` (
  `id_job` int(11) NOT NULL,
  `percobaan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `percobaan`
--

INSERT INTO `percobaan` (`id_job`, `percobaan`) VALUES
(10, 'udara'),
(13, 'udara'),
(14, 'air'),
(15, 'tanah'),
(16, 'tanah'),
(17, 'tanah'),
(18, 'tanah'),
(19, 'tanah');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `Prodi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `Prodi`) VALUES
(1, 'trk'),
(2, 'it');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_smt` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_smt`, `semester`) VALUES
(3, 1),
(4, 2),
(5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_transaksi`
--

CREATE TABLE `tabel_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_transaksi`
--

INSERT INTO `tabel_transaksi` (`id_transaksi`, `tgl_pinjam`, `tgl_kembali`) VALUES
(15, '2024-05-24', '0000-00-00'),
(16, '2024-05-30', '0000-00-00'),
(26, '2024-05-27', '0000-00-00'),
(29, '2024-05-27', '0000-00-00'),
(30, '2024-05-27', '0000-00-00'),
(31, '2024-05-27', '0000-00-00'),
(32, '2024-05-27', '0000-00-00'),
(33, '2024-05-27', '0000-00-00'),
(34, '2024-05-27', '0000-00-00'),
(35, '2024-05-27', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_brg`),
  ADD UNIQUE KEY `status` (`id_brg`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD UNIQUE KEY `id_smt` (`id_smt`,`id_job`,`id_prodi`,`id`,`id_lab`,`id_brg`,`id_kelas`,`id_transaksi`),
  ADD KEY `id` (`id`),
  ADD KEY `id_brg` (`id_brg`),
  ADD KEY `id_job` (`id_job`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_lab` (`id_lab`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_brg` (`id_brg`,`id_anggota`),
  ADD KEY `id_peminjaman` (`id_peminjaman`),
  ADD KEY `id_peminjam` (`id_anggota`);

--
-- Indexes for table `percobaan`
--
ALTER TABLE `percobaan`
  ADD PRIMARY KEY (`id_job`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_smt`),
  ADD KEY `id_data_peminjam` (`id_smt`);

--
-- Indexes for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `percobaan`
--
ALTER TABLE `percobaan`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_smt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `detail_transaksi_ibfk_3` FOREIGN KEY (`id_brg`) REFERENCES `barang` (`id_brg`),
  ADD CONSTRAINT `detail_transaksi_ibfk_4` FOREIGN KEY (`id_job`) REFERENCES `percobaan` (`id_job`),
  ADD CONSTRAINT `detail_transaksi_ibfk_5` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_6` FOREIGN KEY (`id_transaksi`) REFERENCES `tabel_transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_7` FOREIGN KEY (`id_lab`) REFERENCES `lab` (`id_lab`),
  ADD CONSTRAINT `detail_transaksi_ibfk_8` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
