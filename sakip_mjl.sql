/*
 Navicat Premium Data Transfer

 Source Server         : Lokal
 Source Server Type    : MySQL
 Source Server Version : 50731
 Source Host           : localhost:3306
 Source Schema         : sakip_mjl

 Target Server Type    : MySQL
 Target Server Version : 50731
 File Encoding         : 65001

 Date: 10/05/2021 00:50:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2021_02_23_055730_tmlevel', 1);
INSERT INTO `migrations` VALUES (2, '2021_05_07_155106_tmunitkerja', 1);
INSERT INTO `migrations` VALUES (4, '2021_05_07_155146_tminstansi', 1);
INSERT INTO `migrations` VALUES (5, '2021_05_07_160029_tminformasi', 1);
INSERT INTO `migrations` VALUES (6, '2021_05_07_160043_tmhalaman', 1);
INSERT INTO `migrations` VALUES (7, '2021_05_07_160359_tmtahunopd', 1);
INSERT INTO `migrations` VALUES (8, '2021_05_07_160646_tmparameterdoc', 1);

-- ----------------------------
-- Table structure for tmhalaman
-- ----------------------------
DROP TABLE IF EXISTS `tmhalaman`;
CREATE TABLE `tmhalaman`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tmhalaman
-- ----------------------------

-- ----------------------------
-- Table structure for tminformasi
-- ----------------------------
DROP TABLE IF EXISTS `tminformasi`;
CREATE TABLE `tminformasi`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tminformasi
-- ----------------------------

-- ----------------------------
-- Table structure for tminstansi
-- ----------------------------
DROP TABLE IF EXISTS `tminstansi`;
CREATE TABLE `tminstansi`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_instansi` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jalan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepala` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengukuhan` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perda_dasr` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tminstansi
-- ----------------------------

-- ----------------------------
-- Table structure for tmlevel
-- ----------------------------
DROP TABLE IF EXISTS `tmlevel`;
CREATE TABLE `tmlevel`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `level_kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tmlevel
-- ----------------------------

-- ----------------------------
-- Table structure for tmparatemterdoc
-- ----------------------------
DROP TABLE IF EXISTS `tmparatemterdoc`;
CREATE TABLE `tmparatemterdoc`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tmtahunopd_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tmparatemterdoc
-- ----------------------------
INSERT INTO `tmparatemterdoc` VALUES (3, '1', 'DD', 'DD', '1', '2021-05-09 17:37:21', '2021-05-09 17:37:21');

-- ----------------------------
-- Table structure for tmtahunopd
-- ----------------------------
DROP TABLE IF EXISTS `tmtahunopd`;
CREATE TABLE `tmtahunopd`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tahun` date NOT NULL,
  `aktif` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tmtahunopd
-- ----------------------------
INSERT INTO `tmtahunopd` VALUES (1, '0000-00-00', '1', '1', '2021-05-08 06:04:48', '2021-05-08 06:04:48');

-- ----------------------------
-- Table structure for tmunitkerja
-- ----------------------------
DROP TABLE IF EXISTS `tmunitkerja`;
CREATE TABLE `tmunitkerja`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tmunitkerja
-- ----------------------------
INSERT INTO `tmunitkerja` VALUES (2, 'DINAS PENDIDIKA', '23A', '1', '2021-05-08 06:00:16', '2021-05-08 06:00:16');

-- ----------------------------
-- Table structure for tmuploaddonwload
-- ----------------------------
DROP TABLE IF EXISTS `tmuploaddonwload`;
CREATE TABLE `tmuploaddonwload`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tmunitkerja_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmparameterdoc_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `namafile` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_file` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `ket` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tmuploaddonwload
-- ----------------------------
INSERT INTO `tmuploaddonwload` VALUES (1, '2', '1', '240-21-05-09.jpg', 'DD', '1', '2021-05-09 10:04:19', '2021-05-09 17:28:07', NULL);
INSERT INTO `tmuploaddonwload` VALUES (2, '2', '3', '268-21-05-09.jpg', 'DD', '1', '2021-05-09 17:40:16', '2021-05-09 17:40:16', NULL);

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
INSERT INTO `users` VALUES (1, 'SAKIP SUPER USER', 'admin', 'admin@ads.com', NULL, '$2y$10$0lr5R1.wHzJG8rgfuUJIn.ntHIOxrb.qQ8sKu9Fx0aVi7DoMP1ac2', '132-21-03-31.png', '1', '1', NULL, '2021-03-26 23:45:09', NULL);
INSERT INTO `users` VALUES (6, 'Operator', 'operator', 'operator@gmail.com', NULL, '$2y$10$dzHvpgoZpD9czsjupOXT7uOrYm71yOYSyhu3AF8N9BL5UW8uMB4oG', NULL, '1', '7', NULL, NULL, '2021-03-25 18:56:57');
INSERT INTO `users` VALUES (8, 'Sumargono', 'margono', 'margono@ptlmp.my.id', NULL, '$2y$10$0lr5R1.wHzJG8rgfuUJIn.ntHIOxrb.qQ8sKu9Fx0aVi7DoMP1ac2', NULL, '2', '8', 'Rvyv6A08pijPrnAxznPqVSrFDw4eDCd1KqdaoYF5Kp5UuYSe8vvOLvr9Dscz', NULL, '2021-03-31 16:07:21');
INSERT INTO `users` VALUES (9, '1231', 'rezqy', '131@asda.com', NULL, '$2y$10$.o/WdrYx1UV1lx2VnU8rSedTH1pUSNTHkQn9/yRdpMLase.QLZIum', '261-21-03-31.png', '2', '8', NULL, '2021-03-31 02:31:27', '2021-03-31 02:31:27');
INSERT INTO `users` VALUES (10, 'adad', 'asda', 'asd@asda.com', NULL, '$2y$10$gUDlaGidz05EZxUnAdBp2OVVSKvlnfNfk8KCsqVwwbbpMoT8aBvPG', '180-21-03-31.jpg', '2', '7', NULL, '2021-03-31 07:53:19', '2021-03-31 07:53:19');

SET FOREIGN_KEY_CHECKS = 1;
