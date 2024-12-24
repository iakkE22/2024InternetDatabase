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

 Date: 24/12/2024 19:37:56
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
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `artists` VALUES (8, 'Billie Eilish', 'Billie Eilish（比莉·艾利什），2001年出生于美国加州洛杉矶，是一位备受瞩目的美国女歌手兼词曲创作人。2015年，她凭借首支单曲《Ocean Eyes》在网络上崭露头角，迅速吸引了全球乐迷的目光。随后，她签约环球音乐旗下的新视镜唱片公司，并于2017年推出了个人首张EP《dont smile at me》。\r\n2019年，比莉·艾利什发行了首张个人录音室专辑《When We All Fall Asleep, Where Do We Go?》，其中的热门单曲《Bad Guy》成功登顶公告牌百强单曲榜。紧接着，她在2020年第62届格莱美奖上大放异彩，斩获年度制作、年度专辑、年度歌曲等五项大奖。\r\n2021年，比莉·艾利什再次获得两项格莱美奖，分别凭借《everything i wanted》和《No Time To Die》获得年度制作和最佳影视原创歌曲。同年，她的第二张个人录音室专辑《Happier Than Ever》问世，并入选《时代周刊》“全球最具影响力百人榜”。\r\n2022年，比莉·艾利什为电影《007：无暇赴死》献唱的主题曲《No Time To Die》荣获第94届奥斯卡金像奖最佳原创歌曲。2024年，她再次凭借为电影《芭比》演唱的主题曲《What Was I Made For?》在第66届格莱美奖上获得年度歌曲，并在第96届奥斯卡金像奖上再次斩获最佳原创歌曲。\r\n至今，比莉·艾利什共获得2项奥斯卡金像奖、9项格莱美奖，成为最年轻包揽格莱美奖四个通类奖项的艺人。她还曾入选《时代周刊》“全球最具影响力百人榜”，并被BBC评为“全球100位最具影响力女性”。作为第一位两次获得Apple music年度艺人的歌手，比莉·艾利什的音乐才华和影响力不容小觑。2024年5月发行的新专辑《HIT ME HARD AND SOFT》在全球 138个国家和地区的全类型专辑排行第1，再次证明她的音乐实力。', '');
INSERT INTO `artists` VALUES (9, 'BABYMONSTER', 'BABYMONSTER（베이비몬스터），一支充满活力的韩国女子演唱组合，由YG Entertainment于2023年重磅推出。成员包括申厦蓝（RAMI）、郑雅譞（AHYEON）、李茶仁（RORA）、榎并杏纱（ASA）、河井瑠花（RUKA）、CHIQUITA和PHARITA，共7位才华横溢的女孩组成。\r\n\r\n2023年11月27日，她们以一首动感十足的出道单曲《BATTER UP》震撼亮相，迅速登顶14个国家和地区的iTunes流行歌曲榜榜首，展现了她们强大的实力。紧接着，2024年2月1日，她们发行了出道专辑先行曲《Stuck In The Middle》，为粉丝们带来了更多的惊喜。\r\n\r\n3月31日，BABYMONSTER发行了她们的首张迷你专辑《BABYMONS7ER》，这张专辑不仅刷新了K-POP女团出道首周销量的纪录，而且主打曲《SHEESH》更是在YouTube平台上以惊人的速度达到了1亿次观看，成为了一部现象级的作品。\r\n\r\n今年11月1日，BABYMONSTER发行了首张正规专辑《Drip》，凭借这张专辑，她们创造出比以往更优秀的成绩。同名单曲《Drip》成为组合首次登上 Billboard 200 排行榜的歌曲，成员们出众的唱功、说唱实力和引以为傲的声线都让听众印象深刻。\r\n\r\n这支年轻的组合正以她们独特的魅力和才华，征服着全球的音乐市场，成为K-POP界的一股新势力。', '');
INSERT INTO `artists` VALUES (10, 'MEOVV', 'MEOVV（미야오）是THE BLACK LABEL于2024年9月6日推出的韩国女子唱跳组合，由SOOIN（金粹仁）、GAWON、ANNA（田中杏奈）、NARIN（罗潾）、ELLA五位成员组成。\r\n2024年9月6日，发行首支单曲《MEOW》正式出道，成员们在出道活动中凭借出色的唱跳技能和舞台控制力，带来了高质量的舞台表演，同时获得了好评 ；10月14日，组合提名2024年韩国MAMA奖“最佳女子新人组合”奖；11月15日，提名2024年韩国甜瓜音乐奖“年度最佳新人”奖 ；11月18日，发行第二张单曲专辑《TOXIC》，时隔两个月回归韩流乐坛。', '');
INSERT INTO `artists` VALUES (11, 'Kanye West', '坎耶·维斯特（Kanye West），又名Ye，1977年6月8日出生于美国乔治亚州亚特兰大，是一位多才多艺的美国说唱歌手、音乐制作人、商人和服装设计师。他的音乐生涯始于2000年，当时以Roc-a-Fella唱片公司音乐制作人的身份崭露头角。\n2003年，坎耶发行了首支个人单曲《Through the Wire》，随后在2004年推出了个人首张录音室专辑《The College Dropout》。这张专辑为他赢得了广泛的关注和好评。之后，他的音乐事业蒸蒸日上，2006年和2008年分别凭借歌曲《Gold Digger》和《Stronger》获得格莱美奖最佳说唱歌手奖。\n2010年，坎耶与Jay-Z和蕾哈娜合作的歌曲《Run This Town》赢得了第36届人民选择奖最受欢迎合唱奖。此后，他的音乐成就不断攀升，2013年凭借歌曲《Niggas in Paris》再次获得格莱美奖最佳说唱歌手奖。\n2015年，坎耶荣获MTV音乐录影带大奖迈克尔·杰克逊终生成就先锋奖，这是对他音乐生涯的极大肯定。2016年，他发行了个人第七张录音室专辑《The Life of Pablo》，再次引发乐坛热议。\n2018年，坎耶以Ye为艺名展开活动，展现了他在音乐领域的不断创新和突破。2021年，他发行了个人专辑《Donda》，紧接着在2022年，个人专辑《Donda 2》在Stem Player上独家发布。\n最近，坎耶与Ty Dolla $ign共同发行了歌曲《Vultures》，继续为乐迷带来更多精彩的音乐作品。坎耶·维斯特的音乐生涯充满了传奇色彩，他的才华和创造力不断为音乐界注入新的活力。', NULL);
INSERT INTO `artists` VALUES (12, '宋冬野', '宋冬野，1987年11月10日出生于中国北京，中国民谣歌手，音乐创作人。\n2009年，在豆瓣以独立音乐人的面貌，推出歌曲《抓住那个胖子》、《年年》、《嘿，裤衩儿》等歌曲。2011年，宋冬野推出歌曲《安和桥》、《就在不远的2013》 。\n2012年签约摩登天空， 单曲《董小姐》收录在2012年12月发行的《摩登天空7》中。2013年8月发行专辑《安和桥北》。2013年12月4日凭借专辑《安和桥北》荣获首届鲁迅文化奖年度音乐奖 。2014年8月15日，宋冬野推出第一支官方MV《斑马，斑马》。2018年6月23日，凭借《郭源潮》获得第29届台湾金曲奖最佳作词人奖。', NULL);
INSERT INTO `artists` VALUES (13, 'Frank Ocean', '弗兰克·奥申（Frank Ocean），全名克里斯托弗·弗朗西斯·奥申（Christopher Francis Ocean），1987年10月28日出生于美国加利福尼亚州洛杉矶长滩，美国歌手、词曲作者。\n2009年，与Def Jam唱片签约，从而正式出道。2011年，发行首张个人混音带《Nostalgia， Ultra》，同年入围黑人娱乐电视嘻哈奖年度新秀奖。2012年，发行首张个人正式专辑《Channel Orange》，同年凭借单曲《Swim Good》入围第29届MTV音乐录影带大奖最佳新人奖等三个奖项。2013年，专辑《Channel Orange》和歌曲《No Church in the Wild》分别获得第55届格莱美奖的最佳当代城市专辑奖和最佳说唱歌曲合作奖；同年入选《时代周刊》评出的“年度百大最具影响力人物”。2014年，个人歌曲《New Slaves》获得第56届格莱美奖最佳说唱歌曲奖提名。2016年，发行第二张个人正式专辑《Blonde》。2017年，获得NME音乐奖最佳国际男歌手奖。', NULL);
INSERT INTO `artists` VALUES (14, 'Drake', '简介\nDrake（奥布瑞·德雷克·格瑞汉，1986年10月24日），出生于加拿大多伦多的说唱歌手、词曲创作人、演员及商人，横跨加拿大和美国两大文化领域。早在2001年，他便踏入演艺圈，主演了电视剧《迪格拉丝中学的下一代》。随后，他的音乐之路也如日中天，2006年首张混音专辑《Room for Improvement》问世，2009年更是与知名娱乐公司Young Money签约。\n\n2010年，Drake发行了首张录音室专辑《Thank Me Later》，正式开启了他的音乐生涯新篇章。紧接着，2011年的第二张专辑《Take Care》更是获得了第55届格莱美奖最佳说唱专辑的殊荣。之后的几年里，他的音乐作品不断，2013年的《Nothing Was the Same》再次展现了他的音乐才华。\n\n2015年，单曲《Hotline Bling》的发布让他在第59届格莱美奖中大放异彩，斩获两个奖项。2016年，第四张录音室专辑《Views》在美国首周销量更是突破百万张，创造了新的销售记录。之后的几年里，Drake的音乐作品不断，2018年的《Scorpion》、2019年的《God\'s Plan》以及2021年的《Certified Lover Boy》都获得了极高的评价。\n\n2022年，Drake再次发力，发行了第七张录音室专辑《Honestly, Nevermind》以及与21 Savage合作的专辑《Her Loss》。2023年，他凭借歌曲《Wait for U》获得第65届格莱美奖最佳旋律说唱歌手，再次证明了他在音乐领域的实力。10月6日，发行录音室专辑《For All the Dogs》，紧接着11月17日又推出了豪华版专辑《For All the Dogs Scary Hours Edition》，持续为乐迷带来惊喜。\n\nDrake 被美国唱片业协会评为美国认证最高的数字单曲艺术家，销量已超过 1.7 亿张。此外，他还保持着多项排行榜记录，经常被誉为嘻哈界最有影响力的人物之一。', NULL);

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
  `CoverImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`MVID`) USING BTREE,
  INDEX `ArtistID`(`ArtistID`) USING BTREE,
  CONSTRAINT `musicvideos_ibfk_1` FOREIGN KEY (`ArtistID`) REFERENCES `artists` (`ArtistID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of musicvideos
