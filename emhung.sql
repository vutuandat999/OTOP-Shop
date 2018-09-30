-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 06, 2018 at 05:35 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emhung`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int(11) NOT NULL,
  `checkout_customerinfo` text NOT NULL,
  `checkout_iteminfo` text NOT NULL,
  `checkout_totalprice` text NOT NULL,
  `checkout_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(5) NOT NULL,
  `item_name` text NOT NULL,
  `item_thumb` text NOT NULL,
  `item_details` text NOT NULL,
  `item_size` text NOT NULL,
  `item_price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_thumb`, `item_details`, `item_size`, `item_price`) VALUES
(1, 'RB3025 Crystal Green (L0207)', '1.jpg', 'Ray Ban RB3025 Metal Aviator Sunglasses Arista - Crystal Green (L0207)', '58mm', '175'),
(2, '0RB4165 Rubber Black', '2.jpg', 'Ray-Ban 0RB4165 Wayfarer Sunglasses - Rubber Black', '58mm', '160.5'),
(3, 'RB3025 Demiglos Brushed BronzeRed Mirror', '3.jpg', 'Ray Ban RB3025 Metal Aviator Sunglasses - Demiglos Brushed BronzeRed Mirror', '58mm', '15'),
(4, 'RB3025 GoldCrystal Brown Gradient', '4.jpg', 'Ray Ban RB3025 Metal Aviator Sunglasses - GoldCrystal Brown Gradient', '58mm', '145'),
(5, 'ROUND METAL CRYSTAL GREEN', '5.jpg', 'Ray-Ban ROUND METAL - ARISTA Frame - CRYSTAL GREEN Lenses 50mm Non-Polarized', '62mm', '230'),
(6, '0RB4165 Black Rubber', '6.jpg', 'Ray-Ban 0RB4165 Wayfarer Sunglasses - Black Rubber', '58mm', '200'),
(7, 'RB3025 BlackCrystal Gray Green', '7.jpg', 'Ray Ban RB3025 Metal Aviator Sunglasses - BlackCrystal Gray Green', '58mm', '160'),
(8, 'RB3025 Shiny BlackGreen Gradient Mirror', '8.jpg', 'Ray Ban RB3025 Metal Aviator Sunglasses - Shiny BlackGreen Gradient Mirror', '58mm', '175'),
(9, 'ORB3447 Arista', '9.jpg', 'Ray Ban ORB3447 Round Metal Sunglasses - 47mm Arista', '47mm', '100'),
(10, '0RB4165 Black Rubber Lens Polar Grey Gradient', '10.jpg', 'Ray-Ban 0RB4165 Wayfarer Sunglasses Frame - Black Rubber Lens Polar Grey Gradient', '58mm', '99.9');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_pwd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_pwd`) VALUES
(1, 'admin', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
