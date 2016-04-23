-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2016 at 10:24 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ideapool`
--
CREATE DATABASE IF NOT EXISTS `ideapool` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ideapool`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `catId` varchar(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`catId`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catId`, `name`, `image`) VALUES
('cat0001', 'Academic', 'images/math.png'),
('cat0002', 'Student Affairs', 'images/academic.png'),
('cat0003', 'Sports and Societies', 'images/sports.png'),
('cat0004', 'External', 'images/arts.png');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `commentId` char(5) NOT NULL,
  `submissionId` char(6) NOT NULL,
  `userId` int(4) NOT NULL,
  `description` varchar(150) NOT NULL,
  `date` datetime NOT NULL,
  `views` int(11) NOT NULL,
  `commentType` varchar(50) NOT NULL,
  PRIMARY KEY (`commentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentId`, `submissionId`, `userId`, `description`, `date`, `views`, `commentType`) VALUES
('C_1', 'SUB_1', 1, 'True. ', '2016-04-21 16:13:55', 0, 'Comment'),
('C_10', 'SUB_1', 28, 'i agree', '2016-04-22 13:01:38', 0, 'Comment'),
('C_2', 'SUB_6', 28, 'If we could suggest a reading room in the room on the 7th floor.', '2016-04-21 16:28:09', 0, 'Improvement'),
('C_3', 'SUB_6', 1, 'good idea', '2016-04-21 16:33:21', 0, 'Comment'),
('C_4', 'SUB_6', 28, 'yes yes', '2016-04-21 16:37:26', 0, 'Comment'),
('C_5', 'SUB_6', 3, 'i agree', '2016-04-21 16:40:51', 0, 'Comment'),
('C_6', 'SUB_7', 3, 'i suggest online module documents and assignments for english language.', '2016-04-21 16:42:00', 0, 'Improvement'),
('C_7', 'SUB_8', 3, 'many books from the library are already borrowed', '2016-04-21 16:42:39', 0, 'Comment'),
('C_8', 'SUB_1', 3, 'good thing we dont come in vehicles', '2016-04-21 16:43:05', 0, 'Comment'),
('C_9', 'SUB_1', 28, 'true', '2016-04-22 12:52:04', 0, 'Improvement');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `depId` varchar(10) NOT NULL,
  `facId` varchar(10) NOT NULL,
  `depName` varchar(250) NOT NULL,
  `depImg` text NOT NULL,
  PRIMARY KEY (`depId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`depId`, `facId`, `depName`, `depImg`) VALUES
('dep0001', 'fac0001', 'Department of Bussiness', 'images/1.png'),
('dep0002', 'fac0001', 'Department of Accountancy', 'images/2.png'),
('dep0003', 'fac0002', 'Department of Civil Engineering', 'images/3.png'),
('dep0004', 'fac0002', 'Department of Electrical Engineering', 'images/4.png'),
('dep0005', 'fac0003', 'Department of Law', 'images/5.png'),
('dep0006', 'fac0003', 'Department of Logic', 'images/6.png'),
('dep0007', 'fac0004', 'Department of Software Engineering', 'images/7.png');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `facId` varchar(10) NOT NULL,
  `facName` varchar(250) NOT NULL,
  `facImg` text NOT NULL,
  PRIMARY KEY (`facId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facId`, `facName`, `facImg`) VALUES
('fac0001', 'Faculty of Management', 'images/history.png'),
('fac0002', 'Faculty of Engineering', 'images/hhh.png'),
('fac0003', 'Faculty of Arts', 'images/math.png'),
('fac0004', 'Faculty of Computing', 'images/physics.png');

-- --------------------------------------------------------

--
-- Table structure for table `idea`
--

CREATE TABLE IF NOT EXISTS `idea` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `ownerid` int(100) NOT NULL,
  `category` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `idea`
--

INSERT INTO `idea` (`id`, `title`, `description`, `date`, `ownerid`, `category`) VALUES
(1, 'car park should be extended', 'car park should be extended .because there are  no enought space to park vehicles', '2016-03-19', 1, 'SERVICES');

-- --------------------------------------------------------

--
-- Table structure for table `improvements`
--

CREATE TABLE IF NOT EXISTS `improvements` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ideaid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `improvements`
--

