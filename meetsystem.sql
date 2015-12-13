-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Dec 13, 2015 at 03:28 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `meetsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `absent`
--

CREATE TABLE `absent` (
  `abuid` int(11) NOT NULL,
  `abalnum` int(11) NOT NULL,
  `abmonth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `absent`
--

INSERT INTO `absent` (`abuid`, `abalnum`, `abmonth`) VALUES
(1, 2, 10),
(2, 5, 9),
(3, 5, 10),
(1, 6, 6),
(5, 10, 10),
(5, 10, 10),
(6, 6, 10),
(7, 15, 10),
(8, 3, 10),
(9, 1, 10),
(10, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
`aid` int(11) NOT NULL,
  `aname` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`aid`, `aname`) VALUES
(1, '开发部'),
(2, '财务部');

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
  `emanage` int(11) NOT NULL COMMENT '高管',
  `econtent` varchar(140) NOT NULL,
  `eremind` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eid`, `euid`, `ebt`, `eet`, `etype`, `emanage`, `econtent`, `eremind`) VALUES
(1, 1, '2015-12-08 16:57:13', '2015-12-09 03:00:00', 0, 0, '', 0),
(2, 1, '2015-12-08 16:58:13', '2015-12-09 03:00:00', 0, 0, '', 0),
(3, 4, '2015-12-09 16:18:01', '2015-12-09 03:00:00', 1, 1, '', 0),
(4, 1, '2015-12-09 16:57:00', '2015-12-09 16:57:00', 0, 1, 'asfdjsa;lf', 30);

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
`mid` int(11) NOT NULL,
  `muid` int(11) NOT NULL COMMENT 'creater',
  `mplanbt` timestamp NULL DEFAULT NULL,
  `mplanet` timestamp NULL DEFAULT NULL,
  `mactbt` timestamp NULL DEFAULT NULL,
  `mactet` timestamp NULL DEFAULT NULL,
  `mrid` int(11) NOT NULL,
  `mremind` int(11) NOT NULL,
  `mchecktype` int(11) NOT NULL COMMENT '0 = location 1 = qrcode',
  `mmembernum` int(11) NOT NULL,
  `mconfirm` int(11) NOT NULL COMMENT '高层=1',
  `mattach` mediumtext NOT NULL,
  `mstate` int(11) NOT NULL COMMENT 'draft = 0 发布=1',
  `mcreatet` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mpass` int(11) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `mscore` int(11) DEFAULT NULL,
  `mfilename` varchar(30) NOT NULL,
  `mfiletime` timestamp NULL DEFAULT NULL,
  `mapartment` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`mid`, `muid`, `mplanbt`, `mplanet`, `mactbt`, `mactet`, `mrid`, `mremind`, `mchecktype`, `mmembernum`, `mconfirm`, `mattach`, `mstate`, `mcreatet`, `mpass`, `mname`, `mscore`, `mfilename`, `mfiletime`, `mapartment`) VALUES
