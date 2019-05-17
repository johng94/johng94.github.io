-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 01:07 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `generico`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `address_id` int(11) NOT NULL,
  `address_line1` varchar(40) DEFAULT NULL,
  `address_line2` varchar(40) DEFAULT NULL,
  `city_name` varchar(40) DEFAULT NULL,
  `state_name` varchar(20) DEFAULT NULL,
  `zip_code` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_fname` varchar(20) DEFAULT NULL,
  `customer_lname` varchar(20) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `customer_email` varchar(40) DEFAULT NULL,
  `customer_phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `password` varchar(60) NOT NULL,
  `employee_fname` varchar(40) NOT NULL,
  `employee_lname` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `employee_role` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `password`, `employee_fname`, `employee_lname`, `username`, `employee_role`) VALUES
(1, '1234', 'Antonio', 'Rossini', 'aros', '3');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `manufacturer_id` int(11) NOT NULL,
  `manufacturer_description` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `material_manufacturer`
--

CREATE TABLE `material_manufacturer` (
  `mat_man_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `material_master`
--

CREATE TABLE `material_master` (
  `material_id` int(7) NOT NULL,
  `material_description` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `purchase_order_number` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_material`
--

CREATE TABLE `purchase_order_material` (
  `purchase_order_line` int(11) NOT NULL,
  `purchase_order_number` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `item_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `sales_order_number` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_material`
--

CREATE TABLE `sales_order_material` (
  `sales_order_line` int(11) NOT NULL,
  `sales_order_number` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `item_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(40) DEFAULT NULL,
  `supplier_taxid` int(12) NOT NULL,
  `address_id` int(11) DEFAULT NULL,
  `supplier_email` varchar(40) DEFAULT NULL,
  `supplier_phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `password` (`password`) USING HASH;

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `material_manufacturer`
--
ALTER TABLE `material_manufacturer`
  ADD PRIMARY KEY (`mat_man_id`),
  ADD KEY `material_id` (`material_id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`);

--
-- Indexes for table `material_master`
--
ALTER TABLE `material_master`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`purchase_order_number`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `purchase_order_material`
--
ALTER TABLE `purchase_order_material`
  ADD PRIMARY KEY (`purchase_order_line`),
  ADD KEY `purchase_order_number` (`purchase_order_number`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`sales_order_number`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `sales_order_material`
--
ALTER TABLE `sales_order_material`
  ADD PRIMARY KEY (`sales_order_line`),
  ADD KEY `sales_order_number` (`sales_order_number`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `address_id` (`address_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material_manufacturer`
--
ALTER TABLE `material_manufacturer`
  MODIFY `mat_man_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material_master`
--
ALTER TABLE `material_master`
  MODIFY `material_id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `purchase_order_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order_material`
--
ALTER TABLE `purchase_order_material`
  MODIFY `purchase_order_line` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `sales_order_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_order_material`
--
ALTER TABLE `sales_order_material`
  MODIFY `sales_order_line` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`address_id`) ON UPDATE CASCADE;

--
-- Constraints for table `material_manufacturer`
--
ALTER TABLE `material_manufacturer`
  ADD CONSTRAINT `material_manufacturer_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `material_master` (`material_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `material_manufacturer_ibfk_2` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`manufacturer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `purchase_order_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON UPDATE CASCADE;

--
-- Constraints for table `purchase_order_material`
--
ALTER TABLE `purchase_order_material`
  ADD CONSTRAINT `purchase_order_material_ibfk_1` FOREIGN KEY (`purchase_order_number`) REFERENCES `purchase_order` (`purchase_order_number`) ON UPDATE CASCADE;

--
-- Constraints for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD CONSTRAINT `sales_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `sales_order_material`
--
ALTER TABLE `sales_order_material`
  ADD CONSTRAINT `sales_order_material_ibfk_1` FOREIGN KEY (`sales_order_number`) REFERENCES `sales_order` (`sales_order_number`) ON UPDATE CASCADE;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`address_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;