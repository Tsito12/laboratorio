-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-04-2024 a las 21:08:25
-- Versión del servidor: 8.0.25-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laboratorio`
--
CREATE DATABASE IF NOT EXISTS `laboratorio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `laboratorio`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellidoP` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `apellidoM` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `edad` int NOT NULL,
  `periodoedad` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sexo` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `rfc` varchar(20) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `estatura` int DEFAULT NULL,
  `peso` int DEFAULT NULL,
  `idtipocliente` int DEFAULT NULL,
  `idcuenta` int DEFAULT NULL,
  `calle` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `colonia` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `poblacion` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `municipio` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `estado` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `codigoPostal` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nombref` varchar(50) DEFAULT NULL,
  `correof` varchar(50) DEFAULT NULL,
  `domf` varchar(50) DEFAULT NULL,
  `pobf` varchar(50) DEFAULT NULL,
  `telefonof` varchar(15) DEFAULT NULL,
  `codigopostalf` int DEFAULT NULL,
  PRIMARY KEY (`idcliente`),
  KEY `idcuenta` (`idcuenta`),
  KEY `cliente_ibfk_1` (`idtipocliente`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nombre`, `apellidoP`, `apellidoM`, `edad`, `periodoedad`, `sexo`, `telefono`, `email`, `rfc`, `imagen`, `estatura`, `peso`, `idtipocliente`, `idcuenta`, `calle`, `colonia`, `poblacion`, `municipio`, `estado`, `codigoPostal`, `nombref`, `correof`, `domf`, `pobf`, `telefonof`, `codigopostalf`) VALUES
