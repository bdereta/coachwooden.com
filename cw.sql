/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST (QUAD)
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : coachwooden

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2014-08-27 16:00:17
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
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of acos
-- ----------------------------
INSERT INTO `acos` VALUES ('1', null, null, null, 'controllers', '1', '140');
INSERT INTO `acos` VALUES ('8', '1', null, null, 'Pages', '2', '15');
INSERT INTO `acos` VALUES ('20', '1', null, null, 'StaticPages', '16', '29');
INSERT INTO `acos` VALUES ('21', '20', null, null, 'home', '17', '18');
INSERT INTO `acos` VALUES ('33', '1', null, null, 'AclExtras', '30', '31');
INSERT INTO `acos` VALUES ('34', '1', null, null, 'Bambla', '32', '97');
INSERT INTO `acos` VALUES ('35', '34', null, null, 'Files', '33', '36');
INSERT INTO `acos` VALUES ('36', '35', null, null, 'upload', '34', '35');
INSERT INTO `acos` VALUES ('37', '34', null, null, 'JASFinder', '37', '40');
INSERT INTO `acos` VALUES ('38', '37', null, null, 'connector', '38', '39');
INSERT INTO `acos` VALUES ('39', '1', null, null, 'ReuseFileCache', '98', '99');
INSERT INTO `acos` VALUES ('40', '1', null, null, 'Twitter', '100', '101');
INSERT INTO `acos` VALUES ('59', '1', null, null, 'Facebook', '102', '103');
INSERT INTO `acos` VALUES ('60', '1', null, null, 'Instagram', '104', '105');
INSERT INTO `acos` VALUES ('73', '1', null, null, 'DebugKit', '106', '113');
INSERT INTO `acos` VALUES ('74', '73', null, null, 'ToolbarAccess', '107', '112');
INSERT INTO `acos` VALUES ('75', '74', null, null, 'history_state', '108', '109');
INSERT INTO `acos` VALUES ('76', '74', null, null, 'sql_explain', '110', '111');
INSERT INTO `acos` VALUES ('97', '1', null, null, 'Youtube', '114', '115');
INSERT INTO `acos` VALUES ('98', '1', null, null, 'PhotoGalleries', '116', '127');
INSERT INTO `acos` VALUES ('99', '98', null, null, 'admin_index', '117', '118');
INSERT INTO `acos` VALUES ('100', '98', null, null, 'admin_view', '119', '120');
INSERT INTO `acos` VALUES ('101', '98', null, null, 'admin_add', '121', '122');
INSERT INTO `acos` VALUES ('102', '98', null, null, 'admin_edit', '123', '124');
INSERT INTO `acos` VALUES ('103', '98', null, null, 'admin_delete', '125', '126');
INSERT INTO `acos` VALUES ('104', '20', null, null, 'blackhole', '19', '20');
INSERT INTO `acos` VALUES ('105', '20', null, null, 'scrapbook', '21', '22');
INSERT INTO `acos` VALUES ('106', '20', null, null, 'bill_walton_speaks', '23', '24');
INSERT INTO `acos` VALUES ('107', '20', null, null, 'favorite_maxims', '25', '26');
INSERT INTO `acos` VALUES ('108', '20', null, null, 'mcdonalds_all_american_game', '27', '28');
INSERT INTO `acos` VALUES ('110', '1', null, null, 'Captcha', '128', '133');
INSERT INTO `acos` VALUES ('111', '110', null, null, 'Captcha', '129', '132');
INSERT INTO `acos` VALUES ('112', '111', null, null, 'get_image', '130', '131');
INSERT INTO `acos` VALUES ('113', '8', null, null, 'blackhole', '3', '4');
INSERT INTO `acos` VALUES ('114', '8', null, null, 'home', '5', '6');
INSERT INTO `acos` VALUES ('115', '8', null, null, 'scrapbook', '7', '8');
INSERT INTO `acos` VALUES ('116', '8', null, null, 'bill_walton_speaks', '9', '10');
INSERT INTO `acos` VALUES ('117', '8', null, null, 'favorite_maxims', '11', '12');
INSERT INTO `acos` VALUES ('118', '8', null, null, 'mcdonalds_all_american_game', '13', '14');
INSERT INTO `acos` VALUES ('119', '34', null, null, 'Groups', '41', '52');
INSERT INTO `acos` VALUES ('120', '119', null, null, 'admin_index', '42', '43');
INSERT INTO `acos` VALUES ('121', '119', null, null, 'admin_view', '44', '45');
INSERT INTO `acos` VALUES ('122', '119', null, null, 'admin_add', '46', '47');
INSERT INTO `acos` VALUES ('123', '119', null, null, 'admin_edit', '48', '49');
INSERT INTO `acos` VALUES ('124', '119', null, null, 'admin_delete', '50', '51');
INSERT INTO `acos` VALUES ('125', '34', null, null, 'Metadata', '53', '64');
INSERT INTO `acos` VALUES ('126', '125', null, null, 'admin_index', '54', '55');
INSERT INTO `acos` VALUES ('127', '125', null, null, 'admin_view', '56', '57');
INSERT INTO `acos` VALUES ('128', '125', null, null, 'admin_add', '58', '59');
INSERT INTO `acos` VALUES ('129', '125', null, null, 'admin_edit', '60', '61');
INSERT INTO `acos` VALUES ('130', '125', null, null, 'admin_delete', '62', '63');
INSERT INTO `acos` VALUES ('131', '34', null, null, 'Sections', '65', '76');
INSERT INTO `acos` VALUES ('132', '131', null, null, 'admin_index', '66', '67');
INSERT INTO `acos` VALUES ('133', '131', null, null, 'admin_view', '68', '69');
INSERT INTO `acos` VALUES ('134', '131', null, null, 'admin_add', '70', '71');
INSERT INTO `acos` VALUES ('135', '131', null, null, 'admin_edit', '72', '73');
INSERT INTO `acos` VALUES ('136', '131', null, null, 'admin_delete', '74', '75');
INSERT INTO `acos` VALUES ('137', '34', null, null, 'Users', '77', '96');
INSERT INTO `acos` VALUES ('138', '137', null, null, 'blackhole', '78', '79');
INSERT INTO `acos` VALUES ('139', '137', null, null, 'admin_index', '80', '81');
INSERT INTO `acos` VALUES ('140', '137', null, null, 'admin_view', '82', '83');
INSERT INTO `acos` VALUES ('141', '137', null, null, 'admin_add', '84', '85');
INSERT INTO `acos` VALUES ('142', '137', null, null, 'admin_edit', '86', '87');
INSERT INTO `acos` VALUES ('143', '137', null, null, 'admin_delete', '88', '89');
INSERT INTO `acos` VALUES ('144', '137', null, null, 'admin_login', '90', '91');
INSERT INTO `acos` VALUES ('145', '137', null, null, 'admin_logout', '92', '93');
INSERT INTO `acos` VALUES ('146', '137', null, null, 'admin_setPermissions', '94', '95');
INSERT INTO `acos` VALUES ('147', '1', null, null, 'ImageTools', '134', '139');
INSERT INTO `acos` VALUES ('148', '147', null, null, 'ImageTools', '135', '138');
INSERT INTO `acos` VALUES ('149', '148', null, null, 'crop', '136', '137');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aros
-- ----------------------------
INSERT INTO `aros` VALUES ('1', null, 'Group', '1', null, '1', '8');
INSERT INTO `aros` VALUES ('2', null, 'Group', '2', null, '9', '10');
INSERT INTO `aros` VALUES ('3', null, 'Group', '3', null, '11', '14');
INSERT INTO `aros` VALUES ('4', '1', 'User', '1', null, '6', '7');
INSERT INTO `aros` VALUES ('5', '1', 'User', '2', null, '2', '3');
INSERT INTO `aros` VALUES ('6', '3', 'User', '3', null, '12', '13');
INSERT INTO `aros` VALUES ('7', '1', 'User', '1', null, '4', '5');

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
-- Table structure for photo_galleries
-- ----------------------------
DROP TABLE IF EXISTS `photo_galleries`;
CREATE TABLE `photo_galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordering_position` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `image` varchar(255) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of photo_galleries
-- ----------------------------
INSERT INTO `photo_galleries` VALUES ('1', '10', 'John Wooden with trophies', '<p>John Wooden, coach and teacher, believed that the quality of your <em>effort</em> to achieve Competitive Greatness &ndash; at the summit of his Pyramid of Success &ndash; was the ultimate goal: &ldquo;Being at your best when your best is needed.&rdquo; Gold, when gotten, is a by-product of that effort.&nbsp;</p>\r\n', '53fbb0b78a603.jpg', '2014-08-25 21:55:24', '2014-08-25 21:55:24');
INSERT INTO `photo_galleries` VALUES ('2', '20', 'Coach with brothers and Dad Joshua', '<p>1924 &ndash; The Wooden boys with their dad: Billy, Dan, Johnny, Maurice (Cat) and the man who taught John Wooden so much: Hugh Joshua Wooden. He said, &ldquo;Johnny, be true to yourself.&rdquo; The picture was taken in front the family farmhouse in Centerton, IND.</p>\r\n', '53fbb114799b7.jpg', '2014-08-25 21:57:04', '2014-08-25 21:57:04');
INSERT INTO `photo_galleries` VALUES ('3', '30', 'Painting of the Wooden farmstead', '<p>This painting was given to Coach Wooden by a friend from Martinsville, IND. According to Coach it was &ldquo;just like that&rdquo; &ndash; the Wooden farmhouse, the hog shed, the barn. No electricity, no plumbing. At night Joshua read to his boys under the light of a coal oil lamp &ndash; Longfellow, Shakespeare, the Bible.</p>\r\n', '53fbb18fbfb02.jpg', '2014-08-25 21:59:27', '2014-08-25 21:59:27');
INSERT INTO `photo_galleries` VALUES ('4', '40', '1964 chalkboard play UCLA', '<p>Coach Wooden, 1964, at UCLA&rsquo;s antiquated Men&rsquo;s Gymnasium. In <em>WOODEN: A Lifetime of Observations</em> he describes the &lsquo;hardship conditions&rsquo; he taught under at what students called &ldquo;B.O. Barn&rdquo; because of its poor ventilation. UCLA&rsquo;s first two national basketball championships were won during this time. The chalkboard is still on the wall at the Men&rsquo;s Gym.</p>\r\n', '53fbb1e5c21c2.jpg', '2014-08-25 22:00:12', '2014-08-25 22:00:12');
INSERT INTO `photo_galleries` VALUES ('5', '50', 'Coach in a toga', '<p>Jeff Wong&rsquo;s great painting for the cover of Sports Illustrated had some fun with the iconic image of the &lsquo;greatest coach of the century&rsquo; and, in the background, Bill Walton and Kareem Abdul-Jabbar. Sports Illustrated wrote, &ldquo;There&rsquo;s never been a finer coach in American sports; nor a finer man.&rdquo;</p>\r\n', '53fbb2178ecda.jpg', '2014-08-25 22:01:09', '2014-08-25 22:01:09');
INSERT INTO `photo_galleries` VALUES ('6', '60', 'Better than a national championship', '<p>Nellie Wooden gives &lsquo;John Bob&rsquo; (her nickname for John Robert Wooden) a kiss after a UCLA victory. To the ranks of great love affairs like &lsquo;Bogey and Bacall&rsquo; we can add the love between Nellie and John Bob. It was transcendent.</p>\r\n', '53fbb5409055a.jpg', '2014-08-25 22:14:39', null);
INSERT INTO `photo_galleries` VALUES ('7', '70', 'Coach\'s table at VIPS', '<p>Coach Wooden&rsquo;s favorite breakfast spot was a neighborhood diner in Encino, CA where he liked his bacon &ldquo;extra brittle&rdquo; along with a large ice tea and sweetener. Table #3 at VIP&rsquo;s Restaurant was permanently reserved for him as was a copy of the <em>Los Angeles Times</em> opened to the sports section.&nbsp;</p>\r\n', '53fbb5aa17bcd.jpg', '2014-08-25 22:16:17', null);
INSERT INTO `photo_galleries` VALUES ('8', '80', 'JW at desk with pics of piggy and the fox on wall', '<p>Coach Wooden at his UCLA desk in Kerckhoff Hall, about 1965, with pictures of his Purdue University coach, &lsquo;Piggy&rsquo; Lambert, on the wall above his right shoulder and his Martinsville High School coach, Glenn &lsquo;The Ol&rsquo; Fox&rsquo; Curtis, above his left shoulder. Between them the Pyramid of Success.</p>\r\n', '53fbb5c651fe4.jpg', '2014-08-25 22:16:49', null);
INSERT INTO `photo_galleries` VALUES ('9', '90', 'JW at mcd talking to black woman player', '<p>Coach Wooden listens to one of the McDonald&rsquo;s All American High School Basketball Games&rsquo; student-athletes in Louisville, KY. Coach was a founder of the most prestigious high school sports event in the country along with legendary high school coach Morgan Wootten. Along with McDonald&rsquo;s it emphasized the importance of &ldquo;student&rdquo; in the term &ldquo;student-athlete&rdquo;.&nbsp;</p>\r\n', '53fbb5e025eb9.jpg', '2014-08-25 22:17:14', null);
INSERT INTO `photo_galleries` VALUES ('10', '100', 'JW wheaties box', '<p>One of Coach Wooden&rsquo;s favorite photographs, by Tom Casalini, was front and center on this Wheaties box. It included a quote from Socrates and a photo in the background of Johnny Wooden and Nellie Riley as high school sweethearts at Martinsville High School in 1928.&nbsp; &nbsp;</p>\r\n', '53fbb5f7e5e71.jpg', '2014-08-25 22:17:38', null);
INSERT INTO `photo_galleries` VALUES ('11', '110', 'Leadership best seller', '<p>With the publication of <em>WOODEN on LEADERSHIP</em> (McGraw-Hill) John Wooden established himself as leader in sports whose philosophy had direct application to leadership in business. He joined the ranks of Welch, Collins, Covey and others. Accordingly, The UCLA School of Management&rsquo;s Anderson School of Business established the <em>John Wooden Global Leadership Award</em>.</p>\r\n', '53fbb6151f177.jpg', '2014-08-25 22:18:09', null);
INSERT INTO `photo_galleries` VALUES ('12', '120', 'JW on private jet ', '<p>As his stature continued to grow following his retirement and the best-selling success of his book, <em>Wooden on Leadership,</em> Coach Wooden&rsquo;s mode of travel also grew including transportation in private corporate jets by companies eager to hear him offer insights on leadership.</p>\r\n', '53fbb6362fe92.jpg', '2014-08-25 22:19:52', null);
INSERT INTO `photo_galleries` VALUES ('13', '130', 'JW huddle walton', '<p>1973 in the huddle Coach Wooden offers some ideas to his super-star All American center, Bill Walton (back to camera, right side of picture).&nbsp;</p>\r\n', '53fbb8132f7dd.jpg', '2014-08-25 22:26:31', null);
INSERT INTO `photo_galleries` VALUES ('14', '140', 'JW walton deathvalley t shrt', '<p>30 years later Bill stands next to his former coach after breakfast at VIP&rsquo;s Restaurant in Encino, CA. Three decades earlier Coach Wooden was telling Bill to shave off the beard or &ldquo;the whole team&rsquo;s gonna miss you.&rdquo;&nbsp;</p>\r\n', '53fbb82cd0bd0.jpg', '2014-08-25 22:27:01', null);
INSERT INTO `photo_galleries` VALUES ('15', '150', 'A little fellow follows me poem', '<p>In <em>The Wisdom of Wooden</em> (McGraw-Hill) Coach Wooden tells about receiving this poster in 1936 when his son, Jim, was born. The poster and message of the poem stayed with Coach the rest of the way &ndash; one of the important guides he used in life and teaching.</p>\r\n', '53fbb842e2617.jpg', '2014-08-25 22:27:23', null);
INSERT INTO `photo_galleries` VALUES ('16', '160', 'Coach with his first team of players', '<p>In 1931 as coach of the Dayton, KY Green Devils &ndash; basketball, baseball, football (very briefly) and well as Athletic Director and English teacher. This is when he began formulating his exact definition of success and the personal qualities necessary to achieve it. Ultimately it became the Pyramid of Success.&nbsp;</p>\r\n', '53fbb8642b405.jpg', '2014-08-25 22:27:58', null);
INSERT INTO `photo_galleries` VALUES ('17', '170', 'JW with South Bend players', '<p>Ten years after starting his coaching career in Dayton, KY Coach Wooden stands with his 1941 team in South Bend, Indiana. Ironically, they too were Bruins (i.e. The South Central Bears). His next stop was the U.S. Navy for WW II.&nbsp;</p>\r\n', '53fbb87bec35d.jpg', '2014-08-25 22:28:18', null);
INSERT INTO `photo_galleries` VALUES ('18', '180', 'JW in navy uniform', '<p>Lt. j.g John Wooden, 1943. He was scheduled to ship on the USS Franklin when he suffered an appendix attack and was hospitalized for several weeks. His replacement, as well as over 800 other sailors on board, were killed when Japanese aircraft attacked. The ship itself barely survived.</p>\r\n', '53fbb891e37be.jpg', '2014-08-25 22:28:40', null);
INSERT INTO `photo_galleries` VALUES ('19', '190', 'ISTC coach', '<p>When Lt. j.g Wooden returned home after the war in 1946 he saw that many of his fellow coaches didn&rsquo;t get their jobs back: &ldquo;I couldn&rsquo;t work in a school district that would do that kind of thing to ex-servicemen.&rdquo; Instead of taking his former job back at full pay he accepted an offer from Indiana State Teachers College in Lafayette, IND. Two&nbsp; years later: UCLA.</p>\r\n', '53fbb8b3f0e62.jpg', '2014-08-25 22:29:14', null);
INSERT INTO `photo_galleries` VALUES ('20', '200', 'JW angry courtside', '<p>He wasn&rsquo;t fond of this photograph because he felt it suggested emotionalism &ndash; i.e. letting emotions get out of control. &ldquo;Caged tiger&rdquo; was a description Bill Walton used to describe John Wooden during practice. Occasionally that caged tiger snarled during games.</p>\r\n', '53fbb8caa48e3.jpg', '2014-08-25 22:29:37', null);
INSERT INTO `photo_galleries` VALUES ('21', '210', 'Nat. champ team holds newspapers', '<p>&ldquo;BRUIN CAGERS &ndash; THEY&rsquo;RE NO. 1 TEAM IN NATION&rdquo;: Coach Wooden and players hold up newspapers &ndash; Tuesday, March 22, 1964 &ndash; with the banner headline proclaiming UCLA&rsquo;s first national championship: ULCA 98, Duke 83. The Bruins were 30-0: &ldquo;Perfecto&rdquo;.</p>\r\n', '53fbb8e31af51.jpg', '2014-08-25 22:30:05', null);
INSERT INTO `photo_galleries` VALUES ('22', '220', 'JW color looks into camera', '<p>At a banquet in Los Angeles in 2000 John Wooden is clearly enjoying himself. He sought neither attention nor celebrity, but when it arrived he got a kick of the process. His patience for signing autographs was legendary. At one huge book signing at UCLA a physical therapist was asked to periodically massage his right hand which was cramping.&nbsp;</p>\r\n', '53fbb9016a7b7.jpg', '2014-08-25 22:30:31', null);
INSERT INTO `photo_galleries` VALUES ('23', '230', 'JW in huddle with hazzard et al', '<p>Coach Wooden believed if he had done his job correctly during practice he could watch the actual game from up in the stands. He never tried that idea out as is evident in a huddle with Walt Hazzard, Gail Goodrich and others in about 1964.</p>\r\n', '53fbb919b8b3e.jpg', '2014-08-25 22:30:54', null);
INSERT INTO `photo_galleries` VALUES ('24', '240', 'JW holds silver cross carried in pocket EVERY game', '<p>This little silver cross was given him by his pastor just before he left for Navy duty in 1943. He subsequently carried it in his pocket for every game he ever coached. He did not carry it for good luck, &ldquo;but to remind me of who I am.&rdquo;&nbsp;</p>\r\n', '53fbb933df277.jpg', '2014-08-25 22:31:24', null);
INSERT INTO `photo_galleries` VALUES ('25', '250', 'JW kareem in chicago street', '<p>&ldquo;We had simpatico,&rdquo; Kareem Abdul-Jabbar said of his unlikely and successful relationship with Coach Wooden. &ldquo;I&rsquo;m not sure what &lsquo;simpatico&rsquo; is,&rdquo; replied Coach, &ldquo;but I think it must be good.&rdquo; They remained lifelong friends as did Coach with virtually all of his student-athletes.</p>\r\n', '53fbb94e52e5e.jpg', '2014-08-25 22:31:50', null);
INSERT INTO `photo_galleries` VALUES ('26', '260', 'JW with Greg Gumbel louisville McD games', '<p>Sportscaster Greg Gumbel with Coach Wooden during a break at the McDonald&rsquo;s All American Basketball Games. Greg is a friend and fan of Coach Wooden&rsquo;s. The feeling was reciprocal.</p>\r\n', '53fbb96bebe65.jpg', '2014-08-25 22:32:23', null);
INSERT INTO `photo_galleries` VALUES ('27', '270', 'JW pensive prior to last game ever', '<p>This photo was taken near the very end of his coaching career. He sits alone in the stands of the San Diego International Sports Arena on Monday, March 31, 1975 before the National Collegiate Basketball Championship game. UCLA beat Kentucky by 28 points. Two days earlier Coach Wooden had announced he would retire following the game.</p>\r\n', '53fbb98ce6803.jpg', '2014-08-25 22:33:04', null);
INSERT INTO `photo_galleries` VALUES ('28', '280', 'JW Purdue yearbook', '<p>Purdue University yearbook photograph about 1930. As an All American guard for the Boilermakers his nickname was the Indiana Rubber Man: &ldquo;When I got knocked down I bounced right back up.&rdquo; He got knocked down a lot because of his aggressive style of play.</p>\r\n', '53fbb9b154865.jpg', '2014-08-25 22:33:29', null);
INSERT INTO `photo_galleries` VALUES ('29', '290', 'Big Bolero', '<p>A newspaper story once described Coach Wooden as dressing as somberly as an undertaker. This changed slightly when he received a bolero tie at a banquet in North Dakota. He loved it and over subsequent years received more of them including this one &ndash; the largest of his rather large collection.&nbsp;</p>\r\n', '53fbb9cade16b.jpg', '2014-08-25 22:33:51', null);
INSERT INTO `photo_galleries` VALUES ('30', '300', 'Coach loved children', '<p>Coach Wooden loved children and wrote a best-selling book for them called <em>INCH AND MILES: The Journey To Success</em> (Perfection Learning). When readers &ndash; even small ones &ndash; asked him to autograph their copy of the book he enjoyed doing it.</p>\r\n', '53fbb9e10cae5.jpg', '2014-08-25 22:34:19', null);
INSERT INTO `photo_galleries` VALUES ('31', '310', 'IM Pyramid with Love copy', '<p>&ldquo;The only personal quality I wish I had included in The Pyramid of Success is &lsquo;Love&rsquo;,&rdquo; he told me several years ago. The publisher of <em>INCH and MILES: The Journey to Success</em> soon created one as a gift. Love, if you look closely, is the mortar between all of the blocks in the children&rsquo;s Pyramid. Coach loved it.</p>\r\n', '53fbb9fe457c5.jpg', '2014-08-25 22:34:49', null);
INSERT INTO `photo_galleries` VALUES ('32', '320', 'JW new testament', '<p>John Wooden was a man of great faith who derived both strength and inspiration from the Bible. When Lewis Alcindor (later Kareem Abdul-Jabbar) converted to Islam he was not criticized by his coach. In <em>WOODEN: A Lifetime of Observations and Reflections</em> he says on the subject of religion: Have reasons you believe in it, but always be willing to listen to others.&rdquo;&nbsp;</p>\r\n', '53fbba1d671fa.jpg', '2014-08-25 22:35:28', null);
INSERT INTO `photo_galleries` VALUES ('33', '330', 'Golden tone Socrates quote from JW table', '<p>A placard on the kitchen table summed up Coach Wooden&rsquo;s great goal in life. He believed that &ldquo;love&rdquo; was the greatest word in the English language and that if you have love in your heart you would be &ldquo;beautiful within.&rdquo;</p>\r\n', '53fbba49844de.jpg', '2014-08-25 22:36:05', null);
INSERT INTO `photo_galleries` VALUES ('34', '340', 'JW in den with basketball in lap', '<p>Coach Wooden in the den of his condo in Encino, CA. Following his death it was rebuilt to the same exact specifications at UCLA. It is on display at the J.D. Morgan Athletic Center on the campus of UCLA and draws thousands of visitors each year.</p>\r\n', '53fbba679ab27.jpg', '2014-08-25 22:36:35', null);
INSERT INTO `photo_galleries` VALUES ('35', '350', 'The Founder\'s of The McD AA Games', '<p>John Wooden and Morgan Wootten teamed with McDonalds and founded the McDonald&rsquo;s All American High School Basketball Games. Coach Wootten was a legendary teacher at DeMatha Catholic High School, Hyattsville, MA.</p>\r\n', '53fbba89b069d.jpg', '2014-08-25 22:37:08', null);
INSERT INTO `photo_galleries` VALUES ('36', '360', 'The great johnny wooden poster', '<p>Johnny Wooden, not long removed from his own high school days, on a rare poster advertising his appearance in 1931 with the Purdue All-Stars on a barnstorming tour following his graduation from college.</p>\r\n', '53fbbaae219c8.jpg', '2014-08-25 22:37:47', null);
INSERT INTO `photo_galleries` VALUES ('37', '370', 'Leans and points at ref in \'50', '<p>UCLA head basketball coach John Wooden discussing a call with a referee during a game in the 1950&rsquo;s.</p>\r\n', '53fbbad0c1c36.jpg', '2014-08-25 22:38:20', null);
INSERT INTO `photo_galleries` VALUES ('38', '380', 'Signing autographs for fans in the early 1970\'s', '<p>Some players were prickly about signing autographs for fans. Coach Wooden sternly advised them to sign when asked because &ldquo;they&rsquo;re paying you a big compliment.&rdquo; He followed his own advice.</p>\r\n', '53fbbaed661f3.jpg', '2014-08-25 22:38:45', null);
INSERT INTO `photo_galleries` VALUES ('39', '390', 'With cane', '<p>A photo I took of Coach Wooden in 2003. Both knees (and hips) had suffered great damage from racing up and down hardwood courts for decades. For as long as I knew him (15 years) he was in constant pain. The cane helped.</p>\r\n', '53fbbb0728784.jpg', '2014-08-25 22:39:10', null);
INSERT INTO `photo_galleries` VALUES ('40', '400', 'John Wooden-Stephen Danelia', '<p>One of the best photographs I&rsquo;ve seen of Coach Wooden. It was taken by a great photographer, Stephen Danelian. A picture is worth a thousand words. This one may is worth 10,000.</p>\r\n', '53fbbb1edc3e9.jpg', '2014-08-25 22:39:42', null);
INSERT INTO `photo_galleries` VALUES ('41', '410', 'JW near the end', '<p>Over the many years I worked with Coach Wooden he allowed me to take hundreds and hundreds of photographs of him. This is one of the most powerful. It was taken near the end, not long before he died on June 4, 2010. It, like Stephen Danelian&rsquo;s great photograph, tells so much.</p>\r\n', '53fbbb4081295.jpg', '2014-08-25 22:40:09', null);
INSERT INTO `photo_galleries` VALUES ('42', '420', 'JW waving hello from porch', '<p>I took this photograph in about 2001 as he waved goodbye after one of our editing sessions for a book. The porch he is on was where he would often bid his many many visitors farewell with a wave and a smile.</p>\r\n', '53fbbb5a4b527.jpg', '2014-08-25 22:40:35', null);
INSERT INTO `photo_galleries` VALUES ('43', '430', 'Pyramid of Success', '<p>John Wooden&rsquo;s Pyramid of Success for leaders. John Wooden believed we all had the capacity, to one degree or another, to be leaders in one way or another. Some are natural born, some are not. All of us, he believed, can improve our leadership skills.</p>\r\n', '53fbbb711ef68.jpg', '2014-08-25 22:40:59', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', '1', 'Boris', 'Dereta', 'boris@cubismedia.com', '995409c4f105a8994ea48791c17e7f00de9b167b', '2014-08-23 19:00:49', '2013-12-07 06:55:25');
INSERT INTO `users` VALUES ('2', '1', '1', 'Coraliz', 'Dereta', 'cora@cubismedia.com', 'dd7251e4bfc86d588887ca9b2a7b7a5123b7c4e4', '2014-01-08 10:01:39', '2013-12-07 06:55:43');
INSERT INTO `users` VALUES ('3', '1', '1', 'Bob', 'Mckammey', 'mckamey@uncommonthinking.com', '8fad70f0e06850816c8cef88da031083234906fa', '2014-08-25 19:07:06', '2014-08-25 19:07:08');
