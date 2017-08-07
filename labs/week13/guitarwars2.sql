-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: guitarwars2
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

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
-- Table structure for table `guitarwars`
--

DROP TABLE IF EXISTS `guitarwars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guitarwars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(32) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `screenshot` varchar(64) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guitarwars`
--

LOCK TABLES `guitarwars` WRITE;
/*!40000 ALTER TABLE `guitarwars` DISABLE KEYS */;
INSERT INTO `guitarwars` VALUES (21,'2008-05-01 20:36:07','Belita Chevy',282470,'belitasscore.gif',1),(22,'2008-05-01 20:36:45','Jacob Scorcherson',389740,'jacobsscore.gif',1),(23,'2008-05-01 20:37:02','Nevil Johansson',98430,'nevilsscore.gif',1),(24,'2008-05-01 20:37:23','Paco Jastorius',127650,'pacosscore.gif',1),(25,'2008-05-01 20:37:40','Phiz Lairston',186580,'phizsscore.gif',1),(26,'2008-05-01 20:38:00','Kenny Lavitz',64930,'kennysscore.gif',1),(27,'2008-05-01 20:38:23','Jean Paul Jones',243260,'jeanpaulsscore.gif',1),(28,'2008-05-01 21:14:56','Leddy Gee',308710,'leddysscore.gif',1),(29,'2008-05-01 21:15:17','T-Bone Taylor',354190,'tbonesscore.gif',1),(31,'2008-05-02 20:32:54','Biff Jeck',314340,'biffsscore.gif',1),(32,'2008-05-02 20:36:38','Pez Law',322710,'pezsscore.gif',1),(34,'2008-05-05 23:28:07','Jacob Scorcherson',465730,'jacobsscore2.gif',1),(35,'2008-06-23 11:45:15','www.classhates.com',999999999,'classhates.png',0),(36,'2008-06-23 11:45:29','www.classhates.com',999999999,'classhates.png',0),(37,'2008-06-23 11:45:53','www.frowneycentral.com',999999999,'frowneycentral.png',0),(38,'2008-06-23 11:46:06','www.frowneycentral.com',999999999,'frowneycentral.png',0),(39,'2008-06-23 11:46:19','www.frowneycentral.com',999999999,'frowneycentral.png',0),(40,'2008-06-23 11:47:26','www.frowneycentral.com',999999999,'frowneycentral.png',0),(41,'2008-06-23 11:47:42','www.frowneycentral.com',999999999,'frowneycentral.png',0),(42,'2008-06-23 11:47:55','www.headlastlabs.com',999999999,'headlastlabs.png',0),(43,'2008-06-23 11:48:12','www.headlastlabs.com',999999999,'headlastlabs.png',0),(44,'2008-06-23 11:52:20','www.headlastlabs.com',999999999,'headlastlabs.png',0),(45,'2008-06-23 11:50:24','www.headlastlabs.com',999999999,'headlastlabs.png',0),(46,'2008-06-23 11:52:32','www.headlastlabs.com',999999999,'headlastlabs.png',0),(49,'2016-04-26 18:33:46','Chelsea',100000,'high_score_320x320.png',1);
/*!40000 ALTER TABLE `guitarwars` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-28 20:03:30
