-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2023 at 07:30 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
  `status` enum('verif','proses','revisi','ttd','tolak') NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_uks`
--

INSERT INTO `tb_uks` (`id_uk`, `perihal_ks`, `awal_ks`, `akhir_ks`, `bentuk_kegiatan`, `unit_p_ks`, `deskripsi_ks`, `jenis_dokumen`, `rancangan_ik`, `file_input_pk`, `file_input_dk`, `status`, `id_users`) VALUES
(49, 'Eos cum sit anim su', '1997-11-17', '1997-12-07', 'pengabdian', 'Consequatur facere ', 'Consequat Enim mole', 'MOU', 'Cum tempora rerum qu', '1684720011_c7b0b03bc83d4aa3248a.pdf', '1684720011_ef495222ee69858a35cf.pdf', 'ttd', 45);

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
(28, '1685418627_fbd776b53b3b22c61f35.jpg', '000', 'Politeknik Negeri Lampung', 'polinela@gmail.com', '00000', 'lampung', 'Lampung Timur', '$2y$10$qOlgd2orzzD13yl5AdzeZeVMemUBSW9L7NYS0nN5yiNmYGOha26GO', 'admin', 0),
(45, '1683728691_def538db450bb6f20d09.png', '111', 'Universitas Lampung', 'qisedaj@mailinator.com', '+1 (278) 674-5747', 'Recusandae Ea quia ', 'Enim rerum eos ut d', '$2y$10$iuu0JTocdI1tkE7emlVgDuoBP9fqgqBWrihtVErtOLf.AvDx2OPee', 'user', 0),
(48, '1685416091_5ebd2571cf5670a11789.png', '222', 'Institut Teknologi Bandung', 'tejolacoho@mailinator.com', '+1 (296) 597-26977', 'Libero eos possimus', 'Duis sed cupiditate', '$2y$10$fRZtXE5mhnatl6xZ1PdPguRGpDmcva3urDTtTUXGitkSC360PBT5W', 'pimpinan', 0);

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
  MODIFY `id_uk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
