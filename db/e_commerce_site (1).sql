-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 07:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brandId`, `brandName`) VALUES
(1, 'IPhone'),
(2, 'Samsung'),
(3, 'Walton'),
(4, 'Singer');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(55) NOT NULL,
  `category_name` varchar(55) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `date`) VALUES
(1, 'Mobile', '2024-11-21 15:08:26'),
(2, 'Computer', '2024-11-21 20:48:59'),
(6, 'Laptop', '2024-12-01 07:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `id` int(11) NOT NULL,
  `c_name` varchar(55) NOT NULL,
  `number` int(55) NOT NULL,
  `A_number` int(55) NOT NULL,
  `address` varchar(55) NOT NULL,
  `fax` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `city` varchar(55) NOT NULL,
  `postal_code` int(55) NOT NULL,
  `country` varchar(55) NOT NULL,
  `facebook` varchar(55) NOT NULL,
  `instragram` varchar(55) NOT NULL,
  `google` varchar(55) NOT NULL,
  `twitter` varchar(55) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`id`, `c_name`, `number`, `A_number`, `address`, `fax`, `email`, `city`, `postal_code`, `country`, `facebook`, `instragram`, `google`, `twitter`, `date`) VALUES
(1, 'Beximco', 2147483647, 2147483647, 'Mohammadpur, Road-3,block-c Dhaka', '+5434563', 'admin@gmail.com', 'Dhaka', 32673, 'Bangladesh', 'https://translate.google.com.bd/?hl=bn&sl=en&tl=bn&op=t', 'https://www.linkedin.com/in/shafiqul-islam-419a87254/', 'https://www.linkedin.com/in/shafiqul-islam-419a87254/', 'https://www.linkedin.com/in/shafiqul-islam-419a87254/', '2024-12-20 04:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `contact_tbl`
--

CREATE TABLE `contact_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone` int(15) NOT NULL,
  `subject` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_tbl`
--

INSERT INTO `contact_tbl` (`id`, `name`, `email`, `phone`, `subject`) VALUES
(1, 'Saifur Rahman', 'ddd@gmail.com', 1792153471, 'sdfdsafsdfds'),
(2, 'Saifur Rahman', 'engrshafiq20@gmail.com', 1792153471, 'this is my shop naw today');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `p_name` varchar(55) NOT NULL,
  `p_title` mediumtext NOT NULL,
  `p_description` longtext NOT NULL,
  `prize` float(10,2) NOT NULL,
  `image` varchar(55) NOT NULL,
  `cat_Id` varchar(55) NOT NULL,
  `brand_Id` varchar(55) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `p_title`, `p_description`, `prize`, `image`, `cat_Id`, `brand_Id`, `type`, `date`) VALUES
