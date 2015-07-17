-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-07-17 04:25:11
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `dish_id`, `time`, `content`) VALUES
(3, 2, 3, '2015-07-15 02:32:28', '哈哈哈哈哈'),
(4, 3, 1, '2015-07-16 02:42:57', 'yy'),
(5, 3, 1, '2015-07-16 02:43:01', '密码'),
(6, 3, 1, '2015-07-16 02:48:40', '999'),
(7, 3, 1, '2015-07-16 02:49:21', '1111'),
(8, 3, 1, '2015-07-16 02:50:24', 'yy'),
(9, 3, 1, '2015-07-15 20:55:06', '1111'),
(10, 3, 1, '2015-07-15 20:56:06', '123'),
(11, 3, 1, '2015-07-15 20:59:03', 'ji'),
(12, 3, 1, '2015-07-15 20:59:23', 'hhhhh'),
(13, 3, 1, '2015-07-15 21:05:42', 'hi'),
(14, 3, 1, '2015-07-16 03:06:38', '123'),
(15, 3, 1, '2015-07-16 03:06:47', '33333'),
(16, 3, 4, '2015-07-16 03:07:24', 'qqqqqq'),
(17, 3, 59, '2015-07-16 03:07:55', 'qqqqqq'),
(18, 3, 59, '2015-07-16 03:08:06', '11111'),
(19, 3, 3, '2015-07-16 03:09:01', 'wolaidian'),
(20, 3, 1, '2015-07-16 06:38:45', 'rrrrr'),
(26, 3, 1, '2015-07-16 07:07:49', '123'),
(27, 3, 1, '2015-07-16 07:07:58', 'qqqqqqq'),
(28, 3, 1, '2015-07-16 07:08:23', '11111111111111111111111111111111111'),
(29, 3, 1, '2015-07-16 07:09:44', '123'),
(30, 3, 1, '2015-07-16 07:09:48', 'qqqqqqq'),
(31, 3, 1, '2015-07-16 07:10:01', '23232'),
(32, 3, 3, '2015-07-16 07:10:07', '222222');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `history_order`
--

INSERT INTO `history_order` (`id`, `user_id`, `dish_id`, `time`, `reserve`) VALUES
(1, 3, 3, '2015-07-15 06:43:13', 0),
(2, 3, 60, '2015-07-15 06:43:13', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- 转存表中的数据 `menu`
--

INSERT INTO `menu` (`id`, `dishname`, `picture`, `flag`, `description`) VALUES
(1, '哈哈', 'jpg/5.jpg', 1, '飚速电饭锅啊沙发地方和那双发动机绿泥'),
(2, '呵呵额', 'jpg/2.jpg', 1, 'gavfdasknlfvgsaljd ilg'),
(3, '要是', 'jpg/3.jpg', 1, 'gsajdlfsad fs'),
(4, 'hwiaoh', '', 1, 'vasdfv阿飞VGA水电费vca'),
(59, '测试b', 'jpg/7.jpg', 0, 'a就是试试'),
(60, '测试a', 'jpg/7.jpg', 0, 'a就是试试'),
(62, '12345', 'jpg/1437098147.png', 0, '12333'),
(63, '123', 'jpg/1437098187.png', 1, '123'),
(64, '123', 'jpg/1437098223.png', 1, '123'),
(65, '123', '123', 0, '123');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `order_with_info`
--
CREATE TABLE IF NOT EXISTS `order_with_info` (
`order_id` int(8)
,`user_id` int(8)
,`username` varchar(64)
,`roomNo` varchar(5)
,`dish_id` int(8)
,`dishname` varchar(128)
,`time` timestamp
);
-- --------------------------------------------------------

--
-- 表的结构 `system_state`
--

CREATE TABLE IF NOT EXISTS `system_state` (
  `id` int(11) NOT NULL,
  `isOpen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `system_state`
--

INSERT INTO `system_state` (`id`, `isOpen`) VALUES
(1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `today_order`
--

INSERT INTO `today_order` (`id`, `user_id`, `dish_id`, `time`, `reserve`) VALUES
(1, 3, 4, '2015-07-16 05:27:25', 0),
(2, 3, 1, '2015-07-16 05:39:16', 0),
(3, 3, 59, '2015-07-16 05:39:19', 0),
(4, 3, 1, '2015-07-16 06:38:48', 0),
(5, 3, 60, '2015-07-16 06:38:52', 0),
(6, 3, 60, '2015-07-16 06:38:54', 0),
(7, 3, 60, '2015-07-16 06:38:57', 0),
(8, 3, 3, '2015-07-16 07:03:22', 0),
(9, 3, 3, '2015-07-16 07:03:30', 0),
(10, 3, 3, '2015-07-16 07:03:41', 0),
(11, 3, 3, '2015-07-16 07:10:11', 0),
(12, 3, 3, '2015-07-16 07:10:15', 0),
(13, 3, 3, '2015-07-16 07:10:18', 0),
(14, 3, 60, '2015-07-16 07:13:00', 0),
(15, 3, 4, '2015-07-17 01:15:04', 0),
(16, 3, 3, '2015-07-17 01:15:14', 0),
(17, 3, 4, '2015-07-17 01:16:20', 0),
(18, 3, 3, '2015-07-17 01:22:06', 0),
(19, 3, 59, '2015-07-17 01:22:20', 0),
(20, 3, 62, '2015-07-17 02:10:20', 0),
(21, 3, 65, '2015-07-17 02:10:24', 0),
(22, 3, 62, '2015-07-17 02:10:39', 0),
(23, 3, 65, '2015-07-17 02:11:37', 0),
(24, 3, 65, '2015-07-17 02:11:50', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `tucao`
--

INSERT INTO `tucao` (`id`, `user_id`, `time`, `content`) VALUES
(3, 3, '2015-07-16 11:59:00', '111111111111');

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
(2, '123', '123', 0, '1806'),
(3, 'yy', '$1$2.0.hb..$AuayZe.R2x50nbwlOzJAO.', 1, '204');

-- --------------------------------------------------------

--
-- 视图结构 `order_with_info`
--
DROP TABLE IF EXISTS `order_with_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_with_info` AS select `today_order`.`id` AS `order_id`,`today_order`.`user_id` AS `user_id`,`user`.`username` AS `username`,`user`.`roomNo` AS `roomNo`,`today_order`.`dish_id` AS `dish_id`,`menu`.`dishname` AS `dishname`,`today_order`.`time` AS `time` from ((`user` join `menu`) join `today_order`) where ((`user`.`id` = `today_order`.`user_id`) and (`menu`.`id` = `today_order`.`dish_id`) and (`menu`.`flag` = 0)) order by `today_order`.`id`;

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
