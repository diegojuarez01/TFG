SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web`
--

CREATE DATABASE IF NOT EXISTS `web` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `web`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `num_equipo` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `contrasenia` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `puntuacioncs` int(11) NOT NULL,
  `total_partidos_equipo` int(11) NOT NULL,
  `partidos_equipo_ganados` int(11) NOT NULL,
  `partidos_equipo_ganadoscs` int(11) NOT NULL,
  `partidos_equipo_perdidos` int(11) NOT NULL,
 `partidos_equipo_perdidoscs` int(11) NOT NULL,
  `jugador1` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `jugador2` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `jugador3` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `jugador4` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `jugador5` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `jugador6` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `fotografia` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `completo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`num_equipo`, `nombre`, `contrasenia`, `puntuacion`,`puntuacioncs`, `jugador1`, `jugador2`, `jugador3`, `jugador4`, `jugador5`, `jugador6`, `fotografia`, `completo`) VALUES
(1, 'WARRIORS', '$2y$10$/cqPQ1gunshqtka/0y40AOz1D1wWoQTYI6OgpjoXld8SMUHJD4SwC', 1000,1000, 'usuario2', 'usuario14', 'usuario15', 'usuario16', 'usuario17', '', 'Imagenes/Equipos/warrior.jpg',1),
(2, 'VIKINGS', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000, 'usuario1', 'usuario19', 'usuario20', 'usuario21', 'usuario22', '', 'Imagenes/Equipos/vikings.jpg',1),
(3, 'EAGLES', '$2y$10$UFNTBWBTtpxJ3qqbeXnrueNLlMnsaGwdo4W2lQi5XBEzhYQoSrNVu', 1000,1000, 'usuario3', 'usuario23', 'usuario24', 'usuario25', 'usuario26', '', 'Imagenes/Equipos/eagles.jpg',1),
(4, 'DRAGONS', '$2y$10$vxSySXX3kC1E1iG.VNCRYOH.Bu7b5f0BapazQmyzIgTLvMfplG.Ta', 1000,1000, 'usuario4', 'usuario27', 'usuario28', 'usuario29', 'usuario30', '', 'Imagenes/Equipos/dragons.jpg',1),
(5, 'DINO', '$2y$10$jtSAviolH/fzYy6u1bi4a.TXO9iHMbVI73JQuF6pYg1/Ks05vzGcu', 1000,1000, 'usuario5', 'usuario31', 'usuario33', 'usuario33', 'usuario34', '', 'Imagenes/Equipos/dino.jpg',1),
(6, 'DIREWOLVES', '$2y$10$rNccQ4Gi87FMNoCUzaZ8HO185D1DC0ot2LH78FokoKsvF4pWePH06', 1000,1000, 'usuario6', 'usuario35', 'usuario36', 'usuario37', 'usuario38', '', 'Imagenes/Equipos/direwolves.jpg',1),
(7, 'MYXMG', '$2y$10$3L85Ob2GLIDKt0R/ptAJme6o8gq.mYxSMRo6KiSNdCgVV/kuzZ8Ga', 1000,1000, 'usuario7', 'usuario39', 'usuario40', 'usuario41', 'usuario42', '', 'Imagenes/Equipos/myxmg.jpg',1),
(8, 'POLLOS', '$2y$10$HqqfqG0EeVjrDmGUSvwRpetr2vApfn4eO6/lwFvMEIAdY72wYmSIK', 1000,1000, 'usuario8', 'usuario43', 'usuario44', 'usuario45', 'usuario46', '', 'Imagenes/Equipos/pollos.jpg',1),
(9, 'REVENGE', '$2y$10$bEet/gOz1fr8MC34oKl7L.4GDoU6IYS8Tm4jrqpMpMqWZ8qreTeCS', 1000,1000, 'usuario9', 'usuario47', 'usuario48', 'usuario49', 'usuario50', '', 'Imagenes/Equipos/revenge.jpg',1),
(10, 'SPARTAN', '$2y$10$6SgiIcvABi7gy2XXf/.4zefpYj6FV.5Ha4RdiIbYSvYqjFvIxTNIC', 1000,1000, 'usuario10', 'usuario51', 'usuario55', '', '', '', 'Imagenes/Equipos/spartan.jpg',0),
(11, 'SANCTUM', '$2y$10$NGGcYdFkW11PMscaQzMvXOWgVl5U6.7UOzYndfXMj4tMdNASIOADu', 1000,1000, 'usuario11', 'usuario52', 'usuario56', '', '', '', 'Imagenes/Equipos/sanctum.jpg',0),
(12, 'TORNADO', '$2y$10$cuUmymhQEiYYKr4ugtob4.JdQfq2ppUaXBRsHaLgBsp7t1m3x1gDa', 1000,1000, 'usuario12', 'usuario53', 'usuario57', '', '', '', 'Imagenes/Equipos/tornado.jpg',0),
(13, 'XP', '$2y$10$ZsHG.ylRiQG2vbE7XvkIbuoM5IpXiC3w8ZSMrLMEO3U/JnDUcokWq', 1000,1000, 'usuario13', 'usuario54', 'usuario18', '', '', '', 'Imagenes/Equipos/xp.jpg',0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos_equipo`
--

CREATE TABLE `partidos_equipo` (
  `id_partido_equipo` int(11) NOT NULL,
  `locales` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `visitantes` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `ganador` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
    `kills_local` int(11) NOT NULL,
   `kills_visitante` int(11) NOT NULL,
    FOREIGN KEY (`locales`) REFERENCES equipo(`nombre`),
    FOREIGN KEY (`visitantes`) REFERENCES equipo(`nombre`),    
`fecha_partido` DATETIME NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


CREATE TABLE `partidos_equipo_cs` (
  `id_partido_equipo_cs` int(11) NOT NULL,
  `locales` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `visitantes` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `ganador` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
 `kills_local` int(11) NOT NULL,
`kills_visitante` int(11) NOT NULL,
  FOREIGN KEY (`locales`) REFERENCES equipo(`nombre`),
    FOREIGN KEY (`visitantes`) REFERENCES equipo(`nombre`),  
`fecha_partido` DATETIME NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


--
-- Estructura de tabla para la tabla `partidos_individuales`
--

CREATE TABLE `partidos_individuales` (
  `id_partido` int(11) NOT NULL,
  `jugador1` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `jugador2` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `ganador` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
 `kills_local` int(11) NOT NULL,
`kills_visitante` int(11) NOT NULL,
  FOREIGN KEY (`jugador1`) REFERENCES usuarios(`usuario`),
    FOREIGN KEY (`jugador2`) REFERENCES usuarios(`usuario`),  
`fecha_partido` DATETIME NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `partidos_individuales`
--

INSERT INTO `partidos_individuales` (`id_partido`, `jugador1`, `jugador2`, `ganador`, `kills_local` , `kills_visitante`,`fecha_partido`) VALUES
(1, 'usuario2', 'usuario1', 'usuario2',16,10 ,'2018-06-1 12:11:10');

--
-- Estructura de tabla para la tabla `partidos_individuales_cs`
--

CREATE TABLE `partidos_individuales_cs` (
  `id_partido_cs` int(11) NOT NULL,
  `jugador1` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `jugador2` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `ganador` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
 `kills_local` int(11) NOT NULL,
`kills_visitante` int(11) NOT NULL,
`fecha_partido` DATETIME NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



CREATE TABLE `soporte` (
  `num_soporte` int(11) NOT NULL AUTO_INCREMENT,
  `asunto` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `mensaje` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `usuario` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `estado` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `estado_admin` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`num_soporte`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


CREATE TABLE `mensajes_soporte` (
  `num_men_soporte` int(11) NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `admin` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `num_soporte` int(11) NOT NULL,
  PRIMARY KEY (`num_men_soporte`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `poblacion` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `provincia` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `dni` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL,
  `direccion` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL,
  `cp` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
  `tipo` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `fotografia` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `usuario` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `contrasenia` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `numequipo` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `puntuacioncs` int(11) NOT NULL,
  `total_partidos_usuario` int(11) NOT NULL,
  `partidos_usuario_ganados` int(11) NOT NULL,
  `partidos_usuario_ganadoscs` int(11) NOT NULL,
  `partidos_usuario_perdidos` int(11) NOT NULL,
  `partidos_usuario_perdidoscs` int(11) NOT NULL,
  `fecha_registro` DATETIME NOT NULL,
  `activo` int(11) NOT NULL,
   FOREIGN KEY (`numequipo`) REFERENCES equipo(`num_equipo`),  
   PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `poblacion`, `provincia`, `telefono`, `dni`, `direccion`, `cp`, `tipo`, `email`, `fotografia`, `usuario`, `contrasenia`, `puntuacion`,`puntuacioncs`,`total_partidos_usuario`,`partidos_usuario_ganados`,`partidos_usuario_perdidos`,`activo`,`fecha_registro`) VALUES
(1, 'Jorge', 'Perez Perez', 'Alicante', 'Alicate', '600123123', '10000011', 'av/ benidorm', '03002', 'Administrador', 'jorge@yahoo.es','Imagenes/Usuarios/usuario2.jpg', 'usuario2', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1030,1000,1,1,0,0,'2018-06-13 13:23:34'),
(2, 'Luis', 'Martinez Perez', 'Alicante', 'Alicante', '611600600', '100000012', 'C/ libertad', '03005', 'Usuario', 'Luis@hotmail.es','Imagenes/Usuarios/usuario1.jpg' , 'usuario1', '$2y$10$/cqPQ1gunshqtka/0y40AOz1D1wWoQTYI6OgpjoXld8SMUHJD4SwC', 970,1000,1,0,1,0,'2018-06-13 15:21:23'),
(3, 'Paco', 'Hernandez Oro', 'Alicante', 'Alicate', '622123123', '10000013', 'av/ benidorm', '30130', 'Administrador', 'Paco@yahoo.es', 'Imagenes/Usuarios/usuario3.jpg', 'usuario3', '$2y$10$UFNTBWBTtpxJ3qqbeXnrueNLlMnsaGwdo4W2lQi5XBEzhYQoSrNVu', 1000,1000,0,0,0,0,'2018-06-13 11:32:22'),
(4, 'Manolo', 'Gonzalez Hierro', 'Murcia', 'Murcia', '632301400', '100000014', 'C/ puerto rojo', '30130', 'Usuario', 'Manolo@hotmail.es', 'Imagenes/Usuarios/usuario4.jpg', 'usuario4', '$2y$10$vxSySXX3kC1E1iG.VNCRYOH.Bu7b5f0BapazQmyzIgTLvMfplG.Ta', 1000,1000,0,0,0,0,'2018-06-13 7:5:4'),
(5, 'Diego', 'Juarez Romero', 'Murcia', 'Murcia', '633413245', '100000015', 'C/ rio segura', '33452', 'Usuario', 'Diego@hotmail.es', 'Imagenes/Usuarios/usuario5.jpg', 'usuario5', '$2y$10$jtSAviolH/fzYy6u1bi4a.TXO9iHMbVI73JQuF6pYg1/Ks05vzGcu', 1000,1000,0,0,0,0,'2018-06-13 9:07:16'),
(6, 'Ignacio', 'Lidon Navarro', 'Murcia', 'Murcia', '632123212', '100000016', 'C/ pintor verde', '33453', 'Usuario', 'Ignacio@hotmail.es', 'Imagenes/Usuarios/usuario6.jpg', 'usuario6', '$2y$10$rNccQ4Gi87FMNoCUzaZ8HO185D1DC0ot2LH78FokoKsvF4pWePH06', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
(7, 'Manuel', 'Capel Sierra', 'Murcia', 'Murcia', '635555400', '100000017', 'C/ doctor loco', '35347', 'Usuario', 'Manuel@hotmail.es', 'Imagenes/Usuarios/usuario7.jpg', 'usuario7', '$2y$10$3L85Ob2GLIDKt0R/ptAJme6o8gq.mYxSMRo6KiSNdCgVV/kuzZ8Ga', 1000,1000,0,0,0,0,'2018-06-13 11:11:11'),
(8, 'Lorena', 'Navarro Navarro', 'Murcia', 'Murcia', '632342342', '100000018', 'C/ puerto de la sal', '31232', 'Usuario', 'Lorena@hotmail.es', 'Imagenes/Usuarios/usuario8.jpg', 'usuario8', '$2y$10$HqqfqG0EeVjrDmGUSvwRpetr2vApfn4eO6/lwFvMEIAdY72wYmSIK', 1000,1000,0,0,0,0,'2018-06-13 10:13:14'),
(9, 'Andrea', 'Marin Onteniente', 'Murcia', 'Murcia', '632321334', '100000019', 'C/ pintor verde', '34334', 'Usuario', 'Andrea@hotmail.es', 'Imagenes/Usuarios/usuario9.jpg', 'usuario9', '$2y$10$bEet/gOz1fr8MC34oKl7L.4GDoU6IYS8Tm4jrqpMpMqWZ8qreTeCS', 1000,1000,0,0,0,0,'2018-06-13 10:23:12'),
(10, 'Pedro', 'Burillo pardo', 'Murcia', 'Murcia', '623112233', '100000020', 'C/ pintor azul', '32342', 'Usuario', 'Pedro@hotmail.es', 'Imagenes/Usuarios/usuario10.jpg', 'usuario10', '$2y$10$6SgiIcvABi7gy2XXf/.4zefpYj6FV.5Ha4RdiIbYSvYqjFvIxTNIC', 1000,1000,0,0,0,0,'2018-06-13 12:13:16'),
(11, 'Jose', 'Morales Rico', 'Murcia', 'Murcia', '643232423', '100000021', 'C/ iglesia de dios', '12324', 'Usuario', 'Jose@hotmail.es', 'Imagenes/Usuarios/usuario11.jpg', 'usuario11', '$2y$10$NGGcYdFkW11PMscaQzMvXOWgVl5U6.7UOzYndfXMj4tMdNASIOADu', 1000,1000,0,0,0,0,'2018-06-13 11:10:30'),
(12, 'Jorge', 'Canovas Juarez', 'Murcia', 'Murcia', '623454312', '100000022', 'C/ de la bendicion', '30234', 'Usuario', 'Jorge@hotmail.es', 'Imagenes/Usuarios/usuario12.jpg', 'usuario12', '$2y$10$cuUmymhQEiYYKr4ugtob4.JdQfq2ppUaXBRsHaLgBsp7t1m3x1gDa', 1000,1000,0,0,0,0,'2018-06-13 12:13:10'),
(13, 'Pepe', 'Gonzalez Navarro', 'Murcia', 'Murcia', '699923423', '100000023', 'C/ buena vida', '30341', 'Usuario', 'Pepe@hotmail.es', 'Imagenes/Usuarios/usuario13.jpg', 'usuario13', '$2y$10$ZsHG.ylRiQG2vbE7XvkIbuoM5IpXiC3w8ZSMrLMEO3U/JnDUcokWq', 1000,1000,0,0,0,0,'2018-06-13 12:11:10');

INSERT INTO `usuarios` (`nombre`, `apellidos`, `tipo`, `email` , `fotografia`, `usuario`, `contrasenia`, `puntuacion`,`puntuacioncs`,`total_partidos_usuario`,`partidos_usuario_ganados`,`partidos_usuario_perdidos`,`activo`,`fecha_registro`) VALUES

('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio1@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario14', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio2@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario15', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio3@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario16', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio4@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario17', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio5@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario18', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio6@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario19', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio7@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario20', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio64@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario21', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio8@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario22', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio9@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario23', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio10@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario24', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio11@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario25', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio12@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario26', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio13@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario27', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio14@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario28', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio15@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario29', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio16@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario30', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio17@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario31', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio18@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario32', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio19@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario33', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio20@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario34', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio21@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario35', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio22@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario36', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio23@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario37', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio24@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario38', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio25@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario39', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio26@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario40', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio27@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario41', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio28@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario42', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio29@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario43', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio30@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario44', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio31@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario45', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio32@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario46', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio33@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario47', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio34@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario48', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio35@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario49', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio36@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario50', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio37@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario51', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio38@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario52', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio39@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario53', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio40@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario54', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio41@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario55', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio42@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario56', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12'),
('Ignacio', 'Lidon Navarro',  'Usuario', 'Ignacio43@hotmail.es', 'Imagenes/Usuarios/defecto.jpg', 'usuario57', '$2y$10$iaXOfq/1uwCExesJUBFyeuF7IImWnDthsmLwwEV5PxG1WS6X0mgVK', 1000,1000,0,0,0,0,'2018-06-13 7:13:12');





--
-- Estructura de tabla para la tabla `busqueda_partido_1v1_lol`
--

CREATE TABLE `busqueda_partido_1v1_lol` (
  `num_busqueda_partido_1v1_lol` int(11) NOT NULL AUTO_INCREMENT,
  `jugador1` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `jugador2` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `estado` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
   FOREIGN KEY (`jugador1`) REFERENCES usuarios(`usuario`),  
  FOREIGN KEY (`jugador2`) REFERENCES usuarios(`usuario`),
  PRIMARY KEY (`num_busqueda_partido_1v1_lol`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


INSERT INTO `busqueda_partido_1v1_lol` (`num_busqueda_partido_1v1_lol`, `jugador1`, `jugador2`, `estado`) VALUES
(1,'usuario1','usuario2','encontrado');


CREATE TABLE `busqueda_partido_1v1_cs` (
  `num_busqueda_partido_1v1_cs` int(11) NOT NULL AUTO_INCREMENT,
  `jugador1` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `jugador2` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
   FOREIGN KEY (`jugador1`) REFERENCES usuarios(`usuario`),  
  FOREIGN KEY (`jugador2`) REFERENCES usuarios(`usuario`),
  `estado` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`num_busqueda_partido_1v1_cs`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

INSERT INTO `busqueda_partido_1v1_cs` (`num_busqueda_partido_1v1_cs`, `jugador1`, `jugador2`, `estado`) VALUES
(1,'usuario1','usuario2','encontrado');
--
-- Estructura de tabla para la tabla `amistades`
--

CREATE TABLE `amistades` (
  `id_amistad` int(11) NOT NULL AUTO_INCREMENT,
  `amigo1` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `amigo2` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_amistad`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Estructura de tabla para la tabla `peticiones_de_amistad`
--

CREATE TABLE `peticiones_de_amistad` (
  `id_peticion_amistad` int(11) NOT NULL AUTO_INCREMENT,
  `amigo_envio` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `amigo_peticion` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_peticion_amistad`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;


CREATE TABLE `conversacion` (
  `id_conversacion` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `mensaje` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
`tipo` varchar(250) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` TIME NOT NULL,
  PRIMARY KEY (`id_conversacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;



-- Índices para las tablas

ALTER TABLE `equipo`
  ADD PRIMARY KEY (`num_equipo`);

ALTER TABLE `partidos_equipo`
  ADD PRIMARY KEY (`id_partido_equipo`);

ALTER TABLE `partidos_individuales`
  ADD PRIMARY KEY (`id_partido`);

ALTER TABLE `partidos_equipo_cs`
  ADD PRIMARY KEY (`id_partido_equipo_cs`);

ALTER TABLE `partidos_individuales_cs`
  ADD PRIMARY KEY (`id_partido_cs`);

-- AUTO_INCREMENT de la tabla equipo

ALTER TABLE `equipo`
  MODIFY `num_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

-- AUTO_INCREMENT de la tabla partidos_equipo

ALTER TABLE `partidos_equipo`
  MODIFY `id_partido_equipo` int(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT de la tabla partidos_individuales

ALTER TABLE `partidos_individuales`
  MODIFY `id_partido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- AUTO_INCREMENT de la tabla partidos_equipo

ALTER TABLE `partidos_equipo_cs`
  MODIFY `id_partido_equipo_cs` int(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT de la tabla partidos_individuales

ALTER TABLE `partidos_individuales_cs`
  MODIFY `id_partido_cs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
-- AUTO_INCREMENT de la tabla soporte

ALTER TABLE `soporte`
  MODIFY `num_soporte` int(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT de la tabla usuarios

ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
