-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 03:41 PM
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
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
(1, 'BRG003', 'Pulpen Ballpoint', 3000, 300, 2),
(2, 'BRG004', 'Buku Tulis', 5000, 200, 1),
(3, 'BRG005', 'Penghapus', 1000, 400, 2),
(4, 'BRG006', 'Penggaris', 1500, 350, 2),
(5, 'BRG007', 'Kertas HVS', 10000, 50, 1),
(6, 'BRG008', 'Spidol', 5000, 250, 2),
(7, 'BRG009', 'Tas Ransel', 100000, 20, 1),
(8, 'BRG010', 'Buku Bahasa Inggris', 30000, 80, 1),
(9, 'BRG011', 'Buku Sejarah', 35000, 120, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
(1, 'Andi Setiawan', 'L', '081234567890', 'Jl. Raya Bandung No. 1, Bandung'),
(2, 'Ani Susanti', 'P', '085765432109', 'Jl. Gatot Subroto No. 2, Jakarta'),
(3, 'Budi Pramono', 'L', '082345678901', 'Jl. Ahmad Yani No. 3, Semarang'),
(4, 'Citra Dewi', 'P', '087654321098', 'Jl. Diponegoro No. 4, Surabaya'),
(5, 'Dwi Cahyo', 'L', '089012345678', 'Jl. Sudirman No. 5, Medan');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `waktu_bayar` datetime DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `metode` enum('TUNAI','TRANSFER','EDC') DEFAULT NULL,
  `transaksi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `waktu_bayar`, `total`, `metode`, `transaksi_id`) VALUES
(51, '2023-11-23 14:15:00', 35000, 'TRANSFER', NULL),
(52, '2023-11-24 16:00:00', 20000, 'EDC', NULL),
(53, '2023-11-25 10:30:00', 60000, 'TUNAI', NULL),
(54, '2023-11-26 14:15:00', 45000, 'TRANSFER', NULL),
(55, '2023-11-27 16:00:00', 30000, 'EDC', NULL),
(56, '2023-11-28 10:30:00', 75000, 'TUNAI', NULL),
(57, '2023-11-29 14:15:00', 55000, 'TRANSFER', NULL),
(58, '2023-11-30 16:00:00', 40000, 'EDC', NULL),
(59, '2023-12-01 10:30:00', 85000, 'TUNAI', NULL),
(60, '2023-12-02 14:15:00', 65000, 'TRANSFER', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `telp`, `alamat`) VALUES
(1, 'PT. Maju Jaya', '021555444', 'Jl. Sudirman No. 123, Jakarta'),
(2, 'CV. Sejahtera', '031777888', 'Jl. Diponegoro No. 456, Surabaya'),
(3, 'Toko ABC', '0274999000', 'Jl. Malioboro No. 789, Yogyakarta'),
(4, 'PT. Mitra Sejati', '081234567890', 'Jl. Gatot Subroto No. 123, Jakarta'),
(5, 'CV. Karya Bersama', '085765432109', 'Jl. Ahmad Yani No. 456, Semarang');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `waktu_transaksi` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `pelanggan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2023-11-22', 'Pembelian buku dan alat tulis', 50000, 1),
(2, '2023-11-23', 'Pembelian buku bahasa Inggris', 35000, 2),
(3, '2023-11-24', 'Pembelian pensil dan penghapus', 20000, 3),
(4, '2023-11-25', 'Pembelian tas ransel', 100000, 4),
(5, '2023-11-26', 'Pembelian buku sejarah', 35000, 5),
(6, '2023-11-27', 'Pembelian alat tulis kantor', 60000, 1),
(7, '2023-11-28', 'Pembelian buku anak', 45000, 2),
(8, '2023-11-29', 'Pembelian buku novel', 30000, 3),
(9, '2023-11-30', 'Pembelian alat lukis', 75000, 4),
(10, '2023-12-01', 'Pembelian buku pelajaran', 55000, 5),
(11, '2024-11-21', 'sip', 10000, 1),
(12, '2024-11-21', 'sip', 10000, 1),
(13, '2024-11-21', 'sip', 10000, 1),
(14, '2024-11-21', 'sip', 10000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) DEFAULT NULL,
  `barang_id` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `transaksi_id`, `barang_id`, `harga`, `qty`) VALUES
(106, 1, 1, 50000, 2),
(107, 1, 2, 20000, 1),
(108, 2, 1, 50000, 3),
(109, 2, 3, 15000, 5),
(110, 3, 2, 20000, 4),
(111, 3, 4, 10000, 2),
(112, 4, 5, 75000, 1),
(113, 4, 1, 50000, 2),
(114, 5, 3, 15000, 3),
(115, 5, 2, 20000, 6),
(116, 5, 1, 3000, 2),
(117, 5, 7, 100000, 3),
(118, 8, 7, 100000, 5),
(119, 6, 1, 3000, 1),
(121, 14, 2, 5000, 2),
(122, 1, 5, 10000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` tinyint(4) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `alamat`, `hp`, `level`) VALUES
(1, 'admin', 'admin123', 'Administrator', 'Kantor Pusat', '0211234567', 1),
(2, 'kasir1', 'kasir123', 'Andi Nugraha', 'Cabang Bandung', '0229876543', 2),
(3, 'gudang', 'gudang123', 'Budi Santoso', 'Gudang Jakarta', '0215678901', 3),
(4, 'sales1', 'sales123', 'Citra Dewi', 'Cabang Surabaya', '0319876543', 4),
(5, 'manager', 'manager123', 'Dwi Cahyo', 'Kantor Pusat', '0211234567', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`);

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`),
  ADD CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
