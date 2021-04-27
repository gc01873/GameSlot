-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2021 at 03:03 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gameSQL`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerId` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `addrStreet` varchar(255) DEFAULT NULL,
  `addrCity` varchar(255) DEFAULT NULL,
  `addrState` varchar(255) DEFAULT NULL,
  `addrZip` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerId`, `firstName`, `lastName`, `email`, `addrStreet`, `addrCity`, `addrState`, `addrZip`) VALUES
(5, 'Gregory', 'Cooper', 'gc01873@georgiasouthern.edu', '1400 Statesboro Place', 'Statesboro', 'Georgia', 30458),
(6, 'John', 'Body', 'jb987@georgiasouthern.edu', '147 Statesboro Place', 'Statesboro', 'Georgia', 30458);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `gameId` int(11) NOT NULL,
  `sku` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `Developer` varchar(255) DEFAULT NULL,
  `Genre` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`gameId`, `sku`, `title`, `Developer`, `Genre`, `Description`, `price`) VALUES
(1, 50, 'Call of Duty: Black Ops 3', 'Trey-arch', 'First-person shooter', 'Call of Duty: Black Ops III is a 2015 first-person shooter video game, developed by Treyarch and published by Activision. ... The game also features a standalone Zombies campaign mode, and a \'Nightmares\' mode which replaces all enemies as zombies.', 60),
(2, 40, 'Enter the Gungeon', 'Dodge Roll', 'First-person shooter', 'Enter the Gungeon is a bullet hell roguelike video game developed by Dodge Roll and published by Devolver Digital.', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `gameId` int(11) DEFAULT NULL,
  `customerId` int(11) DEFAULT NULL,
  `orderDate` date DEFAULT NULL,
  `completedDate` date DEFAULT NULL,
  `Completed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userInfo`
--

CREATE TABLE `userInfo` (
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userInfo`
--

INSERT INTO `userInfo` (`email`, `username`, `password`) VALUES
('gc01873@georgiasouthern.edu', 'gregboy123', 'exurb1a'),
('jb987@georgiasouthern.edu', 'jboe242', 'schoolOfLife');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `userEmail` varchar(128) NOT NULL,
  `userFName` varchar(128) NOT NULL,
  `userLName` varchar(128) NOT NULL,
  `userPassword` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gameId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `gameId` (`gameId`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `userInfo`
--
ALTER TABLE `userInfo`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `gameId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`email`) REFERENCES `userInfo` (`email`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`gameId`) REFERENCES `game` (`gameId`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customerId`) REFERENCES `customers` (`customerId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
