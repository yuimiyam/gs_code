-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: 2019 年 2 月 07 日 14:15
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
-- テーブルの構造 `gs_shop_table`
--

CREATE TABLE `gs_shop_table` (
  `id` int(12) NOT NULL,
  `shopName` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `image` mediumblob,
  `rate` int(1) NOT NULL,
  `access` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `shopGenre` int(1) NOT NULL,
  `shopComment` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `businessHour` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `budget` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_shop_table`
--

INSERT INTO `gs_shop_table` (`id`, `shopName`, `image`, `rate`, `access`, `shopGenre`, `shopComment`, `businessHour`, `budget`) VALUES
(1, '虎ノ門バーガー', NULL, 4, '東京都港区1-1-1', 4, '虎ノ門にオープンした待望の逆輸入バーガー！！\r\n「虎ノ門アトミックチーズバーガー」は、一度食べたらその中毒性から依存症になってしまうというファンを量産。もはや危険です。\r\nカジュアルなデートから、ファミリー、おひとりさままで、来るもの拒まず！', '11:00〜23:30', 'ランチ：￥1,000〜2,000\r\nディナー：￥2,000〜4,000'),
(2, '虎ノ門ラーメン', NULL, 2, '東京都千代田区234-3234', 2, '横浜家系にインスピレーションを受けた虎ノ門のご当地ラーメン！\r\n家系にインスピレーションを受けたと言いつつ、虎ノ門謹製という矛盾をもつ頑固親父との絡みも楽しめます！', '10:30〜(スープなくなり次第終了)', '￥1,000〜2,000'),
(3, '霞ヶ関食堂', NULL, 3, '東京都千代田区霞ヶ関３−２−５', 0, ' 霞ヶ関のサラリーマンを胃袋を満たす、創業４０年の老舗。\r\nご飯大盛り無料で、500円からのランチは新入社員にも大人気です☆\r\n飲み会の貸切も、承っております！', 'ランチ：11:30~14:00\r\nディナー：17:30~22:00', 'ランチ：￥500~1,000\r\nディナー：￥1,000〜3,000');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `genre` int(1) NOT NULL COMMENT '好きな料理のジャンル',
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `charge` int(1) NOT NULL DEFAULT '0' COMMENT '一般ユーザーは0、プレミアムユーザーは1、アルティメットプラチナユーザーは2',
  `life_flg` int(1) NOT NULL DEFAULT '0' COMMENT '生きてるアカウントは0, 死んでるアカウントは1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `email`, `genre`, `lid`, `lpw`, `charge`, `life_flg`) VALUES
(17, 'Freddy', 'freddy@', 5, 'freddy', '$2y$10$1i0vq1SUCzd7QiZi0SEcduXn4VtxXnQrs4sbUZvZAoLl58Vvh3ql.', 2, 0),
(18, 'Sonny', 'sonny@', 3, 'sonny', '$2y$10$7XrDkQe1HL8RbJvvkSp5POO2HYMyJfDGFHLNJ.TQOeBVYNn8MHDJG', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_shop_table`
--
ALTER TABLE `gs_shop_table`
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
-- AUTO_INCREMENT for table `gs_shop_table`
--
ALTER TABLE `gs_shop_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
