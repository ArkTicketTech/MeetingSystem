-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Dec 02, 2015 at 05:03 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `meetsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
`eid` int(11) NOT NULL,
  `euid` int(11) NOT NULL,
  `ebt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `eet` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `etype` int(11) NOT NULL COMMENT '外出等类别',
  `emanage` int(11) NOT NULL COMMENT '高管'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
`mid` int(11) NOT NULL,
  `muid` int(11) NOT NULL COMMENT 'creater',
  `mplanbt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mplanet` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mactbt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mactet` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mrid` int(11) NOT NULL,
  `mremind` int(11) NOT NULL,
  `mqrcode` int(11) NOT NULL,
  `mmembernum` int(11) NOT NULL,
  `mconfirm` int(11) NOT NULL COMMENT '高层=1',
  `mattach` mediumtext NOT NULL,
  `mstate` int(11) NOT NULL COMMENT 'draft = 0',
  `mcreatet` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mpass` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



--
-- Table structure for table `membermeet`
--

CREATE TABLE `membermeet` (
`mmid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `mmsponser` int(11) NOT NULL,
  `mmcheck` timestamp NULL DEFAULT NULL,
  `mmleave` int(11) NOT NULL COMMENT 'apply=1',
  `mmabsent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
`rid` int(11) NOT NULL,
  `rname` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
`uid` int(11) NOT NULL,
  `uname` varchar(10) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
 ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
 ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `membermeet`
--
ALTER TABLE `membermeet`
 ADD PRIMARY KEY (`mmid`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
 ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `membermeet`
--
ALTER TABLE `membermeet`
MODIFY `mmid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;