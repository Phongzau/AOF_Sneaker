-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2023 lúc 03:30 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `id_baiviet` int(6) NOT NULL,
  `noidung` text NOT NULL,
  `img` varchar(200) NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`id_baiviet`, `noidung`, `img`, `trangthai`) VALUES
(1, 'BASAS MONO BLACK NE - LOW TOP - ALL BLACK\r\nMã sản phẩm: AV00001\r\n490.000 VND\r\nNâng cấp chất liệu vải mới bền màu ổn định, kết hợp cùng vẻ ngoài ton sur ton từ trên xuống dưới cùng sắc đen cá tính, giúp phiên bản Basas Mono Black NE trở nên quyến rũ và tiện dụng hơn bao giờ hết. Đây hứa hẹn sẽ là sản phẩm lọt vào danh sách cho những tín đồ thường coi màu đen là sự ưu tiên.', 'sp3_bienthe2', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id_baner` int(6) NOT NULL,
  `name` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 0,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id_baner`, `name`, `img`, `trangthai`, `link`) VALUES
(1, 'BANNER 1', 'sp1_bienthe1.jpg', 0, '#');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bienthesanpham`
--

CREATE TABLE `bienthesanpham` (
  `id_bt` int(6) NOT NULL,
  `id_sanpham` int(6) NOT NULL,
  `mau` varchar(50) NOT NULL,
  `dungluong` varchar(50) NOT NULL,
  `soluong` int(10) NOT NULL,
  `trangthai` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_bl` int(6) NOT NULL,
  `id_sanpham` int(6) NOT NULL,
  `id_user` int(6) NOT NULL,
  `noidung` varchar(200) NOT NULL,
  `ngaybl` varchar(200) NOT NULL,
  `hoten` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_dm` int(10) NOT NULL,
  `tendm` varchar(200) NOT NULL,
  `mota` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_dm`, `tendm`, `mota`) VALUES
