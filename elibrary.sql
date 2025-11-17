-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2025 at 03:34 AM
-- Server version: 8.0.43
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `penulis` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `tahun_terbit` int DEFAULT NULL,
  `sinopsis` text COLLATE utf8mb4_general_ci,
  `penerbit` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stok_buku` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `penulis`, `tahun_terbit`, `sinopsis`, `penerbit`, `stok_buku`) VALUES
(3, 'ret', 'ret', 3456, '4ergrgrgrvrrgvbrbgbrg', NULL, 0),
(4, 'misteri pembunuhan zombie', 'agatha', 2000, 'ksmkasmzsdmnjksdfnjzdfnjzsfn', NULL, 0),
(10, 'pap', 'pap', 2345, 'papa', 'papi', 4),
(12, 'sdsdccdcsda', 'acscacsdcadcad', 2345, 'acascascadcadcas', 'casdcacascas', 3),
(14, 'lam', 'lam', 2345, 'lamlamlam', 'lamma', 45),
(17, 'far', 'far', 2345, 'far far FARRRR away', 'far', 41);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `nama_lengkap` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `age` int NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `asal_sekolah` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `notelp` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenjang` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kota` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`nama_lengkap`, `username`, `age`, `email`, `password`, `asal_sekolah`, `notelp`, `jenjang`, `kota`) VALUES
('aa', 'aa', 12, 'a@a', '12', '', '', '', ''),
('eedvdada d', 'adda da ad', 34, 'sccsaACS@A', 'SDCDSADC', '', '', '', ''),
('Jason Sieman', 'BLACKGARLIC', 1, 'MMMMMM@ng', '8', 'ST LOUSIIASCJASCVAS', '000', 'Kuliah', 'JOSHUa'),
('cab', 'cab', 2, 'cab@a', 'cab', 'cab', '1234', 'Kuliah', 'cab'),
('fam', 'fam', 34, 'fam@a', 'fam', '', '', '', ''),
('far', 'far', 25, 'far@a', 'far', 'petra', '234', 'SD', 'dfr'),
('gah', 'gah', 45, 'gah@gmail.com', 'gah', 'gah', '234', 'SMA', 'gah'),
('Ivan', 'Ivan', 18, 'ivansmart@gmail.com', '1234567890', 'Petra 1', '0987654321', 'SMA', 'Surabaya'),
('jaj', 'jaj', 34, 'jaj@a', 'jaj', '', '', '', ''),
('jasop', 'jasom', 23, 'jasom@gmail.com', 'jas', 'p', '34', 'SMA', 'we'),
('kam', 'kam', 45, 'kam@a', 'kam', '', '', '', ''),
('lam', 'lam', 45, 'lam@a', 'lam', 'lam', '234', 'SMA', 'lam'),
('lim', 'lim', 1, 'lim@a', 'LIM', 'LIM', '89726373736', 'SD', 'lim'),
('mam', 'man', 24, 'man@gmail.com', 'man', 'manan', '12345', 'Kuliah', 'man'),
('p', 'p', 34, 'p@a', 'p', '', '', '', ''),
('pam', 'pam', 90, 'pam@gmail.com', 'pam', 'pam', '098', 'SMP', 'pam'),
('pan', 'pan', 32, 'pan@a', 'pan', 'cacasda', '23455', 'SMP', 'cdcsdcdscdscdscd'),
('pap', 'pap', 98, 'pap@a', 'pap', '', '', '', ''),
('rae', 'rae', 5, 'rae@a', 'rae', '', '', '', ''),
('ret', 'ret', 34, 'ret@gmail.com', 'ret', 'ret', '345', 'SMA', 'ret'),
('selfie', 'sel', 17, 'sel@gmail.com', 'selfie', 'frateran', '1234567', 'SMA', 'pontianak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
