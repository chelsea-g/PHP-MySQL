-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: gwdb
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
  `approved` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guitarwars`
--

LOCK TABLES `guitarwars` WRITE;
/*!40000 ALTER TABLE `guitarwars` DISABLE KEYS */;
INSERT INTO `guitarwars` VALUES (17,'2016-02-25 20:13:10','Belita',282470,'belitasscore.gif',1),(18,'2016-02-25 20:13:39','Jacob',389740,'jacobsscore.gif',1),(19,'2016-02-25 20:13:55','Jean Paul',243260,'jeanpaulsscore.gif',0),(20,'2016-02-25 20:14:09','Kenny',64930,'kennysscore.gif',1),(21,'2016-02-25 20:14:27','Nevil',98430,'nevilsscore.gif',0),(22,'2016-02-25 20:14:47','Paco',127650,'pacosscore.gif',0),(23,'2016-02-25 20:15:02','Phiz',186580,'phizsscore.gif',1),(25,'2016-02-25 21:04:29','Cow',389739,'images.jpg',1);
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

-- Dump completed on 2016-02-25 21:09:32
