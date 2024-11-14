/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.38-MariaDB : Database - sailor
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sailor` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sailor`;

/*Table structure for table `gallery` */

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `gallery` */

insert  into `gallery`(`id`,`kategori`,`judul`,`gambar`) values (2,'Peternakan','Departemen Peternakan FPP UNDIP Adakan Pelatihan Kesehatan Ternak dan Pembuatan Pakan Berkualitas bagiÂ PeternakÂ Sragen.','gambar-7.jpeg.jpg'),(3,'Peternakan','Beternak Kambing Perah Guna Mendukung Terwujudnya Sentra Kambing Perah Sapera di Sragen.','gambar-6.jpeg'),(4,'Perikanan','Ribuan ikan nila mengapung di perairan WKO Ngargosari, Sumberlawang, akibat upwelling.','gambar-5.jpg'),(5,'Perikanan','Koordinasi dan fasilitasi perizinan serta pengawasan sektor Kelautan dan Perikanan di Sragen.','gambar-4.jpg'),(6,'Pertanian','Rapat Koordinasi akselerasi Program Pertambahan Area Tanam Kab. Sragen','gambar-3.jpeg'),(7,'Pertanian','Panen Cabai Hasil Binaan BI Solo di Lahan Pertanian Desa Janggrik Kecamatan Kedawung.','gambar-2.jpg'),(8,'Pertanian','Tradisi Metil di Desa Pelemgadung, Karangmalang','gambar-1.jpg');

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `news` */

insert  into `news`(`id`,`judul`,`gambar`,`text`,`link`,`date`) values (1,'Kementan perluas areal tanam di Sragen antisipasi dampak El Nino','berita-4.png','Kementerian Pertanian (Kementan) melakukan akselerasi perluasan areal tanam di wilayah Kabupaten Sragen, Jawa Tengah, guna meningkatkan produktivitas pertanian dan mengantisipasi dampak fenomena perubahan iklim El Nino.','https://www.antaranews.com/berita/4078800/kementan-perluas-areal-tanam-di-sragen-antisipasi-dampak-el-nino','2024-10-10'),(2,'Pemkab Sragen Siapkan 532 kg Ikan Untuk Mancing Bareng Di Taman Sukowati Sragen','berita-3.png','Ratusan Aparatur Sipil Negara (ASN) Kabupaten Sragen serta pejabat Pemerintah Kabupaten Sragen turut memeriahkan Mancing Bareng yang dihelat oleh Dinas Ketahanan Pangan, Pertanian dan Perikanan Kabupaten Sragen di embung Taman Sukowati Sragen Sabtu pagi.','https://sragenkab.go.id/berita/pemkab-sragen-siapkan-532-kg-ikan-untuk-mancing-bareng-di-taman-sukowati-sragen.html','2024-10-10'),(3,'Pemkab Sragen Ungkap 4 Program Peningkatan Pangan di Rembuk Ketahanan Pangan','berita-2.jpeg','Kelompok Tani Nelayan Andalan (KTNA) Sragen menggelar Rembuk Ketahanan Pangan dengan menghadirkan Perum Bulog, Pupuk Indonesia, Persatuan Pengusaha Penggilingan Padi dan Beras (Perpadi), dan Sekretaris Daerah (Sekda) Sragen mewakili Bupati Sragen.','https://solopos.espos.id/pemkab-sragen-ungkap-4-program-peningkatan-pangan-di-rembuk-ketahanan-pangan-2008871?_gl=1*alii5o*_ga*MTU0MTc4MjA2NS4xNzI3ODUwNzQz*_ga_5RRFTQXGVW*MTcyNzkyMjQzNS4zLjEuMTcyNzkyMjYyMi4wLjAuMTk1OTA4MTE3NA..','2024-10-10'),(4,'Antisipasi Wabah PMK pada Ternak Sapi, Pemkab Sragen Cek Pasar Hewan Nglangon','berita-1.jpg','Pemkab Sragen melakukan inspeksi ke Pasar Hewan Nglangon sebagai langkah antisipasi penyebaran wabah Penyakit Mulut dan Kuku (PMK) pada ternak sapi. Kegiatan ini bertujuan untuk memastikan kesehatan hewan dan mendukung peternak dalam menjaga produktivitas ternak mereka.','https://disnaker.sragenkab.go.id/v2/berita/antisipasi-wabah-pmk-pada-ternak-sapi-pemkab-sragen-cek-pasar-hewan-nglangon.html','2024-10-10');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`email`,`nama_lengkap`) values (1,'admin','admin123','lala@lala','coba daftars');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
