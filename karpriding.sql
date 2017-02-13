-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2017 at 10:11 AM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `auth` (IN `login` VARCHAR(45) CHARSET cp1251, IN `pass` VARCHAR(20) CHARSET cp1251, OUT `result` INT UNSIGNED)  IF(SELECT COUNT(*) FROM account_user WHERE login = account_login AND pass = account_pass)THEN
SET result = 1;
ELSE
SET result = 0;
END IF$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `regthis` (IN `login` VARCHAR(45), IN `pass` VARCHAR(45), IN `email` VARCHAR(45), IN `phone` VARCHAR(45))  MODIFIES SQL DATA
INSERT INTO account_user (acount_login, account_pass, account_email, account_phone)
VALUES (login, pass, email, phone)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `account_user`
--

CREATE TABLE `account_user` (
  `account_id` int(11) NOT NULL,
  `account_login` varchar(45) NOT NULL,
  `account_pass` varchar(45) NOT NULL,
  `account_email` varchar(45) NOT NULL,
  `account_phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `passenger_info`
--

CREATE TABLE `passenger_info` (
  `passenger_id` int(13) NOT NULL,
  `passenger_phone` varchar(15) NOT NULL,
  `passenger_sex` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile_user`
--

CREATE TABLE `profile_user` (
  `profile_id` int(11) NOT NULL,
  `account_user_id` int(11) NOT NULL,
  `profile_name` varchar(45) NOT NULL,
  `profile_last_name` varchar(45) NOT NULL,
  `profile_birthdate` date NOT NULL,
  `profile_sex` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rider_info`
--

CREATE TABLE `rider_info` (
  `rider_id` int(11) NOT NULL,
  `rider_machine` varchar(15) NOT NULL
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_user`
--
ALTER TABLE `account_user`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `passenger_info`
--
ALTER TABLE `passenger_info`
  ADD PRIMARY KEY (`passenger_id`);

--
-- Indexes for table `profile_user`
--
ALTER TABLE `profile_user`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `account_user_profile` (`account_user_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_user`
--
ALTER TABLE `account_user`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `passenger_info`
--
ALTER TABLE `passenger_info`
  MODIFY `passenger_id` int(13) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile_user`
--
ALTER TABLE `profile_user`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rider_info`
--
ALTER TABLE `rider_info`
  MODIFY `rider_id` int(11) NOT NULL AUTO_INCREMENT;
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
-- Constraints for dumped tables
--

--
-- Constraints for table `passenger_info`
--
ALTER TABLE `passenger_info`
  ADD CONSTRAINT `pass_ride_form` FOREIGN KEY (`passenger_id`) REFERENCES `ride_form` (`pass_id`);

--
-- Constraints for table `profile_user`
--
ALTER TABLE `profile_user`
  ADD CONSTRAINT `account_user_profile` FOREIGN KEY (`account_user_id`) REFERENCES `account_user` (`account_id`);

--
-- Constraints for table `rider_info`
--
ALTER TABLE `rider_info`
  ADD CONSTRAINT `rider_info_ibfk_1` FOREIGN KEY (`rider_id`) REFERENCES `ride_info` (`rider_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
