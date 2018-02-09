-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2016 at 09:54 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `health_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID_ADMIN` varchar(20) NOT NULL,
  `USERNAME` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `USERNAME`, `PASSWORD`) VALUES
('130411100047', 'isna', '3d1c3481dd9ce3d7e31f3bee188cee35');

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE IF NOT EXISTS `antrian` (
`ID_ANTRIAN` int(11) NOT NULL,
  `NIK_PASIEN` varchar(20) DEFAULT NULL,
  `ID_JADWAL` int(11) DEFAULT NULL,
  `NO_ANTRIAN` int(11) DEFAULT NULL,
  `KELUHAN` text,
  `TGL_MASUK` date DEFAULT NULL,
  `TGL_DAFTAR` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`ID_ANTRIAN`, `NIK_PASIEN`, `ID_JADWAL`, `NO_ANTRIAN`, `KELUHAN`, `TGL_MASUK`, `TGL_DAFTAR`) VALUES
(1, '00099', 9, 1, 'Panas\r\n', '2016-06-21', '2016-06-22'),
(2, '1344', 15, 1, 'Budek', '2016-06-21', '2016-06-22'),
(3, '213425452', 3, 1, 'Ngilu', '2016-06-21', '2016-06-22'),
(4, '5425125534', 3, 2, 'Ngilu', '2016-06-21', '2016-06-22'),
(5, '46764345', 15, 2, 'Tenggorokan', '2016-06-21', '2016-06-22'),
(6, '6456235623', 15, 3, 'Hidung tersumbat\r\n', '2016-06-21', '2016-06-22'),
(7, '45363456435', 9, 2, 'Demam', '2016-06-21', '2016-06-22'),
(8, '5632623554', 16, 1, 'Hidung tersumbat', '2016-06-22', '2016-06-23'),
(9, '345353542', 36, 1, 'Merah', '2016-06-22', '2016-06-23'),
(10, '4534453453', 30, 1, 'Sakit Perut', '2016-06-22', '2016-06-23'),
(11, '34532764756', 4, 1, 'Ngilu', '2016-06-22', '2016-06-23'),
(12, '23424512', 10, 1, 'Panas', '2016-06-22', '2016-06-23'),
(13, '1222', 36, 2, 'Iritasi', '2016-06-22', '2016-06-23'),
(14, '5425125534', 31, 1, 'Sakit perut\r\n', '2016-06-23', '2016-06-24'),
(15, '00099', 37, 1, 'iritasi\r\n', '2016-06-23', '2016-06-24'),
(16, '1344', 5, 1, 'cabut gigi', '2016-06-23', '2016-06-24'),
(17, '213425452', 5, 2, 'lubang', '2016-06-23', '2016-06-24'),
(18, '245245245', 5, 3, 'Perawatan', '2016-06-23', '2016-06-24'),
(19, '435363353', 11, 1, 'sakit perut', '2016-06-23', '2016-06-24'),
(20, '46764345', 17, 1, 'hidung tersumbat', '2016-06-23', '2016-06-24'),
(21, '865866453', 5, 4, 'Ngilu', '2016-06-23', '2016-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `NIP_DOKTER` varchar(20) NOT NULL,
  `ID_POLI` int(11) DEFAULT NULL,
  `NAMA_DOKTER` varchar(100) DEFAULT NULL,
  `SPESIALIS` varchar(20) DEFAULT NULL,
  `ALAMAT_DOKTER` text,
  `TGL_LAHIR_DOKTER` date DEFAULT NULL,
  `JENIS_KELAMIN_DOKTER` varchar(15) DEFAULT NULL,
  `NO_TELP_DOKTER` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`NIP_DOKTER`, `ID_POLI`, `NAMA_DOKTER`, `SPESIALIS`, `ALAMAT_DOKTER`, `TGL_LAHIR_DOKTER`, `JENIS_KELAMIN_DOKTER`, `NO_TELP_DOKTER`) VALUES
