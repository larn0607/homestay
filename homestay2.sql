-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 02, 2021 lúc 10:36 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `homestay2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `booking_status` tinyint(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `booking`
--

INSERT INTO `booking` (`booking_id`, `room_id`, `user_id`, `check_in`, `check_out`, `booking_status`) VALUES
(41, 7, 1, '2021-01-01', '2021-01-02', 2),
(45, 7, 1, '2021-01-01', '2021-01-02', 2),
(46, 7, 5, '2021-01-01', '2021-01-02', 2),
(47, 7, 1, '2021-01-02', '2021-01-03', 2),
(48, 7, 1, '2021-01-02', '2021-01-03', 2),
(49, 7, 1, '2021-01-02', '2021-01-03', 2),
(50, 1, 1, '2021-01-02', '2021-01-03', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `qlt_room` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `qlt_bed` int(11) NOT NULL,
  `bed_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `facility` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_name`, `qlt_room`, `available`, `qlt_bed`, `bed_type`, `description`, `facility`, `price`, `image`, `status`) VALUES
(1, 'PhÃ²ng TÃ­ Äiá»‡u', 8, 8, 1, 'ÄÆ¡n', 'PhÃ²ng diá»‡n tÃ­ch: 3m2 NhÃ¬n ra cá»­a lÃ  bá»¥i hoa cáº©m tÃº cáº§u bÃ© xinh.', 'Wifi,NhÃ  vá»‡ sinh chung,PhÃ²ng táº¯m chung,1 chai nÆ°á»›c', 170000, 'b2b788fba05aa7b4c73debc90ae8bdc8.jpg', 1),
(2, 'PhÃ²ng BÃ¡c Hai', 6, 6, 1, 'ÄÃ´i', 'Diá»‡n tÃ­ch: 14m2, cÃ³ view nhÃ¬n ra thung lÅ©ng.', 'Wifi,NhÃ  táº¯m trong phÃ²ng,Toilet riÃªng,2 chai nÆ°á»›c,DÃ©p mang trong phÃ²ng,Tivi', 390000, 'e81b9c001f19782e25b69345723923c9.jpg', 1),
(3, 'PhÃ²ng Cáº­u Ba', 5, 5, 1, 'ÄÃ´i', 'Diá»‡n tÃ­ch: 14m2, cÃ³ 1 giÆ°á»ng cho 2 ngÆ°á»i vÃ  náº±m trÃªn láº§u cÃ³ view nhÃ¬n ra thung lÅ©ng.', 'Wifi,NhÃ  táº¯m trong phÃ²ng,Toilet riÃªng,2 chai nÆ°á»›c,DÃ©p mang trong phÃ²ng,Tivi', 390000, '758ce48fdc4988001116dd9b74f17f22.jpg', 1),
(4, 'PhÃ²ng CÃ´ TÆ°', 4, 4, 2, 'ÄÃ´i', 'PhÃ²ng gá»“m 2 giÆ°á»ng dÃ nh cho 4 ngÆ°á»i vÃ  1 toilet trong phÃ²ng.', 'Wifi,NhÃ  táº¯m trong phÃ²ng,Toilet riÃªng,4 chai nÆ°á»›c,DÃ©p mang trong phÃ²ng,Tivi,Tá»§ láº¡nh', 780000, 'd0096ec6c83575373e3a21d129ff8fef.jpg', 1),
(5, 'PhÃ²ng ChÃº NÄƒm', 5, 5, 1, 'ÄÃ´i', 'PhÃ²ng ChÃº NÄƒm cÃ³ 1 giÆ°á»ng cho 2 ngÆ°á»i vÃ  náº±m trÃªn láº§u, cÃ³ view nhÃ¬n ra thung lÅ©ng,', 'Wifi,NhÃ  táº¯m trong phÃ²ng,Toilet riÃªng,2 chai nÆ°á»›c,DÃ©p mang trong phÃ²ng,Tivi', 390000, '032b2cc936860b03048302d991c3498f.jpg', 1),
(7, 'PhÃ²ng DÆ°á»£ng SÃ¡u', 3, 3, 3, 'Táº§ng', 'PhÃ²ng DÆ°á»£ng SÃ¡u cÃ³ 3 giÆ°á»ng táº§ng thÃ­ch há»£p cho nhÃ³m Ä‘i 5-6 ngÆ°á»i cÃ³ view nhÃ¬n ra vÆ°á»ng, WC riÃªng bÃªn trong.', 'Wifi,NhÃ  táº¯m trong phÃ²ng,Toilet riÃªng,6 chai nÆ°á»›c,DÃ©p mang trong phÃ²ng,Tivi', 480000, '18e2999891374a475d0687ca9f989d83.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `full_name`, `email`, `phone`, `status`, `dateCreated`) VALUES
(1, 'lam', 'a123', 'Lam', 'thanhlam672000@gmail.com', '0931974350', 1, '2020-12-31 18:31:41'),
(5, 'thanhlam', '2', 'Lam Bui', 'thanhlam672000@gmail.com', '0931974350', 1, '2021-01-01 10:07:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_admin`
--

