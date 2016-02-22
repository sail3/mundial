-- MySQL dump 10.13  Distrib 5.6.24, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: MuOnline_Web
-- ------------------------------------------------------
-- Server version	5.5.5-10.0.21-MariaDB

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
-- Table structure for table `Category`
--

DROP TABLE IF EXISTS `Category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Category` (
  `idCategory` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `enable` char(1) DEFAULT '1',
  PRIMARY KEY (`idCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Category`
--

LOCK TABLES `Category` WRITE;
/*!40000 ALTER TABLE `Category` DISABLE KEYS */;
INSERT INTO `Category` VALUES (4,'123123123','<p>asdfasdf123123 1231231 123123123&nbsp;</p>','1'),(7,'cojsjajsdfjajdf','<p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas</strong> quis mauris se','0'),(9,'Inventarte Team','<p>A class that extends the&nbsp;AbstractType&nbsp;and implements the two abstract methods needed to','1');
/*!40000 ALTER TABLE `Category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Contenido`
--

DROP TABLE IF EXISTS `Contenido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contenido` (
  `idContenido` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `content` longtext,
  `publish` datetime NOT NULL,
  `enable` char(1) DEFAULT '1',
  `idCategory` int(11) NOT NULL,
  PRIMARY KEY (`idContenido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contenido`
--

LOCK TABLES `Contenido` WRITE;
/*!40000 ALTER TABLE `Contenido` DISABLE KEYS */;
/*!40000 ALTER TABLE `Contenido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MEMB_INFO`
--

DROP TABLE IF EXISTS `MEMB_INFO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MEMB_INFO` (
  `memb_guid` int(11) NOT NULL AUTO_INCREMENT,
  `memb___id` varchar(10) NOT NULL,
  `memb__pwd` varchar(20) NOT NULL,
  `memb_name` varchar(10) NOT NULL,
  `sno__numb` char(13) NOT NULL,
  `post_code` char(6) DEFAULT NULL,
  `addr_info` varchar(50) DEFAULT NULL,
  `addr_deta` varchar(50) DEFAULT NULL,
  `tel__numb` varchar(20) DEFAULT NULL,
  `phon_numb` varchar(15) DEFAULT NULL,
  `mail_addr` varchar(50) DEFAULT NULL,
  `fpas_ques` varchar(50) DEFAULT NULL,
  `fpas_answ` varchar(50) DEFAULT NULL,
  `job__code` char(2) DEFAULT NULL,
  `appl_days` datetime DEFAULT NULL,
  `modi_days` datetime DEFAULT NULL,
  `out__days` datetime DEFAULT NULL,
  `true_days` datetime DEFAULT NULL,
  `mail_chek` char(1) DEFAULT NULL,
  `bloc_code` char(1) NOT NULL,
  `ctl1_code` char(1) NOT NULL,
  `cspoints` int(11) DEFAULT NULL,
  `VipType` int(11) DEFAULT NULL,
  `VipStart` datetime DEFAULT NULL,
  `VipDays` datetime DEFAULT NULL,
  `JoinDate` varchar(23) DEFAULT NULL,
  PRIMARY KEY (`memb_guid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MEMB_INFO`
--

LOCK TABLES `MEMB_INFO` WRITE;
/*!40000 ALTER TABLE `MEMB_INFO` DISABLE KEYS */;
/*!40000 ALTER TABLE `MEMB_INFO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'MuOnline_Web'
--

--
-- Dumping routines for database 'MuOnline_Web'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-22 17:30:44
