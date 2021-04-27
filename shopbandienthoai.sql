-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2019 at 04:19 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopbandienthoai`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `idCTHD` int(11) NOT NULL,
  `idHD` int(11) NOT NULL,
  `idSP` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Dongia` float NOT NULL,
  `Thanhtien` float NOT NULL,
  `khuyenmai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`idCTHD`, `idHD`, `idSP`, `Soluong`, `Dongia`, `Thanhtien`, `khuyenmai`) VALUES
(1, 16, 43, 1, 990000, 990000, 0),
(2, 17, 39, 1, 17990000, 17990000, 0),
(3, 17, 52, 1, 5490000, 5490000, 0),
(4, 18, 47, 1, 22990000, 22990000, 0),
(5, 19, 53, 1, 2390000, 2390000, 0),
(6, 19, 35, 1, 10590000, 10590000, 0),
(7, 20, 44, 1, 440000, 440000, 0),
(8, 20, 41, 1, 6990000, 6990000, 0),
(9, 21, 33, 1, 11390000, 11390000, 0),
(10, 21, 32, 1, 3990000, 3990000, 0),
(11, 22, 55, 1, 5990000, 5990000, 0),
(12, 22, 11, 1, 6400000, 6400000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `idHD` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `hoten_user` varchar(255) NOT NULL,
  `Gmail_user` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `Diachi` varchar(255) NOT NULL,
  `Tongtien` float NOT NULL,
  `payment` varchar(255) NOT NULL,
  `Ngaytao` varchar(11) NOT NULL,
  `trangthai` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`idHD`, `idUser`, `hoten_user`, `Gmail_user`, `phone`, `Diachi`, `Tongtien`, `payment`, `Ngaytao`, `trangthai`) VALUES
(16, 5, 'Nguyen Văn A', 'huythang0903@gmail.com', '0968798351', 'Quận 5 - TP.Hồ chí minh', 990000, 'Tiền mặt', '15-05-2019', 1),
(17, 5, 'Nguyễn Huy Thắng', 'huythang0903@gmail.com', '0968798351', 'Quận 6 - TP.Hồ chí minh', 23480000, 'Qua thẻ', '15-05-2019', 1),
(18, 5, 'Nguyễn Huy Thắng 123', 'huythang0903@gmail.com', '0968798351', 'Quận 8 -  TP.Hồ chí minh', 22990000, 'Tiền mặt', '15-05-2019', 1),
(19, 6, 'Trương Đình Thiện', 'huythang@gmail.com', '0132849123', 'Cầu Giấy - Hà nội', 12980000, 'Qua thẻ', '15-05-2019', 0),
(20, 6, 'Nguyễn Văn Bình', 'huythang@gmail.com', '0132849123', 'Hà nội', 7430000, 'Tiền mặt', '15-05-2019', 1),
(21, 7, 'Trương Đình Thiện', 'dinhthien@gmail.com', '0123494123', 'An Dương Vương - Quận 5 - TP.Hồ chí minh', 15380000, 'Qua thẻ', '15-05-2019', 1),
(22, 7, 'Nguyen Văn B', 'dinhthien@gmail.com', '0123494123', 'An Dương Vương - Quận 5 - TP.Hồ chí minh', 12390000, 'Qua thẻ', '15-05-2019', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `idLH` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_gmail` varchar(100) NOT NULL,
  `Noidung` text NOT NULL,
  `Create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `idLSP` int(3) NOT NULL,
  `tenloai` varchar(50) NOT NULL,
  `maloai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`idLSP`, `tenloai`, `maloai`) VALUES
(1, 'Iphone', 'IP'),
(2, 'Samsung', 'SA'),
(3, 'Nokia', 'NA'),
(4, 'Xiaomi', 'XI'),
(5, 'OPPO', 'OP'),
(6, 'Huawei', 'HU');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `STT` int(11) NOT NULL,
  `MaNV` varchar(10) NOT NULL,
  `Ten` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(12) NOT NULL,
  `DiaChi` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Luong` int(11) NOT NULL,
  `Pass` varchar(20) NOT NULL,
  `Trangthai` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PhanQuyen` varchar(10) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`STT`, `MaNV`, `Ten`, `SDT`, `DiaChi`, `NgaySinh`, `GioiTinh`, `Luong`, `Pass`, `Trangthai`, `PhanQuyen`) VALUES
