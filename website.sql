-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2022 at 12:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `IdUser` int(11) NOT NULL COMMENT 'Identify user number',
  `userName` char(255) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `fullName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `permission` tinyint(11) NOT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `aboutYou` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `langAndTools` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `imageName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `dataRegister` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`IdUser`, `userName`, `password`, `email`, `fullName`, `permission`, `age`, `aboutYou`, `langAndTools`, `imageName`, `dataRegister`) VALUES
(1, 'feras', '$2y$10$zqrdBoB2bbf3n7x0O7cNLejDR.NwnNsPR82uhVMybqnlUBJ6Vi.X2', 'ferasfadi345@gmail.com', 'Feras Fadi Barahmeh', 1, 20, 'I\'m Feras Barahemh', 'cpp, php, python', 'feras_download.png', '2022-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `IdUser` int(11) NOT NULL COMMENT 'Identify user number',
  `userName` char(255) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `fullName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `permission` tinyint(11) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `imageName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `dataRegister` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IdUser`, `userName`, `password`, `email`, `fullName`, `permission`, `age`, `imageName`, `dataRegister`) VALUES
(1, 'feras', '$2y$10$S7GL', 'ferasfadi345@gmail.com', 'Feras Barahmeh', 1, 0, '', '2022-08-01'),
(2, 'majd', '$2y$10$F2WW', 'majd@majd.com', 'Majd Fadi Barahmeh', 0, 0, 'majd_images.jpg', '2022-08-02'),
(3, 'khaled', '$2y$10$8ABO', 'khaled@khale.com', 'Khaled Fadi Barahmeh', 0, 0, 'khaled_download.png', '2022-08-03'),
(4, 'jenanfdsfdf', '$2y$10$VjfL', 'feras@f.com', 'dfadfdasdad', 0, 0, 'jenanfdsfdf_71nbq2a52cl._sl1500_.jpg', '2022-08-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`IdUser`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IdUser`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identify user number', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identify user number', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
