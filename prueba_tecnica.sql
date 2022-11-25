-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2022 a las 20:55:58
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
-- Base de datos: `prueba_tecnica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `documento` int(30) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(500) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `id_condicion_pago` int(11) NOT NULL,
  `valor_cupo` varchar(100) NOT NULL,
  `id_medio_pago` int(11) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `documento`, `nombre`, `primer_apellido`, `segundo_apellido`, `direccion`, `telefono`, `correo`, `ciudad`, `id_condicion_pago`, `valor_cupo`, `id_medio_pago`, `estado`, `fecha_registro`) VALUES
(1, 1005108571, 'Jose David', 'Gomez', 'Delgado', 'Cra 15', '3104672775', 'josedavid@gbs.com.co', 'Piedecuesta', 2, '222', 2, '0', '2022-11-25 14:51:51'),
(3, 1, '1', '1', '1', '1', '1', '1', 'Bucaramanga', 2, '1', 2, '0', '2022-11-25 19:46:25'),
(12, 222, '2', '2', '2', '2', '22', '222', 'Piedecuesta', 2, '22', 2, '0', '2022-11-25 19:51:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condiciones_pago`
--

CREATE TABLE `condiciones_pago` (
  `id_condicion_pago` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `condiciones_pago`
--

INSERT INTO `condiciones_pago` (`id_condicion_pago`, `nombre`) VALUES
(1, 'Contado'),
(2, 'Credito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medios_pago`
--

CREATE TABLE `medios_pago` (
  `id_medio_pago` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medios_pago`
--

INSERT INTO `medios_pago` (`id_medio_pago`, `nombre`) VALUES
(1, 'Tarjeta'),
(2, 'Efectivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `documento` (`documento`);

--
-- Indices de la tabla `condiciones_pago`
--
ALTER TABLE `condiciones_pago`
  ADD PRIMARY KEY (`id_condicion_pago`);

--
-- Indices de la tabla `medios_pago`
--
ALTER TABLE `medios_pago`
  ADD PRIMARY KEY (`id_medio_pago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `condiciones_pago`
--
ALTER TABLE `condiciones_pago`
  MODIFY `id_condicion_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `medios_pago`
--
ALTER TABLE `medios_pago`
  MODIFY `id_medio_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
