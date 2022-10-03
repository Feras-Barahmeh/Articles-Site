-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 10:23 PM
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
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `IdArticle` int(11) NOT NULL,
  `titleArticle` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `excerpt` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `loves` int(11) NOT NULL DEFAULT 0,
  `dislikes` int(11) NOT NULL DEFAULT 0,
  `saveds` int(11) NOT NULL DEFAULT 0,
  `imageName` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `IdUser` int(11) NOT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `additionDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`IdArticle`, `titleArticle`, `content`, `excerpt`, `likes`, `loves`, `dislikes`, `saveds`, `imageName`, `IdUser`, `categoryID`, `additionDate`) VALUES
(6, 'Why index start to zero', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quod odit cupiditate saepe dolore nisi, eligendi nesciunt, itaque distinctio delectus doloribus doloremque, officiis et ullam exercitationem repellat facilis nam officia?\r\n', 'Lorem ipsum dolor sit amet consectetur', 1, 0, 0, 1, 'download.jpg6_download.jpg', 12, 10, '2022-08-12'),
(8, 'All you need to learn Git', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quod odit cupiditate saepe dolore nisi, eligendi nesciunt, itaque distinctio delectus doloribus doloremque, officiis et ullam exercitationem repellat facilis nam officia?\r\n', 'Lorem ipsum dolor sit amet consectetur', 0, 0, 1, 0, '1_omc83-7fb27k1ttmxdfraq (1).png8_1_omc83-7fb27k1ttmxdfraq (1).png', 12, 11, '2022-08-12'),
(17, 'Best Way learn framework python', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus quod odit cupiditate saepe dolore nisi, eligendi nesciunt, itaque distinctio delectus doloribus doloremque, officiis et ullam exercitationem repellat facilis nam officia?\r\n', 'Lorem ipsum dolor sit amet consectetur', 0, 0, 0, 0, '1_z7hxzx49ero8tfg6mzxrnw.jpeg17_1_z7hxzx49ero8tfg6mzxrnw.jpeg', 12, 1, '2022-08-18'),
(21, 'How booting OS', 'LoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoreamLoream', 'Lorem ipsum dolor sit amet consectetur', 0, 0, 0, 0, 'r.jpg_r.jpg', 12, 5, '2022-08-27'),
(22, 'backend Web Devalober', 'The Language To Backend Web develober PHP, Python, Rube', 'Lorem ipsum dolor sit amet consectetur', 0, 0, 0, 0, 'backend-is.png_backend-is.png', 12, 4, '2022-08-29'),
(24, 'The Difference between backslash n and endl in CPP', 'معلمة سريعه عن ++c\r\nالفرق بين n\\ و endl \r\nالاغلب بعرف الفرق ال n\\ لل string و ال endl لغير ال string \r\nوفعليا مش هاذا الاختلاف الجوهري بينهم \r\nطيب شو الاختلاف ؟\r\nالاختلاف بطريقة تخزين البينات قبل عرضها على الشاشة \r\nبمعنى \r\nلو عندك 1000 جملة cout تحت بعض \r\nال n\\ رح يحط ال 1000 جملة جوا buffer(خلينا نعتبرها جدول اول مكان لتخزين بشكل مؤقت ) بعدين يعرضهم على الشاشة \r\nطيب ال endl شو بسوي ؟؟ \r\nال endl كل جملة بحطها ب buffer بعدين بظهرها على الشاشة وبرجع بيوخذ ال cout البعدها \r\n\r\nطيب انا مين استخدم (انو اسرع) ؟؟ \r\nفعليا اسرع اشي انك تستخدمهم ال اثنين مع بعض \r\n\r\nكيف ؟؟ \r\nفرضا عندك 1000 جملة طباعة متتاليات \r\nاستخدم مثلا 99 جملة ب n\\ والجملة ال 100 endl \r\nهيك لا انتا استهلكت وقت اذا استخدمت endl (بعد كل جملة رح يروح ع ال buffer ويطبع ويرجع يفضيها )  ولا انتا اعطيت ال buffer اكبر من سعتها لو استخدمت n\\', 'Lorem ipsum dolor sit amet consectetur', 0, 0, 0, 0, 'images (1).jpg_images (1).jpg', 12, 4, '2022-08-30'),
(25, 'Best Way to check if number odd or even', 'هل فيه طريقة احسن من \nif(num % 2 == 0) \nعشان تعرف هل الرقم زوجي ولا فردي ؟ ????\n\nالاجابه : \nبكل بساطه فيه طريقة وهي \nif(num & 1)\nازاي طب او ليه ؟\n\nاول حاجه هنرجع شوية ل ازاي الكمبيوتر بيعبر عن الارقام \nالكمبيوتر بيستخدم base 2 عشان يعبر عن الارقام وهو بيتكون من 0 و 1 بس والبالمناسبه اسمه binary\n\nطيب ازاي بردو ؟\n\nالرقم لو هنعبر عنه بال binary هنعبر عن رقم 8 بت مثلا تعالا نعد \nعشري = بايناري \n0 = 00000000\n1 = 00000001\n2 = 00000010\n3 = 00000011\n4 = 00000100\n5 = 00000101\n\nملاحظ حاجه ؟\n\nدايما لما الرقم زوجي اول بت من الرقم بيبقى 0 ولما الرقم بيبقى فردي اول بت بيبقى 1 \n\nوال & بكل بساطه بتشوف هل ال بت ده 0 ولا 1 وبالتالي بتعرف هل الرقم ده زوجي ولا فردي', 'Lorem ipsum dolor sit amet consectetur', 0, 0, 0, 0, 'imageseven.jpg_imageseven.jpg', 12, 15, '2022-08-30');

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
-- Table structure for table `commentarticles`
--

CREATE TABLE `commentarticles` (
  `commentID` int(11) NOT NULL,
  `articelID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `contentComment` text NOT NULL,
  `dateComment` datetime NOT NULL,
  `likes_count` int(11) DEFAULT 0,
  `dislikes_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentarticles`
