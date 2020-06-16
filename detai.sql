-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 18, 2020 lúc 08:23 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `detai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baihoc`
--

CREATE TABLE `baihoc` (
  `id` int(11) NOT NULL,
  `maKHoc` text NOT NULL,
  `giaovien` text NOT NULL,
  `tenBai` text NOT NULL,
  `giatien` int(11) NOT NULL,
  `imgBai` text NOT NULL,
  `mota` text NOT NULL,
  `hide` tinyint(1) NOT NULL,
  `ngaydang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `baihoc`
--

INSERT INTO `baihoc` (`id`, `maKHoc`, `giaovien`, `tenBai`, `giatien`, `imgBai`, `mota`, `hide`, `ngaydang`) VALUES
(1, 'Thể Hình', 'Tùng', 'Đào Tạo PT Thể Hình Chuyên Nghiệp', 500000, 'daotaopt.jpg', 'Đào Tạo Pt chuyên Nghiệp', 1, '2020-04-10'),
(2, 'Bơi Lội', 'Tú', 'Dạy Bơi', 1200000, 'boi.jpg', 'Huấn Luyện Bơi Cho Người Mới Bắt Đầu', 1, '2020-04-10'),
(3, 'Yoga', 'Đức', 'Yoga Cho Người Mới Bắt Đầu', 4350000, 'yoga.jpg', 'Nhập Môn Yoga', 1, '2020-04-10'),
(4, 'Điền Kinh', 'Tuấn Anh', 'Điền Kinh Rèn Luyện Sức Bền', 450000, 'dienkinh.jpg', 'Hãy tham gia khoá học ngay hôm nay để nhanh chóng làm chủ bản thân, rèn luyện sức bền.', 1, '2020-04-10'),
(5, 'Sport Dance', 'Long', 'Dành Cho Người Mới ', 670000, 'dance.jpg', 'Khóa học kĩ năng mềm sport dance.', 1, '2020-04-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `idbaihoc` int(11) NOT NULL,
  `idmaKHoc` text NOT NULL,
  `idUsername` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `cmt` text NOT NULL,
  `date` datetime NOT NULL,
  `kiemduyet` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `camnhan`
--

CREATE TABLE `camnhan` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `txtCamnhan` text NOT NULL,
  `hide` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `hoten` text NOT NULL,
  `sdt` int(11) NOT NULL,
  `dulieu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `emaildangky`
--

CREATE TABLE `emaildangky` (
  `stt` int(11) NOT NULL,
  `email` text NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

CREATE TABLE `khoahoc` (
  `id` int(10) NOT NULL,
  `maKHoc` text CHARACTER SET utf8mb4 NOT NULL,
  `imgKHoc` text CHARACTER SET utf8mb4 NOT NULL,
  `tenKhoa` text CHARACTER SET utf8mb4 NOT NULL,
  `motaKHoc` text CHARACTER SET utf8mb4 NOT NULL,
  `hide` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khoahoc`
--

INSERT INTO `khoahoc` (`id`, `maKHoc`, `imgKHoc`, `tenKhoa`, `motaKHoc`, `hide`) VALUES
(1, 'Thể Hình', '', 'Thể Hình', 'Huấn Luyện Thể Hình Chuyên Nghiệp', 1),
(2, 'Yoga', '', 'Yoga', 'Yoga Cho Người Mới Bắt Đầu', 1),
(3, 'Điền Kinh', '', 'Điền Kinh ', 'Điền Kinh Chuyên Nghiệp', 1),
(4, 'Bơi Lội', '', 'Bơi Lội', 'Bơi Lội Cho Người Mới Bắt Đầu/Nâng Cao', 1),
(5, 'Sport Dance', '', 'Sport Dance', 'Nhập Môn Sport Dance', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `online`
--

CREATE TABLE `online` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `url` text NOT NULL,
  `requestGet` text NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `online`
--

INSERT INTO `online` (`id`, `ip`, `url`, `requestGet`, `time`) VALUES
(3, '::1', '/bankhoahoc/dangky_dangnhap.php', '', 1589782811);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `avatar` text NOT NULL,
  `date` date NOT NULL,
  `chucdanh` tinyint(4) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `username`, `password`, `avatar`, `date`, `chucdanh`, `active`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ad.jpg', '2020-04-01', 1, 1),
(50, 'Tu', 'toilataone@gmail.com', 'TU', 'c4ca4238a0b923820dcc509a6f75849b', 'default.png', '2020-05-18', 3, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baihoc`
--
ALTER TABLE `baihoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `camnhan`
--
ALTER TABLE `camnhan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `emaildangky`
--
ALTER TABLE `emaildangky`
  ADD PRIMARY KEY (`stt`);

--
-- Chỉ mục cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baihoc`
--
ALTER TABLE `baihoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT cho bảng `camnhan`
--
ALTER TABLE `camnhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `emaildangky`
--
ALTER TABLE `emaildangky`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `online`
--
ALTER TABLE `online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
