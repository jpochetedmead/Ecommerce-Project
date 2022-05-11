-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2022 at 03:37 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--
CREATE DATABASE IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ecommerce`;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `brand_ID` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_ID`, `brand`) VALUES
(1, 'Levis');

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

DROP TABLE IF EXISTS `Cart`;
CREATE TABLE `Cart` (
  `product_ID` int(10) NOT NULL,
  `user_ID` int(10) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `categories_ID` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `FAQ`
--

DROP TABLE IF EXISTS `FAQ`;
CREATE TABLE `FAQ` (
  `question` varchar(535) NOT NULL,
  `answer` varchar(535) NOT NULL,
  `question_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

DROP TABLE IF EXISTS `Messages`;
CREATE TABLE `Messages` (
  `sender_ID` int(10) NOT NULL,
  `recipient_ID` int(10) NOT NULL,
  `message` varchar(535) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `subject` varchar(50) NOT NULL,
  `message_ID` int(10) NOT NULL,
  `parent_message_ID` int(10) DEFAULT NULL,
  `expire_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ProductQuestions`
--

DROP TABLE IF EXISTS `ProductQuestions`;
CREATE TABLE `ProductQuestions` (
  `product_ID` int(11) NOT NULL,
  `question` varchar(535) NOT NULL,
  `user_ID_question` int(10) NOT NULL,
  `answer` varchar(535) DEFAULT NULL,
  `user_ID_answer` int(10) DEFAULT NULL,
  `answer_likes` int(10) DEFAULT NULL,
  `answer_dislikes` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `customLabel` varchar(255) NULL,
  `price` decimal(10,2) NOT NULL,
  `list_price` decimal(10,2) NOT NULL,
  `brand` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) NOT NULL,
  `productCondition` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `sizes` text NOT NULL,
  `weight` text NOT NULL,
  `seller_ID` int(11) NOT NULL,
  `quantity` int(8) NOT NULL,
  `discount_percent` int(3) DEFAULT NULL,
  `comment` text NOT NULL,
  `image` longblob NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_ID`, `title`, `price`, `list_price`, `brand`, `categories`, `image`, `description`, `featured`, `sizes`, `seller_ID`, `quantity`, `create_date`, `discount_percent`) VALUES
(1, 'Levi\'s Jeans', '29.99', '39.99', 1, 6, 'images/levisjeans.jpg', 'These Levi\'s Jeans are great. Buy them now!', 1, '28:3,39:5,36:1', 1, 25, '2022-03-30 12:43:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

DROP TABLE IF EXISTS `Reviews`;
CREATE TABLE `Reviews` (
  `product_ID` int(10) NOT NULL,
  `review` varchar(535) NOT NULL,
  `review_ID` int(10) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Seller`
--

DROP TABLE IF EXISTS `Seller`;
CREATE TABLE `Seller` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `seller_ID` int(11) NOT NULL,
  `telephone_number` int(12) NOT NULL,
  `address_first_line` varchar(100) NOT NULL,
  `address_second_line` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state_abbreviation` varchar(3) NOT NULL,
  `zip_code` int(10) NOT NULL,
  `approval` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Seller`
--

INSERT INTO `Seller` (`first_name`, `last_name`, `email`, `password`, `seller_ID`, `telephone_number`, `address_first_line`, `address_second_line`, `city`, `state_abbreviation`, `zip_code`, `approval`) VALUES
('Julio', 'Pochet Edmead', 'jrpochetedmead202@stevenscollege.edu', '5d2e19393cc5ef67', 1, 717352527, 'Thaddeus Stevens College of Technology\r\n', '750 E King St', 'Lancaster', 'PA', 17602, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `Transactions`
--

DROP TABLE IF EXISTS `Transactions`;
CREATE TABLE `Transactions` (
  `product_ID` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `user_ID` int(10) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `shipped` bit(1) NOT NULL DEFAULT b'0',
  `transaction_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_ID` int(7) NOT NULL,
  `role` varchar(50) NOT NULL,
  `address_first_line` varchar(200) DEFAULT NULL,
  `address_second_line` varchar(200) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state_abbreviation` varchar(2) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `telephone_number` int(10) DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `approval` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`first_name`, `last_name`, `email`, `password`, `user_ID`, `role`, `address_first_line`, `address_second_line`, `city`, `state_abbreviation`, `zip_code`, `telephone_number`, `gender`, `approval`) VALUES
('Jody', 'Winters', 'jwin@gmail.com', 'password', 54321, 'buyer', NULL, NULL, NULL, NULL, NULL, 1234567890, 'male', 0),
('James', 'Peach', 'james@gmail.com', 'password', 12345, 'seller', 'address', '', 'york', 'AZ', 17444, 1234354434, 'male', 0),
('Bob', 'Smart', 'bob@gmail.com', 'password', 51911, 'seller', '11 address street', '', 'lancaster', 'PA', 19234, 1111111111, 'male', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Wishlist`
--

DROP TABLE IF EXISTS `Wishlist`;
CREATE TABLE `Wishlist` (
  `product_ID` int(10) NOT NULL,
  `user_ID` int(10) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_ID`);

--
-- Indexes for table `Seller`
--
ALTER TABLE `Seller`
  ADD PRIMARY KEY (`seller_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
