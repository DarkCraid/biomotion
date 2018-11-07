/*
SQLyog Community v12.4.2 (64 bit)
MySQL - 10.1.26-MariaDB : Database - biomotion
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`biomotion` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `biomotion`;

/*Table structure for table `resultados` */

DROP TABLE IF EXISTS `resultados`;

CREATE TABLE `resultados` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `valor` smallint(6) NOT NULL,
  `tiempo` datetime NOT NULL COMMENT 'mm:ss:ms',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `resultados` */

insert  into `resultados`(`id`,`valor`,`tiempo`) values 
(1,1233,'2018-11-06 22:55:35'),
(2,654,'2018-11-06 22:55:42'),
(3,2341,'2018-11-06 22:55:47'),
(4,867,'2018-11-06 22:55:52'),
(5,3434,'2018-11-06 22:55:59'),
(6,34,'2018-11-07 00:00:37'),
(7,4564,'2018-11-07 00:00:45'),
(8,23,'2018-11-07 00:00:50');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
