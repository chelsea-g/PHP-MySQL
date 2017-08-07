-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: productsdb
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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` double NOT NULL,
  `shipper` varchar(5) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `isRecyclable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Apple','Delicious and shiny',0.5,NULL,NULL,NULL),(9,'Lemon','Yellow and sour',1,NULL,NULL,NULL),(10,'Lemon','Yellow and sour',1,NULL,NULL,NULL),(11,'Lemon','Yellow and sour',1,NULL,NULL,NULL),(12,'Lemon','Yellow and sour',1,NULL,NULL,NULL),(13,'Lemon','Yellow and sour',1,NULL,NULL,NULL),(14,'Lemon','Yellow and sour',1,NULL,NULL,NULL),(15,'Lemon','Yellow and sour',1,NULL,NULL,NULL),(16,'Bowling Ball','Heavy thing that rolls',60,NULL,NULL,NULL),(17,'Bowling Ball','Heavy thing that rolls',60,NULL,NULL,NULL),(18,'Bowling Ball','Heavy thing that rolls',60,NULL,NULL,NULL),(19,'Bowling Ball','Heavy thing that rolls',60,NULL,NULL,NULL),(20,'Bowling Ball','Heavy thing that rolls',60,NULL,NULL,NULL),(21,'Bowling Ball','Heavy thing that rolls',60,NULL,NULL,NULL),(22,'Bowling Ball','Heavy thing that rolls',60,NULL,NULL,NULL),(23,'Bowling Ball','Heavy thing that rolls',60,NULL,NULL,NULL),(24,'Bowling Ball','Heavy thing that rolls',60,NULL,NULL,NULL),(25,'Bowling Ball','Heavy thing that rolls',60,NULL,NULL,NULL),(26,'Bowling Ball','Heavy thing that rolls',60,NULL,NULL,NULL),(27,'Bowling Ball','Heavy thing that rolls',60,NULL,NULL,NULL),(28,'T.V.','Big screen television',2000,NULL,NULL,NULL),(29,'T.V.','Big screen television',2000,NULL,NULL,NULL),(30,'Hammer','Hit things with it',20,NULL,NULL,NULL),(31,'Hammer','Hit things with it',20,NULL,NULL,NULL),(32,'Hammer','Hit things with it',20,NULL,NULL,NULL),(33,'Hammer','Hit things with it',20,NULL,NULL,NULL),(34,'T.V.','Big screen television',2000,NULL,NULL,NULL),(35,'T.V.','Big screen television',2000,NULL,NULL,NULL),(36,'Hammer','Hit things with it',20,NULL,NULL,NULL),(37,'Hammer','Hit things with it',20,NULL,NULL,NULL),(38,'Apple','Delicious and shiny',0.5,NULL,NULL,NULL),(39,'Hammer','Hit things with it',20,NULL,NULL,NULL),(40,'Hammer','Hit things with it',20,'FedEx',4,NULL),(41,'Hammer','Hit things with it',20,'FedEx',4,NULL),(42,'Widget','Yay, widgets!',0.99,NULL,NULL,NULL),(43,'Ban Hammer','NOOBs fear it, all respect it. Demolish you internet trolls.',500,'FedEx',50,NULL),(44,'Bitcoin Mining Machine','Make money!',39000,NULL,NULL,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-07 21:16:29
