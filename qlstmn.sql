-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 04:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlstmn`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `Mahh` varchar(50) NOT NULL,
  `Manhap` varchar(50) NOT NULL,
  `Gianhap` double NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Thanhtien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chitietphieuxuat`
--

CREATE TABLE `chitietphieuxuat` (
  `Maxuat` varchar(50) NOT NULL,
  `Mahh` varchar(50) NOT NULL,
  `Giaxuat` double NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Thanhtien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitietphieuxuat`
--

INSERT INTO `chitietphieuxuat` (`Maxuat`, `Mahh`, `Giaxuat`, `Soluong`, `Thanhtien`) VALUES
('8', 'HH10', 10007, 1, 10007),
('8', 'HH11', 4000, 2, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `Mahh` varchar(50) NOT NULL,
  `Mancc` varchar(50) NOT NULL,
  `Manh` varchar(50) NOT NULL,
  `Tenhh` varchar(50) NOT NULL,
  `Gianhap` double NOT NULL,
  `Giaxuat` double NOT NULL,
  `Tonkho` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`Mahh`, `Mancc`, `Manh`, `Tenhh`, `Gianhap`, `Giaxuat`, `Tonkho`) VALUES
('HH10', 'NCC2', 'NH1', 'Bia Tiger', 4007, 10007, 96),
('HH11', 'NCC2', 'NH1', 'Coca', 4008, 4000, 103),
('HH12', 'NCC2', 'NH1', 'Pepsi', 5000, 3000, 109);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `Makh` varchar(50) NOT NULL,
  `Tenkh` varchar(50) NOT NULL,
  `Tichdiem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`Makh`, `Tenkh`, `Tichdiem`) VALUES
('MK01', 'Trần Duy Hải', 2),
('MK02', 'DANH', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `Mancc` varchar(50) NOT NULL,
  `Tenncc` varchar(50) NOT NULL,
  `Dcncc` varchar(50) NOT NULL,
  `Sdtncc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`Mancc`, `Tenncc`, `Dcncc`, `Sdtncc`) VALUES
('NCC2', 'Công ty cổ phần bia-rượu-nước giải khát Hà Nội', 'Số 183,Hoàng Hoa Thám,Ba Đình,Hà Nội', '02438453849'),
('NCC3', 'Công ty TNHH LAVIE', 'Phường Khánh Hậu,thành phố Tân An,Long An', '19001906'),
('NCC4', 'Tập đoàn Tân Hiệp Phát', 'Vĩnh Phú,thị xã Thuận An,Bình Dương', '898760067'),
('NCC5', 'Công ty TNHH RED BULL', 'Phường Bình Thắng,Dĩ An,Bình Dương', '8888888888888');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `Manv` varchar(50) NOT NULL,
  `Tennv` varchar(50) NOT NULL,
  `Chucvu` varchar(50) NOT NULL,
  `Gioitinh` tinyint(1) NOT NULL,
  `Namsinh` date NOT NULL,
  `Sdtnv` varchar(50) NOT NULL,
  `Dcnv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`Manv`, `Tennv`, `Chucvu`, `Gioitinh`, `Namsinh`, `Sdtnv`, `Dcnv`) VALUES
('NV01', 'Nguyễn Công Danh', 'Nhân Viên', 0, '2023-06-08', '0966773854', 'Hà Nội'),
('QL1', 'Trần Duy Hải', 'Quản Lý', 1, '2002-03-15', '0847706667', 'Nam Định');

-- --------------------------------------------------------

--
-- Table structure for table `nhomhang`
--

CREATE TABLE `nhomhang` (
  `Manh` varchar(50) NOT NULL,
  `Tennh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhomhang`
--

INSERT INTO `nhomhang` (`Manh`, `Tennh`) VALUES
('NH1', 'Bia'),
('NH2', 'Rượu'),
('NH3', 'Nước ngọt có ga');

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `Manhap` int(11) NOT NULL,
  `Mancc` varchar(50) NOT NULL,
  `Manv` varchar(50) NOT NULL,
  `Ngaynhap` date NOT NULL,
  `Tongtien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `phieuxuat`
--

CREATE TABLE `phieuxuat` (
  `Maxuat` int(11) NOT NULL,
  `Manv` varchar(50) NOT NULL,
  `Ngayxuat` date NOT NULL,
  `Tongtien` int(11) NOT NULL,
  `Makh` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phieuxuat`
--

INSERT INTO `phieuxuat` (`Maxuat`, `Manv`, `Ngayxuat`, `Tongtien`, `Makh`) VALUES
(5, 'NV01', '2021-12-05', 0, ''),
(6, 'NV01', '2021-12-05', 0, ''),
(7, 'NV01', '2021-12-05', 0, ''),
(8, 'NV01', '2021-12-05', 18007, ''),
(9, 'NV01', '2021-12-05', 0, ''),
(10, 'NV01', '2021-12-05', 0, ''),
(11, 'NV01', '2021-12-05', 0, ''),
(12, 'NV01', '2021-12-05', 0, ''),
(13, 'NV01', '2021-12-05', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `Manv` varchar(50) NOT NULL,
  `Matkhau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`Manv`, `Matkhau`) VALUES
('NV01', '1'),
('QL1', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD PRIMARY KEY (`Mahh`,`Manhap`),
  ADD KEY `Manhap` (`Manhap`);

--
-- Indexes for table `chitietphieuxuat`
--
ALTER TABLE `chitietphieuxuat`
  ADD PRIMARY KEY (`Maxuat`,`Mahh`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`Mahh`,`Mancc`,`Manh`),
  ADD KEY `Manh` (`Manh`),
  ADD KEY `Mancc` (`Mancc`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`Makh`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`Mancc`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`Manv`);

--
-- Indexes for table `nhomhang`
--
ALTER TABLE `nhomhang`
  ADD PRIMARY KEY (`Manh`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`Manhap`,`Mancc`,`Manv`),
  ADD KEY `Manv` (`Manv`);

--
-- Indexes for table `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD PRIMARY KEY (`Maxuat`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`Manv`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `Manhap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phieuxuat`
--
ALTER TABLE `phieuxuat`
  MODIFY `Maxuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
