/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50619
 Source Host           : localhost
 Source Database       : clover

 Target Server Type    : MySQL
 Target Server Version : 50619
 File Encoding         : utf-8

 Date: 03/11/2015 00:21:46 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author` int(11) unsigned DEFAULT NULL,
  `topic_id` int(11) unsigned DEFAULT NULL,
  `reply_to` int(11) unsigned DEFAULT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `author` (`author`),
  KEY `topic_id` (`topic_id`),
  KEY `reply_to` (`reply_to`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`id`),
  CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`),
  CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`reply_to`) REFERENCES `comment` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `comment`
-- ----------------------------
BEGIN;
INSERT INTO `comment` VALUES ('1', '1', '3', null, '好赞！', '2015-03-09 01:37:50', '2015-03-09 01:37:50'), ('2', '2', '3', null, '好厉害！', '2015-03-09 01:39:14', '2015-03-09 01:39:14'), ('3', '3', '2', null, '兰州烧饼', '2015-03-09 01:39:21', '2015-03-09 01:39:21'), ('4', '4', '3', '3', '希望多交流', '2015-03-09 01:39:32', '2015-03-09 01:39:32'), ('7', '3', '2', null, '赞赞赞！！！', '2015-03-09 02:05:50', '2015-03-09 02:05:50');
COMMIT;

-- ----------------------------
--  Table structure for `follow`
-- ----------------------------
DROP TABLE IF EXISTS `follow`;
CREATE TABLE `follow` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `star` int(11) unsigned NOT NULL,
  `follower` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `follower` (`follower`,`star`),
  KEY `star` (`star`),
  CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`star`) REFERENCES `user` (`id`),
  CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`follower`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `follow`
-- ----------------------------
BEGIN;
INSERT INTO `follow` VALUES ('1', '2', '24', '2015-03-09 02:52:29', '2015-03-09 02:52:29'), ('2', '3', '24', '2015-03-09 02:01:00', '2015-03-09 02:01:00'), ('3', '5', '24', '2015-03-09 03:31:19', '2015-03-09 03:31:19');
COMMIT;

-- ----------------------------
--  Table structure for `like`
-- ----------------------------
DROP TABLE IF EXISTS `like`;
CREATE TABLE `like` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `topic_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `topic_id` (`topic_id`,`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `like_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `like_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `like`
-- ----------------------------
BEGIN;
INSERT INTO `like` VALUES ('4', '1', '1', '2015-03-09 14:54:59', '2015-03-09 14:54:59'), ('5', '2', '3', '2015-03-09 14:55:02', '2015-03-09 14:55:02'), ('6', '3', '5', '2015-03-09 14:55:04', '2015-03-09 14:55:04'), ('7', '3', '3', '2015-03-09 14:55:06', '2015-03-09 14:55:06'), ('9', '4', '4', '2015-03-10 13:09:34', '2015-03-10 13:09:34'), ('11', '5', '2', '2015-03-10 13:16:50', '2015-03-10 13:16:50'), ('12', '24', '1', '2015-03-10 13:09:34', '2015-03-10 13:09:34'), ('13', '24', '4', '2015-03-10 13:16:50', '2015-03-10 13:16:50');
COMMIT;

-- ----------------------------
--  Table structure for `topic`
-- ----------------------------
DROP TABLE IF EXISTS `topic`;
CREATE TABLE `topic` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `video_type` varchar(100) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `author` (`author`),
  KEY `type` (`type`),
  CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `topic`
