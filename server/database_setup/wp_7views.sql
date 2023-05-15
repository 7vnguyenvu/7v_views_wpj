-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 15, 2023 lúc 09:28 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `wp_7views`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `_ID` int(11) NOT NULL,
  `USER_NAME` char(20) NOT NULL,
  `USER_PASS` char(20) NOT NULL,
  `USER_LEVEL` int(11) NOT NULL,
  `USER_LOCK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`_ID`, `USER_NAME`, `USER_PASS`, `USER_LEVEL`, `USER_LOCK`) VALUES
(1, '7v52admin', 'admin777', 1, 0),
(2, '7v52admin2', 'admin777', 1, 0),
(3, 'thanhtu911', 'tusoaika', 4, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `TITLE` text DEFAULT NULL,
  `CONTENT` text NOT NULL,
  `TYPICAL_IMAGE` tinytext DEFAULT NULL,
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`_ID`, `USER_ID`, `TITLE`, `CONTENT`, `TYPICAL_IMAGE`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 1, 'Tìm hiểu về Serif và Sans-serif', '`Định nghĩa Serif\r\nSerif nghĩa là một đường thẳng hoặc một nét nhỏ ở trên thành phần của chữ, thường là những đường định hướng và ổn định cấu tạo chữ. Serif thường được biết đến với tên gọi “chữ có chân”. Định nghĩa sans-serif\r\nTrong tiếng Latin, sans-serif nghĩa là “không có chân”, để chỉ những kiểu chữ không có thêm các yếu tố “serif” - đường thẳng hoặc một nét nhỏ ở trên thành phần của chữ, thường là những đường định hướng và ổn định cấu tạo chữ.', 'https://files.fullstack.edu.vn/f8-prod/blog_posts/6781/6412fc6e5188b.jpg', '2023-05-09 00:55:35', '0000-00-00 00:00:00'),
(3, 1, 'Iphone và Laptop', '<p>Gi&aacute; đắc v&atilde;i l&igrave;n</p>', 'uploads/blog_imgs/cover_img_2.png', '2023-05-12 09:32:09', '2023-05-12 09:32:09'),
(4, 1, 'Đệ đệ song sinh với sư phụ Lâm Chánh Anh, Lâm Chánh Cửu', '<p>&Ocirc;ng n&agrave;y diễn cũng được nhưng kh&ocirc;ng bằng &ocirc;ng sư huynh, Cũm OK lắm.</p>', 'uploads/blog_imgs/64622300327bd__screenshot_1683480102.png', '2023-05-12 09:34:43', '2023-05-15 07:18:08'),
(5, 2, 'ICon mới cho user đẹp bá cháy', '<p>Kh&ocirc;ng thể tin nổi.</p>', 'uploads/blog_imgs/6462224d03a89__pngwing.com (1).png', '2023-05-15 07:15:09', '2023-05-15 07:15:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `_ID` int(11) NOT NULL,
  `REF_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `CONTENT` text NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes`
--

CREATE TABLE `likes` (
  `_ID` int(11) NOT NULL,
  `REF_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `_ID` int(11) NOT NULL,
  `TOPIC_ID` int(11) NOT NULL,
  `TITLE` text NOT NULL,
  `SAPO` text NOT NULL,
  `CONTENT` text NOT NULL,
  `TYPICAL_IMAGE` tinytext NOT NULL,
  `NOTE_IMAGE` tinytext NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`_ID`, `TOPIC_ID`, `TITLE`, `SAPO`, `CONTENT`, `TYPICAL_IMAGE`, `NOTE_IMAGE`, `USER_ID`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 5, 'Chùa Hang ở Châu Đốc tăng giá giữ xe', 'Điều gây chấn động nhất hôm nay là Chùa Hang ở Châu Đốc tăng giá giữ xe', '<p>Chấn động Ch&acirc;u Đốc nhất h&ocirc;m nay l&agrave; Ch&ugrave;a Hang tăng gi&aacute; giữ xe l&ecirc;n 50k cho 1 lần gửi</p>', 'uploads/news_imgs/chuahang.png', 'Chùa Hang ở Châu Đốc', 1, '2023-05-06 07:20:18', '2023-05-08 03:45:59'),
(2, 7, 'Nắng nóng ở Việt Nam lập kỷ lục mới, có nơi 44,1 độ C', '(PLO)- Nhiệt độ lúc 16 giờ chiều 6-5 tại trạm Hồi Xuân (Thanh Hoá) đo được là 43,8 độ, có thời điểm lên 44,1 độ C.', '<p>Chiều 6-5, kỷ lục mới về nhiệt độ đ&atilde; được thiết lập tại Việt Nam.</p>\r\n\r\n<p>Theo bảng thống k&ecirc; nhiệt độ của Trung t&acirc;m Dự b&aacute;o kh&iacute; tượng thuỷ văn quốc gia, h&ocirc;m nay, nắng n&oacute;ng gay gắt tiếp tục xảy ra ở nhiều nơi.</p>\r\n\r\n<p>Theo đ&oacute;, nhiệt độ l&uacute;c 13 giờ ở ph&iacute;a T&acirc;y Bắc bộ v&agrave; khu vực từ Thanh H&oacute;a đến Ph&uacute; Y&ecirc;n phổ biến 37-40 độ, c&oacute; nơi tr&ecirc;n 41 độ.</p>\r\n\r\n<p>Đơn cử, tại Lạc Sơn (H&ograve;a B&igrave;nh) 41,7 độ; H&ograve;a B&igrave;nh 41,3 độ; Hồi Xu&acirc;n (Thanh H&oacute;a) 42,4 độ; Quỳ Ch&acirc;u (Nghệ An) 42 độ; Tương Dương (Nghệ An) 42,5 độ; T&acirc;y Hiếu (Nghệ An) 42,5 độ; Hương Kh&ecirc; (H&agrave; Tĩnh) 41,3 độ&hellip; Độ ẩm tương đối l&uacute;c 13 giờ phổ biến 33-55%.</p>\r\n\r\n<p>Đ&aacute;ng ch&uacute; &yacute;, ng&agrave;y 20-4-2019 nhiệt độ tại trạm kh&iacute; tượng Hương Kh&ecirc; (H&agrave; Tĩnh) l&agrave; 43,4 độ, gi&aacute; trị nhiệt độ cao nhất quan trắc tại Việt Nam.</p>\r\n\r\n<p>Tuy nhi&ecirc;n sang đến h&ocirc;m nay kỷ lục n&agrave;y đ&atilde; bị ph&aacute; vỡ tại trạm Hồi Xu&acirc;n (Thanh H&oacute;a) khi nhiệt độ l&uacute;c 16 giờ l&agrave; 43,8 độ v&agrave; cao nhất trong ng&agrave;y tr&ecirc;n 44,1 độ.</p>\r\n\r\n<p>Tổng cục Kh&iacute; tượng thuỷ văn nhận định, với 44,1 độ, đ&acirc;y sẽ l&agrave; kỷ lục mới về nhiệt độ cao nhất đo được ở Việt Nam từ trước đến nay.</p>\r\n\r\n<p>Theo dự b&aacute;o của Trung t&acirc;m Dự b&aacute;o kh&iacute; tượng thuỷ văn quốc gia, hiện nay ở ph&iacute;a Bắc c&oacute; một bộ phận kh&ocirc;ng kh&iacute; lạnh đang di chuyển xuống ph&iacute;a Nam. Nắng n&oacute;ng gay gắt sẽ giảm dần v&agrave; chấm dứt.</p>\r\n\r\n<p>Dự b&aacute;o khoảng đ&ecirc;m ng&agrave;y 7 v&agrave; 8-5, bộ phận kh&ocirc;ng kh&iacute; lạnh n&agrave;y sẽ ảnh hưởng đến khu vực ph&iacute;a Đ&ocirc;ng Bắc bộ, Bắc Trung bộ, sau đ&oacute; ảnh hưởng đến một số nơi ở ph&iacute;a T&acirc;y Bắc bộ. Gi&oacute; Đ&ocirc;ng Bắc trong đất liền mạnh dần l&ecirc;n cấp 2-3; v&ugrave;ng ven biển cấp 3-4.</p>\r\n\r\n<p>Ng&agrave;y v&agrave; đ&ecirc;m 8-5, ph&iacute;a Đ&ocirc;ng Bắc Bộ v&agrave; Thanh H&oacute;a trời chuyển m&aacute;t. Trong đợt kh&ocirc;ng kh&iacute; lạnh n&agrave;y, nhiệt độ thấp nhất ở ph&iacute;a Đ&ocirc;ng Bắc bộ phổ biến 22-25 độ, v&ugrave;ng n&uacute;i c&oacute; nơi dưới 22 độ.</p>\r\n\r\n<p>Do t&aacute;c động của c&aacute;c h&igrave;nh th&aacute;i thi&ecirc;n tai kể tr&ecirc;n, từ chiều tối, đ&ecirc;m 7 v&agrave; 8-5, Bắc bộ, Bắc Trung bộ c&oacute; mưa r&agrave;o, d&ocirc;ng rải r&aacute;c, cục bộ c&oacute; mưa to với lượng mưa từ 20-40mm, c&oacute; nơi tr&ecirc;n 60mm.</p>\r\n\r\n<p>Khu vực từ Quảng B&igrave;nh đến Thừa Thi&ecirc;n - Huế từ ng&agrave;y 8-5 c&oacute; mưa r&agrave;o v&agrave; d&ocirc;ng rải r&aacute;c; cục bộ c&oacute; mưa vừa, mưa to với lượng mưa 10-30mm, c&oacute; nơi tr&ecirc;n 50mm.</p>\r\n\r\n<p>Ngo&agrave;i ra, từ ng&agrave;y 8-5 ở khu vực T&acirc;y Nguy&ecirc;n, Nam Bộ c&oacute; mưa r&agrave;o, d&ocirc;ng rải r&aacute;c (thời gian xảy ra mưa d&ocirc;ng tập trung v&agrave;o chiều v&agrave; tối), cục bộ c&oacute; mưa vừa, mưa to với lượng mưa 10-30mm, c&oacute; nơi tr&ecirc;n 50mm.</p>\r\n\r\n<p>Trong mưa d&ocirc;ng c&oacute; khả năng xảy ra lốc, s&eacute;t, mưa đ&aacute; v&agrave; gi&oacute; giật mạnh.</p>\r\n\r\n<p>Mưa d&ocirc;ng k&egrave;m theo c&aacute;c hiện tượng lốc, s&eacute;t, mưa đ&aacute; v&agrave; gi&oacute; giật mạnh c&oacute; thể g&acirc;y ảnh hưởng đến sản xuất n&ocirc;ng nghiệp, l&agrave;m g&atilde;y đổ c&acirc;y cối, hư hại nh&agrave; cửa, c&aacute;c c&ocirc;ng tr&igrave;nh giao th&ocirc;ng, cơ sở hạ tầng. Mưa to cục bộ c&oacute; khả năng g&acirc;y ra t&igrave;nh trạng ngập &uacute;ng tại c&aacute;c v&ugrave;ng trũng, thấp.</p>\r\n\r\n<p>Gi&oacute; mạnh, s&oacute;ng lớn tr&ecirc;n biển c&oacute; khả năng ảnh hưởng đến hoạt động của t&agrave;u thuyền v&agrave; c&aacute;c hoạt động kh&aacute;c.</p>', 'uploads/news_imgs/nang-nong-8-1147-2277.jpg', 'Người dân mưu sinh dưới tiết trời nắng gay gắt. Ảnh: PHI HÙNG', 1, '2023-05-06 10:11:40', '2023-05-06 10:11:40'),
(3, 2, 'HLV Mai Đức Chung khen ngợi tinh thần thi đấu quyết tâm cao của đội tuyển nữ Việt Nam', 'HLV Mai Đức Chung ngày 6/5 khẳng định thời tiết nắng nóng tại Campuchia lúc này không phải là thách thức quá lớn với đội tuyển nữ Việt Nam, bằng chứng là các học trò của ông đã chơi tốt ở cả 2 trận đấu liên tiếp với Malaysia và Myanmar.', '<p>Ph&aacute;t biểu sau trận thắng 3-1 trước đội tuyển nữ Myanmar, HLV Mai Đức Chung cho biết: &ldquo;T&ocirc;i muốn gửi lời cảm ơn sự nỗ lực của to&agrave;n đội, cũng như sự cổ vũ của c&aacute;c CĐV Việt Nam đ&atilde; c&oacute; mặt tại s&acirc;n h&ocirc;m nay. Ch&uacute;ng t&ocirc;i thắng được l&agrave; nhờ tinh thần thi đấu quyết t&acirc;m cao của người phụ nữ Việt Nam. Trong hiệp 1, đội tuyển nữ Việt Nam bị gỡ h&ograve;a, nhưng đến hiệp 2 nhờ thay đổi lối chơi v&agrave; con người, ch&uacute;ng t&ocirc;i đ&atilde; thắng trận. To&agrave;n đội đ&atilde; thể hiện nghị lực lớn, quyết t&acirc;m cao để vượt qua kh&oacute; khăn. Trận đấu n&agrave;y thực sự kh&ocirc;ng dễ d&agrave;ng khi đội bạn vừa thắng Philippines 1-0, c&oacute; lối đ&aacute; mạnh mẽ v&agrave; quyết liệt nhưng đội tuyển nữ Việt Nam đ&atilde; vượt qua được&rdquo;.</p>\r\n\r\n<p>Đ&aacute;nh gi&aacute; về hiệp 1, HLV Mai Đức Chung nhận x&eacute;t: &ldquo;Trong 30 ph&uacute;t đầu hiệp 1, đội tuyển nữ Việt Nam thi đấu tự tin, cầm b&oacute;ng rất tốt v&agrave; &eacute;p được đối thủ để ghi b&agrave;n. Tuy nhi&ecirc;n, đến 15 ph&uacute;t cuối, đội đ&atilde; c&oacute; một ch&uacute;t chuệch choạc.&nbsp;Tuy nhi&ecirc;n, trong giờ nghỉ giữa trận, t&ocirc;i đ&atilde; củng cố lại tinh thần, đồng thời điều chỉnh lại chiến thuật. Điều đ&oacute; đ&atilde; ph&aacute;t huy t&aacute;c dụng khi Thanh Nh&atilde;, Th&ugrave;y Trang v&agrave;o s&acirc;n thay người đều ghi được b&agrave;n thắng&rdquo;.</p>\r\n\r\n<p>Trả lời c&acirc;u hỏi về việc l&agrave;m thế n&agrave;o để duy tr&igrave; được động lực SEA Games cho đội tuyển nữ Việt Nam sau 3 lần li&ecirc;n tiếp gi&agrave;nh HCV, HLV Mai Đức Chung cho biết: &ldquo;Việc chuẩn bị cho World Cup 2023 đ&atilde; được triển khai từ cuối năm ngo&aacute;i. Li&ecirc;n đo&agrave;n B&oacute;ng đ&aacute; Việt Nam (VFF) l&ecirc;n kế hoạch cho đội tuyển nữ Việt Nam đi tập huấn tại Nhật Bản, Đức để chuẩn bị cho cả SEA Games v&agrave; World Cup.&nbsp;Đội tuyển nữ Việt Nam hiện thiếu vắng Chương Thị Kiều, vị tr&iacute; then chốt trong h&agrave;ng ph&ograve;ng ngự. Tuy nhi&ecirc;n, t&ocirc;i muốn &lsquo;giữ ch&acirc;n&rsquo; cho bạn ấy, kh&ocirc;ng muốn Kiều dự SEA Games trong t&igrave;nh trạng vừa mới hồi phục chấn thương. Điều đ&oacute; sẽ rất mạo hiểm với sự nghiệp của Kiều. Đội chỉ c&oacute; từng đ&oacute; con người, tất cả c&ugrave;ng động vi&ecirc;n nhau cố gắng thi đấu, miễn sao ph&aacute;t huy được tinh thần nỗ lực, d&aacute;m hi sinh trong l&uacute;c kh&oacute; khăn của người phụ nữ Việt Nam. Đ&oacute; l&agrave; điều m&agrave; ban huấn luyện đặc biệt khen ngợi&rdquo;.</p>\r\n\r\n<p>HLV Mai Đức Chung cũng cho rằng thể lực kh&ocirc;ng phải l&agrave; vấn đề lớn của đội tuyển nữ Việt Nam ở SEA Games. &Ocirc;ng n&oacute;i: &ldquo;Vừa qua khi sang Nhật Bản tập huấn, ch&uacute;ng t&ocirc;i cũng đ&atilde; chuẩn bị thể lực. Thời tiết m&aacute;t mẻ gi&uacute;p đội r&egrave;n thể lực tốt hơn so với khi tập ở nơi n&oacute;ng nực. T&ocirc;i nghĩ đội U22 Việt Nam tập luyện ở Vũng T&agrave;u để l&agrave;m quen với điều kiện thời tiết tại Campuchia th&ocirc;i, chứ để n&acirc;ng cao được thể lực th&igrave; chưa chắc bằng sang Nhật Bản tập như ch&uacute;ng t&ocirc;i. Ch&iacute;nh v&igrave; thế m&agrave; đội tuyển nữ Việt Nam chịu được c&aacute;i nắng. Đ&aacute; đến trận thứ 2 rồi th&igrave; mọi người c&oacute; thể thấy c&aacute;c cầu thủ của t&ocirc;i chịu đựng rất tốt điều kiện thời tiết n&agrave;y&rdquo;.</p>\r\n\r\n<p>Đ&aacute;nh gi&aacute; về đối thủ tiếp theo ở v&ograve;ng bảng l&agrave; đội tuyển nữ Philippines, HLV Mai Đức Chung n&oacute;i: &ldquo;Trước khi v&agrave;o giải, t&ocirc;i đ&atilde; n&oacute;i đối thủ n&agrave;o t&ocirc;i cũng d&agrave;nh sự t&ocirc;n trọng như nhau, quyết t&acirc;m từng trận một. Ch&uacute;ng t&ocirc;i ở c&ugrave;ng kh&aacute;ch sạn với đội tuyển nữ Philippines v&agrave; thấy họ cũng k&ecirc;u ca rất nhiều về thời tiết. Họ cũng rất sợ, chứ kh&ocirc;ng chỉ ri&ecirc;ng ch&uacute;ng ta. Hiện tại đội tuyển nữ Việt Nam đ&atilde; dần ổn định rồi v&agrave; t&ocirc;i hi vọng tất cả sẽ tiếp tục ph&aacute;t huy, tiếp tục lối đ&aacute; &aacute;p s&aacute;t đối thủ. T&ocirc;i cũng cảm tưởng ở SEA Games n&agrave;y, đội Philippines kh&ocirc;ng mạnh bằng SEA Games 31 v&agrave; AFF Cup 2022&rdquo;.</p>', 'uploads/news_imgs/HLV-mai-duc-chung-06052023.jpeg', 'HLV trưởng đội tuyển nữ Việt Nam Mai Đức Chung. Ảnh: Minh Quyết/TTXVN', 1, '2023-05-06 10:21:00', '2023-05-06 10:21:00'),
(4, 5, 'Cực SỐC suối Ô TUKSA vừa xây dựng bãi giữu xe gắn máy lạnh', 'Tin chấn động suối Ô TUKSA vừa xây dựng bãi giữu xe gắn máy lạnh với giá tiền làm ngây ngất lòng người', '<p>Tin chấn động suối &Ocirc; TUKSA vừa x&acirc;y dựng b&atilde;i giữu xe gắn m&aacute;y lạnh với gi&aacute; tiền l&agrave;m ng&acirc;y ngất l&ograve;ng người, gi&aacute; gửi xe ban đầu đ&atilde; l&ecirc;n đến 50K cho 1 lần gửi</p>', 'uploads/news_imgs/thacotuksa2.jpg', 'Suối OTuksa', 1, '2023-05-07 06:18:18', '2023-05-07 06:18:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topics`
--

CREATE TABLE `topics` (
  `_ID` int(11) NOT NULL,
  `TOPIC_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `topics`
--

INSERT INTO `topics` (`_ID`, `TOPIC_NAME`) VALUES
(1, 'Giáo dục'),
(2, 'Thể thao'),
(3, 'Kinh tế'),
(4, 'Văn hóa'),
(5, 'Du Lịch'),
(6, 'Xã hội'),
(7, 'Môi trường'),
(9, 'Khoa học'),
(10, 'Nghệ thuật'),
(11, 'Công nghệ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `_ID` int(11) NOT NULL,
  `ACCOUNTS_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(20) DEFAULT NULL,
  `LAST_NAME` varchar(30) NOT NULL,
  `FULL_NAME` varchar(50) NOT NULL,
  `NICK_NAME` varchar(20) NOT NULL,
  `BIRTH` date DEFAULT NULL,
  `PHONE_NUMBER` char(10) DEFAULT NULL,
  `AVATAR` tinytext DEFAULT NULL,
  `COVER_IMAGE` tinytext DEFAULT NULL,
  `FOLLOWING` int(11) DEFAULT NULL,
  `FOLLOWER` int(11) DEFAULT NULL,
  `FACEBOOK_URL` tinytext DEFAULT NULL,
  `TIKTOK_URL` tinytext DEFAULT NULL,
  `YOUTUBE_URL` tinytext DEFAULT NULL,
  `INSTAGRAM_URL` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`_ID`, `ACCOUNTS_ID`, `FIRST_NAME`, `LAST_NAME`, `FULL_NAME`, `NICK_NAME`, `BIRTH`, `PHONE_NUMBER`, `AVATAR`, `COVER_IMAGE`, `FOLLOWING`, `FOLLOWER`, `FACEBOOK_URL`, `TIKTOK_URL`, `YOUTUBE_URL`, `INSTAGRAM_URL`) VALUES
(1, 1, 'Nguyễn', 'Vũ', 'Nguyễn Vũ', '@7V', '2002-05-04', '0358802875', 'http://localhost/DO_AN_WEB/server/images/admin.png', 'https://scontent.fvca2-1.fna.fbcdn.net/v/t39.30808-6/337394971_1948150735535472_8224919244132124375_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=e3f864&_nc_ohc=3XbMEqmRnOQAX87byVO&_nc_ht=scontent.fvca2-1.fna&oh=00_AfBfDy-m8Fbzk6yIjloBayV6MQ35XsFvUZKSqhpwuQyypg&oe=64', 0, 0, 'https://www.facebook.com/nguyenvu.version2319.vn', '', '', ''),
(2, 2, '', 'Nguyễn Vũ 2', 'Nguyễn Vũ 2', '@nguyenvu2', '0000-00-00', '', 'images/no-image-user.png', 'images/no-image-cover.png', 0, 0, '', '', '', ''),
(3, 3, '', 'Thanh Tú', 'Thanh Tú', '@thanhtu', '0000-00-00', '', '', '', 0, 0, '', '', '', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`_ID`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Chỉ mục cho bảng `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`_ID`);

--
-- Chỉ mục cho bảng `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`_ID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`_ID`),
  ADD KEY `ACCOUNTS_ID` (`ACCOUNTS_ID`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`_ID`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`_ID`);

--
-- Các ràng buộc cho bảng `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`_ID`);

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`_ID`) REFERENCES `topics` (`_ID`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`ACCOUNTS_ID`) REFERENCES `accounts` (`_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
