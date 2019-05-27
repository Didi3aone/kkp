-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: db_kkp
-- ------------------------------------------------------
-- Server version 5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `tbl_bpp`
--

DROP TABLE IF EXISTS `tbl_bpp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bpp` (
  `bpp_id` int(11) NOT NULL AUTO_INCREMENT,
  `bpp_bahan` varchar(255) DEFAULT NULL,
  `bpp_qty` varchar(50) DEFAULT NULL,
  `bpp_kadar` varchar(50) DEFAULT NULL,
  `bpp_status` tinyint(1) DEFAULT '1' COMMENT '1=belumdiproses;2=sudahdiproses',
  `bpp_remark` text,
  `bpp_wo_id` int(11) DEFAULT NULL,
  `bpp_created_date` datetime DEFAULT NULL,
  `bpp_updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`bpp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bpp`
--

LOCK TABLES `tbl_bpp` WRITE;
/*!40000 ALTER TABLE `tbl_bpp` DISABLE KEYS */;
INSERT INTO `tbl_bpp` VALUES (1,'minyak','11','100%',4,NULL,2,'2019-04-06 19:57:07',NULL),(2,'Eugenol ','100','50',4,NULL,4,'2019-04-06 20:46:47',NULL);
/*!40000 ALTER TABLE `tbl_bpp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_material`
--

DROP TABLE IF EXISTS `tbl_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_material` (
  `material_id` int(11) NOT NULL AUTO_INCREMENT,
  `material_code` varchar(50) NOT NULL,
  `material_name` varchar(50) DEFAULT NULL,
  `material_type_id` int(11) DEFAULT '0',
  `material_kadar_persen` varchar(50) DEFAULT '0%',
  `material_is_status` tinyint(4) DEFAULT '1',
  `material_check_qc` tinyint(4) DEFAULT '0',
  `material_description` text,
  `material_is_active` tinyint(4) DEFAULT '1',
  `material_checked_id` int(11) DEFAULT '0',
  `material_created_date` datetime DEFAULT NULL,
  `material_updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_material`
--

LOCK TABLES `tbl_material` WRITE;
/*!40000 ALTER TABLE `tbl_material` DISABLE KEYS */;
INSERT INTO `tbl_material` VALUES (1,'x001','test01',0,'0%',1,0,'test oke',1,0,'2019-03-16 15:08:00',NULL);
/*!40000 ALTER TABLE `tbl_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_notifikasi`
--

DROP TABLE IF EXISTS `tbl_notifikasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_notifikasi` (
  `nofif_id` int(11) NOT NULL AUTO_INCREMENT,
  `notif_title` varchar(50) DEFAULT NULL,
  `notif_module` varchar(50) DEFAULT NULL,
  `notif_description` text,
  `notif_from_id` int(11) DEFAULT NULL,
  `notif_to_id` int(11) DEFAULT NULL,
  `notif_date` datetime DEFAULT NULL,
  PRIMARY KEY (`nofif_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_notifikasi`
--

LOCK TABLES `tbl_notifikasi` WRITE;
/*!40000 ALTER TABLE `tbl_notifikasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_notifikasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipe_material`
--

DROP TABLE IF EXISTS `tbl_tipe_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipe_material` (
  `tipe_material_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe_material_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tipe_material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipe_material`
--

LOCK TABLES `tbl_tipe_material` WRITE;
/*!40000 ALTER TABLE `tbl_tipe_material` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tipe_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `UserFullName` varchar(150) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `UserPassword` varchar(50) DEFAULT NULL,
  `UserStatus` tinyint(4) DEFAULT '1',
  `UserRoleId` int(11) DEFAULT NULL,
  `UserCreatedDate` datetime DEFAULT NULL,
  `UserUpdatedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'Administrator','admin','7110eda4d09e062aa5e4a390b0a572ac0d2c0220',1,1,'2019-03-20 00:00:00',NULL),(2,'Gudang','gudang','7110eda4d09e062aa5e4a390b0a572ac0d2c0220',1,5,'2019-03-20 00:00:00',NULL),(3,'Leader Produksi','leader','7110eda4d09e062aa5e4a390b0a572ac0d2c0220',1,6,'2019-03-20 00:00:00',NULL),(4,'PIC','ppic','7110eda4d09e062aa5e4a390b0a572ac0d2c0220',1,2,'2019-03-20 00:00:00',NULL),(5,'QC','qc','7110eda4d09e062aa5e4a390b0a572ac0d2c0220',1,3,'2019-03-20 00:00:00',NULL),(6,'Manager Produksi','manager','7110eda4d09e062aa5e4a390b0a572ac0d2c0220',1,7,'2019-03-20 00:00:00',NULL);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_role`
--

DROP TABLE IF EXISTS `tbl_user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_role` (
  `RoleId` int(11) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`RoleId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_role`
--

LOCK TABLES `tbl_user_role` WRITE;
/*!40000 ALTER TABLE `tbl_user_role` DISABLE KEYS */;
INSERT INTO `tbl_user_role` VALUES (1,'Administrator'),(2,'PIC'),(3,'QC'),(4,'Leader Liquid'),(5,'Staff Gudang'),(6,'Leader Produksi'),(7,'Manager Produksi');
/*!40000 ALTER TABLE `tbl_user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_warehouse`
--

DROP TABLE IF EXISTS `tbl_warehouse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_warehouse` (
  `warehouse_id` int(11) NOT NULL AUTO_INCREMENT,
  `warehouse_name` varchar(50) DEFAULT NULL,
  `warehouse_is_active` tinyint(4) DEFAULT '1',
  `warehouse_description` text,
  PRIMARY KEY (`warehouse_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_warehouse`
--

LOCK TABLES `tbl_warehouse` WRITE;
/*!40000 ALTER TABLE `tbl_warehouse` DISABLE KEYS */;
INSERT INTO `tbl_warehouse` VALUES (1,'gudang 1',1,'stok material');
/*!40000 ALTER TABLE `tbl_warehouse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_work_order`
--

DROP TABLE IF EXISTS `tbl_work_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_work_order` (
  `WorkOrderId` int(11) NOT NULL AUTO_INCREMENT,
  `WorkOrderName` varchar(50) DEFAULT NULL,
  `WorkOrderNoBatch` varchar(45) DEFAULT NULL,
  `WorkOrderQty` int(11) DEFAULT '0',
  `WorkOrderTotalBed` int(11) DEFAULT '0',
  `WorkOrderKadar` varchar(50) DEFAULT NULL,
  `WorkOrderDescription` text,
  `WorkOrderToRoleId` int(11) DEFAULT '0',
  `WorkOrderStatus` tinyint(1) DEFAULT '0' COMMENT '0=belum_di_send;1=sudah_di_send;2=on_proses_produksi',
  `WorkOrderDate` datetime DEFAULT NULL,
  `WorkOrderUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`WorkOrderId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_work_order`
--

LOCK TABLES `tbl_work_order` WRITE;
/*!40000 ALTER TABLE `tbl_work_order` DISABLE KEYS */;
INSERT INTO `tbl_work_order` VALUES (1,'test wo',NULL,11,NULL,'11%','segera',0,1,'2019-04-06 07:22:51',NULL),(2,'contoh wo ',NULL,11,NULL,'100 %','segera dibkin',0,3,'2019-04-06 19:55:07',NULL),(3,'test wo',NULL,11,NULL,'11','segera',0,0,'2019-04-06 20:04:39',NULL),(4,'Minyak aksiri',NULL,100,NULL,'50%','Tolong di produksi',0,3,'2019-04-06 20:45:31',NULL),(5,'test no ',NULL,11,NULL,'11','tess',0,0,'2019-04-07 10:54:44',NULL),(6,'tes wo','12423',121,NULL,'121','',0,1,'2019-04-07 10:55:19',NULL);
/*!40000 ALTER TABLE `tbl_work_order` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-07 11:34:49
