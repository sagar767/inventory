-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2015 at 12:01 AM
-- Server version: 5.6.25-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE IF NOT EXISTS `billing` (
`id` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `cus_name` varchar(120) NOT NULL,
  `cus_mail` varchar(80) NOT NULL,
  `cus_phone` bigint(10) NOT NULL,
  `pay_mode` enum('Cash','Cheque','Card','Credit') NOT NULL,
  `prd_quantity` int(10) NOT NULL,
  `date` date NOT NULL,
  `prd_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `pid`, `cus_name`, `cus_mail`, `cus_phone`, `pay_mode`, `prd_quantity`, `date`, `prd_total`) VALUES
(9, 12, 'asdsad', 'sad@gmailc.oo', 9830412578, 'Card', 2, '2015-10-22', 4000.00);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`id` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `cus_name` varchar(250) NOT NULL,
  `cus_phone` bigint(10) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `quantity` tinyint(5) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `pay_method` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`id` int(5) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_email` varchar(150) NOT NULL,
  `cus_phone` bigint(10) NOT NULL,
  `cus_bday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE IF NOT EXISTS `dealer` (
`id` int(10) NOT NULL,
  `company` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`id`, `company`, `name`, `phone`, `email`) VALUES
(12, 'Company 1', 'Dealer 1', 7890713852, 'asd@fff.com'),
(13, 'Company 2', 'Dealer 2', 2323232323, 'sad@ffz.com'),
(14, 'Company 3', 'Dealer 3', 3434343434, 'asd@gg.com'),
(15, 'Company 4', 'Dealer 4', 4356559835, 'asd@gg.com'),
(16, 'Company 5', 'Dealer 5', 2536666614, 'asd@sf');

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE IF NOT EXISTS `ledger` (
`id` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `tr_type` enum('Inward','Outward') NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `services` enum('Stock In','Checkout','Stock Out','Profit') NOT NULL,
  `user_by` varchar(155) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`id`, `pid`, `quantity`, `tr_type`, `amount`, `date`, `services`, `user_by`) VALUES
(1, 11, 4, 'Inward', 16000.00, '2015-10-19', 'Stock In', 'admin'),
(2, 12, 5, 'Inward', 10000.00, '2015-10-20', 'Stock In', 'admin'),
(3, 13, 3, 'Inward', 45000.00, '2015-10-20', 'Stock In', 'admin'),
(4, 14, 4, 'Inward', 2480.00, '2015-10-20', 'Stock In', 'admin'),
(5, 15, 4, 'Inward', 1700.00, '2015-10-20', 'Stock In', 'admin'),
(6, 16, 3, 'Inward', 2700.00, '2015-10-20', 'Stock In', 'admin'),
(7, 17, 2, 'Inward', 50000.00, '2015-10-20', 'Stock In', 'admin'),
(8, 18, 2, 'Inward', 51600.00, '2015-10-20', 'Stock In', 'admin'),
(9, 19, 2, 'Inward', 600.00, '2015-10-20', 'Stock In', 'admin'),
(15, 12, -2, 'Outward', -4000.00, '2015-10-22', 'Checkout', 'admin'),
(16, 12, 2, 'Outward', 120.00, '2015-10-22', 'Profit', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(5) NOT NULL,
  `sku` varchar(90) NOT NULL,
  `dealer_id` int(5) NOT NULL,
  `prd_name` varchar(155) NOT NULL,
  `prd_base_price` decimal(10,2) NOT NULL,
  `prd_com` decimal(10,2) NOT NULL,
  `prd_img` varchar(200) NOT NULL,
  `prd_details` varchar(255) NOT NULL,
  `prd_quantity` int(5) NOT NULL,
  `prd_catg` enum('Mobile','Home Appliances','Grocery') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `sku`, `dealer_id`, `prd_name`, `prd_base_price`, `prd_com`, `prd_img`, `prd_details`, `prd_quantity`, `prd_catg`) VALUES
(11, 'PDI1151311228', 12, 'Micromax XNINJA', 4000.00, 2.00, 'uploads/products/E653_Thumbnail.jpg', 'ASDASD', 4, 'Mobile'),
(12, 'PDI157704844', 16, 'Nokia BL5030', 2000.00, 3.00, 'uploads/products/5235.jpg', 'Mobile Details on Bar Phone', 5, 'Mobile'),
(13, 'PDI1586447045', 13, 'Blackberry Beta', 15000.00, 2.00, 'uploads/products/Flat-Mobile-UI-Design-29-3.jpg', 'Slim and Cool Looking', 3, 'Mobile'),
(14, 'PDI190274731', 12, 'Grocery of Fruits', 620.00, 2.00, 'uploads/products/Grocery-2.jpg', 'Fruits selling in Group', 4, 'Grocery'),
(15, 'PDI539844557', 16, 'Food Leveler for 60', 425.00, 3.00, 'uploads/products/i-grocery.jpg', 'Demo Details of Grocery', 4, 'Grocery'),
(16, 'PDI613822873', 15, 'Usha Fan 40 2L', 900.00, 8.00, 'uploads/products/superfan-a1-400x400-imae3hyrzf9p7pch.jpeg', 'Comfortable beyond the expectation', 3, 'Home Appliances'),
(17, 'PDI1483689775', 14, 'LG Cooler', 25000.00, 12.00, 'uploads/products/kicthen-appliances.jpg', 'Refrigerator Details Demo', 2, 'Home Appliances'),
(18, 'PDI81394640', 15, 'LG Plasma TV', 25800.00, 6.00, 'http://langka.lib.ugm.ac.id/public/images/no_image.jpg', 'Plasma TV of 34"', 2, 'Home Appliances'),
(19, 'PDI329708269', 12, 'Grocery at New Range', 300.00, 1.00, 'http://langka.lib.ugm.ac.id/public/images/no_image.jpg', 'Grocery for Americans', 2, 'Grocery');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('Admin','Worker','Customer') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `user_type`) VALUES
(1, 'admin', 'admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
 ADD PRIMARY KEY (`id`), ADD KEY `pid` (`pid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`id`), ADD KEY `pid` (`pid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
 ADD PRIMARY KEY (`id`), ADD KEY `pid` (`pid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`), ADD KEY `deal_id` (`dealer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`id`);

--
-- Constraints for table `ledger`
--
ALTER TABLE `ledger`
ADD CONSTRAINT `ledger_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`dealer_id`) REFERENCES `dealer` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
