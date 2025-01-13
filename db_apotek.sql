-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2025 at 02:43 PM
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
-- Database: `db_apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'wandi', 'wandi', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'udin', 'udin', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'Test User', 'tes', '$2y$12$Er1Eju78ZhenoC5SNNmiHOQNqjT6JI5Trr1KiR6.1EQDXjaOiCKuK'),
(5, 'Test User', 'admin', '$2y$12$34VQTMo.fzAkAAO6FMQnNOb2JGJ5LQuoH3bgVyReggxoXwrVZshOy');

-- --------------------------------------------------------

--
-- Table structure for table `data_keranjang`
--

CREATE TABLE `data_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `jumlah_keranjang` int(10) NOT NULL,
  `harga_keranjang` varchar(255) NOT NULL,
  `total_keranjang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_keranjang`
--

INSERT INTO `data_keranjang` (`id_keranjang`, `id_obat`, `id_pelanggan`, `jumlah_keranjang`, `harga_keranjang`, `total_keranjang`) VALUES
(34, 20, 7, 5, '20001', '100005'),
(35, 19, 7, 2, '12000', '24000');

-- --------------------------------------------------------

--
-- Table structure for table `data_obat`
--

CREATE TABLE `data_obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `deskripsi_obat` varchar(255) NOT NULL,
  `harga_obat` int(20) NOT NULL,
  `stok_obat` int(20) DEFAULT NULL,
  `gambar_obat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_obat`
--

INSERT INTO `data_obat` (`id_obat`, `nama_obat`, `deskripsi_obat`, `harga_obat`, `stok_obat`, `gambar_obat`) VALUES
(19, 'Panadol', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea doloremque quisquam reiciendis consectetur qui odit illo tenetur unde pariatur fugiat quibusdam dolor, alias omnis iste esse placeat earum at assumenda! Ipsum asperiores quod, sed eligendi u', 12000, 80, 'uploads/1736767990_f1892cf5-6e3b-41b9-9d65-42aba7bcdb21.jpg'),
(20, 'antimo', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae veritatis labore quas asperiores rerum excepturi quibusdam tenetur ipsa corrupti vero, consequuntur accusamus omnis exercitationem soluta quaerat ducimus commodi eius aliquam quos. Susc', 20001, 5, 'uploads/antimo.jpg'),
(21, 'Mixagrip', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae veritatis labore quas asperiores rerum excepturi quibusdam tenetur ipsa corrupti vero, consequuntur accusamus omnis exercitationem soluta quaerat ducimus commodi eius aliquam quos. Suscipit, ea', 3000, 0, 'uploads/mixagrip.jpg'),
(22, 'Paratusin', 'Paratusin untuk apa? Paratusin adalah obat untuk meringankan gejala flu seperti demam, sakit kepala, hidung tersumbat dan bersin-bersin yang disertain batuk. Obat ini masuk dalam golongan obat bebas terbatas.', 3000, 1, 'uploads/paratusin.jpeg'),
(23, 'Decolgen', 'Decolgen cold & flu berbentuk tablet yang diproduksi oleh PT. Medifarma Laboratories dan telah terdaftar pada BPOM. Setiap tablet Decolgen mengandung 400mg paracetamol yang berfungsi sebagai pereda demam dan meringankan sakit kepala yang di sebabkan oleh ', 5600, 0, 'uploads/decolgen.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `data_order`
--

CREATE TABLE `data_order` (
  `id_order` int(11) NOT NULL,
  `nama_order` varchar(255) NOT NULL,
  `email_order` varchar(50) NOT NULL,
  `alamat_order` varchar(255) NOT NULL,
  `telepon_order` varchar(255) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `total_order` varchar(255) NOT NULL,
  `status_order` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_order`
--

