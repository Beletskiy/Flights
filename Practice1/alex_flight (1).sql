-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 11 2015 г., 09:22
-- Версия сервера: 5.5.39
-- Версия PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `alex_flight`
--

-- --------------------------------------------------------

--
-- Структура таблицы `flights`
--

CREATE TABLE IF NOT EXISTS `flights` (
`id` int(11) NOT NULL,
  `route` varchar(64) NOT NULL,
  `cost_base` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `flights`
--

INSERT INTO `flights` (`id`, `route`, `cost_base`) VALUES
(1, 'Киев-Харьков', 600),
(2, 'Киев-Донецк', 700),
(3, 'Киев-Одесса', 800),
(4, 'Киев-Симферополь', 900);

-- --------------------------------------------------------

--
-- Структура таблицы `passengers`
--

CREATE TABLE IF NOT EXISTS `passengers` (
`id` int(11) NOT NULL,
  `snp` varchar(64) NOT NULL,
  `telephone_numb` varchar(32) NOT NULL,
  `age` int(11) NOT NULL,
  `baggage_weight` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=126 ;

--
-- Дамп данных таблицы `passengers`
--

INSERT INTO `passengers` (`id`, `snp`, `telephone_numb`, `age`, `baggage_weight`) VALUES
(69, 'erere', 'eereere', 5, 34),
(70, 'Alex Bell', '45455', 67, 56),
(71, 'EEE', '343-434-3434', 45, 45),
(72, 'ABC', '454-554-5454', 45, 60),
(73, 'qwqw', '343-434-3434', 34, 5),
(74, 'erer', '343-434-3434', 7, 5),
(75, 'цуцуцу', '232-323-2323', 45, 2),
(76, 'уку', '434-343-4343', 4, 4),
(77, 'Алексей ', '232-323-2354', 35, 3),
(78, 'asas', '345-464-6464', 67, 3),
(79, 'ererrr', '546-565-6565', 66, 3),
(80, 'AA dfdf ddfd', '343-434-3434', 45, 123),
(81, 'Asds edfedf', '343-434-3434', 20, 4),
(82, 'asasa', '434-343-4343', 20, 2),
(83, 'asasasa df d', '787-878-7878', 23, 3),
(84, 'dsd', '545-454-5455', 4, 6),
(85, 'puper', '093-000-0001', 18, 1400),
(86, 'puper', '093-000-0001', 18, 100),
(87, '4545', '545-454-4___', 4, 5),
(88, 'Фывфы', '343-443-4343', 67, 45),
(89, 'Алексей ', '343-443-4343', 6, 4),
(90, 'Алексей ', '343-443-4343', 67, 4),
(91, 'Алексей 1', '343-443-4343', 33, 5),
(92, 'Алексей 1', '343-443-4343', 33, 5),
(93, 'Алексей 1', '343-443-4343', 33, 5),
(94, 'Алексей 1', '343-443-4343', 33, 5),
(95, 'Алексей 1', '343-443-4343', 33, 5),
(96, 'Алексей 1', '343-443-4343', 33, 5),
(97, 'Алекс', '343-443-4343', 3, 50),
(98, 'Алекс', '343-443-4343', 3, 50),
(99, 'Алекс', '343-443-4343', 3, 50),
(100, 'Алекс', '343-443-4343', 3, 50),
(101, 'Алек', '343-443-4343', 56, 50),
(102, 'Алек', '343-443-4343', 5, 5),
(103, 'Алек', '343-443-4343', 5, 5),
(104, 'Алек', '343-443-4343', 59, 5),
(105, 'Алек', '343-443-4343', 5, 5),
(106, 'Алек', '343-443-4343', 5, 5),
(107, 'Алек', '343-443-4343', 5, 5),
(108, 'Алек', '343-443-4343', 5, 5),
(109, 'Алек', '343-443-4343', 5, 5),
(110, 'Алек', '343-443-4343', 5, 5),
(111, 'Алек', '343-443-4343', 5, 5),
(112, 'Алек', '343-443-4343', 5, 5),
(113, 'Алек', '343-443-4343', 5, 5),
(114, 'Алек', '343-443-4343', 5, 5),
(115, 'sdsd', '556-565-6565', 5, 2),
(116, 'sdsd', '556-565-6565', 45, 2),
(117, 'Петр Алексеевич', '454-545-4545', 40, 10),
(118, 'Петр Алексеевич', '454-545-4545', 4, 1),
(119, 'Петр Алексеевич', '454-545-4545', 4, 1),
(120, 'Петр Алексеевич', '454-545-4545', 4, 1),
(121, 'Петр Алексеевич', '454-545-4545', 4, 1),
(122, 'Андрей', '555-555-5555', 67, 4),
(123, 'Андрей', '555-555-5555', 67, 4),
(124, 'wewe', '354-545-4545', 65, 4),
(125, 'rtrtr', '565-656-5656', 45, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `place`
--

CREATE TABLE IF NOT EXISTS `place` (
`id` int(11) NOT NULL,
  `class` enum('1','2','3','') NOT NULL,
  `seat_num` tinyint(4) NOT NULL,
  `free` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Дамп данных таблицы `place`
--

INSERT INTO `place` (`id`, `class`, `seat_num`, `free`) VALUES
(4, '2', 15, 0),
(5, '1', 3, 0),
(6, '3', 35, 0),
(7, '3', 35, 0),
(8, '1', 3, 0),
(9, '2', 6, 0),
(10, '1', 1, 0),
(11, '3', 16, 0),
(12, '1', 4, 0),
(13, '1', 1, 0),
(14, '1', 3, 0),
(15, '2', 6, 0),
(16, '3', 35, 0),
(17, '1', 4, 0),
(18, '1', 2, 0),
(19, '2', 6, 0),
(20, '1', 3, 0),
(21, '1', 3, 0),
(22, '2', 14, 0),
(23, '1', 1, 0),
(24, '2', 15, 0),
(25, '1', 3, 0),
(26, '2', 11, 0),
(27, '2', 11, 0),
(28, '2', 11, 0),
(29, '2', 11, 0),
(30, '2', 11, 0),
(31, '2', 11, 0),
(32, '2', 11, 0),
(33, '2', 11, 0),
(34, '2', 11, 0),
(35, '2', 11, 0),
(36, '2', 11, 0),
(37, '3', 32, 0),
(38, '3', 32, 0),
(39, '1', 4, 0),
(40, '2', 13, 0),
(41, '2', 13, 0),
(42, '2', 13, 0),
(43, '2', 13, 0),
(44, '2', 13, 0),
(45, '2', 13, 0),
(46, '2', 13, 0),
(47, '2', 13, 0),
(48, '2', 13, 0),
(49, '2', 13, 0),
(50, '3', 35, 0),
(51, '1', 4, 0),
(52, '1', 3, 0),
(53, '3', 30, 0),
(54, '3', 30, 0),
(55, '3', 30, 0),
(56, '3', 30, 0),
(57, '2', 10, 0),
(58, '2', 10, 0),
(59, '3', 35, 0),
(60, '1', 5, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
`id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

--
-- Дамп данных таблицы `tickets`
--

INSERT INTO `tickets` (`id`, `passenger_id`, `flight_id`, `place_id`, `date`, `price`) VALUES
(45, 69, 1, 4, '2015-07-16', 343),
(46, 70, 3, 5, '2015-07-02', 700),
(47, 71, 2, 6, '2015-06-10', 560),
(48, 72, 1, 7, '2015-06-30', 600),
(49, 73, 1, 8, '2015-06-30', 1000),
(50, 74, 1, 9, '2015-06-24', 720),
(51, 75, 1, 10, '2015-06-30', 880),
(52, 76, 1, 11, '2015-06-23', 608),
(53, 77, 1, 12, '2015-06-30', 920),
(54, 78, 3, 13, '2015-06-24', 1120),
(55, 79, 1, 14, '2015-06-24', 920),
(56, 80, 4, 15, '2015-06-24', 5920),
(57, 81, 1, 16, '2015-06-25', 100),
(58, 82, 2, 17, '2015-06-28', 980),
(59, 83, 1, 18, '2015-06-29', 920),
(60, 84, 4, 19, '2015-06-21', 992),
(61, 85, 2, 20, '2015-06-24', 56900),
(62, 86, 2, 21, '2015-06-24', 4200),
(63, 87, 1, 22, '2015-06-09', 720),
(64, 88, 1, 23, '2015-06-30', 2600),
(65, 89, 1, 24, '2015-06-30', 208),
(66, 90, 2, 25, '2015-06-30', 900),
(67, 91, 1, 26, '2015-06-18', 900),
(68, 92, 1, 27, '2015-06-18', 900),
(69, 93, 1, 28, '2015-06-18', 900),
(70, 94, 1, 29, '2015-06-18', 900),
(71, 95, 1, 30, '2015-06-18', 900),
(72, 96, 1, 31, '2015-06-18', 900),
(73, 97, 4, 32, '2015-06-17', 2400),
(74, 98, 4, 33, '2015-06-17', 2400),
(75, 99, 4, 34, '2015-06-17', 2400),
(76, 100, 4, 35, '2015-06-17', 2400),
(77, 101, 2, 36, '2015-06-17', 800),
(78, 102, 3, 37, '2015-06-17', 800),
(79, 103, 3, 38, '2015-06-17', 800),
(80, 104, 1, 39, '2015-06-17', 800),
(81, 105, 3, 40, '2015-06-17', 720),
(82, 106, 3, 41, '2015-06-17', 720),
(83, 107, 3, 42, '2015-06-17', 720),
(84, 108, 3, 43, '2015-06-17', 720),
(85, 109, 3, 44, '2015-06-17', 720),
(86, 110, 3, 45, '2015-06-17', 720),
(87, 111, 3, 46, '2015-06-17', 720),
(88, 112, 3, 47, '2015-06-17', 720),
(89, 113, 3, 48, '2015-06-17', 720),
(90, 114, 3, 49, '2015-06-17', 720),
(91, 115, 3, 50, '2015-06-30', 704),
(92, 116, 3, 51, '2015-06-30', 200),
(93, 117, 1, 52, '2015-06-26', 1200),
(94, 118, 3, 53, '2015-06-26', 672),
(95, 119, 3, 54, '2015-06-26', 672),
(96, 120, 3, 55, '2015-06-26', 672),
(97, 121, 3, 56, '2015-06-26', 672),
(98, 122, 1, 57, '2015-07-31', 860),
(99, 123, 1, 58, '2015-07-31', 860),
(100, 124, 1, 59, '2015-06-30', 760),
(101, 125, 4, 60, '2015-07-30', 1300);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
 ADD PRIMARY KEY (`id`), ADD KEY `class_id` (`class`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
 ADD PRIMARY KEY (`id`), ADD KEY `passenger_id` (`passenger_id`,`flight_id`,`place_id`), ADD KEY `flight_id` (`flight_id`), ADD KEY `class_id` (`place_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tickets`
--
ALTER TABLE `tickets`
ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`passenger_id`) REFERENCES `passengers` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`flight_id`) REFERENCES `flights` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
