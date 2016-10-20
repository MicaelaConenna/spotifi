-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-10-2016 a las 08:02:30
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `spotifi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE IF NOT EXISTS `artista` (
  `id_artista` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_artista`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `artista`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE IF NOT EXISTS `cancion` (
  `id_cancion` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `id_artista` int(11) DEFAULT NULL,
  `album` varchar(50) DEFAULT NULL,
  `duracion` varchar(50) DEFAULT NULL,
  `id_genero` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cancion`),
  KEY `id_artista` (`id_artista`),
  KEY `id_genero` (`id_genero`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `cancion`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion_playlist`
--

CREATE TABLE IF NOT EXISTS `cancion_playlist` (
  `id_cancion_playlist` int(11) NOT NULL AUTO_INCREMENT,
  `id_cancion` int(11) DEFAULT NULL,
  `id_playlist` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cancion_playlist`),
  KEY `id_cancion` (`id_cancion`),
  KEY `id_playlist` (`id_playlist`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `cancion_playlist`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `id_color` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_color`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `color`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `estado`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorita`
--

CREATE TABLE IF NOT EXISTS `favorita` (
  `id_favorita` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_playlist` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_favorita`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_playlist` (`id_playlist`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `favorita`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
  `id_genero` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `genero`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `id_playlist` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `qr` varchar(50) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `esta_bloqueada` tinyint(1) DEFAULT NULL,
  `id_color` int(11) DEFAULT NULL,
  `cantidad_reproduccion` int(11) DEFAULT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `id_tipo_acceso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_playlist`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_color` (`id_color`),
  KEY `id_genero` (`id_genero`),
  KEY `id_tipo_acceso` (`id_tipo_acceso`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `playlist`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_playlist`
--

CREATE TABLE IF NOT EXISTS `reporte_playlist` (
  `id_reporte_playlist` int(11) NOT NULL AUTO_INCREMENT,
  `id_reportador` int(11) DEFAULT NULL,
  `id_playlist` int(11) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_reporte_playlist`),
  KEY `id_reportador` (`id_reportador`),
  KEY `id_playlist` (`id_playlist`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `reporte_playlist`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_usuario`
--

CREATE TABLE IF NOT EXISTS `reporte_usuario` (
  `id_reporte_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_reportador` int(11) DEFAULT NULL,
  `id_reportado` int(11) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_reporte_usuario`),
  KEY `id_reportador` (`id_reportador`),
  KEY `id_reportado` (`id_reportado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `reporte_usuario`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguidor_usuario`
--

CREATE TABLE IF NOT EXISTS `seguidor_usuario` (
  `id_seguidor_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_seguidor` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_seguidor_usuario`),
  KEY `id_seguidor` (`id_seguidor`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_estado` (`id_estado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `seguidor_usuario`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_acceso`
--

CREATE TABLE IF NOT EXISTS `tipo_acceso` (
  `id_tipo_acceso` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_acceso` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_acceso`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tipo_acceso`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `clave` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `latitud` varchar(50) DEFAULT NULL,
  `longitud` varchar(50) DEFAULT NULL,
  `es_admin` tinyint(1) DEFAULT NULL,
  `esta_bloqueado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `clave`, `email`, `latitud`, `longitud`, `es_admin`, `esta_bloqueado`) VALUES
(26, 'Rodrigo', 'javierjavier', 'mcd77_1990@hotmail.com', '123123asdas', 'dasdasd22', 0, 0),
(25, '', '', '', '', '', 0, 0),
(23, '', '', '', '', '', 0, 0),
(22, 'rodrigo', 'fae0b27c451c728867a567e8c1bb4e', 'mcd77.1990@gmail.com', '123123', '123123123123aaa', 0, 0),
(24, 'rodrigo', 'javier', 'javier', 'asdasd', '123123', 0, 0),
(20, 'pepe', '3c9c03d6008a5adf42c2a55dd4a1a9', 'rodrigo@yahoo.com', 'assad1', '2123123', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voto`
--

CREATE TABLE IF NOT EXISTS `voto` (
  `id_voto` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_playlist` int(11) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_voto`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_playlist` (`id_playlist`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `voto`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