CREATE TABLE `users_admin` (
  `ad_id` int(11) NOT NULL,
  `username` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usertype` tinyint(4) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users_admin`
--

INSERT INTO `users_admin` (`ad_id`, `username`, `password`, `fullname`, `email`, `usertype`, `dateCreated`) VALUES
(3, 'admin', 'admin', 'Lam', 'thanhlam672000@gmail.com', 1, '2020-12-31 11:03:10');

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `view_booking`
-- (See below for the actual view)
--
CREATE TABLE `view_booking` (
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `v_all`
-- (See below for the actual view)
--
CREATE TABLE `v_all` (
`booking_id` int(11)
,`user_id` int(11)
,`check_in` date
,`check_out` date
,`booking_status` tinyint(1)
,`room_id` int(11)
,`room_name` varchar(30)
,`qlt_room` int(11)
,`available` int(11)
,`qlt_bed` int(11)
,`bed_type` varchar(20)
,`description` text
,`facility` text
,`price` int(11)
,`image` varchar(40)
,`status` tinyint(4)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `v_check`
-- (See below for the actual view)
--
CREATE TABLE `v_check` (
);

-- --------------------------------------------------------

--
-- Cấu trúc cho view `view_booking`
--
DROP TABLE IF EXISTS `view_booking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_booking`  AS  select `booking`.`booking_id` AS `booking_id`,`booking`.`room_id` AS `room_id`,`booking`.`check_in` AS `check_in`,`booking`.`check_out` AS `check_out`,`booking`.`full_name` AS `full_name`,`booking`.`email` AS `email`,`booking`.`phone` AS `phone`,`booking`.`booking_status` AS `booking_status`,`rooms`.`room_name` AS `room_name` from (`booking` join `rooms` on(`booking`.`room_id` = `rooms`.`room_id`)) ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `v_all`
--
DROP TABLE IF EXISTS `v_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_all`  AS  select `booking`.`booking_id` AS `booking_id`,`booking`.`user_id` AS `user_id`,`booking`.`check_in` AS `check_in`,`booking`.`check_out` AS `check_out`,`booking`.`booking_status` AS `booking_status`,`rooms`.`room_id` AS `room_id`,`rooms`.`room_name` AS `room_name`,`rooms`.`qlt_room` AS `qlt_room`,`rooms`.`available` AS `available`,`rooms`.`qlt_bed` AS `qlt_bed`,`rooms`.`bed_type` AS `bed_type`,`rooms`.`description` AS `description`,`rooms`.`facility` AS `facility`,`rooms`.`price` AS `price`,`rooms`.`image` AS `image`,`rooms`.`status` AS `status` from ((`booking` join `rooms` on(`booking`.`room_id` = `rooms`.`room_id`)) join `users`) ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `v_check`
--
DROP TABLE IF EXISTS `v_check`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_check`  AS  select `booking`.`booking_id` AS `booking_id`,`booking`.`user_id` AS `user_id`,`booking`.`check_in` AS `check_in`,`booking`.`check_out` AS `check_out`,`booking`.`booking_status` AS `booking_status`,`booking`.`check_stt` AS `check_stt`,`rooms`.`room_id` AS `room_id`,`rooms`.`room_name` AS `room_name`,`rooms`.`qlt_room` AS `qlt_room`,`rooms`.`available` AS `available`,`rooms`.`qlt_bed` AS `qlt_bed`,`rooms`.`bed_type` AS `bed_type`,`rooms`.`description` AS `description`,`rooms`.`facility` AS `facility`,`rooms`.`price` AS `price`,`rooms`.`image` AS `image`,`rooms`.`status` AS `status` from (`booking` join `rooms` on(`booking`.`room_id` = `rooms`.`room_id`)) ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `booking_ibfk_1` (`room_id`),
  ADD KEY `booking_ibfk_2` (`user_id`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `users_admin`
--
ALTER TABLE `users_admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
