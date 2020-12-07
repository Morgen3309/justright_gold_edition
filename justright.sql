-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: justright
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(1024) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Одежда'),(2,'Обувь'),(3,'Аксессуары'),(4,'Головные уборы'),(5,'Музыкальные инструменты');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `color` (
  `id` int NOT NULL,
  `color` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (0,'Белый'),(1,'Красный'),(2,'Оранжевый'),(3,'Желтый'),(4,'Зеленый'),(5,'Голубой'),(6,'Синий'),(7,'Фиолетовый'),(8,'Розовый'),(9,'Черный'),(10,'Коричневый');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `general`
--

DROP TABLE IF EXISTS `general`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `general` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `category_id` int NOT NULL,
  `price` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category_id_idx` (`category_id`),
  CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general`
--

LOCK TABLES `general` WRITE;
/*!40000 ALTER TABLE `general` DISABLE KEYS */;
INSERT INTO `general` VALUES (60,'Футболка Red Hot Chili  Peppers',1,400),(62,'Футболка Iron Maden - Legacy of Beast',1,600),(63,'Футболка Death - Human',1,1500),(64,'Ботинки Ultras Raver 12 дыр+5 пряжек',2,6500),(66,'Ботинки STEEL 20 дыр с пряжками и шипами',2,7500),(67,'Ботинки Ultras Raver 6 дыр',2,2500),(68,'Ботинки STEEL 20 дыр с пряжками',2,8900),(69,'Ботинки STEEL 10 дыр',2,130),(70,'Ботинки зимние Ultras Raver 9 блочек',2,10000),(71,'Футболка ACDC Black Ice большое лого',1,650),(72,'Футболка Dark Funeral',1,650),(73,'Футболка Nirvana (смайл)',1,400),(74,'Футболка Oomph!',1,650),(75,'Футболка Overkill - The Years Of Decay',1,650),(76,'Футболка Pink Floyd The Dark Side of the Moon варенка',1,1000),(77,'Футболка Pink Floyd The Wall',1,500),(79,'Футболка Twenty One Pilots - Trench',1,650),(80,'Футболка Dropkick Murphys (якорь) темно-зеленая',1,1600);
/*!40000 ALTER TABLE `general` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `goods` (
  `article` int NOT NULL AUTO_INCREMENT,
  `id` int NOT NULL,
  `color_id` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `size_id` text CHARACTER SET utf8 COLLATE utf8_bin,
  `count` int DEFAULT NULL,
  PRIMARY KEY (`article`),
  KEY `fk_id_idx` (`id`),
  CONSTRAINT `fk_id` FOREIGN KEY (`id`) REFERENCES `general` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (99,60,'1','1',3),(101,62,'8','5',25),(102,63,'9','6',4),(103,64,'9','13',2),(105,66,'9','16',34),(106,67,'9','17',23),(107,67,'9','19',43),(108,67,'9','20',55),(109,68,'1','15',34),(110,69,'9','16',30),(111,69,'5','16',30),(112,69,'0','15',30),(113,69,'7','19',30),(114,69,'8','13',30),(115,69,'1','19',30),(116,70,'9','14',16),(117,70,'4','15',16),(118,71,'9','6',5),(119,71,'9','5',5),(120,71,'9','3',5),(121,72,'9','9',5),(122,72,'9','1',5),(123,72,'9','2',5),(124,72,'9','3',5),(125,72,'9','4',5),(126,72,'9','5',5),(127,72,'9','6',5),(128,73,'6','2',6),(129,73,'6','1',6),(130,73,'6','3',6),(131,73,'6','4',6),(132,73,'6','5',6),(133,73,'6','6',6),(134,73,'6','7',6),(135,73,'6','8',6),(136,74,'9','3',6),(137,74,'9','4',6),(138,74,'9','2',6),(139,74,'9','1',6),(140,74,'9','5',6),(141,74,'9','6',6),(142,74,'9','7',6),(143,74,'9','9',6),(144,75,'9','3',4),(145,75,'9','4',5),(146,75,'9','5',4),(147,76,'0','3',6),(148,76,'0','4',6),(149,76,'0','5',6),(150,76,'0','2',6),(151,76,'0','6',6),(152,77,'1','2',6),(153,77,'1','3',6),(154,77,'1','4',6),(155,77,'1','5',6),(156,77,'1','6',6),(164,79,'9','1',4),(165,79,'9','2',4),(166,79,'9','3',4),(167,79,'9','4',4),(168,79,'9','7',4),(169,80,'4','5',5);
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `size`
--

DROP TABLE IF EXISTS `size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `size` (
  `id` int NOT NULL AUTO_INCREMENT,
  `size` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `size`
--

LOCK TABLES `size` WRITE;
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
INSERT INTO `size` VALUES (1,'XS'),(2,'S'),(3,'M'),(4,'L'),(5,'XL'),(6,'XXL'),(7,'3XL'),(8,'4XL'),(9,'5XL'),(10,'6XL');
/*!40000 ALTER TABLE `size` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-05 13:59:02
