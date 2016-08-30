-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2016 at 02:28 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_daftar`
--

CREATE TABLE IF NOT EXISTS `form_daftar` (
`id_daftar` int(11) NOT NULL,
  `nim_daftar` int(30) NOT NULL,
  `nama_daftar` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `jurusan_daftar` varchar(255) NOT NULL,
  `alamat_daftar` varchar(255) NOT NULL,
  `handphone_daftar` int(30) NOT NULL,
  `email_daftar` varchar(255) NOT NULL,
  `status_daftar` enum('tunggu','ditolak','diterima') NOT NULL,
  `password_daftar` int(30) NOT NULL,
  `tanggal_daftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_admin`
--

CREATE TABLE IF NOT EXISTS `master_admin` (
`id_admin` int(11) NOT NULL,
  `nama_admin` int(11) NOT NULL,
  `nip_admin` int(11) NOT NULL,
  `tanggal_lahir_admin` date NOT NULL,
  `tempat_lahir_admin` int(11) NOT NULL,
  `jenis_kelamin_admin` int(11) NOT NULL,
  `program_studi_admin` int(11) NOT NULL,
  `pendidikan_tertinggi_admin` int(11) NOT NULL,
  `jabatan_admin` int(11) NOT NULL,
  `alamat_admin` int(11) NOT NULL,
  `handphone_admin` int(11) NOT NULL,
  `email_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_anggota`
--

CREATE TABLE IF NOT EXISTS `master_anggota` (
`id_anggota` int(30) NOT NULL,
  `nama_anggota1` varchar(255) NOT NULL,
  `nim_anggota1` int(30) NOT NULL,
  `jurusan_anggota1` varchar(255) NOT NULL,
  `program_studi_anggota1` varchar(255) NOT NULL,
  `jenis_kelamin_anggota1` varchar(255) NOT NULL,
  `nama_anggota2` varchar(255) NOT NULL,
  `nim_anggota2` int(30) NOT NULL,
  `jurusan_anggota2` varchar(255) NOT NULL,
  `program_studi_anggota2` varchar(255) NOT NULL,
  `jenis_kelamin_anggota2` varchar(255) NOT NULL,
  `nama_anggota3` varchar(255) NOT NULL,
  `nim_anggota3` int(30) NOT NULL,
  `jurusan_anggota3` varchar(255) NOT NULL,
  `program_studi_anggota3` varchar(255) NOT NULL,
  `jenis_kelamin_anggota3` varchar(255) NOT NULL,
  `nama_anggota4` varchar(255) NOT NULL,
  `nim_anggota4` int(30) NOT NULL,
  `jurusan_anggota4` varchar(255) NOT NULL,
  `program_studi_anggota4` varchar(255) NOT NULL,
  `jenis_kelamin_anggota4` varchar(255) NOT NULL,
  `nama_anggota5` varchar(255) NOT NULL,
  `nim_anggota5` int(30) NOT NULL,
  `jurusan_anggota5` varchar(255) NOT NULL,
  `program_studi_anggota5` varchar(255) NOT NULL,
  `jenis_kelamin_anggota5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_bekas_pkm`
--

CREATE TABLE IF NOT EXISTS `master_bekas_pkm` (
`id_berkas_pkm` int(30) NOT NULL,
  `berkas_pkm` text NOT NULL,
  `lampiran_berkas_pkm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_berkas_informasi`
--

CREATE TABLE IF NOT EXISTS `master_berkas_informasi` (
`id_berkas_informasi` int(30) NOT NULL,
  `berkas_informasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_dosen`
--

CREATE TABLE IF NOT EXISTS `master_dosen` (
`id_dosen` int(30) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
  `nip_dosen` int(30) NOT NULL,
  `tanggal_lahir_dosen` date NOT NULL,
  `tempat_lahir_dosen` varchar(255) NOT NULL,
  `jenis_kelamin_dosen` varchar(255) NOT NULL,
  `program_studi_dosen` varchar(255) NOT NULL,
  `pendidikan_tertinggi_dosen` varchar(255) NOT NULL,
  `alamat_dosen` varchar(255) NOT NULL,
  `handphone_dosen` int(30) NOT NULL,
  `email_dosen` varchar(255) NOT NULL,
  `status_dosen` enum('aktif_mengajar','tidak_aktif_mengajar') NOT NULL,
  `status_ikatan_kerja_dosen` enum('PNS','non_PNS','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_informasi`
--

CREATE TABLE IF NOT EXISTS `master_informasi` (
`id_informasi` int(30) NOT NULL,
  `artikel_informasi` varchar(255) NOT NULL,
  `pengumuman_informasi` varchar(255) NOT NULL,
  `berkas` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `master_mahasiswa` (
`id_mahasiswa` int(30) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `nim_mahasiswa` int(30) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `program_studi_mahasiswa` varchar(255) NOT NULL,
  `jenis_kelamin_mahasiswa` varchar(255) NOT NULL,
  `tanggal_lahir_mahasiswa` date NOT NULL,
  `tempat_lahir_mahasiswa` varchar(255) NOT NULL,
  `alamat_mahasiswa` varchar(255) NOT NULL,
  `handphone_mahasiswa` int(30) NOT NULL,
  `email_mahasiswa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_proposal`
--

CREATE TABLE IF NOT EXISTS `master_proposal` (
`id_proposal` int(30) NOT NULL,
  `judul_proposal` varchar(255) NOT NULL,
  `bidang_kegiatan_proposal` varchar(255) NOT NULL,
  `bidang_ilmu_proposal` varchar(255) NOT NULL,
  `sumber_penulisan_proposal` varchar(255) NOT NULL,
  `dana_dikti_proposal` int(30) NOT NULL,
  `dana_masyarakat_proposal` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_daftar`
--
ALTER TABLE `form_daftar`
 ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `master_admin`
--
ALTER TABLE `master_admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `master_anggota`
--
ALTER TABLE `master_anggota`
 ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `master_bekas_pkm`
--
ALTER TABLE `master_bekas_pkm`
 ADD PRIMARY KEY (`id_berkas_pkm`);

--
-- Indexes for table `master_berkas_informasi`
--
ALTER TABLE `master_berkas_informasi`
 ADD PRIMARY KEY (`id_berkas_informasi`);

--
-- Indexes for table `master_dosen`
--
ALTER TABLE `master_dosen`
 ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `master_informasi`
--
ALTER TABLE `master_informasi`
 ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `master_mahasiswa`
--
ALTER TABLE `master_mahasiswa`
 ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `master_proposal`
--
ALTER TABLE `master_proposal`
 ADD PRIMARY KEY (`id_proposal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_daftar`
--
ALTER TABLE `form_daftar`
MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_admin`
--
ALTER TABLE `master_admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_anggota`
--
ALTER TABLE `master_anggota`
MODIFY `id_anggota` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_bekas_pkm`
--
ALTER TABLE `master_bekas_pkm`
MODIFY `id_berkas_pkm` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_berkas_informasi`
--
ALTER TABLE `master_berkas_informasi`
MODIFY `id_berkas_informasi` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_dosen`
--
ALTER TABLE `master_dosen`
MODIFY `id_dosen` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_informasi`
--
ALTER TABLE `master_informasi`
MODIFY `id_informasi` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_mahasiswa`
--
ALTER TABLE `master_mahasiswa`
MODIFY `id_mahasiswa` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_proposal`
--
ALTER TABLE `master_proposal`
MODIFY `id_proposal` int(30) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
