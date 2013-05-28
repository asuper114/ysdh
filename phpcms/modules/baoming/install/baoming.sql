DROP TABLE IF EXISTS `ysdh_baoming`;
CREATE TABLE IF NOT EXISTS `ysdh_baoming` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sex` enum('1','2') NOT NULL,
  `age` int(3) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `identity_card` varchar(18) NOT NULL,
  `birthday` varchar(10) NOT NULL,
  `native_place` varchar(30) NOT NULL,
  `diploma` varchar(30) NOT NULL COMMENT '学历',
  `major` varchar(20) NOT NULL COMMENT '专业',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;