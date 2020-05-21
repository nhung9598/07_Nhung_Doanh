-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 20, 2020 lúc 10:30 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `id` int(50) NOT NULL,
  `madv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tendv` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`id`, `madv`, `tendv`) VALUES
(1, 'dv01', 'Khám bệnh'),
(2, 'dv02', 'Thủ thuật'),
(3, 'dv03', 'Kính'),
(4, 'dv04', 'Thuốc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dvcon`
--

CREATE TABLE `dvcon` (
  `id` int(50) NOT NULL,
  `madv` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `madvcon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tendvcon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tendv` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dvcon`
--

INSERT INTO `dvcon` (`id`, `madv`, `madvcon`, `tendvcon`, `tendv`) VALUES
(1, '', 'dv01_1', 'Khám tại phòng khám', 'Khám bệnh');

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
