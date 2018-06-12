-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-06-2018 a las 16:39:51
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `RFC` text NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `Nombre`, `RFC`, `Password`) VALUES
(2, 'pp', 'pp11', '11'),
(3, 'pp1', 'pp111', '11'),
(4, 'HH', 'HH', 'HH');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_proyecto`
--

CREATE TABLE `cliente_proyecto` (
  `id` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `developers`
--

CREATE TABLE `developers` (
  `id` int(200) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `cliente` varchar(200) NOT NULL,
  `proyecto` varchar(200) NOT NULL,
  `jefe` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `developers`
--

INSERT INTO `developers` (`id`, `usuario`, `cliente`, `proyecto`, `jefe`) VALUES
(1, 'aaaa', '', '', ''),
(2, 'novo2', '', '', ''),
(3, 'novo3', '', '', ''),
(4, 'novo4', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(4) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `tipo` int(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `edad` int(20) NOT NULL,
  `sexo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `usuario`, `correo`, `password`, `direccion`, `telefono`, `tipo`, `nombre`, `apellidos`, `edad`, `sexo`) VALUES
(18, 'novo', 'novoide@hotmail.com', '160396', 'Bosques nordicos manzana 112 lote 80 casa 2', '5570103042', 1, 'Axel', 'Rosillo', 22, 'male'),
(19, 'novo4', 'novoide4@hotmail.com', '1234', 'Bosques nordicos manzana 112 lote 80 casa 2', '5570103042', 1, 'Axel', 'Rosillo', 22, 'male'),
(20, 'novo3', 'novoide3@hotmail.com', '1234', 'fsghdjkklhgfdsfjhkjjkjhhdfghfkj', '345678987654', 1, 'Juan', 'Perez', 22, 'male'),
(21, 'novo2', 'novoide2@hotmail.com', '1234', 'fsghdjkklhgfdsfjhkjjkjhhdfghfkj', '345678987654', 1, 'Juan', 'Perez', 22, 'male'),
(22, 'aaaa', 'novoidae@hotmail.com', '123', 'Bosques nordicos manzana 112 lote 80 casa 2', '43456', 1, 'Axel', 'Rosillo', 22, 'male'),
(23, 'novo1', 'adsfq@hotmail.com', '12', 'Bosques nordicos manzana 112 lote 80 casa 2', '5570103042', 2, 'Axel', 'Rosillo', 22, 'male'),
(24, 'alexelbago', 'alexelbago@hotmail.com', '1234', 'Bosques nordicos manzana 112 lote 80 casa 2', '553453464', 2, 'Alex', 'Salcedo', 20, 'male'),
(25, 'novo5', 'novoide5@hotmail.com', '1234', 'Bosques nordicos manzana 112 lote 80 casa 2', '43456', 2, 'Axel', 'Rosillo', 22, 'male');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emp_proy`
--

CREATE TABLE `emp_proy` (
  `id_empl` int(11) NOT NULL,
  `Id_rel` int(11) NOT NULL,
  `id_proy` int(11) NOT NULL,
  `creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pm`
--

CREATE TABLE `pm` (
  `id` int(100) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `developer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pm`
--

INSERT INTO `pm` (`id`, `usuario`, `developer`) VALUES
(1, 'novo5', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Empresa` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` text NOT NULL,
  `correo` text NOT NULL,
  `password` text NOT NULL,
  `direccion` text NOT NULL,
  `telefono` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `nombre` text NOT NULL,
  `apellidos` text NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente_proyecto`
--
ALTER TABLE `cliente_proyecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proyecto` (`id_proyecto`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `emp_proy`
--
ALTER TABLE `emp_proy`
  ADD PRIMARY KEY (`Id_rel`),
  ADD KEY `id_empl` (`id_empl`),
  ADD KEY `id_proy` (`id_proy`);

--
-- Indices de la tabla `pm`
--
ALTER TABLE `pm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente_proyecto`
--
ALTER TABLE `cliente_proyecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `developers`
--
ALTER TABLE `developers`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `emp_proy`
--
ALTER TABLE `emp_proy`
  MODIFY `Id_rel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pm`
--
ALTER TABLE `pm`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente_proyecto`
--
ALTER TABLE `cliente_proyecto`
  ADD CONSTRAINT `cliente_proyecto_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `cliente_proyecto_ibfk_2` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`Id`);

--
-- Filtros para la tabla `developers`
--
ALTER TABLE `developers`
  ADD CONSTRAINT `developers_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `empleados` (`usuario`);

--
-- Filtros para la tabla `emp_proy`
--
ALTER TABLE `emp_proy`
  ADD CONSTRAINT `emp_proy_ibfk_1` FOREIGN KEY (`id_proy`) REFERENCES `proyecto` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_proy_ibfk_2` FOREIGN KEY (`id_empl`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pm`
--
ALTER TABLE `pm`
  ADD CONSTRAINT `pm_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `empleados` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
