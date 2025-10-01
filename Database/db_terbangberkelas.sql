-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2023 at 09:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_terbangberkelas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `kode_booking` varchar(6) NOT NULL COMMENT 'Primary Key Booking',
  `asal_penerbangan` varchar(30) NOT NULL,
  `tujuan_penerbangan` varchar(30) NOT NULL,
  `maskapai` varchar(30) NOT NULL,
  `jumlah_penumpang` int(1) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `tgl_keberangkatan` date NOT NULL,
  `wkt_keberangkatan` varchar(5) NOT NULL,
  `harga_tiket` int(50) NOT NULL,
  `total_harga` int(100) NOT NULL,
  `id_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`kode_booking`, `asal_penerbangan`, `tujuan_penerbangan`, `maskapai`, `jumlah_penumpang`, `kelas`, `tgl_keberangkatan`, `wkt_keberangkatan`, `harga_tiket`, `total_harga`, `id_pesanan`) VALUES
('0ARBZC', 'Jakarta (CGK)', 'Bengkulu (BKS)', 'Kikiw Air', 2, 'Ekonomi', '2023-04-18', '09:00', 1217000, 2434000, 6),
('6OHDAZ', 'Bengkulu (BKS)', 'Yogyakarta (JOG)', 'Rukiko', 1, 'First', '2023-07-20', '08:00', 5519000, 5519000, 10),
('916SVX', 'Denpasar Bali (KNO)', 'Jakarta (CGK)', 'Citilink', 2, 'First', '2023-07-14', '12:30', 8790000, 17580000, 5),
('D04BHJ', 'Makassar (UPG)', 'Denpasar Bali (KNO)', 'Kikiw Air', 3, 'Premium Ekonomi', '2023-04-19', '06:40', 1301000, 3903000, 4),
('L8IOND', 'Yogyakarta (JOG)', 'Bengkulu (BKS)', 'Rukiko', 2, 'Bisnis', '2023-05-22', '14:20', 2352000, 4704000, 3),
('P1A09L', 'Jakarta (CGK)', 'Bengkulu (BKS)', 'Lanlink', 1, 'Ekonomi', '2023-04-18', '18:20', 574000, 574000, 8),
('SF3GYL', 'Jakarta (CGK)', 'Bengkulu (BKS)', 'Kikiw Air', 1, 'Ekonomi', '2023-04-18', '23:50', 1217000, 1217000, 9),
('YNA5GM', 'Jakarta (CGK)', 'Palembang (PLM)', 'Garuda Indonesia', 1, 'Ekonomi', '2023-04-10', '22:40', 1178000, 1178000, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penumpang`
--

