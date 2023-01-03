-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2021 at 01:57 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market`
--

-- --------------------------------------------------------

--
-- Table structure for table `mandwb`
--

CREATE TABLE `mandwb` (
  `id` int(11) NOT NULL,
  `names` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `phone` varchar(11) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `location` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mandwb`
--

INSERT INTO `mandwb` (`id`, `names`, `phone`, `email`, `location`) VALUES
(2, 'ڕەوەند', '07500006565', 'kurdishga12@gmail.com', 'Sulaymaniyah'),
(4, 'ڕەوەند3', '07500006563', 'rawand_b_18@gmail.com', 'Sulaymaniyah'),
(5, 'saz_company', '07501616219', 'kurdishga13@gmail.com', 'Sulaymaniyah'),
(7, 'رەیان', '07500000000', 'rayankrd@gmail.com', 'Duhok');

-- --------------------------------------------------------

--
-- Table structure for table `paradan`
--

CREATE TABLE `paradan` (
  `id` int(11) NOT NULL,
  `babat` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paradan`
--

INSERT INTO `paradan` (`id`, `babat`, `price`, `date`, `time`) VALUES
(1, 'پارەی مۆلیدە', 80000, '2021-10-13', '05:00:36'),
(2, 'پارەی کارەبا', 81222, '2021-10-23', '05:00:36'),
(3, 'پارەی تەکسی', 5000, '2021-10-26', '05:24:16'),
(4, 'Ø­Û•Ù‚Ù‰ Ú©Ø§Ø±Û•Ø¨Ø§', 25000, '2021-11-27', '09:41:02'),
(5, 'Ø­Û•Ù‚Ù‰ Ú©Ø§Ø±Û•Ø¨Ø§', 25000, '2021-11-27', '11:16:53'),
(6, 'Ø­Û•Ù‚Ù‰ Ú©Ø§Ø±Û•Ø¨Ø§', 25000, '2021-11-28', '11:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `sell_stoks`
--

CREATE TABLE `sell_stoks` (
  `Id` int(11) NOT NULL,
  `Barcode` varchar(20) NOT NULL,
  `Count` int(11) NOT NULL,
  `Prise` int(11) NOT NULL,
  `Date` timestamp NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL COMMENT '1==froshraw & 0==nafroshrawa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sell_stoks`
--

INSERT INTO `sell_stoks` (`Id`, `Barcode`, `Count`, `Prise`, `Date`, `status`) VALUES
(1, '5030940121911', 2, 40000, '2021-12-15 16:30:54', 1),
(2, '152', 6, 7500, '2021-12-17 11:46:04', 1),
(11, '454478795465', 6, 2500, '2021-12-17 12:05:09', 1),
(12, '152', 1, 7500, '2021-12-19 20:43:28', 1),
(13, '152', 1, 7500, '2021-12-19 20:44:28', 1),
(14, '152', 1, 7500, '2021-12-19 20:46:18', 1),
(15, '152', 15, 7500, '2021-12-19 21:13:30', 0),
(16, '5030940121911', 3, 40000, '2021-12-19 21:14:32', 1),
(17, '454478795465', 1, 2500, '2021-12-20 16:43:20', 0),
(18, '083717203063', 23, 8000, '2021-12-21 07:32:22', 0),
(19, '5030940121911', 10, 43000, '2021-12-25 21:01:21', 0),
(20, '4543456', 4, 400000, '2021-12-25 21:57:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) NOT NULL,
  `Barcode` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `nawy_kalla` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `mandwb_id` bigint(20) NOT NULL,
  `nrx_ko` bigint(20) NOT NULL,
  `nrx_froshtn` bigint(20) NOT NULL,
  `count` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `totalFinal` int(11) NOT NULL,
  `expire_date` date NOT NULL,
  `qarz` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `Barcode`, `nawy_kalla`, `mandwb_id`, `nrx_ko`, `nrx_froshtn`, `count`, `total`, `totalFinal`, `expire_date`, `qarz`) VALUES
(6, '083717203063', 'qawa', 5, 59, 7500, 20, 0, 0, '2021-10-25', 0),
(8, '083717203063', 'شیری ئاڵتونسا', 2, 5000, 8000, 20, 0, 0, '2025-06-18', 0),
(9, '5026555416986', 'GTA5', 2, 26000, 35000, 20, 0, 0, '2026-10-26', 0),
(10, '5030940121911', 'FIFA19', 2, 29000, 43000, 20, 0, 0, '2028-09-26', 0),
(11, '64757483', 'shiri altosa', 5, 2500, 3000, 20, 0, 0, '2021-12-16', 0),
(12, '64757483', 'shiri altosan', 5, 2500, 3500, 10, 25000, 0, '2021-12-10', 1),
(13, '4543456', 'pc', 5, 300000, 400000, 3, 50000, 900000, '2021-12-10', 1),
(14, '68767687', 'shiri', 5, 2500, 5000, 10, 15000, 25000, '2021-12-11', 1),
(15, '6475748377', 'شیر', 7, 5000, 5500, 70, 350000, 350000, '2021-12-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `names` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `names`, `email`, `phone_number`, `username`, `password`) VALUES
(1, 'admin', 'admin-server@gmail.com', '07501616219', 'admin', '123'),
(2, 'Rawand', 'kurdishga12@gmail.com', '07501616220', 'rawa_11', '55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mandwb`
--
ALTER TABLE `mandwb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paradan`
--
ALTER TABLE `paradan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_stoks`
--
ALTER TABLE `sell_stoks`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mandwb`
--
ALTER TABLE `mandwb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `paradan`
--
ALTER TABLE `paradan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sell_stoks`
--
ALTER TABLE `sell_stoks`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
