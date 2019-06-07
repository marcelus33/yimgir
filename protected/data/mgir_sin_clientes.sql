/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mgir

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-04-09 01:49:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `clientes`
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id_clientes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_documentos_identificacion` int(10) unsigned NOT NULL,
  `numero_identificacion` varchar(30) NOT NULL,
  `dv` int(10) unsigned NOT NULL,
  `nombre_razon_social` varchar(250) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_clientes`),
  KEY `clientes_FKIndex1` (`id_documentos_identificacion`),
  KEY `clientes_PKIndex2` (`id_clientes`) USING BTREE,
  KEY `clientes_Index3` (`numero_identificacion`) USING BTREE,
  CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_documentos_identificacion`) REFERENCES `documentos_identificacion` (`id_documentos_identificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clientes
-- ----------------------------

-- ----------------------------
-- Table structure for `comprobantes`
-- ----------------------------
DROP TABLE IF EXISTS `comprobantes`;
CREATE TABLE `comprobantes` (
  `id_comprobantes` int(10) unsigned NOT NULL,
  `id_clientes` int(10) unsigned NOT NULL,
  `id_tipos_comprobantes` int(10) unsigned NOT NULL,
  `id_tipo_registro` int(10) unsigned NOT NULL,
  `id_timbrado` int(10) unsigned DEFAULT NULL,
  `id_misiones_diplomaticas` int(10) unsigned NOT NULL,
  `fecha_expedicion` date NOT NULL,
  `numero_comprobante` varchar(20) NOT NULL,
  `importe_iva_5` int(11) DEFAULT NULL,
  `importe_iva_10` int(10) unsigned DEFAULT NULL,
  `importe_exenta` int(10) unsigned DEFAULT NULL,
  `total_importe` int(10) unsigned NOT NULL,
  `ircp` char(1) DEFAULT NULL,
  `iva_general` char(1) DEFAULT NULL,
  `iva_simplificado` char(1) NOT NULL,
  `cruge_user_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_comprobantes`),
  KEY `comprobantes_FKIndex2` (`id_misiones_diplomaticas`),
  KEY `comprobantes_FKIndex3` (`id_timbrado`),
  KEY `comprobantes_FKIndex4` (`id_tipo_registro`),
  KEY `comprobantes_FKIndex5` (`id_tipos_comprobantes`),
  KEY `comprobantes_FKIndex6` (`id_clientes`),
  KEY `comprobantes_ibfk_6` (`cruge_user_id`),
  CONSTRAINT `comprobantes_ibfk_1` FOREIGN KEY (`id_misiones_diplomaticas`) REFERENCES `misiones_diplomaticas` (`id_misiones_diplomaticas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `comprobantes_ibfk_2` FOREIGN KEY (`id_timbrado`) REFERENCES `timbrados` (`id_timbrado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `comprobantes_ibfk_3` FOREIGN KEY (`id_tipo_registro`) REFERENCES `tipos_registros` (`id_tipo_registro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `comprobantes_ibfk_4` FOREIGN KEY (`id_tipos_comprobantes`) REFERENCES `tipos_comprobantes` (`id_tipos_comprobantes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `comprobantes_ibfk_5` FOREIGN KEY (`id_clientes`) REFERENCES `clientes` (`id_clientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `comprobantes_ibfk_6` FOREIGN KEY (`cruge_user_id`) REFERENCES `cruge_user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comprobantes
-- ----------------------------

-- ----------------------------
-- Table structure for `cruge_authassignment`
-- ----------------------------
DROP TABLE IF EXISTS `cruge_authassignment`;
CREATE TABLE `cruge_authassignment` (
  `userid` int(11) NOT NULL,
  `bizrule` text,
  `data` text,
  `itemname` varchar(64) NOT NULL,
  PRIMARY KEY (`userid`,`itemname`),
  KEY `fk_cruge_authassignment_cruge_authitem1` (`itemname`),
  KEY `fk_cruge_authassignment_user` (`userid`),
  CONSTRAINT `fk_cruge_authassignment_cruge_authitem1` FOREIGN KEY (`itemname`) REFERENCES `cruge_authitem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cruge_authassignment_user` FOREIGN KEY (`userid`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cruge_authassignment
-- ----------------------------

-- ----------------------------
-- Table structure for `cruge_authitem`
-- ----------------------------
DROP TABLE IF EXISTS `cruge_authitem`;
CREATE TABLE `cruge_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cruge_authitem
-- ----------------------------

-- ----------------------------
-- Table structure for `cruge_authitemchild`
-- ----------------------------
DROP TABLE IF EXISTS `cruge_authitemchild`;
CREATE TABLE `cruge_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `crugeauthitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `crugeauthitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cruge_authitemchild
-- ----------------------------

-- ----------------------------
-- Table structure for `cruge_field`
-- ----------------------------
DROP TABLE IF EXISTS `cruge_field`;
CREATE TABLE `cruge_field` (
  `idfield` int(11) NOT NULL AUTO_INCREMENT,
  `fieldname` varchar(20) NOT NULL,
  `longname` varchar(50) DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `required` int(11) DEFAULT '0',
  `fieldtype` int(11) DEFAULT '0',
  `fieldsize` int(11) DEFAULT '20',
  `maxlength` int(11) DEFAULT '45',
  `showinreports` int(11) DEFAULT '0',
  `useregexp` varchar(512) DEFAULT NULL,
  `useregexpmsg` varchar(512) DEFAULT NULL,
  `predetvalue` mediumblob,
  PRIMARY KEY (`idfield`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cruge_field
-- ----------------------------

-- ----------------------------
-- Table structure for `cruge_fieldvalue`
-- ----------------------------
DROP TABLE IF EXISTS `cruge_fieldvalue`;
CREATE TABLE `cruge_fieldvalue` (
  `idfieldvalue` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idfield` int(11) NOT NULL,
  `value` blob,
  PRIMARY KEY (`idfieldvalue`),
  KEY `fk_cruge_fieldvalue_cruge_user1` (`iduser`),
  KEY `fk_cruge_fieldvalue_cruge_field1` (`idfield`),
  CONSTRAINT `fk_cruge_fieldvalue_cruge_field1` FOREIGN KEY (`idfield`) REFERENCES `cruge_field` (`idfield`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_cruge_fieldvalue_cruge_user1` FOREIGN KEY (`iduser`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cruge_fieldvalue
-- ----------------------------

-- ----------------------------
-- Table structure for `cruge_session`
-- ----------------------------
DROP TABLE IF EXISTS `cruge_session`;
CREATE TABLE `cruge_session` (
  `idsession` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `created` bigint(30) DEFAULT NULL,
  `expire` bigint(30) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `ipaddress` varchar(45) DEFAULT NULL,
  `usagecount` int(11) DEFAULT '0',
  `lastusage` bigint(30) DEFAULT NULL,
  `logoutdate` bigint(30) DEFAULT NULL,
  `ipaddressout` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idsession`),
  KEY `crugesession_iduser` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cruge_session
-- ----------------------------
INSERT INTO `cruge_session` VALUES ('1', '1', '1554758227', '1554760027', '1', '::1', '1', '1554758227', null, null);
INSERT INTO `cruge_session` VALUES ('2', '1', '1554764228', '1554766028', '1', '::1', '1', '1554764228', null, null);

-- ----------------------------
-- Table structure for `cruge_system`
-- ----------------------------
DROP TABLE IF EXISTS `cruge_system`;
CREATE TABLE `cruge_system` (
  `idsystem` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `largename` varchar(45) DEFAULT NULL,
  `sessionmaxdurationmins` int(11) DEFAULT '30',
  `sessionmaxsameipconnections` int(11) DEFAULT '10',
  `sessionreusesessions` int(11) DEFAULT '1' COMMENT '1yes 0no',
  `sessionmaxsessionsperday` int(11) DEFAULT '-1',
  `sessionmaxsessionsperuser` int(11) DEFAULT '-1',
  `systemnonewsessions` int(11) DEFAULT '0' COMMENT '1yes 0no',
  `systemdown` int(11) DEFAULT '0',
  `registerusingcaptcha` int(11) DEFAULT '0',
  `registerusingterms` int(11) DEFAULT '0',
  `terms` blob,
  `registerusingactivation` int(11) DEFAULT '1',
  `defaultroleforregistration` varchar(64) DEFAULT NULL,
  `registerusingtermslabel` varchar(100) DEFAULT NULL,
  `registrationonlogin` int(11) DEFAULT '1',
  PRIMARY KEY (`idsystem`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cruge_system
-- ----------------------------
INSERT INTO `cruge_system` VALUES ('1', 'default', null, '30', '10', '1', '-1', '-1', '0', '0', '0', '0', '', '0', '', '', '1');

-- ----------------------------
-- Table structure for `cruge_user`
-- ----------------------------
DROP TABLE IF EXISTS `cruge_user`;
CREATE TABLE `cruge_user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `regdate` bigint(30) DEFAULT NULL,
  `actdate` bigint(30) DEFAULT NULL,
  `logondate` bigint(30) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL COMMENT 'Hashed password',
  `authkey` varchar(100) DEFAULT NULL COMMENT 'llave de autentificacion',
  `state` int(11) DEFAULT '0',
  `totalsessioncounter` int(11) DEFAULT '0',
  `currentsessioncounter` int(11) DEFAULT '0',
  `numero_identificacion_irpc` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cruge_user
-- ----------------------------
INSERT INTO `cruge_user` VALUES ('1', null, null, '1554764228', 'admin', 'admin@tucorreo.com', '21232f297a57a5a743894a0e4a801fc3', null, '1', '0', '0', null);
INSERT INTO `cruge_user` VALUES ('2', null, null, null, 'invitado', 'invitado', 'nopassword', null, '1', '0', '0', null);
INSERT INTO `cruge_user` VALUES ('10', '0', '0', '0', 'usuario3', 'curu@curu.com', 'e10adc3949ba59abbe56e057f20f883e', '', '0', '0', '0', '1529702');

-- ----------------------------
-- Table structure for `documentos_identificacion`
-- ----------------------------
DROP TABLE IF EXISTS `documentos_identificacion`;
CREATE TABLE `documentos_identificacion` (
  `id_documentos_identificacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `documento_identificacion` varchar(30) NOT NULL,
  PRIMARY KEY (`id_documentos_identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of documentos_identificacion
-- ----------------------------
INSERT INTO `documentos_identificacion` VALUES ('1', 'RUC');
INSERT INTO `documentos_identificacion` VALUES ('2', 'CEDULA');
INSERT INTO `documentos_identificacion` VALUES ('3', 'PASAPORTE');
INSERT INTO `documentos_identificacion` VALUES ('4', 'CEDULA EXTRANJERO');
INSERT INTO `documentos_identificacion` VALUES ('5', 'SIN NOMBRE');
INSERT INTO `documentos_identificacion` VALUES ('6', 'DIPLOMATICO');

-- ----------------------------
-- Table structure for `misiones_diplomaticas`
-- ----------------------------
DROP TABLE IF EXISTS `misiones_diplomaticas`;
CREATE TABLE `misiones_diplomaticas` (
  `id_misiones_diplomaticas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mision_diplomatica` varchar(100) NOT NULL,
  PRIMARY KEY (`id_misiones_diplomaticas`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of misiones_diplomaticas
-- ----------------------------
INSERT INTO `misiones_diplomaticas` VALUES ('1', 'ORGANIZACIÓN PANAMERICANA DE LA SALUD');
INSERT INTO `misiones_diplomaticas` VALUES ('2', 'ORGANIZACIÓN DE LOS ESTADOS AMERICANOS');
INSERT INTO `misiones_diplomaticas` VALUES ('3', 'BANCO INTERAMERICANO DE DESARROLLO');
INSERT INTO `misiones_diplomaticas` VALUES ('4', 'CORPORACION ANDINA DE FOMENTO');
INSERT INTO `misiones_diplomaticas` VALUES ('5', 'FONDO DE LAS NACIONES UNIDAS PARA LA INFANCIA (UNICEF)');
INSERT INTO `misiones_diplomaticas` VALUES ('6', 'ORGANIZACION DE LAS NACIONES UNIDAS PARA LA ALIMENTACION Y LA AGRICULTURA');
INSERT INTO `misiones_diplomaticas` VALUES ('7', 'OFICINA CONSULAR DEL JAPON');
INSERT INTO `misiones_diplomaticas` VALUES ('8', 'BANCO MUNDIAL');
INSERT INTO `misiones_diplomaticas` VALUES ('9', 'FONDO MONETARIO INTERNACIONAL');
INSERT INTO `misiones_diplomaticas` VALUES ('10', 'EMBAJADA DE LOS ESTADOS UNIDOS DE AMERICA');
INSERT INTO `misiones_diplomaticas` VALUES ('11', 'EMBAJADA DE BOLIVIA');
INSERT INTO `misiones_diplomaticas` VALUES ('12', 'EMBAJADA DEL PARAGUAY EN EL EXTERIOR');
INSERT INTO `misiones_diplomaticas` VALUES ('13', 'EMBAJADA DE URUGUAY');
INSERT INTO `misiones_diplomaticas` VALUES ('14', 'EMBAJADA DEL LIBANO');
INSERT INTO `misiones_diplomaticas` VALUES ('15', 'EMBAJADA DE LA RCA. FEDERATIVA DEL BRASIL');
INSERT INTO `misiones_diplomaticas` VALUES ('16', 'EMBAJADA DE ITALIA');
INSERT INTO `misiones_diplomaticas` VALUES ('17', 'EMBAJADA DE LA RCA. ARGENTINA');
INSERT INTO `misiones_diplomaticas` VALUES ('18', 'EMBAJADA DE JAPON');
INSERT INTO `misiones_diplomaticas` VALUES ('19', 'EMBAJADA DE LA RCA. FEDERAL DE ALEMANIA');
INSERT INTO `misiones_diplomaticas` VALUES ('20', 'EMBAJADA DE LA RCA. CHINA (TAIWAN)');
INSERT INTO `misiones_diplomaticas` VALUES ('21', 'EMBAJADA DE LA RCA. DE COREA');
INSERT INTO `misiones_diplomaticas` VALUES ('22', 'EMBAJADA DE SUIZA');
INSERT INTO `misiones_diplomaticas` VALUES ('23', 'EMBAJADA DE FRANCIA');
INSERT INTO `misiones_diplomaticas` VALUES ('24', 'EMBAJADA DEL ESTADO DE ISRAEL');
INSERT INTO `misiones_diplomaticas` VALUES ('25', 'ORGANIZACION METEOROLOGICA MUNDIAL');
INSERT INTO `misiones_diplomaticas` VALUES ('26', 'EMBAJADA DE LA SOBERANA ORDEN DE MALTA');
INSERT INTO `misiones_diplomaticas` VALUES ('27', 'EMBAJADA DE LA REPUBLICA DE CHILE');
INSERT INTO `misiones_diplomaticas` VALUES ('28', 'EMBAJADA DE LA REPUBLICA DE COLOMBIA');
INSERT INTO `misiones_diplomaticas` VALUES ('29', 'EMBAJADA DE LA REPUBLICA DE L ECUADOR');
INSERT INTO `misiones_diplomaticas` VALUES ('30', 'EMBAJADA DE LOS ESTADOS UNIDOS DE AMERICA (CUERPO DE PAZ)');
INSERT INTO `misiones_diplomaticas` VALUES ('31', 'EMBAJADA DE LA REPUBLICA DE PANAMA');
INSERT INTO `misiones_diplomaticas` VALUES ('32', 'EMBAJADA DE LA REPUBLICA DE PERU');
INSERT INTO `misiones_diplomaticas` VALUES ('33', 'EMBAJADA DE QATAR');
INSERT INTO `misiones_diplomaticas` VALUES ('34', 'EMBAJADA DE LA UNION EUROPEA');
INSERT INTO `misiones_diplomaticas` VALUES ('35', 'EMBAJADA DE LA REPUBLICA BOLIVARIANA DE VENEZUELA');
INSERT INTO `misiones_diplomaticas` VALUES ('36', 'EMBAJADA DE LA FEDERACION DE RUSIA');
INSERT INTO `misiones_diplomaticas` VALUES ('37', 'PROGRAMAS DE LAS NACIONES UNIDAS PARA EL DESARROLLO (PNUD)');
INSERT INTO `misiones_diplomaticas` VALUES ('38', 'EMBAJADA DEL REINO DE ESPAÑA');
INSERT INTO `misiones_diplomaticas` VALUES ('39', 'REINO UNIDO DE GRAN BRETAÑA E IRLANDA DEL NORTE');
INSERT INTO `misiones_diplomaticas` VALUES ('40', 'EMBAJADA DE LOS ESTADOS UNIDOS MEXICANOS');
INSERT INTO `misiones_diplomaticas` VALUES ('41', 'EMBAJADA DE LA SANTA SEDE (VATICANO)');
INSERT INTO `misiones_diplomaticas` VALUES ('42', 'EMBAJADA DEL REINO DE MARRUECOS');
INSERT INTO `misiones_diplomaticas` VALUES ('43', 'EMBAJADA DE COSTA RICA');
INSERT INTO `misiones_diplomaticas` VALUES ('44', 'EMBAJADA DE LA REPUBLICA DOMINICANA');

-- ----------------------------
-- Table structure for `timbrados`
-- ----------------------------
DROP TABLE IF EXISTS `timbrados`;
CREATE TABLE `timbrados` (
  `id_timbrado` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_clientes` int(10) unsigned NOT NULL,
  `numero_timbrado` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_timbrado`),
  KEY `timbrados_FKIndex1` (`id_clientes`),
  KEY `timbrados_PKIndex2` (`id_timbrado`) USING BTREE,
  CONSTRAINT `timbrados_ibfk_1` FOREIGN KEY (`id_clientes`) REFERENCES `clientes` (`id_clientes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of timbrados
-- ----------------------------

-- ----------------------------
-- Table structure for `tipos_comprobantes`
-- ----------------------------
DROP TABLE IF EXISTS `tipos_comprobantes`;
CREATE TABLE `tipos_comprobantes` (
  `id_tipos_comprobantes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_tipos_registros_tc` int(10) unsigned NOT NULL,
  `tipo_comprobante` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipos_comprobantes`),
  KEY `tipos_comprobantes_FKIndex1` (`id_tipos_registros_tc`),
  KEY `tipos_comprobantes_PKIndex2` (`id_tipos_comprobantes`) USING BTREE,
  CONSTRAINT `tipos_comprobantes_ibfk_1` FOREIGN KEY (`id_tipos_registros_tc`) REFERENCES `tipos_registros_tc` (`id_tipos_registros_tc`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipos_comprobantes
-- ----------------------------
INSERT INTO `tipos_comprobantes` VALUES ('1', '3', 'FACTURA');
INSERT INTO `tipos_comprobantes` VALUES ('2', '3', 'BOLETA DE VENTA');
INSERT INTO `tipos_comprobantes` VALUES ('3', '3', 'NOTA DE DEBITO');
INSERT INTO `tipos_comprobantes` VALUES ('4', '3', 'NOTA DE CREDITO');
INSERT INTO `tipos_comprobantes` VALUES ('5', '3', 'TICKET (MAQUINA REGISTRADORA)');
INSERT INTO `tipos_comprobantes` VALUES ('6', '1', 'AUTOFACTURA');
INSERT INTO `tipos_comprobantes` VALUES ('7', '1', 'TICKET DE TRANSPORTE AEREO');
INSERT INTO `tipos_comprobantes` VALUES ('8', '1', 'BOLETA DE TRANSPORTE PUBLICO DE PASAJEROS');
INSERT INTO `tipos_comprobantes` VALUES ('10', '1', 'COMPROBANTE DE INGRESO DE ENTIDADES PUBLICAS');

-- ----------------------------
-- Table structure for `tipos_registros`
-- ----------------------------
DROP TABLE IF EXISTS `tipos_registros`;
CREATE TABLE `tipos_registros` (
  `id_tipo_registro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_registro` varchar(10) NOT NULL,
  PRIMARY KEY (`id_tipo_registro`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipos_registros
-- ----------------------------
INSERT INTO `tipos_registros` VALUES ('1', 'COMPRA');
INSERT INTO `tipos_registros` VALUES ('2', 'VENTA');

-- ----------------------------
-- Table structure for `tipos_registros_tc`
-- ----------------------------
DROP TABLE IF EXISTS `tipos_registros_tc`;
CREATE TABLE `tipos_registros_tc` (
  `id_tipos_registros_tc` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_registro_tc` varchar(15) NOT NULL,
  PRIMARY KEY (`id_tipos_registros_tc`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipos_registros_tc
-- ----------------------------
INSERT INTO `tipos_registros_tc` VALUES ('1', 'COMPRA');
INSERT INTO `tipos_registros_tc` VALUES ('2', 'VENTA');
INSERT INTO `tipos_registros_tc` VALUES ('3', 'COMPRA/VENTA');