--

INSERT INTO `commentarticles` (`commentID`, `articelID`, `userID`, `contentComment`, `dateComment`, `likes_count`, `dislikes_count`) VALUES
(33, 6, 14, 'Nice Article, thanks', '2022-09-25 05:07:42', 0, 0),
(34, 6, 14, 'thanks to sharing', '2022-09-25 05:06:43', 0, 0),
(35, 6, 14, 'good information', '2022-09-25 22:21:54', 0, 0),
(36, 6, 14, 'Thanks sar', '2022-09-27 13:12:21', 0, 0),
(49, 6, 14, 'Woooo, great', '2022-09-27 13:12:46', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `dislikeID` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `IdContent` int(11) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dislikes`
--

INSERT INTO `dislikes` (`dislikeID`, `IdUser`, `IdContent`, `content`) VALUES
(150, 14, 8, '');

-- --------------------------------------------------------

--
-- Table structure for table `dislike_comment_articles`
--

CREATE TABLE `dislike_comment_articles` (
  `id_dislike` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dislike_comment_articles`
--

INSERT INTO `dislike_comment_articles` (`id_dislike`, `id_article`, `id_user`, `id_comment`) VALUES
(24, 6, 14, 49);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likeID` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `IdContent` int(11) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`likeID`, `IdUser`, `IdContent`, `content`) VALUES
(333, 14, 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `like_comment_articles`
--

CREATE TABLE `like_comment_articles` (
  `id_like` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `like_comment_articles`
--

INSERT INTO `like_comment_articles` (`id_like`, `id_article`, `id_user`, `id_comment`) VALUES
(40, 6, 14, 35),
(41, 6, 14, 36);

-- --------------------------------------------------------

--
-- Table structure for table `quick_draft`
--

CREATE TABLE `quick_draft` (
  `id_draft` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content_draft` varchar(255) NOT NULL,
  `title_draft` varchar(255) NOT NULL,
  `if_executed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quick_draft`
--

INSERT INTO `quick_draft` (`id_draft`, `id_user`, `content_draft`, `title_draft`, `if_executed`) VALUES
(28, 12, 'last draft', 'last draft', 0),
(30, 12, 'Testing Check Box ', 'New Draft', 1);

-- --------------------------------------------------------

--
-- Table structure for table `saveds`
--

CREATE TABLE `saveds` (
  `idSaved` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `IdContent` int(11) NOT NULL,
  `content` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `saveds`
--

INSERT INTO `saveds` (`idSaved`, `IdUser`, `IdContent`, `content`) VALUES
(49, 14, 6, NULL);

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
  `age` date NOT NULL,
  `githup` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `linkedin` varchar(50) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `location` varchar(60) DEFAULT NULL,
  `education` text DEFAULT NULL,
  `work` text DEFAULT NULL,
  `imageName` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `dataRegister` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IdUser`, `userName`, `password`, `email`, `fullName`, `aboutYou`, `langs`, `tools`, `permission`, `age`, `githup`, `facebook`, `twitter`, `linkedin`, `website`, `nickname`, `gender`, `location`, `education`, `work`, `imageName`, `dataRegister`) VALUES
(12, 'feras', '$2y$10$Ci/KLHxpIAMOWOKqyEF1DuTyJBjxgYxKrrAP2wkuS/f6h6qHU85QO', 'ferasfadi345@gmail.com', 'Feras Barahmeh', 'I\'m Feras Barahmeh, study at ttu', 'cpp:50%, php:80%, python90%', 'Git  & Githup:40%,SOLID prinsiple:67%', 1, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'download.png12_download.png', '2022-08-10'),
(14, 'majd', '$2y$10$4ZlPqT1STYerP20oRYqTL.eNLlLAplkiQwVSFQ946J8IeXEQaE9sa', 'majdfadi44@gmail.com', 'Majd Fadi Barahmeh', 'Im Majd Fadi Barahmeh', 'cpp:30%, python:90%', 'git,JSON,githup', 0, '2003-07-09', 'MajdBarahmeh', 'majd_fadi', 'da7loze', NULL, NULL, 'da7loz', 'male', 'Amman - Jordan', 'HU, JU', NULL, '52eabf633ca6414e60a7677b0b917d92-male-avatar-maker.jpg14_52eabf633ca6414e60a7677b0b917d92-male-avatar-maker.jpg', '2022-08-10'),
(42, 'khaled', '$2y$10$8xLH.So0pq.j4Zg/VyuWr.DJmAC.pJcxUbIGCyDp0RqIb1kkOvFJa', 'kh@kha.com', 'Khaled Fadi', '', NULL, NULL, 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'depositphotos_119659092-stock-illustration-male-avatar-profile-picture-vector.jpg_depositphotos_119659092-stock-illustration-male-avatar-profile-picture-vector.jpg', '2022-09-20'),
(43, 'belal', '$2y$10$sovxVyN0O0M.0zOp4lgk9uehT7WHmWJ6d5FgUherrdnvgQugxAu.a', 'b@b.com', 'Belal Fadi Barahemh', '', NULL, NULL, 2, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'khaled.jpg_khaled.jpg', '2022-09-25');

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
-- Indexes for table `commentarticles`
--
ALTER TABLE `commentarticles`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `FK_User_ID` (`userID`),
  ADD KEY `FK_Article_ID` (`articelID`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`dislikeID`);

--
-- Indexes for table `dislike_comment_articles`
--
ALTER TABLE `dislike_comment_articles`
  ADD PRIMARY KEY (`id_dislike`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likeID`),
  ADD KEY `FK_User` (`IdUser`),
  ADD KEY `FK_Article` (`IdContent`);

--
-- Indexes for table `like_comment_articles`
--
ALTER TABLE `like_comment_articles`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `FK_comment` (`id_comment`);

--
-- Indexes for table `quick_draft`
--
ALTER TABLE `quick_draft`
  ADD PRIMARY KEY (`id_draft`),
  ADD KEY `FK_draft_user` (`id_user`);

--
-- Indexes for table `saveds`
--
ALTER TABLE `saveds`
  ADD PRIMARY KEY (`idSaved`);

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
-- AUTO_INCREMENT for table `commentarticles`
--
ALTER TABLE `commentarticles`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `dislikeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `dislike_comment_articles`
--
ALTER TABLE `dislike_comment_articles`
  MODIFY `id_dislike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT for table `like_comment_articles`
--
ALTER TABLE `like_comment_articles`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `quick_draft`
--
ALTER TABLE `quick_draft`
  MODIFY `id_draft` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `saveds`
--
ALTER TABLE `saveds`
  MODIFY `idSaved` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identify user number', AUTO_INCREMENT=44;

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

--
-- Constraints for table `commentarticles`
--
ALTER TABLE `commentarticles`
  ADD CONSTRAINT `FK_Article_ID` FOREIGN KEY (`articelID`) REFERENCES `articles` (`IdArticle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_User_ID` FOREIGN KEY (`userID`) REFERENCES `users` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `FK_Article` FOREIGN KEY (`IdContent`) REFERENCES `articles` (`IdArticle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_User` FOREIGN KEY (`IdUser`) REFERENCES `users` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `like_comment_articles`
--
ALTER TABLE `like_comment_articles`
  ADD CONSTRAINT `FK_comment` FOREIGN KEY (`id_comment`) REFERENCES `commentarticles` (`commentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quick_draft`
--
ALTER TABLE `quick_draft`
  ADD CONSTRAINT `FK_draft_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
