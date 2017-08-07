-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: exercisedb
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
-- Table structure for table `exercise_log`
--

DROP TABLE IF EXISTS `exercise_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(30) NOT NULL,
  `time_in_minutes` int(4) DEFAULT NULL,
  `heart_rate` int(3) NOT NULL,
  `calories_burned` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise_log`
--

LOCK TABLES `exercise_log` WRITE;
/*!40000 ALTER TABLE `exercise_log` DISABLE KEYS */;
INSERT INTO `exercise_log` VALUES (3,2,'2016-02-01','Swimming',90,200,0.00),(4,2,'2016-02-02','Swimming',45,180,0.00),(5,2,'2016-02-03','Swimming',65,195,0.00),(6,2,'2016-02-04','Swimming',35,200,0.00),(11,2,'2016-03-09','Running',30,200,0.00),(13,2,'2016-03-01','Running',10,180,0.00),(14,2,'2016-03-01','Running',10,180,0.00),(15,2,'2016-03-08','Walking',30,170,0.00),(16,2,'2016-03-01','Running',30,200,0.00),(17,2,'2016-03-02','Running',30,200,0.00),(18,2,'2016-03-02','Running',30,200,0.00),(22,2,'2016-03-02','Running',20,190,0.00),(23,2,'2016-03-02','Running',20,190,0.00),(25,2,'2016-03-01','Running',20,190,0.00),(26,2,'2016-03-01','Running',20,190,0.00),(27,2,'2016-03-01','Running',20,190,0.00),(29,1,'2016-03-09','Running',20,200,410.91),(32,1,'2016-02-29','Walking',67,112,432.62),(37,1,'2016-03-09','Running',30,200,644.26),(38,1,'2016-03-09','Running',30,200,644.26),(39,1,'2016-03-02','Running',30,200,644.26),(40,1,'2016-03-02','Running',30,200,645.71),(41,1,'2016-03-08','Running',30,200,645.71),(42,1,'2016-03-08','Running',30,200,644.26),(43,1,'2016-03-08','Running',30,200,644.26),(44,1,'2016-03-08','Running',30,200,644.26),(45,1,'2016-03-02','Running',30,200,644.26),(46,1,'2016-03-02','Running',30,200,644.26),(47,1,'2016-03-09','Running',30,200,644.26),(48,1,'2016-03-08','Running',30,200,644.26),(49,1,'2016-03-08','Running',30,200,644.26),(50,1,'2016-03-08','Running',30,200,644.26),(51,1,'2016-03-01','Running',30,180,553.79),(52,1,'2016-03-01','Running',30,180,383.06),(56,1,'2016-03-08','Running',20,180,369.19),(57,3,'2016-03-29','Jump Roping',20,190,278.08),(59,3,'2016-03-14','Swimming',60,185,802.16),(61,2,'2016-03-29','Jump Roping',60,145,839.76),(62,1,'2016-03-29','Jump Roping',30,145,395.46);
/*!40000 ALTER TABLE `exercise_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercise_user`
--

DROP TABLE IF EXISTS `exercise_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `sex` char(1) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise_user`
--

LOCK TABLES `exercise_user` WRITE;
/*!40000 ALTER TABLE `exercise_user` DISABLE KEYS */;
INSERT INTO `exercise_user` VALUES (1,'SwollSeungri','d53c87bed6990a0ee8ce462f93d540c0c28f31fe','Seungri','Fisher','M','1989-09-15',150,'tumblr_nuos85uW731ufgjjfo1_500.jpg','2016-03-29 14:42:16'),(2,'MuscleMel','c516faa085d41bb9e6c8b0afdd8979341d56db2a','Mel','Fisher','M','1990-09-22',190,'mel.png','2016-03-29 21:13:24'),(3,'Chelsea','834bbd1c7ec06f6073dcb2c3d3259253c06d727d','Chelsea','Greger','F','1994-01-19',140,NULL,'2016-03-29 20:52:15');
/*!40000 ALTER TABLE `exercise_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-29 21:22:57
