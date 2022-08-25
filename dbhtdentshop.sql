-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2022 a las 00:57:35
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbhtdentshop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `ruta`, `icono`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Equipos intraorales', 'equipos-intraorales', '<i class=\"fas fa-mobile-alt\"></i>', 'categorias/5e8810b66712f70fe7cfc70ec1a4d9e1.png', '2022-08-22 20:49:57', '2022-08-22 20:49:57'),
(2, 'Equipos extraorales', 'equipos-extraorales', '<i class=\"fas fa-mobile-alt\"></i>', 'categorias/55b90337ed129847ce0104b0d15a8b98.png', '2022-08-22 20:49:58', '2022-08-22 20:49:58'),
(3, 'Materiales', 'materiales', '<i class=\"fas fa-mobile-alt\"></i>', 'categorias/41e7801f90bf8137836d73d481b374e4.png', '2022-08-22 20:50:00', '2022-08-22 20:50:00'),
(4, 'Implantes', 'implantes', '<i class=\"fas fa-mobile-alt\"></i>', 'categorias/1c3127823f020e062c5a624e764645c8.png', '2022-08-22 20:50:01', '2022-08-22 20:50:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_marca`
--

CREATE TABLE `categoria_marca` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marca_id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria_marca`
--

INSERT INTO `categoria_marca` (`id`, `marca_id`, `categoria_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 5, 2, NULL, NULL),
(6, 6, 2, NULL, NULL),
(7, 7, 2, NULL, NULL),
(8, 8, 2, NULL, NULL),
(9, 9, 3, NULL, NULL),
(10, 10, 3, NULL, NULL),
(11, 11, 3, NULL, NULL),
(12, 12, 3, NULL, NULL),
(13, 13, 4, NULL, NULL),
(14, 14, 4, NULL, NULL),
(15, 15, 4, NULL, NULL),
(16, 16, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `colors`
--

INSERT INTO `colors` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'white', '2022-08-22 20:50:29', '2022-08-22 20:50:29'),
(2, 'blue', '2022-08-22 20:50:29', '2022-08-22 20:50:29'),
(3, 'red', '2022-08-22 20:50:29', '2022-08-22 20:50:29'),
(4, 'black', '2022-08-22 20:50:30', '2022-08-22 20:50:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color_medida`
--

CREATE TABLE `color_medida` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `medida_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `color_medida`
--

INSERT INTO `color_medida` (`id`, `cantidad`, `color_id`, `medida_id`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 1, NULL, NULL),
(2, 10, 2, 1, NULL, NULL),
(3, 10, 3, 1, NULL, NULL),
(4, 10, 4, 1, NULL, NULL),
(5, 10, 1, 2, NULL, NULL),
(6, 10, 2, 2, NULL, NULL),
(7, 10, 3, 2, NULL, NULL),
(8, 10, 4, 2, NULL, NULL),
(9, 10, 1, 3, NULL, NULL),
(10, 10, 2, 3, NULL, NULL),
(11, 10, 3, 3, NULL, NULL),
(12, 10, 4, 3, NULL, NULL),
(13, 10, 1, 4, NULL, NULL),
(14, 10, 2, 4, NULL, NULL),
(15, 10, 3, 4, NULL, NULL),
(16, 10, 4, 4, NULL, NULL),
(17, 10, 1, 5, NULL, NULL),
(18, 10, 2, 5, NULL, NULL),
(19, 10, 3, 5, NULL, NULL),
(20, 10, 4, 5, NULL, NULL),
(21, 10, 1, 6, NULL, NULL),
(22, 10, 2, 6, NULL, NULL),
(23, 10, 3, 6, NULL, NULL),
(24, 10, 4, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color_producto`
--

CREATE TABLE `color_producto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `color_producto`
--

INSERT INTO `color_producto` (`id`, `cantidad`, `color_id`, `producto_id`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 10, NULL, NULL),
(2, 5, 2, 10, NULL, NULL),
(3, 4, 3, 10, NULL, NULL),
(4, 10, 4, 10, NULL, NULL),
(5, 10, 1, 14, NULL, NULL),
(6, 10, 2, 14, NULL, NULL),
(7, 10, 3, 14, NULL, NULL),
(8, 10, 4, 14, NULL, NULL),
(9, 10, 1, 18, NULL, NULL),
(10, 10, 2, 18, NULL, NULL),
(11, 10, 3, 18, NULL, NULL),
(12, 10, 4, 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagens`
--

CREATE TABLE `imagens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` bigint(20) UNSIGNED NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `imagens`
--

INSERT INTO `imagens` (`id`, `url`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`) VALUES
(1, 'productos/e6a0dadebfca2fce385c1e7d20cdb6c7.png', 1, 'App\\Models\\Producto', '2022-08-22 20:50:12', '2022-08-22 20:50:12'),
(2, 'productos/cd7e4d94fdf44a158664827fdae4b3ca.png', 2, 'App\\Models\\Producto', '2022-08-22 20:50:13', '2022-08-22 20:50:13'),
(3, 'productos/f2dd1f9dc5a6dd0d58a6d97a58274307.png', 3, 'App\\Models\\Producto', '2022-08-22 20:50:14', '2022-08-22 20:50:14'),
(4, 'productos/4dcadcc4e679f2370d0ec8e4a4e9d964.png', 4, 'App\\Models\\Producto', '2022-08-22 20:50:15', '2022-08-22 20:50:15'),
(5, 'productos/6ac1a0a1bbb0b1bff73e7892372bcc7c.png', 5, 'App\\Models\\Producto', '2022-08-22 20:50:16', '2022-08-22 20:50:16'),
(6, 'productos/d9fa51f9fbae429936413c1506da24a8.png', 6, 'App\\Models\\Producto', '2022-08-22 20:50:17', '2022-08-22 20:50:17'),
(7, 'productos/676763fca233dd8c63b91d092c320035.png', 7, 'App\\Models\\Producto', '2022-08-22 20:50:18', '2022-08-22 20:50:18'),
(8, 'productos/405bbee0577b6085c2a83c68297f84f1.png', 8, 'App\\Models\\Producto', '2022-08-22 20:50:19', '2022-08-22 20:50:19'),
(9, 'productos/2c74278420e7cd1b5b6052553395ea0a.png', 9, 'App\\Models\\Producto', '2022-08-22 20:50:20', '2022-08-22 20:50:20'),
(10, 'productos/6cffad67e757436599c25ffa09869366.png', 10, 'App\\Models\\Producto', '2022-08-22 20:50:20', '2022-08-22 20:50:20'),
(11, 'productos/5dace2834a4aee81f8e9a8a76f96e15b.png', 11, 'App\\Models\\Producto', '2022-08-22 20:50:21', '2022-08-22 20:50:21'),
(12, 'productos/d51b61e41a51bdf24859d71dca798f10.png', 12, 'App\\Models\\Producto', '2022-08-22 20:50:22', '2022-08-22 20:50:22'),
(13, 'productos/3dd846e6ceab7293fe2a11cb524ecceb.png', 13, 'App\\Models\\Producto', '2022-08-22 20:50:23', '2022-08-22 20:50:23'),
(14, 'productos/499b3d060dac620c7e3ad8b7c7098cc9.png', 14, 'App\\Models\\Producto', '2022-08-22 20:50:24', '2022-08-22 20:50:24'),
(15, 'productos/030f2b762c150b6f2977a879fa612d55.png', 15, 'App\\Models\\Producto', '2022-08-22 20:50:25', '2022-08-22 20:50:25'),
(16, 'productos/71117d15b00a05c4765fbf176bc7cae4.png', 16, 'App\\Models\\Producto', '2022-08-22 20:50:26', '2022-08-22 20:50:26'),
(17, 'productos/1f93124b70a6784d4df575b1c01b3581.png', 17, 'App\\Models\\Producto', '2022-08-22 20:50:27', '2022-08-22 20:50:27'),
(18, 'productos/5e3126f5eafa150ae67c34a2b51cb207.png', 18, 'App\\Models\\Producto', '2022-08-22 20:50:28', '2022-08-22 20:50:28'),
(19, 'productos/33a17ee54f2f0a89d2529cd16ac586b9.png', 19, 'App\\Models\\Producto', '2022-08-22 20:50:29', '2022-08-22 20:50:29'),
(20, 'productos/46c4e5ffa9f678ee86f00a422e599cd3.png', 20, 'App\\Models\\Producto', '2022-08-22 20:50:29', '2022-08-22 20:50:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'exercitationem', '2022-08-22 20:49:57', '2022-08-22 20:49:57'),
(2, 'iste', '2022-08-22 20:49:57', '2022-08-22 20:49:57'),
(3, 'quia', '2022-08-22 20:49:57', '2022-08-22 20:49:57'),
(4, 'neque', '2022-08-22 20:49:57', '2022-08-22 20:49:57'),
(5, 'expedita', '2022-08-22 20:49:58', '2022-08-22 20:49:58'),
(6, 'placeat', '2022-08-22 20:49:58', '2022-08-22 20:49:58'),
(7, 'non', '2022-08-22 20:49:58', '2022-08-22 20:49:58'),
(8, 'beatae', '2022-08-22 20:49:58', '2022-08-22 20:49:58'),
(9, 'accusantium', '2022-08-22 20:50:00', '2022-08-22 20:50:00'),
(10, 'et', '2022-08-22 20:50:00', '2022-08-22 20:50:00'),
(11, 'sed', '2022-08-22 20:50:00', '2022-08-22 20:50:00'),
(12, 'aut', '2022-08-22 20:50:00', '2022-08-22 20:50:00'),
(13, 'harum', '2022-08-22 20:50:01', '2022-08-22 20:50:01'),
(14, 'nemo', '2022-08-22 20:50:01', '2022-08-22 20:50:01'),
(15, 'et', '2022-08-22 20:50:01', '2022-08-22 20:50:01'),
(16, 'aliquam', '2022-08-22 20:50:01', '2022-08-22 20:50:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medidas`
--

INSERT INTO `medidas` (`id`, `nombre`, `producto_id`, `created_at`, `updated_at`) VALUES
(1, 'Ø98x10', 13, '2022-08-22 20:50:30', '2022-08-22 20:50:30'),
(2, 'Ø98x12', 13, '2022-08-22 20:50:30', '2022-08-22 20:50:30'),
(3, 'Ø98x14', 13, '2022-08-22 20:50:30', '2022-08-22 20:50:30'),
(4, 'Ø98x10', 16, '2022-08-22 20:50:30', '2022-08-22 20:50:30'),
(5, 'Ø98x12', 16, '2022-08-22 20:50:30', '2022-08-22 20:50:30'),
(6, 'Ø98x14', 16, '2022-08-22 20:50:30', '2022-08-22 20:50:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_08_19_013728_create_sessions_table', 1),
(7, '2022_08_19_015023_create_categorias_table', 1),
(8, '2022_08_19_015058_create_subcategorias_table', 1),
(9, '2022_08_19_015730_create_marcas_table', 1),
(10, '2022_08_19_015746_create_categoria_marca_table', 1),
(11, '2022_08_19_015815_create_productos_table', 1),
(12, '2022_08_19_015840_create_colors_table', 1),
(13, '2022_08_19_015855_create_color_producto_table', 1),
(14, '2022_08_19_015937_create_medidas_table', 1),
(15, '2022_08_19_015955_create_color_medida_table', 1),
(16, '2022_08_19_020856_create_imagens_table', 1),
(17, '2022_08_22_215435_create_sliders_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(8,2) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `estado` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `subcategoria_id` bigint(20) UNSIGNED NOT NULL,
  `marca_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `ruta`, `descripcion`, `precio`, `cantidad`, `estado`, `subcategoria_id`, `marca_id`, `created_at`, `updated_at`) VALUES
(1, 'Qui id sit.', 'qui-id-sit', 'Ut sed quia aut repellat praesentium similique saepe. Ea magni et doloribus error similique error nam. Voluptatem voluptatibus magni quam non consequatur fugiat.', 19.99, 15, '2', 4, 5, '2022-08-22 20:50:10', '2022-08-22 20:50:10'),
(2, 'Non et veniam.', 'non-et-veniam', 'In beatae non et blanditiis dolore consectetur. Repudiandae excepturi natus commodi voluptates aut.', 99.99, 15, '2', 5, 6, '2022-08-22 20:50:10', '2022-08-22 20:50:10'),
(3, 'Expedita voluptate ut.', 'expedita-voluptate-ut', 'Reiciendis dolorem id aut repellat dolorem animi. Libero nulla sit aut a libero. Est exercitationem qui quia sunt veniam tenetur.', 19.99, 15, '2', 8, 13, '2022-08-22 20:50:10', '2022-08-22 20:50:10'),
(4, 'Eos sit.', 'eos-sit', 'Voluptates similique voluptas praesentium. Pariatur aut sed est reiciendis non ut dolorem. Similique quod doloremque voluptatum aut iste quis ipsa ad. Fugiat ex tempore repudiandae.', 49.99, 15, '2', 4, 8, '2022-08-22 20:50:10', '2022-08-22 20:50:10'),
(5, 'Natus ducimus.', 'natus-ducimus', 'Nemo itaque et aliquid totam est repellat. Qui explicabo quis omnis. Animi maiores vitae ut et a. Asperiores autem optio nemo quis. Ullam eos dolorum officiis fugit tempora ad non incidunt.', 99.99, 15, '2', 5, 6, '2022-08-22 20:50:10', '2022-08-22 20:50:10'),
(6, 'Ab est.', 'ab-est', 'Repellat asperiores facere ut ipsam. Necessitatibus excepturi nemo odio fugiat aperiam reiciendis quam. Adipisci ullam consequatur illum cum sunt sed.', 19.99, 15, '2', 8, 14, '2022-08-22 20:50:10', '2022-08-22 20:50:10'),
(7, 'Non qui.', 'non-qui', 'Dolorem similique sunt doloremque ipsa. Et illo quod mollitia dolorem quam ea. Expedita non dolor ex et eos consequuntur.', 19.99, 15, '2', 5, 6, '2022-08-22 20:50:10', '2022-08-22 20:50:10'),
(8, 'Aperiam fugiat.', 'aperiam-fugiat', 'Reiciendis optio in et aut. Odit quia est aut et exercitationem sint est. Sit quos animi totam error aut. Est doloremque non molestias error. Numquam ducimus sed ipsam.', 99.99, 15, '2', 7, 15, '2022-08-22 20:50:10', '2022-08-22 20:50:10'),
(9, 'Est error tenetur.', 'est-error-tenetur', 'Provident magnam aut reiciendis eum commodi. Omnis itaque ipsum cumque adipisci delectus. Earum dolor unde modi impedit.', 99.99, 15, '2', 8, 13, '2022-08-22 20:50:10', '2022-08-22 20:50:10'),
(10, 'YOp Eos nisi.', 'eos-nisi', 'Vero quas iure voluptatum. Provident dolor illo deserunt. Qui fugit rerum voluptate animi eos rerum illo. Repudiandae maiores quas consequuntur voluptatem.', 19.99, NULL, '2', 1, 4, '2022-08-22 20:50:10', '2022-08-22 20:50:10'),
(11, 'Alias modi.', 'alias-modi', 'Dolor est ut dolores est esse et. Est fugit iusto rem soluta facere. Sed placeat repellendus commodi animi. Qui tenetur ut maiores asperiores soluta.', 99.99, 15, '2', 7, 13, '2022-08-22 20:50:10', '2022-08-22 20:50:10'),
(12, 'Aut dolores.', 'aut-dolores', 'Ab vero sint commodi similique recusandae. Blanditiis aut illum non natus excepturi sit et. Necessitatibus laborum corporis aliquam et.', 99.99, 15, '2', 8, 14, '2022-08-22 20:50:10', '2022-08-22 20:50:10'),
(13, 'Soluta rem ut.', 'soluta-rem-ut', 'Amet aut laboriosam beatae quos. Tenetur quisquam porro a eos. Quis dolore molestias iusto sed rerum et. Dolorem quae dolore ab dolore fugiat iure enim aut.', 49.99, NULL, '2', 6, 10, '2022-08-22 20:50:11', '2022-08-22 20:50:11'),
(14, 'Qui doloribus in.', 'qui-doloribus-in', 'Sunt non soluta voluptatem laudantium enim laborum eius. In saepe qui distinctio nam maxime quae. Enim debitis aliquam ex. Autem quia sequi dolorum dignissimos voluptate placeat soluta.', 49.99, NULL, '2', 1, 1, '2022-08-22 20:50:11', '2022-08-22 20:50:11'),
(15, 'Illo est voluptatem.', 'illo-est-voluptatem', 'Consequatur eius rerum et eligendi. Ea maiores velit sunt ut quia. Eos hic non est molestiae mollitia qui aut consequatur.', 99.99, 15, '2', 4, 6, '2022-08-22 20:50:11', '2022-08-22 20:50:11'),
(16, 'Qui ut qui.', 'qui-ut-qui', 'Sunt ipsum sit quasi dolores accusamus vel possimus. Ut nemo facere qui eius incidunt soluta. Doloribus dolor odit voluptas ut ipsam.', 19.99, NULL, '2', 6, 10, '2022-08-22 20:50:11', '2022-08-22 20:50:11'),
(17, 'Voluptas doloremque.', 'voluptas-doloremque', 'Corporis incidunt ex ducimus minima. Rerum architecto consequatur nostrum. Corporis dicta tenetur ducimus inventore error quia dolorum. Ut voluptatum dolor sed ea dignissimos corrupti et.', 19.99, 15, '2', 5, 7, '2022-08-22 20:50:11', '2022-08-22 20:50:11'),
(18, 'Nemo et.', 'nemo-et', 'Est quod quos placeat aspernatur mollitia repudiandae iure. Aliquid odit distinctio enim. Minima autem inventore unde voluptas autem dolor. Dolores nam amet consequatur consectetur dolorum.', 99.99, NULL, '2', 1, 4, '2022-08-22 20:50:11', '2022-08-22 20:50:11'),
(19, 'Sit aut praesentium.', 'sit-aut-praesentium', 'Maxime ad quia cupiditate non. Et recusandae itaque dolor aliquam eveniet ducimus odit sint. Quia minus est magnam qui. Rerum quis libero recusandae.', 99.99, 15, '2', 8, 16, '2022-08-22 20:50:11', '2022-08-22 20:50:11'),
(20, 'Earum ea repudiandae.', 'earum-ea-repudiandae', 'Ut similique similique beatae et sint tempora ut. Ea eos eos similique consectetur in culpa corporis eum. Facere consequuntur ipsa fugit consequatur optio. Id qui qui tempora est corporis voluptates.', 19.99, 15, '2', 3, 3, '2022-08-22 20:50:11', '2022-08-22 20:50:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('39MnzGTTBAsU7BdpFjF4CZpbgSLYKMxf4O9I1HiG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSUt0Z200VkczTHBaQkp3Y1Q4c09hekdQeDk2ajI3OUl0VlJBQ1ZxVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJyaXRvLWNvbXByYXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjQ6ImNhcnQiO2E6MTp7czo3OiJkZWZhdWx0IjtPOjI5OiJJbGx1bWluYXRlXFN1cHBvcnRcQ29sbGVjdGlvbiI6Mjp7czo4OiIAKgBpdGVtcyI7YToxOntzOjMyOiJkNDkwMDQ0OGE5YjYyNTA4YTQzN2IyN2RiZTQ2ZGU5MiI7TzozMjoiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0iOjExOntzOjU6InJvd0lkIjtzOjMyOiJkNDkwMDQ0OGE5YjYyNTA4YTQzN2IyN2RiZTQ2ZGU5MiI7czoyOiJpZCI7aToxO3M6MzoicXR5IjtpOjI7czo0OiJuYW1lIjtzOjExOiJRdWkgaWQgc2l0LiI7czo1OiJwcmljZSI7ZDoxOS45OTtzOjY6IndlaWdodCI7ZDo1NTA7czo3OiJvcHRpb25zIjtPOjM5OiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbU9wdGlvbnMiOjI6e3M6ODoiACoAaXRlbXMiO2E6NDp7czo4OiJjb2xvcl9pZCI7TjtzOjk6Im1lZGlkYV9pZCI7TjtzOjg6ImNhbnRpZGFkIjtpOjE1O3M6NjoiaW1hZ2VuIjtzOjc2OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvc3RvcmFnZS9wcm9kdWN0b3MvZTZhMGRhZGViZmNhMmZjZTM4NWMxZTdkMjBjZGI2YzcucG5nIjt9czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO31zOjc6InRheFJhdGUiO2k6MjE7czo0OToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGFzc29jaWF0ZWRNb2RlbCI7TjtzOjQ2OiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AZGlzY291bnRSYXRlIjtpOjA7czo4OiJpbnN0YW5jZSI7czo3OiJkZWZhdWx0Ijt9fXM6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDt9fX0=', 1661467507);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible, 1=oculto',
  `posicion` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `titulo`, `descripcion`, `imagen`, `ruta`, `estado`, `posicion`, `created_at`, `updated_at`) VALUES
(1, 'Titulo 1', 'Descripción 1', 'imagenes/slider/slider1.jpg', 'registrate1', 0, 1, NULL, NULL),
(2, 'Titulo 2', 'Descripción 2', 'imagenes/slider/slider2.jpg', 'registrate2', 0, 0, NULL, NULL),
(3, 'Titulo 3', 'Descripción 3', 'imagenes/slider/slider3.jpg', 'registrate3', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` tinyint(1) NOT NULL DEFAULT 0,
  `medida` tinyint(1) NOT NULL DEFAULT 0,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `nombre`, `ruta`, `imagen`, `color`, `medida`, `categoria_id`, `created_at`, `updated_at`) VALUES
(1, 'Rayos x Portatil', 'rayos-x-portatil', 'subcategorias/d3eeb182ad496408e7418059d35594b5.png', 1, 0, 1, '2022-08-22 20:50:02', '2022-08-22 20:50:02'),
(2, 'Sensor RVG', 'sensor-rvg', 'subcategorias/ef858155b70ec66ca40e10bec93c478e.png', 0, 0, 1, '2022-08-22 20:50:03', '2022-08-22 20:50:03'),
(3, 'Digitalizador Intraoral', 'digitalizador-intraoral', 'subcategorias/864fc4fdd748e9c56860326cbc377366.png', 0, 0, 1, '2022-08-22 20:50:04', '2022-08-22 20:50:04'),
(4, 'Vatech', 'vatech', 'subcategorias/d4a5f984d6c7242a445810040ffb6c10.png', 0, 0, 2, '2022-08-22 20:50:05', '2022-08-22 20:50:05'),
(5, 'Pointnix', 'pointnix', 'subcategorias/3ec376fed75ca8e11d82bc7ab93d2308.png', 0, 0, 2, '2022-08-22 20:50:06', '2022-08-22 20:50:06'),
(6, 'Zirconia', 'zirconia', 'subcategorias/17dc614272e0f07b6eb2fd09f4826780.png', 1, 1, 3, '2022-08-22 20:50:07', '2022-08-22 20:50:07'),
(7, 'Point Implant ', 'point-implant', 'subcategorias/6454413019dbcfeefcd1e818a00dfcab.png', 0, 0, 4, '2022-08-22 20:50:08', '2022-08-22 20:50:08'),
(8, 'Megagen', 'megagen', 'subcategorias/6395fcc376142baa01b9a90a5da579df.png', 0, 0, 4, '2022-08-22 20:50:09', '2022-08-22 20:50:09'),
(9, 'Kuwotech', 'kuwotech', 'subcategorias/0e309d5b9a8999f27ed370b59d33604d.png', 0, 0, 4, '2022-08-22 20:50:10', '2022-08-22 20:50:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Emerson Smith', 'mersmith14@gmail.com', NULL, '$2y$10$dtq738fAxY17RT08CJnrseIOxm2T1yxMfz6pSWolbtqTvFeHWFosO', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-22 20:49:56', '2022-08-22 20:49:56');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_marca`
--
ALTER TABLE `categoria_marca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_marca_marca_id_foreign` (`marca_id`),
  ADD KEY `categoria_marca_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `color_medida`
--
ALTER TABLE `color_medida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_medida_color_id_foreign` (`color_id`),
  ADD KEY `color_medida_medida_id_foreign` (`medida_id`);

--
-- Indices de la tabla `color_producto`
--
ALTER TABLE `color_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_producto_color_id_foreign` (`color_id`),
  ADD KEY `color_producto_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medidas_producto_id_foreign` (`producto_id`);

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
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_subcategoria_id_foreign` (`subcategoria_id`),
  ADD KEY `productos_marca_id_foreign` (`marca_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategorias_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categoria_marca`
--
ALTER TABLE `categoria_marca`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `color_medida`
--
ALTER TABLE `color_medida`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `color_producto`
--
ALTER TABLE `color_producto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria_marca`
--
ALTER TABLE `categoria_marca`
  ADD CONSTRAINT `categoria_marca_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categoria_marca_marca_id_foreign` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `color_medida`
--
ALTER TABLE `color_medida`
  ADD CONSTRAINT `color_medida_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `color_medida_medida_id_foreign` FOREIGN KEY (`medida_id`) REFERENCES `medidas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `color_producto`
--
ALTER TABLE `color_producto`
  ADD CONSTRAINT `color_producto_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `color_producto_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD CONSTRAINT `medidas_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_marca_id_foreign` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`),
  ADD CONSTRAINT `productos_subcategoria_id_foreign` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategorias` (`id`);

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `subcategorias_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
