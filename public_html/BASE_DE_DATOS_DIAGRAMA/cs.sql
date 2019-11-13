-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2019 a las 23:30:55
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `cid` int(11) NOT NULL,
  `sub_cat` int(11) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cid`, `sub_cat`, `nombre_categoria`, `status`) VALUES
(1, 0, 'Cervezas Artesanales', '1'),
(2, 0, 'Cervezas en Barriles', '1'),
(5, 1, 'Cervezas Importadas', '1'),
(7, 1, 'Cervezas Sin Alcohol', '1'),
(9, 2, 'Cervezas Sin TACC', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id` int(11) NOT NULL,
  `pedido_no` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `precio` double NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `pedido_no` int(11) NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `sub_total` double NOT NULL,
  `iva` double NOT NULL,
  `descuento` double NOT NULL,
  `neto` double NOT NULL,
  `importe` double NOT NULL,
  `deuda` double NOT NULL,
  `tipo_pago` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `pdid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `precio_producto` double NOT NULL,
  `stock_producto` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `p_status` enum('1','0') NOT NULL,
  `detalle_producto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`pdid`, `cid`, `pid`, `nombre_producto`, `precio_producto`, `stock_producto`, `fecha_ingreso`, `p_status`, `detalle_producto`) VALUES
(15, 5, 1, 'Kaiserdom Festbier', 3.955, 50, '2019-10-01', '1', 'Caja con 5 Vasos tipo Chopp con 1 Lata Kaiserdom Kellerbier Edición Festbier x 1000 ml.\r\nEtiqueta: Alemania'),
(16, 5, 14, 'Imperial IPA', 1.389, 120, '2019-10-01', '1', 'Cerveza Cobriza tipo India Pale Ale Americana.\r\nEtiqueta: Buenos Aires'),
(17, 5, 17, 'Bee Honey', 3.528, 300, '2019-10-01', '1', 'Rubia con miel tipo Honey\r\nEtiqueta: Argentina'),
(18, 9, 18, 'Guinness Especial Export', 5.265, 300, '2019-10-01', '1', 'Cerveza Negra tipo Strong Irish Stout\r\nEtiqueta: Irlanda'),
(19, 5, 1, 'Barba Roja Malta Extra', 1.514, 50, '2019-10-01', '1', 'Malta Extra sin Alcohol\r\nEtiqueta: Argentina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `pid` int(11) NOT NULL,
  `nombre_proveedor` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`pid`, `nombre_proveedor`, `status`) VALUES
(1, 'Distribuidora Nomade', '1'),
(13, 'Craftbeer', '1'),
(14, 'Bierful', '1'),
(15, 'Duxbeer', '1'),
(16, 'Bodega Cervecera', '1'),
(17, 'Ippba', '1'),
(18, 'Distribuidora Independencia', '1'),
(19, 'Cbgb Distribucion', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `usertype` enum('Admin','Other') NOT NULL,
  `register_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES
(9, 'Vanesa', 'Vanesa@gmail.com', '$2y$08$p2i.akn8C16CqWEnnJWYJu9LJY6dJ8YfKDxEl4G/ye8MlceL.R92.', 'Admin', '2019-10-16', '2019-10-16 02:10:12', ''),
(10, 'Test', 'test@gmail.com', '$2y$08$jhY6DHjsOgTKOgpM3cOvau1XLb4YU6mjmzNoKKbmmv1kSz13Gag4S', 'Other', '2019-10-16', '2019-10-16 02:10:36', ''),
(11, 'Admin', 'admin@admin', '$2y$08$mMAwI2YlxncUBIyzAvr.K.tERoODYNs6Hyu6ypxOuY7525/A0.bKC', 'Admin', '2019-10-20', '2019-10-20 08:10:54', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `nombre_categoria` (`nombre_categoria`);

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_no` (`pedido_no`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`pedido_no`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`pdid`),
  ADD UNIQUE KEY `product_name` (`nombre_producto`),
  ADD KEY `cid` (`cid`),
  ADD KEY `pid` (`pid`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `nombre_proveedor` (`nombre_proveedor`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `pedido_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
