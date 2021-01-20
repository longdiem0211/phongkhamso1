-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 03:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

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
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Nguyễn admin', 25, 'Male', 'địa chỉ demo', '0123822822', '', 'doctor_demo_image.svg', '0000-00-00 00:00:00');

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
(1, 'd1', '202cb962ac59075b964b07152d234b70', 'Nguyễn Hoài Lâm', 35, 'Male', 1, '20 Đường Số 8,P5,Gò Vấp,HCM', '0932741231', 'emaildemo@gmail.com', 'doctor_demo_image.svg', 'govap', '2020-06-04 00:00:00', 'active'),
(2, 'd2', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn Nhân', 38, 'Male', 1, 'Hẻm 566 Nguyễn Thái Sơn, Phường 5, Gò Vấp, Hồ Chí Minh, Vietnam', '0982518842', 'd2@gmail.com', '', 'govap', '2020-06-04 00:00:00', 'active'),
(3, 'd3', '202cb962ac59075b964b07152d234b70', 'Phạm Công Lưu', 42, 'Male', 2, '332/99 Đường số 11,Phường 5,Gò Vấp,Hồ Chí Minh', '0392442332', 'd3@gmail.com', '', 'govap', '2020-06-04 00:00:00', 'unactive'),
(4, 'd4', '202cb962ac59075b964b07152d234b70', 'Đỗ Thanh Tâm', 38, 'Female', 2, '350 Nguyễn Văn Lượng,Phường 10,Gò Vấp,Hồ Chí Minh', '0735842922', 'd4@gmail.com', '', 'govap', '2020-06-04 00:00:00', 'active'),
(5, 'd5', '202cb962ac59075b964b07152d234b70', 'Mai Thanh Hiếu', 34, 'Male', 3, '5A Nguyễn Văn Lượng, Phường 16, Quận Gò Vấp, Thành phố Hồ Chí Minh, Phường 16, Gò Vấp, Hồ Chí Minh', '0988223567', 'd5@gmail.com', '', 'govap', '2020-06-04 00:00:00', 'active'),
(6, 'd6', '202cb962ac59075b964b07152d234b70', 'Phùng Hải Đam', 46, 'Male', 3, '5 Nguyễn Văn Lượng, Phường 16, Gò Vấp, Hồ Chí Minh, Vietnam', '01893241763', 'd6@gmail.com', '', 'govap', '2020-06-04 00:00:00', 'active'),
(7, 'd7', '202cb962ac59075b964b07152d234b70', 'Nguyễn Công Sơn', 42, 'Male', 1, '236 Nguyễn Văn Lượng, Phường 10, Gò Vấp, Hồ Chí Minh, Vietnam', '0321876332', 'd7@gmail.com', '', 'binhthanh', '2020-06-04 00:00:00', 'unactive'),
(8, 'd8', '202cb962ac59075b964b07152d234b70', 'Nguyễn Thành Công', 48, 'Male', 1, '293 Nguyễn Văn Lượng, Phường 10, Gò Vấp, Hồ Chí Minh, Vietnam', '0345322342', 'd8@gmail.com', '', 'binhthanh', '2020-06-04 00:00:00', 'active'),
(9, 'd9', '202cb962ac59075b964b07152d234b70', 'Phạm Hoài Khánh', 52, 'Male', 2, '252 Phan Văn Trị, Phường 5, Gò Vấp, Hồ Chí Minh, Vietnam', '072993561', 'd9@gmail.com', '', 'binhthanh', '2020-06-04 00:00:00', 'unactive'),
(10, 'd10', '202cb962ac59075b964b07152d234b70', 'Đỗ Kiên Hồng', 31, 'Male', 2, '60 Lê Đức Thọ, Phường 16, Gò Vấp, Hồ Chí Minh, Vietnam', '0298331687', 'd10@gmail.com', 'doctor_demo_image.svg', 'binhthanh', '2020-06-04 00:00:00', 'active'),
(11, 'd11', '202cb962ac59075b964b07152d234b70', 'Phùng Hồng Sang', 45, 'Male', 3, '79/5B Nguyễn Xí, Phường 26, Bình Thạnh, Hồ Chí Minh, Vietnam', '0971235769', 'd11@gmail.com', '', 'binhthanh', '2020-06-04 00:00:00', 'active'),
(12, 'd12', '202cb962ac59075b964b07152d234b70', 'Nguyễn Thị Như Quỳnh', 36, 'Female', 3, '62 Đinh Bộ Lĩnh, Phường 26, Bình Thạnh, Hồ Chí Minh 717066, Vietnam', '06935835451', 'd12@gmail.com', '', 'binhthanh', '2020-06-04 00:00:00', 'active'),
(13, 'd13', '202cb962ac59075b964b07152d234b70', 'Nguyễn Trung Vĩ', 41, 'Male', 1, '10 Đường 16, Linh Chiểu, Thủ Đức, Hồ Chí Minh, Vietnam', '06935835451', 'd13@gmail.com', '', 'thuduc', '2020-06-04 00:00:00', 'unactive'),
(14, 'd14', '202cb962ac59075b964b07152d234b70', 'Nguyễn Phước Hữu', 41, 'Male', 1, '109, Đường Chương Dương Khu Phố 2, Phường Linh Chiểu, Quận Thủ Đức, Đường Số 15, Linh Chiểu, Thủ Đức, Hồ Chí Minh, Vietnam', '0693468872', 'd14@gmail.com', '', 'thuduc', '2020-06-04 00:00:00', 'active'),
(15, 'd15', '202cb962ac59075b964b07152d234b70', 'Nguyễn Thành Phú', 56, 'Male', 2, '56 Hoàng Diệu 2, Linh Chiểu, Thủ Đức, Hồ Chí Minh, Vietnam', '0693468872', 'd15@gmail.com', '', 'thuduc', '2020-06-04 00:00:00', 'active'),
(16, 'd16', '202cb962ac59075b964b07152d234b70', 'Nguyễn Như Hiên', 56, 'Female', 2, 'Đường số 17, Linh Chiểu, Thủ Đức, Hồ Chí Minh, Vietnam', '0693468872', 'd16@gmail.com', '', 'thuduc', '2020-06-04 00:00:00', 'unactive'),
(17, 'd17', '202cb962ac59075b964b07152d234b70', 'Phạm Thu Huệ', 39, 'Female', 3, '22 Đường số 20, Linh Chiểu, Thủ Đức, Hồ Chí Minh 710111, Vietnam', '0678145556', 'd17@gmail.com', '', 'thuduc', '2020-06-04 00:00:00', 'unactive'),
(18, 'd18', '202cb962ac59075b964b07152d234b70', 'Phạm Nhật Tân', 47, 'Male', 3, 'Số 21 Đường số 3, P, Thủ Đức, Hồ Chí Minh, Vietnam', '0678145556', 'd18@gmail.com', '', 'thuduc', '2020-06-04 00:00:00', 'unactive'),
(19, 'd19', '202cb962ac59075b964b07152d234b70', 'Đỗ Quyết Kiều Quang', 0, '', 1, '', '', '', '', 'binhthanh', '2020-06-16 22:52:02', 'active');

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
(1, 'khoa_noi', 'Khoa nội'),
(2, 'khoa_ngoai', 'Khoa ngoại'),
(3, 'khoa_phcn', 'Khoa phục hồi chức năng'),
(4, 'khoa_xetnghiem', 'khoa xét nghiệm'),
(5, 'khoa_dinhduong', 'Khoa dinh dưỡng');

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
(1, '1_2020-06-16', 1),
(2, '1_2020-06-18', 1),
(3, '1_2020-06-19', 1),
(7, '3_2020-06-20', 1),
(12, '1_2020-06-24', 1),
(13, '2_2020-06-24', 1),
(14, '3_2020-06-24', 1),
(15, '4_2020-06-24', 1),
(16, '3_2020-06-25', 1);

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
(1, '2020-06-09 13:29:38', '2_2020-06-22', 1, 1, 'd1', 'demo1', 120),
(2, '2020-05-07 22:28:56', '4_2020-05-24', 1, 1, 'đau bụng khó tiêu, môi khô', 'Cần nên ăn uống đầy đủ,uống nhiều nước,ngày uống 5 lít\r\nThuốc uống 2 buổi sáng tối,sau khi ăn no', 120),
(5, '2020-06-13 18:34:14', '1_2020-06-25', 2, 1, 'đau bụng', 'ăn uống đầy đủ', 120),
(6, '2020-06-13 19:01:22', '4_2020-06-27', 2, 1, 'demo1', NULL, 120),
(7, '2020-06-15 09:16:41', '4_2020-06-18', 1, 1, 'đau dạ dày', NULL, 120);

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
(1, 'Paracetamol', 3, 10, 30, 2),
(2, 'Eugica', 3, 10, 30, 2),
(3, 'Paracetamol', 4, 10, 40, 5),
(4, 'Eugica', 6, 10, 60, 5),
(5, 'Paracetamol', 3, 10, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gioitinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `fullname`, `age`, `gioitinh`, `address`, `sdt`, `email`, `image`, `created_at`) VALUES
(1, 'a1', '202cb962ac59075b964b07152d234b70', 'Trịnh Minh Chiến', 20, 'Male', '913 phan văn trị,gò vấp', '0123822822', 'a1@gmail.com', 'doctor_demo_image.svg', '2020-06-05 00:00:00'),
(2, 'quang1', '202cb962ac59075b964b07152d234b70', 'Đỗ Quyết Kiều Quang', 21, 'Male', 'Bình Dương', '0987654321', 'demo1@gmail.com', 'doctor_demo_image.svg', '2020-06-13 18:33:28');

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
  ADD PRIMARY KEY (`id_user`);

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
  MODIFY `id_doctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id_khoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lichnghi`
--
ALTER TABLE `lichnghi`
  MODIFY `id_lichnghi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `phieukham`
--
ALTER TABLE `phieukham`
  MODIFY `id_phieukham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `thuoc`
--
ALTER TABLE `thuoc`
  MODIFY `id_thuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
