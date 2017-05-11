-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 Mei 2017 pada 06.14
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_raport`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `ID_Admin` int(11) NOT NULL,
  `Pass_Admin` varchar(100) NOT NULL,
  `Email_Admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_guru`
--

CREATE TABLE `alamat_guru` (
  `FK_ID_Guru` int(11) NOT NULL,
  `Alamat_Guru` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_siswa`
--

CREATE TABLE `alamat_siswa` (
  `FK_ID_Siswa` int(11) NOT NULL,
  `Alamat_Siswa` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_wk`
--

CREATE TABLE `alamat_wk` (
  `FK_ID_WK` int(11) NOT NULL,
  `Alamat_WK` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `ID_Guru` int(11) NOT NULL,
  `Nama_Guru` varchar(100) NOT NULL,
  `Email_Guru` varchar(100) NOT NULL,
  `Pass_Guru` varchar(100) NOT NULL,
  `FK_ID_Siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `melihat_raport_wk`
--

CREATE TABLE `melihat_raport_wk` (
  `FK_ID_WK` int(11) NOT NULL,
  `FK_ID_Siswa` int(11) NOT NULL,
  `Semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mengajar_guru_siswa`
--

CREATE TABLE `mengajar_guru_siswa` (
  `FK_ID_Guru` int(11) NOT NULL,
  `FK_ID_Siswa` int(11) NOT NULL,
  `Mata_Pelajaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mengisi_raport_guru`
--

CREATE TABLE `mengisi_raport_guru` (
  `FK_ID_Guru` int(11) NOT NULL,
  `FK_ID_Siswa` int(11) NOT NULL,
  `Semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `raport`
--

CREATE TABLE `raport` (
  `Semester` int(11) NOT NULL,
  `FK_ID_Siswa` int(11) NOT NULL,
  `Nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `ID_Siswa` int(11) NOT NULL,
  `Nama_Siswa` varchar(100) NOT NULL,
  `Pass_Siswa` varchar(100) NOT NULL,
  `Nama_Ortu` varchar(100) NOT NULL,
  `Email_Siswa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`ID_Siswa`, `Nama_Siswa`, `Pass_Siswa`, `Nama_Ortu`, `Email_Siswa`) VALUES
(12345, 'FERINA', 'auo', 'SISWANTO', 'ferina@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `ID_WK` int(11) NOT NULL,
  `Nama_WK` varchar(30) NOT NULL,
  `Pass_WK` varchar(100) NOT NULL,
  `Kelas_WK` varchar(10) NOT NULL,
  `Email_WK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`ID_Guru`),
  ADD KEY `idx_Siswa` (`FK_ID_Siswa`);

--
-- Indexes for table `raport`
--
ALTER TABLE `raport`
  ADD PRIMARY KEY (`Semester`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`ID_Siswa`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`ID_WK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_Admin` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `ID_Guru` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `raport`
--
ALTER TABLE `raport`
  MODIFY `Semester` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `ID_Siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;
--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `ID_WK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`FK_ID_Siswa`) REFERENCES `siswa` (`ID_Siswa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
