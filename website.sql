-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 12:46 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `IdUser` int(11) NOT NULL COMMENT 'Identify user number',
  `userName` char(255) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `fullName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `aboutYou` varchar(255) NOT NULL,
  `langAndTools` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `permission` tinyint(11) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `imageName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `dataRegister` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IdUser`, `userName`, `password`, `email`, `fullName`, `aboutYou`, `langAndTools`, `permission`, `age`, `imageName`, `dataRegister`) VALUES
(1, 'feras', '$2y$10$smsGMZ/IXzRMfxi8DrPv6uHVe5ftJzGDuUNSjLrNbWnCID1S6q9nC', 'ferasfadi345@gmail.com', 'Feras Fadi Barahmeh', 'I\'m Feras Barahmeh', 'cpp, php, python, C#', 1, 20, 'feras_channels4_profile.jpg', '2022-08-07'),
(2, 'majd', '$2y$10$HA1p1jssKqAtiNr6ojdSeOB/.VSxbV4YMmodi6hsi4LHtbsnZWl/.', 'majd@majd.com', '', 'I\'m Majd', 'R, Python, Rube', 0, 19, 'majd_channels4_profile.jpg', '2022-08-07'),
(3, 'khaled', '$2y$10$BCQnkYDhjmeuPUfR2KyrWe1G6Kbdgs7MicXQZfjkNnQXelHoib7X2', 'k@k.com', 'Khaled Fadi Barahmeh', '', '', 0, 0, '', '2022-08-08'),
(4, 'jenan', '$2y$10$yS/X.amKTIi6n2uKp6E15u6rYQjZaPmzVcfHi5ivt9MzQB8pD859S', 'j@j.com', 'Jenan', '', '', 0, 0, '', '2022-08-08'),
(5, 'belal', '$2y$10$O6GtWnSjzrSaxCjlGbSI8O/cXKPBp33XIDrFeNgvC8K81wXcoEEhu', 'b@b.com', 'Belal Fadi', '', '', 0, 0, '', '2022-08-08'),
(6, 'osama', '$2y$10$jLVyXDEYYFbhbl7yAc8NRub/F5YL/ecdkf3dAUugWsXMNb9YrnHgG', 'o@o.com', 'Osama Mohammad', '', '', 0, 0, 'feras_channels4_profile.jpg', '2022-08-09'),
(7, 'blabla', '$2y$10$FkQcTLFOWjrRfJ6rRT26nunKg2Ywiw4TwJ8UkXENFZUMREqNkNpGy', 'b@b.com', '1234Blas', '', '', 0, 0, 'blabla_photo-1618424181497-157f25b6ddd5.jpg', '2022-08-09');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identify user number', AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
