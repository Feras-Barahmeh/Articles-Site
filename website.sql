-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2022 at 03:35 PM
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
  `categoryID` int(11) DEFAULT NULL,
  `additionDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`IdArticle`, `titleArticle`, `content`, `imageName`, `IdUser`, `categoryID`, `additionDate`) VALUES
(6, 'Why index start to zero', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quod odit cupiditate saepe dolore nisi, eligendi nesciunt, itaque distinctio delectus doloribus doloremque, officiis et ullam exercitationem repellat facilis nam officia?\r\n', 'null_light-53585615fd723ba992bd2df7a10d10d1.png6_null_light-53585615fd723ba992bd2df7a10d10d1.png', 12, 10, '2022-08-12'),
(8, 'All you need to learn Git', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quod odit cupiditate saepe dolore nisi, eligendi nesciunt, itaque distinctio delectus doloribus doloremque, officiis et ullam exercitationem repellat facilis nam officia?\r\n', '1_omc83-7fb27k1ttmxdfraq (1).png8_1_omc83-7fb27k1ttmxdfraq (1).png', 12, 11, '2022-08-12'),
(17, 'Best Way learn framework python', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quod odit cupiditate saepe dolore nisi, eligendi nesciunt, itaque distinctio delectus doloribus doloremque, officiis et ullam exercitationem repellat facilis nam officia?\r\n', '1_z7hxzx49ero8tfg6mzxrnw.jpeg17_1_z7hxzx49ero8tfg6mzxrnw.jpeg', 12, 1, '2022-08-18'),
(21, 'How booting OS', 'LoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoream', 'r.jpg_r.jpg', 12, 5, '2022-08-27'),
(22, 'backend Web Devalober', 'The Language To Backend Web develober PHP, Python, Rube', 'backend-is.png_backend-is.png', 12, 4, '2022-08-29'),
(24, 'The Difference between backslash n and endl in CPP', 'معلمة سريعه عن ++c\r\nالفرق بين n\\ و endl \r\nالاغلب بعرف الفرق ال n\\ لل string و ال endl لغير ال string \r\nوفعليا مش هاذا الاختلاف الجوهري بينهم \r\nطيب شو الاختلاف ؟\r\nالاختلاف بطريقة تخزين البينات قبل عرضها على الشاشة \r\nبمعنى \r\nلو عندك 1000 جملة cout تحت بعض \r\nال n\\ رح يحط ال 1000 جملة جوا buffer(خلينا نعتبرها جدول اول مكان لتخزين بشكل مؤقت ) بعدين يعرضهم على الشاشة \r\nطيب ال endl شو بسوي ؟؟ \r\nال endl كل جملة بحطها ب buffer بعدين بظهرها على الشاشة وبرجع بيوخذ ال cout البعدها \r\n\r\nطيب انا مين استخدم (انو اسرع) ؟؟ \r\nفعليا اسرع اشي انك تستخدمهم ال اثنين مع بعض \r\n\r\nكيف ؟؟ \r\nفرضا عندك 1000 جملة طباعة متتاليات \r\nاستخدم مثلا 99 جملة ب n\\ والجملة ال 100 endl \r\nهيك لا انتا استهلكت وقت اذا استخدمت endl (بعد كل جملة رح يروح ع ال buffer ويطبع ويرجع يفضيها )  ولا انتا اعطيت ال buffer اكبر من سعتها لو استخدمت n\\', 'images (1).jpg_images (1).jpg', 12, 4, '2022-08-30');

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
(4, 'CPP', 'All you need to learn c++', '2022-08-18', 12),
(5, 'linux', 'all command linux', '2022-08-18', 12),
(7, 'windows server', 'All you need to learn windows ', '2022-08-18', 12),
(9, 'FrameWorks', 'As Laravel, Django, node js', '2022-08-18', 12),
(10, 'Fundamental', 'Fundamental Programmin', '2022-08-18', 12),
(11, 'Git And Gihup', 'Tip git & githup', '2022-08-18', 12),
(12, 'Tricks', 'This category to show some tricks in programming', '2022-08-23', 12),
(13, 'PHP', 'ALl  You need to learn PHP To learn  Backend', '2022-08-24', 12),
(14, 'Windows ', 'Windows ', '2022-08-27', 12),
(15, 'Problems', 'This Category to update problem solving skills', '2022-08-30', 12);

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
  `langs` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `tools` text DEFAULT NULL,
  `permission` tinyint(11) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `imageName` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `dataRegister` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IdUser`, `userName`, `password`, `email`, `fullName`, `aboutYou`, `langs`, `tools`, `permission`, `age`, `imageName`, `dataRegister`) VALUES
