-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2019 at 01:14 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ta_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` varchar(5) NOT NULL,
  `nm_anggota` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `ttl_anggota` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nm_anggota`, `alamat`, `ttl_anggota`, `status`) VALUES
('A001', 'Naruto', 'Konoha', '2017-08-15', 'Pasif'),
('A002', 'Sasuke', 'Konoha', '2010-06-05', 'Aktif'),
('A003', 'Law', 'North Blue', '2019-02-05', 'Aktif'),
('A004', 'Luffy', 'East Blue', '2019-01-28', 'Aktif'),
('A005', 'Sanji', 'East Blue', '1998-12-22', 'Aktif'),
('A006', 'Zoro', 'East Blue', '1998-01-01', 'Aktif'),
('A007', 'Sakura', 'Konoha', '1998-12-12', 'Aktif'),
('A008', 'Nami', 'East Blue', '1996-01-02', 'Aktif'),
('A009', 'Usopp', 'East Blue', '1997-09-17', 'Aktif'),
('A010', 'Itachi', 'Konoha', '1995-08-30', 'Aktif'),
('A011', 'Tsunade', 'Konoha', '1980-12-08', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `id_buku` varchar(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `pengarang`, `penerbit`, `jumlah_buku`) VALUES
('B001', 'Dunia Malam', 'Antah Barantah', 'PT Gelap Malam', 100),
('B002', 'Dunia Malam Part 2', 'Antah Barantah', 'PT Gelap Malam', 201),
('B003', 'Lakar Pelangi', 'Andrea', 'PT Asik', 100),
('B004', 'Tenggelamlah', 'Aditya', 'PT Mantul', 100),
('B005', 'Mancing Emosi!', 'Wana', 'Pt Jijik', 100),
('B006', 'Kelas Kosong', 'Hidayat', 'Pt Kusci', 99),
('B007', 'Nasibku', 'Yaya', 'Pt Murni', 99),
('B008', 'Bujang Lapuak', 'Hamka', 'Pt Deli', 100),
('B009', '1000 Kuaci', 'Hamka', 'Pt Deli', 100),
('B010', 'Bola Lambung', 'Awak', 'Pt Awak', 100),
('B011', 'Siapa?', 'Upin', 'Pt Yudistira', 100),
('B012', 'Isaik Gilo 123', 'Isaik123', 'Panjang', 133);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan`
--
CREATE TABLE IF NOT EXISTS `laporan` (
`id_pinjam` varchar(25)
,`nm_anggota` varchar(32)
,`judul` varchar(100)
,`tgl_pinjam` date
,`tgl_kembali` date
,`kembali` varchar(5)
);
-- --------------------------------------------------------

--
-- Table structure for table `meminjam`
--

CREATE TABLE IF NOT EXISTS `meminjam` (
  `id_pinjam` varchar(25) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `jumlah_pinjam` int(2) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_anggota` varchar(5) NOT NULL,
  `id_buku` varchar(5) NOT NULL,
  `kembali` varchar(5) NOT NULL,
  PRIMARY KEY (`id_pinjam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meminjam`
--

INSERT INTO `meminjam` (`id_pinjam`, `tgl_pinjam`, `jumlah_pinjam`, `tgl_kembali`, `id_anggota`, `id_buku`, `kembali`) VALUES
('ODJ-9921-0001', '2019-02-20', 1, '2019-10-21', 'A001', 'B001', 'IN'),
('ODJ-9921-0002', '2017-06-06', 1, '2019-02-26', 'A001', 'B001', 'IN'),
('ODJ-9921-0003', '2019-02-20', 1, '0000-00-00', 'A002', 'B007', 'OUT'),
('ODJ-9921-0004', '2019-02-25', 1, '0000-00-00', 'A004', 'B006', 'OUT'),
('ODJ-9921-0005', '2019-10-07', 1, '2019-10-21', 'A001', 'B001', 'IN'),
('ODJ-9921-0006', '2019-10-02', 1, '2019-10-16', 'A001', 'B001', 'IN'),
('ODJ-9921-0007', '2019-10-14', 1, '2019-09-17', 'A001', 'B002', 'IN');

-- --------------------------------------------------------

--
-- Table structure for table `tblevel`
--

CREATE TABLE IF NOT EXISTS `tblevel` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(225) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblevel`
--

INSERT INTO `tblevel` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'operator'),
(3, 'owner'),
(4, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE IF NOT EXISTS `tbuser` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `id_level` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`id_user`, `nama`, `username`, `password`, `id_level`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'operator', 'operator', '4b583376b2767b923c3e1da60d10de59', 2),
(3, 'owner', 'owner', '72122ce96bfec66e2396d2e25225d70a', 3),
(4, 'Syahrul', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 4);

-- --------------------------------------------------------

--
-- Structure for view `laporan`
--
DROP TABLE IF EXISTS `laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan` AS select `meminjam`.`id_pinjam` AS `id_pinjam`,`anggota`.`nm_anggota` AS `nm_anggota`,`buku`.`judul` AS `judul`,`meminjam`.`tgl_pinjam` AS `tgl_pinjam`,`meminjam`.`tgl_kembali` AS `tgl_kembali`,`meminjam`.`kembali` AS `kembali` from ((`meminjam` join `anggota`) join `buku`) where ((`anggota`.`id_anggota` = `meminjam`.`id_anggota`) and (`buku`.`id_buku` = `meminjam`.`id_buku`));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
