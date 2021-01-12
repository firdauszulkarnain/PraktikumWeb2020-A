-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 12:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finddecor`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_barang` decimal(10,0) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_barang`, `deskripsi_barang`, `vendor_id`, `foto`) VALUES
(2, 'Meja Eufloria', '50000', 'terbaik\r\n', 7, '5fdc87201f81d.jpeg'),
(12, 'Set Kursi Eufloria', '90000', 'barang terbaik', 7, '5fdc8851e4200.jpg'),
(14, 'Tenda hias Eufloria', '850000', 'Tenda dengan hiasan terbaik', 7, '5fdc8859466e5.jpeg'),
(17, 'Set Tenda Eufloria', '950000', 'Terbaik\r\n', 7, '5fdc88626c21e.jpg'),
(18, 'Tenda Hias Eufloria', '850000', 'terbaik', 7, '5fdc88693d3cb.jpeg'),
(20, 'Lampu Hias Eufloria', '90000', 'terbaik', 7, '5fdc859aafa58.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `pesanan_id`, `user_id`, `vendor_id`, `tgl_selesai`) VALUES
(1, 4, 13, 7, '2020-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `total_harga` decimal(10,0) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `alamat_kirim` varchar(255) NOT NULL,
  `kab_kirim` varchar(100) NOT NULL,
  `kec_kirim` varchar(100) NOT NULL,
  `catatan` text NOT NULL,
  `status_pesanan` varchar(50) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `tgl_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `barang_id`, `vendor_id`, `total_harga`, `tgl_pesan`, `tgl_pinjam`, `tgl_kembali`, `user_id`, `alamat_kirim`, `kab_kirim`, `kec_kirim`, `catatan`, `status_pesanan`, `atas_nama`, `bank`, `tgl_bayar`) VALUES
(4, 2, 7, '50000', '2020-12-15', '2020-12-16', '2020-12-18', 13, 'Taman Giri', 'Badung', 'Kuta Selatan', 'cepetin woy', 'Selesai', 'Wina Artha', 'bca', '2020-12-16'),
(5, 14, 7, '850000', '2020-12-15', '2020-12-17', '2020-12-18', 13, 'Jl Taman Giri', 'Badung', 'Kuta Selatan', 'cepetin bang', 'Belum Bayar', 'Wina Artha', 'bca', '2020-12-16'),
(6, 12, 7, '90000', '2020-12-15', '2020-12-18', '2020-12-18', 13, 'Jl Taman Giri', 'Badung', 'Kuta Selatan', 'bagusin barangnya bang', 'Menunggu Konfirmasi', 'Wina Artha', 'bri', '2020-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `notelp` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `foto_vendor` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `bni` varchar(30) NOT NULL,
  `bri` varchar(30) NOT NULL,
  `bca` varchar(30) NOT NULL,
  `role_id` int(11) NOT NULL,
  `deskripsi_vendor` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `email`, `notelp`, `foto`, `nama_vendor`, `foto_vendor`, `alamat`, `kabupaten`, `kecamatan`, `bni`, `bri`, `bca`, `role_id`, `deskripsi_vendor`, `password`) VALUES
(4, 'admin', '', 'admin@gmail.com', '08199928293', 'Default.jpg', '', '', '', '', '', '', '', '', 1, '', '$2y$10$YjleCV9y3oL5qaPdoQS5AOJeHattXmO2gSih49w53TccSbeXJs0hG'),
(5, 'zulkarnain', 'Zulkarnain', 'zulkarnain@gmail.com', '011111', '', '', '', '', '', '', '', '', '', 3, '', '$2y$10$y7m/xkZ2LMhLM1s1SJgmH.h6QLAE6qTICL5yZ3s8Q8buQLXBWdn8W'),
(7, 'firdauszul', 'Firdaus Zulkarnain', 'firdauszul@gmail.com', '085678367', 'Default.jpg', 'Eufloria Dekorasi', 'Default.jpg', 'Taman Giri', 'Badung', 'Kuta Selatan', '0789836', '983730203', '03739472', 2, 'Menyediakan Dekorasi Pernikahan Sesuai Dengan Yang Diinginkan ', '$2y$10$cC8aXnRB9F1ffKHJIzYzLua1CCzNjay5D9J6015jdU5Je27j0K5mu'),
(13, 'winaartha', 'Wina Artha Setiawan', 'wina@gmail.com', '0361873892', 'Default.jpg', '', '', '', '', '', '', '', '', 3, '', '$2y$10$Gv6NjZeFRWDsxZrhXjmE6e5nMKbyIEIuZHNskiD9KuoOUHJM/5kRK'),
(40, 'nadyaokt', 'Nadya Oktaviana', 'nadya@gmail.com', '089753793749', 'Default.jpg', 'Nadya Vendor', 'Default.jpg', 'Jl Wanasari', 'Denpasar', 'Denpasar Utara', '', '', '018293028', 2, '', '$2y$10$w.7aSDYAIc.Vac4Yx8qMqeHnHWTieK/2sFRM7v9kGnQzb2YtvzgUG'),
(41, 'putri', 'Putri Wahyuni', 'putri@gmail.com', '08562372838', 'Default.jpg', 'Putri Dekorasi', 'Default.jpg', 'Jl Kampus Unud', 'Badung', 'Jimbaran', '', '048299384', '', 2, '', '$2y$10$WW1PJbPZKfpd6MhFg/ABNeL4RmHW9SmbWrM9tIbVSlIfh6.qLmgYy');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'Vendor'),
(3, 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
