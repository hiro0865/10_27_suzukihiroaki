-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018 年 3 月 02 日 15:03
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db10`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `profile_table`
--

CREATE TABLE IF NOT EXISTS `profile_table` (
`id` int(12) NOT NULL,
  `lid` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `instrument` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `skill` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `profile_table`
--

INSERT INTO `profile_table` (`id`, `lid`, `instrument`, `genre`, `skill`, `comment`) VALUES
(1, 'user', 'サックス', 'ジャズ', '高い', 'バップが好きです！'),
(2, 'user2', 'ピアノ', 'クラシック', '初心者', '色々な人と一緒に演奏したいです。よろしくお願いします！');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE IF NOT EXISTS `user_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'admin', 'admin', 'admin', 1, 0),
(2, 'user', 'user', 'user', 0, 0),
(3, 'user2', 'user2', 'user2', 0, 0),
(4, 'user3', 'user3', 'user3', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile_table`
--
ALTER TABLE `profile_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile_table`
--
ALTER TABLE `profile_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
