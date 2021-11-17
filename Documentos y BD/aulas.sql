-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2021 a las 02:01:42
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aulas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `archivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `nombre`, `id_seccion`, `archivo`) VALUES
(2, 'prueba 2', 1, 'Vistas/Archivos/121.pdf'),
(6, 'pruebaDoc', 1, 'Vistas/Archivos/1-498.doc'),
(7, 'otraprueba', 1, 'Vistas/Archivos/1-627.doc'),
(9, 'TCP/IP Y NAT', 5, 'Vistas/Archivos/5-173.doc'),
(10, 'gns3', 6, 'Vistas/Archivos/6-79.doc'),
(11, 'topologia gns3', 7, 'Vistas/Archivos/7-710.doc'),
(12, 'NAT GNS3 IPV4 - IPV6', 8, 'Vistas/Archivos/8-930.doc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `id` int(11) NOT NULL,
  `materia` text NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id`, `materia`, `id_carrera`, `id_profesor`) VALUES
(1, 'Programación ', 1, 2),
(3, 'Programacion 2', 1, 2),
(5, 'Telematica  ', 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`) VALUES
(1, 'Ingenieria de sistemas'),
(2, 'Ingeniería Industrial '),
(3, 'Ingeniería ambiental ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregas`
--

CREATE TABLE `entregas` (
  `id` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `tarea_alumno` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entregas`
--

INSERT INTO `entregas` (`id`, `id_seccion`, `id_alumno`, `id_tarea`, `tarea_alumno`) VALUES
(1, 1, 3, 1, 'Vistas/Entregas/1-892.doc'),
(2, 1, 3, 1, 'Vistas/Entregas/1-346.doc'),
(3, 1, 3, 1, 'Vistas/Entregas/1-1-718.doc'),
(4, 1, 5, 1, 'Vistas/Entregas/1-1-581.doc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `id_alumno`, `id_aula`) VALUES
(2, 3, 1),
(3, 3, 4),
(4, 4, 1),
(5, 5, 1),
(6, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `id_entrega` int(11) NOT NULL,
  `nota` text NOT NULL,
  `estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `id_seccion`, `id_tarea`, `id_entrega`, `nota`, `estado`) VALUES
(1, 1, 1, 1, '4', 'Aprobado'),
(2, 1, 1, 2, '2', 'Reprobado'),
(3, 1, 1, 3, '3', 'Aprobado'),
(4, 1, 1, 4, '', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `id_aula`, `nombre`, `descripcion`) VALUES
(1, 1, 'nueva prueba', '<p>Prueba subida documento</p>\r\n'),
(3, 3, 'Nueva Seccion', ''),
(4, 1, 'Nueva Seccion', ''),
(5, 5, 'TCP/IP Y NAT', '<p>En esta seccion se pondra a disposicion de los estudiantes los temas correspondientes a el protocolo TCP/IP y los diversos tipos de NAT</p>\r\n'),
(6, 5, 'Instalacion de GNS3', '<p>En esta seccion se describe el proceso de instalacion del programa de simulacion gns3</p>\r\n'),
(7, 5, 'Primera topologia GNS3', '<p>En esta seccion se pondra a disposicion un documento en el que se evidenciara la primera topologia en el programa de simulacion gns3</p>\r\n'),
(8, 5, 'Documentacion ipv4 - ipv6', '<p>En esta seccion se pondra a disposicion de los estudiantes todo el contenido con respecto a la traduccion de direcciones ipv4 - ipv6 por medio de la herramienta de simulacion gns3</p>\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `tarea` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id`, `id_seccion`, `id_tarea`, `nombre`, `tarea`) VALUES
(1, 1, 1, 'prueba tarea arc', 'Vistas/Tareas/415.doc'),
(2, 1, 1, 'tp', 'Vistas/Tareas/1-1-717.doc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_limite` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `id_seccion`, `nombre`, `descripcion`, `fecha_limite`) VALUES
(1, 1, 'prueba tarea', '<p>prueba tarea</p>\r\n', '2021-11-01'),
(3, 3, 'Nueva Tarea', '', '2021-11-10'),
(4, 3, 'Nueva Tarea', '', '2021-11-25'),
(7, 1, 'Nueva Tarea', '', '0000-00-00'),
(8, 4, 'Nueva Tarea', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` text NOT NULL,
  `clave` text NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `documento` text NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `foto` text NOT NULL,
  `rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `nombre`, `apellido`, `documento`, `id_carrera`, `foto`, `rol`) VALUES
(2, 'pedro1', '123', 'Pedro', 'Perez', '412432', 0, '', 'Profesor'),
(3, 'jaiver1', '123', 'Jaiver', 'Mateus', '3454246', 1, '', 'Estudiante'),
(4, 'camilo1', '123', 'Camilo', 'Marin', '1939218', 1, '', 'Estudiante'),
(5, 'martin2', '123', 'Pedro', 'Martin', '9483728', 2, '', 'Estudiante'),
(7, 'admin', '123', 'jaiver', 'Mateus', '9139238', 0, '', 'Administrador'),
(9, 'mauro123', 'mauroca', 'Mauro', 'Caceres', '82374829', 0, '', 'Profesor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `entregas`
--
ALTER TABLE `entregas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
