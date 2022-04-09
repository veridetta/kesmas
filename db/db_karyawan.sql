-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 02:04 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `alamat` text NOT NULL,
  `tempat_tanggal_lahir` text NOT NULL,
  `jenis_kelamin` text NOT NULL,
  `agama` text NOT NULL,
  `no_hp` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

--
-- Insert 10 dummy data for table karyawan
--
/* Insert 10 random data for table karyawan (nama lengkap, alamat, ttl, jenis kelamin, agama, no hp, email*/
/* 1. nama ridwan, 2. akbar, 3. hasna, 4. ilham, 5. ayu, 6. rico, 7. syifa, 8. hilmi, 9. rizki, 10. refa */
/*random alamat*/
/*random ttl*/
/*random jenis kelamin*/
/*random agama*/
/*random no hp*/
/*random email*/
/* insert 10 dummy data for table karyawan */
INSERT INTO `karyawan` (`id`, `nama_lengkap`, `alamat`, `tempat_tanggal_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `email`) VALUES
(1, 'Ridwan', 'Jl. Raya Cibaduyut No.1, Cibaduyut, Kec. Cibaduyut, Kab. Bandung, Jawa Barat 40391', 'Bandung, 28 Agustus 1999', 'Laki-Laki', 'Islam', '081212121212', 'ridwan@gmail.com'),
(2, 'Akbar', 'Jl. Raya Cibaduyut No.1, Cibaduyut, Kec. Cibaduyut, Kab. Bandung, Jawa Barat 40391', 'Bandung, 28 Agustus 1999', 'Laki-Laki', 'Islam', '081212121212', 'akbar@gmail.com'),
(3, 'Hasna', 'Jl. Raya Cibaduyut No.1, Cibaduyut, Kec. Cibaduyut, Kab. Bandung, Jawa Barat 40391', 'Bandung, 28 Agustus 1999', 'Perempuan', 'Islam', '081212121212', 'hasna@gmail.com'),
(4, 'Ilham', 'Jl. Raya Cibaduyut No.1, Cibaduyut, Kec. Cibaduyut, Kab. Bandung, Jawa Barat 40391', 'Bandung, 28 Agustus 1999', 'Laki-Laki', 'Islam', '081212121212', 'ilham@gmail.com'),
(5, 'Ayu', 'Jl. Raya Cibaduyut No.1, Cibaduyut, Kec. Cibaduyut, Kab. Bandung, Jawa Barat 40391', 'Bandung, 28 Agustus 1999', 'Perempuan', 'Islam', '081212121212', 'ayu@gmail.com'),
(6, 'Rico', 'Jl. Raya Cibaduyut No.1, Cibaduyut, Kec. Cibaduyut, Kab. Bandung, Jawa Barat 40391', 'Bandung, 28 Agustus 1999', 'Laki-Laki', 'Islam', '081212121212', 'rico@gmail.com'),
(7, 'Syifa', 'Jl. Raya Cibaduyut No.1, Cibaduyut, Kec. Cibaduyut, Kab. Bandung, Jawa Barat 40391', 'Bandung, 28 Agustus 1999', 'Perempuan', 'Islam', '081212121212', 'syifa@gmail.com'),
(8, 'Hilmi', 'Jl. Raya Cibaduyut No.1, Cibaduyut, Kec. Cibaduyut, Kab. Bandung, Jawa Barat 40391', 'Bandung, 28 Agustus 1999', 'Laki-Laki', 'Islam', '081212121212', 'hilmi@gmail.com'),
(9, 'Rizki', 'Jl. Raya Cibaduyut No.1, Cibaduyut, Kec. Cibaduyut, Kab. Bandung, Jawa Barat 40391', 'Bandung, 28 Agustus 1999', 'Laki-Laki', 'Islam', '081212121212', 'rizki@gmail.com'),
(10, 'Refa', 'Jl. Raya Cibaduyut No.1, Cibaduyut, Kec. Cibaduyut, Kab. Bandung, Jawa Barat 40391', 'Bandung, 28 Agustus 1999', 'Perempuan', 'Islam', '081212121212', 'refa@gmail.com');
-- --------------------------------------------------------
--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'admin', 'Administrator', 'admin'),
(2, 'user', 'user', 'User', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
