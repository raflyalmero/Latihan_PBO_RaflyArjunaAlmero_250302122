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
-- Database: `db_simulasi_pbo_ti1d_raflyarjunaalmero`
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
(1, 'Ahmad Fauzi', 'SMAN 1 Jakarta', '85.50', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'SMAN 3 Bandung', '78.25', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Citra Lestari', 'SMKN 2 Surabaya', '90.00', '250000.00', 'Reguler', 'Teknik Komputer', 'Kampus B', NULL, NULL, NULL, NULL),
(4, 'Dewi Sartika', 'SMAN 5 Yogyakarta', '82.10', '250000.00', 'Reguler', 'Manajemen Informatika', 'Kampus B', NULL, NULL, NULL, NULL),
(5, 'Eko Prasetyo', 'SMAN 1 Medan', '75.80', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(6, 'Farhan Baharudin', 'SMAN 8 Makassar', '88.45', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(7, 'Gita Gutawa', 'SMAN 2 Semarang', '80.00', '250000.00', 'Reguler', 'Teknik Komputer', 'Kampus B', NULL, NULL, NULL, NULL),
(8, 'Hendra Wijaya', 'SMAN 1 Solo', '92.00', '150000.00', 'Prestasi', NULL, NULL, 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Indah Permata', 'SMAN 4 Denpasar', '89.50', '150000.00', 'Prestasi', NULL, NULL, 'Futsal', 'Provinsi', NULL, NULL),
(10, 'Joko Widodo', 'SMAN 1 Boyolali', '95.00', '150000.00', 'Prestasi', NULL, NULL, 'Karya Ilmiah Remaja', 'Internasional', NULL, NULL),
(11, 'Kartika Putri', 'SMKN 1 Malang', '87.30', '150000.00', 'Prestasi', NULL, NULL, 'Debat Bahasa Inggris', 'Nasional', NULL, NULL),
(12, 'Lestari Ayu', 'SMAN 3 Padang', '91.15', '150000.00', 'Prestasi', NULL, NULL, 'Pencak Silat', 'Nasional', NULL, NULL),
(13, 'Muhammad Rizky', 'SMAN 1 Palembang', '86.00', '150000.00', 'Prestasi', NULL, NULL, 'Bulu Tangkis', 'Kabupaten', NULL, NULL),
(14, 'Nadia Vega', 'SMAN 7 Balikpapan', '93.40', '150000.00', 'Prestasi', NULL, NULL, 'Olimpiade Fisika', 'Nasional', NULL, NULL),
(15, 'Oki Setiana', 'SMAN 1 Garut', '84.00', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-990/KD/2026', 'Kementerian Perhubungan'),
(16, 'Putra Pratama', 'SMAN 2 Bogor', '86.75', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-112/KD/2026', 'Badan Siber dan Sandi Negara'),
(17, 'Qori Sandioriva', 'SMAN 1 Banda Aceh', '81.50', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-405/KD/2026', 'Kementerian Dalam Negeri'),
(18, 'Rian Energi', 'SMKN 3 Perkapalan', '88.00', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-771/KD/2026', 'Kementerian ESDM'),
(19, 'Siti Badriah', 'SMAN 1 Cirebon', '83.20', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-234/KD/2026', 'Kementerian Keuangan'),
(20, 'Taufik Hidayat', 'SMAN 2 Cimahi', '85.90', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-885/KD/2026', 'Kementerian Pertahanan'),
(21, 'Vina Panduwinata', 'SMAN 11 Jakarta', '87.10', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-556/KD/2026', 'Badan Pusat Statistik');

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
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
