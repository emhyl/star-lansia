-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 02, 2023 at 02:36 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kka`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bantuan`
--

CREATE TABLE `tbl_bantuan` (
  `id` int(11) NOT NULL,
  `id_lansia` int(11) DEFAULT NULL,
  `bulan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bantuan`
--

INSERT INTO `tbl_bantuan` (`id`, `id_lansia`, `bulan`) VALUES
(1, NULL, 12),
(6, 4, 1),
(7, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donasi`
--

CREATE TABLE `tbl_donasi` (
  `id` int(11) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_donasi`
--

INSERT INTO `tbl_donasi` (`id`, `no_rek`, `atas_nama`) VALUES
(1, 'XXXX-XXXX-XXXX-XXX', 'ATAS NAMA XXXX');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_galeri`
--

CREATE TABLE `tbl_galeri` (
  `id` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`id`, `gambar`) VALUES
(3, 'Screenshot_from_2023-01-02_07-22-35.png'),
(4, '91.png'),
(5, '10.png'),
(6, '8.png'),
(7, '7.png'),
(8, '6.png'),
(9, '5.png'),
(10, '4.png'),
(12, '3.png'),
(13, '1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komunitas`
--

CREATE TABLE `tbl_komunitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_komunitas`
--

INSERT INTO `tbl_komunitas` (`id`, `nama`, `kontak`, `foto`) VALUES
(2, 'dulcolax', '1212', 'bg.jpeg'),
(4, 'asa', '089989989', 'Untitled_design.png'),
(5, 'user', '90909', 'bg3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lansia`
--

CREATE TABLE `tbl_lansia` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `foto_ktp` varchar(50) NOT NULL,
  `NIK` int(20) NOT NULL,
  `foto_rumah` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lansia`
--

INSERT INTO `tbl_lansia` (`id`, `nama`, `tgl_lahir`, `alamat`, `foto_ktp`, `NIK`, `foto_rumah`, `status`) VALUES
(3, 'p', '2022-12-26', 'x', '60174359.png', 12121, 'CAPIL.png', 'terima'),
(4, 'q', '2023-12-01', 'asa', 'Untitled_design1.png', 121, 'bg_alda.png', 'terima');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bantuan`
--
ALTER TABLE `tbl_bantuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lansia` (`id_lansia`);

--
-- Indexes for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_komunitas`
--
ALTER TABLE `tbl_komunitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lansia`
--
ALTER TABLE `tbl_lansia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bantuan`
--
ALTER TABLE `tbl_bantuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_komunitas`
--
ALTER TABLE `tbl_komunitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_lansia`
--
ALTER TABLE `tbl_lansia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bantuan`
--
ALTER TABLE `tbl_bantuan`
  ADD CONSTRAINT `tbl_bantuan_ibfk_1` FOREIGN KEY (`id_lansia`) REFERENCES `tbl_lansia` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
