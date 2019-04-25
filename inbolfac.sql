/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.5.24-log : Database - inbolfac
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inbolfac` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `inbolfac`;

/*Table structure for table `factura` */

DROP TABLE IF EXISTS `factura`;

CREATE TABLE `factura` (
  `VDOCUM` varchar(8) DEFAULT NULL,
  `VDOCUMA` varchar(9) NOT NULL DEFAULT '',
  `VFECHA` date DEFAULT NULL,
  `VNOMBRE` varchar(120) DEFAULT NULL,
  `VRUC` varchar(17) DEFAULT NULL,
  `VCAJA` char(2) DEFAULT NULL,
  `VFACTURA` varchar(20) DEFAULT NULL,
  `VORDEN` varchar(15) DEFAULT NULL,
  `VPEDIDO` varchar(8) DEFAULT NULL,
  `VTRANS` char(1) DEFAULT NULL,
  `VTC` double DEFAULT NULL,
  `VMONEDA` smallint(6) DEFAULT NULL,
  `VANULADA` char(1) DEFAULT NULL,
  `VUSUARIO` varchar(15) DEFAULT NULL,
  `AGECODIGO` char(3) DEFAULT NULL,
  `CLICODIGO` varchar(8) DEFAULT NULL,
  `DESCODIGO` varchar(8) DEFAULT NULL,
  `VENCODIGO` varchar(8) DEFAULT NULL,
  `VDESCUENTOS` double DEFAULT NULL,
  `VTIPRE` smallint(6) DEFAULT NULL,
  `VGLOSA` varchar(100) DEFAULT NULL,
  `PROFORMA` varchar(8) DEFAULT NULL,
  `VDIAS` int(11) DEFAULT NULL,
  `VENCIMIENTO` date DEFAULT NULL,
  `TOTALFAC` double DEFAULT NULL,
  `ICE` double DEFAULT NULL,
  `DESCUENTOS` double DEFAULT NULL,
  `OTROS` double DEFAULT NULL,
  `TOTALLIT` varchar(120) DEFAULT NULL,
  `XENTREGAR` char(1) DEFAULT NULL,
  `VMARCA` char(1) DEFAULT NULL,
  `DESC1` double DEFAULT NULL,
  `DESC2` double DEFAULT NULL,
  `DESC3` double DEFAULT NULL,
  `DESC4` double DEFAULT NULL,
  `HORAGRA` varchar(12) DEFAULT NULL,
  `FECHAGRA` date DEFAULT NULL,
  `NO_AUTO` varchar(20) DEFAULT NULL,
  `LLAVE_DOS` varchar(100) DEFAULT NULL,
  `FECHA_LIMITE` date DEFAULT NULL,
  `NO_CONTROL` varchar(15) DEFAULT NULL,
  `NO_CUENTA` varchar(8) DEFAULT NULL,
  `IDCITA` double DEFAULT NULL,
  `TIPO_PAGO` varchar(2) DEFAULT NULL,
  `TIPO_TARJETA` varchar(12) DEFAULT NULL,
  `BANCO` varchar(12) DEFAULT NULL,
  `BANCO_DCTO` varchar(12) DEFAULT NULL,
  `ENTREGADOBS` double DEFAULT NULL,
  `ENTREGADOUS` double DEFAULT NULL,
  `CAMBIO` double DEFAULT NULL,
  `NLOTE` varchar(12) DEFAULT NULL,
  `FACTURAEXP` char(1) DEFAULT NULL,
  `TASACERO` char(1) DEFAULT NULL,
  `HOJA` double DEFAULT NULL,
  `ANEXO1` varchar(50) DEFAULT NULL,
  `ANEXO2` varchar(50) DEFAULT NULL,
  `ANEXO3` varchar(50) DEFAULT NULL,
  `ANEXO4` varchar(50) DEFAULT NULL,
  `DESPACHO` char(1) DEFAULT NULL,
  `DESPACHOHORA` varchar(12) DEFAULT NULL,
  `ATCBS` double DEFAULT '0',
  `ATCUS` double DEFAULT '0',
  `TOTALCOBRADO` double DEFAULT '0',
  `NITTIPO` char(2) DEFAULT '',
  `ICEADICIONAL` double DEFAULT '0',
  PRIMARY KEY (`VDOCUMA`),
  KEY `NewIndex` (`VDOCUM`),
  KEY `NewIndex2` (`CLICODIGO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `factura` */

/*Table structure for table `factura_detalle` */

DROP TABLE IF EXISTS `factura_detalle`;

CREATE TABLE `factura_detalle` (
  `VDOCUM` varchar(8) DEFAULT NULL,
  `VDOCUMA` varchar(9) DEFAULT NULL,
  `AGECODIGO` char(3) DEFAULT NULL,
  `CLICODIGO` varchar(8) DEFAULT NULL,
  `VENCODIGO` varchar(8) DEFAULT NULL,
  `DESCODIGO` varchar(8) DEFAULT NULL,
  `VFECHA` date DEFAULT NULL,
  `VTC` double DEFAULT NULL,
  `VCAJA` char(2) DEFAULT NULL,
  `VMONEDA` smallint(6) DEFAULT NULL,
  `CODIGO` varchar(20) DEFAULT NULL,
  `VCANTIDAD` double DEFAULT NULL,
  `VCANTIDADP` double DEFAULT NULL,
  `VPREUNIL` double DEFAULT NULL,
  `VDESCUENTO` double DEFAULT NULL,
  `VPREUNI` double DEFAULT NULL,
  `VPESO` double DEFAULT NULL,
  `COSTOMN` double DEFAULT NULL,
  `COSTOME` double DEFAULT NULL,
  `VTIPRE` smallint(6) DEFAULT NULL,
  `XENTREGAR` char(1) DEFAULT NULL,
  `VMARCA` char(1) DEFAULT NULL,
  `CLOTE` varchar(12) DEFAULT NULL,
  `ORDEN` double NOT NULL AUTO_INCREMENT,
  `VTRANS` char(1) DEFAULT NULL,
  `VCANTIDAD1` double DEFAULT NULL,
  `ICE` double DEFAULT NULL,
  `TOTAL` double DEFAULT NULL,
  `ANEXO` varchar(120) DEFAULT NULL,
  `DESPACHO` char(1) DEFAULT NULL,
  `PROFORMA` varchar(8) DEFAULT NULL,
  `DESCUENTOCOL` double DEFAULT '0',
  PRIMARY KEY (`ORDEN`),
  KEY `NewIndex` (`VDOCUM`),
  KEY `NewIndex1` (`VDOCUMA`),
  KEY `NewIndex2` (`CLICODIGO`),
  KEY `NewIndex3` (`CODIGO`)
) ENGINE=MyISAM AUTO_INCREMENT=9605953 DEFAULT CHARSET=latin1;

