-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.187.50
-- Время создания: Июн 25 2025 г., 09:25
-- Версия сервера: 8.0.37-29
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `a1114144_detgrad`
--

-- --------------------------------------------------------

--
-- Структура таблицы `appoints`
--

CREATE TABLE `appoints` (
  `id_appoint` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `child_fname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `child_lname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `child_pname` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_service` int NOT NULL,
  `id_doctor` int DEFAULT NULL,
  `appoint_date` datetime DEFAULT NULL,
  `id_appoint_status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `appoints`
--

INSERT INTO `appoints` (`id_appoint`, `id_user`, `child_fname`, `child_lname`, `child_pname`, `phone_number`, `email`, `id_service`, `id_doctor`, `appoint_date`, `id_appoint_status`) VALUES
(12, 3, 'Никита', 'Трунов', 'Сергеевич', '89635209409', 'trunov.nikita2@gmail.com', 3, NULL, '2025-04-17 13:57:00', 1),
(13, 8, 'h', 'h', 'h', '79662727172626', 'gshah@gmail.com', 3, NULL, NULL, 1),
(14, 9, 'Елена', 'Акулова', 'ВИКТОРОВНА', '+71111111111', 'elena1c@inbox.ru', 9, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `appoint_statuses`
--

CREATE TABLE `appoint_statuses` (
  `id_appoint_status` int NOT NULL,
  `status_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `appoint_statuses`
--

INSERT INTO `appoint_statuses` (`id_appoint_status`, `status_name`) VALUES
(1, 'Ожидает'),
(2, 'Назначена'),
(3, 'Пройдена'),
(4, 'Отменена');

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

CREATE TABLE `doctors` (
  `id_doctor` int NOT NULL,
  `id_speciality` int NOT NULL,
  `fname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `sname` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`id_doctor`, `id_speciality`, `fname`, `lname`, `sname`, `photo`) VALUES
(48, 3, 'Нина', 'Мирошниченко', 'Ивановна', 0x696d672f6465665f6176617461722e6a7067),
(49, 9, 'Людмила', 'Шадрина', 'Анатольевна', 0x696d672f75706c6f6164732f31373439333233333233d0a8d0b0d0b4d180d0b8d0bdd0b02e6a706567),
(50, 10, 'Наталья', 'Юдина', 'Михайловна', 0x696d672f75706c6f6164732f31373439333238343830d0aed0b4d0b8d0bdd0b02e6a706567),
(51, 10, 'Надежда', 'Юровская', 'Васильевна', 0x696d672f75706c6f6164732f31373439333238373438d0aed180d0bed0b2d181d0bad0b0d18f2e6a706567),
(52, 10, 'Оксана', 'Ямщикова', 'Александровна', 0x696d672f75706c6f6164732f31373439333238383734d0afd0bcd189d0b8d0bad0bed0b2d0b02e6a706567),
(53, 9, 'Дмитрий', 'Бандуров', 'Анатольевич', 0x696d672f75706c6f6164732f31373439333233343230d091d0b0d0bdd0b4d183d180d0bed0b22e6a706567),
(54, 3, 'Галина', 'Бугаева', 'Григорьевна', 0x696d672f6465665f6176617461722e6a7067),
(55, 11, 'Валерий', 'Белянов', 'Алексеевич', 0x696d672f6465665f6176617461722e6a7067),
(56, 12, 'Александр', 'Горюнов', 'Алексеевич', 0x696d672f6465665f6176617461722e6a7067),
(57, 3, 'Тамара', 'Ильченко', 'Алексеевна', 0x696d672f6465665f6176617461722e6a7067);

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE `price` (
  `id_price` int NOT NULL,
  `id_service` int NOT NULL,
  `action` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `price`
--

INSERT INTO `price` (`id_price`, `id_service`, `action`, `price`) VALUES
(1, 3, 'Прием (осмотр, консультация) педиатра', 750),
(2, 3, 'Прием (осмотр, консультация) педиатра (повторно)', 650),
(3, 3, 'Справка (профилактический прием: осмотр, консультация) от педиатра', 400),
(4, 3, 'Справка (профилактический прием: осмотр, консультация) в бассейн от педиатра', 380),
(5, 3, 'Справка в спортивную секцию', 450),
(6, 3, 'Прием (осмотр, консультация) педиатра. Оформление карты 026у в детский сад/школу', 900),
(7, 3, 'Прием (осмотр, консультация) педиатра. Справка 086у (педиатр, невролог, хирург, офтальмолог, оториноларинголог, ОАК, ОАМ)', 2700),
(8, 3, 'Санитарно-курортная карта-дети (ОАК, ОАМ, КАТО, ЭКГ, педиатр)', 1600),
(9, 3, 'Заполнение сертификата о прививках (без осмотра ребенка) педиатром', 240),
(11, 3, 'Заполнение сертификата о прививках (с осмотром ребенка) педиатром', 330),
(12, 8, 'Прием (осмотр, консультация) эндокринолога', 800),
(13, 8, 'Прием (осмотр, консультация) эндокринолога (повторно)', 650),
(14, 9, 'Прием (осмотр, консультация) детского кардиолога', 800),
(15, 9, 'Прием (осмотр, консультация) детского кардиолога (повторно)', 650),
(16, 6, 'Прием (осмотр, консультация) детского оториноларинголога', 800),
(17, 6, 'Прием (осмотр, консультация) детского оториноларинголога (повторно)', 650),
(19, 6, 'Прием (осмотр, консультация) детского оториноларинголога (в рамках медицинского осмотра)', 0),
(23, 7, 'Прием (осмотр, консультация)', 800),
(24, 7, 'Прием (осмотр, консультация) (повторно)', 650),
(31, 8, 'Прием (осмотр, консультация) детского офтальмолога (в рамках медицинского осмотра)', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id_role` int NOT NULL,
  `role_name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id_role`, `role_name`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id_service` int NOT NULL,
  `service_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id_service`, `service_name`) VALUES
(3, 'Педиатрия'),
(6, 'Оториноларингология'),
(7, 'Ультразвуковая диагностика'),
(8, 'Офтальмология'),
(9, 'Дерматология');

-- --------------------------------------------------------

--
-- Структура таблицы `speciality`
--

CREATE TABLE `speciality` (
  `id_speciality` int NOT NULL,
  `speciality_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `speciality_description` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `speciality`
--

INSERT INTO `speciality` (`id_speciality`, `speciality_name`, `speciality_description`) VALUES
(3, 'Педиатр', 'Занимается диагностикой, лечением и профилактикой заболеваний у детей от рождения до 18 лет. Педиатр контролирует развитие ребенка, назначает вакцинацию, помогает при острых и хронических заболеваниях.'),
(9, 'Оториноларинголог', 'Занимается диагностикой и лечением заболеваний уха, горла и носа. Он помогает при частых простудах, боли в горле, насморке, нарушениях слуха, тонзиллите, отите, синусите и других ЛОР-заболеваниях. Также проводит профилактические осмотры и консультации, особенно важные для детей и людей с хроническими заболеваниями дыхательных путей.'),
(10, 'Врач ультразвуковой диагностики', 'С помощью ультразвукового оборудования исследует внутренние органы и ткани. Он выявляет патологии на ранней стадии, контролирует динамику заболеваний и оценивает эффективность лечения. УЗИ безопасно и широко применяется в разных областях медицины, включая кардиологию, гинекологию, урологию и педиатрию.'),
(11, 'Офтальмолог', 'Занимается диагностикой, лечением и профилактикой заболеваний органов зрения. Он проводит обследование глаз, проверку остроты зрения, подбирает очки и контактные линзы, лечит воспалительные, инфекционные и хронические заболевания, такие как конъюнктивит, глаукома, катаракта, близорукость и дальнозоркость. '),
(12, 'Дерматолог', 'Занимается диагностикой, лечением и профилактикой заболеваний кожи, волос, ногтей и слизистых оболочек. Он помогает при таких проблемах, как акне, дерматит, псориаз, грибковые инфекции, аллергические высыпания и кожные новообразования. Также проводит осмотры родинок и может направить на дерматоскопию или биопсию при подозрении на опухоли кожи.');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `login` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_role` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `id_role`) VALUES
(3, 'trunov.nikita2@gmail.com', '$2y$10$KRltRpFPhJC.RL4hG74MNOkDCXFdxfWcGVAEw6WSVyP/zzPiRjIay', 2),
(4, 'trunov.nikita1@gmail.com', '$2y$10$V1AKGPe/RwR6rtiHMl4cmORiskh2yxbiWwbU67I5Mk7ckLhIRom1W', 1),
(5, '234@mail.ru', '$2y$10$mHUpibTPJUunosqlzxxA1eOCcCCEuKvM221hS4Gre25enuTiRCvjW', 1),
(6, 'mydishgz@testform.xyz', '$2y$10$91XryoxiYlajB1xz.PhvsuQZo...Zbk25zO/p9WYQ0AvAxJ3sUNrW', 1),
(7, 'trun.nikita2@gmail.com', '$2y$10$zPJ710jWCTXy21VODHZl0.HkabyR9RJwiUP1vRF0WbvrU.G4DQW4e', 1),
(8, 'ja@gmail.com', '$2y$10$no48zaS3xdVupq5zy2YwEu/yXI46fSJBlB/lL5Lnwu21pEXF9Zaq.', 1),
(9, 'elena1c@inbox.ru', '$2y$10$5oQ0tk0NtHCSTcdS6GA58eBMX4aFoIXS/rbXt3I20kURTsGzPoucC', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `appoints`
--
ALTER TABLE `appoints`
  ADD PRIMARY KEY (`id_appoint`),
  ADD KEY `id_service` (`id_service`),
  ADD KEY `id_appoint_status` (`id_appoint_status`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_doctor` (`id_doctor`);

--
-- Индексы таблицы `appoint_statuses`
--
ALTER TABLE `appoint_statuses`
  ADD PRIMARY KEY (`id_appoint_status`);

--
-- Индексы таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id_doctor`),
  ADD KEY `id_speciality` (`id_speciality`);

--
-- Индексы таблицы `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id_price`),
  ADD KEY `id_service` (`id_service`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_service`);

--
-- Индексы таблицы `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`id_speciality`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `appoints`
--
ALTER TABLE `appoints`
  MODIFY `id_appoint` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `appoint_statuses`
--
ALTER TABLE `appoint_statuses`
  MODIFY `id_appoint_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id_doctor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `price`
--
ALTER TABLE `price`
  MODIFY `id_price` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id_service` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `speciality`
--
ALTER TABLE `speciality`
  MODIFY `id_speciality` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `appoints`
--
ALTER TABLE `appoints`
  ADD CONSTRAINT `appoints_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `services` (`id_service`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appoints_ibfk_2` FOREIGN KEY (`id_appoint_status`) REFERENCES `appoint_statuses` (`id_appoint_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appoints_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appoints_ibfk_4` FOREIGN KEY (`id_doctor`) REFERENCES `doctors` (`id_doctor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`id_speciality`) REFERENCES `speciality` (`id_speciality`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `price_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `services` (`id_service`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
