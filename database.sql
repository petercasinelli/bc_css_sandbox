-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 30, 2012 at 03:40 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bc-css-skills`
--

-- --------------------------------------------------------

--
-- Table structure for table `join_team_requests`
--

CREATE TABLE `join_team_requests` (
  `join_team_request_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` int(11) unsigned NOT NULL,
  `student_id` int(11) unsigned NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`join_team_request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `major_id` int(11) NOT NULL AUTO_INCREMENT,
  `major` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`major_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=38 ;

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

CREATE TABLE `schools` (
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

CREATE TABLE `skills` (
  `skill_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `skill` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=46 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `skill`) VALUES
(1, 'PHP'),
(2, 'MySQL'),
(3, 'PostgreSQL'),
(4, 'Java'),
(5, 'Javascript'),
(6, 'HTML5'),
(7, 'CSS'),
(8, 'n/a'),
(9, 'Objective C'),
(10, 'Marketing'),
(11, 'Sales'),
(12, 'Design'),
(13, 'Finance.'),
(14, 'iOS'),
(15, 'objective-c'),
(16, 'Image Editing'),
(17, 'Great business background and big thinker.'),
(18, 'C#'),
(19, 'OpenGL'),
(20, 'jQuery'),
(21, 'Python'),
(22, 'Video Production'),
(23, 'Graphic Design'),
(24, 'UX'),
(25, 'MATLAB'),
(26, 'basic understanding of HTML and CSS'),
(27, 'html & css'),
(28, 'ruby'),
(29, 'ruby on rails'),
(30, 'etc.'),
(31, 'Realbasic'),
(32, 'ninjitsu'),
(33, 'Networking'),
(34, 'Programming Languages: C family'),
(35, 'LISP (Common and Scheme)'),
(36, 'various'),
(37, 'HTML/CSS'),
(38, 'Data Mining'),
(39, 'Business Plan creation'),
(40, 'I come up with ideas'),
(41, 'Presentation'),
(42, 'C++'),
(43, 'Computer Vision'),
(44, 'Image Processing'),
(45, 'modeling (software)');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first` varchar(255) CHARACTER SET latin1 NOT NULL,
  `last` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `picture` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `oauth_uid` char(40) CHARACTER SET latin1 DEFAULT NULL,
  `password` char(40) CHARACTER SET latin1 NOT NULL,
  `school_id` int(11) unsigned DEFAULT NULL,
  `year` int(4) unsigned DEFAULT NULL,
  `major_id` int(11) unsigned DEFAULT NULL,
  `bio` text CHARACTER SET latin1,
  `status` varchar(144) CHARACTER SET latin1 DEFAULT NULL,
  `twitter` text CHARACTER SET latin1,
  `facebook` text CHARACTER SET latin1,
  `linkedin` text CHARACTER SET latin1,
  `dribbble` text COLLATE utf8_bin,
  `github` text COLLATE utf8_bin,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=39 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first`, `last`, `email`, `picture`, `oauth_uid`, `password`, `school_id`, `year`, `major_id`, `bio`, `status`, `twitter`, `facebook`, `linkedin`, `dribbble`, `github`) VALUES
(14, 'Peter', 'Casinelli', 'peter.casinelli@bc.edu', 'studentpic_14_1345922075.png', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, 2014, 0, '', '', '', '', '', '', ''),
(18, 'Peter', 'Casinelli', 'casinepe@bc.edu', '', NULL, '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'test_first_0', 'test_last_0', 'test_0@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(20, 'test_first_1', 'test_last_1', 'test_1@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(21, 'test_first_2', 'test_last_2', 'test_2@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(22, 'test_first_3', 'test_last_3', 'test_3@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(23, 'test_first_4', 'test_last_4', 'test_4@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(24, 'test_first_5', 'test_last_5', 'test_5@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(25, 'test_first_6', 'test_last_6', 'test_6@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(26, 'test_first_7', 'test_last_7', 'test_7@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(27, 'test_first_8', 'test_last_8', 'test_8@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(28, 'test_first_9', 'test_last_9', 'test_9@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(29, 'test_first_10', 'test_last_10', 'test_10@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(30, 'test_first_11', 'test_last_11', 'test_11@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(31, 'test_first_12', 'test_last_12', 'test_12@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(32, 'test_first_13', 'test_last_13', 'test_13@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(33, 'test_first_14', 'test_last_14', 'test_14@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(34, 'test_first_15', 'test_last_15', 'test_15@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(35, 'test_first_16', 'test_last_16', 'test_16@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(36, 'test_first_17', 'test_last_17', 'test_17@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(37, 'test_first_18', 'test_last_18', 'test_18@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(38, 'test_first_19', 'test_last_19', 'test_19@email.com', '', NULL, '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `students_migration`
--

CREATE TABLE `students_migration` (
  `student_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first` varchar(255) CHARACTER SET latin1 NOT NULL,
  `last` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `oauth_uid` char(40) CHARACTER SET latin1 DEFAULT NULL,
  `password` char(40) CHARACTER SET latin1 NOT NULL,
  `school_id` int(11) unsigned DEFAULT '0',
  `year` int(4) unsigned DEFAULT NULL,
  `major_id` int(11) unsigned DEFAULT '0',
  `bio` text CHARACTER SET latin1,
  `status` varchar(144) CHARACTER SET latin1 DEFAULT NULL,
  `skills` text CHARACTER SET latin1,
  `software` text CHARACTER SET latin1,
  `twitter` text CHARACTER SET latin1,
  `facebook` text CHARACTER SET latin1,
  `linkedin` text CHARACTER SET latin1,
  `dribbble` text COLLATE utf8_bin,
  `github` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_skills`
--

CREATE TABLE `student_skills` (
  `student_skills_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) unsigned NOT NULL,
  `skill_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`student_skills_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=17 ;

--
-- Dumping data for table `student_skills`
--

INSERT INTO `student_skills` (`student_skills_id`, `student_id`, `skill_id`) VALUES
(15, 14, 6),
(16, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `team_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `team_description` tinytext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `team_description`) VALUES
(2, 'BC Skills', 0x5765206372656174656420424320536b696c6c732e2e2e20496620796f752077616e7420746f2067657420696e766f6c76656420696e2074686520646576656c6f706d656e742070726f636573732c206c6574207573206b6e6f7720616e64206a6f696e20746865207465616d21),
(5, 'Team 2', 0x6d79207365636f6e64207465616d7373);

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `team_members_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` int(11) unsigned NOT NULL,
  `student_id` int(11) unsigned NOT NULL,
  `account_type` tinyint(2) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`team_members_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`team_members_id`, `team_id`, `student_id`, `account_type`) VALUES
(3, 2, 14, 1),
(11, 2, 18, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `team_permissions`
--

INSERT INTO `team_permissions` (`team_permission_id`, `student_id`, `permission_id`, `team_id`) VALUES
(1, 142, 1, 2),
(2, 18, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `team_updates`
--

CREATE TABLE `team_updates` (
  `team_update_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` int(11) unsigned NOT NULL,
  `team_update` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `student_id` int(11) unsigned NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`team_update_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
