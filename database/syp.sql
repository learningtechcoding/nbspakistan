-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: syp
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `central_cabinets`
--

DROP TABLE IF EXISTS `central_cabinets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `central_cabinets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cabinets_type` enum('coc','cc') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `central_cabinets`
--

LOCK TABLES `central_cabinets` WRITE;
/*!40000 ALTER TABLE `central_cabinets` DISABLE KEYS */;
INSERT INTO `central_cabinets` VALUES (3,'Mr. Shaheer Haider Malik','central-cabinets/cc/1641491448203m1.png','Central President','Founder','Shaheer.malik@stateyouthparliament.com','+92 311 5962257','https://www.facebook.com/shahveer','https://twitter.org/shahveer','cc','2022-01-06 17:50:48','2022-01-06 17:50:48'),(4,'Mr. Mamar Yuchi','central-cabinets/cc/1641491591328m3.png','Central Vice President','Member Since 2020','mamar.ali@stateyouthparliament.com','+92 355 5722372','https://www.facebook.com/shahveer','https://twitter.org/shahveer','cc','2022-01-06 17:53:11','2022-01-06 17:53:11'),(5,'Mr. Syed Jehanziab Shah','central-cabinets/cc/1641491754194default-member-icon.png','Central General Secretary','Member Since 2019','jehanzaib.shah@stateyouthparliament.com','+92 316 3772014','https://www.facebook.com/shahveer','https://twitter.org/shahveer','cc','2022-01-06 17:55:54','2022-01-06 17:55:54'),(6,'Mr. Malik Ahmed Raza','central-cabinets/cc/1641491805015m2.png','Central Joint Secretary','Member Since 2017','ahmed.raza@stateyouthparliament.com','+92 305 5578686','https://www.facebook.com/shahveer','https://twitter.org/shahveer','cc','2022-01-06 17:56:45','2022-01-06 17:56:45'),(7,'Mr. Muhammad Haseeb Chudhary','central-cabinets/coc/1641491912912NoPath---Copy-(17).png','Chairman COC','Member Since 2018','haseeb.chudhary@stateyouthparliament.com','+92 300 4423400','https://www.facebook.com/shahveer','https://twitter.org/shahveer','coc','2022-01-06 17:58:32','2022-01-06 17:58:32'),(8,'Mr. Azhar Langrial','central-cabinets/coc/1641491974569default-member-icon.png','Member COC','Member Since 2020','mamar.ali@stateyouthparliament.com','+92 314 7861187','https://www.facebook.com/shahveer','https://twitter.org/shahveer','coc','2022-01-06 17:59:34','2022-01-06 17:59:34');
/*!40000 ALTER TABLE `central_cabinets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (5,'Nouman Habib','noumanhabib521@gmail.com','Hello thanks for this website, let\'s start talking and we are so happy to be there.','2022-01-07 09:05:56','2022-01-07 09:05:56');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galleries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gallery image',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES (1,'Gallery Image','gallery/1641390959896g1.png','2022-01-05 13:55:59','2022-01-05 13:55:59'),(2,'Gallery Image','gallery/1641390974953g2.png','2022-01-05 13:56:14','2022-01-05 13:56:14'),(3,'Gallery Image','gallery/1641390985012g3.png','2022-01-05 13:56:25','2022-01-05 13:56:25'),(4,'Gallery Image','gallery/1641390998328g4.png','2022-01-05 13:56:38','2022-01-05 13:56:38'),(5,'Gallery Image','gallery/1641391009792g5.png','2022-01-05 13:56:49','2022-01-05 13:56:49'),(6,'Gallery Image','gallery/1641391022690g6.png','2022-01-05 13:57:02','2022-01-05 13:57:02'),(7,'Some Title','gallery/1641391393242Component-8-–-1.png','2022-01-05 14:03:13','2022-01-05 14:03:13'),(8,'Some Title','gallery/1641391407304Component-10-–-1.png','2022-01-05 14:03:27','2022-01-05 14:03:27'),(9,'Some Title','gallery/1641391425334Component-11-–-1.png','2022-01-05 14:03:45','2022-01-05 14:03:45'),(10,'Some Title','gallery/1641391438532IMG-20200615-WA0125.png','2022-01-05 14:03:58','2022-01-05 14:03:58'),(11,'Gallery Image','gallery/g1.png',NULL,NULL),(12,'Gallery Image','gallery/g2.png',NULL,NULL),(13,'Gallery Image','gallery/g3.png',NULL,NULL),(14,'Gallery Image','gallery/g5.png',NULL,NULL),(15,'Gallery Image','gallery/g6.png',NULL,NULL),(16,'Gallery Image','gallery/g7.png',NULL,NULL),(17,'Gallery Image','gallery/g8.png',NULL,NULL),(18,'Gallery Image','gallery/g9.png',NULL,NULL),(19,'Gallery Image','gallery/g10.png',NULL,NULL),(20,'Gallery Image','gallery/g11.png',NULL,NULL),(21,'Gallery Image','gallery/g12.png',NULL,NULL),(22,'Gallery Image','gallery/g13.png',NULL,NULL),(23,'Gallery Image','gallery/g14.png',NULL,NULL),(24,'Gallery Image','gallery/g15.png',NULL,NULL),(25,'Gallery Image','gallery/g16.png',NULL,NULL),(26,'Gallery Image','gallery/g17.png',NULL,NULL),(27,'Gallery Image','gallery/g18.png',NULL,NULL);
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leaderships`
--

DROP TABLE IF EXISTS `leaderships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leaderships` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_since` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leadership_main_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leadership_province_subtype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leaderships`
--

LOCK TABLES `leaderships` WRITE;
/*!40000 ALTER TABLE `leaderships` DISABLE KEYS */;
INSERT INTO `leaderships` VALUES (1,'Mr. Muhammad Ahmed','leadership/1641534948972NoPath---Copy-(22).png','Chairman Universities Council - Punjab','Member Since 2019','Muhammad.ahmed@stateyouthparliament.com','+92 343 0270489','https://www.facebook.com/ahmed','https://twitter.org/ahmed','Universities Council','Universities Council - Punjab','2022-01-07 05:45:55','2022-01-07 05:55:48'),(3,'Mr. Hashaam Bin Malik','leadership/1641534935050cdcb8c26-7710-4c10-b8ea-4552b5fdef0c.png','Acting Chairman Universities Council - Punjab','Member Since 2020','hashaam.malik@stateyouthparliament.com','+92 306 5118373','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Universities Council','Universities Council - Punjab','2022-01-07 05:55:35','2022-01-07 05:55:35'),(4,'Mr. Mehar Nakash Ghafoor','leadership/1641535015919IMG_0788.png','General Secretary Universities Council - Punjab','Member Since 2020','mehar.nakash@stateyouthparliament.com','+92 341 6354284','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Universities Council','Universities Council - Punjab','2022-01-07 05:56:55','2022-01-07 05:56:55'),(5,'Mr. Mian Usman Khalid','leadership/1641535085720default-member-icon.png','General Secretary Universities Council - Punjab','Member Since 2020','usman.khalid@stateyouthparliament.com','+92 300 7394769','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Universities Council','Universities Council - Punjab','2022-01-07 05:58:05','2022-01-07 05:58:05'),(6,'Mr. Naeem Akbar Magray','leadership/1641535203709NoPath---Copy-(27).png','Chairman Universities Council - Balochistan','Member Since 2019','Naeem.akbar@stateyouthparliament.com','+92 317 8172911','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Universities Council','Universities Council - Balochistan','2022-01-07 06:00:03','2022-01-07 06:00:03'),(7,'Mr. Usama Buzdar','leadership/1641535283915default-member-icon.png','Vice Chairman Universities Council - Balochistan','Member Since 2020','Usama.buzdar@stateyouthparliament.com','+92 336 7947777','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Universities Council','Universities Council - Balochistan','2022-01-07 06:01:23','2022-01-07 06:01:23'),(8,'Mr. Muhammad Mohid','leadership/1641535338627NoPath---Copy-(25).png','General Secretary Universities Council - Balochistan','Member Since 2020','muhammad.mohid@stateyouthparliament.com','+92 315 6869901','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Universities Council','Universities Council - Balochistan','2022-01-07 06:02:18','2022-01-07 06:02:18'),(9,'Mr. Malik Farhan Bashir','leadership/1641535510404245294099_4362350087206016_1945402110169597802_n.png','Chairman Universities Council - All Pakistan','Member Since 2016','malik.farhan@stateyouthparliament.com','+92 312 0549663','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Universities Council','Universities Council - Central Cabinet','2022-01-07 06:05:10','2022-01-07 06:05:10'),(10,'Mr. Mian Muhammad Ahsan','leadership/1641535604025NoPath---Copy-(13).png','Senior Vice Chairman Universities Council - All Pakistan','Member Since 2018','mian.ahsan@stateyouthparliament.com','+92 304 7710144','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Universities Council','Universities Council - Central Cabinet','2022-01-07 06:06:44','2022-01-07 06:06:44'),(11,'Mr. Naeem Umar','leadership/1641535666662CollageMaker_20200309_225032518.png','Vice Chairman Universities Council - All Pakistan','Member Since 2019','naeem.umar@stateyouthparliament.com','+92 344 9319963','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Universities Council','Universities Council - Central Cabinet','2022-01-07 06:07:46','2022-01-07 06:07:46'),(12,'Mr. Muhammad Usman Maqsood','leadership/1641535722066Screenshot_2021-12-14-20-11-51-02.png','General Secretary Universities Council - All Pakistan','Member Since 2020','usman.maqsood@stateyouthparliament.com','+92 335 1334545','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Universities Council','Universities Council - Central Cabinet','2022-01-07 06:08:42','2022-01-07 06:08:42'),(13,'Mr. Malik Harris Bilal','leadership/1641535915164NoPath---Copy-(18).png','Chairman Universities Council - Twin Cities Zone','Member Since 2020','malik.harris@stateyouthparliament.com','+92 348 5861854','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Universities Council','Universities Council - Twin Cities Zone','2022-01-07 06:11:55','2022-01-07 06:11:55'),(14,'Mr. Hamza Chaudhry','leadership/1641537277259NoPath---Copy-(19).png','Vice Chairman Universities Council  - Twin Cities Zone','Member Since 2020','hamza.chaudhry@stateyouthparliament.com','+92 311 4111121','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Universities Council','Universities Council - Twin Cities Zone','2022-01-07 06:34:37','2022-01-07 06:34:37'),(15,'Mr. Muhammad Muzammal Hussain','leadership/1641537349387NoPath---Copy-(20).png','General Secretary Universities Council - Twin Cities Zone','Member Since 2019','muzammal.hussain@stateyouthparliament.com','+92 333 6959129','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Universities Council','Universities Council - Twin Cities Zone','2022-01-07 06:35:49','2022-01-07 06:35:49'),(16,'Mr. Usama Azad','leadership/1641537402157NoPath---Copy-(21).png','Social Media Head Universities Council - Twin Cities Zone','Member Since 2020','Usama.azad@stateyouthparliament.com','+92 317 0526897','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Universities Council','Universities Council - Twin Cities Zone','2022-01-07 06:36:42','2022-01-07 06:36:42'),(17,'Mr. Malak Hammad Ali','leadership/1641537488732NoPath---Copy-(23).png','Chairman Universities Council - GB','Member Since 2020','hammad.ali@stateyouthparliament.com','+92 355 4487373','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Universities Council','Universities Council - Gilgit-Baltistan','2022-01-07 06:38:08','2022-01-07 06:38:08'),(18,'Mr. Malak Affaq Naveed Rana','leadership/1641537542098NoPath---Copy-(24).png','Vice Chairman Universities Council - GB','Member Since 2021','affaq.naveed@stateyouthparliament.com','+92 355 4323572','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Universities Council','Universities Council - Gilgit-Baltistan','2022-01-07 06:39:02','2022-01-07 06:39:02'),(19,'Mr. Khawar Saleem','leadership/1641537591018default-member-icon.png','General Secretary Universities Council - GB','Member Since 2021','khawar.saleem@stateyouthparliament.com','+92 349 5619535','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Universities Council','Universities Council - Gilgit-Baltistan','2022-01-07 06:39:51','2022-01-07 06:39:51'),(20,'Mr. Malik Waqas Saleem','leadership/1641537722742NoPath.png','Chairman Advisory Board','Founding Member','malik.waqas@stateyouthparliament.com','+92 344 5819107','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Advisory Board','Advisory Board - Central Cabinet','2022-01-07 06:42:02','2022-01-07 06:42:02'),(21,'Mr. Muhammad Nouman Iftikhar','leadership/1641537803147NoPath---Copy.png','Member, Advisory Board','Member Since 2017','Nouman.iftikhar@stateyouthparliament.com','+92 333 5709574','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Advisory Board','Advisory Board - Central Cabinet','2022-01-07 06:43:23','2022-01-07 06:43:23'),(22,'Mr. Hamail Ejaz','leadership/1641537855289NoPath---Copy-(2).png','Member Advisory Board','Member Since 2017','hamail.ejaz@stateyouthparliament.com','+92 313 5352693','https://www.facebook.com/shahveer','https://twitter.org/shahveer','Advisory Board','Advisory Board - Central Cabinet','2022-01-07 06:44:15','2022-01-07 06:44:15');
/*!40000 ALTER TABLE `leaderships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (21,'2014_10_12_100000_create_password_resets_table',1),(22,'2019_08_19_000000_create_failed_jobs_table',1),(23,'2021_07_23_154043_create_slides_table',1),(24,'2021_07_24_061802_create_teams_table',1),(25,'2021_07_25_033847_create_notifications_table',1),(28,'2021_07_27_092107_create_videos_table',1),(29,'2021_07_25_034951_create_blogs_table',2),(32,'2014_10_12_000000_create_users_table',5),(36,'2022_01_04_220913_create_news_table',7),(37,'2022_01_05_003820_create_galleries_table',8),(38,'2022_01_06_213001_create_central_cabinets_table',9),(41,'2022_01_06_231017_create_leaderships_table',10),(42,'2021_07_25_171322_create_registrations_table',11),(43,'2021_07_31_154320_create_contacts_table',12),(45,'2022_03_20_140310_create_notification_templates_table',13),(47,'2022_03_20_191618_registration_template',14);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Bahawalpur: Mr. Shaheer Sialvi meets \r\nMian Haji Hanif candidate for MPA.','2021-11-29','news/1641322305365n0.png','<p>Some description of new is here!</p>',0,'2022-01-04 18:51:45','2022-01-04 18:59:03'),(2,'Wazirabad: Mr. Shaheer Sialvi attends the Waleema ceremony of Mr. Muhammad Ahmed - President Overseas Chapter.','2021-12-16','news/1641322407089n1.png','<p>Hello description is here!</p>',0,'2022-01-04 18:53:27','2022-01-04 18:59:13'),(3,'Lahore: Mr. Shaheer Sialvi reached to attend the Punjab Cabinet event, in which he appreciated the progress of the team.','2021-09-10','news/1641322460040n2.png','<p>Good i am here</p>',0,'2022-01-04 18:54:20','2022-01-04 18:54:20'),(4,'Raja Faizan Aslam says that youth is ready and our party will come to tackle the old political system of Nawabs. He also says, by the end of this year, we will register your political party. InShallah','2021-12-19','news/1641322576628n4.png','<p>Description here</p>',0,'2022-01-04 18:56:16','2022-01-04 18:56:16'),(5,'Punjab Cabinet starts a promotion week on provincial and divisional levels, in which individuals will get promotions on their previous record.','2021-12-10','news/1641322627487n3.png','<p>Description here!</p>',0,'2022-01-04 18:57:07','2022-01-04 18:57:07'),(6,'Mr. Shaheer Sialvi - Chairman Nazryati Group announces to provision of party tickets to 22000 nazriyati leaders across Punjab. He also says we will never nominate our candidate against our ideological brothers, no matter which party he belongs to.','2021-12-06','news/1641322687652n5.png','<p>Desciption is here for this news.</p>',0,'2022-01-04 18:58:07','2022-01-04 18:58:07');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification_templates`
--

