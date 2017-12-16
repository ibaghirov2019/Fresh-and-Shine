-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Дек 15 2017 г., 19:36
-- Версия сервера: 5.6.35
-- Версия PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phpshop`
--
CREATE DATABASE IF NOT EXISTS `phpshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `phpshop`;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(13, 'Home Cleaning', 1, 1),
(14, 'Office cleaning', 2, 1),
(15, 'Carpet', 3, 1),
(16, 'Pool', 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `price`, `description`, `status`) VALUES
(2, 'Living Room', 13, 1.99, 'Each point of living room is cleaned by the chosen team service. Owner can choose cleaning the whole room service and cleaning things, which belongs to living room, separately. While cleaning, the service will use chemical and very reliable detergents. All dusty places, furniture, frames, tables, chairs and other things will be furbished. The stained sofas, armchairs and curtains will be wiped out. Every glass of windows and mirrors will also be furbished. The service will clean each part of floor with special detergents, and even every lamp of chandelier will be cleaned one-by-one.\r\nWe guarantee that you can rely on us 100% and will like our job. \r\n', 1),
(4, 'Kitchen', 13, 4.99, 'Each point of kitchen is cleaned by the chosen team service. Owner can choose cleaning the whole area service and cleaning things, which belongs to kitchen, separately. While cleaning, the service will use chemical and very reliable detergents. All dusty and dirty places, furniture, frames, glasses of windows and other things will be furbished. The chemical liquid detergents are used for wiping out the stained oven, washstand and technical kitchen things. The service will clean each part of floor with special detergents.\r\nWe guarantee that you can rely on us 100% and will like our job. ', 1),
(6, 'Bathroom', 13, 7.59, 'Each point of bathroom will be cleaned by the chosen team service. Owner can choose cleaning the whole room service and cleaning things, which belongs to bathroom, separately. While cleaning, the service will use chemical and very reliable detergents. Every glass of windows and mirrors will also be furbished. The chemical liquid detergent are used for wiping out the tub, closet and washstand. The service will clean each part of wall upholstery and tiles with special detergents.\r\nWe guarantee that you can rely on us 100% and will like our job. ', 1),
(7, 'Bedroom', 13, 2.59, 'Each point of bedroom is cleaned by the chosen team service. Owner can choose cleaning the whole room service and cleaning things, which belongs to bedroom, separately. While cleaning, the service will use chemical and very reliable detergents. All dusty places, furniture, frames and other things will be furbished. Every glass of windows and mirrors will also be furbished. The service will clean each part of floor with special detergents, and even every lamp of chandelier will be cleaned one-by-one.\r\nWe guarantee that you can rely on us 100% and will like our job. \r\n', 1),
(8, 'Meeting room\r\n', 14, 1.59, 'Each point of meeting room is cleaned by the chosen team service. Owner can choose cleaning the whole room service and cleaning things, which belongs to meeting room, separately. While cleaning, the service will use chemical and very reliable detergents. All dusty places, furniture, frames, every glass of windows and other things will be furbished. The service will clean each part of floor with special detergents, and even every lamp of chandelier will be cleaned one-by-one.\r\nWe guarantee that you can rely on us 100% and will like our job. \r\n', 1),
(9, 'Carpet', 15, 3.49, 'Vanish shampoo for carpets. Spray to remove stains from the carpet Vanish, Vanish powder for dry cleaning carpet and carpet. Active foam Vanish for cleaning carpets.\r\n\r\nWe guarantee that you can rely on us 100% and will like our job. ', 1),
(10, 'Pool', 16, 9.99, 'The pool is cleaned with hydrogen peroxide!\r\nWe guarantee that you can rely on us 100% and will like our job. ', 1),
(11, 'Private room', 14, 2.99, 'Each point of private room is cleaned by the chosen team service. Owner can choose cleaning the whole room service and cleaning things, which belongs to private room, separately. While cleaning, the service will use chemical and very reliable detergents. All dusty places, furniture, frames, tables, chairs and other things will be furbished. The stained sofas, armchairs and curtains will be wiped out. Every glass of windows and mirrors will also be furbished. The service will clean each part of floor with special detergents, and even every lamp of chandelier will be cleaned one-by-one.\r\nWe guarantee that you can rely on us 100% and will like our job. \r\n', 1),
(12, 'Whole office', 14, 0.99, 'Each point of office is cleaned by the chosen team service. Owner can choose cleaning the whole office service and cleaning things, which belongs to the whole office, separately. While cleaning, the service will use chemical and very reliable detergents. All dusty places, furniture, frames, tables, chairs and other things will be furbished. The stained sofas, armchairs and curtains will be wiped out. Every glass of windows and mirrors will also be furbished. The service will clean each part of floor with special detergents, and even every lamp of chandelier will be cleaned one-by-one.\r\nWe guarantee that you can rely on us 100% and will like our job. \r\n', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `user_day` varchar(225) NOT NULL,
  `user_time` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_order`
--

INSERT INTO `product_order` (`id`, `user_name`, `user_phone`, `user_id`, `date`, `products`, `status`, `user_day`, `user_time`) VALUES
(52, 'Test Test', '+994 50 487 34 08', 13, '2017-12-15 18:34:02', '{\"2\":\"100\",\"4\":\"43\"}', 1, '09/01/2007', '09:41');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `address` varchar(60) NOT NULL,
  `mobnumber` varchar(60) NOT NULL,
  `login` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `address`, `mobnumber`, `login`) VALUES
(13, 'Test Test', 'test@gmail.com', 'testtest', '', 'Baki Genclik', '+994 50 487 34 08', 'test');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
