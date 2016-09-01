-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-08-04 06:24:12
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
-- 表的结构 `express`
--

CREATE TABLE `express` (
  `id` int(16) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `address` varchar(64) DEFAULT NULL,
  `phone_number` varchar(64) DEFAULT NULL,
  `pain` varchar(64) NOT NULL DEFAULT '0',
  `times` varchar(64) NOT NULL DEFAULT '0',
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `express`
--

INSERT INTO `express` (`id`, `name`, `address`, `phone_number`, `pain`, `times`, `add_time`) VALUES
(1, '山东专线-宋玉荣', '江苏省兴化市戴南镇', '18752655561', '', '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `express`
--
ALTER TABLE `express`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `express`
--
ALTER TABLE `express`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
