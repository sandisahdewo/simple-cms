-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2017 at 02:44 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haltec_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_menu`
--

CREATE TABLE `daftar_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(64) NOT NULL,
  `url` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `id_menu` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_menu`
--

INSERT INTO `daftar_menu` (`id`, `menu`, `url`, `parent_id`, `id_menu`, `created_at`, `updated_at`) VALUES
(8, 'Home', '/', NULL, 4, '2017-06-08 17:21:12', '2017-06-08 10:21:12'),
(9, 'Profil', 'profil', NULL, 4, '2017-06-08 16:57:50', '2017-06-08 09:57:50'),
(10, 'Objek Potensi', 'objek-potensi', NULL, 4, '2017-06-08 09:49:05', '2017-06-08 09:49:05'),
(11, 'Galeri', 'galeri', NULL, 4, '2017-06-08 16:58:00', '2017-06-08 09:58:00'),
(12, 'Kegiatan', 'kegiatan', NULL, 4, '2017-06-08 09:49:37', '2017-06-08 09:49:37'),
(13, 'Berita', 'berita', NULL, 4, '2017-06-08 09:49:44', '2017-06-08 09:49:44'),
(14, 'Pengaduan', 'pengaduan', NULL, 4, '2017-06-08 09:49:51', '2017-06-08 09:49:51'),
(15, 'Visi & Misi', 'visi-misi', 9, 4, '2017-06-08 09:50:32', '2017-06-08 09:50:32'),
(16, 'Lokasi', 'lokasi', 9, 4, '2017-06-08 09:50:39', '2017-06-08 09:50:39'),
(17, 'Struktur Perangkat Desa', 'struktur-perangkat-desa', 9, 4, '2017-06-08 09:50:53', '2017-06-08 09:50:53'),
(18, 'Air Terjun', 'air-terjun', 10, 4, '2017-06-08 09:51:12', '2017-06-08 09:51:12'),
(19, 'Wisata Desa', 'wisata-desa', 10, 4, '2017-06-08 09:51:21', '2017-06-08 09:51:21'),
(20, 'Kampung Peternak', 'kampung-peternak', 10, 4, '2017-06-08 09:51:40', '2017-06-08 09:51:40'),
(21, 'Adventure', 'adventure', 10, 4, '2017-06-08 09:51:56', '2017-06-08 09:51:56'),
(22, 'Album', 'album', 11, 4, '2017-06-08 17:00:55', '2017-06-08 10:00:55'),
(23, 'Agenda Kegiatan Desa', 'agenda-kegiatan-desa', 12, 4, '2017-06-08 09:52:43', '2017-06-08 09:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `grup`
--

CREATE TABLE `grup` (
  `id` int(10) UNSIGNED NOT NULL,
  `grup` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grup`
--

INSERT INTO `grup` (`id`, `grup`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'developer', 'Grup Developer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(10) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `parent_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Desa', NULL, NULL, NULL, NULL),
(2, 'Pelatihan', 1, NULL, NULL, NULL),
(3, 'Karangtaruna', 1, NULL, NULL, NULL),
(4, 'Kepala Desa', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(10) UNSIGNED NOT NULL,
  `tanggal_komentar` date NOT NULL,
  `komentar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_induk` int(11) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL,
  `dibuat_oleh` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `tanggal_komentar`, `komentar`, `nama`, `email`, `tipe`, `status`, `id_induk`, `is_admin`, `dibuat_oleh`, `created_at`, `updated_at`) VALUES
