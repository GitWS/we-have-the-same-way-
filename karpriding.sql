-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2017 at 01:14 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karpriding`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `auth` (IN `login` VARCHAR(45) CHARSET cp1251, IN `pass` VARCHAR(20) CHARSET cp1251, OUT `result` INT UNSIGNED)  IF(SELECT COUNT(*) FROM users WHERE login = user_login AND pass = user_pass)THEN
SET result = 1;
ELSE
SET result = 0;
END IF$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `regthis` (IN `login` VARCHAR(45), IN `pass` VARCHAR(45), IN `email` VARCHAR(45), IN `phone` VARCHAR(45))  MODIFIES SQL DATA
INSERT INTO users (user_login,user_pass,user_email,user_phone)
VALUES (login, pass, email, phone)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `passenger_info`
--

CREATE TABLE `passenger_info` (
  `passenger_id` int(13) UNSIGNED ZEROFILL NOT NULL,
  `passenger_fio` varchar(255) NOT NULL,
  `passenger_phone` varchar(15) NOT NULL,
  `passenger_sex` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rider_info`
--

CREATE TABLE `rider_info` (
  `rider_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `rider_fio` varchar(255) NOT NULL,
  `rider_phone` varchar(13) NOT NULL,
  `rider_machine` varchar(15) NOT NULL,
  `rider_age` varchar(5) NOT NULL,
  `rider_sex` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ride_form`
--

CREATE TABLE `ride_form` (
  `form_id` int(15) UNSIGNED ZEROFILL NOT NULL,
  `pass_id` int(13) NOT NULL,
  `pass_meetpoint` varchar(255) NOT NULL,
  `pass_needpoint` varchar(255) NOT NULL,
  `ride_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ride_info`
--

CREATE TABLE `ride_info` (
  `ride_id` int(11) NOT NULL,
  `rider_id` int(11) NOT NULL,
  `ride_date` datetime(6) NOT NULL,
  `ride_outpoint` varchar(255) NOT NULL,
  `ride_point` varchar(255) NOT NULL,
  `ride_sum` varchar(255) NOT NULL,
  `ride_comment` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(45) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `user_email` varchar(55) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `user_pass` varchar(20) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `user_phone` varchar(15) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `user_reg_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_email`, `user_pass`, `user_phone`, `user_reg_data`) VALUES
(11, '??????', 'gareks@yandex.ru', '12345rvsCSSraze', '89104219908', '2017-02-10 09:53:45'),
(41, 'app', '1', '1', '89261698700', '2017-02-10 12:08:08'),
(43, '9', '9', '9', '9', '2017-02-10 12:09:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `passenger_info`
--
ALTER TABLE `passenger_info`
  ADD PRIMARY KEY (`passenger_id`);

--
-- Indexes for table `rider_info`
--
ALTER TABLE `rider_info`
  ADD PRIMARY KEY (`rider_id`);

--
-- Indexes for table `ride_form`
--
ALTER TABLE `ride_form`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `pass_id` (`pass_id`),
  ADD KEY `pass_id_2` (`pass_id`);

--
-- Indexes for table `ride_info`
--
ALTER TABLE `ride_info`
  ADD PRIMARY KEY (`ride_id`),
  ADD KEY `rider_id` (`rider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `login` (`user_login`),
  ADD UNIQUE KEY `email` (`user_email`),
  ADD UNIQUE KEY `phone` (`user_phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passenger_info`
--
ALTER TABLE `passenger_info`
  MODIFY `passenger_id` int(13) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rider_info`
--
ALTER TABLE `rider_info`
  MODIFY `rider_id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ride_form`
--
ALTER TABLE `ride_form`
  MODIFY `form_id` int(15) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ride_info`
--
ALTER TABLE `ride_info`
  MODIFY `ride_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
