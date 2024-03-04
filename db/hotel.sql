-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 02:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `datetime_from` varchar(50) NOT NULL,
  `datetime_to` varchar(50) NOT NULL,
  `location` varchar(10) NOT NULL,
  `number_of_people` int(2) NOT NULL,
  `datetime` varchar(50) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `datetime_from`, `datetime_to`, `location`, `number_of_people`, `datetime`) VALUES
(1, 3, '2024-03-02T00:16', '2024-03-02T00:17', 'Mombasa', 5, '2024-03-02 00:26:48'),
(2, 3, '2024-03-02T00:16', '2024-03-02T00:17', 'Mombasa', 5, '2024-03-02 00:27:57'),
(3, 3, '2024-03-02T00:16', '2024-03-02T00:17', 'Mombasa', 5, '2024-03-02 00:29:25'),
(4, 3, '2024-03-02T00:47', '2024-03-02T00:49', 'Nairobi', 2, '2024-03-02 00:46:00'),
(5, 3, '2024-03-02T00:47', '2024-03-02T00:49', 'Nairobi', 2, '2024-03-02 00:46:16'),
(6, 2, '2024-03-04T00:05', '2024-03-21T00:00', 'Nairobi', 1, '2024-03-04 00:00:57'),
(7, 2, '2024-03-04T00:05', '2024-03-21T00:00', 'Nairobi', 5, '2024-03-04 00:44:00'),
(8, 2, '2024-03-04T00:05', '2024-03-21T00:00', 'Nairobi', 2, '2024-03-04 00:44:04'),
(9, 2, '2024-03-04T00:05', '2024-03-21T00:00', 'Nairobi', 5, '2024-03-04 00:53:44'),
(10, 2, '2024-03-04T00:05', '2024-03-21T00:00', 'Nairobi', 1, '2024-03-04 00:53:49'),
(11, 2, '2024-03-04T00:05', '2024-03-21T00:00', 'Nairobi', 5, '2024-03-04 00:54:13'),
(12, 2, '2024-03-04T00:05', '2024-03-21T00:04', 'Nairobi', 5, '2024-03-04 00:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `type` int(1) NOT NULL DEFAULT 0,
  `datetime` varchar(50) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `datetime`) VALUES
(1, 'James', 'Doe', 'jamesdoe', '$2y$10$Zh.S3lqYNQ7aQs8T.0Nnt.nTOMv24xKeQTG9jCSHBYDvH1HnPWf4y', 0, '2024-01-04 09:45:55'),
(3, 'Admin', 'Admin', 'Admin@admin.com', '$2y$10$qFg1PDYR28SW0cTDs5UHgeIERChxeMBPq3a9/fvCs7H1EVxacI8J6', 0, '2024-02-04 09:45:55'),
(4, 'Anita', 'Nyaboke', 'nyabokeanitao@gmail.com', '$2y$10$LO23YQAPTzx/gWmJo5Sh8eN77Ucokvl8z8.5qxn0.Ur.s09JnvYjG', 0, '2024-03-04 01:54:06'),
(6, 'james', 'dae', 'jamesdoe@gmail.com', '$2y$10$UH2fMCJ9lC5N2fC/TZ3C0uaOtLi5uoOHakQWDJq2ct7U4F9MIurG.', 0, '2024-03-04 01:54:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
