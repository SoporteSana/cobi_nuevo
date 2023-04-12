-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para cobi_2.0
CREATE DATABASE IF NOT EXISTS `cobi_2.0` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cobi_2.0`;

-- Volcando estructura para tabla cobi_2.0.alias
CREATE TABLE IF NOT EXISTS `alias` (
  `alias_id` int NOT NULL AUTO_INCREMENT,
  `sucursal_id` int NOT NULL,
  `alias_nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `turno_id` int DEFAULT NULL,
  `ruta_id` int DEFAULT NULL,
  `estatus` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`alias_id`) USING BTREE,
  KEY `FK_alias_sucursales` (`sucursal_id`),
  KEY `FK_alias_turnos` (`turno_id`),
  KEY `FK_alias_rutas` (`ruta_id`),
  CONSTRAINT `FK_alias_rutas` FOREIGN KEY (`ruta_id`) REFERENCES `rutas` (`ruta_id`),
  CONSTRAINT `FK_alias_sucursales` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursales` (`sucursal_id`),
  CONSTRAINT `FK_alias_turnos` FOREIGN KEY (`turno_id`) REFERENCES `turnos` (`turno_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cobi_2.0.alias: ~0 rows (aproximadamente)
DELETE FROM `alias`;

-- Volcando estructura para tabla cobi_2.0.asignaciones
CREATE TABLE IF NOT EXISTS `asignaciones` (
  `asignacion_id` int NOT NULL AUTO_INCREMENT,
  `sucursal_id` int NOT NULL,
  `asignacion_nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `estatus` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`asignacion_id`),
  KEY `FK_asignaciones_sucursales` (`sucursal_id`),
  CONSTRAINT `FK_asignaciones_sucursales` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursales` (`sucursal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cobi_2.0.asignaciones: ~0 rows (aproximadamente)
DELETE FROM `asignaciones`;

-- Volcando estructura para tabla cobi_2.0.destinofinal
CREATE TABLE IF NOT EXISTS `destinofinal` (
  `destinofinal_id` int NOT NULL AUTO_INCREMENT,
  `sucursal_id` int NOT NULL,
  `destinofinal_nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `estatus` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`destinofinal_id`) USING BTREE,
  KEY `FK_destinofinal_sucursales` (`sucursal_id`),
  CONSTRAINT `FK_destinofinal_sucursales` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursales` (`sucursal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cobi_2.0.destinofinal: ~0 rows (aproximadamente)
DELETE FROM `destinofinal`;

-- Volcando estructura para tabla cobi_2.0.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `empresa_id` int NOT NULL AUTO_INCREMENT,
  `empresa_nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `estatus` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`empresa_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cobi_2.0.empresas: ~0 rows (aproximadamente)
DELETE FROM `empresas`;
INSERT INTO `empresas` (`empresa_id`, `empresa_nombre`, `estatus`, `created_at`, `updated_at`) VALUES
	(1, 'sana', 0, '2023-03-16 17:51:07', NULL);

-- Volcando estructura para tabla cobi_2.0.grupos
CREATE TABLE IF NOT EXISTS `grupos` (
  `grupo_id` int NOT NULL AUTO_INCREMENT,
  `grupo_nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `permisos` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `estatus` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`grupo_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla cobi_2.0.grupos: ~0 rows (aproximadamente)
DELETE FROM `grupos`;
INSERT INTO `grupos` (`grupo_id`, `grupo_nombre`, `permisos`, `estatus`, `created_at`, `updated_at`) VALUES
	(1, 'Administrador', 'a:70:{i:0;s:13:"createEmpresa";i:1;s:13:"updateEmpresa";i:2;s:11:"viewEmpresa";i:3;s:13:"deleteEmpresa";i:4;s:16:"createSucursales";i:5;s:16:"updateSucursales";i:6;s:14:"viewSucursales";i:7;s:16:"deleteSucursales";i:8;s:16:"createVigilancia";i:9;s:16:"updateVigilancia";i:10;s:14:"viewVigilancia";i:11;s:16:"deleteVigilancia";i:12;s:17:"createSupervision";i:13;s:17:"updateSupervision";i:14;s:15:"viewSupervision";i:15;s:17:"deleteSupervision";i:16;s:16:"createSupervisor";i:17;s:16:"updateSupervisor";i:18;s:14:"viewSupervisor";i:19;s:16:"deleteSupervisor";i:20;s:11:"createTurno";i:21;s:11:"updateTurno";i:22;s:9:"viewTurno";i:23;s:11:"deleteTurno";i:24;s:10:"createRuta";i:25;s:10:"updateRuta";i:26;s:8:"viewRuta";i:27;s:10:"deleteRuta";i:28;s:11:"createAlias";i:29;s:11:"updateAlias";i:30;s:9:"viewAlias";i:31;s:11:"deleteAlias";i:32;s:14:"createOperador";i:33;s:14:"updateOperador";i:34;s:12:"viewOperador";i:35;s:14:"deleteOperador";i:36;s:16:"createRecolector";i:37;s:16:"updateRecolector";i:38;s:14:"viewRecolector";i:39;s:16:"deleteRecolector";i:40;s:12:"createUnidad";i:41;s:12:"updateUnidad";i:42;s:10:"viewUnidad";i:43;s:12:"deleteUnidad";i:44;s:18:"createDestinoFinal";i:45;s:18:"updateDestinoFinal";i:46;s:16:"viewDestinoFinal";i:47;s:18:"deleteDestinoFinal";i:48;s:12:"createTicket";i:49;s:12:"updateTicket";i:50;s:10:"viewTicket";i:51;s:12:"deleteTicket";i:52;s:13:"createReporte";i:53;s:13:"updateReporte";i:54;s:11:"viewReporte";i:55;s:13:"deleteReporte";i:56;s:20:"createEditarRegistro";i:57;s:20:"updateEditarRegistro";i:58;s:18:"viewEditarRegistro";i:59;s:20:"deleteEditarRegistro";i:60;s:11:"viewProfile";i:61;s:13:"updateSetting";i:62;s:10:"createUser";i:63;s:10:"updateUser";i:64;s:8:"viewUser";i:65;s:10:"deleteUser";i:66;s:11:"createGroup";i:67;s:11:"updateGroup";i:68;s:9:"viewGroup";i:69;s:11:"deleteGroup";}', 0, '2023-03-16 17:53:20', NULL);

-- Volcando estructura para tabla cobi_2.0.operadores
CREATE TABLE IF NOT EXISTS `operadores` (
  `operador_id` int NOT NULL AUTO_INCREMENT,
  `sucursal_id` int NOT NULL,
  `operador_nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `estatus` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`operador_id`),
  KEY `FK_operadores_sucursales` (`sucursal_id`),
  CONSTRAINT `FK_operadores_sucursales` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursales` (`sucursal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cobi_2.0.operadores: ~0 rows (aproximadamente)
DELETE FROM `operadores`;

-- Volcando estructura para tabla cobi_2.0.recolectores
CREATE TABLE IF NOT EXISTS `recolectores` (
  `recolector_id` int NOT NULL AUTO_INCREMENT,
  `sucursal_id` int NOT NULL,
  `recolector_nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `estatus` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`recolector_id`),
  KEY `FK_recolectores_sucursales` (`sucursal_id`),
  CONSTRAINT `FK_recolectores_sucursales` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursales` (`sucursal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cobi_2.0.recolectores: ~0 rows (aproximadamente)
DELETE FROM `recolectores`;

-- Volcando estructura para tabla cobi_2.0.registros
CREATE TABLE IF NOT EXISTS `registros` (
  `registro_id` int NOT NULL AUTO_INCREMENT,
  `sucursal_id` int NOT NULL,
  `unidad_id` int NOT NULL,
  `semana` int NOT NULL,
  `dia` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '',
  `fecha_entrada` date NOT NULL,
  `hora_salida` datetime NOT NULL,
  `fecha_salida` date NOT NULL,
  `hora_tablero` time NOT NULL,
  `alias_id` int NOT NULL,
  `operador_id` int NOT NULL,
  `km_salida` int NOT NULL,
  `km_entrada` int DEFAULT '0',
  `tiempo_ruta` time DEFAULT NULL,
  `hora_entrada` datetime DEFAULT NULL,
  `asignacion_id` int DEFAULT NULL,
  `usuario_id` int DEFAULT NULL,
  `observaciones` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `recorrido` int DEFAULT NULL,
  `litroscargados` int DEFAULT NULL,
  `rendimiento` int DEFAULT NULL,
  `totalpeso` int DEFAULT NULL,
  `estatus` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`registro_id`),
  KEY `FK_registros_alias` (`alias_id`),
  KEY `FK_registros_operadores` (`operador_id`),
  KEY `FK_registros_unidades` (`unidad_id`),
  KEY `sucursal_id` (`sucursal_id`),
  KEY `FK_registros_usuarios` (`usuario_id`),
  CONSTRAINT `FK_registros_alias` FOREIGN KEY (`alias_id`) REFERENCES `alias` (`alias_id`),
  CONSTRAINT `FK_registros_operadores` FOREIGN KEY (`operador_id`) REFERENCES `operadores` (`operador_id`),
  CONSTRAINT `FK_registros_sucursales` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursales` (`sucursal_id`),
  CONSTRAINT `FK_registros_unidades` FOREIGN KEY (`unidad_id`) REFERENCES `unidades` (`unidad_id`),
  CONSTRAINT `FK_registros_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cobi_2.0.registros: ~0 rows (aproximadamente)
DELETE FROM `registros`;

-- Volcando estructura para tabla cobi_2.0.rutas
CREATE TABLE IF NOT EXISTS `rutas` (
  `ruta_id` int NOT NULL AUTO_INCREMENT,
  `sucursal_id` int NOT NULL,
  `ruta_nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `estatus` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ruta_id`),
  KEY `FK_rutas_sucursales` (`sucursal_id`),
  CONSTRAINT `FK_rutas_sucursales` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursales` (`sucursal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cobi_2.0.rutas: ~0 rows (aproximadamente)
DELETE FROM `rutas`;

-- Volcando estructura para tabla cobi_2.0.sucursales
CREATE TABLE IF NOT EXISTS `sucursales` (
  `sucursal_id` int NOT NULL AUTO_INCREMENT,
  `empresa_id` int NOT NULL,
  `sucursal_nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `estatus` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sucursal_id`) USING BTREE,
  KEY `FK_sucursales_empresas` (`empresa_id`),
  CONSTRAINT `FK_sucursales_empresas` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`empresa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cobi_2.0.sucursales: ~0 rows (aproximadamente)
DELETE FROM `sucursales`;
INSERT INTO `sucursales` (`sucursal_id`, `empresa_id`, `sucursal_nombre`, `estatus`, `created_at`, `updated_at`) VALUES
	(1, 1, 'encierro', 0, '2023-03-16 17:51:28', NULL);

-- Volcando estructura para tabla cobi_2.0.supervisores
CREATE TABLE IF NOT EXISTS `supervisores` (
  `supervisor_id` int NOT NULL AUTO_INCREMENT,
  `sucursal_id` int NOT NULL,
  `supervisor_nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `estatus` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`supervisor_id`) USING BTREE,
  KEY `FK_supervisores_sucursales` (`sucursal_id`),
  CONSTRAINT `FK_supervisores_sucursales` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursales` (`sucursal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cobi_2.0.supervisores: ~0 rows (aproximadamente)
DELETE FROM `supervisores`;

-- Volcando estructura para tabla cobi_2.0.tickets
CREATE TABLE IF NOT EXISTS `tickets` (
  `ticket_id` int NOT NULL AUTO_INCREMENT,
  `sucursal_id` int NOT NULL,
  `folio` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `unidad_id` int NOT NULL,
  `fecha` date NOT NULL,
  `peso` int NOT NULL,
  `destinofinal_id` int NOT NULL,
  `estatus` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ticket_id`),
  KEY `FK_tickets_unidades` (`unidad_id`),
  KEY `FK_tickets_destinofinal` (`destinofinal_id`),
  KEY `FK_tickets_sucursales` (`sucursal_id`),
  CONSTRAINT `FK_tickets_destinofinal` FOREIGN KEY (`destinofinal_id`) REFERENCES `destinofinal` (`destinofinal_id`),
  CONSTRAINT `FK_tickets_sucursales` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursales` (`sucursal_id`),
  CONSTRAINT `FK_tickets_unidades` FOREIGN KEY (`unidad_id`) REFERENCES `unidades` (`unidad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cobi_2.0.tickets: ~0 rows (aproximadamente)
DELETE FROM `tickets`;

-- Volcando estructura para tabla cobi_2.0.tiros
CREATE TABLE IF NOT EXISTS `tiros` (
  `tiros_id` int NOT NULL AUTO_INCREMENT,
  `registro_id` int NOT NULL,
  `numtiros` int NOT NULL,
  `tiro1` int NOT NULL,
  `tiro2` int NOT NULL,
  `tiro3` int NOT NULL,
  `tiro4` int NOT NULL,
  `tiro5` int NOT NULL,
  `tiro6` int NOT NULL,
  `tiro7` int NOT NULL,
  `tiro8` int NOT NULL,
  `tiro9` int NOT NULL,
  `tiro10` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tiros_id`),
  KEY `FK_tiros_registros` (`registro_id`),
  KEY `FK_tiros_tickets` (`tiro1`),
  KEY `FK_tiros_tickets_2` (`tiro2`),
  KEY `FK_tiros_tickets_3` (`tiro3`),
  KEY `FK_tiros_tickets_4` (`tiro4`),
  KEY `FK_tiros_tickets_5` (`tiro5`),
  KEY `FK_tiros_tickets_6` (`tiro6`),
  KEY `FK_tiros_tickets_7` (`tiro7`),
  KEY `FK_tiros_tickets_8` (`tiro8`),
  KEY `FK_tiros_tickets_9` (`tiro9`),
  KEY `FK_tiros_tickets_10` (`tiro10`),
  CONSTRAINT `FK_tiros_registros` FOREIGN KEY (`registro_id`) REFERENCES `registros` (`registro_id`),
  CONSTRAINT `FK_tiros_tickets` FOREIGN KEY (`tiro1`) REFERENCES `tickets` (`ticket_id`),
  CONSTRAINT `FK_tiros_tickets_10` FOREIGN KEY (`tiro10`) REFERENCES `tickets` (`ticket_id`),
  CONSTRAINT `FK_tiros_tickets_2` FOREIGN KEY (`tiro2`) REFERENCES `tickets` (`ticket_id`),
  CONSTRAINT `FK_tiros_tickets_3` FOREIGN KEY (`tiro3`) REFERENCES `tickets` (`ticket_id`),
  CONSTRAINT `FK_tiros_tickets_4` FOREIGN KEY (`tiro4`) REFERENCES `tickets` (`ticket_id`),
  CONSTRAINT `FK_tiros_tickets_5` FOREIGN KEY (`tiro5`) REFERENCES `tickets` (`ticket_id`),
  CONSTRAINT `FK_tiros_tickets_6` FOREIGN KEY (`tiro6`) REFERENCES `tickets` (`ticket_id`),
  CONSTRAINT `FK_tiros_tickets_7` FOREIGN KEY (`tiro7`) REFERENCES `tickets` (`ticket_id`),
  CONSTRAINT `FK_tiros_tickets_8` FOREIGN KEY (`tiro8`) REFERENCES `tickets` (`ticket_id`),
  CONSTRAINT `FK_tiros_tickets_9` FOREIGN KEY (`tiro9`) REFERENCES `tickets` (`ticket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cobi_2.0.tiros: ~0 rows (aproximadamente)
DELETE FROM `tiros`;

-- Volcando estructura para tabla cobi_2.0.tripulacion
CREATE TABLE IF NOT EXISTS `tripulacion` (
  `tripulacion_id` int NOT NULL AUTO_INCREMENT,
  `registro_id` int NOT NULL,
  `numrecolectores` int NOT NULL,
  `recolector1` int DEFAULT '0',
  `recolector2` int DEFAULT '0',
  `recolector3` int DEFAULT '0',
  `recolector4` int DEFAULT '0',
  `recolector5` int DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tripulacion_id`),
  KEY `FK_tripulacion_registros` (`registro_id`),
  KEY `FK_tripulacion_recolectores` (`recolector1`),
  KEY `FK_tripulacion_recolectores_2` (`recolector2`),
  KEY `FK_tripulacion_recolectores_3` (`recolector3`),
  KEY `FK_tripulacion_recolectores_4` (`recolector4`),
  KEY `FK_tripulacion_recolectores_5` (`recolector5`),
  CONSTRAINT `FK_tripulacion_recolectores` FOREIGN KEY (`recolector1`) REFERENCES `recolectores` (`recolector_id`),
  CONSTRAINT `FK_tripulacion_recolectores_2` FOREIGN KEY (`recolector2`) REFERENCES `recolectores` (`recolector_id`),
  CONSTRAINT `FK_tripulacion_recolectores_3` FOREIGN KEY (`recolector3`) REFERENCES `recolectores` (`recolector_id`),
  CONSTRAINT `FK_tripulacion_recolectores_4` FOREIGN KEY (`recolector4`) REFERENCES `recolectores` (`recolector_id`),
  CONSTRAINT `FK_tripulacion_recolectores_5` FOREIGN KEY (`recolector5`) REFERENCES `recolectores` (`recolector_id`),
  CONSTRAINT `FK_tripulacion_registros` FOREIGN KEY (`registro_id`) REFERENCES `registros` (`registro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cobi_2.0.tripulacion: ~0 rows (aproximadamente)
DELETE FROM `tripulacion`;

-- Volcando estructura para tabla cobi_2.0.turnos
CREATE TABLE IF NOT EXISTS `turnos` (
  `turno_id` int NOT NULL AUTO_INCREMENT,
  `sucursal_id` int NOT NULL,
  `turno_nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `estatus` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`turno_id`),
  KEY `FK_turnos_sucursales` (`sucursal_id`),
  CONSTRAINT `FK_turnos_sucursales` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursales` (`sucursal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cobi_2.0.turnos: ~0 rows (aproximadamente)
DELETE FROM `turnos`;

-- Volcando estructura para tabla cobi_2.0.unidades
CREATE TABLE IF NOT EXISTS `unidades` (
  `unidad_id` int NOT NULL AUTO_INCREMENT,
  `sucursal_id` int NOT NULL,
  `unidad_numero` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `unidad_placas` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `estatus` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`unidad_id`),
  KEY `FK_unidades_sucursales` (`sucursal_id`),
  CONSTRAINT `FK_unidades_sucursales` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursales` (`sucursal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla cobi_2.0.unidades: ~0 rows (aproximadamente)
DELETE FROM `unidades`;

-- Volcando estructura para tabla cobi_2.0.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sucursal_id` int DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `nombres` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `apellidos` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `telefono` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `genero` int NOT NULL,
  `estatus` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`usuario_id`) USING BTREE,
  KEY `FK_users_sucursales` (`sucursal_id`),
  CONSTRAINT `FK_usuarios_sucursales` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursales` (`sucursal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla cobi_2.0.usuarios: ~0 rows (aproximadamente)
DELETE FROM `usuarios`;
INSERT INTO `usuarios` (`usuario_id`, `username`, `password`, `sucursal_id`, `email`, `nombres`, `apellidos`, `telefono`, `genero`, `estatus`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '$2y$10$ZrBk2zWOLhPAaOhncDBJv.pKAfhFYywahFQXY4NXDmhOcaRtLdAfS', 1, 'admin@admin.com', 'admin', 'admin', '12345678910', 1, 0, '2023-03-16 17:52:26', NULL);

-- Volcando estructura para tabla cobi_2.0.usuarios_grupos
CREATE TABLE IF NOT EXISTS `usuarios_grupos` (
  `usuario_grupo_id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `grupo_id` int NOT NULL,
  PRIMARY KEY (`usuario_grupo_id`) USING BTREE,
  KEY `FK_usuario_grupo_usuarios` (`usuario_id`),
  KEY `FK_usuario_grupo_grupos` (`grupo_id`),
  CONSTRAINT `FK_usuario_grupo_grupos` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`grupo_id`),
  CONSTRAINT `FK_usuario_grupo_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla cobi_2.0.usuarios_grupos: ~1 rows (aproximadamente)
DELETE FROM `usuarios_grupos`;
INSERT INTO `usuarios_grupos` (`usuario_grupo_id`, `usuario_id`, `grupo_id`) VALUES
	(1, 1, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
