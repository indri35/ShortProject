-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 28, 2016 at 11:02 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `short-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_doc_req`
--

CREATE TABLE `t_doc_req` (
  `no_req` int(3) NOT NULL,
  `id_req` int(128) NOT NULL,
  `kode_berkas` varchar(64) NOT NULL,
  `berkas_upload` varchar(128) DEFAULT NULL,
  `date_upload` varchar(128) NOT NULL,
  `form_keberatan` varchar(128) NOT NULL,
  `pesan` varchar(256) DEFAULT NULL,
  `pesan_tolak` varchar(256) DEFAULT NULL,
  `date_upload_keberatan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `t_doc_req_data`
--
CREATE TABLE `t_doc_req_data` (
`no_req` int(3)
,`id_req` int(128)
,`nik_pemohon` varchar(128)
,`kode_berkas` varchar(64)
,`nama_berkas` varchar(128)
,`kategori_berkas` varchar(128)
,`deskripsi_berkas` varchar(128)
,`tujuan_permohonan_info` varchar(128)
,`file_pendukung` varchar(128)
,`jenis_request` varchar(128)
,`kode_skpd` varchar(25)
,`berkas_upload` varchar(128)
,`pesan` varchar(256)
,`pesan_tolak` varchar(256)
,`form_keberatan` varchar(128)
,`request_at` date
,`date_upload` varchar(128)
,`date_upload_keberatan` date
);

-- --------------------------------------------------------

--
-- Table structure for table `t_dokumen`
--

CREATE TABLE `t_dokumen` (
  `id` int(16) NOT NULL,
  `kode_berkas` varchar(128) NOT NULL,
  `upload_at` date NOT NULL,
  `nama_berkas` varchar(128) NOT NULL,
  `berkas` varchar(128) DEFAULT NULL,
  `kategori` varchar(128) NOT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `kode_skpd` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_request`
--

CREATE TABLE `t_request` (
  `id` int(16) NOT NULL,
  `tujuan_permohonan_info` varchar(128) NOT NULL,
  `nik_pemohon` varchar(128) NOT NULL,
  `request_at` date NOT NULL,
  `file_pendukung` varchar(128) NOT NULL,
  `jenis_request` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_skpd`
--

CREATE TABLE `t_skpd` (
  `id` int(16) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `singkatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(16) NOT NULL,
  `hak_akses` int(16) NOT NULL,
  `kode_skpd` varchar(15) DEFAULT NULL,
  `nik` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_tlpn` varchar(128) NOT NULL DEFAULT '-',
  `no_hp` varchar(128) NOT NULL DEFAULT '-',
  `email` varchar(128) NOT NULL,
  `ktp` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `reset_pass` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `hak_akses`, `kode_skpd`, `nik`, `nama`, `alamat`, `no_tlpn`, `no_hp`, `email`, `ktp`, `password`, `reset_pass`) VALUES
(1, 2, NULL, '32154879654984', 'humas', 'Bogor Dramaga', '254568', '0857494578', 'humas@gmail.com', '', '94da7343e47802652a24444298012b8c', '');

-- --------------------------------------------------------

--
-- Structure for view `t_doc_req_data`
--
DROP TABLE IF EXISTS `t_doc_req_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `t_doc_req_data`  AS  select `t_doc_req`.`no_req` AS `no_req`,`t_doc_req`.`id_req` AS `id_req`,`t_request`.`nik_pemohon` AS `nik_pemohon`,`t_doc_req`.`kode_berkas` AS `kode_berkas`,`t_dokumen`.`nama_berkas` AS `nama_berkas`,`t_dokumen`.`kategori` AS `kategori_berkas`,`t_dokumen`.`deskripsi` AS `deskripsi_berkas`,`t_request`.`tujuan_permohonan_info` AS `tujuan_permohonan_info`,`t_request`.`file_pendukung` AS `file_pendukung`,`t_request`.`jenis_request` AS `jenis_request`,`t_dokumen`.`kode_skpd` AS `kode_skpd`,`t_doc_req`.`berkas_upload` AS `berkas_upload`,`t_doc_req`.`pesan` AS `pesan`,`t_doc_req`.`pesan_tolak` AS `pesan_tolak`,`t_doc_req`.`form_keberatan` AS `form_keberatan`,`t_request`.`request_at` AS `request_at`,`t_doc_req`.`date_upload` AS `date_upload`,`t_doc_req`.`date_upload_keberatan` AS `date_upload_keberatan` from ((`t_doc_req` join `t_dokumen` on((`t_doc_req`.`kode_berkas` = `t_dokumen`.`kode_berkas`))) join `t_request` on((`t_doc_req`.`id_req` = `t_request`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_doc_req`
--
ALTER TABLE `t_doc_req`
  ADD PRIMARY KEY (`no_req`);

--
-- Indexes for table `t_dokumen`
--
ALTER TABLE `t_dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_request`
--
ALTER TABLE `t_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_skpd`
--
ALTER TABLE `t_skpd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_doc_req`
--
ALTER TABLE `t_doc_req`
  MODIFY `no_req` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_dokumen`
--
ALTER TABLE `t_dokumen`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_request`
--
ALTER TABLE `t_request`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_skpd`
--
ALTER TABLE `t_skpd`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
