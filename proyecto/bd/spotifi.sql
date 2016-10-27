-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2016 a las 02:09:22
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `spotifi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE `artista` (
  `id_artista` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`id_artista`, `nombre`) VALUES
(1, 'Eruca Sativa'),
(2, 'Las Taradas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE `cancion` (
  `id_cancion` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `id_artista` int(11) DEFAULT NULL,
  `album` varchar(50) DEFAULT NULL,
  `duracion` varchar(50) DEFAULT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `archivo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`id_cancion`, `titulo`, `id_artista`, `album`, `duracion`, `id_genero`, `archivo`) VALUES
(1, 'Frío Cemento', 1, 'La Carne', '3:38', 1, 'Eruca_sativa_frio_cemento.mp3'),
(2, 'La carne', 1, 'La Carne', '4:02', 1, 'Eruca_sativa_la_carne.mp3'),
(3, 'Paraiso en retro', 1, 'ES', '4:22', 1, 'Eruca_sativa_paraiso_en_retro.mp3'),
(4, 'Beir mir bistu shein', 2, 'Son y se hacen', '2:45', 2, 'las_taradas_beir_mir_bistu_shein.mp3'),
(5, 'Que no!', 2, 'Son y se hacen', '3:23', 2, 'las_taradas_que_no.mp3'),
(6, 'You are the boss', 2, 'Son y se hacen', '4:22', 2, 'las_taradas_you_are_the_boss.mp3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion_playlist`
--

CREATE TABLE `cancion_playlist` (
  `id_cancion_playlist` int(11) NOT NULL,
  `id_cancion` int(11) DEFAULT NULL,
  `id_playlist` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cancion_playlist`
--

INSERT INTO `cancion_playlist` (`id_cancion_playlist`, `id_cancion`, `id_playlist`) VALUES
(1, 4, 1),
(2, 5, 1),
(3, 6, 1),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 4, 3),
(8, 5, 3),
(9, 6, 3),
(10, 1, 4),
(11, 2, 4),
(12, 3, 4),
(13, 1, 5),
(14, 2, 5),
(15, 3, 5),
(16, 1, 6),
(17, 2, 6),
(18, 3, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `color` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id_color`, `color`) VALUES
(1, 'Verde'),
(2, 'Naranja'),
(3, 'Amarillo'),
(4, 'Celeste');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorita`
--

CREATE TABLE `favorita` (
  `id_favorita` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_playlist` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `favorita`
--

INSERT INTO `favorita` (`id_favorita`, `id_usuario`, `id_playlist`) VALUES
(1, 27, 3),
(2, 27, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `genero` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `genero`) VALUES
(1, 'Rock'),
(2, 'Swing');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `playlist`
--

CREATE TABLE `playlist` (
  `id_playlist` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `qr` varchar(50) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `esta_bloqueada` tinyint(1) DEFAULT NULL,
  `id_color` int(11) DEFAULT NULL,
  `cantidad_reproduccion` int(11) DEFAULT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `id_tipo_acceso` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `playlist`
--

INSERT INTO `playlist` (`id_playlist`, `nombre`, `foto`, `qr`, `id_usuario`, `esta_bloqueada`, `id_color`, `cantidad_reproduccion`, `id_genero`, `id_tipo_acceso`) VALUES
(1, 'Las Taradas', 'las_taradas.jpg', NULL, 27, NULL, 1, NULL, 2, 1),
(2, 'Las Taradas 2', 'las_taradas.jpg', NULL, 27, NULL, 1, NULL, 2, 1),
(3, 'Las Taradas otro', 'las_taradas.jpg', NULL, 27, NULL, 1, NULL, 2, 1),
(4, 'Eruca Sativa', 'eruca.jpg', NULL, 27, NULL, 2, 2, 1, 1),
(5, 'Eruca Sativa 2', 'eruca.jpg', NULL, 27, NULL, 2, 2, 1, 1),
(6, 'Eruca Sativa otro', 'eruca.jpg', NULL, 27, NULL, 2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_playlist`
--

CREATE TABLE `reporte_playlist` (
  `id_reporte_playlist` int(11) NOT NULL,
  `id_reportador` int(11) DEFAULT NULL,
  `id_playlist` int(11) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_usuario`
--

CREATE TABLE `reporte_usuario` (
  `id_reporte_usuario` int(11) NOT NULL,
  `id_reportador` int(11) DEFAULT NULL,
  `id_reportado` int(11) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguidor_usuario`
--

CREATE TABLE `seguidor_usuario` (
  `id_seguidor_usuario` int(11) NOT NULL,
  `id_seguidor` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguidor_usuario`
--

INSERT INTO `seguidor_usuario` (`id_seguidor_usuario`, `id_seguidor`, `id_usuario`, `id_estado`) VALUES
(1, 27, 26, NULL),
(2, 27, 31, NULL),
(3, 27, 33, NULL),
(4, 33, 27, NULL),
(5, 20, 27, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_acceso`
--

CREATE TABLE `tipo_acceso` (
  `id_tipo_acceso` int(11) NOT NULL,
  `tipo_acceso` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_acceso`
--

INSERT INTO `tipo_acceso` (`id_tipo_acceso`, `tipo_acceso`) VALUES
(1, 'Publica'),
(2, 'Privada'),
(3, 'Solo yo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `clave` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `latitud` varchar(50) DEFAULT NULL,
  `longitud` varchar(50) DEFAULT NULL,
  `es_admin` tinyint(1) DEFAULT NULL,
  `esta_bloqueado` tinyint(1) DEFAULT NULL,
  `token` varchar(100) NOT NULL,
  `estado_registro` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `clave`, `email`, `latitud`, `longitud`, `es_admin`, `esta_bloqueado`, `token`, `estado_registro`) VALUES
(26, 'Rodrigo', 'javierjavier', 'mcd77_1990@hotmail.com', '123123asdas', 'dasdasd22', 0, 0, '', 0),
(22, 'rodrigo', 'fae0b27c451c728867a567e8c1bb4e', 'mcd77.1990@gmail.com', '123123', '123123123123aaa', 0, 0, '', 0),
(24, 'rodrigo', 'javier', 'javier', 'asdasd', '123123', 0, 0, '', 0),
(20, 'pepe', '3c9c03d6008a5adf42c2a55dd4a1a9', 'rodrigo@yahoo.com', 'assad1', '2123123', 0, 0, '', 0),
(27, 'Romina', '910b6c78a8482033b971116f02441ce4', 'romina@mimetica.com.ar', '(-34.66078125710747, -58.63223075866699)', '10', 0, 0, '', 1),
(31, 'Romi', '910b6c78a8482033b971116f02441ce4', 'rominacodarin@gmail.com', '(-34.667558447285494, -58.63085746765137)', '10', 0, 0, '', 0),
(33, '', '910b6c78a8482033b971116f02441ce4', 'rominina2002@yahoo.com.ar', '(-34.64157620821004, -58.65694999694824)', '10', 0, 0, '1d646a9e67c76a585593db85c6e81a1f', 1),
(32, 'Romi', '910b6c78a8482033b971116f02441ce4', 'rominacodarin@gmail.com', '(-34.667558447285494, -58.63085746765137)', '10', 0, 0, '5af711f0a3a8b5d49a3fa7d50c48a7d7', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voto`
--

CREATE TABLE `voto` (
  `id_voto` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_playlist` int(11) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `voto`
--

INSERT INTO `voto` (`id_voto`, `id_usuario`, `id_playlist`, `fecha`) VALUES
(1, 27, 1, '123223333333'),
(2, 27, 2, '122222222'),
(3, 25, 2, '122222221111');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`id_artista`);

--
-- Indices de la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD PRIMARY KEY (`id_cancion`),
  ADD KEY `id_artista` (`id_artista`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indices de la tabla `cancion_playlist`
--
ALTER TABLE `cancion_playlist`
  ADD PRIMARY KEY (`id_cancion_playlist`),
  ADD KEY `id_cancion` (`id_cancion`),
  ADD KEY `id_playlist` (`id_playlist`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `favorita`
--
ALTER TABLE `favorita`
  ADD PRIMARY KEY (`id_favorita`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_playlist` (`id_playlist`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id_playlist`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_tipo_acceso` (`id_tipo_acceso`);

--
-- Indices de la tabla `reporte_playlist`
--
ALTER TABLE `reporte_playlist`
  ADD PRIMARY KEY (`id_reporte_playlist`),
  ADD KEY `id_reportador` (`id_reportador`),
  ADD KEY `id_playlist` (`id_playlist`);

--
-- Indices de la tabla `reporte_usuario`
--
ALTER TABLE `reporte_usuario`
  ADD PRIMARY KEY (`id_reporte_usuario`),
  ADD KEY `id_reportador` (`id_reportador`),
  ADD KEY `id_reportado` (`id_reportado`);

--
-- Indices de la tabla `seguidor_usuario`
--
ALTER TABLE `seguidor_usuario`
  ADD PRIMARY KEY (`id_seguidor_usuario`),
  ADD KEY `id_seguidor` (`id_seguidor`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `tipo_acceso`
--
ALTER TABLE `tipo_acceso`
  ADD PRIMARY KEY (`id_tipo_acceso`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `voto`
--
ALTER TABLE `voto`
  ADD PRIMARY KEY (`id_voto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_playlist` (`id_playlist`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artista`
--
ALTER TABLE `artista`
  MODIFY `id_artista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cancion`
--
ALTER TABLE `cancion`
  MODIFY `id_cancion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cancion_playlist`
--
ALTER TABLE `cancion_playlist`
  MODIFY `id_cancion_playlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `favorita`
--
ALTER TABLE `favorita`
  MODIFY `id_favorita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id_playlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `reporte_playlist`
--
ALTER TABLE `reporte_playlist`
  MODIFY `id_reporte_playlist` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reporte_usuario`
--
ALTER TABLE `reporte_usuario`
  MODIFY `id_reporte_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `seguidor_usuario`
--
ALTER TABLE `seguidor_usuario`
  MODIFY `id_seguidor_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipo_acceso`
--
ALTER TABLE `tipo_acceso`
  MODIFY `id_tipo_acceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `voto`
--
ALTER TABLE `voto`
  MODIFY `id_voto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
