-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2016 at 06:29 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `short-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_doc_req`
--

CREATE TABLE IF NOT EXISTS `t_doc_req` (
  `id_req` int(128) NOT NULL,
  `kode_berkas` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_doc_req`
--

INSERT INTO `t_doc_req` (`id_req`, `kode_berkas`) VALUES
(27, 'berkas111'),
(0, 'berkas111'),
(0, 'berkas111'),
(28, 'berkas111'),
(36, 'berkas1112'),
(36, 'berkas111'),
(36, 'ss'),
(37, 'berkas1112'),
(37, 'berkas111'),
(38, 'berkas1112'),
(38, 'berkas111'),
(39, 'berkas1112'),
(40, 'ss');

-- --------------------------------------------------------

--
-- Stand-in structure for view `t_doc_req_data`
--
CREATE TABLE IF NOT EXISTS `t_doc_req_data` (
`id_req` int(128)
,`kode_berkas` varchar(64)
,`nama_berkas` varchar(128)
,`kode_skpd` varchar(25)
);
-- --------------------------------------------------------

--
-- Table structure for table `t_doc_respon`
--

CREATE TABLE IF NOT EXISTS `t_doc_respon` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nik_pemohon` varchar(15) NOT NULL,
  `request_at` date NOT NULL,
  `response_at` date DEFAULT NULL,
  `dokumen` varchar(285) NOT NULL,
  `kode_skpd` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `t_doc_respon`
--

INSERT INTO `t_doc_respon` (`id`, `nik_pemohon`, `request_at`, `response_at`, `dokumen`, `kode_skpd`) VALUES
(2, '5654557', '2016-09-29', '2016-10-03', 'Kalender.xlsx', 'skpd02gg');

-- --------------------------------------------------------

--
-- Table structure for table `t_dokumen`
--

CREATE TABLE IF NOT EXISTS `t_dokumen` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `kode_berkas` varchar(128) NOT NULL,
  `upload_at` date NOT NULL,
  `nama_berkas` varchar(128) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `kode_skpd` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `t_dokumen`
--

INSERT INTO `t_dokumen` (`id`, `kode_berkas`, `upload_at`, `nama_berkas`, `kategori`, `deskripsi`, `kode_skpd`) VALUES
(4, 'berkas1112', '0000-00-00', 'berkas skpd 111', 'female', 'buku test', 'Sekda'),
(5, 'berkas111', '0000-00-00', 'berkas skpd 111', 'male', 'buku test', 'Sekda'),
(7, 'ss', '0000-00-00', 'ss', 'male', 'ss', 'Inspektorat');

-- --------------------------------------------------------

--
-- Table structure for table `t_request`
--

CREATE TABLE IF NOT EXISTS `t_request` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `tujuan_permohonan_info` varchar(128) NOT NULL,
  `nik_pemohon` int(32) NOT NULL,
  `request_at` date NOT NULL,
  `response_at` date DEFAULT NULL,
  `file_pendukung` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `t_request`
--

INSERT INTO `t_request` (`id`, `tujuan_permohonan_info`, `nik_pemohon`, `request_at`, `response_at`, `file_pendukung`) VALUES
(1, '', 2565956, '2016-09-28', NULL, ''),
(2, '', 5654557, '2016-09-29', '2016-10-03', ''),
(3, '', 5611124, '2016-09-28', NULL, ''),
(4, '', 212135, '2016-10-03', NULL, ''),
(5, 'kxkx', 11111, '0000-00-00', NULL, 'berkas1112'),
(6, 'hhh', 11111, '0000-00-00', NULL, 'berkas111'),
(7, 'x', 11111, '0000-00-00', NULL, 'berkas111'),
(8, 'j', 11111, '0000-00-00', NULL, 'berkas1112'),
(9, 'j', 11111, '0000-00-00', NULL, 'ss'),
(10, 'zz', 11111, '0000-00-00', NULL, 'berkas111'),
(11, 'aaa', 11111, '0000-00-00', NULL, 'berkas111'),
(12, 'aaa', 11111, '0000-00-00', NULL, 'berkas1112'),
(13, 'xx', 11111, '0000-00-00', NULL, 'ss'),
(14, 'jj', 11111, '0000-00-00', NULL, 'berkas1112'),
(15, 'jj', 11111, '0000-00-00', NULL, 'berkas111'),
(16, 'hhh', 11111, '0000-00-00', NULL, 'berkas1112'),
(17, 'jhhj', 11111, '0000-00-00', NULL, 'berkas111'),
(23, 'n,mm', 11111, '2016-10-05', NULL, 'berkas1112'),
(24, 'njnm', 11111, '2016-10-05', NULL, ''),
(25, 'mn', 11111, '2016-10-05', NULL, ''),
(26, 'sf', 11111, '2016-10-05', NULL, ''),
(27, 'jb', 11111, '2016-10-05', NULL, ''),
(28, 'mnn', 11111, '2016-10-05', NULL, ''),
(29, 'nbb', 11111, '2016-10-05', NULL, 'berkas1112'),
(30, 'nbb', 11111, '2016-10-05', NULL, 'berkas111'),
(31, 'mnmn', 11111, '2016-10-05', NULL, ''),
(32, '', 0, '0000-00-00', NULL, 'berkas1112'),
(33, '', 0, '0000-00-00', NULL, 'berkas111'),
(34, 'jnm', 11111, '2016-10-05', NULL, ''),
(35, 'jmn', 11111, '2016-10-05', NULL, ''),
(36, 'm j', 11111, '2016-10-05', NULL, ''),
(37, 'Persyaratan', 2222, '2016-10-05', NULL, ''),
(38, 'Permohonan', 11111, '2016-10-05', NULL, 'dispenda.jpg'),
(39, 'Persyaratan', 11111, '2016-10-05', NULL, '20160318_170328.jpg'),
(40, 'Persyaratan Buka Usaha', 11111, '2016-10-05', NULL, 'Capture.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `t_skpd`
--

CREATE TABLE IF NOT EXISTS `t_skpd` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  `singkatan` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

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

CREATE TABLE IF NOT EXISTS `t_user` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `hak_akses` int(16) NOT NULL,
  `nik` int(25) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_tlpn` varchar(128) NOT NULL DEFAULT '-',
  `no_hp` varchar(128) NOT NULL DEFAULT '-',
  `email` varchar(128) NOT NULL,
  `ktp` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `hak_akses`, `nik`, `nama`, `alamat`, `no_tlpn`, `no_hp`, `email`, `ktp`, `password`) VALUES
(1, 1, 2342, 'hilmi', 'sukabumi', '085719579827', '085719579827', 'hilmisalim11@gmail.com', 'afeewaef1234', 'Hilmi'),
(2, 1, 11111, 'Indriyani Indri', 'Jalan Manunggal 2 RT 11 RW 06 Nomor 35 Kode POS 13830 Kelurahan RambutanRambutan', '888', '081290582270', 'indriyani.cs49@gmail.com', 'dispenda.jpg', 'c49b86b32a98a4aa88c0413b7120c3c0'),
(3, 1, 2222, 'User2222', 'Jakarta', '', '', 'user@gmail.com', 'Penguins.jpg', '7443ee3c197a8a27722f1b7e3db7dbb5'),
(4, 1, 3333, 'User3333', 'Bekasi', '', '', 'user3333@gmail.com', 'sindangrasa.jpg', '16c1c1b1e1aff86d3da36e58f9bc60b7');

-- --------------------------------------------------------

--
-- Structure for view `t_doc_req_data`
--
DROP TABLE IF EXISTS `t_doc_req_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `t_doc_req_data` AS select `t_doc_req`.`id_req` AS `id_req`,`t_doc_req`.`kode_berkas` AS `kode_berkas`,`t_dokumen`.`nama_berkas` AS `nama_berkas`,`t_dokumen`.`kode_skpd` AS `kode_skpd` from ((`t_doc_req` join `t_dokumen` on((`t_doc_req`.`kode_berkas` = `t_dokumen`.`kode_berkas`))) join `t_request` on((`t_doc_req`.`id_req` = `t_request`.`id`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