-- ----------------------------
BEGIN;
INSERT INTO `topic` VALUES ('1', '1', '计算机体系结构', '计算机体系结构实验是传说中计算机学院挂科率最高的一门学科。那么我们今天就来讨论一些课程有关的知识点。\n邀请到研究生学长赵小明来为我们讲解。赵小明学长本科就读于复旦大学，曾任计算机体系结构实验两年的ta，拥有丰富的讲解经验。', 'image/png', null, '3', '15', '2015-03-08 17:05:35', '2015-03-08 17:05:35'), ('2', '1', '美国数模竞赛讨论', '2014年MCMICM的题目分别是马航失事事件，埃博拉病毒传播，人力资源管理以及网络结构。大家都有什么建模的想法么？ ', null, null, '1', '0', '2015-03-08 17:06:31', '2015-03-08 17:06:31'), ('3', '1', '历届获奖论文集', '一、视图切换类型介绍\n在storyboard中，segue有几种不同的类型，在iphone和ipad的开发中，segue的类型是不同的。\n在iphone中，segue有：push，modal，和custom三种不同的类型，这些类型的区别在与新页面出现的方式。\n而在ipad中，有push，modal，popover，replace和custom五种不同的类型。\nmodal 模态转换\n最常用的场景，新的场景完全盖住了旧的那个。用户无法再与上一个场景交互，除非他们先关闭这个场景。\n是在viewController中的标准切换的方式，包括淡出什么的，可以选切换动画。\nModalview:就是会弹出一个view，你只能在该view上操作，而不能切换到其他view，除非你关闭了modalview.\nModal View对应的segue type就是modal segue。\n*Modal:Transition to another scene for the purposes of completing a task.当user在弹出的modalview里操作完后，就应该dismiss the modal view scene然后切换回the originalview.\npush\n\nPush类型一般是需要头一个界面是个Navigation Controller的。\n是在navigation View Controller中下一级时使用的那种从右侧划入的方式\n*Push:Create a chain of scenes where the user can move forward or back.该segue type是和navigation viewcontrollers一起使用。\npopover(iPad only)\n\npopover 类型，就是采用浮动窗的形式把新页面展示出来\n*Popover(iPad only):Displays the scene in a pop-up “window” over top of the current view.\n\n*Replace (iPad only):\n\n替换当前scene，\nReplace the current scene with another. This is used in some specialized iPad viewcontrollers (e.g. split-view controller).\ncustom\n\n就是自定义跳转方式啦。', null, null, '2', '5', '2015-03-08 17:07:11', '2015-03-08 17:07:11'), ('4', '1', '大学英语4级', '大学英语是本科必须要过的考试。我们有幸邀请到xxx同学为我们做讲座。', null, null, '3', '10', '2015-03-08 18:28:51', '2015-03-08 18:28:51'), ('5', '1', '三叶草竞赛讨论', '三叶草我们做什么噜？求大家意见', null, null, '1', '0', '2015-03-09 00:55:07', '2015-03-09 00:55:07');
COMMIT;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(100) DEFAULT NULL,
  `score` int(11) NOT NULL DEFAULT '50',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user`
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('1', 'Jayvic', '', 'w@72yan.com', '0', '2015-03-08 03:43:33', '2015-03-08 03:43:33'), ('2', '小明', '$2y$10$Ru080plMV.jrzHuh3ib.xOOGTGY8s8oWBkfkHYN3H2IiT6GxioKzq', 'wo@ca.lei', '0', '2015-03-09 02:51:01', '2015-03-09 02:51:01'), ('3', '伟男', '$2y$10$2tV88tEI4.otDxOgBCH1EOKhuDRuo7uUE.8LcUTCC9ORML4U6Ex.C', 'a@a.a', '50', '2015-03-10 10:34:34', '2015-03-10 10:34:34'), ('4', '老赵', '$2y$10$FSMM1lJRUBHnZtZIRox0nO.pwkhxJ9S6Lh9ZhERSAXkR/S81kaYI.', 'aaaa@qq.a', '0', '2015-03-10 10:24:25', '2015-03-10 10:24:25'), ('5', '老郑', '$2y$10$67WLDQKLgkYLW3dC2N.DOO5UPah7bHP5lqepCAGXWCNRPRn7uW4BG', 'q.q.q@q.q.com', '5', '2015-03-10 10:25:54', '2015-03-10 10:25:54'), ('6', 'xiaotui', '$2y$10$nRe/YGO5RPGzCx1wcR4LPOy6JPHruFZ2JAAeGEptVhnhCl1bz19HK', '123@xx.com', '50', '2015-03-10 13:51:46', '2015-03-10 13:51:46'), ('24', 'dd ', '$2y$10$LRnREEZu14Khnxbhkb91DeibnlyHbsjjahnKrEzz.Rme7IoBlvkZa', '123456@qq.com', '50', '2015-03-10 14:46:44', '2015-03-10 14:46:44');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
