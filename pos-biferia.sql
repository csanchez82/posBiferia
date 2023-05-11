-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2023 a las 02:02:51
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kwrbe475_posbiferia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `departamento`, `descripcion`, `fecha`) VALUES
(1, 'Abarrote 0%', '', '2023-04-27 22:35:58'),
(2, 'Abarrote 8%', '', '2023-04-27 19:48:13'),
(3, 'Asadero', '', '2023-04-27 19:48:33'),
(4, 'Gastos', '', '2023-04-27 19:48:41'),
(5, 'Productos elaborados', '', '2023-04-27 19:48:50'),
(6, 'Tablajería', '', '2023-04-27 19:49:06'),
(7, 'Carnes', '', '2023-04-27 19:49:12'),
(8, 'Servicio de asados', '', '2023-04-27 19:49:18'),
(9, 'Productos americanos', '', '2023-04-27 19:49:34'),
(10, 'Cursos', '', '2023-04-27 19:49:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `correo` varchar(50) NOT NULL,
  `web` varchar(50) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `correo`, `web`, `logo`) VALUES
(1, 'NegSoft México', 'contacto@negsoft.com', 'www.negsoft.com', 'vistas/dist/img/plantilla/defecto.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE `familias` (
  `id` int(11) NOT NULL,
  `familia` varchar(50) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `departamento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `familias`
--

INSERT INTO `familias` (`id`, `familia`, `descripcion`, `fecha`, `departamento_id`) VALUES
(1, 'Familia de Abarrote 0%', '', '2023-05-01 20:06:31', 1),
(2, 'Familia1', '', '2023-05-03 01:30:46', 1),
(3, 'Familia 3', '', '2023-05-03 01:30:57', 2),
(4, 'Familia4', '', '2023-05-03 01:31:07', 2),
(5, 'Familia Productos Americanos', 'Hola', '2023-05-03 01:31:19', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `proveedor_id` int(11) DEFAULT NULL,
  `departamento_id` int(11) DEFAULT NULL,
  `familia_id` int(11) DEFAULT NULL,
  `iva` decimal(5,2) DEFAULT NULL,
  `ieps` decimal(10,2) DEFAULT NULL,
  `minInventario` decimal(10,2) DEFAULT NULL,
  `maxInventario` decimal(10,2) DEFAULT NULL,
  `merma` int(11) DEFAULT NULL,
  `granel` tinyint(1) DEFAULT NULL,
  `ocultar` tinyint(1) DEFAULT NULL,
  `incluyeImpuestos` tinyint(1) DEFAULT NULL,
  `codBarras` varchar(50) DEFAULT NULL,
  `codAlterno` varchar(50) DEFAULT NULL,
  `unidadMedida` varchar(50) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `costo` decimal(10,2) DEFAULT NULL,
  `precio1` decimal(10,2) DEFAULT NULL,
  `precio2` decimal(10,2) DEFAULT NULL,
  `precio3` decimal(10,2) DEFAULT NULL,
  `existencia` decimal(10,2) NOT NULL,
  `obligar` varchar(11) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `tipo`, `descripcion`, `proveedor_id`, `departamento_id`, `familia_id`, `iva`, `ieps`, `minInventario`, `maxInventario`, `merma`, `granel`, `ocultar`, `incluyeImpuestos`, `codBarras`, `codAlterno`, `unidadMedida`, `clave`, `costo`, `precio1`, `precio2`, `precio3`, `existencia`, `obligar`, `foto`, `fecha`) VALUES
(4, 'Costillas de carnero', 'Artículo', '', 13, 4, 2, 0.00, 0.00, 20.00, 50.00, 0, 1, 0, 0, '7502198544', 'REY-1-007', NULL, NULL, 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '2023-05-10 01:47:28'),
(5, 'Hamburguesa de res', 'Artículo con decimales', NULL, 14, 5, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198545', 'REY-1-008', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(6, 'Pechuga de pollo', 'Artículo con decimales', NULL, 10, 6, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198546', 'REY-1-009', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(7, 'Pierna de cordero', 'Artículo con decimales', NULL, 11, 7, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198547', 'REY-1-010', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(8, 'Salchicha de cerdo', 'Artículo con decimales', NULL, 12, 8, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198548', 'REY-1-011', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(9, 'Lomo de res', 'Artículo con decimales', NULL, 13, 1, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198549', 'REY-1-012', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(10, 'Carne para asar', 'Artículo con decimales', NULL, 14, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198550', 'REY-1-013', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(11, 'Carne molida de ternera', 'Artículo con decimales', NULL, 10, 3, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198551', 'REY-1-014', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(12, 'Muslo de pollo', 'Artículo con decimales', NULL, 11, 4, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198552', 'REY-1-015', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(13, 'Ternera deshuesada', 'Artículo con decimales', NULL, 12, 5, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198553', 'REY-1-016', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(14, 'Tocino ahumado', 'Artículo con decimales', NULL, 13, 6, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198554', 'REY-1-017', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(15, 'Pollo entero', 'Artículo con decimales', NULL, 14, 7, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198555', 'REY-1-018', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(16, 'Carr? de cerdo', 'Artículo con decimales', NULL, 10, 8, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198556', 'REY-1-019', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(17, 'Chorizo de cerdo', 'Artículo con decimales', NULL, 11, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198557', 'REY-1-020', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(18, 'Jam?n serrano', 'Artículo con decimales', NULL, 12, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198558', 'REY-1-021', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(19, 'Panceta de cerdo', 'Artículo con decimales', NULL, 13, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198559', 'REY-1-022', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(20, 'Pavo fresco', 'Artículo con decimales', NULL, 14, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198560', 'REY-1-023', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(21, 'Asado de res', 'Artículo con decimales', NULL, 10, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198561', 'REY-1-024', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(22, 'Pechuga de pavo', 'Artículo con decimales', NULL, 11, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198562', 'REY-1-025', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(23, 'Alas de pollo', 'Artículo con decimales', NULL, 12, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198563', 'REY-1-026', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(24, 'Chuletas de cerdo', 'Artículo con decimales', NULL, 13, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198564', 'REY-1-027', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(25, 'Chistorra', 'Artículo con decimales', NULL, 14, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198565', 'REY-1-028', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(26, 'Picanha', 'Artículo con decimales', NULL, 10, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198566', 'REY-1-029', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(27, 'Carne para guisar', 'Artículo con decimales', NULL, 11, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198567', 'REY-1-030', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(28, 'Falda de res', 'Artículo con decimales', NULL, 12, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198568', 'REY-1-031', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(29, 'Rabo de toro', 'Artículo con decimales', NULL, 13, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198569', 'REY-1-032', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(30, 'Carne de res para tacos', 'Artículo con decimales', NULL, 14, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198570', 'REY-1-033', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(31, 'Filete de res', 'Artículo con decimales', NULL, 10, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198571', 'REY-1-034', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(32, 'Pollo entero', 'Artículo con decimales', NULL, 11, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198572', 'REY-1-035', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(33, 'Costillas de cerdo', 'Artículo con decimales', NULL, 12, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198573', 'REY-1-036', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(34, 'Chuletas de cerdo', 'Artículo con decimales', NULL, 13, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198574', 'REY-1-037', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(35, 'Chorizo', 'Artículo con decimales', NULL, 14, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198575', 'REY-1-038', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(36, 'Salchicha', 'Artículo con decimales', NULL, 10, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198576', 'REY-1-039', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(37, 'Lomo de cerdo', 'Artículo con decimales', NULL, 11, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198577', 'REY-1-040', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(38, 'Pechuga de pollo', 'Artículo con decimales', NULL, 12, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198578', 'REY-1-041', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(39, 'Pavo entero', 'Artículo con decimales', NULL, 13, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198579', 'REY-1-042', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(40, 'Ternera', 'Artículo con decimales', NULL, 14, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198580', 'REY-1-043', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(41, 'Hamburguesas de res', 'Artículo con decimales', NULL, 10, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198581', 'REY-1-044', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(42, 'Hamburguesas de pollo', 'Artículo con decimales', NULL, 11, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198582', 'REY-1-045', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(43, 'Milanesa de res', 'Artículo con decimales', NULL, 12, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198583', 'REY-1-046', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(44, 'Milanesa de pollo', 'Artículo con decimales', NULL, 13, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198584', 'REY-1-047', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(45, 'Costilla de res', 'Artículo con decimales', NULL, 14, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198585', 'REY-1-048', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(46, 'Carne para guisar', 'Artículo con decimales', NULL, 10, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198586', 'REY-1-049', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(47, 'Carne molida de res', 'Artículo con decimales', NULL, 11, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198587', 'REY-1-050', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(48, 'Carne molida de pollo', 'Artículo con decimales', NULL, 12, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198588', 'REY-1-051', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(49, 'Carne molida de cerdo', 'Artículo con decimales', NULL, 13, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198589', 'REY-1-052', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(50, 'Tocino', 'Artículo con decimales', NULL, 14, 2, 2, 0.00, 0.00, 20.00, 50.00, 0, 0, 0, 0, '7502198590', 'REY-1-053', 'Pieza', '01010101-No existe en el catálogo', 20.00, 30.00, 35.00, 40.00, 100.00, '0', NULL, '0000-00-00 00:00:00'),
(62, 'Asador', 'Artículo sin decimales', '', 12, 4, 5, 16.00, 7.00, 0.00, 0.00, 0, 0, 0, 0, '754545415664', '', 'Seleccionar', 'Seleccionar', 0.00, 0.00, 0.00, 0.00, 1.00, '0', NULL, '2023-05-07 15:37:24'),
(66, 'Coca Cola', 'Artículo', 'Coca Descripción', 10, 2, 2, 0.00, 3.00, 1.00, 2.00, 0, 1, 1, 0, '9786079738617', '65845545', 'H87-Pieza', '10101501- Gatos vivos', 1.00, 2.00, 3.00, 4.00, 3.00, '0', NULL, '2023-05-10 23:14:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `apellido1` varchar(50) NOT NULL,
  `apellido2` varchar(50) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `referencia` varchar(50) DEFAULT NULL,
  `rfc` varchar(13) DEFAULT NULL,
  `pagoDefecto` varchar(250) DEFAULT NULL,
  `banco` varchar(50) DEFAULT NULL,
  `numeroCuenta` varchar(20) DEFAULT NULL,
  `clabe` varchar(20) DEFAULT NULL,
  `swift` varchar(20) DEFAULT NULL,
  `diasCredito` int(6) DEFAULT NULL,
  `creditoDisponible` decimal(10,2) DEFAULT NULL,
  `diasEntrega` int(6) DEFAULT NULL,
  `generarOrdenes` tinyint(1) NOT NULL,
  `facturable` tinyint(1) NOT NULL,
  `lunes` tinyint(4) NOT NULL,
  `martes` tinyint(4) NOT NULL,
  `miercoles` tinyint(4) NOT NULL,
  `jueves` tinyint(4) NOT NULL,
  `viernes` tinyint(4) NOT NULL,
  `sabado` tinyint(4) NOT NULL,
  `domingo` tinyint(4) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `ciudad` varchar(20) DEFAULT NULL,
  `calle` varchar(20) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `colonia` varchar(20) DEFAULT NULL,
  `cp` varchar(20) DEFAULT NULL,
  `correo1` varchar(50) DEFAULT NULL,
  `correo2` varchar(50) DEFAULT NULL,
  `telefono1` varchar(50) DEFAULT NULL,
  `telefono2` varchar(50) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `apellido1`, `apellido2`, `nombre`, `referencia`, `rfc`, `pagoDefecto`, `banco`, `numeroCuenta`, `clabe`, `swift`, `diasCredito`, `creditoDisponible`, `diasEntrega`, `generarOrdenes`, `facturable`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`, `pais`, `estado`, `ciudad`, `calle`, `numero`, `colonia`, `cp`, `correo1`, `correo2`, `telefono1`, `telefono2`, `fecha`) VALUES
