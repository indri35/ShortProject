-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 03, 2016 at 03:48 PM
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
  `id` int(16) NOT NULL,
  `kode_berkas` varchar(64) NOT NULL,
  `nama_berkas` varchar(128) NOT NULL,
  `skpd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_doc_req`
--

INSERT INTO `t_doc_req` (`id`, `kode_berkas`, `nama_berkas`, `skpd`) VALUES
(1, 'berkas111', 'berkas skpd 111', 'Inspektorat');

-- --------------------------------------------------------

--
-- Table structure for table `t_doc_respon`
--

CREATE TABLE `t_doc_respon` (
  `id` int(3) NOT NULL,
  `nik_pemohon` varchar(15) NOT NULL,
  `request_at` date NOT NULL,
  `response_at` date DEFAULT NULL,
  `dokumen` varchar(285) NOT NULL,
  `kode_skpd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_doc_respon`
--

INSERT INTO `t_doc_respon` (`id`, `nik_pemohon`, `request_at`, `response_at`, `dokumen`, `kode_skpd`) VALUES
(2, '5654557', '2016-09-29', '2016-10-03', 'Kalender.xlsx', 'skpd02gg');

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
  `response_at` date DEFAULT NULL,
  `kode_skpd` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_request`
--

INSERT INTO `t_request` (`id`, `nik_pemohon`, `request_at`, `response_at`, `kode_skpd`) VALUES
(1, 2565956, '2016-09-28', NULL, 'skpd12jkt'),
(2, 5654557, '2016-09-29', '2016-10-03', 'skpd02gg'),
(3, 5611124, '2016-09-28', NULL, 'skpd12jkt'),
(4, 212135, '2016-10-03', NULL, 'sskpd');

-- --------------------------------------------------------

--
-- Table structure for table `t_skpd`
--

CREATE TABLE `t_skpd` (
  `id` int(16) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `singkatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_skpd`
--

INSERT INTO `t_skpd` (`id`, `nama`, `singkatan`) VALUES
(1, 'Sekretariat Daerah', 'Sekda'),
(2, 'Inspektorat', 'Inspektorat'),
(3, 'Satuan Polisi Pamong Praja', 'Satpol PP'),
(4, 'Badan Pengelolaan Lingkungan Hidup ', 'BPLH'),
(5, 'Badan Pemberdayaan Masyarakat dan Keluarga Berencana ', 'BPMKB'),
(6, 'Badan Badan Penanggulangan Bencana Daerah', 'BPBD'),
(7, 'Badan Pengelolaan Keuangan dan Aset Daerah', 'BPKAD'),
(8, 'Badan Badan Kepegawaian Pendidikan dan Pelatihan', 'BKPP'),
(9, 'Badan Pelayanan Perizinan Terpadu dan Penanaman Modal', 'BPPT – PM'),
(10, 'Badan Perencanaan Pembangunan Daerah ', 'Bappeda'),
(11, 'Dinas Kesehatan', 'Dinkes'),
(12, 'Dinas Perindustrian dan Perdagangan', 'Disperindag'),
(13, 'Dinas Tenaga Kerja, Sosial dan Transmigrasi', 'Disnakersostrans'),
(14, 'Dinas Bina Marga dan SDA', 'Binamarga'),
(15, 'Dinas Pengawasan Bangunan dan Permukiman', 'Wasbangkim'),
(16, 'Dinas Kebersihan dan Pertamanan ', 'DKP'),
(17, 'Dinas Pendapatan Daerah', 'Dispenda'),
(18, 'Dinas Koperasi dan UMKM', 'Diskopumkm'),
(19, 'Dinas Pendidikan', 'Disdik'),
(20, 'Dinas Lalu Lintas dan Angkutan Jalan', 'DLLAJ'),
(21, 'Dinas Kependudukan dan Catatan Sipil', 'Disdukcapil'),
(22, 'Dinas Pertanian', 'Distani'),
(23, 'Sekretariat KORPRI', 'KORPRI'),
(24, 'Sekretariat DPRD', 'DPRD'),
(25, 'Kecamatan Bogor Selatan', 'Kec Bogor Selatan'),
(26, 'Kecamatan Bogor Utara', 'Kec Bogor Utara'),
(27, 'Kecamatan Bogor Timur', 'Kec Bogor Timur'),
(28, 'Kecamatan Bogor Barat', 'Kec Bogor Barat'),
(29, 'Kecamatan  Bogor Tengah', 'Kec  Bogor Tengah'),
(30, 'Kecamatan  Tanah Sareal', 'Kec  Tanah Sareal'),
(31, 'Kantor Arsip dan Perpustakaan Daerah', 'KAPD'),
(32, 'Kantor Kesatuan Bangsa dan Politik', 'Kesbangpol'),
(33, 'Kantor Pemuda dan Olah Raga', 'Pora'),
(34, 'Kantor Ketahanan Pangan', 'KKP'),
(35, 'Kantor Komunikasi dan Informatika', 'Kominfo');

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
  `ktp` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `hak_akses`, `nik`, `nama`, `alamat`, `no_tlpn`, `no_hp`, `email`, `ktp`, `password`) VALUES
(1, 1, 2342, 'hilmi', 'sukabumi', '085719579827', '085719579827', 'hilmisalim11@gmail.com', 'afeewaef1234', 'Hilmi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_doc_req`
--
ALTER TABLE `t_doc_req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_doc_respon`
--
ALTER TABLE `t_doc_respon`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `t_doc_respon`
--
ALTER TABLE `t_doc_respon`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_dokumen`
--
ALTER TABLE `t_dokumen`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_request`
--
ALTER TABLE `t_request`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_skpd`
--
ALTER TABLE `t_skpd`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_doc_req`
--
ALTER TABLE `t_doc_req`
  ADD CONSTRAINT `FK_ID_REQ` FOREIGN KEY (`id`) REFERENCES `t_request` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