(1, 'Admin', 'Ngô Thị Thu', '0987654321', '20 Hai Bà Trung, P7, Quận 1,TPHCM', '1997-05-08', 'Nữ', 500, '0987654321', 'Mở khóa', 'Admin'),
(2, 'Manager01', 'Trương Đình Thiện', '0837060928', '20, Quang Trung,P.10,Gò Vấp,HCM', '1999-05-26', 'Nam', 350, '0837060928', 'Mở khóa', 'Manager'),
(3, 'Manager02', 'Nguyễn Huy Thắng', '0123456789', '18 Bùi thị xuân,P3,Tân Bình,HCM', '1999-05-12', 'Nam', 350, '0123456789', 'Mở khóa', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `idSP` int(11) NOT NULL,
  `idLSP` int(11) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `gia` float NOT NULL,
  `mota` varchar(200) NOT NULL,
  `hinhanh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`idSP`, `idLSP`, `tensp`, `gia`, `mota`, `hinhanh`) VALUES
(1, 1, 'Iphone 5s 16GB', 3400000, 'iphone 5', 'ip5ss.png'),
(2, 2, 'Samsung Note 9', 19500000, ' Samsung Galaxy Note 9 mang trong mình hàng hoạt các thay đổi đột phá với điểm nhấn đặc biệt đến từ chiếc bút S-Pen thần thánh cùng một viên pin dung lượng khổng lồ tới 4.000 mAh.', 'sa0.png'),
(3, 1, 'Iphone 7', 8000000, '', 'ip7.png'),
(4, 5, 'OPPO A3s', 4400000, 'OPPO A3s 16GB là một chiếc smartphone giá rẻ hiếm hoi trên thị trường sở hữu những tính năng khá hấp dẫn trong năm 2018 đó là camera kép ở mặt lưng và màn hình tai thỏ ở mặt trước.', 'op0.png'),
(5, 5, 'OPPO A7', 4400000, 'OPPO luôn mang có sự thay đổi trong thiết kế mới và chiếc điện thoại OPPO A7 đã đem đến cho người dùng những màu sắc mới đáng để lựa chọn với mặt lưng 3D cùng màn hình giọt nước siêu tràn viền.', 'op7.png'),
(6, 1, 'Iphone 6', 5400000, '', 'ip6ss.png'),
(7, 4, 'XIAOMI Mi3', 4400000, 'Xiaomi Mi 3 được thiết kế rất mạnh mẽ với các góc cạnh thể hiện rõ ràng, hơn nữa thân máy được làm bằng hợp kim Magie giúp máy có trọng lượng nhẹ và đạt tính thẩm mỹ cao. Cạnh dưới cùng của máy ta có ', 'xi.png'),
(8, 2, 'Samsung S8', 10500000, 'Tự động lấy nét, Quay video Full HD, Chế độ làm đẹp, Selfie ngược sáng HDR, Nhận diện khuôn mặt, Chụp bằng giọng nói, Selfie bằng cử chỉ.', 'sa10.png'),
(9, 1, 'Iphone 7', 4400000, '', 'ip7b.png'),
(10, 1, 'Iphone 8', 8400000, '', 'ip7.png'),
(11, 6, 'Huawei Honor Note 10 Chính Hãng', 6400000, 'Thông tin sản phẩm: Máy mới chính hãng, chưa kích hoạt, fullbox đầy đủ phụ kiện Sạc, cable usb, sách hướng dẫn sử dụng, hộp trùng IMEI, bảo hành 12 tháng.', 'huawei-honor-note-10-1.png'),
(12, 1, 'Iphone 8 Plus', 12500000, 'Thừa hưởng những thiết kế đã đạt đến độ chuẩn mực, thế hệ iPhone 8 Plus thay đổi phong cách bóng bẩy hơn và bổ sung hàng loạt tính năng cao cấp cho trải nghiệm sử dụng vô cùng tuyệt vời.', 'ip8.png'),
(13, 1, 'Iphone 7 plus Red', 9300000, 'iPhone 7 Plus là chiếc iPhone đầu tiên được trang bị camera kép có cùng độ phân giải 12 MP, đem lại khả năng chụp ảnh ở hai tiêu cự khác nhau.', 'ip7res.png'),
(14, 1, 'Iphone 4s', 2300000, 'iPhone 4s là chiếc iPhone đầu tiên được trang bị camera.', 'ip4.png'),
(15, 1, 'Iphone 4', 1200000, 'iPhone 4 là chiếc iPhone mang một thiết kế mới lạ.', 'iphone/8.png'),
(16, 1, 'Iphone 6s', 3400000, 'iPhone 6s Plus 32 GB được nâng cấp độ phân giải camera sau lên 12 MP (thay vì 8 MP như trên iPhone 6 Plus), camera cho tốc độ lấy nét và chụp nhanh, thao tác chạm để chụp nhẹ nhàng.', 'ip6plus.png'),
(17, 1, 'iphone 6s plus', 5400000, 'iPhone 6s Plus 32 GB được nâng cấp độ phân giải camera sau lên 12 MP (thay vì 8 MP như trên iPhone 6 Plus), camera cho tốc độ lấy nét và chụp nhanh, thao tác chạm để chụp nhẹ nhàng.', 'ip6plus.png'),
(18, 2, 'Samsung S9', 11500000, 'Tự động lấy nét, Quay video Full HD, Chế độ làm đẹp, Selfie ngược sáng HDR, Nhận diện khuôn mặt, Chụp bằng giọng nói, Selfie bằng cử chỉ', 'sa2.png'),
(19, 2, 'Samsung A9', 8600000, 'Samsung Galaxy A9 (2018) là chiếc điện thoại đầu tiên của Samsung sở hữu hệ thống camera ấn tượng với 4 thấu kính cùng hàng loạt các nâng cấp đáng giá về cấu hình và tính năng hiện đại khác.', 'sa3.png'),
(20, 2, 'Samsung Note 8', 10900000, 'Galaxy Note 8 là niềm hy vọng vực lại dòng Note danh tiếng của điện thoại Samsung với diện mạo nam tính, sang trọng. Máy trang bị camera kép xóa phông thời thượng, màn hình vô cực như trên S8 Plus, bú', 'sa4.png'),
(21, 2, 'Samsung A8', 7400000, 'Samsung Galaxy A8 Star là một biến thể mới của dòng A trong gia đình Samsung với sự nâng cấp vượt trội về camera cũng như thay đổi trong thiết kế.', 'sa5.png'),
(22, 5, 'OPPO F7', 3500000, 'Tiếp nối sự thành công của OPPO F5 thì OPPO tiếp tục tung ra OPPO F7 với điểm nhấn vẫn là camera selfie và thiết kế \"tai thỏ độc đáo\".', 'op1.png'),
(23, 4, 'Xiaomi mi8', 8400000, 'Xiaomi Mi 8 SE là phiên bản giá rẻ của chiếc Xiaomi Mi 8 nhưng vẫn mang trong mình nhiều trang bị cao cấp của một chiếc máy đầu bảng.', 'xi3.png'),
(24, 4, 'Xiaomi Redmi Note 6', 4900000, 'Xiaomi Redmi Note 6 Pro 32GB là chiếc điện thoại sở hữu cấu hình thấp hơn một chút, với RAM 3GB nhưng vẫn được trang bị đến 4 camera, điều mà nhiều đối thủ của Xiaomi không có được.', 'xi5.png'),
(25, 3, 'Nokia 3.2', 3550000, 'Thông tin sản phẩm:Nokia 3.2 có màn hình 6.29 iches với tỷ lệ 19:9 thời thượng, Camera sau 13Mp sắc nét. Camera Selfie 5Mp. Nokia 3.2 chạy chip Snapdragon 429, Android 9.0 Pie. Hỗ trợ bảo mật mật vân ', 'nokia-den.png'),
(26, 3, 'Nokia 3.1 Plus Chính Hãng', 2990000, 'Thông tin sản phẩm: Nokia 3.1 Plus có màn hình 6 inch Full HD+ sắc nét. Cấu hình khủng trong tầm giá với Ram 2GB cùng bộ đôi Camera kép 13MP + 5MP. Hỗ trợ cảm biến vân tay, mở khóa bằng khuôn mặt. Bảo', 'nokia-3.1-plus-1.png'),
(27, 3, 'Nokia X7 ( Nokia 7.1 ) 128Gb Ram 6GB', 7890000, 'Thông tin sản phẩm: Nokia X7 ( Nokia 7.1 Plus ) là smartphone Nokia đáng chú ý nhất thời điểm hiện tại của Nokia. Sản phẩm được trang bị camera kép chụp xóa phông chuyên nghiệp. Màn hình tỷ lệ 19:9 th', 'nokia-x7-do.png'),
(28, 3, 'Nokia X5 (Nokia 5.1 Plus) Ram 4GB / 64GB', 3450000, 'Thông tin sản phẩm:Nokia X5, Sản phẩm ra đời sau Nokia X6, sở hữu những ưu điểm của nokia X6 như màn hình 19:9, tai thỏ , camera kép xóa phông ảo diệu. Chạy chip 8 nhân. Pin 3000 mAh. Đây là một trong', 'nokia-5.png'),
(29, 3, 'Nokia 3.2 Chính Hãng Ram 2GB/16GB', 2750000, 'Thông tin sản phẩm:Nokia 3.2 có màn hình 6.29 iches với tỷ lệ 19:9 thời thượng, Camera sau 13Mp sắc nét. Camera Selfie 5Mp. Nokia 3.2 chạy chip Snapdragon 429, Android 9.0 Pie. Hỗ trợ bảo mật mật vân ', '3.2-den.png'),
(30, 6, 'Huawei Honor 7C 32Gb Ram 3Gb', 3990000, 'Thông tin sản phẩm:Smartphone tầm trung Honor 7C của Huawei với điểm nhấn màn hình 18:9, camera kép, mở khoá bằng nhận diện khuôn mặt và vân tay 1 chạm... giá dưới 4 triệu. Máy mới 100% nguyên seal hà', 'huawei7C_xanh.png'),
(31, 6, 'Huawei Nova 3 Chính hãng', 2990000, 'Thông tin sản phẩm: Sản phẩm được phân phối trực từ đại diện Huawei tại Việt Nam, Máy mới nguyên hộp phụ kiện gồm: sạc, cable, tai nghe, sách hướng dẫn.', 'Huawei-Nova-3.jpg'),
(32, 4, 'Xiaomi Redmi Note 7 Chính Hãng DGW Ram 3GB / 32GB', 3990000, 'Thông tin sản phẩm:\r\nRedmi Note 7 là chiếc smartphone mới nhất của Xiaomi vừa được ra mắt tại Việt Nam. Màn hình được thiết kế theo kiểu giọt nước ấn tượng,trang bị camera cực khủng lên tới 48 MP, bộ ', 'Xiaomi-Redmi-Note-7-Gradient.png'),
(33, 4, 'Xiaomi Black Shark 2 128GB Ram 6GB', 11390000, 'Thông tin sản phẩm: Xiaomi Black Shark 2 được trang bị một cấu hình mạnh mẽ, thiết kế hầm hố cùng với rất nhiều công nghệ tối ưu cho việc chơi game. Sản Phẩm full hộp. Bộ phụ kiện chuẩn gồm: Thân máy,', 'Blackshark-2-đen.png'),
(34, 4, 'Xiaomi Redmi Note 6 Pro 64Gb / 4Gb', 4290000, 'Thông tin sản phẩm:Redmi Note 6 Pro là phiên bản nâng cấp hoàn hảo của chiếc Redmi Note 5 Pro mạnh mẽ. Máy được trang bị 4 Camera gồm: Camera kép AI đi kèm cụm camera kép Selfie góc rộng và màn hình t', 'Redmi-Note-5-Pro-Đen.png'),
(35, 4, 'Xiaomi Mi 9 Ram 6Gb 128GB', 10590000, 'Xiaomi Mi 9 sở hữu thiết kế đơn giản, tinh tế với nhiều màu sắc khác nhau. Lưng máy được trang bị kính cường lực Gorilla Glass 5 có thể  tạo ra hình ảnh 3 chiều và thay đổi màu sắc rất đẹp mắt khi có ', 'thumbMi9_1.jpg'),
(36, 4, 'Xiaomi Mi 9 sở hữu thiết kế đơn giản, tinh tế với nhiều màu sắc khác nhau. Lưng máy được trang bị kí', 4290000, 'Xiaomi Redmi Note 6 Pro được xem là phiên bản “kế nhiệm” hoàn hảo cho Redmi Note 5 với nhiều điểm “sáng” hấp dẫn. Chiếc smartphone này sở hữu thiết kế trẻ trung, hiện đại nhưng không kém phần sang trọ', 'thumb_RMN6_Pro_1.jpg'),
(37, 4, 'Xiaomi Redmi 7 Ram 2GB / 16GB', 2690000, 'Thông tin sản phẩm:\r\nRedmi 7 là bản rút gọi của dòng Redmi Note 7,Redmi 7 dùng màn hình LCD 6.26 inch, nhỏ hơn một chút so với Redmi Note 7. Độ phân giải của màn hình là HD+ trong k', 'Xiaomi-Redmi-7-Đỏ.png'),
(38, 2, 'Samsung Galaxy A50', 6990000, 'Samsung Galaxy A50 là chiếc smartphone tầm trung mới của Samsung trong năm 2019 với nhiều tính năng hấp dẫn, đặc biệt là có cả cảm biến vân tay dưới màn hình.', 'samsung-galaxy-a50-black-1-400x460.png'),
(39, 2, 'Samsung Galaxy S10', 17990000, 'Samsung Galaxy S10 là chiếc smartphone kỉ niệm 10 năm ngày kể từ ngày đầu tiên Samsung ra mắt chiếc Galaxy S và không phụ sự chờ đợi của người dùng thì Samsung Galaxy S10 thực sự rất ấn tượng.', 'samsung-galaxy-s10-white-400x460.png'),
(40, 5, 'Điện thoại OPPO F11', 7290000, 'OPPO F11 gây ấn tượng với người dùng bởi thiết kế màn hình tràn viền hình giọt nước và camera sau khủng đến 48 MP.\r\n', 'oppo-f11-mtp-400x460.png'),
(41, 6, 'Điện thoại Huawei P30 Lite', 6990000, 'Mới đây Huawei đã chính thức giới thiệu chiếc Huawei P30 Lite bên cạnh các sản phẩm khác trong dòng P30 series và chiếc smartphone được định hướng tới phân khúc tầm trung.', 'huawei-p30-lite-400x460.png'),
(42, 2, 'Điện thoại Samsung Galaxy A10', 3090000, 'Galaxy A10 - chiếc smartphone rẻ nhất ở dòng A của Samsung vừa được trình làng nhưng sở hữu nhiều đặc điểm ưu việt về thiết kế màn hình và hiệu năng với chip Exynos 7884.', 'samsung-galaxy-a10-red-docquyen-400x460.png'),
(43, 3, 'Điện thoại Nokia 8110 4G', 990000, 'Sẽ là những kí ức khó quên với những ai đã từng sở hữu những điện thoại \"vang danh một thời\" đến từ Nokia. Vì thế HMD đã mang đến người dùng một sự bất ngờ lớn khi hồi sinh điện thoại Nokia 8810 với t', 'nokia-8110-4g-gold-400x460.png'),
(44, 3, 'Điện thoại Nokia 106 (2018) Dual Sim', 440000, 'Nokia đã mang đến cho người dùng chiếc điện thoại phổ thông giá rẻ tiếp theo với cái tên Nokia 106 (2018) trong một thiết kế nhỏ gọn, đầm chắc và có thời lượng pin dùng ấn tượng.', 'nokia-106-2018-400x460.png'),
(45, 3, 'Điện thoại Nokia 230 (không tặng thẻ nhớ)', 1250000, 'Nokia 230 được trang bị khá nhiều tính năng hay ho, thiết kế đẹp cho người dùng yêu thích một chiếc điện thoại đẹp - đơn giản - tốt.', 'nokia-230-khong-the-blue-400x460.png'),
(46, 3, 'Điện thoại Nokia 2.1', 1790000, 'Mới đây thì Nokia đã tiếp tục tung ra chiếc điện thoại Nokia 2.1 - là phiên bản nâng cấp của Nokia 2 năm ngoái, hứa hẹn có những sự thay đổi và cải tiến hợp xu hướng.', 'nokia-3.1-plus-1.png'),
(47, 1, 'Điện thoại iPhone X 64GB', 22990000, 'iPhone X là cụm từ được rất nhiều người mong chờ muốn biết và tìm kiếm trên Google bởi đây là chiếc điện thoại mà Apple kỉ niệm 10 năm iPhone đầu tiên được bán ra.', 'iphone-x-64gb-1-400x460.png'),
(49, 1, 'Điện thoại iPhone Xr 128GB', 19900000, 'Được xem là phiên bản iPhone giá rẻ đầy hoàn hảo, iPhone Xr 128GB khiến người dùng có nhiều sự lựa chọn hơn về màu sắc đa dạng nhưng vẫn sở hữu cấu hình mạnh mẽ và thiết kế sang trọng.', 'iphone-xr-128gb-red-400x460.png'),
(50, 1, 'Điện thoại iPhone 7 Plus 32GB', 13990000, 'Mặc dù giữ nguyên vẻ bề ngoài so với dòng điện thoại iPhone đời trước, bù lại iPhone 7 Plus 32GB lại được trang bị nhiều nâng cấp đáng giá như camera kép đầu tiên cũng như cấu hình mạnh mẽ.\r\n', 'iphone-7-plus-gold-400x460.png'),
(51, 1, 'Điện thoại iPhone Xs 256GB', 32990000, 'Chiếc điện thoại iPhone mới đã chính thức được ra mắt vào đêm 12/9 theo giờ Việt Nam, trong đó có phiên bản iPhone Xs 256GB với bộ nhớ khủng, cấu hình mạnh mẽ với chip Apple A12 và những tính năng đẳn', 'iphone-xs-256gb-white-400x460.png'),
(52, 1, 'iPhone 6S Plus 16Gb', 5490000, 'Thông tin sản phẩm:iPhone 6S Plus cũ bản quốc tế cũ đẹp như mới ( nguyên bản 100%, đẹp long lanh không móp méo, cấn xước) xuất xứ từ Mỹ, Nhật, Sing...Sản phẩm được test rất kĩ qua quy trình 21 bước ch', 'iphone6s-plus-rosegold.png'),
(53, 1, 'iPhone 5S 16GB', 2390000, 'Thông tin sản phẩm: iPhone 5S quốc tế cũ đẹp như mới, cam kết chỉ bán iPhone nguyên bản. Được tặng kèm sạc, cable Titan 1 đổi 1 12 tháng. Bộ phụ kiện chuẩn gồm: sạc, cable Titan, que chọc sim, dán màn', '5SWHITE.png'),
(54, 5, 'Điện thoại OPPO A7 32GB', 3990000, 'OPPO luôn mang có sự thay đổi trong thiết kế mới và chiếc điện thoại OPPO A7 đã đem đến cho người dùng những màu sắc mới đáng để lựa chọn với mặt lưng 3D cùng màn hình giọt nước siêu tràn viền.', 'oppo-a7-32gb-gold-400x460.png'),
(55, 6, 'Điện thoại Huawei Nova 3i', 5990000, 'Với những smartphone như Nova 2i hay Nova 3e thì Huawei đã và đang tạo nên những cơn sốt rất lớn trong phân khúc tầm trung và cái tên mới Huawei Nova 3i được cải tiến và nâng cấp nhiều điểm mới, hứa h', 'huawei-nova-3i-trang-400x460.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(10) NOT NULL,
  `tendangnhap` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `Gmail` varchar(100) NOT NULL,
  `SDT` varchar(11) NOT NULL,
  `Diachi` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `tendangnhap`, `matkhau`, `hoten`, `Gmail`, `SDT`, `Diachi`) VALUES
(1, 'huythang', 'a67b61c217d3c6f92ceca1827583436a', 'slkadgaklsj', 'huythang0903@gmail.com', '02147483647', 'Hồ chí minh'),
(2, 'thang', 'e10adc3949ba59abbe56e057f20f883e', 'huythng', 'huythag', '0', ''),
(5, 'Huythang123', 'e10adc3949ba59abbe56e057f20f883e', 'huythang', 'huythang0903@gmail.com', '0968798351', 'Hồ chí minh'),
(6, 'thang1', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Văn Bình', 'huythang@gmail.com', '0132849123', 'Hà nội'),
(7, 'dinhthien', 'e10adc3949ba59abbe56e057f20f883e', 'Trương Đình Thiện', 'dinhthien@gmail.com', '0123494123', 'An Dương Vương - Quận 5 - TP.Hồ chí minh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`idCTHD`),
  ADD KEY `idHD` (`idHD`),
  ADD KEY `idSP` (`idSP`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`idHD`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`idLH`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`idLSP`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`STT`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idSP`),
  ADD KEY `idLSP` (`idLSP`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `idCTHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `idHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `idLH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `idLSP` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`idSP`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`idHD`) REFERENCES `donhang` (`idHD`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`idLSP`) REFERENCES `loaisanpham` (`idLSP`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
