-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-03-2023 a las 21:07:29
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `calixto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `computadoras`
--

CREATE TABLE `computadoras` (
  `ID_computadoras` int(5) NOT NULL,
  `SerialPC` varchar(15) NOT NULL,
  `Nombre Equipo` varchar(25) NOT NULL,
  `Ubicación` varchar(78) NOT NULL,
  `Usuario` varchar(25) NOT NULL,
  `Clave` varchar(25) NOT NULL,
  `SO` text NOT NULL,
  `Especificaciones` varchar(255) NOT NULL,
  `Operativa` text NOT NULL,
  `Office` varchar(15) NOT NULL,
  `Navegador` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `computadoras`
--

INSERT INTO `computadoras` (`ID_computadoras`, `SerialPC`, `Nombre Equipo`, `Ubicación`, `Usuario`, `Clave`, `SO`, `Especificaciones`, `Operativa`, `Office`, `Navegador`) VALUES
(1, 'CAN-00', 'CANAIMA-01', 'DEPOSITO', '', '', 'DESCONOCIDO', 'POSIBLEMENTE LAS ORIGINALES: 40GB DE DISCO DURO Y 1GB DE RAM', 'No ', 'No', 'No'),
(2, 'CAN-01', 'CANAIMA-01', 'DEPOSITO', 'CANAIMA01', '00000', 'Windows XP Profesional versión 2002 Service Pack 3', '40GB DE ALMACENAMIENTO Y 1 GB DE RAM', 'SÍ', 'SÍ', 'SÍ'),
(3, 'CAN-02', 'CANAIMA-02', 'DEPOSITO', 'CANAIMA02', '00000', 'Windows XP Profesional versión 2002 Service Pack 3', '40GB DE ALMACENAMIENTO Y 1 GB DE RAM', 'SÍ', 'SÍ', 'SÍ '),
(4, 'CAN-03', 'CANAIMA-03', 'DEPOSITO', 'CANAIMA03', '00000', 'Windows XP Profesional versión 2002 Service Pack 3', '40GB DE ALMACENAMIENTO Y 1 GB DE RAM', 'SÍ', 'SÍ', 'SÍ '),
(5, 'CAN-04', 'CANAIMA-04', 'DEPOSITO', 'CANAIMA04', '00000', 'Windows XP Profesional versión 2002 Service Pack 3', '40GB DE ALMACENAMIENTO Y 1 GB DE RAM', 'SÍ', 'SÍ', 'SÍ '),
(6, 'CAN-05', 'CANAIMA-05', 'DEPOSITO', 'CANAIMA05', '00000', 'Windows XP Profesional versión 2002 Service Pack 3', '40GB DE ALMACENAMIENTO Y 1 GB DE RAM', 'SÍ', 'SÍ (2003)', 'SÍ (MYPAL)'),
(7, 'CAN-06', 'CANAIMA-06', 'DEPOSITO', 'CANAIMA06', '000000', 'Windows XP Professional versión 2002 Service Pack 3', '40GB DE ALMACENAMIENTO Y 1GB DE RAM', 'Sí', 'Sí', 'Sí'),
(10, 'CAN-07', 'CANAIMA-07', 'Deposito', 'CANAIMA07', '00000', 'Windows XP Profesional versión 2002 Service Pack 3', '40GB De Almacenamiento y 1GB de RAM', 'Sí', 'Sí', 'Sí'),
(11, 'PC-ESTUDIO-TARD', 'CESTUDIO-TARDE', 'Control de estudio', 'CESTUDIO', '00000', 'Windows XP Profesional versión 2002 Service Pack 3', '76.5GB De almacenamiento y 504MB de RAM', 'Sí', 'Sí', 'Sí'),
(12, 'SECCIONAL', 'SECCIONAL-00', 'Seccional', 'SECCIONAL1', '00000', 'Windows XP Profesional versión 2002 Service Pack 3', '76.6 Gb de Almacenamiento y 504 Mb de RAM', 'Sí', 'Sí', 'Sí'),
(13, 'CAN-08', 'CANAIMA-08', 'Deposito', 'CANAIMA08', '00000', 'Windows XP Profesional versión 2002 Service Pack 3', '40 Gb de Almacenamiento y 1 Gb de Ram', 'Sí', 'Sí', 'Sí'),
(14, 'CAN-09', 'CANAIMA-09', 'Deposito', 'CANAIMA09', '00000', 'Windows XP Profesional versión 2002 Service Pack 3', '40 Gb de Almacenamiento y 1Gb de Ram', 'Sí', 'Sí', 'Sí'),
(15, 'CAN-09', 'CANAIMA-09', 'Deposito', 'CANAIMA09', '00000', 'Windows XP Profesional versión 2002 Service Pack 3', '40 Gb de Almacenamiento y 1Gb de Ram', 'Sí', 'Sí', 'Sí'),
(16, 'CAN-10', 'NO FUNCIONAL', 'Deposito', 'NO FUNCIONAL', '', 'NO', 'NO', 'No', 'No', 'No'),
(17, 'CAN-11', 'NO FUNCIONAL', 'Deposito', 'NO FUNCIONAL', '', 'NO', 'NO', 'No', 'No', 'No'),
(18, 'CAN-12', 'CANAIMA-12', 'Deposito', 'CANAIMA12', '00000', 'Windows XP Profesional versión 2002 Service Pack 3', '40 Gb de Almacenamiento y 1Gb de Ram', 'Sí', 'Sí', 'Sí'),
(19, 'CAN-13', 'CANAIMA-13', 'Deposito', 'CANAIMA13', '00000', 'Windows XP Profesional versión 2002 Service Pack 3', '40 Gb de Almacenamiento y 1Gb de Ram', 'Sí', 'Sí', 'Sí'),
(20, 'CAN-13', 'CANAIMA-13', 'Deposito', 'CANAIMA13', '00000', 'Windows XP Profesional versión 2002 Service Pack 3', '40 Gb de Almacenamiento y 1Gb de Ram', 'Sí', 'Sí', 'Sí'),
(21, 'CAN-14', 'CANIAIMA-14', 'Deposito', 'CANAIMA14', '00000', 'Windows XP Profesional versión 2002 Service Pack 3', '40 Gb de Almacenamiento y 1Gb de Ram', 'Sí', 'Sí', 'Sí'),
(22, 'CAN-15', 'CANAIMA-15', 'Deposito', 'CANAIMA15', '00000', 'Windows XP Profesional versión 2002 Service Pack 3', '40 Gb de Almacenamiento y 1Gb de Ram', 'Sí', 'Sí', 'Sí'),
(23, 'CAN-16', 'CANAIMA-16', 'Deposito', 'CANAIMA16', '00000', 'Windows XP Profesional versión 2002 Service Pack 3', '40 Gb de Almacenamiento y 1Gb de Ram', 'Sí', 'Sí', 'Sí'),
(24, 'CAN-17', 'CANAIMA-17', 'Deposito', 'CANAIMA17', '00000', 'Windows XP Profesional versión 2002 Service Pack 3', '40 Gb de Almacenamiento y 1Gb de Ram', 'Sí', 'Sí', 'Sí'),
(25, 'CAN-18', 'CANAIMA-18', 'Deposito', 'CANAIMA18', '00000', 'Windows XP Profesional versión 2002 Service Pack 3', '40 Gb de Almacenamiento y 1Gb de Ram', 'Sí', 'Sí', 'Sí'),
(26, 'PC-CESTUDIO-M1', 'CESTUDIO-M1', 'Control de estudio', 'ZOE', '00000', 'Windows 7 Professional', '76.5 Gb de Almacenamiento y 504 Mb de Ram', 'Sí', 'Sí', 'Sí');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(3) NOT NULL,
  `nombre` text NOT NULL,
  `usuario` varchar(28) NOT NULL,
  `clave` varchar(28) NOT NULL,
  `rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `clave`, `rol`) VALUES
(2, 'admin', 'admin', 'admin', 1),
(3, 'Robert Vegas', 'robertvegas', 'loro44', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `computadoras`
--
ALTER TABLE `computadoras`
  ADD PRIMARY KEY (`ID_computadoras`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `computadoras`
--
ALTER TABLE `computadoras`
  MODIFY `ID_computadoras` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
