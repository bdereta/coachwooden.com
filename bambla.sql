/*
Navicat MySQL Data Transfer

Source Server         : [dev] XAMP
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : bambla

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2014-03-04 21:34:41
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
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of acos
-- ----------------------------
INSERT INTO `acos` VALUES ('1', null, null, null, 'controllers', '1', '108');
INSERT INTO `acos` VALUES ('2', '1', null, null, 'Groups', '2', '13');
INSERT INTO `acos` VALUES ('3', '2', null, null, 'admin_index', '3', '4');
INSERT INTO `acos` VALUES ('4', '2', null, null, 'admin_view', '5', '6');
INSERT INTO `acos` VALUES ('5', '2', null, null, 'admin_add', '7', '8');
INSERT INTO `acos` VALUES ('6', '2', null, null, 'admin_edit', '9', '10');
INSERT INTO `acos` VALUES ('7', '2', null, null, 'admin_delete', '11', '12');
INSERT INTO `acos` VALUES ('8', '1', null, null, 'Pages', '14', '25');
INSERT INTO `acos` VALUES ('9', '8', null, null, 'admin_index', '15', '16');
INSERT INTO `acos` VALUES ('10', '8', null, null, 'admin_view', '17', '18');
INSERT INTO `acos` VALUES ('11', '8', null, null, 'admin_add', '19', '20');
INSERT INTO `acos` VALUES ('12', '8', null, null, 'admin_edit', '21', '22');
INSERT INTO `acos` VALUES ('13', '8', null, null, 'admin_delete', '23', '24');
INSERT INTO `acos` VALUES ('14', '1', null, null, 'Sections', '26', '37');
INSERT INTO `acos` VALUES ('15', '14', null, null, 'admin_index', '27', '28');
INSERT INTO `acos` VALUES ('16', '14', null, null, 'admin_view', '29', '30');
INSERT INTO `acos` VALUES ('17', '14', null, null, 'admin_add', '31', '32');
INSERT INTO `acos` VALUES ('18', '14', null, null, 'admin_edit', '33', '34');
INSERT INTO `acos` VALUES ('19', '14', null, null, 'admin_delete', '35', '36');
INSERT INTO `acos` VALUES ('20', '1', null, null, 'StaticPages', '38', '53');
INSERT INTO `acos` VALUES ('21', '20', null, null, 'home', '39', '40');
INSERT INTO `acos` VALUES ('22', '20', null, null, 'about', '41', '42');
INSERT INTO `acos` VALUES ('23', '20', null, null, 'contact', '43', '44');
INSERT INTO `acos` VALUES ('24', '1', null, null, 'Users', '54', '73');
INSERT INTO `acos` VALUES ('25', '24', null, null, 'admin_index', '55', '56');
INSERT INTO `acos` VALUES ('26', '24', null, null, 'admin_view', '57', '58');
INSERT INTO `acos` VALUES ('27', '24', null, null, 'admin_add', '59', '60');
INSERT INTO `acos` VALUES ('28', '24', null, null, 'admin_edit', '61', '62');
INSERT INTO `acos` VALUES ('29', '24', null, null, 'admin_delete', '63', '64');
INSERT INTO `acos` VALUES ('30', '24', null, null, 'login', '65', '66');
INSERT INTO `acos` VALUES ('31', '24', null, null, 'logout', '67', '68');
INSERT INTO `acos` VALUES ('32', '24', null, null, 'admin_setPermissions', '69', '70');
INSERT INTO `acos` VALUES ('33', '1', null, null, 'AclExtras', '74', '75');
INSERT INTO `acos` VALUES ('34', '1', null, null, 'Bambla', '76', '89');
INSERT INTO `acos` VALUES ('35', '34', null, null, 'Files', '77', '80');
INSERT INTO `acos` VALUES ('36', '35', null, null, 'upload', '78', '79');
INSERT INTO `acos` VALUES ('37', '34', null, null, 'JASFinder', '81', '84');
INSERT INTO `acos` VALUES ('38', '37', null, null, 'connector', '82', '83');
INSERT INTO `acos` VALUES ('39', '1', null, null, 'ReuseFileCache', '90', '91');
INSERT INTO `acos` VALUES ('40', '1', null, null, 'Twitter', '92', '93');
INSERT INTO `acos` VALUES ('47', '20', null, null, 'instagram', '45', '46');
INSERT INTO `acos` VALUES ('48', '20', null, null, 'twitter', '47', '48');
INSERT INTO `acos` VALUES ('49', '20', null, null, 'facebook', '49', '50');
INSERT INTO `acos` VALUES ('50', '24', null, null, 'admin_login', '71', '72');
INSERT INTO `acos` VALUES ('51', '34', null, null, 'Images', '85', '88');
INSERT INTO `acos` VALUES ('56', '51', null, null, 'crop', '86', '87');
INSERT INTO `acos` VALUES ('59', '1', null, null, 'Facebook', '94', '95');
INSERT INTO `acos` VALUES ('60', '1', null, null, 'Instagram', '96', '97');
INSERT INTO `acos` VALUES ('73', '1', null, null, 'DebugKit', '98', '105');
INSERT INTO `acos` VALUES ('74', '73', null, null, 'ToolbarAccess', '99', '104');
INSERT INTO `acos` VALUES ('75', '74', null, null, 'history_state', '100', '101');
INSERT INTO `acos` VALUES ('76', '74', null, null, 'sql_explain', '102', '103');
INSERT INTO `acos` VALUES ('96', '20', null, null, 'youtube', '51', '52');
INSERT INTO `acos` VALUES ('97', '1', null, null, 'Youtube', '106', '107');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aros
-- ----------------------------
INSERT INTO `aros` VALUES ('1', null, 'Group', '1', null, '1', '4');
INSERT INTO `aros` VALUES ('2', null, 'Group', '2', null, '5', '8');
INSERT INTO `aros` VALUES ('3', null, 'Group', '3', null, '9', '12');
INSERT INTO `aros` VALUES ('4', '2', 'User', '1', null, '6', '7');
INSERT INTO `aros` VALUES ('5', '1', 'User', '2', null, '2', '3');
INSERT INTO `aros` VALUES ('6', '3', 'User', '3', null, '10', '11');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aros_acos
-- ----------------------------
INSERT INTO `aros_acos` VALUES ('1', '1', '1', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('2', '2', '1', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('3', '2', '20', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('4', '3', '1', '-1', '-1', '-1', '-1');
INSERT INTO `aros_acos` VALUES ('5', '3', '20', '1', '1', '1', '1');

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
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
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
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES ('1', 'default', null, null, null, '2014-01-16 00:33:08', '2013-09-06 00:29:37');

-- ----------------------------
-- Table structure for sections
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
