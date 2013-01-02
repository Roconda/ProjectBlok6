
LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
DELETE FROM `profile` ;
INSERT INTO `profile` VALUES (1,1,'2012-12-04 10:09:23','protected','admin','admin',1,1,'webmaster@example.com',NULL,NULL,NULL);
INSERT INTO `profile` VALUES (2,2,'2012-12-04 10:09:23','protected','demo','demo',1,1,'demo@example.com',NULL,NULL,NULL);
INSERT INTO `profile` VALUES (3,3,'0000-00-00 00:00:00','protected','Saris','Ger',1,1,'gsaris@avans.nl','','','');
INSERT INTO `profile` VALUES (4,4,'0000-00-00 00:00:00','protected','Huysmans','Marco',1,1,'mhuysmans@avans.nl','','','');
INSERT INTO `profile` VALUES (5,5,'0000-00-00 00:00:00','protected','Spijkerman','Frans',1,1,'fspijkerman@avans.nl','','','');
INSERT INTO `profile` VALUES (6,6,'0000-00-00 00:00:00','protected','de Jong','Marieke',1,1,'mdjong@avans.nl','','','');
INSERT INTO `profile` VALUES (7,7,'0000-00-00 00:00:00','protected','Willemsen','Rob',1,1,'rwillemsen@avans.nl','','','');
INSERT INTO `profile` VALUES (8,8,'0000-00-00 00:00:00','protected','Ververs','Teun',1,1,'tververs@avans.nl','','','');
INSERT INTO `profile` VALUES (9,9,'0000-00-00 00:00:00','protected','Snoeijen','Steven',1,1,'ssnoeijen@avans.nl','','','');
INSERT INTO `profile` VALUES (10,10,'0000-00-00 00:00:00','protected','Voet','Joeri',1,1,'jvoet@avans.nl','','','');
INSERT INTO `profile` VALUES (11,11,'0000-00-00 00:00:00','protected','Sloot','Remi',1,1,'rsloot@avans.nl','','','');
INSERT INTO `profile` VALUES (12,12,'0000-00-00 00:00:00','protected','van Son','Niek',1,1,'nvslot@avans.nl','','','');
INSERT INTO `profile` VALUES (13,13,'0000-00-00 00:00:00','protected','Slot','Tim',1,1,'tslot@avans.nl','','','');
INSERT INTO `profile` VALUES (14,14,'0000-00-00 00:00:00','protected','van Tuijl','Leon',1,1,'lvtuijl@avans.nl','','','');
INSERT INTO `profile` VALUES (15,15,'0000-00-00 00:00:00','protected','Schut','Bart',1,1,'bschut@avans.nl','','','');
INSERT INTO `profile` VALUES (16,16,'0000-00-00 00:00:00','protected','docent','docent',1,1,'docent@avans.nl','','','');
INSERT INTO `profile` VALUES (17,17,'0000-00-00 00:00:00','protected','trainer','trainer',1,1,'trainer@avans.nl','','','');
INSERT INTO `profile` VALUES (18,18,'0000-00-00 00:00:00','protected','projectleider','projectleider',1,1,'projl@avans.nl','','','');
INSERT INTO `profile` VALUES (19,19,'0000-00-00 00:00:00','protected','etl','etl',1,1,'etl@avans.nl','','','');
INSERT INTO `profile` VALUES (20,20,'0000-00-00 00:00:00','protected','P@A','P@A',1,1,'PenA@avans.nl','','','');
INSERT INTO `profile` VALUES (21,21,'0000-00-00 00:00:00','protected','directeur','directeur',1,1,'directeur@avans.nl','','','');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `action` WRITE;
/*!40000 ALTER TABLE `action` DISABLE KEYS */;
DELETE FROM `action` ;
INSERT INTO `action` VALUES (1,'message_write',NULL,NULL);
INSERT INTO `action` VALUES (2,'message_receive',NULL,NULL);
INSERT INTO `action` VALUES (3,'user_create',NULL,NULL);
INSERT INTO `action` VALUES (4,'user_update',NULL,NULL);
INSERT INTO `action` VALUES (5,'user_remove',NULL,NULL);
INSERT INTO `action` VALUES (6,'user_admin',NULL,NULL);
INSERT INTO `action` VALUES (7,'traject_create',NULL,NULL);
INSERT INTO `action` VALUES (8,'traject_read',NULL,NULL);
INSERT INTO `action` VALUES (9,'traject_update',NULL,NULL);
INSERT INTO `action` VALUES (10,'traject_delete',NULL,NULL);
INSERT INTO `action` VALUES (11,'course_create',NULL,NULL);
INSERT INTO `action` VALUES (12,'course_read',NULL,NULL);
INSERT INTO `action` VALUES (13,'course_update',NULL,NULL);
INSERT INTO `action` VALUES (14,'course_delete',NULL,NULL);
INSERT INTO `action` VALUES (15,'courseoffer_create',NULL,NULL);
INSERT INTO `action` VALUES (16,'courseoffer_read',NULL,NULL);
INSERT INTO `action` VALUES (17,'courseoffer_update',NULL,NULL);
INSERT INTO `action` VALUES (18,'courseoffer_delete',NULL,NULL);
INSERT INTO `action` VALUES (19,'location_create',NULL,NULL);
INSERT INTO `action` VALUES (20,'location_read',NULL,NULL);
INSERT INTO `action` VALUES (21,'location_update',NULL,NULL);
INSERT INTO `action` VALUES (22,'location_delete',NULL,NULL);
INSERT INTO `action` VALUES (23,'enroll_create',NULL,NULL);
INSERT INTO `action` VALUES (24,'enroll_read',NULL,NULL);
INSERT INTO `action` VALUES (25,'enroll_update',NULL,NULL);
INSERT INTO `action` VALUES (26,'enroll_delete',NULL,NULL);
INSERT INTO `action` VALUES (27,'assign_create',NULL,NULL);
INSERT INTO `action` VALUES (28,'assign_read',NULL,NULL);
INSERT INTO `action` VALUES (29,'assign_update',NULL,NULL);
INSERT INTO `action` VALUES (30,'assign_delete',NULL,NULL);
INSERT INTO `action` VALUES (32,'assign_feedback_update',NULL,NULL);
INSERT INTO `action` VALUES (33,'enroll_feedback_update',NULL,NULL);
INSERT INTO `action` VALUES (34,'user_read',NULL,NULL);
INSERT INTO `action` VALUES (35,'assign_completed_update',NULL,NULL);
INSERT INTO `action` VALUES (36,'enroll_completed_update',NULL,NULL);
INSERT INTO `action` VALUES (37,'user_profile_update',NULL,NULL);
INSERT INTO `action` VALUES (38,'user_profile_read',NULL,NULL);
INSERT INTO `action` VALUES (39,'role_create',NULL,NULL);
INSERT INTO `action` VALUES (40,'role_read',NULL,NULL);
INSERT INTO `action` VALUES (41,'role_update',NULL,NULL);
INSERT INTO `action` VALUES (42,'role_delete',NULL,NULL);
INSERT INTO `action` VALUES (43,'enroll_create_own',NULL,NULL);
INSERT INTO `action` VALUES (44,'enroll_read_own',NULL,NULL);
INSERT INTO `action` VALUES (45,'enroll_update_own',NULL,NULL);
INSERT INTO `action` VALUES (46,'assign_create_own',NULL,NULL);
INSERT INTO `action` VALUES (47,'assign_read_own',NULL,NULL);
INSERT INTO `action` VALUES (48,'assign_update_own',NULL,NULL);
INSERT INTO `action` VALUES (49,'user_profile_read_own',NULL,NULL);
INSERT INTO `action` VALUES (50,'user_profile_update_own',NULL,NULL);
INSERT INTO `action` VALUES (51,'assign_update_completed',NULL,NULL);
INSERT INTO `action` VALUES (52,'enroll_update_completed',NULL,NULL);
INSERT INTO `action` VALUES (53,'export_pdf');
INSERT INTO `action` VALUES (54,'export_xls');
/*!40000 ALTER TABLE `action` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
DELETE FROM `permission` ;
INSERT INTO `permission` VALUES (1,0,'role',4,0,'');
INSERT INTO `permission` VALUES (1,0,'role',5,0,'');
INSERT INTO `permission` VALUES (1,0,'role',6,0,'');
INSERT INTO `permission` VALUES (1,0,'role',7,0,'');
INSERT INTO `permission` VALUES (5,0,'role',32,0,'');
INSERT INTO `permission` VALUES (5,0,'role',33,0,'');
INSERT INTO `permission` VALUES (5,0,'role',43,0,'');
INSERT INTO `permission` VALUES (5,0,'role',44,0,'');
INSERT INTO `permission` VALUES (5,0,'role',45,0,'');
INSERT INTO `permission` VALUES (5,0,'role',46,0,'');
INSERT INTO `permission` VALUES (5,0,'role',47,0,'');
INSERT INTO `permission` VALUES (5,0,'role',48,0,'');
INSERT INTO `permission` VALUES (5,0,'role',49,0,'');
INSERT INTO `permission` VALUES (5,0,'role',50,0,'');
INSERT INTO `permission` VALUES (6,0,'role',24,0,'');
INSERT INTO `permission` VALUES (6,0,'role',28,0,'');
INSERT INTO `permission` VALUES (6,0,'role',34,0,'');
INSERT INTO `permission` VALUES (7,0,'role',7,0,'');
INSERT INTO `permission` VALUES (7,0,'role',8,0,'');
INSERT INTO `permission` VALUES (7,0,'role',9,0,'');
INSERT INTO `permission` VALUES (7,0,'role',10,0,'');
INSERT INTO `permission` VALUES (7,0,'role',11,0,'');
INSERT INTO `permission` VALUES (7,0,'role',12,0,'');
INSERT INTO `permission` VALUES (7,0,'role',14,0,'');
INSERT INTO `permission` VALUES (7,0,'role',15,0,'');
INSERT INTO `permission` VALUES (7,0,'role',16,0,'');
INSERT INTO `permission` VALUES (7,0,'role',17,0,'');
INSERT INTO `permission` VALUES (7,0,'role',18,0,'');
INSERT INTO `permission` VALUES (7,0,'role',19,0,'');
INSERT INTO `permission` VALUES (7,0,'role',20,0,'');
INSERT INTO `permission` VALUES (7,0,'role',21,0,'');
INSERT INTO `permission` VALUES (7,0,'role',23,0,'');
INSERT INTO `permission` VALUES (7,0,'role',24,0,'');
INSERT INTO `permission` VALUES (7,0,'role',25,0,'');
INSERT INTO `permission` VALUES (7,0,'role',26,0,'');
INSERT INTO `permission` VALUES (7,0,'role',27,0,'');
INSERT INTO `permission` VALUES (7,0,'role',28,0,'');
INSERT INTO `permission` VALUES (7,0,'role',29,0,'');
INSERT INTO `permission` VALUES (7,0,'role',30,0,'');
INSERT INTO `permission` VALUES (7,0,'role',34,0,'');
INSERT INTO `permission` VALUES (7,0,'role',37,0,'');
INSERT INTO `permission` VALUES (7,0,'role',38,0,'');
INSERT INTO `permission` VALUES (7,0,'role',39,0,'');
INSERT INTO `permission` VALUES (7,0,'role',40,0,'');
INSERT INTO `permission` VALUES (7,0,'role',41,0,'');
INSERT INTO `permission` VALUES (7,0,'role',42,0,'');
INSERT INTO `permission` VALUES (7,7,'role',13,0,'');
INSERT INTO `permission` VALUES (7,7,'role',22,0,'');
INSERT INTO `permission` VALUES (8,0,'role',24,0,'');
INSERT INTO `permission` VALUES (8,0,'role',28,0,'');
INSERT INTO `permission` VALUES (8,0,'role',34,0,'');
INSERT INTO `permission` VALUES (8,0,'role',35,0,'');
INSERT INTO `permission` VALUES (8,0,'role',36,0,'');
INSERT INTO `permission` VALUES (8,0,'role',51,0,'');
INSERT INTO `permission` VALUES (8,0,'role',52,0,'');
INSERT INTO `permission` VALUES (9,0,'role',24,0,'');
INSERT INTO `permission` VALUES (9,0,'role',28,0,'');
INSERT INTO `permission` VALUES (9,0,'role',34,0,'');
INSERT INTO `permission` VALUES (10,0,'role',8,0,'');
INSERT INTO `permission` VALUES (10,0,'role',12,0,'');
INSERT INTO `permission` VALUES (10,0,'role',16,0,'');
INSERT INTO `permission` VALUES (10,0,'role',20,0,'');
INSERT INTO `permission` VALUES (10,0,'role',24,0,'');
INSERT INTO `permission` VALUES (10,0,'role',28,0,'');
INSERT INTO `permission` VALUES (10,0,'role',34,0,'');
INSERT INTO `permission` VALUES (10,0,'role',38,0,'');
INSERT INTO `permission` VALUES (10,0,'role',40,0,'');
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;


LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
DELETE FROM `user_role` ;
INSERT INTO `user_role` VALUES (2,3);
INSERT INTO `user_role` VALUES (3,5);
INSERT INTO `user_role` VALUES (4,5);
INSERT INTO `user_role` VALUES (5,5);
INSERT INTO `user_role` VALUES (6,5);
INSERT INTO `user_role` VALUES (7,5);
INSERT INTO `user_role` VALUES (8,7);
INSERT INTO `user_role` VALUES (9,10);
INSERT INTO `user_role` VALUES (10,6);
INSERT INTO `user_role` VALUES (11,6);
INSERT INTO `user_role` VALUES (12,9);
INSERT INTO `user_role` VALUES (13,8);
INSERT INTO `user_role` VALUES (14,7);
INSERT INTO `user_role` VALUES (15,9);
INSERT INTO `user_role` VALUES (16,5);
INSERT INTO `user_role` VALUES (17,6);
INSERT INTO `user_role` VALUES (18,7);
INSERT INTO `user_role` VALUES (19,8);
INSERT INTO `user_role` VALUES (20,9);
INSERT INTO `user_role` VALUES (21,10);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Deleting from tabels that hinder foreing keys
--

DELETE FROM `enroll`;
DELETE FROM `assign`;
DELETE FROM `courseoffer`;
DELETE FROM `course_has_traject`;
DELETE FROM `location`;

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,'Den Bosch');
INSERT INTO `location` VALUES (2,'Breda');
INSERT INTO `location` VALUES (3,'Tilburg');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `traject` WRITE;
/*!40000 ALTER TABLE `traject` DISABLE KEYS */;
DELETE FROM `traject` ;
INSERT INTO `traject` VALUES (1,'DDCD 2 jaar',2,4);
INSERT INTO `traject` VALUES (2,'DDCD 3 jaar',3,4);
/*!40000 ALTER TABLE `traject` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
DELETE FROM `course` ;
INSERT INTO `course` VALUES (1,'Blackboard',1);
INSERT INTO `course` VALUES (2,'Smartboard',1);
INSERT INTO `course` VALUES (3,'digitale didactiek',1);
INSERT INTO `course` VALUES (4,'vrije keus',0);
INSERT INTO `course` VALUES (5,'Office',0);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `courseoffer` WRITE;
/*!40000 ALTER TABLE `courseoffer` DISABLE KEYS */;
INSERT INTO `courseoffer` VALUES (1,1,1,2012,4,1,1);
INSERT INTO `courseoffer` VALUES (2,2,3,2013,1,1,0);
INSERT INTO `courseoffer` VALUES (3,3,NULL,2013,1,1,0);
INSERT INTO `courseoffer` VALUES (4,5,2,2013,2,1,0);
INSERT INTO `courseoffer` VALUES (5,4,NULL,2013,3,0,0);
/*!40000 ALTER TABLE `courseoffer` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
DELETE FROM `user` ;
INSERT INTO `user` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','',1354622963,1355748205,1355748651,0,1,1,NULL,'Instant');
INSERT INTO `user` VALUES (2,'demo','fe01ce2a7fbac8fafaed7c982a04e229','',1354622963,0,0,0,0,-2,NULL,'Instant');
INSERT INTO `user` VALUES (3,'gsaris','6f6fb40b7aedc570f25a6ceab8078fc2','24eae92eb2493766729d523c0d74dd7e',1355061087,0,0,1355061087,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (4,'mhuysmans','6f6fb40b7aedc570f25a6ceab8078fc2','62cac23bdd9ec034da3ed71c4d96b00e',1355061158,0,0,1355061158,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (5,'fspijkerman','6f6fb40b7aedc570f25a6ceab8078fc2','3adab148ef377d7db4cbcd511fd2165d',1355061216,1355416325,0,1355061216,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (6,'mdjong','6f6fb40b7aedc570f25a6ceab8078fc2','9ff8fd5248262268dc73f0b10190ba2a',1355061281,0,0,1355061281,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (7,'rwillemsen','6f6fb40b7aedc570f25a6ceab8078fc2','d215699558602a74596f742d801d8fe5',1355061332,0,0,1355061332,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (8,'tververs','6f6fb40b7aedc570f25a6ceab8078fc2','559d9d2c17a8adb9d443630b9761192c',1355061381,1355426795,0,1355061381,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (9,'ssnoeijen','6f6fb40b7aedc570f25a6ceab8078fc2','0e78fdff5c6c7b444ce33549ef1b1981',1355337538,0,0,1355337538,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (10,'jvoet','6f6fb40b7aedc570f25a6ceab8078fc2','b52ca6f5a8282e186cc22b81c9205fd3',1355337572,0,0,1355337572,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (11,'rsloot','6f6fb40b7aedc570f25a6ceab8078fc2','ae113bfbdc4b867387481c9aa8784168',1355337814,0,0,1355337814,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (12,'nvson','6f6fb40b7aedc570f25a6ceab8078fc2','e6598cf63d1700266cff47d4cbe578dd',1355337924,0,0,1355337924,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (13,'tslot','6f6fb40b7aedc570f25a6ceab8078fc2','56ecb27f5c413b9881505659dba03fac',1355337970,0,0,1355337970,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (14,'lvtuijl','6f6fb40b7aedc570f25a6ceab8078fc2','295c300bee25d2a98215eb3c14b681bf',1355338022,0,0,1355338022,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (15,'bschut','6f6fb40b7aedc570f25a6ceab8078fc2','2abc3d634f675e8ad98f14b4f9ae3340',1355338081,1355430103,1355430103,1355338081,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (16,'docent','6f6fb40b7aedc570f25a6ceab8078fc2','aae6ef629a25bfac82fb4a03111802d6',1355748294,0,0,1355748294,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (17,'trainer','6f6fb40b7aedc570f25a6ceab8078fc2','6292cba7790191d078860d8ffa58e31e',1355748330,0,0,1355748330,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (18,'projectleider','6f6fb40b7aedc570f25a6ceab8078fc2','9c10dc4c34e9258bdab7cac1f1078086',1355748415,0,0,1355748415,1,1,NULL,'Instant');
INSERT INTO `user` VALUES (19,'etl','6f6fb40b7aedc570f25a6ceab8078fc2','d84114b7b73ddeedea13c3da4fb2c6a8',1355748444,0,0,1355748444,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (20,'PatA','6f6fb40b7aedc570f25a6ceab8078fc2','30811b5128304ddc532f9c0198bc8528',1355748507,0,0,1355748507,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (21,'directeur','6f6fb40b7aedc570f25a6ceab8078fc2','0b416c88de571090d975c10d2bdbdb72',1355748647,0,0,1355748647,0,1,NULL,'Instant');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `enroll` WRITE;
/*!40000 ALTER TABLE `enroll` DISABLE KEYS */;
DELETE FROM `enroll` ;
INSERT INTO `enroll` VALUES (3,2,'uncompleted',NULL);
INSERT INTO `enroll` VALUES (3,3,'uncompleted',NULL);
INSERT INTO `enroll` VALUES (3,4,'uncompleted',NULL);
INSERT INTO `enroll` VALUES (4,4,'uncompleted',NULL);
INSERT INTO `enroll` VALUES (4,5,'uncompleted',NULL);
INSERT INTO `enroll` VALUES (5,1,'completed',NULL);
INSERT INTO `enroll` VALUES (5,2,'uncompleted',NULL);
INSERT INTO `enroll` VALUES (5,3,'uncompleted',NULL);
INSERT INTO `enroll` VALUES (5,4,'uncompleted',NULL);
INSERT INTO `enroll` VALUES (6,5,'uncompleted',NULL);
INSERT INTO `enroll` VALUES (7,2,'uncompleted',NULL);
INSERT INTO `enroll` VALUES (7,4,'uncompleted',NULL);
INSERT INTO `enroll` VALUES (8,1,'failed',NULL);
INSERT INTO `enroll` VALUES (8,2,'uncompleted',NULL);
INSERT INTO `enroll` VALUES (8,5,'uncompleted',NULL);
/*!40000 ALTER TABLE `enroll` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `assign` WRITE;
/*!40000 ALTER TABLE `assign` DISABLE KEYS */;
DELETE FROM `assign` ;
INSERT INTO `assign` VALUES (3,1,'2010-11-11','completed',NULL);
INSERT INTO `assign` VALUES (4,1,'2011-08-21','undone',NULL);
INSERT INTO `assign` VALUES (5,1,'2012-01-07','undone',NULL);
INSERT INTO `assign` VALUES (6,2,'2009-05-05','completed',NULL);
INSERT INTO `assign` VALUES (7,2,'2008-11-12','completed',NULL);
INSERT INTO `assign` VALUES (8,2,'2010-11-11','undone',NULL);
/*!40000 ALTER TABLE `assign` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `course_has_traject` WRITE;
/*!40000 ALTER TABLE `course_has_traject` DISABLE KEYS */;
DELETE FROM `course_has_traject` ;
INSERT INTO `course_has_traject` VALUES (1,1);
INSERT INTO `course_has_traject` VALUES (2,1);
INSERT INTO `course_has_traject` VALUES (3,1);
INSERT INTO `course_has_traject` VALUES (4,1);
INSERT INTO `course_has_traject` VALUES (1,2);
INSERT INTO `course_has_traject` VALUES (2,2);
INSERT INTO `course_has_traject` VALUES (3,2);
INSERT INTO `course_has_traject` VALUES (4,2);
/*!40000 ALTER TABLE `course_has_traject` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
DELETE FROM `role` ;
INSERT INTO `role` VALUES (1,'UserManager','This users can manage Users',0,0,0);
INSERT INTO `role` VALUES (5,'Docent','De docenten die een cursus volgen',0,NULL,NULL);
INSERT INTO `role` VALUES (6,'Trainer','Iemand die de cursusen geeft aan de docenten.',0,NULL,NULL);
INSERT INTO `role` VALUES (7,'Projectleider','',0,NULL,NULL);
INSERT INTO `role` VALUES (8,'ETL','',0,NULL,NULL);
INSERT INTO `role` VALUES (9,'P@A','',0,NULL,NULL);
INSERT INTO `role` VALUES (10,'Directeur','',0,NULL,NULL);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `privacysetting` WRITE;
/*!40000 ALTER TABLE `privacysetting` DISABLE KEYS */;
DELETE FROM `privacysetting` ;
INSERT INTO `privacysetting` VALUES (1,1,1,1,1,1,1,'',NULL);
INSERT INTO `privacysetting` VALUES (2,1,1,1,1,1,1,NULL,NULL);
INSERT INTO `privacysetting` VALUES (3,1,1,1,1,1,1,'',NULL);
INSERT INTO `privacysetting` VALUES (4,1,1,1,1,1,1,'',NULL);
INSERT INTO `privacysetting` VALUES (5,1,1,1,1,1,1,'',NULL);
INSERT INTO `privacysetting` VALUES (6,1,1,1,1,1,1,'',NULL);
INSERT INTO `privacysetting` VALUES (7,1,1,1,1,1,1,'',NULL);
INSERT INTO `privacysetting` VALUES (8,1,1,1,1,1,1,'',NULL);
INSERT INTO `privacysetting` VALUES (9,1,1,1,1,1,1,'',NULL);
INSERT INTO `privacysetting` VALUES (10,1,1,1,1,1,1,'',NULL);
INSERT INTO `privacysetting` VALUES (11,1,1,1,1,1,1,'',NULL);
INSERT INTO `privacysetting` VALUES (12,1,1,1,1,1,1,'',NULL);
INSERT INTO `privacysetting` VALUES (13,1,1,1,1,1,1,'',NULL);
INSERT INTO `privacysetting` VALUES (14,1,1,1,1,1,1,'',NULL);
INSERT INTO `privacysetting` VALUES (15,1,1,1,1,1,1,'',NULL);
/*!40000 ALTER TABLE `privacysetting` ENABLE KEYS */;
UNLOCK TABLES;

-- Dump completed on 2012-12-09 16:05:33
