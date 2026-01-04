-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2026 at 05:20 AM
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
-- Table structure for table `ekstrakurikuler_foto`
--

CREATE TABLE `ekstrakurikuler_foto` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `tanggal_upload` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ekstrakurikuler_foto`
--

INSERT INTO `ekstrakurikuler_foto` (`id`, `kategori_id`, `foto`, `tanggal_upload`) VALUES
(1, 3, 'ebc19975adc0c15c6d9136b49fb584de.png', '2025-12-29'),
(2, 1, 'bb3fe9c1ed9d8e1b5786e6dcd34b9da6.jpg', '2025-12-29'),
(4, 1, '1a70879001740029663b745652291709.jpeg', '2025-12-29'),
(5, 1, '2f23430e8f17be96ec5c56233d7b71a8.jpeg', '2025-12-29'),
(7, 1, '593c9ad62a89763ca949c1d73ccab0ce.jpeg', '2025-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakurikuler_kategori`
--

CREATE TABLE `ekstrakurikuler_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ekstrakurikuler_kategori`
--

INSERT INTO `ekstrakurikuler_kategori` (`id`, `nama_kategori`, `deskripsi`, `created_at`) VALUES
(1, 'Kegiatan Belajarr', 'lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet', '2025-12-29 06:43:54'),
(3, 'ghcvhgvhy', 'nvg', '2025-12-29 07:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_foto`
--

CREATE TABLE `fasilitas_foto` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_foto`
--

INSERT INTO `fasilitas_foto` (`id`, `kategori_id`, `foto`, `tanggal_upload`) VALUES
(1, 1, 'f2c6b8a8747ea2560a19fff9780dcef5.jpg', '2025-12-29'),
(2, 2, '314b17e2f7ece97a1fee9b2836508584.jpg', '2025-12-30'),
(3, 2, 'fbf025816464939ff970552fa29183bb.jpg', '2025-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_kategori`
--

CREATE TABLE `fasilitas_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(150) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_kategori`
--

INSERT INTO `fasilitas_kategori` (`id`, `nama_kategori`, `deskripsi`, `created_at`) VALUES
(1, 'dolor is amet', 'lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is ametlorem ipsum dolor is ametlorem ipsum dolor is ametlorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet lorem ipsum dolor is amet', '2025-12-29 19:56:12'),
(2, 'lorem ipsum', 'lorem ipsum dolor is amet', '2025-12-30 14:44:42');

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
(8, 3, 'karnaval_pramuka1.jpg', '2025-12-10', 'Kegiatan karnaval pramuka'),
(9, 3, 'pelatihan_ketua_gudep_dan_pembina_gudep1.jpg', '2025-12-10', 'Kegiatan pelatihan ketua gudep dan pembuna gudep'),
(10, 3, 'pramuka1.jpg', '2025-12-16', 'Kegiatan kepramukaan'),
(13, 3, 'pengujian_pramuka_garuda1.jpg', '2025-12-18', 'Kegiatan pengujian pramuka garuda kwartir ranting sokaraja'),
(14, 3, 'kegiatan_pramuka1.jpg', '2025-12-18', 'Kegiatan kepramukaan          '),
(15, 3, 'jambore_penggalang1.jpg', '2025-12-18', 'Kegiatan jambore penggalang'),
(16, 3, 'kegiatan_persari_siaga1.jpg', '2025-12-18', 'Kegiatan persari siaga'),
(17, 4, 'pembiasaan_rutin1.jpg', '2025-12-18', 'Pembiasaan rutin guru menyambut siswa di gerbang sekolah pada pagi hari'),
(18, 4, 'membaca_asma_ul_husna1.jpg', '2025-12-18', 'Kegiatan membaca asma ul husna setiap jumat pagi'),
(19, 4, 'maulid_nabi1.jpg', '2025-12-18', 'Kegiatan memperingati maulid Nabi Muhammad SAW          '),
(20, 6, 'tari1.jpg', '2025-12-18', 'Kegiatan ekstrakurikuler tari'),
(21, 6, 'kegiatan_kesenian_karawitan1.jpg', '2025-12-18', 'Kegiatan ekstrakurikuler karawitan'),
(22, 6, 'pramuka2.jpg', '2025-12-18', 'Kegiatan ekstrakurikuler pramuka'),
(23, 7, 'penyerahan_piala1.jpg', '2025-12-18', 'Penyerahan piala kepada siswa yang menang lomba          '),
(24, 7, 'foto_bersama_peserta_lomba_mapsi1.jpg', '2025-12-18', 'Foto bersama peserta lomba mapsi');

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
(3, 'Pramuka', 'lorem ipsum'),
(4, 'Kegiatan Pembiasaan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions'),
(6, 'Kegiatan Ekstrakurikuler', NULL),
(7, 'Kegiatan Lomba', NULL);

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
(35, 'Matematika', NULL, '2025-12-18 16:22:27', 'Materi Pelajaran Matematika Kelas 2', 2, 'Matematika-Vol-1-BS-KLS-II.pdf', NULL),
(36, 'Pendidikan Agama Islam ', NULL, '2025-12-18 16:23:41', 'Materi Pelajaran PAI Kelas 2', 2, 'Islam-BS-KLS-II.pdf', NULL),
(37, 'Bahasa Inggris', NULL, '2025-12-18 16:25:48', 'Materi Pelajaran Bahasa Inggris Kelas 1', 1, 'Bahasa-Inggris-BS-KLS-I.pdf', NULL),
(40, 'Pendidikan Pancasila Kelas 1', NULL, '2025-12-18 16:33:27', 'Materi Pelajaran Pendidikan Pancasila Kelas 1', 1, 'Pendidikan-Pancasila-BS-KLS-I.pdf', NULL),
(42, 'IPAS Kelas III', NULL, '2025-12-18 17:56:24', 'Materi Pelajaran IPAS Kelas III', 3, 'IPAS-BS-KLS-III_11zon.pdf', NULL),
(43, 'Matematika', NULL, '2025-12-18 18:37:29', 'Materi Pelajaran Matematika Kelas 1', 1, 'Matematika-BS-KLS-I_11zon.pdf', NULL),
(44, 'Bahasa Indonesia', NULL, '2025-12-18 18:38:22', 'Materi Pelajaran Bahasa Indonesia Kelas 1', 1, 'Bahasa-Indonesia-BS-KLS-I_11zon.pdf', NULL),
(45, 'Pendidikan Agama Islam ', NULL, '2025-12-18 18:39:36', 'Materi Pelajaran PAI Kelas 1', 1, 'Islam-BS-KLS-I_11zon.pdf', NULL),
(46, 'Bahasa Inggris', NULL, '2025-12-18 18:50:07', 'Materi Pelajaran Bahasa Inggris Kelas 2', 2, 'Bahasa-Inggris-BS-KLS-II_11zon.pdf', NULL),
(47, 'Bahasa Indonesia', NULL, '2025-12-18 18:51:12', 'Materi Pelajaran Bahasa Indonesia Kelas 2', 2, 'Bahasa-Indonesia-BS-KLS-II_11zon.pdf', NULL),
(48, 'Bahasa Inggris', NULL, '2025-12-18 19:07:01', 'Materi Pelajaran Bahasa Inggris Kelas 3', 3, 'Inggris_BS_KLS_III_Lc_11zon.pdf', NULL),
(49, 'Pendidikan Pancasila', NULL, '2025-12-18 19:08:17', 'Materi Pendidikan Pancasila Kelas 3', 3, 'Pendidikan-Pancasila-BS-KLS-III.pdf', NULL),
(50, 'Bahasa Indonesia', NULL, '2025-12-18 19:10:57', 'Materi Pelajaran Bahasa Indonesia Kelas 4', 4, 'Bahasa-Indonesia-BS-KLS-IV_11zon1.pdf', NULL),
(51, 'Matematika', NULL, '2025-12-18 19:12:35', 'Materi Pelajaran Matematika kelas 4', 4, 'Matematika-BS-KLS-IV.pdf', NULL),
(52, 'Bahasa Inggris', NULL, '2025-12-18 19:14:29', 'Materi Pelajaran Bahasa Inggris Kelas 4', 4, 'Bahasa-Inggris-BS-KLS-IV.pdf', NULL),
(53, 'Bahasa Indonesia', NULL, '2025-12-18 19:15:51', 'Materi Pelajaran Bahasa Indonesia Kelas 5', 5, 'Bahasa-Indonesia-BS-KLS-V_11zon_(1).pdf', NULL),
(54, 'Pendidikan Agama Islam ', NULL, '2025-12-18 19:17:22', 'Materi PAI Kelas 5', 5, 'Islam-BS-KLS-V_11zon_11zon.pdf', NULL),
(55, 'IPAS', NULL, '2025-12-18 19:22:11', 'Materi Pelajaran IPAS Kelas 5', 5, 'IPAS-BS-KLS-V.pdf', NULL),
(56, 'Matematika', NULL, '2025-12-18 19:23:06', 'Materi Pelajaran Matematika Kelas 5', 5, 'Matematika-BS-KLS-V.pdf', NULL),
(57, 'Bahasa Inggris', NULL, '2025-12-18 19:24:10', 'Materi Pelajaran Bahasa Ingris', 5, 'Bahasa-Inggris-BS-KLS-V_11zon.pdf', NULL),
(58, 'Bahasa Indonesia', NULL, '2025-12-18 19:25:30', 'Materi Pelajaran Bahasa Indonesia Kelas 6', 6, 'Bahasa-Indonesia-BS-KLS-VI_11zon.pdf', NULL),
(59, 'Matematika', NULL, '2025-12-18 19:26:24', 'Materi Pelajaran Matematika Kelas 6', 6, 'Matematika_BS_KLS_VI_11zon_(1).pdf', NULL),
(60, 'IPAS', NULL, '2025-12-18 19:27:29', 'Materi Pelajaran IPAS Kelas 6', 6, 'IPAS-BS-KLS-VI_11zon.pdf', NULL),
(61, 'Bahasa Inggris', NULL, '2025-12-18 19:28:29', 'Materi Pelajaran Bahasa Inggris Kelas 6', 6, 'Inggris_BS_KLS_VI_Lc_11zon.pdf', NULL),
(62, 'Pendidikan Pancasila ', NULL, '2025-12-18 19:30:36', 'Materi Pelajaran Pendidikan Pancasila Kelas 6', 6, 'Pendidikan-Pancasila-BS-KLS-VI.pdf', NULL);

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
(9, 1, 'PPDB', '#', 'fas fa-file-alt', 'Y'),
(10, 1, 'Guru', 'c_guru', 'fas fa-chalkboard-teacher', 'Y'),
(11, 1, 'Kontak', 'c_kontak', 'fas fa-fw fa-envelope', 'Y'),
(13, 1, 'Galeri', '#', 'fas fa-images', 'Y'),
(15, 2, 'Ekstrakurikuler', '#', 'fas fa-running', 'Y'),
(16, 2, 'Fasilitas', '#', 'fas fa-building', 'Y'),
(17, 2, 'Profile', '', 'fas fa-fw fa-home', 'Y');

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
(4, 'Pembiasaan Membaca Asmaul Husna Setiap Jumat', 'pembiasaan-membaca-asmaul-husna-setiap-jumat', 'SD Negeri Kalikidang melaksanakan kegiatan rutin membaca Asmaul Husna setiap Jumat pagi. Seluruh siswa dan guru mengikuti kegiatan ini dengan tertib sebelum pembelajaran dimulai. Melalui pembiasaan ini, sekolah berharap siswa dapat memperkuat karakter religius serta membiasakan diri dengan nilai-nilai keislaman dalam kehidupan sehari-hari. Kegiatan ini akan terus dilaksanakan sebagai upaya membangun lingkungan sekolah yang berakhlak dan religius.', '-20251205053900.jpg', 'Y', '2025-12-05', 1, NULL);

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
(7, 'SISTEM PENERIMAAN MURID BARU SEKOLAH DASAR NEGERI KALIKIDANG TAHUN PELAJARAN 2025/2026', 'Syarat calon peserta didik baru Sekolah Dasar Negeri Kalikidang\r\nPada Tanggal 1 Juli 2025 :\r\n1. Telah berusia 6 (enam) tahun\r\n2. Mengisi Formulir Pendaftaran\r\n3. Menyerahkan fotokopi Akta Kelahiran, Kartu keluarga, Ijazah TK, dan Kartu PKH (Jika memiliki)\r\n\r\nSiapkan NIK siswa/orang tua untuk mengisi form\r\n(Jika belum ada NIK isi dengan angka 0) \r\n\r\nInformasi Pendaftaran lebih lengkap dapat menghubungi:\r\nBu Ice Herna Trisnaningsih, S.Pd    085803428089\r\nBu Katarina Dwi Anggarini, S.Pd     081327433199\r\n\r\nUntuk link pendaftaran silahkan klik tombol dibawah ini\r\n', 'https://bit.ly/SPMBSDKalikidang2025', '33bc6be666ce816a81ff5ed2fb67ab3f.jpg', '2025-12-28 09:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb_views`
--

CREATE TABLE `ppdb_views` (
  `id` int(11) NOT NULL,
  `view_date` date NOT NULL,
  `views` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ppdb_views`
--

INSERT INTO `ppdb_views` (`id`, `view_date`, `views`) VALUES
(1, '2025-12-28', 18),
(2, '2025-12-29', 1),
(3, '2025-12-30', 8);

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
(4, '<p>Juara 3 <i>Maca lan Nulis Aksara Jawa</i></p>', 'SD Negeri Kalikidang mengucapkan selamat dan sukses kepada <b>Chitami is\'ro Fadiyah</b> atas prestasinya sebagai Juara 3 <i>Maca lan Nulis Aksara Jawa.</i>', '86c0627554d414f81656222a9f288494.jpg', 'Y', '2025-09-07 13:01:13', NULL, '2025-09-07 11:01:13'),
(5, 'Juara 3 Menulis Cerkak', 'SD Negeri Kalikidang mengucapkan selamat dan sukses kepada Ahmad Faizal Arifin atas prestasinya sebagai Juara 3 Menulis Cerkak.', '19a78bf06073dc611846560668ad4f4e.jpg', 'Y', '2025-09-07 14:54:09', NULL, '2025-09-07 12:54:09'),
(6, 'Juara 3 Menulis Cerkak', 'SD Negeri Kalikidang mengucapkan selamat dan sukses kepada Thiffani Oktaviani atas prestasinya sebagai Juara 3 Menulis Cerkak.', '65139a8153bba5cdc4ffe1e332110afc.jpg', 'Y', '2025-09-07 14:57:07', NULL, '2025-09-07 12:57:07'),
(7, 'Juara 2 Maca lan Nulis Aksara Jawa', 'SD Negeri Kalikidang mengucapkan selamat dan sukses kepada Bahy Yoga Asmoro atas prestasinya sebagai Juara 2 Maca lan Nulis Aksara Jawa.', '3466d752bd887949e829e542246a1f19.jpg', 'Y', '2025-09-07 14:59:01', NULL, '2025-09-07 12:59:01'),
(8, 'Juara 1 Lomba O2SN ATHLETIC KIDS KANGA\'S ESCSPE PUTRI Tingkat Kecamatan', 'SD Negeri Kalikidang mengucapkan selamat dan sukses kepada Zahra Adelia atas prestasinya sebagai Juara 1 Lomba O2SN ATHLETIC KIDS KANGA\'S ESCSPE PUTRI Tingkat Kecamatan.', 'aef7190aef7bc4aa4f027baa02889f43.jpg', 'Y', '2025-09-07 15:08:17', NULL, '2025-09-07 13:08:17'),
(9, 'Juara 1 Lomba FLS2N Tingkat Kecamatan Cabang Gambar Bercerita', 'SD Negeri Kalikidang mengucapkan selamat dan sukses kepada Syarif Maulana Wijaya atas prestasinya sebagai Juara 1 Lomba FLS2N Tingkat Kecamatan Cabang Gambar Bercerita.', '86924ba8dacf7fabe3e6d68631dd6a09.jpg', 'Y', '2025-09-07 15:12:05', NULL, '2025-09-07 13:12:05'),
(10, 'Juara 1 Lomba FLS2N Tingkat Kecamatan Cabang Seni Tari', 'SD Negeri Kalikidang mengucapkan selamat dan sukses kepada Mutiara Dian Nur Alifah, Silvana Syafa Qafkhani, dan Rahma Nur Fadhillah, atas prestasinya sebagai Juara 1 Lomba FLS2N Tingkat Kecamatan Cabang Seni Tari.', 'd52ec1378333be11d8f85e677193434b.jpg', 'Y', '2025-09-07 15:15:31', NULL, '2025-09-07 13:15:31'),
(11, 'Juara 1 Lomba FLS2N Tingkat Kecamatan Cabang Seni Kriya', 'SD Negeri Kalikidang mengucapkan selamat dan sukses kepada Gendis Azzura Nida atas prestasinya sebagai Juara 1<i> </i>Lomba FLS2N Tingkat Kecamatan Cabang Seni Kriya.', 'cd0814735cbda2d4e8bfa212f16f085b.jpg', 'Y', '2025-09-07 15:17:27', NULL, '2025-09-07 13:17:27'),
(12, '<p>Maca lan Nulis</p>', '<p>lorem ispum dolor is amet</p>', '31fccb83f8b32db36a62099bf57d6aff.jpeg', 'Y', '2025-12-30 05:08:26', NULL, '2025-12-30 04:08:26');

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
(5, 3, 'Berita', 'berita', 'Y'),
(6, 3, 'Background Kelas', 'background', 'Y'),
(7, 8, 'Materi Pelajaran', 'c_materi', 'Y'),
(9, 8, 'Prestasi', 'c_prestasi', 'Y'),
(11, 13, 'Kategori Galeri', 'c_galeri_kategori', 'Y'),
(12, 13, 'Foto Galeri', 'c_galeri_foto', 'Y'),
(13, 9, 'Kelola PPDB', 'c_ppdb', 'Y'),
(14, 9, 'Rekap PPDB', 'c_ppdb/rekap', 'Y'),
(15, 15, 'Kategori Ekstrakurikuler', 'c_ekstrakurikuler_kategori', 'Y'),
(16, 15, 'Foto Ekstrakurikuler', 'c_ekstrakurikuler_foto', 'Y'),
(17, 16, 'Kategori Fasilitas', 'c_fasilitas_kategori', 'Y'),
(18, 16, 'Foto Fasilitas', 'c_fasilitas_foto', 'Y');

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
(1, '127.0.0.1', 'administrator', '$2y$12$ZUpa8cwvREWaSyYWtCKMLeOWGt3fC2VDKGDRSLJ/.uIYXJ2n9CrBi', 'rantinuramiraigustin@gmail.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1767099223, 1, 'Super Admin', 'SD Negeri Kalikidang', NULL, '2147483647', NULL),
(13, '::1', 'guru@gmail.com', '$2y$10$Vghrih6PzNuwvnHa94.CZ.9ImygxfbjyLex9RNMnOjslNpcBzI39u', 'guru@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1765549397, 1766083700, 1, 'guru', '1', '', '', NULL),
(18, '182.2.43.185', 'ranti@gmail.com', '$2y$10$8er/yA/fbuw0GIMRa6qZqueAl3OFt//wdp6KT.R2wdrpUECoJkXb2', 'ranti@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1766072036, NULL, 1, 'Ranti', 'Amira', 'ABC', '089665432344', NULL);

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
(129, 1, 1),
(116, 13, 4),
(126, 18, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ekstrakurikuler_foto`
--
ALTER TABLE `ekstrakurikuler_foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ekskul_kategori` (`kategori_id`);

--
-- Indexes for table `ekstrakurikuler_kategori`
--
ALTER TABLE `ekstrakurikuler_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas_foto`
--
ALTER TABLE `fasilitas_foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fasilitas_kategori` (`kategori_id`);

--
-- Indexes for table `fasilitas_kategori`
--
ALTER TABLE `fasilitas_kategori`
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
-- Indexes for table `ppdb_views`
--
ALTER TABLE `ppdb_views`
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
-- AUTO_INCREMENT for table `ekstrakurikuler_foto`
--
ALTER TABLE `ekstrakurikuler_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ekstrakurikuler_kategori`
--
ALTER TABLE `ekstrakurikuler_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fasilitas_foto`
--
ALTER TABLE `fasilitas_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fasilitas_kategori`
--
ALTER TABLE `fasilitas_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galeri_foto`
--
ALTER TABLE `galeri_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `galeri_kategori`
--
ALTER TABLE `galeri_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ppdb_views`
--
ALTER TABLE `ppdb_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `structure`
--
ALTER TABLE `structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `submenus`
--
ALTER TABLE `submenus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ekstrakurikuler_foto`
--
ALTER TABLE `ekstrakurikuler_foto`
  ADD CONSTRAINT `fk_ekskul_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `ekstrakurikuler_kategori` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fasilitas_foto`
--
ALTER TABLE `fasilitas_foto`
  ADD CONSTRAINT `fk_fasilitas_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `fasilitas_kategori` (`id`) ON DELETE CASCADE;

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
