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
CREATE DATABASE IF NOT EXISTS `ecolsur` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ecolsur`;

-- Volcando estructura para tabla ecolsur.alias
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

-- Volcando datos para la tabla ecolsur.alias: ~106 rows (aproximadamente)
INSERT INTO `alias` (`alias_id`, `sucursal_id`, `alias_nombre`, `turno_id`, `ruta_id`, `estatus`, `created_at`, `updated_at`) VALUES
	(0, 0, '-', 0, 0, 0, '2023-03-17 20:09:31', NULL),
	(2, 1, 'ENCINOS', 1, 52, 0, '2023-03-17 17:45:07', NULL),
	(3, 1, 'FRANCISCO VILLA', 1, 53, 0, '2023-03-17 17:45:53', NULL),
	(4, 1, 'CENTRO KANASIN', 1, 54, 0, '2023-03-17 17:46:17', NULL),
	(5, 1, 'FINCA', 1, 55, 0, '2023-03-17 17:50:56', NULL),
	(6, 1, 'PABLO MORENO', 1, 56, 0, '2023-03-17 17:51:17', NULL),
	(7, 1, 'Villas Oriente l', 1, 57, 0, '2023-03-17 17:51:37', NULL),
	(8, 1, 'Villas Oriente ll', 1, 58, 0, '2023-03-17 17:51:58', NULL),
	(9, 1, 'FLOR DE MAYO', 1, 59, 0, '2023-03-17 17:52:13', NULL),
	(10, 1, 'SAN CAMILO l', 1, 60, 0, '2023-03-17 17:52:27', NULL),
	(11, 1, 'SAN CAMILO ll', 1, 61, 0, '2023-03-17 17:52:43', NULL),
	(12, 1, 'REPARTO GRANJAS', 1, 62, 0, '2023-03-17 17:52:58', NULL),
	(13, 1, 'SANTA ISABEL', 1, 63, 0, '2023-03-17 17:53:18', NULL),
	(14, 1, 'HECTOR VICTORIA', 1, 64, 0, '2023-03-17 17:53:33', NULL),
	(15, 1, 'MULCHECHEN', 1, 65, 0, '2023-03-17 17:53:48', NULL),
	(16, 1, 'LEONA VICARIO', 1, 66, 0, '2023-03-17 17:54:02', NULL),
	(17, 1, 'Piedra de agua', 1, 67, 3, '2023-03-17 17:54:17', NULL),
	(18, 1, 'PRIVADA CAMPESTRE', 1, 68, 0, '2023-03-17 17:54:34', NULL),
	(19, 1, 'ALTABRISA', 1, 69, 0, '2023-03-17 17:54:53', NULL),
	(20, 1, 'CORDEMEX', 1, 70, 0, '2023-03-17 17:55:12', NULL),
	(21, 1, 'LA CEIBA', 1, 72, 0, '2023-03-17 17:55:26', NULL),
	(22, 1, 'CHABLEKAL', 1, 73, 0, '2023-03-17 17:55:40', NULL),
	(23, 1, 'SANTA GERTRUDIS COPO', 1, 74, 0, '2023-03-17 17:55:54', NULL),
	(24, 1, 'CHOLUL', 1, 75, 3, '2023-03-17 17:56:19', NULL),
	(25, 1, 'VISTA ALEGRE NORTE', 1, 76, 3, '2023-03-17 17:56:35', NULL),
	(26, 1, 'LEANDRO VALLE', 1, 78, 0, '2023-03-17 17:56:49', NULL),
	(27, 1, 'PINOS', 1, 79, 0, '2023-03-17 17:57:06', NULL),
	(28, 1, 'POLIGONO', 1, 80, 0, '2023-03-17 17:57:20', NULL),
	(29, 1, 'BRISAS', 1, 81, 0, '2023-03-17 17:57:35', NULL),
	(30, 1, 'SAN ESTEBAN', 1, 82, 0, '2023-03-17 17:58:06', NULL),
	(31, 1, 'SAN ANTONIO XLUCH', 1, 94, 0, '2023-03-17 17:58:21', NULL),
	(32, 1, 'EMILIANO ZAPATA SUR', 1, 95, 0, '2023-03-17 17:58:36', NULL),
	(33, 1, 'SAN LUIS', 1, 96, 0, '2023-03-17 17:58:51', NULL),
	(34, 1, 'COMISARIAS', 1, 97, 0, '2023-03-17 17:59:05', NULL),
	(35, 1, 'PLAN DE AYALA SUR', 1, 98, 0, '2023-03-17 17:59:19', NULL),
	(36, 1, 'SAN JOSE TECOH', 1, 99, 0, '2023-03-17 17:59:35', NULL),
	(37, 1, 'VILLA MAGNA DEL SUR', 1, 100, 0, '2023-03-17 17:59:49', NULL),
	(38, 1, 'HEROES', 1, 75, 0, '2023-03-17 18:00:04', NULL),
	(39, 1, 'HEROES Y COMISARIAS', 1, 76, 0, '2023-03-17 18:00:18', NULL),
	(40, 1, 'ZIAN KAN', 1, 103, 0, '2023-03-17 18:00:34', NULL),
	(41, 1, 'HERRADURA', 1, 104, 0, '2023-03-17 18:00:49', NULL),
	(42, 1, 'LOS ALMENDROS', 1, 105, 0, '2023-03-17 18:01:02', NULL),
	(43, 1, 'ALMENDROS II', 1, 106, 0, '2023-03-17 18:01:16', NULL),
	(44, 1, 'JARDINES I', 1, 107, 0, '2023-03-17 18:01:34', NULL),
	(45, 1, 'JARDINES II', 1, 108, 0, '2023-03-17 18:01:48', NULL),
	(46, 1, 'CABALLERIZAS', 1, 71, 0, '2023-03-17 18:02:03', NULL),
	(47, 1, 'Caja Abierta', 1, 121, 0, '2023-03-17 18:02:17', NULL),
	(48, 1, 'COMERCIOS FORANEO', 1, 43, 0, '2023-03-17 18:02:35', NULL),
	(49, 1, 'UMAN', 1, 43, 0, '2023-03-17 18:02:51', NULL),
	(50, 1, 'COMERCIO NORTE', 1, 43, 0, '2023-03-17 18:03:15', NULL),
	(51, 1, 'COMERCIO DISTRITO II', 1, 43, 0, '2023-03-17 18:03:50', NULL),
	(52, 1, 'ROLL OFF', 1, 43, 3, '2023-03-17 18:04:11', NULL),
	(53, 1, 'GRAN SAN PEDRO', 1, 77, 0, '2023-03-17 18:04:32', NULL),
	(54, 1, 'VOLQUETE', 1, 121, 0, '2023-03-17 18:05:09', NULL),
	(55, 1, 'Bachoco - Servicios', 1, 43, 0, '2023-03-17 18:05:32', NULL),
	(56, 1, 'APOYO', 1, 127, 0, '2023-03-17 18:06:00', NULL),
	(57, 1, 'CHOLUL', 1, 101, 0, '2023-03-17 18:06:14', '2023-04-24 09:19:14'),
	(58, 1, 'VISTA ALEGRE NORTE', 1, 102, 0, '2023-03-17 18:06:29', '2023-04-24 08:47:51'),
	(59, 1, 'XELPAC', 1, 128, 0, '2023-03-17 18:06:44', NULL),
	(60, 1, 'AMALIA SOLORZANO', 1, 59, 0, '2023-03-17 18:06:57', NULL),
	(61, 1, 'GRAN VISTANA', 1, 129, 0, '2023-03-17 18:07:14', NULL),
	(62, 1, 'COCOYOLES', 1, 130, 0, '2023-03-17 18:07:27', NULL),
	(63, 1, 'COCOS', 1, 131, 0, '2023-03-17 18:07:42', NULL),
	(64, 1, 'CHICHI SUAREZ', 1, 125, 0, '2023-03-17 18:07:57', NULL),
	(65, 1, 'PIEDRA DE AGUA', 1, 133, 0, '2023-03-17 18:08:11', NULL),
	(66, 1, 'MINI ROLL OFF', 1, 43, 3, '2023-03-17 18:08:25', NULL),
	(67, 1, 'Uman poniente', 1, 134, 0, '2023-03-17 18:08:38', NULL),
	(68, 1, 'Uman sur', 1, 135, 0, '2023-03-17 18:08:52', NULL),
	(69, 1, 'Uman oriente', 1, 136, 0, '2023-03-17 18:09:05', NULL),
	(70, 1, 'Uman norte', 1, 137, 0, '2023-03-17 18:09:19', NULL),
	(71, 1, 'Uman centro', 1, 138, 0, '2023-03-17 18:09:33', NULL),
	(72, 1, 'Uman comisaria', 1, 139, 0, '2023-03-17 18:09:50', NULL),
	(73, 1, 'ROLL OFF', 1, 121, 0, '2023-03-17 18:10:03', NULL),
	(74, 1, 'MINI ROLL OFF', 1, 121, 0, '2023-03-17 18:10:16', NULL),
	(75, 1, 'NOVA', 1, 43, 0, '2023-03-17 18:10:34', '2023-04-20 17:35:38'),
	(76, 1, 'Camioneta', 1, 121, 0, '2023-03-17 18:10:48', NULL),
	(77, 1, 'GONDOLA', 1, 121, 0, '2023-03-17 18:11:02', NULL),
	(78, 1, 'COMPACTADORA', 1, 121, 0, '2023-03-17 18:11:15', NULL),
	(79, 1, 'BUENAVISTA', 2, 83, 0, '2023-03-17 18:11:28', '2023-04-20 17:30:49'),
	(80, 1, 'CAMPESTRE', 2, 84, 0, '2023-03-17 18:11:49', NULL),
	(81, 1, 'BENITO JUAREZ', 2, 85, 0, '2023-03-17 18:12:04', NULL),
	(82, 1, 'MONTES DE AME', 2, 86, 0, '2023-03-17 18:12:16', NULL),
	(83, 1, 'MONTEBELLO', 2, 87, 0, '2023-03-17 18:12:31', NULL),
	(84, 1, 'MAYA', 2, 88, 0, '2023-03-17 18:12:44', NULL),
	(85, 1, 'JARDINES DE VISTA ALEGRE NOCTURNO', 2, 89, 0, '2023-03-17 18:13:02', NULL),
	(86, 1, 'DIAZ ORDAZ', 2, 90, 0, '2023-03-17 18:13:16', NULL),
	(87, 1, 'SAN ANTONIO CINTA', 2, 91, 0, '2023-03-17 18:13:29', NULL),
	(88, 1, 'MEXICO', 2, 92, 0, '2023-03-17 18:13:43', NULL),
	(89, 1, 'ITZIMNA', 2, 93, 0, '2023-03-17 18:13:56', NULL),
	(90, 1, 'SAN MARCOS', 2, 109, 0, '2023-03-17 18:14:09', NULL),
	(91, 1, 'ROBLE', 2, 110, 0, '2023-03-17 18:14:23', NULL),
	(92, 1, 'DIAMANTE', 2, 111, 0, '2023-03-17 18:14:52', NULL),
	(93, 1, 'TIXCACAL', 2, 112, 0, '2023-03-17 18:15:05', NULL),
	(94, 1, 'SUSULA XOCLAN', 2, 113, 0, '2023-03-17 18:15:18', NULL),
	(95, 1, 'OBRERA', 2, 114, 0, '2023-03-17 18:15:31', NULL),
	(96, 1, 'CASTILLA CAMARA', 2, 115, 0, '2023-03-17 18:15:44', NULL),
	(97, 1, 'CENTRO', 2, 116, 0, '2023-03-17 18:15:57', NULL),
	(98, 1, 'CINCO COLONIAS', 2, 117, 0, '2023-03-17 18:16:09', NULL),
	(99, 1, 'YUCALPETEN', 2, 118, 0, '2023-03-17 18:16:22', NULL),
	(100, 1, 'MULSAY', 2, 119, 0, '2023-03-17 18:16:36', NULL),
	(101, 1, 'INDUSTRIAL', 2, 43, 0, '2023-03-17 18:16:49', NULL),
	(102, 1, 'COMERCIO NOCTURNO', 2, 43, 0, '2023-03-17 18:17:00', NULL),
	(103, 1, 'SAN RAMON NORTE', 2, 123, 0, '2023-03-17 18:17:14', NULL),
	(104, 1, 'MELITON SALAZAR', 2, 132, 0, '2023-03-17 18:17:28', NULL),
	(105, 1, 'NUEVA YUCATAN', 1, 140, 0, '2023-03-17 18:18:42', NULL),
	(106, 1, 'CHICHI SUAREZ', 1, 141, 3, '2023-03-17 18:18:55', NULL);

-- Volcando estructura para tabla ecolsur.asignaciones
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

-- Volcando datos para la tabla ecolsur.asignaciones: ~4 rows (aproximadamente)
INSERT INTO `asignaciones` (`asignacion_id`, `sucursal_id`, `asignacion_nombre`, `estatus`, `created_at`, `updated_at`) VALUES
	(1, 1, 'SANA', 0, '2023-03-15 22:05:59', NULL),
	(2, 1, 'CORBASE', 0, '2023-03-15 22:05:59', NULL),
	(3, 1, 'KANASIN', 0, '2023-03-15 22:05:59', NULL),
	(4, 1, 'UMAN', 0, '2023-03-15 22:05:59', NULL);

-- Volcando estructura para tabla ecolsur.categorias_producto
CREATE TABLE IF NOT EXISTS `categorias_producto` (
  `categoriaProducto_id` int NOT NULL AUTO_INCREMENT,
  `categoriaProducto_nombre` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `sucursal_id` int DEFAULT NULL,
  `estatus` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`categoriaProducto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla ecolsur.categorias_producto: ~6 rows (aproximadamente)
INSERT INTO `categorias_producto` (`categoriaProducto_id`, `categoriaProducto_nombre`, `sucursal_id`, `estatus`, `created_at`, `updated_at`) VALUES
	(1, 'aceites gastados', 1, 0, '2023-08-08 18:30:42', '2023-08-08 18:47:28'),
	(2, 'breas', 1, 0, '2023-08-08 18:47:37', '0000-00-00 00:00:00'),
	(3, 'biologico infecciosio', 1, 0, '2023-08-08 18:47:54', '0000-00-00 00:00:00'),
	(4, 'solidos', 1, 0, '2023-08-08 18:48:04', '0000-00-00 00:00:00'),
	(5, 'solventes', 1, 0, '2023-08-08 18:48:14', '0000-00-00 00:00:00'),
	(6, 'nuclear', 1, 0, '2023-08-08 07:02:04', '0000-00-00 00:00:00');

-- Volcando estructura para tabla ecolsur.destinofinal
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

-- Volcando datos para la tabla ecolsur.destinofinal: ~13 rows (aproximadamente)
INSERT INTO `destinofinal` (`destinofinal_id`, `sucursal_id`, `destinofinal_nombre`, `estatus`, `created_at`, `updated_at`) VALUES
	(0, 0, '-', 0, '2023-03-17 20:11:04', NULL),
	(1, 1, 'VEOLIA', 0, '2023-03-15 22:05:59', NULL),
	(2, 1, 'KANASIN', 0, '2023-03-15 22:05:59', NULL),
	(3, 1, 'YUVA', 0, '2023-03-15 22:05:59', NULL),
	(4, 1, 'MEINSUR', 0, '2023-03-15 22:05:59', NULL),
	(5, 1, 'SCR RECICLADOS', 0, '2023-03-15 22:05:59', NULL),
	(6, 1, 'CEMEX', 0, '2023-03-15 22:05:59', NULL),
	(7, 1, 'CHUNCHIL', 0, '2023-03-15 22:05:59', NULL),
	(8, 1, 'RECUPERADORA DE CARTON DEL SURESTE', 0, '2023-03-15 22:05:59', NULL),
	(9, 1, 'KEKEN UMAN', 0, '2023-03-15 22:05:59', NULL),
	(10, 1, 'RSUMAN', 0, '2023-03-15 22:05:59', NULL),
	(11, 1, 'SAU', 0, '2023-03-15 22:05:59', NULL),
	(13, 1, 'OTRO', 0, '2023-06-15 07:40:13', NULL);

-- Volcando estructura para tabla ecolsur.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `empresa_id` int NOT NULL AUTO_INCREMENT,
  `empresa_nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `estatus` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`empresa_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla ecolsur.empresas: ~3 rows (aproximadamente)
INSERT INTO `empresas` (`empresa_id`, `empresa_nombre`, `estatus`, `created_at`, `updated_at`) VALUES
	(0, 'general', 0, '2023-03-17 20:07:13', NULL),
	(1, 'sana', 0, '2023-03-16 17:51:07', NULL),
	(3, 'ecolsur', 3, '2023-06-19 18:05:46', NULL);

-- Volcando estructura para procedimiento ecolsur.fetch_manifiestos_data
DELIMITER //
CREATE PROCEDURE `fetch_manifiestos_data`(
	IN `p_sucursal_id` INT,
	IN `p_manifiesto_id` INT
)
BEGIN
    DROP TEMPORARY TABLE IF EXISTS temp_results;

    CREATE TEMPORARY TABLE temp_results (
        manifiesto_id INT,
        nummanifiesto VARCHAR(255),
        fecha DATE,
        unidad_id INT,
        unidad_numero VARCHAR(255),
        destinofinal_id INT,
        destinofinal_nombre VARCHAR(255),
        folio_ids TEXT,
        categoria_id TEXT,
        categoria_nombre TEXT,
        productos_id TEXT,
        productos TEXT,
        descripciones TEXT,
        cantidad TEXT,
        medidas_nombres TEXT,
        total_cantidad_concatenadas TEXT
    );

    INSERT INTO temp_results
    SELECT
        manifiestos.manifiesto_id,
        manifiestos.nummanifiesto,
        manifiestos.fecha,
        unidades.unidad_id,
        unidades.unidad_numero,
        destinofinal.destinofinal_id,
        destinofinal.destinofinal_nombre,
        IFNULL(GROUP_CONCAT(folios.folio_id), NULL),
        IFNULL(GROUP_CONCAT(categorias_producto.categoriaProducto_id), NULL),
        IFNULL(GROUP_CONCAT(categorias_producto.categoriaProducto_nombre), NULL),
        IFNULL(GROUP_CONCAT(tipo_producto.tipoProducto_id), NULL),
        IFNULL(GROUP_CONCAT(tipo_producto.tipoProducto_nombre), NULL),
        IFNULL(GROUP_CONCAT(folios.descripcion), NULL),
        IFNULL(GROUP_CONCAT(folios.cantidad), NULL),
        IFNULL(GROUP_CONCAT(medidas.medida_nombre), NULL),
        IFNULL(SUM(sub.total), NULL) AS total_cantidad_concatenadas
    FROM
        manifiestos
    LEFT JOIN manifiestos_folios ON manifiestos.manifiesto_id = manifiestos_folios.manifiesto_id
    LEFT JOIN destinofinal ON manifiestos.destinofinal_id = destinofinal.destinofinal_id
    LEFT JOIN unidades ON manifiestos.unidad_id = unidades.unidad_id
    LEFT JOIN folios ON manifiestos_folios.folio_id = folios.folio_id
    LEFT JOIN tipo_producto ON tipo_producto.tipoProducto_id = folios.tipoProducto_id
    LEFT JOIN categorias_producto ON tipo_producto.categoriaProducto_id = categorias_producto.categoriaProducto_id
    LEFT JOIN Medidas ON Folios.medidas_id = Medidas.medidas_id
    LEFT JOIN (
        SELECT
            manifiesto_id,
            medidas_id, SUM(cantidad) AS total
        FROM
            folios
        LEFT JOIN manifiestos_folios ON folios.folio_id = manifiestos_folios.folio_id
        GROUP BY
            manifiesto_id,
            medidas_id
    ) AS sub ON manifiestos.manifiesto_id = sub.manifiesto_id AND folios.medidas_id = sub.medidas_id
    WHERE
        (manifiestos.sucursal_id = p_sucursal_id OR p_sucursal_id IS NULL) AND
        (p_manifiesto_id IS NULL OR manifiestos_folios.manifiesto_id = p_manifiesto_id) AND
    (manifiestos.estatus = 0)
    GROUP BY
        manifiestos.manifiesto_id,
        manifiestos.nummanifiesto,
        manifiestos.fecha,
        unidades.unidad_id,
        unidades.unidad_numero,
        destinofinal.destinofinal_id,
        destinofinal.destinofinal_nombre;
    
    SELECT *
    FROM temp_results;
    
    DROP TEMPORARY TABLE IF EXISTS temp_results;
END//
DELIMITER ;

