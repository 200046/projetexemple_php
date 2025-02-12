CREATE DATABASE  IF NOT EXISTS `school` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `school`;
-- MySQL dump 10.13  Distrib 8.0.29, for macos12 (x86_64)
--
-- Host: localhost    Database: school
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `option_ecole`
--

DROP TABLE IF EXISTS `option_ecole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `option_ecole` (
  `optionEcoleId` int NOT NULL AUTO_INCREMENT,
  `schoolId` int DEFAULT NULL,
  `optionScolaireId` int DEFAULT NULL,
  PRIMARY KEY (`optionEcoleId`),
  KEY `schoolId` (`schoolId`),
  KEY `optionScolaireId` (`optionScolaireId`),
  CONSTRAINT `option_ecole_ibfk_1` FOREIGN KEY (`schoolId`) REFERENCES `school` (`schoolId`),
  CONSTRAINT `option_ecole_ibfk_2` FOREIGN KEY (`optionScolaireId`) REFERENCES `optionscolaire` (`optionScolaireId`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `option_ecole`
--

LOCK TABLES `option_ecole` WRITE;
/*!40000 ALTER TABLE `option_ecole` DISABLE KEYS */;
INSERT INTO `option_ecole` VALUES (1,1,2),(2,1,3),(3,2,1),(10,9,1),(11,9,3),(12,9,4),(13,4,1),(14,4,3),(15,10,1),(16,10,2);
/*!40000 ALTER TABLE `option_ecole` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `optionscolaire`
--

DROP TABLE IF EXISTS `optionscolaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `optionscolaire` (
  `optionScolaireId` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`optionScolaireId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `optionscolaire`
--

LOCK TABLES `optionscolaire` WRITE;
/*!40000 ALTER TABLE `optionscolaire` DISABLE KEYS */;
INSERT INTO `optionscolaire` VALUES (1,'général'),(2,'Transition technique'),(3,'Qualification technique'),(4,'Qualification professionnel');
/*!40000 ALTER TABLE `optionscolaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school`
--

DROP TABLE IF EXISTS `school`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `school` (
  `schoolId` int NOT NULL AUTO_INCREMENT,
  `schoolNom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `schoolAdresse` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `schoolVille` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `schoolCodePostal` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `schoolNumero` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `schoolImage` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `utilisateurId` int DEFAULT NULL,
  PRIMARY KEY (`schoolId`),
  KEY `utilisateurId` (`utilisateurId`),
  CONSTRAINT `school_ibfk_1` FOREIGN KEY (`utilisateurId`) REFERENCES `utilisateurs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school`
--

LOCK TABLES `school` WRITE;
/*!40000 ALTER TABLE `school` DISABLE KEYS */;
INSERT INTO `school` VALUES (1,'ITN','Rue de la pepinière 101','Namur','5002','081729011','https://i.ytimg.com/vi/7sWnSyBp1lE/maxresdefault.jpg',35),(2,'Collège saint Servais','chau de Waterloo 52','Namur','5000','0499689850','https://cloudfront-eu-central-1.images.arcpublishing.com/ipmgroup/NKIYZVJXG5BIDEFUQGA6LWPFOU.jpg',35),(4,'Ecole de l\'enfant Jésus','Rue de Sotriamont 1','Nivelles','1400','067893805','http://iejn.be/images/logo/gauche.png',35),(9,'Institut Notre-Dame','Rue Julie Billiart 19','Namur','5000','081255135','https://www.lesoir.be/sites/default/files/dpistyles_v2/ena_16_9_extra_big/2020/10/09/node_330663/27745674/public/2020/10/09/B9724879893Z.1_20201009185859_000+G61GRCP8U.1-0.png.jpg?itok=7mmdxAF81602262746',38),(10,'Collège Foch','boulevard vaugirard 50','L\'Aigle','61300','','',41);
/*!40000 ALTER TABLE `school` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomUser` varchar(255) NOT NULL,
  `prenomUser` varchar(25) NOT NULL,
  `loginUser` varchar(25) NOT NULL,
  `passWordUser` varchar(25) NOT NULL,
  `role` varchar(255) DEFAULT 'user',
  `emailUser` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateurs`
--

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` VALUES (35,'test','test','test','test','user','testMail@ici.be'),(37,'test','test','test2','test','user',NULL),(38,'Baudson','Baudson','testbb','testbb','user','bb@ici.net'),(40,'Dupont','Jean','dj','dj','user','dj@labas.net'),(41,'Jacques','Pierre','pj','pj','user','pj@itn.be');
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-02 16:01:17