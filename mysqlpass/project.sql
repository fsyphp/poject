/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : project

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-07-23 09:12:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for after
-- ----------------------------
DROP TABLE IF EXISTS `after`;
CREATE TABLE `after` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL COMMENT '用户id',
  `orders_id` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_at` int(11) unsigned DEFAULT NULL COMMENT '创建时间',
  `static` enum('0','1','2','3') COLLATE utf8_unicode_ci DEFAULT '0' COMMENT '0正在等待审核/1审核已通过',
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of after
-- ----------------------------
INSERT INTO `after` VALUES ('5', '1', '123123123123', '1531815290', '0', '是打发打发');
INSERT INTO `after` VALUES ('6', '72', '123123123123', '1531928400', '1', '是打发打发');
INSERT INTO `after` VALUES ('9', '72', '15320479862199176602539', '1532048735', '1', '是打发打发');
INSERT INTO `after` VALUES ('10', '72', '15320498772732022666198', '1532049931', '1', '你猜啊');
INSERT INTO `after` VALUES ('11', '153', '153205725010195036166229', '1532057325', '0', 'dsfdsg');

-- ----------------------------
-- Table structure for broadcast
-- ----------------------------
DROP TABLE IF EXISTS `broadcast`;
CREATE TABLE `broadcast` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pic` char(50) CHARACTER SET utf8 NOT NULL COMMENT '轮播图片',
  `url` char(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'url链接',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of broadcast
-- ----------------------------
INSERT INTO `broadcast` VALUES ('21', '/banner_img/15b42dc6a40c451531108458.jpg', '地方大幅度', '123');
INSERT INTO `broadcast` VALUES ('22', '/banner_img/15b42dc7b0571d1531108475.jpg', '地方大幅度', '1234');
INSERT INTO `broadcast` VALUES ('23', '/banner_img/15b513ed7d61dd1532051159.jpg', '2额2321dfd', 'admin');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(18) CHARACTER SET utf8 NOT NULL COMMENT '分类名称',
  `pid` int(11) unsigned NOT NULL COMMENT '父类id',
  `path` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'pid加父类id以,间隔',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '饰品啊哈哈哈', '0', '0,');