-- Volcando estructura para procedimiento ecolsur.fetch_manifiestos_dataedit
DELIMITER //
CREATE PROCEDURE `fetch_manifiestos_dataedit`(
	IN `p_sucursal_id` INT,
	IN `p_manifiesto_id` INT
)
BEGIN
    DROP TEMPORARY TABLE IF EXISTS temp_results;

    CREATE TEMPORARY TABLE temp_results (
        manifiesto_id INT,
        nummanifiesto VARCHAR(255),
        fecha DATE,
        unidad_id INT,
        unidad_numero VARCHAR(255),
        destinofinal_id INT,
        destinofinal_nombre VARCHAR(255),
        folio_ids TEXT,
        categoria_id TEXT,
        categoria_nombre TEXT,
        productos_id TEXT,
        productos TEXT,
        descripciones TEXT,
        cantidad TEXT,
        medidas_nombres TEXT,
        total_cantidad_concatenadas TEXT
    );

    INSERT INTO temp_results
    SELECT
        manifiestos.manifiesto_id,
        manifiestos.nummanifiesto,
        manifiestos.fecha,
        unidades.unidad_id,
        unidades.unidad_numero,
        destinofinal.destinofinal_id,
        destinofinal.destinofinal_nombre,
        IFNULL(GROUP_CONCAT(folios.folio_id), NULL),
        IFNULL(GROUP_CONCAT(categorias_producto.categoriaProducto_id), NULL),
        IFNULL(GROUP_CONCAT(categorias_producto.categoriaProducto_nombre), NULL),
        IFNULL(GROUP_CONCAT(tipo_producto.tipoProducto_id), NULL),
        IFNULL(GROUP_CONCAT(tipo_producto.tipoProducto_nombre), NULL),
        IFNULL(GROUP_CONCAT(folios.descripcion), NULL),
        IFNULL(GROUP_CONCAT(folios.cantidad), NULL),
        IFNULL(GROUP_CONCAT(medidas.medida_nombre), NULL),
        IFNULL(SUM(sub.total), NULL) AS total_cantidad_concatenadas
    FROM
        manifiestos
    LEFT JOIN manifiestos_folios ON manifiestos.manifiesto_id = manifiestos_folios.manifiesto_id
    LEFT JOIN destinofinal ON manifiestos.destinofinal_id = destinofinal.destinofinal_id
    LEFT JOIN unidades ON manifiestos.unidad_id = unidades.unidad_id
    LEFT JOIN folios ON manifiestos_folios.folio_id = folios.folio_id
    LEFT JOIN tipo_producto ON tipo_producto.tipoProducto_id = folios.tipoProducto_id
    LEFT JOIN categorias_producto ON tipo_producto.categoriaProducto_id = categorias_producto.categoriaProducto_id
    LEFT JOIN Medidas ON Folios.medidas_id = Medidas.medidas_id
    LEFT JOIN (
        SELECT
            manifiesto_id,
            medidas_id, SUM(cantidad) AS total
        FROM
            folios
        LEFT JOIN manifiestos_folios ON folios.folio_id = manifiestos_folios.folio_id
        GROUP BY
            manifiesto_id,
            medidas_id
    ) AS sub ON manifiestos.manifiesto_id = sub.manifiesto_id AND folios.medidas_id = sub.medidas_id
    WHERE
        (manifiestos.sucursal_id = p_sucursal_id OR p_sucursal_id IS NULL) AND
        (p_manifiesto_id IS NULL OR manifiestos_folios.manifiesto_id = p_manifiesto_id) or
    (folios.estatus = 0)
    GROUP BY
        manifiestos.manifiesto_id,
        manifiestos.nummanifiesto,
        manifiestos.fecha,
        unidades.unidad_id,
        unidades.unidad_numero,
        destinofinal.destinofinal_id,
        destinofinal.destinofinal_nombre;
    
    SELECT *
    FROM temp_results;
    
    DROP TEMPORARY TABLE IF EXISTS temp_results;
END//
DELIMITER ;