(12, 'feras', '$2y$10$Ci/KLHxpIAMOWOKqyEF1DuTyJBjxgYxKrrAP2wkuS/f6h6qHU85QO', 'ferasfadi345@gmail.com', 'Feras Barahmeh', 'I\'m Feras Barahmeh, study at ttu', 'cpp, php, python', 'Git  & Githup, SOLID prinsiple', 1, 21, 'download.png12_download.png', '2022-08-10'),
(14, 'majd', '$2y$10$Ci/KLHxpIAMOWOKqyEF1DuTyJBjxgYxKrrAP2wkuS/f6h6qHU85QO', 'majdbarahmeh990@gmail.com', 'Majd Fadi Barahmeh', 'I\'m Majd Fadi', 'cpp, pythn', NULL, 0, 19, '52eabf633ca6414e60a7677b0b917d92-male-avatar-maker.jpg14_52eabf633ca6414e60a7677b0b917d92-male-avatar-maker.jpg', '2022-08-10'),
(17, 'fadi', '$2y$10$id1hH5sb8EeeOcxVNUu26.gKqBg146QkYjBdSQVBxkjc949w/TC1y', 'fedi@f.com', 'Fadi Barahmeh', 'study CS', 'CPP, VB', NULL, 2, 47, 'depositphotos_119659092-stock-illustration-male-avatar-profile-picture-vector.jpg_depositphotos_119659092-stock-illustration-male-avatar-profile-picture-vector.jpg', '2022-08-23'),
(18, 'jojo', '$2y$10$yw5YQAxHZq7oD5LJiTrrEeEkvoUMF4Kfwkg7.witOw7f3SAjZkExe', 'j@j.com', 'Jenan', 'Saf 8', 'None', NULL, 1, 13, 'avatar-icon-of-girl-in-a-baseball-cap-vector-16225068.jpg18_avatar-icon-of-girl-in-a-baseball-cap-vector-16225068.jpg', '2022-08-23'),
(20, 'ahmad', '$2y$10$l6MDWcjvy6c1d0pZ3WuCMuH3IxbyJTrvFqPA1ScAlWNtLWhPhY9f2', 'a@a.com', 'Ahmad Fadi', '', '', NULL, 2, 0, NULL, '2022-08-24'),
(25, 'fowze', '$2y$10$ejYzeGgEnenB2ggNPX2AYue5wxddr7sYcrqpiCFZ3kgH7bg1Pdojm', 'f@fa.com', 'Fawaz Ahmad', 'I\'m Fawaz', 'NULL', 'git', 2, 45, 'null_light-53585615fd723ba992bd2df7a10d10d1.png25_null_light-53585615fd723ba992bd2df7a10d10d1.png', '2022-08-25'),
(28, 'fadiazmi', '$2y$10$lmr2/f3xtusQEY2R6ZJZsOkzIRpX2i/uPG9OaiAdDwbv1PZ5rQkfK', 'f@f.com', 'Fadi barha', '', '', NULL, 1, 50, 'download (5).jpg_download (5).jpg', '2022-08-25');

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
  MODIFY `IdArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `IdCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identify user number', AUTO_INCREMENT=35;

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
