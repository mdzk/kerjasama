-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2023 at 03:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kerjasama`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_uks`
--

CREATE TABLE `tb_uks` (
  `id_uk` int(11) NOT NULL,
  `perihal_ks` varchar(255) DEFAULT NULL,
  `awal_ks` date DEFAULT NULL,
  `akhir_ks` date DEFAULT NULL,
  `bentuk_kegiatan` enum('pendidikan','penelitian','pengabdian') DEFAULT NULL,
  `unit_p_ks` varchar(255) DEFAULT NULL,
  `deskripsi_ks` varchar(255) DEFAULT NULL,
  `jenis_dokumen` enum('MOU','PKS') DEFAULT NULL,
  `rancangan_ik` varchar(255) DEFAULT NULL,
  `file_input_pk` varchar(255) NOT NULL,
  `file_input_dk` varchar(255) NOT NULL,
  `status` enum('verif','proses','revisi','ttd','tolak','revisiadmin') NOT NULL,
  `id_users` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_uks`
--

INSERT INTO `tb_uks` (`id_uk`, `perihal_ks`, `awal_ks`, `akhir_ks`, `bentuk_kegiatan`, `unit_p_ks`, `deskripsi_ks`, `jenis_dokumen`, `rancangan_ik`, `file_input_pk`, `file_input_dk`, `status`, `id_users`, `keterangan`, `created_at`, `updated_at`) VALUES
(89, 'hello', '2023-01-01', '2023-02-02', 'pendidikan', 'asd', 'asd', 'MOU', 'ad', '1689593586_823a859767929a12469f.pdf', '1689593586_638dbd25623206720218.pdf', 'ttd', 68, NULL, '2020-07-17', '2023-07-17'),
(90, 'hai', '2019-01-01', '2023-02-02', 'pendidikan', 'asd', 'ads', 'MOU', 'asd', '1689594276_1ec1dd38b174592dc2cd.pdf', '1689594276_54db2a1b8c2c6eae3787.pdf', 'ttd', 68, NULL, '2019-07-17', '2023-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nm_instansi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` enum('user','pimpinan','admin') DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `foto`, `nik`, `nm_instansi`, `email`, `no_hp`, `provinsi`, `kota`, `password`, `roles`, `status`) VALUES
(28, '1685418627_fbd776b53b3b22c61f35.jpg', '1111111111111111', 'Politeknik Negeri Lampung', 'admin@mail.com', '00000', 'lampung', 'Lampung Timur', '$2y$10$LLjugOmk/Tx3oZDYzHuqH.H7AAhgLsUwgEaTAytufD.9COc8cJxUa', 'admin', 0),
(48, '1685416091_5ebd2571cf5670a11789.png', '222', 'Institut Teknologi Bandung', 'pimpinan@mail.com', '+1 (296) 597-26977', 'Libero eos possimus', 'Duis sed cupiditate', '$2y$10$/nEZ1YnfIe1MIg8LfnUtEe6XsW.OliT40RnbSUcA6bTvzfK81pXnC', 'pimpinan', 0),
(68, '1683728691_def538db450bb6f20d09.png', '112', 'Universitas Lampung', 'user@mail.com', '+1 (278) 674-5747', 'Recusandae Ea quia ', 'Enim rerum eos ut d', '$2y$10$44CELzMSFPLDSI7dzAzxWuW4k8xhL5Yg3NWINmWno5MjXp5cxDD/2', 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_uks`
--
ALTER TABLE `tb_uks`
  ADD PRIMARY KEY (`id_uk`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_uks`
--
ALTER TABLE `tb_uks`
  MODIFY `id_uk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
