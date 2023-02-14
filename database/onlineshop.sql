-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2023 at 06:21 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcat` (IN `cid` INT)  SELECT * FROM categories WHERE cat_id=cid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Love from yours'),
(2, 'love from yours'),
(3, 'love from yours'),
(4, 'love from yours'),
(5, 'love from yours');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(6, 26, '::1', 4, 1),
(9, 10, '::1', 7, 1),
(10, 11, '::1', 7, 1),
(11, 45, '::1', 7, 1),
(48, 72, '::1', 3, 0),
(49, 60, '::1', 8, 1),
(71, 61, '127.0.0.1', -1, 1),
(156, 73, '::1', 28, 1),
(200, 1, '::1', 26, 1),
(236, 2, '::1', 12, 1),
(237, 1, '::1', 12, 1),
(238, 5, '::1', 12, 1),
(270, 32, '::1', 35, 5),
(294, 9, '::1', 37, 6),
(295, 5, '::1', 38, 1),
(296, 2, '::1', 15, 4),
(297, 32, '::1', 38, 5),
(298, 88, '::1', 15, 1),
(299, 90, '::1', 15, 1),
(304, 9, '::1', 40, 3),
(305, 1, '::1', 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Skin Products'),
(2, 'Hairs Products'),
(3, 'Serums'),
(4, 'Makeup Products'),
(5, 'Spa products');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `userid` int(200) NOT NULL,
  `discount` float NOT NULL DEFAULT 0.15,
  `avail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `status`, `userid`, `discount`, `avail`) VALUES
