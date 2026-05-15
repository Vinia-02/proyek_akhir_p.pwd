-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2026 at 06:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `green_community`
--

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` int(11) NOT NULL,
  `nama_donatur` varchar(100) NOT NULL,
  `email_donatur` varchar(100) NOT NULL,
  `telp_donatur` varchar(15) NOT NULL,
  `jumlah_donasi` decimal(10,2) NOT NULL,
  `tgl_donasi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `nama_donatur`, `email_donatur`, `telp_donatur`, `jumlah_donasi`, `tgl_donasi`) VALUES
(1, 'Raissa', 'raissaceva0180@gmail.com', '087701809805', 30.00, '2026-04-24 14:26:15'),
(15, 'Raissa Ceva Bernasya', 'raissaceva0180@gmail.com', '087701809805', 100.00, '2026-04-24 14:59:47'),
(16, 'Raissa Ceva', 'raissaceva0180@gmail.com', '087701809805', 100.00, '2026-04-24 15:45:50'),
(17, 'Raissa Ceva', 'raissaceva0180@gmail.com', '087701809805', 100.00, '2026-04-24 15:45:55'),
(18, 'Raissa', 'raissaceva0180@gmail.com', '087701809805', 15.00, '2026-04-24 15:46:21'),
(19, 'Raissa', 'raissaceva0180@gmail.com', '087701809805', 50.00, '2026-04-24 16:53:56'),
(20, 'Raissa', 'raissaceva0190@gmail.com', '087701809805', 50.00, '2026-04-24 18:10:38'),
(21, 'Raissa', 'raissaceva0180@gmail.com', '087701809805', 50.00, '2026-04-27 17:45:09'),
(22, 'raissa', 'ra@gmail.com', '123246789', 80.00, '2026-05-09 15:11:43'),
(23, 'Raissa', 'raissaceva0180@gmail.com', '087701809805', 100.00, '2026-05-14 17:37:52'),
(24, 'Raissa', 'raissaceva0180@gmail.com', '087701809805', 100.00, '2026-05-14 17:40:30'),
(25, 'Raissa', 'raissaceva0180@gmail.com', '087701809805', 50.00, '2026-05-14 17:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `kontributor`
--

CREATE TABLE `kontributor` (
  `id_kontributor` int(11) NOT NULL,
  `nama_kontributor` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email_kontributor` varchar(100) NOT NULL,
  `telp_kontributor` varchar(15) NOT NULL,
  `lokasi` enum('jkt','bdg','yk','bali','sby','mdn','smrg','mksr','bp','bl','plmbg','ponti','bjms','mnd','amb','kpg','mtrm','lb','srg','jp','btm','pkbr','pdg','tgr','bks') NOT NULL,
  `tgl_pendaftaran` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontributor`
--

INSERT INTO `kontributor` (`id_kontributor`, `nama_kontributor`, `tgl_lahir`, `email_kontributor`, `telp_kontributor`, `lokasi`, `tgl_pendaftaran`) VALUES
(1, 'Raissa', '2009-08-27', 'raissaceva0180@gmail.com', '087701809805', 'mdn', '2026-04-23 18:19:22'),
(2, 'Halala', '2007-02-27', 'haola@gmail.com', '087701809806', 'sby', '2026-04-23 18:28:02'),
(5, 'yaya', '2005-07-08', 'raya@gmail.com', '0886279038', 'bl', '2026-04-23 18:29:16'),
(6, 'Raissa', '2006-04-27', 'raissaceva0190@gmail.com', '087701809877', 'bali', '2026-04-23 18:34:39'),
(7, 'Raissa', '2003-06-04', 'raiceva0180@gmail.com', '087701659805', 'smrg', '2026-04-23 18:43:45'),
(8, 'sasa', '2005-04-23', 'rau@gmail.com', '087701809567', 'bp', '2026-04-24 12:33:53'),
(9, 'Raissa', '2009-07-23', 'rea@gmail.com', '087701809805', 'bl', '2026-04-24 17:57:27'),
(10, 'Raissat', '2009-07-23', 'reas@gmail.com', '087701809805', 'ponti', '2026-04-24 17:58:29'),
(11, 'Raissa', '2003-07-05', 'raissaceva0185@gmail.com', '087701809805', 'bdg', '2026-04-24 18:01:01'),
(12, 'Raissa Ceva Bernasya', '2009-05-31', 'etdah@gmail.com', '087701809805', 'ponti', '2026-04-27 17:35:33'),
(13, 'raissa ceva', '2005-08-27', 'rai@gmail.com', '087701809805', 'lb', '2026-05-06 15:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(100) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `email`, `password_hash`, `role`) VALUES
(1, 'Rainsser', 'raissaceva0180@gmail.com', '$2y$10$Pkb1fXNTbV/6IKoJ1ow0Ju0fsb9Zm5y8uo9rt/bJ8kstBE6uLRKH.', 'user'),
(2, 'Raina', 'raissaceva@gmail.com', '$2y$10$jEMdAnINSxOLi/W3qx1fRuV4yNOtF7uwZAwRAf6A8R10vw9FYqGLi', 'user'),
(3, 'Rainsa', 'rau@gmail.com', '$2y$10$EaI2oW5dkgKFRpzEGoo5negFMI8/MS1i7C7UGA6FUTX61h/1D3gVO', 'user'),
(4, 'Rainsser', 'etdah@gmail.com', '$2y$10$m9mljOKrVcsLPYzXaopmKe5eOkPTqRXGpnGzSszX3pxtwyJl4ipfm', 'user'),
(5, 'rai', 'rai@gmail.com', '$2y$10$lOa40th9kE592/AGEs5/Huzw.gt97hUj7b05uTtVK1yz4afbo0TQ.', 'user'),
(6, 'ra', 'ra@gmail.com', '123', 'user'),
(7, 'rainsser', 'rainsser@gmail.com', '$2y$10$tKrYTUb76R8stPwLopMzme3mT/Fw6THrqTeYrCrewBFp2eQWR9UXm', 'admin'),
(8, 'rasa', 'rasa@gmail.com', '$2y$10$1e1nKk/KOA11OpdAE3ISHe0g6JA1rgioeHVuXddprh5bTjYvLWpu2', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id_projek` varchar(20) NOT NULL,
  `nama_projek` varchar(250) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `lokasi_projek` varchar(100) NOT NULL,
  `tgl_mulai_projek` date DEFAULT NULL,
  `tgl_akhir_projek` date DEFAULT NULL,
  `status` enum('planning','ongoing','completed') DEFAULT 'planning',
  `img_path` varchar(300) DEFAULT NULL,
  `tgl_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id_projek`, `nama_projek`, `deskripsi`, `lokasi_projek`, `tgl_mulai_projek`, `tgl_akhir_projek`, `status`, `img_path`, `tgl_dibuat`) VALUES
('PRJ-2026-001', 'Coastal Clean Up Initiative', 'Aksi pembersihan sampah plastik di garis pantai dan edukasi pengolahan limbah bagi masyarakat pesisir.', 'Pantai Parangtritis, Yogyakarta', '2026-03-15', '2026-04-25', 'ongoing', 'asetProjects/pantai_parangtritis.png', '2026-02-28 17:00:00'),
('PRJ-2026-002', 'River Plastic Trapping', 'Pemasangan jaring penghalang sampah di aliran sungai untuk mencegah limbah masuk ke laut.', 'Sungai Ciliwung, Jakarta', '2026-06-10', '2026-12-20', 'planning', 'asetProjects/sungai_ciliwung.png', '2026-04-12 17:00:00'),
('PRJ-2026-003', 'Zero Waste Workshop', 'Pelatihan pembuatan kompos rumah tangga dan sistem manajemen sampah mandiri untuk komunitas warga.', 'Balai Desa Sukamaju, Bandung', '2026-01-10', '2026-02-10', 'completed', 'asetProjects/balaiDesa_sukamaju.png', '2026-01-04 17:00:00'),
('PRJ-2026-004', 'Coral Reef Restoration', 'Rehabilitasi terumbu karang menggunakan metode transplantasi untuk memulihkan ekosistem bawah laut.', 'Nusa Dua, Bali', '2026-06-01', '2026-12-02', 'ongoing', 'asetProjects/nusa_dua.png', '2026-04-21 17:00:00'),
('PRJ-2026-005', 'Mangrove Forest Sanctuary', 'Konservasi hutan bakau sebagai benteng alami terhadap kenaikan air laut dan habitat fauna lokal.', 'Margomulyo, Balikpapan', '2026-04-10', '2026-06-30', 'ongoing', 'asetProjects/margomulyo.png', '2026-03-24 17:00:00'),
('PRJ-2026-006', 'Coastal Flood Mitigation', 'Pembangunan tanggul hijau dan penanaman vegetasi pantai untuk mengurangi dampak rob.', ' Tambak Lorok, Semarang ', '2026-04-10', '2026-06-30', 'ongoing', 'asetProjects/tambak_lorok.png', '2026-01-14 17:00:00'),
('PRJ-2026-007', 'Surabaya Waste to Energy', 'Optimalisasi pengolahan sampah organik pasar menjadi energi biogas untuk pedagang lokal.', 'Pasar Wonokromo, Surabaya', '2026-03-20', '2026-05-20', 'ongoing', 'asetProjects/pasar_wonokromo.png', '2026-02-03 17:00:00'),
('PRJ-2026-008', 'Urban Farming Hub', 'Transformasi lahan tidur menjadi kebun hidroponik komunal untuk ketahanan pangan warga.', 'Medan Baru, Medan', '2026-01-20', '2026-03-20', 'completed', 'asetProjects/medan_baru.png', '2026-01-26 17:00:00'),
('PRJ-2026-009', 'Banjarmasin Floating Waste Trap', 'Pengadaan alat penyaring sampah otomatis yang disesuaikan dengan karakteristik sungai pasang surut.', 'Sungai Martapura, Banjarmasin', '2026-08-17', '2026-11-10', 'ongoing', 'asetProjects/sungai_martapura.png', '2026-04-08 17:00:00'),
('PRJ-2026-010', 'Makassar Coastal Protection', 'Restorasi ekosistem pesisir melalui penyusunan struktur pemecah gelombang alami berbasis bambu.', 'Pantai Akkarena, Makassar', '2026-05-23', '2026-09-30', 'planning', 'asetProjects/pantai_akkarena.png', '2026-04-13 17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id_donasi`);

--
-- Indexes for table `kontributor`
--
ALTER TABLE `kontributor`
  ADD PRIMARY KEY (`id_kontributor`),
  ADD UNIQUE KEY `email` (`email_kontributor`),
  ADD UNIQUE KEY `email_kontributor` (`email_kontributor`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id_projek`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kontributor`
--
ALTER TABLE `kontributor`
  MODIFY `id_kontributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
