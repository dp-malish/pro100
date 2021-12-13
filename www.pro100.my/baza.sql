
DROP TABLE IF EXISTS `t_ch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_ch` (
  `id` int(11) NOT NULL,
  `usr` int(11) NOT NULL,
  `msg` varchar(10000) NOT NULL,
  `dt` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=cp1251 COMMENT='Чат, сообщения';

LOCK TABLES `t_ch` WRITE;
/*!40000 ALTER TABLE `t_ch` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_ch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_data`
--

DROP TABLE IF EXISTS `t_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_data` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `fond` decimal(10,2) NOT NULL,
  `feikusers` decimal(10,2) NOT NULL,
  `feikmoney` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_data`
--

LOCK TABLES `t_data` WRITE;
/*!40000 ALTER TABLE `t_data` DISABLE KEYS */;
INSERT INTO `t_data` VALUES (1,0.00,0.00,'0');
/*!40000 ALTER TABLE `t_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_in`
--

DROP TABLE IF EXISTS `t_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_in` (
  `id` int(11) NOT NULL,
  `usr` int(11) NOT NULL,
  `sum` decimal(10,2) NOT NULL,
  `ty` int(2) NOT NULL COMMENT '0-пополнение,1-реф',
  `ba` varchar(20) NOT NULL COMMENT 'Транзакция',
  `batch_pm` varchar(255) DEFAULT NULL COMMENT '№ Транзакции Perfect Money',
  `st` int(2) DEFAULT NULL COMMENT 'Статус платежа',
  `dt` int(11) NOT NULL
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_in`
--

LOCK TABLES `t_in` WRITE;
/*!40000 ALTER TABLE `t_in` DISABLE KEYS */;
INSERT INTO `t_in` VALUES (1,1,1.00,0,'1_156767354393',0,1567673543),(2,12,1.00,0,'12_156774275079',0,1567742750),(3,3,1.00,0,'3_156776037225',0,1567760372),(4,2,1.00,0,'2_156782419540',0,1567824195),(5,1,100.00,0,'1_156793233384',0,1567932333),(6,1,100.00,1,'',1,1628337099),(7,1,200.00,1,'',1,1628337128),(8,1,100.00,1,'',1,1628337862),(9,1,200.00,1,'',1,1628337994),(10,0,100.00,1,'',1,1628338091),(11,0,100.00,1,'',1,1628338247),(12,0,200.00,1,'',1,1628338317),(13,0,80.00,1,'',1,1628338400);
/*!40000 ALTER TABLE `t_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_login`
--

DROP TABLE IF EXISTS `t_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `c` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_login`
--

LOCK TABLES `t_login` WRITE;
/*!40000 ALTER TABLE `t_login` DISABLE KEYS */;
INSERT INTO `t_login` VALUES (1,'114.5.210.111',8),(3,'2001:ee0:5619:1',1),(4,'94.156.120.70',1),(5,'91.250.29.230',3);
/*!40000 ALTER TABLE `t_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_messages`
--

DROP TABLE IF EXISTS `t_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fr` int(11) NOT NULL COMMENT 'От кого',
  `tou` int(11) NOT NULL COMMENT 'Кому',
  `msg` text NOT NULL COMMENT 'Текст сообщения',
  `dt` int(11) NOT NULL,
  `st` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_messages`
--

LOCK TABLES `t_messages` WRITE;
/*!40000 ALTER TABLE `t_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_news`
--

DROP TABLE IF EXISTS `t_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ti` varchar(500) NOT NULL,
  `msg` varchar(20000) NOT NULL,
  `dt` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_news`
--

LOCK TABLES `t_news` WRITE;
/*!40000 ALTER TABLE `t_news` DISABLE KEYS */;
INSERT INTO `t_news` VALUES (3,'Добро пожаловать в CashLike!','Дорогие друзья! \r\n\r\n16 сениября 2019 года начнет свою работу проект Cash-Like. Принцип работы системы довольно прост и позволяет её участникам зарабатывать приличные деньги в максимально короткие сроки не вставая с дивана. Как работает проект, Вы можете посмотреть в разделе Маркетинг. \r\n\r\nЖелаем всем большой команды и удачной работы!',1567728000),(5,'Карта рефералов','Дорогие друзья! До активации уровней, которые откроются после старта проекта, вы можете посмотреть ваше реферальное дерево в разделе \"Рефералы - карта рефералов\" ',1567770851);
/*!40000 ALTER TABLE `t_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_online`
--

DROP TABLE IF EXISTS `t_online`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_online` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `last` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1579 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_online`
--

LOCK TABLES `t_online` WRITE;
/*!40000 ALTER TABLE `t_online` DISABLE KEYS */;
INSERT INTO `t_online` VALUES (1578,4955,'9125029230',1628340039),(1574,55,'9415612070',1628340341);
/*!40000 ALTER TABLE `t_online` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_out`
--

DROP TABLE IF EXISTS `t_out`;

CREATE TABLE `t_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usr` int(11) NOT NULL,
  `sum` decimal(10,2) NOT NULL,
  `ps` int(2) NOT NULL COMMENT 'Платёжная система',
  `dt` int(11) NOT NULL,
  `ba` varchar(255) DEFAULT NULL COMMENT 'Транзакция',
  `st` int(2) DEFAULT NULL COMMENT 'Статус платежа, если требует ПС',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT 'Исходящие транзакции';

INSERT INTO `t_out` (`id`, `usr`, `sum`, `ps`, `dt`) VALUES
(1, 300, '100.00', 1, 1631952780),
(2, 300, '150.00', 0, 1629752950);




LOCK TABLES `t_out` WRITE;
/*!40000 ALTER TABLE `t_out` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_out` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_rev`
--

DROP TABLE IF EXISTS `t_rev`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_rev` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usr` int(11) NOT NULL,
  `msg` varchar(20000) NOT NULL,
  `dt` int(11) NOT NULL,
  `st` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_rev`
--

LOCK TABLES `t_rev` WRITE;
/*!40000 ALTER TABLE `t_rev` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_rev` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_ticket_msg`
--

DROP TABLE IF EXISTS `t_ticket_msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_ticket_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `msg` varchar(20000) NOT NULL,
  `frm` int(1) NOT NULL DEFAULT '0' COMMENT '0 - user, 1- admin',
  `dt` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_ticket_msg`
--

LOCK TABLES `t_ticket_msg` WRITE;
/*!40000 ALTER TABLE `t_ticket_msg` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_ticket_msg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_ticket_name`
--

DROP TABLE IF EXISTS `t_ticket_name`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_ticket_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usr` int(11) NOT NULL,
  `theme` varchar(10000) NOT NULL,
  `dt` int(11) NOT NULL,
  `stu` int(1) NOT NULL DEFAULT '0',
  `sta` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_ticket_name`
--

LOCK TABLES `t_ticket_name` WRITE;
/*!40000 ALTER TABLE `t_ticket_name` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_ticket_name` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_users`
--

DROP TABLE IF EXISTS `t_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `log` varchar(100) DEFAULT NULL,
  `pas` varchar(50) NOT NULL,
  `ref` int(10) NOT NULL,
  `bal` decimal(10,2) NOT NULL,
  `level` int(3) NOT NULL,
  `dt` int(11) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `lastip` varchar(200) NOT NULL,
  `last` int(11) NOT NULL,
  `em` varchar(100) NOT NULL,
  `profit` decimal(10,2) NOT NULL,
  `av` varchar(200) NOT NULL,
  `hits` int(11) NOT NULL COMMENT 'Переходов по ссылке',
  `multi` int(11) NOT NULL,
  `prf_name` varchar(100) NOT NULL,
  `prf_fam` varchar(100) NOT NULL,
  `pay_payeer` varchar(20) NOT NULL,
  `pay_pm` varchar(100) NOT NULL,
  `cont_vk` varchar(100) NOT NULL,
  `cont_ok` varchar(100) NOT NULL,
  `cont_fb` varchar(100) NOT NULL,
  `cont_wa` varchar(50) NOT NULL,
  `cont_vi` varchar(50) NOT NULL,
  `cont_sk` varchar(100) NOT NULL,
  `cont_te` varchar(100) NOT NULL,
  `cont_icq` varchar(50) NOT NULL,
  `cont_sms` varchar(50) NOT NULL,
  `ban` varchar(200) NOT NULL,
  `step` int(2) NOT NULL COMMENT 'Помощник',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=4956 DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_users`
--

LOCK TABLES `t_users` WRITE;
/*!40000 ALTER TABLE `t_users` DISABLE KEYS */;
INSERT INTO `t_users` VALUES (4955,'admin','c3284d0f94606de1fd2af172aba15bf3',1,0.00,5,1567673504,'2.63.91.29','91.250.29.230',1628340039,'admin@like.site',0.00,'',2,0,'','','P3662749','','','','','','','','','','','',6),(2,'FinFreedom','c439246c70654d38046b97bcadb537c6',1,4.00,0,1567674813,'2.63.91.29','2.63.91.29',1567933323,'admin@financial-freedom.pro',0.00,'',1159,1,'','','P3662749','','','','','','','','','','','',6),(3,'Evgen76','df6e29a38e6f0b42b1bb568990167704',2,4.00,0,1567674905,'2.63.91.29','2.63.91.29',1567769497,'zelejoy@ya.ru',0.00,'',2,1,'','','P3662749','','','','','','','','','','','',2),(4,'tupperinfo','9f99e96c6b366a35d6fd4d3b6a69c356',3,4.00,0,1567675609,'2.63.91.29','2.63.91.29',1567677486,'RobinBobin@swe.ru',0.00,'',737,1,'','','P3662749','','','','','','','','','','','',6),(5,'Jeka76','75a6f9604fa21b527d6db765ffc50dd4',4,4.00,0,1567677592,'2.63.91.29','2.63.91.29',1567677704,'zelejoy76@ya.ru',0.00,'',0,1,'','','P3662749','','','','','','','','','','','',6),(6,'Aamir900','4aeb0fe57d7fe4ac10ee17cf2c40236c',4,0.00,0,1567683506,'182.187.139.150','182.187.139.150',1567686461,'ah1041852@gmail.com',0.00,'',0,0,'Abdul','hafeez','P1014810274','','','','','','','','','','','',1),(7,'yechka','58d43f0cccade4a1e884f3624ca6d854',4,0.00,0,1567684961,'188.162.132.153','188.162.132.153',1567685049,'yechkaa@yandex.ru',0.00,'',0,0,'','','','','','','','','','','','','','',2),(8,'Peot','f8c9531bef47a126ea58c4a4b0b069d6',4,0.00,0,1567696225,'114.5.210.111','114.5.210.111',1567696388,'entinkartiniyulianti@gmail.com',0.00,'',0,0,'Ydi','Nurhaedi','','','','','','','','','','','','',1),(9,'robik','f837cb2268ea93b5087e2464870f26e1',5,0.00,0,1567711412,'31.133.72.57','31.133.72.57',1567711649,'rodjab@yandex.ru',0.00,'',0,0,'василий','иванин','P61956214','','','','','','','','','','','',6),(10,'2904428','87313a02e05e0a99e59ad46faf9722c9',5,0.00,0,1567727854,'185.57.30.85','185.57.30.85',1567728002,'2904428@mail.ru',0.00,'',0,0,'','','','','','','','','','','','','','',0),(11,'Gualex22','03c64b48f1aa3670c3a1ccc36aa07415',5,0.00,0,1567741946,'171.96.218.78','171.96.218.78',1567741988,'originalman22@gmail.com',0.00,'',0,0,'','','','','','','','','','','','','','',0),(12,'clazinho1997','574748af4e6d8d449efe09503704bd90',5,0.00,0,1567742513,'179.108.59.60','179.108.59.60',1567743090,'clazinhosilva@yahoo.com',0.00,'',0,0,'Clailton','Gabriel da silva','P98223656','','','','','+55988233658','','','','','','',6),(13,'Mikola57','f75fd9df9fface919bf33af9289ffa6f',6,0.00,0,1567756024,'37.212.83.89','37.212.83.89',1567756631,'Kkolyan962@gmail.com',0.00,'',0,0,'','','','','','','','','','','','','','',6),(14,'volk192','c2f1366c51911b52369fe27df307ff84',6,0.00,0,1567758864,'188.163.106.138','188.163.106.138',1567759415,'volk192@ukr.net',0.00,'',0,0,'Борис','Гукович','','','','','','','','','','','','',1),(15,'storm','7dead095cc5c19df9640ce359ef16ef4',6,0.00,0,1567761058,'94.74.92.68','94.74.92.68',1567847550,'super_susanin@ukr.net',0.00,'',0,0,'Валерий','','P19194253','','','','','','','','','','','',6),(16,'Cmok','669411d5af0776433913196284a8f9ea',6,0.00,0,1567775592,'37.212.8.138','37.212.8.138',1567775606,'vagus124rf@gmail.com',0.00,'',0,0,'','','','','','','','','','','','','','',2),(17,'jekdenils2','ffe9be1d2e8ede7b13c7fdc5057cd644',7,0.00,0,1567780107,'91.200.57.33','91.200.57.33',1567780201,'andrejlucenko314@gmail.com',0.00,'',0,0,'','','','','','','','','','','','','','',6),(18,'lhcen','279e517fa14221d00cdc08e0208da980',7,0.00,0,1567782089,'160.161.243.217','160.161.243.217',1567782165,'blhanafi084@gmail.com',0.00,'',0,0,'','','','','','','','','','','','','','',2),(19,'xaltyr','300bba2929b31dd925043a5538f54848',2,0.00,0,1567790780,'5.59.35.223','5.59.35.223',1567791301,'pavel.arsionov@yandex.ru',0.00,'',0,0,'Павел','Арсенов','P13114216','','https://vk.com/parsenov','https://www.ok.ru/profile/557746273472','https://www.facebook.com/profile.php?id=100003848062806','','','','','','+79208854086','',5),(20,'dochtor','4690e66634dee42480eb2f05acaace79',2,0.00,0,1567790942,'213.153.211.58','213.153.211.58',1567791410,'23k1b1t66t1@gmail.com',0.00,'',0,0,'zeki','karaoguz','p1006442586','','','','https://www.facebook.com/zeki.karaoguz','','','','','','','',6),(21,'anto123','4efb4f58533626f7b7c9fe1b5767274b',2,0.00,0,1567806114,'93.56.174.5','93.56.174.5',1567894212,'antoniodb1969@hotmail.com',0.00,'',0,0,'Antonio Giuseppe','Di Bella','P1015913061','','','','','','','','','','','',0),(22,'aiko9','5eb8f1a5cc280b728051568a3cf671d7',7,0.00,0,1567809490,'149.27.2.2','149.27.2.2',1567922028,'aigul.kukebaeva@mail.ru',0.00,'',0,0,'Айгул','Кукебаева','','','','','','','','','','','','',6),(23,'vladimir095','d14e1934155ef9015462c2d30647d14d',3,0.00,0,1567821708,'91.76.6.172','91.76.6.172',1567821716,'vladimir_095@rambler.ru',0.00,'',0,0,'','','','','','','','','','','','','','',1),(24,'Mikirin','0966ddb98a13055cda4b8bb090234e02',7,0.00,0,1567826797,'188.18.16.164','188.18.16.164',1567827662,'msdisappeared@gmail.com',0.00,'',0,0,'Женя','Кузнецова','P90709027','','','','','','','','https://www.web-telegram.ru/#/im','','','',1),(25,'pheaktra','75027cbaa709b6e166a1dfebfc95c960',3,0.00,0,1567829741,'202.53.146.17','202.53.146.17',1567829773,'pheakloy5555@gmail.com',0.00,'',0,0,'','','','','','','','','','','','','','',0),(26,'cfif100207','eeb9dbd942f77efa007e6c38ebc6363e',3,0.00,0,1567833915,'46.148.219.167','46.148.219.167',1567834162,'strannik159753@gmail.com',0.00,'',0,0,'Евгений','Мусияк','1014432050','','','','','','','','','','79676190010','',6),(27,'Amid2012','1d95f66d538c26cfea446795563a1c55',19,0.00,0,1567834511,'94.25.175.192','94.25.175.192',1567943897,'Dmitrii_Ageev2014@mail.ru',0.00,'',0,0,'','','P96560956','','','','','','','','','','','',0),(28,'Shaxr','236ba568db0c53ad88e9cdcefe81f7d3',19,0.00,0,1567839031,'90.143.33.196','90.143.33.196',1567839463,'shaxrshaxrov@gmail.com',0.00,'',0,0,'Shaka','Shakev','P1015227556','','https://vk.com/id553697685','','','','','','','','','',6),(29,'TopMon','8b6c0751d962fba753df94cdc21d6c46',19,0.00,0,1567839404,'37.23.95.71','37.23.95.71',1567839583,'andreykretov84@gmail.com',0.00,'',0,0,'АНДРЕЙ','Кретов','P1006036866','','','','','','','','','','+79635032865','',5),(30,'Praai','c4c76164f4e16612a763aab0817c0294',19,0.00,0,1567841919,'27.55.129.113','27.55.129.113',1567842475,'221242p@gmail.com',0.00,'',0,0,'Parichat','Suwannapech','P1015759562','','','','https://www.facebook.com/profile.php?id=100017929203583','','','','','','','',1),(31,'ruzsarm','7cac81e454fdd7f6da639e5b110a67a7',20,0.00,0,1567844808,'185.31.32.81','185.31.32.81',1567844961,'ruzsarm@gmail.com',0.00,'',0,0,'','','','','','','','','','','','','','',6),(32,'Sasha11754','04af7a9d8094fd60248d525cce5c077f',20,0.00,0,1567859549,'91.205.239.7','91.205.239.7',1567859890,'sasha.sosnov@lenta.ru',0.00,'',0,0,'Александр','Соснов','','','','','','','','','','','89090689104','',6),(33,'phivu2009','9948615b82eb11931ce59e46ce4ae42a',20,0.00,0,1567860629,'2405:4800:45cf:92c9:e41c:cf2c:857b:67f','2405:4800:45cf:92c9:e41c:cf2c:857b:67f',1567860744,'phivukute2009@gmail.com',0.00,'',0,0,'hong vuong','nguyen','P27485498','U10808104','','','','','','','','','','',1),(34,'BarryAllen','62a2ce9a724104be9232033f59e07915',20,0.00,0,1567862643,'109.127.13.43','109.127.13.43',1567862702,'raf123fire@gmail.com',0.00,'',0,0,'','','','','','','','','','','','','','',6),(35,'Mosandy','10c5051693f9f461d1fd97fe423b3eeb',21,0.00,0,1567865085,'154.118.66.102','154.118.66.102',1567870561,'andrew.aboje@gmail.com',0.00,'',0,0,'Andrew','Moses','P1012457192','','','','https://www.facebook.com/mosesandrew01','','','','','','','',6),(36,'elyesse','a4462a015b39c02e5c4b124dfacb65b7',8,0.00,0,1567870905,'78.250.236.136','78.250.236.136',1567870987,'elyesse.naouar@gmail.com',0.00,'',0,0,'','','','','','','','','','','','','','',1),(37,'Baysangur','aac7403176e2d560d603538c1bacb2b7',21,0.00,0,1567872211,'83.169.216.241','83.169.216.241',1567872251,'Baysangur0005609@mail.ru',0.00,'',0,0,'','','','','','','','','','','','','','',6),(38,'santi','9ca0a2ffc9221a215ee4d6e217327a50',8,0.00,0,1567876685,'176.59.96.184','176.59.96.184',1567877657,'tikhonovqwerty73@gmail.com',0.00,'',0,0,'Александр','Тихонов','P1014322010','','','','','','','','','','+79530145473','',6),(39,'Sasisa0','40ecc10782ea25393e32bb563a891794',21,0.00,0,1567877806,'176.59.40.73','176.59.40.73',1567878069,'alekseimoroz1989@gmail.com',0.00,'',0,0,'','','','','','','','','','','','','','',6),(40,'Andybitcoin','61317719b5fb023c3c80f6d1bd6ad1ef',21,0.00,0,1567878764,'115.178.251.104','115.178.251.104',1567878766,'andychandra.76@gmail.com',0.00,'',0,0,'','','','','','','','','','','','','','',0),(41,'Pavlenko71','97d7f01f6cd00fcb34d4e5deede4986d',8,0.00,0,1567882931,'185.211.157.117','185.211.157.117',1567931628,'pavlenko.sizov29@yandex.ru',0.00,'',0,0,'Илья','Павленко','P1015271844','','','','https://m.facebook.com/?_rdr','','','','','','+79534294703','',1),(42,'Anuhka','56c0c01964a1314c7b37600e3b56793e',23,0.00,0,1567882965,'193.160.224.146','193.160.224.146',1567883015,'anuhka25@mail.ru',0.00,'',0,0,'','','','','','','','','','','','','','',2),(43,'mari02','d14ce4d19b99a8b531999c5ef861a8de',8,0.00,0,1567889043,'41.250.138.145','41.250.138.145',1567889252,'karima.bouayadi@gmail.com',0.00,'',297,0,'','','P1006557445','','','','','','','','','','','',1),(44,'jwatson','93e32023848f67ed251d8e2550d144c6',23,0.00,0,1567890531,'94.47.193.178','94.47.193.178',1567890840,'watwatson1@gmail.com',0.00,'',0,0,'Jak','Watson','P85865382','','https://vk.com/id477456670','','','','','','','','','',6),(45,'faresmaged','9e53181d3e0ae49573be033294a8a0cc',43,0.00,0,1567896197,'197.38.86.151','197.38.86.151',1567896382,'faresmaged01122@gmail.com',0.00,'',0,0,'','','','','','','','','','','','','','',2),(46,'tranthikim','7d5af71e2de112b0279648eaaa4ec026',43,0.00,0,1567896249,'2001:ee0:5619:1980:9482:249:3715:d1c','2001:ee0:5619:1980:9482:249:3715:d1c',1567896344,'phltranthikim@gmail.com',0.00,'',0,0,'','','','','','','','','','','','','','',0),(47,'Wantogog','0c50207a1a0a2fc072e7242383addc7c',23,0.00,0,1567902458,'36.81.105.84','36.81.105.84',1567902543,'togog.dw@gmail.com',0.00,'',0,0,'','','','','','','','','','','','','','',3),(48,'c3n4nn','0d638bc154b204ad79ad3f08e5c253c5',9,0.00,0,1567918254,'176.114.225.77','176.114.225.77',1567918299,'l-harlamova@mail.ru',0.00,'',0,0,'','','','','','','','','','','','','','',2),(49,'momo','e642ca98ffccec5ceaa92af6ab415e3d',23,0.00,0,1567920044,'183.182.119.12','183.182.119.12',1567920101,'noninthanon001@gmail.com',0.00,'',0,0,'','','','','','','','','','','','','','',6),(50,'SERGEYSMOL','a24ed0c91ca6b6ef929508b4751d7af0',9,0.00,0,1567924084,'217.118.66.143','217.118.66.143',1567927963,'smolayki171@gmail.com',0.00,'',0,0,'','','','','','','','','','','','','','',5),(51,'davefp','2ad6cbe7169582410996bf091482119d',25,0.00,0,1567927697,'95.144.164.69','95.144.164.69',1567938156,'davehashem@yahoo.com',0.00,'',0,0,'','','','','','','','','','','','','','',1),(52,'baza2','641de84a4b83f8c3e1ccd79ad894ff91',25,0.00,0,1567931878,'94.51.215.21','94.51.215.21',1567932121,'dr.aleks-36@yandex.ru',0.00,'',1,0,'','','','','','','','','','','','','','',6),(53,'vencho','0a1f65772f37cb8c01575cd19ae23aaf',25,0.00,0,1567938978,'190.75.9.12','190.75.9.12',1567939261,'rubengarofano@gmail.com',0.00,'',0,0,'Ruben','Garofano','P96596710','','','','','','','','','','','',1),(54,'1234345678','54f590debb5854a850891e598544a7d1',9,0.00,0,1567945092,'2001:67c:2660:425:1d::15d','2001:67c:2660:425:1d::15d',1567945129,'1234345678@yandex.ru',0.00,'',0,0,'','','','','','','','','','','','','','',5),(55,'test','c3284d0f94606de1fd2af172aba15bf3',0,4900.00,1,1628337077,'94.156.120.70','94.156.120.70',1628340341,'tester@mail.ru',0.00,'',0,1,'','','','','','','','','','','','','','',0);
/*!40000 ALTER TABLE `t_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-07 15:49:37
