-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2022 a las 22:23:18
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_ourschool`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_actividad`
--

CREATE TABLE `tbl_actividad` (
  `id_actividad` int(4) NOT NULL,
  `nombre_actividad` varchar(30) DEFAULT NULL,
  `desc_actividad` varchar(120) DEFAULT NULL,
  `foto_actividad` varchar(50) NOT NULL,
  `opcion_actividad` varchar(50) NOT NULL,
  `topic_actividad` varchar(50) NOT NULL,
  `autor_actividad` varchar(50) NOT NULL,
  `usuario_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_actividad`
--

INSERT INTO `tbl_actividad` (`id_actividad`, `nombre_actividad`, `desc_actividad`, `foto_actividad`, `opcion_actividad`, `topic_actividad`, `autor_actividad`, `usuario_fk`) VALUES
(10, 'Tanjiro', 'bearbearbearbear', '6FAR7QTRW5DQ5CMMC3HFHEOC6Y.jpg', 'Publico', 'Informatica', 'Alex', 4),
(12, 'Inosuke', 'asdad', 'l-intro-1620465501.jpg', 'Publico', 'Matematicas', 'Héctor', 8),
(15, 'Zenitsu', 'asadsfsdfadf', 'zenitsu-5.jpg_1052822096.jpg', 'Publico', 'Informatica', 'Héctor', 8),
(16, 'Dr Stone', 'La historia cuenta las aventuras de Senku y Taiju, dos adolescentes que se ven atrapados en un mundo post-apocalíptico e', 'dr_stone.png', 'Publico', 'Fisica', 'Alex', 4),
(17, 'Haikyuu', 'Él actualmente jugador del ASAS Sao Paulo y fue estudiante de la Preparatoria Karasuno', 'hinata.png', 'Publico', 'Deportes', 'Alex', 4),
(18, 'Inazuma', 'Partido entre Mark Evans y Clario Orvan', 'inazuma.png', 'Publico', 'Deportes', 'Alex', 4),
(19, 'Your Name', 'Chico estudiando php', 'your_name.png', 'Publico', 'Informatica', 'Héctor', 8),
(20, 'Izuku Midoriya', 'Midoriya matematico te enseña a sumar con un par de hostias lol', 'midoriya.png', 'Publico', 'Matematicas', 'Héctor', 8),
(21, 'Einstein', 'Einstein macaquiño', 'einstein.png', 'Publico', 'Fisica', 'Héctor', 8),
(22, 'PROGRAMACIÓN APUNTES', 'P-SEINT', 'Captura.PNG', 'Publico', 'Informatica', 'Alex', 4),
(23, 'ber', 'ber', 'Eji3.gif', 'Publico', 'Deportes', 'Alex', 4),
(24, 'Simon', 'bearwaak1', 'Simon_en.jpg', 'Publico', 'Informatica', 'Lucia', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_actividad_like`
--

CREATE TABLE `tbl_actividad_like` (
  `id_act_like` int(4) NOT NULL,
  `usuario_fk2` int(11) NOT NULL,
  `actividad_fk` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(15) NOT NULL,
  `correo_usuario` varchar(30) NOT NULL,
  `contra_usuario` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `nombre_usuario`, `correo_usuario`, `contra_usuario`) VALUES
(4, 'Alex', 'alexmugalopez11@gmail.com', '1234'),
(8, 'Héctor', 'hector@hotmail.com', '123123'),
(10, 'Lucia', 'lucia@gmail.com', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_actividad`
--
ALTER TABLE `tbl_actividad`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `nombre_usuario_fk` (`usuario_fk`);

--
-- Indices de la tabla `tbl_actividad_like`
--
ALTER TABLE `tbl_actividad_like`
  ADD PRIMARY KEY (`id_act_like`),
  ADD KEY `nombre_usuario_fk2` (`usuario_fk2`),
  ADD KEY `id_actividad_fk` (`actividad_fk`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_actividad`
--
ALTER TABLE `tbl_actividad`
  MODIFY `id_actividad` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tbl_actividad_like`
--
ALTER TABLE `tbl_actividad_like`
  MODIFY `id_act_like` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_actividad`
--
ALTER TABLE `tbl_actividad`
  ADD CONSTRAINT `nombre_usuario_fk` FOREIGN KEY (`usuario_fk`) REFERENCES `tbl_usuario` (`id_usuario`);

--
-- Filtros para la tabla `tbl_actividad_like`
--
ALTER TABLE `tbl_actividad_like`
  ADD CONSTRAINT `id_actividad_fk` FOREIGN KEY (`actividad_fk`) REFERENCES `tbl_actividad` (`id_actividad`),
  ADD CONSTRAINT `nombre_usuario_fk2` FOREIGN KEY (`usuario_fk2`) REFERENCES `tbl_usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
