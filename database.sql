-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2012 at 09:48 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `school_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `skill` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=77 ;

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=85 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_skills`
--

CREATE TABLE `student_skills` (
  `student_skills_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) unsigned NOT NULL,
  `skill_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`student_skills_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=239 ;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `team_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `team_description` blob NOT NULL,
  `team_needs` blob NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=20 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;
