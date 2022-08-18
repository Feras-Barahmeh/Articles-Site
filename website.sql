-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 06:06 PM
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
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `IdArticle` int(11) NOT NULL,
  `titleArticle` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `imageName` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `IdUser` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `additionDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`IdArticle`, `titleArticle`, `content`, `imageName`, `IdUser`, `categoryID`, `additionDate`) VALUES
(3, 'why can&#39;t start  number when declarate var', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quod odit cupiditate saepe dolore nisi, eligendi nesciunt, itaque distinctio delectus doloribus doloremque, officiis et ullam exercitationem repellat facilis nam officia?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quod odit cupiditate saepe dolore nisi, eligendi nesciunt, itaque distinctio delectus doloribus doloremque, officiis et ullam exercitationem repellat facilis nam officia?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quod odit cupiditate saepe dolore nisi, eligendi nesciunt, itaque distinctio delectus doloribus doloremque, officiis et ullam exercitationem repellat facilis nam officia?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quod odit cupiditate saepe dolore nisi, eligendi nesciunt, itaque distinctio delectus doloribus doloremque, officiis et ullam exercitationem repellat facilis nam officia?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quod odit cupiditate saepe dolore nisi, eligendi nesciunt, itaque distinctio delectus doloribus doloremque, officiis et ullam exercitationem repellat facilis nam officia?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quod odit cupiditate saepe dolore nisi, eligendi nesciunt, itaque distinctio delectus doloribus doloremque, officiis et ullam exercitationem repellat facilis nam officia?\r\n', 'images.jpg3_images.jpg', 12, 0, '2022-08-12'),
(6, 'Why index start to zero', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quod odit cupiditate saepe dolore nisi, eligendi nesciunt, itaque distinctio delectus doloribus doloremque, officiis et ullam exercitationem repellat facilis nam officia?\n', NULL, 12, 0, '2022-08-12'),
(8, 'All you need to learn Git', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quod odit cupiditate saepe dolore nisi, eligendi nesciunt, itaque distinctio delectus doloribus doloremque, officiis et ullam exercitationem repellat facilis nam officia?\r\n', '1_omc83-7fb27k1ttmxdfraq (1).png8_1_omc83-7fb27k1ttmxdfraq (1).png', 12, 0, '2022-08-12'),
(13, 'DB', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quod odit cupiditate saepe dolore nisi, eligendi nesciunt, itaque distinctio delectus doloribus doloremque, officiis et ullam exercitationem repellat facilis nam officia?\r\n', 'download (7).jpg13_download (7).jpg', 12, 0, '2022-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `IdCategory` int(11) NOT NULL,
  `titleCategory` varchar(255) NOT NULL,
  `content` varchar(100) NOT NULL,
  `additionDate` date NOT NULL,
  `IDwriter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`IdCategory`, `titleCategory`, `content`, `additionDate`, `IDwriter`) VALUES
(1, 'Python', 'All You need to learn Python', '2022-08-18', 12),
(3, 'DB', 'All you need to learn DB', '2022-08-18', 12),
(4, 'cpp', 'All you need to learn cpp', '2022-08-18', 12),
(5, 'linux', 'all command linux', '2022-08-18', 12),
(6, 'frameworks', 'all you need to learn framework', '2022-08-18', 12),
(7, 'windows server', 'All you need to learn windows ', '2022-08-18', 12),
(8, 'frontend web developer', 'bla blab bla', '2022-08-18', 12);

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
  `imageName` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `dataRegister` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IdUser`, `userName`, `password`, `email`, `fullName`, `aboutYou`, `langAndTools`, `permission`, `age`, `imageName`, `dataRegister`) VALUES
(12, 'feras', '$2y$10$Ci/KLHxpIAMOWOKqyEF1DuTyJBjxgYxKrrAP2wkuS/f6h6qHU85QO', 'ferasfadi345@gmail.com', 'Feras Fadi Barahmeh', 'I\'m Feras Barahmeh', 'cpp, php, python, C#', 1, 20, 'download.png12_download.png', '2022-08-10'),
(14, 'majd', '$2y$10$Ci/KLHxpIAMOWOKqyEF1DuTyJBjxgYxKrrAP2wkuS/f6h6qHU85QO', 'majdbarahmeh990@gmail.com', 'Majd Fadi Barahmeh', 'I\'m Majd Fadi', 'cpp', 0, 19, '52eabf633ca6414e60a7677b0b917d92-male-avatar-maker.jpg14_52eabf633ca6414e60a7677b0b917d92-male-avatar-maker.jpg', '2022-08-10'),
(16, 'khaled', '$2y$10$YRdaKlH0nS94UjlGdmDTR.xL/QetGEJ/l4B3LSeLlreuI41ND7Wju', 'khaled@khale.com', 'Khaled Fadi Barahmeh', 'I\'m khaled barahmeh', 'english', 0, 16, 'download.jpg_download.jpg', '2022-08-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`IdArticle`),
  ADD UNIQUE KEY `titleArticle` (`titleArticle`),
  ADD KEY `FK_IDuser` (`IdUser`),
  ADD KEY `FK_category` (`categoryID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`IdCategory`),
  ADD UNIQUE KEY `titleCategory` (`titleCategory`),
  ADD KEY `FK_AddBy` (`IDwriter`);

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `IdArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `IdCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identify user number', AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `FK_IDuser` FOREIGN KEY (`IdUser`) REFERENCES `users` (`IdUser`),
  ADD CONSTRAINT `FK_category` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`IdCategory`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `FK_AddBy` FOREIGN KEY (`IDwriter`) REFERENCES `users` (`IdUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
