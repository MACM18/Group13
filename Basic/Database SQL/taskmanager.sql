-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 04:05 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskmanager`
--
CREATE DATABASE IF NOT EXISTS `taskmanager` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
USE `taskmanager`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `User_Name` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `Title` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `Emoji` varchar(5) COLLATE utf8mb4_bin DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `visibility` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `User_Name`, `Title`, `Emoji`, `position`, `visibility`) VALUES
(1, 'aaaaa', 'General', '◀️', 1, 1),
(2, 'aaaaa', 'Special', '😿', 2, 1),
(4, 'aaaaa', 'General1', '??', 4, 1),
(5, 'aaaaa', 'General1', '??', 4, 1),
(6, 'aaaaa', 'aaa', '', 8, 1),
(7, 'aaaaa', 'Test1', '😒', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `User_Name` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `color` varchar(10) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `User_Name`, `color`) VALUES
(1, 'aaaaa', 'purple');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(5) NOT NULL,
  `User_Name` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `task` varchar(250) COLLATE utf8mb4_bin DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `Category` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `User_Name`, `task`, `Date`, `time`, `Category`, `status`) VALUES
(2, 'aaaaa', 'Task1', '2023-04-12', '11:21:00', 4, 0),
(3, 'aaaaa', 'Task2', '2023-04-15', '11:21:00', 5, 0),
(4, 'aaaaa', 'Task34', '2023-04-12', '11:10:00', 6, 1),
(13, 'aaaaa', 'Task34a', '2023-04-20', '22:14:00', 4, 0),
(14, 'aaaaa', 'Task34aa', '2023-04-13', '20:26:00', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Name` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `Mobile_No` varchar(12) COLLATE utf8mb4_bin DEFAULT NULL,
  `User_Name` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Name`, `Email`, `Mobile_No`, `User_Name`, `password`, `image`) VALUES
('', '', '', '', '', ''),
('Chathura Madhushanka', 'machathuramadushanka@gmail.com', '+94781230275', 'aaaaa', '123456Aa', '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User_Name` (`User_Name`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User_Name` (`User_Name`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User_Name` (`User_Name`),
  ADD KEY `Category` (`Category`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`User_Name`) REFERENCES `user` (`User_Name`);

--
-- Constraints for table `color`
--
ALTER TABLE `color`
  ADD CONSTRAINT `color_ibfk_1` FOREIGN KEY (`User_Name`) REFERENCES `user` (`User_Name`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`User_Name`) REFERENCES `user` (`User_Name`),
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`Category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
