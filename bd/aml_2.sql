-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2018 a las 04:46:22
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `aml_2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
`id` int(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `imagen` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_administrador`
--

CREATE TABLE IF NOT EXISTS `registro_administrador` (
`id` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro_administrador`
--

INSERT INTO `registro_administrador` (`id`, `nombre`, `apellido`, `usuario`, `password`) VALUES
(1, 'po', 'po', 'po', 36),
(2, 'ka', 'ka', 'ka', 0),
(3, 'la', 'la', 'la', 56),
(4, 'qooo', 'qoooq', 'ioio', 22),
(5, 'uuu', 'uuu', 'uuu', 4444),
(6, 'aaaa', 'aaaaaa', '2222', 22),
(7, 'mmmmmmmmmmmmm', 'mmmmmmmmmmmmmmmmmmmm', 'm', 0),
(8, 'eeee', 'eeeee', 'eeee', 0),
(9, 'Caleb', 'Palacios', 'Caleb', 77),
(10, 'Caleb', 'Palacios', 'Jordan', 88);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_administrador`
--
ALTER TABLE `registro_administrador`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `registro_administrador`
--
ALTER TABLE `registro_administrador`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
