-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2022 at 02:53 PM
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
-- Table structure for table `Cart`
--

CREATE TABLE `Cart` (
  `product_ID` int(10) NOT NULL,
  `user_ID` int(10) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `product_name` varchar(50) NOT NULL,
  `seller_ID` int(10) NOT NULL,
  `unit_price` float(8,2) NOT NULL,
  `description` varchar(535) NOT NULL,
  `quantity` int(8) NOT NULL,
  `product_ID` int(10) NOT NULL,
  `category` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `discount_percent` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `Wishlist` (
  `product_ID` int(10) NOT NULL,
  `user_ID` int(10) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