INSERT INTO `category` VALUES ('2', '包包', '1', '0,1,');
INSERT INTO `category` VALUES ('3', '单肩包', '2', '0,1,2,');
INSERT INTO `category` VALUES ('4', '旅行箱', '2', '0,1,2,');
INSERT INTO `category` VALUES ('6', '钱包', '2', '0,1,2,');
INSERT INTO `category` VALUES ('7', '食品', '0', '0,');
INSERT INTO `category` VALUES ('8', '零食', '7', '0,7,');
INSERT INTO `category` VALUES ('9', '生鲜', '7', '0,7,');
INSERT INTO `category` VALUES ('10', '坚果/干果', '8', '0,7,8,');
INSERT INTO `category` VALUES ('11', '海鲜', '9', '0,7,9,');
INSERT INTO `category` VALUES ('12', '水果', '8', '0,7,8,');
INSERT INTO `category` VALUES ('13', '牛奶', '8', '0,7,8,');
INSERT INTO `category` VALUES ('14', '粮油干货', '0', '0,');
INSERT INTO `category` VALUES ('15', '中外名酒', '0', '0,');
INSERT INTO `category` VALUES ('16', '饼干糕点', '0', '0,');
INSERT INTO `category` VALUES ('17', '大米', '14', '0,14,');
INSERT INTO `category` VALUES ('18', '小米', '14', '0,14,');
INSERT INTO `category` VALUES ('19', '泰国香米', '17', '0,14,17,');
INSERT INTO `category` VALUES ('20', '小黑米', '18', '0,14,18,');
INSERT INTO `category` VALUES ('22', '糯米', '17', '0,14,17,');
INSERT INTO `category` VALUES ('23', '黑米', '18', '0,14,18,');
INSERT INTO `category` VALUES ('24', '白酒', '15', '0,15,');
INSERT INTO `category` VALUES ('25', '红酒', '15', '0,15,');
INSERT INTO `category` VALUES ('26', '黄酒', '15', '0,15,');
INSERT INTO `category` VALUES ('27', '五粮液', '24', '0,15,24,');
INSERT INTO `category` VALUES ('28', '海之蓝', '24', '0,15,24,');
INSERT INTO `category` VALUES ('29', '长城干红', '25', '0,15,25,');
INSERT INTO `category` VALUES ('30', '王朝干红', '25', '0,15,25,');
INSERT INTO `category` VALUES ('31', '小黄酒', '26', '0,15,26,');
INSERT INTO `category` VALUES ('32', '传统糕点', '16', '0,16,');
INSERT INTO `category` VALUES ('33', '绿豆糕', '32', '0,16,32,');
INSERT INTO `category` VALUES ('34', '麻花', '32', '0,16,32,');
INSERT INTO `category` VALUES ('35', '进口饼干', '16', '0,16,');
INSERT INTO `category` VALUES ('36', '曲奇', '35', '0,16,35,');
INSERT INTO `category` VALUES ('37', '夹心', '35', '0,16,35,');
INSERT INTO `category` VALUES ('38', '鲜花', '0', '0,');
INSERT INTO `category` VALUES ('39', '家具', '0', '0,');
INSERT INTO `category` VALUES ('40', '百货', '0', '0,');
INSERT INTO `category` VALUES ('41', '办公', '0', '0,');
INSERT INTO `category` VALUES ('42', '珠宝', '0', '0,');
INSERT INTO `category` VALUES ('44', '鞋靴', '0', '0,');
INSERT INTO `category` VALUES ('45', '学习', '0', '0,');
INSERT INTO `category` VALUES ('46', '美妆', '0', '0,');
INSERT INTO `category` VALUES ('47', '数码', '0', '0,');
INSERT INTO `category` VALUES ('48', '箱包', '0', '0,');
INSERT INTO `category` VALUES ('49', '多肉植物', '38', '0,38,');
INSERT INTO `category` VALUES ('50', '干花', '38', '0,38,');
INSERT INTO `category` VALUES ('51', '玫瑰花', '38', '0,38,');
INSERT INTO `category` VALUES ('52', '营养土', '38', '0,38,');
INSERT INTO `category` VALUES ('53', '花姵药剂', '38', '0,38,');
INSERT INTO `category` VALUES ('54', '捉蝇草', '49', '0,38,49,');
INSERT INTO `category` VALUES ('55', '鲜芦荟', '49', '0,38,49,');
INSERT INTO `category` VALUES ('56', '红玫瑰', '51', '0,38,51,');
INSERT INTO `category` VALUES ('57', '白玫瑰', '51', '0,38,51,');
INSERT INTO `category` VALUES ('58', '粉玫瑰', '51', '0,38,51,');
INSERT INTO `category` VALUES ('59', '桌子', '39', '0,39,');
INSERT INTO `category` VALUES ('60', '椅子', '39', '0,39,');
INSERT INTO `category` VALUES ('61', '衣柜', '39', '0,39,');
INSERT INTO `category` VALUES ('62', '沙发', '39', '0,39,');
INSERT INTO `category` VALUES ('63', '双人床', '39', '0,39,');
INSERT INTO `category` VALUES ('64', '干发帽', '40', '0,40,');
INSERT INTO `category` VALUES ('65', '梯子', '40', '0,40,');
INSERT INTO `category` VALUES ('66', '拖把', '40', '0,40,');
INSERT INTO `category` VALUES ('67', '浴巾', '40', '0,40,');
INSERT INTO `category` VALUES ('68', '玻璃水', '40', '0,40,');
INSERT INTO `category` VALUES ('69', '抹布', '40', '0,40,');
INSERT INTO `category` VALUES ('70', '电脑桌', '41', '0,41,');
INSERT INTO `category` VALUES ('71', '老总椅', '41', '0,41,');
INSERT INTO `category` VALUES ('72', '办公笔记', '41', '0,41,');
INSERT INTO `category` VALUES ('73', '投影仪', '41', '0,41,');
INSERT INTO `category` VALUES ('74', '打印机', '41', '0,41,');
INSERT INTO `category` VALUES ('75', '一体机', '41', '0,41,');
INSERT INTO `category` VALUES ('76', '香奈儿', '2', '0,1,2,');
INSERT INTO `category` VALUES ('77', '项链', '1', '0,1,');
INSERT INTO `category` VALUES ('78', '手镯', '1', '0,1,');
INSERT INTO `category` VALUES ('79', '戒指', '1', '0,1,');
INSERT INTO `category` VALUES ('80', '耳环', '1', '0,1,');
INSERT INTO `category` VALUES ('82', '头饰', '1', '0,1,');
INSERT INTO `category` VALUES ('83', '金项链', '77', '0,1,77,');
INSERT INTO `category` VALUES ('84', '银项链', '77', '0,1,77,');
INSERT INTO `category` VALUES ('85', '铁项链', '77', '0,1,77,');
INSERT INTO `category` VALUES ('86', '镂空项链', '77', '0,1,77,');
INSERT INTO `category` VALUES ('87', '玉镯', '78', '0,1,78,');
INSERT INTO `category` VALUES ('89', '手环', '78', '0,1,78,');
INSERT INTO `category` VALUES ('90', '手链', '78', '0,1,78,');
INSERT INTO `category` VALUES ('91', '情侣戒', '79', '0,1,79,');
INSERT INTO `category` VALUES ('92', '钻戒', '79', '0,1,79,');
INSERT INTO `category` VALUES ('93', '金戒', '79', '0,1,79,');
INSERT INTO `category` VALUES ('94', '单身戒指', '79', '0,1,79,');
INSERT INTO `category` VALUES ('95', '子母戒', '79', '0,1,79,');
INSERT INTO `category` VALUES ('96', '金耳环', '80', '0,1,80,');
INSERT INTO `category` VALUES ('97', '吊坠耳环', '80', '0,1,80,');
INSERT INTO `category` VALUES ('98', '耳钉', '80', '0,1,80,');
INSERT INTO `category` VALUES ('99', '卡通发箍', '82', '0,1,82,');
INSERT INTO `category` VALUES ('100', '头绳', '82', '0,1,82,');
INSERT INTO `category` VALUES ('101', '皮筋', '82', '0,1,82,');
INSERT INTO `category` VALUES ('102', '发卡', '82', '0,1,82,');
INSERT INTO `category` VALUES ('103', '食用油', '14', '0,14,');
INSERT INTO `category` VALUES ('104', '香油', '103', '0,14,103,');
INSERT INTO `category` VALUES ('105', '植物油', '103', '0,14,103,');
INSERT INTO `category` VALUES ('106', '橄榄油', '103', '0,14,103,');
INSERT INTO `category` VALUES ('107', '调和油', '103', '0,14,103,');
INSERT INTO `category` VALUES ('108', '色拉油', '103', '0,14,103,');
INSERT INTO `category` VALUES ('109', '杂交水稻', '17', '0,14,17,');
INSERT INTO `category` VALUES ('110', '红星小米', '18', '0,14,18,');
INSERT INTO `category` VALUES ('111', '二锅头', '24', '0,15,24,');
INSERT INTO `category` VALUES ('112', '牛栏山', '24', '0,15,24,');
INSERT INTO `category` VALUES ('113', '葡萄o酒', '25', '0,15,25,');
INSERT INTO `category` VALUES ('114', '药酒', '26', '0,15,26,');
INSERT INTO `category` VALUES ('115', '小黄人', '26', '0,15,26,');
INSERT INTO `category` VALUES ('116', '糖糕', '32', '0,16,32,');
INSERT INTO `category` VALUES ('117', '桂花糕', '32', '0,16,32,');
INSERT INTO `category` VALUES ('118', '富士牌', '52', '0,38,52,');
INSERT INTO `category` VALUES ('119', '鲍鱼', '9', '0,7,9,');
INSERT INTO `category` VALUES ('120', '鱼翅', '9', '0,7,9,');
INSERT INTO `category` VALUES ('121', '比目鱼', '9', '0,7,9,');
INSERT INTO `category` VALUES ('123', '膨化食品', '8', '0,7,8,');
INSERT INTO `category` VALUES ('124', '三只松鼠', '8', '0,7,8,');
INSERT INTO `category` VALUES ('125', '雪糕', '8', '0,7,8,');
INSERT INTO `category` VALUES ('126', '饼干', '8', '0,7,8,');
INSERT INTO `category` VALUES ('132', '服装', '0', '0,');
INSERT INTO `category` VALUES ('133', '男装', '132', '0,132,');
INSERT INTO `category` VALUES ('134', '女装', '99', '0,1,82,99,');
INSERT INTO `category` VALUES ('135', '女装', '132', '0,132,');
INSERT INTO `category` VALUES ('136', '童装', '132', '0,132,');
INSERT INTO `category` VALUES ('137', '大码女装', '135', '0,132,135,');
INSERT INTO `category` VALUES ('138', '连衣裙', '135', '0,132,135,');
INSERT INTO `category` VALUES ('139', 'T恤衫', '135', '0,132,135,');
INSERT INTO `category` VALUES ('140', '吊带裤', '135', '0,132,135,');
INSERT INTO `category` VALUES ('141', '蕾丝装', '135', '0,132,135,');
INSERT INTO `category` VALUES ('142', '西服', '133', '0,132,133,');
INSERT INTO `category` VALUES ('143', '休闲装', '133', '0,132,133,');
INSERT INTO `category` VALUES ('144', '远动库', '133', '0,132,133,');
INSERT INTO `category` VALUES ('145', '猪猪包', '42', '0,42,');
INSERT INTO `category` VALUES ('146', '靴子', '44', '0,44,');
INSERT INTO `category` VALUES ('147', '学习啊', '45', '0,45,');
INSERT INTO `category` VALUES ('148', '美妆啊', '46', '0,46,');
INSERT INTO `category` VALUES ('150', '包包', '48', '0,48,');
INSERT INTO `category` VALUES ('151', '数码啊', '0', '0,');
INSERT INTO `category` VALUES ('152', '乌龟', '9', '0,7,9,');

-- ----------------------------
-- Table structure for change
-- ----------------------------
DROP TABLE IF EXISTS `change`;
CREATE TABLE `change` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` char(24) COLLATE utf8_unicode_ci NOT NULL COMMENT '随机生成订单号',
  `user_id` int(11) unsigned NOT NULL COMMENT '用户主表id',
  `address_user` char(20) CHARACTER SET utf8 NOT NULL COMMENT '订单收货人',
  `address` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '订单地址',
  `orders_at` int(11) unsigned NOT NULL COMMENT '订单创建时间',
  `orders_tel` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '收货人电话',
  `orders_msg` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '订单留言',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品总价',
  `static` tinyint(4) NOT NULL DEFAULT '0' COMMENT '物流状态 0等待商家发货/1已发货/2已收货',
  `int_id` int(10) unsigned NOT NULL,
  `deliver` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of change
-- ----------------------------
INSERT INTO `change` VALUES ('1', '15321567717791686529144', '160', '嘿嘿', '北京昌平昌平 育荣教育园区', '1532156771', '17610588082', null, '0.00', '0', '11', '1');

-- ----------------------------
-- Table structure for collect
-- ----------------------------
DROP TABLE IF EXISTS `collect`;
CREATE TABLE `collect` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `gid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of collect
-- ----------------------------
INSERT INTO `collect` VALUES ('2', '139', '6');
INSERT INTO `collect` VALUES ('3', '139', '7');
INSERT INTO `collect` VALUES ('4', '139', '8');
INSERT INTO `collect` VALUES ('5', '139', '9');
INSERT INTO `collect` VALUES ('6', '139', '10');
INSERT INTO `collect` VALUES ('7', '139', '11');
INSERT INTO `collect` VALUES ('8', '139', '12');
INSERT INTO `collect` VALUES ('10', '72', '5');
INSERT INTO `collect` VALUES ('13', '72', '12');
INSERT INTO `collect` VALUES ('15', '72', '2');
INSERT INTO `collect` VALUES ('16', '72', '25');
INSERT INTO `collect` VALUES ('18', '72', '33');
INSERT INTO `collect` VALUES ('19', '153', '6');
INSERT INTO `collect` VALUES ('21', '153', '2');
INSERT INTO `collect` VALUES ('22', '153', '3');
INSERT INTO `collect` VALUES ('23', '153', '9');
INSERT INTO `collect` VALUES ('25', '160', '11');

