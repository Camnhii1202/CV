-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2024 lúc 05:57 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cv_bt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `education`
--

CREATE TABLE `education` (
  `education_id` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `school_name` varchar(100) NOT NULL,
  `major` varchar(100) NOT NULL,
  `start_year` int(11) DEFAULT NULL,
  `end_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `education`
--

INSERT INTO `education` (`education_id`, `id`, `school_name`, `major`, `start_year`, `end_year`) VALUES
(1, 1, 'Trường THPT Chuyên Lê Quý Đôn', 'Chuyên Văn', 2016, 2019),
(2, 1, ' Đại học Kinh tế Thành phố Hồ Chí Minh', 'Thương mại điện tử', 2019, 2023);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `experience`
--

CREATE TABLE `experience` (
  `work_id` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `company_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `job_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `experience`
--

INSERT INTO `experience` (`work_id`, `id`, `company_name`, `position`, `start_date`, `end_date`, `job_description`) VALUES
(1, 1, 'Công ty ABC', 'Chuyên viên tư vấn khách hàng', '2022-10-01', '2023-05-31', 'Tư vấn và hỗ trợ khách hàng trong việc lựa chọn sản phẩm phù hợp.\r\nXử lý các yêu cầu, thắc mắc và khiếu nại từ khách hàng.'),
(2, 1, ' Công ty XYZ', 'Trợ lý Dự án', '2023-09-01', '2024-01-31', 'Hỗ trợ quản lý và giám sát tiến độ thực hiện các dự án của công ty.\r\nChuẩn bị tài liệu, báo cáo và tham gia các cuộc họp dự án.\r\nPhối hợp với các phòng ban để đảm bảo dự án được thực hiện đúng tiến độ.'),
(3, 1, 'Công ty JKL', 'Nhân viên Marketing', '2024-03-01', '2024-09-30', 'Lên kế hoạch và triển khai các chiến dịch quảng cáo trên các kênh truyền thông xã hội.\r\nTối ưu hóa nội dung để tăng tương tác và độ nhận diện thương hiệu.\r\nPhân tích dữ liệu và báo cáo hiệu quả của các chiến dịch.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_info`
--

CREATE TABLE `personal_info` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `personal_info`
--

INSERT INTO `personal_info` (`id`, `name`, `email`, `phone`, `address`, `bio`) VALUES
(1, 'Nguyễn Hoàng Ngọc Thanh', 'ngocthanhnguyen123@gmail.com', '0912312123', '123 Nguyễn Tri Phương, Quận 10, TP HCM', 'Tôi là một người nhiệt huyết và sáng tạo, luôn tìm kiếm cơ hội để học hỏi và phát triển. Với niềm đam mê trong lĩnh vực truyền thông và marketing, tôi mong muốn áp dụng kiến thức của mình để tạo ra những giá trị tích cực và đóng góp vào sự phát triển của tổ chức. Tôi tin rằng sự chăm chỉ và tinh thần cầu tiến sẽ giúp tôi đạt được những mục tiêu lớn trong tương lai.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `skill_name` varchar(100) NOT NULL,
  `proficiency_level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `skills`
--

INSERT INTO `skills` (`skill_id`, `id`, `skill_name`, `proficiency_level`) VALUES
(1, 1, 'Tiếng Anh thương mại (IELTS 7.5)', 'Tốt'),
(2, 1, 'Sáng tạo nội dung tiếp thị trên nền tảng mạng xã hội (Instagram, TikTok)', 'Trung bình'),
(3, 1, 'Sử dụng ngôn ngữ lập trình cơ bản (HTML, CSS, JavaScript)', 'Trung bình'),
(4, 1, 'Kỹ năng giao tiếp và thuyết trình trước công chúng', 'Tốt'),
(5, 1, 'Sử dụng công cụ quảng cáo Google Ads và Facebook Ads', 'Nâng cao');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`work_id`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `education`
--
ALTER TABLE `education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `experience`
--
ALTER TABLE `experience`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`id`) REFERENCES `personal_info` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`id`) REFERENCES `personal_info` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`id`) REFERENCES `personal_info` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
