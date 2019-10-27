-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 02, 2019 at 12:16 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `doit_advantmebel`
--

-- --------------------------------------------------------

--
-- Table structure for table `advanges`
--

CREATE TABLE `advanges` (
  `id` int(11) NOT NULL,
  `url` text,
  `text` text,
  `title` text,
  `advange_id` int(11) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `multi_domain` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `image` text,
  `admin_options` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advanges`
--

INSERT INTO `advanges` (`id`, `url`, `text`, `title`, `advange_id`, `template`, `type`, `multi_domain`, `created_at`, `updated_at`, `sort`, `image`, `admin_options`) VALUES
(1, NULL, 'Более 10 лет на рынке производства и мебельных услуг', NULL, NULL, NULL, NULL, NULL, '2019-03-26 16:39:42', '2019-03-26 16:39:42', 1, '/storage/ten.png', ''),
(2, NULL, '<span>Представительства во многих регионах России</span>', NULL, NULL, NULL, NULL, NULL, '2019-03-26 16:40:17', '2019-03-26 16:40:17', 2, '/storage/russia.png', ''),
(3, NULL, '<span>Сотрудничество с производителями по всему миру</span>', NULL, NULL, NULL, NULL, NULL, '2019-03-26 16:40:32', '2019-03-26 16:40:32', 3, '/storage/internet.png', ''),
(4, NULL, '<span>Разный ценовой диапазон на любой кошелек</span>', NULL, NULL, NULL, NULL, NULL, '2019-03-26 16:40:50', '2019-03-26 16:40:50', 4, '/storage/wallet.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` int(11) NOT NULL,
  `url` text,
  `text` text,
  `title` text,
  `catalog_id` int(11) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `multi_domain` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `image` text,
  `admin_options` text,
  `is_main` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `url`, `text`, `title`, `catalog_id`, `template`, `type`, `multi_domain`, `created_at`, `updated_at`, `sort`, `image`, `admin_options`, `is_main`) VALUES
