-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 03 2024 г., 17:46
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
-- База данных: `Semena1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `appeals`
--

CREATE TABLE `appeals` (
  `id_appeal` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Нет'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `appeals`
--

INSERT INTO `appeals` (`id_appeal`, `email`, `first_name`, `question`, `answer`) VALUES
(7, 'admin@admin.ru', 'Кирилл', 'help', 'Нет'),
(9, 'vadim@mail.ru', 'Вадим', '321', 'Нет');

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `quantity`, `user_id`) VALUES
(244, 57, 2, 99),
(245, 58, 1, 99),
(246, 60, 1, 99),
(247, 1, 2, 125),
(248, 55, 1, 125),
(249, 60, 1, 125),
(250, 59, 1, 125),
(251, 58, 1, 125),
(252, 56, 4, 125),
(253, 57, 5, 125),
(254, 54, 2, 125),
(255, 61, 2, 99),
(256, 1, 3, 126),
(257, 2, 3, 126),
(258, 3, 4, 126);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `image_id` int NOT NULL,
  `user_id` int NOT NULL,
  `filename` varchar(200) NOT NULL,
  `mime_type` varchar(50) NOT NULL,
  `file_size` int NOT NULL,
  `image_data` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `Tele` varchar(255) DEFAULT NULL,
  `Gorod` varchar(255) DEFAULT NULL,
  `Dex` varchar(255) DEFAULT NULL,
  `Ylica` varchar(255) DEFAULT NULL,
  `Dom` varchar(255) DEFAULT NULL,
  `Kvartira` varchar(255) DEFAULT NULL,
  `Carta` varchar(255) DEFAULT NULL,
  `CBP` varchar(255) DEFAULT NULL,
  `Nal` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `Date` timestamp NULL DEFAULT NULL,
  `SummaCarta` decimal(10,2) DEFAULT NULL,
  `SummaNal` decimal(10,2) DEFAULT NULL,
  `SummaCBP` decimal(10,2) DEFAULT NULL,
  `zakaz` text,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Формируется'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `Tele`, `Gorod`, `Dex`, `Ylica`, `Dom`, `Kvartira`, `Carta`, `CBP`, `Nal`, `first_name`, `last_name`, `Date`, `SummaCarta`, `SummaNal`, `SummaCBP`, `zakaz`, `status`) VALUES
(37, 125, '+7957022664', 'Москва', 'Смоленский', 'Жуково', '25а', '51', NULL, NULL, 'Оплата при получение', 'Вадим', 'Литвинов', '2024-06-29 19:17:33', NULL, '1829.00', NULL, 'Зятёк F1 - Количество: 1\nГармонист - Количество: 1\nБона - Количество: 1\nКрасные бусы - Количество: 1\nсарептская РУССКАЯ - Количество: 1\nУзбекский - Количество: 4\nДачница - Количество: 5\nСибирский бонус - Количество: 2\n', 'В пути'),
(38, 125, '+7957022664', 'Москва', 'Смоленский', 'Жуково', '25а', '51', NULL, 'Оплачено по СБП', NULL, 'Вадим', 'Литвинов', '2024-06-29 19:18:03', NULL, NULL, '1829.00', 'Зятёк F1 - Количество: 1\nГармонист - Количество: 1\nБона - Количество: 1\nКрасные бусы - Количество: 1\nсарептская РУССКАЯ - Количество: 1\nУзбекский - Количество: 4\nДачница - Количество: 5\nСибирский бонус - Количество: 2\n', 'Доставлено'),
(39, 125, '+7957022664', 'Москва', 'Смоленский', 'Жуково', '25а', '51', 'Оплачено картой', NULL, NULL, 'Вадим', 'Литвинов', '2024-06-29 19:33:03', '1929.00', NULL, NULL, 'Зятёк F1 - Количество: 2\nГармонист - Количество: 1\nБона - Количество: 1\nКрасные бусы - Количество: 1\nсарептская РУССКАЯ - Количество: 1\nУзбекский - Количество: 4\nДачница - Количество: 5\nСибирский бонус - Количество: 2\n', 'Формируется'),
(40, 126, '89516996518', 'Смоленск', 'Жуково', 'Мира', '25Б', '51', NULL, 'Оплачено по СБП', NULL, 'Юлия', 'Фомичева', '2024-11-03 14:42:31', NULL, NULL, '845.00', 'Зятёк F1 - Количество: 1\nПузата хата - Количество: 3\nМорковь Славянка - Количество: 2\n', 'В пути');

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `Name` varchar(100) NOT NULL,
  `id` int NOT NULL,
  `Вид` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Группа` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Цикл` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img` text,
  `price` varchar(100) DEFAULT NULL,
  `About` varchar(1000) DEFAULT NULL,
  `Бренд` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`Name`, `id`, `Вид`, `Группа`, `Цикл`, `img`, `price`, `About`, `Бренд`) VALUES
('Зятёк F1', 1, 'Огурец', 'Овощи', 'Однолетник', 'image/zatek.jpg', '100', 'Огурец «Зятек» F1 — раннеспелый высокоурожайный гибрид женского типа цветения, не требует опыления, может выращиваться в открытом и закрытом грунте. Начинает плодоносить на 45-48 сутки от прорастания всходов. Создает 2-4 (максимум — 8) завязи в пазухе листьев. Зеленцы вырастают до 10-12 см, набирают массу до 100 г. Плоды бугристые, темно-зеленые со светлыми полосками, без горечи.', 'Гавриш'),
('Пузата хата', 2, 'Томат', 'Овощи', 'Однолетник', 'https://cdn1.ozone.ru/s3/multimedia-a/c850/6831779842.jpg', '115', 'Пузата хата', 'Агрофирма'),
('Морковь Славянка', 3, 'Морковь', 'Овощи', 'Однолетник', 'https://sadoviycentr.ru/upload/catalog/ru/0_66375400_1638951600.jpg', '200', 'Сорт «Славянка» сочетает в себе отличные внешние качества и превосходный вкус корнеплода. Морковь отличается большим содержанием каротина и сахара. Ее форма коническая, утолщенная. Мякоть плотная, сочная. Длина корнеплода достигает 17 см, вес варьируется от 100 до 250 г. Сорт устойчив к холодам и может быть высеян в апреле, при этом урожай поспеет уже через 70-120 суток.', 'Агрофирма'),
('Русский Гигант', 52, 'Горох', 'Овощи', 'Однолетник', 'https://cdn1.ozone.ru/s3/multimedia-1/c850/6481267369.jpg', '138', 'Среднеспелый сорт, от полных всходов до технической спелости горошка 60-70 дней. Растения высотой 70-80 см, устойчивые к полеганию, с дружным формированием урожая. Бобы длинные (около 9 см), темно-зеленые, с 9-10 горошинами выравненного размера. Принадлежит к группе сортов с семенами мозгового типа. Вкусовые качества такого горошка в фазу молочно-восковой спелости более высокие, чем у обычных гладкозерных сортов. Урожайность горошка высокая – 0,6-1,0 кг/м2. Рекомендуется для использования в свежем виде, для консервирования и замораживания.', 'Аэлита'),
('белокочанная Разносол', 53, 'Капуста', 'Овощи', 'Однолетник', 'https://cdn1.ozone.ru/s3/multimedia-q/c850/6415849094.jpg', '155', 'Среднеспелый (125-145 дней) гибрид, один из лучших для квашения. Розетка до 70 см в диаметре. Кочаны округлые, довольно плотные, с прекрасной внутренней структурой, хрустящие, сахаристые, массой 2,5-3 кг. Вкусовые качества высокие. Ценность гибрида: устойчивость к фузариозу и растрескиванию кочанов, стабильная и очень дружная отдача урожая, исключительная выравненность и отличные качества кочанов. Рекомендуется для квашения, употребления в свежем виде и кулинарной переработки.', 'СеДеК'),
('Сибирский бонус', 54, 'Перец', 'Овощи', 'Однолетник', 'https://cdn1.ozone.ru/multimedia/c850/1017786993.jpg', '98', 'Крупноплодный красивый и урожайный сорт сибирской селекции с плодами редкого апельсинового цвета. Растение высотой до 80 см, с сомкнутой формой куста, скрывающего большое количество завязываемых плодов, в технической спелости совпадающих по цвету с темно-зеленой листвой. Созревая, апельсиново-оранжевые плоды чудесно преображают растение, освещая густую зелень яркими солнечными лучами. На кусте формируется до 15 качественно стандартных крупных кубических плодов массой до 300 г, с толщиной стенки перикарпия до 10 мм. Толстостенные плоды, не содержащие горького вещества капсаицина, имеют выраженный перечный аромат, сладкий вкус и нежную консистенцию, способны хорошо дозариваться, практически не теряя упругости.', 'Сибирский сад'),
('Гармонист', 55, 'Огурец', 'Овощи', 'Однолетник', 'https://cdn1.ozone.ru/s3/multimedia-3/c850/6891055527.jpg', '145', 'Огурец F1 «Гармонист» — скороспелый сорт, отлично растет как в теплице, так и в открытом грунте, не нуждается в опылении и созревает очень быстро. Плодоносит долго и ровно, цветет пучковыми соцветиями по 10-12 штук, завязи растут плотно, что очень удобно при сборе урожая. Первые огурцы появляются на 39-42 сутки, они ровные, длиной 10-12 см, не горчат, хрустящие и сладкие. Плоды можно собирать практически каждый день. Преимущества: долгое плодоношение; устойчивость к болезням бахчевых; прекрасные вкусовые качества.', 'Гавриш'),
('Узбекский', 56, 'Укроп', 'Овощи', 'Однолетник', 'https://cdn1.ozone.ru/s3/multimedia-o/c850/6883619604.jpg', '122', 'укроп Узбекский 243 крупнолистный среднеспелый для салатов для замораживания', 'Аэлита'),
('Дачница', 57, 'Свекла', 'Овощи', 'Однолетник', 'https://cdn1.ozone.ru/s3/multimedia-a/c850/6883228738.jpg', '105', 'Среднеспелый (90-100 дней) сорт. Розетка листьев полураскидистая, с сильной антоциановой окраской. Корнеплоды округлые, гладкие, бордовые, массой 170-350 г, погружены в почву на 2/3. Мякоть темно-красная, без выраженной кольцеватости, однородная, сочная. Урожайность 6,7-7,1 кг/м2. Ценность сорта: устойчивость к церкоспорозу, устойчивость к цветушности, высокая сохранность при зимнем хранении. Рекомендуется для использования в кулинарии, консервирования.', 'СеДеК'),
('сарептская РУССКАЯ', 58, 'Горчица', 'Овощи', 'Однолетник', 'https://cdn1.ozone.ru/s3/multimedia-p/c850/6883215793.jpg', '115', 'Очень полезная скороспелая салатная культура, холодостойкая и неприхотливая. Развивается быстро, дает самую первую витаминную зелень через 14-20 дней после всходов. Высевать можно в самые ранние сроки, как только позволит почва. Формирует крупную розетку с красивыми, нежными и сочными листьями. Обладает приятным горчичным вкусом, содержит практически все необходимые человеку витамины и минералы. Используется в свежем виде в салатах и бутербродах, подходит для соления и консервирования. Отлично растет в горшках на подоконнике и балконе. В фазе двух-трех настоящих листьев всходы прореживают. Для получения качественной зелени в непрерывном режиме проводят повторные посевы с интервалом 2 недели до конца августа.', 'Аэлита'),
('Красные бусы', 59, 'Томат', 'Овощи', 'Однолетник', 'https://cdn1.ozone.ru/s3/multimedia-2/c850/6883727798.jpg', '145', 'Раннеспелый высокоурожайный сорт черри-томата. От всходов до первого сбора плодов 100-105 дней. В средней полосе – для выращивания в пленочных теплицах, в южных регионах – для открытого грунта. Растения индетерминантные, высотой 150-170 см. Плоды массой 10-15 г, собраны в огромные кисти по 50-70 шт в каждой. Томаты плотные, упругие, сладкие, с приятным ароматом. Это отличное лакомство для детей и взрослых, их съедают прямо с куста. Плоды подходят для консервирования и украшения блюд. Сорт хорошо переносит пониженные температуры и плодоносит до середины осени. Урожайность – 8-9 кг/м 2 .', 'Аэлита'),
('Бона', 60, 'Свекла', 'Овощи', 'Однолетник', 'https://cdn1.ozone.ru/s3/multimedia-r/c850/6481266891.jpg', '115', 'Высокопродуктивный сорт свеклы чешской селекции от компании MoravoSeed. Позволяет получить стабильный урожай отличного качества в различных зонах выращивания. Среднеспелый: от появления всходов до созревания проходит не более 120 дней. Корнеплоды округлые и гладкие, средней массой 250-300 г. Мякоть ярко-красная, без кольцеватости, плотная, сочная. Сорт отлично подходит для домашней кулинарии и заготовок. Хорошо хранится, транспортируется, обладает превосходными товарными характеристиками.', 'Аэлита');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `first_name` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `last_name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Tele` varchar(255) DEFAULT NULL,
  `Gorod` varchar(255) DEFAULT NULL,
  `Dex` varchar(255) DEFAULT NULL,
  `Ylica` varchar(255) DEFAULT NULL,
  `Dom` varchar(255) DEFAULT NULL,
  `Kvartira` varchar(255) DEFAULT NULL,
  `Carta` varchar(255) DEFAULT NULL,
  `Data` varchar(255) DEFAULT NULL,
  `CVV` varchar(255) DEFAULT NULL,
  `CBP` varchar(255) DEFAULT NULL,
  `Nal` varchar(255) DEFAULT NULL,
  `Coment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `Tele`, `Gorod`, `Dex`, `Ylica`, `Dom`, `Kvartira`, `Carta`, `Data`, `CVV`, `CBP`, `Nal`, `Coment`) VALUES
(99, '&nbsp', 'Admin', 'admin@admin.ru', '123456@AAaa', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(125, 'Вадим', 'Литвинов', 'vadim@mail.ru', 'Fomichev1873', '+7957022664', 'Москва', 'Смоленский', 'Жуково', '25а', '51', '22222222', '222', '222', 'Оплачено', 'Оплата при получение', NULL),
(126, 'Юлия', 'Фомичева', 'ula@dada', 'Fomichev1873', '89516996518', 'Смоленск', 'Жуково', 'Мира', '25Б', '51', NULL, NULL, NULL, 'Оплачено', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user_cart`
--

CREATE TABLE `user_cart` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `appeals`
--
ALTER TABLE `appeals`
  ADD PRIMARY KEY (`id_appeal`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `appeals`
--
ALTER TABLE `appeals`
  MODIFY `id_appeal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT для таблицы `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