(1, '2017-05-19', 'Testing keluhan', 'sandiwo@gmail.com', 'sandiwo@gmail.com', 'pengaduan', 'appr', 0, 0, 'sandiwo@gmail.com', '2017-05-19 06:56:02', '2017-05-19 06:56:02'),
(2, '2017-05-19', 'Oh iya terimakasih', 'Admin', 'admin@gmail.com', 'pengaduan', 'appr', 1, 1, 'admin', '2017-05-19 07:22:24', '2017-05-19 07:22:24'),
(3, '2017-05-19', 'webnya kokjelek pak', 'admin@admin.com', 'admin@admin.com', 'pengaduan', 'appr', 0, 0, 'admin@admin.com', '2017-05-19 10:14:27', '2017-05-19 10:14:45'),
(4, '2017-05-19', 'o', 'Admin', 'admin@gmail.com', 'pengaduan', 'appr', 0, 1, 'admin', '2017-05-19 10:17:47', '2017-05-19 10:17:47'),
(5, '2017-05-20', 'bjunya keren gan', 'komentar@komentar.com', 'komentar@komentar.com', 'pengaduan', 'wappr', 0, 0, 'komentar@komentar.com', '2017-05-19 22:34:55', '2017-05-19 22:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(64) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 'Sidebar', 'sidebar menu', '2017-05-30 08:02:18', '2017-05-30 08:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(108, '2014_10_12_000000_create_users_table', 1),
(109, '2014_10_12_100000_create_password_resets_table', 1),
(110, '2017_05_06_111644_kategori', 1),
(111, '2017_05_06_111748_post', 1),
(112, '2017_05_06_115752_komentar', 1),
(113, '2017_05_06_115807_grup', 1),
(114, '2017_05_06_115813_user', 1),
(115, '2017_05_06_120749_tag', 1),
(116, '2017_05_06_124756_post_kategori', 1),
(117, '2017_05_06_125030_post_tag', 1),
(118, '2017_05_09_173856_slug', 1),
(119, '2017_05_16_231301_post_gambar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_posting` date NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci,
  `jenis` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `format` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dibuat_oleh` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diubah_oleh` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `judul`, `tanggal_posting`, `isi`, `jenis`, `format`, `status`, `gambar`, `dibuat_oleh`, `diubah_oleh`, `created_at`, `updated_at`) VALUES
(17, 'Galeri Kegiatan', '2017-06-08', NULL, '4', 'image', 'publish', 'http://localhost:8000/vendors/responsive_filemanager/source/Kegiatan%20Warga%20Desa%20Bronjong%20Batu%20Kali.jpg', 'Admin', 'Admin', '2017-06-08 08:38:29', '2017-06-08 14:42:46'),
(18, 'Struktur Perangkat Desa', '2017-06-08', NULL, '3', 'page', 'publish', 'http://localhost:8000/vendors/responsive_filemanager/source/struktur%20pemerintahan%20desa%20sajen.png', 'Admin', 'Admin', '2017-06-08 09:02:04', '2017-06-08 11:12:27'),
(19, 'Main Image', '2017-06-08', NULL, '3', 'image', 'publish', 'http://localhost:8000/vendors/responsive_filemanager/source/Kegiatan%20rekreasi%20pegawai%20desa%20water%20tabbing.jpg', 'Admin', 'Admin', '2017-06-08 09:07:57', '2017-06-08 10:03:10'),
(20, 'Visi Misi', '2017-06-09', '<p><strong>Visi</strong></p>\r\n\r\n<p>Terciptanya Pemerintah Desa Sajen yang bersih dan berwibawa selalu mengedepankan ekonomi kerakyatan, meningkatkan pembangunan, serta menciptakan kesejahteraan masyarakat dan ketaqwaan kepada Tuhan Yang Maha Esa.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Misi</strong></p>\r\n\r\n<ol>\r\n	<li>Menciptakan ketertiban administrasi Desa Sajen</li>\r\n	<li>Mewujudkan pemerintah Desa Sajen yang bersih dan&nbsp;&nbsp; berwibawa.</li>\r\n	<li>Melaksanakan pembangunan yang bebas korupsi, kolusi dan nepotisme dengan memberdayakan kepada kemampuan masyarakat yang berkompeten.</li>\r\n	<li>Melaksanakan pembangunan yang merata dengan sumber dana diri dan pemerintah, swadaya desa dan masyarakat maupun donatur pihak ke 3</li>\r\n	<li>Menghapuskan usia putus sekolah dan pemberian penghargaan bagi masyarakat yang berprestasi.</li>\r\n	<li>Menciptakan pertumbuhan ekonomi serta memberikan bantuan ekonomi dan menengah dengan tepat sasaran.</li>\r\n	<li>Menciptakan lapangan kerja bagi usia produktif.</li>\r\n	<li>Menciptakan perlindungan kesehatan secara gratis bagi warga yang kurang mampu secara adil dan merata.</li>\r\n	<li>Menciptakan perlindungan hukum bagi warga yang bermasalah dengan hukum dan adanya penghidupan yang aman dari ancaman pihak manapun.</li>\r\n	<li>Membangun fisik dan mental dalam ketaqwaan terhadap Tuhan Yang Maha Esa.</li>\r\n</ol>', '3', 'page', 'publish', NULL, 'Admin', 'Admin', '2017-06-08 09:24:15', '2017-06-08 10:33:15'),
(21, 'Lokasi', '2017-06-08', NULL, '3', 'page', 'publish', 'http://localhost:8000/vendors/responsive_filemanager/source/peta%20desa%20sajen.png', 'Admin', 'Admin', '2017-06-08 09:25:50', '2017-06-08 11:12:19');

-- --------------------------------------------------------

--
-- Table structure for table `post_gambar`
--

CREATE TABLE `post_gambar` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_post` int(11) NOT NULL,
  `url_gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_gambar`
--

INSERT INTO `post_gambar` (`id`, `id_post`, `url_gambar`, `keterangan`, `link`, `deskripsi`) VALUES
(42, 19, 'http://localhost:8000/vendors/responsive_filemanager/source/Penguins.jpg', NULL, NULL, NULL),
(43, 17, 'http://localhost:8000/vendors/responsive_filemanager/source/Pelaksanaan%20Tradisi%20Ruah%20Desa2.jpg', NULL, NULL, NULL),
(44, 17, 'http://localhost:8000/vendors/responsive_filemanager/source/Pelaksanaan%20Tradisi%20Ruah%20Desa.jpg', NULL, NULL, NULL),
(45, 17, 'http://localhost:8000/vendors/responsive_filemanager/source/Kegiatan%20Warga%20Desa%20Bronjong%20Batu%20Kali2.jpg', NULL, NULL, NULL),
(46, 17, 'http://localhost:8000/vendors/responsive_filemanager/source/Kegiatan%20Warga%20Desa%20Bronjong%20Batu%20Kali.jpg', NULL, NULL, NULL),
(47, 17, 'http://localhost:8000/vendors/responsive_filemanager/source/Kegiatan%20rekreasi%20pegawai%20desa%20water%20tabbing.jpg', NULL, NULL, NULL),
(48, 17, 'http://localhost:8000/vendors/responsive_filemanager/source/Kegiatan%20Kerja%20Bakti%20Desa.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_kategori`
--

CREATE TABLE `post_kategori` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slug`
--

CREATE TABLE `slug` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_relasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slug`
--

INSERT INTO `slug` (`id`, `type`, `slug`, `id_relasi`) VALUES
(17, 'post', 'galeri-kegiatan', 17),
(18, 'post', 'struktur-perangkat-desa', 18),
(19, 'post', 'main-image', 19),
(20, 'post', 'visi-misi', 20),
(21, 'post', 'lokasi', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Desa', NULL, NULL, NULL),
(2, 'Pelatihan', NULL, NULL, NULL),
(3, 'Karangtaruna', NULL, NULL, NULL),
(4, 'Kepala Desa', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_grup` int(11) NOT NULL,
  `terakhir_login` date NOT NULL,
  `remember_token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama`, `email`, `password`, `id_grup`, `terakhir_login`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'developer', 'Developer', 'developer@developer.com', '$2y$10$oex5laFbUl22qK0m79hEPuYufCDDVFwTsgN/SN4FOiDSCkRgowmLS', 1, '2017-06-09', '3MtdypanLjlrWV7tFn3SPhvr3tUVNTZ7cD55ApGawPljUPp9WpPEqHzEhXPj', NULL, NULL),
(2, 'dfas', 'asdfsadf', 'sadf', '$2y$10$oex5laFbUl22qK0m79hEPuYufCDDVFwTsgN/SN4FOiDSCkRgowmLS', 1, '2017-05-17', '', '2017-05-17 09:42:04', '2017-05-17 09:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_gambar`
--
ALTER TABLE `post_gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_kategori`
--
ALTER TABLE `post_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slug`
--
ALTER TABLE `slug`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `grup`
--
ALTER TABLE `grup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `post_gambar`
--
ALTER TABLE `post_gambar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `post_kategori`
--
ALTER TABLE `post_kategori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `slug`
--
ALTER TABLE `slug`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
