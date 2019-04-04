-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql101.epizy.com
-- Generation Time: Apr 03, 2019 at 04:18 AM
-- Server version: 5.6.21-69.0
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epiz_23552199_302_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

CREATE TABLE IF NOT EXISTS `Cart` (
  `Customer_id` char(5) NOT NULL,
  `item_id` char(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` int(5) NOT NULL,
  `Order_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Cart`
--

INSERT INTO `Cart` (`Customer_id`, `item_id`, `quantity`, `price`, `Order_date`) VALUES
('CU003', 'IT002', 1, 7799, '2019-04-03 14:12:49'),
('CU014', 'IT009', 1, 667, '2019-03-27 01:02:59'),
('CU014', 'IT010', 1, 2400, '2019-03-27 01:02:59'),
('CU016', 'IT006', 1, 3199, '2019-04-03 15:33:13'),
('CU003', 'IT001', 1, 1499, '2019-03-26 14:32:35'),
('CU003', 'IT002', 1, 7799, '2019-03-26 14:32:35'),
('CU014', 'IT010', 1, 2400, '2019-03-28 10:06:54'),
('CU016', 'IT002', 1, 7799, '2019-04-03 15:33:13'),
('CU003', 'IT004', 1, 1588, '2019-03-26 14:32:35'),
('CU003', 'IT007', 1, 7850, '2019-03-26 14:32:35'),
('CU021', 'IT001', 1, 1499, '2019-04-03 15:48:40'),
('CU015', 'IT001', 1, 1499, '2019-04-03 16:04:05'),
('CU010', 'IT007', 1, 7850, '2019-03-26 16:37:24'),
('CU014', 'IT001', 1, 1499, '2019-03-26 16:50:25'),
('CU014', 'IT007', 1, 7850, '2019-03-26 16:50:25'),
('CU017', 'IT002', 1, 7799, '2019-03-26 16:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE IF NOT EXISTS `Customer` (
  `Customer_id` char(5) NOT NULL,
  `Customer_name` varchar(50) NOT NULL,
  `Customer_address` varchar(100) NOT NULL,
  `Customer_tel` int(8) NOT NULL,
  PRIMARY KEY (`Customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`Customer_id`, `Customer_name`, `Customer_address`, `Customer_tel`) VALUES
('CU016', 'kelvin', '', 0),
('CU018', 'test', '', 0),
('CU001', 'Jasmine Lei', 'Flat G, 5/F, Block 2, Richmond Tower, Sha Tin, N.T', 91235632),
('CU003', 'Kelvin Cheung2', 'Flat B, 8/F, Hang Wan Building, 42-44 Granville Rd., Tsim Sha Tsui', 90009999),
('CU004', 'Vincent Cheuk', 'Flat 1, High Floor, Block C, Luk Yeung Sun Chuen', 91324789),
('CU020', 'Cherry Chan', '', 0),
('CU007', 'christy', 'hk', 12345678),
('CU010', 'vincent', 'tuen mun', 98764321),
('CU019', 'Terry', '', 0),
('CU014', 'Cherry', 'Shatin', 91239123),
('CU015', 'CWT', '', 0),
('CU017', 'VIN', '123', 12345678),
('CU021', 'kelvin88', 'Hong Kong', 90347777);

-- --------------------------------------------------------

--
-- Table structure for table `Item`
--

CREATE TABLE IF NOT EXISTS `Item` (
  `item_id` char(5) NOT NULL,
  `item_name` varchar(80) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(5) NOT NULL,
  `img_dir` varchar(255) DEFAULT NULL,
  `inventory_no` int(11) NOT NULL,
  `manufacturer_id` char(5) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Item`
--

INSERT INTO `Item` (`item_id`, `item_name`, `description`, `price`, `img_dir`, `inventory_no`, `manufacturer_id`) VALUES
('IT001', 'Adidas Shoes Ultra Boost 4.0', 'These running shoes combine comfort and high-performance technology for a best-ever-run feeling. They have a stretchy knit upper that adapts to the changing shape of your foot as you run. Responsive midsole cushioning and a flexible outsole deliver a smooth and energized ride. ', 1499, 'uploads/adidas_Ultra_Boost.jpg', 16, 'MA002'),
('IT002', 'iPhone XR', 'All-screen design. Longest battery life ever in an iPhone. Fastest performance. Water and splash resistant. Studio-quality photos and 4K video. More secure with Face ID. The new iPhone XR. It''s a brilliant upgrade.', 7799, 'uploads/iphone_xr.png', 17, 'MA003'),
('IT003', 'iPad mini', 'iPad mini is beloved for its size and capability. And now there are even more reasons to love it. The A12 Bionic chip with Neural Engine. A 7.9 inch Retina display with True Tone. And Apple Pencil, so you can capture your biggest ideas wherever they come to you. It''s still iPad mini. There''s just more of it than ever.', 4299, 'uploads/ipad_mini.png', 49, 'MA003'),
('IT004', 'Apple TV 4K', 'Apple TV 4K lets you watch movies and shows in amazing 4K HDR - and now it completes the picture with immersive sound from Dolby Atmos.1 It streams your favorite channels live. Has great content from apps like Amazon Prime Video, Netflix, ViuTV, and Viki', 1588, 'uploads/apple_tv.jpeg', 22, 'MA003'),
('IT005', 'iPhone XS Max 256GB Gold', 'Super Retina. In big and bigger. The custom OLED displays on iPhone XS deliver the most accurate color in the industry, HDR, and true blacks. And iPhone XS Max has our largest display ever on an iPhone.', 10799, 'uploads/iphone-xs-max.png', 49, 'MA003'),
('IT006', 'Apple Watch 4 GPS', 'All-New Design Not just evolved, transformed. The largest Apple Watch display yet. New electrical heart sensor. Re-engineered Digital Crown with haptic feedback. Entirely familiar, yet completely new, Apple Watch Series 4 resets the standard for what a watch can be.', 3199, 'uploads/Apple-Watch-s4.png', 35, 'MA003'),
('IT007', 'Dell XPS 13 9360 Laptop', 'Intel i5 8250U ,256GB SSD ,8 GB Ram The smallest 13-inch on the planet with the world''s first infinity display More screen, less to carry: The virtually borderless display maximizes screen space by squeezing a 33 cm (13") display in an 28 cm (11") frame. With a bezel only 5.2 mm thin, starting at only 1.22kg and measuring a super slim 9-15 mm, the XPS 13 is exceptionally thin and light.', 7850, 'uploads/dell_xps_13.jpg', 48, 'MA001'),
('IT008', 'Anker PowerCore 26800 Portable Charger', '26800mAh External Battery with Dual Input Port and Double-Speed Recharging, 3 USB Ports for iPhone, iPad, Samsung Galaxy, Android and other Smart Devices.', 518, 'uploads/Anker_Portable_Charger.jpg', 26, 'MA001'),
('IT009', 'Fjallraven - Kanken Classic Backpack', 'We are celebrating 50 years since Fjallraven''s first jacket was launched with our special edition Kanken Greenland. Made from durable G-1000 HeavyDuty Eco with patterned details that match the rest of the Greenland series. Like all Kanken backpacks, it is a hardwearing, practical everyday backpack that will accompany you wherever you go.', 667, 'uploads/Fjallraven_Backpack.jpg', 28, 'MA001'),
('IT010', 'Nintendo Switch Neon Red and Neon Blue', 'Nintendo Switch is designed to fit your life, transforming from home console to portable system in a snap. So you get more time to play the games you love, however you like.', 2400, 'uploads/Nintendo_Switch.jpg', 18, 'MA001'),
('IT011', 'PlayStation 4 Pro 1TB Hard Drive', 'PS4 system is the home to games with rich, high-fidelity graphics and deeply immersive experiences that shatter expectations.  Simply hit the SHARE button on the controller to share your gameplay experience to the world, or communicate with your friends online.  PlayStation exclusives and most immersive games are waiting for you.', 2747, 'uploads/ps4_pro.jpeg', 17, 'MA001'),
('IT012', 'Netgear R7000', 'NETGEAR Nighthawk AC1900 Smart WiFi Router was built to handle all your high-bandwidth online activities with features that will keep you connected at top speeds. With the powerful 1GHz dual core processor and advanced upstream QoS for XBox and other game consoles, Nighthawk can prioritize bandwidth to your game so other devices on the network don''t slow down your connection.', 1100, 'uploads/r7000.jpg', 10, 'MA001');

-- --------------------------------------------------------

--
-- Table structure for table `Logistics`
--

CREATE TABLE IF NOT EXISTS `Logistics` (
  `Logistics_id` char(5) NOT NULL,
  `Logistics_name` varchar(50) NOT NULL,
  PRIMARY KEY (`Logistics_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Logistics`
--

INSERT INTO `Logistics` (`Logistics_id`, `Logistics_name`) VALUES
('LG001', 'SF Express');

-- --------------------------------------------------------

--
-- Table structure for table `Manufacturer`
--

CREATE TABLE IF NOT EXISTS `Manufacturer` (
  `manufacturer_id` char(5) NOT NULL,
  `manufacturer_name` varchar(50) NOT NULL,
  PRIMARY KEY (`manufacturer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Manufacturer`
--

INSERT INTO `Manufacturer` (`manufacturer_id`, `manufacturer_name`) VALUES
('MA001', 'Ma Ltd'),
('MA002', 'adidas Original'),
('MA003', 'Apple Premium Reseller T.S.T Branch');

-- --------------------------------------------------------

--
-- Table structure for table `Order`
--

CREATE TABLE IF NOT EXISTS `Order` (
  `Order_id` char(5) NOT NULL,
  `Order_weight` float(6,2) DEFAULT NULL,
  `Order_description` varchar(80) DEFAULT NULL,
  `Quantity` int(3) DEFAULT NULL,
  `Pickup_Ready_Day` datetime DEFAULT NULL,
  `Customer_id` char(5) NOT NULL,
  `Retailer_id` char(5) NOT NULL,
  `Logistics_id` char(5) DEFAULT NULL,
  `Order_date` datetime NOT NULL,
  PRIMARY KEY (`Order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Order`
--

INSERT INTO `Order` (`Order_id`, `Order_weight`, `Order_description`, `Quantity`, `Pickup_Ready_Day`, `Customer_id`, `Retailer_id`, `Logistics_id`, `Order_date`) VALUES
('OR001', 14.70, 'Fragile, handle with care!', 3, '2019-04-12 11:15:00', 'CU010', 'RE001', 'LG001', '2019-03-26 16:37:24'),
('OR002', 5.60, 'N.A.', 2, '2019-04-08 13:30:00', 'CU003', 'RE001', 'LG001', '2019-03-26 14:32:35'),
('OR003', 1.00, 'N.A.', 3, '2019-03-30 12:00:00', 'CU014', 'RE001', 'LG001', '2019-03-27 01:02:59'),
('OR009', NULL, NULL, NULL, NULL, 'CU015', 'RE001', NULL, '2019-04-03 16:04:05'),
('OR008', 2.00, 'N.A.', 1, '0000-00-00 00:00:00', 'CU021', 'RE001', 'LG001', '2019-04-03 15:48:40'),
('OR007', NULL, NULL, NULL, NULL, 'CU016', 'RE001', NULL, '2019-04-03 15:33:13'),
('OR006', NULL, NULL, NULL, NULL, 'CU003', 'RE001', NULL, '2019-04-03 14:12:49'),
('OR005', 2.80, 'Fragile, handle with care!', 1, '2019-04-10 12:30:00', 'CU014', 'RE001', 'LG001', '2019-03-28 10:06:54'),
('OR004', 2.80, 'Fragile, handle with care!', 1, '2019-04-09 10:30:00', 'CU017', 'RE001', 'LG001', '2019-03-26 16:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `Reorder`
--

CREATE TABLE IF NOT EXISTS `Reorder` (
  `reorder_id` char(5) NOT NULL,
  `item_id` char(5) NOT NULL,
  `reorder_no` int(11) NOT NULL,
  `deadline_date` datetime NOT NULL,
  `manufacturer_id` char(5) NOT NULL,
  `retailer_id` char(5) NOT NULL,
  PRIMARY KEY (`reorder_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Reorder`
--

INSERT INTO `Reorder` (`reorder_id`, `item_id`, `reorder_no`, `deadline_date`, `manufacturer_id`, `retailer_id`) VALUES
('RD002', 'IT001', 20, '2019-05-03 15:50:48', 'MA002', 'RE001'),
('RD001', 'IT011', 20, '2019-04-25 23:32:18', 'MA001', 'RE001');

-- --------------------------------------------------------

--
-- Table structure for table `Retailer`
--

CREATE TABLE IF NOT EXISTS `Retailer` (
  `retailer_id` char(5) NOT NULL,
  `retailer_name` varchar(50) NOT NULL,
  `retailer_tel` int(8) NOT NULL,
  `retailer_address` varchar(100) NOT NULL,
  PRIMARY KEY (`retailer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Retailer`
--

INSERT INTO `Retailer` (`retailer_id`, `retailer_name`, `retailer_tel`, `retailer_address`) VALUES
('RE001', 'OR Ltd', 25892147, 'Tat Chee Ave, 2410, 2/F, Li Dak Sum Yip Yio Chin Academic Building, City University of Hong Kong');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `Customer_id` char(5) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Privilege` varchar(15) DEFAULT NULL,
  KEY `Customer_id` (`Customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`Customer_id`, `Username`, `Password`, `Privilege`) VALUES
('CU003', 'kelvin3', '123456', 'customer'),
('CU001', 'jasmine lei', '12345678', 'customer'),
('EM002', 'christy', 'chung', 'employee'),
('CU016', 'kelvin', '123456', 'customer'),
('CU007', 'christy123', '12345', 'customer'),
('CU006', 'cccc', 'asd', 'customer'),
('CU018', 'test', '12345678', 'customer'),
('CU010', 'vincent', '12345678', 'customer'),
('CU004', 'vin', '12345678', 'customer'),
('CU017', 'kelvin123', '123456', 'customer'),
('CU014', 'Cherry01', 'cherry123', 'customer'),
('CU015', 'CWT_123', '12345678', 'customer'),
('CU019', 'Terry', '12345678', 'customer'),
('CU020', 'Cherry Chan', '987654321', 'customer'),
('CU021', 'kelvin88', '123456', 'customer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
