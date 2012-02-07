-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2012 at 05:50 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

USE css;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `css`
--

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE IF NOT EXISTS `majors` (
  `major_id` int(11) NOT NULL AUTO_INCREMENT,
  `major` varchar(100) NOT NULL,
  PRIMARY KEY (`major_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`major_id`, `major`) VALUES
(1, 'Computer Science'),
(2, 'Business Management');

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
  `password` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  `major_id` int(11) unsigned NOT NULL,
  `bio` text NOT NULL,
  `skills` text NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first`, `last`, `email`, `password`, `year`, `major_id`, `bio`, `skills`) VALUES
(1, 'Peter John', 'Casinelli', 'peter.casinelli.bc@gmail.com', 'password', 2014, 1, 'I am a computer science major.', 'HTML, CSS, Javascript, PHP, Java, Python, MySQL, C, Fortran'),
(2, 'First', 'Last', 'address@email.com', 'password', 2013, 2, 'I am a business major.', 'Nothing');

-- --------------------------------------------------------

--
-- Table structure for table `student_skills`
--

CREATE TABLE IF NOT EXISTS `student_skills` (
  `user_skill_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `skill_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`user_skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
