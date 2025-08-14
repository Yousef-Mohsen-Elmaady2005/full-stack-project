-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2025 at 06:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progect`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `pr`) VALUES
(3, 'yousef', '1342', 'elmaandy@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Apple'),
(2, 'Oppo'),
(3, 'HP'),
(4, 'Zara'),
(5, 'Dell'),
(6, 'lenovo'),
(7, 'samsong');

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `name`) VALUES
(1, 'Phone'),
(2, 'LapTop'),
(3, 'DeskTop'),
(4, 'T-shirt');

-- --------------------------------------------------------

--
-- Table structure for table `pr`
--

CREATE TABLE `pr` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pr`
--

INSERT INTO `pr` (`id`, `name`) VALUES
(1, 'woner'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `des` text NOT NULL,
  `brand` int(11) NOT NULL,
  `cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `count`, `des`, `brand`, `cat`) VALUES
(9, 'hp 12', 50000, '18.jpg', 30, ' Laptop with 10th generation specifications and TX3060', 3, 2),
(14, 'Reno 6', 10000, '173401698843935.jpg', 25, 'oppo reno6 latest version with professional camera.      ', 2, 1),
(15, 'iphone 14 pro', 70000, '1734018183126910.jpg', 28, '      iPhone 14 Pro latest version with professional camera.      ', 1, 1),
(16, 'hp z', 73000, '1734018467193319.jpg', 17, 'Laptop with 11th generation specifications and TX3040', 3, 2),
(17, 'iphone 15 pro', 80000, '173404860062607.jpg', 12, '   iPhone 15 Pro latest version with professional camera.   ', 1, 1),
(18, 'lenov12', 45000, '173404873936711733852160681716.jpg', 14, '      Laptop with 11th generation specifications and RTX3050   ', 6, 2),
(19, 'lenovo g9', 80000, '1734182415803817340152542155173385208436511.jpg', 14, '   Laptop with 11th generation specifications and RTX3050', 6, 2),
(20, 'T-shert', 800, '1734212613636821.jpg', 15, 'Swe T-shert', 4, 4),
(21, 'T-shert', 350, '1734212683600323.jpg', 55, 'T-shert polo', 4, 4),
(22, 'T-shert ', 550, '1734212730254425.jpg', 15, 'T-shert polo', 4, 4),
(23, 'T-shirt ', 400, '173421280519924.jpg', 22, 'T-shirt with sleeves', 4, 4),
(24, 'Shirt', 700, '1734212869490628.jpg', 14, 'Sports shirt', 4, 4),
(27, 'pc', 50000, '1734892931824170.jpg', 5, '   pc 2025\r\n4080rtx\r\ni9750   ', 3, 3),
(31, 'dell g10', 55555, '1735118647869012.jpg', 5, '   GHHHHHHHHHHHHHHFDDDRR   ', 5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pr` (`pr`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pr`
--
ALTER TABLE `pr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand` (`brand`),
  ADD KEY `cat` (`cat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pr`
--
ALTER TABLE `pr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`pr`) REFERENCES `pr` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`cat`) REFERENCES `cat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
