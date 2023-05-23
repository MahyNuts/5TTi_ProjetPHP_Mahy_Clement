-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: clement
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `debat`
--

DROP TABLE IF EXISTS `debat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `debat` (
  `debatId` int NOT NULL AUTO_INCREMENT,
  `debatTitre` varchar(255) DEFAULT NULL,
  `debatNote` int DEFAULT NULL,
  `userId` int DEFAULT NULL,
  `debatDate` date DEFAULT NULL,
  PRIMARY KEY (`debatId`),
  KEY `userId` (`userId`),
  CONSTRAINT `debat_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `debat`
--

LOCK TABLES `debat` WRITE;
/*!40000 ALTER TABLE `debat` DISABLE KEYS */;
INSERT INTO `debat` VALUES (1,'Fruits',NULL,2,'2024-04-14'),(2,'Series Netflix',NULL,1,'2024-04-14'),(3,'Films Netflix',NULL,1,'2024-04-14'),(4,'Animés',NULL,4,'2024-04-14'),(5,'Dessins Animés',NULL,5,'2024-04-14'),(6,'Acteurs',NULL,3,'2024-04-14'),(7,'Jeux Nintendo',NULL,1,'2024-04-14'),(8,'Jeux Xbox',NULL,1,'2024-04-14'),(9,'Jeux PlayStation',NULL,2,'2024-04-14'),(10,'Series Prime Video',NULL,1,'2024-04-14'),(11,'Films Prime Video',NULL,1,'2024-04-14'),(17,'Pizza',NULL,1,'2023-05-20'),(19,'Aliments animés',NULL,1,'2023-05-20');
/*!40000 ALTER TABLE `debat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `debat_sujet`
--

DROP TABLE IF EXISTS `debat_sujet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `debat_sujet` (
  `debatSujetId` int NOT NULL AUTO_INCREMENT,
  `debatId` int NOT NULL,
  `sujetId` int NOT NULL,
  PRIMARY KEY (`debatSujetId`),
  KEY `debatId` (`debatId`),
  KEY `sujetId` (`sujetId`),
  CONSTRAINT `debat_sujet_ibfk_1` FOREIGN KEY (`debatId`) REFERENCES `debat` (`debatId`),
  CONSTRAINT `debat_sujet_ibfk_2` FOREIGN KEY (`sujetId`) REFERENCES `sujet` (`sujetId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `debat_sujet`
--

LOCK TABLES `debat_sujet` WRITE;
/*!40000 ALTER TABLE `debat_sujet` DISABLE KEYS */;
INSERT INTO `debat_sujet` VALUES (1,1,2),(2,2,1),(3,3,1),(4,4,1),(5,5,1),(6,6,1),(7,7,4),(8,8,4),(9,9,4),(10,10,1),(11,11,1),(12,19,1),(13,19,2);
/*!40000 ALTER TABLE `debat_sujet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `note`
--

DROP TABLE IF EXISTS `note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `note` (
  `noteDate` timestamp NULL DEFAULT NULL,
  `note` int DEFAULT NULL,
  `userId` int NOT NULL,
  `debatId` int NOT NULL,
  `propositionId` int NOT NULL,
  KEY `userId` (`userId`),
  KEY `debatId` (`debatId`),
  KEY `propositionId` (`propositionId`),
  CONSTRAINT `note_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  CONSTRAINT `note_ibfk_2` FOREIGN KEY (`debatId`) REFERENCES `debat` (`debatId`),
  CONSTRAINT `note_ibfk_3` FOREIGN KEY (`propositionId`) REFERENCES `proposition` (`propositionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `note`
--

LOCK TABLES `note` WRITE;
/*!40000 ALTER TABLE `note` DISABLE KEYS */;
INSERT INTO `note` VALUES ('2023-04-01 11:04:45',7,1,1,1),('2023-04-01 11:04:45',8,2,2,2),('2023-04-01 11:04:45',5,3,4,3),('2023-04-01 11:04:45',6,4,6,4),('2023-04-01 11:04:45',10,5,7,5),('2023-05-20 18:23:00',0,1,1,1),('2023-05-20 18:23:48',7,1,19,22),('2023-05-20 18:23:48',6,1,19,23);
/*!40000 ALTER TABLE `note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proposition`
--

DROP TABLE IF EXISTS `proposition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proposition` (
  `propositionId` int NOT NULL AUTO_INCREMENT,
  `propositionNom` varchar(255) DEFAULT NULL,
  `userId` int NOT NULL,
  `propositionNoteTotale` int DEFAULT NULL,
  `debatId` int DEFAULT NULL,
  PRIMARY KEY (`propositionId`),
  KEY `userId` (`userId`),
  KEY `fk_debat_id` (`debatId`),
  CONSTRAINT `fk_debat_id` FOREIGN KEY (`debatId`) REFERENCES `debat` (`debatId`),
  CONSTRAINT `proposition_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proposition`
--

LOCK TABLES `proposition` WRITE;
/*!40000 ALTER TABLE `proposition` DISABLE KEYS */;
INSERT INTO `proposition` VALUES (1,'Pomme',2,20,1),(2,'Stranger Things',1,20,2),(3,'Chainsaw Man',4,20,4),(4,'Jack Black',3,20,6),(5,'The Legend of Zelda',1,20,7),(16,'Marguerita',1,20,17),(17,'4 saisons',1,20,17),(18,'4 fromages',1,20,17),(19,'hawaienne',1,20,17),(22,'Sushis',1,20,19),(23,'Sashimi',1,20,19);
/*!40000 ALTER TABLE `proposition` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sujet`
--

DROP TABLE IF EXISTS `sujet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sujet` (
  `sujetId` int NOT NULL AUTO_INCREMENT,
  `sujetNom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sujetId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sujet`
--

LOCK TABLES `sujet` WRITE;
/*!40000 ALTER TABLE `sujet` DISABLE KEYS */;
INSERT INTO `sujet` VALUES (1,'Films/Séries/Dessins Animés'),(2,'Alimentation'),(3,'Histoire'),(4,'Jeux vidéos'),(5,'Politique');
/*!40000 ALTER TABLE `sujet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `userNom` varchar(255) DEFAULT NULL,
  `userPrenom` varchar(255) DEFAULT NULL,
  `userPseudo` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userMotdepasse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Mahy','Clément','MaCl','macl@table.com','macl'),(2,'Evrard','Elias','EvEl','evel@table.com','evel'),(3,'Grootaers','Romane','GrRo','grro@table.com','grro'),(4,'Ramsamy','Ewan','RaEw','raew@table.com','raew'),(5,'Cara','Jayson','CaJa','caja@table.com','caja');
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

-- Dump completed on 2023-05-23 21:37:54
