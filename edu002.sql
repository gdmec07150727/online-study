-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2019-09-19 02:47:53
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edu002`
--

-- --------------------------------------------------------

--
-- 表的结构 `bbs_comm`
--

CREATE TABLE `bbs_comm` (
  `id` mediumint(8) UNSIGNED NOT NULL COMMENT '帖子评论id',
  `mid` int(10) NOT NULL COMMENT '帖子id',
  `uid` int(10) NOT NULL COMMENT '会员id',
  `addtime` int(11) NOT NULL DEFAULT '1' COMMENT '评论时间',
  `content` text NOT NULL COMMENT '评论内容',
  `pid` varchar(20) DEFAULT '0' COMMENT '标记评论位置',
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '状态0未查看1已查看'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bbs_comm`
--

INSERT INTO `bbs_comm` (`id`, `mid`, `uid`, `addtime`, `content`, `pid`, `status`) VALUES
(886, 8, 64, 1393472450, 'iiiiiiiiiiiiii', '0', '0'),
(885, 10, 64, 1393472424, 'pppppppppppppppp', '0', '1'),
(884, 35, 62, 1393470113, '<img alt="大哭" src="/eschool/Public/xheditor/xheditor_emot/default/wail.gif" />', '0', '0'),
(883, 35, 63, 1393470103, '那啥叫啥事？', '877', '0'),
(882, 36, 62, 1393470058, '上来就评论了，都没看内容是什么<img alt="敲打" src="/eschool/Public/xheditor/xheditor_emot/default/knock.gif" height="85" width="85" />', '0', '0'),
(881, 34, 63, 1393470055, '&nbsp;冻手不？', '0', '1'),
(880, 36, 63, 1393470014, '小心查水表~', '0', '0'),
(879, 36, 62, 1393469916, '<img alt="吐舌头" src="/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" />', '0', '0'),
(878, 36, 62, 1393469908, '<img alt="可怜" src="/eschool/Public/xheditor/xheditor_emot/default/cute.gif" /><img alt="大笑" src="/eschool/Public/xheditor/xheditor_emot/default/laugh.gif" />', '0', '0'),
(868, 29, 68, 1393466125, '我只能呵呵了、、、', '0', '1'),
(867, 13, 68, 1393465990, '还英格兰呢', '800', '0'),
(866, 19, 68, 1393465969, '还行吧', '827', '0'),
(865, 22, 65, 1393463057, '再来点福利呗', '0', '0'),
(864, 21, 65, 1393462673, '伪前排', '819', '0'),
(863, 21, 65, 1393462657, '评论一个', '0', '0'),
(862, 19, 68, 1393459995, '嘿嘿', '0', '1'),
(861, 17, 68, 1393459945, '纯净水、', '808', '0'),
(869, 12, 93, 1393467374, '呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵', '0', '0'),
(859, 25, 70, 1393459856, '必须的必啊', '848', '0'),
(856, 27, 93, 1393458773, '好咧', '0', '1'),
(857, 25, 93, 1393458832, '那好吧、、、', '834', '1'),
(858, 25, 93, 1393458832, '那好吧、、、', '834', '1'),
(854, 8, 93, 1393458717, '<img alt="奋斗" src="http://localhost/lalala/Public/xheditor/xheditor_emot/default/struggle.gif" /><img alt="奋斗" src="http://localhost/lalala/Public/xheditor/xheditor_emot/default/struggle.gif" /><img alt="奋斗" src="http://localhost/lalala/Public/xheditor/xheditor_emot/default/struggle.gif" /><img alt="奋斗" src="http://localhost/lalala/Public/xheditor/xheditor_emot/default/struggle.gif" /><img alt="奋斗" src="http://localhost/lalala/Public/xheditor/xheditor_emot/default/struggle.gif" /><img alt="奋斗" src="http://localhost/lalala/Public/xheditor/xheditor_emot/default/struggle.gif" /><img alt="奋斗" src="http://localhost/lalala/Public/xheditor/xheditor_emot/default/struggle.gif" /><img alt="奋斗" src="http://localhost/lalala/Public/xheditor/xheditor_emot/default/struggle.gif" /><img alt="奋斗" src="http://localhost/lalala/Public/xheditor/xheditor_emot/default/struggle.gif" /><img alt="奋斗" src="http://localhost/lalala/Public/xheditor/xheditor_emot/default/struggle.gif" /><img alt="奋斗" src="/eschool/Public/xheditor/xheditor_emot/default/struggle.gif" />', '0', '1'),
(853, 8, 62, 1393440314, '。。。。。。。。。', '851', '1'),
(852, 8, 62, 1393440309, '。。。。。。。。', '851', '1'),
(850, 7, 62, 1393440097, '山炮就是山泡', '787', '1'),
(851, 8, 62, 1393440300, '<img alt="奋斗" src="/eschool/Public/xheditor/xheditor_emot/default/struggle.gif" />', '0', '1'),
(849, 25, 61, 1393439734, '我说先提交就是先提交！', '834', '1'),
(848, 25, 61, 1393439713, '必火啊！！！', '0', '1'),
(847, 5, 61, 1393439470, '弄死你', '792', '0'),
(846, 5, 61, 1393439470, '弄死你', '792', '0'),
(845, 5, 61, 1393439470, '弄死你', '792', '0'),
(843, 25, 63, 1393439050, '刘明是谁呀？', '0', '1'),
(844, 5, 61, 1393439461, '跪地上去吧！！！', '790', '0'),
(842, 25, 62, 1393438587, '凭什么呢', '0', '1'),
(841, 25, 62, 1393438578, '这是为什么呢', '0', '1'),
(840, 25, 93, 1393438491, '你赚了~~~', '834', '0'),
(839, 25, 93, 1393438491, '你赚了~~~', '834', '0'),
(870, 29, 63, 1393467479, '哈哈啊', '868', '0'),
(871, 25, 70, 1393467955, '喂小米！！！', '841', '1'),
(872, 25, 70, 1393467988, '镇贴楼！！！', '0', '1'),
(873, 25, 70, 1393468002, '顶起来', '872', '1'),
(874, 19, 70, 1393468895, '我也喜欢这个！', '0', '0'),
(836, 9, 70, 1393438094, '期限里', '0', '1'),
(837, 14, 70, 1393438232, '<strong>&lt;script&gt;alert(\'heihei\')&lt;/script&gt;</strong>', '0', '0'),
(835, 25, 70, 1393438067, '门前大桥下，游过一群鸭', '0', '1'),
(875, 34, 65, 1393469100, '<span style="font-size:24px;">鸡冻不？</span>', '0', '1'),
(876, 35, 61, 1393469206, '哇咔咔咔咔咔咔咔咔', '0', '1'),
(834, 25, 70, 1393438050, '<span style="color:#6600CC;"><span style="background-color: rgb(255, 102, 0);"><span style="font-size:32px;"><strong><img alt="羡慕" src="/eschool/Public/xheditor/xheditor_emot/default/envy.gif" height="86" width="86" />此<img alt="羡慕" src="/eschool/Public/xheditor/xheditor_emot/default/envy.gif" height="86" width="86" />贴<img alt="羡慕" src="/eschool/Public/xheditor/xheditor_emot/default/envy.gif" height="86" width="86" />必<img alt="羡慕" src="/eschool/Public/xheditor/xheditor_emot/default/envy.gif" height="86" width="86" />火<img alt="羡慕" src="/eschool/Public/xheditor/xheditor_emot/default/envy.gif" height="86" width="86" /></strong></span></span></span>', '0', '1'),
(832, 7, 70, 1393437256, '太二了  一楼', '787', '1'),
(831, 7, 70, 1393437247, '22222222222222222222222', '787', '1'),
(829, 19, 70, 1393437227, '楼主挽尊', '821', '0'),
(828, 19, 70, 1393437218, '火钳刘明', '812', '0'),
(827, 19, 70, 1393437209, '好棒好棒', '0', '1'),
(826, 24, 62, 1393436983, '你以为你是谁啊，人家为什么要理你', '0', '0'),
(825, 24, 71, 1393436910, '你说的有道理', '0', '1'),
(824, 24, 71, 1393436900, '你以为你是谁啊', '0', '1'),
(823, 24, 71, 1393436887, '不理不理呗', '0', '1'),
(822, 12, 71, 1393436591, '还行吧', '0', '0'),
(821, 19, 69, 1393436517, '<img alt="生气" src="/eschool/Public/xheditor/xheditor_emot/default/mad.gif" />', '0', '0'),
(820, 18, 70, 1393436389, '不敢吧', '810', '0'),
(818, 18, 70, 1393436384, '去去去去去去呀', '810', '0'),
(819, 21, 69, 1393436410, '&nbsp;抢沙发咯。。。。', '0', '1'),
(817, 18, 70, 1393436375, '<p>山里有个庙 。老和尚对小和尚说，从前有座山，山上有个庙</p><p>，庙里有个老和尚，老和尚</p><p>老和尚对小和尚说，从前有座山，山上有个庙，庙里有个老和尚，老和尚<br /></p>', '0', '0'),
(816, 15, 70, 1393436340, '<img src="/eschool/Public/Uploads/editor/201402/530e26b0a1346.jpg" width="300" alt="" /><br />', '0', '0'),
(815, 15, 70, 1393436321, '是啊是啊 顶楼上', '813', '0'),
(814, 15, 70, 1393436311, '真那啥！<img alt="偷笑" src="/eschool/Public/xheditor/xheditor_emot/default/titter.gif" />大家都得。', '0', '0'),
(813, 15, 68, 1393436028, '真有意思！！！', '0', '0'),
(809, 9, 68, 1393435310, '多评论点、一会好分页', '0', '1'),
(808, 17, 66, 1393435329, '是吧，坑定是的啊，你太单纯了小岩岩，哈哈哈，我开玩笑的啦', '0', '1'),
(810, 18, 68, 1393435604, '哎呦我勒个去', '0', '1'),
(811, 18, 68, 1393435620, '<img alt="偷笑" src="/eschool/Public/xheditor/xheditor_emot/default/titter.gif" />服了', '0', '1'),
(805, 16, 66, 1393435287, '什么叫脸，哈哈哈', '803', '0'),
(812, 19, 68, 1393435805, '哭哭哭哭KUKuku', '0', '1'),
(804, 16, 66, 1393435263, '<img alt="生气" src="/eschool/Public/xheditor/xheditor_emot/default/mad.gif" />', '0', '0'),
(803, 16, 68, 1393435238, '好不要脸撒', '0', '0'),
(802, 10, 66, 1393434926, '鸟语。。。。。。', '0', '1'),
(801, 13, 66, 1393434799, '小萍萍，怎么可以这样子啦', '800', '0'),
(800, 13, 66, 1393434779, '鹅鹅鹅饿饿，曲线美国', '0', '1'),
(797, 10, 64, 1393434212, '贤哥威武', '0', '1'),
(798, 9, 65, 1393434407, '好不要face', '789', '1'),
(799, 9, 65, 1393434448, '哥来灌水！！！哇咔咔<img src="/eschool/Public/Uploads/editor/201402/530e1f473ec89.jpg" alt="" />', '0', '1'),
(796, 7, 62, 1393434217, '恩恩，想了一下还是说点好话吧', '787', '1'),
(795, 9, 62, 1393434137, '哈哈哈', '789', '0'),
(794, 9, 62, 1393434126, '这是什么呢啊', '0', '1'),
(793, 5, 64, 1393434084, '你妹的，抢哥的沙发', '781', '0'),
(792, 5, 64, 1393434052, '贤哥再顶你的肺，灌水中', '0', '1'),
(791, 6, 61, 1393434010, '那必须的啊', '786', '0'),
(790, 5, 64, 1393434024, '沙发', '0', '1'),
(789, 9, 64, 1393434011, '挽尊，自挽中。。。。', '0', '1'),
(788, 7, 64, 1393433981, '沙发', '787', '0'),
(787, 7, 64, 1393433961, '22222222', '0', '1'),
(786, 6, 62, 1393433919, '恩恩，歌词不错哦，小岩岩就是有眼光', '0', '1'),
(785, 6, 62, 1393433883, '噢噢噢噢，no', '783', '0'),
(782, 5, 61, 1393433531, '第一个第一个', '781', '1'),
(783, 6, 61, 1393433656, '<img src="/eschool/Public/Uploads/editor/201402/530e1c2e46e2d.png" height="301" width="302" alt="" />顶！！！', '0', '1'),
(784, 6, 62, 1393433874, '00:28.32]我会用满天星光变成玫瑰 哦 baby\n[00:32.35]珍藏每一滴眼泪', '783', '0'),
(781, 5, 61, 1393433517, '第一个沙发、、、<img alt="大笑" src="/lalala/Public/xheditor/xheditor_emot/default/laugh.gif" />', '0', '1');

-- --------------------------------------------------------

--
-- 表的结构 `bbs_message`
--

