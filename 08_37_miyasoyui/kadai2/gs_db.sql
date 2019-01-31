-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: 2019 年 1 月 31 日 13:22
-- サーバのバージョン： 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE `gs_an_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(3) DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `naiyou` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `age`, `email`, `Address`, `naiyou`, `indate`) VALUES
(2, '山崎', 30, 'john@gmail', NULL, 'great', '2019-01-20 08:32:15'),
(3, 'Mary', 40, 'mary1111@gmail', NULL, 'フォアfじょ', '2019-01-20 08:32:37'),
(4, 'Roger', 20, 'roger@gmail', NULL, 'very very nice!!', '2019-01-20 08:33:05'),
(6, 'test', 20, 'test@', NULL, 'fafaf', '2019-01-22 05:51:30'),
(8, '麻生', 20, 'jiro@gmail', NULL, 'jfoajfoqj', '2019-01-22 06:01:54'),
(10, 'miyaso', 10, 'yui', 'fafasfasfeae', 'sdfafavavasfasdfrar', '2019-01-22 06:18:21');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL DEFAULT '0',
  `life_flg` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'fsdfa', 'fsaf', 'wedef', 0, 0),
(2, 'mofjeo', 'DFAFDFR', 'DVASDV', 0, 1),
(3, 'aiueokakikukeko', 'ADFAP', 'FAW', 0, 1),
(4, 'famofmeo', 'mofmoejfo', 'dimfoaeifoe', 0, 1),
(5, 'fjaofjeoij', 'ojoanfoiejfo', 'j', 1, 0),
(6, 'ジジジジ', '退いjf名', '多いじょf絵も', 0, 0),
(7, 'fn9awjfoeo', 'jiofmoeifmeoij', 'ojomfiemcoe', 0, 1),
(8, 'アイウエオ', 'かきくけこ', 'さしすせそ', 0, 1),
(9, 'ファフォイっj', 'フォアsjフォエイjフォウェjフォエjフォエjフォ', 'dフォイエじょ', 0, 0),
(10, 'dwdwdw', 'DEWFDEW', 'dfwefefe', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
