-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 11, 2022 at 01:52 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

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

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_ID` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_ID`, `brand`) VALUES
(1, 'Levis'),
(2, 'Carhartt'),
(3, 'FromSoft'),
(4, 'Ford'),
(5, 'HEB'),
(6, 'Apple'),
(7, 'Deer Park'),
(8, 'Chevy');

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

CREATE TABLE `Cart` (
  `product_ID` int(10) NOT NULL,
  `user_ID` int(10) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Cart`
--

INSERT INTO `Cart` (`product_ID`, `user_ID`, `quantity`) VALUES
(7, 51911, 2),
(2, 12345, 1),
(1, 12345, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_ID` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_ID`, `categories`) VALUES
(1, 'All Categories'),
(2, 'Clothes'),
(3, 'Electronics'),
(4, 'Food'),
(5, 'Automotive'),
(6, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `FAQ`
--

CREATE TABLE `FAQ` (
  `question` varchar(535) NOT NULL,
  `answer` varchar(535) NOT NULL,
  `question_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

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

--
-- Dumping data for table `Messages`
--

INSERT INTO `Messages` (`sender_ID`, `recipient_ID`, `message`, `create_date`, `subject`, `message_ID`, `parent_message_ID`, `expire_date`) VALUES
(51911, 12345, '51911&break&I am sending you a message to ask about a product.&break&12345&break&Thank you for inquiring about that product. What do you want to know?&break&51911&break&When will you be getting more product in stock?', '2022-04-04 12:09:26', 'Product Questions', 4, 3, '2023-04-04'),
(12345, 51911, '51911&break&I am sending you a message to ask about a product.&break&12345&break&Thank you for inquiring about that product. What do you want to know?&break&51911&break&When will you be getting more product in stock?&break&12345&break&The product will be in stock on Tuesday.', '2022-04-13 12:45:26', 'RE: Product Questions', 6, 4, '2023-04-13'),
(51911, 12345, '51911&break&I am sending you a message to ask about a product.&break&12345&break&Thank you for inquiring about that product. What do you want to know?&break&51911&break&When will you be getting more product in stock?&break&12345&break&The product will be in stock on Tuesday.&break&51911&break&Ok, that sounds great!', '2022-04-13 12:52:03', 'RE: Product Questions', 9, 6, '2023-04-13'),
(51911, 12345, '51911&break&A second set of messages is born.', '2022-04-15 13:08:00', 'Second Set', 10, 6, '2023-04-15'),
(51911, 12345, '51911&break&A third message is sent', '2022-04-15 13:30:00', 'Third', 11, NULL, '2023-04-15'),
(12345, 51911, '51911&break&A third message is sent&break&12345&break&I am responding to third message!', '2022-04-15 13:30:49', 'RE: Third', 12, 11, '2023-04-15'),
(51911, 12345, '51911&break&I am sending you a message to ask about a product.&break&12345&break&Thank you for inquiring about that product. What do you want to know?&break&51911&break&When will you be getting more product in stock?&break&12345&break&The product will be in stock on Tuesday.&break&51911&break&A new message', '2022-04-15 14:14:20', 'RE: Product Questions', 13, 6, '2023-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `ProductQuestions`
--

CREATE TABLE `ProductQuestions` (
  `product_ID` int(10) NOT NULL,
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

CREATE TABLE `products` (
  `product_ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `customLabel` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `list_price` decimal(10,2) NOT NULL,
  `brand` int(11) NOT NULL,
  `categories` int(11) NOT NULL,
  `productCondition` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT 0,
  `sizes` text DEFAULT NULL,
  `weight` text DEFAULT NULL,
  `seller_ID` int(11) NOT NULL,
  `quantity` int(8) NOT NULL,
  `discount_percent` int(3) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `image` longblob NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_ID`, `title`, `price`, `list_price`, `brand`, `categories`, `image`, `description`, `featured`, `sizes`, `seller_ID`, `quantity`, `create_date`, `discount_percent`) VALUES
(1, 'Levi\'s Jeans', '29.00', '39.99', 1, 2, 'images/levisjeans.jpg', 'These Levi\'s Jeans are great. Buy them now!', 1, '28:3,39:5,36:1', 12345, 35, '2022-03-30 16:43:29', NULL),
(2, 'T-Shirt', '15.99', '15.99', 2, 2, 'images/shirt.png', 'A comfortable T-shirt from your favorite vendor', 0, 'S M L XL XXL', 12345, 40, '2022-04-04 12:37:07', 0),
(3, 'Moonlight Sword', '1500.00', '1500.00', 3, 6, 'images/sword.jpeg', 'A greatsword powered by moonlight', 0, '', 12345, 5, '2022-04-06 13:31:37', NULL),
(4, 'Ford Model T', '13000.00', '15000.00', 4, 5, 'images/car.jpg', 'Released on October 1, 1908, the Ford Model T was a self-starting vehicle with a left-sided steering wheel, featuring an enclosed four-cylinder engine with a detachable cylinder head and a one-piece cylinder block. Fashioned from vanadium alloy steel, it offered superior strength despite its light weight.', 2, '', 12345, 8, '2022-04-15 12:20:10', NULL),
(5, 'Honeycrisp Apples', '5.45', '5.45', 5, 4, 'images/apples.jpeg', 'Honeycrisp apples are a refreshing fruit that is moderately sweet and is great for baking.', 0, '', 12345, 134, '2022-04-15 12:25:39', NULL),
(6, 'Apple MacBook Pro M1', '2400.00', '2400.00', 6, 3, 'images/laptop.jpg', 'Apple MacBook Pro M1 13.3inch; Silver 16GB/512GB (MYDC2FN/A-16GB)', 3, '', 12345, 23, '2022-04-15 12:31:14', NULL),
(7, 'Deer Park Spring Water', '25.00', '27.00', 7, 4, 'images/water.jpeg', 'Deer Park 100% Natural Spring Water, 16.9 Fl Oz, 35 Pack Bottles', 0, '', 12345, 65, '2022-04-15 12:36:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

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

CREATE TABLE `Seller` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `seller_ID` int(7) NOT NULL,
  `telephone_number` int(10) NOT NULL,
  `address_first_line` varchar(100) NOT NULL,
  `address_second_line` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state_abbreviation` varchar(3) NOT NULL,
  `zip_code` int(10) NOT NULL,
  `approval` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Transactions`
--

CREATE TABLE `Transactions` (
  `product_ID` int(10) NOT NULL,
  `product_quantity` int(10) NOT NULL,
  `user_ID` int(10) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `shipped` bit(1) NOT NULL DEFAULT b'0',
  `transaction_ID` int(10) NOT NULL,
  `price_at_purchase` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Transactions`
--

INSERT INTO `Transactions` (`product_ID`, `product_quantity`, `user_ID`, `purchase_date`, `shipped`, `transaction_ID`, `price_at_purchase`) VALUES
(1, 3, 51911, '2022-03-09 05:00:00', b'0', 1, '29.99'),
(3, 1, 51911, '2022-03-09 05:00:00', b'0', 1, '1500.00'),
(2, 5, 51911, '2022-04-06 14:25:57', b'0', 2, '15.99'),
(1, 1, 51911, '2022-04-06 14:25:57', b'0', 2, '29.99'),
(3, 1, 12345, '2022-04-15 12:12:08', b'1', 3, '1500.00'),
(5, 3, 54321, '2022-04-15 12:40:22', b'0', 4, '5.45'),
(7, 1, 54321, '2022-04-15 12:40:22', b'0', 4, '35.00'),
(3, 1, 51911, '2022-04-29 12:23:32', b'0', 7801595, '1500.00'),
(1, 2, 51911, '2022-04-29 12:23:32', b'0', 7801595, '29.99'),
(5, 4, 51911, '2022-04-29 12:36:20', b'1', 1314167, '5.45');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

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
  `approval` int(1) DEFAULT NULL,
  `disabled` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`first_name`, `last_name`, `email`, `password`, `user_ID`, `role`, `address_first_line`, `address_second_line`, `city`, `state_abbreviation`, `zip_code`, `telephone_number`, `gender`, `approval`, `disabled`) VALUES
('Jody', 'Winters', 'jwin@gmail.com', 'password', 54321, 'buyer', NULL, NULL, NULL, NULL, NULL, 1234567890, 'male', 0, NULL),
('James', 'Peach', 'james@gmail.com', 'password', 12345, 'seller', 'address', '', 'york', 'AZ', 17444, 1234354434, 'male', 1, NULL),
('Bob', 'Smart', 'bob@gmail.com', 'password', 51911, 'buyer', '11 address street', '', 'lancaster', 'PA', 19234, 1111111111, 'male', 0, NULL),
('Somali', 'Winters', 'somali@gmail.com', 'password', 10101, 'admin', NULL, NULL, NULL, NULL, NULL, 1111111111, 'Female', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Wishlist`
--

CREATE TABLE `Wishlist` (
  `product_ID` int(10) NOT NULL,
  `user_ID` int(10) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Wishlist`
--

INSERT INTO `Wishlist` (`product_ID`, `user_ID`, `quantity`) VALUES
(4, 51911, 1);

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
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`message_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `message_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
