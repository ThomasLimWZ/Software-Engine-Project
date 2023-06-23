-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 09:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4ppl_telco`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adm_id` text NOT NULL,
  `adm_name` text NOT NULL,
  `adm_profile_pic` text DEFAULT NULL,
  `adm_email` text NOT NULL,
  `adm_phone` text NOT NULL,
  `adm_role` text NOT NULL,
  `adm_pass` text NOT NULL,
  `adm_signup_date` datetime NOT NULL DEFAULT current_timestamp(),
  `adm_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adm_id`, `adm_name`, `adm_profile_pic`, `adm_email`, `adm_phone`, `adm_role`, `adm_pass`, `adm_signup_date`, `adm_status`) VALUES
(1, 'ADM001', 'Lim Wee Zheng', NULL, '1201200463@student.mmu.edu.my', '011-10612839', 'Superadmin', 'C5B946E3344171C3C4B066916F3615C5', '2023-05-01 00:00:00', 1),
(2, 'ADM002', 'Thomas Lim', NULL, 'tzhenglim@gmail.com', '016-6916223', 'Superadmin', '9F77EE73B993012A3BD13446FB2108E1', '2023-05-08 00:00:00', 1),
(3, 'ADM003', 'Heng Yi Jun', NULL, '1201200318@student.mmu.edu.my', '0182392631', 'Admin', '003DA1FE6E690899953033C47CC7AF91', '2023-05-22 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` text NOT NULL,
  `brand_logo` text NOT NULL,
  `brand_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_logo`, `brand_status`) VALUES
(1, 'Apple', 'apple.png', 1),
(2, 'Xiaomi', 'xiaomi.png', 1),
(3, 'Samsung', 'samsung.png', 1),
(4, 'Huawei', 'huawei.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `cart_item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` decimal(7,2) NOT NULL,
  `cart_subtotal` decimal(10,2) NOT NULL,
  `cart_item_status` int(11) NOT NULL DEFAULT 1,
  `prod_id` int(11) NOT NULL,
  `prod_detail_id` int(11) NOT NULL,
  `prod_color_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`cart_item_id`, `quantity`, `product_price`, `cart_subtotal`, `cart_item_status`, `prod_id`, `prod_detail_id`, `prod_color_id`, `cus_id`, `order_id`) VALUES
(1, 1, 3099.00, 3099.00, 0, 7, 24, 51, 3, 3),
(2, 1, 749.00, 749.00, 0, 59, 94, 270, 3, 3),
(3, 1, 4099.00, 4099.00, 0, 32, 61, 194, 3, 4),
(4, 1, 6799.00, 6799.00, 0, 29, 56, 184, 1, 5),
(5, 2, 3799.00, 7598.00, 0, 73, 111, 299, 1, 5),
(6, 1, 4399.00, 4399.00, 0, 74, 112, 303, 1, 6),
(7, 1, 999.00, 999.00, 0, 85, 128, 352, 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text NOT NULL,
  `cat_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_img`) VALUES
(1, 'Phone', ''),
(2, 'Tablet', ''),
(3, 'Audio', ''),
(4, 'Watch', ''),
(5, 'Accessories', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` text NOT NULL,
  `cus_email` text NOT NULL,
  `cus_phone` text NOT NULL,
  `cus_pass` text NOT NULL,
  `cus_address` text DEFAULT NULL,
  `cus_city` text DEFAULT NULL,
  `cus_state` text DEFAULT NULL,
  `cus_postcode` int(5) DEFAULT NULL,
  `cus_signup_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_email`, `cus_phone`, `cus_pass`, `cus_address`, `cus_city`, `cus_state`, `cus_postcode`, `cus_signup_date`) VALUES
(1, 'Thomas Lim', 'tzhenglim@gmail.com', '01110612839', '4BFFF37074D849E45CA2EECC48EA4B65', NULL, NULL, NULL, NULL, '2023-05-22 08:45:59'),
(3, 'Lim Wee Zheng', '1201200463@student.mmu.edu.my', '01110612839', 'C5B946E3344171C3C4B066916F3615C5', NULL, NULL, NULL, NULL, '2023-06-14 10:01:08'),
(4, 'Shawn', '1201200637@student.mmu.edu.my', '0136331234', '0C7E91AC8D0A962C69441D68B1E480B2', NULL, NULL, NULL, NULL, '2023-06-14 10:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `order_grandtotal` decimal(10,2) NOT NULL,
  `cus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_datetime`, `order_grandtotal`, `cus_id`) VALUES
(3, '2023-06-14 10:03:39', 3848.00, 3),
(4, '2023-06-14 10:12:36', 4099.00, 3),
(5, '2023-06-14 10:15:13', 14397.00, 1),
(6, '2023-06-14 10:17:42', 4399.00, 1),
(7, '2023-06-14 10:35:46', 999.00, 4);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `invoice_number` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pay_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `pay_type` text NOT NULL,
  `pay_status` int(11) NOT NULL DEFAULT 0,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `invoice_number`, `pay_datetime`, `pay_type`, `pay_status`, `order_id`) VALUES
(3, 'INV829370', '2023-06-14 10:03:39', 'fpx', 1, 3),
(4, 'INV870562', '2023-06-14 10:12:36', 'visa', 1, 4),
(5, 'INV482907', '2023-06-14 10:15:13', 'fpx', 1, 5),
(6, 'INV352816', '2023-06-14 10:17:42', 'master', 1, 6),
(7, 'INV941826', '2023-06-14 10:35:46', 'fpx', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` text NOT NULL,
  `prod_descrip` text DEFAULT NULL,
  `prod_status` int(11) NOT NULL DEFAULT 1,
  `brand_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `adm_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_descrip`, `prod_status`, `brand_id`, `cat_id`, `adm_id`) VALUES
