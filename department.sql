-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 10, 2018 at 01:12 PM
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
(1, '2017'),
(2, '2018'),
(3, '2016');

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `agency_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `date_of_joining` date NOT NULL,
  `date_of_leaving` date DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'computer science'),
(2, 'maths'),
(3, 'physics');

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
(1, 'dsgd', 'hs222', '222', 'aa', '222', '2018-09-05 13:12:50', '2018-09-05 07:42:50', NULL);

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
(1, 'oracle', '77727262', '2018-09-02 19:42:38', '2018-09-06 10:21:45'),
(2, 'foss', '2222', '2018-09-02 19:42:48', '2018-09-02 14:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `paper_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
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
(1, 'jjjj', 2, 0, 0, '2018-09-03 21:00:46', '2018-09-03 15:30:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paper_faculty`
--

CREATE TABLE `paper_faculty` (
  `paper_faculty_id` int(11) NOT NULL,
  `paper_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `academic_year_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper_faculty`
--

INSERT INTO `paper_faculty` (`paper_faculty_id`, `paper_id`, `faculty_id`, `academic_year_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2018-09-05 13:13:04', '2018-09-05 07:43:04');

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
(1, 1, 1, 1, 1),
(2, 1, 1, 2, 1);

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
(1, 'bvoc (software)', 1, '2018-09-02 19:28:22', '2018-09-06 16:03:49', 1),
(2, 'algebra', 2, '2018-09-02 19:28:43', '2018-09-02 13:58:43', 1),
(3, 'msc it', 1, '2018-09-03 21:15:18', '2018-09-05 06:24:35', 0),
(4, 'multimedia', 1, '2018-09-05 12:17:52', '2018-09-05 06:48:25', 0);

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
(1, 2, 1, '2018-09-02 19:30:41', '2018-09-05 06:51:22', 0, 3),
(2, 2, 2, '2018-09-02 19:30:50', '2018-09-05 06:52:49', 1, 2),
(3, 1, 2, '2018-09-03 21:17:51', '2018-09-03 15:47:51', 1, 3),
(4, 4, 3, '2018-09-05 12:23:15', '2018-09-05 06:53:15', 1, 2),
(5, 1, 4, '2018-09-11 10:29:21', '2018-09-11 05:00:34', 1, 1),
(6, 1, 6, '2018-10-10 14:49:06', '2018-10-10 09:19:06', 1, 1),
(7, 1, 7, '2018-10-10 14:53:19', '2018-10-10 09:23:19', 1, 1),
(8, 1, 9, '2018-10-10 14:55:29', '2018-10-10 09:25:29', 1, 2),
(9, 2, 9, '2018-10-10 15:05:44', '2018-10-10 09:35:44', 1, 3),
(10, 1, NULL, '2018-10-10 15:35:00', '2018-10-10 10:05:00', 1, 1),
(11, 1, 11, '2018-10-10 15:36:51', '2018-10-10 10:06:51', 1, 1);

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
  `syllabus_file` text NOT NULL,
  `syllabus_date` date NOT NULL,
  `paper_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  `academic_year_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `roll_no`, `phone_no`, `email`, `created_at`, `updated_at`, `status`) VALUES
(1, 'jonhny', '1234566', '989898898', 'jonny03@gmail.com', '2018-09-02 19:29:04', '2018-09-16 06:23:30', 1),
(2, 'abz', '4321', '676753', 'abz000@gmail.com', '2018-09-02 19:29:36', '2018-09-16 06:23:45', 1),
(3, 'dhdh', '2121', '1232233', 'gfgf77@gmail.com', '2018-09-03 21:19:46', '2018-09-16 06:24:09', 0),
(4, 'shubham', '86767', '78647', 'shubham787@gmail.com', '2018-09-07 19:49:21', '2018-09-16 06:24:34', 1),
(5, 'qaiser', 'vu172821', '7474744747', 'baq001@gmail.com', '2018-09-16 11:55:10', '2018-09-16 06:25:34', 1),
(6, 'qaiseree', '233', '656', 'sasa2SGF@', '2018-10-10 14:49:06', '2018-10-10 09:19:06', 1),
(7, 'jedbse', '5454', 'df6565', 'szsdv', '2018-10-10 14:53:19', '2018-10-10 09:23:19', 1),
(8, 'jedbse', '233', 'df6565', 'baq000@gmail.com', '2018-10-10 14:54:25', '2018-10-10 09:24:25', 1),
(9, 'jedbse', '233', 'df6565', 'baq000@gmail.com', '2018-10-10 14:55:29', '2018-10-10 09:25:29', 1),
(10, 'dipesh', 'etryryyr', '43566', 'fgchvg', '2018-10-10 15:35:00', '2018-10-10 10:05:00', 1),
(11, 'dfghh', 'rree', 'ggg65', '54ggb', '2018-10-10 15:36:51', '2018-10-10 10:06:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_activity`
--

CREATE TABLE `student_activity` (
  `student_activity_id` int(11) NOT NULL,
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
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_organization`
--

INSERT INTO `student_organization` (`student_organization_id`, `organization_id`, `student_id`, `date_of_joining`, `position`, `created_at`, `updated_at`) VALUES
(2, 2, 2, '2018-08-01', 'asst-manager', '2018-09-02 19:43:27', '2018-09-02 14:13:27'),
(3, 1, 1, '2010-01-01', 'aaaaa', '2018-09-23 12:36:11', '2018-09-23 15:59:12');

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
(1, 'rrr', 1);

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  ADD KEY `a2` (`academic_year_id`);

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
  ADD KEY `a6` (`academic_year_id`);

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
  ADD KEY `s3` (`student_id`);

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
  MODIFY `agency_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examiner`
--
ALTER TABLE `examiner`
  MODIFY `examiner_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `organization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `paper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paper_faculty`
--
ALTER TABLE `paper_faculty`
  MODIFY `paper_faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paper_type`
--
ALTER TABLE `paper_type`
  MODIFY `paper_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `program_student`
--
ALTER TABLE `program_student`
  MODIFY `program_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revision`
--
ALTER TABLE `revision`
  MODIFY `revision_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `seminar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_activity`
--
ALTER TABLE `student_activity`
  MODIFY `student_activity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_organization`
--
ALTER TABLE `student_organization`
  MODIFY `student_organization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject_expert`
--
ALTER TABLE `subject_expert`
  MODIFY `subject_expert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `p4` FOREIGN KEY (`paper_id`) REFERENCES `paper` (`paper_id`);

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
  ADD CONSTRAINT `p6` FOREIGN KEY (`paper_id`) REFERENCES `paper` (`paper_id`);

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
