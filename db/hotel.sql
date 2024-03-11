-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 11:05 AM
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
(2, 3, '2024-03-02T00:16', '2024-03-02T00:17', 'Mombasa', 5, '2024-03-02 00:27:57'),
(3, 3, '2024-03-02T00:16', '2024-03-02T00:17', 'Mombasa', 5, '2024-03-02 00:29:25'),
(4, 3, '2024-03-02T00:47', '2024-03-02T00:49', 'Nairobi', 2, '2024-03-02 00:46:00'),
(5, 3, '2024-03-02T00:47', '2024-03-02T00:49', 'Nairobi', 2, '2024-03-02 00:46:16'),
(13, 6, '2024-03-05T16:55', '2024-03-05T16:54', 'Nairobi', 5, '2024-03-05 16:51:52'),
(14, 6, '2024-03-05T16:55', '2024-03-05T16:54', 'Nairobi', 2, '2024-03-05 16:51:57'),
(15, 6, '2024-03-05T16:55', '2024-03-05T16:54', 'Nairobi', 2, '2024-03-05 16:51:59'),
(16, 6, '2024-03-05T16:55', '2024-03-05T16:54', 'Nairobi', 2, '2024-03-05 16:52:02'),
(17, 6, '2024-03-05T16:55', '2024-03-05T16:54', 'Nairobi', 1, '2024-03-05 16:52:06'),
(18, 6, '2024-03-05T16:55', '2024-03-05T16:54', 'Nairobi', 5, '2024-03-05 16:52:17');

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
(1, 'James', 'Doef', 'jamesdoe@example.com', '$2y$10$Zh.S3lqYNQ7aQs8T.0Nnt.nTOMv24xKeQTG9jCSHBYDvH1HnPWf4y', 0, '2024-03-03 09:45:55'),
(3, 'Admin', 'Admin', 'Admin@admin.com', '$2y$10$qFg1PDYR28SW0cTDs5UHgeIERChxeMBPq3a9/fvCs7H1EVxacI8J6', 1, '2024-03-03 09:45:55'),
(4, 'Anita', 'Nyaboke', 'nyabokeanitao@gmail.com', '$2y$10$LO23YQAPTzx/gWmJo5Sh8eN77Ucokvl8z8.5qxn0.Ur.s09JnvYjG', 1, '2024-03-04 01:54:06'),
(7, 'First0', 'Last0', 'email0@example.com1', '$2y$10$57eMjYffXSLsQZhC/qKiROc/2eLGA4Bq4WfrNfSYRHfV9LQbFrzCe', 0, '2024-03-05 17:31:16'),
(8, 'First1', 'Last1', 'email1@example.com', '$2y$10$an2GkKu0JzU.W2AttzYLAOQWKYKGtSzjRVEeTvxdE8M6vuZqsdc1G', 1, '2024-03-05 17:31:16'),
(9, 'First2', 'Last2', 'email2@example.com', '$2y$10$/9VzWR06heCrUVXbQry6XeCypk68aRXgf.rY4xCHxMGnAwEsBy.AG', 1, '2024-03-05 17:31:16'),
(10, 'First3', 'Last3', 'email3@example.com', '$2y$10$Mcz7K2YMIs/jBo51NTQ7Peue51r8hX5GPbpJW8lT0Q0GcMJIqfWG2', 0, '2024-03-05 17:31:16'),
(11, 'First4', 'Last4', 'email4@example.com', '$2y$10$0.U2/p9O3BoFzGlDwAVhc.YAXxkuPjlrY4XhH3ABKoHTWOgOokF/G', 0, '2024-03-05 17:31:16'),
(12, 'First5', 'Last5', 'email5@example.com', '$2y$10$xFjTGDrEpZskOG88.jyajeCWDoLt8NHphwZ9B8V2Sn4/X7ATu8C4K', 1, '2024-03-05 17:31:17'),
(13, 'First6', 'Last6', 'email6@example.com', '$2y$10$h7YUpEq9a7HRZ/Z9NUruVuwNNXNXlhUJtiMLxdLXPKMxU.LwtzQEW', 0, '2024-03-05 17:31:17'),
(14, 'First7', 'Last7', 'email7@example.com', '$2y$10$nrRMv7PXbnyVhweopjG3iuzEMKiuZkXcWsu1eS7u6wlV4rN65FVQy', 1, '2024-03-05 17:31:17'),
(15, 'First8', 'Last8', 'email8@example.com', '$2y$10$z0NwWaFmSZTvFLEEU2qZg.26eGPLc0pTLIhJ5Zhdlx3/Vp2e84BYy', 1, '2024-03-05 17:31:17'),
(16, 'First9', 'Last9', 'email9@example.com', '$2y$10$w1uJewn95kWZBIF5omhaJeVkS16yw/NiKl/gt.na9O2DqFNuIiM3q', 0, '2024-03-05 17:31:17'),
(17, 'First10', 'Last10', 'email10@example.com', '$2y$10$tlCts487G5UwCH26SXkwUOCOVFHogGvrQmhoV/9BbL7qzsavynHBG', 0, '2024-03-05 17:31:17'),
(18, 'First11', 'Last11', 'email11@example.com', '$2y$10$IcKcDbRQC9W7yhDtmPW2MeQ87Ql7mB18nkEBtAkLD8JU/Ep5OoLca', 0, '2024-03-05 17:31:17'),
(19, 'First12', 'Last12', 'email12@example.com', '$2y$10$ejz/XANrsoWlqugAbeo3XeKAwbkXHwwpnHOt9UBWoq/KO53JK4iii', 1, '2024-03-05 17:31:17'),
(20, 'First13', 'Last13', 'email13@example.com', '$2y$10$KKFB4jfPPDTOfmQpGh7NAOCqvLtHFTXkwLMXOHJ5sugr235I/fsZO', 0, '2024-03-05 17:31:18'),
(21, 'First14', 'Last14', 'email14@example.com', '$2y$10$6hpMRZiWNcJ1OR7Sh0sHVeELUpG27h6GdsuJ3kG0SD2BLKvRa1Rui', 0, '2024-03-05 17:31:18'),
(22, 'First15', 'Last1.5', 'email15@example.com', '$2y$10$WYMhyHQVRgR.VeJbcOxVrurDQvh94eMGny0Lyn2C54C1drBz1RwS6', 0, '2024-03-07 17:31:18'),
(23, 'First16', 'Last16', 'email16@example.com', '$2y$10$T6wKczJQ.eefVSeMy00Dn.IilBXVixXed/tTWk8kJGwysT7cYGfXO', 0, '2024-03-06 17:31:18'),
(24, 'First17', 'Last17', 'email17@example.com', '$2y$10$Ap.pQCm6wk.hS57r/AlCOOQpT9F.c4c4FPzEa52e9BdJnLMkQ6Jxu', 1, '2024-03-05 17:31:18'),
(25, 'First18', 'Last18', 'email18@example.com', '$2y$10$FX5IO73l.8oGzxQ7zFA9TukntGVX2LNj4TIgptWM7f2nT9SSgK8x.', 1, '2024-03-05 17:31:18'),
(27, 'james', 'Doe', 'jamesdoe@gmail.com', '$2y$10$ad5cv9LkvB8JbqGmqGIMaeCodixw7sJsuxRF2JwH7R39Ivo5QifXu', 1, '2024-03-05 17:45:37');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
