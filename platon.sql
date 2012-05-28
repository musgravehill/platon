-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 27 2012 г., 14:37
-- Версия сервера: 5.1.50
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `platon`
--

-- --------------------------------------------------------

--
-- Структура таблицы `acl_action`
--

CREATE TABLE IF NOT EXISTS `acl_action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resource` varchar(200) NOT NULL,
  `action` varchar(200) NOT NULL,
  `name` varchar(300) NOT NULL DEFAULT 'действие' COMMENT 'для админки:селекторы прав',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `resource_id` (`resource`,`action`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `acl_action`
--

INSERT INTO `acl_action` (`id`, `resource`, `action`, `name`, `active`) VALUES
(1, 'index', 'index', 'точка входа', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `acl_allow`
--

CREATE TABLE IF NOT EXISTS `acl_allow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(200) NOT NULL COMMENT 'aclCntrlr check by varchar',
  `resource` varchar(200) NOT NULL COMMENT 'aclCntrlr check by varchar',
  `action` varchar(200) NOT NULL COMMENT 'aclCntrlr check by varchar',
  PRIMARY KEY (`id`),
  UNIQUE KEY `role` (`role`,`resource`,`action`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `acl_allow`
--

INSERT INTO `acl_allow` (`id`, `role`, `resource`, `action`) VALUES
(1, 'admin', 'index', 'index');

-- --------------------------------------------------------

--
-- Структура таблицы `acl_resource`
--

CREATE TABLE IF NOT EXISTS `acl_resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resource` varchar(200) NOT NULL,
  `name` varchar(300) NOT NULL DEFAULT 'контроллер',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `resource` (`resource`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `acl_resource`
--

INSERT INTO `acl_resource` (`id`, `resource`, `name`, `active`) VALUES
(1, 'index', 'базовый контроллер', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `acl_role`
--

CREATE TABLE IF NOT EXISTS `acl_role` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `role` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `acl_role`
--

INSERT INTO `acl_role` (`id`, `role`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `category`
--


-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) DEFAULT '',
  `content` mediumtext,
  `update_on` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Contains the site document tree.' AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `title`, `keywords`, `description`, `alias`, `content`, `update_on`, `deleted`) VALUES
(1, 'ООО Ярославль-инжиниринг - поставки резинотехнических изделий и талей.', '', 'ООО Ярославль-инжиниринг - конструкторские работы, комплектация, поставки резинотехнических изделий, стыковка (вулканизация) лент.', 'index.html', '<h1>ООО "Ярославль-инжиниринг"</h1>\r\n<div class="post">\r\n<p>Основными направлениями деятельности ООО "Ярославль-Инжиниринг" являются:  поставки резинотехнических изделий  (пластины, ремни, транспортерные ленты и др.), а так же сопутствующих им товаров (механические соединения, клеи) . Оказываем услуги по стыковке (вулканизации) лент. А так же поставляем различное грузоподъемное оборудование (тали, лебедки).\r\n     </p>\r\n<p>География поставок включает регионы: Костромская, Владимирская, Вологодская, Кировская, Калужская области. Являемся участниками ВЭД, в том числе поставки в Казахстан и Беларуссию.  \r\n     </p>\r\n<p>Есть возможность комплектации заявок<a href="contacts.html"> по телефону, электронной почте.</a>\r\n     </p>\r\n<p>Вы всегда можете рассчитывать на техническую консультацию наших квалифицированных специалистов, которые помогут Вам не ошибиться в выборе, нужной именно Вам, продукции. Также наш каталог продукции  постоянно пополняется новыми позициями по желанию заказчика, основной ассортимент продукции в наличии. \r\n       </p>\r\n<p>Для постоянных клиентов предусмотрена гибкая система скидок, цены от завода-производителя,  работа по льготным договорам, консультационные услуги. Успешно работает система предварительных заявок на резинотехнические изделия и грузоподъемное оборудование. У нас Вы можете купить нестандартные изделия.\r\n   </p>\r\n<p>Работаем с ведущими произвоизводственно-промышленными предприятиями России.  </p>\r\n</div>', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `page_tags`
--

CREATE TABLE IF NOT EXISTS `page_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `page_tags`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tags`
--


-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(32) NOT NULL DEFAULT 'manager' COMMENT 'aclCntrlr check by varchar',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'platon', 'c93d3bf7a7c4afe94b64e30c2ce39f4f', 'admin');
