-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2016 a las 21:51:29
-- Versión del servidor: 5.7.9
-- Versión de PHP: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sbsystem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono`
--

DROP TABLE IF EXISTS `abono`;
CREATE TABLE IF NOT EXISTS `abono` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT 'Registra el numero de abono',
  `rut_apo` char(30) NOT NULL COMMENT 'Registra el rut del apoderado',
  `monto_abono` int(10) DEFAULT NULL COMMENT 'Registra el abono del apoderado',
  PRIMARY KEY (`id`),
  KEY `rut_apo` (`rut_apo`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `abono`
--

INSERT INTO `abono` (`id`, `rut_apo`, `monto_abono`) VALUES
(23, '12549667-5', 150000),
(24, '16461801-3', 150000),
(25, '17137873-7', 100000),
(26, '18486863-6', 250000),
(27, '5015860-8', 350000),
(28, '6895003-1', 250000),
(29, '7006430-8', 200000),
(30, '9230959-2', 50000),
(31, '8171898-9', 35000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerta`
--

DROP TABLE IF EXISTS `alerta`;
CREATE TABLE IF NOT EXISTS `alerta` (
  `id_alerta` int(9) NOT NULL AUTO_INCREMENT COMMENT 'Es la cantidad de alertas que se han realizado',
  `id_tipoalerta` int(9) NOT NULL COMMENT 'Registra el tipo de alerta',
  `obs` varchar(70) NOT NULL COMMENT 'Registra una observación sobre la alerta',
  `fecha` varchar(20) NOT NULL COMMENT 'Ingresa la fecha de la alerta emitida',
  PRIMARY KEY (`id_alerta`),
  KEY `id_tipoalerta` (`id_tipoalerta`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alerta`
--

INSERT INTO `alerta` (`id_alerta`, `id_tipoalerta`, `obs`, `fecha`) VALUES
(30, 1, 'Alumna tuvo accidente fuera de su hogar', '03-10-2016 07:49 AM'),
(31, 2, 'Alumno Javier Reyes se atraso en 5 min', '05-10-2016 07:10 AM'),
(32, 3, 'No se encontro a Patricio Maldonado en su hogar', '07-10-2016 07:18 AM'),
(33, 2, 'Alumna Gabriela Montes se atrasa al salir del colegio Javiera Carrera', '11-10-2016 07:22 AM'),
(34, 3, 'Chofer se detiene a revisar aire de los neumÃ¡ticos', '12-10-2016 07:03 AM'),
(35, 2, 'Alumno Ignacio Valenzuela no salio a la hora establecida', '12-10-2016 07:04 AM'),
(36, 1, 'Hay un accidente en la Alameda', '12-10-2016 07:06 AM'),
(37, 2, 'Alumno Carlos D. no saliÃ³ en el horario que debia', '12-10-2016 08:00 PM'),
(38, 2, 'Chofer comenzÃ³ mas tarde su jornada', '12-10-2016 08:05 PM'),
(39, 1, 'Alumna Daniela R. se desmayÃ³ se llama a una ambulancia inmediatamente', '12-10-2016 08:06 PM'),
(40, 3, 'Clases suspendidas en colegio JosÃ© Victorino Lastarria', '12-10-2016 08:07 PM'),
(41, 3, 'Se retira mas temprano alumna Denisse J. Confirmar con los apoderados', '12-10-2016 08:07 PM'),
(42, 1, 'Choque en Carretera 5 Sur', '27-10-2016 09:56 AM'),
(43, 3, 'Alumno Gonzalez solicita volver ya que olvido su cuaderno', '27-10-2016 09:59 AM'),
(44, 1, 'Accidente test', '27-10-2016 11:27 AM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `rut` varchar(20) NOT NULL COMMENT 'Registra el rut del alumno',
  `nombre` varchar(20) NOT NULL COMMENT 'Registra el nombre del alumno',
  `apellido` varchar(20) NOT NULL COMMENT 'Registra el apellido del alumno',
  `fecha` varchar(50) NOT NULL COMMENT 'Registra la fecha de nacimiento del alumno',
  `direccion` varchar(50) NOT NULL COMMENT 'Registra la direccion del alumno',
  `rut_apo` varchar(20) NOT NULL COMMENT 'Registra el rut del apoderado a cargo del alumno',
  `colegio` mediumint(9) NOT NULL COMMENT 'Registra el colegio del alumno',
  `coordenadas` varchar(60) NOT NULL COMMENT 'Registra las coordenadas del hogar del alumno',
  `causal` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL COMMENT 'Almacena si el alumno sigue activo en el sistema',
  PRIMARY KEY (`rut`),
  KEY `rut_apo` (`rut_apo`),
  KEY `colegio` (`colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`rut`, `nombre`, `apellido`, `fecha`, `direccion`, `rut_apo`, `colegio`, `coordenadas`, `causal`, `estado`) VALUES
('18929965-6', 'Javier', 'Ãguila', '13 October, 2010', 'Calle Mataquito #83', '9230959-2', 5, '-34.1627569,-70.7232768,18', 'Sin Causal', 'ACTIVO'),
('19326543-5', 'Maximo', 'Gonzalez', '24 October, 2009', 'Villa Los Lirios #987', '12549667-5', 5, '-34.154281,-70.7186567', 'Sin Causal', 'ACTIVO'),
('21265324-5', 'Roberto', 'Maximo', '10 October, 2008', 'Villa Los Lirios #987', '12549667-5', 5, '-34.154281,-70.7186567', 'Sin Causal', 'ACTIVO'),
('21739775-8', 'Sonia', 'Sonia', '21 March, 2008', 'La Victoria #169', '9230959-2', 7, '-34.1627569,-70.7232768,18', 'Sin Causal', 'ACTIVO'),
('22221970-1', 'Isabel', 'Isabel', '6 October, 2016', 'Mac Iver 360', '5015860-8', 7, '-34.1705381,-70.7328223,17', 'Sin Causal', 'ACTIVO'),
('22344796-1', 'Amaia', 'Lopez', '14 May, 2008', 'Zafiro #357', '16461801-3', 6, '-34.1798657,-70.7281059,18', 'Sin Causal', 'ACTIVO'),
('23057189-9', 'Ana MarÃ­a', 'Bustos', '30 April, 2010', 'San Rafael #0630', '17137873-7', 7, '-34.155560, -70.750890', 'Sin Causal', 'ACTIVO'),
('23364600-8', 'Rafael', 'Saavedra', '21 March, 2010', 'Mac Iver #360', '5015860-8', 5, '-34.1705381,-70.7328223,17', 'Sin Causal', 'ACTIVO'),
('23675906-7', 'Fernando', 'Fernandez', '4 March, 2010', 'Mac Iver 360', '8171898-9', 5, '-34.1705381,-70.7328223,17', 'Sin Causal', 'ACTIVO'),
('23711886-3', 'MarÃ­a Pilar', 'Lopez', '11 May, 2011', 'Zafiro #357', '18486863-6', 6, '-34.1798657,-70.7281059,18', 'Sin Causal', 'ACTIVO'),
('24000978-1', 'David', 'Rodriguez', '17 October, 2008', 'Calle Mataquito #83', '8171898-9', 6, '-34.152603, -70.721764', 'Sin Causal', 'ACTIVO'),
('24046969-3', 'Laura', 'Lopez', '15 April, 2010', 'Zafiro #357', '18486863-6', 6, '-34.1798657,-70.7281059,18', 'Sin Causal', 'ACTIVO'),
('24065960-3', 'Marta', 'Lopez', '2 March, 2010', 'Zafiro #357', '18486863-6', 6, '-34.1798657,-70.7281059,18', 'Sin Causal', 'ACTIVO'),
('24208551-5', 'JosÃ©', 'Saavedra', '10 February, 2016', 'Pasaje Nueve #1526', '16461801-3', 7, '34.182872,-70.7418703,18', 'Sin Causal', 'ACTIVO'),
('24336323-3', 'Carmen', 'Valle', '24 December, 2010', 'La Victoria #169', '9230959-2', 7, '-34.1627569,-70.7232768,18', 'Sin Causal', 'ACTIVO'),
('24382274-2', 'Ãlvaro', 'Saavedra', '11 March, 2016', 'Pasaje Nueve #1526', '16461801-3', 7, '-34.182872, -70.740776', 'Sin Causal', 'ACTIVO'),
('24385072-k', 'MarÃ­a Teresa', 'Rodriguez', '16 October, 2008', 'Calle Mataquito #83', '8171898-9', 6, '-34.152603, -70.721764', 'Sin Causal', 'ACTIVO'),
('24744145-k', 'Francisco', 'Saavedra', '5 February, 2016', 'Pasaje Nueve #1526', '16461801-3', 7, '34.182872,-70.7418703,18', 'Sin Causal', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoderados`
--

DROP TABLE IF EXISTS `apoderados`;
CREATE TABLE IF NOT EXISTS `apoderados` (
  `rut` varchar(20) NOT NULL COMMENT 'Registra el rut del apoderado',
  `nombre` varchar(20) NOT NULL COMMENT 'Registra el nombre del apoderado',
  `apellido` varchar(25) NOT NULL COMMENT 'Registra el apellido del apoderado',
  `direccion` varchar(30) NOT NULL COMMENT 'Registra la direccion del apoderado',
  `PASSWORD` varchar(30) NOT NULL COMMENT 'Registra la password del apoderado',
  `telefono` varchar(30) NOT NULL COMMENT 'Registra el telefono del apoderado',
  `pago` int(8) NOT NULL COMMENT 'Registra el monto total a pagar del apoderado',
  `abono` int(8) NOT NULL,
  `causal` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL COMMENT 'Indica si el apoderado esta activo del sistema',
  PRIMARY KEY (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `apoderados`
--

INSERT INTO `apoderados` (`rut`, `nombre`, `apellido`, `direccion`, `PASSWORD`, `telefono`, `pago`, `abono`, `causal`, `estado`) VALUES
('12549667-5', 'Ricardo', 'Gonzalez', 'Villa Los Lirios #987', 'contrasena1', '978415420', 150000, 150000, 'Sin Causal', 'ACTIVO'),
('16461801-3', 'Carlos', 'Saavedra', 'Pasaje Nueve #1526', 'contrasena10', '923657421', 300000, 150000, 'Sin Causal', 'ACTIVO'),
('17137873-7', 'Marta', 'Bustos', 'San Rafael #0630', 'contrasena4', '982326541', 150000, 100000, 'Sin Causal', 'ACTIVO'),
('18486863-6', 'Luis', 'Lopez', 'Zafiro #357', 'contrasena60', '923654784', 300000, 250000, 'Sin Causal', 'ACTIVO'),
('5015860-8', 'Fernando', 'Checa', 'Mac Iver #360', 'contrasena20', '956321487', 350000, 350000, 'Sin Causal', 'ACTIVO'),
('6895003-1', 'Patricia', 'Alfaro', 'Los ArcÃ¡ngeles #2300', 'contrasena546', '956324115', 250000, 250000, 'Sin Causal', 'ACTIVO'),
('7006430-8', 'Sergio', 'Sierra', 'El Sol #1061', 'contrasena234', '956235462', 230000, 200000, 'Sin Causal', 'ACTIVO'),
('7070376-9', 'Enrique', 'Doncel', 'Domingo Luis Bravo #1517', 'cpmtrasema', '963215871', 350000, 0, 'Sin Causal', 'ACTIVO'),
('8171898-9', 'Antonio', 'Rodriguez', 'Calle Mataquito #83', 'contrasena3', '987561232', 200000, 35000, 'Sin Causal', 'ACTIVO'),
('9230959-2', 'Antonio', 'Perez', 'La Victoria #169', 'contrasena21', '985236547', 150000, 50000, 'Sin Causal', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
CREATE TABLE IF NOT EXISTS `asistencia` (
  `id_asistencia` int(9) NOT NULL AUTO_INCREMENT,
  `rut_alumno` varchar(20) NOT NULL,
  `tipo_asistencia` varchar(10) NOT NULL,
  `nombre_alu` varchar(20) NOT NULL,
  `apellido_alu` varchar(20) NOT NULL,
  `recorrido` varchar(20) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  PRIMARY KEY (`id_asistencia`),
  KEY `rut_alumno` (`rut_alumno`),
  KEY `apellido_alu` (`apellido_alu`),
  KEY `nombre_alu` (`nombre_alu`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `rut_alumno`, `tipo_asistencia`, `nombre_alu`, `apellido_alu`, `recorrido`, `fecha`) VALUES
(5, '21265324-5', 'Ausente', 'Roberto', 'Maximo', 'Vuelta', '13/10/2016'),
(4, '19326543-5', 'Ausente', 'Maximo', 'Gonzalez', 'Ida', '27/10/2016'),
(6, '22344796-1', 'Ausente', 'Amaia', 'Lopez', 'Ida', '27/10/2016'),
(7, '21265324-5', 'Ausente', 'Maria Teresa', 'Rodriguez', 'Ida', '15/10/2016'),
(8, '23057189-9', 'Presente', 'Ana Maria', 'Bustos', 'Ida', '14/03/2016'),
(9, '23711886-3', 'Presente', 'Maria Pilar', 'Lopez', 'Vuelta', '15/09/2016'),
(10, '24000978-1', 'Presente', 'David', 'Rodriguez', 'Ida', '16/10/2016'),
(11, '24046969-3', 'Presente', 'Laura', 'Lopez', 'Vuelta', '17/10/2016'),
(12, '24065960-3', 'Presente', 'Marta', 'Lopez', 'Vuelta', '18/07/2016');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistente`
--

DROP TABLE IF EXISTS `asistente`;
CREATE TABLE IF NOT EXISTS `asistente` (
  `rut` varchar(20) NOT NULL COMMENT 'Registra el rut del asistente',
  `nombre` varchar(20) NOT NULL COMMENT 'Registra el nombre del asistente',
  `apellido` varchar(25) NOT NULL COMMENT 'Registra el apellido del asistente',
  `direccion` varchar(30) NOT NULL COMMENT 'Registra la direccion del asistente',
  `PASSWORD` varchar(30) NOT NULL COMMENT 'Registra la password del asistente ',
  `telefono` varchar(30) NOT NULL COMMENT 'Registra el telefono del asistente',
  `info` varchar(40) NOT NULL COMMENT 'Registra informacion adicion del asistente',
  `pat_asis` varchar(20) NOT NULL,
  `imagen_nombre` varchar(255) NOT NULL COMMENT 'Registra el nombre de la imagen',
  `causal` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL COMMENT 'Almacena si el asistente sigue activo en el sistema',
  PRIMARY KEY (`rut`),
  KEY `pat_asis` (`pat_asis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistente`
--

INSERT INTO `asistente` (`rut`, `nombre`, `apellido`, `direccion`, `PASSWORD`, `telefono`, `info`, `pat_asis`, `imagen_nombre`, `causal`, `estado`) VALUES
('15203321-7', 'Juan', 'Perez', 'villa las camelias #985', 'daisuke', '987563210', 'Sin informacion adicional', 'HWRF55', 'licencia.jpg', 'SIN CAUSAL', 'ACTIVO'),
('18039363-3', 'Damaris', 'Letelier', 'Alameda #314', '18039', '+56 9 8356 5753', 'Sin informacion adicional', 'KDLP97', '', '', 'ACTIVO'),
('21111111-1', 'Sara', 'Gonzalez', 'Villa Las Camelias #876', 'contrasena', '56987410', 'no trabaja los sabados', 'HWRF55', 'licencia.jpg', 'SIN CAUSAL', 'ACTIVO'),
('8647125-9', 'Lidia', 'Sanchez', 'Avenida Jupiter #125', 'contrasena2', '98653214', 'Sin informacion adicional', 'KDLP97', 'Untitled.png', 'SIN CAUSAL', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `choferes`
--

DROP TABLE IF EXISTS `choferes`;
CREATE TABLE IF NOT EXISTS `choferes` (
  `rut` varchar(20) NOT NULL COMMENT 'Registra el rut del chofer',
  `nombre` varchar(20) NOT NULL COMMENT 'Registra el nombre del chofer',
  `apellido` varchar(25) NOT NULL COMMENT 'Registra el apellido del chofer',
  `direccion` varchar(30) NOT NULL COMMENT 'Registra la direccion del chofer',
  `PASSWORD` varchar(30) NOT NULL COMMENT 'Registra el password del chofer',
  `telefono` varchar(30) NOT NULL COMMENT 'Registra el telefono del chofer',
  `info` varchar(40) NOT NULL COMMENT 'Registra informacion adicional del chofer',
  `pat_chof` varchar(20) NOT NULL COMMENT 'Registra la patente relacionada con el chofer',
  `imagen_nombre` varchar(255) NOT NULL COMMENT 'Registra el nombre de la imagen',
  `causal` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL COMMENT 'Almacena si el chofer sigue activo en el sistema',
  PRIMARY KEY (`rut`),
  KEY `pat_chof` (`pat_chof`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `choferes`
--

INSERT INTO `choferes` (`rut`, `nombre`, `apellido`, `direccion`, `PASSWORD`, `telefono`, `info`, `pat_chof`, `imagen_nombre`, `causal`, `estado`) VALUES
('9999999-9', 'Ernesto', 'Perez', 'Calle Las acacias #9214', 'contrasena1', '96478524', 'Sin informacion adicional', 'KDLP97', 'licencia.jpg', 'SIN CAUSAL', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegio`
--

DROP TABLE IF EXISTS `colegio`;
CREATE TABLE IF NOT EXISTS `colegio` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT 'Registra el numero de colegios registrados',
  `nom_col` char(30) NOT NULL COMMENT 'Registra el nombre del colegio',
  `des_col` char(30) NOT NULL COMMENT 'Registra la direccion del colegio',
  `coordenadas` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colegio`
--

INSERT INTO `colegio` (`id`, `nom_col`, `des_col`, `coordenadas`) VALUES
(5, 'Colegio Ena Bellemans', 'Diego de Almagro #1109', '34.1532579,-70.7286738,18'),
(6, 'Colegio Cuisenaire', 'Ilanes #1260', '-34.151977,-70.7329457'),
(7, 'Colegio Las AmÃ©ricas', 'Avenida La Cruz 1479', '-34.1515103,-70.7284239,16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patentes`
--

DROP TABLE IF EXISTS `patentes`;
CREATE TABLE IF NOT EXISTS `patentes` (
  `num_pat` varchar(20) NOT NULL COMMENT 'Registra el numero de la patente',
  `nombre_imagen` varchar(255) NOT NULL COMMENT 'Registra el nombre de la imagen',
  PRIMARY KEY (`num_pat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `patentes`
--

INSERT INTO `patentes` (`num_pat`, `nombre_imagen`) VALUES
('HWRF55', 'revtec2.jpg'),
('KDLP97', 'revtec3.jpg'),
('RXSD01', 'revtec1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoalerta`
--

DROP TABLE IF EXISTS `tipoalerta`;
CREATE TABLE IF NOT EXISTS `tipoalerta` (
  `id_tipoalerta` int(9) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipoalerta`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoalerta`
--

INSERT INTO `tipoalerta` (`id_tipoalerta`, `nombre`) VALUES
(1, 'Accidente'),
(2, 'Atraso'),
(3, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'Registra el numero de usuarios',
  `rut` varchar(20) NOT NULL COMMENT 'Registra el rut del usuario',
  `PASSWORD` varchar(20) NOT NULL COMMENT 'Registra el password del usuario',
  `tipo` varchar(20) NOT NULL COMMENT 'Registra el tipo de usuario',
  `estado` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `rut`, `PASSWORD`, `tipo`, `estado`) VALUES
(1, '17137873-7', '20071989', 'admin', 'VINCULADO'),
(18, '18039363-3', '18039', 'Asistente', 'ACTIVO'),
(19, '8171283-9', '8171', 'Chofer', 'ACTIVO'),
(20, '8647125-9', 'contrasena2', 'Asistente', 'ACTIVO'),
(21, '17204679-7', '17204', 'Apoderado', 'ACTIVO'),
(22, '8171898-9', 'contrasena3', 'Apoderado', 'ACTIVO'),
(23, '17137873-7', 'contrasena4', 'Apoderado', 'ACTIVO'),
(24, '16461801-3', 'contrasena10', 'Apoderado', 'ACTIVO'),
(25, '18486863-6', 'contrasena60', 'Apoderado', 'ACTIVO'),
(26, '5015860-8', 'contrasena20', 'Apoderado', 'ACTIVO'),
(27, '9230959-2', 'contrasena21', 'Apoderado', 'ACTIVO'),
(28, '7006430-8', 'contrasena234', 'Apoderado', 'ACTIVO'),
(29, '6895003-1', 'contrasena546', 'Apoderado', 'ACTIVO'),
(30, '7070376-9', 'cpmtrasema', 'Apoderado', 'ACTIVO'),
(31, '15203321-7', 'daisuke', 'Asistente', 'ACTIVO');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abono`
--
ALTER TABLE `abono`
  ADD CONSTRAINT `abono_ibfk_1` FOREIGN KEY (`rut_apo`) REFERENCES `apoderados` (`rut`);

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`rut_apo`) REFERENCES `apoderados` (`rut`),
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`colegio`) REFERENCES `colegio` (`id`);

--
-- Filtros para la tabla `asistente`
--
ALTER TABLE `asistente`
  ADD CONSTRAINT `asis_pat` FOREIGN KEY (`pat_asis`) REFERENCES `patentes` (`num_pat`);

--
-- Filtros para la tabla `choferes`
--
ALTER TABLE `choferes`
  ADD CONSTRAINT `chof_pat` FOREIGN KEY (`pat_chof`) REFERENCES `patentes` (`num_pat`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
