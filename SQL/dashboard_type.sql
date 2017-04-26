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
-- naplni udaje pre widgety
-- ----------------------------
INSERT INTO `dashboard_type` VALUES ('1', 'Min', 'panel-primary', 'fa-thermometer-half', null, 'Minimal', '3');
INSERT INTO `dashboard_type` VALUES ('2', 'Max', 'panel-green', 'fa-thermometer-full', null, 'Maximal', '3');
INSERT INTO `dashboard_type` VALUES ('3', 'Last', 'panel-green', 'fa-calendar-plus-o', null, 'Last value', '6');
INSERT INTO `dashboard_type` VALUES ('4', 'Graf', 'panel-default', 'fa-thermometer-half', null, 'Graf', '6');