(3, 'office_business-class', '\r\nКабинеты, представленные в разделе Econom class, популярны у руководителей, имеющих репутацию людей практичных, требовательных к себе и своим подчиненным. Эти модели отличает износостойкость покрытий, строгость форм и лаконичность дизайна.', 'Кабинеты Business class', 0, NULL, NULL, NULL, '2019-03-26 21:43:52', '2019-03-26 21:57:53', 3, '/storage/office-2.png', '', 1),
(2, 'office_econom-class', '\r\nКабинеты, представленные в разделе Econom class, популярны у руководителей, имеющих репутацию людей практичных, требовательных к себе и своим подчиненным. Эти модели отличает износостойкость покрытий, строгость форм и лаконичность дизайна.', 'Кабинеты Econom class', 0, NULL, NULL, NULL, '2019-03-26 21:41:11', '2019-03-26 21:41:11', 2, '/storage/office-1.png', '', 1),
(4, 'office_first-class', '<p><span>В любом помещении, которое так или иначе играет роль в нашем жизненно процессе, стоит мебель. А ведь её функция выходит далеко за пределы &laquo;быть способным удержать на себе чашку&raquo;, &laquo;быть хранилищем для книг&raquo;, &laquo;держать на себе вазу с цветами, а также весь обеденный сервис с содержимым в полдень&raquo;. Каждая вещь, которая нас окружает, так или иначе влияет на нас самих, действуя через наше восприятие окружающей действительности. Первыми это поняли японцы. Восточные народы вообще очень чувствительны к тонким душевным изменениям. Они первыми осознали, насколько велика роль обстановки в жизни человека, и превратили это взаимодействие окружающей обстановки с человеком в настоящее искусство. То же самое и с пространством, нас окружающем &ndash; оно должно быть гармоничным. Что в офисе, что дома, что на даче. Когда нужно просто что-то купить, можно идти в первый попавшийся магазин офисной мебели в Москве, а когда нужно что-то более серьезное - вы приходите к поставщику. Всегда рады видеть Вас в наших салонах!</span></p>', 'Кабинеты First class', 0, NULL, NULL, NULL, '2019-03-26 21:44:27', '2019-03-26 21:44:27', 4, '/storage/office-3.png', '', 1),
(6, 'office_premium-class', '<p><span>В любом помещении, которое так или иначе играет роль в нашем жизненно процессе, стоит мебель. А ведь её функция выходит далеко за пределы &laquo;быть способным удержать на себе чашку&raquo;, &laquo;быть хранилищем для книг&raquo;, &laquo;держать на себе вазу с цветами, а также весь обеденный сервис с содержимым в полдень&raquo;. Каждая вещь, которая нас окружает, так или иначе влияет на нас самих, действуя через наше восприятие окружающей действительности. Первыми это поняли японцы. Восточные народы вообще очень чувствительны к тонким душевным изменениям. Они первыми осознали, насколько велика роль обстановки в жизни человека, и превратили это взаимодействие окружающей обстановки с человеком в настоящее искусство. То же самое и с пространством, нас окружающем &ndash; оно должно быть гармоничным. Что в офисе, что дома, что на даче. Когда нужно просто что-то купить, можно идти в первый попавшийся магазин офисной мебели в Москве, а когда нужно что-то более серьезное - вы приходите к поставщику. Всегда рады видеть Вас в наших салонах!</span></p>', 'Кабинеты Premium class', 0, NULL, NULL, NULL, '2019-03-26 21:48:27', '2019-03-26 21:48:27', 7, '/storage/office-4.png', '', 1),
(7, 'area-community', '<p>Кабинеты, представленные в разделе Econom class, популярны у руководителей, имеющих репутацию людей практичных, требовательных к себе и своим подчиненным. Эти модели отличает износостойкость покрытий, строгость форм и лаконичность дизайна.</p>', 'Зоны коммуникаций', 0, NULL, NULL, NULL, '2019-03-26 21:53:04', '2019-03-31 18:44:55', 8, '/storage/area-community.png', '', 2),
(8, 'area-visit', '', 'Приемные зоны', 0, NULL, NULL, NULL, '2019-03-26 21:54:22', '2019-03-31 18:45:02', 9, '/storage/area-visit.png', '', 2),
(14, 'panno-wall', '', ' Настенные панно', 8, NULL, NULL, NULL, '2019-03-28 19:43:08', '2019-03-28 19:43:08', 14, '/storage/reseption-1.jpg', '', 0),
(15, 'test', '<p>подкатегория&nbsp;</p>', 'Тестовая подкатегория', 2, NULL, NULL, NULL, '2019-03-28 21:04:03', '2019-03-28 21:04:03', 15, '/storage/reseption-1.jpg', '', 0),
(9, 'area-work', '<p><span>В любом помещении, которое так или иначе играет роль в нашем жизненно процессе, стоит мебель. А ведь её функция выходит далеко за пределы &laquo;быть способным удержать на себе чашку&raquo;, &laquo;быть хранилищем для книг&raquo;, &laquo;держать на себе вазу с цветами, а также весь обеденный сервис с содержимым в полдень&raquo;. Каждая вещь, которая нас окружает, так или иначе влияет на нас самих, действуя через наше восприятие окружающей действительности. Первыми это поняли японцы. Восточные народы вообще очень чувствительны к тонким душевным изменениям. Они первыми осознали, насколько велика роль обстановки в жизни человека, и превратили это взаимодействие окружающей обстановки с человеком в настоящее искусство. То же самое и с пространством, нас окружающем &ndash; оно должно быть гармоничным. Что в офисе, что дома, что на даче. Когда нужно просто что-то купить, можно идти в первый попавшийся магазин офисной мебели в Москве, а когда нужно что-то более серьезное - вы приходите к поставщику. Всегда рады видеть Вас в наших салонах!</span></p>', 'Зоны работы сотрудников', 0, NULL, NULL, NULL, '2019-03-26 21:54:46', '2019-03-31 18:45:13', 10, '/storage/area-work.png', '', 2),
(10, 'area-wait', '<p><span>В любом помещении, которое так или иначе играет роль в нашем жизненно процессе, стоит мебель. А ведь её функция выходит далеко за пределы &laquo;быть способным удержать на себе чашку&raquo;, &laquo;быть хранилищем для книг&raquo;, &laquo;держать на себе вазу с цветами, а также весь обеденный сервис с содержимым в полдень&raquo;. Каждая вещь, которая нас окружает, так или иначе влияет на нас самих, действуя через наше восприятие окружающей действительности. Первыми это поняли японцы. Восточные народы вообще очень чувствительны к тонким душевным изменениям. Они первыми осознали, насколько велика роль обстановки в жизни человека, и превратили это взаимодействие окружающей обстановки с человеком в настоящее искусство. То же самое и с пространством, нас окружающем &ndash; оно должно быть гармоничным. Что в офисе, что дома, что на даче. Когда нужно просто что-то купить, можно идти в первый попавшийся магазин офисной мебели в Москве, а когда нужно что-то более серьезное - вы приходите к поставщику. Всегда рады видеть Вас в наших салонах!</span></p>', 'Зоны ожидания', 0, NULL, NULL, NULL, '2019-03-26 21:55:24', '2019-03-31 18:46:00', 11, '/storage/area-wait.png', '', 2),
(11, 'chair-and-armchair', '<p><span>В любом помещении, которое так или иначе играет роль в нашем жизненно процессе, стоит мебель. А ведь её функция выходит далеко за пределы &laquo;быть способным удержать на себе чашку&raquo;, &laquo;быть хранилищем для книг&raquo;, &laquo;держать на себе вазу с цветами, а также весь обеденный сервис с содержимым в полдень&raquo;. Каждая вещь, которая нас окружает, так или иначе влияет на нас самих, действуя через наше восприятие окружающей действительности. Первыми это поняли японцы. Восточные народы вообще очень чувствительны к тонким душевным изменениям. Они первыми осознали, насколько велика роль обстановки в жизни человека, и превратили это взаимодействие окружающей обстановки с человеком в настоящее искусство. То же самое и с пространством, нас окружающем &ndash; оно должно быть гармоничным. Что в офисе, что дома, что на даче. Когда нужно просто что-то купить, можно идти в первый попавшийся магазин офисной мебели в Москве, а когда нужно что-то более серьезное - вы приходите к поставщику. Всегда рады видеть Вас в наших салонах!</span></p>', 'Стулья и кресла', 0, NULL, NULL, NULL, '2019-03-26 21:55:59', '2019-03-31 18:46:08', 12, '/storage/chair-and-armchair.png', '', 2),
(12, 'office-light', '<p><span>В любом помещении, которое так или иначе играет роль в нашем жизненно процессе, стоит мебель. А ведь её функция выходит далеко за пределы &laquo;быть способным удержать на себе чашку&raquo;, &laquo;быть хранилищем для книг&raquo;, &laquo;держать на себе вазу с цветами, а также весь обеденный сервис с содержимым в полдень&raquo;. Каждая вещь, которая нас окружает, так или иначе влияет на нас самих, действуя через наше восприятие окружающей действительности. Первыми это поняли японцы. Восточные народы вообще очень чувствительны к тонким душевным изменениям. Они первыми осознали, насколько велика роль обстановки в жизни человека, и превратили это взаимодействие окружающей обстановки с человеком в настоящее искусство. То же самое и с пространством, нас окружающем &ndash; оно должно быть гармоничным. Что в офисе, что дома, что на даче. Когда нужно просто что-то купить, можно идти в первый попавшийся магазин офисной мебели в Москве, а когда нужно что-то более серьезное - вы приходите к поставщику. Всегда рады видеть Вас в наших салонах!</span></p>', 'Офисный свет', 0, NULL, NULL, NULL, '2019-03-26 21:56:33', '2019-03-31 18:46:15', 13, '/storage/office-light.png', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `clientcontacts`
--

CREATE TABLE `clientcontacts` (
  `id` int(11) NOT NULL,
  `url` text,
  `text` text,
  `title` text,
  `clientcontact_id` int(11) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `multi_domain` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `phone` text,
  `name` text,
  `form_name` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientcontacts`
--

INSERT INTO `clientcontacts` (`id`, `url`, `text`, `title`, `clientcontact_id`, `template`, `type`, `multi_domain`, `created_at`, `updated_at`, `sort`, `phone`, `name`, `form_name`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-02 16:48:40', '2019-04-02 16:48:40', 1, '+7 (341) 343-2523', 'f', 'Форма Заказать звонок'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-02 16:49:16', '2019-04-02 16:49:16', 2, '+7 (341) 343-2523', 'news', 'Форма Заказать звонок'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-02 16:49:18', '2019-04-02 16:49:18', 3, '+7 (341) 343-2523', 'news', 'Форма Заказать звонок'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-02 19:14:02', '2019-04-02 19:14:02', 4, '+7 (495) 760-3058', 'news', 'Форма Заказать звонок'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-02 19:14:04', '2019-04-02 19:14:04', 5, '+7 (495) 760-3058', 'news', 'Форма Заказать звонок'),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-02 19:17:54', '2019-04-02 19:17:54', 6, '+7 (495) 760-3058', 'news', 'Форма Заказать звонок'),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-02 19:17:56', '2019-04-02 19:17:56', 7, '+7 (495) 760-3058', 'news', 'Форма Заказать звонок'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-02 19:18:45', '2019-04-02 19:18:45', 8, '+7 (333) 333-3333', 'Tatmzyf ', 'Форма Заказать звонок'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-02 19:18:47', '2019-04-02 19:18:47', 9, '+7 (333) 333-3333', 'Tatmzyf ', 'Форма Заказать звонок'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-02 20:03:19', '2019-04-02 20:03:19', 10, '+7 (341) 343-2523', 'catalogs', 'Форма Заказать звонок'),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-02 20:03:21', '2019-04-02 20:03:21', 11, '+7 (341) 343-2523', 'catalogs', 'Форма Заказать звонок');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `url` text,
  `text` text,
  `title` text,
  `contact_id` int(11) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `multi_domain` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `address` text,
  `phone` text,
  `email` text,
  `time` text,
  `note` text,
  `admin_options` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `url`, `text`, `title`, `contact_id`, `template`, `type`, `multi_domain`, `created_at`, `updated_at`, `sort`, `address`, `phone`, `email`, `time`, `note`, `admin_options`) VALUES
(1, NULL, NULL, 'Офис', NULL, NULL, NULL, NULL, NULL, NULL, 1, '123022, Москва, ул. 1905 года, д.7, корп.\"Е\"', '+7 (495) 925-10-25', 'info@profoffice.ru', '\r\n', 'Посещение главного офиса по\r\nпредварительной записи ', NULL),
(2, NULL, NULL, 'Склад', NULL, NULL, NULL, NULL, NULL, '2019-03-25 15:58:32', 2, '141100, Московская обл., г. Щелково, ул.Заречная, д.151 ', '', '', 'Режим работы: пн.-пт. с 10.00 до 19.00&nbsp;<br />Перерыв: с 13.00 до 14.00 (въезд до 18.30)', 'Въезд на склад только на грузовых автомобилях по предварительной записи.&nbsp;<br />Получение товара по оригиналу доверенности.', '');

-- --------------------------------------------------------

--
-- Table structure for table `footer_links`
--

CREATE TABLE `footer_links` (
  `id` int(11) NOT NULL,
  `url` text,
  `text` text,
  `title` text,
  `footer_link_id` int(11) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `multi_domain` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `admin_options` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `footer_links`
--

INSERT INTO `footer_links` (`id`, `url`, `text`, `title`, `footer_link_id`, `template`, `type`, `multi_domain`, `created_at`, `updated_at`, `sort`, `admin_options`) VALUES
(1, 'about', NULL, 'О компании', NULL, NULL, NULL, NULL, '2019-03-31 17:47:25', '2019-03-31 17:47:25', 1, ''),
(2, 'contacts', NULL, 'Контакты', NULL, NULL, NULL, NULL, '2019-03-31 17:47:45', '2019-03-31 17:47:45', 2, ''),
(3, 'news', NULL, 'Новости', NULL, NULL, NULL, NULL, '2019-03-31 17:47:55', '2019-03-31 17:47:55', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `url` text,
  `text` text,
  `title` text,
  `news_id` int(11) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `multi_domain` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `date_at` date DEFAULT NULL,
  `image` text,
  `short_text` text,
  `admin_options` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `url`, `text`, `title`, `news_id`, `template`, `type`, `multi_domain`, `created_at`, `updated_at`, `sort`, `date_at`, `image`, `short_text`, `admin_options`) VALUES
(1, 'news1', '<p>Наш складской ассортимент пополнился креслом для сотрудников.Наш складской ассортимент пополнился креслом для сотрудников.Наш складской ассортимент пополнился креслом для сотрудников.Наш складской ассортимент пополнился креслом для сотрудников.</p>', 'Кресло для сотрудников - Romeo', NULL, NULL, NULL, NULL, '2019-03-27 02:38:08', '2019-03-29 19:16:05', 1, '2019-03-01', '/storage/news-3.jpg', '<p><span>Наш складской ассортимент пополнился креслом для сотрудников.</span></p>', ''),
(2, 'news2', '<p>Наш складской ассортимент пополнился креслом для сотрудников.Наш складской ассортимент пополнился креслом для сотрудников.Наш складской ассортимент пополнился креслом для сотрудников.Наш складской ассортимент пополнился креслом для сотрудников.</p>', 'Кресло для сотрудников - Romeo', NULL, NULL, NULL, NULL, '2019-03-27 02:38:08', '2019-03-29 19:15:48', 1, '2019-03-02', '/storage/news-2.jpg', '<p><span>Наш складской ассортимент пополнился креслом для сотрудников.</span></p>', ''),
(3, 'news3', '<p>Наш складской ассортимент пополнился креслом для сотрудников.Наш складской ассортимент пополнился креслом для сотрудников.Наш складской ассортимент пополнился креслом для сотрудников.Наш складской ассортимент пополнился креслом для сотрудников.</p>', 'Кресло для сотрудников - Romeo', NULL, NULL, NULL, NULL, '2019-03-27 02:38:08', '2019-03-29 19:15:34', 1, '2019-03-03', '/storage/news-1.jpg', '<p><span>Наш складской ассортимент пополнился креслом для сотрудников.</span></p>', ''),
(4, 'news3', '<p>Наш складской ассортимент пополнился креслом для сотрудников.Наш складской ассортимент пополнился креслом для сотрудников.Наш складской ассортимент пополнился креслом для сотрудников.Наш складской ассортимент пополнился креслом для сотрудников.</p>', 'Кресло для сотрудников - Romeo', NULL, NULL, NULL, NULL, '2019-03-27 02:38:08', '2019-03-29 19:15:20', 1, '2019-03-04', '/storage/news-2.jpg', '<p><span>Наш складской ассортимент пополнился креслом для сотрудников.</span></p>', ''),
(5, 'news3', '<p>Наш складской ассортимент пополнился креслом для сотрудников.Наш складской ассортимент пополнился креслом для сотрудников.Наш складской ассортимент пополнился креслом для сотрудников.Наш складской ассортимент пополнился креслом для сотрудников.</p>', 'Кресло для сотрудников - Romeo', NULL, NULL, NULL, NULL, '2019-03-27 02:38:08', '2019-03-29 19:15:07', 1, '2019-03-05', '/storage/news-4.jpg', '<p><span>Наш складской ассортимент пополнился креслом для сотрудников.</span></p>', ''),
(6, 'news3', '<p>Наш складской ассортимент пополнился креслом для сотрудников.Наш складской ассортимент пополнился креслом для сотрудников.Наш складской ассортимент пополнился креслом для сотрудников.Наш складской ассортимент пополнился креслом для сотрудников.</p>', 'Кресло для сотрудников - Romeo', NULL, NULL, NULL, NULL, '2019-03-27 02:38:08', '2019-03-29 19:14:42', 1, '2019-03-06', '/storage/news-3.jpg', '<p><span>Наш складской ассортимент пополнился креслом для сотрудников.</span></p>', ''),
(7, 'news7', '<p>Эта новость тестовая, без картинки&nbsp;</p>', 'Новость дня', NULL, NULL, NULL, NULL, '2019-03-30 20:54:00', '2019-03-30 20:54:00', 7, '2019-03-23', '', '<p>Эта новость тестовая, без картинки&nbsp;</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `url` text,
  `text` text,
  `title` text,
  `option_id` int(11) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `multi_domain` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `logo` text,
  `phone` text,
  `extra_phone` text,
  `email` text,
  `addr` text,
  `recieve_email` text,
  `is_smtp` tinyint(4) NOT NULL DEFAULT '0',
  `email_login` text,
  `email_pass` text,
  `meta` text,
  `metric` text,
  `admin_options` text,
  `addr_map` text,
  `banner_title` text,
  `banner_subtitle` text,
  `banner_btn_text` text,
  `banner_btn_url` text,
  `news_paginator` int(11) DEFAULT NULL,
  `copyright` text,
  `politica` text,
  `email_recipient` text,
  `is_smtp_ssl` tinyint(4) NOT NULL DEFAULT '0',
  `smtp_host` text,
  `smtp_port` text,
  `smtp_login` text,
  `smtp_password` text,
  `smtp_address` text,
  `smtp_name` text,
  `email_show` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `url`, `text`, `title`, `option_id`, `template`, `type`, `multi_domain`, `created_at`, `updated_at`, `sort`, `logo`, `phone`, `extra_phone`, `email`, `addr`, `recieve_email`, `is_smtp`, `email_login`, `email_pass`, `meta`, `metric`, `admin_options`, `addr_map`, `banner_title`, `banner_subtitle`, `banner_btn_text`, `banner_btn_url`, `news_paginator`, `copyright`, `politica`, `email_recipient`, `is_smtp_ssl`, `smtp_host`, `smtp_port`, `smtp_login`, `smtp_password`, `smtp_address`, `smtp_name`, `email_show`) VALUES
(1, 'all', NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-25 11:29:33', '2019-04-02 16:17:05', 1, '/storage/logo.png', '(495) 760-30-58 ', '', 'batagaeva.ta@gmail.com', 'г. Москва, Ленинградский проспект 80', '', 1, '', '', '', '', '', 'Москва, улица 1905 года, 7с1 ', 'СТИЛЬНЫЕ<br>И ДОЛГОВЕЧНЫЕ', 'мебельные решения для компаний любого уровня', 'Перейти в каталог', '/catalogs/office_econom-class', 5, '© Компания «Адвант», 2005 - 2019.', '/storage/instrukciya.docx', 'batagaeva.ta@gmail.com', 1, 'smtp.yandex.ru', '465', 'batagaeva.ta@yandex.ru', 'asusxerox1990', 'batagaeva.ta@yandex.ru', 'Татьяна', 'moscow@advant-mebel.ru');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `url` text,
  `text` text,
  `title` text,
  `page_id` int(11) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `multi_domain` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `is_mainmenu` tinyint(4) NOT NULL DEFAULT '0',
  `admin_options` text,
  `subtitle` text,
  `is_showing_table` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `url`, `text`, `title`, `page_id`, `template`, `type`, `multi_domain`, `created_at`, `updated_at`, `sort`, `is_mainmenu`, `admin_options`, `subtitle`, `is_showing_table`) VALUES
(1, 'about', '<p><span>Восемь десятков и семь лет назад наши отцы образовали на этом континенте новую нацию, зачатую в свободе и верящую в то, что все люди рождены равными. Теперь мы ведем великую Гражданскую войну, подвергающую нашу нацию или любую другую нацию, таким же образом зачатую и исповедующую те же идеалы, испытанию на способность выстоять. </span></p>\r\n<p><span>Мы встречаемся сегодня на великом поле брани этой войны. Встречаемся, чтобы сделать его часть последним пристанищем для тех, кто отдал свою жизнь во имя того, чтобы наша нация смогла выжить. Со всех точек зрения это уместный и совершенно верный шаг. Но в более широком смысле мы не можем посвящать, мы не можем благословлять, мы не можем почитать эту землю. </span></p>\r\n<p><span>Отважные люди, живые и мертвые, сражавшиеся здесь, уже совершили обряд такого посвящения, и не в наших слабых силах что-либо добавить или убавить. Мир едва ли заметит или запомнит надолго то, что мы здесь говорим, но он не сможет забыть того, что они совершили здесь. Скорее, это нам, живущим, следует посвятить себя завершению начатого ими дела, над которым трудились до нас с таким благородством те, кто сражался здесь. </span></p>\r\n<p><span>Скорее, это нам, живущим, следует посвятить себя великой задаче, все еще стоящей перед нами, &mdash; перенять у этих высокочтимых погибших еще большую приверженность тому делу, которому они в полной мере и до конца сохраняли верность, исполниться убежденностью, что они погибли не зря, что наша нация с Божьей помощью возродится в свободе и что власть народа волей народа и для народа не исчезнет с лица Земли</span></p>', 'О компании', 0, NULL, NULL, NULL, '2019-03-25 11:31:07', '2019-04-01 23:38:04', 2, 1, '', '', 0),
(2, 'contacts', '', 'Контакты', 0, NULL, NULL, NULL, '2019-03-25 11:31:41', '2019-04-01 00:41:56', 5, 1, '', '', 0),
(3, 'index', '<p><span>В любом помещении, которое так или иначе играет роль в нашем жизненно процессе, стоит мебель. А ведь её функция выходит далеко за пределы &laquo;быть способным удержать на себе чашку&raquo;, &laquo;быть хранилищем для книг&raquo;, &laquo;держать на себе вазу с цветами, а также весь обеденный сервис с содержимым в полдень&raquo;. Каждая вещь, которая нас окружает, так или иначе влияет на нас самих, действуя через наше восприятие окружающей действительности. </span></p>\r\n<p><span>Первыми это поняли японцы. Восточные народы вообще очень чувствительны к тонким душевным изменениям. Они первыми осознали, насколько велика роль обстановки в жизни человека, и превратили это взаимодействие окружающей обстановки с человеком в настоящее искусство. То же самое и с пространством, нас окружающем &ndash; оно должно быть гармоничным. Что в офисе, что дома, что на даче. Когда нужно просто что-то купить, можно идти в первый попавшийся магазин офисной мебели в Москве, а когда нужно что-то более серьезное - вы приходите к поставщику. </span></p>\r\n<p><span>Всегда рады видеть Вас в наших салонах!</span></p>', 'Компания \"Адвант\" —', 0, NULL, NULL, NULL, '2019-03-25 14:08:03', '2019-04-01 00:42:01', 3, 0, '', 'один из крупнейших поставщиков офисной мебели', 0),
(4, 'news', '', 'Новости', 0, NULL, NULL, NULL, '2019-03-29 17:34:10', '2019-04-01 00:42:05', 4, 0, '', '', 0),
(5, 'catalogs', '', 'Каталог', 0, NULL, NULL, NULL, '2019-03-30 20:32:20', '2019-04-01 00:42:09', 1, 1, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `url` text,
  `text` text,
  `title` text,
  `photo_id` int(11) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `multi_domain` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image` text,
  `admin_options` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `url`, `text`, `title`, `photo_id`, `template`, `type`, `multi_domain`, `created_at`, `updated_at`, `sort`, `product_id`, `image`, `admin_options`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-29 00:58:24', '2019-03-29 00:58:24', 1, 12, '/storage/office-1.png', ''),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-29 00:58:35', '2019-03-29 00:58:35', 2, 12, '/storage/office-2.png', ''),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-29 00:58:45', '2019-03-29 00:58:45', 3, 12, '/storage/office-3.png', ''),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-29 00:58:52', '2019-03-29 00:58:52', 4, 12, '/storage/office-4.png', ''),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-29 11:29:56', '2019-03-29 11:29:56', 9, 12, '/storage/reseption-1.jpg', ''),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-29 11:30:02', '2019-03-29 11:30:02', 10, 12, '/storage/reseption-2.jpg', ''),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-02 00:38:20', '2019-04-02 00:38:20', 11, 1, '/storage/lava-main-1.jpg', ''),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-02 00:39:14', '2019-04-02 00:39:14', 12, 1, '/storage/product-1.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `url` text,
  `text` text,
  `title` text,
  `product_id` int(11) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `multi_domain` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `image` text,
  `description` text,
  `price` text,
  `catalog_id` int(11) DEFAULT NULL,
  `admin_options` text,
  `is_main` int(11) DEFAULT NULL,
  `unit` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `url`, `text`, `title`, `product_id`, `template`, `type`, `multi_domain`, `created_at`, `updated_at`, `sort`, `image`, `description`, `price`, `catalog_id`, `admin_options`, `is_main`, `unit`) VALUES
