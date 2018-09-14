-- MySQL dump 10.16  Distrib 10.3.9-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: laravel_feature
-- ------------------------------------------------------
-- Server version	10.1.31-MariaDB

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `serial` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Laravel','2018-06-29 22:39:20','2018-09-12 08:24:21',1,1),(4,'JavaScript','2018-06-29 22:39:20','2018-09-12 09:48:19',2,0),(5,'Ruby','2018-06-29 22:39:20','2018-09-12 08:38:10',3,1),(6,'Politics','2018-06-29 23:00:40','2018-09-12 08:38:17',4,1),(8,'Java','2018-06-30 00:10:45','2018-09-12 08:38:31',5,1),(9,'Sports','2018-07-05 00:30:37','2018-09-12 08:40:41',6,1),(10,'Football','2018-07-05 02:52:53','2018-09-12 08:40:47',7,1),(12,'Cricket','2018-09-12 09:37:11','2018-09-12 09:37:11',8,1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment_replies`
--

DROP TABLE IF EXISTS `comment_replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment_replies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` int(10) unsigned NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_replies_comment_id_index` (`comment_id`),
  CONSTRAINT `comment_replies_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment_replies`
--

LOCK TABLES `comment_replies` WRITE;
/*!40000 ALTER TABLE `comment_replies` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment_replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_index` (`post_id`),
  CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,13,0,'Ashik Chowdhury','ashikbracu@gmail.com','asdasdasd',NULL,NULL,'');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2018_06_23_061407_create_roles_table',1),('2018_06_25_105745_add_photo_id_to_users',1),('2018_06_25_142852_create_photos_table',1),('2018_06_27_103856_create_posts_table',1),('2018_06_27_172256_create_categories_table',1),('2018_07_02_051311_create_comments_table',2),('2018_07_02_051336_create_comment_replies_table',2),('2018_07_02_112135_add_photo_column_to_comments',3),('2018_07_02_112730_add_photo_column_to_comments_replies',3),('2018_07_04_061217_add_slug_to_posts_table',4),('2018_09_07_152337_add_some_new_fields_on_posts_table',5),('2018_09_07_155629_add_photo_source_on_posts_table',6),('2018_09_07_161846_create_post_types_table',7),('2018_09_12_135431_add_status_serial_to_users_table',8),('2018_09_13_145556_add_visit_count_column_on_posts_table',9),('2018_09_13_180010_add_serial_column_on_post_type_table',10),('2018_09_14_150904_add_fb_link_in_users_table',11);
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
INSERT INTO `password_resets` VALUES ('ashikbracu@gmail.com','$2y$10$DNWyVj9jMAU3UvZy6xQnyO3//ywTRc3T1DFVVP0mHr/TWuWiyBuqq','2018-09-08 06:22:03');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (33,'1531125904211dfe7b11aab3ee8245ffe23dbfb0d2-5b3c7400a1b42.jpg','2018-07-09 02:45:05','2018-07-09 02:45:05'),(34,'1531125924batman_why_so_serious_4k_8k-7680x4320.jpg','2018-07-09 02:45:24','2018-07-09 02:45:24'),(35,'1531125936MSPbb (45).jpg','2018-07-09 02:45:36','2018-07-09 02:45:36'),(36,'1531125958main-qimg-2f8b94c61e36ac380c9ae43bb98f8578.png','2018-07-09 02:45:58','2018-07-09 02:45:58'),(37,'153112608602171_romanticcottage_1920x1080.jpg','2018-07-09 02:48:06','2018-07-09 02:48:06'),(38,'153112610002164_sahara_2560x1600.jpg','2018-07-09 02:48:20','2018-07-09 02:48:20'),(39,'1531126113c579b307e2a63d4fa0114499bb558bf7-5b3dc4ea0171e.jpg','2018-07-09 02:48:33','2018-07-09 02:48:33'),(40,'153112612602154_standalonecleanwallpaper_1920x1080.jpg','2018-07-09 02:48:46','2018-07-09 02:48:46'),(41,'153112615202154_standalonecleanwallpaper_1920x1080.jpg','2018-07-09 02:49:12','2018-07-09 02:49:12'),(42,'153112616436318553_1970400396339508_4539609320374927360_o.jpg','2018-07-09 02:49:24','2018-07-09 02:49:24'),(43,'15311261863034050461_4058091490_o.jpg','2018-07-09 02:49:46','2018-07-09 02:49:46'),(44,'153112621902159_sunset_1920x1080.jpg','2018-07-09 02:50:19','2018-07-09 02:50:19'),(45,'1531126272neymar_127.jpg','2018-07-09 02:51:12','2018-07-09 02:51:12'),(46,'1531126288prv_1531013912.jpeg','2018-07-09 02:51:28','2018-07-09 02:51:28'),(47,'153112631702186_dragonfrog_1920x1080.jpg','2018-07-09 02:51:57','2018-07-09 02:51:57'),(48,'1531126344neymar_127.jpg','2018-07-09 02:52:24','2018-07-09 02:52:24'),(49,'1531126359screenshot-www.themesindustry.com-2018.07.02-12-58-28.png','2018-07-09 02:52:39','2018-07-09 02:52:39'),(50,'1531126413ronaldo_and_higuain.jpg','2018-07-09 02:53:33','2018-07-09 02:53:33'),(51,'1531126476ronaldo_and_higuain.jpg','2018-07-09 02:54:36','2018-07-09 02:54:36'),(52,'1531198884prv_1531076442.jpeg','2018-07-09 23:01:24','2018-07-09 23:01:24'),(53,'15327610973034050461_4058091490_o.jpg','2018-07-28 00:58:17','2018-07-28 00:58:17'),(54,'153278563413.jpg','2018-07-28 07:47:14','2018-07-28 07:47:14'),(55,'153278659491.jpg','2018-07-28 08:03:14','2018-07-28 08:03:14'),(56,'153278887461.png','2018-07-28 08:41:14','2018-07-28 08:41:14'),(57,'153283689844.png','2018-07-28 22:01:38','2018-07-28 22:01:38'),(58,'153283731647.png','2018-07-28 22:08:37','2018-07-28 22:08:37'),(59,'153283764354.jpg','2018-07-28 22:14:03','2018-07-28 22:14:03'),(60,'153283790871.jpg','2018-07-28 22:18:28','2018-07-28 22:18:28'),(61,'153633612659c1984e1eddfe6ff51be814c7cd0a54-5b9212d933bfb.jpg','2018-09-07 10:02:06','2018-09-07 10:02:06'),(62,'153686101938461313_2138770809673358_1791385500011986944_n.jpg','2018-09-13 11:50:19','2018-09-13 11:50:19');
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_types`
--

DROP TABLE IF EXISTS `post_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `serial` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_types`
--

LOCK TABLES `post_types` WRITE;
/*!40000 ALTER TABLE `post_types` DISABLE KEYS */;
INSERT INTO `post_types` VALUES (1,'Features','2018-09-07 10:36:38','2018-09-13 12:19:11',1),(2,'Sub-Features 1','2018-09-07 10:39:40','2018-09-13 12:19:17',2),(3,'Sub-Features 2','2018-09-08 09:32:00','2018-09-13 12:19:22',3),(4,'Editor\'s Pick','2018-09-13 12:19:37','2018-09-13 12:19:37',4);
/*!40000 ALTER TABLE `post_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `photo_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_type` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `photo_source` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visit_count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_index` (`user_id`),
  KEY `posts_category_id_index` (`category_id`),
  KEY `posts_photo_id_index` (`photo_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (2,2,5,33,'Odio qui sed rem iure nihil.','<p>Accusantium officiis animi commodi ducimus aut earum vel deserunt. Sed sapiente architecto earum dolores consectetur. Perferendis sit ab ut autem omnis. Culpa molestiae est ut facere quo ut odit qui. Incidunt aut assumenda est adipisci ipsa. Eius magni laboriosam voluptate ut. Qui cupiditate fugiat nobis sit nisi. Ut natus voluptatem qui impedit velit laborum quia nesciunt. Voluptate recusandae tempore aut tenetur mollitia nihil ut qui. Numquam reiciendis et atque. Dolores dolorum magni at reiciendis. Excepturi dolor facilis minima laboriosam. Debitis et vel consequuntur. Sed fuga in facilis officia. Aut fugiat facere et maiores dolore ex. Commodi debitis magnam ducimus et. Cumque atque deleniti et cumque soluta quis. Porro id sit recusandae praesentium quaerat dolorem. Repudiandae occaecati quisquam sequi animi. Omnis officia itaque illo accusantium aliquid adipisci repudiandae ullam. Omnis veniam unde eligendi ducimus et. Nostrum saepe dolorum atque quis. Sint corrupti praesentium id omnis et itaque ea qui. Quia corrupti accusamus iure. Est qui eos ullam sed. Nesciunt quo ut est modi. Ut non nostrum omnis non ut. Quisquam et quas molestiae. Rerum a quam explicabo ea. Temporibus nihil cumque aliquid voluptatem. Repudiandae sunt sit impedit error. Repellendus nostrum et nulla rerum. At ipsam beatae id ut sed qui est. Minus qui quae nesciunt delectus beatae. Qui modi dolore nesciunt minima accusantium dolore accusantium. Molestias nihil excepturi dolor et aut. Quia et eveniet doloremque odit est. Ab voluptas et modi quo quo quam. Quia sit a adipisci corporis. Nesciunt laudantium aut laboriosam. Qui voluptatem laborum quia nostrum iure et porro.</p>','2018-07-09 02:37:33','2018-09-14 05:10:58','odio-qui-sed-rem-iure-nihil.-1536923458',4,0,11,NULL,'Prothom alo',0),(3,3,4,34,'Nisi quod cupiditate quos voluptatem explicabo.','<p>Ut aliquid dolorem neque minima. Aliquid quia nemo maxime voluptatem voluptas. Illo vero quos sit similique non error maxime. Aspernatur eaque sed natus. Molestias a aspernatur consequatur id in praesentium cum. Autem explicabo ea labore. Est neque aperiam quia facilis veniam voluptas non. Sit quam qui omnis ut laudantium. Molestiae qui repudiandae debitis dolores natus. Aliquam laboriosam eligendi accusantium veniam nobis saepe. Qui consequatur molestias et ipsum eum dolores fugiat. Natus aut architecto consequatur nisi ducimus et quisquam enim. Dolores eveniet ullam distinctio culpa saepe nulla et. Adipisci id maxime non quia dolorum voluptatem. Et tenetur eum illum hic numquam dolores laudantium. Qui fugiat quae corporis aut. Totam enim ipsum fugit. Dicta libero maiores ut quaerat magni est totam. Eos sit aut at quas. Quod voluptatem odio laudantium et necessitatibus qui voluptas in. Sit quae doloremque assumenda nostrum. Possimus sit et quas aliquid labore. Sit numquam quos quos. Quae rem praesentium non. Sed natus minus quo explicabo accusantium sunt. Laborum sint est ut corrupti quod. Unde est quasi quasi corrupti odio mollitia natus. Iure eos eum officiis expedita itaque et voluptas. Dolore corporis magni numquam sed officia velit animi. Dolorem incidunt deleniti nihil. Voluptatem minima necessitatibus qui accusantium. Laborum suscipit magnam ipsa reprehenderit laborum. Aut accusamus velit illo adipisci error eum blanditiis. Dolorum optio vel nesciunt omnis quibusdam quo. Voluptatem id voluptatem quam. Sapiente molestias atque similique. Sed eaque quos corrupti odio qui quia nihil. Vero omnis omnis molestiae excepturi doloremque natus. Nam qui quis cupiditate illo. Ea assumenda illo tempora.</p>','2018-07-09 02:37:33','2018-09-14 05:11:07','nisi-quod-cupiditate-quos-voluptatem-explicabo.-1536923467',4,0,11,NULL,'Prothom alo',1),(4,4,8,35,'Assumenda non eum quam vitae doloremque.','<p>Enim autem veritatis quia est molestiae neque molestias. Sit eos voluptatibus sapiente doloremque nam. Non repellat sint est recusandae ut. Officia minus assumenda ea magnam. Excepturi quis rerum doloribus beatae sed laborum autem. Sint aspernatur eveniet dolore. Voluptatem nemo et itaque velit magni porro magnam. Rerum et recusandae id impedit praesentium quis non ab. Cumque ut est quo quia eos ducimus officia. Autem reiciendis perferendis dolor assumenda est in. Labore et quos est. Autem est corporis omnis numquam aut. Ducimus quibusdam occaecati aperiam maxime cumque incidunt sit. Quo rerum officiis saepe. Et accusamus voluptates nihil alias. Voluptate at distinctio et dignissimos debitis voluptas rerum. Eos perspiciatis qui rerum non. Sit est nobis quas non enim non cupiditate quae. Dolorem aut qui voluptates est optio nam quasi. Architecto eum sunt nulla enim. Temporibus neque magni at ea autem. Nobis est enim vero est eaque dolore eos. Cumque perferendis voluptas minima rerum omnis sunt ratione. Consequatur id qui facere. Iusto facere omnis dolorum ipsam porro et. Reiciendis iste culpa fugit amet similique porro qui repudiandae. Qui error dolor omnis et dolores illo omnis. Consectetur est accusamus voluptatibus temporibus molestias repudiandae accusamus. Enim autem et ipsum laudantium. Assumenda consequatur eligendi soluta nihil est. Consequatur et aliquid quia eos et. Nulla et sunt tenetur voluptatum voluptas delectus. Voluptatem aut consequatur cumque nihil. Nobis dolores quidem dolorem quis sit perferendis. Quis et earum voluptatem velit eius iusto consequuntur. Rerum magnam sit corporis voluptas autem. Autem et dolorum ut vero quos aut nesciunt. Atque cumque quo consequuntur culpa molestias voluptatem enim. Et harum doloremque dicta facere fugiat vitae provident. Voluptatem qui atque ut sint odio illo. Quis ex libero dicta et tenetur iure. Id et eum voluptatem voluptatem omnis enim. Ducimus veniam nulla consequuntur expedita sed architecto ut. Ullam impedit doloribus et voluptas facere.</p>','2018-07-09 02:37:33','2018-09-14 05:12:19','assumenda-non-eum-quam-vitae-doloremque.-1536923477',4,0,11,NULL,'Prothom alo',1),(5,5,4,36,'Voluptatibus odio delectus est voluptatem velit doloremque dolores autem.','Eveniet consequatur et soluta fuga ut est. Voluptatem nisi esse sint. Et sequi vitae aut vel.\n\nBeatae vel tempore corrupti corrupti exercitationem id omnis. Et et esse ducimus ut.\n\nAliquid molestiae et in non et. Quia ut id cumque autem doloribus est. Voluptatem ea porro facere et sint. Fugiat a tempore non ea.\n\nSimilique in magnam cum sit laboriosam. Aut sequi dolor illo quibusdam. Rerum quae in soluta sit dolore quae.\n\nDolores architecto enim optio quidem commodi. Illum et asperiores et est qui. Ut enim qui et et et consequatur.\n\nIpsum veritatis voluptatum fugit ut saepe neque. Id temporibus dolorem est itaque eos doloremque. Ipsa dolorum repellendus minima tempore quidem omnis aliquam. Aspernatur voluptatem qui aut sed cupiditate at aut illum.\n\nConsectetur nulla enim eos ea veniam. Repellendus voluptatibus distinctio omnis quia omnis. Mollitia culpa unde est omnis voluptas ipsa. Magnam sapiente eligendi aut consequatur voluptates sit quae.\n\nDistinctio facere vero quo quo delectus. Fuga provident aliquid quia ipsa. Quod libero nostrum aut et et illo magnam.\n\nVitae sit accusamus et minima. Commodi ea qui illum. Laboriosam nesciunt et neque voluptatem est similique dolorem. Ut voluptates animi aliquam animi.\n\nEst est enim quibusdam minus ut repellendus. Sed architecto est sit impedit eaque. Magnam nostrum at voluptas consequuntur vero sed non animi.','2018-07-09 02:37:33','2018-07-09 02:37:33','iusto-corrupti-suscipit-eum-perspiciatis1531125453',0,0,0,NULL,NULL,0),(7,7,5,40,'Consequuntur dolor eos voluptatem velit at quisquam.','Quasi aperiam ea fuga consequatur voluptas. Quaerat explicabo quia rerum optio aut et inventore qui. At ducimus blanditiis optio in. Dolor et alias fuga. Qui distinctio sit mollitia vitae nobis amet rerum.\n\nFacere delectus non et ut error veniam animi tempora. Optio est ullam quis. Eveniet ut velit sint. Dolorem quo illo quia illum doloribus.\n\nEt maxime facilis consequatur ut. In facere vero corrupti non sit est sint vel. Quaerat quidem fuga reiciendis corrupti velit reprehenderit sed.\n\nBeatae cupiditate est officia amet blanditiis officiis. Eligendi corrupti corporis accusantium in. Et nihil commodi qui omnis. Vitae doloribus earum velit et. Et enim facere repudiandae sit repudiandae necessitatibus ex.\n\nLaudantium quidem quas qui cum praesentium animi veniam et. In doloribus cum aut modi. Aut eveniet molestiae non corrupti modi.\n\nRepudiandae consectetur vel ratione cumque qui et ut. Quia quis hic velit. Consequatur iusto officiis a iste quia sint.\n\nNobis accusamus cumque nostrum praesentium hic. Animi dicta doloremque magnam architecto exercitationem deleniti. Veniam animi provident ea sed et. Ipsam quibusdam quia excepturi aspernatur ducimus quidem enim.\n\nRepellendus et adipisci corporis qui eaque tenetur nobis. Itaque sit delectus aut id. Cupiditate vero sint voluptatum non aperiam.\n\nDolorem perferendis est ut labore ea vero. Asperiores repellendus ratione blanditiis qui. Asperiores earum neque sunt corporis qui hic repellat optio. Et deleniti quia voluptatum aliquid nihil eum.\n\nNisi et est repellat minus repellat tenetur omnis. Et accusamus asperiores voluptatem qui quia ipsam voluptatem. Corporis id optio est ut id assumenda.\n\nSit qui deserunt nulla voluptatem aut in. Recusandae est iste aut. Labore et quam voluptatem quasi.\n\nAut ut aliquam nemo excepturi eos. Eligendi velit rerum sequi. Velit iusto mollitia molestiae dolorum. Amet sapiente illo officiis dolor.\n\nUt itaque reprehenderit repellendus cum consectetur mollitia. Ratione est et nisi vero distinctio aliquam. Deleniti quibusdam repudiandae reiciendis est distinctio.','2018-07-09 02:37:33','2018-07-09 02:37:33','qui-repudiandae-maiores-commodi1531125453',0,0,0,NULL,NULL,0),(8,8,1,37,'Perspiciatis placeat eum exercitationem nihil nemo placeat ullam sunt excepturi.','<p>Vel molestiae et maiores aut blanditiis tempora. Dolorem suscipit nisi sit dolor expedita architecto commodi cupiditate. Aliquid aut eum consequuntur animi est qui omnis dicta. Est quo quam fuga tempora ipsum. Eum vitae illo dignissimos in explicabo enim nesciunt. Ea natus aliquid neque. Cumque ut sint suscipit voluptas soluta aut quibusdam. Dolores voluptatem provident inventore impedit quia cumque expedita maxime. Perferendis sit facere consequatur culpa nemo. Eveniet qui illo deleniti dolorem quod. Omnis repellat qui magnam enim. Officia reprehenderit eum expedita voluptatibus. Assumenda qui illo eius optio nihil facere debitis ea. Et neque possimus explicabo consectetur. Quasi ea tenetur accusamus ducimus. Totam aut eligendi nostrum iure. Labore dolorum enim nesciunt facilis et. Suscipit incidunt qui unde culpa. Minus iusto accusantium eveniet distinctio. Quisquam atque exercitationem non odit et animi et vel. Pariatur dolor quae vero aut quasi eaque in. Eum et ex quo velit quis. Consequatur optio amet temporibus sint. Non doloremque nulla nostrum aliquid. Eaque rerum non autem consequatur quo. Nulla perferendis cupiditate est eaque. Iure officia totam possimus facilis error ipsum voluptas. Mollitia molestiae ab magni id ut. Repudiandae nisi error alias facere velit. Quis fugit saepe qui dignissimos et alias nesciunt. Beatae reprehenderit quia ex. Animi accusamus corporis a. Explicabo veritatis non eos est eos et. Itaque culpa est dolorum porro et dolorem. Assumenda eum itaque corporis. Vero omnis eligendi illo rerum hic et alias. Totam in aut cumque amet doloremque porro quasi aut. Fugiat accusantium ea molestias voluptatem quisquam voluptas. Est sequi ipsum deleniti et enim aut non ut. Quam porro dolore quisquam sed. Qui rerum laborum enim qui eos tenetur ut. Minus ipsum deserunt debitis illum vel. Nihil et et asperiores voluptatem ut dolores consequuntur. Fugiat quam laborum ad placeat eligendi eum dolore. Fugiat nam ab voluptatem facilis beatae eum. Dignissimos distinctio non sequi quibusdam quae possimus. Sunt eius aut officiis sit aut.</p>','2018-07-09 02:37:34','2018-09-14 05:00:10','Perspiciatis-placeat-eum-exercitationem-nihil-nemo-placeat-ullam-sunt-excepturi.-1532763257',0,0,0,NULL,NULL,2),(9,9,8,38,'Dicta aut similique non asperiores sequi ratione sit assumenda.','Illum labore architecto quo necessitatibus odit et autem. Iusto officia aut voluptate eveniet enim harum. Explicabo qui perferendis quis adipisci tempore.\n\nEarum harum qui reprehenderit similique. Consequuntur hic est eum et. Ipsam eos velit consequatur ea minus eos.\n\nFugiat voluptatem tenetur temporibus dignissimos. Illo placeat et suscipit quo ex error ut. Asperiores animi ea in eum. Iusto explicabo debitis sunt et blanditiis.\n\nQui vero perferendis iusto non fugiat. Aspernatur qui esse aut voluptate beatae quis. Facere explicabo dolor eos. Et facere asperiores molestias sapiente et.\n\nQuaerat alias non ut fugiat dolorem. Eius veritatis dolore provident id suscipit quasi voluptatum. Aut illum ut vel autem.\n\nInventore adipisci sed facilis omnis. Rerum ex dolorem temporibus repudiandae impedit enim dicta. Voluptates nostrum et ut optio. Consequatur et numquam fugiat qui impedit vel facilis.\n\nSit vel qui veritatis laudantium quia placeat. Repudiandae et consectetur laboriosam et non.\n\nSit quia debitis vero enim accusamus unde. Magnam provident voluptatem nemo enim consequuntur libero.\n\nVoluptatum officia repudiandae sunt ut. Ut minus voluptatem sit sit. Alias facilis quam assumenda nesciunt similique deserunt velit. Quibusdam quas est qui et ducimus.\n\nMagni eveniet voluptate magnam distinctio qui non facilis. Incidunt omnis maxime perspiciatis omnis est commodi soluta rerum. Inventore placeat ullam itaque.','2018-07-09 02:37:34','2018-09-14 05:00:06','doloremque-qui-consequatur-rerum-et-eum-facilis1531125454',0,0,0,NULL,NULL,1),(10,10,6,38,'Quibusdam minus ipsa blanditiis vel porro optio ut autem illum.','<p>Et ut omnis nulla amet praesentium vitae atque aut. Quos repellat illo reiciendis. Minima tempora aut velit beatae aut. Quod ut enim voluptatum velit vel sunt eius. Voluptatem error quia ut quod iusto. Autem architecto et voluptas adipisci. Consequatur quo architecto sequi aut aperiam. Corporis earum delectus animi et suscipit magni. Quia quia odio dicta facere. Soluta debitis velit aliquam aut dolorem. Quas quia quisquam dolor. Fugit pariatur ipsum doloremque ullam sapiente libero. Et excepturi provident consequatur excepturi exercitationem quo pariatur. Asperiores distinctio sit vitae sit neque. In consectetur dolorem temporibus non ipsum magni. Et sunt consectetur aut libero. Aliquid omnis nobis voluptatum ab numquam. Sit repellat saepe consectetur occaecati ab assumenda voluptates. Dolorem enim possimus at recusandae quia. Vitae aut occaecati culpa earum error. Voluptates ad necessitatibus voluptatem vel labore. Quos ex repellat perferendis corporis. Facere quia autem odio explicabo quibusdam laboriosam. Natus temporibus modi velit voluptatem eaque labore dolore. Qui et laborum doloremque tempora dolor. Omnis qui aperiam aliquid incidunt iusto nam. Quos rerum consectetur expedita. Porro et laborum omnis ex sunt ad nisi. Aut reprehenderit dolores quia ipsa. Dolorem error vitae et. Aut voluptatem autem incidunt accusamus modi. Expedita eligendi et qui aut. Voluptatem voluptatibus magni beatae aut omnis. Et consequuntur maxime itaque iusto repellendus quam debitis. Doloribus est hic nesciunt possimus. Est fugit expedita ea. Quis provident dolorem in ut magni quo asperiores. Ut ut laboriosam repellendus repudiandae laudantium nisi autem. Ex voluptatum cupiditate optio impedit non. Assumenda voluptatem incidunt aut atque ducimus neque animi. Voluptatem porro asperiores facilis non consequatur. Pariatur nihil harum provident quia officia deserunt amet itaque. Illum vitae tenetur et quo nostrum asperiores quis.</p>','2018-07-09 02:37:34','2018-09-14 05:00:07','Quibusdam-minus-ipsa-blanditiis-vel-porro-optio-ut-autem-illum.-1532763400',3,0,0,NULL,NULL,2),(11,11,9,52,'Tamim urges team to keep the faith','<section class=\"cb-nws-dtl-itms\">\r\n<p>Bangladesh opener Tamim Iqbal said that the team was \'shocked\' with their performance in the opening Test against Windies as the team knows it is capable of performing better than what they did in Antigua.</p>\r\n<p>&nbsp;</p>\r\n</section>\r\n<section class=\"cb-nws-dtl-itms\">\r\n<p class=\"cb-nws-para\">&nbsp;</p>\r\n<p>Bangladesh found the bowling of their opposition too hot to handle on a sporting track as the hosts won by an innings and 219 runs, crushing them inside three days. The morale-shattering defeat was largely due to the failure of their batsmen to apply themselves against the new ball in both innings, helping Windies earn their biggest win at home.</p>\r\n</section>\r\n<section class=\"cb-nws-dtl-itms\">\r\n<p>Bangladesh were bowled out for their lowest Test score in the first innings, 43, while the second innings was only marginally better as they were reduced to 62 for 6 at the close of second day\'s play, after West Indies had put up massive 403 runs in their first innings.</p>\r\n</section>\r\n<section class=\"cb-nws-dtl-itms\">\r\n<p>\"We are shocked like everyone else as we know we are capable of performing better than what we did [in the opening game],\" Tamim confessed candidly while summing up Bangladesh\'s disastrous performance. \"We are not trying to make any excuses as we are aware that our mistakes were responsible for our downfall. The way we performed certainly cannot be acceptable,\" he added.</p>\r\n</section>\r\n<section class=\"cb-nws-dtl-itms\">\r\n<p>Tamim, who is regarded as one of the batting pillars for Bangladesh across formats, said that they are eyeing a comeback in the second Test through a better performance but also urged his team mates that it can only be possible if they have faith on their own ability.</p>\r\n</section>\r\n<section class=\"cb-nws-dtl-itms\">\r\n<p>\"For us the most important thing is to have faith on our abilities and back ourselves,\" said Tamim, who reached the 4000 Test runs landmark in Antigua. \"We must trust our own ability and believe that we can score big runs in difficult conditions. We have to believe that we are better than our opponent, both individually and team-wise,\" he added.</p>\r\n</section>\r\n<section class=\"cb-nws-dtl-itms\">\r\n<p>Bangladesh were ahead of Windies in the ICC Test rankings when they began their campaign. However, the hosts will leapfrog Bangladesh if they can earn a 1-0 win in the two-match Test series; implying the visitors have to come out victorious in the second Test if they want to maintain their spot.</p>\r\n</section>\r\n<section class=\"cb-nws-dtl-itms\">\r\n<p>\"The way Sohan [Nurul Hasan] batted and received the support from lower order [Rubel Hossain] in the opening Test, it suggests that if we can manage to stay at the wicket we are capable of scoring runs,\" Tamim concluded.</p>\r\n</section>','2018-07-09 23:01:24','2018-07-09 23:01:24','Tamim-urges-team-to-keep-the-faith-1531198884',0,0,0,NULL,NULL,0),(13,11,5,54,'A Discount Toner Cartridge Is Better Than Ever.','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde&nbsp;</p>','2018-07-28 07:47:14','2018-07-28 07:47:14','A-Discount-Toner-Cartridge-Is-Better-Than-Ever.-1532785634',0,0,0,NULL,NULL,0),(18,11,9,59,' সিলেটে টেস্ট খেলবে বাংলাদেশ','<div class=\"palo_web_news_div_orange\">১৫ নভেম্বর পূর্ণাঙ্গ একটি সিরিজ খেলতে বাংলাদেশে আসবে ওয়েস্ট ইন্ডিজ। তার আগেই ১৬ অক্টোবর বাংলাদেশে আসছে জিম্বাবুয়ে</div>\r\n<p><br />পূর্ণাঙ্গ সিরিজ খেলতে নভেম্বরে ঢাকায় আসছে ওয়েস্ট ইন্ডিজ ক্রিকেট দল। ক্যারিবীয়দের আগেই ঢাকায় পা রাখবে জিম্বাবুয়ে। আর এই সফরেই সিলেটে অনুষ্ঠিত হবে প্রথম টেস্ট।</p>\r\n<p>১৬ অক্টোবর ঢাকা পৌছে ১৬ নভেম্বর পর্যন্ত বাংলাদেশে অবস্থান করবে জিম্বাবুয়ে। এক মাসের সফরে বাংলাদেশের সঙ্গে খেলবে তিনটি ওয়ানডে ও দুটি টি টেস্ট ম্যাচের সিরিজ। সফরে একটি ওয়ানডে ও একটি তিন দিনের প্রস্তুতি ম্যাচও আছে। ঢাকা, চট্টগ্রাম ও সিলেটে অনুষ্ঠিত হবে ম্যাচগুলো।</p>\r\n<p>তিন ওয়ানডে সিরিজের প্রথম ম্যাচটি অনুষ্ঠিত হবে ঢাকার মিরপুর শেরেবাংলা স্টেডিয়ামে। সিরিজের দ্বিতীয় ও শেষ ওয়ানডেটি অনুষ্ঠিত হবে চট্টগ্রামের জহুর আহমেদ চৌধুরী স্টেডিয়ামে। ওয়ানডে সিরিজ শেষে তিন দিনের প্রস্তুতি ম্যাচটিও হবে বন্দর নগরীতে। এর পরে সেখান থেকে সিলেট যাত্রা। প্রথম টেস্টটি অনুষ্ঠিত হবে সিলেটেই। এর পরে ঢাকায় হবে শেষ টেস্ট।</p>','2018-07-28 22:13:47','2018-09-08 08:54:46','সিলেটে-টেস্ট-খেলবে-বাংলাদেশ-1536418486',2,0,11,NULL,'',0),(19,11,9,60,'সিনিয়রদের ছাড়া তরুণদের প্রমাণের সুযোগ','<div class=\"palo_web_news_div_orange\">পাঁচ ওয়ানডে ও তিনটি টি-টোয়েন্টির সিরিজ খেলতে আয়ারল্যান্ড যাচ্ছে বাংলাদেশ &lsquo;এ&rsquo; দল। এই সফরে একগাদা তরুণমুখ। সিনিয়র ক্রিকেটারদের অনুপস্থিতিতে নিজেদের প্রমাণের সুযোগ এই তরুণদের</div>\r\n<p><br />মাঝে প্রায় আট মাসের মতো কোনো খেলাই ছিল না বাংলাদেশ &lsquo;এ&rsquo; দলের। কিন্তু কিছুদিন ধরে আবার দারুণ ব্যস্ত সূচি। কয়েক দিন আগে বাংলাদেশ থেকে খেলে গেল শ্রীলঙ্কা &lsquo;এ&rsquo; দল। ওই সিরিজের রেশ না কাটতেই আজ আবার পাঁচ ওয়ানডে ও তিনটি টি-টোয়েন্টির সিরিজ খেলতে আয়ারল্যান্ড যাচ্ছে বাংলাদেশ &lsquo;এ&rsquo; দল।</p>\r\n<p>&lsquo;এ&rsquo; দলের সফরগুলোয় দলগত লক্ষ্যের চেয়ে ব্যক্তিগত লক্ষ্যটা কখনো কখনো বেশি গুরুত্ব পায়। কাল দলের কয়েকজন খেলোয়াড়ের সঙ্গে সংবাদমাধ্যমের আলাপচারিতায় ওই বিষয়টাই উঠে এল নতুন করে। এই যেমন উইকেটরক্ষক নুরুল হাসানের কথাই ধরুন। ওয়েস্ট ইন্ডিজে প্রথম টেস্টের দ্বিতীয় ইনিংসে ৬৪ রানের এক ইনিংস খেলে দলকে ১০০-এর নিচে অলআউট হওয়া থেকে বাঁচিয়েছেন। টেস্ট সিরিজের পর দেশে ফিরে আবার &lsquo;এ&rsquo; দলের হয়ে যাচ্ছেন আয়ারল্যান্ড।</p>\r\n<p>এটাকে দেখছেন নিজেকে প্রমাণের আরেকটি সুযোগ হিসেবে। আগামী বছর ইংল্যান্ডে হতে যাওয়া বিশ্বকাপ দলে জায়গা করে নেওয়ার লক্ষ্যটাও যেন উঁকি দিয়ে যায় তাঁর কথায়, &lsquo;আয়ারল্যান্ডে ভালো কিছু করতে পারলে, সেটা বিশ্বকাপে দলে যারা ডাক পাবে তাদের অনেক আত্মবিশ্বাস জোগাবে। আর তা ছাড়া জাতীয় দলে আমরা সিনিয়রদের পারফরম্যান্সের ওপর নির্ভরশীল। আমরাও যে দায়িত্ব নিতে পারি, এই সফরে সেটা প্রমাণেরও একটা সুযোগ।&rsquo;</p>\r\n<p>টি-টোয়েন্টি দলে ডাক পেয়ে ওয়েস্ট ইন্ডিজে পাড়ি দেওয়া সৌম্য সরকারের বদলি হয়ে যাচ্ছেন ডানহাতি ব্যাটসম্যান মোহাম্মদ মিঠুন। বিপিএলের পারফরম্যান্স দিয়ে বছরের শুরুতে জাতীয় দলে ফিরেছিলেন ত্রিদেশীয় সিরিজ ও শ্রীলঙ্কার বিপক্ষে টি-টোয়েন্টি সিরিজে। পরের সিরিজে আবার বাদ। তাঁরও লক্ষ্য আয়ারল্যান্ডে পারফরম্যান্স দিয়ে নির্বাচকদের দরজায় কড়া নাড়া, &lsquo;প্রতিপক্ষের চেয়ে বড় চ্যালেঞ্জ হলো ওখানকার কন্ডিশন। ওই কন্ডিশনে যারা ভালো খেলবে, নির্বাচকদের ভাবনায় তারা ভালোমতোই থাকবে। যেখানেই খেলি না কেন জাতীয় দলের ফেরার তাড়নাটা তো মনের মধ্যে থাকেই।&rsquo;</p>\r\n<p>প্রায় একই রকম লক্ষ্য অলরাউন্ডার আফিফ হোসেন ও অফ স্পিনার নাঈম হাসানেরও। বছরের শুরুতে শ্রীলঙ্কার বিপক্ষে টি-টোয়েন্টিতে আফিফের অভিষেক হলেও নাঈম হাসান এখনো অভিষেকের অপেক্ষায়। শ্রীলঙ্কার বিপক্ষে টেস্ট সিরিজের দলে ডাক পেয়ে অনূর্ধ্ব-১৯ বিশ্বকাপের মাঝপথে ফিরে এলেও সাইডলাইনে বসেই কাটাতে হয়েছিল নাঈমকে। ওই অর্থে আসলে দুজন জাতীয় দলের হয়ে নিজেদের প্রমাণের সুযোগই পাননি। আয়ারল্যান্ডে পারফর্ম করতে পারলে সুযোগটা হয়তো আবারও কড়া নাড়বে দরজায়।</p>','2018-07-28 22:18:28','2018-09-14 05:00:05','সিনিয়রদের-ছাড়া-তরুণদের-প্রমাণের-সুযোগ-1536418479',2,0,11,NULL,'',1),(20,11,10,62,' বাংলাদেশের ফুটবলকে অনেক দূর নিতে চান জেমি','<div class=\"palo_web_news_div\">এক-দুটি ম্যাচ নয়। ইংলিশ কোচ জেমি ডে অনেক দূর নিতে চান বাংলাদেশের ফুটবলকে। নয় বছর পর সাফ ফুটবলের সেমিফাইনাল প্রায় নিশ্চিত হয়ে যাওয়ার সব কৃতিত্ব তিনি দিয়েছেন ফুটবলারদের।</div>\r\n<p><a class=\"jw_media_holder media_image jwMediaContent alignleft pop-media-holder pop-active\"><span id=\"image-1378108\" class=\"jw-ari ari-fix\"><img src=\"https://paloimages.prothom-alo.com/contents/cache/images/0x480x1/uploads/media/2018/09/07/32adb8a1a834b2691bb2f615cf15d47a-5b923076d47a4.jpg\" alt=\"দুই -একটি জয়ে তুষ্ট নন বাংলাদেশের ইংলিশ কোচ জেমি ডে। ছবি: প্রথম আলো\" /></span></a></p>\r\n<p>&nbsp;</p>\r\n<p><a class=\"jw_media_holder media_image jwMediaContent alignleft pop-media-holder pop-active\"><span class=\"jw_media_caption\"><span class=\"tt\">দুই -একটি জয়ে তুষ্ট নন বাংলাদেশের ইংলিশ কোচ জেমি ডে। ছবি: প্রথম আলো</span></span></a>পরপর দুটি জয়। বাংলাদেশের ফুটবলে সাম্প্রতিক অস্থির সময় পেরিয়ে একটু শান্তির বাতাস। দুটি জয়ের সঙ্গেই জড়িয়ে সেন্টার ব্যাক তপু বর্মণের নাম। ভুটানের বিপক্ষে ২-০ জয়ে পেনাল্টিতে প্রথম গোলটি তাঁর। কাল পাকিস্তান ম্যাচে একমাত্র গোলটি করে তো ম্যাচসেরাই গত ঘরোয়া মৌসুমে সবচেয়ে দামি ফুটবলার।<br /><br />এমনিতে সংবাদ সম্মেলনে এসে দু-চার কথা বলার সুযোগ তেমন পান না তপু বর্মণ। তবে কাল এসে বেশ উপভোগ করলেন সাংবাদিকদের নানা প্রশ্ন। উচ্ছ্বাস ভাসিয়ে নিয়ে যাচ্ছিল তাঁকে। কোচ জেমি ডের পাশে বসে ফুরফুরে তপু বললেন, &lsquo;ঘরের মাঠ খেলা, জয়টা খুব দরকার ছিল। সতীর্থদের সবাইকে ধন্যবাদ যে সবাই কঠিন পরিশ্রম করেছে। আমি দারুণ আনন্দিত। ৯ বছর পর আমরা সাফের সেমিফাইনাল খেলছি (অঙ্কের হিসাবে এখনো অবশ্য নিশ্চিত নয়)।<br /><br />তবে দুই জয়ে সেমির পথে ৯৫ ভাগই এগিয়ে বাংলাদেশ। সেটি সম্ভব হয়েছে আসলে শেষ মুহূর্তে গোল খাওয়ার রোগের ওষুধ আবিষ্কার করতে পারায়। ওষুধের নাম ফিটনেস। এখন ফিটনেসে উন্নতি হওয়ায় শেষ সময়ে গোল খাওয়ার বদলে গোল দিতে পারছে বাংলাদেশ। তপু বর্মণ তাই গর্ব নিয়ে বলতে পারেন, &lsquo;আমরা পণ করেছি শেষ দিকে গোল খাব না, বরং গোল করব। সেটা আমরা করতে পেরেছি।&rsquo;</p>\r\n<p>পাকিস্তানি ফুটবলাররা লম্বা এবং শারীরিকভাবে এগিয়ে। এই দলের বিপক্ষে টক্কর দেওয়া সহজ ছিল না বাংলাদেশের জন্য। কীভাবে সেটা সম্ভব হলো? তপুর ভাষায়, &lsquo;শুধু পায়ে নয়, সেন্স কাজে লাগিয়ে খেলতে চেয়েছিলাম ওদের সঙ্গে। সেটা আমরা পেরেছি। এখানেই আমাদের সার্থকতা।&rsquo;</p>\r\n<p>তপুসহ বাংলাদেশের ৪ ডিফেন্ডার ভুল করেননি সেভাবে। গোলরক্ষক শহীদুলও বাজে ভুল করে বিপদে ফেলেননি দলকে। ডিফেন্ডার আর গোলকিপার সবাই সারাক্ষণ কথা বলেছেন। যাতে রক্ষণে ফাঁকফোকর বের না হয়। তা ছাড়া বিরতির সময় কোচ বলেছিলেন, পাকিস্তান একটা সময় ক্লান্ত হবে। কাজেই পরিশ্রম করতে থাকলে গোল আসবেই। সেই গোল এসেছে বলেই দর্শকে প্রায় ভরপুর বঙ্গবন্ধু স্টেডিয়াম তৃপ্ত। বেশি তৃপ্ত বোধ হয় অন্য দিনের চেয়ে বাংলাদেশের আক্রমণাত্মক ফুটবল দেখে। যে ফুটবলটা দেখা যায়নি ভুটানের বিপক্ষে।</p>\r\n<p>আক্রমণাত্মক মানসিকতারই ফসল জয়সূচক গোলটা। বাংলাদেশ দলের পরিকল্পনা ছিল, বিশ্বনাথের লম্বা থ্রোয়ে ডিফেন্ডার বাদশা ডামি করবেন। পেছনে থাকা তপু জালে ঠেলবেন বল। চিত্রনাট্য অনেকটা সেভাবেই মঞ্চায়িত হয়েছে।</p>\r\n<p>জেমি ডের হাত ধরে যে বাংলাদেশের ফুটবলে কিছুটা সুখের সময় এসেছে, তা নতুন করে বলার নেই। তবে কোচ এই জয়েও বরাবরের মতো ফুটবলারদের কৃতিত্ব দিলেন ষোলো আনা, &lsquo;১২ সপ্তাহে কঠিন পরিশ্রম করেছে ছেলেরা। এটা তারই ফল।&rsquo; তবে মনে করিয়ে দিয়েছেন আসল কথাটা, &lsquo;এক-দুটি ম্যাচটা জেতা মানেই সব জেতা নয়। আমাদের অনেক দূর যেতে হবে।&rsquo;</p>\r\n<p>পাকিস্তান কোচ জোসে আন্তোনিও নোগেইরার কথাবার্তায় মনে হলো, বাংলাদেশের কাছে হেরে হতাশ নন। তবে গোলটাকে তিনি আত্মঘাতী বলেছেন (অবশ্য তপু বর্মণ নিজেই বলেছেন, পোস্ট ঘেঁষে তাঁর হেড গেছে জালে)।&rsquo; বাংলাদেশের জামাল ভুঁইয়া ও সাদউদ্দিনের প্রশংসা করে পাকিস্তানের কোচ বললেন, &lsquo;দারুণ একটা ম্যাচ হয়েছে। আমি বলব ৫০-৫০। বাংলাদেশ আমাদের ব্লক করেছে নিচে। আমরাও করেছি। ওরা দারুণ ফুটবল খেলেছে, আমরাও ভালো করেছি। তবে আজ হারলেও ভুটানকে হারিয়ে আমরা সেমিতে যাব আশা করি।&rsquo;</p>\r\n<p>&lsquo;এ&rsquo; গ্রুপ থেকে সেমিতে যাওয়ার লড়াইয়ে এখন বাংলাদেশ, পাকিস্তান ও নেপাল। তিন দলের জন্যই উন্মুক্ত। কে জানে সাফ কাপ কী নাটকীয়তা নিয়ে অপেক্ষা করছে!</p>','2018-09-07 04:14:41','2018-09-14 09:01:36','বাংলাদেশের-ফুটবলকে-অনেক-দূর-নিতে-চান-জেমি-1536863208',4,0,11,NULL,'Prothom alo',1),(22,11,5,61,' কথাটা ওভাবে বলেননি সাকিব!','<div class=\"palo_web_news_div\">দুদিন আগে এক সাক্ষাৎকারে নিজের ফিটনেস নিয়ে সংশয় প্রকাশ করেন সাকিব। তবে কাল বিসিবিকে পাঠানো ই-মেইলে করেছেন অন্য দাবি।</div>\r\n<p>মাত্র ২০-৩০ ভাগ ফিটনেস নিয়ে কীভাবে এশিয়া কাপে খেলবেন সাকিব আল হাসান? বিশেষ করে তিনি নিজেই যখন বুঝতে পারছেন না এই ফিটনেস নিয়ে ব্যাটিং-বোলিং করবেন কীভাবে! কাল সন্ধ্যা পর্যন্ত প্রশ্নটা ছিল বিসিবিরও। দুদিন আগে একটি ইংরেজি দৈনিকে দেওয়া সাক্ষাৎকারে নিজের ফিটনেস নিয়ে করা সাকিবের এ মন্তব্যের পর বিসিবিও তাঁকে ধরে নিচ্ছিল &lsquo;আনফিট&rsquo;। কিন্তু সাকিবের এক ই-মেইলের পর রাতেই &lsquo;ইউটার্ন&rsquo;।</p>\r\n<p>সূত্র জানিয়েছে, বিসিবিকে পাঠানো ই-মেইলে সাকিব দাবি করেছেন, নিজের ফিটনেস নিয়ে সংশয় প্রকাশ করলেও ব্যাটিং-বোলিং করতে পারবেন না, এমন কথা তিনি বলেননি। এমনকি সাক্ষাৎকারটিকেও বলেছেন &lsquo;হালকা কথোপকথন&rsquo;। বিসিবির প্রধান নির্বাহী কর্মকর্তা নিজাম উদ্দিন চৌধুরী নিশ্চিত করেছেন সাকিবের ই-মেইলের বিষয়টি, &lsquo;সাকিব আমাদের জানিয়েছেন, তিনি ওভাবে কথাগুলো বলেননি। তাঁর বক্তব্য ভুলভাবে উপস্থাপন করা হয়েছে। দলের আগেই তিনি দুবাই পৌঁছে যাবেন।&rsquo;</p>\r\n<p>সাকিবের ফিটনেসের কথা ভেবে অবশ্য এর আগেই এশিয়া কাপের ১৫ সদস্যের দলের সঙ্গে ১৬ তম সদস্য হিসেবে যোগ করা হয় মুমিনুল হককে। অর্থাৎ সাকিব দলের সঙ্গে যাচ্ছেন, থাকবেন মুমিনুলও। বিসিবি সভাপতি নাজমুল হাসানকে উদ্ধৃত করে দুপুরে মিডিয়া কমিটির চেয়ারম্যান জালাল ইউনুসই জানান সেটি, &lsquo;সে (সাকিব) যদি এশিয়া কাপে যেতে চায়, আমরা বাধা দেব না। কিন্তু ২০-৩০ ভাগ ফিট মানে সে খেলার মতো অবস্থায় নেই, আনফিট। তার খেলা উচিত হবে না। দলের সঙ্গে তাই ১৬ তম সদস্য হিসেবে মুমিনুল হককে পাঠানো হচ্ছে।&rsquo;</p>\r\n<p>সাকিবের ফিটনেস-সংক্রান্ত আলোচনায় বেশ বিব্রতকর অবস্থায় পড়ে গিয়েছিল বিসিবি। উদ্ভূত পরিস্থিতিতে কী করবে না করবে, তা নিয়ে হয়ে পড়েছিল কিছুটা বিভ্রান্তও। জালাল ইউনুসের কথায়ও বোঝা গেছে তা, &lsquo;আমেরিকা যাওয়ার আগেও সাকিব বলেনি তাঁর হাতে ব্যথা, খেলতে পারবে না। ২০-৩০ ভাগ ফিট হলে আগে তা বোর্ডকে বলা উচিত ছিল। ও ঠিক কাজ করেনি। আমাদের একটা বিব্রতকর অবস্থার মধ্যে ফেলে দিয়েছে।&rsquo;</p>\r\n<p>কোচ স্টিভ রোডস অবশ্য মনে করছেন, সাকিবের কথাটাই ছিল ভুল, &lsquo;আমি বিশ্বাস করি না সে মাত্র ২০-৩০ ভাগ ফিট। আমার মনে হয় ও এর চেয়েও অনেক বেশি ফিট।&rsquo; কোচের এমন ভাবনার পেছনে কাজ করছে ওয়েস্ট ইন্ডিজে সাকিবের পারফরম্যান্স। এই চোট নিয়েই তো জুলাই-আগস্টের সফরে দারুণ খেলে এলেন সাকিব! দলের সঙ্গে তাঁর অনুশীলন না করাতেও কোনো সমস্যা দেখছেন না কোচ।</p>\r\n<p>অধিনায়ক মাশরাফি বিন মুর্তজাও সাকিবের ফিটনেস মূল্যায়ন করছেন সর্বশেষ সিরিজের পারফরম্যান্স দিয়ে, &lsquo;আপনি যদি সাকিবের পারফরম্যান্স (ওয়েস্ট ইন্ডিজে) দেখেন, তাহলে বলতে হবে আমাদের জয়ের জন্য সে অনেক বড় ভূমিকা পালন করেছে। আমার কাছে মনে হয় ও অতটুকু সুস্থ থাকলেই সেটা দলের জন্য যথেষ্ট।&rsquo;</p>\r\n<p>তবে এশিয়া কাপে খেলা বা না খেলার চূড়ান্ত সিদ্ধান্তটা সাকিবকেই নিতে হবে মনে করেন ওয়ানডে অধিনায়ক, &lsquo;সিদ্ধান্তটা সাকিবের। এখানে কারও হাত নেই। সিদ্ধান্ত নেওয়ার পর অজুহাতের কোনো জায়গা থাকার কথা না। সে যখন খেলবে, তখন শতভাগ দিয়েই খেলবে।&rsquo;</p>\r\n<p>বিসিবিকে পাঠানো ই-মেইলের পর সাকিবের সে সিদ্ধান্তও এখন জানা।</p>','2018-09-07 10:02:06','2018-09-14 04:36:36','কথাটা-ওভাবে-বলেননি-সাকিব!-1536338708',1,11,11,NULL,'Prothom alo',3);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'administrator',NULL,NULL),(2,'author',NULL,NULL),(3,'subscriber',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fb_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_index` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,3,0,'Carmelo Satterfield','auer.ibrahim@example.com','$2y$10$vAnRubrQA2gzHFLFOCNKbOaztoi6v7uGzrgXqTWTX5/gvH2CpE.hu','x9qfzX5ghW','2018-07-09 02:37:33','2018-07-09 02:45:05','33',''),(3,2,0,'Dale Fay','jeff49@example.org','$2y$10$Hs1dehZjlJQuihAp2inN2ec9ITkWcQRTmTRQjvF26j632wKHOFRoi','njvlXQjjew','2018-07-09 02:37:33','2018-07-09 02:45:24','34',''),(4,3,0,'Dr. Akeem Ullrich Sr.','stiedemann.trey@example.com','$2y$10$cV3uSFZTTMqM3d.dkJi3DuTBJeUdMSW654isaD30lDV48s6nJerxm','1rgXH1aWGY','2018-07-09 02:37:33','2018-07-09 02:46:05','36',''),(5,2,1,'Peyton Tromp','maida.greenfelder@example.org','$2y$10$woXGCtFrKGPXkmx6DIynM.cmqo0kHYI.RLFpyfYh6st/CTr.2N1CC','mApEct1B1n','2018-07-09 02:37:33','2018-07-09 02:37:33','43',''),(6,2,1,'Dr. Everette Kreiger','victoria08@example.net','$2y$10$0nB6iyDJdJy9Q5XcuAwZOulR1IglXqXM11v.Z2XkeJ6KaYZsJw4zS','iGqGjE1K5M','2018-07-09 02:37:33','2018-07-09 02:37:33','42',''),(7,3,1,'Dr. Magnolia Koss','gutkowski.ford@example.net','$2y$10$ZsBo4dpCk9wKTYRljqfJ3./oYU8HJkWdLgRXMf88QyaECafayLgPC','Fx1rxBLQyW','2018-07-09 02:37:33','2018-07-09 02:37:33','44',''),(8,2,0,'Mr. Osbaldo Gorczany III','purdy.elda@example.net','$2y$10$lJKWuN9LNFATf5FrX2shs.FvN91eSfQqDzO1DQTyhRck/6uIXi/Se','p6HPruQJ6q6a3RkZelF77syr3sD9EN6WlOiP5UIEtWU6DfuZD1xOFHe7noJi','2018-07-09 02:37:33','2018-07-09 02:37:33','45',''),(9,2,0,'Mr. Jerrold Quitzon I','kertzmann.judah@example.net','$2y$10$.JEjRU/nEXk/mbegUa7GlubmTM14et344DJ1vfOOR1.xgwAdGiHKG','UKmJgCEH3E','2018-07-09 02:37:33','2018-07-11 05:32:41','46',''),(10,3,1,'Reuben Schinner','kuphal.paxton@example.org','$2y$10$jvzVTX3qQlgfLxFl079SHe7.lPLcUAefyBjHrAe.nG1RwKiQO9jOm','ID7lAMNk5b','2018-07-09 02:37:33','2018-07-11 05:33:19','47',''),(11,1,1,'Ashik Chowdhury','ashikbracu@gmail.com','$2y$10$lJKWuN9LNFATf5FrX2shs.FvN91eSfQqDzO1DQTyhRck/6uIXi/Se','1iZNExt6oYahYEafR92PJMaW0Ya4BWmSy0bh5pTmG6T72RcAT2LEXmmfkMfv','2018-07-09 02:40:22','2018-09-14 09:23:39','35','https://www.facebook.com/ashik.chowdhury.96');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'laravel_feature'
--
