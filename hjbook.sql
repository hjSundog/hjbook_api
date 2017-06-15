/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : hjbook

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-06-02 20:18:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for book
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '书籍id',
  `book_name` varchar(128) COLLATE utf8_bin NOT NULL COMMENT '书籍名称',
  `book_category` varchar(128) NOT NULL COMMENT '图书种类',
  `book_detail` varchar(128) COLLATE utf8_bin NOT NULL COMMENT '书籍简介',
  `borrowed` bit NOT NULL DEFAULT false COMMENT '图书是否被借阅',
  `create_datetime` datetime NOT NULL COMMENT '创建时间',
  `current_borrower` int(11) DEFAULT NULL COMMENT '当前用户id',
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='图书信息表';

-- ----------------------------
-- Table structure for record
-- ----------------------------
DROP TABLE IF EXISTS `record`;
CREATE TABLE `record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '借阅记录id',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `book_id` int(11) NOT NULL COMMENT '图书id',
  `status` bit NOT NULL COMMENT '借阅状态',
  `create_datetime` datetime NOT NULL COMMENT '创建时间',
  `return_datetime` datetime DEFAULT NULL COMMENT '归还时间',
  PRIMARY KEY (`record_id`),
  KEY `user_id` (`user_id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='图书借阅信息表';

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `user_name` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '用户昵称',
  `password` varchar(60) COLLATE utf8_bin NOT NULL COMMENT '密码',
  `real_name` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '真实姓名',
  `user_email` varchar(128) COLLATE utf8_bin NOT NULL COMMENT '电子邮箱地址',
  `auth` varchar(60) COLLATE utf8_bin NOT NULL DEFAULT 'undergraduate' COMMENT '身份信息',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='用户信息表';

-- ----------------------------
-- Table structure for category
-- ----------------------------
CREATE TABLE `category` (
  `category_name` varchar(128) COLLATE utf8_bin NOT NULL COMMENT '书籍种类名称',
  PRIMARY KEY (`category_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='图书种类表';

alter table book add category varchar(128) 