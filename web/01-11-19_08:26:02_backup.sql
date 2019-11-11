-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: department
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academic_year`
--

LOCK TABLES `academic_year` WRITE;
/*!40000 ALTER TABLE `academic_year` DISABLE KEYS */;
INSERT INTO `academic_year` VALUES (1,'2017-2018'),(2,'2018-2019'),(3,'2019-2020'),(4,'2016-2017'),(6,'2015-2016'),(7,'2014-2015');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agency`
--

LOCK TABLES `agency` WRITE;
/*!40000 ALTER TABLE `agency` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES (1,'permanent','1996-07-02',NULL,1,'2019-01-15 14:57:33','2019-02-08 05:09:36',0),(2,'permanent','1996-07-02',NULL,2,'2019-02-11 11:11:05','2019-02-11 05:42:43',1),(3,'permanent','1994-08-29',NULL,3,'2019-02-11 11:16:45','2019-02-11 05:46:45',1),(4,'permanent','1999-07-07',NULL,4,'2019-02-11 11:24:57','2019-02-11 05:54:57',1),(5,'permanent','1994-06-20',NULL,5,'2019-02-11 15:26:47','2019-02-11 09:56:47',1),(6,'contract ','2016-12-13',NULL,6,'2019-02-11 15:32:20','2019-02-11 10:02:20',1),(7,'permanent','1998-12-16',NULL,7,'2019-02-11 15:35:14','2019-02-11 10:05:14',1),(8,'contract ','2018-06-23','2019-07-22',8,'2019-02-11 15:51:59','2019-08-27 09:34:34',1),(9,'permanent','2012-07-02',NULL,9,'2019-02-11 15:55:09','2019-02-11 10:25:09',1),(10,'contract ','2009-06-01',NULL,10,'2019-02-11 15:57:50','2019-02-11 10:27:50',1),(11,'permanent','1994-06-20',NULL,11,'2019-02-11 16:03:21','2019-02-11 10:33:21',1),(12,'permanent','1997-06-20',NULL,12,'2019-02-11 16:06:40','2019-02-11 10:36:40',1),(13,'contract ','2012-07-30',NULL,13,'2019-02-12 10:34:32','2019-02-12 05:04:32',1),(14,'contract ','2013-01-08',NULL,14,'2019-02-12 10:39:13','2019-02-12 05:09:13',1),(15,'permanent','1993-07-26',NULL,15,'2019-02-12 10:45:25','2019-02-12 05:15:25',1),(16,'permanent','1993-09-13',NULL,16,'2019-02-12 10:48:29','2019-02-12 05:18:29',1),(17,'contract ','2017-07-07','2019-05-05',17,'2019-02-12 10:52:29','2019-08-27 09:34:13',1),(18,'contract ','2018-12-21','2019-05-05',18,'2019-02-13 09:33:06','2019-08-27 09:32:08',1),(19,'permanent','1988-07-06',NULL,19,'2019-02-13 09:40:52','2019-02-13 04:10:52',1),(20,'permanent','2019-07-04',NULL,20,'2019-08-23 10:03:00','2019-08-23 04:33:00',1);
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
  `faculty_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `description` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file1` text,
  `file2` text,
  `file3` text,
  `file4` text,
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
  `description` text,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bos_id`),
  KEY `d9` (`department_id`),
  KEY `a11` (`academic_year_id`),
  CONSTRAINT `a11` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `d9` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bos`
--

LOCK TABLES `bos` WRITE;
/*!40000 ALTER TABLE `bos` DISABLE KEYS */;
INSERT INTO `bos` VALUES (3,'B.Sc','','2014-12-20',NULL,1,2,'2019-05-16 10:18:57','2019-05-21 04:59:37'),(4,'B.Sc','uploads/bos/Minutes_of_BOS-2-17-oct-15-college-format.docx','2015-10-17',NULL,1,2,'2019-05-16 10:19:57','2019-05-16 04:49:57'),(5,'B.Sc','uploads/bos/Minutes_of_BOS-3-march5-college-format.doc','2016-03-05',NULL,1,2,'2019-05-16 10:20:56','2019-05-16 04:50:56'),(6,'B.Sc','uploads/bos/Minutes_of_BOS-4-01-April-17-college-format.doc','2017-04-01',NULL,1,2,'2019-05-16 10:22:20','2019-05-16 04:52:20'),(7,'B.Sc','uploads/bos/Minutes_of_BOS-9th-December-17-college-format.doc','2017-12-09',NULL,1,2,'2019-05-16 10:22:44','2019-05-16 04:52:44'),(8,'B.Sc','uploads/bos/BOS Minutes 13.10.18.pdf','2018-10-13',NULL,1,2,'2019-05-16 10:32:17','2019-05-16 05:02:17'),(9,'B.VOC','uploads/bos/BOS Minutes 16.02.19.pdf','2019-02-16',NULL,1,2,'2019-05-16 10:33:16','2019-05-16 05:03:16');
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
INSERT INTO `department` VALUES (1,'Computer Science');
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
  `participant` int(11) DEFAULT NULL,
  `participant_name` text,
  `description` text,
  `faculty_id` int(11) NOT NULL,
  `faculty_coordinator` text NOT NULL,
  `student_coordinator` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file1` text,
  `file2` text,
  `file3` text,
  `file4` text,
  PRIMARY KEY (`event_id`),
  KEY `d11` (`department_id`),
  KEY `a13` (`academic_year_id`),
  CONSTRAINT `a13` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `d11` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (5,'GOA IT DAY','INOX, ESG, Panjim, Goa',0,0,14,NULL,NULL,0,'Mrs. Sanas  Shaikh','-','2018-07-14','2018-07-15',1,1,'2019-05-09 09:53:05','2019-05-09 04:23:40',NULL,NULL,NULL,NULL),(6,'GigaTech - 2018','M.Sc. IT Seminar Hall, Upper Auditorium',1,22000,16,NULL,NULL,0,'Mr. Mahesh Matha','-','2018-07-28','2018-07-28',1,1,'2019-05-09 10:02:26','2019-05-09 04:32:26',NULL,NULL,NULL,NULL),(8,'TECHWEEK 2018','Upper Auditorium, Parvatibai Chowgule College',1,48479,125,NULL,NULL,0,'Mrs. Suchitra Bhat & Mr. Abhishek Gudekar','-','2018-08-27','2018-09-01',1,1,'2019-05-09 10:09:18','2019-05-09 04:39:18',NULL,NULL,NULL,NULL),(9,'Google DevFest 2018','Upper Auditorium, Parvatibai Chowgule College',1,45000,300,NULL,NULL,0,'Mr. Castor Godinho/Mr. Wendham Gray','-','2018-09-08','2018-09-08',1,1,'2019-05-09 10:12:22','2019-05-09 04:42:22',NULL,NULL,NULL,NULL),(10,'Internship/ Project/Placements opportunities','Computer Science Department: F103 ',1,0,40,NULL,NULL,0,'Ms. Neeta Dhopeshwarker/ Mr. Mahesh Matha\r\n\r\n','-','2018-09-28','2018-09-28',1,1,'2019-05-09 10:27:52','2019-05-09 04:57:52',NULL,NULL,NULL,NULL),(11,'E – services Awareness Training Programme ','Computer Science Department Lab I ',1,4761,17,NULL,NULL,0,'Mr. Vasant Shirwaiker','-','2019-01-18','2019-01-23',1,2,'2019-05-09 10:30:44','2019-05-09 05:00:44',NULL,NULL,NULL,NULL),(12,'Coding Hours 2.0','Upper Auditorium, Parvatibai Chowgule College',1,4300,32,NULL,NULL,0,'Mr.Castor Godinho/Mr. Wendham Gray','-','2019-01-18','2019-01-18',1,2,'2019-05-09 10:32:13','2019-05-09 05:02:13',NULL,NULL,NULL,NULL),(13,'E Services awareness training programme','Inner wheel club, Ponda ',1,4761,18,NULL,NULL,0,'Mrs. Suchitra Bhat','-','2019-02-13','2019-02-13',1,2,'2019-05-09 10:33:31','2019-05-09 05:03:31',NULL,NULL,NULL,NULL),(14,'HACKATHON - Coding Competition','Upper Auditorium, Parvatibai Chowgule College ',1,4200,22,NULL,NULL,0,'Mr. D. Prabakaran, Ms. Judith Barreto and Ms. Dikshita V. Aroskar','-','2019-02-28','2019-02-28',1,2,'2019-05-09 10:35:26','2019-05-09 05:05:26',NULL,NULL,NULL,NULL),(15,'Staying Safe on the Internet','Rosary College of Commerce & Arts, Navelim',1,0,30,NULL,NULL,0,'Mr. Castor Godinho','-','2019-08-14','2019-08-14',1,3,'2002-01-01 00:40:46','2001-12-31 19:11:18',NULL,NULL,NULL,NULL),(16,'Usage of Java Frameworks in IT Industry','Damodar College of Commerce and Economics, Margao',1,0,40,NULL,NULL,0,'Mr. Mahesh Matha','-','2019-09-10','2019-09-10',1,3,'2002-01-01 00:45:06','2001-12-31 19:15:06',NULL,NULL,NULL,NULL);
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
  `faculty_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `description` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file1` text,
  `file2` text,
  `file3` text,
  `file4` text,
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
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
INSERT INTO `faculty` VALUES (1,'SUCHITRA BHAT','srb001@chowgules.ac.in','9326126754','PONDA - GOA','10047','2019-01-15 14:57:33','2019-02-08 05:09:36',0),(2,'SUCHITRA BHAT','srb001@chowgules.ac.in','9326126754','\'SNEH\', KURTARKAR NAGARI,\r\nPONDA, GOA','10047','2019-02-11 11:11:05','2019-02-11 05:41:05',1),(3,'PRABAKARAN D','vdp001@chowgules.ac.in','9422059862','B-4, D.N. GARDEN HOMES,\r\nMUGALLI, SAO JOSE AREAL,\r\nGOA','10045','2019-02-11 11:16:44','2019-02-11 05:46:44',1),(4,'NEETA DHOPESHWARKER','nvd001@chowgules.ac.in','8408050092','NARAYAN SMRUTI,\r\nKHADPABANDH,\r\nPONDA, GOA','10057','2019-02-11 11:24:57','2019-02-11 05:54:57',1),(5,'IAN BARRETO','aib001@chowgules.ac.in','9420596576','TORSANZORI,\r\nAQUEM-ALTO ','10035','2019-02-11 15:26:47','2019-02-11 09:56:47',1),(6,'DIKSHITA VISHRAM AROSKAR','dva003@chowgules.ac.in','8208132178','HOUSE NO. 341, \r\nASSAGAO, \r\nBARDEZ, GOA','40100','2019-02-11 15:32:20','2019-02-11 10:02:20',1),(7,'SAMEENA FALLEIRO','ssf001@chowgules.ac.in','9423884667','H.NO.12, ST JOAQUIM ROAD,\r\nBORDA, MARGAO GOA','10055','2019-02-11 15:35:14','2019-02-11 10:05:14',1),(8,'AMAR NAIK','arn032@chowgules.ac.in','9604815282','H.NO. 18/2\r\nSAWRIBHAT, VELGUEM,\r\nBICHOLIM, GOA','20026','2019-02-11 15:51:59','2019-02-11 10:21:59',1),(9,'MAHESH MATHA','mpm001@chowgules.ac.in','9922610931','AQUEM- ALTO,\r\nMARGAO GOA','50024','2019-02-11 15:55:09','2019-02-11 10:25:09',1),(10,'VILSON PINTO','vip001@chowgules.ac.in','9823259094','H.NO.572, NEAR ST.ANNES SCHOOL,\r\nAGALLI, GOGOL, GOA ','55004','2019-02-11 15:57:50','2019-02-11 10:27:50',1),(11,'KUMARESH V. C.','kvc001@chowgules.ac.in','9226290335','508,CROSSROADS ELITE, \r\nEASTERN EXPRESS BYPASS ROAD,\r\nNEAR ARLEM JUNCTION,\r\nFATORDA, GOA','10040','2019-02-11 16:03:21','2019-02-11 10:33:21',1),(12,'JUDITH BARRETO','jmdb001@chowgules.ac.in ','9822586179','B-1, \'OLIMPIA\',\r\nFERANT, CARANZALEM,\r\nPANJIM, GOA','10052','2019-02-11 16:06:40','2019-02-11 10:36:40',1),(13,'ABHISHEK GUDEKAR','adg001@chowgules.ac.in','9158662609','H. NO. 56 B1,\r\nKARASWADA,\r\nMAPUSA,GOA','40047','2019-02-12 10:34:32','2019-02-12 05:04:32',1),(14,'SANAS SHAIKH','sas011@chowgules.ac.in','9421249739','H.NO. 40,\r\nMARUTI MANDIR DAVORLIM HOUSING BOARD,\r\nMARGAO, GOA','40060','2019-02-12 10:39:13','2019-02-12 05:09:13',1),(15,'VASANT S S SHIRWAIKAR','vss001@chowgules.ac.in','9850463949','E-128, NEAR POLICE STATION,\r\nQUEPEM, GOA','15012','2019-02-12 10:45:25','2019-02-12 05:15:25',1),(16,'GADDE V K NAGALAKSHMI','gvn001@chowgules.ac.in','0832 2317657 ','S-1,SWAPNA GANDHA\r\nDHAVLI,\r\nPONDA GOA ','15013','2019-02-12 10:48:29','2019-02-12 05:18:29',1),(17,'SUREKHA PRASHANT PATIL','spp015@chowgules.ac.in','9923403407','SANQUELIN, \r\nBICHOLIM, GOA','SPP015','2019-02-12 10:52:29','2019-02-12 05:22:29',1),(18,'SWETA SHET VERENKAR','sps016@chowgules.ac.in','9923644584','H.NO.251, CALCONDA,\r\nMARGAO, GOA','40127','2019-02-13 09:33:06','2019-02-13 04:03:06',1),(19,'ANANT PATIL','asp001@chowgules.ac.in','9421089544','B-10, SAPNA OASIS,\r\nMARLEM, BORDA,\r\nMARGAO GOA','-','2019-02-13 09:40:52','2019-02-13 04:10:52',1),(20,'ASHWETA A FONDEKAR','aaf016@chowgules.ac.in','9158770617','BHAILIFAL SURLA, SANQUELIM GOA','30036','2019-08-23 10:03:00','2019-08-23 04:33:00',1);
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
  `academic_year_id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `hours` double NOT NULL,
  `description` text,
  `file` text,
  `file1` text,
  `file2` text,
  `file3` text,
  PRIMARY KEY (`internship_id`),
  KEY `pro1` (`program_id`),
  KEY `stud` (`student_id`),
  KEY `ay1` (`academic_year_id`),
  CONSTRAINT `ay1` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `pro1` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`),
  CONSTRAINT `stud` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internship`
