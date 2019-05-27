-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2019 at 08:47 AM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpp`
--

CREATE TABLE `tbl_bpp` (
  `bpp_id` int(11) NOT NULL,
  `bpp_bahan` varchar(255) DEFAULT NULL,
  `bpp_qty` varchar(50) DEFAULT NULL,
  `bpp_kadar` varchar(50) DEFAULT NULL,
  `bpp_status` tinyint(1) DEFAULT '1' COMMENT '1=belumdiproses;2=sudahdiproses',
  `bpp_remark` text,
  `bpp_wo_id` int(11) DEFAULT NULL,
  `bpp_created_date` datetime DEFAULT NULL,
  `bpp_updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bpp`
--

INSERT INTO `tbl_bpp` (`bpp_id`, `bpp_bahan`, `bpp_qty`, `bpp_kadar`, `bpp_status`, `bpp_remark`, `bpp_wo_id`, `bpp_created_date`, `bpp_updated_date`) VALUES
(4, 'minyak ', '100', '100%', 4, NULL, 7, '2019-04-21 16:49:00', NULL),
(5, 'minyak ', '11', '11%', 5, 'kepada staff gudang mohon disiapkan bahan2 tersebut', 8, '2019-04-21 17:32:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `UserId` int(11) NOT NULL,
  `UserFullName` varchar(150) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `UserPassword` varchar(50) DEFAULT NULL,
  `UserStatus` tinyint(4) DEFAULT '1',
  `UserRoleId` int(11) DEFAULT NULL,
  `UserCreatedDate` datetime DEFAULT NULL,
  `UserUpdatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`UserId`, `UserFullName`, `UserName`, `UserPassword`, `UserStatus`, `UserRoleId`, `UserCreatedDate`, `UserUpdatedDate`) VALUES
(1, 'Administrator', 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 1, '2019-03-20 00:00:00', NULL),
(2, 'Gudang', 'gudang', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 5, '2019-03-20 00:00:00', NULL),
(3, 'Suwandi Yusuf', 'leader', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 6, '2019-03-20 00:00:00', NULL),
(4, 'Muhammad Nurul Arifin', 'ppic', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 2, '2019-03-20 00:00:00', NULL),
(5, 'Wesliana', 'qc', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 3, '2019-03-20 00:00:00', NULL),
(6, 'Amirudin Arif', 'manager', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 7, '2019-03-20 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `RoleId` int(11) NOT NULL,
  `RoleName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`RoleId`, `RoleName`) VALUES
(1, 'Administrator'),
(2, 'PPIC'),
(3, 'QC'),
(4, 'Leader Liquid'),
(5, 'Staff Gudang'),
(6, 'Leader Produksi'),
(7, 'Manager Produksi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work_order`
--

CREATE TABLE `tbl_work_order` (
  `WorkOrderId` int(11) NOT NULL,
  `WorkOrderName` varchar(50) DEFAULT NULL,
  `WorkOrderNoBatch` varchar(45) DEFAULT NULL,
  `WorkOrderQty` int(11) DEFAULT '0',
  `WorkOrderTotalBed` int(11) DEFAULT '0',
  `WorkOrderKadar` varchar(50) DEFAULT NULL,
  `WorkOrderDescription` text,
  `WorkOrderToRoleId` int(11) DEFAULT '0',
  `WorkOrderStatus` tinyint(1) DEFAULT '0' COMMENT '0=belum_di_send;1=sudah_di_send;2=on_proses_produksi',
  `WorkOrderDate` datetime DEFAULT NULL,
  `WorkOrderUpdated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_work_order`
--

INSERT INTO `tbl_work_order` (`WorkOrderId`, `WorkOrderName`, `WorkOrderNoBatch`, `WorkOrderQty`, `WorkOrderTotalBed`, `WorkOrderKadar`, `WorkOrderDescription`, `WorkOrderToRoleId`, `WorkOrderStatus`, `WorkOrderDate`, `WorkOrderUpdated`) VALUES
(7, 'order minyak kasturi ', 'xyz20', 100, NULL, '100%', 'segera di produksi', 0, 3, '2019-04-21 16:32:50', NULL),
(8, 'order minyak kayu putih', 'xyz022', 11, NULL, '11%', 'segera di proses', 0, 4, '2019-04-21 17:30:20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bpp`
--
ALTER TABLE `tbl_bpp`
  ADD PRIMARY KEY (`bpp_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `tbl_work_order`
--
ALTER TABLE `tbl_work_order`
  ADD PRIMARY KEY (`WorkOrderId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bpp`
--
ALTER TABLE `tbl_bpp`
  MODIFY `bpp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_work_order`
--
ALTER TABLE `tbl_work_order`
  MODIFY `WorkOrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
