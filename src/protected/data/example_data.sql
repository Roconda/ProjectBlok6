
LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
DELETE FROM `profile` ;
INSERT INTO `profile` VALUES (1,1,'2012-12-04 12:09:23','protected','admin','admin',1,1,'webmaster@example.com',NULL,NULL,NULL);
INSERT INTO `profile` VALUES (2,2,'2012-12-04 12:09:23','protected','demo','demo',1,1,'demo@example.com',NULL,NULL,NULL);
INSERT INTO `profile` VALUES (3,3,'0000-00-00 00:00:00','protected','Saris','Ger',1,1,'gsaris@avans.nl','','','');
INSERT INTO `profile` VALUES (4,4,'0000-00-00 00:00:00','protected','Huysmans','Marco',1,1,'mhuysmans@avans.nl','','','');
INSERT INTO `profile` VALUES (5,5,'0000-00-00 00:00:00','protected','Spijkerman','Frans',1,1,'fspijkerman@avans.nl','','','');
INSERT INTO `profile` VALUES (6,6,'0000-00-00 00:00:00','protected','de Jong','Marieke',1,1,'mdjong@avans.nl','','','');
INSERT INTO `profile` VALUES (7,7,'0000-00-00 00:00:00','protected','Willemsen','Rob',1,1,'rwillemsen@avans.nl','','','');
INSERT INTO `profile` VALUES (8,8,'0000-00-00 00:00:00','protected','Ververs','Teun',1,1,'tververs@avans.nl','','','');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
DELETE FROM `permission` ;
INSERT INTO `permission` VALUES (1,0,'role',4,0,'');
INSERT INTO `permission` VALUES (1,0,'role',5,0,'');
INSERT INTO `permission` VALUES (1,0,'role',6,0,'');
INSERT INTO `permission` VALUES (1,0,'role',7,0,'');
INSERT INTO `permission` VALUES (2,0,'role',1,0,'Users can write messages');
INSERT INTO `permission` VALUES (2,0,'role',2,0,'Users can receive messages');
INSERT INTO `permission` VALUES (2,0,'role',3,0,'Users are able to view visits of his profile');
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
DELETE FROM `user_role` ;
INSERT INTO `user_role` VALUES (2,3);
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
INSERT INTO `user` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','',1354622963,1355061724,0,0,1,1,NULL,'Instant');
INSERT INTO `user` VALUES (2,'demo','fe01ce2a7fbac8fafaed7c982a04e229','',1354622963,0,0,0,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (3,'gsaris','6f6fb40b7aedc570f25a6ceab8078fc2','24eae92eb2493766729d523c0d74dd7e',1355061087,0,0,1355061087,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (4,'mhuysmans','6f6fb40b7aedc570f25a6ceab8078fc2','62cac23bdd9ec034da3ed71c4d96b00e',1355061158,0,0,1355061158,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (5,'fspijkerman','6f6fb40b7aedc570f25a6ceab8078fc2','3adab148ef377d7db4cbcd511fd2165d',1355061216,0,0,1355061216,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (6,'mdjong','6f6fb40b7aedc570f25a6ceab8078fc2','9ff8fd5248262268dc73f0b10190ba2a',1355061281,0,0,1355061281,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (7,'rwillemsen','6f6fb40b7aedc570f25a6ceab8078fc2','d215699558602a74596f742d801d8fe5',1355061332,0,0,1355061332,0,1,NULL,'Instant');
INSERT INTO `user` VALUES (8,'tververs','6f6fb40b7aedc570f25a6ceab8078fc2','559d9d2c17a8adb9d443630b9761192c',1355061381,1355061692,0,1355061381,0,1,NULL,'Instant');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `enroll` WRITE;
/*!40000 ALTER TABLE `enroll` DISABLE KEYS */;
DELETE FROM `enroll` ;
INSERT INTO `enroll` VALUES (3,2,'undone',NULL);
INSERT INTO `enroll` VALUES (3,3,'undone',NULL);
INSERT INTO `enroll` VALUES (3,4,'undone',NULL);
INSERT INTO `enroll` VALUES (4,4,'undone',NULL);
INSERT INTO `enroll` VALUES (4,5,'undone',NULL);
INSERT INTO `enroll` VALUES (5,1,'completed',NULL);
INSERT INTO `enroll` VALUES (5,2,'undone',NULL);
INSERT INTO `enroll` VALUES (5,3,'undone',NULL);
INSERT INTO `enroll` VALUES (5,4,'undone',NULL);
INSERT INTO `enroll` VALUES (6,5,'undone',NULL);
INSERT INTO `enroll` VALUES (7,2,'undone',NULL);
INSERT INTO `enroll` VALUES (7,4,'undone',NULL);
INSERT INTO `enroll` VALUES (8,1,'failed',NULL);
INSERT INTO `enroll` VALUES (8,2,'undone',NULL);
INSERT INTO `enroll` VALUES (8,5,'undone',NULL);
/*!40000 ALTER TABLE `enroll` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `assign` WRITE;
/*!40000 ALTER TABLE `assign` DISABLE KEYS */;
DELETE FROM `assign` ;
INSERT INTO `assign` VALUES (3,1,'completed',NULL);
INSERT INTO `assign` VALUES (4,1,'undone',NULL);
INSERT INTO `assign` VALUES (5,1,'undone',NULL);
INSERT INTO `assign` VALUES (6,2,'completed',NULL);
INSERT INTO `assign` VALUES (7,2,'completed',NULL);
INSERT INTO `assign` VALUES (8,2,'undone',NULL);
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
INSERT INTO `role` VALUES (2,'Demo','Users having the demo role',0,0,0);
INSERT INTO `role` VALUES (3,'Business','Example Business account',0,9.99,7);
INSERT INTO `role` VALUES (4,'Premium','Example Premium account',0,19.99,28);
INSERT INTO `role` VALUES (5,'User','',0,NULL,NULL);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

-- Dump completed on 2012-12-09 16:05:33
