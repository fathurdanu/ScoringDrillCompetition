-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2019 at 11:48 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lbb`
--

-- --------------------------------------------------------

--
-- Table structure for table `juri`
--

CREATE TABLE `juri` (
  `id_juri` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_juri` varchar(30) NOT NULL,
  `posisi_pos` int(1) NOT NULL,
  `kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(6) NOT NULL,
  `nama_peserta` varchar(30) DEFAULT NULL,
  `posisi` varchar(10) NOT NULL,
  `no_punggung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pos1`
--

CREATE TABLE `pos1` (
  `id_penilaian` int(6) NOT NULL,
  `no_punggung` int(7) DEFAULT NULL,
  `id_juri_kekompakan` int(6) DEFAULT NULL,
  `id_juri_kerapian` int(6) DEFAULT NULL,
  `id_juri_teknik` int(6) DEFAULT NULL,
  `id_juri_danton` int(6) DEFAULT NULL,
  `id_juri_kostum` int(6) DEFAULT NULL,
  `id_juri_garis` int(6) DEFAULT NULL,
  `tingkat` varchar(3) DEFAULT NULL,
  `kekompakan` int(3) DEFAULT NULL,
  `kerapian` int(3) DEFAULT NULL,
  `teknik` int(3) DEFAULT NULL,
  `danton` int(3) DEFAULT NULL,
  `kostum` int(3) DEFAULT NULL,
  `garis` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pos2`
--

