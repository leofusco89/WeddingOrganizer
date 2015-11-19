-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2015 a las 05:19:24
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `weddingorganizer`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `a`(IN `1usuario` VARCHAR(12), IN `1mesa` INT(2), IN `1invitado` INT(2), IN `1nombreApellido` VARCHAR(50), IN `1asistencia` BOOLEAN)
    NO SQL
INSERT INTO mesas(usuario, mesa, invitado, nombreApellido, asistencia)values(1usuario, 1mesa, 1invitado, 1nombreApellido, 1asistencia)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE IF NOT EXISTS `configuraciones` (
  `cantMaxMesas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `configuraciones`
--

INSERT INTO `configuraciones` (`cantMaxMesas`) VALUES
(2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fiestas`
--

CREATE TABLE IF NOT EXISTS `fiestas` (
  `usuario` varchar(12) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `provincia` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `localidad` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `calle` varchar(25) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `invitacion` text COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `fiestas`
--

INSERT INTO `fiestas` (`usuario`, `fecha`, `provincia`, `localidad`, `calle`, `numero`, `invitacion`) VALUES
('leofusco89', '2015-11-28', 'Jovellanos', 'Buenos Aires', 'Capital Federal', 455, 'Te invito a mi casamiento que se celebra el día 28/11/2015.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE IF NOT EXISTS `mesas` (
  `usuario` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `mesa` int(2) NOT NULL,
  `invitado` int(2) NOT NULL,
  `nombreApellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `asistencia` varchar(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`usuario`, `mesa`, `invitado`, `nombreApellido`, `asistencia`) VALUES
('leofusco89', 1, 1, 'InvitadoD', 'No'),
('leofusco89', 1, 2, 'InvitadoE', 'Si'),
('leofusco89', 1, 3, '', 'No'),
('leofusco89', 1, 4, '', 'No'),
('leofusco89', 1, 5, '', 'No'),
('leofusco89', 1, 6, '', 'No'),
('leofusco89', 1, 7, '', 'No'),
('leofusco89', 1, 8, '', 'No'),
('leofusco89', 1, 9, '', 'No'),
('leofusco89', 1, 10, '', 'No'),
('leofusco89', 2, 1, 'InvitadoA', 'No'),
('leofusco89', 2, 2, 'InvitadoB', 'Si'),
('leofusco89', 2, 3, 'InvitadoC', 'Si'),
('leofusco89', 2, 4, '', 'No'),
('leofusco89', 2, 5, '', 'No'),
('leofusco89', 2, 6, '', 'No'),
('leofusco89', 2, 7, '', 'No'),
('leofusco89', 2, 8, '', 'No'),
('leofusco89', 2, 9, '', 'No'),
('leofusco89', 2, 10, '', 'No'),
('qwe', 1, 1, 'aaa', 'No'),
('qwe', 1, 2, 'qqq', 'Si'),
('qwe', 1, 3, 'uuu', 'No'),
('qwe', 1, 4, 'eee', 'No'),
('qwe', 1, 5, 'tttt', 'No'),
('qwe', 1, 6, '', 'No'),
('qwe', 1, 7, '', 'No'),
('qwe', 1, 8, '', 'No'),
('qwe', 1, 9, '', 'No'),
('qwe', 1, 10, '', 'No'),
('qwe', 2, 1, 'ppp', 'Si'),
('qwe', 2, 2, '', 'No'),
('qwe', 2, 3, '', 'No'),
('qwe', 2, 4, '', 'No'),
('qwe', 2, 5, '', 'No'),
('qwe', 2, 6, '', 'No'),
('qwe', 2, 7, '', 'No'),
('qwe', 2, 8, '', 'No'),
('qwe', 2, 9, '', 'No'),
('qwe', 2, 10, '', 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` varchar(12) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `sexo` varchar(6) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `contrasenia` varchar(16) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `nombre`, `apellido`, `sexo`, `email`, `contrasenia`) VALUES
('admin', 'AdministradorNombre', 'AdministradorApellido', 'Hombre', 'admin@admin.com', '1'),
('leofusco89', 'Leonel Jenaro', 'Fusco', 'Hombre', 'leofusco89@gmail.com', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fiestas`
--
ALTER TABLE `fiestas`
 ADD PRIMARY KEY (`usuario`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
 ADD PRIMARY KEY (`usuario`,`mesa`,`invitado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`usuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fiestas`
--
ALTER TABLE `fiestas`
ADD CONSTRAINT `fiestas_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
