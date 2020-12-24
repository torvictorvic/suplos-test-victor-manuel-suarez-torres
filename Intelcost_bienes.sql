-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-12-2020 a las 22:53:05
-- Versión del servidor: 5.7.32-0ubuntu0.16.04.1
-- Versión de PHP: 7.2.34-2+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Intelcost_bienes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `id_json` tinyint(4) NOT NULL,
  `address` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `city` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `postal_code` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `type` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `price` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `valid` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `property`
--

INSERT INTO `property` (`id`, `id_json`, `address`, `city`, `telephone`, `postal_code`, `type`, `price`, `valid`) VALUES
(1, 1, 'Ap #549-7395 Ut Rd.', 'New York', '334-052-0954', '85328', 'Casa', '$30,746', 1),
(2, 2, 'P.O. Box 657, 9831 Cursus St.', 'Orlando', '488-441-5521', '04436', 'Casa de Campo', '$71,045', 1),
(3, 61, 'Ap #214-5963 Metus Road', 'Houston', '337-930-6310', '5290KA', 'Casa', '$71,048', 1),
(4, 30, '4406 Justo Avenue', 'Houston', '242-441-7733', '38707', 'Casa de Campo', '$69,433', 1),
(5, 4, '347-866 Laoreet Road', 'Los Angeles', '997-640-8188', '94526-134', 'Casa de Campo', '$16,048', 1),
(6, 48, 'P.O. Box 264, 6488 Euismod Avenue', 'Los Angeles', '210-220-4305', 'J6H 9S9', 'Apartamento', '$33,141', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
