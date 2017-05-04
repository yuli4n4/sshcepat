-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: webapi
-- ------------------------------------------------------
-- Server version	5.5.54-0+deb8u1

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
-- Table structure for table `continent`
--

DROP TABLE IF EXISTS `continent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `continent` (
  `Cid` varchar(20) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Cid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `continent`
--

LOCK TABLES `continent` WRITE;
/*!40000 ALTER TABLE `continent` DISABLE KEYS */;
INSERT INTO `continent` VALUES ('Asia','Asia'),('North-America','North America'),('Europe','Europe'),('South-America','South America'),('Africa','Africa'),('Oceania','Oceania');
/*!40000 ALTER TABLE `continent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Cid` varchar(20) DEFAULT NULL,
  `Country` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'Asia','Singapore'),(2,'Asia','Indonesia'),(3,'Asia','Japan'),(4,'Asia','Hongkong'),(5,'Europe','Netherlands'),(6,'Europe','Germani'),(7,'Europe','France'),(8,'Europe','Luxembourg'),(9,'North-America','NY-USA'),(10,'North-America','Canada'),(11,'North-America','LA-USA'),(12,'South-America','NY-USA'),(14,'Africa','Johanesburg'),(15,'Oceania','Australia'),(16,'North-America','Austria');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `server`
--

DROP TABLE IF EXISTS `server`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `server` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `HostName` varchar(23) NOT NULL,
  `RootPasswd` varchar(25) NOT NULL,
  `MaxUser` int(11) NOT NULL,
  `ServerName` varchar(12) DEFAULT NULL,
  `Location` varchar(20) DEFAULT NULL,
  `OpenSSH` varchar(20) NOT NULL DEFAULT '22',
  `Dropbear` varchar(20) NOT NULL DEFAULT '443',
  `Cid` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `server`
--

LOCK TABLES `server` WRITE;
/*!40000 ALTER TABLE `server` DISABLE KEYS */;
INSERT INTO `server` VALUES (1,'128.99.117.44','kampret123',5,'S_DO-01','Singapore','22','443','Asia'),(2,'128.99.117.45','pNLKcDG',10,'S_DO-02','Indonesia','22','443','Asia'),(3,'128.99.117.47','okwelkmN',10,'S_DO-03','Japan','22','443','Asia'),(4,'128.99.117.46','okwelkmnK',10,'S_DO-04','Japan','22','443','Asia'),(6,'122.33.44.454','Klas',34,'SGDO-04','Singapore','22','443','Asia'),(7,'122.33.44.454','Klas',34,'SGDO-04','Singapore','22','443','Asia'),(8,'124.33.44.454','Klas',34,'SGDO-04','Singapore','22','443','Asia'),(9,'142.33.44.454','Klas',34,'SGDO-04','Singapore','22','443','Asia'),(10,'122.33.444.454','Klas',34,'SGDO-54','Singapore','22','443','Asia'),(11,'122.33.44.154','Klas',34,'SGDO-04','Singapore','22','443','Asia'),(12,'122.33.464.454','Klas',34,'SGDO-04','Singapore','22','443','Asia'),(13,'122.33.445.454','Klas',34,'SGDO-04','Singapore','22','443','Asia');
/*!40000 ALTER TABLE `server` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-04 10:35:15
