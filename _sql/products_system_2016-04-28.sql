-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 28, 2016 at 05:40 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.30

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
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `meta_image` varchar(128) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `social_meta_title` varchar(128) NOT NULL,
  `social_meta_image` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `url`, `image`, `featured`, `published`, `date_modified`, `date_created`, `meta_image`, `meta_keywords`, `meta_description`, `social_meta_title`, `social_meta_image`) VALUES
(1, 'Samsung', 'samsung', 'defaults.jpg', 0, 1, '2015-09-30 10:00:04', '0000-00-00 00:00:00', '', '', '', '', ''),
(2, 'Apple', 'apple', 'defaults.jpg', 0, 1, '2015-09-30 10:00:04', '0000-00-00 00:00:00', '', '', '', '', ''),
(3, 'Sony', 'sony', 'defaults.jpg', 0, 1, '2015-09-30 10:00:04', '0000-00-00 00:00:00', '', '', '', '', ''),
(4, 'Huwawei', 'huwawei', 'defaults.jpg', 0, 1, '2015-09-30 10:00:04', '0000-00-00 00:00:00', '', '', '', '', ''),
(5, 'LG', 'lg', 'defaults.jpg', 0, 1, '2015-09-30 10:00:04', '0000-00-00 00:00:00', '', '', '', '', ''),
(6, 'Intex', 'intex', 'category_6.jpg', 0, 0, '2015-09-30 10:01:14', '0000-00-00 00:00:00', '', '', '', '', ''),
(7, 'Dialog', 'dialog', 'category_7.jpg', 0, 0, '2015-09-30 06:04:50', '0000-00-00 00:00:00', '', '', '', '', ''),
(8, 'E-tel', 'e-tel', NULL, 0, 0, '2015-09-30 10:00:50', '0000-00-00 00:00:00', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
  `id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `featured` tinyint(4) NOT NULL,
  `stock` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_published` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `social_meta_title` varchar(128) NOT NULL,
  `social_meta_image` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `url`, `image`, `description`, `category`, `price`, `promotion`, `promotion_price`, `featured`, `stock`, `published`, `date_modified`, `date_created`, `date_published`, `meta_keywords`, `meta_description`, `social_meta_title`, `social_meta_image`) VALUES
