-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2025 at 06:58 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_schooll`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `photo`) VALUES
(5, '6dff4b4cbcef007e3860d4f446facfe3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `text`, `photo`) VALUES
(1, 'Selamat Datang', 'Website Resmi SD Negeri Kalikidang', 'ef1af88689f9c39db14209e2588ac95f.jpg'),
(9, 'Tenaga Pengajar Profesional', 'Guru-guru Berkualitas dan Berpengalaman', '62940b74b705ac5a6429f8f7b31032f1.jpg'),
(10, 'PPDB 2025/2026', 'Penerimaan Peserta Didik Baru Tahun Ajaran 2025/2026', '2b1764fbd8609cf7b8296f4ed83f9d2c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bg_majors`
--

CREATE TABLE `bg_majors` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bg_majors`
--

INSERT INTO `bg_majors` (`id`, `photo`) VALUES
(1, 'acc2ba2a05f43aeccc517e05dd703151.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ekskul`
--

CREATE TABLE `ekskul` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ekskul`
--

INSERT INTO `ekskul` (`id`, `judul`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(3, 'Karawitan', 'loem ipsuemmwavh', 'karawitan.jpg', '2025-09-08 05:03:01', '2025-12-09 18:07:33'),
(4, 'Pramuka', NULL, 'pramuka.jpg', '2025-09-08 05:08:07', '2025-09-08 06:28:29'),
(5, 'Tari', NULL, 'tari.jpg', '2025-11-18 15:15:52', '2025-11-18 15:15:52'),
(6, 'n', 'nbnb', 'WhatsApp_Image_2025-11-30_at_19_44_24.jpeg', '2025-12-09 17:59:48', '2025-12-09 17:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(100) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `description`, `photo`, `date`) VALUES
(3, 'Ruang kelas', 'Ruang kelas ini dirancang untuk menciptakan lingkungan belajar yang nyaman dan menyenangkan bagi siswa. Meja dan kursi tersusun rapi sesuai dengan kebutuhan anak-anak, sementara papan tulis di depan memudahkan guru dalam menyampaikan pelajaran. Cahaya alami yang masuk melalui jendela membuat suasana kelas terasa terang dan hangat, mendukung fokus belajar. Dengan kebersihan yang terjaga dan tata letak yang rapi, ruang kelas ini menjadi tempat yang aman dan kondusif bagi siswa untuk belajar, berdiskusi, dan berkreasi.', 'ruang-kelas-20250906094837.jpg', '2025-12-10'),
(4, 'Perpustakaan', 'Perpustakaan sekolah ini menyediakan berbagai koleksi buku yang menarik dan edukatif untuk mendukung kegiatan belajar siswa. Rak-rak buku tertata rapi, memudahkan anak-anak mencari bacaan favorit mereka. Suasana perpustakaan yang tenang dan nyaman membuat siswa betah membaca, belajar, serta mengembangkan imajinasi dan pengetahuan mereka. Pencahayaan yang cukup dan ruang baca yang luas menciptakan lingkungan yang kondusif untuk belajar secara mandiri maupun berkelompok.', 'perpustakaan-20250906094847.jpg', '2025-12-10'),
(5, 'Kantin', NULL, 'kantin-20250906094919.jpg', NULL),
(6, 'Lapangan Upacara', NULL, 'lapangan-20250906094930.jpg', NULL),
(9, 'Musholla', NULL, 'musholla-20250906094943.jpg', NULL),
(11, 'Aula', NULL, 'aula-20250906095001.jpg', NULL),
(12, 'Ruang Seni Musik', NULL, 'ruang-seni-musik-20250906095023.jpg', NULL),
(13, 'Ruang UKS', NULL, 'ruang-uks-20250906095039.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `foto`, `deskripsi`, `tanggal_upload`) VALUES
(10, 'penyerahan_piala.jpg', 'Penyerahan piala kepada siswa berprestasi sebagai bentuk apresiasi atas usaha dan pencapaian mereka', '2025-11-18'),
(11, 'membaca_asma_ul_husna.jpg', 'Kegiatan membaca Asmaul Husna setiap Jumat pagi sebagai pembiasaan rutin untuk menumbuhkan sikap religius pada siswa-siswi SDN Kalikidang', '2025-11-18'),
(12, 'kegiatan_persari_siaga.jpg', 'Siswa dan siswi mengikuti kegiatan persari siaga', '2025-11-18'),
(13, 'karnaval_pramuka.jpg', 'Kegiatan karnaval pramuka yang diikuti siswa-siswi SDN Kalikidang', '2025-11-18'),
(14, 'foto_bersama_peserta_lomba_mapsi.jpg', 'Foto bersama dengan para peserta lomba mapsi', '2025-11-18'),
(15, 'jambore_penggalang.jpg', 'Kegiatan Jambore Penggalang yang diikuti siswa-siswi SDN Kalikidang', '2025-11-18'),
(16, 'maulid_nabi.jpg', 'Kegiatan peringatan Maulid Nabi yang diikuti siswa-siswi SDN Kalikidang', '2025-11-18'),
(17, 'kegiatan_pramuka.jpg', 'Kegiatan kepramukaan wajib yang diikuti siswa-siswi SDN Kalikidang', '2025-11-18'),
(18, 'sosialisasi_visi_misi.jpg', 'Kegiatan sosialisasi visi dan misi program sekolah yang diikuti oleh guru-guru SDN Kalikidang', '2025-11-18'),
(19, 'pengujian_pramuka_garuda.jpg', 'Kegiatan pengujian pencapaian pramuka garuda kwartir ranting sokaraja', '2025-11-18'),
(20, 'pramuka.jpg', 'Kegiatan kepramukaan wajib yang diikuti siswa-siswi SDN Kalikidang', '2025-11-18'),
(21, 'kegiatan_kesenian_karawitan.jpg', 'Kegiatan ekstrakurikuler kesenian musik karawitan yang diikuti siswa-siswi SDN Kalikidang', '2025-11-18'),
(22, 'tari.jpg', 'Kegiatan kesenian tari yang diikuti siswa-siswi SDN Kalikidang', '2025-11-18'),
(23, 'pelatihan_ketua_gudep_dan_pembina_gudep.jpg', 'Kegiatan pelatihan ketua gudep dan pembina gudep SDN Kalikidang', '2025-11-18'),
(24, 'pembiasaan_rutin.jpg', 'Kegiatan pembiasaan pagi, guru menyambut siswa di gerbang sekolah dan siswa menyalami guru sebagai bentuk sopan santun dan pembiasaan karakter positif', '2025-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `galeri_foto`
--

CREATE TABLE `galeri_foto` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galeri_foto`
--

