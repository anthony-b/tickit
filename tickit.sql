-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2016 at 10:19 PM
-- Server version: 5.5.47-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tickit`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE IF NOT EXISTS `account_types` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `emailaddress` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `profilepic_url` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id`, `username`, `firstname`, `lastname`, `emailaddress`, `account_type`, `department`, `profilepic_url`) VALUES
(9, 'anthony.broadbent', 'Anthony', 'Broadbent', 'anthony.broadbent@seafreshdirect.com', 'admin', 'IT Support', 'profile/profilepics/photo.jpg'),
(10, 'umar.farooq', 'UmaR', 'Farooq', 'umar.farooq@seafreshdirect.com', 'admin', 'Invoicing', 'profile/profilepics/join-conversation.png');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emailaddress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `emailaddress`, `password`) VALUES
(1, 'Admin', 'admin@seafreshdirect.com', ''),
(3, 'itsupport', 'itsupport@seafreshdirect.com', ''),
(5, 'Staff', 'staff@seafreshdirect.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `emailaddress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `department`, `emailaddress`, `password`) VALUES
(1, 'Development', '', 'development@seafreshdirect.com', ''),
(2, 'Invoicing-Team', '', 'invoicing_team@seafreshdirect.com', ''),
(3, 'itsupport-Team', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` blob NOT NULL,
  `creator` varchar(255) NOT NULL,
  `assigned_to` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `hasread` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `subject`, `description`, `creator`, `assigned_to`, `priority`, `date_created`, `status`, `hasread`) VALUES
(1, 'Subject Line', 0x0920266c743b6272202f2667743b0d0a094163636f756e74732009266c743b6163636f756e74734073656166726573686469726563742e636f6d2667743b0920266c743b6272202f2667743b0d0a09416c6c4d6f756e745374446570742009266c743b6974737570706f72744073656166726573686469726563742e636f6d2667743b09416c6c204d6f756e7420535420266c743b6272202f2667743b0d0a0941756469742009266c743b696e742d61756469744073656166726573686469726563742e636f6d2667743b0920266c743b6272202f2667743b0d0a094865616c746820616e642053616665747920266c743b68616e64734073656166726573686469726563742e636f6d2667743b0920266c743b6272202f2667743b0d0a09496e766f6963696e6720266c743b696e766f6963696e674073656166726573686469726563742e636f6d2667743b0920266c743b6272202f2667743b0d0a09495420537570706f727420266c743b6974737570706f72744073656166726573686469726563742e636f6d2667743b0920266c743b6272202f2667743b0d0a094d61726b6574696e672009266c743b6d61726b6574696e674073656166726573686469726563742e636f6d2667743b0920266c743b6272202f2667743b0d0a0950726f64756374204d616e6167656d656e7420266c743b70726f647563746d616e6167656d656e744073656166726573686469726563742e636f6d2667743b0920266c743b6272202f2667743b0d0a0950757263686173696e67200920266c743b706f704073656166726573686469726563742e636f6d2667743b0920266c743b6272202f2667743b0d0a0953616c6573200920266c743b73616c65734073656166726573686469726563742e636f6d2667743b0920266c743b6272202f2667743b0d0a0953797374656d7320266c743b73797374656d734073656166726573686469726563742e636f6d2667743b095461686972204b68616e20266c743b6272202f2667743b0d0a095472616e73706f72742009266c743b7472616e73706f72744073656166726573686469726563742e636f6d2667743b0920266c743b6272202f2667743b0d0a0957617265686f7573652009266c743b6974737570706f72744073656166726573686469726563742e636f6d2667743b0920266c743b6272202f2667743b0d0a0957686f6c6573616c652053616c657320266c743b77686f6c6573616c6573616c65734073656166726573686469726563742e636f6d2667743b, '', '2110.anthony', 'normal', '2015-09-21', 'resolved', ',520.umar'),
(2, 'Subject Line', 0x266c743b6272202f2667743b4163636f756e74732026616d703b6c743b6163636f756e74734073656166726573686469726563742e636f6d26616d703b67743b20266c743b6272202f2667743b20416c6c4d6f756e745374446570742026616d703b6c743b6974737570706f72744073656166726573686469726563742e636f6d26616d703b67743b20416c6c204d6f756e7420535420266c743b6272202f2667743b2041756469742026616d703b6c743b696e742d61756469744073656166726573686469726563742e636f6d26616d703b67743b20266c743b6272202f2667743b204865616c746820616e64205361666574792026616d703b6c743b68616e64734073656166726573686469726563742e636f6d26616d703b67743b20266c743b6272202f2667743b20496e766f6963696e672026616d703b6c743b696e766f6963696e674073656166726573686469726563742e636f6d26616d703b67743b20266c743b6272202f2667743b20495420537570706f72742026616d703b6c743b6974737570706f72744073656166726573686469726563742e636f6d26616d703b67743b20266c743b6272202f2667743b204d61726b6574696e672026616d703b6c743b6d61726b6574696e674073656166726573686469726563742e636f6d26616d703b67743b20266c743b6272202f2667743b2050726f64756374204d616e6167656d656e742026616d703b6c743b70726f647563746d616e6167656d656e744073656166726573686469726563742e636f6d26616d703b67743b20266c743b6272202f2667743b2050757263686173696e672026616d703b6c743b706f704073656166726573686469726563742e636f6d26616d703b67743b20266c743b6272202f2667743b2053616c65732026616d703b6c743b73616c65734073656166726573686469726563742e636f6d26616d703b67743b20266c743b6272202f2667743b2053797374656d732026616d703b6c743b73797374656d734073656166726573686469726563742e636f6d26616d703b67743b205461686972204b68616e20266c743b6272202f2667743b205472616e73706f72742026616d703b6c743b7472616e73706f72744073656166726573686469726563742e636f6d26616d703b67743b20266c743b6272202f2667743b2057617265686f7573652026616d703b6c743b6974737570706f72744073656166726573686469726563742e636f6d26616d703b67743b20266c743b6272202f2667743b2057686f6c6573616c652053616c65732026616d703b6c743b77686f6c6573616c6573616c65734073656166726573686469726563742e636f6d26616d703b67743b, '', 'IT Support', 'normal', '2015-09-21', 'unread', ',anthony.broadbent,transport'),
(3, 'test', '', 'a', 'a', 'a', '2015-10-05', '', ''),
(4, 'subject', '', '', '', '', '0000-00-00', '', ''),
(5, 'subject', 0x5468697320697320612076657279206c6f6e67206465736372697074696f6e, 'creator', 'assigned to', 'normal', '2015-10-05', '', ''),
(8, 'subject14', 0x31266c743b6272202f2667743b32266c743b6272202f2667743b33, '', '520.umar', 'normal', '2015-10-06', 'unread', ',520.umar,2110.anthony'),
(9, 'subject', 0x26616d703b616d703b6c743b68746d6c26616d703b616d703b67743b20546869732069732048544d4c2e202126616d703b616d703b71756f743b26616d703b706f756e643b24255e26616d703b616d703b616d703b2a28297b7d5b5d3a407e3b26616d703b616d703b233033393b2326616d703b616d703b6c743b26616d703b616d703b67743b3f2c2e2f7c, '', '520.umar', 'normal', '2015-10-06', 'unread', ',520.umar'),
(10, 'subject2', 0x266c743b68312667743b266c743b696d67207372633d2671756f743b2e2e2f2f6a732f736f757263652f6a6f696e2d636f6e766572736174696f6e2e706e672671756f743b20616c743d2671756f743b6a6f696e2d636f6e766572736174696f6e2671756f743b202f2667743b546869732069732048544d4c2e20212671756f743b266c743b2f68312667743b0d0a266c743b702667743b26616d703b6e6273703b266c743b2f702667743b0d0a266c743b702667743b26616d703b6e6273703b266c743b2f702667743b0d0a266c743b702667743b26616d703b6e6273703b266c743b2f702667743b0d0a266c743b702667743b26616d703b6e6273703b266c743b2f702667743b0d0a266c743b702667743b26616d703b6e6273703b266c743b2f702667743b0d0a266c743b702667743b266c743b656d2667743b266c743b7374726f6e672667743b26616d703b706f756e643b24255e26616d703b616d703b2a28297b7d5b5d3a40266c743b2f7374726f6e672667743b266c743b2f656d2667743b7e3b26233033393b2326616d703b6c743b26616d703b67743b3f2c2e2f7c26616d703b6e6273703b266c743b696d67207374796c653d2671756f743b666c6f61743a2072696768743b2671756f743b207372633d2671756f743b68747470733a2f2f6c68342e67677068742e636f6d2f774b72444c4c6d6d786a665247322d452d6b354c35425575485770434f65346c575246376f567331477a646e35653579767238666a2d4f52546c4246343355343779493d773330302671756f743b20616c743d2671756f743b2671756f743b202f2667743b266c743b2f702667743b, '', '520.umar', 'normal', '2015-10-06', 'unread', ',520.umar'),
(11, 'Im creating a ticket for myself', 0x54686973, '520.umar', '520.umar', 'High', '2015-10-07', '', ',520.umar'),
(13, 'I&#039;m creating a ticket for myself', 0x546869730d0a7469636b65740d0a69730d0a746f0d0a746573740d0a73747566662121, '520.umar', '520.umar', 'High', '2015-10-07', '', ',520.umar'),
(15, 'Something Important has happened', 0x49747320676f696e6720646f6f6f776e2121, '520.umar', '', 'Urgent', '2015-10-15', '', ''),
(16, 'Something Important has happened', 0x49747320676f696e6720646f6f6f776e2121, '520.umar', '520.umar', 'Urgent', '2015-10-15', '', ',520.umar'),
(18, '', '', '520.umar', ',2110.anthony,520.umar', 'Urgent', '2015-10-21', 'resolved', ',520.umar,2110.anthony'),
(19, '', '', '520.umar', '2110.anthony,Invoicing', 'Urgent', '2015-10-21', 'closed', ',2110.anthony,520.umar'),
(21, 'testing unread', '', '520.umar', '520.umar', 'urgent', '2015-10-22', 'resolved', ',520.umar'),
(23, 'creating another ticket for someone else', 0x6a75737420612074657374, '', 'Admin', 'normal', '0000-00-00', 'unread', ''),
(26, 'team test', 0x6566717765666567, '520.umar', 'Invoicing-Team', 'normal', '2015-11-16', 'closed', ',520.umar'),
(28, 'ticket', 0x6467656667, '520.umar', 'SOP', 'normal', '2015-11-18', 'unread', ',520.umar'),
(29, 'I&#039;m creating a ticket for myself', 0x61776465726771657267, '520.umar', '520.umar', 'normal', '2015-11-18', 'unread', ',520.umar'),
(30, 'testing assignment', 0x65717274677165726774, '520.umar', '2110.anthony', 'normal', '2016-02-24', 'unread', ',2110.anthony,520.umar'),
(31, 'testing db', 0x61656771657267, 'anthony.broadbent', 'anthony.broadbent', 'normal', '2016-09-07', 'unread', ',anthony.broadbent'),
(32, 'dfgq', '', 'anthony.broadbent', 'anthony.broadbent,', 'normal', '2016-09-07', 'unread', ',anthony.broadbent');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE IF NOT EXISTS `ticket_replies` (
  `id` int(11) NOT NULL,
  `respondant_username` varchar(255) NOT NULL,
  `reply` text NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_replies`
--

INSERT INTO `ticket_replies` (`id`, `respondant_username`, `reply`, `ticket_id`, `date_added`) VALUES
(1, '2110.anthony', 'This is reply !"£$%^&*()<html>', 10, '2015-10-06'),
(2, '2110.anthony', 'This is another reply', 10, '2015-10-07'),
(3, '520.umar', '', 10, '2015-10-21'),
(4, '520.umar', '', 10, '2015-10-21'),
(5, '520.umar', 'test', 10, '2015-10-21'),
(6, '520.umar', '&lt;html&gt; This is HTML. \r\n!&quot;£$%^&amp;*(){}[]:@~;&#039;#&lt;&gt;?,./|', 10, '2015-10-21'),
(7, '520.umar', '&amp;lt;html&amp;gt; This is HTML. \r\n!&amp;quot;&amp;pound;$%^&amp;amp;*(){}[]:@~;&#039;#&amp;lt;&amp;gt;?,./|', 10, '2015-10-21'),
(8, '2110.anthony', 'reply', 18, '2015-10-21'),
(9, '2110.anthony', 'hi', 18, '2015-10-21'),
(10, '520.umar', 'yo', 18, '2015-10-21'),
(11, '520.umar', 'test', 6, '2015-10-22'),
(12, '520.umar', 'reply', 6, '2015-10-22'),
(13, '2110.anthony', 'test', 18, '2015-10-22'),
(14, '520.umar', 'test', 1, '2015-10-22'),
(15, '520.umar', 'test', 1, '2015-10-22'),
(16, '520.umar', 'this should clear', 18, '2015-10-22'),
(17, '520.umar', 'this should clear', 18, '2015-10-22'),
(18, '520.umar', 'this should clear', 18, '2015-10-22'),
(19, '520.umar', 'this should clear', 18, '2015-10-22'),
(20, '520.umar', 'this should clear', 18, '2015-10-22'),
(21, '520.umar', 'this should clear', 18, '2015-10-22'),
(22, '520.umar', 'reply', 1, '2015-10-22'),
(23, '520.umar', 'test', 22, '2015-11-13'),
(24, '520.umar', 'test', 27, '2015-11-16'),
(25, '520.umar', 'reply', 29, '2015-11-18'),
(26, '520.umar', 'User made a change to the ticket.', 0, '0000-00-00'),
(27, '520.umar', 'User made a change to the ticket.', 0, '0000-00-00'),
(28, '520.umar', 'User made a change to the ticket.', 0, '0000-00-00'),
(29, '520.umar', 'User made a change to the ticket.', 0, '2015-11-24'),
(30, '520.umar', 'User made a change to the ticket.', 0, '2015-11-24'),
(31, '520.umar', 'lol', 30, '2016-02-24'),
(32, '2110.anthony', 'hahahhahahah', 30, '2016-02-24'),
(33, 'anthony.broadbent', 'complete\r\n', 2, '2016-07-25'),
(34, 'anthony.broadbent', 'dfghe', 32, '2016-09-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD UNIQUE KEY `agent_id` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
