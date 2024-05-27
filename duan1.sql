-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 22, 2024 lúc 06:44 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

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
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT 0,
  `bill_name` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_tel` varchar(255) NOT NULL,
  `bill_email` varchar(255) NOT NULL,
  `bill_pttt` tinyint(1) NOT NULL COMMENT '1.Thanh toán trực tiếp 2.Chuyển khoản 3.Thanh toán online',
  `ngaydathang` datetime DEFAULT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `bill_status` tinyint(1) DEFAULT 0 COMMENT '1.Đang chờ 2.Đang giao hàng 3.Đã giao hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `size` int(11) NOT NULL,
  `price` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`cart_id`, `user_id`, `product_id`, `img`, `name`, `size`, `price`, `soluong`, `thanhtien`, `bill_id`) VALUES
(1, 1, 4, 'quan4.jpg', 'Quần boy three', 29, 368000, 1, 368000, 2),
(2, 1, 6, 'ao1.jpg', 'Áo boy one', 0, 299000, 2, 598000, 3),
(3, 1, 3, 'quan3.jpg', 'Quần boy two', 29, 299000, 2, 598000, 4),
(4, 1, 6, 'ao1.jpg', 'Áo boy one', 0, 299000, 1, 299000, 4),
(5, 1, 11, 'thatlung.jpg', 'Phụ kiện two', 0, 200000, 1, 200000, 4),
(6, 1, 4, 'quan4.jpg', 'Quần boy three', 29, 368000, 1, 368000, 5),
(7, 1, 1, 'quan1.jpg', 'Quần boy one', 29, 399000, 1, 399000, 6),
(8, 0, 3, 'quan3.jpg', 'Quần boy two', 0, 299000, 1, 299000, 7),
(9, 0, 1, 'quan1.jpg', 'Quần boy one', 29, 399000, 2, 798000, 8),
(10, 0, 6, 'ao1.jpg', 'Áo boy one', 0, 299000, 1, 299000, 8),
(11, 0, 3, 'quan3.jpg', 'Quần boy two', 0, 299000, 1, 299000, 9),
(12, 0, 7, 'ao3.jpg', 'Áo boy two', 0, 199000, 1, 199000, 10),
(13, 0, 7, 'ao3.jpg', 'Áo boy two', 0, 199000, 1, 199000, 11),
(14, 0, 10, 'vida.jpg', 'Phụ kiện 1', 0, 199000, 2, 398000, 11),
(15, 0, 10, 'vida.jpg', 'Phụ kiện 1', 0, 199000, 1, 199000, 11),
(16, 0, 7, 'ao3.jpg', 'Áo boy two', 0, 199000, 1, 199000, 12),
(17, 0, 3, 'quan3.jpg', 'Quần boy two', 0, 299000, 1, 299000, 13),
(18, 0, 6, 'ao1.jpg', 'Áo boy one', 0, 299000, 2, 598000, 14),
(19, 0, 3, 'quan3.jpg', 'Quần boy two', 0, 299000, 1, 299000, 17),
(20, 3, 3, 'quan3.jpg', 'Quần boy two', 0, 299000, 1, 299000, 18),
(21, 3, 6, 'ao1.jpg', 'Áo boy one', 0, 299000, 1, 299000, 19);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`category_id`, `category_name`, `img`) VALUES
(1, 'Áo', ''),
(7, 'Quần', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `ngaybinhluan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img`
--

CREATE TABLE `img` (
  `id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mausac`
--

CREATE TABLE `mausac` (
  `id` int(11) NOT NULL,
  `mausac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `view` int(11) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `description`, `view`, `img`, `category_id`, `role`) VALUES
(27, 'SamSung1', 250000, 'ádd', NULL, 'ao-in-hinh_548.jpg', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `phone`, `address`, `role`) VALUES
(4, 'admin', 'hoantph33008@fpt.edu.vn', '123', '0326376538', 'Trịnh Văn Bô', 1),
(5, 'ad', '', '123', '', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variants`
--

CREATE TABLE `variants` (
  `variant_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_quan` varchar(255) NOT NULL,
  `size_ao` varchar(255) NOT NULL,
  `size_phukien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `variants`
--

INSERT INTO `variants` (`variant_id`, `quantity`, `product_id`, `size_quan`, `size_ao`, `size_phukien`) VALUES
(1, 100, 1, '28', '', ''),
(2, 99, 1, '29', '', ''),
(3, 99, 1, '30', '', ''),
(4, 99, 1, '31', '', ''),
(5, 100, 3, '28', '', ''),
(6, 99, 3, '29', '', ''),
(7, 99, 3, '30', '', ''),
(8, 99, 3, '31', '', ''),
(9, 100, 4, '28', '', ''),
(10, 99, 4, '29', '', ''),
(11, 99, 4, '30', '', ''),
(12, 99, 4, '31', '', ''),
(13, 100, 5, '28', '', ''),
(14, 99, 5, '29', '', ''),
(15, 99, 5, '30', '', ''),
(16, 50, 6, '', 'M', ''),
(17, 50, 6, '', 'L', ''),
(18, 50, 6, '', 'XL', ''),
(19, 50, 6, '', 'XXL', ''),
(20, 50, 7, '', 'M', ''),
(21, 50, 7, '', 'L', ''),
(22, 50, 7, '', 'XL', ''),
(23, 50, 7, '', 'XXL', ''),
(24, 50, 8, '', 'M', ''),
(25, 50, 8, '', 'L', ''),
(26, 50, 8, '', 'XL', ''),
(27, 50, 8, '', 'XXL', ''),
(28, 50, 9, '', 'M', ''),
(29, 50, 9, '', 'L', ''),
(30, 50, 9, '', 'XL', ''),
(31, 20, 10, '', '', 'To'),
(32, 21, 10, '', '', 'Nhỏ'),
(33, 21, 10, '', '', 'Vừa'),
(34, 20, 11, '', '', 'To'),
(35, 21, 11, '', '', 'Nhỏ'),
(36, 21, 11, '', '', 'Vừa'),
(37, 20, 12, '', '', 'To'),
(38, 21, 12, '', '', 'Nhỏ'),
(39, 21, 12, '', '', 'Vừa');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`variant_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `categorys`
--
ALTER TABLE `categorys`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `img`
--
ALTER TABLE `img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `variants`
--
ALTER TABLE `variants`
  MODIFY `variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `img_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
