-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2022 a las 00:41:44
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_contactsCONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apidb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `name` varchar(45) COLLATE utf32_bin NOT NULL,
  `lastName` varchar(45) COLLATE utf32_bin NOT NULL,
  `email` varchar(45) COLLATE utf32_bin NOT NULL,
  `phoneNum1` varchar(45) COLLATE utf32_bin DEFAULT NULL,
  `phoneNum2` varchar(45) COLLATE utf32_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `lastName`, `email`, `phoneNum1`, `phoneNum2`) VALUES
(1, 'Carl', 'Jose', 'carl@gmail.com', '7984563210', ''),
(3, 'Juan', 'Perez', 'juan@gmail.com', '7984563210', ''),
(4, 'Luis', 'Rios', 'juan@gmail.com', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
