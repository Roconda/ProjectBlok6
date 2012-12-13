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
INSERT INTO `permission` VALUES (5,0,'role',23,0,'');
INSERT INTO `permission` VALUES (5,0,'role',24,0,'');
INSERT INTO `permission` VALUES (5,0,'role',25,0,'');
INSERT INTO `permission` VALUES (5,0,'role',26,0,'');
INSERT INTO `permission` VALUES (5,0,'role',27,0,'');
INSERT INTO `permission` VALUES (5,0,'role',28,0,'');
INSERT INTO `permission` VALUES (5,0,'role',29,0,'');
INSERT INTO `permission` VALUES (5,0,'role',30,0,'');
INSERT INTO `permission` VALUES (5,0,'role',32,0,'');
INSERT INTO `permission` VALUES (5,0,'role',33,0,'');
INSERT INTO `permission` VALUES (5,0,'role',37,0,'');
INSERT INTO `permission` VALUES (5,0,'role',38,0,'');
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

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
DELETE FROM `role` ;
INSERT INTO `role` VALUES (1,'UserManager','This users can manage Users',0,0,0);
INSERT INTO `role` VALUES (2,'Demo','Users having the demo role',0,0,0);
INSERT INTO `role` VALUES (3,'Business','Example Business account',0,9.99,7);
INSERT INTO `role` VALUES (4,'Premium','Example Premium account',0,19.99,28);
INSERT INTO `role` VALUES (5,'Docent','De docenten die een cursus volgen',0,NULL,NULL);
INSERT INTO `role` VALUES (6,'Trainer','Iemand die de cursusen geeft aan de docenten.',0,NULL,NULL);
INSERT INTO `role` VALUES (7,'Projectleider','',0,NULL,NULL);
INSERT INTO `role` VALUES (8,'ETL','',0,NULL,NULL);
INSERT INTO `role` VALUES (9,'P@A','',0,NULL,NULL);
INSERT INTO `role` VALUES (10,'Directeur','',0,NULL,NULL);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `action`
--

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
/*!40000 ALTER TABLE `action` ENABLE KEYS */;
UNLOCK TABLES;

-- Dump completed on 2012-12-11 20:59:28
