-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 12:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(60) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(5, 'Ashin', 'ashinjoseph808@gmail.com', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(50) NOT NULL,
  `booking_fordate` varchar(50) NOT NULL,
  `booking_fortime` time NOT NULL,
  `booking_address` varchar(150) NOT NULL,
  `booking_amount` int(11) NOT NULL,
  `packagehead_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_details` varchar(60) NOT NULL,
  `place_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `booking_status` varchar(11) NOT NULL,
  `booking_count` int(11) NOT NULL,
  `booking_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_fordate`, `booking_fortime`, `booking_address`, `booking_amount`, `packagehead_id`, `user_id`, `booking_details`, `place_id`, `district_id`, `booking_status`, `booking_count`, `booking_service`) VALUES
(76, '2024-10-13 11:20:28', '2024-11-03', '15:00:00', 'kolenchery central auditorium', 5500, 10, 13, 'event starts at 4 pm ', 32, 7, '3', 100, 1),
(77, '2024-10-13 12:05:33', '2024-10-23', '15:08:00', 'kolenchery central auditorium', 123243, 10, 13, 'reach by 3 pm ', 23, 7, '3', 124, 1),
(78, '2024-10-13 12:07:43', '2024-10-23', '13:08:00', 'kolenchery central auditorium', 12345, 10, 13, 'reach by 3 pm ', 22, 7, '3', 124, 0),
(79, '2024-10-16 18:57:24', '2024-10-24', '19:58:00', 'kolenchery central auditorium', 300, 64, 13, 'reach by 3 pm ', 22, 7, '1', 124, 1),
(80, '2024-10-16 19:42:08', '2024-10-23', '01:47:00', 'kolenchery central auditorium', 400, 65, 13, 'reach by 3 pm ', 24, 7, '1', 124, 1),
(81, '2024-10-16 19:48:09', '2024-10-17', '22:50:00', 'kolenchery central auditorium', 300, 10, 13, 'reach by 3 pm ', 22, 7, '2', 124, 1),
(82, '2024-10-16 21:39:56', '2024-10-24', '21:41:00', 'kolenchery central auditorium', 1000, 11, 13, 'reach by 3 pm ', 22, 7, '1', 124, 1),
(83, '2024-10-16 22:37:40', '2024-10-24', '23:38:00', 'kolenchery central auditorium', 3000, 10, 16, 'reach by 3 pm ', 23, 7, '1', 124, 1),
(84, '2024-10-17 11:46:17', '2024-10-18', '13:45:00', 'kolenchery central auditorium', 0, 10, 18, 'reach by 3 pm ', 22, 7, '', 124, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(1, 'toyota'),
(2, 'toyota');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(300) NOT NULL,
  `complaint_content` varchar(300) NOT NULL,
  `complaint_reply` varchar(300) NOT NULL,
  `complaint_date` date DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_reply`, `complaint_date`, `user_id`) VALUES