CREATE TABLE `bbs_message` (
  `id` mediumint(8) UNSIGNED NOT NULL COMMENT '帖子id号',
  `title` varchar(60) NOT NULL COMMENT '标题',
  `uid` int(10) NOT NULL COMMENT '发帖人',
  `addtime` int(11) NOT NULL DEFAULT '1' COMMENT '发帖时间',
  `content` text NOT NULL COMMENT '帖子内容',
  `keyword` varchar(100) NOT NULL DEFAULT '' COMMENT '标签（关键字）',
  `isbest` enum('1','0') NOT NULL DEFAULT '0' COMMENT '是否精品',
  `ishot` enum('1','0') NOT NULL DEFAULT '0' COMMENT '是否热门',
  `scan` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '浏览数',
  `status` enum('1','0') NOT NULL DEFAULT '1' COMMENT '状态0隐藏1显示'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bbs_message`
--

INSERT INTO `bbs_message` (`id`, `title`, `uid`, `addtime`, `content`, `keyword`, `isbest`, `ishot`, `scan`, `status`) VALUES
(10, '@#￥%……&amp;', 64, 1393434201, '我是来揍管炎的', '19', '0', '0', 6, '1'),
(11, '帖子123456789', 65, 1393434312, '<p>Java基础知识，请听岩哥给你慢慢讲、、、<img alt="偷笑" src="/eschool/Public/xheditor/xheditor_emot/default/titter.gif" /></p><p><span style="font-family:KaiTi_GB2312;font-size:24px;">话说1111111111111</span></p><p><span style="font-family:KaiTi_GB2312;font-size:24px;">2222222222222</span></p><p><strong>333333333333</strong></p><p><span style="color:#ff0000;">。。。。。。。。。。。</span></p>', '24', '0', '0', 0, '1'),
(9, '给你踩踩', 64, 1393433949, '贤哥嫁到 ，还不来置顶<img alt="生气" src="/xian/Public/xheditor/xheditor_emot/default/mad.gif" /><br />', '10', '1', '1', 12, '1'),
(6, 'FreeP-拥抱着你的滋味', 61, 1393433632, '<big></big><p>[ti:拥抱着你的滋味]<br /></p><p>[ar:Free Party]<br /></p><p>[al:怪我爱得太狂野]<br /></p><p><br /></p><p>[00:00.39]拥抱着你的滋味<br /></p><p>[00:02.60]作词：KingStar-Babara<br /></p><p>[00:04.80]作曲：KingStar-武士硝烟<br /></p><p>[00:07.00]演唱：free party[00:56.99]带着你快乐的飞 风再大也无所谓</p><p>[00:15.97]好喜欢你的笑 温暖我每一秒<br /></p><p>[00:20.18]整个世界都跟着溶化掉<br /></p><p>[00:24.21]送你童话城堡 甜蜜把爱围绕<br /></p><p>[00:28.32]我会用满天星光变成玫瑰 哦 baby<br /></p><p>[00:32.35]珍藏每一滴眼泪<br /></p><p>[00:36.22]比钻石还要珍贵<br /></p><p>[00:40.29]这是幸福的点缀<br /></p><p>[00:44.33]没有人能够体会<br /></p><p>[00:48.97]拥抱着你的滋味 胜过一切的完美<br /></p><p>[00:52.92]你在我怀里入睡 月亮都为你沉醉<br /></p>', '9', '0', '0', 5, '1'),
(7, '恩恩，快要审项目了', 62, 1393433801, '明天就要审项目了，嗯嗯嗯呢<img alt="大哭" src="/eschool/Public/xheditor/xheditor_emot/default/wail.gif" />', '28', '1', '1', 6, '1'),
(8, '大家都很忙的', 62, 1393433849, '<img alt="吐舌头" src="/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="偷笑" src="/eschool/Public/xheditor/xheditor_emot/default/titter.gif" /><img alt="吐舌头" src="/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="偷笑" src="/eschool/Public/xheditor/xheditor_emot/default/titter.gif" /><img alt="吐舌头" src="/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="偷笑" src="/eschool/Public/xheditor/xheditor_emot/default/titter.gif" />你说是吧，这次坑定没错啊', '27', '0', '1', 8, '1'),
(5, '贴吧的第一个帖子哦', 61, 1393433498, '<p><span style="background-color: rgb(255, 255, 102);"><span style="color:#3333FF;"><strong><span style="font-family:KaiTi_GB2312;font-size:24px;">贴吧的第一个帖子哦！！！</span></strong></span></span></p><p><span style="background-color: rgb(255, 255, 102);"><span style="color:#3333FF;"><strong><span style="font-family:KaiTi_GB2312;font-size:24px;">速来膜拜~~~</span></strong></span></span></p><p><img src="/eschool/Public/Uploads/editor/201402/530e1b9726799.gif" alt="" /><br /></p>', '23', '1', '1', 5, '1'),
(12, '发个名字很长很长的特别长的那个', 65, 1393434380, '<p>发个名字很长很长的特别长的那个发个名字很长很长的特别长</p><p>的那个发个</p><p>名字很长很长的特别长的那个发个名</p><p><img src="/eschool/Public/Uploads/editor/201402/530ea64781124.jpg" height="301" width="402" alt="" /><br /></p><p>字很长很长的特别长的那个发个名字很长很长的特别长的那个发个名字很长很长的特别长的那个</p><p><br /></p>', '13', '1', '1', 9, '1'),
(13, '猜猜我是谁', 68, 1393434681, '<p>你急速复仇耐热的口红过热id哦纪念馆红日u盾试管汉堡覅噢未来，设计公认</p><p>卫生等国家饿哦is大黄v<br /></p>', '24', '0', '0', 2, '1'),
(14, '我管你是谁', 66, 1393434762, '你就不知道我是谁吧，哈哈哈哈<img alt="尴尬" src="/eschool/Public/xheditor/xheditor_emot/default/awkward.gif" /><img alt="闭嘴" src="/eschool/Public/xheditor/xheditor_emot/default/shutup.gif" />', '10', '0', '0', 4, '1'),
(15, '贤哥又降临了，红颜你咬我啊', 67, 1393434913, '哈哈哈哈<img alt="得意" src="/eschool/Public/xheditor/xheditor_emot/default/proud.gif" />', '10,19', '0', '0', 52, '1'),
(16, '我来发福利了', 67, 1393435204, '<img alt="大笑" src="/eschool/Public/xheditor/xheditor_emot/default/laugh.gif" />www.xxxxx.cc你们猜<br />', '10', '0', '0', 4, '1'),
(17, '管贤你就别卖萌了！！！', 68, 1393435217, '<p><span style="font-family:Microsoft YaHei;font-size:32px;"><strong>你们说管子贤是不是疯了？</strong></span></p><p><span style="font-family:Microsoft YaHei;font-size:32px;"><strong><span style="font-family:Microsoft YaHei;font-size:32px;"><strong><img alt="偷笑" src="http://localhost/lalala/Public/xheditor/xheditor_emot/default/titter.gif" /><img alt="偷笑" src="http://localhost/lalala/Public/xheditor/xheditor_emot/default/titter.gif" /></strong></span><span style="font-family:Microsoft YaHei;font-size:32px;"><strong><img alt="偷笑" src="http://localhost/lalala/Public/xheditor/xheditor_emot/default/titter.gif" /><img alt="偷笑" src="http://localhost/lalala/Public/xheditor/xheditor_emot/default/titter.gif" height="69" width="69" /></strong></span><span style="font-family:Microsoft YaHei;font-size:32px;"><strong><img alt="偷笑" src="http://localhost/lalala/Public/xheditor/xheditor_emot/default/titter.gif" /><img alt="偷笑" src="http://localhost/lalala/Public/xheditor/xheditor_emot/default/titter.gif" /></strong></span><span style="font-family:Microsoft YaHei;font-size:32px;"><strong><img alt="偷笑" src="http://localhost/lalala/Public/xheditor/xheditor_emot/default/titter.gif" height="69" width="69" /><img alt="偷笑" src="http://localhost/lalala/Public/xheditor/xheditor_emot/default/titter.gif" /></strong></span><span style="font-family:Microsoft YaHei;font-size:32px;"><strong><img alt="偷笑" src="http://localhost/lalala/Public/xheditor/xheditor_emot/default/titter.gif" /><img alt="偷笑" src="/eschool/Public/xheditor/xheditor_emot/default/titter.gif" /></strong></span><br /></strong></span></p>', '11', '0', '0', 5, '1'),
(18, '从前又座山......', 66, 1393435450, '从前有座山，山上有个庙，庙里有个老和尚，老和尚对小和尚说，从前有座山，山上有个庙，庙里有个老和尚，老和尚对小和尚说，从前有座山，山上有个庙，庙里有个老和尚，老和尚对小和尚说，从前有座山，山上有个庙，庙里有个老和尚，老和尚对小和尚说，从前有座山，山上有个庙，庙里有个老和尚，老和尚对小和尚说，从前有座山，山上有个庙，庙里有个老和尚，老和尚对小和尚说，从前有座山，山上有个庙，庙里有个老和尚，老和尚对小和尚说，从前有座山，山上有个庙，庙里有个老和尚，老和尚对小和尚说，从前有座山，山上有个庙，庙里有个老和尚，老和尚对小和尚说，从前有座山，山上有个庙，庙里有个老和尚，老和尚对小和尚说，从前有座山，山上有个庙，庙里有个老和尚，老和尚对小和尚说，从前有座山，山上有个庙，庙里有个老和尚，老和尚对小和尚说，从前有座山，山上有个庙，庙里有个老和尚，老和尚对小和尚说，从前有座山，山上有个庙，庙里有个老和尚，老和尚对小和尚说，从前有座山，山上有个庙，庙里有个老和尚，老和尚对小和尚说，从前有座山，山上有个庙，庙里有个老和尚，老和尚对小和尚说，', '23', '0', '0', 5, '1'),
(19, '许嵩——素颜', 68, 1393435791, '<p><span style="font-size:18px;"><strong>[ti:素颜]</strong></span></p><p><span style="font-size:18px;"><strong><br /></strong></span></p><p><span style="font-size:18px;"><strong>[ar:Vae(许嵩)&amp;何曼婷]<br /></strong></span></p><p><span style="font-size:18px;"><strong>[by:qq122121036]<br /></strong></span></p><p><span style="font-size:18px;"><strong>[00:00]Vae(许嵩)&amp;何曼婷-素颜<br /></strong></span></p><p><span style="font-size:18px;"><strong>[00:02]词/曲/编曲：Vae(许嵩)<br /></strong></span></p><p><span style="font-size:18px;"><strong>[00:04]演唱：Vae(许嵩)&amp;何曼婷</strong></span></p><p><br /></p><p><span style="font-size:18px;"><strong>[00:13]又是一个安静的晚上<br /></strong></span></p><p><span style="font-size:18px;"><strong>[00:15]一个人窝在摇椅里乘凉<br /></strong></span></p><p><span style="font-size:18px;"><strong>[00:18]我承认这样真的很安详<br /></strong></span></p><p><span style="font-size:18px;"><strong>[00:21]和楼下老爷爷一样</strong></span></p><p><span style="font-size:18px;"><strong>[00:24]听说你还在搞什么原创<br /></strong></span></p><p><span style="font-size:18px;"><strong>[00:27]搞来搞去好像也就这样<br /></strong></span></p><p><span style="font-size:18px;"><strong>[00:29]不如花点时间想想<br /></strong></span></p><span style="font-size:18px;"><strong>[00:32]琢磨一下模样</strong><br /></span>', '24', '1', '1', 15, '1'),
(20, '的多发点帖子啊', 68, 1393435935, '不多发点没效果啊<p>[ti:素颜]<br /></p><p>[ar:Vae(许嵩)&amp;何曼婷]<br /></p><p>[by:qq122121036]<br /></p><p>[[00:32]琢磨一下模样</p><p>不多发点没效果啊不多发点没效果啊不</p><p>多发点没效果啊不多发点没效果啊不多发点没效果啊不多发点没效果啊不多发点没效果啊<br /></p>', '24,25', '0', '0', 67, '1'),
(21, '这个贴吧很不错', 69, 1393436395, '<p><img src="/eschool/Public/Uploads/editor/201402/530e26c14ead8.jpg" height="314" width="269" alt="" /></p><p>杰伦镇楼....<br /></p>', '9,10,24', '0', '0', 109, '1'),
(22, '有妹子哟、', 69, 1393436496, '<img src="/eschool/Public/Uploads/editor/201402/530e274ad7733.jpg" height="304" width="448" alt="" />', '27,26', '0', '0', 28, '1'),
(23, '刚来，发个帖子表示一下吧', 71, 1393436543, '大家快快热烈欢迎我把，哈哈哈哈哈<img alt="害羞" src="/eschool/Public/xheditor/xheditor_emot/default/shy.gif" height="105" width="105" />，人家会害羞的啦', '10', '0', '0', 17, '1'),
(24, '见我同桌了吗，他不理我了', 71, 1393436856, '<strong>我的问题：</strong>见我同桌了吗，他不理我了<br /><br /><strong>回复：</strong>他是要死的节奏', '27,28', '0', '0', 93, '1'),
(26, '&lt;b&gt;防着你呢&lt;/b&gt;', 70, 1393438220, '<p><strong>这是弹不出来框的</strong></p><p><strong>&lt;script&gt;alert(\'heihei\')&lt;/script&gt;<br /></strong></p>', '27', '0', '0', 1, '1'),
(27, '玉溪、走起？', 93, 1393438536, '<p>爱就马上行动吧<img alt="大笑" src="/eschool/Public/xheditor/xheditor_emot/default/laugh.gif" height="133" width="133" /></p>', '9', '0', '0', 27, '1'),
(28, '波哥来了。。。', 75, 1393438712, '<img alt="吐舌头" src="/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" /><img alt="吐舌头" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/tongue.gif" />', '9,10,11', '0', '0', 51, '1'),
(29, '告诉你波哥的威武', 63, 1393438991, '<img alt="生气" src="/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" /><img alt="生气" src="http://localhost/eschool/Public/xheditor/xheditor_emot/default/mad.gif" />', '24,27,28', '0', '0', 39, '1'),
(30, 'Java特级', 93, 1393459201, '<p>Java特级都有啥？</p><p>Java特级<strong>都有啥？</strong></p><p><strong>Java特级都有</strong>啥？Java特级都有啥？Java特级都有啥？</p><p>Java特级都有啥？Java特级都有啥？Java特级都有啥？Java特级都有啥？Java特级都有啥？</p><p>Java特级都有啥？Java特级都有啥？Java特级都有啥？</p><p>Java特级都有啥？Java特级都有啥？Java特级都有啥？Java特级都有啥？</p><p><br /></p><p>Java特级都有啥？Java特级都有啥？Java特级都有啥？Java特级都有啥？<br /></p>', '26', '0', '0', 1, '1'),
(31, '八百标兵奔北坡、、、接下来呢？', 70, 1393459578, '<strong>我的问题：</strong><p>八百标兵奔北坡、、、</p><p>接下来呢？？？<br /></p><br /><br /><strong>回复：炮兵并排北边跑</strong>', '19', '0', '0', 5, '1'),
(38, '2016马上要来了,大家有新的学习计划吗?', 55, 1446608602, '<strong><span style="font-size:18px;color:#ff6600;">2016马上要来了,大家有新的学习计划吗?</span></strong>', '0', '0', '0', 1, '1');

-- --------------------------------------------------------

--
-- 表的结构 `bbs_question`
--

CREATE TABLE `bbs_question` (
  `id` mediumint(8) UNSIGNED NOT NULL COMMENT '问题id号',
  `uid` int(10) NOT NULL COMMENT '提问会员id号',
  `tid` int(10) NOT NULL COMMENT '被提问教师id号',
  `addtime` int(11) NOT NULL DEFAULT '1' COMMENT '提问时间',
  `content` text NOT NULL COMMENT '提问内容',
  `keyword` varchar(100) NOT NULL DEFAULT '' COMMENT '标签（关键字）',
  `rtime` int(11) NOT NULL DEFAULT '1' COMMENT '回复时间',
  `replay` text NOT NULL COMMENT '回复内容',
  `isbest` enum('1','0') NOT NULL DEFAULT '0' COMMENT '是否推荐',
  `status` enum('1','0') NOT NULL DEFAULT '1' COMMENT '状态0隐藏1显示',
  `remind` enum('1','0') NOT NULL DEFAULT '0' COMMENT '提醒0不提示1提示'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bbs_question`
--

INSERT INTO `bbs_question` (`id`, `uid`, `tid`, `addtime`, `content`, `keyword`, `rtime`, `replay`, `isbest`, `status`, `remind`) VALUES
(1, 66, 0, 1393434859, '张秀波是谁啊，有人认识他吗，认识的告诉我一声，', '29,10', 1, '', '0', '1', '0'),
(2, 68, 61, 1393435733, '<p>张老师啊、、、</p><p><img alt="偷笑" src="/lalala/Public/xheditor/xheditor_emot/default/titter.gif" /></p><p>这个这个咋解决？？？？</p>', '17', 1393436923, '哎、乖', '1', '1', '0'),
(3, 70, 64, 1393436432, '<p>管贤，看问题如图~</p><p><img src="/lalala/Public/Uploads/editor/201402/530e2704d460d.jpg" width="300" alt="" /></p><p>少羽多大了<br /></p>', '10', 1393438825, '<span style="font-size:24px;"><strong>15<img alt="偷笑" src="Public/dwz/xheditor/xheditor_emot/default/titter.gif" /></strong></span>', '0', '1', '0'),
(4, 69, 64, 1393436602, '听说你叫管董？<img alt="生气" src="/eschool/Public/xheditor/xheditor_emot/default/mad.gif" />', '9', 1393436908, '叫管之董、、、<img alt="偷笑" src="Public/dwz/xheditor/xheditor_emot/default/titter.gif" />', '1', '1', '0'),
(5, 71, 61, 1393436694, '见我同桌了吗，他不理我了', '27', 1393469302, '', '0', '1', '1'),
(6, 70, 66, 1393436762, '<p>问题11111111</p><p>对啦 小萍萍回答哦<br /></p>', '24', 1393438899, '好的亲', '0', '1', '0'),
(17, 64, 61, 1393472535, '?????????????', '13', 1393472579, '!!!!!!!!!!!', '0', '1', '0'),
(7, 74, 64, 1393436814, '请问贤哥，管炎为什么这么吊？？？<img alt="疑问" src="/xian/Public/xheditor/xheditor_emot/default/doubt.gif" />想了好久都想不出来啊', '23', 1393436860, '擦擦<span style="font-size:16px;">擦擦<span style="color:#009900;">擦擦</span></span><strong><span style="font-size:16px;"><span style="color:#009900;">擦</span>擦</span>擦擦<span style="color:#FF0000;">擦擦</span></strong><span style="font-size:32px;color:#FF0000;">擦擦擦擦</span><span style="font-size:32px;">擦</span>擦擦', '0', '1', '1'),
(8, 71, 64, 1393436835, '很多人都说你是山炮，那请问你到底<img alt="惊恐" src="/eschool/Public/xheditor/xheditor_emot/default/panic.gif" height="55" width="55" />是不是山炮？？', '19', 1393436900, '必叉的啊，叫他<span style="font-family:KaiTi_GB2312;font-size:24px;"><strong>董三炮</strong></span>！！！', '1', '1', '1'),
(9, 74, 61, 1393436941, '二货张管波的一天会快乐吗', '28', 1393458434, '应该会吧', '1', '1', '1'),
(10, 76, 75, 1393437153, '你喜欢红颜多久了？？？敢问姑娘你，敢爆照否', '23', 1393467738, '很久了<img src="/eschool/Public/Uploads/editor/201402/530ea155a7e09.jpg" width="300" alt="" />', '1', '1', '1'),
(13, 93, 55, 1393438776, '为啥名字只能是六位？？？？', '27,19', 1393438923, '多了就跑了、、、', '1', '1', '1'),
(12, 70, 75, 1393438131, '<p>八百标兵奔北坡、、、</p><p>接下来呢？？？<br /></p>', '19', 1393438858, '<strong>炮兵并排北边跑</strong>', '0', '1', '0'),
(14, 61, 55, 1393439806, '多提俩有建设性的问题', '28', 1393441398, '啥情况啊', '0', '1', '1'),
(15, 93, 55, 1393458900, '版本控制器的冲突解决', '12', 1393468959, '认真点 把该删的删了，该留的留、就好啦！<br />', '0', '1', '1'),
(16, 65, 61, 1393462185, '万万没想到啊', '13', 1393467655, '你没想到个啥？', '1', '1', '1');

-- --------------------------------------------------------

--
-- 表的结构 `bbs_tgroup`
--

CREATE TABLE `bbs_tgroup` (
  `id` mediumint(8) UNSIGNED NOT NULL COMMENT '讨论组id',
  `name` varchar(30) NOT NULL COMMENT '讨论组名',
  `uid` int(10) NOT NULL COMMENT '会员id',
  `addtime` int(11) NOT NULL DEFAULT '1' COMMENT '创建时间',
  `cids` varchar(200) NOT NULL COMMENT '已加入小组成员id号（，分割）',
  `keyword` varchar(100) NOT NULL COMMENT '标签（关键字）'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `edu_cat`
--

CREATE TABLE `edu_cat` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL DEFAULT '',
  `pid` int(5) UNSIGNED NOT NULL,
  `path` varchar(20) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_cat`
--

INSERT INTO `edu_cat` (`id`, `name`, `pid`, `path`, `status`) VALUES
(1, 'PHP', 0, '0,', '1'),
(2, 'HTML', 0, '0,', '1'),
(3, 'JavaScript', 0, '0,', '1'),
(4, 'Java', 0, '0,', '1'),
(5, 'C', 0, '0,', '1'),
(6, 'MySQL', 0, '0,', '1'),
(7, 'SQLServer', 0, '0,', '1'),
(8, 'Linux', 0, '0,', '1'),
(9, 'PHP基础', 1, '0,1,', '1'),
(10, 'PHP高级', 1, '0,1,', '1'),
(11, 'PHP特级', 1, '0,1,', '1'),
(12, 'HTML', 2, '0,2,', '1'),
(13, 'XHTML', 2, '0,2,', '1'),
(14, 'CSS', 2, '0,2,', '1'),
(15, 'JS', 3, '0,3,', '1'),
(17, 'PHP最高级', 1, '0,1,', '1'),
(19, 'JQuery', 3, '0,3,', '1'),
(23, '其他', 22, '0,22,', '1'),
(22, 'Other', 0, '0,', '1'),
(24, 'Java基础', 4, '0,4,', '1'),
(25, 'Java高级', 4, '0,4,', '1'),
(26, 'Java特级', 4, '0,4,', '1'),
(27, 'java最高级', 4, '0,4,', '1'),
(28, 'C++', 5, '0,5,', '1'),
(29, 'C#', 5, '0,5,', '1');

-- --------------------------------------------------------

--
-- 表的结构 `edu_classes`
--

CREATE TABLE `edu_classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `cre_id` int(10) NOT NULL,
  `class_cre` varchar(20) CHARACTER SET utf8 NOT NULL,
  `picture` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '1.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `edu_classes`
--

INSERT INTO `edu_classes` (`id`, `class_name`, `cre_id`, `class_cre`, `picture`) VALUES
(1, '系统分析设计', 0, '沈志奇', '1.jpg'),
(2, '计算机网络实训', 99, '彭老师', '1.jpg'),
(3, 'Java程序设计', 100, '程蒙依', '1.jpg'),
(4, '软件工程', 101, '吕宣娇', '1.jpg'),
(5, '软件项目管理', 99, '彭老师', '1.jpg'),
(6, '网页设计', 0, '成海秀', '1.jpg'),
(7, '高等数学（下）', 101, '吕宣娇', '1.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `edu_clicknum`
--

CREATE TABLE `edu_clicknum` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '自增id号',
  `clicknum` int(11) NOT NULL DEFAULT '0' COMMENT '网站的访问量',
  `clicktime` int(11) NOT NULL DEFAULT '0' COMMENT '最后一次的访问时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_clicknum`
--

INSERT INTO `edu_clicknum` (`id`, `clicknum`, `clicktime`) VALUES
(1, 1017, 1561707420);

-- --------------------------------------------------------

--
-- 表的结构 `edu_collect`
--

CREATE TABLE `edu_collect` (
  `uid` int(10) UNSIGNED DEFAULT '0' COMMENT '用户的id',
  `vid` int(10) UNSIGNED DEFAULT '0' COMMENT '视频的id',
  `lid` int(10) UNSIGNED DEFAULT '0' COMMENT '文库资源的id',
  `nid` int(10) UNSIGNED DEFAULT '0' COMMENT '视频手记的id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_collect`
--

INSERT INTO `edu_collect` (`uid`, `vid`, `lid`, `nid`) VALUES
(63, 42, 0, 0),
(64, 0, 38, 0),
(64, 0, 36, 0),
(64, 0, 0, 35),
(64, 0, 0, 36),
(93, 0, 37, 0),
(93, 42, 0, 0),
(75, 0, 36, 0),
(70, 0, 41, 0),
(75, 0, 0, 35),
(75, 52, 0, 0),
(75, 51, 0, 0),
(70, 0, 48, 0),
(76, 40, 0, 0),
(70, 0, 33, 0),
(70, 0, 45, 0),
(76, 45, 0, 0),
(70, 0, 38, 0),
(70, 0, 43, 0),
(70, 42, 0, 0),
(70, 52, 0, 0),
(75, 44, 0, 0),
(69, 0, 36, 0),
(69, 0, 43, 0),
(71, 44, 0, 0),
(64, 44, 0, 0),
(69, 0, 35, 0),
(69, 0, 38, 0),
(66, 0, 38, 0),
(69, 0, 0, 23),
(69, 0, 0, 26),
(67, 0, 0, 23),
(67, 0, 0, 25),
(69, 52, 0, 0),
(66, 46, 0, 0),
(66, 41, 0, 0),
(67, 44, 0, 0),
(67, 47, 0, 0),
(66, 43, 0, 0),
(69, 44, 0, 0),
(69, 41, 0, 0),
(69, 45, 0, 0),
(62, 47, 0, 0),
(63, 0, 0, 37),
(63, 0, 48, 0),
(63, 0, 33, 0),
(63, 0, 44, 0),
(63, 0, 0, 23),
(63, 50, 0, 0),
(63, 0, 0, 38),
(63, 0, 0, 39),
(63, 0, 0, 40),
(61, 0, 36, 0),
(61, 44, 0, 0),
(61, 0, 0, 38),
(63, 0, 43, 0),
(68, 53, 0, 0),
(63, 0, 49, 0),
(68, 0, 0, 40),
(63, 0, 36, 0),
(65, 59, 0, 0),
(95, 52, 0, 0),
(98, 0, 37, 0),
(98, 50, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `edu_comment`
--

CREATE TABLE `edu_comment` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '文档评论编号',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '评论的用户ID',
  `lid` int(11) NOT NULL DEFAULT '0' COMMENT '评论文档的ID',
  `vid` int(11) NOT NULL DEFAULT '0' COMMENT '评论视频的ID',
  `nid` int(11) NOT NULL DEFAULT '0' COMMENT '评论手记的ID',
  `content` text NOT NULL COMMENT '用户评论的内容',
  `addtime` int(11) NOT NULL COMMENT '评论时间',
  `status` smallint(2) NOT NULL DEFAULT '1' COMMENT '评论状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_comment`
--

INSERT INTO `edu_comment` (`id`, `uid`, `lid`, `vid`, `nid`, `content`, `addtime`, `status`) VALUES
(24, 1, 12, 0, 0, '回应两个', 1392363753, 2),
(25, 1, 7, 0, 0, '看你妹', 1392363851, 2),
(26, 1, 12, 0, 0, '认为斯坦福高行你', 1392565158, 1),
(27, 1, 11, 0, 0, ',lll', 1392620441, 1),
(28, 1, 16, 0, 0, '很有价值...', 1392643875, 2),
(29, 1, 0, 14, 0, '这个视频不错，就是不清。', 1392644902, 2),
(30, 1, 0, 14, 0, '可以评一个...', 1392644962, 2),
(34, 36, 0, 19, 0, '啊哈哈哈哈啊、', 1392809816, 1),
(22, 1, 7, 0, 0, '速速来看...', 1392299878, 2),
(32, 1, 12, 0, 0, 'sss', 1392653363, 1),
(33, 1, 0, 9, 0, '抢沙发了...', 1392701590, 2),
(35, 36, 0, 19, 0, '怎么没有呢？', 1392810059, 1);

-- --------------------------------------------------------

--
-- 表的结构 `edu_fin`
--

CREATE TABLE `edu_fin` (
  `id` int(10) NOT NULL,
  `webname` varchar(32) COLLATE utf8_bin NOT NULL,
  `url` varchar(60) COLLATE utf8_bin NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `addtime` int(11) NOT NULL,
  `descr` text COLLATE utf8_bin NOT NULL,
  `status` smallint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 表的结构 `edu_flink`
--

CREATE TABLE `edu_flink` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '链接编号',
  `classname` varchar(32) NOT NULL COMMENT '网站名称',
  `crea` varchar(60) NOT NULL COMMENT '创建者'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_flink`
--

INSERT INTO `edu_flink` (`id`, `classname`, `crea`) VALUES
(1, '网络1606', '彭国朝老师'),
(3, '软工1702', '许淼老师'),
(4, '软件项目管理', '娇娇老师'),
(5, '计科1601', '程蒙依');

-- --------------------------------------------------------

--
-- 表的结构 `edu_friend`
--

CREATE TABLE `edu_friend` (
  `uid` int(10) UNSIGNED NOT NULL COMMENT '用户id',
  `fid` int(10) UNSIGNED NOT NULL COMMENT '关注用户id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_friend`
--

INSERT INTO `edu_friend` (`uid`, `fid`) VALUES
(61, 70),
(61, 62),
(61, 66),
(61, 64),
(61, 65),
(61, 68),
(63, 71),
(64, 73),
(64, 67),
(64, 86),
(64, 71),
(64, 84),
(75, 64),
(75, 66),
(75, 62),
(75, 70),
(93, 70),
(93, 71),
(93, 66),
(93, 64),
(93, 65),
(93, 62),
(93, 61),
(93, 68),
(93, 74),
(86, 64),
(78, 64),
(73, 64),
(71, 68),
(71, 70),
(71, 64),
(71, 66),
(72, 64),
(69, 61),
(69, 62),
(69, 64),
(70, 68),
(69, 66),
(77, 64),
(69, 68),
(70, 65),
(70, 61),
(70, 64),
(70, 62),
(70, 66),
(76, 67),
(68, 92),
(68, 64),
(68, 62),
(68, 61),
(68, 66),
(67, 66),
(67, 68),
(66, 65),
(66, 61),
(66, 64),
(66, 62),
(68, 65),
(65, 64),
(65, 55),
(62, 61),
(62, 64),
(64, 77),
(63, 70),
(63, 62),
(63, 61),
(62, 70),
(68, 70),
(68, 73),
(68, 69),
(68, 86),
(68, 70),
(68, 63),
(63, 68),
(67, 70),
(67, 76),
(68, 67),
(68, 78),
(68, 73),
(68, 72),
(64, 93),
(70, 71),
(70, 93),
(95, 69),
(63, 95),
(62, 95),
(68, 95),
(64, 68),
(64, 61),
(64, 75);

-- --------------------------------------------------------

--
-- 表的结构 `edu_homework`
--

CREATE TABLE `edu_homework` (
  `id` int(10) NOT NULL,
  `uid` int(10) NOT NULL COMMENT '用户id',
  `title` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '作业题目',
  `name` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '作业名字',
  `size` int(11) NOT NULL COMMENT '作业大小',
  `type` varchar(60) CHARACTER SET utf8 NOT NULL,
  `work_id` int(11) NOT NULL,
  `comment` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '无评语',
  `score` int(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `edu_homework`
--

INSERT INTO `edu_homework` (`id`, `uid`, `title`, `name`, `size`, `type`, `work_id`, `comment`, `score`) VALUES
(1, 98, '白盒测试', '5cf75faa7cca3.pdf', 1150287, 'application/pdf', 1, '整体还行，报告错误比较多', 75),
(2, 95, '支持红帽系列', '530eac087.pdf', 9970057, 'application/pdf', 2, '无评语', 0),
(3, 95, 'Linux系列', '530eab6039c37.pdf', 537957, 'application/pdf', 1, '无评语', 0);

-- --------------------------------------------------------

--
-- 表的结构 `edu_jiafen`
--

CREATE TABLE `edu_jiafen` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `num` varchar(20) NOT NULL,
  `score` int(10) NOT NULL,
  `class_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_jiafen`
--

INSERT INTO `edu_jiafen` (`id`, `name`, `num`, `score`, `class_id`) VALUES
(1, '林宏健', '162011802', 88, 7),
(3, '培根', '162011235', 66, 6);

-- --------------------------------------------------------

--
-- 表的结构 `edu_library`
--

CREATE TABLE `edu_library` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '文档编号',
  `tid` int(11) NOT NULL COMMENT '文档类型ID',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `title` varchar(32) NOT NULL COMMENT '上传文档名',
  `name` varchar(32) DEFAULT NULL COMMENT '上传文件的随机名',
  `size` int(11) NOT NULL DEFAULT '0' COMMENT '上传文档的大小',
  `type` varchar(60) NOT NULL COMMENT '上传文档的类型',
  `addtime` int(11) DEFAULT '0' COMMENT '上传文档的时间',
  `favonum` int(11) DEFAULT '0' COMMENT '文档被顶的次数',
  `clicknum` int(11) DEFAULT '0' COMMENT '文档的浏览次数',
  `dwloadnum` int(11) DEFAULT '0' COMMENT '文档的下载次数',
  `status` smallint(1) DEFAULT '1' COMMENT '上传文档的状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_library`
--

INSERT INTO `edu_library` (`id`, `tid`, `uid`, `title`, `name`, `size`, `type`, `addtime`, `favonum`, `clicknum`, `dwloadnum`, `status`) VALUES
(43, 3, 67, '原子弹', '530e23dcdb973.pdf', 1107196, 'application/pdf', 1559467918, 4, 76, 2, 2),
(37, 14, 64, '参考手册', '530e1f62a3ebb.pdf', 181861, 'application/pdf', 1559467918, 2, 11, 0, 2),
(36, 10, 64, '军火关', '530e1f2d96abc.pdf', 1107196, 'application/pdf', 1559467918, 6, 25, 0, 2),
(32, 17, 63, '云技术普及', '530e1da2f3f2c.pdf', 142205, 'application/pdf', 1559467918, 0, 2, 0, 2),
(31, 26, 61, '鸟哥的私房菜第二章', '530e1d3b2adad.pdf', 537957, 'application/pdf', 1559467918, 0, 1, 0, 2),
(30, 13, 61, 'TCP/IP', '530e1cfd09b1e.pdf', 2856009, 'application/pdf', 1559467918, 0, 5, 0, 2),
(40, 19, 68, 'DOM参考手册', '530e2211b9ede.pdf', 181861, 'application/pdf', 1559467918, 0, 1, 0, 2),
(47, 11, 70, 'php-redis', '530e274b13711.pdf', 239080, 'application/pdf', 1559467918, 0, 2, 0, 2),
(48, 27, 70, 'redis与网站架构', '530e2768312a2.pdf', 877739, 'application/pdf', 1559467918, 1, 11, 6, 2),
(51, 8, 95, 'linux.redhat系列', '530eab6039c37.pdf', 537957, 'application/pdf', 1559467918, 0, 3, 0, 1),
(53, 8, 95, '支持红帽系列啊', '530eac0774187.pdf', 9970057, 'application/pdf', 1559467918, 0, 4, 0, 1),
(55, 0, 0, 'python', NULL, 0, '', 1559467918, 0, 3, 0, 2),
(56, 10, 98, 'Linux开发', '5cf75faa7cca3.pdf', 1150287, 'application/pdf', 1559715754, 0, 13, 1, 2),
(57, 0, 0, '大家好呀', NULL, 0, '', 1560178274, 0, 1, 0, 1),
(58, 10, 98, '大大撒大撒', '5cfe6ece3faa1.pdf', 1150287, 'application/pdf', 1560178382, 0, 0, 0, 1),
(59, 13, 98, '162011802', '5cff6ce1a4400.pdf', 1223527, 'application/pdf', 1560243425, 0, 3, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `edu_like`
--

CREATE TABLE `edu_like` (
  `uid` int(10) UNSIGNED NOT NULL COMMENT '用户id',
  `mid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '帖子id',
  `qid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '问题id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_like`
--

INSERT INTO `edu_like` (`uid`, `mid`, `qid`) VALUES
(64, 36, 0),
(64, 0, 17),
(64, 8, 0),
(93, 35, 0),
(61, 35, 0),
(65, 34, 0),
(93, 31, 0),
(93, 12, 0),
(68, 29, 0),
(65, 21, 0),
(65, 22, 0),
(65, 12, 0),
(62, 25, 0),
(68, 0, 15),
(70, 0, 12),
(61, 25, 0),
(93, 0, 8),
(93, 27, 0),
(93, 25, 0),
(70, 9, 0),
(70, 25, 0),
(70, 25, 0),
(70, 0, 7),
(70, 0, 2),
(70, 0, 4),
(70, 7, 0),
(74, 0, 4),
(70, 18, 0),
(70, 15, 0),
(68, 15, 0),
(68, 19, 0),
(68, 0, 2),
(68, 18, 0),
(67, 17, 0),
(66, 16, 0),
(68, 16, 0),
(66, 13, 0),
(65, 9, 0),
(61, 5, 0);

-- --------------------------------------------------------

--
-- 表的结构 `edu_limit`
--

CREATE TABLE `edu_limit` (
  `id` int(8) NOT NULL COMMENT '权限ID',
  `limitname` varchar(20) DEFAULT NULL COMMENT '权限名称',
  `action` varchar(20) DEFAULT NULL COMMENT '对应模块',
  `function` varchar(20) DEFAULT NULL COMMENT '方法'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `edu_node`
--

CREATE TABLE `edu_node` (
  `id` smallint(6) UNSIGNED NOT NULL COMMENT '节点id',
  `name` varchar(20) NOT NULL COMMENT '操作名称',
  `mname` varchar(50) NOT NULL COMMENT 'model名称',
  `aname` varchar(50) NOT NULL COMMENT 'action名称',
  `status` tinyint(1) DEFAULT '0' COMMENT '状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_node`
--

INSERT INTO `edu_node` (`id`, `name`, `mname`, `aname`, `status`) VALUES
(1, '浏览用户', 'users', 'index', 1),
(2, '添加用户', 'users', 'add', 1),
(3, '删除用户', 'users', 'delete', 1),
(4, '修改用户', 'users', 'edit', 1),
(5, '浏览角色', 'roles', 'index', 1),
(6, '添加角色', 'roles', 'add', 1),
(7, '删除角色', 'roles', 'delete', 1),
(8, '编辑角色', 'roles', 'edit', 1),
(9, '浏览节点', 'node', 'index', 1),
(10, '添加节点', 'node', 'add', 1),
(11, '删除节点', 'node', 'delete', 1),
(12, '修改节点', 'node', 'edit', 1),
(13, '浏览用户分配角色', 'limit', 'index', 0),
(14, '更改用户分配角色', 'limit', 'edit', 0),
(15, '浏览角色的操作权限', 'roles', 'nodelist', 1),
(16, '修改角色中操作权限', 'roles', 'savenode', 1),
(19, '浏览帖子', 'message', 'index', 1),
(20, '添加帖子', 'message', 'add', 1),
(21, '删除帖子', 'message', 'delete', 1),
(22, '修改帖子', 'message', 'edit', 1),
(23, '浏览帖子评论', 'comm', 'index', 1),
(24, '删除评论', 'comm', 'delete', 1),
(25, '浏览问题', 'question', 'index', 1),
(26, '修改问题', 'question', 'edit', 1),
(27, '删除问题', 'question', 'delete', 1),
(28, '回复问题', 'question', 'replay', 1),
(30, '浏览文库', 'library', 'index', 1),
(31, '增加文章', 'library', 'add', 1),
(32, '浏览视频', 'video', 'index', 1),
(33, '上传视频', 'video', 'add', 1),
(34, '浏览班级', 'classes', 'index', 1),
(35, '增加班级', 'classes', 'add', 1),
(36, '浏览班级成员', 'stu', 'index', 1),
(37, '增加班级成员', 'stu', 'add', 1),
(38, '我创建的班级', 'classes', 'myindex', 1),
(39, '浏览作业', 'work', 'index', 1),
(40, '发表作业', 'work', 'add', 1),
(41, '作业详情', 'homework', 'index', 1),
(42, 'homework', 'homework', 'edit', 1),
(43, '课堂加分', 'jiafen', 'add', 1),
(44, '浏览加分学生', 'jiafen', 'index', 1),
(45, '布置作业', 'homework', 'add', 1),
(46, '试卷查看', 'test', 'index', 1),
(47, '增加试卷', 'test', 'add', 1),
(48, '增加试题', 'test', 'addquest', 1),
(49, '查看试题详情', 'test', 'detail', 1),
(50, '试题的修改', 'test', 'edit', 1),
(51, '试题', 'test', 'insertquest', 1);

-- --------------------------------------------------------

--
-- 表的结构 `edu_notice`
--

CREATE TABLE `edu_notice` (
  `id` int(11) NOT NULL COMMENT '公告编号',
  `title` varchar(32) NOT NULL COMMENT '公告标题',
  `content` text NOT NULL COMMENT '公告内容',
  `author` varchar(32) NOT NULL COMMENT '添加者',
  `addtime` int(11) NOT NULL COMMENT '结束时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_notice`
--

INSERT INTO `edu_notice` (`id`, `title`, `content`, `author`, `addtime`) VALUES
(32, '编程之法：面试和算法心得', '<p></p><p style="margin: 0px 0px 14px; padding: 0px; -webkit-tap-highlight-color: transparent; color: rgb(34, 34, 34); font-family: \'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 27.1875px;">才华横溢的<a href="http://www.phpied.com/" style="color: rgb(19, 110, 194); text-decoration: none; outline: 0px;">Stoyan Stefanov</a>，在他写的由<a href="http://oreilly.com/" style="color: rgb(19, 110, 194); text-decoration: none; outline: 0px;">O’Reilly</a>初版的新书<a href="http://amzn.to/93szK7" style="color: rgb(19, 110, 194); text-decoration: none; outline: 0px;">《JavaScript Patterns》</a>(JavaScript模式)中，我想要是为我们的读者贡献其摘要，那会是件很美妙的事情。具体一点就是编写高质量JavaScript的一些要素，例如避免全局变量，使用单变量声明，在循环中预缓存length(长度)，遵循代码阅读，以及更多。</p><p style="margin: 0px 0px 14px; padding: 0px; -webkit-tap-highlight-color: transparent; color: rgb(34, 34, 34); font-family: \'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 27.1875px;">此摘要也包括一些与代码不太相关的习惯，但对整体代码的创建息息相关，包括撰写API文档、执行同行评审以及运行JSLint。这些习惯和最佳做法可以帮助你写出更好的，更易于理解和维护的代码，这些代码在几个月或是几年之后再回过头看看也是会觉得很自豪的。</p><h2 id="-writing-maintainable-code-" style="margin: 0px 0px 14px; padding: 0px 0px 0.3em; -webkit-tap-highlight-color: transparent; font-size: 1.75em; font-weight: 200; line-height: 1.225; border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(238, 238, 238); color: rgb(34, 34, 34); font-family: \'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;">书写可维护的代码(Writing Maintainable Code )</h2><p style="margin: 0px 0px 14px; padding: 0px; -webkit-tap-highlight-color: transparent; color: rgb(34, 34, 34); font-family: \'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 27.1875px;">软件bug的修复是昂贵的，并且随着时间的推移，这些bug的成本也会增加，尤其当这些bug潜伏并慢慢出现在已经发布的软件中时。当你发现bug 的时候就立即修复它是最好的，此时你代码要解决的问题在你脑中还是很清晰的。否则，你转移到其他任务，忘了那个特定的代码，一段时间后再去查看这些代码就 需要：</p><ul style="margin: 0px 0px 14px; padding: 0px 0px 0px 28px; -webkit-tap-highlight-color: transparent; color: rgb(34, 34, 34); font-family: \'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 27.1875px;"><li>花时间学习和理解这个问题</li><li>化时间是了解应该解决的问题代码</li></ul><p style="margin: 0px 0px 14px; padding: 0px; -webkit-tap-highlight-color: transparent; color: rgb(34, 34, 34); font-family: \'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 27.1875px;">还有问题，特别对于大的项目或是公司，修复bug的这位伙计不是写代码的那个人（且发现bug和修复bug的不是同一个人）。因此，必须降低理解代 码花费的时间，无论是一段时间前你自己写的代码还是团队中的其他成员写的代码。这关系到底线（营业收入）和开发人员的幸福，因为我们更应该去开发新的激动 人心的事物而不是花几小时几天的时间去维护遗留代码。</p><p style="margin: 0px 0px 14px; padding: 0px; -webkit-tap-highlight-color: transparent; color: rgb(34, 34, 34); font-family: \'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 27.1875px;">另一个相关软件开发生命的事实是，读代码花费的时间要比写来得多。有时候，当你专注并深入思考某个问题的时候，你可以坐下来，一个下午写大量的代码。</p><p style="margin: 0px 0px 14px; padding: 0px; -webkit-tap-highlight-color: transparent; color: rgb(34, 34, 34); font-family: \'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 27.1875px;">你的代码很能很快就工作了，但是，随着应用的成熟，还会有很多其他的事情发生，这就要求你的进行进行审查，修改，和调整。例如：</p><ul style="margin: 0px 0px 14px; padding: 0px 0px 0px 28px; -webkit-tap-highlight-color: transparent; color: rgb(34, 34, 34); font-family: \'Microsoft Yahei\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 27.1875px;"><li>bug是暴露的</li><li>新功能被添加到应用程序</li><li>程序在新的环境下工作（例如，市场上出现新想浏览器）</li><li>代码改变用途</li><li>代码得完全从头重新，或移植到另一个架构上或者甚至使用另一种语言</li></ul>', '李四', 1559467918),
(33, 'iOS 和 Android 哪个更利于赚钱呢?', '<p><article class="view-hero" style="box-sizing: border-box; margin: 0px; padding: 0px; word-break: normal; word-wrap: break-word; color: rgb(51, 51, 51); font-family: \'Century Gothic\', \'MicroSoft YaHei\', \'hiragino sans GB\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 18px; line-height: 36px; background-color: rgb(244, 246, 248);"><header style="box-sizing: border-box; margin: 0px; padding: 0px; word-break: normal; word-wrap: break-word;"><p style="box-sizing: border-box; margin: 0px 0px 10px; padding: 0px; word-break: normal; word-wrap: break-word; color: gray; line-height: inherit;">一直有一个几乎所有机友都认同的说法：Android 是全球用户数最多的操作系统，市场份额十分惊人。无论是问你的表哥表姐，还是弟弟妹妹，即便他们不是很关注移动领域或不很懂手机，也会告诉你 Android 拥有约全球 80% 的市场份额。</p><div class="meta" style="box-sizing: border-box; margin: 0px; padding: 16px 0px 0px; word-break: normal; word-wrap: break-word; overflow: hidden; font-size: 15px;"><span class="avatar-img" style="box-sizing: border-box; margin: 0px; padding: 0px; word-break: normal; word-wrap: break-word;"><img src="http://passport.onethink.cn/Avatar/000/013/91/43/120_120.gif" alt="释怀" style="box-sizing: border-box; margin: 0px; padding: 0px; word-break: normal; word-wrap: break-word; border: 0px; vertical-align: middle; max-width: 100%; cursor: pointer; width: 30px; height: 30px; border-top-left-radius: 15px; border-top-right-radius: 15px; border-bottom-right-radius: 15px; border-bottom-left-radius: 15px;" /></span>&nbsp;<span class="author" style="box-sizing: border-box; margin: 0px; padding: 0px; word-break: normal; word-wrap: break-word;"><a data-toggle="figurecard" data-uid="139143" href="http://www.topthink.com/u/139143.html" style="box-sizing: border-box; margin: 0px; padding: 0px; word-break: normal; word-wrap: break-word; background-color: transparent; color: rgb(43, 133, 174); text-decoration: none; background-position: initial initial; background-repeat: initial initial;">释怀</a></span>&nbsp;<span class="publish-date" style="box-sizing: border-box; margin: 0px; padding: 0px; word-break: normal; word-wrap: break-word;">2015/11/04</span></div></header></article><hr style="box-sizing: content-box; margin: 15px 0px; padding: 0px; word-break: normal; word-wrap: break-word; height: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-top-style: solid; border-top-color: rgb(238, 238, 238); color: rgb(51, 51, 51); font-family: \'Century Gothic\', \'MicroSoft YaHei\', \'hiragino sans GB\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 18px; line-height: 36px; background-color: rgb(244, 246, 248);" /><span style="color: rgb(51, 51, 51); font-family: \'Century Gothic\', \'MicroSoft YaHei\', \'hiragino sans GB\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 18px; line-height: 36px; background-color: rgb(244, 246, 248);">他们的回答并没有错，就算&nbsp;Android&nbsp;的市场份额明显小于&nbsp;80%，但从全球角度来看，Android&nbsp;依然独步整个移动操作系统的武林，无论在哪一个国家或地区。不过，故事也有另一面，开发者对&nbsp;Android&nbsp;平台大多都不太满意，因为要开发一个应用程序，不只是很难兼顾&nbsp;iOS&nbsp;和&nbsp;Android&nbsp;平台，单单应付一个&nbsp;Android&nbsp;平台就足够他们辛苦的了。</span><br /></p>', '张红颜', 1559467918),
(35, '如果你是名在读大学生，想要互联网创业', '<p><br /><span class="title" style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; display: block; height: 54px; line-height: 54px; font-size: 18px; color: rgb(255, 255, 255); font-family: 微软雅黑, \'Microsoft Yahei\', \'Hiragino Sans GB\', tahoma, arial, 宋体; background-color: rgb(61, 69, 78);">互联网创业</span></p><div class="desp" style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; height: 54px; overflow: hidden; line-height: 18px; color: rgb(255, 255, 255); font-family: 微软雅黑, \'Microsoft Yahei\', \'Hiragino Sans GB\', tahoma, arial, 宋体; background-color: rgb(61, 69, 78);">9.9元，开启你的互联网创业之路，阿里云更为你提供风投、孵化器等方面的创业扶持</div><div class="wants-desp" style="margin: 0px 0px 0px 28px; padding: 0px; border: 0px; vertical-align: baseline; float: left; width: 170px; color: rgb(255, 255, 255); font-family: 微软雅黑, \'Microsoft Yahei\', \'Hiragino Sans GB\', tahoma, arial, 宋体; line-height: 18px; background-color: rgb(61, 69, 78);"><span class="title" style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; display: block; height: 54px; line-height: 54px; font-size: 18px;">使用云计算提高效率</span><div class="desp" style="margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; height: 54px; overflow: hidden;">在计算机专业学习、数据分析，课题研究时使用云计算提高效率，使你更为出众</div><div><br /></div></div><br /><p></p>', '张洪岩', 1559467920),
(37, '教学网上线了', '教学网上线了教学网上线了教学网上线了教学网上线了教学网上线了教学网上线了教学网上线了<br />', '波波', 1559467917),
(38, '最新线下活动', '明天就要项目后考试了，大家抓紧时间复习哈~明天就要项目后考试了，大家抓紧时间复习哈~明天就要项目后考试了，大家抓紧时间复习哈~明天就要项目后考试了，大家抓紧时间复习哈~明天就要项目后考试了，大家抓紧时间复习哈~明天就要项目后考试了，大家抓紧时间复习哈~明天就要项目后考试了，大家抓紧时间复习哈~明天就要项目后考试了，大家抓紧时间复习哈~明天就要项目后考试了，大家抓紧时间复习哈~明天就要项目后考试了，大家抓紧时间复习哈~明天就要项目后考试了，大家抓紧时间复习哈~<br />', '波波', 1559467918),
(39, '欢迎使用锦尚中国在线教学考试系统', '<p>欢迎使用锦尚中国教学考试系统 http://bbs.52jscn.com<br /></p>', '锦尚中国', 1559467918);

-- --------------------------------------------------------

--
-- 表的结构 `edu_picture`
--

CREATE TABLE `edu_picture` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'id号',
  `tbname` varchar(16) NOT NULL COMMENT '表名',
  `mid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '外键关联id(帖子)',
  `qid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '外键关联id(问题)',
  `cid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '外键关联id(帖子评论)',
  `picname` varchar(32) NOT NULL COMMENT '图片名称',
  `create_time` int(10) UNSIGNED DEFAULT NULL COMMENT '添加时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 CHECKSUM=1 COMMENT='文本内容中的图片信息' DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `edu_picture`
--

INSERT INTO `edu_picture` (`id`, `tbname`, `mid`, `qid`, `cid`, `picname`, `create_time`) VALUES
(159, 'article', 35, 0, 0, '530ea6eca01e1.jpg', 1393469164),
(157, 'article', 34, 0, 0, '530ea09f0adb5.jpg', 1393467551),
(156, 'article', 27, 0, 0, '530e2f408afc8.jpg', 1393438528),
(155, 'article', 25, 0, 0, '530e2c47eab50.jpg', 1393437767),
(154, 'article', 25, 0, 0, '530e2c338932b.jpg', 1393437747),
(153, 'article', 25, 0, 0, '530e2c1b39c83.jpg', 1393437723),
(151, 'article', 22, 0, 0, '530e274ad7733.jpg', 1393436490),
(152, 'article', 25, 0, 0, '530e2bfa9161d.png', 1393437690),
(149, 'article', 0, 3, 0, '530e2704d460d.jpg', NULL),
(148, 'article', 0, 0, 816, '530e26b0a1346.jpg', 1393436336),
(147, 'article', 21, 0, 0, '530e26c14ead8.jpg', 1393436353),
(145, 'article', 0, 0, 806, '530e2286b2ba5.jpg', 1393435270),
(144, 'article', 0, 0, 0, '530e1fafbef44.jpg', 1393434543),
(143, 'article', 0, 0, 799, '530e1f473ec89.jpg', 1393434439),
(142, 'article', 12, 0, 0, '530e1effe3bb8.JPG', 1393434367),
(141, 'article', 0, 0, 783, '530e1c2e46e2d.png', 1393433646),
(140, 'article', 5, 0, 0, '530e1b9726799.gif', 1393433495),
(139, 'article', 4, 0, 0, '530e1575065bb.jpg', 1393431925),
(138, 'article', 1, 0, 0, '530e139b3ec1b.gif', 1393431451);

-- --------------------------------------------------------

--
-- 表的结构 `edu_quest`
--

CREATE TABLE `edu_quest` (
  `id` int(12) UNSIGNED NOT NULL,
  `tid` int(12) DEFAULT NULL,
  `content` varchar(96) DEFAULT NULL,
  `aA` varchar(48) DEFAULT NULL,
  `aB` varchar(48) DEFAULT NULL,
  `aC` varchar(48) DEFAULT NULL,
  `aD` varchar(48) DEFAULT NULL,
  `answer` varchar(48) DEFAULT NULL,
  `addtime` int(12) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_quest`
--

INSERT INTO `edu_quest` (`id`, `tid`, `content`, `aA`, `aB`, `aC`, `aD`, `answer`, `addtime`) VALUES
(1, 4, '以下那个js方法用来完成信息确认框?', 'alert()', 'confirm()', 'prompt()', 'open()', 'B', 1564449934),
(2, 4, '以下那个CSS样式可以改变背景颜色为红色?', 'bgcolor：red', 'color:red', 'background:red', 'text:red', 'A', 1560929934),
(3, 4, '以下那个HTML标记可以设置字体变粗？', '&lt;a&gt;&lt;/a&gt;', '&lt;b&gt;&lt;/b&gt;', '&lt;u&gt;&lt;/u&gt;', '&lt;font&gt;&lt;/font&gt;', 'A', 1560929934),
(10, 4, '计算机系统的组成部分', '硬件，软件，用户', '硬件，软件', '硬件，用户', '软件，用户', 'B', 1560929934),
(11, 4, '在C语言中能将高级语言编写的源程序转换为目标程序的软件是', '汇编程序', '编辑程序', '解释程序', '编译程序', 'C', 1560929934),
(12, 4, '十六进制数100转换为十进制数为', '256', '512', '1024', '64', 'C', 1560929934),
(13, 4, '计算机要运行某个应用程序时，首先应调入的存储器是？', '软件', '硬件', '光驱', '内存', 'D', 1560929934),
(14, 4, '计算机的最小存储单位为', 'M', 'MB', 'G', '字节', 'D', 1560929934),
(15, 4, '在计算机内部，数据是以（   ）形式加工处理和传送的。', '十进制码', '十六进制码', '八进制码', '二进制码', 'D', 1560966634),
(16, 4, '在计算机中，一个字节所包含二进制位的个数是', '2', '4', '8', '16', 'C', 1560928888),
(17, 5, '某单位的人事档案管理程序属于', '应用软件', '系统软件', '字表处理软件', '数据库系统', 'C', 1560929934),
(18, 5, 'Linux是什么', '办公软件', '编程软件', '操作系统', '图形软件', 'C', 1560929934),
(30, 6, 'aaaaaa', 'bb', 'cc', 'dd', 'ee', 'A', 1560929934),
(31, 6, 'aaaaaa', 'bb', 'cc', 'dd', 'ee', 'B', 1560929934),
(32, 6, 'aaaaaaaaaa', 'cc', 'ss', 'dd', 'xx', 'A', 1560929934),
(33, 6, 'xxxxxxxxxxxx', 'dd', 'vv', 'vvx', 'sss', 'A', 1560929934),
(34, 6, 'aaaaaaaaaa', 'ww', 'ww', 'ss', 'aa', 'D', 1560929934),
(20, 5, '栈和队列的共同特点是', '都是先进先出', '都是先进后出', '只允许在端点处插入和删除元素', '没有共同点', 'C', 1560929934),
(21, 5, '结构化程序设计的3种结构是', '顺序结构、选择结构、转移结构', '分支结构、等价结构、循环结构', '多分支结构、赋值结构、等价结构', '顺序结构、选择结构、循环结构', 'B', 1560929934),
(22, 5, '下面有关for循环的正确描述是', 'for循环只能用于循环次数已经确定的情况', 'for循环是先执行循环体语句，后判断表达式', '在for循环中，不能用break语句跳出循环体', 'for循环的循环体语句中，可包含多条语句，但必须用花括号括起来', 'A', 1560929934),
(23, 5, '以下程序段的描述，正确的是', '是死循环', '循环执行两次', '循环执行一次', '有语法错误', 'B', 1560929934),
(24, 5, '下面那些属于开源软件系统范围：', 'Linux', 'MSN', 'ASP', '.Net', 'C', 1560929934),
(25, 5, 'QL语言又称为', '结构化定义语言', '结构化控制语言', '结构化查询语言', '结构化操纵语言', 'B', 1560929934),
(26, 5, '若x为int型变量，则执行x = 6;x+ = x;语句后,x的值为', '6', '36', '12', '16', 'D', 1560929934),
(29, 5, '今天是星期几，你知道吗', '不知道', '好像是星期二', '星期三', '你说呢', 'A', 1560929934),
(35, 23, '啊实打实的', '从vv', '奥迪', '文档', '发', 'A', 1560929934),
(36, 22, '1+1=？', '1', '2', '3', '4', 'A', 1560942478);

-- --------------------------------------------------------

--
-- 表的结构 `edu_roles`
--

CREATE TABLE `edu_roles` (
  `id` int(8) UNSIGNED NOT NULL COMMENT '角色Id',
  `roletype` varchar(20) NOT NULL COMMENT '角色类型',
  `status` tinyint(1) UNSIGNED DEFAULT '1' COMMENT '状态',
  `remark` varchar(255) DEFAULT NULL COMMENT '角色简介'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_roles`
--

INSERT INTO `edu_roles` (`id`, `roletype`, `status`, `remark`) VALUES
(1, 'teacher', 1, '老师'),
(2, 'student', 1, '学生'),
(3, 'blacklister', 0, '黑名单成员');

-- --------------------------------------------------------

--
-- 表的结构 `edu_role_node`
--

CREATE TABLE `edu_role_node` (
  `rid` int(8) DEFAULT NULL COMMENT '角色Id',
  `nid` int(8) DEFAULT NULL COMMENT '权限Id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_role_node`
--

INSERT INTO `edu_role_node` (`rid`, `nid`) VALUES
(2, 8),
(1, 50),
(1, 49),
(2, 1),
(1, 48),
(1, 47),
(1, 46),
(1, 45),
(1, 44),
(1, 43),
(1, 42),
(1, 41),
(1, 40),
(1, 39),
(1, 38),
(1, 37),
(1, 36),
(1, 35),
(2, 9),
(1, 34),
(1, 33),
(1, 32),
(1, 31),
(1, 30),
(1, 28),
(1, 27),
(1, 26),
(1, 25),
(1, 24),
(1, 23),
(1, 22),
(1, 21),
(1, 20),
(1, 19),
(1, 15),
(1, 13),
(1, 12),
(1, 11),
(1, 10),
(1, 9),
(1, 6),
(1, 5),
(1, 2),
(1, 1),
(1, 51);

-- --------------------------------------------------------

--
-- 表的结构 `edu_score`
--

CREATE TABLE `edu_score` (
  `id` int(11) UNSIGNED NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_score`
--

INSERT INTO `edu_score` (`id`, `tid`, `uid`, `time`, `score`) VALUES
(14, 5, 64, 1393434164, 30),
(13, 5, 62, 1393433704, 50),
(12, 4, 62, 1393433679, 25),
(11, 5, 62, 1393433657, 60),
(10, 5, 62, 1393433589, 44),
(9, 5, 62, 1393433556, 44),
(15, 4, 67, 1393434747, 20),
(16, 5, 66, 1393435594, 30),
(17, 4, 66, 1393435621, 30),
(18, 5, 66, 1393435647, 30),
(19, 5, 69, 1393436632, 40),
(20, 4, 69, 1393436656, 50),
(21, 5, 70, 1393436642, 40),
(22, 4, 70, 1393436675, 28),
(23, 5, 70, 1393437457, 50),
(24, 5, 93, 1393438735, 20),
(25, 4, 63, 1393441226, 40),
(26, 5, 70, 1393467912, 22),
(27, 4, 62, 1393469385, 20),
(28, 6, 62, 1393469649, 0),
(29, 5, 64, 1393472269, 0),
(30, 5, 97, 1453206818, 0),
(31, 5, 98, 1553583810, 0),
(32, 20, 98, 1559715530, 0),
(33, 4, 98, 1560248161, 0),
(34, 5, 98, 1560496522, 0),
(35, 5, 98, 1560600809, 0),
(36, 5, 98, 1560926359, 0),
(37, 23, 98, 1560938859, 100),
(38, 5, 98, 1560991109, 33),
(39, 5, 98, 1560993232, 0),
(40, 5, 98, 1561707257, 0);

-- --------------------------------------------------------

--
-- 表的结构 `edu_stu`
--

CREATE TABLE `edu_stu` (
  `id` int(2) NOT NULL,
  `stu_id` int(10) NOT NULL COMMENT '学生ID',
  `class_id` int(10) NOT NULL COMMENT '班级ID',
  `stu_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `stu_num` varchar(20) COLLATE utf8_bin NOT NULL,
  `statue` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `edu_stu`
--

INSERT INTO `edu_stu` (`id`, `stu_id`, `class_id`, `stu_name`, `stu_num`, `statue`) VALUES
(2, 93, 2, '小朝', '162011555', 0),
(3, 97, 3, '徐淼', '162011666', 0),
(9, 66, 4, 'kun', '162011555', 0),
(11, 55, 5, '陈德', '162011777', 0),
(19, 98, 7, 'Fred', '162011802', 0),
(21, 98, 5, 'Fred', '162011802', 0),
(22, 98, 3, 'Fred', '162011802', 0),
(23, 92, 7, '许淼', '162011888', 1),
(24, 98, 6, 'Fred', '162011802', 0),
(25, 98, 4, 'Fred', '162011802', 0);

-- --------------------------------------------------------

--
-- 表的结构 `edu_test`
--

CREATE TABLE `edu_test` (
  `id` int(10) NOT NULL,
  `tid` int(10) DEFAULT NULL,
  `title` varchar(36) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_test`
--

INSERT INTO `edu_test` (`id`, `tid`, `title`, `addtime`) VALUES
(5, 11, 'php特级测试AA卷', 1559467918),
(4, 10, 'php高级测试A卷', 1559887918),
(6, 12, 'HTML基础测试A卷', 1559467918),
(7, 13, 'XHRML基础测试卷A', 1559468818),
(8, 24, 'Java基础测试A卷', 1559467918),
(9, 14, 'CSS高级测试A卷', 1559467918),
(11, 23, '今天是个好日子', 1559997918),
(12, 19, '明天考试靠什么', 1559411918),
(13, 15, 'JS珍藏版黄金测试题', 1559467999),
(14, 14, 'java高级独家测试', 1559777918),
(15, 25, '一套很神秘的测试题', 1559667918),
(17, 9, '学习要从基础开始', 1559499918),
(18, 28, 'C是个什么东东呢', 1551467918),
(19, 29, 'C#高级测试题', 1559455918),
(20, 6, 'mysql部分测试题', 1559467888),
(21, 7, '高大上的测试题', 1559467521),
(22, 6, '高端大气的数据库测试', 1559452118),
(23, 28, '这次一定能考好的', 1559467918);

-- --------------------------------------------------------

--
-- 表的结构 `edu_usermessage`
--

CREATE TABLE `edu_usermessage` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '留言ID',
  `myid` int(10) UNSIGNED NOT NULL COMMENT '自己的Id',
  `vid` int(10) UNSIGNED NOT NULL COMMENT '留言者id',
  `content` varchar(255) DEFAULT NULL COMMENT '留言内容',
  `addtime` int(50) UNSIGNED NOT NULL COMMENT '留言时间',
  `myname` varchar(30) NOT NULL COMMENT '我的用户名',
  `visitor` varchar(30) NOT NULL COMMENT '留言者',
  `upic` varchar(50) NOT NULL COMMENT '留言者头像'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_usermessage`
--

INSERT INTO `edu_usermessage` (`id`, `myid`, `vid`, `content`, `addtime`, `myname`, `visitor`, `upic`) VALUES
(48, 59, 59, '二货的一天', 1393431584, 'dong', 'dong', '530e13ee00a00.jpg'),
(49, 59, 59, '你若安好，便是雾霾！！！', 1393431595, 'dong', 'dong', '530e13ee00a00.jpg'),
(50, 63, 63, '今天的项目开始审核了...', 1393433567, 'zxbshiwo', 'zxbshiwo', '530e1b9d1ec75.jpg'),
(51, 64, 64, '你若安好，便是雾霾！！！', 1393433678, 'dong', 'dong', '530e1bf4626e4.jpg'),
(52, 65, 65, '我不想看到发布、、、', 1393434138, 'zhy1', 'zhy1', '530e1dde48d5a.jpg'),
(53, 66, 66, '心情很美丽，真的啊，哈哈', 1393434889, 'xiaoping', 'xiaoping', '530e1ee51c30f.jpg'),
(54, 67, 67, '哈哈的一天啊', 1393435823, 'dong2', 'dong2', '530e1fc8a05c5.jpg'),
(55, 70, 70, '擦', 1393436264, 'zhy3', 'zhy3', '530e2647a6b54.jpg'),
(56, 64, 72, '来给你踩踩', 1393436531, 'dong', 'dong3', '530e27396867f.jpg'),
(57, 64, 73, '我是管炎', 1393436625, 'dong', 'dong4', '530e27aa4f65a.jpg'),
(58, 67, 70, '管制先', 1393436718, 'dong2', 'zhy3', '530e2647a6b54.jpg'),
(59, 67, 70, '好险啊', 1393436722, 'dong2', 'zhy3', '530e2647a6b54.jpg'),
(60, 67, 70, '登山包', 1393436726, 'dong2', 'zhy3', '530e2647a6b54.jpg'),
(61, 71, 71, '美丽的心情', 1393436763, 'nicai', 'nicai', '530e26694c515.jpg'),
(62, 64, 74, '管炎我有来了', 1393436757, 'dong', 'dong5', '530e281420056.jpg'),
(63, 71, 71, '心情很美丽', 1393436770, 'nicai', 'nicai', '530e26694c515.jpg'),
(64, 71, 71, '哈哈，是啊', 1393436779, 'nicai', 'nicai', '530e26694c515.jpg'),
(65, 67, 76, 'nimei啊 斯伯丁', 1393437092, 'dong2', 'dong6', '530e29591a4da.jpg'),
(66, 76, 76, '111111', 1393437193, 'dong6', 'dong6', '530e29591a4da.jpg'),
(67, 64, 77, 'wuuwuw', 1393437365, 'dong', 'dong7', '530e2a9a1ea1c.jpg'),
(68, 64, 77, '其实红颜喜欢涛哥很久了，但是。。。。', 1393437395, 'dong', 'dong7', '530e2a9a1ea1c.jpg'),
(69, 61, 70, 'hello\n', 1393437419, 'zhy', 'zhy3', '530e2647a6b54.jpg'),
(70, 78, 70, '管子董啊 懂啊', 1393437436, 'dong8', 'zhy3', '530e2647a6b54.jpg'),
(71, 93, 93, '可以吧', 1393438990, '999999', '999999', '530e2e5173fae.JPG'),
(72, 93, 93, '我勒个擦', 1393439007, '999999', '999999', '530e2e5173fae.JPG'),
(73, 62, 62, '你说呢', 1393439036, 'dandan', 'dandan', '530e1b771fbdd.jpg'),
(74, 62, 62, '呵呵', 1393439043, 'dandan', 'dandan', '530e1b771fbdd.jpg'),
(75, 62, 62, '怎么没有人么', 1393439645, 'dandan', 'dandan', '530e1b771fbdd.jpg'),
(76, 62, 62, '你是谁啊', 1393439650, 'dandan', 'dandan', '530e1b771fbdd.jpg'),
(77, 64, 64, '好屌\n', 1393439631, 'dong', 'dong', '530e1bf4626e4.jpg'),
(78, 62, 62, '我不认识你', 1393439656, 'dandan', 'dandan', '530e1b771fbdd.jpg'),
(79, 62, 62, '你是谁啊你', 1393439672, 'dandan', 'dandan', '530e1b771fbdd.jpg'),
(80, 62, 62, '快点说啊', 1393439682, 'dandan', 'dandan', '530e1b771fbdd.jpg'),
(81, 62, 62, '再不说记u不理你了', 1393439693, 'dandan', 'dandan', '530e1b771fbdd.jpg'),
(82, 64, 64, '你若安好，便是雾霾！！！', 1393459975, 'dong', 'dong', '530e1bf4626e4.jpg'),
(83, 64, 64, '~~~~苍茫的天涯是我的爱~~~~', 1393460496, 'dong', 'dong', '530e1bf4626e4.jpg'),
(84, 76, 67, '给你踩踩', 1393464208, 'dong6', 'dong2', '530e1fc8a05c5.jpg'),
(85, 93, 64, '禽兽管炎', 1393467239, '999999', 'dong', '530e1bf4626e4.jpg'),
(86, 95, 95, '4小A加油啊！挺你们哦。', 1393468108, 'xiaohaohao', 'xiaohaohao', '530ea17eae949.jpg'),
(87, 95, 95, '淡定，，，我路过的！', 1393468205, 'xiaohaohao', 'xiaohaohao', '530ea17eae949.jpg'),
(88, 98, 98, '26262626', 1559624468, 'Fred', 'Fred', '5cb3fac7c4a99.JPG'),
(89, 98, 98, '阿达萨达萨达市场', 1559624705, 'Fred', 'Fred', '5cb3fac7c4a99.JPG'),
(90, 98, 98, '今天软件项目管理期末验收啦', 1560388558, 'Fred', 'Fred', '5cb3fac7c4a99.JPG');

-- --------------------------------------------------------

--
-- 表的结构 `edu_userphotos`
--

CREATE TABLE `edu_userphotos` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '照片编号',
  `picname` varchar(255) NOT NULL COMMENT '服务器端照片名',
  `uid` int(11) NOT NULL COMMENT '所属用户编号',
  `pid` int(11) NOT NULL COMMENT '相册Id',
  `oldname` varchar(120) NOT NULL COMMENT '用户上传的照片名',
  `addtime` int(11) DEFAULT NULL COMMENT '发布时间',
  `describe` varchar(255) DEFAULT NULL COMMENT '相片描述'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_userphotos`
--

INSERT INTO `edu_userphotos` (`id`, `picname`, `uid`, `pid`, `oldname`, `addtime`, `describe`) VALUES
(328, '530e147178e6a.jpg', 59, 30, '清秀美女ViVi 清纯写真 2.jpg', 1393431665, NULL),
(329, '530e147179c2b.jpg', 59, 30, '清秀美女ViVi 清纯写真 4.jpg', 1393431666, NULL),
(330, '530e14717a6ea.jpg', 59, 30, '清如明镜的小女子 1.jpg', 1393431666, NULL),
(331, '530e14717b335.jpg', 59, 30, '气质美女的清纯动人图集 3.jpg', 1393431666, NULL),
(332, '530e14717bda8.jpg', 59, 30, '戴小帽子的女孩 5.jpg', 1393431666, NULL),
(333, '530e14717c90a.jpg', 59, 30, '戴小帽子的女孩 4.jpg', 1393431667, NULL),
(334, '530e14717d4d2.jpg', 59, 30, '戴小帽子的女孩 3.jpg', 1393431667, NULL),
(335, '530e14717e18f.jpg', 59, 30, '戴小帽子的女孩 2.jpg', 1393431667, NULL),
(336, '530e14d1341bb.jpg', 59, 31, '气质美女的清纯动人图集 3.jpg', 1393431761, NULL),
(337, '530e1c04f2935.jpg', 64, 32, '气质美女的清纯动人图集 3.jpg', 1393433605, NULL),
(338, '530e1c04f34ce.jpg', 64, 32, '气质美女的清纯动人图集 7.jpg', 1393433605, NULL),
(339, '530e1c04f4129.jpg', 64, 32, '清如明镜的小女子 1.jpg', 1393433605, NULL),
(340, '530e1c0500c59.jpg', 64, 32, '戴小帽子的女孩 5.jpg', 1393433606, NULL),
(341, '530e1c05018cd.jpg', 64, 32, '戴小帽子的女孩 3.jpg', 1393433606, NULL),
(342, '530e1c05024ec.jpg', 64, 32, '清秀美女ViVi 清纯写真 4.jpg', 1393433606, NULL),
(343, '530e1c05031ce.jpg', 64, 32, '清如明镜的小女子 1.jpg', 1393433607, NULL),
(344, '530e1c0503d5e.jpg', 64, 32, '戴小帽子的女孩 2.jpg', 1393433607, NULL),
(345, '530e1c2057d44.jpg', 64, 33, '戴小帽子的女孩 4.jpg', 1393433632, NULL),
(346, '530e1e4be5bcc.jpg', 65, 34, '48d90414297671394b90a732.jpg', 1393434188, NULL),
(347, '530e1e4be6f82.jpg', 65, 34, 'psuCAP9OTQX.jpg', 1393434188, NULL),
(348, '530e1e4be82cb.jpg', 65, 34, '073b064591d5dd336a63e59c.jpg', 1393434189, NULL),
(349, '530e1e4be9532.jpg', 65, 34, 'psuCA8Q3TSA.jpg', 1393434189, NULL),
(350, '530e1e4bea4dc.GIF', 65, 34, 'Z2H1TVD1.GIF', 1393434189, NULL),
(351, '530e1e4beb559.jpg', 65, 34, '153446fs4sfm7sjysftzv4.jpg', 1393434190, NULL),
(352, '530e2031dce8a.jpg', 67, 35, '戴小帽子的女孩 3.jpg', 1393434674, NULL),
(353, '530e2031ddb7f.jpg', 67, 35, '戴小帽子的女孩 1.jpg', 1393434674, NULL),
(354, '530e2031de772.jpg', 67, 35, '清如明镜的小女子 1.jpg', 1393434674, NULL),
(355, '530e2031df412.jpg', 67, 35, '气质美女的清纯动人图集 7.jpg', 1393434675, NULL),
(356, '530e2031e0015.jpg', 67, 35, '气质美女的清纯动人图集 7.jpg', 1393434675, NULL),
(357, '530e2031e0d1b.jpg', 67, 35, '戴小帽子的女孩 3.jpg', 1393434675, NULL),
(358, '530e204c4ccde.jpg', 67, 36, '清如明镜的小女子 1.jpg', 1393434700, NULL),
(359, '530e204c4d86a.jpg', 67, 36, '戴小帽子的女孩 4.jpg', 1393434700, NULL),
(360, '530e2059d75bf.jpg', 67, 37, '气质美女的清纯动人图集 3.jpg', 1393434714, NULL),
(361, '530e20e88c918.jpg', 69, 38, '51.jpg', 1393434856, NULL),
(362, '530e20e88dc2d.jpg', 69, 38, '54.jpg', 1393434857, NULL),
(363, '530e20e88eb00.jpg', 69, 38, '0.jpg', 1393434857, NULL),
(364, '530e20e88fa2b.gif', 69, 38, '0R5521C4-4.gif', 1393434857, NULL),
(365, '530e20e890d6b.jpg', 69, 38, '11.jpg', 1393434857, NULL),
(366, '530e20e891cb5.jpg', 69, 38, '1.jpg', 1393434857, NULL),
(367, '530e20fee2d7d.jpg', 69, 38, '510dc3d68f393.jpg', 1393434879, NULL),
(368, '530e20fee40a7.jpg', 69, 38, '0087.jpg', 1393434879, NULL),
(369, '530e25c1b2314.jpg', 68, 39, '7acb0a46f21fbe0912443ab26b600c338744ad7a.jpg', 1393436098, NULL),
(370, '530e25c1b3889.jpg', 68, 39, 'e1fe9925bc315c602253db528db1cb134854774c.jpg', 1393436098, NULL),
(371, '530e25c1b495f.jpg', 68, 39, '1c950a7b02087bf45df4ae4ff2d3572c11dfcf78.jpg', 1393436098, NULL),
(372, '530e25c1b5a88.jpg', 68, 39, '8b82b9014a90f6034ab865e13912b31bb051ed08.jpg', 1393436098, NULL),
(373, '530e25c1b6a92.jpg', 68, 39, '1c950a7b02087bf45df4ae4ff2d3572c11dfcf78.jpg', 1393436099, NULL),
(374, '530e25c1b7be4.jpg', 68, 39, '5366d0160924ab188412189135fae6cd7b890b0b.jpg', 1393436099, NULL),
(375, '530e25c1b938d.jpg', 68, 39, 'e850352ac65c10388fb07e7fb2119313b17e8945.jpg', 1393436099, NULL),
(376, '530e25c1ba365.jpg', 68, 39, '2f738bd4b31c8701e6ac4b40277f9e2f0708ff7a.jpg', 1393436100, NULL),
(377, '530e29b1ab6b5.jpg', 62, 40, '64380cd7912397dd97f399145882b2b7d0a28713.jpg', 1393437106, NULL),
(378, '530e29b1ac058.jpg', 62, 40, '2457387_125911445000_2.jpg', 1393437106, NULL),
(379, '530e29b1acc9f.jpg', 62, 40, '201313102418924.jpg', 1393437107, NULL),
(380, '530e29b1add74.jpg', 62, 40, '2457387_125911445000_2.jpg', 1393437108, NULL),
(381, '530e29b1ae979.jpg', 62, 40, '881b636988612e2d_i.jpg', 1393437108, NULL),
(382, '530e29b1af164.jpg', 62, 40, '65421f2e4a3db29a_i.jpg', 1393437108, NULL),
(383, '530e2eba1e01f.gif', 93, 41, 'psu (1).gif', 1393438394, NULL),
(384, '530e2eba1f285.gif', 93, 41, 'psu (2).gif', 1393438394, NULL),
(385, '530e2eba20232.gif', 93, 41, 'fdhgfr[1]_副本.gif', 1393438394, NULL),
(386, '530e2eba220aa.gif', 93, 41, 'a9d3fd1f4134970ad9e7ee4994cad1c8a6865dc4.jpg.gif', 1393438394, NULL),
(387, '530e2eba24556.jpg', 93, 41, 'RYH.jpg', 1393438395, NULL),
(388, '530e2eba254b9.gif', 93, 41, 'http_imgload.gif', 1393438395, NULL),
(389, '530e31ca8090b.png', 93, 42, 'QQ截图20110731225740.png', 1393439178, NULL),
(390, '530e31ca81816.png', 93, 42, 'QQ截图20110731223033.png', 1393439179, NULL),
(391, '530e31ca83626.png', 93, 42, 'QQ截图20110812222331.png', 1393439179, NULL),
(392, '530e31ca85165.png', 93, 42, 'QQ截图20110731225846.png', 1393439180, NULL),
(393, '530e31ca86560.png', 93, 42, 'QQ截图20110731222357.png', 1393439180, NULL),
(394, '530e338593fd6.jpg', 63, 43, 'psb (14).jpg', 1393439621, NULL),
(395, '530e338595089.jpg', 63, 43, 'psb (5).jpg', 1393439622, NULL),
(396, '530e338596779.jpg', 63, 43, 'psb (4).jpg', 1393439622, NULL),
(397, '530e3385978a3.jpg', 63, 43, 'psb (3).jpg', 1393439622, NULL),
(398, '530e338598be2.jpg', 63, 43, 'psb (2).jpg', 1393439622, NULL),
(399, '530e33859aba4.jpg', 63, 43, 'psb (1).jpg', 1393439623, NULL),
(400, '530e3394f3159.jpg', 63, 43, '2c49e0bf6c81800aefd831d1b13533fa838b47c6.jpg', 1393439637, NULL),
(401, '530ea1f753012.jpg', 95, 44, 'u=1189257166,1392076058&fm=23&gp=0.jpg', 1393467895, NULL),
(402, '530ea1f75430d.jpg', 95, 44, 'u=1646403891,2853459476&fm=23&gp=0.jpg', 1393467895, NULL),
(403, '530ea1f7553a1.jpg', 95, 44, 'u=3164306277,207481494&fm=21&gp=0.jpg', 1393467895, NULL),
(404, '530ea280cb291.jpg', 95, 45, 'u=1646403891,2853459476&fm=23&gp=0.jpg', 1393468032, NULL),
(405, '530ea280cc30f.jpg', 95, 45, 'u=1189257166,1392076058&fm=23&gp=0.jpg', 1393468033, NULL),
(406, '530ea280cd330.jpg', 95, 45, '1056432044-9.jpg', 1393468033, NULL),
(407, '530ea280ce313.jpg', 95, 45, '1056433c4-0.jpg', 1393468033, NULL),
(408, '530eb2541d724.jpg', 64, 46, '清秀美女ViVi 清纯写真 2.jpg', 1393472084, NULL),
(409, '530eb2541e73e.jpg', 64, 46, '清如明镜的小女子 3.jpg', 1393472084, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `edu_userrole`
--

CREATE TABLE `edu_userrole` (
  `uid` int(8) DEFAULT NULL COMMENT '用户Id',
  `rid` int(8) DEFAULT NULL COMMENT '角色Id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_userrole`
--

INSERT INTO `edu_userrole` (`uid`, `rid`) VALUES
(55, 1),
(55, 2),
(66, 1),
(66, 2),
(64, 1),
(64, 2),
(62, 1),
(62, 2),
(61, 1),
(61, 2),
(71, 1),
(71, 2),
(74, 2),
(73, 2),
(75, 1),
(75, 2),
(72, 2),
(70, 2),
(69, 1),
(69, 2),
(68, 2),
(67, 2),
(65, 2),
(63, 2),
(98, 2),
(99, 1),
(100, 1),
(101, 1);

-- --------------------------------------------------------

--
-- 表的结构 `edu_users`
--

CREATE TABLE `edu_users` (
  `id` int(5) NOT NULL COMMENT '用户Id',
  `username` varchar(20) DEFAULT NULL COMMENT '用户名',
  `userpass` varchar(50) DEFAULT NULL COMMENT '用户密码',
  `name` varchar(6) DEFAULT NULL COMMENT '姓名',
  `sex` tinyint(1) UNSIGNED DEFAULT NULL COMMENT '性别',
  `age` int(3) DEFAULT NULL COMMENT '年龄',
  `email` varchar(20) DEFAULT NULL COMMENT '邮箱',
  `class` varchar(20) DEFAULT NULL COMMENT '教师为组，学生为班',
  `picture` varchar(20) DEFAULT '1.jpg' COMMENT '用户头像',
  `level` int(4) DEFAULT NULL COMMENT '用户等级',
  `point` float DEFAULT NULL COMMENT '用户积分',
  `addtime` int(20) DEFAULT NULL COMMENT '注册时间',
  `introduce` varchar(255) DEFAULT '一位php程序小菜鸟~' COMMENT '简介',
  `logintime` int(11) NOT NULL DEFAULT '0' COMMENT '记录用户当前登录的时间',
  `logouttime` int(11) NOT NULL DEFAULT '0' COMMENT '记录用户退出时的时间',
  `loginnum` int(11) NOT NULL DEFAULT '0' COMMENT '记录用户的登录次数',
  `stu_num` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_users`
--

INSERT INTO `edu_users` (`id`, `username`, `userpass`, `name`, `sex`, `age`, `email`, `class`, `picture`, `level`, `point`, `addtime`, `introduce`, `logintime`, `logouttime`, `loginnum`, `stu_num`) VALUES
(55, 'admin', '21232f297a57a5a743894a0e4a801fc3', '管理员', 1, 22, 'admin@admin.com', '74', '530e9f9d3b45b.jpg', 10, 999, 1393430863, '无', 1560942307, 1560942321, 74, ''),
(61, 'zhy', '96e79218965eb72c92a549dd5a330112', '张洪岩', 1, 22, 'zhy@zhy.com', NULL, '530e33b3c714c.jpg', NULL, NULL, 1393433408, '张大神！！！', 1393472553, 1393472651, 5, '162018322'),
(62, 'dandan', '96e79218965eb72c92a549dd5a330112', '蛋蛋', 2, 18, 'dandan@dan.com', NULL, '530e1b771fbdd.jpg', NULL, NULL, 1393433437, '小菜鸟~', 0, 0, 0, ''),
(63, 'zxbshiwo', '96e79218965eb72c92a549dd5a330112', '波波', 1, 23, 'zxbshiwo@qq.com', NULL, '530e1b9d1ec75.jpg', NULL, NULL, 1393433459, '一位php程序小菜鸟~', 0, 0, 0, ''),
(71, 'nicai', '96e79218965eb72c92a549dd5a330112', '妹妹', 1, 88, 'cai@qq.com', NULL, '530e26694c515.jpg', NULL, NULL, 1393436242, '一位php程序老太太~', 0, 0, 0, ''),
(72, 'dong3', '96e79218965eb72c92a549dd5a330112', '111', 2, 1, 'adminasgfds@qq.com', NULL, '530e27396867f.jpg', NULL, NULL, 1393436435, '一位php程序小菜鸟~', 0, 0, 0, ''),
(73, 'dong4', '96e79218965eb72c92a549dd5a330112', 'sss', 1, 2, 'admin@nn.com', NULL, '530e27aa4f65a.jpg', NULL, NULL, 1393436571, '一位php程序小菜鸟~', 0, 0, 0, ''),
(74, 'dong5', '96e79218965eb72c92a549dd5a330112', 'ss', 2, 12, 'admin@mm.com', NULL, '530e281420056.jpg', NULL, NULL, 1393436666, '一位php程序小菜鸟~', 0, 0, 0, ''),
(75, 'bobo', '96e79218965eb72c92a549dd5a330112', '波哥', 1, 25, 'bobo@qq.com', NULL, '530e292ce8290.jpg', NULL, NULL, 1393436953, '波哥威武。。。', 0, 0, 0, ''),
(76, 'dong6', '96e79218965eb72c92a549dd5a330112', 'sss', 1, 23, 'adminuu@11.com', NULL, '530e29591a4da.jpg', NULL, NULL, 1393437001, '一位php程序小菜鸟~', 0, 0, 0, ''),
(87, 'qing', '96e79218965eb72c92a549dd5a330112', '小晴晴', 2, 20, 'qing@qq.com', NULL, '530e2cf25d264.jpg', NULL, NULL, 1393437910, '一位php程序小菜鸟~', 0, 0, 0, ''),
(88, 'kaixin', '96e79218965eb72c92a549dd5a330112', '开心ing', 2, 22, 'kaixin@qq.com', NULL, '530e2d4f4a547.jpg', NULL, NULL, 1393438004, '一位php程序小菜鸟~', 0, 0, 0, '162011833'),
(90, 'danmei', '96e79218965eb72c92a549dd5a330112', '蛋妹子', 2, 15, 'dan@qq.com', NULL, '530e2dd9cf81b.jpg', NULL, NULL, 1393438137, '一位php程序小菜鸟~', 0, 0, 0, ''),
(93, '999999', '96e79218965eb72c92a549dd5a330112', 'Hang灬玉', 1, 22, '999@999.com', NULL, '530e2e5173fae.JPG', NULL, NULL, 1393438273, '叫我岩哥~', 0, 0, 0, ''),
(94, 'dange', '96e79218965eb72c92a549dd5a330112', '蛋哥', 2, 18, 'da@dan.com', NULL, '530e2eb170192.jpg', NULL, NULL, 1393438336, '一位php程序小菜鸟~', 0, 0, 0, ''),
(95, 'xiaohaohao', '4d681ba9a8b533dcff082debb01986c3', '小浩', 1, 22, '654602355@qq.com', NULL, '530ea17eae949.jpg', NULL, NULL, 1393467722, '一位php程序小菜鸟~', 0, 0, 0, ''),
(98, 'Fred', '5e7720e2b9a1beea5f2514498cb166a8', 'Fred', 1, 12, '928611403@qq.com', NULL, '5d09d87ef41c1.jpg', NULL, NULL, 1553583787, '一位php程序小菜鸟~', 1559726197, 1559726205, 5, '162011802'),
(99, 'teacher1', '5e7720e2b9a1beea5f2514498cb166a8', '彭老师', 2, 34, '2817408776@qq.com', '', '5cf7a8094e857.jpg', 0, 0, 1559734281, '', 1560942222, 1560942302, 22, ''),
(100, 'teacher2', '5e7720e2b9a1beea5f2514498cb166a8', '程蒙依', 2, 33, '6612163@qq.com', '', '5cf7b299b5f62.jpg', 0, 0, 1559736985, '', 1559747661, 1559747670, 1, ''),
(101, 'teacher3', '5e7720e2b9a1beea5f2514498cb166a8', '吕宣娇', 2, 23, '4654165313@qq.com', '', '5cf7b2c69d519.jpg', 0, 0, 1559737030, '', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `edu_users_photoalbum`
--

CREATE TABLE `edu_users_photoalbum` (
  `id` int(10) NOT NULL COMMENT '相册id',
  `albumname` varchar(100) DEFAULT '默认相册' COMMENT '相册名',
  `uid` int(10) DEFAULT NULL COMMENT '用户id',
  `desc` varchar(200) DEFAULT NULL COMMENT '相册描述',
  `addtime` int(50) DEFAULT NULL COMMENT '创建时间',
  `state` tinyint(10) DEFAULT '1' COMMENT '是否公开',
  `cover` varchar(100) DEFAULT 'photo.jpg' COMMENT '封面'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_users_photoalbum`
--

INSERT INTO `edu_users_photoalbum` (`id`, `albumname`, `uid`, `desc`, `addtime`, `state`, `cover`) VALUES
(30, '11111', 59, '哈哈哈哈', NULL, 1, '530e14717c90a.jpg'),
(31, '2222', 59, '不可见', NULL, 2, '530e14d1341bb.jpg'),
(32, 'aaaaa', 64, '我的第一个相册', NULL, 1, '530e1c0503d5e.jpg'),
(33, '22222', 64, '阿斯顿发烧', NULL, 2, '530e1c2057d44.jpg'),
(34, '哇咔咔', 65, '111', NULL, 1, '530e1e4be9532.jpg'),
(35, 'ggg', 67, '阿斯顿飞', NULL, 1, '530e2031dce8a.jpg'),
(36, '二货的一天', 67, '撒旦法', NULL, 1, '530e204c4d86a.jpg'),
(37, '哈哈哈', 67, '山岩二', NULL, 2, '530e2059d75bf.jpg'),
(38, '嗯嗯', 69, '嗯嗯的相册', NULL, 1, '530e20fee40a7.jpg'),
(39, '我的相册', 68, '12345678', NULL, 1, '530e25c1b2314.jpg'),
(40, '小萍萍的', 62, '呵呵', NULL, 1, '530e29b1acc9f.jpg'),
(41, '1', 93, '111', NULL, 1, '530e2eba20232.gif'),
(42, '22', 93, '333', NULL, 1, '530e31ca86560.png'),
(43, '哈哈党', 63, '很不错哟', NULL, 1, '530e3394f3159.jpg'),
(44, 'superman', 95, '。。。哈哈', NULL, 1, '530ea1f75430d.jpg'),
(45, '那一天', 95, '那一天', NULL, 1, '530ea280cc30f.jpg'),
(46, '111sad', 64, 'dssf', NULL, 2, '530eb2541e73e.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `edu_uservisit`
--

CREATE TABLE `edu_uservisit` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '访问id',
  `uid` int(10) NOT NULL COMMENT '被访问者id',
  `vid` int(10) NOT NULL COMMENT '访问者id',
  `visitor` varchar(20) NOT NULL COMMENT '访问者',
  `number` int(10) NOT NULL DEFAULT '1' COMMENT '访问量',
  `visittime` int(40) NOT NULL COMMENT '访问时间',
  `uname` varchar(20) NOT NULL COMMENT '被访问者姓名',
  `upicname` varchar(20) NOT NULL COMMENT '被访问者头像',
  `vpicname` varchar(20) NOT NULL COMMENT '访问者头像'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_uservisit`
--

INSERT INTO `edu_uservisit` (`id`, `uid`, `vid`, `visitor`, `number`, `visittime`, `uname`, `upicname`, `vpicname`) VALUES
(37, 55, 65, 'zhy1', 1, 1393434217, 'admin', '530e9f9d3b45b.jpg', '530e8b8abdef3.jpg'),
(38, 61, 68, 'zhy2', 1, 1393436140, 'zhy', '530e33b3c714c.jpg', '530e2007de192.jpg'),
(39, 64, 72, 'dong3', 1, 1393436505, 'dong', '530eb22363ac2.jpg', '530e27396867f.jpg'),
(40, 64, 73, 'dong4', 2, 1393436642, 'dong', '530eb22363ac2.jpg', '530e27aa4f65a.jpg'),
(41, 67, 70, 'zhy3', 1, 1393436712, 'dong2', '530e1fc8a05c5.jpg', '530e2647a6b54.jpg'),
(42, 64, 74, 'dong5', 1, 1393436730, 'dong', '530eb22363ac2.jpg', '530e281420056.jpg'),
(43, 67, 76, 'dong6', 1, 1393437057, 'dong2', '530e1fc8a05c5.jpg', '530e29591a4da.jpg'),
(44, 64, 77, 'dong7', 1, 1393437357, 'dong', '530eb22363ac2.jpg', '530e2a9a1ea1c.jpg'),
(45, 61, 70, 'zhy3', 1, 1393437410, 'zhy', '530e33b3c714c.jpg', '530e2647a6b54.jpg'),
(46, 78, 70, 'zhy3', 1, 1393437428, 'dong8', '530e2b347d3bb.jpg', '530e2647a6b54.jpg'),
(47, 64, 78, 'dong8', 1, 1393437510, 'dong', '530eb22363ac2.jpg', '530e2b347d3bb.jpg'),
(48, 64, 86, 'dong16', 1, 1393437925, 'dong', '530eb22363ac2.jpg', '530e2cd4e2059.jpg'),
(49, 74, 93, '999999', 2, 1393438708, 'dong5', '530e281420056.jpg', '530e2e5173fae.JPG'),
(50, 84, 64, 'dong', 2, 1393438898, 'dong13', '530e2c7a2cd6f.jpg', '530eb22363ac2.jpg'),
(51, 92, 64, 'dong', 2, 1393438883, 'dong21', '530e2e24b1501.jpg', '530eb22363ac2.jpg'),
(52, 86, 64, 'dong', 3, 1393464158, 'dong16', '530e2cd4e2059.jpg', '530eb22363ac2.jpg'),
(53, 63, 0, '', 1, 1393438864, 'zxbshiwo', '530e1b9d1ec75.jpg', ''),
(54, 67, 64, 'dong', 9, 1393472125, 'dong2', '530e1fc8a05c5.jpg', '530eb22363ac2.jpg'),
(55, 73, 64, 'dong', 3, 1393834473, 'dong4', '530e27aa4f65a.jpg', '530eb22363ac2.jpg'),
(56, 78, 64, 'dong', 3, 1393472103, 'dong8', '530e2b347d3bb.jpg', '530eb22363ac2.jpg'),
(57, 68, 93, '999999', 1, 1393439269, 'zhy2', '530e2007de192.jpg', '530e2e5173fae.JPG'),
(58, 77, 64, 'dong', 2, 1393440157, 'dong7', '530e2a9a1ea1c.jpg', '530eb22363ac2.jpg'),
(59, 68, 63, 'zxbshiwo', 1, 1393460230, 'zhy2', '530e2007de192.jpg', '530e1b9d1ec75.jpg'),
(60, 74, 64, 'dong', 1, 1393460424, 'dong5', '530e281420056.jpg', '530eb22363ac2.jpg'),
(61, 93, 64, 'dong', 2, 1393467187, '999999', '530e2e5173fae.JPG', '530eb22363ac2.jpg'),
(62, 70, 67, 'dong2', 1, 1393464185, 'zhy3', '530e2647a6b54.jpg', '530e1fc8a05c5.jpg'),
(63, 76, 67, 'dong2', 1, 1393464194, 'dong6', '530e29591a4da.jpg', '530e1fc8a05c5.jpg'),
(64, 64, 67, 'dong2', 2, 1393464434, 'dong', '530eb22363ac2.jpg', '530e1fc8a05c5.jpg'),
(65, 64, 68, 'zhy2', 1, 1393465789, 'dong', '530eb22363ac2.jpg', '530e2007de192.jpg'),
(66, 55, 64, 'dong', 1, 1393467125, 'admin', '530e9f9d3b45b.jpg', '530eb22363ac2.jpg'),
(67, 69, 95, 'xiaohaohao', 1, 1393469676, 'woshizxb', '530e206fc09f9.jpg', '530ea17eae949.jpg'),
(68, 64, 95, 'xiaohaohao', 1, 1393469996, 'dong', '530eb22363ac2.jpg', '530ea17eae949.jpg'),
(69, 95, 68, 'zhy2', 2, 1393471393, 'xiaohaohao', '530ea17eae949.jpg', '530e2007de192.jpg'),
(70, 71, 63, 'zxbshiwo', 1, 1393592433, 'nicai', '530e26694c515.jpg', '530e1b9d1ec75.jpg'),
(71, 95, 98, 'Fred', 1, 1558541853, 'xiaohaohao', '530ea17eae949.jpg', '5d09d87ef41c1.jpg'),
(72, 67, 98, 'Fred', 1, 1558541860, 'dong2', '530e1fc8a05c5.jpg', '5d09d87ef41c1.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `edu_vhistory`
--

CREATE TABLE `edu_vhistory` (
  `uid` int(10) UNSIGNED DEFAULT '0' COMMENT '用户的id',
  `vid` int(10) UNSIGNED DEFAULT '0' COMMENT '观看课程的id',
  `addtime` int(11) DEFAULT '0' COMMENT '观看时间记录'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `edu_video`
--

CREATE TABLE `edu_video` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '视频编号',
  `tid` int(11) NOT NULL COMMENT '视频类型ID',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `videoname` varchar(32) NOT NULL COMMENT '上传视频名',
  `name` varchar(32) NOT NULL COMMENT '服务器上视频的随机名',
  `picname` varchar(32) NOT NULL COMMENT '上传视频的图片名',
  `descr` text NOT NULL COMMENT '上传视频的简单描述',
  `size` int(11) NOT NULL COMMENT '上传视频的大小',
  `type` varchar(60) NOT NULL COMMENT '上传视频的类型',
  `addtime` int(11) NOT NULL COMMENT '发布视频的时间',
  `favonum` int(11) NOT NULL COMMENT '视频被顶的次数',
  `clicknum` int(11) NOT NULL COMMENT '视频的浏览次数',
  `dwloadnum` int(11) NOT NULL COMMENT '视频的下载次数',
  `status` smallint(2) NOT NULL DEFAULT '1' COMMENT '上传视频的状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_video`
--

INSERT INTO `edu_video` (`id`, `tid`, `uid`, `videoname`, `name`, `picname`, `descr`, `size`, `type`, `addtime`, `favonum`, `clicknum`, `dwloadnum`, `status`) VALUES
(58, 17, 65, 'ThinkPHP从入门到精通', '530e89cda8051.flv', '530e89cda8051.jpg', '麻辣隔壁', 36293230, 'flv', 1393461713, 0, 6, 0, 2),
(55, 19, 75, 'JQuery效果演示', '530e29c6452ec.flv', '530e29c6452ec.jpg', '效果很不错的', 44186922, 'flv', 1393437131, 0, 6, 0, 2),
(56, 29, 75, 'C#基础知识讲解', '530e2a15ca2ff.flv', '530e2a15ca2ff.jpg', 'C#的视频都是很不错的', 56588128, 'flv', 1393437207, 0, 2, 0, 2),
(57, 29, 93, 'C#入门知识', '530e2f9985bdb.flv', '530e2f9985bdb.jpg', '这个应该知道吧？', 61860087, 'flv', 1393438618, 0, 6, 0, 2),
(54, 17, 70, '学习的乐趣只有参入进来才知道', '530e279980481.flv', '530e279980481.jpg', '就是那个！百步飞剑第四集', 41575163, 'flv', 1393436570, 0, 1, 0, 2),
(53, 13, 69, 'XHTML技术详解', '530e22cd9a81f.flv', '530e22cd9a81f.jpg', '技术详解的高清无码视频', 59487154, 'flv', 1393435342, 1, 24, 0, 2),
(52, 23, 69, '程序员的世界菇酿你不懂的', '530e22378e6cf.flv', '530e22378e6cf.jpg', '一个公寓里的幸福爱情故事', 83129019, 'flv', 1393435192, 4, 10, 0, 2),
(51, 7, 69, 'SQLServer技术分享', '530e21b9cc934.flv', '530e21b9cc934.jpg', '技术分享视频', 38419684, 'flv', 1393435070, 1, 2, 0, 2),
(50, 6, 67, '数据库', '530e20f65a98b.flv', '530e20f65a98b.jpg', 'sql', 56139637, 'flv', 1393434871, 1, 21, 0, 2),
(45, 14, 64, 'css1', '530e1caf6c6b3.flv', '530e1caf6c6b3.jpg', 'sadf', 44186922, 'flv', 1393433780, 3, 4, 0, 2),
(44, 24, 63, 'Java基础视频教学', '530e1cb3d8e5b.flv', '530e1cb3d8e5b.jpg', 'Java的最新视频...', 56588128, 'flv', 1393433780, 6, 22, 0, 2),
(43, 13, 61, '秦时明月2', '530e1c9760702.flv', '530e1c9760702.jpg', '百步再飞那个剑！', 41562890, 'flv', 1393433752, 1, 1, 0, 2),
(42, 17, 61, '秦时明月1', '530e1c7552640.flv', '530e1c7552640.jpg', '百步那个飞、、、建！！！', 40956784, 'flv', 1393433719, 4, 51, 0, 2),
(41, 12, 63, 'HTML基础教学', '530e1c84b08f1.flv', '530e1c84b08f1.jpg', 'HTML基础知识讲解...', 44186922, 'flv', 1393433735, 2, 3, 0, 2),
(40, 9, 63, 'PHP基础教学视频001', '530e1c567e7b6.flv', '530e1c567e7b6.jpg', 'PHP基础教学视频，要好好学，。', 38419684, 'flv', 1393433688, 2, 4, 0, 2),
(49, 3, 67, 'javascript', '530e20d3a9431.flv', '530e20d3a9431.jpg', 'javascript', 56588128, 'flv', 1393434837, 0, 0, 0, 2),
(48, 11, 68, '秦时明月3', '530e207da5de2.flv', '530e207da5de2.jpg', '百步飞剑哦', 41341240, 'flv', 1393434750, 0, 1, 0, 2),
(47, 6, 63, 'MySQL数据库分析', '530e1d4b7b5ce.flv', '530e1d4b7b5ce.jpg', 'MySQL数据库分析技术的分享', 59487154, 'flv', 1393433932, 4, 77, 0, 2),
(46, 12, 64, 'html', '530e1cf052f4d.flv', '530e1cf052f4d.jpg', 'wodehtml', 56139637, 'flv', 1393433841, 1, 1, 0, 2),
(59, 13, 65, 'XHTML最新教学视频', '530e8f53057b1.flv', '530e8f53057b1.jpg', '撸啊撸啊德玛西亚', 12898974, 'flv', 1393463123, 1, 2, 0, 2),
(61, 26, 65, 'JAVA工程师教学视频', '530e9058b2ce7.flv', '530e9058b2ce7.jpg', '百步飞建建、、、', 41341240, 'flv', 1393463387, 0, 2, 0, 2),
(63, 11, 63, 'PHP入门教学', '530eb01b4ccaf.flv', '530eb01b4ccaf.jpg', 'sadsds', 42748475, 'flv', 1393471518, 0, 7, 0, 2);

-- --------------------------------------------------------

--
-- 表的结构 `edu_work`
--

CREATE TABLE `edu_work` (
  `id` int(10) NOT NULL,
  `uid` int(10) NOT NULL COMMENT '创建者ID',
  `uname` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '创建者名',
  `title` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '作业内容',
  `class_id` int(10) NOT NULL COMMENT '所属班级',
  `class_name` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `edu_work`
--

INSERT INTO `edu_work` (`id`, `uid`, `uname`, `title`, `class_id`, `class_name`) VALUES
(1, 99, '彭老师', '实验报告五--课后练习题1.2.3.4.5', 5, '软件项目管理'),
(2, 99, '彭老师', '请设计一个在线学习网站', 5, '软件项目管理'),
(3, 100, '程蒙依', '使用java swing制作一个点播台应用', 3, 'Java程序设计');

-- --------------------------------------------------------

--
-- 表的结构 `edu_zan`
--

CREATE TABLE `edu_zan` (
  `uid` int(10) UNSIGNED DEFAULT '0' COMMENT '用户的id',
  `vid` int(10) UNSIGNED DEFAULT '0' COMMENT '视频的id',
  `lid` int(10) UNSIGNED DEFAULT '0' COMMENT '文库资源的id',
  `nid` int(10) UNSIGNED DEFAULT '0' COMMENT '视频手记的id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_zan`
--

INSERT INTO `edu_zan` (`uid`, `vid`, `lid`, `nid`) VALUES
(70, 0, 33, 0),
(70, 0, 45, 0),
(76, 45, 0, 0),
(70, 0, 43, 0),
(70, 42, 0, 0),
(70, 52, 0, 0),
(75, 44, 0, 0),
(69, 0, 36, 0),
(69, 0, 43, 0),
(71, 44, 0, 0),
(69, 0, 0, 28),
(64, 44, 0, 0),
(69, 0, 35, 0),
(69, 0, 38, 0),
(66, 0, 35, 0),
(66, 0, 36, 0),
(66, 0, 37, 0),
(66, 0, 38, 0),
(69, 0, 0, 23),
(69, 0, 0, 27),
(67, 0, 0, 23),
(67, 0, 0, 25),
(69, 52, 0, 0),
(66, 0, 0, 26),
(66, 40, 0, 0),
(66, 46, 0, 0),
(66, 45, 0, 0),
(66, 41, 0, 0),
(67, 44, 0, 0),
(66, 42, 0, 0),
(67, 47, 0, 0),
(66, 43, 0, 0),
(69, 44, 0, 0),
(69, 41, 0, 0),
(69, 45, 0, 0),
(66, 47, 0, 0),
(62, 47, 0, 0),
(76, 40, 0, 0),
(75, 51, 0, 0),
(75, 52, 0, 0),
(75, 0, 0, 35),
(70, 0, 41, 0),
(75, 0, 36, 0),
(93, 42, 0, 0),
(93, 0, 37, 0),
(93, 0, 33, 0),
(64, 0, 0, 36),
(64, 0, 0, 35),
(64, 0, 36, 0),
(64, 0, 38, 0),
(63, 42, 0, 0),
(63, 0, 0, 37),
(63, 0, 48, 0),
(63, 0, 33, 0),
(63, 0, 44, 0),
(63, 0, 0, 23),
(63, 50, 0, 0),
(63, 0, 0, 38),
(63, 0, 0, 39),
(63, 0, 0, 40),
(61, 0, 36, 0),
(61, 44, 0, 0),
(61, 0, 0, 38),
(63, 0, 43, 0),
(68, 53, 0, 0),
(63, 0, 49, 0),
(68, 0, 0, 39),
(63, 47, 0, 0),
(65, 59, 0, 0),
(63, 0, 0, 41),
(95, 52, 0, 0),
(63, 0, 36, 0),
(98, 0, 43, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bbs_comm`
--
ALTER TABLE `bbs_comm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bbs_message`
--
ALTER TABLE `bbs_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bbs_question`
--
ALTER TABLE `bbs_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bbs_tgroup`
--
ALTER TABLE `bbs_tgroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_cat`
--
ALTER TABLE `edu_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_classes`
--
ALTER TABLE `edu_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_clicknum`
--
ALTER TABLE `edu_clicknum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_comment`
--
ALTER TABLE `edu_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_fin`
--
ALTER TABLE `edu_fin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_flink`
--
ALTER TABLE `edu_flink`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_homework`
--
ALTER TABLE `edu_homework`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_jiafen`
--
ALTER TABLE `edu_jiafen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_library`
--
ALTER TABLE `edu_library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_limit`
--
ALTER TABLE `edu_limit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`limitname`);

--
-- Indexes for table `edu_node`
--
ALTER TABLE `edu_node`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `edu_notice`
--
ALTER TABLE `edu_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_picture`
--
ALTER TABLE `edu_picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_quest`
--
ALTER TABLE `edu_quest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_roles`
--
ALTER TABLE `edu_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_score`
--
ALTER TABLE `edu_score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_stu`
--
ALTER TABLE `edu_stu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_test`
--
ALTER TABLE `edu_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_usermessage`
--
ALTER TABLE `edu_usermessage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_userphotos`
--
ALTER TABLE `edu_userphotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_users`
--
ALTER TABLE `edu_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`username`),
  ADD UNIQUE KEY `NewIndex1` (`email`);

--
-- Indexes for table `edu_users_photoalbum`
--
ALTER TABLE `edu_users_photoalbum`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NewIndex1` (`albumname`);

--
-- Indexes for table `edu_uservisit`
--
ALTER TABLE `edu_uservisit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_video`
--
ALTER TABLE `edu_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edu_work`
--
ALTER TABLE `edu_work`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `bbs_comm`
--
ALTER TABLE `bbs_comm`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '帖子评论id', AUTO_INCREMENT=891;
--
-- 使用表AUTO_INCREMENT `bbs_message`
--
ALTER TABLE `bbs_message`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '帖子id号', AUTO_INCREMENT=39;
--
-- 使用表AUTO_INCREMENT `bbs_question`
--
ALTER TABLE `bbs_question`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '问题id号', AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `bbs_tgroup`
--
ALTER TABLE `bbs_tgroup`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '讨论组id';
--
-- 使用表AUTO_INCREMENT `edu_cat`
--
ALTER TABLE `edu_cat`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- 使用表AUTO_INCREMENT `edu_classes`
--
ALTER TABLE `edu_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `edu_clicknum`
--
ALTER TABLE `edu_clicknum`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增id号', AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `edu_comment`
--
ALTER TABLE `edu_comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '文档评论编号', AUTO_INCREMENT=36;
--
-- 使用表AUTO_INCREMENT `edu_fin`
--
ALTER TABLE `edu_fin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `edu_flink`
--
ALTER TABLE `edu_flink`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '链接编号', AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `edu_homework`
--
ALTER TABLE `edu_homework`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `edu_jiafen`
--
ALTER TABLE `edu_jiafen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `edu_library`
--
ALTER TABLE `edu_library`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '文档编号', AUTO_INCREMENT=60;
--
-- 使用表AUTO_INCREMENT `edu_limit`
--
ALTER TABLE `edu_limit`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '权限ID';
--
-- 使用表AUTO_INCREMENT `edu_node`
--
ALTER TABLE `edu_node`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '节点id', AUTO_INCREMENT=52;
--
-- 使用表AUTO_INCREMENT `edu_notice`
--
ALTER TABLE `edu_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '公告编号', AUTO_INCREMENT=40;
--
-- 使用表AUTO_INCREMENT `edu_picture`
--
ALTER TABLE `edu_picture`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id号', AUTO_INCREMENT=160;
--
-- 使用表AUTO_INCREMENT `edu_quest`
--
ALTER TABLE `edu_quest`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- 使用表AUTO_INCREMENT `edu_roles`
--
ALTER TABLE `edu_roles`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '角色Id', AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `edu_score`
--
ALTER TABLE `edu_score`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- 使用表AUTO_INCREMENT `edu_stu`
--
ALTER TABLE `edu_stu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- 使用表AUTO_INCREMENT `edu_test`
--
ALTER TABLE `edu_test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- 使用表AUTO_INCREMENT `edu_usermessage`
--
ALTER TABLE `edu_usermessage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '留言ID', AUTO_INCREMENT=91;
--
-- 使用表AUTO_INCREMENT `edu_userphotos`
--
ALTER TABLE `edu_userphotos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '照片编号', AUTO_INCREMENT=410;
--
-- 使用表AUTO_INCREMENT `edu_users`
--
ALTER TABLE `edu_users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT COMMENT '用户Id', AUTO_INCREMENT=102;
--
-- 使用表AUTO_INCREMENT `edu_users_photoalbum`
--
ALTER TABLE `edu_users_photoalbum`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '相册id', AUTO_INCREMENT=47;
--
-- 使用表AUTO_INCREMENT `edu_uservisit`
--
ALTER TABLE `edu_uservisit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '访问id', AUTO_INCREMENT=73;
--
-- 使用表AUTO_INCREMENT `edu_video`
--
ALTER TABLE `edu_video`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '视频编号', AUTO_INCREMENT=64;
--
-- 使用表AUTO_INCREMENT `edu_work`
--
ALTER TABLE `edu_work`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
