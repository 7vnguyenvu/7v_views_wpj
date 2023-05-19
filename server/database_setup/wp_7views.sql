-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 19, 2023 lúc 10:22 PM
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
  `USER_PASS` tinytext NOT NULL,
  `USER_LEVEL` int(11) NOT NULL,
  `USER_LOCK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`_ID`, `USER_NAME`, `USER_PASS`, `USER_LEVEL`, `USER_LOCK`) VALUES
(1, '7v52admin', '3fe75844cdacd9305950b5ffdef55d94', 1, 0),
(3, 'thanhtu', '6d9ff949640422493f3db836c3035c64', 4, 0),
(4, 'thaovy352', 'a7f57fec4eb03c8b52d35ded94680864', 4, 0),
(5, 'user1', 'e10adc3949ba59abbe56e057f20f883e', 4, 0);

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
(6, 1, 'Cảm thấy khó khăn khi chuyển sang học một ngôn ngữ mới', '<p>T&ocirc;i l&agrave;m chuy&ecirc;n m&ocirc;n về ph&acirc;n t&iacute;ch dữ liệu, chủ yếu l&agrave; d&ugrave;ng phần mềm chuy&ecirc;n m&ocirc;n s&acirc;u v&agrave; d&ugrave;ng rất nhiều SQL db, python. Hai m&oacute;n đ&oacute; cũng đủ để d&ugrave;ng v&agrave; ph&aacute;t triển. Tuy nhi&ecirc;n, xu hướng mới l&agrave; webapp n&ecirc;n t&ocirc;i phải cung cấp tool, giao diện người d&ugrave;ng... th&ocirc;ng qua đ&oacute;. Phải n&oacute;i rất tốt cho c&ocirc;ng việc chung.</p>\r\n\r\n<p>Nền tảng t&ocirc;i d&ugrave;ng đ&atilde; cung cấp sẵn c&aacute;c c&ocirc;ng cụ để x&acirc;y dựng app dựa tr&ecirc;n c&aacute;c widget c&oacute; sẵn với khả năng t&ugrave;y biến nhất định. Tuy nhi&ecirc;n, nhu cầu của người d&ugrave;ng v&agrave; đặc th&ugrave; c&ocirc;ng việc l&agrave; v&ocirc; c&ugrave;ng phong ph&uacute;. V&igrave; vậy, nền tảng cũng cung cấp cho SDK để ph&aacute;t triển widget để nhồi v&agrave;o app. Y&ecirc;u cầu d&ugrave;ng TypeScript v&agrave; React. Mục ti&ecirc;u l&agrave; viết c&aacute;c widget c&oacute; thể &quot;n&oacute;i chuyện&quot; với nhau, truyền th&ocirc;ng tin, propert&iacute;es qua lại lẫn nhau.</p>\r\n\r\n<p>Tiếc l&agrave; t&agrave;i liệu v&agrave; b&agrave;i học về SDK của nền tảng hoặc qu&aacute; sơ s&agrave;i, mặc định người d&ugrave;ng biết hết rồi, hoặc rời rạc do bản th&acirc;n React cũng đ&atilde; thay dổi, updata...</p>\r\n\r\n<p>M&igrave;nh thấy hoa cả mắt khi nh&igrave;n thấy cấu tr&uacute;c file pack trong một dự &aacute;n, rồi file n&agrave;y nối sang file kia. Bản th&acirc;n m&igrave;nh rất quen thuộc với việc viết module tr&ecirc;n python, nhưng đ&uacute;ng l&agrave; chạm v&agrave;o thế giới JS thấy c&oacute; vẻ phức tạp hơn.</p>\r\n\r\n<p>Xem một số b&agrave;i học của F8 thấy &iacute;t nhất l&agrave; c&oacute; giải th&iacute;ch cho người ta hiểu c&aacute;i g&igrave; l&agrave; c&aacute;i g&igrave;, tại sao như vậy rồi n&oacute; l&agrave;m việc ra sao. Quyết định đăng k&yacute; học để xem liệu m&igrave;nh c&oacute; hiểu để viết được widget tr&ecirc;n SDK nền tảng của m&igrave;nh ko.</p>\r\n\r\n<p>C&oacute; tuổi rồi, học g&igrave; cũng ngại...</p>', 'http://localhost/DO_AN_WEB/server/uploads/blog_imgs/646526259ef4b__cover_image.png', '2023-05-18 02:08:21', '2023-05-18 02:08:21'),
(7, 3, 'Nhìn chung làm thiết kế cũng nhàn', '<p><a href=\"https://www.facebook.com/hashtag/compaacademy?__eep__=6&amp;__cft__[0]=AZVdxGHd4n5BU_lmx4TIeLY_3_EyKoOSmXeW64HR2tDfw0DzrB44PhY35--a-2hUx-GPLHsJGOOO0suQhmuhMdqeALtiRLm6A8msDYDOV0ko13Psr0CMgIHpIq2PFho-Vic81tHgsuMK1tQJyF7PFeCnF3lwCAJREI5eR2OwSijwSUz_i7dfxbTbNFoSqGo21HrfkCxsWTntuDy8bFBLqKOC&amp;__tn__=*NK-R\" tabindex=\"0\">#CompaAcademy</a> <a href=\"https://www.facebook.com/hashtag/j4f?__eep__=6&amp;__cft__[0]=AZVdxGHd4n5BU_lmx4TIeLY_3_EyKoOSmXeW64HR2tDfw0DzrB44PhY35--a-2hUx-GPLHsJGOOO0suQhmuhMdqeALtiRLm6A8msDYDOV0ko13Psr0CMgIHpIq2PFho-Vic81tHgsuMK1tQJyF7PFeCnF3lwCAJREI5eR2OwSijwSUz_i7dfxbTbNFoSqGo21HrfkCxsWTntuDy8bFBLqKOC&amp;__tn__=*NK-R\" tabindex=\"0\">#J4F</a></p>', 'http://localhost/DO_AN_WEB/server/uploads/blog_imgs/6466524a4a7b2__screenshot_1684427131.png', '2023-05-18 23:28:58', '2023-05-18 11:28:58'),
(8, 3, 'Người thành công luôn có lối đi vào lòng đất', '<p>N&oacute; ở c&aacute;i tầm 😎</p>\n\n<p>(nguồn: J2Team Community)</p>', 'http://localhost/DO_AN_WEB/server/uploads/blog_imgs/6466537062c0b__screenshot_1684427543.png', '2023-05-18 23:33:52', '2023-05-18 11:33:52'),
(9, 1, 'Khen ngợi cảnh đẹp hoang vu và Túp liều lý tưởng', '<p>Qu&aacute; đẹp<strong>&nbsp;#diadiemhot&nbsp;&nbsp;#beautiful&nbsp;#place</strong></p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:233.85px; top:35px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'http://localhost/DO_AN_WEB/server/uploads/blog_imgs/6467c9c285920__timothy-eberly-XemjjFd_4qE-unsplash.jpg', '2023-05-19 18:23:51', '2023-05-20 02:15:44'),
(10, 2, '', '<p><a href=\"https://www.facebook.com/hashtag/p9671?__eep__=6&amp;__cft__[0]=AZWlR4UAnx8DBEeZCaXQU435Y1anCWVgB5O-gTIGvzaSNU5g56pKFt9PWl9p2PnyNY80A_1a1kLL3_z-yJls-pClhmIxSEuMb3shgtctQBeZ6UXhme1Oi4wrlot0mOL1ngxLZUwYZoJfjz2lblxaGec8RXOYLDItFPBtoCuU6htQag&amp;__tn__=*NK-R\" tabindex=\"0\">#P9671</a>: CHUY&Ecirc;N MỤC - T&Acirc;M SỰ</p>\r\n\r\n<p>Ch&agrave;o <a href=\"https://www.facebook.com/hashtag/t?__eep__=6&amp;__cft__[0]=AZWlR4UAnx8DBEeZCaXQU435Y1anCWVgB5O-gTIGvzaSNU5g56pKFt9PWl9p2PnyNY80A_1a1kLL3_z-yJls-pClhmIxSEuMb3shgtctQBeZ6UXhme1Oi4wrlot0mOL1ngxLZUwYZoJfjz2lblxaGec8RXOYLDItFPBtoCuU6htQag&amp;__tn__=*NK-R\" tabindex=\"0\">#T</a></p>\r\n\r\n<p>Sinh nhật lần 20 của em, anh ch&uacute;c em tất cả. Lu&ocirc;n vui nghen em, d&ugrave; cuộc đời c&oacute; cho ph&eacute;p em buồn nhiều l&uacute;c. Như lời đ&atilde; hứa, anh sẽ kh&ocirc;ng nhắn tin với em nữa, kh&ocirc;ng phiền em nữa. Nhưng sinh nhật th&igrave; mỗi năm chỉ c&oacute; một. Anh mong, em sẽ thấy v&agrave; đ&oacute;n nhận lời ch&uacute;c n&agrave;y. Nếu c&oacute; thể, xin em cho anh một t&iacute;n hiệu được kh&ocirc;ng? Anh cảm ơn em.</p>\r\n\r\n<p>0h00, 18-04-2023.</p>\r\n\r\n<p>Anh nhớ <a href=\"https://www.facebook.com/hashtag/t?__eep__=6&amp;__cft__[0]=AZWlR4UAnx8DBEeZCaXQU435Y1anCWVgB5O-gTIGvzaSNU5g56pKFt9PWl9p2PnyNY80A_1a1kLL3_z-yJls-pClhmIxSEuMb3shgtctQBeZ6UXhme1Oi4wrlot0mOL1ngxLZUwYZoJfjz2lblxaGec8RXOYLDItFPBtoCuU6htQag&amp;__tn__=*NK-R\" tabindex=\"0\">#T</a>.</p>', '', '2023-05-19 23:28:30', '2023-05-19 11:28:30'),
(11, 2, '', '<p><a href=\"https://www.facebook.com/hashtag/p9669?__eep__=6&amp;__cft__[0]=AZW7CoEBLTxKINMlYKB_GGP2PPFkgNzkGO4rU3MliOFleZH60Cb3PGEek9xDbjLE7_E3Q1-r2lDZ4mQGDng7ZT00ai5JFgNUUaiItW0FJatw7P_CepolGJU7qdX96pGAHvfyBFH6TYkWhpBjB91okaNbHub93i7MBG-HEVsGfOKnqg&amp;__tn__=*NK-R\" tabindex=\"0\">#P9669</a>: CHUY&Ecirc;N MỤC - T&Acirc;M SỰ..</p>\r\n\r\n<p>9:00 pm 27/3</p>\r\n\r\n<p>Cho m&igrave;nh xin in4 bạn nữ t&oacute;c d&agrave;i, đeo k&iacute;nh, ngồi trước nh&agrave; xe ktx tối nayy với ạ. H&igrave;nh như đang sốt nh&igrave;n khu&ocirc;n mặt mệt mỏi, tr&aacute;n c&oacute; d&aacute;n miếng hạ sốt. Bạn g&igrave; ơi, bạn thấy đc cfs n&agrave;y nếu chưa c&oacute; ai th&igrave; cho m&igrave;nh xin cơ hội l&agrave;m quen với ạ. Nếu bạn cần m&igrave;nh sẵn s&agrave;ng mua thuốc v&agrave; xin được chăm cho bạn ạ, ch&uacute;c bạn mau khỏi bệnh. Anh chị em ktx gi&uacute;p em t&igrave;m bạn với. C&aacute;m ơn mọi người!</p>\r\n\r\n<p>From d&atilde;y U KTX with love.</p>', '', '2023-05-20 00:15:18', '2023-05-20 12:15:18'),
(12, 1, 'Bất diệt Người con Việt Nam', '<p>Xương cốt anh em nằm lại ở mọi l&atilde;nh phận.<br />\r\nM&aacute;u thịt anh em b&oacute;n cho mọi thứ thức ăn.<br />\r\nCh&uacute;ng ta chết đi để rồi được t&aacute;i sinh.<br />\r\nCh&uacute;ng ta sống cho tới khi vĩnh hằng.<br />\r\nCh&uacute;ng ta thống trị trong sự tuyệt đối.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>-- Keenan Saddler RE4 --</p>', 'http://localhost/DO_AN_WEB/server/uploads/blog_imgs/6467cf4212904__z4360149494406_fd992387f584b79f25d9c09937dc5540.jpg', '2023-05-20 02:34:26', '2023-05-20 02:34:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `_ID` int(11) NOT NULL,
  `BLOG_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `CONTENT` text NOT NULL,
  `CREATED_AT` datetime NOT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `follows`