DROP TABLE IF EXISTS `notification_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification_templates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `template_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `president_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pg1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `central_president` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copy_to` text COLLATE utf8mb4_unicode_ci,
  `regards` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `contact_numbers` text COLLATE utf8mb4_unicode_ci,
  `bottom_contact_email` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification_templates`
--

LOCK TABLES `notification_templates` WRITE;
/*!40000 ALTER TABLE `notification_templates` DISABLE KEYS */;
INSERT INTO `notification_templates` VALUES (1,'Punjab','Ijaz Gondal - President','www.stateyouthparliament.pk','contact@stateyouthparliament.pk','+92 304 6001087','State Youth Parliament is an alliance of  leaders from all  Union/Youth Leagues Pakistan. This platform was made in order to defend Pakistan and its ideology at every platform.','Mr. Ijaz Gondal','<span>Mr. Shaheer Sialvi - Founder</span>\r\n                <span>Mr. Muhammad Haseeb - CCOC</span>\r\n                <span>State Youth Parliament</span>','<span>Mr. Hashaam Bin Malik</span>\r\n                <span>Acting Chairman Universities Council - Punjab</span>\r\n                <span>State Youth Parliament</span>\r\n                <span>(+92 306 5118373)</span>','Office#1, LG Floor, Emaan Heights, Zaraj Housing Society Islamabad, 44000, Pakistan','+92 344 9319963, +92 300 4423400, +92 304 6001087','contact@stateyouthparliament.pk','2022-03-20 10:40:48','2022-03-20 10:40:48');
/*!40000 ALTER TABLE `notification_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `registrations`
--

