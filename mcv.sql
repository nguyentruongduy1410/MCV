-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2024 lúc 04:33 AM
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
-- Cơ sở dữ liệu: `mcv`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bai_viet`
--

CREATE TABLE `bai_viet` (
  `id` int(11) NOT NULL,
  `ten_bv` varchar(255) NOT NULL,
  `noi_dung` text NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `ngay_dang` date DEFAULT NULL,
  `mo_ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bai_viet`
--

INSERT INTO `bai_viet` (`id`, `ten_bv`, `noi_dung`, `hinh_anh`, `ngay_dang`, `mo_ta`) VALUES
(1, 'Giới thiệu sản phẩm A', 'Sản phẩm A là sản phẩm mới ra mắt, với nhiều tính năng vượt trội...', 'hinh_a.jpg', '2024-11-17', 'Giới thiệu sản phẩm A với tính năng vượt trội.'),
(2, 'Đánh giá sản phẩm B', 'Sản phẩm B là lựa chọn tốt cho người dùng phổ thông...', 'hinh_b.jpg', '2024-11-17', 'Đánh giá sản phẩm B cho người dùng phổ thông.'),
(3, 'Hướng dẫn sử dụng sản phẩm C', 'Cách sử dụng sản phẩm C đơn giản và hiệu quả...', 'hinh_c.jpg', '2024-11-17', 'Hướng dẫn sử dụng sản phẩm C hiệu quả.'),
(4, 'So sánh sản phẩm D và E', 'Hai sản phẩm D và E đều có ưu điểm riêng...', 'hinh_d_e.jpg', '2024-11-17', 'So sánh sản phẩm D và E với ưu điểm riêng.'),
(5, 'Cập nhật công nghệ mới', 'Công nghệ mới nhất năm nay mang lại nhiều thay đổi...', 'hinh_cong_nghe.jpg', '2024-11-17', 'Cập nhật công nghệ mới nhất năm nay.'),
(6, 'Top 5 sản phẩm bán chạy', 'Dưới đây là 5 sản phẩm được yêu thích và bán chạy nhất...', 'top5.jpg', '2024-11-17', 'Danh sách top 5 sản phẩm bán chạy nhất.'),
(7, 'Kinh nghiệm chọn mua sản phẩm F', 'Chọn mua sản phẩm F phù hợp với nhu cầu...', 'hinh_f.jpg', '2024-11-17', 'Kinh nghiệm chọn mua sản phẩm F.'),
(8, 'Ưu đãi tháng này', 'Tháng này có rất nhiều ưu đãi hấp dẫn cho các sản phẩm...', 'hinh_uu_dai.jpg', '2024-11-17', 'Ưu đãi hấp dẫn cho các sản phẩm tháng này.'),
(9, 'Cách bảo quản sản phẩm G', 'Để sản phẩm G luôn bền đẹp, cần lưu ý một số điểm...', 'hinh_g.jpg', '2024-11-17', 'Hướng dẫn bảo quản sản phẩm G bền đẹp.'),
(10, 'Xu hướng sản phẩm năm nay', 'Năm nay, các sản phẩm công nghệ có xu hướng...', 'hinh_xu_huong.jpg', '2024-11-17', 'Xu hướng sản phẩm công nghệ năm nay.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_bl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`id`, `id_user`, `id_sp`, `noi_dung`, `ngay_bl`) VALUES
(1, 1, 1, 'Rất hài lòng với sản phẩm!', '2024-11-14'),
(2, 2, 2, 'Chất lượng đáng đồng tiền bát gạo.', '2024-11-14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) GENERATED ALWAYS AS (`quantity` * `price`) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_don_hang`
--

