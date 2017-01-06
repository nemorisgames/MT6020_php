-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-01-2017 a las 20:02:02
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mt6020`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `rut` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`, `name`, `lastName`, `rut`, `email`, `phone`) VALUES
(1, 'Administrador', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `checkmodule`
--

CREATE TABLE IF NOT EXISTS `checkmodule` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_module` bigint(20) NOT NULL,
  `fk_checkQuestions` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_moduleType` (`fk_module`),
  KEY `fk_checkQuestions` (`fk_checkQuestions`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Volcado de datos para la tabla `checkmodule`
--

INSERT INTO `checkmodule` (`id`, `fk_module`, `fk_checkQuestions`) VALUES
(1, 18, 1),
(2, 18, 2),
(3, 18, 3),
(4, 18, 4),
(5, 18, 5),
(6, 18, 6),
(7, 18, 7),
(8, 18, 8),
(9, 18, 9),
(10, 18, 10),
(11, 18, 11),
(12, 18, 12),
(13, 18, 13),
(14, 18, 14),
(15, 18, 15),
(16, 18, 16),
(17, 18, 17),
(18, 18, 18),
(19, 18, 19),
(20, 18, 20),
(21, 18, 21),
(22, 18, 22),
(23, 18, 23),
(24, 18, 24),
(25, 18, 25),
(26, 18, 26),
(28, 18, 27),
(29, 18, 28),
(30, 18, 29),
(31, 18, 30),
(32, 21, 1),
(33, 21, 2),
(34, 21, 3),
(35, 21, 4),
(36, 21, 5),
(37, 21, 6),
(38, 21, 7),
(39, 21, 8),
(40, 21, 9),
(41, 21, 10),
(42, 21, 11),
(43, 21, 12),
(44, 21, 13),
(45, 21, 14),
(46, 21, 15),
(47, 21, 16),
(48, 21, 17),
(49, 21, 18),
(50, 21, 19),
(51, 21, 20),
(52, 21, 21),
(53, 21, 22),
(54, 21, 23),
(55, 21, 24),
(56, 21, 25),
(57, 21, 26),
(58, 21, 27),
(59, 21, 28),
(60, 21, 29),
(61, 21, 30),
(62, 22, 1),
(63, 22, 2),
(64, 22, 3),
(65, 22, 4),
(66, 22, 5),
(67, 22, 6),
(68, 22, 7),
(69, 22, 8),
(70, 22, 9),
(71, 22, 10),
(72, 22, 11),
(73, 22, 12),
(74, 22, 13),
(75, 22, 14),
(76, 22, 15),
(77, 22, 16),
(78, 22, 17),
(79, 22, 18),
(80, 22, 19),
(81, 22, 20),
(82, 22, 21),
(83, 22, 22),
(84, 22, 23),
(85, 22, 24),
(86, 22, 25),
(87, 22, 26),
(88, 22, 27),
(89, 22, 28),
(90, 22, 29),
(91, 22, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `checkmoduledetail`
--

CREATE TABLE IF NOT EXISTS `checkmoduledetail` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_realizationModule` bigint(20) NOT NULL,
  `fk_checkQuestion` bigint(20) NOT NULL,
  `correctAnswer` tinyint(1) NOT NULL,
  `answerMade` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_realizationModule` (`fk_realizationModule`),
  KEY `fk_checkQuestion` (`fk_checkQuestion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `checkquestions`
--

CREATE TABLE IF NOT EXISTS `checkquestions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `questionName` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `checkquestions`
--

INSERT INTO `checkquestions` (`id`, `questionName`) VALUES
(1, 'checkNivelPetroleo'),
(2, 'checkNivelAceiteMotor'),
(3, 'checkNivelAceiteHidraulico'),
(4, 'checkEstadoLuces'),
(5, 'checkEstadoNeumaticos'),
(6, 'checkNivelRefrigerante'),
(7, 'checkNivelAceiteTransmision'),
(8, 'checkNivelAceiteTransf'),
(9, 'checkFiltro'),
(10, 'checkIndicObstruccion'),
(11, 'checkLucesGeneral'),
(12, 'checkLimpiaParabrisas'),
(13, 'checkAireAcondicionado'),
(14, 'checkManometros'),
(15, 'checkMonitor'),
(16, 'checkAseoCabina'),
(17, 'checkBocina'),
(18, 'checkTolva'),
(19, 'checkTopeEjeCentral'),
(20, 'checkArticulacionCentral'),
(21, 'checkArticulacionDireccional'),
(22, 'checkPasadoresGeneral'),
(23, 'checkFugasCilindros'),
(24, 'checkMotorEnfriadores'),
(25, 'checkEstadoExtintorManual'),
(26, 'checkEstadoExtintorIncorporado'),
(27, 'checkEstadoEscaleras'),
(28, 'checkSalidasEmergencia'),
(29, 'checkCheckfireCabina'),
(30, 'checkCableadoCheckfire');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `designtype`
--

CREATE TABLE IF NOT EXISTS `designtype` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `designtype`
--

INSERT INTO `designtype` (`id`, `name`) VALUES
(6, 'diseno1'),
(7, 'diseno2'),
(8, 'diseno3'),
(9, 'diseno4'),
(10, 'diseno5'),
(11, 'diseno6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detail`
--

CREATE TABLE IF NOT EXISTS `detail` (
  `id` bigint(20) NOT NULL,
  `VariableName` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `VariableName` (`VariableName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detail`
--

INSERT INTO `detail` (`id`, `VariableName`) VALUES
(21, 'fallaOperacional'),
(22, 'integridadBuzonCarga'),
(23, 'integridadBuzonDescuento'),
(10, 'integridadDescuentoColision'),
(3, 'integridadFrontal'),
(4, 'integridadLateralMotorDerecho'),
(5, 'integridadLateralMotorIzquierdo'),
(6, 'integridadLateralTolvaDerecho'),
(7, 'integridadLateralTolvaIzquierdo'),
(9, 'integridadSumatoria'),
(8, 'integridadTraseraTolva'),
(19, 'metaTonelaje'),
(1, 'numeroVueltasMin'),
(20, 'porcentagePerdidaMinima'),
(0, 'tiempoPorVueltaMin'),
(2, 'tiempoPorVueltaPromedio'),
(12, 'tunelDescuentoColision'),
(11, 'tunelIntegridad'),
(13, 'tunelValorFinal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informationmoduleanswers`
--

CREATE TABLE IF NOT EXISTS `informationmoduleanswers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_informationModuleQuestions` bigint(20) NOT NULL,
  `text` text NOT NULL,
  `correct` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_informationModuleQUestions` (`fk_informationModuleQuestions`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `informationmoduleanswers`
--

INSERT INTO `informationmoduleanswers` (`id`, `fk_informationModuleQuestions`, `text`, `correct`) VALUES
(6, 7, 'asdsad', 'False'),
(7, 7, 'asdasd', 'False'),
(8, 7, 'ver1', 'True'),
(11, 6, 'RVERDADERA1', 'True'),
(13, 6, 'RFALSA1', 'False'),
(14, 6, 'RFALSA2', 'False'),
(15, 6, 'RFALSA3', 'False'),
(16, 6, 'RFALSA4', 'False'),
(17, 6, 'RFALSA5', 'False'),
(18, 7, 'qwerwqr', 'False'),
(19, 7, 'qwerwqr2', 'False'),
(20, 8, 'jkjnjkjkjk', 'True'),
(21, 8, 'jkjkklk', 'False'),
(22, 8, 'jkjkklk', 'False'),
(23, 8, 'jkjkklk', 'True'),
(24, 8, 'jkjkkjkjl', 'False');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informationmoduledetail`
--

CREATE TABLE IF NOT EXISTS `informationmoduledetail` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_realizationModule` bigint(20) NOT NULL,
  `fk_questionID` bigint(20) NOT NULL,
  `fk_informationModuleAnswers` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_realizationModule` (`fk_realizationModule`),
  KEY `fk_realizateAnswer` (`fk_informationModuleAnswers`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `informationmoduledetail`
--

INSERT INTO `informationmoduledetail` (`id`, `fk_realizationModule`, `fk_questionID`, `fk_informationModuleAnswers`) VALUES
(1, 1, 7, 8),
(2, 1, 7, 8),
(3, 1, 7, 8),
(4, 1, 7, 8),
(5, 1, 7, 8),
(6, 1, 7, 8),
(7, 1, 7, 8),
(8, 1, 7, 6),
(9, 1, 7, 8),
(10, 1, 7, 6),
(11, 1, 7, 6),
(12, 1, 7, 8),
(13, 1, 7, 8),
(14, 1, 7, 8),
(15, 1, 7, 8),
(16, 1, 7, 19),
(17, 1, 7, 8),
(18, 1, 7, 8),
(19, 1, 7, 8),
(20, 1, 7, 8),
(21, 1, 7, 11),
(22, 1, 7, 8),
(23, 1, 7, 17),
(24, 1, 7, 8),
(25, 1, 7, 17),
(26, 1, 7, 8),
(27, 1, 7, 11),
(28, 1, 7, 19),
(29, 1, 7, 11),
(30, 1, 7, 6),
(31, 1, 7, 14),
(32, 1, 7, 19),
(33, 1, 7, 13),
(34, 1, 7, 19),
(35, 1, 8, 15),
(36, 1, 8, 19),
(37, 1, 8, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informationmodulequestion`
--

CREATE TABLE IF NOT EXISTS `informationmodulequestion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_module` bigint(20) NOT NULL,
  `question` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_informationModule` (`fk_module`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `informationmodulequestion`
--

INSERT INTO `informationmodulequestion` (`id`, `fk_module`, `question`) VALUES
(6, 10, 'Who are you'),
(7, 10, 'Pregunta 2'),
(8, 10, 'hjkhjhj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informationpagedesign`
--

CREATE TABLE IF NOT EXISTS `informationpagedesign` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_slider` bigint(20) NOT NULL,
  `fk_DesignType` bigint(20) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `sound` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_DesignType` (`fk_DesignType`),
  KEY `fk_slider` (`fk_slider`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `informationpagedesign`
--

INSERT INTO `informationpagedesign` (`id`, `fk_slider`, `fk_DesignType`, `image`, `sound`) VALUES
(11, 15, 7, 'error.png', 'ddf'),
(12, 16, 8, 'sdfsdf', 'sdfsdf'),
(13, 11, 6, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instancemodule`
--

CREATE TABLE IF NOT EXISTS `instancemodule` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_module` bigint(20) NOT NULL,
  `fk_supervisor` bigint(20) NOT NULL,
  `questionsNumber` int(11) NOT NULL,
  `aprovalPercentageQuestions` int(11) NOT NULL,
  `time` varchar(20) NOT NULL,
  `aprovalPercentageCheck1` int(11) DEFAULT NULL,
  `aprovalPercentageCheck2` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_module` (`fk_module`),
  KEY `fk_supervisor` (`fk_supervisor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `instancemodule`
--

INSERT INTO `instancemodule` (`id`, `fk_module`, `fk_supervisor`, `questionsNumber`, `aprovalPercentageQuestions`, `time`, `aprovalPercentageCheck1`, `aprovalPercentageCheck2`, `name`) VALUES
(1, 10, 1, 10, 80, '10', 1, 1, 'mi_modulo1'),
(2, 18, 1, 0, 1, '12', 75, 1, 'mi_modulo4'),
(3, 19, 1, 0, 1, '2', 1, 1, 'mi_modulo5'),
(4, 20, 1, 0, 0, '20', NULL, NULL, 'mi_modulo6'),
(5, 21, 1, 0, 0, '20', 75, 75, 'mi_modulo7'),
(6, 22, 1, 0, 0, '20', 75, 75, 'mi_modulo8'),
(7, 11, 1, 10, 0, '10', NULL, NULL, 'mi_modulo2'),
(8, 12, 1, 10, 0, '10', NULL, NULL, 'mi_modulo3'),
(11, 22, 1, 0, 0, '8', 8, 8, 'testmodulo8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instancemodule_detail`
--

CREATE TABLE IF NOT EXISTS `instancemodule_detail` (
  `pk_instancemodule_detail` int(11) NOT NULL AUTO_INCREMENT,
  `fk_instancemodule` bigint(11) NOT NULL,
  `fk_detail` bigint(11) NOT NULL,
  `aproval` varchar(30) NOT NULL,
  PRIMARY KEY (`pk_instancemodule_detail`),
  KEY `fk_instancemodule` (`fk_instancemodule`),
  KEY `fk_detail` (`fk_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- Volcado de datos para la tabla `instancemodule_detail`
--

INSERT INTO `instancemodule_detail` (`pk_instancemodule_detail`, `fk_instancemodule`, `fk_detail`, `aproval`) VALUES
(1, 4, 0, '0'),
(2, 4, 1, '2'),
(3, 4, 3, '20'),
(4, 4, 4, '21'),
(5, 4, 5, '22'),
(6, 4, 6, '23'),
(7, 4, 7, '24'),
(8, 4, 8, '25'),
(9, 4, 10, '5'),
(10, 4, 11, '10'),
(11, 4, 12, '5'),
(12, 5, 0, '0'),
(13, 5, 1, '2'),
(14, 5, 3, '20'),
(15, 5, 4, '20'),
(16, 5, 5, '20'),
(17, 5, 6, '20'),
(18, 5, 7, '20'),
(19, 5, 8, '20'),
(20, 5, 10, '5'),
(21, 5, 11, '10'),
(22, 5, 12, '5'),
(23, 5, 9, '40'),
(24, 5, 20, '30'),
(25, 5, 21, 'Ninguna'),
(26, 5, 22, '20'),
(27, 5, 23, '5'),
(28, 6, 0, '0'),
(29, 6, 1, '2'),
(30, 6, 3, '20'),
(31, 6, 4, '20'),
(32, 6, 5, '20'),
(33, 6, 6, '20'),
(34, 6, 7, '20'),
(35, 6, 8, '20'),
(36, 6, 10, '5'),
(37, 6, 11, '10'),
(38, 6, 12, '5'),
(39, 6, 9, '40'),
(40, 6, 20, '30'),
(41, 6, 21, '1'),
(42, 6, 22, '20'),
(44, 6, 23, '5'),
(61, 11, 0, '8'),
(62, 11, 1, '8'),
(63, 11, 3, '8'),
(64, 11, 4, '8'),
(65, 11, 5, '8'),
(66, 11, 6, '8'),
(67, 11, 7, '8'),
(68, 11, 8, '8'),
(69, 11, 10, '8'),
(70, 11, 11, '8'),
(71, 11, 12, '8'),
(72, 11, 19, '8'),
(73, 11, 20, '8'),
(74, 11, 21, 'Temperatura del eje'),
(75, 11, 22, '8'),
(76, 11, 23, '8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loadcicle`
--

CREATE TABLE IF NOT EXISTS `loadcicle` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_operationalModuleDetail` bigint(11) NOT NULL,
  `number` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `load` float NOT NULL,
  `fall` float NOT NULL,
  `unload` float NOT NULL,
  `machineCollision` float NOT NULL,
  `tunelCollision` float NOT NULL,
  PRIMARY KEY (`pk_id`),
  KEY `fk_operationalModuleDetail` (`fk_operationalModuleDetail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_moduleType` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `fk_moduleType` (`fk_moduleType`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `module`
--

INSERT INTO `module` (`id`, `fk_moduleType`, `name`) VALUES
(10, 1, 'Módulo 1'),
(11, 1, 'Módulo 2'),
(12, 1, 'Módulo 3'),
(18, 2, 'Módulo 4'),
(19, 3, 'Módulo 5'),
(20, 3, 'Módulo 6'),
(21, 3, 'Módulo 7'),
(22, 3, 'Módulo 8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moduletype`
--

CREATE TABLE IF NOT EXISTS `moduletype` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `moduletype`
--

INSERT INTO `moduletype` (`id`, `name`) VALUES
(1, 'Módulo de Información'),
(2, 'Módulo de Chequeo'),
(3, 'Módulo Operacional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operationalcheckquestion`
--

CREATE TABLE IF NOT EXISTS `operationalcheckquestion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_ckeckModule` bigint(20) NOT NULL,
  `questionName` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ckeckModule` (`fk_ckeckModule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operationalmodule`
--

CREATE TABLE IF NOT EXISTS `operationalmodule` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_moduleType` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_moduleType` (`fk_moduleType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operationalmoduleanswer`
--

CREATE TABLE IF NOT EXISTS `operationalmoduleanswer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `correct` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operationalmodulecheckdetail`
--

CREATE TABLE IF NOT EXISTS `operationalmodulecheckdetail` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_operationalModuleDetail` bigint(20) NOT NULL,
  `QuestionMade` bigint(20) NOT NULL,
  `questionface` int(11) NOT NULL,
  `correctAnswer` tinyint(1) NOT NULL,
  `madeAnswer` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_operationalModuleDetail` (`fk_operationalModuleDetail`),
  KEY `fk_questionMade` (`QuestionMade`),
  KEY `QuestionMade` (`QuestionMade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operationalmoduledetail`
--

CREATE TABLE IF NOT EXISTS `operationalmoduledetail` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_realizationModule` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_realizationModule` (`fk_realizationModule`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `operationalmoduledetail`
--

INSERT INTO `operationalmoduledetail` (`id`, `fk_realizationModule`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operationalmoduleestadisticdetail`
--

CREATE TABLE IF NOT EXISTS `operationalmoduleestadisticdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_operationalModuleDetail` bigint(20) NOT NULL,
  `fk_detail` bigint(20) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_operationalModuleDetail` (`fk_operationalModuleDetail`),
  KEY `fk_Detail` (`fk_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `operationalmoduleestadisticdetail`
--

INSERT INTO `operationalmoduleestadisticdetail` (`id`, `fk_operationalModuleDetail`, `fk_detail`, `value`) VALUES
(1, 1, 0, 10),
(2, 1, 1, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operationalmodulequestiondetail`
--

CREATE TABLE IF NOT EXISTS `operationalmodulequestiondetail` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_operationalModuleDetail` bigint(20) NOT NULL,
  `answerMade` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_operationalModuleDetail` (`fk_operationalModuleDetail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operationalmodulequestions`
--

CREATE TABLE IF NOT EXISTS `operationalmodulequestions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_moduleInformationQuestion` bigint(20) NOT NULL,
  `question` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_moduleInformationQuestion` (`fk_moduleInformationQuestion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questionmakedinformationmodule`
--

CREATE TABLE IF NOT EXISTS `questionmakedinformationmodule` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_realizationModule` int(11) NOT NULL,
  `fk_questionID` int(11) NOT NULL,
  `fk_answerID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=245 ;

--
-- Volcado de datos para la tabla `questionmakedinformationmodule`
--

INSERT INTO `questionmakedinformationmodule` (`id`, `fk_realizationModule`, `fk_questionID`, `fk_answerID`) VALUES
(1, 1, 6, 17),
(2, 1, 6, 13),
(3, 1, 6, 15),
(4, 1, 6, 11),
(5, 1, 7, 8),
(6, 1, 7, 6),
(7, 1, 7, 18),
(8, 1, 7, 19),
(9, 1, 6, 11),
(10, 1, 6, 16),
(11, 1, 6, 17),
(12, 1, 6, 13),
(13, 1, 7, 6),
(14, 1, 7, 19),
(15, 1, 7, 8),
(16, 1, 7, 7),
(17, 1, 6, 17),
(18, 1, 6, 16),
(19, 1, 6, 13),
(20, 1, 6, 11),
(21, 1, 7, 7),
(22, 1, 7, 8),
(23, 1, 7, 18),
(24, 1, 7, 6),
(25, 1, 6, 13),
(26, 1, 6, 17),
(27, 1, 6, 11),
(28, 1, 6, 16),
(29, 1, 7, 7),
(30, 1, 7, 8),
(31, 1, 7, 19),
(32, 1, 7, 6),
(33, 1, 6, 17),
(34, 1, 6, 11),
(35, 1, 6, 16),
(36, 1, 6, 15),
(37, 1, 7, 6),
(38, 1, 7, 19),
(39, 1, 7, 8),
(40, 1, 7, 7),
(41, 1, 6, 17),
(42, 1, 6, 13),
(43, 1, 6, 11),
(44, 1, 6, 16),
(45, 1, 7, 19),
(46, 1, 7, 6),
(47, 1, 7, 7),
(48, 1, 7, 8),
(49, 1, 6, 11),
(50, 1, 6, 17),
(51, 1, 6, 15),
(52, 1, 6, 14),
(53, 1, 7, 18),
(54, 1, 7, 7),
(55, 1, 7, 6),
(56, 1, 7, 8),
(57, 1, 6, 14),
(58, 1, 6, 11),
(59, 1, 6, 17),
(60, 1, 6, 15),
(61, 1, 7, 19),
(62, 1, 7, 6),
(63, 1, 7, 7),
(64, 1, 7, 8),
(65, 1, 6, 13),
(66, 1, 6, 14),
(67, 1, 6, 16),
(68, 1, 6, 11),
(69, 1, 7, 19),
(70, 1, 7, 8),
(71, 1, 7, 6),
(72, 1, 7, 7),
(73, 1, 6, 11),
(74, 1, 6, 14),
(75, 1, 6, 16),
(76, 1, 6, 15),
(77, 1, 7, 19),
(78, 1, 7, 8),
(79, 1, 7, 7),
(80, 1, 7, 18),
(81, 1, 6, 16),
(82, 1, 6, 14),
(83, 1, 6, 11),
(84, 1, 6, 17),
(85, 1, 7, 8),
(86, 1, 7, 6),
(87, 1, 7, 19),
(88, 1, 7, 7),
(89, 1, 6, 14),
(90, 1, 6, 16),
(91, 1, 6, 13),
(92, 1, 6, 11),
(93, 1, 7, 19),
(94, 1, 7, 8),
(95, 1, 7, 7),
(96, 1, 7, 18),
(97, 1, 6, 17),
(98, 1, 6, 14),
(99, 1, 6, 15),
(100, 1, 6, 11),
(101, 1, 7, 18),
(102, 1, 7, 8),
(103, 1, 7, 19),
(104, 1, 7, 7),
(105, 1, 6, 15),
(106, 1, 6, 17),
(107, 1, 6, 11),
(108, 1, 6, 16),
(109, 1, 7, 8),
(110, 1, 7, 6),
(111, 1, 7, 18),
(112, 1, 7, 19),
(113, 1, 6, 16),
(114, 1, 6, 17),
(115, 1, 6, 11),
(116, 1, 6, 15),
(117, 1, 7, 18),
(118, 1, 7, 8),
(119, 1, 7, 7),
(120, 1, 7, 19),
(121, 1, 6, 14),
(122, 1, 6, 11),
(123, 1, 6, 16),
(124, 1, 6, 15),
(125, 1, 7, 7),
(126, 1, 7, 6),
(127, 1, 7, 8),
(128, 1, 7, 19),
(129, 1, 6, 11),
(130, 1, 6, 17),
(131, 1, 6, 14),
(132, 1, 6, 13),
(133, 1, 7, 6),
(134, 1, 7, 8),
(135, 1, 7, 19),
(136, 1, 7, 18),
(137, 1, 6, 11),
(138, 1, 6, 14),
(139, 1, 6, 13),
(140, 1, 6, 15),
(141, 1, 7, 19),
(142, 1, 7, 6),
(143, 1, 7, 7),
(144, 1, 7, 8),
(145, 1, 6, 17),
(146, 1, 6, 11),
(147, 1, 6, 13),
(148, 1, 6, 14),
(149, 1, 7, 19),
(150, 1, 7, 8),
(151, 1, 7, 6),
(152, 1, 7, 7),
(153, 1, 6, 11),
(154, 1, 6, 17),
(155, 1, 6, 16),
(156, 1, 6, 15),
(157, 1, 7, 7),
(158, 1, 7, 18),
(159, 1, 7, 19),
(160, 1, 7, 8),
(161, 1, 6, 17),
(162, 1, 6, 16),
(163, 1, 6, 11),
(164, 1, 6, 15),
(165, 1, 7, 8),
(166, 1, 7, 19),
(167, 1, 7, 7),
(168, 1, 7, 18),
(169, 1, 8, 20),
(170, 1, 8, 21),
(171, 1, 8, 22),
(172, 1, 8, 0),
(173, 1, 6, 15),
(174, 1, 6, 11),
(175, 1, 6, 13),
(176, 1, 6, 17),
(177, 1, 7, 7),
(178, 1, 7, 19),
(179, 1, 7, 8),
(180, 1, 7, 18),
(181, 1, 8, 20),
(182, 1, 8, 21),
(183, 1, 8, 24),
(184, 1, 8, 22),
(185, 1, 6, 11),
(186, 1, 6, 17),
(187, 1, 6, 14),
(188, 1, 6, 16),
(189, 1, 7, 19),
(190, 1, 7, 8),
(191, 1, 7, 18),
(192, 1, 7, 7),
(193, 1, 8, 20),
(194, 1, 8, 22),
(195, 1, 8, 24),
(196, 1, 8, 21),
(197, 1, 6, 11),
(198, 1, 6, 17),
(199, 1, 6, 16),
(200, 1, 6, 13),
(201, 1, 7, 18),
(202, 1, 7, 7),
(203, 1, 7, 19),
(204, 1, 7, 8),
(205, 1, 8, 20),
(206, 1, 8, 21),
(207, 1, 8, 22),
(208, 1, 8, 24),
(209, 1, 6, 11),
(210, 1, 6, 15),
(211, 1, 6, 16),
(212, 1, 6, 13),
(213, 1, 7, 8),
(214, 1, 7, 18),
(215, 1, 7, 19),
(216, 1, 7, 7),
(217, 1, 8, 23),
(218, 1, 8, 24),
(219, 1, 8, 21),
(220, 1, 8, 22),
(221, 1, 6, 13),
(222, 1, 6, 15),
(223, 1, 6, 16),
(224, 1, 6, 11),
(225, 1, 7, 6),
(226, 1, 7, 19),
(227, 1, 7, 18),
(228, 1, 7, 8),
(229, 1, 8, 24),
(230, 1, 8, 23),
(231, 1, 8, 22),
(232, 1, 8, 21),
(233, 1, 6, 13),
(234, 1, 6, 15),
(235, 1, 6, 14),
(236, 1, 6, 11),
(237, 1, 7, 8),
(238, 1, 7, 7),
(239, 1, 7, 19),
(240, 1, 7, 18),
(241, 1, 8, 20),
(242, 1, 8, 24),
(243, 1, 8, 21),
(244, 1, 8, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `realizationmodule`
--

CREATE TABLE IF NOT EXISTS `realizationmodule` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_user` bigint(20) NOT NULL,
  `fk_instancemodule` bigint(20) NOT NULL,
  `dateIni` varchar(20) NOT NULL,
  `time` int(20) NOT NULL,
  `supervisor` bigint(20) NOT NULL,
  `percentageQuestions` int(11) NOT NULL,
  `percentageCheck1` int(11) NOT NULL,
  `percentageCheck2` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user` (`fk_user`),
  KEY `fk_moduleInstance` (`fk_instancemodule`),
  KEY `fk_user_2` (`fk_user`),
  KEY `fk_moduleInstance_2` (`fk_instancemodule`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `realizationmodule`
--

INSERT INTO `realizationmodule` (`id`, `fk_user`, `fk_instancemodule`, `dateIni`, `time`, `supervisor`, `percentageQuestions`, `percentageCheck1`, `percentageCheck2`) VALUES
(1, 1, 1, '2016-02-03 21:00:00', 12, 0, 0, 0, 0),
(2, 1, 2, '2016-02-03 22:00:00', 12, 1, 12, 12, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_module` bigint(20) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `orderSlider` int(11) NOT NULL,
  `designe` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_informationModule` (`fk_module`),
  KEY `fk_informationModule_2` (`fk_module`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`id`, `fk_module`, `Title`, `orderSlider`, `designe`) VALUES
(11, 10, 'Informacion primaria', 0, 'Diseño1.png'),
(15, 10, 'aa', 1, 'Diseño2.png'),
(16, 10, 'sdf', 2, 'Diseño3.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `statistics`
--

CREATE TABLE IF NOT EXISTS `statistics` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_OperationalModule` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_OperationalModule` (`fk_OperationalModule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `statisticsdetail`
--

CREATE TABLE IF NOT EXISTS `statisticsdetail` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_statistics` bigint(20) NOT NULL,
  `fk_detail` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_statistics` (`fk_statistics`),
  KEY `fk_detail` (`fk_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `structure`
--

CREATE TABLE IF NOT EXISTS `structure` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_informationPageDesign` bigint(20) NOT NULL,
  `text` text NOT NULL,
  `icon` varchar(50) NOT NULL,
  `background` varchar(50) NOT NULL,
  `fontColor` varchar(20) NOT NULL,
  `orderStructure` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_informationPageDesign` (`fk_informationPageDesign`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `structure`
--

INSERT INTO `structure` (`id`, `fk_informationPageDesign`, `text`, `icon`, `background`, `fontColor`, `orderStructure`) VALUES
(3, 11, 'sdfsdf', '1a.png', '', 'Black ', 0),
(5, 12, 'sdfsdf', '1a.png', 'White', 'Black  ', 0),
(6, 13, 'primer texto', '', '', 'Black ', 0),
(7, 13, 'segundo texto', '', '', 'Black ', 1),
(8, 13, 'este es un parrafo mas largo de lo que generalmente se agregara en este sistema', '', '', 'Black ', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisor`
--

CREATE TABLE IF NOT EXISTS `supervisor` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `rut` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `supervisor`
--

INSERT INTO `supervisor` (`id`, `user`, `pass`, `name`, `gender`, `rut`, `address`, `email`, `phone`) VALUES
(1, 'supervisor1', '175cca0310b93021a7d3cfb3e4877ab6', 'Mike', 'Launher', '15785495-5', 'direccion 1', 'email1', '586558565'),
(2, 's1', '8ddf878039b70767c4a5bcf4f0c4f65e', 'wqeq rwer', 'Hombre', NULL, '', 'ewrwer@ewrw.com', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisor_user`
--

CREATE TABLE IF NOT EXISTS `supervisor_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_supervisor` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `supervisor_user`
--

INSERT INTO `supervisor_user` (`id`, `fk_supervisor`, `fk_user`) VALUES
(2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `rut` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `user`, `pass`, `name`, `gender`, `rut`, `address`, `email`, `phone`) VALUES
(1, 'user1', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 't1', '83f1535f99ab0bf4e9d02dfd85d3e3f7', 'qweqwe', 'Mujer', NULL, '123', 'ewqeqwe@dasdsasd.com', NULL),
(3, 't2', '0f826a89cf68c399c5f4cf320c1a5842', 'wer werwer', 'Mujer', NULL, 'wer2', 'tete@ewdewwe.com', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `checkmodule`
--
ALTER TABLE `checkmodule`
  ADD CONSTRAINT `checkmodule_ibfk_1` FOREIGN KEY (`fk_module`) REFERENCES `module` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkmodule_ibfk_2` FOREIGN KEY (`fk_checkQuestions`) REFERENCES `checkquestions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `checkmoduledetail`
--
ALTER TABLE `checkmoduledetail`
  ADD CONSTRAINT `CheckModuleDetail_ibfk_1` FOREIGN KEY (`fk_realizationModule`) REFERENCES `realizationmodule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CheckModuleDetail_ibfk_2` FOREIGN KEY (`fk_checkQuestion`) REFERENCES `checkquestions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `informationmoduleanswers`
--
ALTER TABLE `informationmoduleanswers`
  ADD CONSTRAINT `InformationModuleAnswers_ibfk_1` FOREIGN KEY (`fk_informationModuleQuestions`) REFERENCES `informationmodulequestion` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `InformationModuleAnswers_ibfk_2` FOREIGN KEY (`fk_informationModuleQuestions`) REFERENCES `informationmodulequestion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `informationmoduledetail`
--
ALTER TABLE `informationmoduledetail`
  ADD CONSTRAINT `InformationModuleDetail_ibfk_1` FOREIGN KEY (`fk_informationModuleAnswers`) REFERENCES `informationmoduleanswers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `InformationModuleDetail_ibfk_2` FOREIGN KEY (`fk_realizationModule`) REFERENCES `realizationmodule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `informationmodulequestion`
--
ALTER TABLE `informationmodulequestion`
  ADD CONSTRAINT `InformationModuleQuestion_ibfk_1` FOREIGN KEY (`fk_module`) REFERENCES `module` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `informationpagedesign`
--
ALTER TABLE `informationpagedesign`
  ADD CONSTRAINT `InformationPageDesign_ibfk_1` FOREIGN KEY (`fk_slider`) REFERENCES `slider` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `InformationPageDesign_ibfk_2` FOREIGN KEY (`fk_DesignType`) REFERENCES `designtype` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `instancemodule`
--
ALTER TABLE `instancemodule`
  ADD CONSTRAINT `InstanceModule_ibfk_1` FOREIGN KEY (`fk_module`) REFERENCES `module` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `InstanceModule_ibfk_2` FOREIGN KEY (`fk_supervisor`) REFERENCES `supervisor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `instancemodule_detail`
--
ALTER TABLE `instancemodule_detail`
  ADD CONSTRAINT `instancemodule_detail_ibfk_1` FOREIGN KEY (`fk_instancemodule`) REFERENCES `instancemodule` (`id`),
  ADD CONSTRAINT `instancemodule_detail_ibfk_2` FOREIGN KEY (`fk_detail`) REFERENCES `detail` (`id`);

--
-- Filtros para la tabla `loadcicle`
--
ALTER TABLE `loadcicle`
  ADD CONSTRAINT `loadcicle_ibfk_1` FOREIGN KEY (`fk_operationalModuleDetail`) REFERENCES `operationalmoduledetail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `Module_ibfk_1` FOREIGN KEY (`fk_moduleType`) REFERENCES `moduletype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `operationalcheckquestion`
--
ALTER TABLE `operationalcheckquestion`
  ADD CONSTRAINT `OperationalCheckQuestion_ibfk_1` FOREIGN KEY (`fk_ckeckModule`) REFERENCES `checkmodule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `operationalmodule`
--
ALTER TABLE `operationalmodule`
  ADD CONSTRAINT `OperationalModule_ibfk_1` FOREIGN KEY (`fk_moduleType`) REFERENCES `moduletype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `operationalmodulecheckdetail`
--
ALTER TABLE `operationalmodulecheckdetail`
  ADD CONSTRAINT `OperationalModeuleCheckDetail_ibfk_1` FOREIGN KEY (`fk_operationalModuleDetail`) REFERENCES `operationalmoduledetail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `operationalmoduledetail`
--
ALTER TABLE `operationalmoduledetail`
  ADD CONSTRAINT `OperationalModuleDetail_ibfk_1` FOREIGN KEY (`fk_realizationModule`) REFERENCES `realizationmodule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `operationalmoduleestadisticdetail`
--
ALTER TABLE `operationalmoduleestadisticdetail`
  ADD CONSTRAINT `OperationalModuleEstadisticDetail_ibfk_1` FOREIGN KEY (`fk_operationalModuleDetail`) REFERENCES `operationalmoduledetail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `OperationalModuleEstadisticDetail_ibfk_2` FOREIGN KEY (`fk_detail`) REFERENCES `detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `operationalmodulequestiondetail`
--
ALTER TABLE `operationalmodulequestiondetail`
  ADD CONSTRAINT `OperationalModuleQuestionDetail_ibfk_1` FOREIGN KEY (`fk_operationalModuleDetail`) REFERENCES `operationalmoduledetail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `operationalmodulequestions`
--
ALTER TABLE `operationalmodulequestions`
  ADD CONSTRAINT `OperationalModuleQuestions_ibfk_1` FOREIGN KEY (`fk_moduleInformationQuestion`) REFERENCES `informationmodulequestion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `realizationmodule`
--
ALTER TABLE `realizationmodule`
  ADD CONSTRAINT `RealizationModule_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RealizationModule_ibfk_2` FOREIGN KEY (`fk_instancemodule`) REFERENCES `instancemodule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `slider`
--
ALTER TABLE `slider`
  ADD CONSTRAINT `Slider_ibfk_1` FOREIGN KEY (`fk_module`) REFERENCES `module` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
