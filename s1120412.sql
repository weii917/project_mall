-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2024 年 03 月 16 日 09:21
-- 伺服器版本： 10.3.39-MariaDB-0ubuntu0.20.04.2
-- PHP 版本： 7.4.3-4ubuntu2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `s1120412`
--

-- --------------------------------------------------------

--
-- 資料表結構 `address`
--

CREATE TABLE `address` (
  `id` int(10) NOT NULL,
  `iframe` text NOT NULL,
  `address` text NOT NULL,
  `tel` text NOT NULL,
  `timing` text NOT NULL,
  `open` text NOT NULL,
  `fb` text NOT NULL,
  `line` text NOT NULL,
  `email` text NOT NULL,
  `ig` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `address`
--

INSERT INTO `address` (`id`, `iframe`, `address`, `tel`, `timing`, `open`, `fb`, `line`, `email`, `ig`) VALUES
(1, '<iframe class=\"\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.7036493264513!2d121.41951560000001!3d25.044129299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a7bec9ad74b1%3A0xa639904a89f26435!2z5Yue5YuV6YOo5Yue5YuV5Yqb55m85bGV572y5YyX5Z-65a6c6Iqx6YeR6aas5YiG572y5rOw5bGx6IG35qWt6KiT57e05aC0!5e0!3m2!1szh-TW!2stw!4v1704804706249!5m2!1szh-TW!2stw\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '24302新北市泰山區貴子里致遠新村55之1號', '02-2901-8274  ', '09:00～21:00 ', '14:00～20:00', 'https://www.facebook.com ', '@line', '888@gmail.com', ' cat');

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` text NOT NULL,
  `pw` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`id`, `acc`, `pw`) VALUES
(2, 'root', '7890'),
(6, 'cat', 'cat'),
(9, 'admin', '1234');

-- --------------------------------------------------------

--
-- 資料表結構 `book`
--

CREATE TABLE `book` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `catname` text DEFAULT NULL,
  `datein` date DEFAULT NULL,
  `dateout` date DEFAULT NULL,
  `room` text DEFAULT NULL,
  `catnum` text DEFAULT NULL,
  `know` text DEFAULT NULL,
  `other` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `book`
--

INSERT INTO `book` (`id`, `email`, `phone`, `name`, `catname`, `datein`, `dateout`, `room`, `catnum`, `know`, `other`) VALUES
(8, 'amy@gmail.com', '123456789', 'amy', 'apple', '2024-01-05', '2024-01-07', '溫馨房', '3', 'Google搜尋', ''),
(10, 'bear@gmail.com', '555555555', 'bear', 'bob', '2024-01-08', '2024-01-09', '星空房', '3', '朋友介紹', ''),
(22, 'cat@gmail.com', '09258578', 'catmom', 'cat', '2024-01-12', '2024-01-13', '經典房', '4', 'Google搜尋', ''),
(31, '888@gmail.com', '09123456789', 'master', 'cat', '2024-01-15', '2024-01-16', '溫馨房', '2', 'Facebook', ''),
(32, '123@gmail.com', '0123456789', 'sea', 'dog', '2024-01-17', '2024-01-18', '溫馨房', '3', '是我們的老顧客', ''),
(34, 'cat@gmail.com', '09111111111', 'alice', 'alicecat', '2024-01-18', '2024-01-19', '溫馨房', '1', 'Facebook', '');

-- --------------------------------------------------------

--
-- 資料表結構 `bottom`
--

CREATE TABLE `bottom` (
  `id` int(10) NOT NULL,
  `bottom` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `bottom`
--

INSERT INTO `bottom` (`id`, `bottom`) VALUES
(1, '2024 Taishan Vocational Training  Company, Inc'),
(2, '地址：243 新北市泰山區貴子里致遠新村55之1號'),
(3, 'Tel：0229018274');

-- --------------------------------------------------------

--
-- 資料表結構 `image`
--

CREATE TABLE `image` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `image`
--

INSERT INTO `image` (`id`, `img`, `sh`) VALUES
(12, 'cat11.jpg', 1),
(14, 'cat4.jpg', 1),
(15, 'cat.jpg', 1),
(16, 'cat10.jpg', 1),
(17, 'cat11.jpg', 1),
(18, 'cat12.jpg', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text DEFAULT NULL,
  `href` text DEFAULT NULL,
  `sh` int(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `menu`
--

INSERT INTO `menu` (`id`, `text`, `href`, `sh`) VALUES
(2, '網站首頁', 'index.php', 1),
(4, '關於我們', 'index.php#item-1-us', 1),
(9, '房型介紹', 'index.php#item-2-room', 1),
(10, '住宿須知', 'index.php#item-5-news', 1),
(12, '環境介紹', 'index.php#item-4-img', 1),
(19, '聯絡我們', 'index.php#item-3-contact', 1),
(22, '線上預約', 'book.php', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `mvim`
--

CREATE TABLE `mvim` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `text` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `mvim`
--

INSERT INTO `mvim` (`id`, `img`, `text`, `sh`) VALUES
(6, 'cat13.gif', '歡迎來到貓旅館，\r\n\r\n', 1),
(7, 'cat14.gif', '歡迎來到貓旅館，\r\n一個專為您的貓咪打造溫暖的地方。\r\n', 1),
(9, 'cat4.jpg', '歡迎來到貓旅館，\r\n一個專為您的貓咪打造溫暖的地方。\r\n我們理解每一隻貓咪都是家庭的一部分，\r\n', 1),
(13, '01C03.gif', '歡迎來到貓旅館，\r\n一個專為您的貓咪打造溫暖的地方。\r\n我們理解每一隻貓咪都是家庭的一部分，\r\n因此我們致力於提供一個舒適、安全和充滿樂趣的環境。', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text DEFAULT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `news_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `news`
--

INSERT INTO `news` (`id`, `text`, `sh`, `news_id`) VALUES
(1, '預訂與取消政策：', 1, 0),
(2, '健康和疫苗要求：', 1, 0),
(3, '物品清單：', 1, 0),
(4, '日常照顧與活動：', 1, 0),
(12, '付款方式：', 1, 0),
(13, '退房規定和時間：', 1, 0),
(14, '顧客需提前最少7天預訂', 1, 1),
(15, '所有入住貓必須提供近2年內的疫苗和健康檢查記錄。', 1, 2),
(16, '點藥、擦藥及手動餵藥每日每貓收費50元', 1, 2),
(17, '餵藥器請自備', 1, 2),
(18, '若在預訂前72小時內取消，將收取50%的住宿費用作為取消費用。', 1, 1),
(19, '因快速轉換食物而易腸胃敏感者', 1, 3),
(20, '攜帶貓咪熟悉味道之物品', 1, 3),
(21, '旅館提供基本的貓砂和飼料，如果貓咪有習慣的貓砂或貓砂盆，也歡迎自備唷。', 1, 3),
(22, '會根據貓的習慣和需求調整', 1, 4),
(23, '提供每日30分鐘的活動和互動時間，如玩耍或陪伴', 1, 4),
(25, ' *額外服務（如特殊餐食或洗澡服務）需另行付費。', 1, 12),
(26, ' *付款方式：現金、信用卡或電子轉帳。', 1, 12),
(27, ' *退房時間為每日上午10:00。', 1, 13),
(28, ' *顧客需於退房時領取所有貓的物品和相關證件。', 1, 13),
(29, '評價和反饋機制：', 1, 0),
(30, '其他特殊要求：', 1, 0),
(31, '鼓勵顧客於退房後提供經驗和建議。', 1, 29),
(32, '可透過網站、電子郵件或手機應用程式提交反饋。', 1, 29),
(33, '若有特殊醫療需求或習慣，請事先通知旅館，以便提供更貼心的照顧。', 1, 30),
(62, '顧客需提供貓的主要獸醫聯絡方式和資訊。', 1, 30);

-- --------------------------------------------------------

--
-- 資料表結構 `que`
--

CREATE TABLE `que` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `count` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) NOT NULL,
  `sh` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `que`
--

INSERT INTO `que` (`id`, `text`, `count`, `subject_id`, `sh`) VALUES
(18, '你的興趣?', 12, 0, 1),
(19, '睡覺', 3, 18, 1),
(20, '打電動', 4, 18, 1),
(21, '看書', 1, 18, 1),
(22, '如和???', 5, 0, 1),
(23, 'bb', 1, 22, 1),
(24, 'cc', 2, 22, 1),
(25, 'aa', 2, 22, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `room`
--

CREATE TABLE `room` (
  `id` int(10) NOT NULL,
  `img` text NOT NULL,
  `room` text NOT NULL,
  `text` text NOT NULL,
  `sh` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `room`
--

INSERT INTO `room` (`id`, `img`, `room`, `text`, `sh`) VALUES
(1, 'cat3.jpg', '經典房', '寬 100cm * 深 145cm * 高 350cm \r\n基本舒適房型  \r\n1貓／晚 790元\r\n\r\n最多入住 : 2貓 \r\n適合幼小害羞貓咪 \r\n\r\n提供：陶瓷貓碗、實木貓碗架、 開放型貓砂盆 \r\n貓砂提供：礦砂、豆腐砂、松木砂 \r\n\r\n房間和公共空間均有24小時的雲端監控系統 \r\n二層貓跳台 供貓咪跳躍使用\r\n', 1),
(2, 'cat4.jpg', '溫馨房', '寬 155cm * 深 150cm * 高 350cm \r\n溫馨舒適  \r\n1貓／晚 990元\r\n\r\n最多入住 : 4貓\r\n適合成年活潑貓咪\r\n \r\n提供：陶瓷貓碗、實木貓碗架、 開放型貓砂盆 \r\n貓砂提供：礦砂、豆腐砂、松木砂\r\n\r\n房間和公共空間均有24小時的雲端監控系統\r\n四層貓跳台 供貓咪跳躍使用', 1),
(3, 'cat13.gif', '星空房', '寬 200cm * 深 150cm * 高 350cm\r\n獨立景觀窗  \r\n1貓／晚 1150元\r\n\r\n最多入住 : 6貓 \r\n適合家中多數貓咪 \r\n\r\n提供：陶瓷貓碗、實木貓碗架、 開放型貓砂盆\r\n貓砂提供：礦砂、豆腐砂、松木砂 \r\n\r\n房間和公共空間均有24小時的雲端監控系統\r\n四層貓跳台 供貓咪跳躍使用 \r\n有觀景窗的大家庭房，最適合多貓又各自有個性的家庭！', 1),
(7, 'cat2.jpg', 'zzzzz', 'zzzzzzzzz', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `titles`
--

CREATE TABLE `titles` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `text` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `titles`
--

INSERT INTO `titles` (`id`, `img`, `text`, `sh`) VALUES
(11, 'cat4.jpg', '最細心\r\n的照料', 0),
(12, 'cat2.jpg', '最細心\r\n的照料', 0),
(24, 'cat11.jpg', '最細心\r\n', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `total`
--

CREATE TABLE `total` (
  `id` int(10) NOT NULL,
  `total` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `total`
--

INSERT INTO `total` (`id`, `total`) VALUES
(1, 1040);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bottom`
--
ALTER TABLE `bottom`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `mvim`
--
ALTER TABLE `mvim`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `que`
--
ALTER TABLE `que`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `address`
--
ALTER TABLE `address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `book`
--
ALTER TABLE `book`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bottom`
--
ALTER TABLE `bottom`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `image`
--
ALTER TABLE `image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `mvim`
--
ALTER TABLE `mvim`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `que`
--
ALTER TABLE `que`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `room`
--
ALTER TABLE `room`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `titles`
--
ALTER TABLE `titles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `total`
--
ALTER TABLE `total`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
