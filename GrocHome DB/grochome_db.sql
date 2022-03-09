-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2020 at 10:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grochome db`
--

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `cust_Email` varchar(60) NOT NULL,
  `cust_Name` varchar(44) NOT NULL,
  `cust_PhoneNo` varchar(20) NOT NULL,
  `cust_Password` varchar(8) NOT NULL,
  `cust_Address` varchar(44) NOT NULL,
  `cust_City` varchar(15) NOT NULL,
  `cust_PostalCode` varchar(7) NOT NULL,
  `cust_State` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`cust_Email`, `cust_Name`, `cust_PhoneNo`, `cust_Password`, `cust_Address`, `cust_City`, `cust_PostalCode`, `cust_State`) VALUES
('gc@admin.com', 'admin', '0123456789', 'gcadmin1', 'Grochome', 'Grochome', 'Grochom', 'Grochome'),
('hamidah22@gmail.com', 'Hamidah Binti Hamid', '0161754228', 'hamidah', 'No 331 Jalan Sungai Besi', 'Taiping', '34000', 'Taiping'),
('lails122@tuts.com', 'Laila Majnum', '0112341547', 'missLai', 'No 67, Jalan Kampung Baru ', 'Seremban', '15000', 'Kota Bahru'),
('nazrin@gmail.com', 'nazrin', '0123456789', '12345', 'belakang masjid', 'jitra', '12345', 'kedah'),
('nuradilah778@gmail.com', 'Siti Nur A\'dilah', '0166193667', 'adel444', '16 Avenue', 'Manchester', 'SE2', 'London');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `Order_ID` varchar(20) NOT NULL,
  `Cust_Email` varchar(60) NOT NULL,
  `Total_Pay` decimal(6,2) NOT NULL,
  `Order_Date` date NOT NULL,
  `Payment_Method` varchar(30) NOT NULL,
  `Shipping_Name` varchar(255) NOT NULL,
  `Shipping_Address` varchar(300) NOT NULL,
  `Parcel_No` varchar(100) NOT NULL,
  `Order_Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`Order_ID`, `Cust_Email`, `Total_Pay`, `Order_Date`, `Payment_Method`, `Shipping_Name`, `Shipping_Address`, `Parcel_No`, `Order_Status`) VALUES
