-- MySQL dump 10.13  Distrib 5.5.25a, for Linux (i686)
--
-- Host: localhost    Database: crm_movil
-- ------------------------------------------------------
-- Server version	5.5.25a

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `crm_movil`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `crm_movil` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `crm_movil`;

--
-- Table structure for table `calendario`
--

DROP TABLE IF EXISTS `calendario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calendario` (
  `idCliente` int(11) NOT NULL,
  `idVendedor` int(11) NOT NULL,
  `descripcionVisita` text,
  `fecha_visita` date DEFAULT NULL,
  `descripcion_cobro` text,
  `fecha_cobro` date DEFAULT NULL,
  `descripcion_tarea` text,
  `fecha_tarea` date DEFAULT NULL,
  `descripcion_fechasComerciales` text,
  `fecha_fechasComerciales` date DEFAULT NULL,
  `descripcion_celebraciones` text,
  `fecha_celebraciones` date DEFAULT NULL,
  `descripcion_eventos` text,
  `fecha_eventos` date DEFAULT NULL,
  PRIMARY KEY (`idCliente`,`idVendedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendario`
--

LOCK TABLES `calendario` WRITE;
/*!40000 ALTER TABLE `calendario` DISABLE KEYS */;
/*!40000 ALTER TABLE `calendario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `canales`
--

DROP TABLE IF EXISTS `canales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `canales` (
  `idCanal` int(11) NOT NULL,
  `DescCanal` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCanal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `canales`
--

LOCK TABLES `canales` WRITE;
/*!40000 ALTER TABLE `canales` DISABLE KEYS */;
INSERT INTO `canales` VALUES (1,'canal1');
/*!40000 ALTER TABLE `canales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `DescCategoria` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'categoria1');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudad` (
  `idCiudad` int(11) NOT NULL,
  `Ciudad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCiudad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
INSERT INTO `ciudad` VALUES (1,'ciudad1');
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `NIT` varchar(50) DEFAULT NULL,
  `RazonSocial` varchar(50) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Celular` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `idCuenta` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `fk_clientes_idCuenta_idx` (`idCuenta`),
  CONSTRAINT `fk_clientes_idCuenta` FOREIGN KEY (`idCuenta`) REFERENCES `cuentas` (`idCuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'1010','razonsocial','juanito','garcia','3215561','3108976543','cra 90 sur',1),(2,'1015','razonsocial1015','alberto','mendez','65899924','6208965523','direc',1);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colores`
--

DROP TABLE IF EXISTS `colores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colores` (
  `idColor` varchar(3) NOT NULL,
  `DescColor` varchar(50) NOT NULL,
  PRIMARY KEY (`idColor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colores`
--

LOCK TABLES `colores` WRITE;
/*!40000 ALTER TABLE `colores` DISABLE KEYS */;
INSERT INTO `colores` VALUES ('000','surtido'),('002','blanco estampado'),('003','berenjena'),('005','blanco estampado verde'),('010','fuscia estampado'),('011','azul claro estampado');
/*!40000 ALTER TABLE `colores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactos`
--

DROP TABLE IF EXISTS `contactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactos` (
  `idContacto` int(11) NOT NULL,
  `Nombres` varchar(50) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `Telefono` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Celular` varchar(15) DEFAULT NULL,
  `Cargo` varchar(30) DEFAULT NULL,
  `Cumpleanos` date DEFAULT NULL,
  PRIMARY KEY (`idContacto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactos`
--

LOCK TABLES `contactos` WRITE;
/*!40000 ALTER TABLE `contactos` DISABLE KEYS */;
INSERT INTO `contactos` VALUES (1,'dede','dede','dede','deqe','deed','dee','0000-00-00'),(2,'dede','dede','dede','deqe','deed','dee','0000-00-00');
/*!40000 ALTER TABLE `contactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuentas` (
  `idCuenta` int(11) NOT NULL,
  `NIT/RUT` varchar(45) DEFAULT NULL,
  `DescCuenta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas`
--

LOCK TABLES `cuentas` WRITE;
/*!40000 ALTER TABLE `cuentas` DISABLE KEYS */;
INSERT INTO `cuentas` VALUES (1,'101010','desccuenta');
/*!40000 ALTER TABLE `cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_pedido`
--

DROP TABLE IF EXISTS `detalle_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_pedido` (
  `idDetallePedido` int(11) NOT NULL,
  `idPedido` int(11) DEFAULT NULL,
  `idSku` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDetallePedido`),
  KEY `fk_detalle_pedido_idPedido_idx` (`idPedido`),
  KEY `fk_detalle_pedido_idSKu_idx` (`idSku`),
  CONSTRAINT `fk_detalle_pedido_idPedido` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_pedido_idSKu` FOREIGN KEY (`idSku`) REFERENCES `sku` (`idsku`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_pedido`
--

LOCK TABLES `detalle_pedido` WRITE;
/*!40000 ALTER TABLE `detalle_pedido` DISABLE KEYS */;
INSERT INTO `detalle_pedido` VALUES (1,1,1,10),(2,1,2,9),(3,1,4,4),(4,1,3,2);
/*!40000 ALTER TABLE `detalle_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lista_precios`
--

DROP TABLE IF EXISTS `lista_precios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lista_precios` (
  `idListaPrecio` int(11) NOT NULL,
  `DescListaPrecio` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idListaPrecio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lista_precios`
--

LOCK TABLES `lista_precios` WRITE;
/*!40000 ALTER TABLE `lista_precios` DISABLE KEYS */;
INSERT INTO `lista_precios` VALUES (1,'listra precio 1'),(2,'lista precio 2');
/*!40000 ALTER TABLE `lista_precios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listaprecio_detalle`
--

DROP TABLE IF EXISTS `listaprecio_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `listaprecio_detalle` (
  `idListaPrecioDetalle` int(11) NOT NULL,
  `idsku` int(11) DEFAULT NULL,
  `idListaPrecio` int(11) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  PRIMARY KEY (`idListaPrecioDetalle`),
  KEY `fk_ListaPrecioDetalle_idListaPrecio_idx` (`idListaPrecio`),
  KEY `fk_ListaPrecioDetalle_idSKU_idx` (`idsku`),
  CONSTRAINT `fk_listaprecio_detalle_idListaPrecio` FOREIGN KEY (`idListaPrecio`) REFERENCES `lista_precios` (`idListaPrecio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_listaprecio_detalle_idsku` FOREIGN KEY (`idsku`) REFERENCES `sku` (`idsku`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listaprecio_detalle`
--

LOCK TABLES `listaprecio_detalle` WRITE;
/*!40000 ALTER TABLE `listaprecio_detalle` DISABLE KEYS */;
INSERT INTO `listaprecio_detalle` VALUES (1,1,1,2000),(2,2,1,3000),(3,3,2,4000);
/*!40000 ALTER TABLE `listaprecio_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listaprecio_sucursales`
--

DROP TABLE IF EXISTS `listaprecio_sucursales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `listaprecio_sucursales` (
  `idListaPrecioSucursal` int(11) NOT NULL,
  `idSucursal` int(11) NOT NULL,
  `idListaPrecio` int(11) NOT NULL,
  PRIMARY KEY (`idListaPrecioSucursal`),
  KEY `fk_ListaPrecioSucursales_idSucursal_idx` (`idSucursal`),
  KEY `fk_ListaPrecioSucursales_idListaPrecio_idx` (`idListaPrecio`),
  CONSTRAINT `fk_ListaPrecioSucursales_idListaPrecio` FOREIGN KEY (`idListaPrecio`) REFERENCES `lista_precios` (`idListaPrecio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ListaPrecioSucursales_idSucursal` FOREIGN KEY (`idSucursal`) REFERENCES `sucursales` (`idSucursal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listaprecio_sucursales`
--

LOCK TABLES `listaprecio_sucursales` WRITE;
/*!40000 ALTER TABLE `listaprecio_sucursales` DISABLE KEYS */;
/*!40000 ALTER TABLE `listaprecio_sucursales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marcas`
--

DROP TABLE IF EXISTS `marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marcas` (
  `idMarca` int(11) NOT NULL,
  `DescMarca` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcas`
--

LOCK TABLES `marcas` WRITE;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
INSERT INTO `marcas` VALUES (1,'marca1'),(2,'marca2'),(3,'marca3'),(4,'marca4'),(5,'marca5');
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `origenes`
--

DROP TABLE IF EXISTS `origenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `origenes` (
  `idOrigen` int(11) NOT NULL,
  `DescOrigen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idOrigen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `origenes`
--

LOCK TABLES `origenes` WRITE;
/*!40000 ALTER TABLE `origenes` DISABLE KEYS */;
INSERT INTO `origenes` VALUES (1,'origen1');
/*!40000 ALTER TABLE `origenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `FechaEntrega` date DEFAULT NULL,
  `FechaPedido` date DEFAULT NULL,
  `idSucursal` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `fk_pedido_idSucursal_idx` (`idSucursal`),
  CONSTRAINT `fk_pedido_idSucursal` FOREIGN KEY (`idSucursal`) REFERENCES `sucursales` (`idSucursal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (1,'descripcion','0000-00-00','2014-02-14',1);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sku`
--

DROP TABLE IF EXISTS `sku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sku` (
  `idsku` int(11) NOT NULL,
  `Referencia` varchar(20) DEFAULT NULL,
  `idMarca` int(11) DEFAULT NULL,
  `idColor` varchar(3) DEFAULT NULL,
  `idTipoPrenda` int(11) DEFAULT NULL,
  `UnidadMedida` varchar(3) DEFAULT NULL,
  `DescSku` varchar(50) DEFAULT NULL,
  `Talla` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`idsku`),
  KEY `fk_sku_idMarca_idx` (`idMarca`),
  KEY `fk_sku_idTipoPrenda_idx` (`idTipoPrenda`),
  KEY `fk_sku_idColor_idx` (`idColor`),
  CONSTRAINT `fk_sku_idColor` FOREIGN KEY (`idColor`) REFERENCES `colores` (`idColor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sku_idMarca` FOREIGN KEY (`idMarca`) REFERENCES `marcas` (`idMarca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sku_idTipoPrenda` FOREIGN KEY (`idTipoPrenda`) REFERENCES `tipo_prendas` (`idTipoPrenda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sku`
--

LOCK TABLES `sku` WRITE;
/*!40000 ALTER TABLE `sku` DISABLE KEYS */;
INSERT INTO `sku` VALUES (1,'10101',1,'000',1,'uni','descsuku','S'),(2,'10101',1,'002',1,'uni','descsku','L'),(3,'10102',2,'000',1,'uni','descsku','S'),(4,'10101',1,'003',1,'uni','desc003','M'),(5,'10102',2,'003',1,'uni','sku5','XL');
/*!40000 ALTER TABLE `sku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategorias`
--

DROP TABLE IF EXISTS `subcategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategorias` (
  `idSubcategoria` int(11) NOT NULL,
  `DescSubCategoria` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idSubcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategorias`
--

LOCK TABLES `subcategorias` WRITE;
/*!40000 ALTER TABLE `subcategorias` DISABLE KEYS */;
INSERT INTO `subcategorias` VALUES (1,'subcategoria1');
/*!40000 ALTER TABLE `subcategorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sucursales`
--

DROP TABLE IF EXISTS `sucursales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sucursales` (
  `idSucursal` int(11) NOT NULL,
  `codigoSucursal` varchar(45) DEFAULT NULL,
  `nombreAlmacen` varchar(45) DEFAULT NULL,
  `Cupo` double DEFAULT NULL,
  `Direccion1` varchar(50) DEFAULT NULL,
  `Direccion2` varchar(50) DEFAULT NULL,
  `DIreccion3` varchar(50) DEFAULT NULL,
  `Telefono` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `idCliente` int(11) NOT NULL,
  `idCiudad` int(11) NOT NULL,
  `idVendedor` int(11) NOT NULL,
  `idCanal` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idSubCategoria` int(11) NOT NULL,
  `idOrigen` int(11) NOT NULL,
  `idZona` int(11) NOT NULL,
  PRIMARY KEY (`idSucursal`),
  KEY `fk_Sucursales_idCiudad_idx` (`idCiudad`),
  KEY `fk_Sucursales_idCliente_idx` (`idCliente`),
  KEY `fk_Sucursales_idVendedor_idx` (`idVendedor`),
  KEY `fk_Sucursales_idCanal_idx` (`idCanal`),
  KEY `fk_Sucursales_idCategoria_idx` (`idCategoria`),
  KEY `fk_Sucursales_idSubCategoria_idx` (`idSubCategoria`),
  KEY `fk_Sucursales_idOrigen_idx` (`idOrigen`),
  KEY `fk_Sucursales_idZona_idx` (`idZona`),
  CONSTRAINT `fk_Sucursales_idCanal` FOREIGN KEY (`idCanal`) REFERENCES `canales` (`idCanal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Sucursales_idCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Sucursales_idCiudad` FOREIGN KEY (`idCiudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Sucursales_idCliente` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Sucursales_idOrigen` FOREIGN KEY (`idOrigen`) REFERENCES `origenes` (`idOrigen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Sucursales_idSubCategoria` FOREIGN KEY (`idSubCategoria`) REFERENCES `subcategorias` (`idSubcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Sucursales_idVendedor` FOREIGN KEY (`idVendedor`) REFERENCES `vendedores` (`idVendedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Sucursales_idZona` FOREIGN KEY (`idZona`) REFERENCES `zonas` (`idZona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursales`
--

LOCK TABLES `sucursales` WRITE;
/*!40000 ALTER TABLE `sucursales` DISABLE KEYS */;
INSERT INTO `sucursales` VALUES (1,'sucursal1','almacen1',2000,'direccion','cireccion2','direccion3','8765543','eagm@gmail.com',1,1,1,1,1,1,1,1),(2,'sucursal2','almacen2',2000,'direccion1','direccion2','direccion3','8765543','eagm@gmail.com',1,1,1,1,1,1,1,1),(3,'sucursal3','almacen3',3000,'direccion1','direccion2','direccion3','888888','email',2,1,1,1,1,1,1,1);
/*!40000 ALTER TABLE `sucursales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sucursales_contactos`
--

DROP TABLE IF EXISTS `sucursales_contactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sucursales_contactos` (
  `idSucursalContacto` int(11) NOT NULL,
  `idSucursal` int(11) NOT NULL,
  `idContacto` int(11) NOT NULL,
  PRIMARY KEY (`idSucursalContacto`),
  KEY `fk_SucursalesContactos_idSucursal_idx` (`idSucursal`),
  KEY `fk_SucursalesContactos_idContacto_idx` (`idContacto`),
  CONSTRAINT `fk_SucursalesContactos_idContacto` FOREIGN KEY (`idContacto`) REFERENCES `contactos` (`idContacto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_SucursalesContactos_idSucursal` FOREIGN KEY (`idSucursal`) REFERENCES `sucursales` (`idSucursal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursales_contactos`
--

LOCK TABLES `sucursales_contactos` WRITE;
/*!40000 ALTER TABLE `sucursales_contactos` DISABLE KEYS */;
/*!40000 ALTER TABLE `sucursales_contactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_prendas`
--

DROP TABLE IF EXISTS `tipo_prendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_prendas` (
  `idTipoPrenda` int(11) NOT NULL,
  `DescTipoPrenda` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTipoPrenda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_prendas`
--

LOCK TABLES `tipo_prendas` WRITE;
/*!40000 ALTER TABLE `tipo_prendas` DISABLE KEYS */;
INSERT INTO `tipo_prendas` VALUES (1,'tipoPrenda1'),(2,'tipoPrenda2'),(3,'tipoPrenda3');
/*!40000 ALTER TABLE `tipo_prendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_sistema`
--

DROP TABLE IF EXISTS `usuario_sistema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_sistema` (
  `cedulaNit` varchar(45) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `tipoUsuario` enum('V','C','A','D') DEFAULT NULL COMMENT 'tipoUsuario:\nV=vendedor\nC=coordinador\nA=Administrador\nD=Director',
  `token` text NOT NULL,
  PRIMARY KEY (`cedulaNit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_sistema`
--

LOCK TABLES `usuario_sistema` WRITE;
/*!40000 ALTER TABLE `usuario_sistema` DISABLE KEYS */;
INSERT INTO `usuario_sistema` VALUES ('123','asesor','salas','A','V','c66201e41d7ae3ea431665eb83d836015ed2c1342b0873711319f17d2c4d9d6b'),('456','asesor2','salas','A','V','eeeee66201e41d7ae3ea431665eb83d836015ed2c1342b0873711319f17d2c4d9d6b');
/*!40000 ALTER TABLE `usuario_sistema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `Cedula` varchar(45) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Celular` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('123','juanito','Garcia','3215561','3104735626','direccion');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendedores`
--

DROP TABLE IF EXISTS `vendedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendedores` (
  `idVendedor` int(11) NOT NULL,
  `Codigo` varchar(50) DEFAULT NULL,
  `Cedula` varchar(50) DEFAULT NULL,
  `Nombres` varchar(50) DEFAULT NULL,
  `Telefono` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idVendedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendedores`
--

LOCK TABLES `vendedores` WRITE;
/*!40000 ALTER TABLE `vendedores` DISABLE KEYS */;
INSERT INTO `vendedores` VALUES (1,'001','123','vendedor1','4040','juanito@hotmail.com'),(2,'002','456','vendedor2','5050','email');
/*!40000 ALTER TABLE `vendedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zonas`
--

DROP TABLE IF EXISTS `zonas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zonas` (
  `idZona` int(11) NOT NULL,
  `DescZona` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idZona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zonas`
--

LOCK TABLES `zonas` WRITE;
/*!40000 ALTER TABLE `zonas` DISABLE KEYS */;
INSERT INTO `zonas` VALUES (1,'zona1');
/*!40000 ALTER TABLE `zonas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-14 15:11:28
