-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 04:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhacungcap`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertEmployees` ()   BEGIN
    DECLARE i INT DEFAULT 1;
    START TRANSACTION;
    WHILE i <= 1000000 DO
        INSERT INTO employees (name, email, department)
        VALUES (
            CONCAT('Employee', i),
            CONCAT('employee', i, '@example.com'),
            CONCAT('Department', i % 10)
        );
        SET i = i + 1;
    END WHILE;
    COMMIT;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `ten`) VALUES
(5, 'Laptop'),
(6, 'PC'),
(7, 'Đồng hồ'),
(8, 'Tai nghe'),
(9, 'Chuột'),
(10, 'Ipad'),
(11, 'Loa'),
(13, 'tesst');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id` int(11) NOT NULL,
  `ten_khach_hang` varchar(255) NOT NULL,
  `ngay_mua` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mo_ta` varchar(255) DEFAULT NULL,
  `tong_tien` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`id`, `ten_khach_hang`, `ngay_mua`, `mo_ta`, `tong_tien`) VALUES
(80, 'quyc300', '2024-11-22 14:44:32', 'Khách mua hàng', 25100000),
(82, 'quyc300', '2024-11-22 14:44:34', 'Khách mua hàng', 12400000),
(84, 'quyc200', '2024-11-22 14:44:39', 'Khách mua hàng', 12400000),
(88, 'quyc400', '2024-11-22 14:44:42', 'Khách mua hàng', 25700000),
(89, 'quyc100', '2024-11-22 14:44:46', 'Khách mua hàng', 14634570),
(90, 'quylor', '2024-11-22 14:44:52', 'Khách mua hàng', 14934570),
(91, 'quydark', '2024-11-22 14:44:56', 'Khách mua hàng', 14634570),
(92, 'quy8386', '2024-11-22 14:45:01', 'Khách mua hàng', 13000000),
(93, 'quyyss', '2024-11-22 14:45:06', 'Khách mua hàng', 13000000),
(94, 'quyaka', '2024-11-22 14:45:11', 'Khách mua hàng', 13000000),
(95, 'quytest', '2024-11-22 14:45:13', 'Khách mua hàng', 25100000),
(96, 'quylo', '2024-11-22 14:45:17', 'Khách mua hàng', 37200000),
(97, 'quy123', '2024-11-22 14:45:21', 'Khách mua hàng', 12400000),
(98, 'quylo123', '2024-06-11 23:33:34', 'Khách mua hàng', 344000000),
(99, 'quylo', '2024-11-22 14:45:26', 'Khách mua hàng', 99000000),
(100, 'quylo', '2024-11-22 14:45:27', 'Khách mua hàng', 93700000),
(101, 'quylo', '2024-11-22 14:45:28', 'Khách mua hàng', 14000000),
(102, 'quylo', '2024-11-22 14:45:30', 'Khách mua hàng', 97343456),
(103, 'quylo', '2024-11-22 14:45:32', 'Khách mua hàng', 18200000),
(104, 'quylo', '2024-11-22 14:45:33', 'Khách mua hàng', 71800000),
(105, 'quy1', '2024-11-22 14:06:41', 'Khách mua hàng', 75700000),
(106, 'quy1', '2024-11-22 14:42:54', 'Khách mua hàng', 105000000),
(107, 'quy1', '2024-11-22 14:47:55', 'Khách mua hàng', 42000000),
(108, 'quy1', '2024-11-23 07:23:11', 'Khách mua hàng', 99000000),
(109, 'quy1', '2024-12-05 15:36:32', 'Khách mua hàng', 157000000),
(110, 'quy1', '2024-12-05 17:23:48', 'Khách mua hàng', 108000000),
(111, 'quy', '2024-12-07 13:50:33', 'Khách mua hàng', 34000000);

-- --------------------------------------------------------

--
-- Table structure for table `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `quoc_gia` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `ma_so_thue` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `nguoi_dai_dien` varchar(255) NOT NULL,
  `mo_ta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`id`, `ten`, `quoc_gia`, `email`, `sdt`, `ma_so_thue`, `dia_chi`, `nguoi_dai_dien`, `mo_ta`) VALUES