(1, 'Conte', '<p><span>Описание товара&nbsp;<span>Conte</span></span></p>', 'Conte', NULL, NULL, NULL, NULL, '2019-03-26 23:46:05', '2019-03-26 23:46:05', 1, '/storage/product-1.png', NULL, '6499', 2, '', 1, '€'),
(2, 'Tempio', '<p><span>Описание товара&nbsp;<span>Tempio</span></span></p>', 'Tempio', NULL, NULL, NULL, NULL, '2019-03-26 23:46:29', '2019-03-26 23:46:29', 2, '/storage/product-2.png', NULL, '6499', 2, '', 1, '€'),
(3, 'Forte', '<p><span>Описание товара&nbsp;<span>Forte</span></span></p>', 'Forte', NULL, NULL, NULL, NULL, '2019-03-26 23:46:44', '2019-03-26 23:46:44', 4, '/storage/product-3.png', NULL, '6499', 2, '', 1, '€'),
(4, 'MultipliCEO', '<p><span>Описание товара&nbsp;<span>MultipliCEO</span></span></p>', 'MultipliCEO', NULL, NULL, NULL, NULL, '2019-03-26 23:46:58', '2019-03-26 23:46:58', 12, '/storage/product-4.png', NULL, '6499', 2, '', 1, '€'),
(5, 'Tempio', '<p><span>Описание товара&nbsp;<span>Tempio</span></span></p>', 'Tempio', NULL, NULL, NULL, NULL, '2019-03-26 23:46:29', '2019-03-26 23:46:29', 3, '/storage/product-2.png', NULL, '6499', 2, '', 1, '€'),
(6, 'Conte', '<p><span>Описание товара&nbsp;<span>Conte</span></span></p>', 'Conte', NULL, NULL, NULL, NULL, '2019-03-26 23:46:05', '2019-03-26 23:46:05', 2, '/storage/product-1.png', NULL, '6499', 2, '', 1, '€'),
(7, 'Fasta', '<p>Бла-бла</p>', 'Fasta', NULL, NULL, NULL, NULL, '2019-03-28 20:39:29', '2019-03-28 20:41:24', 7, '/storage/reseption-1.jpg', NULL, '1000', 13, '', NULL, '€'),
(8, 'Luna', '<p>Бла-бла</p>', 'Luna', NULL, NULL, NULL, NULL, '2019-03-28 20:39:54', '2019-03-28 20:41:28', 8, '/storage/reseption-2.jpg', NULL, '1000', 13, '', NULL, '€'),
(9, 'Factory-Light', '<p>Бла-бла</p>', 'Factory Light', NULL, NULL, NULL, NULL, '2019-03-28 20:40:11', '2019-03-28 20:41:48', 9, '/storage/reseption-3.jpg', NULL, '1000', 13, '', NULL, '€'),
(10, 'Extra-Long', '<p>Бла-бла</p>', 'Extra Long', NULL, NULL, NULL, NULL, '2019-03-28 20:40:27', '2019-03-28 20:41:40', 10, '/storage/reseption-4.jpg', NULL, '1000', 13, '', NULL, '€'),
(11, 'Factory-Cotto', '<p>Бла-бла</p>', 'Factory Cotto', NULL, NULL, NULL, NULL, '2019-03-28 20:40:42', '2019-03-28 20:41:53', 11, '/storage/reseption-5.jpg', NULL, '1000', 13, '', NULL, '€'),
(12, 'lava', '<p><span>Кабинет Lava сочетает продуманный стиль и передовые технологии. Все детали кабинета спроектированы так, чтобы вы могли получить максимальную эффективность рабочего пространства. </span></p>\r\n<p><span>Сочетание современных материалов и цветов натуральных пород дерева добавят неповторимый внешний вид вашему офису и будут радовать вас изо дня в день. Функциональное решение для офиса включает два типа письменных столов, широкий ассортимент систем хранения и столов для переговоров.</span></p>', 'Lava', NULL, NULL, NULL, NULL, '2019-03-29 00:47:53', '2019-03-29 01:14:46', 1, '/storage/lava-main-1.jpg', NULL, '2305', 2, '', NULL, '€');

