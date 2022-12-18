-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 17, 2022 lúc 05:05 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `Database`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `GRN`
--

CREATE TABLE `GRN` (
  `grnid` varchar(20) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `receiver` varchar(30) NOT NULL,
  `checker` varchar(30) NOT NULL,
  `grndate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `GRN`
--

INSERT INTO `GRN` (`grnid`, `supplier`, `receiver`, `checker`, `grndate`) VALUES
('GR01', 'Vi', 'Trang', 'Trang', '2022-01-01'),
('GR02', 'Dung', 'Chi', 'Mai', '2022-01-01'),
('GR03', 'My', 'Anh', 'Trung', '2022-01-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `GRNprod`
--

CREATE TABLE `GRNprod` (
  `grnid` varchar(20) NOT NULL,
  `prodid` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `GRNprod`
--

INSERT INTO `GRNprod` (`grnid`, `prodid`, `quantity`) VALUES
('GR02', 'P01', 10),
('GR02', 'P03', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Orderprod`
--

CREATE TABLE `Orderprod` (
  `oid` varchar(20) NOT NULL,
  `prodid` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Orderprod`
--

INSERT INTO `Orderprod` (`oid`, `prodid`, `quantity`) VALUES
('Or01', 'P05', 3),
('Or02', 'P04', 8),
('Or02', 'P08', 13),
('Or03', 'P01', 10),
('Or03', 'P02', 5),
('Or03', 'P09', 11),
('Or04', 'P01', 11),
('Or04', 'P03', 6),
('Or04', 'P06', 9),
('Or04', 'P07', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Orders`
--

CREATE TABLE `Orders` (
  `oid` varchar(20) NOT NULL,
  `odate` date NOT NULL,
  `delidate` date DEFAULT NULL,
  `paidmethod` varchar(30) NOT NULL,
  `agentname` varchar(30) NOT NULL,
  `agentphone` varchar(15) NOT NULL,
  `agentaddress` varchar(50) NOT NULL,
  `paymentstt` int(11) DEFAULT 0,
  `orderstt` varchar(30) DEFAULT 'Pending',
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Orders`
--

INSERT INTO `Orders` (`oid`, `odate`, `delidate`, `paidmethod`, `agentname`, `agentphone`, `agentaddress`, `paymentstt`, `orderstt`, `total`) VALUES
('Or01', '2021-09-09', '2021-09-10', 'Cash', 'Tung', '0123456789', 'My Tho', 1, 'Pending', NULL),
('Or02', '2021-12-09', '2022-09-10', 'Momo', 'Tien', '1472347983', 'HCM', 0, 'Cancelled', NULL),
('Or03', '2021-12-12', '2022-09-10', 'InternetBanking', 'Dung', '382374032', 'Long An', 1, 'Being Delivered', NULL),
('Or04', '2021-12-24', '2022-09-10', 'Cash', 'Chi', '184728493', 'Hanoi', 0, 'Pending', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Product`
--

CREATE TABLE `Product` (
  `prodid` varchar(20) NOT NULL,
  `prodname` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Product`
--

INSERT INTO `Product` (`prodid`, `prodname`, `quantity`, `price`) VALUES
('P01', 'Healthy Care Vitamin C', 50, 10),
('P02', 'Nature`s Way Complete Daily Multivitamin ', 100, 8),
('P03', 'Nat C', 80, 5),
('P04', 'Siro Brauer Immunity Support', 30, 15),
('P05', 'Orgain Organic Superfoods Immunity Up', 67, 20),
('P06', 'Puritan`s Pride', 40, 12),
('P07', 'Blackmores Bio C', 84, 13),
('P08', 'Vitamin C + Manuka honey ', 20, 9),
('P09', 'Fiber Well', 77, 25),
('P10', 'DHC Perfect Vegetable', 99, 23);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Users`
--

CREATE TABLE `Users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullName` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `BDate` date DEFAULT NULL,
  `Address` varchar(30) DEFAULT NULL,
  `Gender` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Users`
--

INSERT INTO `Users` (`username`, `password`, `fullName`, `phone`, `BDate`, `Address`, `Gender`) VALUES
('admin', 'admin', 'Dang', '0123445', '1955-01-09', 'HCM VN', 'M'),
('user', 'user', 'Tan', '0123445', '1955-01-09', 'HCM VN', 'M');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `GRN`
--
ALTER TABLE `GRN`
  ADD PRIMARY KEY (`grnid`);

--
-- Chỉ mục cho bảng `GRNprod`
--
ALTER TABLE `GRNprod`
  ADD PRIMARY KEY (`grnid`,`prodid`),
  ADD KEY `FK_ProductGRNprod` (`prodid`);

--
-- Chỉ mục cho bảng `Orderprod`
--
ALTER TABLE `Orderprod`
  ADD PRIMARY KEY (`oid`,`prodid`),
  ADD KEY `FK_ProductOrderprod` (`prodid`);

--
-- Chỉ mục cho bảng `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`oid`);

--
-- Chỉ mục cho bảng `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`prodid`);

--
-- Chỉ mục cho bảng `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`username`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `GRNprod`
--
ALTER TABLE `GRNprod`
  ADD CONSTRAINT `FK_GRNtoGRNprod` FOREIGN KEY (`grnid`) REFERENCES `GRN` (`grnid`),
  ADD CONSTRAINT `FK_ProductGRNprod` FOREIGN KEY (`prodid`) REFERENCES `Product` (`prodid`);

--
-- Các ràng buộc cho bảng `Orderprod`
--
ALTER TABLE `Orderprod`
  ADD CONSTRAINT `FK_OrdertoOrderprod` FOREIGN KEY (`oid`) REFERENCES `Orders` (`oid`),
  ADD CONSTRAINT `FK_ProductOrderprod` FOREIGN KEY (`prodid`) REFERENCES `Product` (`prodid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
