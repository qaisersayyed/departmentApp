-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2018 at 11:37 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `department`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_year`
--

CREATE TABLE `academic_year` (
  `academic_year_id` int(11) NOT NULL,
  `year` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_year`
--

INSERT INTO `academic_year` (`academic_year_id`, `year`) VALUES
(1, '2017-2018'),
(2, '2018-2019'),
(3, '2018-2019');

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `agency_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`agency_id`, `name`) VALUES
(1, 'google'),
(2, 'microsoft');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `Type` varchar(250) NOT NULL,
  `date_of_joining` date NOT NULL,
  `date_of_leaving` date DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `Type`, `date_of_joining`, `date_of_leaving`, `faculty_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'contract ', '2018-01-01', '2018-12-31', 2, '2018-11-09 10:33:21', '2018-11-09 05:06:13', 1),
(2, 'lecture bases', '2018-11-01', '2019-11-29', 3, '2018-11-09 10:35:15', '2018-11-09 05:06:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auditing_member`
--

CREATE TABLE `auditing_member` (
  `auditing_member_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `college_name` text NOT NULL,
  `program` varchar(100) NOT NULL,
  `faculty_name` text NOT NULL,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bos`
--

CREATE TABLE `bos` (
  `bos_id` int(11) NOT NULL,
  `program` varchar(100) NOT NULL,
  `minutes` text NOT NULL,
  `date` date NOT NULL,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bos`
--

INSERT INTO `bos` (`bos_id`, `program`, `minutes`, `date`, `department_id`, `academic_year_id`, `created_at`, `updated_at`) VALUES
(1, 'techweek.', 'dggdgddkdkd/dkd/djgggg', '2018-09-03', 1, 1, '2018-09-03 20:49:36', '2018-09-05 06:44:22'),
(2, 'irix', 'a/b/v/', '2018-09-25', 1, 3, '2018-09-09 22:00:02', '2018-09-09 16:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `name`) VALUES
(1, 'computer science');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
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
  `file` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `name`, `venue`, `inhouse`, `cost`, `participant`, `start_date`, `end_date`, `department_id`, `academic_year_id`, `created_at`, `updated_at`, `file`) VALUES
(1, 'hh', 'wee', 1, 1234, 'dfffsefef', '2018-10-16', '2018-10-24', 1, 2, '2018-10-22 13:05:55', '2018-11-09 05:45:28', ''),
(2, 'Technobit', 'Chowgules', 1, 1000000001, 'Dipesh Tamang , Manisha Solanki , Qaiser Basha', '2018-12-15', '2018-11-16', 1, 2, '2018-11-09 10:29:50', '2018-11-09 04:59:50', 'uploads/event/firewall.png'),
(3, 'IRIX', 'Chowgules', 1, 20000000, 'Tushar Verlekar , Shubham Naique', '2018-11-15', '2018-11-30', 1, 2, '2018-11-09 10:30:50', '2018-11-09 05:00:50', 'uploads/event/netstat.png');

-- --------------------------------------------------------

--
-- Table structure for table `examiner`
--

CREATE TABLE `examiner` (
  `examiner_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `faculty_name` text NOT NULL,
  `venue` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `name`, `email`, `phone_no`, `address`, `employee_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'dsgd', 'hs222', '222', 'aa', '222', '2018-09-05 13:12:50', '2018-09-05 07:42:50', NULL),
(2, 'Castor Godinho', 'qaiserBasha@gmail.com', '9876543210', 'H.no 239 \r\nsirvodem,margao\r\nSalcete\r\nGoa', '4545454545', '2018-11-09 10:33:21', '2018-11-09 05:03:21', NULL),
(3, 'Wendham Gray', 'WendhamGray@gmail.com', '9123456780', 'Ankur Luis,  Carmona , Salcete Goa', '345678', '2018-11-09 10:35:15', '2018-11-09 05:05:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `internship`
--

CREATE TABLE `internship` (
  `internship_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `academic_year` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `hours` double NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internship`
--

INSERT INTO `internship` (`internship_id`, `program_id`, `student_id`, `academic_year`, `company`, `start_date`, `end_date`, `hours`, `file`) VALUES
(1, 6, 37, 2, 'Google', '2018-02-04', '2019-04-18', 40, 'uploads/Auditing_Member/tcp.png'),
(2, 6, 40, 2, 'Oracle', '2018-08-28', '2018-10-16', 20, 'uploads/Auditing_Member/tcp.png');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `organization_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`organization_id`, `company_name`, `contact_no`, `created_at`, `updated_at`) VALUES
(1, 'Oracle', '77727262', '2018-09-02 19:42:38', '2018-11-09 04:34:59'),
(2, 'Foss', '2222', '2018-09-02 19:42:48', '2018-11-09 04:35:09'),
(3, 'Ksol IT solution', '767677676', '2018-11-08 10:29:39', '2018-11-09 04:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `paper_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `credit` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`paper_id`, `name`, `program_id`, `credit`, `marks`, `created_at`, `updated_at`, `status`) VALUES
(2, 'Object Oriented Prog', 6, 3, 20, '2018-11-09 10:14:51', '2018-11-09 04:44:51', 1),
(3, 'DBMS', 6, 4, 20, '2018-11-09 10:15:21', '2018-11-09 04:45:21', 1),
(4, 'E.V.S', 6, 2, 20, '2018-11-09 10:15:47', '2018-11-09 04:45:47', 1),
(5, 'business com.', 6, 2, 20, '2018-11-09 10:17:34', '2018-11-09 04:47:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paper_faculty`
--

CREATE TABLE `paper_faculty` (
  `paper_faculty_id` int(11) NOT NULL,
  `paper_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `academic_year_id` int(11) DEFAULT NULL,
  `semester` varchar(10) NOT NULL,
  `program_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper_faculty`
--

INSERT INTO `paper_faculty` (`paper_faculty_id`, `paper_id`, `faculty_id`, `academic_year_id`, `semester`, `program_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '1', 6, '2018-11-09 20:29:38', '2018-11-09 15:00:36'),
(2, 3, 2, 1, '2', 6, '2018-11-09 20:31:13', '2018-11-09 15:01:13'),
(3, 5, 1, 1, '3', 6, '2018-11-09 20:32:12', '2018-11-09 15:02:12'),
(4, 4, 3, 1, '2', 6, '2018-11-09 20:33:21', '2018-11-09 15:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `paper_presented`
--

CREATE TABLE `paper_presented` (
  `paper_presented_id` int(11) NOT NULL,
  `paper_presented_file` text,
  `paper_title` varchar(255) DEFAULT NULL,
  `conference_name` varchar(255) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paper_published`
--

CREATE TABLE `paper_published` (
  `paper_published_id` int(11) NOT NULL,
  `paper_title` varchar(100) NOT NULL,
  `journal_name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paper_type`
--

CREATE TABLE `paper_type` (
  `paper_type_id` int(11) NOT NULL,
  `paper_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `academic_year_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper_type`
--

INSERT INTO `paper_type` (`paper_type_id`, `paper_id`, `type_id`, `academic_year_id`, `status`) VALUES
(3, 2, 2, 3, 1),
(4, 3, 2, 2, 1),
(5, 4, 3, 2, 1),
(6, 5, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_id`, `name`, `department_id`, `created_at`, `updated_at`, `status`) VALUES
(6, 'B.voc Software development', 1, '2018-11-09 09:49:36', '2018-11-09 04:19:36', 1),
(7, 'B.S.C Computer science', 1, '2018-11-09 09:49:58', '2018-11-09 04:19:58', 1),
(8, 'M.S.C IT ', 1, '2018-11-09 09:50:14', '2018-11-09 04:20:14', 1),
(9, 'P.G.D.C.A', 1, '2018-11-09 09:50:39', '2018-11-09 16:00:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `program_student`
--

CREATE TABLE `program_student` (
  `program_student_id` int(11) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  `academic_year_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_student`
--

INSERT INTO `program_student` (`program_student_id`, `program_id`, `student_id`, `created_at`, `updated_at`, `status`, `academic_year_id`) VALUES
(34, 6, 37, '2018-11-09 09:54:32', '2018-11-09 04:24:32', 1, 2),
(35, 6, 38, '2018-11-09 09:55:13', '2018-11-09 04:25:13', 1, 2),
(36, 6, 39, '2018-11-09 09:56:02', '2018-11-09 04:26:02', 1, 2),
(37, 6, 40, '2018-11-09 09:56:33', '2018-11-09 04:26:33', 1, 2),
(38, 6, 41, '2018-11-09 09:57:16', '2018-11-09 04:27:16', 1, 2),
(39, 6, 42, '2018-11-09 09:58:01', '2018-11-09 15:22:40', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `revision`
--

CREATE TABLE `revision` (
  `revision_id` int(11) NOT NULL,
  `syllabus_file` text,
  `syllabus_date` date NOT NULL,
  `program_id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  `academic_year_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revision`
--

INSERT INTO `revision` (`revision_id`, `syllabus_file`, `syllabus_date`, `program_id`, `paper_id`, `created_at`, `updated_at`, `status`, `academic_year_id`) VALUES
(1, 'uploads/revision/firewall.png', '2018-11-07', 6, 2, '2018-11-09 10:19:19', '2018-11-09 04:49:19', 1, 2),
(2, 'uploads/revision/ifconfig.png', '2018-08-14', 6, 3, '2018-11-09 10:19:38', '2018-11-09 04:49:38', 1, 2),
(3, 'uploads/revision/ping.png', '2018-08-21', 6, 4, '2018-11-09 10:19:59', '2018-11-09 04:49:59', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `seminar_id` int(11) NOT NULL,
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
  `file` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`seminar_id`, `speaker_name`, `start_date`, `end_date`, `participant`, `venue`, `inhouse`, `department_id`, `academic_year_id`, `created_at`, `updated_at`, `file`) VALUES
(1, 'Castor Godinho', '2018-11-01', '2018-11-07', 'Manisha Solanki , Qaiser Basha', 'Chowgules', 1, 1, 2, '2018-11-09 10:26:12', '2018-11-09 04:56:12', 'uploads/seminar/udp1.png');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `roll_no` varchar(50) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `email` varchar(254) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  `alumni` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `roll_no`, `phone_no`, `email`, `created_at`, `updated_at`, `status`, `alumni`) VALUES
(37, 'manisha solanki', 'VU172801', '123456789', 'MAN000@gmail.com', '2018-11-09 09:54:32', '2018-11-09 04:34:22', 1, 1),
(38, 'shunbham naik', 'VU172802', '987655222', 'shu000@gmail.com', '2018-11-09 09:55:13', '2018-11-09 15:04:53', 1, 1),
(39, 'Dipesh tamang', 'VU172803', '123546', 'dip870@gmail.com', '2018-11-09 09:56:02', '2018-11-09 15:04:53', 1, 1),
(40, 'Qaiser basha', 'VU172804', '5765455434', 'qai575@gmail.com', '2018-11-09 09:56:33', '2018-11-09 04:26:33', 1, 0),
(41, 'Deepraj dessai', 'VU172805', '4543444432', 'dipr654@gmail.com', '2018-11-09 09:57:16', '2018-11-09 04:27:16', 1, 0),
(42, 'Rahul nath', 'VU172806', '45432435647', 'ral5454@gmail.com', '2018-11-09 09:58:01', '2018-11-09 04:33:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_activity`
--

CREATE TABLE `student_activity` (
  `student_activity_id` int(11) NOT NULL,
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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_organization`
--

CREATE TABLE `student_organization` (
  `student_organization_id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `position` varchar(25) DEFAULT NULL,
  `program_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_organization`
--

INSERT INTO `student_organization` (`student_organization_id`, `organization_id`, `student_id`, `date_of_joining`, `position`, `program_id`, `created_at`, `updated_at`) VALUES
(2, 1, 37, '2018-10-28', 'manager', 6, '2018-11-09 10:01:57', '2018-11-09 04:31:57'),
(3, 1, 42, '2018-11-20', 'manager', 6, '2018-11-09 10:03:41', '2018-11-09 04:33:41'),
(4, 2, 40, '2018-10-29', 'pro', 6, '2018-11-09 20:36:31', '2018-11-09 15:06:31'),
(5, 2, 37, '2018-11-01', 'asst-manager', 6, '2018-11-09 20:43:21', '2018-11-09 15:13:21'),
(6, 3, 37, '2018-11-30', 'asd', 6, '2018-11-09 20:44:57', '2018-11-09 15:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `subject_expert`
--

CREATE TABLE `subject_expert` (
  `subject_expert_id` int(11) NOT NULL,
  `faculty_name` varchar(40) NOT NULL,
  `department_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_expert`
--

INSERT INTO `subject_expert` (`subject_expert_id`, `faculty_name`, `department_id`, `academic_year_id`, `created_at`, `updated_at`) VALUES
(1, 'depraj', 1, 2, '2018-09-03 20:51:16', '2018-09-11 04:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `name`, `status`) VALUES
(1, 'rrr', 0),
(2, 'Compulsory', 1),
(3, 'Selective', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'qaiser', '$2y$13$BBvQ7HRjK0CKmWnBiNGMp.5.Op7l.zNzHC0wjScpL6CAUXBuANwPm', '2018-11-08 14:52:27', '2018-11-08 09:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `workshop_id` int(11) NOT NULL,
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
  `file` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_year`
--
ALTER TABLE `academic_year`
  ADD PRIMARY KEY (`academic_year_id`);

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`agency_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `f1` (`faculty_id`);

--
-- Indexes for table `auditing_member`
--
ALTER TABLE `auditing_member`
  ADD PRIMARY KEY (`auditing_member_id`),
  ADD KEY `d7` (`department_id`),
  ADD KEY `a9` (`academic_year_id`);

--
-- Indexes for table `bos`
--
ALTER TABLE `bos`
  ADD PRIMARY KEY (`bos_id`),
  ADD KEY `d9` (`department_id`),
  ADD KEY `a11` (`academic_year_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `d11` (`department_id`),
  ADD KEY `a13` (`academic_year_id`);

--
-- Indexes for table `examiner`
--
ALTER TABLE `examiner`
  ADD PRIMARY KEY (`examiner_id`),
  ADD KEY `d10` (`department_id`),
  ADD KEY `a12` (`academic_year_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `internship`
--
ALTER TABLE `internship`
  ADD PRIMARY KEY (`internship_id`),
  ADD KEY `pro1` (`program_id`),
  ADD KEY `stud` (`student_id`),
  ADD KEY `ay1` (`academic_year`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`organization_id`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`paper_id`),
  ADD KEY `p3` (`program_id`);

--
-- Indexes for table `paper_faculty`
--
ALTER TABLE `paper_faculty`
  ADD PRIMARY KEY (`paper_faculty_id`),
  ADD KEY `p4` (`paper_id`),
  ADD KEY `f2` (`faculty_id`),
  ADD KEY `a2` (`academic_year_id`),
  ADD KEY `pro3` (`program_id`);

--
-- Indexes for table `paper_presented`
--
ALTER TABLE `paper_presented`
  ADD PRIMARY KEY (`paper_presented_id`);

--
-- Indexes for table `paper_published`
--
ALTER TABLE `paper_published`
  ADD PRIMARY KEY (`paper_published_id`);

--
-- Indexes for table `paper_type`
--
ALTER TABLE `paper_type`
  ADD PRIMARY KEY (`paper_type_id`),
  ADD KEY `p5` (`paper_id`),
  ADD KEY `t1` (`type_id`),
  ADD KEY `a3` (`academic_year_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`),
  ADD KEY `d1` (`department_id`);

--
-- Indexes for table `program_student`
--
ALTER TABLE `program_student`
  ADD PRIMARY KEY (`program_student_id`),
  ADD KEY `p2` (`program_id`),
  ADD KEY `s2` (`student_id`),
  ADD KEY `academic_year` (`academic_year_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `d6` (`department_id`),
  ADD KEY `a8` (`academic_year_id`);

--
-- Indexes for table `revision`
--
ALTER TABLE `revision`
  ADD PRIMARY KEY (`revision_id`),
  ADD KEY `p6` (`paper_id`),
  ADD KEY `a6` (`academic_year_id`),
  ADD KEY `p7` (`program_id`);

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`seminar_id`),
  ADD KEY `d12` (`department_id`),
  ADD KEY `a14` (`academic_year_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_activity`
--
ALTER TABLE `student_activity`
  ADD PRIMARY KEY (`student_activity_id`),
  ADD KEY `d5` (`department_id`),
  ADD KEY `a7` (`academic_year_id`);

--
-- Indexes for table `student_organization`
--
ALTER TABLE `student_organization`
  ADD PRIMARY KEY (`student_organization_id`),
  ADD KEY `o1` (`organization_id`),
  ADD KEY `s3` (`student_id`),
  ADD KEY `p1` (`program_id`);

--
-- Indexes for table `subject_expert`
--
ALTER TABLE `subject_expert`
  ADD PRIMARY KEY (`subject_expert_id`),
  ADD KEY `d2` (`department_id`),
  ADD KEY `a5` (`academic_year_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`workshop_id`),
  ADD KEY `d8` (`department_id`),
  ADD KEY `a10` (`academic_year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_year`
--
ALTER TABLE `academic_year`
  MODIFY `academic_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `agency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auditing_member`
--
ALTER TABLE `auditing_member`
  MODIFY `auditing_member_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bos`
--
ALTER TABLE `bos`
  MODIFY `bos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `examiner`
--
ALTER TABLE `examiner`
  MODIFY `examiner_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `internship`
--
ALTER TABLE `internship`
  MODIFY `internship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `organization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `paper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paper_faculty`
--
ALTER TABLE `paper_faculty`
  MODIFY `paper_faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paper_presented`
--
ALTER TABLE `paper_presented`
  MODIFY `paper_presented_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paper_published`
--
ALTER TABLE `paper_published`
  MODIFY `paper_published_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paper_type`
--
ALTER TABLE `paper_type`
  MODIFY `paper_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `program_student`
--
ALTER TABLE `program_student`
  MODIFY `program_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revision`
--
ALTER TABLE `revision`
  MODIFY `revision_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `seminar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `student_activity`
--
ALTER TABLE `student_activity`
  MODIFY `student_activity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_organization`
--
ALTER TABLE `student_organization`
  MODIFY `student_organization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subject_expert`
--
ALTER TABLE `subject_expert`
  MODIFY `subject_expert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `workshop`
--
ALTER TABLE `workshop`
  MODIFY `workshop_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `f1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `auditing_member`
--
ALTER TABLE `auditing_member`
  ADD CONSTRAINT `a9` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  ADD CONSTRAINT `d7` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `bos`
--
ALTER TABLE `bos`
  ADD CONSTRAINT `a11` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  ADD CONSTRAINT `d9` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `a13` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  ADD CONSTRAINT `d11` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `examiner`
--
ALTER TABLE `examiner`
  ADD CONSTRAINT `a12` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  ADD CONSTRAINT `d10` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `internship`
--
ALTER TABLE `internship`
  ADD CONSTRAINT `ay1` FOREIGN KEY (`academic_year`) REFERENCES `academic_year` (`academic_year_id`),
  ADD CONSTRAINT `pro1` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`),
  ADD CONSTRAINT `stud` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `paper`
--
ALTER TABLE `paper`
  ADD CONSTRAINT `p3` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`);

--
-- Constraints for table `paper_faculty`
--
ALTER TABLE `paper_faculty`
  ADD CONSTRAINT `a2` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  ADD CONSTRAINT `f2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`),
  ADD CONSTRAINT `p4` FOREIGN KEY (`paper_id`) REFERENCES `paper` (`paper_id`),
  ADD CONSTRAINT `pro3` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`);

--
-- Constraints for table `paper_type`
--
ALTER TABLE `paper_type`
  ADD CONSTRAINT `a3` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  ADD CONSTRAINT `p5` FOREIGN KEY (`paper_id`) REFERENCES `paper` (`paper_id`),
  ADD CONSTRAINT `t1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`);

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `d1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `program_student`
--
ALTER TABLE `program_student`
  ADD CONSTRAINT `p2` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`),
  ADD CONSTRAINT `program_student_ibfk_1` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  ADD CONSTRAINT `s2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `a8` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  ADD CONSTRAINT `d6` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `revision`
--
ALTER TABLE `revision`
  ADD CONSTRAINT `a6` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  ADD CONSTRAINT `p6` FOREIGN KEY (`paper_id`) REFERENCES `paper` (`paper_id`),
  ADD CONSTRAINT `p7` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`);

--
-- Constraints for table `seminar`
--
ALTER TABLE `seminar`
  ADD CONSTRAINT `a14` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  ADD CONSTRAINT `d12` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `student_activity`
--
ALTER TABLE `student_activity`
  ADD CONSTRAINT `a7` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  ADD CONSTRAINT `d5` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `student_organization`
--
ALTER TABLE `student_organization`
  ADD CONSTRAINT `o1` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`organization_id`),
  ADD CONSTRAINT `p1` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`),
  ADD CONSTRAINT `s3` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `subject_expert`
--
ALTER TABLE `subject_expert`
  ADD CONSTRAINT `a5` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  ADD CONSTRAINT `d2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `workshop`
--
ALTER TABLE `workshop`
  ADD CONSTRAINT `a10` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_year` (`academic_year_id`),
  ADD CONSTRAINT `d8` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
