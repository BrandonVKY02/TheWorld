-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 19, 2024 at 05:24 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- This is for codesnap purposes only, this is not a valid database
--
-- Database: `theworldmusic`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `messages` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `favmusic`
--

DROP TABLE IF EXISTS `favmusic`;
CREATE TABLE IF NOT EXISTS `favmusic` (
  `id` int DEFAULT NULL,
  `songid` int DEFAULT NULL,
  KEY `id` (`id`),
  KEY `songid` (`songid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `favmusic`
--

INSERT INTO `favmusic` (`id`, `songid`) VALUES
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

DROP TABLE IF EXISTS `music`;
CREATE TABLE IF NOT EXISTS `music` (
  `songid` int NOT NULL AUTO_INCREMENT,
  `artist` varchar(255) DEFAULT NULL,
  `songname` varchar(255) DEFAULT NULL,
  `genre` varchar(255) NOT NULL,
  `uploadedby` int DEFAULT NULL,
  `img` longblob,
  PRIMARY KEY (`songid`),
  KEY `uploadedby` (`uploadedby`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`songid`, `artist`, `songname`, `genre`, `uploadedby`, `img`) VALUES
(1, 'TWICE', 'Feel Special', 'rock', 222, 0x89504e470d0a1a0a...),
INSERT INTO `music` (`songid`, `artist`, `songname`, `genre`, `uploadedby`, `img`) VALUES
(2, 'LE SSERAFIM', 'Easy', 'rock', 224, 0xffd8ffe000104a4649...),
INSERT INTO `music` (`songid`, `artist`, `songname`, `genre`, `uploadedby`, `img`) VALUES
(3, 'AESPA', 'Welcome To MY WORLD', 'rock', 223, 0x89504e470...),
INSERT INTO `music` (`songid`, `artist`, `songname`, `genre`, `uploadedby`, `img`) VALUES
(4, 'NEW JEANS', 'Ditto', 'pop', 225, 0x89504e470d0a1a0a0000...),
INSERT INTO `music` (`songid`, `artist`, `songname`, `genre`, `uploadedby`, `img`) VALUES
(5, 'RED VELVET', 'Psycho', 'pop', 223, 0x89504e470d0a1a0a00...),
INSERT INTO `music` (`songid`, `artist`, `songname`, `genre`, `uploadedby`, `img`) VALUES
(6, 'BLACKPINK', 'The Happiest Girl', 'rock', 226, 0xffd8ffe...),
INSERT INTO `music` (`songid`, `artist`, `songname`, `genre`, `uploadedby`, `img`) VALUES
(7, 'ITZY', 'WANNABE', 'hip-hop', 1, 0x89504e470d0a1a0a00000...);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`) VALUES
(1, 'aa@gmail.com', 'aa', 'aa1234'),
(2, 'ab@gmail.com', 'aa', 'aa1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
