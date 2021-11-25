-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2021 a las 00:02:08
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login_usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuarios`
--
-- Creación: 25-11-2021 a las 15:59:25
-- Última actualización: 25-11-2021 a las 16:01:13
--

CREATE TABLE `tipo_usuarios` (
  `tipo_id` int(11) NOT NULL,
  `tipo_nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_estado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`tipo_id`, `tipo_nombre`, `tipo_estado`) VALUES
(1, 'Administrador', 1),
(2, 'Usuario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--
-- Creación: 23-11-2021 a las 17:50:46
-- Última actualización: 25-11-2021 a las 22:53:09
--

CREATE TABLE `usuarios` (
  `usuarios_id` int(11) NOT NULL,
  `usuarios_nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuarios_mail` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuarios_nick` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuarios_password` varchar(2000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuarios_tipo` int(11) NOT NULL DEFAULT 0,
  `usuarios_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuarios_id`, `usuarios_nombre`, `usuarios_mail`, `usuarios_nick`, `usuarios_password`, `usuarios_tipo`, `usuarios_estado`) VALUES
(7, 'Mauricio villalobos', 'admin@admin.cl', 'administrador', 'fdc70755f7a79779e62c9d5f03e6183f', 1, 1),
(11, 'perfil usuario', 'usuario@usuario.com', 'usuario', '2766f0064d1f9a554281435fd6622cb6', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  ADD PRIMARY KEY (`tipo_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarios_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  MODIFY `tipo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarios_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
