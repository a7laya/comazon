/*
 MySQL Database Backup Tools

 Source Host     : 127.0.0.1:3306
 Source Type     : mysql
 Source Database : test

 Date: 2019-05-30 15:06:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`admin_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1','admin','c59d855f0b7e2941ee19faa5f59b028a','2019-05-22 10:44:01');


-- ----------------------------
-- Table structure for code
-- ----------------------------
DROP TABLE IF EXISTS `code`;
CREATE TABLE `code` (
  `code_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `code_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`code_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of code
-- ----------------------------


-- ----------------------------
-- Table structure for limit
-- ----------------------------
DROP TABLE IF EXISTS `limit`;
CREATE TABLE `limit` (
  `limit_id` int(1) NOT NULL AUTO_INCREMENT,
  `day` int(1) DEFAULT NULL,
  `week` int(1) DEFAULT NULL,
  `no_repeat` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_repeat_seller` int(2) DEFAULT NULL,
  PRIMARY KEY (`limit_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of limit
-- ----------------------------
INSERT INTO `limit` VALUES ('1','11','11','on','null');


-- ----------------------------
-- Table structure for mark
-- ----------------------------
DROP TABLE IF EXISTS `mark`;
CREATE TABLE `mark` (
  `mark_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `ts` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`mark_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of mark
-- ----------------------------
INSERT INTO `mark` VALUES ('154','a7laya','602','2019-04-27 18:55:00.000000');
INSERT INTO `mark` VALUES ('158','a7laya','600','2019-04-27 18:55:27.000000');


-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) DEFAULT NULL,
  `ASIN` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(6) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `img_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `delete_time` datetime DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  `img_url2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_url3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_url4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_url5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_url6` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_url7` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`product_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=747 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('600','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur1','10','51.00','imgs/1.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','2019-05-11 13:44:23','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('601','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur2','10','66.00','imgs/2.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-11 13:44:29','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('602','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur3','10','93.00','imgs/1.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','2019-05-11 13:44:39','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('603','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur4','10','67.00','imgs/2.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','2019-05-11 13:44:34','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('604','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur5','10','36.00','imgs/1.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','2019-05-24 22:15:54','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('605','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur6','10','67.00','imgs/2.jpg','null','2019-05-26 13:00:41','2019-05-12 22:36:05','2019-05-12 22:36:05','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('606','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur7','10','56.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-24 22:15:54','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('607','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur8','10','51.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-24 22:15:54','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('608','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur9','10','62.00','imgs/1.jpg','null','2019-05-26 13:00:41','2019-05-12 22:36:23','2019-05-12 22:36:23','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('609','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur10','10','13.00','imgs/1.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','2019-05-12 22:36:23','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('610','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur11','10','83.00','imgs/1.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','2019-05-12 22:36:23','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('611','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur12','9','55.00','imgs/1.jpg','null','2019-05-27 19:29:27','0000-00-00 00:00:00','2019-05-12 22:36:23','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('612','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur13','10','96.00','imgs/1.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','2019-05-12 22:36:23','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('613','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur14','10','27.00','imgs/1.jpg','null','2019-05-26 13:00:41','2019-05-12 22:36:23','2019-05-12 22:36:23','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('614','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur15','10','34.00','imgs/1.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','2019-05-12 22:36:23','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('615','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur16','10','100.00','imgs/1.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','2019-05-12 22:36:29','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('616','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur17','10','96.00','imgs/1.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','0000-00-00 00:00:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('617','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur18','10','9.00','imgs/1.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','2019-05-24 21:47:24','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('618','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur19','10','12.00','imgs/1.jpg','null','2019-05-26 13:00:41','2019-05-11 20:57:35','2019-05-11 20:57:35','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('619','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur20','10','34.00','imgs/1.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','2019-05-24 21:46:40','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('620','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur21','10','33.00','imgs/1.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','0000-00-00 00:00:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('621','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur22','10','14.00','imgs/1.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','0000-00-00 00:00:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('622','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur23','10','6710.00','imgs/1.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','0000-00-00 00:00:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('623','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur24','10','43.00','imgs/1.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','0000-00-00 00:00:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('624','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur25','10','14.00','imgs/1.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','0000-00-00 00:00:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('625','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur26','10','75.00','imgs/1.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','0000-00-00 00:00:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('626','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur27','11','85.00','imgs/1.jpg','null','2019-05-27 12:31:05','0000-00-00 00:00:00','0000-00-00 00:00:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('627','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur28','10','45.00','imgs/1.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','0000-00-00 00:00:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('628','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur29','10','92.00','imgs/1.jpg','null','2019-05-26 13:00:41','0000-00-00 00:00:00','0000-00-00 00:00:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('629','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur30','10','31.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','0000-00-00 00:00:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('630','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur31','10','62.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','0000-00-00 00:00:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('631','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur32','10','92.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','0000-00-00 00:00:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('632','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur33','10','85.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','0000-00-00 00:00:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('633','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur34','10','12.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-13 12:58:32','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('634','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur35','10','90.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','0000-00-00 00:00:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('635','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur36','10','11.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','0000-00-00 00:00:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('636','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur37','10','3.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-11 21:35:02','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('637','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur38','10','47.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','0000-00-00 00:00:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('638','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur39','10','123.00','imgs/1.jpg','aaaaa1','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-14 12:30:45','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('639','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur40','10','29.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','0000-00-00 00:00:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('640','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur41','9','12.00','imgs/1.jpg','null','2019-05-29 11:02:04','0000-00-00 00:00:00','2019-05-13 13:00:03','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('641','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur42','10','12.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-14 19:59:40','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('642','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur43','10','97.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-11 13:48:06','2019-05-11 13:48:06','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('643','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur44','10','123123.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-14 19:59:38','2019-05-14 19:59:38','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('644','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur45','10','13.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-11 13:43:46','2019-05-11 13:43:46','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('645','1','B00N2BIFXS','halou','9','123.00','uploadImg/20190513e94e1248307d2f74f6101e81d013162f.png','halouhalouhalouhalouhalouhalou','2019-05-27 12:40:53','0000-00-00 00:00:00','2019-05-13 13:05:23','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('646','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur47','10','31.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-12 22:45:45','2019-05-12 22:45:45','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('647','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur48','10','23.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-12 22:45:45','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('648','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur49','10','47.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-11 13:47:59','2019-05-11 13:47:59','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('649','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur50','10','85.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-12 22:45:45','2019-05-12 22:45:45','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('650','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur51','10','91.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-12 22:45:45','2019-05-12 22:45:45','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('651','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur52','10','64.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-12 22:45:45','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('652','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur53','10','83.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-12 22:45:45','2019-05-12 22:45:45','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('653','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur54','10','7.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-12 22:45:45','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('654','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur55','10','71.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-12 22:45:45','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('655','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur56','10','90.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-12 22:45:45','2019-05-12 22:45:45','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('656','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur57','10','62.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-11 13:42:25','2019-05-11 13:42:25','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('657','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur58','10','63.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-12 22:45:33','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('658','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur59','10','29.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-12 22:45:45','2019-05-12 22:45:45','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('659','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur60','10','90.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-12 22:45:33','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('671','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur72','10','28.00','imgs/1.jpg','null','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-12 22:45:33','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('673','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur74','10','9.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-11 13:47:05','2019-05-11 13:47:05','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('674','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur75','10','92.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-12 22:45:33','2019-05-12 22:45:33','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('675','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur76','10','52.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-11 13:47:41','2019-05-11 13:47:41','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('676','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur77','10','62.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-11 13:47:32','2019-05-11 13:47:32','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('678','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur79','10','61.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-12 22:44:32','2019-05-12 22:44:32','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('679','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur80','10','92.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-12 22:44:32','2019-05-12 22:44:32','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('680','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur81','10','96.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-11 13:45:11','2019-05-11 13:45:11','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('681','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur82','10','84.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-12 22:35:15','2019-05-12 22:35:15','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('682','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur83','10','22.00','imgs/1.jpg','null','2019-05-27 08:30:04','2019-05-12 22:35:15','2019-05-12 22:35:15','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('715','1','B00N2BIFXS','aaa','10','123.00','uploadImg/2019051198fc84fc6fc0208753a9c13bb77cb01c.jpg','123123123123123123123123123123123123','2019-05-27 08:30:04','2019-05-12 22:42:09','2019-05-12 22:42:09','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('716','1','B00N2BIFXS','kang de yu lu ','10','123.00','uploadImg/201905115e0bec93792cc7e4f6fed45fe4126c33.png','layui-elem-quote layui-quote-nmlayui-elem-quote layui-quote-nmlayui-elem-quote layui-quote-nmlayui-elem-quote layui-quote-nmlayui-elem-quote layui-quote-nm','2019-05-27 08:30:04','2019-05-12 22:42:57','2019-05-12 22:42:57','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('717','1','B00N2BIFXS','12312312','10','123123.00','uploadImg/201905116556a3fc370c408f675ebb1431d7830d.png','123123','2019-05-27 08:30:04','2019-05-12 22:37:43','2019-05-12 22:37:43','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('718','1','B00N2BIFXS','123123','10','123123.00','uploadImg/201905114928c583568d9a1702fdac6fceb7a613.png','1','2019-05-27 08:30:04','2019-05-12 22:37:43','2019-05-12 22:37:43','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('719','1','B00N2BIFXS','123123','10','123123.00','uploadImg/201905112730bdeb424d75ba9a10a16c7fcb774d.png','123123','2019-05-27 08:30:04','2019-05-12 22:37:43','2019-05-12 22:37:43','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('720','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511fb43cc156957bbec676363787088db8d.png','null','2019-05-27 08:30:04','2019-05-12 22:37:43','2019-05-12 22:37:43','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('721','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511f4e3f4e2bd1f03dfc4f87a2265010871.png','null','2019-05-27 08:30:04','2019-05-12 22:37:43','2019-05-12 22:37:43','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('722','1','B00N2BIFXS','bbb','10','123.00','uploadImg/20190511a02bb1aecc4ba6a3b8a21e05cebd3253.png','123','2019-05-27 08:30:04','2019-05-12 22:37:43','2019-05-12 22:37:43','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('723','1','B00N2BIFXS','bbb','10','123.00','uploadImg/20190511a02bb1aecc4ba6a3b8a21e05cebd3253.png','123','2019-05-27 08:30:04','2019-05-12 22:37:43','2019-05-12 22:37:43','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('724','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511f8ed52001686eb18d245b1a271e9120a.png','null','2019-05-27 08:30:04','2019-05-12 22:37:43','2019-05-12 22:37:43','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('725','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511f8ed52001686eb18d245b1a271e9120a.png','null','2019-05-27 08:30:04','2019-05-12 22:35:00','2019-05-12 22:35:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('726','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511f8ed52001686eb18d245b1a271e9120a.png','null','2019-05-27 08:30:04','2019-05-12 22:35:00','2019-05-12 22:35:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('727','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511f8ed52001686eb18d245b1a271e9120a.png','null','2019-05-27 08:30:04','2019-05-12 22:35:00','2019-05-12 22:35:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('728','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511f8ed52001686eb18d245b1a271e9120a.png','null','2019-05-27 08:30:04','2019-05-12 22:35:00','2019-05-12 22:35:00','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('729','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511f8ed52001686eb18d245b1a271e9120a.png','null','2019-05-27 08:30:04','2019-05-12 22:42:57','2019-05-12 22:42:57','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('730','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511f8ed52001686eb18d245b1a271e9120a.png','null','2019-05-27 08:30:04','2019-05-12 22:33:31','2019-05-12 22:33:31','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('731','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511fdfdea22822a37fca005ca50cfac1f0b.png','123','2019-05-27 08:30:04','2019-05-12 22:33:31','2019-05-12 22:33:31','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('732','1','B00N2BIFXS','12312312','10','123.00','uploadImg/201905115e169780838d7591d1973af319079dff.png','null','2019-05-27 08:30:04','2019-05-12 22:42:57','2019-05-12 22:42:57','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('733','1','B00N2BIFXS','123123','10','33.00','uploadImg/20190511ffbe31454bad8bef88df6fb41bfcdd52.png','null','2019-05-27 08:30:04','2019-05-12 00:01:09','2019-05-12 00:01:09','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('734','1','B00N2BIFXS','123123','10','123123.00','uploadImg/20190511916b184e35c4e8948cb34531d1261def.png','null','2019-05-27 08:30:04','2019-05-12 22:42:57','2019-05-12 22:42:57','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('735','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190512e2c8ac88b478b5185030c24798c11dd.png','null','2019-05-27 08:30:04','2019-05-12 00:01:05','2019-05-12 00:01:05','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('736','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190512c3d4d7b68f82e2f04e9949ba343ae9e7.png','123','2019-05-27 08:30:04','2019-05-12 00:01:01','2019-05-12 00:01:01','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('737','1','B00N2BIFXS','Lorem ipsum dolor sit amet laya 4612','10','12.00','uploadImg/20190514c164e68527a720827a54dfaf0a12b889.png','null','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-14 19:48:29','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('738','1','B00N2BIFXS','Lorem ipsu123123','10','12.00','null','null','2019-05-27 08:30:04','2019-05-15 13:10:20','2019-05-15 13:10:20','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('739','1','B00N2BIFXS','Lorem ipsu123123','10','12.00','uploadImg/20190515f7c93583906f01da6f4afadecc24da74.jpg','1231231231231','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-20 23:01:49','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('740','1','B00N2BIFXS','asd asd asd asd','10','123.00','uploadImg/201905233a6558735cd5f2cfcfc6932aba6436f2.png','asdaasd','2019-05-27 08:30:04','2019-05-24 20:03:32','2019-05-24 20:03:32','uploadImg/201905234abbc693f9e7656e28f2d1517a3b4c72.png','uploadImg/20190523930a2a2b9f5418553f36b5361f2c9c4a.png','uploadImg/2019052386b43661a4d468f5ad68c0c37f32af52.png','uploadImg/201905234374dba7b1d3052730b5d8f07b31f6b7.png','uploadImg/201905235554d66061bcb2ab53de0016518c958e.png','uploadImg/201905236ecca5a31f150cf720d45f05123f2114.png');
INSERT INTO `product` VALUES ('741','1','B00N2BIFXS','123123','10','123.00','uploadImg/2019052418ff9b2141b012785e208bfe53010957.png','123123','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-24 20:02:36','uploadImg/20190524e63d7ea5238974a9258d14a4a898d034.png','uploadImg/20190524ccca39b01a1725d938dd77fb485b20fc.png','uploadImg/20190524849b48467c8417ab54b24b92d59497f.png','uploadImg/20190524c2e55011b1515175153570e92a24c679.png','uploadImg/2019052473bc94b52331384f7781072bf09ee218.png','uploadImg/20190524fc03171ad850861e93bd993ecc8a1516.png');
INSERT INTO `product` VALUES ('742','1','B00N2BIFXS','big foo foo foo foo ','10','11.00','uploadImg/201905246686cfb3feab6ef2f6950b2ef0c991db.png','foo foo foo ','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-24 22:07:00','uploadImg/2019052460a00cbdfe5ddca7ecd948309114ef03.png','uploadImg/20190524739fc5b7fc84838b457c54acd88a3510.png','null','null','null','null');
INSERT INTO `product` VALUES ('743','1','B00N2BIFXS','333','10','33.00','uploadImg/201905241539e65ab772a2ec527d996ac1290729.png','33','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-24 22:14:33','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('744','1','B00N2BIFXS','123123123','10','123.00','uploadImg/20190524c59902d483f494c3c691cd2f671febee.png','null','2019-05-28 09:38:33','0000-00-00 00:00:00','2019-05-25 11:18:34','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('745','2','B00N2BIFXS','123123','10','1.00','uploadImg/20190524484f3d88bb436b8df7fc3a7a77437df8.png','<p>123123</p><p>123123</p><p>123123</p><p>123123</p>','2019-05-27 08:30:04','0000-00-00 00:00:00','2019-05-25 11:18:34','null','null','null','null','null','null');
INSERT INTO `product` VALUES ('746','1','B00N2BIFXS','Laya Male outdoor shoulder backpack 110161','10','12.00','uploadImg/20190526aa4d647d3b5e7689c22ed4ac839253f0.jpg','<ul class="a-unordered-list a-vertical a-spacing-none"><li><span class="a-list-item">Top Accessory Pocket</span></li><li><span class="a-list-item">External and Internal Accessible Laptop Compartment</span></li><li><span class="a-list-item">Rucksack Style Main Entry with Drawstring Closure</span></li><li><span class="a-list-item">Internal Zippered Mesh Pocket with Key Clip</span></li><li><span class="a-list-item">25L [20in x 13in x 6in] [52cm x 32cm x 16cm], 1.8 lbs. 0.8kg</span></li></ul>','2019-05-26 23:11:39','0000-00-00 00:00:00','2019-05-26 16:17:50','uploadImg/20190526dda1d97783b2c2ed63e4111561b00b6a.jpg','uploadImg/20190526edad906af08552ff93c76e21c3f5513.jpg','uploadImg/20190526ddad0650a96a65f28d4c663a273b3998.jpg','uploadImg/201905263292e838cfbeb00450a9d864babd817d.jpg','uploadImg/20190526573b4713bf2d332802470bebcf1f3b92.jpg','uploadImg/20190526 2f162dadcd1393c1ea32f6faea8eea2.jpg');


-- ----------------------------
-- Table structure for purchased
-- ----------------------------
DROP TABLE IF EXISTS `purchased`;
CREATE TABLE `purchased` (
  `purchased_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `review_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_review` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ts` timestamp NULL DEFAULT NULL,
  `delete_time` timestamp NULL DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`purchased_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of purchased
-- ----------------------------
INSERT INTO `purchased` VALUES ('111','a7laya','746','123','uploadReview/201905276bcb18a3b137b66ea41d727532b13526.jpg','null','2019-05-26 23:11:39','0000-00-00 00:00:00','2019-05-27 19:32:17','2','wo kao','75739899@qq.com');
INSERT INTO `purchased` VALUES ('112','a7laya','743','1231232','uploadReview/20190528aa5586dd1d1698da48be112b82293a87.jpg','null','2019-05-27 08:28:33','0000-00-00 00:00:00','2019-05-28 09:46:36','2','wo kao','75739899@qq.com');
INSERT INTO `purchased` VALUES ('116','a7laya','645','123','uploadReview/20190527d055a728a2952896b089bc2cd4da128e.jpg','null','2019-05-27 12:40:53','0000-00-00 00:00:00','2019-05-27 20:38:59','2','wo kao','75739899@qq.com');
INSERT INTO `purchased` VALUES ('117','a7laya','611','123','uploadReview/20190527c802199ef297922015bb6b5183510efa.jpg','null','2019-05-27 19:29:27','0000-00-00 00:00:00','2019-05-27 20:39:13','2','wo kao','75739899@qq.com');
INSERT INTO `purchased` VALUES ('118','a7laya','640','null','null','null','2019-05-29 11:02:04','0000-00-00 00:00:00','2019-05-29 11:02:04','null','wo kao','75739899@qq.com');


-- ----------------------------
-- Table structure for seller
-- ----------------------------
DROP TABLE IF EXISTS `seller`;
CREATE TABLE `seller` (
  `seller_id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`seller_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of seller
-- ----------------------------
INSERT INTO `seller` VALUES ('1','Laya','0000-00-00 00:00:00','2019-05-26 16:17:09','2019-05-23 23:34:10');
INSERT INTO `seller` VALUES ('2','seller_one','0000-00-00 00:00:00','2019-05-25 10:37:32','2019-05-24 19:49:04');
INSERT INTO `seller` VALUES ('3','laya3','2019-05-25 13:10:49','2019-05-25 13:10:49','2019-05-25 13:10:13');
INSERT INTO `seller` VALUES ('4','laya4','0000-00-00 00:00:00','2019-05-25 13:10:19','2019-05-25 13:10:19');


-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `site_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `dalete_time` datetime DEFAULT NULL,
  PRIMARY KEY (`setting_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('1','<p class="MsoNormal"><span>Please feel free to contact us if you have any other questions.</span></p><p>Email ：COMAZON1@COMAZON.com</p><p>Tel: 123123123</p>','COMAZON1','2019-05-21 10:05:21','2019-05-27 19:37:58','0000-00-00 00:00:00');


-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `delete_time` timestamp NULL DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `paypal` varchar(255) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `referral_code` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('45','a7laya','c59d855f0b7e2941ee19faa5f59b028a','75@qq.com','2019-04-23 16:15:20','0000-00-00 00:00:00','2019-05-29 11:02:04','121131123123','75739899@qq.com','wo kao','null','127.0.0.1','2019-05-29 19:38:32','null');
INSERT INTO `user` VALUES ('46','a8laya','c59d855f0b7e2941ee19faa5f59b028a','123@123.com','2019-04-23 21:50:52','2019-05-20 21:08:55','2019-05-20 21:08:55','null','null','null','null','127.0.0.1','2019-05-19 18:38:24','null');
INSERT INTO `user` VALUES ('47','a9laya','c59d855f0b7e2941ee19faa5f59b028a','a9laya@qq.com','2019-04-24 17:03:49','2019-05-20 21:09:00','2019-05-20 21:09:00','null','null','null','null','null','0000-00-00 00:00:00','null');
INSERT INTO `user` VALUES ('48','a10laya','c59d855f0b7e2941ee19faa5f59b028a','a10laya@qq.com','2019-04-24 22:48:54','0000-00-00 00:00:00','2019-05-22 10:35:45','123123','zzzzz','null','null','null','0000-00-00 00:00:00','null');
INSERT INTO `user` VALUES ('49','a12laya','c59d855f0b7e2941ee19faa5f59b028a','123456@qq.com','2019-05-06 22:19:48','2019-05-15 10:13:55','2019-05-15 10:13:55','null','null','null','null','127.0.0.1','2019-05-27 10:50:58','null');
INSERT INTO `user` VALUES ('50','a12laya12','c59d855f0b7e2941ee19faa5f59b028a','123123@123.com','2019-05-20 13:57:30','0000-00-00 00:00:00','2019-05-20 13:57:30','null','null','null','null','null','0000-00-00 00:00:00','null');
INSERT INTO `user` VALUES ('51','a12laya','c59d855f0b7e2941ee19faa5f59b028a','a12laya@123.com','2019-05-20 14:12:19','0000-00-00 00:00:00','2019-05-26 12:34:49','null','123','123','null','127.0.0.1','2019-05-27 10:50:58','null');
INSERT INTO `user` VALUES ('52','a213123','c59d855f0b7e2941ee19faa5f59b028a','asdasd@123.com','2019-05-20 14:14:32','2019-05-20 23:15:41','2019-05-20 23:15:41','null','null','null','null','null','0000-00-00 00:00:00','48HCLf');
INSERT INTO `user` VALUES ('57','a17laya','c59d855f0b7e2941ee19faa5f59b028a','123@321.com','2019-05-20 16:15:42','0000-00-00 00:00:00','2019-05-20 23:04:19','null','123','null','我看看','null','0000-00-00 00:00:00','bhnM1x');
INSERT INTO `user` VALUES ('58','a22laya1','c59d855f0b7e2941ee19faa5f59b028a','a8laau@213.com','2019-05-20 16:47:24','0000-00-00 00:00:00','2019-05-20 22:57:30','1','123','123','123','null','0000-00-00 00:00:00','48HCLf');
INSERT INTO `user` VALUES ('59','a21laya','c59d855f0b7e2941ee19faa5f59b028a','123@213.com','2019-05-20 16:48:52','0000-00-00 00:00:00','2019-05-22 08:53:58','123','123','null','123','null','0000-00-00 00:00:00','tZvf7O');
INSERT INTO `user` VALUES ('60','admin','c59d855f0b7e2941ee19faa5f59b028a','admin@123.com','2019-05-20 21:16:30','0000-00-00 00:00:00','2019-05-22 10:35:01','00000','123','123','123','127.0.0.1','2019-05-20 23:08:37','PqEKZl');


