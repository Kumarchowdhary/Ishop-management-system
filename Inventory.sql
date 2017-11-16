/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.24 : Database - ishopmangementsystem
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`id2030013_shop` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `id2030013_shop`;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) DEFAULT NULL,
  `cat_description` varchar(255) DEFAULT NULL,
  `cat_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`cat_id`,`cat_name`,`cat_description`,`cat_active`) values (1,'Houseware','HouseHold Appliances',1),(3,'Electronics','Cirtuitory',1),(4,'Cosmetics','facial Cream',1),(5,'Entertainment','Amusement',0);

/*Table structure for table `company` */

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `comp_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_name` varchar(255) DEFAULT NULL,
  `comp_location` varchar(255) DEFAULT NULL,
  `comp_contact` varchar(255) DEFAULT NULL,
  `comp_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`comp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `company` */

insert  into `company`(`comp_id`,`comp_name`,`comp_location`,`comp_contact`,`comp_active`) values (1,'Infinix','Japan','09099900',1),(2,'Nokia','Hongkong','098888',1),(3,'Samsung','America','09888767',0),(5,'Dawlance','London','098765',1);

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(255) NOT NULL,
  `emp_username` varchar(255) NOT NULL,
  `emp_password` varchar(12) NOT NULL,
  `emp_gender` varchar(255) NOT NULL,
  `emp_address` varchar(255) DEFAULT NULL,
  `emp_cellno` varchar(255) NOT NULL,
  `emp_hiredate` date DEFAULT NULL,
  `emp_salary` int(11) NOT NULL,
  `emp_active` int(4) NOT NULL,
  `emptype` int(11) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `emptype` (`emptype`),
  CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`emptype`) REFERENCES `employee_type` (`emp_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `employee` */

insert  into `employee`(`emp_id`,`emp_name`,`emp_username`,`emp_password`,`emp_gender`,`emp_address`,`emp_cellno`,`emp_hiredate`,`emp_salary`,`emp_active`,`emptype`) values (3,'Sandesh','sandesh','1234','male','hathi gate','09000000','2016-01-01',1200,1,1),(7,'Aakash','aakash','aakash','male','Shikarpur','09089899','2016-01-13',1200,0,2),(10,'Santosh','san','1234','male','hathi gate shikarpur','098090','2016-03-04',1300,0,3),(13,'sid','sid','sidd','Male','asdjkl','03337586021','2016-03-03',123,1,2),(15,'sagar','sagar','1234','Female','dadu','909090','2016-04-12',78,0,3),(16,'kumar','1234','1234','Male','flat no ','3313278590','2016-04-16',20000,1,3),(17,'','','','',NULL,'',NULL,0,0,3);

/*Table structure for table `employee_type` */

DROP TABLE IF EXISTS `employee_type`;

CREATE TABLE `employee_type` (
  `emp_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`emp_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `employee_type` */

insert  into `employee_type`(`emp_type_id`,`emp_type`) values (1,'Admin'),(2,'Manager'),(3,'Salesman');

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `pd_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `pd_name` varchar(255) DEFAULT NULL,
  `pd_expiry` date DEFAULT NULL,
  `pd_price` int(11) DEFAULT NULL,
  `pd_active` int(11) DEFAULT NULL,
  `pd_empusername` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pd_id`),
  KEY `comp_id` (`comp_id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`comp_id`) REFERENCES `company` (`comp_id`),
  CONSTRAINT `product_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `product` */

insert  into `product`(`pd_id`,`comp_id`,`cat_id`,`pd_name`,`pd_expiry`,`pd_price`,`pd_active`,`pd_empusername`) values (6,2,3,'Fair lovely','2016-01-19',12,1,'sid'),(7,2,3,'asdfkh','2016-01-01',100,0,'sid'),(9,1,1,'fabrics','2016-04-02',120,1,'sum');

/*Table structure for table `receipt` */

DROP TABLE IF EXISTS `receipt`;

CREATE TABLE `receipt` (
  `rpt_id` int(11) NOT NULL AUTO_INCREMENT,
  `pd_name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `empname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rpt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `receipt` */

insert  into `receipt`(`rpt_id`,`pd_name`,`price`,`quantity`,`total`,`empname`) values (1,'fair lovely',12,2,24,'sumeet'),(2,'asdfkh',100,2,200,'paras'),(4,'Fa',12,1,12,'rajesh'),(5,'fair lovely',12,2,24,'paras'),(9,'Fair lovely',12,2,24,'Paras');

/*Table structure for table `test` */

DROP TABLE IF EXISTS `test`;

CREATE TABLE `test` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(255) DEFAULT NULL,
  `emp_username` varchar(255) DEFAULT NULL,
  `emp_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `test` */

insert  into `test`(`emp_id`,`emp_name`,`emp_username`,`emp_password`) values (1,'Sumeet','sum','eet'),(2,'ss','xx','xx'),(3,'Sumeet','sum','eet'),(4,'Sumeet','sum','eet');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
