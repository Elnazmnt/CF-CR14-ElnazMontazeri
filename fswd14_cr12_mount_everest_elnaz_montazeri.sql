-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 03:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fswd14_cr12_mount_everest_elnaz_montazeri`
--
CREATE DATABASE IF NOT EXISTS `fswd14_cr12_mount_everest_elnaz_montazeri` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fswd14_cr12_mount_everest_elnaz_montazeri`;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `locationName` varchar(30) NOT NULL,
  `img` varchar(50) DEFAULT NULL,
  `price` decimal(20,2) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `longitude` decimal(9,6) DEFAULT NULL,
  `latitude` decimal(9,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `locationName`, `img`, `price`, `description`, `longitude`, `latitude`) VALUES
(1, 'Paris', 'paris.jpg', '2500.00', '5 nights stay in a very nice Royal Hotel with brea', '48.859060', '2.351840'),
(3, 'Casablanca', 'casa.jpg', '4350.50', '8 nights stay in a very nice Royal Mansour Hotel C', '33.579705', '-7.606564'),
(4, 'Cairo', 'cairo.jpg', '4500.00', '5 nights stay in a very nice Hotel Grand Royal Cai', '30.049069', '31.235116'),
(5, 'New York', 'ny.jpg', '8500.00', '5 nights stay in a very nice Lotte New York Palace', '40.722133', '-74.007182'),
(6, 'Bali, Indonesia', 'bali.jpg', '3250.00', '5 nights stay in a very nice Royal Beach Seminyak ', '-8.341252', '115.093502'),
(7, 'Rio de Janeiro', 'rio.jpg', '6523.00', '10 nights stay in a very nice Royal Rio Palace Hot', '-22.932409', '-43.244119'),
(8, 'Pretoria, South Africa', 'africa.jpg', '5800.00', '10 nights stay in a very nice Royal Albert Suites ', '-25.720864', '28.232890'),
(11, 'Tehran', '61a23a7853899.jpg', '1000.00', 'sehr schone Stadt', '35.738545', '51.377962');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
