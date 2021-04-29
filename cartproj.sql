-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2021 at 04:59 AM
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
(1, 5, 'Call Of Duty: Black OPS', 'product1.jpg', 'Hollindale', 'Viviene', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 35),
(2, 28, 'Watchdogs: Legion', 'product2.jpg', 'Jakes', 'Ignazio', 'Pellentesque at nulla.', 19),
(3, 32, 'Grand Theft Auto 5', 'product3.jpg', 'Kimbrough', 'Lou', 'Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat.', 14),
(4, 31, 'FARCRY 5', 'product4.jpg', 'Wormell', 'Zarla', 'Integer ac leo. Pellentesque ultrices mattis odio.', 16);

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
(13, 2, 2, 19),
(14, 1, 2, 40),
(15, 2, 2, 38),
(16, 3, 2, 14),
(17, 1, 2, 2),
(18, 1, 2, 5),
(19, 2, 2, 2),
(20, 3, 2, 2),
(21, 2, 2, 2),
(22, 3, 2, 1),
(23, 4, 2, 2),
(24, 1, 2, 5),
(25, 1, 2, 5),
(26, 2, 2, 2),
(27, 3, 2, 1),
(28, 4, 2, 2),
(29, 1, 2, 2),
(30, 2, 2, 1),
(31, 3, 2, 0),
(32, 4, 2, 1),
(33, 2, 2, 0),
(34, 3, 2, 0),
(35, 4, 2, 0),
(36, 1, 2, 2),
(37, 2, 2, 1),
(38, 1, 2, 7),
(39, 3, 2, 1),
(40, 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `userid` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pword` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `addrStreet` varchar(255) DEFAULT NULL,
  `addrCity` varchar(255) DEFAULT NULL,
  `addrState` varchar(255) DEFAULT NULL,
  `addrZip` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userid`, `email`, `pword`, `firstName`, `lastName`, `addrStreet`, `addrCity`, `addrState`, `addrZip`, `username`) VALUES
(1, 'aswyndley0@163.com', 'iC19a7Di', 'Aldo', 'Swyndley', '7485 Sunbrook Way', 'Colorado Springs', 'Colorado', 34355, 'aswyndley0'),
(2, 'mredsall1@utexas.edu', 'WtuOSCTNwhhR', 'Meggie', 'Redsall', '4571 Orin Alley', 'Tampa', 'Florida', 66297, 'mredsall1'),
(3, 'gdoone2@fastcompany.com', '9x5K8c', 'Gena', 'Doone', '79446 Haas Place', 'Albany', 'New York', 34502, 'gdoone2'),
(4, 'slinstead3@wisc.edu', 'HAxCHqgClr2Z', 'Shelley', 'Linstead', '06 Susan Avenue', 'Las Vegas', 'Nevada', 32378, 'slinstead3'),
(5, 'rboyson4@gnu.org', 'Jgl48P', 'Ruthanne', 'Boyson', '442 Loomis Trail', 'Lexington', 'Kentucky', 20238, 'rboyson4'),
(6, 'tjinkin5@jimdo.com', 'ZHLjwCi0sum', 'Tiertza', 'Jinkin', '74392 Barnett Junction', 'New York City', 'New York', 28202, 'tjinkin5'),
(7, 'mgommery6@bbc.co.uk', 'hQyoUkWJ', 'Marti', 'Gommery', '8137 Banding Court', 'Naples', 'Florida', 32135, 'mgommery6'),
(8, 'cfritschmann7@harvard.edu', 'hrfGjNXh', 'Cary', 'Fritschmann', '0 Namekagon Terrace', 'Seattle', 'Washington', 68401, 'cfritschmann7'),
(9, 'erayburn8@shop-pro.jp', 'uqghwVo2', 'Eberto', 'Rayburn', '9013 Springview Avenue', 'Corona', 'California', 80655, 'erayburn8'),
(10, 'fstuddert9@blogs.com', 'byIBFU', 'Farly', 'Studdert', '0 Cottonwood Circle', 'Richmond', 'Virginia', 75315, 'fstuddert9'),
(11, 'oplewesa@cargocollective.com', 'vMFKqF', 'Ondrea', 'Plewes', '771 Scott Junction', 'San Francisco', 'California', 68744, 'oplewesa'),
(12, 'dhudspithb@desdev.cn', 'ZQPwzSA9', 'Donnie', 'Hudspith', '397 Morning Crossing', 'Jamaica', 'New York', 56407, 'dhudspithb'),
(13, 'hbraccoc@jugem.jp', 'XbdIADDbH', 'Harriet', 'Bracco', '51 Marcy Alley', 'San Jose', 'California', 88260, 'hbraccoc'),
(14, 'ejoinsond@bloglines.com', 'PPLaX5dF8', 'Elwira', 'Joinson', '02 Bobwhite Trail', 'New York City', 'New York', 77443, 'ejoinsond'),
(15, 'clanfaree@ucoz.com', 'N3ORq36WVK', 'Clotilda', 'Lanfare', '1 Messerschmidt Avenue', 'Bakersfield', 'California', 68044, 'clanfaree'),
(16, 'lduxfieldf@tinypic.com', 'pKfQbxPBd', 'Latashia', 'Duxfield', '872 Sunbrook Terrace', 'Portsmouth', 'Virginia', 35834, 'lduxfieldf'),
(17, 'rwoolertong@parallels.com', 'deKbUgoMBU', 'Reeba', 'Woolerton', '05087 Northridge Trail', 'Salt Lake City', 'Utah', 22777, 'rwoolertong'),
(18, 'lashplanth@amazon.co.jp', 'syyR8C', 'Lizbeth', 'Ashplant', '819 Ridgeview Park', 'Carol Stream', 'Illinois', 77074, 'lashplanth'),
(19, 'fwincklei@washingtonpost.com', 'FcIlrNacNOu', 'Fletch', 'Winckle', '5 Doe Crossing Place', 'Northridge', 'California', 59763, 'fwincklei'),
(20, 'mredingtonj@blogs.com', 'nQnpkFJmYn9', 'Madalyn', 'Redington', '87 Sullivan Street', 'Las Vegas', 'Nevada', 23343, 'mredingtonj'),
(21, 'demolast@gmail.com', 'demo', 'demo', 'last', '97 Georgia avenue', 'STATESBORO', 'GA', 30458, 'demolast');

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
  MODIFY `gameId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