DROP TABLE IF EXISTS `registrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father-name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `wing-type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_accepted` tinyint(1) DEFAULT NULL,
  `notification_created` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `template_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrations`
--

LOCK TABLES `registrations` WRITE;
/*!40000 ALTER TABLE `registrations` DISABLE KEYS */;
INSERT INTO `registrations` VALUES (2,'Nouman Habib','Ghulam Habib','03165667643','pb','Rawalpindi','37401-1898703-1','noumanhabib521@gmail.com','Primary education','2001-01-22','Lawyer\'s Forum','registrations/1645164730938Untitled.jpg','Lawyer Member',1,0,'2022-02-18 06:12:10','2022-02-18 09:31:34',NULL),(3,'Zeshan Habib','Ghulam Habib','03165667640','pb','Rawalpindi','37401-1898703-0','noumanhabib112233@gmail.com','Matric (SSC)','2003-08-05','Advisory Board','registrations/1645166121394Untitled.jpg',NULL,0,0,'2022-02-18 06:35:21','2022-02-18 09:33:14',NULL),(4,'Muneeb Ur Rehman','Muhmmad Shakar','03165667546','pb','Burewala','37401-1898703-4','muneebshash5656@gmail.com','Bachelor\'s degree','2000-02-03','Universities Council','registrations/1646500865998Muneeb-Ur-Rehman.jpeg','PMAS Student Examiner',1,0,'2022-03-05 17:21:06','2022-03-05 17:22:08',NULL),(5,'Nouman Habib','Ghulam Habib','03165667622','pb','Rawalpindi','37401-1898703-8','noumanhabib5201@gmail.com','Bachelor\'s degree','2022-03-22','Advisory Board','registrations/1647785497110Nouman-Habib.jpeg','New syp member',1,0,'2022-03-20 14:11:37','2022-03-20 14:19:16',NULL);
/*!40000 ALTER TABLE `registrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slides` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
INSERT INTO `slides` VALUES (4,'Title','slides/16412846642461.png','2022-01-04 08:24:24','2022-01-04 08:24:24'),(5,'Title','slides/16412846755122.png','2022-01-04 08:24:35','2022-01-04 08:24:35'),(6,'Title','slides/16412846867683.png','2022-01-04 08:24:46','2022-01-04 08:24:46'),(7,'Title','slides/16412846973094.png','2022-01-04 08:24:57','2022-01-04 08:24:57'),(8,'Title','slides/16412847082575.png','2022-01-04 08:25:08','2022-01-04 08:25:08');
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('superAdmin','admin','notifyAdmin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` enum('pb','kpk','sd','ajk','ba','gb') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Super Admin',NULL,'superAdmin','superadmin@gmail.com',NULL,'$2y$10$TUZrO4KaIXtq6x6L3gYo0O5uuthh.rxuvwnwLnzyn5L/gtOVuAUSi',NULL,'bXyO8eSngs70HBfrbRTmtvkqFEs9ljp3GAcxK0Sjsm559oG5XJU9mvc8oZsk','2021-08-07 12:03:17','2021-08-07 12:03:47'),(4,'Super Admin',NULL,'superAdmin','WaqarAhmad.Dev@gmail.com',NULL,'$2y$10$tgbdX.aFLk39Bz1gCp3UMOPyYIKRdQCX41XUskZ0dbuf5uADA751e',NULL,NULL,'2021-08-07 12:03:17','2021-10-08 19:38:08');
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

-- Dump completed on 2022-03-20 19:36:03
