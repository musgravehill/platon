-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 30 2012 г., 22:44
-- Версия сервера: 5.0.67
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
  `id` int(11) NOT NULL auto_increment,
  `resource` varchar(200) NOT NULL,
  `action` varchar(200) NOT NULL,
  `name` varchar(300) NOT NULL default 'действие' COMMENT 'для админки:селекторы прав',
  `active` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
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
  `id` int(11) NOT NULL auto_increment,
  `role` varchar(200) NOT NULL COMMENT 'aclCntrlr check by varchar',
  `resource` varchar(200) NOT NULL COMMENT 'aclCntrlr check by varchar',
  `action` varchar(200) NOT NULL COMMENT 'aclCntrlr check by varchar',
  PRIMARY KEY  (`id`),
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
  `id` int(11) NOT NULL auto_increment,
  `resource` varchar(200) NOT NULL,
  `name` varchar(300) NOT NULL default 'контроллер',
  `active` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
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
  `id` int(5) NOT NULL auto_increment,
  `role` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `role` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `acl_role`
--

INSERT INTO `acl_role` (`id`, `role`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `node`
--

CREATE TABLE IF NOT EXISTS `node` (
  `id` int(10) NOT NULL auto_increment,
  `type` varchar(32) NOT NULL default 'page',
  `title` varchar(255) NOT NULL default '',
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL default '',
  `url` varchar(255) default NULL,
  `content` mediumtext,
  `update_on` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Contains the site document tree.' AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `node`
--

INSERT INTO `node` (`id`, `type`, `title`, `keywords`, `description`, `url`, `content`, `update_on`, `deleted`) VALUES
(1, 'page', 'ООО Ярославль-инжиниринг - поставки резинотехнических изделий и талей.', 'keywords0,keywords1', 'ООО Ярославль-инжиниринг - конструкторские работы, комплектация, поставки резинотехнических изделий, стыковка (вулканизация) лент.', 'hella.html', '<h1>ООО "Ярославль-инжиниринг"</h1>\r\n<div class="post">\r\n<p>Основными направлениями деятельности ООО "Ярославль-Инжиниринг" являются:  поставки резинотехнических изделий  (пластины, ремни, транспортерные ленты и др.), а так же сопутствующих им товаров (механические соединения, клеи) . Оказываем услуги по стыковке (вулканизации) лент. А так же поставляем различное грузоподъемное оборудование (тали, лебедки).\r\n     </p>\r\n<p>География поставок включает регионы: Костромская, Владимирская, Вологодская, Кировская, Калужская области. Являемся участниками ВЭД, в том числе поставки в Казахстан и Беларуссию.  \r\n     </p>\r\n<p>Есть возможность комплектации заявок<a href="contacts.html"> по телефону, электронной почте.</a>\r\n     </p>\r\n<p>Вы всегда можете рассчитывать на техническую консультацию наших квалифицированных специалистов, которые помогут Вам не ошибиться в выборе, нужной именно Вам, продукции. Также наш каталог продукции  постоянно пополняется новыми позициями по желанию заказчика, основной ассортимент продукции в наличии. \r\n       </p>\r\n<p>Для постоянных клиентов предусмотрена гибкая система скидок, цены от завода-производителя,  работа по льготным договорам, консультационные услуги. Успешно работает система предварительных заявок на резинотехнические изделия и грузоподъемное оборудование. У нас Вы можете купить нестандартные изделия.\r\n   </p>\r\n<p>Работаем с ведущими произвоизводственно-промышленными предприятиями России.  </p>\r\n</div>', '2012-05-29 00:00:00', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `node_tags`
--

CREATE TABLE IF NOT EXISTS `node_tags` (
  `id` int(11) NOT NULL auto_increment,
  `node_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `node_tags`
--

INSERT INTO `node_tags` (`id`, `node_id`, `tag_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL auto_increment,
  `tag_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `tag_name`) VALUES
(1, 'вконтакте'),
(2, 'СМО');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(32) NOT NULL default 'manager' COMMENT 'aclCntrlr check by varchar',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'platon', 'c93d3bf7a7c4afe94b64e30c2ce39f4f', 'admin');
