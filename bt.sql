-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2013 at 03:18 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bt`
--

-- --------------------------------------------------------

--
-- Table structure for table `bt_item`
--

CREATE TABLE IF NOT EXISTS `bt_item` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `type` int(4) NOT NULL,
  `name` varchar(256) NOT NULL,
  `remark` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bt_relate`
--

CREATE TABLE IF NOT EXISTS `bt_relate` (
  `rid` int(32) NOT NULL AUTO_INCREMENT,
  `rtype` int(32) NOT NULL,
  `aid` int(32) NOT NULL,
  `bid` int(32) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bt_thing`
--

CREATE TABLE IF NOT EXISTS `bt_thing` (
  `tid` int(32) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `type` int(4) NOT NULL,
  `tag` varchar(256) DEFAULT NULL,
  `cat` int(4) NOT NULL,
  `description` varchar(4096) NOT NULL,
  `uid` int(32) NOT NULL,
  `one_word` varchar(2) DEFAULT NULL,
  `contact` varchar(256) DEFAULT NULL,
  `status` int(4) NOT NULL,
  `good` int(8) DEFAULT NULL,
  `bad` int(8) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `bt_user`
--

CREATE TABLE IF NOT EXISTS `bt_user` (
  `uid` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `img` varchar(64) NOT NULL,
  `pwd` varchar(512) NOT NULL,
  `email` varchar(256) NOT NULL,
  `time` int(64) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;
