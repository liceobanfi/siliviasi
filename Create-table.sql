/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.30-MariaDB : Database - banfidb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`silviasi_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `silviasi_db`;

/*Table structure for table `iscrizione` */

CREATE TABLE `iscrizione` (
  `giorno` varchar(40) NOT NULL,
  `orario` varchar(40) NOT NULL,
  `scuola` varchar(20) NOT NULL,
  `citta` varchar(20) NOT NULL,
  `docente` varchar(20) NOT NULL,
  `mail` varchar(30) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `info` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`giorno`,`orario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*Data for the table `iscrizione` */

insert  into `iscrizione`(`giorno`,`orario`,`scuola`,`citta`,`docente`,`mail`,`telefono`,`info`) values 
('03 febbraio 2019',"8 - 8.4",'Galilei','Voghera','Rossi','rossi@gmail.com','o','o');
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