(37, 'B341MEDJGQ', 1, 37, 0.15, 'yes'),
(38, 'P2TKA8HRVL', 1, 15, 0.15, 'yes'),
(39, 'XQON4TU617', 1, 38, 0.15, 'no'),
(40, 'LCWE63D9MH', 0, 39, 0.15, 'no'),
(41, 'XE086S51UB', 1, 40, 0.15, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `email_info`
--

CREATE TABLE `email_info` (
  `email_id` int(100) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_info`
--

INSERT INTO `email_info` (`email_id`, `email`) VALUES
(3, 'admin@gmail.com'),
(4, 'puneethreddy951@gmail.com'),
(5, 'puneethreddy@gmail.com'),
(6, 'ibra@gmail.com'),
(7, 'abdullah@gmail.com'),
(8, 'cjmalikwaqar@gmail.com'),
(9, 'mem@crm.com');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`) VALUES
(2, 14, 2, 1, '07M47684BS5725041', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `orders_info`
--

CREATE TABLE `orders_info` (
  `order_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(10) NOT NULL,
  `cardname` varchar(255) NOT NULL,
  `cardnumber` varchar(20) NOT NULL,
  `expdate` varchar(255) NOT NULL,
  `prod_count` int(15) DEFAULT NULL,
  `total_amt` int(15) DEFAULT NULL,
  `cvv` int(5) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_info`
--

INSERT INTO `orders_info` (`order_id`, `user_id`, `f_name`, `email`, `address`, `city`, `state`, `zip`, `cardname`, `cardnumber`, `expdate`, `prod_count`, `total_amt`, `cvv`, `timestamp`) VALUES
(33, 35, 'nazish as wa', 'mem@crm.com', 'Pattoki punjab pakistan', 'Pattoki', 'punjab', 813110, 'waqar ahmad', '6533 3344 5566 7788', '12/32', 1, 214, 4343, '2023-01-31 07:23:24.813028'),
(34, 15, 'nazish as wa', 'mem@crm.com', 'Pattoki punjab pakistan', 'Pattoki', 'punjab', 813110, 'nazu', '2334343242232323', '12/23', 1, 130, 3433, '2023-02-02 21:05:52.056482'),
(35, 40, 'nazish asghar', 'nazishasghar@ymail.com', 'house no.b3, judicial complex pattoki', 'lahore', 'lahore', 235462, 'ahmad', '3343545465654656', '12/33', 3, 767, 234, '2023-02-08 04:34:36.437761');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_pro_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(15) DEFAULT NULL,
  `amt` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_pro_id`, `order_id`, `product_id`, `qty`, `amt`) VALUES
(139, 33, 2, 2, 474),
(156, 34, 1, 1, 153),
(157, 35, 1, 4, 612),
(158, 35, 2, 1, 237),
(159, 35, 3, 1, 131);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  `discount` int(100) NOT NULL,
  `buy_one_get_one` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `discount`, `buy_one_get_one`) VALUES
(1, 1, 0, 'Setting Spray', 180, 'Setting Spray', 'product-img7.jpg', 'Setting Spray', 15, 0),
(2, 1, 0, 'CC -Cream', 250, 'CC -Cream', 'product-img8.jpg', 'CC -Cream', 5, 0),
(3, 1, 0, 'Face Primer', 155, 'Face Primer', 'product-img9.jpg', 'Face Primer', 15, 0),
(4, 1, 0, 'Nail Nourishing Oil', 320, 'Nail Nourishing Oil', 'product-img3.png', 'Nail Nourishing Oil', 0, 0),
(5, 1, 0, 'Glitter Nail Polish', 120, 'Glitter Nail Polish', 'product-img10.png', 'Glitter Nail Polish', 0, 0),
(6, 1, 0, 'Nail Care Tools Premium', 350, 'Nail Care Tools Premium', 'product-img2.png', 'Nail Care Tools Premium', 0, 0),
(7, 1, 0, 'Nail care tool nail cutter', 85, 'Nail care tool nail cutter', 'product-img11.png', 'Nail care tool nail cutter', 0, 0),
(8, 1, 0, 'Hair care products', 400, 'Hair care products', 'product-img15.png', 'Hair care products', 0, 0),
(9, 1, 0, 'Nails lose Glitter', 120, 'Nails lose Glitter', 'product-img14.png', 'Nails lose Glitter', 0, 1),
(10, 2, 0, 'Body Spray', 100, 'Body Spray', 'product-img8.jpg', 'Body Spray', 0, 0),
(11, 2, 0, 'Nail Care tool', 120, 'Nail Care tool', 'product-img2.png', 'blue dress cloths', 50, 0),
(16, 3, 0, 'Glitter Nail Polish', 160, 'Glitter Nail Polish', 'product-img10.png', 'Glitter Nail Polish', 0, 0),
(17, 3, 0, 'Glitter Nail Polish', 112, 'Glitter Nail Polish', 'product-img15.png', 'Glitter Nail Polish', 0, 0),
(19, 3, 0, '	\r\nHair care products', 300, '	\r\nHair care products', 'product-img14.png', '	\r\nHair care products', 0, 0),
(24, 4, 0, 'Nail Care Tools Premium\r\n', 170, 'Nail Care Tools Premium', 'product-img2.png', 'Nail Care Tools Premium', 0, 0),
(25, 4, 0, 'Nail Care Tools Premium', 175, 'Nail Care Tools Premium', '	\r\nproduct-img14.png', '', 0, 0),
(32, 5, 0, 'spray', 250, 'spray', 'product-img7.jpg', 'spray', 0, 1),
(82, 2, 0, 'Skin Product', 210, 'Skin Product', 'product-img8.jpg', 'design', 70, 0),
(83, 2, 0, 'Hair Products package', 200, 'Hair Products package', 'product-img15.png', 'Hair Products package', 0, 0),
(85, 2, 0, 'Hair Products package', 210, 'Hair Products package', '1673949959_product-img4.png', 'Hair Products package', 0, 0),
(88, 4, 0, 'Serum', 122, ' serum', '1674062172_product08.jpg', 'serum', 0, 1),
(89, 2, 0, 'Hair Shampoo', 178, ' Best shampoo for fine hair: Maxxam Volumizing.\r\nBest shampoo for curly hair: Shea Moisture.\r\nBest shampoo for natural hair: Oribe.', '1675358841_1672516074_product16.png', 'Shampoo, fine hair curly hairs', 5, 1),
(90, 2, 0, 'Onion oil', 170, '  It is a non-sticky and non-greasy hair oil, making it fast-absorbing and easy to use. Rich in flavonoids, sulphur - rich compounds and vitamins B, C, D, & E.', '1675359840_product01.png', 'oil, fine hair curly hairs', 12, 0),
(92, 2, 0, 'Herbal Hair Mask', 120, ' It is a server scripting language, and a powerful tool for making dynamic and interactive Web pages.\r\n\r\nPHP is a widely-used, free, and efficient ', '1675360906_product-img6.png', 'oil, fine hair curly hairs', 10, 1),
(93, 2, 0, 'Nail Care tool', 320, '   hello', '1675365793_product02.png', 'oil, fine hair curly hairs', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `prom_id` int(200) NOT NULL,
  `product_id` int(200) NOT NULL,
  `promo_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`prom_id`, `product_id`, `promo_name`) VALUES
(1, 1, 'FLAT15% OFF'),
(2, 2, 'BUY ONE GET ONE FREE');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(15, 'Member1', 'omg', 'member1@crm.com', '12345', '536487276', ',mdnbca', 'asdmhmhvbv'),
(31, 'Waqar', 'Ahmad', 'admin2@gmail.com', '123456', '1234567898', 'punjab pakistan', 'Pattoki'),
(35, 'member', 'member', 'member@crm.com', 'member', '0506765752', 'tasmania', 'mylo'),
(38, 'testing', 'test', 'test@gmail.com', 'test12345', '1234567890', 'lahore', 'lahore'),
(39, 'testing', 'test', 'testid@gmail.com', '123456789', '1234567890', 'lahore', 'lahore'),
(40, 'nazish', 'asghar', 'nazishasghar@ymail.com', '123456789', '0346463355', 'house no.b3, judicial complex pattoki', 'lahore');

--
-- Triggers `user_info`
--
DELIMITER $$
CREATE TRIGGER `after_user_info_insert` AFTER INSERT ON `user_info` FOR EACH ROW BEGIN 
INSERT INTO user_info_backup VALUES(new.user_id,new.first_name,new.last_name,new.email,new.password,new.mobile,new.address1,new.address2);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_info_backup`
--

CREATE TABLE `user_info_backup` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info_backup`
--

INSERT INTO `user_info_backup` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(12, 'puneeth', 'Reddy', 'puneethreddy951@gmail.com', '123456789', '9448121558', '123456789', 'sdcjns,djc'),
(14, 'hemanthu', 'reddy', 'hemanthreddy951@gmail.com', '123456788', '6526436723', 's,dc wfjvnvn', 'b efhfhvvbr'),
(15, 'hemu', 'ajhgdg', 'keeru@gmail.com', '346778', '536487276', ',mdnbca', 'asdmhmhvbv'),
(16, 'venky', 'vs', 'venkey@gmail.com', '1234534', '9877654334', 'snhdgvajfehyfygv', 'asdjbhfkeur'),
(19, 'abhishek', 'bs', 'abhishekbs@gmail.com', 'asdcsdcc', '9871236534', 'bangalore', 'hassan'),
(20, 'pramod', 'vh', 'pramod@gmail.com', '124335353', '9767645653', 'ksbdfcdf', 'sjrgrevgsib'),
(21, 'prajval', 'mcta', 'prajvalmcta@gmail.com', '1234545662', '202-555-01', 'bangalore', 'kumbalagodu'),
(22, 'puneeth', 'v', 'hemu@gmail.com', '1234534', '9877654334', 'snhdgvajfehyfygv', 'asdjbhfkeur'),
(23, 'hemanth', 'reddy', 'hemanth@gmail.com', 'Puneeth@123', '9876543234', 'Bangalore', 'Kumbalagodu'),
(24, 'newuser', 'user', 'newuser@gmail.com', 'puneeth@123', '9535688928', 'Bangalore', 'Kumbalagodu'),
(25, 'otheruser', 'user', 'otheruser@gmail.com', 'puneeth@123', '9535688928', 'Bangalore', 'Kumbalagodu'),
(26, 'nazish', 'wa', 'nazish23@gmail.com', 'goplu$n123', '1324324322', 'abcd', 'lahore'),
(27, 'nazish', 'wa', 'admin@admin.com', '123456789', '3253646765', 'asdf', 'lahore'),
(28, 'Ahmad', 'Raza', 'ahmadraza@gmail.com', 'abc@1234567', '1234567890', 'abc, as', 'lahore'),
(29, 'abdullah', 'waqar', 'samplemanufacturer@gmail.com', 'abc@1234567', '1234567890', 'asdf', 'lahore'),
(30, 'nazish', 'wa', 'samplemanufacturer1@gmail.com', '123456789', '3253646123', 'asdf', 'lahore'),
(31, 'Waqar', 'Ahmad', 'admin2@gmail.com', '123456789', '1234567898', 'punjab pakistan', 'Pattoki'),
(32, 'Super', 'Admin', 'adminqe@gdd.com', 'abc12345678', '3253646234', 'pakistan', 'lahore'),
(33, 'Malik', 'Ahmad', 'abdullah@gmail.com', '123456789', '3253646345', 'lahore', 'lahore'),
(34, 'nazish', 'asghar', 'nazish12@gmail.com', '123456789', '3253646232', 'asdf', 'lahore'),
(35, 'member', 'member', 'member@crm.com', 'member', '0506765752', 'tasmania', 'mylo'),
(36, 'member', 'member', 'mem@crm.com', 'admin', '0506765752', 'tasmania', 'mylo'),
(37, 'ahmad', 'asghar', 'ahmad@crm.com', 'ahmad12345', '0234223456', 'house no.b3, judicial complex pattoki', 'lahore'),
(38, 'testing', 'test', 'test@gmail.com', 'test12345', '1234567890', 'lahore', 'lahore'),
(39, 'testing', 'test', 'testid@gmail.com', '123456789', '1234567890', 'lahore', 'lahore'),
(40, 'nazish', 'asghar', 'nazishasghar@ymail.com', '123456789', '0346463355', 'house no.b3, judicial complex pattoki', 'lahore');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_info`
--
ALTER TABLE `email_info`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_pro_id`),
  ADD KEY `order_products` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`prom_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_info_backup`
--
ALTER TABLE `user_info_backup`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `email_info`
--
ALTER TABLE `email_info`
  MODIFY `email_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders_info`
--
ALTER TABLE `orders_info`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `prom_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_info_backup`
--
ALTER TABLE `user_info_backup`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products` FOREIGN KEY (`order_id`) REFERENCES `orders_info` (`order_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
