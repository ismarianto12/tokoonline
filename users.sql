/*
 Navicat Premium Data Transfer

 Source Server         : Lokal
 Source Server Type    : MySQL
 Source Server Version : 50731
 Source Host           : localhost:3306
 Source Schema         : spk_database

 Target Server Type    : MySQL
 Target Server Version : 50731
 File Encoding         : 65001

 Date: 07/05/2021 23:35:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tmlevel_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmproyek_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin LTMP', 'admin', 'admin@ads.com', NULL, '$2y$10$0lr5R1.wHzJG8rgfuUJIn.ntHIOxrb.qQ8sKu9Fx0aVi7DoMP1ac2', '132-21-03-31.png', '1', '1', NULL, '2021-03-26 23:45:09', NULL);
INSERT INTO `users` VALUES (6, 'Operator', 'operator', 'operator@gmail.com', NULL, '$2y$10$dzHvpgoZpD9czsjupOXT7uOrYm71yOYSyhu3AF8N9BL5UW8uMB4oG', NULL, '1', '7', NULL, NULL, '2021-03-25 18:56:57');
INSERT INTO `users` VALUES (8, 'Sumargono', 'margono', 'margono@ptlmp.my.id', NULL, '$2y$10$0lr5R1.wHzJG8rgfuUJIn.ntHIOxrb.qQ8sKu9Fx0aVi7DoMP1ac2', NULL, '2', '8', 'Rvyv6A08pijPrnAxznPqVSrFDw4eDCd1KqdaoYF5Kp5UuYSe8vvOLvr9Dscz', NULL, '2021-03-31 16:07:21');
INSERT INTO `users` VALUES (9, '1231', 'rezqy', '131@asda.com', NULL, '$2y$10$.o/WdrYx1UV1lx2VnU8rSedTH1pUSNTHkQn9/yRdpMLase.QLZIum', '261-21-03-31.png', '2', '8', NULL, '2021-03-31 02:31:27', '2021-03-31 02:31:27');
INSERT INTO `users` VALUES (10, 'adad', 'asda', 'asd@asda.com', NULL, '$2y$10$gUDlaGidz05EZxUnAdBp2OVVSKvlnfNfk8KCsqVwwbbpMoT8aBvPG', '180-21-03-31.jpg', '2', '7', NULL, '2021-03-31 07:53:19', '2021-03-31 07:53:19');

SET FOREIGN_KEY_CHECKS = 1;
