/*
 Navicat Premium Data Transfer

 Source Server         : Localku
 Source Server Type    : MySQL
 Source Server Version : 50620
 Source Host           : 127.0.0.1
 Source Database       : sim_pkm

 Target Server Type    : MySQL
 Target Server Version : 50620
 File Encoding         : utf-8

 Date: 09/01/2016 03:13:51 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `form_daftar`
-- ----------------------------
DROP TABLE IF EXISTS `form_daftar`;
CREATE TABLE `form_daftar` (
  `id_daftar` int(11) NOT NULL AUTO_INCREMENT,
  `nim_daftar` int(30) NOT NULL,
  `nama_daftar` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `jurusan_daftar` varchar(255) NOT NULL,
  `alamat_daftar` varchar(255) NOT NULL,
  `handphone_daftar` int(30) NOT NULL,
  `email_daftar` varchar(255) NOT NULL,
  `status_daftar` enum('tunggu','ditolak','diterima') NOT NULL,
  `password_daftar` int(30) NOT NULL,
  `tanggal_daftar` datetime NOT NULL,
  PRIMARY KEY (`id_daftar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `master_admin`
-- ----------------------------
DROP TABLE IF EXISTS `master_admin`;
CREATE TABLE `master_admin` (
  `id_admin` int(11) NOT NULL /*!50606 STORAGE DISK */ AUTO_INCREMENT,
  `nama_admin` varchar(500) DEFAULT NULL,
  `nip_admin` varchar(50) NOT NULL,
  `tanggal_lahir_admin` date DEFAULT NULL,
  `tempat_lahir_admin` varchar(500) DEFAULT NULL,
  `jenis_kelamin_admin` char(5) DEFAULT NULL,
  `program_studi_admin` varchar(500) DEFAULT NULL,
  `pendidikan_tertinggi_admin` varchar(500) DEFAULT NULL,
  `jabatan_admin` varchar(500) DEFAULT NULL,
  `alamat_admin` text,
  `handphone_admin` varchar(50) DEFAULT NULL,
  `email_admin` varchar(200) DEFAULT NULL,
  `username` varchar(400) DEFAULT NULL,
  `password` text,
  PRIMARY KEY (`id_admin`,`nip_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `master_admin`
-- ----------------------------
BEGIN;
INSERT INTO `master_admin` VALUES ('1', 'Webmaster', '132487897', '2016-08-30', 'Malang', 'L', 'Informatika', 'S3', 'Eselon 1', 'Jl.MT.Haryono 19 malang, jawa timur', '0856234423121', 'admin@gmail.com', 'admin', 'YWRtaW4');
COMMIT;

-- ----------------------------
--  Table structure for `master_anggota`
-- ----------------------------
DROP TABLE IF EXISTS `master_anggota`;
CREATE TABLE `master_anggota` (
  `id_anggota` int(30) NOT NULL AUTO_INCREMENT,
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
  `jenis_kelamin_anggota5` varchar(255) NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `master_bekas_pkm`
-- ----------------------------
DROP TABLE IF EXISTS `master_bekas_pkm`;
CREATE TABLE `master_bekas_pkm` (
  `id_berkas_pkm` int(30) NOT NULL AUTO_INCREMENT,
  `berkas_pkm` text NOT NULL,
  `lampiran_berkas_pkm` text NOT NULL,
  PRIMARY KEY (`id_berkas_pkm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `master_berkas_informasi`
-- ----------------------------
DROP TABLE IF EXISTS `master_berkas_informasi`;
CREATE TABLE `master_berkas_informasi` (
  `id_berkas_informasi` int(30) NOT NULL AUTO_INCREMENT,
  `berkas_informasi` varchar(255) NOT NULL,
  PRIMARY KEY (`id_berkas_informasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `master_dosen`
-- ----------------------------
DROP TABLE IF EXISTS `master_dosen`;
CREATE TABLE `master_dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(255) DEFAULT NULL,
  `nip_dosen` int(30) DEFAULT NULL,
  `tanggal_lahir_dosen` date DEFAULT NULL,
  `tempat_lahir_dosen` varchar(255) DEFAULT NULL,
  `jenis_kelamin_dosen` varchar(255) DEFAULT NULL,
  `program_studi_dosen` varchar(255) DEFAULT NULL,
  `pendidikan_tertinggi_dosen` varchar(255) DEFAULT NULL,
  `alamat_dosen` varchar(255) DEFAULT NULL,
  `handphone_dosen` int(30) DEFAULT NULL,
  `email_dosen` varchar(255) DEFAULT NULL,
  `status_dosen` varchar(500) DEFAULT NULL,
  `status_ikatan_kerja_dosen` varchar(500) DEFAULT NULL,
  `username` varchar(500) DEFAULT NULL,
  `password` text,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=1002 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `master_dosen`
-- ----------------------------
BEGIN;
INSERT INTO `master_dosen` VALUES ('1001', 'Sofyan Arifianto', '12345678', '2016-09-06', 'Tasikmalaya', 'L', 'Teknik Informatika', 'S2', 'Jl.Manggala Bhakti no.14 Bandung, Jawa Barat', '2147483647', 'sofyan@gmail.com', 'aktif_mengajar', 'tetap', 'dosen', 'ZG9zZW4');
COMMIT;

-- ----------------------------
--  Table structure for `master_informasi`
-- ----------------------------
DROP TABLE IF EXISTS `master_informasi`;
CREATE TABLE `master_informasi` (
  `id_informasi` int(30) NOT NULL AUTO_INCREMENT,
  `artikel_informasi` varchar(255) NOT NULL,
  `pengumuman_informasi` varchar(255) NOT NULL,
  `berkas` int(30) NOT NULL,
  PRIMARY KEY (`id_informasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `master_mahasiswa`
-- ----------------------------
DROP TABLE IF EXISTS `master_mahasiswa`;
CREATE TABLE `master_mahasiswa` (
  `id_mahasiswa` int(30) NOT NULL AUTO_INCREMENT,
  `nama_mahasiswa` varchar(255) DEFAULT NULL,
  `nim_mahasiswa` int(30) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `program_studi_mahasiswa` varchar(255) DEFAULT NULL,
  `jenis_kelamin_mahasiswa` varchar(255) DEFAULT NULL,
  `tanggal_lahir_mahasiswa` date DEFAULT NULL,
  `tempat_lahir_mahasiswa` varchar(255) DEFAULT NULL,
  `alamat_mahasiswa` varchar(255) DEFAULT NULL,
  `handphone_mahasiswa` int(30) DEFAULT NULL,
  `email_mahasiswa` varchar(255) DEFAULT NULL,
  `username` varchar(500) DEFAULT NULL,
  `password` text,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mahasiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=5004 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `master_mahasiswa`
-- ----------------------------
BEGIN;
INSERT INTO `master_mahasiswa` VALUES ('5003', 'Mahasiswa', '2147483647', 'Teknik Informatika', 'Teknik Informatika', 'L', '2016-09-19', 'Madiun', 'Jl.Bandung 12', '832432432', 'mhs@in.com', 'mahasiswa', 'bWFoYXNpc3dh', '1');
COMMIT;

-- ----------------------------
--  Table structure for `master_proposal`
-- ----------------------------
DROP TABLE IF EXISTS `master_proposal`;
CREATE TABLE `master_proposal` (
  `id_proposal` int(30) NOT NULL AUTO_INCREMENT,
  `judul_proposal` varchar(255) NOT NULL,
  `bidang_kegiatan_proposal` varchar(255) NOT NULL,
  `bidang_ilmu_proposal` varchar(255) NOT NULL,
  `sumber_penulisan_proposal` varchar(255) NOT NULL,
  `dana_dikti_proposal` int(30) NOT NULL,
  `dana_masyarakat_proposal` int(30) NOT NULL,
  PRIMARY KEY (`id_proposal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

SET FOREIGN_KEY_CHECKS = 1;
