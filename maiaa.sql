-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: maiaa
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
-- Table structure for table `integrantes`
--

DROP TABLE IF EXISTS `integrantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `integrantes` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `redes` varchar(40) NOT NULL,
  `puesto` varchar(30) NOT NULL,
  `descripcion` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `integrantes`
--

LOCK TABLES `integrantes` WRITE;
/*!40000 ALTER TABLE `integrantes` DISABLE KEYS */;
INSERT INTO `integrantes` VALUES (1,'Didier','Crespo Castillla','ejemlo@.com','facebook.com.mx','encargado','Encargado del desarrollo primordial de la API de la plataforma.'),(2,'Esteban','Brito Borges','ejemlo@.com','facebook.com.mx','encargado','Encargado del desarrollo primordial de la API de la plataforma.'),(3,'Esteban','Brito Borges','ejemlo@.com','facebook.com.mx','encargado','Encargado del desarrollo primordial de la API de la plataforma.'),(4,'Esteban','Brito Borges','ejemlo@.com','facebook.com.mx','encargado','Encargado del desarrollo primordial de la API de la plataforma.'),(5,'Esteban','Brito Borges','ejemlo@.com','facebook.com.mx','encargado','Encargado del desarrollo primordial de la API de la plataforma.'),(6,'Esteban','Brito Borges','ejemlo@.com','facebook.com.mx','encargado','Encargado del desarrollo primordial de la API de la plataforma.'),(7,'Esteban','Brito Borges','ejemlo@.com','facebook.com.mx','encargado','Encargado del desarrollo primordial de la API de la plataforma.'),(8,'Esteban','Brito Borges','ejemlo@.com','facebook.com.mx','encargado','Encargado del desarrollo primordial de la API de la plataforma.'),(9,'marcos','jjj','jjj','jjj','jjj','jjj'),(10,'marcos','dsssssss','dssssssssss','dssssss','dssssss','sddddddd'),(11,'hhhhh','iiii','iiii','iiii','iiii','iiii');
/*!40000 ALTER TABLE `integrantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `nombre` varchar(50) NOT NULL,
  `clave` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('maiaa','maiaa');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-13  7:42:33
