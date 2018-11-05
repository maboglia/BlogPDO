-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: its_2018
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

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
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'PHP'),(2,'Java'),(3,'Javascript'),(4,''),(5,'HTML5'),(6,'C#'),(7,'Python');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titolo` varchar(45) NOT NULL,
  `sottotitolo` varchar(45) DEFAULT NULL,
  `testo` text,
  `id_autore` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (23,'blogdeglistudentiITS2018','inserimento','$this->view(\'main/header\');$this->view(\'posts/put\',[\'messaggio\'=>$messaggio]);$this->view(\'main/footer\');',1),(24,'blogdeglistudentiITS2019','sottotitolo','<option>Sceglicategoria</option>',3),(25,'blogdeglistudentiITS2019','inserimento','IntroduzioneaJavaIntroduzioneallinguaggioadoggettiJAVA,epreparazioneambientedisviluppoconjdkeIDE.PrimiConcettidiOOPConcettodiclasse,oggetto,variabile,propriet,metodo,costruttoreepackage.Referencethisperlutilizzoneimetodiconiparametri.Implementazionedeimetodiaccessoremutator.TipidiDatieCastingTipididatiprimitiviereference.Concettidicastepromotion.IterazioneecontrolloImplementazionedialgoritmiinjavautilizzandoassegnazioni,cicli,condizioni.Enumerazioni,ArrayeStringAltretipologiedidati:enumerazioni,Array,ArrayList,StringeStringBuilderOOPavanzataAnalisieTestdeitreprincipifondamentalidellaProgrammazioneadOggetti:incapsulamento,ereditarietpolimorfismo.Referencesuper.',3);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_post_categorie`
--

DROP TABLE IF EXISTS `r_post_categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_post_categorie` (
  `id_post` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  KEY `fk_r_post_categorie_2_idx` (`id_post`),
  KEY `fk_r_post_categorie_1_idx` (`id_categoria`),
  CONSTRAINT `fk_r_post_categorie_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_r_post_categorie_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_post_categorie`
--

LOCK TABLES `r_post_categorie` WRITE;
/*!40000 ALTER TABLE `r_post_categorie` DISABLE KEYS */;
INSERT INTO `r_post_categorie` VALUES (23,1),(24,1),(25,2);
/*!40000 ALTER TABLE `r_post_categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utenti`
--

DROP TABLE IF EXISTS `utenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utenti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
  `cognome` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '	',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(45) COLLATE utf8_unicode_ci NOT NULL,
  `ruolo` enum('amministratore','redattore','lettore') CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utenti`
--

LOCK TABLES `utenti` WRITE;
/*!40000 ALTER TABLE `utenti` DISABLE KEYS */;
INSERT INTO `utenti` VALUES (1,'mauro','bogliaccino','mauro@gmail.com','CRYPTami&SALTami','amministratore','2018-07-13 08:23:23'),(2,'paolo','bogliaccino','paolo@gmail.com','qwerty','lettore','2018-07-12 08:23:23'),(3,'giuseppe','garibaldi','giuseppe@gmail.com','anita','redattore','2018-07-14 08:23:23'),(4,'john','lennon','john@gmail.com','john','redattore','2018-07-10 08:23:23');
/*!40000 ALTER TABLE `utenti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'its_2018'
--

--
-- Dumping routines for database 'its_2018'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-05 17:26:08
