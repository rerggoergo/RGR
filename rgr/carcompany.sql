-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 24 2021 г., 15:09
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `carcompany`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) NOT NULL,
  `number` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `engine` varchar(30) NOT NULL,
  `cars_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `number`, `price`, `name`, `engine`, `cars_id`) VALUES
(1, 377, 15000, 'Itali RSX', 'V-Eight', 1),
(2, 122, 13000, 'Itali GTO', 'V-Eight', 2),
(3, 575, 10000, 'Kuruma', 'V-Six', 3),
(4, 341, 15500, 'T20', 'V-Ten', 4),
(5, 613, 25000, 'Infernus', 'V-Eight', 5),
(6, 865, 45000, 'GP1', 'V-Twelve', 6),
(7, 283, 21000, 'Baller LE', 'V-Twelve', 7),
(8, 987, 10000, 'Turismo', 'V-Eight', 8),
(9, 371, 32500, 'Adder', 'V-Eight', 9),
(10, 127, 19000, 'Nero', 'V-Ten', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(64) NOT NULL,
  `role` varchar(30) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `role`, `customers_id`, `password`) VALUES
(0, 'Jack Hock', 'sd@gmail.com', 'Admin', 0, 'jack111'),
(1, 'Isachenko Egor', 'isachenkoegor@gmail.com', 'Client', 1, 'yehor112'),
(2, 'Zavorotniy Alexandr', 'zavorotniyalexandr@gmail.com', 'Client', 2, 'sasha111'),
(3, 'Akopyan Armen', 'akopyanarmen@gmail.com', 'Client', 3, 'armen111'),
(4, 'Tsygankov Misha', 'tsygankovmisha@gmail.com', 'Admin', 4, 'misha111'),
(5, 'Chester Kirill', 'chesterkirill@gmail.com', 'Guest', 5, 'kirill111'),
(6, 'Koval Ivan', 'kovalivan@gmail.com', 'Client', 6, 'ivan111'),
(7, 'Skryaz Andrey', 'skryazandrey@gmail.com', 'Operator', 7, 'andrey111'),
(8, 'Ktoto Tam', 'ktototam@gmail.com', 'Guest', 8, 'tam111'),
(9, 'Optimus Gang', 'optimusgang@gmail.com', 'Client', 9, 'gang111'),
(10, 'Plohoe Imya', 'plohoeimya@gmail.com', 'Operator', 10, 'imya111');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `data` date NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `car_id` bigint(20) NOT NULL,
  `orders_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `data`, `customer_id`, `car_id`, `orders_id`) VALUES
(1, '2021-12-12', 1, 10, 1),
(2, '2021-12-13', 2, 2, 2),
(3, '2021-12-14', 3, 5, 3),
(4, '2021-12-15', 4, 7, 4),
(5, '2021-12-16', 5, 1, 5),
(6, '2021-12-17', 6, 3, 6),
(7, '2021-12-18', 7, 9, 7),
(8, '2021-12-19', 8, 4, 8),
(9, '2021-12-20', 9, 8, 9),
(10, '2021-12-21', 10, 6, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `car_id` bigint(20) NOT NULL,
  `text` text NOT NULL,
  `requests_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id`, `customer_id`, `car_id`, `text`, `requests_id`) VALUES
(1, 1, 10, 'Change color to Red', 1),
(2, 2, 2, 'Change the rims to Implento', 2),
(3, 3, 5, 'Install the rally safety cage', 3),
(4, 4, 7, 'Change the exhaust', 4),
(5, 5, 1, 'New set of winter tyres', 5),
(6, 6, 3, 'Change color to Purple-Black', 6),
(7, 7, 9, 'Install the soundsystem 2.0', 7),
(8, 8, 4, 'Install the new steering wheel', 8),
(9, 9, 8, 'Replace spoiler with a carbon one', 9),
(10, 10, 6, 'Change seat upholstery to Leather', 10);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`,`car_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`,`car_id`),
  ADD KEY `requests_ibfk_1` (`car_id`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`);

--
-- Ограничения внешнего ключа таблицы `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
