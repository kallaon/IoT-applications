

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for dashboard
-- ----------------------------
DROP TABLE IF EXISTS `dashboard`;
CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `device_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` varchar(255) DEFAULT NULL,
  `style` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dashboard
-- ----------------------------
INSERT INTO `dashboard` VALUES ('81', '27', '15', '2', '2017-04-25 21:47:54', '2017-04-25 21:47:54', null);
INSERT INTO `dashboard` VALUES ('82', '27', '15', '4', '2017-04-25 21:48:26', '2017-04-25 21:48:26', null);

-- ----------------------------
-- Table structure for dashboard_type
-- ----------------------------
DROP TABLE IF EXISTS `dashboard_type`;
CREATE TABLE `dashboard_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `style` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `param` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `size` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dashboard_type
-- ----------------------------
INSERT INTO `dashboard_type` VALUES ('1', 'Min', 'panel-primary', 'fa-thermometer-half', null, 'Minimal', '3');
INSERT INTO `dashboard_type` VALUES ('2', 'Max', 'panel-green', 'fa-thermometer-full', null, 'Maximal', '3');
INSERT INTO `dashboard_type` VALUES ('3', 'Last', 'panel-green', 'fa-calendar-plus-o', null, 'Last value', '6');
INSERT INTO `dashboard_type` VALUES ('4', 'Graf', 'panel-default', 'fa-thermometer-half', null, 'Graf', '6');

-- ----------------------------
-- Table structure for device
-- ----------------------------
DROP TABLE IF EXISTS `device`;
CREATE TABLE `device` (
  `id_device` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `device_name` varchar(32) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `active` int(1) DEFAULT NULL,
  `unit` varchar(10) DEFAULT NULL,
  `unit1` varchar(10) DEFAULT NULL,
  `unit2` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_device`),
  KEY `id_user` (`user_id`),
  KEY `id_type` (`id_type`),
  CONSTRAINT `id_type` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`),
  CONSTRAINT `id_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of device
-- ----------------------------
INSERT INTO `device` VALUES ('2', '1', '1', 'OOOososo', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '111111', 'c', null, null);
INSERT INTO `device` VALUES ('11', '11', '1', 'prosim', '2017-04-03 21:32:13', '2017-04-03 21:32:13', null, 'c', null, null);
INSERT INTO `device` VALUES ('12', '11', '3', 'Este', '2017-04-03 21:36:55', '2017-04-03 21:36:55', null, 'c', null, null);
INSERT INTO `device` VALUES ('15', '27', '1', 'Teplomer vonku', '2017-04-13 22:55:14', '2017-04-13 22:55:14', null, 'b', null, null);
INSERT INTO `device` VALUES ('43', '27', '1', 'Teplomer1', '2017-04-24 16:28:47', '2017-04-24 16:28:47', null, 'ttt', null, null);

-- ----------------------------
-- Table structure for device_value
-- ----------------------------
DROP TABLE IF EXISTS `device_value`;
CREATE TABLE `device_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_device` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `device_val` decimal(63,0) NOT NULL,
  `unit` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_device` (`id_device`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of device_value
-- ----------------------------
INSERT INTO `device_value` VALUES ('1', '2', '2017-03-25 00:00:00', '0000-00-00 00:00:00', '22', 'c');
INSERT INTO `device_value` VALUES ('3', '15', '2017-04-04 11:18:54', '2017-04-04 11:18:54', '100', 'c');
INSERT INTO `device_value` VALUES ('4', '15', '2017-04-07 13:17:51', '2017-04-07 13:17:51', '100', 'c');
INSERT INTO `device_value` VALUES ('5', '15', '2017-04-07 13:17:59', '2017-04-07 13:17:59', '88', 'c');
INSERT INTO `device_value` VALUES ('6', '15', '2017-04-07 13:18:01', '2017-04-07 13:18:01', '44', 'c');
INSERT INTO `device_value` VALUES ('7', '15', '2017-04-07 13:18:03', '2017-04-07 13:18:03', '24', 'c');
INSERT INTO `device_value` VALUES ('8', '15', '2017-04-07 13:18:05', '2017-04-07 13:18:05', '1', 'c');
INSERT INTO `device_value` VALUES ('9', '15', '2017-04-07 13:18:06', '2017-04-07 13:18:06', '16', 'c');
INSERT INTO `device_value` VALUES ('10', '15', '2017-04-07 13:18:08', '2017-04-07 13:18:08', '56', 'c');
INSERT INTO `device_value` VALUES ('11', '15', '2017-04-07 13:18:10', '2017-04-07 13:18:10', '77', 'c');
INSERT INTO `device_value` VALUES ('14', '15', '2017-04-10 10:28:10', '2017-04-10 10:28:10', '456', 'c');
INSERT INTO `device_value` VALUES ('15', '15', '2017-04-10 10:29:08', '2017-04-10 10:29:08', '457', 'c');
INSERT INTO `device_value` VALUES ('16', '15', '2017-04-10 10:33:46', '2017-04-10 10:33:46', '500', 'c');
INSERT INTO `device_value` VALUES ('17', '15', '2017-04-24 14:49:07', '2017-04-24 14:49:15', '600', null);
INSERT INTO `device_value` VALUES ('18', '43', '2017-04-24 15:31:56', '2017-04-24 15:31:59', '5', null);
INSERT INTO `device_value` VALUES ('19', '43', '2017-04-24 15:32:07', '2017-04-24 15:32:10', '6', null);
INSERT INTO `device_value` VALUES ('20', '43', '2017-04-24 15:48:22', '2017-04-24 15:48:29', '10', null);

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `device_name` varchar(32) NOT NULL,
  `unit` varchar(10) DEFAULT NULL,
  `unit1` varchar(10) DEFAULT NULL,
  `unit21` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', 'thermometer', '°C', '°C', null);
INSERT INTO `type` VALUES ('2', 'hygrometer', '%', '%', null);
INSERT INTO `type` VALUES ('3', 'barometer', 'bar', 'bar', null);
INSERT INTO `type` VALUES ('4', 'tet', 'jeno', null, null);
INSERT INTO `type` VALUES ('6', 'refer fer e', 'ererere', null, null);
INSERT INTO `type` VALUES ('7', 'ffsfs', 'dfgdg', null, null);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `api_key` varchar(32) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'meno', 'lloooo@sssl.sk', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-03-22 17:19:51', '2017-03-22 17:21:34', '84fa661ed3b0a6c8cd0bdb8f8919ae27');
INSERT INTO `user` VALUES ('2', 'heslo', 'ssssssss@sss.sk', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-03-24 14:57:27', '2017-03-24 14:57:27', '4ed9652a7576a11db691e79ebe803ae4');
INSERT INTO `user` VALUES ('3', 'heslo', 'dsadasdas@sdasd.sk', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-03-24 18:20:05', '2017-03-24 18:20:05', '84a36d26fda4834a97a49f2bb768692a');
INSERT INTO `user` VALUES ('4', 'Testerko', 'templogin@androidhive.info', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-03-24 18:56:55', '2017-03-24 18:56:55', '9979b0c09964176c6505d745a11e61f9');
INSERT INTO `user` VALUES ('6', 'sdadasd', 'aaas@flow.sk', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-04-02 11:32:05', '2017-04-02 11:32:05', '01700512b186dfa2bb92b357e151d2f8');
INSERT INTO `user` VALUES ('8', 'aaaaaaaaa', 'lloooo@sssl.sk', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-04-02 12:42:25', '2017-04-02 12:42:25', '361a1818f447b72d0fa246752a4c3019');
INSERT INTO `user` VALUES ('9', 'meno', 'lloooo@sssl.sk', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-04-02 12:43:30', '2017-04-02 12:43:30', 'd3bd5239de63aa6b82469c2d869124ef');
INSERT INTO `user` VALUES ('10', 'dnes', 'dnes@dnes.com', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-04-03 08:49:31', '2017-04-03 08:49:31', '051c97bd4289a9eef0b4f39f2a1231af');
INSERT INTO `user` VALUES ('11', 'toiste', 'toiste@toiste.com', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-04-03 09:37:21', '2017-04-03 19:51:06', '0e25c084bb8a1882be8bf54e842d6c16');
INSERT INTO `user` VALUES ('12', 'aaaaaa', 'aaaaaaaaaa', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'aaaaa');
INSERT INTO `user` VALUES ('13', 'asdasdad', 'asdasda', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-04-03 00:00:00', '2017-04-03 00:00:00', 'ada');
INSERT INTO `user` VALUES ('14', 'aaaaaaaaa', 'bakis@ma.ss', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '950d5437e1858e2f0c445e3d6b5b9708');
INSERT INTO `user` VALUES ('15', 'aaaaaaaaas', 'bakias@ma.ss', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-04-04 10:00:18', '0000-00-00 00:00:00', '9deb8d698846c06d712e30fbbae0fa57');
INSERT INTO `user` VALUES ('16', 'aaaaaaaaasaaaaaa', 'bakias@mas.ss', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-04-04 10:01:31', '2017-04-04 10:01:31', '309e37d5d03a3c662e19e8bf7fc3ee4c');
INSERT INTO `user` VALUES ('17', 'aaaaaaaaasaaaaaa', 'bakias@mddas.ss', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-04-04 10:45:44', '2017-04-04 10:45:44', '815a4454f6d4a5e82c9b96800c58a4e3');
INSERT INTO `user` VALUES ('18', 'aaaaaaaaasaaaaaa', 'bakias@mddas.ss', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-04-04 10:54:46', '2017-04-04 10:54:46', 'd0f6a212f8f8305753d8506c1146111c');
INSERT INTO `user` VALUES ('19', 'aaaaaaaaasaaaaaa', 'bakias@mddas.ss', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-04-04 10:54:48', '2017-04-04 10:54:48', '6960177e2e445a1ba9826e9faec8a3b3');
INSERT INTO `user` VALUES ('20', 'aaaaaaaaasaaaaaa', 'bakias@mddas.ss', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-04-04 10:54:50', '2017-04-04 10:54:50', 'b6fae06041c52a33f6c6509b50652622');
INSERT INTO `user` VALUES ('21', 'aaaaaaaaasaaaaaaa', 'bakias@mddas.ss', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-04-04 10:55:18', '2017-04-04 10:55:18', '6fb592e45339a9277549b86d25e732d7');
INSERT INTO `user` VALUES ('22', 'email', 'bakiass@mddas.ss', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-04-04 10:56:33', '2017-04-04 10:56:33', 'c50e6fc0b21707be27c348e87f900671');
INSERT INTO `user` VALUES ('23', 'hesloje', 'hesloje@hesloje.sk', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-04-04 11:13:25', '2017-04-04 11:13:25', '0a2c6659a9d2a3d01dccf9551ed41aee');
INSERT INTO `user` VALUES ('26', 'tomas', 'tomas@tomas.sk', '$10$CDqGF69Z5oi5oDxrXY0CBOKIlVE0klhEEXg0BpWm7yki6iYKM2cmy', '2017-04-13 22:52:39', '2017-04-13 22:52:39', 'af8dd6dd701b36dbe3518c6bdbdd2db6');
INSERT INTO `user` VALUES ('27', 'tom', 't@t.sk', '$2y$10$xqnKsGESo85.r51QPaV5oeEVLT7Wz2WFmkXqRZ1.8jHSo1Bnx4AQm', '2017-04-13 22:54:08', '2017-04-13 22:54:08', '47e0685817611b3628306ad0720c7c90');

-- ----------------------------
-- View structure for w_dashboard
-- ----------------------------
DROP VIEW IF EXISTS `w_dashboard`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `w_dashboard` AS select `dashboard`.`id` AS `id`,`dashboard`.`user_id` AS `user_id`,`dashboard`.`device_id` AS `device_id`,`dashboard`.`type_id` AS `type_id`,`dashboard`.`updated_at` AS `updated_at`,`dashboard`.`created_at` AS `created_at`,`dashboard_type`.`name` AS `name`,`dashboard_type`.`style` AS `style`,`dashboard_type`.`icon` AS `icon`,`dashboard_type`.`param` AS `param`,`dashboard_type`.`text` AS `text`,`dashboard_type`.`size` AS `size`,`device`.`device_name` AS `device_name`,`type`.`unit` AS `unit` from (((`dashboard` join `dashboard_type` on((`dashboard`.`type_id` = `dashboard_type`.`id`))) join `device` on((`dashboard`.`device_id` = `device`.`id_device`))) join `type` on((`device`.`id_type` = `type`.`id_type`))) ;
SET FOREIGN_KEY_CHECKS=1;
