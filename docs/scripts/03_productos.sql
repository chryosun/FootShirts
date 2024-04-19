-- Active: 1713382220716@@193.203.166.107@3306@u966946366_footshirts
CREATE TABLE `productos` (
  `idProducto` varchar(20) NOT NULL,
  `nombreProducto` varchar(45) NOT NULL,
  `precioProducto` double NOT NULL,
  `idEquipo` int(11) NOT NULL,
  `existenciasProducto` int(11) NOT NULL,
  `estado` varchar(3) NOT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `FK_1` (`idEquipo`),
  CONSTRAINT `FK_9_1` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`idEquipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci