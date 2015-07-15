-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-07-15 05:12:45
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `neptune`
--

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `dish_id` int(8) NOT NULL,
  `time` timestamp NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `dish_id` (`dish_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `dish_id`, `time`, `content`) VALUES
(1, 1, 1, '2015-07-15 03:00:41', '随便特殊热天天干【p'),
(3, 2, 3, '2015-07-15 02:32:28', '哈哈哈哈哈');

-- --------------------------------------------------------

--
-- 表的结构 `history_order`
--

CREATE TABLE IF NOT EXISTS `history_order` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `dish_id` int(8) NOT NULL,
  `time` timestamp NOT NULL,
  `reserve` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `dish_id` (`dish_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `dishname` varchar(128) CHARACTER SET utf8 NOT NULL,
  `picture` varchar(256) CHARACTER SET utf8 NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- 转存表中的数据 `menu`
--

INSERT INTO `menu` (`id`, `dishname`, `picture`, `flag`, `description`) VALUES
(1, '哈哈', 'jpg/5.jpg', 0, '飚速电饭锅啊沙发地方和那双发动机绿泥'),
(2, '呵呵额', 'jpg/2.jpg', 1, 'gavfdasknlfvgsaljd ilg'),
(3, '要是', 'jpg/3.jpg', 0, 'gsajdlfsad fs'),
(4, 'hwiaoh', '', 0, 'vasdfv阿飞VGA水电费vca'),
(59, '测试b', 'jpg/7.jpg', 0, 'a就是试试'),
(60, '测试b', 'jpg/7.jpg', 0, 'a就是试试');

-- --------------------------------------------------------

--
-- 表的结构 `today_order`
--

CREATE TABLE IF NOT EXISTS `today_order` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `dish_id` int(8) NOT NULL,
  `time` timestamp NOT NULL,
  `reserve` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `dish_id` (`dish_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tucao`
--

CREATE TABLE IF NOT EXISTS `tucao` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `time` timestamp NOT NULL,
  `content` text CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) CHARACTER SET utf8 NOT NULL,
  `password` varchar(128) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `roomNo` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `isAdmin`, `roomNo`) VALUES
(1, 'yy', '123', 1, ''),
(2, '123', '123', 0, ''),
(3, 'yy', '$1$2.0.hb..$AuayZe.R2x50nbwlOzJAO.', 0, '');

--
-- 限制导出的表
--

--
-- 限制表 `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`dish_id`) REFERENCES `menu` (`id`);

--
-- 限制表 `history_order`
--
ALTER TABLE `history_order`
  ADD CONSTRAINT `history_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `history_order_ibfk_2` FOREIGN KEY (`dish_id`) REFERENCES `menu` (`id`);

--
-- 限制表 `today_order`
--
ALTER TABLE `today_order`
  ADD CONSTRAINT `today_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `today_order_ibfk_2` FOREIGN KEY (`dish_id`) REFERENCES `menu` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
