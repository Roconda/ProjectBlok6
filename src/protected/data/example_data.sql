CREATE DATABASE  IF NOT EXISTS `ddcd` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ddcd`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: ddcd
-- ------------------------------------------------------
-- Server version	5.5.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `privacy` enum('protected','private','public') NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `show_friends` tinyint(1) DEFAULT '1',
  `allow_comments` tinyint(1) DEFAULT '1',
  `email` varchar(255) NOT NULL DEFAULT '',
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `about` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
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

--
-- Table structure for table `profile_visit`
--

DROP TABLE IF EXISTS `profile_visit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile_visit` (
  `visitor_id` int(11) NOT NULL,
  `visited_id` int(11) NOT NULL,
  `timestamp_first_visit` int(11) NOT NULL,
  `timestamp_last_visit` int(11) NOT NULL,
  `num_of_visits` int(11) NOT NULL,
  PRIMARY KEY (`visitor_id`,`visited_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_visit`
--

LOCK TABLES `profile_visit` WRITE;
/*!40000 ALTER TABLE `profile_visit` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile_visit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission` (
  `principal_id` int(11) NOT NULL,
  `subordinate_id` int(11) NOT NULL DEFAULT '0',
  `type` enum('user','role') NOT NULL,
  `action` int(11) NOT NULL,
  `template` tinyint(1) NOT NULL,
  `comment` text,
  PRIMARY KEY (`principal_id`,`subordinate_id`,`type`,`action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission`
--

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` VALUES (1,0,'role',4,0,'');
INSERT INTO `permission` VALUES (1,0,'role',5,0,'');
INSERT INTO `permission` VALUES (1,0,'role',6,0,'');
INSERT INTO `permission` VALUES (1,0,'role',7,0,'');
INSERT INTO `permission` VALUES (2,0,'role',1,0,'Users can write messages');
INSERT INTO `permission` VALUES (2,0,'role',2,0,'Users can receive messages');
INSERT INTO `permission` VALUES (2,0,'role',3,0,'Users are able to view visits of his profile');
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (2,3);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dropping tabels that hinder foreing keys
--

DROP TABLE IF EXISTS `enroll`;
DROP TABLE IF EXISTS `assign`;
DROP TABLE IF EXISTS `courseoffer`;
DROP TABLE IF EXISTS `course_has_traject`;
DROP TABLE IF EXISTS `location`;

--
-- Table structure for table `location`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,'Den Bosch');
INSERT INTO `location` VALUES (2,'Breda');
INSERT INTO `location` VALUES (3,'Tilburg');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `traject`
--

DROP TABLE IF EXISTS `traject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `traject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  `duration` int(11) NOT NULL,
  `nrcourses` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `traject`
--

LOCK TABLES `traject` WRITE;
/*!40000 ALTER TABLE `traject` DISABLE KEYS */;
INSERT INTO `traject` VALUES (1,'DDCD 2 jaar',2,4);
INSERT INTO `traject` VALUES (2,'DDCD 3 jaar',3,4);
/*!40000 ALTER TABLE `traject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  `required` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'Blackboard',1);
INSERT INTO `course` VALUES (2,'Smartboard',1);
INSERT INTO `course` VALUES (3,'digitale didactiek',1);
INSERT INTO `course` VALUES (4,'vrije keus',0);
INSERT INTO `course` VALUES (5,'Office',0);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courseoffer`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courseoffer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `fysiek` tinyint(1) NOT NULL,
  `blocked` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_CourseOffer_Course1_idx` (`course_id`),
  KEY `fk_CourseOffer_Location1_idx` (`location_id`),
  CONSTRAINT `fk_CourseOffer_Course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_CourseOffer_Location1` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courseoffer`
--

LOCK TABLES `courseoffer` WRITE;
/*!40000 ALTER TABLE `courseoffer` DISABLE KEYS */;
INSERT INTO `courseoffer` VALUES (1,1,1,2012,4,1,1);
INSERT INTO `courseoffer` VALUES (2,2,3,2013,1,1,0);
INSERT INTO `courseoffer` VALUES (3,3,NULL,2013,1,1,0);
INSERT INTO `courseoffer` VALUES (4,5,2,2013,2,1,0);
INSERT INTO `courseoffer` VALUES (5,4,NULL,2013,3,0,0);
/*!40000 ALTER TABLE `courseoffer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `activationKey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `lastaction` int(10) NOT NULL DEFAULT '0',
  `lastpasswordchange` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `avatar` varchar(255) DEFAULT NULL,
  `notifyType` enum('None','Digest','Instant','Threshold') DEFAULT 'Instant',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
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

--
-- Table structure for table `enroll`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enroll` (
  `user_id` int(10) unsigned NOT NULL,
  `courseoffer_id` int(11) NOT NULL,
  `completed` enum('undone','failed','completed') NOT NULL,
  `notes` text,
  PRIMARY KEY (`user_id`,`courseoffer_id`),
  KEY `fk_User_has_CourseOffer_CourseOffer1_idx` (`courseoffer_id`),
  KEY `fk_enroll_user1_idx` (`user_id`),
  CONSTRAINT `fk_User_has_CourseOffer_CourseOffer1` FOREIGN KEY (`courseoffer_id`) REFERENCES `courseoffer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_enroll_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enroll`
--

LOCK TABLES `enroll` WRITE;
/*!40000 ALTER TABLE `enroll` DISABLE KEYS */;
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

--
-- Table structure for table `assign`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assign` (
  `user_id` int(10) unsigned NOT NULL,
  `traject_id` int(11) NOT NULL,
  `completed` enum('undone','failed','completed') NOT NULL,
  `notes` text,
  PRIMARY KEY (`user_id`,`traject_id`),
  KEY `fk_User_has_Course_Course1_idx` (`traject_id`),
  KEY `fk_assign_user1_idx` (`user_id`),
  CONSTRAINT `fk_User_has_Course_Course1` FOREIGN KEY (`traject_id`) REFERENCES `traject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_assign_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assign`
--

LOCK TABLES `assign` WRITE;
/*!40000 ALTER TABLE `assign` DISABLE KEYS */;
INSERT INTO `assign` VALUES (3,1,'completed',NULL);
INSERT INTO `assign` VALUES (4,1,'undone',NULL);
INSERT INTO `assign` VALUES (5,1,'undone',NULL);
INSERT INTO `assign` VALUES (6,2,'completed',NULL);
INSERT INTO `assign` VALUES (7,2,'completed',NULL);
INSERT INTO `assign` VALUES (8,2,'undone',NULL);
/*!40000 ALTER TABLE `assign` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_has_traject`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_has_traject` (
  `course_id` int(11) NOT NULL,
  `traject_id` int(11) NOT NULL,
  PRIMARY KEY (`course_id`,`traject_id`),
  KEY `fk_Course_has_Traject_Traject1_idx` (`traject_id`),
  KEY `fk_Course_has_Traject_Course1_idx` (`course_id`),
  CONSTRAINT `fk_Course_has_Traject_Course1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Course_has_Traject_Traject1` FOREIGN KEY (`traject_id`) REFERENCES `traject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_has_traject`
--

LOCK TABLES `course_has_traject` WRITE;
/*!40000 ALTER TABLE `course_has_traject` DISABLE KEYS */;
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

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `participants` text,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group`
--

LOCK TABLES `user_group` WRITE;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_membership_possible` tinyint(1) NOT NULL DEFAULT '0',
  `price` double DEFAULT NULL COMMENT 'Price (when using membership module)',
  `duration` int(11) DEFAULT NULL COMMENT 'How long a membership is valid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'UserManager','This users can manage Users',0,0,0);
INSERT INTO `role` VALUES (2,'Demo','Users having the demo role',0,0,0);
INSERT INTO `role` VALUES (3,'Business','Example Business account',0,9.99,7);
INSERT INTO `role` VALUES (4,'Premium','Example Premium account',0,19.99,28);
INSERT INTO `role` VALUES (5,'User','',0,NULL,NULL);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-12-09 16:05:33
