-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2020 a las 21:35:15
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `copia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorito`
--

CREATE TABLE `favorito` (
  `idUsu` int(10) UNSIGNED NOT NULL,
  `idPuesto` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_03_30_140340_create_tipo_table', 1),
(2, '2020_03_30_140612_create_users_table', 1),
(3, '2020_03_30_140613_create_password_resets_table', 1),
(4, '2020_03_30_140706_create_puesto_table', 1),
(5, '2020_03_30_140919_create_producto_puesto_table', 1),
(6, '2020_03_30_141016_create_pedido_table', 1),
(7, '2020_03_30_141213_create_favorito_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(10) UNSIGNED NOT NULL,
  `idUsu` int(10) UNSIGNED NOT NULL,
  `idProPues` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `pagado` tinyint(1) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `enviado` tinyint(1) NOT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `idUsu`, `idProPues`, `cantidad`, `peso`, `pagado`, `fecha`, `enviado`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 19, 2, 250, 1, '1988-03-11 23:00:00', 0, 2, NULL, NULL),
(2, 1, 7, 2, 250, 0, '1975-01-18 23:00:00', 0, 2, NULL, NULL),
(3, 1, 5, 2, 250, 1, '1998-01-30 23:00:00', 0, 2, NULL, NULL),
(4, 1, 6, 2, 250, 0, '2019-05-11 22:00:00', 0, 2, NULL, NULL),
(5, 1, 9, 2, 250, 1, '2008-09-05 22:00:00', 0, 2, NULL, NULL),
(6, 2, 15, 2, 250, 1, '2013-10-04 22:00:00', 1, 2, NULL, NULL),
(7, 2, 5, 2, 250, 1, '2018-01-15 23:00:00', 0, 2, NULL, NULL),
(8, 2, 9, 2, 250, 1, '2016-01-26 23:00:00', 0, 2, NULL, NULL),
(9, 2, 7, 2, 250, 1, '2014-11-22 23:00:00', 1, 2, NULL, NULL),
(10, 2, 6, 2, 250, 0, '1983-01-31 23:00:00', 0, 2, NULL, NULL),
(11, 3, 18, 2, 250, 1, '2004-07-22 22:00:00', 0, 2, NULL, NULL),
(12, 3, 14, 2, 250, 1, '1976-06-13 22:00:00', 1, 2, NULL, NULL),
(13, 3, 20, 2, 250, 0, '1991-12-08 23:00:00', 0, 2, NULL, NULL),
(14, 3, 14, 2, 250, 1, '1976-03-15 23:00:00', 1, 2, NULL, NULL),
(15, 3, 6, 2, 250, 1, '1975-10-10 22:00:00', 1, 2, NULL, NULL),
(16, 4, 1, 2, 250, 1, '2010-04-11 22:00:00', 1, 2, NULL, NULL),
(17, 4, 13, 2, 250, 1, '2019-03-13 23:00:00', 0, 2, NULL, NULL),
(18, 4, 19, 2, 250, 0, '2016-08-24 22:00:00', 0, 2, NULL, NULL),
(19, 4, 2, 2, 250, 1, '1999-07-03 22:00:00', 0, 2, NULL, NULL),
(20, 4, 4, 2, 250, 1, '1974-10-13 22:00:00', 1, 2, NULL, NULL),
(21, 5, 14, 2, 250, 0, '1981-03-25 23:00:00', 0, 2, NULL, NULL),
(22, 5, 1, 2, 250, 0, '1975-07-11 22:00:00', 0, 2, NULL, NULL),
(23, 5, 5, 2, 250, 1, '1978-10-08 22:00:00', 1, 2, NULL, NULL),
(24, 5, 14, 2, 250, 0, '2008-05-05 22:00:00', 0, 2, NULL, NULL),
(25, 5, 11, 2, 250, 1, '2013-01-30 23:00:00', 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_puesto`
--

CREATE TABLE `producto_puesto` (
  `idProPues` int(10) UNSIGNED NOT NULL,
  `idPuesto` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double NOT NULL,
  `stock` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_puesto`
--

INSERT INTO `producto_puesto` (`idProPues`, `idPuesto`, `nombre`, `foto`, `descripcion`, `precio`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, 'fuga', 'ejemplo.jpg', 'Et ut molestiae ut dolorem magni. Labore voluptate quam amet repellendus est. Ducimus aut vel et omnis qui qui iusto.', 4, 0, NULL, NULL),
(2, 1, 'omnis', 'ejemplo.jpg', 'Aliquam sint tenetur dolor illum. Neque vel molestias et facere nihil distinctio omnis. Reiciendis ipsum praesentium aliquid sit molestiae sed quo maiores. Porro consequatur ut voluptatem.', 349917, 1, NULL, NULL),
(3, 1, 'tenetur', 'ejemplo.jpg', 'Fugiat laudantium vitae est quibusdam nulla mollitia numquam. Quia veritatis molestiae voluptas fuga repellat.', 7, 1, NULL, NULL),
(4, 1, 'commodi', 'ejemplo.jpg', 'Omnis quidem accusantium sed et quaerat ut. Aperiam doloremque iure enim. Qui quis amet rem non eos.', 55198501, 1, NULL, NULL),
(5, 1, 'sit', 'ejemplo.jpg', 'In ullam repellat fugiat sunt provident. Sequi non similique debitis in quam. Quisquam qui omnis aut soluta.', 3399, 0, NULL, NULL),
(6, 1, 'est', 'ejemplo.jpg', 'Ut cum quasi vero. Labore qui commodi quia illo. Accusamus ipsum quia est in maxime nesciunt possimus. Qui eum nesciunt velit aut id.', 143, 0, NULL, NULL),
(7, 1, 'impedit', 'ejemplo.jpg', 'Rerum sit voluptatem quo. Aliquid ab placeat doloremque provident nam laborum dolores.', 117767, 0, NULL, NULL),
(8, 1, 'earum', 'ejemplo.jpg', 'Eius dolorem unde omnis hic consequuntur nobis quos aut. Minima ducimus incidunt fuga nihil minima. Id ad consectetur numquam et error qui dolorum.', 30962, 0, NULL, NULL),
(9, 1, 'doloremque', 'ejemplo.jpg', 'Et accusantium et omnis magni. Eaque eos atque iure. Quas qui dolor aspernatur provident. Ducimus non sequi deleniti soluta aut itaque unde aut.', 4, 1, NULL, NULL),
(10, 1, 'nihil', 'ejemplo.jpg', 'Vel repellat fuga rerum incidunt deserunt facilis odit. Voluptas velit rem qui nostrum. Rerum ratione porro reprehenderit sed consequatur placeat. Quasi et enim maxime sint id velit pariatur.', 560, 0, NULL, NULL),
(11, 1, 'maxime', 'ejemplo.jpg', 'Atque distinctio autem similique. Ipsum laboriosam ullam omnis possimus ut. Consequatur non perferendis voluptas.', 2, 0, NULL, NULL),
(12, 1, 'libero', 'ejemplo.jpg', 'Laudantium nisi fugiat explicabo qui accusamus. Molestiae nobis enim eligendi hic assumenda illum. Id quas dolorem eaque architecto eos. Autem accusamus voluptatem deserunt quo.', 388679, 1, NULL, NULL),
(13, 1, 'aut', 'ejemplo.jpg', 'Dolore possimus quia error magnam ullam aut dolores. Quas officiis qui qui aspernatur. Quo suscipit voluptas molestiae sint nihil optio itaque.', 1, 0, NULL, NULL),
(14, 1, 'minima', 'ejemplo.jpg', 'Pariatur dolorem doloremque magni quia voluptatem quis. Minima voluptatem nobis omnis eum iste. Quisquam facilis iste facere facere. Quidem ab impedit ab officiis recusandae.', 8694324, 0, NULL, NULL),
(15, 1, 'sed', 'ejemplo.jpg', 'Delectus esse eveniet velit ut dolorem quo. Architecto asperiores aperiam magnam ipsum in. Est quia adipisci molestiae possimus molestiae.', 182, 1, NULL, NULL),
(16, 2, 'recusandae', 'ejemplo.jpg', 'Dolores cum deserunt quis explicabo nulla quia culpa. Suscipit vel qui voluptate sapiente dolorem. Est mollitia a dignissimos molestiae quis atque.', 5036, 0, NULL, NULL),
(17, 2, 'nihil', 'ejemplo.jpg', 'Aspernatur quaerat aut perspiciatis id at voluptatem aperiam. Ipsa cum aut molestias cumque. Magnam fugit reiciendis nulla iusto.', 445740589, 0, NULL, NULL),
(18, 2, 'sit', 'ejemplo.jpg', 'Exercitationem a eius est fugit. Id temporibus alias quo ut voluptates labore veritatis. Consectetur eveniet similique consequatur ipsum suscipit. Quos molestias illum est neque vero.', 335, 1, NULL, NULL),
(19, 2, 'eos', 'ejemplo.jpg', 'Placeat ut nesciunt voluptatem numquam quae quisquam. Et est non doloremque fugiat. Ipsam maxime reprehenderit voluptas.', 358861, 1, NULL, NULL),
(20, 2, 'omnis', 'ejemplo.jpg', 'Ab quisquam cupiditate fugiat iure commodi. Dolores occaecati quaerat et atque et.', 451253, 1, NULL, NULL),
(21, 2, 'minus', 'ejemplo.jpg', 'Autem nihil placeat voluptates maiores. Et veritatis voluptas qui natus. Eveniet esse dolor ut commodi doloribus. Iure at iste sequi cumque et asperiores tenetur.', 2, 1, NULL, NULL),
(22, 2, 'nesciunt', 'ejemplo.jpg', 'Temporibus exercitationem aut vero quia possimus et. Aut nihil similique dolorem consequatur molestiae.', 1, 1, NULL, NULL),
(23, 2, 'sed', 'ejemplo.jpg', 'Sapiente ea dicta enim ut excepturi laudantium. Magni ut dignissimos laudantium minus eum laborum. Similique aliquam et perspiciatis. Quia est voluptate iusto ut praesentium.', 862, 0, NULL, NULL),
(24, 2, 'assumenda', 'ejemplo.jpg', 'Sit nostrum ipsum voluptatem et. Non modi voluptatem voluptatum ea. Iste unde vel quia ipsa quod occaecati excepturi eaque.', 90, 1, NULL, NULL),
(25, 2, 'non', 'ejemplo.jpg', 'Vel autem et repudiandae nisi quae quam. Optio praesentium voluptate et eos. Doloremque nesciunt ut blanditiis aliquid sequi iste. Ipsum ut quo dolor rerum ut rem.', 150443, 0, NULL, NULL),
(26, 2, 'et', 'ejemplo.jpg', 'Deserunt minus et vel voluptas excepturi. Maxime qui eveniet recusandae minima rem. Laborum reiciendis quisquam libero quae repudiandae. Quis quo perferendis aut.', 260466, 1, NULL, NULL),
(27, 2, 'similique', 'ejemplo.jpg', 'Voluptas repellat doloribus temporibus animi dolores commodi facere. Ad sapiente eligendi sed illo sit eveniet distinctio. Est aut quibusdam et corporis. Non ab quod optio voluptatibus reprehenderit.', 372211517, 1, NULL, NULL),
(28, 2, 'ducimus', 'ejemplo.jpg', 'Et dignissimos ullam dolorem aliquid. Voluptas eligendi qui nihil quo quia libero.', 74817, 0, NULL, NULL),
(29, 2, 'temporibus', 'ejemplo.jpg', 'Laudantium est rerum aperiam est. Vel illum perspiciatis laborum voluptas deserunt recusandae numquam. Neque dolorem praesentium nam.', 6, 0, NULL, NULL),
(30, 2, 'et', 'ejemplo.jpg', 'Veritatis exercitationem est exercitationem et ea voluptatem. Impedit cupiditate eveniet similique earum dolore. Suscipit voluptates omnis enim beatae laudantium quidem.', 16351, 0, NULL, NULL),
(31, 3, 'doloremque', 'ejemplo.jpg', 'Quos modi repudiandae dolor nihil sint. Sed enim nostrum aspernatur natus quo. Voluptas quam cupiditate modi.', 253, 1, NULL, NULL),
(32, 3, 'aut', 'ejemplo.jpg', 'Debitis tempore omnis facere cumque fuga alias nesciunt. Libero sequi reprehenderit fuga dolorem natus mollitia quo. Aut consequatur possimus placeat.', 56366592, 1, NULL, NULL),
(33, 3, 'vel', 'ejemplo.jpg', 'Et necessitatibus eum et voluptas cum eius consequuntur. Non autem voluptatem quia. Vel facere id id ipsam aliquam nostrum.', 923807, 1, NULL, NULL),
(34, 3, 'minima', 'ejemplo.jpg', 'Quia explicabo culpa commodi illum ad voluptas sunt. Aut voluptatum dolores fugit perferendis. Hic quae voluptas sit fugiat dignissimos dolores.', 15675853, 0, NULL, NULL),
(35, 3, 'non', 'ejemplo.jpg', 'Sunt itaque incidunt natus blanditiis omnis voluptates nesciunt magni. Eos eum voluptatum voluptates cupiditate.', 0, 0, NULL, NULL),
(36, 3, 'dolorem', 'ejemplo.jpg', 'Quaerat aliquid omnis ea consectetur dignissimos quo cupiditate placeat. Et molestiae ex repellendus cumque quia. In omnis et rem est quis.', 4462605, 1, NULL, NULL),
(37, 3, 'delectus', 'ejemplo.jpg', 'Neque amet consectetur officia voluptatibus fugit quo. Maiores debitis omnis ratione ullam. Vel velit dolor consequatur ut dicta. Modi consequatur nisi dolorem modi delectus soluta est odio.', 2, 0, NULL, NULL),
(38, 3, 'saepe', 'ejemplo.jpg', 'Consequatur numquam eos est eius earum eaque eum. Aspernatur ab ut earum nulla voluptates. Quos velit aut enim ducimus quam. Veritatis tempore eum odit error laboriosam qui totam.', 267593, 1, NULL, NULL),
(39, 3, 'minus', 'ejemplo.jpg', 'Doloremque dolor et itaque vel. Cum autem velit nostrum iusto nihil similique iusto. Facere velit est nihil ut illo incidunt accusantium.', 20, 0, NULL, NULL),
(40, 3, 'eum', 'ejemplo.jpg', 'Illum sequi et ipsa molestiae vitae quia. Possimus laudantium perspiciatis eum et. Alias facilis accusantium repellat unde. Vero magnam fugit animi voluptate nobis.', 1792, 1, NULL, NULL),
(41, 3, 'minima', 'ejemplo.jpg', 'Facilis sit unde ut iure ut minima. Qui suscipit et voluptas eveniet. Ut aspernatur eum tempore placeat veritatis autem. Impedit voluptas reprehenderit molestiae illum necessitatibus sit.', 313471, 0, NULL, NULL),
(42, 3, 'et', 'ejemplo.jpg', 'Soluta qui voluptas quod et sit quidem. Minima vitae numquam magnam aut aut qui animi aut. Mollitia unde nihil consequuntur eum qui ut. Voluptates consequatur culpa ut vero iusto.', 22410206, 0, NULL, NULL),
(43, 3, 'sequi', 'ejemplo.jpg', 'Consectetur sequi beatae perferendis culpa cum est. Delectus doloremque dolor voluptatum unde ratione labore harum. Possimus odio nemo quasi vero possimus.', 3877840, 0, NULL, NULL),
(44, 3, 'sunt', 'ejemplo.jpg', 'Aut non perspiciatis vel ut in animi fuga. Distinctio recusandae cumque sed sapiente fuga. Et in sed eveniet quis modi ut. Debitis cum placeat vitae ab eligendi doloremque.', 585620, 0, NULL, NULL),
(45, 3, 'laboriosam', 'ejemplo.jpg', 'Voluptas perspiciatis maxime neque enim qui id ut corporis. Beatae ullam sunt voluptatem quod minima. Corrupti dignissimos excepturi at expedita. Fugiat aut dolorum quia architecto.', 71, 1, NULL, NULL),
(46, 4, 'et', 'ejemplo.jpg', 'Ut dolores reiciendis qui et. Est enim quo eum et qui quis repellat. Natus omnis et aut. Facere omnis et minus.', 674796, 0, NULL, NULL),
(47, 4, 'excepturi', 'ejemplo.jpg', 'Quam excepturi ut quia ut aut. Ut non est ut voluptas necessitatibus ipsa. Quibusdam blanditiis id dolores.', 0, 0, NULL, NULL),
(48, 4, 'voluptatem', 'ejemplo.jpg', 'Qui voluptatem et nihil quia voluptatem veniam deserunt. Quia est animi ratione explicabo.', 442, 0, NULL, NULL),
(49, 4, 'quis', 'ejemplo.jpg', 'Explicabo suscipit laboriosam mollitia odit. Deserunt sed et ad aut aut qui. Beatae corrupti quos velit eligendi. Suscipit tenetur qui voluptas hic exercitationem assumenda nihil.', 111787, 0, NULL, NULL),
(50, 4, 'nulla', 'ejemplo.jpg', 'Reiciendis distinctio eum exercitationem. Inventore sit et et enim voluptatem id ea et. Eveniet dolor laudantium ipsa.', 917, 0, NULL, NULL),
(51, 4, 'et', 'ejemplo.jpg', 'Neque ab inventore illo asperiores quidem. Commodi omnis qui dignissimos aliquid animi voluptatem modi. Tempora aut veniam nesciunt explicabo delectus quia.', 1058, 1, NULL, NULL),
(52, 4, 'ad', 'ejemplo.jpg', 'Ut iusto aut quae alias sed mollitia. Vero accusamus mollitia occaecati aut. Pariatur laudantium qui exercitationem dicta in suscipit quia.', 7, 1, NULL, NULL),
(53, 4, 'velit', 'ejemplo.jpg', 'Et qui debitis praesentium perferendis velit unde porro. Dolorum sunt provident magnam ut id nihil. Ut molestias doloribus et quaerat ut.', 7722, 1, NULL, NULL),
(54, 4, 'praesentium', 'ejemplo.jpg', 'Dolore sequi perspiciatis ut aperiam ad. Velit est facilis nisi nostrum qui quae rerum iure. Et quidem repellendus possimus hic beatae dolores. Amet autem quibusdam et iste.', 823081, 0, NULL, NULL),
(55, 4, 'nihil', 'ejemplo.jpg', 'Velit maiores magnam aut. Officiis perferendis esse totam saepe qui aut. Eligendi culpa eos aliquam fuga aut architecto aliquid. Aperiam ab praesentium qui ex.', 357466913, 0, NULL, NULL),
(56, 4, 'vel', 'ejemplo.jpg', 'Labore aut dolorem veniam nulla quis architecto. Dolorum sequi ut possimus a totam et quia. Molestiae repellat iusto quia quia ut.', 4, 0, NULL, NULL),
(57, 4, 'maxime', 'ejemplo.jpg', 'Doloremque autem perferendis fugit maxime. Soluta ipsa impedit iure molestias cumque.', 377234077, 0, NULL, NULL),
(58, 4, 'sed', 'ejemplo.jpg', 'Quia molestias aperiam quia voluptatem. Et consequuntur voluptatum distinctio maiores. Aut quod libero delectus molestiae sunt. Doloribus cupiditate et atque quo ab.', 13538769, 0, NULL, NULL),
(59, 4, 'facere', 'ejemplo.jpg', 'Est occaecati saepe voluptas. Ut facere pariatur aliquid quis sed odit. Ipsa repellendus cupiditate amet rerum commodi. Quis consequatur cum non quis sed perspiciatis.', 463, 1, NULL, NULL),
(60, 4, 'dolorem', 'ejemplo.jpg', 'Et nihil sapiente excepturi illo voluptatum ratione vitae. Et soluta et officia nihil. Aut fuga et asperiores aperiam sed aut. Repudiandae quo sunt id.', 207540, 1, NULL, NULL),
(61, 5, 'et', 'ejemplo.jpg', 'Aliquid eaque quia enim esse animi. Possimus sapiente ut itaque dicta quis. Voluptates provident est tenetur accusamus culpa et animi.', 17095702, 0, NULL, NULL),
(62, 5, 'rerum', 'ejemplo.jpg', 'Explicabo aliquam est culpa quia quaerat. Sunt non est eos velit. Impedit natus labore corporis quasi ducimus. Et sint unde enim voluptate dolorem alias distinctio.', 77, 0, NULL, NULL),
(63, 5, 'architecto', 'ejemplo.jpg', 'Aut et atque quia voluptas odit voluptas. Assumenda sed vero id quis id incidunt maiores. Consequatur vitae ab itaque cumque voluptatibus dolor quos alias.', 966137, 0, NULL, NULL),
(64, 5, 'doloremque', 'ejemplo.jpg', 'Reiciendis error fuga eligendi corporis minus. Facere vero dolorem magni quaerat assumenda commodi et. Optio repudiandae aut error porro.', 231890096, 1, NULL, NULL),
(65, 5, 'at', 'ejemplo.jpg', 'Ipsa et qui eos voluptas dolores et. Autem quam ea dolorem aut ea. Iste explicabo impedit est voluptatem exercitationem modi. Recusandae aliquam harum occaecati aperiam magnam.', 585, 1, NULL, NULL),
(66, 5, 'eius', 'ejemplo.jpg', 'Neque velit fugiat commodi harum. Officia sed itaque dolorum aut porro quod molestiae. Sit animi qui quia. Aut minima necessitatibus eum provident dolores quibusdam inventore.', 2, 1, NULL, NULL),
(67, 5, 'natus', 'ejemplo.jpg', 'Dolorem deserunt at qui doloribus laborum omnis libero. Aut sit nam non sapiente laboriosam. Nostrum quae voluptas autem fugiat.', 8, 1, NULL, NULL),
(68, 5, 'architecto', 'ejemplo.jpg', 'Sequi ex ut vero sit nemo nulla. Blanditiis sint magni nemo dolores rerum quis. Necessitatibus animi reprehenderit ut sint ut tenetur. Debitis in laboriosam deleniti ullam eligendi aperiam quo.', 40739424, 0, NULL, NULL),
(69, 5, 'neque', 'ejemplo.jpg', 'Ut perferendis occaecati sint molestias amet minima. Nisi facere voluptates sequi ea. Odio aut molestiae beatae similique. A iure consequatur facere qui impedit quidem voluptatem.', 5456, 1, NULL, NULL),
(70, 5, 'quia', 'ejemplo.jpg', 'Vitae iure recusandae consectetur laudantium est ea. Repudiandae dolorum numquam minus architecto cumque est. Dolorem possimus velit ut sunt.', 393, 0, NULL, NULL),
(71, 5, 'officiis', 'ejemplo.jpg', 'Soluta repellendus sit asperiores. Officia minus explicabo voluptatem et nesciunt repudiandae animi. Est voluptatem fugiat maxime iste aliquid quis. Ipsum inventore et quaerat quos odit aliquam sit.', 3578445, 1, NULL, NULL),
(72, 5, 'sunt', 'ejemplo.jpg', 'Aut neque ut corrupti dolores. Sit vel vel ut sit. Ratione magnam sit enim nisi. Dolor qui magni fugit et. Voluptatibus impedit maxime aut ea. Amet porro tenetur in mollitia quas.', 56, 1, NULL, NULL),
(73, 5, 'accusantium', 'ejemplo.jpg', 'Dolor ipsam consectetur eos. Beatae placeat fugit veniam et quas aut. Occaecati quidem sint dolores sed sed. Atque hic laudantium maxime ut praesentium.', 243, 1, NULL, NULL),
(74, 5, 'eligendi', 'ejemplo.jpg', 'Optio explicabo voluptas ea rem sequi iusto. Qui dolore ab eaque quos. Tempore sit temporibus quas aut fuga reiciendis quidem non. Ex pariatur perferendis qui accusantium quo.', 271, 0, NULL, NULL),
(75, 5, 'et', 'ejemplo.jpg', 'Fuga consectetur recusandae illum repudiandae atque iure. Odio hic repellendus nesciunt vel. Impedit aliquam quam reprehenderit quae et. Nulla tempore aut qui aperiam est veritatis commodi.', 230297, 0, NULL, NULL),
(76, 6, 'explicabo', 'ejemplo.jpg', 'Explicabo id nihil et dolorem. Quo nam quas qui. Eos voluptatem sint quae. Consequatur aut cumque ad voluptas quis et.', 302497, 1, NULL, NULL),
(77, 6, 'nisi', 'ejemplo.jpg', 'Velit omnis temporibus dolores qui qui. Non suscipit error facere optio ab et fugit. Quo sapiente est porro ad.', 0, 1, NULL, NULL),
(78, 6, 'blanditiis', 'ejemplo.jpg', 'Cumque placeat voluptatem natus. Perferendis perferendis veritatis earum facere vel reiciendis. Est ut dignissimos accusamus sunt. Velit veritatis facere et cum sint rerum ex.', 1630948, 1, NULL, NULL),
(79, 6, 'deleniti', 'ejemplo.jpg', 'Amet cum consectetur enim dolorem illo pariatur. Et aut voluptatem odio quos. Rem laboriosam nemo cumque veniam quaerat sit nemo.', 179899, 0, NULL, NULL),
(80, 6, 'laborum', 'ejemplo.jpg', 'Voluptas atque dolorem qui rerum. Magni porro perspiciatis autem et. Saepe amet dicta quaerat omnis aut. Earum vel debitis quos expedita est ratione ad.', 0, 1, NULL, NULL),
(81, 6, 'sit', 'ejemplo.jpg', 'Dolorem quia quis ut velit. Voluptatem atque rem aut qui nihil. Sit ut voluptatem dolor maxime sint non. Illo laboriosam fugiat enim dolorum.', 248, 0, NULL, NULL),
(82, 6, 'commodi', 'ejemplo.jpg', 'Cumque autem quis velit ut laborum iure quia. Rerum est quia dolorum. Voluptatum modi unde enim quibusdam similique quod.', 15, 1, NULL, NULL),
(83, 6, 'accusantium', 'ejemplo.jpg', 'Vitae repudiandae mollitia magni quasi aut. Dolor totam eos et. Consequatur rerum ab sed beatae nemo similique.', 2, 1, NULL, NULL),
(84, 6, 'fugiat', 'ejemplo.jpg', 'Consequatur veritatis impedit illum quasi odio. Accusantium dolores facilis eveniet aliquid sunt. Nemo minus aliquam est debitis rem. Voluptatem ea ut quisquam.', 24985571, 0, NULL, NULL),
(85, 6, 'nulla', 'ejemplo.jpg', 'Aut magnam officia consequatur officiis ea officiis dolore. Harum amet beatae illo aut omnis nihil fugiat officia. Aut id hic vel illo tenetur placeat repudiandae. Odit id quas nemo saepe.', 16, 0, NULL, NULL),
(86, 6, 'similique', 'ejemplo.jpg', 'Non eum atque et ea. Voluptas consequuntur recusandae optio. Veniam vel nemo et odit et saepe. Dolores consectetur laborum expedita dicta veritatis quo nihil eos.', 74, 1, NULL, NULL),
(87, 6, 'exercitationem', 'ejemplo.jpg', 'Maxime qui dolor dicta esse ea quo. Quia corrupti quam dolore architecto molestiae. Est voluptas quae et qui. Adipisci eos aspernatur voluptas ea quam est veniam.', 109, 0, NULL, NULL),
(88, 6, 'tempore', 'ejemplo.jpg', 'Recusandae repellat sed molestiae voluptatum. Quisquam in qui eveniet voluptatem sit autem. Quo et ut tempore doloremque blanditiis.', 77, 0, NULL, NULL),
(89, 6, 'sed', 'ejemplo.jpg', 'Sunt eos doloribus illo doloremque itaque iure molestiae. Vitae voluptatum dolor omnis alias repellendus qui et. Sed et omnis nihil modi.', 6, 1, NULL, NULL),
(90, 6, 'cumque', 'ejemplo.jpg', 'Sunt quasi maxime facere dolorum cum quae. Ullam sit aliquam excepturi maxime nisi sint sunt. Necessitatibus occaecati quidem architecto numquam accusamus.', 307, 0, NULL, NULL),
(91, 7, 'exercitationem', 'ejemplo.jpg', 'Eius earum alias cupiditate. Consequatur voluptatum vel odit velit ipsa libero quibusdam quidem. Vel alias ad delectus vero.', 506, 0, NULL, NULL),
(92, 7, 'corrupti', 'ejemplo.jpg', 'Delectus itaque aut fuga. Vel dolorum error inventore maxime. Nihil numquam iusto voluptas consequatur similique.', 449094200, 1, NULL, NULL),
(93, 7, 'qui', 'ejemplo.jpg', 'Consequuntur et libero eos maiores qui sed. Ut voluptatem asperiores et maxime ut. Qui quaerat fuga iure et.', 70, 1, NULL, NULL),
(94, 7, 'vero', 'ejemplo.jpg', 'Et suscipit quo voluptas rerum ut. Magni totam vel est. Necessitatibus minima qui maxime officiis assumenda. Quia sed nostrum voluptatum et.', 5, 1, NULL, NULL),
(95, 7, 'aut', 'ejemplo.jpg', 'Repellendus nam et unde similique ducimus. Saepe est illum aut. Minima id suscipit iure at quia praesentium earum.', 54905868, 1, NULL, NULL),
(96, 7, 'atque', 'ejemplo.jpg', 'Vel recusandae voluptatem sit veniam sint aut ea. Cupiditate qui sit nihil dolorem. Est minima iusto error voluptatem similique. Omnis itaque tenetur et sit consectetur.', 440334432, 1, NULL, NULL),
(97, 7, 'officiis', 'ejemplo.jpg', 'Reiciendis ullam enim ut quae vel dignissimos. Repudiandae sed quos tempore et optio quod tenetur. Et explicabo fugiat ut tempora illo sint.', 1983122, 0, NULL, NULL),
(98, 7, 'commodi', 'ejemplo.jpg', 'Consectetur consequuntur deserunt nostrum magni repellat a. Quo ut aut reiciendis recusandae velit. Modi eos doloribus commodi. Dignissimos voluptas assumenda sequi vitae in eveniet iure.', 2, 0, NULL, NULL),
(99, 7, 'accusantium', 'ejemplo.jpg', 'Quae aut laborum recusandae molestiae recusandae. Dolorem sit aut vel vero et. Dolorem ut non accusamus enim modi voluptatem ullam. Dolores ut in amet vitae omnis.', 371, 0, NULL, NULL),
(100, 7, 'deserunt', 'ejemplo.jpg', 'Sit rerum sit dolore placeat ut. Architecto exercitationem quibusdam dolorum quo perferendis tempora. Id id vel excepturi eaque.', 39, 0, NULL, NULL),
(101, 7, 'blanditiis', 'ejemplo.jpg', 'Laborum quia voluptatem et beatae. Magnam libero molestiae molestiae tempora soluta labore. Porro est nihil culpa modi.', 405168, 1, NULL, NULL),
(102, 7, 'porro', 'ejemplo.jpg', 'Consequatur pariatur deserunt rerum earum necessitatibus sed at. Rem vero et ab sunt. Sit dignissimos quaerat natus est. Et autem aperiam ex.', 1248517, 1, NULL, NULL),
(103, 7, 'velit', 'ejemplo.jpg', 'Quo accusantium beatae sint adipisci atque aut. Non repellat delectus ipsum nihil qui officia eum. Animi corporis quasi earum molestias et qui repudiandae.', 3430919, 1, NULL, NULL),
(104, 7, 'at', 'ejemplo.jpg', 'Unde eos qui eum blanditiis debitis minima. Eveniet placeat omnis nostrum fuga. Harum voluptatem inventore et quo. Perspiciatis fugiat non hic nulla nihil esse.', 2247596, 0, NULL, NULL),
(105, 7, 'eaque', 'ejemplo.jpg', 'Itaque fuga qui qui recusandae soluta illum aut. Ut repellendus dolorem nihil qui asperiores. Perferendis sunt aliquam magni eum illo. Enim iusto nisi omnis mollitia quia dolorum vero.', 4763, 0, NULL, NULL),
(106, 8, 'ut', 'ejemplo.jpg', 'Quis dolore exercitationem sit. Voluptatem fuga odio est totam corporis. Consequatur perferendis aut tempore voluptas numquam. Minima quidem aut adipisci labore et et.', 536, 0, NULL, NULL),
(107, 8, 'minus', 'ejemplo.jpg', 'Vel unde omnis non. Enim optio sapiente ab accusamus est odio rerum. Nihil asperiores quia hic fugiat suscipit cum. Et perspiciatis in cupiditate voluptate voluptatem sit necessitatibus ratione.', 2, 1, NULL, NULL),
(108, 8, 'est', 'ejemplo.jpg', 'Rem temporibus laboriosam voluptatem vitae quibusdam quod. Voluptatibus qui qui est facilis nisi. Earum et a molestias cumque qui dolores fugit. Perspiciatis perferendis est harum delectus est.', 122300490, 0, NULL, NULL),
(109, 8, 'aut', 'ejemplo.jpg', 'Id laboriosam doloremque reiciendis optio rerum ut. Qui iusto molestiae et sed. Occaecati ab ut perferendis recusandae vitae est ea.', 7836, 0, NULL, NULL),
(110, 8, 'et', 'ejemplo.jpg', 'Neque sunt est libero ab expedita asperiores. Et sunt illo alias et et. Quasi exercitationem cum beatae dolorem tenetur voluptatum sunt.', 13672846, 1, NULL, NULL),
(111, 8, 'temporibus', 'ejemplo.jpg', 'Aut deserunt eum vitae accusantium saepe sit dolor. Voluptas commodi ut eum. Beatae voluptas esse quia ut aut a omnis.', 6, 0, NULL, NULL),
(112, 8, 'minus', 'ejemplo.jpg', 'Et eligendi unde saepe sunt quis. Doloremque odit voluptatibus ut delectus. Aliquid molestiae sed facilis eius et necessitatibus. Numquam minima libero accusamus aut quasi aut tenetur.', 1, 0, NULL, NULL),
(113, 8, 'quis', 'ejemplo.jpg', 'Numquam praesentium et ut earum repellendus earum dignissimos. Sint aut nemo omnis corporis. Maxime reiciendis quia quas asperiores sunt deleniti. Facilis possimus ut voluptate quia.', 206404888, 0, NULL, NULL),
(114, 8, 'est', 'ejemplo.jpg', 'Eaque quia quos et facere totam nisi neque. Ab ab numquam inventore voluptatem. Perspiciatis quia qui quo est voluptatem hic. Autem reprehenderit voluptatem ut eaque dolore unde explicabo.', 11828811, 1, NULL, NULL),
(115, 8, 'id', 'ejemplo.jpg', 'Quod non veniam autem suscipit rerum. Ea sit beatae rerum dignissimos. Dolores totam neque id quia minus.', 261020276, 0, NULL, NULL),
(116, 8, 'quibusdam', 'ejemplo.jpg', 'Ab delectus sed et voluptatem vitae architecto sapiente. Dolorem ipsam officia aut. Esse ut delectus totam odit ab aut dolore.', 10602, 1, NULL, NULL),
(117, 8, 'voluptatem', 'ejemplo.jpg', 'Voluptatem qui officiis eligendi sunt. Qui assumenda molestiae ut delectus. Voluptatem aliquam eius debitis. Voluptas laborum et nulla culpa optio.', 741058, 1, NULL, NULL),
(118, 8, 'rerum', 'ejemplo.jpg', 'Maiores aspernatur hic voluptates id veniam exercitationem et sint. Sed quis et aperiam modi quis aspernatur. Totam aliquid deleniti et asperiores atque porro autem.', 744886, 1, NULL, NULL),
(119, 8, 'et', 'ejemplo.jpg', 'In labore quia aut. Cupiditate nihil ut quas placeat hic molestiae et. Animi enim quo aut quidem quis. Perspiciatis ea dolorum culpa et ullam magni cupiditate cupiditate.', 9767660, 1, NULL, NULL),
(120, 8, 'sed', 'ejemplo.jpg', 'Occaecati ipsum nam aut molestiae. Explicabo laborum est vero est nisi esse. Non voluptatibus veniam dolore numquam ullam enim.', 34671, 1, NULL, NULL),
(121, 9, 'possimus', 'ejemplo.jpg', 'Voluptatem et qui assumenda dicta deleniti quae. Error et aperiam et accusantium eos. Voluptas quisquam iste enim dolor ut. Veniam animi reprehenderit similique expedita ut animi repudiandae et.', 13, 1, NULL, NULL),
(122, 9, 'est', 'ejemplo.jpg', 'Nisi non rerum qui veritatis dolorem animi est. Quae voluptatibus nihil nihil voluptas rerum. Cupiditate debitis aliquid perferendis. Quia non sit enim pariatur temporibus.', 3449, 1, NULL, NULL),
(123, 9, 'tenetur', 'ejemplo.jpg', 'Quidem consequatur architecto odit neque animi. Voluptas et iusto laboriosam qui eos itaque iusto.', 3996, 0, NULL, NULL),
(124, 9, 'reprehenderit', 'ejemplo.jpg', 'Laboriosam est repellat iusto voluptate. Tempore cumque vitae iure. Consequatur quidem voluptatem aut iusto molestias ad. Non et ut natus cumque totam.', 2123, 1, NULL, NULL),
(125, 9, 'molestiae', 'ejemplo.jpg', 'Mollitia hic quibusdam non sequi. Facilis harum sequi cum veniam minima. Sed sint quia qui.', 5, 0, NULL, NULL),
(126, 9, 'et', 'ejemplo.jpg', 'Blanditiis voluptas eveniet impedit ut minus repellendus iusto sit. Et accusamus asperiores et officiis. Rerum cumque quam quos veniam quam pariatur quia voluptatem. Nihil ipsa aliquam sed nisi.', 207406, 1, NULL, NULL),
(127, 9, 'quibusdam', 'ejemplo.jpg', 'Quibusdam quas sapiente velit ipsam laboriosam deserunt. Dolore recusandae non eaque dolorem distinctio fugit incidunt. Est quia aut est architecto quibusdam.', 303288, 1, NULL, NULL),
(128, 9, 'tempore', 'ejemplo.jpg', 'Nam aut exercitationem vitae laborum quis saepe libero deserunt. Ex in modi molestiae consequatur optio. Omnis sit consequatur autem possimus culpa.', 117855139, 1, NULL, NULL),
(129, 9, 'hic', 'ejemplo.jpg', 'Quia quia dolorem harum minus quasi a. Cumque distinctio voluptates maiores nulla non quidem. Quia modi nulla sunt consequatur beatae.', 1, 1, NULL, NULL),
(130, 9, 'fugiat', 'ejemplo.jpg', 'Debitis ut est et veritatis ut est itaque accusamus. Non dignissimos maxime quisquam veritatis minima quisquam. Tempore praesentium est eos qui enim. Illo sed consectetur nisi voluptatem fuga.', 16382, 1, NULL, NULL),
(131, 9, 'doloribus', 'ejemplo.jpg', 'Eaque accusamus assumenda molestiae dolorem perferendis tempora. Aliquid quia minus incidunt nam aperiam rem sint. Quisquam sit voluptas facere itaque assumenda vitae dolore a.', 63502, 1, NULL, NULL),
(132, 9, 'accusamus', 'ejemplo.jpg', 'Officiis quod non ipsam id et aut. Quod nesciunt eaque sit molestias. Molestiae rerum a et aperiam ut neque consectetur. Expedita voluptates accusantium tempore quibusdam totam voluptas.', 482, 1, NULL, NULL),
(133, 9, 'porro', 'ejemplo.jpg', 'Ex et facere fuga ipsam error unde omnis. Id cum aut tempora dolores iste ut. Iure quae iusto nobis aut.', 3914, 0, NULL, NULL),
(134, 9, 'placeat', 'ejemplo.jpg', 'Quis enim necessitatibus aperiam animi. Quis laborum omnis modi. Quis in qui beatae nesciunt perferendis.', 441, 0, NULL, NULL),
(135, 9, 'itaque', 'ejemplo.jpg', 'Asperiores enim rerum doloremque voluptatem exercitationem sit. Eius animi atque enim accusamus. Eum in totam officiis incidunt amet laudantium. Est aut modi natus harum et id.', 324, 1, NULL, NULL),
(136, 10, 'quibusdam', 'ejemplo.jpg', 'Velit similique alias adipisci nulla. Excepturi culpa ut ut ratione. Et distinctio aliquam in perferendis rerum saepe quis.', 8, 0, NULL, NULL),
(137, 10, 'at', 'ejemplo.jpg', 'Quisquam earum iure qui distinctio. Quo possimus aut id dolores magni ut. Aut necessitatibus a dolore quae modi hic.', 4, 1, NULL, NULL),
(138, 10, 'ea', 'ejemplo.jpg', 'Modi omnis repellat sit eos corporis nihil. Atque laudantium quia vitae nihil quisquam quae qui. Quas repudiandae id earum nostrum. Corporis accusantium delectus aut. Aut provident voluptatem odit.', 73194655, 1, NULL, NULL),
(139, 10, 'at', 'ejemplo.jpg', 'Laborum ut nemo molestiae rerum at architecto tempora. Quo beatae fuga fugiat eum at. Sed in dolore quasi et. Ea adipisci est necessitatibus voluptatem incidunt omnis praesentium.', 62230, 0, NULL, NULL),
(140, 10, 'tempore', 'ejemplo.jpg', 'Necessitatibus quis neque magnam pariatur ut. Tenetur architecto aperiam maiores mollitia assumenda aperiam. Et velit minima eos qui.', 2, 1, NULL, NULL),
(141, 10, 'quis', 'ejemplo.jpg', 'Totam nemo quia nesciunt nulla dolores praesentium non. Voluptatem culpa libero laudantium voluptatem animi doloribus consectetur. Dolore vitae aliquam soluta qui repellendus et neque.', 6, 0, NULL, NULL),
(142, 10, 'architecto', 'ejemplo.jpg', 'Dolore sint sint quia velit modi enim. Repellat voluptates odio ut voluptas consectetur ut similique qui.', 3376817, 0, NULL, NULL),
(143, 10, 'vel', 'ejemplo.jpg', 'Earum est autem qui veniam quidem. Omnis dolor quae corporis ut. Dolorem sint suscipit ut aliquid autem. Sit sit praesentium pariatur voluptatibus accusamus. Cumque quod sit et quia.', 42852990, 0, NULL, NULL),
(144, 10, 'soluta', 'ejemplo.jpg', 'Iste exercitationem exercitationem fugiat impedit vero beatae. Nam debitis libero facere nihil velit illum. Non placeat beatae qui quae est animi ut itaque.', 326557, 0, NULL, NULL),
(145, 10, 'quia', 'ejemplo.jpg', 'Soluta autem dolores est quam aut. Omnis libero et ut mollitia. Quas nesciunt vero ex dolore vero voluptas quas. Consequatur non aut quo eum pariatur ipsa.', 4, 0, NULL, NULL),
(146, 10, 'molestiae', 'ejemplo.jpg', 'Quod velit cumque voluptatem blanditiis ab. Laudantium itaque amet quae nobis ullam ipsum. Excepturi rerum quia expedita ut et odio.', 8, 0, NULL, NULL),
(147, 10, 'iste', 'ejemplo.jpg', 'Reiciendis iure enim voluptatem qui. Nam vero aut dolorum voluptates. Voluptatem aliquam aut dicta quae.', 6775367, 0, NULL, NULL),
(148, 10, 'sit', 'ejemplo.jpg', 'Ut distinctio atque nihil qui impedit. Praesentium nisi exercitationem ut. Ipsam fugiat eos eos qui velit. Fuga quaerat ea est.', 287403, 0, NULL, NULL),
(149, 10, 'officiis', 'ejemplo.jpg', 'Illum sunt neque velit neque eveniet tenetur. Iste nulla at est tenetur.', 7669921, 0, NULL, NULL),
(150, 10, 'et', 'ejemplo.jpg', 'Dicta aliquid blanditiis provident commodi eum nulla rerum enim. Ut maxime ut occaecati iste repellat. Ut placeat est dolor enim. Eum ut a quia laudantium velit eos.', 27655, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `idPuesto` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idUsu` int(10) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`idPuesto`, `nombre`, `idUsu`, `foto`, `telefono`, `info`, `created_at`, `updated_at`) VALUES
(1, 'Viajes Abad S. de H.', 3, 'puesto.jpg', '665353263', 'Porro libero consequatur ab facilis voluptatibus a. Qui officia omnis perferendis accusamus accusamus. Laudantium nesciunt numquam non nulla. Dolor ullam libero sint explicabo illum rem. At non cupiditate numquam velit perferendis voluptas facilis exercitationem.', NULL, NULL),
(2, 'Corporación Caraballo', 4, 'puesto.jpg', '675164089', 'Veniam sed voluptatibus qui magnam maiores deleniti quo iure. Quas et suscipit eos dolorem totam corrupti velit. Dolorem temporibus pariatur nesciunt hic modi.', NULL, NULL),
(3, 'Global Luevano', 3, 'puesto.jpg', '687085490', 'Dicta suscipit rerum iusto ipsam non nihil cupiditate placeat. Eligendi consequuntur et rerum nemo. Ut enim molestias perferendis dicta nisi incidunt eaque nesciunt. Dolor quia sunt nihil dolorum. Dolores pariatur commodi qui autem. Pariatur dolor ut ullam.', NULL, NULL),
(4, 'Izquierdo de Adorno', 2, 'puesto.jpg', '663668967', 'Expedita et voluptas illo sequi. Numquam ad dolor et architecto natus. Voluptatum fuga cupiditate ex minima possimus reiciendis suscipit. Odio nostrum ex non et eius illo.', NULL, NULL),
(5, 'Viajes Solorio', 2, 'puesto.jpg', '660947870', 'Ut dolorum repellat delectus soluta. Et provident illum optio tempora voluptatem dolores perferendis. Aut illo autem aliquid eveniet quo in. Omnis voluptatum eos non nemo est sed et.', NULL, NULL),
(6, 'Araña, Narváez y Longoria e Hijo', 3, 'puesto.jpg', '602352018', 'Quia quasi id ut tenetur cumque. Corporis rerum quia laudantium cumque sed occaecati dolor. Accusamus explicabo adipisci nam eum molestiae. Earum eveniet deleniti iusto dolore sed illum voluptatem sit.', NULL, NULL),
(7, 'Mejía-Marco SRL', 2, 'puesto.jpg', '615795933', 'Est doloremque beatae adipisci excepturi laborum est. Ipsum numquam id adipisci voluptatem quam voluptate earum. Illo debitis reprehenderit explicabo maiores unde doloribus sed. Tenetur nemo fugit harum tempore tempora pariatur.', NULL, NULL),
(8, 'Global Godínez-Cuellar', 3, 'puesto.jpg', '603209260', 'Pariatur quisquam laboriosam dolor autem odio ad. Dolores sit doloribus neque eos dignissimos aut. Dolor maxime cupiditate enim expedita dolor beatae aut. Quas et quas dicta vel qui est est.', NULL, NULL),
(9, 'Corporación Rivas', 4, 'puesto.jpg', '667280469', 'Eligendi accusamus labore dignissimos enim esse incidunt ratione. Quam porro totam necessitatibus blanditiis corrupti magni enim. Non eaque et tenetur dolor quisquam ea saepe.', NULL, NULL),
(10, 'Berríos de Bahena e Hija', 3, 'puesto.jpg', '650486356', 'Delectus pariatur doloribus mollitia occaecati labore et autem. Ipsum nam nisi velit rerum beatae dolores quod. Unde a suscipit magnam eos perferendis autem. Et accusamus enim et vero reiciendis nulla fuga. Velit necessitatibus modi nam sapiente distinctio quis voluptate.', NULL, NULL),
(11, 'Macias, Escobedo y Carbajal e Hijo', 3, 'puesto.jpg', '692845449', 'Voluptatum exercitationem fugit esse ad quia iste alias. Numquam nihil eum ex. Eveniet qui vel pariatur explicabo. Consequatur sit voluptate rerum reprehenderit eum aut molestiae.', NULL, NULL),
(12, 'Asociación Matos', 5, 'puesto.jpg', '633440422', 'Ea laboriosam iusto molestias dolorem ut maiores repellat. Maxime optio possimus non qui. Doloribus omnis fuga laborum rerum ratione.', NULL, NULL),
(13, 'Ortíz de Lucas', 1, 'puesto.jpg', '679943309', 'Similique quo delectus voluptatum iste sed. Earum reiciendis sequi atque. Veritatis amet sit ipsa perferendis ullam id sapiente. Placeat incidunt in repudiandae omnis laudantium. Quaerat numquam non atque.', NULL, NULL),
(14, 'Terrazas-Ibáñez e Hija', 3, 'puesto.jpg', '609941773', 'Est beatae consequatur dolorem dicta debitis. Voluptas recusandae doloribus deleniti libero dolor natus. Sint corporis iusto temporibus.', NULL, NULL),
(15, 'Domínguez y González y Asoc.', 1, 'puesto.jpg', '681175983', 'Similique voluptatem fugiat ullam alias aspernatur aut quas. Id eaque magni odit porro sed non aut. Ipsa ab aut non. Voluptas commodi est pariatur voluptatum ratione.', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `idTipo` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`idTipo`, `nombre`) VALUES
(1, 'administrador'),
(2, 'vendedor'),
(3, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `idUsu` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecNac` date NOT NULL,
  `idTipo` int(10) UNSIGNED NOT NULL,
  `vendedor` tinyint(1) NOT NULL,
  `direccion` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarjeta` bigint(20) DEFAULT NULL,
  `caducidad` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvc` int(11) DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nif` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`idUsu`, `nombre`, `apellido`, `dni`, `email`, `email_verified_at`, `password`, `remember_token`, `telefono`, `fecNac`, `idTipo`, `vendedor`, `direccion`, `tarjeta`, `caducidad`, `cvc`, `foto`, `nif`, `created_at`, `updated_at`) VALUES
(1, 'Cyntia', 'Garcia', '74740147Z', 'cyntigr@gmail.com', NULL, '$2y$10$PfQePYoEtkHDIaxNtul1WehX5g46sdKHZT4BRkhMfFlmb9pMfPqLa', NULL, '661121633', '1974-11-07', 1, 0, 'Avinguda Francisco Javier, 92, 21º B, 39564, Reina de las Torres', NULL, NULL, NULL, 'user.jpg', NULL, NULL, NULL),
(2, 'Sra. Juana Serra', 'Banda', '82120315e', 'adam.davila@hotmail.es', NULL, '$2y$10$eV1KDaxon/MrwFvZs/geGui2YA389hvwH13m9E5e6mg7rq1PaLbIy', NULL, '664190012', '1979-10-27', 3, 0, 'Camino Antonia, 6, 9º F, 40328, El Osorio de Ulla', 1769128857906467, '05/2021', 819, 'user.jpg', NULL, NULL, NULL),
(3, 'Natalia Colunga', 'Arevalo', '22539580y', 'vendedor@gmail.com', NULL, '$2y$10$VWR06twtf4baeXSMQWQxVuVolPV/hwZFVHanBlgLrF1e4f1gieABG', NULL, '625967335', '1973-10-31', 2, 1, 'Avenida Ona, 27, 4º C, 58519, Los Ríos del Pozo', NULL, NULL, NULL, 'user.jpg', '77211589i', NULL, NULL),
(4, 'Erik Abad', 'Ojeda', '90630797y', 'cliente@gmail.com', NULL, '$2y$10$VkvJxw.2OvCAIEVzjnq/pe49Z1MtDh/hXWIzHgPGGENcQe7UWX/Ia', NULL, '674729590', '2002-05-31', 3, 0, 'Calle Mateo, 26, Ático 7º, 59625, La Guzmán del Pozo', 2113920548531588, '05/2021', 391, 'user.jpg', NULL, NULL, NULL),
(5, 'César Niño', 'Ulloa', '40551184c', 'lorena.quintanilla@yahoo.com', NULL, '$2y$10$DC2mnlrjBD/b6SJVyIpE4uNV2ck7iST5m4mKvPE432aIZ6D00ITnG', NULL, '643270020', '2018-08-07', 3, 0, 'Camiño Candelaria, 68, 63º D, 02338, Las De la Torre', 6160501051208987, '05/2021', 633, 'user.jpg', NULL, NULL, NULL),
(6, 'Jon Agosto', 'Amador', '36955176p', 'salinas.alma@live.com', NULL, '$2y$10$WF0tMRO5yubjIeXpRV3QceAXLM/05LWNK8BNgXSC58Bya.aXq2nAG', NULL, '631356907', '1973-05-10', 3, 0, 'Passeig Aitana, 73, 8º E, 33687, San Yáñez', 9160927229617279, '05/2021', 549, 'user.jpg', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`idUsu`,`idPuesto`),
  ADD KEY `favorito_idpuesto_foreign` (`idPuesto`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `pedido_idusu_foreign` (`idUsu`),
  ADD KEY `pedido_idpropues_foreign` (`idProPues`);

--
-- Indices de la tabla `producto_puesto`
--
ALTER TABLE `producto_puesto`
  ADD PRIMARY KEY (`idProPues`),
  ADD KEY `producto_puesto_idpuesto_foreign` (`idPuesto`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`idPuesto`),
  ADD KEY `puesto_idusu_foreign` (`idUsu`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUsu`),
  ADD UNIQUE KEY `user_dni_unique` (`dni`),
  ADD UNIQUE KEY `user_email_unique` (`email`),
  ADD KEY `user_idtipo_foreign` (`idTipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `producto_puesto`
--
ALTER TABLE `producto_puesto`
  MODIFY `idProPues` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `idPuesto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idTipo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `idUsu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `favorito_idpuesto_foreign` FOREIGN KEY (`idPuesto`) REFERENCES `puesto` (`idPuesto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorito_idusu_foreign` FOREIGN KEY (`idUsu`) REFERENCES `user` (`idUsu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_idpropues_foreign` FOREIGN KEY (`idProPues`) REFERENCES `producto_puesto` (`idProPues`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_idusu_foreign` FOREIGN KEY (`idUsu`) REFERENCES `user` (`idUsu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_puesto`
--
ALTER TABLE `producto_puesto`
  ADD CONSTRAINT `producto_puesto_idpuesto_foreign` FOREIGN KEY (`idPuesto`) REFERENCES `puesto` (`idPuesto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD CONSTRAINT `puesto_idusu_foreign` FOREIGN KEY (`idUsu`) REFERENCES `user` (`idUsu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_idtipo_foreign` FOREIGN KEY (`idTipo`) REFERENCES `tipo` (`idTipo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
