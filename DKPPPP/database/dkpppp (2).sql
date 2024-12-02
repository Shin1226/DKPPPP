-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 02:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dkpppp`
--

-- --------------------------------------------------------

--
-- Table structure for table `beranda`
--

CREATE TABLE `beranda` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'nonaktif',
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beranda`
--

INSERT INTO `beranda` (`id`, `judul`, `deskripsi`, `gambar`, `status`, `urutan`) VALUES
(1, 'Selamat datang di DKPPPP', 'Dinas Ketahanan Pangan Pertanian Perikanan Peternakan', 'background-2.jpg', 'aktif', 1),
(2, 'Selamat datang di DKPPPP', 'Dinas Ketahanan Pangan Pertanian Perikanan Peternakan', 'beranda-1.jpg', 'aktif', 2),
(4, 'Selamat datang di DKPPPP', 'Dinas Ketahanan Pangan Pertanian Perikanan Peternakan', 'background-3.jpg', 'aktif', 3);

-- --------------------------------------------------------

--
-- Table structure for table `bidang_ketahanan_pangan`
--

CREATE TABLE `bidang_ketahanan_pangan` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bidang_perikanan`
--

CREATE TABLE `bidang_perikanan` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bidang_pertanian`
--

CREATE TABLE `bidang_pertanian` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bidang_peternakan`
--

CREATE TABLE `bidang_peternakan` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `logo_image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `logo_image_url`) VALUES
(6, '1731041301.png'),
(7, '1731041346.png'),
(8, '1731041356.jpg'),
(9, '1731041363.png'),
(11, '1731041387.png'),
(12, '1731041396.png');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `google_map` text DEFAULT NULL,
  `copyright` varchar(255) NOT NULL DEFAULT '© Copyright DKPPPP All Rights Reserved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `alamat`, `telepon`, `email`, `twitter`, `youtube`, `instagram`, `facebook`, `google_map`, `copyright`) VALUES
