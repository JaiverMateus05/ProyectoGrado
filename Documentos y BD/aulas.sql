-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2022 a las 22:30:51
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
(6, 'pruebaDoc', 1, 'Vistas/Archivos/1-498.doc'),
(13, 'Archivo de practica', 9, 'Vistas/Archivos/9-673.doc'),
(14, 'GNS3 ', 10, 'Vistas/Archivos/10-492.pdf'),
(15, 'TCP/IP ', 11, 'Vistas/Archivos/11-249.pdf'),
(17, 'Solucion de laboratorio ', 13, 'Vistas/Archivos/13-947.pdf'),
(19, 'archivo 1', 15, ''),
(27, 'Archivo prueba', 17, 'Vistas/Archivos/17-101.pdf'),
(28, 'imf', 1, 'Vistas/Archivos/1-196.jpg'),
(29, 'prueba', 1, 'Vistas/Archivos/1-797.docx'),
(30, 'prueba pdf', 1, 'Vistas/Archivos/1-658.pdf'),
(31, 'GNS3 ', 18, 'Vistas/Archivos/18-463.pdf'),
(32, 'Protocolo TCP/IP y NAT', 19, 'Vistas/Archivos/19-824.pdf');

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
(5, 'Telematica  ', 1, 9),
(6, 'Introduccion a la carrera', 5, 11),
(7, 'telematica 2', 2, 2),
(8, 'redes 1', 1, 13),
(9, 'redes 2', 1, 13),
(10, 'Programación 3', 1, 14),
(11, 'Telemática ', 1, 2);

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
(3, 'Ingeniería ambiental '),
(5, 'Ingeniería de petroleos');

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
(4, 1, 5, 1, 'Vistas/Entregas/1-1-581.doc'),
(5, 9, 12, 9, 'Vistas/Entregas/9-9-749.doc'),
(6, 1, 3, 1, 'Vistas/Entregas/1-1-158.pdf'),
(7, 1, 3, 1, 'Vistas/Entregas/1-1-532.png'),
(12, 16, 3, 16, 'Vistas/Entregas/16-16-858.png'),
(13, 4, 3, 19, 'Vistas/Entregas/4-19-934.docx'),
(14, 1, 3, 1, 'Vistas/Entregas/1-1-716.pdf'),
(15, 17, 15, 20, 'Vistas/Entregas/17-20-574.pdf');

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
(7, 12, 6),
(12, 3, 7),
(15, 3, 8),
(16, 3, 9),
(17, 3, 3),
(18, 15, 10);

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
(4, 1, 1, 4, '3', 'Pendiente'),
(5, 9, 9, 5, '5', 'Aprobado'),
(6, 1, 1, 6, '3.1', 'Pendiente'),
(7, 1, 1, 7, '2.3', 'Pendiente'),
(12, 16, 16, 12, '4.5', 'Aprobado'),
(13, 4, 19, 13, '5', 'Pendiente'),
(14, 1, 1, 14, '', 'Pendiente'),
(15, 17, 20, 15, '4', 'Aprobado');

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
(1, 1, 'nueva prueba', '<p>Prueba subida documento<img alt=\"\" src=\"https://th.bing.com/th/id/R.6923e459f39ca4b281692fc238311f47?rik=XSaqme8I1SSPlA&amp;riu=http%3a%2f%2fwww.fbphoto.net%2fwp-content%2fuploads%2f2017%2f08%2fDalias2.jpg&amp;ehk=D8o%2f4s7EdYYqTPgjP92LPwLAR8IH7wCbhfqh9zdSv9U%3d&amp;risl=&amp;pid=ImgRaw&amp;r=0\" style=\"height:100px; width:150px\" />&nbsp;<img alt=\"Ver las imágenes de origen\" src=\"https://th.bing.com/th/id/R.b2ab43b35f2c62cdcb137207e8c1aba7?rik=7Pv0RHj5D8fh2A&amp;riu=http%3a%2f%2fwww.photo-go.com%2fwp-content%2fuploads%2f2021%2f05%2fPicture-010a.jpg&amp;ehk=M%2fP2C8Cuh2h1FxvOtJGCrSUmFQgej%2fyr07%2f2ep%2bRdnU%3d&amp;risl=&amp;pid=ImgRaw&amp;r=0\" style=\"height:75px; width:100px\" />&nbsp;</p>\r\n'),
(3, 3, 'Nueva Seccion', ''),
(4, 1, 'Nueva Seccion', ''),
(9, 6, 'Seccion de prueba', '<p>Esta es una seccion de prueba para el sistema</p>\r\n'),
(10, 5, 'Manual de instalacion GNS3', '<p>En esta seccion se subira el&nbsp;documeto&nbsp;correspondiente&nbsp;a la instalacion del simulador GNS3</p>\r\n'),
(11, 5, 'TCP/IP Y NAT', '<p>Este documento trata sobre TCP/IP y sobre los diferentes tipos de NAT</p>\r\n'),
(12, 5, 'Primer laboratorio', '<p>Primer laboratorio del aula, en este documento se evaluaran los conocimietos del temario visto</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(13, 5, 'Solucion laboratorio', '<p>Para poder dar una retroalimentacion del laboratorio se dara la solucion de este, en el cual se demostrara la solucion del ejercicio practico</p>\r\n'),
(14, 7, 'primer tema', '<p>primer archivo del aula</p>\r\n'),
(15, 8, 'Introduccion a las redes', '<p>inicio en el mundo de las redes</p>\r\n'),
(16, 8, 'primer corte', '<p>redes peque&ntilde;as</p>\r\n'),
(17, 10, 'Primer tema', '<p>En esta es la primer tarea del aula</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(18, 11, 'GNS3', '<p>En esta seccion se incluira un documento con respecto a gns3 y su instalacion&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(19, 11, 'TCP/IP Y NAT', '<p>En esta seccion se guardaran los documentos con respecto a la tematica TCP/IP y NAT respectivamente para su acceso.</p>\r\n');

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
(2, 1, 1, 'tp', 'Vistas/Tareas/1-1-717.doc'),
(3, 9, 9, 'Tarea 1', 'Vistas/Tareas/9-9-439.doc'),
(4, 12, 10, 'Laboratorio TCP/IP y NAT', 'Vistas/Tareas/12-10-963.pdf'),
(6, 16, 16, 'imagen topologia 2', 'Vistas/Tareas/16-16-743.png'),
(7, 4, 18, 'programacion ', 'Vistas/Tareas/4-18-91.doc'),
(8, 4, 19, 'Documento PDF', 'Vistas/Tareas/4-19-479.pdf'),
(9, 3, 4, 'descripción 1', 'Vistas/Tareas/3-4-104.docx'),
(10, 3, 4, 'descripción 1', 'Vistas/Tareas/3-4-484.docx'),
(11, 3, 4, 'tarea 12', 'Vistas/Tareas/3-4-231.docx'),
(12, 3, 4, 'tarea 12', 'Vistas/Tareas/3-4-690.docx'),
(13, 17, 20, 'Tarea de prueba', 'Vistas/Tareas/17-20-883.docx'),
(14, 19, 21, 'Practica de laboratorio NAT', 'Vistas/Tareas/19-21-96.pdf');

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
(1, 1, 'tarea 32', '<p>safdjksafjdskafjdksaf</p>\r\n', '2022-10-30T23:23'),
(3, 3, 'Nueva Tarea', '', '2021-11-10'),
(4, 3, 'Nueva Tarea', '', '2021-11-25'),
(9, 9, 'Tarea N°1', '<p>Esta es la primer tarea del aula</p>\r\n', '2022-05-20'),
(10, 12, 'Primer laboratorio', '', ''),
(11, 10, 'Nueva Tarea', '', ''),
(15, 15, 'topologia 1', '<p>elaborar una topologia base para la coneccion de equipos capa&nbsp;</p>\r\n', '2022-10-11'),
(16, 16, 'topologia 2', '<p>elaborar topologia 2 de acerdo a la image adjunta</p>\r\n', '2022-10-15'),
(18, 4, 'Nueva Tarea', '', ''),
(19, 4, 'Tarea N° 2', '<p>Descripcion tarea N&deg; 2</p>\r\n', '2022-10-24'),
(20, 17, 'Primer tarea ', '<p>Descripcion de la tarea</p>\r\n', '2022-11-05T11:00'),
(21, 19, 'Practica de laboratorio', '<p>Primer practica de laboratorio, en este documeto se realizara un ejemplo de configuracion de dispositivos para una NAT.</p>\r\n', '2022-11-14T18:50');

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
(2, 'pedro1', '123', 'Pedro', 'Perez', '412432', 0, 'Vistas/img/Usuarios/U-177.jpg', 'Profesor'),
(3, 'jaiver1', '123', 'Jaiver', 'Mateus', '3454246', 1, '', 'Estudiante'),
(4, 'camilo1', '123', 'Camilo', 'Marin', '1939218', 1, '', 'Estudiante'),
(5, 'martin2', '123', 'Pedro', 'Martin', '9483728', 2, '', 'Estudiante'),
(7, 'admin', '123', 'jaiver', 'Mateus', '9139238', 0, '', 'Administrador'),
(9, 'mauro123', '123', 'Mauro', 'Caceres', '82374829', 0, '', 'Profesor'),
(10, 'camilo123', 'camilo', 'Alejando', 'Camilo', '198773920', 0, '', 'Profesor'),
(11, 'javier123', 'javier', 'Javier', 'Caceres', '1977392032', 0, '', 'Profesor'),
(12, 'perez1', 'perez', 'Alejandro', 'Perez', '1883900332', 5, '', 'Estudiante'),
(13, 'walfonso', '123456', 'Wilson', 'Alfonso Alvarado', '99999999', 0, '', 'Profesor'),
(14, 'marcop123', 'marco', 'Marco Andres', 'Perez Ruiz', '1234556', 0, '', 'Profesor'),
(15, 'estudiante123', '123', 'Andres', 'Martinez', '2837282', 2, '', 'Estudiante');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `entregas`
--
ALTER TABLE `entregas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
