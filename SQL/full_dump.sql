/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50718
Source Host           : localhost:3306
Source Database       : iot

Target Server Type    : MYSQL
Target Server Version : 50718
File Encoding         : 65001

Date: 2017-04-25 20:53:21
*/

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
-- View structure for w_dashboard
-- ----------------------------
DROP VIEW IF EXISTS `w_dashboard`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `w_dashboard` AS select `dashboard`.`id` AS `id`,`dashboard`.`user_id` AS `user_id`,`dashboard`.`device_id` AS `device_id`,`dashboard`.`type_id` AS `type_id`,`dashboard`.`updated_at` AS `updated_at`,`dashboard`.`created_at` AS `created_at`,`dashboard_type`.`name` AS `name`,`dashboard_type`.`style` AS `style`,`dashboard_type`.`icon` AS `icon`,`dashboard_type`.`param` AS `param`,`dashboard_type`.`text` AS `text`,`dashboard_type`.`size` AS `size`,`device`.`device_name` AS `device_name`,`type`.`unit` AS `unit` from (((`dashboard` join `dashboard_type` on((`dashboard`.`type_id` = `dashboard_type`.`id`))) join `device` on((`dashboard`.`device_id` = `device`.`id_device`))) join `type` on((`device`.`id_type` = `type`.`id_type`))) ;
SET FOREIGN_KEY_CHECKS=1;