--

LOCK TABLES `internship` WRITE;
/*!40000 ALTER TABLE `internship` DISABLE KEYS */;
INSERT INTO `internship` VALUES (1,1,1,2,'Oracle','2019-11-01','2019-11-29',30,'',NULL,NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization`
--

LOCK TABLES `organization` WRITE;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
INSERT INTO `organization` VALUES (2,'Kaavya Enterprises Pvt Ltd','098232 90961 ','2019-10-29 14:27:34','2019-10-29 08:57:34'),(3,'Our Lady Of Rosary High School ','0832 245 3200 ','2019-10-29 15:37:04','2019-10-29 10:07:04'),(4,'Photo Studio,Velim','-','2019-10-29 15:40:55','2019-10-29 10:10:55'),(5,'Carvalho Business Solutions, Borda, Margao','098221 28866 ','2002-01-01 00:58:34','2001-12-31 19:28:34'),(6,'Bright Future.Com ',' 099701 56203 ','2002-01-01 01:00:57','2001-12-31 19:30:57'),(7,'Goa University ','086696 09048 ','2002-01-01 01:02:36','2001-12-31 19:32:36');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paper`
--

LOCK TABLES `paper` WRITE;
/*!40000 ALTER TABLE `paper` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paper_faculty`
--

LOCK TABLES `paper_faculty` WRITE;
/*!40000 ALTER TABLE `paper_faculty` DISABLE KEYS */;
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
  `paper_presented_file2` text,
  `paper_presented_file3` text,
  `paper_presented_file4` text,
  `paper_title` varchar(255) DEFAULT NULL,
  `conference_name` varchar(255) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`paper_presented_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paper_presented`
--

LOCK TABLES `paper_presented` WRITE;
/*!40000 ALTER TABLE `paper_presented` DISABLE KEYS */;
INSERT INTO `paper_presented` VALUES (1,'uploads/paper-presented/department01.sql',NULL,NULL,NULL,'wertyu','sdfsghdh','fdfsgfg','2019-01-01',NULL,'2019-01-08 10:45:08','2019-01-08 10:45:08',1);
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
  `faculty_id` int(11) NOT NULL,
  `co_author` text,
  `description` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file1` text,
  `file2` text,
  `file3` text,
  `file4` text,
  PRIMARY KEY (`paper_published_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paper_published`
--

LOCK TABLES `paper_published` WRITE;
/*!40000 ALTER TABLE `paper_published` DISABLE KEYS */;
INSERT INTO `paper_published` VALUES (1,'A Defense Techniques of SYN Flood Attack Characterization & Comparison','International Journal of Network Security 1816-3548','2018-01-18',0,NULL,NULL,'2019-08-29 10:20:17','2019-08-29 04:50:17',NULL,NULL,NULL,NULL),(2,'Engagement Tool for Evaluating Learning in an Open and Distance Learning Environment ','Global Journal for Research Analysis, Volume-7,Issue-2,February-2018,ISSN NO 2277-8160.','2018-02-14',0,NULL,NULL,'2019-08-29 10:26:41','2019-08-29 04:56:41',NULL,NULL,NULL,NULL);
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paper_type`
--

LOCK TABLES `paper_type` WRITE;
/*!40000 ALTER TABLE `paper_type` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program`
--

LOCK TABLES `program` WRITE;
/*!40000 ALTER TABLE `program` DISABLE KEYS */;
INSERT INTO `program` VALUES (1,'B.Sc Computer Science',1,'2019-01-08 16:16:51','2019-01-08 10:46:51',1),(2,'P.G.D.C.A',1,'2019-01-08 16:17:11','2019-01-08 10:47:11',1),(3,'B.Voc Software Developement',1,'2019-01-08 16:17:36','2019-01-08 10:47:36',1),(4,'M.Sc I.T',1,'2019-01-08 16:17:55','2019-01-08 10:47:55',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_student`
--

LOCK TABLES `program_student` WRITE;
/*!40000 ALTER TABLE `program_student` DISABLE KEYS */;
INSERT INTO `program_student` VALUES (1,1,1,'2019-10-29 14:19:54','2019-10-29 08:49:54',1,4),(2,2,2,'2019-10-29 15:36:25','2019-10-29 10:06:25',1,4),(3,2,3,'2019-10-29 15:40:21','2019-10-29 10:10:21',1,4),(4,2,4,'2019-10-29 15:42:37','2019-10-29 10:12:37',1,4),(5,2,5,'2002-01-01 00:43:38','2001-12-31 19:13:38',1,4),(6,2,6,'2002-01-01 00:57:54','2001-12-31 19:27:54',1,4),(7,2,7,'2002-01-01 01:00:27','2001-12-31 19:30:27',1,4),(8,2,8,'2002-01-01 01:02:05','2001-12-31 19:32:05',1,4),(9,3,9,'2019-11-01 10:55:07','2019-11-01 05:25:07',1,1),(10,3,10,'2019-11-01 10:57:50','2019-11-01 05:27:50',1,1),(11,3,11,'2019-11-01 10:58:22','2019-11-01 05:28:22',1,1);
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
  `project_file` text,
  `project_file2` text,
  `project_file3` text,
  `project_file4` text,
  `approval_id` varchar(255) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `agency_id` int(11) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `faculty_name` text NOT NULL,
  `student_name` text NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `description` text,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`project_id`),
  KEY `d6` (`department_id`),
  KEY `a8` (`academic_year_id`),
  KEY `facid3` (`faculty_id`),
  CONSTRAINT `a8` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `d6` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  CONSTRAINT `facid3` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`)
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
  `syllabus_file2` text,
  `syllabus_file3` text,
  `syllabus_file4` text,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revision`
--

LOCK TABLES `revision` WRITE;
/*!40000 ALTER TABLE `revision` DISABLE KEYS */;
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
  `participant` int(11) NOT NULL,
  `participant_name` text,
  `faculty_name` varchar(100) DEFAULT NULL,
  `description` text,
  `venue` varchar(50) NOT NULL,
  `inhouse` tinyint(1) NOT NULL,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file1` text,
  `file2` text,
  `file3` text,
  `file4` text,
  PRIMARY KEY (`seminar_id`),
  KEY `d12` (`department_id`),
  KEY `a14` (`academic_year_id`),
  CONSTRAINT `a14` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `d12` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminar`
--

LOCK TABLES `seminar` WRITE;
/*!40000 ALTER TABLE `seminar` DISABLE KEYS */;
INSERT INTO `seminar` VALUES (1,'Prof. KaviNarayanaMurthy , Dean of the School of Computer and Information Sciences at University of Hyderabad.','2018-07-26','2018-07-26',10,NULL,NULL,NULL,'Dept of Computer Science, Goa University ',0,1,1,'2019-05-09 10:00:32','2019-05-09 04:30:32',NULL,NULL,NULL,NULL),(2,'Mrs. Neeta Dhopeshwarker ','2019-04-27','2019-04-27',35,NULL,NULL,NULL,'Keshav Seva Sadhana School, Bicholim',1,1,2,'2019-05-09 10:41:29','2019-05-09 05:11:29',NULL,NULL,NULL,NULL),(3,'Mrs. Neeta Dhopeshwarkar','2019-04-30','2019-04-30',140,NULL,NULL,NULL,'Lokvihwas Pratishthans Special School,Dhavli-Ponda',1,1,2,'2019-05-09 10:43:49','2019-05-09 05:13:49',NULL,NULL,NULL,NULL),(4,'Dr. Sameena Falleiro-Associate Prof-Project Management and Research Writing','2019-05-07','2019-05-07',20,NULL,NULL,NULL,'Computer Science Lab I',1,1,2,'2019-07-24 09:43:15','2001-12-31 18:50:05',NULL,NULL,NULL,NULL),(5,'Dr. Shaila Ghanti -Master Classes Series on topic \" Are Teachers Redundant the Age of MOOCs: A Teacher\'s view\" by Prof. Sridhar Iyer, Dept. of Computer Science & Engineering and IIT Bombay','2019-07-11','2019-07-11',2,NULL,NULL,NULL,'Multipurpose Hall, Sanskruti Bhavan, ',0,1,2,'2019-07-31 10:14:08','2001-12-31 18:51:36',NULL,NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'Pemson Pereira','1407131285 ','-','-','2019-10-29 14:19:54','2019-10-29 09:00:33',1,1),(2,'Dcosta Queenie','PD161203','-','-','2019-10-29 15:36:25','2019-10-29 10:11:58',1,1),(3,'Fernandes Reema','PD161210','-','-','2019-10-29 15:40:21','2019-10-29 10:11:58',1,1),(4,'Fernandes Alzira','PD161219','-','-','2019-10-29 15:42:37','2001-12-31 19:29:23',1,1),(5,'SHAIKH RIZWAN ISMAIL','PD161207','-','-','2002-01-01 00:43:38','2001-12-31 19:29:23',1,1),(6,'Osten Cliff Caldeira','PD161204','-','-','2002-01-01 00:57:54','2001-12-31 19:29:23',1,1),(7,'Chottari Sunny Kumar Bharat','PD161220','-','-','2002-01-01 01:00:27','2001-12-31 19:31:19',1,1),(8,'GAUNKAR CHITRA ANAND','PD161214','-','-','2002-01-01 01:02:05','2001-12-31 19:32:54',1,1),(9,'Qaiser basha','VU172821','-','-','2019-11-01 10:55:07','2019-11-01 05:37:40',1,1),(10,'Shubham naique','VU172819','-','-','2019-11-01 10:57:50','2019-11-01 07:23:14',1,1),(11,'Manisha solanki','VU172811','-','-','2019-11-01 10:58:22','2019-11-01 07:23:14',1,1);
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
  `activity_file` text,
  `activity_file2` text,
  `activity_file3` text,
  `activity_file4` text,
  `name` varchar(50) NOT NULL,
  `budget` double NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `faculty_name` text NOT NULL,
  `student_name` text NOT NULL,
  `description` text,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_activity_id`),
  KEY `d5` (`department_id`),
  KEY `a7` (`academic_year_id`),
  KEY `faculty_id1` (`faculty_id`),
  CONSTRAINT `a7` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `d5` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  CONSTRAINT `faculty_id1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`)
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_organization`
--

LOCK TABLES `student_organization` WRITE;
/*!40000 ALTER TABLE `student_organization` DISABLE KEYS */;
INSERT INTO `student_organization` VALUES (1,2,1,NULL,'-',1,'2019-10-29 14:31:00','2019-10-29 09:01:00'),(2,3,2,NULL,'-',2,'2019-10-29 15:37:35','2019-10-29 10:07:35'),(3,3,2,NULL,'-',2,'2019-10-29 15:38:42','2019-10-29 10:08:42'),(4,3,2,'2019-10-29','-',2,'2019-10-29 15:39:25','2019-10-29 10:09:25'),(5,4,2,NULL,'-',2,'2019-10-29 15:41:30','2019-10-29 10:11:30'),(6,6,8,'2019-09-11','developer',2,'2019-11-01 10:57:04','2019-11-01 05:27:04'),(7,2,9,'2019-12-13','senior developer',3,'2019-11-01 11:00:09','2019-11-01 05:30:09'),(8,3,9,'2019-02-14','digital marketer ',3,'2019-11-01 11:02:20','2019-11-01 05:32:20');
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
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(40) NOT NULL,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `description` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`subject_expert_id`),
  KEY `d2` (`department_id`),
  KEY `a5` (`academic_year_id`),
  KEY `facid1` (`faculty_id`),
  CONSTRAINT `a5` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `d2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  CONSTRAINT `facid1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_expert`
