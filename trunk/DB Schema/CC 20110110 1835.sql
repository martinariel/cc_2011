-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.8-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema cc
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ cc;
USE cc;

--
-- Table structure for table `cc`.`agencias`
--

DROP TABLE IF EXISTS `agencias`;
CREATE TABLE `agencias` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc`.`agencias`
--

/*!40000 ALTER TABLE `agencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `agencias` ENABLE KEYS */;


--
-- Table structure for table `cc`.`castings`
--

DROP TABLE IF EXISTS `castings`;
CREATE TABLE `castings` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL DEFAULT '',
  `ANIO` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc`.`castings`
--

/*!40000 ALTER TABLE `castings` DISABLE KEYS */;
/*!40000 ALTER TABLE `castings` ENABLE KEYS */;


--
-- Table structure for table `cc`.`codigos_casting`
--

DROP TABLE IF EXISTS `codigos_casting`;
CREATE TABLE `codigos_casting` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc`.`codigos_casting`
--

/*!40000 ALTER TABLE `codigos_casting` DISABLE KEYS */;
/*!40000 ALTER TABLE `codigos_casting` ENABLE KEYS */;


--
-- Table structure for table `cc`.`media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ARCHIVO` varchar(45) NOT NULL DEFAULT '',
  `TIPO` varchar(45) NOT NULL DEFAULT '',
  `ID_PERSONA` int(10) unsigned NOT NULL DEFAULT '0',
  `ID_SCOUTING` int(10) unsigned DEFAULT NULL,
  `ID_CASTING` int(10) unsigned DEFAULT NULL,
  `ORDEN` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc`.`media`
--

/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;


--
-- Table structure for table `cc`.`personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE `personas` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(100) NOT NULL DEFAULT '',
  `FECHA_NACIMIENTO` date NOT NULL DEFAULT '0000-00-00',
  `PESO` int(10) unsigned NOT NULL DEFAULT '0',
  `ALTURA` int(10) unsigned NOT NULL DEFAULT '0',
  `FOTO_PRINCIPAL` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc`.`personas`
--

/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;


--
-- Table structure for table `cc`.`scout_import`
--

DROP TABLE IF EXISTS `scout_import`;
CREATE TABLE `scout_import` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CODIGO` int(10) unsigned NOT NULL DEFAULT '0',
  `EDAD` int(11) DEFAULT NULL,
  `PESO` int(11) DEFAULT NULL,
  `ALTURA` int(11) DEFAULT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `FECHA_NACIMIENTO` varchar(12) DEFAULT NULL,
  `FECHA_SCOUT` varchar(12) DEFAULT NULL,
  `LUGAR_SCOUT` varchar(45) DEFAULT NULL,
  `OBSERVACIONES` varchar(255) DEFAULT NULL,
  `ACTIVIDADES` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `TELEFONO` varchar(45) DEFAULT NULL,
  `CELULAR` varchar(45) DEFAULT NULL,
  `NACIONALIDAD` varchar(45) DEFAULT NULL,
  `IDIOMAS` varchar(255) DEFAULT NULL,
  `XLS_FILE` varchar(255) NOT NULL DEFAULT '',
  `ANIO` int(10) unsigned NOT NULL DEFAULT '0',
  `MES` varchar(20) NOT NULL DEFAULT '',
  `CODIGO_AGRUPADOR` varchar(45) NOT NULL DEFAULT '',
  `DIA` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc`.`scout_import`
--

/*!40000 ALTER TABLE `scout_import` DISABLE KEYS */;
/*!40000 ALTER TABLE `scout_import` ENABLE KEYS */;


--
-- Table structure for table `cc`.`scoutings`
--

DROP TABLE IF EXISTS `scoutings`;
CREATE TABLE `scoutings` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ANIO` int(10) unsigned NOT NULL DEFAULT '0',
  `ID_CODIGO` int(10) unsigned NOT NULL DEFAULT '0',
  `MES` int(10) unsigned NOT NULL DEFAULT '0',
  `DIA_CONTADOR` int(10) unsigned NOT NULL DEFAULT '0',
  `FECHA` date DEFAULT NULL,
  `ID_PERSONA` int(10) unsigned NOT NULL DEFAULT '0',
  `TELEFONO` varchar(45) NOT NULL DEFAULT '',
  `CELULAR` varchar(45) NOT NULL DEFAULT '',
  `PESO` int(10) unsigned NOT NULL DEFAULT '0',
  `ALTURA` int(10) unsigned NOT NULL DEFAULT '0',
  `NOMBRE_ARCHIVO_XLS` varchar(45) NOT NULL DEFAULT '',
  `OBSERVACIONES` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc`.`scoutings`
--

/*!40000 ALTER TABLE `scoutings` DISABLE KEYS */;
/*!40000 ALTER TABLE `scoutings` ENABLE KEYS */;


--
-- Table structure for table `cc`.`sinonimos`
--

DROP TABLE IF EXISTS `sinonimos`;
CREATE TABLE `sinonimos` (
  `ORIGEN` varchar(50) NOT NULL DEFAULT '',
  `DESTINO` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cc`.`sinonimos`
