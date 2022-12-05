-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 04:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_details`
--

CREATE TABLE `category_details` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_details`
--

INSERT INTO `category_details` (`category_id`, `category_name`, `price`) VALUES
(1, 'Pakaian', 4000),
(2, 'Sepatu', 10000),
(3, 'Helm', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `duration_details`
--

CREATE TABLE `duration_details` (
  `duration_id` int(11) NOT NULL,
  `duration_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `duration_details`
--

INSERT INTO `duration_details` (`duration_id`, `duration_name`) VALUES
(1, 'Biasa'),
(2, 'Cepat'),
(3, 'Kilat');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `weight` float NOT NULL,
  `date_in` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `duration_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `weight`, `date_in`, `user_id`, `duration_id`, `category_id`, `payment_id`) VALUES
(1, 3, '2022-12-03', 1, 2, 1, 2),
(2, 1.5, '2022-12-03', 3, 2, 1, 2),
(3, 1, '2022-12-03', 2, 1, 3, 1),
(13, 3, '2022-12-04', 20, 1, 2, 1),
(14, 20, '2022-12-04', 20, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `payment_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_id`, `name`) VALUES
(1, 'Cash'),
(2, 'E-Wallet');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `address`) VALUES
(1, 'Maria Anders', 'mariaan@yahoo.com', 'mariadb', 'Obere Str. 57'),
(2, 'Ana Trujillo', 'trujilloan@yahoo.com', 'ana1234', 'Avda. de la Constitución 2222'),
(3, 'Antonio Moreno', 'morenoantonio@gmail.com', 'morenojsj', 'Mataderos  2312'),
(20, 'Ciko Edo Febrian', 'bima@gmail.com', 'bima42', 'Karangasem, Grobogan, Jawa Tengah RT 02 RW 01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_details`
--
ALTER TABLE `category_details`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `duration_details`
--
ALTER TABLE `duration_details`
  ADD PRIMARY KEY (`duration_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_orders_user` (`user_id`),
  ADD KEY `fk_orders_duration_details` (`duration_id`),
  ADD KEY `fk_orders_categorydetails` (`category_id`),
  ADD KEY `fk_orders_payment` (`payment_id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_details`
--
ALTER TABLE `category_details`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `duration_details`
--
ALTER TABLE `duration_details`
  MODIFY `duration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_categorydetails` FOREIGN KEY (`category_id`) REFERENCES `category_details` (`category_id`),
  ADD CONSTRAINT `fk_orders_duration_details` FOREIGN KEY (`duration_id`) REFERENCES `duration_details` (`duration_id`),
  ADD CONSTRAINT `fk_orders_payment` FOREIGN KEY (`payment_id`) REFERENCES `payment_details` (`payment_id`),
  ADD CONSTRAINT `fk_orders_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
