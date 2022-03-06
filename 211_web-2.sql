-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2021 lúc 02:25 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `211_web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog`
--

CREATE TABLE `catalog` (
  `catalogname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Chỉ mục';

--
-- Đang đổ dữ liệu cho bảng `catalog`
--

INSERT INTO `catalog` (`catalogname`) VALUES
('Kẻ mày'),
('Kem chống nắng'),
('Kem dưỡng ẩm'),
('Kem lót'),
('Kem nền'),
('Kem trang điểm'),
('Mascara'),
('Nước tẩy trang'),
('Phấn má'),
('Phấn phủ'),
('Son môi'),
('Sữa rửa mặt'),
('Tẩy da chết'),
('Toner');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `feedbackid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `star` tinyint(4) NOT NULL COMMENT 'số sao đánh giá từ 1-5',
  `comment` varchar(200) NOT NULL COMMENT 'Bình luận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='phản hồi cho đơn hàng';

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`feedbackid`, `orderid`, `productid`, `star`, `comment`) VALUES
(0, 1, 34, 4, 'Sản phẩm tốt, sài rất ưng tuy nhiên giá hơi cao'),
(1, 2, 33, 5, 'Sản phẩm tốt, hợp với tầm giá, nên mua'),
(2, 1, 33, 3, 'đẹp lắm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `orderid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `status` tinyint(10) DEFAULT 0 COMMENT '0: chưa xác nhận, 1: đang đóng gói, 2: đang vận chuyển, 3:đang giao hàng, 4: Đã giao hàng, 5: Đã hủy đơn',
  `reason` varchar(100) DEFAULT NULL COMMENT 'Lý do hủy đơn',
  `address` varchar(100) NOT NULL,
  `shipfee` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='don hang';

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`orderid`, `username`, `status`, `reason`, `address`, `shipfee`) VALUES
(1, 'hao', 5, 'Admin hủy đơn hàng khi: \n						Đang giao hàng					', 'Đăk Lăk', 20000),
(2, 'hao', 3, NULL, 'Đăk Lăk', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `price` int(11) NOT NULL COMMENT 'giá bán cuối',
  `quantity` int(10) NOT NULL COMMENT 'số lượng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Chi tiết đơn hàng';

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`orderid`, `productid`, `price`, `quantity`) VALUES
(1, 33, 111000, 1),
(1, 34, 320000, 2),
(2, 33, 120000, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `postid` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `priority` int(5) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0' COMMENT 'full name of employee',
  `datecreated` varchar(255) DEFAULT current_timestamp() COMMENT 'Ngày tạo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`postid`, `title`, `priority`, `status`, `datecreated`) VALUES
(2, 'Nên ngủ sớm', 3, '0', '2021-11-26 08:38:03'),
(3, 'Không nên lạm dụng kem trang điểm đe', 1, '1', '2021-11-26 09:05:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng còn lại trong kho',
  `promotion` int(10) DEFAULT 0 COMMENT 'Đơn vị %, giá trị 0-100',
  `catalog` varchar(100) DEFAULT NULL COMMENT 'loại sản phẩm gì?',
  `descri` varchar(2000) NOT NULL COMMENT 'mỗi dòng cách nhau bởi dấu phẩy'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Sản phẩm';

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`productid`, `title`, `price`, `quantity`, `promotion`, `catalog`, `descri`) VALUES
(33, 'Kem trang điểm đen', 300000, 10, 50, 'Kem trang điểm', '<ul><li>Đẹp</li><li>Xịn</li></ul>'),
(34, 'Son môi lỳ mới nhất', 325999, 100, 10, 'Son môi', '<ul><li>Rẻ, Dễ sử dụng</li><li>Giữ màu tốt</li></ul>'),
(35, 'Kem chống nắng NovAge Day Shield', 499000, 23, 10, 'Kem chống nắng', 'Nhiều chị em rất băn khoăn không biết nên chọn loại nào thì mình đề cử kem chống nắng NovAge Day Shield SPF50 UVA/PA++++ Advanced Skin Protector. Với chỉ số SPF 50 giúp bảo vệ làn da tối đa khỏi tác động của nắng, bên cạnh đó thì còn giúp dưỡng da rất hiệu quả. Chị em cứ trải nghiệm mà dùng thử nhé, chắc chắn sẽ thích mê mà thôi.'),
(36, 'Kem Chống Nắng Vaseline', 150000, 10, 0, 'Kem chống nắng', '<ol><li>Chứa thành phần Petroleum jelly giúp dưỡng ẩm và làm dịu da từ bên trong. Xoa dịu làn da và duy trì làn da tươi tắn cả ngày da</li><li>Lớp kem mỏng, nhẹ. Thoải mái trên da bảo vệ da khỏi khô rát dưới ánh nắng</li><li>Chống lại tác hại của tia UVA/UVB. Hạn chế dấu hiệu lão hóa từ bên trong</li><li>Kem thẩm thấu nhanh, không gây nhờn rít khó chịu</li></ol>'),
(37, 'Kem chống nắng Sunright', 750000, 10, 0, 'Kem chống nắng', '<ul><li>Bào vệ làn da khỏi các tia bức xạ phổ rộng UVA và UVB.</li><li>Cung cấp lợi ích chống lão hóa lâu dài cho làn da.</li><li>&nbsp;Bảo vệ da khỏi ánh nắng mặt trời và các yếu tố môi trường ảnh hưởng khác của môi trường.</li><li>Công thức phù hợp với tất cả mọi người</li><li>Có khả năng dưỡng ẩm tốt và không gây nhờn rít cho da.</li></ul>'),
(38, 'Phấn má The ONE Make-up Pro ', 120000, 24, 12, 'Phấn má', 'Phấn mắt The One chinh phục chị em bởi sự đa dạng về những tông màu đang rất được yêu thích. Bạn có thể dùng phấn ở dạng khô hoặc dạng ướt để mang lại hiệu ứng lì và nhũ khác biệt theo tuỳ dịp makeup nhé. Thêm vào đó phấn còn có thành phần là dầu Argan và vitamin E giúp dưỡng vùng da mắt. Để lại sự ấn tượng khó phai đối với người đối diện.'),
(39, 'Phấn má hồng ngọc trai Giordani Gold Bronzing Pearls Oriflame', 670000, 16, 13, 'Phấn má', 'Chỉ cần đánh nhẹ phấn lên vùng má là bạn đã cảm nhận được sự rạng rỡ trên gương mặt. Tông màu tươi tắn và sang trọng giúp tạo khối, độ ẩm. Trong thành phần mỗi hạt phấn còn giúp dưỡng da. Mang lại cho bạn làn da bắt sáng, thu hút mọi  ánh nhìn.'),
(40, 'Kem lót The ONE Everlasting Make Up Setting Mist Oriflame', 260000, 11, 0, 'Kem lót', '<ul><li>Trong suốt giúp sử dụng dễ dàng với mọi loại da</li><li>Khả năng giữ lâu trôi lớp trang điểm tốt</li><li>Giá cả phải chăng</li><li>Thiết kế nhỏ gọn, đẹp mắt</li></ul>'),
(41, 'Kem lót Giordani Gold Youthful Radiance Elixir Primer Oriflame', 370000, 12, 0, 'Kem lót', '<ul><li>Tạo hiệu ứng hạt nhũ trên da trẻ trung</li><li>Kem tán rất mịn và dễ dàng</li><li>Kết cấu kem sánh và ổn định không quá đặc</li><li>Tạo nên một lớp lót hoàn hảo cho da trở nên rạng rỡ và mịn màng hẳn</li><li>Thành phần an toàn</li><li>Giữ lâu trôi lớp make up tốt.</li></ul>'),
(42, 'Kem lót OnColour Peach Glow Perfector', 100000, 20, 0, 'Kem lót', '<ol><li>Kem lót với chiết xuất từ tinh dầu Đào và vitamin C giúp dưỡng ẩm và nâng tông da. Kem lót là bước đầu tiên của trang trang điểm mà có nhiều chị em vẫn chưa tìm được loại kem lót phù hợp với làn da của mình. Mình thì hoàn toàn bị chinh phục bởi em kem lót OnColour Peach Glow Perfector. Thoang thoảng mùi thơm của đào mà lại giúp dưỡng ẩm và che phủ cho da tốt.</li><li>&nbsp;Vitamin C giúp nuôi dưỡng một làn da trắng sáng. Trong đào có nhiều dưỡng chất giúp dưỡng ẩm cho làn da, khiến da bạn lúc nào cũng mềm mịn như da em bé. Bên cạnh đó là còn làm mờ nhanh các vết thâm nám, giúp làn da đều màu hơn.</li></ol>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `imgcode` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `priority` varchar(100) NOT NULL COMMENT 'Độ ưu tiên xuất hiện',
  `type` int(11) NOT NULL COMMENT '0 cho product, 1 cho feedback'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Hình ảnh cho sản phẩm';

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`imgcode`, `productid`, `priority`, `type`) VALUES
(28256, 33, '0', 0),
(28257, 33, '1', 0),
(28258, 34, '0', 0),
(28259, 34, '1', 0),
(28260, 34, '2', 0),
(28261, 33, '0', 1),
(28262, 33, '0', 1),
(28263, 35, '0', 0),
(28264, 35, '1', 0),
(28265, 35, '2', 0),
(28266, 35, '3', 0),
(28267, 35, '4', 0),
(28268, 36, '0', 0),
(28269, 36, '1', 0),
(28270, 36, '2', 0),
(28271, 38, '0', 0),
(28272, 38, '1', 0),
(28273, 38, '2', 0),
(28274, 39, '0', 0),
(28275, 39, '1', 0),
(28276, 39, '2', 0),
(28277, 40, '0', 0),
(28278, 40, '1', 0),
(28279, 40, '2', 0),
(28280, 41, '0', 0),
(28281, 41, '1', 0),
(28282, 41, '2', 0),
(28283, 42, '0', 0),
(28284, 42, '1', 0),
(28285, 42, '2', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `accounttype` tinyint(4) DEFAULT 0 COMMENT '0: default, 1: admin',
  `password` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: hoat dong, 1: bi khoa',
  `lastlogin` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Thong tin nguoi dung';

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username`, `name`, `phone_number`, `email`, `accounttype`, `password`, `status`, `lastlogin`) VALUES
('a1', 'Phạm H', '0346148097', 'haovts123@gmail.adu', 0, 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 0, '2021-11-27 16:23:42'),
('admin', 'Admin', '0123456789', 'admin@web', 1, '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 1, '2021-10-19 11:40:11'),
('anhduc', 'Anh Đức', '123456789', 'duc', 0, 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', 0, '2021-11-27 16:40:09'),
('cc', '1', '1', '1', 0, '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 0, '2021-11-27 18:47:53'),
('hao', 'Pham hao', '0346148097', 'haovts123@gmail.com', 0, '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 0, '2021-11-22 22:49:28'),
('hao.phambk', 'Hào Phạm Chí', '0346148097', 'haovts123@gmail.com', 0, '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 0, '2021-11-24 02:41:34'),
('hao.phambk1', 'Hào Phạm Chí', '0346148097', 'haovts123@gmail.com', 0, '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 0, '2021-11-24 02:42:43'),
('hao.phambk4', 'Hào Phạm Chí', '0346148097', 'haovts123@gmail.com', 0, '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 0, '2021-11-24 16:13:41'),
('hao.phambkav', 'Hào Phạm Chí', '0346148097', 'haovts123@gmail.com', 1, '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 0, '2021-11-25 01:55:33'),
('haoa', 'Phạm Hào', '0346148097', 'haovts123@gmail.cut', 0, 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 0, '2021-11-27 17:32:40'),
('haook', 'Hào Phạm Chí', '0346148097', 'haovts123@gmail.com', 1, '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 0, '2021-11-24 22:59:36'),
('haooo', 'Phạm Hào', '0346148097', 'haovts123@gmail.a', 0, 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 0, '2021-11-27 17:07:10');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`catalogname`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackid`),
  ADD KEY `fk_feedback_orderdetail` (`orderid`,`productid`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `fk_feedback_username` (`username`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderid`,`productid`),
  ADD KEY `fk_orderdetail_product` (`productid`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postid`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `fk_product_catalog` (`catalog`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`imgcode`),
  ADD KEY `fk_product_image_product` (`productid`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `postid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `imgcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28288;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_orderdetail` FOREIGN KEY (`orderid`,`productid`) REFERENCES `orderdetail` (`orderid`, `productid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_feedback_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `fk_orderdetail_order` FOREIGN KEY (`orderid`) REFERENCES `order` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orderdetail_product` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_catalog` FOREIGN KEY (`catalog`) REFERENCES `catalog` (`catalogname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `fk_product_image_product` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
