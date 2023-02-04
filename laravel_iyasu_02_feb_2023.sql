-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-02-2023 a las 16:18:02
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.4.9

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
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tratamiento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `abonos_clientes`
--

INSERT INTO `abonos_clientes` (`id`, `id_cliente`, `user_id`, `id_tratamiento`, `nombre`, `celular`, `valor_tratamiento`, `saldo_actual`, `valor_abono`, `saldo`, `responsable`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', 'diana milena soto medina', '3434834 - 31223593589', '230000', '230000', '30000', '200000', 'heberth mazuera arana', 'lodoterapia', NULL, '2023-01-20 01:43:19', '2023-01-20 01:43:19'),
(2, '1', '1', '1', 'diana milena soto medina', '3434834 - 31223593589', '230000', '200000', '5000', '195000', 'heberth mazuera arana', 'lodoterapia', NULL, '2023-01-22 04:09:42', '2023-01-22 04:09:42'),
(3, '1', '1', '1', 'diana milena soto medina', '3434834 - 31223593589', '230000', '195000', '95000', '100000', 'heberth mazuera arana', 'colonterapia', NULL, '2023-02-01 02:22:07', '2023-02-01 02:22:07'),
(4, '1', '1', '1', 'diana milena soto medina', '3434834 - 31223593589', '230000', '100000', '100000', '0', 'heberth mazuera arana', 'colonterapia', NULL, '2023-02-01 02:28:52', '2023-02-01 02:28:52');

--
-- Disparadores `abonos_clientes`
--
DROP TRIGGER IF EXISTS `actualizar_saldo`;
DELIMITER $$
CREATE TRIGGER `actualizar_saldo` AFTER INSERT ON `abonos_clientes` FOR EACH ROW UPDATE registrar_tratamientos
SET saldo =   new.saldo
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
  `id_cliente` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cedula` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barrio` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municipio` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `clientes_cedula_unique` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cedula`, `user_id`, `fecha_nacimiento`, `edad`, `nombre`, `direccion`, `barrio`, `municipio`, `celular`, `email`, `estado`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '11111111', '1', '1999-12-01', '23 Años', 'diana milena soto medina', 'calle 45 # 12 - 45', 'los pinos', 'Zarzal', '3434834 - 31223593589', 'dianasoto@gmail.com', 'habilitado', '2022-12-06 05:20:20', '2023-01-22 01:27:34', NULL),
