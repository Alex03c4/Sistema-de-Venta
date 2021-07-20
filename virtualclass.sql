-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2021 a las 21:54:00
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
(1, '22200685', 'naudis', 'garcia', '04245366490', 'la orquidea Calle 6, Barquisimeto 3001, Lara', 'naudisgarcia51@gmail.com'),
(2, '2', 'naudis', 'garcia', '04245366490', 'la orquidea Calle 6, Barquisimeto 3001, Lara', 'naudisgarcia@gmail.com'),
(3, '22', 'Vilma', 'Salon', '04162596922', 'Ruiz Pineda', 'Vilma@Gmail.com'),
(4, '24157022222222222222222222222222', 'KK', 'HUYGYF', '5555555555', 'JHGVH JUHYGTY GFT', 'JUHHYYYGYHHYHYH@GMAIL.COM'),
(5, '24157055', 'Arianny', 'Cordero', '04125115149', 'El Tostado', 'ary_corderito@hotmail.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credito`
--

CREATE TABLE `credito` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `monto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `credito`
--

INSERT INTO `credito` (`id`, `id_cliente`, `id_venta`, `monto`) VALUES
(1, 2, 38, 20),
(2, 3, 70, 0),
(3, 3, 75, 25.85),
(4, 3, 81, 19),
(5, 5, 84, 10),
(6, 1, 85, 62);

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
(1, 'LARENSE SUPERMARKET C.A. ', ' J-40537521-3', '02519855490', '04246366480', 'LARENSESUPERMARKET@Gmail.com', 'Avenida Florencio Jiménez, kilómetro 10 vías a Quibor');

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
(3, 'CerdoMersan.jpg', 2, 3),
(10, 'PonedoraMensan.jpg', 1, 3),
(11, 'PonedoraMensan.jpg', 3, 3),
(12, 'Mary.jpg', 2, 1),
(13, 'Klondy.png', 5, 1),
(14, 'WhatsApp Image 2021-07-17 at 3.15.56 PM.jpeg', 4, 1),
(15, 'WhatsApp Image 2021-07-17 at 3.18.03 PM.jpeg', 3, 1),
(16, 'combecon.png', 5, 3),
(17, 'v_ferron_b12_100ml_contra_anemia_calbos_77591_1_8d8dfb1687f5f173d07b41e9f89d16c6.jpg', 6, 3),
(18, 'D_NQ_NP_713405-MLV45392884142_032021-O.jpg', 7, 3),
(19, 'CerdoMersan.jpg', 9, 3);

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
  `estatus` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `id_unidad` int(11) NOT NULL,
  `Total_unidad` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `marca`, `stock`, `estatus`, `id_proveedor`, `descripcion`, `id_unidad`, `Total_unidad`) VALUES
(1, 'Ponedora Casera', 8, 'Mersan', 187, 1, 1, '<h2><strong>Analisis:</strong></h2><ul><li>&nbsp;</li></ul><h2><strong>proteína (Min)=</strong>15%</h2><p>&nbsp;</p><h2><strong>Grasa(Max)=</strong>8%</h2><p>&nbsp;</p><h2><strong>Fibra(Max)=</strong>8%</h2><p>&nbsp;</p><h2><strong>Humedad(Max)=</strong>12%</h2><p>&nbsp;</p><h2><strong>calcio(Min)=</strong>3%</h2><p>&nbsp;</p><h2><strong>Fosforo(Min)=</strong>0.90%</h2><ul><li>&nbsp;</li></ul>', 1, 20),
(2, 'Cerdo Desarrollo Alta Energia', 25, 'Mersan', 48, 1, 3, '<h2><strong>Analisis:</strong></h2><ul><li>&nbsp;</li></ul><h2><strong>proteína (Min)=</strong>17%</h2><p>&nbsp;</p><h2><strong>Grasa(Max)=</strong>8.20%</h2><p>&nbsp;</p><h2><strong>Fibra(Max)=5</strong>%</h2><p>&nbsp;</p><h2><strong>Humedad(Max)=</strong>12%</h2><p>&nbsp;</p><h2><strong>calcio(Min)=</strong>3.50%</h2><p>&nbsp;</p><h2><strong>Fosforo(Min)=</strong>0.60%</h2><ul><li>&nbsp;</li></ul>', 1, 40),
(3, 'Ponedora Postura (pico)', 10, 'Mersan', 26, 1, 3, '<h2><strong>Analisis:</strong></h2><ul><li>&nbsp;</li></ul><h2><strong>proteína (Min)=</strong>15%</h2><p>&nbsp;</p><h2><strong>Grasa(Max)=</strong>8%</h2><p>&nbsp;</p><h2><strong>Fibra(Max)=</strong>8%</h2><p>&nbsp;</p><h2><strong>Humedad(Max)=</strong>12%</h2><p>&nbsp;</p><h2><strong>calcio(Min)=</strong>3%</h2><p>&nbsp;</p><h2><strong>Fosforo(Min)=</strong>0.90%</h2>', 1, 40),
(4, 'Ivermectina de 10cc', 3, 'farmagro', 48, 1, 3, '<h2><strong>DESPARASITANTE</strong></h2>', 2, 0),
(5, 'Combecon', 6, 'Labrin', 50, 1, 4, '<p><strong>Polivitaminico&nbsp;</strong></p>', 2, 0.1),
(6, 'Ferron b12', 7, 'Calbos', 44, 1, 4, '<p>Hierro&nbsp;</p>', 2, 0.1),
(7, 'Iniciador puro lomo', 12, 'Delpatio ', 97, 1, 1, '', 1, 20),
(8, 'Alimento Para Bovinos', 40, 'Roalca', 50, 2, 3, '<h2><strong>Bovinos en General</strong></h2>', 1, 35),
(9, 'ponedoa', 20, 'Mezann', 39, 1, 3, '<p>hOLA MUNDO</p>', 1, 20);

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
(1, 'naudis Alexander ', 'garcia', '9611478', 'Masculino', '04245366490', 'la orquidea Calle 6, Barquisimeto 3001, Lara', 1),
(2, 'Mary Antonia', 'Garcia', '9611478', 'Masculino', '04265366490', 'la orquidea Calle 6, Barquisimeto 3001, Lara', 2),
(3, 'Josefrank', 'Lucena Vargas ', '15827458', 'Masculino', '04125107333', 'El Tostado, Barquisimeto 3001, Lara', 3),
(4, 'Tibisay Del Carmen ', 'Duran de Lucena ', '16237856', 'Femenino', '04125070405', 'El Tostado', 4),
(5, 'Klondy', 'Ocanto', '25157399', 'Femenino', '04267590001', 'Ruiz Pineda, Barquisimeto 3001, Lara', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `rig` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `rig`, `nombre`, `telefono`, `direccion`, `descripcion`) VALUES
(1, 'J407101293', 'AGROVENPOR, C.A', '02516796174', 'Las piedras,estado Yaracuy - Zona Postal 3203', 'Ventas de alimento al mayor '),
(2, 'J-31650960-5', 'SupleAgro C.A', '02512616985', 'Av. tricentenatio frente al liceo Efrain Colmenares', 'Ventas de Alimentos '),
(3, 'J-41096070-1', 'Global Agro', '04125451215', 'Ruiz pines', 'Ventas de alimento Al mayor para grandes y pequeños  animales '),
(4, 'J-31458011', 'FARMAGRO', '02432696509', 'San Juaquin de Turmero, Edo Aragua.', 'desparasitantes, antibióticos y vitaminas. ');

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
(11, 1, 3, 6),
(22, 2, 3, 3),
(39, 5, 3, 6),
(40, 5, 3, 4),
(41, 5, 3, 3),
(42, 5, 3, 1),
(43, 6, 3, 6),
(44, 6, 3, 5),
(45, 6, 3, 4),
(46, 6, 3, 3),
(47, 6, 3, 2),
(48, 6, 3, 1),
(49, 4, 3, 5),
(50, 4, 3, 3),
(51, 4, 3, 2),
(52, 4, 3, 1),
(53, 7, 3, 3),
(54, 3, 3, 6),
(56, 8, 3, 6),
(57, 9, 3, 5),
(58, 9, 3, 4);

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
(1, 'Canino', 'red'),
(2, 'Equino', 'green'),
(3, 'Porcino', 'indigo'),
(4, 'Caprino', 'blue'),
(5, 'Ovinos', 'yellow'),
(6, 'Bovinos', 'purple'),
(7, 'Conejo', 'pink');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id`, `nombre`) VALUES
(1, 'K'),
(2, 'L'),
(3, 'M');

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
(1, 'naudisgarcia51@gmail.com', '$2y$12$qEA/aTKfd5f2ZR.tz/0OyuQteBEQa9iB7Q5HLpgrycEiiHoIm5s62'),
(2, 'Garcia03c4@gmail.com', '$2y$12$tiE/HynX3BYKqEwaAzwB..GmoRaievBAeNCCbWlxJYIGdZDUhexaS'),
(3, 'luis00175@hotmail.com', '$2y$12$3mnVcLyec8pR5/SghQo3GeNWVzU1oYdBroVa7d7sCAlSg2cwhz/by'),
(4, 'streamingenius24@gmail.com', '$2y$12$3mnVcLyec8pR5/SghQo3GeNWVzU1oYdBroVa7d7sCAlSg2cwhz/by'),
(5, 'Klondy@Gmail.com', '$2y$12$4jLrJTr39l30edltmVaiouzmqiUHAYIYI3azkTpO5D7yNsPshxVb2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_role`
--

CREATE TABLE `user_role` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user_role`
--

INSERT INTO `user_role` (`id_user`, `id_role`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `productos` text NOT NULL,
  `total` float NOT NULL,
  `tipo_pago` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_cliente`, `id_user`, `productos`, `total`, `tipo_pago`, `fecha`, `descripcion`) VALUES
