-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 11:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(12, '2022-04-05-142550', 'App\\Database\\Migrations\\TblStaff', 'default', 'App', 1650097393, 1),
(13, '2022-04-05-162612', 'App\\Database\\Migrations\\TblKelas', 'default', 'App', 1650097393, 1),
(14, '2022-04-06-222714', 'App\\Database\\Migrations\\TblSiswa', 'default', 'App', 1650097393, 1),
(15, '2022-04-09-030125', 'App\\Database\\Migrations\\TblPelajaraan', 'default', 'App', 1650097393, 1),
(16, '2022-04-14-211153', 'App\\Database\\Migrations\\TblJadwalPelajaran', 'default', 'App', 1650097393, 1),
(17, '2022-04-16-162708', 'App\\Database\\Migrations\\TblAbsensi', 'default', 'App', 1650126632, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `id_absensi` int(5) UNSIGNED NOT NULL,
  `id_jadwal` int(5) NOT NULL,
  `id_siswa` int(5) NOT NULL,
  `waktu_absensi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`id_absensi`, `id_jadwal`, `id_siswa`, `waktu_absensi`) VALUES
(5, 2, 1, '2022-04-16 12:36:57'),
(6, 5, 1, '2022-04-16 12:37:27'),
(7, 2, 1, '2022-04-16 12:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal_pelajaran`
--

CREATE TABLE `tbl_jadwal_pelajaran` (
  `id_jadwal` int(5) UNSIGNED NOT NULL,
  `id_pelajaran` int(5) NOT NULL,
  `judul_materi` varchar(255) NOT NULL,
  `ringkas_materi` text DEFAULT NULL,
  `link_zoom` text DEFAULT NULL,
  `file_upload` text DEFAULT NULL,
  `tanggal_jadwal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_jadwal_pelajaran`
--

INSERT INTO `tbl_jadwal_pelajaran` (`id_jadwal`, `id_pelajaran`, `judul_materi`, `ringkas_materi`, `link_zoom`, `file_upload`, `tanggal_jadwal`) VALUES
(2, 2, 'pertemuan 1', 'IPA adalah ilmu yang mempelajari segala sesutu yang berada di sekitar kita baik yang\r\nhidup maupun yang mati.\r\nDi dalam menemukan konsep-konsep IPA, maka para ilmuwan melakukan kegiatan\r\npenyelidikan yang disebut observasi (pengamatan). IPA berkembang melalui proses penelitian\r\nyang dilakukan oleh ilmuwan.\r\nPenelitian yang dilakukan ilmuwan harus melalui langkah-langkah yang terencana dan\r\nsistematis untuk memperoleh informasi yang dapat dipertanggungjawabkan secara ilmiah.\r\nLangkah-langkah yang harus dilakukan dalam melakukan penelitian tersebut dinamakan metode\r\nilmiah.                        ', 'https://us05web.zoom.us/j/89515421751?pwd=cW5wRHFLRndhbXZaUitQMmRYQm1Gdz09', NULL, '2022-04-16'),
(4, 2, 'pertemuan 2', '<strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>                        ', 'https://us05web.zoom.us/j/89515421751?pwd=cW5wRHFLRndhbXZaUitQMmRYQm1Gdz09', '1650113181_8df1d03d14aa4b6a561c.pdf', '2022-04-17'),
(5, 1, 'pertemuan 1', '<strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>                        ', 'https://us05web.zoom.us/j/89515421751?pwd=cW5wRHFLRndhbXZaUitQMmRYQm1Gdz09', '1650123642_f64b271f99a441284564.xlsx', '2022-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(5) UNSIGNED NOT NULL,
  `kelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `kelas`) VALUES
(1, 'kelas 1 a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelajaran`
--

CREATE TABLE `tbl_pelajaran` (
  `id_pelajaran` int(5) UNSIGNED NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_staff` int(5) NOT NULL,
  `pelajaran` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pelajaran`
--

INSERT INTO `tbl_pelajaran` (`id_pelajaran`, `id_kelas`, `id_staff`, `pelajaran`) VALUES
(1, 1, 3, 'Agama'),
(2, 1, 4, 'IPA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(5) UNSIGNED NOT NULL,
  `nisn` varchar(100) DEFAULT NULL,
  `id_kelas` int(10) DEFAULT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nisn`, `id_kelas`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `foto`, `username`, `password`) VALUES
(1, '51760', 1, 'putri tringgani', 'perempuan', NULL, NULL, NULL, NULL, 'putri', '$2y$10$IftzfOzxFAcoEtVRFUk1CeXbtrd.BUQ8p/49YMhPKtGSYo5v5K/We');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `id_staff` int(5) UNSIGNED NOT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `nama_pegawai` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `tipe` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`id_staff`, `nip`, `nama_pegawai`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `foto`, `username`, `password`, `tipe`) VALUES
(2, '0000000000000', 'admin', 'laki-laki', NULL, NULL, NULL, NULL, 'admin', '$2y$10$3KTZpz7mA4rNRLXHjyYC5eivjh.nF/lhuGGZaItE45P6rH4kXdEQS', 'admin'),
(3, '16710506070797', 'rizki ratih purwasih', 'perempuan', NULL, NULL, NULL, NULL, 'ratih', '$2y$10$ue57lrnxPC4FLwUf120FwOzthwHGrwG4c2iN1ISJBdJ.HbpHZL7T2', 'guru'),
(4, '517890890', 'Rama', 'laki-laki', NULL, NULL, NULL, NULL, 'rama', '$2y$10$Jj0nQ1CFBFA.rRu0soODCOzQruTwRQtAVYYNKA2w5FLVnG7pRezfK', 'guru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `tbl_jadwal_pelajaran`
--
ALTER TABLE `tbl_jadwal_pelajaran`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_pelajaran`
--
ALTER TABLE `tbl_pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `id_absensi` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_jadwal_pelajaran`
--
ALTER TABLE `tbl_jadwal_pelajaran`
  MODIFY `id_jadwal` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pelajaran`
--
ALTER TABLE `tbl_pelajaran`
  MODIFY `id_pelajaran` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `id_staff` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
