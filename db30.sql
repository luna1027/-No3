-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-02-03 09:30:21
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db30`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `level` int(1) UNSIGNED NOT NULL,
  `length` int(3) UNSIGNED NOT NULL,
  `ondate` date NOT NULL,
  `publish` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `directior` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `trailer` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `poster` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `directior`, `trailer`, `poster`, `intro`, `rank`, `sh`) VALUES
(2, '電能世界(改改)', 1, 100, '2023-02-03', '泰山訓練場', 'Mack', '03B01v.mp4', '03B01.png', '電能世界劇情簡介，電能世界劇情簡介。', 6, 1),
(3, '神山大冒險', 1, 80, '2023-02-03', '泰山訓練場', 'Mack', '03B02v.mp4', '03B02.png', '神山大冒險劇情簡介，神山大冒險劇情簡介，神山大冒險劇情簡介。', 5, 1),
(4, '花物語(再改改)', 2, 105, '2023-02-02', '泰山訓練場', 'Mack', '03B03v.mp4', '03B03.png', '花物語劇情簡介，花物語劇情簡介，花物語劇情簡介，花物語劇情簡介，花物語劇情簡介。', 2, 1),
(5, 'New Movie', 4, 87, '2023-02-02', 'FBI', 'who', '03B04v.mp4', '03B04.png', 'empty empty empty empty empty empty', 3, 1),
(6, '546', 3, 55, '2023-02-01', 'ss', 'dddd', '03B10v.mp4', '03B10.png', '666666666666', 7, 1),
(7, 'No.6', 4, 66, '2023-02-03', '泰山訓練場', 'who', '03B09v.mp4', '03B09.png', '奇怪的人頭', 4, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `trailer`
--

CREATE TABLE `trailer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL,
  `ani` int(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `trailer`
--

INSERT INTO `trailer` (`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES
(1, '灌籃高手', '03A01.jpg', 1, 2, 2),
(2, '阿凡達(水之道)', '03A02.jpg', 1, 3, 3),
(4, '鳩咪', '03A03.jpg', 0, 5, 1),
(6, '51522', '03A05.jpg', 0, 1, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `trailer`
--
ALTER TABLE `trailer`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `trailer`
--
ALTER TABLE `trailer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