CREATE TABLE `pos2` (
  `id_penilaian` int(6) NOT NULL,
  `no_punggung` int(7) DEFAULT NULL,
  `id_juri_kekompakan` int(6) DEFAULT NULL,
  `id_juri_kerapian` int(6) DEFAULT NULL,
  `id_juri_teknik` int(6) DEFAULT NULL,
  `id_juri_danton` int(6) DEFAULT NULL,
  `id_juri_garis` int(6) DEFAULT NULL,
  `tingkat` varchar(3) DEFAULT NULL,
  `kekompakan` int(3) DEFAULT NULL,
  `kerapian` int(3) DEFAULT NULL,
  `teknik` int(3) DEFAULT NULL,
  `danton` int(3) DEFAULT NULL,
  `garis` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pos3`
--

CREATE TABLE `pos3` (
  `id_penilaian` int(6) NOT NULL,
  `no_punggung` int(7) DEFAULT NULL,
  `id_juri_kekompakan` int(6) DEFAULT NULL,
  `id_juri_kerapian` int(6) DEFAULT NULL,
  `id_juri_teknik` int(6) DEFAULT NULL,
  `id_juri_danton` int(6) DEFAULT NULL,
  `id_juri_garis` int(6) DEFAULT NULL,
  `tingkat` varchar(3) DEFAULT NULL,
  `kekompakan` int(3) DEFAULT NULL,
  `kerapian` int(3) DEFAULT NULL,
  `teknik` int(3) DEFAULT NULL,
  `danton` int(3) DEFAULT NULL,
  `garis` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pos4`
--

CREATE TABLE `pos4` (
  `id_penilaian` int(6) NOT NULL,
  `no_punggung` int(7) DEFAULT NULL,
  `id_juri_kekompakan` int(6) DEFAULT NULL,
  `id_juri_kerapian` int(6) DEFAULT NULL,
  `id_juri_teknik` int(6) DEFAULT NULL,
  `id_juri_danton` int(6) DEFAULT NULL,
  `id_juri_garis` int(6) DEFAULT NULL,
  `tingkat` varchar(3) DEFAULT NULL,
  `kekompakan` int(3) DEFAULT NULL,
  `kerapian` int(3) DEFAULT NULL,
  `teknik` int(3) DEFAULT NULL,
  `danton` int(3) DEFAULT NULL,
  `garis` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekap`
--

CREATE TABLE `rekap` (
  `rekap` int(7) NOT NULL,
  `pos1` int(7) NOT NULL,
  `pos2` int(7) NOT NULL,
  `pos3` int(7) NOT NULL,
  `pos4` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `no_punggung` int(7) NOT NULL,
  `tingkat` varchar(4) NOT NULL,
  `nama_tim` varchar(30) NOT NULL,
  `asal_sekolah` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `juri`
--
ALTER TABLE `juri`
  ADD PRIMARY KEY (`id_juri`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `fk_id_tim` (`no_punggung`);

--
-- Indexes for table `pos1`
--
ALTER TABLE `pos1`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `fk_1_kekompakan` (`id_juri_kekompakan`),
  ADD KEY `fk_1_kerapian` (`id_juri_kerapian`),
  ADD KEY `fk_1_teknik` (`id_juri_teknik`),
  ADD KEY `fk_1_kostum` (`id_juri_kostum`),
  ADD KEY `fk_1_danton` (`id_juri_danton`),
  ADD KEY `fk_1_garis` (`id_juri_garis`),
  ADD KEY `fk_tim` (`no_punggung`);

--
-- Indexes for table `pos2`
--
ALTER TABLE `pos2`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `fk_2_kekompakan` (`id_juri_kekompakan`),
  ADD KEY `fk_2_kerapian` (`id_juri_kerapian`),
  ADD KEY `fk_2_teknik` (`id_juri_teknik`),
  ADD KEY `fk_2_danton` (`id_juri_danton`),
  ADD KEY `fk_2_garis` (`id_juri_garis`),
  ADD KEY `fk_tim_2` (`no_punggung`);

--
-- Indexes for table `pos3`
--
ALTER TABLE `pos3`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `fk_3_kekompakan` (`id_juri_kekompakan`),
  ADD KEY `fk_3_kerapian` (`id_juri_kerapian`),
  ADD KEY `fk_3_teknik` (`id_juri_teknik`),
  ADD KEY `fk_3_danton` (`id_juri_danton`),
  ADD KEY `fk_3_garis` (`id_juri_garis`),
  ADD KEY `fk_tim_3` (`no_punggung`);

--
-- Indexes for table `pos4`
--
ALTER TABLE `pos4`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `fk_4_kekompakan` (`id_juri_kekompakan`),
  ADD KEY `fk_4_kerapian` (`id_juri_kerapian`),
  ADD KEY `fk_4_teknik` (`id_juri_teknik`),
  ADD KEY `fk_4_danton` (`id_juri_danton`),
  ADD KEY `fk_4_garis` (`id_juri_garis`),
  ADD KEY `fk_tim_4` (`no_punggung`);

--
-- Indexes for table `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`rekap`),
  ADD KEY `fk_no_punggung_pos1` (`pos1`),
  ADD KEY `fk_no_punggung_pos2` (`pos2`),
  ADD KEY `fk_no_punggung_pos3` (`pos3`),
  ADD KEY `fk_no_punggung_pos4` (`pos4`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`no_punggung`),
  ADD UNIQUE KEY `nama_tim` (`nama_tim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `juri`
--
ALTER TABLE `juri`
  MODIFY `id_juri` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos1`
--
ALTER TABLE `pos1`
  MODIFY `id_penilaian` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos2`
--
ALTER TABLE `pos2`
  MODIFY `id_penilaian` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos3`
--
ALTER TABLE `pos3`
  MODIFY `id_penilaian` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos4`
--
ALTER TABLE `pos4`
  MODIFY `id_penilaian` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekap`
--
ALTER TABLE `rekap`
  MODIFY `rekap` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `no_punggung` int(7) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `fk_id_tim` FOREIGN KEY (`no_punggung`) REFERENCES `tim` (`no_punggung`),
  ADD CONSTRAINT `fk_punggung` FOREIGN KEY (`no_punggung`) REFERENCES `tim` (`no_punggung`);

--
-- Constraints for table `pos1`
--
ALTER TABLE `pos1`
  ADD CONSTRAINT `fk_1_danton` FOREIGN KEY (`id_juri_danton`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_1_garis` FOREIGN KEY (`id_juri_garis`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_1_kekompakan` FOREIGN KEY (`id_juri_kekompakan`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_1_kerapian` FOREIGN KEY (`id_juri_kerapian`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_1_kostum` FOREIGN KEY (`id_juri_kostum`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_1_teknik` FOREIGN KEY (`id_juri_teknik`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_tim` FOREIGN KEY (`no_punggung`) REFERENCES `tim` (`no_punggung`);

--
-- Constraints for table `pos2`
--
ALTER TABLE `pos2`
  ADD CONSTRAINT `fk_2_danton` FOREIGN KEY (`id_juri_danton`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_2_garis` FOREIGN KEY (`id_juri_garis`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_2_kekompakan` FOREIGN KEY (`id_juri_kekompakan`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_2_kerapian` FOREIGN KEY (`id_juri_kerapian`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_2_teknik` FOREIGN KEY (`id_juri_teknik`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_tim_2` FOREIGN KEY (`no_punggung`) REFERENCES `tim` (`no_punggung`);

--
-- Constraints for table `pos3`
--
ALTER TABLE `pos3`
  ADD CONSTRAINT `fk_3_danton` FOREIGN KEY (`id_juri_danton`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_3_garis` FOREIGN KEY (`id_juri_garis`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_3_kekompakan` FOREIGN KEY (`id_juri_kekompakan`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_3_kerapian` FOREIGN KEY (`id_juri_kerapian`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_3_teknik` FOREIGN KEY (`id_juri_teknik`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_tim_3` FOREIGN KEY (`no_punggung`) REFERENCES `tim` (`no_punggung`);

--
-- Constraints for table `pos4`
--
ALTER TABLE `pos4`
  ADD CONSTRAINT `fk_4_danton` FOREIGN KEY (`id_juri_danton`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_4_garis` FOREIGN KEY (`id_juri_garis`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_4_kekompakan` FOREIGN KEY (`id_juri_kekompakan`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_4_kerapian` FOREIGN KEY (`id_juri_kerapian`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_4_teknik` FOREIGN KEY (`id_juri_teknik`) REFERENCES `juri` (`id_juri`),
  ADD CONSTRAINT `fk_tim_4` FOREIGN KEY (`no_punggung`) REFERENCES `tim` (`no_punggung`);

--
-- Constraints for table `rekap`
--
ALTER TABLE `rekap`
  ADD CONSTRAINT `fk_no_punggung_pos1` FOREIGN KEY (`pos1`) REFERENCES `pos1` (`no_punggung`),
  ADD CONSTRAINT `fk_no_punggung_pos2` FOREIGN KEY (`pos2`) REFERENCES `pos2` (`no_punggung`),
  ADD CONSTRAINT `fk_no_punggung_pos3` FOREIGN KEY (`pos3`) REFERENCES `pos3` (`no_punggung`),
  ADD CONSTRAINT `fk_no_punggung_pos4` FOREIGN KEY (`pos4`) REFERENCES `pos4` (`no_punggung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
