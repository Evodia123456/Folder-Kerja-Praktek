-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2021 at 10:05 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cobakip`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_softskil`
--

CREATE TABLE `daftar_softskil` (
  `id_daftar` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `bukti` text NOT NULL,
  `total_poin` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ipk`
--

CREATE TABLE `ipk` (
  `id_ipk` int(11) NOT NULL,
  `ipk_mhs` float NOT NULL,
  `semester` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `jenis_id` int(11) NOT NULL,
  `nama_jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`jenis_id`, `nama_jenis`) VALUES
(8, 'Lomba Bidang Keilmuan'),
(9, 'Lomba bidang Non-Akademik'),
(10, 'Lomba Event Dengan Banyak Kategori Penghargaan'),
(17, 'Penghargaan'),
(21, 'Kepanitiaan'),
(22, 'Seminar'),
(25, 'Kegiatan Wajib'),
(26, 'Kegiatan Optional'),
(27, 'Pelatihan Skill'),
(30, 'Kerja Praktek'),
(31, 'Bekerja'),
(32, 'Berwirausaha'),
(33, 'Asisten Dosen Di Luar Tugas Khusus'),
(34, 'Penelitian Dosen'),
(35, 'Pengabdian Masyarakat Dosen'),
(36, 'Pelayanan Gereja'),
(37, 'Pemenang Hibah'),
(39, 'Keorganisasian');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `jenis` varchar(200) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` enum('''Laki-laki''','''Perempuan''','','') NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `id_ipk` int(11) DEFAULT NULL,
  `gambar` text NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `jk`, `alamat`, `tgl_lahir`, `id_ipk`, `gambar`, `email`, `password`) VALUES
(1, 1742101599, 'Evodia', '\'Perempuan\'', 'kkk', '2020-09-22', 0, '', NULL, NULL),
(2, 34634195, 'Joko', '\'Laki-laki\'', 'dkjhfdfhdlk', '2020-12-30', 334, '', NULL, NULL),
(3, 1742101599, 'aku', '', 'wewe', '2021-01-11', 3, '', 'evodiasusanti@gmail.come', '$2y$10$HYGuXmAQbPxJxHqhxxrsTO8P.ZJpec3BhRx/agdtL5Dj1b4ulCkGC'),
(4, 1742101599, 'mmk', '', 'wdasda', '2021-01-13', 3, '', 'ainkawaii2303@gmail.com', '$2y$10$N/raTToU4Mg1l7jlv.jFxO4F5IJMZQ/Wff5rVF.n3SB/X/Wy8yjH6'),
(5, 2147483647, 'sdsdsad', '', 'sdsadsadsadsa', '2021-01-25', 3, '', 'de@gmail.com', '$2y$10$XuyEjZIQSUZBo2qwFVniFeoO1BFq3u2/EY8LW4XEmjuH.pi37ccC.');

-- --------------------------------------------------------

--
-- Table structure for table `perolehan`
--

CREATE TABLE `perolehan` (
  `id_perolehan` int(11) NOT NULL,
  `nama_perolehan` varchar(100) NOT NULL,
  `poin` int(50) NOT NULL,
  `tingkat_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perolehan`
--

INSERT INTO `perolehan` (`id_perolehan`, `nama_perolehan`, `poin`, `tingkat_id`) VALUES
(21, 'Juara Umum', 16, 21),
(23, 'Penghargaan Emas dan setara', 10, 21),
(25, 'Penghargaan Perak dan setara', 8, 21),
(27, 'Penghargaan Perunggu dan setara', 7, 21),
(29, 'Juara Umum', 14, 23),
(31, 'Penghargaan Emas dan setara', 8, 23),
(33, 'Penghargaan Perak dan setara', 7, 23),
(35, 'Penghargaan Perunggu dan setara', 6, 23),
(37, 'Juara Umum', 10, 24),
(39, 'Penghargaan Emas dan setara', 6, 24),
(41, 'Penghargaan Perak dan setara', 5, 24),
(43, 'Penghargaan Perunggu dan setara', 4, 24),
(45, 'Mendapatkan', 20, 25),
(47, 'Nominasi/Kandidat', 10, 25),
(49, 'Mendapatkan', 15, 26),
(51, 'Nominasi/Kandidat', 7, 26),
(53, 'Mendapatkan', 10, 27),
(55, 'Ketua/Ketua Umum', 10, 29),
(57, 'Wakil Ketua Bidang', 8, 29),
(59, 'Sekretaris/Koordinator', 7, 29),
(61, 'Anggota', 5, 29),
(63, 'Ketua/Ketua Umum', 8, 30),
(66, 'Wakil Ketua Bidang', 7, 30),
(67, 'Sekretaris/Koordinator', 6, 30),
(69, 'Anggota', 4, 30),
(71, 'Pemakalah/Pembicara', 15, 33),
(73, 'Peserta ', 4, 33),
(75, 'Pemakalah/Pembicara', 10, 34),
(77, 'Peserta', 3, 34),
(79, 'Peserta', 6, 39),
(81, 'Peserta', 6, 40),
(83, 'Peserta', 3, 41),
(87, 'Peserta', 6, 42),
(91, 'Peserta, frekuensi 10-20 jam', 7, 47),
(95, 'Peserta', 5, 48),
(97, 'Staff Part-Time', 5, 50),
(99, 'Staff Part-Time', 3, 51),
(101, 'Pemilik', 15, 51),
(103, 'Pemilik', 12, 50),
(105, 'Asisten', 7, 58),
(107, 'Anggota', 7, 60),
(109, 'Anggota', 7, 62),
(111, 'Pelayan/Tahun', 6, 64),
(113, 'Lolos', 20, 68),
(115, 'Lolos', 10, 69),
(117, 'Lolos', 8, 70),
(119, 'Ketua/Ketua Umum', 18, 73),
(121, 'Wakil Ketua Bidang', 15, 73),
(123, 'Sekretaris/Koordinator', 14, 73),
(125, 'Anggota', 10, 73),
(127, 'Ketua/Ketua Umum', 15, 75),
(129, 'Wakil Ketua Bidang', 13, 75),
(131, 'Sekretaris/Koordinator', 11, 75),
(133, 'Anggota', 8, 75),
(135, 'Peserta, frekuensi < 10 jam', 4, 71),
(147, 'Juara 1', 16, 9),
(149, 'Juara 2', 12, 9),
(151, 'Juara 3', 10, 9),
(153, 'Finalis 10 Besar (Peserta>10)', 6, 9),
(155, 'Peserta', 4, 9),
(157, 'Juara 1', 12, 10),
(159, 'Juara 2', 10, 10),
(161, 'Juara 3', 8, 10),
(163, 'Finalis 10 Besar (Peserta>10)', 4, 10),
(165, 'Peserta', 3, 10),
(167, 'Juara 1', 8, 11),
(169, 'Juara 2', 7, 11),
(171, 'Juara 3', 6, 11),
(173, 'Finalis 10 Besar (Peserta>10)', 3, 11),
(175, 'Peserta', 3, 11),
(177, 'Juara 1', 16, 12),
(179, 'Juara 2', 14, 12),
(181, 'Juara 3', 12, 12),
(183, 'Finalis 10 Besar (Peserta>10)', 7, 12),
(185, 'Peserta', 4, 12),
(187, 'Juara 1', 14, 18),
(189, 'Juara 2', 12, 18),
(192, 'Juara 3', 10, 18),
(193, 'Finalis 10 Besar (Peserta>10)', 5, 18),
(195, 'Peserta', 3, 18),
(197, 'Juara 1', 12, 19),
(199, 'Juara 2', 10, 19),
(201, 'Juara 3', 8, 19),
(203, 'Finalis 10 Besar (Peserta>10)', 4, 19),
(205, 'Peserta', 3, 19),
(207, 'Juara 1', 10, 20),
(209, 'Juara 2', 8, 20),
(211, 'Juara 3', 8, 20),
(213, 'Finalis 10 Besar (Peserta>10)', 4, 20),
(215, 'Peserta', 3, 20),
(222, 'Juara 1', 20, 7),
(223, 'Juara 2', 17, 7),
(224, 'Juara 3', 14, 7),
(225, 'finalis 10 Besar(Peserta>10)', 8, 7),
(226, 'Peserta', 6, 7),
(227, 'Peserta, frekuensi >= 20 jam', 10, 46),
(228, 'Peserta, frekuensi 10-20 jam', 7, 46),
(229, 'Peserta, frekuensi < 10 jam', 4, 46);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(11) NOT NULL,
  `tingkat_semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `softskill`
