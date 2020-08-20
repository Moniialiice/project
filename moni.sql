/*
SQLyog Ultimate v8.61 
MySQL - 5.5.16 : Database - project
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`project` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `project`;

/*Table structure for table `alumno` */

DROP TABLE IF EXISTS `alumno`;

CREATE TABLE `alumno` (
  `idalumno` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idalumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `alumno` */

/*Table structure for table `mat_maes` */

DROP TABLE IF EXISTS `mat_maes`;

CREATE TABLE `mat_maes` (
  `id_mat_aux` int(11) NOT NULL AUTO_INCREMENT,
  `id_maestro` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mat_aux`),
  KEY `id_maestro` (`id_maestro`),
  KEY `id_materia` (`id_materia`),
  CONSTRAINT `mat_maes_ibfk_1` FOREIGN KEY (`id_maestro`) REFERENCES `usuario` (`iduser`),
  CONSTRAINT `mat_maes_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `mat_maes` */

insert  into `mat_maes`(`id_mat_aux`,`id_maestro`,`id_materia`) values (1,2,1),(2,2,4),(3,2,2),(11,2,1),(12,3,1),(13,2,3),(14,1,1),(15,1,2),(16,1,3),(17,1,4),(18,5,1),(19,5,3),(20,5,2);

/*Table structure for table `materias` */

DROP TABLE IF EXISTS `materias`;

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `orden` varchar(100) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `materias` */

insert  into `materias`(`id_materia`,`nombre`,`avatar`,`orden`,`estatus`) values (1,'Español',NULL,'1',1),(2,'Matemáticas',NULL,'1',1),(3,'POO',NULL,'1',1),(4,'Economía',NULL,'1',1);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `street` varchar(250) DEFAULT NULL,
  `num1` int(11) DEFAULT NULL,
  `num2` int(11) DEFAULT NULL,
  `col` varchar(250) DEFAULT NULL,
  `mun` varchar(250) DEFAULT NULL,
  `est` varchar(250) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `cor` varchar(250) DEFAULT NULL,
  `user` varchar(250) DEFAULT NULL,
  `cont` varchar(250) DEFAULT NULL,
  `lvl` varchar(10) DEFAULT NULL,
  `estatus` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`iduser`,`name`,`fname`,`lname`,`phone`,`street`,`num1`,`num2`,`col`,`mun`,`est`,`cp`,`cor`,`user`,`cont`,`lvl`,`estatus`) values (1,'Monica','mendez','gutierrez','','',1,2,'',NULL,NULL,NULL,NULL,NULL,NULL,'2','1'),(2,'Daniel','martinez','rojas','7225859977','Veracruz',1,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2','1'),(3,'Jairo','Rojas','Martinez',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2',NULL),(4,'Bertin','Boilla','Rivas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2',NULL),(5,'Juan','Bonifacio','Martinez',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
