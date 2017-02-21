-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2017 at 02:01 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thread_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `label` tinyint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `label`) VALUES
(3, 'Easir arafat', 'arafat', 'ara@gmail.com', '0f0a24fb6d926e172d2d2f7a61444560', 0),
(4, 'Abdullah Aman', 'Aman', 'Aman@gmail.com', '95a6080a7a999364880885c180d92bb5', 1),
(5, 'Mizanur Rahman', 'Mizan', 'mizan@gmial.com', '50c65f13c94f7a2d7df68e6f8a58e3b5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl-thread-post`
--

CREATE TABLE `tbl-thread-post` (
  `id` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl-thread-post`
--

INSERT INTO `tbl-thread-post` (`id`, `catId`, `title`, `body`, `image`, `author`, `tags`, `date`) VALUES
(1, 1, 'JAVA', '<p>I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.vvI love JAVA.vI love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.vI love JAVA.vI love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.I love JAVA.vvvI love JAVA.I love JAVA.I love JAVA.</p>', 'psd2.png', 'Easir Arafat', 'java, Programming', '2017-02-18 08:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `name`) VALUES
(1, 'JAVA'),
(2, 'PHP'),
(3, 'HTML'),
(4, 'CSS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `adminId` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `adminId`, `catId`, `title`, `body`, `image`, `author`, `tags`, `date`) VALUES
(1, 3, 1, 'JAVA', 'This is java class tutorialThis is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial.\r\nThis is java class tutorialThis is java class tutorial.This is java class tutorial.This is java class .This is java class tutorialThis is java class tutorial.This is java class tutorial.This is java class .This is java class tutorialThis is java class tutorial.This is java class tutorial.This is java class .This is java class tutorialThis is java class tutorial.This is java class tutorial.This is java class .This is java class tutorialThis is java class tutorial.This is java class tutorial.This is java class .This is java class tutorialThis is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial.This is java class tutorial...............', 'uploads/headphone.jpg', 'Easir Arafat', 'java, Programming', '2017-02-18 08:19:24'),
(3, 4, 2, 'PHP variable', 'I love php.I love php.I love php.I love php.I love php.vvvvvI love php.I love php.I love php.I love php.I love php.I love php.I love php.vI love php.I love php.I love php.I love php.I love php.vvvvvI love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.vvvvvI love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.vvvvvI love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.vvvvvI love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.vvvvvI love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.vvvvvI love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.vvvvvI love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.I love php.vvvvvI love php.I love php.I love php.I love php.I love php.I love php.I love php.', 'uploads/headphone.jpg', 'Md.Sany Ahmed', 'Php, Proh=gramming', '2017-02-18 20:20:02'),
(9, 4, 3, 'What is HTML  ?', '  \r\nHTML is a markup language.', 'uploads/fe3449fac5.jpg', 'Md.Sany Ahmed', 'html', '2017-02-20 17:36:00'),
(10, 4, 1, 'what is JAVA  ?', '  \r\nJava is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.Java is server scripting language.', 'uploads/128cf794d9.jpg', 'Md.Sany Ahmed', 'JAVA, Language', '2017-02-20 18:16:16'),
(11, 3, 2, 'Php Introduction', '  \r\nPhp is a server side language.Php is a server side language.Php is a server side language.vvvPhp is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.Php is a server side language.  \r\n', 'uploads/86ecca5dfb.jpg', 'Easir arafat', 'php , programming language,', '2017-02-20 20:41:24'),
(12, 3, 1, 'JAVA Syntax ', '  \r\nJava is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.Java is object oriented programming language.vJava is object oriented programming language.Java is object oriented programming language.  \r\n  \r\n', 'uploads/42ffd10649.jpg', 'Easir arafat', 'JAVA, Language,oop', '2017-02-21 06:14:25'),
(13, 3, 3, 'HTML Syntax', '  html syntax is ,  html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is   html syntax is vv  html syntax is vvv  html syntax is v  html syntax is vvv  html syntax is \r\n', 'uploads/7b7d0cc0c8.jpg', 'Easir arafat', 'html', '2017-02-21 07:02:02'),
(14, 3, 4, 'CSS', '  \r\nCss is a style sheet.Css is a style sheet.Css is a style sheet.vCss is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.Css is a style sheet.  \r\n  \r\n', 'uploads/1be62101f6.jpg', 'Easir arafat', 'css, style sheet', '2017-02-21 11:51:34'),
(15, 3, 4, 'Why  to learn CSS ?', '  css learn to   css learn to vvvv  css learn to   css learn to   css learn to   css learn to   css learn to   css learn to   css learn to v  css learn to vvv  css learn to   css learn to   css learn to   css learn to   css learn to   css learn to vv  css learn to   css learn to   css learn to   css learn to vv\r\n', 'uploads/9abe704258.jpg', 'Easir arafat', 'css, style', '2017-02-21 12:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`) VALUES
(5, 'Rony Ahmed', 'rony', 'rony32@gmail.com', 'a6296f234a2ff4800237a96a049ca58c'),
(6, 'Imran Hasan', 'imran', 'imran@gmail.com', 'e18fdc9fa7cc2b5f4e497d21a48ea3b7'),
(7, 'Murad Ahmed', 'murad', 'murad', '76ae3ce0585ca0051126fd844cefbb30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl-thread-post`
--
ALTER TABLE `tbl-thread-post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`adminId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl-thread-post`
--
ALTER TABLE `tbl-thread-post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
