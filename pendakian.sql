-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2021 at 10:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendakian`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Edi Wahdini', 'ediwahdini', '$2y$10$cQRrFXtoya99JNBTtj15E.jwsRrJCsFJLwCxUmekSFA2ZrHshzgMy'),
(2, 'Admin', 'admin', '$2y$10$2iMCdqsLeIXm8B7khoTbj.PLJ7hAOVShcCndBliPBkjoYmchwULhm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id_banner` int(11) NOT NULL,
  `judul_banner` varchar(50) NOT NULL,
  `sub_judul_banner` varchar(100) NOT NULL,
  `gambar_banner` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id_banner`, `judul_banner`, `sub_judul_banner`, `gambar_banner`, `is_active`) VALUES
(1, 'Ini banner 1', 'Ini adalah contoh dari penggunaan banner 1 ', '817016810d931ae7c799ac00cc3c65ce.JPG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `id_chat` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `jenis_identitas` enum('KTP','KTM','SIM','KK','Passport') NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `no_handphone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_identitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `id_order`, `nama`, `alamat`, `jk`, `jenis_identitas`, `no_identitas`, `no_handphone`, `email`, `password`, `foto_identitas`) VALUES
(1, 11, 'AA', 'aaa', 'L', 'KTP', 'aaa', 'aaa', '0', '', ''),
(2, 11, 'zz', 'zzzz', 'L', 'KTP', 'zzz', 'zz', '0', '', ''),
(3, 0, 'Edo Wahdanna', 'lkjsdf.asf8sdf898s', 'L', 'KTP', '328234782347', '01923818238', 'edo@gmail.com', '$2y$10$0WqrrQsMedYGRqEVzZxFj.gUBU0lVWm6QZ7qIaJ3SwNirJbOG1a2a', ''),
(4, 0, 'Edi Wahdini', 'Jl.dipati ewanggoy', 'L', 'KTM', '32109883918123', '0812383871', 'edi@gmail.com', '$2y$10$ZmwCty8PEnstWQVr8a5P6ehI9JDF56/QwKWMK7tRpA.kxVOhhoRf6', 'b7460f6929e836cf818fe8717f8b2716.png'),
(5, 0, 'Coba coba', 'Jl. coba coba', 'L', 'KTP', '377123700123', '08123717233', 'coba@gmail.com', '$2y$10$Rau4I0Bfx7C6NaVLQsh65ubFYU3DCpNrn9KO6sZyXeimpxVaoIBJa', '3c802f41d14b389e6321e37a0a78b88f.png'),
(6, 0, 'Siwana', 'Darma kuningan', 'L', 'KTM', '821727127', '0812373717', 'siwana@gmail.com', '$2y$10$8b6ZcTvwbqshOqT0hO3fJeu0YQ0XtOUwwTYpZdAOfJDbXXAu17j8m', 'e10ad432967c74e5e06c3c3c87a07725.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kuota`
--

CREATE TABLE `tbl_kuota` (
  `id_kuota` int(11) NOT NULL,
  `kuota_tersisa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bulan` varchar(5) NOT NULL,
  `tahun` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kuota`
--

INSERT INTO `tbl_kuota` (`id_kuota`, `kuota_tersisa`, `tanggal`, `bulan`, `tahun`) VALUES
(2, 63, '2021-06-17', '06', '2021'),
(3, 19, '2021-06-18', '06', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_admin`
--

CREATE TABLE `tbl_menu_admin` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `icon_menu` varchar(50) NOT NULL,
  `url_menu` varchar(50) NOT NULL,
  `is_sub_menu` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_menu_admin`
--

INSERT INTO `tbl_menu_admin` (`id_menu`, `nama_menu`, `icon_menu`, `url_menu`, `is_sub_menu`, `is_active`) VALUES
(1, 'Menu Management', 'fa fa-folder', 'c_dashboard/menu_management', 0, 1),
(3, 'Kuota', 'fa fa-user', 'c_dashboard/kuota', 0, 1),
(4, 'Order', 'fa fa-pen', 'c_dashboard/order', 0, 1),
(5, 'User', 'fa fa-user', 'c_dashboard/user', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `kode_order` varchar(50) NOT NULL,
  `tanggal_naik` varchar(50) NOT NULL,
  `tanggal_turun` varchar(50) NOT NULL,
  `status_order` char(1) NOT NULL,
  `harga` int(11) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `id_customer`, `kode_order`, `tanggal_naik`, `tanggal_turun`, `status_order`, `harga`, `bukti_pembayaran`) VALUES
(9, 4, 'CRM-75031814', '2021-06-17', '2021-06-19', '0', 0, 'e353263b97fc45332c2966427d37d8cb.png'),
(10, 4, 'CRM-74125633', '2021-06-17', '2021-06-19', '2', 0, '084f30f6031ee7d67a5c6d02922e15f2.png'),
(11, 4, 'CRM-40788394', '2021-06-17', '2021-06-19', '2', 0, ''),
(12, 4, 'CRM-93124033', '2021-06-17', '2021-06-19', '2', 0, ''),
(13, 3, 'CRM-67480391', '2021-06-17', '2021-06-19', '0', 0, '3ba90852fcbec32c0e0ccb7aff2ff318.jpg'),
(15, 0, 'CRM-14917233', '2021-06-17', '2021-06-19', '0', 0, ''),
(16, 3, 'CRM-99699767', '2021-06-17', '2021-06-19', '0', 0, ''),
(17, 3, 'CRM-89348849', '2021-06-17', '2021-06-19', '0', 0, ''),
(18, 6, 'CRM-92577479', '2021-06-18', '2021-06-20', '1', 0, '23a3070c3e63a349be4d7b8752f21846.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_periode`
--

CREATE TABLE `tbl_periode` (
  `id_periode` int(11) NOT NULL,
  `bulan` enum('1','2','3','4','5','6','7','8','9','10','11','12') NOT NULL,
  `tahun` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_menu`
--

CREATE TABLE `tbl_sub_menu` (
  `id_sub_menu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_sub_menu` varchar(50) NOT NULL,
  `icon_sub_menu` varchar(50) NOT NULL,
  `url_sub_menu` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tbl_kuota`
--
ALTER TABLE `tbl_kuota`
  ADD PRIMARY KEY (`id_kuota`);

--
-- Indexes for table `tbl_menu_admin`
--
ALTER TABLE `tbl_menu_admin`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tbl_sub_menu`
--
ALTER TABLE `tbl_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_kuota`
--
ALTER TABLE `tbl_kuota`
  MODIFY `id_kuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_menu_admin`
--
ALTER TABLE `tbl_menu_admin`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_sub_menu`
--
ALTER TABLE `tbl_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