-- ----------------------------
INSERT INTO `musicvideos` VALUES (1, '鸳鸯戏MV', 1, '/uploads/mv/鸳鸯戏.mp4', '');
INSERT INTO `musicvideos` VALUES (2, 'Accidino', 6, '/music-project/assets/video/Accidino.mp4', '/music-project/assets/images/song_covers/AccidinoCover.jpg');
INSERT INTO `musicvideos` VALUES (3, 'Bejewled', 5, '/music-project/assets/video/Bejewled.mp4', '/music-project/assets/images/song_covers/BejewledCover.jpg');
INSERT INTO `musicvideos` VALUES (4, 'Queencard', 7, '/music-project/assets/video/Queencard.mp4', '/music-project/assets/images/song_covers/QueencardCover.jpg');
INSERT INTO `musicvideos` VALUES (5, 'Whiplash', 4, '/music-project/assets/video/Whiplash.mp4', '/music-project/assets/images/song_covers/WhiplashCover.jpg');
INSERT INTO `musicvideos` VALUES (6, '老人与海', 3, '/music-project/assets/video/启示录.mp4', '/music-project/assets/images/song_covers/启示录.jpg');

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mvcomments
-- ----------------------------
INSERT INTO `mvcomments` VALUES (1, 2, 1, '你好', '2024-12-23 14:39:08');
INSERT INTO `mvcomments` VALUES (2, 3, 1, '很好看', '2024-12-23 14:39:38');
INSERT INTO `mvcomments` VALUES (3, 2, 2, '可以啊', '2024-12-23 14:47:37');

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
-- Records of mvlikes
-- ----------------------------
INSERT INTO `mvlikes` VALUES (1, 4);
INSERT INTO `mvlikes` VALUES (2, 18);
INSERT INTO `mvlikes` VALUES (3, 12);

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
INSERT INTO `playlist_songs` VALUES (8, 10, '2024-12-23 18:49:18', 5);
INSERT INTO `playlist_songs` VALUES (8, 11, '2024-12-23 19:12:03', 6);
INSERT INTO `playlist_songs` VALUES (8, 12, '2024-12-23 19:12:06', 7);
INSERT INTO `playlist_songs` VALUES (8, 13, '2024-12-23 19:12:11', 8);
INSERT INTO `playlist_songs` VALUES (8, 18, '2024-12-23 19:12:13', 9);
INSERT INTO `playlist_songs` VALUES (8, 19, '2024-12-23 19:12:16', 10);
INSERT INTO `playlist_songs` VALUES (8, 20, '2024-12-11 19:13:11', 11);
INSERT INTO `playlist_songs` VALUES (9, 14, '2024-07-18 20:13:03', 12);
INSERT INTO `playlist_songs` VALUES (9, 15, '2024-11-27 02:12:49', 13);
INSERT INTO `playlist_songs` VALUES (9, 16, '2024-11-28 19:12:46', 14);
INSERT INTO `playlist_songs` VALUES (9, 17, '2024-01-18 19:12:55', 15);
INSERT INTO `playlist_songs` VALUES (9, 21, '2024-12-23 19:12:18', 16);
INSERT INTO `playlist_songs` VALUES (10, 7, '2024-12-23 19:12:41', 17);
INSERT INTO `playlist_songs` VALUES (10, 8, '2024-12-23 19:12:44', 18);
INSERT INTO `playlist_songs` VALUES (10, 9, '2024-12-23 19:12:33', 19);
INSERT INTO `playlist_songs` VALUES (11, 10, '2024-12-23 19:12:35', 20);
INSERT INTO `playlist_songs` VALUES (11, 11, '2024-12-23 19:12:37', 21);
INSERT INTO `playlist_songs` VALUES (11, 12, '2024-12-23 19:12:39', 22);
INSERT INTO `playlist_songs` VALUES (11, 13, '2024-12-23 19:12:20', 23);
INSERT INTO `playlist_songs` VALUES (12, 14, '2024-12-23 19:12:22', 24);
INSERT INTO `playlist_songs` VALUES (12, 15, '2024-12-23 19:12:24', 25);
INSERT INTO `playlist_songs` VALUES (12, 16, '2024-12-23 19:12:27', 26);
INSERT INTO `playlist_songs` VALUES (12, 17, '2024-12-23 19:12:30', 27);
INSERT INTO `playlist_songs` VALUES (13, 23, '2024-12-24 03:07:04', 29);
INSERT INTO `playlist_songs` VALUES (13, 24, '2024-12-24 03:08:04', 30);
INSERT INTO `playlist_songs` VALUES (13, 25, '2024-12-24 03:09:04', 31);
INSERT INTO `playlist_songs` VALUES (13, 26, '2024-12-24 03:10:04', 32);
INSERT INTO `playlist_songs` VALUES (13, 27, '2024-12-24 03:11:04', 33);
INSERT INTO `playlist_songs` VALUES (13, 28, '2024-12-24 03:12:04', 34);
INSERT INTO `playlist_songs` VALUES (13, 29, '2024-12-24 03:13:04', 35);
INSERT INTO `playlist_songs` VALUES (13, 30, '2024-12-24 03:14:04', 36);
INSERT INTO `playlist_songs` VALUES (14, 31, '2024-12-24 03:15:04', 37);
INSERT INTO `playlist_songs` VALUES (14, 32, '2024-12-24 03:16:04', 38);
INSERT INTO `playlist_songs` VALUES (14, 33, '2024-12-24 03:17:04', 39);
INSERT INTO `playlist_songs` VALUES (14, 34, '2024-12-24 03:18:04', 40);
INSERT INTO `playlist_songs` VALUES (14, 35, '2024-12-24 03:19:04', 41);
INSERT INTO `playlist_songs` VALUES (14, 36, '2024-12-24 03:20:04', 42);
INSERT INTO `playlist_songs` VALUES (14, 37, '2024-12-24 03:21:04', 43);
INSERT INTO `playlist_songs` VALUES (14, 38, '2024-12-24 03:22:04', 44);
INSERT INTO `playlist_songs` VALUES (14, 39, '2024-12-24 03:23:04', 45);
INSERT INTO `playlist_songs` VALUES (14, 40, '2024-12-24 03:24:04', 46);
INSERT INTO `playlist_songs` VALUES (14, 41, '2024-12-24 03:25:04', 47);
INSERT INTO `playlist_songs` VALUES (14, 42, '2024-12-24 03:26:04', 48);
INSERT INTO `playlist_songs` VALUES (14, 43, '2024-12-24 03:27:04', 49);
INSERT INTO `playlist_songs` VALUES (14, 44, '2024-12-24 03:28:04', 50);
INSERT INTO `playlist_songs` VALUES (14, 45, '2024-12-24 03:29:04', 51);
INSERT INTO `playlist_songs` VALUES (14, 46, '2024-12-24 03:30:04', 52);
INSERT INTO `playlist_songs` VALUES (14, 47, '2024-12-24 03:31:04', 53);
INSERT INTO `playlist_songs` VALUES (14, 48, '2024-12-24 03:32:04', 54);
INSERT INTO `playlist_songs` VALUES (14, 49, '2024-12-24 03:33:04', 55);
INSERT INTO `playlist_songs` VALUES (14, 50, '2024-12-24 03:34:04', 56);
INSERT INTO `playlist_songs` VALUES (15, 51, '2024-12-24 03:35:04', 57);
INSERT INTO `playlist_songs` VALUES (15, 52, '2024-12-24 03:36:04', 58);
INSERT INTO `playlist_songs` VALUES (15, 53, '2024-12-24 03:37:04', 59);
INSERT INTO `playlist_songs` VALUES (15, 54, '2024-12-24 03:38:04', 60);
INSERT INTO `playlist_songs` VALUES (15, 55, '2024-12-24 03:39:04', 61);
INSERT INTO `playlist_songs` VALUES (15, 56, '2024-12-24 03:40:04', 62);
INSERT INTO `playlist_songs` VALUES (15, 57, '2024-12-24 03:41:04', 63);
INSERT INTO `playlist_songs` VALUES (15, 58, '2024-12-24 03:42:04', 64);
INSERT INTO `playlist_songs` VALUES (15, 59, '2024-12-24 03:43:04', 65);
INSERT INTO `playlist_songs` VALUES (15, 60, '2024-12-24 03:44:04', 66);
INSERT INTO `playlist_songs` VALUES (15, 61, '2024-12-24 03:45:04', 67);
INSERT INTO `playlist_songs` VALUES (15, 62, '2024-12-24 03:46:04', 68);
INSERT INTO `playlist_songs` VALUES (16, 63, '2024-12-24 03:47:04', 69);
INSERT INTO `playlist_songs` VALUES (16, 64, '2024-12-24 03:48:04', 70);
INSERT INTO `playlist_songs` VALUES (16, 65, '2024-12-24 03:49:04', 71);
INSERT INTO `playlist_songs` VALUES (16, 66, '2024-12-24 03:50:04', 72);
INSERT INTO `playlist_songs` VALUES (16, 67, '2024-12-24 03:51:04', 73);
INSERT INTO `playlist_songs` VALUES (16, 68, '2024-12-24 03:52:04', 74);
INSERT INTO `playlist_songs` VALUES (16, 69, '2024-12-24 03:53:04', 75);
INSERT INTO `playlist_songs` VALUES (16, 70, '2024-12-24 03:54:04', 76);
INSERT INTO `playlist_songs` VALUES (16, 71, '2024-12-24 03:55:04', 77);
INSERT INTO `playlist_songs` VALUES (16, 72, '2024-12-24 03:56:04', 78);
INSERT INTO `playlist_songs` VALUES (16, 73, '2024-12-24 03:57:04', 79);
INSERT INTO `playlist_songs` VALUES (16, 74, '2024-12-24 03:58:04', 80);

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of playlistcomments
-- ----------------------------
INSERT INTO `playlistcomments` VALUES (1, 1, 1, '你好你好', '2024-12-23 12:01:19');
INSERT INTO `playlistcomments` VALUES (2, 2, 1, '你好', '2024-12-23 07:28:59');
INSERT INTO `playlistcomments` VALUES (3, 1, 1, '请进行评论', '2024-12-23 07:29:21');
INSERT INTO `playlistcomments` VALUES (4, 1, 1, '你好', '2024-12-23 09:32:33');
INSERT INTO `playlistcomments` VALUES (5, 1, 2, '你哈', '2024-12-23 14:47:44');

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
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of playlists
-- ----------------------------
INSERT INTO `playlists` VALUES (1, '轻音乐', '舒缓心情的轻音乐', '/music-project/assets/images/playlist_covers/light.jpg');
INSERT INTO `playlists` VALUES (2, '流行经典', '精选流行音乐合集', '/music-project/assets/images/playlist_covers/edm.jpg');
INSERT INTO `playlists` VALUES (3, '电子舞曲', '动感十足的电子乐', '/music-project/assets/images/playlist_covers/pop.jpg');
INSERT INTO `playlists` VALUES (4, '摇滚经典', '不可错过的摇滚金曲', '/music-project/assets/images/playlist_covers/rock.jpg');
INSERT INTO `playlists` VALUES (5, '爵士乐', '品味高雅的爵士乐', '/music-project/assets/images/playlist_covers/jazz.jpg');
INSERT INTO `playlists` VALUES (6, '古典音乐', '经典永恒的古典之声', '/music-project/assets/images/playlist_covers/classical.jpg');
INSERT INTO `playlists` VALUES (8, 'KPOP | 性感妩媚不可阻挡', 'kpop女团有成熟完善的体系\r\n的风格旋律中毒洗脑 舞蹈整齐划一\r\n部分女团成员实力早超脱了爱豆的范畴\r\n韩国女团对待唱跳还有身材管理和表情管理都严格要求，舞台观赏性强，实力强，职业素养方面上无论行程多满，依旧元气满满。风格上，韩团的风格迥异，清纯风，性感风，御姐风，元气风， girl crush , teen crush，复古风等。\r\n她们并不遥不可及，像交了一群优秀的朋友，学会像她们对待生活活力四射，坚毅执着，也愿我们彼此，在爱她们的同时也让自己变得越来优秀。', '/music-project/assets/images/playlist_covers/KPOPCOVER.jpg');
INSERT INTO `playlists` VALUES (9, '欧美流行：旋律控热评999+歌曲', '这份欧美流行歌单，将带你进入一个充满能量与自由的音乐世界。每一首歌曲都像是生活中的一剂强心针，激发你无穷的热情与动力。无论是摇滚的高亢、电子的震撼，还是流行的节奏感，这些音符交织成一幅活力四射的画面。每一段旋律都在述说着一个故事：关于梦想的追求、爱情的火热、或是突破自我的挑战。跳动的节拍将你从平凡的日常中解放，瞬间让你感受到来自音乐的力量。让我们一起跟随这些歌声，释放情感，挑战极限，享受这场酣畅淋漓的音浪冲击，成为音乐中最狂热的一部分！', '/music-project/assets/images/playlist_covers/POPCOVER.jpg');
INSERT INTO `playlists` VALUES (10, '嘘，听G.E.M.邓紫棋唱歌', '邓紫棋（G.E.M.)，中国香港著名年轻唱作歌手，流行乐坛新天后。1991年8月16日生于上海，4岁移居香港定居，在家人的薰陶下，自小便热爱音乐。5岁时已开始尝试作曲及填词，13岁便完成了8级钢琴。其英文名G.E.M．是Get Everybody Moving的缩写，象徵著她希望透过音乐让大家动起来的梦想。2008年出道，2009年在叱咤乐坛流行榜颁奖典礼夺得女新人奖金奖，亦是该奖项历年来最年轻，以及第一位未成年的得奖者。因其广阔的音域，得到不少前辈歌手点名公开赞扬。至今她是中港台地区唯一一位不透过电视选秀节目而得到两岸三地观众广泛爱戴的新偶像。2011年于红馆举办5场个人演唱会。代表作品有《睡公主》、《Where Did U Go》、《A.I.N.Y 爱你》、《我的秘密》、《泡沫》等。', '/music-project/assets/images/song_covers/启示录.jpg');
INSERT INTO `playlists` VALUES (11, 'aespa：风格鲜明的元宇宙女团！', '感谢大家的收听！\r\naespa是韩国SM娱乐有限公司于2020年11月17日推出的女子演唱组合，团体由四名成员组成，同时也拥有四名AI成员。\r\nasepa在我看来是一个风格很独特的女团，她们的歌曲和形象让人一眼就能分辨出来这是aespa。同时sm为其设定的元宇宙概念女团也很新颖，让人眼前一亮。\r\naespa的歌曲我一开始并不很感冒，但她们的歌曲和舞蹈后劲真的很足，多听几遍后就会爱上。每次去kpop现场aespa的歌曲出来时，感觉现场每一位都是粉丝，应援声超级大！合唱氛围很好！\r\n大爱aespa!', '/music-project/assets/images/playlist_covers/aespaCOVER.jpg');
INSERT INTO `playlists` VALUES (12, '霉粉收藏！霉霉顶流播放songs！', '这些歌曲都是Taylor流媒体播放量顶尖的歌曲，霉粉们赶紧收藏\r\n吧！', '/music-project/assets/images/playlist_covers/tsCOVER.jpg');
INSERT INTO `playlists` VALUES (13, '安河桥北 | 体验民谣震撼人心的力量', '宋冬野，1987年11月10日出生于中国北京，中国民谣歌手，音乐创作人。', '/music-project/assets/images/song_covers/安河桥北.jpg');
INSERT INTO `playlists` VALUES (14, 'Drake霸榜Billboard Top10 歌曲集', '如果说公鸭Drake是具备强势能力影响时代的歌手一点也不为过，数据就是最强力证明，2018年第29期美国Billboard单曲榜Top 10首播，公鸭有7首歌霸榜Top 10创历史新纪录 （本歌单前7首按照这期排名排列），目前为止他已经有31首单曲进入B榜Top 10，升至历史季军，仅次于麦当娜38首和披头士的34首。', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `playlists` VALUES (15, 'Frank Ocean：天才的梦中呓语', 'Frank Ocean, 1987年10月28日出生于美国加利福尼亚州洛杉矶长滩，歌手、作曲人、饶舌歌手、唱片制作人和摄影师。全名Christopher Francis Ocean，中国的粉丝称他\"法海\"。', '/music-project/assets/images/song_covers/blond.jpg');
INSERT INTO `playlists` VALUES (16, 'Kanye West：嘻哈缪斯的最佳创意', '当词曲创意凌驾说唱技巧，Kanye West这位嘻哈缪斯已超脱云泥。灵感丰富，诙谐不羁，他兼收古典、电音精气，又将诗意融入为Jay-Z、Alicia Keys定制的每一笔。新专Yeezus再次颠覆\"侃\"式嘻哈想象力，不妨拋却常理，就此共遁靡靡。', '/music-project/assets/images/song_covers/MBDTF.jpg');

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
) ENGINE = InnoDB AUTO_INCREMENT = 75 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of songs
-- ----------------------------
INSERT INTO `songs` VALUES (1, '鸳鸯戏', 1, '/uploads/musics/鸳鸯戏.mp3', '/music-project/assets/images/song_covers/cto.jpg');
INSERT INTO `songs` VALUES (2, 'native-american-flute', 2, '@\\assets\\audio\\lightmusics\\native-american-flute-277509.mp3', '/music-project/assets/images/song_covers/cto.jpg');
INSERT INTO `songs` VALUES (3, 'passacaglia', 2, '@\\assets\\audio\\lightmusics\\passacaglia-204294.mp3', '/music-project/assets/images/song_covers/cto.jpg');
INSERT INTO `songs` VALUES (4, 'snowfall', 2, '@\\assets\\audio\\lightmusics\\snowfall-ambient-music-258684.mp3', '/music-project/assets/images/song_covers/cto.jpg');
INSERT INTO `songs` VALUES (5, 'soft-synth', 2, '@\\assets\\audio\\lightmusics\\soft-synth-music-242044.mp3', '/music-project/assets/images/song_covers/cto.jpg');
INSERT INTO `songs` VALUES (6, 'GLORIA', 3, '/music-project/assets/audio/GEM/GLORIA.mp3', '/music-project/assets/images/song_covers/启示录cover.jpg');
INSERT INTO `songs` VALUES (7, '你不是真正的快乐', 3, '/music-project/assets/audio/GEM/你不是真正的快乐.mp3', '/music-project/assets/images/song_covers/女也.jpg');
INSERT INTO `songs` VALUES (8, '天空没有极限', 3, '/music-project/assets/audio/GEM/天空没有极限.mp3', '/music-project/assets/images/song_covers/启示录.jpg');
INSERT INTO `songs` VALUES (9, '老人与海', 3, '/music-project/assets/audio/GEM/老人与海.mp3', '/music-project/assets/images/song_covers/启示录.jpg');
INSERT INTO `songs` VALUES (10, 'Armageddon', 4, '/music-project/assets/audio/kpop/Armageddon.mp3', '/music-project/assets/images/song_covers/Armageddon.jpg');
INSERT INTO `songs` VALUES (11, 'Drama', 4, '/music-project/assets/audio/kpop/Drama.mp3', '/music-project/assets/images/song_covers/DramaCover.jpg');
INSERT INTO `songs` VALUES (12, 'Supernova', 4, '/music-project/assets/audio/kpop/Supernova.mp3', '/music-project/assets/images/song_covers/Supernova.jpg');
INSERT INTO `songs` VALUES (13, 'Whiplash', 4, '/music-project/assets/audio/kpop/Whiplash.mp3', '/music-project/assets/images/song_covers/Whiplash.jpg');
INSERT INTO `songs` VALUES (14, 'Cruel Summer', 5, '/music-project/assets/audio/POP/Cruel Summer.mp3', '/music-project/assets/images/song_covers/lover.jpg');
INSERT INTO `songs` VALUES (15, 'Daylight', 5, '/music-project/assets/audio/POP/Daylight.mp3', '/music-project/assets/images/song_covers/lover.jpg');
INSERT INTO `songs` VALUES (16, 'Lover', 5, '/music-project/assets/audio/POP/Lover.mp3', '/music-project/assets/images/song_covers/lover.jpg');
INSERT INTO `songs` VALUES (17, 'You Need To Calm Down', 5, '/music-project/assets/audio/POP/You Need To Calm Down.mp3', '/music-project/assets/images/song_covers/lover.jpg');
INSERT INTO `songs` VALUES (18, 'MEOW', 10, '/music-project/assets/audio/kpop/MEOW-MEOVV.mp3', '/music-project/public/assets/images/song_covers/MEOW.jpg');
INSERT INTO `songs` VALUES (19, 'Queencard', 7, '/music-project/assets/audio/kpop/Queencard.mp3', '/music-project/assets/mages/song_covers/queencard.jpg');
INSERT INTO `songs` VALUES (20, 'DRIP', 9, '/music-project/assets/audio/kpop/DRIP.mp3', '/music-project/assets/images/song_covers/DRIP.jpg');
INSERT INTO `songs` VALUES (21, 'Happier Than Ever', 8, '/music-project/assets/audio/POP/Happier than ever.mp3', '/music-project/assets/images/song_covers/Happier than ever.jpg');
INSERT INTO `songs` VALUES (23, '斑马，斑马', 12, '/music-project/assets/audio/民谣/宋冬野 - 斑马，斑马.flac', '/music-project/assets/images/song_covers/安河桥北.jpg');
INSERT INTO `songs` VALUES (24, '董小姐', 12, '/music-project/assets/audio/民谣/宋冬野 - 董小姐.flac', '/music-project/assets/images/song_covers/安河桥北.jpg');
INSERT INTO `songs` VALUES (25, '鸽子', 12, '/music-project/assets/audio/民谣/宋冬野 - 鸽子.flac', '/music-project/assets/images/song_covers/安河桥北.jpg');
INSERT INTO `songs` VALUES (26, '卡比巴拉的海', 12, '/music-project/assets/audio/民谣/宋冬野 - 卡比巴拉的海.flac', '/music-project/assets/images/song_covers/安河桥北.jpg');
INSERT INTO `songs` VALUES (27, '莉莉安', 12, '/music-project/assets/audio/民谣/宋冬野 - 莉莉安.flac', '/music-project/assets/images/song_covers/安河桥北.jpg');
INSERT INTO `songs` VALUES (28, '连衣裙', 12, '/music-project/assets/audio/民谣/宋冬野 - 连衣裙.flac', '/music-project/assets/images/song_covers/安河桥北.jpg');
INSERT INTO `songs` VALUES (29, '六层楼', 12, '/music-project/assets/audio/民谣/宋冬野 - 六层楼.flac', '/music-project/assets/images/song_covers/安河桥北.jpg');
INSERT INTO `songs` VALUES (30, 'intro...', 12, '/music-project/assets/audio/民谣/宋冬野 - Intro....flac', '/music-project/assets/images/song_covers/安河桥北.jpg');
INSERT INTO `songs` VALUES (31, 'Blem', 14, '/music-project/assets/audio/POP/Drake - Blem.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (32, 'Can\'t Have Everything', 14, '/music-project/assets/audio/POP/Drake - Can\'t Have Everything.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (33, 'Do Not Disturb', 14, '/music-project/assets/audio/POP/Drake - Do Not Disturb.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (34, 'Fake Love', 14, '/music-project/assets/audio/POP/Drake - Fake Love.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (35, 'Free Smoke', 14, '/music-project/assets/audio/POP/Drake - Free Smoke.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (36, 'Gyalchester', 14, '/music-project/assets/audio/POP/Drake - Gyalchester.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (37, 'Lose You', 14, '/music-project/assets/audio/POP/Drake - Lose You.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (38, 'Madiba Riddim', 14, '/music-project/assets/audio/POP/Drake - Madiba Riddim.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (39, 'Passionfruit', 14, '/music-project/assets/audio/POP/Drake - Passionfruit.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (40, 'Skepta Interlude', 14, '/music-project/assets/audio/POP/Drake - Skepta Interlude.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (41, 'Teenage Fever', 14, '/music-project/assets/audio/POP/Drake - Teenage Fever.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (42, 'Sacrifices', 14, '/music-project/assets/audio/POP/Drake - Sacrifices.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (43, 'Get It Together', 14, '/music-project/assets/audio/POP/Drake,Black Coffee,Jorja Smith - Get It Together.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (44, 'KMT', 14, '/music-project/assets/audio/POP/Drake,Giggs - KMT.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (45, 'No Long Talk', 14, '/music-project/assets/audio/POP/Drake,Giggs - No Long Talk.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (46, 'Glow', 14, '/music-project/assets/audio/POP/Drake,Kanye West - Glow.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (47, 'Since Way Back', 14, '/music-project/assets/audio/POP/Drake,PARTYNEXTDOOR - Since Way Back.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (48, 'Portland', 14, '/music-project/assets/audio/POP/Drake,Quavo,Travis Scott - Portland.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (49, '4422', 14, '/music-project/assets/audio/POP/Drake,Sampha - 4422.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (50, 'Ice Melts', 14, '/music-project/assets/audio/POP/Drake,Young Thug - Ice Melts.flac', '/music-project/assets/images/song_covers/MORE LIFE.jpg');
INSERT INTO `songs` VALUES (51, 'Futura Free', 13, '/music-project/assets/audio/POP/Frank Ocean - Futura Free.flac', '/music-project/assets/images/song_covers/blond.jpg');
INSERT INTO `songs` VALUES (52, 'Godspeed', 13, '/music-project/assets/audio/POP/Frank Ocean - Godspeed.flac', '/music-project/assets/images/song_covers/blond.jpg');
INSERT INTO `songs` VALUES (53, 'Ivy', 13, '/music-project/assets/audio/POP/Frank Ocean - Ivy.flac', '/music-project/assets/images/song_covers/blond.jpg');
INSERT INTO `songs` VALUES (54, 'Nights', 13, '/music-project/assets/audio/POP/Frank Ocean - Nights.flac', '/music-project/assets/images/song_covers/blond.jpg');
INSERT INTO `songs` VALUES (55, 'Nikes', 13, '/music-project/assets/audio/POP/Frank Ocean - Nikes.flac', '/music-project/assets/images/song_covers/blond.jpg');
INSERT INTO `songs` VALUES (56, 'Pink + White', 13, '/music-project/assets/audio/POP/Frank Ocean - Pink + White.flac', '/music-project/assets/images/song_covers/blond.jpg');
INSERT INTO `songs` VALUES (57, 'Pretty Sweet', 13, '/music-project/assets/audio/POP/Frank Ocean - Pretty Sweet.flac', '/music-project/assets/images/song_covers/blond.jpg');
INSERT INTO `songs` VALUES (58, 'Seigfried', 13, '/music-project/assets/audio/POP/Frank Ocean - Seigfried.flac', '/music-project/assets/images/song_covers/blond.jpg');
INSERT INTO `songs` VALUES (59, 'Self Control', 13, '/music-project/assets/audio/POP/Frank Ocean - Self Control.flac', '/music-project/assets/images/song_covers/blond.jpg');
INSERT INTO `songs` VALUES (60, 'Skyline To', 13, '/music-project/assets/audio/POP/Frank Ocean - Skyline To.flac', '/music-project/assets/images/song_covers/blond.jpg');
INSERT INTO `songs` VALUES (61, 'Solo', 13, '/music-project/assets/audio/POP/Frank Ocean - Solo.flac', '/music-project/assets/images/song_covers/blond.jpg');
INSERT INTO `songs` VALUES (62, 'White Ferrari', 13, '/music-project/assets/audio/POP/Frank Ocean - White Ferrari.flac', '/music-project/assets/images/song_covers/blond.jpg');
INSERT INTO `songs` VALUES (63, 'Dark Fantasy', 11, '/music-project/assets/audio/POP/Kanye West - Dark Fantasy.flac', '/music-project/assets/images/song_covers/MBDTF.jpg');
INSERT INTO `songs` VALUES (64, 'Hell Of A Life', 11, '/music-project/assets/audio/POP/Kanye West - Hell Of A Life.flac', '/music-project/assets/images/song_covers/MBDTF.jpg');
INSERT INTO `songs` VALUES (65, 'POWER', 11, '/music-project/assets/audio/POP/Kanye West - POWER.flac', '/music-project/assets/images/song_covers/MBDTF.jpg');
INSERT INTO `songs` VALUES (66, 'See Me Now', 11, '/music-project/assets/audio/POP/Kanye West,Beyoncé,Big Sean - See Me Now.flac', '/music-project/assets/images/song_covers/MBDTF.jpg');
INSERT INTO `songs` VALUES (67, 'Lost In The World', 11, '/music-project/assets/audio/POP/Kanye West,Bon Iver - Lost In The World.flac', '/music-project/assets/images/song_covers/MBDTF.jpg');
INSERT INTO `songs` VALUES (68, 'Monster', 11, '/music-project/assets/audio/POP/Kanye West,Bon Iver,JAY-Z - Monster.flac', '/music-project/assets/images/song_covers/MBDTF.jpg');
INSERT INTO `songs` VALUES (69, 'So Appalled', 11, '/music-project/assets/audio/POP/Kanye West,JAY-Z,Pusha T - So Appalled.flac', '/music-project/assets/images/song_covers/MBDTF.jpg');
INSERT INTO `songs` VALUES (70, 'Kanye West,John Legend - Blame Game', 11, '/music-project/assets/audio/POP/Kanye West,John Legend - Blame Game.flac', '/music-project/assets/images/song_covers/MBDTF.jpg');
INSERT INTO `songs` VALUES (71, 'Kanye West,Kid Cudi,Raekwon - Gorgeous', 11, '/music-project/assets/audio/POP/Kanye West,Kid Cudi,Raekwon - Gorgeous.flac', '/music-project/assets/images/song_covers/MBDTF.jpg');
INSERT INTO `songs` VALUES (72, 'Kanye West,Pusha T - Runaway', 11, '/music-project/assets/audio/POP/Kanye West,Pusha T - Runaway.flac', '/music-project/assets/images/song_covers/MBDTF.jpg');
INSERT INTO `songs` VALUES (73, 'Devil In A New Dress', 11, '/music-project/assets/audio/POP/Kanye West,Rick Ross - Devil In A New Dress.flac', '/music-project/assets/images/song_covers/MBDTF.jpg');
INSERT INTO `songs` VALUES (74, 'All Of The Lights', 11, '/music-project/assets/audio/POP/Kanye West,Rihanna,Kid Cudi - All Of The Lights.flac', '/music-project/assets/images/song_covers/MBDTF.jpg');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `UserID` int(0) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`UserID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin');
INSERT INTO `users` VALUES (2, 'mumian', 'QWEasd!1');

SET FOREIGN_KEY_CHECKS = 1;