INSERT INTO `galeri_foto` (`id`, `kategori_id`, `foto`, `tanggal_upload`, `deskripsi`) VALUES
(6, 4, 'WhatsApp_Image_2025-11-30_at_20_54_57.jpeg', '2025-12-09', 'lorem ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum'),
(7, 4, 'referensi_data_kemendikdasmen_go_id_tppk_tppk_anggota_203002041.png', '2025-12-09', NULL),
(8, 3, 'WhatsApp_Image_2025-11-26_at_15_48_45.jpeg', '2025-12-10', NULL),
(9, 3, 'WhatsApp_Image_2025-11-26_at_16_06_11.jpeg', '2025-12-10', NULL),
(10, 3, 'localhost_SDNKalikidang_galeri_(1).png', '2025-12-16', NULL),
(11, 6, 'WhatsApp_Image_2025-11-28_at_21_37_15.jpeg', '2025-12-17', 'apa si an                                 '),
(12, 6, 'localhost_SDNKalikidang_c_galeri_foto_detail_4.png', '2025-12-17', 'hahah');

-- --------------------------------------------------------

--
-- Table structure for table `galeri_kategori`
--

CREATE TABLE `galeri_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galeri_kategori`
--

INSERT INTO `galeri_kategori` (`id`, `nama_kategori`, `deskripsi`) VALUES
(3, 'pramuka', 'lorem ipsum'),
(4, 'upcara bendara', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions'),
(6, 'Kegiatan Belajar', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'admin_biasa', 'Administrator Biasa'),
(4, 'Guru', 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `jabatan` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `nip`, `jabatan`, `foto`, `created_at`) VALUES
(1, 'Sri Kundhiarsih, S.Pd', '197208071995032001', 'Kepala Sekolah', 'kepala_sekolah.jpg', '2025-09-08 11:35:38'),
(3, 'Ice Herna Trisnaningsih, S.Pd', '198302282014062012', 'Guru Kelas 1A', 'Bu_Ice_1A1.jpg', '2025-09-08 11:37:25'),
(4, 'Katarina Dwi Anggarini, S.Pd', '-', 'Guru Kelas 1B', 'Bu_Katarina_1B1.jpg', '2025-11-18 12:29:37'),
(5, 'Esti Restiati, S.Pd', '196710072023212003', 'Guru Kelas 2A', 'Bu_Esti_2A.jpg', '2025-11-18 12:33:11'),
(6, 'Sarno, S.Pd.SD', '197506012014061002', 'Guru Kelas 2B', 'Pak_Sarno_2B.jpg', '2025-11-18 12:39:09'),
(7, 'Nofal Ida', '-', 'Guru Kelas 3A', 'Bu_Nofal_3A.jpg', '2025-11-18 12:41:08'),
(8, 'Prames Yulia Nhira Djati', '-', 'Guru Kelas 3B', 'Prames_3B.jpg', '2025-12-05 03:38:20'),
(11, 'Sabar Nur Imah, S.Pd', '-', 'Guru Kelas 4A', 'Bu_Imah_4A.jpg', '2025-11-18 12:59:46'),
(12, 'Rokhman Khusnandar, S.Pd', '-', 'Guru Kelas 4B', 'Pak_Rokhman_4B.jpg', '2025-11-18 13:01:05'),
(13, 'Anik Budiarti, S.Pd', '198310102022212037', 'Guru Kelas 5A', 'Bu_Anik_5A.jpg', '2025-11-18 13:03:33'),
(14, 'Aniz Neina Larasati, S.Pd', '-', 'Guru Kelas 5B', 'Bu_Aniz_5B.jpg', '2025-11-18 13:07:03'),
(15, 'Dhiah Murtisari, S.Pd', '199208062019022011', 'Guru Kelas 6A', 'Bu_Dhiah_6A.jpg', '2025-11-18 13:13:00'),
(16, 'Siti Sangirah, S.Pd', '198012042014062001', 'Guru Kelas 6B', 'Bu_Siti_6B.jpg', '2025-11-18 13:18:00'),
(17, 'Suyitno, S.Pd', '197012052007011013', 'Guru PJOK', 'Pak_Suyitno_pjok.jpg', '2025-11-18 13:22:47'),
(18, 'Andi Parwoto, S.Pd', '198012212008011008', 'Guru PAI', 'Pak_Andi_PAI1.jpg', '2025-11-18 13:25:19'),
(19, 'Panggih Restu Widodo', '-', 'Pustakawan', 'Panggih_perpustakawan.jpg', '2025-12-05 03:45:50'),
(20, 'Sunarko', '197503112008011001', 'Penjaga', 'Pak_Sunarko_Penjaga.jpg', '2025-11-18 13:29:24');

-- --------------------------------------------------------

--
-- Table structure for table `identity`
--

CREATE TABLE `identity` (
  `id` int(11) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identity`
--

INSERT INTO `identity` (`id`, `meta_title`, `meta_description`, `meta_keyword`, `photo`) VALUES
(1, '', '.', 'SD Negeri Kalikidang', '18efe02e7fcc5c6a4ee8c619e501a7d9.png');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `maps` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `alamat`, `telepon`, `email`, `maps`, `created_at`) VALUES
(4, 'Jl. Desa Kalikidang, Kalikidang, Kec. Sokaraja, Kab. Banyumas, (53181)', '2147483647', 'sdkalikidang2021@gmail.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63299.104478171656!2d108.8670317!3d-7.4437728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655c655e08b061:0x5766ecb126cdbddf!2sSD Negeri Kalikidang!5e0!3m2!1sid!2sid!4v1757345848942!5m2!1sid!2sid', '2025-09-08 15:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(0, '::1', 'admin@example.com', 1765992942);

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materi_pelajaran`
--

CREATE TABLE `materi_pelajaran` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deskripsi` text DEFAULT NULL,
  `kelas` tinyint(1) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi_pelajaran`
--

INSERT INTO `materi_pelajaran` (`id`, `judul`, `isi`, `created_at`, `deskripsi`, `kelas`, `file`, `id_user`) VALUES
(21, 'Matematika', NULL, '2025-11-21 13:19:57', 'Materi Pelajaran Matematika Kelas 2', 2, 'Matematika-Vol-1-BS-KLS-II.pdf', 1),
(30, 'coba', NULL, '2025-12-17 17:06:24', 'coba', 6, 'form_usulan_skripsi_(1).pdf', NULL),
(31, 'n', NULL, '2025-12-17 17:08:23', 'n', 6, 'form_pendaftaran_uji_proposal_(1).pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `user_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 2, 'Pengaturan Web', '', 'fas fa-fw fa-cog', 'Y'),
(3, 2, 'Manajemen Media', '', 'fas fa-fw fa-school', 'Y'),
(4, 2, 'Struktur Organisasi', 'struktur', 'fas fa-fw fa-sitemap', 'Y'),
(5, 1, 'Manajemen User', 'user', 'fas fa-fw fa-user', 'Y'),
(8, 2, 'Akademik', '#', 'fas fa-fw fa-book', 'Y'),
(9, 1, 'PPDB', 'c_ppdb', 'fas fa-file-alt', 'Y'),
(10, 1, 'Guru', 'c_guru', 'fas fa-chalkboard-teacher', 'Y'),
(11, 1, 'Kontak', 'c_kontak', 'fas fa-fw fa-envelope', 'Y'),
(13, 1, 'Galeri', '#', 'fas fa-images', 'Y'),
(14, 2, 'Profile', '', 'fas fa-fw fa-home', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `opening`
--

CREATE TABLE `opening` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opening`
--

INSERT INTO `opening` (`id`, `content`, `photo`) VALUES
(1, 'Assalamualaikum Warahmatullahi Wabarakatuh,\r\nSekolah Dasar Negeri Kalikidang merupakan salah satu sekolah dasar negeri yang berada di bawah naungan Dinas Pendidikan Kabupaten Banyumas. Sebagai lembaga pendidikan formal, SD Negeri Kalikidang berkomitmen untuk memberikan layanan pendidikan terbaik dengan mengedepankan kualitas, kedisiplinan, serta pembentukan karakter peserta didik. Dengan memadukan Kurikulum Merdeka serta berbagai pembiasaan positif di lingkungan sekolah, kami berupaya mendidik siswa agar memiliki kecerdasan intelektual, berakhlak mulia, serta mampu menghadapi tantangan perkembangan zaman.\r\nKami memahami bahwa pendidikan tidak hanya menekankan pada aspek pengetahuan, tetapi juga pada pembentukan sikap, keterampilan, dan kepribadian. Oleh karena itu, seluruh proses pembelajaran di SD Negeri Kalikidang dirancang agar menyenangkan, interaktif, dan memberi ruang bagi siswa untuk berkreasi serta bereksplorasi. Dengan cara ini, anak-anak dapat tumbuh menjadi pribadi yang percaya diri, bertanggung jawab, dan mampu beradaptasi.\r\nSelain kegiatan belajar mengajar di kelas, SD Negeri Kalikidang juga mendukung pengembangan potensi siswa melalui kegiatan ekstrakurikuler seperti pramuka, seni, olahraga, dan kegiatan keagamaan. Semua ini kami rancang bukan hanya untuk melatih keterampilan, tetapi juga menanamkan nilai kedisiplinan, kerja sama, serta kepedulian sosial yang akan bermanfaat dalam kehidupan mereka kelak.\r\nHarapan kami, lulusan SD Negeri Kalikidang tidak hanya unggul dalam prestasi akademik maupun non-akademik, tetapi juga memiliki karakter yang kuat, sopan santun, dan jiwa kepemimpinan. Dengan sinergi antara sekolah, guru, orang tua, dan masyarakat, kami optimis dapat mencetak generasi yang cerdas, berkarakter, serta membanggakan bagi bangsa dan negara.\r\nWassalamualaikum warahmatullahi wabarakatuh.', '6f93ee96f9a7b5a7dd5a2b97e9199678.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `is_active` char(1) NOT NULL,
  `date` date NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `author_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `seo_title`, `content`, `photo`, `is_active`, `date`, `id_user`, `author_name`) VALUES
(1, 'Pelepasan Siswa/Siswi Kelas VI SD N Kalikidang Tahun Pelajaran 2024/2025', 'pelepasan-siswa-siswi-kelas-vi-sd-n-kalikidang-tahun-pelajaran-2024-2025', 'SD Negeri Kalikidang melaksanakan acara Pelepasan Siswa/Siswi Kelas VI Tahun Pelajaran 2024/2025. Kegiatan ini diikuti oleh siswa kelas VI, orang tua, dan dewan guru dalam suasana yang hangat dan penuh kebahagiaan. Acara diisi dengan sambutan kepala sekolah, penampilan siswa, serta penyampaian kesan dan pesan. Melalui kegiatan ini, sekolah berharap para lulusan dapat melanjutkan pendidikan ke jenjang berikutnya dengan semangat dan membawa kenangan baik selama bersekolah di SD Negeri Kalikidang.', '-20251205044812.jpg', 'Y', '2025-12-05', 1, NULL),
(2, 'Peringatan Maulid Nabi SAW di SD Negeri Kalikidang', 'peringatan-maulid-nabi-saw-di-sd-negeri-kalikidang', 'SD Negeri Kalikidang mengadakan Peringatan Maulid Nabi Muhammad SAW yang diikuti seluruh siswa dan guru. Acara diisi dengan pembacaan ayat suci Al-Qur’an, shalawat, dan ceramah singkat tentang keteladanan Rasulullah. Melalui kegiatan ini, sekolah berharap siswa dapat meneladani akhlak Nabi dan memperkuat karakter religius. Acara berlangsung dengan khidmat dan penuh makna.', '-20251205044831.jpg', 'Y', '2025-12-05', 1, NULL),
(3, 'MBG', 'mbg', 'SD Negeri Kalikidang sudah mendapatkan MBG.', '-20251205053741.jpg', 'Y', '2025-12-05', 1, NULL),
(4, 'Pembiasaan Membaca Asmaul Husna Setiap Jumat', 'pembiasaan-membaca-asmaul-husna-setiap-jumat', 'SD Negeri Kalikidang melaksanakan kegiatan rutin membaca Asmaul Husna setiap Jumat pagi. Seluruh siswa dan guru mengikuti kegiatan ini dengan tertib sebelum pembelajaran dimulai. Melalui pembiasaan ini, sekolah berharap siswa dapat memperkuat karakter religius serta membiasakan diri dengan nilai-nilai keislaman dalam kehidupan sehari-hari. Kegiatan ini akan terus dilaksanakan sebagai upaya membangun lingkungan sekolah yang berakhlak dan religius.', '-20251205053900.jpg', 'Y', '2025-12-05', 1, NULL),
(41, 'wkwk', 'wkwk', 'kwkw', 'fe4cc5b8ab38d1aa481d4d1ac97b66be.png', 'Y', '2025-12-17', 13, 'Guru'),
(42, 'apaa woii', 'apaa-woii', 'woii', 'dd5f6a598834c431156916261a4941c3.jpeg', 'Y', '2025-12-17', 11, 'Admin Biasa');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb`
--

CREATE TABLE `ppdb` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ppdb`
--

INSERT INTO `ppdb` (`id`, `judul`, `deskripsi`, `link`, `foto`, `created_at`) VALUES
(6, 'SISTEM PENERIMAAN MURID BARU SEKOLAH DASAR NEGERI KALIKIDANG TAHUN PELAJARAN 2025/2026', 'Syarat calon peserta didik baru Sekolah Dasar Negeri Kalikidang\r\nPada Tanggal 1 Juli 2025 :\r\n1. Telah berusia 6 (enam) tahun\r\n2. Mengisi Formulir Pendaftaran\r\n3. Menyerahkan fotokopi Akta Kelahiran, Kartu keluarga, Ijazah TK, dan Kartu PKH (Jika memiliki)\r\n\r\nSiapkan NIK siswa/orang tua untuk mengisi form\r\n(Jika belum ada NIK isi dengan angka 0) \r\n\r\nInformasi Pendaftaran lebih lengkap dapat menghubungi:\r\nBu Ice Herna Trisnaningsih, S.Pd    085803428089\r\nBu Katarina Dwi Anggarini, S.Pd     081327433199\r\n\r\nUntuk link pendaftaran silahkan klik tombol dibawah ini', 'https://bit.ly/SPMBSDKalikidang2025', '10a197f264aaf2800abdcf12172dcfd9.jpg', '2025-09-09 05:34:21');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT 'Y',
  `diupload` datetime DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id`, `judul`, `deskripsi`, `foto`, `aktif`, `diupload`, `isi`, `created_at`) VALUES
(4, 'Juara 3 Maca lan Nulis Aksara Jawa', 'SD Negeri Kalikidang mengucapkan selamat dan sukses kepada Chitami is\'ro Fadiyah atas prestasinya sebagai Juara 3 Maca lan Nulis Aksara Jawa.', '86c0627554d414f81656222a9f288494.jpg', 'Y', '2025-09-07 13:01:13', NULL, '2025-09-07 11:01:13'),
(5, 'Juara 3 Menulis Cerkak', 'SD Negeri Kalikidang mengucapkan selamat dan sukses kepada Ahmad Faizal Arifin atas prestasinya sebagai Juara 3 Menulis Cerkak.', '19a78bf06073dc611846560668ad4f4e.jpg', 'Y', '2025-09-07 14:54:09', NULL, '2025-09-07 12:54:09'),
(6, 'Juara 3 Menulis Cerkak', 'SD Negeri Kalikidang mengucapkan selamat dan sukses kepada Thiffani Oktaviani atas prestasinya sebagai Juara 3 Menulis Cerkak.', '65139a8153bba5cdc4ffe1e332110afc.jpg', 'Y', '2025-09-07 14:57:07', NULL, '2025-09-07 12:57:07'),
(7, 'Juara 2 Maca lan Nulis Aksara Jawa', 'SD Negeri Kalikidang mengucapkan selamat dan sukses kepada Bahy Yoga Asmoro atas prestasinya sebagai Juara 2 Maca lan Nulis Aksara Jawa.', '3466d752bd887949e829e542246a1f19.jpg', 'Y', '2025-09-07 14:59:01', NULL, '2025-09-07 12:59:01'),
(8, 'Juara 1 Lomba O2SN ATHLETIC KIDS KANGA\'S ESCSPE PUTRI Tingkat Kecamatan', 'SD Negeri Kalikidang mengucapkan selamat dan sukses kepada Zahra Adelia atas prestasinya sebagai Juara 1 Lomba O2SN ATHLETIC KIDS KANGA\'S ESCSPE PUTRI Tingkat Kecamatan.', 'aef7190aef7bc4aa4f027baa02889f43.jpg', 'Y', '2025-09-07 15:08:17', NULL, '2025-09-07 13:08:17'),
(9, 'Juara 1 Lomba FLS2N Tingkat Kecamatan Cabang Gambar Bercerita', 'SD Negeri Kalikidang mengucapkan selamat dan sukses kepada Syarif Maulana Wijaya atas prestasinya sebagai Juara 1 Lomba FLS2N Tingkat Kecamatan Cabang Gambar Bercerita.', '86924ba8dacf7fabe3e6d68631dd6a09.jpg', 'Y', '2025-09-07 15:12:05', NULL, '2025-09-07 13:12:05'),
(10, 'Juara 1 Lomba FLS2N Tingkat Kecamatan Cabang Seni Tari', 'SD Negeri Kalikidang mengucapkan selamat dan sukses kepada Mutiara Dian Nur Alifah, Silvana Syafa Qafkhani, dan Rahma Nur Fadhillah, atas prestasinya sebagai Juara 1 Lomba FLS2N Tingkat Kecamatan Cabang Seni Tari.', 'd52ec1378333be11d8f85e677193434b.jpg', 'Y', '2025-09-07 15:15:31', NULL, '2025-09-07 13:15:31'),
(11, 'Juara 1 Lomba FLS2N Tingkat Kecamatan Cabang Seni Kriya', 'SD Negeri Kalikidang mengucapkan selamat dan sukses kepada Gendis Azzura Nida atas prestasinya sebagai Juara 1 Lomba FLS2N Tingkat Kecamatan Cabang Seni Kriya.', 'cd0814735cbda2d4e8bfa212f16f085b.jpg', 'Y', '2025-09-07 15:17:27', NULL, '2025-09-07 13:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `structure`
--

CREATE TABLE `structure` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `structure`
--

INSERT INTO `structure` (`id`, `photo`) VALUES
(1, 'ef7eb549eaa0174951c4ff3b036f8f16.png');

-- --------------------------------------------------------

--
-- Table structure for table `submenus`
--

CREATE TABLE `submenus` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `sub_title` varchar(50) NOT NULL,
  `sub_url` varchar(100) NOT NULL,
  `is_active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenus`
--

INSERT INTO `submenus` (`id`, `menu_id`, `sub_title`, `sub_url`, `is_active`) VALUES
(1, 1, 'Identitas Web', 'identitas', 'Y'),
(2, 1, 'Sambutan', 'sambutan', 'Y'),
(3, 3, 'Banner', 'banner', 'Y'),
(4, 3, 'Fasilitas', 'fasilitas', 'Y'),
(5, 3, 'Berita', 'berita', 'Y'),
(6, 3, 'Background Kelas', 'background', 'Y'),
(7, 8, 'Materi Pelajaran', 'c_materi', 'Y'),
(8, 8, 'Ekstrakurikuler', 'c_ekskul', 'Y'),
(9, 8, 'Prestasi', 'c_prestasi', 'Y'),
(11, 13, 'Kategori Galeri', 'c_galeri_kategori', 'Y'),
(12, 13, 'Foto Galeri', 'c_galeri_foto', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `photo`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$ZUpa8cwvREWaSyYWtCKMLeOWGt3fC2VDKGDRSLJ/.uIYXJ2n9CrBi', 'cybergraphics14@gmail.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1765994188, 1, 'Super Admin', 'SD Negeri Kalikidang', NULL, '2147483647', NULL),
(11, '::1', 'farhanfahrudin1933@gmail.com', '$2y$10$tbc5Udw3.7qdSGyuO5/.vuOke0twb7F7HiXzTyaVCW48ZaAzXmQIS', 'umkmfokusku2025@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1765528706, 1765992032, 1, 'farhan', 'fahrudin', NULL, '099798787987', NULL),
(13, '::1', 'guru@gmail.com', '$2y$10$Vghrih6PzNuwvnHa94.CZ.9ImygxfbjyLex9RNMnOjslNpcBzI39u', 'guru@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1765549397, 1765993807, 1, 'guru', '1', '', '', NULL),
(15, '::1', 'admin3@gmail.com', '$2y$10$JpxWn5L4ukzgvTB8zM9equda7CqZjGERHIVcEZbAD3S1MVZQEDeIW', 'admin3@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1765892841, 1765896451, 1, 'admin3', 'admin3', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(124, 1, 1),
(125, 11, 3),
(116, 13, 4),
(118, 15, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ekskul`
--
ALTER TABLE `ekskul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri_foto`
--
ALTER TABLE `galeri_foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `galeri_kategori`
--
ALTER TABLE `galeri_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi_pelajaran`
--
ALTER TABLE `materi_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opening`
--
ALTER TABLE `opening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppdb`
--
ALTER TABLE `ppdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenus`
--
ALTER TABLE `submenus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ekskul`
--
ALTER TABLE `ekskul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `galeri_foto`
--
ALTER TABLE `galeri_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `galeri_kategori`
--
ALTER TABLE `galeri_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materi_pelajaran`
--
ALTER TABLE `materi_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `opening`
--
ALTER TABLE `opening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `ppdb`
--
ALTER TABLE `ppdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `structure`
--
ALTER TABLE `structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `submenus`
--
ALTER TABLE `submenus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galeri_foto`
--
ALTER TABLE `galeri_foto`
  ADD CONSTRAINT `galeri_foto_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `galeri_kategori` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `submenus`
--
ALTER TABLE `submenus`
  ADD CONSTRAINT `submenus_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
