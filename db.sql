/*
SQLyog Enterprise v12.09 (64 bit)
MySQL - 10.1.22-MariaDB : Database - booksmanager
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` bigint(100) DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users_roles` (`role_id`),
  CONSTRAINT `FK_admin` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`role_id`,`name`,`username`,`phone`,`email`,`password`,`remember_token`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,1,'Admin','admin',923014012423,'admin@pakcheers.com','$2y$10$BSziN3/tSv8yOZ4B1KXJKuVO2uYQP2Y/gHiMJMex7/K7VD7SZzTSa','AN0ctBTE83BElrGj8ihOymDxwOLULm0fZc0OSI00tjsb1GMPBAVmwR6w2nsi',0,'2017-05-29 06:29:32',3,'2017-09-13 11:52:28');

/*Table structure for table `books` */

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rack_id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `pub_year` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Rack_Book_Fk` (`rack_id`),
  CONSTRAINT `Rack_Book_Fk` FOREIGN KEY (`rack_id`) REFERENCES `racks` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `books` */

insert  into `books`(`id`,`rack_id`,`title`,`author`,`pub_year`,`is_active`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,2,'Book1','Author1',1985,1,3,'2017-10-12 08:11:00',3,'2017-10-12 15:41:46'),(2,2,'Book2','Author2',1987,1,3,'2017-10-12 08:12:12',3,'2017-10-12 15:41:34'),(3,2,'Book3','Author3',1990,1,3,'2017-10-12 08:12:31',3,'2017-10-12 20:56:05'),(4,2,'Book4','Author4',1991,1,3,'2017-10-12 15:43:37',3,'2017-10-12 15:43:37'),(5,2,'Book5','Author5',1992,1,3,'2017-10-12 15:43:57',3,'2017-10-12 15:43:57'),(6,2,'Book6','Author6',1992,1,3,'2017-10-12 15:44:30',3,'2017-10-12 15:44:30'),(7,2,'Book7','Author7',1993,1,3,'2017-10-12 15:44:55',3,'2017-10-12 15:44:55'),(8,2,'Book8','Author8',1994,1,3,'2017-10-12 15:45:23',3,'2017-10-12 15:45:23'),(9,2,'Book9','Author9',1994,1,3,'2017-10-12 15:45:47',3,'2017-10-12 15:45:47'),(10,2,'Book10','Author10',1995,1,3,'2017-10-12 15:46:07',3,'2017-10-12 15:46:07'),(11,2,'Book11','Author11',1996,1,3,'2017-10-12 15:46:29',3,'2017-10-12 15:46:29'),(12,2,'Book12','Author12',1998,1,3,'2017-10-12 15:49:28',3,'2017-10-12 15:49:28'),(13,2,'Book13','Author13',1990,1,3,'2017-10-12 15:50:56',3,'2017-10-12 15:50:56'),(16,3,'Book4','Author1',1995,1,3,'2017-10-12 16:04:41',3,'2017-10-12 20:55:54'),(17,3,'Book3','Author1',1994,1,3,'2017-10-12 20:48:11',3,'2017-10-12 20:55:42'),(18,3,'Book2','Author1',1990,1,3,'2017-10-12 20:51:38',3,'2017-10-12 20:55:31'),(19,3,'Book1','Author1',1992,1,3,'2017-10-12 20:51:51',3,'2017-10-12 20:51:51');

/*Table structure for table `racks` */

DROP TABLE IF EXISTS `racks`;

CREATE TABLE `racks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `racks` */

insert  into `racks`(`id`,`name`,`is_active`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,'Rack1',1,3,'2017-10-11 18:50:38',3,'2017-10-11 18:50:38'),(3,'Rack2',1,3,'2017-10-11 19:02:32',3,'2017-10-11 19:02:32'),(4,'Rack3',1,3,'2017-10-12 20:56:40',3,'2017-10-12 20:57:24'),(5,'Rack5',0,3,'2017-10-12 20:57:45',3,'2017-10-12 22:15:22'),(6,'Rack4',1,3,'2017-10-12 20:58:00',3,'2017-10-12 20:58:00');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`is_active`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'admin',1,1,NULL,3,'2017-05-30 07:20:40');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`is_active`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,'M.Tanveer','tanveer@hotmail.com','$2y$10$JeEWWVnONg3Dvv6TeXlCneuKzGOQVp4GRIg72Qt5g4Dig1bylnTVu','v0NQpm1tY49NqItJv8bV8HsIl1CdI27L4vDnMe8iPGyAyu6tLjbu2hWWrllk',1,3,'2017-06-14 20:44:41',3,'2017-06-14 20:44:41');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
