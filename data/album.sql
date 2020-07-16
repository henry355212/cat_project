-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-07-15 07:39:05
-- 伺服器版本： 8.0.20
-- PHP 版本： 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `album`
--
CREATE DATABASE IF NOT EXISTS `album` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `album`;

-- --------------------------------------------------------

--
-- 資料表結構 `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` int NOT NULL,
  `name` varchar(256) NOT NULL,
  `owner` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `album`
--

INSERT INTO `album` (`id`, `name`, `owner`) VALUES
(2, '布拉格', 'guest'),
(1, '維也納', 'guest');

-- --------------------------------------------------------

--
-- 資料表結構 `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE `photo` (
  `id` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `filename` varchar(64) NOT NULL,
  `comment` varchar(512) DEFAULT NULL,
  `album_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `photo`
--

INSERT INTO `photo` (`id`, `name`, `filename`, `comment`, `album_id`) VALUES
(142, 'IMG_0084.JPG', '57be72b12fbb0.jpg', NULL, 1),
(141, 'IMG_0086.JPG', '57be71ce3b56c.jpg', '天文鐘', 2),
(140, 'IMG_0098 (3).JPG', '57be71cd6ddd7.jpg', NULL, 2),
(139, 'P_20160720_132256.jpg', '57be71ccbcb68.jpg', '布拉格查爾斯橋', 2),
(138, 'P_20160720_135641.jpg', '57be71cc1c0f3.jpg', NULL, 2),
(137, 'IMG_0152.JPG', '57be712335cc3.jpg', NULL, 1),
(136, 'IMG_0049 (2).JPG', '57be7122573b9.jpg', NULL, 1),
(135, 'IMG_0022.JPG', '57be71218d2d5.jpg', NULL, 1),
(134, 'IMG_0006.JPG', '57be71209a58f.jpg', NULL, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL,
  `account` varchar(10) NOT NULL DEFAULT '',
  `password` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(10) NOT NULL DEFAULT '',
  `sex` char(2) NOT NULL DEFAULT '',
  `year` tinyint NOT NULL DEFAULT '0',
  `month` tinyint NOT NULL DEFAULT '0',
  `day` tinyint NOT NULL DEFAULT '0',
  `telephone` varchar(20) NOT NULL DEFAULT '',
  `cellphone` varchar(20) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `url` varchar(50) NOT NULL DEFAULT '',
  `comment` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `account`, `password`, `name`, `sex`, `year`, `month`, `day`, `telephone`, `cellphone`, `address`, `email`, `url`, `comment`) VALUES
(1, 'guest', 'guest', '阿凱', '男', 80, 6, 24, '(02) 2368-5978', '(0968) 568-854', '台北市大安區師大路 20 號', 'kai@ms17.url.com.tw', 'http://www.kai.com.tw', '這是 guest 帳號');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
