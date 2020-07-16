-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
<<<<<<< HEAD:data/album.sql
-- 產生時間： 2020-07-16 10:07:29
=======
-- 產生時間： 2020-07-16 10:24:22
>>>>>>> d754ff917e6642f3613967f597137f8dda824489:data/album (1).sql
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
<<<<<<< HEAD:data/album.sql

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int NOT NULL,
  `name` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `subject` tinytext NOT NULL,
  `content` mediumtext NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `message`
--

INSERT INTO `message` (`id`, `name`, `subject`, `content`, `date`) VALUES
(10, 'May', '海底總動員2', '這次將以健忘的多莉為主軸，故事發生在尼莫返家後的六個月，一向什麼都記不起來的她突然受到記憶的衝擊，想起自己過往，所以多莉決定啟程尋找自己的家人，憑著僅存的記憶找到回家的路。', '2019-12-17 02:16:10'),
(37, '小東', '名偵探柯南', '名偵探柯南是日本漫畫家青山剛昌的著名推理漫畫作品及所有相關之出版物、電影等，劇中描述高中生偵探工藤新一因遭到灌藥導致身體縮小後，試圖調查黑暗組織與破獲各案件的故事。', '2019-12-17 02:15:37'),
(36, '阿寶', '臥虎藏龍開啟武俠電影新紀元', '國際知名導演李安的作品 \"臥虎藏龍\" 是第一部好萊塢投資的中國武俠電影，在台甫一推出便創下票房佳績。', '2019-12-17 02:14:45'),
(35, 'Marie', '秋天的童話', '秋天的童話是一個美麗純樸的少女、一個期待真愛的富家子弟、一個真心相待的青梅竹馬交織而成的美麗秋天童話，播出時間為 8 月 31 日起星期一到五晚間 10:00。', '2019-12-17 02:14:16'),
(34, 'Jerry', '天搖地動', '\"天搖地動\" 電影描述的是漁船安麗雅號為了增加漁獲量，於是開往弗萊明角，未料當地氣象預告超級颶風葛瑞斯正在接近中，安麗雅號與其它船隻即將面臨前所未有的危機。', '2019-12-17 02:13:10'),
(32, '小倩', 'AKB48姊妹團體', 'AKB48獲得成功後，秋元康以類似模式於日本其它都市與海外成立SKE48、SDN48、NMB48、HKT48、NGT48、JKT48、SNH48等姊妹團體，朝向不同市場發展。', '2019-12-17 02:11:59'),
(33, '小明', '猜猜小叮噹的身高', '您知道小叮噹的身高和體重是一樣的數字嗎? 這是我在電視節目上看到的，答案是129.3喔。', '2019-12-17 02:12:31'),
(31, '小倩', 'AKB48', 'AKB48是日本大型女子偶像團體，成立於2005年12月8日，其團名取自東京的秋葉原，在秋葉原擁有專屬表演劇場，以「可以面對面的偶像」為理念，幾乎每天在劇場進行公演。', '2019-12-17 02:11:33'),
(30, 'Jerry', '冰雪奇緣', '冰雪奇緣是由迪士尼電影公司發行，取材自安徒生童話故事《冰雪女王》，該片連續贏得第71屆金球獎最佳動畫片、第41屆安妮奬最佳動畫電影、第67屆英國電影學院獎最佳動畫電影，以及第86屆奧斯卡金像獎最佳動畫長片和最佳原創歌曲。', '2019-12-17 02:11:03'),
(12, 'Grace', '動物方城市', '動物方城市是迪士尼影業所發行的3D動畫電影，故事的背景設定在一個哺乳動物所居住的大城市，主角兔子女警和街頭行騙高手狐狸合作解開一樁肉食動物失蹤案，並揭發背後的陰謀。', '2019-12-17 02:10:35'),
(11, '小丸子', '六月天演唱會免費聽', '知名的六月天樂團將於 1/31 舉行新歌免費聽演唱會，一張專輯可以換一張票，北中南各限量 1000 張，有沒有人要一起去排隊？', '2019-12-17 02:10:03'),
(39, '阿寶', '貓咪', '貓奴', '2020-07-10 08:02:51'),
(43, '阿寶', '求解 小貓的行為如何改善', '家裡剛滿兩個月的幼貓 平常都很乖 吃飯也會給摸\r\n有時候撒嬌的時候只會輕輕的咬一下你\r\n可是一到我去拿飼料的時候他會開始狂叫\r\n甚至會爬籠子爬到最高一直叫(目前把它放在一格一格的籠子裡)\r\n要把飼料放進他籠子裡的時候會超激動 甚至一開門會想往食物衝 很用力抓也抓不住\r\n蒸了雞胸肉給他吃 餵牠一塊的時候 直接連我的手一起咬\r\n而且還緊咬不放 手從他嘴裡硬抽出來 一道長痕瞬間見血\r\n不知道有沒有人遇過這種狀況 長大會改善嗎?還是需要教一下... 謝謝', '2020-07-10 09:15:58'),
(44, '小山', '求解 小貓的行為如何改善', '家裡剛滿兩個月的幼貓 平常都很乖 吃飯也會給摸\r\n有時候撒嬌的時候只會輕輕的咬一下你\r\n可是一到我去拿飼料的時候他會開始狂叫\r\n甚至會爬籠子爬到最高一直叫(目前把它放在一格一格的籠子裡)\r\n要把飼料放進他籠子裡的時候會超激動 甚至一開門會想往食物衝 很用力抓也抓不住\r\n蒸了雞胸肉給他吃 餵牠一塊的時候 直接連我的手一起咬\r\n而且還緊咬不放 手從他嘴裡硬抽出來 一道長痕瞬間見血\r\n不知道有沒有人遇過這種狀況 長大會改善嗎?還是需要教一下... 謝謝\r\n', '2020-07-10 10:55:56'),
(45, '小美', '貓金毛感冒要注意什么', '一般来说，金毛感冒的治疗病程一般3～5天，多在7～10天内痊愈；同时要注意适当用药，金毛狗狗用人的药物时，一定要比人用的少才可以；加强饲养管理，防止金毛寒冷刺激。\r\n感诺宁：金毛感冒注意事项\r\n(1)一般来说，金毛感冒的治疗病程一般3～5天，多在7～10天内痊愈。但是如果10天内没有效果，就一定要及时就医，因为治疗不及时，往往容易转为支气管炎或肺炎!\r\n(2)同时要注意适当用药，金毛狗狗用人的药物时，一定要比人用的少才可以。\r\n(3)加强饲养管理，防止金毛寒冷刺激。\r\n\r\n感诺宁：金毛感冒治疗方法\r\n狗狗感冒咳嗽打喷嚏，属于呼吸道感染，这一类的疾病是非常常见的，可以使用感诺宁给狗狗吃就可以。如果狗狗容易着凉感冒，可以购买感诺宁来备用，一旦发现狗狗感冒了，让狗狗吃感诺宁就可以了。', '2020-07-15 04:28:40'),
(47, 'eric31415', '尋貓 花蓮 太昌', '名字：點點\r\n性別：男生\r\n年齡：1歲半\r\n個性：怕生、會認名字\r\n特徵：背上有白色的點、走失時有帶灰色項圈且有名牌\r\n走失時間：5/31凌晨四點\r\n走失地點：太昌 明義七街99巷\r\n如有任何發現煩請聯絡：劉小姐0938709393\r\n感謝各位協助！\r\n', '2020-07-15 05:29:54'),
(48, '三花很可以', '溫差大怎麼讓貓咪更舒服', '我之前沒什麼養貓咪的經驗，大多接觸狗狗比較多，\r\n最近朋友要出差3.4天，把貓咪的照顧托給了我。(貓咪在原住家)\r\n但因為最近天氣一下冷一下熱的，一下大雨、一下又高溫...\r\n我都是早晚各去看貓咪一趟，都很神經質的一直看水的狀況，\r\n深怕他喝少了... :(', '2020-07-15 08:40:02'),
(49, '阿凱', ' Geliebte Katze 歐洲最受歡迎的貓雜誌', 'Geliebte Katze 於1993年開始發售 目前仍然是歐洲最受歡迎的貓雜誌\r\n語言:德文\r\n這本雜誌專門以\"貓\"為主題去探討\r\n也常常有許多貓咪相關創作者的撰寫文章介紹\r\n還有活動(例如之前就跟知名作者Jessica Kremser一起宣傳新書)', '2020-07-16 07:32:27');
=======
>>>>>>> d754ff917e6642f3613967f597137f8dda824489:data/album (1).sql

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
<<<<<<< HEAD:data/album.sql
(187, 'pexels-photo-977935.jpg', '5f0fc1dba3eaa.jpg', NULL, 8),
=======
(187, 'pexels-photo-977935.jpg', '5f0fc1dba3eaa.jpg', '我超可愛', 8),
>>>>>>> d754ff917e6642f3613967f597137f8dda824489:data/album (1).sql
(188, 'pexels-photo-1056252.jpg', '5f0fc1dbaadb7.jpg', NULL, 8),
(182, 'pexels-photo-4123992.jpg', '5f0fc0aa68bc8.jpg', NULL, 6),
(181, 'pexels-photo-4081076.jpg', '5f0fc0aa61e7c.jpg', NULL, 6),
(172, 'pexels-photo-172420.jpg', '5f0fbb8745612.jpg', NULL, 3),
(171, 'pexels-photo-171227.jpg', '5f0fbb8740c42.jpg', NULL, 3),
(170, 'pexels-photo-126407.jpg', '5f0fbb873cb90.jpg', NULL, 3),
(169, 'pexels-photo-121920.jpg', '5f0fbb8732da7.jpg', NULL, 3);
<<<<<<< HEAD:data/album.sql

