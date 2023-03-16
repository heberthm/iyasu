-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-03-2023 a las 02:32:12
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
  `id_tratamiento` bigint(20) UNSIGNED DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `abonos_clientes`
--

INSERT INTO `abonos_clientes` (`id`, `id_cliente`, `user_id`, `id_tratamiento`, `nombre`, `celular`, `valor_tratamiento`, `saldo_actual`, `valor_abono`, `saldo`, `responsable`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 6, 'diana milena soto medina', '3394834 - 31444939427', '220000', '220000', '100000', '120000', 'heberth mazuera arana', 'terapia con imanes', NULL, '2023-03-07 03:27:07', '2023-03-07 03:27:07'),
(2, '2', '1', 4, 'lorena rentería moreno', '3239492 - 31439593587', '360000', '360000', '120000', '240000', 'heberth mazuera arana', 'colonterapia', NULL, '2023-03-07 03:27:32', '2023-03-07 03:27:32'),
(3, '1', '1', 6, 'diana milena soto medina', '3394834 - 31444939427', '220000', '120000', '100000', '20000', 'heberth mazuera arana', 'terapia con imanes', NULL, '2023-03-09 16:39:07', '2023-03-09 16:39:07');

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
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `clientes_cedula_unique` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cedula`, `user_id`, `fecha_nacimiento`, `edad`, `nombre`, `direccion`, `barrio`, `municipio`, `celular`, `email`, `estado`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '11111111', '1', '1994-06-12', '28 Años', 'diana milena soto medina', 'calle 45 # 12 - 45', 'los pinos', 'Caicedonia', '3394834 - 31444939427', 'dianamilena@gmail.com', 1, '2023-02-22 23:23:36', '2023-03-06 22:42:29', NULL),
(2, '747474747', '1', '1991-07-12', '31 Años', 'lorena rentería moreno', 'calle 5 # 12 -  20', 'el nogal', 'Alcala', '3239492 - 31439593587', 'lorenrenteria@hotmail.com', 1, '2023-02-23 23:20:21', '2023-03-08 05:46:26', NULL),
(3, '75757575', '1', '1979-07-10', '43 Años', 'luz enith calvo villada', 'calle 5 # 12 -  20', 'las orquidias', 'Ginebra', '3495938 - 31145495838', 'luzcalvo@gmail.com', 1, '2023-02-23 23:50:40', '2023-03-04 06:23:26', NULL),
(4, '76767676', '1', '1994-02-11', '29 Años', 'lina maría barreiro castro', 'calle 5 # 12 -  20', 'los ocobos', 'Toro', '3495938 - 31145495838', 'linabarreiro@gmail.com', 1, '2023-02-23 23:54:17', '2023-03-02 22:49:48', NULL),
(5, '22222222', '1', '1978-04-24', '44 Años', 'carolina soto mora', 'calle 43 # 12 - 20', 'el nogal', 'Dagua', '4443323 - 31143959328', 'carolinasoto@gmail.com', 1, '2023-02-28 17:02:40', '2023-03-01 03:35:19', NULL),
(6, '33333333', '1', '1967-03-10', '55 Años', 'catalina ortega morales', 'cra 4 # 12 - 20', 'el nogal', 'Dagua', '4443399 - 3135599587', 'catalinaortega@gmail.com', 1, '2023-03-01 05:16:14', '2023-03-02 22:50:29', NULL),
(7, '13131313', '1', '1975-05-12', '47 Años', 'luisa fernanda correa toledo', 'call2 12 # 42 - 12', 'los pinos', 'Alcala', '3349348 - 31224453879', 'luisacorrea@gmail.com', 1, '2023-03-01 23:40:44', '2023-03-02 22:50:27', NULL),
(8, '14141414', '1', '1978-04-14', '44 Años', 'luisa fernanda mesa castro', 'calle 12 # 42 - 12', 'el nogal', 'Alcala', '3344829 - 3114485834', 'luisamesa@gmail.com', 1, '2023-03-01 23:45:38', '2023-03-02 22:50:23', NULL),
(9, '26262626', '1', '1959-06-12', '63 Años', 'lucero martinez correa', 'calle 5 # 12 -  20', 'los ocobos', 'Alcala', '3493853 - 31347583857', 'luceromartinez@gmail.com', 1, '2023-03-02 04:36:33', '2023-03-02 22:50:17', NULL),
(10, '61616161', '1', '1979-04-12', '43 Años', 'tatiana villamil forero', 'calle 5 # 12 -  20', 'los pinos', 'Restrepo', '3459382 - 312434954383', 'tatianavillamil@gmail.com', 1, '2023-03-02 13:01:02', '2023-03-02 22:50:12', NULL),
(11, '62626262', '1', '1996-03-16', '26 Años', 'zoraida contreras hernández', 'cra 4 # 12 - 40', 'el nogal', 'Ginebra', '3384839 - 31224584357', 'zoraidacontreras@gmail.com', 1, '2023-03-02 13:05:57', '2023-03-02 22:50:06', NULL),
(12, '72727272', '1', '1981-11-10', '41 Años', 'alejandra donado estrada', 'calle 43 # 12 - 20', 'los naranjos', 'Dagua', '3345924 - 31354959389', 'alejandradonado@gmail.com', 1, '2023-03-02 13:23:16', '2023-03-02 22:50:03', NULL),
(13, '54545454', '1', '1981-07-23', '41 Años', 'noralba castaño solarte', 'calle 5 # 12 -  20', 'los ocobos', 'Alcala', '3459495 - 31345694956', 'noralbacastano@gmail.com', 1, '2023-03-02 13:26:28', '2023-03-02 22:50:00', NULL),
(14, '56565656', '1', '1992-06-14', '30 Años', 'fernanda jaramillo rodríguez', 'calle 43 # 12 - 20', 'el nogal', 'San pedro', '4439483 - 313549495684', 'fernandajaramillo@gmail.com', 1, '2023-03-02 13:58:54', '2023-03-02 22:49:39', NULL),
(15, '83838383', '1', '1996-04-12', '26 Años', 'martha cecilia mora linares', 'calle 5 # 12 -  20', 'los pinos', 'Alcala', '3394928 - 3113395938', 'marthamora@gmail.com', 1, '2023-03-02 22:26:14', '2023-03-02 23:02:16', NULL),
(17, '84848484', '1', '1996-05-12', '26 Años', 'lida guerrero guzmán', 'call2 12 # 42 - 12', 'los ocobos', 'Florida', '3348383 - 31224939548', 'lidaguerrero@gmail.com', 1, '2023-03-03 03:34:47', '2023-03-03 03:34:47', NULL),
(18, '87878787', '1', '1993-05-16', '29 Años', 'manuela castillo molina', 'calle 6 # 12 - 20', 'el nogal', 'San pedro', '2334938 - 31344959348', 'manuelcastillo@gmail.com', 1, '2023-03-03 03:41:28', '2023-03-03 03:41:28', NULL),
(19, '65656565', '1', '1995-05-01', '27 Años', 'beatriz rosales trejos', 'calle 43 # 12 - 20', 'los pinos', 'Alcala', '3349394 - 3114494953', 'beatrizrosales@gmail.com', 1, '2023-03-03 03:54:48', '2023-03-03 03:54:48', NULL),
(20, '252525252', '1', '1993-04-01', '29 Años', 'adelaida forero medina', 'calle 6 # 12 - 20', 'el nogal', 'Alcala', '3394934 - 31245949583', 'adelaidaforero@gmail.com', 1, '2023-03-03 04:02:37', '2023-03-03 04:02:37', NULL),
(21, '52525252', '1', '1994-04-12', '28 Años', 'adelaida moreno díaz', 'calle 43 # 12 - 20', 'la estancia', 'Florida', '3393948 - 31339593458', 'adelaidamoreno@gmail.com', 1, '2023-03-03 04:05:16', '2023-03-03 04:05:16', NULL),
(22, '93939393', '1', '1994-04-04', '28 Años', 'marisol libreros correa', 'calle 5 # 12 -  20', 'los ocobos', 'Dagua', '3394338 - 3222349348', 'marisollibreros@gmail.com', 1, '2023-03-03 04:12:01', '2023-03-03 04:12:01', NULL),
(23, '121212121', '1', '1993-05-29', '29 Años', 'marcela ossa restrepo', 'Cra 56 # 21-45', 'el nogal', 'San pedro', '3393945 - 31232394934', 'marcelaossa@gmail.com', 1, '2023-03-03 04:16:07', '2023-03-03 04:16:07', NULL),
(24, '232323231', '1', '1993-11-05', '29 Años', 'katherine torres molina', 'call2 12 # 42 - 12', 'el nogal', 'Dagua', '3394593 - 31434593948', 'katherinetorres@gmail.com', 1, '2023-03-03 04:18:38', '2023-03-03 04:18:38', NULL),
(25, '4447547', '1', '1969-04-10', '53 Años', 'mónica jaramillo tenorio', 'calle 6 # 12 - 20', 'los pinos', 'Ginebra', '3394329 - 3243945389', 'monicajaramillo@gmail.com', 1, '2023-03-03 04:22:21', '2023-03-09 05:02:09', NULL),
(26, '919191192', '1', '1993-08-24', '29 Años', 'luis eduardo rojas medina', 'calle 5 # 12 -  20', 'los pinos', 'Florida', '3395493 - 31144693589', 'luisrojas@gmail.com', 1, '2023-03-03 04:27:43', '2023-03-03 04:27:43', NULL),
(27, '88333888', '1', '1995-09-19', '27 Años', 'lina botero medrano', 'calle 6 # 12 - 2', 'el nogal', 'Alcala', '4395943 - 31354969348', 'linaboterio@gmail.com', 1, '2023-03-03 04:30:08', '2023-03-03 04:30:08', NULL),
(28, '13131231', '1', '1994-05-15', '28 Años', 'leonela asprilla girón', 'call2 12 # 42 - 12', 'los pinos', 'San pedro', '3343923 - 32113492948', 'leonelaasprilla@gmail.com', 1, '2023-03-03 04:44:12', '2023-03-03 04:44:12', NULL),
(29, '727272123', '1', '1991-06-03', '31 Años', 'patricia osorio mesa', 'calle 5 # 12 -  20', 'los pinos', 'Dagua', '3232348 - 31143858234', 'patriciaosorio@gmail.com', 1, '2023-03-03 16:36:39', '2023-03-03 16:36:39', NULL),
(30, '5554544', '1', '1994-05-20', '28 Años', 'adela morales correa', 'calle 6 # 12 - 20', 'los pinos', 'Toro', '3349348 - 31254959389', 'adelamorales@gmail.com', 1, '2023-03-03 23:26:59', '2023-03-08 16:58:54', NULL),
(31, '343434731', '1', '1995-10-03', '27 Años', 'marcela castaño mesa', 'call2 12 # 42 - 12', 'los olivos', 'Dagua', '33459348 - 31143583849', 'marcelacastano@gmail.com', 1, '2023-03-03 23:29:13', '2023-03-09 05:22:20', NULL),
(32, '343343221', '1', '1964-11-12', '58 Años', 'camila sepulveda noguera', 'calle 6 # 12 - 2', 'los pinos', 'Ginebra', '3349394 - 3122459395', 'camilasepulveda@gmail.com', 1, '2023-03-03 23:59:51', '2023-03-03 23:59:51', NULL),
(33, '23123232', '1', '1994-04-12', '28 Años', 'esther julia maldonado sinisterra', 'calle 5 # 12 -  20', 'el nogal', 'Alcala', '3394593 - 31225929589', 'esthermaldonado@gmail.com', 1, '2023-03-04 03:32:06', '2023-03-04 03:32:06', NULL),
(34, '321234532', '1', '1968-07-01', '54 Años', 'catalina caicedo restrepo', 'cra 4 # 12 - 20', 'los sauces', 'Dagua', '34943849 - 31229592958', 'catalinacaicedo@gmail.com', 1, '2023-03-04 03:33:33', '2023-03-04 03:33:33', NULL),
(35, '43434343', '1', '1997-07-08', '25 Años', 'maritsa aponte ruíz', 'call2 12 # 42 - 12', 'los pinos', 'Alcala', '4439443 - 31133599449', 'maritsaaponte@gmail.com', 1, '2023-03-04 03:54:56', '2023-03-04 03:54:56', NULL),
(36, '43435439', '1', '1993-07-05', '29 Años', 'luz amparo rios', 'calle 6 # 12 - 2', 'el nogal', 'Alcala', '3434930 - 31323949458', 'luzamparo@gmail.com', 1, '2023-03-04 03:55:59', '2023-03-04 03:55:59', NULL),
(37, '2323241', '1', '1996-07-10', '26 Años', 'gloria hernández restrepo', 'calle 6 # 12 - 2', 'los pinos', 'Restrepo', '3493403 - 31144959303', 'gloriahernandez@gmail.com', 1, '2023-03-04 04:17:00', '2023-03-04 04:17:00', NULL),
(38, '44342391', '1', '1995-08-15', '27 Años', 'camilo forero triana', 'calle 6 # 12 - 20', 'los sauces', 'Jamundi', '4439409 - 31232959248', 'camiloforero@gmail.com', 1, '2023-03-04 04:19:09', '2023-03-04 04:19:09', NULL),
(39, '32434531', '1', '1997-08-17', '25 Años', 'alana rosales mesa', 'calle 6 # 12 - 2', 'el nogal', 'Alcala', '33493382 - 3122349348', 'alanarosales@gmail.com', 1, '2023-03-04 16:01:52', '2023-03-04 16:01:52', NULL),
(40, '353535331', '1', '1992-04-12', '30 Años', 'camila aponte rosales', 'calle 5 # 12 -  20', 'el nogal', 'Florida', '3395938 - 31144593958', 'camilaaponte@gmail.com', 1, '2023-03-07 16:52:47', '2023-03-07 16:52:47', NULL),
(41, '23242411', '1', '1995-06-20', '27 Años', 'carolina valencia castro', 'calle 43 # 12 - 20', 'el nogal', 'San pedro', '3493248 - 31145838539', 'carolinavalencia@gmail.com', 1, '2023-03-07 17:21:26', '2023-03-07 17:21:26', NULL),
(42, '344384272', '1', '1995-05-12', '27 Años', 'javier hernández solis', 'calle 5 # 12 -  20', 'los pinos', 'Dagua', '42384280 - 31232845829', 'javierherna@gmail.com', 1, '2023-03-07 17:30:57', '2023-03-07 17:30:57', NULL),
(43, '34343553', '1', '1977-06-23', '45 Años', 'samuel díaz rosales', 'calle 43 # 12 - 20', 'los sauces', 'Alcala', '449694 - 312256935878', 'samueldiaz@gmail.com', 1, '2023-03-07 23:14:40', '2023-03-07 23:14:40', NULL),
(44, '53448347', '1', '1962-04-26', '60 Años', 'carmenza lópez sierra', 'calle 43 # 12 - 20', 'los pinos', 'Guacarí', '4493848 - 31335939458', 'carmenzalopez@gmail.com', 1, '2023-03-07 23:18:09', '2023-03-07 23:18:09', NULL),
(45, '34424525', '1', '1993-06-19', '29 Años', 'lorena medina dominguez', 'calle 6 # 12 - 2', 'los pinos', 'Alcala', '4448373 - 3111453858', 'lorena@gmail.com', 1, '2023-03-08 00:10:23', '2023-03-08 00:10:23', NULL),
(46, '34244324', '1', '1967-06-12', '55 Años', 'claudia clavijo mesina', 'calle 45 # 12 - 45', 'los pinos', 'Caicedonia', '3394280 - 314324893487', 'claudiaclavijo@hotmail.com', 1, '2023-03-08 00:19:47', '2023-03-08 00:19:47', NULL),
(47, '54342743', '1', '1994-04-12', '28 Años', 'catalina molina pedrasa', 'calle 43 # 12 - 20', 'los pinos', 'Alcala', '3435324 - 31356538638', 'catalinamoli@gmail.com', 1, '2023-03-08 00:21:59', '2023-03-08 00:21:59', NULL),
(48, '443332311', '1', '1994-06-15', '28 Años', 'camila estacio trejos', 'calle 6 # 12 - 20', 'los sauces', 'Alcala', '3385829 - 31324583593', 'camilaestacio@gmail.com', 1, '2023-03-08 00:26:24', '2023-03-08 00:26:24', NULL),
(49, '45364525', '1', '1950-04-12', '72 Años', 'laura correa solis', 'cra 4 # 2 - 12', 'los pinos', 'Alcala', '3434583 - 3143593589', 'lauracorrea@gmail.com', 1, '2023-03-08 04:03:42', '2023-03-08 04:03:42', NULL),
(50, '334348457', '1', '1994-06-12', '28 Años', 'lina soto prieto', 'call2 12 # 42 - 12', 'los sauces', 'Alcala', '3384583 - 31224594589', 'linasoto@gmail.com', 1, '2023-03-08 04:35:27', '2023-03-08 04:35:27', NULL),
(51, '34458282', '1', '1992-05-12', '30 Años', 'lucero castro medina', 'calle 6 # 12 - 2', 'los ocobos', 'Alcala', '3234928 - 31335834921', 'lucerocastro@gmail.com', 1, '2023-03-08 04:38:01', '2023-03-08 04:38:01', NULL),
(52, '442421133', '1', '1996-03-17', '26 Años', 'manuela forero torres', 'call2 12 # 42 - 12', 'los sauces', 'Yotoco', '3353830 - 311438683945', 'manuelaforero@gmail.com', 1, '2023-03-08 04:43:27', '2023-03-08 04:43:27', NULL),
(53, '32428472', '1', '1992-07-15', '30 Años', 'kelly alicia soto mesa', 'calle 5 # 12 -  20', 'los sauces', 'Alcala', '3234924 - 31154969380', 'kellyalicia@gmail.com', 1, '2023-03-08 15:21:51', '2023-03-08 15:21:51', NULL),
(54, '3434238', '1', '1992-07-14', '30 Años', 'lucrecia mesa castro', 'calle 5 # 12 -  20', 'los pinos', 'Alcala', '3493458 - 31343593589', 'lucreciamesa@gmail.com', 1, '2023-03-08 15:39:49', '2023-03-08 15:39:49', NULL),
(55, '433583847', '1', '1997-06-14', '25 Años', 'camila restrepo mesa', 'calle 6 # 12 - 20', 'los sauces', 'Dagua', '3385438 - 31334683859', 'camilarestrepo@gmail.com', 1, '2023-03-08 15:42:57', '2023-03-08 15:42:57', NULL),
(56, '45669482', '1', '1996-05-12', '26 Años', 'rosa jaramillo estrada', 'calle 6 # 12 - 20', 'los sauces', 'Alcala', '4459380 - 31335949580', 'rosajaramillo@gmail.com', 1, '2023-03-08 15:47:53', '2023-03-08 15:47:53', NULL),
(57, '33432321', '1', '1994-01-19', '29 Años', 'noralba segura mesa', 'calle 6 # 12 - 20', 'los sauces', 'Alcala', '3345938 - 3134386839', 'noralbasegura@gmail.com', 1, '2023-03-08 17:01:17', '2023-03-08 17:01:17', NULL),
(58, '342342321', '1', '1992-05-15', '30 Años', 'marina castro osorio', 'call2 12 # 42 - 12', 'los pinos', 'Alcala', '4345923 - 31114939509', 'marinacastro@gmail.com', 1, '2023-03-08 17:06:25', '2023-03-08 17:06:25', NULL),
(59, '434832321', '1', '1992-05-12', '30 Años', 'rosario molano estrada', 'calle 6 # 12 - 20', 'los pinos', 'Alcala', '3345938 - 31335358912', 'rosariomolano@gmail.com', 1, '2023-03-08 17:11:20', '2023-03-08 17:11:20', NULL),
(60, '44395938', '1', '1994-07-16', '28 Años', 'amalfi moreno castillo', 'calle 43 # 12 - 20', 'los pinos', 'Alcala', '3344530 - 313359345823', 'amalfimoreno@gmail.com', 1, '2023-03-08 17:18:59', '2023-03-08 17:18:59', NULL),
(61, '45338483', '1', '1993-06-12', '29 Años', 'rosalba molina estrada', 'call2 12 # 42 - 12', 'los ocobos', 'Alcala', '3345934 - 31355938589', 'rosalbamolina@gmail.com', 1, '2023-03-08 17:23:16', '2023-03-08 17:23:16', NULL),
(62, '23242132', '1', '1992-06-12', '30 Años', 'karime ruiz mesa', 'call2 12 # 42 - 12', 'los pinos', 'Alcala', '3493849 - 3143458385', 'karimeruiz@gmail.com', 1, '2023-03-09 03:34:51', '2023-03-09 03:34:51', NULL),
(63, '344382191', '1', '1975-07-12', '47 Años', 'gladis solarte mora', 'calle 45 # 12 - 45', 'los pinos', 'Florida', '3349458 - 31224939482', 'gladissolarte@gmail.com', 1, '2023-03-09 05:37:43', '2023-03-09 05:37:43', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controles`
--