/*Data for the table `factura_detalle` */

/*Table structure for table `medicamentos` */

DROP TABLE IF EXISTS `medicamentos`;

CREATE TABLE `medicamentos` (
  `codigo` varchar(7) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio_compra` int(11) NOT NULL,
  `precio_venta` int(11) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`codigo`),
  KEY `created_user` (`created_user`),
  KEY `updated_user` (`updated_user`),
  CONSTRAINT `medicamentos_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `medicamentos_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `medicamentos` */

insert  into `medicamentos`(`codigo`,`nombre`,`precio_compra`,`precio_venta`,`unidad`,`stock`,`created_user`,`created_date`,`updated_user`,`updated_date`) values ('B000362','Dulvanex',50,75,'cajas',10,1,'2017-07-24 12:43:20',1,'2017-07-25 22:09:06'),('B000363','Controlip',12,50,'cajas',10,1,'2017-07-24 12:56:58',1,'2017-07-25 22:09:28'),('B000364','Quetiazic',25,50,'cajas',30,1,'2017-07-24 22:59:48',1,'2017-07-25 22:09:36'),('B000365','cotrimoxaxol',111,11,'botellas',0,1,'2019-03-25 21:39:08',1,'0000-00-00 00:00:00'),('B000366','triapen',22,2,'cajas',0,1,'2019-03-25 21:39:24',1,'0000-00-00 00:00:00'),('B000367','dexametazona',12323,33,'tubo',0,1,'2019-03-25 21:39:41',1,'0000-00-00 00:00:00'),('B000368','migradioxadol',333,3,'raya',0,1,'2019-03-25 21:39:56',1,'0000-00-00 00:00:00'),('B000369','cefotaxima',3334,3,'caja',0,1,'2019-03-25 21:40:18',1,'0000-00-00 00:00:00'),('B000370','chaquitap',22,2,'botellas',0,1,'2019-03-25 21:40:34',1,'0000-00-00 00:00:00'),('B000371','alcazerzer',3321,12,'cajas',134,1,'2019-03-25 21:45:36',1,'0000-00-00 00:00:00'),('B000372','alcohol',22,12,'botellas',0,1,'2019-03-25 21:41:05',1,'0000-00-00 00:00:00'),('B000373','pantera',33,12,'cajas',0,1,'2019-03-25 21:41:34',1,'0000-00-00 00:00:00');

/*Table structure for table `transaccion_medicamentos` */

DROP TABLE IF EXISTS `transaccion_medicamentos`;

CREATE TABLE `transaccion_medicamentos` (
  `codigo_transaccion` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `codigo` varchar(7) NOT NULL,
  `numero` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo_transaccion` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo_transaccion`),
  KEY `id_barang` (`codigo`),
  KEY `created_user` (`created_user`),
  CONSTRAINT `transaccion_medicamentos_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `medicamentos` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaccion_medicamentos_ibfk_2` FOREIGN KEY (`created_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transaccion_medicamentos` */

insert  into `transaccion_medicamentos`(`codigo_transaccion`,`fecha`,`codigo`,`numero`,`created_user`,`created_date`,`tipo_transaccion`) values ('TM-2017-0000001','2017-07-26','B000362',5,1,'2017-07-25 22:09:06','Entrada'),('TM-2017-0000002','2017-07-26','B000363',10,1,'2017-07-25 22:09:28','Entrada'),('TM-2017-0000003','2017-07-26','B000364',5,1,'2017-07-25 22:09:36','Salida'),('TM-2019-0000004','2019-03-26','B000371',12,1,'2019-03-25 21:45:17','Entrada'),('TM-2019-0000005','2019-03-26','B000371',122,1,'2019-03-25 21:45:36','Entrada');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `permisos_acceso` enum('Super Admin','Gerente','Almacen') NOT NULL,
  `status` enum('activo','bloqueado') NOT NULL DEFAULT 'activo',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_user`),
  KEY `level` (`permisos_acceso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_user`,`username`,`name_user`,`password`,`email`,`telefono`,`foto`,`permisos_acceso`,`status`,`created_at`,`updated_at`) values (1,'admin','Sistemas Webs','21232f297a57a5a743894a0e4a801fc3','info@sist.com','7025','user-default.png','Super Admin','activo','2017-04-01 04:15:15','2017-07-25 19:35:23'),(2,'juan','juan','a94652aa97c7211ba8954dd15a3cf838','juab@juan.com','12000',NULL,'Almacen','activo','2017-07-25 18:34:03','2017-07-25 18:42:00'),(3,'jhonny','Don Jhonny','81dc9bdb52d04dc20036dbd8313ed055','','',NULL,'Almacen','activo','2019-03-27 22:16:05','0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
