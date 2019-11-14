-- MySQL dump 10.13  Distrib 8.0.17, for Linux (x86_64)
--
-- Host: localhost    Database: agoravai
-- ------------------------------------------------------
-- Server version	8.0.17-0ubuntu2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clientes_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (8,'Samyra','15','shopping iguatemi','samyra','000','2019-11-13 03:38:03','2019-11-13 14:36:16'),(9,'Felipe','15','condominio do marco toledo','felipe','000','2019-11-13 03:38:18','2019-11-13 14:36:21'),(10,'Marco Toledo','15','esqueci','marco','000','2019-11-13 14:33:31','2019-11-13 14:36:25'),(11,'Danilo Montesso','15','n sei','danilo','000','2019-11-13 14:36:04','2019-11-13 14:36:04'),(12,'Acer','15','n sei','acer','000','2019-11-14 16:26:56','2019-11-14 16:26:56');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_10_26_164316_clientes',1),(2,'2019_10_27_045243_create_ordens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordens`
--

DROP TABLE IF EXISTS `ordens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `clientes_id` int(10) unsigned NOT NULL,
  `servico` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataServico` date NOT NULL,
  `valor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pago` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacao` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordens`
--

LOCK TABLES `ordens` WRITE;
/*!40000 ALTER TABLE `ordens` DISABLE KEYS */;
INSERT INTO `ordens` VALUES (1,1,'ewfewfwfewf','2019-10-09','fewfewfew','sim','fewfewfew','2019-10-28 21:15:11','2019-10-28 21:15:11'),(2,1,'fewfewfwefwef','2019-01-01','fwefewfwef','sim',NULL,'2019-10-28 21:17:06','2019-10-28 21:17:06'),(3,7,'sexo','2019-11-15','paguei','sim','teste','2019-11-13 00:24:52','2019-11-13 00:24:52'),(5,11,'notebook dell','2019-11-01','100','nao','lento e bugado','2019-11-13 14:37:02','2019-11-13 14:37:02'),(6,8,'pc recep travou','2019-11-13','0','sim','pc recep travou mensagem de atualização do pje','2019-11-13 17:40:20','2019-11-13 17:43:44'),(7,12,'notebook com problemas na tela','2019-11-14','100','nao','tela começa a piscar do intermitentemente, provavelmente display ou bga','2019-11-14 16:27:49','2019-11-14 16:27:49');
/*!40000 ALTER TABLE `ordens` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-14 10:39:02
