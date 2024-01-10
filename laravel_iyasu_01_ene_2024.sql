-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-01-2024 a las 22:58:27
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laravel_iyasu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonos_clientes`
--

DROP TABLE IF EXISTS `abonos_clientes`;
CREATE TABLE IF NOT EXISTS `abonos_clientes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tratamiento` bigint UNSIGNED DEFAULT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_tratamiento` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saldo_actual` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_abono` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saldo` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsable` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `abonos_clientes_id_tratamiento_index` (`id_tratamiento`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `abonos_clientes`
--

INSERT INTO `abonos_clientes` (`id`, `id_cliente`, `user_id`, `id_tratamiento`, `nombre`, `celular`, `valor_tratamiento`, `saldo_actual`, `valor_abono`, `saldo`, `responsable`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
(4, '3', '1', 3, 'Luz Enith Calvo Villada', '3394209 - 3132403460', '890000', '890000', '90000', '800000', 'Heberth Mazuera Arana', 'terapia neural,lodoterapia,colonterapia', NULL, '2023-12-04 05:30:36', '2023-12-04 05:30:36'),
(5, '11', '1', 4, 'Lorena Rentería Martinez', '3334228 - 31233593482', '370000', '370000', '50000', '320000', 'Heberth Mazuera Arana', 'control,terapia con imanes', NULL, '2023-12-04 05:32:01', '2023-12-04 05:32:01'),
(6, '3', '1', 3, 'Luz Enith Calvo Villada', '3394209 - 3132403460', '890000', '800000', '20000', '780000', 'Heberth Mazuera Arana', 'terapia neural,lodoterapia,colonterapia', NULL, '2023-12-04 22:20:10', '2023-12-04 22:20:10'),
(7, '11', '1', 4, 'Lorena Rentería Martinez', '3334228 - 31233593482', '370000', '320000', '220000', '100000', 'Heberth Mazuera Arana', 'control,terapia con imanes', NULL, '2023-12-06 23:17:00', '2023-12-06 23:17:00'),
(8, '3', '1', 3, 'Luz Enith Calvo Villada', '3394209 - 3132403460', '890000', '780000', '80000', '700000', 'Heberth Mazuera Arana', 'terapia neural,lodoterapia,colonterapia', NULL, '2023-12-06 23:22:43', '2023-12-06 23:22:43'),
(9, '11', '1', 4, 'Lorena Rentería Martinez', '3334228 - 31233593482', '370000', '100000', '40000', '60000', 'Heberth Mazuera Arana', 'control,terapia con imanes', NULL, '2023-12-07 04:54:49', '2023-12-07 04:54:49'),
(10, '3', '1', 3, 'Luz Enith Calvo Villada', '3394209 - 3132403460', '890000', '700000', '20000', '680000', 'Heberth Mazuera Arana', 'terapia neural,lodoterapia,colonterapia', NULL, '2023-12-07 04:57:16', '2023-12-07 04:57:16'),
(11, '5', '1', 5, 'Luisa Isabel Rojas Mesa', '2434392 - 3124394288', '560000', '560000', '60000', '500000', 'Heberth Mazuera Arana', 'colonterapia - lodoterapia,masaje', NULL, '2023-12-07 05:03:39', '2023-12-07 05:03:39'),
(12, '5', '1', 5, 'Luisa Isabel Rojas Mesa', '2434392 - 3124394288', '560000', '500000', '40000', '460000', 'Heberth Mazuera Arana', NULL, NULL, '2023-12-07 16:02:48', '2023-12-07 16:02:48'),
(13, '5', '1', 5, 'Luisa Isabel Rojas Mesa', '2434392 - 3124394288', '560000', '460000', '30000', '430000', 'Heberth Mazuera Arana', NULL, NULL, '2023-12-07 16:11:23', '2023-12-07 16:11:23'),
(14, '5', '1', 5, 'Luisa Isabel Rojas Mesa', '2434392 - 3124394288', '560000', '430000', '60000', '370000', 'Heberth Mazuera Arana', NULL, NULL, '2023-12-25 16:47:09', '2023-12-25 16:47:09'),
(15, '5', '1', 5, 'Luisa Isabel Rojas Mesa', '2434392 - 3124394288', '560000', '370000', '70000', '300000', 'Heberth Mazuera Arana', NULL, NULL, '2023-12-25 16:49:05', '2023-12-25 16:49:05'),
(16, '3', '1', 3, 'Luz Enith Calvo Villada', '3394209 - 3132403460', '890000', '680000', '50000', '630000', 'Heberth Mazuera Arana', 'terapia neural,lodoterapia,colonterapia', NULL, '2023-12-25 16:55:58', '2023-12-25 16:55:58'),
(17, '11', '1', 4, 'Lorena Rentería Martinez', '3334228 - 31233593482', '370000', '60000', '60000', '0', 'Heberth Mazuera Arana', 'control,terapia con imanes', NULL, '2023-12-25 18:48:38', '2023-12-25 18:48:38'),
(18, '6', '1', 7, 'Nora Elena Contreras Medina', '3354928 - 3115435492', '830000', '830000', '30000', '800000', 'Heberth Mazuera Arana', 'auriculoterapia,masaje,lavado', NULL, '2023-12-26 23:36:32', '2023-12-26 23:36:32'),
(19, '3', '1', 3, 'Luz Enith Calvo Villada', '3394209 - 3132403460', '890000', '630000', '40000', '590000', 'Heberth Mazuera Arana', 'terapia neural,lodoterapia,colonterapia', NULL, '2023-12-31 16:45:58', '2023-12-31 16:45:58');

--
-- Disparadores `abonos_clientes`
--
DROP TRIGGER IF EXISTS `actualizar_saldo`;
DELIMITER $$
CREATE TRIGGER `actualizar_saldo` AFTER INSERT ON `abonos_clientes` FOR EACH ROW UPDATE registrar_tratamientos SET 
saldo = NEW.saldo,
updated_at = NOW()

WHERE id = new.id_tratamiento
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `editar_abono`;
DELIMITER $$
CREATE TRIGGER `editar_abono` BEFORE UPDATE ON `abonos_clientes` FOR EACH ROW UPDATE abonos_clientes SET 
saldo = new.saldo
where id = new.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `cedula` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_historia` bigint NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barrio` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municipio` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `clientes_cedula_unique` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cedula`, `user_id`, `id_historia`, `fecha_nacimiento`, `edad`, `nombre`, `direccion`, `barrio`, `municipio`, `celular`, `email`, `estado`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '11111111', '1', 0, '1991-02-12', '32 Años', 'diana milena soto medina', 'calle 21 # 2 - 60', 'los pinos', 'Andalucía', '3343923', 'dianamilenasoto@gmail.com', 1, '2023-07-11 22:12:08', '2023-07-20 04:28:12', NULL),
(2, '312221201', '1', 0, '1995-07-21', '27 Años', 'inés castrillón panesso', 'cra 34  #  21 - 10', 'las camelias', 'Cartago', '3444539 - 3115349222', 'inescalderon@gmail.com', 1, '2023-07-11 23:06:55', '2023-07-11 23:32:29', NULL),
(3, '22222222', '1', 0, '1991-09-23', '31 Años', 'luz enith calvo villada', 'cra 4 # 12 - 40', 'los pinos', 'Cartago', '3394209 - 3132403460', 'luzenithcalvo@gmail.com', 1, '2023-08-24 16:08:36', '2023-08-28 02:47:48', NULL),
(4, '33333333', '1', 0, '1992-09-12', '30 Años', 'lina maria barreiro morales', 'calle 12 # 42 - 12', 'los pinos', 'Cali', '3349284 - 31244953438', 'linabarreiro@gmail.com', 1, '2023-08-31 03:54:35', '2023-12-05 21:38:09', NULL),
(5, '444444444', '1', 0, '1991-10-19', '31 Años', 'luisa isabel rojas molano', 'calle 34 #  23 - 20', 'los olivos', 'Obando', '2434392 - 3124394288', 'luisarojas@gmail.com', 1, '2023-09-20 04:02:14', '2024-01-02 23:58:18', NULL),
(6, '55555555', '1', 0, '1982-11-12', '40 Años', 'nora elena contreras medina', 'cra 4 # 2 - 12', 'el nogal', 'El dóvio', '3354928 - 3115435492', 'noracontreras@gmail.com', 1, '2023-09-20 04:05:17', '2023-09-20 04:05:17', NULL),
(7, '66666666', '1', 0, '1969-09-15', '54 Años', 'alisa mora dominguez', 'cra 34  #  21 - 10', 'los almendros', 'Dagua', '4432304 - 3135453948', 'alisamora@hotmail.com', 1, '2023-09-20 04:10:09', '2023-09-20 04:10:09', NULL),
(8, '77777777', '1', 0, '1990-10-14', '32 Años', 'alejandra forero triana', 'calle 21 # 2 - 60', 'los pinos', 'Bugalagrande', '3243953 - 3114352390', 'alejandraforero@gmail.com', 1, '2023-09-20 04:13:56', '2023-12-23 05:05:18', NULL),
(9, '88888888', '1', 0, '1980-01-12', '43 Años', 'martha isabel correa molina', 'calle 12 # 42 - 12', 'los pinos', 'Alcala', '4343329 - 3134309534', 'marthacorrea@gmail.com', 1, '2023-09-20 05:35:07', '2023-09-20 05:35:07', NULL),
(10, '7777777', '1', 0, '1992-01-12', '31 Años', 'lorena rentería mosquera', 'calle 34 # 12 - 20', 'los naranjos', 'Cartago', '4334482 - 3115429012', 'lorenarenteria@gmail.com', 1, '2023-10-10 05:34:20', '2023-10-27 03:43:41', NULL),
(11, '12121212', '1', 0, '1980-11-12', '42 Años', 'lorena rentería martinez', 'calle 34 # 21 - 30', 'los pinos', 'Cartago', '3334228 - 31233593482', 'lorenarenteria@gmail.com', 1, '2023-10-12 15:21:59', '2023-10-12 15:21:59', NULL),
(12, '212121212', '1', 0, '1991-11-10', '31 Años', 'clara isabel montero restrepo', 'calle 34 #  23 - 45', 'el nogal', 'Cali', '2943490 - 31345939538', 'claramontero@gmail.com', 1, '2023-10-18 03:28:17', '2023-10-21 20:22:47', NULL),
(13, '31313131', '1', 0, '1982-11-10', '40 Años', 'juliana andrea porras mesa', 'cra 4 # 12 - 20', 'los pinos', 'Florida', '3345670 - 3124305390', 'julianaporras@gmail.com', 1, '2023-10-18 03:31:47', '2023-10-18 03:31:47', NULL),
(14, '33232323', '1', 0, '1991-03-12', '32 Años', 'sandra rosales ortega', 'calle 34 # 12 - 20', 'las camelias', 'Caicedonia', '4340349 - 31143969358', 'sandrarosales@gmail.com', 1, '2023-10-18 03:59:32', '2023-10-18 03:59:32', NULL),
(15, '44444444', '1', 0, '1980-12-01', '42 Años', 'elizabeth estacio dominguez', 'calle 21 # 2 - 60', 'camino real', 'Cali', '4439432 - 3115435940', 'elizabethdominguez@gmail.com', 1, '2023-10-18 04:04:17', '2023-10-18 04:04:17', NULL),
(16, '32323232', '1', 0, '1960-01-12', '63 Años', 'manuela gonzález rodriguez', 'calle 21 # 2 - 60', 'los molinos', 'Alcala', '4354053 - 3136304249', 'manuelagonzalez@gmail.com', 1, '2023-10-18 04:08:07', '2023-10-18 04:08:07', NULL),
(17, '65656565', '1', 0, '1980-12-14', '42 Años', 'ana lucia morales triana', 'cra 45 # 12 - 20', 'los ocobos', 'Cali', '4435693 - 3113539528', 'analuciamorales@gmail.com', 1, '2023-11-08 22:16:55', '2023-11-30 21:42:37', NULL),
(18, '42424242', '1', 0, '1991-01-24', '32 Años', 'laura medina dominguez', 'cra 23 # 12 - 30', 'los pinos', 'Cartago', '4453264 - 313060339', 'lauramedina@gmail.com', 1, '2023-12-03 04:09:47', '2023-12-03 04:09:47', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controles`
--

DROP TABLE IF EXISTS `controles`;
CREATE TABLE IF NOT EXISTS `controles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cliente` int UNSIGNED NOT NULL,
  `id_historia` bigint DEFAULT NULL,
  `num_control` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peso` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abd` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grasa` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agua` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `controles_id_cliente_index` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controles_historias`
--

DROP TABLE IF EXISTS `controles_historias`;
CREATE TABLE IF NOT EXISTS `controles_historias` (
  `id_control` bigint UNSIGNED NOT NULL,
  `id_historia` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_control`,`id_historia`),
  KEY `controles_historias_id_historia_foreign` (`id_historia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripciones`
--

DROP TABLE IF EXISTS `descripciones`;
CREATE TABLE IF NOT EXISTS `descripciones` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_factura` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsable` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saldo` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripciones_facturas`
--

DROP TABLE IF EXISTS `descripciones_facturas`;
CREATE TABLE IF NOT EXISTS `descripciones_facturas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_facturas` bigint UNSIGNED NOT NULL,
  `id_descripciones` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `descripciones_facturas_id_facturas_foreign` (`id_facturas`),
  KEY `descripciones_facturas_id_descripciones_foreign` (`id_descripciones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `userId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `cliente` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `userId`, `title`, `start`, `end`, `cliente`, `telefono`, `descripcion`, `medico`, `color`, `created_at`, `updated_at`) VALUES
(1, '1', 'auriculoterapia', '2023-07-19 11:00:00', '2023-07-11 11:30:00', 'inés castrillón panesso', '3444539 - 3115349302', 'presenta dolor en espalda desde hace 3 días', 'eliana mora correa', '#c2bd1e', NULL, '2023-07-12 04:08:09'),
(2, '1', 'colonterapia', '2023-07-11 08:00:00', '2023-07-11 08:30:00', 'diana milena soto medina', '3343923', 'presenta dolor en espalda desde hace 2 días', 'eliana mora correa', '#5e66d4', NULL, NULL),
(3, '1', 'auriculoterapia', '2023-08-14 07:30:00', '2023-08-14 08:00:00', 'diana milena soto medina', '3343923', 'Presenta dolor en espalda desde hace 2 días', 'eliana mora correa', '#c2bd1e', NULL, NULL),
(4, '1', 'auriculoterapia', '2023-08-24 07:30:00', '2023-08-24 08:00:00', 'diana milena soto medina', '3343923', 'Presenta dolor en pierna derecha', 'eliana mora correa', '#f05724', NULL, NULL),
(5, '1', 'colonterapia', '2023-08-24 08:30:00', '2023-08-24 09:00:00', 'diana milena soto medina', '3433448 - 311143053895', 'Desde hace 2 días presenta dolor espalda', 'enrique rosales aldana', '#5e66d4', NULL, NULL),
(6, '1', 'auriculoterapia', '2023-08-25 07:30:00', '2023-08-25 08:00:00', 'luz enih calvo villada', '3394209 - 3132403460', 'Presenta dolor en espalda', 'enrique rosales aldana', '#33997a', NULL, '2023-08-25 09:34:54'),
(7, '1', 'colonterapia - lodoterapia', '2023-08-25 08:30:00', '2023-08-25 09:00:00', 'diana milena soto medina', '3343923', 'presenta dolor en pierna derecha', 'luisa fernanda correa dominguez', '#9602c7', NULL, '2023-08-25 09:34:38'),
(8, '1', 'colonterapia', '2023-08-27 07:30:00', '2023-08-27 08:00:00', 'luz enih calvo villada', '3394209 - 3132403460', 'Presenta dolor en pierna derecha', 'patricia ríos solarte', '#5e66d4', NULL, NULL),
(9, '1', 'biomagnetismo', '2023-08-27 08:00:00', '2023-08-27 08:30:00', 'diana milena soto medina', '3343923', 'Ninguno', 'luisa fernanda correa dominguez', '#c26fd3', NULL, NULL),
(10, '1', 'colonterapia - lodoterapia', '2023-08-27 08:30:00', '2023-08-27 09:00:00', 'inés castrillón panesso', '3444539 - 3115349222', 'desde hace 3 dias presenta dolor en espalda', 'luisa fernanda correa dominguez', '#939e3d', NULL, NULL),
(11, '1', 'terapia con imanes', '2023-08-27 09:30:00', '2023-08-27 10:00:00', 'luz enih calvo villada', '3394209 - 3132403460', 'presenta dolor en pierna derecha', 'enrique rosales aldana', '#f05724', NULL, '2023-08-28 06:36:33'),
(12, '1', 'colonterapia', '2023-08-29 07:30:00', '2023-08-29 08:00:00', 'diana milena soto medina', '3343923', 'presenta dolor en pierna derecha', 'enrique rosales aldana', '#5e66d4', NULL, NULL),
(13, '1', 'control', '2023-08-30 07:30:00', '2023-08-30 08:00:00', 'lina maria barreiro morales', '3349284 - 31244953438', 'presente dolor en pierna derecha', 'luisa fernanda correa dominguez', '#33997a', NULL, NULL),
(14, '1', 'lodoterapia', '2023-08-31 07:30:00', '2023-08-31 08:00:00', 'lina maria barreiro morales', '3349284 - 31244953438', 'Ninguno', 'enrique rosales aldana', '#5e66d4', NULL, NULL),
(15, '1', 'drenaje', '2023-08-31 08:30:00', '2023-08-31 09:00:00', 'luz enith calvo villada', '3394209 - 3132403460', 'presenta dolor en pierna derecha', 'patricia ríos solarte', '#ce3b3b', NULL, NULL),
(16, '1', 'drenaje masaje', '2023-08-31 09:30:00', '2023-08-31 10:00:00', 'diana milena soto medina', '3343923', 'presenta dolor en espalda', 'enrique rosales aldana', '#e8d15e', NULL, NULL),
(17, '1', 'terapia neural', '2023-09-03 07:30:00', '2023-09-03 08:00:00', 'luz enith calvo villada', '3394209 - 3132403460', 'presenta dolor en pierna derecha', 'patricia ríos solarte', '#831d9f', NULL, NULL),
(18, '1', 'lodoterapia', '2023-09-03 09:00:00', '2023-09-03 09:30:00', 'Diana Milena Soto Medina', '3343923', 'desde hace 2 días presenta dolor la espalda', 'Luisa Fernanda Correa Dominguez', '#33997a', NULL, '2023-10-12 04:28:40'),
(19, '1', 'colonterapia - lodoterapia', '2023-09-05 07:00:00', '2023-09-05 07:30:00', 'luz enith calvo villada', '3394209 - 3132403460', 'presenta dolor en pierna derecha desde hace  dos días', 'eliana mora correa', '#939e3d', NULL, NULL),
(20, '1', 'colonterapia', '2023-09-06 07:30:00', '2023-09-06 08:00:00', 'lina maria barreiro morales', '3349284 - 31244953438', 'presenta dolor en pierna derecha', 'enrique rosales aldana', '#5e66d4', NULL, NULL),
(21, '1', 'control', '2023-09-06 08:30:00', '2023-09-06 09:00:00', 'luz enith calvo villada', '3394209 - 3132403460', 'ninguno', 'patricia ríos solarte', '#33997a', NULL, NULL),
(22, '1', 'colonterapia - lodoterapia', '2023-09-17 07:30:00', '2023-09-17 08:00:00', 'lina maria barreiro morales', '3349284 - 31244953438', 'Ninguno', 'luisa fernanda correa dominguez', '#f05724', NULL, '2023-09-18 06:33:08'),
(23, '1', 'lodoterapia', '2023-09-18 07:30:00', '2023-09-18 08:00:00', 'luz enith calvo villada', '3394209 - 3132403460', 'presenta dolor en pierna derecha', 'enrique rosales aldana', '#ce3b3b', NULL, '2023-09-19 03:35:14'),
(24, '1', 'masaje', '2023-09-18 08:30:00', '2023-09-18 09:00:00', 'lina maria barreiro morales', '3349284 - 31244953438', 'presenta dolor en pierna derecha', 'patricia ríos solarte', '#939e3d', NULL, '2023-09-19 03:33:12'),
(25, '1', 'auriculoterapia', '2023-09-21 07:30:00', '2023-09-21 08:00:00', 'martha isabel correa molina', '4343329 - 3134309534', 'presenta dolor en pierna derecha', 'enrique rosales aldana', '#ce3b3b', NULL, NULL),
(26, '1', 'terapia con imanes', '2023-09-22 07:30:00', '2023-09-22 08:00:00', 'luz enith calvo villada', '3394209 - 3132403460', 'presenta dolor en espalda desde hace 2 días', 'luisa fernanda correa dominguez', '#f05724', NULL, NULL),
(27, '1', 'terapia con imanes', '2023-09-24 07:30:00', '2023-09-24 08:00:00', 'alisa mora dominguez', '4432304 - 3135453948', 'presenta dolor en pierna derecha', 'luisa fernanda correa dominguez', '#33997a', NULL, NULL),
(28, '1', 'control', '2023-09-24 08:30:00', '2023-09-24 09:00:00', 'martha isabel correa molina', '4343329 - 3134309534', 'Ninguno', 'patricia ríos solarte', '#ce3b3b', NULL, '2023-09-24 20:28:57'),
(29, '1', 'auriculoterapia', '2023-09-26 09:00:00', '2023-09-26 09:30:00', 'alisa mora dominguez', '4432304 - 3135453948', 'Presenta dolor en espalda', 'patricia ríos solarte', '#c2bd1e', NULL, '2023-09-25 10:20:22'),
(30, '1', 'colonterapia', '2023-09-25 08:00:00', '2023-09-25 08:30:00', 'lina maria barreiro morales', '3349284 - 31244953438', 'ninguno', 'enrique rosales aldana', '#5e66d4', NULL, NULL),
(31, '1', 'colonterapia - lodoterapia', '2023-09-25 09:00:00', '2023-09-25 09:30:00', 'martha isabel correa molina', '4343329 - 3134309534', 'Ninguno', 'luisa fernanda correa dominguez', '#9602c7', NULL, NULL),
(32, '1', 'biomagnetismo', '2023-09-26 10:30:00', '2023-09-26 11:00:00', 'alisa mora dominguez', '4432304 - 3135453948', 'presenta dolor en pierna derecha', 'luisa fernanda correa dominguez', '#c26fd3', NULL, '2023-09-27 03:16:26'),
(33, '1', 'auriculoterapia', '2023-09-28 08:00:00', '2023-09-28 08:30:00', 'lina maria barreiro morales', '3349284 - 31244953438', 'ninguno', 'luisa fernanda correa dominguez', '#ce3b3b', NULL, '2023-09-28 10:09:46'),
(34, '1', 'colonterapia', '2023-09-28 09:00:00', '2023-09-28 09:30:00', 'luisa isabel rojas mesa', '2434392 - 3124394288', 'presenta dolor en pierna derecha', 'patricia ríos solarte', '#33997a', NULL, NULL),
(35, '1', 'control', '2023-10-01 08:00:00', '2023-10-01 08:30:00', 'Lina María Barreiro Morales', '3349284 - 31244953438', 'Ninguno', 'Enrique Rosales Aldana', '#33997a', NULL, '2023-10-02 22:20:23'),
(36, '1', 'biomagnetismo', '2023-10-02 08:00:00', '2023-10-02 08:30:00', 'Alisa Mora Dominguez', '4432304 - 3135453948', 'presenta dolor en pierna derecha', 'Patricia Ríos Solarte', '#c26fd3', NULL, NULL),
(37, '1', 'auriculoterapia', '2023-10-02 09:00:00', '2023-10-02 09:30:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'presenta dolor en pierna derecha', 'Luisa Fernanda Correa Dominguez', '#939e3d', NULL, '2023-10-03 04:27:42'),
(38, '1', 'colonterapia', '2023-10-03 07:30:00', '2023-10-03 08:00:00', 'Luz Enith Calvo Villada', '3394209 - 3132403460', 'ninguno', 'Luisa Fernanda Correa Dominguez', '#5e66d4', NULL, NULL),
(39, '1', 'biomagnetismo', '2023-10-04 07:30:00', '2023-10-04 08:00:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'presenta dolor en pierna derecha', 'Enrique Rosales Aldana', '#c26fd3', NULL, NULL),
(40, '1', 'terapia con imanes', '2023-10-04 08:30:00', '2023-10-04 09:00:00', 'Luisa Isabel Rojas Mesa', '2434392 - 3124394288', 'desde hace 2 días presenta dolor en pierna derecha', 'Patricia Ríos Solarte', '#f05724', NULL, NULL),
(41, '1', 'colonterapia', '2023-10-05 07:30:00', '2023-10-05 08:00:00', 'Diana Milena Soto Medina', '3343923', 'ninguno', 'Luisa Fernanda Correa Dominguez', '#5e66d4', NULL, NULL),
(42, '1', 'auriculoterapia', '2023-10-05 08:30:00', '2023-10-05 09:00:00', 'Lina Maria Barreiro Morales', '3349284 - 31244953438', 'ninguno', 'Patricia Ríos Solarte', '#939e3d', NULL, NULL),
(43, '1', 'colonterapia - lodoterapia', '2023-10-05 09:30:00', '2023-10-05 10:00:00', 'Nora Elena Contreras Medina', '3354928 - 3115435492', 'presenta dolor en pierna derecha desde hace 3 días', 'Patricia Ríos Solarte', '#9e3d4c', NULL, '2023-10-05 22:06:46'),
(44, '1', 'colonterapia', '2023-10-06 07:30:00', '2023-10-06 08:00:00', 'Lina Maria Barreiro Morales', '3349284 - 31244953438', 'ninguno', 'Patricia Ríos Solarte', '#5e66d4', NULL, NULL),
(45, '1', 'terapia con imanes', '2023-10-06 08:30:00', '2023-10-06 09:00:00', 'Luz Enith Calvo Villada', '3394209 - 3132403460', 'ninguno', 'Patricia Ríos Solarte', '#f05724', NULL, NULL),
(46, '1', 'terapia neural', '2023-10-09 07:30:00', '2023-10-09 08:00:00', 'Lina Maria Barreiro Morales', '3349284 - 31244953438', 'ninguno', 'Luisa Fernanda Correa Dominguez', '#831d9f', NULL, NULL),
(47, '1', 'biomagnetismo', '2023-10-10 07:30:00', '2023-10-10 08:00:00', 'Lorena Rentería Mosquera', '4334482 - 3115429012', 'presenta dolor en espalda desde hace 2 días', 'Patricia Ríos Solarte', '#c26fd3', NULL, NULL),
(48, '1', 'colonterapia', '2023-10-11 07:30:00', '2023-10-11 08:00:00', 'Alisa Mora Dominguez', '4432304 - 3135453948', 'ninguno', 'Patricia Ríos Solarte', '#5e66d4', NULL, NULL),
(49, '1', 'terapia neural', '2023-10-13 07:30:00', '2023-10-13 08:00:00', 'Lorena Rentería Martinez', '3334228 - 31233593482', 'presenta dolor en pierna derecha desde hace 3 días', 'Patricia Ríos Solarte', '#ea1f10', NULL, '2023-10-13 06:09:04'),
(50, '1', 'auriculoterapia', '2023-10-12 08:00:00', '2023-10-12 08:30:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'Desde hace 2 días presenta dolor en pierna derecha', 'Eliana Mora Correa', '#5e66d4', NULL, NULL),
(51, '1', 'colonterapia - lodoterapia', '2023-10-16 07:30:00', '2023-10-16 08:00:00', 'Luz Enith Calvo Villada', '3394209 - 3132403460', 'Ninguno', 'Enrique Rosales Aldana', '#5e66d4', NULL, '2023-10-17 00:44:21'),
(52, '1', 'colonterapia', '2023-10-17 07:30:00', '2023-10-17 08:00:00', 'Manuela González Rodriguez', '4354053 - 3136304249', 'ninguno', 'Eliana Mora Correa', '#5e66d4', NULL, NULL),
(53, '1', 'biomagnetismo', '2023-10-19 07:30:00', '2023-10-19 08:00:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'presenta dolor en pierna derecha', 'Patricia Ríos Solarte', '#c26fd3', NULL, NULL),
(54, '1', 'colonterapia - lodoterapia', '2023-10-20 07:30:00', '2023-10-20 08:00:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'presenta dolor en el cuello desde hace 2 dias', 'Eliana Mora Correa', '#013298', NULL, NULL),
(55, '1', 'biomagnetismo', '2023-10-21 07:30:00', '2023-10-21 08:00:00', 'Luz Enith Calvo Villada', '3394209 - 3132403460', 'ninguno', 'Luisa Fernanda Correa Dominguez', '#c26fd3', NULL, NULL),
(56, '1', 'colonterapia', '2023-10-22 07:30:00', '2023-10-22 08:00:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'presenta dolor en rodilla desde hace 3 dias', 'Luisa Fernanda Correa Dominguez', '#5e66d4', NULL, NULL),
(57, '1', 'colonterapia', '2023-10-23 07:30:00', '2023-10-23 08:00:00', 'Lina Maria Barreiro Morales', '3349284 - 31244953438', 'ninguno', 'Enrique Rosales Aldana', '#5e66d4', NULL, NULL),
(58, '1', 'biomagnetismo', '2023-10-24 07:30:00', '2023-10-24 08:00:00', 'Lina Maria Barreiro Morales', '3349284 - 31244953438', 'ninguno', 'Eliana Mora Correa', '#c26fd3', NULL, NULL),
(59, '1', 'colonterapia - lodoterapia', '2023-10-25 07:30:00', '2023-10-25 08:00:00', 'Lorena Rentería Martinez', '3334228 - 31233593482', 'presenta dolor en pierna derecha', 'Patricia Ríos Solarte', '#939e3d', NULL, NULL),
(60, '1', 'colonterapia', '2023-10-28 07:00:00', '2023-10-28 07:30:00', 'Lina Maria Barreiro Morales', '3349284 - 31244953438', 'presenta dolor en pierna derecha desde hace 3 días', 'Luisa Fernanda Correa Dominguez', '#5e66d4', NULL, NULL),
(62, '1', 'terapia con imanes', '2023-10-28 08:00:00', '2023-10-28 08:30:00', 'Lina Maria Barreiro Morales', '3349284 - 31244953438', 'presenta dolor en pierna derecha', 'Patricia Ríos Solarte', '#f05724', NULL, '2023-10-28 21:12:37'),
(63, '1', 'colonterapia - lodoterapia', '2023-10-30 07:30:00', '2023-10-30 08:00:00', 'Lina Maria Barreiro Morales', '3349284 - 31244953438', 'presenta dolor en pierna derecha', 'Patricia Ríos Solarte', '#ce3b3b', NULL, '2023-10-31 03:50:07'),
(64, '1', 'terapia con imanes', '2023-10-30 08:30:00', '2023-10-30 09:00:00', 'Lorena Rentería Martinez', '3334228 - 31233593482', 'Ninguno', 'Enrique Rosales Aldana', '#33997a', NULL, NULL),
(65, '1', 'colonterapia', '2023-10-31 07:30:00', '2023-10-31 08:00:00', 'Luz Enith Calvo Villada', '3394209 - 3132403460', 'ninguno', 'Enrique Rosales Aldana', '#5e66d4', NULL, NULL),
(66, '1', 'colonterapia - lodoterapia', '2023-11-01 07:30:00', '2023-11-01 08:00:00', 'Lina Maria Barreiro Morales', '3349284 - 31244953438', 'ninguno', 'Luisa Fernanda Correa Dominguez', '#939e3d', NULL, NULL),
(67, '1', 'biomagnetismo', '2023-11-05 07:30:00', '2023-11-05 08:00:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'Presenta dolor en pierna derecha', 'Enrique Rosales Aldana', '#c26fd3', NULL, NULL),
(68, '1', 'biomagnetismo', '2023-11-06 07:30:00', '2023-11-06 08:00:00', 'Luisa Isabel Rojas Mesa', '2434392 - 3124394288', 'presenta dolor en pierna derecha', 'Patricia Ríos Solarte', '#c26fd3', NULL, NULL),
(69, '1', 'colonterapia - lodoterapia', '2023-11-07 07:30:00', '2023-11-07 08:00:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'presenta dolor en pierna derecha', 'Enrique Rosales Aldana', '#9602c7', NULL, NULL),
(70, '1', 'colonterapia - lodoterapia', '2023-11-08 08:30:00', '2023-11-08 09:00:00', 'Ana Lucia Morales Triana', '4435693 - 3113539528', 'presenta dolor en pierna derecha', 'Luisa Fernanda Correa Dominguez', '#9602c7', NULL, NULL),
(71, '1', 'terapia con imanes', '2023-11-08 10:00:00', '2023-11-08 10:30:00', 'Diana Milena Soto Medina', '3343923 - 3210435249', 'desde hace dos días presenta dolor de cabeza', 'Enrique Rosales Aldana', '#f05724', NULL, '2023-11-09 05:39:06'),
(72, '1', 'biomagnetismo', '2023-11-09 07:30:00', '2023-11-09 08:00:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'ninguno', 'Patricia Ríos Solarte', '#c26fd3', NULL, NULL),
(73, '1', 'colonterapia', '2023-11-10 07:30:00', '2023-11-10 08:00:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'ninguno', 'Luisa Fernanda Correa Dominguez', '#5e66d4', NULL, NULL),
(74, '1', 'colonterapia', '2023-11-11 08:00:00', '2023-11-11 08:30:00', 'Lina Maria Barreiro Morales', '3349284 - 31244953438', 'Ninguno', 'Enrique Rosales Aldana', '#5e66d4', NULL, '2023-11-12 08:59:48'),
(75, '1', 'colonterapia - lodoterapia', '2023-11-12 08:00:00', '2023-11-12 08:30:00', 'Lorena Rentería Martinez', '3334228 - 31233593482', 'presenta dolor en pierna derecha', 'Patricia Ríos Solarte', '#013298', NULL, NULL),
(76, '1', 'terapia con imanes', '2023-11-13 08:00:00', '2023-11-13 08:30:00', 'Nora Elena Contreras Medina', '3354928 - 3115435492', 'ninguno', 'Enrique Rosales Aldana', '#f05724', NULL, NULL),
(77, '1', 'masaje', '2023-11-13 09:00:00', '2023-11-13 09:30:00', 'Sandra Rosales Ortega', '4340349 - 31143969358', 'Ninguno', 'Enrique Rosales Aldana', '#013298', NULL, NULL),
(78, '1', 'terapia con imanes', '2023-11-14 07:30:00', '2023-11-14 08:00:00', 'Lina Maria Barreiro Morales', '3349284 - 31244953438', 'presenta dolor en pierna derecha', 'Patricia Ríos Solarte', '#f05724', NULL, '2023-11-15 04:17:11'),
(79, '1', 'terapia neural', '2023-11-15 08:00:00', '2023-11-15 08:30:00', 'Lorena Rentería Martinez', '3334228 - 31233593482', 'ninguno', 'Enrique Rosales Aldana', '#831d9f', NULL, NULL),
(80, '1', 'lodoterapia', '2023-11-17 08:00:00', '2023-11-17 08:30:00', 'Elizabeth Estacio Dominguez', '4439432 - 3115435940', 'ninguno', 'Patricia Ríos Solarte', '#5e66d4', NULL, NULL),
(81, '1', 'terapia neural', '2023-11-20 08:00:00', '2023-11-20 08:30:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'ninguno', 'Luisa Fernanda Correa Dominguez', '#831d9f', NULL, NULL),
(82, '1', 'colonterapia - lodoterapia', '2023-11-21 08:00:00', '2023-11-21 08:30:00', 'Lina Maria Barreiro Morales', '3349284 - 31244953438', 'presenta dolor en pierna derecha desde hace 2 días', 'Patricia Ríos Solarte', '#21ba45', NULL, NULL),
(83, '1', 'terapia neural', '2023-11-22 08:00:00', '2023-11-22 08:30:00', 'Manuela González Rodriguez', '4354053 - 3136304249', 'ninguno', 'Enrique Rosales Aldana', '#831d9f', NULL, '2023-11-22 21:14:48'),
(84, '1', 'colonterapia', '2023-11-23 07:30:00', '2023-11-23 08:00:00', 'Ana Lucia Morales Triana', '4435693 - 3113539528', 'presenta dolor de cabeza desde hace 3 días', 'Luisa Fernanda Correa Dominguez', '#5e66d4', NULL, NULL),
(85, '1', 'biomagnetismo', '2023-11-24 08:00:00', '2023-11-24 08:30:00', 'Ana Lucia Morales Triana', '4435693 - 3113539528', 'ninguno', 'Enrique Rosales Aldana', '#c26fd3', NULL, NULL),
(86, '1', 'colonterapia', '2023-11-25 08:30:00', '2023-11-25 09:00:00', 'Luisa Isabel Rojas Mesa', '2434392 - 3124394288', 'Niguno', 'Eliana Mora Correa', '#5e66d4', NULL, NULL),
(87, '1', 'colonterapia', '2023-11-26 08:30:00', '2023-11-26 09:00:00', 'Clara Isabel Montero Restrepo', '2943490 - 31345939538', 'presenta dolor en pierna derecha desde hace 2 años', 'Patricia Ríos Solarte', '#ce3b3b', NULL, '2023-11-27 07:54:00'),
(88, '1', 'colonterapia - lodoterapia', '2023-11-27 08:30:00', '2023-11-27 09:00:00', 'Clara Isabel Montero Restrepo', '2943490 - 31345939538', 'ninguno', 'Luisa Fernanda Correa Dominguez', '#939e3d', NULL, NULL),
(89, '1', 'colonterapia - lodoterapia', '2023-11-29 08:00:00', '2023-11-29 08:30:00', 'Clara Isabel Montero Restrepo', '2943490 - 31345939538', 'presenta dolor en pierna derecha', 'Patricia Ríos Solarte', '#f05724', NULL, NULL),
(90, '1', 'terapia neural', '2023-11-29 09:00:00', '2023-11-29 09:30:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'ninguno', 'Eliana Mora Correa', '#831d9f', NULL, NULL),
(92, '1', 'terapia con imanes', '2023-11-29 10:00:00', '2023-11-29 10:30:00', 'Alejandra Forero Triana', '3243953 - 3114352390', 'ninguno', 'Patricia Ríos Solarte', '#5e66d4', NULL, NULL),
(93, '1', 'colonterapia', '2023-11-30 08:00:00', '2023-11-30 08:30:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'presenta dolor en cuello desde hace 3 días', 'Enrique Rosales Aldana', '#5e66d4', NULL, NULL),
(94, '1', 'colonterapia - lodoterapia', '2023-12-01 08:00:00', '2023-12-01 08:30:00', 'Sandra Rosales Ortega', '4340349 - 31143969358', 'Ninguno', 'Patricia Ríos Solarte', '#ce3b3b', NULL, NULL),
(95, '1', 'colonterapia - lodoterapia', '2023-12-02 08:00:00', '2023-12-02 08:30:00', 'Lorena Rentería Martinez', '3334228 - 31233593482', 'ninguno', 'Enrique Rosales Aldana', '#939e3d', NULL, NULL),
(96, '1', 'biomagnetismo', '2023-12-03 08:00:00', '2023-12-03 08:30:00', 'Luisa Isabel Rojas Mesa', '2434392 - 3124394288', 'ninguno', 'Luisa Fernanda Correa Dominguez', '#c26fd3', NULL, NULL),
(97, '1', 'auriculoterapia', '2023-12-04 08:00:00', '2023-12-04 08:30:00', 'Sandra Rosales Ortega', '4340349 - 31143969358', 'Presenta dolor en cuello desde hace 3 días', 'Enrique Rosales Aldana', '#c2bd1e', NULL, NULL),
(98, '1', 'colonterapia', '2023-12-05 08:00:00', '2023-12-05 08:30:00', 'Nora Elena Contreras Medina', '3354928 - 3115435492', 'presenta dolor en pierna derecha', 'Enrique Rosales Aldana', '#5e66d4', NULL, NULL),
(99, '1', 'colonterapia - lodoterapia', '2023-12-06 08:30:00', '2023-12-06 09:00:00', 'Manuela González Rodriguez', '4354053 - 3136304249', 'presenta dolor en pierna derecha', 'Patricia Ríos Solarte', '#939e3d', NULL, NULL),
(100, '1', 'biomagnetismo', '2023-12-07 08:00:00', '2023-12-07 08:30:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'presenta dolor en pierna derecha desde hace 3 días', 'Enrique Rosales Aldana', '#c26fd3', NULL, NULL),
(101, '1', 'biomagnetismo', '2023-12-08 07:30:00', '2023-12-08 08:00:00', 'Alisa Mora Dominguez', '4432304 - 3135453948', 'presenta dolor en pierna derecha', 'Enrique Rosales Aldana', '#c26fd3', NULL, NULL),
(102, '1', 'auriculoterapia', '2023-12-09 08:30:00', '2023-12-09 09:00:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'ninguno', 'Luisa Fernanda Correa Dominguez', '#ce3b3b', NULL, '2023-12-10 09:21:39'),
(103, '1', 'colonterapia - lodoterapia', '2023-12-10 09:30:00', '2023-12-10 10:00:00', 'Sandra Rosales Ortega', '4340349 - 31143969358', 'ninguno', 'Eliana Mora Correa', '#013298', NULL, NULL),
(104, '1', 'biomagnetismo', '2023-12-11 08:00:00', '2023-12-11 08:30:00', 'Lorena Rentería Martinez', '3334228 - 31233593482', 'ninguno', 'Patricia Ríos Solarte', '#c26fd3', NULL, NULL),
(105, '1', 'colonterapia - lodoterapia', '2023-12-12 08:30:00', '2023-12-12 09:00:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'ninguno', 'Enrique Rosales Aldana', '#939e3d', NULL, NULL),
(106, '1', 'biomagnetismo', '2023-12-13 08:30:00', '2023-12-13 09:00:00', 'Clara Isabel Montero Restrepo', '2943490 - 31345939538', 'ninguno', 'Enrique Rosales Aldana', '#c26fd3', NULL, NULL),
(107, '1', 'auriculoterapia', '2023-12-14 08:30:00', '2023-12-14 09:00:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'presenta dolor en pierna derecha', 'Eliana Mora Correa', '#c2bd1e', NULL, NULL),
(108, '1', 'biomagnetismo', '2023-12-15 08:00:00', '2023-12-15 08:30:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'ninguno', 'Enrique Rosales Aldana', '#c26fd3', NULL, NULL),
(109, '1', 'colonterapia', '2023-12-17 08:00:00', '2023-12-17 08:30:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'ninguno', 'Patricia Ríos Solarte', '#5e66d4', NULL, NULL),
(110, '1', 'colonterapia - lodoterapia', '2023-12-20 08:00:00', '2023-12-20 08:30:00', 'Clara Isabel Montero Restrepo', '2943490 - 31345939538', 'presenta dolor en pierna derecha', 'Enrique Rosales Aldana', '#831d9f', NULL, NULL),
(111, '1', 'biomagnetismo', '2023-12-21 08:00:00', '2023-12-21 08:30:00', 'Luisa Isabel Rojas Mesa', '2434392 - 3124394288', 'presenta dolor en pierna derecha', 'Patricia Ríos Solarte', '#c26fd3', NULL, NULL),
(112, '1', 'terapia con imanes', '2023-12-22 10:00:00', '2023-12-22 10:30:00', 'Luz Enith Calvo Villada', '3394209 - 3132403460', 'ninguno', 'Patricia Ríos Solarte', '#860e1a', NULL, '2023-12-22 21:57:20'),
(113, '1', 'terapia con imanes', '2023-12-23 09:30:00', '2023-12-23 10:00:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'presenta dolor en pierna derecha', 'Eliana Mora Correa', '#f05724', NULL, NULL),
(114, '1', 'terapia con imanes', '2023-12-24 08:00:00', '2023-12-24 08:30:00', 'Alisa Mora Dominguez', '4432304 - 3135453948', 'presenta dolor en cuello desde hace 2 días', 'Patricia Ríos Solarte', '#f05724', NULL, NULL),
(115, '1', 'terapia neural', '2023-12-25 07:30:00', '2023-12-25 08:00:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'ninguno', 'Enrique Rosales Aldana', '#831d9f', NULL, NULL),
(116, '1', 'drenaje', '2023-12-26 09:30:00', '2023-12-26 10:00:00', 'Alisa Mora Dominguez', '4432304 - 3135453948', 'presenta dolor en pierna derecha desde hace 3 días', 'Patricia Ríos Solarte', '#9602c7', NULL, '2023-12-27 04:03:52'),
(117, '1', 'colonterapia - lodoterapia', '2023-12-27 08:30:00', '2023-12-27 09:00:00', 'Ana Lucia Morales Triana', '4435693 - 3113539528', 'ninguno', 'Eliana Mora Correa', '#c26fd3', NULL, NULL),
(118, '1', 'colonterapia - lodoterapia', '2023-12-28 08:30:00', '2023-12-28 09:00:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'ninguno', 'Eliana Mora Correa', '#9602c7', NULL, '2023-12-29 03:53:28'),
(119, '1', 'colonterapia', '2023-12-29 09:00:00', '2023-12-29 09:30:00', 'Lina Maria Barreiro Morales', '3349284 - 31244953438', 'ninguno', 'Enrique Rosales Aldana', '#5e66d4', NULL, NULL),
(120, '1', 'terapia con imanes', '2023-12-30 08:30:00', '2023-12-30 09:00:00', 'Luz Enith Calvo Villada', '3394209 - 3132403460', NULL, 'Patricia Ríos Solarte', '#f05724', NULL, NULL),
(121, '1', 'terapia con auriculoterapia', '2023-12-30 10:00:00', '2023-12-30 10:30:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', NULL, 'Enrique Rosales Aldana', '#c2bd1e', NULL, '2023-12-31 03:00:25'),
(122, '1', 'drenaje', '2023-12-30 07:30:00', '2023-12-30 08:00:00', 'Nora Elena Contreras Medina', '3354928 - 3115435492', NULL, 'Luisa Fernanda Correa Dominguez', '#5e66d4', NULL, '2023-12-31 03:11:18'),
(123, '1', 'biomagnetismo', '2023-12-31 08:00:00', '2023-12-31 08:30:00', 'Inés Castrillón Panesso', '3444539 - 3115349222', 'presenta dolor en pierna derecha desde hace 3 días', 'Enrique Rosales Aldana', '#9d47ae', NULL, '2024-01-01 03:33:29'),
(124, '1', 'colonterapia', '2023-12-31 09:00:00', '2023-12-31 09:30:00', 'Lina Maria Barreiro Morales', '3349284 - 31244953438', NULL, 'Enrique Rosales Aldana', '#e32639', NULL, '2024-01-01 03:34:58'),
(125, '1', 'colonterapia', '2023-12-31 10:00:00', '2023-12-31 10:30:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', 'presenta dolor en pierna derecha desde hace 3 días', 'Patricia Ríos Solarte', '#5e66d4', NULL, NULL),
(126, '1', 'colonterapia - lodoterapia', '2024-01-01 09:00:00', '2024-01-01 09:30:00', 'Luisa Isabel Rojas Mesa', '2434392 - 3124394288', 'presenta dolor en cabeza desde hace 2 días', 'Eliana Mora Correa', '#939e3d', NULL, '2024-01-01 05:45:16'),
(127, '1', 'control iomagnetismo', '2024-01-01 08:00:00', '2024-01-01 08:30:00', 'Laura Medina Dominguez', '4453264 - 313060339', NULL, 'Eliana Mora Correa', '#33997a', NULL, '2024-01-01 17:04:40'),
(128, '1', 'auriculoterapia', '2024-01-01 09:30:00', '2024-01-01 10:00:00', 'Manuela González Rodriguez', '4354053 - 3136304249', 'desde hace dos días presenta dolor en pierna derecha y en la cabeza', 'Patricia Ríos Solarte', '#000000', NULL, '2024-01-02 23:12:59'),
(129, '1', 'biomagnetismo', '2024-01-01 07:00:00', '2024-01-01 07:30:00', 'Luisa Isabel Rojas Mesa', '2434392 - 3124394288', 'ninguno', 'Eliana Mora Correa', '#6fd3a4', NULL, '2024-01-01 22:33:03'),
(130, '1', 'terapia con imanes', '2024-01-01 10:30:00', '2024-01-01 11:00:00', 'Nora Elena Contreras Medina', '3354928 - 3115435492', NULL, 'Patricia Ríos Solarte', '#be7b3c', NULL, '2024-01-01 18:41:20'),
(131, '1', 'terapia con imanes', '2024-01-01 11:00:00', '2024-01-01 11:30:00', 'Alisa Mora Dominguez', '4432304 - 3135453948', NULL, 'Eliana Mora Correa', '#f05724', NULL, NULL),
(132, '1', 'auriculoterapia', '2024-01-01 08:30:00', '2024-01-01 09:00:00', 'Lorena Rentería Martinez', '3334228 - 31233593482', NULL, 'Eliana Mora Correa', '#c2bd1e', NULL, NULL),
(133, '1', 'drenaje', '2024-01-01 10:00:00', '2024-01-01 10:30:00', 'Clara Isabel Montero Restrepo', '2943490 - 31345939538', NULL, 'Enrique Rosales Aldana', '#831d9f', NULL, '2024-01-01 18:41:32'),
(134, '1', 'auriculoterapia', '2024-01-01 07:30:00', '2024-01-01 08:00:00', 'Clara Isabel Montero Restrepo', '2943490 - 31345939538', NULL, 'Enrique Rosales Aldana', '#c2bd1e', NULL, NULL),
(135, '1', 'drenaje', '2024-01-01 11:30:00', '2024-01-01 12:00:00', 'Martha Isabel Correa Molina', '4343329 - 3134309534', NULL, 'Patricia Ríos Solarte', '#f05724', NULL, NULL),
(136, '1', 'biomagnetismo', '2024-01-01 08:00:00', '2024-01-01 08:30:00', 'Nora Elena Contreras Medina', '3354928 - 3115435492', NULL, 'Eliana Mora Correa', '#c26fd3', NULL, NULL),
(137, '2', 'auriculoterapia', '2024-01-02 07:30:00', '2024-01-02 08:00:00', 'Luz Enith Calvo Villada', '3394209 - 3132403460', NULL, 'Patricia Ríos Solarte', '#c2bd1e', NULL, NULL),
(138, '1', 'colonterapia', '2024-01-03 09:30:00', '2024-01-03 10:00:00', 'Alisa Mora Dominguez', '4432304 - 3135453948', 'Ninguno', 'Patricia Ríos Solarte', '#5e66d4', NULL, NULL),
(139, '1', 'colonterapia - lodoterapia', '2024-01-04 08:30:00', '2024-01-04 09:00:00', 'Nora Elena Contreras Medina', '3354928 - 3115435492', 'desde hace 2 días presenta dolor en pierna derecha', 'Patricia Ríos Solarte', '#939e3d', NULL, NULL),
(140, '1', 'colonterapia', '2024-01-04 07:00:00', '2024-01-04 07:30:00', 'Lina Maria Barreiro Morales', '3349284 - 31244953438', 'ninguno', 'Patricia Ríos Solarte', '#5e66d4', NULL, NULL),
(141, '1', 'colonterapia - lodoterapia', '2024-01-05 08:00:00', '2024-01-05 08:30:00', 'Alisa Mora Dominguez', '4432304 - 3135453948', 'presenta dolor en pierna derecha', 'Luisa Fernanda Correa Dominguez', '#f20707', NULL, NULL),
(142, '1', 'lodoterapia', '2024-01-06 07:30:00', '2024-01-06 08:00:00', 'Lina Maria Barreiro Morales', '3349284 - 31244953438', 'ninguno', 'Patricia Ríos Solarte', '#5e66d4', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

DROP TABLE IF EXISTS `facturas`;
CREATE TABLE IF NOT EXISTS `facturas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tratamiento` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_tratamiento` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias_clinicas`
--

DROP TABLE IF EXISTS `historias_clinicas`;
CREATE TABLE IF NOT EXISTS `historias_clinicas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cliente` int UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profesional` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatura` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peso_inicial` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abd_inicial` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grasa_inicial` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agua_inicial` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imc` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grasa_viseral` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edad_metabolica` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terapias` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paquete_desintoxicacion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terapias_adicionales` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_lavado` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_lavado` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dias_lavados` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observaciones` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `historias_clinicas_id_cliente_index` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historias_clinicas`
--

INSERT INTO `historias_clinicas` (`id`, `user_id`, `id_cliente`, `nombre`, `edad`, `profesional`, `estatura`, `peso_inicial`, `abd_inicial`, `grasa_inicial`, `agua_inicial`, `imc`, `grasa_viseral`, `edad_metabolica`, `terapias`, `paquete_desintoxicacion`, `terapias_adicionales`, `tipo_lavado`, `num_lavado`, `dias_lavados`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, '1', 2, 'inés castrillón panesso', '27 Años', 'eliana mora correa', '170', '77', '65', '46', '51', '32', '54', '54', 'terapia neural,lodoterapia', 'paquete 1', 'acupuntura', 'café', NULL, NULL, 'Presenta dolor en pierna derecha desde hace 2 días', '2023-07-11 23:35:57', '2023-07-12 00:19:27'),
(2, '1', 3, 'luz enih calvo villada', '31 Años', 'eliana mora correa', '164', '176', '54', '46', '52', '29', '55', '67', 'terapia neural,lodoterapia,colonterapia', 'paquete 1', 'acupuntura', 'café', NULL, NULL, 'desde hace 3 días presenta dolor en pierna derecha', '2023-08-24 16:18:02', '2023-08-24 16:45:40'),
(3, '1', 5, 'Luisa Isabel Rojas Mesa', '31 Años', 'Eliana Mora Correa', '167', '76', '54', '52', '50', '30', '53', '63', 'terapia neural,lodoterapia,control', 'paquete 1', 'acupuntura', 'manzanilla', NULL, NULL, 'ninguna', '2024-01-03 00:16:29', '2024-01-03 00:16:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lavados`
--

DROP TABLE IF EXISTS `lavados`;
CREATE TABLE IF NOT EXISTS `lavados` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lavado` varchar(380) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_lavado` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lavados`
--

INSERT INTO `lavados` (`id`, `user_id`, `lavado`, `valor_lavado`, `created_at`, `updated_at`) VALUES
(2, '1', 'café', '45000', '2023-01-12 14:11:44', '2023-01-12 14:11:44'),
(3, '1', 'manzanilla', '55000', '2023-01-12 14:12:18', '2023-01-17 09:47:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_diarios`
--

DROP TABLE IF EXISTS `libro_diarios`;
CREATE TABLE IF NOT EXISTS `libro_diarios` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsable` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(680) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_28_231918_create_events_table', 1),
(6, '2022_11_03_175674_create_clientes_table', 1),
(7, '2022_11_03_181044_create_historias_clinicas_table', 1),
(8, '2022_11_03_224907_create_pagos_honorarios_table', 1),
(9, '2022_11_03_232927_create_abonos_clientes_table', 1),
(10, '2022_11_03_234433_create_controles_table', 1),
(11, '2022_11_24_23400911_create_terapias_table', 1),
(12, '2022_12_02_231019_create_terapias_adicionales_table', 1),
(13, '2022_12_04_010736_create_profesionales_table', 1),
(14, '2022_12_05_114060_add_mes_to_clientes', 1),
(15, '2022_12_22_173250_create_registrar_tratamientos_table', 1),
(16, '2023_01_11_184353_create_lavados_table', 1),
(17, '2023_02_02_111323_add_rol_to_users_table', 1),
(18, '2023_02_02_180122_create_controles_historias_table', 1),
(19, '2023_02_16_001240_create_libro_diarios_table', 1),
(20, '2023_03_30_223902_create_registros_contables_table', 1),
(21, '2022_11_03_232928_create_abonos_clientes_table', 2),
(22, '2023_10_04_180231_create_facturas_table', 3),
(23, '2023_10_04_190716_create_descripciones_table', 3),
(24, '2023_10_04_230036_create_descripciones_facturas_table', 3),
(25, '2022_12_22_173251_create_registrar_tratamientos_table', 4),
(26, '2022_12_22_173252_create_registrar_tratamientos_table', 5),
(27, '2022_12_22_173253_create_registrar_tratamientos_table', 6),
(28, '2022_12_22_173254_create_registrar_tratamientos_table', 7),
(29, '2022_12_22_173255_create_registrar_tratamientos_table', 8),
(30, '2022_12_22_173256_create_registrar_tratamientos_table', 9),
(31, '2022_12_22_173257_create_registrar_tratamientos_table', 10),
(32, '2022_11_03_232929_create_abonos_clientes_table', 11),
(33, '2021_09_28_231919_create_events_table', 12),
(34, '2024_01_01_195239_create_permission_tables', 13),
(35, '2024_01_01_195240_create_permission_tables', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_honorarios`
--

DROP TABLE IF EXISTS `pagos_honorarios`;
CREATE TABLE IF NOT EXISTS `pagos_honorarios` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_profesional` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_pago` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pagos_honorarios`
--

INSERT INTO `pagos_honorarios` (`id`, `user_id`, `id_profesional`, `cedula`, `nombre`, `celular`, `valor_pago`, `created_at`, `updated_at`) VALUES
(1, '1', '3', '1345678920', 'Luisa Fernanda Correa Dominguez', '3112349120', '340000', '2023-12-27 23:14:51', '2023-12-27 23:15:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'inicio', 'web', '2024-01-04 04:43:04', '2024-01-04 04:43:04'),
(2, 'registrar_tratamiento', 'web', '2024-01-04 04:43:10', '2024-01-04 04:43:10'),
(3, 'abonos', 'web', '2024-01-04 04:43:10', '2024-01-04 04:43:10'),
(4, 'deudores', 'web', '2024-01-04 04:43:10', '2024-01-04 04:43:10'),
(5, 'pago_honorarios', 'web', '2024-01-04 04:43:11', '2024-01-04 04:43:11'),
(6, 'registros_contables', 'web', '2024-01-04 04:43:11', '2024-01-04 04:43:11'),
(7, 'profesionales', 'web', '2024-01-04 04:43:12', '2024-01-04 04:43:12'),
(8, 'terapias', 'web', '2024-01-04 04:43:12', '2024-01-04 04:43:12'),
(9, 'terapias_adicionales', 'web', '2024-01-04 04:43:13', '2024-01-04 04:43:13'),
(10, 'lavados', 'web', '2024-01-04 04:43:13', '2024-01-04 04:43:13'),
(11, 'estadisticas', 'web', '2024-01-04 04:43:14', '2024-01-04 04:43:14'),
(12, 'register', 'web', '2024-01-04 04:43:15', '2024-01-04 04:43:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionales`
--

DROP TABLE IF EXISTS `profesionales`;
CREATE TABLE IF NOT EXISTS `profesionales` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profesion` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `porcentaje` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `profesionales_cedula_unique` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesionales`
--

INSERT INTO `profesionales` (`id`, `user_id`, `cedula`, `nombre`, `profesion`, `fecha_nacimiento`, `celular`, `email`, `porcentaje`, `created_at`, `updated_at`) VALUES
(1, '1', '31922230', 'eliana mora correa', 'terapeuta', '1996-06-10', '3135454943', 'elianamora@hotmail.com', NULL, '2023-07-11 22:15:22', '2023-07-11 22:15:22'),
(2, '1', '94221293', 'enrique rosales aldana', 'médico', '1987-08-05', '3124345193', 'enriquerosales@gmail.com', NULL, '2023-07-11 22:16:32', '2023-07-11 22:16:32'),
(3, '1', '1345678920', 'luisa fernanda correa dominguez', 'quiroprásis', '1999-03-14', '3112349120', 'luisacorrea@gmail.com', NULL, '2023-07-11 22:18:06', '2023-07-11 22:18:06'),
(4, '1', '31334210', 'patricia ríos solarte', 'terapueta', '2000-04-23', '3134552134', 'patriciarios@gmail.com', NULL, '2023-07-11 22:19:12', '2023-07-11 22:19:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrar_tratamientos`
--

DROP TABLE IF EXISTS `registrar_tratamientos`;
CREATE TABLE IF NOT EXISTS `registrar_tratamientos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tratamientos` varchar(800) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_tratamiento` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saldo` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsable` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registrar_tratamientos`
--

INSERT INTO `registrar_tratamientos` (`id`, `id_cliente`, `user_id`, `nombre`, `celular`, `tratamientos`, `valor_tratamiento`, `saldo`, `responsable`, `estado`, `created_at`, `updated_at`) VALUES
(3, '3', '1', 'Luz Enith Calvo Villada', '3394209 - 3132403460', '[{\"tratamiento\":\"terapia neural\",\"valor_tratamiento\":\"320000\"},{\"tratamiento\":\"lodoterapia\",\"valor_tratamiento\":\"210000\"},{\"tratamiento\":\"colonterapia\",\"valor_tratamiento\":\"360000\"}]', '890000', '590000', 'Heberth Mazuera Arana', NULL, '2023-12-03 23:49:05', '2023-12-31 16:45:58'),
(4, '11', '1', 'Lorena Rentería Martinez', '3334228 - 31233593482', '[{\"tratamiento\":\"control\",\"valor_tratamiento\":\"150000\"},{\"tratamiento\":\"terapia con imanes\",\"valor_tratamiento\":\"220000\"}]', '370000', '0', 'Heberth Mazuera Arana', NULL, '2023-12-04 05:28:52', '2023-12-25 18:48:39'),
(5, '5', '1', 'Luisa Isabel Rojas Mesa', '2434392 - 3124394288', '[{\"tratamiento\":\"colonterapia - lodoterapia\",\"valor_tratamiento\":\"450000\"},{\"tratamiento\":\"masaje\",\"valor_tratamiento\":\"110000\"}]', '560000', '300000', 'Heberth Mazuera Arana', NULL, '2023-12-07 05:00:18', '2023-12-25 16:49:05'),
(6, '1', '1', 'Diana Milena Soto Medina', '3343923', '[{\"tratamiento\":\"biomagnetismo\",\"valor_tratamiento\":\"380000\"},{\"tratamiento\":\"auriculoterapia\",\"valor_tratamiento\":\"460000\"},{\"tratamiento\":\"acupuntura\",\"valor_tratamiento\":\"250000\"}]', '1090000', '1090000', 'Heberth Mazuera Arana', NULL, '2023-12-22 05:25:38', '2023-12-22 05:25:38'),
(7, '6', '1', 'Nora Elena Contreras Medina', '3354928 - 3115435492', '[{\"tratamiento\":\"auriculoterapia\",\"valor_tratamiento\":\"460000\"},{\"tratamiento\":\"masaje\",\"valor_tratamiento\":\"110000\"},{\"tratamiento\":\"lavado\",\"valor_tratamiento\":\"260000\"}]', '830000', '800000', 'Heberth Mazuera Arana', NULL, '2023-12-26 23:08:38', '2023-12-26 23:36:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_contables`
--

DROP TABLE IF EXISTS `registros_contables`;
CREATE TABLE IF NOT EXISTS `registros_contables` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `saldo` text COLLATE utf8mb4_unicode_ci,
  `ingreso` text COLLATE utf8mb4_unicode_ci,
  `egreso` text COLLATE utf8mb4_unicode_ci,
  `responsable` text COLLATE utf8mb4_unicode_ci,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registros_contables`
--

INSERT INTO `registros_contables` (`id`, `saldo`, `ingreso`, `egreso`, `responsable`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, NULL, '70000', NULL, 'martha ramirez', 'cuenta por cobrar', '2023-12-27 23:18:22', '2023-12-27 23:18:22'),
(2, NULL, NULL, '210000', 'martha ramirez', 'pago de servicio de energía', '2023-12-27 23:19:11', '2023-12-27 23:19:11'),
(3, NULL, '82000', NULL, 'luisa martinez ramos', 'cobro de cuenta por cobrar', '2023-12-31 23:28:15', '2023-12-31 23:28:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-01-04 04:43:03', '2024-01-04 04:43:03'),
(2, 'user', 'web', '2024-01-04 04:43:04', '2024-01-04 04:43:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(1, 2),
(2, 2),
(4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terapias`
--

DROP TABLE IF EXISTS `terapias`;
CREATE TABLE IF NOT EXISTS `terapias` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terapia` varchar(380) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_terapia` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `terapias`
--

INSERT INTO `terapias` (`id`, `user_id`, `terapia`, `color`, `valor_terapia`, `created_at`, `updated_at`) VALUES
(1, '1', 'terapia neural', '#831d9f', '320000', '2023-01-20 14:05:10', '2023-02-01 10:09:38'),
(2, '1', 'lodoterapia', '#ce3b3b', '210000', '2023-01-20 14:06:23', '2023-01-20 14:06:23'),
(3, '1', 'colonterapia', '#5e66d4', '360000', '2023-01-20 14:07:25', '2023-01-20 14:07:25'),
(4, '1', 'control', '#33997a', '150000', '2023-01-20 14:08:47', '2023-01-20 14:08:47'),
(5, '1', 'terapia con imanes', '#f05724', '220000', '2023-01-20 14:09:24', '2023-01-20 14:19:03'),
(6, '1', 'colonterapia - lodoterapia', '#939e3d', '450000', '2023-01-20 14:10:11', '2023-01-20 14:10:11'),
(7, '1', 'drenaje', '#be7b3c', '270000', '2023-01-20 14:10:43', '2023-01-20 14:10:43'),
(8, '1', 'masaje', '#e8d15e', '110000', '2023-01-20 14:11:20', '2023-01-20 14:24:26'),
(9, '1', 'biomagnetismo', '#c26fd3', '380000', '2023-01-20 14:12:09', '2023-01-20 14:12:09'),
(10, '1', 'auriculoterapia', '#c2bd1e', '460000', '2023-01-20 14:12:45', '2023-01-20 14:12:45'),
(11, '1', 'lavado', '#4be1ec', '260000', '2023-02-01 08:58:13', '2023-02-01 08:58:13'),
(12, '1', 'acupuntura', '#1560f6', '250000', '2023-02-01 10:06:47', '2023-02-01 10:06:47'),
(13, '1', 'oxonoterapia', NULL, '430000', '2023-02-01 10:16:14', '2023-02-01 10:17:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terapias_adicionales`
--

DROP TABLE IF EXISTS `terapias_adicionales`;
CREATE TABLE IF NOT EXISTS `terapias_adicionales` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terapias_adicionales` varchar(380) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_terapia` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `terapias_adicionales`
--

INSERT INTO `terapias_adicionales` (`id`, `user_id`, `terapias_adicionales`, `valor_terapia`, `created_at`, `updated_at`) VALUES
(1, '1', 'acupuntura', '110000', '2023-01-12 08:43:59', '2023-01-12 08:43:59'),
(2, '1', 'terapia neural', '230000', '2023-01-12 08:56:24', '2023-01-12 08:56:24'),
(3, '1', 'lodoterapia', '100000', '2023-01-12 09:06:39', '2023-01-12 09:06:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `rol`) VALUES
(1, 'heberth mazuera arana', 'heberth.mazuera@gmail.com', NULL, '$2y$10$POoqqaoxJ21D6XLro1/9nuhR.A2FCRSJd0ZEgiZ3OcKWg3Yi0TNVa', NULL, '2021-11-03 19:03:54', '2021-11-03 19:03:54', 'admin'),
(2, 'diana milena soto mesa', 'dianam@gmail.com', NULL, '$2y$10$9WGab58HYpgfU4WBq9HgqO2fHvjW7XXpB0VXGe/ZrYyaDJu.xI7qe', NULL, '2024-01-02 03:07:19', '2024-01-04 04:48:55', 'user'),
(3, 'isabel restrepo medina', 'isabelrestrepo@gmail.com', NULL, '$2y$10$3afOMusXKCrGMyXTfX86oOsVQgFTEa1aeww9fDxmiAOXjmgy5U78W', NULL, '2024-01-03 05:47:50', '2024-01-07 03:55:42', 'admin'),
(4, 'adiela serna', 'adielaserna@gmail.com', NULL, '$2y$10$bLg1C6Yz.1yvuuEfnSZxZ.VOeA6ZP57ulFj53xkmDYNLtjOXUQ3dG', NULL, '2024-01-05 03:57:04', '2024-01-05 04:00:56', 'admin');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abonos_clientes`
--
ALTER TABLE `abonos_clientes`
  ADD CONSTRAINT `abonos_clientes_id_tratamiento_foreign` FOREIGN KEY (`id_tratamiento`) REFERENCES `registrar_tratamientos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `controles`
--
ALTER TABLE `controles`
  ADD CONSTRAINT `controles_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `historias_clinicas` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `controles_historias`
--
ALTER TABLE `controles_historias`
  ADD CONSTRAINT `controles_historias_id_control_foreign` FOREIGN KEY (`id_control`) REFERENCES `controles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `controles_historias_id_historia_foreign` FOREIGN KEY (`id_historia`) REFERENCES `historias_clinicas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `descripciones_facturas`
--
ALTER TABLE `descripciones_facturas`
  ADD CONSTRAINT `descripciones_facturas_id_descripciones_foreign` FOREIGN KEY (`id_descripciones`) REFERENCES `descripciones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `descripciones_facturas_id_facturas_foreign` FOREIGN KEY (`id_facturas`) REFERENCES `facturas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
