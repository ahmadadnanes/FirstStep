-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2023 at 07:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `first_step_remastered`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `content`) VALUES
(1, 'aa264048@gmail.com', 'Hi'),
(2, 'ahmad-adnan67@hotmail.net', 'Hi8');

-- --------------------------------------------------------

--
-- Table structure for table `diary`
--

CREATE TABLE `diary` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `diary_title` text NOT NULL,
  `diary_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diary`
--

INSERT INTO `diary` (`id`, `user_id`, `diary_title`, `diary_content`) VALUES
(1, 2, 'Hi', '                    hi'),
(2, 4, 'hi', '       hi             '),
(3, 4, 'hi3', 'hi2          '),
(4, 2, 'ahmad', '                    huuoo');

-- --------------------------------------------------------

--
-- Table structure for table `psy`
--

CREATE TABLE `psy` (
  `id` int(11) NOT NULL,
  `psy_name` text NOT NULL,
  `phone` int(11) NOT NULL,
  `psy_location` text NOT NULL,
  `work_hours` text NOT NULL,
  `rating` float NOT NULL,
  `gov` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `psy`
--

INSERT INTO `psy` (`id`, `psy_name`, `phone`, `psy_location`, `work_hours`, `rating`, `gov`) VALUES
(1, 'دكتور معن العبكي', 799870081, 'https://www.google.com/maps/place/%D8%AF%D9%83%D8%AA%D9%88%D8%B1+%D9%85%D8%B9%D9%86+%D8%A7%D9%84%D8%B9%D8%A8%D9%83%D9%8A%E2%80%AD/@31.9848633,35.9470972,13z/data=!4m10!1m2!2m1!1z2KfYt9io2KfYoSDZhtmB2LPZitmK2YYg2YHZiiDYp9mE2KfYsdiv2YYgbWFwcw!3m6!1s0x151ca15287c0f10f:0x331655cb6f521043!8m2!3d31.9795617!4d35.8998894!15sCi7Yp9i32KjYp9ihINmG2YHYs9mK2YrZhiDZgdmKINin2YTYp9ix2K_ZhiBtYXBzkgEMcHN5Y2hpYXRyaXN04AEA!16s%2Fg%2F11h6r1s5j9?entry=ttu', 'NONE', 5, 'Amman'),
(2, 'dr.shatha abuhamda', 772699665, 'https://www.google.com/maps/place/%D8%AF.%D8%B4%D8%B0%D9%89+%D8%A7%D8%A8%D9%88+%D8%AD%D9%85%D8%AF%D9%87+dr.shatha+abuhamda%E2%80%AD/@31.9848633,35.9470972,13z/data=!4m10!1m2!2m1!1z2KfYt9io2KfYoSDZhtmB2LPZitmK2YYg2YHZiiDYp9mE2KfYsdiv2YYgbWFwcw!3m6!1s0x151ca14dc6c7b73b:0x6fe1b5cdccc2355d!8m2!3d31.9783328!4d35.901741!15sCi7Yp9i32KjYp9ihINmG2YHYs9mK2YrZhiDZgdmKINin2YTYp9ix2K_ZhiBtYXBzkgEMcHN5Y2hpYXRyaXN04AEA!16s%2Fg%2F11gm8vg2gt?entry=ttu', 'sat - wed : 11am - 7pm\r\nthu : 11am - 2pm', 4.3, 'Amman'),
(3, 'Dr. Mohammad Hazaymeh', 777771993, 'https://www.google.com/maps/place/Dr.+Mohammad+Hazaymeh+Psychiatry+Clinic+-+%D8%B9%D9%8A%D8%A7%D8%AF%D8%A9+%D8%A7%D9%84%D8%AF%D9%83%D8%AA%D9%88%D8%B1+%D9%85%D8%AD%D9%85%D8%AF+%D8%A7%D9%84%D9%87%D8%B2%D8%A7%D9%8A%D9%85%D8%A9+%D9%84%D9%84%D8%B7%D8%A8+%D8%A7%D9%84%D9%86%D9%81%D8%B3%D9%8A%E2%80%AD/@32.555242,35.8553177,17z/data=!4m10!1m2!2m1!1z2KfYt9io2KfYoSDZhtmB2LPZitmK2YYg2YHZiiDYp9mE2KfYsdiv2YYgbWFwcw!3m6!1s0x151c7796cf7fb509:0xdd1fb1052cfa7896!8m2!3d32.555242!4d35.853129!15sCi7Yp9i32KjYp9ihINmG2YHYs9mK2YrZhiDZgdmKINin2YTYp9ix2K_ZhiBtYXBzkgEPcHN5Y2hvdGhlcmFwaXN04AEA!16s%2Fg%2F11f7sbg6_b?entry=ttu', 'sat - thu : 9am - 6pm', 5, 'Zarqa'),
(4, 'مركز العلاج النفسي الحديث', 796885859, 'https://www.google.com/maps/place/%D9%85%D8%B1%D9%83%D8%B2+%D8%A7%D9%84%D8%B9%D9%84%D8%A7%D8%AC+%D8%A7%D9%84%D9%86%D9%81%D8%B3%D9%8A+%D8%A7%D9%84%D8%AD%D8%AF%D9%8A%D8%AB+%D9%81%D8%B1%D8%B9+%D8%A7%D9%84%D8%B2%D8%B1%D9%82%D8%A7%D8%A1+%D8%AF%D9%83%D8%AA%D9%88%D8%B1+%D8%AA%D8%A7%D9%85%D8%B1+%D8%A7%D9%85%D8%A7%D8%B1%D8%A9+%D9%88+%D8%AF.%D9%85%D8%AD%D9%85%D9%88%D8%AF+%D8%AD%D9%85%D8%A7%D9%85+%D9%84%D9%84%D8%B9%D9%84%D8%A7%D8%AC+%D8%A7%D9%84%D9%86%D9%81%D8%B3%D9%8A+%D9%85%D9%88%D9%82%D8%B9%D9%86%D8%A7+%D8%A7%D9%84%D8%B2%D8%B1%D9%82%D8%A7%D8%A1+%D8%B4%D8%A7%D8%B1%D8%B9+%D8%A7%D9%84%D8%B3%D8%B9%D8%A7%D8%AF%D8%A9%E2%80%AD/@32.07991,36.1063687,13z/data=!4m10!1m2!2m1!1z2KfYt9io2KfYoSDZhtmB2LPZitmK2YY!3m6!1s0x151b658113e70f5b:0x606d238c6c89924f!8m2!3d32.0636657!4d36.0885295!15sChfYp9i32KjYp9ihINmG2YHYs9mK2YrZhpIBFXBzeWNob21vdG9yX3RoZXJhcGlzdOABAA!16s%2Fg%2F11kgckp0mr?entry=ttu', 'sat - thu : 11am - 6pm', 4.3, 'Irbid');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pass`) VALUES
(2, 'ahmad', 'aa264048@gmail.com', '20b3435bf7c1e2c2d8f004a64fd9464c'),
(3, 'ahmad2', 'ahmad-adnan67@hotmail.com', '20b3435bf7c1e2c2d8f004a64fd9464c'),
(4, 'ayat adnan', 'adnanayat710@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `psy`
--
ALTER TABLE `psy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `diary`
--
ALTER TABLE `diary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `psy`
--
ALTER TABLE `psy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diary`
--
ALTER TABLE `diary`
  ADD CONSTRAINT `diary_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
