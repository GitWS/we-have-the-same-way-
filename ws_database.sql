-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2017 at 09:03 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ws_database`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `auth` (IN `login` VARCHAR(45) CHARSET cp1251, IN `pass` VARCHAR(45) CHARSET cp1251, OUT `result` INT)  NO SQL
IF EXISTS (SELECT * FROM reg_data WHERE reg_login = login AND reg_pass = pass) THEN
SET result = 1;
ELSE
SET result = 0;
END IF$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `create_new_order` (IN `date_time` DATETIME, IN `need_point1` VARCHAR(45) CHARSET cp1251, IN `meet_point1` VARCHAR(45) CHARSET cp1251, IN `ride_price` VARCHAR(45) CHARSET cp1251, IN `ride_comment1` VARCHAR(255) CHARSET cp1251)  NO SQL
INSERT INTO ride_rider_table (date_time_ride, need_point, meet_point, ride_price, ride_comment)
VALUES (date_time, need_point1, meet_point1, ride_price, ride_price)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reg_new` (IN `login` VARCHAR(45) CHARSET cp1251, IN `pass` VARCHAR(45) CHARSET cp1251, IN `reg_type` INT)  NO SQL
IF NOT EXISTS(SELECT * FROM reg_data WHERE reg_login = login AND reg_pass = pass) THEN
INSERT INTO reg_data(reg_login, reg_pass, id_stat_type)
VALUES(login, pass, reg_type);
END IF$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `search_and_create_pass_order` (IN `ride_date_time` DATETIME, IN `need_point1` VARCHAR(45) CHARSET cp1251, IN `meet_point1` VARCHAR(45) CHARSET cp1251, IN `user_login` VARCHAR(45))  NO SQL
IF EXISTS(SELECT * FROM ride_rider_table 
WHERE date_time_ride = ride_date_time AND need_point AND meet_point = meet_point1) THEN
SELECT meet_point AND need_point AND ride_price
FROM ride_rider_table
WHERE date_time_ride = ride_date_time AND need_point = need_point1 AND meet_point = meet_point1;
ELSE
INSERT INTO pass_ride_order(date_time_ride,ride_needpoint_pass,ride_meetpoint_pass, by_pass_created_id)
VALUES
(ride_date_time, need_point1, meet_point1,
(SELECT * FROM reg_data WHERE user_login = reg_login and id_stat_type = 2));
END IF$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pass_ride_order`
--

CREATE TABLE `pass_ride_order` (
  `passenger_id_ride` int(11) NOT NULL,
  `date_time_ride` datetime NOT NULL,
  `ride_needpoint_pass` varchar(45) COLLATE cp1251_bin NOT NULL,
  `ride_meetpoint_pass` varchar(45) COLLATE cp1251_bin NOT NULL,
  `by_pass_created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

-- --------------------------------------------------------

--
-- Table structure for table `profile_pass`
--

