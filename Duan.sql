-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 27, 2024 at 10:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Duan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `diachi` varchar(199) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `pttt` tinyint(100) NOT NULL DEFAULT 0 COMMENT '0.thanh toán khi nhận hàng\r\n1.thanh toán online\r\n2.Thanh toán qua QRcode',
  `ngaydathang` varchar(100) NOT NULL,
  `tongdonhang` int(100) NOT NULL,
  `trangthai` tinyint(50) NOT NULL DEFAULT 0 COMMENT '0.Đang sử lý\r\n1.Đang giao hàng\r\n2.Đã nhận hàng\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `user`, `email`, `diachi`, `sdt`, `pttt`, `ngaydathang`, `tongdonhang`, `trangthai`) VALUES
(103, 'admin', '', '', '', 0, '10:27:11 27/07/24', 21000, 0),
(104, 'admin', '', '', '', 0, '10:27:36 27/07/24', 12000, 0),
(105, 'admin', '', '', '', 0, '10:28:23 27/07/24', 12000, 0),
(106, 'admin', '', '', '', 0, '10:35:09 27/07/24', 21000, 0),
(107, 'admin', '', '', '', 0, '10:36:06 27/07/24', 21000, 0),
(108, 'admin', '', '', '', 0, '10:36:36 27/07/24', 21000, 0),
(109, 'admin', '', '', '', 0, '10:39:57 27/07/24', 12000, 0),
(110, 'admin', '', '', '', 0, '10:40:09 27/07/24', 12000, 0),
(111, 'admin', '', '', '', 0, '10:40:45 27/07/24', 0, 0),
(112, 'admin', '', '', '', 0, '10:40:55 27/07/24', 0, 0),
(113, 'admin', '', '', '', 0, '10:41:12 27/07/24', 12000, 0),
(114, 'admin', '', '', '', 0, '10:41:46 27/07/24', 0, 0),
(115, 'admin', '', '', '', 0, '10:41:54 27/07/24', 12000, 0),
(116, 'admin', '', '', '', 0, '10:44:21 27/07/24', 21000, 0),
(117, 'admin', '', '', '', 0, '10:45:14 27/07/24', 21000, 0),
(118, 'admin', '', '', '', 0, '10:47:36 27/07/24', 54000, 0),
(119, 'admin', '', '', '', 0, '10:48:56 27/07/24', 12000, 0),
(120, 'admin', '', '', '', 0, '10:51:18 27/07/24', 23000, 0),
(121, 'admin', '', '', '', 0, '10:52:18 27/07/24', 10000, 0),
(122, 'admin', '', '', '', 0, '10:53:01 27/07/24', 10000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `idpro` int(10) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idbill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendm` varchar(199) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendm`) VALUES
(1, 'Đồ ăn vặt'),
(2, 'Đồ ăn đêm'),
(4, 'Đồ uống');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tensp` varchar(199) NOT NULL,
  `hinhanh` varchar(200) NOT NULL,
  `gia` varchar(10) NOT NULL,
  `size` varchar(10) NOT NULL,
  `soluong` int(10) NOT NULL,
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `mota` text DEFAULT NULL,
  `iddm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `hinhanh`, `gia`, `size`, `soluong`, `luotxem`, `mota`, `iddm`) VALUES
(16, 'Khoai tây chiên bơ giòn', 'anh1.jpg', '23000', '', 1, 0, 'Khoai tây chiên bơ giòn giao hàng tại nhà', 1),
(19, 'Mì trộn trứng cút', 'anh2.jpg', '10000', '', 1, 0, 'Mì trộn trứng cút giao tận nhà', 1),
(20, 'Mỳ trộn xúc xích', 'anh3.jpg', '20000', '', 1, 0, 'Mỳ trộn xúc xích giao hàng tận nhà miễn phí', 1),
(21, 'Nem chua rán Hà Nội', 'anh4.jpg', '7000', '', 1, 0, 'Nem chua rán Hà Nội giao hàng tại nhà', 1),
(22, 'Khoai tây chiên bơ giòn', 'anh1.jpg', '23000', '', 1, 0, 'Khoai tây chiên bơ giòn giao hàng tại nhà', 2),
(23, 'Mì trộn trứng cút', 'anh2.jpg', '10000', '', 1, 0, 'Mì trộn trứng cút giao tận nhà', 2),
(24, 'Mỳ trộn xúc xích', 'anh3.jpg', '20000', '', 1, 0, 'Mỳ trộn xúc xích giao hàng tận nhà miễn phí', 2),
(25, 'Nem chua rán Hà Nội', 'anh4.jpg', '7000', '', 1, 0, 'Nem chua rán Hà Nội giao hàng tại nhà', 2),
(26, 'Nước chanh leo bạc hà', 'anh5.jpg', '17000', '', 1, 0, 'Nước chanh leo bạc hà giao hàng tại nhà', 4),
(27, 'Nước ép cà rốt ', 'anh6.jpg', '25000', '', 1, 0, 'Nước ép cà rốt giao hàng tại nhà', 4),
(28, 'Nước uống Coca ', 'anh7.jpg', '12000', '', 1, 0, 'Nước uống Coca giao hàng tại nhà', 4),
(29, 'Sữa Chua Thạch Trân Châu giao hàng tại nhà', 'anh8.jpg', '21000', '', 1, 0, 'Sữa Chua Thạch Trân Châu giao hàng tại nhà', 4);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(199) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `email`, `sdt`, `diachi`, `role`) VALUES
(1, 'admin1', '123', '', '', '', 0),
(8, 'admin', '123', '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_bill_cart` (`idbill`),
  ADD KEY `lk_tk_cart` (`iduser`),
  ADD KEY `lk_sp_cart` (`idpro`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_sanpham` (`iddm`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `lk_bill_cart` FOREIGN KEY (`idbill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `lk_tk_cart` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_sanpham` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