CREATE TABLE `chitiet_don_hang` (
  `id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `id_dh` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_don_hang`
--

INSERT INTO `chitiet_don_hang` (`id`, `id_sp`, `id_dh`, `so_luong`, `gia`) VALUES
(1, 1, 1, 2, 5000000.00),
(2, 2, 1, 1, 330000.00),
(3, 3, 2, 4, 2700000.00),
(4, 4, 2, 3, 3000000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL,
  `ten_dm` varchar(255) NOT NULL,
  `hinh_dm` varchar(255) DEFAULT NULL,
  `stt_dm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `ten_dm`, `hinh_dm`, `stt_dm`) VALUES
(1, 'Đàn Tranh', 'dienthoai.jpg', 1),
(2, 'Đàn Nguyệt', 'laptop.jpg', 2),
(3, 'Đàn Nhị', 'tablet.jpg', 3),
(4, 'Đàn Đá', 'dienthoai.jpg', 4),
(5, 'Kèn Bầu', 'laptop.jpg', 5),
(6, 'Sáo Bầu', 'tablet.jpg', 6),
(7, 'Cồng Chiên', 'dienthoai.jpg', 7),
(8, 'Đàn Bầu', 'laptop.jpg', 8),
(9, 'Đàn Tỳ Bà', 'tablet.jpg', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `ngay_dat_hang` date NOT NULL,
  `trangthai_dh` varchar(50) DEFAULT NULL,
  `tong_tien` decimal(15,2) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_gg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id`, `ngay_dat_hang`, `trangthai_dh`, `tong_tien`, `id_user`, `id_gg`) VALUES
(1, '2024-08-15', 'Đang xử lý', 500000.00, 1, 1),
(2, '2024-09-20', 'Đã giao', 1000000.00, 2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_anh_chi_tiet`
--

CREATE TABLE `hinh_anh_chi_tiet` (
  `id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `hinh_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh_anh_chi_tiet`
--

INSERT INTO `hinh_anh_chi_tiet` (`id`, `id_sp`, `hinh_url`) VALUES
(1, 1, 'sp1.jpg'),
(2, 1, 'sp1.1.jpg'),
(3, 1, 'sp1.2.jpg'),
(4, 2, 'sp2.jpg'),
(5, 2, 'sp2.1.jpg'),
(6, 2, 'sp2.2.jpg'),
(7, 3, 'sp3.jpg'),
(8, 3, 'sp3.1.jpg'),
(9, 3, 'sp3.2.jpg'),
(10, 4, 'sp4.jpg'),
(11, 4, 'sp4.1.jpg'),
(12, 4, 'sp4.2.jpg'),
(13, 5, 'sp10.jpg'),
(14, 5, 'sp10.1.jpg'),
(15, 5, 'sp2.2.jpg'),
(16, 6, 'sp11.jpg'),
(17, 6, 'sp11.1.jpg'),
(18, 6, 'sp11.2.jpg'),
(19, 7, 'sp12.jpg'),
(20, 7, 'sp12.1.jpg'),
(21, 7, 'sp12.2.jpg'),
(22, 8, 'sp13.jpg'),
(23, 8, 'sp13.1.jpg'),
(24, 8, 'sp13.2.jpg'),
(25, 9, 'sp20.jpg'),
(26, 9, 'sp20.1.jpg'),
(27, 9, 'sp20.2.jpg'),
(28, 10, 'sp21.jpg'),
(29, 10, 'sp21.1.jpg'),
(30, 10, 'sp21.2.jpg'),
(31, 11, 'sp22.jpg'),
(32, 11, 'sp22.1.jpg'),
(33, 11, 'sp22.2.jpg'),
(34, 12, 'sp23.jpg'),
(35, 12, 'sp23.1.jpg'),
(36, 12, 'sp23.2.jpg'),
(37, 13, 'sp30.jpg'),
(38, 13, 'sp30.1.jpg'),
(39, 13, 'sp30.2.jpg'),
(40, 14, 'sp31.jpg'),
(41, 14, 'sp31.1.jpg'),
(42, 14, 'sp31.2.jpg'),
(43, 15, 'sp32.jpg'),
(44, 15, 'sp32.1.jpg'),
(45, 15, 'sp32.2.jpg'),
(46, 16, 'sp33.jpg'),
(47, 16, 'sp33.1.jpg'),
(48, 16, 'sp33.2.jpg'),
(49, 17, 'sp40.jpg'),
(50, 17, 'sp40.1.jpg'),
(51, 17, 'sp40.2.jpg'),
(52, 18, 'sp41.jpg'),
(53, 18, 'sp41.1.jpg'),
(54, 18, 'sp41.2.jpg'),
(55, 19, 'sp42.jpg'),
(56, 19, 'sp42.1.jpg'),
(57, 19, 'sp42.2.jpg'),
(58, 20, 'sp43.jpg'),
(59, 20, 'sp43.1.jpg'),
(60, 20, 'sp43.2.jpg'),
(61, 21, 'sp50.jpg'),
(62, 21, 'sp50.1.jpg'),
(63, 21, 'sp50.2.jpg'),
(64, 22, 'sp51.jpg'),
(65, 22, 'sp51.1.jpg'),
(66, 22, 'sp51.2.jpg'),
(67, 23, 'sp52.jpg'),
(68, 23, 'sp52.1.jpg'),
(69, 23, 'sp52.2.jpg'),
(70, 24, 'sp53.jpg'),
(71, 24, 'sp53.1.jpg'),
(72, 24, 'sp53.2.jpg'),
(73, 25, 'sp60.jpg'),
(74, 25, 'sp60.1.jpg'),
(75, 25, 'sp60.2.jpg'),
(76, 26, 'sp61.jpg'),
(77, 26, 'sp61.1.jpg'),
(78, 26, 'sp61.2.jpg'),
(79, 27, 'sp62.jpg'),
(80, 27, 'sp62.1.jpg'),
(81, 27, 'sp62.2.jpg'),
(82, 28, 'sp63.jpg'),
(83, 28, 'sp63.1.jpg'),
(84, 28, 'sp63.2.jpg'),
(85, 29, 'sp70.jpg'),
(86, 29, 'sp70.1.jpg'),
(87, 29, 'sp70.2.jpg'),
(88, 30, 'sp71.jpg'),
(89, 30, 'sp71.1.jpg'),
(90, 30, 'sp71.2.jpg'),
(91, 31, 'sp72.jpg'),
(92, 31, 'sp72.1.jpg'),
(93, 31, 'sp72.2.jpg'),
(94, 32, 'sp73.jpg'),
(95, 32, 'sp73.1.jpg'),
(96, 32, 'sp73.2.jpg'),
(97, 33, 'sp80.jpg'),
(98, 33, 'sp80.1.jpg'),
(99, 33, 'sp80.2.jpg'),
(100, 34, 'sp81.jpg'),
(101, 34, 'sp81.1.jpg'),
(102, 34, 'sp81.2.jpg'),
(103, 35, 'sp82.jpg'),
(104, 35, 'sp82.1.jpg'),
(105, 35, 'sp82.2.jpg'),
(106, 36, 'sp83.jpg'),
(107, 36, 'sp83.1.jpg'),
(108, 36, 'sp83.2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ma_giam_gia`
--

CREATE TABLE `ma_giam_gia` (
  `id_gg` int(11) NOT NULL,
  `code_giam_gia` varchar(50) NOT NULL,
  `so_tien_giam` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ma_giam_gia`
--

INSERT INTO `ma_giam_gia` (`id_gg`, `code_giam_gia`, `so_tien_giam`) VALUES
(1, 'Giảm 10%', 10.00),
(2, 'Giảm 20%', 20.00),
(3, 'Giảm 30%', 30.00),
(4, 'Giảm 40%', 40.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `id_dm` int(11) NOT NULL,
  `ten_sp` varchar(255) NOT NULL,
  `gia_sp` decimal(15,2) DEFAULT NULL,
  `giamgia_sp` decimal(15,2) DEFAULT NULL,
  `hinh_sp` varchar(255) DEFAULT NULL,
  `dacbiet_sp` tinyint(1) DEFAULT NULL,
  `ngay_nhap` date DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `thong_tin_sp` text DEFAULT NULL,
  `an_hien` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `id_dm`, `ten_sp`, `gia_sp`, `giamgia_sp`, `hinh_sp`, `dacbiet_sp`, `ngay_nhap`, `mo_ta`, `thong_tin_sp`, `an_hien`) VALUES
(1, 1, 'Đàn tranh 19 dây gỗ cẩm', 5000000.00, 4700000.00, 'sp1.jpg', 0, '2024-11-17', 'Đàn tranh cao cấp gỗ cẩm', 'Thông tin chi tiết về đàn tranh gỗ cẩm', 1),
(2, 1, 'Đàn tranh 19 dây gỗ mun', 330000.00, 3000000.00, 'sp2.jpg', 0, '2024-11-17', 'Đàn tranh gỗ mun chất lượng', 'Thông tin chi tiết về đàn tranh gỗ mun', 1),
(3, 1, 'Đàn tranh 17 dây gỗ mun', 2700000.00, 2500000.00, 'sp3.jpg', 0, '2024-11-17', 'Đàn tranh 17 dây đẹp', 'Thông tin chi tiết về đàn tranh 17 dây', 1),
(4, 1, 'Đàn tranh 19 dây gỗ hương', 3000000.00, 2500000.00, 'sp4.jpg', 0, '2024-11-17', 'Đàn tranh gỗ hương cao cấp', 'Thông tin chi tiết về đàn tranh gỗ hương', 1),
(5, 2, 'Đàn nguyệt gỗ mun công gô khảm trai', 2200000.00, 20000000.00, 'sp10.jpg', 0, '2024-11-17', 'Đàn nguyệt khảm trai tinh tế', 'Thông tin chi tiết về đàn nguyệt gỗ mun', 1),
(6, 2, 'Đàn kìm nguyệt trạm rồng đẹp', 300000.00, 2700000.00, 'sp11.jpg', 0, '2024-11-17', 'Đàn nguyệt trạm rồng nghệ thuật', 'Thông tin chi tiết về đàn nguyệt trạm rồng', 1),
(7, 2, 'Đàn nguyệt Bắc gắn mobin có khảm 10 phím', 1200000.00, 1000000.00, 'sp12.jpg', 0, '2024-11-17', 'Đàn nguyệt Bắc truyền thống', 'Thông tin chi tiết về đàn nguyệt Bắc', 1),
(8, 2, 'Đàn nguyệt gắn mobin có khảm', 1200000.00, 1000000.00, 'sp13.jpg', 0, '2024-11-17', 'Đàn nguyệt cao cấp', 'Thông tin chi tiết về đàn nguyệt gắn mobin', 1),
(9, 3, 'Đàn nhị gỗ lim', 800000.00, 700000.00, 'sp20.jpg', 0, '2024-11-17', 'Đàn nhị truyền thống', 'Thông tin chi tiết về đàn nhị gỗ lim', 1),
(10, 3, 'Đàn nhị gỗ cẩm lai gắn mobin', 110000.00, 1000000.00, 'sp21.jpg', 0, '2024-11-17', 'Đàn nhị gỗ cẩm lai', 'Thông tin chi tiết về đàn nhị gỗ cẩm lai', 1),
(11, 3, 'Đàn nhị dân tộc Việt Nam', 600000.00, 500000.00, 'sp22.jpg', 0, '2024-11-17', 'Đàn nhị dân tộc', 'Thông tin chi tiết về đàn nhị Việt Nam', 1),
(12, 3, 'Đàn nhị trung quốc erhu gỗ gụ', 5000000.00, 400000.00, 'sp23.jpg', 0, '2024-11-17', 'Đàn nhị erhu gỗ gụ', 'Thông tin chi tiết về đàn nhị trung quốc', 1),
(13, 4, 'Chế tác sản xuất đàn đá biểu diễn dạy học bảo tồn', 2200000.00, 2000000.00, 'sp30.jpg', 0, '2024-11-17', 'Đàn đá chế tác chuyên nghiệp', 'Thông tin chi tiết về đàn đá biểu diễn', 1),
(14, 4, 'Đàn đá biểu diễn 15 thanh', 330000.00, 300000.00, 'sp31.jpg', 0, '2024-11-17', 'Đàn đá biểu diễn cao cấp', 'Thông tin chi tiết về đàn đá 15 thanh', 1),
(15, 4, 'Đàn đá loại lớn biểu diễn trưng bày', 5000000.00, 4700000.00, 'sp32.jpg', 1, '2024-11-17', 'Đàn đá lớn nghệ thuật', 'Thông tin chi tiết về đàn đá trưng bày', 1),
(16, 4, 'Đàn đá nhỏ mini trang trí trưng bày', 5000000.00, 4700000.00, 'sp33.jpg', 0, '2024-11-17', 'Đàn đá nhỏ xinh xắn', 'Thông tin chi tiết về đàn đá mini', 1),
(17, 5, 'Kèn tiểu sona tông F', 900000.00, 800000.00, 'sp40.jpg', 0, '2024-11-17', 'Kèn tiểu sona tông F', 'Thông tin chi tiết về kèn tiểu sona tông F', 1),
(18, 5, 'Kèn tiểu sona tông E', 900000.00, 800000.00, 'sp41.jpg', 0, '2024-11-17', 'Kèn tiểu sona tông E', 'Thông tin chi tiết về kèn tiểu sona tông E', 1),
(19, 5, 'Kèn tàu tone G nhỏ bát đồng', 900000.00, 800000.00, 'sp42.jpg', 0, '2024-11-17', 'Kèn tàu tone G nhỏ bát đồng', 'Thông tin chi tiết về kèn tàu tone G nhỏ bát đồng', 1),
(20, 5, 'Kèn sona tone D dọc gỗ mun', 900000.00, 800000.00, 'sp43.jpg', 0, '2024-11-17', 'Kèn sona tone D dọc gỗ mun', 'Thông tin chi tiết về kèn sona tone D dọc gỗ mun', 1),
(21, 6, 'Sáo bầu bằng kim loại', 600000.00, 500000.00, 'sp50.jpg', 0, '2024-11-17', 'Sáo bầu bằng kim loại', 'Thông tin chi tiết về sáo bầu bằng kim loại', 1),
(22, 6, 'Sáo bầu giả ngọc xanh lục', 50000.00, 400000.00, 'sp51.jpg', 0, '2024-11-17', 'Sáo bầu giả ngọc xanh lục', 'Thông tin chi tiết về sáo bầu giả ngọc xanh lục', 1),
(23, 6, 'Sáo bầu giả ngọc lục bảo tone B C', 500000.00, 400000.00, 'sp52.jpg', 0, '2024-11-17', 'Sáo bầu giả ngọc lục bảo tone B C', 'Thông tin chi tiết về sáo bầu giả ngọc lục bảo tone B C', 1),
(24, 6, 'Sáo bầu giả gỗ gụ', 500000.00, 400000.00, 'sp53.jpg', 0, '2024-11-17', 'Sáo bầu giả gỗ gụ', 'Thông tin chi tiết về sáo bầu giả gỗ gụ', 1),
(25, 7, 'Chiêng đồng 20 cm hoa văn trống đồng', 5200000.00, 5000000.00, 'sp60.jpg', 0, '2024-11-17', 'Chiêng đồng 20 cm hoa văn trống đồng', 'Thông tin chi tiết về chiêng đồng hoa văn trống đồng', 1),
(26, 7, 'Bộ cồng chiêng trạm rồng 50cm', 330000.00, 300000.00, 'sp61.jpg', 0, '2024-11-17', 'Bộ cồng chiêng trạm rồng 50cm', 'Thông tin chi tiết về bộ cồng chiêng trạm rồng', 1),
(27, 7, 'Chiêng đồng đen trạm rồng 80 cm', 5000000.00, 400000.00, 'sp62.jpg', 1, '2024-11-17', 'Chiêng đồng đen trạm rồng 80 cm', 'Thông tin chi tiết về chiêng đồng đen trạm rồng', 1),
(28, 7, 'Chiêng đồng 45cm', 5000000.00, 4700000.00, 'sp63.jpg', 0, '2024-11-17', 'Chiêng đồng 45cm', 'Thông tin chi tiết về chiêng đồng 45cm', 1),
(29, 8, 'Đàn bầu gấp nhỏ gỗ hương khảm', 1700000.00, 1500000.00, 'sp70.jpg', 0, '2024-11-17', 'Đàn bầu gấp nhỏ gỗ hương khảm', 'Thông tin chi tiết về đàn bầu gỗ hương khảm', 1),
(30, 8, 'Đàn bầu thẳng khảm trai', 80000.00, 700000.00, 'sp71.jpg', 0, '2024-11-17', 'Đàn bầu thẳng khảm trai', 'Thông tin chi tiết về đàn bầu thẳng khảm trai', 1),
(31, 8, 'Đàn bầu điện thẳng gỗ mun đen khảm hoa văn', 2500000.00, 2400000.00, 'sp72.jpg', 0, '2024-11-17', 'Đàn bầu điện thẳng gỗ mun đen khảm hoa văn', 'Thông tin chi tiết về đàn bầu điện thẳng gỗ mun đen khảm hoa văn', 1),
(32, 8, 'Đàn bầu gỗ hương đỏ khảm hoa gấp gọn', 1700000.00, 1600000.00, 'sp73.jpg', 0, '2024-11-17', 'Đàn bầu gỗ hương đỏ khảm hoa gấp gọn', 'Thông tin chi tiết về đàn bầu gỗ hương đỏ khảm hoa gấp gọn', 1),
(33, 9, 'Đàn tỳ bà gỗ hương không khảm', 2400000.00, 2000000.00, 'sp80.jpg', 0, '2024-11-17', 'Đàn tỳ bà gỗ hương không khảm', 'Thông tin chi tiết về đàn tỳ bà gỗ hương không khảm', 1),
(34, 9, 'Đàn tỳ bà Việt Nam khảm trai', 150000.00, 130000.00, 'sp81.jpg', 0, '2024-11-17', 'Đàn tỳ bà Việt Nam khảm trai', 'Thông tin chi tiết về đàn tỳ bà Việt Nam khảm trai', 1),
(35, 9, 'Đàn tỳ bà Việt Nam gỗ mun', 3000000.00, 2700000.00, 'sp82.jpg', 0, '2024-11-17', 'Đàn tỳ bà Việt Nam gỗ mun', 'Thông tin chi tiết về đàn tỳ bà Việt Nam gỗ mun', 1),
(36, 9, 'Đàn tỳ bà chạm rồng phượng', 5000000.00, 4700000.00, 'sp83.jpg', 1, '2024-11-17', 'Đàn tỳ bà chạm rồng phượng', 'Thông tin chi tiết về đàn tỳ bà chạm rồng phượng', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `id` int(11) NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `don_gia` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `vocher` varchar(50) DEFAULT NULL,
  `thanh_tien` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mk` varchar(255) NOT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `vaitro` varchar(50) DEFAULT NULL,
  `diachi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `mk`, `sdt`, `vaitro`, `diachi`) VALUES
(1, 'a@gmail.com', 'password1', '0123456789', 'customer', 'Địa chỉ A'),
(2, 'b@gmail.com', 'password2', '0987654321', 'customer', 'Địa chỉ B');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bai_viet`
--
ALTER TABLE `bai_viet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `chitiet_don_hang`
--
ALTER TABLE `chitiet_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `id_dh` (`id_dh`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_gg` (`id_gg`);

--
-- Chỉ mục cho bảng `hinh_anh_chi_tiet`
--
ALTER TABLE `hinh_anh_chi_tiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `ma_giam_gia`
--
ALTER TABLE `ma_giam_gia`
  ADD PRIMARY KEY (`id_gg`),
  ADD UNIQUE KEY `code_giam_gia` (`code_giam_gia`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dm` (`id_dm`);

--
-- Chỉ mục cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bai_viet`
--
ALTER TABLE `bai_viet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitiet_don_hang`
--
ALTER TABLE `chitiet_don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `hinh_anh_chi_tiet`
--
ALTER TABLE `hinh_anh_chi_tiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT cho bảng `ma_giam_gia`
--
ALTER TABLE `ma_giam_gia`
  MODIFY `id_gg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `san_pham` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `san_pham` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `chitiet_don_hang`
--
ALTER TABLE `chitiet_don_hang`
  ADD CONSTRAINT `chitiet_don_hang_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `san_pham` (`id`),
  ADD CONSTRAINT `chitiet_don_hang_ibfk_2` FOREIGN KEY (`id_dh`) REFERENCES `don_hang` (`id`);

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `don_hang_ibfk_2` FOREIGN KEY (`id_gg`) REFERENCES `ma_giam_gia` (`id_gg`);

--
-- Các ràng buộc cho bảng `hinh_anh_chi_tiet`
--
ALTER TABLE `hinh_anh_chi_tiet`
  ADD CONSTRAINT `hinh_anh_chi_tiet_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `san_pham` (`id`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`id_dm`) REFERENCES `danh_muc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
