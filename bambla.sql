/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST (QUAD)
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : bambla

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2014-08-23 12:44:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for acos
-- ----------------------------
DROP TABLE IF EXISTS `acos`;
CREATE TABLE `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of acos
-- ----------------------------
INSERT INTO `acos` VALUES ('1', null, null, null, 'controllers', '1', '106');
INSERT INTO `acos` VALUES ('8', '1', null, null, 'Pages', '2', '7');
INSERT INTO `acos` VALUES ('33', '1', null, null, 'AclExtras', '8', '9');
INSERT INTO `acos` VALUES ('34', '1', null, null, 'Bambla', '10', '75');
INSERT INTO `acos` VALUES ('35', '34', null, null, 'Files', '11', '14');
INSERT INTO `acos` VALUES ('36', '35', null, null, 'upload', '12', '13');
INSERT INTO `acos` VALUES ('37', '34', null, null, 'JASFinder', '15', '18');
INSERT INTO `acos` VALUES ('38', '37', null, null, 'connector', '16', '17');
INSERT INTO `acos` VALUES ('39', '1', null, null, 'ReuseFileCache', '76', '77');
INSERT INTO `acos` VALUES ('40', '1', null, null, 'Twitter', '78', '79');
INSERT INTO `acos` VALUES ('59', '1', null, null, 'Facebook', '80', '81');
INSERT INTO `acos` VALUES ('60', '1', null, null, 'Instagram', '82', '83');
INSERT INTO `acos` VALUES ('73', '1', null, null, 'DebugKit', '84', '91');
INSERT INTO `acos` VALUES ('74', '73', null, null, 'ToolbarAccess', '85', '90');
INSERT INTO `acos` VALUES ('75', '74', null, null, 'history_state', '86', '87');
INSERT INTO `acos` VALUES ('76', '74', null, null, 'sql_explain', '88', '89');
INSERT INTO `acos` VALUES ('93', '1', null, null, 'Youtube', '92', '93');
INSERT INTO `acos` VALUES ('96', '1', null, null, 'Captcha', '94', '99');
INSERT INTO `acos` VALUES ('97', '96', null, null, 'Captcha', '95', '98');
INSERT INTO `acos` VALUES ('98', '97', null, null, 'get_image', '96', '97');
INSERT INTO `acos` VALUES ('116', '8', null, null, 'blackhole', '3', '4');
INSERT INTO `acos` VALUES ('117', '8', null, null, 'home', '5', '6');
INSERT INTO `acos` VALUES ('143', '1', null, null, 'ImageTools', '100', '105');
INSERT INTO `acos` VALUES ('147', '143', null, null, 'ImageTools', '101', '104');
INSERT INTO `acos` VALUES ('148', '147', null, null, 'crop', '102', '103');
INSERT INTO `acos` VALUES ('149', '34', null, null, 'Groups', '19', '30');
INSERT INTO `acos` VALUES ('150', '149', null, null, 'admin_index', '20', '21');
INSERT INTO `acos` VALUES ('151', '149', null, null, 'admin_view', '22', '23');
INSERT INTO `acos` VALUES ('152', '149', null, null, 'admin_add', '24', '25');
INSERT INTO `acos` VALUES ('153', '149', null, null, 'admin_edit', '26', '27');
INSERT INTO `acos` VALUES ('154', '149', null, null, 'admin_delete', '28', '29');
INSERT INTO `acos` VALUES ('155', '34', null, null, 'Metadata', '31', '42');
INSERT INTO `acos` VALUES ('156', '155', null, null, 'admin_index', '32', '33');
INSERT INTO `acos` VALUES ('157', '155', null, null, 'admin_view', '34', '35');
INSERT INTO `acos` VALUES ('158', '155', null, null, 'admin_add', '36', '37');
INSERT INTO `acos` VALUES ('159', '155', null, null, 'admin_edit', '38', '39');
INSERT INTO `acos` VALUES ('160', '155', null, null, 'admin_delete', '40', '41');
INSERT INTO `acos` VALUES ('161', '34', null, null, 'Sections', '43', '54');
INSERT INTO `acos` VALUES ('162', '161', null, null, 'admin_index', '44', '45');
INSERT INTO `acos` VALUES ('163', '161', null, null, 'admin_view', '46', '47');
INSERT INTO `acos` VALUES ('164', '161', null, null, 'admin_add', '48', '49');
INSERT INTO `acos` VALUES ('165', '161', null, null, 'admin_edit', '50', '51');
INSERT INTO `acos` VALUES ('166', '161', null, null, 'admin_delete', '52', '53');
INSERT INTO `acos` VALUES ('167', '34', null, null, 'Users', '55', '74');
INSERT INTO `acos` VALUES ('168', '167', null, null, 'blackhole', '56', '57');
INSERT INTO `acos` VALUES ('169', '167', null, null, 'admin_index', '58', '59');
INSERT INTO `acos` VALUES ('170', '167', null, null, 'admin_view', '60', '61');
INSERT INTO `acos` VALUES ('171', '167', null, null, 'admin_add', '62', '63');
INSERT INTO `acos` VALUES ('172', '167', null, null, 'admin_edit', '64', '65');
INSERT INTO `acos` VALUES ('173', '167', null, null, 'admin_delete', '66', '67');
INSERT INTO `acos` VALUES ('174', '167', null, null, 'admin_login', '68', '69');
INSERT INTO `acos` VALUES ('177', '167', null, null, 'admin_setPermissions', '70', '71');
INSERT INTO `acos` VALUES ('178', '167', null, null, 'admin_logout', '72', '73');

-- ----------------------------
-- Table structure for aros
-- ----------------------------
DROP TABLE IF EXISTS `aros`;
CREATE TABLE `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aros
-- ----------------------------
INSERT INTO `aros` VALUES ('1', null, 'Group', '1', null, '1', '4');
INSERT INTO `aros` VALUES ('2', null, 'Group', '2', null, '5', '8');
INSERT INTO `aros` VALUES ('3', null, 'Group', '3', null, '9', '10');
INSERT INTO `aros` VALUES ('4', '2', 'User', '1', null, '6', '7');
INSERT INTO `aros` VALUES ('5', '1', 'User', '2', null, '2', '3');

