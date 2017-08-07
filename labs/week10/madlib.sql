-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: madlib
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
-- Table structure for table `word_choices`
--

DROP TABLE IF EXISTS `word_choices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `word_choices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noun` varchar(20) DEFAULT NULL,
  `verb` varchar(20) DEFAULT NULL,
  `adjective` varchar(20) DEFAULT NULL,
  `adverb` varchar(20) DEFAULT NULL,
  `story` varchar(300) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `word_choices`
--

LOCK TABLES `word_choices` WRITE;
/*!40000 ALTER TABLE `word_choices` DISABLE KEYS */;
INSERT INTO `word_choices` VALUES (35,'Chelsea','sleep','fluffy','loudly','The fluffy Chelsea likes to  sleep loudly at the beach!','2016-02-18 21:43:16'),(37,'puppy','play','little','ferociously','The little puppy likes to  play ferociously at the beach!','2016-02-18 22:02:04'),(38,'sponge','bring it around town','yellow','happily','The yellow sponge likes to  bring it around town happily at the beach!','2016-02-18 22:02:54'),(39,'duck','quack','ugly','annoyingly','The ugly duck likes to  quack annoyingly at the beach!','2016-02-18 22:08:04'),(40,'penguin','drink','serious','seriously','The serious penguin likes to  drink seriously at the beach!','2016-02-19 03:33:49'),(63,'Dog','run','cute','happily','The cute Dog likes to  run happily at the beach!','2016-03-30 00:52:30'),(77,'cow','moo','fat','hauntingly','The fat cow likes to  moo hauntingly at the beach!','2016-03-30 17:40:16'),(78,'human','hum','happy','hatefully','The happy human likes to  hum hatefully at the beach!','2016-03-30 17:48:20'),(80,'robot','beep and boop','evil','melodically','The evil robot likes to  beep and boop melodically at the beach!','2016-03-31 20:11:52'),(81,'robot','beep and boop','evil','melodically','The evil robot likes to  beep and boop melodically at the beach!','2016-03-31 20:13:08');
/*!40000 ALTER TABLE `word_choices` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-02  4:18:03
