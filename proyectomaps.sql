-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: proyectomaps
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `aire`
--

DROP TABLE IF EXISTS `aire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `park_id` varchar(255) NOT NULL,
  `calidad` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aire`
--

LOCK TABLES `aire` WRITE;
/*!40000 ALTER TABLE `aire` DISABLE KEYS */;
INSERT INTO `aire` VALUES (1,'1',40),(2,'2',58),(3,'3',90),(4,'4',110),(5,'5',33),(6,'6',70),(7,'7',84),(8,'8',34),(9,'9',43),(10,'10',76),(11,'11',56),(12,'12',64);
/*!40000 ALTER TABLE `aire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parqueaderos`
--

DROP TABLE IF EXISTS `parqueaderos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parqueaderos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `latitud` varchar(255) NOT NULL,
  `longitud` varchar(255) NOT NULL,
  `coordenadas` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parqueaderos`
--

LOCK TABLES `parqueaderos` WRITE;
/*!40000 ALTER TABLE `parqueaderos` DISABLE KEYS */;
INSERT INTO `parqueaderos` VALUES (1,'Calle 3 con 7','2.4435685942232857','-76.60684630088113','\0\0\0\0\0\0\0???m?@??ݑ?&S?','p1.png'),(2,'Calle 3 con 8','2.4439334763223046','-76.60783145935761','\0\0\0\0\0\0\0*;??,?@?????&S?','p2.png'),(3,'Parqueadero JR','2.441634883517582','-76.60888704309522','\0\0\0\0\0\0\0?ث?w?@VC\\?&S?','p3.png'),(4,'Calle 7 con 7','2.4401019328985245','-76.60773720969428','\0\0\0\0\0\0\0???)T?@??*?&S?','p4.png'),(5,'Parqueadero Acueducto','2.4426353683514623','-76.60385503000298','\0\0\0\0\0\0\0??xi??@?X???&S?','p5.png'),(6,'Parqueadero Casa Caldas','2.4427209691524077','-76.60421893194433','\0\0\0\0\0\0\0?\Z?J??@?Ⅻ&S?','p6.png'),(7,'Parqueadero Calle 3 con 6','2.4426980900059267','-76.605461987429','\0\0\0\0\0\0\0???K??@?????&S?','p7.png'),(8,'Parqueadero Cama y Comercio','2.4425263236212245','-76.60689543906712','\0\0\0\0\0\0\0??=K?@???_?&S?','p8.png'),(9,'Parqueadero Unicomfacauca','2.442982748616721','-76.60794671910791','\0\0\0\0\0\0\0?:?@?[??&S?','p9.png'),(10,'Parqueadero 5 con 7','2.4416549372609055','-76.60737034796428','\0\0\0\0\0\0\0]8=b??@ED?\'?&S?','p10.png'),(11,'Parqueadero Éxito Centro','2.439885747328373','-76.60481793590654','\0\0\0\0\0\0\0?????@.?IV?&S?','p11.png'),(12,'Parqueadero Achalay','2.4407536312288625','-76.60748271500017','\0\0\0\0\0\0\0	??֩?@?s.??&S?','p12.png');
/*!40000 ALTER TABLE `parqueaderos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-11  1:54:06