(2, 'Nhà cung cấp 2', 'VN', 'ncc2@gmail.com', '0988888888', '222222', 'Hai Bà Trưng - Hà Nội ', 'Nguyễn Văn B ', 'Công ty số 2 Việt Nam'),
(3, 'Nhà cung cấp 3', 'VN', 'ncc3@gmail.com', '090415151', '444444', 'Hoàn Kiếm - Hà Nội', 'Nguyễn Văn C', 'Công ty số 3 Việt Nam'),
(7, 'Nhà cung cấp 5', NULL, 'ncc5@gmail.com', '3121414', '1321313', 'La thành Hà nội', 'Quý 8386 ', 'mô tả 2'),
(12, 'Nhà cung cấp 123', NULL, 'ncc1@gmail.com', '090415151', '111111', 'Hà Đông - Hà Nội', 'Nguyễn Văn A', 'Công ty số 1 Việt Nam'),
(21, 'Nhà cung cấp 41414', NULL, 'namobilegame@gmail.com', '3121414', '1111111111', 'La thành Hà nội', 'Nguyễn Văn A', 'mô tả 2'),
(25, 'Nhà cung cấp 9', NULL, 'namfdasme@gmail.com', '094132123412', '124124', 'La thành Hà nội', 'Quý C300', 'mô tả 9'),
(27, 'nhà cc 2', NULL, 'cc2@gmail.com', '2313123', '4124124124', 'nhà cc 2', 'nhà cc 2', 'nhà cc 2'),
(28, 'nhà cung cấp 100', NULL, 'ncc10@gmail.com', '094132123412', '1111111111', 'La thành Hà nội', 'Nguyễn Văn D', 'nhà cung cấp 10'),
(40, 'test', NULL, 'namobilegame@gmail.com', '0961252867', '1111111111', 'La thành Hà nội', 'Quý trùm nodejs', 'test'),
(52, 'testfdsafsdfas', NULL, 'tét@gmail.com', '3213213124124', '', 'fsdafasdf', 'test 123 ', 'fsdafasdftetst'),
(54, 'testtest', NULL, 'domixi123@gmail.com', '09413212123', '1234', '1234', 'Nguyễn Văn A', 'mô tả 22222');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham_hoadon`
--

CREATE TABLE `sanpham_hoadon` (
  `id` int(11) NOT NULL,
  `san_pham_id` int(11) NOT NULL,
  `hoa_don_id` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia_ban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham_hoadon`
--

