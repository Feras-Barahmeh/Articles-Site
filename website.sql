-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2022 at 11:42 PM
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
(24, 'The Difference between backslash n and endl in CPP', 'معلمة سريعه عن ++c\r\nالفرق بين n\\ و endl \r\nالاغلب بعرف الفرق ال n\\ لل string و ال endl لغير ال string \r\nوفعليا مش هاذا الاختلاف الجوهري بينهم \r\nطيب شو الاختلاف ؟\r\nالاختلاف بطريقة تخزين البينات قبل عرضها على الشاشة \r\nبمعنى \r\nلو عندك 1000 جملة cout تحت بعض \r\nال n\\ رح يحط ال 1000 جملة جوا buffer(خلينا نعتبرها جدول اول مكان لتخزين بشكل مؤقت ) بعدين يعرضهم على الشاشة \r\nطيب ال endl شو بسوي ؟؟ \r\nال endl كل جملة بحطها ب buffer بعدين بظهرها على الشاشة وبرجع بيوخذ ال cout البعدها \r\n\r\nطيب انا مين استخدم (انو اسرع) ؟؟ \r\nفعليا اسرع اشي انك تستخدمهم ال اثنين مع بعض \r\n\r\nكيف ؟؟ \r\nفرضا عندك 1000 جملة طباعة متتاليات \r\nاستخدم مثلا 99 جملة ب n\\ والجملة ال 100 endl \r\nهيك لا انتا استهلكت وقت اذا استخدمت endl (بعد كل جملة رح يروح ع ال buffer ويطبع ويرجع يفضيها )  ولا انتا اعطيت ال buffer اكبر من سعتها لو استخدمت n\\', 'images (1).jpg_images (1).jpg', 12, 4, '2022-08-30'),
(25, 'Best Way to check if number odd or even', 'هل فيه طريقة احسن من \r\nif(num % 2 == 0) \r\nعشان تعرف هل الرقم زوجي ولا فردي ؟ ????\r\n\r\nالاجابه : \r\nبكل بساطه فيه طريقة وهي \r\nif(num & 1)\r\nازاي طب او ليه ؟\r\n\r\nاول حاجه هنرجع شوية ل ازاي الكمبيوتر بيعبر عن الارقام \r\nالكمبيوتر بيستخدم base 2 عشان يعبر عن الارقام وهو بيتكون من 0 و 1 بس والبالمناسبه اسمه binary\r\n\r\nطيب ازاي بردو ؟\r\n\r\nالرقم لو هنعبر عنه بال binary هنعبر عن رقم 8 بت مثلا تعالا نعد \r\nعشري = بايناري \r\n0 = 00000000\r\n1 = 00000001\r\n2 = 00000010\r\n3 = 00000011\r\n4 = 00000100\r\n5 = 00000101\r\n\r\nملاحظ حاجه ؟\r\n\r\nدايما لما الرقم زوجي اول بت من الرقم بيبقى 0 ولما الرقم بيبقى فردي اول بت بيبقى 1 \r\n\r\nوال & بكل بساطه بتشوف هل ال بت ده 0 ولا 1 وبالتالي بتعرف هل الرقم ده زوجي ولا فردي', 'imageseven.jpg_imageseven.jpg', 12, 15, '2022-08-30');

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
  `langs` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `tools` text DEFAULT NULL,
  `permission` tinyint(11) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `githup` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `linkedin` varchar(50) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `imageName` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `dataRegister` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IdUser`, `userName`, `password`, `email`, `fullName`, `aboutYou`, `langs`, `tools`, `permission`, `age`, `githup`, `facebook`, `twitter`, `linkedin`, `nickname`, `gender`, `imageName`, `dataRegister`) VALUES
(12, 'feras', '$2y$10$Ci/KLHxpIAMOWOKqyEF1DuTyJBjxgYxKrrAP2wkuS/f6h6qHU85QO', 'ferasfadi345@gmail.com', 'Feras Barahmeh', 'I\'m Feras Barahmeh, study at ttu', 'cpp:50%, php:80%, python90%', 'Git  & Githup:40%,SOLID prinsiple:67%', 1, 21, NULL, NULL, NULL, NULL, NULL, NULL, 'download.png12_download.png', '2022-08-10'),
(14, 'majd', '$2y$10$Ci/KLHxpIAMOWOKqyEF1DuTyJBjxgYxKrrAP2wkuS/f6h6qHU85QO', 'majdbarahmeh990@gmail.com', 'Majd Fadi Barahmeh', 'I\'m Majd Fadi', 'cpp:30%, python:90%', 'Git  & Githup:40%,SOLID prinsiple:67%', 0, 19, 'majdfadi', 'majd_fadi', 'da7loze', NULL, 'da7loz', NULL, '52eabf633ca6414e60a7677b0b917d92-male-avatar-maker.jpg14_52eabf633ca6414e60a7677b0b917d92-male-avatar-maker.jpg', '2022-08-10'),
(17, 'fadi', '$2y$10$id1hH5sb8EeeOcxVNUu26.gKqBg146QkYjBdSQVBxkjc949w/TC1y', 'fedi@f.com', 'Fadi Barahmeh', 'study CS', 'CPP, VB', NULL, 2, 47, NULL, NULL, NULL, NULL, NULL, NULL, 'depositphotos_119659092-stock-illustration-male-avatar-profile-picture-vector.jpg_depositphotos_119659092-stock-illustration-male-avatar-profile-picture-vector.jpg', '2022-08-23'),
(18, 'jojo', '$2y$10$yw5YQAxHZq7oD5LJiTrrEeEkvoUMF4Kfwkg7.witOw7f3SAjZkExe', 'j@j.com', 'Jenan', 'Saf 8', 'None', NULL, 1, 13, NULL, NULL, NULL, NULL, NULL, NULL, 'avatar-icon-of-girl-in-a-baseball-cap-vector-16225068.jpg18_avatar-icon-of-girl-in-a-baseball-cap-vector-16225068.jpg', '2022-08-23'),
(20, 'ahmad', '$2y$10$l6MDWcjvy6c1d0pZ3WuCMuH3IxbyJTrvFqPA1ScAlWNtLWhPhY9f2', 'a@a.com', 'Ahmad Fadi', '', '', NULL, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-24'),
(25, 'fowze', '$2y$10$ejYzeGgEnenB2ggNPX2AYue5wxddr7sYcrqpiCFZ3kgH7bg1Pdojm', 'f@fa.com', 'Fawaz Ahmad', 'I\'m Fawaz', 'NULL', 'git', 2, 45, NULL, NULL, NULL, NULL, NULL, NULL, 'null_light-53585615fd723ba992bd2df7a10d10d1.png25_null_light-53585615fd723ba992bd2df7a10d10d1.png', '2022-08-25'),
(28, 'fadiazmi', '$2y$10$lmr2/f3xtusQEY2R6ZJZsOkzIRpX2i/uPG9OaiAdDwbv1PZ5rQkfK', 'f@f.com', 'Fadi barha', '', '', NULL, 1, 50, NULL, NULL, NULL, NULL, NULL, NULL, 'download (5).jpg_download (5).jpg', '2022-08-25'),
(36, 'amrdeab', '$2y$10$tyNaZvcnhARdOhO1ke5Reuhbi4EgC.4N3es25UKoATQPYpMC.rzzO', 'a@m.com', 'Amr Deab', '', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(37, 'naser', '$2y$10$ujbS72SIR2reIj66aO3SrundEKxLroIMKRHsfVOd2oZhiNuq9EWq.', 'n@n.com', 'Naser ', '', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(38, 'sadam', '$2y$10$IgqZNLAR4HgiYyKZjtx7OO0vxyE6BB/UtNb/np43AFb5druF7OPUm', 's@sd.com', 'Sadam Hussan', '', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(39, 'ferasahmad', '$2y$10$b5U25uPUYuSoxMjVkIwlsOL1J5bwObQY.gBI4OwyQ1eIlx9VPtzPu', 'fa@f.com', 'Feas Ahmad', '', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(40, 'yaelQase,', '$2y$10$9rhi.Kn2mzBdiF0ytnIgauVx9Dxl53CfyRb6kqwMSK39WCIlezjOm', 'q@y.com', 'Yaiel Qasem', '', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(41, 'feas', '$2y$10$eoHPd3Z68qenqlG3U9VN4.jAqvwnaJiBVUqT8h2GACIsE8iWL/nxu', 'f.f.b.feras@gmail.com', 'ferasfad', '', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00');

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
  MODIFY `IdArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `IdCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identify user number', AUTO_INCREMENT=42;

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
