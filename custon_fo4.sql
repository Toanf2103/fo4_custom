-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 12, 2023 lúc 04:45 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `custon_fo4`
--

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_bangdiem` ()   SELECT fnc.*,IF(fnc.hieu_so_null is null, 0, fnc.hieu_so_null) as hieu_so, fnc.thang*3 + fnc.hoa as diem
FROM (SELECT id,ten, hinh_anh, get_sotran(id) as so_tran, get_sotranthang(id) as thang, get_sotranthua(id) as thua, get_sotran(id) - get_sotranthang(id) - get_sotranthua(id) as hoa, get_hieuso(id) as hieu_so_null
FROM user) as fnc
ORDER by diem DESC, hieu_so DESC$$

--
-- Các hàm
--
CREATE DEFINER=`root`@`localhost` FUNCTION `get_hieuso` (`id_team` INT) RETURNS INT(11)  BEGIN
    DECLARE hieu_so INT;
    
    SELECT sum(CASE
				WHEN id_team1 = id_team then diem_1 - diem_2
				WHEN id_team2 = id_team then diem_2 - diem_1
			END) INTO hieu_so
	from tran_dau
	WHERE (id_team1 = id_team or id_team2 = id_team)
		and diem_1 is not null
		and diem_2 is not null;
        
	RETURN hieu_so;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `get_sotran` (`id_team` INT) RETURNS INT(11)  BEGIN
    DECLARE sotran INT;
    
    SELECT count(*) INTO sotran
	from tran_dau
	WHERE (id_team1 = id_team or id_team2 = id_team)
		and diem_1 is not null
		and diem_2 is not null;
        
	RETURN sotran;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `get_sotranthang` (`id_team` INT) RETURNS INT(11)  BEGIN
    DECLARE sotranthang INT;
    
    SELECT COUNT(*) INTO sotranthang
    FROM tran_dau
    WHERE (id_team1 = id_team AND diem_1 > diem_2)
    	OR (id_team2 = id_team AND diem_1 < diem_2);
    
    RETURN sotranthang;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `get_sotranthua` (`id_team` INT) RETURNS INT(11)  BEGIN
    DECLARE sotranthua INT;
    
    SELECT COUNT(*) INTO sotranthua
    FROM tran_dau
    WHERE (id_team1 = id_team AND diem_1 < diem_2)
    	OR (id_team2 = id_team AND diem_1 > diem_2);
    
    RETURN sotranthua;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tran_dau`
--

CREATE TABLE `tran_dau` (
  `id` int(11) NOT NULL,
  `id_team1` int(11) NOT NULL,
  `id_team2` int(11) NOT NULL,
  `diem_1` int(11) DEFAULT NULL,
  `diem_2` int(11) DEFAULT NULL,
  `vong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tran_dau`
--

INSERT INTO `tran_dau` (`id`, `id_team1`, `id_team2`, `diem_1`, `diem_2`, `vong`) VALUES
(1, 6, 4, 1, 2, 1),
(2, 5, 2, 1, 3, 1),
(3, 0, 7, 1, 4, 1),
(4, 3, 1, 1, 5, 1),
(5, 2, 7, NULL, NULL, 2),
(6, 6, 1, NULL, NULL, 2),
(7, 4, 3, NULL, NULL, 2),
(8, 5, 0, NULL, NULL, 2),
(9, 4, 1, NULL, NULL, 3),
(10, 2, 0, NULL, NULL, 3),
(11, 6, 3, NULL, NULL, 3),
(12, 5, 7, NULL, NULL, 3),
(13, 5, 6, NULL, NULL, 4),
(14, 2, 4, NULL, NULL, 4),
(15, 7, 3, NULL, NULL, 4),
(16, 0, 1, NULL, NULL, 4),
(17, 0, 3, NULL, NULL, 5),
(18, 5, 4, NULL, NULL, 5),
(19, 7, 1, NULL, NULL, 5),
(20, 2, 6, NULL, NULL, 5),
(21, 7, 4, NULL, NULL, 6),
(22, 0, 6, NULL, NULL, 6),
(23, 2, 1, NULL, NULL, 6),
(24, 5, 3, NULL, NULL, 6),
(25, 2, 3, NULL, NULL, 7),
(26, 0, 4, NULL, NULL, 7),
(27, 7, 6, NULL, NULL, 7),
(28, 5, 1, NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinh_anh` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_fb` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diem` int(11) NOT NULL DEFAULT 0,
  `win` int(11) NOT NULL DEFAULT 0,
  `lose` int(11) NOT NULL DEFAULT 0,
  `draw` int(11) NOT NULL DEFAULT 0,
  `so_tran` int(11) NOT NULL DEFAULT 0,
  `gd` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `ten`, `doi`, `hinh_anh`, `link_fb`, `diem`, `win`, `lose`, `draw`, `so_tran`, `gd`) VALUES
(0, 'Phúc', 'Colombia', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrLQvsjNA1QVV3lf-qW5vSH8xmz_p5PhDNsw&usqp=CAU', '', 0, 0, 0, 0, 0, 0),
(1, 'Hoàng', 'Maroc', 'https://img.meta.com.vn/Data/image/2021/08/20/co-quoc-ky-cac-nuoc-the-gioi-33.jpg', '', 0, 0, 0, 0, 0, 0),
(2, 'Toàn', 'Nhật-Hàn', 'https://baothuathienhue.vn/image/fckeditor/upload/2022/20220905/images/NB.jpg', '', 0, 0, 0, 0, 0, 0),
(3, 'Bảo', 'Thụy sĩ', 'http://bannenbiet.com/wp-content/uploads/2019/08/la-co-thuy-si.jpg', '', 0, 0, 0, 0, 0, 0),
(4, 'Kỳ', 'Ý', 'https://media.bongda.com.vn/files/thanhdat.to/2017/10/03/figc-logo-2017-long-1031.jpg', '', 0, 0, 0, 0, 0, 0),
(5, 'Nhỏ', 'Tây Ban Nha', 'https://rozaco.vn/wp-content/uploads/2021/10/Logo-Tay-Ban-Nha.png', '', 0, 0, 0, 0, 0, 0),
(6, 'Shin', 'Bồ Ban Nha', 'https://i.pinimg.com/736x/2a/7d/4a/2a7d4a408195c618b3e410005d1ad202.jpg', '', 0, 0, 0, 0, 0, 0),
(7, 'Đô', 'Brazil', 'http://hinhdep.com.vn/wp-content/uploads/2013/08/brazil-flag-logo.jpg', '', 0, 0, 0, 0, 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tran_dau`
--
ALTER TABLE `tran_dau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_team1` (`id_team1`),
  ADD KEY `id_team2` (`id_team2`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tran_dau`
--
ALTER TABLE `tran_dau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tran_dau`
--
ALTER TABLE `tran_dau`
  ADD CONSTRAINT `tran_dau_ibfk_1` FOREIGN KEY (`id_team1`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tran_dau_ibfk_2` FOREIGN KEY (`id_team2`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
