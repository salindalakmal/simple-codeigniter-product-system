-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 06, 2015 at 12:17 PM
-- Server version: 5.6.19
-- PHP Version: 5.5.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_product_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `status`) VALUES
(1, 'samsung', '', 1),
(2, 'apple', '', 1),
(3, 'sony', '', 1),
(4, 'huwawei', '', 1),
(5, 'lg', '', 1),
(6, 'intex', 'category_6.jpg', 0),
(7, 'Dialog', 'category_7.jpg', 0),
(8, 'e-tel', NULL, 0),
(13, 'asas', NULL, 0),
(14, 'er', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` int(4) NOT NULL,
  `status` int(1) NOT NULL,
  `promotion` tinyint(1) NOT NULL,
  `promotion_price` decimal(10,2) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category`, `status`, `promotion`, `promotion_price`, `image`) VALUES
(1, 'Galaxy Grand Neo', 'Samsung Galaxy Grand Neo (I9060DS). Model No - SMG-GT-I9060DS', '39500.00', 1, 1, 1, '35900.00', 'defaults.jpg'),
(4, 'Galaxy S Duos 2', 'Samsung Galaxy S Duos 2 (S7582) - Samsung Galaxy S Duos 2 - S7582. Model No - SMG-GT-S7582', '24999.00', 1, 1, 1, '19999.00', 'defaults.jpg'),
(5, 'Galaxy Trend', 'Samsung Galaxy Trend (S7392) - Samsung Galaxy Trend S7392. Model No - SMG-GT-S7392', '18990.00', 1, 1, 0, NULL, 'defaults.jpg'),
(6, 'Galaxy S5', 'Samsung Galaxy S5 (SM-G900F). Model No - SMG-SM-G900F', '97499.00', 1, 1, 0, NULL, 'defaults.jpg'),
(7, 'Ascend G610', 'Huawei Ascend G610 - 5" (540x960), 5MP Cam, Jelly Bean. Model No - HU-G610', '31999.00', 4, 1, 1, '25999.00', 'defaults.jpg'),
(8, 'Ascend G510', 'Huawei Ascend G510 - 4.5" (480x854), 5MP Cam, Jelly Bean', '24999.00', 4, 1, 1, '19999.00', 'defaults.jpg'),
(9, 'Ascend P7', 'Huawei Ascend P7 - 5" (1080 x 1920), FHD, 13MP, KitKat', '69999.00', 4, 1, 0, NULL, 'defaults.jpg'),
(10, 'Xperia L', 'Sony Xperia L (C2105) - 4.3" (480x854), 8MP, Jelly Bean. Model No - SY-C2105', '24999.00', 3, 1, 0, NULL, 'defaults.jpg'),
(11, 'Xperia M', 'Sony Xperia M (C1905) - 4" (480x854), 5MP, Jelly Bean', '22999.00', 3, 1, 0, NULL, 'defaults.jpg'),
(12, 'Xperia Z2 LTE', 'Sony Xperia Z2 LTE (D6503) - 5.2" (1080x1920), 20.7MP, KitKat', '105999.00', 3, 1, 0, NULL, 'defaults.jpg'),
(13, 'Nexus 5', 'Abans Product Code:LGPH-D821BK', '89990.00', 5, 1, 0, NULL, 'defaults.jpg'),
(14, 'Optimus F5', 'LG Optimus F5 - P875', '54990.00', 5, 0, 0, NULL, 'defaults.jpg'),
(15, 'iPhone 6 128GB', 'Apple iPhone 6 128GB', '157500.00', 2, 1, 0, NULL, 'defaults.jpg'),
(16, 'iPhone 5s 64GB', 'Apple iPhone 5s 64GB', '125000.00', 2, 1, 0, NULL, 'defaults.jpg'),
(17, 'iPhone 4S 16GB', 'Apple iPhone 4S 16GB', '102300.00', 2, 1, 1, '82500.00', 'defaults.jpg'),
(21, 'sdfg', 'df', '452.00', 1, 1, 0, '10.00', '7.jpg'),
(22, 'sdfg', 'df', '452.00', 1, 1, 0, '10.00', '7.jpg'),
(23, 'sdfg', 'df', '452.00', 1, 1, 0, '10.00', '7.jpg'),
(24, 'dfg', 'dfg', '52.00', 1, 1, 0, '42.00', '7.jpg'),
(25, 'dfg', 'dfg', '52.00', 1, 1, 0, '42.00', '7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1420541151, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(3, 1, 1),
(4, 1, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