-- ----------------------------
-- Table structure for aros_acos
-- ----------------------------
DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aros_acos
-- ----------------------------
INSERT INTO `aros_acos` VALUES ('1', '1', '1', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('2', '2', '1', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('4', '3', '1', '-1', '-1', '-1', '-1');

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'Super Admin', '2013-12-07 06:54:33', '2013-12-07 06:54:33');
INSERT INTO `groups` VALUES ('2', 'Admin', '2013-12-07 06:54:51', '2013-12-07 06:54:51');
INSERT INTO `groups` VALUES ('3', 'Subscriber', '2013-12-07 06:55:08', '2013-12-07 06:55:08');

-- ----------------------------
-- Table structure for metadata
-- ----------------------------
DROP TABLE IF EXISTS `metadata`;
CREATE TABLE `metadata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `keywords` text,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of metadata
-- ----------------------------
INSERT INTO `metadata` VALUES ('1', 'default', '', '', '', '2014-08-23 06:19:58', '2013-09-06 00:29:37');

-- ----------------------------
-- Table structure for sections
-- ----------------------------
DROP TABLE IF EXISTS `sections`;
CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `index` int(11) DEFAULT NULL,
  `content` text,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pairs` (`name`,`index`),
  KEY `page_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sections
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` char(40) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', '2', 'Boris', 'Dereta', 'boris@cubismedia.com', '995409c4f105a8994ea48791c17e7f00de9b167b', '2014-08-23 19:00:49', '2013-12-07 06:55:25');
INSERT INTO `users` VALUES ('2', '1', '1', 'Coraliz', 'Dereta', 'cora@cubismedia.com', 'dd7251e4bfc86d588887ca9b2a7b7a5123b7c4e4', '2014-01-08 10:01:39', '2013-12-07 06:55:43');
