-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 26 2017 г., 18:37
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `archi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  `login` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) NOT NULL,
  `superadmin` int(11) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`name`, `id`, `login`, `password`, `superadmin`, `email`) VALUES
('Admin', 5, 'localhost', 'AzRlruZczXeWTjaMWnKmGKFNWvztfrTfRvU6si9jmRg=', NULL, 'rusya.khalmatov@gmail.com'),
('Rustam', 344, 'rusya', 'AzRlruZczXeWTjaMWnKmGKFNWvztfrTfRvU6si9jmRg=', NULL, ''),
('SuperAdmin', 347, 'super-admin', 'S+85zPHvKMBKQb1KH8uDEDiIB31r3aNMIBHFnC8CTuY=', 1, ''),
('Timur', 351, 'tima763', '/snUl3/qNT9Ji2N6xLKGESxuW9euOZnrJT4gPknqwTA=', 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `img`
--

CREATE TABLE `img` (
  `id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `img_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `img`
--

INSERT INTO `img` (`id`, `img_id`, `img_name`) VALUES
(1, 1, '20604649_2201423760186396_3613963230034754544_n.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `ips`
--

CREATE TABLE `ips` (
  `ip_id` int(12) NOT NULL,
  `ip_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `ips`
--

INSERT INTO `ips` (`ip_id`, `ip_address`) VALUES
(4, '::1');

-- --------------------------------------------------------

--
-- Структура таблицы `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `superadmin`
--

INSERT INTO `superadmin` (`id`, `name`, `login`, `password`) VALUES
(1, 'Super User', 'super-user', 'FqS9c/Mp3/FD9LaN65Dri564BqCl/esjlBbq9BBanrg=');

-- --------------------------------------------------------

--
-- Структура таблицы `text`
--

CREATE TABLE `text` (
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `text`
--

INSERT INTO `text` (`text`) VALUES
('Lorem Ipsum - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Структура таблицы `visits`
--

CREATE TABLE `visits` (
  `visit_id` int(12) NOT NULL,
  `date` date NOT NULL,
  `hosts` int(12) NOT NULL,
  `views` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `visits`
--

INSERT INTO `visits` (`visit_id`, `date`, `hosts`, `views`) VALUES
(1, '2017-08-31', 1, 4),
(2, '2017-09-01', 1, 3),
(3, '2017-09-05', 1, 3),
(4, '2017-09-24', 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`,`login`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`img_id`);

--
-- Индексы таблицы `ips`
--
ALTER TABLE `ips`
  ADD PRIMARY KEY (`ip_id`);

--
-- Индексы таблицы `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`visit_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;
--
-- AUTO_INCREMENT для таблицы `img`
--
ALTER TABLE `img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `ips`
--
ALTER TABLE `ips`
  MODIFY `ip_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `visits`
--
ALTER TABLE `visits`
  MODIFY `visit_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
