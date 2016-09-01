-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-08-04 06:23:17
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
-- 表的结构 `buyer`
--

CREATE TABLE `buyer` (
  `id` int(16) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `address` varchar(64) DEFAULT NULL,
  `phone_number` varchar(64) DEFAULT NULL,
  `gain` varchar(64) NOT NULL DEFAULT '0',
  `pure_gain` varchar(64) NOT NULL DEFAULT '0',
  `times` varchar(64) NOT NULL DEFAULT '0',
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `buyer`
--

INSERT INTO `buyer` (`id`, `name`, `address`, `phone_number`, `gain`, `pure_gain`, `times`, `add_time`) VALUES
(1, '常熟先科机械电子设备厂', '江苏省常熟市', '杜广好/13405540497', '', '', '', '0000-00-00 00:00:00'),
(2, '诸暨市天天发不锈钢丝经营部', '浙江省诸暨市', '15805265551', '', '', '', '0000-00-00 00:00:00'),
(3, '蓬莱广泰机械有限公司', '山东蓬莱', '15805265553', '', '', '', '0000-00-00 00:00:00'),
(4, '苏州天奇精密五金有限公司', '江苏省苏州市吴中区东山镇木东路189号', '13405540497', '', '', '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `buyer`
--
ALTER TABLE `buyer`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
