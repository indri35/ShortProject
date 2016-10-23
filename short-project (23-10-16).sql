-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 23, 2016 at 08:47 AM
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

--
-- Dumping data for table `t_doc_req`
--

INSERT INTO `t_doc_req` (`no_req`, `id_req`, `kode_berkas`, `berkas_upload`, `date_upload`, `form_keberatan`, `pesan`, `pesan_tolak`, `date_upload_keberatan`) VALUES
(20, 44, 'berkas111', 'd-aktivasi.JPG', '2016-10-09', '', NULL, NULL, NULL),
(21, 44, 'balebak131', 'Contoh_makalah_praseminar.docx', '2016-10-12', '', NULL, NULL, NULL),
(22, 45, 'berkas1112', '1.PNG', '2016-10-12', '', NULL, NULL, NULL),
(23, 45, 'balebak131', NULL, '', '', NULL, NULL, NULL),
(25, 46, 'berkas212135', 'tas eiger.JPG', '2016-10-18', '5.PNG', 'coba tuh', NULL, NULL),
(26, 47, 'berkas212135', NULL, '', '', NULL, NULL, NULL),
(27, 48, 'balebak131', NULL, '', '', NULL, NULL, NULL),
(28, 49, 'berkas111', NULL, '', '', NULL, NULL, NULL),
(29, 50, '55', 'map.JPG', '2016-10-18', '', 'coba diruang dosen', NULL, NULL),
(30, 51, '123222', 'ak_tiv.as.JPG', '2016-10-13', '', NULL, NULL, NULL),
(31, 52, 'rrrrrr', 'rrr.JPG', '2016-10-13', '', NULL, NULL, NULL),
(32, 53, '123222', '.JPG', '2016-10-18', '', 'ruang dosen satu ', NULL, NULL),
(33, 53, '55', NULL, '2016-10-21', '5.PNG', 'ini yang baru', 'engga bakal dikasih ', NULL),
(34, 53, 'rrrrrr', 'konfirmasi-1.JPG', '2016-10-21', 'aa', 'hari jumat varokah', NULL, '2016-10-18'),
(36, 55, 'kumse', '', '2016-10-21', '', '', NULL, NULL),
(37, 56, '123222', '', '2016-10-18', '', NULL, 'ini permohonan di tolak', NULL),
(38, 56, 'kk', NULL, '', '', NULL, NULL, NULL),
(39, 57, '123222', NULL, '2016-10-18', '', NULL, 'tidak disetujui', NULL),
(40, 58, '55', '', '2016-10-23', '', '', 'tolak ah', NULL),
(41, 59, '55', 'akua.JPG', '2016-10-21', '', 'ini filenya kang', NULL, NULL),
(42, 59, 'rrrrrr', NULL, '', '', NULL, NULL, NULL),
(43, 60, '55', NULL, '', '', NULL, NULL, NULL),
(44, 60, 'rrrrrr', 'akua.JPG', '2016-10-23', '', 'ini akua', NULL, NULL);

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

--
-- Dumping data for table `t_dokumen`
--

INSERT INTO `t_dokumen` (`id`, `kode_berkas`, `upload_at`, `nama_berkas`, `berkas`, `kategori`, `deskripsi`, `kode_skpd`) VALUES
(9, 'berkas212135', '2016-10-13', 'berkas rumah', 'login.JPG', 'makan', 'jjajajaja', 'Sekda'),
(11, 'kumse', '2016-10-12', 'nama berkas kumse', 'map.JPG', 'ini kategori', 'ini deskripsi', 'Sekda'),
(12, 'ini kode berkas', '2016-10-12', 'ini nama berkas', 'tanggal.JPG', 'ini kategori', 'ini deskripsi', 'Sekda'),
(13, 'ini kode berkas', '2016-10-12', 'ini nama berkas', 'tas eiger.JPG', 'ini kategori', 'ini deskripsi', 'BPPT – PM'),
(17, '123222', '2016-10-12', 'ffeee', 'd-helm.JPG', 'ffkkk', 'kkkkkkkk', 'Inspektorat'),
(19, 'kk', '2016-10-13', 'kk', 'otp.JPG', 'kk', 'kk', 'Kec Bogor Utara'),
(20, '55', '2016-10-13', 'rr', 'konfirmasi-1.JPG', 'rr', 'rr', 'Inspektorat'),
(21, 'rrrrrr', '2016-10-13', 'rrrrr', 'rrr.JPG', 'rrrrr', 'rrrr', 'Inspektorat'),
(22, '', '2016-10-21', '', 'nopic.png', '', '', 'Sekda'),
(23, '', '2016-10-21', '', 'nopic.png', '', '', 'Sekda'),
(24, '', '2016-10-21', '', 'nopic.png', '', '', 'Sekda');

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

--
-- Dumping data for table `t_request`
--