(1, 1, '2015-10-10 02:10:10', '2015-10-10 02:10:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 20, 0, 0, 0, '', 0, '0000-00-00 00:00:00', 0, 'test', NULL, '', NULL, 0),
(2, 2, '2015-10-10 02:10:10', '2015-10-10 02:10:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 20, 0, 0, 0, '', 1, '0000-00-00 00:00:00', 0, 'test2', NULL, '', NULL, 0),
(3, 2, '2015-10-11 02:10:10', '2015-10-11 02:10:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 20, 0, 0, 0, '', 1, '0000-00-00 00:00:00', 0, 'test3', NULL, '', NULL, 0),
(4, 2, '2015-10-11 02:10:10', '2015-10-11 02:10:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 20, 0, 0, 0, '', 1, '0000-00-00 00:00:00', 0, 'test3', NULL, '', NULL, 0),
(5, 1, '2015-12-02 00:00:00', '2015-12-03 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 30, 0, 0, 0, '', 0, '0000-00-00 00:00:00', 0, 'haha', NULL, '', NULL, 0),
(6, 1, '2015-12-02 00:00:00', '2015-12-03 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 30, 0, 0, 0, '', 0, '0000-00-00 00:00:00', 0, 'haha', NULL, '', NULL, 0),
(7, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 0, 0, 0, 0, '', 1, '0000-00-00 00:00:00', 0, '', NULL, '', NULL, 0),
(8, 1, '2014-09-09 02:10:10', '2014-10-10 02:10:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 0, 0, 0, 0, '', 0, '0000-00-00 00:00:00', 0, '', NULL, '', NULL, 0),
(9, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 19, 0, 0, 0, '', 0, '0000-00-00 00:00:00', 0, '', NULL, '', NULL, 0),
(10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 21, 0, 0, 0, '', 1, '0000-00-00 00:00:00', 0, '', 10, '', NULL, 0),
(11, 1, '2015-12-24 01:03:00', '2015-12-07 15:00:00', '0000-00-00 00:00:00', '2015-12-13 07:05:12', 1, 33, 0, 0, 0, '', 1, '0000-00-00 00:00:00', 0, '123123', 60, '', '2015-12-06 07:00:00', 1),
(12, 3, '2015-12-23 23:00:00', '2015-12-31 01:00:00', '0000-00-00 00:00:00', '2015-12-13 07:23:27', 2, 19, 0, 0, 0, '', 1, '0000-00-00 00:00:00', 0, 'douwo', 70, '', NULL, 0),
(13, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 30, 0, 0, 0, '', 1, '0000-00-00 00:00:00', 0, '', NULL, '', NULL, 0),
(14, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 20, 0, 0, 0, '', 1, '0000-00-00 00:00:00', 0, '', NULL, '', NULL, 0),
(15, 1, '2015-10-10 02:10:10', '0000-00-00 00:00:00', NULL, NULL, 2, 30, 0, 0, 0, '', 0, '0000-00-00 00:00:00', 0, 'testfordraft', NULL, '', NULL, 0),
(16, 1, '2015-10-10 02:10:10', '2015-10-10 02:10:10', NULL, NULL, 2, 30, 0, 0, 0, '', 1, '0000-00-00 00:00:00', 0, 'testfordraft', NULL, '', NULL, 0),
(17, 1, '2015-12-23 23:00:00', '2015-12-31 01:00:00', NULL, NULL, 2, 30, 1, 0, 0, '', 1, '0000-00-00 00:00:00', 0, '123123', NULL, '', NULL, 0),
(18, 1, '2015-10-09 16:00:00', '2015-10-10 16:00:00', NULL, NULL, 2, 30, 1, 0, 1, '', 1, '0000-00-00 00:00:00', 0, 'test', NULL, '', NULL, 1),
(19, 1, '2015-10-09 16:00:00', '2015-10-09 16:00:00', NULL, NULL, 2, 30, 1, 0, 1, '', 1, '0000-00-00 00:00:00', 0, 'upload', NULL, 'CodeIgniter-3.0.2.zip', '2015-12-06 12:36:59', 1),
(20, 1, '2015-12-23 23:00:00', '2015-12-05 15:00:00', NULL, NULL, 1, 30, 0, 0, 0, '', 1, '0000-00-00 00:00:00', 0, '123123', NULL, '', NULL, 2),
(21, 1, '2015-12-23 23:00:00', '2015-12-05 15:00:00', NULL, NULL, 1, 30, 1, 0, 0, '', 1, '0000-00-00 00:00:00', 0, '123123', NULL, '', NULL, 2),
(22, 1, '2015-12-07 10:49:00', '2015-12-07 13:49:00', NULL, NULL, 2, 20, 1, 0, 0, '', 1, '0000-00-00 00:00:00', 0, 'wfnuser', NULL, 'CodeIgniter-3.0.2.zip', '2015-12-07 10:49:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `meetmember`
--

CREATE TABLE `meetmember` (
`mmid` int(11) NOT NULL,
  `mmmid` int(11) NOT NULL,
  `mmuid` int(11) NOT NULL,
  `mmissponser` int(11) NOT NULL,
  `mmchecked` int(11) NOT NULL,
  `mmchecktime` timestamp NULL DEFAULT NULL,
  `mmleave` int(11) NOT NULL COMMENT 'apply=1',
  `mmattend` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meetmember`
--

INSERT INTO `meetmember` (`mmid`, `mmmid`, `mmuid`, `mmissponser`, `mmchecked`, `mmchecktime`, `mmleave`, `mmattend`) VALUES
(1, 11, 2, 0, 0, NULL, 0, 1),
(2, 11, 8, 0, 0, NULL, 0, 1),
(3, 11, 3, 0, 0, NULL, 1, 0),
(4, 11, 2, 0, 0, NULL, 0, 0),
(5, 11, 1, 0, 1, '2015-12-07 10:50:05', 1, 0),
(6, 2, 1, 0, 0, NULL, 1, 0),
(7, 4, 1, 0, 0, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
`msgid` int(11) NOT NULL,
  `msgtype` int(11) NOT NULL COMMENT '1 for delay;2 for cancel;3 for leave;',
  `msgmid` int(11) NOT NULL,
  `msgtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `msguid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`msgid`, `msgtype`, `msgmid`, `msgtime`, `msguid`) VALUES
(1, 2, 2, '2015-12-06 14:48:30', 0),
(2, 1, 11, '2015-12-06 14:48:30', 0),
(3, 1, 2, '2015-12-06 14:48:49', 0),
(4, 1, 5, '2015-12-06 14:48:49', 0),
(5, 3, 11, '2015-12-06 14:48:30', 0),
(6, 1, 11, '2015-12-07 11:50:24', 1),
(7, 1, 11, '2015-12-07 11:58:49', 1),
(8, 1, 11, '2015-12-07 11:59:06', 1),
(9, 1, 11, '2015-12-07 12:01:18', 1),
(10, 3, 11, '2015-12-07 12:42:21', 1),
(11, 3, 11, '2015-12-07 12:42:48', 1),
(12, 3, 11, '2015-12-07 12:43:13', 1),
(13, 3, 11, '2015-12-07 12:43:49', 1),
(14, 3, 12, '2015-12-07 12:47:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
`rid` int(11) NOT NULL,
  `rname` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`rid`, `rname`) VALUES
(1, '6楼1号会议室'),
(2, '5楼1号会议室');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
`uid` int(11) NOT NULL,
  `uname` varchar(10) NOT NULL,
  `type` int(11) NOT NULL,
  `uabsentnum` int(11) NOT NULL,
  `ulatenum` int(11) NOT NULL,
  `ulatest` int(11) NOT NULL COMMENT 'lateorabsent'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `type`, `uabsentnum`, `ulatenum`, `ulatest`) VALUES
(1, 'wfnuser', 0, 0, 0, 0),
(2, 'test', 0, 4, 0, 4),
(3, 'wfnuser4', 0, 2, 0, 2),
(4, 'test4', 0, 0, 0, 2),
(5, 'wfnuser1', 0, 0, 0, 0),
(6, 'test2', 0, 0, 0, 3),
(7, 'wfnuser3', 0, 0, 0, 0),
(8, 'test3', 0, 2, 0, 2),
(9, 'mark', 0, 0, 0, 0),
(10, 'mark2', 0, 0, 0, 0),
(11, 'mark22', 0, 0, 0, 0),
(12, 'turkey', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
 ADD PRIMARY KEY (`aid`);

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
-- Indexes for table `meetmember`
--
ALTER TABLE `meetmember`
 ADD PRIMARY KEY (`mmid`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
 ADD PRIMARY KEY (`msgid`);

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
-- AUTO_INCREMENT for table `apartment`
--
ALTER TABLE `apartment`
MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `meetmember`
--
ALTER TABLE `meetmember`
MODIFY `mmid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
MODIFY `msgid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;