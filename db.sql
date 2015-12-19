-- phpMyAdmin SQL Dump
-- version 4.1.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2014 at 05:37 AM
-- Server version: 5.5.34-32.0-log
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `DB`
--
CREATE DATABASE IF NOT EXISTS `DB` DEFAULT CHARACTER SET utf32 COLLATE utf32_bin;
USE `DB`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPreset` int(11) NOT NULL,
  `text` text COLLATE utf32_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_bin AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Table structure for table `preset`
--

CREATE TABLE IF NOT EXISTS `preset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf32_bin NOT NULL,
  `author` text COLLATE utf32_bin NOT NULL,
  `description` text COLLATE utf32_bin NOT NULL,
  `fileName` text COLLATE utf32_bin NOT NULL,
  `uploadDate` date NOT NULL,
  `downloads` int(11) NOT NULL DEFAULT '0',
  `likes` int(11) DEFAULT '0',
  `dislikes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_bin AUTO_INCREMENT=34 ;

-- --------------------------------------------------------

--
-- Table structure for table `videoView`
--

CREATE TABLE IF NOT EXISTS `videoView` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_bin AUTO_INCREMENT=5 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