(10, 'Treviño', 'Salamanca', 'Andrés', '', '4S4SXXS', NULL, 'Sin banco', '', '', '', 0, 25000.00, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Seleccionar', '', '', '', '', '', '', '', '', '', '', '2023-05-05 00:29:53'),
(11, 'Santiago', 'González', 'Andrea', '', 'SSS444SSS', NULL, 'Sin banco', '', '', '', 0, 0.00, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 'Seleccionar', '', '', '', '', '', '', '', '', '', '', '2023-05-05 19:24:07'),
(12, 'Ortega', 'Palacios', 'Juan', '', 'S5A344', NULL, 'Sin banco', '', '', '', 0, 0.00, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 'Seleccionar', '', '', '', '', '', '', '', '', '', '', '2023-05-05 00:20:55'),
(13, 'Pecina', 'Menchaca', 'Luis', '', '20AA', '01-Efectivo', 'Sin banco', '', '', '', 0, 0.00, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 'Seleccionar', '', '', '', '', '', '', '', '', '', '', '2023-05-10 23:11:36'),
(14, 'Sanchez', 'Garza', 'Carlos Eucario', 'Sistemas', 'SAGC820425RTA', '01-Efectivo', 'BBVA', '123456789', '987AE', 'DDDD345', 0, 300.00, NULL, 0, 0, 1, 1, 1, 1, 0, 1, 0, 'México', 'Tamaulipas', 'Tampico', 'Loma Blanca', '620', 'Lomas de Rosales', '99811', 'correo1@gmail.com', 'correo2@gmail.com', '(123)(456789)', '(987)(5454)', '2023-05-05 19:26:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono1` varchar(50) DEFAULT NULL,
  `telefono2` varchar(50) DEFAULT NULL,
  `correo1` varchar(50) DEFAULT NULL,
  `correo2` varchar(50) DEFAULT NULL,
  `notas` varchar(250) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `perfil` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `estado` varchar(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'La Biferia', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/dist/img/usuarios/admin/514.png', '1', '2023-05-10 17:26:08', '2023-05-10 22:26:08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departamento_id` (`departamento_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proveedor_id` (`proveedor_id`),
  ADD KEY `departamento_id` (`departamento_id`),
  ADD KEY `familia_id` (`familia_id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `familias`
--
ALTER TABLE `familias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `familias`
--
ALTER TABLE `familias`
  ADD CONSTRAINT `familias_ibfk_1` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`),
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`familia_id`) REFERENCES `familias` (`id`);

--
-- Filtros para la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD CONSTRAINT `sucursales_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
