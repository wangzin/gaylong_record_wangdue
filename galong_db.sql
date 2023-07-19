/*
SQLyog Ultimate v8.82 
MySQL - 5.5.5-10.4.24-MariaDB : Database - galong_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`galong_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `galong_db`;

/*Table structure for table `gaylong_records` */

DROP TABLE IF EXISTS `gaylong_records`;

CREATE TABLE `gaylong_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid_no` varchar(255) NOT NULL,
  `person_name` varchar(255) NOT NULL,
  `choe_name` varchar(255) DEFAULT NULL,
  `dzongkhag` varchar(255) DEFAULT NULL,
  `gewog` varchar(255) DEFAULT NULL,
  `village` varchar(255) DEFAULT NULL,
  `gung_no` varchar(255) DEFAULT NULL,
  `thrm_no` varchar(200) DEFAULT NULL,
  `contact_no` varchar(200) DEFAULT NULL,
  `age_name` varchar(200) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `age_in_std` varchar(10) DEFAULT NULL,
  `year_of_enrolment` varchar(10) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `identy_no` varchar(100) DEFAULT NULL,
  `dratshang` varchar(200) DEFAULT NULL,
  `deprim` varchar(200) DEFAULT NULL,
  `thodabaang` varchar(200) DEFAULT NULL,
  `blood_group` varchar(200) DEFAULT NULL,
  `father_no` varchar(200) DEFAULT NULL,
  `mother_no` varchar(200) DEFAULT NULL,
  `dob` varchar(200) DEFAULT NULL,
  `gyandey` varchar(200) DEFAULT NULL,
  `guardian_name` varchar(200) DEFAULT NULL,
  `guardian_no` varchar(200) DEFAULT NULL,
  `pro_pic` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `gaylong_records` */

insert  into `gaylong_records`(`id`,`cid_no`,`person_name`,`choe_name`,`dzongkhag`,`gewog`,`village`,`gung_no`,`thrm_no`,`contact_no`,`age_name`,`age`,`age_in_std`,`year_of_enrolment`,`father_name`,`mother_name`,`identy_no`,`dratshang`,`deprim`,`thodabaang`,`blood_group`,`father_no`,`mother_no`,`dob`,`gyandey`,`guardian_name`,`guardian_no`,`pro_pic`,`remarks`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,'ཏཐདཏན','ཏཐདན','ཏཐདན','ཏཐདན','ཐདནཔཡནཔ','ཐདནཐཔ','ཐདཔནཐདནཔ','ཐདནཔཐནདཕཔ','དནཔཐདནཔ','དནཔདནཔཕདངཔི','དནཔཐདཔ','དནཔཐདནཔ','དནཔཐདཔ','ཐདནཔཐདཔ','དནཔཐདནཔ','ཐདནཔཐན','dratshang','diprim','topaang','o+','father 123','mother 123','123123 s','gyenday','guardian name','guardian 123','1689695801_WhatsApp Image 2023-07-15 at 4.24.05 PM.jpeg','ཐདནམཔལཐདབམནལཔཏབད','2023-07-18 02:07:44',5,'2023-07-18 03:56:41',5),(4,'skdfjng','nsdkfng','nlskdfgn','nklsjdfgn','nklsdfjng','nlkasdnfg','nskdj;fgn','nklsngf','nksdfjng','nkjsn','njkln','n;kjdfgn','nkjdfgn','nk;dfng','nk;qnn','kjdgfn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'dkfgn','2023-07-18 12:08:56',5,NULL,NULL),(5,'དམཙནལཔ','ལབཐནལ','ཙལབཙཐནརལ','ཙརཕརབཕ','མ','བཙརདཙནལཔཐཙམཔལ','ལདཙམནབཔལཐཙམཔལ','ལམདནབལཔཕཙམབལ','ཙཕཔལཙམ','བལཙམབལཙ','ལམཙབལཙ','ལཙམལཙམབདནལ','མཙབདལནཔབཙམ','ལབཙམདནཔལཕཙ','ལམཙདལཔནམདནཔལ','ལམཙབདལཔནཙམབདལཕ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'དནམལཔདམཙཕལརད','2023-07-18 12:09:21',5,NULL,NULL),(6,'12312312312','Name','religion name','thimphi','thimthrom','thimtrom','12332','23','12312312','snake','34','4','2023','gyaltshen','dema','sdffqwer23','wangdichoeling','3','123123','o plus','12312312','12312312','232323232','wangdi gyendey','none','12312312','1689695916_WhatsApp Image 2023-07-15 at 4.22.57 PM.jpeg','sdkfjngskdln sdjpfgnsdfpgj','2023-07-18 03:58:36',5,NULL,NULL);

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_fk_1230852` (`user_id`),
  KEY `role_id_fk_1230852` (`role_id`),
  CONSTRAINT `role_id_fk_1230852` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_id_fk_1230852` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`id`,`user_id`,`role_id`) values (4,5,1),(17,17,1);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`title`,`status`,`created_at`,`created_by`,`updated_at`,`updated_by`) values (1,'Admin','1',NULL,NULL,NULL,NULL),(2,'User','1',NULL,NULL,NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `user_status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `team_fk_1230947` (`profile_pic`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`phone_no`,`designation`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`deleted_at`,`profile_pic`,`last_login_date`,`user_status`) values (5,'ཐདནཏདནཏཐདན','admin@gmail.com','12312312','Administrator',NULL,'$2y$10$h5x6YzlclWN70ILwxHb.7uEWy67ta0I70oCqfzMRX8DS5iFghpiQS',NULL,'2022-12-24 11:45:40','2023-07-18 11:44:12',NULL,'1689477707_msg1034283667-141026.jpg','2023-07-18 11:44:12','1'),(9,'Test User','email','12312312',NULL,NULL,'$2y$10$/M2FVcdBZmldATSuMuw25.vym9lsXBHC8Mt6XPRPe.ZdErMncEQYy',NULL,'2023-01-02 14:17:35','2023-01-13 14:24:13',NULL,'2','2023-01-13 02:24:13','1'),(10,'add user','yerasd','12312312',NULL,NULL,'$2y$10$Za7T6dVBMQWyqeBre80gBeKIVYwn8J1eRhbIv7JMsVAGWWzksKwV.',NULL,'2023-01-02 14:21:23','2023-01-02 14:21:23',NULL,NULL,NULL,'1'),(17,'ཏཐདནཏཐ','ཐདནཏ་ཏམཐདབལནཏཙཐདལན་ཏཐདན','ལཐདབཙནཏལབཙཐདནལ་ཏཐབདཙན','ལཐཙདམབནལཏབཙདཔལ',NULL,'$2y$10$KoPPCxUEDMKppYHiLLenm.610PtSbCVjWg/JEhyXdCuZHikIZO3aK',NULL,'2023-07-18 02:00:31','2023-07-18 11:58:09',NULL,'1689681489_photo1688703198.jpeg',NULL,'1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
