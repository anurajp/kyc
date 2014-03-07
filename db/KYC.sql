-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2014 at 04:50 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `KYC`
--

-- --------------------------------------------------------

--
-- Table structure for table `CandidateMetadata`
--

CREATE TABLE IF NOT EXISTS `CandidateMetadata` (
  `cid` int(11) NOT NULL,
  `src` varchar(50) NOT NULL,
  `handle` varchar(50) NOT NULL,
  KEY `cid` (`cid`,`src`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stores candidate social network handles';

-- --------------------------------------------------------

--
-- Table structure for table `Candidates`
--

CREATE TABLE IF NOT EXISTS `Candidates` (
  `cid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Candidate''s autogen Id',
  `cfirstName` varchar(20) NOT NULL COMMENT 'Candidate''s first name',
  `cLastName` varchar(20) DEFAULT NULL COMMENT 'Candidate''s last image',
  `img` longblob COMMENT 'Candidate''s image',
  PRIMARY KEY (`cid`),
  FULLTEXT KEY `cfirstName` (`cfirstName`,`cLastName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stores candidates basic metadata information' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Game`
--

CREATE TABLE IF NOT EXISTS `Game` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `gname` varchar(50) NOT NULL,
  `gtype` varchar(50) NOT NULL,
  `gdate` date DEFAULT NULL,
  `glocation` varchar(50) NOT NULL,
  `winnerCId` int(11) DEFAULT NULL,
  PRIMARY KEY (`gid`),
  KEY `gtype` (`gtype`),
  FULLTEXT KEY `gname` (`gname`,`glocation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stores basic information regarding a game' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Votes`
--

CREATE TABLE IF NOT EXISTS `Votes` (
  `gid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `votes` bigint(20) NOT NULL DEFAULT '0',
  KEY `gid` (`gid`,`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stores votes for a candidate in a game';

-- --------------------------------------------------------

--
-- Table structure for table `VoteTracking`
--

CREATE TABLE IF NOT EXISTS `VoteTracking` (
  `gid` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `usrc` varchar(50) NOT NULL,
  `cid` int(11) NOT NULL,
  KEY `gid` (`gid`,`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tracks unique vote by a user in a game';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
