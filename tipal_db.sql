/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.27-MariaDB : Database - db_web2_tipalsyah
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_web2_tipalsyah` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_web2_tipalsyah`;

/*Table structure for table `21312071_uts1` */

DROP TABLE IF EXISTS `21312071_uts1`;

CREATE TABLE `21312071_uts1` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uts1_f1` varchar(255) NOT NULL,
  `uts1_f2` varchar(255) NOT NULL,
  `uts1_f3` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `21312071_uts1` */

/*Table structure for table `21312071_uts2` */

DROP TABLE IF EXISTS `21312071_uts2`;

CREATE TABLE `21312071_uts2` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uts2_f1` varchar(255) NOT NULL,
  `uts2_f2` varchar(255) NOT NULL,
  `uts2_f3` varchar(255) NOT NULL,
  `id_uts1` bigint(20) unsigned NOT NULL,
  `id_uts3` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `21312071_uts2_id_uts1_foreign` (`id_uts1`),
  CONSTRAINT `21312071_uts2_id_uts1_foreign` FOREIGN KEY (`id_uts1`) REFERENCES `21312071_uts1` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `21312071_uts2` */

/*Table structure for table `cast` */

DROP TABLE IF EXISTS `cast`;

CREATE TABLE `cast` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `umur` int(11) NOT NULL,
  `bio` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cast` */

insert  into `cast`(`id`,`nama`,`umur`,`bio`,`created_at`,`updated_at`) values 
(12,'tipal',21,'mahasiswa','2023-08-30 05:44:50','2023-08-30 05:44:50'),
(13,'cansa',21,'mahasiswa','2023-08-30 07:09:05','2023-08-30 07:16:14');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `film` */

DROP TABLE IF EXISTS `film`;

CREATE TABLE `film` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(45) NOT NULL,
  `ringkasan` text NOT NULL,
  `tahun` int(11) NOT NULL,
  `poster` varchar(45) NOT NULL,
  `genre_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `film_genre_id_foreign` (`genre_id`),
  CONSTRAINT `film_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `film` */

insert  into `film`(`id`,`judul`,`ringkasan`,`tahun`,`poster`,`genre_id`,`created_at`,`updated_at`) values 
(6,'ilham','sasa',2010,'asa',1,'2023-09-02 15:55:29','2023-09-02 15:55:29'),
(7,'dilan','cerita dilan 1990',2018,'keren',3,'2023-09-05 15:18:47','2023-09-05 15:18:47'),
(8,'dorax','lucu',2023,'keren',3,'2023-09-06 11:38:42','2023-09-06 11:38:42'),
(9,'mahabasrata','jadul',2013,'india',3,'2023-09-07 15:29:07','2023-09-07 15:29:07');

/*Table structure for table `genre` */

DROP TABLE IF EXISTS `genre`;

CREATE TABLE `genre` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `genre` */

insert  into `genre`(`id`,`nama`,`created_at`,`updated_at`) values 
(1,'ilham',NULL,NULL),
(3,'romansa','2023-09-05 15:17:50','2023-09-05 15:17:50');

/*Table structure for table `history_casts` */

DROP TABLE IF EXISTS `history_casts`;

CREATE TABLE `history_casts` (
  `cast_id` int(11) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `umur` varchar(50) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `history_casts` */

insert  into `history_casts`(`cast_id`,`action`,`time`,`nama`,`umur`,`bio`) values 
(17,'Updated','08:38:32','jinan','20','pelajar'),
(15,'Updated','10:07:01','arif','23','pelajar'),
(15,'Updated','15:17:09','arif','23','mahasiswa'),
(15,'Updated','22:49:15','arif','23','pelajar'),
(15,'Deleted','09:34:10','arif','23','mahasiswa');

/*Table structure for table `kritik` */

DROP TABLE IF EXISTS `kritik`;

CREATE TABLE `kritik` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `login_id` int(11) unsigned NOT NULL,
  `film_id` bigint(20) unsigned NOT NULL,
  `content` text NOT NULL,
  `point` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kritik_user_id_foreign` (`login_id`),
  KEY `kritik_film_id_foreign` (`film_id`),
  CONSTRAINT `kritik_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`),
  CONSTRAINT `user_login` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kritik` */

insert  into `kritik`(`id`,`login_id`,`film_id`,`content`,`point`,`created_at`,`updated_at`) values 
(4,19,6,'bagus',10,'2023-09-06 06:15:01','2023-09-06 06:15:01'),
(5,19,6,'bagus',100,'2023-09-06 06:29:00','2023-09-08 07:59:34');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `namadepan` varchar(50) NOT NULL,
  `namabelakang` varchar(50) NOT NULL,
  `gender` char(20) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `login` */

insert  into `login`(`id`,`user`,`password`,`namadepan`,`namabelakang`,`gender`,`remember_token`) values 
(19,'tipal','$2y$10$ZA59QnlS8IBqq5X0I7NlJer1u7HYEF46gwFMWnFBZTt5suqdGWEo.','tipal','syah','female','MgH640dX2uIzqasfdtHxYGYYre1YdQSg0eMjSS2Ji7EQMg4O2mUVpKodG5yV'),
(20,'cansa','$2y$10$9RSXMYy1RBnYAurGzdamEul8T71aoZA6U4c3kW/xghwq0NnEOa63e','cansa','amaida','male','HknTc1NgJABPyOOS8yM8De2TZFLRAStXA9brvPMdvmQNFMCTAbBLcQpHdoq4');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2023_08_18_061426_create_genre_table',1),
(6,'2023_08_18_061440_create_cast_table',1),
(7,'2023_08_18_061501_create_profile_table',1),
(8,'2023_08_18_061515_create_film_table',1),
(9,'2023_08_18_061559_create_peran_table',1),
(10,'2023_08_18_061610_create_kritik_table',1),
(11,'2023_09_02_031959_add_remember_token_to_login_table',2),
(12,'2023_09_03_083448_add_reset_token_to_login_table',3),
(13,'2023_09_04_025445_add_reset_token_created_at_to_login',4),
(14,'2023_09_08_081558_create_npm_uts1_table',5),
(15,'2023_09_08_081751_create_npm_uts2_table',5),
(16,'2023_09_08_081829_create_npm_uts3_table',5),
(17,'2023_09_08_083442_create_21312071_uts1_table',6);

/*Table structure for table `npm_uts1` */

DROP TABLE IF EXISTS `npm_uts1`;

CREATE TABLE `npm_uts1` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uts1_f1` varchar(255) NOT NULL,
  `uts1_f2` varchar(255) NOT NULL,
  `uts1_f3` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `npm_uts1` */

