-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ballr
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.12.10.1

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` smallint(6) NOT NULL,
  `image1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop6` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop7` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop8` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop9` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop10` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Suits','Indian Suits',0,NULL,NULL,NULL,'Color','Fabric','Fit','Design','Style','Neck','Sleeve',NULL,NULL,NULL,'2013-08-03 18:30:00','2013-08-03 18:30:00'),(2,'Sarees','Indian Saree',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-08-03 18:30:00','2013-08-03 18:30:00');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2013_07_28_141405_create_vendors_table',1),('2013_07_30_180219_create_products_table',2),('2013_07_30_180953_create_categories_table',3),('2013_08_04_054841_remove_price_column_from_categories',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` smallint(6) NOT NULL,
  `vendor_id` smallint(6) NOT NULL,
  `image1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `minunits` int(11) DEFAULT NULL,
  `maxunits` int(11) DEFAULT NULL,
  `prop1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop6` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop7` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop8` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop9` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop10` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` float(8,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,'Shobhit Suit','Nice red suit',1,15,'6qO6VKQU62e4OiuteiZS.jpeg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-08-03 18:30:00','2013-08-03 18:30:00'),(3,'Mayank Suit','Nice blue suit',1,14,'6qO6VKQU62e4OiuteiZS.jpeg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-08-03 18:30:00','2013-08-03 18:30:00'),(4,'Shobhit Saree','Nice red saree',2,15,'6qO6VKQU62e4OiuteiZS.jpeg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-08-03 18:30:00','2013-08-03 18:30:00'),(5,'Mayank Saree','Nice blue saree',2,14,'6qO6VKQU62e4OiuteiZS.jpeg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-08-03 18:30:00','2013-08-03 18:30:00'),(6,'Mayank suit2','Firefox blue!!!',1,0,'RGIVW1lALYnWKdpzCBQv.png','',NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-08-04 09:18:18','2013-08-04 09:18:18'),(7,'Mayank Suit2','',1,0,'U23Pm0kaSRP3qtJNv9eq.png','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-08-05 03:55:43','2013-08-05 03:55:43'),(8,'Mayank saree 3','',2,14,'tXV9KMra6p2a2SME7i6f.png','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-08-05 04:04:29','2013-08-05 04:09:54'),(9,'Mayank Suit 4','',1,14,'AErdrBdFwuAEAN5HyoTS.png','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-08-05 04:08:31','2013-08-05 04:08:31'),(10,'Mayank Saree 2','',2,14,'icfeptvqPLtKoay8x25z.png','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-08-05 04:14:54','2013-08-05 04:14:54'),(11,'Mumma\'s suit','Red maheshwari suit hahaha',1,14,'Vj6XAXl3gtNgv5leggMy.jpg','',NULL,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-08-11 20:30:09','2013-08-11 20:30:09'),(12,'ruchis saree','Black saree for bhoot',2,14,'ScM32lWqDEYbCyt8K25E.jpg','',NULL,30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-08-12 04:10:17','2013-08-12 04:10:17'),(13,'sexy saree','sexy sexy saree',2,17,'JEyTEJqMHun7s0CNhk7U.jpg','',NULL,20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-08-13 02:35:03','2013-08-13 02:35:03'),(14,'Mayank Suit 4','Transmission yo yo',1,15,'fkqOLBirp08xdgpARXB6.png','',NULL,5,100,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2013-08-13 16:35:37','2013-08-13 16:35:37');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(255) NOT NULL,
  `server_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (2,'Andhra Pradesh','2013-02-27 03:50:16'),(3,'Arunachal Pradesh','2013-02-27 03:50:16'),(4,'Assam','2013-02-27 03:50:16'),(5,'Bihar','2013-02-27 03:50:17'),(6,'Chhattisgarh','2013-02-27 03:50:17'),(7,'Goa','2013-02-27 03:50:17'),(8,'Gujarat','2013-02-27 03:50:17'),(9,'Haryana','2013-02-27 03:50:17'),(10,'Himachal Pradesh','2013-02-27 03:50:17'),(11,'Jammu and Kashmir','2013-02-27 03:50:17'),(12,'Jharkhand','2013-02-27 03:50:17'),(13,'Karnataka','2013-02-27 03:50:17'),(14,'Kerala','2013-02-27 03:50:17'),(15,'Madhya Pradesh','2013-02-27 03:50:17'),(16,'Maharashtra','2013-02-27 03:50:17'),(17,'Manipur','2013-02-27 03:50:17'),(18,'Meghalaya','2013-02-27 03:50:17'),(19,'Mizoram','2013-02-27 03:50:17'),(20,'Nagaland','2013-02-27 03:50:17'),(21,'Punjab','2013-02-27 03:50:17'),(22,'Rajasthan','2013-02-27 03:50:17'),(23,'Sikkim','2013-02-27 03:50:17'),(24,'Tamil Nadu','2013-02-27 03:50:17'),(25,'Tripura','2013-02-27 03:50:18'),(26,'Uttar Pradesh','2013-02-27 03:50:18'),(27,'Uttarakhand','2013-02-27 03:50:18'),(28,'West Bengal','2013-02-27 03:50:18');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` smallint(6) NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendors`
--

LOCK TABLES `vendors` WRITE;
/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;
INSERT INTO `vendors` VALUES (6,'Admin','admin@ballr.mint','$2y$08$ye21KgT8G0c/T37w5zq/xuM2uzKuZt5Bc3E3wv3HIF1UJS/XZjVIa','<none>',26,'<none>','','2013-08-01 09:00:56','2013-08-01 09:00:56'),(14,'Mayank Mandava','mayankmandava@gmail.com','$2y$08$Znlgi37pKd2PAMu72WiMre9FyggoPYITBURPttk5/QUGD6a86JNzq','Mumbai',16,'CIB Centre, Level 2, B7, Nirlon Knowledge Park','6qO6VKQU62e4OiuteiZS.jpeg','2013-08-02 22:01:31','2013-08-02 22:01:31'),(15,'Shobhit Srivastava','mayankmandava2@gmail.com','$2y$08$9ojqCACpCNT4yCNS0gCG/eQSSKco32Tg2DyCH4dEo6yDI7v40tCUS','Mumbai',16,'3 goregaon','42cb608b5bbf5c5ad992398cfa2cb4448a43d052.png','2013-08-04 04:21:48','2013-08-04 06:24:10'),(16,'Casa','casa@gmail.com','$2y$08$NZZRfI2YRc4pbIh2TQbam.GE/TwAgNqOGfqGa9SNr91Nv2xi5W1M2','new delhi',16,'casa ka ghar','c94794d558109e688a225e98506a6fcac9053932.jpeg','2013-08-12 04:12:02','2013-08-12 04:12:02'),(17,'prashant gautam','prashant@gmail.com','$2y$08$W3qhYKxRe8WRY/fLUKQZs.zxCTSPTtcm5S6bVqKsywwZquFagWTUS','gurgaon',9,'aasdf','','2013-08-13 02:34:27','2013-08-13 02:34:27');
/*!40000 ALTER TABLE `vendors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-08-14 12:20:00
