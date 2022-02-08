/*DROP TABLE IF EXISTS t_in;*/

CREATE TABLE `t_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usr` int(11) NOT NULL,
  `sum` decimal(10,2) NOT NULL,
  `ty` int(2) NOT NULL COMMENT '0-пополнение,1-реф',
  `ba` varchar(20) NOT NULL COMMENT 'Транзакция',
  batch_pm varchar(255) DEFAULT NULL COMMENT '№ Транзакции Perfect Money',
  `st` int(2) NOT NULL COMMENT 'Оплачен / Не оплачен',
  `dt` int(11) NOT NULL ,
  PRIMARY KEY (`id`),
  KEY(ba)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


/*DROP TABLE IF EXISTS `t_out`;*/

CREATE TABLE `t_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usr` int(11) NOT NULL,
  `sum` decimal(10,2) NOT NULL,
  `ps` int(2) NOT NULL COMMENT 'Платёжная система',
  `dt` int(11) NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


/*DROP TABLE IF EXISTS `t_users`;*/
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `log` varchar(100) NOT NULL,
  `pas` varchar(50) NOT NULL,
  `ref` int(11) NOT NULL COMMENT '№ пригласившего реферала',
  `bal` decimal(10,2) NOT NULL DEFAULT 0.00 COMMENT 'Баланс',
  `level` int(3) DEFAULT 0 COMMENT 'Ваш текущий уровень',
  `dt` int(11) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `lastip` varchar(200) NOT NULL,
  `last` int(11) NOT NULL,
  `em` varchar(100) DEFAULT NULL COMMENT 'Почта эл.',
  `profit` decimal(10,2) NOT NULL NULL DEFAULT 0.00 COMMENT 'За весь период работы Ваш заработок составляет',
  `av` varchar(200) DEFAULT NULL,
  `hits` int(11) DEFAULT 0 COMMENT 'Переходов по ссылке (Визитов)',
  `multi` int(11) NOT NULL DEFAULT '0' COMMENT 'Мультиакаунт',
  `prf_name` varchar(100) DEFAULT NULL COMMENT 'Имя',
  `prf_fam` varchar(100) DEFAULT NULL COMMENT 'Фамилия',

  `sex` int(3) DEFAULT NULL COMMENT 'Пол 0,1,2 NULL',
  `birthday` date DEFAULT NULL COMMENT 'День рождения',


  `pay_payeer` varchar(20) DEFAULT NULL,
  `pay_pm` varchar(100) DEFAULT NULL,
  `cont_vk` varchar(100) DEFAULT NULL,
  `cont_ok` varchar(100) DEFAULT NULL,
  `cont_fb` varchar(100) DEFAULT NULL,
  `cont_wa` varchar(50) DEFAULT NULL,
  `cont_vi` varchar(50) DEFAULT NULL,
  `cont_sk` varchar(100) DEFAULT NULL,
  `cont_te` varchar(100) DEFAULT NULL,
  `cont_icq` varchar(50) DEFAULT NULL,
  `cont_sms` varchar(50) DEFAULT NULL,
  `ban` varchar(200) DEFAULT NULL,
  `step` int(2) DEFAULT 0 COMMENT 'Помощник (шаги обучалки)',
  PRIMARY KEY(`uid`),
  KEY (log,ref)
)ENGINE=MyISAM AUTO_INCREMENT=300 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


CREATE TABLE IF NOT EXISTS support(
  id int(11) NOT NULL AUTO_INCREMENT,
  id_user int(11) NOT NULL,
  log varchar(100) NOT NULL,
  em varchar(100) DEFAULT NULL COMMENT 'Почта эл.',
  readed tinyint(1) DEFAULT NULL,
  theme varchar(130) NOT NULL,
  text text NOT NULL,
  ip varchar(50) NOT NULL,
  data int(11) NOT NULL,
  PRIMARY KEY (id),
  KEY id_user(id_user)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS em_upd(
  id int(11) NOT NULL AUTO_INCREMENT,
  id_user int(11) NOT NULL,
  em_old varchar(100) DEFAULT NULL COMMENT 'Почта эл. старая',
  em_new varchar(100) DEFAULT NULL COMMENT 'Почта эл. новая',
  ip varchar(50) NOT NULL,
  data int(11) NOT NULL,
  readed tinyint(1) DEFAULT NULL,
  hash varchar(255) NOT NULL,
  PRIMARY KEY (id),
  KEY hash(hash)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


SELECT t_in.id,t_in.usr,t_in.sum as sum_in,t_out.usr,t_out.sum as sum_out FROM `t_in`
LEFT JOIN `t_out`
ON t_in.usr=t_out.usr;

SELECT t_in.usr,(SUM(t_in.sum)) as sum_in,
		(SUM(t_out.sum)) as sum_out
        FROM `t_in`
LEFT JOIN `t_out`
ON t_in.usr=t_out.usr
GROUP BY t_in.usr;

CREATE VIEW sp AS SELECT t_in.usr as p,(SUM(t_in.sum)) as sp FROM `t_in` WHERE ty=1 GROUP BY t_in.usr;
CREATE VIEW sm AS SELECT t_out.usr as p,(SUM(t_out.sum)) as sm FROM `t_out` GROUP BY t_out.usr;

SELECT * FROM sum_in LEFT JOIN `sum_out` ON sum_in.usr=sum_out.usr;
SELECT * FROM t_users LEFT JOIN sum_out ON t_users.uid = sum_out.usr;

SELECT t_users.*,sum_out.sum_out
FROM t_users
LEFT JOIN sum_out
ON t_users.uid = sum_out.usr;


SELECT t_users.*,sp.sp,sm.sm FROM t_users LEFT JOIN sp ON t_users.uid = sp.p LEFT JOIN sm ON t_users.uid = sm.p;