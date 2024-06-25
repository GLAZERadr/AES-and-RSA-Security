-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2024 at 07:15 PM
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
-- Database: `sistem_pengamanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `avalanche_effect`
--

CREATE TABLE `avalanche_effect` (
  `id_avalanche` int(11) NOT NULL,
  `input_koordinat` varchar(20) NOT NULL,
  `ciphertext_input` varchar(20) NOT NULL,
  `input_modifikasi` varchar(20) NOT NULL,
  `ciphertext_input_modif` varchar(20) NOT NULL,
  `perbedaan_cipher` varchar(20) NOT NULL,
  `persentase_perbedaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datalokasi`
--

CREATE TABLE `datalokasi` (
  `id` int(5) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_dekripsi`
--

CREATE TABLE `data_dekripsi` (
  `id` int(5) NOT NULL,
  `lat_dekrip` varchar(30) NOT NULL,
  `long_dekrip` varchar(30) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_enkripsi`
--

CREATE TABLE `data_enkripsi` (
  `id` int(5) NOT NULL,
  `lat_enkrip` text NOT NULL,
  `long_enkrip` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entrophy`
--

CREATE TABLE `entrophy` (
  `id_entrophy` int(11) NOT NULL,
  `lat_en` text NOT NULL,
  `long_en` text NOT NULL,
  `secret_key` text NOT NULL,
  `entrophy_lat` varchar(200) NOT NULL,
  `entrophy_long` text NOT NULL,
  `entrophy_secret_key` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performa_sistem`
--

CREATE TABLE `performa_sistem` (
  `id_performa` int(11) NOT NULL,
  `banyak_data` varchar(20) NOT NULL,
  `waktu_tanpa_algo` varchar(20) NOT NULL,
  `waktu_dengan_algo` varchar(20) NOT NULL,
  `peningkatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avalanche_effect`
--
ALTER TABLE `avalanche_effect`
  ADD PRIMARY KEY (`id_avalanche`);

--
-- Indexes for table `datalokasi`
--
ALTER TABLE `datalokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_dekripsi`
--
ALTER TABLE `data_dekripsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_enkripsi`
--
ALTER TABLE `data_enkripsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entrophy`
--
ALTER TABLE `entrophy`
  ADD PRIMARY KEY (`id_entrophy`);

--
-- Indexes for table `performa_sistem`
--
ALTER TABLE `performa_sistem`
  ADD PRIMARY KEY (`id_performa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avalanche_effect`
--
ALTER TABLE `avalanche_effect`
  MODIFY `id_avalanche` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datalokasi`
--
ALTER TABLE `datalokasi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_dekripsi`
--
ALTER TABLE `data_dekripsi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_enkripsi`
--
ALTER TABLE `data_enkripsi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entrophy`
--
ALTER TABLE `entrophy`
  MODIFY `id_entrophy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `performa_sistem`
--
ALTER TABLE `performa_sistem`
  MODIFY `id_performa` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
