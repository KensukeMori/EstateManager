-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 
-- サーバのバージョン： 10.1.37-MariaDB
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estate`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `building`
--

CREATE TABLE `building` (
  `buildingId` int(11) NOT NULL,
  `buildingName` varchar(20) NOT NULL,
  `nearbyStation` int(11) NOT NULL,
  `distance` int(11) NOT NULL,
  `builtDay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `building`
--

INSERT INTO `building` (`buildingId`, `buildingName`, `nearbyStation`, `distance`, `builtDay`) VALUES
(1, 'レジデント東京', 1, 250, '2015-11-21'),
(2, 'コーポ四ツ谷', 7, 100, '1996-12-02'),
(3, '中野ハイツ', 14, 500, '2000-08-22'),
(4, 'レジデンシャル高円寺', 15, 380, '1998-04-12'),
(5, '三鷹荘', 20, 820, '1972-06-15');

-- --------------------------------------------------------

--
-- テーブルの構造 `resident`
--

CREATE TABLE `resident` (
  `residentId` int(11) NOT NULL,
  `residentName` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `movedDay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `resident`
--

INSERT INTO `resident` (`residentId`, `residentName`, `birthday`, `movedDay`) VALUES
(1, '山田太郎', '1995-03-05', '2018-03-10'),
(2, '佐藤次郎', '1982-05-21', '2015-08-21'),
(3, '山口修', '1967-12-29', '2012-03-21'),
(4, '鈴木花子', '1971-10-05', '2015-02-20'),
(5, 'Paul Smith', '1987-07-21', '2017-08-22'),
(6, '本田公子', '1977-03-31', '2001-12-11'),
(7, '富田三郎', '1988-08-08', '2016-12-11');

-- --------------------------------------------------------

--
-- テーブルの構造 `room`
--

CREATE TABLE `room` (
  `roomId` int(11) NOT NULL,
  `roomName` int(11) NOT NULL,
  `building` int(11) NOT NULL,
  `roomSize` float NOT NULL,
  `roomType` int(11) NOT NULL,
  `rent` float NOT NULL,
  `resident` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `room`
--

INSERT INTO `room` (`roomId`, `roomName`, `building`, `roomSize`, `roomType`, `rent`, `resident`) VALUES
(1, 801, 1, 200, 7, 100, 7),
(2, 201, 2, 22, 2, 8.2, 1),
(3, 104, 2, 24.4, 3, 8.9, 6),
(4, 302, 3, 60, 5, 20, 2),
(5, 301, 4, 40, 4, 12, 5),
(6, 102, 5, 15, 1, 5.8, 3),
(7, 202, 5, 13, 1, 5.6, 4);

-- --------------------------------------------------------

--
-- テーブルの構造 `roomtype`
--

CREATE TABLE `roomtype` (
  `roomTypeId` int(11) NOT NULL,
  `roomType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `roomtype`
--

INSERT INTO `roomtype` (`roomTypeId`, `roomType`) VALUES
(1, '1R'),
(2, '1K'),
(3, '1DK'),
(4, '1LDK'),
(5, '2LDK'),
(6, '3LDK'),
(7, '4LDK');

-- --------------------------------------------------------

--
-- テーブルの構造 `station`
--

CREATE TABLE `station` (
  `stationId` int(11) NOT NULL,
  `stationName` varchar(20) NOT NULL,
  `timeDistance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `station`
--

INSERT INTO `station` (`stationId`, `stationName`, `timeDistance`) VALUES
(1, '東京', 0),
(2, '神田', 2),
(3, '御茶ノ水', 4),
(4, '水道橋', 6),
(5, '飯田橋', 8),
(6, '市ヶ谷', 10),
(7, '四ツ谷', 12),
(8, '信濃町', 14),
(9, '千駄ヶ谷', 16),
(10, '代々木', 18),
(11, '新宿', 20),
(12, '大久保', 22),
(13, '東中野', 24),
(14, '中野', 27),
(15, '高円寺', 29),
(16, '阿佐ヶ谷', 31),
(17, '荻窪', 33),
(18, '西荻窪', 36),
(19, '吉祥寺', 38),
(20, '三鷹', 41),
(21, '武蔵境', 43),
(22, '東小金井', 45),
(23, '武蔵小金井', 48),
(24, '国分寺', 48),
(25, '西国分寺', 53),
(26, '国立', 55),
(27, '立川', 58),
(28, '日野', 61),
(29, '豊田', 64),
(30, '八王子', 69),
(31, '西八王子', 72),
(32, '高尾', 77);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`buildingId`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`residentId`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomId`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`roomTypeId`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`stationId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `buildingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `residentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `roomTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `stationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
