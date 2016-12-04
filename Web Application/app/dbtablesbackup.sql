-- MySQL dump 10.13  Distrib 5.5.52, for Linux (x86_64)
--
-- Host: roundcube.c2amfvktfbda.us-east-1.rds.amazonaws.com    Database: mp1-db
-- ------------------------------------------------------
-- Server version	5.6.27-log

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
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `s3rawurl` varchar(255) NOT NULL,
  `s3finishedurl` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `issubscribed` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,3,'demo@gmail.com','9433456567','','img/2.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/img/2.jpg',1,1),(2,1,'admin@gmail.com','1234567890','','img/square-outline_icon-icons.com_73150.png','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/img/square-outline_icon-icons.com_73150.png',1,1),(3,3,'demo@gmail.com','9433456567','','img/icon.png','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/img/icon.png',1,1),(4,1,'admin@gmail.com','1234567890','','img/survey.png','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/img/survey.png',1,1),(5,3,'','','','5843b04b6c6a2.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843b04b6c6a2.jpg',1,1),(6,1,'','','','5843b7b033ef2.png','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843b7b033ef2.png',1,1),(7,3,'','','','5843e472db776.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843e472db776.jpg',1,1),(8,3,'','','','5843e501cfa9d.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843e501cfa9d.jpg',1,1),(9,3,'','','','5843e58d5dac6.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843e58d5dac6.jpg',1,1),(10,3,'','','','5843e5b814d79.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843e5b814d79.jpg',1,1),(11,3,'','','','5843e66c689cc.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843e66c689cc.jpg',1,1),(12,3,'','','','5843e70a95ebb.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843e70a95ebb.jpg',1,1),(13,3,'','','','5843e7a5097ac.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843e7a5097ac.jpg',1,1),(14,3,'','','','5843f186869bc.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843f186869bc.jpg',1,1),(15,3,'','','','5843f1a3e12bb.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843f1a3e12bb.jpg',1,1),(16,3,'','','','5843f272556dc.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843f272556dc.jpg',1,1),(17,3,'','','','5843f290da7c9.png','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843f290da7c9.png',1,1),(18,3,'','','','5843f2a0b8073.png','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843f2a0b8073.png',1,1),(19,3,'','','','5843f35369508.png','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843f35369508.png',1,1),(20,3,'','','','5843f3df0958d.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843f3df0958d.jpg',1,1),(21,3,'','','','5843f42a34257.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843f42a34257.jpg',1,1),(22,3,'','','','5843f45ba6ec6.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843f45ba6ec6.jpg',1,1),(23,3,'','','','5843f4ca9f300.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843f4ca9f300.jpg',1,1),(24,3,'','','','5843f4deb2b3a.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843f4deb2b3a.jpg',1,1),(25,3,'','','','5843f4f0be66b.png','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843f4f0be66b.png',1,1),(26,3,'','','','5843f50430e02.png','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843f50430e02.png',1,1),(27,3,'','','','5843f517529b4.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843f517529b4.jpg',1,1),(28,3,'','','','5843f5240eb74.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843f5240eb74.jpg',1,1),(29,3,'','','','5843f54357b78.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843f54357b78.jpg',1,1),(30,3,'','','','5843f5b63fe99.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843f5b63fe99.jpg',1,1),(31,3,'','','','5843f5c92248a.jpg','http://52.1.166.84/projectdemo/mlaveti/Web%20Application/app/images/5843f5c92248a.jpg',1,1);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phoneno` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'admin','admin@gmail.com','1234567890','admin$123','admin'),(3,'demo','demo@gmail.com','9433456567','demo123','user'),(4,'test','test@gmail.com','3435454566','test123','user'),(5,'testone','testone@gmail.com','565656565656','12345','user'),(6,'mlaveti','mlaveti@hawk.iit.edu','3122822660','cloud999','user'),(7,'asdfg','asdf@gmail.com','1234667896','asdf','user'),(8,'demo2','demo2@gmail.com','3445564675','demo@2','user');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-04 11:05:22
