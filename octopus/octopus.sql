-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 28 2024 г., 09:04
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `octopus`
--

-- --------------------------------------------------------

--
-- Структура таблицы `presents`
--

CREATE TABLE `presents` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int NOT NULL,
  `id_status` int NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `views` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `presents`
--

INSERT INTO `presents` (`id`, `title`, `text`, `id_user`, `id_status`, `img`, `date`, `views`) VALUES
(1, 'Рубль укрепился к доллару и юаню', '<p><p>\n</p>МОСКВА, 1 дек — РИА Новости. Рубль начал первые торги зимы с укрепления к доллару и юаню, следует из данных Московской биржи.<p>\n</p>Курс доллара расчетами \"завтра\" на 7.02 мск снизился на 12 копеек, до 89,33 рубля.<p>\n</p>Юань подешевел лишь на одну копейку и стал стоить 12,48 рубля.<p>\n</p>Сделок с евро пока сделок не было.</p>', 1, 2, '6569615d3d2ca.webp', '2023-12-01 07:30:21', 10),
(2, 'Бразилия присоединится к сотрудничеству с ОПЕК+ в январе', '<p><p>\n</p>МОСКВА, 30 ноя - РИА Новости. Бразилия присоединится к сотрудничеству с ОПЕК+ в январе 2024 года, следует из официального коммюнике альянса.<p>\n</p>\"Участники встречи приветствовали Александра Сильвейру, министра горнорудной промышленности и энергетики Федеративной Республики Бразилия, которая присоединится к Хартии сотрудничества ОПЕК+ с января 2024 года\", — говорится в сообщении.</p>', 2, 2, '6569620d6ed93.webp', '2023-12-01 07:33:17', 24),
(3, 'Как отдыхаем в декабре-2023: праздники, выходные, норма рабочего времени', '<p><p>\n</p>МОСКВА, 15 ноя - РИА Новости. Декабрь — зимний месяц, в котором граждане России активно готовятся к встрече Нового года, но, в отличии от января, в нем нет праздничных дней, только традиционные выходные: субботы и воскресенья. Производственный календарь на декабрь-2023, выгодно ли брать отпуск в этом месяце, — в материале РИА Новости.<p>\n</p><p>\n</p>Как отдыхаем в декабре 2023<p>\n</p>Декабрь — один из немногих месяцев в году, в котором нет ни одного праздничного выходного дня, поэтому россияне смогут отдохнуть только по субботам и воскресеньям.<p>\n</p><p>\n</p>Официальные выходные дни<p>\n</p>Всего в этом месяце будет 21 рабочий день и десять выходных: 2-3, 9-10, 16-17, 23-24 и 30-31 декабря.<p>\n</p><p>\n</p>Праздники в России<p>\n</p>Новогодние каникулы начнутся 30 декабря, так как дата выпадает на субботу, и продлятся до 9 января — всего россияне будут отдыхать 10 дней. Предпраздничное 29 число будет обычным рабочим днем, хотя работодатели по своему усмотрению могут сделать его сокращенным.<p>\n</p>В декабре нет общероссийских праздников, которые были бы выходными, но субъекты РФ вправе устанавливать дополнительные нерабочие дни на территории региона. Например, в республике Калмыкия их сразу два: праздник Зул (калмыцкий Новый год, который в 2023 приходится на 7 декабря) и День памяти жертв депортации калмыцкого народа (28 декабря).</p>', 2, 2, '65696267d771b.webp', '2023-12-01 07:34:47', 5),
(4, 'Пример новости', '<p>Примерный текст новости</p>', 1, 1, '6571b3e152816.png', '2023-12-07 15:00:33', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `status`) VALUES
(1, 'Новая'),
(2, 'Подтвержденная'),
(3, 'Отклоненная');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `isAdmin`, `login`, `password`, `email`) VALUES
(1, 1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'example@mail.ru'),
(2, 0, 'user1', '5f4dcc3b5aa765d61d8327deb882cf99', 'user1@mail.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `presents`
--
ALTER TABLE `presents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`,`id_status`),
  ADD KEY `presents_ibfk_2` (`id_status`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `presents`
--
ALTER TABLE `presents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `presents`
--
ALTER TABLE `presents`
  ADD CONSTRAINT `presents_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `presents_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
