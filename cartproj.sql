-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2021 at 03:50 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cartproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `gameId` int(11) NOT NULL,
  `sku` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `Developer` varchar(255) DEFAULT NULL,
  `Genre` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`gameId`, `sku`, `title`, `img`, `Developer`, `Genre`, `Description`, `price`) VALUES
(1, 5, 'Coral', 'product1.jpg', 'Hollindale', 'Viviene', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 40),
(2, 28, 'Talia', 'product2.jpg', 'Jakes', 'Ignazio', 'Pellentesque at nulla.', 19),
(3, 32, 'Letisha', 'product3.jpg', 'Kimbrough', 'Lou', 'Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat.', 14),
(4, 31, 'Karol', 'product4.jpg', 'Wormell', 'Zarla', 'Integer ac leo. Pellentesque ultrices mattis odio.', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `gameId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `gameId`, `userId`, `quantity`) VALUES
(2, 2, 2, 2),
(3, 4, 4, 4),
(4, 1, 2, 840),
(5, 3, 2, 28),
(6, 4, 2, 16),
(7, 1, 2, 840),
(8, 3, 2, 28),
(9, 4, 2, 16),
(10, 2, 2, 19),
(11, 1, 2, 840),
(12, 3, 2, 28),
(13, 2, 2, 19);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userid` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userid`, `email`, `pword`) VALUES
(1, 'mcain0@pbs.org', 'Kj4sbQs0'),
(2, 'ediament1@google.com.au', 'tkL2NXpnY'),
(3, 'bautrie2@webnode.com', 'mADyT0'),
(4, 'dshatliffe3@google.nl', '7hZcL94GSB'),
(5, 'twolfendell4@godaddy.com', 'emg1Lzl'),
(6, 'ljizhaki5@vistaprint.com', 'CQ5w7OixUh'),
(7, 'dimmings6@mapquest.com', 'n0iPmTR'),
(8, 'cbalaisot7@smugmug.com', 'f83vXys7Z4v'),
(9, 'fjessopp8@livejournal.com', 'dKrzoXNCtjzQ'),
(10, 'hcaizley9@chicagotribune.com', '8H3PuFzZzsP'),
(11, 'ggagiea@time.com', 'rpTCAM'),
(12, 'aphebeeb@ezinearticles.com', 'iLzCWCw'),
(13, 'olawsc@mysql.com', 'vkvBe5TfVmU9'),
(14, 'sbordisd@mozilla.com', 'w7OTjMfY0D'),
(15, 'psamarthe@apple.com', 'uswUZOeAhz');

--
-- Indexes for dumped tables
--

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
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `gameId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`gameId`) REFERENCES `game` (`gameId`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `userinfo` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