-- --------------------------------------------------------

--
-- 資料表結構 `reply_message`
--

DROP TABLE IF EXISTS `reply_message`;
CREATE TABLE `reply_message` (
  `id` int NOT NULL,
  `name` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `subject` tinytext NOT NULL,
  `content` mediumtext NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reply_id` int NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `reply_message`
--

INSERT INTO `reply_message` (`id`, `name`, `subject`, `content`, `date`, `reply_id`) VALUES
(10, 'Marie', '一起去排隊', '我要一起去排隊, 時間和地點呢?', '2019-12-17 02:25:56', 28),
(11, '小丸子', '時間和地點', '12/25中午12:00在西門町紅樓門口', '2019-12-17 02:27:55', 27),
(12, '阿山', '貓咪', '喵喵喵', '2020-07-10 09:09:28', 39),
(13, '阿凱', '求解 小貓的行為如何改善', '吃飯', '2020-07-16 08:06:09', 43),
(14, '阿凱', '求解 小貓的行為如何改善', '找東西吃', '2020-07-16 08:10:49', 43);
=======
>>>>>>> d754ff917e6642f3613967f597137f8dda824489:data/album (1).sql

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
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`);

--
-- 資料表索引 `reply_message`
--
ALTER TABLE `reply_message`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;
<<<<<<< HEAD:data/album.sql

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `reply_message`
--
ALTER TABLE `reply_message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
=======
>>>>>>> d754ff917e6642f3613967f597137f8dda824489:data/album (1).sql

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
