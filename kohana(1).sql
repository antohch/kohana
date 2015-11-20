-- phpMyAdmin SQL Dump
-- version 4.0.10.11
-- http://www.phpmyadmin.net
--
-- Хост: phpmyadmin
-- Время создания: Ноя 20 2015 г., 15:59
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `kohana`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categoris`
--

CREATE TABLE IF NOT EXISTS `categoris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `categoris`
--

INSERT INTO `categoris` (`id`, `title`) VALUES
(1, 'Категория 1'),
(2, 'Категория 2'),
(3, 'Категория 3'),
(4, 'Категория 5');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `text`) VALUES
(1, 1, 'Комент 1'),
(2, 1, 'Комент 2');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `product_id`, `name`) VALUES
(3, 2, '313362935115312318.jpg'),
(4, 3, '17519271818148514.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `intro` text NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `intro`, `content`, `date`) VALUES
(1, 'Новость 1', 'Здравствуйте. Если вы попали на этот сайта', 'Фреймворк — это каркас сайта, который позволяет ускорить процесс разработки, т.е. не писать какие-то повторяющиеся участки из проекта в проект, а сделать основной упор именно на логике. Если вы достаточно давно занимаетесь веб-разработкой, то у вас определенно есть какие-то готовые классы или функции, которые вы используете в своих проектах. Такой вот набор готовых к использованию библиотек — это по сути и есть фреймворк. Но любой разработчик, с ростом опыта, приходит к выводу, что его старый код (фреймворк) никуда не годится и его надо переделывать. Так почему не использовать сразу уже готовый фреймворк', '2007-09-20'),
(4, 'Новость 2', 'Kohana — это веб-фреймворк с открытым кодом', 'Kohana — это веб-фреймворк с открытым кодом', '2015-09-07'),
(5, 'Новость 3', 'Высокая скорость работы', 'Для того, чтобы уметь работать с фреймворком, нужно понимать его структуру ну и конечно знать его классы и методы. Собственно этому и посвящен данный сайт. Совершенно необходимо, чтобы вы знали PHP на уровне ООП (хотя бы начальном), а также понимали что такое MVC', '2015-09-08'),
(9, 'Моя первая новость', 'Краткое описание моей первой новости', 'Полный текст моей первой новости. Полный текст моей первой новостиПолный текст моей первой новостиПолный текст моей первой новостиПолный текст моей первой новости', '2015-09-08');

-- --------------------------------------------------------

--
-- Структура таблицы `productc_categoris`
--

CREATE TABLE IF NOT EXISTS `productc_categoris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `productc_categoris`
--

INSERT INTO `productc_categoris` (`id`, `product_id`, `category_id`) VALUES
(5, 4, 1),
(6, 4, 2),
(7, 4, 3),
(8, 4, 4),
(9, 5, 1),
(10, 5, 2),
(12, 6, 1),
(13, 1, 0),
(15, 2, 1),
(16, 3, 1),
(17, 3, 1),
(18, 3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `cost` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `cat_id`, `title`, `description`, `cost`, `status`) VALUES
(1, 0, 'Продукт1', 'Описание продукты', 100, 1),
(2, 1, 'Продукт 2', 'Описание продукты2', 200, 1),
(3, 1, 'Продукт 3', 'Описание', 100, 1),
(4, 0, 'sdfsdf', 'sdf', 333, 0),
(5, 1, 'Проверка категорий', 'Проверка категорийПроверка категорийПроверка категорий', 11, 0),
(6, 1, 'php', 'Книга по Php', 500, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'login', 'Login privileges, granted after account confirmation'),
(2, 'admin', 'Administrative user, has access to everything.');

-- --------------------------------------------------------

--
-- Структура таблицы `roles_users`
--

CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles_users`
--

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(1, 1),
(5, 1),
(6, 1),
(8, 1),
(11, 1),
(11, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(254) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `first_name` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `first_name`, `password`, `logins`, `last_login`) VALUES
(1, 'comradeanton@mail.ru', 'user', 'sdfsdfsdfsdfsd', 'fba7580322a64329aa7e2669661085c7c7bc98ebcfe0c76bc517ae8f3027da47', 5, 1447594926),
(5, 'comradeanton@mail.ruff', 'user34', 'пользователь3', 'fba7580322a64329aa7e2669661085c7c7bc98ebcfe0c76bc517ae8f3027da47', 0, NULL),
(6, 'koly@mail.ru', 'user34ee', 'Коля', 'fba7580322a64329aa7e2669661085c7c7bc98ebcfe0c76bc517ae8f3027da47', 0, NULL),
(8, 'vasy@mail.ru', 'user34ddddd', 'Вася', 'fba7580322a64329aa7e2669661085c7c7bc98ebcfe0c76bc517ae8f3027da47', 0, NULL),
(11, 'admin@admin.ru', 'admin', 'admin', 'fba7580322a64329aa7e2669661085c7c7bc98ebcfe0c76bc517ae8f3027da47', 8, 1448011608);

-- --------------------------------------------------------

--
-- Структура таблицы `user_tokens`
--

CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`),
  KEY `expires` (`expires`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `user_tokens`
--

INSERT INTO `user_tokens` (`id`, `user_id`, `user_agent`, `token`, `type`, `created`, `expires`) VALUES
(5, 11, '717526caf42345fe22734c50c2a50ff24c50e473', 'fc8195e687fbca7fd117ca8a28f2677dfe05b2ea', '', 1447765057, 1448974657);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
