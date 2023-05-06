-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2023 a las 00:03:03
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
  `minFrac` decimal(10,2) DEFAULT NULL,
  `maxFrac` decimal(10,2) DEFAULT NULL,
  `minUnit` int(11) DEFAULT NULL,
  `maxUnit` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `tipo`, `descripcion`, `proveedor_id`, `departamento_id`, `familia_id`, `iva`, `ieps`, `minFrac`, `maxFrac`, `minUnit`, `maxUnit`, `merma`, `granel`, `ocultar`, `incluyeImpuestos`, `codBarras`, `codAlterno`, `unidadMedida`, `clave`, `costo`, `precio1`, `precio2`, `precio3`, `existencia`, `obligar`, `foto`, `fecha`) VALUES
(45, 'Galletas Oreo', 'Artículo sin decimales', 'Galletas en bolsa de 20', 10, 3, 4, 16.00, 6.00, 0.00, 0.00, 5, 10, 0, 0, 0, 0, '9786079738617', '001', 'H87-Pieza', '10101513- Cobayas o conejillos de indias', 15.00, 20.00, 25.00, 30.00, 8.00, '0', NULL, '2023-05-06 21:41:21'),
(46, 'Chuletón', 'Artículo con decimales', '', 13, 1, 2, 16.00, 5.30, 20.00, 40.90, 0, 0, 0, 0, 0, 0, '7501303451603', '002', 'EA-Elemento', '10101502- Perros', 150.00, 200.00, 250.00, 300.00, 20.00, '0', NULL, '2023-05-06 21:43:20'),
(47, 'Carne molida', 'Artículo con decimales', '', 12, 4, 5, 11.00, 5.30, 50.00, 100.00, 0, 0, 0, 0, 0, 0, '7501303451603', '', 'MTK-Metro cuadrado', '10101512- Conejos', 20.00, 26.00, 27.00, 28.00, 95.27, '0', NULL, '2023-05-06 21:58:06');

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
(13, 'Pecina', 'Menchaca', 'Luis', '', '20AA', NULL, 'Sin banco', '', '', '', 0, 0.00, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 'Seleccionar', '', '', '', '', '', '', '', '', '', '', '2023-05-05 00:21:02'),
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
(1, 'La Biferia', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/dist/img/usuarios/admin/697.png', '1', '2023-05-06 13:17:00', '2023-05-06 18:17:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
