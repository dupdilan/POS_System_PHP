-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2020 at 08:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sudilena`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `lorrynumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`id`, `name`, `telephone`, `lorrynumber`) VALUES
(1, 'test customer', '0711785200', 'AB-1212');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `id` int(11) NOT NULL,
  `dateandTime` datetime NOT NULL,
  `customer` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `noofitems` int(11) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`id`, `dateandTime`, `customer`, `total`, `cash`, `balance`, `noofitems`, `note`) VALUES
(1, '2020-06-25 08:12:29', 'test customer', 130, 0, 0, 2, 'asd'),
(2, '2020-06-25 08:26:29', 'test customer', 18, 0, 0, 2, 'asd'),
(3, '2020-06-26 12:40:32', 'test customer', 120, 100, 20, 1, 'ads'),
(4, '2020-06-27 09:29:20', 'test customer', 4500, 5000, -500, 1, 'dgfdgfdgfdg'),
(5, '2020-06-27 09:40:11', 'test customer', 4500, 5000, -500, 1, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoiceitems`
--

CREATE TABLE `tbl_invoiceitems` (
  `id` int(11) NOT NULL,
  `invoiceId` int(11) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_invoiceitems`
--

INSERT INTO `tbl_invoiceitems` (`id`, `invoiceId`, `itemName`, `price`, `qty`, `total`) VALUES
(13, 1, 'test item', 12, 10, 120),
(14, 1, 'test item 02', 2, 5, 10),
(18, 2, 'test item', 12, 1, 12),
(19, 2, 'test item 02', 2, 3, 6),
(29, 3, 'test item', 12, 10, 120),
(30, 4, 'බ්ලොක් ගල් අගල් 4', 45, 100, 4500),
(31, 5, 'බ්ලොක් ගල් අගල් 5', 45, 100, 4500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `costPrice` int(11) NOT NULL,
  `salesPrice` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`id`, `name`, `des`, `costPrice`, `salesPrice`, `qty`) VALUES
(1, 'test item', 'test', 10, 12, 15),
(3, 'බ්ලොක් ගල් අගල් 5', 'asd', 40, 45, 1100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE `tbl_purchase` (
  `id` int(11) NOT NULL,
  `dateandTime` datetime NOT NULL,
  `suppiler` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `noofitems` int(11) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_purchase`
--

INSERT INTO `tbl_purchase` (`id`, `dateandTime`, `suppiler`, `total`, `cash`, `balance`, `noofitems`, `note`) VALUES
(1, '2020-06-27 09:21:31', '', 120, 120, 0, 1, 'test'),
(2, '2020-06-27 09:22:15', '', 60, 100, -40, 1, 'next'),
(3, '2020-06-27 09:39:33', '', 45000, 0, 45000, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchaseitems`
--

CREATE TABLE `tbl_purchaseitems` (
  `id` int(11) NOT NULL,
  `invoiceId` int(11) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_purchaseitems`
--

INSERT INTO `tbl_purchaseitems` (`id`, `invoiceId`, `itemName`, `price`, `qty`, `total`) VALUES
(5, 1, 'test item', 12, 10, 120),
(6, 2, 'test item', 12, 5, 60),
(8, 3, 'බ්ලොක් ගල් අගල් 5', 45, 1000, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `uid` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `upassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`uid`, `uname`, `upassword`) VALUES
(1, 'admin', '123'),
(2, 'test01', '456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_invoiceitems`
--
ALTER TABLE `tbl_invoiceitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchaseitems`
--
ALTER TABLE `tbl_purchaseitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_invoiceitems`
--
ALTER TABLE `tbl_invoiceitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_purchaseitems`
--
ALTER TABLE `tbl_purchaseitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
