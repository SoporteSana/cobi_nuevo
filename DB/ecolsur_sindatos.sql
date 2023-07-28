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


-- Volcando estructura de base de datos para ecolsur
DROP DATABASE IF EXISTS `ecolsur`;
CREATE DATABASE IF NOT EXISTS `ecolsur` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ecolsur`;

-- Volcando estructura para tabla ecolsur.alias
DROP TABLE IF EXISTS `alias`;
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
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ecolsur.asignaciones
DROP TABLE IF EXISTS `asignaciones`;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ecolsur.destinofinal
DROP TABLE IF EXISTS `destinofinal`;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ecolsur.empresas
DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `empresa_id` int NOT NULL AUTO_INCREMENT,
  `empresa_nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `estatus` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`empresa_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ecolsur.folios
DROP TABLE IF EXISTS `folios`;
CREATE TABLE IF NOT EXISTS `folios` (
  `folio_id` int NOT NULL AUTO_INCREMENT,
  `folio` int DEFAULT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `peso_folio` int DEFAULT NULL,
  PRIMARY KEY (`folio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ecolsur.grupos
DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `grupo_id` int NOT NULL AUTO_INCREMENT,
  `sucursal_id` int NOT NULL,
  `grupo_nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `permisos` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `estatus` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`grupo_id`) USING BTREE,
  KEY `FK_grupos_sucursales` (`sucursal_id`),
  CONSTRAINT `FK_grupos_sucursales` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursales` (`sucursal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ecolsur.manifiestos
DROP TABLE IF EXISTS `manifiestos`;
CREATE TABLE IF NOT EXISTS `manifiestos` (
  `manifiesto_id` int NOT NULL AUTO_INCREMENT,
  `nummanifiesto` int NOT NULL,
  `sucursal_id` int NOT NULL,
  `unidad_id` int NOT NULL,
  `fecha` date NOT NULL,
  `peso_total` int NOT NULL,
  `destinofinal_id` int NOT NULL,
  `estatus` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`manifiesto_id`) USING BTREE,
  KEY `FK_tickets_unidades` (`unidad_id`),
  KEY `FK_tickets_destinofinal` (`destinofinal_id`),
  KEY `FK_tickets_sucursales` (`sucursal_id`),
  CONSTRAINT `FK_tickets_destinofinal` FOREIGN KEY (`destinofinal_id`) REFERENCES `destinofinal` (`destinofinal_id`),
  CONSTRAINT `FK_tickets_sucursales` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursales` (`sucursal_id`),
  CONSTRAINT `FK_tickets_unidades` FOREIGN KEY (`unidad_id`) REFERENCES `unidades` (`unidad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ecolsur.manifiestos_folios
DROP TABLE IF EXISTS `manifiestos_folios`;
CREATE TABLE IF NOT EXISTS `manifiestos_folios` (
  `manifiesto_id` int NOT NULL,
  `folio_id` int NOT NULL,
  KEY `FK__manifiestos` (`manifiesto_id`),
  KEY `FK__folios` (`folio_id`),
  CONSTRAINT `FK__folios` FOREIGN KEY (`folio_id`) REFERENCES `folios` (`folio_id`),
  CONSTRAINT `FK__manifiestos` FOREIGN KEY (`manifiesto_id`) REFERENCES `manifiestos` (`manifiesto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ecolsur.operadores
DROP TABLE IF EXISTS `operadores`;
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
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ecolsur.recolectores
DROP TABLE IF EXISTS `recolectores`;
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
) ENGINE=InnoDB AUTO_INCREMENT=585 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ecolsur.registros
DROP TABLE IF EXISTS `registros`;
CREATE TABLE IF NOT EXISTS `registros` (
  `registro_id` int NOT NULL AUTO_INCREMENT,
  `sucursal_id` int NOT NULL,
  `unidad_id` int NOT NULL,
  `semana` int NOT NULL,
  `dia` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '',
  `fecha_entrada` date NOT NULL,
  `hora_salida` datetime NOT NULL,
  `fecha_salida` date NOT NULL,
  `hora_tablero` int NOT NULL DEFAULT '0',
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
  `litroscargados` float DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ecolsur.rutas
DROP TABLE IF EXISTS `rutas`;
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
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ecolsur.sucursales
DROP TABLE IF EXISTS `sucursales`;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ecolsur.tiros
DROP TABLE IF EXISTS `tiros`;
CREATE TABLE IF NOT EXISTS `tiros` (
  `tiro_id` int NOT NULL AUTO_INCREMENT,
  `registro_id` int NOT NULL,
  `ticket_id` int DEFAULT NULL,
  `numtiro` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tiro_id`),
  KEY `FK_tiros_registros` (`registro_id`),
  KEY `FK_tiros_tickets` (`ticket_id`),
  CONSTRAINT `FK_tiros_registros` FOREIGN KEY (`registro_id`) REFERENCES `registros` (`registro_id`),
  CONSTRAINT `FK_tiros_tickets` FOREIGN KEY (`ticket_id`) REFERENCES `manifiestos` (`manifiesto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ecolsur.tripulacion
DROP TABLE IF EXISTS `tripulacion`;
CREATE TABLE IF NOT EXISTS `tripulacion` (
  `tripulacion_id` int NOT NULL AUTO_INCREMENT,
  `registro_id` int DEFAULT NULL,
  `recolector_id` int DEFAULT NULL,
  `numrecolector` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tripulacion_id`),
  KEY `FK_tripulacion_registros` (`registro_id`),
  KEY `FK_tripulacion_recolectores` (`recolector_id`),
  CONSTRAINT `FK_tripulacion_recolectores` FOREIGN KEY (`recolector_id`) REFERENCES `recolectores` (`recolector_id`),
  CONSTRAINT `FK_tripulacion_registros` FOREIGN KEY (`registro_id`) REFERENCES `registros` (`registro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ecolsur.turnos
DROP TABLE IF EXISTS `turnos`;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ecolsur.unidades
DROP TABLE IF EXISTS `unidades`;
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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ecolsur.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sucursal_id` int DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nombres` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `apellidos` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `telefono` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `genero` int NOT NULL,
  `estatus` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`usuario_id`) USING BTREE,
  KEY `FK_users_sucursales` (`sucursal_id`),
  CONSTRAINT `FK_usuarios_sucursales` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursales` (`sucursal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla ecolsur.usuarios_grupos
DROP TABLE IF EXISTS `usuarios_grupos`;
CREATE TABLE IF NOT EXISTS `usuarios_grupos` (
  `usuario_grupo_id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `grupo_id` int NOT NULL,
  PRIMARY KEY (`usuario_grupo_id`) USING BTREE,
  KEY `FK_usuario_grupo_usuarios` (`usuario_id`),
  KEY `FK_usuario_grupo_grupos` (`grupo_id`),
  CONSTRAINT `FK_usuario_grupo_grupos` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`grupo_id`),
  CONSTRAINT `FK_usuario_grupo_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para procedimiento ecolsur.vigilancia_supervision_index
DROP PROCEDURE IF EXISTS `vigilancia_supervision_index`;
DELIMITER //
CREATE PROCEDURE `vigilancia_supervision_index`(
    IN sucursal_id INT,
    IN estatus INT,
    IN registro_id INT,
    OUT result_set TEXT
)
BEGIN
    SET @sql = NULL;

    SELECT
        GROUP_CONCAT(DISTINCT
            CONCAT(
                'IFNULL(MAX(CASE WHEN tripulacion.numrecolector = ''',
                tripulacion.numrecolector,
                ''' THEN recolectores.recolector_nombre END), ''Sin recolector'') AS `Recolector',
                tripulacion.numrecolector, '`'
            )
            ORDER BY tripulacion.numrecolector ASC
        ) INTO @sql
    FROM
        tripulacion
        INNER JOIN recolectores ON tripulacion.recolector_id = recolectores.recolector_id
    WHERE
        tripulacion.numrecolector IS NOT NULL;

    SET @sql = CONCAT('SELECT registros.registro_id, registros.unidad_id, unidades.unidad_numero, registros.semana, registros.dia, registros.hora_salida, IFNULL(registros.hora_entrada, "sigue en ruta") AS hora_entrada, registros.hora_tablero, registros.km_salida, IFNULL(registros.km_entrada, "sigue en ruta") AS km_entrada, turnos.turno_nombre, rutas.ruta_nombre, alias.alias_nombre, operadores.operador_nombre, registros.estatus, COALESCE(COUNT(tripulacion.recolector_id), 0) AS numrecolector,   ', @sql, '
                        FROM registros
                        INNER JOIN unidades USING(unidad_id)
                        INNER JOIN alias USING(alias_id)
                        INNER JOIN turnos USING(turno_id)
                        INNER JOIN rutas USING(ruta_id)
                        INNER JOIN operadores USING(operador_id)
                        LEFT JOIN tripulacion ON registros.registro_id = tripulacion.registro_id
                        LEFT JOIN recolectores ON tripulacion.recolector_id = recolectores.recolector_id
                        WHERE registros.sucursal_id = ', sucursal_id, ' AND registros.estatus = ''', estatus, '''');

    -- Agrega los filtros opcionales por registro_id
    IF registro_id IS NOT NULL THEN
        SET @sql = CONCAT(@sql, ' AND registros.registro_id = ', registro_id);
    END IF;

    SET @sql = CONCAT(@sql, ' GROUP BY registros.registro_id');

    SET @result_set = @sql;

    PREPARE stmt FROM @sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END//
DELIMITER ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