('GH-1593027744', 'nazrin@gmail.com', '143.00', '2020-06-24', 'Online banking', 'nazrin', 'belakang masjid, 12345 jitra, kedah', 'MAS-47468-GH', 'Received'),
('GH-1593027778', 'nazrin@gmail.com', '143.00', '2020-06-24', 'Online banking', 'nazrin', 'belakang masjid, 12345 jitra, kedah', 'MAS-59171-GH', 'Processing'),
('GH-1593027835', 'nazrin@gmail.com', '143.00', '2020-06-24', 'Online banking', 'nazrin', 'belakang masjid, 12345 jitra, kedah', 'MAS-71971-GH', 'Processing'),
('GH-1593159066', 'nazrin@gmail.com', '138.37', '2020-06-26', 'Online banking', 'nazrin', 'belakang masjid, 12345 jitra, kedah', 'MAS-18319-GH', 'To Ship');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `itemID` int(11) NOT NULL,
  `Order_ID` varchar(20) NOT NULL,
  `Product_ID` varchar(7) NOT NULL,
  `Quantity` int(6) NOT NULL,
  `Total_Price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`itemID`, `Order_ID`, `Product_ID`, `Quantity`, `Total_Price`) VALUES
(5, 'GH-1593018200', 'ms01', 2, '28.90'),
(6, 'GH-1593018200', 'fc01', 2, '11.98'),
(7, 'GH-1593018200', 'bn03', 2, '21.98'),
(8, 'GH-1593018200', 'hh01', 2, '39.98'),
(9, 'GH-1593019820', 'ms01', 2, '28.90'),
(10, 'GH-1593019820', 'fc01', 2, '11.98'),
(11, 'GH-1593019820', 'bn03', 2, '21.98'),
(12, 'GH-1593019820', 'hh01', 2, '39.98'),
(13, 'GH-1593019837', 'ms01', 2, '28.90'),
(14, 'GH-1593019837', 'fc01', 2, '11.98'),
(15, 'GH-1593019837', 'bn03', 2, '21.98'),
(16, 'GH-1593019837', 'hh01', 2, '39.98'),
(17, 'GH-1593020322', 'ms01', 2, '28.90'),
(18, 'GH-1593020322', 'fc01', 2, '11.98'),
(19, 'GH-1593020322', 'bn03', 2, '21.98'),
(20, 'GH-1593020322', 'hh01', 2, '39.98'),
(21, 'GH-1593020334', 'ms01', 2, '28.90'),
(22, 'GH-1593020334', 'fc01', 2, '11.98'),
(23, 'GH-1593020334', 'bn03', 2, '21.98'),
(24, 'GH-1593020334', 'hh01', 2, '39.98'),
(25, 'GH-1593020484', 'ms02', 2, '26.20'),
(26, 'GH-1593020484', 'fc02', 2, '41.60'),
(27, 'GH-1593020484', 'hh02', 2, '22.60'),
(28, 'GH-1593020502', 'ms02', 2, '26.20'),
(29, 'GH-1593020502', 'fc02', 2, '41.60'),
(30, 'GH-1593020502', 'hh02', 2, '22.60'),
(31, 'GH-1593020581', 'ms02', 2, '26.20'),
(32, 'GH-1593020581', 'fc02', 2, '41.60'),
(33, 'GH-1593020581', 'hh02', 2, '22.60'),
(34, 'GH-1593020713', 'ms02', 2, '26.20'),
(35, 'GH-1593020713', 'fc02', 2, '41.60'),
(36, 'GH-1593020713', 'hh02', 2, '22.60'),
(37, 'GH-1593020719', 'ms02', 2, '26.20'),
(38, 'GH-1593020719', 'fc02', 2, '41.60'),
(39, 'GH-1593020719', 'hh02', 2, '22.60'),
(40, 'GH-1593020766', 'ms02', 2, '26.20'),
(41, 'GH-1593020766', 'fc02', 2, '41.60'),
(42, 'GH-1593020766', 'hh02', 2, '22.60'),
(43, 'GH-1593020793', 'ms02', 2, '26.20'),
(44, 'GH-1593020793', 'fc02', 2, '41.60'),
(45, 'GH-1593020793', 'hh02', 2, '22.60'),
(46, 'GH-1593020962', 'ms02', 2, '26.20'),
(47, 'GH-1593020962', 'fc02', 2, '41.60'),
(48, 'GH-1593020962', 'hh02', 2, '22.60'),
(49, 'GH-1593021029', 'ms02', 2, '26.20'),
(50, 'GH-1593021029', 'fc02', 2, '41.60'),
(51, 'GH-1593021029', 'hh02', 2, '22.60'),
(52, 'GH-1593021035', 'ms02', 2, '26.20'),
(53, 'GH-1593021035', 'fc02', 2, '41.60'),
(54, 'GH-1593021035', 'hh02', 2, '22.60'),
(55, 'GH-1593021126', 'ms02', 2, '26.20'),
(56, 'GH-1593021126', 'fc02', 2, '41.60'),
(57, 'GH-1593021126', 'hh02', 2, '22.60'),
(58, 'GH-1593021365', 'ms02', 2, '26.20'),
(59, 'GH-1593021365', 'fc02', 2, '41.60'),
(60, 'GH-1593021365', 'hh02', 2, '22.60'),
(61, 'GH-1593021463', 'ms02', 2, '26.20'),
(62, 'GH-1593021463', 'fc02', 2, '41.60'),
(63, 'GH-1593021463', 'hh02', 2, '22.60'),
(64, 'GH-1593022248', 'ms02', 2, '26.20'),
(65, 'GH-1593022248', 'fc02', 2, '41.60'),
(66, 'GH-1593022248', 'hh02', 2, '22.60'),
(67, 'GH-1593024084', 'ms02', 2, '26.20'),
(68, 'GH-1593024084', 'fc02', 2, '41.60'),
(69, 'GH-1593024084', 'hh02', 2, '22.60'),
(70, 'GH-1593025887', 'fc03', 2, '21.58'),
(71, 'GH-1593025887', 'ms04', 2, '26.00'),
(72, 'GH-1593026065', 'fc03', 2, '21.58'),
(73, 'GH-1593026065', 'ms04', 2, '26.00'),
(74, 'GH-1593027520', 'fc03', 2, '21.58'),
(75, 'GH-1593027520', 'ms04', 2, '26.00'),
(76, 'GH-1593027627', 'fc03', 2, '21.58'),
(77, 'GH-1593027627', 'ms04', 2, '26.00'),
(78, 'GH-1593027651', 'fc03', 2, '21.58'),
(79, 'GH-1593027651', 'ms04', 2, '26.00'),
(80, 'GH-1593027711', 'bn01', 55, '143.00'),
(81, 'GH-1593027744', 'bn01', 55, '143.00'),
(82, 'GH-1593027778', 'bn01', 55, '143.00'),
(83, 'GH-1593027835', 'bn01', 55, '143.00'),
(84, 'GH-1593060116', 'bn04', 2, '11.00'),
(85, 'GH-1593060116', 'hh04', 1, '5.00'),
(86, 'GH-1593065828', 'bn04', 2, '11.00'),
(87, 'GH-1593065828', 'hh04', 1, '5.00'),
(88, 'GH-1593065861', 'bn04', 2, '11.00'),
(89, 'GH-1593065861', 'hh04', 1, '5.00'),
(90, 'GH-1593065895', 'bn04', 2, '11.00'),
(91, 'GH-1593065895', 'hh04', 1, '5.00'),
(92, 'GH-1593066081', 'bn04', 2, '11.00'),
(93, 'GH-1593066081', 'hh04', 1, '5.00'),
(94, 'GH-1593159066', 'ms01', 5, '72.25'),
(95, 'GH-1593159066', 'bn01', 7, '18.20'),
(96, 'GH-1593159066', 'fc01', 8, '47.92'),
(97, 'GH-1593227534', 'ms01', 2, '28.90'),
(98, 'GH-1593227534', 'bn01', 4, '10.40'),
(99, 'GH-1593227534', 'fc01', 4, '23.96'),
(100, 'GH-1593231403', 'ms01', 3, '43.35'),
(101, 'GH-1593231465', 'ms01', 3, '43.35'),
(102, 'GH-1593231465', 'ms01', 3, '43.35'),
(103, 'GH-1593231825', 'ms01', 3, '43.35'),
(104, 'GH-1593237946', 'bn01', 3, '7.80'),
(105, 'GH-1593237946', 'fc01', 3, '17.97'),
(106, 'GH-1593237946', 'hh01', 3, '59.97'),
(107, 'GH-1593238915', 'ms01', 3, '43.35'),
(108, 'GH-1593238915', 'bn01', 3, '7.80'),
(109, 'GH-1593240508', 'bn02', 4, '6.00'),
(110, 'GH-1593240508', 'fc01', 4, '23.96'),
(111, 'GH-1593240508', 'hh01', 4, '79.96');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_ID` varchar(20) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `CC_Number` varchar(16) DEFAULT NULL,
  `Month` varchar(20) DEFAULT NULL,
  `Year` varchar(4) DEFAULT NULL,
  `CVV` varchar(3) DEFAULT NULL,
  `Date_Pay` date DEFAULT NULL,
  `Total_Pay` decimal(6,2) DEFAULT NULL,
  `Payment_Method` varchar(20) DEFAULT NULL,
  `Bank_Type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_ID`, `Name`, `CC_Number`, `Month`, `Year`, `CVV`, `Date_Pay`, `Total_Pay`, `Payment_Method`, `Bank_Type`) VALUES