(1, 'Mario', 'Farfán', 'Chavéz', 35, 'years', 'M', '9512197207', 'frafanMario@gmail.com', NULL, 'Uploads/user.png', 175, 65000, 1, 11, 'Bugambilia Naranja 107', 'Bugambilias', 'Oaxaca de Juárez', 'Oaxaca de Juárez', 'Oaxaca', '68010', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Jorge Octavio', 'Pacheco', 'Gabriel', 27, 'years', 'M', '9513008654', 'jorgepachecogabriel@gmail.com', NULL, 'Uploads/th-1595653470.jpg', 174, 68000, 1, 29, '-', '-', '-', '-', '-', '68000', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Erik', 'Santiago', '', 23, 'years', 'M', '', 'takatox6@gmail.com', NULL, '', 0, 0, 1, 34, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Fulanito', 'Perez', '', 25, 'years', 'M', '9515002112', 'correo@email.com', NULL, 'Uploads/user.png', 0, 0, 1, 37, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Daniel', 'Ochoa', '', 25, 'years', 'M', '', 'flash@8a.com', NULL, '', 0, 0, 1, 39, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Juan', 'Juan', '', 23, 'years', 'M', '', 'pedrito@bzl.com', NULL, '', 0, 0, 1, 40, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Eula', 'Lawrence', '', 26, 'years', 'F', '', 'Vengance@gi.com', NULL, 'Uploads/Icon_Emoji_Paimons_Paintings_Eula_1.webp', 0, 0, 1, 46, '', '', '', '', 'Otro', '', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Enrique', 'Alonso', '', 51, 'years', 'M', '', 'chicocartera@eges.com', NULL, '', 0, 0, 1, 47, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'prueba', 'nueva', '', 25, 'years', 'M', '', 'prueba@hola.om', NULL, '', 0, 0, 1, 48, '', '', '', '', '', '68000', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenedor`
--

DROP TABLE IF EXISTS `contenedor`;
CREATE TABLE IF NOT EXISTS `contenedor` (
  `idContenedor` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`idContenedor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `contenedor`
--

INSERT INTO `contenedor` (`idContenedor`, `nombre`) VALUES
(1, 'Tubo azul'),
(3, 'Tubo rojo'),
(4, 'Tubo lila');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

DROP TABLE IF EXISTS `cuenta`;
CREATE TABLE IF NOT EXISTS `cuenta` (
  `idcuenta` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `tipousuario` varchar(20) NOT NULL,
  PRIMARY KEY (`idcuenta`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`idcuenta`, `usuario`, `password`, `tipousuario`) VALUES
(1, 'cuentaprueba', 'hola425', ''),
(11, 'martinezdanielleon@gmail.com', 'DanielMartínez', 'Cliente'),
(12, '-', 'Nombre de prueba--', 'Cliente'),
(19, 'cuentaprueba5', 'Hola123', 'Empleado'),
(20, 'nose', 'nosexd', 'Empleado'),
(21, 'abr', 'nosequexd', 'Empleado'),
(22, 'directoroperativo', 'Prueba01.', 'Empleado'),
(29, 'jorgepachecogabriel@gmail.com', 'JorgeOctavioPachecoGabriel', 'Cliente'),
(34, 'takatox6@gmail.com', 'ErikSantiago', 'Cliente'),
(36, 'zs', 'asfaserawsa', 'Cliente'),
(37, 'correo@email.com', 'FulanitoPerez', 'Cliente'),
(38, 'as', 'asasas', 'Cliente'),
(39, 'a@a.com', 'asasasas', 'Cliente'),
(40, 'pedrito@bzl.com', 'JuanJuan', 'Cliente'),
(41, 'venganceWillBeMine@gi.com', 'EulaLawrence', 'Cliente'),
(46, 'Vengance@gi.com', 'EulaLawrence', 'Cliente'),
(47, 'chicocartera@eges.com', 'EnriqueAlonso', 'Cliente'),
(48, 'prueba@hola.om', 'pruebanueva', 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleorden`
--

DROP TABLE IF EXISTS `detalleorden`;
CREATE TABLE IF NOT EXISTS `detalleorden` (
  `idorden` int DEFAULT NULL,
  `idestudio` int DEFAULT NULL,
  `nota` varchar(100) DEFAULT NULL,
  `resultado` double DEFAULT NULL,
  KEY `idorden` (`idorden`),
  KEY `idestudio` (`idestudio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `detalleorden`
--

INSERT INTO `detalleorden` (`idorden`, `idestudio`, `nota`, `resultado`) VALUES
(1, 6, NULL, NULL),
(1, 8, NULL, NULL),
(1, 9, NULL, NULL),
(1, 5, NULL, NULL),
(1, 11, NULL, NULL),
(2, 9, NULL, NULL),
(2, 10, NULL, NULL),
(2, 12, NULL, NULL),
(3, 9, NULL, NULL),
(3, 10, NULL, NULL),
(3, 12, NULL, NULL),
(4, 8, NULL, NULL),
(4, 9, NULL, NULL),
(4, 10, NULL, NULL),
(5, 8, NULL, NULL),
(5, 9, NULL, NULL),
(5, 10, NULL, NULL),
(6, 12, NULL, NULL),
(6, 5, NULL, NULL),
(6, 11, NULL, NULL),
(7, 7, NULL, NULL),
(7, 8, NULL, NULL),
(7, 10, NULL, NULL),
(8, 10, NULL, NULL),
(8, 12, NULL, NULL),
(8, 5, NULL, NULL),
(9, 7, NULL, NULL),
(9, 11, NULL, NULL),
(10, 6, NULL, NULL),
(10, 7, NULL, NULL),
(10, 9, NULL, NULL),
(10, 5, NULL, NULL),
(11, 6, NULL, NULL),
(11, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleperfil`
--

DROP TABLE IF EXISTS `detalleperfil`;
CREATE TABLE IF NOT EXISTS `detalleperfil` (
  `idperfil` int DEFAULT NULL,
  `idestudio` int DEFAULT NULL,
  KEY `idperfil` (`idperfil`),
  KEY `idestudio` (`idestudio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `detalleperfil`
--

INSERT INTO `detalleperfil` (`idperfil`, `idestudio`) VALUES
(4, 8),
(4, 9),
(4, 10),
(5, 10),
(5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `iddoctor` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `apellidoP` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `apellidoM` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `calle` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `colonia` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `poblacion` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `municipio` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `estado` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `codigoPostal` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `rfc` varchar(20) DEFAULT NULL,
  `convenio` tinyint(1) NOT NULL,
  `fechaConvenio` date DEFAULT NULL,
  `razonsocial` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`iddoctor`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`iddoctor`, `nombre`, `apellidoP`, `apellidoM`, `calle`, `colonia`, `poblacion`, `municipio`, `estado`, `codigoPostal`, `telefono`, `email`, `rfc`, `convenio`, `fechaConvenio`, `razonsocial`) VALUES
(1, 'doctor', 'de', 'prueba', 'calle', 'colonia', 'poblacion', 'municipio', 'estado', '68000', '9511234567', 'correo@prueba.com', NULL, 0, NULL, NULL),
(2, 'prueba2', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', NULL, 1, '2021-05-21', NULL),
(4, 'prueba3', 'xd', 'xd', '-', '-', '-', '-', '-', '-', '-tel', '-d', 'yjfgvk', 1, '2021-09-22', 'frc'),
(5, 'Rolando', 'Matos', '', '', '', '', '', '', '', '', '', NULL, 0, NULL, NULL),
(7, 'a', 'a', 'a', '', '', '', '', '', '', '', '', NULL, 0, NULL, NULL),
(8, 'Kevin', 'Bautista', '', '', '', '', '', '', '', '', 'MmMetallica@email.com', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `idempleado` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellidoP` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `apellidoM` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telefono` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `rfc` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `puesto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idcuenta` int DEFAULT NULL,
  PRIMARY KEY (`idempleado`),
  KEY `idcuenta` (`idcuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idempleado`, `nombre`, `apellidoP`, `apellidoM`, `telefono`, `rfc`, `puesto`, `idcuenta`) VALUES
(1, 'empleado', 'de', 'prueba edit', '9511234567', 'xd', 'nose', 19),
(3, 'prueba', 'de', 'nada', '468368436', '864396', 'Recepcionista', 21),
(4, 'Eduardo', 'Pérez', 'Campos', '-', '-', 'Director operativo', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudio`
--

DROP TABLE IF EXISTS `estudio`;
CREATE TABLE IF NOT EXISTS `estudio` (
  `idEstudio` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `tiempoProced` int DEFAULT NULL,
  `area` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `metodo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tipo` varchar(40) DEFAULT NULL,
  `contenedor` int NOT NULL,
  `grupo` int DEFAULT NULL,
  `tipoMuestra` varchar(40) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `unidad` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idEstudio`),
  KEY `contenedor` (`contenedor`),
  KEY `area` (`grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estudio`
--

INSERT INTO `estudio` (`idEstudio`, `nombre`, `estado`, `tiempoProced`, `area`, `metodo`, `tipo`, `contenedor`, `grupo`, `tipoMuestra`, `precio`, `observaciones`, `unidad`) VALUES
(5, 'Prueba nueva editar', 1, 25, '-', 'metodo largo', 'prueba', 1, 5, 'Sangre', 150, NULL, NULL),
(6, 'Citrometría Hemática (Bh)', 1, 25, '-', 'Impedancia Eléctrica', 'perfil', 3, 5, 'Sangre EDTA', 201, NULL, NULL),
(7, 'Examen General de Orina (EGO)', 1, 5, '-', 'Fotometría de Reflexión, Microscopía Schumann', 'prueba', 1, 1, 'Orina', 75, NULL, NULL),
(8, 'Hemoglobina', 1, 5, '-', '-', 'prueba', 1, 5, 'Sangre', 60, NULL, NULL),
(9, 'Leucocitos', 1, 7, '-', '-', 'prueba', 1, 5, 'Sangre', 55, NULL, NULL),
(10, 'Número de plaquetas', 1, 10, '-', '-', 'prueba', 1, 5, 'Sangre', 80, NULL, NULL),
(11, 'Prueba perfil', 1, 5, '-', 'metodo', 'perfil', 1, 1, 'Sangre', 50, NULL, NULL),
(12, 'Prueba de perfil', 1, 8, '-', 'metodo largo', 'perfil', 1, 3, 'Sangre', 90, NULL, NULL),
(14, 'Glucosa basal', 1, 5, 'a', 'Quimica seca', 'prueba', 1, 6, 'Sangre', 80, 'Current Diabetes Reviems, 2016, 12.8-13', 'mg/dL'),
(15, 'Trigliceridos', 1, 8, 'a', 'Quimica seca', 'prueba', 1, 1, 'Sangre', 80, '', 'mg/dL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta`
--

DROP TABLE IF EXISTS `etiqueta`;
CREATE TABLE IF NOT EXISTS `etiqueta` (
  `idEtiqueta` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `largo` float NOT NULL,
  `ancho` float NOT NULL,
  `idEstudio` int NOT NULL,
  PRIMARY KEY (`idEtiqueta`),
  KEY `estudio` (`idEstudio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE IF NOT EXISTS `grupo` (
  `idGrupo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `prioridad` int NOT NULL,
  PRIMARY KEY (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`idGrupo`, `nombre`, `prioridad`) VALUES
(1, 'Urianálisis', 400),
(3, 'Grupo edit', 150),
(5, 'Hematología', 250),
(6, 'Creacion de nuevo grupo', 150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenestudio`
--

DROP TABLE IF EXISTS `ordenestudio`;
CREATE TABLE IF NOT EXISTS `ordenestudio` (
  `idorden` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `diagnostico` varchar(100) DEFAULT NULL,
  `iddoctor` int DEFAULT NULL,
  `idempleado` int DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `pago` double DEFAULT NULL,
  `metodopago` varchar(45) DEFAULT NULL,
  `idcliente` int NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`idorden`),
  KEY `iddoctor` (`iddoctor`),
  KEY `idempleado` (`idempleado`),
  KEY `ordenestudio_ibfk_4` (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ordenestudio`
--

INSERT INTO `ordenestudio` (`idorden`, `fecha`, `diagnostico`, `iddoctor`, `idempleado`, `observaciones`, `pago`, `metodopago`, `idcliente`, `total`) VALUES
(1, '2022-08-09', 'xd', 1, 4, 'xd', 516, 'efectivo', 1, 516),
(2, '2022-08-11', 'no se', 1, 4, 'no se', 146, 'efectivo', 1, 225),
(3, '2022-08-11', 'no se', 1, 4, 'no se', 146, 'efectivo', 1, 225),
(4, '2022-08-11', 'xd', 1, 4, 'xd', 148, 'efectivo', 1, 195),
(5, '2022-08-11', 'xd', 1, 4, 'xd', 148, 'efectivo', 1, 195),
(6, '2022-08-11', 'ahhhhhh', 1, 4, 'ahhhhhhhhh', 200, 'efectivo', 1, 290),
(7, '2022-08-12', 'diag', 1, 4, 'observaciones', 200, 'efectivo', 1, 215),
(8, '2022-08-29', '-', 1, 4, '-', 200, 'efectivo', 1, 320),
(9, '2022-09-07', 'f', 5, 4, '', 100, 'tarjeta', 4, 125),
(10, '2022-09-08', '', 5, 4, '', 200, 'efectivo', 1, 481),
(11, '2023-06-20', '', 1, 4, '', 100, 'efectivo', 1, 281);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `idperfil` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idperfil`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idperfil`, `nombre`) VALUES
(4, 'Citrometría Hemática (Bh)'),
(5, 'Prueba de perfil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado`
--

DROP TABLE IF EXISTS `resultado`;
CREATE TABLE IF NOT EXISTS `resultado` (
  `idorden` int NOT NULL,
  `idestudio` int NOT NULL,
  `parametro` varchar(50) NOT NULL,
  `resultado` varchar(100) NOT NULL,
  `unidad` varchar(50) NOT NULL,
  `idvalorreferencia` int NOT NULL,
  `imagen1` varchar(100) DEFAULT NULL,
  `imagen2` varchar(100) DEFAULT NULL,
  `aprobado` tinyint(1) DEFAULT NULL,
  `idresultado` int NOT NULL AUTO_INCREMENT,
  `nota` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`idresultado`),
  KEY `idorden` (`idorden`),
  KEY `idestudio` (`idestudio`),
  KEY `idvalorreferencia` (`idvalorreferencia`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `resultado`
--

INSERT INTO `resultado` (`idorden`, `idestudio`, `parametro`, `resultado`, `unidad`, `idvalorreferencia`, `imagen1`, `imagen2`, `aprobado`, `idresultado`, `nota`) VALUES
(7, 7, 'Color', 'Amarillo', 'Color', 1, 'Uploads/Results/7&amp;7&amp;CW Posters 002.jpg', 'Uploads/Results/7&amp;7&amp;CW Posters 003.jpg', 1, 1, 'Pues parece bien'),
(10, 7, 'color', 'transparente', 'color', 1, '', '', 1, 3, ''),
(11, 14, 'prueba', '100', 'gl', 9, '', '', 1, 9, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocliente`
--

DROP TABLE IF EXISTS `tipocliente`;
CREATE TABLE IF NOT EXISTS `tipocliente` (
  `idtipocliente` int NOT NULL AUTO_INCREMENT,
  `nombretipo` varchar(40) DEFAULT NULL,
  `porcentajedesc` double DEFAULT NULL,
  PRIMARY KEY (`idtipocliente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tipocliente`
--

INSERT INTO `tipocliente` (`idtipocliente`, `nombretipo`, `porcentajedesc`) VALUES
(1, 'Particular', 0),
(2, 'Maquila', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valorreferencia`
--

DROP TABLE IF EXISTS `valorreferencia`;
CREATE TABLE IF NOT EXISTS `valorreferencia` (
  `idValorRef` int NOT NULL AUTO_INCREMENT,
  `idestudio` int DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `estadoInicial` varchar(40) DEFAULT NULL,
  `estadoFinal` varchar(40) DEFAULT NULL,
  `descripcion` varchar(40) DEFAULT NULL,
  `valorInicial` varchar(200) DEFAULT NULL,
  `valorFinal` varchar(200) DEFAULT NULL,
  `unidad` varchar(40) DEFAULT NULL,
  `alturaInicial` int DEFAULT NULL,
  `alturaFinal` int DEFAULT NULL,
  `nota` varchar(100) DEFAULT NULL,
  `edadInicial` int DEFAULT NULL,
  `periodoInicial` varchar(10) DEFAULT NULL,
  `edadFinal` int DEFAULT NULL,
  `periodoFinal` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idValorRef`),
  KEY `idestudio` (`idestudio`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `valorreferencia`
--

INSERT INTO `valorreferencia` (`idValorRef`, `idestudio`, `sexo`, `estadoInicial`, `estadoFinal`, `descripcion`, `valorInicial`, `valorFinal`, `unidad`, `alturaInicial`, `alturaFinal`, `nota`, `edadInicial`, `periodoInicial`, `edadFinal`, `periodoFinal`) VALUES
(1, 7, 'Masculino', 'estado inicial', 'estado final', 'desc', '8', '6', 'unidad', 85, 90, 'una nota muy larga editada x5', NULL, NULL, NULL, NULL),
(2, 7, 'Femenino', 'prueba2', '-', 'prueba2 ego', '2', '100', 'ml', 157, 189, 'texto largo x2', NULL, NULL, NULL, NULL),
(6, 14, 'General', NULL, NULL, 'Normal', '65', '100', 'ml/dL', 0, 0, 'editar', 0, 'days', 150, 'years'),
(8, 14, 'General', NULL, NULL, 'Prediabetes', '101', '125', 'mg/dL', 0, 0, '', 0, 'days', 150, 'years'),
(9, 14, 'General', NULL, NULL, 'Diabetes', 'Mayor a', '126', 'mg/dL', 0, 0, '', 0, 'days', 150, 'years');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idtipocliente`) REFERENCES `tipocliente` (`idtipocliente`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`idcuenta`) REFERENCES `cuenta` (`idcuenta`);

--
-- Filtros para la tabla `detalleorden`
--
ALTER TABLE `detalleorden`
  ADD CONSTRAINT `detalleorden_ibfk_1` FOREIGN KEY (`idorden`) REFERENCES `ordenestudio` (`idorden`),
  ADD CONSTRAINT `detalleorden_ibfk_2` FOREIGN KEY (`idestudio`) REFERENCES `estudio` (`idEstudio`);

--
-- Filtros para la tabla `detalleperfil`
--
ALTER TABLE `detalleperfil`
  ADD CONSTRAINT `detalleperfil_ibfk_1` FOREIGN KEY (`idperfil`) REFERENCES `perfil` (`idperfil`) ON DELETE CASCADE,
  ADD CONSTRAINT `detalleperfil_ibfk_2` FOREIGN KEY (`idestudio`) REFERENCES `estudio` (`idEstudio`) ON DELETE SET NULL;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`idcuenta`) REFERENCES `cuenta` (`idcuenta`);

--
-- Filtros para la tabla `estudio`
--
ALTER TABLE `estudio`
  ADD CONSTRAINT `area` FOREIGN KEY (`grupo`) REFERENCES `grupo` (`idGrupo`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `contenedor` FOREIGN KEY (`contenedor`) REFERENCES `contenedor` (`idContenedor`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD CONSTRAINT `estudio` FOREIGN KEY (`idEstudio`) REFERENCES `estudio` (`idEstudio`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `ordenestudio`
--
ALTER TABLE `ordenestudio`
  ADD CONSTRAINT `ordenestudio_ibfk_2` FOREIGN KEY (`iddoctor`) REFERENCES `doctor` (`iddoctor`) ON DELETE SET NULL,
  ADD CONSTRAINT `ordenestudio_ibfk_3` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`idempleado`) ON DELETE SET NULL,
  ADD CONSTRAINT `ordenestudio_ibfk_4` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `resultado`
--
ALTER TABLE `resultado`
  ADD CONSTRAINT `idestudio` FOREIGN KEY (`idestudio`) REFERENCES `estudio` (`idEstudio`),
  ADD CONSTRAINT `idorden` FOREIGN KEY (`idorden`) REFERENCES `ordenestudio` (`idorden`),
  ADD CONSTRAINT `idvalorreferencia` FOREIGN KEY (`idvalorreferencia`) REFERENCES `valorreferencia` (`idValorRef`);

--
-- Filtros para la tabla `valorreferencia`
--
ALTER TABLE `valorreferencia`
  ADD CONSTRAINT `valorreferencia_ibfk_1` FOREIGN KEY (`idestudio`) REFERENCES `estudio` (`idEstudio`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
