-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2022 at 10:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gfc_web_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`) VALUES
(3, 'admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` int(20) NOT NULL,
  `productimage` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'Adidas Boots', 79, 'Amazing soccer boot with tight grip designed for speed', 'adidasBoot.png'),
(2, 'Nike Boots', 89, 'Amazing soccer boot with tight grip designed for speed', 'nikeBoot.png'),
(3, 'Puma Boots', 99, 'Amazing soccer boot with tight grip designed for speed', 'pumaBoot.png'),
(5, 'Adidas Jersey', 49, 'Amazing soccer jersey designed for airflow', 'adidasJersey.png'),
(6, 'Nike Jersey', 39, 'Amazing soccer jersey designed for airflow', 'nikeJersey.png'),
(7, 'Puma Jersey', 29, 'Amazing soccer jersey designed for airflow', 'pumaJersey.png'),
(8, 'Under Armor Jersey', 24, 'Amazing soccer jersey designed for airflow', 'uAJersey.png'),
(9, 'Adidas Ball', 39, 'Amazing soccer ball with tight grip designed for professionals', 'adidasBall.png'),
(10, 'Nike Ball', 49, 'Amazing soccer ball with tight grip designed for professionals', 'nikeBall.png'),
(11, 'Puma Ball', 29, 'Amazing soccer ball with tight grip designed for professionals', 'pumaBall.png'),
(12, 'Under Armor Ball', 19, 'Amazing soccer ball with tight grip designed for professionals', 'uABall.png'),
(13, 'Adidas Gloves', 29, 'Amazing soccer gloves with tight grip designed for comfort', 'adidasGlove.png'),
(14, 'Nike Gloves', 32, 'Amazing soccer gloves with tight grip designed for comfort', 'nikeGlove.png'),
(15, 'Puma Gloves', 24, 'Amazing soccer gloves with tight grip designed for comfort', 'pumaGlove.png'),
(16, 'Under Armor Gloves', 15, 'Amazing soccer gloves with tight grip designed for comfort', 'uAGlove.png'),
(17, 'Adidas Socks', 10, 'Amazing socks with tight grip designed for comfort and speed', 'adidasSocks.png'),
(18, 'Nike Socks', 14, 'Amazing socks with tight grip designed for comfort and speed', 'nikeSocks.png'),
(20, 'Under Armor Socks', 6, 'Amazing under armor socks with tight grip designed for comfort and speed', 'uASocks.png'),
(24, 'Adidas Bottle', 19, 'Water bottle for soccer players', 'adidasBottle.png'),
(28, 'Nike Bottle', 24, 'Water bottle for soccer players', 'nikeBottle.png'),
(34, 'Under Armor Boots', 35, 'Amazing soccer boot with tight grip designed for speed', 'uABoot.png'),
(35, 'Puma Socks', 16, 'Amazing socks with tight grip designed for comfort and speed', 'pumaSocks.png'),
(39, 'Puma Bottle', 19, 'Water bottle for soccer players', 'pumaBottle.png'),
(42, 'Under Armor Bottle', 15, 'Water Bottle', 'uABottle.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(16, 'user', 'user@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=650;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
