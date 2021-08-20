-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 20, 2021 at 12:31 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `sno` int NOT NULL AUTO_INCREMENT,
  `sender` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `receiver` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `balance` float NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sno`, `sender`, `receiver`, `balance`, `datetime`) VALUES
(1, 'Yash Patel', 'Bhavisha Vadher', 3000, '2021-08-19 03:06:50'),
(2, 'Yash Patel', 'Parag Vadher', 5000, '2021-08-19 03:22:29'),
(3, 'Bhavisha Vadher', 'Yash Patel', 500, '2021-08-19 22:07:51'),
(4, 'Seema Yadav', 'Parag Vadher', 500, '2021-08-19 22:11:14'),
(5, 'Sharvil Dandekar ', 'Ramesh Mistry', 15000, '2021-08-19 22:30:26'),
(6, 'Om Parab', 'Nitin Vadher', 30000, '2021-08-19 22:30:47'),
(7, 'Vedant Tamgadge', 'Dhrumil Vora ', 10000, '2021-08-19 22:31:04'),
(8, 'Parag Vadher', 'Om Parab', 15000, '2021-08-19 22:31:22'),
(9, 'Parag Vadher', 'Sharvil Dandekar ', 5000, '2021-08-19 22:39:54'),
(10, 'Nitin Vadher', 'Om Parab', 7000, '2021-08-19 22:44:30'),
(11, 'Yash Patel', 'Ramesh Mistry', 5000, '2021-08-19 23:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `balance` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `balance`) VALUES
(1, 'Nitin Vadher', 'nitin@yahoo.com', 37970),
(2, 'Parag Vadher', 'parag@gmail.com', 52000),
(3, 'Ramesh Mistry', 'ramesh@gmail.com', 45700),
(4, 'Yash Patel', 'yash@yahoo.com', 15130),
(5, 'Bhavisha Vadher', 'bhavsiha@gmail.com', 29300),
(6, 'Seema Yadav', 'seema@gmail.com', 47800),
(7, 'Sharvil Dandekar ', 'sharvil@gmail.com', 61500),
(8, 'Om Parab', 'om@gmail.com', 62000),
(9, 'Vedant Tamgadge', 'vt@gmail.com', 69600),
(10, 'Dhrumil Vora ', 'dhrumil@gmail.com', 55000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