INSERT INTO `t_request` (`id`, `tujuan_permohonan_info`, `nik_pemohon`, `request_at`, `file_pendukung`, `jenis_request`) VALUES
(44, 'indonesia satu', '3333', '2016-10-09', 'sindangrasa.jpg', 'perorangan'),
(45, 'berkas', '123', '2016-10-09', 'd-aktivasi.JPG', 'badan-hukum'),
(46, 'Coba', '11111', '2016-10-09', 'dispenda.jpg', 'bukan-badan-hukum'),
(48, 'Informasi', '11111', '2016-10-12', 'dispenda.jpg', 'perorangan'),
(49, 'Informasi', '11111', '2016-10-12', 'nopic.png', 'bukan-badan-hukum'),
(50, 'buat nikah', '3333', '2016-10-13', 'sindangrasa.jpg', 'perorangan'),
(51, 'asfasf', '3333', '2016-10-13', 'sindangrasa.jpg', 'perorangan'),
(52, 'rrrr', '3333', '2016-10-13', 'sindangrasa.jpg', 'perorangan'),
(53, 'buat besok', '3333', '2016-10-13', 'map.jpg\r\n', 'perorangan'),
(54, 'nnnn', '11111', '2016-10-15', 'dispenda.jpg', 'perorangan'),
(55, 'klkkk', '11111', '2016-10-15', 'doc.pdf', 'badan-hukum'),
(56, 'coba aja', '11111', '2016-10-16', '7.PNG', 'perorangan'),
(57, 'Tes', '11111', '2016-10-16', '2.PNG', 'badan-hukum'),
(58, 'untuk wisuda besok', '446887776', '2016-10-18', '', 'perorangan'),
(59, 'minta ajaaaa', '3456754687', '2016-10-21', 'ak.JPG', 'perorangan'),
(60, 'Hilmi Salim coba', '446887776', '2016-10-23', 'hilmisalim.JPG', 'badan-hukum');

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
(1, 1, NULL, '2342', 'hilmi', 'sukabumi', '085719579827', '085719579827', 'hilmisalim11@gmail.com', 'afeewaef1234', 'Hilmi', ''),
(2, 1, 'Sekda', '11111', 'Indriyani Indri', 'Jalan Manunggal 2 ', '888', '081290582270', 'indriyani.cs49@gmail.com', '7.PNG', '3f4c58d7405e40baa8c8a183eb6bf30e', '59884fd3260d81a3243b0e15f7a89453'),
(3, 1, NULL, '2222', 'User2222', 'Jakarta', '', '', 'user@gmail.com', 'Penguins.jpg', '7443ee3c197a8a27722f1b7e3db7dbb5', ''),
(4, 1, NULL, '3333', 'User3333', 'Bekasi', '234', '234', 'user3333@gmail.com', 'map.jpg\r\n', '16c1c1b1e1aff86d3da36e58f9bc60b7', ''),
(7, 3, 'Inspektorat', '0', 'mimi', 'sukabummi', '212135', '085719579827', 'mimi@gmail.com', '', 'dde6ecd6406700aa000b213c843a3091', ''),
(9, 2, 'Sekda', '5445', 'humasssss', 'ssss', '333', '3333', 'humas@gmail.com', '', '94da7343e47802652a24444298012b8c', ''),
(10, 1, NULL, '1050241708900001', 'Coba', 'Jalan Manunggal 2 No.35', '', '', 'indri@gmail.com', '1050241708900001.PNG', '71f7be7b8496f7ece8454b1bcdcd2162', ''),
(11, 1, NULL, '446887776', 'hilmi salim', 'sukabumi', '212135', '085719579827', 'hilmisa@gmail.com', 'saliiim.JPG', 'f707ab90e6be62396d677b46d6e6f826', ''),
(12, 3, 'Inspektorat', '565', 'ilkom', 'bogor', '888', '888', 'ilkom@gmail.com', '', 'b459366805652ff1f2457b50557f8772', ''),
(13, 1, NULL, '3456754687', 'salim hilmi', 'sukabumi', '212135', '085719579827', 'salimhilmi@gmail.com', 'ak.JPG', '331735d173cf0ae50cc00d8e79bd52f6', '');

-- --------------------------------------------------------

--
-- Structure for view `t_doc_req_data`
--
DROP TABLE IF EXISTS `t_doc_req_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `t_doc_req_data`  AS  select `t_doc_req`.`no_req` AS `no_req`,`t_doc_req`.`id_req` AS `id_req`,`t_request`.`nik_pemohon` AS `nik_pemohon`,`t_doc_req`.`kode_berkas` AS `kode_berkas`,`t_dokumen`.`nama_berkas` AS `nama_berkas`,`t_dokumen`.`kategori` AS `kategori_berkas`,`t_dokumen`.`deskripsi` AS `deskripsi_berkas`,`t_request`.`tujuan_permohonan_info` AS `tujuan_permohonan_info`,`t_request`.`file_pendukung` AS `file_pendukung`,`t_request`.`jenis_request` AS `jenis_request`,`t_dokumen`.`kode_skpd` AS `kode_skpd`,`t_doc_req`.`berkas_upload` AS `berkas_upload`,`t_doc_req`.`pesan` AS `pesan`,`t_doc_req`.`pesan_tolak` AS `pesan_tolak`,`t_doc_req`.`form_keberatan` AS `form_keberatan`,`t_doc_req`.`date_upload` AS `date_upload`,`t_doc_req`.`date_upload_keberatan` AS `date_upload_keberatan` from ((`t_doc_req` join `t_dokumen` on((`t_doc_req`.`kode_berkas` = `t_dokumen`.`kode_berkas`))) join `t_request` on((`t_doc_req`.`id_req` = `t_request`.`id`))) ;

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
  MODIFY `no_req` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `t_dokumen`
--
ALTER TABLE `t_dokumen`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `t_request`
--
ALTER TABLE `t_request`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `t_skpd`
--
ALTER TABLE `t_skpd`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
