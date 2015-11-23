-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2015 a las 01:41:56
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
(4);

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
  `foto` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `contrasenia` varchar(64) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `nombre`, `apellido`, `sexo`, `email`, `foto`, `contrasenia`) VALUES
('admin', 'AdministradorNombre', 'AdministradorApellido', 'Hombre', 'admin@admin.com', 'profile_default.jpg', '356a192b7913b04c54574d18c28d46e6395428ab');

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
