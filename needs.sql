-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2022 at 01:08 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `needs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin123'),
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `doner_type`
--

CREATE TABLE `doner_type` (
  `id` int(10) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `update_at` date DEFAULT NULL,
  `delete_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donner`
--

CREATE TABLE `donner` (
  `id` int(10) NOT NULL,
  `needer_id` int(10) NOT NULL,
  `type_id` int(10) NOT NULL,
  `status_id` int(10) NOT NULL,
  `need_id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `created_at` date NOT NULL,
  `update_at` date NOT NULL,
  `delete_at` date NOT NULL,
  `details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donner`
--

INSERT INTO `donner` (`id`, `needer_id`, `type_id`, `status_id`, `need_id`, `name`, `description`, `amount`, `created_at`, `update_at`, `delete_at`, `details`) VALUES
(2, 2, 3, 2, 2, 'ahmed', 'he deserve that', 300, '0000-00-00', '0000-00-00', '0000-00-00', NULL),
(2, 2, 3, 2, 2, 'ahmed', 'he deserve that', 300, '0000-00-00', '0000-00-00', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `need`
--

CREATE TABLE `need` (
  `id` int(10) NOT NULL,
  `Type_id` int(10) DEFAULT NULL,
  `statues_Id` int(10) DEFAULT NULL,
  `needer_id` int(10) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Phone` int(10) DEFAULT NULL,
  `Date` timestamp NULL DEFAULT NULL,
  `Details` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `needer`
--

CREATE TABLE `needer` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `needID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `need_status`
--

CREATE TABLE `need_status` (
  `Id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  `delete_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `need_type`
--

CREATE TABLE `need_type` (
  `Id` int(10) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(10) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `Address` varchar(191) DEFAULT NULL,
  `Email` varchar(191) DEFAULT NULL,
  `Regstration` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `localaty` varchar(191) DEFAULT NULL,
  `phone_num` int(10) DEFAULT NULL,
  `type` int(10) NOT NULL,
  `organization` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user type`
--

CREATE TABLE `user type` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doner_type`
--
ALTER TABLE `doner_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `need`
--
ALTER TABLE `need`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `need_status`
--
ALTER TABLE `need_status`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `need_type`
--
ALTER TABLE `need_type`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user type`
--
ALTER TABLE `user type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doner_type`
--
ALTER TABLE `doner_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `need`
--
ALTER TABLE `need`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `need_status`
--
ALTER TABLE `need_status`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `need_type`
--
ALTER TABLE `need_type`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user type`
--
ALTER TABLE `user type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
