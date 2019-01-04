-- MySQL dump 10.16  Distrib 10.1.34-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: department
-- ------------------------------------------------------
-- Server version	10.1.34-MariaDB

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
-- Table structure for table `academic_year`
--

DROP TABLE IF EXISTS `academic_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `academic_year` (
  `academic_year_id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(15) NOT NULL,
  PRIMARY KEY (`academic_year_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academic_year`
--

LOCK TABLES `academic_year` WRITE;
/*!40000 ALTER TABLE `academic_year` DISABLE KEYS */;
INSERT INTO `academic_year` VALUES (1,'2017-2018'),(2,'2018-2019'),(3,'2018-2019');
/*!40000 ALTER TABLE `academic_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agency`
--

DROP TABLE IF EXISTS `agency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agency` (
  `agency_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`agency_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agency`
--

LOCK TABLES `agency` WRITE;
/*!40000 ALTER TABLE `agency` DISABLE KEYS */;
INSERT INTO `agency` VALUES (1,'google'),(2,'microsoft');
/*!40000 ALTER TABLE `agency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(250) NOT NULL,
  `date_of_joining` date NOT NULL,
  `date_of_leaving` date DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`appointment_id`),
  KEY `f1` (`faculty_id`),
  CONSTRAINT `f1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES (1,'contract ','2018-01-01','2018-12-31',2,'2018-11-09 10:33:21','2018-11-09 05:06:13',1),(2,'lecture bases','2018-11-01','2019-11-29',3,'2018-11-09 10:35:15','2018-11-09 05:06:20',1);
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auditing_member`
--

DROP TABLE IF EXISTS `auditing_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditing_member` (
  `auditing_member_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `college_name` text NOT NULL,
  `program` varchar(100) NOT NULL,
  `faculty_name` text NOT NULL,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`auditing_member_id`),
  KEY `d7` (`department_id`),
  KEY `a9` (`academic_year_id`),
  CONSTRAINT `a9` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `d7` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditing_member`
--

LOCK TABLES `auditing_member` WRITE;
/*!40000 ALTER TABLE `auditing_member` DISABLE KEYS */;
/*!40000 ALTER TABLE `auditing_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bos`
--

DROP TABLE IF EXISTS `bos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bos` (
  `bos_id` int(11) NOT NULL AUTO_INCREMENT,
  `program` varchar(100) NOT NULL,
  `minutes` text NOT NULL,
  `date` date NOT NULL,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bos_id`),
  KEY `d9` (`department_id`),
  KEY `a11` (`academic_year_id`),
  CONSTRAINT `a11` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `d9` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bos`
--

LOCK TABLES `bos` WRITE;
/*!40000 ALTER TABLE `bos` DISABLE KEYS */;
INSERT INTO `bos` VALUES (1,'techweek.','dggdgddkdkd/dkd/djgggg','2018-09-03',1,1,'2018-09-03 20:49:36','2018-09-05 06:44:22'),(2,'irix','a/b/v/','2018-09-25',1,3,'2018-09-09 22:00:02','2018-09-09 16:30:02');
/*!40000 ALTER TABLE `bos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'computer science');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `inhouse` tinyint(1) NOT NULL,
  `cost` double NOT NULL,
  `participant` text,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file` text,
  PRIMARY KEY (`event_id`),
  KEY `d11` (`department_id`),
  KEY `a13` (`academic_year_id`),
  CONSTRAINT `a13` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `d11` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,'hh','wee',1,1234,'dfffsefef','2018-10-16','2018-10-24',1,2,'2018-10-22 13:05:55','2018-11-09 05:45:28',''),(2,'Technobit','Chowgules',1,1000000001,'Dipesh Tamang , Manisha Solanki , Qaiser Basha','2018-12-15','2018-11-16',1,2,'2018-11-09 10:29:50','2018-11-09 04:59:50','uploads/event/firewall.png'),(3,'IRIX','Chowgules',1,20000000,'Tushar Verlekar , Shubham Naique','2018-11-15','2018-11-30',1,2,'2018-11-09 10:30:50','2018-11-09 05:00:50','uploads/event/netstat.png');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examiner`
--

DROP TABLE IF EXISTS `examiner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examiner` (
  `examiner_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `faculty_name` text NOT NULL,
  `venue` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file` text,
  PRIMARY KEY (`examiner_id`),
  KEY `d10` (`department_id`),
  KEY `a12` (`academic_year_id`),
  CONSTRAINT `a12` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `d10` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examiner`
--

LOCK TABLES `examiner` WRITE;
/*!40000 ALTER TABLE `examiner` DISABLE KEYS */;
/*!40000 ALTER TABLE `examiner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
INSERT INTO `faculty` VALUES (1,'dsgd','hs222','222','aa','222','2018-09-05 13:12:50','2018-09-05 07:42:50',NULL),(2,'Castor Godinho','qaiserBasha@gmail.com','9876543210','H.no 239 \r\nsirvodem,margao\r\nSalcete\r\nGoa','4545454545','2018-11-09 10:33:21','2018-11-09 05:03:21',NULL),(3,'Wendham Gray','WendhamGray@gmail.com','9123456780','Ankur Luis,  Carmona , Salcete Goa','345678','2018-11-09 10:35:15','2018-11-09 05:05:15',NULL);
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `internship`
--

DROP TABLE IF EXISTS `internship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `internship` (
  `internship_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `academic_year` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `hours` double NOT NULL,
  `file` text NOT NULL,
  PRIMARY KEY (`internship_id`),
  KEY `pro1` (`program_id`),
  KEY `stud` (`student_id`),
  KEY `ay1` (`academic_year`),
  CONSTRAINT `ay1` FOREIGN KEY (`academic_year`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `pro1` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`),
  CONSTRAINT `stud` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internship`
--

LOCK TABLES `internship` WRITE;
/*!40000 ALTER TABLE `internship` DISABLE KEYS */;
INSERT INTO `internship` VALUES (1,6,37,2,'Google','2018-02-04','2019-04-18',40,'uploads/Auditing_Member/tcp.png'),(2,6,40,2,'Oracle','2018-08-28','2018-10-16',20,'uploads/Auditing_Member/tcp.png');
/*!40000 ALTER TABLE `internship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organization`
--

DROP TABLE IF EXISTS `organization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organization` (
  `organization_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`organization_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization`
--

LOCK TABLES `organization` WRITE;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
INSERT INTO `organization` VALUES (1,'Oracle','77727262','2018-09-02 19:42:38','2018-11-09 04:34:59'),(2,'Foss','2222','2018-09-02 19:42:48','2018-11-09 04:35:09'),(3,'Ksol IT solution','767677676','2018-11-08 10:29:39','2018-11-09 04:35:20');
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paper`
--

DROP TABLE IF EXISTS `paper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paper` (
  `paper_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `credit` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`paper_id`),
  KEY `p3` (`program_id`),
  CONSTRAINT `p3` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paper`
--

LOCK TABLES `paper` WRITE;
/*!40000 ALTER TABLE `paper` DISABLE KEYS */;
INSERT INTO `paper` VALUES (2,'Object Oriented Prog',6,3,20,'2018-11-09 10:14:51','2018-11-09 04:44:51',1),(3,'DBMS',6,4,20,'2018-11-09 10:15:21','2018-11-09 04:45:21',1),(4,'E.V.S',6,2,20,'2018-11-09 10:15:47','2018-11-09 04:45:47',1),(5,'business com.',6,2,20,'2018-11-09 10:17:34','2018-11-09 04:47:34',1);
/*!40000 ALTER TABLE `paper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paper_faculty`
--

DROP TABLE IF EXISTS `paper_faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paper_faculty` (
  `paper_faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `paper_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `academic_year_id` int(11) DEFAULT NULL,
  `semester` varchar(10) NOT NULL,
  `program_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`paper_faculty_id`),
  KEY `p4` (`paper_id`),
  KEY `f2` (`faculty_id`),
  KEY `a2` (`academic_year_id`),
  KEY `pro3` (`program_id`),
  CONSTRAINT `a2` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `f2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`),
  CONSTRAINT `p4` FOREIGN KEY (`paper_id`) REFERENCES `paper` (`paper_id`),
  CONSTRAINT `pro3` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paper_faculty`
--

LOCK TABLES `paper_faculty` WRITE;
/*!40000 ALTER TABLE `paper_faculty` DISABLE KEYS */;
INSERT INTO `paper_faculty` VALUES (1,2,1,1,'1',6,'2018-11-09 20:29:38','2018-11-09 15:00:36'),(2,3,2,1,'2',6,'2018-11-09 20:31:13','2018-11-09 15:01:13'),(3,5,1,1,'3',6,'2018-11-09 20:32:12','2018-11-09 15:02:12'),(4,4,3,1,'2',6,'2018-11-09 20:33:21','2018-11-09 15:03:21');
/*!40000 ALTER TABLE `paper_faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paper_presented`
--

DROP TABLE IF EXISTS `paper_presented`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paper_presented` (
  `paper_presented_id` int(11) NOT NULL AUTO_INCREMENT,
  `paper_presented_file` text,
  `paper_title` varchar(255) DEFAULT NULL,
  `conference_name` varchar(255) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`paper_presented_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paper_presented`
--

LOCK TABLES `paper_presented` WRITE;
/*!40000 ALTER TABLE `paper_presented` DISABLE KEYS */;
/*!40000 ALTER TABLE `paper_presented` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paper_published`
--

DROP TABLE IF EXISTS `paper_published`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paper_published` (
  `paper_published_id` int(11) NOT NULL AUTO_INCREMENT,
  `paper_title` varchar(100) NOT NULL,
  `journal_name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file` text NOT NULL,
  PRIMARY KEY (`paper_published_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paper_published`
--

LOCK TABLES `paper_published` WRITE;
/*!40000 ALTER TABLE `paper_published` DISABLE KEYS */;
/*!40000 ALTER TABLE `paper_published` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paper_type`
--

DROP TABLE IF EXISTS `paper_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paper_type` (
  `paper_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `paper_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `academic_year_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`paper_type_id`),
  KEY `p5` (`paper_id`),
  KEY `t1` (`type_id`),
  KEY `a3` (`academic_year_id`),
  CONSTRAINT `a3` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `p5` FOREIGN KEY (`paper_id`) REFERENCES `paper` (`paper_id`),
  CONSTRAINT `t1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paper_type`
--

LOCK TABLES `paper_type` WRITE;
/*!40000 ALTER TABLE `paper_type` DISABLE KEYS */;
INSERT INTO `paper_type` VALUES (3,2,2,3,1),(4,3,2,2,1),(5,4,3,2,1),(6,5,3,2,1);
/*!40000 ALTER TABLE `paper_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program`
--

DROP TABLE IF EXISTS `program`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `program` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`program_id`),
  KEY `d1` (`department_id`),
  CONSTRAINT `d1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program`
--

LOCK TABLES `program` WRITE;
/*!40000 ALTER TABLE `program` DISABLE KEYS */;
INSERT INTO `program` VALUES (6,'B.voc Software development',1,'2018-11-09 09:49:36','2018-11-09 04:19:36',1),(7,'B.S.C Computer science',1,'2018-11-09 09:49:58','2018-11-09 04:19:58',1),(8,'M.S.C IT ',1,'2018-11-09 09:50:14','2018-11-09 04:20:14',1),(9,'P.G.D.C.A',1,'2018-11-09 09:50:39','2018-11-09 16:00:07',0);
/*!40000 ALTER TABLE `program` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_student`
--

DROP TABLE IF EXISTS `program_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `program_student` (
  `program_student_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  `academic_year_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`program_student_id`),
  KEY `p2` (`program_id`),
  KEY `s2` (`student_id`),
  KEY `academic_year` (`academic_year_id`),
  CONSTRAINT `p2` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`),
  CONSTRAINT `program_student_ibfk_1` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `s2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_student`
--

LOCK TABLES `program_student` WRITE;
/*!40000 ALTER TABLE `program_student` DISABLE KEYS */;
INSERT INTO `program_student` VALUES (34,6,37,'2018-11-09 09:54:32','2018-11-09 04:24:32',1,2),(35,6,38,'2018-11-09 09:55:13','2018-11-09 04:25:13',1,2),(36,6,39,'2018-11-09 09:56:02','2018-11-09 04:26:02',1,2),(37,6,40,'2018-11-09 09:56:33','2018-11-09 04:26:33',1,2),(38,6,41,'2018-11-09 09:57:16','2018-11-09 04:27:16',1,2),(39,6,42,'2018-11-09 09:58:01','2018-11-09 15:22:40',0,2),(40,7,43,'2018-12-22 10:52:16','2018-12-26 13:32:15',0,2);
/*!40000 ALTER TABLE `program_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `approval_id` varchar(255) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `agency_id` int(11) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `faculty_name` text NOT NULL,
  `student_name` text NOT NULL,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`project_id`),
  KEY `d6` (`department_id`),
  KEY `a8` (`academic_year_id`),
  CONSTRAINT `a8` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `d6` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `revision`
--

DROP TABLE IF EXISTS `revision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `revision` (
  `revision_id` int(11) NOT NULL AUTO_INCREMENT,
  `syllabus_file` text,
  `syllabus_date` date NOT NULL,
  `program_id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  `academic_year_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`revision_id`),
  KEY `p6` (`paper_id`),
  KEY `a6` (`academic_year_id`),
  KEY `p7` (`program_id`),
  CONSTRAINT `a6` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `p6` FOREIGN KEY (`paper_id`) REFERENCES `paper` (`paper_id`),
  CONSTRAINT `p7` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revision`
--

LOCK TABLES `revision` WRITE;
/*!40000 ALTER TABLE `revision` DISABLE KEYS */;
INSERT INTO `revision` VALUES (1,'uploads/revision/firewall.png','2018-11-07',6,2,'2018-11-09 10:19:19','2018-11-09 04:49:19',1,2),(2,'uploads/revision/ifconfig.png','2018-08-14',6,3,'2018-11-09 10:19:38','2018-11-09 04:49:38',1,2),(3,'uploads/revision/ping.png','2018-08-21',6,4,'2018-11-09 10:19:59','2018-11-09 04:49:59',1,2);
/*!40000 ALTER TABLE `revision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seminar`
--

DROP TABLE IF EXISTS `seminar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seminar` (
  `seminar_id` int(11) NOT NULL AUTO_INCREMENT,
  `speaker_name` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `participant` text NOT NULL,
  `venue` varchar(50) NOT NULL,
  `inhouse` tinyint(1) NOT NULL,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file` text,
  PRIMARY KEY (`seminar_id`),
  KEY `d12` (`department_id`),
  KEY `a14` (`academic_year_id`),
  CONSTRAINT `a14` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `d12` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminar`
--

LOCK TABLES `seminar` WRITE;
/*!40000 ALTER TABLE `seminar` DISABLE KEYS */;
INSERT INTO `seminar` VALUES (1,'Castor Godinho','2018-11-01','2018-11-07','Manisha Solanki , Qaiser Basha','Chowgules',1,1,2,'2018-11-09 10:26:12','2018-11-09 04:56:12','uploads/seminar/udp1.png');
/*!40000 ALTER TABLE `seminar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `roll_no` varchar(50) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `email` varchar(254) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  `alumni` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (37,'manisha solanki','VU172801','123456789','MAN000@gmail.com','2018-11-09 09:54:32','2018-11-09 04:34:22',1,1),(38,'shunbham naik','VU172802','987655222','shu000@gmail.com','2018-11-09 09:55:13','2018-11-09 15:04:53',1,1),(39,'Dipesh tamang','VU172803','123546','dip870@gmail.com','2018-11-09 09:56:02','2018-11-09 15:04:53',1,1),(40,'Qaiser basha','VU172804','5765455434','qai575@gmail.com','2018-11-09 09:56:33','2018-12-25 14:58:16',1,1),(41,'Deepraj dessai','VU172805','4543444432','dipr654@gmail.com','2018-11-09 09:57:16','2018-11-09 04:27:16',1,0),(42,'Rahul nath','VU172806','45432435647','ral5454@gmail.com','2018-11-09 09:58:01','2018-11-09 04:33:00',1,1),(43,'rahul nath','vu17543','1234567890','1234@fgf.com','2018-12-22 10:52:16','2018-12-22 05:34:14',1,1);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_activity`
--

DROP TABLE IF EXISTS `student_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_activity` (
  `student_activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_file` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `budget` double NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `faculty_name` text NOT NULL,
  `student_name` text NOT NULL,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_activity_id`),
  KEY `d5` (`department_id`),
  KEY `a7` (`academic_year_id`),
  CONSTRAINT `a7` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `d5` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_activity`
--

LOCK TABLES `student_activity` WRITE;
/*!40000 ALTER TABLE `student_activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_organization`
--

DROP TABLE IF EXISTS `student_organization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_organization` (
  `student_organization_id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `position` varchar(25) DEFAULT NULL,
  `program_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_organization_id`),
  KEY `o1` (`organization_id`),
  KEY `s3` (`student_id`),
  KEY `p1` (`program_id`),
  CONSTRAINT `o1` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`organization_id`),
  CONSTRAINT `p1` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`),
  CONSTRAINT `s3` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_organization`
--

LOCK TABLES `student_organization` WRITE;
/*!40000 ALTER TABLE `student_organization` DISABLE KEYS */;
INSERT INTO `student_organization` VALUES (2,1,37,'2018-10-28','manager',6,'2018-11-09 10:01:57','2018-11-09 04:31:57'),(3,1,42,'2018-11-20','manager',6,'2018-11-09 10:03:41','2018-11-09 04:33:41'),(4,2,40,'2018-10-29','pro',6,'2018-11-09 20:36:31','2018-11-09 15:06:31'),(5,2,37,'2018-11-01','asst-manager',6,'2018-11-09 20:43:21','2018-11-09 15:13:21'),(6,3,37,'2018-11-30','asd',6,'2018-11-09 20:44:57','2018-11-09 15:14:57'),(9,2,43,'2018-12-20','ceo',7,'2018-12-22 11:16:42','2018-12-22 05:46:42'),(10,1,40,'2018-07-16','ceo',6,'2018-12-25 20:28:44','2018-12-25 14:58:44');
/*!40000 ALTER TABLE `student_organization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_expert`
--

DROP TABLE IF EXISTS `subject_expert`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject_expert` (
  `subject_expert_id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_name` varchar(40) NOT NULL,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`subject_expert_id`),
  KEY `d2` (`department_id`),
  KEY `a5` (`academic_year_id`),
  CONSTRAINT `a5` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `d2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_expert`
--

LOCK TABLES `subject_expert` WRITE;
/*!40000 ALTER TABLE `subject_expert` DISABLE KEYS */;
INSERT INTO `subject_expert` VALUES (1,'depraj',1,2,'2018-09-03 20:51:16','2018-09-11 04:18:49');
/*!40000 ALTER TABLE `subject_expert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,'rrr',0),(2,'Compulsory',1),(3,'Selective',1);
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'qaiser','$2y$13$BBvQ7HRjK0CKmWnBiNGMp.5.Op7l.zNzHC0wjScpL6CAUXBuANwPm','2018-11-08 14:52:27','2018-11-08 09:22:27');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workshop`
--

DROP TABLE IF EXISTS `workshop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workshop` (
  `workshop_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `inhouse` tinyint(1) NOT NULL,
  `cost` double NOT NULL,
  `participant` text NOT NULL,
  `faculty_name` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file` text,
  PRIMARY KEY (`workshop_id`),
  KEY `d8` (`department_id`),
  KEY `a10` (`academic_year_id`),
  CONSTRAINT `a10` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `d8` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workshop`
--

LOCK TABLES `workshop` WRITE;
/*!40000 ALTER TABLE `workshop` DISABLE KEYS */;
/*!40000 ALTER TABLE `workshop` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-04 12:28:20
