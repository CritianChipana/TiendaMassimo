-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-01-2021 a las 15:03:56
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleta`
--

CREATE TABLE `boleta` (
  `idboleta` int(11) NOT NULL,
  `idOrigen` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comanda`
--

CREATE TABLE `comanda` (
  `idcomanda` int(11) NOT NULL,
  `DNI` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `dniCliente` char(18) DEFAULT NULL,
  `empleado` varchar(30) NOT NULL,
  `importe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comanda`
--

INSERT INTO `comanda` (`idcomanda`, `DNI`, `fecha`, `estado`, `dniCliente`, `empleado`, `importe`) VALUES
(1, 1234567, '0000-00-00', '1', '74306285', '', 0),
(2, 1234567, '0000-00-00', '1', '74306285', '', 0),
(3, 1234567, '2021-01-05', '1', '74306285', '', 0),
(4, 1234567, '2021-01-20', '1', '74306285', '', 0),
(5, 1234567, '2021-01-20', '1', '74306285', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleproforma`
--

CREATE TABLE `detalleproforma` (
  `idDetalleProforma` int(11) NOT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precioUnidad` int(11) DEFAULT NULL,
  `idproforma` int(11) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellidos` varchar(20) DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `direccion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_comanda`
--

CREATE TABLE `detalle_comanda` (
  `iddetalle_comanda` int(11) NOT NULL,
  `cantidad` char(18) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `idcomanda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_comanda`
--

INSERT INTO `detalle_comanda` (`iddetalle_comanda`, `cantidad`, `precio`, `idProducto`, `idcomanda`) VALUES
(1, '2', NULL, 1, 1),
(2, '1', NULL, 2, 1),
(3, '2', NULL, 2, 2),
(4, '1', NULL, 1, 3),
(5, '1', NULL, 2, 3),
(6, '1', NULL, 3, 4),
(7, '1', NULL, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL,
  `idorigen` int(11) DEFAULT NULL,
  `origen` varchar(20) DEFAULT NULL,
  `ruc` varchar(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `idprivilegio` int(11) NOT NULL,
  `nombrep` varchar(20) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `foto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`idprivilegio`, `nombrep`, `link`, `foto`) VALUES
(1, 'emitir devolucion', 'cajero', 'np.jpg'),
(2, 'emitir proforma', 'modelo', 'a.png'),
(3, 'emitir boleta', 'modelo', 'as.png'),
(4, 'generar Comanda', '../gestionModulo/emitir Comanda/controlVerificarAcceso.php', 'as.jpg'),
(5, 'gestionar comprobant', '../Controlador/controlVerificarAccesoComprobante.php', 'as.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `foto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `descripcion`, `precio`, `foto`) VALUES
(1, 'Lomo Saltado', 'Plato favorito del Ingeniero Cristian', 35, 'lomosaltado.png'),
(2, 'ceviche', 'El pescado es de hace una semana pero hoy recién lo descongelamos', 51, '3.jpg'),
(3, 'Carapulcra', 'Plato representativo del Ingeniero Cristian', 40, 'elmejor.pnj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proforma`
--

CREATE TABLE `proforma` (
  `idproforma` int(11) NOT NULL,
  `DNI` int(11) DEFAULT NULL,
  `importe` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `fechaEntrega` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `DNI` int(11) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellidos` varchar(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `correo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`DNI`, `password`, `nombre`, `apellidos`, `estado`, `celular`, `direccion`, `correo`) VALUES
(1234, '1234', 'camilo', 'Chipana', '1', '986661493', 'Bolivar', 'tucariñoso@gmail.com'),
(1234567, '1234567', 'cristian', 'Chipana', '1', '986661493', 'km 40', 'tucariñoso@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioprivilegio`
--

CREATE TABLE `usuarioprivilegio` (
  `idDetatallePrivilegio` int(11) NOT NULL,
  `DNI` int(11) DEFAULT NULL,
  `idprivilegio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarioprivilegio`
--

INSERT INTO `usuarioprivilegio` (`idDetatallePrivilegio`, `DNI`, `idprivilegio`) VALUES
(1, 1234567, 1),
(2, 1234567, 2),
(3, 1234567, 3),
(4, 1234, 1),
(5, 1234, 2),
(6, 1234567, 4),
(7, 1234567, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD PRIMARY KEY (`idboleta`);

--
-- Indices de la tabla `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`idcomanda`),
  ADD KEY `R_33` (`DNI`);

--
-- Indices de la tabla `detalleproforma`
--
ALTER TABLE `detalleproforma`
  ADD PRIMARY KEY (`idDetalleProforma`),
  ADD KEY `R_22` (`idProducto`),
  ADD KEY `R_50` (`idproforma`);

--
-- Indices de la tabla `detalle_comanda`
--
ALTER TABLE `detalle_comanda`
  ADD PRIMARY KEY (`iddetalle_comanda`),
  ADD KEY `R_31` (`idProducto`),
  ADD KEY `R_18` (`idcomanda`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`idprivilegio`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `proforma`
--
ALTER TABLE `proforma`
  ADD PRIMARY KEY (`idproforma`),
  ADD KEY `R_27` (`DNI`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `usuarioprivilegio`
--
ALTER TABLE `usuarioprivilegio`
  ADD PRIMARY KEY (`idDetatallePrivilegio`),
  ADD KEY `R_57` (`DNI`),
  ADD KEY `R_58` (`idprivilegio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boleta`
--
ALTER TABLE `boleta`
  MODIFY `idboleta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comanda`
--
ALTER TABLE `comanda`
  MODIFY `idcomanda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalleproforma`
--
ALTER TABLE `detalleproforma`
  MODIFY `idDetalleProforma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_comanda`
--
ALTER TABLE `detalle_comanda`
  MODIFY `iddetalle_comanda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `idprivilegio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proforma`
--
ALTER TABLE `proforma`
  MODIFY `idproforma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `DNI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234568;

--
-- AUTO_INCREMENT de la tabla `usuarioprivilegio`
--
ALTER TABLE `usuarioprivilegio`
  MODIFY `idDetatallePrivilegio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `R_33` FOREIGN KEY (`DNI`) REFERENCES `usuario` (`DNI`);

--
-- Filtros para la tabla `detalleproforma`
--
ALTER TABLE `detalleproforma`
  ADD CONSTRAINT `R_22` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`),
  ADD CONSTRAINT `R_50` FOREIGN KEY (`idproforma`) REFERENCES `proforma` (`idproforma`);

--
-- Filtros para la tabla `detalle_comanda`
--
ALTER TABLE `detalle_comanda`
  ADD CONSTRAINT `R_18` FOREIGN KEY (`idcomanda`) REFERENCES `comanda` (`idcomanda`),
  ADD CONSTRAINT `R_31` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `proforma`
--
ALTER TABLE `proforma`
  ADD CONSTRAINT `R_27` FOREIGN KEY (`DNI`) REFERENCES `usuario` (`DNI`);

--
-- Filtros para la tabla `usuarioprivilegio`
--
ALTER TABLE `usuarioprivilegio`
  ADD CONSTRAINT `R_57` FOREIGN KEY (`DNI`) REFERENCES `usuario` (`DNI`),
  ADD CONSTRAINT `R_58` FOREIGN KEY (`idprivilegio`) REFERENCES `privilegios` (`idprivilegio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
