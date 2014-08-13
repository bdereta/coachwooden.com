/*
Navicat MySQL Data Transfer

Source Server         : _LOCALHOST
Source Server Version : 50614
Source Host           : localhost:3306
Source Database       : bambla

Target Server Type    : MYSQL
Target Server Version : 50614
File Encoding         : 65001

Date: 2014-08-12 17:42:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `acos`
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
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of acos
-- ----------------------------
INSERT INTO `acos` VALUES ('1', null, null, null, 'controllers', '1', '106');
INSERT INTO `acos` VALUES ('2', '1', null, null, 'Groups', '2', '13');
INSERT INTO `acos` VALUES ('3', '2', null, null, 'admin_index', '3', '4');
INSERT INTO `acos` VALUES ('4', '2', null, null, 'admin_view', '5', '6');
INSERT INTO `acos` VALUES ('5', '2', null, null, 'admin_add', '7', '8');
INSERT INTO `acos` VALUES ('6', '2', null, null, 'admin_edit', '9', '10');
INSERT INTO `acos` VALUES ('7', '2', null, null, 'admin_delete', '11', '12');
INSERT INTO `acos` VALUES ('8', '1', null, null, 'Pages', '14', '19');
INSERT INTO `acos` VALUES ('14', '1', null, null, 'Sections', '20', '31');
INSERT INTO `acos` VALUES ('15', '14', null, null, 'admin_index', '21', '22');
INSERT INTO `acos` VALUES ('16', '14', null, null, 'admin_view', '23', '24');
INSERT INTO `acos` VALUES ('17', '14', null, null, 'admin_add', '25', '26');
INSERT INTO `acos` VALUES ('18', '14', null, null, 'admin_edit', '27', '28');
INSERT INTO `acos` VALUES ('19', '14', null, null, 'admin_delete', '29', '30');
INSERT INTO `acos` VALUES ('24', '1', null, null, 'Users', '32', '53');
INSERT INTO `acos` VALUES ('25', '24', null, null, 'admin_index', '33', '34');
INSERT INTO `acos` VALUES ('26', '24', null, null, 'admin_view', '35', '36');
INSERT INTO `acos` VALUES ('27', '24', null, null, 'admin_add', '37', '38');
INSERT INTO `acos` VALUES ('28', '24', null, null, 'admin_edit', '39', '40');
INSERT INTO `acos` VALUES ('29', '24', null, null, 'admin_delete', '41', '42');
INSERT INTO `acos` VALUES ('30', '24', null, null, 'login', '43', '44');
INSERT INTO `acos` VALUES ('31', '24', null, null, 'logout', '45', '46');
INSERT INTO `acos` VALUES ('32', '24', null, null, 'admin_setPermissions', '47', '48');
INSERT INTO `acos` VALUES ('33', '1', null, null, 'AclExtras', '54', '55');
INSERT INTO `acos` VALUES ('34', '1', null, null, 'Bambla', '56', '69');
INSERT INTO `acos` VALUES ('35', '34', null, null, 'Files', '57', '60');
INSERT INTO `acos` VALUES ('36', '35', null, null, 'upload', '58', '59');
INSERT INTO `acos` VALUES ('37', '34', null, null, 'JASFinder', '61', '64');
INSERT INTO `acos` VALUES ('38', '37', null, null, 'connector', '62', '63');
INSERT INTO `acos` VALUES ('39', '1', null, null, 'ReuseFileCache', '70', '71');
INSERT INTO `acos` VALUES ('40', '1', null, null, 'Twitter', '72', '73');
INSERT INTO `acos` VALUES ('50', '24', null, null, 'admin_login', '49', '50');
INSERT INTO `acos` VALUES ('51', '34', null, null, 'Images', '65', '68');
INSERT INTO `acos` VALUES ('59', '1', null, null, 'Facebook', '74', '75');
INSERT INTO `acos` VALUES ('60', '1', null, null, 'Instagram', '76', '77');
INSERT INTO `acos` VALUES ('73', '1', null, null, 'DebugKit', '78', '85');
INSERT INTO `acos` VALUES ('74', '73', null, null, 'ToolbarAccess', '79', '84');
INSERT INTO `acos` VALUES ('75', '74', null, null, 'history_state', '80', '81');
INSERT INTO `acos` VALUES ('76', '74', null, null, 'sql_explain', '82', '83');
INSERT INTO `acos` VALUES ('93', '1', null, null, 'Youtube', '86', '87');
INSERT INTO `acos` VALUES ('95', '24', null, null, 'blackhole', '51', '52');
INSERT INTO `acos` VALUES ('96', '1', null, null, 'Captcha', '88', '93');
INSERT INTO `acos` VALUES ('97', '96', null, null, 'Captcha', '89', '92');
INSERT INTO `acos` VALUES ('98', '97', null, null, 'get_image', '90', '91');
INSERT INTO `acos` VALUES ('116', '8', null, null, 'blackhole', '15', '16');
INSERT INTO `acos` VALUES ('117', '8', null, null, 'home', '17', '18');
INSERT INTO `acos` VALUES ('124', '51', null, null, 'crop', '66', '67');
INSERT INTO `acos` VALUES ('125', '1', null, null, 'Metadata', '94', '105');
INSERT INTO `acos` VALUES ('126', '125', null, null, 'admin_index', '95', '96');
INSERT INTO `acos` VALUES ('127', '125', null, null, 'admin_view', '97', '98');
INSERT INTO `acos` VALUES ('128', '125', null, null, 'admin_add', '99', '100');
INSERT INTO `acos` VALUES ('129', '125', null, null, 'admin_edit', '101', '102');
INSERT INTO `acos` VALUES ('130', '125', null, null, 'admin_delete', '103', '104');

-- ----------------------------
-- Table structure for `aros`
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
-- Table structure for `aros_acos`
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aros_acos
-- ----------------------------
INSERT INTO `aros_acos` VALUES ('1', '1', '1', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('2', '2', '1', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('4', '3', '1', '-1', '-1', '-1', '-1');

-- ----------------------------
-- Table structure for `groups`
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
-- Table structure for `metadata`
-- ----------------------------
DROP TABLE IF EXISTS `metadata`;
CREATE TABLE `metadata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) DEFAULT NULL,
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
INSERT INTO `metadata` VALUES ('1', 'default', '', '', '', '2014-08-13 00:38:31', '2013-09-06 00:29:37');

-- ----------------------------
-- Table structure for `sections`
-- ----------------------------
DROP TABLE IF EXISTS `sections`;
CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) DEFAULT NULL,
  `index` int(11) DEFAULT NULL,
  `content` text,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pairs` (`page_name`,`index`),
  KEY `page_name` (`page_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sections
-- ----------------------------
INSERT INTO `sections` VALUES ('1', 'home', '1', '<p>First Paragraph</p>\r\n', '2014-07-31 23:18:13', '2014-07-31 23:18:13');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` char(40) NOT NULL,
  `password_retrieve_token` varchar(255) DEFAULT NULL,
  `password_retrieve_expiration` datetime DEFAULT NULL,
  `suspended` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '2', 'Boris', 'Dereta', 'boris@cubismedia.com', '995409c4f105a8994ea48791c17e7f00de9b167b', '', '2013-12-07 06:55:00', '0', '1', '2014-08-13 00:38:47', '2013-12-07 06:55:25');
INSERT INTO `users` VALUES ('2', '1', 'Coraliz', 'Dereta', 'cora@cubismedia.com', 'dd7251e4bfc86d588887ca9b2a7b7a5123b7c4e4', '', '2013-12-07 06:55:00', '0', '1', '2014-01-08 10:01:39', '2013-12-07 06:55:43');