--

CREATE TABLE `follows` (
  `_ID` int(11) NOT NULL,
  `USER_REF_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `follows`
--

INSERT INTO `follows` (`_ID`, `USER_REF_ID`, `USER_ID`, `CREATED_AT`) VALUES
(1, 1, 2, '2023-05-19 11:00:25'),
(2, 1, 4, '2023-05-20 03:08:04'),
(3, 4, 2, '2023-05-20 03:22:30'),
(4, 3, 2, '2023-05-20 03:22:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes`
--

CREATE TABLE `likes` (
  `_ID` int(11) NOT NULL,
  `BLOG_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `likes`
--

INSERT INTO `likes` (`_ID`, `BLOG_ID`, `USER_ID`, `CREATED_AT`) VALUES
(1, 4, 1, '2023-05-18 14:02:30'),
(4, 1, 3, '2023-05-18 09:40:19'),
(7, 6, 3, '2023-05-18 09:51:29'),
(9, 3, 3, '2023-05-18 09:53:54'),
(10, 4, 3, '2023-05-18 09:55:07'),
(11, 6, 1, '2023-05-18 11:00:14'),
(12, 7, 3, '2023-05-18 11:30:51'),
(13, 8, 1, '2023-05-19 12:29:54'),
(14, 8, 2, '2023-05-19 01:42:34'),
(15, 4, 2, '2023-05-19 01:42:38'),
(16, 8, 3, '2023-05-19 01:21:30'),
(17, 9, 1, '2023-05-19 11:26:39'),
(18, 10, 2, '2023-05-20 12:07:10'),
(19, 1, 2, '2023-05-20 01:48:04'),
(20, 3, 2, '2023-05-20 01:49:48'),
(21, 12, 1, '2023-05-20 02:34:54'),
(22, 12, 4, '2023-05-20 03:18:54');

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
(1, 5, 'Chùa Hang ở Châu Đốc tăng giá giữ xe', 'Điều gây chấn động nhất hôm nay là Chùa Hang ở Châu Đốc tăng giá giữ xe', '<p>Chấn động Ch&acirc;u Đốc nhất h&ocirc;m nay l&agrave; Ch&ugrave;a Hang tăng gi&aacute; giữ xe l&ecirc;n 50k cho 1 lần gửi</p>', 'http://localhost/DO_AN_WEB/server/uploads/news_imgs/chuahang.png', 'Chùa Hang ở Châu Đốc', 1, '2023-05-06 07:20:18', '2023-05-08 03:45:59'),
(2, 7, 'Nắng nóng ở Việt Nam lập kỷ lục mới, có nơi 44,1 độ C', '(PLO)- Nhiệt độ lúc 16 giờ chiều 6-5 tại trạm Hồi Xuân (Thanh Hoá) đo được là 43,8 độ, có thời điểm lên 44,1 độ C.', '<p>Chiều 6-5, kỷ lục mới về nhiệt độ đ&atilde; được thiết lập tại Việt Nam.</p>\r\n\r\n<p>Theo bảng thống k&ecirc; nhiệt độ của Trung t&acirc;m Dự b&aacute;o kh&iacute; tượng thuỷ văn quốc gia, h&ocirc;m nay, nắng n&oacute;ng gay gắt tiếp tục xảy ra ở nhiều nơi.</p>\r\n\r\n<p>Theo đ&oacute;, nhiệt độ l&uacute;c 13 giờ ở ph&iacute;a T&acirc;y Bắc bộ v&agrave; khu vực từ Thanh H&oacute;a đến Ph&uacute; Y&ecirc;n phổ biến 37-40 độ, c&oacute; nơi tr&ecirc;n 41 độ.</p>\r\n\r\n<p>Đơn cử, tại Lạc Sơn (H&ograve;a B&igrave;nh) 41,7 độ; H&ograve;a B&igrave;nh 41,3 độ; Hồi Xu&acirc;n (Thanh H&oacute;a) 42,4 độ; Quỳ Ch&acirc;u (Nghệ An) 42 độ; Tương Dương (Nghệ An) 42,5 độ; T&acirc;y Hiếu (Nghệ An) 42,5 độ; Hương Kh&ecirc; (H&agrave; Tĩnh) 41,3 độ&hellip; Độ ẩm tương đối l&uacute;c 13 giờ phổ biến 33-55%.</p>\r\n\r\n<p>Đ&aacute;ng ch&uacute; &yacute;, ng&agrave;y 20-4-2019 nhiệt độ tại trạm kh&iacute; tượng Hương Kh&ecirc; (H&agrave; Tĩnh) l&agrave; 43,4 độ, gi&aacute; trị nhiệt độ cao nhất quan trắc tại Việt Nam.</p>\r\n\r\n<p>Tuy nhi&ecirc;n sang đến h&ocirc;m nay kỷ lục n&agrave;y đ&atilde; bị ph&aacute; vỡ tại trạm Hồi Xu&acirc;n (Thanh H&oacute;a) khi nhiệt độ l&uacute;c 16 giờ l&agrave; 43,8 độ v&agrave; cao nhất trong ng&agrave;y tr&ecirc;n 44,1 độ.</p>\r\n\r\n<p>Tổng cục Kh&iacute; tượng thuỷ văn nhận định, với 44,1 độ, đ&acirc;y sẽ l&agrave; kỷ lục mới về nhiệt độ cao nhất đo được ở Việt Nam từ trước đến nay.</p>\r\n\r\n<p>Theo dự b&aacute;o của Trung t&acirc;m Dự b&aacute;o kh&iacute; tượng thuỷ văn quốc gia, hiện nay ở ph&iacute;a Bắc c&oacute; một bộ phận kh&ocirc;ng kh&iacute; lạnh đang di chuyển xuống ph&iacute;a Nam. Nắng n&oacute;ng gay gắt sẽ giảm dần v&agrave; chấm dứt.</p>\r\n\r\n<p>Dự b&aacute;o khoảng đ&ecirc;m ng&agrave;y 7 v&agrave; 8-5, bộ phận kh&ocirc;ng kh&iacute; lạnh n&agrave;y sẽ ảnh hưởng đến khu vực ph&iacute;a Đ&ocirc;ng Bắc bộ, Bắc Trung bộ, sau đ&oacute; ảnh hưởng đến một số nơi ở ph&iacute;a T&acirc;y Bắc bộ. Gi&oacute; Đ&ocirc;ng Bắc trong đất liền mạnh dần l&ecirc;n cấp 2-3; v&ugrave;ng ven biển cấp 3-4.</p>\r\n\r\n<p>Ng&agrave;y v&agrave; đ&ecirc;m 8-5, ph&iacute;a Đ&ocirc;ng Bắc Bộ v&agrave; Thanh H&oacute;a trời chuyển m&aacute;t. Trong đợt kh&ocirc;ng kh&iacute; lạnh n&agrave;y, nhiệt độ thấp nhất ở ph&iacute;a Đ&ocirc;ng Bắc bộ phổ biến 22-25 độ, v&ugrave;ng n&uacute;i c&oacute; nơi dưới 22 độ.</p>\r\n\r\n<p>Do t&aacute;c động của c&aacute;c h&igrave;nh th&aacute;i thi&ecirc;n tai kể tr&ecirc;n, từ chiều tối, đ&ecirc;m 7 v&agrave; 8-5, Bắc bộ, Bắc Trung bộ c&oacute; mưa r&agrave;o, d&ocirc;ng rải r&aacute;c, cục bộ c&oacute; mưa to với lượng mưa từ 20-40mm, c&oacute; nơi tr&ecirc;n 60mm.</p>\r\n\r\n<p>Khu vực từ Quảng B&igrave;nh đến Thừa Thi&ecirc;n - Huế từ ng&agrave;y 8-5 c&oacute; mưa r&agrave;o v&agrave; d&ocirc;ng rải r&aacute;c; cục bộ c&oacute; mưa vừa, mưa to với lượng mưa 10-30mm, c&oacute; nơi tr&ecirc;n 50mm.</p>\r\n\r\n<p>Ngo&agrave;i ra, từ ng&agrave;y 8-5 ở khu vực T&acirc;y Nguy&ecirc;n, Nam Bộ c&oacute; mưa r&agrave;o, d&ocirc;ng rải r&aacute;c (thời gian xảy ra mưa d&ocirc;ng tập trung v&agrave;o chiều v&agrave; tối), cục bộ c&oacute; mưa vừa, mưa to với lượng mưa 10-30mm, c&oacute; nơi tr&ecirc;n 50mm.</p>\r\n\r\n<p>Trong mưa d&ocirc;ng c&oacute; khả năng xảy ra lốc, s&eacute;t, mưa đ&aacute; v&agrave; gi&oacute; giật mạnh.</p>\r\n\r\n<p>Mưa d&ocirc;ng k&egrave;m theo c&aacute;c hiện tượng lốc, s&eacute;t, mưa đ&aacute; v&agrave; gi&oacute; giật mạnh c&oacute; thể g&acirc;y ảnh hưởng đến sản xuất n&ocirc;ng nghiệp, l&agrave;m g&atilde;y đổ c&acirc;y cối, hư hại nh&agrave; cửa, c&aacute;c c&ocirc;ng tr&igrave;nh giao th&ocirc;ng, cơ sở hạ tầng. Mưa to cục bộ c&oacute; khả năng g&acirc;y ra t&igrave;nh trạng ngập &uacute;ng tại c&aacute;c v&ugrave;ng trũng, thấp.</p>\r\n\r\n<p>Gi&oacute; mạnh, s&oacute;ng lớn tr&ecirc;n biển c&oacute; khả năng ảnh hưởng đến hoạt động của t&agrave;u thuyền v&agrave; c&aacute;c hoạt động kh&aacute;c.</p>', 'http://localhost/DO_AN_WEB/server/uploads/news_imgs/nang-nong-8-1147-2277.jpg', 'Người dân mưu sinh dưới tiết trời nắng gay gắt. Ảnh: PHI HÙNG', 1, '2023-05-06 10:11:40', '2023-05-06 10:11:40'),
(3, 2, 'HLV Mai Đức Chung khen ngợi tinh thần thi đấu quyết tâm cao của đội tuyển nữ Việt Nam', 'HLV Mai Đức Chung ngày 6/5 khẳng định thời tiết nắng nóng tại Campuchia lúc này không phải là thách thức quá lớn với đội tuyển nữ Việt Nam, bằng chứng là các học trò của ông đã chơi tốt ở cả 2 trận đấu liên tiếp với Malaysia và Myanmar.', '<p>Ph&aacute;t biểu sau trận thắng 3-1 trước đội tuyển nữ Myanmar, HLV Mai Đức Chung cho biết: &ldquo;T&ocirc;i muốn gửi lời cảm ơn sự nỗ lực của to&agrave;n đội, cũng như sự cổ vũ của c&aacute;c CĐV Việt Nam đ&atilde; c&oacute; mặt tại s&acirc;n h&ocirc;m nay. Ch&uacute;ng t&ocirc;i thắng được l&agrave; nhờ tinh thần thi đấu quyết t&acirc;m cao của người phụ nữ Việt Nam. Trong hiệp 1, đội tuyển nữ Việt Nam bị gỡ h&ograve;a, nhưng đến hiệp 2 nhờ thay đổi lối chơi v&agrave; con người, ch&uacute;ng t&ocirc;i đ&atilde; thắng trận. To&agrave;n đội đ&atilde; thể hiện nghị lực lớn, quyết t&acirc;m cao để vượt qua kh&oacute; khăn. Trận đấu n&agrave;y thực sự kh&ocirc;ng dễ d&agrave;ng khi đội bạn vừa thắng Philippines 1-0, c&oacute; lối đ&aacute; mạnh mẽ v&agrave; quyết liệt nhưng đội tuyển nữ Việt Nam đ&atilde; vượt qua được&rdquo;.</p>\r\n\r\n<p>Đ&aacute;nh gi&aacute; về hiệp 1, HLV Mai Đức Chung nhận x&eacute;t: &ldquo;Trong 30 ph&uacute;t đầu hiệp 1, đội tuyển nữ Việt Nam thi đấu tự tin, cầm b&oacute;ng rất tốt v&agrave; &eacute;p được đối thủ để ghi b&agrave;n. Tuy nhi&ecirc;n, đến 15 ph&uacute;t cuối, đội đ&atilde; c&oacute; một ch&uacute;t chuệch choạc.&nbsp;Tuy nhi&ecirc;n, trong giờ nghỉ giữa trận, t&ocirc;i đ&atilde; củng cố lại tinh thần, đồng thời điều chỉnh lại chiến thuật. Điều đ&oacute; đ&atilde; ph&aacute;t huy t&aacute;c dụng khi Thanh Nh&atilde;, Th&ugrave;y Trang v&agrave;o s&acirc;n thay người đều ghi được b&agrave;n thắng&rdquo;.</p>\r\n\r\n<p>Trả lời c&acirc;u hỏi về việc l&agrave;m thế n&agrave;o để duy tr&igrave; được động lực SEA Games cho đội tuyển nữ Việt Nam sau 3 lần li&ecirc;n tiếp gi&agrave;nh HCV, HLV Mai Đức Chung cho biết: &ldquo;Việc chuẩn bị cho World Cup 2023 đ&atilde; được triển khai từ cuối năm ngo&aacute;i. Li&ecirc;n đo&agrave;n B&oacute;ng đ&aacute; Việt Nam (VFF) l&ecirc;n kế hoạch cho đội tuyển nữ Việt Nam đi tập huấn tại Nhật Bản, Đức để chuẩn bị cho cả SEA Games v&agrave; World Cup.&nbsp;Đội tuyển nữ Việt Nam hiện thiếu vắng Chương Thị Kiều, vị tr&iacute; then chốt trong h&agrave;ng ph&ograve;ng ngự. Tuy nhi&ecirc;n, t&ocirc;i muốn &lsquo;giữ ch&acirc;n&rsquo; cho bạn ấy, kh&ocirc;ng muốn Kiều dự SEA Games trong t&igrave;nh trạng vừa mới hồi phục chấn thương. Điều đ&oacute; sẽ rất mạo hiểm với sự nghiệp của Kiều. Đội chỉ c&oacute; từng đ&oacute; con người, tất cả c&ugrave;ng động vi&ecirc;n nhau cố gắng thi đấu, miễn sao ph&aacute;t huy được tinh thần nỗ lực, d&aacute;m hi sinh trong l&uacute;c kh&oacute; khăn của người phụ nữ Việt Nam. Đ&oacute; l&agrave; điều m&agrave; ban huấn luyện đặc biệt khen ngợi&rdquo;.</p>\r\n\r\n<p>HLV Mai Đức Chung cũng cho rằng thể lực kh&ocirc;ng phải l&agrave; vấn đề lớn của đội tuyển nữ Việt Nam ở SEA Games. &Ocirc;ng n&oacute;i: &ldquo;Vừa qua khi sang Nhật Bản tập huấn, ch&uacute;ng t&ocirc;i cũng đ&atilde; chuẩn bị thể lực. Thời tiết m&aacute;t mẻ gi&uacute;p đội r&egrave;n thể lực tốt hơn so với khi tập ở nơi n&oacute;ng nực. T&ocirc;i nghĩ đội U22 Việt Nam tập luyện ở Vũng T&agrave;u để l&agrave;m quen với điều kiện thời tiết tại Campuchia th&ocirc;i, chứ để n&acirc;ng cao được thể lực th&igrave; chưa chắc bằng sang Nhật Bản tập như ch&uacute;ng t&ocirc;i. Ch&iacute;nh v&igrave; thế m&agrave; đội tuyển nữ Việt Nam chịu được c&aacute;i nắng. Đ&aacute; đến trận thứ 2 rồi th&igrave; mọi người c&oacute; thể thấy c&aacute;c cầu thủ của t&ocirc;i chịu đựng rất tốt điều kiện thời tiết n&agrave;y&rdquo;.</p>\r\n\r\n<p>Đ&aacute;nh gi&aacute; về đối thủ tiếp theo ở v&ograve;ng bảng l&agrave; đội tuyển nữ Philippines, HLV Mai Đức Chung n&oacute;i: &ldquo;Trước khi v&agrave;o giải, t&ocirc;i đ&atilde; n&oacute;i đối thủ n&agrave;o t&ocirc;i cũng d&agrave;nh sự t&ocirc;n trọng như nhau, quyết t&acirc;m từng trận một. Ch&uacute;ng t&ocirc;i ở c&ugrave;ng kh&aacute;ch sạn với đội tuyển nữ Philippines v&agrave; thấy họ cũng k&ecirc;u ca rất nhiều về thời tiết. Họ cũng rất sợ, chứ kh&ocirc;ng chỉ ri&ecirc;ng ch&uacute;ng ta. Hiện tại đội tuyển nữ Việt Nam đ&atilde; dần ổn định rồi v&agrave; t&ocirc;i hi vọng tất cả sẽ tiếp tục ph&aacute;t huy, tiếp tục lối đ&aacute; &aacute;p s&aacute;t đối thủ. T&ocirc;i cũng cảm tưởng ở SEA Games n&agrave;y, đội Philippines kh&ocirc;ng mạnh bằng SEA Games 31 v&agrave; AFF Cup 2022&rdquo;.</p>', 'http://localhost/DO_AN_WEB/server/uploads/news_imgs/HLV-mai-duc-chung-06052023.jpeg', 'HLV trưởng đội tuyển nữ Việt Nam Mai Đức Chung. Ảnh: Minh Quyết/TTXVN', 1, '2023-05-06 22:21:00', '2023-05-06 10:21:00'),
(4, 5, 'Cực SỐC suối Ô TUKSA vừa xây dựng bãi giữ xe gắn máy lạnh', 'Tin chấn động suối Ô TUKSA vừa xây dựng bãi giữu xe gắn máy lạnh với giá tiền làm ngây ngất lòng người', '<p>Tin chấn động suối &Ocirc; TUKSA vừa x&acirc;y dựng b&atilde;i giữu xe gắn m&aacute;y lạnh với gi&aacute; tiền l&agrave;m ng&acirc;y ngất l&ograve;ng người, gi&aacute; gửi xe ban đầu đ&atilde; l&ecirc;n đến 50K cho 1 lần gửi</p>', 'http://localhost/DO_AN_WEB/server/uploads/news_imgs/thacotuksa2.jpg', 'Suối OTuksa', 1, '2023-05-07 18:18:18', '2023-05-07 06:18:18'),
(5, 2, 'SEA Games 32: Thể thao Việt Nam phá 14 kỷ lục Đại hội', 'VOV.VN - Không chỉ giành ngôi nhất toàn đoàn với số huy chương vượt trội, Đoàn Thể thao Việt Nam còn phá đến 14 kỷ lục tại SEA Games 32.', '<p>Tại SEA Games 32, Đo&agrave;n Thể thao Việt Nam c&oacute; tổng cộng cộng 136 HCV, 105 HCB, 114 HCĐ để xuất sắc đứng đầu to&agrave;n đo&agrave;n tr&ecirc;n bảng tổng sắp huy chương.&nbsp;</p>\r\n\r\n<p><img alt=\"Phạm Thanh Bảo ăn mừng chiến thắng ở nội dung bơi ếch 200m nam SEA Games 32. (Ảnh: Dương Thuật).\" src=\"https://media.vov.vn/sites/default/files/styles/large_watermark/public/2023-05/thanh%20bao.jpg\" style=\"height:800px; width:1200px\" /></p>\r\n\r\n<p>Ngo&agrave;i th&agrave;nh t&iacute;ch ấn tượng n&agrave;y, c&aacute;c VĐV Việt Nam c&ograve;n ph&aacute; đến 14 kỷ lục của Đại hội. Ở m&ocirc;n Bơi, Phạm Thanh Bảo xứng đ&aacute;ng được nhắc t&ecirc;n khi gi&agrave;nh 2 HCV, ph&aacute; 2 kỷ lục SEA Games ở c&aacute;c nội dung bơi 100m v&agrave; 200m ếch nam. Th&agrave;nh t&iacute;ch của k&igrave;nh ngư sinh năm 2001 n&agrave;y cũng đ&atilde; kh&ocirc;ng c&ograve;n c&aacute;ch qu&aacute; xa so với chuẩn B của Olympic Paris 2024.&nbsp;</p>\r\n\r\n<p>Tại m&ocirc;n Lặn, c&aacute;c VĐV đ&atilde; ph&aacute; đến 8 kỷ lục SEA Games trong tổng số 14 HCV đ&atilde; gi&agrave;nh được. Trong số c&aacute;c VĐV đạt HCV m&ocirc;n lặn của Việt Nam, Nguyễn Trần San San để lại ấn tượng lớn nhất với 2 HCV v&agrave; 1 kỷ lục khi mới chỉ 16 tuổi.&nbsp;</p>\r\n\r\n<p>Ở m&ocirc;n Cử tạ, c&aacute;c nam VĐV Trần Minh Tr&iacute; v&agrave; Nguyễn Quốc To&agrave;n đ&atilde; thết lập 4 kỷ lục SEA Games mới. Trong đ&oacute; Quốc To&agrave;n một m&igrave;nh ph&aacute; 3 kỷ lục ở cả cử đẩy, cử giật v&agrave; tổng cử hạng 89kg nam.&nbsp;</p>\r\n\r\n<p>Hơi tiếc cho Điền kinh khi c&aacute;c VĐV Việt Nam kh&ocirc;ng c&oacute; được kỷ lục SEA Games n&agrave;o d&ugrave; gi&agrave;nh đến 12 HCV./.&nbsp;</p>', 'http://localhost/DO_AN_WEB/server/uploads/news_imgs/6464f996d198d__thanh bao.jpg', 'Phạm Thanh Bảo ăn mừng chiến thắng ở nội dung bơi ếch 200m nam SEA Games 32. (Ảnh: Dương Thuật).', 1, '2023-05-17 22:58:14', '2023-05-17 10:58:14'),
(6, 2, 'FIFA khen ngợi hai ngôi sao của tuyển nữ Việt Nam', 'GD&TĐ - Sau ngôi vô địch SEA Games, hai cầu thủ của tuyển nữ Việt Nam đã nhận được lời khen ngợi từ FIFA.', '<p>Đội tuyển nữ Việt Nam đ&atilde; ho&agrave;n th&agrave;nh nhiệm vụ bảo vệ tấm HCV SEA Games 32 sau khi đ&aacute;nh bại Myanmar 2-0 ở trận chung kết.</p>\r\n\r\n<p>Bộ đ&ocirc;i ng&ocirc;i sao Thanh Nh&atilde; v&agrave; Huỳnh Như lập c&ocirc;ng gi&uacute;p đội nh&agrave; c&oacute; lần thứ 4 v&ocirc; địch SEA Games v&agrave; lập kỷ lục với 8 lần gi&agrave;nh Huy chương V&agrave;ng đại hội thể thao Đ&ocirc;ng Nam &Aacute;.</p>\r\n\r\n<p>Sau trận đấu, Thanh Nh&atilde; v&agrave; Huỳnh Như đ&atilde; nhận được lời khen ngợi từ FIFA. &ldquo;Đ&oacute; l&agrave; một tiền đạo nhạy b&eacute;n, kh&eacute;o l&eacute;o v&agrave; th&ocirc;ng minh. C&ocirc; g&aacute;i n&agrave;y sở hữu khả năng dứt điểm ấn tượng v&agrave; l&agrave; ch&acirc;n s&uacute;t số một trong lịch sử b&oacute;ng đ&aacute; nữ Việt Nam. C&ocirc; đ&atilde; g&oacute;p phần n&acirc;ng tầm đội tuyển v&agrave; trở th&agrave;nh một tấm gương cho c&aacute;c đồng đội nhờ v&agrave;o bầu nhiệt huyết bất tận&rdquo;, FIFA viết về đội trưởng Huỳnh Như tr&ecirc;n trang chủ.</p>\r\n\r\n<p>Về phần Thanh Nh&atilde;, c&ocirc; được FIFA đ&aacute;nh gi&aacute; rất cao về tốc độ v&agrave; khả năng đột ph&aacute;: &ldquo;C&ocirc; g&aacute;i n&agrave;y l&agrave; một trong những t&agrave;i năng trẻ nổi bật nhất của b&oacute;ng đ&aacute; nữ Việt Nam. Tiền đạo 21 tuổi sở hữu tốc độ v&agrave; khả năng đột ph&aacute; thần sầu. Thanh Nh&atilde; vừa c&oacute; thể đ&aacute; cắm, vừa c&oacute; thể chơi tốt ở h&agrave;nh lang c&aacute;nh v&agrave; lu&ocirc;n biết c&aacute;ch khai th&aacute;c v&agrave;o những điểm yếu của đối thủ.</p>\r\n\r\n<p>FIFA cũng kh&ocirc;ng qu&ecirc;n nhắc tới t&agrave;i cầm qu&acirc;n của HLV Mai Đức Chung: &ldquo;HLV Mai Đức Chung l&agrave; một chiến lược gia linh hoạt v&agrave; đề cao hiệu quả. &Ocirc;ng đ&atilde; lu&acirc;n chuyển tốt hai hệ thống 4 hậu vệ v&agrave; 3 trung vệ để chống lại những đợt tấn c&ocirc;ng của đối phương.</p>\r\n\r\n<p>Ở World Cup 2023, đội nữ Việt Nam kh&ocirc;ng được đ&aacute;nh gi&aacute; cao ở bảng D. Do đ&oacute;, đừng ngạc nhi&ecirc;n nếu HLV Mai Đức Chung chỉ sử dụng một tiền đạo cắm duy nhất l&agrave; Huỳnh Như&rdquo;.</p>\r\n\r\n<p>H&ocirc;m qua (16/5), đội tuyển Việt Nam chia 2 nh&oacute;m về nước sau khi ho&agrave;n th&agrave;nh nhiệm vụ ở SEA Games 32. Nh&oacute;m gồm HLV Mai Đức Chung v&agrave; đa số c&aacute;c th&agrave;nh vi&ecirc;n của đội về đến H&agrave; Nội v&agrave;o khoảng 21h30.</p>\r\n\r\n<p>Sau SEA Games 32, to&agrave;n đội được nghỉ ngơi một tuần trước khi tập trung trở lại để chuẩn bị cho World Cup 2023. Thầy tr&ograve; HLV Mai Đức Chung sẽ sang ch&acirc;u &Acirc;u tập huấn từ cuối th&aacute;ng 5. Ng&agrave;y 9/6, đội c&oacute; trận thi đấu giao hữu với tuyển nữ U23 Ba Lan.</p>\r\n\r\n<p>Sau đ&oacute;, Huỳnh Như v&agrave; c&aacute;c đồng đội tiếp tục tập huấn tại Đức v&agrave; thi đấu với đội tuyển quốc gia nước n&agrave;y v&agrave;o ng&agrave;y 24/6 trước khi tham dự World Cup.</p>\r\n\r\n<p>&ldquo;Tới đ&acirc;y, t&ocirc;i sẽ tiếp tục bổ sung c&aacute;c cầu thủ trẻ v&agrave;o đội tuyển. Theo t&ocirc;i, sau c&aacute;c đợt tập huấn tại Đức v&agrave; Ba Lan, sau khi tham dự World Cup, c&aacute;c cầu thủ nữ Việt Nam sẽ tự tin hơn&rdquo;, HLV Mai Đức Chung chia sẻ khi về đến Việt Nam.</p>', 'http://localhost/DO_AN_WEB/server/uploads/news_imgs/6464fb11bcdc3__-3828.png', 'Thanh Nhã và Huỳnh Như được FIFA ngợi khen sau chiến tích vô địch SEA Games.', 1, '2023-05-17 23:04:33', '2023-05-17 11:04:33'),
(7, 12, 'Chuẩn bị hồ sơ để chuyển dịch COVID-19 từ bệnh truyền nhiễm nhóm A sang nhóm B', 'SKĐS - Thủ tướng Chính phủ yêu cầu Bộ Y tế phối hợp các bộ, ngành liên quan chuẩn bị hồ sơ theo quy định để chuyển dịch COVID-19 từ bệnh truyền nhiễm nhóm A sang nhóm B.', '<p>Văn ph&ograve;ng Ch&iacute;nh phủ ng&agrave;y 18/5 đ&atilde; c&oacute; c&ocirc;ng văn số 3575 gửi Bộ trưởng Bộ Y tế Đ&agrave;o Hồng Lan về&nbsp;<a href=\"https://suckhoedoisong.vn/ngay-19-5-co-gan-2000-ca-covid-19-moi-trong-24h-qua-169230519170927295.htm\" title=\"công tác phòng, chống dịch COVID-19 trong tình hình mới\">công tác phòng, ch&ocirc;́ng dịch COVID-19 trong tình hình mới</a>.</p>\r\n\r\n<p>Theo đ&oacute;, c&ocirc;ng văn n&ecirc;u, xét báo cáo s&ocirc;́ 626/BC-BYT ngày 13/5/2023 của Bộ Y t&ecirc;́ v&ecirc;̀ công tác phòng, ch&ocirc;́ng dịch COVID-19 trong tình hình mới, Thủ tướng Chính phủ Phạm Minh Chính có ý ki&ecirc;́n như sau:</p>\r\n\r\n<p>Giao Bộ Y t&ecirc;́ chủ trì, ph&ocirc;́i hợp với các Bộ, cơ quan liên quan chu&acirc;̉n bị h&ocirc;̀ sơ theo quy định của Luật phòng, ch&ocirc;́ng bệnh truy&ecirc;̀n nhi&ecirc;̃m năm 2007 v&ecirc;̀ việc chuy&ecirc;̉n phân loại bệnh từ bệnh truy&ecirc;̀n nhi&ecirc;̃m thuộc nhóm A sang bệnh truy&ecirc;̀n nhi&ecirc;̃m thuộc nhóm B và công b&ocirc;́ h&ecirc;́t dịch đ&ocirc;́i với dịch COVID-19, trình Thủ tướng Chính phủ xem xét, quy&ecirc;́t định.</p>\r\n\r\n<p>Đ&ocirc;̀ng ý việc kiện toàn Ban Chỉ đạo Qu&ocirc;́c gia phòng, ch&ocirc;́ng dịch COVID-19 theo đ&ecirc;̀ xu&acirc;́t của Bộ Y t&ecirc;́ tại báo cáo nêu trên; giao Bộ Y t&ecirc;́ chủ trì, ph&ocirc;́i hợp với các Bộ, cơ quan liên quan chu&acirc;̉n bị h&ocirc;̀ sơ, trình Thủ tướng Chính phủ xem xét, quy&ecirc;́t định; Bộ Y t&ecirc;́ chu&acirc;̉n bị nội dung, chương trình, ph&ocirc;́i hợp với Văn phòng Chính phủ t&ocirc;̉ chức họp Ban Chỉ đạo Qu&ocirc;́c gia vào ngày 27/5/2023 đ&ecirc;̉ công b&ocirc;́ k&ecirc;́t thúc nhiệm vụ của Ban Chỉ đạo.</p>\r\n\r\n<p>Bộ Y t&ecirc;́ căn cứ khuy&ecirc;́n cáo của T&ocirc;̉ chức Y t&ecirc;́ th&ecirc;́ giới và tình hình thực t&ecirc;́ dịch bệnh COVID-19 tại Việt Nam, xây dựng K&ecirc;́ hoạch ki&ecirc;̉m soát,&nbsp;<a href=\"https://suckhoedoisong.vn/moi-ngay-van-co-khoang-2000-ca-benh-khi-nao-viet-nam-co-the-cong-bo-het-dich-covid-19-169230509103018288.htm\" title=\"quản lý bền vững đối với dịch COVID-19 \">quản lý b&ecirc;̀n vững đ&ocirc;́i với dịch COVID-19&nbsp;</a>giai đoạn 2023 - 2025, ban hành theo th&acirc;̉m quy&ecirc;̀n, trường hợp vượt th&acirc;̉m quy&ecirc;̀n báo cáo c&acirc;́p có th&acirc;̉m quy&ecirc;̀n xem xét, quy&ecirc;́t định.&nbsp;</p>\r\n\r\n<p>Kể từ đầu dịch đến nay&nbsp;<a href=\"https://suckhoedoisong.vn/ngay-19-5-co-gan-2000-ca-covid-19-moi-trong-24h-qua-169230519170927295.htm\" title=\"Việt Nam có 11.600.569 ca mắc COVID-19\">Việt Nam c&oacute; 11.600.569 ca mắc COVID-19</a>, đứng thứ 13/231 quốc gia v&agrave; v&ugrave;ng l&atilde;nh thổ, trong khi với tỷ lệ số ca nhiễm/1 triệu d&acirc;n, Việt Nam đứng thứ 120/231 quốc gia v&agrave; v&ugrave;ng l&atilde;nh thổ (b&igrave;nh qu&acirc;n cứ 1 triệu người c&oacute; 117.232 ca nhiễm). Đến nay, tổng số ca được điều trị khỏi ở Việt Nam l&agrave; 10.634.615 ca.</p>\r\n\r\n<p>Tổ chức y tế thế giới (WHO) đ&atilde; tuy&ecirc;n bố COVID-19 kh&ocirc;ng c&ograve;n l&agrave; t&igrave;nh trạng y tế khẩn cấp to&agrave;n cầu. D&ugrave; COVID-19 đ&atilde; được WHO coi kh&ocirc;ng c&ograve;n l&agrave; t&igrave;nh trạng y tế c&ocirc;ng khẩn cấp nhưng dịch bệnh vẫn c&ograve;n đ&oacute; v&agrave; virus kh&ocirc;ng tự biến mất v&agrave; vẫn l&agrave; một phần trong cuộc sống của ch&uacute;ng ta. C&aacute;c quốc gia vẫn cần n&acirc;ng cao năng lực ứng ph&oacute; v&agrave; kh&ocirc;ng được lơ l&agrave;, mất cảnh gi&aacute;c. TS. Tedros Adhanom Ghebreyesus - Tổng Gi&aacute;m đốc WHO cho biết WHO vẫn c&oacute; thể kh&ocirc;i phục t&igrave;nh trạng y tế khẩn cấp to&agrave;n cầu đối với dịch COVID-19 bất kể l&uacute;c n&agrave;o nếu t&igrave;nh h&igrave;nh dịch nguy cấp tr&ecirc;n thế giới.</p>\r\n\r\n<p>WHO cũng đ&atilde; đưa ra 7 khuyến nghị tạm thời cho tất cả c&aacute;c quốc gia th&agrave;nh vi&ecirc;n trong ph&ograve;ng chống dịch COVID-19 trong t&igrave;nh h&igrave;nh mới.</p>', 'http://localhost/DO_AN_WEB/server/uploads/news_imgs/6467a1e20cf8a__ca-covid-38-1659522729827618862994.jpg', 'Kể từ đầu dịch đến nay Việt Nam có 11.600.569 ca mắc COVID-19', 1, '2023-05-19 23:20:50', '2023-05-19 11:20:50');

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
(11, 'Công nghệ'),
(12, 'Y tế');

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
  `FACEBOOK_URL` tinytext DEFAULT NULL,
  `TIKTOK_URL` tinytext DEFAULT NULL,
  `YOUTUBE_URL` tinytext DEFAULT NULL,
  `INSTAGRAM_URL` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`_ID`, `ACCOUNTS_ID`, `FIRST_NAME`, `LAST_NAME`, `FULL_NAME`, `NICK_NAME`, `BIRTH`, `PHONE_NUMBER`, `AVATAR`, `COVER_IMAGE`, `FACEBOOK_URL`, `TIKTOK_URL`, `YOUTUBE_URL`, `INSTAGRAM_URL`) VALUES
(1, 1, 'Nguyễn', 'Vũ', 'Nguyễn Vũ', '@7V', '2002-05-04', '0358802875', 'http://localhost/DO_AN_WEB/server/images/admin.png', 'http://localhost/DO_AN_WEB/server/images/admin_cover-img.png', 'https://www.facebook.com/nguyenvu.version2319.vn', '', '', ''),
(2, 3, '', 'Thanh Tú', 'Thanh Tú', '@thanhtu', '0000-00-00', '', 'http://localhost/DO_AN_WEB/server/uploads/user_imgs/avatar/z4358586127130_3ec0bfbe7c227cc72e97b3ae09231bd6.jpg', 'http://localhost/DO_AN_WEB/server/images/no-image-cover.png', '', '', '', ''),
(3, 4, '', 'Thảo Vy', 'Thảo Vy', '@thaovy', '0000-00-00', '', 'http://localhost/DO_AN_WEB/server/uploads/user_imgs/avatar/z4315931380514_a7101470ff1a4f37ae34e2167e385029.jpg', 'http://localhost/DO_AN_WEB/server/images/no-image-cover.png', '', '', '', ''),
(4, 5, '', 'Người Dùng 1', 'Người Dùng 1', '@nguoidung1', '0000-00-00', '', 'http://localhost/DO_AN_WEB/server/images/no-image-user.png', 'http://localhost/DO_AN_WEB/server/images/no-image-cover.png', '', '', '', '');

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
-- Chỉ mục cho bảng `follows`
--
ALTER TABLE `follows`
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
-- Các ràng buộc cho bảng `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`_ID`);

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
