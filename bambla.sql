/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST (QUAD)
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : bambla

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2014-08-22 23:37:14
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
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of acos
-- ----------------------------
INSERT INTO `acos` VALUES ('1', null, null, null, 'controllers', '1', '132');
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
INSERT INTO `acos` VALUES ('34', '1', null, null, 'Bambla', '56', '65');
INSERT INTO `acos` VALUES ('35', '34', null, null, 'Files', '57', '60');
INSERT INTO `acos` VALUES ('36', '35', null, null, 'upload', '58', '59');
INSERT INTO `acos` VALUES ('37', '34', null, null, 'JASFinder', '61', '64');
INSERT INTO `acos` VALUES ('38', '37', null, null, 'connector', '62', '63');
INSERT INTO `acos` VALUES ('39', '1', null, null, 'ReuseFileCache', '66', '67');
INSERT INTO `acos` VALUES ('40', '1', null, null, 'Twitter', '68', '69');
INSERT INTO `acos` VALUES ('50', '24', null, null, 'admin_login', '49', '50');
INSERT INTO `acos` VALUES ('59', '1', null, null, 'Facebook', '70', '71');
INSERT INTO `acos` VALUES ('60', '1', null, null, 'Instagram', '72', '73');
INSERT INTO `acos` VALUES ('73', '1', null, null, 'DebugKit', '74', '81');
INSERT INTO `acos` VALUES ('74', '73', null, null, 'ToolbarAccess', '75', '80');
INSERT INTO `acos` VALUES ('75', '74', null, null, 'history_state', '76', '77');
INSERT INTO `acos` VALUES ('76', '74', null, null, 'sql_explain', '78', '79');
INSERT INTO `acos` VALUES ('93', '1', null, null, 'Youtube', '82', '83');
INSERT INTO `acos` VALUES ('95', '24', null, null, 'blackhole', '51', '52');
INSERT INTO `acos` VALUES ('96', '1', null, null, 'Captcha', '84', '89');
INSERT INTO `acos` VALUES ('97', '96', null, null, 'Captcha', '85', '88');
INSERT INTO `acos` VALUES ('98', '97', null, null, 'get_image', '86', '87');
INSERT INTO `acos` VALUES ('116', '8', null, null, 'blackhole', '15', '16');
INSERT INTO `acos` VALUES ('117', '8', null, null, 'home', '17', '18');
INSERT INTO `acos` VALUES ('125', '1', null, null, 'Metadata', '90', '101');
INSERT INTO `acos` VALUES ('126', '125', null, null, 'admin_index', '91', '92');
INSERT INTO `acos` VALUES ('127', '125', null, null, 'admin_view', '93', '94');
INSERT INTO `acos` VALUES ('128', '125', null, null, 'admin_add', '95', '96');
INSERT INTO `acos` VALUES ('129', '125', null, null, 'admin_edit', '97', '98');
INSERT INTO `acos` VALUES ('130', '125', null, null, 'admin_delete', '99', '100');
INSERT INTO `acos` VALUES ('131', '1', null, null, 'Albums', '102', '113');
INSERT INTO `acos` VALUES ('132', '131', null, null, 'admin_index', '103', '104');
INSERT INTO `acos` VALUES ('133', '131', null, null, 'admin_view', '105', '106');
INSERT INTO `acos` VALUES ('134', '131', null, null, 'admin_add', '107', '108');
INSERT INTO `acos` VALUES ('135', '131', null, null, 'admin_edit', '109', '110');
INSERT INTO `acos` VALUES ('136', '131', null, null, 'admin_delete', '111', '112');
INSERT INTO `acos` VALUES ('137', '1', null, null, 'Photos', '114', '125');
INSERT INTO `acos` VALUES ('138', '137', null, null, 'admin_index', '115', '116');
INSERT INTO `acos` VALUES ('139', '137', null, null, 'admin_view', '117', '118');
INSERT INTO `acos` VALUES ('140', '137', null, null, 'admin_add', '119', '120');
INSERT INTO `acos` VALUES ('141', '137', null, null, 'admin_edit', '121', '122');
INSERT INTO `acos` VALUES ('142', '137', null, null, 'admin_delete', '123', '124');
INSERT INTO `acos` VALUES ('143', '1', null, null, 'ImageTools', '126', '131');
INSERT INTO `acos` VALUES ('147', '143', null, null, 'ImageTools', '127', '130');
INSERT INTO `acos` VALUES ('148', '147', null, null, 'crop', '128', '129');

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
INSERT INTO `users` VALUES ('1', '1', '2', 'Boris', 'Dereta', 'boris@cubismedia.com', '995409c4f105a8994ea48791c17e7f00de9b167b', '2014-08-13 00:38:47', '2013-12-07 06:55:25');
INSERT INTO `users` VALUES ('2', '1', '1', 'Coraliz', 'Dereta', 'cora@cubismedia.com', 'dd7251e4bfc86d588887ca9b2a7b7a5123b7c4e4', '2014-01-08 10:01:39', '2013-12-07 06:55:43');