--

LOCK TABLES `subject_expert` WRITE;
/*!40000 ALTER TABLE `subject_expert` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'admin','$2y$13$pSkvvAWUVeVcL/AwCXI/v.vUXfrX5hs4DD/sUnZu648mzcntGRZsS','2019-01-08 16:13:38','2019-01-08 10:43:38');
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
  `participant` int(11) NOT NULL,
  `participant_name` text,
  `description` text,
  `faculty_id` int(11) NOT NULL,
  `faculty_name` text NOT NULL,
  `sponsor` varchar(90) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file1` text,
  `file2` text,
  `file3` text,
  `file4` text,
  PRIMARY KEY (`workshop_id`),
  KEY `d8` (`department_id`),
  KEY `a10` (`academic_year_id`),
  CONSTRAINT `a10` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  CONSTRAINT `d8` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workshop`
--

LOCK TABLES `workshop` WRITE;
/*!40000 ALTER TABLE `workshop` DISABLE KEYS */;
INSERT INTO `workshop` VALUES (2,'One-Day Faculty Awareness Workshop on NPTEL',0,0,3,NULL,NULL,0,'Prof. Prathap Haridoss, NPTEL Coordinator-IIT Madras ','-','2018-07-21','2018-07-21',1,1,'2019-05-09 09:57:46','2019-05-09 04:27:46',NULL,NULL,NULL,NULL),(3,'Version Controlling System using GIT',1,0,39,NULL,NULL,0,'Mr. Castor Godinho','-','2018-08-10','2018-08-10',1,1,'2019-05-09 10:10:56','2019-05-09 04:40:56',NULL,NULL,NULL,NULL),(4,'Features in Professional Image Editing - Photoshop',1,2000,9,NULL,NULL,0,'Ms. Neeta Dhopeshwarker','M.Sc.IT fund','2017-09-21','2018-09-21',1,1,'2019-05-09 10:25:31','2019-05-09 04:55:31',NULL,NULL,NULL,NULL),(5,'Cloud Computing and Big Data',1,31562,35,NULL,NULL,0,'Mr. V.C. Kumaresh, Mrs. Suchitra Bhat','DBT Star College Scheme','2019-03-15','2019-03-16',1,2,'2019-05-09 10:39:03','2019-08-27 09:49:04',NULL,NULL,NULL,NULL),(7,'Statistical Computing & Data Visualization using R',1,5820,55,NULL,NULL,0,'Mr. Mahesh Matha','DBT Star College Scheme','2019-08-10','2019-08-10',1,3,'2019-08-23 09:49:11','2019-08-27 09:31:08',NULL,NULL,NULL,NULL),(8,'TECHWEEK 2017',1,50000,75,NULL,NULL,0,'Mr. Abhishek Gudekar, Miss Priya Lotlikar','M.SC. (IT)','2017-08-07','2017-08-12',1,1,'2019-08-27 15:17:42','2019-08-29 04:43:09',NULL,NULL,NULL,NULL),(9,'NAAC Accreditation',0,0,2,NULL,NULL,0,'Dr. Shaila Ghanti - Vice Principal, Mr. V.C Kumaresh - Associate Professor','-','2019-07-18','2019-07-18',1,3,'2019-08-29 10:06:54','2019-08-29 04:36:54',NULL,NULL,NULL,NULL),(10,'Evaluation Reforms in Higher Education',0,0,1,NULL,NULL,0,'-','University Grants Commission, Western Regional office, Pune','2019-08-19','2019-08-20',1,3,'2019-08-29 10:11:44','2019-08-29 04:41:44',NULL,NULL,NULL,NULL),(11,'TECHWEEK 2019',1,36938,50,NULL,NULL,0,'Mrs. Suchitra Bhat, Mr. Abhishek Gudekar, Ms. Ashweta Fondekar','DBT Star Scheme','2019-08-26','2019-08-31',1,3,'2019-10-29 10:02:27','2019-10-29 04:32:27',NULL,NULL,NULL,NULL),(12,'Data Science and Digital Analytics',0,0,1,NULL,NULL,0,'Ms. Ashweta Fondekar-Assistant Professor','-','2019-10-10','2019-10-12',1,3,'2019-10-29 10:04:33','2019-10-29 04:34:33',NULL,NULL,NULL,NULL);
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

-- Dump completed on 2019-11-01 12:56:02
