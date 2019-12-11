-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: ostracker
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

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
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (8,'Samyra','15','iguatemi business','samyra','0','2019-11-13 03:38:03','2019-11-14 13:43:26'),(9,'Felipe','15','condominio do marco toledo','felipe','0','2019-11-13 03:38:18','2019-11-14 13:42:58'),(10,'Marco Toledo','15','esqueci','marco','0','2019-11-13 14:33:31','2019-11-14 13:43:32'),(11,'Danilo Montesso','15','montesso','danilo','000','2019-11-13 14:36:04','2019-11-14 13:43:41'),(12,'Cliente Acer','15','n sei','cliente acer','000','2019-11-14 16:26:56','2019-11-14 13:43:59'),(13,'OSTRACKER CHANGELOG','0','0','CHANGELOG','0','2019-11-20 14:59:50','2019-11-20 15:04:51'),(15,'OSTRACKER UPDATE','0','0','UPDATE','0','2019-11-20 15:05:03','2019-11-20 15:05:03');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_10_26_164316_clientes',1),(2,'2019_10_27_045243_create_ordens_table',1),(3,'2014_10_12_000000_create_users_table',2),(4,'2014_10_12_100000_create_password_resets_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordens`
--

DROP TABLE IF EXISTS `ordens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordens`
--

LOCK TABLES `ordens` WRITE;
/*!40000 ALTER TABLE `ordens` DISABLE KEYS */;
INSERT INTO `ordens` VALUES (1,1,'ewfewfwfewf','2019-10-09','fewfewfew','sim','fewfewfew','2019-10-28 21:15:11','2019-10-28 21:15:11'),(2,1,'fewfewfwefwef','2019-01-01','fwefewfwef','sim',NULL,'2019-10-28 21:17:06','2019-10-28 21:17:06'),(3,7,'sexo','2019-11-15','paguei','sim','teste','2019-11-13 00:24:52','2019-11-13 00:24:52'),(5,11,'notebook dell','2019-11-01','100','nao','lento e bugado','2019-11-13 14:37:02','2019-11-13 14:37:02'),(6,8,'pc recep travou','2019-11-13','0','sim','pc recep travou mensagem de atualização do pje','2019-11-13 17:40:20','2019-11-13 17:43:44'),(7,12,'notebook com problemas na tela','2019-11-14','100','nao','tela começa a piscar do intermitentemente, provavelmente display ou bga','2019-11-14 16:27:49','2019-11-14 16:27:49'),(8,8,'Impressora e pc Samyra sem conexão','2019-11-18','0','nao','Roteador Cisco desconecta ao plugar cabo da impressora.\r\n\r\nRoteador Cisco não aguenta terceira conexão.\r\n\r\nVoltar terça após as 18h para trocar o cisco ou quarta','2019-11-18 17:07:09','2019-11-19 16:06:24'),(9,15,'Controle financeiro','2019-11-21','0','nao','Controlar o financeiro baseado no valor que adicionamos em ordem','2019-11-21 18:56:22','2019-11-21 18:56:22'),(10,15,'Clientes mensalistas','2019-11-21','0','nao','Adicionar a possibilidade de um cliente ser mensalista e não aparecer os campos referentes a pagamento','2019-11-21 18:57:10','2019-11-21 18:57:10'),(12,17,'instagram hackeado','2019-11-22','200','nao','perdeu acesso a conta na segunda feira, os dados de acesso a conta foram alterados para um russo','2019-11-22 20:44:03','2019-11-22 20:44:03'),(13,18,'Por no ar um site em Rails','2019-11-22','300','nao','Empts em rails super desatualizado...','2019-11-22 23:39:00','2019-11-22 23:39:00');
/*!40000 ALTER TABLE `ordens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'marneimax','marneimax@hotmail.com',NULL,'$2y$10$7u2oW0yQfHXZbdsEoFEe7OhZXXA9mA0EtpIYdNRt.nCcqvjhFEI52','XUzoaBsgN9du3ObrsmRbGnnjt6abDEfTTB1frThH4rAzlILVKgbmjQMzqAci','2019-11-20 14:58:26','2019-11-20 14:58:26'),(2,'Julio','j.cesarueti@yahoo.com.br',NULL,'$2y$10$73wVVtkBhcRugF5pyKL7HuXhNTTcpfIwuh6Kwr/hoh9937755X75i',NULL,'2019-11-20 15:00:11','2019-11-20 15:00:11');
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

-- Dump completed on 2019-12-07  1:11:15
