-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2021 a las 02:56:08
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `virtualclass`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `cedula` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `cedula`, `nombre`, `apellido`, `telefono`, `direccion`, `email`) VALUES
(1, '22200685', 'naudis', 'garcia', '04245366490', 'la orquideoa', 'naudisgarcia51@gmail.com'),
(2, '24157055', 'Arianny', 'Cordero', '0426589521', 'Tostado', 'Ary@gmail.com'),
(3, '9611145', 'Jaime Arturo', 'Garcia', '0251547896', 'Ruiz Pineda', 'JaimeGarcia51@Gmail.com'),
(4, '', '', '', '', '', ''),
(7, '6666666', 'naudis', 'garcia', '04245366490', 'la orquidea Calle 6, Barquisimeto 3001, Lara', 'PEPE@gmail.com'),
(11, '23', 'naudis', 'garcia', '04245366490', 'la orquidea Calle 6, Barquisimeto 3001, Lara', 'naudisgarcia251@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `Id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `documento` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `telefono2` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`Id`, `nombre`, `documento`, `telefono`, `telefono2`, `email`, `direccion`) VALUES
(1, 'LaraMarket naudis', 'J-2253658455', '02519855490', '04246366480', 'LaraMarket@Gmail.com', 'La Orquidea ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `img_id` int(11) NOT NULL,
  `img_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `url`, `img_id`, `img_type`) VALUES
(1, 'naudis.jpg', 1, 1),
(2, 'Mary.jpg', 1, 3),
(3, 'Mary.jpg', 2, 3),
(4, 'Mary.jpg', 3, 3),
(5, 'Mary.jpg', 4, 3),
(6, 'Mary.jpg', 5, 3),
(7, 'Mary.jpg', 6, 3),
(8, 'Mary.jpg', 7, 3),
(9, 'Mary.jpg', 8, 3),
(10, 'Emili.jpg', 10, 3),
(11, 'Klondy.png', 11, 3),
(12, 'Klondy.png', 17, 3),
(13, 'Klondy.png', 18, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `models`
--

INSERT INTO `models` (`id`, `url`) VALUES
(1, 'User'),
(2, 'Perfil'),
(3, 'Producto'),
(4, 'Empresa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `marca` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `estatus` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `marca`, `stock`, `descripcion`, `estatus`, `id_proveedor`) VALUES
(1, 'Antonio', 2, '', 0, '', 2, 3),
(2, 'klondy', 2, '', 0, '', 2, 3),
(3, 'Mary ', 20, '20', 20, '<p>20</p>', 2, 3),
(4, 'pepe', 20, '20', 20, '<p>20</p>', 1, 3),
(5, 'vilma', 20, '20', 20, '<p>20</p>', 2, 3),
(6, 'Aruto', 20, '20', 20, '<p>20</p>', 2, 3),
(7, 'Cano', 20, '20', 20, '<p>20</p>', 2, 3),
(8, 'Jose', 20, '20', 20, '<p>20</p>', 1, 3),
(9, 'Sara', 20, '20', 20, '<p>20</p>', 1, 3),
(10, 'Quinverli', 40, '2000', 2000, '<p>naudis</p>', 2, 3),
(11, 'Reimar', 50, '50', 50, '<p>50</p>', 1, 3),
(12, '2', 0, '', 0, '', 2, 3),
(14, '3', 0, '', 0, '', 2, 3),
(15, '1', 50, '50', 5, '<p>0</p>', 1, 2),
(16, 'pepe pito dormilos', 2, '', 0, '', 1, 3),
(17, 'naudis garcia', 50, '50', 50, '<p>50</p>', 1, 3),
(18, 'lolita', 50, '50', 50, '<p>50</p>', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profiles`
--

CREATE TABLE `profiles` (
  `id` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profiles`
--

INSERT INTO `profiles` (`id`, `nombre`, `apellido`, `cedula`, `sexo`, `telefono`, `direccion`, `user_id`) VALUES
(1, 'naudis', 'garcia', '22200685', '', '04245366490', 'la orquidea Calle 6, Barquisimeto 3001, Lara', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `telefono`, `direccion`, `descripcion`) VALUES
(1, 'naudis garcia p', '04245366490', 'la orquidea', 'hola mundo como esta'),
(2, 'Pesi', '0452369548', 'LAlA', ''),
(3, 'Cocacola', '04245947482', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Superadministrador'),
(2, 'Administrador'),
(3, 'Empleado'),
(4, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taggables`
--

CREATE TABLE `taggables` (
  `id` int(11) NOT NULL,
  `taggable_id` int(11) NOT NULL,
  `tag_type` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `taggables`
--

INSERT INTO `taggables` (`id`, `taggable_id`, `tag_type`, `tag_id`) VALUES
(1, 3, 3, 7),
(2, 6, 3, 6),
(40, 5, 3, 7),
(41, 5, 3, 5),
(96, 16, 3, 7),
(97, 16, 3, 6),
(99, 18, 3, 7),
(102, 4, 3, 7),
(103, 7, 3, 5),
(107, 17, 3, 7),
(108, 17, 3, 6),
(109, 17, 3, 5),
(110, 15, 3, 7),
(111, 15, 3, 7),
(112, 15, 3, 6),
(113, 15, 3, 5),
(114, 15, 3, 4),
(115, 15, 3, 3),
(116, 15, 3, 2),
(117, 15, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`id`, `nombre`, `color`) VALUES
(1, 'Perro', 'red'),
(2, 'Gato', 'green'),
(3, 'Cochino', 'indigo'),
(4, 'Loro', 'blue'),
(5, 'vaca', 'indigo'),
(6, 'Pie Gande', 'purple'),
(7, 'Aguila', 'pink');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `pass`) VALUES
(1, 'naudisgarcia51@gmail.com', '$2y$12$HbbJDtiTNt0.NnoSjV1tOudIafgsjXtWq574z8K0k70Vcf1h7/b9m');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_role`
--

CREATE TABLE `user_role` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imageable_type` (`img_type`);

--
-- Indices de la tabla `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `taggables`
--
ALTER TABLE `taggables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_type` (`tag_type`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `user_role`
--
ALTER TABLE `user_role`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `taggables`
--
ALTER TABLE `taggables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`img_type`) REFERENCES `models` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`);

--
-- Filtros para la tabla `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `taggables`
--
ALTER TABLE `taggables`
  ADD CONSTRAINT `taggables_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `taggables_ibfk_2` FOREIGN KEY (`tag_type`) REFERENCES `models` (`id`);

--
-- Filtros para la tabla `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
