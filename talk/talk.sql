/*
Navicat MySQL Data Transfer
Source Host     : localhost:3306
Source Database : talk
Target Host     : localhost:3306
Target Database : talk
Date: 2010-04-25 22:35:28
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for talk
-- ----------------------------
DROP TABLE IF EXISTS `talk`;
CREATE TABLE `talk` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user` varchar(64) NOT NULL,
  `content` varchar(2024) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of talk
-- ----------------------------
INSERT INTO `talk` VALUES ('1', 'fdsa', 'aaaaaaaaaaaaaaaaaaaaaaaa', '2010-04-04 21:21:00');
INSERT INTO `talk` VALUES ('2', 'fsaf', 'bbbbbbbbbbbb', '2010-04-07 21:21:04');
INSERT INTO `talk` VALUES ('3', 'fasd', 'fasf', '2010-04-25 14:25:37');
INSERT INTO `talk` VALUES ('4', 'ä½ å¥½', 'fasffsadf', '2010-04-25 14:25:57');
INSERT INTO `talk` VALUES ('5', 'ä½†æ˜¯', 'å‘µå‘µ', '2010-04-25 14:26:13');
INSERT INTO `talk` VALUES ('6', 'ä½†æ˜¯', 'å‘µå‘µæˆ¿è´·é¦–ä»˜æ’’', '2010-04-25 14:26:52');
INSERT INTO `talk` VALUES ('7', 'ä½†æ˜¯', 'å‘µå‘µæˆ¿è´·é¦–ä»˜å‘µå‘µæˆ¿è´·é¦–ä»˜æ’’åˆ†å£«å¤§å¤«è¨æ³•æ˜¯å¦å‘µå‘µæˆ¿è´·é¦–ä»˜æ’’åˆ†å£«å¤§å¤«è¨æ³•æ˜¯å¦å‘µå‘µæˆ¿è´·é¦–ä»˜æ’’åˆ†å£«å¤§å¤«è¨æ³•æ˜¯å¦å‘µå‘µæˆ¿è´·é¦–ä»˜æ’’åˆ†å£«å¤§å¤«è¨æ³•æ˜¯å¦å‘µå‘µæˆ¿è´·é¦–ä»˜æ’’åˆ†å£«å¤§å¤«è¨æ³•æ˜¯å¦å‘µå‘µæˆ¿è´·é¦–ä»˜æ’’åˆ†å£«å¤§å¤«è¨æ³•æ˜¯å¦å‘µå‘µæˆ¿è´·é¦–ä»˜æ’’åˆ†å£«å¤§å¤«è¨æ³•æ˜¯å¦æ’’åˆ†å£«å¤§å¤«è¨æ³•æ˜¯å¦', '2010-04-25 14:27:06');
INSERT INTO `talk` VALUES ('8', 'ä½†æ˜¯', 'å‘µå‘µæˆ¿è´·é¦–ä»˜å‘µå‘µæˆ¿è´·é¦–ä»˜æ’’åˆ†å£«å¤§å¤«è¨æ³•æ˜¯å¦å‘µå‘µæˆ¿è´·é¦–ä»˜æ’’åˆ†å£«å¤§å¤«è¨æ³•æ˜¯å¦å‘µå‘µæˆ¿è´·é¦–ä»˜æ’’åˆ†å£«å¤§å¤«è¨æ³•æ˜¯å¦å‘µå‘µæˆ¿è´·é¦–ä»˜æ’’åˆ†å£«å¤§å¤«è¨æ³•æ˜¯å¦å‘µå‘µæˆ¿è´·é¦–ä»˜æ’’åˆ†å£«å¤§å¤«è¨æ³•æ˜¯å¦å‘µå‘µæˆ¿è´·é¦–ä»˜æ’’åˆ†å£«å¤§å¤«è¨æ³•æ˜¯å¦å‘µå‘µæˆ¿è´·é¦–ä»˜æ’’åˆ†å£«å¤§å¤«è¨æ³•æ˜¯å¦æ’’åˆ†å£«å¤§å¤«è¨æ³•æ˜¯å¦', '2010-04-25 14:27:17');
INSERT INTO `talk` VALUES ('9', 'èŒƒå¾·è¨', 'å‘ç”Ÿåå¯¹', '2010-04-25 14:27:52');
INSERT INTO `talk` VALUES ('10', 'èŒƒå¾·è¨', 'å‘ç”Ÿåå¯¹é£žæ´’', '2010-04-25 14:27:56');
INSERT INTO `talk` VALUES ('11', 'èŒƒå¾·è¨åˆ†', 'æˆ¿è´·é¦–ä»˜', '2010-04-25 14:28:56');
INSERT INTO `talk` VALUES ('12', 'èŒƒå¾·è¨åˆ†', 'æ³•å•†è´©', '2010-04-25 14:29:27');
INSERT INTO `talk` VALUES ('13', 'å¯Œå£«è¾¾', 'èŒƒå¾·è¨', '2010-04-25 14:29:53');
INSERT INTO `talk` VALUES ('14', 'å‘µå‘µ', 'è¿˜æ˜¯æœ‰åŠžæ³•çš„å˜›å‘µå‘µ', '2010-04-25 14:32:35');
INSERT INTO `talk` VALUES ('15', 'å‘µå‘µ', 'è¿˜æ˜¯æœ‰åŠžæ³•çš„å˜›å‘µå‘µ', '2010-04-25 14:32:41');
INSERT INTO `talk` VALUES ('16', 'id', 'fsaf ', '2010-04-25 14:33:03');
INSERT INTO `talk` VALUES ('17', 'id', 'å‘µå‘µ', '2010-04-25 14:33:07');
