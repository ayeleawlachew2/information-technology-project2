-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 08:43 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exitexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `uid` varchar(50) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `password_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`uid`, `username`, `password`, `status`, `password_status`) VALUES
('admin01', 'admin_102', 'RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09', 'active', 'changed'),
('ASTU_registrar01', 'reg_10', 'RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09', 'active', 'changed'),
('BDU_registrar01', 'reg_11', 'RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09', 'active', 'unchanged'),
('committee01', 'committee@94', 'RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09', 'active', 'changed'),
('cs_setter01', 'setter_71', 'RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09', 'active', 'unchanged'),
('dept_wku01', 'dept_106', 'RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09', 'active', 'changed'),
('food_01', 'setter@62', 'RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09', 'active', 'changed'),
('is_setter01', 'setter_72', 'RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09', 'active', 'unchanged'),
('it_setter01', 'itsetter_amanu', 'RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09', 'active', 'changed'),
('NSR/0001/12', 'wkucand_01', 'RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09', 'active', 'changed'),
('NSR/0002/12', 'cand_132', 'RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09', 'active', 'changed'),
('NSR/0003/12', 'cand_133', 'RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09', 'active', 'changed'),
('NSR/0004/12', 'cand_134', 'RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09', 'active', 'unchanged'),
('NSR/9970/12', 'cand_70', 'RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09', 'active', 'changed'),
('registrar01', 'wkureg_mequan', 'RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09', 'active', 'changed'),
('wku_CCi', 'dean@98', 'RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09', 'active', 'changed');

-- --------------------------------------------------------

--
-- Table structure for table `attempt`
--

CREATE TABLE `attempt` (
  `at_id` int(11) NOT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `cid` varchar(20) NOT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `unversity` varchar(50) DEFAULT NULL,
  `rid` varchar(20) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`cid`, `dept`, `unversity`, `rid`, `year`) VALUES
('NSR/0001/12', 'Information Technology', 'Wolkite University', 'registrar01', 2023),
('NSR/0002/12', 'Information Technology', 'Wolkite University', 'registrar01', 2023),
('NSR/0003/12', 'Information Technology', 'Wolkite University', 'registrar01', 2023),
('NSR/0004/12', 'Information Technology', 'Wolkite University', 'registrar01', 2023),
('NSR/9970/12', 'Food Engineering', 'Adisabeba University', 'ASTU_registrar01', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `college_dean`
--

CREATE TABLE `college_dean` (
  `dean_id` varchar(20) NOT NULL,
  `college_name` varchar(70) NOT NULL,
  `university_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college_dean`
--

INSERT INTO `college_dean` (`dean_id`, `college_name`, `university_id`) VALUES
('wku_CCi', 'Computing and Informatics', 'institute01');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `content` varchar(2000) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `fname`, `lname`, `Date`, `email`, `content`, `status`) VALUES
(2342357, 'registrar01', 'Mequannt', 'Worku', '2023-05-31', 'mequanntworku@gmail.com', 'We need to know the schedule of the exit exam. please let us knowá¢', 'read'),
(2342364, 'registrar01', 'Mequannt', 'Worku', '2023-05-31', 'mequanntworku@gmail.com', 'We need to know the schedule of the exit exam. please let us knowÃ¡ÂÂ¢', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `committee_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`committee_id`) VALUES
('commitee05'),
('committee01'),
('mamite@1');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `did` varchar(50) NOT NULL,
  `cname` varchar(50) DEFAULT NULL,
  `dname` varchar(50) DEFAULT NULL,
  `uid` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`did`, `cname`, `dname`, `uid`) VALUES
('dept01', 'Computing and Informatics', 'Computer since', 'institute01'),
('dept_wku02', 'Computing and Informatics', 'Infprmation System', 'institute01'),
('dept_wku03', 'Engineering', 'Civil', 'institute01'),
('foodau01', 'Engineering', 'Food Engineering', 'institute02'),
('wku_dept04', 'Engineering', 'Food Engineering', 'institute01');

-- --------------------------------------------------------

--
-- Table structure for table `depthead`
--

