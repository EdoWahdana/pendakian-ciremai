-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2021 at 03:03 PM
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

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`id_chat`, `id_admin`, `id_customer`, `pesan`, `timestamp`, `status`) VALUES
(1, 0, 3, 'mnbnm', '0000-00-00 00:00:00', 0),
(2, 0, 3, '', '2021-09-20 17:18:48', 0),
(3, 0, 3, 'Halo admin', '2021-09-20 19:42:56', 0),
(4, 0, 3, 'Tes', '2021-09-20 19:45:14', 0),
(5, 2, 3, 'Ada apa', '2021-09-21 06:52:18', 0),
(6, 0, 3, 'Tes 1', '2021-09-22 07:45:57', 0),
(7, 0, 3, 'Tes 1', '2021-09-22 07:45:58', 0),
(8, 2, 3, 'Admin', '2021-09-22 07:47:34', 0),
(9, 0, 3, 'Ini user', '2021-09-24 10:46:37', 0),
(10, 0, 3, 'ini user 2', '2021-09-24 10:50:51', 0),
(11, 0, 3, 'Ini user 3', '2021-09-24 10:51:40', 0),
(12, 0, 7, 'Hai admin', '2021-09-30 13:31:56', 0),
(13, 0, 3, '', '2021-10-06 06:19:59', 0),
(14, 0, 3, '', '2021-10-06 06:20:01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
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

INSERT INTO `tbl_customer` (`id_customer`, `id_order`, `nama`, `tanggal_lahir`, `alamat`, `jk`, `jenis_identitas`, `no_identitas`, `no_handphone`, `email`, `password`, `foto_identitas`) VALUES
(3, 0, 'Edo Wahdanna', NULL, 'lkjsdf.asf8sdf898s', 'L', 'KTP', '328234782347', '01923818238', 'edo@gmail.com', '$2y$10$0WqrrQsMedYGRqEVzZxFj.gUBU0lVWm6QZ7qIaJ3SwNirJbOG1a2a', ''),
(4, 0, 'Edi Wahdini', NULL, 'Jl.dipati ewanggoy', 'L', 'KTM', '32109883918123', '0812383871', 'edi@gmail.com', '$2y$10$ZmwCty8PEnstWQVr8a5P6ehI9JDF56/QwKWMK7tRpA.kxVOhhoRf6', 'b7460f6929e836cf818fe8717f8b2716.png'),
(5, 0, 'Coba coba', NULL, 'Jl. coba coba', 'L', 'KTP', '377123700123', '08123717233', 'coba@gmail.com', '$2y$10$Rau4I0Bfx7C6NaVLQsh65ubFYU3DCpNrn9KO6sZyXeimpxVaoIBJa', '3c802f41d14b389e6321e37a0a78b88f.png'),
(6, 0, 'Siwana', NULL, 'Darma kuningan', 'L', 'KTM', '821727127', '0812373717', 'siwana@gmail.com', '$2y$10$8b6ZcTvwbqshOqT0hO3fJeu0YQ0XtOUwwTYpZdAOfJDbXXAu17j8m', 'e10ad432967c74e5e06c3c3c87a07725.png'),
(7, 0, 'Muhammad Abdi', '1996-09-05', 'Jl. Kramat Raya No.140', 'L', 'KTP', '238810355757018', '0812373717', 'abdi@gmail.com', '$2y$10$KsCn7EbLOrGMCjFEnfvCgOpqI3u.eAhiYJxpNM1iNXcturpEMiT6C', '048c15ad94c969a9e8ee44b56d17fb69.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_interface`
--

CREATE TABLE `tbl_interface` (
  `id_interface` int(11) NOT NULL,
  `tentang` text NOT NULL,
  `gambar` varchar(168) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_interface`
--

INSERT INTO `tbl_interface` (`id_interface`, `tentang`, `gambar`) VALUES
(1, 'Gunung Ceremai (sering kali secara salah kaprah dinamakan \"Ciremai\") (Latin: Gunung Ceremé) adalah gunung berapi kerucut yang secara administratif termasuk dalam wilayah dua kabupaten, yakni Kabupaten Kuningan dan Kabupaten Majalengka, Provinsi Jawa Barat.', '9c40ffa7bfe804fbf595a360520f82d9.jpg'),
(2, '1. Mengisi data untuk pendaftaran\r\n2. Pastikan seluruh rombongan pendaki berusia minimal 13 tahun\r\n3. Siapkan identitas KTP/SIM/KK/Paspor\r\n4. Lakukan booking paling lambat H-1 pendakian\r\n5. Siapkan perlengkapan dan logistik pendakian yang mencukupi.\r\n6. Pastikan kondisi seluruh rombongan pendaki dalam kondisi sehat.\r\n7. Pastikan jumlah rombongan pendaki minimal 4 orang dan maksimal 8 orang. \r\n8. Durasi pendakian gunung Ciremai adalah 2 hari 1 malam (2D1N). Bila melebihi durasi tersebut dikenakan tarif tambahan\r\n9. Mematuhi semua peraturan dan larangan yang berlaku\r\n10. Mematuhi Protokol Kesehatan penyelenggaraan wisata alam gunung Ciremai saat pandemi Covid 19. \r\n11. Melakukan transfer Penerimaan Negara Bukan Pajak (PNBP) sesuai nominal.\r\n12. Mendirikan tenda di Transit Camp sesuai kode kapling dengan jarak 10 meter antar tenda dan setiap tenda diisi maksimal 2 orang\r\n13. Mengikuti cek kesehatan, cek perlengkapan, dan safety talk di Base Camp\r\n14. Prosedur Tetap Pendakian dapati diunduh pada tautan ini (https://drive.google.com/file/d/1OKWfJ3LR5HX_KNtX04Td2XBV94h1eMYX/view?usp=sharing)\r\nKuota jalur pendakian:\r\n- Linggajati: 35 tenda di Transit Camp untuk 69 pendaki per hari.', '6f9e06d88a63b060392a130f09d65b6d.jpeg');

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
(3, 13, '2021-06-18', '06', '2021'),
(4, 19, '2021-09-01', '09', '2021'),
(5, 9, '2021-12-10', '12', '2021');

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
(4, 'Order', 'fa fa-first-order', 'c_dashboard/order', 0, 1),
(5, 'User', 'fa fa-user', 'c_dashboard/user', 0, 1),
(6, 'Laporan', 'fa fa-bar-chart', 'c_dashboard/laporan', 0, 1),
(7, 'Pesan', 'fa fa-comment', 'c_dashboard/chat', 0, 1),
(8, 'Interface', 'fa fa-certificate', '#', 1, 1);

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
  `bukti_pembayaran` varchar(100) NOT NULL,
  `check_in` tinyint(4) NOT NULL DEFAULT 0,
  `check_out` tinyint(4) NOT NULL DEFAULT 0,
  `reschedule` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `id_customer`, `kode_order`, `tanggal_naik`, `tanggal_turun`, `status_order`, `harga`, `bukti_pembayaran`, `check_in`, `check_out`, `reschedule`) VALUES
(9, 4, 'CRM-75031814', '2021-06-17', '2021-06-19', '0', 0, 'e353263b97fc45332c2966427d37d8cb.png', 0, 0, 0),
(10, 4, 'CRM-74125633', '2021-06-17', '2021-06-19', '2', 0, '084f30f6031ee7d67a5c6d02922e15f2.png', 0, 0, 0),
(11, 4, 'CRM-40788394', '2021-06-17', '2021-06-19', '2', 0, '', 0, 0, 0),
(12, 4, 'CRM-93124033', '2021-06-17', '2021-06-19', '2', 0, '', 0, 0, 0),
(13, 3, 'CRM-67480391', '2021-06-17', '2021-06-19', '1', 0, '3ba90852fcbec32c0e0ccb7aff2ff318.jpg', 1, 0, 0),
(16, 3, 'CRM-99699767', '2021-06-17', '2021-06-19', '0', 0, '', 1, 0, 0),
(17, 3, 'CRM-89348849', '2021-06-17', '2021-06-19', '0', 0, '', 1, 0, 0),
(18, 6, 'CRM-92577479', '2021-06-18', '2021-06-20', '1', 0, '23a3070c3e63a349be4d7b8752f21846.png', 0, 0, 0),
(19, 7, 'CRM-11299777', '2021-09-01', '2021-09-03', '0', 50000, '', 0, 0, 0),
(20, 3, 'CRM-90921220', '2021-12-10', '2021-12-12', '1', 50000, 'e65d9a228e3c9a0dfe8ba7ceae724bad.png', 1, 0, 0),
(21, 3, 'CRM-01015056', '2021-06-18', '2021-06-20', '0', 50000, '', 1, 0, 0),
(22, 3, 'CRM-72985447', '2021-06-18', '2021-06-20', '0', 50000, '', 1, 0, 0),
(23, 3, 'CRM-48616227', '2021-06-18', '2021-06-20', '0', 50000, '', 1, 0, 0),
(24, 3, 'CRM-00187970', '2021-06-18', '2021-06-20', '0', 50000, '', 1, 1, 0),
(25, 3, 'CRM-52588643', '2021-06-18', '2021-06-20', '0', 45000, '', 1, 0, 0),
(26, 3, 'CRM-97256380', '2021-06-18', '2021-06-20', '0', 45000, '', 1, 0, 0);

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
-- Table structure for table `tbl_pos`
--

CREATE TABLE `tbl_pos` (
  `id_pos` int(11) NOT NULL,
  `nama_pos` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pos`
--

INSERT INTO `tbl_pos` (`id_pos`, `nama_pos`, `deskripsi`, `gambar`) VALUES
(1, 'Cigowong', '(Cigowong) memiliki lahan yang luas dengan dikelilingi banyak pepohonan besar, di Pos ini juga anda akan menemukan warung untuk istirahat dan membeli bahan-bahan untuk persiapan pendakian apabila anda lupa membeli barang tersebut atau tertinggal. Untuk trek Pos 1 (Cigowong) didominasi trek yang menanjak dan mungkin merupakan trek yang panjang dan melelahkan bagi anda.', '0bf4b1338d22a8ee66b33e880a23ca60.jpeg'),
(2, 'Kuta', '(Kuta) ketinggian 1575 mdpl, untuk perjalanan dari Pos 1 menuju Pos 2 membutuhkan estimasi waktu 30 menit dengan trek yang terus menanjak jadi akan tetap terasa melelahkan. Di pos ini anda hanya bisa beristirahat sejenak apabila anda kelelahan, di Pos ini memiliki lahan yang kecil jadi anda tidak bisa berlama-lama istirahat di pos ini karena akan mengganggu para pendaki lain yang lewat.', 'd07cff37bf5785d5afc0f09add893068.jpeg'),
(3, 'Pangguyangan Badak', '(Pangguyangan Badak) dengan ketinggian 1800 mdpl. Perjalanan dari Pos 2 menuju Pos 3 membutuhkan estimasi waktu 45 menit. Trek menuju Pos 3 anda akan melewati jalan yang lumayan landai namun sedikit memutar. Trek dengan pepohonan yang rimbun juga harus selalu tetap diwaspadai.', '3cc5f6d43fd787cdf2f32d9a9065c277.jpeg'),
(4, 'Arban', '(Arban) dengan ketinggian 2050 mdpl. Trek menuju Pos 4 cukup melelahkan karena jalurnya sebagian besar menanjak dan estimasi waktu yang dibutuhkan menuju Pos 4 adalah 1 jam. Di Pos ini memiliki jalur yang cukup luas untuk anda beristirahat.', 'fe9f421fb87c58b1e971a7b3a6f3db10.jpeg'),
(5, 'Asoy', '(Asoy) dengan ketinggian 2108 mdpl. Trek ini merupakan trek yang cukup liar karena jalurnya yang menanjak dan sedikit bebatuan membuat trek ini cukup berat untuk dilewati. Pendakian dari Pos 4 menuju Pos 5 membutuhkan estimasi waktu 30 menit dengan tanjakannya yang extrim.', '2533758d280e5140dc714ada4473c2b8.jpeg'),
(6, 'Pasanggrahan', '(Pasanggrahan) dengan trek yang masih terus menanjak. Ketinggian pada Pos ini adalah 2200 mdpl dan estimasi yang dibutuhkan 1 jam pendakian. Pos 6 ini memiliki lahan yang luas dengan kondisi tanah yang cukup rata walaupun agak sedikit naik, biasanya Pos ini dijadikan tempat perkemahan untuk para pendaki yang kelelahan.', '62ae632f0ce30661e9d971ec79fda81a.jpeg'),
(7, 'Sanghyang Ropoh', '(Sanghyang Ropoh) dengan ketinggian 2650 mdpl. Pendakian menuju Pos 7 membutuhkan estimasi waktu 1 jam dengan trek yang masih terus menanjak dan exstrim karena akan banyak bebatuan yang sangat besar bekas lava sepanjang pendakian. Di Pos ini juga kita akan menjumpai percabangan dari jalur Apuy yang dinamakan simpang Apuy.', '61d99d982e36f9c2c44e99ad407b3035.jpeg'),
(8, 'Goa Walet', '(Goa walet) memerlukan estimasi waktu pendakian 1 jam dengan trek yang masih menanjak. Lahan dari Pos ini cukup luas untuk beristirahat, tapi tidak disarankan untuk camp / mendirikan tenda.', 'a3593d5f6c98c14091493d3c260955dd.jpeg');

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
-- Dumping data for table `tbl_sub_menu`
--

INSERT INTO `tbl_sub_menu` (`id_sub_menu`, `id_menu`, `nama_sub_menu`, `icon_sub_menu`, `url_sub_menu`, `is_active`) VALUES
(1, 8, 'Gambar', 'fa fa-image', 'c_dashboard/interface_gambar', 1),
(2, 8, 'Tentang', 'fa fa-info', 'c_dashboard/interface_tentang', 1),
(3, 8, 'Pos', 'fa fa-map-marker', 'c_dashboard/interface_pos', 1),
(4, 8, 'Aturan', 'fa fa-list', 'c_dashboard/interface_aturan', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_chat`
-- (See below for the actual view)
--
CREATE TABLE `v_chat` (
`nama` varchar(100)
,`id_customer` int(11)
,`id_admin` int(11)
,`timestamp` timestamp
,`pesan` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_order`
-- (See below for the actual view)
--
CREATE TABLE `v_order` (
`id_order` int(11)
,`nama` varchar(100)
,`tanggal_lahir` date
,`alamat` text
,`jk` enum('L','P')
,`jenis_identitas` enum('KTP','KTM','SIM','KK','Passport')
,`no_identitas` varchar(50)
,`no_handphone` varchar(50)
,`email` varchar(50)
,`kode_order` varchar(50)
,`tanggal_naik` varchar(50)
,`tanggal_turun` varchar(50)
,`harga` int(11)
,`status_order` char(1)
,`bukti_pembayaran` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `v_chat`
--
DROP TABLE IF EXISTS `v_chat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_chat`  AS SELECT `c`.`nama` AS `nama`, `ch`.`id_customer` AS `id_customer`, `ch`.`id_admin` AS `id_admin`, `ch`.`timestamp` AS `timestamp`, `ch`.`pesan` AS `pesan` FROM (`tbl_customer` `c` join `tbl_chat` `ch` on(`c`.`id_customer` = `ch`.`id_customer`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_order`
--
DROP TABLE IF EXISTS `v_order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_order`  AS SELECT `o`.`id_order` AS `id_order`, `c`.`nama` AS `nama`, `c`.`tanggal_lahir` AS `tanggal_lahir`, `c`.`alamat` AS `alamat`, `c`.`jk` AS `jk`, `c`.`jenis_identitas` AS `jenis_identitas`, `c`.`no_identitas` AS `no_identitas`, `c`.`no_handphone` AS `no_handphone`, `c`.`email` AS `email`, `o`.`kode_order` AS `kode_order`, `o`.`tanggal_naik` AS `tanggal_naik`, `o`.`tanggal_turun` AS `tanggal_turun`, `o`.`harga` AS `harga`, `o`.`status_order` AS `status_order`, `o`.`bukti_pembayaran` AS `bukti_pembayaran` FROM (`tbl_order` `o` join `tbl_customer` `c` on(`o`.`id_customer` = `c`.`id_customer`)) ;

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
-- Indexes for table `tbl_interface`
--
ALTER TABLE `tbl_interface`
  ADD PRIMARY KEY (`id_interface`);

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
-- Indexes for table `tbl_pos`
--
ALTER TABLE `tbl_pos`
  ADD PRIMARY KEY (`id_pos`);

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
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_interface`
--
ALTER TABLE `tbl_interface`
  MODIFY `id_interface` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kuota`
--
ALTER TABLE `tbl_kuota`
  MODIFY `id_kuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_menu_admin`
--
ALTER TABLE `tbl_menu_admin`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_pos`
--
ALTER TABLE `tbl_pos`
  MODIFY `id_pos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_sub_menu`
--
ALTER TABLE `tbl_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
