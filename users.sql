-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2020 at 06:45 PM
-- Server version: 5.7.14
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--


-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `display_name`, `name`, `email`, `password`, `user_photo_url`, `user_status`, `secret_key`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$FKv.9CUljNS/8GkbYfwGoeW4k0DBT9N8dnATVXVMZIAu5JGKVFSKK', '', 1, '$2y$10$xW53MN8gc4td4lkT1vNbGe1/5ldF6hJC7oUWTwVH6qTiBHdpXYMAq', '2019-11-03 23:03:55', '2019-11-03 23:03:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--