CREATE TABLE `depthead` (
  `did` varchar(20) NOT NULL,
  `dname` varchar(50) DEFAULT NULL,
  `uid` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depthead`
--

INSERT INTO `depthead` (`did`, `dname`, `uid`) VALUES
('dept_wku01', 'Information Technology', 'institute01');

-- --------------------------------------------------------

--
-- Table structure for table `examdate`
--

CREATE TABLE `examdate` (
  `date_id` int(11) NOT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `question_type` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examdate`
--

INSERT INTO `examdate` (`date_id`, `dept`, `question_type`, `start_date`, `end_date`, `start_time`, `end_time`, `year`) VALUES
(6, 'all', 'Payment', '2023-04-04', '2023-06-14', '06:07:25', '11:58:00', 2023),
(7, 'Information Technology', 'Regular', '2023-04-04', '2023-06-14', '06:07:25', '11:58:00', 2023),
(8, 'Information Technology', 'Re_Exam', '2023-04-04', '2023-06-14', '06:07:25', '11:58:00', 2023),
(9, 'Food Engineering', 'Re_Exam', '2023-04-04', '2023-06-14', '06:07:25', '11:58:00', 2023),
(10, 'Food Engineering', 'Regular', '2023-04-04', '2023-06-14', '06:07:25', '11:58:00', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `examsetter`
--

CREATE TABLE `examsetter` (
  `sid` varchar(20) NOT NULL,
  `dname` varchar(50) DEFAULT NULL,
  `committee_id` varchar(30) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examsetter`
--

INSERT INTO `examsetter` (`sid`, `dname`, `committee_id`, `year`) VALUES
('cs_setter01', 'Computer Science', 'committee01', 2023),
('food_01', 'Food Engineering', 'committee01', 2023),
('is_setter01', 'Infprmation System', 'committee01', 2023),
('it_setter01', 'Information Technology', 'committee01', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `exam_passord`
--

CREATE TABLE `exam_passord` (
  `pw_id` int(11) NOT NULL,
  `dept` varchar(70) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `program` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_passord`
--

INSERT INTO `exam_passord` (`pw_id`, `dept`, `password`, `year`, `program`) VALUES
(5, 'Information Technology', '1234', 2023, 'Regular'),
(6, 'Information Technology', '1234', 2023, 'Re_Exam'),
(7, 'Food Engineering', '1234', 2023, 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `logtable`
--

CREATE TABLE `logtable` (
  `lig_id` int(11) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `login_time` varchar(50) DEFAULT NULL,
  `logout_time` varchar(50) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `activity_type` varchar(50) DEFAULT NULL,
  `activity_performed` varchar(2000) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logtable`
--

INSERT INTO `logtable` (`lig_id`, `user_id`, `username`, `role`, `login_time`, `logout_time`, `start_time`, `activity_type`, `activity_performed`, `ip_address`, `date`) VALUES
(157, 'registrar01', 'ayele_reg', 'Registrar', '12:30:17', '01:41:49', '28 May 2023 @ 12:37:23', 'Register Candidate', 'id:NSR/0001/12  Frist Name:Yilkal Father Name:Ketsela Last Name:Kokobe \r\n     sex:mphone:0945346665year:2023dept:Information Technologyuniversity:Wolkite University', '::1', '2023-05-28'),
(158, 'registrar01', 'ayele_reg', 'Registrar', '01:42:27', '04:56:57', '28 May 2023 @ 02:41:34', 'send comment to exam editor', 'content of comment(We need to want the link or ip address of the system. send the link via my email.)', '::1', '2023-05-28'),
(159, 'registrar01', 'ayele_reg', 'Registrar', '01:42:27', '04:56:57', '28 May 2023 @ 02:43:55', 'send comment to exam editor', 'content of comment(We need to want the link or ip address of the system. send the link via my email.)', '::1', '2023-05-28'),
(160, 'NSR/0001/12', 'wkucand_ylkal', 'Candidate', '09:41:31', 'empty', '28 May 2023 @ 10:21:20', 'create account', 'created User account Information(userid=NSR/0002/12,username=wkucand_munir,password=12345678,status=active)', '::1', '2023-05-28'),
(161, 'NSR/0001/12', 'wkucand_ylkal', 'Candidate', '09:41:31', 'empty', '28 May 2023 @ 10:23:02', 'create account', 'created User account Information(userid=NSR/0003/12,username=wkucand_mulate,password=12345678,status=active)', '::1', '2023-05-28'),
(162, 'NSR/0001/12', 'wkucand_ylkal', 'Candidate', '09:41:31', 'empty', '28 May 2023 @ 10:24:42', 'create account', 'created User account Information(userid=NSR/0002/12,username=cand_10,password=NSR/0002/12dmu,status=active)', '::1', '2023-05-28'),
(163, 'NSR/0001/12', 'wkucand_ylkal', 'Candidate', '09:41:31', 'empty', '28 May 2023 @ 10:24:42', 'create account', 'created User account Information(userid=NSR/0003/12,username=cand_11,password=NSR/0003/12dmu,status=active)', '::1', '2023-05-28'),
(164, 'NSR/0001/12', 'wkucand_ylkal', 'Candidate', '09:41:31', 'empty', '28 May 2023 @ 10:24:42', 'create account', 'created User account Information(userid=NSR/0004/12,username=cand_12,password=NSR/0004/12dmu,status=active)', '::1', '2023-05-28'),
(165, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 11:02:52', 'create account', 'created User account Information(userid=ASTU_registrar01,username=reg_10,password=12345678,status=active)', '::1', '2023-05-29'),
(166, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 11:02:52', 'create account', 'created User account Information(userid=BDU_registrar01,username=reg_11,password=12345678,status=active)', '::1', '2023-05-29'),
(167, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 11:02:52', 'create account', 'created User account Information(userid=JMU_registrar01,username=reg_12,password=12345678,status=active)', '::1', '2023-05-29'),
(168, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 11:02:52', 'create account', 'created User account Information(userid=MEU_registrar01,username=reg_13,password=12345678,status=active)', '::1', '2023-05-29'),
(169, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 11:10:29', 'create account', 'created User account Information(userid=ASTU_registrar01,username=reg_10,password=12345678,status=active)', '::1', '2023-05-29'),
(170, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 11:10:29', 'create account', 'created User account Information(userid=BDU_registrar01,username=reg_11,password=12345678,status=active)', '::1', '2023-05-29'),
(171, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 11:10:29', 'create account', 'created User account Information(userid=JMU_registrar01,username=reg_12,password=12345678,status=active)', '::1', '2023-05-29'),
(172, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 11:10:29', 'create account', 'created User account Information(userid=MEU_registrar01,username=reg_13,password=12345678,status=active)', '::1', '2023-05-29'),
(173, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 11:12:26', 'create account', 'created User account Information(userid=ASTU_registrar01,username=reg_10,password=12345678,status=active)', '::1', '2023-05-29'),
(174, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 11:12:26', 'create account', 'created User account Information(userid=BDU_registrar01,username=reg_11,password=12345678,status=active)', '::1', '2023-05-29'),
(175, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 11:12:26', 'create account', 'created User account Information(userid=JMU_registrar01,username=reg_12,password=12345678,status=active)', '::1', '2023-05-29'),
(176, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 11:12:26', 'create account', 'created User account Information(userid=MEU_registrar01,username=reg_13,password=12345678,status=active)', '::1', '2023-05-29'),
(177, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 11:37:42', 'create account', 'created User account Information(userid=JMU_registrar01,username=reg_42,password=12345678,status=active)', '::1', '2023-05-29'),
(178, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 11:37:42', 'create account', 'created User account Information(userid=MEU_registrar01,username=reg_43,password=12345678,status=active)', '::1', '2023-05-29'),
(179, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 11:40:07', 'create account', 'created User account Information(userid=JMU_registrar01,username=reg_80,password=12345678,status=active)', '::1', '2023-05-29'),
(180, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 11:40:07', 'create account', 'created User account Information(userid=MEU_registrar01,username=reg_81,password=12345678,status=active)', '::1', '2023-05-29'),
(181, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 11:41:09', 'create account', 'created User account Information(userid=JMU_registrar01,username=reg_23,password=12345678,status=active)', '::1', '2023-05-29'),
(182, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 11:41:09', 'create account', 'created User account Information(userid=MEU_registrar01,username=reg_24,password=12345678,status=active)', '::1', '2023-05-29'),
(183, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 12:03:07', 'create account', 'created User account Information(userid=committee02,username=committee_81,password=12345678,status=active)', '::1', '2023-05-29'),
(184, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 12:03:07', 'create account', 'created User account Information(userid=committee03,username=committee_82,password=12345678,status=active)', '::1', '2023-05-29'),
(185, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 12:03:32', 'create account', 'created User account Information(userid=dept_wku01,username=dept_106,password=12345678,status=active)', '::1', '2023-05-29'),
(186, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 12:03:58', 'create account', 'created User account Information(userid=NSR/0002/12,username=cand_132,password=12345678,status=active)', '::1', '2023-05-29'),
(187, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 12:03:58', 'create account', 'created User account Information(userid=NSR/0003/12,username=cand_133,password=12345678,status=active)', '::1', '2023-05-29'),
(188, 'admin01', 'admin_ayele', 'Admin', '10:48:13', 'empty', '29 May 2023 @ 12:03:58', 'create account', 'created User account Information(userid=NSR/0004/12,username=cand_134,password=12345678,status=active)', '::1', '2023-05-29'),
(189, 'admin01', 'admin_102', 'Admin', '09:39:15', 'empty', '29 May 2023 @ 09:40:00', 'create account', 'created User account Information(userid=cs_setter01,username=setter_71,password=12345678,status=active)', '::1', '2023-05-29'),
(190, 'admin01', 'admin_102', 'Admin', '09:39:15', 'empty', '29 May 2023 @ 09:40:00', 'create account', 'created User account Information(userid=is_setter01,username=setter_72,password=12345678,status=active)', '::1', '2023-05-29'),
(191, 'admin01', 'admin_102', 'Admin', '09:39:15', 'empty', '29 May 2023 @ 09:45:23', 'create account', 'created User account Information(userid=committee01,username=committee@94,password=12345678,status=active)', '::1', '2023-05-29'),
(192, 'admin01', 'admin_102', 'Admin', '09:39:15', 'empty', '29 May 2023 @ 09:45:23', 'create account', 'created User account Information(userid=committee02,username=committee@95,password=12345678,status=active)', '::1', '2023-05-29'),
(193, 'admin01', 'admin_102', 'Admin', '09:39:15', 'empty', '29 May 2023 @ 09:45:23', 'create account', 'created User account Information(userid=committee03,username=committee@96,password=12345678,status=active)', '::1', '2023-05-29'),
(194, 'admin01', 'admin_102', 'Exam setter', '09:39:15', 'empty', '29 May 2023 @ 10:03:30', 'Update user account ', 'update User account Information(userid=committee02,username=committee@95,status of  active user change by inactive or blocked)', '::1', '2023-05-29'),
(195, 'admin01', 'admin_102', 'Committee', '09:39:15', 'empty', '29 May 2023 @ 10:11:52', 'Update user account ', 'update User account Information(userid=committee02,change username by committee@95)', '::1', '2023-05-29'),
(196, 'admin01', 'admin_102', 'Admin', '09:39:15', '10:37:48', '30 May 2023 @ 12:56:37', 'Backup database', 'Admin take backup database to path= C:/wamp/www/WBGEE/admin/backup', '::1', '2023-05-30'),
(197, 'admin01', 'admin_102', 'Admin', '09:39:15', '10:37:48', '30 May 2023 @ 01:01:36', 'Backup database', 'Admin take backup database to path= C:/xampp/backup', '::1', '2023-05-30'),
(198, 'admin01', 'admin_102', 'Admin', '09:39:15', '10:37:48', '30 May 2023 @ 01:02:01', 'Backup database', 'Admin take backup database to path= C:/xampp/backup', '::1', '2023-05-30'),
(199, 'admin01', 'admin_102', 'Admin', '09:39:15', '10:37:48', '30 May 2023 @ 01:04:24', 'Backup database', 'Admin take backup database to path= C:/xampp/htdocs/exit exam backup/backup', '::1', '2023-05-30'),
(200, 'admin01', 'admin_102', 'Admin', '11:20:39', 'empty', '30 May 2023 @ 11:39:11', 'Backup database', 'Admin take backup database to path= C:/xampp/htdocs/exitExamBackupbackup', '::1', '2023-05-30'),
(201, 'admin01', 'admin_102', 'Admin', '11:20:39', 'empty', '30 May 2023 @ 11:39:29', 'Backup database', 'Admin take backup database to path= C:/xampp/htdocs/exitExamBackupbackup', '::1', '2023-05-30'),
(202, 'admin01', 'admin_102', 'Admin', '11:20:39', 'empty', '30 May 2023 @ 11:41:41', 'Backup database', 'Admin take backup database to path= C:/xampp/htdocs/exitExamBackupbackup', '::1', '2023-05-30'),
(203, 'admin01', 'admin_102', 'Admin', '11:20:39', 'empty', '30 May 2023 @ 11:42:55', 'Backup database', 'Admin take backup database to path= C:/xampp/htdocs/backup', '::1', '2023-05-30'),
(204, 'admin01', 'admin_102', 'Admin', '05:40:30', '08:08:13', '31 May 2023 @ 05:54:46', 'Backup database', 'Admin take backup database to path= C:/xampp/htdocs/backup', '::1', '2023-05-31'),
(205, 'admin01', 'admin_102', 'Admin', '05:40:30', '08:08:13', '31 May 2023 @ 05:55:09', 'Backup database', 'Admin take backup database to path= C:/xampp/htdocs/backup', '::1', '2023-05-31'),
(206, 'admin01', 'admin_102', 'Admin', '07:34:24', '08:08:13', '31 May 2023 @ 07:58:08', 'send comment to exam editor', 'content of comment(I recommended you to combine both view and edit role.)', '::1', '2023-05-31'),
(207, 'registrar01', 'wkureg_mequan', 'Registrar', '09:24:09', '09:27:50', '31 May 2023 @ 09:26:41', 'send comment to exam editor', 'content of comment(We need to know the schedule of the exit exam. please let us knowá¢)', '::1', '2023-05-31'),
(208, 'registrar01', 'wkureg_mequan', 'Registrar', '09:24:09', '09:27:50', '31 May 2023 @ 09:27:17', 'send comment to exam editor', 'content of comment(send the account)', '::1', '2023-05-31'),
(209, 'registrar01', 'wkureg_mequan', 'Registrar', '09:24:09', '09:27:50', '31 May 2023 @ 09:27:19', 'send comment to exam editor', 'content of comment(send the account)', '::1', '2023-05-31'),
(210, 'registrar01', 'wkureg_mequan', 'Registrar', '09:24:09', '09:27:50', '31 May 2023 @ 09:27:22', 'send comment to exam editor', 'content of comment(send the account)', '::1', '2023-05-31'),
(211, 'registrar01', 'wkureg_mequan', 'Registrar', '09:24:09', '09:27:50', '31 May 2023 @ 09:27:25', 'send comment to exam editor', 'content of comment(send the account)', '::1', '2023-05-31'),
(212, 'registrar01', 'wkureg_mequan', 'Registrar', '09:24:09', '09:27:50', '31 May 2023 @ 09:27:36', 'send comment to exam editor', 'content of comment(We need to know the schedule of the exit exam. please let us knowÃ¡ÂÂ¢)', '::1', '2023-05-31'),
(213, 'registrar01', 'wkureg_mequan', 'Registrar', '09:24:09', '09:27:50', '31 May 2023 @ 09:27:39', 'send comment to exam editor', 'content of comment(We need to know the schedule of the exit exam. please let us knowÃ¡ÂÂ¢)', '::1', '2023-05-31'),
(214, 'registrar01', 'wkureg_mequan', 'Registrar', '09:24:09', '09:27:50', '31 May 2023 @ 09:27:41', 'send comment to exam editor', 'content of comment(We need to know the schedule of the exit exam. please let us knowÃ¡ÂÂ¢)', '::1', '2023-05-31'),
(215, 'NSR/0001/12', 'wkucand_01', 'Candidate', '10:26:43', '10:44:03', '31 May 2023 @ 10:31:40', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0001/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-05-31'),
(216, 'NSR/0002/12', 'cand_132', 'Candidate', '10:45:38', '10:56:08', '31 May 2023 @ 10:47:03', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0002/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-05-31'),
(217, 'NSR/0002/12', 'cand_132', 'Candidate', '11:54:00', '12:00:16', '31 May 2023 @ 11:57:58', 'Request', 'Candidate Send Requuest To Exam Editor\r\n          [Candidate_ID:NSR/0002/12,Department:Information Technology,,Year:2023,Content:i need to take reexam for this round]', '::1', '2023-05-31'),
(218, 'NSR/0002/12', 'cand_132', 'Candidate', '06:52:52', '08:41:57', '31 May 2023 @ 07:06:17', 'Take Exit Exam as Re_Exam', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0002/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-05-31'),
(219, 'NSR/0002/12', 'cand_132', 'Candidate', '06:52:52', '08:41:57', '31 May 2023 @ 07:49:38', 'Take Exit Exam as Re_Exam', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0002/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-05-31'),
(220, 'NSR/0002/12', 'cand_132', 'Candidate', '08:26:57', '08:41:57', '31 May 2023 @ 08:41:37', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0002/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-05-31'),
(221, 'NSR/0002/12', 'cand_132', 'Candidate', '09:08:07', '11:36:12', '31 May 2023 @ 09:12:57', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0002/12,Department:Information Technology,University:,Year:2023]', '10.194.111.32', '2023-05-31'),
(222, 'NSR/0002/12', 'cand_132', 'Candidate', '09:08:07', '11:36:12', '31 May 2023 @ 09:18:06', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0002/12,Department:Information Technology,University:,Year:2023]', '10.194.111.32', '2023-05-31'),
(223, 'NSR/0002/12', 'cand_132', 'Candidate', '09:21:45', '11:36:12', '31 May 2023 @ 09:25:50', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0002/12,Department:Information Technology,University:,Year:2023]', '10.194.111.32', '2023-05-31'),
(224, 'NSR/0002/12', 'cand_132', 'Candidate', '10:04:30', '11:36:12', '31 May 2023 @ 10:09:43', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0002/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-05-31'),
(225, 'NSR/0002/12', 'cand_132', 'Candidate', '10:04:30', '11:36:12', '31 May 2023 @ 10:33:15', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0002/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-05-31'),
(226, 'NSR/0002/12', 'cand_132', 'Candidate', '10:04:30', '11:36:12', '31 May 2023 @ 10:36:15', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0002/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-05-31'),
(227, 'NSR/0002/12', 'cand_132', 'Candidate', '10:04:30', '11:36:12', '31 May 2023 @ 10:51:48', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0002/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-05-31'),
(228, 'NSR/0002/12', 'cand_132', 'Candidate', '11:40:58', '02:55:20', '01 Jun 2023 @ 01:59:20', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0002/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-01'),
(229, 'NSR/0002/12', 'cand_132', 'Candidate', '11:40:58', '02:55:20', '01 Jun 2023 @ 02:06:03', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0002/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-01'),
(230, 'NSR/0002/12', 'cand_132', 'Candidate', '11:40:58', '02:55:20', '01 Jun 2023 @ 02:09:17', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0002/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-01'),
(231, 'NSR/0002/12', 'cand_132', 'Candidate', '11:40:58', '02:55:20', '01 Jun 2023 @ 02:46:04', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0002/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-01'),
(232, 'NSR/0002/12', 'cand_132', 'Candidate', '11:40:58', '02:55:20', '01 Jun 2023 @ 02:49:29', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0002/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-01'),
(233, 'NSR/0002/12', 'cand_132', 'Candidate', '11:40:58', '02:55:20', '01 Jun 2023 @ 02:54:59', 'Take Exit Exam as Re_Exam', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0002/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-01'),
(234, 'NSR/0003/12', 'cand_133', 'Candidate', '02:56:25', '03:04:38', '01 Jun 2023 @ 03:04:22', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-01'),
(235, 'NSR/0004/12', 'cand_134', 'Candidate', '03:06:22', '03:16:55', '01 Jun 2023 @ 03:06:44', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0004/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-01'),
(236, 'NSR/0004/12', 'cand_134', 'Candidate', '03:06:22', '03:16:55', '01 Jun 2023 @ 03:07:25', 'Request', 'Candidate Send Requuest To Exam Editor\r\n          [Candidate_ID:NSR/0004/12,Department:Information Technology,,Year:2023,Content:i need to take re exam]', '::1', '2023-06-01'),
(237, 'NSR/0004/12', 'cand_134', 'Candidate', '03:06:22', '03:16:55', '01 Jun 2023 @ 03:09:52', 'Take Exit Exam as Re_Exam', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0004/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-01'),
(238, 'NSR/0004/12', 'cand_134', 'Candidate', '03:06:22', '03:16:55', '01 Jun 2023 @ 03:12:14', 'Take Exit Exam as Re_Exam', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0004/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-01'),
(239, 'NSR/0004/12', 'cand_134', 'Candidate', '03:06:22', '03:16:55', '01 Jun 2023 @ 03:16:37', 'send comment to exam editor', 'content of comment(There is mistake in my result)', '::1', '2023-06-01'),
(240, 'committee01', 'committee@94', 'Committee', '', '', '01 Jun 2023 @ 03:26:59', 'view candidate report', 'Total candidate who take exit exam(Female=3,Male=1,total=4),Result(Competent=3,Total Non Competent=1,Total=4)', '::1', '2023-06-01'),
(241, 'committee01', 'committee@94', 'Committee', '', '', '01 Jun 2023 @ 03:27:24', 'view candidate report', 'Total candidate who take exit exam(Female=3,Male=1,total=4),Result(Competent=3,Total Non Competent=1,Total=4)', '::1', '2023-06-01'),
(242, 'admin01', 'admin_102', 'Admin', '03:33:47', '03:45:32', '01 Jun 2023 @ 03:45:12', 'Backup database', 'Admin take backup database to path= C:/xampp/htdocs/backup', '::1', '2023-06-01'),
(243, 'committee01', 'committee@94', 'Committee', '', '', '01 Jun 2023 @ 03:59:13', 'view candidate report', 'Total candidate who take exit exam(Female=3,Male=1,total=4),Result(Competent=3,Total Non Competent=1,Total=4)', '::1', '2023-06-01'),
(244, 'committee01', 'committee@94', 'Committee', '', '', '01 Jun 2023 @ 04:01:19', 'view candidate report', 'Total candidate who take exit exam(Female=3,Male=1,total=4),Result(Competent=3,Total Non Competent=1,Total=4)', '::1', '2023-06-01'),
(245, 'committee01', 'committee@94', 'Committee', '', '', '01 Jun 2023 @ 05:29:20', 'view candidate report', 'Total candidate who take exit exam(Female=3,Male=1,total=4),Result(Competent=3,Total Non Competent=1,Total=4)', '::1', '2023-06-01'),
(246, 'NSR/0003/12', 'cand_133', 'Candidate', '09:13:54', '11:36:33', '01 Jun 2023 @ 11:22:51', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-01'),
(247, 'NSR/0003/12', 'cand_133', 'Candidate', '06:39:42', '08:50:03', '01 Jun 2023 @ 08:00:32', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-01'),
(248, 'NSR/0003/12', 'cand_133', 'Candidate', '06:39:42', '08:50:03', '01 Jun 2023 @ 08:28:47', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-01'),
(249, 'NSR/0003/12', 'cand_133', 'Candidate', '08:54:36', '09:24:56', '01 Jun 2023 @ 09:09:04', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-01'),
(250, 'NSR/0003/12', 'cand_133', 'Candidate', '08:54:36', '09:24:56', '01 Jun 2023 @ 09:11:47', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-01'),
(251, 'NSR/0003/12', 'cand_133', 'Candidate', '08:54:36', '09:24:56', '01 Jun 2023 @ 09:15:26', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-01'),
(252, 'NSR/0003/12', 'cand_133', 'Candidate', '08:54:36', '09:24:56', '01 Jun 2023 @ 09:16:11', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-01'),
(253, 'NSR/0003/12', 'cand_133', 'Candidate', '08:54:36', '09:24:56', '01 Jun 2023 @ 09:18:07', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-01'),
(254, 'NSR/0003/12', 'cand_133', 'Candidate', '08:54:36', '09:24:56', '01 Jun 2023 @ 09:22:27', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-01'),
(255, 'NSR/0003/12', 'cand_133', 'Candidate', '05:55:35', '07:46:17', '02 Jun 2023 @ 06:09:38', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-02'),
(256, 'NSR/0003/12', 'cand_133', 'Candidate', '05:55:35', '07:46:17', '02 Jun 2023 @ 07:08:02', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-02'),
(257, 'NSR/0003/12', 'cand_133', 'Candidate', '09:19:49', '07:53:16', '02 Jun 2023 @ 09:25:23', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,University:,Year:2023]', '10.194.111.11', '2023-06-02'),
(258, 'NSR/0003/12', 'cand_133', 'Candidate', '10:45:03', '07:53:16', '02 Jun 2023 @ 12:06:08', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-02'),
(259, 'NSR/0003/12', 'cand_133', 'Candidate', '07:03:26', '07:53:16', '02 Jun 2023 @ 07:06:04', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-02'),
(260, 'NSR/0003/12', 'cand_133', 'Candidate', '07:03:26', '07:53:16', '02 Jun 2023 @ 07:09:33', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-02'),
(261, 'NSR/0003/12', 'cand_133', 'Candidate', '07:03:26', '07:53:16', '02 Jun 2023 @ 07:26:12', 'Request', 'Candidate Send Requuest To Exam Editor\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,,Year:2023,Content:Can i take re exam for this round?]', '::1', '2023-06-02'),
(262, 'NSR/0003/12', 'cand_133', 'Candidate', '07:03:26', '07:53:16', '02 Jun 2023 @ 07:30:22', 'Take Exit Exam as Re_Exam', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-02'),
(263, 'NSR/0003/12', 'cand_133', 'Candidate', '07:03:26', '07:53:16', '02 Jun 2023 @ 07:38:07', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-02'),
(264, 'NSR/0003/12', 'cand_133', 'Candidate', '07:03:26', '07:53:16', '02 Jun 2023 @ 07:39:09', 'Take Exit Exam as Re_Exam', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/0003/12,Department:Information Technology,University:,Year:2023]', '::1', '2023-06-02'),
(265, 'dept_wku01', 'dept_106', 'Department Head', ' ', ' ', '02 Jun 2023 @ 10:01:01', 'view candidate report', 'Total candidate who take exit exam(Female=0,Male=0,total=0),Result(Competent=0,Total Non Competent=0,Total=0)', '::1', '2023-06-02'),
(266, 'dept_wku01', 'dept_106', 'Department Head', ' ', ' ', '02 Jun 2023 @ 10:02:08', 'view candidate report', 'Total candidate who take exit exam(Female=0,Male=0,total=0),Result(Competent=0,Total Non Competent=0,Total=0)', '::1', '2023-06-02'),
(267, 'dept_wku01', 'dept_106', 'Department Head', ' ', ' ', '02 Jun 2023 @ 10:08:29', 'view candidate report', 'Total candidate who take exit exam(Female=2,Male=1,total=3),Result(Competent=2,Total Non Competent=1,Total=3)', '::1', '2023-06-02'),
(268, 'dept_wku01', 'dept_106', 'Department Head', ' ', ' ', '02 Jun 2023 @ 10:09:44', 'view candidate report', 'Total candidate who take exit exam(Female=2,Male=1,total=3),Result(Competent=2,Total Non Competent=1,Total=3)', '::1', '2023-06-02'),
(269, 'dept_wku01', 'dept_106', 'Department Head', ' ', ' ', '02 Jun 2023 @ 10:52:03', 'view candidate report', 'Total candidate who take exit exam(Female=2,Male=1,total=3),Result(Competent=2,Total Non Competent=1,Total=3)', '::1', '2023-06-02'),
(270, 'admin01', 'admin_102', 'Admin', '11:41:12', '11:49:31', '02 Jun 2023 @ 11:48:50', 'create account', 'created User account Information(userid=wku_CCi,username=dean@98,password=12345678,status=active)', '::1', '2023-06-02'),
(271, 'wku_CCi', 'dean@98', 'College Dean', ' ', ' ', '03 Jun 2023 @ 12:00:57', 'view candidate report', 'Total candidate who take exit exam(Female=0,Male=0,total=0),Result(Competent=0,Total Non Competent=0,Total=0)', '::1', '2023-06-03'),
(272, 'wku_CCi', 'dean@98', 'College Dean', ' ', ' ', '03 Jun 2023 @ 12:07:42', 'view candidate report', 'Total candidate who take exit exam(Female=0,Male=0,total=0),Result(Competent=0,Total Non Competent=0,Total=0)', '::1', '2023-06-03'),
(273, 'wku_CCi', 'dean@98', 'College Dean', ' ', ' ', '03 Jun 2023 @ 12:08:07', 'view candidate report', 'Total candidate who take exit exam(Female=0,Male=0,total=0),Result(Competent=0,Total Non Competent=0,Total=0)', '::1', '2023-06-03'),
(274, 'wku_CCi', 'dean@98', 'College Dean', ' ', ' ', '03 Jun 2023 @ 12:09:12', 'view candidate report', 'Total candidate who take exit exam(Female=2,Male=1,total=3),Result(Competent=2,Total Non Competent=1,Total=3)', '::1', '2023-06-03'),
(275, 'wku_CCi', 'dean@98', 'College Dean', ' ', ' ', '03 Jun 2023 @ 12:10:09', 'view candidate report', 'Total candidate who take exit exam(Female=2,Male=1,total=3),Result(Competent=2,Total Non Competent=1,Total=3)', '::1', '2023-06-03'),
(276, 'wku_CCi', 'dean@98', 'College Dean', ' ', ' ', '03 Jun 2023 @ 12:10:23', 'view candidate report', 'Total candidate who take exit exam(Female=2,Male=1,total=3),Result(Competent=2,Total Non Competent=1,Total=3)', '::1', '2023-06-03'),
(277, 'wku_CCi', 'dean@98', 'College Dean', ' ', ' ', '03 Jun 2023 @ 12:12:11', 'view candidate report', 'Total candidate who take exit exam(Female=2,Male=1,total=3),Result(Competent=2,Total Non Competent=1,Total=3)', '::1', '2023-06-03'),
(278, 'dept_wku01', 'dept_106', 'Department Head', ' ', ' ', '03 Jun 2023 @ 12:18:07', 'view candidate report', 'Total candidate who take exit exam(Female=2,Male=1,total=3),Result(Competent=2,Total Non Competent=1,Total=3)', '::1', '2023-06-03'),
(279, 'dept_wku01', 'dept_106', 'Department Head', ' ', ' ', '03 Jun 2023 @ 12:24:06', 'view candidate report', 'Total candidate who take exit exam(Female=2,Male=1,total=3),Result(Competent=2,Total Non Competent=1,Total=3)', '::1', '2023-06-03'),
(280, 'admin01', 'admin_102', 'Admin', '05:18:58', '06:06:26', '03 Jun 2023 @ 05:33:20', 'create account', 'created User account Information(userid=NSR/9984/12,username=cand@63,password=RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09,status=active)', '::1', '2023-06-03'),
(281, 'admin01', 'admin_102', 'Admin', '05:18:58', '06:06:26', '03 Jun 2023 @ 05:33:20', 'create account', 'created User account Information(userid=NSR/9985/12,username=cand@64,password=RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09,status=active)', '::1', '2023-06-03'),
(282, 'admin01', 'admin_102', 'Admin', '05:18:58', '06:06:26', '03 Jun 2023 @ 05:33:20', 'create account', 'created User account Information(userid=NSR/9986/12,username=cand@65,password=RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09,status=active)', '::1', '2023-06-03'),
(283, 'admin01', 'admin_102', 'Admin', '05:18:58', '06:06:26', '03 Jun 2023 @ 05:33:20', 'create account', 'created User account Information(userid=NSR/9987/12,username=cand@66,password=RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09,status=active)', '::1', '2023-06-03'),
(284, 'admin01', 'admin_102', 'Admin', '05:18:58', '06:06:26', '03 Jun 2023 @ 05:33:20', 'create account', 'created User account Information(userid=NSR/9988/12,username=cand@67,password=RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09,status=active)', '::1', '2023-06-03'),
(285, 'admin01', 'admin_102', 'Admin', '05:18:58', '06:06:26', '03 Jun 2023 @ 05:40:47', 'create account', 'created User account Information(userid=NSR/9984/12,username=cand@90,password=RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09,status=active)', '::1', '2023-06-03'),
(286, 'admin01', 'admin_102', 'Admin', '05:18:58', '06:06:26', '03 Jun 2023 @ 05:40:47', 'create account', 'created User account Information(userid=NSR/9985/12,username=cand@91,password=RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09,status=active)', '::1', '2023-06-03'),
(287, 'admin01', 'admin_102', 'Admin', '05:18:58', '06:06:26', '03 Jun 2023 @ 05:40:47', 'create account', 'created User account Information(userid=NSR/9986/12,username=cand@92,password=RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09,status=active)', '::1', '2023-06-03'),
(288, 'admin01', 'admin_102', 'Admin', '05:18:58', '06:06:26', '03 Jun 2023 @ 05:40:47', 'create account', 'created User account Information(userid=NSR/9987/12,username=cand@93,password=RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09,status=active)', '::1', '2023-06-03'),
(289, 'admin01', 'admin_102', 'Admin', '05:18:58', '06:06:26', '03 Jun 2023 @ 05:40:47', 'create account', 'created User account Information(userid=NSR/9988/12,username=cand@94,password=RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09,status=active)', '::1', '2023-06-03'),
(290, 'committee01', 'committee@94', 'Committee', '', '', '01 Jun 2023 @ 11:07:37', 'view candidate report', 'Total candidate who take exit exam(Female=2,Male=1,total=3),Result(Competent=2,Total Non Competent=1,Total=3)', '::1', '2023-06-01'),
(291, 'committee01', 'committee@94', 'Committee', '', '', '01 Jun 2023 @ 11:08:02', 'view candidate report', 'Total candidate who take exit exam(Female=0,Male=0,total=0),Result(Competent=0,Total Non Competent=0,Total=0)', '::1', '2023-06-01'),
(292, 'committee01', 'committee@94', 'Committee', '', '', '01 Jun 2023 @ 11:08:58', 'view candidate report', 'Total candidate who take exit exam(Female=0,Male=0,total=0),Result(Competent=0,Total Non Competent=0,Total=0)', '::1', '2023-06-01'),
(293, 'committee01', 'committee@94', 'Committee', '', '', '01 Jun 2023 @ 11:11:26', 'view candidate report', 'Total candidate who take exit exam(Female=2,Male=1,total=3),Result(Competent=2,Total Non Competent=1,Total=3)', '::1', '2023-06-01'),
(294, 'committee01', 'committee@94', 'Committee', '', '', '01 Jun 2023 @ 11:11:51', 'view candidate report', 'Total candidate who take exit exam(Female=2,Male=1,total=3),Result(Competent=2,Total Non Competent=1,Total=3)', '::1', '2023-06-01'),
(295, 'committee01', 'committee@94', 'Committee', '', '', '01 Jun 2023 @ 11:12:03', 'view candidate report', 'Total candidate who take exit exam(Female=2,Male=1,total=3),Result(Competent=2,Total Non Competent=1,Total=3)', '::1', '2023-06-01'),
(296, 'committee01', 'committee@94', 'Committee', '', '', '01 Jun 2023 @ 11:12:53', 'view candidate report', 'Total candidate who take exit exam(Female=2,Male=1,total=3),Result(Competent=2,Total Non Competent=1,Total=3)', '::1', '2023-06-01'),
(297, 'committee01', 'committee@94', 'Committee', '', '', '01 Jun 2023 @ 11:13:06', 'view candidate report', 'Total candidate who take exit exam(Female=2,Male=1,total=3),Result(Competent=2,Total Non Competent=1,Total=3)', '::1', '2023-06-01'),
(298, 'committee01', 'committee@94', 'Committee', '', '', '01 Jun 2023 @ 11:13:17', 'view candidate report', 'Total candidate who take exit exam(Female=2,Male=1,total=3),Result(Competent=2,Total Non Competent=1,Total=3)', '::1', '2023-06-01'),
(299, 'admin01', 'admin_102', 'Admin', '11:33:07', 'empty', '01 Jun 2023 @ 11:43:40', 'create account', 'created User account Information(userid=NSR/9984/12,username=cand@87,password=RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09,status=active)', '::1', '2023-06-01'),
(300, 'admin01', 'admin_102', 'Admin', '11:33:07', 'empty', '01 Jun 2023 @ 11:43:40', 'create account', 'created User account Information(userid=NSR/9985/12,username=cand@88,password=RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09,status=active)', '::1', '2023-06-01'),
(301, 'admin01', 'admin_102', 'Admin', '11:33:07', 'empty', '01 Jun 2023 @ 11:43:40', 'create account', 'created User account Information(userid=NSR/9986/12,username=cand@89,password=RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09,status=active)', '::1', '2023-06-01'),
(302, 'admin01', 'admin_102', 'Admin', '11:33:07', 'empty', '01 Jun 2023 @ 11:43:40', 'create account', 'created User account Information(userid=NSR/9987/12,username=cand@90,password=RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09,status=active)', '::1', '2023-06-01'),
(303, 'admin01', 'admin_102', 'Admin', '11:33:07', 'empty', '01 Jun 2023 @ 11:43:40', 'create account', 'created User account Information(userid=NSR/9988/12,username=cand@91,password=RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09,status=active)', '::1', '2023-06-01'),
(304, 'admin01', 'admin_102', 'Admin', '11:33:07', 'empty', '01 Jun 2023 @ 11:49:26', 'create account', 'created User account Information(userid=NSR/9984/12,username=cand87,password=12345678,status=active)', '::1', '2023-06-01'),
(305, 'admin01', 'admin_102', 'Admin', '11:33:07', 'empty', '01 Jun 2023 @ 11:57:30', 'create account', 'created User account Information(userid=NSR/9984/12,username=cand856,password=RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09,status=active)', '::1', '2023-06-01'),
(306, 'admin01', 'admin_102', 'Admin', '11:33:07', '12:17:36', '02 Jun 2023 @ 12:01:50', 'Backup database', 'Admin take backup database to path= C:/xampp/htdocs/backup', '::1', '2023-06-02'),
(307, 'admin01', 'admin_102', 'Admin', '11:33:07', '12:17:36', '02 Jun 2023 @ 12:02:42', 'Backup database', 'Admin take backup database to path= C:/xampp/htdocs/backup', '::1', '2023-06-02'),
(308, 'registrar01', 'wkureg_mequan', 'Registrar', ' ', ' ', '02 Jun 2023 @ 12:56:26', 'view candidate report', 'Total candidate who take exit exam(Female=2,Male=1,total=3),Result(Competent=2,Total Non Competent=1,Total=3)', '::1', '2023-06-02'),
(309, 'admin01', 'admin_102', 'Admin', '01:04:17', '01:05:20', '02 Jun 2023 @ 01:04:24', 'create account', 'created User account Information(userid=food_01,username=setter@62,password=RVkxY3dyNEZ3dGVqZU1DZm1kOFpPZz09,status=active)', '::1', '2023-06-02'),
(310, 'NSR/9970/12', 'cand_70', 'Candidate', '06:50:44', '06:51:15', '02 Jun 2023 @ 06:51:04', 'Take Exit Exam as Regular', 'During These Time Candidate Take Exam.Detail Information<br>\r\n          [Candidate_ID:NSR/9970/12,Department:Food Engineering,University:,Year:2023]', '::1', '2023-06-02'),
(311, 'dept_wku01', 'dept_106', 'Department Head', ' ', ' ', '02 Jun 2023 @ 08:34:26', 'view candidate report', 'Total candidate who take exit exam(Female=2,Male=1,total=3),Result(Competent=2,Total Non Competent=1,Total=3)', '::1', '2023-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_number` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `Dates` date DEFAULT NULL,
  `Ex_Dates` date DEFAULT NULL,
  `Content` varchar(2000) DEFAULT NULL,
  `sender` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_number`, `status`, `title`, `Dates`, `Ex_Dates`, `Content`, `sender`) VALUES
(11, 'active', 'About Password', '2023-05-31', '2023-07-24', 'You must change password for the first login.  ', 'Committee');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `request_id` int(11) NOT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `unvisersity` varchar(50) DEFAULT NULL,
  `resean` varchar(2000) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  `committee_status` varchar(20) DEFAULT NULL,
  `user_status` varchar(20) DEFAULT NULL,
  `pay_fee` varchar(20) DEFAULT NULL,
  `check_status` varchar(20) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `user_last_response` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`request_id`, `uid`, `dept`, `unvisersity`, `resean`, `year`, `dates`, `committee_status`, `user_status`, `pay_fee`, `check_status`, `image`, `user_last_response`) VALUES
(7, 'NSR/0002/12', 'Information Technology', 'Wolkite University', 'i need to take reexam for this round', 2023, '2023-05-31', 'read', 'read', 'Yes', 'Yes', '../exam_agency/Bank_Receipt/a.jpg', 'Yes'),
(8, 'NSR/0004/12', 'Information Technology', 'Wolkite University', 'i need to take re exam', 2023, '2023-06-01', 'reject', 'unread', 'No', 'No', 'No Bank_Receipt', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qid` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `question` varchar(767) DEFAULT NULL,
  `optiona` varchar(1000) DEFAULT NULL,
  `optionb` varchar(1000) DEFAULT NULL,
  `optionc` varchar(1000) DEFAULT NULL,
  `optiond` varchar(1000) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL,
  `question_type` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `sid` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `question_number`, `year`, `dept`, `question`, `optiona`, `optionb`, `optionc`, `optiond`, `answer`, `question_type`, `status`, `sid`) VALUES
(1, 1, 2023, 'Information Technology', 'RAD stands for__________', 'Relative Application Development', 'Rapid Application Development', 'Rapid Application Document', 'None of the above', 'B', 'Regular', 'active', 'it_setter01'),
(8, 2, 2023, 'Information Technology ', 'What is the major drawback of using RAD Model?', 'Highly specialized & skilled developers/designers are required', 'Increases re-usability of components', 'Encourages customer/client feedback', 'Increases re-usability of components, Highly specialized & skilled developers/designers are required', 'D', 'Regular', 'active', 'it_setter01'),
(9, 3, 2023, 'Information Technology ', 'SDLC stands for_________', 'Software Development Life Cycle', 'System Development Life cycle', 'Software Design Life Cycle', 'System Design Life Cycle', 'A', 'Regular', 'active', 'it_setter01'),
(10, 4, 2023, 'Information Technology ', 'Which model can be selected if user is involved in all the phases of SDLC?', 'Waterfall Model', 'Prototyping Model', 'RAD Model', 'Prototyping Model & RAD Model', 'C', 'Regular', 'active', 'it_setter01'),
(11, 5, 2023, 'Information Technology ', 'Which one of the following is not a phase of Prototyping Model?', 'Quick Design', 'Coding', 'Prototype Refinement', 'Engineer Product', 'B', 'Regular', 'active', 'it_setter01'),
(13, 2, 2023, 'Information Technology ', 'Name the stages that SDLC covers in s/w development', 'Requirements, design, testing, coding', 'Requirements, design, testing, coding and maintenance', 'Design, testing, coding and maintenance', 'None', 'C', 'Re_Exam', 'active', 'it_setter01'),
(14, 3, 2023, 'Information Technology ', 'Which of these are characteristics of a strong design?', 'Low Coupling', 'Modular', 'High Cohesion', 'None', 'D', 'Re_Exam', 'active', 'it_setter01'),
(15, 1, 2023, 'Information Technology', 'Production support is the main feature of ---------', 'Maintenance', 'Waterfal', 'Incremental', 'Itrative', 'A', 'Re_Exam', 'active', 'it_setter01'),
(21, 6, 2023, 'Information Technology ', 'Which of the following is the purpose of disk defragmentation on a computer?', 'To encrypt sensitive data', 'To organize fragmented data', 'To remove viruses and malware', 'To optimize internet speed', 'B', 'Regular', 'active', 'it_setter01'),
(22, 7, 2023, 'Information Technology ', 'What is the primary purpose of cleaning the interior of a computer?', 'To increase processor speed', 'To improve graphics performance', 'To prevent overheating', 'To extend battery life', 'C', 'Regular', 'active', 'it_setter01'),
(23, 8, 2023, 'Information Technology ', 'Why is it important to regularly update software and operating systems on a computer?', 'To improve battery life', 'To increase internet speed', 'To enhance system security', 'To boost processor performance', 'C', 'Regular', 'active', 'it_setter01'),
(24, 9, 2023, 'Information Technology ', 'What is the purpose of an antivirus program?', 'To optimize hard drive space', 'To monitor internet connectivity', 'To protect against malware', 'To improve software compatibility', 'C', 'Regular', 'active', 'it_setter01'),
(25, 10, 2023, 'Information Technology ', 'What is the primary purpose of regular data backups?', 'To prevent system crashes', 'To recover lost passwords', 'To restore deleted files', 'To safeguard against data loss', 'D', 'Regular', 'active', 'it_setter01'),
(26, 11, 2023, 'Information Technology ', 'Which of the following devices operates at the Data Link Layer of the OSI model?', 'Router', 'Switch', 'Hub', 'Firewall', 'B', 'Regular', 'active', 'it_setter01'),
(27, 12, 2023, 'Information Technology ', 'Which protocol is commonly used for email communication?', 'HTTP', 'FTP', 'SMTP', 'SNMP', 'C', 'Regular', 'active', 'it_setter01'),
(28, 13, 2023, 'Information Technology ', 'What is the primary function of a router in a network?', 'Transmit data between devices on the same network', 'Filter and forward network traffic based on IP addresses', 'Provide physical connectivity to network devices', 'Manage network security and prevent unauthorized access', 'B', 'Regular', 'active', 'it_setter01'),
(29, 14, 2023, 'Information Technology ', 'Which networking device operates at the Physical Layer of the OSI model?', 'Router', 'Bridge', 'Switch', 'Repeater', 'D', 'Regular', 'active', 'it_setter01'),
(30, 15, 2023, 'Information Technology ', 'What does DHCP stand for in networking?', 'Dynamic Host Control Protocol', 'Dynamic Host Configuration Protocol', 'Domain Host Configuration Protocol', 'Domain Host Control Protocol', 'B', 'Regular', 'active', 'it_setter01'),
(41, 1, 2023, 'Food Engineering', 'What is the process of converting raw agricultural materials into food products?', 'Fermentation', 'Filtration', 'Food processing', 'Freezing', 'C', 'Regular', 'active', 'food_01'),
(42, 2, 2023, 'Food Engineering', 'Which of the following is an example of a carbohydrate?', 'Protein', 'Fat', 'Sugar', 'Vitamin', 'C', 'Regular', 'active', 'food_01'),
(43, 3, 2023, 'Food Engineering', 'What is the main function of food preservatives?', 'Enhancing flavor', 'Adding texture', 'Extending shelf life', 'Increasing nutritional value', 'C', 'Regular', 'active', 'food_01');

-- --------------------------------------------------------

--
-- Table structure for table `registrar`
--

CREATE TABLE `registrar` (
  `rid` varchar(20) NOT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `committee_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrar`
--

INSERT INTO `registrar` (`rid`, `uid`, `committee_id`) VALUES
('ASTU_registrar01', 'institute02', 'committee01'),
('BDU_registrar01', 'institute04', 'committee01'),
('JMU_registrar01', 'institute05', 'committee01'),
('MEU_registrar01', 'institute06', 'committee01'),
('registrar01', 'institute01', 'committee01'),
('Regi_2', 'institute03', 'committee01');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `uid` varchar(50) NOT NULL,
  `totalQestion` int(11) DEFAULT NULL,
  `correctanswer` int(11) DEFAULT NULL,
  `wronganswer` int(11) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `program` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`uid`, `totalQestion`, `correctanswer`, `wronganswer`, `total`, `status`, `program`) VALUES
('NSR/0001/12', 15, 9, 6, '60%', 'Competent', 'Regular'),
('NSR/0002/12', 3, 1, 2, '33.33%', 'Not Competent', 'Re_Exam'),
('NSR/0004/12', 3, 3, 0, '100%', 'Competent', 'Re_Exam');

-- --------------------------------------------------------

--
-- Table structure for table `set_score`
--

CREATE TABLE `set_score` (
  `score_id` int(11) NOT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `set_score`
--

INSERT INTO `set_score` (`score_id`, `dept`, `score`, `year`) VALUES
(12, 'Information Technology', 50, 2023),
(13, 'Food Engineering', 50, 2023),
(14, 'Computer since', 50, 2023),
(15, 'Civil', 60, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `takenexam`
--

CREATE TABLE `takenexam` (
  `uid` varchar(50) NOT NULL,
  `program` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `takenexam`
--

INSERT INTO `takenexam` (`uid`, `program`) VALUES
('NSR/0001/12', 'Regular'),
('NSR/0002/12', 'Re_Exam'),
('NSR/0004/12', 'Re_Exam');

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE `timer` (
  `tid` int(11) NOT NULL,
  `question_type` varchar(20) DEFAULT NULL,
  `dept` varchar(50) NOT NULL,
  `hour` int(11) DEFAULT NULL,
  `min` int(11) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `setter_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`tid`, `question_type`, `dept`, `hour`, `min`, `year`, `setter_id`) VALUES
(8, 'Re_Exam', 'Information Technology', 0, 30, 2023, 'it_setter01'),
(9, 'Regular', 'Information Technology', 1, 30, 2023, 'it_setter01'),
(10, 'Regular', 'Food Engineering', 0, 30, 2023, 'food_01');

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `uid` varchar(50) NOT NULL,
  `uname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`uid`, `uname`) VALUES
('institute02', 'Adisabeba University '),
('institute04', 'Bahrdar University'),
('institute03', 'Hawassa University'),
('institute05', 'Jimma University'),
('institute06', 'Mekele University'),
('institute01', 'Wolkite University');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` varchar(50) NOT NULL,
  `ufname` varchar(50) DEFAULT NULL,
  `umname` varchar(50) DEFAULT NULL,
  `ulname` varchar(50) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `ufname`, `umname`, `ulname`, `sex`, `mobile`, `email`, `photo`, `role`) VALUES
('admin01', 'Ayele', 'Awlachew', 'Zinbele', 'm', '0904111398', 'ayeleawlachew@gmail.com', 'userphoto/ayele.jpg', 'Admin'),
('admin02', 'Ashenafi', 'Fereja', 'Gemechu', 'm', '0956777345', 'ashenafi@gmail.com', 'userphoto/login.jpg', 'Admin'),
('ASTU_registrar01', 'Mesele', 'Awlachew', 'Zinbele', '', '0983289244', 'meseleit@gmail.com', 'userphoto/mesele.jpg', 'Registrar'),
('BDU_registrar01', 'Habtamu', 'Chernet', 'Belayneh', 'm', '0980661344', 'habteabssinya@gmail.com', 'userphoto/habte.jpg', 'Registrar'),
('commitee05', 'Werkensh', 'Werku', 'Alemu', 'f', '0956777345', 'werkneshwerku@gmail.com', 'userphoto/login.jpg', 'Committee'),
('committee01', 'Mntesnot', 'Zewde', 'Ayele', 'M', '0925076556', 'mintuagri@gmail.com', 'userphoto/mntesnot2.jpg', 'Committee'),
('cs_setter01', 'Getahun ', 'Abebe', 'Worku', 'm', '0913111398', 'csgetahun@gmail.com', 'userphoto/login.jpg', 'Exam setter'),
('dept_wku01', 'Abdo', 'Ababor', 'Abdomelik', 'M', '0917015724', 'abdoababor@gmail.com', 'userphoto/abdo.jpg', 'Department Head'),
('food_01', 'Abebaw', 'Manale', 'Mnichil', 'm', '0905440568', 'abeba@gmail.com', 'userphoto/ayele.jpg', 'Exam setter'),
('is_setter01', 'Kalkidan', 'Abebe', 'Taye', 'f', '0914663949', 'wendosenis@gmail.com', 'userphoto/login.jpg', 'Exam setter'),
('it_setter01', 'Amanuel', 'Tamrat', 'Desta', 'm', '0910661344', 'amanueltamrat@gmail.com', 'userphoto/amanuel.jpg', 'Exam setter'),
('JMU_registrar01', 'Tadese', 'Mengesh', 'Gete', 'm', '0920331344', 'tadesemen@gmail.com', 'userphoto/tade2.jpg', 'Registrar'),
('mamite@1', 'melese', 'mitiku', 'abebaw', 'm', '0905546777', 'ma@gmail.com', 'userphoto/commite.png', 'Committee'),
('MEU_registrar01', 'Getaneh', 'Endashew', 'Mamo', '', '0910661344', 'getanehit@gmail.com', 'userphoto/gech.jpg', 'Registrar'),
('NSR/0001/12', 'Yilkal', 'Kesela', 'Zewdu', 'm', '0945346665', 'ylkalkestela@gmail.com', 'userphoto/ylkal.jpg', 'Candidate'),
('NSR/0002/12', 'Munir', 'Mifta', 'Ahmed', 'M', '944256787', 'munirmifta@gmail.com', ' userphoto/mequant.jpg', 'Candidate'),
('NSR/0003/12', 'Mulate', 'Molla', 'Zemedkun', 'M', '944256787', 'mulatemolla@gmail.com', ' userphoto/mulate.jpg', 'Candidate'),
('NSR/0004/12', 'Zemenu', 'Taye', 'Alemu', 'M', '944256787', 'zemenutaye@gmail.com', ' ', 'Candidate'),
('NSR/9970/12', 'Techalew', 'Alemu', 'Tsegu', 'M', '0904233455', 'techalew@gmail.com', 'userphoto/ayele.jpg', 'Candidate'),
('registrar01', 'Mequannt', 'Worku', 'Tsge', 'Mele', '0963453446', 'mequanntworku@gmail.com', 'userphoto/mequant.jpg', 'Registrar'),
('Regi_2', 'Bereket', 'Zewde', 'Kebede', 'm', '0905546777', 'beka@gmail.com', 'userphoto/dawn_AI3.jpg', 'Registrar'),
('wku_CCi', 'Tesfaye', 'Worku', 'Belete', 'm', '0924661344', 'tesfyecci@gmail.com', 'userphoto/login.jpg', 'College Dean');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `user_id` varchar(50) NOT NULL,
  `question_id` int(11) NOT NULL,
  `selected_answer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `attempt`
--
ALTER TABLE `attempt`
  ADD PRIMARY KEY (`at_id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `rid` (`rid`);

--
-- Indexes for table `college_dean`
--
ALTER TABLE `college_dean`
  ADD PRIMARY KEY (`dean_id`),
  ADD KEY `college_dean_1` (`university_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`committee_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`did`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `depthead`
--
ALTER TABLE `depthead`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `examdate`
--
ALTER TABLE `examdate`
  ADD PRIMARY KEY (`date_id`);

--
-- Indexes for table `examsetter`
--
ALTER TABLE `examsetter`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `dname` (`dname`),
  ADD KEY `eid` (`committee_id`);

--
-- Indexes for table `exam_passord`
--
ALTER TABLE `exam_passord`
  ADD PRIMARY KEY (`pw_id`);

--
-- Indexes for table `logtable`
--
ALTER TABLE `logtable`
  ADD PRIMARY KEY (`lig_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_number`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qid`),
  ADD UNIQUE KEY `question` (`question`,`year`,`optiona`,`optionb`,`optionc`,`optiond`,`question_type`) USING HASH,
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `registrar`
--
ALTER TABLE `registrar`
  ADD PRIMARY KEY (`rid`),
  ADD UNIQUE KEY `uid` (`uid`),
  ADD KEY `eid` (`committee_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `set_score`
--
ALTER TABLE `set_score`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexes for table `takenexam`
--
ALTER TABLE `takenexam`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `timer`
--
ALTER TABLE `timer`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`user_id`,`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attempt`
--
ALTER TABLE `attempt`
  MODIFY `at_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2342366;

--
-- AUTO_INCREMENT for table `examdate`
--
ALTER TABLE `examdate`
  MODIFY `date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exam_passord`
--
ALTER TABLE `exam_passord`
  MODIFY `pw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `logtable`
--
ALTER TABLE `logtable`
  MODIFY `lig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `set_score`
--
ALTER TABLE `set_score`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `timer`
--
ALTER TABLE `timer`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `registrar` (`rid`),
  ADD CONSTRAINT `candidate_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `college_dean`
--
ALTER TABLE `college_dean`
  ADD CONSTRAINT `college_dean_1` FOREIGN KEY (`university_id`) REFERENCES `university` (`uid`),
  ADD CONSTRAINT `college_dean_ibfk_3` FOREIGN KEY (`dean_id`) REFERENCES `user` (`uid`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`);

--
-- Constraints for table `committee`
--
ALTER TABLE `committee`
  ADD CONSTRAINT `committee_ibfk_1` FOREIGN KEY (`committee_id`) REFERENCES `user` (`uid`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `university` (`uid`);

--
-- Constraints for table `depthead`
--
ALTER TABLE `depthead`
  ADD CONSTRAINT `depthead_ibfk_3` FOREIGN KEY (`did`) REFERENCES `user` (`uid`);

--
-- Constraints for table `examsetter`
--
ALTER TABLE `examsetter`
  ADD CONSTRAINT `examsetter_ibfk_1` FOREIGN KEY (`committee_id`) REFERENCES `committee` (`committee_id`),
  ADD CONSTRAINT `examsetter_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `examsetter` (`sid`);

--
-- Constraints for table `registrar`
--
ALTER TABLE `registrar`
  ADD CONSTRAINT `registrar_ibfk_1` FOREIGN KEY (`committee_id`) REFERENCES `committee` (`committee_id`),
  ADD CONSTRAINT `registrar_ibfk_2` FOREIGN KEY (`rid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `takenexam` (`uid`);

--
-- Constraints for table `takenexam`
--
ALTER TABLE `takenexam`
  ADD CONSTRAINT `takenexam_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `candidate` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
