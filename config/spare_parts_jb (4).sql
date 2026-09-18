-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2026 a las 21:34:26
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `spare_parts_jb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(3, 'Accesorios'),
(1, 'Cascos'),
(2, 'Repuestos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `imagen` varchar(255) DEFAULT 'default.png',
  `stock` int(11) DEFAULT 0,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `categoria_id` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `categoria`, `imagen`, `stock`, `fecha_creacion`, `categoria_id`) VALUES
(1, 'Casco Certificado DOT / ECE', 'Casco integral de alta resistencia con visera antirrayones', 280000.00, 'cascos', 'casco.png', 10, '2026-08-29 21:51:13', 1),
(2, 'Batería de Gel 12V Magna', 'Batería libre de mantenimiento de alto rendimiento', 115000.00, 'repuestos', 'bateria.png', 15, '2026-08-29 21:51:13', 2),
(3, 'Guantes de Protección Cuero', 'Guantes con protección en nudillos y agarre antideslizante', 65000.00, 'accesorios', 'guantes.png', 20, '2026-08-29 21:51:13', 3),
(5, 'Disco y Pastillas de Freno', 'Kit de frenado cerámico de alta disipación térmica', 135000.00, 'repuestos', 'frenos.png', 8, '2026-08-29 21:51:13', 2),
(6, 'FRENOS BREMBO YAMAHA MT', 'RHKRJHÑL', 500000.00, 'Repuestos', '1788055554_images.png.jpg', 10, '2026-08-30 02:05:54', 1),
(7, 'espejos', 'hkfbhkjf', 30000.00, 'Repuestos', '1788056131_images.jpg', 10, '2026-08-30 02:15:31', 1),
(8, 'MONO TRAJE ', 'RGTJ', 2000000.00, 'Accesorios', '1788056192_images (1).jpg', 5, '2026-08-30 02:16:32', 1),
(9, 'LLANTAS MICHELIN', 'WGE', 600000.00, 'Accesorios', '1788056894_images (2).jpg', 10, '2026-08-30 02:28:14', 1),
(10, 'N MAX', 'PARA JACOBS', 21000000.00, 'Accesorios', '1788374349_images (9).jfif', 1, '2026-09-02 18:39:09', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `nit` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `nit`, `telefono`, `email`, `direccion`, `creado_en`) VALUES
(1, 'BAJAN', 'NIT 901.261.048-0', '3204156662', 'customerservice@bajajauto.co.in', 'Av. 1 de Mayo #27 - 41 ', '2026-09-02 20:23:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('cliente','admin') DEFAULT 'cliente',
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol`, `fecha_creacion`) VALUES
(1, 'YESICA RENDON', 'yesica@gmail.com', '$2y$10$4rrqLzr4f45cw.uvG.j.AuIGx6G9bBfTjubpcG2Yuh82OtgOR1/fS', 'cliente', '2026-08-29 22:33:32'),
(2, 'BRAYAN RENDON', 'brayanahincapierendon@gmail.com', '$2y$10$Zslvlr8ucuk7B5mEoi1UMeSWR611omdZ2z/ZnzVg.KFnFVtAAq2Dq', 'cliente', '2026-08-29 23:20:59'),
(3, 'DILAN VELASQUEZ', 'dilan@gmail.com', '$2y$10$XvC.LR7SenTU7WzQzb4r9ua5AIqRUuzKfUG54xTWFTfIrTeV0Lxkm', 'cliente', '2026-08-30 02:13:36'),
(4, 'MARIA VELASQUEZ', 'maria@gmail.com', '$2y$10$VVIPhwmERJr06bDjkTsZc..oSxYmp.NvTyIRg1A5HvQ7/AUUhIs6C', 'cliente', '2026-08-30 02:45:36'),
(5, 'JACOBS CARRILLO', 'carrillo@gmail.com', '$2y$10$.cPPpSjPnAbddwZgQtZNcexzfrg0p3LrByC2DUkFjY4R2m1FfLBwC', 'cliente', '2026-09-02 18:30:29'),
(6, 'JACOBS', 'camilo@gmail.com', '$2y$10$t8fg3noPsmEt83QNjZeE5.mjQBD/pkJaDPxEt/nGyc9gh6cAlLgfS', 'cliente', '2026-09-02 18:31:00'),
(7, 'JACOBS', 'jacobs@gmail.com', '$2y$10$pm03t1ofRLqWgWbmK5/B1.FU4/Py0F0FwgViUeP4Fi2AfTeFemt9W', 'cliente', '2026-09-02 18:31:36');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
