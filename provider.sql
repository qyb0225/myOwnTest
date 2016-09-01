-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-08-04 06:24:54
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
-- 表的结构 `provider`
--

CREATE TABLE `provider` (
  `id` int(16) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `address` varchar(64) DEFAULT NULL,
  `phone_number` varchar(64) DEFAULT NULL,
  `pain` varchar(64) NOT NULL DEFAULT '0',
  `times` varchar(64) NOT NULL DEFAULT '0',
  `production` varchar(64) DEFAULT NULL,
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `provider`
--

INSERT INTO `provider` (`id`, `name`, `address`, `phone_number`, `pain`, `times`, `production`, `add_time`) VALUES
(1, '长欣卷筒', '江苏兴化市戴南镇振兴路', '13912093888', '', '', NULL, '0000-00-00 00:00:00'),
(2, '杭氏', '江苏兴化市戴南镇工业园区', '', '', '', NULL, '0000-00-00 00:00:00'),
(3, '肖三', '江苏省兴化市戴南镇人民路', '肖健/13961092768', '', '', NULL, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `provider`
--
ALTER TABLE `provider`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
