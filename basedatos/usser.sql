/*
Navicat MySQL Data Transfer

Source Server         : Myconection
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : usser

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-05-08 07:12:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', 'admin', '$2y$10$OqYcrSQ4s3t53qe8EdYEnuAO7aQJ/4j4Hpq6KmdBQDOO4Tj/9A7oO', '');
INSERT INTO `usuario` VALUES ('2', 'davidlisboaabad', '$2y$10$lh.ijWVa6iQe8d5U6YaPKuNYRd55is6F2Sq1pS/0.qtbYY.rsv2nK', '');
INSERT INTO `usuario` VALUES ('3', 'franklisboaabad123', '$2y$10$THP7kOZ/2QQq7fwPvuDt2eqRB8lN5leXdhl0kO4nD5f.Ob1zp0Q9G', '');