(1, 1, 1, '[{\"id\":\"1\",\"can\":5,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":2.5,\"Tipo_unidad\":\"Kg\"}]', 2, 'Tarjeta', '2021-07-04 19:51:21', ''),
(2, 1, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"15\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\"}]', 0.5, 'Tarjeta', '2021-07-04 19:54:51', ''),
(3, 1, 1, '[{\"id\":\"1\",\"can\":2,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"14\",\"Total\":1,\"Tipo_unidad\":\"Kg\"}]', 1, 'Tarjeta', '2021-07-04 19:57:12', ''),
(4, 1, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"12\",\"Total\":0.5,\"Tipo_unidad\":\"Kg\"}]', 0, 'Tarjeta', '2021-07-04 19:57:45', ''),
(5, 1, 1, '[{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":0.35,\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"0\",\"stockxSaco\":\"100\"}]', 0, 'Tarjeta', '2021-07-05 16:43:10', ''),
(6, 1, 1, '[{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"39\",\"stockxSaco\":\"100\",\"idxSaco\":\"3\"},{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"11\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"}]', 0.85, 'Tarjeta', '2021-07-05 16:55:56', ''),
(7, 2, 1, '[{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"0\",\"stockxSaco\":\"100\",\"idxSaco\":\"3\"},{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"11\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"}]', 0.85, 'Tarjeta', '2021-07-05 17:02:59', ''),
(8, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"11\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"},{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"0\",\"stockxSaco\":\"100\",\"idxSaco\":\"3\"}]', 0.85, 'Tarjeta', '2021-07-05 17:04:18', ''),
(9, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"20\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"},{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"39\",\"stockxSaco\":\"100\",\"idxSaco\":\"3\"}]', 0.85, 'Tarjeta', '2021-07-05 17:08:40', ''),
(10, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"20\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"},{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"39\",\"stockxSaco\":\"100\",\"idxSaco\":\"3\"}]', 0.85, 'Tarjeta', '2021-07-05 17:10:11', ''),
(11, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"20\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"},{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"39\",\"stockxSaco\":\"100\",\"idxSaco\":\"3\"}]', 0.85, 'Tarjeta', '2021-07-05 17:11:03', ''),
(12, 2, 1, '[{\"id\":\"1\",\"can\":2,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":1,\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"20\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"},{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"39\",\"stockxSaco\":\"100\",\"idxSaco\":\"3\"}]', 1, 'Tarjeta', '2021-07-05 17:11:17', ''),
(13, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"20\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"},{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"0\",\"stockxSaco\":\"100\",\"idxSaco\":\"3\"}]', 0.85, 'Tarjeta', '2021-07-05 17:13:29', ''),
(14, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"20\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"},{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"39\",\"stockxSaco\":\"100\",\"idxSaco\":\"3\"}]', 0.85, 'Tarjeta', '2021-07-05 17:19:48', ''),
(15, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"20\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"},{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"39\",\"stockxSaco\":\"100\",\"idxSaco\":\"3\"}]', 0.85, 'Tarjeta', '2021-07-05 17:21:35', ''),
(16, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"20\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"},{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"39\",\"stockxSaco\":\"100\",\"idxSaco\":\"3\"}]', 0.85, 'Tarjeta', '2021-07-05 17:23:12', ''),
(17, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"0\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"},{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"0\",\"stockxSaco\":\"100\",\"idxSaco\":\"3\"}]', 0.85, 'Tarjeta', '2021-07-05 17:31:26', ''),
(18, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"0\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"},{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"39\",\"stockxSaco\":\"100\",\"idxSaco\":\"3\"}]', 0.85, 'Tarjeta', '2021-07-05 17:45:48', ''),
(19, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"0\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"},{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"37\",\"stockxSaco\":\"100\",\"idxSaco\":\"3\"}]', 0.85, 'Tarjeta', '2021-07-05 17:48:11', ''),
(20, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"19\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"},{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"36\",\"stockxSaco\":\"100\",\"idxSaco\":\"3\"}]', 0.85, 'Tarjeta', '2021-07-05 17:48:32', ''),
(21, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"0\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"}]', 0.5, 'Tarjeta', '2021-07-05 18:09:52', ''),
(22, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"0\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"}]', 0.5, 'Tarjeta', '2021-07-05 18:10:55', ''),
(23, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"0\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"}]', 0.5, 'Tarjeta', '2021-07-05 18:11:34', ''),
(24, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"0\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"}]', 0.5, 'Tarjeta', '2021-07-05 18:12:06', ''),
(25, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"0\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"}]', 0.5, 'Tarjeta', '2021-07-05 18:12:14', ''),
(26, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"0\",\"stockxSaco\":\"200\",\"idxSaco\":\"1\"}]', 0.5, 'Tarjeta', '2021-07-05 18:12:28', ''),
(27, 2, 1, '[{\"id\":\"2\",\"can\":40,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":14,\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"35\",\"stockxSaco\":\"100\",\"idxSaco\":\"3\"}]', 14, 'Tarjeta', '2021-07-05 18:47:01', ''),
(28, 2, 1, '[{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"35\",\"stockxSaco\":\"99\",\"idxSaco\":\"3\"}]', 0.35, 'Tarjeta', '2021-07-05 18:48:02', ''),
(29, 2, 1, '[{\"id\":\"2\",\"can\":40,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":14,\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"34\",\"stockxSaco\":\"99\",\"idxSaco\":\"3\"}]', 14, 'Tarjeta', '2021-07-05 18:48:41', ''),
(30, 2, 1, '[{\"id\":\"2\",\"can\":40,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":14,\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"34\",\"stockxSaco\":\"98\",\"idxSaco\":\"3\"}]', 14, 'Tarjeta', '2021-07-05 18:49:11', ''),
(31, 2, 1, '[{\"id\":\"2\",\"can\":40,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":14,\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"34\",\"stockxSaco\":\"97\",\"idxSaco\":\"3\"}]', 14, 'Tarjeta', '2021-07-05 18:50:24', ''),
(32, 2, 1, '[{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"34\",\"stockxSaco\":\"96\",\"idxSaco\":\"3\"}]', 0.35, 'Tarjeta', '2021-07-05 18:50:39', ''),
(33, 2, 1, '[{\"id\":\"2\",\"can\":40,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":14,\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"33\",\"stockxSaco\":\"96\",\"idxSaco\":\"3\"}]', 14, 'Tarjeta', '2021-07-05 18:50:56', ''),
(34, 2, 1, '[{\"id\":\"3\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"10\",\"stock\":\"95\",\"Total\":\"10\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null},{\"id\":\"2\",\"can\":40,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":14,\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"33\",\"stockxSaco\":\"95\",\"idxSaco\":\"3\"}]', 24, 'Tarjeta', '2021-07-05 18:51:40', ''),
(35, 2, 1, '[{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"33\",\"stockxSaco\":\"93\",\"idxSaco\":\"3\"},{\"id\":\"3\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"10\",\"stock\":\"93\",\"Total\":\"10\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 10.35, 'Tarjeta', '2021-07-05 18:51:59', ''),
(36, 2, 1, '[{\"id\":\"2\",\"can\":20,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":7,\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"32\",\"stockxSaco\":\"92\",\"idxSaco\":\"3\"}]', 7, 'Tarjeta', '2021-07-06 10:00:00', ''),
(37, 2, 1, '[{\"id\":\"2\",\"can\":15,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":5.25,\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"12\",\"stockxSaco\":\"92\",\"idxSaco\":\"3\"}]', 5, 'Tarjeta', '2021-07-06 13:00:00', ''),
(38, 2, 1, '[{\"id\":\"2\",\"can\":0,\"nombre\":\"Cerdo Desarrollo Alta Energia\",\"marca\":\"Mersan\",\"precio\":\"25\",\"stock\":\"800\",\"Total\":0,\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 20, 'Credito', '2021-07-07 08:37:57', ''),
(39, 2, 1, '[{\"id\":\"1\",\"can\":0,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"8\",\"stock\":\"199\",\"Total\":0,\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 0, 'Tarjeta', '2021-07-07 18:41:15', ''),
(40, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"8\",\"stock\":\"199\",\"Total\":8,\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 8, 'Tarjeta', '2021-07-07 18:41:26', ''),
(41, 2, 1, '[]', 8, 'Tarjeta', '2021-07-07 18:42:13', ''),
(42, 2, 1, '[]', 8, 'Tarjeta', '2021-07-07 18:45:13', ''),
(43, 2, 1, '[]', 25, 'Tarjeta', '2021-07-07 18:45:36', ''),
(44, 2, 1, '[]', 0, 'Tarjeta', '2021-07-07 18:45:50', ''),
(45, 2, 1, '[]', 0, 'Tarjeta', '2021-07-07 18:47:10', ''),
(46, 2, 1, '[]', 25, 'Tarjeta', '2021-07-07 18:48:30', ''),
(47, 2, 1, '[]', 25, 'Tarjeta', '2021-07-07 18:48:35', ''),
(48, 2, 1, '[]', 25, 'Tarjeta', '2021-07-07 18:49:04', ''),
(49, 2, 1, '[]', 25, 'Tarjeta', '2021-07-07 18:49:09', ''),
(50, 2, 1, '[{\"id\":\"2\",\"can\":1,\"nombre\":\"Cerdo Desarrollo Alta Energia\",\"marca\":\"Mersan\",\"precio\":\"25\",\"stock\":\"800\",\"Total\":\"25\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 25, 'Tarjeta', '2021-07-07 18:49:57', ''),
(51, 2, 1, '[{\"id\":\"2\",\"can\":1,\"nombre\":\"Cerdo Desarrollo Alta Energia\",\"marca\":\"Mersan\",\"precio\":\"25\",\"stock\":\"800\",\"Total\":\"25\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 25, 'Tarjeta', '2021-07-07 18:50:22', ''),
(52, 2, 1, '[{\"id\":\"2\",\"can\":1,\"nombre\":\"Cerdo Desarrollo Alta Energia\",\"marca\":\"Mersan\",\"precio\":\"25\",\"stock\":\"800\",\"Total\":\"25\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 25, 'Tarjeta', '2021-07-07 18:50:25', ''),
(53, 2, 1, '[{\"id\":\"2\",\"can\":1,\"nombre\":\"Cerdo Desarrollo Alta Energia\",\"marca\":\"Mersan\",\"precio\":\"25\",\"stock\":\"800\",\"Total\":\"25\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 25, 'Tarjeta', '2021-07-07 18:51:04', ''),
(54, 2, 1, '[]', 25, 'Tarjeta', '2021-07-07 18:57:12', ''),
(55, 2, 1, '[]', 10, 'Tarjeta', '2021-07-07 18:57:34', ''),
(56, 2, 1, '[{\"id\":\"2\",\"can\":0,\"nombre\":\"Cerdo Desarrollo Alta Energia\",\"marca\":\"Mersan\",\"precio\":\"25\",\"stock\":\"799\",\"Total\":0,\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 0, 'Tarjeta', '2021-07-07 18:59:05', ''),
(57, 2, 1, '[{\"id\":\"2\",\"can\":3,\"nombre\":\"Cerdo Desarrollo Alta Energia\",\"marca\":\"Mersan\",\"precio\":\"25\",\"stock\":\"799\",\"Total\":75,\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 75, 'Tarjeta', '2021-07-07 19:00:52', ''),
(58, 2, 1, '[{\"id\":\"2\",\"can\":3,\"nombre\":\"Cerdo Desarrollo Alta Energia\",\"marca\":\"Mersan\",\"precio\":\"25\",\"stock\":\"799\",\"Total\":75,\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 75, 'Tarjeta', '2021-07-07 19:01:13', ''),
(59, 2, 1, '[{\"id\":\"2\",\"can\":3,\"nombre\":\"Cerdo Desarrollo Alta Energia\",\"marca\":\"Mersan\",\"precio\":\"25\",\"stock\":\"799\",\"Total\":75,\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 75, 'Tarjeta', '2021-07-07 19:01:47', ''),
(60, 2, 1, '[{\"id\":\"2\",\"can\":0,\"nombre\":\"Cerdo Desarrollo Alta Energia\",\"marca\":\"Mersan\",\"precio\":\"25\",\"stock\":\"799\",\"Total\":0,\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 0, 'Tarjeta', '2021-07-07 19:01:53', ''),
(61, 2, 1, '[]', 0, 'Tarjeta', '2021-07-07 19:02:57', ''),
(62, 2, 1, '[{\"can\":1,\"Total\":25},{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"8\",\"stock\":\"198\",\"Total\":\"8\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 33, 'Tarjeta', '2021-07-07 19:05:34', ''),
(63, 2, 1, '[{\"can\":1,\"Total\":25},{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"8\",\"stock\":\"198\",\"Total\":\"8\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 33, 'Tarjeta', '2021-07-07 19:06:13', ''),
(64, 2, 1, '[{\"id\":\"2\",\"can\":1,\"nombre\":\"Cerdo Desarrollo Alta Energia\",\"marca\":\"Mersan\",\"precio\":\"25\",\"stock\":\"799\",\"Total\":\"25\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 25, 'Tarjeta', '2021-07-07 19:06:40', ''),
(65, 2, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"8\",\"stock\":\"197\",\"Total\":\"8\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 8, 'Tarjeta', '2021-07-07 19:06:58', ''),
(66, 2, 1, '[{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"37\",\"stockxSaco\":\"91\",\"idxSaco\":\"3\"}]', 0.35, 'Tarjeta', '2021-07-07 19:07:44', ''),
(67, 2, 1, '{\"1\":{\"id\":\"3\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"10\",\"stock\":\"91\",\"Total\":\"10\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null},\"2\":{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"19\",\"stockxSaco\":\"196\",\"idxSaco\":\"1\"}}', 10.5, 'Tarjeta', '2021-07-07 19:09:31', ''),
(68, 1, 1, '[{\"id\":\"2\",\"can\":1,\"nombre\":\"Cerdo Desarrollo Alta Energia\",\"marca\":\"Mersan\",\"precio\":\"25\",\"stock\":\"798\",\"Total\":\"25\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null},{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"8\",\"stock\":\"196\",\"Total\":\"8\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 33, 'Tarjeta', '2021-07-08 11:54:41', ''),
(69, 3, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"8\",\"stock\":\"195\",\"Total\":\"8\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 8, 'Tarjeta', '2021-07-11 09:59:20', ''),
(70, 3, 1, '[{\"id\":\"2\",\"can\":1,\"nombre\":\"Cerdo Desarrollo Alta Energia\",\"marca\":\"Mersan\",\"precio\":\"25\",\"stock\":\"797\",\"Total\":\"25\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null},{\"id\":\"2\",\"can\":2,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":0.7,\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"36\",\"stockxSaco\":\"90\",\"idxSaco\":\"3\"},{\"id\":\"3\",\"can\":3,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"10\",\"stock\":\"90\",\"Total\":30,\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 55, 'Credito', '2021-07-11 19:06:46', ''),
(71, 3, 1, '[{\"id\":\"2\",\"can\":1,\"nombre\":\"Cerdo Desarrollo Alta Energia\",\"marca\":\"Mersan\",\"precio\":\"25\",\"stock\":\"796\",\"Total\":\"25\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 25, 'Divisa', '2021-07-12 11:07:41', ''),
(72, 3, 1, '[{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"18\",\"stockxSaco\":\"194\",\"idxSaco\":\"1\"},{\"id\":\"2\",\"can\":1,\"nombre\":\"Cerdo Desarrollo Alta Energia\",\"marca\":\"Mersan\",\"precio\":\"25\",\"stock\":\"795\",\"Total\":\"25\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 25.5, 'Tarjeta', '2021-07-12 14:07:54', ''),
(73, 3, 1, '[{\"id\":\"2\",\"can\":2,\"nombre\":\"Cerdo Desarrollo Alta Energia\",\"marca\":\"Mersan\",\"precio\":\"25\",\"stock\":\"26\",\"Total\":50,\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 50, 'Tarjeta', '2021-07-13 10:54:05', ''),
(74, 3, 1, '[{\"id\":\"3\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"10\",\"stock\":\"26\",\"Total\":\"10\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 10, 'Tarjeta', '2021-07-14 14:00:00', ''),
(75, 3, 1, '[{\"id\":\"2\",\"can\":1,\"nombre\":\"Cerdo Desarrollo Alta Energia\",\"marca\":\"Mersan\",\"precio\":\"25\",\"stock\":\"26\",\"Total\":\"25\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null},{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"34\",\"stockxSaco\":\"25\",\"idxSaco\":\"3\"},{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":\"0.5\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"17\",\"stockxSaco\":\"194\",\"idxSaco\":\"1\"}]', 55.85, 'Credito', '2021-07-15 08:38:19', ''),
(76, 4, 1, '[{\"id\":\"4\",\"can\":1,\"nombre\":\"Ivermectina de 10cc\",\"marca\":\"farmagro\",\"precio\":\"3\",\"stock\":\"10\",\"Total\":\"3\",\"Tipo_unidad\":\"Saco\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null},{\"id\":\"1\",\"can\":4,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":2,\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"16\",\"stockxSaco\":\"194\",\"idxSaco\":\"1\"},{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":0.35,\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"33\",\"stockxSaco\":\"26\",\"idxSaco\":\"3\"}]', 5, 'Tarjeta', '2021-07-15 22:44:49', ''),
(77, 3, 1, '{\"1\":{\"id\":\"2\",\"can\":1,\"nombre\":\"Cerdo Desarrollo Alta Energia\",\"marca\":\"Mersan\",\"precio\":\"25\",\"stock\":\"50\",\"Total\":\"25\",\"Tipo_unidad\":\"Cantidad\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null},\"2\":{\"id\":\"3\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"10\",\"stock\":\"26\",\"Total\":\"10\",\"Tipo_unidad\":\"Cantidad\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null},\"3\":{\"id\":\"2\",\"can\":1,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"0.35\",\"stock\":\"40\",\"Total\":\"0.35\",\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"32\",\"stockxSaco\":\"26\",\"idxSaco\":\"3\"}}', 35, 'Tarjeta', '2021-07-16 04:43:27', ''),
(78, 3, 2, '[{\"id\":\"2\",\"can\":1,\"nombre\":\"Cerdo Desarrollo Alta Energia\",\"marca\":\"Mersan\",\"precio\":\"25\",\"stock\":\"49\",\"Total\":\"25\",\"Tipo_unidad\":\"Cantidad\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null},{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"8\",\"stock\":\"194\",\"Total\":\"8\",\"Tipo_unidad\":\"Cantidad\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 33, 'Divisa', '2021-07-16 19:32:05', ''),
(79, 3, 5, '[{\"id\":\"3\",\"can\":5,\"nombre\":\"Ponedora Postura (pico)\",\"marca\":\"Mersan\",\"precio\":\"10\",\"stock\":\"25\",\"Total\":50,\"Tipo_unidad\":\"Cantidad\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null},{\"id\":\"1\",\"can\":1,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"8\",\"stock\":\"193\",\"Total\":\"8\",\"Tipo_unidad\":\"Cantidad\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 58, 'Tarjeta', '2021-07-16 15:30:15', ''),
(80, 1, 3, '[{\"id\":\"4\",\"can\":1,\"nombre\":\"Ivermectina de 10cc\",\"marca\":\"farmagro\",\"precio\":\"3\",\"stock\":\"50\",\"Total\":\"3\",\"Tipo_unidad\":\"Cantidad\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null},{\"id\":\"7\",\"can\":1,\"nombre\":\"Iniciador puro lomo\",\"marca\":\"Delpatio \",\"precio\":\"12\",\"stock\":\"100\",\"Total\":\"12\",\"Tipo_unidad\":\"Cantidad\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null},{\"id\":\"6\",\"can\":1,\"nombre\":\"Ferron b12\",\"marca\":\"Calbos\",\"precio\":\"7\",\"stock\":\"50\",\"Total\":\"7\",\"Tipo_unidad\":\"Cantidad\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 22, 'Otros', '2021-07-17 21:19:01', 'Pago movil $10\r\nefectivo $12 '),
(81, 3, 3, '{\"1\":{\"id\":\"7\",\"can\":1,\"nombre\":\"Iniciador puro lomo\",\"marca\":\"Delpatio \",\"precio\":\"12\",\"stock\":\"99\",\"Total\":\"12\",\"Tipo_unidad\":\"Cantidad\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null},\"2\":{\"id\":\"6\",\"can\":1,\"nombre\":\"Ferron b12\",\"marca\":\"Calbos\",\"precio\":\"7\",\"stock\":\"49\",\"Total\":\"7\",\"Tipo_unidad\":\"Cantidad\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}}', 19, 'Credito', '2021-07-17 21:38:52', ''),
(82, 1, 1, '[{\"id\":\"6\",\"can\":1,\"nombre\":\"Ferron b12\",\"marca\":\"Calbos\",\"precio\":\"7\",\"stock\":\"48\",\"Total\":\"7\",\"Tipo_unidad\":\"Cantidad\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null},{\"id\":\"4\",\"can\":1,\"nombre\":\"Ivermectina de 10cc\",\"marca\":\"farmagro\",\"precio\":\"3\",\"stock\":\"49\",\"Total\":\"3\",\"Tipo_unidad\":\"Cantidad\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 10, 'Divisa', '2021-07-17 22:40:26', ''),
(83, 5, 1, '{\"1\":{\"id\":\"6\",\"can\":1,\"nombre\":\"Ferron b12\",\"marca\":\"Calbos\",\"precio\":\"7\",\"stock\":\"47\",\"Total\":7,\"Tipo_unidad\":\"Cantidad\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null},\"2\":{\"id\":\"7\",\"can\":1,\"nombre\":\"Iniciador puro lomo\",\"marca\":\"Delpatio \",\"precio\":\"12\",\"stock\":\"98\",\"Total\":\"12\",\"Tipo_unidad\":\"Cantidad\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}}', 19, 'Transferencia', '2021-07-17 22:49:05', ''),
(84, 5, 5, '[{\"id\":\"6\",\"can\":2,\"nombre\":\"Ferron b12\",\"marca\":\"Calbos\",\"precio\":\"7\",\"stock\":\"46\",\"Total\":14,\"Tipo_unidad\":\"Cantidad\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null},{\"id\":\"1\",\"can\":10,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"0.5\",\"stock\":\"20\",\"Total\":5,\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"12\",\"stockxSaco\":\"192\",\"idxSaco\":\"1\"}]', 19, 'Credito', '2021-07-19 07:36:11', ''),
(85, 1, 5, '[{\"id\":\"8\",\"can\":20,\"nombre\":\"ponedoa\",\"marca\":\"Mezann\",\"precio\":\"1.1\",\"stock\":\"20\",\"Total\":22,\"Tipo_unidad\":\"Kg\",\"stockxUnidad\":\"0\",\"stockxSaco\":\"40\",\"idxSaco\":\"9\"},{\"id\":\"1\",\"can\":5,\"nombre\":\"Ponedora Casera\",\"marca\":\"Mersan\",\"precio\":\"8\",\"stock\":\"192\",\"Total\":40,\"Tipo_unidad\":\"Cantidad\",\"stockxUnidad\":null,\"stockxSaco\":null,\"idxSaco\":null}]', 62, 'Credito', '2021-07-19 09:39:23', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xunidad`
--

CREATE TABLE `xunidad` (
  `id` int(11) NOT NULL,
  `stock` float NOT NULL DEFAULT '0',
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `xunidad`
--

INSERT INTO `xunidad` (`id`, `stock`, `id_producto`) VALUES
(1, 2, 1),
(2, 31, 3),
(3, 0, 4),
(4, 0, 5),
(5, 0, 6),
(6, 0, 7),
(7, 0, 8),
(8, 0, 9);

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
-- Indices de la tabla `credito`
--
ALTER TABLE `credito`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_venta` (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`);

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
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_unidad` (`id_unidad`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rig` (`rig`);

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
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
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
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `xunidad`
--
ALTER TABLE `xunidad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_producto` (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `credito`
--
ALTER TABLE `credito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `taggables`
--
ALTER TABLE `taggables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `xunidad`
--
ALTER TABLE `xunidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `credito`
--
ALTER TABLE `credito`
  ADD CONSTRAINT `credito_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `credito_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`);

--
-- Filtros para la tabla `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`img_type`) REFERENCES `models` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id`);

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

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `xunidad`
--
ALTER TABLE `xunidad`
  ADD CONSTRAINT `xunidad_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
