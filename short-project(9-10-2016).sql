-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 09, 2016 at 05:57 PM
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
  `date_upload` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_doc_req`
--

INSERT INTO `t_doc_req` (`no_req`, `id_req`, `kode_berkas`, `berkas_upload`, `date_upload`) VALUES
(20, 44, 'berkas111', 'd-aktivasi.JPG', '2016-10-09'),
(21, 44, 'balebak131', NULL, '2016-10-09'),
(22, 45, 'berkas1112', NULL, ''),
(23, 45, 'balebak131', NULL, '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `t_doc_req_data`
--
CREATE TABLE `t_doc_req_data` (
`no_req` int(3)
,`nik_pemohon` int(32)
,`kode_berkas` varchar(64)
,`nama_berkas` varchar(128)
,`kode_skpd` varchar(25)
,`berkas_upload` varchar(128)
,`date_upload` varchar(128)
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
  `kategori` varchar(128) NOT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `kode_skpd` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_dokumen`
--

INSERT INTO `t_dokumen` (`id`, `kode_berkas`, `upload_at`, `nama_berkas`, `kategori`, `deskripsi`, `kode_skpd`) VALUES
(4, 'berkas1112', '0000-00-00', 'berkas skpd 111', 'female', 'buku test', 'Sekda'),
(5, 'berkas111', '0000-00-00', 'berkas skpd 111', 'male', 'buku test', 'Sekda'),
(8, 'balebak131', '2016-10-09', 'berkas balebak cibanteng', 'desa', 'data boong', 'Inspektorat'),
(9, 'berkas212135', '2016-10-09', 'berkas rumah', 'makan', 'jjajajaja', 'Inspektorat');

-- --------------------------------------------------------

--
-- Table structure for table `t_request`
--

CREATE TABLE `t_request` (
  `id` int(16) NOT NULL,
  `tujuan_permohonan_info` varchar(128) NOT NULL,
  `nik_pemohon` int(32) NOT NULL,
  `request_at` date NOT NULL,
  `file_pendukung` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_request`
--

INSERT INTO `t_request` (`id`, `tujuan_permohonan_info`, `nik_pemohon`, `request_at`, `file_pendukung`) VALUES
(44, 'indonesia satu', 3333, '2016-10-09', 'sindangrasa.jpg'),
(45, 'berkas', 123, '2016-10-09', 'd-aktivasi.JPG');

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
  `nik` int(25) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_tlpn` varchar(128) NOT NULL DEFAULT '-',
  `no_hp` varchar(128) NOT NULL DEFAULT '-',
  `email` varchar(128) NOT NULL,
  `ktp` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `hak_akses`, `kode_skpd`, `nik`, `nama`, `alamat`, `no_tlpn`, `no_hp`, `email`, `ktp`, `password`) VALUES
(1, 1, NULL, 2342, 'hilmi', 'sukabumi', '085719579827', '085719579827', 'hilmisalim11@gmail.com', 'afeewaef1234', 'Hilmi'),
(2, 1, 'Sekda', 11111, 'Indriyani Indri', 'Jalan Manunggal 2 ', '888', '081290582270', 'indriyani.cs49@gmail.com', 'dispenda.jpg', 'c49b86b32a98a4aa88c0413b7120c3c0'),
(3, 1, NULL, 2222, 'User2222', 'Jakarta', '', '', 'user@gmail.com', 'Penguins.jpg', '7443ee3c197a8a27722f1b7e3db7dbb5'),
(4, 1, NULL, 3333, 'User3333', 'Bekasi', '', '', 'user3333@gmail.com', 'sindangrasa.jpg', '16c1c1b1e1aff86d3da36e58f9bc60b7'),
(7, 3, 'Inspektorat', 0, 'mimi', 'sukabummi', '212135', '085719579827', 'mimi@gmail.com', '', 'dde6ecd6406700aa000b213c843a3091'),
(8, 1, NULL, 123, 'aaa', 'aaa', '', '', 'aaaa@gmail.com', 'd-aktivasi.JPG', '74b87337454200d4d33f80c4663dc5e5'),
(9, 2, 'Sekda', 5445, 'humasssss', 'ssss', '333', '3333', 'humas@gmail.com', '', '94da7343e47802652a24444298012b8c');

-- --------------------------------------------------------

--
-- Structure for view `t_doc_req_data`
--
DROP TABLE IF EXISTS `t_doc_req_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `t_doc_req_data`  AS  select `t_doc_req`.`no_req` AS `no_req`,`t_request`.`nik_pemohon` AS `nik_pemohon`,`t_doc_req`.`kode_berkas` AS `kode_berkas`,`t_dokumen`.`nama_berkas` AS `nama_berkas`,`t_dokumen`.`kode_skpd` AS `kode_skpd`,`t_doc_req`.`berkas_upload` AS `berkas_upload`,`t_doc_req`.`date_upload` AS `date_upload` from ((`t_doc_req` join `t_dokumen` on((`t_doc_req`.`kode_berkas` = `t_dokumen`.`kode_berkas`))) join `t_request` on((`t_doc_req`.`id_req` = `t_request`.`id`))) ;

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_doc_req`
--
ALTER TABLE `t_doc_req`
  MODIFY `no_req` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `t_dokumen`
--
ALTER TABLE `t_dokumen`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `t_request`
--
ALTER TABLE `t_request`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `t_skpd`
--
ALTER TABLE `t_skpd`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
