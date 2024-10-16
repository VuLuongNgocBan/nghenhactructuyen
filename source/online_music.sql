-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 18, 2022 lúc 04:05 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `online_music`
--
CREATE DATABASE IF NOT EXISTS `online_music` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `online_music`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(40) NOT NULL,
  `priority_id` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `name`, `priority_id`) VALUES
(1, 'admin', '123456', 'admin@gmail.com', 'admin', 1),
(2, 'user', '123456', 'user@gmail.com', 'Test User', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Hiphop'),
(2, 'Pop'),
(3, 'Rock'),
(4, 'Ballad'),
(5, 'Rap'),
(6, 'Melody'),
(7, 'Thi'),
(8, ''),
(9, ''),
(10, ''),
(11, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  `comment_content` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `music_list`
--

CREATE TABLE `music_list` (
  `id` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `singer_id` int(11) NOT NULL,
  `lyrics` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `url` char(40) DEFAULT NULL,
  `image` char(50) NOT NULL,
  `listens` int(11) NOT NULL,
  `vote` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `music_list`
--

INSERT INTO `music_list` (`id`, `name`, `singer_id`, `lyrics`, `description`, `category_id`, `url`, `image`, `listens`, `vote`) VALUES
(4, 'Nói hoặc không nói', 6, 'lyric của người lạ ơi', 'Rap của Karik', 5, 'noihoackhongnoi.mp3', './img/singer/amee.jpg', 100, 0),
(5, 'Em ngủ chưa', 11, 'Lyric của cơn mơ băng giá', 'nhạc của bằng kiều', 1, 'emnguchua.mp3', './img/singer/trinhthangbinh.jpg', 100, 0),
(6, 'Người Ấy', 11, 'lời bài dtcem', 'nhạc của buitruonglinh', 2, 'nguoiay.mp3', './img/singer/trinhthangbinh.jpg', 100, 0),
(7, 'Vô Tận', 11, 'lời bài bttl', 'Nhạc của tăngduytân', 2, 'votan.mp3', './img/singer/trinhthangbinh.jpg', 100, 0),
(8, 'Khác biệt to lớn', 11, 'Lời bài kmct', 'Nhạc của Đan Nguyên', 1, 'khacbiettolon.mp3', './img/singer/trinhthangbinh.jpg', 100, 0),
(10, 'Câu hẹn câu thề', 9, 'lyric của CUA', 'Bài rap của HIEUTHUHAI', 5, 'cauhencauthe.mp3', './img/singer/dinhdung.jpg', 100, 0),
(11, 'Khuôn mặt đáng thương', 2, 'lyric của nnca', 'Đây là một trong các bài hit của Sơn Tùng MTP', 2, 'khuonmatdangthuong.mp3', './img/singer/sontung.jpg', 100, 0),
(12, 'Muộn rồi mà sao còn', 2, 'lyric của ccyld', 'Đây là một trong các bài hit của Sơn Tùng MTP', 2, 'muonroimasaocon.mp3', './img/singer/sontung.jpg', 100, 0),
(13, 'Đừng hẹn kiếp sau', 9, 'lyric của đi để trở về', 'Bài hát tết của Soobin Hoàng Sơn', 2, 'dunghenkiepsau.mp3', './img/singer/dinhdung.jpg', 100, 0),
(14, 'Sao ta ngược lối', 9, 'lời bài tình đầu', 'Nhạc của tăngduytân', 2, 'saotanguocloi.mp3', './img/singer/dinhdung.jpg', 100, 0),
(15, 'Nàng thơ', 6, 'lời bài Anh nhà ở đâu thế', 'Bài hit của Amee', 2, 'nangtho.mp3', './img/singer/amee.jpg', 100, 0),
(16, 'Shay nắng', 6, 'lời bài Anh tgrmđ', 'Bài hit của Amee', 2, 'shaynang.mp3', './img/singer/amee.jpg', 100, 0),
(17, 'Thấy một cô gái yêu anh', 6, 'lời bài Anh sao anh chưa về', 'Bài hit của Amee', 2, 'thaymoicogaiiuanh.mp3', './img/singer/amee.jpg', 100, 0),
(18, 'Nắng ấm xa dần', 2, 'lyric của Em là', 'Đây là bản nhạc hot nhất của Sơn Tùng MTP', 2, 'nangamxadan.mp3', './img/singer/sontung.jpg', 100, 0),
(19, 'Lạc trôi', 2, 'lyric của lạc trôi', 'Đây là một trong các bài hit của Sơn Tùng MTP', 2, 'lactroi.mp3', './img/singer/sontung.jpg', 100, 0),
(20, 'Hãy trao cho anh', 2, 'lyric của hãy trao cho anh', 'Đây là một trong các bài hit của Sơn Tùng MTP', 2, 'haytraochoanh.mp3', './img/singer/sontung.jpg', 100, 0),
(21, 'Đế Vương', 9, 'lyric của nghe như tình yêu', 'Bài rap của HIEUTHUHAI', 5, 'devuong.mp3', './img/singer/dinhdung.jpg', 100, 0),
(22, 'Cứ yêu đi', 10, 'lyric của bật nhạc lên', 'Bài rap của HIEUTHUHAI', 5, 'cuyeudi.mp3', './img/singer/ducphuc.jpg', 100, 0),
(23, 'Gửi ngàn lời yêu', 10, 'lyric của nếu ngày ấy', 'Bài hit của Soobin Hoàng Sơn', 2, 'guinganloiyeu.mp3', './img/singer/ducphuc.jpg', 100, 0),
(24, 'Ngày đầu tiên', 10, 'lyric của phía sau một cô gái', 'Bài hit nhất của Soobin Hoàng Sơn', 2, 'ngaydautien.mp3', './img/singer/ducphuc.jpg', 100, 0),
(25, 'Trái đất đẹp khi có em', 10, 'lyric của mình là gì của nhau', 'Nhạc của Lou Hoàng', 2, 'traidatdepnhatkhicoem.mp3', './img/singer/ducphuc.jpg', 100, 0),
(31, 'waiting for you', 1, 'lyric của waiting for you', 'Đây là bản nhạc hot nhất của MONO', 2, 'waitingforyou.mp3', './img/singer/mono.jpg', 100, 0),
(32, 'Em là', 1, 'lyric của em là', 'Đây là bản nhạc hot của MONO', 2, 'emla.mp3', './img/singer/mono.jpg', 100, 0),
(33, 'Quên anh đi', 1, 'lyric của quên anh đi', 'Đây là bản nhạc hot của MONO', 2, 'quenanhdi.mp3', './img/singer/mono.jpg', 100, 0),
(34, 'CUA', 4, 'lyric của CUA', 'Bài rap của HIEUTHUHAI', 5, 'cua.mp3', './img/singer/hieuthuhai.jpg', 100, 0),
(35, 'Bật nhạc lên', 4, 'lyric của bật nhạc lên', 'Bài rap của HIEUTHUHAI', 5, 'batnhaclen.mp3', './img/singer/hieuthuhai.jpg', 100, 0),
(36, 'Hướng dương', 4, 'lyric của hướng dương', 'Bài rap của HIEUTHUHAI', 5, 'huongduong.mp3', './img/singer/hieuthuhai.jpg', 100, 0),
(37, 'Cảm giác lúc ấy sẽ ra sao', 7, 'Lời bài hát của cảm giác lúc ấy sẽ ra sao', 'Bài nhạc hot của Lou Hoàng', 2, 'camgiaclucayserasao.mp3', './img/singer/louhoang.jpg', 100, 0),
(38, 'Bắt cóc con tim', 7, 'lyric của bắt cóc con tim', 'Bài rap của Lou Hoàng', 5, 'batcoccontim.mp3', './img/singer/louhoang.jpg', 100, 0),
(39, 'Là bạn không thể yêu', 7, 'lyric của là bạn không thể yêu', 'Bài hit của Lou Hoàng', 2, 'labankhongtheyeu.mp3', './img/singer/louhoang.jpg', 100, 0),
(40, 'Tình đầu', 3, 'lời bài tình đầu', 'Nhạc của tăng duy tân', 2, 'tinhdau.mp3', './img/singer/tangduytan.jpg', 100, 0),
(41, 'Bên trên tầng lầu', 3, 'lời bài hát bên trên tầng lầu', 'bài rap của tăng duy tân', 5, 'bentrentanglau.mp3', './img/singer/tangduytan.jpg', 100, 0),
(42, 'Em ơi đừng khóc', 3, 'lời bài hát em ơi đừng khóc', 'bài rap của tăng duy tân', 5, 'emoidungkhoc.mp3', './img/singer/tangduytan.jpg', 100, 0),
(43, 'Suýt nữa thì', 8, 'lyric của suýt nữa thì', 'Bài hát của Andiez', 2, 'suytnuathi.mp3', './img/singer/andiez.jpg', 100, 0),
(44, '1 phút', 8, 'lyric của 1 phút', 'Bài hát của Andiez', 2, '1phut.mp3', './img/singer/andiez.jpg', 100, 0),
(45, 'Quá khứ chỉ nên là quá khứ', 8, 'lyric của Quá khứ chỉ nên là quá khứ', 'Bài hát của Andiez', 2, 'quakhuchinenlaquakhu.mp3', './img/singer/andiez.jpg', 100, 0),
(46, 'Đi để trở về', 5, 'lyric của đi để trở về', 'Bài hát tết của Soobin Hoàng Sơn', 2, 'didetrove.mp3', './img/singer/soobin.jpg', 100, 0),
(47, 'Anh đã quen với cô đơn', 5, 'lyric của Anh đã quen với cô đơn', 'Bài hát tết của Soobin Hoàng Sơn', 2, 'anhdaquenvoicodon.mp3', './img/singer/soobin.jpg', 100, 0),
(48, 'Phía sau một cô gái', 5, 'lyric của Phía sau một cô gái', 'Bài hát tết của Soobin Hoàng Sơn', 2, 'phiasaumotcogai.mp3', './img/singer/soobin.jpg', 100, 0),
(54, 'Thi Nguyễn Thị', 6, 'tui nói nè cha', 'test', 4, 'file_example_MP3_700KB.mp3', './img/singer/long.png', 0, 0),
(56, '[value-2]', 0, '[value-4]', '[value-5]', 0, '[value-7]', '[value-8]', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `playlist`
--

INSERT INTO `playlist` (`id`, `user_id`, `music_id`) VALUES
(8, 1, 8),
(9, 1, 5),
(11, 1, 47),
(12, 1, 48),
(18, 1, 18),
(19, 1, 46),
(20, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `priority`
--

CREATE TABLE `priority` (
  `id` int(11) NOT NULL,
  `name` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `priority`
--

INSERT INTO `priority` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `singer`
--

CREATE TABLE `singer` (
  `id` int(11) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `singer`
--

INSERT INTO `singer` (`id`, `name`, `image`) VALUES
(1, 'MONO', './img/singer/mono.jpg'),
(2, 'Sơn Tùng MTP', 'img/singer/sontung.jpg'),
(3, 'Tăng Duy Tân', 'img/singer/tangduytan.jpg'),
(4, 'HIEUTHUHAI', 'img/singer/hieuthuhai.jpg'),
(5, 'Soobin Hoàng sơn', 'img/singer/soobin.jpg'),
(6, 'Amee', 'img/singer/amee.jpg'),
(7, 'Lou Hoàng', 'img/singer/louhoang.jpg'),
(8, 'Andiez', 'img/singer/andiez.jpg'),
(9, 'Đình Dũng', 'img/singer/dinhdung.jpg'),
(10, 'Đức Phúc', 'img/singer/ducphuc.jpg'),
(11, 'Trịnh Thăng Bình', 'img/singer/trinhthangbinh.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `music_list`
--
ALTER TABLE `music_list`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `singer`
--
ALTER TABLE `singer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `music_list`
--
ALTER TABLE `music_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `priority`
--
ALTER TABLE `priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `singer`
--
ALTER TABLE `singer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
