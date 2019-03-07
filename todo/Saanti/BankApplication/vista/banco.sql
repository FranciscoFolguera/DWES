-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2019 a las 09:57:08
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `banco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cl_dni` varchar(9) NOT NULL,
  `cl_nombre` varchar(50) NOT NULL,
  `cl_direccion` varchar(60) NOT NULL,
  `cl_telefono` varchar(9) NOT NULL,
  `cl_email` varchar(65) NOT NULL,
  `cl_fnacimiento` date DEFAULT NULL,
  `cl_fcliente` date NOT NULL,
  `cl_ncuenta` tinyint(2) NOT NULL,
  `cl_salario` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cl_dni`, `cl_nombre`, `cl_direccion`, `cl_telefono`, `cl_email`, `cl_fnacimiento`, `cl_fcliente`, `cl_ncuenta`, `cl_salario`) VALUES
('01234567A', 'francisco', 'C. Sahagun', '916100022', 'abcdef@gmail.com', '1997-06-20', '2015-05-12', 1, 5000),
('01234567B', 'batman', 'C. Sahagun', '916100022', 'abcdef@gmail.com', '1997-06-20', '2015-05-12', 1, 15000),
('01234567C', 'Papaya', 'C. Sahagun', '916100022', 'abcdef@gmail.com', '1997-06-20', '2015-05-12', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `cu_ncu` varchar(10) NOT NULL,
  `cu_dni1` varchar(9) NOT NULL,
  `cu_dni2` varchar(9) DEFAULT NULL,
  `cu_salario` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`cu_ncu`, `cu_dni1`, `cu_dni2`, `cu_salario`) VALUES
('0000000011', '01234567A', '01234567B', 20000),
('0000000033', '01234567C', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `mo_ncu` varchar(10) NOT NULL,
  `mo_fecha` date NOT NULL,
  `mo_hora` time NOT NULL,
  `mo_concepto` varchar(80) NOT NULL,
  `mo_importe` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`mo_ncu`, `mo_fecha`, `mo_hora`, `mo_concepto`, `mo_importe`) VALUES
('0000000011', '2014-05-10', '20:05:15', 'Prueba ', 2000),
('0000000011', '2019-05-10', '20:05:15', 'Prueba dos ', -500);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cl_dni`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`cu_ncu`),
  ADD KEY `cu_dni1` (`cu_dni1`),
  ADD KEY `cu_dni2` (`cu_dni2`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`mo_ncu`,`mo_fecha`,`mo_hora`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`cu_dni1`) REFERENCES `clientes` (`cl_dni`),
  ADD CONSTRAINT `cuentas_ibfk_2` FOREIGN KEY (`cu_dni2`) REFERENCES `clientes` (`cl_dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
