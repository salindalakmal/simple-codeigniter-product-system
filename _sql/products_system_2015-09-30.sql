-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 30, 2015 at 06:09 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_product_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `promotion` tinyint(1) NOT NULL,
  `promotion_price` decimal(10,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `meta_image` varchar(128) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `url`, `image`, `description`, `category`, `price`, `promotion`, `promotion_price`, `status`, `date_modified`, `date_created`, `meta_image`, `meta_keywords`, `meta_description`) VALUES
(1, 'Galaxy Grand Neo', '', 'defaults.jpg', 'Samsung Galaxy Grand Neo (I9060DS). Model No - SMG-GT-I9060DS', 1, '39500.00', 1, '35900.00', 1, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', ''),
(4, 'Galaxy S Duos 2', '', 'defaults.jpg', 'Samsung Galaxy S Duos 2 (S7582) - Samsung Galaxy S Duos 2 - S7582. Model No - SMG-GT-S7582', 1, '24999.00', 1, '19999.00', 1, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', ''),
(5, 'Galaxy Trend', '', 'defaults.jpg', 'Samsung Galaxy Trend (S7392) - Samsung Galaxy Trend S7392. Model No - SMG-GT-S7392', 1, '18990.00', 0, NULL, 1, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', ''),
(6, 'Galaxy S5', '', 'defaults.jpg', 'Samsung Galaxy S5 (SM-G900F). Model No - SMG-SM-G900F', 1, '97499.00', 0, NULL, 1, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', ''),
(7, 'Ascend G610', '', 'defaults.jpg', 'Huawei Ascend G610 - 5" (540x960), 5MP Cam, Jelly Bean. Model No - HU-G610', 4, '31999.00', 1, '25999.00', 1, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', ''),
(8, 'Ascend G510', '', 'defaults.jpg', 'Huawei Ascend G510 - 4.5" (480x854), 5MP Cam, Jelly Bean', 4, '24999.00', 1, '19999.00', 1, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', ''),
(9, 'Ascend P7', '', 'defaults.jpg', 'Huawei Ascend P7 - 5" (1080 x 1920), FHD, 13MP, KitKat', 4, '69999.00', 0, NULL, 1, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', ''),
(10, 'Xperia L', '', 'defaults.jpg', 'Sony Xperia L (C2105) - 4.3" (480x854), 8MP, Jelly Bean. Model No - SY-C2105', 3, '24999.00', 0, NULL, 1, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', ''),
(11, 'Xperia M', '', 'defaults.jpg', 'Sony Xperia M (C1905) - 4" (480x854), 5MP, Jelly Bean', 3, '22999.00', 0, NULL, 1, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', ''),
(12, 'Xperia Z2 LTE', '', 'defaults.jpg', 'Sony Xperia Z2 LTE (D6503) - 5.2" (1080x1920), 20.7MP, KitKat', 3, '105999.00', 0, NULL, 1, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', ''),
(13, 'Nexus 5', '', 'defaults.jpg', 'Abans Product Code:LGPH-D821BK', 5, '89990.00', 0, NULL, 1, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', ''),
(14, 'Optimus F5', '', 'defaults.jpg', 'LG Optimus F5 - P875', 5, '54990.00', 0, NULL, 0, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', ''),
(15, 'iPhone 6 128GB', '', 'defaults.jpg', 'Apple iPhone 6 128GB', 2, '157500.00', 0, NULL, 1, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', ''),
(16, 'iPhone 5s 64GB', '', 'defaults.jpg', 'Apple iPhone 5s 64GB', 2, '125000.00', 0, NULL, 1, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', ''),
(17, 'iPhone 4S 16GB', '', 'defaults.jpg', 'Apple iPhone 4S 16GB', 2, '102300.00', 1, '82500.00', 1, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', ''),
(21, 'sdfg', '', '7.jpg', 'df', 1, '452.00', 0, '10.00', 1, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', ''),
(22, 'sdfg', '', '7.jpg', 'df', 1, '452.00', 0, '10.00', 1, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', ''),
(23, 'sdfg', '', '7.jpg', 'df', 1, '452.00', 0, '10.00', 1, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', ''),
(24, 'dfg', '', '7.jpg', 'dfg', 1, '52.00', 0, '42.00', 1, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', ''),
(25, 'dfg', '', '7.jpg', 'dfg', 1, '52.00', 0, '42.00', 1, '2015-09-30 06:09:02', '0000-00-00 00:00:00', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