(1, 'iPhone 14 Pro Max', '', 0, 1, 1, 'ADM001'),
(2, 'iPhone 14 Pro', '', 1, 1, 1, 'ADM001'),
(3, 'iPhone 14 Plus', '', 1, 1, 1, 'ADM001'),
(4, 'iPhone 14', '', 1, 1, 1, 'ADM001'),
(5, 'iPad Pro 12.9-inch', '', 1, 1, 2, 'ADM001'),
(6, 'iPhone SE', '', 1, 1, 1, 'ADM001'),
(7, 'iPhone 12', '', 1, 1, 1, 'ADM001'),
(8, 'iPhone 13', '', 1, 1, 1, 'ADM001'),
(9, 'Samsung Galaxy A03', '', 1, 3, 1, 'ADM001'),
(10, 'Samsung Galaxy A04s', '', 1, 3, 1, 'ADM001'),
(11, 'Samsung Galaxy A13', '', 1, 3, 1, 'ADM001'),
(12, 'Samsung Galaxy A14', '', 1, 3, 1, 'ADM001'),
(13, 'Samsung Galaxy A23', '', 1, 3, 1, 'ADM001'),
(14, 'Samsung Galaxy A24', '', 1, 3, 1, 'ADM001'),
(15, 'Samsung Galaxy A33', '', 1, 3, 1, 'ADM001'),
(16, 'Samsung Galaxy A34', '', 1, 3, 1, 'ADM001'),
(17, 'Samsung Galaxy A53', '', 1, 3, 1, 'ADM001'),
(18, 'Samsung Galaxy A54', '', 1, 3, 1, 'ADM001'),
(19, 'Samsung Galaxy A73', '', 1, 3, 1, 'ADM001'),
(20, 'Samsung Galaxy M52', '', 1, 3, 1, 'ADM001'),
(21, 'Samsung Galaxy S22', '', 1, 3, 1, 'ADM001'),
(22, 'Samsung Galaxy S22 Ultra', '', 1, 3, 1, 'ADM001'),
(23, 'Samsung Galaxy S22+', '', 1, 3, 1, 'ADM001'),
(24, 'Samsung Galaxy S23', '', 1, 3, 1, 'ADM001'),
(25, 'Samsung Galaxy S23 Ultra', '', 1, 3, 1, 'ADM001'),
(26, 'Samsung Galaxy S23+', '', 1, 3, 1, 'ADM001'),
(27, 'Samsung Galaxy Z Flip 3', '', 1, 3, 1, 'ADM001'),
(28, 'Samsung Galaxy Z Flip 4', '', 1, 3, 1, 'ADM001'),
(29, 'Samsung Galaxy Z Fold 4', '', 1, 3, 1, 'ADM001'),
(30, 'Huawei MatePad 10.4-inches', '', 1, 4, 2, 'ADM001'),
(31, 'Huawei MatePad 11', '', 1, 4, 2, 'ADM001'),
(32, 'Huawei MatePad Pro', '', 1, 4, 2, 'ADM001'),
(33, 'Huawei MatePad SE', '', 1, 4, 2, 'ADM001'),
(34, 'Apple AirPods Pro (2nd generation)', '', 1, 1, 3, 'ADM001'),
(35, 'Apple 5W USB Power Adapter', 'The Apple USB-C Power Adapter offers fast, efficient charging at home, in the office, or on<br>\r\nthe go. While the power adapter is compatible with any USB-C-enabled device, Apple<br>\r\nrecommends pairing it with the iPad Pro and iPad Air for optimal charging performance. You can<br>\r\nalso pair it with iPhone 8 or later to take advantage of the fast-charging feature.<br>\r\nCharging cable sold separately.', 1, 1, 5, 'ADM001'),
(36, 'Apple Watch Nike Series 7 Aluminium Case with Nike Sport Band', '', 1, 1, 4, 'ADM001'),
(37, 'Apple Watch Series 7 Aluminium Case with Sport Band', '', 1, 1, 4, 'ADM001'),
(38, 'Apple Watch Series 7 Stainless Steel Case with Milanese Loop', '', 1, 1, 4, 'ADM001'),
(39, 'Huawei Mate 50', '', 1, 4, 1, 'ADM001'),
(40, 'Huawei Mate 50 Pro', '', 1, 4, 1, 'ADM001'),
(41, 'Huawei Nova 8', '', 1, 4, 1, 'ADM001'),
(42, 'Huawei Nova 8i', '', 1, 4, 1, 'ADM001'),
(43, 'Huawei Nova 9', '', 1, 4, 1, 'ADM001'),
(44, 'Huawei Nova Y90', '', 1, 4, 1, 'ADM001'),
(45, 'Huawei P50', '', 1, 4, 1, 'ADM001'),
(46, 'Huawei P50 Pro', '', 1, 4, 1, 'ADM001'),
(47, 'Huawei P60 Pro', '', 1, 4, 1, 'ADM001'),
(48, 'Xiaomi 12', '', 1, 2, 1, 'ADM001'),
(49, 'Xiaomi 12 Lite', '', 1, 2, 1, 'ADM001'),
(50, 'Xiaomi 12 Pro', '', 1, 2, 1, 'ADM001'),
(51, 'Xiaomi 12T', '', 1, 2, 1, 'ADM001'),
(52, 'Xiaomi 12T Pro', '', 1, 2, 1, 'ADM001'),
(53, 'Xiaomi 13', '', 1, 2, 1, 'ADM001'),
(54, 'Xiaomi 13 Pro', '', 1, 2, 1, 'ADM001'),
(55, 'Xiaomi Mi 11 Lite', '', 1, 2, 1, 'ADM001'),
(56, 'Xiaomi Redmi Note 11', '', 1, 2, 1, 'ADM001'),
(57, 'Xiaomi Redmi Note 11s', '', 1, 2, 1, 'ADM001'),
(58, 'Apple AirPods with Charging Case (2019)', '', 1, 1, 3, 'ADM001'),
(59, 'AirPods (3rd generation) with Lightning Charging Case', '', 1, 1, 3, 'ADM001'),
(60, 'Huawei FreeBuds 4', '', 1, 4, 3, 'ADM001'),
(61, 'Huawei FreeBuds 4i', '', 1, 4, 3, 'ADM001'),
(62, 'Huawei FreeBuds 5', '', 1, 4, 3, 'ADM001'),
(63, 'Huawei Sound X', '', 1, 4, 3, 'ADM001'),
(64, 'Samsung Galaxy Buds2', '', 1, 3, 3, 'ADM001'),
(65, 'Apple 5W USB Power Adapter (Folding Pins)', 'The Apple USB-C Power Adapter offers fast, efficient charging at home, in the office, or on<br>\r\nthe go. While the power adapter is compatible with any USB-C-enabled device, Apple<br>\r\nrecommends pairing it with the iPad Pro and iPad Air for optimal charging performance. You can<br>\r\nalso pair it with iPhone 8 or later to take advantage of the fast-charging feature.<br>\r\nCharging cable sold separately.', 1, 1, 5, 'ADM001'),
(66, 'Apple 12w USB Power Adapter', 'The Apple USB-C Power Adapter offers fast, efficient charging at home, in the office, or on<br>\r\nthe go. While the power adapter is compatible with any USB-C-enabled device, Apple<br>\r\nrecommends pairing it with the iPad Pro and iPad Air for optimal charging performance. You can<br>\r\nalso pair it with iPhone 8 or later to take advantage of the fast-charging feature.<br>\r\nCharging cable sold separately.', 1, 1, 5, 'ADM001'),
(67, 'Apple 20W USB-C Power Adapter', 'The Apple USB-C Power Adapter offers fast, efficient charging at home, in the office, or on<br>\r\nthe go. While the power adapter is compatible with any USB-C-enabled device, Apple<br>\r\nrecommends pairing it with the iPad Pro and iPad Air for optimal charging performance. You can<br>\r\nalso pair it with iPhone 8 or later to take advantage of the fast-charging feature.<br>\r\nCharging cable sold separately.', 1, 1, 5, 'ADM001'),
(68, 'Apple 30-pin to USB Cable', '', 1, 1, 5, 'ADM001'),
(69, 'APPLE 45W MAGSAFE 2 POWER ADAPTER FOR MACBOOK AIR', '', 1, 1, 5, 'ADM001'),
(70, 'APPLE 45W MAGSAFE POWER ADAPTER FOR MACBOOK AIR', '', 1, 1, 5, 'ADM001'),
(71, 'Apple Watch Series 8 Aluminium Case with Sport Band', '', 1, 1, 4, 'ADM001'),
(72, 'Apple Watch SE Stainless Steel Case with Milanese Loop', '', 1, 1, 4, 'ADM001'),
(73, 'Apple Watch Ultra with Titanium Case', '', 1, 1, 4, 'ADM001'),
(74, 'iPad Pro 11-inch', '', 1, 1, 2, 'ADM001'),
(75, 'iPad Mini 6th Generation', '', 1, 1, 2, 'ADM001'),
(76, 'iPad 10th Generation', '', 1, 1, 2, 'ADM001'),
(77, 'iPad 9th Generation', '', 1, 1, 2, 'ADM001'),
(78, 'iPad 5th Generation', '', 1, 1, 2, 'ADM001'),
(79, 'Galaxy Tab A7 Lite', '', 1, 3, 2, 'ADM001'),
(80, 'Galaxy Tab A8', '', 1, 3, 2, 'ADM001'),
(81, 'Galaxy Tab S8', '', 1, 3, 2, 'ADM001'),
(82, 'Galaxy Tab S8+', '', 1, 3, 2, 'ADM001'),
(83, 'Huawei Watch Fit 2', '', 1, 4, 4, 'ADM001'),
(84, 'Huawei GT 3 SE', '', 1, 4, 4, 'ADM001'),
(85, 'Huawei Watch GT Cyber', '', 1, 4, 4, 'ADM001'),
(86, 'Samsung Galaxy Watch 4', '', 1, 3, 4, 'ADM001'),
(87, 'Samsung Galaxy Watch 5', '', 1, 3, 4, 'ADM001'),
(88, 'Samsung Galaxy Watch 5 Pro', '', 1, 3, 4, 'ADM001'),
(89, 'Magic Mouse', 'Magic Mouse is wireless and rechargeable, with an optimised foot design that lets it glide<br>\r\nsmoothly across your desk. The Multi-Touch surface allows you to perform simple gestures<br>\r\nsuch as swiping between web pages and scrolling through documents.<br><br>\r\nThe rechargeable battery will power your Magic Mouse for about a month or more between<br>\r\ncharges. It’s ready to go straight out of the box and pairs automatically with your Mac, and it<br>\r\nincludes a woven USB-C to Lightning Cable that lets you pair and charge by connecting to<br>\r\na USB-C port on your Mac.', 0, 1, 5, 'ADM001'),
(90, 'Magic Keyboard with Touch ID and Numeric Keypad', 'Magic Keyboard is available with Touch ID, providing fast, easy, and secure authentication ', 1, 1, 5, 'ADM001'),
(91, 'Magic Trackpad', 'Magic Trackpad is wireless and rechargeable, and it includes the full range of Multi-', 1, 1, 5, 'ADM001'),
(92, 'Apple Pencil', 'Apple Pencil expands the power of iPad mini, iPad Air and iPad, and opens up new creative<br>\r\npossibilities. It’s sensitive to pressure and tilt so you can easily vary line weight, create subtle<br>\r\nshading and produce a wide range of artistic effects — just like a conventional pencil, but with<br>\r\npixel-perfect precision.', 1, 1, 5, 'ADM001'),
(93, 'Apple Pencil 2', 'Apple Pencil (2nd generation) delivers pixel-perfect precision and industry-leading low latency,<br>\r\nmaking it great for drawing, sketching, coloring, taking notes, marking up email, and more. And<br>\r\nit’s as easy and natural to use as a pencil.<br><br>\r\nApple Pencil (2nd generation) also allows you to change tools without setting it down, thanks to<br>\r\nits intuitive touch surface that supports double-tapping.<br><br>\r\nDesigned for iPad Pro and iPad Air, it features a flat edge that attaches magnetically for automatic<br>\r\ncharging and pairing.', 1, 1, 5, 'ADM001'),
(94, 'USB-C to USB Adapter', 'The USB-C to USB Adapter lets you connect iOS devices and many of your standard USB<br>\r\naccessories to a USB-C or Thunderbolt 3 (USB-C) enabled Mac.<br><br>\r\nPlug the USB-C end of the adapter into a USB-C or Thunderbolt 3 (USB-C) port on your Mac,<br>\r\nand then connect your flash drive, camera, or other standard USB device. You can also connect<br>\r\na Lightning to USB cable to sync and charge your iPhone, iPad, or iPod.', 1, 1, 5, 'ADM001'),
(95, 'USB-C to Lightning Cable', 'Connect your iPhone, iPad, or iPod with Lightning connector to your USB-C or Thunderbolt 3<br>\r\n(USB-C) enabled Mac for syncing and charging, or to your USB-C enabled iPad for charging.<br><br>\r\nYou can also use this cable with your Apple 18W, 20W, 29W, 30W, 61W, 87W or 96W USB-C<br>\r\nPower Adapter to charge your iOS device and even take advantage of the fast-charging feature<br>\r\non select iPhone and iPad models.', 1, 1, 5, 'ADM001'),
(96, 'USB-C Digital AV Multiport Adapter', 'The USB-C Digital AV Multiport Adapter lets you connect your USB-C-enabled Mac or iPad to<br>\r\nan HDMI display, while also connecting a standard USB device and a USB-C charging cable.<br><br>\r\nThis adapter allows you to mirror your Mac or iPad display to your HDMI-enabled TV or display.<br><br>\r\n3840x2160 at 60Hz on:<br>\r\niPad Pro 11-inch, iPad Pro 12.9-inch (3rd generation and later), MacBook Pro (16-inch, 2019),<br>\r\nMacBook Pro (15-inch, 2017 and later), MacBook Pro (13-inch, four Thunderbolt 3 ports, 2020),<br>\r\nMacBook Air (2020), iMac (Retina 5K, 27-inch, 2017 and later), iMac (Retina 4K, 21.5-inch, 2017<br>\r\nand later), and iMac Pro (2017 and later)<br><br>\r\n1080p at 60Hz or UHD (3840 by 2160) at 30Hz on:<br>\r\niPad Air (4th generation), MacBook Air (2018 and later), MacBook Pro (13-inch, 2016 and later),<br>\r\nMacBook Pro (15-inch, 2016), iMac (non-Retina, 21.5‑inch, 2017), and Mac mini (2018)<br><br>\r\nSimply connect the adapter to a USB-C or Thunderbolt 3 (USB-C) port on your Mac or iPad and<br>\r\nthen to your TV or projector via an HDMI cable (sold separately).<br><br>\r\nUse the standard USB port to connect devices such as your flash drive or camera or a USB<br>\r\ncable for syncing and charging your iOS devices. You can also connect a charging cable to the<br>\r\nUSB-C port to charge your Mac or iPad.', 1, 1, 5, 'ADM001'),
(97, 'MagSafe Battery Pack', '', 1, 1, 5, 'ADM001'),
(98, 'Magic Mouse 2', 'Magic Mouse 2 is wireless and rechargeable, with an optimised foot design that lets it glide<br>\r\nsmoothly across your desk. The Multi-Touch surface allows you to perform simple gestures<br>\r\nsuch as swiping between web pages and scrolling through documents.<br><br>\r\nThe rechargeable battery will power your Magic Mouse for about a month or more between<br>\r\ncharges. It’s ready to go straight out of the box and pairs automatically with your Mac, and it<br>\r\nincludes a woven USB-C to Lightning Cable that lets you pair and charge by connecting to<br>\r\na USB-C port on your Mac.', 1, 1, 5, 'ADM001'),
(99, 'Apple Magic Keyboard with Touch ID', '', 1, 1, 5, 'ADM001'),
(100, 'MagSafe Charger', '', 1, 1, 5, 'ADM001'),
(101, 'Magsafe to Magsafe 2 Converter', '', 1, 1, 5, 'ADM001'),
(102, 'Apple Watch Magnetic Charger to USB-C Cable', '', 1, 1, 5, 'ADM001'),
(103, 'Apple Thunderbolt to Gigabit Ethernet Adapter', '', 1, 1, 5, 'ADM001');

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `prod_color_id` int(11) NOT NULL,
  `prod_color_name` text NOT NULL,
  `prod_color_img` text NOT NULL,
  `prod_color_stock` int(11) NOT NULL,
  `prod_detail_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`prod_color_id`, `prod_color_name`, `prod_color_img`, `prod_color_stock`, `prod_detail_id`) VALUES
(1, 'Deep Purple', 'iPhone_14_Pro_Max_Deep_Purple.png', 5, 1),
(2, 'Gold', 'iPhone_14_Pro_Max_Gold.png', 2, 1),
(3, 'Silver', 'iPhone_14_Pro_Max_Silver.png', 3, 1),
(4, 'Deep Purple', 'iPhone_14_Pro_Max_Deep_Purple.png', 2, 3),
(5, 'Space Black', 'iPhone_14_Pro_Max_Space_Black.png', 2, 1),
(6, 'Space Black', 'iPhone_14_Pro_Max_Space_Black.png', 3, 2),
(7, 'Space Black', 'iPhone_14_Pro_Max_Space_Black.png', 3, 3),
(8, 'Space Black', 'iPhone_14_Pro_Max_Space_Black.png', 6, 4),
(9, 'Deep Purple', 'iPhone_14_Pro_Max_Deep_Purple.png', 8, 5),
(10, 'Deep Purple', 'iPhone_14_Pro_Max_Deep_Purple.png', 4, 6),
(11, 'Deep Purple', 'iPhone_14_Pro_Max_Deep_Purple.png', 6, 7),
(12, 'Deep Purple', 'iPhone_14_Pro_Max_Deep_Purple.png', 1, 8),
(13, 'Space Gray', 'Apple_iPad_Pro_12.9_Inch_(M2, 2022)_Space_Grey.png', 5, 9),
(14, 'Space Gray', 'Apple_iPad_Pro_12.9_Inch_(M2, 2022)_Space_Grey.png', 1, 10),
(15, 'Space Gray', 'Apple_iPad_Pro_12.9_Inch_(M2, 2022)_Space_Grey.png', 3, 11),
(16, 'Space Gray', 'Apple_iPad_Pro_12.9_Inch_(M2, 2022)_Space_Grey.png', 1, 12),
(17, 'Space Gray', 'Apple_iPad_Pro_12.9_Inch_(M2, 2022)_Space_Grey.png', 0, 13),
(18, 'Silver', 'Apple_iPad_Pro_12.9_Inch_(M2, 2022)_Silver.png', 3, 9),
(19, 'Silver', 'Apple_iPad_Pro_12.9_Inch_(M2, 2022)_Silver.png', 2, 10),
(20, 'Silver', 'Apple_iPad_Pro_12.9_Inch_(M2, 2022)_Silver.png', 2, 11),
(21, 'Silver', 'Apple_iPad_Pro_12.9_Inch_(M2, 2022)_Silver.png', 0, 12),
(22, 'Silver', 'Apple_iPad_Pro_12.9_Inch_(M2, 2022)_Silver.png', 1, 13),
(23, 'Blue', 'iPhone_14_Plus_Blue.png', 2, 14),
(24, 'Blue', 'iPhone_14_Plus_Blue.png', 2, 15),
(25, 'Blue', 'iPhone_14_Plus_Blue.png', 3, 16),
(26, 'Purple', 'iPhone_14_Plus_Purple.png', 4, 14),
(27, 'Purple', 'iPhone_14_Plus_Purple.png', 1, 15),
(28, 'Purple', 'iPhone_14_Plus_Purple.png', 2, 16),
(29, 'Yellow', 'iPhone_14_Plus_Yellow.png', 0, 14),
(30, 'Yellow', 'iPhone_14_Plus_Yellow.png', 0, 15),
(31, 'Yellow', 'iPhone_14_Plus_Yellow.png', 1, 16),
(32, 'Purple', 'iPhone_14_Purple.png', 5, 17),
(33, 'Purple', 'iPhone_14_Purple.png', 3, 18),
(34, 'Purple', 'iPhone_14_Purple.png', 2, 19),
(35, '(PRODUCT)RED', 'iPhone_14_Red.png', 1, 17),
(36, '(PRODUCT)RED', 'iPhone_14_Red.png', 0, 18),
(37, '(PRODUCT)RED', 'iPhone_14_Red.png', 0, 19),
(38, 'Starlight', 'iPhone_14_Starlight.png', 10, 17),
(39, 'Starlight', 'iPhone_14_Starlight.png', 3, 18),
(40, 'Starlight', 'iPhone_14_Starlight.png', 6, 19),
(41, 'Midnight', 'iPhone_SE_Black_2022.png', 2, 20),
(42, 'Midnight', 'iPhone_SE_Black.png', 2, 21),
(43, 'Midnight', 'iPhone_SE_Black.png', 1, 22),
(44, 'Starlight', 'iPhone_SE_White_2022.png', 3, 20),
(45, 'Starlight', 'iPhone_SE_White.png', 4, 21),
(46, 'Starlight', 'iPhone_SE_White.png', 1, 22),
(47, 'Red', 'iPhone_SE_Red_2022.png', 2, 20),
(48, 'Red', 'iPhone_SE_Red.png', 1, 21),
(49, 'Red', 'iPhone_SE_Red.png', 3, 22),
(50, 'Purple', 'iPhone_12_Purple.png', 5, 23),
(51, 'Purple', 'iPhone_12_Purple.png', 4, 24),
(52, 'Purple', 'iPhone_12_Purple.png', 2, 25),
(53, 'Green', 'iPhone_12_Green.png', 1, 23),
(54, 'Green', 'iPhone_12_Green.png', 2, 24),
(55, 'Green', 'iPhone_12_Green.png', 3, 25),
(56, 'Blue', 'iPhone_12_Blue.png', 2, 23),
(57, 'Blue', 'iPhone_12_Blue.png', 1, 24),
(58, 'Blue', 'iPhone_12_Blue.png', 2, 25),
(59, 'Red', 'iPhone_12_Red.png', 3, 23),
(60, 'Red', 'iPhone_12_Red.png', 3, 24),
(61, 'Red', 'iPhone_12_Red.png', 1, 25),
(62, 'White', 'iPhone_12_White.png', 3, 23),
(63, 'White', 'iPhone_12_White.png', 1, 24),
(64, 'White', 'iPhone_12_White.png', 1, 25),
(65, 'Black', 'iPhone_13_Black.png', 2, 23),
(66, 'Black', 'iPhone_13_Black.png', 3, 24),
(67, 'Black', 'iPhone_13_Black.png', 3, 25),
(68, 'Pink', 'iPhone_13_Pink.png', 1, 26),
(69, 'Pink', 'iPhone_13_Pink.png', 5, 27),
(70, 'Pink', 'iPhone_13_Pink.png', 1, 28),
(71, 'Blue', 'iPhone_13_Blue.png', 1, 26),
(72, 'Blue', 'iPhone_13_Blue.png', 2, 27),
(73, 'Blue', 'iPhone_13_Blue.png', 1, 28),
(74, 'Midnight', 'iPhone_13_Black.png', 1, 26),
(75, 'Midnight', 'iPhone_13_Black.png', 2, 27),
(76, 'Midnight', 'iPhone_13_Black.png', 2, 28),
(77, 'Starlight', 'iPhone_13_White.png', 2, 26),
(78, 'Starlight', 'iPhone_13_White.png', 3, 27),
(79, 'Starlight', 'iPhone_13_White.png', 2, 28),
(80, 'Red', 'iPhone_12_Red.png', 4, 26),
(81, 'Red', 'iPhone_12_Red.png', 5, 27),
(82, 'Red', 'iPhone_12_Red.png', 3, 28),
(83, 'Green', 'iPhone_13_Green.png', 2, 26),
(84, 'Green', 'iPhone_13_Green.png', 2, 27),
(85, 'Green', 'iPhone_13_Green.png', 2, 28),
(86, 'Black', 'Samsung_Galaxy_A03_Black.png', 2, 29),
(87, 'Black', 'Samsung_Galaxy_A03_Black.png', 5, 30),
(88, 'Blue', 'Samsung_Galaxy_A03_Blue.png', 3, 29),
(89, 'Blue', 'Samsung_Galaxy_A03_Blue.png', 2, 30),
(90, 'Red', 'Samsung_Galaxy_A03_Red.png', 2, 29),
(91, 'Red', 'Samsung_Galaxy_A03_Red.png', 4, 30),
(92, 'Black', 'Samsung_Galaxy_A04s_Black.png', 3, 31),
(93, 'Green', 'Samsung_Galaxy_A04s_Green.png', 3, 31),
(94, 'Copper', 'Samsung_Galaxy_A04s_Copper.png', 3, 31),
(95, 'Black', 'Samsung_Galaxy_A13_Black.png', 2, 32),
(96, 'Green', 'Samsung_Galaxy_A13_Blue.png', 3, 32),
(97, 'Orange', 'Samsung_Galaxy_A13_Orange.png', 2, 32),
(98, 'Black', 'Samsung_Galaxy_A14_Black.png', 2, 33),
(99, 'Dark Red', 'Samsung_Galaxy_A14_Dark_Red.png', 3, 33),
(100, 'Silver', 'Samsung_Galaxy_A14_Silver.png', 3, 33),
(101, 'Black', 'Samsung_Galaxy_A23_Black.png', 8, 34),
(102, 'Light Blue', 'Samsung_Galaxy_A23_Blue.png', 3, 34),
(103, 'Peach', 'Samsung_Galaxy_A23_Peach.png', 4, 34),
(104, 'White', 'Samsung_Galaxy_A23_White.png', 3, 34),
(105, 'Black', 'Samsung_Galaxy_A24_Black.png', 7, 35),
(106, 'Light Green', 'Samsung_Galaxy_A24_Light_Green.png', 2, 35),
(107, 'Dark Red', 'Samsung_Galaxy_A24_Dark_Red.png', 2, 35),
(108, 'Awesome Black', 'Samsung_Galaxy_A33_5G_Awesome_Black.png', 3, 36),
(109, 'Awesome White', 'Samsung_Galaxy_A33_5G_Awesome_White.png', 3, 36),
(110, 'Awesome Blue', 'Samsung_Galaxy_A33_5G_Awesome_Blue.png', 3, 36),
(111, 'Awesome Peach', 'Samsung_Galaxy_A33_5G_Awesome_Peach.png', 3, 36),
(112, 'Amazing Graphite', 'Samsung_Galaxy_A34_5G_Amazing_Graphite.png', 2, 37),
(113, 'Amazing Lime', 'Samsung_Galaxy_A34_5G_Amazing_Lime.png', 3, 37),
(114, 'Amazing Silver', 'Samsung_Galaxy_A34_5G_Amazing_Silver.png', 3, 37),
(115, 'Amazing Violet', 'Samsung_Galaxy_A34_5G_Amazing_Violet.png', 4, 37),
(116, 'Awesome Black', 'Samsung_Galaxy_A53_5G_Awesome_Black.png', 3, 38),
(117, 'Awesome White', 'Samsung_Galaxy_A53_5G_Awesome_White.png', 1, 38),
(118, 'Awesome Blue', 'Samsung_Galaxy_A53_5G_Awesome_Blue.png', 6, 38),
(119, 'Awesome Peach', 'Samsung_Galaxy_A53_5G_Awesome_Peach.png', 6, 38),
(120, 'Amazing Graphite', 'Samsung_Galaxy_A54_5G_Amazing_Graphite.png', 5, 39),
(121, 'Awesome White', 'Samsung_Galaxy_A54_5G_Amazing_White.png', 3, 39),
(122, 'Amazing Lime', 'Samsung_Galaxy_A54_5G_Amazing_Lime.png', 5, 39),
(123, 'Amazing Violet', 'Samsung_Galaxy_A54_5G_Amazing_Violet.png', 3, 39),
(124, 'Awesome Grey', 'Samsung_Galaxy_A73_5G_Awesome_Gray.png', 2, 40),
(125, 'Awesome White', 'Samsung_Galaxy_A73_5G_Awesome_White.png', 5, 40),
(126, 'Awesome Mint', 'Samsung_Galaxy_A73_5G_Awesome_Mint.png', 4, 40),
(127, 'Black', 'Samsung_Galaxy_M52_5G_Black.png', 6, 41),
(128, 'Blue', 'Samsung_Galaxy_M52_5G_Blue.png', 4, 41),
(129, 'Phantom Black', 'Samsung_Galaxy_S22_5G_Phantom_Black.png', 3, 42),
(130, 'Phantom Black', 'Samsung_Galaxy_S22_5G_Phantom_Black.png', 4, 43),
(131, 'Phantom White', 'Samsung_Galaxy_S22_5G_Phantom_White.png', 4, 42),
(132, 'Phantom White', 'Samsung_Galaxy_S22_5G_Phantom_White.png', 5, 43),
(133, 'Green', 'Samsung_Galaxy_S22_5G_Green.png', 7, 42),
(134, 'Green', 'Samsung_Galaxy_S22_5G_Green.png', 2, 43),
(135, 'Pink Gold', 'Samsung_Galaxy_S22_5G_Pink_Gold.png', 4, 42),
(136, 'Pink Gold', 'Samsung_Galaxy_S22_5G_Pink_Gold.png', 6, 43),
(137, 'Bora Purple', 'Samsung_Galaxy_S22_5G_Purple.png', 3, 42),
(138, 'Bora Purple', 'Samsung_Galaxy_S22_5G_Purple.png', 1, 43),
(139, 'Phantom Black', 'Samsung_Galaxy_S22_Ultra_5G_Phantom_Black.png', 3, 44),
(140, 'Phantom Black', 'Samsung_Galaxy_S22_Ultra_5G_Phantom_Black.png', 3, 45),
(141, 'Phantom Black', 'Samsung_Galaxy_S22_Ultra_5G_Phantom_Black.png', 5, 46),
(142, 'Phantom White', 'Samsung_Galaxy_S22_Ultra_5G_Phantom_White.png', 1, 44),
(143, 'Phantom White', 'Samsung_Galaxy_S22_Ultra_5G_Phantom_White.png', 3, 45),
(144, 'Phantom White', 'Samsung_Galaxy_S22_Ultra_5G_Phantom_White.png', 5, 46),
(145, 'Green', 'Samsung_Galaxy_S22_Ultra_5G_Green.png', 3, 44),
(146, 'Green', 'Samsung_Galaxy_S22_Ultra_5G_Green.png', 4, 45),
(147, 'Green', 'Samsung_Galaxy_S22_Ultra_5G_Green.png', 1, 46),
(148, 'Burgundy', 'Samsung_Galaxy_S22_Ultra_5G_Burgundy.png', 1, 44),
(149, 'Burgundy', 'Samsung_Galaxy_S22_Ultra_5G_Burgundy.png', 1, 45),
(150, 'Burgundy', 'Samsung_Galaxy_S22_Ultra_5G_Burgundy.png', 1, 46),
(151, 'Phantom Black', 'Samsung_Galaxy_S22+_5G_Phantom_Black.png', 1, 47),
(152, 'Phantom Black', 'Samsung_Galaxy_S22+_5G_Phantom_Black.png', 2, 48),
(153, 'Phantom White', 'Samsung_Galaxy_S22+_5G_Phantom_White.png', 3, 47),
(154, 'Phantom White', 'Samsung_Galaxy_S22+_5G_Phantom_White.png', 1, 48),
(155, 'Green', 'Samsung_Galaxy_S22+_5G_Green.png', 2, 47),
(156, 'Green', 'Samsung_Galaxy_S22+_5G_Green.png', 1, 48),
(157, 'Pink Gold', 'Samsung_Galaxy_S22+_5G_Pink_Gold.png', 2, 47),
(158, 'Pink Gold', 'Samsung_Galaxy_S22+_5G_Pink_Gold.png', 1, 48),
(159, 'Cream', 'Samsung_Galaxy_S23_5G_Cream.png', 3, 49),
(160, 'Phantom Black', 'Samsung_Galaxy_S23_5G_Phantom_Black.png', 3, 49),
(161, 'Green', 'Samsung_Galaxy_S23_5G_Green.png', 1, 49),
(162, 'Lavender', 'Samsung_Galaxy_S23_5G_Lavender.png', 2, 49),
(163, 'Cream', 'Samsung_Galaxy_S23_Ultra_5G_Cream.png', 5, 50),
(164, 'Phantom Black', 'Samsung_Galaxy_S23_Ultra_5G_Phantom_Black.png', 2, 50),
(165, 'Green', 'Samsung_Galaxy_S23_Ultra_5G_Green.png', 3, 50),
(166, 'Lavender', 'Samsung_Galaxy_S23_Ultra_5G_Laveder.png', 5, 50),
(167, 'Cream', 'Samsung_Galaxy_S23_Ultra_5G_Cream.png', 2, 51),
(168, 'Phantom Black', 'Samsung_Galaxy_S23+_5G_Phantom_Black.png', 3, 51),
(169, 'Green', 'Samsung_Galaxy_S23+_5G_Green.png', 2, 51),
(170, 'Lavender', 'Samsung_Galaxy_S23+_5G_Lavender.png', 4, 51),
(171, 'Cream', 'Samsung_Galaxy_Z_Flip3_5G_Cream.png', 3, 52),
(172, 'Phantom Black', 'Samsung_Galaxy_Z_Flip3_5G_Phantom_Black.png', 5, 52),
(173, 'Graphite', 'Samsung_Galaxy_Z_Flip4_Graphite.png', 2, 53),
(174, 'Graphite', 'Samsung_Galaxy_Z_Flip4_Graphite.png', 3, 54),
(175, 'Graphite', 'Samsung_Galaxy_Z_Flip4_Graphite.png', 4, 55),
(176, 'Bora Purple', 'Samsung_Galaxy_Z_Flip4_Purple.png', 2, 53),
(177, 'Bora Purple', 'Samsung_Galaxy_Z_Flip4_Purple.png', 1, 54),
(178, 'Bora Purple', 'Samsung_Galaxy_Z_Flip4_Purple.png', 1, 55),
(179, 'Pink Gold', 'Samsung_Galaxy_Z_Flip4_Pink_Gold.png', 1, 53),
(180, 'Pink Gold', 'Samsung_Galaxy_Z_Flip4_Pink_Gold.png', 1, 54),
(181, 'Pink Gold', 'Samsung_Galaxy_Z_Flip4_Pink_Gold.png', 1, 55),
(182, 'Beige', 'Samsung_Galaxy_Z_Fold4_Beige.png', 3, 56),
(183, 'Beige', 'Samsung_Galaxy_Z_Fold4_Beige.png', 4, 57),
(184, 'Gray Green', 'Samsung_Galaxy_Z_Fold4_Gray_Green.png', 1, 56),
(185, 'Gray Green', 'Samsung_Galaxy_Z_Fold4_Gray_Green.png', 1, 57),
(186, 'Phantom Black', 'Samsung_Galaxy_Z_Fold4_Phantom_Black.png', 3, 56),
(187, 'Phantom Black', 'Samsung_Galaxy_Z_Fold4_Phantom_Black.png', 1, 57),
(188, 'Matte Grey', 'Huawei_Matepad_10.4_Inch_2022_LTE_Matte_Grey.png', 5, 58),
(189, 'Olive Green', 'Huawei_Matepad_11_Olive_Green.png', 3, 59),
(190, 'Olive Green', 'Huawei_Matepad_11_Olive_Green.png', 6, 60),
(191, 'Matte Grey', 'Huawei_Matepad_11_Matte_Grey.png', 3, 59),
(192, 'Matte Grey', 'Huawei_Matepad_11_Matte_Grey.png', 1, 60),
(193, 'Matte Grey', 'Huawei_MatePad_Pro_12.6_Wifi_Matte_Grey.png', 3, 61),
(194, 'Olive Green', 'Huawei_MatePad_Pro_12.6_Wifi_Olive_Green.png', 4, 61),
(195, 'Black', 'Huawei_MatePad_SE_Wifi_(4GB+128GB)_Black.png', 7, 62),
(196, 'Starlight Aluminium Case band with Pure Platinum/Black Nike Sport', '[NEW]_Apple_Watch_Nike_Series_7_Aluminium_Case_with_Nike_Sport_Band_Starlight_Aluminium_Case_with_Pure_Platinum_or_Black_Nike_Sport_Band.png', 5, 63),
(197, 'Starlight Aluminium Case band with Pure Platinum/Black Nike Sport', '[NEW]_Apple_Watch_Nike_Series_7_Aluminium_Case_with_Nike_Sport_Band_Starlight_Aluminium_Case_with_Pure_Platinum_or_Black_Nike_Sport_Band.png', 4, 64),
(198, 'Midnight Aluminium Case with Pure Anthracite or Black Nike Sport Band', '[NEW]_Apple_Watch_Nike_Series_7_Aluminium_Case_with_Nike_Sport_Band_Midnight_Aluminium_Case_with_Pure_Anthracite_or_Black_Nike_Sport_Band.png', 2, 63),
(199, 'Midnight Aluminium Case with Pure Anthracite or Black Nike Sport Band', '[NEW]_Apple_Watch_Nike_Series_7_Aluminium_Case_with_Nike_Sport_Band_Midnight_Aluminium_Case_with_Pure_Anthracite_or_Black_Nike_Sport_Band.png', 1, 64),
(200, 'Green Aluminium Case with Clover Sport Band', '[NEW]_Apple_Watch_Series_7_Aluminium_Case_with_Sport_Band_Green_Aluminium_Case_with_Clover_Sport_Band.png', 3, 65),
(201, 'Green Aluminium Case with Clover Sport Band', '[NEW]_Apple_Watch_Series_7_Aluminium_Case_with_Sport_Band_Green_Aluminium_Case_with_Clover_Sport_Band.png', 7, 66),
(202, 'Blue Aluminium Case with Abyss Blue Sport Band', '[NEW]_Apple_Watch_Series_7_Aluminium_Case_with_Sport_Band_Blue_Aluminium_Case_with_Abyss_Blue_Sport_Band.png', 4, 65),
(203, 'Blue Aluminium Case with Abyss Blue Sport Band', '[NEW]_Apple_Watch_Series_7_Aluminium_Case_with_Sport_Band_Blue_Aluminium_Case_with_Abyss_Blue_Sport_Band.png', 1, 66),
(204, 'Graphite Stainless Steel Case with Graphite Milanese', '[NEW]_Apple_Watch_Series_7_Stainless_Steel_case_with Sport_Band_Graphite_Stainless_Steel_Case_with_Abyss_Blue_Sport_Band.png', 1, 67),
(205, 'Graphite Stainless Steel Case with Graphite Milanese', '[NEW]_Apple_Watch_Series_7_Stainless_Steel_case_with Sport_Band_Graphite_Stainless_Steel_Case_with_Abyss_Blue_Sport_Band.png', 2, 68),
(206, 'Silver Stainless Steel Case with Silver Milanese Loop', '[NEW]_Apple_Watch_Series_7_Stainless_Steel_case_with Sport_Band_Silver_Stainless_Steel_Case_with_Starlight_Sport_Band1.png', 4, 67),
(207, 'Silver Stainless Steel Case with Silver Milanese Loop', '[NEW]_Apple_Watch_Series_7_Stainless_Steel_case_with Sport_Band_Silver_Stainless_Steel_Case_with_Starlight_Sport_Band1.png', 6, 68),
(208, 'Black', 'Huawei_Mate50_Black.png', 7, 69),
(209, 'Silver', 'Huawei_Mate50_Silver.png', 2, 69),
(210, 'Black', 'Huawei_Mate50_Pro_Black.png', 3, 70),
(211, 'Silver', 'Huawei_Mate50_Pro_Silver.png', 5, 70),
(212, 'Orange (Kunlun Version)', 'Huawei_Mate50_Pro_Kunlun_Version.png', 0, 70),
(213, 'Orange (Kunlun Version)', 'Huawei_Mate50_Pro_Kunlun_Version.png', 5, 71),
(214, 'Blush Gold', 'Huawei_Nova_8_Blush_Gold.png', 6, 72),
(215, 'Interstellar Blue', 'Huawei_Nova_8i_Interstellar_Blue.png', 3, 73),
(216, 'Black', 'Huawei_Nova_9_Black.png', 5, 74),
(217, 'Starry Blue', 'Huawei_Nova_9_Starry_Blue.png', 3, 74),
(218, 'Crystal Blue', 'Huawei_Nova_Y90_Crystal_Blue.png', 3, 75),
(219, 'Midnight Black', 'Huawei_Nova_Y90_Midnight_Black.png', 2, 75),
(220, 'Emerald Green', 'Huawei_Nova_Y90_Emerald_Green.png', 3, 75),
(221, 'Black', 'Huawei_P50_Black.png', 3, 76),
(222, 'Cocoa Gold', 'Huawei_P50_Cocoa_Gold.png', 4, 76),
(223, 'Cocoa Gold', 'Huawei_P50_Pro_Cocoa_Gold.png', 3, 77),
(224, 'Golden Black', 'Huawei_P50_Pro_Golden_Black.png', 3, 77),
(225, 'Black', 'Huawei_P60_Pro_Black.png', 3, 78),
(226, 'Black', 'Huawei_P60_Pro_Black.png', 5, 79),
(227, 'Rococo Pearl', 'Huawie_P60_Pro_Rococo_Pearl.png', 2, 78),
(228, 'Rococo Pearl', 'Huawie_P60_Pro_Rococo_Pearl.png', 5, 79),
(229, 'Blue', 'Xiaomi_12_Blue.png', 3, 80),
(230, 'Purple', 'Xiaomi_12_Purple.png', 3, 80),
(231, 'Grey', 'Xiaomi_12_Grey.png', 2, 80),
(232, 'Black', 'Xiaomi_12_Lite_Black.png', 3, 81),
(233, 'Lite Green', 'Xiaomi_12_Lite_Green.png', 3, 81),
(234, 'Lite Pink', 'Xiaomi_12_Lite_Pink.png', 5, 81),
(235, 'Grey', 'Xiaomi_12_Pro_Grey.png', 1, 82),
(236, 'Blue', 'Xiaomi_12_Pro_Blue.png', 3, 82),
(237, 'Purple', 'Xiaomi_12_Pro_Purple.png', 3, 82),
(238, 'Black', 'Xiaomi_12T_Black.png', 3, 83),
(239, 'Silver', 'Xiaomi_12T_Silver.png', 5, 83),
(240, 'Blue', 'Xiaomi_12T_Blue.png', 1, 83),
(241, 'Black', 'Xiaomi_12T_Pro_Black.png', 3, 84),
(242, 'Black', 'Xiaomi_12T_Pro_Black.png', 2, 85),
(243, 'Silver', 'Xiaomi_12T_Pro_Silver.png', 2, 84),
(244, 'Silver', 'Xiaomi_12T_Pro_Silver.png', 3, 85),
(245, 'Blue', 'Xiaomi_12T_Pro_White.png', 2, 84),
(246, 'White', 'Xiaomi_12T_Pro_White.png', 3, 85),
(247, 'Black', 'Xiaomi_13_Black.png', 4, 86),
(248, 'Flora Green', 'Xiaomi_13_Green.png', 5, 86),
(249, 'White', 'Xiaomi_13_White.png', 7, 86),
(250, 'Black', 'Xiaomi_13_Pro_Black.png', 8, 87),
(251, 'White', 'Xiaomi_13_Pro_White.png', 5, 87),
(252, 'Black', 'Xiaomi_Mi_11_Lite_5G_Black.png', 3, 88),
(253, 'Black', 'Xiaomi_Mi_11_Lite_5G_Black.png', 1, 89),
(254, 'Blue', 'Xiaomi_Mi_11_Lite_5G_Blue.png', 7, 88),
(255, 'Blue', 'Xiaomi_Mi_11_Lite_5G_Blue.png', 5, 89),
(256, 'Green', 'Xiaomi_Mi_11_Lite_5G_Green.png', 4, 88),
(257, 'Green', 'Xiaomi_Mi_11_Lite_5G_Green.png', 2, 89),
(258, 'Pink', 'Xiaomi_Mi_11_Lite_5G_Pink.png', 2, 88),
(259, 'Pink', 'Xiaomi_Mi_11_Lite_5G_Pink.png', 2, 89),
(260, 'White', 'Xiaomi_Mi_11_Lite_5G_White.png', 1, 88),
(261, 'White', 'Xiaomi_Mi_11_Lite_5G_White.png', 1, 89),
(262, 'Twilight Blue', 'Xiaomi_Redmi_Note_11_Twilight_Blue.png', 3, 90),
(263, 'Graphite Grey', 'Xiaomi_Redmi_Note_11_Graphite_Grey.png', 3, 90),
(264, 'Star Blue', 'Xiaomi_Redmi_Note_11_Star_Blue.png', 4, 90),
(265, 'Graphite Grey', 'Xiaomi_Redmi_Note_11s_Graphite_Grey.png', 5, 91),
(266, 'Pearl White', 'Xiaomi_Redmi_Note_11s_Pearl_White.png', 4, 91),
(267, 'Twilight Blue', 'Xiaomi_Redmi_Note_11s_Twilight_Blue.png', 5, 91),
(268, 'White', 'Apple_AirPods_Pro_2nd_Generation.png', 3, 92),
(269, 'White', 'Apple_AirPods_with_Charging_Case_2019.png', 10, 93),
(270, 'White', 'Apple_AirPods_3rd_Generation.png', 4, 94),
(271, 'Silver Frost', 'Huawei_FreeBuds_4_Silver_Frost.png', 5, 95),
(272, 'Ceramic White', 'Huawei_FreeBuds_4_Ceramic_White.png', 3, 95),
(273, 'Carbon Black', 'Huawei_FreeBuds_4i_Carbon_Black.png', 3, 96),
(274, 'Ceramic White', 'Huawei_FreeBuds_4i_Ceramic_White.png', 3, 96),
(275, 'Silver', 'Huawei_Freebuds_5_Silver.png', 5, 97),
(276, 'White', 'Huawei_Freebuds_5_White.png', 5, 97),
(277, 'Black', 'Huawei_Sound_X.png', 4, 98),
(278, 'Onyx', 'Samsung_Galaxy_Buds_2_Onyx.png', 5, 99),
(279, 'Lavender', 'Samsung_Galaxy_Buds_2_Lavender.png', 5, 99),
(280, 'Olive', 'Samsung_Galaxy_Buds_2_Olive.png', 3, 99),
(281, 'White', 'Samsung_Galaxy_Buds_2_White.png', 3, 99),
(282, 'Graphite', 'Samsung_Galaxy_Buds_2_Graphite.png', 2, 99),
(283, 'White', 'Apple_5W_USB_Power_Adapter.png', 5, 100),
(285, 'White', 'Apple_5W_USB_Power_Adapter_(Folding_Pins).png', 5, 101),
(286, 'White', 'Apple_12W_USB_Power_Adapter.png', 3, 102),
(287, 'White', 'Apple_20W_USB-C_Power_Adapter.png', 5, 103),
(288, 'White', 'Apple_30-pin_to_USB_Cable.png', 5, 104),
(289, 'White', 'Apple_45W_MagSafe_2_Power_Adapter_for_Macbook_Air.png', 5, 105),
(290, 'White', 'Apple_45W_MagSafe_Power_Adapter_for_Macbook_Air.png', 5, 106),
(291, 'Starlight Aluminium Case band with Starlight Sport Band', 'Apple Watch Series 8_Aluminium_Case_with_Sport_Band_Starlight_Aluminium_Case_Starlight_Sport_Band.png', 3, 107),
(292, 'Starlight Aluminium Case band with Starlight Sport Band', 'Apple Watch Series 8_Aluminium_Case_with_Sport_Band_Starlight_Aluminium_Case_Starlight_Sport_Band.png', 6, 108),
(293, 'Midnight Aluminium Case with Midnight Sport Band', 'Apple Watch Series 8_Aluminium_Case_with_Sport_Band_Midnight_Aluminium_Case_Midnight_Sport_Band.png', 5, 107),
(294, 'Midnight Aluminium Case with Midnight Sport Band', 'Apple Watch Series 8_Aluminium_Case_with_Sport_Band_Midnight_Aluminium_Case_Midnight_Sport_Band.png', 3, 108),
(295, 'Starlight Aluminium Case band with Starlight Sport Band', 'Apple_Watch_SE_Aluminium_Case_with_Sport_Starlight_Aluminium_Case_with_Starlight_Sport_Band.png', 3, 109),
(296, 'Starlight Aluminium Case band with Starlight Sport Band', 'Apple_Watch_SE_Aluminium_Case_with_Sport_Starlight_Aluminium_Case_with_Starlight_Sport_Band.png', 0, 110),
(297, 'Midnight Aluminium Case with Midnight Sport Band', 'Apple_Watch_SE_Aluminium_Case_with_Sport_Band_Midnight_Aluminium_Case_with_Midnight_Sport_Band.png', 2, 109),
(298, 'Midnight Aluminium Case with Midnight Sport Band', 'Apple_Watch_SE_Aluminium_Case_with_Sport_Band_Midnight_Aluminium_Case_with_Midnight_Sport_Band.png', 3, 110),
(299, 'White Ocean Band', 'Apple_Watch_Ultra_with_Titanium_Case_White_Ocean_Band.png', 3, 111),
(300, 'Orange Alpine Loop', 'Apple_Watch_Ultra_with_Titanium_Case_Orange_Alpine_loop.png', 2, 111),
(301, 'Silver', 'Apple_iPad_Pro_12.9_Inch_(M1, 2021)_Silver.png', 2, 112),
(302, 'Silver', 'Apple_iPad_Pro_12.9_Inch_(M1, 2021)_Silver.png', 3, 113),
(303, 'Space Grey', 'Apple_iPad_Pro_11_Inch_(M1, 2021)_Space_Grey.png', 0, 112),
(304, 'Space Grey', 'Apple_iPad_Pro_11_Inch_(M1, 2021)_Space_Grey.png', 1, 113),
(305, 'Pink', 'Apple_iPad_Mini_6th_Generation_Pink.png', 2, 114),
(306, 'Pink', 'Apple_iPad_Mini_6th_Generation_Pink.png', 3, 115),
(307, 'Purple', 'Apple_iPad_Mini_6th_Generation_Purple.png', 3, 114),
(308, 'Purple', 'Apple_iPad_Mini_6th_Generation_Purple.png', 2, 115),
(309, 'Space Grey', 'Apple_iPad_Mini_6th_Generation_Space_Grey.png', 1, 114),
(310, 'Space Grey', 'Apple_iPad_Mini_6th_Generation_Space_Grey.png', 1, 115),
(311, 'Starlight', 'Apple_iPad_Mini_6th_Generation_Starlight.png', 1, 114),
(312, 'Starlight', 'Apple_iPad_Mini_6th_Generation_Starlight.png', 0, 115),
(313, 'Blue', 'Apple_iPad_10th_Generation_Blue.png', 2, 116),
(314, 'Blue', 'Apple_iPad_10th_Generation_Blue.png', 3, 117),
(315, 'Pink', 'Apple_iPad_10th_Generation_Pink.png', 0, 116),
(316, 'Pink', 'Apple_iPad_10th_Generation_Pink.png', 3, 117),
(317, 'Grey', 'Apple_iPad_10th_Generation_Silver.png', 2, 116),
(318, 'Grey', 'Apple_iPad_10th_Generation_Silver.png', 3, 117),
(319, 'Yellow', 'Apple_iPad_10th_Generation_Yellow.png', 3, 116),
(320, 'Yellow', 'Apple_iPad_10th_Generation_Yellow.png', 3, 117),
(321, 'Silver', 'Apple_iPad_9th_Generation_Silver.png', 1, 118),
(322, 'Silver', 'Apple_iPad_9th_Generation_Silver.png', 1, 119),
(323, 'Space Grey', 'Apple_iPad_9th_Generation_Space_Grey.png', 3, 118),
(324, 'Space Grey', 'Apple_iPad_9th_Generation_Space_Grey.png', 3, 119),
(325, 'Blue', 'Apple_iPad_5th_Generation_Blue.png', 2, 120),
(326, 'Blue', 'Apple_iPad_5th_Generation_Blue.png', 2, 121),
(327, 'Pink', 'Apple_iPad_5th_Generation_Pink.png', 2, 120),
(328, 'Pink', 'Apple_iPad_5th_Generation_Pink.png', 3, 121),
(329, 'Purple', 'Apple_iPad_5th_Generation_Purple.png', 3, 120),
(330, 'Purple', 'Apple_iPad_5th_Generation_Purple.png', 3, 121),
(331, 'Space Grey', 'Apple_iPad_5th_Generation_Space_Grey.png', 1, 120),
(332, 'Space Grey', 'Apple_iPad_5th_Generation_Space_Grey.png', 3, 121),
(333, 'Starlight', 'Apple_iPad_5th_Generation_Starlight.png', 0, 120),
(334, 'Starlight', 'Apple_iPad_5th_Generation_Starlight.png', 3, 121),
(335, 'Grey', 'Samsung_Galaxy_Tab_A7_Lite_Grey.png', 2, 122),
(336, 'Silver', 'Samsung_Galaxy_Tab_A7_Lite_Silver.png', 4, 122),
(337, 'Dark Grey', 'Samsung_Galaxy_Tab_A8_Dark_Grey.png', 2, 123),
(338, 'Rose Gold', 'Samsung_Galaxy_Tab_A8_Rose_Gold.png', 3, 123),
(339, 'Graphite', 'Samsung_Galaxy_Tab_S8_Wifi_Graphite.png', 3, 124),
(340, 'Pink Rose', 'Samsung_Galaxy_Tab_S8_Wifi_Pink_Rose.png', 3, 124),
(341, 'Silver', 'Samsung_Galaxy_Tab_S8_Wifi_Silver.png', 1, 124),
(342, 'Graphite', 'Samsung_Galaxy_Tab_S8+_Graphite.png', 2, 125),
(343, 'Pink Rose', 'Samsung_Galaxy_Tab_S8+_Pink_Gold.png', 2, 125),
(344, 'Silver', 'Samsung_Galaxy_Tab_S8+_Silver.png', 3, 125),
(345, 'White', 'Huawei_Watch_Fit_2_White.png', 1, 126),
(346, 'Pink', 'Huawei_Watch_Fit_2_Pink.png', 1, 126),
(347, 'Blue', 'Huawei_Watch_Fit_2_Blue.png', 3, 126),
(348, 'Black', 'Huawei_Watch_Fit_2_Black.png', 2, 126),
(349, 'Green', 'Huawei_Watch_GT_3_SE_Green.png', 2, 127),
(350, 'Black', 'Huawei_Watch_GT_3_SE_Black.png', 3, 127),
(351, 'Urban Golden', 'Huawei_GT_Cyber_Urban_Golden_Black.png', 3, 128),
(352, 'Midnight Black', 'Huawei_GT_Cyber_Midnight_Black.png', 1, 128),
(353, 'Silver', 'Samsung_Galaxy_Watch_4_Classic_Bluetooth_46mm_Silver.png', 2, 129),
(354, 'Silver', 'Samsung_Galaxy_Watch_4_Classic_Bluetooth_46mm_Silver.png', 1, 130),
(355, 'Black', 'Samsung_Galaxy_Watch_4_Classic_Bluetooth_46mm_Black.png', 2, 129),
(356, 'Black', 'Samsung_Galaxy_Watch_4_Classic_Bluetooth_46mm_Black.png', 3, 130),
(357, 'Silver', 'Samsung_Galaxy_Watch_5_44mm_Bluetooth_Silver.png', 3, 131),
(358, 'Silver', 'Samsung_Galaxy_Watch_5_44mm_Bluetooth_Silver.png', 1, 132),
(359, 'Sapphire', 'Samsung_Galaxy_Watch_5_44mm_Bluetooth_Sapphire.png', 1, 131),
(360, 'Sapphire', 'Samsung_Galaxy_Watch_5_44mm_Bluetooth_Sapphire.png', 2, 132),
(361, 'Graphite', 'Samsung_Galaxy_Watch_5_44mm_Bluetooth_Graphite.png', 1, 131),
(362, 'Graphite', 'Samsung_Galaxy_Watch_5_44mm_Bluetooth_Graphite.png', 1, 132),
(363, 'Black Titanium', 'Samsung_Galaxy_Watch_5_Pro_Bluetooth_Black_Titanium.png', 2, 133),
(364, 'Grey Titanium', 'Samsung_Galaxy_Watch_5_Pro_Bluetooth__Grey_Titanium.png', 1, 133),
(365, 'White', 'Apple_Magic_Mouse_2_Silver.png', 3, 134),
(366, 'White', 'Apple_Magic_Keyboard_with_Numeric_Keypad_US_English.png', 5, 135),
(367, 'White', 'Apple_Magic_Trackpad.png', 4, 136),
(368, 'White', 'Apple_Pencil_1st_Generation_2022.png', 6, 137),
(369, 'White', 'Apple_Pencil_2nd_Generation.png', 4, 138),
(370, 'White', 'Apple_USB-C_to_USB_Adapter.png', 10, 139),
(371, 'White', 'USB-C_to_Lightning_Cable_1m.png', 5, 140),
(372, 'White', 'Apple_USB-C_Digital_AV_Multiport_Adapter.png', 5, 141),
(373, 'White', 'Apple_MagSafe_Battery_Pack.png', 5, 142),
(374, 'Grey', 'Apple_Magic_Mouse_2_Silver.png', 4, 143),
(375, 'White', 'Apple_Magic_Keyboard_with_Touch_ID_for_Mac_computers_with_Apple_silicon_US_English.png', 5, 144),
(376, 'Grey', 'Apple_MagSafe_Charger.png', 5, 145),
(377, 'Grey', 'Apple_MagSafe_to_MagSafe_2_Converter-ITS.png', 2, 146),
(378, 'White', 'Apple_Watch_Magnetic_Charger_to_USB-C_Cable_1m.png', 3, 147),
(379, 'White', 'Apple_Thunderbolt_to_Gigabit_Ethernet_Adapter.png', 5, 148);

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `prod_detail_id` int(11) NOT NULL,
  `prod_detail_name` text DEFAULT NULL,
  `prod_detail_price` decimal(7,2) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`prod_detail_id`, `prod_detail_name`, `prod_detail_price`, `prod_id`) VALUES
(1, '128GB', 5799.00, 1),
(2, '256GB', 6299.00, 1),
(3, '512GB', 7299.00, 1),
(4, '1TB', 8299.00, 1),
(5, '128GB', 5299.00, 2),
(6, '256GB', 5799.00, 2),
(7, '512GB', 6799.00, 2),
(8, '1TB', 7799.00, 2),
(9, '128GB', 5399.00, 5),
(10, '521GB', 6899.00, 5),
(11, '256GB', 5899.00, 5),
(12, '1TB', 8899.00, 5),
(13, '2TB', 10899.00, 5),
(14, '128GB', 4699.00, 3),
(15, '256GB', 5199.00, 3),
(16, '512GB', 6199.00, 3),
(17, '128GB', 4199.00, 4),
(18, '256GB', 4699.00, 4),
(19, '512GB', 5699.00, 4),
(20, '64GB', 2249.00, 6),
(21, '128GB', 2499.00, 6),
(22, '256GB', 2999.00, 6),
(23, '64GB', 2849.00, 7),
(24, '128GB', 3099.00, 7),
(25, '256GB', 3599.00, 7),
(26, '128GB', 3149.00, 8),
(27, '256GB', 3649.00, 8),
(28, '512GB', 4649.00, 8),
(29, '3+32GB', 419.00, 9),
(30, '4+64GB', 499.00, 9),
(31, '4+128GB', 699.00, 10),
(32, '6+128GB', 749.00, 11),
(33, '6+128GB', 799.00, 12),
(34, '6+128GB', 899.00, 13),
(35, '8+128GB', 999.00, 14),
(36, '8+128GB', 1349.00, 15),
(37, '8+256GB', 1599.00, 16),
(38, '8+256GB', 1699.00, 17),
(39, '8+256GB', 1899.00, 18),
(40, '8+256GB', 2099.00, 19),
(41, '8+128GB', 1699.00, 20),
(42, '8+128GB', 3299.00, 21),
(43, '8+256GB', 3499.00, 21),
(44, '8+128GB', 4699.00, 22),
(45, '12+256GB', 5099.00, 22),
(46, '12+512GB', 5499.00, 22),
(47, '8+128GB', 4099.00, 23),
(48, '8+256GB', 4299.00, 23),
(49, '8+128GB', 3899.00, 24),
(50, '12+256GB', 5699.00, 25),
(51, '8+256GB', 4699.00, 26),
(52, '8+256GB', 3799.00, 27),
(53, '8+128GB', 4099.00, 28),
(54, '8+256GB', 4399.00, 28),
(55, '8+512GB', 4899.00, 28),
(56, '12+256GB', 6799.00, 29),
(57, '12+512GB', 6799.00, 29),
(58, '4+128GB', 1399.00, 30),
(59, '6+128GB', 1799.00, 31),
(60, '6+256GB', 2199.00, 31),
(61, '8+256GB', 4099.00, 32),
(62, '4+128GB', 999.00, 33),
(63, '41mm', 1499.00, 36),
(64, '45mm', 1649.00, 36),
(65, '41mm', 1499.00, 37),
(66, '45mm', 1649.00, 37),
(67, '41mm', 2349.00, 38),
(68, '45mm', 2599.00, 38),
(69, '8+256GB', 3499.00, 39),
(70, '8+256GB', 4299.00, 40),
(71, '8+512GB', 5099.00, 40),
(72, '8+128GB', 479.00, 41),
(73, '8+128GB', 359.00, 42),
(74, '8+256GB', 1599.00, 43),
(75, '8+128GB', 999.00, 44),
(76, '8+256GB', 2999.00, 45),
(77, '8+256GB', 3399.00, 46),
(78, '8+256GB', 4699.00, 47),
(79, '12+512GB', 5499.00, 47),
(80, '8+256GB', 2399.00, 48),
(81, '8+256GB', 1899.00, 49),
(82, '12+256GB', 3099.00, 50),
(83, '12+256GB', 1999.00, 51),
(84, '8+256GB', 2699.00, 52),
(85, '12+256GB', 2999.00, 52),
(86, '12+256GB', 3499.00, 53),
(87, '12+256GB', 4599.00, 54),
(88, '8+128GB', 999.00, 55),
(89, '8+256GB', 1099.00, 55),
(90, '6+128GB', 849.00, 56),
(91, '8+128GB', 899.00, 57),
(92, '', 1099.00, 34),
(93, '', 509.00, 58),
(94, '', 749.00, 59),
(95, '', 239.00, 60),
(96, '', 379.00, 61),
(97, '', 699.00, 62),
(98, '', 1299.00, 63),
(99, '', 499.00, 64),
(100, '', 99.00, 35),
(101, '', 131.00, 65),
(102, '', 89.00, 66),
(103, '', 99.00, 67),
(104, '', 89.00, 68),
(105, '', 319.00, 69),
(106, '', 299.00, 70),
(107, '45mm', 2179.00, 71),
(108, '41mm', 2079.00, 71),
(109, '40mm', 1269.00, 72),
(110, '44mm', 1369.00, 72),
(111, '49mm', 3799.00, 73),
(112, '256GB', 4399.00, 74),
(113, '128GB', 3299.00, 74),
(114, '64', 3149.00, 75),
(115, '256GB', 3899.00, 75),
(116, '64', 2849.00, 76),
(117, '256GB', 3599.00, 76),
(118, '64', 1949.00, 77),
(119, '256GB', 2619.00, 77),
(120, '64', 3199.00, 78),
(121, '256GB', 3899.00, 78),
(122, '64GB', 599.00, 79),
(123, '3+32GB', 999.00, 80),
(124, '8+128GB', 2999.00, 81),
(125, '8+256GB', 3999.00, 82),
(126, '33mm', 599.00, 83),
(127, '46mm', 899.00, 84),
(128, '47mm', 999.00, 85),
(129, '46mm', 1399.00, 86),
(130, '42mm', 1199.00, 86),
(131, '44mm', 999.00, 87),
(132, '40mm', 899.00, 87),
(133, '44mm', 1599.00, 88),
(134, '', 319.00, 89),
(135, '', 489.00, 90),
(136, '', 489.00, 91),
(137, '', 479.00, 92),
(138, '', 539.00, 93),
(139, '', 99.00, 94),
(140, '', 99.00, 95),
(141, '', 349.00, 96),
(142, '', 479.00, 97),
(143, '', 319.00, 98),
(144, '', 549.00, 99),
(145, '', 179.00, 100),
(146, '', 39.00, 101),
(147, '', 149.00, 102),
(148, '', 129.00, 103);

-- --------------------------------------------------------

--
-- Table structure for table `product_specification`
--

CREATE TABLE `product_specification` (
  `prod_spec_id` int(11) NOT NULL,
  `prod_spec_display` text DEFAULT NULL,
  `prod_spec_chipset` text DEFAULT NULL,
  `prod_spec_back_cam` text DEFAULT NULL,
  `prod_spec_front_cam` text DEFAULT NULL,
  `prod_spec_battery` text DEFAULT NULL,
  `prod_spec_others` text DEFAULT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_specification`
