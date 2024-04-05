-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2024 at 09:06 AM
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
-- Database: `saathE`
--

-- --------------------------------------------------------

--
-- Table structure for table `addres`
--

CREATE TABLE `addres` (
  `nme` text NOT NULL,
  `oid` int(10) UNSIGNED NOT NULL,
  `adrtype` text NOT NULL,
  `locality` text NOT NULL,
  `city` text NOT NULL,
  `pincode` mediumint(9) NOT NULL,
  `mobno` bigint(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addres`
--

INSERT INTO `addres` (`nme`, `oid`, `adrtype`, `locality`, `city`, `pincode`, `mobno`) VALUES
('Atharva', 33, 'office', 'Wagholi', 'pune', 123451, 8976893645),
('Vedang', 34, 'home', 'Thane', 'mumbai', 111436, 8796354210),
('Sanket', 35, 'home', 'Vimannagar', 'pune', 785632, 8794653820),
('Soham', 36, 'office', 'Bhosari', 'pune', 111345, 1589342111);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `iid` int(11) NOT NULL,
  `iname` text NOT NULL,
  `iprice` int(11) NOT NULL,
  `isquantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`iid`, `iname`, `iprice`, `isquantity`) VALUES
(0, 'Mi Note 10s cover', 180, 65),
(1, 'OnePlus Nord CE', 16000, 2),
(2, 'HP pavillion', 56000, 5),
(3, 'Boat bassheads', 200, 41),
(4, 'Ambrane car charger', 450, 10),
(5, 'Mi mobile charger', 999, 33);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `usrname` tinytext NOT NULL,
  `pasword` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ordert`
--

CREATE TABLE `ordert` (
  `oid` int(10) UNSIGNED NOT NULL,
  `iid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordert`
--

INSERT INTO `ordert` (`oid`, `iid`, `quantity`) VALUES
(33, 0, 1),
(33, 1, 1),
(33, 2, 1),
(33, 3, 2),
(33, 4, 1),
(33, 5, 2),
(34, 4, 1),
(34, 5, 2),
(35, 4, 2),
(36, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `oid` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`oid`, `total`, `time`) VALUES
(33, 75028, '2024-04-05 05:48:06'),
(34, 2448, '2024-04-05 06:20:12'),
(35, 900, '2024-04-05 06:31:17'),
(36, 900, '2024-04-05 07:02:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addres`
--
ALTER TABLE `addres`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `ordert`
--
ALTER TABLE `ordert`
  ADD KEY `iid` (`iid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`oid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `oid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordert`
--
ALTER TABLE `ordert`
  ADD CONSTRAINT `ordert_ibfk_1` FOREIGN KEY (`iid`) REFERENCES `items` (`iid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
