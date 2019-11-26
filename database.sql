-- MariaDB dump 10.17  Distrib 10.4.7-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: blogzone
-- ------------------------------------------------------
-- Server version	10.4.7-MariaDB

CREATE DATABASE IF NOT EXISTS blogzone;
USE blogzone;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_color`
--

DROP TABLE IF EXISTS `tbl_color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_color` (
  `user_id` int(5) NOT NULL,
  `header_bg` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_item` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dashboard_bg` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_color`
--

LOCK TABLES `tbl_color` WRITE;
/*!40000 ALTER TABLE `tbl_color` DISABLE KEYS */;
INSERT INTO `tbl_color` VALUES (1,'#000000','#000000','#000000','#000000','#000000'),(6,NULL,NULL,NULL,NULL,NULL),(7,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_header`
--

DROP TABLE IF EXISTS `tbl_header`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_header` (
  `user_id` int(5) NOT NULL,
  `item1` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item3` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link3` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link0` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_header`
--

LOCK TABLES `tbl_header` WRITE;
/*!40000 ALTER TABLE `tbl_header` DISABLE KEYS */;
INSERT INTO `tbl_header` VALUES (1,'','','','','','',NULL),(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_header` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_image`
--

DROP TABLE IF EXISTS `tbl_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_image` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `uploader` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_filename` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rel_path` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filetype` enum('png','jpg','gif') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_date` date DEFAULT NULL,
  `upload_time` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_image`
--

LOCK TABLES `tbl_image` WRITE;
/*!40000 ALTER TABLE `tbl_image` DISABLE KEYS */;
INSERT INTO `tbl_image` VALUES (1,'flamendless','1690593af8e78fab1d186097a4447c30c73af5fddb7eeb44efdfbab6e9a7aea9','brandon.png','/files/flamendless/','png','2019-11-08','22:50:30');
/*!40000 ALTER TABLE `tbl_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_info`
--

DROP TABLE IF EXISTS `tbl_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_info` (
  `id` int(5) NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` enum('Male','Female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `date_joined` date DEFAULT NULL,
  `time_joined` time DEFAULT NULL,
  `is_first_time` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_info`
--

LOCK TABLES `tbl_info` WRITE;
/*!40000 ALTER TABLE `tbl_info` DISABLE KEYS */;
INSERT INTO `tbl_info` VALUES (1,'Brandon','Blanker','Lim-it','Male','1997-11-02','2019-11-08','22:45:37',1),(6,NULL,NULL,NULL,NULL,NULL,'2019-11-14','00:41:11',NULL),(7,NULL,NULL,NULL,NULL,NULL,'2019-11-14','00:44:38',1);
/*!40000 ALTER TABLE `tbl_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_post`
--

DROP TABLE IF EXISTS `tbl_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_post` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_path` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_post`
--

LOCK TABLES `tbl_post` WRITE;
/*!40000 ALTER TABLE `tbl_post` DISABLE KEYS */;
INSERT INTO `tbl_post` VALUES (1,'flamendless','Hello World','this is a sample post','hello_world.md','/posts/flamendless/',1),(2,'flamendless','Why Java Sucks','Reasons For Hating Java','why_java_sucks.md','/posts/flamendless/',1);
/*!40000 ALTER TABLE `tbl_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_post_info`
--

DROP TABLE IF EXISTS `tbl_post_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_post_info` (
  `id` int(10) NOT NULL,
  `date_created` date DEFAULT NULL,
  `time_created` time DEFAULT NULL,
  `date_published` date DEFAULT NULL,
  `time_published` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_post_info`
--

LOCK TABLES `tbl_post_info` WRITE;
/*!40000 ALTER TABLE `tbl_post_info` DISABLE KEYS */;
INSERT INTO `tbl_post_info` VALUES (1,'2019-11-10','20:01:01','2019-11-10','20:01:01'),(2,'2019-11-10','21:08:07','2019-11-10','21:08:07');
/*!40000 ALTER TABLE `tbl_post_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_preference`
--

DROP TABLE IF EXISTS `tbl_preference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_preference` (
  `user_id` int(5) NOT NULL,
  `img_avatar` int(5) DEFAULT NULL,
  `img_header` int(5) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_preference`
--

LOCK TABLES `tbl_preference` WRITE;
/*!40000 ALTER TABLE `tbl_preference` DISABLE KEYS */;
INSERT INTO `tbl_preference` VALUES (1,1,1),(6,NULL,NULL),(7,NULL,NULL);
/*!40000 ALTER TABLE `tbl_preference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_remember`
--

DROP TABLE IF EXISTS `tbl_remember`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_remember` (
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` char(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identifier` char(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_remember`
--

LOCK TABLES `tbl_remember` WRITE;
/*!40000 ALTER TABLE `tbl_remember` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_remember` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_session`
--

DROP TABLE IF EXISTS `tbl_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_session` (
  `id` int(5) NOT NULL,
  `date_in` date DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_session`
--

LOCK TABLES `tbl_session` WRITE;
/*!40000 ALTER TABLE `tbl_session` DISABLE KEYS */;
INSERT INTO `tbl_session` VALUES (1,'2019-11-10','21:01:26','2019-11-09','23:08:24'),(6,'2019-11-14','00:41:19',NULL,NULL),(7,'2019-11-14','00:44:47',NULL,NULL);
/*!40000 ALTER TABLE `tbl_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'flamendless','$2y$10$WPqtVIcE6niY8ydDW6JEp.nb4nNVQ/YkIocS7COwvzN5dIQFu8DBq','flamendless@gmail.com'),(6,'testaccount','$2y$10$jhrCBx9B1ybubnWFuBtO1uXH43AUBzYnha1k6EU57GsgvQjCE68aO','testaccount@gmail.com'),(7,'testaccount2','$2y$10$9CiCoQ2xNEP4FW2jLyignuMNW6/ihjzVjuqNRfBWVL5CKz6VxEkSy','testaccount2@gmail.com');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-23 17:53:34