DROP TABLE IF EXISTS `controles`;
CREATE TABLE IF NOT EXISTS `controles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `id_historia` bigint(20) DEFAULT NULL,
  `num_control` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peso` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abd` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grasa` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agua` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `controles_id_cliente_index` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `controles`
--

INSERT INTO `controles` (`id`, `user_id`, `id_cliente`, `id_historia`, `num_control`, `peso`, `abd`, `grasa`, `agua`, `created_at`, `updated_at`) VALUES
(1, '1', 39, 2, '1', '75', '70', '45', '52', '2023-03-04 16:09:04', '2023-03-04 17:17:14'),
(2, '1', 1, 3, '1', '45', '52', '50', '40', '2023-03-08 00:42:58', '2023-03-08 00:42:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controles_historias`
--

DROP TABLE IF EXISTS `controles_historias`;
CREATE TABLE IF NOT EXISTS `controles_historias` (
  `id_control` bigint(20) UNSIGNED NOT NULL,
  `id_historia` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_control`,`id_historia`),
  KEY `controles_historias_id_historia_foreign` (`id_historia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `userId`, `title`, `start`, `end`, `cliente`, `telefono`, `descripcion`, `medico`, `color`, `created_at`, `updated_at`) VALUES
(3, '1', 'terapia con imanes', '2022-11-19 07:00:00', '2022-11-19 07:30:00', 'Aldemar rosales molano', '3449594- 31242385438', 'Presenta dolor en espalda desde hace 2 días', 'Eduardo Correa medina', '#1560f6', NULL, '2022-11-21 21:50:34'),
(4, '1', 'biomagnetismo', '2022-11-19 07:30:00', '2022-11-19 08:00:00', 'diana milena soto arteaga', '34343948 - 31222394924', 'Ninguno', 'Eliana Buitrago Rosales', '#a845c9', NULL, '2022-11-21 21:50:48'),
(5, '1', 'biomagnetismo', '2022-11-25 08:30:00', '2022-11-25 09:15:00', 'Catalina Rosales contreras', '4439438 - 31223847364', 'Ninguno', 'Eliana Buitrago Rosales', '#a845c9', NULL, '2022-11-29 09:35:57'),
(7, '1', 'lodoterapia', '2022-11-24 08:00:00', '2022-11-24 08:15:00', 'eliana marmolejo rosales', '3445940 - 31334030598', 'Presenta dolor en la espalda desde hace 2 días', 'Eduardo Correa medina', '#8c7657', NULL, '2022-11-26 10:31:35'),
(8, '1', 'terapia con imanes', '2022-11-24 08:00:00', '2022-11-24 08:15:00', 'lina maría barreiro mora', '4456690 - 31132959590', 'Ninguno', 'Eliana Buitrago Rosales', '#1560f6', NULL, '2022-11-26 10:31:26'),
(9, '1', 'drenaje', '2022-11-25 08:30:00', '2022-11-25 09:15:00', 'elisa hernández torres', '43902893 - 3104394928', 'Ninguno', 'Eliana Buitrago Rosales', '#d51051', NULL, '2022-11-29 09:36:10'),
(10, '1', 'Control', '2022-11-25 08:30:00', '2022-11-25 09:15:00', 'Aida luz rosero correa', '4395933 - 31253053930', 'segundo control', 'Eduardo Correa medina', '#68538b', NULL, '2022-11-29 09:36:03'),
(12, '1', 'drenaje', '2022-12-31 10:00:00', '2022-12-31 10:30:00', 'luisa fernanda torres', '34343948 - 31222394924', 'Desde hace 3 días presenta dolor de cabeza', 'Eliana Buitrago Rosales', '#d51051', NULL, '2022-12-31 11:43:04'),
(13, '1', 'Terapia neural', '2023-01-24 02:30:00', '2023-01-24 03:00:00', 'isabel rosales marmolejo', '3333943 - 31224924398', 'Presenta dolor en oído derecho desde hace 2 días', 'luisa fernanda gómez rosales', '#831d9f', NULL, '2023-01-24 10:13:58'),
(14, '1', 'lodoterapia', '2022-12-31 09:00:00', '2022-12-31 09:30:00', 'elizabeth morales torres', '3433448 - 311143053895', 'Ninguno', 'Eliana Buitrago Rosales', '#8c7657', NULL, '2022-12-31 11:42:46'),
(15, '1', 'control', '2022-12-31 09:30:00', '2022-12-31 10:00:00', 'rosalia hernádez correa', '3433448 - 311143053895', 'Ninguno', 'Eduardo Correa medina', '#68538b', NULL, '2022-12-31 11:43:00'),
(16, '1', 'colonterapia - lodoterapia', '2023-03-09 08:30:00', '2023-03-09 09:00:00', 'adelaida jaramillo dominguez', '4459450 -  31123969389', 'Presenta dolor en pierna derecha desde hace 2 dias', 'lucia veles solarte', '#d51051', NULL, '2023-03-09 05:21:18'),
(17, '1', 'masaje', '2022-12-31 10:00:00', '2022-12-31 10:30:00', 'martha janeth osorio mora', '3433448 - 311143053895', 'Ninguno', 'Eduardo Correa medina', '#0a5e2e', NULL, '2022-12-31 11:43:12'),
(18, '1', 'terapia con imanes', '2022-12-30 11:00:00', '2022-12-30 11:30:00', 'elisabeth restrepo moreno', '4345643 - 31334395938', 'Ninguno', 'Eduardo Correa medina', '#1560f6', NULL, '2022-12-30 11:01:21'),
(19, '1', 'auriculoterapia', '2023-01-23 01:00:00', '2023-01-23 02:30:00', 'diana milena soto medina', '3434834 - 31223593589', 'Presenta dolor en espalda desde hace 2 dias', 'luisa fernanda gómez rosales', '#c2bd1e', NULL, '2023-01-24 04:37:09'),
(20, '1', 'colonterapia - lodoterapia', '2023-02-16 08:00:00', '2023-02-16 08:30:00', 'catalina correa caicedo', '33945934 - 31133952289', 'Desde hace 3 días presenta dolor en pierna derecha', 'nora rosales torres', '#939e3d', NULL, '2023-02-15 04:39:31'),
(21, '1', 'biomagnetismo colonterapia auriculoterapia', '2023-03-09 09:30:00', '2023-03-09 10:00:00', 'lorena rentería linares', '3233482 - 31124593482', 'Ninguno', 'lucia veles solarte', '#c2bd1e', NULL, '2023-03-09 05:21:26'),
(22, '1', 'auriculoterapia', '2023-02-12 10:00:00', '2023-02-12 10:30:00', 'lina maría barreiro mesa', '3443829 - 31149458324', 'Presenta dolor en espalda desde hace 2 días', 'isabel forero escobar', '#c2bd1e', NULL, '2023-02-12 10:03:28'),
(23, '1', 'auriculoterapia', '2023-03-09 10:30:00', '2023-03-09 11:00:00', 'lina maría barreiro mesa', '3443829 - 31149458324', 'Presenta dolor en espalda', 'lucia veles solarte', '#c2bd1e', NULL, '2023-03-09 05:21:33'),
(24, '1', 'drenaje', '2023-02-12 11:00:00', '2023-02-12 11:30:00', 'catalina correa caicedo', '33945934 - 31133952289', 'Desde hace dos días presenta dolor en pierna derecha', 'lucia veles solarte', '#be7b3c', NULL, '2023-02-12 10:03:32'),
(25, '1', 'lodoterapia', '2023-03-09 11:30:00', '2023-03-09 12:00:00', 'lina maría barreiro mesa', '3443829 - 31149458324', 'Presenta dolor en rodilla derecha', 'lucia veles solarte', '#5e66d4', NULL, '2023-03-09 05:21:39'),
(28, '1', 'auriculoterapia', '2023-02-12 17:00:00', '2023-02-12 18:30:00', 'liliana garcía martinez', '3439482 - 3114567890', 'Ninguna', 'isabel forero escobar', '#c2bd1e', NULL, '2023-02-12 10:04:08'),
(29, '1', 'terapia con imanes', '2023-01-24 01:00:00', '2023-01-24 02:30:00', 'catalina correa caicedo', '33945934 - 31133952289', 'Presenta dolor en brazo derecho', 'lucia veles solarte', '#f05724', NULL, NULL),
(30, '1', 'drenaje', '2023-01-24 01:00:00', '2023-01-24 02:30:00', 'catalina correa caicedo', '33945934 - 31133952289', 'Presenta dolor en brazo derecho', 'lucia veles solarte', '#be7b3c', NULL, NULL),
(32, '1', 'control', '2023-03-09 12:30:00', '2023-03-09 13:00:00', 'lina maría barreiro mesa', '3443829 - 31149458324', 'Ninguno', 'isabel forero escobar', '#33997a', NULL, '2023-03-09 05:21:47'),
(34, '1', 'biomagnetismo', '2023-03-09 07:00:00', '2023-03-09 08:00:00', 'diana milena soto medina', '3434834 - 31223593589', 'Presenta dolor en pierna derecha', 'lucia veles solarte', '#c26fd3', NULL, '2023-03-09 05:21:16'),
(35, '1', 'terapia con imanes', '2023-02-12 19:30:00', '2023-02-12 20:30:00', 'lorena rentería linares', '3233482 - 31124593482', 'Ninguno', 'luisa fernanda gómez rosales', '#f05724', NULL, '2023-02-12 10:04:14'),
(36, '1', 'drenaje', '2023-03-09 14:30:00', '2023-03-09 15:30:00', 'diana milena soto medina', '3434834 - 31223593589', 'Presenta dolor en pierna derecha y dolor de cabeza desde hace 3 días', 'luisa fernanda gómez rosales', '#5e66d4', NULL, '2023-03-09 05:21:52'),
(37, '1', 'colonterapia - lodoterapia', '2023-02-12 14:00:00', '2023-02-12 15:00:00', 'catalina correa caicedo', '33945934 - 31133952289', 'Ninguno', 'isabel forero escobar', '#939e3d', NULL, '2023-02-12 10:03:57'),
(38, '1', 'terapia neural', '2023-02-12 16:00:00', '2023-02-12 16:30:00', 'lorena rentería linares', '3233482 - 31124593482', 'Ninguno', 'lucia veles solarte', '#831d9f', NULL, '2023-02-12 10:04:06'),
(39, '1', 'terapia con imanes', '2023-02-12 12:30:00', '2023-02-12 13:00:00', 'catalina correa caicedo', '33945934 - 31133952289', 'Ninguno', 'isabel forero escobar', '#f05724', NULL, '2023-02-12 10:03:49'),
(40, '1', 'lavado', '2023-02-12 13:30:00', '2023-02-12 14:00:00', 'lorena rentería linares', '3233482 - 31124593482', 'Ninguno', 'luisa fernanda gómez rosales', '#95c4f0', NULL, '2023-02-12 10:03:55'),
(41, '1', 'biomagnetismo colonterapia', '2023-02-14 07:00:00', '2023-02-14 07:30:00', 'lorena rentería linares', '3233482 - 31124593482', 'Desde hace dos días presenta dolor en brazo derecho', 'isabel forero escobar', '#5e66d4', NULL, NULL),
(42, '1', 'control', '2023-02-14 08:00:00', '2023-02-14 09:00:00', 'diana milena soto medina', '3434834 - 31223593589', 'Ninguno', 'nora rosales torres', '#33997a', NULL, NULL),
(43, '1', 'auriculoterapia lavado', '2023-02-16 09:00:00', '2023-02-16 10:00:00', 'lorena rentería martinez', '3345934 - 31245934812', 'Ninguno', 'martín eduardo correa linares', '#f05724', NULL, '2023-02-16 22:42:01'),
(44, '1', 'biomagnetismo', '2023-03-09 11:00:00', '2023-03-09 11:30:00', 'luz enith calvo villada', '3495938 - 31145495838', 'Ninguno', 'isabel forero escobar', '#c26fd3', NULL, '2023-03-09 05:21:35');

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
  `id_cliente` int(10) UNSIGNED NOT NULL,
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
(1, '1', 31, 'marcela castaño mesa', '27 Años', 'lucia veles solarte', '168', '78', '59', '54', '53', '28', '49', '53', 'terapia neural,lodoterapia', 'paquete 1', 'acupuntura', 'manzanilla', NULL, NULL, 'Presenta dolor en rodilla desde hace 3 días', '2023-03-03 23:36:32', '2023-03-03 23:36:32'),
(2, '1', 39, 'alana rosales mesa', '25 Años', 'luisa fernanda gómez rosales', '167', '73', '45', '56', '53', '29', '46', '65', 'lodoterapia,terapia con imanes', 'paquete 1', 'acupuntura', 'manzanilla', NULL, NULL, 'presenta dolor en rodilla derecha desde hace 3 días', '2023-03-04 16:07:47', '2023-03-04 16:07:47'),
(3, '1', 1, 'diana milena soto medina', '28 Años', 'martín eduardo correa linares', '168', '78', '45', '52', '50', '29', '54', '63', 'lodoterapia,colonterapia', 'paquete 1', 'acupuntura', 'manzanilla', NULL, NULL, 'presente dolor en espalda desde hace 3 días', '2023-03-08 00:41:06', '2023-03-08 00:41:06');

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
(2, '1', 'café', '45000', '2023-01-12 09:11:44', '2023-01-12 09:11:44'),
(3, '1', 'manzanilla', '55000', '2023-01-12 09:12:18', '2023-01-17 04:47:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_diarios`
--

DROP TABLE IF EXISTS `libro_diarios`;
CREATE TABLE IF NOT EXISTS `libro_diarios` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsable` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(680) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `libro_diarios`
--

INSERT INTO `libro_diarios` (`id`, `user_id`, `responsable`, `descripcion`, `valor`, `created_at`, `updated_at`) VALUES
(1, NULL, 'luis alberto forero medina', 'Pago por tratamientos realizados mes de enero', '420000', '2023-02-16 17:24:58', '2023-02-16 17:24:58');

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_28_231918_create_events_table', 1),
(6, '2022_11_03_175672_create_clientes_table', 1),
(7, '2022_11_03_181044_create_historias_clinicas_table', 1),
(8, '2022_11_03_224907_create_pagos_honorarios_table', 1),
(9, '2022_11_03_232923_create_abonos_clientes_table', 1),
(10, '2022_11_03_234432_create_controles_table', 1),
(11, '2022_11_24_23400911_create_terapias_table', 1),
(12, '2022_12_02_231019_create_terapias_adicionales_table', 1),
(13, '2022_12_04_010736_create_profesionales_table', 1),
(14, '2022_12_05_114060_add_mes_to_clientes', 1),
(15, '2022_12_22_173248_create_registrar_tratamientos_table', 1),
(16, '2023_01_11_184353_create_lavados_table', 1),
(17, '2023_02_02_111323_add_rol_to_users_table', 1),
(18, '2023_02_02_180122_create_controles_historias_table', 1),
(19, '2022_11_03_175673_create_clientes_table', 2),
(20, '2023_02_16_001238_create_libro_diarios_table', 3),
(21, '2023_02_16_001239_create_libro_diarios_table', 4),
(22, '2023_02_16_001240_create_libro_diarios_table', 5),
(23, '2022_11_03_234433_create_controles_table', 6),
(24, '2022_11_03_175674_create_clientes_table', 7),
(25, '2022_11_03_232924_create_abonos_clientes_table', 8),
(26, '2022_12_22_173250_create_registrar_tratamientos_table', 8),
(27, '2022_11_03_232927_create_abonos_clientes_table', 9);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesionales`
--

INSERT INTO `profesionales` (`id`, `user_id`, `cedula`, `nombre`, `profesion`, `fecha_nacimiento`, `celular`, `email`, `porcentaje`, `created_at`, `updated_at`) VALUES
(1, '1', '11111111', 'nora rosales torres', 'terapista', '1990-01-20', '3134343121', 'norarosales@gmail.com', NULL, '2023-01-10 07:12:17', '2023-02-16 04:32:00'),
(3, '1', '33333333', 'isabel forero escobar', 'terapista', '1980-01-10', '3135469229', 'isabelforero@gmail.com', NULL, '2023-01-10 07:53:23', '2023-01-10 10:54:06'),
(5, '1', '22222222', 'lucia veles solarte', 'terapista', '1995-04-12', '31145385349', 'luciaveles@gmail.com', NULL, '2023-01-10 11:27:29', '2023-01-10 11:27:29'),
(6, '1', '44444444', 'luisa fernanda gómez rosales', 'quiropráctico', '1991-02-15', '31243453548', 'luisafern@gmail.com', NULL, '2023-01-10 22:15:09', '2023-02-22 17:09:23'),
(7, '1', '34343434', 'martín eduardo correa linares', 'terapeuta', '1999-02-12', '3135456948', 'martineduardo@gmail.com', NULL, '2023-02-16 04:41:37', '2023-02-16 04:41:37');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registrar_tratamientos`
--

INSERT INTO `registrar_tratamientos` (`id`, `id_cliente`, `user_id`, `nombre`, `celular`, `tratamiento`, `valor_tratamiento`, `saldo`, `responsable`, `estado`, `created_at`, `updated_at`) VALUES
(2, '21', '1', 'adelaida moreno díaz', '3393948 - 31339593458', 'terapia neural', '320000', '320000', 'heberth mazuera arana', 'Pendiente', '2023-03-06 06:15:21', '2023-03-06 06:15:21'),
(3, '29', '1', 'patricia osorio mesa', '3232348 - 31143858234', 'lodoterapia', '210000', '210000', 'heberth mazuera arana', 'Pendiente', '2023-03-06 06:17:09', '2023-03-06 06:17:09'),
(4, '2', '1', 'lorena rentería moreno', '3239492 - 31439593587', 'colonterapia', '360000', '240000', 'heberth mazuera arana', 'Pendiente', '2023-03-06 06:17:36', '2023-03-06 06:17:36'),
(5, '10', '1', 'tatiana villamil forero', '3459382 - 312434954383', 'terapia con imanes', '220000', '220000', 'heberth mazuera arana', 'Pendiente', '2023-03-06 06:18:07', '2023-03-06 06:18:07'),
(6, '1', '1', 'diana milena soto medina', '3394834 - 31444939427', 'terapia con imanes', '220000', '20000', 'heberth mazuera arana', 'Pendiente', '2023-03-07 03:26:12', '2023-03-07 03:26:12'),
(7, '22', '1', 'marisol libreros correa', '3394338 - 3222349348', 'colonterapia - lodoterapia', '450000', '450000', 'heberth mazuera arana', 'Pendiente', '2023-02-07 04:00:07', '2023-02-07 04:00:07'),
(8, '32', '1', 'camila sepulveda noguera', '3349394 - 3122459395', 'drenaje', '270000', '270000', 'heberth mazuera arana', 'Pendiente', '2023-01-07 04:02:39', '2023-01-07 04:02:39');

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
(1, '1', 'terapia neural', '#831d9f', '320000', '2023-01-20 09:05:10', '2023-02-01 05:09:38'),
(2, '1', 'lodoterapia', '#ce3b3b', '210000', '2023-01-20 09:06:23', '2023-01-20 09:06:23'),
(3, '1', 'colonterapia', '#5e66d4', '360000', '2023-01-20 09:07:25', '2023-01-20 09:07:25'),
(4, '1', 'control', '#33997a', '150000', '2023-01-20 09:08:47', '2023-01-20 09:08:47'),
(5, '1', 'terapia con imanes', '#f05724', '220000', '2023-01-20 09:09:24', '2023-01-20 09:19:03'),
(6, '1', 'colonterapia - lodoterapia', '#939e3d', '450000', '2023-01-20 09:10:11', '2023-01-20 09:10:11'),
(7, '1', 'drenaje', '#be7b3c', '270000', '2023-01-20 09:10:43', '2023-01-20 09:10:43'),
(8, '1', 'masaje', '#e8d15e', '110000', '2023-01-20 09:11:20', '2023-01-20 09:24:26'),
(9, '1', 'biomagnetismo', '#c26fd3', '380000', '2023-01-20 09:12:09', '2023-01-20 09:12:09'),
(10, '1', 'auriculoterapia', '#c2bd1e', '460000', '2023-01-20 09:12:45', '2023-01-20 09:12:45'),
(11, '1', 'lavado', '#4be1ec', '260000', '2023-02-01 03:58:13', '2023-02-01 03:58:13'),
(12, '1', 'acupuntura', '#1560f6', '250000', '2023-02-01 05:06:47', '2023-02-01 05:06:47'),
(13, '1', 'oxonoterapia', NULL, '430000', '2023-02-01 05:16:14', '2023-02-01 05:17:57');

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
(1, '1', 'acupuntura', '110000', '2023-01-12 03:43:59', '2023-01-12 03:43:59'),
(2, '1', 'terapia neural', '230000', '2023-01-12 03:56:24', '2023-01-12 03:56:24'),
(3, '1', 'lodoterapia', '100000', '2023-01-12 04:06:39', '2023-01-12 04:06:39');

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
  `rol` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `rol`) VALUES
(1, 'heberth mazuera arana', 'heberth.mazuera@gmail.com', NULL, '$2y$10$POoqqaoxJ21D6XLro1/9nuhR.A2FCRSJd0ZEgiZ3OcKWg3Yi0TNVa', NULL, '2021-11-03 14:03:54', '2021-11-03 14:03:54', NULL),
(2, 'Diana Milena Soto martinez', 'dianam@gmail.com', NULL, '$2y$10$1kxtkuB91ka5m2GkSk40Hu3HKnj1baLljBG.W/oA4pRhNwXC4kMiC', NULL, '2021-11-18 08:15:34', '2021-11-18 08:15:34', NULL),
(3, 'carlos alberto tenorio rios', 'carlosalberto@gmail.com', NULL, '$2y$10$heiMTNJzFjW7Gw6gB4Gfx.kE5rPjtpxfKNOM3KoKXD/JiBS3KHI/e', NULL, '2023-02-12 09:35:21', '2023-02-13 11:18:20', NULL),
(6, 'noralba estrada morales', 'noralbaestrada@gmail.com', NULL, '$2y$10$MH.poJeHaJdPHIhAbPMbeuN.dKPaerzj8TV//2GPyOaYhIHAXJM2O', NULL, '2023-03-06 17:18:32', '2023-03-06 17:18:32', NULL);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
