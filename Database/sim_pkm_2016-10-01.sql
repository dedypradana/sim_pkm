# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.20)
# Database: sim_pkm
# Generation Time: 2016-10-01 03:40:59 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;

INSERT INTO `admin` (`id_admin`, `nama_admin`, `nip_admin`, `tanggal_lahir_admin`, `tempat_lahir_admin`, `jenis_kelamin_admin`, `program_studi_admin`, `pendidikan_tertinggi_admin`, `jabatan_admin`, `alamat_admin`, `handphone_admin`, `email_admin`, `username`, `password`)
VALUES
	(1,'Webmaster','12.14.13131.11','2016-08-30','Malang','L','Informatika','S3','Eselon 1','Jl.MT.Haryono 19 malang, jawa timur','0856234423121','admin@gmail.com','admin','YWRtaW4');

/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table dosen
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dosen`;

CREATE TABLE `dosen` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `dosen` WRITE;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `nip_dosen`, `tanggal_lahir_dosen`, `tempat_lahir_dosen`, `jenis_kelamin_dosen`, `program_studi_dosen`, `pendidikan_tertinggi_dosen`, `alamat_dosen`, `handphone_dosen`, `email_dosen`, `status_dosen`, `status_ikatan_kerja_dosen`, `username`, `password`)
VALUES
	(1002,'Yuda Munarko',1080611,'2016-09-05','malang','Laki-laki','Teknik Informatika','Strata 2','Lawang',2147483647,'yuda@email.com','aktif','Pegawai','yuda','MTIzNA'),
	(1003,'Nur Hayatin',1080907,'2016-09-15','Mokokerto','Perempuan','Teknik Informatika','Strata 2','Embong Anyar',2147483647,'nur@email.com','Aktif','Pegawai','nurhayatin','MTIzNA'),
	(1006,'Hariyadi',1019406,'2016-09-13','Malang','Laki-laki','Teknik Informatika','Strata 2','Gajayana',2147483647,'hariyadi@email.com','Aktif','Pegawai','hariyadi','MTIzNA'),
	(1007,'Gita Indah Marthasari',1080610,'2016-08-05','Surabaya','Perempuan','Teknik Informatika','Strata 2','Oma Kampus',2147483647,'Gita@email.com','Aktif','Pegawai','gita','MTIzNA'),
	(1008,'Setio Basuki',1080915,'2015-09-05','Madiun','Laki-laki','Teknik Informatika','Strata 3','Lowokwaru',2147483647,'setio@email.com','Aktif','Pegawai','setio','MTIzNA'),
	(1009,'Eko Budi Cahyono',1089504,'2014-09-05','Semarang','Laki-laki','Teknik Informatika','Strata 3','Dinoyo',2147483647,'eko@email.com','Aktif','Pegawai','eko','MTIzNA'),
	(1010,'Muhhammad Irfan',1089203,'2012-09-05','Jakarta','Laki-laki','Teknik Informatika','Strata 2','Tlogomas',2147483647,'irfan@email.com','Aktif','Pegawai','irfan','MTIzNA'),
	(1011,'Ilyas Nuryasin',1081411,'2013-09-05','Malang','Laki-laki','Teknik Informatika','Strata 3','Embong Anyar',2147483647,'ilyas@email.com','Aktif','Pegawai','ilyas','MTIzNA'),
	(1012,'Yufis Azhar',1081412,'2011-01-05','Malang','Laki-laki','Teknik Informatika','Strata 2','BCT1',2147483647,'yufis@email.com','Aktif','Pegawai','yufis','MTIzNA'),
	(1013,'Maskur',1081413,'2006-09-05','Pasuruan','Laki-laki','Teknik Informatika','Strata 2','Tidar',2147483647,'maskur@email.com','Aktif','Pegawai','maskur','MTIzNA'),
	(1014,'Galih Wasis Wicaksono',1081414,'2011-04-05','Banjarmasin','Laki-laki','Teknik Informatika','Strata 2','Oma Kampus',2147483647,'galih@email.com','Aktif','Pegawai','galih','MTIzNA');

/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table informasi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `informasi`;

CREATE TABLE `informasi` (
  `id_informasi` int(30) NOT NULL AUTO_INCREMENT,
  `artikel_informasi` varchar(255) NOT NULL,
  `pengumuman_informasi` text NOT NULL,
  `berkas` varchar(20) NOT NULL,
  PRIMARY KEY (`id_informasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `informasi` WRITE;
