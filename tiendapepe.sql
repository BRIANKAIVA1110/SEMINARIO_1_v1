-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2019 a las 08:35:10
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendapepe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `ArticuloId` int(11) NOT NULL,
  `ModeloId` int(11) NOT NULL,
  `ColorId` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `CodigoBarras` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`ArticuloId`, `ModeloId`, `ColorId`, `Descripcion`, `CodigoBarras`) VALUES
(1, 1, 1, 'asd', 'asdasdasd'),
(2, 10, 3, 'qaz', 'qazqaz'),
(3, 9, 2, 'asd', 'eeeeeeeeee'),
(4, 10, 3, 'azulpepe', 'aaa-aa-aa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ClienteId` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Domicilio` varchar(100) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Telefono` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ClienteId`, `Nombre`, `Apellido`, `email`, `Domicilio`, `FechaNacimiento`, `Telefono`) VALUES
(1, 'Pepe', 'Perez', 'pepe@pepe.com', 'av. pepe 123', '2019-01-15', '1111111111'),
(2, 'Brian', 'Villarroel', 'villarrarroelbrian1110@gmail.com', 'calle 123', '1997-10-11', '1111111111'),
(3, 'Pepe2', 'Pepe2', 'Pepe2@hotmail.com', 'Pepe2 123', '0000-00-00', NULL),
(5, 'Pepe2', 'Perez', 'pepe@pepe.com', 'av. pepe 123', '2019-11-03', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `ColorId` int(11) NOT NULL,
  `Codigo` varchar(5) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`ColorId`, `Codigo`, `Descripcion`) VALUES
(1, '00001', 'Rojo'),
(2, '00002', 'Verde'),
(3, '00003', 'Azul'),
(6, '00004', 'Violeta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `ModeloId` int(11) NOT NULL,
  `Codigo` varchar(5) NOT NULL,
  `Descripcion` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`ModeloId`, `Codigo`, `Descripcion`) VALUES
(1, '00001', 'Jeans'),
(2, '00002', 'Modelo2'),
(6, '00003', 'Modelo3'),
(7, '00004', 'Modelo4'),
(8, '00005', 'Modelo5'),
(9, '00006', 'Modelo6'),
(10, '00007', 'Modelo7'),
(11, '00008', 'Remera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio`
--

CREATE TABLE `precio` (
  `PrecioId` int(11) NOT NULL,
  `ArticuloId` int(11) NOT NULL,
  `Precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `StockId` int(11) NOT NULL,
  `ArticuloId` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `VentaId` int(11) NOT NULL,
  `ClienteId` int(11) NOT NULL,
  `ArticuloId` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`ArticuloId`),
  ADD KEY `artiulos_modeloId` (`ModeloId`),
  ADD KEY `artiulos_colorId` (`ColorId`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ClienteId`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`ColorId`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`ModeloId`);

--
-- Indices de la tabla `precio`
--
ALTER TABLE `precio`
  ADD PRIMARY KEY (`PrecioId`),
  ADD KEY `Precios_ArticuloId` (`ArticuloId`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`StockId`),
  ADD KEY `stock_ArticuloId` (`ArticuloId`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`VentaId`),
  ADD KEY `ventas_clienteId` (`ClienteId`),
  ADD KEY `venta_articuloId` (`ArticuloId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `ArticuloId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ClienteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `ColorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `ModeloId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `precio`
--
ALTER TABLE `precio`
  MODIFY `PrecioId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `StockId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `VentaId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `artiulos_colorId` FOREIGN KEY (`ColorId`) REFERENCES `color` (`ColorId`),
  ADD CONSTRAINT `artiulos_modeloId` FOREIGN KEY (`ModeloId`) REFERENCES `modelo` (`ModeloId`);

--
-- Filtros para la tabla `precio`
--
ALTER TABLE `precio`
  ADD CONSTRAINT `Precios_ArticuloId` FOREIGN KEY (`ArticuloId`) REFERENCES `articulo` (`ArticuloId`);

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ArticuloId` FOREIGN KEY (`ArticuloId`) REFERENCES `articulo` (`ArticuloId`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_articuloId` FOREIGN KEY (`ArticuloId`) REFERENCES `articulo` (`ArticuloId`),
  ADD CONSTRAINT `ventas_clienteId` FOREIGN KEY (`ClienteId`) REFERENCES `cliente` (`ClienteId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