/*Table structure for table `npm_uts2` */

DROP TABLE IF EXISTS `npm_uts2`;

CREATE TABLE `npm_uts2` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uts2_f1` varchar(255) NOT NULL,
  `uts2_f2` varchar(255) NOT NULL,
  `uts2_f3` varchar(255) NOT NULL,
  `id_uts1` bigint(20) unsigned NOT NULL,
  `id_uts3` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `npm_uts2_id_uts1_foreign` (`id_uts1`),
  KEY `id_uts3` (`id_uts3`),
  CONSTRAINT `npm_uts2_ibfk_1` FOREIGN KEY (`id_uts3`) REFERENCES `npm_uts3` (`id`),
  CONSTRAINT `npm_uts2_id_uts1_foreign` FOREIGN KEY (`id_uts1`) REFERENCES `npm_uts1` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `npm_uts2` */

/*Table structure for table `npm_uts3` */

DROP TABLE IF EXISTS `npm_uts3`;

CREATE TABLE `npm_uts3` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uts3_f1` varchar(255) NOT NULL,
  `uts3_f2` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `npm_uts3` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `peran` */

DROP TABLE IF EXISTS `peran`;

CREATE TABLE `peran` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `film_id` bigint(20) unsigned NOT NULL,
  `cast_id` bigint(20) unsigned NOT NULL,
  `nama` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peran_film_id_foreign` (`film_id`),
  KEY `peran_cast_id_foreign` (`cast_id`),
  CONSTRAINT `peran_cast_id_foreign` FOREIGN KEY (`cast_id`) REFERENCES `cast` (`id`),
  CONSTRAINT `peran_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `peran` */

insert  into `peran`(`id`,`film_id`,`cast_id`,`nama`,`created_at`,`updated_at`) values 
(2,7,12,'nova','2023-09-07 16:08:13','2023-09-08 08:06:50'),
(3,8,12,'cansa','2023-09-07 16:13:02','2023-09-08 07:19:50'),
(4,9,13,'adit','2023-09-08 07:55:18','2023-09-08 07:55:18');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `profile` */

DROP TABLE IF EXISTS `profile`;

CREATE TABLE `profile` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `umur` int(11) NOT NULL,
  `bio` text NOT NULL,
  `alamat` text NOT NULL,
  `login_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_user_id_foreign` (`login_id`),
  CONSTRAINT `login_user` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `profile` */

insert  into `profile`(`id`,`umur`,`bio`,`alamat`,`login_id`,`created_at`,`updated_at`) values 
(1,20,'mahasiswa','kalianda',20,'2023-09-06 10:54:40','2023-09-06 10:55:20');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