INSERT INTO `data_order` (`id_order`, `nama_order`, `email_order`, `alamat_order`, `telepon_order`, `id_pelanggan`, `total_order`, `status_order`) VALUES
(18, 'Test User', 'test@example.com', 'Jl. Contoh Alamat, No. 123', '081234567890', 7, '124005', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `data_order_item`
--

CREATE TABLE `data_order_item` (
  `id_order_item` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `jumlah_order_item` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_order_item`
--

INSERT INTO `data_order_item` (`id_order_item`, `id_pelanggan`, `id_obat`, `id_order`, `jumlah_order_item`) VALUES
(16, 7, 20, 18, 5),
(17, 7, 19, 18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_pelanggan`
--

CREATE TABLE `data_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` varchar(255) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `telepon_pelanggan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pelanggan`
--

INSERT INTO `data_pelanggan` (`id_pelanggan`, `username`, `password`, `nama_pelanggan`, `alamat_pelanggan`, `email_pelanggan`, `telepon_pelanggan`) VALUES
(1, 'udin', '827ccb0eea8a706c4c34a16891f84e7b', 'udin', 'udin', 'udin@gmail.com', ''),
(2, 'martin', '925d7518fc597af0e43f5606f9a51512', 'martin', 'martin', 'martin@gmail.com', ''),
(3, 'mak', '827ccb0eea8a706c4c34a16891f84e7b', 'makrunyil', 'makru', 'makru@gmail.com', ''),
(4, 'ade', '827ccb0eea8a706c4c34a16891f84e7b', 'ndan', 'ndan', 'ndan@gmail.com', ''),
(6, 'wakwau', '827ccb0eea8a706c4c34a16891f84e7b', 'wakwawu', 'alamatnya', 'wakawu@gmail.com', '093029'),
(7, 'pelanggan', '$2y$12$qo8imZtSV5cGmtnf6/kKuO7mw6arXH63z7.7EwXBqVnH0FXvSPyDy', 'Test User', 'Jl. Contoh Alamat, No. 123', 'test@example.com', '081234567890');

-- --------------------------------------------------------

--
-- Table structure for table `data_pemasok`
--

CREATE TABLE `data_pemasok` (
  `id_pemasok` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL DEFAULT 1,
  `nama_pemasok` varchar(50) NOT NULL,
  `alamat_pemasok` varchar(255) NOT NULL,
  `telepon_pemasok` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_pembayaran`
--

CREATE TABLE `data_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `total_pembayaran` varchar(255) NOT NULL,
  `foto_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_pembayaran`
--

INSERT INTO `data_pembayaran` (`id_pembayaran`, `id_order`, `total_pembayaran`, `foto_pembayaran`) VALUES
(24, 18, 'Rp. 124.005', 'uploads/1736775384.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_pembelian`
--

CREATE TABLE `data_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pemasok` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL DEFAULT 1,
  `harga_pembelian` int(20) NOT NULL,
  `jumlah_pembelian` int(20) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_penjualan`
--

CREATE TABLE `data_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `jumlah_penjualan` int(20) NOT NULL,
  `harga_penjualan` int(20) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `harga_total_penjualan` int(50) NOT NULL,
  `status_penjualan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_penjualan`
--

INSERT INTO `data_penjualan` (`id_penjualan`, `id_obat`, `id_pelanggan`, `jumlah_penjualan`, `harga_penjualan`, `tanggal_penjualan`, `harga_total_penjualan`, `status_penjualan`) VALUES
(14, 19, 2, 2, 12000, '2023-12-10', 24000, 'Sudah Bayar'),
(15, 19, 2, 94, 12000, '2023-12-10', 1128000, 'Sudah Bayar'),
(17, 19, 2, 1, 12000, '2023-12-21', 12000, 'Belum Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `tes`
--

CREATE TABLE `tes` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_keranjang`
--
ALTER TABLE `data_keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_obat` (`id_obat`,`id_pelanggan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `data_obat`
--
ALTER TABLE `data_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `data_order`
--
ALTER TABLE `data_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `data_order_item`
--
ALTER TABLE `data_order_item`
  ADD PRIMARY KEY (`id_order_item`),
  ADD KEY `id_pelanggan` (`id_pelanggan`,`id_obat`,`id_order`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `data_pemasok`
--
ALTER TABLE `data_pemasok`
  ADD PRIMARY KEY (`id_pemasok`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_penjualan` (`id_order`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `data_pembelian`
--
ALTER TABLE `data_pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pemasok` (`id_pemasok`,`id_obat`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `data_penjualan`
--
ALTER TABLE `data_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_keranjang`
--
ALTER TABLE `data_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `data_obat`
--
ALTER TABLE `data_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `data_order`
--
ALTER TABLE `data_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `data_order_item`
--
ALTER TABLE `data_order_item`
  MODIFY `id_order_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `data_pelanggan`
--
ALTER TABLE `data_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_pemasok`
--
ALTER TABLE `data_pemasok`
  MODIFY `id_pemasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `data_pembelian`
--
ALTER TABLE `data_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `data_penjualan`
--
ALTER TABLE `data_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_keranjang`
--
ALTER TABLE `data_keranjang`
  ADD CONSTRAINT `data_keranjang_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `data_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_keranjang_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `data_obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_order`
--
ALTER TABLE `data_order`
  ADD CONSTRAINT `data_order_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `data_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_order_item`
--
ALTER TABLE `data_order_item`
  ADD CONSTRAINT `data_order_item_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `data_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_order_item_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `data_obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_order_item_ibfk_3` FOREIGN KEY (`id_order`) REFERENCES `data_order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_pemasok`
--
ALTER TABLE `data_pemasok`
  ADD CONSTRAINT `data_pemasok_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `data_admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  ADD CONSTRAINT `data_pembayaran_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `data_order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_pembelian`
--
ALTER TABLE `data_pembelian`
  ADD CONSTRAINT `data_pembelian_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `data_obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_pembelian_ibfk_2` FOREIGN KEY (`id_pemasok`) REFERENCES `data_pemasok` (`id_pemasok`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_pembelian_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `data_admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_penjualan`
--
ALTER TABLE `data_penjualan`
  ADD CONSTRAINT `data_penjualan_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `data_obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_penjualan_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `data_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
