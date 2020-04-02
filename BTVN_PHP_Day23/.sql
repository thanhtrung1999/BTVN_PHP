CREATE DATABASE `nhanvien`;
USE `nhanvien`;

SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `gender` tinyint(4) DEFAULT NULL,
  `salary` int(10) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

INSERT INTO `employees` VALUES ('1', 'manh', 'des manh', '1', '20000', '2019-11-12', '2019-11-03 22:41:49');
INSERT INTO `employees` VALUES ('2', 'nvmanh', 'des nvmanh', '0', '10000', '2018-12-12', '2019-11-03 22:42:12');
