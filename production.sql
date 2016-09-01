-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-08-04 06:24:35
-- 服务器版本： 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ht_finance`
--

-- --------------------------------------------------------

--
-- 表的结构 `production`
--

CREATE TABLE `production` (
  `id` int(16) NOT NULL,
  `name` text,
  `unit` varchar(64) NOT NULL DEFAULT '(单位)',
  `gain` varchar(64) NOT NULL DEFAULT '0',
  `pure_gain` varchar(64) NOT NULL DEFAULT '0',
  `times` varchar(64) NOT NULL DEFAULT '0',
  `belong` text,
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `production`
--

INSERT INTO `production` (`id`, `name`, `unit`, `gain`, `pure_gain`, `times`, `belong`, `add_time`) VALUES
(1, '310S不锈钢卷筒', '(个)', '', '', '', '', '0000-00-00 00:00:00'),
(2, '201光亮丝', '(3.9mm)', '', '', '', '', '0000-00-00 00:00:00'),
(3, '201光亮丝', '(4.0mm)', '', '', '', '', '0000-00-00 00:00:00'),
(4, '201光亮氢退丝', '(公斤)', '', '', '', '', '0000-00-00 00:00:00'),
(5, '316光圆 16mm', '(公斤)', '', '', '', '', '0000-00-00 00:00:00'),
(6, '316光圆  14mm', '(公斤)', '', '', '', '', '0000-00-00 00:00:00'),
(7, '316光圆 20mm', '(公斤)', '', '', '', '', '0000-00-00 00:00:00'),
(8, '316光圆 14*142.7mm', '(支)', '', '', '', '', '0000-00-00 00:00:00'),
(9, '316光圆 16*152.7mm', '(支)', '', '', '', '', '0000-00-00 00:00:00'),
(10, '316光圆 20*221mm', '(支)', '', '', '', '', '0000-00-00 00:00:00'),
(11, '316光圆 20*274mm', '(支)', '', '', '', '', '0000-00-00 00:00:00'),
(12, '316光圆 20*274mm', '(支)', '', '', '', '', '0000-00-00 00:00:00'),
(13, '316光圆 20*300mm', '(支)', '', '', '', '', '0000-00-00 00:00:00'),
(14, '316光圆 20*318.5mm', '(支)', '', '', '', '', '0000-00-00 00:00:00'),
(15, '316光圆 16*143mm', '(支)', '', '', '', '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `production`
--
ALTER TABLE `production`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
