-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2017 at 09:20 AM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `auth` (IN `login` VARCHAR(45) CHARSET cp1251, IN `pass` VARCHAR(20) CHARSET cp1251, OUT `result` INT UNSIGNED)  SET result = (SELECT COUNT(*) FROM account_user WHERE login = account_login AND pass = account_pass)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `regthis` (IN `login` VARCHAR(45), IN `pass` VARCHAR(45), IN `email` VARCHAR(45), IN `phone` VARCHAR(45))  MODIFIES SQL DATA
INSERT INTO account_user (account_login, account_pass, account_email, account_phone)
VALUES (login, pass, email, phone)$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
