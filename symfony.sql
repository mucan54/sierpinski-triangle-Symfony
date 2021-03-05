/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80021
 Source Host           : localhost:3306
 Source Schema         : symfony

 Target Server Type    : MySQL
 Target Server Version : 80021
 File Encoding         : 65001

 Date: 03/02/2021 08:17:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for doctrine_migration_versions
-- ----------------------------
DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of doctrine_migration_versions
-- ----------------------------
BEGIN;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20210201144944', '2021-02-01 14:50:09', 126);
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20210201150652', '2021-02-01 15:07:01', 185);
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20210201150926', '2021-02-01 15:09:31', 218);
COMMIT;

-- ----------------------------
-- Table structure for login
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of login
-- ----------------------------
BEGIN;
INSERT INTO `login` VALUES (1, 'asd@asd.com', '127.0.0.1', '2021-02-01 15:19:27', '1');
INSERT INTO `login` VALUES (2, 'asd@asd.com', '127.0.0.1', '2021-02-01 15:20:03', '1');
INSERT INTO `login` VALUES (3, 'asd@asd.com', '127.0.0.1', '2021-02-03 04:37:32', '1');
INSERT INTO `login` VALUES (4, 'asd@asd.com', '127.0.0.1', '2021-02-03 04:55:48', '1');
INSERT INTO `login` VALUES (5, 'asd@asd.com', '127.0.0.1', '2021-02-03 05:05:34', '1');
INSERT INTO `login` VALUES (6, 'asd@asd.com', '127.0.0.1', '2021-02-03 05:05:50', '1');
INSERT INTO `login` VALUES (7, 'asd@asd.com', '127.0.0.1', '2021-02-03 05:06:17', '1');
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES (1, 'asd@asd.com', '[]', '$2y$13$7s9W1EYc1b8zKpeZs1WybuKJpkZdasXGWHiUClTLtPVRs.PlFt46G');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
