-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2023 at 07:31 AM
-- Server version: 8.0.32-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` int NOT NULL,
  `nama_dosen` varchar(40) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jns_kelamin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama_dosen`, `alamat`, `tgl_lahir`, `jns_kelamin`) VALUES
(201, 'Aini', 'Surakarta', '2023-06-01', 'Perempuan'),
(705, 'Ryan', 'Solo', '2023-06-09', 'Laki - laki');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_matkul` varchar(8) NOT NULL,
  `nama_matkul` varchar(20) NOT NULL,
  `jml_sks` int NOT NULL,
  `semester` int NOT NULL,
  `nidn` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_matkul`, `nama_matkul`, `jml_sks`, `semester`, `nidn`) VALUES
('208', 'RPL', 4, 7, 705),
('9011', 'IPA', 3, 2, 705);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('purnama', '$2y$10$NWyWEXe8gjl9xYPIbAbiy.GDLyj3Let/rUtL0/UvvGqBZdc/H/qlK'),
('admin', '$2y$10$6LdGsRsQWKvjHImfzo3S1.mxQf8BElSFEUBetSNq6EBRE6JWmrkpu'),
('rudi', '$2y$10$5lIV42X0IVQgCzBkgaymsunaT6.llhIeiS..EtyVcSB.LAxq64/Sm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_matkul`),
  ADD KEY `nidn` (`nidn`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `mata_kuliah_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