(2, 'bad food', 'the food was not good ', 'sorry', '2024-09-25', 1),
(3, 'late delivery', 'the delivery time was too late ', '', '2024-09-16', 1),
(4, 'late delivery', 'the delivery time was too late ', 'sorry', '2024-09-18', 11),
(5, 'smell', 'smell from food', 'sorry its our mistake', '2024-09-18', 12),
(6, 'dry food', 'bk id 63-the food war dry', 'sorry to hear \r\nwe will look on to it', '2024-09-24', 13),
(11, 'dry  food', 'bk id 34-the food war dry', 'ok we will look on o it', '2024-10-04', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(7, 'Ernakulam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(60) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_content`, `user_id`, `feedback_date`) VALUES
(12, '\"I had an amazing experience with the catering service! The ', 13, '2024-10-17'),
(13, '\"I was impressed with the variety of packages available. We ', 14, '2024-10-17'),
(14, '\"Great service, but I felt the delivery was a bit late. The ', 16, '2024-10-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(60) NOT NULL,
  `food_photo` varchar(300) NOT NULL,
  `food_price` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`food_id`, `food_name`, `food_photo`, `food_price`) VALUES
(11, 'pineapple juice', 'Featured-Hero_-Fresh-Pineapple-Juice-Recipe-Without-a-Juicer.jpg', '10'),
(12, 'Chilli Chicken', 'download.jpeg', '30'),
(13, 'Chicken Biriyani', 'chickenbiriyani.jpeg', '80'),
(14, 'Veg Biriyani', 'vegbiriyani.jpg', '60'),
(16, 'Beef Fry', 'beeffry.jpeg', '40'),
(17, 'Chilli Gobi', 'chilligobi.jpeg', '40'),
(18, 'Chicken Lollipop', 'lolipop.jpeg', '40'),
(19, 'Chicken Nuggets', 'nuggets.jpeg', '30'),
(20, 'Ginger Lime', 'ginger Lime.jpeg', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packagebody`
--

CREATE TABLE `tbl_packagebody` (
  `packagebody_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `packagehead_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_packagebody`
--

INSERT INTO `tbl_packagebody` (`packagebody_id`, `food_id`, `packagehead_id`) VALUES
(39, 14, 9),
(40, 17, 9),
(43, 12, 11),
(44, 14, 11),
(45, 16, 11),
(46, 17, 11),
(48, 19, 26),
(49, 20, 31),
(57, 16, 0),
(58, 12, 0),
(59, 13, 0),
(60, 12, 0),
(61, 13, 50),
(62, 11, 50),
(63, 12, 50),
(64, 17, 50),
(65, 18, 50),
(66, 20, 50),
(67, 12, 51),
(68, 14, 51),
(69, 19, 51),
(70, 13, 52),
(71, 18, 52),
(72, 12, 52),
(73, 13, 52),
(74, 16, 53),
(75, 19, 53),
(76, 19, 53),
(77, 13, 53),
(78, 11, 54),
(79, 14, 54),
(80, 18, 54),
(81, 19, 54),
(82, 11, 56),
(83, 20, 56),
(84, 19, 56),
(85, 21, 56),
(86, 22, 56),
(87, 11, 57),
(89, 21, 57),
(90, 11, 58),
(91, 20, 58),
(92, 21, 58),
(93, 12, 59),
(94, 14, 59),
(95, 21, 59),
(96, 20, 60),
(97, 21, 60),
(98, 20, 60),
(99, 20, 61),
(100, 21, 61),
(101, 22, 61),
(104, 22, 61),
(106, 11, 62),
(107, 11, 62),
(108, 12, 62),
(109, 11, 62),
(110, 14, 62),
(111, 11, 61),
(112, 11, 63),
(113, 16, 63),
(114, 18, 63),
(116, 11, 64),
(117, 12, 64),
(118, 13, 64),
(119, 14, 64),
(120, 14, 64),
(121, 12, 65),
(122, 14, 65),
(123, 19, 65),
(124, 17, 65),
(125, 11, 0),
(126, 11, 0),
(127, 11, 10),
(128, 12, 10),
(131, 13, 66),
(132, 11, 66),
(134, 16, 66),
(135, 12, 66),
(136, 12, 66),
(137, 12, 66),
(138, 12, 66),
(139, 11, 66),
(140, 11, 66),
(141, 11, 66),
(142, 16, 66),
(143, 16, 66),
(144, 12, 66),
(145, 12, 66),
(146, 12, 66),
(147, 12, 66),
(149, 19, 66),
(150, 11, 66),
(151, 11, 66),
(152, 12, 67);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packagehead`
--

CREATE TABLE `tbl_packagehead` (
  `packagehead_id` int(11) NOT NULL,
  `packagehead_date` varchar(150) NOT NULL,
  `packagehead_status` int(11) NOT NULL DEFAULT 0,
  `packagehead_details` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_packagehead`
--

INSERT INTO `tbl_packagehead` (`packagehead_id`, `packagehead_date`, `packagehead_status`, `packagehead_details`, `user_id`, `type_id`) VALUES
(9, '', 0, 'consist of varieties of vegitarian foods', 0, 1),
(10, '', 0, 'consists of varietis of non veg foods', 0, 2),
(11, '', 0, 'combo of both non-veg and veg', 0, 4),
(26, '', 0, 'basic starters ', 0, 6),
(57, '', 0, 'Custom Package', 13, 2),
(58, '', 0, 'Custom Package', 13, 6),
(59, '', 0, 'Custom Package', 14, 2),
(60, '', 0, 'Custom Package', 13, 7),
(61, '', 0, 'Refreshments', 0, 9),
(62, '', 0, 'Custom Package', 15, 1),
(63, '', 0, 'Custom Package', 16, 2),
(64, '', 0, 'Custom Package', 13, 2),
(65, '', 0, 'Custom Package', 13, 2),
(66, '', 0, 'Custom Package', 18, 2),
(67, '', 0, 'Custom Package', 18, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(60) NOT NULL,
  `district_id` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(12, 'PONANI', '2'),
(13, 'MANJERI', '2'),
(14, 'BEYPORE', '3'),
(15, 'BALUSSERY', '3'),
(16, 'OTTAPALAM', '4'),
(17, 'PATTAMBI', '4'),
(22, 'Muvattupuzha', '7'),
(23, 'Piravom', '7'),
(24, 'Kothamangalam', '7'),
(25, 'Perumbavoor', '7'),
(26, 'Vazhakulam', '7'),
(27, 'Kalamassery', '7'),
(28, 'Aluva', '7'),
(29, 'Thripunithara', '7'),
(30, 'North Parvoor', '7'),
(31, 'Angamaly', '7'),
(32, 'Kolenchery', '7'),
(33, 'Kalady', '7'),
(34, 'Mallayatoor', '7'),
(35, 'Nellad', '7'),
(36, 'Pothanikad', '7'),
(37, 'Ramamangalam', '7'),
(38, 'kadathi', '7'),
(39, 'Veloorkunnam', '7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `packagehead_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_rating` int(11) NOT NULL,
  `review_text` varchar(120) NOT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `packagehead_id`, `user_id`, `review_rating`, `review_text`, `review_date`) VALUES
(5, 26, 13, 4, 'The food was good .Overall trhe package was nice', '2024-10-07 16:53:52'),
(6, 10, 13, 5, 'Nice Food! I would recomend that you should choose this package', '2024-10-13 07:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) DEFAULT NULL,
  `subcategory_name` varchar(60) NOT NULL,
  `category_id` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(2, 'Non Veg'),
(4, 'Combined'),
(10, 'Veg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_phone` int(10) NOT NULL,
  `user_photo` varchar(200) NOT NULL,
  `user_proof` varchar(200) NOT NULL,
  `place_id` varchar(60) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_phone`, `user_photo`, `user_proof`, `place_id`, `user_status`) VALUES
(13, 'Ashin ', 'ashinjoseph808@gmail.com', '12345', 2147483647, 'wp12610196-black-bmw-4k-wallpapers.jpg', 'wp12950217-porsche-pc-wallpapers.jpg', '24', 1),
(14, 'Ashin', 'ashinjoseph6238@gmail.com', 'gmailcom', 2147483647, 'wp11395049-2022-porsche-911-gt3rs-wallpapers.jpg', 'FULL VIEW ZOOM IN-OUT Sasuke Uchiha from Naruto.Follow @inst', '22', 1),
(16, 'ibrahim', 'ibru@gmail.com', '123', 2147483647, 'FULL VIEW ZOOM IN-OUT Sasuke Uchiha from Naruto.Follow @inst', 'wp12950217-porsche-pc-wallpapers.jpg', '32', 1),
(17, 'ashna ', 'ashna@hmail.com', '12345', 2147483647, '', '', '23', 1),
(18, 'john', 'john@gmail.com', '12345', 2147483647, '', '', '29', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `tbl_packagebody`
--
ALTER TABLE `tbl_packagebody`
  ADD PRIMARY KEY (`packagebody_id`);

--
-- Indexes for table `tbl_packagehead`
--
ALTER TABLE `tbl_packagehead`
  ADD PRIMARY KEY (`packagehead_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_packagebody`
--
ALTER TABLE `tbl_packagebody`
  MODIFY `packagebody_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `tbl_packagehead`
--
ALTER TABLE `tbl_packagehead`
  MODIFY `packagehead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
