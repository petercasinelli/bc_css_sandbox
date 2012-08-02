-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2012 at 04:37 PM
-- Server version: 5.5.21
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bc-css-skills`
--

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE IF NOT EXISTS `majors` (
  `major_id` int(11) NOT NULL AUTO_INCREMENT,
  `major` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`major_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`major_id`, `major`) VALUES
(1, 'Computer Science'),
(3, 'Biology'),
(4, 'Chemistry'),
(5, 'Classical Studies'),
(6, 'Communication'),
(7, 'Earth and Environmental Sciences'),
(8, 'Economics'),
(9, 'Education'),
(10, 'English'),
(11, 'Finance'),
(12, 'Accounting'),
(13, 'Fine Arts'),
(14, 'General Management'),
(15, 'German Studies'),
(16, 'History'),
(17, 'Information Systems'),
(18, 'Islamic Civilizations and Societies'),
(19, 'International Studies'),
(20, 'Marketing'),
(21, 'Mathematics'),
(22, 'Management and Organization'),
(23, 'Music'),
(24, 'Nursing'),
(25, 'Operations Management'),
(26, 'Philosophy'),
(27, 'Physics'),
(28, 'Political Science'),
(29, 'Psychology'),
(30, 'Romance Language and Literatures'),
(31, 'Slavic and Eastern Languages and Literatures'),
(32, 'Sociology'),
(33, 'Theatre'),
(34, 'Theology'),
(35, 'African and African Diaspora Studies'),
(36, 'Business Law'),
(37, 'Biochemistry');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `school_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school`) VALUES
(1, 'Arts and Sciences'),
(2, 'CSOM'),
(3, 'CSON'),
(4, 'GSSW'),
(5, 'Law'),
(6, 'Lynch School'),
(7, 'School of Theology'),
(8, 'Woods College');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `skill_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `skill` varchar(255) NOT NULL,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `skill`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'Javascript'),
(4, 'jQuery'),
(5, 'PHP'),
(6, 'Ruby on Rails'),
(7, 'Python'),
(9, 'C#'),
(10, 'Objective-C'),
(11, 'Android'),
(12, 'Java'),
(13, 'C++');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
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

INSERT INTO `students` (`student_id`, `first`, `last`, `email`, `oauth_uid`, `password`, `school_id`, `year`, `major_id`, `bio`, `status`, `skills`, `software`, `twitter`, `facebook`, `linkedin`, `dribbble`, `github`) VALUES
(10, 'Peter', '', 'peter.casinelli@bc.edu', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `student_skills`
--

CREATE TABLE IF NOT EXISTS `student_skills` (
  `student_id` int(11) unsigned NOT NULL,
  `skill_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `team_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `team_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `team_description` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE IF NOT EXISTS `team_members` (
  `team_id` int(11) unsigned NOT NULL,
  `student_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `team_privileges`
--

CREATE TABLE IF NOT EXISTS `team_privileges` (
  `student_id` int(11) unsigned NOT NULL,
  `privilege_id` int(11) unsigned NOT NULL,
  `team_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
