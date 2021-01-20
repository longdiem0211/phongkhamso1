-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 09:28 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmdt`
--

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `id_director` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gioitinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`id_director`, `username`, `password`, `fullname`, `age`, `gioitinh`, `address`, `sdt`, `email`, `image`, `created_at`) VALUES
(1, 'taducloc', '123', 'Tạ Đức Lộc', 21, 'Male', '13 Ngô văn Sở.', '0968870604', 'taducloc0603@gmail.com', 'admin.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id_doctor` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gioitinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_khoa` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id_doctor`, `username`, `password`, `fullname`, `age`, `gioitinh`, `id_khoa`, `address`, `sdt`, `email`, `image`, `working_address`, `created_at`, `account`) VALUES
(22, 'taducloc', '202cb962ac59075b964b07152d234b70', 'Nguyen Bac Si', 24, 'Female', 1, 'phường 5 quận Tân Bình', '0961111111', '', '70774112_950672648599411_6630177934374076416_o.jpg', 'thuduc', '2020-06-27 23:06:56', 'unactive'),
(26, 'bacsi1', '202cb962ac59075b964b07152d234b70', 'Nguyen Van Hoa', 40, 'Male', 2, 'Phường 6 Quận 7', '0961231232', '', '20190924_bac si_3.png', 'govap', '2020-07-24 15:42:47', 'active'),
(31, 'bacsi6', '202cb962ac59075b964b07152d234b70', 'lethuythuy', 0, '', 1, '', '', '', '', 'binhthanh', '2020-07-26 11:29:33', 'unactive'),
(32, 'loc', '202cb962ac59075b964b07152d234b70', 'loc', 0, '', 2, '', '', '', '', 'govap', '2020-07-26 11:43:52', 'active'),
(33, 'huynhphuong', '202cb962ac59075b964b07152d234b70', 'huynhphuong', 0, '', 1, '', '', '', '', 'govap', '2020-07-26 14:18:11', 'active'),
(38, 'tttttttq', '202cb962ac59075b964b07152d234b70', 'Huynh Long diem', 0, '', 1, '', '', '', '', 'binhthanh', '2020-11-11 10:00:49', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `id_khoa` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nameF` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`id_khoa`, `name`, `nameF`) VALUES
(1, 'khoa_noi', 'Điều trị'),
(2, 'khoa_ngoai', 'Tư vấn');

-- --------------------------------------------------------

--
-- Table structure for table `khothuoc`
--

CREATE TABLE `khothuoc` (
  `id_thuoc` int(50) NOT NULL,
  `tenthuoc` varchar(255) NOT NULL,
  `dongia` int(50) NOT NULL,
  `dvt` varchar(100) NOT NULL,
  `soluong` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khothuoc`
--

INSERT INTO `khothuoc` (`id_thuoc`, `tenthuoc`, `dongia`, `dvt`, `soluong`) VALUES
(51, 'Paracetamol', 100000, 'hộp', 2020),
(52, 'Tetracyclin', 50000, 'hộp', 1111),
(53, 'Eugica', 1000, 'vien', 1010);

-- --------------------------------------------------------

--
-- Table structure for table `lichnghi`
--

CREATE TABLE `lichnghi` (
  `id_lichnghi` int(11) NOT NULL,
  `ngaynghi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_doctor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lichnghi`
--

INSERT INTO `lichnghi` (`id_lichnghi`, `ngaynghi`, `id_doctor`) VALUES
(17, '3_2020-06-29', 22),
(18, '3_2020-06-29', 22),
(19, '3_2020-06-29', 22),
(20, '3_2020-06-29', 22),
(21, '3_2020-06-29', 22),
(22, '3_2020-06-29', 22),
(23, '3_2020-06-29', 22),
(24, '3_2020-07-10', 22),
(25, '2_2020-07-30', 26);

-- --------------------------------------------------------

--
-- Table structure for table `phieukham`
--

CREATE TABLE `phieukham` (
  `id_phieukham` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `ngayhen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `trieuchung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chidan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phikham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phieukham`
--

INSERT INTO `phieukham` (`id_phieukham`, `created_at`, `ngayhen`, `id_user`, `id_doctor`, `trieuchung`, `chidan`, `phikham`) VALUES
(59, '2021-01-05 14:35:06', '4_2021-01-8', 43, 26, 'tieu chay', 'bot an hang lai nhe', 120),
(60, '2021-01-05 15:18:50', '3_2021-01-28', 44, 38, 'sung mat', NULL, 120),
(61, '2021-01-05 15:25:11', '1_2021-01-28', 44, 26, 'kho ngu', NULL, 120);

-- --------------------------------------------------------

--
-- Table structure for table `thuoc`
--

CREATE TABLE `thuoc` (
  `id_thuoc` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sl` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `id_phieukham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thuoc`
--

INSERT INTO `thuoc` (`id_thuoc`, `name`, `sl`, `dongia`, `tongtien`, `id_phieukham`) VALUES
(27, 'Paracetamol', 10, 10, 100, 55),
(28, 'Eugica', 10, 10, 100, 55),
(29, 'Paracetamol', 10, 10, 100, 58),
(30, 'Eugica', 10, 10, 100, 58),
(31, 'Paracetamol', 3, 10, 30, 59);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gioitinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `fullname`, `age`, `gioitinh`, `address`, `sdt`, `email`, `image`, `created_at`) VALUES
(7, 'benhnhan1', '202cb962ac59075b964b07152d234b70', 'taloc', 34, 'Male', '12 Hai Bà Trưng Quận 1', '0982112323', 'benhnhan1@gmail.com', '', '2020-07-25 12:38:41'),
(8, 'benhnhan2', '202cb962ac59075b964b07152d234b70', 'Nguyễn Thị Bệnh Nhân 2', NULL, '', '45 Tố Tố Quận 7', '0123123123', 'benhnhan2@gmail.com', '', '2020-07-25 13:40:55'),
(9, 'benhnhan3', '202cb962ac59075b964b07152d234b70', 'Nguyễn Thị Bệnh Nhân 3', 55, 'Male', '67 Ngô Quyền Quận Tân Phú', '0968870604', 'benhnhan3@gmail.com', '', '2020-07-26 08:29:37'),
(10, 'taducloc', '202cb962ac59075b964b07152d234b70', 'taducloc', NULL, '', '67 Ngô Quyền Quận Tân Phú', '0968870604', 'loc@gmail.com', 'phone-call.png', '2020-07-26 09:27:23'),
(11, 'nguyenthia', '202cb962ac59075b964b07152d234b70', 'nguyenthia', NULL, '', '12 Hai Bà Trưng Quận 1', '0987878787', 'loc1@gmail.com', '', '2020-07-26 10:27:13'),
(12, 'huynhvanvan', '202cb962ac59075b964b07152d234b70', 'huynhvanvan', 22, 'Male', '67 Ngô Quyền Quận Tân Phú', '0923232323', 'asddd@gmail.com', '', '2020-07-26 11:35:37'),
(13, 'huynhvanbinh', '202cb962ac59075b964b07152d234b70', 'huynhvanbinh', NULL, '', '67 Ngô Quyền Quận Tân Phú', '0989898988', 'gfghjhj@gmail.com', '', '2020-07-26 14:05:46'),
(41, NULL, NULL, 'loc ta', 6666, 'Male', '123abc', '09688704', 'taducloc060301@gmail.com', '2222.png', '0000-00-00 00:00:00'),
(42, 'taducloc01', '202cb962ac59075b964b07152d234b70', 'locloc01', NULL, NULL, '32323ssss', '0968870604', 'taducloc0603@gmail.com', NULL, '2020-12-24 14:32:36'),
(43, 'nguyenvana', '202cb962ac59075b964b07152d234b70', 'emtena', NULL, NULL, '123abc', '012345678', 'longdiem0211@gmail.com', NULL, '2021-01-05 14:24:13'),
(44, 'bn1', '202cb962ac59075b964b07152d234b70', 'TaMyMy', NULL, NULL, '113 le loi ', '0326987564', 'taducloc0603010@gmail.com', NULL, '2021-01-05 15:15:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id_director`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id_doctor`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id_khoa`);

--
-- Indexes for table `khothuoc`
--
ALTER TABLE `khothuoc`
  ADD PRIMARY KEY (`id_thuoc`);

--
-- Indexes for table `lichnghi`
--
ALTER TABLE `lichnghi`
  ADD PRIMARY KEY (`id_lichnghi`);

--
-- Indexes for table `phieukham`
--
ALTER TABLE `phieukham`
  ADD PRIMARY KEY (`id_phieukham`);

--
-- Indexes for table `thuoc`
--
ALTER TABLE `thuoc`
  ADD PRIMARY KEY (`id_thuoc`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `id_director` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id_doctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id_khoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `khothuoc`
--
ALTER TABLE `khothuoc`
  MODIFY `id_thuoc` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `lichnghi`
--
ALTER TABLE `lichnghi`
  MODIFY `id_lichnghi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `phieukham`
--
ALTER TABLE `phieukham`
  MODIFY `id_phieukham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `thuoc`
--
ALTER TABLE `thuoc`
  MODIFY `id_thuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
