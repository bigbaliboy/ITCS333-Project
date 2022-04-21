-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql111.epizy.com
-- Generation Time: Dec 21, 2021 at 02:02 PM
-- Server version: 5.7.35-38
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_30571704_333project`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `type` varchar(25) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `Description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `price`, `type`, `pic`, `Description`) VALUES
(1, 'Three Guys Burger Spicy', 2, 'Burger', 'Burger1.PNG', 'Three guys burger tender, juicy, full of flavor, served with bbq sauce mixed with special in house sauce, with our famous secret recipe which has hit that goes well with the burger.along with sliced red tomato, sliced cheddar cheese and lettuce. little spicy.'),
(2, 'Mushroom Burger', 2, 'Burger', 'Burger1.PNG', 'Mushroom Burger: Moist and tender, mixture of mushroom and in-house sauce to enhance the flavor topped with a sliced cheese,.'),
(3, 'Classic Burger', 1.9, 'Burger', 'Burger3.PNG', 'Classic Burger toppings include sliced tomato, chopped or sliced white onion, pickles, sliced and melted cheddar cheese, lettuce along with ketchup and mayonnaise'),
(5, 'Kinoa Salad', 2.3, 'Salad', 'salad1.PNG', 'The best Kinoa Salad you will eat your whole life'),
(6, 'Blueberry Lemon Grass', 1.35, 'Drink', 'drink.PNG', 'The best drink to ever'),
(8, 'Snack 1', 2.2, 'Snack', 'snacks1.PNG', 'Want something special?');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `orderNumber` int(8) NOT NULL,
  `MealName` varchar(50) NOT NULL,
  `Quantity` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`orderNumber`, `MealName`, `Quantity`) VALUES
(98, 'classic burger', 3),
(98, 'mushroom burger', 3),
(98, 'three guys burger spicy', 3),
(99, 'blueberry lemon grass mocktail', 5),
(99, 'kinoa salad', 5),
(99, 'mushroom burger', 5),
(99, 'three guys burger spicy', 5),
(100, 'mushroom burger', 1),
(100, 'three guys burger spicy', 1),
(101, 'blueberry lemon grass mocktail', 2),
(101, 'three guys burger spicy', 2),
(102, 'blueberry lemon grass mocktail', 2),
(102, 'three guys burger spicy', 2),
(103, 'blueberry lemon grass mocktail', 2),
(103, 'three guys burger spicy', 2),
(104, 'three guys burger spicy', 1),
(105, 'classic burger', 1),
(106, 'blueberry lemon grass', 2),
(106, 'three guys burger spicy', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderNumber` int(8) NOT NULL,
  `Date` datetime NOT NULL,
  `customerEmail` varchar(320) NOT NULL,
  `Total` decimal(10,3) DEFAULT NULL,
  `Status` enum('Waiting For Confirmation','Acknowledged','Preparing','Out For Delivery','Done') NOT NULL DEFAULT 'Waiting For Confirmation'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderNumber`, `Date`, `customerEmail`, `Total`, `Status`) VALUES
(106, '2021-12-21 12:31:03', 'alaaalawi2001@gmail.com', '7.700', 'Waiting For Confirmation');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobileNumber` int(8) NOT NULL,
  `role` varchar(28) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstName`, `lastName`, `email`, `password`, `mobileNumber`, `role`) VALUES
('Hus', 'Ttt', 'ad3shri@hotmail.com', '1fd861bfce64e356bf3e375c80a4d5ce', 37380351, 'Customer'),
('Ahmed', 'Hasan', 'ahmedhasan@gmail.com', '961b5c13aa029c043f5f9e536c61bc01', 34353632, 'Staff'),
('Akheel', 'idkkk', 'akheel01@gmail.com', '0866b7e741b106ffc3a70f691a56dd06', 34567891, 'Staff'),
('Akheel', 'Nazim', 'akheelnazim157@gmail.com', '0866b7e741b106ffc3a70f691a56dd06', 33123456, 'Customer'),
('Alaa', 'Shehab', 'alaaalawi2001@gmail.com', 'e6db71481d9eba480812aefdd720e22f', 38941020, 'Admin'),
('Hasan', 'Ahmed', 'hasanahmed@gmail.com', '74b300125053bb1d86841090fc39ba42', 39383720, 'Customer'),
('Hasan', 'Latif', 'Hasoon742001@gmail.com', '38ae3008eeaaa2bc02fa1d1362b2ed27', 36456349, 'Customer'),
('Mohd', 'Jalil', 'mohdjalil@gmail.com', '6c6b000e1e2668bf293f4cd35043e605', 36699099, 'Customer'),
('omar', 'younis', 'omar.allam16394@gmail.com', 'bff29fe2c3269812851d6fda69b3472d', 36314350, 'Customer'),
('Salman', 'Buali', 'salmanbuali@gmail.com', 'd33ff50d8186afc9b33e1e8bcc9cf38e', 32165478, 'Staff'),
('sara', 'mohd', 'saramohd@gmail.com', 'ae33f60e64d1e43914d4c32b7777a9a8', 32132111, 'Customer'),
('Noor', 'Taresh', 'super.nweer@gmail.com', '3326a8ccff273b78b4f145fd80f9f333', 33423022, 'Admin'),
('Akheel', 'Nazim', 'theakheel@outlook.com', '0866b7e741b106ffc3a70f691a56dd06', 33123456, 'Customer'),
('Zainab', 'Redha', 'zainabRedha@gmail.com', 'b2b5d51a20951e7d60b3b2d8de165cf3', 38941555, 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`orderNumber`,`MealName`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderNumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderNumber` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
