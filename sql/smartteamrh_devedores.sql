-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: smartteamrh
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.37-MariaDB

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
-- Table structure for table `devedores`
--

DROP TABLE IF EXISTS `devedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `devedores` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `sobrenome` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `documento` bigint(14) unsigned DEFAULT NULL,
  `nascimento` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devedores`
--

LOCK TABLES `devedores` WRITE;
/*!40000 ALTER TABLE `devedores` DISABLE KEYS */;
INSERT INTO `devedores` VALUES (8,'GUILHERME','LUCAS BARBOSA NOBRE MADRUGA','1127971000','11988696133',38345281000197,'2012-11-04'),(9,'THAIS ','BARBOSA NOBRE MADRUGA','1125149380','11976471056',34763132806,'1988-10-14'),(10,'MARIANA','BARBOSA NOBRE MADRUGA','1127971051','11988696133',61182051000176,'2015-08-16'),(11,'LUCAS','NOBRE MADRUGA','1127971000','11988696133',34763132806,'1986-02-24');
/*!40000 ALTER TABLE `devedores` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-01 20:08:01
