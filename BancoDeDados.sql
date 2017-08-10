-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: catalogo
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2017_06_20_003550_create_produtos_table',1),('2017_06_23_143831_Produto',2),('2017_06_23_145815_add_imagem_to_tabel_produtos',3),('2017_06_23_152345_delete_field_foto',3),('2017_06_23_152523_create_field_foto',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `referencia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` longtext COLLATE utf8_unicode_ci NOT NULL,
  `preco` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (26,'YD1700BBAEBOX','AMD Ryzen 7 1700','c/ Wraith Spire, Octa Core, Cache 20MB, 3.0GHz (3.7GHz Max Turbo) AM4',1208.43,'2017-07-04 01:19:56','2017-07-07 01:35:21','5a8d7670c0a1907c94b2ee3e729e1118.jpg'),(27,'FD6300WMHKBOX','AMD FX-6300','Black Edition, Cache 14MB, 3.5GHz (4.1GHz Max Turbo), AM3+',399.88,'2017-07-04 01:21:07','2017-07-04 01:21:07','956f526ac92b09e898f85a818083a7b5.jpg'),(28,'BX80677I77700K','Intel Core i7-7700K','Kaby Lake 7a Geração, Cache 8MB 4.2GHz (4.5GHz Max Turbo), LGA 1151 Intel HD Graphics 630',1881.06,'2017-07-04 01:21:56','2017-07-04 01:21:56','123219995876a24f1b5d3bf18bde0c41.jpg'),(29,'BX80677I57400','Intel Core i5-7400','Kaby Lake 7a Geração, Cache 6MB, 3.0Ghz (3.5GHz Max Turbo), LGA 1151 Intel HD Graphics',929.29,'2017-07-04 01:22:39','2017-07-04 01:22:39','340beec573d6b0da10db576e48f1e044.jpg'),(30,'BX80662G3900','Intel Celeron G3900','Skylake, Cache 2MB, 2.8GHz, LGA 1151, Intel HD Graphics 510',176.35,'2017-07-04 01:23:17','2017-07-04 01:23:17','f361e62c70fa2df9454e8589bbff884c.jpg'),(31,'BX80662G4400','Intel Pentium G4400','Skylake, Cache 3MB, 3.3Ghz, LGA 1151, Intel HD Graphics 510',348.12,'2017-07-04 01:27:04','2017-07-04 01:27:04','d581807627d2d95dde95ddedd2d568c1.jpg'),(32,'YD1400BBAEBOX','AMD Ryzen 5 1400','c/ Wraith Stealth, Quad Core, Cache 10MB, 3.2GHz (Max Turbo 3.4GHz) AM4',823.41,'2017-07-04 01:29:59','2017-07-04 01:29:59','9b118740cbb3ef0624b831e5ccff0878.jpg'),(33,'SD2650JAHMBOX','AMD Sempron 2650','Radeon R3, Cache 1MB, 1.45Ghz, AM1 ',152.82,'2017-07-04 01:31:08','2017-07-04 01:31:08','5a82cda73893ef55f4cee88fff29c6ec.jpg'),(34,'BX80677I37100','Intel Core i3-7100','Kaby Lake 7a Geração, Cache 3MB 3,9GHz LGA 1151 Intel HD Graphics',635.18,'2017-07-04 01:32:25','2017-07-04 01:32:25','8f8f043e08f2de3c5900d001d946f448.jpg'),(35,'AD7600YBJABOX','AMD A8 7600','Quad Core, Cache 4MB, 3.8GHz, FM2+',441.06,'2017-07-04 01:33:29','2017-07-04 01:33:29','ea4bdf22cd2107d5065ccfde502f4abc.jpg'),(39,'12345','Produto','Sem descrição',1234.56,'2017-07-07 03:32:05','2017-07-07 03:32:05','Sem Imagem');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
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

-- Dump completed on 2017-07-07  9:29:35
