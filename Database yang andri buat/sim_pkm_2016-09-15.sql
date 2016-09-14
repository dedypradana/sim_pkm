# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.20)
# Database: sim_pkm
# Generation Time: 2016-09-14 17:58:30 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table anggota_pkm
# ------------------------------------------------------------

DROP TABLE IF EXISTS `anggota_pkm`;

CREATE TABLE `anggota_pkm` (
  `id_anggota` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_daftar` int(11) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table master_admin
# ------------------------------------------------------------

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

LOCK TABLES `master_admin` WRITE;
/*!40000 ALTER TABLE `master_admin` DISABLE KEYS */;

INSERT INTO `master_admin` (`id_admin`, `nama_admin`, `nip_admin`, `tanggal_lahir_admin`, `tempat_lahir_admin`, `jenis_kelamin_admin`, `program_studi_admin`, `pendidikan_tertinggi_admin`, `jabatan_admin`, `alamat_admin`, `handphone_admin`, `email_admin`, `username`, `password`)
VALUES
	(1,'Webmaster','12.14.13131.11','2016-08-30','Malang','L','Informatika','S3','Eselon 1','Jl.MT.Haryono 19 malang, jawa timur','0856234423121','admin@gmail.com','admin','YWRtaW4');

/*!40000 ALTER TABLE `master_admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table master_dosen
# ------------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=1003 DEFAULT CHARSET=latin1;

LOCK TABLES `master_dosen` WRITE;
/*!40000 ALTER TABLE `master_dosen` DISABLE KEYS */;

INSERT INTO `master_dosen` (`id_dosen`, `nama_dosen`, `nip_dosen`, `tanggal_lahir_dosen`, `tempat_lahir_dosen`, `jenis_kelamin_dosen`, `program_studi_dosen`, `pendidikan_tertinggi_dosen`, `alamat_dosen`, `handphone_dosen`, `email_dosen`, `status_dosen`, `status_ikatan_kerja_dosen`, `username`, `password`)
VALUES
	(1001,'Sofyan Arifianto',4444444,'2016-09-06','Tasikmalaya','L','Teknik Informatika','S3','Jl.1Manggala Bhakti no.14 Bandung, Jawa Barat',2147483647,'sofyan@gmail.com','aktif_mengajar','tetap','dosen','ZG9zZW4');

/*!40000 ALTER TABLE `master_dosen` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table master_informasi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master_informasi`;

CREATE TABLE `master_informasi` (
  `id_informasi` int(30) NOT NULL AUTO_INCREMENT,
  `artikel_informasi` varchar(255) NOT NULL,
  `pengumuman_informasi` varchar(255) NOT NULL,
  `berkas` int(30) NOT NULL,
  PRIMARY KEY (`id_informasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table master_mahasiswa
# ------------------------------------------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=5007 DEFAULT CHARSET=latin1;

LOCK TABLES `master_mahasiswa` WRITE;
/*!40000 ALTER TABLE `master_mahasiswa` DISABLE KEYS */;

INSERT INTO `master_mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nim_mahasiswa`, `jurusan`, `program_studi_mahasiswa`, `jenis_kelamin_mahasiswa`, `tanggal_lahir_mahasiswa`, `tempat_lahir_mahasiswa`, `alamat_mahasiswa`, `handphone_mahasiswa`, `email_mahasiswa`, `username`, `password`, `status`)
VALUES
	(5003,'Mahasiswa',777,'Teknik Informatika','Teknik Informatika1','L','2016-09-19','Madiun','Jl.Bandung 12',832432432,'mhs@in.com','mahasiswa','bWFoYXNpc3dh',1),
	(5004,'Dedy Pradana',2147483647,'Teknik Informatika','Teknik Informatika','L','2016-09-20','Madiun','Jl.Binamulya 1 / A3',2147483647,'dedy@in.com','201420370312292','MjI5Mg',1);

/*!40000 ALTER TABLE `master_mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pendaftaran_pkm
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pendaftaran_pkm`;

CREATE TABLE `pendaftaran_pkm` (
  `id_daftar` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(225) DEFAULT '',
  `nama` varchar(255) DEFAULT '',
  `jurusan` varchar(255) DEFAULT '',
  `telp` varchar(255) DEFAULT '',
  `email` varchar(255) DEFAULT '',
  `alamat` text,
  `nip_dn` varchar(255) DEFAULT '',
  `nama_dn` varchar(500) DEFAULT '',
  `email_dn` varchar(255) DEFAULT '',
  `alamat_dn` text,
  `judul` varchar(500) DEFAULT NULL,
  `bidang` varchar(500) DEFAULT NULL,
  `d_hibah` varchar(255) DEFAULT NULL,
  `d_mas` varchar(255) DEFAULT NULL,
  `u_berkas` text,
  `u_lampiran` text,
  `created` date DEFAULT NULL,
  PRIMARY KEY (`id_daftar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
