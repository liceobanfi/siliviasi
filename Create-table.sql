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
CREATE DATABASE /*!32312 IF NOT EXISTS*/`banfidb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `banfidb`;

/*Table structure for table `iscrizione` */

DROP TABLE IF EXISTS `iscrizione`;

CREATE TABLE `iscrizione` (
  `data` varchar(20) NOT NULL,
  `corso` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `mail` varchar(30) DEFAULT NULL,
  `scuola` varchar(30) DEFAULT NULL,
  `comune` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`data`,`corso`,`nome`,`cognome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `iscrizione` */

insert  into `iscrizione`(`data`,`corso`,`nome`,`cognome`,`telefono`,`mail`,`scuola`,`comune`) values 
('08 dicembre 2018',1,'Alfonso','Biella','o','o','o','o'),
('08 dicembre 2018',1,'Antonio','Rossi','ooo','oo','ooo','ooo'),
('08 dicembre 2018',1,'Fabio','Cuneo','p','p','p','p'),
('08 dicembre 2018',1,'Luigi','Asti','ooo','ooo','ooo','ooo'),
('08 dicembre 2018',1,'Luigi','Rossi','ooo','ooo','oo','oo');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
