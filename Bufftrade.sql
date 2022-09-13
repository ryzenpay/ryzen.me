-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 13, 2022 at 03:05 PM
-- Server version: 10.3.35-MariaDB-log-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ryzeuofr_bufftrade`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bufftrade`
--

CREATE TABLE `Bufftrade` (
  `trade` text NOT NULL, COMMENT 'tradelink'
  `payment` text NOT NULL COMMENT 'Paypal/Cashapp/Crypto',
  `payment_id` text NOT NULL, COMMENT 'Payment method alias'
  `item` text NOT NULL COMMENT 'Sold Item',
  `price` double NOT NULL COMMENT 'Price paid to customer',
  `communication` text NOT NULL COMMENT 'Discord/Telegram',
  `ogu` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=CSV DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