/*!40000 ALTER TABLE `informasi` DISABLE KEYS */;

INSERT INTO `informasi` (`id_informasi`, `artikel_informasi`, `pengumuman_informasi`, `berkas`)
VALUES
	(1,'asdf','asdf','adsf'),
	(3,'test','test','test');

/*!40000 ALTER TABLE `informasi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table mahasiswa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(30) NOT NULL AUTO_INCREMENT,
  `nama_mahasiswa` varchar(255) DEFAULT NULL,
  `nim_mahasiswa` int(30) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nim_mahasiswa`, `jurusan`, `jenis_kelamin_mahasiswa`, `tanggal_lahir_mahasiswa`, `tempat_lahir_mahasiswa`, `alamat_mahasiswa`, `handphone_mahasiswa`, `email_mahasiswa`, `username`, `password`, `status`)
VALUES
	(5009,'Andri Gunandar',214748362,'Teknik Informatika','Laki-laki','1994-08-12','Aceh','Landungsari',2147483647,'andri@email.com','andri','MTIzNA',1),
	(5010,'Adellia Anggraini',214748361,'Teknik Informatika','Perempuan','1994-07-12','Balikpapan','Bumi Permata Hijau',2147483647,'adelia@email.com','adelia','MTIzNA',1),
	(5012,'M. Herly Wiriawan',214748363,'Teknik Informatika','Laki-laki','1993-01-15','Banjarmasin','BCT',2147483647,'herly@email.com','herly','MTIzNA',1),
	(5013,'Helma Fitriani',214748364,'Teknik Informatika','Perempuan','1995-07-25','Balikpapan','Tlogomas',2147483647,'helma@email.com','helma','MTIzNA',1),
	(5014,'Rahil Hamdi',214748365,'Teknik Informatika','Laki-laki','1994-12-12','Riau','Tidar',2147483647,'rahil@email.com','rahil','MTIzNA',1),
	(5015,'Gustam Efenfi',214748366,'Teknik Informatika','Laki-laki','1994-08-14','Malang','Gajayana',2147483647,'gustam@email.com','gustam','MTIzNA',1),
	(5016,'Nur Apriyani',214748367,'Teknik Informatika','Perempuan','1994-01-01','Penajam','Bumi Asri',2147483647,'hani@email.com','nurapriyani','MTIzNA',1),
	(5017,'Rojib Saifullah',214748368,'Teknik Informatika','Laki-laki','1994-02-02','Pasuruan','Lowokwaru',2147483647,'rojib@email.com','rojib','MTIzNA',1),
	(5018,'Ahmad Irsandro',214748369,'Teknik Informatika','Laki-laki','1995-05-21','Palembang','Oma Kampus',2147483647,'sandro@email.com','sandro','MTIzNA',1),
	(5019,'Ahmad Zainul Abidin',214748360,'Teknik Informatika','Laki-laki','1994-01-23','Gresik','Lowokwaru',2147483647,'abid@email.com','abid','MTIzNA',1),
	(5020,'HATTA KARYA NUGRAHA',2147483610,'Teknik Informatika','Laki-laki','1994-01-29','Balikpapan','Soehat',2147483647,'hatta@email.com','hatta','MTIzNA',1);

/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table map_anggota
# ------------------------------------------------------------

DROP TABLE IF EXISTS `map_anggota`;

CREATE TABLE `map_anggota` (
  `id_map` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_daftar` int(11) DEFAULT NULL,
  `nim_anggota` int(11) DEFAULT NULL,
  `nim_ketua` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `create` date DEFAULT NULL,
  PRIMARY KEY (`id_map`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table pendaftaran_pkm
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pendaftaran_pkm`;

CREATE TABLE `pendaftaran_pkm` (
  `id_daftar` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(225) DEFAULT '',
  `nip_dn` varchar(255) DEFAULT '',
  `judul` varchar(500) DEFAULT NULL,
  `abstrak` text,
  `bidang_pkm` varchar(500) DEFAULT NULL,
  `bidang_ilmu` varchar(500) DEFAULT NULL,
  `luaran` varchar(255) DEFAULT NULL,
  `u_berkas` text,
  `u_lampiran` text,
  `note_dosen` text,
  `note_admin` text,
  `acc_dosen` int(11) DEFAULT NULL,
  `acc_admin` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  PRIMARY KEY (`id_daftar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
