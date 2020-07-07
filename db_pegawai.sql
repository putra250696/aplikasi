-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2015 at 02:01 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_pegawai`
--
CREATE DATABASE IF NOT EXISTS `db_pegawai` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_pegawai`;

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE IF NOT EXISTS `absensi` (
  `id_absensi` int(10) NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) NOT NULL,
  `tanggal_absen` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `status_masuk` enum('Y','N') NOT NULL DEFAULT 'N',
  `status_keluar` enum('Y','N') NOT NULL DEFAULT 'N',
  `ket` char(2) NOT NULL DEFAULT 'NA',
  `terlambat` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_absensi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `nip`, `tanggal_absen`, `jam_masuk`, `jam_keluar`, `status_masuk`, `status_keluar`, `ket`, `terlambat`) VALUES
(49, 'p3', '2015-06-10', '05:11:58', '05:12:25', 'Y', 'Y', 'M', 'N'),
(48, 'p2', '2015-06-10', '05:11:29', '00:00:00', 'Y', 'N', 'NA', 'N'),
(47, 'p1', '2015-06-10', '05:10:46', '06:00:48', 'Y', 'Y', 'M', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE IF NOT EXISTS `bagian` (
  `id_bag` varchar(4) NOT NULL,
  `n_bag` varchar(25) NOT NULL,
  PRIMARY KEY (`id_bag`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id_bag`, `n_bag`) VALUES
('B001', 'PRODUKSI'),
('B002', 'PEMASARAN'),
('B003', 'PERSONALIA'),
('B004', 'UJI KUALITAS'),
('B005', 'HUMAS');

-- --------------------------------------------------------

--
-- Table structure for table `h_jabatan`
--

CREATE TABLE IF NOT EXISTS `h_jabatan` (
  `idh` int(11) NOT NULL AUTO_INCREMENT,
  `idkjb` varchar(4) NOT NULL,
  `jab_old` varchar(20) NOT NULL,
  `tgl_ajb` date NOT NULL,
  `jabatan_baru` varchar(20) NOT NULL,
  `tgl_kjb` date NOT NULL,
  PRIMARY KEY (`idh`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `h_jabatan`
--

INSERT INTO `h_jabatan` (`idh`, `idkjb`, `jab_old`, `tgl_ajb`, `jabatan_baru`, `tgl_kjb`) VALUES
(10, 'KJ01', 'Rekom', '2009-01-16', 'Kepala Rekom', '2013-01-16'),
(11, 'KJ01', 'Kepala Rekom', '2009-01-16', 'Mgr.Rekom', '2013-01-16'),
(13, 'KJ02', 'KEPALA CABANG', '2010-06-01', 'SUPERVISOR', '2015-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jab` varchar(4) NOT NULL,
  `n_jab` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jab`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jab`, `n_jab`) VALUES
('J002', 'SUPERVISOR'),
('J001', 'MANAGER'),
('J003', 'KEPALA CABANG'),
('J004', 'BAGIAN UMUM'),
('J005', 'STAFF ADMINISTRASI'),
('J006', 'MARKETING'),
('J007', 'GENERAL MANAGER'),
('J008', 'KEPALA STAFF');

-- --------------------------------------------------------

--
-- Table structure for table `k_jabatan`
--

CREATE TABLE IF NOT EXISTS `k_jabatan` (
  `idkjb` varchar(4) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `masa_kerja` int(10) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`idkjb`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `k_jabatan`
--

INSERT INTO `k_jabatan` (`idkjb`, `nip`, `masa_kerja`, `keterangan`) VALUES
('KJ01', '1234', 4, 'dsda'),
('KJ02', 'p2', 5, 'Kinerja pekerjaan Meningkat dan masakerja sudah lama maka di ');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `nip` varchar(10) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tmpt_lahir` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_bag` varchar(4) NOT NULL,
  `id_jab` varchar(4) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `tmpt_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `tgl_masuk`, `id_bag`, `id_jab`, `foto`) VALUES
('p1', 'MOCHAMAD RIDWAN', 'BANDUNG', '1994-06-17', 'L', 'JL.LASWI 331 CANGKRING JELEKONG BALEENDAH', '2009-01-01', 'B001', 'J001', '4653322 x 3.jpg'),
('p2', 'JENI PARYANA', 'BANDUNG', '1993-06-07', 'L', 'manggungharja ciparay 200', '2009-06-01', 'B002', 'J002', '407745jeni.jpg'),
('p3', 'AL AGAM SANDI ALAM', 'BANDUNG', '1990-09-11', 'L', 'CIPARAY 33', '2010-10-10', 'B003', 'J005', '847930AGAM2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE IF NOT EXISTS `pelatihan` (
  `id_pelatihan` int(4) NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) NOT NULL,
  `tgl_pelatihan` date NOT NULL,
  `topik_pelatihan` varchar(100) NOT NULL,
  `penyelenggara` text NOT NULL,
  `hasil_pelatihan` int(10) NOT NULL,
  PRIMARY KEY (`id_pelatihan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`id_pelatihan`, `nip`, `tgl_pelatihan`, `topik_pelatihan`, `penyelenggara`, `hasil_pelatihan`) VALUES
(4, 'p1', '2015-01-01', 'Peningkatan jumlah produksi sesuai sasaran target ', 'Jasa SDM', 80),
(5, 'p2', '2012-12-12', 'Peningkatan kinerja pemasaran guna meningkatkan penjualan produk dan jasa', 'Pakar Kinerja', 60);

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE IF NOT EXISTS `pendidikan` (
  `idp` int(4) NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) NOT NULL,
  `t_pdk` varchar(20) NOT NULL,
  `d_pdk` text NOT NULL,
  PRIMARY KEY (`idp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`idp`, `nip`, `t_pdk`, `d_pdk`) VALUES
(1, '1234', '2000 - 2006', 'SD Negeri 2 Palembang'),
(2, '1234', '2006 - 2007', 'SMP Negeri 3 Palembang'),
(3, '1234', '2007 - 2010', 'SMA 1 Negeri Palembang'),
(6, 'p1', '2000-2006', 'SDN ME SUBIADINATA'),
(7, 'p1', '2006-2009', 'SMPN 1 CIPARAY'),
(8, 'p1', '2009-2012', 'SMKN 7 BALEENDAH');

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman_kerja`
--

CREATE TABLE IF NOT EXISTS `pengalaman_kerja` (
  `id_peker` int(4) NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) NOT NULL,
  `nm_pekerjaan` varchar(50) NOT NULL,
  `d_pekerjaan` text NOT NULL,
  PRIMARY KEY (`id_peker`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pengalaman_kerja`
--

INSERT INTO `pengalaman_kerja` (`id_peker`, `nip`, `nm_pekerjaan`, `d_pekerjaan`) VALUES
(1, '1234', 'Freelance Networking ', 'Rancang bangun jaringan untuk warnet.'),
(2, '1234', 'Freelance Web Programmer', '- Merancang Aplikasi Berbasis Web untuk keperluan TA/Skripsi mahasiswa.\r\n- Merancang dan membangun website toko online, Personal, Akademik dan Company profile.\r\n'),
(7, 'p1', 'Pemasangan  baru Telpon dan Speedy di MDF', '-Memasang baru jalur line baru telpon dan speedy\r\n-Pencabutan line telpon dan internet speedy');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` varchar(50) NOT NULL,
  `passid` varchar(50) NOT NULL,
  `level_user` int(2) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `passid`, `level_user`) VALUES
('admin', 'admin', 1),
('p1', 'ridwan', 3),
('pimpinan', 'pimpinan', 2),
('p2', 'jeni', 3),
('p3', 'agam', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
