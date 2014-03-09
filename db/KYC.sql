-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2014 at 04:04 PM
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
  `handle` varchar(256) NOT NULL,
  KEY `cid` (`cid`,`src`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stores candidate social network handles';

--
-- Dumping data for table `CandidateMetadata`
--

INSERT INTO `CandidateMetadata` (`cid`, `src`, `handle`) VALUES
(1, 'fb', 'https://www.facebook.com/AAPkaArvind'),
(2, 'fb', 'https://www.facebook.com/narendramodi'),
(1, 'twitter', 'https://twitter.com/ArvindKejriwal?'),
(2, 'twitter', 'https://twitter.com/narendramodi?');

-- --------------------------------------------------------

--
-- Table structure for table `Candidates`
--

CREATE TABLE IF NOT EXISTS `Candidates` (
  `cid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Candidate''s autogen Id',
  `cfirstname` varchar(20) NOT NULL COMMENT 'Candidate''s first name',
  `clastname` varchar(20) DEFAULT NULL COMMENT 'Candidate''s last image',
  `cteam` varchar(64) NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `team` (`cteam`),
  FULLTEXT KEY `cfirstName` (`cfirstname`,`clastname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Stores candidates basic metadata information' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Candidates`
--

INSERT INTO `Candidates` (`cid`, `cfirstname`, `clastname`, `cteam`) VALUES
(1, 'Arvind', 'Kejriwal', 'AAP'),
(2, 'Narendra', 'Modi', 'BJP');

-- --------------------------------------------------------

--
-- Table structure for table `Game`
--

CREATE TABLE IF NOT EXISTS `Game` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `gname` varchar(256) NOT NULL,
  `gtype` varchar(50) NOT NULL,
  `gdate` date DEFAULT NULL,
  `winnercid` int(11) DEFAULT NULL,
  `gcity` varchar(64) NOT NULL,
  `gstate` varchar(64) NOT NULL,
  `gcountry` varchar(64) NOT NULL,
  `gplace` varchar(128) NOT NULL,
  `zipcode` int(11) NOT NULL,
  PRIMARY KEY (`gid`),
  UNIQUE KEY `gname_2` (`gname`),
  KEY `gtype` (`gtype`),
  KEY `gname` (`gname`),
  FULLTEXT KEY `gCity` (`gcity`),
  FULLTEXT KEY `gState` (`gstate`,`gcountry`),
  FULLTEXT KEY `gPlace` (`gplace`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Stores basic information regarding a game' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Game`
--

INSERT INTO `Game` (`gid`, `gname`, `gtype`, `gdate`, `winnercid`, `gcity`, `gstate`, `gcountry`, `gplace`, `zipcode`) VALUES
(1, 'Loksabha-2014-arvind-kejriwal-narendra-modi', 'Loksabha', '2014-04-07', NULL, 'Lukhnow', 'Uttar Pradesh', 'India', 'MG road ', 560055);

-- --------------------------------------------------------

--
-- Table structure for table `GameCandidates`
--

CREATE TABLE IF NOT EXISTS `GameCandidates` (
  `gid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  KEY `gid` (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `GameCandidates`
--

INSERT INTO `GameCandidates` (`gid`, `cid`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `VoteTracking`
--

CREATE TABLE IF NOT EXISTS `VoteTracking` (
  `gid` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `usrc` varchar(50) NOT NULL,
  `cid` int(11) NOT NULL,
  KEY `gid` (`gid`,`uid`),
  KEY `uid` (`uid`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tracks unique vote by a user in a game';

--
-- Dumping data for table `VoteTracking`
--

INSERT INTO `VoteTracking` (`gid`, `uid`, `usrc`, `cid`) VALUES
(1, 'anurajp', 'fb', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
