-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 07-10-2025 a las 18:37:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u445672402_puppets`
--
CREATE DATABASE IF NOT EXISTS `u445672402_puppets` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `u445672402_puppets`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

DROP TABLE IF EXISTS `citas`;
CREATE TABLE `citas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pet_id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `mensaje` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `user_id`, `pet_id`, `fecha`, `hora`, `mensaje`, `created_at`, `updated_at`, `estado`) VALUES
(1, 9, 4, '2025-09-26', '08:20:00', 'es mio', '2025-09-11 14:16:04', '2025-09-30 06:53:28', 3),
(2, 9, 3, '2025-09-20', '08:43:00', 'es mio', '2025-09-11 14:43:28', '2025-09-30 06:53:30', 0),
(3, 10, 6, '2025-09-12', '08:34:00', 'es nervisos, Sesión de nudos', '2025-09-11 19:34:12', '2025-09-11 19:34:12', 1),
(4, 12, 8, '2025-10-15', '08:34:00', 'anti pulgas', '2025-10-03 04:35:39', '2025-10-03 04:35:39', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ganancias`
--

DROP TABLE IF EXISTS `ganancias`;
CREATE TABLE `ganancias` (
  `id` int(10) NOT NULL,
  `id_products` int(255) NOT NULL,
  `cobro` float NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `pago_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ganancias`
--

INSERT INTO `ganancias` (`id`, `id_products`, `cobro`, `fecha`, `pago_id`) VALUES
(1, 5, 12, '2025-10-03 09:41:42', 0),
(2, 5, 12, '2025-10-03 09:42:17', 0),
(3, 5, 12, '2025-10-03 09:45:21', 3),
(4, 4, 25, '2025-10-03 09:45:22', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_05_27_152936_create_sessions_table', 1),
(2, '2025_05_28_002710_create_cache_table', 1),
(3, '2025_05_28_002727_create_jobs_table', 1),
(4, '2025_08_31_050454_create_users_table', 1),
(5, '2025_09_01_051928_create_pets_table', 2),
(6, '2025_08_31_062800_create_appointments_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE `pagos` (
  `id` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `productos` varchar(1000) NOT NULL,
  `total` float NOT NULL,
  `fecha_hora` varchar(100) NOT NULL,
  `estado` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `id_user`, `productos`, `total`, `fecha_hora`, `estado`) VALUES
(1, 12, '\"{\\\"6-N\\\\\\/A\\\":{\\\"id\\\":6,\\\"name\\\":\\\"Pelota para entrenar\\\",\\\"quantity\\\":\\\"1\\\",\\\"price\\\":\\\"8.00\\\",\\\"image\\\":\\\"images\\\\\\/products\\\\\\/1758421605.jpg\\\",\\\"size\\\":\\\"N\\\\\\/A\\\"}}\"', 8, '2025-10-03 07:51:15', 1),
(2, 12, '[{\"id\":4,\"name\":\"Pechera Rosa\",\"quantity\":\"1\",\"price\":\"25.00\",\"image\":\"images\\/products\\/1758421538.jpg\",\"size\":\"N\\/A\"}]', 25, '2025-10-03 09:22:14', 0),
(3, 12, '\"{\\\"5-N\\\\\\/A\\\":{\\\"id\\\":5,\\\"name\\\":\\\"Conjuto de toallas\\\",\\\"quantity\\\":\\\"1\\\",\\\"price\\\":\\\"12.00\\\",\\\"image\\\":\\\"images\\\\\\/products\\\\\\/1758421570.jpg\\\",\\\"size\\\":\\\"N\\\\\\/A\\\"}}\"', 12, '2025-10-03 09:23:04', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pets`
--

DROP TABLE IF EXISTS `pets`;
CREATE TABLE `pets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `especie` varchar(255) NOT NULL,
  `raza` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pets`
--

INSERT INTO `pets` (`id`, `user_id`, `especie`, `raza`, `nombre`, `color`, `fecha_nacimiento`, `created_at`, `updated_at`) VALUES
(3, 9, 'Perro', 'Chihuahua', 'nunu', 'verdoso', '2025-08-22', '2025-09-11 09:31:46', '2025-09-11 09:31:46'),
(4, 9, 'Gato', 'Mestizo', 'gato', 'tipo naranjoso con verde', '2025-08-15', '2025-09-11 12:34:53', '2025-09-11 12:34:53'),
(5, 9, 'Perro', 'Pastor Alemán', 'Hus', 'ddd', '2025-09-13', '2025-09-11 13:59:24', '2025-09-11 13:59:24'),
(6, 10, 'Perro', 'Pastor Alemán', 'kk', 'negro', '2025-11-15', '2025-09-11 19:33:27', '2025-09-11 19:33:27'),
(7, 11, 'Perro', 'Golden Retriever', 'castillo', 'es blaquito ojos de color', '2006-01-13', '2025-09-23 07:53:55', '2025-09-23 07:53:55'),
(8, 12, 'Perro', 'Golden Retriever', 'Gabriel', 'es blaquito ojos de color', '2025-09-30', '2025-10-03 04:34:34', '2025-10-03 04:34:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categoria` varchar(100) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `color` varchar(100) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `talla_S` int(10) NOT NULL DEFAULT 0,
  `talla_M` int(10) NOT NULL DEFAULT 0,
  `talla_L` int(10) NOT NULL DEFAULT 0,
  `talla_XL` int(10) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `categoria`, `name`, `description`, `price`, `color`, `stock`, `talla_S`, `talla_M`, `talla_L`, `talla_XL`, `image`, `estado`) VALUES
(2, '2025-09-21 08:21:21', '2025-10-03 02:01:29', 'Higiene', 'Shampo 200ml', 'Shampo suave y protector para perrito de 200 ml', 12.00, '', 101, 0, 0, 0, 0, 'images/products/1758421281.jpg', 1),
(3, '2025-09-21 08:24:58', '2025-09-21 08:24:58', 'Higiene', 'espuma seca', 'Espuma seca para el lavado e higiene de tu canino en epocas frias!!', 8.00, '', 200, 0, 0, 0, 0, 'images/products/1758421498.jpg', 1),
(4, '2025-09-21 08:25:38', '2025-10-03 15:45:22', 'Accesorio', 'Pechera Rosa', 'Bonita pechera de color rosa talla M para perros medianos', 25.00, 'rosa', 24, 0, 0, 0, 0, 'images/products/1758421538.jpg', 1),
(5, '2025-09-21 08:26:10', '2025-10-03 15:45:21', 'Higiene', 'Conjuto de toallas', 'Paquete de 3 colores de toallas suaves de tamano mediano', 12.00, 'multicolor', 98, 0, 0, 0, 0, 'images/products/1758421570.jpg', 1),
(6, '2025-09-21 08:26:45', '2025-09-21 08:26:45', 'Juguete', 'Pelota para entrenar', 'Pelota de color verde para entrenar y hacer de las comidas divertidas', 8.00, 'verde', 100, 0, 0, 0, 0, 'images/products/1758421605.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(10) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `role`, `created_at`, `updated_at`, `estado`) VALUES
(7, 'davidagreda@gmail.com', 'dagreda12', '$2y$12$5g241GjlSI3TjZd9HiC1.OeOg8WVGDEQfwfuGQ6KrWYQt41985t0G', 0, '2025-08-31 13:14:04', '2025-08-31 13:14:04', 1),
(9, 'gustavomcastillo120@gmail.com', 'usuario', '$2y$12$UxqGQPkR1vJqMr8ChVa0aO4vd7NyEOSSP4zAoZWZUT0fHAKCTHRkC', 0, '2025-09-11 06:06:54', '2025-09-11 06:06:54', 1),
(10, 'thecastillo120@gmail.com', 'castillo', '$2y$12$qYq3b2EBCv7Q/neuquRFnexdWIowbuzo40AD.Os43oX1TESbZ.ylK', 0, '2025-09-11 06:15:32', '2025-09-11 06:15:32', 1),
(11, 'yohalmodaniel16@gmail.com', 'Yohita', '$2y$12$B8hSQGoivKaeVPOb9Lj70.H8QatIwJRx/3Kw9CF.2zKKLZEoe4vfq', 1, '2025-09-23 07:52:10', '2025-09-23 07:52:10', 1),
(12, 'user.puppets@gmail.com', 'User', '$2y$12$Fw50RJ8JiEst4Ax35wlq1uMMhFqe5tDWt9QIqEhJ9K6GnmCnLK37S', 0, '2025-10-03 01:56:32', '2025-10-03 01:56:32', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `citas_user_id_foreign` (`user_id`),
  ADD KEY `citas_pet_id_foreign` (`pet_id`);

--
-- Indices de la tabla `ganancias`
--
ALTER TABLE `ganancias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pets_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ganancias`
--
ALTER TABLE `ganancias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pets`
--
ALTER TABLE `pets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_pet_id_foreign` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `citas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
