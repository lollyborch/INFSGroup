-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2016 at 02:24 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infs3202photobooth`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `img_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_ID`, `user_ID`, `img_name`) VALUES
(68, 1, 'D:/xampp/htdocs/img/1/0.png'),
(69, 1, 'D:/xampp/htdocs/img/1/1.png'),
(70, 1, 'D:/xampp/htdocs/img/1/2.png'),
(71, 1, 'D:/xampp/htdocs/img/1/3.png'),
(72, 1, 'D:/xampp/htdocs/img/1/4.png'),
(73, 1, 'D:/xampp/htdocs/img/1/5.png'),
(74, 1, 'D:/xampp/htdocs/img/1/6.png'),
(75, 1, 'D:/xampp/htdocs/img/1/7.png'),
(76, 1, 'D:/xampp/htdocs/img/1/8.png'),
(77, 1, 'D:/xampp/htdocs/img/1/9.png'),
(78, 1, 'D:/xampp/htdocs/img/1/10.png'),
(79, 1, 'D:/xampp/htdocs/img/1/11.png'),
(80, 1, 'D:/xampp/htdocs/img/1/12.png'),
(81, 1, 'D:/xampp/htdocs/img/1/13.png'),
(82, 2, 'D:/xampp/htdocs/img/2/0.png'),
(83, 2, 'D:/xampp/htdocs/img/2/1.png'),
(84, 2, 'D:/xampp/htdocs/img/2/2.png'),
(85, 2, 'D:/xampp/htdocs/img/2/3.png'),
(86, 2, 'D:/xampp/htdocs/img/2/4.png'),
(87, 2, 'D:/xampp/htdocs/img/2/5.png'),
(88, 2, 'D:/xampp/htdocs/img/2/6.png'),
(89, 2, 'D:/xampp/htdocs/img/2/7.png'),
(90, 2, 'D:/xampp/htdocs/img/2/8.png'),
(91, 2, 'D:/xampp/htdocs/img/2/9.png'),
(92, 2, 'D:/xampp/htdocs/img/2/10.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'lyndon', 'moore', 'test@test', '098f6bcd4621d373cade4e832627b4f6'),
(2, 'asdf', 'asdf', 'test1@test', '098f6bcd4621d373cade4e832627b4f6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `user_ID_2` (`user_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`) ON DELETE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
