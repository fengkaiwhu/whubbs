/*
Navicat MySQL Data Transfer
Source Host     : localhost:3306
Source Database : talk
Target Host     : localhost:3306
Target Database : talk
Date: 2010-04-25 22:35:22
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user` varchar(64) NOT NULL,
  `content` varchar(1024) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', 'abc', 'fdsafsad', '2010-04-19 21:19:50');
INSERT INTO `comment` VALUES ('2', 'eee', 'afadsfdas', '2010-04-26 21:20:48');
INSERT INTO `comment` VALUES ('3', 'å‘æ’’æ—¦æ³•', 'èŒƒå¾·è¨å‘ç”Ÿ', '2010-04-25 14:32:14');
INSERT INTO `comment` VALUES ('4', 'å‘æ’’æ—¦æ³•', 'è¿˜æ˜¯æœ‰åŠžæ³•çš„å˜›', '2010-04-25 14:32:21');
INSERT INTO `comment` VALUES ('5', 'å‘µå‘µ', 'è¿˜æ˜¯æœ‰åŠžæ³•çš„å˜›å‘µå‘µ', '2010-04-25 14:32:33');
INSERT INTO `comment` VALUES ('6', 'å‘µå‘µ', 'è¿˜æ˜¯æœ‰åŠžæ³•çš„å˜›å‘µå‘µ', '2010-04-25 14:32:39');
INSERT INTO `comment` VALUES ('7', 'id', 'å‘µå‘µ', '2010-04-25 14:33:10');
