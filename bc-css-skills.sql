-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 07, 2012 at 04:23 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `bc-css-skills`
--

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `major_id` int(11) NOT NULL AUTO_INCREMENT,
  `major` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`major_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` VALUES(1, 'Computer Science');
INSERT INTO `majors` VALUES(3, 'Biology');
INSERT INTO `majors` VALUES(4, 'Chemistry');
INSERT INTO `majors` VALUES(5, 'Classical Studies');
INSERT INTO `majors` VALUES(6, 'Communication');
INSERT INTO `majors` VALUES(7, 'Earth and Environmental Sciences');
INSERT INTO `majors` VALUES(8, 'Economics');
INSERT INTO `majors` VALUES(9, 'Education');
INSERT INTO `majors` VALUES(10, 'English');
INSERT INTO `majors` VALUES(11, 'Finance');
INSERT INTO `majors` VALUES(12, 'Accounting');
INSERT INTO `majors` VALUES(13, 'Fine Arts');
INSERT INTO `majors` VALUES(14, 'General Management');
INSERT INTO `majors` VALUES(15, 'German Studies');
INSERT INTO `majors` VALUES(16, 'History');
INSERT INTO `majors` VALUES(17, 'Information Systems');
INSERT INTO `majors` VALUES(18, 'Islamic Civilizations and Societies');
INSERT INTO `majors` VALUES(19, 'International Studies');
INSERT INTO `majors` VALUES(20, 'Marketing');
INSERT INTO `majors` VALUES(21, 'Mathematics');
INSERT INTO `majors` VALUES(22, 'Management and Organization');
INSERT INTO `majors` VALUES(23, 'Music');
INSERT INTO `majors` VALUES(24, 'Nursing');
INSERT INTO `majors` VALUES(25, 'Operations Management');
INSERT INTO `majors` VALUES(26, 'Philosophy');
INSERT INTO `majors` VALUES(27, 'Physics');
INSERT INTO `majors` VALUES(28, 'Political Science');
INSERT INTO `majors` VALUES(29, 'Psychology');
INSERT INTO `majors` VALUES(30, 'Romance Language and Literatures');
INSERT INTO `majors` VALUES(31, 'Slavic and Eastern Languages and Literatures');
INSERT INTO `majors` VALUES(32, 'Sociology');
INSERT INTO `majors` VALUES(33, 'Theatre');
INSERT INTO `majors` VALUES(34, 'Theology');
INSERT INTO `majors` VALUES(35, 'African and African Diaspora Studies');
INSERT INTO `majors` VALUES(36, 'Business Law');
INSERT INTO `majors` VALUES(37, 'Biochemistry');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `school_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` VALUES(1, 'Arts and Sciences');
INSERT INTO `schools` VALUES(2, 'CSOM');
INSERT INTO `schools` VALUES(3, 'CSON');
INSERT INTO `schools` VALUES(4, 'GSSW');
INSERT INTO `schools` VALUES(5, 'Law');
INSERT INTO `schools` VALUES(6, 'Lynch School');
INSERT INTO `schools` VALUES(7, 'School of Theology');
INSERT INTO `schools` VALUES(8, 'Woods College');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `skill` varchar(255) NOT NULL,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` VALUES(1, 'HTML');
INSERT INTO `skills` VALUES(2, 'CSS');
INSERT INTO `skills` VALUES(3, 'Javascript');
INSERT INTO `skills` VALUES(4, 'jQuery');
INSERT INTO `skills` VALUES(5, 'PHP');
INSERT INTO `skills` VALUES(6, 'Ruby on Rails');
INSERT INTO `skills` VALUES(7, 'Python');
INSERT INTO `skills` VALUES(9, 'C#');
INSERT INTO `skills` VALUES(10, 'Objective-C');
INSERT INTO `skills` VALUES(11, 'Android');
INSERT INTO `skills` VALUES(12, 'Java');
INSERT INTO `skills` VALUES(13, 'C++');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first` varchar(255) NOT NULL,
  `last` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `oauth_uid` char(40) DEFAULT NULL,
  `password` char(40) NOT NULL,
  `school_id` int(11) unsigned DEFAULT NULL,
  `year` int(4) unsigned DEFAULT NULL,
  `major_id` int(11) unsigned DEFAULT NULL,
  `bio` text,
  `status` varchar(144) DEFAULT NULL,
  `skills` text,
  `software` text,
  `twitter` text,
  `facebook` text,
  `linkedin` text,
  `dribbble` text CHARACTER SET utf8 COLLATE utf8_bin,
  `github` text NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` VALUES(10, 'Peter', '', 'peter.casinelli@bc.edu', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `student_skills`
--

CREATE TABLE `student_skills` (
  `student_id` int(11) unsigned NOT NULL,
  `skill_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_skills`
--


-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `team_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `team_description` tinytext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `teams`
--


-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `team_id` int(11) unsigned NOT NULL,
  `student_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `team_members`
--


-- --------------------------------------------------------

--
-- Table structure for table `team_permissions`
--

CREATE TABLE `team_permissions` (
  `team_permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) unsigned NOT NULL,
  `permission_id` int(11) unsigned NOT NULL,
  `team_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`team_permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `team_permissions`
--

