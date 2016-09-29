-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 29, 2016 at 02:55 PM
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
-- Table structure for table `t_dokumen`
--

CREATE TABLE `t_dokumen` (
  `id` int(16) NOT NULL,
  `kode_berkas` varchar(128) NOT NULL,
  `upload_at` date NOT NULL,
  `nama_berkas` varchar(128) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `kode_skpd` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_dokumen`
--

INSERT INTO `t_dokumen` (`id`, `kode_berkas`, `upload_at`, `nama_berkas`, `kategori`, `deskripsi`, `kode_skpd`) VALUES
(1, 'berkas111', '2016-09-06', 'berkas skpd 111', 'buku', 'buku test', 'skpd001sb'),
(2, 'berkas222', '2016-09-14', 'berkas skpd 222', 'buku', 'buku aja', 'skpd12jkt');

-- --------------------------------------------------------

--
-- Table structure for table `t_request`
--

CREATE TABLE `t_request` (
  `id` int(16) NOT NULL,
  `nik_pemohon` int(32) NOT NULL,
  `request_at` date NOT NULL,
  `kode_berkas` varchar(128) NOT NULL,
  `response_at` date DEFAULT NULL,
  `kode_skpd` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_request`
--

INSERT INTO `t_request` (`id`, `nik_pemohon`, `request_at`, `kode_berkas`, `response_at`, `kode_skpd`) VALUES
(1, 2565956, '2016-09-28', 'berkas1', NULL, 'skpd12jkt'),
(2, 5654557, '2016-09-29', 'berkas134', NULL, 'skpd02gg'),
(3, 5611124, '2016-09-28', 'berkas453', NULL, 'skpd12jkt');

-- --------------------------------------------------------

--
-- Table structure for table `t_skpd`
--

CREATE TABLE `t_skpd` (
  `id` int(16) NOT NULL,
  `kode_skpd` varchar(25) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `singkatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_skpd`
--

INSERT INTO `t_skpd` (`id`, `kode_skpd`, `nama`, `singkatan`) VALUES
(1, 'skpd12jkt', 'SKPD Jakarta Selatan', 'SKPD Jaksel'),
(2, 'skpd002sby', 'SKPD Surabaya', 'SKPD sby');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(16) NOT NULL,
  `hak_akses` int(16) NOT NULL,
  `nik` int(25) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_tlpn` varchar(128) NOT NULL,
  `no_hp` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `ktp` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_dokumen`
--
ALTER TABLE `t_dokumen`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_request`
--
ALTER TABLE `t_request`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_skpd`
--
ALTER TABLE `t_skpd`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
