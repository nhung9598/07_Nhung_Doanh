-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 22, 2020 lúc 08:49 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanly`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `benhnhan`
--

CREATE TABLE `benhnhan` (
  `benhnhanid` int(11) NOT NULL,
  `tenbn` text COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `mabn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` text COLLATE utf8_unicode_ci NOT NULL,
  `diachi` text COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `benhnhan`
--

INSERT INTO `benhnhan` (`benhnhanid`, `tenbn`, `ngaysinh`, `mabn`, `gioitinh`, `diachi`, `sdt`) VALUES
(1, 'Nguyễn Văn A', '0000-00-00', 'bn01', 'Nam', '25 Hùng Vương', 123123123),
(2, 'nguyễn Văn B', '0000-00-00', 'bn02', 'Nam', '25 Hùng Vương', 345345345),
(3, 'Nguyễn Thị M', '0000-00-00', 'bn03', 'Nữ', '45 Hùng Vương', 456456456),
(4, 'Nguyễn Thị N', '0000-00-00', 'bn04', 'Nữ', '12 Hùng Vương', 132132132);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangnhap`
--

CREATE TABLE `dangnhap` (
  `id` int(11) NOT NULL,
  `account` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dangnhap`
--

INSERT INTO `dangnhap` (`id`, `account`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `iddv` int(50) NOT NULL,
  `madv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tendv` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`iddv`, `madv`, `tendv`) VALUES
(1, 'dv01', 'Khám bệnh'),
(2, 'dv02', 'Thủ thuật'),
(3, 'dv03', 'Kính');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dvcon`
--

CREATE TABLE `dvcon` (
  `iddv` int(10) NOT NULL,
  `madv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `madvcon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tendvcon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `giatien` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dvcon`
--

INSERT INTO `dvcon` (`iddv`, `madv`, `madvcon`, `tendvcon`, `giatien`) VALUES
(1, 'dv01', 'dv01_1', 'Khám tại phòng khám', '500000'),
(1, 'dv01', 'dv01_2', 'Khám tại nhà', '35000'),
(2, 'dv02', 'dv02_1', 'Thẩm mỹ', '500'),
(2, 'dv03', 'dv02_2', 'Khúc xạ', '35000'),
(3, 'dv03', 'dv03_1', 'Kính đen', '500'),
(3, 'dv03', 'dv03_2', 'Kính tròn', '35000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kham`
--

CREATE TABLE `kham` (
  `id` int(10) NOT NULL,
  `mabn` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tenbn` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dichvu` text COLLATE utf8_unicode_ci NOT NULL,
  `ngaykham` date NOT NULL,
  `taikham` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kham`
--

INSERT INTO `kham` (`id`, `mabn`, `tenbn`, `dichvu`, `ngaykham`, `taikham`) VALUES
(1, 'bn01', 'Nguyễn văn A', 'khám tại nhà', '0000-00-00', '02-12-2011');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khothuoc`
--

CREATE TABLE `khothuoc` (
  `id` int(10) NOT NULL,
  `mathuoc` int(100) NOT NULL,
  `tenthuoc` text COLLATE utf8_unicode_ci NOT NULL,
  `donvi` text COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khothuoc`
--

INSERT INTO `khothuoc` (`id`, `mathuoc`, `tenthuoc`, `donvi`, `soluong`, `thanhtien`) VALUES
(1, 0, 'vitamin', 'Lọ', 500, '500000'),
(2, 2, 'paradol', 'Vỉ', 50, '50000'),
(3, 3, 'Coperil plus', 'viên', 200, '35000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuoc`
--

CREATE TABLE `thuoc` (
  `id` int(10) NOT NULL,
  `mabn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mathuoc` int(100) NOT NULL,
  `donvi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `tenthuoc` text COLLATE utf8_unicode_ci NOT NULL,
  `cachdung` text COLLATE utf8_unicode_ci NOT NULL,
  `thanhtien` decimal(10,0) NOT NULL,
  `ngaykham` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thuoc`
--

INSERT INTO `thuoc` (`id`, `mabn`, `mathuoc`, `donvi`, `soluong`, `tenthuoc`, `cachdung`, `thanhtien`, `ngaykham`) VALUES
(1, 'bn01', 1, 'Lọ', 0, 'vitamin', 'Uống cả ngày', '500000', '0000-00-00'),
(2, 'bn02', 2, 'Vỉ', 0, 'paradol', 'đau đầu thì uống', '50000', '0000-00-00'),
(3, 'bn03', 3, 'viên', 0, 'Coperil plus', 'thuốc trợ tim', '35000', '0000-00-00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD PRIMARY KEY (`benhnhanid`);

--
-- Chỉ mục cho bảng `dangnhap`
--
ALTER TABLE `dangnhap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`iddv`);

--
-- Chỉ mục cho bảng `kham`
--
ALTER TABLE `kham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khothuoc`
--
ALTER TABLE `khothuoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thuoc`
--
ALTER TABLE `thuoc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `benhnhan`
--
ALTER TABLE `benhnhan`
  MODIFY `benhnhanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `dangnhap`
--
ALTER TABLE `dangnhap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `iddv` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `kham`
--
ALTER TABLE `kham`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `khothuoc`
--
ALTER TABLE `khothuoc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `thuoc`
--
ALTER TABLE `thuoc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
