-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2018 at 04:09 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_banyuwangi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fungsi`
--

CREATE TABLE `tbl_fungsi` (
  `id_fungsi` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fungsi`
--

INSERT INTO `tbl_fungsi` (`id_fungsi`, `keterangan`) VALUES
(1, 'peminjaman_mobil'),
(2, 'permintaan_barang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id` int(11) NOT NULL,
  `nm_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id`, `nm_jabatan`) VALUES
(1, 'Pincab'),
(2, 'MO'),
(3, 'Utilities'),
(4, 'RBO'),
(5, 'Driver');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `nik` int(100) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`nik`, `nama_karyawan`, `id_jabatan`) VALUES
(2000456, 'Hari', 5),
(2000964, 'Putra', 5),
(216920205, 'Bangun Rizki Awangditama', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`, `type`) VALUES
(1, '216920205', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjam_mobil`
--

CREATE TABLE `tbl_pinjam_mobil` (
  `id` int(11) NOT NULL,
  `nik` int(100) NOT NULL,
  `hari` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pinjam_mobil`
--

INSERT INTO `tbl_pinjam_mobil` (`id`, `nik`, `hari`, `jam_mulai`, `jam_akhir`, `tujuan`, `keterangan`, `id_type`) VALUES
(2, 216920205, '2018-08-08', '10:00:00', '17:00:00', 'kota-kota,karangasem', '', 1),
(3, 216920205, '2018-08-18', '08:00:00', '10:00:00', 'Kota2', 'Solusit', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id_type` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id_type`, `keterangan`) VALUES
(1, 'admin'),
(2, 'aprroval'),
(3, 'pengguna');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_kar_jab`
--
CREATE TABLE `v_kar_jab` (
`nm_jabatan` varchar(100)
,`nik` int(100)
,`nama_karyawan` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pinj_kar`
--
CREATE TABLE `v_pinj_kar` (
);

-- --------------------------------------------------------

--
-- Structure for view `v_kar_jab`
--
DROP TABLE IF EXISTS `v_kar_jab`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kar_jab`  AS  select `t1`.`nm_jabatan` AS `nm_jabatan`,`t2`.`nik` AS `nik`,`t2`.`nama_karyawan` AS `nama_karyawan` from (`tbl_jabatan` `t1` join `tbl_karyawan` `t2` on((`t1`.`id` = `t2`.`id_jabatan`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pinj_kar`
--
DROP TABLE IF EXISTS `v_pinj_kar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pinj_kar`  AS  select `t1`.`nik` AS `nik`,`t1`.`nama_karyawan` AS `nama_karyawan`,`t2`.`nm_jabatan` AS `nm_jabatan`,`t3`.`hari` AS `hari`,`t3`.`jam_mulai` AS `jam_mulai`,`t3`.`jam_akhir` AS `jam_akhir`,`t3`.`tujuan` AS `tujuan`,`t3`.`status` AS `status` from ((`tbl_karyawan` `t1` join `tbl_jabatan` `t2` on((`t1`.`id_jabatan` = `t2`.`id`))) join `tbl_pinjam_mobil` `t3` on((`t3`.`nik` = `t1`.`nik`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_fungsi`
--
ALTER TABLE `tbl_fungsi`
  ADD PRIMARY KEY (`id_fungsi`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pinjam_mobil`
--
ALTER TABLE `tbl_pinjam_mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_fungsi`
--
ALTER TABLE `tbl_fungsi`
  MODIFY `id_fungsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pinjam_mobil`
--
ALTER TABLE `tbl_pinjam_mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
