-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2019 a las 02:47:22
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
-- Base de datos: `login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrucel`
--

CREATE TABLE `carrucel` (
  `idaccidente` int(11) NOT NULL,
  `meses` varchar(80) DEFAULT NULL,
  `accidentes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrucel`
--

INSERT INTO `carrucel` (`idaccidente`, `meses`, `accidentes`) VALUES
(1, 'enero', 42),
(2, 'febrero', 2),
(3, 'marzo', 9),
(4, 'abril', 15),
(5, 'mayo', 17),
(6, 'junio', 55),
(7, 'julio', 59),
(8, 'agosto', 12),
(9, 'septiembre', 25),
(10, 'octubre', 42),
(11, 'noviembre', 85),
(12, 'diciembre', 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_accidente`
--

CREATE TABLE `tb_accidente` (
  `ID_Acci` int(11) NOT NULL,
  `Acc_Fecha` date DEFAULT NULL,
  `Acc_Desc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_accidente`
--

INSERT INTO `tb_accidente` (`ID_Acci`, `Acc_Fecha`, `Acc_Desc`) VALUES
(324, '2017-10-10', 'fractura de brazo izquierdo'),
(745, '2018-02-22', 'caida en las escaleras'),
(785, '2019-01-22', 'atropellamiento por traspaleta'),
(963, '2019-05-05', 'caida por estibas'),
(1478, '2019-06-10', 'cortada por bisturi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_area`
--

CREATE TABLE `tb_area` (
  `ID_Area` int(11) NOT NULL,
  `TB_Empleados_ID_Empleado` int(11) NOT NULL,
  `Are_Nom` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_area`
--

INSERT INTO `tb_area` (`ID_Area`, `TB_Empleados_ID_Empleado`, `Are_Nom`) VALUES
(9, 107564113, 'PICKING'),
(70, 107315487, 'CROSS DOCKING');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_area_tiene_tb_con_ins`
--

CREATE TABLE `tb_area_tiene_tb_con_ins` (
  `TB_Area_ID_Area` varchar(100) NOT NULL,
  `Tb_Con_Ins_ID_Con_ins` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_area_tiene_tb_con_ins`
--

INSERT INTO `tb_area_tiene_tb_con_ins` (`TB_Area_ID_Area`, `Tb_Con_Ins_ID_Con_ins`) VALUES
('CROSS DOCKING', 'EN LOS BAÑOS PISO MOJADO'),
('PICKING', 'EN EL AREA DE PICKING');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_con_ins`
--

CREATE TABLE `tb_con_ins` (
  `ID_Con_ins` int(11) NOT NULL,
  `Con_Nombre` varchar(20) DEFAULT NULL,
  `Con_Desc` varchar(100) DEFAULT NULL,
  `Con_img` varchar(50) DEFAULT NULL,
  `Con_Fecha` date DEFAULT NULL,
  `Con_estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_con_ins`
--

INSERT INTO `tb_con_ins` (`ID_Con_ins`, `Con_Nombre`, `Con_Desc`, `Con_img`, `Con_Fecha`, `Con_estado`) VALUES
(12, 'DESPACHOS', 'EN EL AREA DE DESPACHOS', 'JPG', '2016-07-21', 'SOLUCIONADO'),
(15, 'zona B', 'EN EL PASILLO 34 DE LA ZONA B', 'JPG', '2010-12-07', 'SOLUCIONADO'),
(54, 'PICKING', 'EN EL AREA DE PICKING', 'JPG', '2016-06-22', 'EN PROCESO'),
(78, 'BAÑOS', 'EN LOS BAÑOS PISO MOJADO', 'JPG', '2015-05-06', 'EN PROCESO'),
(79, 'CAFETERIA', 'EN LA CAFETERIA HAY UN CABLE PELADO', 'GIF', '2010-11-06', 'EN PROCESO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_empleados`
--

CREATE TABLE `tb_empleados` (
  `ID_Empleado` int(11) NOT NULL,
  `Emp_Nombre` varchar(20) NOT NULL,
  `Emp_Apellido` varchar(20) NOT NULL,
  `Emp_Correo` varchar(50) NOT NULL,
  `Emp_telefono` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_empleados`
--

INSERT INTO `tb_empleados` (`ID_Empleado`, `Emp_Nombre`, `Emp_Apellido`, `Emp_Correo`, `Emp_telefono`) VALUES
(103045789, 'Diana', 'Cuellar', 'dianacuellar1985@outlook.com', '3226854123'),
(103045790, 'Carlos', 'Rodriguez', 'carlosrodriguez64@hotmail.com', '3135698574'),
(104578965, 'Jose', 'Manuel', 'josemanuel@gmail.com', '3187416975'),
(107315487, 'El brayan', 'Cardenas', 'brayannell@gmail.com', '3123457896'),
(107564113, 'Camilo', 'Varela', 'camilitoteamo@hotmail.com', '3125293588');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_empleados_supervisa_tb_area`
--

CREATE TABLE `tb_empleados_supervisa_tb_area` (
  `TB_Empleados_ID_Empleado` int(11) NOT NULL,
  `TB_Area_ID_Area` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_empleados_supervisa_tb_area`
--

INSERT INTO `tb_empleados_supervisa_tb_area` (`TB_Empleados_ID_Empleado`, `TB_Area_ID_Area`) VALUES
(107315487, '9'),
(107564113, '9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_empleados_tiene_tb_accidente`
--

CREATE TABLE `tb_empleados_tiene_tb_accidente` (
  `TB_Empleados_ID_Empleado` varchar(12) NOT NULL,
  `TB_accidente_ID_Acci` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_empleados_tiene_tb_accidente`
--

INSERT INTO `tb_empleados_tiene_tb_accidente` (`TB_Empleados_ID_Empleado`, `TB_accidente_ID_Acci`) VALUES
('107315487', '324'),
('107564113', '795');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_empleados_tiene_tb_incapacidad`
--

CREATE TABLE `tb_empleados_tiene_tb_incapacidad` (
  `TB_Empleados_ID_Empleado` varchar(12) NOT NULL,
  `TB_Incapacidad_ID_inca` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_empleados_tiene_tb_incapacidad`
--

INSERT INTO `tb_empleados_tiene_tb_incapacidad` (`TB_Empleados_ID_Empleado`, `TB_Incapacidad_ID_inca`) VALUES
('107315487', '97474'),
('107564113', '95874');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_historico`
--

CREATE TABLE `tb_historico` (
  `ID_Con_ins` varchar(12) NOT NULL,
  `Con_Nombre` varchar(20) DEFAULT NULL,
  `Con_Desc` varchar(100) DEFAULT NULL,
  `Con_img` varchar(50) DEFAULT NULL,
  `Con_Fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_historico`
--

INSERT INTO `tb_historico` (`ID_Con_ins`, `Con_Nombre`, `Con_Desc`, `Con_img`, `Con_Fecha`) VALUES
('5458714', 'CABLE SUELTO', 'EN EL AREA DE PICKING', 'JPG', '2016-06-22'),
('4278831', 'PISO MOJADO', 'EN LOS BAÑOS PISO MOJADO', 'GIF', '2015-05-06'),
('4786412', 'VALDOZA SUELTA', 'EN EL AREA DE DESPACHOS', 'GIF', '2016-07-21'),
('4551236', 'CORTO ELECTRICO', 'EN LA CAFETERIA HAY UN CABLE PELADO', 'GIF', '2010-11-06'),
('7896541', 'MONTACARGA ATRAVE', 'EN EL PASILLO 34 DE LA ZONA B', 'JPG', '2016-12-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_incapacidad`
--

CREATE TABLE `tb_incapacidad` (
  `ID_inca` varchar(12) NOT NULL,
  `TB_accidente_ID_Acci` varchar(12) NOT NULL,
  `Inc_fecha` date DEFAULT NULL,
  `Inc_Dias` int(10) UNSIGNED DEFAULT NULL,
  `Inc_Tipo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_incapacidad`
--

INSERT INTO `tb_incapacidad` (`ID_inca`, `TB_accidente_ID_Acci`, `Inc_fecha`, `Inc_Dias`, `Inc_Tipo`) VALUES
('84124', '745821', '2017-11-24', 17, 'EPS'),
('95874', '745821', '2012-10-05', 12, 'ARL'),
('95964', '745821', '2009-02-05', 20, 'ARL'),
('97474', '745821', '2014-10-05', 10, 'ARL'),
('98574', '745821', '2015-04-17', 23, 'EPS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_incidente`
--

CREATE TABLE `tb_incidente` (
  `ID_Inc` varchar(12) NOT NULL,
  `TB_Empleados_ID_Empleado` varchar(12) NOT NULL,
  `Inc_Fecha` date DEFAULT NULL,
  `Inc_Descr` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_incidente`
--

INSERT INTO `tb_incidente` (`ID_Inc`, `TB_Empleados_ID_Empleado`, `Inc_Fecha`, `Inc_Descr`) VALUES
('74125', '745821', '2011-12-14', 'patio'),
('74126', '745821', '2011-11-05', 'oficina'),
('78451', '745821', '2016-06-06', 'escaleras'),
('94197', '745821', '2012-04-06', 'ascensor'),
('96521', '745821', '2014-11-22', 'piso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_incidente_tiene_tb_area`
--

CREATE TABLE `tb_incidente_tiene_tb_area` (
  `TB_Incidente_ID_Inc` varchar(12) NOT NULL,
  `TB_Area_ID_Area` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_soluciones`
--

CREATE TABLE `tb_soluciones` (
  `ID_Con_ins` int(11) NOT NULL,
  `Solu_Nombre` varchar(20) DEFAULT NULL,
  `Solu_Fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_soluciones`
--

INSERT INTO `tb_soluciones` (`ID_Con_ins`, `Solu_Nombre`, `Solu_Fecha`) VALUES
(54, 'ORDEN Y ASEO', '2016-06-06'),
(45, 'AVISO EMERGENTE', '2012-04-06'),
(12, 'USO DE CARGAS', '2011-12-14'),
(79, 'SISTEMAS ELECTRICO', '2014-11-22'),
(15, 'RETIRO ZONA B', '2011-11-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_de_incapacidad`
--

CREATE TABLE `tb_tipo_de_incapacidad` (
  `Tipo_Id` int(11) NOT NULL,
  `Tipo_Nombre` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_tipo_de_incapacidad`
--

INSERT INTO `tb_tipo_de_incapacidad` (`Tipo_Id`, `Tipo_Nombre`) VALUES
(12121, 'EPS'),
(12728, 'ARL'),
(12757, 'EPS'),
(42858, 'ARL'),
(56565, 'ARL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Sin_Rol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(130) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `last_session` datetime DEFAULT NULL,
  `activacion` int(11) NOT NULL DEFAULT 0,
  `token` varchar(40) NOT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int(11) DEFAULT 0,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `correo`, `last_session`, `activacion`, `token`, `token_password`, `password_request`, `id_tipo`) VALUES
(1, 'prueba', '$2y$10$k4J0bi2a7QJhcq28Ff35mes8jq.BQ9HnWFuctG3Lbk.OIwV/khtGS', 'prueba', 'prueba@prueba.com', NULL, 0, '056d0364b5783d88ca3f60dc4b319940', NULL, 0, 2),
(2, 'pruebitas', '$2y$10$PGB1L6ILAT8IgPZITtWDf.MtwrS5NJUqpNmy80p0WeJDC40Zu2tBa', 'pruebas', 'camiloafm95@gmail.com', '2019-12-10 20:38:45', 1, 'df21413aec550b1eaf2a93aaee68ce68', '', 0, 2),
(5, 'prueba1', '$2y$10$fy9oTzHzlxOkYZxcaecSqu.MR3VQcBNMThbcoDfb35IU2zpN3B6uK', 'prueba1', 'albertofuentes1222@hotmail.com', NULL, 1, '2cecf8f6002ae97a7f598cd95e22b697', NULL, 0, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrucel`
--
ALTER TABLE `carrucel`
  ADD PRIMARY KEY (`idaccidente`);

--
-- Indices de la tabla `tb_accidente`
--
ALTER TABLE `tb_accidente`
  ADD PRIMARY KEY (`ID_Acci`);

--
-- Indices de la tabla `tb_area`
--
ALTER TABLE `tb_area`
  ADD PRIMARY KEY (`ID_Area`),
  ADD KEY `TB_Area_FKIndex1` (`TB_Empleados_ID_Empleado`);

--
-- Indices de la tabla `tb_area_tiene_tb_con_ins`
--
ALTER TABLE `tb_area_tiene_tb_con_ins`
  ADD PRIMARY KEY (`TB_Area_ID_Area`,`Tb_Con_Ins_ID_Con_ins`),
  ADD KEY `TB_Area_has_Tb_Con_Ins_FKIndex1` (`TB_Area_ID_Area`),
  ADD KEY `TB_Area_has_Tb_Con_Ins_FKIndex2` (`Tb_Con_Ins_ID_Con_ins`);

--
-- Indices de la tabla `tb_con_ins`
--
ALTER TABLE `tb_con_ins`
  ADD PRIMARY KEY (`ID_Con_ins`);

--
-- Indices de la tabla `tb_empleados`
--
ALTER TABLE `tb_empleados`
  ADD PRIMARY KEY (`ID_Empleado`);

--
-- Indices de la tabla `tb_empleados_supervisa_tb_area`
--
ALTER TABLE `tb_empleados_supervisa_tb_area`
  ADD PRIMARY KEY (`TB_Empleados_ID_Empleado`,`TB_Area_ID_Area`),
  ADD KEY `TB_Empleados_has_TB_Area_FKIndex1` (`TB_Empleados_ID_Empleado`),
  ADD KEY `TB_Empleados_has_TB_Area_FKIndex2` (`TB_Area_ID_Area`);

--
-- Indices de la tabla `tb_empleados_tiene_tb_accidente`
--
ALTER TABLE `tb_empleados_tiene_tb_accidente`
  ADD PRIMARY KEY (`TB_Empleados_ID_Empleado`,`TB_accidente_ID_Acci`),
  ADD KEY `TB_Empleados_has_TB_accidente_FKIndex1` (`TB_Empleados_ID_Empleado`),
  ADD KEY `TB_Empleados_has_TB_accidente_FKIndex2` (`TB_accidente_ID_Acci`);

--
-- Indices de la tabla `tb_empleados_tiene_tb_incapacidad`
--
ALTER TABLE `tb_empleados_tiene_tb_incapacidad`
  ADD PRIMARY KEY (`TB_Empleados_ID_Empleado`,`TB_Incapacidad_ID_inca`),
  ADD KEY `TB_Empleados_has_TB_Incapacidad_FKIndex1` (`TB_Empleados_ID_Empleado`),
  ADD KEY `TB_Empleados_has_TB_Incapacidad_FKIndex2` (`TB_Incapacidad_ID_inca`);

--
-- Indices de la tabla `tb_incapacidad`
--
ALTER TABLE `tb_incapacidad`
  ADD PRIMARY KEY (`ID_inca`),
  ADD KEY `TB_Incapacidad_FKIndex1` (`TB_accidente_ID_Acci`);

--
-- Indices de la tabla `tb_incidente`
--
ALTER TABLE `tb_incidente`
  ADD PRIMARY KEY (`ID_Inc`),
  ADD KEY `TB_Incidente_FKIndex1` (`TB_Empleados_ID_Empleado`);

--
-- Indices de la tabla `tb_incidente_tiene_tb_area`
--
ALTER TABLE `tb_incidente_tiene_tb_area`
  ADD PRIMARY KEY (`TB_Incidente_ID_Inc`,`TB_Area_ID_Area`),
  ADD KEY `TB_Incidente_has_TB_Area_FKIndex1` (`TB_Incidente_ID_Inc`),
  ADD KEY `TB_Incidente_has_TB_Area_FKIndex2` (`TB_Area_ID_Area`);

--
-- Indices de la tabla `tb_tipo_de_incapacidad`
--
ALTER TABLE `tb_tipo_de_incapacidad`
  ADD PRIMARY KEY (`Tipo_Id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
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
-- AUTO_INCREMENT de la tabla `tb_accidente`
--
ALTER TABLE `tb_accidente`
  MODIFY `ID_Acci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1479;

--
-- AUTO_INCREMENT de la tabla `tb_area`
--
ALTER TABLE `tb_area`
  MODIFY `ID_Area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `tb_con_ins`
--
ALTER TABLE `tb_con_ins`
  MODIFY `ID_Con_ins` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `tb_empleados`
--
ALTER TABLE `tb_empleados`
  MODIFY `ID_Empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107564114;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
