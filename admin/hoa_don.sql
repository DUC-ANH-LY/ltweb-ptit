-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2024 at 06:03 AM
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
(80, 'thanh123', '2024-11-08 00:00:00', 'Khách mua hàng', 25100000),
(82, 'thanh123', '2024-12-08 09:47:19', 'Khách mua hàng', 12400000),
(84, 'thanh123', '2024-11-08 11:34:10', 'Khách mua hàng', 12400000),
(88, 'thanh1', '2024-09-11 11:41:47', 'Khách mua hàng', 25700000),
(89, 'thanh1', '2024-07-09 11:42:13', 'Khách mua hàng', 14634570),
(90, 'thanh123', '2024-11-08 11:49:29', 'Khách mua hàng', 14934570),
(91, 'thanh1', '2024-11-08 11:58:51', 'Khách mua hàng', 14634570);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
