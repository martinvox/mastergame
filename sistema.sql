-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2018 a las 18:02:18
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(50) NOT NULL,
  `precio_compra` int(50) NOT NULL,
  `producto_id` int(50) NOT NULL,
  `proveedor_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `labores`
--

CREATE TABLE `labores` (
  `id` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `labores`
--

INSERT INTO `labores` (`id`, `nombre`) VALUES
(2, 'Administrativo'),
(4, 'Vendedor'),
(5, 'Gerente'),
(6, 'Servicio Técnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personales`
--

CREATE TABLE `personales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `DNI` int(11) NOT NULL,
  `fecha_ingreso_laboral` date NOT NULL,
  `telefono` int(11) NOT NULL,
  `labor_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personales`
--

INSERT INTO `personales` (`id`, `nombre`, `apellido`, `DNI`, `fecha_ingreso_laboral`, `telefono`, `labor_id`) VALUES
(0, 'Andrés', 'Mansilla', 39369741, '1996-02-27', 2147483647, 2),
(1, 'Juan', 'Perez', 39369741, '2018-07-06', 4493473, 2),
(2, 'Pamelaa', 'Suárez', 33011224, '2018-07-11', 4493473, 2),
(3, 'Matias', 'Solano', 31900054, '2018-07-06', 4302989, 2),
(4, 'James', 'Rodriguez', 20156741, '2018-07-06', 4805452, 2),
(7, 'Maximiliano', 'Sanchez', 39412589, '2018-07-06', 4915230, 4),
(8, 'German', 'Novelli', 36584195, '2018-07-06', 4301319, 5),
(9, 'Lorena', 'Chazarreta', 38485795, '2018-07-06', 4258762, 5),
(10, 'Gustavo', 'Fernandez', 39472795, '2018-07-06', 4408320, 5),
(11, 'Fernando', 'Pajaro', 12457842, '2018-07-06', 4805420, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(50) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `nombre` text NOT NULL,
  `precio` int(11) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `marca`, `modelo`, `nombre`, `precio`, `activo`) VALUES
(7, 'Intel', 'Pentium', 'Procesador', 19000, 0),
(9, 'ViewSonic', 'SA125', 'Monitor', 5000, 1),
(12, 'Logitech', 'M135', 'Mouse', 380, 1),
(13, 'Razr', 'Biasu1400', 'Mouse', 380, 1),
(16, 'PlatiniumGames', 'PS4', 'Nier Automata', 800, 1),
(17, 'Noga', 'Biasu3000', 'Teclado', 1, 1),
(18, 'Nintendo', 'Nintendo', 'Mario Kart', 400, 0),
(19, 'Samsung', 'Core', 'Celular', 800, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(100) NOT NULL,
  `cuit` int(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `cuit`, `nombre`, `telefono`, `direccion`) VALUES
(1, 12223441, 'Air', '4901212', 'San Lorenzo 4411');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remitos`
--

CREATE TABLE `remitos` (
  `nro_remito` int(50) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `dni` int(50) NOT NULL,
  `telefono` int(50) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `garantia` varchar(100) NOT NULL,
  `valor` int(50) NOT NULL,
  `venta_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `remitos`
--

INSERT INTO `remitos` (`nro_remito`, `fecha`, `nombre`, `apellido`, `dni`, `telefono`, `producto`, `cantidad`, `garantia`, `valor`, `venta_id`) VALUES
(1, '2018-10-09', 'Matias', 'Ramirez', 40457721, 2147483647, 'IMPRESORA EPSON XP441; MONITOR SAMSUNG 22\"', 2, '1 año;2 años', 6000, 0),
(2, '2018-10-09', 'JUAN', 'PERUGGIA', 39369741, 2147483647, 'MONITOR SAMSUNG LCD', 1, '1 AÑO', 2000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `DNI` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`id`, `nombre`, `apellido`, `telefono`, `DNI`, `direccion`) VALUES
(2, 'Pamela', 'Suárez', 4116274, 33011224, 'Santa Fe 599'),
(3, 'Luis', 'Gomez', 4116274, 37124567, 'Santa Fe 599'),
(4, 'Juan', 'Soria', 4805333, 30241785, 'Laprida 4178'),
(5, 'Jorge', 'Marini', 4403437, 17201459, 'Maipu 1641'),
(6, 'María', 'Farías', 4971412, 11245178, 'Sánchez de Bustamante 3120'),
(7, 'Rodrigo', 'Kiffmeyer', 4512935, 37154206, 'Córdoba 1151 PB'),
(8, 'Nicolás', 'Parissiene', 4871346, 39054208, 'Zeballos 315 10° D'),
(9, 'Guido', 'Bustamante', 4301977, 38112293, 'Pje. Noruega 3150'),
(10, 'Franco', 'Legarreta', 4314869, 39152634, 'Montevideo 3328'),
(11, 'Ignacio', 'Guzman', 4659502, 38142209, 'La República 3402'),
(12, 'Azul', 'Napolitano', 4409730, 39540975, 'Dorrego 1670 7° A'),
(13, 'Maria Fernanda', 'de Virgiliis', 4305469, 39645033, 'San Lorenzo 5587 1° C'),
(15, 'Agustin', 'Marini', 4115252, 37852309, '9 de Julio 106 1° C'),
(49, 'Zoe', 'Zellweger', 156762557, 39369741, 'Crespo 610');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(50) NOT NULL,
  `precio_venta` int(50) NOT NULL,
  `producto_id` int(50) NOT NULL,
  `cliente_id` int(50) NOT NULL,
  `empleado_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `precio_venta`, `producto_id`, `cliente_id`, `empleado_id`) VALUES
(0, 1, 7, 2, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `proveedor_id` (`proveedor_id`);

--
-- Indices de la tabla `labores`
--
ALTER TABLE `labores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personales`
--
ALTER TABLE `personales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `labor_id` (`labor_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `remitos`
--
ALTER TABLE `remitos`
  ADD PRIMARY KEY (`nro_remito`),
  ADD KEY `venta_id` (`venta_id`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `DNI` (`DNI`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `empleado_id` (`empleado_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `labores`
--
ALTER TABLE `labores`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `remitos`
--
ALTER TABLE `remitos`
  MODIFY `nro_remito` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personales`
--
ALTER TABLE `personales`
  ADD CONSTRAINT `personales_ibfk_1` FOREIGN KEY (`labor_id`) REFERENCES `labores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `remitos`
--
ALTER TABLE `remitos`
  ADD CONSTRAINT `remitos_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `venta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `socios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`empleado_id`) REFERENCES `personales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
