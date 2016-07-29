-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: pset7
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `transcation` varchar(50) NOT NULL,
  `symbol` varchar(50) NOT NULL,
  `shares` int(20) NOT NULL DEFAULT '0',
  `price` decimal(65,4) NOT NULL DEFAULT '0.0000',
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (1,9,'BUY','YHOO',10,36.2400,'2016-06-24 20:28:15'),(2,9,'BUY','GOOG',2,675.2200,'2016-06-24 20:28:24'),(3,9,'SELL','GOOG',2,675.2200,'2016-06-24 20:28:37'),(4,9,'BUY','FREE',10,1.1500,'2016-06-24 20:30:16'),(5,9,'BUY','GOOG',20,675.2200,'2016-06-24 21:12:59'),(6,9,'SELL','FREE',10,1.1500,'2016-06-25 09:38:00'),(7,9,'SELL','YHOO',10,36.2400,'2016-06-25 09:44:47'),(8,9,'SELL','GOOG',20,675.2200,'2016-06-25 09:45:57'),(9,9,'BUY','GOOG',5,675.2200,'2016-06-25 10:11:01'),(10,9,'BUY','FREE',1,1.1500,'2016-06-25 10:28:42'),(11,9,'BUY','FREE',1,1.1500,'2016-06-25 10:39:33'),(12,9,'BUY','GOOG',4,675.2200,'2016-06-25 10:42:46'),(13,9,'BUY','GOOG',2,675.2200,'2016-06-25 10:43:17'),(14,9,'BUY','GOOG',2,675.2200,'2016-06-25 10:47:54'),(15,9,'BUY','GOOG',2,675.2200,'2016-06-25 10:53:45'),(16,9,'BUY','GOOG',2,675.2200,'2016-06-25 10:57:21'),(17,9,'BUY','GOOG',2,675.2200,'2016-06-25 10:58:59'),(18,9,'BUY','GOOG',4,675.2200,'2016-06-25 11:01:42'),(19,9,'BUY','GOOG',3,675.2200,'2016-06-25 11:05:11'),(20,9,'BUY','GOOG',1,675.2200,'2016-06-25 11:14:57'),(21,9,'BUY','GOOG',1,675.2200,'2016-06-25 11:17:37'),(22,9,'BUY','GOOG',2,675.2200,'2016-06-25 11:19:11'),(23,9,'BUY','GOOG',1,675.2200,'2016-06-25 11:23:28'),(24,9,'BUY','GOOG',1,675.2200,'2016-06-25 11:26:53'),(25,9,'BUY','GOOG',2,675.2200,'2016-06-25 11:31:27'),(26,9,'BUY','GOOG',1,675.2200,'2016-06-25 11:32:56'),(27,9,'BUY','GOOG',1,675.2200,'2016-06-25 11:33:39'),(28,9,'BUY','GOOG',1,675.2200,'2016-06-25 11:37:05'),(29,9,'BUY','GOOG',1,675.2200,'2016-06-25 11:37:37'),(30,9,'BUY','GOOG',1,675.2200,'2016-06-25 11:37:56'),(31,9,'BUY','GOOG',1,675.2200,'2016-06-25 11:41:52'),(32,9,'BUY','GOOG',2,675.2200,'2016-06-25 11:44:00'),(33,9,'BUY','FREE',2,1.1500,'2016-06-25 11:46:56'),(34,9,'BUY','GOOG',1,675.2200,'2016-06-25 12:05:06'),(35,9,'BUY','GOOG',2,675.2200,'2016-06-25 12:11:26'),(36,9,'SELL','FREE',4,1.1500,'2016-06-25 12:15:08'),(37,9,'BUY','FREE',4,1.1500,'2016-06-25 12:16:04'),(38,9,'SELL','FREE',4,1.1500,'2016-06-25 12:17:42'),(39,9,'BUY','YHOO',4,36.2400,'2016-06-25 12:20:18'),(40,9,'SELL','YHOO',4,36.2400,'2016-06-25 12:21:51'),(41,28,'BUY','GOOG',2,675.2200,'2016-06-25 12:35:14'),(42,28,'SELL','GOOG',2,675.2200,'2016-06-25 12:35:46'),(43,28,'BUY','FREE',10,1.1500,'2016-06-25 12:37:03'),(44,28,'SELL','FREE',10,1.1500,'2016-06-25 12:37:20'),(45,29,'BUY','GOOG',5,675.2200,'2016-06-25 12:40:14'),(46,29,'SELL','GOOG',5,675.2200,'2016-06-25 12:40:34'),(47,29,'BUY','FREE',10,1.1500,'2016-06-25 12:42:59'),(48,29,'SELL','FREE',10,1.1500,'2016-06-25 12:43:19'),(49,29,'BUY','GOOG',4,675.2200,'2016-06-25 12:52:28'),(50,29,'SELL','GOOG',4,675.2200,'2016-06-25 12:52:53'),(51,29,'BUY','YHOO',5,36.2400,'2016-06-25 15:54:12'),(52,29,'BUY','GOOG',2,675.2200,'2016-06-25 15:54:24'),(53,29,'BUY','FREE',5,1.1500,'2016-06-25 15:55:18'),(54,29,'SELL','GOOG',2,675.2200,'2016-06-25 15:56:26');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolios`
--

DROP TABLE IF EXISTS `portfolios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolios` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `symbol` varchar(25) NOT NULL,
  `shares` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_2` (`user_id`,`symbol`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `portfolios_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolios`
--

LOCK TABLES `portfolios` WRITE;
/*!40000 ALTER TABLE `portfolios` DISABLE KEYS */;
INSERT INTO `portfolios` VALUES (7,5,'ALNSE.PA',5),(48,9,'GOOG',45),(82,29,'YHOO',5),(84,29,'FREE',5);
/*!40000 ALTER TABLE `portfolios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `cash` decimal(65,4) unsigned NOT NULL DEFAULT '0.0000',
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'andi','$2y$10$c.e4DK7pVyLT.stmHxgAleWq4yViMmkwKz3x8XCo4b/u3r8g5OTnS',10000.0000,'abc@exampl.com'),(2,'caesar','$2y$10$0p2dlmu6HnhzEMf9UaUIfuaQP7tFVDMxgFcVs0irhGqhOxt6hJFaa',10000.0000,'abc@exampl.com'),(3,'eli','$2y$10$COO6EnTVrCPCEddZyWeEJeH9qPCwPkCS0jJpusNiru.XpRN6Jf7HW',10000.0000,'abc@exampl.com'),(4,'hdan','$2y$10$o9a4ZoHqVkVHSno6j.k34.wC.qzgeQTBHiwa3rpnLq7j2PlPJHo1G',10000.0000,'abc@exampl.com'),(5,'jason','$2y$10$ci2zwcWLJmSSqyhCnHKUF.AjoysFMvlIb1w4zfmCS7/WaOrmBnLNe',10000.0000,'abc@exampl.com'),(6,'john','$2y$10$dy.LVhWgoxIQHAgfCStWietGdJCPjnNrxKNRs5twGcMrQvAPPIxSy',10000.0000,'abc@exampl.com'),(7,'levatich','$2y$10$fBfk7L/QFiplffZdo6etM.096pt4Oyz2imLSp5s8HUAykdLXaz6MK',10000.0000,'abc@exampl.com'),(8,'rob','$2y$10$3pRWcBbGdAdzdDiVVybKSeFq6C50g80zyPRAxcsh2t5UnwAkG.I.2',10000.0000,'abc@exampl.com'),(9,'skroob','$2y$10$395b7wODm.o2N7W5UZSXXuXwrC0OtFB17w4VjPnCIn/nvv9e4XUQK',2720.6950,'pankaj17dharia@gmail.com'),(10,'zamyla','$2y$10$UOaRF0LGOaeHG4oaEkfO4O7vfI34B1W23WqHr9zCpXL68hfQsS3/e',10000.0000,'abc@exampl.com'),(27,'pankaj','$2y$10$mQwLPbEpeU/BqFfjoXu2EeCFEe5rkeV/tfcdfrvdub/IFZ.AMGZ5C',10000.0000,'abc@exampl.com'),(28,'pratibha','$2y$10$eeBmxKY7JVWRS7mxzGmBLOOcaCQSSFDfcakhr4f.b5RJzlssqFsES',10000.0000,'abc@example.com'),(29,'prat','$2y$10$JAGKFsGKhmyl31U30AfR6eRlvwbhAKI1UPTmD1YEzJ6nc9o3dTPia',9813.0500,'pankaj17dharia@gmail.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-25 16:07:39
