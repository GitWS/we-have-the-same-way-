-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 21 2017 г., 15:32
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ws`
--

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `orders`
-- (See below for the actual view)
--
CREATE TABLE `orders` (
`date_go` date
,`time_go` time
,`start` varchar(100)
,`final` varchar(100)
,`money` int(11)
,`name` varchar(45)
,`gender` varchar(45)
,`age` int(11)
,`car` varchar(45)
,`phone` varchar(45)
,`login` varchar(45)
,`comment` varchar(255)
,`type_order` int(11)
,`add_order` timestamp
,`yes_no` int(11)
,`name_pop` varchar(45)
,`phone_pop` varchar(45)
,`id` int(11)
);

-- --------------------------------------------------------

--
-- Структура таблицы `table_order`
--

CREATE TABLE `table_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_user_id` int(11) NOT NULL,
  `order_info_id` int(11) NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type_order` int(11) NOT NULL,
  `add_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `yes_no` int(11) NOT NULL,
  `name_pop` varchar(45) CHARACTER SET utf8 NOT NULL,
  `phone_pop` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

--
-- Дамп данных таблицы `table_order`
--

INSERT INTO `table_order` (`id`, `user_id`, `order_user_id`, `order_info_id`, `comment`, `type_order`, `add_order`, `yes_no`, `name_pop`, `phone_pop`) VALUES
(5, 1, 6, 6, 'Ñ„Ñ‹Ð²Ñ„Ñ‹Ð²Ñ„Ñ‹Ð²Ñ„Ñ‹Ð²', 1, '2017-02-21 12:51:40', 1, 'Ð”Ð°Ð½Ð¸Ð¸Ð»', '+79104219908'),
(6, 1, 7, 7, '22222', 1, '2017-02-21 14:09:58', 0, '', ''),
(7, 2, 8, 8, '', 1, '2017-02-21 14:10:28', 0, '', ''),
(8, 2, 9, 9, '4444', 1, '2017-02-21 14:31:43', 0, '', ''),
(9, 2, 10, 10, 'dsfdsadfdsf', 1, '2017-02-21 14:31:57', 0, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `table_order_info`
--

CREATE TABLE `table_order_info` (
  `id` int(11) NOT NULL,
  `date_go` date NOT NULL,
  `time_go` time NOT NULL,
  `start` varchar(100) CHARACTER SET utf8 NOT NULL,
  `final` varchar(100) CHARACTER SET utf8 NOT NULL,
  `money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

--
-- Дамп данных таблицы `table_order_info`
--

INSERT INTO `table_order_info` (`id`, `date_go`, `time_go`, `start`, `final`, `money`) VALUES
(6, '2017-02-27', '01:57:00', 'Ð¢Ð²ÐµÑ€ÑŒ', 'ÐšÐ¾Ñ€Ð¾Ð»ÐµÐ²', 2000),
(7, '2017-02-24', '00:59:00', '1', '2', 2222),
(8, '2017-02-26', '23:59:00', '22', '22', 22),
(9, '2017-02-26', '00:59:00', '123', '12333', 4444),
(10, '2017-02-24', '23:00:00', '123123', '4444', 1231234);

-- --------------------------------------------------------

--
-- Структура таблицы `table_order_user_info`
--