(1, 'Jl. Mayor Suharto No.6 - 7, Sragen, Jawa Tengah, 57212', '(0271) 895779 ', 'distankabsragen2@gmail.com', 'https://x.com/distankabsragen', 'https://www.youtube.com/channel/UCQOlWoXDJxqhEkoK_8B6Yug', 'https://www.instagram.com/dkppp_sragen/', 'https://www.facebook.com/distan.sragen.1', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.3976873112697!2d111.0064405731879!3d-7.421163973093505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a035b5f6c35bf%3A0x8957d930574f827b!2sDinas%20Ketahanan%20Pangan%2C%20Pertanian%20dan%20Perikanan%20Kabupaten%20Sragen!5e0!3m2!1sid!2sid!4v1728464402089!5m2!1sid!2sid', '© Copyright DKPPPP All Rights Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `jenis_media` varchar(50) DEFAULT 'Gambar',
  `link_video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `kategori`, `judul`, `gambar`, `jenis_media`, `link_video`) VALUES
(5, 'Perikanan', '<p>Koordinasi dan fasilitasi perizinan serta pengawasan sektor Kelautan dan Perikanan di Sragen.</p>', 'gambar-4.jpg', 'Pilih Kategori', ''),
(6, 'Pertanian', 'Rapat Koordinasi akselerasi Program Pertambahan Area Tanam Kab. Sragen', 'gambar-3.jpeg', 'Gambar', NULL),
(7, 'Pertanian', 'Panen Cabai Hasil Binaan BI Solo di Lahan Pertanian Desa Janggrik Kecamatan Kedawung.', 'gambar-2.jpg', 'Gambar', NULL),
(10, 'Peternakan', 'kambing qurban', 'gambar-6.jpeg', 'Gambar', NULL),
(19, 'Peternakan', 'Pengecekan Hewan Jelang Idul Adha', 'berita-1.jpg', 'Gambar', ''),
(28, 'Perikanan', '<p><em>Ribuan ikan nila mengapung di perairan WKO Ngargosari, Sumberlawang, akibat upwelling.</em></p>', 'gambar-5.jpg', 'Pilih Kategori', '');

-- --------------------------------------------------------

--
-- Table structure for table `kepala_dinas`
--

CREATE TABLE `kepala_dinas` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kepala_dinas`
--

INSERT INTO `kepala_dinas` (`id`, `nama`, `nip`, `jabatan`, `instansi`, `foto`) VALUES
(1, 'Ir. Eka Rini Mumpuni Titi Lestari', '19660404 199202 2 002', 'KEPALA DINAS KETAHANAN PANGAN PERTANIAN PERIKANAN DAN PETERNAKAN', 'KABUPATEN SRAGEN', 'kepala-dinas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_path` varchar(255) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `created_at`, `image_path`, `kategori`, `link`) VALUES
(6, 'Panen Bawang Merah di Sragen Tak Optimal, Pemerintah Belum Bisa Bantu Bibit', '<h1 style=\"font-size: 32px; font-family: Montserrat, sans-serif;\"><p style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; margin: 17px 0px; font-family: Poppins, sans-serif; font-size: 16px;\"><a href=\"https://radarsolo.jawapos.com/tag/petani-bawang\" style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; vertical-align: top; outline: 0px; transition: 0.2s; text-decoration: inherit; position: relative;\"><b style=\"\"><font color=\"#000000\" style=\"\">Petani bawang</font></b></a><font color=\"#14142b\"> merugi lantaran hasil panen tidak sesuai harapan. Meski harga </font><a href=\"https://radarsolo.jawapos.com/tag/bawang-merah\" style=\"color: rgb(195, 0, 0); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; vertical-align: top; outline: 0px; transition: 0.2s; text-decoration: inherit; position: relative;\">bawang merah</a><font color=\"#14142b\"> naik di pasaran, namun petani bawang merah di Sragen justru tidak menikmati keuntungan alias merugi. Dinas Ketahanan Pangan, Pertanian dan Perikanan (DKPPP) Sragen saat ini belum menganggarkan bantuan benih bawang merah.</font></p><p style=\"color: rgb(20, 20, 43); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; margin: 17px 0px; font-family: Poppins, sans-serif; font-size: 16px;\">Petani bawang merah di Kampung Ngoncol, Kelurahan Nglorog, Kecamatan Sragen Kasino menjelaskan, petani bawang merah di wilayahnya saat ini sedang tidak beruntung. Meskipun harga bawang merah naik di pasaran, tapi tidak optimal di hasil panen.</p><p style=\"color: rgb(20, 20, 43); border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; margin: 17px 0px; font-family: Poppins, sans-serif; font-size: 16px;\">”Faktor curah hujan yang tinggi membuat bawang merah terserang penyakit. Akibatnya  hasil panen petani menurun hingga lebih dari 50 persen. Curah hujan yang tinggi membuat bawang merah terserang penyakit jamur <em style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000;\">lodho</em> dan <em style=\"border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / .5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000;\">grandong</em>,” terang Kasino.</p></h1><p><img src=\"data:image/jpeg;base64,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\" data-filename=\"berita.jpg\" style=\"width: 50%;\"></p><p><span style=\"color: rgb(20, 20, 43); font-family: Poppins, sans-serif;\">Sebagai gambaran, jika hasil panen bawang merah di lahan seluas setengah patok atau 1.800 meter persegi pada kondisi normal, biasanya menghasilkan 1 ton 2 kuintal. Namun kini di musim penghujan hasil panen hanya sekitar 5 kuintal saja.</span></p>', '2024-11-14 02:00:35', '', NULL, NULL);
INSERT INTO `news` (`id`, `title`, `content`, `created_at`, `image_path`, `kategori`, `link`) VALUES
(16, 'Sentra Jamur Sragen jadi Pilot Project Budidaya Hasil Pertanian dari Dana Wakaf', '<p data-asw-orgfontsize=\"16\" style=\"line-height: 1.75em; color: rgb(0, 0, 0); text-align: justify; font-family: Rubik, sans-serif;\"><span style=\"font-weight: 700;\">SRAGEN –&nbsp;</span>Bupati Sragen, dr. Hj. Kusdinar Untung Yuni Sukowati, meresmikan Sentra Jamur Sragen yang terletak di Dukuh Ledok, RT 07 / RW 03, Desa Mojorejo, Kecamatan Karangmalang pada Rabu (9/10/2024).</p><p data-asw-orgfontsize=\"16\" style=\"line-height: 1.75em; color: rgb(0, 0, 0); text-align: justify; font-family: Rubik, sans-serif;\">Sentra jamur yang dikelola oleh Nanik Sukoco tersebut merupakan hasil kolaborasi perdana antara Dompet Dhuafa Jawa Tengah dengan Perseroan Terbatas Bank Pembiayaan Rakyat Syariah (PT. BPRS) Sukowati Sragen dalam program Cash Wakaf Link Deposit (CWLD) sejak tahun 2023.</p><p data-asw-orgfontsize=\"16\" style=\"line-height: 1.75em; color: rgb(0, 0, 0); text-align: justify; font-family: Rubik, sans-serif;\"><br></p>', '2024-11-29 01:26:24', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `deskripsi`, `link`, `file`, `tanggal_upload`) VALUES
(6, 'Pengecekan Hewan Jelang Idul Adha', 'pelaksaanaan qurban', '', '671118097f02a.pdf', '2024-10-17 13:58:33'),
(8, 'ternak sapi kambing', 'peternakan sapi\r\n', 'https://disnaker.sragenkab.go.id/v2/berita/antisipasi-wabah-pmk-pada-ternak-sapi-pemkab-sragen-cek-pasar-hewan-nglangon.html', '671119d0bd630.jpg', '2024-10-17 14:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `profil_beranda`
--

CREATE TABLE `profil_beranda` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tipe` enum('visi','misi','tujuan','tentang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil_beranda`
--

INSERT INTO `profil_beranda` (`id`, `judul`, `deskripsi`, `tipe`) VALUES
(3, 'Tujuan', 'Memperkuat kemandirian pangan dan memastikan pasokan yang berkualitas dan terjangkau.', 'tujuan'),
(4, 'Misi', 'Meningkatkan kesejahteraan melalui teknologi dan pengelolaan sumber daya alam yang efisien.', 'misi'),
(5, 'Visi', 'Sektor pertanian, peternakan, dan perikanan yang berkelanjutan serta mendukung ketahanan pangan.', 'visi'),
(6, 'DKPPPP', 'Dinas PPPKP bertanggung jawab dalam pengembangan sektor pertanian, perikanan, peternakan, dan ketahanan pangan. Kami berfungsi membangun dan membina kegiatan yang mendukung kemandirian pangan dan kesejahteraan masyarakat.', 'tentang');

-- --------------------------------------------------------

--
-- Table structure for table `sekretariat`
--

CREATE TABLE `sekretariat` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sekretariat`
--

INSERT INTO `sekretariat` (`id`, `judul`, `deskripsi`) VALUES
(1, 'Sekretariat', 'Mempunyai tugas perumusan konsep dan pelaksanaan kebijakan, pengkoordinasian, pemantauan, evaluasi, pelaporan meliputi keuangan, hukum, kehumasan, keorganisasian dan ketatalaksanaan, pembinaan ketatausahaan, kearsipan, kerumahtanggaan, kepegawaian dan pelayanan administrasi di lingkungan Dinas Ketahanan Pangan dan Pertanian.\r\n\r\nSekretariat dipimpin oleh seorang Sekretaris yang berada dibawah dan bertanggung jawab kepada Kepala Dinas.'),
(2, 'Untuk menyelenggarakan tugas Sekretariat mempunyai fungsi:', '<ol><li>Pengkoordinasian kegiatan di lingkungan Dinas Ketahanan Pangan dan Pertanian;</li><li>Pengkoordinasian dan penyusunan rencana dan program kerja di lingkungan Dinas Ketahanan Pangan dan Pertanian;</li><li>Pembinaan dan pemberian dukungan administrasi yang meliputi keuangan, hukum, hubungan masyarakat, ketatausahaan, kearsipan, kerumahtanggaan, kepegawaian dan pelayanan administrasi di lingkungan Dinas Ketahanan Pangan dan Pertanian;</li><li>Pengkoordinasian dan penyusunan peraturan perundang-undangan di lingkungan Dinas Ketahanan Pangan dan Pertanian;</li><li>Pengkoordinasian pelaksanaan sistem pengendalian internal pemerintah (SPIP) dan pengelolaan informasi di lingkungan Dinas;</li><li>Penyelenggaraan evaluasi dan monitoring terhadap pelaksanaan pelayanan pengadaan barang dan jasa di lingkungan Dinas Ketahanan Pangan dan Pertanian;</li><li>Pelaksanaan monitoring dan evaluasi terhadap tugas-tugas yang cukup tugasnya;</li><li>Pelaksanaan fungsi-fungsi kedinasan lainnya yang diberikan oleh Kepala Dinas sesuai dengan fungsinya.</li></ol><p><br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `id` int(11) NOT NULL,
  `nama_gambar` varchar(255) NOT NULL,
  `path_gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`id`, `nama_gambar`, `path_gambar`) VALUES
(2, 'struktur organisasi', 'struktur organisasi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_pokok_fungsi`
--

CREATE TABLE `tugas_pokok_fungsi` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tipe` enum('tugas','fungsi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tugas_pokok_fungsi`
--

INSERT INTO `tugas_pokok_fungsi` (`id`, `judul`, `deskripsi`, `tipe`) VALUES
(1, 'Tugas Dinas Ketahanan Pangan Pertanian Perikanan Peternakan ', 'Dinas Ketahanan Pangan Pertanian Perikanan Peternakan  mempunyai tugas membantu Bupati melaksanakan Urusan Pemerintahan Bidang Pangan dan Pertanian yang menjadi kewenangan Daerah dan Tugas Pembantuan yang diberikan kepada Kabupaten.\r\n', 'tugas'),
(2, 'Fungsi Dinas Ketahanan Pangan Pertanian Perikanan Peternakan ', '1. Perumusan kebijakan sesuai dengan lingkup tugasnya.\r\n2. Pelaksanaan kebijakan sesuai dengan lingkup tugasnya.\r\n3. Pelaksanaan evaluasi dan pelaporan sesuai dengan lingkup tugasnya.\r\n4. Pelaksanaan administrasi dinas sesuai dengan lingkup tugasnya.\r\n5. Pelaksanaan fungsi lain yang diberikan oleh Bupati terkait dengan tugas dan fungsinya.', 'fungsi');

-- --------------------------------------------------------

--
-- Table structure for table `upt_dinas`
--

CREATE TABLE `upt_dinas` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upt_dinas`
--

INSERT INTO `upt_dinas` (`id`, `judul`, `deskripsi`) VALUES
(1, 'UPT DINAS', 'Unit Pelaksana Teknis melaksanakan tugas teknis operasional dinas dipimpin oleh seorang kepala yang berada dibawah dan bertanggungjawab kepada Kepala Dinas.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `nama_lengkap`) VALUES
(1, 'admin', 'admin123', 'lala@lala', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` enum('visi','misi','tujuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `judul`, `deskripsi`, `kategori`) VALUES
(1, 'Visi Sragen', 'Kabupaten Sragen Mandiri, Sejahtera dan Berbudaya Berlandaskan Semangat Gotong Royong', 'visi'),
(9, '<p>Tujuan</p>', '<p>Memperkuat kemandirian pangan dan memastikan pasokan yang berkualitas dan terjangkau. </p>', 'tujuan'),
(10, '<p>misi</p>', '<ol><li><span style=\"color: rgb(68, 68, 68);\">Meningkatkan kualitas Sumber Daya Manusia.</span></li><li><span style=\"color: rgb(68, 68, 68);\">Mewujudkan tata kelola pemerintahan yang bersih, inovatif, efektif, terpercaya dan bersinergi dengan pelayanan publik berbasis teknologi.</span></li><li><span style=\"color: rgb(68, 68, 68);\">Meningkatkan pertumbuhan ekonomi, investasi dan ketahanan pangan.</span></li><li><span style=\"color: rgb(68, 68, 68);\">Menangani kemiskinan dan memperluas kesempatan kerja.</span></li></ol>', 'misi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beranda`
--
ALTER TABLE `beranda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidang_ketahanan_pangan`
--
ALTER TABLE `bidang_ketahanan_pangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidang_perikanan`
--
ALTER TABLE `bidang_perikanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidang_pertanian`
--
ALTER TABLE `bidang_pertanian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidang_peternakan`
--
ALTER TABLE `bidang_peternakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kepala_dinas`
--
ALTER TABLE `kepala_dinas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_beranda`
--
ALTER TABLE `profil_beranda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekretariat`
--
ALTER TABLE `sekretariat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas_pokok_fungsi`
--
ALTER TABLE `tugas_pokok_fungsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upt_dinas`
--
ALTER TABLE `upt_dinas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beranda`
--
ALTER TABLE `beranda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bidang_ketahanan_pangan`
--
ALTER TABLE `bidang_ketahanan_pangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bidang_perikanan`
--
ALTER TABLE `bidang_perikanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bidang_pertanian`
--
ALTER TABLE `bidang_pertanian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bidang_peternakan`
--
ALTER TABLE `bidang_peternakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `kepala_dinas`
--
ALTER TABLE `kepala_dinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `profil_beranda`
--
ALTER TABLE `profil_beranda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sekretariat`
--
ALTER TABLE `sekretariat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tugas_pokok_fungsi`
--
ALTER TABLE `tugas_pokok_fungsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `upt_dinas`
--
ALTER TABLE `upt_dinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