-- ----------------------------
-- Table structure for friendship
-- ----------------------------
DROP TABLE IF EXISTS `friendship`;
CREATE TABLE `friendship` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) CHARACTER SET utf8 NOT NULL COMMENT '内容',
  `url` char(50) CHARACTER SET utf8 NOT NULL COMMENT '友情链接url',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of friendship
-- ----------------------------
INSERT INTO `friendship` VALUES ('2', '腾讯', 'https://www.qq.com');
INSERT INTO `friendship` VALUES ('3', '淘宝', 'https://www.taobao.com');
INSERT INTO `friendship` VALUES ('4', '天猫', 'https://www.TMall.com');
INSERT INTO `friendship` VALUES ('5', '京东', 'https://www.jd.com');
INSERT INTO `friendship` VALUES ('6', '小米', 'https://www.mi.com');
INSERT INTO `friendship` VALUES ('7', '华为', 'https://www.huawei.com');
INSERT INTO `friendship` VALUES ('8', 'OPPO', 'https://www.oppo.com');
INSERT INTO `friendship` VALUES ('9', '锤子', 'https://www.smartisan.com');
INSERT INTO `friendship` VALUES ('10', '百度', 'https://www.baidu.com');
INSERT INTO `friendship` VALUES ('12', '百度', 'https://www.baidu.com');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) unsigned NOT NULL COMMENT '分类id',
  `gname` char(50) CHARACTER SET utf8 NOT NULL COMMENT '商品名称',
  `gpic` char(100) CHARACTER SET utf8 NOT NULL COMMENT '商品主图',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品价格',
  `g_static` enum('0','1','2','3') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '0秒杀抢购/1新品/2上架/3下架',
  PRIMARY KEY (`id`),
  UNIQUE KEY `gname` (`gname`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('2', '27', '贵州四大美女52度白酒礼盒装 收藏纯粮食浓香型小瓶送礼白酒整箱啊哈哈哈', '2805315311387721531138772.5884.jpg', '99.01', '2');
INSERT INTO `goods` VALUES ('3', '27', '7仓速配 莫高冰酒冰葡萄酒 冰红葡萄酒 甜葡萄酒红酒整箱6支装', '2562115311389401531138940.558.jpg', '299.00', '2');
INSERT INTO `goods` VALUES ('5', '27', '洋酒 Citadelle Gin 法国巍城金酒 杜松子酒 鸡尾酒调酒 正品包邮', '2946915311393011531139301.7198.jpg', '250.00', '2');
INSERT INTO `goods` VALUES ('6', '27', '培恩银樽龙舌兰 Patron SILVER Tequila 墨西哥原装进口洋酒 正品', '2251815311394321531139432.0693.jpg', '499.00', '1');
INSERT INTO `goods` VALUES ('7', '27', 'Born梵酒 纯米大吟酿 梵黄金瓶 1.8L 无滤过GOLD 进口日本清酒', '2256315311395621531139562.3633.jpg', '45.00', '2');
INSERT INTO `goods` VALUES ('8', '27', '进口洋酒 JOHNNE WALKER 尊尼获加蓝牌苏格兰威士忌 蓝方', '651715311396901531139690.4906.jpg', '750.00', '0');
INSERT INTO `goods` VALUES ('9', '10', '楼兰蜜语多味花生米225g零食坚果干果休闲零食香酥花生米', '1421915311418581531141858.8881.jpg', '13.00', '3');
INSERT INTO `goods` VALUES ('10', '10', '18新货开口榛子原味东北榛子开原大榛子500g包邮坚果炒货干果零食', '3121015311420691531142069.6182.jpg', '45.00', '1');
INSERT INTO `goods` VALUES ('11', '10', '新货开心果散装盐焗味500g袋装大颗粒无漂白零食坚果干果1斤包邮', '1272015311421751531142175.5723.jpg', '56.00', '1');
INSERT INTO `goods` VALUES ('12', '10', '包邮上海来伊份手剥巴西松子10包来一份坚果休闲零食干果', '2962315311422961531142296.0742.jpg', '156.00', '2');
INSERT INTO `goods` VALUES ('13', '10', '@殷宜燕的窝 无花果干干果坚果休闲零食 250g', '2281315311424181531142418.7888.jpg', '23.00', '1');
INSERT INTO `goods` VALUES ('14', '10', '原色开心果自然无漂白500g 开口 盐焗口味 坚果零食本色干果炒货', '2813315311425351531142535.8045.jpg', '50.00', '0');
INSERT INTO `goods` VALUES ('15', '10', '零食坚果碧根果长寿果炒货特产干果年货500克包邮', '2972915311427861531142786.3044.jpg', '36.00', '0');
INSERT INTO `goods` VALUES ('16', '10', '【咕噜网】半月香干果 手剥巴旦木 坚果特产 新疆薄壳壳杏仁 250g', '2187915311429341531142934.9199.jpg', '27.00', '1');
INSERT INTO `goods` VALUES ('17', '12', '泰国大目释迦果5斤 新鲜进口孕妇水果番荔枝佛头果5A包邮非台湾', '277015311434051531143405.6854.jpg', '123.00', '1');
INSERT INTO `goods` VALUES ('18', '10', '新货临安野生碎山核桃仁小核桃仁250g 罐装 坚果干果2份包邮送礼', '2849215311446141531144614.6327.jpg', '14.00', '1');
INSERT INTO `goods` VALUES ('19', '12', '王小二 桃子黄桃整箱10斤新鲜水果批发包邮当季采摘应季水密桃蜜', '1550715311449521531144952.7261.jpg', '34.00', '1');
INSERT INTO `goods` VALUES ('20', '12', '升森水果 新鲜云南蒙自甜石榴10斤 新鲜时令水果现摘现发批发包邮', '1191015311450811531145081.2925.jpg', '39.00', '1');
INSERT INTO `goods` VALUES ('21', '12', '红啤梨梨子水果批发包邮 新鲜当季整箱8斤啤酒梨 红皮梨 太婆梨10', '859215311452321531145232.2298.jpg', '37.00', '1');
INSERT INTO `goods` VALUES ('22', '12', '诗慕智利进口绿心猕猴桃新鲜水果奇异果当季非红心 约5斤现货', '2377915311454461531145446.4681.jpg', '34.00', '1');
INSERT INTO `goods` VALUES ('23', '12', '新鲜水果10斤哈密瓜白兰瓜沙漠黄金密瓜甜瓜甘肃黄河蜜瓜新疆瓜果', '3195915311455511531145551.1946.webp', '29.80', '1');
INSERT INTO `goods` VALUES ('24', '137', '大码女装胖mm新款夏2018潮短袖上衣+裤子套装200斤显瘦夏装两件套', '1148615311464191531146419.6539.jpg', '300.00', '2');
INSERT INTO `goods` VALUES ('25', '137', '素木大码女装蕾丝连衣裙女夏2018新款ins超火的运动风连帽A字裙子', '1429915311465131531146513.3863.webp', '145.00', '1');
INSERT INTO `goods` VALUES ('26', '137', '【百搭三件套】大码女装夏2018新款洋气套装胖mm短裤遮肉上衣马甲', '663415311466121531146612.063.webp', '199.00', '1');
INSERT INTO `goods` VALUES ('27', '137', '200斤胖mm连衣裙大码女装2018夏装新款学院风POLO领减龄中长T恤裙', '1166115311467221531146722.8964.jpg', '167.00', '1');
INSERT INTO `goods` VALUES ('28', '137', '特大码女装200斤胖MM夏季半袖刺绣T恤文艺范胸围130胖人套头衬衫', '654215311468351531146835.3764.webp', '76.00', '1');
INSERT INTO `goods` VALUES ('29', '141', 'surblue夏季白色蕾丝拼接吊带连衣裙女显瘦超仙露肩中长裙ulzzang', '3145415311470741531147074.7776.webp', '252.00', '1');
INSERT INTO `goods` VALUES ('30', '141', '夏装2018新款V领花边灯笼袖白色洋气蕾丝衬衫女百搭超仙上衣小衫', '762715311471981531147198.1017.webp', '167.00', '1');
INSERT INTO `goods` VALUES ('31', '141', '张大奕 蕾丝小衫夏新款女宽松灯笼袖圆领欧根纱绣花两件套上衣女', '1540915311474191531147419.839.webp', '187.00', '0');
INSERT INTO `goods` VALUES ('32', '141', '大喜自制2018新款女连衣裙夏镂空蕾丝印花吊带裙温柔裙少女超仙裙', '570115311475421531147542.1645.webp', '234.00', '1');
INSERT INTO `goods` VALUES ('33', '76', '发的发生大幅度', '253815320494531532049453.5311.png', '123.00', '0');
INSERT INTO `goods` VALUES ('34', '94', 'qwewqr', '431915320588521532058852.3069.png', '12312.00', '1');

-- ----------------------------
-- Table structure for goods_comment
-- ----------------------------
DROP TABLE IF EXISTS `goods_comment`;
CREATE TABLE `goods_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `g_id` int(11) unsigned NOT NULL COMMENT 'goods主表id',
  `user_id` int(11) unsigned NOT NULL COMMENT '用户主表id',
  `content` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '商品评价内容',
  `stars` enum('0','1','2','3','4','5') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '星级',
  `create_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of goods_comment
-- ----------------------------
INSERT INTO `goods_comment` VALUES ('1', '20', '72', '商品不错嘿嘿', '5', '2018-07-18 21:44:35');
INSERT INTO `goods_comment` VALUES ('2', '34', '72', '123456', '4', '2018-07-18 22:22:56');
INSERT INTO `goods_comment` VALUES ('3', '3', '72', '呵呵哒', '5', '2018-07-18 22:25:49');
INSERT INTO `goods_comment` VALUES ('4', '6', '72', '我是你爸爸', '5', '2018-07-18 22:40:07');
INSERT INTO `goods_comment` VALUES ('5', '6', '72', '呵呵哒', '4', '2018-07-18 22:40:32');
INSERT INTO `goods_comment` VALUES ('7', '9', '72', '还可以味道不错', '4', '2018-07-19 17:21:16');
INSERT INTO `goods_comment` VALUES ('8', '14', '72', '接口费点卡撒酒疯快点快乐说快点接口', '4', '2018-07-19 19:32:42');
INSERT INTO `goods_comment` VALUES ('9', '14', '72', 'OK电话费就撒快点接飞机都快死啦快捷回复·', '4', '2018-07-19 19:35:12');
INSERT INTO `goods_comment` VALUES ('10', '3', '72', '123456jfalksjfdlksajfdlksajfdksajfdkljsadk', '4', '2018-07-19 20:46:59');
INSERT INTO `goods_comment` VALUES ('11', '14', '72', '打发士大夫撒发生的', '4', '2018-07-20 08:54:41');
INSERT INTO `goods_comment` VALUES ('12', '14', '72', '发送到发多少', '3', '2018-07-20 08:55:47');
INSERT INTO `goods_comment` VALUES ('13', '11', '72', 'duegufdehoiufewh', '2', '2018-07-20 11:39:31');
INSERT INTO `goods_comment` VALUES ('14', '2', '153', 'jfkdsajdlfsajflkjsakfjsalkjflksajflksajfdlksa', '4', '2018-07-20 11:55:27');
INSERT INTO `goods_comment` VALUES ('17', '14', '72', '草拟麻辣隔壁', '4', '2018-07-20 14:45:57');
INSERT INTO `goods_comment` VALUES ('18', '15', '72', '欧豆豆豆豆豆豆豆豆豆豆', '5', '2018-07-20 14:47:30');
INSERT INTO `goods_comment` VALUES ('19', '14', '72', '啥打法上发生的分散', '5', '2018-07-20 14:50:37');
INSERT INTO `goods_comment` VALUES ('20', '3', '72', 'dsfdsfdsfdf', '2', '2018-07-20 14:51:54');
INSERT INTO `goods_comment` VALUES ('21', '15', '72', '哈哈哈哈哈', '3', '2018-07-21 14:23:46');
INSERT INTO `goods_comment` VALUES ('22', '15', '72', '是的发送到发', '4', '2018-07-21 14:25:25');
INSERT INTO `goods_comment` VALUES ('23', '15', '72', '发送到发斯蒂芬', '3', '2018-07-21 14:28:05');

-- ----------------------------
-- Table structure for goods_detail
-- ----------------------------
DROP TABLE IF EXISTS `goods_detail`;
CREATE TABLE `goods_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `g_id` int(11) unsigned NOT NULL COMMENT 'goods主表id',
  `manypic` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gram` char(10) CHARACTER SET utf8 NOT NULL COMMENT '商品重量',
  `stock` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '库存',
  `number` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '销量',
  `baby` text COLLATE utf8_unicode_ci NOT NULL COMMENT '宝贝详情',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of goods_detail
-- ----------------------------
INSERT INTO `goods_detail` VALUES ('2', '2', '1604215311387721531138772.5904.jpg,1090715311387721531138772.5924.jpg,364015311387721531138772.5954.jpg,1998515311387721531138772.5974.jpg', '0,1,2', '100', '0', '<p><img src=\"/upload/goods/image/20180720/15320495842.png\" style=\"\" title=\"15320495842.png\"/></p><p><img src=\"/upload/goods/image/20180720/15320495843.png\" style=\"\" title=\"15320495843.png\"/></p><p><img src=\"/upload/goods/image/20180720/153204958411_.jpg\" style=\"\" title=\"153204958411_.jpg\"/></p><p><img src=\"/upload/goods/image/20180720/153204958412_.jpg\" style=\"\" title=\"153204958412_.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('3', '3', '1309815311389401531138940.561.jpg,1769115311389401531138940.563.jpg,2220015311389401531138940.565.jpg,1140915311389401531138940.567.jpg', '0', '99', '1', '<p><img src=\"/ueditor/php/upload/image/20180709/1531138906.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531138923.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531138932.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531138939.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('5', '5', '245015311393011531139301.7228.jpg,1622715311393011531139301.7248.jpg,2236815311393011531139301.7268.jpg,924115311393011531139301.7288.jpg', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531139272.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531139278.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531139282.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('6', '6', '613515311394321531139432.0723.jpg,982815311394321531139432.0753.jpg,20515311394321531139432.0783.jpg,3213015311394321531139432.0813.jpg', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531139383.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531139390.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531139394.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('7', '7', '2486415311395621531139562.3663.jpg,1916115311395621531139562.3683.jpg,1142215311395621531139562.3713.jpg,2137515311395621531139562.3733.jpg', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531139514.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531139520.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531139526.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('8', '8', '1153015311396901531139690.4926.jpg,2700315311396901531139690.4956.jpg,501615311396901531139690.4976.jpg,2251315311396901531139690.4996.jpg', '0,1', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531139650.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531139655.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531139661.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('9', '9', '1239215311418581531141858.8911.jpg,3187315311418581531141858.8931.jpg,29415311418581531141858.8951.jpg,1674315311418581531141858.8971.jpg', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531141818.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531141828.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531141820.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('10', '10', '2581915311420691531142069.6212.jpg,2341615311420691531142069.6242.jpg,1288115311420691531142069.6262.jpg,1912615311420691531142069.6282.jpg', '0', '98', '2', '<p><img src=\"/ueditor/php/upload/image/20180709/1531142032.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531142037.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531142048.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('11', '11', '3076115311421751531142175.5763.jpg,2244615311421751531142175.5783.jpg,238315311421751531142175.5803.jpg,1455615311421751531142175.5823.jpg', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531142148.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531142154.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531142160.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('12', '12', '1411615311422961531142296.0772.jpg,884515311422961531142296.0802.jpg,2361815311422961531142296.0832.jpg,520315311422961531142296.0852.jpg', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531142270.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531142275.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531142280.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('13', '13', '3061015311424181531142418.7918.jpg,547515311424181531142418.7938.jpg,3004815311424181531142418.7958.jpg,2716115311424181531142418.7978.jpg', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531142406.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531142412.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531142416.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('14', '14', '1657015311425351531142535.8075.jpg,2749915311425351531142535.8095.jpg,173615311425351531142535.8115.jpg,86515311425351531142535.8145.jpg', '0,1', '98', '2', '<p><img src=\"/ueditor/php/upload/image/20180709/1531142524.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531142530.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531142533.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('15', '15', '1235815311427861531142786.3074.jpg,461515311427861531142786.3094.jpg,3256415311427861531142786.3124.jpg,1263715311427861531142786.3154.jpg', '0,1', '96', '4', '<p><img src=\"/ueditor/php/upload/image/20180709/1531142608.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531142778.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531142783.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('16', '16', '2198815311429341531142934.9219.jpg,1492515311429341531142934.9249.jpg,3097815311429341531142934.9269.jpg', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531142917.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531142926.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531142932.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('17', '17', '1833915311434051531143405.6884.jpg,2320015311434051531143405.6904.jpg,162515311434051531143405.6934.jpg,54215311434051531143405.6964.jpg', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531143390.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531143399.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531143404.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('18', '18', '1525315311446141531144614.6357.jpg,2986615311446141531144614.6377.jpg,1039515311446141531144614.6407.jpg,1336815311446141531144614.6427.jpg', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531144602.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531144608.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531144613.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('19', '19', '1761615311449521531144952.7301.jpg,2375315311449521531144952.7321.jpg,2862215311449521531144952.7351.jpg,382315311449521531144952.7371.jpg', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531144879.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531144952.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('20', '20', '2131915311450811531145081.2965.jpg,1829215311450811531145081.2985.jpg,2985315311450811531145081.3005.jpg,1153815311450811531145081.3025.jpg', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531145063.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531145079.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('21', '21', '2317715311452321531145232.2328.jpg,3137415311452321531145232.2348.jpg,887915311452321531145232.2378.jpg,1810815311452321531145232.2398.jpg', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531145224.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531145229.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531145224.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531145224.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('22', '22', '2633615311454461531145446.4711.jpg,1576915311454461531145446.4741.jpg,214215311454461531145446.4761.jpg,2566315311454461531145446.4781.jpg', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531145429.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531145439.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531145445.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('23', '23', '2298015311455511531145551.1976.webp,836515311455511531145551.1996.webp,2045015311455511531145551.2026.webp,395515311455511531145551.2046.webp', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531145539.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531145548.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531145539.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('24', '24', '2835115311464191531146419.6559.jpg,244415311464191531146419.6589.jpg,2683715311464191531146419.6609.jpg,1457015311464191531146419.6629.jpg', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531146385.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531146391.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531146399.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('25', '25', '1292015311465131531146513.3884.webp,1569715311465131531146513.3904.webp,3115815311465131531146513.3924.webp,3039115311465131531146513.3944.webp', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531146498.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531146504.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531146509.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('26', '26', '124315311466121531146612.066.webp,3160815311466121531146612.068.webp,2107315311466121531146612.07.webp,2731815311466121531146612.072.webp', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531146600.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531146605.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531146610.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('27', '27', '288215311467221531146722.9004.jpg,597115311467221531146722.9024.jpg,2676815311467221531146722.9054.jpg,551315311467221531146722.9074.jpg', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531146709.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531146715.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531146720.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('28', '28', '2193515311468351531146835.3794.webp,3218815311468351531146835.3814.webp,32515311468351531146835.3834.webp,1653815311468351531146835.4494.webp', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531146823.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531146827.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531146833.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('29', '29', '940715311470741531147074.7806.webp,193215311470741531147074.7826.webp,379715311470741531147074.7856.webp,2634615311470741531147074.7876.webp', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531147058.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531147068.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531147073.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('30', '30', '1476015311471981531147198.1047.webp,2784115311471981531147198.1087.webp,1955815311471981531147198.1107.webp,1936715311471981531147198.1127.webp', '0', '100', '0', '<p><img src=\"https://img.alicdn.com/imgextra/i2/73861778/TB2NR0DuYGYBuNjy0FoXXciBFXa_!!73861778.jpg_50x50.jpg_.webp\"/><img src=\"/ueditor/php/upload/image/20180709/1531147180.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531147187.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531147195.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('31', '31', '1615015311474191531147419.842.webp,1653515311474191531147419.844.webp,1293215311474191531147419.846.webp,2724515311474191531147419.849.webp', '0,1', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531147401.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531147406.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531147417.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('32', '32', '1269815311475421531147542.1685.webp,1505115311475421531147542.1725.webp,477615311475421531147542.1745.webp,2092915311475421531147542.1775.webp', '0', '100', '0', '<p><img src=\"/ueditor/php/upload/image/20180709/1531147523.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531147528.jpg\"/><img src=\"/ueditor/php/upload/image/20180709/1531147533.jpg\"/><img src=\"https://gd1.alicdn.com/imgextra/i1/704298669/TB276oZqrSYBuNjSspfXXcZCpXa_!!704298669.jpg\"/></p>');
INSERT INTO `goods_detail` VALUES ('33', '33', '1353115320494531532049453.532.png,2751215320494531532049453.5328.png,59315320494531532049453.5336.jpg,2322215320494531532049453.5343.jpg', '0', '100', '0', '<p><img src=\"/upload/goods/image/20180720/15320494502.png\" style=\"\" title=\"15320494502.png\"/></p><p><img src=\"/upload/goods/image/20180720/15320494503.png\" style=\"\" title=\"15320494503.png\"/></p><p><img src=\"/upload/goods/image/20180720/153204945011_.jpg\" style=\"\" title=\"153204945011_.jpg\"/></p><p><img src=\"/upload/goods/image/20180720/153204945012_.jpg\" style=\"\" title=\"153204945012_.jpg\"/></p><p><br/></p>');
INSERT INTO `goods_detail` VALUES ('34', '34', '2078015320588521532058852.3078.png,1022915320588521532058852.3084.png,2292215320588521532058852.309.jpg,2354715320588521532058852.3095.jpg', '0,1', '123', '0', '<p><img src=\"/upload/goods/image/20180720/15320588481.png\" style=\"\" title=\"15320588481.png\"/></p><p><img src=\"/upload/goods/image/20180720/15320588482.png\" style=\"\" title=\"15320588482.png\"/></p><p><img src=\"/upload/goods/image/20180720/15320588483.png\" style=\"\" title=\"15320588483.png\"/></p><p><img src=\"/upload/goods/image/20180720/153205884811_.jpg\" style=\"\" title=\"153205884811_.jpg\"/></p><p><br/></p>');

-- ----------------------------
-- Table structure for integral
-- ----------------------------
DROP TABLE IF EXISTS `integral`;
CREATE TABLE `integral` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `img` varchar(60) NOT NULL,
  `stock` int(10) unsigned NOT NULL DEFAULT '1',
  `price` int(6) unsigned NOT NULL,
  `create_at` varchar(11) NOT NULL DEFAULT '0',
  `desc` varchar(50) NOT NULL,
  `salecent` int(10) unsigned NOT NULL DEFAULT '0',
  `static` enum('2','1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of integral
-- ----------------------------
INSERT INTO `integral` VALUES ('2', '商品', '/integral_img/2018/07/06/15b3f00e1d39ec15308556492136.jpg', '98', '1000', '1530855649', '范德萨范德萨', '2', '0');
INSERT INTO `integral` VALUES ('3', '123', '/integral_img/2018/07/09/15b42f8088217815311155283303.jpg', '99', '1000', '1531115528', '蓝莓', '1', '0');
INSERT INTO `integral` VALUES ('4', '大幅度', '/integral_img/2018/07/09/15b42f81dead8515311155498695.jpg', '97', '1000', '1531115549', '是的发送到发', '3', '0');
INSERT INTO `integral` VALUES ('5', '沃尔沃缺乏', '/integral_img/2018/07/09/15b42f834e2c5f15311155726908.png', '99', '1000', '1531115572', '底料', '1', '0');
INSERT INTO `integral` VALUES ('6', 'cescfe', '/integral_img/2018/07/20/15b513f9f83e8715320513599562.png', '117', '10', '1532051359', 'sjiwjdiwjd', '3', '0');

-- ----------------------------
-- Table structure for lottery
-- ----------------------------
DROP TABLE IF EXISTS `lottery`;
CREATE TABLE `lottery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名称',
  `img` char(60) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品图片',
  `stock` int(11) unsigned NOT NULL COMMENT '库存',
  `create_at` int(11) unsigned NOT NULL COMMENT '创建时间',
  `desc` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '简介',
  `static` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 上架',
  `salecent` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '销量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of lottery
-- ----------------------------
INSERT INTO `lottery` VALUES ('7', '沃尔沃缺乏', '/lottery_img/2018/07/21/15b52e618d1b871532159512.png', '100', '1531115498', '巧克力', '0', '0');
INSERT INTO `lottery` VALUES ('8', '食品', '/lottery_img/2018/07/09/15b4378a88f87e1531148456.png', '100', '1531141206', '水电费三大赛', '0', '0');
INSERT INTO `lottery` VALUES ('9', '大幅度', '/lottery_img/2018/07/09/15b4378adc5b7a1531148461.png', '97', '1531141683', '是的发送到发送到发', '0', '3');
INSERT INTO `lottery` VALUES ('10', '123', '/lottery_img/2018/07/09/15b43791fd32691531148575.png', '100', '1531148575', '是的发生发的', '0', '0');
INSERT INTO `lottery` VALUES ('11', '素食方便面', '/lottery_img/2018/07/09/15b43799c135e31531148700.png', '99', '1531148700', '沙发斯蒂芬', '0', '1');
INSERT INTO `lottery` VALUES ('13', '翔', '/lottery_img/2018/07/20/15b518e974858c1532071575.png', '100', '1532071575', '顺丰到付', '0', '0');
INSERT INTO `lottery` VALUES ('14', '哈哈哈', '/lottery_img/2018/07/20/15b519564899ad1532073316.png', '100', '1532073316', '士大夫撒地方', '0', '0');
INSERT INTO `lottery` VALUES ('15', '斤斤计较', '/lottery_img/2018/07/20/15b5195c460f0a1532073412.png', '100', '1532073412', '是的反腐', '1', '0');

-- ----------------------------
-- Table structure for nocreate
-- ----------------------------
DROP TABLE IF EXISTS `nocreate`;
CREATE TABLE `nocreate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nocreate
-- ----------------------------
INSERT INTO `nocreate` VALUES ('3', '12', '72', '1532004620');
INSERT INTO `nocreate` VALUES ('5', '14', '151', '1532051534');
INSERT INTO `nocreate` VALUES ('6', '15', '151', '1532051534');
INSERT INTO `nocreate` VALUES ('7', '15', '153', '1532057734');
INSERT INTO `nocreate` VALUES ('8', '12', '153', '1532057734');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` char(24) COLLATE utf8_unicode_ci NOT NULL COMMENT '随机生成订单号',
  `user_id` int(11) unsigned NOT NULL COMMENT '用户主表id',
  `address_user` char(20) CHARACTER SET utf8 NOT NULL COMMENT '订单收货人',
  `address` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '订单地址',
  `orders_at` int(11) unsigned NOT NULL COMMENT '订单创建时间',
  `orders_tel` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '收货人电话',
  `orders_msg` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '订单留言',
  `sum` int(11) unsigned NOT NULL COMMENT '商品总数',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品总价',
  `static` tinyint(4) NOT NULL DEFAULT '0' COMMENT '物流状态 0等待商家发货/1已发货/2已收货',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '15320678224638041285217', '158', '1234567', '江西南昌安义 fdsadfasdfasfas', '1532067822', '13456765434', null, '1', '50.00', '2');
INSERT INTO `orders` VALUES ('2', '1532069114251376986022', '158', '1234567', '江西南昌安义 fdsadfasdfasfas', '1532069114', '13456765434', null, '1', '36.00', '2');
INSERT INTO `orders` VALUES ('3', '1532069371859098982635', '158', '1234567', '江西南昌安义 fdsadfasdfasfas', '1532069371', '13456765434', null, '3', '131.00', '2');
INSERT INTO `orders` VALUES ('4', '15320694081208702438568', '72', '发货的话', '河北石家庄藁城 电弧额会丢额度  uefduehf和化肥', '1532069408', '123456789', null, '1', '299.00', '2');
INSERT INTO `orders` VALUES ('5', '15321541974433651550903', '160', '嘿嘿', '北京昌平昌平 育荣教育园区', '1532154197', '17610588082', null, '2', '72.00', '2');

-- ----------------------------
-- Table structure for orders_detail
-- ----------------------------
DROP TABLE IF EXISTS `orders_detail`;
CREATE TABLE `orders_detail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) unsigned NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `goods_id` int(10) unsigned NOT NULL COMMENT '商品id',
  `cnt` int(11) unsigned NOT NULL COMMENT '购买商品数量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orders_detail
-- ----------------------------
INSERT INTO `orders_detail` VALUES ('1', '1', '50.00', '14', '1');
INSERT INTO `orders_detail` VALUES ('2', '2', '36.00', '15', '1');
INSERT INTO `orders_detail` VALUES ('3', '3', '50.00', '14', '1');
INSERT INTO `orders_detail` VALUES ('4', '3', '36.00', '15', '1');
INSERT INTO `orders_detail` VALUES ('5', '3', '45.00', '10', '1');
INSERT INTO `orders_detail` VALUES ('6', '4', '299.00', '3', '1');
INSERT INTO `orders_detail` VALUES ('7', '5', '36.00', '15', '2');

-- ----------------------------
-- Table structure for shop
-- ----------------------------
DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '地址',
  `shop_pic` char(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '店铺照片',
  `tel` char(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of shop
-- ----------------------------
INSERT INTO `shop` VALUES ('2', '哈哈哈', '北京,昌平,昌平,长风小区301', '1486615318760351531876035.7662.png', '17610588082', '南京业祥科技发展有限公司成立于2003年，位于南京市风景秀丽的科技创新型科技园区----中山科技园。是安全技术防范领域的专业企业；是安全技术防范领域的专业企业：集安全防范系统的设计研发、生产、销售及售后服务为一体的高科技企业。');
INSERT INTO `shop` VALUES ('3', '哈哈哈', '安徽,合肥,长丰,长风小区301', '3003515310521251531052125.432.jpg', '17610588082', '南京业祥科技发展有限公司成立于2003年，位于南京市风景秀丽的科技创新型科技园区----中山科技园。是安全技术防范领域的专业企业；是安全技术防范领域的专业企业：集安全防范系统的设计研发、生产、销售及售后服务为一体的高科技企业。');
INSERT INTO `shop` VALUES ('4', '哈哈哈 是否', '北京,昌平,昌平,长风小区301', '2388215310521841531052184.5727.jpg', '17610588082', '南京业祥科技发展有限公司成立于2003年，位于南京市风景秀丽的科技创新型科技园区----中山科技园。是安全技术防范领域的专业企业；是安全技术防范领域的专业企业：集安全防范系统的设计研发、生产、销售及售后服务为一体的高科技企业。');
INSERT INTO `shop` VALUES ('5', '哈哈哈', '河南,郑州,登封,长风小区301', '1626015310522001531052200.2103.jpg', '17610588082', '南京业祥科技发展有限公司成立于2003年，位于南京市风景秀丽的科技创新型科技园区----中山科技园。是安全技术防范领域的专业企业；是安全技术防范领域的专业企业：集安全防范系统的设计研发、生产、销售及售后服务为一体的高科技企业。');
INSERT INTO `shop` VALUES ('6', '哈哈哈', '北京,昌平,昌平,长风小区301', '2830415310522151531052215.2068.jpg', '17610588082', '南京业祥科技发展有限公司成立于2003年，位于南京市风景秀丽的科技创新型科技园区----中山科技园。是安全技术防范领域的专业企业；是安全技术防范领域的专业企业：集安全防范系统的设计研发、生产、销售及售后服务为一体的高科技企业。');
INSERT INTO `shop` VALUES ('8', '哈哈哈', '北京,昌平,昌平,长风小区301啊', '2608315318760621531876062.9322.png', '17610588082', '南京业祥科技发展有限公司成立于2003年，位于南京市风景秀丽的科技创新型科技园区----中山科技园。是安全技术防范领域的专业企业；是安全技术防范领域的专业企业：集安全防范系统的设计研发、生产、销售及售后服务为一体的高科技企业。');

-- ----------------------------
-- Table structure for shopping
-- ----------------------------
DROP TABLE IF EXISTS `shopping`;
CREATE TABLE `shopping` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `sum` int(10) unsigned NOT NULL,
  `size` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shopping
-- ----------------------------
INSERT INTO `shopping` VALUES ('28', '9', '155', '1', '500g');
INSERT INTO `shopping` VALUES ('36', '8', '72', '1', '500g');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `uname` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名称',
  `pass` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户密码',
  `create_at` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '创建时间',
  `auth` enum('2','1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`uname`) COMMENT '用户名称唯一'
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('68', '12345', '$2y$10$9KzN4pppKnS2xd5DfmWkRe/cdwiyTQBJDTJDqsePFPWmlHqrH35vy', '2018-07-21', '2', '205jjjgls@qq.com.cn');
INSERT INTO `user` VALUES ('72', 'admins', '$2y$10$ObypTaFieFYw9lCo7Hihh.hlN.rlHwxpV0NBtz9yyfa/MaG0RNwVS', '2018-07-20', '0', '2062797693@qq.com');
INSERT INTO `user` VALUES ('73', 'mywyy', '$2y$10$M4W8wnC1eZwr4jAZ38JYZ.DihJ7/INh987VLipC5NaEhwCtqAKajy', '2018-07-09', '2', '');
INSERT INTO `user` VALUES ('79', 'yyww', '$2y$10$wJMd5DWmWTjmIGn4lkyQWOi1su3x7RGX4fgxftsoQxA0.QDQqn11q', '2018-07-09', '1', 'jfkdsj123@qq.com');
INSERT INTO `user` VALUES ('127', 'arrays', '$2y$10$ccTBIDgN1EXC942mT8cM4u9WwZf7G9EbmxmHVrps9KseuGLhZshL6', '2018-07-11', '1', '2062797693@qq.com');
INSERT INTO `user` VALUES ('134', 'project', '$2y$10$BVznpgn9dc9P3M1C4Vyqr.Yt2lGr75m2pQcYjqHtKugQH2g6TlPma', '2018-07-11', '0', '2062797693@qq.com');
INSERT INTO `user` VALUES ('138', 'wrnmmp', '$2y$10$r.X12sNCNWjX/6se07GmtemOKFdUCa/uC0Bdqun1YYkD9ke/6LotO', '2018-07-17', '2', '574385893@qq.com');
INSERT INTO `user` VALUES ('143', 'qwertyu', '$2y$10$HDoIlUR65JDvD14Imoszl.0iKs3Mph4F6fD7ejP6ZCgEymZNM8f46', '2018-07-19', '2', '2062797693@qq.com');
INSERT INTO `user` VALUES ('144', 'gggrrr', '$2y$10$k1TCXhs0T74sVkPmpOSISusKjldac3rUZnrJvjgMY/I1hhwTbZzYi', '2018-07-19', '2', '2062797693@qq.com');
INSERT INTO `user` VALUES ('145', 'pppppp', '$2y$10$hpSMehPcBE1SEiWAfoqUfO8u68bbi5A4ZUMew5tnrbnL5Fv6YUyuy', '2018-07-19', '2', '2062797693@qq.com');
INSERT INTO `user` VALUES ('146', 'yyyyyy', '$2y$10$YNV.P19APMomD/ryoCPYUuOOASR2kLZUhfCTqE8OR4oNUg/QGu8RW', '2018-07-19', '2', '2062797693@qq.com');
INSERT INTO `user` VALUES ('147', '129999', '$2y$10$5pFTMiqgtVMm.SBntFurauT/GCOGPmnQhgmBBXqdIPXfXi0QJinBe', '2018-07-19', '2', '2062797693@qq.com');
INSERT INTO `user` VALUES ('148', 'mmmm', '$2y$10$KMEe2VSYuVmEa4qu6nPisOBaxZ5m3w5KQnVuKhAAjx0gsv9BnpR/.', '2018-07-19', '2', '2062797693@qq.com');
INSERT INTO `user` VALUES ('149', 'hghghg', '$2y$10$cZE6uSXXzmjJ.ratP7ShJ.ckn61E66K.yVZ/rlpBcMydALas/eoay', '2018-07-19', '2', '2062797693@qq.com');
INSERT INTO `user` VALUES ('150', 'hg890', '$2y$10$TcOIsoNkA4NReNaY403Qq.NtdnOWOruhSVPJjRgsNFq9RTeVAbR5y', '2018-07-19', '2', '2062797693@qq.com');
INSERT INTO `user` VALUES ('151', '123456', '$2y$10$ne0DjUE/bRYWBVB5bIhOTeCyBcHU6c0R9C3zeUJZqzObr5xz5FA2i', '2018-07-20', '2', '1104450885@qq.com');
INSERT INTO `user` VALUES ('152', 'userss', '$2y$10$61IjQ/OGeVAVND3uY5LFi.6SUAgtLHtw6cRxzbwK2asWxgB0qnRQm', '2018-07-20', '2', '17610588082@163.com');
INSERT INTO `user` VALUES ('153', 'zhangyu1', '$2y$10$sT3Z4fmsCTWgo8DWT3fFEeTAI6iegskPaRN5JFtVLJnL1Tyc07ixW', '2018-07-20', '', '17600013531@163.com');
INSERT INTO `user` VALUES ('154', '魏运洋', '$2y$10$h9RkdrB73MlQLigyYhsOxuVdonitr1N1Uf0V49hSLpLAP6VUa5dkS', '2018-07-20', '2', '2345675@qq.com');
INSERT INTO `user` VALUES ('155', 'yyyyy', '$2y$10$O2A7zgIBwDfxnD6xQn4pruPJgKnrOrTdbFp3EZ/Z0Ksz/74wpxy/K', '2018-07-20', '2', '2062797693@qq.com');
INSERT INTO `user` VALUES ('156', 'qwert55', '$2y$10$7YakPXoPF5DoGEFSxpHAcejtTDcp2N9uZYZI0aSbYTJTt99sgKr3S', '2018-07-20', '0', '1078158686@qq.com');
INSERT INTO `user` VALUES ('158', 'arrer', '$2y$10$ZK37AffS9phoAwJZYcjF/e6gcdnGjfUBLRqFRLYNYf.CNfA2ygInG', '2018-07-20', '2', '2062797693@qq.com');
INSERT INTO `user` VALUES ('159', 'rrrrrr', '$2y$10$IfzO.Ei7e74fWabfH.bNOO.f/3dD./gMeLxqcIbD7kGAxDdBAQ7G6', '2018-07-20', '1', '1234567890@qq.com');
INSERT INTO `user` VALUES ('160', 'timess', '$2y$10$5R/csLQJx15m6p1ydvQ5teRyYqiJdY1FP2V1kAQWz0PWx.9lWo5lW', '2018-07-21', '2', '1078158686@qq.com');

-- ----------------------------
-- Table structure for user_address
-- ----------------------------
DROP TABLE IF EXISTS `user_address`;
CREATE TABLE `user_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT 'user主表id',
  `address` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '收货人地址',
  `address_tel` char(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '收货人电话',
  `address_user` char(32) CHARACTER SET utf8 NOT NULL COMMENT '收货人姓名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_address
-- ----------------------------
INSERT INTO `user_address` VALUES ('5', '72', '海南海口海口 defrefff', '123456', 'wdefreg');
INSERT INTO `user_address` VALUES ('6', '72', '广东广州从化 详细地址。。。。。。。。。。', '17890905678', '添加');
INSERT INTO `user_address` VALUES ('7', '72', '河北石家庄藁城 电弧额会丢额度  uefduehf和化肥', '123456789', '发货的话');
INSERT INTO `user_address` VALUES ('9', '151', '上海宝山宝山 这里填写你的详细地址。。。。。。', '17880809546', '测试一下');
INSERT INTO `user_address` VALUES ('10', '151', '贵州贵阳贵阳市 详细地址信息。。。。。', '17880905678', '没有问题');
INSERT INTO `user_address` VALUES ('11', '153', '北京昌平昌平 asdsaf', '13333333333', 'qwe');
INSERT INTO `user_address` VALUES ('12', '153', '北京昌平昌平 dsafdsf', '13444444444', 'qwewq');
INSERT INTO `user_address` VALUES ('13', '153', '福建福州长乐 swguwhdueho', '17890905467', 'deyu');
INSERT INTO `user_address` VALUES ('14', '155', '北京昌平昌平 发达士大夫撒旦法法', '17834242424', '213231');
INSERT INTO `user_address` VALUES ('15', '158', '江西南昌安义 fdsadfasdfasfas', '13456765434', '1234567');
INSERT INTO `user_address` VALUES ('16', '160', '北京昌平昌平 育荣教育园区', '17610588082', '嘿嘿');

-- ----------------------------
-- Table structure for user_detail
-- ----------------------------
DROP TABLE IF EXISTS `user_detail`;
CREATE TABLE `user_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `user_id` int(11) unsigned NOT NULL COMMENT '用户主表id',
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户头像',
  `tel` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '手机号码',
  `money` decimal(10,2) DEFAULT '5000.00' COMMENT '账号余额',
  `integral` int(11) unsigned DEFAULT '0' COMMENT '积分',
  `sex` enum('w','m','x') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'x' COMMENT '性别',
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '验证token信息',
  `status` enum('gg','g') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'g',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_detail
-- ----------------------------
INSERT INTO `user_detail` VALUES ('19', '68', '/toux/p2tbv8B2yN1532157254.jpg', '13888888899', '99.00', '127', 'w', '', 'g');
INSERT INTO `user_detail` VALUES ('23', '72', '/toux/73vqzorjgM1532049868.png', '1761058808', '991702.00', '4000', 'm', '', 'g');
INSERT INTO `user_detail` VALUES ('24', '73', '/toux/fHBou2qEK71531119354.png', '13912345678', '100.00', '100', 'm', '', 'g');
INSERT INTO `user_detail` VALUES ('25', '79', '/toux/Bn2tfQGqC71531129619.png', '13512345678', '100.00', '100', 'x', '0', 'g');
INSERT INTO `user_detail` VALUES ('29', '125', '/toux/default.png', null, '5000.00', '0', 'x', 'OEmfO6Xrq8Kg438pwnrv57W52C2V3b', 'g');
INSERT INTO `user_detail` VALUES ('30', '127', '/toux/6IRA8DooiS1531310592.png', '17612345678', '5000.00', '1000', 'x', 'SgoAJGGlRYgS54XQjUoCJiwqou59Q3', 'g');
INSERT INTO `user_detail` VALUES ('35', '134', '/toux/JUfjMcjBym1531311863.png', '17630903378', '999.00', '999', 'x', '0', 'g');
INSERT INTO `user_detail` VALUES ('39', '138', '/toux/ZCTjL2TAl61531798005.png', '13784878235', '5000.00', '3000', 'x', 'BlJhEGyASIf0wNLh9VVY0crQW0dNul', 'g');
INSERT INTO `user_detail` VALUES ('43', '143', '/toux/default.png', null, '5000.00', '0', 'x', 'CLu0EjlCMnPagMG5DhLSIAiBTJGTO6', 'g');
INSERT INTO `user_detail` VALUES ('44', '144', '/toux/default.png', null, '5000.00', '0', 'x', 'bBO826Y1frekpb48yDWe2Nb6zpHQ7s', 'g');
INSERT INTO `user_detail` VALUES ('45', '145', '/toux/default.png', null, '5000.00', '0', 'x', 'viZbUXgK667gbcevCULdNzotVO9Zg6', 'g');
INSERT INTO `user_detail` VALUES ('46', '146', '/toux/default.png', null, '5000.00', '0', 'x', '7qovG1McrkBDXH2dnbsdFG1l7zJJW8', 'g');
INSERT INTO `user_detail` VALUES ('47', '147', '/toux/default.png', null, '5000.00', '0', 'x', 'SpIRX5P3U6PfnQkAAqMOysqA3GmvAS', 'g');
INSERT INTO `user_detail` VALUES ('48', '148', '/toux/default.png', null, '5000.00', '0', 'x', 'J4zxKbdN2O8sNvEs6pR7chJSYOGX6h', 'g');
INSERT INTO `user_detail` VALUES ('49', '149', '/toux/default.png', null, '5000.00', '0', 'x', 'TJB9zgbsh9IbTkYhey93ZjsXwVsmLM', 'g');
INSERT INTO `user_detail` VALUES ('50', '150', '/toux/default.png', null, '5000.00', '0', 'x', '9UMm03kj3sBNg1y7G4oajGeqlAcr37', 'g');
INSERT INTO `user_detail` VALUES ('51', '151', '/toux/default.png', null, '2092.00', '183', 'x', 'D1IEYpyHrrCrKtBM03eiud9hG718pU', 'g');
INSERT INTO `user_detail` VALUES ('52', '152', '/toux/kF28kaxHnM1532051328.png', '17610588082', null, null, 'm', '0', 'g');
INSERT INTO `user_detail` VALUES ('53', '153', '/img/15b51565962c761532057177.png', '17600013531', '1575.00', '17', 'm', '2jla6pvtQikHfNZrinO1EVG30C4TlZ', 'g');
INSERT INTO `user_detail` VALUES ('54', '154', '/toux/DTRBTNJyUL1532059858.jpg', '17610588082', '1.00', '1', 'm', '0', 'g');
INSERT INTO `user_detail` VALUES ('55', '155', '/toux/default.png', null, '5000.00', '0', 'x', 'tGOexrCua7KY5MiDZS8w9EVnTtApdr', 'g');
INSERT INTO `user_detail` VALUES ('56', '156', '/toux/GtvcjuTCmX1532067480.png', '17610588088', '1.00', '144', 'm', '0', 'g');
INSERT INTO `user_detail` VALUES ('58', '158', '/toux/default.png', null, '4783.00', '258', 'x', 'akWKvJsNOQM4fzZmfcCxQKVzrNAzjk', 'g');
INSERT INTO `user_detail` VALUES ('59', '159', '/toux/HhwpvNqcpl1532073289.png', '13788888888', null, null, 'm', '0', 'g');
INSERT INTO `user_detail` VALUES ('60', '160', '/toux/6EolTELf9f1532153963.jpg', '17610588082', '4928.00', '4000', 'm', '0', 'g');
