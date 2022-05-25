-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2020 at 06:20 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `data_alatsensor`
--

CREATE TABLE `data_alatsensor` (
  `id` int(255) NOT NULL,
  `kec_air` int(255) NOT NULL,
  `total_liter` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_alatsensor`
--

INSERT INTO `data_alatsensor` (`id`, `kec_air`, `total_liter`) VALUES
(32001, 0, 10000),
(32002, 1, 0.05),
(32003, 0, 41000),
(32004, 0, 0),
(32005, 0, 30000),
(32006, 0, 15000),
(32007, 0, 26000);

-- --------------------------------------------------------

--
-- Table structure for table `data_biaya`
--

CREATE TABLE `data_biaya` (
  `id` int(255) NOT NULL,
  `harga1` float NOT NULL,
  `harga2` float NOT NULL,
  `harga3` float NOT NULL,
  `total_harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_biaya`
--

INSERT INTO `data_biaya` (`id`, `harga1`, `harga2`, `harga3`, `total_harga`) VALUES
(1, 5.25, 0, 0, 5.25);

-- --------------------------------------------------------

--
-- Table structure for table `data_harga`
--

CREATE TABLE `data_harga` (
  `id` int(255) NOT NULL,
  `harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_harga`
--

INSERT INTO `data_harga` (`id`, `harga`) VALUES
(1, 2700),
(2, 3600),
(3, 4400);

-- --------------------------------------------------------

--
-- Table structure for table `data_pemakaian`
--

CREATE TABLE `data_pemakaian` (
  `no` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `liter_awal` float NOT NULL,
  `liter_akhir` float NOT NULL,
  `liter` float NOT NULL,
  `total_harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pemakaian`
--

INSERT INTO `data_pemakaian` (`no`, `id`, `nama`, `alamat`, `bulan`, `liter_awal`, `liter_akhir`, `liter`, `total_harga`) VALUES
(10, 32002, 'Dheka', 'Karawang', 'Agustus', 0, 1.001, 1.001, 3),
(25, 32003, 'Andre Dheka Permana', 'Karawang', 'Oktober', 0, 26000, 26000, 89400),
(26, 32004, 'Aku', 'Karawang', 'Agustus', 0, 40000, 40000, 160000),
(30, 32003, 'Andre Dheka Permana', 'Karawang', 'September', 26000, 41000, 15000, 45000),
(31, 32001, 'Andre', 'Karawang', 'Oktober', 0, 10000, 10000, 27000),
(32, 32005, 'Kusmirah', 'Karawang', 'Juli', 0, 30000, 30000, 107000),
(33, 32006, 'Permana', 'Karawang', 'Agustus', 0, 15000, 15000, 45000),
(35, 32007, 'Kaka', 'Karawang', 'September', 0, 26000, 26000, 89400);

-- --------------------------------------------------------

--
-- Table structure for table `data_pengguna`
--

CREATE TABLE `data_pengguna` (
  `no` int(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pengguna`
--

INSERT INTO `data_pengguna` (`no`, `id`, `nama_pengguna`, `alamat`) VALUES
(50, '32001', 'Andre', 'Karawang'),
(51, '32002', 'Dheka', 'Karawang'),
(52, '32003', 'Andre Dheka Permana', 'Karawang'),
(53, '32004', 'Aku', 'Karawang'),
(54, '32005', 'ADP', 'Karawang'),
(55, '32006', 'Permana', 'Karawang'),
(56, '32007', 'Kaka', 'Karawang');

-- --------------------------------------------------------

--
-- Table structure for table `data_sensor`
--

CREATE TABLE `data_sensor` (
  `id` int(255) NOT NULL,
  `kec_air` float NOT NULL,
  `total_liter` float NOT NULL,
  `harga1` float NOT NULL,
  `harga2` float NOT NULL,
  `harga3` float NOT NULL,
  `total_harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_sensor`
--

INSERT INTO `data_sensor` (`id`, `kec_air`, `total_liter`, `harga1`, `harga2`, `harga3`, `total_harga`) VALUES
(32001, 0, 1.78, 4.81, 0, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `data_sensorall`
--

CREATE TABLE `data_sensorall` (
  `id` int(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `debit_air` int(255) NOT NULL,
  `total_volume` int(255) NOT NULL,
  `total_liter` int(255) NOT NULL,
  `harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_sensorall`
--

INSERT INTO `data_sensorall` (`id`, `tanggal`, `debit_air`, `total_volume`, `total_liter`, `harga`) VALUES
(32001, '2020-09-11', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_alatsensor`
--
ALTER TABLE `data_alatsensor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_biaya`
--
ALTER TABLE `data_biaya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_harga`
--
ALTER TABLE `data_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pemakaian`
--
ALTER TABLE `data_pemakaian`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `data_sensor`
--
ALTER TABLE `data_sensor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_sensorall`
--
ALTER TABLE `data_sensorall`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_alatsensor`
--
ALTER TABLE `data_alatsensor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32008;

--
-- AUTO_INCREMENT for table `data_biaya`
--
ALTER TABLE `data_biaya`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_harga`
--
ALTER TABLE `data_harga`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_pemakaian`
--
ALTER TABLE `data_pemakaian`
  MODIFY `no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  MODIFY `no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `data_sensor`
--
ALTER TABLE `data_sensor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32002;

--
-- AUTO_INCREMENT for table `data_sensorall`
--
ALTER TABLE `data_sensorall`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32002;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
