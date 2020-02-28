-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2018 a las 05:49:36
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(20) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'lk', '$2y$10$YF4A3dF5x.ngG5KvA8boDO68DyD5w4gj8zF0xD9D2GA'),
(2, 'lk', '$2y$10$523xaYIcICGRg21304OieOP4Y/x/ubZncJH9wcY3CNR'),
(3, '', '$2y$10$DnSfXdmi9VRT/MVrwRUKvOZs45HDTfXXV4UKwP.OZLn'),
(4, 'lk', '$2y$10$U6Yqr/JpkM3UYWA99e3w2uyToW0Jz8N9tp8M4/fIbIm'),
(5, 'lk', '$2y$10$Mj9xv19WWOdw.dOSvehh4eQLML9kcr21sDrSRu7rt8W'),
(6, 'lk', '$2y$12$.Ch.Rht3PSm0s38MlvOYLOmEyeyGzpNUefW1DWKR/8Z'),
(7, 'lk', '$2y$12$vdm2UfBS5QGYrJOZUoAv/.m3PSnVrH8dAKM6vP85/GE'),
(8, 'lk', '$2y$12$kAugm/13b0uuj7gP7Hl9tOfG2S1xOVKBZsRE9Pw9/hA'),
(9, 'lk', '$2y$12$NJqpxTkPBgmQykmu33WQjecPgvYJDm4xYO8bb7qzIlt'),
(10, 'lk', '$2y$12$KxaU.picpKVTAMSNWKj99e1QHV/lu4P0etJGAhGxxUb'),
(11, 'lk', '$2y$12$TuNZBO/KC3BYILNsGzGPGeeXNblZFvP7PN.hhnOjCcO'),
(12, 'lk', '$2y$12$K7FP7PojMkM/ZXTFdrCZl.Qfvm4cfwdEHrWxeQYb1gS'),
(13, 'lk', '$2y$12$Y4eEWTh75xWGzWwqsLvpM.1pjiek0taoAvFF2HYGCK6'),
(14, 'sw', '$2y$12$8J7w6kCCo6EXTqZreNNZF.v7TlzzHHkwD0u0VVUWswNmXayoUeh1q'),
(15, 'sw', '$2y$12$lk3/g77qNp.u8oSRt02SU.zoFTB0rOirmmRzgFnTuluiohf5DjiEW'),
(16, 'd', '$2y$12$VtKCGj8e0ie8BIcHSoUlBew6kx1ZQkgDoiUzO9qQQsvOzbLHZ4X1G'),
(17, 'sw', '$2y$12$WDySaNHlYVVe/cVR5OeT.u76th/X6QiwnkbJfH.ulxvpVlpa/1wQi'),
(18, 'pecos', '$2y$12$zW6AbuFwFOvXxNpo4OM9TO7BpRdBkCbxgIWr5L3/myDDcOKsJ2ywa'),
(19, 'pecos', '$2y$12$1X4WCLdJpknRNRXXW8cDaOHTJZU5RmcmnYWvuVuo1MpuG8Cn6pth6'),
(20, 'pecos', '$2y$12$4j9ZJt/8Mq1my4j0sSghNejmpI4YdbCTFSSwKyeJuo6nHuKf7wsQ6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