(2, '22222222', '1', '1991-11-23', '31 Años', 'lorena rentería linares', 'calle 5 # 12 -  20', 'el nogal', 'Tulúa', '3233482 - 31124593482', 'lorenarenteria@gmail.com', 'habilitado', '2022-12-06 05:26:15', '2023-01-22 06:07:43', NULL),
(3, '33333333', '1', '1999-10-12', '23 Años', 'catalina correa caicedo', 'cra 4 # 12 - 20', 'el nogal', 'roldanillo', '33945934 - 31133952289', 'catalinacorrea@gmail.com', 'habilitado', '2022-11-06 22:41:17', '2023-01-22 01:13:20', NULL),
(4, '44444444', '1', '1992-12-02', '30 Años', 'liliana garcía martinez', 'cra 4 # 2 - 12', 'los pinos', 'Alcala', '3439482 - 3114567890', 'lilianagarcia@gmail.com', 'habilitado', NULL, '2022-12-31 22:42:11', NULL),
(5, '55555555', '1', '2002-01-23', '20 Años', 'nora gonzález torres', 'calle 43 # 12 - 20', 'los nogales', 'Caicedonia', '3348237 - 31334238388', 'noragonzalez@gmail.com', 'habilitado', '2023-01-02 03:12:50', '2023-01-02 03:12:50', NULL),
(6, '66666666', '1', '1999-01-20', '23 Años', 'lina maría barreiro mesa', 'cra 44 B # 2 - 32', 'salomia', 'Cali', '3443829 - 31149458324', 'linabarreiro@gmail.com', 'habilitado', NULL, NULL, NULL),
(7, '7777777', '1', '1992-02-02', '30 Años', 'isabel martinez rojas', 'cra 43 # 21 - 40', 'los ocobos', 'Caicedonia', '3344353 - 3114584834', 'isabelmartinez@gmail.com', 'habilitado', '2023-01-10 01:48:04', '2023-01-10 01:48:04', NULL),
(8, '23232323', '1', '2001-10-21', '21 Años', 'lisbeth cortes aldana', 'cra 34 # 21 - 34', 'los ocobos', 'Zarzal', '3444592 - 3145928272', 'lisbethcortes@gmail.com', 'habilitado', '2023-02-01 02:33:31', '2023-02-01 02:37:55', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controles`
--

DROP TABLE IF EXISTS `controles`;
CREATE TABLE IF NOT EXISTS `controles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_control` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peso` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abd` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grasa` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agua` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `controles`
--

INSERT INTO `controles` (`id`, `id_cliente`, `user_id`, `num_control`, `peso`, `abd`, `grasa`, `agua`, `created_at`, `updated_at`) VALUES
(2, '4', '1', '1', '67', '54', '59', '45', '2022-12-31 06:57:37', '2022-12-31 06:57:37'),
(5, '1', '1', '4', '76', '54', '69', '48', '2023-01-02 06:13:49', '2023-01-02 06:13:49'),
(6, '1', '1', '1', '76', '55', '50', '68', '2023-01-02 22:32:21', '2023-01-05 22:44:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `cliente` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medico` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `userId`, `title`, `start`, `end`, `cliente`, `telefono`, `descripcion`, `medico`, `color`, `created_at`, `updated_at`) VALUES
(3, '1', 'terapia con imanes', '2022-11-19 07:00:00', '2022-11-19 07:30:00', 'Aldemar rosales molano', '3449594- 31242385438', 'Presenta dolor en espalda desde hace 2 días', 'Eduardo Correa medina', '#1560f6', NULL, '2022-11-21 16:50:34'),
(4, '1', 'biomagnetismo', '2022-11-19 07:30:00', '2022-11-19 08:00:00', 'diana milena soto arteaga', '34343948 - 31222394924', 'Ninguno', 'Eliana Buitrago Rosales', '#a845c9', NULL, '2022-11-21 16:50:48'),
(5, '1', 'biomagnetismo', '2022-11-25 08:30:00', '2022-11-25 09:15:00', 'Catalina Rosales contreras', '4439438 - 31223847364', 'Ninguno', 'Eliana Buitrago Rosales', '#a845c9', NULL, '2022-11-29 04:35:57'),
(7, '1', 'lodoterapia', '2022-11-24 08:00:00', '2022-11-24 08:15:00', 'eliana marmolejo rosales', '3445940 - 31334030598', 'Presenta dolor en la espalda desde hace 2 días', 'Eduardo Correa medina', '#8c7657', NULL, '2022-11-26 05:31:35'),
(8, '1', 'terapia con imanes', '2022-11-24 08:00:00', '2022-11-24 08:15:00', 'lina maría barreiro mora', '4456690 - 31132959590', 'Ninguno', 'Eliana Buitrago Rosales', '#1560f6', NULL, '2022-11-26 05:31:26'),
(9, '1', 'drenaje', '2022-11-25 08:30:00', '2022-11-25 09:15:00', 'elisa hernández torres', '43902893 - 3104394928', 'Ninguno', 'Eliana Buitrago Rosales', '#d51051', NULL, '2022-11-29 04:36:10'),
(10, '1', 'Control', '2022-11-25 08:30:00', '2022-11-25 09:15:00', 'Aida luz rosero correa', '4395933 - 31253053930', 'segundo control', 'Eduardo Correa medina', '#68538b', NULL, '2022-11-29 04:36:03'),
(12, '1', 'drenaje', '2022-12-31 10:00:00', '2022-12-31 10:30:00', 'luisa fernanda torres', '34343948 - 31222394924', 'Desde hace 3 días presenta dolor de cabeza', 'Eliana Buitrago Rosales', '#d51051', NULL, '2022-12-31 06:43:04'),
(13, '1', 'Terapia neural', '2023-01-24 02:30:00', '2023-01-24 03:00:00', 'isabel rosales marmolejo', '3333943 - 31224924398', 'Presenta dolor en oído derecho desde hace 2 días', 'luisa fernanda gómez rosales', '#831d9f', NULL, '2023-01-24 05:13:58'),
(14, '1', 'lodoterapia', '2022-12-31 09:00:00', '2022-12-31 09:30:00', 'elizabeth morales torres', '3433448 - 311143053895', 'Ninguno', 'Eliana Buitrago Rosales', '#8c7657', NULL, '2022-12-31 06:42:46'),
(15, '1', 'control', '2022-12-31 09:30:00', '2022-12-31 10:00:00', 'rosalia hernádez correa', '3433448 - 311143053895', 'Ninguno', 'Eduardo Correa medina', '#68538b', NULL, '2022-12-31 06:43:00'),
(16, '1', 'colonterapia - lodoterapia', '2023-02-02 09:00:00', '2023-02-02 09:30:00', 'adelaida jaramillo dominguez', '4459450 -  31123969389', 'Ninguno', 'lucia veles solarte', '#d51051', NULL, '2023-02-02 05:22:51'),
(17, '1', 'masaje', '2022-12-31 10:00:00', '2022-12-31 10:30:00', 'martha janeth osorio mora', '3433448 - 311143053895', 'Ninguno', 'Eduardo Correa medina', '#0a5e2e', NULL, '2022-12-31 06:43:12'),
(18, '1', 'terapia con imanes', '2022-12-30 11:00:00', '2022-12-30 11:30:00', 'elisabeth restrepo moreno', '4345643 - 31334395938', 'Ninguno', 'Eduardo Correa medina', '#1560f6', NULL, '2022-12-30 06:01:21'),
(19, '1', 'auriculoterapia', '2023-01-23 01:00:00', '2023-01-23 02:30:00', 'diana milena soto medina', '3434834 - 31223593589', 'Presenta dolor en espalda desde hace 2 dias', 'luisa fernanda gómez rosales', '#c2bd1e', NULL, '2023-01-23 23:37:09'),
(20, '1', 'control', '2023-02-02 09:30:00', '2023-02-02 10:00:00', 'catalina correa caicedo', '33945934 - 31133952289', 'Desde hace 3 días presenta dolor en pierna derecha', 'nora rosales torres', '#68538b', NULL, '2023-02-02 05:22:54'),
(21, '1', 'lodoterapia', '2023-02-02 10:30:00', '2023-02-02 11:00:00', 'lorena rentería linares', '3233482 - 31124593482', 'Ninguno', 'lucia veles solarte', '#d51051', NULL, '2023-02-02 05:23:12'),
(22, '1', 'auriculoterapia', '2023-02-02 10:00:00', '2023-02-02 10:30:00', 'lina maría barreiro mesa', '3443829 - 31149458324', 'Presenta dolor en espalda desde hace 2 días', 'isabel forero escobar', '#c2bd1e', NULL, '2023-02-02 05:23:03'),
(23, '1', 'auriculoterapia', '2023-02-02 11:30:00', '2023-02-02 12:00:00', 'lina maría barreiro mesa', '3443829 - 31149458324', 'Presenta dolor en espalda', 'lucia veles solarte', '#c2bd1e', NULL, '2023-02-02 05:23:23'),
(24, '1', 'drenaje', '2023-02-02 11:00:00', '2023-02-02 11:30:00', 'catalina correa caicedo', '33945934 - 31133952289', 'Desde hace dos días presenta dolor en pierna derecha', 'lucia veles solarte', '#be7b3c', NULL, '2023-02-02 05:23:15'),
(25, '1', 'lodoterapia', '2023-02-02 12:00:00', '2023-02-02 12:30:00', 'lina maría barreiro mesa', '3443829 - 31149458324', 'Presenta dolor en rodilla derecha', 'lucia veles solarte', '#5e66d4', NULL, '2023-02-02 05:23:29'),
(28, '1', 'auriculoterapia', '2023-02-02 17:00:00', '2023-02-02 18:30:00', 'liliana garcía martinez', '3439482 - 3114567890', 'Ninguna', 'isabel forero escobar', '#c2bd1e', NULL, '2023-02-02 05:24:04'),
(29, '1', 'terapia con imanes', '2023-01-24 01:00:00', '2023-01-24 02:30:00', 'catalina correa caicedo', '33945934 - 31133952289', 'Presenta dolor en brazo derecho', 'lucia veles solarte', '#f05724', NULL, NULL),
(30, '1', 'drenaje', '2023-01-24 01:00:00', '2023-01-24 02:30:00', 'catalina correa caicedo', '33945934 - 31133952289', 'Presenta dolor en brazo derecho', 'lucia veles solarte', '#be7b3c', NULL, NULL),
(32, '1', 'control', '2023-02-02 13:00:00', '2023-02-02 13:30:00', 'lina maría barreiro mesa', '3443829 - 31149458324', 'Ninguno', 'isabel forero escobar', '#33997a', NULL, '2023-02-02 05:23:39'),
(34, '1', 'biomagnetismo', '2023-02-02 07:00:00', '2023-02-02 08:30:00', 'diana milena soto medina', '3434834 - 31223593589', 'Presenta dolor en pierna derecha', 'lucia veles solarte', '#c26fd3', NULL, '2023-02-02 05:22:46'),
(35, '1', 'terapia con imanes', '2023-02-02 19:30:00', '2023-02-02 20:30:00', 'lorena rentería linares', '3233482 - 31124593482', 'Ninguno', 'luisa fernanda gómez rosales', '#f05724', NULL, '2023-02-02 05:24:06'),
(36, '1', 'drenaje', '2023-02-02 15:00:00', '2023-02-02 16:00:00', 'diana milena soto medina', '3434834 - 31223593589', 'Presenta dolor en pierna derecha y dolor de cabeza desde hace 3 días', 'luisa fernanda gómez rosales', '#5e66d4', NULL, '2023-02-02 05:23:54'),
(37, '1', 'colonterapia - lodoterapia', '2023-02-02 14:00:00', '2023-02-02 15:00:00', 'catalina correa caicedo', '33945934 - 31133952289', 'Ninguno', 'isabel forero escobar', '#939e3d', NULL, '2023-02-02 05:23:49'),
(38, '1', 'terapia neural', '2023-02-02 16:00:00', '2023-02-02 16:30:00', 'lorena rentería linares', '3233482 - 31124593482', 'Ninguno', 'lucia veles solarte', '#831d9f', NULL, '2023-02-02 05:24:02'),
(39, '1', 'terapia con imanes', '2023-02-02 12:30:00', '2023-02-02 13:00:00', 'catalina correa caicedo', '33945934 - 31133952289', 'Ninguno', 'isabel forero escobar', '#f05724', NULL, '2023-02-02 05:23:37'),
(40, '1', 'lavado', '2023-02-02 13:30:00', '2023-02-02 14:00:00', 'lorena rentería linares', '3233482 - 31124593482', 'Ninguno', 'luisa fernanda gómez rosales', '#95c4f0', NULL, '2023-02-02 05:23:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
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
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cliente` bigint(20) UNSIGNED NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historias_clinicas`
--

INSERT INTO `historias_clinicas` (`id`, `user_id`, `id_cliente`, `profesional`, `estatura`, `peso_inicial`, `abd_inicial`, `grasa_inicial`, `agua_inicial`, `imc`, `grasa_viseral`, `edad_metabolica`, `terapias`, `paquete_desintoxicacion`, `terapias_adicionales`, `tipo_lavado`, `num_lavado`, `dias_lavados`, `observaciones`, `created_at`, `updated_at`) VALUES
(4, '1', 4, 'Martha Isabel Rosales Mila', '165', '74', '65', '56', '45', '28', '65', '69', 'Colonterapia,Terapia neural', 'paquete 2', 'Auriculoterapia,Biomagnetismo', 'manzanilla', NULL, NULL, 'Presenta dolor en espalda desde hace 3 días', '2022-12-31 06:56:52', '2022-12-31 06:56:52'),
(8, '1', 1, 'nora rosales tenorio', '167', '76', '58', '46', '55', '28', '63', '59', 'Colonterapia,Terapia neural', 'paquete 4', 'Auriculoterapia,Biomagnetismo', 'manzanilla', NULL, NULL, 'Presenta dolor en la espalda desde hace 2 días', '2023-01-10 02:48:00', '2023-01-22 01:28:13'),
(9, '1', 8, 'luisa fernanda gómez rosales', '166', '69', '56', '45', '44', '28', '54', '36', 'lodoterapia,colonterapia,control,terapia con imanes,drenaje', 'paquete 2', 'acupuntura', 'manzanilla', NULL, NULL, 'Presenta dolor en espalda desde hace 4 días', '2023-02-01 02:36:19', '2023-02-01 02:36:19'),
(10, '1', 2, 'luisa fernanda gómez rosales', '167', '56', '54', '65', '45', '29', '65', '49', 'terapia neural,lodoterapia', 'paquete 2', 'acupuntura', 'manzanilla', NULL, NULL, 'Desde hace 2 días presente dolor en rodilla derecha', '2023-02-01 02:50:25', '2023-02-01 02:50:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lavados`
--

DROP TABLE IF EXISTS `lavados`;
CREATE TABLE IF NOT EXISTS `lavados` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
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
(2, '1', 'café', '45000', '2023-01-12 04:11:44', '2023-01-12 04:11:44'),
(3, '1', 'manzanilla', '55000', '2023-01-12 04:12:18', '2023-01-16 23:47:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_28_231917_create_events_table', 1),
(6, '2022_11_03_175655_create_clientes_table', 1),
(7, '2022_11_03_181012_create_historias_clinicas_table', 1),
(8, '2022_11_03_211415_create_profesionales_table', 1),
(9, '2022_11_03_224902_create_pagos_table', 1),
(10, '2022_11_03_232912_create_abonos_table', 1),
(11, '2022_11_03_234414_create_controles_table', 1),
(12, '2022_11_03_175657_create_clientes_table', 2),
(13, '2022_11_03_234415_create_controles_table', 3),
(14, '2022_11_03_232912_create_abonos_clientes_table', 4),
(15, '2022_11_03_224902_create_pagos_honorarios_table', 5),
(16, '2021_09_28_231918_create_events_table', 6),
(17, '2022_11_03_175658_create_clientes_table', 7),
(18, '2022_11_03_175660_create_clientes_table', 8),
(19, '2022_11_03_175661_create_clientes_table', 9),
(20, '2022_11_03_181013_create_historias_clinicas_table', 10),
(21, '2022_11_03_181014_create_historias_clinicas_table', 11),
(22, '2022_11_03_181015_create_historias_clinicas_table', 12),
(23, '2022_11_03_181016_create_historias_clinicas_table', 13),
(24, '2022_11_03_234416_create_controles_table', 14),
(25, '2022_11_03_175662_create_clientes_table', 15),
(26, '2022_11_03_175668_create_clientes_table', 16),
(27, '2022_11_03_181017_create_historias_clinicas_table', 17),
(28, '2022_11_03_175669_create_clientes_table', 18),
(29, '2022_11_03_181020_create_historias_clinicas_table', 18),
(30, '2022_11_03_175670_create_clientes_table', 19),
(31, '2022_11_03_211416_create_profesionales_table', 20),
(32, '2022_11_03_211417_create_profesionales_table', 21),
(33, '2022_11_03_232913_create_abonos_clientes_table', 22),
(34, '2022_11_03_232914_create_abonos_clientes_table', 23),
(35, '2022_11_03_232915_create_abonos_clientes_table', 24),
(36, '2022_11_24_234004_create_terapias_table', 25),
(37, '2022_11_24_234005_create_terapias_table', 26),
(38, '2022_11_24_234006_create_terapias_table', 27),
(39, '2022_11_24_234007_create_terapias_table', 28),
(40, '2022_11_24_234008_create_terapias_table', 29),
(41, '2022_12_02_231018_create_terapias_adicionales_table', 29),
(42, '2022_12_04_010733_create_profesionales_table', 30),
(43, '2022_11_03_232916_create_abonos_clientes_table', 31),
(44, '2022_11_03_232917_create_abonos_clientes_table', 32),
(45, '2022_11_03_175671_create_clientes_table', 33),
(46, '2022_12_05_005010_create_registrar_tratamiento_table', 33),
(47, '2022_12_05_114059_add_mes_to_clientes', 33),
(48, '2022_11_03_175672_create_clientes_table', 34),
(49, '2022_11_03_232918_create_abonos_clientes_table', 35),
(50, '2022_11_03_232919_create_abonos_clientes_table', 36),
(51, '2022_11_03_181021_create_historias_clinicas_table', 37),
(52, '2022_11_03_234417_create_controles_table', 38),
(53, '2022_12_05_005011_create_registrar_tratamiento_table', 39),
(54, '2022_12_05_005012_create_registrar_tratamiento_table', 40),
(55, '2022_12_22_173239_create_registrar_tratamientos_table', 41),
(56, '2022_12_22_173240_create_registrar_tratamientos_table', 42),
(57, '2022_12_22_173241_create_registrar_tratamientos_table', 43),
(58, '2022_12_22_173242_create_registrar_tratamientos_table', 44),
(59, '2022_11_03_232920_create_abonos_clientes_table', 45),
(60, '2022_12_22_173243_create_registrar_tratamientos_table', 46),
(61, '2022_11_03_232921_create_abonos_clientes_table', 47),
(62, '2022_11_03_232922_create_abonos_clientes_table', 48),
(63, '2022_11_03_232923_create_abonos_clientes_table', 49),
(64, '2022_12_04_010734_create_profesionales_table', 50),
(65, '2022_12_04_010735_create_profesionales_table', 51),
(66, '2022_12_04_010736_create_profesionales_table', 52),
(67, '2022_12_22_173247_create_registrar_tratamientos_table', 53),
(68, '2022_12_22_173248_create_registrar_tratamientos_table', 54),
(69, '2022_11_24_234009_create_terapias_table', 55),
(70, '2022_11_24_23400910_create_terapias_table', 56),
(71, '2022_12_02_231019_create_terapias_adicionales_table', 57),
(72, '2023_01_11_184352_create_lavados_table', 58),
(73, '2023_01_11_184353_create_lavados_table', 59),
(74, '2022_11_03_224903_create_pagos_honorarios_table', 60),
(75, '2022_11_03_224904_create_pagos_honorarios_table', 61),
(76, '2022_11_03_224905_create_pagos_honorarios_table', 62),
(77, '2022_11_03_224906_create_pagos_honorarios_table', 63),
(78, '2022_11_24_23400911_create_terapias_table', 64);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_honorarios`
--

DROP TABLE IF EXISTS `pagos_honorarios`;
CREATE TABLE IF NOT EXISTS `pagos_honorarios` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_profesional` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_pago` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pagos_honorarios_cedula_unique` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pagos_honorarios`
--

INSERT INTO `pagos_honorarios` (`id`, `user_id`, `id_profesional`, `cedula`, `nombre`, `celular`, `valor_pago`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '11111111', 'nora rosales torres', '3134343423', '320000', '2023-01-18 23:11:51', '2023-01-20 01:30:26'),
(2, '1', '6', '44444444', 'luisa fernanda gómez rosales', '31243453548', '310000', '2023-01-18 23:19:48', '2023-01-20 01:36:42'),
(3, '1', '5', '22222222', 'lucia veles solarte', '31145385349', '420000', '2023-01-20 01:37:52', '2023-01-20 01:37:52');

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
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesionales`
--

INSERT INTO `profesionales` (`id`, `user_id`, `cedula`, `nombre`, `profesion`, `fecha_nacimiento`, `celular`, `email`, `porcentaje`, `created_at`, `updated_at`) VALUES
(1, '1', '11111111', 'nora rosales torres', 'terapista', '1990-01-20', '3134343423', 'norarosales@gmail.com', NULL, '2023-01-10 02:12:17', '2023-01-10 17:13:32'),
(3, '1', '33333333', 'isabel forero escobar', 'terapista', '1980-01-10', '3135469229', 'isabelforero@gmail.com', NULL, '2023-01-10 02:53:23', '2023-01-10 05:54:06'),
(5, '1', '22222222', 'lucia veles solarte', 'terapista', '1995-04-12', '31145385349', 'luciaveles@gmail.com', NULL, '2023-01-10 06:27:29', '2023-01-10 06:27:29'),
(6, '1', '44444444', 'luisa fernanda gómez rosales', 'quiropráctico', '1994-02-15', '31243453548', 'luisafern@gmail.com', NULL, '2023-01-10 17:15:09', '2023-01-16 23:59:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrar_tratamientos`
--

DROP TABLE IF EXISTS `registrar_tratamientos`;
CREATE TABLE IF NOT EXISTS `registrar_tratamientos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tratamiento` varchar(800) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor_tratamiento` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `saldo` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsable` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registrar_tratamientos`
--

INSERT INTO `registrar_tratamientos` (`id`, `id_cliente`, `user_id`, `nombre`, `celular`, `tratamiento`, `valor_tratamiento`, `saldo`, `responsable`, `estado`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'diana milena soto medina', '3434834 - 31223593589', 'colonterapia', '230000', '0', 'heberth mazuera arana', 'Pendiente', '2023-01-11 04:17:45', '2023-01-27 22:21:52'),
(2, '6', '1', 'lina maría barreiro mesa', '3443829 - 31149458324', 'biomagnetismo', '380000', '340000', 'heberth mazuera arana', 'Pendiente', '2023-01-27 22:21:31', '2023-02-01 00:01:20'),
(3, '6', '1', 'lina maría barreiro mesa', '3443829 - 31149458324', 'masaje', '110000', '260000', 'heberth mazuera arana', 'Pendiente', '2023-01-31 23:16:26', '2023-02-01 00:00:56'),
(4, '2', '1', 'lorena rentería linares', '3233482 - 31124593482', 'colonterapia - lodoterapia', '450000', '450000', 'heberth mazuera arana', 'Pendiente', '2023-01-31 23:21:01', '2023-01-31 23:21:01'),
(5, '3', '1', 'catalina correa caicedo', '33945934 - 31133952289', 'auriculoterapia', '460000', '460000', 'heberth mazuera arana', 'Pendiente', '2023-02-01 00:03:21', '2023-02-01 00:03:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terapias`
--

DROP TABLE IF EXISTS `terapias`;
CREATE TABLE IF NOT EXISTS `terapias` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
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
(1, '1', 'terapia neural', '#831d9f', '320000', '2023-01-20 04:05:10', '2023-02-01 00:09:38'),
(2, '1', 'lodoterapia', '#ce3b3b', '210000', '2023-01-20 04:06:23', '2023-01-20 04:06:23'),
(3, '1', 'colonterapia', '#5e66d4', '360000', '2023-01-20 04:07:25', '2023-01-20 04:07:25'),
(4, '1', 'control', '#33997a', '150000', '2023-01-20 04:08:47', '2023-01-20 04:08:47'),
(5, '1', 'terapia con imanes', '#f05724', '220000', '2023-01-20 04:09:24', '2023-01-20 04:19:03'),
(6, '1', 'colonterapia - lodoterapia', '#939e3d', '450000', '2023-01-20 04:10:11', '2023-01-20 04:10:11'),
(7, '1', 'drenaje', '#be7b3c', '270000', '2023-01-20 04:10:43', '2023-01-20 04:10:43'),
(8, '1', 'masaje', '#e8d15e', '110000', '2023-01-20 04:11:20', '2023-01-20 04:24:26'),
(9, '1', 'biomagnetismo', '#c26fd3', '380000', '2023-01-20 04:12:09', '2023-01-20 04:12:09'),
(10, '1', 'auriculoterapia', '#c2bd1e', '460000', '2023-01-20 04:12:45', '2023-01-20 04:12:45'),
(11, '1', 'lavado', '#4be1ec', '260000', '2023-01-31 22:58:13', '2023-01-31 22:58:13'),
(12, '1', 'acupuntura', '#1560f6', '250000', '2023-02-01 00:06:47', '2023-02-01 00:06:47'),
(13, '1', 'oxonoterapia', NULL, '430000', '2023-02-01 00:16:14', '2023-02-01 00:17:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terapias_adicionales`
--

DROP TABLE IF EXISTS `terapias_adicionales`;
CREATE TABLE IF NOT EXISTS `terapias_adicionales` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
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
(1, '1', 'acupuntura', '110000', '2023-01-11 22:43:59', '2023-01-11 22:43:59'),
(2, '1', 'terapia neural', '230000', '2023-01-11 22:56:24', '2023-01-11 22:56:24'),
(3, '1', 'lodoterapia', '100000', '2023-01-11 23:06:39', '2023-01-11 23:06:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'heberth mazuera arana', 'heberth.mazuera@gmail.com', NULL, '$2y$10$POoqqaoxJ21D6XLro1/9nuhR.A2FCRSJd0ZEgiZ3OcKWg3Yi0TNVa', NULL, '2021-11-03 09:03:54', '2021-11-03 09:03:54'),
(2, 'Diana Milena Soto martinez', 'dianam@gmail.com', NULL, '$2y$10$1kxtkuB91ka5m2GkSk40Hu3HKnj1baLljBG.W/oA4pRhNwXC4kMiC', NULL, '2021-11-18 03:15:34', '2021-11-18 03:15:34');
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
