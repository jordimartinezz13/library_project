-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-12-2020 a las 15:07:19
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cognoms` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id`, `nom`, `cognoms`) VALUES
(1, 'Albert', 'Sánchez Piñol'),
(2, 'Miguel', 'Delibes'),
(3, 'Hermann', 'Hesse'),
(4, 'Symfony Core Team', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llibre`
--

CREATE TABLE `llibre` (
  `id` int(11) NOT NULL,
  `titol` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_public` date NOT NULL,
  `autor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `llibre`
--

INSERT INTO `llibre` (`id`, `titol`, `data_public`, `autor`) VALUES
(1, 'La pell freda', '2002-09-01', 1),
(2, 'Victus', '2012-10-01', 1),
(3, 'El príncipe destronado', '1973-11-01', 2),
(4, 'Siddharta', '1922-12-01', 3),
(5, 'El llop estepari', '1927-01-01', 3),
(6, 'Symfony, the book', '2020-02-01', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `userName`, `password`) VALUES
(1, 'admin', '$1$bdgUMse2$rfg5mwkizmBKmjySe8w281'),
(2, 'alumne', '$1$uh95.WIN$B7J3CmVVka5c/AubW7JGb0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `llibre`
--
ALTER TABLE `llibre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titol` (`titol`),
  ADD KEY `autor` (`autor`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `llibre`
--
ALTER TABLE `llibre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `llibre`
--
ALTER TABLE `llibre`
  ADD CONSTRAINT `llibre_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `autor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
