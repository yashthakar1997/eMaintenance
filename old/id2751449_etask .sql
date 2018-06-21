-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2018 at 08:36 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2751449_etask`
--

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `cid` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `priority` int(11) DEFAULT NULL,
  `whom` int(11) DEFAULT NULL,
  `mail` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(50) DEFAULT NULL,
  `comments` text,
  `approve` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`cid`, `title`, `description`, `priority`, `whom`, `mail`, `date`, `user`, `comments`, `approve`) VALUES
(121, 'jivat', 'jiv juntuo', 2, 2, 1, '2017-08-18 09:24:53', 'yash', NULL, 3),
(122, 'fankha', 'nai chalta', 3, 2, 1, '2017-08-18 09:26:49', 'test', NULL, 0),
(127, 'fan', 'saxaxca', 2, 2, 1, '2017-08-19 16:02:05', 'test', NULL, 0),
(130, 'fan not working', 'cse depat fan not working', 2, 4, 1, '2017-08-19 17:03:23', 'yash', NULL, 3),
(153, 'Hshs', 'Hsbzb', 1, 3, 0, '2017-08-31 14:21:41', 'yash', NULL, 2),
(154, 'Not able to connect using network access', 'I am not able to connect ip through network though ping is going. ', 2, 2, 0, '2017-08-31 14:23:59', 'hod', NULL, 1),
(155, 'Abc', 'Abc', 1, 3, 1, '2017-08-31 14:43:23', 'yash', NULL, 2),
(156, 'unable to access wifi', 'ala wifi nai chaltu jaldhi chalu karo', 3, 3, 0, '2017-09-01 09:35:21', 'hod', NULL, 1),
(157, 'jvhgj', 'svsvrsvrv', 3, 0, 0, '2017-09-02 09:16:08', 'admin', NULL, 0),
(158, 'Tdgv', 'Ggvbn', 1, 0, 0, '2017-09-02 09:51:07', 'yash', NULL, 2),
(159, 'Mobile uploades', 'Vchbb', 3, 0, 1, '2017-09-02 09:57:58', 'yash', NULL, 2),
(160, 'Gshb', 'Gxbugb', 3, 0, 1, '2017-09-02 09:58:15', 'yash', NULL, 2),
(161, 'Mobile uploades', 'Hgvvb', 2, 0, 0, '2017-09-02 09:59:58', 'yash', NULL, 2),
(162, 'nikki ', 'buabdjcek', 2, 0, 1, '2017-09-08 09:00:39', 'nikki', NULL, 1),
(163, '', '', 0, 0, 0, '2017-09-20 11:33:19', 'yash', NULL, 0),
(164, 'yash', 'te nv ne free nai free karya tara lidhe mara diagram rai gaya', 3, 0, 0, '2017-09-20 11:34:12', 'yash', NULL, 3),
(165, 'NONE', 'JBDKBKJ', 1, 0, 0, '2017-12-23 08:42:55', 'yash', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(11) DEFAULT NULL,
  `counter` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='fills counter';

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `counter`) VALUES
(1, 4740);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `role`) VALUES
(1, 'test', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(2, 'yash', '827ccb0eea8a706c4c34a16891f84e7b', 3),
(4, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(5, 'hod', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(6, 'principal', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(7, 'faculty', '827ccb0eea8a706c4c34a16891f84e7b', 3),
(17, 'nikki', '827ccb0eea8a706c4c34a16891f84e7b', 3),
(19, 'parth', '827ccb0eea8a706c4c34a16891f84e7b', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD UNIQUE KEY `cid` (`cid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