INSERT INTO `sanpham_hoadon` (`id`, `san_pham_id`, `hoa_don_id`, `so_luong`, `gia_ban`) VALUES
(14, 2, 14, 1, 110000),
(15, 4, 14, 1, 415),
(16, 2, 15, 1, 110000),
(17, 4, 15, 1, 415),
(18, 2, 16, 1, 110000),
(19, 4, 16, 1, 415),
(20, 2, 17, 1, 110000),
(21, 4, 17, 1, 415),
(22, 2, 19, 1, 110000),
(23, 4, 19, 1, 415),
(24, 4, 20, 2, 415),
(25, 7, 20, 1, 0),
(26, 2, 20, 1, 110000),
(27, 5, 20, 1, 4142),
(28, 4, 21, 1, 415),
(29, 6, 21, 1, 512),
(30, 2, 23, 1, 110000),
(31, 5, 23, 1, 4142),
(32, 2, 26, 1, 110000),
(33, 7, 26, 1, 0),
(34, 4, 28, 1, 415),
(35, 2, 51, 1, 110000),
(36, 4, 69, 1, 415),
(37, 4, 78, 1, 415),
(38, 1, 79, 1, 140000),
(39, 2, 79, 1, 110000),
(40, 6, 79, 1, 512),
(41, 8, 79, 1, 412),
(42, 6, 80, 1, 12400000),
(43, 9, 80, 1, 12700000),
(44, 6, 82, 1, 12400000),
(45, 9, 83, 2, 12700000),
(46, 12, 83, 1, 13000000),
(47, 10, 83, 1, 21000000),
(48, 6, 84, 1, 12400000),
(49, 6, 85, 1, 12400000),
(50, 12, 86, 1, 13000000),
(51, 11, 86, 1, 2234570),
(52, 9, 87, 1, 12700000),
(53, 12, 88, 1, 13000000),
(54, 9, 88, 1, 12700000),
(55, 6, 89, 1, 12400000),
(56, 11, 89, 1, 2234570),
(57, 11, 90, 1, 2234570),
(58, 9, 90, 1, 12700000),
(59, 11, 91, 1, 2234570),
(60, 6, 91, 1, 12400000),
(61, 12, 92, 1, 13000000),
(62, 12, 93, 1, 13000000),
(63, 12, 94, 1, 13000000),
(64, 6, 95, 1, 12400000),
(65, 9, 95, 1, 12700000),
(66, 6, 96, 3, 12400000),
(67, 6, 97, 1, 12400000),
(68, 10, 98, 4, 21000000),
(69, 12, 98, 20, 13000000),
(70, 10, 99, 1, 21000000),
(71, 12, 99, 6, 13000000),
(72, 12, 100, 3, 13000000),
(73, 10, 100, 2, 21000000),
(74, 9, 100, 1, 12700000),
(75, 18, 101, 1, 14000000),
(76, 10, 102, 1, 21000000),
(77, 9, 102, 6, 12700000),
(78, 14, 102, 1, 143456),
(79, 17, 103, 4, 1300000),
(80, 12, 103, 1, 13000000),
(81, 9, 104, 4, 12700000),
(82, 10, 104, 1, 21000000),
(83, 9, 105, 1, 12700000),
(84, 10, 105, 3, 21000000),
(85, 10, 106, 5, 21000000),
(86, 18, 107, 3, 14000000),
(87, 12, 108, 6, 13000000),
(88, 10, 108, 1, 21000000),
(89, 10, 109, 5, 21000000),
(90, 12, 109, 4, 13000000),
(91, 18, 110, 4, 14000000),
(92, 12, 110, 4, 13000000),
(93, 10, 111, 1, 21000000),
(94, 12, 111, 1, 13000000);

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `mo_ta` varchar(255) NOT NULL,
  `nha_cung_cap_id` int(11) NOT NULL,
  `danh_muc_id` int(11) NOT NULL,
  `gia_mua` float(10,0) NOT NULL,
  `gia_ban` float NOT NULL,
  `so_luong` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten`, `mo_ta`, `nha_cung_cap_id`, `danh_muc_id`, `gia_mua`, `gia_ban`, `so_luong`, `image`) VALUES
(6, 'Đồng hồ thông minh ', 'Đồng hồ thông minh đẹp', 3, 7, 12300000, 12600000, '12', '/images/3.jpg'),
(9, 'Chuột mac', 'Chuột mac đẹp', 2, 9, 12400000, 12700000, '12', '/images/7.jpg'),
(10, 'Tai nghe đen', 'Tai nghe đen', 7, 8, 20000000, 21000000, '123', '/images/4.jpg'),
(12, 'Macbook xịn', 'Macbook xịn', 3, 5, 12000000, 13000000, '123', '/images/5.jpg'),
(14, 'Loa dài ', 'Loa dài ', 1, 11, 123456, 143456, '123', '/images/9.jpg'),
(15, 'Loa tròn', 'Loa tròn', 1, 11, 123456, 1234570, '12', '/images/10.jpg'),
(16, 'Tai nghe trắng', 'Tai nghe trắng', 1, 10, 12300000, 14300000, '12', '/images/2.jpg'),
(17, 'macbook', 'macbook macbook macbook macbook', 1, 10, 1200000, 1300000, '123', '/images/1.jpg'),
(18, 'Mac pc', 'Mac pc', 3, 6, 13000000, 14000000, '123', '/images/6.jpg'),
(19, 'chuột mac 2', 'chuột mac', 1, 9, 10000000, 11000000, '2', '/images/7.jpg'),
(20, 'Tai nghe đen 2', 'Tai nghe đen 2', 3, 8, 12333333, 13333300, '123', '/images/4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `position`) VALUES
(2, 'ducanh', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'ducanh1', 'e10adc3949ba59abbe56e057f20f883e', 0),
(4, 'ducanh2', 'e10adc3949ba59abbe56e057f20f883e', 0),
(5, 'ducanh3', '4139055d299c455afe79fafa246167ac', 1),
(6, 'ducanh1234', 'e10adc3949ba59abbe56e057f20f883e', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham_hoadon`
--
ALTER TABLE `sanpham_hoadon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `sanpham_hoadon`
--
ALTER TABLE `sanpham_hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