(1, 'Basas', NULL),
(2, 'Vintas', NULL),
(3, 'Urbas', NULL),
(4, 'Pattas', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id_dh` int(6) NOT NULL,
  `id_sanpham` int(6) NOT NULL,
  `tensp` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `soluong` int(10) NOT NULL,
  `ngaydathang` varchar(200) NOT NULL,
  `size` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangchitiet`
--

CREATE TABLE `donhangchitiet` (
  `id_ct` int(6) NOT NULL,
  `madh` int(6) NOT NULL,
  `nguoidat_ten` varchar(200) NOT NULL,
  `nguoidat_email` varchar(200) NOT NULL,
  `nguoidat_tell` varchar(20) NOT NULL,
  `nguoidat_diachi` varchar(500) NOT NULL,
  `total` int(10) NOT NULL,
  `voucher` varchar(50) NOT NULL,
  `tongthanhtoan` int(10) NOT NULL,
  `pttt` tinyint(1) NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanhbienthe`
--

CREATE TABLE `hinhanhbienthe` (
  `id_ha` int(6) NOT NULL,
  `img` varchar(200) NOT NULL,
  `id_bienthe` int(6) NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` int(6) NOT NULL,
  `voucher` varchar(20) NOT NULL,
  `mota` text NOT NULL,
  `giatri` int(7) NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`id`, `voucher`, `mota`, `giatri`, `trangthai`) VALUES
(1, 'HJASHG', 'GIẢM 30K', 30, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id_lh` int(6) NOT NULL,
  `id_user` int(6) NOT NULL,
  `noidung` text NOT NULL,
  `trangthai` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id_role` int(10) NOT NULL,
  `chuc_vu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id_role`, `chuc_vu`) VALUES
(1, 'Khách Hàng'),
(2, 'Admin'),
(3, 'Nhân Viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `view` int(20) DEFAULT NULL,
  `iddm` int(6) NOT NULL,
  `tinhtrang` tinyint(1) DEFAULT 0,
  `mota` text DEFAULT NULL,
  `img` varchar(200) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `name`, `view`, `iddm`, `tinhtrang`, `mota`, `img`, `price`) VALUES
(1, 'BASAS WORKADAY - LOW TOP - BLACK', 2, 1, 0, 'Gender: Unisex\r\nSize run: 35 – 46\r\nUpper: Canvas NE\r\nOutsole: Rubber', 'sp1_nau.jpg', 100),
(2, 'BASAS WORKADAY - LOW TOP - REAL TEAL', 10, 1, 0, 'Gender: Unisex\r\nSize run: 35 – 46\r\nUpper: Canvas NE\r\nOutsole: Rubber', 'sp2_den.jpg', 600),
(3, 'BASAS BUMPER GUM NE - LOW TOP - BLACK/GUM', 0, 2, 0, 'ánh dấu một bước trưởng thành nữa, Basas Bumper Gum NE (New Episode) ra đời với những cải tiến nhẹ nhàng nhưng đủ tạo được sự thay đổi trong cảm nhận khi trải nghiệm. Vẫn giữ ngoại hình gần như không thay để phát huy đặc tính ứng dụng cao của dòng Basas vốn đã được chứng minh, phần đế màu Gum thú vị và /Foxing thân/ mới làm nền cho phần chất liệu Upper được nâng cấp. Đây được xem là một trong những phiên bản được chúng tôi kì vọng có thể bền vững vượt qua thời gian và không gian, chắc chắn đáng để thử.\r\n', 'sp3_xanh.jpg', 800),
(4, 'TRACK 6 SUEDE MOONPHASE - LOW TOP - FOSSIL', 12, 4, 0, 'Dựa trên cảm hứng từ việc tái hiện những sắc xám (Grey) khác nhau hoà cùng những trạng thái ánh sáng trên bề mặt mặt trăng, Ananas Track 6 Suede Moonphase Pack sử dụng chất liệu da lộn (suede) đặc trưng, được phủ toàn bộ thân giày với tông màu sáng tối sắp xếp hài hoà hợp lý. Đây chắc chắn là một sản phẩm must have với những ai yêu thích chất suede và những gam màu Grey trung tính', 'sp4_den.jpg', 500),
(5, 'TRACK 7 SUEDE MOONPHASE - LOW TOP - FOSSIL', NULL, 2, 0, 'Dựa trên cảm hứng từ việc tái hiện những sắc xám (Grey) khác nhau hoà cùng những trạng thái ánh sáng trên bề mặt mặt trăng, Ananas Track 6 Suede Moonphase Pack sử dụng chất liệu da lộn (suede) đặc trưng, được phủ toàn bộ thân giày với tông màu sáng tối sắp xếp hài hoà hợp lý. Đây chắc chắn là một sản phẩm must have với những ai yêu thích chất suede và những gam màu Grey trung tính', 'sp5_trang.jpg', 500),
(8, 'TRACK 8 SUEDE MOONPHASE - LOW TOP - FOSSIL', NULL, 3, 0, 'Dựa trên cảm hứng từ việc tái hiện những sắc xám (Grey) khác nhau hoà cùng những trạng thái ánh sáng trên bề mặt mặt trăng, Ananas Track 6 Suede Moonphase Pack sử dụng chất liệu da lộn (suede) đặc trưng, được phủ toàn bộ thân giày với tông màu sáng tối sắp xếp hài hoà hợp lý. Đây chắc chắn là một sản phẩm must have với những ai yêu thích chất suede và những gam màu Grey trung tính.', 'sp6_trang.jpg', 500000),
(9, 'TRACK 4 SUEDE MOONPHASE - LOW TOP - FOSSIL', NULL, 3, 0, 'Dựa trên cảm hứng từ việc tái hiện những sắc xám (Grey) khác nhau hoà cùng những trạng thái ánh sáng trên bề mặt mặt trăng, Ananas Track 6 Suede Moonphase Pack sử dụng chất liệu da lộn (suede) đặc trưng, được phủ toàn bộ thân giày với tông màu sáng tối sắp xếp hài hoà hợp lý. Đây chắc chắn là một sản phẩm must have với những ai yêu thích chất suede và những gam màu Grey trung tính.', 'sp7_den.jpg', 600000),
(10, 'URBAS SC - LOW TOP - FAIR ORCHID', NULL, 4, 0, 'Gender: Unisex\r\nSize run: 35 – 46\r\nUpper: Canvas NE\r\nOutsole: Rubber', 'sp8_trang.jpg', 800000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(6) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `diachi` varchar(200) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `dienthoai` varchar(20) NOT NULL,
  `idrole` int(20) NOT NULL DEFAULT 1,
  `img` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `user_name`, `diachi`, `email`, `dienthoai`, `idrole`, `img`) VALUES
(1, 'admin', 'admin', 'admin', NULL, 'quanvyyyb@gmail.com', '0343147165', 2, NULL),
(2, 'hainam', 'hainam12', 'hải nam', NULL, 'hainam@gmail.com', '092138128', 1, NULL),
(3, 'yen1212', 'yen1212', 'Nhân Viên Yến', NULL, 'yen1212@gmail.com', '0343147122', 3, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`id_baiviet`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_baner`);

--
-- Chỉ mục cho bảng `bienthesanpham`
--
ALTER TABLE `bienthesanpham`
  ADD PRIMARY KEY (`id_bt`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_bl`),
  ADD KEY `lk_sp` (`id_sanpham`),
  ADD KEY `lk_user` (`id_user`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_dm`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_dh`);

--
-- Chỉ mục cho bảng `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  ADD PRIMARY KEY (`id_ct`),
  ADD KEY `lk_dh` (`madh`);

--
-- Chỉ mục cho bảng `hinhanhbienthe`
--
ALTER TABLE `hinhanhbienthe`
  ADD PRIMARY KEY (`id_ha`),
  ADD KEY `id_bienthe` (`id_bienthe`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id_lh`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `iddm` (`iddm`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `lk_role` (`idrole`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `id_baiviet` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id_baner` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bienthesanpham`
--
ALTER TABLE `bienthesanpham`
  MODIFY `id_bt` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_bl` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_dm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_dh` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  MODIFY `id_ct` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hinhanhbienthe`
--
ALTER TABLE `hinhanhbienthe`
  MODIFY `id_ha` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id_lh` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bienthesanpham`
--
ALTER TABLE `bienthesanpham`
  ADD CONSTRAINT `bienthesanpham_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sp`);

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `lk_sp` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sp`),
  ADD CONSTRAINT `lk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `donhangchitiet`
--
ALTER TABLE `donhangchitiet`
  ADD CONSTRAINT `lk_dh` FOREIGN KEY (`madh`) REFERENCES `donhang` (`id_dh`);

--
-- Các ràng buộc cho bảng `hinhanhbienthe`
--
ALTER TABLE `hinhanhbienthe`
  ADD CONSTRAINT `hinhanhbienthe_ibfk_1` FOREIGN KEY (`id_bienthe`) REFERENCES `bienthesanpham` (`id_bt`);

--
-- Các ràng buộc cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD CONSTRAINT `lienhe_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id_dm`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `lk_role` FOREIGN KEY (`idrole`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