--

CREATE TABLE `softskill` (
  `id_softskill` int(11) NOT NULL,
  `mahasiswa` int(11) NOT NULL,
  `nm_kegiatan` text NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `tingkat` int(11) NOT NULL,
  `id_perolehan` int(11) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `gambar` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `softskill`
--

INSERT INTO `softskill` (`id_softskill`, `mahasiswa`, `nm_kegiatan`, `id_jenis`, `tingkat`, `id_perolehan`, `tgl_kegiatan`, `gambar`) VALUES
(22, 2, 'Joko Seminar game AI', 31, 50, 97, '2020-12-22', NULL),
(29, 1, 'komi', 22, 34, 77, '2020-12-26', NULL),
(30, 1, '', 36, 64, 111, '0000-00-00', NULL),
(31, 2, 'The House', 34, 60, 107, '2020-12-09', NULL),
(32, 1, 'pu', 31, 51, 99, '2021-01-29', NULL),
(33, 1, 'mmm', 35, 62, 109, '2021-01-09', NULL),
(34, 4, 'Evodia Susanti Hondr', 9, 12, 179, '2021-01-11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tingkat`
--

CREATE TABLE `tingkat` (
  `tingkat_id` int(11) NOT NULL,
  `nama_tingkat` varchar(100) NOT NULL,
  `jenis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tingkat`
--

INSERT INTO `tingkat` (`tingkat_id`, `nama_tingkat`, `jenis_id`) VALUES
(7, 'Internasional', 8),
(9, 'Nasional', 8),
(10, 'Provinsi', 8),
(11, 'Lokal', 8),
(12, 'Internasional', 9),
(18, 'Nasional', 9),
(19, 'Provinsi', 9),
(20, 'Lokal', 9),
(21, 'Internasional', 10),
(23, 'Nasional', 10),
(24, 'Lokal', 10),
(25, 'Internasional', 17),
(26, 'Nasional', 17),
(27, 'Lokal', 17),
(29, 'Internasional', 21),
(30, 'Nasional/Lokal', 21),
(33, 'Internasional', 22),
(34, 'Nasional/Lokal', 22),
(39, 'PK2MB', 25),
(40, 'Seminar FIT', 25),
(41, 'MAKRAB', 25),
(42, 'LAMP/English Camp', 26),
(46, 'Akademik maupun Non-Akademik', 27),
(47, 'Akademik maupun Non-Akademik', 27),
(48, 'Perusahaan Tbk atau PT', 30),
(50, 'Non-Bidang Ilmu', 31),
(51, 'Memanfaatkan Keilmuan', 31),
(56, 'Memanfaatkan Keilmuan', 32),
(57, 'Non-Bidang Ilmu', 32),
(58, 'Program Studi', 33),
(60, 'Nasional/Lokal', 34),
(62, 'Nasional/Lokal', 35),
(64, 'Nasional', 36),
(68, 'Internasional', 37),
(69, 'Nasional', 37),
(70, 'Daerah', 37),
(71, 'Akademik maupun Non-Akademik', 27),
(73, 'Internasional', 39),
(75, 'Nasional/Lokal', 39);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password_user` varchar(150) NOT NULL,
  `role_user` enum('admin','mahasiswa') NOT NULL,
  `first_login` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `mahasiswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `email_user`, `password_user`, `role_user`, `first_login`, `is_active`, `mahasiswa`) VALUES
(14, 'Evodia', 'evo@gmail.com', '$2y$10$bCkgOlpeVjCsJ8Bb/TWW6.cDlwlXmi3guXMYqoAWwbOKLvvUMSjbm', 'mahasiswa', 1, 1, 1),
(15, 'admin', 'admin@gmail.com', '$2y$10$bCkgOlpeVjCsJ8Bb/TWW6.cDlwlXmi3guXMYqoAWwbOKLvvUMSjbm', 'admin', 1, 1, NULL),
(16, 'joko', 'joko@gmail.com', '$2y$10$bCkgOlpeVjCsJ8Bb/TWW6.cDlwlXmi3guXMYqoAWwbOKLvvUMSjbm', 'mahasiswa', 1, 1, 2),
(17, 'sry angelia', 'sryangelia@gmail.com', '$2y$10$0hBoo5vjDzl8vz4BrH63S.T4lHEdnFjXV/5d2AZo2YlmhqxPIqm3W', 'admin', 0, 1, NULL),
(18, 'Rini', 'rini@gmail.com', '$2y$10$zjo.OaVgwR/f5F3Zuf.UhuDWL8IRPJqaLgYqLpNf8.8iH43At6Xx2', 'admin', 0, 1, NULL),
(19, 'Sriyanti', 'sry@gmail.com', '$2y$10$jpb6XUUv4zftAWRzK2m4R.s6w/mmVypd0zT.Pwmb4lw8GB5kgT3Dy', 'mahasiswa', 0, 1, NULL),
(20, 'Sriiii', 'sryy2@gmail.com', '$2y$10$EdWic6YfQ4WSyADH9Exeb.j3mKsZRScjlvBmYfS/NM9dWZm47yEqO', 'mahasiswa', 0, 1, NULL),
(21, 'Sriiiiiii', 'sry2222@gmail.com', '123123', 'mahasiswa', 1, 1, NULL),
(22, 'Evodia Hondro', 'evodia@gmail.com', '$2y$10$h0zwuKOX9m5zIt7NWy/oCOgWtdXAeK2UkDYXwQS0h9hKu2839CeQO', 'mahasiswa', 0, 1, NULL),
(23, 'vovo', 'vovo@gmail.com', '123123', 'mahasiswa', 0, 0, NULL),
(24, 'ev', 'vovo@gmail.com', '$2y$10$qiSkBkE4XNaiWrE/XPMbWusTnSRMa3J/4Zb48OTZ3jYUEigv2LeOy\r\n', '', 0, 0, NULL),
(25, 'kakak', 'admin1@gmail.com', '$2y$10$p9QiBZhaBc/.H0m6NkhMMu9jLT2KWhiF.K9/Gq6lRQqM3PqiJ6KPe', 'mahasiswa', 0, 0, NULL),
(26, 'vovo', 'evodiasusantinus@gmail.com', '$2y$10$cCKV7cciukPytz92wNOibecvw4F1P2Ha5Np8RPeQH0GoSWprkS.1K', 'mahasiswa', 0, 1, NULL),
(27, 'Liefson Jacobus', 'liefson@ukrimuniversity.ac.id', '$2y$10$MEB1L7yxo9l5SECjlrWRXeyRZbeDhNKrvKwpGvWTQ/vqwN4ydRtV2', 'admin', 1, 1, NULL),
(30, 'Sriyanti', 'sriyanti@student.ukrimuniversity.ac.id', '$2y$10$QegtJl2RwWkJmEyQANjIceVFDWIqXbTaZeD04RZFP/yQ7f.xAtl2y', 'mahasiswa', 1, 1, NULL),
(31, 'evodia', 'test@gmail.com', '$2y$10$zIYJTWwm63H2ri03SAh7pejWGE/UtOBTt9b83uxKqMRhEGT3oIzNC', 'mahasiswa', 0, 1, NULL),
(32, 'er', 'er@gmail.com', '$2y$10$90GIceJnWAU2xAOU65A02.QPK4zYCeYJwYPuA/qLU3W5sFSJbll02', 'admin', 0, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `jenis_id` (`jenis_id`);

--
-- Indexes for table `ipk`
--
ALTER TABLE `ipk`
  ADD PRIMARY KEY (`id_ipk`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `perolehan`
--
ALTER TABLE `perolehan`
  ADD PRIMARY KEY (`id_perolehan`),
  ADD KEY `tingkat_id` (`tingkat_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `softskill`
--
ALTER TABLE `softskill`
  ADD PRIMARY KEY (`id_softskill`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `tingkat` (`tingkat`),
  ADD KEY `id_perolehan` (`id_perolehan`),
  ADD KEY `mahasiswa` (`mahasiswa`);

--
-- Indexes for table `tingkat`
--
ALTER TABLE `tingkat`
  ADD PRIMARY KEY (`tingkat_id`),
  ADD KEY `jenis_id` (`jenis_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `mahasiswa` (`mahasiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ipk`
--
ALTER TABLE `ipk`
  MODIFY `id_ipk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `jenis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `perolehan`
--
ALTER TABLE `perolehan`
  MODIFY `id_perolehan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `softskill`
--
ALTER TABLE `softskill`
  MODIFY `id_softskill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tingkat`
--
ALTER TABLE `tingkat`
  MODIFY `tingkat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`jenis_id`);

--
-- Constraints for table `perolehan`
--
ALTER TABLE `perolehan`
  ADD CONSTRAINT `perolehan_ibfk_1` FOREIGN KEY (`tingkat_id`) REFERENCES `tingkat` (`tingkat_id`);

--
-- Constraints for table `softskill`
--
ALTER TABLE `softskill`
  ADD CONSTRAINT `softskill_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`jenis_id`),
  ADD CONSTRAINT `softskill_ibfk_2` FOREIGN KEY (`tingkat`) REFERENCES `tingkat` (`tingkat_id`),
  ADD CONSTRAINT `softskill_ibfk_3` FOREIGN KEY (`id_perolehan`) REFERENCES `perolehan` (`id_perolehan`),
  ADD CONSTRAINT `softskill_ibfk_4` FOREIGN KEY (`mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`);

--
-- Constraints for table `tingkat`
--
ALTER TABLE `tingkat`
  ADD CONSTRAINT `tingkat_ibfk_1` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`jenis_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
