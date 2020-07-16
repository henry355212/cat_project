-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-07-16 10:24:22
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
(3, 'guest_cat', 'guest'),
(7, 'angela_cat', 'angela'),
(6, 'shangxi_cat', 'shangxi'),
(8, 'henry_cat', 'henry');

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
(177, 'pexels-photo-1436008.jpg', '5f0fbee6b1fd1.jpg', NULL, 5),
(178, 'pexels-photo-2643812.jpg', '5f0fbee6b819c.jpg', NULL, 5),
(179, 'pexels-photo-2655024.jpg', '5f0fbee6bcc76.jpg', NULL, 5),
(180, 'pexels-photo-3687480.jpg', '5f0fbee6c2242.jpg', NULL, 5),
(190, 'pexels-photo-406629.jpg', '5f0fc1e1f183c.jpg', NULL, 8),
(189, 'pexels-photo-1378413.jpg', '5f0fc1dbb19df.jpg', NULL, 8),
(183, 'pexels-photo-3687480.jpg', '5f0fc1b1287ac.jpg', NULL, 7),
(184, 'pexels-photo-2655024.jpg', '5f0fc1b12fcf6.jpg', NULL, 7),
(185, 'pexels-photo-2643812.jpg', '5f0fc1b13554b.jpg', NULL, 7),
(186, 'pexels-photo-1436008.jpg', '5f0fc1b13a011.jpg', NULL, 7),
(187, 'pexels-photo-977935.jpg', '5f0fc1dba3eaa.jpg', '我超可愛', 8),
(188, 'pexels-photo-1056252.jpg', '5f0fc1dbaadb7.jpg', NULL, 8),
(182, 'pexels-photo-4123992.jpg', '5f0fc0aa68bc8.jpg', NULL, 6),
(181, 'pexels-photo-4081076.jpg', '5f0fc0aa61e7c.jpg', NULL, 6),
(172, 'pexels-photo-172420.jpg', '5f0fbb8745612.jpg', NULL, 3),
(171, 'pexels-photo-171227.jpg', '5f0fbb8740c42.jpg', NULL, 3),
(170, 'pexels-photo-126407.jpg', '5f0fbb873cb90.jpg', NULL, 3),
(169, 'pexels-photo-121920.jpg', '5f0fbb8732da7.jpg', NULL, 3);

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
(1, 'guest', 'guest', '阿凱', '男', 80, 6, 24, '(02) 2368-5978', '(0968) 568-854', '台北市大安區師大路 20 號', 'guest@ms17.url.com.tw', 'http://www.kai.com.tw', '這是 guest 帳號'),
(2, 'henry', '123456', 'henry', '男', 109, 7, 9, '0912123123', '0912123123', '台北市信義區復興南路', 'henry123456@gmail.com', '', ''),
(3, 'angela', '123456', 'angela', '女', 109, 7, 9, '0912123123', '0912123123', '台北市信義區復興南路', 'angela123456@gmail.com', '', ''),
(4, 'shangxi', '123456', 'shangxi', '男', 109, 7, 9, '0912123123', '0912123123', '台北市信義區復興南路', 'shangxi123456@gmail.com', '', '');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