CREATE TABLE `profile_pass` (
  `profile_pass_id` int(11) NOT NULL,
  `profile_pass_name` varchar(255) COLLATE cp1251_bin NOT NULL,
  `profile_pass_phone` varchar(15) COLLATE cp1251_bin NOT NULL,
  `reg_data_id_f` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

-- --------------------------------------------------------

--
-- Table structure for table `profile_rider`
--

CREATE TABLE `profile_rider` (
  `profile_rider_id` int(11) NOT NULL,
  `profile_rider_name` varchar(45) COLLATE cp1251_bin NOT NULL,
  `profile_rider_sex` varchar(45) COLLATE cp1251_bin NOT NULL,
  `profile_rider_age` varchar(7) COLLATE cp1251_bin NOT NULL,
  `profile_rider_machine_mark` varchar(45) COLLATE cp1251_bin NOT NULL,
  `profile_rider_phone` varchar(15) COLLATE cp1251_bin NOT NULL,
  `rider_id_reg_data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

--
-- Dumping data for table `profile_rider`
--

INSERT INTO `profile_rider` (`profile_rider_id`, `profile_rider_name`, `profile_rider_sex`, `profile_rider_age`, `profile_rider_machine_mark`, `profile_rider_phone`, `rider_id_reg_data`) VALUES
(1, 'Олег', 'Мужской', '32', 'Mitsubishi Lancer 9A', '79685239963', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reg_data`
--

CREATE TABLE `reg_data` (
  `id_reg_data` int(11) NOT NULL,
  `reg_login` varchar(45) COLLATE cp1251_bin NOT NULL,
  `reg_pass` varchar(45) COLLATE cp1251_bin NOT NULL,
  `id_stat_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

--
-- Dumping data for table `reg_data`
--

INSERT INTO `reg_data` (`id_reg_data`, `reg_login`, `reg_pass`, `id_stat_type`) VALUES
(1, 'login', 'password', 1),
(2, 'login1', 'password', 2),
(3, 'login', 'password', 1),
(4, 'login', 'password', 1),
(6, 'dawdawd', 'dawdadzfdfhfther', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reg_type_table`
--

CREATE TABLE `reg_type_table` (
  `stat_id` int(11) NOT NULL,
  `type_name` varchar(45) COLLATE cp1251_bin NOT NULL,
  `reg_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

--
-- Dumping data for table `reg_type_table`
--

INSERT INTO `reg_type_table` (`stat_id`, `type_name`, `reg_type`) VALUES
(1, 'Водитель', 0),
(2, 'Пассажир', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ride_rider_table`
--

CREATE TABLE `ride_rider_table` (
  `id_ride` int(11) NOT NULL,
  `date_time_ride` datetime NOT NULL,
  `meet_point` varchar(45) COLLATE cp1251_bin NOT NULL,
  `need_point` varchar(45) COLLATE cp1251_bin NOT NULL,
  `creator_id` int(11) NOT NULL,
  `ride_price` varchar(45) COLLATE cp1251_bin NOT NULL,
  `ride_comment` varchar(512) COLLATE cp1251_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pass_ride_order`
--
ALTER TABLE `pass_ride_order`
  ADD PRIMARY KEY (`passenger_id_ride`),
  ADD KEY `by_pass_created_id` (`by_pass_created_id`);

--
-- Indexes for table `profile_pass`
--
ALTER TABLE `profile_pass`
  ADD PRIMARY KEY (`profile_pass_id`),
  ADD KEY `reg_data_id_fk_constraint` (`reg_data_id_f`);

--
-- Indexes for table `profile_rider`
--
ALTER TABLE `profile_rider`
  ADD PRIMARY KEY (`profile_rider_id`),
  ADD KEY `reg_data_id_rider_constraint` (`rider_id_reg_data`);

--
-- Indexes for table `reg_data`
--
ALTER TABLE `reg_data`
  ADD PRIMARY KEY (`id_reg_data`),
  ADD KEY `fk_reg_type` (`id_stat_type`);

--
-- Indexes for table `reg_type_table`
--
ALTER TABLE `reg_type_table`
  ADD PRIMARY KEY (`stat_id`);

--
-- Indexes for table `ride_rider_table`
--
ALTER TABLE `ride_rider_table`
  ADD PRIMARY KEY (`id_ride`),
  ADD KEY `creator_id` (`creator_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pass_ride_order`
--
ALTER TABLE `pass_ride_order`
  MODIFY `passenger_id_ride` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `profile_pass`
--
ALTER TABLE `profile_pass`
  MODIFY `profile_pass_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile_rider`
--
ALTER TABLE `profile_rider`
  MODIFY `profile_rider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reg_data`
--
ALTER TABLE `reg_data`
  MODIFY `id_reg_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `reg_type_table`
--
ALTER TABLE `reg_type_table`
  MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ride_rider_table`
--
ALTER TABLE `ride_rider_table`
  MODIFY `id_ride` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pass_ride_order`
--
ALTER TABLE `pass_ride_order`
  ADD CONSTRAINT `pass_ride_order_ibfk_1` FOREIGN KEY (`by_pass_created_id`) REFERENCES `profile_pass` (`profile_pass_id`);

--
-- Constraints for table `profile_pass`
--
ALTER TABLE `profile_pass`
  ADD CONSTRAINT `reg_data_id_fk_constraint` FOREIGN KEY (`reg_data_id_f`) REFERENCES `reg_data` (`id_reg_data`);

--
-- Constraints for table `profile_rider`
--
ALTER TABLE `profile_rider`
  ADD CONSTRAINT `reg_data_id_rider_constraint` FOREIGN KEY (`rider_id_reg_data`) REFERENCES `reg_data` (`id_reg_data`);

--
-- Constraints for table `reg_data`
--
ALTER TABLE `reg_data`
  ADD CONSTRAINT `fk_reg_type` FOREIGN KEY (`id_stat_type`) REFERENCES `reg_type_table` (`stat_id`);

--
-- Constraints for table `ride_rider_table`
--
ALTER TABLE `ride_rider_table`
  ADD CONSTRAINT `ride_rider_table_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `profile_rider` (`profile_rider_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
