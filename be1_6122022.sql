-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 06, 2022 at 03:33 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be1`
--
CREATE DATABASE IF NOT EXISTS `be1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `be1`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Tẩy rửa'),
(2, 'Máy móc');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_view` int(11) NOT NULL DEFAULT '0',
  `product_like` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_price`, `product_photo`, `product_view`, `product_like`) VALUES
(1, 'Nước Lau Sàn Sunlight Tinh Dầu Thiên Nhiên - Hương Hoa Diên Vỹ 3.8kg', 'Giúp sàn nhà bạn sạch bóng không tì vết và ngát hương thơm chỉ sau một lần lau nhẹ\r\nCó thể sử dụng sản phẩm cho các không gian trong nhà như: phòng ngủ, phòng khách bếp và phòng tắm, mang lại vẻ sáng bóng cho tổ ấm của bạn.\r\nĐánh bay vết bẩn nhanh chóng- Giúp sàn nhà bạn sạch bóng không tì vết và ngát hương thơm chỉ sau một lần lau nhẹ\r\n- Có thể sử dụng sản phẩm cho các không gian trong nhà như: phòng ngủ, phòng khách bếp và phòng tắm, mang lại vẻ sáng bóng cho tổ ấm của bạn.\r\n- Đánh bay vết bẩn nhanh chóng\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Tuy nhiên tuỳ vào từng loại sản phẩm hoặc phương thức, địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, ...', 78000, '48b520f3b84fe0ca3c68529d624e33e3.jpg', 2, 2),
(2, 'Máy Khuếch Tán Tinh Dầu Kiêm Đèn Ngủ Mini USB Xiaomi HL (120ml)', 'Ba chức năng: làm ẩm không khí, khuếch tán tinh dầu, đèn ngủ\r\nDung tích: 120ml\r\nĐiều khiển bằng một nút bấm\r\nChất liệu: nhựa ABS + PP\r\nĐế silicon chống trượt\r\nPhương thức sạc: USB\r\nChức năng tắt nguồn thông minh và an toàn', 279000, '8dbc6c26f8b6ae8ef1feddba70494179.jpg', 3, 3),
(3, 'Bàn Chải Đánh Răng Điện Oral B Vitality', 'Bàn chải điện được kiểm nghiệm làm sạch răng tốt hơn so với bàn chải thông thường\r\nKiểu dáng thiết kế tạo thế cầm chắc chắn,bọc lót khi cầm không bị rơi\r\nRất tốt cho cả trẻ nhỏ và người lớn ( khuyến khích trẻ tự bảo vệ răng miệng )\r\nHữu dụng khi trẻ bị viêm lợi hay đang kiềng răng\r\nĐánh răng với tốc độ chậm hơn giúp làm sạch răng lợi nhạy cảm\r\nGiúp chải răng sạch trong mọi ngõ ngách\r\nOral-B là nhãn hiệu được các nha sĩ khuyên dùng', 497000, 'a4ac08485ff7545e6f4c728df9841fa3.jpg', 2, 5),
(4, 'Combo 2 Nước Rửa Chén Sunlight Khử mùi tanh Matcha Trà Nhật (2.1kg x 2)', 'Chiết xuất từ chanh và trà xanh\r\nKhử sạch mùi tanh\r\nAn toàn, dịu nhẹ\r\nHương thơm tươi mát\r\nThiết kế dạng túi tiết kiệm', 114000, '665501a0521a479c4b6015325a63877a.jpg', 0, 0),
(5, 'Nước Rửa Chén Sunlight Chanh Công Nghệ Mới Dạng Túi', 'Nước rửa chén Sunlight Chanh mới, với công nghệ xả bọt nhanh nay có:\r\nCông thức đánh bay dầu mỡ hiệu quả\r\nSunlight với chiết xuất chanh và công nghệ xả bọt nhanh mới, giúp đánh bay dầu mỡ hiệu quả.\r\nNgoài khả năng đánh tan dầu mỡ, Nước Rửa Chén Sunlight Chanh còn có hương thơm thanh mát\r\nDịu nhẹ với da tay, được kiểm nghiệm và chứng nhận bởi Viện Da Liễu\r\nDung tích chai lớn 3.8kg sử dụng tiết kiệm hơn\r\nBao bì sản phẩm có thể thay đổi theo từng đợt nhập hàng\r\nNước Rửa Chén Sunlight Chanh Công Nghệ Mới Dạng Túi nay với công nghệ xả bọt nhanh mang lại khả năng đánh bay dầu mỡ hiệu quả hơn, không bám bọt.\r\nSản phẩm có khả năng rửa sạch dầu mỡ cả trên đồ nhựa và dịu nhẹ dịu với da tay, an toàn cho người dùng.\r\nVới hương chanh tươi mát, đây sẽ là sự lựa chọn hoàn hảo cho các bà nội trợ.\r\nLƯU Ý:\r\n\r\nKhông được uống.\r\nĐể xa tầm tay trẻ em.\r\nNếu sản phẩm dính vào mắt, rửa sạch bằng nước.\r\nNếu nuốt phải, uống ngay 1 ly nước hoặc sữa, nếu cần thì đến cơ sở y tế.\r\nLưu trữ nơi khô ráo, tránh ánh nắng trực tiếp\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Tuy nhiên tuỳ vào từng loại sản phẩm hoặc phương thức, địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, ...', 59000, '8bf11311ceaa75bc49597b4fc22531fd.jpg', 0, 0),
(6, 'Bếp Điện Từ Sunhouse SHD6800 - Tặng Kèm Nồi Lẩu - Hàng chính hãng', 'Công suất: 2000W\r\nPhím bấm cảm ứng\r\nMặt kính chịu nhiệt siêu bền\r\nChế độ nấu đa dạng\r\nMặt bếp từ lớn, nấu ăn hiệu quả\r\nKhóa trẻ em an toàn tuyệt đối', 579000, '07ab883b2b0b8eb1be1794b8ff836bef.jpg', 0, 0),
(7, 'Tai nghe i12 TWS Bluetooth 5.0 cho iPhone và Android kèm Hộp sạc', 'THÔNG SỐ KỸ THUẬT\r\nTên sản phẩm: Tai nghe Inpod i12 TWS Bluetooth 5.0 cho iPhone và Android kèm Hộp sạc\r\nModel: i12 TWS- Kết nối: Bluetooth 5.0\r\nHỗ trợ: HSP/HFP/A2DP/AVRCP/SPP\r\nNút chạm cảm ứng\r\nDải tần: 40Hz – 20KHz\r\nKhoảng cách kết nối: ≥10m\r\nKích thước: 56mm*44mm*21mm\r\nKhối lượng: 45g\r\nhời gian hoạt động: khoảng 1.5 tiếng (tùy theo âm lượng nghe)\r\nĐộ nhạy: 106dB SPL ± 3dB', 76000, '55933aa223d80777e2eb251a9d72a65f.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

DROP TABLE IF EXISTS `products_categories`;
CREATE TABLE IF NOT EXISTS `products_categories` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`product_id`, `category_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 1),
(5, 1),
(6, 2),
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_user`
--

DROP TABLE IF EXISTS `product_user`;
CREATE TABLE IF NOT EXISTS `product_user` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$tvF8/HBgqP2.1I2N.cr72.afkgeARW6MXVrEOi/jXeq/LFIoIYLki');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
