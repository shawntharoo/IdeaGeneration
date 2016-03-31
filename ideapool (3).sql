-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2016 at 07:07 AM
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
('C_1', 'SUB003', 12, 'good idea. i like it', '2016-03-27 10:27:52', 0, 'Comment'),
('C_10', 'SUB003', 12, 'jj', '2016-03-27 14:58:46', 0, 'Comment'),
('C_11', 'SUB003', 12, 'again ', '2016-03-27 15:00:21', 0, 'Improvement'),
('C_12', 'SUB003', 12, 't', '2016-03-27 15:09:26', 0, 'Comment'),
('C_13', 'SUB003', 12, 'b', '2016-03-27 15:12:59', 0, 'Comment'),
('C_14', 'SUB003', 12, 'hh', '2016-03-27 15:14:23', 0, 'Comment'),
('C_15', 'SUB003', 12, 'cforcomment', '2016-03-27 15:39:55', 0, 'Comment'),
('C_16', 'SUB003', 12, 'iforimprov', '2016-03-27 15:40:50', 0, 'Improvement'),
('C_17', 'SUB003', 12, ' Add a comment ', '2016-03-27 15:42:46', 0, 'Comment'),
('C_18', 'SUB003', 12, 'ynt ', '2016-03-27 15:43:06', 0, 'Improvement'),
('C_19', 'SUB003', 12, 'c1ss', '2016-03-27 15:44:32', 0, 'Improvement'),
('C_2', 'SUB003', 12, 'Add more space. ', '2016-03-27 10:28:19', 0, 'Improvement'),
('C_20', 'SUB003', 12, 'helloabncs', '2016-03-27 16:04:25', 0, 'Comment'),
('C_21', 'SUB003', 12, 'abcdefghijklmnopqrstuvwxyz', '2016-03-27 16:13:42', 0, 'Comment'),
('C_22', 'SUB003', 13, 'final check for the day', '2016-03-27 22:47:42', 0, 'Comment'),
('C_23', 'SUB003', 12, 'gg', '2016-03-27 22:49:26', 0, 'Improvement'),
('C_24', 'SUB003', 12, 'fvfg', '2016-03-28 10:35:56', 0, 'Improvement'),
('C_25', 'SUB003', 12, 'hhhyhyhyhy', '2016-03-28 12:19:55', 0, 'Comment'),
('C_26', '', 12, 'test1 ', '2016-03-31 10:52:18', 0, 'Comment'),
('C_27', 'SUB003', 12, 'test1', '2016-03-31 10:58:47', 0, 'Comment'),
('C_28', 'SUB003', 12, 'ter', '2016-03-31 11:02:33', 0, 'Comment'),
('C_29', 'SUB003', 12, 'pawanwadda', '2016-03-31 11:05:51', 0, 'Comment'),
('C_3', 'SUB003', 12, 'test 1', '2016-03-27 10:29:42', 0, 'Comment'),
('C_30', 'SUB003', 12, 'finally', '2016-03-31 11:26:15', 0, 'Improvement'),
('C_31', 'SUB003', 12, 'i hate you', '2016-03-31 11:28:00', 0, 'Improvement'),
('C_32', 'SUB003', 12, 'please work', '2016-03-31 11:28:11', 0, 'Comment'),
('C_33', 'SUB003', 12, 'final time', '2016-03-31 11:42:30', 0, 'Comment'),
('C_4', 'SUB003', 12, 'new comment', '2016-03-27 10:37:43', 0, 'Improvement'),
('C_5', 'SUB003', 12, ' Add a comment ', '2016-03-27 13:57:05', 0, 'Comment'),
('C_6', 'SUB003', 12, ' Add a comment ', '2016-03-27 13:57:06', 0, 'Comment'),
('C_7', 'SUB003', 12, ' Add a comment ', '2016-03-27 13:57:07', 0, 'Comment'),
('C_9', 'SUB003', 12, ' Add a comment ', '2016-03-27 13:57:08', 0, 'Comment');

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
  PRIMARY KEY (`postId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postId`, `userId`, `dateTime`, `faculty`, `department`, `category`, `title`, `content`, `views`) VALUES
('SUB003', 12, '2016-03-28 00:00:00', 'Faculty of Computing', 'SOFTWARE ENGINEERING', 'External', 'Car park should be extended', 'Ca park should be extended.bcoz there a no enought space to park vehicles.', 20),
('SUB_1', 1, '2016-03-30 17:24:19', 'Faculty of Computing', 'SOFTWARE ENGINEERING', 'Sports and Societies', 'cricket', 'blaa blaaa', 0),
('SUB_2', 1, '2016-03-30 17:32:47', 'Faculty of Computing', 'Department of Software Engineering', 'Academic', 'HR abdcssk dkjlfjdfjdl', 'HR abdcssk dkjlfjdfjdl', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `lname`, `address`, `contact`, `gender`, `emil`, `category`, `universityID`, `Image`, `status`, `username`, `password`) VALUES
(1, 'Kaluthara Koralalage Sandakelum Tharindu Adik', 'Adikaram', '167/1A,Makola,South,Makola', 9871234, 'male', 'mr.stadikaram@gmail.com', 'Admin', '', 'images/download.png', 'pending', 'pdm', 'pdm'),
(12, 'sand', 'kelum', 's', 134567890, 'male', 'san@g.c', 'Student', '245qqt', 'images/download.png', 'pending', '', '');

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
('V_1', 'Upvote', 13, 'SUB005', '', 'Submission', '2016-03-27 21:43:14', 0),
('V_10', 'Downvote', 12, 'SUB003', '', 'Submission', '2016-03-28 17:12:02', 0),
('V_11', 'Upvote', 12, 'SUB003', '', 'Submission', '2016-03-31 10:36:35', 0),
('V_12', 'Upvote', 12, 'SUB003', '', 'Submission', '2016-03-31 10:57:23', 0),
('V_13', 'Upvote', 12, 'SUB003', '', 'Submission', '2016-03-31 11:12:25', 0),
('V_14', 'Downvote', 12, 'SUB003', '', 'Submission', '2016-03-31 11:12:32', 0),
('V_15', 'Upvote', 12, '', '', 'Submission', '2016-03-31 11:21:53', 0),
('V_16', 'Downvote', 12, '', '', 'Submission', '2016-03-31 11:22:11', 0),
('V_17', 'Downvote', 12, 'SUB003', '', 'Submission', '2016-03-31 11:26:06', 0),
('V_18', 'Upvote', 12, 'SUB003', '', 'Submission', '2016-03-31 11:32:48', 0),
('V_19', 'Downvote', 12, 'SUB003', '', 'Submission', '2016-03-31 11:42:19', 0),
('V_2', 'Upvote', 13, 'SUB005', '', 'Submission', '2016-03-27 21:44:01', 0),
('V_3', 'Upvote', 13, 'SUB005', '', 'Submission', '2016-03-27 21:46:30', 0),
('V_4', 'Downvote', 13, 'SUB005', '', 'Submission', '2016-03-27 22:34:24', 0),
('V_5', 'Downvote', 13, 'SUB003', '', 'Submission', '2016-03-27 22:47:57', 0),
('V_6', 'Upvote', 12, 'SUB003', '', 'Submission', '2016-03-27 22:49:14', 0),
('V_7', 'Upvote', 12, 'SUB003', '', 'Submission', '2016-03-28 10:35:39', 0),
('V_8', 'Upvote', 12, 'SUB003', '', 'Submission', '2016-03-28 12:19:18', 0),
('V_9', 'Upvote', 12, 'SUB003', '', 'Submission', '2016-03-28 15:20:42', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
