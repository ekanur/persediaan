-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2020 at 03:30 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i_persediaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `is_barang`
--

CREATE TABLE `is_barang` (
  `id_barang` varchar(7) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `created_user` smallint(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user` smallint(6) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_barang`
--

INSERT INTO `is_barang` (`id_barang`, `nama_barang`, `id_jenis`, `id_satuan`, `stok`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
('B000001', 'Kertas A4', 11, 9, 37, 1, '2020-09-30 05:36:39', 1, '2020-10-01 03:55:03'),
('B000002', 'SPidol Snowman Ehiteboard', 12, 10, 2000, 1, '2020-09-30 05:36:56', 1, '2020-09-30 05:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `is_barang_keluar`
--

CREATE TABLE `is_barang_keluar` (
  `id_barang_keluar` varchar(15) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `id_barang` varchar(7) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `status` enum('Proses','Approve','Reject') NOT NULL DEFAULT 'Proses',
  `created_user` smallint(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_barang_keluar`
--

INSERT INTO `is_barang_keluar` (`id_barang_keluar`, `tanggal_keluar`, `id_barang`, `jumlah_keluar`, `status`, `created_user`, `created_date`) VALUES
('TK-2020-0000001', '2020-09-30', 'B000001', 1, 'Approve', 3, '2020-09-30 05:41:31'),
('TK-2020-0000002', '2020-10-01', 'B000001', 12, 'Approve', 3, '2020-10-01 03:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `is_barang_masuk`
--

CREATE TABLE `is_barang_masuk` (
  `id_barang_masuk` varchar(15) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `id_barang` varchar(7) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `created_user` smallint(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_barang_masuk`
--

INSERT INTO `is_barang_masuk` (`id_barang_masuk`, `tanggal_masuk`, `id_barang`, `jumlah_masuk`, `created_user`, `created_date`) VALUES
('TM-2020-0000001', '2020-09-30', 'B000001', 50, 3, '2020-09-30 05:38:16'),
('TM-2020-0000002', '2020-09-30', 'B000002', 2000, 3, '2020-09-30 05:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `is_jenis_barang`
--

CREATE TABLE `is_jenis_barang` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `created_user` smallint(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user` smallint(6) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_jenis_barang`
--

INSERT INTO `is_jenis_barang` (`id_jenis`, `nama_jenis`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
(11, 'Kertas', 1, '2020-09-30 05:30:10', 1, '2020-09-30 05:30:10'),
(12, 'Bolpoint, Spidol, Pensil, Stabilo', 1, '2020-09-30 05:30:50', 1, '2020-09-30 05:30:50'),
(13, 'Cairan Pembersih', 1, '2020-09-30 05:31:02', 1, '2020-09-30 05:31:02'),
(14, 'Perekat', 1, '2020-09-30 05:31:12', 1, '2020-09-30 05:31:12'),
(15, 'Map', 1, '2020-09-30 05:31:19', 1, '2020-09-30 05:31:19'),
(16, 'Peralatan Listrik', 1, '2020-09-30 05:31:38', 1, '2020-09-30 05:31:38'),
(17, 'Peralatan Air/ Ledeng', 1, '2020-09-30 05:31:55', 1, '2020-09-30 05:31:55'),
(18, 'Peralatan Kantor Linnya', 1, '2020-09-30 05:35:03', 1, '2020-09-30 05:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `is_satuan`
--

CREATE TABLE `is_satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(30) NOT NULL,
  `created_user` smallint(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user` smallint(6) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_satuan`
--

INSERT INTO `is_satuan` (`id_satuan`, `nama_satuan`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
(8, 'Pak', 1, '2020-09-30 05:35:31', 1, '2020-09-30 05:35:31'),
(9, 'Rim', 1, '2020-09-30 05:35:38', 1, '2020-09-30 05:35:38'),
(10, 'Buah', 1, '2020-09-30 05:35:43', 1, '2020-09-30 05:35:43'),
(11, 'Box', 1, '2020-09-30 05:35:49', 1, '2020-09-30 05:35:49'),
(12, 'Kantong', 1, '2020-09-30 05:35:56', 1, '2020-09-30 05:35:56'),
(13, 'Botol', 1, '2020-09-30 05:36:03', 1, '2020-09-30 05:36:03'),
(14, 'Tabung', 1, '2020-09-30 05:36:11', 1, '2020-09-30 05:36:11'),
(15, 'Meter', 1, '2020-09-30 05:36:18', 1, '2020-09-30 05:36:18'),
(16, 'Rol', 1, '2020-09-30 05:36:23', 1, '2020-09-30 05:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `is_users`
--

CREATE TABLE `is_users` (
  `id_user` smallint(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','Manajer','Gudang') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `is_users`
--

INSERT INTO `is_users` (`id_user`, `username`, `nama_user`, `password`, `email`, `telepon`, `foto`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Sastra', '202cb962ac59075b964b07152d234b70', 'sastra@um.ac.id', '082299000941', 'Lambang-UM.png', 'Super Admin', 'aktif', '2016-05-01 08:42:53', '2020-09-30 05:23:50'),
(2, 'sekret', 'Nanda', '202cb962ac59075b964b07152d234b70', 'Nanda@gmail.com', '0817845645645', 'kadina.png', 'Manajer', 'aktif', '2016-08-01 08:42:53', '2020-10-01 04:06:25'),
(3, 'Client', 'CLient', '202cb962ac59075b964b07152d234b70', 'Client@gmail.com', '0565645645646', '1469574126_users-10.png', 'Gudang', 'aktif', '2017-03-11 14:41:46', '2020-09-30 05:21:35');

CREATE TABLE `pengajuan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_barang` varchar(25) NOT NULL,
  `id_user` int NOT NULL,
  `jumlah` int NOT NULL,
  `alasan` varchar(100) DEFAULT NULL,
  `tanggal_pengajuan` timestamp NOT NULL,
  `nama_satuan` varchar(45) DEFAULT NULL,
  `is_approve` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `pengajuan_baru` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `jumlah` int NOT NULL,
  `nama_satuan` varchar(45) DEFAULT NULL,
  `alasan` varchar(100) DEFAULT NULL,
  `tanggal_pengajuan` timestamp NOT NULL,
  `is_approve` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `is_barang`
--
ALTER TABLE `is_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_satuan` (`id_satuan`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indexes for table `is_barang_keluar`
--
ALTER TABLE `is_barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `created_user` (`created_user`);

--
-- Indexes for table `is_barang_masuk`
--
ALTER TABLE `is_barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `created_user` (`created_user`);

--
-- Indexes for table `is_jenis_barang`
--
ALTER TABLE `is_jenis_barang`
  ADD PRIMARY KEY (`id_jenis`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indexes for table `is_satuan`
--
ALTER TABLE `is_satuan`
  ADD PRIMARY KEY (`id_satuan`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indexes for table `is_users`
--
ALTER TABLE `is_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`hak_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `is_jenis_barang`
--
ALTER TABLE `is_jenis_barang`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `is_satuan`
--
ALTER TABLE `is_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `is_users`
--
ALTER TABLE `is_users`
  MODIFY `id_user` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `is_barang`
--
ALTER TABLE `is_barang`
  ADD CONSTRAINT `is_barang_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_barang_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_barang_ibfk_3` FOREIGN KEY (`id_satuan`) REFERENCES `is_satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_barang_ibfk_4` FOREIGN KEY (`id_jenis`) REFERENCES `is_jenis_barang` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `is_barang_keluar`
--
ALTER TABLE `is_barang_keluar`
  ADD CONSTRAINT `is_barang_keluar_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_barang_keluar_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `is_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `is_barang_masuk`
--
ALTER TABLE `is_barang_masuk`
  ADD CONSTRAINT `is_barang_masuk_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_barang_masuk_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `is_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `is_jenis_barang`
--
ALTER TABLE `is_jenis_barang`
  ADD CONSTRAINT `is_jenis_barang_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_jenis_barang_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `is_satuan`
--
ALTER TABLE `is_satuan`
  ADD CONSTRAINT `is_satuan_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_satuan_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