CREATE TABLE `table_order_user_info` (
  `id` int(11) NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(45) CHARACTER SET utf8 NOT NULL,
  `age` int(11) NOT NULL,
  `car` varchar(45) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

--
-- Дамп данных таблицы `table_order_user_info`
--

INSERT INTO `table_order_user_info` (`id`, `name`, `gender`, `age`, `car`, `phone`) VALUES
(6, 'Ð”Ð°Ð½Ð¸Ð¸Ð»', 'ÐœÑƒÐ¶Ñ‡Ð¸Ð½Ð°', 20, 'Ñ…Ð·', '+79104219908'),
(7, 'Ð”Ð°Ð½Ð¸Ð¸Ð»', 'ÐœÑƒÐ¶Ñ‡Ð¸Ð½Ð°', 20, 'Ñ…Ð·', '+79104219908'),
(8, '123', 'ÐœÑƒÐ¶Ñ‡Ð¸Ð½Ð°', 123, '123', '123'),
(9, '123', 'ÐœÑƒÐ¶Ñ‡Ð¸Ð½Ð°', 123, '123', '123'),
(10, '123', 'ÐœÑƒÐ¶Ñ‡Ð¸Ð½Ð°', 123, '123', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `table_profile`
--

CREATE TABLE `table_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(45) CHARACTER SET utf8 NOT NULL,
  `type` int(11) NOT NULL,
  `gender` varchar(45) CHARACTER SET utf8 NOT NULL,
  `age` int(11) NOT NULL,
  `car` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

--
-- Дамп данных таблицы `table_profile`
--

INSERT INTO `table_profile` (`id`, `name`, `phone`, `type`, `gender`, `age`, `car`) VALUES
(1, 'Ð”Ð°Ð½Ð¸Ð¸Ð»', '+79104219908', 1, 'ÐœÑƒÐ¶Ñ‡Ð¸Ð½Ð°', 20, 'Ñ…Ð·'),
(2, '123', '123', 1, 'ÐœÑƒÐ¶Ñ‡Ð¸Ð½Ð°', 123, '123');

-- --------------------------------------------------------

--
-- Структура таблицы `table_uesr`
--

CREATE TABLE `table_uesr` (
  `id` int(11) NOT NULL,
  `login` varchar(45) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(45) CHARACTER SET utf8 NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

--
-- Дамп данных таблицы `table_uesr`
--

INSERT INTO `table_uesr` (`id`, `login`, `pass`, `profile_id`) VALUES
(1, 'Sony002', '12345', 1),
(2, '123', '123', 2);

-- --------------------------------------------------------

--
-- Структура для представления `orders`
--
DROP TABLE IF EXISTS `orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `orders`  AS  select `info`.`date_go` AS `date_go`,`info`.`time_go` AS `time_go`,`info`.`start` AS `start`,`info`.`final` AS `final`,`info`.`money` AS `money`,`prof`.`name` AS `name`,`prof`.`gender` AS `gender`,`prof`.`age` AS `age`,`prof`.`car` AS `car`,`prof`.`phone` AS `phone`,`users`.`login` AS `login`,`ord`.`comment` AS `comment`,`ord`.`type_order` AS `type_order`,`ord`.`add_order` AS `add_order`,`ord`.`yes_no` AS `yes_no`,`ord`.`name_pop` AS `name_pop`,`ord`.`phone_pop` AS `phone_pop`,`ord`.`id` AS `id` from (((`table_order` `ord` join `table_order_info` `info`) join `table_order_user_info` `prof`) join `table_uesr` `users`) where ((`ord`.`user_id` = `users`.`id`) and (`ord`.`order_user_id` = `prof`.`id`) and (`ord`.`order_info_id` = `info`.`id`)) ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `table_order`
--
ALTER TABLE `table_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_user_id` (`order_user_id`),
  ADD KEY `order_info_id` (`order_info_id`);

--
-- Индексы таблицы `table_order_info`
--
ALTER TABLE `table_order_info`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `table_order_user_info`
--
ALTER TABLE `table_order_user_info`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `table_profile`
--
ALTER TABLE `table_profile`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `table_uesr`
--
ALTER TABLE `table_uesr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `table_order`
--
ALTER TABLE `table_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `table_order_info`
--
ALTER TABLE `table_order_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `table_order_user_info`
--
ALTER TABLE `table_order_user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `table_profile`
--
ALTER TABLE `table_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `table_uesr`
--
ALTER TABLE `table_uesr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `table_order`
--
ALTER TABLE `table_order`
  ADD CONSTRAINT `table_order_ibfk_1` FOREIGN KEY (`order_user_id`) REFERENCES `table_order_user_info` (`id`),
  ADD CONSTRAINT `table_order_ibfk_2` FOREIGN KEY (`order_info_id`) REFERENCES `table_order_info` (`id`),
  ADD CONSTRAINT `table_order_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `table_uesr` (`id`);

--
-- Ограничения внешнего ключа таблицы `table_uesr`
--
ALTER TABLE `table_uesr`
  ADD CONSTRAINT `table_uesr_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `table_profile` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
