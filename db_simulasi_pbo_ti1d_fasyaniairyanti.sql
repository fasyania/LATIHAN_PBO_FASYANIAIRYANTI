-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2026 at 06:50 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti1d_fasyaniairyanti`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(30) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Fauzi', 'SMAN 1 Purwokerto', '85.50', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'SMKN 2 Cilacap', '78.00', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Citra Lestari', 'SMA Al-Irsyad', '92.15', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus 2', NULL, NULL, NULL, NULL),
(4, 'Dedi Kurniawan', 'SMAN 1 Banyumas', '80.45', '250000.00', 'Reguler', 'Teknik Elektro', 'Kampus Utama', NULL, NULL, NULL, NULL),
(5, 'Eka Putri', 'MAN 2 Banyumas', '88.30', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus 2', NULL, NULL, NULL, NULL),
(6, 'Fajar Ramadhan', 'SMKN 1 Purwokerto', '75.20', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(7, 'Gita Permata', 'SMAN 3 Cilacap', '83.90', '250000.00', 'Reguler', 'Teknik Elektro', 'Kampus 2', NULL, NULL, NULL, NULL),
(8, 'Hendra Wijaya', 'SMAN 1 Purbalingga', '90.00', '150000.00', 'Prestasi', NULL, NULL, 'Sains (Olimpiade Matematika)', 'Nasional', NULL, NULL),
(9, 'Indah Permatasari', 'SMAN 2 Purwokerto', '87.50', '150000.00', 'Prestasi', NULL, NULL, 'Olahraga (Basket)', 'Provinsi', NULL, NULL),
(10, 'Joko Susilo', 'SMKN 1 Cilacap', '82.00', '150000.00', 'Prestasi', NULL, NULL, 'FLS2N (Gitar Solo)', 'Nasional', NULL, NULL),
(11, 'Kurniawati', 'SMA Merdeka', '95.00', '150000.00', 'Prestasi', NULL, NULL, 'Karya Ilmiah Remaja', 'Internasional', NULL, NULL),
(12, 'Laksana Tri', 'SMAN 1 Kebumen', '89.10', '150000.00', 'Prestasi', NULL, NULL, 'Olahraga (Pencak Silat)', 'Provinsi', NULL, NULL),
(13, 'Mega Utami', 'MAN 1 Cilacap', '86.40', '150000.00', 'Prestasi', NULL, NULL, 'Tahfidz Qur\'an 10 Juz', 'Kabupaten', NULL, NULL),
(14, 'Naufal Abdi', 'SMAN 4 Purwokerto', '91.20', '150000.00', 'Prestasi', NULL, NULL, 'Sains (Astronomi)', 'Nasional', NULL, NULL),
(15, 'Oki Pratama', 'SMAN 1 Cilacap', '88.00', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-772/KD/2026', 'Dinas Kominfo'),
(16, 'Putri Rahayu', 'SMAN 1 Purwokerto', '93.50', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-105/BKN/2026', 'Badan Kepegawaian Daerah'),
(17, 'Rian Hidayat', 'SMKN 3 Purwokerto', '81.00', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-442/DIS/2026', 'Dinas Perhubungan'),
(18, 'Siti Aminah', 'MAN 2 Cilacap', '89.70', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-119/PEND/2026', 'Dinas Pendidikan'),
(19, 'Taufik Hidayat', 'SMAN 2 Cilacap', '84.30', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-902/KD/2026', 'Dinas Kominfo'),
(20, 'Utami Dewi', 'SMAN 1 Banyumas', '90.60', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-311/SET/2026', 'Sekretariat Daerah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
