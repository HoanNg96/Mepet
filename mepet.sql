-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 08:42 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mepet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `level`) VALUES
(1, 'superadmin', 'adminsuper', 'superadminmepet@gmail.com', 0),
(2, 'admin', 'admin123', 'adminmepet@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`) VALUES
(1, 'Royal Canin'),
(2, 'Pedigree'),
(3, ' Zenith'),
(4, ' Tuffy’s Pet Foods, Inc. USA'),
(5, 'SmartHeart'),
(6, 'Tellme'),
(7, 'BBN'),
(8, 'VEGEBRAND'),
(9, 'Dr.Kyan'),
(10, 'No Brand'),
(11, 'Bond & Co'),
(12, 'Good2Go'),
(13, 'YOULY'),
(14, 'Pet Life'),
(15, 'Virbac'),
(16, 'Bio-Pharmachemie'),
(17, 'PetAg'),
(18, 'Fay'),
(19, 'Bioline'),
(20, 'PetCare'),
(21, 'PETKIT'),
(22, 'Me-O'),
(23, 'Apro'),
(24, 'Catsrang'),
(25, 'Whiskas'),
(26, 'Ciao'),
(27, 'Smilla'),
(28, 'Catessy'),
(29, 'Tropiclean'),
(30, 'Beaphar'),
(31, 'Enoug SOS'),
(32, 'Cature'),
(33, '8 IN 1');

-- --------------------------------------------------------

--
-- Table structure for table `option_type`
--

CREATE TABLE `option_type` (
  `option_id` int(11) NOT NULL,
  `option_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_describe` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `option_type`
--

INSERT INTO `option_type` (`option_id`, `option_name`, `option_describe`) VALUES
(1, 'weight', 'Trọng lượng'),
(2, 'color', 'Màu sắc'),
(3, 'size', 'Kích cỡ');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `brand_id` int(20) NOT NULL,
  `total_sold` int(11) NOT NULL,
  `rate` double NOT NULL,
  `content` text DEFAULT NULL,
  `addtime` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand_id`, `total_sold`, `rate`, `content`, `addtime`, `last_update_time`) VALUES
(1, 'Thức Ăn Hạt Cho Chó Royal Canin Poodle Adult ', 1, 0, 0, 'Sản phẩm 1', '2021-04-16 17:04:12', '2021-04-16 17:04:12'),
(2, 'Thức Ăn Hạt Cho Chó  Royal Canin Mini Puppy', 1, 0, 0, 'Sản phẩm 2', '2021-04-16 17:09:27', '2021-04-16 17:09:27'),
(3, 'Thức Ăn Hạt Cho Chó Trưởng Thành Royal Canin Medium Adult', 1, 0, 0, 'Sản phầm 3', '2021-04-16 17:10:50', '2021-04-16 17:10:50'),
(4, 'Thức Ăn Hạt Cho Chó Royal Canin Maxi Adult', 1, 0, 0, 'Sản phẩm 4', '2021-04-16 17:11:39', '2021-04-16 17:11:39'),
(5, 'Thức Ăn Cho Chó Lớn Pedigree Vị Thịt Bò Và Rau Củ', 2, 0, 0, 'Sản phẩm 5', '2021-04-16 17:13:44', '2021-04-16 17:13:44'),
(6, 'Thức Ăn Cho Chó Con Pedigree Vị Gà, Trứng Và Sữa', 2, 0, 0, 'Sản phẩm 5', '2021-04-16 17:15:53', '2021-04-16 17:15:53'),
(7, 'Thức Ăn Hạt Mềm Zenith Cho Chó Con', 3, 0, 0, 'Sản phẩm 7', '2021-04-16 17:18:29', '2021-04-16 17:18:29'),
(8, 'Thức Ăn Hỗn Hợp NutriSource Small Breed Chicken Grain Free Cho Chó', 4, 0, 0, 'Sản phẩm 8', '2021-04-16 17:20:17', '2021-04-16 17:20:17'),
(9, 'Pate Pedigree Cho Chó Con Vị Gà Nấu Xốt', 2, 0, 0, 'Sản phầm 9', '2021-04-16 17:22:24', '2021-04-16 17:22:24'),
(10, 'Pate Cho Chó SmartHeart Hỗ Trợ Tăng Trưởng, Tinh Khôn', 5, 0, 0, 'Sản phẩm 10', '2021-04-16 17:52:33', '2021-04-16 17:52:33'),
(11, 'Combo 4 Túi Pate Gan Thịt Heo Tellme Cho Chó', 6, 0, 0, 'Sản phẩm 11', '2021-04-16 18:00:25', '2021-04-16 18:00:25'),
(12, 'Pate Cho Chó Trên 15 Tháng Tuổi Royal Canin MAXI Adult', 1, 0, 0, 'Sản phầm 12', '2021-04-16 18:01:00', '2021-04-16 18:01:00'),
(13, 'Bánh Xương Gặm Sạch Răng Cho Chó Pedigree Dentastix', 2, 0, 0, 'Sản phẩm 13', '2021-04-16 18:05:14', '2021-04-16 18:05:14'),
(14, 'Bánh Xương Cho Chó Trung Pedigree Gà Xông Khói', 2, 0, 0, 'Sản phẩm 14', '2021-04-16 18:08:11', '2021-04-16 18:08:11'),
(15, 'Bánh Thưởng Dạng Viên Cho Chó SmartHeart', 5, 0, 0, 'Sản phẩm 15', '2021-04-16 18:09:22', '2021-04-16 18:09:22'),
(16, 'Bánh Xương Ngừa Mảng Bám Pedigree Cho Chó Con', 2, 0, 0, 'Sản phẩm 16', '2021-04-16 18:11:54', '2021-04-16 18:11:54'),
(17, 'Sữa bột cho chó BBN  Goat’s Milk New Zealand', 7, 0, 0, 'Sản phẩm 17', '2021-04-16 18:13:54', '2021-04-16 18:13:54'),
(18, 'Sữa Bột dinh dưỡng cho chó kích thích tiêu hóa ', 8, 0, 0, 'Sản phẩm 18', '2021-04-16 18:14:34', '2021-04-16 18:14:34'),
(19, 'Sữa Bột Dr.Kyan Predogen Cho Chó Dạng Hộp', 9, 0, 0, 'Sản phẩm 19', '2021-04-16 18:15:40', '2021-04-16 18:15:40'),
(20, 'Sữa Bột Dr.Kyan Predogen Cho Chó Dạng Lon', 9, 0, 0, 'Sản phẩm 20', '2021-04-16 18:16:41', '2021-04-16 18:16:41'),
(21, 'Áo Thun Bóng Đá Cho Chó', 10, 0, 0, 'Sản phẩm 21', '2021-04-16 18:19:02', '2021-04-16 18:19:02'),
(22, 'Áo Tết Truyền Thống Lót Viền Bông Nhiều Màu Sắc Cho Thú Cưng', 10, 0, 0, 'Sản phẩm 22', '2021-04-16 18:22:29', '2021-04-16 18:22:29'),
(23, 'Áo Thun Lót Nỉ Có Mũ Adidog Dành Cho Chó Lớn', 10, 0, 0, 'Sản phẩm 23', '2021-04-16 18:24:35', '2021-04-16 18:24:35'),
(24, 'Áo Hình Heo Hồng Cho Chó', 10, 0, 0, 'Sản phẩm 24', '2021-04-16 18:26:36', '2021-04-16 18:26:36'),
(25, 'Váy Tết Cổ Truyền Cho Chó', 10, 0, 0, 'Sản phẩm 25', '2021-04-16 18:27:57', '2021-04-16 18:27:57'),
(26, 'Váy Mỹ Nhân Ngư Cho Chó', 11, 0, 0, 'Sản phẩm 26', '2021-04-16 18:28:59', '2021-04-16 18:30:12'),
(27, 'Váy Thủy Thủ Cho Chó', 11, 0, 0, 'Sản phẩm 27', '2021-04-16 18:29:55', '2021-04-16 18:29:55'),
(28, 'Váy Barrar Cuda Cho Chó', 11, 0, 0, 'Sản phẩm 28', '2021-04-16 18:31:57', '2021-04-16 18:31:57'),
(29, 'Giày Đen Lót Lông Cừu', 12, 0, 0, 'Sản phẩm 29', '2021-04-16 18:34:39', '2021-04-16 18:34:39'),
(30, 'Giày Cao Su Len Chống Trượt', 12, 0, 0, 'Sản phẩm 30', '2021-04-16 18:36:48', '2021-04-16 18:36:48'),
(31, 'Tất Len Đế Cao Su Mềm', 13, 0, 0, 'Sản phẩm 31', '2021-04-16 18:37:48', '2021-04-16 18:37:48'),
(32, 'Giày Mắt Lưới ', 14, 0, 0, 'Sản phẩm 32', '2021-04-16 18:39:09', '2021-04-16 18:39:09'),
(33, 'Viên Bổ Sung Canxi Và Khoáng Chất Virbac Calci Delice Cho Chó', 15, 0, 0, 'Sản phẩm 33', '2021-04-16 18:43:08', '2021-04-16 18:43:08'),
(34, 'Bột Bổ Sung Vitamin Và Hỗ Trợ Tăng Đề Kháng Cho Chó Mèo Bio-Vit', 16, 0, 0, 'Sản phẩm 34', '2021-04-16 18:45:25', '2021-04-16 18:45:25'),
(35, 'Viên Bổ Sung Canxi Phốt Pho PetAg Cho Chó Mèo', 17, 0, 0, 'Sản phẩm 35', '2021-04-16 18:58:35', '2021-04-16 18:58:35'),
(36, 'Gel Dinh Dưỡng Cho Chó Mèo Virbac Megaderm, 10 gói', 15, 0, 0, 'Sản phẩm 36', '2021-04-16 19:00:40', '2021-04-16 19:00:40'),
(37, 'Dầu Tắm Bio Care Hỗ Trợ Làm Sạch Ve, Rận Cho Chó Mèo', 16, 0, 0, 'Sản phẩm 37', '2021-04-16 19:02:24', '2021-04-16 19:02:24'),
(38, 'Sữa Tắm Fay Medicare Hỗ Trợ Giảm Ngứa, Nấm Da Ở Chó Mèo', 18, 0, 0, 'Sản phẩm 38', '2021-04-16 19:03:59', '2021-04-16 19:03:59'),
(39, 'Dầu Tắm Bio Derma Cải Thiện Ghẻ, Nấm Da Cho Chó Mèo', 16, 0, 0, 'Sản phẩm 39', '2021-04-16 19:04:54', '2021-04-16 19:04:54'),
(40, 'Sữa Tắm Olive Dành Cho Chó', 10, 0, 0, 'Sản phẩm 40', '2021-04-16 19:06:26', '2021-04-16 19:06:26'),
(41, 'Bóng Tết Thừng Tròn Cho Chó Mèo Nhiều Kích Cỡ', 10, 0, 0, 'Sản phẩm 41', '2021-04-16 19:07:53', '2021-04-16 19:07:53'),
(42, 'Bóng 7 Sắc Cầu Vồng Có Chuông Cho Chó', 10, 0, 0, 'Sản phẩm 42', '2021-04-16 19:08:50', '2021-04-16 19:08:50'),
(43, 'Đồ Chơi Hồ Lô Xương Cá Có Gai Cho Chó Các Màu', 10, 0, 0, 'Sản phẩm 43', '2021-04-16 19:24:13', '2021-04-16 19:24:13'),
(44, 'Bóng In Hình Xương, Vằn Nổi, Chấm Nổi 6cm Cho Chó', 10, 0, 0, 'Sản phẩm 44', '2021-04-16 19:25:18', '2021-04-16 19:25:18'),
(45, 'Kem Đánh Răng Bioline Dental Care Set Cho Chó', 19, 0, 0, 'Sản phẩm 45', '2021-04-16 19:26:21', '2021-04-16 19:27:55'),
(46, 'Xương Gặm Cho Chó Hình Đùi Gà Hỗ Trợ Làm Sạch Răng', 10, 0, 0, 'Sản phẩm 48', '2021-04-16 19:27:35', '2021-04-16 19:27:35'),
(47, 'Bột Nhổ Lông Tai Cho Chó Bioline Ear Powder', 19, 0, 0, 'Sản phẩm 47', '2021-04-16 19:29:33', '2021-04-16 19:29:33'),
(48, 'Xương Gặm Dạng Ống Hỗ Trợ Sạch Răng Cho Chó', 10, 0, 0, 'Sản phẩm 48', '2021-04-16 19:30:51', '2021-04-16 19:30:51'),
(49, 'Túi Vận Chuyển Chó Mèo Nhựa Trong In Hình Chân Chó', 10, 0, 0, 'Sản phẩm 49', '2021-04-16 19:32:01', '2021-04-16 19:32:01'),
(50, 'Túi Lưới Thoáng Khí Vận Chuyển Chó Mèo', 20, 0, 0, 'Sản phẩm 50', '2021-04-16 19:33:38', '2021-04-16 19:33:38'),
(51, 'Lồng Hàng Không Vận Chuyển Chó Mèo Loại Nhỏ', 10, 0, 0, 'Sản phẩm 51', '2021-04-16 19:35:09', '2021-04-16 19:35:09'),
(52, 'Balo Phi Hành Gia Vận Chuyển Chó Mèo Bằng Da', 10, 0, 0, 'Sản phẩm 52', '2021-04-16 19:35:59', '2021-04-16 19:35:59'),
(53, 'Bát Ăn Inox Không Rỉ Sét Dành Cho Chó Mèo', 10, 0, 0, 'Sản phẩm 53', '2021-04-16 19:37:26', '2021-04-16 19:37:26'),
(54, 'Bát Uống Nước Tự Động Cho Chó Mèo', 10, 0, 0, 'Sản phẩm 54', '2021-04-16 19:38:08', '2021-04-16 19:38:08'),
(55, 'Bát Đựng Thức Ăn Nhựa Tròn Cho Chó Mèo', 10, 0, 0, 'Sản phẩm 55', '2021-04-16 19:38:51', '2021-04-16 19:38:51'),
(56, 'Máy Cho Ăn Tự Động Petkit Feeder Full Size', 21, 0, 0, 'Sản phẩm 56', '2021-04-16 19:39:52', '2021-04-16 19:39:52'),
(57, 'Bóng Cao Su Nặng Huấn Luyện Cho Chó', 10, 0, 0, 'Sản phẩm 53', '2021-04-16 19:42:08', '2021-04-16 19:42:08'),
(58, 'Dụng Cụ Huấn Luyện Clicker Cho Chó Chuyên Nghiệp', 10, 0, 0, 'Sản phẩm 58', '2021-04-16 19:42:58', '2021-04-16 19:42:58'),
(59, 'Dây Dắt Chó Thu Dây Tự Động Có Gắn Đèn Led Petkit Goshine', 21, 0, 0, 'Sản phẩm 59', '2021-04-16 19:43:52', '2021-04-16 19:43:52'),
(60, 'Rọ Mõm Da Chống Sủa SP1177 Đủ Size', 10, 0, 0, 'Sản phẩm 60', '2021-04-16 19:45:18', '2021-04-16 19:45:18'),
(61, 'Thức Ăn Hạt Cho Mèo Con Me-O Kitten Ocean Fish Vị Cá Biển', 22, 0, 0, 'Sản phẩm 61', '2021-04-16 19:46:50', '2021-04-16 19:46:50'),
(62, 'Thức Ăn Hạt Cho Mèo Apro IQ Cho Mèo', 23, 0, 0, 'Sản phẩm 62', '2021-04-16 19:47:42', '2021-04-16 19:47:42'),
(63, 'Thức Ăn Hạt Cho Mèo Trưởng Thành Me-O Cat Seafood', 22, 0, 0, 'Sản phẩm 63', '2021-04-16 19:48:44', '2021-04-16 19:48:44'),
(64, 'Thức Ăn Hạt Catsrang Cho Mèo Mọi Lứa Tuổi', 24, 0, 0, 'Sản phẩm 64', '2021-04-16 19:50:31', '2021-04-16 19:50:31'),
(65, 'Túi Xốt Cá Ngừ Và Gà Bổ Sung Rau Củ Tellme Cho Mèo', 6, 0, 0, 'Sản phẩm 65', '2021-04-16 19:51:32', '2021-04-16 19:51:32'),
(66, 'Túi Xốt Gà Phô Mai Bổ Sung Rau Củ Tellme Cho Mèo', 6, 0, 0, 'Sản phẩm 66', '2021-04-16 19:52:29', '2021-04-16 19:52:29'),
(67, 'Túi Xốt Bò Bổ Sung Rau Củ Tellme Cho Mèo', 6, 0, 0, 'Sản phẩm 67', '2021-04-16 19:53:20', '2021-04-16 19:53:20'),
(68, 'Thức Ăn Cho Mèo Vị Cá Biển Whiskas Adult Ocean Fish', 25, 0, 0, 'Sản phẩm 68', '2021-04-16 19:54:07', '2021-04-16 19:54:07'),
(69, 'Pate Cho Mèo Anh Lông Ngắn Royal Canin British Shorthair', 1, 0, 0, 'Sản phẩm 69', '2021-04-16 19:55:17', '2021-04-16 19:55:17'),
(70, 'Pate Cho Mèo Royal Canin Kitten Instinctive Loaf', 1, 0, 0, 'Sản phẩm 70', '2021-04-16 19:56:18', '2021-04-16 19:56:18'),
(71, 'Pate Cho Mèo Con Whiskas Từ 2 Tháng Tuổi', 25, 0, 0, 'Sản phẩm 71', '2021-04-16 19:57:13', '2021-04-16 19:57:13'),
(72, 'Pate Hỗn Hợp Snappy Tom Cho Mèo Con', 10, 0, 0, 'Sản phẩm 72', '2021-04-16 19:58:00', '2021-04-16 19:58:00'),
(73, 'Bánh Thưởng Cho Mèo Meo-O Cat Treat VỊ Cá Hồi', 22, 0, 0, 'Sản phẩm 73', '2021-04-16 19:58:57', '2021-04-16 19:58:57'),
(74, 'Bánh Thưởng Dạng Kem Cho Mèo Me-O Creamy Treats', 22, 0, 0, 'Sản phẩm 74', '2021-04-16 19:59:35', '2021-04-16 19:59:35'),
(75, 'Bánh Pate Thanh Dạng Gel Dinh Dưỡng Hanpetgel Dành Cho Mèo', 10, 0, 0, 'Sản phẩm 75', '2021-04-16 20:00:32', '2021-04-16 20:00:32'),
(76, 'Thức Ăn Thưởng Ciao Vị Cá Ngừ Và Sò Điệp Dạng Thanh Cho Mèo', 26, 0, 0, 'Sản phẩm 76', '2021-04-16 20:01:18', '2021-04-16 20:01:18'),
(77, 'Sữa Cho Mèo Whiskas', 25, 0, 0, 'Sản phẩm 77', '2021-04-16 20:02:40', '2021-04-16 20:02:40'),
(78, 'Sữa Cho Mèo Smilla ít đường', 27, 0, 0, 'Sản phẩm 78', '2021-04-16 20:03:31', '2021-04-16 20:03:31'),
(79, 'Sữa Cho Mèo Catesy', 28, 0, 0, 'Sản phẩm 79', '2021-04-16 20:04:13', '2021-04-16 20:04:13'),
(80, 'Sữa Bột Dinh Dưỡng Dr.Kyan Precaten Cho Mèo', 9, 0, 0, 'Sản phẩm 80', '2021-04-16 20:04:51', '2021-04-16 20:04:51'),
(81, 'Bộ Quần Áo Đáng Yêu Hoàng Thượng Dành Cho Mèo', 10, 0, 0, 'Sản phẩm 81', '2021-04-16 20:05:47', '2021-04-16 20:05:47'),
(82, 'Áo Halloween In Hình Dơi Dành Cho Thú Cưng', 10, 0, 0, 'Sản phẩm 82', '2021-04-16 20:06:57', '2021-04-16 20:06:57'),
(83, 'Bộ Quần Áo Cảnh Sát Dành Cho Mèo', 10, 0, 0, 'Sản phẩm 83', '2021-04-16 20:08:35', '2021-04-16 20:08:35'),
(84, 'Áo Sơ Mi Kẻ Caro Dễ Thương Cho Thú Cưng', 10, 0, 0, 'Sản phẩm 84', '2021-04-16 20:09:12', '2021-04-16 20:09:12'),
(85, 'Váy Siêu Sao Hàng Hiệu Cho Mèo', 10, 0, 0, 'Sản phẩm 85', '2021-04-16 20:10:22', '2021-04-16 20:10:22'),
(86, 'Tạp Dề Chef Buddy Cho Mèo', 10, 0, 0, 'Sản phẩm 86', '2021-04-16 20:11:35', '2021-04-16 20:11:35'),
(87, 'Váy Mùa Hè Cho Mèo', 10, 0, 0, 'Sản phẩm 87', '2021-04-16 20:12:43', '2021-04-16 20:12:43'),
(88, 'Váy Gia Nhân Cho Mèo', 10, 0, 0, 'Sản phẩm 88', '2021-04-16 20:13:30', '2021-04-16 20:13:30'),
(89, 'Tất Mùa Đông Cho Mèo', 10, 0, 0, 'Sản phẩm 89', '2021-04-16 20:14:46', '2021-04-16 20:14:46'),
(90, 'Ủng Tuyết Chống Trượt Cho Mèo', 10, 0, 0, 'Sản phẩm 90', '2021-04-16 20:15:28', '2021-04-16 20:15:28'),
(91, 'Tất Mùa Đông Cho Mèo Calico', 10, 0, 0, 'Sản phẩm 91', '2021-04-16 20:16:34', '2021-04-16 20:16:34'),
(92, 'Thực Phẩm Hỗ Trợ Mèo Mắc Sỏi Thận Royal Canin Urinary S/O', 1, 0, 0, 'Sản phẩm 92', '2021-04-16 20:17:20', '2021-04-16 20:17:20'),
(93, 'Sữa tắm Tropiclean Natural Flea & Tick 582ml – Trị ve, bọ chét – Mỹ', 29, 0, 0, 'Sản phẩm 93', '2021-04-16 20:22:22', '2021-04-16 20:22:22'),
(94, 'Sữa Tắm Cho Chó Mèo Ngăn Ngừa Ve Beaphar Bio', 30, 0, 0, 'Sản phẩm 94', '2021-04-16 20:23:06', '2021-04-16 20:23:06'),
(95, 'Sữa Tắm Cho Chó Mèo Da Nhạy Cảm Beaphar Hypo-Allergenic', 30, 0, 0, 'Sản phẩm 95', '2021-04-16 20:23:52', '2021-04-16 20:23:52'),
(96, 'Sữa tắm cho mèo Enoug SOS 530ml – Bảo vệ da – Đài Loan', 31, 0, 0, 'Sản phẩm 96', '2021-04-16 20:24:27', '2021-04-16 20:24:27'),
(97, 'Bóng Chuột Lật Đật Đồ Chơi Cho Mèo', 10, 0, 0, 'Sản phảma 97', '2021-04-16 20:25:32', '2021-04-16 20:25:32'),
(98, 'Cỏ Mèo Catnip Hỗ Trợ Tạo Cảm Giác Hưng Phấn', 10, 0, 0, 'Sản phẩm 98', '2021-04-16 20:26:16', '2021-04-16 20:26:16'),
(99, 'Chuột Dính Lò Xo Đồ Chơi Cho Mèo', 10, 0, 0, 'Sản phẩm 99', '2021-04-16 20:27:34', '2021-04-16 20:27:34'),
(100, 'Trụ Cào Móng 2 Tầng Treo Chuột Bông Cho Mèo', 10, 0, 0, 'Sản phẩm 100', '2021-04-16 20:28:17', '2021-04-16 20:28:17'),
(101, 'Dung Dịch Cho Chó Mèo Tẩy Bẩn Khóe Mắt Beaphar Tear Stain', 30, 0, 0, 'Sản phẩm 101', '2021-04-16 20:29:03', '2021-04-16 20:29:03'),
(102, 'Dung Dịch Vệ Sinh Răng Miệng Chó Mèo Beaphar Mouth Wash', 30, 0, 0, 'Sản phẩm 102', '2021-04-16 20:29:56', '2021-04-16 20:29:56'),
(103, 'Gel Vệ Sinh Răng Chó Mèo Beaphar Tooth Gel', 30, 0, 0, 'Sản phẩm 103', '2021-04-16 20:30:53', '2021-04-16 20:30:53'),
(104, 'Bột rắc đồ ăn trị hôi miệng, cao răng chó mèo 1gx30 gói – Cature Oral Care Pro – Mỹ', 32, 0, 0, 'Sản phẩm 104', '2021-04-16 20:31:34', '2021-04-16 20:31:34'),
(105, 'Nhà Điều Hòa Thông Minh Cho Thú Cưng Petkit Cozy', 21, 0, 0, 'Sản phẩm 105', '2021-04-16 20:33:33', '2021-04-16 20:33:33'),
(106, 'Máy Ăn Tự Động Cho Thú Cưng Petkit Feeder Mini', 21, 0, 0, 'Sản phẩm 106', '2021-04-16 20:35:51', '2021-04-16 20:35:51'),
(107, 'Máy Uống Nước Tự Động Cho Thú Cưng Petkit Water Fountaint Ver 2', 21, 0, 0, 'Sản phẩm 107', '2021-04-16 20:38:27', '2021-04-16 20:38:27'),
(108, 'Thuốc Nhỏ Gáy Cho Mèo Thư Giãn Beaphar Calming', 30, 0, 0, 'Sản phẩm 108', '2021-04-16 20:39:32', '2021-04-16 20:39:32'),
(109, 'Bình Xịt Chống Mèo Cào Đồ 8in1 Natural Miracles', 33, 0, 0, 'Sản phẩm 109', '2021-04-16 20:40:05', '2021-04-16 20:40:05'),
(110, 'Còi huấn luyện chó mèo 2 trong 1', 10, 0, 0, 'Sản phẩm 110', '2021-04-16 20:40:35', '2021-04-16 20:40:35'),
(111, 'Bình Xịt Cho Mèo Chống Phá Đồ Beaphar Education', 30, 0, 0, 'Sản phẩm 111', '2021-04-16 20:41:06', '2021-04-16 20:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_cate`
--

CREATE TABLE `product_cate` (
  `product_id` int(11) DEFAULT NULL,
  `shopcate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_cate`
--

INSERT INTO `product_cate` (`product_id`, `shopcate_id`) VALUES
(1, 11),
(2, 11),
(3, 11),
(4, 11),
(5, 12),
(6, 12),
(7, 12),
(8, 12),
(9, 13),
(10, 13),
(11, 13),
(12, 13),
(13, 14),
(14, 14),
(15, 14),
(16, 14),
(17, 15),
(18, 15),
(19, 15),
(20, 15),
(21, 16),
(22, 16),
(23, 16),
(24, 16),
(25, 17),
(27, 17),
(26, 17),
(28, 17),
(29, 18),
(30, 18),
(31, 18),
(32, 18),
(33, 19),
(34, 19),
(35, 19),
(36, 19),
(37, 20),
(37, 35),
(38, 20),
(38, 35),
(39, 20),
(39, 35),
(40, 20),
(41, 22),
(41, 37),
(42, 22),
(43, 11),
(43, 22),
(44, 22),
(46, 36),
(45, 21),
(47, 21),
(48, 21),
(49, 23),
(50, 23),
(51, 23),
(52, 23),
(53, 24),
(54, 24),
(55, 24),
(56, 24),
(57, 25),
(58, 25),
(59, 25),
(60, 25),
(61, 26),
(62, 26),
(63, 26),
(64, 26),
(65, 27),
(66, 27),
(67, 27),
(68, 27),
(69, 28),
(70, 28),
(71, 28),
(72, 28),
(73, 29),
(74, 29),
(75, 29),
(76, 29),
(77, 30),
(78, 30),
(79, 30),
(80, 30),
(81, 31),
(82, 31),
(83, 31),
(84, 31),
(85, 32),
(86, 32),
(87, 32),
(88, 32),
(89, 33),
(90, 33),
(91, 33),
(92, 34),
(93, 35),
(94, 35),
(95, 35),
(96, 35),
(97, 37),
(98, 37),
(99, 37),
(100, 37),
(101, 36),
(102, 36),
(103, 36),
(104, 36),
(105, 38),
(106, 39),
(107, 39),
(108, 40),
(109, 40),
(110, 40),
(111, 40);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `product_id` int(11) DEFAULT NULL,
  `img_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`product_id`, `img_link`) VALUES
(1, 'product1-1.jpg'),
(1, 'product1-2.jpg'),
(2, 'product2-1.jpg'),
(2, 'product2-2.jpg'),
(2, 'product2-3.jpg'),
(3, 'product3-1.jpg'),
(3, 'product3-2.png'),
(3, 'product3-3.jpg'),
(4, 'product4-1.jpg'),
(4, 'product4-2.jpg'),
(4, 'product4-3.jpg'),
(5, 'product5-1.jpg'),
(5, 'product5-2.jpg'),
(6, 'product6-1.jpg'),
(6, 'product6-2.jpg'),
(6, 'product6-3.jpg'),
(6, 'product6-4.jpg'),
(7, 'product7-1.jpg'),
(7, 'product7-2.jpg'),
(7, 'product7-3.jpg'),
(8, 'product8-1.jpg'),
(9, 'product9-1.jpg'),
(10, 'product10-1.jpg'),
(10, 'product10-2.jpg'),
(11, 'product11-1.jpg'),
(11, 'product11-2.jpg'),
(12, 'product12-1.jpg'),
(12, 'product12-2.jpg'),
(12, 'product12-3.jpg'),
(13, 'product13-1.jpg'),
(13, 'product13-2.jpg'),
(13, 'product13-3.jpg'),
(14, 'product14-1.jpg'),
(14, 'product14-2.jpg'),
(15, 'product15-1.jpg'),
(15, 'product15-2.jpg'),
(15, 'product15-3.jpg'),
(15, 'product15-4.jpg'),
(16, 'product16-1.jpg'),
(16, 'product16-2.jpg'),
(17, 'product17-1.jpg'),
(18, 'product18-1.jpg'),
(19, 'product19-1.jpg'),
(19, 'product19-2.jpg'),
(19, 'product19-3.jpg'),
(20, 'product20-1.jpg'),
(20, 'product20-2.jpg'),
(20, 'product20-3.jpg'),
(21, 'product21-1.jpg'),
(21, 'product21-2.jpg'),
(21, 'product21-3.jpg'),
(21, 'product21-4.jpg'),
(22, 'product22-1.jpg'),
(22, 'product22-2.jpg'),
(22, 'product22-3.jpg'),
(23, 'product23-1.jpg'),
(23, 'product23-2.jpg'),
(23, 'product23-3.jpg'),
(24, 'product24-1.jpg'),
(24, 'product24-2.jpg'),
(24, 'product24-3.jpg'),
(24, 'product24-4.jpg'),
(25, 'product25-1.jpg'),
(25, 'product25-2.jpg'),
(25, 'product25-3.jpg'),
(26, 'product26-1.jpg'),
(26, 'product26-2.jpg'),
(26, 'product26-3.jpg'),
(27, 'product27-1.jpg'),
(27, 'product27-2.jpg'),
(27, 'product27-3.jpg'),
(27, 'product27-4.jpg'),
(28, 'product28-1.jpg'),
(28, 'product28-2.jpg'),
(28, 'product28-3.jpg'),
(28, 'product28-4.jpg'),
(29, 'product29-1.jpg'),
(30, 'product30-1.jpg'),
(30, 'product30-2.jpg'),
(31, 'product31-1.jpg'),
(31, 'product31-2.jpg'),
(32, 'product32-1.jpg'),
(33, 'product33-1.jpg'),
(33, 'product33-2.jpg'),
(34, 'product34-1.jpg'),
(34, 'product34-2.jpg'),
(34, 'product34-3.jpg'),
(35, 'product35-1.jpg'),
(35, 'product35-2.jpg'),
(35, 'product35-3.jpg'),
(36, 'product36-1.jpg'),
(36, 'product36-2.jpg'),
(37, 'product37-1.jpg'),
(38, 'product38-1.jpg'),
(38, 'product38-2.jpg'),
(39, 'product39-1.jpg'),
(40, 'product40-1.jpg'),
(41, 'product41-1.jpg'),
(41, 'product41-2.jpg'),
(42, 'product42-1.jpg'),
(43, 'product43-1.jpg'),
(43, 'product43-2.jpg'),
(44, 'product44-1.jpg'),
(46, 'product46-1.jpg'),
(46, 'product46-2.jpg'),
(45, 'product45-1.jpg'),
(45, 'product45-2.jpg'),
(47, 'product47-1.jpg'),
(48, 'product48-1.jpg'),
(48, 'product48-2.jpg'),
(48, 'product48-3.jpg'),
(48, 'product48-4.jpg'),
(49, 'product49-1.jpg'),
(49, 'product49-2.jpg'),
(49, 'product49-3.jpg'),
(49, 'product49-4.jpg'),
(50, 'product50-1.jpg'),
(50, 'product50-2.jpg'),
(50, 'product50-3.jpg'),
(50, 'product50-4.jpg'),
(51, 'product51-1.jpg'),
(51, 'product51-2.jpg'),
(51, 'product51-3.jpg'),
(51, 'product51-4.jpg'),
(52, 'product52-1.jpg'),
(52, 'product52-2.jpg'),
(52, 'product52-3.jpg'),
(52, 'product52-4.jpg'),
(52, 'product52-5.jpg'),
(53, 'product53-1.png'),
(53, 'product53-2.jpg'),
(53, 'product53-3.jpg'),
(53, 'product53-4.jpg'),
(53, 'product53-5.jpg'),
(53, 'product53-6.jpg'),
(54, 'product54-1.jpg'),
(54, 'product54-2.jpg'),
(54, 'product54-3.jpg'),
(54, 'product54-4.jpg'),
(54, 'product54-5.jpg'),
(55, 'product55-1.jpg'),
(55, 'product55-2.jpg'),
(56, 'product56-1.jpg'),
(56, 'product56-2.jpg'),
(56, 'product56-3.jpg'),
(56, 'product56-4.jpg'),
(57, 'product57-1.jpg'),
(57, 'product57-2.jpg'),
(57, 'product57-3.jpg'),
(58, 'product58-1.jpg'),
(58, 'product58-2.jpg'),
(58, 'product58-3.jpg'),
(59, 'product59-1.jpg'),
(59, 'product59-2.jpg'),
(60, 'product60-1.jpg'),
(60, 'product60-2.jpg'),
(60, 'product60-3.jpg'),
(60, 'product60-4.jpg'),
(61, 'product61-1.jpg'),
(61, 'product61-2.jpg'),
(61, 'product61-3.jpg'),
(62, 'product62-1.jpg'),
(62, 'product62-2.jpg'),
(63, 'product63-1.jpg'),
(63, 'product63-2.jpg'),
(63, 'product63-3.jpg'),
(64, 'product64-1.jpg'),
(65, 'product65-1.jpg'),
(65, 'product65-2.jpg'),
(66, 'product66-1.jpg'),
(66, 'product66-2.jpg'),
(67, 'product67-1.jpg'),
(67, 'product67-2.jpg'),
(68, 'product68-1.jpg'),
(68, 'product68-2.jpg'),
(68, 'product68-3.jpg'),
(68, 'product68-4.jpg'),
(69, 'product69-1.jpg'),
(69, 'product69-2.jpg'),
(69, 'product69-3.jpg'),
(70, 'product70-1.jpg'),
(70, 'product70-2.jpg'),
(71, 'product71-1.jpg'),
(71, 'product71-2.jpg'),
(71, 'product71-3.jpg'),
(71, 'product71-4.jpg'),
(72, 'product72-1.jpg'),
(72, 'product72-2.jpg'),
(72, 'product72-3.jpg'),
(72, 'product72-4.jpg'),
(73, 'product73-1.jpg'),
(73, 'product73-2.jpg'),
(73, 'product73-3.jpg'),
(74, 'product74-1.jpg'),
(74, 'product74-2.jpg'),
(74, 'product74-3.jpg'),
(74, 'product74-4.jpg'),
(75, 'product75-1.jpg'),
(75, 'product75-2.jpg'),
(75, 'product75-3.jpg'),
(76, 'product76-1.jpg'),
(77, 'product77-1.jpg'),
(77, 'product77-2.jpg'),
(78, 'product78-1.jpg'),
(79, 'product79-1.jpg'),
(80, 'product80-1.jpg'),
(80, 'product80-2.jpg'),
(81, 'product81-1.jpg'),
(81, 'product81-2.jpg'),
(82, 'product82-1.jpg'),
(82, 'product82-2.jpg'),
(83, 'product83-1.jpg'),
(83, 'product83-2.jpg'),
(84, 'product84-1.jpg'),
(84, 'product84-2.jpg'),
(85, 'product85-1.jpg'),
(85, 'product85-2.jpg'),
(85, 'product85-3.jpg'),
(85, 'product85-4.jpg'),
(86, 'product86-1.jpg'),
(86, 'product86-2.jpg'),
(86, 'product86-3.jpg'),
(87, 'product87-1.jpg'),
(87, 'product87-2.jpg'),
(87, 'product87-3.jpg'),
(87, 'product87-4.jpg'),
(88, 'product88-1.jpg'),
(88, 'product88-2.jpg'),
(89, 'product89-1.jpg'),
(89, 'product89-2.jpg'),
(89, 'product89-3.jpg'),
(90, 'product90-1.jpg'),
(90, 'product90-2.jpg'),
(90, 'product90-3.jpg'),
(90, 'product90-4.jpg'),
(91, 'product91-1.jpg'),
(91, 'product91-2.jpg'),
(92, 'product92-1.jpg'),
(93, 'product93-1.jpg'),
(93, 'product93-2.jpg'),
(94, 'product94-1.jpg'),
(95, 'product95-1.jpg'),
(96, 'product96-1.jpg'),
(96, 'product96-2.jpg'),
(97, 'product97-1.jpg'),
(97, 'product97-2.jpg'),
(98, 'product98-1.jpg'),
(99, 'product99-1.jpg'),
(99, 'product99-2.jpg'),
(100, 'product100-1.jpg'),
(100, 'product100-2.jpg'),
(101, 'product101-1.jpg'),
(101, 'product101-2.jpg'),
(102, 'product102-1.jpg'),
(102, 'product102-2.jpg'),
(103, 'product103-1.jpg'),
(103, 'product103-2.jpg'),
(104, 'product104-1.jpg'),
(105, 'product105-1.jpg'),
(105, 'product105-2.jpg'),
(105, 'product105-3.jpg'),
(106, 'product106-1.jpg'),
(106, 'product106-2.jpg'),
(107, 'product107-1.jpg'),
(107, 'product107-2.jpg'),
(108, 'product108-1.jpg'),
(108, 'product108-2.jpg'),
(108, 'product108-3.jpg'),
(109, 'product109-1.jpg'),
(110, 'product110-1.jpg'),
(110, 'product110-2.jpg'),
(111, 'product111-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_option`
--

CREATE TABLE `product_option` (
  `product_id` int(11) DEFAULT NULL,
  `option_type_id` int(11) DEFAULT NULL,
  `option_value` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_value_id` int(11) NOT NULL,
  `color_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_option`
--

INSERT INTO `product_option` (`product_id`, `option_type_id`, `option_value`, `option_value_id`, `color_code`, `option_value_order`) VALUES
(1, 1, '100g', 1, '', 1),
(1, 1, '250g', 2, '', 2),
(2, 1, '100g', 1, '', 1),
(2, 1, '200g', 2, '', 2),
(5, 1, '100g', 1, '', 1),
(7, 1, '100g', 1, '', 1),
(7, 1, '200g', 2, '', 2),
(9, 1, '100g', 1, '', 1),
(9, 1, '200g', 2, '', 2),
(16, 1, '5kg', 1, '', 1),
(16, 1, '10kg', 2, '', 2),
(21, 3, 'S', 1, '', 1),
(21, 3, 'M', 2, '', 2),
(21, 3, 'L', 3, '', 3),
(60, 3, 'X', 1, '', 1),
(60, 3, 'M', 2, '', 2),
(60, 3, 'L', 3, '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_price`
--

CREATE TABLE `product_price` (
  `product_id` int(11) DEFAULT NULL,
  `option_weight_value_id` int(11) DEFAULT NULL,
  `option_weight_value_order` int(11) NOT NULL,
  `option_size_value_id` int(11) DEFAULT NULL,
  `option_size_value_order` int(11) NOT NULL,
  `option_color_value_id` int(11) DEFAULT NULL,
  `option_color_value_order` int(11) NOT NULL,
  `price` decimal(15,0) DEFAULT NULL,
  `sale_price` decimal(15,0) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sold` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_price`
--

INSERT INTO `product_price` (`product_id`, `option_weight_value_id`, `option_weight_value_order`, `option_size_value_id`, `option_size_value_order`, `option_color_value_id`, `option_color_value_order`, `price`, `sale_price`, `quantity`, `sold`) VALUES
(1, 1, 1, 1, 1, 1, 1, '125000', '0', 100, 0),
(1, 2, 2, 1, 1, 1, 1, '200000', '0', 100, 0),
(2, 1, 1, 1, 1, 1, 1, '165000', '0', 100, 0),
(2, 2, 2, 1, 1, 1, 1, '200000', '0', 100, 0),
(3, 1, 1, 1, 1, 1, 1, '145000', '0', 100, 0),
(4, 1, 1, 1, 1, 1, 1, '149000', '0', 100, 0),
(5, 1, 1, 1, 1, 1, 1, '109000', '0', 100, 0),
(6, 1, 1, 1, 1, 1, 1, '112000', '0', 100, 0),
(7, 1, 1, 1, 1, 1, 1, '200000', '0', 100, 0),
(7, 2, 2, 1, 1, 1, 1, '280000', '0', 100, 0),
(8, 1, 1, 1, 1, 1, 1, '314000', '0', 100, 0),
(9, 1, 1, 1, 1, 1, 1, '30000', '0', 100, 0),
(9, 2, 2, 1, 1, 1, 1, '50000', '0', 100, 0),
(10, 1, 1, 1, 1, 1, 1, '50000', '0', 100, 0),
(11, 1, 1, 1, 1, 1, 1, '68000', '0', 100, 0),
(12, 1, 1, 1, 1, 1, 1, '40000', '0', 100, 0),
(13, 1, 1, 1, 1, 1, 1, '35000', '0', 100, 0),
(14, 1, 1, 1, 1, 1, 1, '35000', '0', 100, 0),
(15, 1, 1, 1, 1, 1, 1, '20000', '0', 100, 0),
(16, 1, 1, 1, 1, 1, 1, '35000', '0', 100, 0),
(16, 2, 2, 1, 1, 1, 1, '60000', '0', 100, 0),
(17, 1, 1, 1, 1, 1, 1, '320', '0', 100, 0),
(18, 1, 1, 1, 1, 1, 1, '195000', '0', 100, 0),
(19, 1, 1, 1, 1, 1, 1, '37000', '0', 100, 0),
(20, 1, 1, 1, 1, 1, 1, '145000', '0', 100, 0),
(21, 1, 1, 1, 1, 1, 1, '89000', '0', 10, 0),
(21, 1, 1, 2, 2, 1, 1, '90000', '0', 10, 0),
(21, 1, 1, 3, 3, 1, 1, '95000', '0', 10, 0),
(22, 1, 1, 1, 1, 1, 1, '145000', '0', 10, 0),
(23, 1, 1, 1, 1, 1, 1, '105000', '0', 100, 0),
(24, 1, 1, 1, 1, 1, 1, '125000', '0', 10, 0),
(25, 1, 1, 1, 1, 1, 1, '125000', '0', 10, 0),
(26, 1, 1, 1, 1, 1, 1, '180000', '0', 10, 0),
(27, 1, 1, 1, 1, 1, 1, '180000', '0', 10, 0),
(28, 1, 1, 1, 1, 1, 1, '230000', '0', 10, 0),
(29, 1, 1, 1, 1, 1, 1, '362000', '0', 10, 0),
(30, 1, 1, 1, 1, 1, 1, '231000', '0', 23, 0),
(31, 1, 1, 1, 1, 1, 1, '231000', '0', 83, 0),
(32, 1, 1, 1, 1, 1, 1, '312000', '0', 65, 0),
(33, 1, 1, 1, 1, 1, 1, '259000', '0', 63, 0),
(34, 1, 1, 1, 1, 1, 1, '227000', '0', 37, 0),
(35, 1, 1, 1, 1, 1, 1, '227000', '0', 59, 0),
(36, 1, 1, 1, 1, 1, 1, '100000', '0', 83, 0),
(37, 1, 1, 1, 1, 1, 1, '49000', '0', 100, 0),
(38, 1, 1, 1, 1, 1, 1, '70000', '0', 73, 0),
(39, 1, 1, 1, 1, 1, 1, '53000', '0', 48, 0),
(40, 1, 1, 1, 1, 1, 1, '49000', '0', 74, 0),
(41, 1, 1, 1, 1, 1, 1, '44000', '0', 83, 0),
(42, 1, 1, 1, 1, 1, 1, '24000', '0', 83, 0),
(43, 1, 1, 1, 1, 1, 1, '30000', '0', 72, 0),
(44, 1, 1, 1, 1, 1, 1, '40000', '0', 63, 0),
(45, 1, 1, 1, 1, 1, 1, '80000', '0', 83, 0),
(46, 1, 1, 1, 1, 1, 1, '35000', '0', 83, 0),
(47, 1, 1, 1, 1, 1, 1, '120000', '0', 48, 0),
(48, 1, 1, 1, 1, 1, 1, '35000', '0', 48, 0),
(49, 1, 1, 1, 1, 1, 1, '355000', '0', 48, 0),
(50, 1, 1, 1, 1, 1, 1, '130000', '0', 38, 0),
(51, 1, 1, 1, 1, 1, 1, '249000', '0', 36, 0),
(52, 1, 1, 1, 1, 1, 1, '345000', '0', 38, 0),
(53, 1, 1, 1, 1, 1, 1, '95000', '0', 73, 0),
(54, 1, 1, 1, 1, 1, 1, '50000', '0', 48, 0),
(55, 1, 1, 1, 1, 1, 1, '18000', '0', 73, 0),
(56, 1, 1, 1, 1, 1, 1, '4699000', '0', 38, 0),
(57, 1, 1, 1, 1, 1, 1, '30000', '0', 73, 0),
(58, 1, 1, 1, 1, 1, 1, '30000', '0', 478, 0),
(59, 1, 1, 1, 1, 1, 1, '2500000', '0', 38, 0),
(60, 1, 1, 1, 1, 1, 1, '50000', '0', 456, 0),
(60, 1, 1, 2, 2, 1, 1, '70000', '0', 26, 0),
(60, 1, 1, 3, 3, 1, 1, '80000', '0', 36, 0),
(61, 1, 1, 1, 1, 1, 1, '99000', '0', 94, 0),
(62, 1, 1, 1, 1, 1, 1, '25000', '0', 47, 0),
(63, 1, 1, 1, 1, 1, 1, '120000', '0', 45, 0),
(64, 1, 1, 1, 1, 1, 1, '335000', '0', 83, 0),
(65, 1, 1, 1, 1, 1, 1, '79000', '0', 48, 0),
(66, 1, 1, 1, 1, 1, 1, '79000', '0', 35, 0),
(67, 1, 1, 1, 1, 1, 1, '79000', '0', 36, 0),
(68, 1, 1, 1, 1, 1, 1, '112000', '0', 83, 0),
(69, 1, 1, 1, 1, 1, 1, '35000', '0', 63, 0),
(70, 1, 1, 1, 1, 1, 1, '35000', '0', 35, 0),
(71, 1, 1, 1, 1, 1, 1, '12500', '0', 47, 0),
(72, 1, 1, 1, 1, 1, 1, '37000', '0', 47, 0),
(73, 1, 1, 1, 1, 1, 1, '45000', '0', 37, 0),
(74, 1, 1, 1, 1, 1, 1, '45000', '0', 37, 0),
(75, 1, 1, 1, 1, 1, 1, '28000', '0', 34, 0),
(76, 1, 1, 1, 1, 1, 1, '55000', '0', 35, 0),
(77, 1, 1, 1, 1, 1, 1, '56000', '0', 52, 0),
(78, 1, 1, 1, 1, 1, 1, '165000', '0', 49, 0),
(79, 1, 1, 1, 1, 1, 1, '253000', '0', 38, 0),
(80, 1, 1, 1, 1, 1, 1, '145000', '0', 38, 0),
(81, 1, 1, 1, 1, 1, 1, '239000', '0', 82, 0),
(82, 1, 1, 1, 1, 1, 1, '108000', '0', 63, 0),
(83, 1, 1, 1, 1, 1, 1, '195000', '0', 94, 0),
(84, 1, 1, 1, 1, 1, 1, '75000', '0', 83, 0),
(85, 1, 1, 1, 1, 1, 1, '250000', '0', 83, 0),
(86, 1, 1, 1, 1, 1, 1, '370000', '0', 38, 0),
(87, 1, 1, 1, 1, 1, 1, '254000', '0', 49, 0),
(88, 1, 1, 1, 1, 1, 1, '660000', '0', 83, 0),
(89, 1, 1, 1, 1, 1, 1, '120000', '0', 38, 0),
(90, 1, 1, 1, 1, 1, 1, '240000', '0', 49, 0),
(91, 1, 1, 1, 1, 1, 1, '80000', '0', 84, 0),
(92, 1, 1, 1, 1, 1, 1, '330000', '0', 48, 0),
(93, 1, 1, 1, 1, 1, 1, '395000', '0', 94, 0),
(94, 1, 1, 1, 1, 1, 1, '211000', '0', 39, 0),
(95, 1, 1, 1, 1, 1, 1, '225', '0', 37, 0),
(96, 1, 1, 1, 1, 1, 1, '90000', '0', 38, 0),
(97, 1, 1, 1, 1, 1, 1, '30000', '0', 30, 0),
(98, 1, 1, 1, 1, 1, 1, '29000', '0', 46, 0),
(99, 1, 1, 1, 1, 1, 1, '19000', '0', 20, 0),
(100, 1, 1, 1, 1, 1, 1, '279000', '0', 82, 0),
(101, 1, 1, 1, 1, 1, 1, '193', '0', 47, 0),
(102, 1, 1, 1, 1, 1, 1, '256000', '0', 58, 0),
(103, 1, 1, 1, 1, 1, 1, '181000', '0', 38, 0),
(104, 1, 1, 1, 1, 1, 1, '150000', '0', 39, 0),
(105, 1, 1, 1, 1, 1, 1, '7000000', '0', 35, 0),
(106, 1, 1, 1, 1, 1, 1, '2999000', '0', 42, 0),
(107, 1, 1, 1, 1, 1, 1, '1600000', '0', 24, 0),
(108, 1, 1, 1, 1, 1, 1, '211000', '0', 93, 0),
(109, 1, 1, 1, 1, 1, 1, '196000', '0', 24, 0),
(110, 1, 1, 1, 1, 1, 1, '29000', '0', 27, 0),
(111, 1, 1, 1, 1, 1, 1, '274000', '0', 28, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `star` int(1) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shop_cate`
--

CREATE TABLE `shop_cate` (
  `id` int(11) NOT NULL,
  `shopcate_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentcate_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_cate`
--

INSERT INTO `shop_cate` (`id`, `shopcate_name`, `parentcate_id`) VALUES
(1, 'Sản phẩm cho chó', 0),
(2, 'Sản phẩm cho mèo', 0),
(3, 'Thức ăn cho chó', 1),
(4, 'Trang phục cho chó', 1),
(5, 'Y tế & Thuốc cho chó', 1),
(6, 'Đồ dùng cho chó', 1),
(7, 'Thức ăn cho mèo', 2),
(8, 'Trang phục cho mèo', 2),
(9, 'Y tế & Thuốc cho mèo', 2),
(10, 'Đồ dùng cho mèo', 2),
(11, 'Thức ăn khô cho chó', 3),
(12, 'Thức ăn ướt cho chó', 3),
(13, 'Pate cho chó', 3),
(14, 'Snack - Xương - Bánh cho chó', 3),
(15, 'Sữa cho chó', 3),
(16, 'Quần áo cho chó', 4),
(17, 'Váy cho chó', 4),
(18, 'Giày, tất cho chó', 4),
(19, 'Canxi & Vitamins cho chó', 5),
(20, 'Thuốc trị ve, rận cho chó', 5),
(21, 'Vệ sinh tai, mắt, miệng cho chó', 5),
(22, 'Đồ chơi cho chó', 6),
(23, 'Túi, lồng vận chuyển cho chó', 6),
(24, 'Bát ăn, uống cho chó', 6),
(25, 'Đồ huấn luyện cho chó', 6),
(26, 'Thức ăn khô cho mèo', 7),
(27, 'Thức ăn ướt cho mèo', 7),
(28, 'Pate cho mèo', 7),
(29, 'Snack - Xương - Bánh cho mèo', 7),
(30, 'Sữa cho mèo', 7),
(31, 'Quần áo cho mèo', 8),
(32, 'Váy cho mèo', 8),
(33, 'Giày, tất cho mèo', 8),
(34, 'Canxi & Vitamins cho mèo', 9),
(35, 'Thuốc trị ve, rận cho mèo', 9),
(36, 'Vệ sinh tai, mắt, miệng cho mèo', 9),
(37, 'Đồ chơi cho mèo', 10),
(38, 'Túi, lồng vận chuyển cho mèo', 10),
(39, 'Bát ăn, uống cho mèo', 10),
(40, 'Đồ huấn luyện cho mèo', 10);

-- --------------------------------------------------------

--
-- Table structure for table `shop_order`
--

CREATE TABLE `shop_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `total_order` decimal(15,0) DEFAULT NULL,
  `create_time` datetime NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shop_order_detail`
--

CREATE TABLE `shop_order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_option` varchar(200) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(15,0) DEFAULT NULL,
  `total_price` decimal(15,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `whistlist`
--

CREATE TABLE `whistlist` (
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option_type`
--
ALTER TABLE `option_type`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_prod_brand` (`brand_id`);

--
-- Indexes for table `product_cate`
--
ALTER TABLE `product_cate`
  ADD KEY `FK_prod_procate` (`product_id`),
  ADD KEY `FK_procate_shopcate` (`shopcate_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD KEY `FK_prod_proimg` (`product_id`);

--
-- Indexes for table `product_option`
--
ALTER TABLE `product_option`
  ADD KEY `FK_prodopt_optype` (`option_type_id`),
  ADD KEY `FK_prodopt_products` (`product_id`);

--
-- Indexes for table `product_price`
--
ALTER TABLE `product_price`
  ADD KEY `FK_prodprice_products` (`product_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_rate_userlogin` (`user_id`),
  ADD KEY `FK_rate_products` (`product_id`);

--
-- Indexes for table `shop_cate`
--
ALTER TABLE `shop_cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_order`
--
ALTER TABLE `shop_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_shor_user` (`user_id`);

--
-- Indexes for table `shop_order_detail`
--
ALTER TABLE `shop_order_detail`
  ADD KEY `FK_sod_products` (`product_id`),
  ADD KEY `FK_sod_so` (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whistlist`
--
ALTER TABLE `whistlist`
  ADD KEY `FK_wl_produtcs` (`product_id`),
  ADD KEY `FK_wl_user` (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_prod_brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`);

--
-- Constraints for table `product_cate`
--
ALTER TABLE `product_cate`
  ADD CONSTRAINT `FK_procate_shopcate` FOREIGN KEY (`shopcate_id`) REFERENCES `shop_cate` (`id`),
  ADD CONSTRAINT `FK_prod_procate` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `FK_prod_proimg` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_option`
--
ALTER TABLE `product_option`
  ADD CONSTRAINT `FK_prodopt_optype` FOREIGN KEY (`option_type_id`) REFERENCES `option_type` (`option_id`),
  ADD CONSTRAINT `FK_prodopt_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_price`
--
ALTER TABLE `product_price`
  ADD CONSTRAINT `FK_prodprice_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `FK_rate_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `FK_rate_userlogin` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `shop_order`
--
ALTER TABLE `shop_order`
  ADD CONSTRAINT `FK_shor_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `shop_order_detail`
--
ALTER TABLE `shop_order_detail`
  ADD CONSTRAINT `FK_sod_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `FK_sod_so` FOREIGN KEY (`order_id`) REFERENCES `shop_order` (`id`);

--
-- Constraints for table `whistlist`
--
ALTER TABLE `whistlist`
  ADD CONSTRAINT `FK_wl_produtcs` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `FK_wl_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
