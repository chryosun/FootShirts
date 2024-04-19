-- Active: 1713382220716@@193.203.166.107@3306@u966946366_footshirts
CREATE TABLE `equipos` (
  `idEquipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEquipo` varchar(45) NOT NULL,
  `idLiga` int(11) NOT NULL,
  PRIMARY KEY (`idEquipo`),
  KEY `FK_1` (`idLiga`),
  CONSTRAINT `FK_9` FOREIGN KEY (`idLiga`) REFERENCES `ligas` (`idLiga`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci