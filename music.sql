/*
 Navicat Premium Data Transfer

 Source Server         : AAA建材王师傅
 Source Server Type    : MySQL
 Source Server Version : 80036
 Source Host           : localhost:3306
 Source Schema         : music

 Target Server Type    : MySQL
 Target Server Version : 80036
 File Encoding         : 65001

 Date: 23/12/2024 15:36:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `AdminID` int(0) NOT NULL,
  `Permissions` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`AdminID`) USING BTREE,
  CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `users` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (1, '高级');

-- ----------------------------
-- Table structure for artists
-- ----------------------------
DROP TABLE IF EXISTS `artists`;
CREATE TABLE `artists`  (
  `ArtistID` int(0) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `ProfilePic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ArtistID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of artists
-- ----------------------------
INSERT INTO `artists` VALUES (1, '祁厅长', '祁同伟，别称“祁厅长”。 电视剧《人民的名义》中的反派角色，由许亚军饰演。 剧中设定为汉东省公安厅长，毕业于汉东大学政法系，同时也是高育良学生、侯亮平和陈海学长。 其形象部分参考了天津市公安局原党委书记武长顺的案例。', '/uploads/profiles/artist1.jpg');
INSERT INTO `artists` VALUES (2, '木棉', '可以的', '/uploads/profiles/artist1.jpg');

-- ----------------------------
-- Table structure for developers
-- ----------------------------
DROP TABLE IF EXISTS `developers`;
CREATE TABLE `developers`  (
  `DeveloperID` int(0) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `GitHubLink` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`DeveloperID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for musicvideos
-- ----------------------------
DROP TABLE IF EXISTS `musicvideos`;
CREATE TABLE `musicvideos`  (
  `MVID` int(0) NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ArtistID` int(0) NOT NULL,
  `VideoPath` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`MVID`) USING BTREE,
  INDEX `ArtistID`(`ArtistID`) USING BTREE,
  CONSTRAINT `musicvideos_ibfk_1` FOREIGN KEY (`ArtistID`) REFERENCES `artists` (`ArtistID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of musicvideos
-- ----------------------------
INSERT INTO `musicvideos` VALUES (1, '鸳鸯戏MV', 1, '/uploads/mv/鸳鸯戏.mp4');

-- ----------------------------
-- Table structure for mvcomments
-- ----------------------------
DROP TABLE IF EXISTS `mvcomments`;
CREATE TABLE `mvcomments`  (
  `CommentID` int(0) NOT NULL AUTO_INCREMENT,
  `MVID` int(0) NOT NULL,
  `UserID` int(0) NOT NULL,
  `CommentText` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `CommentDate` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CommentID`) USING BTREE,
  INDEX `MVID`(`MVID`) USING BTREE,
  INDEX `UserID`(`UserID`) USING BTREE,
  CONSTRAINT `mvcomments_ibfk_1` FOREIGN KEY (`MVID`) REFERENCES `musicvideos` (`MVID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `mvcomments_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for mvlikes
-- ----------------------------
DROP TABLE IF EXISTS `mvlikes`;
CREATE TABLE `mvlikes`  (
  `MVID` int(0) NOT NULL,
  `LikeCount` int(0) NULL DEFAULT 0,
  PRIMARY KEY (`MVID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for playlist_songs
-- ----------------------------
DROP TABLE IF EXISTS `playlist_songs`;
CREATE TABLE `playlist_songs`  (
  `PlaylistID` int(0) NOT NULL,
  `SongID` int(0) NOT NULL,
  `AddedDate` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `OrderIndex` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`PlaylistID`, `SongID`) USING BTREE,
  INDEX `SongID`(`SongID`) USING BTREE,
  CONSTRAINT `playlist_songs_ibfk_1` FOREIGN KEY (`PlaylistID`) REFERENCES `playlists` (`PlaylistID`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `playlist_songs_ibfk_2` FOREIGN KEY (`SongID`) REFERENCES `songs` (`SongID`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of playlist_songs
-- ----------------------------
INSERT INTO `playlist_songs` VALUES (1, 2, '2024-12-23 02:03:31', 1);
INSERT INTO `playlist_songs` VALUES (1, 3, '2024-12-23 02:03:32', 2);
INSERT INTO `playlist_songs` VALUES (1, 4, '2024-12-23 02:03:34', 3);
INSERT INTO `playlist_songs` VALUES (1, 5, '2024-12-23 02:03:35', 4);

-- ----------------------------
-- Table structure for playlistcomments
-- ----------------------------
DROP TABLE IF EXISTS `playlistcomments`;
CREATE TABLE `playlistcomments`  (
  `CommentID` int(0) NOT NULL AUTO_INCREMENT,
  `PlaylistID` int(0) NOT NULL,
  `UserID` int(0) NOT NULL,
  `CommentText` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `CommentDate` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CommentID`) USING BTREE,
  INDEX `PlaylistID`(`PlaylistID`) USING BTREE,
  INDEX `UserID`(`UserID`) USING BTREE,
  CONSTRAINT `playlistcomments_ibfk_1` FOREIGN KEY (`PlaylistID`) REFERENCES `playlists` (`PlaylistID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `playlistcomments_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of playlistcomments
-- ----------------------------
INSERT INTO `playlistcomments` VALUES (1, 1, 1, '你好你好', '2024-12-23 12:01:19');
INSERT INTO `playlistcomments` VALUES (2, 2, 1, '你好', '2024-12-23 07:28:59');
INSERT INTO `playlistcomments` VALUES (3, 1, 1, '请进行评论', '2024-12-23 07:29:21');
INSERT INTO `playlistcomments` VALUES (4, 5, 1, '真的吗', '2024-12-23 07:50:49');
INSERT INTO `playlistcomments` VALUES (5, 1, 1, '你好', '2024-12-23 08:35:13');

-- ----------------------------
-- Table structure for playlistlikes
-- ----------------------------
DROP TABLE IF EXISTS `playlistlikes`;
CREATE TABLE `playlistlikes`  (
  `PlaylistID` int(0) NOT NULL,
  `LikeCount` int(0) NULL DEFAULT 0,
  PRIMARY KEY (`PlaylistID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for playlists
-- ----------------------------
DROP TABLE IF EXISTS `playlists`;
CREATE TABLE `playlists`  (
  `PlaylistID` int(0) NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `CoverImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`PlaylistID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of playlists
-- ----------------------------
INSERT INTO `playlists` VALUES (1, '轻音乐', '舒缓心情的轻音乐', '/music-project/assets/images/playlist_covers/light.jpg');
INSERT INTO `playlists` VALUES (2, '流行经典', '精选流行音乐合集', '/music-project/assets/images/playlist_covers/edm.jpg');
INSERT INTO `playlists` VALUES (3, '电子舞曲', '动感十足的电子乐', '/music-project/assets/images/playlist_covers/pop.jpg');
INSERT INTO `playlists` VALUES (4, '摇滚经典', '不可错过的摇滚金曲', '/music-project/assets/images/playlist_covers/rock.jpg');
INSERT INTO `playlists` VALUES (5, '爵士乐', '品味高雅的爵士乐', '/music-project/assets/images/playlist_covers/jazz.jpg');
INSERT INTO `playlists` VALUES (6, '古典音乐', '经典永恒的古典之声', '/music-project/assets/images/playlist_covers/classical.jpg');

-- ----------------------------
-- Table structure for songcomments
-- ----------------------------
DROP TABLE IF EXISTS `songcomments`;
CREATE TABLE `songcomments`  (
  `CommentID` int(0) NOT NULL AUTO_INCREMENT,
  `SongID` int(0) NOT NULL,
  `UserID` int(0) NOT NULL,
  `CommentText` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `CommentDate` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CommentID`) USING BTREE,
  INDEX `SongID`(`SongID`) USING BTREE,
  INDEX `UserID`(`UserID`) USING BTREE,
  CONSTRAINT `songcomments_ibfk_1` FOREIGN KEY (`SongID`) REFERENCES `songs` (`SongID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `songcomments_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of songcomments
-- ----------------------------
INSERT INTO `songcomments` VALUES (1, 1, 1, '祁厅长，我太想进步了', '2024-12-23 00:37:26');

-- ----------------------------
-- Table structure for songlikes
-- ----------------------------
DROP TABLE IF EXISTS `songlikes`;
CREATE TABLE `songlikes`  (
  `SongID` int(0) NOT NULL,
  `LikeCount` int(0) NULL DEFAULT 0,
  PRIMARY KEY (`SongID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for songs
-- ----------------------------
DROP TABLE IF EXISTS `songs`;
CREATE TABLE `songs`  (
  `SongID` int(0) NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ArtistID` int(0) NOT NULL,
  `FilePath` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `CoverImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`SongID`) USING BTREE,
  INDEX `ArtistID`(`ArtistID`) USING BTREE,
  CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`ArtistID`) REFERENCES `artists` (`ArtistID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of songs
-- ----------------------------
INSERT INTO `songs` VALUES (1, '鸳鸯戏', 1, '/uploads/musics/鸳鸯戏.mp3', '/music-project/assets/images/song_covers/cto.jpg');
INSERT INTO `songs` VALUES (2, 'native-american-flute', 2, '@\\assets\\audio\\lightmusics\\native-american-flute-277509.mp3', '/music-project/assets/images/song_covers/cto.jpg');
INSERT INTO `songs` VALUES (3, 'passacaglia', 2, '@\\assets\\audio\\lightmusics\\passacaglia-204294.mp3', '/music-project/assets/images/song_covers/cto.jpg');
INSERT INTO `songs` VALUES (4, 'snowfall', 2, '@\\assets\\audio\\lightmusics\\snowfall-ambient-music-258684.mp3', '/music-project/assets/images/song_covers/cto.jpg');
INSERT INTO `songs` VALUES (5, 'soft-synth', 2, '@\\assets\\audio\\lightmusics\\soft-synth-music-242044.mp3', '/music-project/assets/images/song_covers/cto.jpg');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `UserID` int(0) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`UserID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin');

SET FOREIGN_KEY_CHECKS = 1;
