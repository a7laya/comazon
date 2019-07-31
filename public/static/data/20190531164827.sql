/*
 MySQL Database Backup Tools

 Source Host     : 127.0.0.1:3306
 Source Type     : mysql
 Source Database : test

 Date: 2019-05-31 16:48:27
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
INSERT INTO `limit` VALUES ('1','11','11','on','0');


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
INSERT INTO `product` VALUES ('600','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur1','10','51.00','imgs/1.jpg','','2019-05-26 13:00:41',NULL,'2019-05-11 13:44:23',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('601','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur2','10','66.00','imgs/2.jpg','','2019-05-27 08:30:04',NULL,'2019-05-11 13:44:29',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('602','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur3','10','93.00','imgs/1.jpg','','2019-05-26 13:00:41',NULL,'2019-05-11 13:44:39',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('603','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur4','10','67.00','imgs/2.jpg','','2019-05-26 13:00:41',NULL,'2019-05-11 13:44:34',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('604','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur5','10','36.00','imgs/1.jpg','','2019-05-26 13:00:41',NULL,'2019-05-24 22:15:54',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('605','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur6','10','67.00','imgs/2.jpg','','2019-05-26 13:00:41','2019-05-12 22:36:05','2019-05-12 22:36:05',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('606','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur7','10','56.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,'2019-05-24 22:15:54',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('607','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur8','10','51.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,'2019-05-24 22:15:54',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('608','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur9','10','62.00','imgs/1.jpg','','2019-05-26 13:00:41','2019-05-12 22:36:23','2019-05-12 22:36:23',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('609','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur10','10','13.00','imgs/1.jpg','','2019-05-26 13:00:41',NULL,'2019-05-12 22:36:23',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('610','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur11','10','83.00','imgs/1.jpg','','2019-05-26 13:00:41',NULL,'2019-05-12 22:36:23',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('611','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur12','9','55.00','imgs/1.jpg','','2019-05-27 19:29:27',NULL,'2019-05-12 22:36:23',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('612','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur13','10','96.00','imgs/1.jpg','','2019-05-26 13:00:41',NULL,'2019-05-12 22:36:23',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('613','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur14','10','27.00','imgs/1.jpg','','2019-05-26 13:00:41','2019-05-12 22:36:23','2019-05-12 22:36:23',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('614','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur15','10','34.00','imgs/1.jpg','','2019-05-26 13:00:41',NULL,'2019-05-12 22:36:23',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('615','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur16','10','100.00','imgs/1.jpg','','2019-05-26 13:00:41',NULL,'2019-05-12 22:36:29',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('616','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur17','10','96.00','imgs/1.jpg','','2019-05-26 13:00:41',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('617','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur18','10','9.00','imgs/1.jpg','','2019-05-26 13:00:41',NULL,'2019-05-24 21:47:24',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('618','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur19','10','12.00','imgs/1.jpg','','2019-05-26 13:00:41','2019-05-11 20:57:35','2019-05-11 20:57:35',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('619','2','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur20','10','34.00','imgs/1.jpg','','2019-05-26 13:00:41',NULL,'2019-05-24 21:46:40',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('620','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur21','10','33.00','imgs/1.jpg','','2019-05-26 13:00:41',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('621','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur22','10','14.00','imgs/1.jpg','','2019-05-26 13:00:41',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('622','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur23','10','6710.00','imgs/1.jpg','','2019-05-26 13:00:41',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('623','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur24','10','43.00','imgs/1.jpg','','2019-05-26 13:00:41',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('624','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur25','10','14.00','imgs/1.jpg','','2019-05-26 13:00:41',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('625','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur26','10','75.00','imgs/1.jpg','','2019-05-26 13:00:41',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('626','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur27','11','85.00','imgs/1.jpg','','2019-05-27 12:31:05',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('627','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur28','10','45.00','imgs/1.jpg','','2019-05-26 13:00:41',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('628','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur29','10','92.00','imgs/1.jpg','','2019-05-26 13:00:41',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('629','3','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur30','10','31.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('630','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur31','10','62.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('631','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur32','10','92.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('632','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur33','10','85.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('633','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur34','10','12.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,'2019-05-13 12:58:32',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('634','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur35','10','90.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('635','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur36','10','11.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('636','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur37','10','3.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,'2019-05-11 21:35:02',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('637','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur38','10','47.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('638','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur39','10','123.00','imgs/1.jpg','aaaaa1','2019-05-27 08:30:04',NULL,'2019-05-14 12:30:45',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('639','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur40','10','29.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('640','4','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur41','9','12.00','imgs/1.jpg','','2019-05-29 11:02:04',NULL,'2019-05-13 13:00:03',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('641','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur42','10','12.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,'2019-05-14 19:59:40',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('642','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur43','10','97.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-11 13:48:06','2019-05-11 13:48:06',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('643','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur44','10','123123.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-14 19:59:38','2019-05-14 19:59:38',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('644','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur45','10','13.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-11 13:43:46','2019-05-11 13:43:46',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('645','1','B00N2BIFXS','halou','9','123.00','uploadImg/20190513\e94e1248307d2f74f6101e81d013162f.png','halouhalouhalouhalouhalouhalou','2019-05-27 12:40:53',NULL,'2019-05-13 13:05:23',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('646','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur47','10','31.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-12 22:45:45','2019-05-12 22:45:45',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('647','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur48','10','23.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,'2019-05-12 22:45:45',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('648','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur49','10','47.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-11 13:47:59','2019-05-11 13:47:59',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('649','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur50','10','85.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-12 22:45:45','2019-05-12 22:45:45',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('650','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur51','10','91.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-12 22:45:45','2019-05-12 22:45:45',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('651','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur52','10','64.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,'2019-05-12 22:45:45',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('652','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur53','10','83.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-12 22:45:45','2019-05-12 22:45:45',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('653','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur54','10','7.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,'2019-05-12 22:45:45',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('654','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur55','10','71.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,'2019-05-12 22:45:45',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('655','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur56','10','90.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-12 22:45:45','2019-05-12 22:45:45',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('656','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur57','10','62.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-11 13:42:25','2019-05-11 13:42:25',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('657','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur58','10','63.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,'2019-05-12 22:45:33',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('658','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur59','10','29.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-12 22:45:45','2019-05-12 22:45:45',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('659','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur60','10','90.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,'2019-05-12 22:45:33',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('671','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur72','10','28.00','imgs/1.jpg','','2019-05-27 08:30:04',NULL,'2019-05-12 22:45:33',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('673','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur74','10','9.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-11 13:47:05','2019-05-11 13:47:05',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('674','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur75','10','92.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-12 22:45:33','2019-05-12 22:45:33',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('675','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur76','10','52.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-11 13:47:41','2019-05-11 13:47:41',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('676','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur77','10','62.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-11 13:47:32','2019-05-11 13:47:32',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('678','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur79','10','61.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-12 22:44:32','2019-05-12 22:44:32',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('679','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur80','10','92.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-12 22:44:32','2019-05-12 22:44:32',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('680','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur81','10','96.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-11 13:45:11','2019-05-11 13:45:11',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('681','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur82','10','84.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-12 22:35:15','2019-05-12 22:35:15',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('682','1','B00N2BIFXS','Lorem ipsum dolor sit amet consectetur83','10','22.00','imgs/1.jpg','','2019-05-27 08:30:04','2019-05-12 22:35:15','2019-05-12 22:35:15',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('715','1','B00N2BIFXS','aaa','10','123.00','uploadImg/20190511\98fc84fc6fc0208753a9c13bb77cb01c.jpg','123123123123123123123123123123123123','2019-05-27 08:30:04','2019-05-12 22:42:09','2019-05-12 22:42:09',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('716','1','B00N2BIFXS','kang de yu lu ','10','123.00','uploadImg/20190511\5e0bec93792cc7e4f6fed45fe4126c33.png','layui-elem-quote layui-quote-nmlayui-elem-quote layui-quote-nmlayui-elem-quote layui-quote-nmlayui-elem-quote layui-quote-nmlayui-elem-quote layui-quote-nm','2019-05-27 08:30:04','2019-05-12 22:42:57','2019-05-12 22:42:57',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('717','1','B00N2BIFXS','12312312','10','123123.00','uploadImg/20190511\6556a3fc370c408f675ebb1431d7830d.png','123123','2019-05-27 08:30:04','2019-05-12 22:37:43','2019-05-12 22:37:43',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('718','1','B00N2BIFXS','123123','10','123123.00','uploadImg/20190511\4928c583568d9a1702fdac6fceb7a613.png','1','2019-05-27 08:30:04','2019-05-12 22:37:43','2019-05-12 22:37:43',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('719','1','B00N2BIFXS','123123','10','123123.00','uploadImg/20190511\2730bdeb424d75ba9a10a16c7fcb774d.png','123123','2019-05-27 08:30:04','2019-05-12 22:37:43','2019-05-12 22:37:43',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('720','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511\fb43cc156957bbec676363787088db8d.png','','2019-05-27 08:30:04','2019-05-12 22:37:43','2019-05-12 22:37:43',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('721','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511\f4e3f4e2bd1f03dfc4f87a2265010871.png','','2019-05-27 08:30:04','2019-05-12 22:37:43','2019-05-12 22:37:43',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('722','1','B00N2BIFXS','bbb','10','123.00','uploadImg/20190511\a02bb1aecc4ba6a3b8a21e05cebd3253.png','123','2019-05-27 08:30:04','2019-05-12 22:37:43','2019-05-12 22:37:43',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('723','1','B00N2BIFXS','bbb','10','123.00','uploadImg/20190511\a02bb1aecc4ba6a3b8a21e05cebd3253.png','123','2019-05-27 08:30:04','2019-05-12 22:37:43','2019-05-12 22:37:43',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('724','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511\f8ed52001686eb18d245b1a271e9120a.png','','2019-05-27 08:30:04','2019-05-12 22:37:43','2019-05-12 22:37:43',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('725','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511\f8ed52001686eb18d245b1a271e9120a.png','','2019-05-27 08:30:04','2019-05-12 22:35:00','2019-05-12 22:35:00',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('726','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511\f8ed52001686eb18d245b1a271e9120a.png','','2019-05-27 08:30:04','2019-05-12 22:35:00','2019-05-12 22:35:00',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('727','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511\f8ed52001686eb18d245b1a271e9120a.png','','2019-05-27 08:30:04','2019-05-12 22:35:00','2019-05-12 22:35:00',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('728','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511\f8ed52001686eb18d245b1a271e9120a.png','','2019-05-27 08:30:04','2019-05-12 22:35:00','2019-05-12 22:35:00',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('729','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511\f8ed52001686eb18d245b1a271e9120a.png','','2019-05-27 08:30:04','2019-05-12 22:42:57','2019-05-12 22:42:57',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('730','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511\f8ed52001686eb18d245b1a271e9120a.png','','2019-05-27 08:30:04','2019-05-12 22:33:31','2019-05-12 22:33:31',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('731','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190511\fdfdea22822a37fca005ca50cfac1f0b.png','123','2019-05-27 08:30:04','2019-05-12 22:33:31','2019-05-12 22:33:31',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('732','1','B00N2BIFXS','12312312','10','123.00','uploadImg/20190511\5e169780838d7591d1973af319079dff.png','','2019-05-27 08:30:04','2019-05-12 22:42:57','2019-05-12 22:42:57',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('733','1','B00N2BIFXS','123123','10','33.00','uploadImg/20190511\ffbe31454bad8bef88df6fb41bfcdd52.png','','2019-05-27 08:30:04','2019-05-12 00:01:09','2019-05-12 00:01:09',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('734','1','B00N2BIFXS','123123','10','123123.00','uploadImg/20190511\916b184e35c4e8948cb34531d1261def.png','','2019-05-27 08:30:04','2019-05-12 22:42:57','2019-05-12 22:42:57',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('735','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190512\be2c8ac88b478b5185030c24798c11dd.png','','2019-05-27 08:30:04','2019-05-12 00:01:05','2019-05-12 00:01:05',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('736','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190512\c3d4d7b68f82e2f04e9949ba343ae9e7.png','123','2019-05-27 08:30:04','2019-05-12 00:01:01','2019-05-12 00:01:01',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('737','1','B00N2BIFXS','Lorem ipsum dolor sit amet laya 4612','10','12.00','uploadImg/20190514\c164e68527a720827a54dfaf0a12b889.png','','2019-05-27 08:30:04',NULL,'2019-05-14 19:48:29',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('738','1','B00N2BIFXS','Lorem ipsu123123','10','12.00','','','2019-05-27 08:30:04','2019-05-15 13:10:20','2019-05-15 13:10:20',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('739','1','B00N2BIFXS','Lorem ipsu123123','10','12.00','uploadImg/20190515\f7c93583906f01da6f4afadecc24da74.jpg','1231231231231','2019-05-27 08:30:04',NULL,'2019-05-20 23:01:49',NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `product` VALUES ('740','1','B00N2BIFXS','asd asd asd asd','10','123.00','uploadImg/20190523\3a6558735cd5f2cfcfc6932aba6436f2.png','asdaasd','2019-05-27 08:30:04','2019-05-24 20:03:32','2019-05-24 20:03:32','uploadImg/20190523\4abbc693f9e7656e28f2d1517a3b4c72.png','uploadImg/20190523\930a2a2b9f5418553f36b5361f2c9c4a.png','uploadImg/20190523\86b43661a4d468f5ad68c0c37f32af52.png','uploadImg/20190523\4374dba7b1d3052730b5d8f07b31f6b7.png','uploadImg/20190523\5554d66061bcb2ab53de0016518c958e.png','uploadImg/20190523\6ecca5a31f150cf720d45f05123f2114.png');
INSERT INTO `product` VALUES ('741','1','B00N2BIFXS','123123','10','123.00','uploadImg/20190524\18ff9b2141b012785e208bfe53010957.png','123123','2019-05-27 08:30:04',NULL,'2019-05-24 20:02:36','uploadImg/20190524\e63d7ea5238974a9258d14a4a898d034.png','uploadImg/20190524\ccca39b01a1725d938dd77fb485b20fc.png','uploadImg/20190524\b849b48467c8417ab54b24b92d59497f.png','uploadImg/20190524\c2e55011b1515175153570e92a24c679.png','uploadImg/20190524\73bc94b52331384f7781072bf09ee218.png','uploadImg/20190524\fc03171ad850861e93bd993ecc8a1516.png');
INSERT INTO `product` VALUES ('742','1','B00N2BIFXS','big foo foo foo foo ','10','11.00','uploadImg/20190524\6686cfb3feab6ef2f6950b2ef0c991db.png','foo foo foo ','2019-05-27 08:30:04',NULL,'2019-05-24 22:07:00','uploadImg/20190524\60a00cbdfe5ddca7ecd948309114ef03.png','uploadImg/20190524\739fc5b7fc84838b457c54acd88a3510.png','','','','');
INSERT INTO `product` VALUES ('743','1','B00N2BIFXS','333','10','33.00','uploadImg/20190524\1539e65ab772a2ec527d996ac1290729.png','33','2019-05-27 08:30:04',NULL,'2019-05-24 22:14:33','','','','','','');
INSERT INTO `product` VALUES ('744','1','B00N2BIFXS','123123123','10','123.00','uploadImg/20190524\c59902d483f494c3c691cd2f671febee.png','','2019-05-28 09:38:33',NULL,'2019-05-25 11:18:34','','','','','','');
INSERT INTO `product` VALUES ('745','2','B00N2BIFXS','123123','10','1.00','uploadImg/20190524\484f3d88bb436b8df7fc3a7a77437df8.png','<p>123123</p><p>123123</p><p>123123</p><p>123123</p>','2019-05-27 08:30:04',NULL,'2019-05-25 11:18:34','','','','','','');
INSERT INTO `product` VALUES ('746','1','B00N2BIFXS','Laya Male outdoor shoulder backpack 110161','10','12.00','uploadImg/20190526\aa4d647d3b5e7689c22ed4ac839253f0.jpg','<ul class="a-unordered-list a-vertical a-spacing-none"><li><span class="a-list-item">Top Accessory Pocket</span></li><li><span class="a-list-item">External and Internal Accessible Laptop Compartment</span></li><li><span class="a-list-item">Rucksack Style Main Entry with Drawstring Closure</span></li><li><span class="a-list-item">Internal Zippered Mesh Pocket with Key Clip</span></li><li><span class="a-list-item">25L [20in x 13in x 6in] [52cm x 32cm x 16cm], 1.8 lbs. 0.8kg</span></li></ul>','2019-05-26 23:11:39',NULL,'2019-05-26 16:17:50','uploadImg/20190526\dda1d97783b2c2ed63e4111561b00b6a.jpg','uploadImg/20190526\bedad906af08552ff93c76e21c3f5513.jpg','uploadImg/20190526\ddad0650a96a65f28d4c663a273b3998.jpg','uploadImg/20190526\3292e838cfbeb00450a9d864babd817d.jpg','uploadImg/20190526\573b4713bf2d332802470bebcf1f3b92.jpg','uploadImg/20190526\02f162dadcd1393c1ea32f6faea8eea2.jpg');


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
INSERT INTO `purchased` VALUES ('111','a7laya','746','123','uploadReview/20190527\6bcb18a3b137b66ea41d727532b13526.jpg',NULL,'2019-05-26 23:11:39',NULL,'2019-05-27 19:32:17','2','wo kao','75739899@qq.com');
INSERT INTO `purchased` VALUES ('112','a7laya','743','1231232','uploadReview/20190528\aa5586dd1d1698da48be112b82293a87.jpg',NULL,'2019-05-27 08:28:33',NULL,'2019-05-28 09:46:36','2','wo kao','75739899@qq.com');
INSERT INTO `purchased` VALUES ('116','a7laya','645','123','uploadReview/20190527\d055a728a2952896b089bc2cd4da128e.jpg',NULL,'2019-05-27 12:40:53',NULL,'2019-05-27 20:38:59','2','wo kao','75739899@qq.com');
INSERT INTO `purchased` VALUES ('117','a7laya','611','123','uploadReview/20190527\c802199ef297922015bb6b5183510efa.jpg',NULL,'2019-05-27 19:29:27',NULL,'2019-05-27 20:39:13','2','wo kao','75739899@qq.com');
INSERT INTO `purchased` VALUES ('118','a7laya','640',NULL,NULL,NULL,'2019-05-29 11:02:04',NULL,'2019-05-29 11:02:04','0','wo kao','75739899@qq.com');


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
INSERT INTO `seller` VALUES ('1','Laya',NULL,'2019-05-26 16:17:09','2019-05-23 23:34:10');
INSERT INTO `seller` VALUES ('2','seller_one',NULL,'2019-05-25 10:37:32','2019-05-24 19:49:04');
INSERT INTO `seller` VALUES ('3','laya3','2019-05-25 13:10:49','2019-05-25 13:10:49','2019-05-25 13:10:13');
INSERT INTO `seller` VALUES ('4','laya4',NULL,'2019-05-25 13:10:19','2019-05-25 13:10:19');


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
INSERT INTO `setting` VALUES ('1','<p class="MsoNormal"><span>Please feel free to contact us if you have any other questions.</span></p><p>Email ：COMAZON1@COMAZON.com</p><p>Tel: 123123123</p>','COMAZON1','2019-05-21 10:05:21','2019-05-27 19:37:58',NULL);


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
INSERT INTO `user` VALUES ('45','a7laya','c59d855f0b7e2941ee19faa5f59b028a','75@qq.com','2019-04-23 16:15:20',NULL,'2019-05-29 11:02:04','121131123123','75739899@qq.com','wo kao','','127.0.0.1','2019-05-29 19:38:32',NULL);
INSERT INTO `user` VALUES ('46','a8laya','c59d855f0b7e2941ee19faa5f59b028a','123@123.com','2019-04-23 21:50:52','2019-05-20 21:08:55','2019-05-20 21:08:55',NULL,NULL,NULL,NULL,'127.0.0.1','2019-05-19 18:38:24',NULL);
INSERT INTO `user` VALUES ('47','a9laya','c59d855f0b7e2941ee19faa5f59b028a','a9laya@qq.com','2019-04-24 17:03:49','2019-05-20 21:09:00','2019-05-20 21:09:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `user` VALUES ('48','a10laya','c59d855f0b7e2941ee19faa5f59b028a','a10laya@qq.com','2019-04-24 22:48:54',NULL,'2019-05-22 10:35:45','123123','zzzzz','','',NULL,NULL,NULL);
INSERT INTO `user` VALUES ('49','a12laya','c59d855f0b7e2941ee19faa5f59b028a','123456@qq.com','2019-05-06 22:19:48','2019-05-15 10:13:55','2019-05-15 10:13:55',NULL,NULL,NULL,NULL,'127.0.0.1','2019-05-27 10:50:58',NULL);
INSERT INTO `user` VALUES ('50','a12laya12','c59d855f0b7e2941ee19faa5f59b028a','123123@123.com','2019-05-20 13:57:30',NULL,'2019-05-20 13:57:30',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `user` VALUES ('51','a12laya','c59d855f0b7e2941ee19faa5f59b028a','a12laya@123.com','2019-05-20 14:12:19',NULL,'2019-05-26 12:34:49','','123','123','','127.0.0.1','2019-05-27 10:50:58',NULL);
INSERT INTO `user` VALUES ('52','a213123','c59d855f0b7e2941ee19faa5f59b028a','asdasd@123.com','2019-05-20 14:14:32','2019-05-20 23:15:41','2019-05-20 23:15:41',NULL,NULL,NULL,NULL,NULL,NULL,'48HCLf');
INSERT INTO `user` VALUES ('57','a17laya','c59d855f0b7e2941ee19faa5f59b028a','123@321.com','2019-05-20 16:15:42',NULL,'2019-05-20 23:04:19','','123','','我看看',NULL,NULL,'bhnM1x');
INSERT INTO `user` VALUES ('58','a22laya1','c59d855f0b7e2941ee19faa5f59b028a','a8laau@213.com','2019-05-20 16:47:24',NULL,'2019-05-20 22:57:30','1','123','123','123',NULL,NULL,'48HCLf');
INSERT INTO `user` VALUES ('59','a21laya','c59d855f0b7e2941ee19faa5f59b028a','123@213.com','2019-05-20 16:48:52',NULL,'2019-05-22 08:53:58','123','123','','123',NULL,NULL,'tZvf7O');
INSERT INTO `user` VALUES ('60','admin','c59d855f0b7e2941ee19faa5f59b028a','admin@123.com','2019-05-20 21:16:30',NULL,'2019-05-22 10:35:01','00000','123','123','123','127.0.0.1','2019-05-20 23:08:37','PqEKZl');


-- ----------------------------
-- View structure for vproduct
-- ----------------------------
DROP VIEW IF EXISTS `vproduct`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vproduct` AS select `p`.`product_id` AS `product_id`,`p`.`seller_id` AS `seller_id`,`s`.`seller_name` AS `seller_name`,`p`.`ASIN` AS `ASIN`,`p`.`title` AS `title`,`p`.`quantity` AS `quantity`,`p`.`price` AS `price`,`p`.`img_url` AS `img_url`,`p`.`description` AS `description`,`p`.`img_url2` AS `img_url2`,`p`.`img_url3` AS `img_url3`,`p`.`img_url4` AS `img_url4`,`p`.`img_url5` AS `img_url5`,`p`.`img_url6` AS `img_url6`,`p`.`img_url7` AS `img_url7`,`p`.`delete_time` AS `delete_time`,`p`.`update_time` AS `update_time`,`p`.`create_time` AS `create_time` from (`product` `p` join `seller` `s` on((`p`.`seller_id` = `s`.`seller_id`)));

-- ----------------------------
-- View structure for vpurchased
-- ----------------------------
DROP VIEW IF EXISTS `vpurchased`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpurchased` AS select `a`.`status` AS `status`,`a`.`address` AS `address`,`a`.`paypal` AS `paypal`,`a`.`purchased_id` AS `purchased_id`,`a`.`username` AS `username`,`a`.`ts` AS `ts`,`a`.`order_id` AS `order_id`,`a`.`review_img` AS `review_img`,`a`.`admin_review` AS `admin_review`,`a`.`delete_time` AS `delete_time`,`a`.`update_time` AS `update_time`,`b`.`seller_id` AS `seller_id`,`b`.`ASIN` AS `ASIN`,`b`.`title` AS `title`,`b`.`price` AS `price`,`b`.`img_url` AS `img_url`,`b`.`description` AS `description`,`b`.`product_id` AS `product_id`,`c`.`user_id` AS `user_id`,`c`.`email` AS `email`,`d`.`seller_name` AS `seller_name` from (((`purchased` `a` join `product` `b` on((`a`.`product_id` = `b`.`product_id`))) join `user` `c` on((`a`.`username` = `c`.`username`))) join `seller` `d` on((`b`.`seller_id` = `d`.`seller_id`))) where isnull(`c`.`delete_time`);