(1, 'Galaxy Grand Neo', 'galaxy-grand-neo', 'defaults.jpg', 'Samsung Galaxy Grand Neo (I9060DS). Model No - SMG-GT-I9060DS', 1, '39500.00', 1, '35900.00', 0, 0, 1, '2015-09-30 10:04:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(4, 'Galaxy S Duos 2', 'galaxy-s-duos-2', 'defaults.jpg', 'Samsung Galaxy S Duos 2 (S7582) - Samsung Galaxy S Duos 2 - S7582. Model No - SMG-GT-S7582', 1, '24999.00', 1, '19999.00', 1, 0, 1, '2015-09-30 10:04:04', '0000-00-00 00:00:00', '2015-09-29 18:30:00', '', '', '', ''),
(5, 'Galaxy Trend', 'galaxy-trend', 'defaults.jpg', 'Samsung Galaxy Trend (S7392) - Samsung Galaxy Trend S7392. Model No - SMG-GT-S7392', 1, '18990.00', 0, NULL, 0, 0, 1, '2015-09-30 10:04:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(6, 'Galaxy S5', 'galaxy-s5', 'defaults.jpg', 'Samsung Galaxy S5 (SM-G900F). Model No - SMG-SM-G900F', 1, '97499.00', 0, NULL, 0, 0, 1, '2015-09-30 10:04:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(7, 'Ascend G610', 'ascend-g610', 'defaults.jpg', 'Huawei Ascend G610 - 5" (540x960), 5MP Cam, Jelly Bean. Model No - HU-G610', 4, '31999.00', 1, '25999.00', 0, 0, 1, '2015-10-02 04:29:28', '0000-00-00 00:00:00', '2015-10-18 18:30:00', '', '', '', ''),
(8, 'Ascend G510', 'ascend-g510', 'defaults.jpg', 'Huawei Ascend G510 - 4.5" (480x854), 5MP Cam, Jelly Bean', 4, '24999.00', 1, '19999.00', 0, 0, 1, '2015-10-02 04:29:28', '0000-00-00 00:00:00', '2015-09-15 18:30:00', '', '', '', ''),
(9, 'Ascend P7', 'ascend-p7', 'defaults.jpg', 'Huawei Ascend P7 - 5" (1080 x 1920), FHD, 13MP, KitKat', 4, '69999.00', 0, NULL, 1, 0, 1, '2015-10-02 04:29:28', '0000-00-00 00:00:00', '2015-10-27 18:30:00', '', '', '', ''),
(10, 'Xperia L', 'xperia-l', 'defaults.jpg', 'Sony Xperia L (C2105) - 4.3" (480x854), 8MP, Jelly Bean. Model No - SY-C2105', 3, '24999.00', 0, NULL, 0, 0, 1, '2015-09-30 10:04:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(11, 'Xperia M', 'xperia-m', 'defaults.jpg', 'Sony Xperia M (C1905) - 4" (480x854), 5MP, Jelly Bean', 3, '22999.00', 0, NULL, 0, 0, 1, '2015-09-30 09:38:51', '0000-00-00 00:00:00', '2015-09-29 18:30:00', '', '', '', ''),
(12, 'Xperia Z2 LTE', 'xperia-z2-lte', 'defaults.jpg', 'Sony Xperia Z2 LTE (D6503) - 5.2" (1080x1920), 20.7MP, KitKat', 3, '105999.00', 0, NULL, 0, 0, 1, '2015-09-30 10:04:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(13, 'Nexus 5', 'nexus-5', 'defaults.jpg', 'Abans Product Code:LGPH-D821BK', 5, '89990.00', 0, NULL, 1, 0, 1, '2015-09-30 10:04:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(14, 'Optimus F5', 'optimus-f5', 'defaults.jpg', 'LG Optimus F5 - P875', 5, '54990.00', 0, NULL, 0, 0, 0, '2015-09-30 10:05:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(15, 'iPhone 6 128GB', 'iphone-6-128gb', 'defaults.jpg', 'Apple iPhone 6 128GB', 2, '157500.00', 0, NULL, 0, 0, 1, '2015-09-30 11:32:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'h', 'dfg', 'dfg'),
(16, 'iPhone 5s 64GB', 'iphone-5s-64gb', 'defaults.jpg', 'Apple iPhone 5s 64GB', 2, '125000.00', 0, NULL, 1, 0, 1, '2015-09-30 10:05:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(17, 'iPhone 4S 16GB', 'iphone-4s-16gb', 'defaults.jpg', 'Apple iPhone 4S 16GB', 2, '102300.00', 1, '82500.00', 0, 0, 1, '2015-09-30 10:05:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(21, 'dfgd', '', '', '', 3, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 06:18:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(22, 'gfh', '', '', '', 2, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 06:18:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(23, 'gfh', '', '', '', 2, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 06:29:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(24, 'gfh', '', '', '', 2, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 06:30:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(25, 'gfh', 'gfh', '', '', 2, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 07:40:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(26, 'dfgs', 'dfgs', '', '', 2, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 07:42:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(27, 'dfgs', 'dfgs', '', '', 2, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 07:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(28, 'dfgs', 'dfgs', '', '', 2, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 07:43:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(29, 'gfgh', 'gfgh', '', '', 3, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 07:44:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(30, 'dfdf', 'dfdf', '', '', 2, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 09:37:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(31, 'cvvb', 'cvvb', '', '', 3, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 09:38:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(32, 'dhf', 'dhf', '', 'dfg', 1, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 09:43:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(33, 'dfgsd', 'dfgsd', '', '', 3, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 09:54:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(34, 'fdgdfg', 'fdgdfg', '', '', 2, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 10:07:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(35, 'ery', 'ery', '', '', 4, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 10:17:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(36, 'dfg', 'dfg', '', '', 2, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 10:21:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(37, 'dfd', 'dfd', '', '', 1, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 10:26:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(38, 'sdf', 'sdf', '', '', 3, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 10:27:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(39, 'dfd', 'dfd', '', '', 1, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 11:19:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(40, 'sdf', 'sdf', '', '', 2, '0.00', 0, '0.00', 0, 0, 0, '2015-11-19 11:20:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(41, 'fdf', 'fdf', '', '', 1, '0.00', 0, '0.00', 0, 0, 0, '2015-11-20 06:28:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(42, 'fdf', 'fdf', '', '', 1, '0.00', 0, '0.00', 0, 0, 0, '2015-11-20 06:29:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(43, 'tt', 'tt', '', '', 1, '0.00', 0, '0.00', 0, 0, 0, '2015-11-20 06:29:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(44, 'fgh', 'fgh', '', '', 3, '0.00', 0, '0.00', 0, 0, 0, '2015-11-20 06:30:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(45, 'dfg', 'dfg', '', '', 2, '0.00', 0, '0.00', 0, 0, 0, '2015-11-20 06:31:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(46, 'fghf', 'fghf', '', '', 1, '0.00', 0, '0.00', 0, 0, 0, '2015-11-20 07:06:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', ''),
(47, 'hgfghf', 'hgfghf', '', '', 2, '0.00', 0, '0.00', 0, 0, 0, '2015-11-20 07:07:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL,
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
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', NULL, NULL, NULL, NULL, 1268889823, 1450342173, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(5, 1, 1),
(6, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
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