--

INSERT INTO `product_specification` (`prod_spec_id`, `prod_spec_display`, `prod_spec_chipset`, `prod_spec_back_cam`, `prod_spec_front_cam`, `prod_spec_battery`, `prod_spec_others`, `prod_id`) VALUES
(1, 'Super Retina XDR display<br>\r\n6.7‑inch (diagonal) all‑screen OLED display<br>\r\n2796x1290-pixel resolution at 460 ppi', 'A16 Bionic chip<br>\r\n6‑core CPU with 2 performance and 4 efficiency cores<br>\r\n5‑core GPU<br>\r\n16‑core Neural Engine', '48MP Main: 24mm, ƒ/1.78 aperture<br>\r\n12MP Ultra Wide: 13mm, ƒ/2.2 aperture and 120° field of view<br>\r\n12MP 2x Telephoto (enabled by quad-pixel sensor): 48mm, ƒ/1.78 aperture<br>\r\n12MP 3x Telephoto: 77mm, ƒ/2.8 aperture', '12MP camera, ƒ/1.9 aperture', 'Up to 50% charge in around 30 minutes11 with 20W adapter or higher (available separately)', '', 1),
(2, 'Super Retina XDR display<br>\r\n6.1‑inch (diagonal) all‑screen OLED display<br>\r\n2556x1179-pixel resolution at 460 ppi', 'A16 Bionic chip<br>\r\n6‑core CPU with 2 performance and 4 efficiency cores<br>\r\n5‑core GPU<br>\r\n16‑core Neural Engine', '48MP Main: 24mm, ƒ/1.78 aperture<br>\r\n12MP Ultra Wide: 13mm, ƒ/2.2 aperture and 120° field of view<br>\r\n12MP 2x Telephoto (enabled by quad-pixel sensor): 48mm, ƒ/1.78 aperture<br>\r\n12MP 3x Telephoto: 77mm, ƒ/2.8 aperture', '12MP camera, ƒ/1.9 aperture', 'Up to 50% charge in around 30 minutes11 with 20W adapter or higher (available separately)', '', 2),
(3, 'Super Retina XDR display<br>\r\n6.7‑inch (diagonal) all‑screen OLED display<br>\r\n2778x1284-pixel resolution at 458 ppi', 'A15 Bionic chip<br>\r\n6‑core CPU with 2 performance and 4 efficiency cores<br>\r\n5‑core GPU<br>\r\n16‑core Neural Engine', '12MP Main: 26mm, ƒ/1.5 aperture<br>\r\n12MP Ultra Wide: 13mm, ƒ/2.4 aperture and 120° field of view', '12MP camera, ƒ/1.9 aperture', 'Up to 50% charge in around 30 minutes11 with 20W adapter or higher (available separately)', '', 3),
(4, 'Super Retina XDR display<br>\r\n6.1‑inch (diagonal) all‑screen OLED display<br>\r\n2532x1170-pixel resolution at 460 ppi', 'A15 Bionic chip<br>\r\n6‑core CPU with 2 performance and 4 efficiency cores<br>\r\n5‑core GPU<br>\r\n16‑core Neural Engine', '12MP Main: 26mm, ƒ/1.5 aperture<br>\r\n12MP Ultra Wide: 13mm, ƒ/2.4 aperture and 120° field of view', '12MP camera, ƒ/1.9 aperture', 'Up to 50% charge in around 30 minutes11 with 20W adapter or higher (available separately)', '', 4),
(5, 'Liquid Retina XDR display<br>\r\n12.9-inch (diagonal) mini-LED-backlit Multi‑Touch display with IPS technology<br>\r\n2D backlighting system with 2,596 full‑array local dimming zones<br>\r\n2732x2048-pixel resolution at 264 pixels per inch (ppi)<br>\r\nProMotion technology<br>\r\nWide colour display (P3)<br>\r\nTrue Tone display<br>\r\nFingerprint-resistant oleophobic coating<br>\r\nFully laminated display<br>\r\nAnti-reflective coating<br>\r\n1.8% reflectivity<br>\r\nSDR brightness: 600 nits max<br>\r\nXDR brightness: 1,000 nits max full screen, 1,600 nits peak (HDR content only)<br>\r\n1,000,000:1 contrast ratio<br>\r\nSupports Apple Pencil (2nd generation)<br>\r\nApple Pencil hover', 'Apple M2 chip<br>\r\n8-core CPU with 4 performance cores and 4 efficiency cores<br>\r\n10-core GPU<br>\r\n16‑core Neural Engine<br>\r\n100GB/s memory bandwidth<br>\r\n8GB RAM on models with 128GB, 256GB or 512GB storage<br>\r\n16GB RAM on models with 1TB or 2TB storage', 'Pro camera system: Wide and Ultra Wide cameras<br>\r\nWide: 12MP, ƒ/1.8 aperture<br>\r\nUltra Wide: 10MP, ƒ/2.4 aperture and 125° field of view', '12MP Ultra Wide camera, 122° field of view<br>\r\nƒ/2.4 aperture', 'Built-in 40.88-watt-hour rechargeable lithium-polymer battery', '', 5),
(6, 'Retina HD display<br>\r\n4.7-inch (diagonal) widescreen LCD<br>\r\n1334x750-pixel resolution at 326 ppi', 'A15 Bionic chip<br>\r\n6-core CPU with 2 performance and 4 efficiency cores<br>\r\n4-core GPU<br>\r\n16-core Neural Engine', '12MP Main camera', '7MP camera ƒ/2.2 aperture', 'Up to 50% charge in 30 minutes8 with 20W adapter or higher (sold separately)', '', 6),
(7, 'Super Retina XDR display<br>\r\n6.1‑inch (diagonal) all‑screen OLED display<br>\r\n2532x1170-pixel resolution at 460 ppi', 'A14 Bionic chip<br>\r\n6-core CPU with 2 performance and 4 efficiency cores<br>\r\n4-core GPU<br>\r\n16-core Neural Engine', '12 MP Main: ƒ/1.6 aperture<br>\r\n12 MP Ultra Wide: ƒ/2.4 aperture and 120° field of view', '12-megapixel camera ƒ/2.2 aperture', 'Up to 50% charge in 30 minutes10 with 20W adapter or higher (sold separately)', '', 7),
(8, 'Super Retina XDR display<br>\r\n6.1‑inch (diagonal) all‑screen OLED display<br>\r\n2532x1170-pixel resolution at 460 ppi', 'A15 Bionic chip<br>\r\n6-core CPU with 2 performance and 4 efficiency cores<br>\r\n4-core GPU<br>\r\n16-core Neural Engine', '12 MP Main: ƒ/1.6 aperture<br>\r\n12 MP Ultra Wide: ƒ/2.4 aperture and 120° field of view', '12-megapixel camera ƒ/2.2 aperture', 'Up to 50% charge in 30 minutes10 with 20W adapter or higher (available separately)', '', 8),
(9, 'PLS IPS<br>\r\n6.5 inches<br>\r\n720 x 1600 pixels', 'Octa-core (2x1.6 GHz & 6x1.6 GHz)', '48 MP, f/1.8, (wide), AF<br>\r\n2 MP, f/2.4, (depth)', '5MP camera, ƒ/2.2 aperture', 'Li-Po 5000 mAh', '', 9),
(10, 'PLS IPS<br>\r\n6.5 inches<br>\r\n720 x 1600 pixels', 'Octa-core (4x2.0 GHz Cortex-A55 & 4x2.0 GHz Cortex-A55)<br>\r\nExynos 850 (8nm)<br>\r\nMali-G52', '50 MP, f/1.8, (wide), PDAF<br>\r\n2 MP, f/2.4, (macro)<br>\r\n2 MP, f/2.4, (depth)', '5MP camera, ƒ/2.2 aperture', 'Li-Po 5000 mAh', '', 10),
(11, 'PLS TFT<br>\r\n6.6 inches<br>\r\n1080 x 2408 pixels', 'Octa-core (2.2 GHz & 2.0 GHz)<br>\r\nExynos 850 (8nm)', '50 MP, f/1.8, (wide), PDAF<br>\r\n5 MP, f/2.2, 123˚ (ultrawide), 1/5\", 1.12µm<br>\r\n2 MP, f/2.4, (macro)<br>\r\n2 MP, f/2.4, (depth)', '8MP camera, ƒ/2.2 aperture', 'Li-Po 5000 mAh', '', 11),
(12, 'PLS LCD<br>\r\n6.6 inches<br>\r\n1080 x 2408 pixels', 'Octa-core (4x2.0 GHz Cortex-A55 & 4x2.0 GHz Cortex-A55)<br>\r\nExynos 850 (8nm)<br>\r\nMali-G52', '50 MP, f/1.8, (wide), PDAF<br>\r\n5 MP, f/2.2, (ultrawide)<br>\r\n2 MP, f/2.4, (macro)', '13MP camera, ƒ/2.0 aperture', 'Li-Po 5000 mAh', '', 12),
(13, 'PLS LCD<br>\r\n6.6 inches<br>\r\n1080 x 2408 pixels', 'Octa-core (4x2.4 GHz Kryo 265 Gold & 4x1.9 GHz Kryo 265 Silver)<br>\r\nQualcomm SM6225 Snapdragon 680 4G (6 nm)<br>\r\nAdreno 610', '50 MP, f/1.8, (wide), PDAF<br>\r\n5 MP, f/2.2, 123˚ (ultrawide), 1/5\", 1.12µm<br>\r\n5 MP, f/2.2, (ultrawide)<br>\r\n2 MP, f/2.4, (macro)', '8MP camera, ƒ/2.0 aperture', 'Li-Po 5000 mAh', '', 13),
(14, 'Super AMOLED<br>\r\n6.5 inches<br>\r\n1080 x 2340 pixels', 'Octa-core (2x2.2 GHz Cortex-A76 & 6x2.0 GHz Cortex-A55)<br>\r\nMediatek MT8781 Helio G99 (6nm)<br>\r\nMali-G57 MC2', '50 MP, f/1.8, (wide), PDAF<br>\r\n5 MP, f/2.2, (ultrawide)<br>\r\n2 MP, f/2.4, (macro)', '13MP camera, ƒ/2.2 aperture', 'Li-Po 5000 mAh', '', 14),
(15, 'Super AMOLED<br>\r\n6.4 inches<br>\r\n1080 x 2400 pixels', 'Octa-core (2.4 GHz & 2.0 GHz)<br>\r\nExynos 1280', '48 MP, f/1.8, 26mm (wide), 1/2.0\", 0.8µm, PDAF, OIS<br>\r\n8 MP, f/2.2, 123˚, (ultrawide), 1/4.0\", 1.12µm<br>\r\n5 MP, f/2.4, (macro)<br>\r\n2 MP, f/2.4, (depth)', '13MP camera, ƒ/2.2 aperture', 'Li-Po 5000 mAh', '', 15),
(16, 'Super AMOLED<br>\r\n6.6 inches<br>\r\n1080 x 2340 pixels', 'Octa-core (2x2.6 GHz Cortex-A78 & 6x2.0 GHz Cortex-A55)<br>\r\nMediatek MT6877V Dimensity 1080 (6 nm)<br>\r\nMali-G68 MC4', '48 MP, f/1.8, 26mm (wide), 1/2.0\", 0.8µm, PDAF, OIS<br>\r\n5 MP, f/2.4, (macro)<br>\r\n2 MP, f/2.4, (depth)', '13MP camera, ƒ/2.2 aperture', 'Li-Po 5000 mAh', '', 16),
(17, 'Super AMOLED<br>\r\n6.5 inches<br>\r\n1080 x 2400 pixels', 'Octa-core (2.4 GHz & 2.0 GHz)<br>\r\nExynos 1280<br>\r\nMali-G68 MC4', '64 MP, f/1.8, 26mm (wide), 1/1.7X\", 0.8µm, PDAF, OIS<br>\r\n12 MP, f/2.2, 123˚ (ultrawide), 1.12µm<br>\r\n5 MP, f/2.4, (macro)<br>\r\n5 MP, f/2.4, (depth)', '32MP camera, ƒ/2.2 aperture', 'Li-Po 5000 mAh', '', 17),
(18, 'Super AMOLED<br>\r\n6.4 inches<br>\r\n1080 x 2340 pixels', 'Octa-core (4x2.4 GHz Cortex-A78 & 4x2.0 GHz Cortex-A55)<br>\r\nExynos 1380 (5 nm)<br>\r\nMali-G68 MP5', '50 MP, f/1.8, 26mm (wide), 1/1.7X\", 0.8µm, PDAF, OIS<br>\r\n12 MP, f/2.4, (macro)<br>\r\n5 MP, f/2.4, (depth)', '32MP camera, ƒ/2.2 aperture', 'Li-Po 5000 mAh', '', 18),
(19, 'Super AMOLED<br>\r\n6.7 inches<br>\r\n1080 x 2400 pixels', 'Octa-core (4x2.4 GHz Kryo 670 & 4x1.8 GHz Kryo 670)<br>\r\nQualcomm SM7325 Snapdragon 778G 5G (6 nm)<br>\r\nAdreno 642L', '108 MP, f/1.8, (wide), PDAF, OIS<br>\r\n12 MP, f/2.2, (ultrawide)<br>\r\n5 MP, f/2.4, (macro)<br>\r\n5 MP, f/2.4, (depth)', '32MP camera, ƒ/2.2 aperture', 'Li-Po 5000 mAh', '', 19),
(20, 'Super AMOLED<br>\r\n6.7 inches<br>\r\n1080 x 2400 pixels', 'Octa-core (4x2.4 GHz Kryo 670 & 4x1.8 GHz Kryo 670)<br>\r\nQualcomm SM7325 Snapdragon 778G 5G (6 nm)<br>\r\nAdreno 642L', '64 MP, f/1.8, (wide), PDAF, OIS<br>\r\n12 MP, f/2.2, (ultrawide)<br>\r\n5 MP, f/2.4, (depth)', '32MP camera, ƒ/2.2 aperture', 'Li-Po 5000 mAh', '', 20),
(21, 'Dynamic AMOLED 2X<br>\r\n6.1 inches<br>\r\n1080 x 2340 pixels', 'Octa-core (1x3.00 GHz Cortex-X2 & 3x2.40 GHz Cortex-A710 & 4x1.70 GHz Cortex-A510)<br>\r\nQualcomm SM8450 Snapdragon 8 Gen 1 (4 nm)<br>\r\nAdreno 730', '50 MP, f/1.8, 24mm (wide), 1/1.56\", 1.0µm, Dual Pixel PDAF, OIS<br>\r\n10 MP, f/2.4, 70mm (telephoto), 1/3.94\", 1.0µm, PDAF, OIS, 3x optical zoom<br>\r\n12 MP, f/2.2, 13mm, 120˚ (ultrawide), 1/2.55\" 1.4µm, Super Steady video', '10MP camera, ƒ/2.2 aperture', 'Li-Po 3700 mAh', '', 21),
(22, 'Dynamic AMOLED 2X<br>\r\n6.8 inches<br>\r\n1440 x 3080 pixels', 'Octa-core (1x3.00 GHz Cortex-X2 & 3x2.50 GHz Cortex-A710 & 4x1.80 GHz Cortex-A510)<br>\r\nQualcomm SM8450 Snapdragon 8 Gen 1 (4 nm)<br>\r\nAdreno 730', '108 MP, f/1.8, 24mm (wide), 1/1.33\", 0.8µm, PDAF, Laser AF, OIS <br>\r\n10 MP, f/4.9, 230mm (periscope telephoto), 1/3.52\", 1.12µm, dual pixel PDAF, OIS, 10x optical zoom <br>\r\n10 MP, f/2.4, 70mm (telephoto), 1/3.52\", 1.12µm, dual pixel PDAF, OIS, 3x optical zoom <br>\r\n12 MP, f/2.2, 13mm, 120˚ (ultrawide), 1/2.55\", 1.4µm, dual pixel PDAF, Super Steady video', '40MP camera, ƒ/2.2 aperture', 'Li-Po 5000 mAh', '', 22),
(23, 'Dynamic AMOLED 2X<br>\r\n6.6 inches<br>\r\n1080 x 2340 pixels', 'Octa-core (1x3.00 GHz Cortex-X2 & 3x2.50 GHz Cortex-A710 & 4x1.80 GHz Cortex-A510)<br>\r\nQualcomm SM8450 Snapdragon 8 Gen 1 (4 nm)<br>\r\nAdreno 730', '50 MP, f/1.8, 24mm (wide), 1/1.56\", 1.0µm, Dual Pixel PDAF, OIS<br>\r\n10 MP, f/2.4, 70mm (telephoto), 1/3.94\", 1.0µm, PDAF, OIS, 3x optical zoom<br>\r\n12 MP, f/2.2, 13mm, 120˚ (ultrawide), 1/2.55\" 1.4µm, Super Steady video', '10MP camera, ƒ/2.2 aperture', 'Li-Po 4500 mAh', '', 23),
(24, 'Dynamic AMOLED 2X<br>\r\n6.1 inches<br>\r\n1080 x 2340 pixels', 'Octa-core (1x3.36 GHz Cortex-X3 & 2x2.8 GHz Cortex-A715 & 2x2.8 GHz Cortex-A710 & 3x2.0 GHz Cortex-A510)<br>\r\nQualcomm SM8550 Snapdragon 8 Gen 2 (4 nm)<br>\r\nAdreno 740', '50 MP, f/1.8, 24mm (wide), 1/1.56\", 1.0µm, Dual Pixel PDAF, OIS<br>\r\n10 MP, f/2.4, 70mm (telephoto), 1/3.94\", 1.0µm, PDAF, 3x optical zoom<br>\r\n12 MP, f/2.2, 13mm, 120˚ (ultrawide), 1/2.55\" 1.4µm, Super Steady video', '12MP camera, ƒ/2.2 aperture', 'Li-Po 3900 mAh', '', 24),
(25, 'Dynamic AMOLED 2X<br>\r\n6.8 inches<br>\r\n1440 x 3088 pixels', 'Octa-core (1x3.36 GHz Cortex-X3 & 2x2.8 GHz Cortex-A715 & 2x2.8 GHz Cortex-A710 & 3x2.0 GHz Cortex-A510)<br>\r\nQualcomm SM8550 Snapdragon 8 Gen 2 (4 nm)<br>\r\nAdreno 740', '200 MP, f/1.7, 24mm (wide), 1/1.3\", 0.6µm, multi-directional PDAF, Laser AF, OIS<br>\r\n10 MP, f/4.9, 230mm (periscope telephoto), 1/3.52\", 1.12µm, Dual Pixel PDAF, OIS, 10x optical zoom<br>\r\n10 MP, f/2.4, 70mm (telephoto), 1/3.52\", 1.12µm, Dual Pixel PDAF, OIS, 3x optical zoom<br>\r\n12 MP, f/2.2, 13mm, 120˚ (ultrawide), 1/2.55\", 1.4µm, Dual Pixel PDAF, Super Steady video', '12MP camera, ƒ/2.2 aperture', 'Li-Po 5000 mAh', '', 25),
(26, 'Dynamic AMOLED 2X<br>\r\n6.6 inches<br>\r\n1080 x 2340 pixels', 'Octa-core (1x3.36 GHz Cortex-X3 & 2x2.8 GHz Cortex-A715 & 2x2.8 GHz Cortex-A710 & 3x2.0 GHz Cortex-A510)<br>\r\nQualcomm SM8550 Snapdragon 8 Gen 2 (4 nm)<br>\r\nAdreno 740', '50 MP, f/1.8, 24mm (wide), 1/1.56\", 1.0µm, Dual Pixel PDAF, OIS<br>\r\n10 MP, f/2.4, 70mm (telephoto), 1/3.94\", 1.0µm, PDAF, 3x optical zoom<br>\r\n12 MP, f/2.2, 13mm, 120˚ (ultrawide), 1/2.55\" 1.4µm, Super Steady video', '12MP camera, ƒ/2.2 aperture', 'Li-Po 4700 mAh', '', 26),
(27, 'Foldable Dynamic AMOLED 2X<br>\r\n6.7 inches<br>\r\n1080 x 2640 pixels<br>\r\nSuper AMOLED<br>\r\n1.9 inches<br>\r\n260 x 512 pixels', 'Octa-core (1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680)<br>\r\nQualcomm SM8350 Snapdragon 888 5G (5 nm)<br>\r\nAdreno 660', '12 MP, f/1.8, 27mm (wide), 1/2.55\", 1.4µm, Dual Pixel PDAF, OIS<br>\r\n12 MP, f/2.2, 123˚ (ultrawide), 1.12µm', '10MP camera, ƒ/2.4 aperture', 'Li-Po 3300 mAh', '', 27),
(28, 'Foldable Dynamic AMOLED 2X<br>\r\n6.7 inches<br>\r\n1080 x 2640 pixels<br>\r\nSuper AMOLED<br>\r\n1.9 inches<br>\r\n260 x 512 pixels', 'Octa-core (1x3.19 GHz Cortex-X2 & 3x2.75 GHz Cortex-A710 & 4x1.80 GHz Cortex-A510)<br>\r\nQualcomm SM8475 Snapdragon 8+ Gen 1 (4 nm)<br>\r\nAdreno 730', '12 MP, f/1.8, 27mm (wide), 1/2.55\", 1.4µm, Dual Pixel PDAF, OIS<br>\r\n12 MP, f/2.2, 123˚ (ultrawide), 1.12µm', '10MP camera, ƒ/2.4 aperture', 'Li-Po 3700 mAh', '', 28),
(29, 'Foldable Dynamic AMOLED 2X<br>\r\n7.6 inches / 6.2 inches<br>\r\n1812 x 2176 pixels / 904 x 2316', 'Octa-core (1x3.19 GHz Cortex-X2 & 3x2.75 GHz Cortex-A710 & 4x1.80 GHz Cortex-A510)<br>\r\nQualcomm SM8475 Snapdragon 8+ Gen 1 (4 nm)<br>\r\nAdreno 670', '50 MP, f/1.8, 24mm (wide), 1.0µm, Dual Pixel PDAF, OIS<br>\r\n10 MP, f/2.4, 67mm (telephoto), 1.0µm, PDAF, OIS, 3x optical zoom<br>\r\n12 MP, f/2.2, 123˚, 12mm (ultrawide), 1.12µm', '10MP camera, ƒ/2.2 aperture', 'Li-Po 4400 mAh', '', 29),
(30, 'IPS LCD<br>\r\n10.4 inches, 307.9 cm (~81.0% screen-to-body ratio)<br>\r\n1200 x 2000 pixels, 5:3 ratio (~224 ppi density)', 'Android 10, EMUI 10, no Google Play Services<br>\r\nKirin 810 (7 nm)<br>\r\nOcta-core (2x2.27 GHz Cortex-A76 & 6x1.88 GHz Cortex-A55)<br>\r\nMali-G52 MP6', '8 MP, AF', '8 MP', 'Li-Po 7250 mAh', '', 30),
(31, 'IPS LCD<br>\r\n10.95 inches, 347.7 cm (~82.9% screen-to-body ratio)<br>\r\n2560 x 1600 pixels, 16:10 ratio (~276 ppi density)', 'HarmonyOS 2.0, upgradable to 3.0<br>\r\nQualcomm SM8250 Snapdragon 865 (7 nm+)<br>\r\nOcta-core (1x2.84 GHz Cortex-A77 & 3x2.42 GHz Cortex-A77 & 4x1.80 GHz Cortex-A55)<br>\r\nAdreno 650', '13 MP, f/1.8', '8 MP', 'Li-Po 7250 mAh', '', 31),
(32, 'IPS LCD<br>\r\n10.8 inches, 338.2 cm (~86.5% screen-to-body ratio)<br>\r\n2560 x 1600 pixels, 16:10 ratio (~276 ppi density)', 'Android 10, EMUI 10, no Google Play Services<br>\r\nKirin 990 (7 nm+)<br>\r\nOcta-core (2x2.86 GHz Cortex-A76 & 2x2.09 GHz Cortex-A76 & 4x1.86 GHz Cortex-A55)<br>\r\nMali-G76 MP16', '13 MP, f/1.8', '8 MP', 'Li-Po 7250 mAh', '', 32),
(33, 'IPS LCD<br>\r\n10.1 inches, 295.8 cm (~77.4% screen-to-body ratio)<br>\r\n1200 x 1920 pixels, 16:10 ratio (~224 ppi density)', 'HarmonyOS 2.0<br>\r\nKirin 710A (14 nm)<br>\r\nOcta-core (4x2.0 GHz Cortex-A73 & 4x1.7 GHz Cortex-A53)<br>\r\nMali-G51 MP4', '5 MP, f/2.2', '2 MP', 'Li-Po 5100 mAh', '', 33),
(34, '', 'Apple H2 headphone chip<br>\r\nApple U1 chip in MagSafe Charging Case', '', '', 'Up to 6 hours of listening time on a single charge', '', 34),
(35, '', '', '', '', '', '', 35),
(36, '45mm<br>\r\n396 by 484 pixels<br>\r\n1143 sq mm display area<br>\r\nAlways-On Retina LTPO OLED display<br>\r\n1000 nits brightness', 'S7 with 64-bit dual-core processor<br>\r\nW3<br>\r\nU1 chip', '', '', 'Built-in rechargeable lithium-ion battery Up to 18 hours', '', 36),
(37, '45mm<br>\r\n396 by 484 pixels<br>\r\n1143 sq mm display area<br>\r\nAlways-On Retina LTPO OLED display<br>\r\n1000 nits brightness', 'S7 with 64-bit dual-core processor<br>\r\nW3<br>\r\nU1 chip', '', '', 'Built-in rechargeable lithium-ion battery Up to 18 hours', '', 37),
(38, '45mm<br>\r\n396 by 484 pixels<br>\r\n1143 sq mm display area<br>\r\nAlways-On Retina LTPO OLED display<br>\r\n1000 nits brightness', 'S7 with 64-bit dual-core processor<br>\r\nW3<br>\r\nU1 chip', '', '', 'Built-in rechargeable lithium-ion battery Up to 18 hours', '', 38),
(39, '6.7 inches, OLED, 1.07B colors, 90Hz<br>\r\n2700 × 1224 Pixels', 'Qualcomm SM8475 Snapdragon 8+ Gen 1 4G (4 nm)<br>\r\nOcta-core (1x3.19 GHz Cortex-X2 & 3x2.75 GHz Cortex-A710 & 4x2.0 GHz Cortex-A510)<br>\r\nAdreno 730', '50 MP, f/1.4-f/4.0, 24mm (wide), PDAF, Laser AF<br>\r\n12 MP, f/3.4, 125mm (periscope telephoto), PDAF, OIS, 5x optical zoom<br>\r\n13 MP, f/2.2, 13mm, 120˚ (ultrawide), PDAF', '13 MP, f/2.4, 18mm (ultrawide)', 'Li-Po 4460 mAh', '', 39),
(40, '6.74 inches, OLED, 1.07B colors, 90Hz<br>\r\n2616 × 1212 Pixels', 'Snapdragon 8+ Gen 1 4G Mobile Platform<br>\r\nOcta-core, 1 × Cortex-X2@3.2 GHz + 3 × Cortex-A710@2.75 GHz + 4 × Cortex-A510@2.0 GHz<br>\r\nAdreno<br>\r\n7th Gen Qualcomm AI Engine<br>', '50 MP Ultra Aperture Camera (F1.4~F4.0 aperture, OIS)<br>\r\n13 MP Ultra-Wide Angle Camera (F2.2 aperture)<br>\r\n64 MP Telephoto Camera (F3.5 aperture, OIS)', '13 MP Ultra-Wide Angle Camera (F2.4)<br>\r\n3D Depth Sensing Camera', 'Li-Po 4700mAh', '', 40),
(41, '6.57 inches, OLED, 1B colors, HDR10, 90Hz<br>\r\n1080 x 2340 pixels', 'Kirin 985 5G (7 nm)<br>\r\nOcta-core (1x2.58 GHz Cortex-A76 & 3x2.40 GHz Cortex-A76 & 4x1.84 GHz Cortex-A55)<br>\r\nMali-G77 (8-core)', '64 MP, f/1.9, 26mm (wide), PDAF<br>\r\n8 MP, f/2.4, 120˚, 17mm (ultrawide)<br>\r\n2 MP, f/2.4, (depth)<br>\r\n2 MP, f/2.4, (macro)', '32 MP, f/2.0, 26mm (wide)', 'Li-Po 3800 mAh', '', 41),
(42, '6.67 inches, IPS LCD<br>\r\n1080 x 2376 pixels', 'Qualcomm SM6115 Snapdragon 662 (11 nm)<br>\r\nOcta-core (4x2.0 GHz Kryo 260 Gold & 4x1.8 GHz Kryo 260 Silver)<br>\r\nAdreno 610', '64 MP, f/1.9, 26mm (wide), PDAF<br>\r\n8 MP, f/2.4, 120˚, 17mm (ultrawide)<br>\r\n2 MP, f/2.4, (macro)<br>\r\n2 MP, f/2.4, (depth)', '16 MP, f/2.0, (wide)', 'Li-Po 4300 mAh', '', 42),
(43, '6.57 inches, OLED, 1B colors, 120Hz, HDR10<br>\r\n1080 x 2340 pixels', 'Qualcomm SM7325 Snapdragon 778G 4G (6 nm)<br>\r\nOcta-core (4x2.4 GHz Kryo 670 & 4x1.8 GHz Kryo 670)<br>\r\nAdreno 642L', '50 MP, f/1.9, 23mm (wide), PDAF<br>\r\n8 MP, f/2.2, (ultrawide)<br>\r\n2 MP, f/2.4, (depth)<br>\r\n2 MP, f/2.4, (macro)', '32 MP, f/2.0, (wide)', 'Li-Po 4300 mAh', '', 43),
(44, '6.7 inches, IPS LCD, 90Hz<br>\r\n1080 x 2388 pixels', 'Qualcomm SM6225 Snapdragon 680 4G (6 nm)<br>\r\nOcta-core (4x2.4 GHz Kryo 265 Gold & 4x1.9 GHz Kryo 265 Silver)<br>\r\nAdreno 610', '50 MP, f/1.8, (wide), PDAF<br>\r\n2 MP, f/2.4, (macro)<br>\r\n2 MP, f/2.4, (depth)', '8 MP, f/2.0', 'Li-Po 5000 mAh', '', 44),
(45, '6.5 inches, OLED, 1B colors, 90Hz<br>\r\n1224 x 2700 pixels', 'Qualcomm SM8350 Snapdragon 888 4G (5 nm)<br>\r\nOcta-core (1x2.84 GHz Cortex-X1 & 3x2.42 GHz Cortex-A78 & 4x1.80 GHz Cortex-A55)<br>\r\nAdreno 660', '50 MP, f/1.8, 23mm (wide), PDAF, Laser AF, OIS<br>\r\n12 MP, f/3.4, 125mm (periscope telephoto), PDAF, OIS, 5x optical zoom<br>\r\n13 MP, f/2.2, 16mm (ultrawide)', '13 MP, f/2.4, (wide)', 'Li-Po 4100 mAh', '', 45),
(46, '6.6 inches, OLED, 1B colors, 120Hz<br>\r\n1228 x 2700 pixels', 'Kirin 9000 (5 nm) / Qualcomm SM8350 Snapdragon 888 4G (5 nm)<br>\r\nOcta-core (1x3.13 GHz Cortex-A77 & 3x2.54 GHz Cortex-A77 & 4x2.05 GHz Cortex-A55) /<br>\r\nOcta-core (1x2.84 GHz Cortex-X1 & 3x2.42 GHz Cortex-A78 & 4x1.80 GHz Cortex-A55)<br>\r\nAdreno 660', '50 MP, f/1.8, 23mm (wide), PDAF, Laser AF, OIS<br>\r\n64 MP, f/3.5, 90mm (periscope telephoto), PDAF, OIS, 3.5x optical zoom, 7x lossless zoom<br>\r\n13 MP, f/2.2, 13mm (ultrawide), AF<br>\r\n40 MP, f/1.6, 23mm (B/W), AF', '13 MP, f/2.4, (wide), AF', 'Li-Po 4360 mAh', '', 46),
(47, '6.67 inches, LTPO OLED, 1B colors, 120Hz<br>\r\n1220 x 2700 pixels', 'Qualcomm SM8475 Snapdragon 8+ Gen 1 4G (4 nm)<br>\r\nOcta-core (1x3.19 GHz Cortex-X2 & 3x2.75 GHz Cortex-A710 & 4x2.0 GHz Cortex-A510)<br>\r\nAdreno 730', '48 MP, f/1.4-f/4.0, 25mm (wide), PDAF, Laser AF, OIS<br>\r\n48 MP, f/2.1, 90mm (telephoto), PDAF, sensor-shift OIS, 3.5x optical zoom<br>\r\n13 MP, f/2.2, 13mm (ultrawide), AF', '13 MP, f/2.4, (ultrawide)', 'Li-Po 4815 mAh', '', 47),
(48, 'Corning Gorilla Glass Victus<br>\r\n6.28 inches<br>\r\n1080 x 2400 pixels', 'Octa-core (1x3.00 GHz Cortex-X2 & 3x2.50 GHz Cortex-A710 & 4x1.80 GHz Cortex-A510)<br>\r\nQualcomm SM8450 Snapdragon 8 Gen 1 (4 nm)<br>\r\nAdreno 730', '50 MP, f/1.9, 26mm (wide), 1/1.56\", 1.0µm, PDAF, OIS<br>\r\n13 MP, f/2.4, 12mm, 123˚ (ultrawide), 1/3.06\", 1.12µm<br>\r\n5 MP, f/2.4, 50mm (telephoto macro), AF', '32MP camera, ƒ/2.5 aperture', 'Li-Po 4500 mAh', '', 48),
(49, 'AMOLED<br>\r\n6.55 inches<br>\r\n1080 x 2400 pixels', 'Octa-core (4x2.4 GHz Kryo 670 & 4x1.8 GHz Kryo 670)<br>\r\nQualcomm SM7325 Snapdragon 778G 5G (6 nm)<br>\r\nAdreno 642L', '108 MP, f/1.9, 26mm (wide), 1/1.52\", 0.7µm, PDAF<br>\r\n8 MP, f/2.2, 120˚ (ultrawide), 1/4.0\", 1.12µm<br>\r\n2 MP, f/2.4, (macro)', '32MP camera, ƒ/2.5 aperture', 'Li-Po 4500 mAh', '', 49),
(50, 'LTPO AMOLED<br>\r\n6.73 inches<br>\r\n1440 x 3200 pixels', 'Octa-core (1x3.00 GHz Cortex-X2 & 3x2.50 GHz Cortex-A710 & 4x1.80 GHz Cortex-A510)<br>\r\nQualcomm SM8450 Snapdragon 8 Gen 1 (4 nm)<br>\r\nAdreno 730', '108 MP, f/1.9, 26mm (wide), 1/1.52\", 0.7µm, PDAF<br>\r\n8 MP, f/2.2, 120˚ (ultrawide), 1/4.0\", 1.12µm<br>\r\n2 MP, f/2.4, (macro)', '32MP camera, ƒ/2.5 aperture', 'Li-Po 4500 mAh', '', 50),
(51, 'AMOLED<br>\r\n6.67 inches<br>\r\n1220 x 2712 pixels', 'Octa-core (4x2.85 GHz Cortex-A78 & 4x2.0 GHz Cortex-A55)<br>\r\nMediaTek Dimensity 8100-Ultra<br>\r\nMali-G610 MC6', '108 MP, f/1.9, 26mm (wide), 1/1.52\", 0.7µm, PDAF<br>\r\n8 MP, f/2.2, 120˚ (ultrawide), 1/4.0\", 1.12µm<br>\r\n2 MP, f/2.4, (macro)', '20MP camera, ƒ/2.5 aperture', 'Li-Po 5000 mAh', '', 51),
(52, 'AMOLED<br>\r\n6.67 inches<br>\r\n1220 x 2712 pixels', 'Octa-core (4x2.85 GHz Cortex-A78 & 4x2.0 GHz Cortex-A55)<br>\r\nMediaTek Dimensity 8100-Ultra<br>\r\nAdreno 730', '200 MP, f/1.9, 26mm (wide), 1/1.52\", 0.7µm, PDAF<br>\r\n8 MP, f/2.2, 120˚ (ultrawide), 1/4.0\", 1.12µm<br>\r\n2 MP, f/2.4, (macro)', '20MP camera, ƒ/2.5 aperture', 'Li-Po 5000 mAh', '', 52),
(53, 'AMOLED<br>\r\n6.36 inches<br>\r\n1080 x 2400 pixels', 'Octa-core (1x3.2 GHz Cortex-X3 & 2x2.8 GHz Cortex-A715 & 2x2.8 GHz Cortex-A710 & 3x2.0 GHz Cortex-A510)<br>\r\nQualcomm SM8550-AB Snapdragon 8 Gen 2 (4 nm)<br>\r\nAdreno 740', '50 MP, f/1.8, 23mm (wide), 1/1.49\", 1.0µm, PDAF, OIS<br>\r\n10 MP, f/2.0, 75mm (telephoto), 1/3.75\", 1.0µm, PDAF, OIS, 3.2x optical zoom<br>\r\n12 MP, f/2.2, 15mm, 120˚ (ultrawide), 1/3.06\", 1.12µm', '32MP camera, ƒ/2.0 aperture', 'Li-Po 4500 mAh', '', 53),
(54, 'AMOLED<br>\r\n6.73 inches<br>\r\n1440 x 3200 pixels', 'Octa-core (1x3.2 GHz Cortex-X3 & 2x2.8 GHz Cortex-A715 & 2x2.8 GHz Cortex-A710 & 3x2.0 GHz Cortex-A510)<br>\r\nQualcomm SM8550-AB Snapdragon 8 Gen 2 (4 nm)<br>\r\nAdreno 740', '50 MP, f/1.8, 23mm (wide), 1/1.49\", 1.0µm, PDAF, OIS<br>\r\n50 MP, f/2.0, 75mm (telephoto), 1/3.75\", 1.0µm, PDAF, OIS, 3.2x optical zoom<br>\r\n50 MP, f/2.2, 15mm, 120˚ (ultrawide), 1/3.06\", 1.12µm', '32MP camera, ƒ/2.0 aperture', 'Li-Po 4500 mAh', '', 54),
(55, 'AMOLED<br>\r\n6.55 inches<br>\r\n1080 x 2400 pixels', 'Octa-core (2x2.3 GHz Kryo 470 Gold & 6x1.8 GHz Kryo 470 Silver)<br>\r\nQualcomm SM7150 Snapdragon 732G (8 nm)<br>\r\nAdreno 618', '64 MP, f/1.8, 26mm (wide), 1/1.97\", 0.7µm, PDAF<br>\r\n8 MP, f/2.2, 119˚ (ultrawide), 1/4.0\", 1.12µm<br>\r\n5 MP, f/2.4, (macro), AF', '16MP camera, ƒ/2.0 aperture', 'Li-Po 4500 mAh', '', 55),
(56, 'AMOLED<br>\r\n6.43 inches<br>\r\n1080 x 2400 pixels', 'Octa-core (2x2.05 GHz Cortex-A76 & 6x2.0 GHz Cortex-A55)<br>\r\nMediatek Helio G96 (12 nm)<br>\r\nMali-G57 MC2', '108 MP, f/1.9, 26mm (wide), 1/1.52\", 0.7µm, PDAF<br>\r\n8 MP, f/2.2, 118˚ (ultrawide)<br>\r\n2 MP, f/2.4, (macro)<br>\r\n2 MP, f/2.4, (depth)', '16MP camera, ƒ/2.5 aperture', 'Li-Po 4500 mAh', '', 56),
(57, 'AMOLED<br>\r\n6.43 inches<br>\r\n1080 x 2400 pixels', 'OcOcta-core (2x2.05 GHz Cortex-A76 & 6x2.0 GHz Cortex-A55)<br>\r\nMediatek Helio G96 (12 nm)<br>\r\nMali-G57 MC2', '108 MP, f/1.9, 26mm (wide), 1/1.52\", 0.7µm, PDAF<br>\r\n8 MP, f/2.2, 118˚ (ultrawide)<br>\r\n2 MP, f/2.4, (macro)<br>\r\n2 MP, f/2.4, (depth)', '16MP camera, ƒ/2.5 aperture', 'Li-Po 4500 mAh', '', 57),
(58, '', '', '', '', '', '', 58),
(59, '', '', '', '', '', '', 59),
(60, '', '', '', '', '', '', 60),
(61, '', '', '', '', '', '', 61),
(62, '', '', '', '', '', '', 62),
(63, '', '', '', '', '', '', 63),
(64, '', '', '', '', '', '', 64),
(65, '', '', '', '', '', '', 65),
(66, '', '', '', '', '', '', 66),
(67, '', '', '', '', '', '', 67),
(68, '', '', '', '', '', '', 68),
(69, '', '', '', '', '', '', 69),
(70, '', '', '', '', '', '', 70),
(71, 'Always-On Retina LTPO OLED display<br>\r\n1000 nits brightness', 'S8 with 64-bit dual-core processor<br>\r\nW3<br>\r\nU1 chip', '', '', 'Built-in rechargeable lithium-ion battery Up to 18 hours', '', 71),
(72, 'Always-On Retina LTPO OLED display<br>\r\n1000 nits brightness', 'S8 SiP with 64-bit dual-core processor<br>\r\nW3', '', '', 'Built-in rechargeable lithium-ion battery Up to 18 hours', '', 72),
(73, 'Always-On Retina LTPO OLED display<br>\r\n1000 nits brightness', 'S8 SiP with 64-bit dual-core processor<br>\r\nW3<br>\r\nU1 chip', '', '', 'Built-in rechargeable lithium-ion battery Up to 18 hours', '', 73),
(74, 'Liquid Retina display<br>\r\n11-inch (diagonal) LED backlit Multi‑Touch display with IPS technology<br>\r\n2388-by-1668-pixel resolution at 264 pixels per inch (ppi)<br>\r\nProMotion technology<br>\r\nWide color display (P3)<br>\r\nTrue Tone display<br>\r\nFingerprint-resistant oleophobic coating<br>\r\nFully laminated display<br>\r\nAntireflective coating<br>\r\n1.8% reflectivity<br>\r\nSDR brightness: 600 nits max<br>\r\nSupports Apple Pencil (2nd generation)<br>\r\nApple Pencil hover', 'Apple M2 chip<br>\r\n8-core CPU with 4 performance cores and 4 efficiency cores<br>\r\n10-core GPU<br>\r\n16-core Neural Engine<br>\r\n100GB/s memory bandwidth<br>\r\n8GB RAM on models with 128GB, 256GB, or 512GB storage<br>\r\n16GB RAM on models with 1TB or 2TB storage', 'Pro camera system: Wide and Ultra Wide cameras<br>\r\nWide: 12MP, ƒ/1.8 aperture<br>\r\nUltra Wide: 10MP, ƒ/2.4 aperture, and 125° field of view', '12MP Ultra Wide camera, 122° field of view<br>\r\nƒ/2.4 aperture', 'Built-in 28.65-watt-hour rechargeable lithium-polymer battery', '', 74),
(75, 'Liquid Retina display<br>\r\n8.3-inch (diagonal) LED-backlit Multi-Touch display with IPS technology<br>\r\n2266x1488 resolution at 326 pixels per inch (ppi)<br>\r\nWide colour display (P3)<br>\r\nTrue Tone display<br>\r\nFingerprint-resistant oleophobic coating<br>\r\nFully laminated display<br>\r\nAnti-reflective coating<br>\r\n1.8% reflectivity<br>\r\n500 nits brightness<br>\r\nSupports Apple Pencil (2nd generation)', 'A15 Bionic chip\r\n6-core CPU with 2 performance cores and 4 efficiency cores<br>\r\n5-core graphics<br>\r\n16‑core Neural Engine', '12MP Wide camera, ƒ/1.8 aperture', '12MP Ultra Wide camera, 122° field of view<br>\r\nƒ/2.4 aperture', 'Built-in 19.3-watt-hour rechargeable lithium-polymer battery', '', 75),
(76, 'Liquid Retina display<br>\r\n10.9-inch (diagonal) LED backlit Multi‑Touch display with IPS technology<br>\r\n2360-by-1640-pixel resolution at 264 pixels per inch (ppi)<br>\r\nTrue Tone display<br>\r\n500 nits brightness<br>\r\nFingerprint-resistant oleophobic coating<br>\r\nSupports Apple Pencil (1st generation)', 'A14 Bionic chip<br>\r\n6-core CPU<br>\r\n4-core graphics<br>\r\n16-core Neural Engine', '12MP Wide camera, ƒ/1.8 aperture', '12MP Ultra Wide camera, 122° field of view<br>\r\nƒ/2.4 aperture', 'Built‐in 28.6‐watt‐hour rechargeable lithium‑polymer battery', '', 76),
(77, 'Retina display<br>\r\n10.2-inch (diagonal) LED-backlit Multi-Touch display with IPS technology<br>\r\n2160-by-1620-pixel resolution at 264 pixels per inch (ppi)<br>\r\nTrue Tone display<br>\r\n500 nits brightness<br>\r\nFingerprint-resistant oleophobic coating<br>\r\nSupports Apple Pencil (1st generation)', 'A13 Bionic chip<br>\r\nNeural Engine', '8MP Wide camera, ƒ/1.8 aperture', '12MP Ultra Wide camera, 122° field of view<br>\r\nƒ/2.4 aperture', 'Built‐in 32.4‐watt‐hour rechargeable lithium‑polymer battery', '', 77),
(78, 'Retina display<br>\r\n9.7-inch (diagonal) LED-backlit Multi-Touch display with IPS technology<br>\r\n2048-by-1536-pixel resolution at 264 ppi<br>\r\nFingerprint-resistant oleophobic coating', 'A9 chip with 64-bit architecture<br>\r\nEmbedded M9 coprocessor', '8MP Wide camera', '1.2MP Wide camera<br>\r\nƒ/2.2 aperture', 'Built-in 32.4-watt-hour rechargeable lithium-polymer battery', '', 78),
(79, 'TFT LCD<br>\r\n8.7 inches, 214.9 cm (~81.1% screen-to-body ratio)<br>\r\n800 x 1340 pixels, 5:3 ratio (~179 ppi density)', 'Android 11, upgradable to Android 13, One UI 5.1<br>\r\nMediatek MT8768T Helio P22T (12 nm)<br>\r\nOcta-core (4x2.3 GHz Cortex-A53 & 4x1.8 GHz Cortex-A53)<br>\r\nPowerVR GE8320', '8 MP, f/2.2', '2 MP', 'Li-Po 5100 mAh', '', 79),
(80, 'TFT LCD<br>\r\n10.5 inches, 319.7 cm (~80.0% screen-to-body ratio)<br>\r\n1200 x 1920 pixels, 16:10 ratio (~216 ppi density)', 'Android 11, upgradable to Android 13, One UI 5.1<br>\r\nUnisoc Tiger T618 (12 nm)<br>\r\nOcta-core (2x2.0 GHz Cortex-A75 & 6x2.0 GHz Cortex-A55)<br>\r\nMali G52 MP2', 'Back Cam\r\n8 MP', 'Front Cam\r\n6 MP', 'Li-Po 5100 mAh', '', 80),
(81, 'TFT LCD, 120Hz<br>\r\n11.0 inches, 350.9 cm (~83.6% screen-to-body ratio)<br>\r\n1600 x 2560 pixels, 16:10 ratio (~274 ppi density)', 'Android 12, upgradable to Android 13, One UI 5<br>\r\nQualcomm SM8450 Snapdragon 8 Gen 1 (4 nm)<br>\r\nOcta-core (1x3.00 GHz Cortex-X2 & 3x2.50 GHz Cortex-A710 & 4x1.80 GHz Cortex-A510)<br>\r\nAdreno 730', '13 MP, f/2.0<br>\r\n6 MP, f/2.2', '12 MP, f/2.4', 'Li-Po 8000 mAh', '', 81),
(82, 'Super AMOLED, 120Hz, HDR10+<br>\r\n12.4 inches, 446.1 cm (~84.6% screen-to-body ratio)<br>\r\n1752 x 2800 pixels, 16:10 ratio (~266 ppi density)', 'Android 12, upgradable to Android 13, One UI 5<br>\r\nQualcomm SM8450 Snapdragon 8 Gen 1 (4 nm)<br>\r\nOcta-core (1x3.00 GHz Cortex-X2 & 3x2.50 GHz Cortex-A710 & 4x1.80 GHz Cortex-A510)<br>\r\nAdreno 730', '13 MP, f/2.0<br>\r\n6 MP, f/2.2', '12 MP, f/2.4', 'Li-Po 8000 mAh', '', 82),
(83, '1.74 inches AMOLED color screen', '', '', '', 'Typical usage: 10 days<br>\r\nHeavy usage: 7 days', '', 83),
(84, '1.43 inches AMOLED Colour Screen', '', '', '', '14-day for typical usage.<br>\r\n7-day for heavy usage.', '', 84),
(85, '1.32 inches AMOLED Colour Screen', '', '', '', '1.32 inches AMOLED Colour Screen<br>\r\n4-day for heavy usage', '', 85),
(86, '1.44 inches Super AMOLED Colour Screen<br>\r\n450 x 450 pixels (~321 ppi density)', 'Android Wear OS, One UI Watch 3<br>\r\nExynos W920 (5 nm)<br>\r\nDual-core 1.18 GHz Cortex-A55<br>\r\nMali-G68', '', '', 'Li-Ion 361 mAh, non-removable', '', 86),
(87, '1.4 inches Super AMOLED Colour Screen<br>\r\n450 x 450 pixels (~321 ppi density)', 'Android Wear OS 3.5, One UI Watch 4.5<br>\r\nExynos W920 (5 nm)<br>\r\nDual-core 1.18 GHz Cortex-A55<br>\r\nMali-G68', '', '', 'Li-Ion 410 mAh, non-removable', '', 87),
(88, '1.4 inches Super AMOLED Colour Screen<br>\r\n450 x 450 pixels (~321 ppi density)', 'Android Wear OS 3.5, One UI Watch 4.5<br>\r\nExynos W920 (5 nm)<br>\r\nDual-core 1.18 GHz Cortex-A55<br>\r\nMali-G68', '', '', 'Li-Ion 590 mAh, non-removable', '', 88),
(89, '', '', '', '', '', '', 89),
(90, '', '', '', '', '', '', 90),
(91, '', '', '', '', '', '', 91),
(92, '', '', '', '', '', '', 92),
(93, '', '', '', '', '', '', 93),
(94, '', '', '', '', '', '', 94),
(95, '', '', '', '', '', '', 95),
(96, '', '', '', '', '', '', 96),
(97, '', '', '', '', '', '', 97),
(98, '', '', '', '', '', '', 98),
(99, '', '', '', '', '', '', 99),
(100, '', '', '', '', '', '', 100),
(101, '', '', '', '', '', '', 101),
(102, '', '', '', '', '', '', 102),
(103, '', '', '', '', '', '', 103);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `ship_id` int(11) NOT NULL,
  `receiver_name` text NOT NULL,
  `receiver_email` text NOT NULL,
  `receiver_phone` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `postcode` int(11) NOT NULL,
  `special_notes` text NOT NULL,
  `ship_status` int(11) NOT NULL DEFAULT 0,
  `order_id` int(11) NOT NULL,
  `adm_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`ship_id`, `receiver_name`, `receiver_email`, `receiver_phone`, `address`, `city`, `state`, `postcode`, `special_notes`, `ship_status`, `order_id`, `adm_id`) VALUES
(3, 'Lim Wee Zheng', '1201200463@student.mmu.edu.my', '01110612839', '8 Jln Malim Jaya 9 Tmn Malim Jaya', 'Melaka Tengag', 'Melaka', 75000, '', 3, 3, 0),
(4, 'Lim Wee Zheng', '1201200463@student.mmu.edu.my', '01110612839', '8 Jln Malim Jaya Tmn Malim Jaya', 'Melaka Tengah', 'Melaka', 75000, '', 3, 4, 0),
(5, 'Thomas Lim', 'tzhenglim@gmail.com', '01110612839', '10 Jalan Merdeka Permai 20 Taman Merdeka Permai', 'Melaka Tengah', 'Melaka', 73000, '', 3, 5, 0),
(6, 'Thomas Lim', 'tzhenglim@gmail.com', '01110612839', '10 Jln Merdeka Permai Tmn Merdeka Permai', 'Melaka Tengah', 'Melaka', 73000, '', 2, 6, 0),
(7, 'Shawn', '1201200637@student.mmu.edu.my', '0136331234', 'Ixora Block B 7th Floor', 'Melaka Tengah', 'Melaka', 74000, '', 0, 7, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cart_item_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`prod_color_id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`prod_detail_id`);

--
-- Indexes for table `product_specification`
--
ALTER TABLE `product_specification`
  ADD PRIMARY KEY (`prod_spec_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`ship_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `prod_color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `prod_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `product_specification`
--
ALTER TABLE `product_specification`
  MODIFY `prod_spec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `ship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
