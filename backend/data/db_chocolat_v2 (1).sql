-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 08 2025 г., 21:49
-- Версия сервера: 9.1.0
-- Версия PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_chocolat_v2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_title` varchar(100) NOT NULL,
  `category_slug` varchar(105) NOT NULL,
  `category_desc` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_slug_UNIQUE` (`category_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `category_title`, `category_slug`, `category_desc`) VALUES
(1, 'Gâteaux', 'gateau', 'Recettes de Gâteaux'),
(2, 'Mousses', 'mousse', 'Recettes de Mousses'),
(3, 'Boissons', 'boisson', 'Recettes de Boissons'),
(4, 'Glacé', 'glace', 'Recettes Glacées');

-- --------------------------------------------------------

--
-- Структура таблицы `category_has_recipes`
--

DROP TABLE IF EXISTS `category_has_recipes`;
CREATE TABLE IF NOT EXISTS `category_has_recipes` (
  `category_category_id` int UNSIGNED NOT NULL,
  `recipes_recipes_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`category_category_id`,`recipes_recipes_id`),
  KEY `fk_category_has_recipes_recipes1_idx` (`recipes_recipes_id`),
  KEY `fk_category_has_recipes_category1_idx` (`category_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `category_has_recipes`
--

INSERT INTO `category_has_recipes` (`category_category_id`, `recipes_recipes_id`) VALUES
(2, 1),
(1, 2),
(1, 3),
(2, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 8),
(1, 9),
(3, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comments_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `comment_sujet` varchar(120) DEFAULT NULL,
  `comment_message` varchar(500) NOT NULL,
  `comment_created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `comment_is_published` tinyint UNSIGNED DEFAULT '0',
  `users_users_id` int UNSIGNED NOT NULL,
  `recipes_recipes_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`comments_id`),
  KEY `fk_comments_users1_idx` (`users_users_id`),
  KEY `fk_comments_recipes1_idx` (`recipes_recipes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `ingredients_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ingredient_name` varchar(100) NOT NULL,
  `ingredient_slug` varchar(105) NOT NULL,
  PRIMARY KEY (`ingredients_id`),
  UNIQUE KEY `ingredient_slug_UNIQUE` (`ingredient_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `ingredients`
--

INSERT INTO `ingredients` (`ingredients_id`, `ingredient_name`, `ingredient_slug`) VALUES
(1, '200g de chocolat noir (70% de cacao), haché', 'chocolat-noir-70-hache'),
(2, '175g de beurre non salé, coupé en cubes', 'beurre-non-sale-cubes'),
(3, '3 gros œufs', '3-gros-oeufs'),
(4, '275g de sucre en poudre', 'sucre-poudre-275'),
(5, '85g de farine tout usage', 'farine-tout-usage-85'),
(6, '40g de cacao en poudre', 'cacao-poudre-40'),
(7, '1 c. à café d\'extrait de vanille', 'extrait-vanille-1cc'),
(8, '½ c. à café de sel', 'sel-demi-cc'),
(9, '200 g de chocolat noir (70 % minimum)', 'chocolat-noir-70-200g'),
(10, '6 œufs frais', '6-oeufs-frais'),
(11, '1 pincée de sel', '1-pincee-sel'),
(12, '(optionnel) un filet de café noir', 'filet-cafe-noir'),
(13, '200 g de chocolat noir', 'chocolat-noir-200'),
(14, '150 g de pâte de noisette', 'pate-noisette-150'),
(15, '100 g de beurre', 'beurre-100'),
(16, '100 g de sucre', 'sucre-100'),
(17, '3 œufs', '3-oeufs'),
(18, '50 g de farine', 'farine-50'),
(19, '120 g de beurre', 'beurre-120'),
(20, '150 g de sucre', 'sucre-150'),
(21, '100 g de farine', 'farine-100'),
(22, '2 oeufs', '2-oeufs'),
(23, '1 c. à s. de cacao', 'cacao-1cs'),
(24, '100 g de sucre en poudre', 'sucre-poudre-100'),
(25, '500 g de mascarpone', 'mascarpone-500'),
(26, '30 biscuits à la cuillère', 'biscuits-cuillere-30'),
(27, '100 g de chocolat noir', 'chocolat-noir-100'),
(28, '300 ml de café', 'cafe-300'),
(29, 'Cacao en poudre', 'cacao-poudre-simple'),
(30, '200g de farine tout usage', 'farine-tout-usage-200'),
(31, '50g de sucre en poudre', 'sucre-poudre-50'),
(32, '50g de beurre fondu', 'beurre-fondu-50'),
(33, '1 œuf', '1-oeuf'),
(34, '500g de ricotta fraîche', 'ricotta-500'),
(35, '100g de sucre glace', 'sucre-glace-100'),
(36, '100g de pépites de chocolat noir', 'pepites-chocolat-100'),
(37, 'Zeste d\'une orange', 'zeste-orange'),
(38, '200g Chocolat au lait', 'chocolat-lait-200'),
(39, '4 Œufs (blancs)', '4-oeufs-blancs'),
(40, '3 Œufs (jaunes)', '3-oeufs-jaunes'),
(41, '40g Sucre', 'sucre-40'),
(42, '30g Beurre', 'beurre-30'),
(43, '200ml Crème liquide', 'creme-liquide-200'),
(44, '100 g de chocolat noir (70%)', 'chocolat-noir-70-100'),
(45, '100 g de beurre doux', 'beurre-doux-100'),
(46, '3 œufs moyens', '3-oeufs-moyens'),
(47, '80 g de sucre en poudre', 'sucre-poudre-80'),
(48, '50 g de farine T55', 'farine-t55-50');

-- --------------------------------------------------------

--
-- Структура таблицы `ingredients_has_recipes`
--

DROP TABLE IF EXISTS `ingredients_has_recipes`;
CREATE TABLE IF NOT EXISTS `ingredients_has_recipes` (
  `ingredients_ingredients_id` int UNSIGNED NOT NULL,
  `recipes_recipes_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`ingredients_ingredients_id`,`recipes_recipes_id`),
  KEY `fk_ingredients_has_recipes_recipes1_idx` (`recipes_recipes_id`),
  KEY `fk_ingredients_has_recipes_ingredients1_idx` (`ingredients_ingredients_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `ingredients_has_recipes`
--

INSERT INTO `ingredients_has_recipes` (`ingredients_ingredients_id`, `recipes_recipes_id`) VALUES
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(11, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(11, 4),
(38, 4),
(39, 4),
(40, 4),
(41, 4),
(42, 4),
(43, 4),
(44, 5),
(45, 5),
(46, 5),
(47, 5),
(48, 5),
(13, 7),
(14, 7),
(15, 7),
(16, 7),
(17, 7),
(18, 7),
(9, 8),
(10, 8),
(11, 8),
(12, 8),
(11, 9),
(13, 9),
(19, 9),
(20, 9),
(21, 9),
(22, 9),
(23, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `likes_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_users_id` int UNSIGNED NOT NULL,
  `recipes_recipes_id` int UNSIGNED NOT NULL,
  `like_cote` tinyint UNSIGNED DEFAULT NULL COMMENT '1 à 5',
  PRIMARY KEY (`likes_id`),
  KEY `fk_likes_users1_idx` (`users_users_id`),
  KEY `fk_likes_recipes1_idx` (`recipes_recipes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `recipes`
--

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE IF NOT EXISTS `recipes` (
  `recipes_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `recipe_title` varchar(120) NOT NULL,
  `recipe_slug` varchar(125) NOT NULL,
  `recipe_desc` text NOT NULL,
  `recipe_img` varchar(45) DEFAULT NULL,
  `recipe_cook_time` int UNSIGNED NOT NULL,
  `recipe_created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `users_users_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`recipes_id`),
  UNIQUE KEY `recipe_slug_UNIQUE` (`recipe_slug`),
  KEY `fk_recipes_users_idx` (`users_users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `recipes`
--

INSERT INTO `recipes` (`recipes_id`, `recipe_title`, `recipe_slug`, `recipe_desc`, `recipe_img`, `recipe_cook_time`, `recipe_created_date`, `users_users_id`) VALUES
(1, 'Tiramisu au chocolat', 'tiramisu-au-chocolat', 'Ce Tiramisu au Chocolat est un pur délice de l\'Italie. Il marie la douceur onctueuse d\'une crème Mascarpone aérée et le moelleux de biscuits imbibés de café intense. Le tout est généreusement parsemé de copeaux de chocolat noir croquants et nappé d\'une sauce chocolat fondante. Un dessert riche, crémeux et intensément cacaoté pour une satisfaction immédiate.', 'tiramisu_chocolat_blur2.png', 30, '2025-12-06 15:55:14', 1),
(2, 'Cannoli au chocolat', 'cannoli-au-chocolat', 'Les cannoli sont une spécialité sicilienne emblématique : des coques de pâte fine, frites pour devenir parfaitement croustillantes, puis garnies d’une crème de ricotta douce et veloutée. Les pépites de chocolat apportent une touche gourmande, tandis que le zeste d’orange parfume le tout d’une fraîcheur méditerranéenne. Une alliance simple, authentique et irrésistible.', 'cannoli_chocolat.png', 60, '2025-12-06 16:39:36', 1),
(3, 'Brownies au chocolat ultra fondants', 'brownies-au-chocolat-ultra-fondants', 'Riche, décadent et incroyablement fondant — ces brownies sont le rêve de tout amateur de chocolat.', 'brownies_hero.jpg', 30, '2025-12-06 16:52:54', 3),
(4, 'Mousse au Chocolat au Lait Aérien', 'mousse-au-chocolat-au-lait-aerien', 'Une texture légère et mousseuse qui fond en bouche, avec une douceur équilibrée par la richesse du chocolat au lait. Parfait pour une fin de repas gourmande ou une pause sucrée.', 'mousse-au-chocolat-au-lait-aerien.jpg', 30, '2025-12-06 17:00:34', 6),
(5, 'Fondant Coeur Coulant', 'fondant-coeur-coulant', 'Le dessert qui fait fondre tout le monde. Un extérieur croustillant, un cœur ultra coulant… prêt en 25 minutes seulement.', 'fondant-coeur-coulant.webp', 25, '2025-12-06 17:04:12', 6),
(6, 'Fondant au Chocolat coeur coulant\r\n', 'fondant-daniel\r\n', 'Une recette pensée comme une tablette de bonheur : croûte fine, intérieur dense et velouté, parfum de cacao qui reste longtemps. On vise un fondant \"bistrot chic\"… mais faisable en 25 minutes.', 'coulantAuChocolat.jpg', 25, '2025-12-06 17:28:13', 7),
(7, 'Gâteau praliné chocolat-noisette', 'gateau-praline-chocolat-noisette', 'Un délicieux gâteau au chocolat praline chocolat noisette', 'gateauPralineChocolatNoisette.jpg', 30, '2025-12-06 17:34:43', 5),
(8, 'Mousse au chocolat', 'mousse-au-chocolat', 'Une mousse au chocolat, c’est un peu comme un bon design : minimaliste, mais chaque détail compte. Trois ingrédients, quelques gestes précis, et la magie opère. Cette recette, c’est celle que je fais quand j’ai besoin de plonger dans quelque chose de plus… sensoriel.', 'image2.jpg', 20, '2025-12-06 17:44:35', 4),
(9, 'Les brownies de ma grand-mère', 'les-brownies-de-ma-grand-mere', 'Il y a des recettes qui ressemblent à des souvenirs. Ce brownie granulé de ma grand-mère, c’est exactement ça : un dessert qui fait du bruit quand on croque dedans, qui sent le chocolat chaud dans toute la cuisine et qui a ce petit côté imparfait… mais terriblement rassurant.', 'image3.png', 15, '2025-12-06 17:48:43', 4),
(10, 'Recettes 2 JM ', 'recette2-JM', '...............', 'gateauPralineChocolatNoisette.jpg', 10, '2025-12-06 17:56:24', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) NOT NULL,
  `user_mail` varchar(120) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_role` varchar(45) NOT NULL,
  PRIMARY KEY (`users_id`),
  UNIQUE KEY `user_name_UNIQUE` (`user_name`),
  UNIQUE KEY `user_mail_UNIQUE` (`user_mail`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`users_id`, `user_name`, `user_mail`, `user_pwd`, `user_role`) VALUES
(1, 'Samuel', 'Sdarryy59@gmail.com', '$2y$10$zDCc2kr5tC5qejPBXidDperucazDuBeLrz3cJAAPAakfMSTv7YnQC', 'user'),
(3, 'Reda', 'reda@gmail.com', '$2a$12$Hh71OrvSPqv9kiB1Q3qEHOaaX.3bjQM9B.y0NKgNI5AHZT/OyZyZG', 'user'),
(4, 'Sola', 'Sola@gmail.com', '$2a$12$Hh71OrvSPqv9kiB1Q3qEHOaaX.3bjQM9B.y0NKgNI5AHZT/OyZyZG', 'user'),
(5, 'akaJM', 'JM@gmail.com', '$2a$12$Hh71OrvSPqv9kiB1Q3qEHOaaX.3bjQM9B.y0NKgNI5AHZT/OyZyZG', 'user'),
(6, 'Mykyta', 'mykyta@gmail.com', '$2a$12$Hh71OrvSPqv9kiB1Q3qEHOaaX.3bjQM9B.y0NKgNI5AHZT/OyZyZG', 'user'),
(7, 'Daniel', 'daniel@gmail.com', '$2a$12$Hh71OrvSPqv9kiB1Q3qEHOaaX.3bjQM9B.y0NKgNI5AHZT/OyZyZG', 'user'),
(8, 'masarash', 'masarash12345@gmail.com', '$2y$10$9NjOqUZLpGnQKsvrq8QEsOS0UKweMVn/VHdGEVoZMBZFBT9QsrgVu', 'user');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `category_has_recipes`
--
ALTER TABLE `category_has_recipes`
  ADD CONSTRAINT `fk_category_has_recipes_category1` FOREIGN KEY (`category_category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_category_has_recipes_recipes1` FOREIGN KEY (`recipes_recipes_id`) REFERENCES `recipes` (`recipes_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_recipes1` FOREIGN KEY (`recipes_recipes_id`) REFERENCES `recipes` (`recipes_id`),
  ADD CONSTRAINT `fk_comments_users1` FOREIGN KEY (`users_users_id`) REFERENCES `users` (`users_id`);

--
-- Ограничения внешнего ключа таблицы `ingredients_has_recipes`
--
ALTER TABLE `ingredients_has_recipes`
  ADD CONSTRAINT `fk_ingredients_has_recipes_ingredients1` FOREIGN KEY (`ingredients_ingredients_id`) REFERENCES `ingredients` (`ingredients_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ingredients_has_recipes_recipes1` FOREIGN KEY (`recipes_recipes_id`) REFERENCES `recipes` (`recipes_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_likes_recipes1` FOREIGN KEY (`recipes_recipes_id`) REFERENCES `recipes` (`recipes_id`),
  ADD CONSTRAINT `fk_likes_users1` FOREIGN KEY (`users_users_id`) REFERENCES `users` (`users_id`);

--
-- Ограничения внешнего ключа таблицы `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `fk_recipes_users` FOREIGN KEY (`users_users_id`) REFERENCES `users` (`users_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