--

/*!40000 ALTER TABLE `sinonimos` DISABLE KEYS */;
INSERT INTO `sinonimos` (`ORIGEN`,`DESTINO`) VALUES 
 ('ALLTURA','HEIGHT'),
 ('ALT','HEIGHT'),
 ('ALT.','HEIGHT'),
 ('ALTURA','HEIGHT'),
 ('CEL','CELPHONE'),
 ('CELU','CELPHONE'),
 ('CELULAR','CELPHONE'),
 ('CODIGO','CODE'),
 ('CóDIGO','CODE'),
 ('DIA DE SCOUT','DATE'),
 ('DICIPLINA','ACTIVITIES'),
 ('DISCIPLINAS, DEPORTES','ACTIVITIES'),
 ('DISCIPLINAS, DEPORTES, ETC.','ACTIVITIES'),
 ('DISCIPLINAS, DEPORTES, INSTRUMENTOS','ACTIVITIES'),
 ('DISCIPLINAS, DEPORTES, INSTRUMENTOS, ETC.','ACTIVITIES'),
 ('E MAIL','EMAIL'),
 ('E-MAIL','EMAIL'),
 ('EDAD','AGE'),
 ('EMAIL','EMAIL'),
 ('FECHA','DATE'),
 ('FECHA DE NAC','BORNDATE'),
 ('FECHA DE NAC.','BORNDATE'),
 ('FECHA DE NACIMIENTO','BORNDATE'),
 ('FECHA DE SCOUT','DATE'),
 ('FECHA DE SCOUTING','DATE'),
 ('FECHA NAC','BORNDATE'),
 ('FECHA NAC.','BORNDATE'),
 ('FECHA SCOUT','DATE'),
 ('FECHA SCOUTING','DATE'),
 ('FECHS DE SCOUT','DATE'),
 ('IDIOMAS','LANGUAGES'),
 ('LUBAR DE SCOUT','PLACE'),
 ('LUGAR DE SCOUT','PLACE'),
 ('LUGAR DE SCOUTING','PLACE'),
 ('LUGAR SCOUR','PLACE');
INSERT INTO `sinonimos` (`ORIGEN`,`DESTINO`) VALUES 
 ('LUGAR SCOUT','PLACE'),
 ('LUGAR SCOUT.','PLACE'),
 ('LUGAR SCOUTING','PLACE'),
 ('MAIL','EMAIL'),
 ('MOVI','CELPHONE'),
 ('MOVIL','CELPHONE'),
 ('MOVIL.','CELPHONE'),
 ('NACIONALIDAD','NACIONALITY'),
 ('NOMBRE','NAME'),
 ('NOMBRE Y APELLIDO','NAME'),
 ('NOMBRE Y APRELLIDO','NAME'),
 ('NRO','CODE'),
 ('Nª','CODE'),
 ('Nº','CODE'),
 ('NúMERO','CODE'),
 ('OBS','OBSERVATIONS'),
 ('OBS.','OBSERVATIONS'),
 ('OBSERVACIONES','OBSERVATIONS'),
 ('OBSERVACIóN','OBSERVATIONS'),
 ('PESO','WEIGHT'),
 ('PESO.','WEIGHT'),
 ('TEL','TELEPHONE'),
 ('TEL.','TELEPHONE'),
 ('TELEFONO','TELEPHONE'),
 ('TELéFONO','TELEPHONE');
/*!40000 ALTER TABLE `sinonimos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