('12354253', 3, 'Susi', '', 'Bangkalan', '1978-07-16', 'Perempuan', '083253184555'),
('1304819371', 1, 'Susan', '', 'Surabaya', '1978-07-30', 'Perempuan', '08912342321'),
('1342342349', 2, 'Tika', '', 'Bangkalan', '1970-05-15', 'Perempuan', '08923434321'),
('134293843', 2, 'Annisa', 'Gigi dan mulut', 'Bangkalan', '1989-02-28', 'Perempuan', '08913232133'),
('135345435', 1, 'Via', '', 'Bangkalan', '1989-01-14', 'Perempuan', '08324235463'),
('138723481', 2, 'Abdul', 'Orto', 'Surabaya', '1975-07-29', 'Laki-laki', '083253186555'),
('24534532', 5, 'Siti', NULL, 'Bangkalan', '1992-11-16', 'Perempuan', '0823235652'),
('452345356', 4, 'Ayu', NULL, 'Bangkalan', '1990-06-16', 'Perempuan', '0842535423');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
`ID_JADWAL` int(11) NOT NULL,
  `NIP_DOKTER` varchar(20) DEFAULT NULL,
  `HARI` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`ID_JADWAL`, `NIP_DOKTER`, `HARI`) VALUES
(1, '134293843', 'Senin'),
(2, '138723481', 'Selasa'),
(3, '138723481', 'Rabu'),
(4, '1342342349', 'Kamis'),
(5, '1342342349', 'Jumat'),
(6, '134293843', 'Sabtu'),
(7, '1304819371', 'Senin'),
(8, '1304819371', 'Selasa'),
(9, '1304819371', 'Rabu'),
(10, '135345435', 'Kamis'),
(11, '135345435', 'Jumat'),
(12, '135345435', 'Sabtu'),
(13, '12354253', 'Senin'),
(14, '12354253', 'Selasa'),
(15, '12354253', 'Rabu'),
(16, '12354253', 'Kamis'),
(17, '12354253', 'Jumat'),
(18, '12354253', 'Sabtu'),
(27, '452345356', 'Senin'),
(28, '452345356', 'Selasa'),
(29, '452345356', 'Rabu'),
(30, '452345356', 'Kamis'),
(31, '452345356', 'Jumat'),
(32, '452345356', 'Sabtu'),
(33, '24534532', 'Senin'),
(34, '24534532', 'Selasa'),
(35, '24534532', 'Rabu'),
(36, '24534532', 'Kamis'),
(37, '24534532', 'Jumat'),
(38, '24534532', 'Sabtu');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `NIK_PASIEN` varchar(20) NOT NULL,
  `ID_PEKERJAAN` int(11) DEFAULT NULL,
  `NAMA_PASIEN` varchar(100) DEFAULT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `NO_TELP_PASIEN` varchar(15) DEFAULT NULL,
  `JENIS_KELAMIN_PASIEN` varchar(15) DEFAULT NULL,
  `GOL_DARAH` varchar(100) DEFAULT NULL,
  `ALAMAT` text,
  `TGL_LAHIR` date DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`NIK_PASIEN`, `ID_PEKERJAAN`, `NAMA_PASIEN`, `USERNAME`, `PASSWORD`, `NO_TELP_PASIEN`, `JENIS_KELAMIN_PASIEN`, `GOL_DARAH`, `ALAMAT`, `TGL_LAHIR`, `STATUS`) VALUES
('00099', 1, 'Dandy', 'dandy', '5b25b686cdb35a9d944d703d79578348', '08999878', 'Laki-laki', 'O', 'Jl. Tanah Merah 1 / 11', '2016-06-14', 'Belum Menikah'),
('1222', 1, 'ani', 'ani', '29d1e2357d7c14db51e885053a58ec67', '0877636332', 'Perempuan', 'B', 'Jl. mulyorejo', '2016-06-20', 'Belum Menikah'),
('1344', 2, 'Mujib', 'mujib', '1d9e813dfb2905bebd40c3e99731a125', '09999882', 'Laki-laki', 'O', 'Jl. Kamal', '2016-06-13', 'Menikah'),
('213425452', 2, 'Diana', 'diana12', '3a23bb515e06d0e944ff916e79a7775c', '08342311323', 'Perempuan', 'B', 'Bangkalan', '1982-09-29', 'Menikah'),
('23424512', 2, 'Agus', 'agusaja', 'd60e4b9c651b442f03719546f5ef7a09', '08342452222', 'Laki-laki', 'AB', 'Socah', '1993-08-29', 'Belum Menikah'),
('245245245', 2, 'Aini', 'aini24', '8274b82aa057f3df1908084f14c55ec3', '08934134112', 'Perempuan', 'O', 'Bangkalan', '1995-04-30', 'Menikah'),
('34532764756', 1, 'Terry', 'terry66', 'dd5585a92b04d4420477ee6082770fd1', '0812434131', 'Laki-laki', 'O', 'Surabaya', '1989-08-29', 'Menikah'),
('345353542', 3, 'Aldi', 'aldi', '5cf15fc7e77e85f5d525727358c0ffc9', '0824253453', 'Laki-laki', 'O', 'Kamal', '1995-10-29', 'Menikah'),
('435363353', 2, 'Rivaldy', 'rivaldy', 'b228cc7b386e41b87456d99243eab52b', '08234234342', 'Laki-laki', 'O', 'Bangkalan', '1995-10-29', 'Belum Menikah'),
('4534453453', 4, 'Saiful', 'say12', 'ed507fe47db141a7f10c1e679fefb43c', '0834234132', 'Laki-laki', 'AB', 'Bangkalan', '1991-01-28', 'Belum Menikah'),
('45363456435', 2, 'Dyah', 'dyah', 'd9ec7a2bcb5f792f101501f700977ec7', '08342424311', 'Perempuan', 'B', 'Bangkalan', '1995-10-29', 'Belum Menikah'),
('46764345', 3, 'Rizal', 'rizal', '150fb021c56c33f82eef99253eb36ee1', '083545234234', 'Laki-laki', 'O', 'Bangkalan', '1995-10-30', 'Belum Menikah'),
('5425125534', 1, 'Fanany', 'fanany', '336cc329a383eb21732815af0aa288ae', '', 'Laki-laki', 'A', 'Kamal', '1993-10-28', 'Belum Menikah'),
('5632623554', 2, 'Ratna', 'ratna', '38753adc9fa129fd3626592006c4e8ce', '0824252452', 'Perempuan', 'B', 'Mojokerto', '1995-09-29', 'Belum Menikah'),
('6456235623', 1, 'Devi', 'devi12', 'f5c2db1f19bdde37e740e86b70d0534f', '08323454555', 'Perempuan', 'A', 'Surabaya', '1995-09-28', 'Belum Menikah'),
('865866453', 1, 'Rohman', 'rohman', '2397977a0e43fb1f5ee26fe993674b5b', '08232134243', 'Laki-laki', 'A', 'Kamal', '1990-09-29', 'Belum Menikah');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE IF NOT EXISTS `pekerjaan` (
`ID_PEKERJAAN` int(11) NOT NULL,
  `NAMA_PEKERJAAN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`ID_PEKERJAAN`, `NAMA_PEKERJAAN`) VALUES
(1, 'PNS'),
(2, 'Wiraswasta'),
(3, 'Swasta'),
(4, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE IF NOT EXISTS `poli` (
`ID_POLI` int(11) NOT NULL,
  `NAMA_POLI` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`ID_POLI`, `NAMA_POLI`) VALUES
(1, 'Poli Anak'),
(2, 'Poli Gigi'),
(3, 'Poli THT'),
(4, 'Poli Dalam'),
(5, 'Poli Mata');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_poli`
--

CREATE TABLE IF NOT EXISTS `transaksi_poli` (
`ID_TRANSAKSI` int(11) NOT NULL,
  `ID_ANTRIAN` int(11) DEFAULT NULL,
  `TGL_PERIKSA` date DEFAULT NULL,
  `DIAGNOSA_DOKTER` text,
  `TINDAKAN` text,
  `BIAYA_PERIKSA` float(8,2) DEFAULT NULL,
  `BIAYA_ADMIN` float(8,2) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `transaksi_poli`
--

INSERT INTO `transaksi_poli` (`ID_TRANSAKSI`, `ID_ANTRIAN`, `TGL_PERIKSA`, `DIAGNOSA_DOKTER`, `TINDAKAN`, `BIAYA_PERIKSA`, `BIAYA_ADMIN`) VALUES
(1, 4, '2016-06-23', 'Lubang', 'tambal', 50000.00, 5000.00),
(2, 6, '2016-06-23', 'Polip', 'Obat', 25000.00, 5000.00),
(3, 7, '2016-06-23', 'Demam', 'obat', 15000.00, 5000.00),
(4, 5, '2016-06-23', 'Radang', 'obat', 25000.00, 5000.00),
(5, 2, '2016-06-23', 'tersumbat air', 'penghilangan sumbatan', 45000.00, 5000.00),
(6, 1, '2016-06-23', 'Demam', 'Pemberian obat', 25000.00, 5000.00),
(7, 3, '2016-06-23', 'Lubang', 'Penambalan', 50000.00, 5000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
 ADD PRIMARY KEY (`ID_ANTRIAN`), ADD KEY `FK_MENDAFTAR` (`NIK_PASIEN`), ADD KEY `ID_JADWAL` (`ID_JADWAL`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
 ADD PRIMARY KEY (`NIP_DOKTER`), ADD KEY `ID_POLI` (`ID_POLI`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
 ADD PRIMARY KEY (`ID_JADWAL`), ADD KEY `FK_JADWAL_DOKTER` (`NIP_DOKTER`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
 ADD PRIMARY KEY (`NIK_PASIEN`), ADD KEY `FK_BEKERJA` (`ID_PEKERJAAN`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
 ADD PRIMARY KEY (`ID_PEKERJAAN`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
 ADD PRIMARY KEY (`ID_POLI`);

--
-- Indexes for table `transaksi_poli`
--
ALTER TABLE `transaksi_poli`
 ADD PRIMARY KEY (`ID_TRANSAKSI`), ADD KEY `FK_MENCATAT` (`ID_ANTRIAN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
MODIFY `ID_ANTRIAN` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
MODIFY `ID_JADWAL` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
MODIFY `ID_PEKERJAAN` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
MODIFY `ID_POLI` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transaksi_poli`
--
ALTER TABLE `transaksi_poli`
MODIFY `ID_TRANSAKSI` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `antrian`
--
ALTER TABLE `antrian`
ADD CONSTRAINT `antrian_ibfk_1` FOREIGN KEY (`ID_JADWAL`) REFERENCES `jadwal` (`ID_JADWAL`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `antrian_ibfk_2` FOREIGN KEY (`NIK_PASIEN`) REFERENCES `pasien` (`NIK_PASIEN`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`ID_POLI`) REFERENCES `poli` (`ID_POLI`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`NIP_DOKTER`) REFERENCES `dokter` (`NIP_DOKTER`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`ID_PEKERJAAN`) REFERENCES `pekerjaan` (`ID_PEKERJAAN`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_poli`
--
ALTER TABLE `transaksi_poli`
ADD CONSTRAINT `transaksi_poli_ibfk_1` FOREIGN KEY (`ID_ANTRIAN`) REFERENCES `antrian` (`ID_ANTRIAN`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
