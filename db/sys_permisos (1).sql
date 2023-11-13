-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2023 a las 00:55:10
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_hr_control_system`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sys_permisos`
--

CREATE TABLE `sys_permisos` (
  `id_permiso` int(10) UNSIGNED NOT NULL,
  `padre` int(10) UNSIGNED DEFAULT NULL,
  `nombre` varchar(45) NOT NULL,
  `endpoint` varchar(15) DEFAULT NULL,
  `activo` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `sys_permisos`
--

INSERT INTO `sys_permisos` (`id_permiso`, `padre`, `nombre`, `endpoint`, `activo`) VALUES
(0, NULL, 'Alpha', NULL, b'1'),
(1, 0, 'Dashboard', 'dashboard', b'1'),
(2, 0, 'Personal', 'personal', b'1'),
(3, 0, 'Dispositivos', 'dispositivos', b'1'),
(4, 0, 'Reportes', 'asistencia', b'1'),
(5, 0, 'Sistema', 'sistema', b'1'),
(101, 1, 'Gráfico de Asistencia', 'dbasistencias', b'1'),
(102, 1, 'Estadisticas Generales', 'dbestadisticas', b'1'),
(103, 1, 'Cumpleaños', 'dbaniversarios', b'1'),
(104, 1, 'Gráfico de Rotación', 'dbrotacion', b'1'),
(105, 1, 'Gráfico de Salarios', 'dbsalarios', b'1'),
(201, 2, 'Unidad', 'unidades', b'1'),
(202, 2, 'Departamentos', 'departamentos', b'1'),
(203, 2, 'Puestos', 'puestos', b'1'),
(204, 2, 'Conceptos', 'conceptos', b'1'),
(205, 2, 'Empleados', 'empleados', b'1'),
(206, 2, 'Aprovaciones', 'aprobacion', b'1'),
(207, 2, 'Vacaciones', 'vacaciones', b'1'),
(208, 2, 'Renuncias', 'renuncias', b'1'),
(301, 3, 'Dispositivos', 'biometricos', b'1'),
(302, 3, 'Sincronizar Datos', 'sincronizar', b'1'),
(303, 3, 'Cargar Eventos USB', 'datosusb', b'1'),
(304, 3, 'Descargar Eventos', 'descargar', b'1'),
(305, 3, 'Enrolamiento Remoto', 'enrolar', b'1'),
(306, 3, 'Registros', 'registros', b'1'),
(307, 3, 'Excepciones', 'excepciones', b'1'),
(401, 4, 'Asistencia', 'Asistencias', b'1'),
(402, 4, 'Incidencias', 'incidencias', b'1'),
(404, 4, 'Tiempos Extras', 'textras', b'1'),
(405, 4, 'Calendario', 'calendario', b'1'),
(406, 4, 'Horarios y Turnos', 'horarios', b'1'),
(407, 4, 'Consultas y Reportes', 'consultas', b'1'),
(408, 4, 'Retrasos', 'retrasos', b'1'),
(409, 4, 'Vacaciones', 'vacaciones', b'1'),
(410, 4, 'Reasignaciones', 'Reasignaciones', b'1'),
(411, 4, 'Terminales', 'terminales', b'1'),
(501, 5, 'Perfiles', 'perfil', b'1'),
(502, 5, 'Usuarios', 'usuarios', b'1'),
(503, 5, 'Bitacora', 'bitacora', b'1'),
(504, 5, 'Configurar Correo', 'correo', b'1'),
(505, 5, 'Permisos', 'permisos', b'1'),
(506, 5, 'Empresas', 'empresas', b'1'),
(507, 5, 'Nuevo', 'nuevito', b'1'),
(2051, 205, 'Información General', 'empleados_ig', b'1'),
(2052, 205, 'Información Personal', 'empleados_ip', b'1'),
(2053, 205, 'Información Dispositivo', 'empleados_bio', b'1'),
(2054, 205, 'Configuración Asistencia', 'empleados_att', b'1'),
(2055, 205, 'Documentos', 'empleados_doc', b'1'),
(2056, 205, 'Importar', 'empleados_imp', b'1'),
(2057, 205, 'Descargar', 'empleados_exp', b'1'),
(3011, 301, 'Comandos de dispositivo', 'enviacomandos', b'1'),
(4071, 407, 'Total Asistencia', 'rasistenciatota', b'1'),
(4072, 407, 'Excepciones', 'rexcepciones', b'1'),
(4073, 407, 'Retardos', 'rretardos', b'1'),
(4074, 407, 'Salidas Anticipadas', 'rrsalidasant', b'1'),
(4075, 407, 'Cumpleaños', 'raniversario', b'1'),
(4076, 407, 'Tiempo Extra', 'rtiempoextra', b'1'),
(4077, 407, 'Ausencias', 'rfaltas', b'1'),
(4078, 407, 'Descansos', 'rdescansos', b'1'),
(4079, 407, 'Prenomina', 'rprenomina', b'1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sys_permisos`
--
ALTER TABLE `sys_permisos`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `fk_sys_permisos_sys_permisos1_idx` (`padre`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sys_permisos`
--
ALTER TABLE `sys_permisos`
  ADD CONSTRAINT `fk_sys_permisos_sys_permisos1` FOREIGN KEY (`padre`) REFERENCES `sys_permisos` (`id_permiso`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