-- Volcando estructura para tabla ecolsur.folios
CREATE TABLE IF NOT EXISTS `folios` (
  `folio_id` int NOT NULL AUTO_INCREMENT,
  `tipoProducto_id` int NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `medidas_id` int DEFAULT NULL,
  `estatus` int DEFAULT NULL,
  PRIMARY KEY (`folio_id`),
  KEY `FK_folios_tipo_producto` (`tipoProducto_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla ecolsur.folios: ~16 rows (aproximadamente)
INSERT INTO `folios` (`folio_id`, `tipoProducto_id`, `descripcion`, `cantidad`, `medidas_id`, `estatus`) VALUES
	(45, 2, 'usado50', 50, 1, 0),
	(47, 2, 'usado', 1, 1, 0),
	(48, 2, 'usado', 1, 1, 0),
	(49, 3, 'usado2', 1, 2, 0),
	(50, 2, 'usado', 123, 1, 0),
	(51, 3, 'usado12', 565, 2, 0),
	(52, 2, 'papael usado', 124, 1, 0),
	(53, 2, 'papael usado2', 456, 1, 0),
	(54, 3, 'plutoneo usado', 4, 3, 0),
	(55, 3, 'plutoneo usado2', 56, 3, 0),
	(56, 1, 'geringas usadas', 23, 2, NULL),
	(57, 1, 'geringas usadas2', 56, 2, NULL),
	(58, 2, 'papel suado 46', 45, 1, NULL),
	(59, 2, 'papel usado', 1, 1, 0),
	(60, 2, 'papel usado2', 32, 1, 0),
	(61, 0, '', 0, 1, NULL);

-- Volcando estructura para vista ecolsur.folios_agregados
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `folios_agregados` (
	`manifiesto_id` INT(10) NOT NULL,
	`nummanifiesto` INT(10) NOT NULL,
	`fecha` DATE NOT NULL,
	`unidad_id` INT(10) NOT NULL,
	`unidad_numero` VARCHAR(50) NULL COLLATE 'utf8mb3_spanish_ci',
	`destinofinal_id` INT(10) NOT NULL,
	`destinofinal_nombre` VARCHAR(50) NOT NULL COLLATE 'utf8mb3_spanish_ci',
	`numfolios` BIGINT(19) NOT NULL,
	`folio_ids` TEXT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`categoriaProducto_nombre` TEXT NULL COLLATE 'utf8mb4_spanish_ci',
	`tipoProducto_nombre` TEXT NULL COLLATE 'utf8mb4_spanish_ci',
	`cantidades` TEXT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`medida_nombre` VARCHAR(50) NULL COLLATE 'utf8mb4_spanish_ci',
	`pesos_totales` DECIMAL(32,0) NULL,
	`descripciones` TEXT NULL COLLATE 'utf8mb4_spanish_ci'
) ENGINE=MyISAM;

-- Volcando estructura para tabla ecolsur.grupos
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

-- Volcando datos para la tabla ecolsur.grupos: ~11 rows (aproximadamente)
INSERT INTO `grupos` (`grupo_id`, `sucursal_id`, `grupo_nombre`, `permisos`, `estatus`, `created_at`, `updated_at`) VALUES
	(1, 0, 'Administrador', 'a:70:{i:0;s:13:"createEmpresa";i:1;s:13:"updateEmpresa";i:2;s:11:"viewEmpresa";i:3;s:13:"deleteEmpresa";i:4;s:16:"createSucursales";i:5;s:16:"updateSucursales";i:6;s:14:"viewSucursales";i:7;s:16:"deleteSucursales";i:8;s:16:"createVigilancia";i:9;s:16:"updateVigilancia";i:10;s:14:"viewVigilancia";i:11;s:16:"deleteVigilancia";i:12;s:17:"createSupervision";i:13;s:17:"updateSupervision";i:14;s:15:"viewSupervision";i:15;s:17:"deleteSupervision";i:16;s:16:"createSupervisor";i:17;s:16:"updateSupervisor";i:18;s:14:"viewSupervisor";i:19;s:16:"deleteSupervisor";i:20;s:11:"createTurno";i:21;s:11:"updateTurno";i:22;s:9:"viewTurno";i:23;s:11:"deleteTurno";i:24;s:10:"createRuta";i:25;s:10:"updateRuta";i:26;s:8:"viewRuta";i:27;s:10:"deleteRuta";i:28;s:11:"createAlias";i:29;s:11:"updateAlias";i:30;s:9:"viewAlias";i:31;s:11:"deleteAlias";i:32;s:14:"createOperador";i:33;s:14:"updateOperador";i:34;s:12:"viewOperador";i:35;s:14:"deleteOperador";i:36;s:16:"createRecolector";i:37;s:16:"updateRecolector";i:38;s:14:"viewRecolector";i:39;s:16:"deleteRecolector";i:40;s:12:"createUnidad";i:41;s:12:"updateUnidad";i:42;s:10:"viewUnidad";i:43;s:12:"deleteUnidad";i:44;s:18:"createDestinoFinal";i:45;s:18:"updateDestinoFinal";i:46;s:16:"viewDestinoFinal";i:47;s:18:"deleteDestinoFinal";i:48;s:12:"createTicket";i:49;s:12:"updateTicket";i:50;s:10:"viewTicket";i:51;s:12:"deleteTicket";i:52;s:13:"createReporte";i:53;s:13:"updateReporte";i:54;s:11:"viewReporte";i:55;s:13:"deleteReporte";i:56;s:20:"createEditarRegistro";i:57;s:20:"updateEditarRegistro";i:58;s:18:"viewEditarRegistro";i:59;s:20:"deleteEditarRegistro";i:60;s:11:"viewProfile";i:61;s:13:"updateSetting";i:62;s:10:"createUser";i:63;s:10:"updateUser";i:64;s:8:"viewUser";i:65;s:10:"deleteUser";i:66;s:11:"createGroup";i:67;s:11:"updateGroup";i:68;s:9:"viewGroup";i:69;s:11:"deleteGroup";}', 0, '2023-03-16 17:53:20', NULL),
	(2, 1, 'vigilante', 'a:15:{i:0;s:16:"createVigilancia";i:1;s:16:"updateVigilancia";i:2;s:14:"viewVigilancia";i:3;s:14:"createOperador";i:4;s:14:"updateOperador";i:5;s:12:"viewOperador";i:6;s:14:"deleteOperador";i:7;s:16:"createRecolector";i:8;s:16:"updateRecolector";i:9;s:14:"viewRecolector";i:10;s:16:"deleteRecolector";i:11;s:12:"createUnidad";i:12;s:12:"updateUnidad";i:13;s:10:"viewUnidad";i:14;s:12:"deleteUnidad";}', 0, '2023-03-17 18:38:23', '2023-07-14 07:39:46'),
	(3, 1, 'capturista', 'a:48:{i:0;s:16:"createVigilancia";i:1;s:16:"updateVigilancia";i:2;s:14:"viewVigilancia";i:3;s:16:"deleteVigilancia";i:4;s:17:"createSupervision";i:5;s:17:"updateSupervision";i:6;s:15:"viewSupervision";i:7;s:17:"deleteSupervision";i:8;s:11:"createTurno";i:9;s:11:"updateTurno";i:10;s:9:"viewTurno";i:11;s:11:"deleteTurno";i:12;s:10:"createRuta";i:13;s:10:"updateRuta";i:14;s:8:"viewRuta";i:15;s:10:"deleteRuta";i:16;s:11:"createAlias";i:17;s:11:"updateAlias";i:18;s:9:"viewAlias";i:19;s:11:"deleteAlias";i:20;s:14:"createOperador";i:21;s:14:"updateOperador";i:22;s:12:"viewOperador";i:23;s:14:"deleteOperador";i:24;s:16:"createRecolector";i:25;s:16:"updateRecolector";i:26;s:14:"viewRecolector";i:27;s:16:"deleteRecolector";i:28;s:12:"createUnidad";i:29;s:12:"updateUnidad";i:30;s:10:"viewUnidad";i:31;s:12:"deleteUnidad";i:32;s:18:"createDestinoFinal";i:33;s:18:"updateDestinoFinal";i:34;s:16:"viewDestinoFinal";i:35;s:18:"deleteDestinoFinal";i:36;s:12:"createTicket";i:37;s:12:"updateTicket";i:38;s:10:"viewTicket";i:39;s:12:"deleteTicket";i:40;s:13:"createReporte";i:41;s:13:"updateReporte";i:42;s:11:"viewReporte";i:43;s:13:"deleteReporte";i:44;s:20:"createEditarRegistro";i:45;s:20:"updateEditarRegistro";i:46;s:18:"viewEditarRegistro";i:47;s:20:"deleteEditarRegistro";}', 0, '2023-04-17 06:12:33', '2019-12-07 10:22:18'),
	(4, 1, 'sistemas', 'a:70:{i:0;s:13:"createEmpresa";i:1;s:13:"updateEmpresa";i:2;s:11:"viewEmpresa";i:3;s:13:"deleteEmpresa";i:4;s:16:"createSucursales";i:5;s:16:"updateSucursales";i:6;s:14:"viewSucursales";i:7;s:16:"deleteSucursales";i:8;s:16:"createVigilancia";i:9;s:16:"updateVigilancia";i:10;s:14:"viewVigilancia";i:11;s:16:"deleteVigilancia";i:12;s:17:"createSupervision";i:13;s:17:"updateSupervision";i:14;s:15:"viewSupervision";i:15;s:17:"deleteSupervision";i:16;s:16:"createSupervisor";i:17;s:16:"updateSupervisor";i:18;s:14:"viewSupervisor";i:19;s:16:"deleteSupervisor";i:20;s:11:"createTurno";i:21;s:11:"updateTurno";i:22;s:9:"viewTurno";i:23;s:11:"deleteTurno";i:24;s:10:"createRuta";i:25;s:10:"updateRuta";i:26;s:8:"viewRuta";i:27;s:10:"deleteRuta";i:28;s:11:"createAlias";i:29;s:11:"updateAlias";i:30;s:9:"viewAlias";i:31;s:11:"deleteAlias";i:32;s:14:"createOperador";i:33;s:14:"updateOperador";i:34;s:12:"viewOperador";i:35;s:14:"deleteOperador";i:36;s:16:"createRecolector";i:37;s:16:"updateRecolector";i:38;s:14:"viewRecolector";i:39;s:16:"deleteRecolector";i:40;s:12:"createUnidad";i:41;s:12:"updateUnidad";i:42;s:10:"viewUnidad";i:43;s:12:"deleteUnidad";i:44;s:18:"createDestinoFinal";i:45;s:18:"updateDestinoFinal";i:46;s:16:"viewDestinoFinal";i:47;s:18:"deleteDestinoFinal";i:48;s:12:"createTicket";i:49;s:12:"updateTicket";i:50;s:10:"viewTicket";i:51;s:12:"deleteTicket";i:52;s:13:"createReporte";i:53;s:13:"updateReporte";i:54;s:11:"viewReporte";i:55;s:13:"deleteReporte";i:56;s:20:"createEditarRegistro";i:57;s:20:"updateEditarRegistro";i:58;s:18:"viewEditarRegistro";i:59;s:20:"deleteEditarRegistro";i:60;s:11:"viewProfile";i:61;s:13:"updateSetting";i:62;s:10:"createUser";i:63;s:10:"updateUser";i:64;s:8:"viewUser";i:65;s:10:"deleteUser";i:66;s:11:"createGroup";i:67;s:11:"updateGroup";i:68;s:9:"viewGroup";i:69;s:11:"deleteGroup";}', 0, '2023-04-17 09:48:11', NULL),
	(5, 1, 'supervisor', 'a:48:{i:0;s:16:"createVigilancia";i:1;s:16:"updateVigilancia";i:2;s:14:"viewVigilancia";i:3;s:16:"deleteVigilancia";i:4;s:17:"createSupervision";i:5;s:17:"updateSupervision";i:6;s:15:"viewSupervision";i:7;s:17:"deleteSupervision";i:8;s:11:"createTurno";i:9;s:11:"updateTurno";i:10;s:9:"viewTurno";i:11;s:11:"deleteTurno";i:12;s:10:"createRuta";i:13;s:10:"updateRuta";i:14;s:8:"viewRuta";i:15;s:10:"deleteRuta";i:16;s:11:"createAlias";i:17;s:11:"updateAlias";i:18;s:9:"viewAlias";i:19;s:11:"deleteAlias";i:20;s:14:"createOperador";i:21;s:14:"updateOperador";i:22;s:12:"viewOperador";i:23;s:14:"deleteOperador";i:24;s:16:"createRecolector";i:25;s:16:"updateRecolector";i:26;s:14:"viewRecolector";i:27;s:16:"deleteRecolector";i:28;s:12:"createUnidad";i:29;s:12:"updateUnidad";i:30;s:10:"viewUnidad";i:31;s:12:"deleteUnidad";i:32;s:18:"createDestinoFinal";i:33;s:18:"updateDestinoFinal";i:34;s:16:"viewDestinoFinal";i:35;s:18:"deleteDestinoFinal";i:36;s:12:"createTicket";i:37;s:12:"updateTicket";i:38;s:10:"viewTicket";i:39;s:12:"deleteTicket";i:40;s:13:"createReporte";i:41;s:13:"updateReporte";i:42;s:11:"viewReporte";i:43;s:13:"deleteReporte";i:44;s:20:"createEditarRegistro";i:45;s:20:"updateEditarRegistro";i:46;s:18:"viewEditarRegistro";i:47;s:20:"deleteEditarRegistro";}', 0, '2023-04-19 10:09:35', '2023-04-24 18:54:00'),
	(6, 1, 'supervisor_ver', 'a:11:{i:0;s:14:"viewVigilancia";i:1;s:15:"viewSupervision";i:2;s:9:"viewTurno";i:3;s:8:"viewRuta";i:4;s:9:"viewAlias";i:5;s:12:"viewOperador";i:6;s:14:"viewRecolector";i:7;s:10:"viewUnidad";i:8;s:16:"viewDestinoFinal";i:9;s:10:"viewTicket";i:10;s:11:"viewReporte";}', 3, '2019-12-07 10:05:22', '2019-12-07 10:07:23'),
	(7, 1, 'soloVer', 'a:11:{i:0;s:14:"viewVigilancia";i:1;s:15:"viewSupervision";i:2;s:9:"viewTurno";i:3;s:8:"viewRuta";i:4;s:9:"viewAlias";i:5;s:12:"viewOperador";i:6;s:14:"viewRecolector";i:7;s:10:"viewUnidad";i:8;s:16:"viewDestinoFinal";i:9;s:10:"viewTicket";i:10;s:11:"viewReporte";}', 0, '2019-12-07 10:14:35', NULL),
	(8, 1, 'manuel', 'a:16:{i:0;s:14:"viewVigilancia";i:1;s:16:"deleteVigilancia";i:2;s:15:"viewSupervision";i:3;s:17:"deleteSupervision";i:4;s:9:"viewTurno";i:5;s:8:"viewRuta";i:6;s:9:"viewAlias";i:7;s:12:"viewOperador";i:8;s:14:"viewRecolector";i:9;s:10:"viewUnidad";i:10;s:16:"viewDestinoFinal";i:11;s:10:"viewTicket";i:12;s:11:"viewReporte";i:13;s:20:"createEditarRegistro";i:14;s:20:"updateEditarRegistro";i:15;s:18:"viewEditarRegistro";}', 3, '2019-12-07 10:18:36', '2023-04-20 18:31:05'),
	(9, 1, 'monitoreo', 'a:13:{i:0;s:14:"viewVigilancia";i:1;s:16:"deleteVigilancia";i:2;s:15:"viewSupervision";i:3;s:17:"deleteSupervision";i:4;s:9:"viewTurno";i:5;s:8:"viewRuta";i:6;s:9:"viewAlias";i:7;s:12:"viewOperador";i:8;s:14:"viewRecolector";i:9;s:10:"viewUnidad";i:10;s:16:"viewDestinoFinal";i:11;s:10:"viewTicket";i:12;s:11:"viewReporte";}', 0, '2023-04-20 18:07:28', NULL),
	(10, 1, 'RH', 'a:8:{i:0;s:14:"viewVigilancia";i:1;s:16:"deleteVigilancia";i:2;s:15:"viewSupervision";i:3;s:17:"deleteSupervision";i:4;s:13:"createReporte";i:5;s:13:"updateReporte";i:6;s:11:"viewReporte";i:7;s:13:"deleteReporte";}', 0, '2023-06-24 17:15:31', NULL),
	(11, 1, 'taller', 'a:6:{i:0;s:14:"viewVigilancia";i:1;s:15:"viewSupervision";i:2;s:13:"createReporte";i:3;s:13:"updateReporte";i:4;s:11:"viewReporte";i:5;s:13:"deleteReporte";}', 0, '2023-07-01 18:13:32', NULL);

-- Volcando estructura para tabla ecolsur.manifiestos
CREATE TABLE IF NOT EXISTS `manifiestos` (
  `manifiesto_id` int NOT NULL AUTO_INCREMENT,
  `nummanifiesto` int NOT NULL,
  `sucursal_id` int NOT NULL,
  `unidad_id` int NOT NULL,
  `fecha` date NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla ecolsur.manifiestos: ~3 rows (aproximadamente)
INSERT INTO `manifiestos` (`manifiesto_id`, `nummanifiesto`, `sucursal_id`, `unidad_id`, `fecha`, `destinofinal_id`, `estatus`, `created_at`, `updated_at`) VALUES
	(1, 111, 1, 6, '2023-09-15', 2, 0, '2023-09-15 09:52:01', NULL),
	(2, 2222, 1, 6, '2023-09-15', 2, 0, '2023-09-15 09:53:20', NULL),
	(3, 3333, 1, 6, '2023-09-15', 2, 0, '2023-09-15 09:54:57', NULL);

-- Volcando estructura para tabla ecolsur.manifiestos_folios
CREATE TABLE IF NOT EXISTS `manifiestos_folios` (
  `manifiesto_id` int NOT NULL,
  `folio_id` int NOT NULL,
  `estatus` int NOT NULL,
  KEY `FK__folios` (`folio_id`),
  KEY `FK__manifiestos` (`manifiesto_id`),
  CONSTRAINT `FK__folios` FOREIGN KEY (`folio_id`) REFERENCES `folios` (`folio_id`) ON DELETE CASCADE,
  CONSTRAINT `FK__manifiestos` FOREIGN KEY (`manifiesto_id`) REFERENCES `manifiestos` (`manifiesto_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla ecolsur.manifiestos_folios: ~10 rows (aproximadamente)
INSERT INTO `manifiestos_folios` (`manifiesto_id`, `folio_id`, `estatus`) VALUES
	(1, 52, 0),
	(1, 53, 0),
	(1, 54, 0),
	(1, 55, 0),
	(2, 56, 0),
	(2, 57, 0),
	(2, 58, 0),
	(3, 59, 0),
	(3, 60, 0),
	(2, 61, 0);

-- Volcando estructura para tabla ecolsur.medidas
CREATE TABLE IF NOT EXISTS `medidas` (
  `medidas_id` int NOT NULL AUTO_INCREMENT,
  `medida_nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`medidas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla ecolsur.medidas: ~2 rows (aproximadamente)
INSERT INTO `medidas` (`medidas_id`, `medida_nombre`, `created_at`, `updated_at`) VALUES
	(1, 'KG', '2023-08-09 17:15:37', '2023-08-09 17:15:44'),
	(2, 'L', '2023-08-09 17:16:07', '2023-08-09 17:16:08'),
	(3, 'BARRIL', '2023-08-09 17:16:58', '2023-08-09 17:16:59');

-- Volcando estructura para vista ecolsur.num_tripulacion
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `num_tripulacion` (
	`registro_id` INT(10) NOT NULL,
	`numrecolectores` BIGINT(19) NOT NULL,
	`recolector_id` TEXT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`recolectores` TEXT NULL COLLATE 'utf8mb3_spanish_ci'
) ENGINE=MyISAM;

-- Volcando estructura para tabla ecolsur.operadores
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

-- Volcando datos para la tabla ecolsur.operadores: ~139 rows (aproximadamente)
INSERT INTO `operadores` (`operador_id`, `sucursal_id`, `operador_nombre`, `estatus`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Acosta Tun Jose Bernardo', 0, '2023-03-15 22:05:59', NULL),
	(2, 1, 'Canche Canche Jose Rosendo', 0, '2023-03-15 22:05:59', NULL),
	(3, 1, 'Cen Chan Alejandro Omar', 0, '2023-03-15 22:05:59', NULL),
	(4, 1, 'Cen Koyoc Jose Arturo', 3, '2023-03-15 22:05:59', NULL),
	(5, 1, 'Cen Mian Juan Gabriel', 3, '2023-03-15 22:05:59', NULL),
	(6, 1, 'Chan Perez Juan Manuel', 3, '2023-03-15 22:05:59', NULL),
	(7, 1, 'Chay Huh Julian', 3, '2023-03-15 22:05:59', NULL),
	(8, 1, 'Chuc Dzul Santos Eliseo', 3, '2023-03-15 22:05:59', NULL),
	(9, 1, 'De la Cruz Montero Pedro', 3, '2023-03-15 22:05:59', NULL),
	(10, 1, 'Dzib Pacheco Fernando Enrique', 3, '2023-03-15 22:05:59', NULL),
	(11, 1, 'Ek Cauich Raul Obdulio', 3, '2023-03-15 22:05:59', NULL),
	(12, 1, 'Gonzalez May Etzer Roman', 3, '2023-03-15 22:05:59', NULL),
	(13, 1, 'Ku Tapia Javier', 3, '2023-03-15 22:05:59', NULL),
	(14, 1, 'Maldonado Ojeda Ramon Bibiano', 3, '2023-03-15 22:05:59', NULL),
	(15, 1, 'Moo Amen Wilbert Jesus', 3, '2023-03-15 22:05:59', NULL),
	(16, 1, 'Moo Moo Juan Alberto', 3, '2023-03-15 22:05:59', NULL),
	(17, 1, 'Moo Moo Reyes Guadalupe', 3, '2023-03-15 22:05:59', NULL),
	(18, 1, 'Munoz Polanco Luis Adrian', 0, '2023-03-15 22:05:59', NULL),
	(19, 1, 'Navarro Vazquez Rocky de Jesus', 3, '2023-03-15 22:05:59', NULL),
	(20, 1, 'Rejon Tun Jose Alfonso', 3, '2023-03-15 22:05:59', NULL),
	(21, 1, 'Rojas Sanchez Freddy Alonso', 3, '2023-03-15 22:05:59', NULL),
	(22, 1, 'Sabido Martinez Aldemar Antonio', 3, '2023-03-15 22:05:59', NULL),
	(23, 1, 'Salazar Lopez Julio Cesar', 0, '2023-03-15 22:05:59', NULL),
	(24, 1, 'Sauri Flamenco Duglas Alberto', 3, '2023-03-15 22:05:59', NULL),
	(25, 1, 'Solis Puc Alberto', 3, '2023-03-15 22:05:59', NULL),
	(26, 1, 'Torres Zapata Lucio', 3, '2023-03-15 22:05:59', NULL),
	(27, 1, 'Tun Chable Lazaro Manuel', 0, '2023-03-15 22:05:59', NULL),
	(28, 1, 'Tun Eb Jorge Atilano', 3, '2023-03-15 22:05:59', NULL),
	(29, 1, 'Uitz Mena Rogelio Abelardo', 3, '2023-03-15 22:05:59', NULL),
	(30, 1, 'Vera Pacheco Yudy Melchor De Jesus', 3, '2023-03-15 22:05:59', NULL),
	(31, 1, 'Castro Zapata Carlos Damiel', 0, '2023-03-15 22:05:59', NULL),
	(32, 1, 'Heredia Rubio Natanael Ulises', 3, '2023-03-15 22:05:59', NULL),
	(33, 1, 'Blanco Mena Clemente Alonso', 0, '2023-03-15 22:05:59', NULL),
	(34, 1, 'Joel Alejandro Dzul Quetzal', 3, '2023-03-15 22:05:59', NULL),
	(35, 1, 'Fidel de jesus mendoza ventura', 3, '2023-03-15 22:05:59', NULL),
	(36, 1, 'Velazquez puc adrian humberto', 3, '2023-03-15 22:05:59', NULL),
	(37, 1, 'Madera Garcia Erick Gilberto', 3, '2023-03-15 22:05:59', NULL),
	(38, 1, 'Couoh Ramirez Javier Armando', 3, '2023-03-15 22:05:59', NULL),
	(39, 1, 'May Hernandez Juan Carlos', 0, '2023-03-15 22:05:59', NULL),
	(40, 1, 'cuevas castillo joel camilo', 0, '2023-03-15 22:05:59', NULL),
	(41, 1, 'Fuente Garcia Delio Manuel', 3, '2023-03-15 22:05:59', NULL),
	(42, 1, 'Mendoza Ventura Xavier Alejandro', 3, '2023-03-15 22:05:59', NULL),
	(43, 1, 'Rojas Sanchez Jose Antonio', 3, '2023-03-15 22:05:59', NULL),
	(44, 1, 'Cruz Ferraez Williams', 0, '2023-03-15 22:05:59', NULL),
	(45, 1, 'Pool Solis Reyes Gaspar', 3, '2023-03-15 22:05:59', NULL),
	(46, 1, 'GONZALEZ WONG FREDY', 3, '2023-03-15 22:05:59', NULL),
	(47, 1, 'Gomez Cobos Shelling Abraham', 3, '2023-03-15 22:05:59', NULL),
	(48, 1, 'Sosa Gamboa Jesus Armando', 3, '2023-03-15 22:05:59', NULL),
	(49, 1, 'Baas Gomez Jose Martin', 0, '2023-03-15 22:05:59', NULL),
	(50, 1, 'Varguez Contreras Ruben Homero', 3, '2023-03-15 22:05:59', NULL),
	(51, 1, 'Nolasco Mateo Alejandro', 3, '2023-03-15 22:05:59', NULL),
	(52, 1, 'Cen Chan Daniel Ezequiel', 3, '2023-03-15 22:05:59', NULL),
	(53, 1, 'Herrera Kuh Oscar Martin', 3, '2023-03-15 22:05:59', NULL),
	(54, 1, 'Luna Perez Jose Luis Ivan', 3, '2023-03-15 22:05:59', NULL),
	(55, 1, 'Ake Hu Jose Baltazar', 0, '2023-03-15 22:05:59', NULL),
	(56, 1, 'Ayil Chan Jose Arturo', 0, '2023-03-15 22:05:59', NULL),
	(57, 1, 'Fernandez Lopez Rafael Martin', 0, '2023-03-15 22:05:59', NULL),
	(58, 1, 'Xix Zapata Antonio', 0, '2023-03-15 22:05:59', NULL),
	(59, 1, 'Rodriguez Santos Julio Cesar', 0, '2023-03-15 22:05:59', NULL),
	(60, 1, 'Martin Pacheco', 0, '2023-03-15 22:05:59', NULL),
	(61, 1, 'Camara Cetina Gabriel de Jesus', 0, '2023-03-15 22:05:59', NULL),
	(62, 1, 'Tut Maldonado Joaquin Arturo', 3, '2023-03-15 22:05:59', NULL),
	(63, 1, 'Cabrera Balam Ariel Ismael', 3, '2023-03-15 22:05:59', NULL),
	(64, 1, 'Cen Chan Daniel Ezequiel', 0, '2023-03-15 22:05:59', NULL),
	(65, 1, 'Cen Koyoc Jose Arturo', 0, '2023-03-15 22:05:59', NULL),
	(66, 1, 'Cen Mian Juan Gabriel', 0, '2023-03-15 22:05:59', NULL),
	(67, 1, 'Chan Perez Juan Manuel', 0, '2023-03-15 22:05:59', NULL),
	(68, 1, 'Chay Huh Julian', 0, '2023-03-15 22:05:59', NULL),
	(69, 1, 'Chuc Dzul Santos Eliseo', 0, '2023-03-15 22:05:59', NULL),
	(70, 1, 'Couoh Ramirez Javier Armando', 0, '2023-03-15 22:05:59', NULL),
	(71, 1, 'Cruz Ferraez Williams', 0, '2023-03-15 22:05:59', NULL),
	(72, 1, 'De la Cruz Montero Pedro', 0, '2023-03-15 22:05:59', NULL),
	(73, 1, 'Dzib Pacheco Fernando Enrique', 0, '2023-03-15 22:05:59', NULL),
	(74, 1, 'Dzul Quetzal Joel Alejandro', 0, '2023-03-15 22:05:59', NULL),
	(75, 1, 'Ek Cauich Raul Obdulio', 0, '2023-03-15 22:05:59', NULL),
	(76, 1, 'Fernandez Lopez Rafael Martin', 0, '2023-03-15 22:05:59', NULL),
	(77, 1, 'Fuente Garcia Delio Manuel', 0, '2023-03-15 22:05:59', NULL),
	(78, 1, 'Gomez Cobos Shelling Abraham', 0, '2023-03-15 22:05:59', NULL),
	(79, 1, 'Gonzalez May Etzer Roman', 0, '2023-03-15 22:05:59', NULL),
	(80, 1, 'Gonzalez Wong Fredy', 0, '2023-03-15 22:05:59', NULL),
	(81, 1, 'Heredia Rubio Natanael Ulises', 3, '2023-03-15 22:05:59', NULL),
	(82, 1, 'Herrera Kuh Oscar Martin', 0, '2023-03-15 22:05:59', NULL),
	(83, 1, 'Ku Tapia Javier', 0, '2023-03-15 22:05:59', NULL),
	(84, 1, 'Luna Perez Jose Luis Ivan', 0, '2023-03-15 22:05:59', NULL),
	(85, 1, 'Madera Garcia Erick Gilberto', 0, '2023-03-15 22:05:59', NULL),
	(86, 1, 'Maldonado Ojeda Ramon Bibiano', 0, '2023-03-15 22:05:59', NULL),
	(87, 1, 'Mendoza Ventura Fidel de Jesus', 0, '2023-03-15 22:05:59', NULL),
	(88, 1, 'Mendoza Ventura Xavier Alejandro', 0, '2023-03-15 22:05:59', NULL),
	(89, 1, 'Moo Amen Wilbert Jesus', 0, '2023-03-15 22:05:59', NULL),
	(90, 1, 'Moo Moo Juan Alberto', 0, '2023-03-15 22:05:59', NULL),
	(91, 1, 'Moo Moo Reyes Guadalupe', 0, '2023-03-15 22:05:59', NULL),
	(92, 1, 'MuÃƒÂ±oz Polanco Luis Adrian', 3, '2023-03-15 22:05:59', NULL),
	(93, 1, 'Navarro Vazquez Rocky de Jesus', 0, '2023-03-15 22:05:59', NULL),
	(94, 1, 'Nolasco Mateo Alejandro', 0, '2023-03-15 22:05:59', NULL),
	(95, 1, 'Pool Solis Reyes Gaspar', 0, '2023-03-15 22:05:59', NULL),
	(96, 1, 'Rejon Tun Jose Alfonso', 0, '2023-03-15 22:05:59', NULL),
	(97, 1, 'Rodriguez Santos Julio Cesar', 0, '2023-03-15 22:05:59', NULL),
	(98, 1, 'Rojas Sanchez Freddy Alonso', 0, '2023-03-15 22:05:59', NULL),
	(99, 1, 'Rojas Sanchez Jose Antonio', 0, '2023-03-15 22:05:59', NULL),
	(100, 1, 'Sabido Martinez Aldemar Antonio', 0, '2023-03-15 22:05:59', NULL),
	(101, 1, 'Salazar Lopez Julio Cesar', 0, '2023-03-15 22:05:59', NULL),
	(102, 1, 'Sauri Flamenco Duglas Alberto', 0, '2023-03-15 22:05:59', NULL),
	(103, 1, 'Solis Puc Alberto', 0, '2023-03-15 22:05:59', NULL),
	(104, 1, 'Sosa Gamboa Jesus Armando', 0, '2023-03-15 22:05:59', NULL),
	(105, 1, 'Torres Zapata Lucio', 0, '2023-03-15 22:05:59', NULL),
	(106, 1, 'Tun Chable Lazaro Manuel', 0, '2023-03-15 22:05:59', NULL),
	(107, 1, 'Tun Eb Jorge Atilano', 0, '2023-03-15 22:05:59', NULL),
	(108, 1, 'Tut Maldonado Joaquin Arturo', 0, '2023-03-15 22:05:59', NULL),
	(109, 1, 'Uitz Mena Rogelio Abelardo', 0, '2023-03-15 22:05:59', NULL),
	(110, 1, 'Varguez Contreras Ruben Homero', 0, '2023-03-15 22:05:59', NULL),
	(111, 1, 'Velazquez Puc Adrian Humberto', 0, '2023-03-15 22:05:59', NULL),
	(112, 1, 'Vera Pacheco Yudy Melchor De Jesus', 0, '2023-03-15 22:05:59', NULL),
	(113, 1, 'Cabrera Balam Ariel Ismael', 0, '2023-03-15 22:05:59', NULL),
	(114, 1, 'MuÃƒÂ±oz Polanco Luis Adrian', 0, '2023-03-15 22:05:59', NULL),
	(115, 1, 'Romero Velazquez Jose Asuncion', 0, '2023-03-15 22:05:59', NULL),
	(116, 1, 'Daniel Alejandro Couoh RamÃƒÂ­rez', 0, '2023-03-15 22:05:59', NULL),
	(117, 1, 'Romero Velazques Jose', 0, '2023-03-15 22:05:59', NULL),
	(118, 1, 'Couoh Ramirez Daniel Alejandro', 0, '2023-03-15 22:05:59', NULL),
	(119, 1, 'Herrera MagaÃƒÂ±a Leysler Antonio', 0, '2023-03-15 22:05:59', NULL),
	(120, 1, 'Hoil Manzanero Carlos Alejandro', 0, '2023-03-15 22:05:59', NULL),
	(121, 1, 'yan ek Antonio', 0, '2023-04-17 16:23:48', NULL),
	(122, 1, 'Ake huh Maximiliano', 0, '2023-04-17 16:27:27', NULL),
	(123, 1, 'Heredia Rubio Natanael Ulises', 0, '2023-04-17 16:57:35', NULL),
	(124, 1, 'Chan Sanchez Alexander', 0, '2023-04-18 06:18:35', NULL),
	(125, 1, 'Cruz Alcocer Laureano Humberto', 0, '2023-04-18 06:23:06', NULL),
	(126, 1, 'Solis Felix Marco David', 0, '2023-04-18 06:27:48', NULL),
	(127, 1, 'Yah Ek Ademar Antonio', 0, '2023-04-18 06:29:52', NULL),
	(128, 1, 'Wilberth manuel sanchez pech', 0, '2023-04-19 07:50:28', NULL),
	(129, 1, 'Juan Antonio Chi Hernandez', 3, '2023-05-03 15:49:20', NULL),
	(130, 1, 'Jesus enrique manzo tec', 0, '2023-05-11 14:42:02', NULL),
	(131, 1, 'Cordero gomez gonzalo', 0, '2023-05-19 14:37:39', NULL),
	(132, 1, 'Chin Hernandez Juan Antonio', 0, '2023-05-24 10:26:24', NULL),
	(133, 1, 'Dzul Puc Jorge', 0, '2023-05-27 14:37:38', NULL),
	(134, 1, 'JORGE  DZUL', 0, '2023-06-01 07:26:15', NULL),
	(135, 1, 'Campos herrera diego armando', 0, '2023-06-08 14:48:51', NULL),
	(136, 1, 'Manzo Tec Jesus Enrique', 0, '2023-06-17 11:26:58', NULL),
	(137, 1, 'Rojas Vidal Erik de Jesus', 0, '2023-06-29 14:47:10', NULL),
	(138, 1, 'Sulu mex alberto angel', 0, '2023-07-07 16:17:02', NULL),
	(139, 1, 'Solis flores jose luis', 0, '2023-07-10 15:35:22', NULL);

-- Volcando estructura para tabla ecolsur.recolectores
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

-- Volcando datos para la tabla ecolsur.recolectores: ~584 rows (aproximadamente)
INSERT INTO `recolectores` (`recolector_id`, `sucursal_id`, `recolector_nombre`, `estatus`, `created_at`, `updated_at`) VALUES
	(0, 0, 'Sin recolector', 0, '2023-03-15 22:05:59', NULL),
	(2, 1, 'Alducin Canche Jose Alberto', 3, '2023-03-15 22:05:59', NULL),
	(3, 1, 'Alonzo Euan Fabian Alberto', 3, '2023-03-15 22:05:59', NULL),
	(4, 1, 'Burgos Chan William Jose', 3, '2023-03-15 22:05:59', NULL),
	(5, 1, 'Cab Cauich William Humberto', 3, '2023-03-15 22:05:59', NULL),
	(6, 1, 'Cabrera May Hector Armando', 3, '2023-03-15 22:05:59', NULL),
	(7, 1, 'Canche Cauich Jose Eugenio', 3, '2023-03-15 22:05:59', NULL),
	(8, 1, 'Canul Colli Eduardo Israel', 3, '2023-03-15 22:05:59', NULL),
	(9, 1, 'Canul Mex Jose', 3, '2023-03-15 22:05:59', NULL),
	(10, 1, 'Carvajal Medina Jesus Fernando', 3, '2023-03-15 22:05:59', NULL),
	(11, 1, 'Castro Zapata Carlos Daniel', 0, '2023-03-15 22:05:59', NULL),
	(12, 1, 'Chale Chuc Guadalupe de Jesus', 0, '2023-03-15 22:05:59', NULL),
	(13, 1, 'Chan Coot Luis Fernando', 3, '2023-03-15 22:05:59', NULL),
	(14, 1, 'Chan Duarte Miguel Alejandro', 0, '2023-03-15 22:05:59', NULL),
	(15, 1, 'Chan Lopez Daniel Enrique', 3, '2023-03-15 22:05:59', NULL),
	(16, 1, 'Chan Novelo Reyes Baltazar', 3, '2023-03-15 22:05:59', NULL),
	(17, 1, 'Chan Sanchez Alexander', 0, '2023-03-15 22:05:59', NULL),
	(18, 1, 'Chim Baas Jose Armando', 3, '2023-03-15 22:05:59', NULL),
	(19, 1, 'Chuc Pacheco Edwin Ricardo', 3, '2023-03-15 22:05:59', NULL),
	(20, 1, 'Cob Castelan Juan Carlos', 0, '2023-03-15 22:05:59', NULL),
	(21, 1, 'Contreras Bacab Fernando Ivan', 3, '2023-03-15 22:05:59', NULL),
	(22, 1, 'Couoh Ramirez Javier Armando', 0, '2023-03-15 22:05:59', NULL),
	(23, 1, 'Cua Barrera Jose Armando Rene', 0, '2023-03-15 22:05:59', NULL),
	(24, 1, 'Diaz Cel Henry', 3, '2023-03-15 22:05:59', NULL),
	(25, 1, 'Diaz Landero Janer del Carmen', 0, '2023-03-15 22:05:59', NULL),
	(26, 1, 'Dzul Ayil Manuel', 3, '2023-03-15 22:05:59', NULL),
	(27, 1, 'Dzul Cauich David Alfredo', 3, '2023-03-15 22:05:59', NULL),
	(28, 1, 'Dzul Xul Gerardo Ismael', 3, '2023-03-15 22:05:59', NULL),
	(29, 1, 'Flores Dzul Jose Reynaldo', 3, '2023-03-15 22:05:59', NULL),
	(30, 1, 'Gallegos Andueza Jorge Antonio', 3, '2023-03-15 22:05:59', NULL),
	(31, 1, 'Geronimo Zapata Ricardo', 3, '2023-03-15 22:05:59', NULL),
	(32, 1, 'Gongora Dzul David Alberto', 3, '2023-03-15 22:05:59', NULL),
	(33, 1, 'Gongora Dzul Jose Cristino', 0, '2023-03-15 22:05:59', NULL),
	(34, 1, 'Gonzalez Ricardez Martin Eduardo', 3, '2023-03-15 22:05:59', NULL),
	(35, 1, 'Heredia Rubio Natanael Ulises', 0, '2023-03-15 22:05:59', NULL),
	(36, 1, 'Hernandez Pat Hirineo', 3, '2023-03-15 22:05:59', NULL),
	(37, 1, 'Herrera Moo Jorge Alberto', 3, '2023-03-15 22:05:59', NULL),
	(38, 1, 'Jimenez Chulin Javier Enrique', 0, '2023-03-15 22:05:59', NULL),
	(39, 1, 'Leon Bautista Manuel Asael', 3, '2023-03-15 22:05:59', NULL),
	(40, 1, 'Leon NuÃƒÂ±ez Lorenzo', 3, '2023-03-15 22:05:59', NULL),
	(41, 1, 'Linares Peralta Angel de Jesus', 3, '2023-03-15 22:05:59', NULL),
	(42, 1, 'Lopez Balam Humberto Moroni', 3, '2023-03-15 22:05:59', NULL),
	(43, 1, 'Lopez Canche Gabriel Mauricio', 3, '2023-03-15 22:05:59', NULL),
	(44, 1, 'Lopez Olmedo Oscar Israel', 0, '2023-03-15 22:05:59', NULL),
	(45, 1, 'Macias Canche Edwin Eduardo', 3, '2023-03-15 22:05:59', NULL),
	(46, 1, 'Maldonado Cauich Ramon Misael', 3, '2023-03-15 22:05:59', NULL),
	(47, 1, 'Martinez Dzul Jose Ricardo', 3, '2023-03-15 22:05:59', NULL),
	(48, 1, 'May Mena Cristian Uriel', 3, '2023-03-15 22:05:59', NULL),
	(49, 1, 'Moo Moo Cristian Alonso', 0, '2023-03-15 22:05:59', NULL),
	(50, 1, 'Moo Moo Erick Efrain', 3, '2023-03-15 22:05:59', NULL),
	(51, 1, 'Pacheco Maldonado Jose Martin', 3, '2023-03-15 22:05:59', NULL),
	(52, 1, 'Pool Fuentes Bryan Gabriel', 3, '2023-03-15 22:05:59', NULL),
	(53, 1, 'Pool Fuentes Diego Alexander', 0, '2023-03-15 22:05:59', NULL),
	(54, 1, 'Pool Nic Pedro Pablo', 0, '2023-03-15 22:05:59', NULL),
	(55, 1, 'Poot Cuytun Jose Juan Bernardo', 3, '2023-03-15 22:05:59', NULL),
	(56, 1, 'Puc Moo Fernando', 3, '2023-03-15 22:05:59', NULL),
	(57, 1, 'Puc Uc Evelio', 3, '2023-03-15 22:05:59', NULL),
	(58, 1, 'Ramos Sanchez Angel Gaspar', 3, '2023-03-15 22:05:59', NULL),
	(59, 1, 'Regil Garcia Manuel Antonio', 3, '2023-03-15 22:05:59', NULL),
	(60, 1, 'Reina Gamboa Geovanny de la Cruz', 3, '2023-03-15 22:05:59', NULL),
	(61, 1, 'Reyes Munoz Armando', 0, '2023-03-15 22:05:59', NULL),
	(62, 1, 'Reyes Pam Harverth Aldahir', 3, '2023-03-15 22:05:59', NULL),
	(63, 1, 'Rojas Vidal Erik de Jesus', 3, '2023-03-15 22:05:59', NULL),
	(64, 1, 'Rosado May Francisco Javier', 3, '2023-03-15 22:05:59', NULL),
	(65, 1, 'Ruz Yama Jose Martin', 3, '2023-03-15 22:05:59', NULL),
	(66, 1, 'Sanchez Pech Wilbert Manuel', 3, '2023-03-15 22:05:59', NULL),
	(67, 1, 'Santos Diaz Jorge Alejandro', 0, '2023-03-15 22:05:59', NULL),
	(68, 1, 'Segura Dzul Jose Antonio', 3, '2023-03-15 22:05:59', NULL),
	(69, 1, 'Solis Felix Jose Luis', 3, '2023-03-15 22:05:59', NULL),
	(70, 1, 'Solis Felix Marco David', 0, '2023-03-15 22:05:59', NULL),
	(71, 1, 'Suaste Yah Isaac Esteban', 3, '2023-03-15 22:05:59', NULL),
	(72, 1, 'Sulub Mex Felipe De Jesus', 3, '2023-03-15 22:05:59', NULL),
	(73, 1, 'Tun Baas Romeo', 3, '2023-03-15 22:05:59', NULL),
	(74, 1, 'Tut Maldonado Ramon Alejandro', 0, '2023-03-15 22:05:59', NULL),
	(75, 1, 'Tut Oxte Julio Cesar', 3, '2023-03-15 22:05:59', NULL),
	(76, 1, 'Tzab Yam Ariel Damian', 3, '2023-03-15 22:05:59', NULL),
	(77, 1, 'Tzuc Ayala Jesus Noe', 0, '2023-03-15 22:05:59', NULL),
	(78, 1, 'Uc Dzul Rosendo', 3, '2023-03-15 22:05:59', NULL),
	(79, 1, 'Ucan Maldonado Jesus Efrain', 0, '2023-03-15 22:05:59', NULL),
	(80, 1, 'Valcarcel Lopez Jose Roberto', 0, '2023-03-15 22:05:59', NULL),
	(81, 1, 'Vazquez Martinez Osvaldo', 3, '2023-03-15 22:05:59', NULL),
	(82, 1, 'Vazquez Martinez Patrobich', 3, '2023-03-15 22:05:59', NULL),
	(83, 1, 'Xeque Xix Santos Angel', 3, '2023-03-15 22:05:59', NULL),
	(84, 1, 'Yam Gonzalez Jose Hernan Victorio', 0, '2023-03-15 22:05:59', NULL),
	(85, 1, 'Sin Recolector', 0, '2023-03-15 22:05:59', NULL),
	(86, 1, 'Andrade Puc Luis Manuel', 3, '2023-03-15 22:05:59', NULL),
	(87, 1, 'Toledano Cab Ernesto Alonso', 0, '2023-03-15 22:05:59', NULL),
	(88, 1, 'Hernandez Puga Jorge Luis', 0, '2023-03-15 22:05:59', NULL),
	(89, 1, 'Ucan Puch Eduwin Alberto', 0, '2023-03-15 22:05:59', NULL),
	(90, 1, 'Dzul Chable Antonio Alberto', 0, '2023-03-15 22:05:59', NULL),
	(91, 1, 'Solis Puc Aureliano', 3, '2023-03-15 22:05:59', NULL),
	(92, 1, 'chan chan julio cesar', 0, '2023-03-15 22:05:59', NULL),
	(93, 1, 'carrillo poot juan jose', 0, '2023-03-15 22:05:59', NULL),
	(94, 1, 'Euan Can Eusebio', 0, '2023-03-15 22:05:59', NULL),
	(95, 1, 'Flores Arias Jesus Aaron', 3, '2023-03-15 22:05:59', NULL),
	(96, 1, 'May Gonzalez Sergio Alonso', 3, '2023-03-15 22:05:59', NULL),
	(97, 1, 'Borges Ek Jose Severo', 0, '2023-03-15 22:05:59', NULL),
	(98, 1, 'Linares Estrella Edwin Alexander', 3, '2023-03-15 22:05:59', NULL),
	(99, 1, 'Canche Ek Esteban Ernesto', 3, '2023-03-15 22:05:59', NULL),
	(100, 1, 'Dzul Dzul Juan David', 3, '2023-03-15 22:05:59', NULL),
	(101, 1, 'Salazar Che Kenny Ibrahin', 0, '2023-03-15 22:05:59', NULL),
	(102, 1, 'Sonda Huh Juan Francisco Javier', 3, '2023-03-15 22:05:59', NULL),
	(103, 1, 'Cetz Uc Fernando Jesus', 0, '2023-03-15 22:05:59', NULL),
	(104, 1, 'vazquez garrido jahir abimael', 3, '2023-03-15 22:05:59', NULL),
	(105, 1, 'Navarro Arcila Vincent Jose', 0, '2023-03-15 22:05:59', NULL),
	(106, 1, 'Che Ortiz Arturo', 3, '2023-03-15 22:05:59', NULL),
	(107, 1, 'Velasco Gomez Juan Pablo', 3, '2023-03-15 22:05:59', NULL),
	(108, 1, 'Pech Tzel Moises Israel', 0, '2023-03-15 22:05:59', NULL),
	(109, 1, 'Salazar Che Magdiel Alexander', 3, '2023-03-15 22:05:59', NULL),
	(110, 1, 'Linares Estrella Edwin Alexander', 3, '2023-03-15 22:05:59', NULL),
	(111, 1, 'Gongora Puch Jesus Manuel', 3, '2023-03-15 22:05:59', NULL),
	(112, 1, 'Sulu Mex Daniel de Ã‚Â Jesus', 3, '2023-03-15 22:05:59', NULL),
	(113, 1, 'Leon Santiago Uziel Gerevay', 3, '2023-03-15 22:05:59', NULL),
	(114, 1, 'Canul Solis Marcos Jesus', 0, '2023-03-15 22:05:59', NULL),
	(115, 1, 'Chi Perez Jose Eduardo', 3, '2023-03-15 22:05:59', NULL),
	(116, 1, 'Puc Centeno Jose Cecilio', 0, '2023-03-15 22:05:59', NULL),
	(117, 1, 'Aguilar Tzuc Jairo Antonio', 3, '2023-03-15 22:05:59', NULL),
	(118, 1, 'Euan Gonzalez Carlos Antonio', 0, '2023-03-15 22:05:59', NULL),
	(119, 1, 'Perera Hernandez Jose Luis', 3, '2023-03-15 22:05:59', NULL),
	(120, 1, 'Salazar Che Julio Gamaliel', 3, '2023-03-15 22:05:59', NULL),
	(121, 1, 'Itza Chan Gerardo Manuel', 0, '2023-03-15 22:05:59', NULL),
	(122, 1, 'Yah Ek Ademar Antonio', 0, '2023-03-15 22:05:59', NULL),
	(123, 1, 'Rivero Hernandez Henrry Santiago', 3, '2023-03-15 22:05:59', NULL),
	(124, 1, 'LEON SUAREZ SAMUEL ABELARDO', 3, '2023-03-15 22:05:59', NULL),
	(125, 1, 'Blanco Mena Ramon Ricardo', 3, '2023-03-15 22:05:59', NULL),
	(126, 1, 'Dorantes Santiago Alan Antonio', 3, '2023-03-15 22:05:59', NULL),
	(127, 1, 'Moo Cen Gabriel Jesus', 0, '2023-03-15 22:05:59', NULL),
	(128, 1, 'gomez garrido daniel alejandro', 0, '2023-03-15 22:05:59', NULL),
	(129, 1, 'pool fuentes bryan gabriel', 3, '2023-03-15 22:05:59', NULL),
	(130, 1, 'gonzalez cruz juan jose', 0, '2023-03-15 22:05:59', NULL),
	(131, 1, 'Cauich Chi Bryan de Jesus', 3, '2023-03-15 22:05:59', NULL),
	(132, 1, 'Gongora Tzun Ricardo Antonio', 3, '2023-03-15 22:05:59', NULL),
	(133, 1, 'Xul Dzul Jose Rodolfo', 3, '2023-03-15 22:05:59', NULL),
	(134, 1, 'Romero Pacheco Juan Daniel', 0, '2023-03-15 22:05:59', NULL),
	(135, 1, 'Canto Conrado Andy Erubey', 0, '2023-03-15 22:05:59', NULL),
	(136, 1, 'Dzul Cauich Mario Andres', 3, '2023-03-15 22:05:59', NULL),
	(137, 1, 'Garcia Mex Geovanny Alberto', 0, '2023-03-15 22:05:59', NULL),
	(138, 1, 'Cetz Poot Julio Isaias', 0, '2023-03-15 22:05:59', NULL),
	(139, 1, 'Cegovia Huchin Manuel Amilcar', 3, '2023-03-15 22:05:59', NULL),
	(140, 1, 'Valdez Banos Manuel Andres', 0, '2023-03-15 22:05:59', NULL),
	(141, 1, 'Lopez Hoil Valentin del Angel', 3, '2023-03-15 22:05:59', NULL),
	(142, 1, 'Martinez Jimenez Aibelio', 3, '2023-03-15 22:05:59', NULL),
	(143, 1, 'Cauich Cante Jonathan Geovany', 0, '2023-03-15 22:05:59', NULL),
	(144, 1, 'May Mena Cristian Uriel', 3, '2023-03-15 22:05:59', NULL),
	(145, 1, 'Uicab Santos Aaron David', 0, '2023-03-15 22:05:59', NULL),
	(146, 1, 'Gonzalez Tutzin Etzer Aaron', 3, '2023-03-15 22:05:59', NULL),
	(147, 1, 'Manzano Ravell Jesus Martin', 0, '2023-03-15 22:05:59', NULL),
	(148, 1, 'Pech Reyes Jose de Jesus', 0, '2023-03-15 22:05:59', NULL),
	(149, 1, 'Chuc Uc Isaac Jonhatan', 3, '2023-03-15 22:05:59', NULL),
	(150, 1, 'Garma Barrera Armando Rene', 3, '2023-03-15 22:05:59', NULL),
	(151, 1, 'Guerrero Tristan Pedro Alfonso', 0, '2023-03-15 22:05:59', NULL),
	(152, 1, 'Reyes Pam Herverth Aldahir', 0, '2023-03-15 22:05:59', NULL),
	(153, 1, 'Caballero Sanchez Roman Alberto', 3, '2023-03-15 22:05:59', NULL),
	(154, 1, 'Colli Chan Fredy Saul', 3, '2023-03-15 22:05:59', NULL),
	(155, 1, 'Canche Ek Marcelino', 3, '2023-03-15 22:05:59', NULL),
	(156, 1, 'Arcos Arias Jesus del Rosario', 3, '2023-03-15 22:05:59', NULL),
	(157, 1, 'Uc Chi Edwin Alejandro', 0, '2023-03-15 22:05:59', NULL),
	(158, 1, 'Moo Ayil Jose Dolores', 3, '2023-03-15 22:05:59', NULL),
	(159, 1, 'Solis Flores Jose Luis', 3, '2023-03-15 22:05:59', NULL),
	(160, 1, 'Bermon Tzuc Victor Javier', 3, '2023-03-15 22:05:59', NULL),
	(161, 1, 'Lopez Olmedo Oscar Israel', 0, '2023-03-15 22:05:59', NULL),
	(162, 1, 'Herrera Kuh Juan Pablo', 3, '2023-03-15 22:05:59', NULL),
	(163, 1, 'Ayil Euan Aaron Gregory', 0, '2023-03-15 22:05:59', NULL),
	(164, 1, 'Casanova Velazquez Ramon', 0, '2023-03-15 22:05:59', NULL),
	(165, 1, 'Mendoza Romero Pablo Armando', 0, '2023-03-15 22:05:59', NULL),
	(166, 1, 'Yam Pech Jose Armando', 3, '2023-03-15 22:05:59', NULL),
	(167, 1, 'May Cauich Noe Moises', 0, '2023-03-15 22:05:59', NULL),
	(168, 1, 'Andrade Puc Luis Manuel', 0, '2023-03-15 22:05:59', NULL),
	(169, 1, 'Cauich Martin Jorge Humberto', 0, '2023-03-15 22:05:59', NULL),
	(170, 1, 'Chan Chan Julio Cesar', 0, '2023-03-15 22:05:59', NULL),
	(171, 1, 'Flores Gongora Pedro Ricardo', 0, '2023-03-15 22:05:59', NULL),
	(172, 1, 'Hoil Alejos Alberto de Jesus', 3, '2023-03-15 22:05:59', NULL),
	(173, 1, 'Martinez Pech Francisco Ivan', 3, '2023-03-15 22:05:59', NULL),
	(174, 1, 'Farfan Chulin Manuel Jesus', 0, '2023-03-15 22:05:59', NULL),
	(175, 1, 'Chuc Yam Jose Guadalupe', 0, '2023-03-15 22:05:59', NULL),
	(176, 1, 'Zaldivar Najera Miguel Alejandro', 3, '2023-03-15 22:05:59', NULL),
	(177, 1, 'Aguilar Jimenez Ermilo', 0, '2023-03-15 22:05:59', NULL),
	(178, 1, 'Chan Coot Santos Francisco', 3, '2023-03-15 22:05:59', NULL),
	(179, 1, 'Chavez Ortiz Jafet Antonio', 0, '2023-03-15 22:05:59', NULL),
	(180, 1, 'May Gonzalez Sergio Alonso', 3, '2023-03-15 22:05:59', NULL),
	(181, 1, 'Briceno Medina Jose Ruben', 0, '2023-03-15 22:05:59', NULL),
	(182, 1, 'Ek Lopez Jose Alfredo', 0, '2023-03-15 22:05:59', NULL),
	(183, 1, 'Mendez Martinez Fernando Javier', 0, '2023-03-15 22:05:59', NULL),
	(184, 1, 'Us Perez Daniel', 0, '2023-03-15 22:05:59', NULL),
	(185, 1, 'Acosta Uc Jorge Andres', 0, '2023-03-15 22:05:59', NULL),
	(186, 1, 'Aguilar Tzuc Jairo Antonio', 3, '2023-03-15 22:05:59', NULL),
	(187, 1, 'Ake Huh Maximiliano', 0, '2023-03-15 22:05:59', NULL),
	(188, 1, 'Alducin Canche Jose Alberto', 3, '2023-03-15 22:05:59', NULL),
	(189, 1, 'Alonzo Euan Fabian Alberto', 3, '2023-03-15 22:05:59', NULL),
	(190, 1, 'Arcos Arias Jesus del Rosario', 3, '2023-03-15 22:05:59', NULL),
	(191, 1, 'Bermon Tzuc Victor Javier', 3, '2023-03-15 22:05:59', NULL),
	(192, 1, 'Blanco Mena Ramon Ricardo', 3, '2023-03-15 22:05:59', NULL),
	(193, 1, 'Borges Ek Jose Severo', 0, '2023-03-15 22:05:59', NULL),
	(194, 1, 'BriceÃƒÂ±o Medina Jose Ruben', 0, '2023-03-15 22:05:59', NULL),
	(195, 1, 'Burgos Chan William Jose', 3, '2023-03-15 22:05:59', NULL),
	(196, 1, 'Cab Cauich William Humberto', 3, '2023-03-15 22:05:59', NULL),
	(197, 1, 'Caballero Sanchez Roman Alberto', 3, '2023-03-15 22:05:59', NULL),
	(198, 1, 'Cabrera May Hector Armando', 3, '2023-03-15 22:05:59', NULL),
	(199, 1, 'Cabrera Palma Julian de Jesus', 0, '2023-03-15 22:05:59', NULL),
	(200, 1, 'Canche Cauich Jose Eugenio', 3, '2023-03-15 22:05:59', NULL),
	(201, 1, 'Canche Ek Esteban Ernesto', 3, '2023-03-15 22:05:59', NULL),
	(202, 1, 'Canche Ek Marcelino', 3, '2023-03-15 22:05:59', NULL),
	(203, 1, 'Canul Colli Eduardo Israel', 3, '2023-03-15 22:05:59', NULL),
	(204, 1, 'Canul Colli Josue Elias', 3, '2023-03-15 22:05:59', NULL),
	(205, 1, 'Canul Mex Jose', 3, '2023-03-15 22:05:59', NULL),
	(206, 1, 'Carrillo Poot Juan Jose', 0, '2023-03-15 22:05:59', NULL),
	(207, 1, 'Carvajal Medina Jesus Fernando', 3, '2023-03-15 22:05:59', NULL),
	(208, 1, 'Casanova Herrera Guillermo Ricardo', 0, '2023-03-15 22:05:59', NULL),
	(209, 1, 'Castro Zapata Carlos Daniel', 0, '2023-03-15 22:05:59', NULL),
	(210, 1, 'Cauich Arce Luis Alberto', 3, '2023-03-15 22:05:59', NULL),
	(211, 1, 'Cauich Cante Jhonathan Geovany', 3, '2023-03-15 22:05:59', NULL),
	(212, 1, 'Cauich Chi Bryan de Jesus', 3, '2023-03-15 22:05:59', NULL),
	(213, 1, 'Cauich Martin Jorge Humberto', 0, '2023-03-15 22:05:59', NULL),
	(214, 1, 'Cegovia Huchin Manuel Amilcar', 3, '2023-03-15 22:05:59', NULL),
	(215, 1, 'Cetz Poot Julio Isaias', 0, '2023-03-15 22:05:59', NULL),
	(216, 1, 'Chan Chan Julio Cesar', 0, '2023-03-15 22:05:59', NULL),
	(217, 1, 'Chan Coot Luis Fernando', 3, '2023-03-15 22:05:59', NULL),
	(218, 1, 'Chan Coot Santos Francisco', 3, '2023-03-15 22:05:59', NULL),
	(219, 1, 'Chan Duarte Miguel Alejandro', 0, '2023-03-15 22:05:59', NULL),
	(220, 1, 'Chan Lopez Daniel Enrique', 3, '2023-03-15 22:05:59', NULL),
	(221, 1, 'Chan Novelo Reyes Baltazar', 3, '2023-03-15 22:05:59', NULL),
	(222, 1, 'Chan Sanchez Alexander', 0, '2023-03-15 22:05:59', NULL),
	(223, 1, 'Che Ortiz Arturo', 3, '2023-03-15 22:05:59', NULL),
	(224, 1, 'Chi Perez Jose Eduardo', 3, '2023-03-15 22:05:59', NULL),
	(225, 1, 'Chim Baas Jose Armando', 3, '2023-03-15 22:05:59', NULL),
	(226, 1, 'Chuc Pacheco Edwin Ricardo', 3, '2023-03-15 22:05:59', NULL),
	(227, 1, 'Chuc Uc Isaac Jonhatan', 3, '2023-03-15 22:05:59', NULL),
	(228, 1, 'Chuc Yam Jose Guadalupe', 0, '2023-03-15 22:05:59', NULL),
	(229, 1, 'Colli Chan Fredy Saul', 3, '2023-03-15 22:05:59', NULL),
	(230, 1, 'Contreras Bacab Fernando Ivan', 3, '2023-03-15 22:05:59', NULL),
	(231, 1, 'Cua Barrera Jose Armando Rene', 0, '2023-03-15 22:05:59', NULL),
	(232, 1, 'Diaz Cel Henry', 3, '2023-03-15 22:05:59', NULL),
	(233, 1, 'Diaz Landero Janer del Carmen', 0, '2023-03-15 22:05:59', NULL),
	(234, 1, 'Dorantes Santiago Alan Antonio', 3, '2023-03-15 22:05:59', NULL),
	(235, 1, 'Dzul Ayil Manuel', 3, '2023-03-15 22:05:59', NULL),
	(236, 1, 'Dzul Cauich David Alfredo', 3, '2023-03-15 22:05:59', NULL),
	(237, 1, 'Dzul Cauich Mario Andres', 3, '2023-03-15 22:05:59', NULL),
	(238, 1, 'Dzul Dzul Juan David', 3, '2023-03-15 22:05:59', NULL),
	(239, 1, 'Dzul Martin Carlos Enrique', 0, '2023-03-15 22:05:59', NULL),
	(240, 1, 'Dzul Xul Gerardo Ismael', 3, '2023-03-15 22:05:59', NULL),
	(241, 1, 'Ek Lopez Jose Alfredo', 0, '2023-03-15 22:05:59', NULL),
	(242, 1, 'Euan Can Eusebio Fabian', 3, '2023-03-15 22:05:59', NULL),
	(243, 1, 'Flores Arias Jesus Aaron', 3, '2023-03-15 22:05:59', NULL),
	(244, 1, 'Flores Dzul Jose Reynaldo', 3, '2023-03-15 22:05:59', NULL),
	(245, 1, 'Flores Gongora Pedro Ricardo', 0, '2023-03-15 22:05:59', NULL),
	(246, 1, 'Gallegos Andueza Jorge Antonio', 3, '2023-03-15 22:05:59', NULL),
	(247, 1, 'Garma Barrera Armando Rene', 3, '2023-03-15 22:05:59', NULL),
	(248, 1, 'Geronimo Zapata Ricardo', 3, '2023-03-15 22:05:59', NULL),
	(249, 1, 'Gomez Garrido Daniel Alejandro', 0, '2023-03-15 22:05:59', NULL),
	(250, 1, 'Gongora Dzul David Alberto', 3, '2023-03-15 22:05:59', NULL),
	(251, 1, 'Gongora Dzul Jose Cristino', 0, '2023-03-15 22:05:59', NULL),
	(252, 1, 'Gongora Puch Jesus Manuel', 0, '2023-03-15 22:05:59', NULL),
	(253, 1, 'Gongora Tzun Ricardo Antonio', 3, '2023-03-15 22:05:59', NULL),
	(254, 1, 'Gonzalez Cruz Juan Jose', 0, '2023-03-15 22:05:59', NULL),
	(255, 1, 'Gonzalez Ricardez Martin Eduardo', 3, '2023-03-15 22:05:59', NULL),
	(256, 1, 'Gonzalez Tutzin Etzer Aaron', 3, '2023-03-15 22:05:59', NULL),
	(257, 1, 'Hernandez Pat Hirineo', 0, '2023-03-15 22:05:59', NULL),
	(258, 1, 'Herrera Kuh Juan Pablo', 0, '2023-03-15 22:05:59', NULL),
	(259, 1, 'Herrera Moo Jorge Alberto', 3, '2023-03-15 22:05:59', NULL),
	(260, 1, 'Hoil Alejos Alberto de Jesus', 3, '2023-03-15 22:05:59', NULL),
	(261, 1, 'Itza Chan Gerardo Manuel', 0, '2023-03-15 22:05:59', NULL),
	(262, 1, 'Ku Santamaria Rodolfo Jhordy', 3, '2023-03-15 22:05:59', NULL),
	(263, 1, 'Leon Bautista Manuel Asael', 3, '2023-03-15 22:05:59', NULL),
	(264, 1, 'Leon NuÃƒÂ±ez Lorenzo', 3, '2023-03-15 22:05:59', NULL),
	(265, 1, 'Leon Santiago Uziel Gerevay', 3, '2023-03-15 22:05:59', NULL),
	(266, 1, 'Leon Suarez Samuel Abelardo', 3, '2023-03-15 22:05:59', NULL),
	(267, 1, 'Linares Estrella Edwin Alexander', 3, '2023-03-15 22:05:59', NULL),
	(268, 1, 'Linares Peralta Angel de Jesus', 3, '2023-03-15 22:05:59', NULL),
	(269, 1, 'Lopez Balam Humberto Moroni', 3, '2023-03-15 22:05:59', NULL),
	(270, 1, 'Lopez Canche Gabriel Mauricio', 3, '2023-03-15 22:05:59', NULL),
	(271, 1, 'Lopez Hoil Valentin del Angel', 3, '2023-03-15 22:05:59', NULL),
	(272, 1, 'Lopez Olmedo Oscar Israel', 0, '2023-03-15 22:05:59', NULL),
	(273, 1, 'Macias Canche Edwin Eduardo', 0, '2023-03-15 22:05:59', NULL),
	(274, 1, 'Maldonado Cauich Ramon Misael', 3, '2023-03-15 22:05:59', NULL),
	(275, 1, 'Manzano Ravell Jesus Martin', 0, '2023-03-15 22:05:59', NULL),
	(276, 1, 'Martinez Dzul Jose Ricardo', 0, '2023-03-15 22:05:59', NULL),
	(277, 1, 'Martinez Jimenez Aibelio', 3, '2023-03-15 22:05:59', NULL),
	(278, 1, 'Martinez Pech Francisco Ivan', 3, '2023-03-15 22:05:59', NULL),
	(279, 1, 'May Cauich Noe Moises', 0, '2023-03-15 22:05:59', NULL),
	(280, 1, 'May Gonzalez Sergio Alonso', 3, '2023-03-15 22:05:59', NULL),
	(281, 1, 'May Mena Cristian Uriel', 3, '2023-03-15 22:05:59', NULL),
	(282, 1, 'Molina Euan Ivan Enrique', 3, '2023-03-15 22:05:59', NULL),
	(283, 1, 'Moo Ayil Jose Dolores', 3, '2023-03-15 22:05:59', NULL),
	(284, 1, 'Moo Moo Erick Efrain', 3, '2023-03-15 22:05:59', NULL),
	(285, 1, 'Navarro Arcila Vincent Jose', 0, '2023-03-15 22:05:59', NULL),
	(286, 1, 'Pacheco Maldonado Jose Martin', 3, '2023-03-15 22:05:59', NULL),
	(287, 1, 'Pech Reyes Jose de Jesus', 0, '2023-03-15 22:05:59', NULL),
	(288, 1, 'Perera Hernandez Jose Luis', 3, '2023-03-15 22:05:59', NULL),
	(289, 1, 'Pool Fuentes Bryan Gabriel', 3, '2023-03-15 22:05:59', NULL),
	(290, 1, 'Pool Fuentes Diego Alexander', 0, '2023-03-15 22:05:59', NULL),
	(291, 1, 'Pool Nic Pedro Pablo', 0, '2023-03-15 22:05:59', NULL),
	(292, 1, 'Poot Cuytun Jose Juan Bernardo', 3, '2023-03-15 22:05:59', NULL),
	(293, 1, 'Puc Centeno Jose Cecilio', 0, '2023-03-15 22:05:59', NULL),
	(294, 1, 'Puc Koyoc Marco Xavier', 0, '2023-03-15 22:05:59', NULL),
	(295, 1, 'Puc Moo Fernando', 0, '2023-03-15 22:05:59', NULL),
	(296, 1, 'Puc Uc Evelio', 3, '2023-03-15 22:05:59', NULL),
	(297, 1, 'Ramos Sanchez Angel Gaspar', 3, '2023-03-15 22:05:59', NULL),
	(298, 1, 'Regil Garcia Manuel Antonio', 3, '2023-03-15 22:05:59', NULL),
	(299, 1, 'Reina Gamboa Geovanny de la Cruz', 3, '2023-03-15 22:05:59', NULL),
	(300, 1, 'Reyes MuÃƒÂ±oz Armando', 3, '2023-03-15 22:05:59', NULL),
	(301, 1, 'Reyes Pam Harverth Aldahir', 3, '2023-03-15 22:05:59', NULL),
	(302, 1, 'Rivero Hernandez Henrry Santiago', 3, '2023-03-15 22:05:59', NULL),
	(303, 1, 'Rojas Vidal Erik de Jesus', 3, '2023-03-15 22:05:59', NULL),
	(304, 1, 'Romero Pacheco Juan Daniel', 0, '2023-03-15 22:05:59', NULL),
	(305, 1, 'Rosado May Francisco Javier', 3, '2023-03-15 22:05:59', NULL),
	(306, 1, 'Ruz Yama Jose Martin', 3, '2023-03-15 22:05:59', NULL),
	(307, 1, 'Salazar Che Julio Gamaliel', 3, '2023-03-15 22:05:59', NULL),
	(308, 1, 'Salazar Che Magdiel Alexander', 3, '2023-03-15 22:05:59', NULL),
	(309, 1, 'Sanchez Pech Wilbert Manuel', 3, '2023-03-15 22:05:59', NULL),
	(310, 1, 'Segura Dzul Jose Antonio', 3, '2023-03-15 22:05:59', NULL),
	(311, 1, 'Solis Felix Jose Luis', 3, '2023-03-15 22:05:59', NULL),
	(312, 1, 'Solis Felix Marco David', 0, '2023-03-15 22:05:59', NULL),
	(313, 1, 'Solis Flores Jose Luis', 3, '2023-03-15 22:05:59', NULL),
	(314, 1, 'Sonda Huh Juan Francisco Javier', 3, '2023-03-15 22:05:59', NULL),
	(315, 1, 'Suaste Yah Isaac Esteban', 3, '2023-03-15 22:05:59', NULL),
	(316, 1, 'Sulu Mex Alberto Angel', 3, '2023-03-15 22:05:59', NULL),
	(317, 1, 'Sulu Mex Daniel de Jesus', 3, '2023-03-15 22:05:59', NULL),
	(318, 1, 'Sulub Mex Felipe De Jesus', 3, '2023-03-15 22:05:59', NULL),
	(319, 1, 'Tun Baas Romeo', 3, '2023-03-15 22:05:59', NULL),
	(320, 1, 'Tut Oxte Julio Cesar', 3, '2023-03-15 22:05:59', NULL),
	(321, 1, 'Tzab Yam Ariel Damian', 3, '2023-03-15 22:05:59', NULL),
	(322, 1, 'Tzuc Ayala Jesus Noe', 0, '2023-03-15 22:05:59', NULL),
	(323, 1, 'Uc Dzul Rosendo', 3, '2023-03-15 22:05:59', NULL),
	(324, 1, 'Tzab Yam Ariel Damian', 3, '2023-03-15 22:05:59', NULL),
	(325, 1, 'Uh Chi Edwin Alejandro', 3, '2023-03-15 22:05:59', NULL),
	(326, 1, 'Uicab Santos Aaron David', 0, '2023-03-15 22:05:59', NULL),
	(327, 1, 'Us Perez Daniel', 0, '2023-03-15 22:05:59', NULL),
	(328, 1, 'Valdez BaÃƒÂ±os Manuel Andres', 3, '2023-03-15 22:05:59', NULL),
	(329, 1, 'Valencia Cauich Guillermo Valentin', 0, '2023-03-15 22:05:59', NULL),
	(330, 1, 'Vazquez Garrido Jahir Abimael', 3, '2023-03-15 22:05:59', NULL),
	(331, 1, 'Vazquez Martinez Osvaldo', 3, '2023-03-15 22:05:59', NULL),
	(332, 1, 'Vazquez Martinez Patrobich', 3, '2023-03-15 22:05:59', NULL),
	(333, 1, 'Vela Dominguez Walter Joaquin', 3, '2023-03-15 22:05:59', NULL),
	(334, 1, 'Velasco Gomez Juan Pablo', 3, '2023-03-15 22:05:59', NULL),
	(335, 1, 'Xeque Xix Santos Angel', 3, '2023-03-15 22:05:59', NULL),
	(336, 1, 'Xul Dzul Jose Rodolfo', 3, '2023-03-15 22:05:59', NULL),
	(337, 1, 'Yah Ek Ademar Antonio', 0, '2023-03-15 22:05:59', NULL),
	(338, 1, 'Yah Haas Cristhoper Alexis', 0, '2023-03-15 22:05:59', NULL),
	(339, 1, 'Yam Gonzalez Jose Hernan Victorio', 0, '2023-03-15 22:05:59', NULL),
	(340, 1, 'Yam Pech Armando Jose', 3, '2023-03-15 22:05:59', NULL),
	(341, 1, 'Zaldivar Najera Miguel Alejandro', 3, '2023-03-15 22:05:59', NULL),
	(342, 1, 'sanchez coba fernando david.', 0, '2023-03-15 22:05:59', NULL),
	(343, 1, 'Zaldivar Najera Miguel Alejandro', 3, '2023-03-15 22:05:59', NULL),
	(344, 1, 'Acosta Uc Jorge Andres', 0, '2023-03-15 22:05:59', NULL),
	(345, 1, 'Aguilar Tzuc Jairo Antonio', 0, '2023-03-15 22:05:59', NULL),
	(346, 1, 'Ake Huh Maximiliano', 0, '2023-03-15 22:05:59', NULL),
	(347, 1, 'Alducin Canche Jose Alberto', 0, '2023-03-15 22:05:59', NULL),
	(348, 1, 'Alonzo Euan Fabian Alberto', 0, '2023-03-15 22:05:59', NULL),
	(349, 1, 'Arcos Arias Jesus del Rosario', 3, '2023-03-15 22:05:59', NULL),
	(350, 1, 'Bermon Tzuc Victor Javier', 0, '2023-03-15 22:05:59', NULL),
	(351, 1, 'Blanco Mena Ramon Ricardo', 0, '2023-03-15 22:05:59', NULL),
	(352, 1, 'Borges Ek Jose Severo', 0, '2023-03-15 22:05:59', NULL),
	(353, 1, 'BriceÃƒÂ±o Medina Jose Ruben', 0, '2023-03-15 22:05:59', NULL),
	(354, 1, 'Burgos Chan William Jose', 0, '2023-03-15 22:05:59', NULL),
	(355, 1, 'Cab Cauich William Humberto', 0, '2023-03-15 22:05:59', NULL),
	(356, 1, 'Caballero Sanchez Roman Alberto', 0, '2023-03-15 22:05:59', NULL),
	(357, 1, 'Cabrera May Hector Armando', 0, '2023-03-15 22:05:59', NULL),
	(358, 1, 'Cabrera Palma Julian de Jesus', 0, '2023-03-15 22:05:59', NULL),
	(359, 1, 'Canche Cauich Jose Eugenio', 0, '2023-03-15 22:05:59', NULL),
	(360, 1, 'Canche Ek Esteban Ernesto', 0, '2023-03-15 22:05:59', NULL),
	(361, 1, 'Canche Ek Marcelino', 0, '2023-03-15 22:05:59', NULL),
	(362, 1, 'Canul Colli Eduardo Israel', 0, '2023-03-15 22:05:59', NULL),
	(363, 1, 'Canul Colli Josue Elias', 3, '2023-03-15 22:05:59', NULL),
	(364, 1, 'Canul Mex Jose', 0, '2023-03-15 22:05:59', NULL),
	(365, 1, 'Carrillo Poot Juan Jose', 0, '2023-03-15 22:05:59', NULL),
	(366, 1, 'Carvajal Medina Jesus Fernando', 0, '2023-03-15 22:05:59', NULL),
	(367, 1, 'Casanova Herrera Guillermo Ricardo', 0, '2023-03-15 22:05:59', NULL),
	(368, 1, 'Castro Zapata Carlos Daniel', 0, '2023-03-15 22:05:59', NULL),
	(369, 1, 'Cauich Arce Luis Alberto', 3, '2023-03-15 22:05:59', NULL),
	(370, 1, 'Cauich Cante Jhonathan Geovany', 3, '2023-03-15 22:05:59', NULL),
	(371, 1, 'Cauich Chi Bryan de Jesus', 0, '2023-03-15 22:05:59', NULL),
	(372, 1, 'Cauich Martin Jorge Humberto', 0, '2023-03-15 22:05:59', NULL),
	(373, 1, 'Cegovia Huchin Manuel Amilcar', 0, '2023-03-15 22:05:59', NULL),
	(374, 1, 'Cetz Poot Julio Isaias', 0, '2023-03-15 22:05:59', NULL),
	(375, 1, 'Chan Chan Julio Cesar', 0, '2023-03-15 22:05:59', NULL),
	(376, 1, 'Chan Coot Luis Fernando', 0, '2023-03-15 22:05:59', NULL),
	(377, 1, 'Chan Coot Santos Francisco', 0, '2023-03-15 22:05:59', NULL),
	(378, 1, 'Chan Duarte Miguel Alejandro', 0, '2023-03-15 22:05:59', NULL),
	(379, 1, 'Chan Lopez Daniel Enrique', 0, '2023-03-15 22:05:59', NULL),
	(380, 1, 'Chan Novelo Reyes Baltazar', 0, '2023-03-15 22:05:59', NULL),
	(381, 1, 'Chan Sanchez Alexander', 0, '2023-03-15 22:05:59', NULL),
	(382, 1, 'Che Ortiz Arturo', 0, '2023-03-15 22:05:59', NULL),
	(383, 1, 'Chi Perez Jose Eduardo', 0, '2023-03-15 22:05:59', NULL),
	(384, 1, 'Chim Baas Jose Armando', 0, '2023-03-15 22:05:59', NULL),
	(385, 1, 'Chuc Pacheco Edwin Ricardo', 0, '2023-03-15 22:05:59', NULL),
	(386, 1, 'Chuc Uc Isaac Jonhatan', 0, '2023-03-15 22:05:59', NULL),
	(387, 1, 'Chuc Yam Jose Guadalupe', 0, '2023-03-15 22:05:59', NULL),
	(388, 1, 'Colli Chan Fredy Saul', 0, '2023-03-15 22:05:59', NULL),
	(389, 1, 'Contreras Bacab Fernando Ivan', 0, '2023-03-15 22:05:59', NULL),
	(390, 1, 'Cua Barrera Jose Armando Rene', 0, '2023-03-15 22:05:59', NULL),
	(391, 1, 'Diaz Cel Henry', 0, '2023-03-15 22:05:59', NULL),
	(392, 1, 'Diaz Landero Janer del Carmen', 0, '2023-03-15 22:05:59', NULL),
	(393, 1, 'Dorantes Santiago Alan Antonio', 0, '2023-03-15 22:05:59', NULL),
	(394, 1, 'Dzul Ayil Manuel', 0, '2023-03-15 22:05:59', NULL),
	(395, 1, 'Dzul Cauich David Alfredo', 0, '2023-03-15 22:05:59', NULL),
	(396, 1, 'Dzul Cauich Mario Andres', 0, '2023-03-15 22:05:59', NULL),
	(397, 1, 'Dzul Dzul Juan David', 0, '2023-03-15 22:05:59', NULL),
	(398, 1, 'Dzul Martin Carlos Enrique', 0, '2023-03-15 22:05:59', NULL),
	(399, 1, 'Dzul Xul Gerardo Ismael', 0, '2023-03-15 22:05:59', NULL),
	(400, 1, 'Ek Lopez Jose Alfredo', 0, '2023-03-15 22:05:59', NULL),
	(401, 1, 'Euan Can Eusebio Fabian', 3, '2023-03-15 22:05:59', NULL),
	(402, 1, 'Flores Arias Jesus Aaron', 0, '2023-03-15 22:05:59', NULL),
	(403, 1, 'Flores Dzul Jose Reynaldo', 0, '2023-03-15 22:05:59', NULL),
	(404, 1, 'Flores Gongora Pedro Ricardo', 0, '2023-03-15 22:05:59', NULL),
	(405, 1, 'Gallegos Andueza Jorge Antonio', 0, '2023-03-15 22:05:59', NULL),
	(406, 1, 'Garma Barrera Armando Rene', 0, '2023-03-15 22:05:59', NULL),
	(407, 1, 'Geronimo Zapata Ricardo', 0, '2023-03-15 22:05:59', NULL),
	(408, 1, 'Gomez Garrido Daniel Alejandro', 0, '2023-03-15 22:05:59', NULL),
	(409, 1, 'Gongora Dzul David Alberto', 0, '2023-03-15 22:05:59', NULL),
	(410, 1, 'Gongora Dzul Jose Cristino', 0, '2023-03-15 22:05:59', NULL),
	(411, 1, 'Gongora Puch Jesus Manuel', 3, '2023-03-15 22:05:59', NULL),
	(412, 1, 'Gongora Tzun Ricardo Antonio', 0, '2023-03-15 22:05:59', NULL),
	(413, 1, 'Gonzalez Cruz Juan Jose', 0, '2023-03-15 22:05:59', NULL),
	(414, 1, 'Gonzalez Ricardez Martin Eduardo', 0, '2023-03-15 22:05:59', NULL),
	(415, 1, 'Gonzalez Tutzin Etzer Aaron', 0, '2023-03-15 22:05:59', NULL),
	(416, 1, 'Hernandez Pat Hirineo', 3, '2023-03-15 22:05:59', NULL),
	(417, 1, 'Herrera Kuh Juan Pablo', 3, '2023-03-15 22:05:59', NULL),
	(418, 1, 'Herrera Moo Jorge Alberto', 0, '2023-03-15 22:05:59', NULL),
	(419, 1, 'Hoil Alejos Alberto de Jesus', 0, '2023-03-15 22:05:59', NULL),
	(420, 1, 'Itza Chan Gerardo Manuel', 0, '2023-03-15 22:05:59', NULL),
	(421, 1, 'Ku Santamaria Rodolfo Jhordy', 3, '2023-03-15 22:05:59', NULL),
	(422, 1, 'Leon Bautista Manuel Asael', 0, '2023-03-15 22:05:59', NULL),
	(423, 1, 'Leon NuÃƒÂ±ez Lorenzo', 0, '2023-03-15 22:05:59', NULL),
	(424, 1, 'Leon Santiago Uziel Gerevay', 0, '2023-03-15 22:05:59', NULL),
	(425, 1, 'Leon Suarez Samuel Abelardo', 0, '2023-03-15 22:05:59', NULL),
	(426, 1, 'Linares Estrella Edwin Alexander', 0, '2023-03-15 22:05:59', NULL),
	(427, 1, 'Linares Peralta Angel de Jesus', 0, '2023-03-15 22:05:59', NULL),
	(428, 1, 'Lopez Balam Humberto Moroni', 0, '2023-03-15 22:05:59', NULL),
	(429, 1, 'Lopez Canche Gabriel Mauricio', 0, '2023-03-15 22:05:59', NULL),
	(430, 1, 'Lopez Hoil Valentin del Angel', 3, '2023-03-15 22:05:59', NULL),
	(431, 1, 'Lopez Olmedo Oscar Israel', 0, '2023-03-15 22:05:59', NULL),
	(432, 1, 'Macias Canche Edwin Eduardo', 3, '2023-03-15 22:05:59', NULL),
	(433, 1, 'Maldonado Cauich Ramon Misael', 0, '2023-03-15 22:05:59', NULL),
	(434, 1, 'Manzano Ravell Jesus Martin', 0, '2023-03-15 22:05:59', NULL),
	(435, 1, 'Martinez Dzul Jose Ricardo', 3, '2023-03-15 22:05:59', NULL),
	(436, 1, 'Martinez Jimenez Aibelio', 0, '2023-03-15 22:05:59', NULL),
	(437, 1, 'Martinez Pech Francisco Ivan', 0, '2023-03-15 22:05:59', NULL),
	(438, 1, 'May Cauich Noe Moises', 0, '2023-03-15 22:05:59', NULL),
	(439, 1, 'May Gonzalez Sergio Alonso', 0, '2023-03-15 22:05:59', NULL),
	(440, 1, 'May Mena Cristian Uriel', 0, '2023-03-15 22:05:59', NULL),
	(441, 1, 'Molina Euan Ivan Enrique', 3, '2023-03-15 22:05:59', NULL),
	(442, 1, 'Moo Ayil Jose Dolores', 0, '2023-03-15 22:05:59', NULL),
	(443, 1, 'Moo Moo Erick Efrain', 0, '2023-03-15 22:05:59', NULL),
	(444, 1, 'Navarro Arcila Vincent Jose', 0, '2023-03-15 22:05:59', NULL),
	(445, 1, 'Pacheco Maldonado Jose Martin', 0, '2023-03-15 22:05:59', NULL),
	(446, 1, 'Pech Reyes Jose de Jesus', 0, '2023-03-15 22:05:59', NULL),
	(447, 1, 'Perera Hernandez Jose Luis', 0, '2023-03-15 22:05:59', NULL),
	(448, 1, 'Pool Fuentes Bryan Gabriel', 0, '2023-03-15 22:05:59', NULL),
	(449, 1, 'Pool Fuentes Diego Alexander', 0, '2023-03-15 22:05:59', NULL),
	(450, 1, 'Pool Nic Pedro Pablo', 0, '2023-03-15 22:05:59', NULL),
	(451, 1, 'Poot Cuytun Jose Juan Bernardo', 0, '2023-03-15 22:05:59', NULL),
	(452, 1, 'Puc Centeno Jose Cecilio', 0, '2023-03-15 22:05:59', NULL),
	(453, 1, 'Puc Koyoc Marco Xavier', 0, '2023-03-15 22:05:59', NULL),
	(454, 1, 'Puc Moo Fernando', 3, '2023-03-15 22:05:59', NULL),
	(455, 1, 'Puc Uc Evelio', 0, '2023-03-15 22:05:59', NULL),
	(456, 1, 'Ramos Sanchez Angel Gaspar', 0, '2023-03-15 22:05:59', NULL),
	(457, 1, 'Regil Garcia Manuel Antonio', 0, '2023-03-15 22:05:59', NULL),
	(458, 1, 'Reina Gamboa Geovanny de la Cruz', 0, '2023-03-15 22:05:59', NULL),
	(459, 1, 'Reyes MuÃƒÂ±oz Armando', 3, '2023-03-15 22:05:59', NULL),
	(460, 1, 'Reyes Pam Harverth Aldahir', 0, '2023-03-15 22:05:59', NULL),
	(461, 1, 'Rivero Hernandez Henrry Santiago', 0, '2023-03-15 22:05:59', NULL),
	(462, 1, 'Rojas Vidal Erik de Jesus', 0, '2023-03-15 22:05:59', NULL),
	(463, 1, 'Romero Pacheco Juan Daniel', 0, '2023-03-15 22:05:59', NULL),
	(464, 1, 'Rosado May Francisco Javier', 0, '2023-03-15 22:05:59', NULL),
	(465, 1, 'Ruz Yama Jose Martin', 0, '2023-03-15 22:05:59', NULL),
	(466, 1, 'Salazar Che Julio Gamaliel', 0, '2023-03-15 22:05:59', NULL),
	(467, 1, 'Salazar Che Magdiel Alexander', 0, '2023-03-15 22:05:59', NULL),
	(468, 1, 'Sanchez Pech Wilbert Manuel', 0, '2023-03-15 22:05:59', NULL),
	(469, 1, 'Segura Dzul Jose Antonio', 0, '2023-03-15 22:05:59', NULL),
	(470, 1, 'Solis Felix Jose Luis', 0, '2023-03-15 22:05:59', NULL),
	(471, 1, 'Solis Felix Marco David', 0, '2023-03-15 22:05:59', NULL),
	(472, 1, 'Solis Flores Jose Luis', 0, '2023-03-15 22:05:59', NULL),
	(473, 1, 'Sonda Huh Juan Francisco Javier', 0, '2023-03-15 22:05:59', NULL),
	(474, 1, 'Suaste Yah Isaac Esteban', 0, '2023-03-15 22:05:59', NULL),
	(475, 1, 'Sulu Mex Alberto Angel', 3, '2023-03-15 22:05:59', NULL),
	(476, 1, 'Sulu Mex Daniel de Jesus', 0, '2023-03-15 22:05:59', NULL),
	(477, 1, 'Sulub Mex Felipe De Jesus', 0, '2023-03-15 22:05:59', NULL),
	(478, 1, 'Tun Baas Romeo', 0, '2023-03-15 22:05:59', NULL),
	(479, 1, 'Tut Oxte Julio Cesar', 0, '2023-03-15 22:05:59', NULL),
	(480, 1, 'Tzab Yam Ariel Damian', 3, '2023-03-15 22:05:59', NULL),
	(481, 1, 'Tzuc Ayala Jesus Noe', 0, '2023-03-15 22:05:59', NULL),
	(482, 1, 'Uc Dzul Rosendo', 0, '2023-03-15 22:05:59', NULL),
	(483, 1, 'Tzab Yam Ariel Damian', 0, '2023-03-15 22:05:59', NULL),
	(484, 1, 'Uh Chi Edwin Alejandro', 3, '2023-03-15 22:05:59', NULL),
	(485, 1, 'Uicab Santos Aaron David', 0, '2023-03-15 22:05:59', NULL),
	(486, 1, 'Us Perez Daniel', 0, '2023-03-15 22:05:59', NULL),
	(487, 1, 'Valdez BaÃƒÂ±os Manuel Andres', 3, '2023-03-15 22:05:59', NULL),
	(488, 1, 'Valencia Cauich Guillermo Valentin', 0, '2023-03-15 22:05:59', NULL),
	(489, 1, 'Vazquez Garrido Jahir Abimael', 0, '2023-03-15 22:05:59', NULL),
	(490, 1, 'Vazquez Martinez Osvaldo', 3, '2023-03-15 22:05:59', NULL),
	(491, 1, 'Vazquez Martinez Patrobich', 0, '2023-03-15 22:05:59', NULL),
	(492, 1, 'Vela Dominguez Walter Joaquin', 3, '2023-03-15 22:05:59', NULL),
	(493, 1, 'Velasco Gomez Juan Pablo', 0, '2023-03-15 22:05:59', NULL),
	(494, 1, 'Xeque Xix Santos Angel', 0, '2023-03-15 22:05:59', NULL),
	(495, 1, 'Xul Dzul Jose Rodolfo', 0, '2023-03-15 22:05:59', NULL),
	(496, 1, 'Yah Ek Ademar Antonio', 0, '2023-03-15 22:05:59', NULL),
	(497, 1, 'Yah Haas Cristhoper Alexis', 0, '2023-03-15 22:05:59', NULL),
	(498, 1, 'Yam Gonzalez Jose Hernan Victorio', 0, '2023-03-15 22:05:59', NULL),
	(499, 1, 'Yam Pech Armando Jose', 0, '2023-03-15 22:05:59', NULL),
	(500, 1, 'Zaldivar Najera Miguel Alejandro', 3, '2023-03-15 22:05:59', NULL),
	(501, 1, 'sanchez coba fernando david.', 0, '2023-03-15 22:05:59', NULL),
	(502, 1, 'Zaldivar Najera Miguel Alejandro', 0, '2023-03-15 22:05:59', NULL),
	(503, 1, 'Sabido Martinez Aldemar Antonio', 0, '2023-03-15 22:05:59', NULL),
	(504, 1, 'MEDINA ABAN JAHIR DE JESUS', 0, '2023-03-15 22:05:59', NULL),
	(505, 1, 'Acosta Uc Jorge Andres', 0, '2023-03-15 22:05:59', NULL),
	(506, 1, 'Ake Huh Maximiliano', 0, '2023-03-15 22:05:59', NULL),
	(507, 1, 'Alonso Leal David', 0, '2023-03-15 22:05:59', NULL),
	(508, 1, 'Cabrera Palma Julian de Jesus', 0, '2023-03-15 22:05:59', NULL),
	(509, 1, 'Canul Colli Josue Elias', 0, '2023-03-15 22:05:59', NULL),
	(510, 1, 'Carrillo Poot Juan Jose', 0, '2023-03-15 22:05:59', NULL),
	(511, 1, 'Casanova Herrera Guillermo Ricardo', 0, '2023-03-15 22:05:59', NULL),
	(512, 1, 'Cauich Arce Luis Alberto', 0, '2023-03-15 22:05:59', NULL),
	(513, 1, 'Cauich Cante Jhonathan Geovany', 0, '2023-03-15 22:05:59', NULL),
	(514, 1, 'Dzul Martin Carlos Enrique', 0, '2023-03-15 22:05:59', NULL),
	(515, 1, 'Euan Can Eusebio Fabian', 0, '2023-03-15 22:05:59', NULL),
	(516, 1, 'Ku Santamaria Rodolfo Jhordy', 3, '2023-03-15 22:05:59', NULL),
	(517, 1, 'Molina Euan Ivan Enrique', 0, '2023-03-15 22:05:59', NULL),
	(518, 1, 'Moo Cen Kevin Alejandro', 0, '2023-03-15 22:05:59', NULL),
	(519, 1, 'Pino Perez Erik Enrique', 3, '2023-03-15 22:05:59', NULL),
	(520, 1, 'Puga Perez Angel Agustin', 0, '2023-03-15 22:05:59', NULL),
	(521, 1, 'Reyes MuÃƒÂ±oz Armando', 0, '2023-03-15 22:05:59', NULL),
	(522, 1, 'Sarabia Tec Mariano', 0, '2023-03-15 22:05:59', NULL),
	(523, 1, 'Solis Felix Jordan Jesus', 0, '2023-03-15 22:05:59', NULL),
	(524, 1, 'Solis Puc Aureliano', 0, '2023-03-15 22:05:59', NULL),
	(525, 1, 'Sulu Mex Alberto Angel', 0, '2023-03-15 22:05:59', NULL),
	(526, 1, 'Tzuc Mira Anduars Sleyter', 0, '2023-03-15 22:05:59', NULL),
	(527, 1, 'Uh Chi Edwin Alejandro', 0, '2023-03-15 22:05:59', NULL),
	(528, 1, 'Valdez BaÃƒÂ±os Manuel Andres', 0, '2023-03-15 22:05:59', NULL),
	(529, 1, 'Vela Dominguez Walter Joaquin', 0, '2023-03-15 22:05:59', NULL),
	(530, 1, 'Geovany Alberto Garcia Mex', 0, '2023-03-15 22:05:59', NULL),
	(531, 1, 'Pedro Gilberto Uc Ayil', 0, '2023-03-15 22:05:59', NULL),
	(532, 1, 'Gilmer Antonio Cauich Chi', 0, '2023-03-15 22:05:59', NULL),
	(533, 1, 'Brayan Cel Moo', 0, '2023-03-15 22:05:59', NULL),
	(534, 1, 'uc ayil pedro', 0, '2023-03-15 22:05:59', NULL),
	(535, 1, 'Arcos Arias Jesus del Rosario', 0, '2023-03-15 22:05:59', NULL),
	(536, 1, 'Balam Pinto Bayron David Everson', 0, '2023-03-15 22:05:59', NULL),
	(537, 1, 'Casanova Herrera Gabriel Jesus', 0, '2023-03-15 22:05:59', NULL),
	(538, 1, 'Cel Moo Brayan Joaquin', 0, '2023-03-15 22:05:59', NULL),
	(539, 1, 'Cetina Chay Amilcar Aaron', 0, '2023-03-15 22:05:59', NULL),
	(540, 1, 'Colli Colli Marco Antonio', 0, '2023-03-15 22:05:59', NULL),
	(541, 1, 'Ku Santamaria Rodolfo Jhordy', 0, '2023-03-15 22:05:59', NULL),
	(542, 1, 'Manrique Perez Rolando Arcandio', 0, '2023-03-15 22:05:59', NULL),
	(543, 1, 'Pino Perez Erik Enrique', 0, '2023-03-15 22:05:59', NULL),
	(544, 1, 'Pino Perez Juan Antonio', 0, '2023-03-15 22:05:59', NULL),
	(545, 1, 'Tun Puch Didier Oswaldo', 0, '2023-03-15 22:05:59', NULL),
	(546, 1, 'Ake Hu Jose Baltazar', 0, '2023-04-17 16:56:48', NULL),
	(547, 1, 'Chan chan Luis Fernando', 0, '2023-04-17 16:58:55', NULL),
	(548, 1, 'Dzul Dzul Carlos juan', 0, '2023-04-17 17:01:03', NULL),
	(549, 1, 'Leon NuÃƒÆ’Ã‚Â±ez Lorenzo', 0, '2023-04-17 17:01:17', NULL),
	(550, 1, 'Vazquez Martinez Osvaldo', 0, '2023-04-17 17:01:31', NULL),
	(551, 1, 'Reyes MuÃƒÆ’Ã‚Â±oz Armando', 0, '2023-04-17 17:02:40', NULL),
	(552, 1, 'Casanova Dzul Clemente', 0, '2023-04-18 06:37:03', NULL),
	(553, 1, 'Dzul Dzul Carlos Ivan', 0, '2023-04-18 06:51:34', NULL),
	(554, 1, 'Leon Suarez Jesus Gerardo', 0, '2023-04-18 07:05:36', NULL),
	(555, 1, 'May Chable Jesus Alejandro', 0, '2023-04-18 07:14:34', NULL),
	(556, 1, 'Najera Varguez Angel Josue', 0, '2023-04-18 07:17:31', NULL),
	(557, 1, 'Ontiveros Carballo Christian Emanuel', 0, '2023-04-18 07:17:41', NULL),
	(558, 1, 'Perez Zapata Gabriel Ildelfonso', 0, '2023-04-18 07:19:01', NULL),
	(559, 1, 'Ucan Chan Luis Fernando', 0, '2023-04-18 07:29:16', NULL),
	(560, 1, 'Jorge manuel canul chan', 0, '2023-04-25 14:25:50', NULL),
	(561, 1, 'Gerardo ayil dzul', 0, '2023-04-25 07:31:34', NULL),
	(562, 1, 'Juan luis poot chacon', 0, '2023-05-09 15:06:23', NULL),
	(563, 1, 'Fernando david sanchez coba', 0, '2023-05-11 14:22:14', NULL),
	(564, 1, 'Escamilla ayuso cesar', 0, '2023-05-11 14:47:45', NULL),
	(565, 1, 'Huerta alvarez isai', 0, '2023-05-12 18:23:48', NULL),
	(566, 1, 'Poot chacon jose luis', 0, '2023-05-12 14:15:46', NULL),
	(567, 1, 'Lopez hoil valentin del angel', 0, '2023-05-13 14:03:29', NULL),
	(568, 1, 'Cordero gomez gonzalo', 3, '2023-05-19 14:23:47', NULL),
	(569, 1, 'Uc cua mauro', 0, '2023-05-19 14:50:43', NULL),
	(570, 1, 'Carrillo Espinoza Edgar A!ejandro', 0, '2023-05-24 15:15:03', NULL),
	(571, 1, 'Fredy Alberto Canche Borges', 0, '2023-05-30 13:47:26', NULL),
	(572, 1, 'Cab Chan Jose Raul', 0, '2023-05-30 13:19:43', NULL),
	(573, 1, 'Salazar che jahdiel yahuen', 0, '2023-06-07 07:56:00', NULL),
	(574, 1, 'Guzman montejo gaspar', 0, '2023-06-16 15:55:15', NULL),
	(575, 1, 'Arce Castillo Carlos Antonio', 0, '2023-06-21 14:48:12', NULL),
	(576, 1, 'Chan Duarte Jose Reyes', 0, '2023-06-28 14:21:25', NULL),
	(577, 1, 'Manuel arturo ku santos', 0, '2023-07-04 14:52:35', NULL),
	(578, 1, 'Dzul cahun rojer', 0, '2023-07-04 17:28:25', NULL),
	(579, 1, 'Anduar tzuc mira', 0, '2023-07-06 14:26:10', NULL),
	(580, 1, 'Canul poot santos aurelio', 0, '2023-07-06 14:41:05', NULL),
	(581, 1, 'Gonzalez canul pablo adrian', 0, '2023-07-07 15:01:18', NULL),
	(582, 1, 'UK ucan Angel', 0, '2023-07-13 14:22:02', NULL),
	(583, 1, 'Tun Ucan Angel Gabriel', 0, '2023-07-18 08:04:57', NULL),
	(584, 1, 'Canul Poot Santos Aurelio', 0, '2023-07-18 08:06:18', NULL);

-- Volcando estructura para tabla ecolsur.registros
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- Volcando datos para la tabla ecolsur.registros: ~4 rows (aproximadamente)
INSERT INTO `registros` (`registro_id`, `sucursal_id`, `unidad_id`, `semana`, `dia`, `fecha_entrada`, `hora_salida`, `fecha_salida`, `hora_tablero`, `alias_id`, `operador_id`, `km_salida`, `km_entrada`, `tiempo_ruta`, `hora_entrada`, `asignacion_id`, `usuario_id`, `observaciones`, `recorrido`, `litroscargados`, `rendimiento`, `totalpeso`, `estatus`, `created_at`, `updated_at`) VALUES
	(1, 1, 6, 37, 'Viernes', '2023-09-15', '2023-09-15 14:43:08', '2023-09-15', 5, 75, 72, 1256, 789333, '01:06:52', '2023-09-15 15:50:00', 1, 4, 'N/A', 788077, 60, 13135, NULL, 2, '2023-09-15 09:43:43', '2023-09-15 09:55:25'),
	(2, 1, 7, 37, 'Viernes', '2023-09-15', '2023-09-15 14:48:27', '2023-09-15', 5, 6, 89, 864, 9756, '01:01:24', '2023-09-15 15:49:51', 1, 4, 'N/A', 8892, 60, 148, NULL, 2, '2023-09-15 09:48:55', '2023-09-19 08:32:10'),
	(3, 1, 6, 37, 'Viernes', '2023-09-20', '2023-09-15 14:49:01', '2023-09-15', 6, 6, 90, 98767, 50, '00:33:54', '2023-09-20 15:22:55', 1, 4, 'N/A', -98717, 60, -1645, NULL, 2, '2023-09-15 09:49:33', '2023-09-20 09:23:53'),
	(4, 1, 6, 38, 'Martes', '2023-09-19', '2023-09-19 13:30:16', '2023-09-19', 5, 2, 86, 1234, 450, '01:00:39', '2023-09-19 14:30:55', 1, 4, 'N/A', -784, 500, -2, NULL, 2, '2023-09-19 08:30:50', '2023-09-20 08:41:22'),
	(5, 1, 6, 38, 'Miercoles', '2023-09-20', '2023-09-20 14:34:46', '2023-09-20', 5, 2, 72, 1500, 600, '01:00:29', '2023-09-20 15:35:15', 1, 4, 'N/A', -900, 100, -9, NULL, 2, '2023-09-20 09:35:11', '2023-09-20 09:36:11'),
	(6, 1, 6, 38, 'Miercoles', '2023-09-20', '2023-09-20 14:41:08', '2023-09-20', 5, 6, 86, 150, 600, NULL, '2023-09-20 15:55:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-20 09:55:50', '2023-09-20 09:55:59');

-- Volcando estructura para tabla ecolsur.rutas
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

-- Volcando datos para la tabla ecolsur.rutas: ~142 rows (aproximadamente)
INSERT INTO `rutas` (`ruta_id`, `sucursal_id`, `ruta_nombre`, `estatus`, `created_at`, `updated_at`) VALUES
	(0, 0, '-', 0, '2023-03-17 20:09:08', NULL),
	(1, 1, '01-NORTE', 0, '2023-03-15 22:05:59', NULL),
	(2, 1, '08-SUR', 0, '2023-03-15 22:05:59', NULL),
	(3, 1, '06-NORTE', 0, '2023-03-15 22:05:59', NULL),
	(4, 1, '19-NORTE', 0, '2023-03-15 22:05:59', NULL),
	(5, 1, '02-NORTE', 0, '2023-03-15 22:05:59', NULL),
	(6, 1, '13-SUR', 0, '2023-03-15 22:05:59', NULL),
	(7, 1, '03-NORTE', 0, '2023-03-15 22:05:59', NULL),
	(8, 1, '03-CAUCEL', 0, '2023-03-15 22:05:59', NULL),
	(9, 1, '04-NORTE', 0, '2023-03-15 22:05:59', NULL),
	(10, 1, '05-NORTE', 0, '2023-03-15 22:05:59', NULL),
	(11, 1, '10-NORTE', 0, '2023-03-15 22:05:59', NULL),
	(12, 1, '07-NORTE', 0, '2023-03-15 22:05:59', NULL),
	(13, 1, '11-NORTE', 0, '2023-03-15 22:05:59', NULL),
	(14, 1, '08-NORTE', 0, '2023-03-15 22:05:59', NULL),
	(15, 1, '09-NORTE', 0, '2023-03-15 22:05:59', NULL),
	(16, 1, '16-SUR', 0, '2023-03-15 22:05:59', NULL),
	(17, 1, '10-SUR', 0, '2023-03-15 22:05:59', NULL),
	(18, 1, '01-SUR', 0, '2023-03-15 22:05:59', NULL),
	(19, 1, '06-SUR', 0, '2023-03-15 22:05:59', NULL),
	(20, 1, '02-SUR', 0, '2023-03-15 22:05:59', NULL),
	(21, 1, '12-SUR', 0, '2023-03-15 22:05:59', NULL),
	(22, 1, '03-SUR', 0, '2023-03-15 22:05:59', NULL),
	(23, 1, '09-SUR', 0, '2023-03-15 22:05:59', NULL),
	(24, 1, '04-SUR', 0, '2023-03-15 22:05:59', NULL),
	(25, 1, '10-SUR', 0, '2023-03-15 22:05:59', NULL),
	(26, 1, '05-SUR', 0, '2023-03-15 22:05:59', NULL),
	(27, 1, '12-NORTE', 0, '2023-03-15 22:05:59', NULL),
	(28, 1, '01-CAUCEL', 0, '2023-03-15 22:05:59', NULL),
	(29, 1, '13-NORTE', 0, '2023-03-15 22:05:59', NULL),
	(30, 1, '03-CAUCEL', 0, '2023-03-15 22:05:59', NULL),
	(31, 1, '15-NORTE', 0, '2023-03-15 22:05:59', NULL),
	(32, 1, '04-CAUCEL', 0, '2023-03-15 22:05:59', NULL),
	(33, 1, '14-NORTE', 0, '2023-03-15 22:05:59', NULL),
	(34, 1, '07-SUR', 0, '2023-03-15 22:05:59', NULL),
	(35, 1, '18-DII', 0, '2023-03-15 22:05:59', NULL),
	(36, 1, '05-CAUCEL', 0, '2023-03-15 22:05:59', NULL),
	(37, 1, '01-PONIENTE', 0, '2023-03-15 22:05:59', NULL),
	(38, 1, '03-PONIENTE', 0, '2023-03-15 22:05:59', NULL),
	(39, 1, '02-PONIENTE', 0, '2023-03-15 22:05:59', NULL),
	(40, 1, '05-PONIENTE', 0, '2023-03-15 22:05:59', NULL),
	(41, 1, '04-PONIENTE', 0, '2023-03-15 22:05:59', NULL),
	(42, 1, 'COMISARIAS', 0, '2023-03-15 22:05:59', NULL),
	(43, 1, 'COMERCIAL', 0, '2023-03-15 22:05:59', NULL),
	(44, 1, '02-CAUCEL', 0, '2023-03-15 22:05:59', NULL),
	(45, 1, '04-YUCALPETEC', 0, '2023-03-15 22:05:59', NULL),
	(46, 1, '19 y 20 DII, CAUCEL', 0, '2023-03-15 22:05:59', NULL),
	(47, 1, '11-SUR', 0, '2023-03-15 22:05:59', NULL),
	(48, 1, '16-NORTE', 0, '2023-03-15 22:05:59', NULL),
	(49, 1, '06-CAUCEL', 0, '2023-03-15 22:05:59', NULL),
	(50, 1, '07-PONIENTE', 0, '2023-03-15 22:05:59', NULL),
	(51, 1, '21-NORTE', 0, '2023-03-15 22:05:59', NULL),
	(52, 1, 'RCK1', 0, '2023-03-15 22:05:59', NULL),
	(53, 1, 'RCK2', 0, '2023-03-15 22:05:59', NULL),
	(54, 1, 'RCK3', 0, '2023-03-15 22:05:59', NULL),
	(55, 1, 'RCK4', 0, '2023-03-15 22:05:59', NULL),
	(56, 1, 'RCK5', 0, '2023-03-15 22:05:59', NULL),
	(57, 1, 'RNK1', 0, '2023-03-15 22:05:59', NULL),
	(58, 1, 'RNK2', 0, '2023-03-15 22:05:59', NULL),
	(59, 1, 'RNK3', 0, '2023-03-15 22:05:59', NULL),
	(60, 1, 'RNK4', 0, '2023-03-15 22:05:59', NULL),
	(61, 1, 'RNK5', 0, '2023-03-15 22:05:59', NULL),
	(62, 1, 'RSK1', 0, '2023-03-15 22:05:59', NULL),
	(63, 1, 'RSK2', 0, '2023-03-15 22:05:59', NULL),
	(64, 1, 'RSK3', 0, '2023-03-15 22:05:59', NULL),
	(65, 1, 'RSK4', 0, '2023-03-15 22:05:59', NULL),
	(66, 1, 'RSK5', 0, '2023-03-15 22:05:59', NULL),
	(67, 1, 'R6KD', 0, '2023-03-15 22:05:59', NULL),
	(68, 1, 'R1ND', 0, '2023-03-15 22:05:59', NULL),
	(69, 1, 'R2ND', 0, '2023-03-15 22:05:59', NULL),
	(70, 1, 'R3ND', 0, '2023-03-15 22:05:59', NULL),
	(71, 1, 'R4ND', 0, '2023-03-15 22:05:59', NULL),
	(72, 1, 'R5ND', 0, '2023-03-15 22:05:59', NULL),
	(73, 1, 'R6ND', 0, '2023-03-15 22:05:59', NULL),
	(74, 1, 'R7ND', 0, '2023-03-15 22:05:59', NULL),
	(75, 1, 'R8SD', 0, '2023-03-15 22:05:59', NULL),
	(76, 1, 'R9SD', 0, '2023-03-15 22:05:59', NULL),
	(77, 1, 'R10ND', 0, '2023-03-15 22:05:59', NULL),
	(78, 1, 'R11ND', 0, '2023-03-15 22:05:59', NULL),
	(79, 1, 'R12ND', 0, '2023-03-15 22:05:59', NULL),
	(80, 1, 'R13ND', 0, '2023-03-15 22:05:59', NULL),
	(81, 1, 'R14ND', 0, '2023-03-15 22:05:59', NULL),
	(82, 1, 'R15ND', 0, '2023-03-15 22:05:59', NULL),
	(83, 1, 'R1NN', 0, '2023-03-15 22:05:59', NULL),
	(84, 1, 'R2NN', 0, '2023-03-15 22:05:59', NULL),
	(85, 1, 'R3NN', 0, '2023-03-15 22:05:59', NULL),
	(86, 1, 'R4NN', 0, '2023-03-15 22:05:59', NULL),
	(87, 1, 'R5NN', 0, '2023-03-15 22:05:59', NULL),
	(88, 1, 'R6NN', 0, '2023-03-15 22:05:59', NULL),
	(89, 1, 'R7NN', 0, '2023-03-15 22:05:59', NULL),
	(90, 1, 'R8NN', 0, '2023-03-15 22:05:59', NULL),
	(91, 1, 'R9NN', 0, '2023-03-15 22:05:59', NULL),
	(92, 1, 'R10NN', 0, '2023-03-15 22:05:59', NULL),
	(93, 1, 'R11NN', 0, '2023-03-15 22:05:59', NULL),
	(94, 1, 'R1SD', 0, '2023-03-15 22:05:59', NULL),
	(95, 1, 'R2SD', 0, '2023-03-15 22:05:59', NULL),
	(96, 1, 'R3SD', 0, '2023-03-15 22:05:59', NULL),
	(97, 1, 'R4SD', 0, '2023-03-15 22:05:59', NULL),
	(98, 1, 'R5SD', 0, '2023-03-15 22:05:59', NULL),
	(99, 1, 'R6SD', 0, '2023-03-15 22:05:59', NULL),
	(100, 1, 'R7SD', 0, '2023-03-15 22:05:59', NULL),
	(101, 1, 'R8ND', 0, '2023-03-15 22:05:59', NULL),
	(102, 1, 'R9ND', 0, '2023-03-15 22:05:59', NULL),
	(103, 1, 'CR1D', 0, '2023-03-15 22:05:59', NULL),
	(104, 1, 'CR2D', 0, '2023-03-15 22:05:59', NULL),
	(105, 1, 'CR3D', 0, '2023-03-15 22:05:59', NULL),
	(106, 1, 'CR4D', 0, '2023-03-15 22:05:59', NULL),
	(107, 1, 'CR5D', 0, '2023-03-15 22:05:59', NULL),
	(108, 1, 'CR6D', 0, '2023-03-15 22:05:59', NULL),
	(109, 1, 'R1SN', 0, '2023-03-15 22:05:59', NULL),
	(110, 1, 'R2SN', 0, '2023-03-15 22:05:59', NULL),
	(111, 1, 'R3SN', 0, '2023-03-15 22:05:59', NULL),
	(112, 1, 'R4SN', 0, '2023-03-15 22:05:59', NULL),
	(113, 1, 'R5SN', 0, '2023-03-15 22:05:59', NULL),
	(114, 1, 'R6SN', 0, '2023-03-15 22:05:59', NULL),
	(115, 1, 'R7SN', 0, '2023-03-15 22:05:59', NULL),
	(116, 1, 'R8SN', 0, '2023-03-15 22:05:59', NULL),
	(117, 1, 'R9SN', 0, '2023-03-15 22:05:59', NULL),
	(118, 1, 'CR1N', 0, '2023-03-15 22:05:59', NULL),
	(119, 1, 'CR2N', 0, '2023-03-15 22:05:59', NULL),
	(120, 1, 'BACHOCO', 0, '2023-03-15 22:05:59', NULL),
	(121, 1, 'ESPECIAL', 0, '2023-03-15 22:05:59', NULL),
	(122, 1, 'COMERCIAL', 0, '2023-03-15 22:05:59', NULL),
	(123, 1, 'R12NN', 0, '2023-03-15 22:05:59', NULL),
	(124, 1, 'R13NN', 0, '2023-03-15 22:05:59', NULL),
	(125, 1, 'R17ND', 0, '2023-03-15 22:05:59', NULL),
	(126, 1, 'R10ND', 0, '2023-03-15 22:05:59', NULL),
	(127, 1, 'apoyo', 0, '2023-03-15 22:05:59', NULL),
	(128, 1, 'RSK6', 0, '2023-03-15 22:05:59', NULL),
	(129, 1, 'RNK6', 0, '2023-03-15 22:05:59', NULL),
	(130, 1, 'RCK6', 0, '2023-03-15 22:05:59', NULL),
	(131, 1, 'CR7D', 0, '2023-03-15 22:05:59', NULL),
	(132, 1, 'R10SN', 0, '2023-03-15 22:05:59', NULL),
	(133, 1, 'R10SD', 0, '2023-03-15 22:05:59', NULL),
	(134, 1, 'R1UD', 0, '2023-03-15 22:05:59', NULL),
	(135, 1, 'R2UD', 0, '2023-03-15 22:05:59', NULL),
	(136, 1, 'R3UD', 0, '2023-03-15 22:05:59', NULL),
	(137, 1, 'R4UD', 0, '2023-03-15 22:05:59', NULL),
	(138, 1, 'R5UD', 0, '2023-03-15 22:05:59', NULL),
	(139, 1, 'R6UD', 0, '2023-03-15 22:05:59', NULL),
	(140, 1, 'R16ND', 0, '2023-03-17 18:18:05', NULL),
	(141, 1, 'R7KD', 0, '2023-03-17 18:18:14', NULL);

-- Volcando estructura para tabla ecolsur.sucursales
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

-- Volcando datos para la tabla ecolsur.sucursales: ~3 rows (aproximadamente)
INSERT INTO `sucursales` (`sucursal_id`, `empresa_id`, `sucursal_nombre`, `estatus`, `created_at`, `updated_at`) VALUES
	(0, 0, 'general', 0, '2023-03-17 20:07:38', NULL),
	(1, 1, 'encierro', 0, '2023-03-16 17:51:28', NULL),
	(3, 3, 'ecolsur1', 3, '2023-06-19 18:06:10', NULL);

-- Volcando estructura para tabla ecolsur.tipo_producto
CREATE TABLE IF NOT EXISTS `tipo_producto` (
  `tipoProducto_id` int NOT NULL AUTO_INCREMENT,
  `tipoProducto_nombre` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `categoriaProducto_id` int DEFAULT NULL,
  `estatus` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tipoProducto_id`),
  KEY `FK_tipo_producto_categorias_producto` (`categoriaProducto_id`),
  CONSTRAINT `FK_tipo_producto_categorias_producto` FOREIGN KEY (`categoriaProducto_id`) REFERENCES `categorias_producto` (`categoriaProducto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla ecolsur.tipo_producto: ~2 rows (aproximadamente)
INSERT INTO `tipo_producto` (`tipoProducto_id`, `tipoProducto_nombre`, `categoriaProducto_id`, `estatus`, `created_at`, `updated_at`) VALUES
	(1, 'geringas', 3, 0, '2023-08-08 07:36:32', '2023-08-08 08:19:54'),
	(2, 'papel', 4, 0, '2023-08-08 08:24:49', NULL),
	(3, 'plutoneo', 6, 0, '2023-08-08 08:25:05', NULL);

-- Volcando estructura para tabla ecolsur.tiros
CREATE TABLE IF NOT EXISTS `tiros` (
  `tiro_id` int NOT NULL AUTO_INCREMENT,
  `registro_id` int NOT NULL,
  `manifiesto_id` int DEFAULT NULL,
  `numtiro` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tiro_id`),
  KEY `FK_tiros_tickets` (`manifiesto_id`) USING BTREE,
  KEY `FK_tiros_registros` (`registro_id`),
  CONSTRAINT `FK_tiros_manifiestos` FOREIGN KEY (`manifiesto_id`) REFERENCES `manifiestos` (`manifiesto_id`),
  CONSTRAINT `FK_tiros_registros` FOREIGN KEY (`registro_id`) REFERENCES `registros` (`registro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla ecolsur.tiros: ~8 rows (aproximadamente)
INSERT INTO `tiros` (`tiro_id`, `registro_id`, `manifiesto_id`, `numtiro`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, NULL, NULL),
	(2, 1, 2, 2, NULL, NULL),
	(3, 2, 1, 1, NULL, NULL),
	(4, 2, 2, 2, NULL, NULL),
	(5, 3, 1, 1, NULL, NULL),
	(6, 3, 2, 2, NULL, NULL),
	(7, 5, 1, 1, NULL, NULL),
	(8, 5, 2, 2, NULL, NULL);

-- Volcando estructura para tabla ecolsur.tripulacion
CREATE TABLE IF NOT EXISTS `tripulacion` (
  `tripulacion_id` int NOT NULL AUTO_INCREMENT,
  `registro_id` int DEFAULT NULL,
  `recolector_id` int DEFAULT '0',
  `numrecolector` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tripulacion_id`),
  KEY `FK_tripulacion_registros` (`registro_id`),
  KEY `FK_tripulacion_recolectores` (`recolector_id`),
  CONSTRAINT `FK_tripulacion_recolectores` FOREIGN KEY (`recolector_id`) REFERENCES `recolectores` (`recolector_id`),
  CONSTRAINT `FK_tripulacion_registros` FOREIGN KEY (`registro_id`) REFERENCES `registros` (`registro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla ecolsur.tripulacion: ~6 rows (aproximadamente)
INSERT INTO `tripulacion` (`tripulacion_id`, `registro_id`, `recolector_id`, `numrecolector`, `created_at`, `updated_at`) VALUES
	(1, 1, 49, 1, NULL, NULL),
	(2, 1, 108, 2, NULL, NULL),
	(3, 1, 69, 3, NULL, NULL),
	(4, 1, 524, 4, NULL, NULL),
	(5, 1, 112, 5, NULL, NULL),
	(6, 2, 74, 1, NULL, NULL),
	(7, 4, 49, 1, NULL, NULL),
	(8, 5, 49, 1, NULL, NULL),
	(9, 6, 49, 1, NULL, NULL);

-- Volcando estructura para tabla ecolsur.turnos
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

-- Volcando datos para la tabla ecolsur.turnos: ~3 rows (aproximadamente)
INSERT INTO `turnos` (`turno_id`, `sucursal_id`, `turno_nombre`, `estatus`, `created_at`, `updated_at`) VALUES
	(0, 0, 'general', 0, '2023-03-17 20:08:09', NULL),
	(1, 1, 'Diurno', 0, '2023-03-17 17:43:43', NULL),
	(2, 1, 'Nocturno', 0, '2023-03-17 17:43:51', NULL);

-- Volcando estructura para tabla ecolsur.unidades
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

-- Volcando datos para la tabla ecolsur.unidades: ~64 rows (aproximadamente)
INSERT INTO `unidades` (`unidad_id`, `sucursal_id`, `unidad_numero`, `unidad_placas`, `estatus`, `created_at`, `updated_at`) VALUES
	(0, 0, '-', '-', 0, '2023-03-17 20:10:23', NULL),
	(1, 1, 'C-01', 'YU-8950-C', 0, '2023-03-15 22:05:59', NULL),
	(2, 1, 'N-48', 'YU-8951-C', 0, '2023-03-15 22:05:59', NULL),
	(3, 1, 'N-49', 'YU-8947-C', 0, '2023-03-15 22:05:59', NULL),
	(4, 1, 'N-47', 'YN-8077-B', 0, '2023-03-15 22:05:59', NULL),
	(5, 1, 'C-05', 'YU-8955-C', 0, '2023-03-15 22:05:59', NULL),
	(6, 1, 'N-01', 'YU-8949-C', 0, '2023-03-15 22:05:59', NULL),
	(7, 1, 'N-02', 'YU-8953-C', 0, '2023-03-15 22:05:59', NULL),
	(8, 1, 'N-03', 'YT-7183-C', 0, '2023-03-15 22:05:59', NULL),
	(9, 1, 'N-04', 'YU-8950-C', 0, '2023-03-15 22:05:59', NULL),
	(10, 1, 'N-05', 'YU-8954-C', 0, '2023-03-15 22:05:59', NULL),
	(11, 1, 'N-06', 'YT-7183-A', 0, '2023-03-15 22:05:59', NULL),
	(12, 1, 'N-08', 'YU-8956-C', 0, '2023-03-15 22:05:59', NULL),
	(13, 1, 'N-09', 'YR-2446-C', 0, '2023-03-15 22:05:59', NULL),
	(14, 1, 'N-12', 'YT-7184-C', 0, '2023-03-15 22:05:59', NULL),
	(15, 1, 'N-14', 'YT-7185-C', 0, '2023-03-15 22:05:59', NULL),
	(16, 1, 'N-15', 'YU-8959-C', 0, '2023-03-15 22:05:59', NULL),
	(17, 1, 'N-16', 'YU-8946-C', 0, '2023-03-15 22:05:59', NULL),
	(18, 1, 'N-17', 'YU-8957-C', 0, '2023-03-15 22:05:59', NULL),
	(19, 1, 'N-18', 'YU-8958-C', 0, '2023-03-15 22:05:59', NULL),
	(20, 1, 'N-19', 'YT-7186-C', 0, '2023-03-15 22:05:59', NULL),
	(21, 1, 'N-20', 'YT-7198-C', 0, '2023-03-15 22:05:59', NULL),
	(22, 1, 'N-21', 'YT-7187-C', 0, '2023-03-15 22:05:59', NULL),
	(23, 1, 'N-22', 'YT-7188-C', 0, '2023-03-15 22:05:59', NULL),
	(24, 1, 'N-24', 'YT-0091-C', 0, '2023-03-15 22:05:59', NULL),
	(25, 1, 'N-25', 'YT-0090-C', 0, '2023-03-15 22:05:59', NULL),
	(26, 1, 'N-26', 'YT-0087-C', 0, '2023-03-15 22:05:59', NULL),
	(27, 1, 'S-05', 'YT-7190-C', 0, '2023-03-15 22:05:59', NULL),
	(28, 1, 'S-06', 'YU-7662-A', 0, '2023-03-15 22:05:59', NULL),
	(29, 1, 'S-10', 'YT-7191-C', 0, '2023-03-15 22:05:59', NULL),
	(30, 1, 'S-12', 'YT-7192-C', 0, '2023-03-15 22:05:59', NULL),
	(31, 1, 'S-13', 'YT-7193-C', 0, '2023-03-15 22:05:59', NULL),
	(32, 1, 'S-14', 'YT-7194-C', 0, '2023-03-15 22:05:59', NULL),
	(33, 1, 'S-15', 'YT-795-C', 0, '2023-03-15 22:05:59', NULL),
	(34, 1, 'S-16', 'YT-7196-C', 0, '2023-03-15 22:05:59', NULL),
	(35, 1, 'S-17', 'YT-7197-C', 0, '2023-03-15 22:05:59', NULL),
	(36, 1, 'N-30', 'YR-7422-B', 0, '2023-03-15 22:05:59', NULL),
	(37, 1, 'N-31', '70-FA-4B', 0, '2023-03-15 22:05:59', NULL),
	(38, 1, 'N-32', 'YN-0045-D', 0, '2023-03-15 22:05:59', NULL),
	(39, 1, 'N-33', 'YS-2512-B', 0, '2023-03-15 22:05:59', NULL),
	(40, 1, 'N-37', 'YT-0081-C', 0, '2023-03-15 22:05:59', NULL),
	(41, 1, 'N-36', 'YT-0082-C', 0, '2023-03-15 22:05:59', NULL),
	(42, 1, 'N-38', 'YT-2245-C', 0, '2023-03-15 22:05:59', NULL),
	(43, 1, 'N-39', 'YT-2248-C', 0, '2023-03-15 22:05:59', NULL),
	(44, 1, 'N-40', 'YT-2246-C', 0, '2023-03-15 22:05:59', NULL),
	(45, 1, 'N-41', 'YT-2247-C', 0, '2023-03-15 22:05:59', NULL),
	(46, 1, 'CS-01', 'YS-7464-A', 0, '2023-03-15 22:05:59', NULL),
	(47, 1, 'N-42', 'YR-3906-C', 0, '2023-03-15 22:05:59', NULL),
	(48, 1, 'N-43', 'YR-3905-C', 0, '2023-03-15 22:05:59', NULL),
	(49, 1, 'N-44', 'YU-7067-C', 0, '2023-03-15 22:05:59', NULL),
	(50, 1, 'N-45', 'YU-7066-C', 0, '2023-03-15 22:05:59', NULL),
	(51, 1, 'N-46', 'YU-7065-C', 0, '2023-03-15 22:05:59', NULL),
	(52, 1, 'KW-01', '01-02-03', 0, '2023-03-15 22:05:59', NULL),
	(53, 1, 'RS-36', 'YP-2234-D', 0, '2023-03-15 22:05:59', NULL),
	(54, 1, 'VOL-REN', 'YN-0054-D', 0, '2023-03-15 22:05:59', NULL),
	(55, 1, 'T-02', '15AB5S', 0, '2023-03-15 22:05:59', NULL),
	(56, 1, 'N-50', 'YR-4011-D', 0, '2023-03-15 22:05:59', NULL),
	(57, 1, 'N-51', 'YU-8955-C', 0, '2023-03-15 22:05:59', NULL),
	(58, 1, 'N-52', 'YU-8950-C', 0, '2023-03-15 22:05:59', NULL),
	(59, 1, 'N-53', 'YR-9466-D', 0, '2023-03-15 22:05:59', NULL),
	(60, 1, 'N-53', 'YR-9466-D', 0, '2023-03-15 22:05:59', NULL),
	(62, 1, 'S-11', 'YU-4906-C', 0, '2023-05-03 11:03:56', '2023-05-04 18:09:39'),
	(63, 1, 'N-56', 'YS-7000-D', 0, '2023-07-14 07:58:33', NULL),
	(64, 1, 'N-55', 'YS-6992-D', 0, '2023-07-14 08:04:52', NULL);

-- Volcando estructura para tabla ecolsur.usuarios
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

-- Volcando datos para la tabla ecolsur.usuarios: ~27 rows (aproximadamente)
INSERT INTO `usuarios` (`usuario_id`, `username`, `password`, `sucursal_id`, `email`, `nombres`, `apellidos`, `telefono`, `genero`, `estatus`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '$2y$10$DMKLKJFE6FTpBn/C67kFbOcvqUhasrd8uiWiMrem/PzY9tjK0fPAi', 0, 'admin@admin.com', 'admin', 'admin', '12345678910', 1, 0, '2023-03-16 17:52:26', NULL),
	(2, 'vigilancia', '$2y$10$1pLoEWwbIGFdURr8ZjkAi.UJ0epdDK60n5DUwa7fP9.ktd17ttdZ6', 1, '', 'vigilante', 'vigilante', '', 1, 0, '2023-03-17 18:40:10', '2023-04-24 18:59:01'),
	(3, 'rosarioayala', '$2y$10$qP3dahTj3f3lh7fo3NO0rOeeq5wbOe4nQo00DjUC9Aj7dB9xKttt6', 1, '', 'rosario', 'ayala', '', 2, 0, '2023-04-17 08:22:18', '2023-04-24 18:58:09'),
	(4, 'ecan', '$2y$10$s48IY8NzYw3vOTvKAkAAI.ReRuBmpeco98xGrLgfX.aqTE6WlM0lS', 1, 'soporte@sana.com.mx', 'edwin reynaldo', 'can calderon', '9991930036', 1, 0, '2023-04-17 09:52:32', '2023-04-24 18:58:44'),
	(5, 'aramon', '$2y$10$JKloNRXL6iMhybt.nQxIMu0opuQBzbQtFS4lpWH/slTy7xl8DKEfi', 1, NULL, 'antonio', 'ramon', NULL, 1, 0, '2023-04-19 10:10:45', NULL),
	(6, 'mmedina', '$2y$10$oKLY3UvdFio9mb35E/DEwOvTh8Gmo3esz8.PmuYlgWGYHFwwlce.O', 1, '', 'manuel', 'medina', '', 1, 0, '2023-04-19 10:33:52', '2023-04-24 07:58:25'),
	(7, 'supervisor', '$2y$10$emL3CpPPdfy6cdun0jcFKurlubh5cthpwJACBVb1StWnHpVmSEtee', 1, '', 'supervisor', 'supervisor', '', 1, 0, '2019-12-07 09:44:57', '2023-04-20 18:03:50'),
	(8, 'daguilar', '$2y$10$pgJng4XIG.c4fT7aIZ3/YeLvH.Ufp7D6eJPJo5SEUf7voXxUOfo2u', 1, '', 'didier', 'aguilar', '', 1, 0, '2019-12-07 10:10:52', '2023-04-22 16:19:31'),
	(9, 'vmagaÃ±a', '$2y$10$Yey/1TSBwoNPwPGSC5BtaeWArrI22fX8eoT1T8R0TY6AZeIhbZiM.', 1, '', 'victor', 'magaÃƒÂ±a', '', 1, 0, '2023-04-20 17:17:23', '2023-05-08 09:13:45'),
	(10, 'smex', '$2y$10$AA1SQZX0/QVEUWtnG6exK.KBkDE4DoO6C9M2VdeQVth4w.duR6vdS', 1, NULL, 'santos', 'mex', NULL, 1, 0, '2023-04-24 18:56:26', NULL),
	(11, 'cjimenez', '$2y$10$RiXgPT2CoTNqg17IpIUhm.jBnn34yx0Bl0N0hPMNbsIXDev.mDsym', 1, NULL, 'claudia', 'jimenez', NULL, 1, 0, '2023-04-27 18:26:06', NULL),
	(12, 'asansores', '$2y$10$W0bTnS.oM4LygdbvKOel6.5NRImQTl1YxdqCzprqxVPzZ0ADHPmlW', 1, NULL, 'alonzo', 'sansores', NULL, 1, 0, '2023-04-28 15:53:14', NULL),
	(13, 'arturo', '$2y$10$96yajxxq47CMZP5PB2lQ8.6fKOD7yRxAGpx9844WgEY0gvkWivbxW', 1, NULL, 'arturo', 'argaez', NULL, 1, 0, '2023-05-06 16:24:00', NULL),
	(14, 'lrodriguez', 'ffd238d130081ddcb0be22a825457487', 1, '', 'Loraine Maritza', 'RodrÃ­guez Manuel', '', 2, 3, '2023-06-13 11:15:08', NULL),
	(15, 'ecolsur', '$2y$10$3Lhwtfyz3NZQxlMt3cfipOTb1bdF/yuX/r3hUDLEf9VgCRtlh7cJ6', 3, NULL, 'ecolsur', 'ecolsur', NULL, 1, 3, '2023-06-19 18:06:58', NULL),
	(16, 'rchavez', '$2y$10$8LcmZ9Kah0ZA.Fkxpsh1WuU6Qi3..Xb3d97Yab8kQ.WVUJ7gPsosi', 1, NULL, 'Rudy', 'Chavez', NULL, 1, 0, '2023-06-24 17:16:52', NULL),
	(17, 'lmelisa', '$2y$10$KIDuKtrG.RJcuzEWoi0qLOELdl3gKt0nyKO2KRlT3THt/LsLUrT9m', 1, NULL, 'Lizandra Melisa', 'Vergara', NULL, 2, 0, '2023-06-24 17:18:28', NULL),
	(18, 'rpam', '$2y$10$eCktBl.BHtfNeimBKg8QIuCWUYW0SKe4ultkhUSd3Ljntt1h7W7Ea', 1, NULL, 'Ricardo', 'Pam', NULL, 1, 0, '2023-06-24 17:19:08', NULL),
	(19, 'jmendez', '$2y$10$XpfbTYpOP9IVZJ/QnQ3wlOnCuTsoUN5jpvu2659QRCewgWaiBlqqq', 1, NULL, 'jorge', 'mendez', NULL, 1, 0, '2023-06-24 17:34:08', NULL),
	(20, 'lrodriguez', '$2y$10$zIbE6fNvi0X4Xqs6Jfi44eWEhUqNpKlJ91183a/QoAbT9EOehFM.G', 1, NULL, 'Lorayne Maritza', 'RodrÃ­guez Manuel', NULL, 2, 3, '2023-06-28 08:40:45', NULL),
	(21, 'lrodriguez', '$2y$10$wmO.w5gBO.c2lX5iPXvc0.ERQQHFwC7oDVcIaaE/AnJ9h3VsknJaW', 1, '', 'Loraine', 'RodrÃ­guez', '', 2, 3, '2023-06-28 08:55:47', '2023-06-28 08:57:39'),
	(22, 'lorayne', '$2y$10$K58Du/GEZ1jMcq67h5pZqezme6hFl2MAaWOKHvPVAUocUJP0ceMMK', 1, '', 'Lorayne Maritza', 'RodrÃ­guez Manuel', '', 2, 0, '2023-06-28 08:58:30', '2023-06-28 09:55:42'),
	(23, 'dtzab', '$2y$10$IMu3vfBN.JisDVhIoDBVyuWkEMKS25JcRtEph9rOHLvi0D8.1SLKy', 1, '', 'dulce', 'tzab', '', 2, 0, '2023-07-01 18:11:35', '2023-07-01 18:13:46'),
	(24, 'aestrella', '$2y$10$7lpA1DVkn9BL4/jlws/6z.e8NzpKL9prd23bb0AJkEJtmZOBP1bQ6', 1, NULL, 'Alan', 'Estrella', NULL, 1, 0, '2023-07-04 15:34:02', NULL),
	(25, 'rmaldonado', '$2y$10$sEprdpHn0afvOnJ81g6uyeXD4V.cnqSt3mlvvqLPmrrOewa6eLPYy', 1, NULL, 'RubÃ­ Nahibi', 'Maldonado Villamil', NULL, 2, 0, '2023-07-04 15:35:41', NULL),
	(26, 'hmartin', '$2y$10$snZzG6Y5Wuyd/elY8.2V6O5V3IkiiDKKMVPfmWROvCSztYGF0SYE6', 1, NULL, 'Hilda', 'Martin', NULL, 2, 0, '2023-07-04 15:40:03', NULL),
	(27, 'ahernandez', '$2y$10$EVpSf/salwhIThEnl5kgOOc6yk/GYFpCPwDcQ4OepeDPrZlkyQ9HK', 1, NULL, 'aaron', 'ahernandez', NULL, 1, 0, '2023-07-22 07:18:38', NULL);

-- Volcando estructura para tabla ecolsur.usuarios_grupos
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

-- Volcando datos para la tabla ecolsur.usuarios_grupos: ~27 rows (aproximadamente)
INSERT INTO `usuarios_grupos` (`usuario_grupo_id`, `usuario_id`, `grupo_id`) VALUES
	(1, 1, 1),
	(2, 2, 2),
	(3, 3, 3),
	(4, 4, 4),
	(5, 5, 5),
	(6, 6, 5),
	(7, 7, 7),
	(8, 8, 7),
	(9, 9, 9),
	(10, 10, 7),
	(11, 11, 7),
	(12, 12, 9),
	(13, 13, 7),
	(14, 14, 3),
	(15, 15, 3),
	(16, 16, 10),
	(17, 17, 10),
	(18, 18, 10),
	(19, 19, 4),
	(20, 20, 3),
	(21, 21, 2),
	(22, 22, 3),
	(23, 23, 11),
	(24, 24, 9),
	(25, 25, 9),
	(26, 26, 9),
	(27, 27, 3);

-- Volcando estructura para procedimiento ecolsur.vigilancia_supervision_index
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

-- Volcando estructura para vista ecolsur.folios_agregados
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `folios_agregados`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `folios_agregados` AS select `m1`.`manifiesto_id` AS `manifiesto_id`,`m1`.`nummanifiesto` AS `nummanifiesto`,`m1`.`fecha` AS `fecha`,`m1`.`unidad_id` AS `unidad_id`,`m1`.`unidad_numero` AS `unidad_numero`,`m1`.`destinofinal_id` AS `destinofinal_id`,`m1`.`destinofinal_nombre` AS `destinofinal_nombre`,count(`m1`.`folio_id`) AS `numfolios`,group_concat(`m1`.`folio_id` separator ',') AS `folio_ids`,group_concat(`m1`.`categoriaProducto_nombre` separator ',') AS `categoriaProducto_nombre`,group_concat(`m1`.`tipoProducto_nombre` separator ',') AS `tipoProducto_nombre`,group_concat(`m1`.`cantidad` separator ',') AS `cantidades`,`m1`.`medida_nombre` AS `medida_nombre`,sum(`m1`.`cantidad`) AS `pesos_totales`,group_concat(`m1`.`descripcion` separator ',') AS `descripciones` from (select `mf`.`manifiesto_id` AS `manifiesto_id`,`m`.`nummanifiesto` AS `nummanifiesto`,`m`.`fecha` AS `fecha`,`u`.`unidad_id` AS `unidad_id`,`u`.`unidad_numero` AS `unidad_numero`,`df`.`destinofinal_id` AS `destinofinal_id`,`df`.`destinofinal_nombre` AS `destinofinal_nombre`,`mf`.`folio_id` AS `folio_id`,`f`.`cantidad` AS `cantidad`,`md`.`medida_nombre` AS `medida_nombre`,`f`.`descripcion` AS `descripcion`,`categorias_producto`.`categoriaProducto_nombre` AS `categoriaProducto_nombre`,`tipo_producto`.`tipoProducto_nombre` AS `tipoProducto_nombre` from (((((((`manifiestos_folios` `mf` join `folios` `f` on((`mf`.`folio_id` = `f`.`folio_id`))) join `manifiestos` `m` on((`mf`.`manifiesto_id` = `m`.`manifiesto_id`))) join `medidas` `md` on((`md`.`medidas_id` = `f`.`medidas_id`))) join `unidades` `u` on((`m`.`manifiesto_id` = `u`.`unidad_id`))) join `destinofinal` `df` on((`m`.`destinofinal_id` = `df`.`destinofinal_id`))) join `tipo_producto` on((`f`.`tipoProducto_id` = `tipo_producto`.`tipoProducto_id`))) join `categorias_producto` on((`tipo_producto`.`tipoProducto_id` = `categorias_producto`.`categoriaProducto_id`)))) `m1` group by `m1`.`manifiesto_id`,`m1`.`nummanifiesto`,`m1`.`medida_nombre`;

-- Volcando estructura para vista ecolsur.num_tripulacion
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `num_tripulacion`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `num_tripulacion` AS select `registros`.`registro_id` AS `registro_id`,count(`recolectores`.`recolector_id`) AS `numrecolectores`,group_concat(`recolectores`.`recolector_id` separator ',') AS `recolector_id`,group_concat(`recolectores`.`recolector_nombre` separator ',') AS `recolectores` from ((`tripulacion` join `recolectores` on((`tripulacion`.`recolector_id` = `recolectores`.`recolector_id`))) join `registros` on((`tripulacion`.`registro_id` = `registros`.`registro_id`))) group by `registros`.`registro_id`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