(1, 'Phone', 'Uniqe product of banglasdesh', 'Stay powered up on the go with the SuperCharge 2000X, your ultimate portable charging companion. Boasting a massive 20,000mAh capacity, this sleek power bank can charge your smartphone up to five times or your tablet twice on a single charge. Its dual USB-A and USB-C', 50.00, '1733039260-mobile2.jfif', '1', '4', 0, '2024-12-01 07:47:40'),
(2, 'Pc Casing', 'Uniqe product of banglasdesh', 'Stay powered up on the go with the SuperCharge 2000X, your ultimate portable charging companion. Boasting a massive 20,000mAh capacity, this sleek power bank can charge your smartphone up to five times or your tablet twice on a single charge. Its dual USB-A and USB-C', 50.00, '1733039287-casing.png', '2', '2', 0, '2024-12-01 07:48:07'),
(3, 'Car', 'Uniqe product of banglasdesh', 'Stay powered up on the go with the SuperCharge 2000X, your ultimate portable charging companion. Boasting a massive 20,000mAh capacity, this sleek power bank can charge your smartphone up to five times or your tablet twice on a single charge. Its dual USB-A and USB-C', 50.00, '1733039323-cur.jfif', '1', '3', 1, '2024-12-01 08:58:05'),
(4, 'Hdd', 'Uniqe product of banglasdesh', 'Stay powered up on the go with the SuperCharge 2000X, your ultimate portable charging companion. Boasting a massive 20,000mAh capacity, this sleek power bank can charge your smartphone up to five times or your tablet twice on a single charge. Its dual USB-A and USB-C', 504.00, '1733039348-hdd.jfif', '2', '3', 1, '2024-12-01 09:13:11'),
(5, 'headfon', 'Uniqe product of banglasdesh', 'Stay powered up on the go with the SuperCharge 2000X, your ultimate portable charging companion. Boasting a massive 20,000mAh capacity, this sleek power bank can charge your smartphone up to five times or your tablet twice on a single charge. Its dual USB-A and USB-C', 504.00, '1733039374-headphone.jfif', '2', '1', 1, '2024-12-01 08:02:54'),
(6, 'Keyboard', 'Uniqe product of banglasdesh', 'Stay powered up on the go with the SuperCharge 2000X, your ultimate portable charging companion. Boasting a massive 20,000mAh capacity, this sleek power bank can charge your smartphone up to five times or your tablet twice on a single charge. Its dual USB-A and USB-C', 5033.00, '1733039406-keyboard.jfif', '1', '1', 1, '2024-12-01 08:02:52'),
(7, 'Hp', 'Uniqe product of banglasdesh', 'Stay powered up on the go with the SuperCharge 2000X, your ultimate portable charging companion. Boasting a massive 20,000mAh capacity, this sleek power bank can charge your smartphone up to five times or your tablet twice on a single charge. Its dual USB-A and USB-C', 50.00, '1733039427-laptop.jfif', '6', '3', 0, '2024-12-01 09:12:19'),
(9, 'Mouse', 'Uniqe product of banglasdesh', 'Stay powered up on the go with the SuperCharge 2000X, your ultimate portable charging companion. Boasting a massive 20,000mAh capacity, this sleek power bank can charge your smartphone up to five times or your tablet twice on a single charge. Its dual USB-A and USB-C', 50.00, '1733043470-mouse.jfif', '2', '2', 0, '2024-12-01 08:57:50'),
(10, 'Ram', 'Uniqe product of banglasdesh', 'Stay powered up on the go with the SuperCharge 2000X, your ultimate portable charging companion. Boasting a massive 20,000mAh capacity, this sleek power bank can charge your smartphone up to five times or your tablet twice on a single charge. Its dual USB-A and USB-C', 50.00, '1733132390-ram.jfif', '6', '4', 1, '2024-12-15 10:28:59'),
(11, 'ups', 'Uniqe product of banglasdesh', 'Stay powered up on the go with the SuperCharge 2000X, your ultimate portable charging companion. Boasting a massive 20,000mAh capacity, this sleek power bank can charge your smartphone up to five times or your tablet twice on a single charge. Its dual USB-A and USB-C', 50.00, '1733161840-ups.jpg', '2', '3', 0, '2024-12-02 17:50:40'),
(12, 'Pc SSD', 'ssd product of banglasdesh', 'Stay powered up on the go with the SuperCharge 2000X, your ultimate portable charging companion. Boasting a massive 20,000mAh capacity, this sleek power bank can charge your smartphone up to five times or your tablet twice on a single charge. Its dual USB-A and USB-C', 50.00, '1733161886-ssd.jfif', '2', '2', 0, '2024-12-02 17:51:26'),
(13, 'Redmi', 'Uniqe product of banglasdesh', 'Stay powered up on the go with the SuperCharge 2000X, your ultimate portable charging companion. Boasting a massive 20,000mAh capacity, this sleek power bank can charge your smartphone up to five times or your tablet twice on a single charge. Its dual USB-A and USB-C', 50.00, '1733161972-mobile.jfif', '1', '1', 1, '2024-12-15 10:29:06'),
(14, 'Galaxy ss1', 'Uniqe product of banglasdesh', 'Stay powered up on the go with the SuperCharge 2000X, your ultimate portable charging companion. Boasting a massive 20,000mAh capacity, this sleek power bank can charge your smartphone up to five times or your tablet twice on a single charge. Its dual USB-A and USB-C', 50.00, '1733162031-mobile2.jfif', '1', '1', 0, '2024-12-02 17:53:51'),
(15, 'Motherboard', 'Uniqe product of banglasdesh', 'Stay powered up on the go with the SuperCharge 2000X, your ultimate portable charging companion. Boasting a massive 20,000mAh capacity, this sleek power bank can charge your smartphone up to five times or your tablet twice on a single charge. Its dual USB-A and USB-C', 50.00, '1733162066-motherboad.jfif', '2', '2', 0, '2024-12-02 17:54:26'),
(16, 'Mini box', 'Minibox product of banglasdesh', 'Stay powered up on the go with the SuperCharge 2000X, your ultimate portable charging companion. Boasting a massive 20,000mAh capacity, this sleek power bank can charge your smartphone up to five times or your tablet twice on a single charge. Its dual USB-A and USB-C', 5000.00, '1734717624-sound box.jfif', '2', '1', 0, '2024-12-20 18:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(55) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(55) NOT NULL,
  `level` tinyint(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Shafiq Islam', 'admin', 'admin@gmail.com', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `s_id` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `prize` float(10,2) NOT NULL,
  `total_prize` int(55) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `prize` float(10,2) NOT NULL,
  `total_prize` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrId`, `productId`, `productName`, `quantity`, `prize`, `total_prize`, `image`, `status`, `date`) VALUES
(1, 12, 15, 'Motherboard', 2, 50.00, 100, '1733162066-motherboad.jfif', 1, '2024-12-20 13:54:10'),
(2, 12, 11, 'ups', 3, 50.00, 150, '1733161840-ups.jpg', 0, '2024-12-20 13:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `phone` int(15) NOT NULL,
  `address` varchar(55) NOT NULL,
  `image` varchar(55) NOT NULL,
  `token` varchar(55) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `name`, `email`, `password`, `phone`, `address`, `image`, `token`, `status`, `date`) VALUES
(11, 'Dobir', 'dobir@gmail.com', 'ddd', 1792153471, 'Sowdi arabia', '1733308681-me1.PNG', '1733308681', 1, '2024-12-12 15:25:45'),
(12, 'Mim', 'mim@gmail.com', 'mmm', 1792153471, 'Dhaka', '1733313786-mim.PNG', '1733423655', 1, '2024-12-05 18:36:22'),
(13, 'Abrar', 'abrar@gmail.com', 'aaa', 1792153471, 'Dhaka', '1733426026-fahad.PNG', '1734717146', 1, '2024-12-20 17:53:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