-- --------------------------------------------------------

--
-- Table structure for table `robots`
--

CREATE TABLE `robots` (
  `id` int(11) NOT NULL,
  `url` text,
  `text` text,
  `title` text,
  `robot_id` int(11) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `multi_domain` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `sort` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `seoparams`
--

CREATE TABLE `seoparams` (
  `id` int(11) NOT NULL,
  `url` text,
  `text` text,
  `title` text,
  `seoparam_id` int(11) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `multi_domain` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `page_url` text,
  `description` text,
  `keywords` text,
  `admin_options` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seoparams`
--

INSERT INTO `seoparams` (`id`, `url`, `text`, `title`, `seoparam_id`, `template`, `type`, `multi_domain`, `created_at`, `updated_at`, `sort`, `page_url`, `description`, `keywords`, `admin_options`) VALUES
(1, NULL, '', 'О компании', NULL, NULL, NULL, NULL, '2019-03-25 11:42:00', '2019-03-25 11:42:00', 1, '/about', '', '', ''),
(2, NULL, '', 'Контакты', NULL, NULL, NULL, NULL, '2019-03-25 11:42:19', '2019-03-25 11:42:19', 2, '/contacts', '', '', ''),
(3, NULL, '', 'Главная', NULL, NULL, NULL, NULL, '2019-03-25 14:08:24', '2019-03-25 14:08:24', 3, '/', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advanges`
--
ALTER TABLE `advanges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientcontacts`
--
ALTER TABLE `clientcontacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_links`
--
ALTER TABLE `footer_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `robots`
--
ALTER TABLE `robots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seoparams`
--
ALTER TABLE `seoparams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advanges`
--
ALTER TABLE `advanges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `clientcontacts`
--
ALTER TABLE `clientcontacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `footer_links`
--
ALTER TABLE `footer_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `robots`
--
ALTER TABLE `robots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seoparams`
--
ALTER TABLE `seoparams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
