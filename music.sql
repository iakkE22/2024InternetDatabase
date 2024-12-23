/*
 Navicat Premium Data Transfer

 Source Server         : DEPENDS
 Source Server Type    : MySQL
 Source Server Version : 80019
 Source Host           : localhost:3306
 Source Schema         : music

 Target Server Type    : MySQL
 Target Server Version : 80019
 File Encoding         : 65001

 Date: 23/12/2024 18:15:49
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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of artists
-- ----------------------------
INSERT INTO `artists` VALUES (1, '祁厅长', '祁同伟，别称“祁厅长”。 电视剧《人民的名义》中的反派角色，由许亚军饰演。 剧中设定为汉东省公安厅长，毕业于汉东大学政法系，同时也是高育良学生、侯亮平和陈海学长。 其形象部分参考了天津市公安局原党委书记武长顺的案例。', '/uploads/profiles/artist1.jpg');
INSERT INTO `artists` VALUES (2, '木棉', '可以的', '/uploads/profiles/artist1.jpg');
INSERT INTO `artists` VALUES (3, 'G.E.M 邓紫棋', '邓紫棋（Gloria Tang Tsz-Kei），又名G.E.M.，中国香港创作型女歌手、词曲创作人。\r\n2008年7月10日以16岁之龄出道。同年10月16日发行首张EP《G.E.M.》，取得香港各大乐坛颁奖礼新人金奖。2011年5月，以19岁之龄在香港红馆举行5场个人演唱会。2012年7月，发行第四张个人专辑《Xposed》，凭借该专辑邓紫棋在2013年获得IFPI香港唱片销量大奖全年最高销量女歌手奖、最高销量国语唱片奖，并入围第24届金曲奖最佳国语女歌手奖。2014年1月，参加湖南卫视《我是歌手第二季》节目，获得总决赛亚军。3月31日，获第27届KCA美国儿童选择奖“最受欢迎亚洲艺人”。12月10日，邓紫棋的蜡像入驻香港杜莎夫人蜡像馆。2015年2月18日，参加2015年中央电视台春节联欢晚会，自弹自唱其自创的歌曲《多远都要在一起》。5月12日，再登福布斯中国名人榜，排名升至第11位 。2015年7月，未满24岁便完成80场个人演唱会。截至北京时间2015年11月22日伦敦温布利终站，《G.E.M.X.X.X.Live”世界巡回演唱会》已经完成73场。打破之前华语乐坛女歌手单轮巡演59场的记录。8月15日，确认加盟中国好声音第四季担任梦想导师。同年，成为首位在瑞士阿尔卑斯山脉少女峰11月6日，获MTV欧洲音乐奖“中国内地及香港地区最佳艺人奖”。 2018年11月4日，受邀参加美国NASA“科学突破奖”颁奖典礼，担任颁奖及表演嘉宾，演唱个人原创歌曲《光年之外》；11月19日，入选BBC“年度百大女性”举办音乐会的中国音乐人。2016年1月5日，邓紫棋入选《福布斯》\"全球30岁以下30位最具潜力杰出音乐人\" 。2019年12月，推出音乐专辑《摩天动物园》。2020年，凭借专辑《摩天动物园》获得第31届台湾金曲奖“评审团奖”；同年，成为流媒体平台Spotify全球最多串流收听次数华语女歌手，并获得Mnet亚洲音乐大奖“最佳亚洲艺人奖”。2021年，《光年之外》MV被吉尼斯世界纪录认证为“YouTube上观看次数最多的中文音乐视频”。2022年，发行录音室专辑《启示录》。2023年7月10日，发行全西语录音室专辑《Revelación》；11月26日，推出EP《T.I.M.E.》；12月，启动个人主题巡演《邓紫棋“I AM GLORIA”世界巡回演唱会》。2024年3月8日，翻唱歌曲《Amazing Grace》上线。', '');
INSERT INTO `artists` VALUES (4, 'aespa', 'aespa（에스파），韩国SM娱乐公司于2020年11月17日重磅推出的女子演唱组合，由金旼炡（WINTER）、刘知珉（KARINA）、宁艺卓（NINGNING）、内永枝利（GISELLE）四名成员携手四位AI成员(æ)共同组成。自出道以来，她们凭借独特的音乐风格和魅力迅速崭露头角。\r\n\r\n2020年11月17日，aespa发行首支数位单曲《Black Mamba》，宣告正式出道；短短一个月后，便斩获2020亚洲流行音乐大奖最佳新歌手（海外）荣誉。随后，她们连续获得Gaon Chart Music Awards音源部门年度新人奖、《人气歌谣》首个一位以及第30届首尔歌谣大赏新人赏等多项奖项。\r\n\r\n2021年，aespa的音乐之路越走越宽，发行了第二张数位单曲《Forever》、第三张数位单曲《Next Level》以及首张迷你专辑《Savage》。同年12月，她们还翻唱了SES的经典单曲《Dreams Come True》。这些优秀的作品为aespa赢得了人气与口碑上的双丰收，使其成为世界乐坛中被热议关注的焦点。\r\n\r\n进入2022年，aespa继续保持强劲势头，先后获得韩国第36届金唱片大赏“最佳新人奖”、发行第二张迷你专辑先行曲《怪火 (Illusion)》以及首支英文单曲《Life\'s Too Short》。同年8月，她们推出了第二张迷你专辑《Girls》，创下了韩国女子团体最高预购记录，也让aespa成为第一个首周销售超过100万的女子团体。\r\n\r\n2023年，aespa的步伐更加稳健，举办了首次单独演唱会“2023 aespa 1st Concert ‘SYNK : HYPER LINE’”，并发布了第三张迷你专辑《MY WORLD》和单曲《Better Things》。同年11月，她们发行了第四张迷你专辑《Drama》。\r\n\r\n2024年是aespa大放异彩的一年。她们接连发行了一些令人瞩目的作品，包括：Remake单曲《Regret of the Times (时代遗憾)》、正规专辑《Armageddon》以及日本出道单曲《Hot Mess》等。凭借《Supernova》《Armageddon》等作品大获成功，aespa在2024年获得了傲人成绩，于该年度甜瓜音乐奖中，囊括了年度艺人、年度专辑、年度歌曲等重要奖项，是K-POP唯一获得此殊荣的女子团体。', '');
INSERT INTO `artists` VALUES (5, 'Taylor Swift', 'Taylor Swift（泰勒·斯威夫特），1989年12月13日出生于美国宾夕法尼亚州，是美国著名的女歌手、词曲作者、音乐制作人及演员。自2006年发行首张专辑《Taylor Swift》起，她就以其出色的音乐才华和独特的创作风格吸引了无数粉丝。\r\n\r\n2008年，她的第二张专辑《Fearless》在美国公告牌专辑榜上蝉联11周冠军，荣获第52届格莱美奖“年度专辑奖”。随后，她不断突破自我，2010年的《Speak Now》和2012年的《Red》都取得了显著成绩。\r\n\r\n2014年，泰勒发行了备受期待的专辑《1989》，再次获得第58届格莱美奖“年度专辑奖”，并在同年被国际唱片业协会（IFPI）评为“2014年全球销量最高的音乐人”。\r\n\r\n泰勒的音乐事业持续高歌猛进，2017年的《reputation》让她成为拥有四张首周百万销量专辑的歌手，同时被《时代周刊》选为“年度人物”。2019年，她发行了专辑《Lover》，并获得第47届全美音乐奖“年度艺人奖”和“最受欢迎流行/摇滚女歌手奖”。\r\n\r\n2020年，泰勒再次惊艳世界，发行了专辑《folklore》和《evermore》，其中《folklore》荣获第63届格莱美奖“年度专辑奖”。2022年，她发行了专辑《Midnights》，并在2024年第66届格莱美奖颁奖礼上凭借此专辑获得“年度专辑奖”和“最佳流行专辑奖”，泰勒成为格莱美史上首位四次获得“年度专辑奖”的歌手。\r\n\r\n泰勒的音乐之路仍在继续，2023年她发行了多首新歌以及重制专辑《Speak Now (Taylor\'s Version)》和《1989 (Taylor\'s Version)》。今年4月，她又带来了个人第11张音乐专辑《The Tortured Poets Department》，再次展现了她无尽的音乐创意，该专辑缔造了多项全球性榜单与实体专辑销售记录，更彰显了泰勒的超强影响力。\r\n\r\n泰勒在全球范围内已获得超过两亿张唱片的销量，是有史以来最畅销的音乐家之一。除此以外，她还获得了包括14项格莱美奖在内的多个重要奖项，且拥有多项世界纪录，当之无愧是世界乐坛的一颗耀眼明星。', '');
INSERT INTO `artists` VALUES (6, 'IVE', 'IVE（아이브），这个由Starship Entertainment于2021年12月1日重磅推出的韩国女子演唱组合，汇聚了安俞真 (YUJIN)、秋天 (GAEUL)、张员瑛 (WONYOUNG)、丽兹 (LIZ)、怜 (Rei) 和李瑞 (LEESEO) 六位才华横溢的成员。自出道以来，她们凭借出色的音乐实力和魅力迅速崭露头角。\r\n\r\n2021年12月1日，IVE发行首张单曲专辑《ELEVEN》并正式出道，一举打破韩国女团出道唱片最高初动纪录。紧接着，她们在《Show Champion》节目中斩获一位佳绩，随后又连续在各大音乐节目中获得十三个冠军，展现了强大的实力。\r\n\r\n2022年，IVE继续发力，发行了第二张单曲专辑《LOVE DIVE》和第三张单曲专辑《After LIKE》，并在日本发行了日语单曲一辑《ELEVEN -Japanese ver.-》，正式进军日本市场。同年11月，她们在2022年Mnet亚洲音乐大奖上斩获年度歌曲大赏和最佳女子新人等四座大奖。\r\n\r\n2023年，IVE的步伐依然稳健，发布了先行单曲《Kitsch》、首张正规专辑《I’ve IVE》以及迷你1辑《I\'VE MINE》。2024年，她们继续拓展音乐版图，发行了首张英文单曲《All Night》、迷你二辑《IVE SWITCH》以及日语EP《ALIVE》。\r\n\r\nIVE凭借出色的音乐才华和不断进取的精神，赢得了全球粉丝的喜爱。2024年11月22日，她们更是荣获2024MAMA全球表演奖和全球最受欢迎女团奖，再次证明了她们在国际舞台上的影响力。', '');
INSERT INTO `artists` VALUES (7, '(G)I-DLE', '(G)I-DLE，这个由Cube Entertainment于2018年5月2日推出的韩国女子演唱组合，由曺薇娟、Minnie、田小娟、宋雨琦、叶舒华五位成员组成，团名寓意着“不同个性的女孩子聚集在一起”。自出道以来，(G)I-DLE凭借其独特的音乐风格和魅力，迅速在韩国乐坛崭露头角。\r\n\r\n2018年5月2日，(G)I-DLE发行首张迷你专辑《I am》，并在首尔举行出道Showcase，随后凭借主打歌在音乐节目《THE SHOW》中获得了出道后的首个一位。同年8月14日，发行首张数位单曲《HANN（Alone）》，展现了她们在音乐上的才华。\r\n\r\n2019年，(G)I-DLE继续发力，发行了第二张迷你专辑《I made》、第二张数位单曲《Uh-Oh》，并在7月31日发行首张日文迷你专辑《LATATA》，正式在日本出道。\r\n\r\n2020年，她们发行了第三张迷你专辑《I trust》，以及夏日特别单曲《DUMDi DUMDi》，展现了她们在不同音乐风格上的驾驭能力。\r\n\r\n2021年，(G)I-DLE发行第四张迷你专辑《I burn》，并在8月14日经历成员变动，以五人体制继续活动。2022年3月14日，她们发行了首张正规专辑《I NEVER DIE》，展现了更加成熟的音乐风格。且主打歌《TOMBOY 》在韩国Circle数字榜排行榜上获得冠军，随后的单曲《Nxde》同样登上排行榜第一，使他们成为2022年唯一在韩国取得两次“Perfect all-kill”成就的艺人。\r\n\r\n2023年，(G)I-DLE继续拓展音乐领域，发行了第六张迷你专辑《I feel》（她们首张在韩国销量突破百万的作品）、首支英文单曲《I DO》，以及首张全英文EP《HEAT》。\r\n\r\n2024年她们更是火力全开，先后发行了第二张正规专辑《[2]》和第七张迷你专辑《I SWAY》。11月，(G)I-DLE频频亮相于韩国各音乐盛典，摘得2024MAMA奖“最佳声乐表演团体”奖、2024MMA“年度制作”奖等荣誉，再次证明了她们在音乐领域的实力。\r\n\r\n(G)I-DLE的音乐作品不断突破自我，以“自我制作型”偶像团体而闻名。她们在韩国乐坛和国际舞台上都取得了不俗的成绩，成为了备受瞩目的女子演唱组合。', '');

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of playlistcomments
-- ----------------------------
INSERT INTO `playlistcomments` VALUES (1, 1, 1, '你好你好', '2024-12-23 12:01:19');
INSERT INTO `playlistcomments` VALUES (2, 2, 1, '你好', '2024-12-23 07:28:59');
INSERT INTO `playlistcomments` VALUES (3, 1, 1, '请进行评论', '2024-12-23 07:29:21');
INSERT INTO `playlistcomments` VALUES (4, 1, 1, '你好', '2024-12-23 09:32:33');

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of songs
-- ----------------------------
INSERT INTO `songs` VALUES (1, '鸳鸯戏', 1, '/uploads/musics/鸳鸯戏.mp3', '/music-project/assets/images/song_covers/cto.jpg');
INSERT INTO `songs` VALUES (2, 'native-american-flute', 2, '@\\assets\\audio\\lightmusics\\native-american-flute-277509.mp3', '/music-project/assets/images/song_covers/cto.jpg');
INSERT INTO `songs` VALUES (3, 'passacaglia', 2, '@\\assets\\audio\\lightmusics\\passacaglia-204294.mp3', '/music-project/assets/images/song_covers/cto.jpg');
INSERT INTO `songs` VALUES (4, 'snowfall', 2, '@\\assets\\audio\\lightmusics\\snowfall-ambient-music-258684.mp3', '/music-project/assets/images/song_covers/cto.jpg');
INSERT INTO `songs` VALUES (5, 'soft-synth', 2, '@\\assets\\audio\\lightmusics\\soft-synth-music-242044.mp3', '/music-project/assets/images/song_covers/cto.jpg');
INSERT INTO `songs` VALUES (6, 'GLORIA', 3, '/music-project/assets/audio/GEM/GLORIA.mp3', '/music-project/assets/images/song_covers/启示录cover.jpg');
INSERT INTO `songs` VALUES (7, '你不是真正的快乐', 3, '/music-project/assets/audio/GEM/你不是真正的快乐.mp3', '');
INSERT INTO `songs` VALUES (8, '天空没有极限', 3, '/music-project/assets/audio/GEM/天空没有极限.mp3', '/music-project/assets/images/song_covers/启示录cover.jpg');
INSERT INTO `songs` VALUES (9, '老人与海', 3, '/music-project/assets/audio/GEM/老人与海.mp3', '/music-project/assets/images/song_covers/启示录cover.jpg');
INSERT INTO `songs` VALUES (10, 'Armageddon', 4, '/music-project/assets/audio/kpop/Armageddon.mp3', '');
INSERT INTO `songs` VALUES (11, 'Drama', 4, '/music-project/assets/audio/kpop/Drama.mp3', '');
INSERT INTO `songs` VALUES (12, 'Supernova', 4, '/music-project/assets/audio/kpop/Supernova.mp3', '');
INSERT INTO `songs` VALUES (13, 'Whiplash', 4, '/music-project/assets/audio/kpop/Whiplash.mp3', '');
INSERT INTO `songs` VALUES (14, 'Cruel Summer', 5, '/music-project/assets/audio/POP/Cruel Summer.mp3', '');
INSERT INTO `songs` VALUES (15, 'Daylight', 5, '/music-project/assets/audio/POP/Daylight.mp3', '');
INSERT INTO `songs` VALUES (16, 'Lover', 5, '/music-project/assets/audio/POP/Lover.mp3', '');
INSERT INTO `songs` VALUES (17, 'You Need To Calm Down', 5, '/music-project/assets/audio/POP/You Need To Calm Down.mp3', '');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `UserID` int(0) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`UserID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin');

SET FOREIGN_KEY_CHECKS = 1;
