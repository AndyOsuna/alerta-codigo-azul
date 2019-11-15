-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2019 a las 03:36:10
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_codigoazul`
--
CREATE DATABASE IF NOT EXISTS `bd_codigoazul` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_codigoazul`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermeros`
--

CREATE TABLE `enfermeros` (
  `id` int(8) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `tel` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `enfermeros`
--

INSERT INTO `enfermeros` (`id`, `nombre`, `apellido`, `tel`) VALUES
(1, 'Jose', 'Perez', 2147483647),
(2, 'Manolito', 'Martinez', 1245136246);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas_medicas`
--

CREATE TABLE `fichas_medicas` (
  `id` int(8) NOT NULL,
  `edad` int(3) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `condicion` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llamados`
--

CREATE TABLE `llamados` (
  `id` int(10) NOT NULL,
  `ubicacion` varchar(40) NOT NULL,
  `paciente` varchar(40) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `fecha_hora_atendido` datetime NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `atendido` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `llamados`
--

INSERT INTO `llamados` (`id`, `ubicacion`, `paciente`, `fecha_hora`, `fecha_hora_atendido`, `tipo`, `atendido`) VALUES
(1, 'QuirÃ³fano N8', 'Soraya Raquel', '2019-10-31 11:29:24', '2019-10-31 15:47:22', 'Emergencia', 1),
(2, 'QuirÃ³fano N8', 'Soraya Raquel', '2019-10-31 11:30:42', '2019-10-31 15:48:38', 'Emergencia', 1),
(3, 'QuirÃ³fano N8', 'Dario', '2019-10-31 11:30:52', '2019-10-31 18:29:16', 'Llamado', 1),
(4, 'QuirÃ³fano N2', 'Soraya Raquel', '2019-10-31 14:15:48', '2019-10-31 18:29:16', 'Emergencia', 1),
(5, 'QuirÃ³fano N8', 'Soraya Raquel', '2019-10-31 14:29:05', '2019-10-31 18:29:20', 'Emergencia', 1),
(6, 'QuirÃ³fano N2', 'Dario', '2019-10-31 14:44:21', '2019-10-31 14:44:26', 'Llamado', 1),
(7, 'QuirÃ³fano N8', 'Soraya Raquel', '2019-10-31 15:25:39', '2019-10-31 15:34:55', 'Emergencia', 1),
(8, 'QuirÃ³fano N8', 'Soraya Raquel', '2019-10-31 15:26:43', '2019-10-31 15:34:57', 'Emergencia', 1),
(9, 'QuirÃ³fano N8', 'Soraya Raquel', '2019-10-31 15:28:07', '2019-10-31 15:34:58', 'Emergencia', 1),
(10, 'QuirÃ³fano N8', 'Soraya Raquel', '2019-10-31 15:28:14', '2019-10-31 15:34:59', 'Emergencia', 1),
(11, 'QuirÃ³fano N8', 'Soraya Raquel', '2019-10-31 15:29:05', '2019-10-31 15:35:00', 'Emergencia', 1),
(12, 'QuirÃ³fano N8', 'Soraya Raquel', '2019-10-31 15:30:23', '2019-10-31 15:35:01', 'Emergencia', 1),
(13, 'QuirÃ³fano N8', 'Soraya Raquel', '2019-10-31 15:31:43', '2019-10-31 15:35:02', 'Emergencia', 1),
(14, 'QuirÃ³fano N8', 'Soraya Raquel', '2019-10-31 15:34:31', '2019-10-31 15:35:03', 'Emergencia', 1),
(15, 'QuirÃ³fano N8', 'Soraya Raquel', '2019-10-31 15:34:49', '2019-10-31 15:35:04', 'Emergencia', 1),
(16, 'QuirÃ³fano N2', 'Dario', '2019-10-31 15:35:27', '2019-10-31 16:24:42', 'Llamado', 1),
(17, 'QuirÃ³fano N2', 'Dario', '2019-10-31 15:36:29', '2019-10-31 16:24:47', 'Llamado', 1),
(18, 'QuirÃ³fano N8', 'Soraya Raquel', '2019-10-31 16:08:40', '2019-10-31 16:24:50', 'Emergencia', 1),
(19, 'QuirÃ³fano N8', 'Soraya Raquel', '2019-10-31 16:23:01', '2019-10-31 16:24:49', 'Emergencia', 1),
(20, 'QuirÃ³fano N8', 'Danielru', '2019-10-31 16:23:22', '2019-10-31 16:24:50', 'Emergencia', 1),
(21, 'QuirÃ³fano N8', 'Soraya Raquel', '2019-10-31 16:26:29', '2019-10-31 16:28:25', 'Emergencia', 1),
(22, 'QuirÃ³fano N8', 'Soraya Raquel', '2019-10-31 16:31:12', '2019-10-31 16:48:13', 'Emergencia', 1),
(23, 'QuirÃ³fano N2', 'Danielru', '2019-10-31 16:35:24', '2019-10-31 16:48:25', 'Llamado', 1),
(24, 'QuirÃ³fano N8', 'MarÃ­a JosÃ© Antonio Rodriges De la Cruz', '2019-10-31 17:12:32', '2019-10-31 17:12:43', 'Emergencia', 1),
(25, 'QuirÃ³fano N2', 'Dario', '2019-10-31 17:13:04', '2019-10-31 17:13:25', 'Emergencia', 1),
(26, 'QuirÃ³fano N8', 'MarÃ­a JosÃ© Antonio Rodriges De la Cruz', '2019-10-31 17:16:25', '2019-10-31 17:20:40', 'Emergencia', 1),
(27, 'QuirÃ³fano N8', 'MarÃ­a JosÃ© Antonio Rodriges De la Cruz', '2019-10-31 17:24:48', '2019-11-01 09:09:15', 'Emergencia', 1),
(28, 'QuirÃ³fano N2', 'Dario', '2019-11-01 09:08:27', '2019-11-01 09:09:13', 'Emergencia', 1),
(29, 'QuirÃ³fano N8', 'MarÃ­a JosÃ© Antonio Rodriges De la Cruz', '2019-11-01 09:09:29', '2019-11-01 09:30:13', 'Emergencia', 1),
(30, 'QuirÃ³fano N8', 'MarÃ­a JosÃ© Antonio Rodriges De la Cruz', '2019-11-01 09:10:10', '2019-11-01 09:30:21', 'Emergencia', 1),
(31, 'QuirÃ³fano N8', 'MarÃ­a JosÃ© Antonio Rodriges De la Cruz', '2019-11-01 09:16:16', '2019-11-01 09:30:16', 'Emergencia', 1),
(32, 'QuirÃ³fano N8', 'MarÃ­a JosÃ© Antonio Rodriges De la Cruz', '2019-11-01 09:29:52', '2019-11-01 09:30:17', 'Emergencia', 1),
(33, 'QuirÃ³fano N8', 'MarÃ­a JosÃ© Antonio Rodriges De la Cruz', '2019-11-01 09:30:36', '2019-11-01 09:31:01', 'Emergencia', 1),
(34, 'QuirÃ³fano N8', 'MarÃ­a JosÃ© Antonio Rodriges De la Cruz', '2019-11-01 09:30:47', '2019-11-01 09:31:04', 'Emergencia', 1),
(35, 'QuirÃ³fano N8', 'MarÃ­a JosÃ© Antonio Rodriges De la Cruz', '2019-11-01 09:31:15', '2019-11-01 09:31:44', 'Emergencia', 1),
(36, 'QuirÃ³fano N8', 'MarÃ­a JosÃ© Antonio Rodriges De la Cruz', '2019-11-01 09:31:52', '2019-11-01 09:32:14', 'Emergencia', 1),
(37, 'QuirÃ³fano N2', 'Dario', '2019-11-01 09:32:38', '2019-11-01 09:42:56', 'Llamado', 1),
(38, 'QuirÃ³fano N8', 'MarÃ­a JosÃ© Antonio Rodriges De la Cruz', '2019-11-01 09:43:04', '2019-11-01 09:47:38', 'Emergencia', 1),
(39, 'QuirÃ³fano N2', 'Tomas', '2019-11-01 11:45:13', '2019-11-01 11:45:59', 'Emergencia', 1),
(40, 'QuirÃ³fano N8', 'Dario', '2019-11-01 11:51:03', '2019-11-01 11:52:41', 'Llamado', 1),
(41, 'QuirÃ³fano N8', 'Dario', '2019-11-01 11:52:22', '2019-11-01 11:52:44', 'Llamado', 1),
(42, 'QuirÃ³fano N8', 'Dario', '2019-11-01 11:52:40', '2019-11-01 11:52:43', 'Emergencia', 1),
(43, 'QuirÃ³fano N8', 'Dario', '2019-11-01 11:55:08', '2019-11-01 11:56:50', 'Emergencia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(8) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `ficha_medica` int(8) NOT NULL,
  `ubicacion` varchar(40) NOT NULL,
  `enfermero` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `ficha_medica`, `ubicacion`, `enfermero`) VALUES
(1, 'Dario', 0, '7', 1),
(2, 'Dario', 1, '2', 1),
(4, 'Andy', 0, '7', 2),
(5, 'Tomas', 0, '6', 2),
(6, 'xd', 0, '6', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `id` int(11) NOT NULL,
  `sala` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`id`, `sala`) VALUES
(3, 'QuirÃ³fano N8'),
(6, 'QuirÃ³fano N2'),
(7, 'BaÃ±o');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `sala` int(11) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = es admin, 0 = usuario genérico'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `sala`, `isAdmin`) VALUES
(1, 'admin', 'admi', 0, 1),
(2, 'usuario', '1234', 0, 0),
(3, 'Andy', '1234', 0, 0),
(4, 'Admin2', 'admin2', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `enfermeros`
--
ALTER TABLE `enfermeros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fichas_medicas`
--
ALTER TABLE `fichas_medicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `llamados`
--
ALTER TABLE `llamados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `enfermeros`
--
ALTER TABLE `enfermeros`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fichas_medicas`
--
ALTER TABLE `fichas_medicas`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `llamados`
--
ALTER TABLE `llamados`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
