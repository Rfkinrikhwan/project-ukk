-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2023 at 02:54 PM
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
-- Database: `school_apps`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `foto` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `username`, `password`, `foto`) VALUES
(2, 'rio', 'rio', '$2y$10$pbdebzDrxgyJ0QHEZWQ8FeYE8lXdANrJw3FEMHO4FLEtqFv1AxzYq', 0x496d6167652f736d6b73797069736d616a752e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(225) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `foto` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `deskripsi`, `foto`) VALUES
(1, 'Lab Komputer', 'Lab Komputer tersedia untuk umum dan siswa dan lainnya', 0x496d6167652f6c6162696e67677269732e6a706567),
(3, 'Lab Bahasa Inggris', 'Lab Bahasa Inggris Full Fasilitas', 0x496d6167652f6c6162696e67677269732e6a706567),
(4, 'Lab Ujian Komputer', 'Lab Yang Digunakan para siswa untuk melakukan ujian berbasis komputer dan berbagai kegiatan lainnya', 0x496d6167652f6c6162696e67677269732e6a706567);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(10) NOT NULL,
  `nama_guru` varchar(225) NOT NULL,
  `tmpt_tgl_lahir` date NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `nik` int(16) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `foto` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `tmpt_tgl_lahir`, `alamat`, `nik`, `mapel`, `foto`) VALUES
(2, 'Kellyn Frisca Prastiwi S.kom', '2023-08-11', 'Tandem Hilir', 2147483647, 'Bahasa Inggris', 0x496d6167652f393333343234332d72656d6f766562672d707265766965772e706e67),
(3, 'Rio Rapansyah S.kom', '2023-08-03', 'Widya Permai', 2147483647, 'Produktif RPL', 0x496d6167652f393333343234332d72656d6f766562672d707265766965772e706e67),
(4, 'Rifki Nur Ikhwan S.kom', '2023-08-03', 'Alum Permai', 2147483647, 'Produktif RPL', 0x496d6167652f393333343234332d72656d6f766562672d707265766965772e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `nik` int(16) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `pilihan_jurusan` varchar(225) NOT NULL,
  `asal_sekolah` varchar(225) NOT NULL,
  `alasan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `nama`, `nik`, `alamat`, `pilihan_jurusan`, `asal_sekolah`, `alasan`) VALUES
(3, 'rio', 127177, 'Widya Permai', 'rpl', 'maju', 'gatau'),
(6, 'rifki', 12887389, 'Alum Permai', 'RPL', 'Furqoon', 'Gatau Malas Pengen Beli Truk');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `tanggal`, `deskripsi`) VALUES
(1, '2023-08-09', 'Pengumuman Lomba Pornografi'),
(2, '2023-08-26', 'Pengadaan Perlombaan 17 Agustus Di Lingkungan sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` int(10) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `nis` int(10) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tmpt_tgl_lahir` date NOT NULL,
  `jurusan` varchar(225) NOT NULL,
  `foto` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama`, `nis`, `alamat`, `tmpt_tgl_lahir`, `jurusan`, `foto`) VALUES
(177778889, 'Rifki Nur Ikhwan', 8887790, 'Perumahan alum permai', '2006-01-03', 'TKJ', 0x496d6167652f646f776e6c6f61642e6a706567),
(1112222334, 'test', 3356794, 'test', '2023-08-21', 'BDP', 0x496d6167652f393333343234332d72656d6f766562672d707265766965772e706e67);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `nisn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1928374786;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
