-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 
-- サーバのバージョン： 5.7.24
-- PHP のバージョン: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `hha_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `money_table`
--

CREATE TABLE `money_table` (
  `id` int(12) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `balance` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `item` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `howmuch` int(8) NOT NULL,
  `indate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `money_table`
--

INSERT INTO `money_table` (`id`, `name`, `balance`, `item`, `howmuch`, `indate`) VALUES
(2, 'シータ', '支出', '食費', 1300, '2021-03-28'),
(3, '親方', '支出', '食費', 10, '2021-03-28'),
(4, 'パズー', '支出', '水道光熱費', 1300, '2021-03-28'),
(5, 'シータ', '支出', '日用雑費', 1300, '2021-03-28'),
(23, 'ドーラ', '収入', '給与', 44444, '2021-03-29'),
(24, 'シータ', '支出', '食費', 33, '2021-03-29'),
(26, 'シータ', '収入', 'ボーナス', 40000, '2021-03-29'),
(27, 'シータ', '収入', '給与', 140000, '2021-03-29'),
(35, '親方', '支出', '食費', 10000, '2021-03-30'),
(39, '親方', '支出', '食費', 502, '2021-03-30'),
(40, 'ドーラ', '収入', 'ボーナス', 500000, '2021-03-30'),
(41, 'ドーラ', '支出', 'ボーナス', 1500000, '2021-03-30'),
(45, 'パズー', '支出', '食費', 13444, '2021-03-31'),
(47, 'パズー', '収入', '給与', 333333, '2021-03-31'),
(53, 'ムスカ', '支出', '食費', 2500, '2021-03-31'),
(54, 'ムスカ', '支出', '日用雑費', 19001, '2021-03-31'),
(59, 'ムスカ', '収入', 'ボーナス', 230000, '2021-03-31'),
(60, 'ムスカ', '収入', 'その他', 550000, '2021-03-31'),
(61, 'シータ', '収入', '給与', 120000, '2021-03-31'),
(62, 'シータ', '収入', 'ボーナス', 230000, '2021-03-31'),
(63, 'シータ', '支出', '住居費', 75000, '2021-03-31'),
(64, 'シータ', '支出', '日用雑費', 23000, '2021-03-31'),
(65, 'おかみ', '収入', '給与', 210000, '2021-03-31'),
(66, 'おかみ', '支出', '水道光熱費', 90000, '2021-03-31');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `money_table`
--
ALTER TABLE `money_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `money_table`
--
ALTER TABLE `money_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
