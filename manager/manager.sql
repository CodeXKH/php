/*
Navicat MySQL Data Transfer

Source Server         : php
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : manager

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-04-25 19:12:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 09:22:44', null);
INSERT INTO `admin` VALUES ('2', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 09:22:44', null);
INSERT INTO `admin` VALUES ('3', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 09:22:44', null);
INSERT INTO `admin` VALUES ('4', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 09:22:44', null);
INSERT INTO `admin` VALUES ('5', '33333', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 10:33:28', null);
INSERT INTO `admin` VALUES ('6', '33333', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 10:33:28', null);
INSERT INTO `admin` VALUES ('7', '33333', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 10:33:28', null);
INSERT INTO `admin` VALUES ('8', '33333', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 10:33:28', null);
INSERT INTO `admin` VALUES ('9', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 09:22:44', null);
INSERT INTO `admin` VALUES ('10', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 09:22:44', null);
INSERT INTO `admin` VALUES ('11', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 09:22:44', null);
INSERT INTO `admin` VALUES ('12', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 09:22:44', null);
INSERT INTO `admin` VALUES ('13', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 09:22:44', null);
INSERT INTO `admin` VALUES ('14', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 09:22:44', null);
INSERT INTO `admin` VALUES ('16', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 09:22:44', null);
INSERT INTO `admin` VALUES ('26', '66', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 10:37:02', '22');
INSERT INTO `admin` VALUES ('18', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 09:22:44', null);
INSERT INTO `admin` VALUES ('20', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 09:22:44', null);
INSERT INTO `admin` VALUES ('21', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 09:22:44', null);
INSERT INTO `admin` VALUES ('22', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-04-25 09:22:44', null);

-- ----------------------------
-- Table structure for depart
-- ----------------------------
DROP TABLE IF EXISTS `depart`;
CREATE TABLE `depart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `createTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of depart
-- ----------------------------
INSERT INTO `depart` VALUES ('1', '市场部', '2017-04-25 14:46:55');
INSERT INTO `depart` VALUES ('2', '销售部', '2017-04-25 14:47:00');
INSERT INTO `depart` VALUES ('3', '人事部', '2017-04-25 14:47:04');

-- ----------------------------
-- Table structure for info
-- ----------------------------
DROP TABLE IF EXISTS `info`;
CREATE TABLE `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departId` int(11) DEFAULT NULL,
  `people` varchar(255) DEFAULT NULL,
  `createTime` varchar(255) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `detail` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of info
-- ----------------------------
INSERT INTO `info` VALUES ('1', '1', '小张', '2017-04-25 09:22:44', '500', '方式发送方式付款什么看法没上课吗看否');
INSERT INTO `info` VALUES ('3', '3', '88', '888', '88', '88');