CREATE TABLE `tb_penumpang` (
  `id_pesanan` int(11) NOT NULL,
  `nik_penumpang` varchar(30) NOT NULL,
  `nama_penumpang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penumpang`
--

INSERT INTO `tb_penumpang` (`id_pesanan`, `nik_penumpang`, `nama_penumpang`) VALUES
(3, '010101', 'Cika Golda Putri Ame'),
(5, '0901029', 'Skidiw'),
(3, '090909', 'Muhamad Dwirizqy Wimbassa'),
(10, '0928137', 'Kikiw Tampan Aduh'),
(4, '123453', 'Joker'),
(4, '123664', 'Jokur'),
(4, '238519', 'Jokis'),
(6, '5101791234', 'Abdullah Farauk'),
(6, '5101791235', 'Mohammad Farhan'),
(5, '7539372', 'Skbure');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `nama_pemesan` varchar(200) NOT NULL,
  `email_pemesan` varchar(200) NOT NULL,
  `tlp_pemesan` varchar(15) NOT NULL,
  `jumlah_penumpang` int(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `nama_pemesan`, `email_pemesan`, `tlp_pemesan`, `jumlah_penumpang`, `id`) VALUES
(3, 'Muhamad Dwirizqy Wimbassa', 'kikicupa68@gmail.com', '085357854791', 2, 16),
(4, 'Joker Slebew', 'jokerkeren@joker.com', '092012381', 3, 16),
(5, 'Skidiw Biridiw', 'skidede@skimail.com', '0854274821265', 2, 14),
(6, 'Abdullah Farauk', 'abdullahfarauk@gmail.com', '087858057333', 2, 1),
(7, 'Abdullah Farauk', 'abdullahfarauk@gmail.com', '087858057333', 1, 44),
(8, 'Abdullah Farauk', 'abdullahfarauk@gmail.com', '087858057333', 1, 44),
(9, 'Abdullah Farauk', 'farauk@gmail.com', '087812341234', 1, 44),
(10, 'Kikiw Tampan', 'tampanbener123@gmail.com', '085357854444', 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rating`
--

CREATE TABLE `tb_rating` (
  `id_rating` int(11) NOT NULL,
  `star` int(1) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `kode_booking` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rating`
--

INSERT INTO `tb_rating` (`id_rating`, `star`, `comments`, `kode_booking`) VALUES
(18, 5, 'Anjay bisa sehebat ini', 'YNA5GM');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `email`, `password_hash`) VALUES
(1, 'Abdullah Farauk', 'abdullahfarauk@gmail.com', '$2y$10$6U4wxUFPSisneJ1.bHi46.t9vqOgL2AK8t8AFq/WUpNh5rKOB5mGy'),
(4, 'Starden Bart', 'alicizational@gmail.com', '$2y$10$4eddeV9tejfG4zdjMF8XR.ULt7n.va7lI/X/gfAxLRcA5VhvCHCLy'),
(5, 'Jokowi', 'jokowi@gmail.com', '$2y$10$/1onW8hOhpvR.ZgpmnC69e4DpT1QGHZicKcIAXTekU4U.3sBmqWXC'),
(7, 'Ahmad Burhan', 'burhan@gmail.com', '$2y$10$3XK7xOtBgz.ssKUJkRqQtuePdCRaFr2BroquH38113kxE8ovLnJXO'),
(8, 'Abel Bintang', 'abelganteng@gmail.com', '$2y$10$lgTwvyfDOIw5KPMKl9GtPeKMxDvKYzajlqAydri5ROjHFirVRGLWm'),
(9, 'Testing', 'test@gmail.com', '$2y$10$h9.QFF1dwsImx.AhaUq.1eCSl77mXip0N5ulej4CD0icgFumi9QI6'),
(10, 'Kikiw Ganteng', 'kiki@gmail.com', '$2y$10$ki4TNuNlqxgTJbsv.EG4aOZfNjQwqskFy3tCHs.FQTYrj81krnnrm'),
(13, 'Slebew', 'slebew@gmail.com', '$2y$10$OwD.VDUcEcZOIR1BFnovLu8Tk15yqWaXam/oj3.cvcirP2Iimv9ky'),
(14, 'ski', 'ski@gmail.com', '$2y$10$2GR3Yf3dw8cwPZjpr3swvuBtJPyX0maGp7bpxtLJpSyyzQM76aoHm'),
(15, 'joker', 'jokerindo@gmail.com', '$2y$10$WMaycivDQLoByiUD3mX3ousIP1L0mf/w22t/Z0aDedyBtx2cmqHWi'),
(16, 'Skuy', 'sku@gmail.com', '$2y$10$uvvmpgs7ERBGWw.ve9Tee.NNKLCFLWhjl9iikC5vJhhiU44.zRzKu'),
(39, 'kakarot', 'kakarot@gmail.com', '$2y$10$IHeQ4AGLZ5R/iz8f4vE2t.CxdlydxTYP.J3H1eMpb/e5WllAIlyS2'),
(44, 'Farauk', 'farauk@gmail.com', '$2y$10$4x8LNG/WE6bEpXYjC94vAeQX/5PliRMfjBdkTtDXWRt42/3DPDUQ.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`kode_booking`),
  ADD KEY `tb_booking_ibfk_1` (`id_pesanan`);

--
-- Indexes for table `tb_penumpang`
--
ALTER TABLE `tb_penumpang`
  ADD PRIMARY KEY (`nik_penumpang`),
  ADD KEY `tb_penumpang_ibfk_1` (`id_pesanan`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `tb_pesanan_ibfk_1` (`id`);

--
-- Indexes for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `kode_booking` (`kode_booking`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD CONSTRAINT `tb_booking_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `tb_pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penumpang`
--
ALTER TABLE `tb_penumpang`
  ADD CONSTRAINT `tb_penumpang_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `tb_pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD CONSTRAINT `tb_pesanan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD CONSTRAINT `tb_rating_ibfk_1` FOREIGN KEY (`kode_booking`) REFERENCES `tb_booking` (`kode_booking`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
