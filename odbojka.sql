/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.11-MariaDB : Database - odbojka
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`odbojka` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `odbojka`;

/*Table structure for table `angazovanje` */

DROP TABLE IF EXISTS `angazovanje`;

CREATE TABLE `angazovanje` (
  `igrac` bigint(20) NOT NULL,
  `reprezentacija` bigint(20) NOT NULL,
  `prvi_tim` tinyint(1) NOT NULL,
  PRIMARY KEY (`igrac`,`reprezentacija`),
  KEY `angazovanje_ibfk_2` (`reprezentacija`),
  CONSTRAINT `angazovanje_ibfk_1` FOREIGN KEY (`igrac`) REFERENCES `igrac` (`id`),
  CONSTRAINT `angazovanje_ibfk_2` FOREIGN KEY (`reprezentacija`) REFERENCES `reprezentacija` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `angazovanje` */

insert  into `angazovanje`(`igrac`,`reprezentacija`,`prvi_tim`) values 
(1,1,1),
(1,14,1),
(1,15,1),
(2,1,1),
(2,14,1),
(2,15,1),
(3,1,1),
(3,14,1),
(3,15,1),
(4,1,1),
(4,14,1),
(4,15,1),
(5,1,1),
(5,14,1),
(5,15,1),
(6,1,1),
(6,14,1),
(6,15,1),
(7,1,1),
(7,14,1),
(7,15,1),
(8,1,0),
(10,1,0),
(11,14,0),
(14,15,0);

/*Table structure for table `igrac` */

DROP TABLE IF EXISTS `igrac`;

CREATE TABLE `igrac` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ime` varchar(30) DEFAULT NULL,
  `prezime` varchar(30) DEFAULT NULL,
  `korisnik` bigint(20) NOT NULL,
  `pozicija` bigint(20) NOT NULL,
  `pol` enum('M','Z') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `korisnik` (`korisnik`),
  KEY `pozicija` (`pozicija`),
  CONSTRAINT `igrac_ibfk_1` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`id`),
  CONSTRAINT `igrac_ibfk_2` FOREIGN KEY (`pozicija`) REFERENCES `pozicija` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `igrac` */

insert  into `igrac`(`id`,`ime`,`prezime`,`korisnik`,`pozicija`,`pol`) values 
(1,'Efergt','Eefgr',1,1,'Z'),
(2,'gore','sredina',1,2,'Z'),
(3,'gore ','desno',1,3,'Z'),
(4,'dole','levo',1,4,'Z'),
(5,'dole ','sredina',1,5,'Z'),
(6,'dole','desno',1,6,'Z'),
(7,'trener','Trener',1,7,'Z'),
(8,'izmena','1',1,2,'M'),
(10,'izmena','2',1,5,'Z'),
(11,'Novi','Novi',1,2,'Z'),
(12,'Edfs','Fefrsg',1,3,'Z'),
(13,'Goref','Eafd',1,3,'Z'),
(14,'Ssfr','Eefr',1,2,'Z');

/*Table structure for table `korisnik` */

DROP TABLE IF EXISTS `korisnik`;

CREATE TABLE `korisnik` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `sifra` varchar(30) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `korisnik` */

insert  into `korisnik`(`id`,`username`,`sifra`,`ime`,`prezime`) values 
(1,'admin','admin','admin','admin'),
(2,'ivana','ivana','ivana','milicev'),
(3,'andjela','a','andjela','milisavljevic');

/*Table structure for table `medalja` */

DROP TABLE IF EXISTS `medalja`;

CREATE TABLE `medalja` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `medalja` */

insert  into `medalja`(`id`,`naziv`) values 
(1,'zlato'),
(2,'srebro'),
(3,'bronza');

/*Table structure for table `pozicija` */

DROP TABLE IF EXISTS `pozicija`;

CREATE TABLE `pozicija` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pozicija` */

insert  into `pozicija`(`id`,`naziv`) values 
(1,'levi bloker'),
(2,'tehnicar'),
(3,'desni bloker'),
(4,'levi primac'),
(5,'libero'),
(6,'desni primac'),
(7,'trener');

/*Table structure for table `reprezentacija` */

DROP TABLE IF EXISTS `reprezentacija`;

CREATE TABLE `reprezentacija` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `godina` int(11) NOT NULL,
  `medalja` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `medalja` (`medalja`),
  CONSTRAINT `reprezentacija_ibfk_1` FOREIGN KEY (`medalja`) REFERENCES `medalja` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `reprezentacija` */

insert  into `reprezentacija`(`id`,`godina`,`medalja`) values 
(1,2020,1),
(2,2019,NULL),
(3,2016,NULL),
(4,2017,NULL),
(14,2023,3),
(15,2024,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
