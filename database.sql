-- MariaDB dump 10.19  Distrib 10.11.2-MariaDB, for osx10.18 (arm64)
--
-- Host: 127.0.0.1    Database: student_violation_db
-- ------------------------------------------------------
-- Server version	10.11.2-MariaDB

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
-- Table structure for table `achievements`
--

DROP TABLE IF EXISTS `achievements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `achievements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `title` tinytext NOT NULL,
  `description` tinytext NOT NULL,
  `min_point` int(11) NOT NULL,
  `max_point` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `achievements`
--

LOCK TABLES `achievements` WRITE;
/*!40000 ALTER TABLE `achievements` DISABLE KEYS */;
INSERT INTO `achievements` VALUES
(2,'PRS-001','PRESTASI AKADEMIK','Prestasi siswa yang diperoleh secara akademik',20,60,'2023-04-16 19:19:54','2023-04-17 06:30:44',NULL),
(3,'PRS-0002','PRESTASI NON-AKADEMIK','prestasi non-akademik',40,100,'2023-04-18 07:30:16','2023-04-18 07:30:16',NULL);
/*!40000 ALTER TABLE `achievements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` tinytext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES
(2,'admin','admin','$2y$10$eCbjEyYL7ureHsxlA.1ImezolwFiC15pYSD/9b9x4fKqqfN7IafGu','2023-04-17 22:01:16','2023-04-17 22:01:16',NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'2023-04-07-140453','App\\Database\\Migrations\\Admin','default','App',1681250714,1),
(2,'2023-04-07-141330','App\\Database\\Migrations\\Student','default','App',1681250714,1),
(3,'2023-04-07-151806','App\\Database\\Migrations\\Punishment','default','App',1681250714,1),
(4,'2023-04-08-180455','App\\Database\\Migrations\\Achievement','default','App',1681250714,1),
(5,'2023-04-10-125239','App\\Database\\Migrations\\StudentViolations','default','App',1681250714,1),
(6,'2023-04-10-125655','App\\Database\\Migrations\\StudentAchievement','default','App',1681250714,1),
(7,'2023-04-10-125841','App\\Database\\Migrations\\Penalty','default','App',1681250714,1),
(8,'2023-04-10-130152','App\\Database\\Migrations\\StudentPenalties','default','App',1681250714,1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penalties`
--

DROP TABLE IF EXISTS `penalties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penalties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `title` tinytext NOT NULL,
  `description` text NOT NULL,
  `min_point` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penalties`
--

LOCK TABLES `penalties` WRITE;
/*!40000 ALTER TABLE `penalties` DISABLE KEYS */;
INSERT INTO `penalties` VALUES
(2,'SNK-001','Sosialisasi','Skors 2 Minggu',50,'2023-04-19 08:51:03','2023-04-19 08:51:03',NULL);
/*!40000 ALTER TABLE `penalties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_achievements`
--

DROP TABLE IF EXISTS `student_achievements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_achievements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `achievement_id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_achievements`
--

LOCK TABLES `student_achievements` WRITE;
/*!40000 ALTER TABLE `student_achievements` DISABLE KEYS */;
INSERT INTO `student_achievements` VALUES
(1,1,3,20,'2023-04-19 01:54:11','2023-04-19 01:54:11',NULL),
(2,1,3,60,'2023-04-19 02:03:07','2023-04-19 02:03:07',NULL),
(3,1,2,50,'2023-04-19 05:00:27','2023-04-19 05:00:27',NULL),
(4,103,2,60,'2023-05-02 20:48:46','2023-05-02 20:48:46',NULL);
/*!40000 ALTER TABLE `student_achievements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_penalties`
--

DROP TABLE IF EXISTS `student_penalties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_penalties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `penalty_id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_penalties`
--

LOCK TABLES `student_penalties` WRITE;
/*!40000 ALTER TABLE `student_penalties` DISABLE KEYS */;
INSERT INTO `student_penalties` VALUES
(2,1,2,0,'2023-04-30 14:57:34','2023-04-30 14:57:34',NULL),
(3,1,2,0,'2023-04-30 14:57:39','2023-04-30 14:57:39',NULL),
(4,103,2,0,'2023-05-02 20:50:48','2023-05-02 20:50:48',NULL);
/*!40000 ALTER TABLE `student_penalties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_violations`
--

DROP TABLE IF EXISTS `student_violations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_violations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `violation_id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_violations`
--

LOCK TABLES `student_violations` WRITE;
/*!40000 ALTER TABLE `student_violations` DISABLE KEYS */;
INSERT INTO `student_violations` VALUES
(1,1,2,40,'2023-04-19 07:49:25','2023-04-19 07:49:25',NULL),
(2,103,2,30,'2023-05-02 20:49:14','2023-05-02 20:49:14',NULL),
(3,12,3,20,'2023-05-02 20:52:07','2023-05-02 20:52:07',NULL);
/*!40000 ALTER TABLE `student_violations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nis` varchar(50) NOT NULL,
  `name` tinytext NOT NULL,
  `gender` varchar(1) NOT NULL,
  `class` varchar(50) NOT NULL,
  `address` tinytext NOT NULL,
  `phone` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES
(1,'1234','testing','L','X B','testing\r\nme','08987687687','2023-04-17 08:58:19','2023-04-17 08:58:19',NULL),
(3,'6238','Prof. Rosalinda Mills','P','XII C','53448 Stroman Village Apt. 735\nNorth Laurianne, IA 04102-7900','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(4,'3519','Dr. Gaylord Goyette DVM','P','XII C','725 Laury Trace\nNew Zellafurt, CO 58699-0808','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(5,'9912','Henry Harber','L','XII C','5942 Jamison Path\nNienowburgh, MO 13001','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(6,'7018','Mrs. Clare Kutch PhD','P','XI A','2774 Reichel Ramp Apt. 636\nPort Florine, AK 53867-2617','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(7,'3438','Josefa Zboncak Sr.','L','XI A','967 Donato Gardens\nAutumnburgh, AR 27708-2474','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(8,'4406','Hannah Haag','P','XII C','1706 Koss Squares\nSouth Kavon, AK 91552-6260','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(9,'8237','Ms. Stephania Kunze II','L','XII C','72960 Glen Centers\nRyleyport, NC 21862-9206','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(11,'2690','Ottis Leuschke IV','P','XI A','8590 Langworth Row Suite 748\nWest Molly, VA 83099','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(12,'1313','Prof. Hattie Yundt','P','X A','19683 Block Passage Suite 637\nSpencerfort, WA 50165','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(13,'4488','Aniya Ebert','P','XII C','8798 Will Plaza\nSauerhaven, WY 17285-7009','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(14,'4346','Bessie Haag','P','X A','6649 Bechtelar Views\nNorth Susie, GA 67559-4317','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(15,'4712','Joaquin Bradtke V','L','XII C','450 Reilly Plains\nMatildeside, NE 03869','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(16,'3807','Prof. Maxime Crona MD','L','XII C','1113 Joannie Lane\nWest Odellville, SD 01327-1328','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(17,'8067','Jewel Konopelski DDS','P','X A','1934 Anastasia Crescent Apt. 329\nPort Christopheshire, TN 29365-7633','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(18,'1053','Frank Schinner','L','X A','654 Salma Burg Apt. 533\nLake Lurachester, MD 62498','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(19,'2099','Mrs. Edythe Veum Sr.','L','XI A','2099 Tate Ramp\nPort Jodyport, SD 00325','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(20,'9597','Laney Collier','L','XI A','8198 Harvey Court\nHeavenstad, WA 26314-6444','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(21,'9574','Prof. Ahmed O\'Conner PhD','P','X A','39825 Skiles Camp Apt. 344\nSouth Williamshire, MO 66099-3909','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(22,'8641','Lennie Nicolas','P','XI A','9966 Elinor Locks Suite 971\nPort Bertha, NC 70254-0167','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(23,'5027','Drew Stehr','P','X A','344 Murphy Park\nNorth Dorthyland, OR 20528-9211','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(24,'9162','Trace Kemmer','P','XII C','685 Icie Groves Apt. 507\nSaraimouth, NM 10505-5350','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(25,'8558','Madisyn Ondricka','P','XI A','7612 Pasquale Drive\nNew Angelinaborough, PA 47398','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(26,'6595','Dr. Orin Wilkinson V','P','XII C','45563 Lebsack Prairie\nPort Silas, UT 09096','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(27,'2367','Prof. Annabelle Predovic III','P','XI A','89283 Glover Junctions\nSouth Constanceside, NV 56931-0206','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(28,'2041','Elvera O\'Reilly','P','XII C','791 Eichmann Valleys\nEast Caterina, RI 01039','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(29,'9346','Verona Hackett','P','X A','24669 Parker Crossing\nSouth Janiefurt, MD 82865','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(30,'8592','Dudley Cremin','L','X A','320 Hirthe Grove Suite 269\nCaylashire, AL 86484-2417','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(31,'8343','Ms. Elfrieda Pouros','L','XII C','669 Kuhlman View\nElijahmouth, MD 33853','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(32,'8580','General Gorczany','P','XI A','25608 Stephany Road Apt. 112\nEast Kianna, NY 15969-3194','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(33,'3785','Dr. Kylee Quitzon PhD','P','XI A','252 King Parkway Apt. 700\nSouth Lonzoside, MS 97966-2413','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(34,'8467','Kaylie Jakubowski MD','L','XII C','5793 Kurt Creek Apt. 128\nWest Toyside, AZ 92137','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(35,'9111','Ms. Emmalee Ortiz','L','X A','7676 Queenie Forks\nSporertown, IA 07431','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(36,'9233','Salma Weissnat','P','X A','3177 Blanda Squares\nEast Tomville, OH 32610-2070','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(37,'9575','Chase Roberts','L','XII C','5988 Sedrick Wall Apt. 376\nSouth Isadore, MI 73983-6542','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(38,'6545','Luciano Spencer','P','X A','9440 Faye Drives Apt. 373\nWest Laura, WI 10127-3306','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(39,'1054','Mrs. Arvilla Volkman','P','XII C','427 O\'Keefe Rapids Apt. 448\nZechariahview, DC 65606','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(40,'4893','Nona Moore','L','X A','8369 Rowe Centers Suite 146\nConsidinefurt, MS 33011-8924','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(41,'3440','Gabriel Bergnaum Jr.','P','XII C','32956 Legros Island Suite 506\nStrackeshire, VT 26908','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(42,'9235','Adolfo Hamill','L','X A','28593 Kassulke Via\nEast Destineyview, IA 53923-7421','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(43,'3646','Edwardo Crona','L','XII C','8646 Connor Groves Suite 476\nWest Natalia, NC 38997-7099','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(44,'1790','Nakia Hayes','P','XI A','1194 Aubree Ranch Apt. 672\nCoreneborough, WA 41493-6949','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(45,'9795','Prof. Hollis Howe','L','XI A','72098 Isaiah Center Apt. 051\nAylinhaven, MO 67781','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(46,'2700','Lina Hyatt','P','X A','57380 Hickle Plains Apt. 593\nConroyport, NV 22891-6596','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(47,'7828','Makayla Bauch','L','X A','119 Haley Fall\nNew Eddie, DC 21077','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(48,'1267','Carleton Beahan','L','XI A','6701 Bo Light Suite 833\nNew Flossie, AZ 73252-0235','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(49,'6092','Reanna Bernhard','P','XI A','7860 Wolf Views Suite 774\nEast Maynard, WV 35246-4133','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(50,'4596','Prof. Tracey Marks','P','X A','370 Karen Falls Suite 806\nGusikowskimouth, NJ 21109-6836','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(51,'5943','Bethel Altenwerth','L','X A','2980 Fadel Viaduct Suite 290\nStromanburgh, SD 64337','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(52,'5128','Prof. Marina Dach V','P','XII C','338 Thompson Unions Suite 825\nNorth Thadfurt, OR 42504-1771','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(53,'7152','Lesley Ziemann','L','XII C','837 Carlie Divide Apt. 453\nBoehmport, DC 25514','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(54,'6819','Lorena Waelchi','P','XII C','111 Meghan Circles Apt. 153\nTerryshire, NY 35161-6549','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(55,'4165','Ian Pfeffer','L','XII C','10676 Schaefer Plains Suite 221\nPort Mervinshire, MA 45784-9990','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(56,'5656','Hubert Denesik','P','X A','315 Braun Ramp\nLake Gwen, MN 99744-7976','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(57,'1392','Tiara Rowe','P','XII C','96733 Koelpin Mountain Apt. 369\nCummerataview, ID 12895-6888','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(58,'9299','Willie Wilderman','L','XI A','3808 Ralph Garden\nEast Enricotown, SD 09023-3657','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(59,'5428','Leilani Yundt','L','XI A','871 Windler Drive Apt. 439\nEast Sigmundborough, NM 05663-6544','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(60,'3165','Richmond Effertz II','L','X A','96795 Emmerich Harbors\nMaxwellmouth, IL 61212','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(61,'9575','Keegan Wolff V','P','XII C','129 Ottis Shoal\nJettport, HI 00724-4193','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(62,'6414','Rolando Reilly','P','X A','9382 Delores Rapid Apt. 795\nWisozkview, SD 89829','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(63,'3420','Julio Jakubowski','P','XII C','63891 Parisian Drive\nEast Margarettemouth, MA 82757-8801','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(64,'1891','Miss Krista Kertzmann','L','XII C','374 Deja Key Suite 795\nEast Alexys, WY 66233','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(65,'4546','Eusebio Spinka','P','XI A','49969 Walter Creek Apt. 345\nSouth Augustine, WV 23906-1999','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(66,'8248','Chance Koss','L','XI A','475 Lemke Station Suite 912\nNorth Maxie, AL 91511-2972','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(67,'1403','Tomasa Schumm','P','XI A','9564 Hagenes Underpass Apt. 709\nPagacville, MO 17768','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(68,'6786','Brett Prohaska','L','XI A','738 Bergstrom Roads Apt. 801\nHowardstad, TN 25054-2463','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(69,'6091','Jaqueline Schowalter','P','X A','8421 Zemlak Pass Suite 829\nKamronmouth, HI 86846-9235','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(70,'4195','Chauncey Marvin','L','XII C','5663 Bode Parkways Apt. 198\nEast Remington, WA 07358-1852','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(71,'2690','Miss Celine McClure','P','XII C','505 Ondricka Islands Apt. 823\nEwaldland, OR 82489-7613','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(72,'8385','Bernard Marquardt','L','X A','99929 Joy Knolls\nAddieview, PA 65066','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(73,'3516','Alexandrea Schmeler','L','X A','576 Dariana Mountains\nGreenfeldershire, CT 20545','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(74,'9724','Aubree Harber','L','X A','3250 Daphney Curve\nLake Ada, IL 11483-9955','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(75,'8968','Prof. Seamus Roob V','L','XII C','8658 Lemke Hollow\nNorth Generalside, VA 06914','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(76,'6530','Ansel Sawayn','L','XII C','9003 Ortiz Brooks\nEast Stephania, CT 61573','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(77,'2294','Mrs. Jailyn Batz Jr.','L','XII C','3882 Heidenreich Brooks Suite 613\nKundechester, ID 67916-2836','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(78,'1538','Candido Schaefer','L','XI A','8436 Laurel Knolls Suite 286\nTerrenceshire, AR 74587','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(79,'2861','Elmira King PhD','P','X A','648 Bayer Mission Suite 149\nSarinaborough, MN 41377-7122','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(80,'9863','Cora Luettgen','L','X A','6049 Batz Passage Apt. 346\nNorth Oleview, MD 42592-0083','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(81,'1791','Jovany Ortiz','L','X A','5670 Oleta Pines\nEast Clarissafurt, ME 22571-0053','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(82,'9320','Prof. Jack Reynolds','P','XII C','766 Lurline Burg Suite 610\nWest Alvamouth, NJ 52101-3588','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(83,'5595','Noah Gleichner','P','X A','4586 Dare Ports\nWest Hilbertview, SC 57959','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(84,'1746','Mr. Beau Haley','P','XI A','62542 Muller Orchard\nWaelchiview, MN 81049-2658','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(85,'4109','Catharine Hamill','L','XI A','79479 Jakubowski Canyon Suite 638\nKellenbury, CO 29804-0995','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(86,'4147','Gabriel Bogisich','P','X A','52915 Eleanore Street Suite 122\nSouth Isom, OR 05573-7471','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(87,'9659','Mr. Alec Fisher','L','XII C','322 Josephine Coves\nShanahanside, OR 03452','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(88,'3388','Michelle Hackett','L','X A','247 Derick Points\nWunschton, TN 21024','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(89,'3069','Ms. Norma Miller','L','XII C','3137 Stone Neck\nBashirianburgh, MT 87059-2887','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(90,'6011','Amira Beatty I','L','XI A','15813 Patsy Fords\nLake Brianaberg, MT 46663','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(91,'9372','Dr. Guido Rodriguez','L','X A','33493 Braeden Island Suite 979\nEast Bryanafurt, IL 97347','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(92,'7327','Mrs. Ursula Grimes IV','L','X A','2962 Skylar Burgs Suite 617\nO\'Keefebury, ME 09626-7547','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(93,'1353','Dr. Francisca Von DDS','P','XI A','1264 Geoffrey Isle\nSouth Boydside, AK 36264','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(94,'6483','Nat Dooley','P','XI A','9372 Kunze Meadow Apt. 313\nNew Josefina, NC 99117-6904','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(95,'7717','Hannah Bartell','P','X A','7654 Schmitt Corners Suite 056\nCruickshankville, MS 20853','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(96,'9995','Vallie Treutel','L','XI A','93441 Reinger Mills Apt. 340\nNew Kade, NJ 28706','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(97,'4014','Makenzie Lang','L','XII C','361 Dereck Key\nWest Nakia, IA 63272','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(98,'9495','Helen Hane','L','XI A','156 Delores Canyon Apt. 239\nLake Peggie, NY 02344','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(99,'4897','Ms. Kassandra Bailey V','P','XII C','39977 Abbie Flats\nWest Susana, CT 98531-8630','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(100,'4720','Alayna Walker V','L','X A','31669 Gislason Villages\nWest Earnest, ME 93688','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(101,'7848','Cristobal Keeling','L','XI A','58719 Ortiz Alley Apt. 762\nLottiehaven, SC 88701','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(102,'9384','Adolph Strosin','P','XI A','70817 Tanner Ferry Suite 250\nNew Caesarville, ME 52661','','2023-05-01 07:11:05','2023-05-01 07:11:05',NULL),
(103,'18112','testin2','L','X B','Jl. pramuka timur\r\nGg. Sidodadi 2','+62895377991','2023-05-02 20:47:42','2023-05-02 20:47:42',NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `violations`
--

DROP TABLE IF EXISTS `violations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `violations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `title` tinytext NOT NULL,
  `description` text NOT NULL,
  `min_point` int(11) NOT NULL,
  `max_point` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `violations`
--

LOCK TABLES `violations` WRITE;
/*!40000 ALTER TABLE `violations` DISABLE KEYS */;
INSERT INTO `violations` VALUES
(2,'PLR-001','Kebersihan','kebersihan itu sebagian dari iman',20,60,'2023-04-19 07:35:16','2023-04-19 07:35:16',NULL),
(3,'PLR-002','Terlambat','terlambat lebih dari 15 menit setelah jam 7',30,50,'2023-05-02 20:51:54','2023-05-02 20:51:54',NULL);
/*!40000 ALTER TABLE `violations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'student_violation_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-09 21:59:53
