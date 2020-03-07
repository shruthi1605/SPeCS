-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2017 at 07:16 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `specs`
--

-- --------------------------------------------------------

--
-- Table structure for table `categ`
--

CREATE TABLE `categ` (
  `proj_categ` varchar(20) NOT NULL,
  `categ_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rate_no` int(3) NOT NULL,
  `avg_rate` float NOT NULL DEFAULT '0',
  `rate_id` int(10) NOT NULL,
  `stud_id` int(10) NOT NULL,
  `proj_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_prof`
--

CREATE TABLE `student_prof` (
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `colg_name` varchar(20) NOT NULL,
  `mob_no` varchar(10) NOT NULL,
  `stud_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stud_proj`
--

CREATE TABLE `stud_proj` (
  `title` varchar(30) NOT NULL,
  `yop` int(4) NOT NULL,
  `proj_defn` text NOT NULL,
  `proj_desc` text NOT NULL,
  `learning` text NOT NULL,
  `attachments` blob NOT NULL,
  `proj_id` int(10) NOT NULL,
  `categ_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categ`
--
ALTER TABLE `categ`
  ADD PRIMARY KEY (`categ_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rate_id`),
  ADD UNIQUE KEY `stud_id` (`stud_id`),
  ADD UNIQUE KEY `proj_id` (`proj_id`),
  ADD KEY `stud_id_2` (`stud_id`),
  ADD KEY `stud_id_3` (`stud_id`),
  ADD KEY `proj_id_2` (`proj_id`);

--
-- Indexes for table `student_prof`
--
ALTER TABLE `student_prof`
  ADD PRIMARY KEY (`stud_id`),
  ADD KEY `stud_id` (`stud_id`);

--
-- Indexes for table `stud_proj`
--
ALTER TABLE `stud_proj`
  ADD PRIMARY KEY (`proj_id`),
  ADD UNIQUE KEY `categ_id` (`categ_id`),
  ADD KEY `proj_id` (`proj_id`),
  ADD KEY `categ_id_2` (`categ_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categ`
--
ALTER TABLE `categ`
  MODIFY `categ_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rate_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_prof`
--
ALTER TABLE `student_prof`
  MODIFY `stud_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stud_proj`
--
ALTER TABLE `stud_proj`
  MODIFY `proj_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `student_prof` (`stud_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`proj_id`) REFERENCES `stud_proj` (`proj_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stud_proj`
--
ALTER TABLE `stud_proj`
  ADD CONSTRAINT `stud_proj_ibfk_1` FOREIGN KEY (`categ_id`) REFERENCES `categ` (`categ_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
