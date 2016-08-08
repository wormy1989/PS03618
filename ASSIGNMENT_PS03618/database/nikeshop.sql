-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2015 at 09:15 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nikeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ContactID` int(100) NOT NULL,
  `ContactName` varchar(30) NOT NULL,
  `ContactEmail` varchar(50) NOT NULL,
  `ContactPhone` int(2) NOT NULL,
  `ContactMess` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderID` int(100) NOT NULL,
  `OrderDate` date NOT NULL,
  `Customer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderID`, `OrderDate`, `Customer`) VALUES
(1, '0000-00-00', 'VietHung'),
(2, '2015-12-03', 'admin'),
(3, '2015-12-03', 'admin'),
(4, '2015-12-03', 'admin'),
(5, '2015-12-03', 'user'),
(6, '2015-12-03', 'user'),
(7, '2015-12-03', 'user'),
(8, '2015-12-03', 'user'),
(9, '2015-12-03', 'user'),
(10, '2015-12-03', 'user'),
(11, '2015-12-03', 'user'),
(12, '2015-12-03', 'user'),
(13, '2015-12-03', 'user'),
(14, '2015-12-03', 'user'),
(15, '2015-12-03', 'user'),
(16, '2015-12-03', 'user'),
(17, '2015-12-03', 'user'),
(18, '2015-12-03', 'user'),
(19, '2015-12-03', 'user'),
(20, '2015-12-03', 'user'),
(21, '2015-12-03', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderID` int(100) NOT NULL,
  `ProductID` int(100) NOT NULL DEFAULT '0',
  `ProductPrice` int(11) DEFAULT NULL,
  `Quanity` int(11) DEFAULT NULL,
  `Totals` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`OrderID`, `ProductID`, `ProductPrice`, `Quanity`, `Totals`) VALUES
(1, 12, 560, 1, 560);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(100) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductImage` varchar(255) NOT NULL,
  `ProductPrice` int(11) NOT NULL,
  `ProductDesc` text NOT NULL,
  `ProductGroup` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `ProductImage`, `ProductPrice`, `ProductDesc`, `ProductGroup`) VALUES
(1, 'Nike Orange', 'product1.jpg', 380, 'Sản phẩm giầy thể thao của Nike. Thích hợp với các mon thể thao chạy bộ, đá bóng, cầu lông, với các màu sắc bắt mắt và trẻ trung cũng như sang trọng thích hợp và nhiều đối tượng sử dụng.', ''),
(2, 'Nike Yellow', 'product2.jpg', 390, 'Sản phẩm giầy thể thao của Nike. Thích hợp với các mon thể thao chạy bộ, đá bóng, cầu lông, với các màu sắc bắt mắt và trẻ trung cũng như sang trọng thích hợp và nhiều đối tượng sử dụng.', ''),
(3, 'Nike Blue', 'product3.jpg', 420, 'Sản phẩm giầy thể thao của Nike. Thích hợp với các mon thể thao chạy bộ, đá bóng, cầu lông, với các màu sắc bắt mắt và trẻ trung cũng như sang trọng thích hợp và nhiều đối tượng sử dụng.', ''),
(4, 'Nike Black', 'product4.jpg', 330, 'Sản phẩm giầy thể thao của Nike. Thích hợp với các mon thể thao chạy bộ, đá bóng, cầu lông, với các màu sắc bắt mắt và trẻ trung cũng như sang trọng thích hợp và nhiều đối tượng sử dụng.', ''),
(5, 'Nike Sky', 'product5.jpg', 480, 'Sản phẩm giầy thể thao của Nike. Thích hợp với các mon thể thao chạy bộ, đá bóng, cầu lông, với các màu sắc bắt mắt và trẻ trung cũng như sang trọng thích hợp và nhiều đối tượng sử dụng.', ''),
(6, 'Nike Green', 'product6.jpg', 410, 'Sản phẩm giầy thể thao của Nike. Thích hợp với các mon thể thao chạy bộ, đá bóng, cầu lông, với các màu sắc bắt mắt và trẻ trung cũng như sang trọng thích hợp và nhiều đối tượng sử dụng.', ''),
(7, 'Nike Slim Orange ', 'product1.jpg', 380, 'Sản phẩm giầy thể thao của Nike. Thích hợp với các mon thể thao chạy bộ, đá bóng, cầu lông, với các màu sắc bắt mắt và trẻ trung cũng như sang trọng thích hợp và nhiều đối tượng sử dụng.', ''),
(8, 'Nike Slim Yellow ', 'product2.jpg', 390, 'Sản phẩm giầy thể thao của Nike. Thích hợp với các mon thể thao chạy bộ, đá bóng, cầu lông, với các màu sắc bắt mắt và trẻ trung cũng như sang trọng thích hợp và nhiều đối tượng sử dụng.', ''),
(9, 'Nike Slim Blue', 'product3.jpg', 490, 'Sản phẩm giầy thể thao của Nike. Thích hợp với các mon thể thao chạy bộ, đá bóng, cầu lông, với các màu sắc bắt mắt và trẻ trung cũng như sang trọng thích hợp và nhiều đối tượng sử dụng.', ''),
(10, 'Nike Slim Black', 'product4.jpg', 310, 'Sản phẩm giầy thể thao của Nike. Thích hợp với các mon thể thao chạy bộ, đá bóng, cầu lông, với các màu sắc bắt mắt và trẻ trung cũng như sang trọng thích hợp và nhiều đối tượng sử dụng.', ''),
(11, 'Nike Slim Sky', 'product5.jpg', 510, 'Sản phẩm giầy thể thao của Nike. Thích hợp với các mon thể thao chạy bộ, đá bóng, cầu lông, với các màu sắc bắt mắt và trẻ trung cũng như sang trọng thích hợp và nhiều đối tượng sử dụng.', ''),
(12, 'Nike Slim Green', 'product6.jpg', 580, 'Sản phẩm giầy thể thao của Nike. Thích hợp với các mon thể thao chạy bộ, đá bóng, cầu lông, với các màu sắc bắt mắt và trẻ trung cũng như sang trọng thích hợp và nhiều đối tượng sử dụng.', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Fullname`, `Email`, `Phone`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', 12345),
(2, 'user', 'user', 'user', 'user@gmail.com', 12345),
(6, '1', '1', '1', '1', 12345),
(10, '', '', '', '', 0),
(11, 'aaaa', 'aaaa', 'aaaa', 'aaaa', 12345);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ContactID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`),
  ADD UNIQUE KEY `OrderID` (`OrderID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderID`,`ProductID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ContactID` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `OrderID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
