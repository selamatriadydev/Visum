-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2018 at 05:00 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs_visum`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL,
  `nm_admin` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nm_admin`, `username`, `password`) VALUES
(1, 'bangrey', 'bangrey', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE IF NOT EXISTS `agama` (
  `id_agama` int(11) NOT NULL,
  `nm_agama` varchar(35) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `nm_agama`) VALUES
(1, 'Islam'),
(2, 'Kristen');

-- --------------------------------------------------------

--
-- Table structure for table `benda`
--

CREATE TABLE IF NOT EXISTS `benda` (
  `id_benda` int(11) NOT NULL,
  `id_jenisbenda` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `nm_benda` varchar(30) NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benda`
--

INSERT INTO `benda` (`id_benda`, `id_jenisbenda`, `id_pemeriksaan`, `nm_benda`, `keterangan`) VALUES
(1, 1, 1, '', 'baju'),
(2, 2, 1, '', 'mantel'),
(3, 3, 1, '', 'jaket'),
(4, 4, 1, '', 'kalung');

-- --------------------------------------------------------

--
-- Table structure for table `fisikkekerasan`
--

CREATE TABLE IF NOT EXISTS `fisikkekerasan` (
  `id_fisikkekerasan` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fisikkekerasan`
--

INSERT INTO `fisikkekerasan` (`id_fisikkekerasan`, `id_pemeriksaan`, `keterangan`) VALUES
(1, 1, 'korban terdapt luka memar');

-- --------------------------------------------------------

--
-- Table structure for table `jenisbenda`
--

CREATE TABLE IF NOT EXISTS `jenisbenda` (
  `id_jenisbenda` int(11) NOT NULL,
  `nm_jenisbenda` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenisbenda`
--

INSERT INTO `jenisbenda` (`id_jenisbenda`, `nm_jenisbenda`) VALUES
(1, 'Penutup tubuh korban'),
(2, 'Alas tubuh korban'),
(3, 'Pakaian Korban'),
(4, 'Benda ditubuh korban'),
(5, 'Perhiasan korban'),
(6, 'Benda sekitar tubuh korban');

-- --------------------------------------------------------

--
-- Table structure for table `jeniskeadaanumum`
--

CREATE TABLE IF NOT EXISTS `jeniskeadaanumum` (
  `id_jeniskeadaanumum` int(11) NOT NULL,
  `nm_jeniskeadaanumum` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jeniskeadaanumum`
--

INSERT INTO `jeniskeadaanumum` (`id_jeniskeadaanumum`, `nm_jeniskeadaanumum`) VALUES
(1, 'Kesadaran'),
(2, 'Pernapasan'),
(3, 'Detak nadi'),
(4, 'Tekanan darah'),
(5, 'Tinggi badan'),
(6, 'Berat badan/Status gizi');

-- --------------------------------------------------------

--
-- Table structure for table `jenispemeriksaanluar`
--

CREATE TABLE IF NOT EXISTS `jenispemeriksaanluar` (
  `id_jenispemeriksaanluar` int(11) NOT NULL,
  `nm_jenispemeriksaanluar` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenispemeriksaanluar`
--

INSERT INTO `jenispemeriksaanluar` (`id_jenispemeriksaanluar`, `nm_jenispemeriksaanluar`) VALUES
(1, 'Kepala'),
(2, 'Dahi'),
(3, 'Mata'),
(4, 'Hidung'),
(5, 'Pipi'),
(6, 'Telinga'),
(7, 'Mulut'),
(8, 'Gigi'),
(9, 'Rahang'),
(10, 'Leher'),
(11, 'Dada'),
(12, 'Perut'),
(13, 'Alat Kelamin'),
(14, 'Punggung'),
(15, 'Pinggang'),
(16, 'Panggul'),
(17, 'Bokong'),
(18, 'Dubur'),
(19, 'Anggota gerak atas'),
(20, 'Anggota gerak bawah');

-- --------------------------------------------------------

--
-- Table structure for table `keadaanumum`
--

CREATE TABLE IF NOT EXISTS `keadaanumum` (
  `id_keadaanumum` int(11) NOT NULL,
  `id_jeniskeadaanumum` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keadaanumum`
--

INSERT INTO `keadaanumum` (`id_keadaanumum`, `id_jeniskeadaanumum`, `id_pemeriksaan`, `keterangan`) VALUES
(1, 1, 1, 'tidak sadar'),
(2, 2, 1, 'sesak'),
(3, 4, 1, '120'),
(4, 5, 1, '120'),
(5, 6, 1, '20');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `nm_kecamatan` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `id_kota`, `nm_kecamatan`) VALUES
(1, 1, 'Rajabasa');

-- --------------------------------------------------------

--
-- Table structure for table `korban`
--

CREATE TABLE IF NOT EXISTS `korban` (
  `id_korban` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nm_korban` varchar(50) NOT NULL,
  `jns_klamin` enum('L','P') NOT NULL,
  `umur` int(3) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `id_pekerjaan` int(11) NOT NULL,
  `status_perkawinan` enum('kawin','belum') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `diantar_oleh` varchar(50) NOT NULL,
  `tmpt_penemuan` varchar(25) NOT NULL,
  `tgl_penemuan` datetime NOT NULL,
  `alamat_pengantar` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korban`
--

INSERT INTO `korban` (`id_korban`, `id_kota`, `id_kecamatan`, `nm_korban`, `jns_klamin`, `umur`, `id_agama`, `id_pekerjaan`, `status_perkawinan`, `alamat`, `diantar_oleh`, `tmpt_penemuan`, `tgl_penemuan`, `alamat_pengantar`, `no_hp`) VALUES
(1, 1, 1, 'sanog', 'P', 56, 2, 3, 'belum', '                      jalan lintas sumatra gang ku', 'ambulan rumah sakithg', 'rumahg', '2018-08-23 10:37:53', '                      kedamaiang                  ', '082345678908'),
(2, 1, 1, ',jh', 'L', 0, 1, 1, 'kawin', 'jmbh', 'hb', 'bh', '2018-08-13 10:30:53', 'hbh', 'hb');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` int(11) NOT NULL,
  `nm_kota` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nm_kota`) VALUES
(1, 'Bandar Lampung');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE IF NOT EXISTS `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `nm_pekerjaan` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `nm_pekerjaan`) VALUES
(1, 'Pelajar'),
(2, 'Petani'),
(3, 'Polisi');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksa`
--

CREATE TABLE IF NOT EXISTS `pemeriksa` (
  `id_pemeriksa` int(11) NOT NULL,
  `nm_pemeriksa` varchar(50) NOT NULL,
  `nrp_nrptt` int(20) NOT NULL,
  `instansi_pemeriksa` varchar(40) NOT NULL,
  `waktu_pemeriksaan` datetime NOT NULL,
  `jns_pemeriksaan` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksa`
--

INSERT INTO `pemeriksa` (`id_pemeriksa`, `nm_pemeriksa`, `nrp_nrptt`, `instansi_pemeriksa`, `waktu_pemeriksaan`, `jns_pemeriksaan`) VALUES
(1, '67898776786', 0, 'pemerintahan', '2018-08-19 09:18:36', 'gigi');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

CREATE TABLE IF NOT EXISTS `pemeriksaan` (
  `id_pemeriksaan` int(11) NOT NULL,
  `id_korban` int(11) NOT NULL,
  `id_pemeriksa` int(11) NOT NULL,
  `id_penyidik` int(11) NOT NULL,
  `identifikasiumum` text NOT NULL,
  `identifikasihusus` text NOT NULL,
  `status_korban` enum('Hidup','Meninggal') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id_pemeriksaan`, `id_korban`, `id_pemeriksa`, `id_penyidik`, `identifikasiumum`, `identifikasihusus`, `status_korban`) VALUES
(1, 1, 1, 1, 'cek pinggang', 'cek dara', 'Meninggal'),
(2, 2, 0, 2, '', '', 'Hidup');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaanluar`
--

CREATE TABLE IF NOT EXISTS `pemeriksaanluar` (
  `id_pemeriksaanluar` int(11) NOT NULL,
  `id_jenispemeriksaanluar` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `keterangan` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaanluar`
--

INSERT INTO `pemeriksaanluar` (`id_pemeriksaanluar`, `id_jenispemeriksaanluar`, `id_pemeriksaan`, `keterangan`) VALUES
(1, 1, 1, 'bulat'),
(2, 2, 1, 'lonjong');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaantambhan`
--

CREATE TABLE IF NOT EXISTS `pemeriksaantambhan` (
  `id_pemeriksaantambahan` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `jenispemeriksaan` varchar(30) NOT NULL,
  `tujuan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaantambhan`
--

INSERT INTO `pemeriksaantambhan` (`id_pemeriksaantambahan`, `id_pemeriksaan`, `jenispemeriksaan`, `tujuan`) VALUES
(1, 1, 'belum', 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `penyidik`
--

CREATE TABLE IF NOT EXISTS `penyidik` (
  `id_penyidik` int(11) NOT NULL,
  `nm_penyidik` varchar(50) NOT NULL,
  `nrp_penyidik` varchar(25) NOT NULL,
  `pangkat_penyidik` varchar(50) NOT NULL,
  `instansi_penyidik` varchar(50) NOT NULL,
  `tgl_permintaan` datetime NOT NULL,
  `no_permintaan` varchar(30) NOT NULL,
  `perihal_permintaan` varchar(50) NOT NULL,
  `penjelasan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyidik`
--

INSERT INTO `penyidik` (`id_penyidik`, `nm_penyidik`, `nrp_penyidik`, `pangkat_penyidik`, `instansi_penyidik`, `tgl_permintaan`, `no_permintaan`, `perihal_permintaan`, `penjelasan`) VALUES
(1, '888 ,MMM,mm', '8ypyMMM', '8y9yy', 'y89y9y', '2018-08-08 00:00:00', 'hgbgjg', 'hj,gj', '                                                                                                                                                                jhbjv                                                                                                                                                                '),
(2, 'uu', '980', 'jkhj', 'jkhk', '2018-08-16 02:05:20', 'nk,', ',jnj', 'nj                    ');

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE IF NOT EXISTS `tindakan` (
  `id_tindakan` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `nm_tindakan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`id_tindakan`, `id_pemeriksaan`, `nm_tindakan`) VALUES
(1, 1, 'sebaiknya sgera dikubur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `benda`
--
ALTER TABLE `benda`
  ADD PRIMARY KEY (`id_benda`);

--
-- Indexes for table `fisikkekerasan`
--
ALTER TABLE `fisikkekerasan`
  ADD PRIMARY KEY (`id_fisikkekerasan`);

--
-- Indexes for table `jenisbenda`
--
ALTER TABLE `jenisbenda`
  ADD PRIMARY KEY (`id_jenisbenda`);

--
-- Indexes for table `jeniskeadaanumum`
--
ALTER TABLE `jeniskeadaanumum`
  ADD PRIMARY KEY (`id_jeniskeadaanumum`);

--
-- Indexes for table `jenispemeriksaanluar`
--
ALTER TABLE `jenispemeriksaanluar`
  ADD PRIMARY KEY (`id_jenispemeriksaanluar`);

--
-- Indexes for table `keadaanumum`
--
ALTER TABLE `keadaanumum`
  ADD PRIMARY KEY (`id_keadaanumum`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `korban`
--
ALTER TABLE `korban`
  ADD PRIMARY KEY (`id_korban`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `pemeriksa`
--
ALTER TABLE `pemeriksa`
  ADD PRIMARY KEY (`id_pemeriksa`);

--
-- Indexes for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`),
  ADD KEY `id_penyidik` (`id_penyidik`),
  ADD KEY `id_pemeriksa` (`id_pemeriksa`),
  ADD KEY `id_korban` (`id_korban`);

--
-- Indexes for table `pemeriksaanluar`
--
ALTER TABLE `pemeriksaanluar`
  ADD PRIMARY KEY (`id_pemeriksaanluar`);

--
-- Indexes for table `pemeriksaantambhan`
--
ALTER TABLE `pemeriksaantambhan`
  ADD PRIMARY KEY (`id_pemeriksaantambahan`);

--
-- Indexes for table `penyidik`
--
ALTER TABLE `penyidik`
  ADD PRIMARY KEY (`id_penyidik`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id_tindakan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `benda`
--
ALTER TABLE `benda`
  MODIFY `id_benda` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fisikkekerasan`
--
ALTER TABLE `fisikkekerasan`
  MODIFY `id_fisikkekerasan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jenisbenda`
--
ALTER TABLE `jenisbenda`
  MODIFY `id_jenisbenda` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jeniskeadaanumum`
--
ALTER TABLE `jeniskeadaanumum`
  MODIFY `id_jeniskeadaanumum` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jenispemeriksaanluar`
--
ALTER TABLE `jenispemeriksaanluar`
  MODIFY `id_jenispemeriksaanluar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `keadaanumum`
--
ALTER TABLE `keadaanumum`
  MODIFY `id_keadaanumum` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `korban`
--
ALTER TABLE `korban`
  MODIFY `id_korban` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pemeriksa`
--
ALTER TABLE `pemeriksa`
  MODIFY `id_pemeriksa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pemeriksaanluar`
--
ALTER TABLE `pemeriksaanluar`
  MODIFY `id_pemeriksaanluar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pemeriksaantambhan`
--
ALTER TABLE `pemeriksaantambhan`
  MODIFY `id_pemeriksaantambahan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penyidik`
--
ALTER TABLE `penyidik`
  MODIFY `id_penyidik` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id_tindakan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
