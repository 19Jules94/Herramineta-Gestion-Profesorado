-- phpMyAdmin SQL Dump 
-- version 5.1.1 
-- https://www.phpmyadmin.net/ 
-- 
-- Servidor: 127.0.0.1 
-- Tiempo de generación: 17-10-2021 a las 15:18:25 
-- Versión del servidor: 10.4.21-MariaDB 
-- Versión de PHP: 8.0.11 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"; 
START TRANSACTION; 
SET time_zone = "+00:00"; 
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */; /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */; /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */; /*!40101 SET NAMES utf8mb4 */; 
-- 
-- Base de datos: `sced` 
CREATE DATABASE minisced;

USE minisced;

-- 
-- -------------------------------------------------------- 
-- 
-- Estructura de tabla para la tabla `accion` 
-- 
CREATE TABLE `accion` ( 
 `id` int(10) NOT NULL, 
 `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,  `borrado` tinyint(1) NOT NULL DEFAULT 0 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; 
-- 
-- Volcado de datos para la tabla `accion` 
-- 
INSERT INTO `accion` (`id`, `nombre`, `descripcion`, `borrado`) VALUES (1, 'ADD', 'Se anade un valor', 0), 
(2, 'DELETE', 'Se borra un valor', 0), 
(3, 'EDIT', 'Se edita un valor', 0), 
(4, 'SHOWCURRENT', 'Se muestra un valor en detalle', 0), (5, 'SHOWALL', 'Muestra todos los valores requeridos', 0), (6, 'SEARCH', 'Busqueda por campos', 0), 
(7, 'ASISTENCIA', 'Marcar asistencia', 0); 
-- -------------------------------------------------------- 

-- Estructura de tabla para la tabla `usuario` 
-- 
CREATE TABLE `usuario` ( 
 `dni` varchar(9) COLLATE utf8_spanish_ci NOT NULL, 
 `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,  `apellidos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,  `email` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,  `password` varchar(128) COLLATE utf8_spanish_ci DEFAULT NULL,  `borrado` tinyint(1) NOT NULL DEFAULT 0 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; 
-- 
-- Volcado de datos para la tabla `usuario` 
-- 
INSERT INTO `usuario` (`dni`, `nombre`, `apellidos`, `email`, `password`,  `borrado`) VALUES 
('12345670B', 'Pepe', 'Sanchez', 'pepe@email.com',  
'926e27eecdbc7a18858b3798ba99bddd', 0), 
('12345678L', 'Admin', 'Apellidos Admin', 'admin@email.com',  '21232f297a57a5a743894a0e4a801fc3', 0), 
('12345679B', 'Carlos', 'Perez', 'carlos@email.com',  
'dc599a9972fde3045dab59dbd1ae170b', 0), 
('12345745C', 'Juan', 'Lopez', 'juan@email.com',  
'a94652aa97c7211ba8954dd15a3cf838', 0), 
('12549535E', 'Javier', 'Rodeiro', 'javier@email.com',  
'3c9c03d6008a5adf42c2a55dd4a1a9f2', 0), 
('23432343F', 'Fernando', 'Mondo', 'fer@email.com',  
'90eb8760c187a2097884ed4c9ffbb6a4', 0), 
('34534543R', 'Luisa', 'Monte', 'luisa@email.com',  
'327229a1f11cc3c7ce66ee5d1341ae51', 0), 
('42641234F', 'Fran', 'Barros', 'fran@email.com',  
'2c20cb5558626540a1704b1fe524ea9a', 0), 
('45627896T', 'Pedro', 'Diaz', 'pedro@email.com',  
'c6cc8094c2dc07b700ffcc36d64e2138', 0),
('56874952B', 'Maria', 'Giraldez', 'maria@email.com',  '263bce650e68ab4e23f28263760b9fa5', 0), 
('77151036C', 'Antonio', 'Fernandez', 'antonio@email.com',  '4a181673429f0b6abbfd452f0f3b5950', 0), 
('87687264F', 'Roberto', 'Justo', 'roberto@email.com',  'c1bfc188dba59d2681648aa0e6ca8c8e', 0), 
('91376283C', 'Julio', 'Perez', 'julio@email.com',  'c027636003b468821081e281758e35ff', 0), 
('96578631R', 'Laura', 'Ferreiro', 'laura@email.com',  '680e89809965ec41e64dc7e447f175ab', 0); 
-- -------------------------------------------------------- 
-- 

-- 
-- Índices para tablas volcadas 
-- 
-- 
-- Indices de la tabla `accion` 
-- 
ALTER TABLE `accion` 
 ADD PRIMARY KEY (`id`); 
-- 

-- Indices de la tabla `usuario` 
-- 
ALTER TABLE `usuario` 
 ADD PRIMARY KEY (`dni`), 
 ADD UNIQUE KEY `email` (`email`); 
-- 