INSERT INTO `improvements` (`id`, `description`, `date`, `time`, `ideaid`) VALUES
(1, 'k but more ..', '2016-03-20', '12:31:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `Logid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`Logid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Logid`, `userid`, `username`, `password`) VALUES
(1, 1, 'root', 'root'),
(2, 2, 'pdm', 'pdm');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `postId` varchar(10) NOT NULL,
  `userId` int(11) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `faculty` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL,
  `category` varchar(100) NOT NULL,
  `title` varchar(300) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `views` int(100) NOT NULL DEFAULT '0',
  `date` date NOT NULL DEFAULT '2016-04-14',
  `files` varchar(100) NOT NULL,
  PRIMARY KEY (`postId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postId`, `userId`, `dateTime`, `faculty`, `department`, `category`, `title`, `content`, `views`, `date`, `files`) VALUES
('SUB_1', 28, '2016-04-21 16:06:55', 'Faculty of Computing', 'Department of Software Engineering', 'External', 'The car park should be extended', 'There is no space in the car park in the morning to park vehicles since the upper park is also reserved for guests.', 0, '2016-04-21', 'images/10995146_1618831068353288_175800297_n.jpg'),
('SUB_2', 28, '2016-04-21 16:09:44', 'Faculty of Engineering', 'Department of Electrical Engineering', 'Academic', 'Provide experiment labs for electrical engineering', 'Unable to perform experiments which is a huge part of our degree.', 0, '2016-04-21', 'images/boys1.png'),
('SUB_3', 28, '2016-04-21 16:10:46', 'Faculty of Engineering', 'Department of Civil Engineering', 'Academic', 'No appliances to do practicals', 'All appliances are not in good condition', 0, '2016-04-21', 'images/'),
('SUB_4', 28, '2016-04-21 16:12:05', 'Faculty of Management', 'Department of Bussiness', 'Sports and Societies', 'Requirement of a business club', 'Business students need to interact more often and share knowledge about their business backgrounds via a business club.', 0, '2016-04-21', 'images/'),
('SUB_5', 28, '2016-04-21 16:13:10', 'Faculty of Engineering', 'Department of Electrical Engineering', 'External', 'There is no space in the canteen for all the students.', 'At the interval hour the canteen fills with student their is no space for all the students to fit in.', 0, '2016-04-21', 'images/'),
('SUB_6', 1, '2016-04-21 16:17:59', 'Faculty of Computing', 'Department of Software Engineering', 'Academic', 'No space for the students to study', 'There is no space in any of the reading rooms for studying purposes due to the large amount of students. I request for a new reading room.', 0, '2016-04-21', 'images/'),
('SUB_7', 1, '2016-04-21 16:19:12', 'Faculty of Computing', 'Department of Software Engineering', 'Academic', 'English subject should be brought back to all four years', 'Most of the students struggle with english and business english. We need help', 0, '2016-04-21', 'images/The-ground-floor-of-the-proposed-new-Town-House-building-at-Kingston-University-London.jpg'),
('SUB_8', 1, '2016-04-21 16:20:55', 'Faculty of Computing', 'Department of Software Engineering', 'Academic', 'No textbooks for this semester - 3rd year IT student', 'Reference books are also not available in the library. Lack of books for reference.', 0, '2016-04-21', 'images/'),
('SUB_9', 25, '2016-04-22 09:54:55', 'Faculty of Computing', 'Department of Software Engineering', 'Academic', 'reading room', 'not enought space.', 0, '2016-04-22', 'images/illustrated-people.jpg'),
('SUB_10', 28, '2016-04-22 12:39:00', 'Faculty of Computing', 'Department of Software Engineering', 'Student Affairs', 'The managers are not very supportive', 'The managers are not very supportive', 0, '2016-04-22', 'images/'),
('SUB_11', 25, '2016-04-22 13:07:01', 'Faculty of Management', 'Department of Bussiness', 'Academic', 'not enough chairs', 'not enough chairs in reading room', 0, '2016-04-22', 'images/'),
('SUB_12', 38, '2016-04-22 15:33:17', 'Faculty of Management', 'Department of Bussiness', 'Academic', 'this is test', 'fghmgjgjj,,hg', 0, '2016-04-22', 'images/1EMAim3uSfm29w35E23g_ldaYK5wTq6GjoEcXZfvg_pizza.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `contact` int(11) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `emil` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `universityID` varchar(45) NOT NULL,
  `Image` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'pending',
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `lname`, `address`, `contact`, `gender`, `emil`, `category`, `universityID`, `Image`, `status`, `username`, `password`) VALUES
(1, 'Pawan', 'Gamage', 'Galle', 714020523, 'male', 'pawan@gmail.com', 'Student', '18889006', 'images/boy1.png', 'active', 'pawan', 'pdm'),
(2, 'Sandakelum', 'Adikaram', 'Colombo', 776778987, 'male', 'sanda@gmail.com', 'Lecturer', '16778904', 'images/boy2.png', 'active', 'sanda', 'pdm'),
(3, 'Chathra', 'Senevirathne', 'Gampaha', 771231212, 'female', 'chathra@gmail.com', 'Lecturer', '18887899', 'images/girl1.png', 'active', 'chathra', 'pdm'),
(14, 'Kasun', 'Kodithuwakku', 'Tangalle', 773444555, 'male', 'kasun@gmail.com', 'staff', '18886677', 'images/boy4.png', 'blocked', '', 'ewmw928273'),
(15, 'Panchali', 'Abheywardhana', 'Kandy', 773234445, 'female', 'panchali@gmail.com', 'Student', '18886787', 'images/girl2.png', 'active', 'panchali', 'pdm'),
(16, 'robert', 'fernando', 'new york', 981235674, 'male', 'robert@gmail.com', 'Lecturere', '18765678', 'images/boy1.png', 'pending', 'robert@gmail.com', ''),
(24, 'saman', 'kumara', 'jaffna batticloe', 987654321, 'female', 'sana@gmail.com', 'Lecturere', '123456789', 'images/boy2.png', 'pending', 'sana@gmail.com', ''),
(25, 'Diluni', 'Amarasekara', 'Matara', 776878987, 'female', 'diluni@gmail.com', 'Operator', '18238849', 'images/girl4.png', 'active', 'diluni', 'pdm'),
(27, 'Sandun', 'Adikarams', '167/1A,Makola,South', 987654321, 'male', 'dikaram@gmail.com', 'Lecturere', '18765678', 'images/boy1.png', 'pending', 'dikaram@gmail.com', ''),
(28, 'Harshani', 'Yik', 'Kegalle', 77655678, 'female', 'harshani@gmail.com', 'Student', '18889005', 'images/girl3.png', 'active', 'harshani', 'pdm'),
(36, 'saman', 'gamage', 'colombo', 714325678, 'male', 'hdfh@gmail.com', 'Student', '18768909', 'images/boy4.png', 'pending', 'hdfh@gmail.com', ''),
(38, 'Diluni', 'Abewardhana', 'Colombo 7, weatern province', 768965432, 'male', 'diluni@g', 'Student', 'diluni', 'images/girl3.png', 'active', 'diluni@g', 'pdm');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `voteId` char(5) NOT NULL,
  `voteType` varchar(30) NOT NULL,
  `userId` int(11) NOT NULL,
  `submissionId` char(6) NOT NULL,
  `improvementId` char(5) NOT NULL,
  `submissionType` char(30) NOT NULL,
  `date` datetime NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`voteId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`voteId`, `voteType`, `userId`, `submissionId`, `improvementId`, `submissionType`, `date`, `weight`) VALUES
('V_1', 'Upvote', 1, 'SUB_1', '', 'Submission', '2016-04-21 16:13:46', 70),
('V_10', 'Upvote', 25, 'SUB_6', '', 'Submission', '2016-04-21 16:44:25', 76),
('V_11', 'Upvote', 28, 'SUB_10', '', 'Submission', '2016-04-22 12:41:49', 65),
('V_2', 'Upvote', 28, 'SUB_6', '', 'Submission', '2016-04-21 16:27:21', 65),
('V_3', 'Downvote', 28, 'SUB_7', '', 'Submission', '2016-04-21 16:39:46', 65),
('V_4', 'Downvote', 28, 'SUB_8', '', 'Submission', '2016-04-22 15:46:36', 68),
('V_5', 'Upvote', 28, 'SUB_1', '', 'Submission', '2016-04-22 15:46:54', 20),
('V_6', 'Upvote', 3, 'SUB_6', '', 'Submission', '2016-04-21 16:40:45', 96),
('V_7', 'Upvote', 3, 'SUB_7', '', 'Submission', '2016-04-21 16:41:01', 13),
('V_8', 'Upvote', 3, 'SUB_8', '', 'Submission', '2016-04-21 16:42:13', 94),
('V_9', 'Upvote', 3, 'SUB_1', '', 'Submission', '2016-04-21 16:42:48', 95);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