('GH-1593004991', 'nazrin', '123456789876543', 'mac', '2020', '123', '2020-06-24', '89.99', 'Credit Card', 'None'),
('GH-1593011814', 'None', 'None', 'None', 'None', 'Non', '2020-06-24', '40.43', 'Online banking', 'CIMB Bank'),
('GH-1593017168', 'None', 'None', 'None', 'None', 'Non', '2020-06-24', '72.64', 'Online banking', 'Maybank'),
('GH-1593018200', 'None', 'None', 'None', 'None', 'Non', '2020-06-24', '102.84', 'Online banking', 'Bank Islam'),
('GH-1593024084', 'None', 'None', 'None', 'None', 'Non', '2020-06-24', '90.40', 'Online banking', 'BSN'),
('GH-1593027520', 'None', 'None', 'None', 'None', 'Non', '2020-06-24', '47.58', 'Online banking', 'Bank Islam'),
('GH-1593027651', 'None', 'None', 'None', 'None', 'Non', '2020-06-24', '47.58', 'Online banking', 'Bank Islam'),
('GH-1593027744', 'None', 'None', 'None', 'None', 'Non', '2020-06-24', '143.00', 'Online banking', 'AmBank'),
('GH-1593027835', 'None', 'None', 'None', 'None', 'Non', '2020-06-24', '143.00', 'Online banking', 'AmBank'),
('GH-1593159066', 'None', 'None', 'None', 'None', 'Non', '2020-06-26', '138.37', 'Online banking', 'Maybank'),
('GH-1593227578', 'None', 'None', 'None', 'None', 'Non', '2020-06-27', '0.00', 'Online banking', 'Bank Islam'),
('GH-1593230950', 'None', 'None', 'None', 'None', 'Non', '2020-06-27', '0.00', 'Online banking', 'BSN'),
('GH-1593231465', 'None', 'None', 'None', 'None', 'Non', '2020-06-27', '43.35', 'Online banking', 'BSN'),
('GH-1593237946', 'None', 'None', 'None', 'None', 'Non', '2020-06-27', '85.74', 'Online banking', 'BSN'),
('GH-1593240508', 'None', 'None', 'None', 'None', 'Non', '2020-06-27', '109.92', 'Online banking', 'CIMB Bank');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_ID` varchar(4) NOT NULL,
  `prodInfo_ID` varchar(6) NOT NULL,
  `prod_Desc` varchar(120) NOT NULL,
  `prod_Price` decimal(5,2) NOT NULL,
  `stock_Qty` int(11) NOT NULL,
  `prod_Img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_ID`, `prodInfo_ID`, `prod_Desc`, `prod_Price`, `stock_Qty`, `prod_Img`) VALUES
('bn01', 'prod02', 'Gula Prai Cube Sugar 500g', '2.60', 200, 'prod-img/1 sugar.jpg'),
('bn02', 'prod02', 'Star Brand Corn Flour 400g', '1.50', 196, 'prod-img/2 corn flour.png'),
('bn03', 'prod02', 'Planta Margarine 1kg', '10.99', 203, 'prod-img/3 margarine.jpg'),
('bn04', 'prod02', 'Chocolate Chip (Soft) +/-250g Malaysia', '5.50', 0, 'prod-img/4 choc chip.png'),
('bn05', 'prod02', 'Hershey\'s Kitchens Semi-Sweet Chocolate Chips 340g', '20.45', 200, 'prod-img/5 semi sweet choc bar.jpg'),
('fc01', 'prod03', 'Buttercup Luxury Spread 250g', '5.99', 181, 'prod-img/6 buttercup.jpg'),
('fc02', 'prod03', 'Chesdale Cheese Sliced 24s 500g', '20.80', 200, 'prod-img/7 cheese slice.jpg'),
('fc03', 'prod03', 'EGG Size A 30s', '10.79', 200, 'prod-img/8 eggs.jpg'),
('fc04', 'prod03', 'Marigold Peel Fresh Apple Juice 1L', '5.60', 200, 'prod-img/9 apple juice.jpg'),
('hh01', 'prod04', 'Breeze Detergent Liquid Power Clean 3.8kg', '19.99', 0, 'prod-img/10 detergent.png'),
('hh02', 'prod04', 'Glade Ocean Escape 320ml', '11.30', 200, 'prod-img/11 air freshener.jpg'),
('hh03', 'prod04', 'Premier 2Ply Facial Tissue 4X100\'s', '8.20', 200, 'prod-img/12 tissue.jpg'),
('hh04', 'prod04', 'Bathroom Glove', '5.00', 200, 'prod-img/bathroom-glove.jpeg'),
('ms01', 'prod01', 'Whole Chicken w/o Head & Feet (L) 1.7kg+/-', '14.45', 178, 'prod-img/13 chicken.jpg'),
('ms02', 'prod01', 'Ramly Chicken Meatballs \'\'Bebola Ayam\'\' 800g', '13.10', 200, 'prod-img/14 meatballs.jpg'),
('ms03', 'prod01', 'Frozen Ikan Kembong (M) 1kg +/-', '10.00', 200, 'prod-img/15 ikan kembung.png'),
('ms04', 'prod01', 'Ikan Merah Block 200g ±', '13.00', 200, 'prod-img/16 ikan merah.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` varchar(8) NOT NULL,
  `Staff_Name` varchar(44) NOT NULL,
  `Staff_Position` varchar(44) NOT NULL,
  `Staff_Email` varchar(60) NOT NULL,
  `Staff_PhoneNo` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `Staff_Name`, `Staff_Position`, `Staff_Email`, `Staff_PhoneNo`) VALUES
('GH01', 'Nazrin', 'CEO', 'ayampenyet@gmail.com', '0112233445566'),
('GH02', 'Luqman', 'EX-CEO', 'speakerRosak@gmail.com', '022432657836');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `Product_ID` varchar(4) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Total_Price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`cust_Email`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
