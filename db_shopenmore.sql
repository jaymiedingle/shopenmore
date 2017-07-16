-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2017 at 11:21 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shopenmore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_banners`
--

CREATE TABLE `tb_banners` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `image_url` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_banners`
--

INSERT INTO `tb_banners` (`id`, `name`, `link`, `image_url`, `is_active`) VALUES
(1, 'Shoe Sale', 'http://localhost/shopenmore/category.php?id=5', 'shoe-sale.png', 1),
(4, 'Kids wear', 'http://localhost/shopenmore/category.php?id=2', '150019670130457596b2f5d7cb99-sweet.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_items`
--

CREATE TABLE `tb_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_status_id` int(1) NOT NULL DEFAULT '0',
  `image_url` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_items`
--

INSERT INTO `tb_items` (`id`, `user_id`, `item_category_id`, `name`, `price`, `description`, `date_posted`, `item_status_id`, `image_url`, `is_active`) VALUES
(34, 21, 5, 'Kyrie Shoe 3', 3000, 'Used Kyrie Irving Basketball shoes', '2017-07-09 13:53:30', 1, '1499608410224435962355aeb0d4-sneakers-Nike-Kyrie-1-Air-Mag.jpg', 1),
(35, 21, 3, 'Meeting and Seminar room', 650, 'For rent AC room for seminars and meetings', '2017-07-12 00:00:33', 2, '14998176339961596566a11634b-18952754_1597746726916086_3280422255861674124_n.jpg', 1),
(36, 35, 3, 'Breadboard', 280, 'Breadboard for electronic subjects', '2017-07-12 06:37:25', 1, '1499841445212105965c3a55d5ef-64-00.jpg', 1),
(38, 35, 4, 'Press Powder', 180, 'Branded makeup for you and others ganda in the hood', '2017-07-12 06:44:22', 3, '1499841862256005965c5464143c-pressed-powder_LRG.jpg', 1),
(39, 35, 3, 'Computer Rental (Shop)', 15, 'Computer rental (shop) for your school projects and needs', '2017-07-14 12:30:19', 2, '150003541952935968b95b99253-download (4).jpg', 1),
(40, 35, 11, 'Cheezy Special Yema Cake', 80, 'Cheezy Special Yema Cake, indi tinipid sa ingredients', '2017-07-14 12:31:40', 3, '1500035500119085968b9ac17cbe-12310517_1211308632219743_8194212334010780873_n.jpg', 1),
(41, 21, 3, 'Imported Japanese Pen', 55, 'Imported Japanese Pen, limited stock only', '2017-07-14 13:10:34', 3, '1500037834106165968c2cab1308-download (5).jpg', 1),
(42, 21, 4, 'Lipstick', 100, 'Lipstick from japan, branded', '2017-07-14 13:12:27', 3, '1500037947139335968c33b03e68-download (3).jpg', 1),
(43, 36, 12, 'High Grade Puppy food', 90, 'High Grade Puppy food 90 pesos per kilo for your loved pets', '2017-07-14 13:23:08', 1, '1500038588186145968c5bc98b6d-images (1).jpg', 1),
(44, 35, 3, 'brand new jansport bag', 500, 'authentic jansport with different colors available. just contact me if interested. my # is 09123456789.', '2017-07-16 05:38:33', 1, '15001835133245596afbd9eb38f-red-jansport.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_item_category`
--

CREATE TABLE `tb_item_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `theme` text NOT NULL,
  `image_url` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_item_category`
--

INSERT INTO `tb_item_category` (`id`, `name`, `theme`, `image_url`, `is_active`) VALUES
(1, 'Gadget', 'success', '150011508236515969f08a17301-gadgets-190615.jpg', 1),
(2, 'Clothes', 'info', '150012049830753596a05b25f6e2-hanger.gif', 1),
(3, 'School supplies', 'warning', '150012057410805596a05fe95597-00da223cfd4028f69847bda2544b809c.jpg', 1),
(4, 'Makeup', 'default', '150012540411456596a18dc5eb0e-giphy.gif', 1),
(5, 'Shoes', 'danger', '150012638618491596a1cb298dad-download (7).jpg', 1),
(11, 'Food', '', '150012642227480596a1cd679aec-20121024-MacNCheese-12.jpg', 1),
(12, 'Pet Supplies', '', '150017391131766596ad657c857f-peacekeeper-clipart-dog_food_and_bone.gif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_item_status`
--

CREATE TABLE `tb_item_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `theme` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_item_status`
--

INSERT INTO `tb_item_status` (`id`, `name`, `theme`) VALUES
(1, 'For Sale', 'success'),
(2, 'For Rent', 'info'),
(3, 'Limited Stock', 'danger'),
(4, 'Out of Stock', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rating`
--

CREATE TABLE `tb_rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `voter_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rating`
--

INSERT INTO `tb_rating` (`id`, `user_id`, `voter_id`, `rate`, `date`, `is_active`) VALUES
(3, 36, 35, 1, '2017-07-16 12:21:10', 0),
(4, 36, 21, 0, '2017-07-16 12:21:34', 0),
(5, 21, 36, 1, '2017-07-16 12:33:36', 0),
(6, 35, 36, 1, '2017-07-16 12:35:01', 0),
(7, 35, 21, 0, '2017-07-16 12:35:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_site_info`
--

CREATE TABLE `tb_site_info` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `tagline` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_site_info`
--

INSERT INTO `tb_site_info` (`id`, `title`, `tagline`) VALUES
(1, 'ShopenMore', 'ICCT students buy and sell without the hassle. We help you find the product you need and make the deal with fellow students.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_student`
--

CREATE TABLE `tb_student` (
  `id` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_student`
--

INSERT INTO `tb_student` (`id`, `fname`, `lname`, `is_active`) VALUES
('BI00000', 'Roel', 'Dingle', 1),
('BI00023', 'Mark', 'Zuckerberg', 1),
('BI00100', 'Jaymie', 'Dingle', 1),
('BI00101', 'Desiree', 'Macaloi', 1),
('BI00102', 'Jonalyn', 'Cruz', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `student_id` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `image_url` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `user_role_id`, `student_id`, `email`, `password`, `fname`, `lname`, `contact`, `image_url`, `is_active`, `date_reg`) VALUES
(21, 1, 'BI00000', 'roeldingle@gmail.com', '77b182f33eff49a3b70206e530bb47a3', 'Roel', 'Dingle', '09103629974', '1499607069186125962301d07b69-149897626410080595890089bd14-11825953_1047734388583992_1727016485304329009_n.jpg', 1, '2017-07-02 06:17:44'),
(28, 2, 'BI00023', 'markzuckerberg@gmail.com', '26cae7718c32180a7a0f8e19d6d40a59', 'Mark', 'Zuckerberg', '09454454554', '1499823140823959657c24548e0-mark.jpg', 1, '2017-07-12 01:32:20'),
(35, 3, 'BI00100', 'jaymiedingle@gmail.com', '96e79218965eb72c92a549dd5a330112', 'Jaymie', 'Dingle', '09106225625', '1499839742129485965bcfeafcd1-14996916591867059637a8b6443f-jaymie.jpg', 1, '2017-07-12 06:09:02'),
(36, 3, 'BI00101', 'desiree@gmail.com', '96e79218965eb72c92a549dd5a330112', 'Desiree', 'Macaloi', '0922432456', '1500038337267055968c4c1a0b00-c335196e501b32c2fbd7bf6a98ecf68a_400x400.jpeg', 1, '2017-07-14 13:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `theme` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_role`
--

INSERT INTO `tb_user_role` (`id`, `name`, `theme`) VALUES
(1, 'Superadmin', 'danger'),
(2, 'Admin', 'primary'),
(3, 'Member', 'default');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_banners`
--
ALTER TABLE `tb_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_items`
--
ALTER TABLE `tb_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_item_category`
--
ALTER TABLE `tb_item_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_item_status`
--
ALTER TABLE `tb_item_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_site_info`
--
ALTER TABLE `tb_site_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_student`
--
ALTER TABLE `tb_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_banners`
--
ALTER TABLE `tb_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_items`
--
ALTER TABLE `tb_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tb_item_category`
--
ALTER TABLE `tb_item_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_item_status`
--
ALTER TABLE `tb_item_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_site_info`
--
ALTER TABLE `tb_site_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
