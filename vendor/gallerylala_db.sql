-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2019 at 10:24 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallerylala_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_img` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_gender` varchar(100) NOT NULL,
  `customer_age` varchar(100) NOT NULL,
  `customer_phone` varchar(100) NOT NULL,
  `customer_auto` varchar(255) NOT NULL,
  `customer_date` varchar(100) NOT NULL,
  `customer_time` varchar(100) NOT NULL,
  `customer_active` varchar(100) NOT NULL,
  `customer_login_id` varchar(255) NOT NULL,
  `customer_login_auto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `footer_tab` varchar(50) NOT NULL,
  `footer_logo` varchar(255) NOT NULL,
  `footer_copyright` varchar(255) NOT NULL,
  `footer_logo_show` varchar(50) NOT NULL,
  `footer_date` varchar(100) NOT NULL,
  `footer_time` varchar(100) NOT NULL,
  `footer_menu_show` varchar(100) NOT NULL,
  `footer_social` varchar(50) NOT NULL,
  `footer_auto_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id` int(11) NOT NULL,
  `head_logo` varchar(255) NOT NULL,
  `head_cart` varchar(50) NOT NULL,
  `head_account` varchar(50) NOT NULL,
  `head_menu` varchar(50) NOT NULL,
  `head_auto` varchar(255) NOT NULL,
  `head_date` varchar(100) NOT NULL,
  `head_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menutable`
--

CREATE TABLE `menutable` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_url` varchar(255) NOT NULL,
  `menu_title` varchar(255) NOT NULL,
  `menu_date` varchar(100) NOT NULL,
  `menu_time` varchar(100) NOT NULL,
  `menu_postion` varchar(100) NOT NULL,
  `menu_type` varchar(100) NOT NULL,
  `menu_heading` varchar(255) NOT NULL,
  `menu_auto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `social_icon`
--

CREATE TABLE `social_icon` (
  `id` int(11) NOT NULL,
  `social_name` varchar(255) NOT NULL,
  `social_path` varchar(255) NOT NULL,
  `social_link` text NOT NULL,
  `social_date` varchar(100) NOT NULL,
  `social_time` varchar(100) NOT NULL,
  `social_hide` varchar(50) NOT NULL,
  `social_auto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userlogntable`
--

CREATE TABLE `userlogntable` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_session_id` varchar(255) NOT NULL,
  `user_cookies` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `user_status` varchar(100) NOT NULL,
  `user_auto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userpermission`
--

CREATE TABLE `userpermission` (
  `id` int(11) NOT NULL,
  `user_p_email_ap` varchar(100) NOT NULL,
  `user_p_block` varchar(100) NOT NULL,
  `user_p_delete` varchar(100) NOT NULL,
  `user_p_id` varchar(255) NOT NULL,
  `user_p_auto_id` varchar(255) NOT NULL,
  `user_p_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `vendor_f_name` varchar(255) NOT NULL,
  `vendor_l_name` varchar(255) NOT NULL,
  `vendor_company` varchar(255) NOT NULL,
  `vendor_email` varchar(255) NOT NULL,
  `vendor_phone` varchar(255) NOT NULL,
  `vendor_url` text NOT NULL,
  `vendor_date` varchar(100) NOT NULL,
  `vendor_time` varchar(100) NOT NULL,
  `vendor_productdata` varchar(255) NOT NULL,
  `vendor_auto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menutable`
--
ALTER TABLE `menutable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_icon`
--
ALTER TABLE `social_icon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogntable`
--
ALTER TABLE `userlogntable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userpermission`
--
ALTER TABLE `userpermission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menutable`
--
ALTER TABLE `menutable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_icon`
--
ALTER TABLE `social_icon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlogntable`
--
ALTER TABLE `userlogntable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userpermission`
--
ALTER TABLE `userpermission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
