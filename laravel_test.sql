-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 04:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `_token` varchar(300) NOT NULL,
  `fname` varchar(300) NOT NULL,
  `lname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `des` varchar(300) NOT NULL,
  `updated_at` varchar(300) NOT NULL,
  `created_at` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `_token`, `fname`, `lname`, `email`, `phone`, `des`, `updated_at`, `created_at`) VALUES
(1, 'b9l8NlvZvHrsZFsmCLRIKOSkhWsi6GYlD9nU27a7', 'Bidyut', 'kumar', 'mondalbidyut38@gmail.com', '1234567890', 'test', '2021-11-08 16:25:12', '2021-11-08 16:25:12'),
(2, 'b9l8NlvZvHrsZFsmCLRIKOSkhWsi6GYlD9nU27a7', '345', '3453', 'mondalbidyut38@gmail.com', '4535', '435', '2021-11-08 16:32:42', '2021-11-08 16:32:42'),
(3, 'b9l8NlvZvHrsZFsmCLRIKOSkhWsi6GYlD9nU27a7', '345', '3453', 'mondalbidyut38@gmail.com', '4535', '435', '2021-11-08 16:33:08', '2021-11-08 16:33:08'),
(4, 'b9l8NlvZvHrsZFsmCLRIKOSkhWsi6GYlD9nU27a7', '45645', '645645', 'karthick@mostlikers.com', '4565464', '546', '2021-11-08 16:33:53', '2021-11-08 16:33:53'),
(5, 'b9l8NlvZvHrsZFsmCLRIKOSkhWsi6GYlD9nU27a7', '5645', '45645', 'vidyut.srat006@gmail.com', '6546546', '456456', '2021-11-08 16:35:02', '2021-11-08 16:35:02'),
(6, 'b9l8NlvZvHrsZFsmCLRIKOSkhWsi6GYlD9nU27a7', '54645', '645645', 'mondalbidyut38@gmail.com', '6546', '54654', '2021-11-08 16:35:54', '2021-11-08 16:35:54'),
(7, 'b9l8NlvZvHrsZFsmCLRIKOSkhWsi6GYlD9nU27a7', '4353345', '345345', 'vi34534.srat006@gmail.com', '345435', '3453', '2021-11-08 16:38:26', '2021-11-08 16:38:26'),
(8, 'b9l8NlvZvHrsZFsmCLRIKOSkhWsi6GYlD9nU27a7', '456456', '45646', 'vidyut.srat006@gmail.com', '456456', '456', '2021-11-08 16:39:07', '2021-11-08 16:39:07'),
(9, 'VKkjU0oGQdjoxfaJ2n4hSjKxNauZ7t81a0kXyOX6', 'try', 'rty', 'vidyut.srat006@gmail.com', 'adf', 'adsf', '2021-11-09 07:13:09', '2021-11-09 07:13:09'),
(10, 'VKkjU0oGQdjoxfaJ2n4hSjKxNauZ7t81a0kXyOX6', 'fgdg', '64564', 'mondalbidyut38@gmail.com', 'rty', 'ytry', '2021-11-09 07:14:10', '2021-11-09 07:14:10'),
(11, 'VKkjU0oGQdjoxfaJ2n4hSjKxNauZ7t81a0kXyOX6', '45646', '456456', 'vidyut.srat006@gmail.com', '45645', '546546', '2021-11-09 07:17:37', '2021-11-09 07:17:37'),
(12, 'VKkjU0oGQdjoxfaJ2n4hSjKxNauZ7t81a0kXyOX6', 'ertetr', 'ertert', 'mondalbidyut38@gmail.com', 'erter', 'tret', '2021-11-09 07:21:58', '2021-11-09 07:21:58'),
(13, 'VKkjU0oGQdjoxfaJ2n4hSjKxNauZ7t81a0kXyOX6', 'Bidyut', '645645', 'vidyut.srat006@gmail.com', '456', '456', '2021-11-09 07:23:13', '2021-11-09 07:23:13'),
(14, 'VKkjU0oGQdjoxfaJ2n4hSjKxNauZ7t81a0kXyOX6', '34543', '354435', 'vidyut.srat006@gmail.com', '(456) 456-5464', '34543', '2021-11-09 07:26:11', '2021-11-09 07:26:11'),
(15, 'K2LvV5euVbb4qv4N3UlPDecu1ZsRPZ6Q4C8TGvo0', '567', '5675', 'vidyut.srat006@gmail.com', '56756', '7567', '2021-11-09 07:47:54', '2021-11-09 07:47:54'),
(16, 'K2LvV5euVbb4qv4N3UlPDecu1ZsRPZ6Q4C8TGvo0', 'ert', 'ert', 'vidyut.srat006@gmail.com', 'ertert', 'ert', '2021-11-09 07:55:54', '2021-11-09 07:55:54'),
(17, 'K2LvV5euVbb4qv4N3UlPDecu1ZsRPZ6Q4C8TGvo0', '567', '57657', 'vidyut.srat006@gmail.com', '567567', '567', '2021-11-09 07:56:45', '2021-11-09 07:56:45'),
(18, 'K2LvV5euVbb4qv4N3UlPDecu1ZsRPZ6Q4C8TGvo0', 'rty', 'ytry', 'mondalbidyut38@gmail.com', 'rtyrt', 'rty', '2021-11-09 07:58:28', '2021-11-09 07:58:28'),
(19, 'K2LvV5euVbb4qv4N3UlPDecu1ZsRPZ6Q4C8TGvo0', 'rty', 'ytry', 'mondalbidyut38@gmail.com', 'rtyrt', 'rty', '2021-11-09 07:58:50', '2021-11-09 07:58:50'),
(20, 'K2LvV5euVbb4qv4N3UlPDecu1ZsRPZ6Q4C8TGvo0', 'rty', 'ytry', 'mondalbidyut38@gmail.com', 'rtyrt', 'rty', '2021-11-09 07:59:04', '2021-11-09 07:59:04'),
(21, 'K2LvV5euVbb4qv4N3UlPDecu1ZsRPZ6Q4C8TGvo0', 'ertet', 'ret', 'chhabi.vanik@gmail.com', 'ertret', 'retre', '2021-11-09 08:01:46', '2021-11-09 08:01:46'),
(22, 'K2LvV5euVbb4qv4N3UlPDecu1ZsRPZ6Q4C8TGvo0', 'Bidyut', '645645', 'mondalbidyut38@gmail.com', '1234567890', '3453', '2021-11-09 08:02:37', '2021-11-09 08:02:37'),
(23, 'WGfqk4XNctKZzZFNM9RzyNGkR5NI3il4x5q5ZC45', 'Bidyut', 'dfg', 'mondalbidyut38@gmail.com', '1234567890', 'ytry', '2021-11-09 11:28:57', '2021-11-09 11:28:57'),
(24, 'JdG80nliRQTnFcIOd3zlkzMpqkmxrBcyNdjhQgGc', 'zxc', 'zxczxc', 'zxcz@gmail.com', 'xczxc', 'zxcxcz', '2021-11-14 14:34:50', '2021-11-14 14:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `img` varchar(400) NOT NULL,
  `img_name` varchar(400) NOT NULL,
  `description` varchar(400) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `img`, `img_name`, `description`, `type`) VALUES
(1, 'img-1.jpg', 'Red paint cup', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'Office Event'),
(2, 'img-2.jpg', 'Blorange', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'Office Event'),
(3, 'img-3.jpg', 'And She Realized', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'Others'),
(4, 'img-4.jpg', 'DOSE Juice', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'Office Event'),
(5, 'img-5.jpg', 'Pineapple', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'Office Event'),
(6, 'img-6.jpg', 'Yellow banana', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'Others'),
(7, 'img-7.jpg', 'Gameboy', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'Office Event'),
(8, 'img-8.jpg', 'Color in Guatemala.', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'Others'),
(9, 'img-1.jpg', 'Red paint cup', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'Office Event'),
(10, 'img-2.jpg', 'This is test', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'Office Event'),
(11, 'img-3.jpg', 'And She Realized', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'Others'),
(12, 'img-4.jpg', 'DOSE Juice', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'Office Event'),
(13, 'img-5.jpg', 'Pineapple', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'Others'),
(14, 'img-6.jpg', 'Yellow banana', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'Office Event'),
(15, 'img-7.jpg', 'Gameboy', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'Others'),
(16, 'img-8.jpg', 'Color in Guatemala.', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'Office Event'),
(17, 'img-5.jpg', 'Pineapple', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'New Year'),
(18, 'img-6.jpg', 'Yellow banana', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'New Year'),
(19, 'img-7.jpg', 'Gameboy', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'Office Event'),
(20, 'img-8.jpg', 'Color in Guatemala.', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'New Year'),
(21, 'img-1.jpg', 'Red paint cup', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'New Year'),
(22, 'img-2.jpg', 'This is test', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'Others'),
(23, 'img-3.jpg', 'And She Realized', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'New Year'),
(24, 'img-4.jpg', 'DOSE Juice', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 'New Year');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
