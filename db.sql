-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2019 at 07:45 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_bin NOT NULL,
  `cost` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT 'img/no-product-image.png',
  `category` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `cost`, `image`, `category`) VALUES
(3, 'Fuck Yeah Coding Time', 1484, '../img/ProductsPhoto/3699190uw1yhc.gif', 'Sprites'),
(4, 'Okay,i will', 88, '../img/ProductsPhoto/59679741966giphy2.gif', 'Arts'),
(6, 'Coder On Rush', 666, '../img/ProductsPhoto/5940271142088.gif', 'Sprites'),
(7, 'Todd Howard', 60, '../img/ProductsPhoto/967473ezgif-1-3eb9a8648336.gif', 'Arts'),
(8, 'Hackerman', 20, '../img/ProductsPhoto/7035590uw2yhc.gif', 'Arts'),
(30, 'Ow shit ni***', 1, '../img/ProductsPhoto/494713z1.gif', 'Scetch'),
(33, 'Cheerleader', 955, '../img/ProductsPhoto/809755ezgif1196f49ca9643.gif', 'Arts'),
(35, 'Bible', 666, '../img/ProductsPhoto/262772infantilewaryhornedtoadsize_restricted.gif', 'Arts'),
(36, 'No Sleep', 444, '../img/ProductsPhoto/776330agedhideousharriersize_restricted.gif', 'Scetch'),
(37, 'Programmer', 4, '../img/ProductsPhoto/3065415-copy.gif', 'Scetch'),
(39, 'CSS', 2321, '../img/ProductsPhoto/9327086.gif', 'Textures'),
(40, 'Poker', 39, '../img/ProductsPhoto/181387p4.gif', 'Arts'),
(41, 'Typical Admin Day', 28, '../img/ProductsPhoto/6213201.gif', 'Scetch'),
(42, 'Skynet becomes', 14, '../img/ProductsPhoto/780482giphy.gif', 'Arts'),
(43, 'Mark Zuckerberg', 9999, '../img/ProductsPhoto/205568262023tenor1.gif', 'Scetch'),
(47, 'Gaben', 321, '../img/ProductsPhoto/998796672255tenor.gif', 'Arts'),
(48, 'Not Sure if i  buy this', 9, '../img/ProductsPhoto/749918202744notsureiffrymemegif.gif', 'Sprites'),
(50, 'Console War', 40, '../img/ProductsPhoto/5205672f276b6d3aae427490f9ebc10ed26419.gif', 'Textures'),
(90, 'Study', 132, '../img/ProductsPhoto/707523giphy2.gif', 'Arts');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(60) CHARACTER SET utf8 NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `image_name` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT 'img/default-user-image.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `image_name`) VALUES
(45, 'admin', '356a192b7913b04c54574d18c28d46e6395428ab', 'guzomawew@cloudstat.top', '../img/UsersPhotos/113015scorpionmortalkombatwallpaperengine.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
