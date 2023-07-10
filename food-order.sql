-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 10:59 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(24, 'admin', 'admin', '9dc9d5ed5031367d42543763423c24ee'),
(28, 'Bapakau', 'Ganteng', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(33, 'Burger', 'Food_Category_830.jpg', 'Yes', 'Yes'),
(34, 'Momo', 'Food_Category_356.jpg', 'Yes', 'Yes'),
(36, 'Spaghetti', 'Food_Category_835.jpg', 'Yes', 'Yes'),
(37, 'Pizza', 'Food_Category_316.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(24, 'momo', 'The Best Dumpling in Multiverse', 10000, 'Food-Name-4508.jpg', 34, 'Yes', 'Yes'),
(27, 'Pizza Italy', 'Il miglior gusto solo nella pizza italiana', 100000, 'Food-Name-4684.png', 37, 'Yes', 'Yes'),
(28, 'Burger Original', 'Anda lapar? Burger Original solusinya', 250000, 'Food-Name-2556.png', 33, 'Yes', 'Yes'),
(29, 'Pizza Spain', 'No mera uno', 120000, 'Food-Name-5217.jpg', 37, 'Yes', 'Yes'),
(30, 'Burger Keju', 'Rasakan kelezatan kejunya', 50000, 'Food-Name-6081.jpg', 33, 'Yes', 'Yes'),
(31, 'Pizza Indonesia', 'Selalu memberikan Pizza yang terbaik', 80000, 'Food-Name-8809.jpg', 37, 'Yes', 'Yes'),
(32, 'Momo Goreng', 'Kriuk and Krenyes', 20000, 'Food-Name-8372.jpg', 34, 'Yes', 'Yes'),
(33, 'Burger Black', 'Terbaik di antara terbaik', 70000, 'Food-Name-3881.jpg', 33, 'Yes', 'Yes'),
(34, 'Spaghetti', 'Delicius', 45000, 'Food-Name-1718.jpeg', 36, 'Yes', 'Yes'),
(35, 'Spaghetti Spicy', 'Bikin bibir meledak karena pedis nya', 65000, 'Food-Name-5980.jpg', 36, 'Yes', 'Yes'),
(36, 'momo rebus', 'Mantap dan Lezat', 15000, 'Food-Name-2129.jpg', 34, 'Yes', 'Yes'),
(37, 'Burger Spesial', 'The Ultimate Double Cheese Burger', 150000, 'Food-Name-2922.jpg', 33, 'Yes', 'Yes'),
(38, 'Pizza Mozzarella', 'The best mozzarella', 200000, 'Food-Name-6025.jpg', 37, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` int(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(12, 'Burger Keju', 50000, 10, 500000, '2022-12-17 02:30:41', 'Delivered', 'Jin', '089892938723', 'muhsafir20@yahoo.com', ''),
(13, 'Dumpling', 10000, 20, 200000, '2022-12-17 02:32:36', 'Cancelled', 'Muhamad Syafir', '081231323112', 'muhamad@gmail.com', ''),
(14, 'Pizza Indonesia', 80000, 1, 80000, '2022-12-17 02:33:25', 'On Delivery', 'Uzumaki Kaburo', '8989821212', 'uzumakiganteng@gmail.com', ''),
(15, 'Pizza Italy', 100000, 4, 400000, '2022-12-17 05:24:44', 'On Delivery', 'Bayu', '09884124515', 'safirherakles20@gmail.com', 'DEPOK'),
(16, 'Burger Original', 250000, 4, 1000000, '2022-12-17 05:29:58', 'Ordered', 'Pak haji', '08974124124', 'pala@gmail.com', 'Samarinda'),
(17, 'Pizza Italy', 100000, 4, 400000, '2022-12-19 05:51:37', 'Ordered', 'enak', '0912314123', 'Bapakau@gmail.com', 'JAKARDAH'),
(18, 'momo', 10000, 1, 10000, '2022-12-19 08:58:31', 'On Delivery', 'Cacaa', '0908308932', 'caca@gmail.com', 'CIKARANG UTARA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
