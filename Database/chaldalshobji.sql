-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2019 at 06:31 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chaldalshobji`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Mahmudul Hasan Robin', 'robin', 'robin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(2, 'Nazmul Alam', 'nazmul', 'nazmul@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', 0),
(3, 'Sadik Jabirul Hasan', 'sadik', 'sadik@gmail.com', '93279e3308bdbbeed946fc965017f67a', 0),
(4, 'Abir Ahmed', 'abir', 'abir@gmail.com', '9ab209d66a9bf2250d7f56cc4b3b125d', 0);

-- --------------------------------------------------------

--
-- Table structure for table `brand_table`
--

CREATE TABLE `brand_table` (
  `brandid` int(11) NOT NULL,
  `brandname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand_table`
--

INSERT INTO `brand_table` (`brandid`, `brandname`) VALUES
(1, 'Rupchada'),
(2, 'Needo'),
(4, 'Ch Products'),
(5, 'Pushti'),
(6, 'Teer'),
(8, 'Bajaj'),
(9, 'Not Specified'),
(10, 'Fresh'),
(11, 'Square'),
(12, 'Pran');

-- --------------------------------------------------------

--
-- Table structure for table `cart_table`
--

CREATE TABLE `cart_table` (
  `cartid` int(11) NOT NULL,
  `sessionid` varchar(255) NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_table`
--

INSERT INTO `cart_table` (`cartid`, `sessionid`, `productid`, `productname`, `price`, `quantity`, `image`) VALUES
(1, '8qojnugkm1s872l37fb7jfs8da', 31, 'cock-chicken-skin-off-net-weight-30-gm-500-gm', 225.00, 7, 'upload/81c0b3aff2.png'),
(11, 'cbtn4jrnsfjb3rcm7ggeceo257', 13, 'Snacks', 25.50, 1, 'upload/336f11fd49.jpg'),
(16, 'p7cot3tvdnudq05ret28oa0a6v', 27, 'Black-cumin-kalo-jira-100-gm', 130.00, 1, 'upload/54b6a955c6.jpg'),
(17, '8qrmvs5qmfei1g8vao1unm18lt', 21, 'Cutting-pliers-china-1-pcs', 180.00, 1, 'upload/390d983d3a.jpg'),
(18, '8qrmvs5qmfei1g8vao1unm18lt', 32, 'Mutton-regular-1-kg', 600.00, 1, 'upload/259604e13c.png'),
(19, '8qrmvs5qmfei1g8vao1unm18lt', 16, 'Gear Oil', 440.00, 0, 'upload/48f45630bd.jpg'),
(20, '1d0ij76ec463dgmjk69kglqf3u', 11, 'Special Fruits', 55.00, 1, 'upload/ab6bbd35c2.png'),
(22, '534i9vf3m87rfp9620fg30hqbd', 32, 'Mutton-regular-1-kg', 600.00, 1, 'upload/259604e13c.png'),
(23, 'lr6qsj51r486jm38iqsr08ebh2', 26, 'Banoful-laccha-shemai-200-gm', 150.00, 1, 'upload/c4bd793e29.jpg'),
(24, 's4ovisluf8hp3k6j02ve6hl78c', 33, 'malta-net-weight-50-gm-1-kg', 90.00, 1, 'upload/57db729e55.jpg'),
(25, 'v0s9hris0ballr8svcigrp7nrq', 33, 'malta-net-weight-50-gm-1-kg', 90.00, 1, 'upload/57db729e55.jpg'),
(26, 'rgodlkellgp6cha5ncnm4u9c5h', 33, 'malta-net-weight-50-gm-1-kg', 90.00, 1, 'upload/57db729e55.jpg'),
(27, 'flj6bdip98bd6baga81vii72c7', 25, 'Aarong-dairy-pure-ghee-400-gm', 430.00, 1, 'upload/3aabf684d9.png'),
(29, 'v0s9hris0ballr8svcigrp7nrq', 28, 'Chinigura-rice-polaw-1-kg', 120.00, 4, 'upload/f32dd9499b.png'),
(30, 'v0s9hris0ballr8svcigrp7nrq', 26, 'Banoful-laccha-shemai-200-gm', 150.00, 1, 'upload/c4bd793e29.jpg'),
(31, 'v0s9hris0ballr8svcigrp7nrq', 24, 'Motul-3000-4t-plus-20w40-engine-oil-1-ltr', 550.00, 6, 'upload/4e3dc870d1.png'),
(32, 'co4g90hppe4aqjms00i77dd3v4', 28, 'Chinigura-rice-polaw-1-kg', 120.00, 6, 'upload/f32dd9499b.png'),
(33, 'co4g90hppe4aqjms00i77dd3v4', 24, 'Motul-3000-4t-plus-20w40-engine-oil-1-ltr', 550.00, 5, 'upload/4e3dc870d1.png'),
(34, 'co4g90hppe4aqjms00i77dd3v4', 34, 'DDD', 125000.00, 1, 'upload/0757629914.png'),
(47, 'mi9lk85fnvck78r2l2ahn4varj', 29, 'Mix-spice-pach-foron-100-gm', 100.00, 1, 'upload/fadf9cfb3b.jpg'),
(53, 'mi9lk85fnvck78r2l2ahn4varj', 13, 'Snacks', 25.50, 1, 'upload/336f11fd49.jpg'),
(57, 'ajrhgjq5mbu0edfv4tvpvlibnt', 33, 'malta-net-weight-50-gm-1-kg', 90.00, 0, 'upload/57db729e55.jpg'),
(59, 'vs64l5vk36s5at7hsvgmctmrri', 33, 'malta-net-weight-50-gm-1-kg', 90.00, 3, 'upload/57db729e55.jpg'),
(61, 'vs64l5vk36s5at7hsvgmctmrri', 25, 'Aarong-dairy-pure-ghee-400-gm', 430.00, 1, 'upload/3aabf684d9.png'),
(64, 'utctfp5j40g5mtqq0iib4ch6b1', 32, 'Mutton-regular-1-kg', 600.00, 5, 'upload/259604e13c.png'),
(65, 'au4kplmmufgi2dr444hl77c3ah', 30, 'Biomil-2-milk-6-12-months-tin-1-kg', 420.00, 1, 'upload/915cb90d4f.jpg'),
(73, 'ml5f3c8v7idja3jjun2h25580m', 34, 'Dabur-honey-250-gm', 185.00, 5, 'upload/b6b98dc982.png'),
(77, '034h7vk78n23h7jbrgs2bu900g', 18, 'Deshi-pangas-net-weight-50-gm-15-kg', 120.00, 5, 'upload/4e52601d6e.png'),
(78, '034h7vk78n23h7jbrgs2bu900g', 6, 'Breakfast', 25.00, 6, 'upload/36cef18a56.png'),
(79, 'ah5a5m94eim8ku6v1geo7sl8vp', 29, 'Mix-spice-pach-foron-100-gm', 100.00, 0, 'upload/fadf9cfb3b.jpg'),
(83, 'b92ig3l5fjtc425gpqm56cg5pr', 35, 'Product Title-Five', 65.00, 5, 'upload/8ffe39fb2a.jpg'),
(84, 'vs4i5bvguvkuc556hvi2nuq169', 9, 'Onions', 20.00, 6, 'upload/ba1014af42.jpg'),
(87, 'c2jkmskag3cmoda7dgvv48h4n9', 27, 'Black-cumin-kalo-jira-100-gm', 45.00, 1, 'upload/54b6a955c6.jpg'),
(92, 'gas8n3gouf22d8mehi2ic3h4t6', 30, 'Biomil-2-milk-6-12-months-tin-1-kg', 420.00, 4, 'upload/915cb90d4f.jpg'),
(93, 'gas8n3gouf22d8mehi2ic3h4t6', 39, 'Potol-500-gm', 20.00, 1, 'upload/828cd758f8.png'),
(94, 'e482ngm2q9tsqeedfqif3emqso', 39, 'Potol-500-gm', 20.00, 1, 'upload/828cd758f8.png'),
(96, '93lgjulklluv1iaatd1js2bp58', 34, 'Dabur-honey-250-gm', 140.00, 5, 'upload/b6b98dc982.png'),
(97, '93lgjulklluv1iaatd1js2bp58', 17, 'Rui-Fish-net-weight-60-gm-15-kg', 280.00, 3, 'upload/fa9ba861dd.png'),
(101, 'qp078cosknhr0krqhcahsmirsj', 33, 'malta-net-weight-50-gm-1-kg', 180.00, 13, 'upload/57db729e55.jpg'),
(103, '16t07qrsovug80od1ns4iigkj4', 35, 'Product Title-Five', 65.00, 5, 'upload/8ffe39fb2a.jpg'),
(104, '16t07qrsovug80od1ns4iigkj4', 21, 'Cutting-pliers-china-1-pcs', 180.00, 1, 'upload/390d983d3a.jpg'),
(105, '16t07qrsovug80od1ns4iigkj4', 29, 'Mix-spice-pach-foron-100-gm', 100.00, 1, 'upload/fadf9cfb3b.jpg'),
(106, 'ls21k3s9k96aa22d01l4ke54cl', 32, 'Cocola-egg-noodles-180-gm', 60.00, 1, 'upload/ada8936e55.png'),
(107, 'tod6p0v7t6eporjptrq5o07bcm', 31, 'Npoly-laundry-basket-15x15-inch-blue', 50.00, 4, 'upload/2b53786d71.jpg'),
(110, '2l8idjo4mvisg8vjutb0191krh', 26, 'Danish-condensed-filled-milk-397-gm', 50.00, 6, 'upload/fc5c600802.png'),
(111, '719mk0hetekt2pi6gedh3qofkj', 32, 'Cocola-egg-noodles-180-gm', 60.00, 19, 'upload/ada8936e55.png'),
(113, 'r5rlh1ejlle84n1jb77inga3so', 32, 'Cocola-egg-noodles-180-gm', 60.00, 1, 'upload/ada8936e55.png'),
(114, 'r5rlh1ejlle84n1jb77inga3so', 23, 'Teer-semolina-suji-500-gm', 170.00, 1, 'upload/a3970e74cd.png'),
(115, 'ahha73taafcmv65se21307abms', 42, 'Coriander-leaves-100-gm', 15.00, 4, 'upload/cbb843732f.png'),
(124, '4dm9pc67boif57cdtvqah6grj9', 43, 'Potato-regular-net-weight-50-gm-1-kg', 40.00, 5, 'upload/c1376a2102.jpg'),
(125, 'npe6qb9hrsa3ahhrntrab7jt1k', 41, 'Shing-fish-after-cutting-500-gm', 440.00, 1, 'upload/26edff1641.png');

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `catid` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`catid`, `catName`, `image`) VALUES
(2, 'Vegetables', 'catupload/d081cf5908.png'),
(3, 'Baby Care', 'catupload/1262f8db52.jpg'),
(4, 'Dairy', 'catupload/9150e00b80.png'),
(5, 'Diabetic Food', 'catupload/3ab25a1261.jpg'),
(6, 'Home and Cleaning', 'catupload/dbff9fb758.jpg'),
(7, 'Meats', 'catupload/36ca82979b.png'),
(8, 'Fishes', 'catupload/14b608b568.png'),
(9, 'Snacks', 'catupload/f0bb7f2e91.png'),
(10, 'Spices', 'catupload/a1a2c40e7c.jpg'),
(11, 'Cooking', 'catupload/3770003ec9.png'),
(12, 'Vehicle Essentials', 'catupload/ed9b58a6b6.jpg'),
(13, 'Fruits', 'catupload/11c25b9136.jpg'),
(14, 'Bread&amp;Bekary', 'catupload/8488373ac4.png'),
(15, 'Home Appliances', 'catupload/0cd5cc7841.jpg'),
(16, 'Diabetic Food', 'catupload/f0836d438b.png'),
(17, 'Breakfast', 'catupload/9013f3fc67.png');

-- --------------------------------------------------------

--
-- Table structure for table `compare_table`
--

CREATE TABLE `compare_table` (
  `id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compare_table`
--

INSERT INTO `compare_table` (`id`, `customerid`, `productid`, `productname`, `price`, `image`) VALUES
(14, 17, 27, 'Organic-deshi-chicken-eggs-12-pcs', 180.00, 'upload/0c2b926ecd.png'),
(15, 17, 10, 'pnion-red-indian-piyaj-500-gm', 55.00, 'upload/b2d3913a61.jpg'),
(16, 17, 6, 'Canderel-sucralose-tablet-300-pcs', 440.00, 'upload/1bf5d0f4e7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_table`
--

CREATE TABLE `contact_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_table`
--

INSERT INTO `contact_table` (`id`, `name`, `email`, `phone`, `body`, `date`) VALUES
(1, 'Mahmudul Hasan', 'mahmudulbaust43@gmail.com', '01746046537', '									\r\n				Hello there..Im here!				', '2019-12-16 17:11:48'),
(2, 'Nazmul Alam', 'nazmulalam@gmail.com', '01786543522', '									\r\n			Hello....Is there any live update?					', '2019-12-16 17:12:34'),
(6, 'Abir Ahmed', 'ullash@gmail.com', '01776742349', '		I am Ullash							\r\n								', '2019-12-16 19:06:02'),
(7, 'Mahmudul Hasan', 'mahmudulbaust43@gmail.com', '01740140967', '									\r\n				Hello....Mahmudul here!				', '2019-12-17 13:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `customer_table`
--

CREATE TABLE `customer_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(34) NOT NULL,
  `country` varchar(34) NOT NULL,
  `zip` varchar(34) NOT NULL,
  `phone` varchar(34) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(34) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_table`
--

INSERT INTO `customer_table` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `password`) VALUES
(1, 'Mahmudul Hasan', '                                                                                                                                                                                                                                                Rangpur                                                                                                                                                                         ', 'Rangpur', 'Bangladesh', '5675', '01740140967', 'mahmudulbaust43@gmail.com', '8ee60a2e00c90d7e00d5069188dc115b'),
(2, 'Nazmul Alam Nowfel', '                Gazipur            ', 'Bangladesh', 'Dhaka', '4455', '01746046537', 'nazmulalam@gmail.com', 'ed77f311f801f2d976c3392791863d18'),
(4, 'Fokhrul Isslam', 'Rangpur', 'Bangladesh', 'Rangpur', '2344', '01876542344', 'fahim@gmail.com', 'e0d4d57ba6705e0640b64088c91ede47'),
(7, 'Rahim', 'Street 21', 'Rpz', 'Bd', '1122', '01765678932', 'rahim@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f'),
(9, 'Emon', 'Asddddd', 'Bangladesh', 'Rangpur', '66889', '01789765344', 'email@gmail.com', 'b8cc4edba5145d41f9da01d85f459aef'),
(10, 'Mahmud Hasan', '                                                Abbas Uddin Ahmed Hall,BAUST                                    ', 'Bangladesh', 'Saidpur', '12338', '01768734252', 'mahmud@gmail.com', 'e1aa6aa12922a1275c9c8f8e54bac8d6'),
(12, 'Abir Ahmed', 'Barishal            ', 'Bangladesh', 'Dhaka', '1244', '01765241344', 'aabir@gmail.com', '9ab209d66a9bf2250d7f56cc4b3b125d'),
(13, 'Nazmul Alam', '                                Gazipur,Dhaka                        ', 'Bangladesh', 'Gazipur', '1245', '01762739444', 'nowfel@gmail.com', 'ed77f311f801f2d976c3392791863d18'),
(14, 'R F Emon', '                                Jugipara,Rangpur                   ', 'Bangladesh', 'Rangpur', '2222', '01756245367', 'emon@gmail.com', 'b8cc4edba5145d41f9da01d85f459aef'),
(15, '          Rakibul Islam', 'Mirpur,Dhaka', 'Bangladesh', 'Chittagong', '1244', '01876542344', 'rakib@gmail.com', 'f60625eb864d7461442a4d9056a7f9a2'),
(16, 'Abdullah Al Mubin', '                Jugipara        ,Rangpur    ', 'Bangladesh', 'Rangpur', '11', '01304601105', 'shihad@gmail.com', '78003840caa34808773df2a5f51f4f85'),
(17, 'Sadik Jabirul', 'Abbas Uddin Ahmed Hall,BAUST', 'Bangladesh', 'Parbotipur', '44567', '01758674755', 'sadik@gmail.com', '970bd627f415e0a127210d2cecf2311f'),
(18, 'Nazmul Alam Nowfel', 'Abbas Uddin Ahmed Hall,BAUST', 'Bangladesh', 'Dhaka', '112234', '01746046537', 'nazmul@gmail.com', 'ed77f311f801f2d976c3392791863d18'),
(19, 'Rizwabur Rahman', 'Noakhali', 'Noakhali', 'Feni', '334456', '01876542344', 'noakhali@gmail.com', 'ddfebcfdb9bf0ff98928634c6fac1a2d');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`id`, `customerid`, `productid`, `invoice_no`, `productname`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(1, 1, 2, 885250347, 'Beef-boneless-net-weight-1-kg', '4', 2000.00, 'upload/6a01c12ae1.png', '2019-12-14 10:57:30', 0),
(10, 1, 43, 1368008626, 'Potato-regular-net-weight-50-gm-1-kg', '1', 40.00, 'upload/c1376a2102.jpg', '2019-12-17 14:43:59', 0),
(13, 1, 34, 781219966, 'Garlic-premium-big-250-gm', '1', 80.00, 'upload/0c6b9e3429.png', '2019-12-17 15:05:09', 0),
(14, 1, 42, 1690506795, 'Coriander-leaves-100-gm', '1', 15.00, 'upload/cbb843732f.png', '2019-12-17 15:08:35', 0),
(15, 1, 42, 732535839, 'Coriander-leaves-100-gm', '1', 15.00, 'upload/cbb843732f.png', '2019-12-17 15:10:16', 0),
(16, 1, 43, 878653982, 'Potato-regular-net-weight-50-gm-1-kg', '1', 40.00, 'upload/c1376a2102.jpg', '2019-12-17 15:30:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pending_order`
--

CREATE TABLE `pending_order` (
  `id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `link`) VALUES
(1, 'Storing Data Locally in a PhoneGap App with SQLite', 'Data storing is a basic requirement while creating an application.\n\nIt is possible to store data online but the app needs to be online whenever data processing is required.\n\nFor local data storage use SQLite database which is already embedded on the mobile platforms - Android, IOS, Windows, Blackberry, etc.\n\nThe Cordova plugin provides support to access SQLite database in the app.\n\nIn this tutorial, I am creating an Android app where use SQLite database to save and retrieve records. Deploy the application with PhoneGap Build.', 'http://makitweb.com/storing-data-locally-in-a-phonegap-app-with-sqlite/'),
(2, 'jQuery UI autocomplete with PHP and AJAX', 'The autocomplete functionality shows the suggestion list according to the entered value. The user can select a value from the list.\n\nWith jQuery UI you can easily add autocomplete widget on the input element. Navigate to the suggestion list either by mouse or keyboard arrow keys.\n\nIt has the various options that allow us to customize the widget.', 'http://makitweb.com/jquery-ui-autocomplete-with-php-and-ajax/'),
(3, 'Add plugin to the Android app - PhoneGap', 'You cannot directly access the system feature in your PhoneGap app to extend its functionality.\n\nPhoneGap provide various plugins that allow accessing features like - camera, geolocation, contacts, battery status etc.', 'http://makitweb.com/add-plugin-to-the-android-app-phonegap/'),
(4, 'Insert record to Database Table - Codeigniter', 'All logical operation and database handling done in the Models like insert, update or fetch records.\n\nCodeigniter has predefined Database methods to perform database request.\n\nIn the demonstration, with View show the HTML form and when the user submits the forms then call the Model method to insert record from the controller.', 'http://makitweb.com/insert-record-to-database-table-codeigniter/'),
(5, 'How to install and setup Codeigniter', 'Codeigniter is a lightweight PHP-based framework to develop the web application. It is based on MVC (Model View Controller) pattern.\n', 'http://makitweb.com/how-to-install-and-setup-codeigniter/'),
(6, 'Add tooltip to the element with Bootstrap', 'Bootstrap provides dozens of custom plugins that helps to create better UI. With this, you can easily add tooltip to the HTML elements.\n\nA tooltip will appear when the user moves the mouse pointer over the element e.g. link, buttons, etc. This gives hint or quick information to the user.', 'http://makitweb.com/add-tooltip-to-the-element-with-bootstrap/'),
(7, 'Make android app with PhoneGap Build', 'PhoneGap is a framework that use to build mobile applications for multiple platforms - Android, iOS, Windows Phone, Blackberry etc.\n\nWith HTML, CSS, and JavaScript you can build an application.\n\nYou don\'t have to require to re-write code for other platforms.', 'http://makitweb.com/make-android-app-with-phonegap-build/'),
(8, 'How to handle AJAX request on the same page - PHP', 'AJAX is use to communicate with the server to perform the action without the need to refresh the page.\n\nYou can either handle AJAX requests on the same page or on the separate page.', 'http://makitweb.com/how-to-handle-ajax-request-on-the-same-page-php/'),
(9, 'Automatic page load progress bar with Pace.js', 'The pace.js is an automatic page load progress bar. You don\'t need to write any code to initialize the script during page load.\n\nIt is easy to implement and not dependent on any other external JavaScript libraries.', 'http://makitweb.com/automatic-page-load-progress-bar-with-pace-js/'),
(10, 'Remove unwanted whitespace from the column - MySQL', 'There is always the possibility that the users may not enter the values as we expected and the data is being saved on the Database table. E.g. unwanted whitespace or characters with the value.\n\nYou will see the issue when you check for duplicate records or sort the list.', 'http://makitweb.com/remove-unwanted-white-space-from-the-column-mysql/'),
(11, 'How to capture picture from webcam with Webcam.js', 'Webcam.js is a JavaScript library that allows us to capture picture from the webcam.\n\nIt uses HTML5 getUserMedia API to capture the picture. Flash is only used if the browser doesn’t support getUserMedia.', 'http://makitweb.com/how-to-capture-picture-from-webcam-with-webcam-js/'),
(12, 'Make Price Range Slider with AngularJS and PHP', 'Most of the eCommerce sites e.g. Flipkart, Snapdeal, etc have a price range slider for searching purpose.\n\nThe user doesn\'t have to enter price range manually.', 'http://makitweb.com/make-price-range-slider-with-angularjs-and-php/'),
(13, 'Create alphabetical pagination with PHP MySQL', 'The alphabetical pagination searches the records according to the first character in a specific column.\n\nYou can either manually fix the characters from A-Z or use the database table column value to create the list.', 'http://makitweb.com/create-alphabetical-pagination-with-php-mysql/'),
(14, 'Check if username exists with AngularJS', 'It is always a better idea to check the entered username exists or not if you are allowing the users to choose username while registration and wants it to be unique.\n\nWith this, the user will instantly know that their chosen username is available or not.', 'http://makitweb.com/check-if-username-exists-with-angularjs/'),
(15, 'How to avoid jQuery conflict with other JS libraries', 'By default, jQuery uses $ as an alias for jQuery because of this reason sometimes it conflicts with other JS libraries if they are also using $ as a function or variable name.', 'http://makitweb.com/how-to-avoid-jquery-conflict-with-other-js-libraries/'),
(16, 'Check if element has certain Class - jQuery', 'jQuery has inbuilt methods that allow searching for the certain class within the element.\n\nBy using them you can easily check class on the selector and perform the action according to the response.', 'http://makitweb.com/check-if-element-has-certain-class-jquery/'),
(17, 'How to show Weather widget on the Website', 'There are many sites which offer free weather widget for the website. That are easy to embed.\n\nYou only need to specify some of the mandatory fields for generating the code.', 'http://makitweb.com/how-to-show-weather-widget-on-the-website/'),
(18, 'Convert Unix timestamp to Date time with JavaScript', 'The Unix timestamp value conversion with JavaScript mainly requires when the API request response contains the date time value in Unix format and requires to show it on the screen in user readable form.', 'http://makitweb.com/convert-unix-timestamp-to-date-time-with-javascript/'),
(19, 'Make Carousel slider with Siema plugin - JavaScript', 'The Siema is a lightweight JavaScript plugin that adds carousel slider on the page. It is not dependent on any other plugins and not require to do any styling.\n\nIt is easy to setup on the page.', 'http://makitweb.com/make-carousel-slider-with-siema-plugin-javascript/'),
(20, 'Create autocomplete search with AngularJS and PHP', 'The autocomplete functionality gives the user suggestions based on its input. From there, it can select an option.\n\nIn the demonstration, I am creating a search box and display suggestion list whenever the user input value in the search box.', 'http://makitweb.com/create-autocomplete-search-with-angularjs-and-php/');

-- --------------------------------------------------------

--
-- Table structure for table `products_table`
--

CREATE TABLE `products_table` (
  `productid` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_table`
--

INSERT INTO `products_table` (`productid`, `productname`, `catid`, `brandid`, `body`, `price`, `image`, `type`, `status`, `quantity`, `Time`) VALUES
(1, 'Bitter-gourd-local-net-weight-500-gm', 2, 9, '<p>bitter-gourd-local-net-weight-20-gm-500-gm</p>', 20.00, 'upload/cb51fc2d54.jpg', 1, 0, '25', '2019-12-14 04:54:32'),
(2, 'Beef-boneless-net-weight-1-kg', 7, 9, '<p>beef-boneless-net-weight-50-gm-1-kg</p>', 500.00, 'upload/6a01c12ae1.png', 1, 0, '10', '2019-12-14 04:56:08'),
(3, 'Pabda-fish-500-gm', 8, 9, '<p>pabda-fish-500-gm</p>', 200.00, 'upload/67ff4f6688.png', 1, 0, '15', '2019-12-14 11:54:20'),
(4, 'Broiler-chicken-skin-on-net-weight-1-kg', 7, 9, '<p>whole-broiler-chicken-skin-on-net-weight-50-gm-1-kg</p>', 220.00, 'upload/1ebed2a2e4.png', 1, 0, '5', '2019-12-14 11:59:35'),
(5, 'Deshi-pangas-net-weight-1-kg', 8, 9, '<p>deshi-pangas-net-weight-50-gm-15-kg</p>', 125.00, 'upload/1a9e9c9dbe.png', 1, 0, '10', '2019-12-14 12:00:31'),
(6, 'Canderel-sucralose-tablet-300-pcs', 16, 9, '<p>canderel-sucralose-tablet-300-pcs</p>', 440.00, 'upload/1bf5d0f4e7.jpg', 1, 0, '10', '2019-12-14 12:09:43'),
(7, 'Sweet-pumpkin-1-pcs', 2, 9, '<p>sweet-pumpkin-1-pcs</p>', 30.00, 'upload/0f06b4e990.png', 1, 0, '25', '2019-12-14 12:10:43'),
(8, 'Round-brinjals-black-net-weight-500-gm', 2, 9, '<p>round-brinjals-black-net-weight-50-gm-700-gm</p>', 40.00, 'upload/f451a0b5e5.jpg', 1, 0, '15', '2019-12-14 12:11:43'),
(9, 'Red-tomato-net-weight-500-gm', 2, 9, '<p>red-tomato-net-weight-10-gm-500-gm</p>', 50.00, 'upload/b26887d081.jpg', 1, 0, '15', '2019-12-14 12:12:36'),
(10, 'pnion-red-indian-piyaj-500-gm', 2, 9, '<p>onion-red-indian-piyaj-500-gm</p>', 55.00, 'upload/b2d3913a61.jpg', 1, 0, '50', '2019-12-14 12:13:30'),
(11, 'Paka-pape-net-weight-1-kg', 13, 9, '<p>paka-pape-net-weight-50-gm-1-kg</p>', 45.00, 'upload/2113b5696f.jpg', 1, 0, '10', '2019-12-14 12:15:22'),
(12, 'Green-grapes-250-gm', 13, 9, '<p>green-grapes-250-gm</p>', 200.00, 'upload/bd22810db3.jpg', 1, 0, '12', '2019-12-14 12:16:24'),
(13, 'RFL-topper-silver-pressure-cooker-80985-5L', 15, 9, '<p>rfl-topper-silver-pressure-cooker-80985-5-ltr</p>', 2200.00, 'upload/5e17294201.jpg', 1, 0, '25', '2019-12-14 12:19:35'),
(14, 'Stillness-still-fruits-planer-china-1-pc', 15, 9, '<p>stillness-still-fruits-planer-china-1-pcs</p>', 70.00, 'upload/ef1f8827dc.jpg', 1, 0, '15', '2019-12-14 12:20:20'),
(15, 'Super-star-led-light-white-15-w-pin', 15, 9, '<p>super-star-led-light-white-15-w-pin</p>', 400.00, 'upload/a6a3169445.png', 1, 0, '15', '2019-12-14 12:24:49'),
(16, 'Agrobiz--hand-made-muri-200-gm', 9, 9, '<p>agrobiz-puffed-rice-hand-made-muri-200-gm</p>', 45.00, 'upload/f6f8720c9a.png', 1, 0, '10', '2019-12-14 12:26:04'),
(17, 'BD-orange-jelly-500-gm', 17, 9, '<p>bd-orange-jelly-500-gm</p>', 75.00, 'upload/122d4ee627.png', 1, 0, '25', '2019-12-14 12:27:18'),
(18, 'Chocolate-horlicks-jar-550-gm', 17, 9, '<p>chocolate-horlicks-jar-550-gm</p>', 350.00, 'upload/6b4cd3e3a2.png', 1, 0, '12', '2019-12-14 12:28:42'),
(19, 'Dubli-boot-500-gm', 11, 9, '<p>dubli-boot-500-gm</p>', 120.00, 'upload/30b22048f4.png', 1, 0, '25', '2019-12-14 12:29:26'),
(20, 'Teer-soyabean-oil-8-ltr', 11, 6, '<p>teer-soyabean-oil-8-ltr</p>', 480.00, 'upload/ac73dc0819.png', 1, 0, '20', '2019-12-14 12:30:15'),
(21, 'Fresh-soyabean-oil-5-ltr', 11, 9, '<p>fresh-soyabean-oil-5-ltr</p>', 470.00, 'upload/2f598461e4.jpg', 1, 0, '10', '2019-12-14 12:31:05'),
(22, 'Fresh-suji-500-gm', 11, 10, '<p>fresh-suji-500-gm</p>', 180.00, 'upload/6c7ab5727a.png', 1, 0, '10', '2019-12-14 12:32:31'),
(23, 'Teer-semolina-suji-500-gm', 11, 6, '<p>teer-semolina-suji-500-gm</p>', 170.00, 'upload/a3970e74cd.png', 1, 0, '15', '2019-12-14 12:34:43'),
(24, 'Rupchanda-soyabean-oil-5-ltr', 11, 1, '<p>rupchanda-soyabean-oil-5-ltr</p>', 450.00, 'upload/14a6a4f174.png', 1, 0, '15', '2019-12-14 12:35:56'),
(25, 'Moshur-dal-deshi-1-kg', 11, 9, '<p>moshur-dal-deshi-1-kg</p>', 110.00, 'upload/362a6b721b.png', 1, 0, '18', '2019-12-14 12:36:50'),
(26, 'Danish-condensed-filled-milk-397-gm', 4, 9, '<p>danish-condensed-filled-milk-397-gm</p>', 50.00, 'upload/fc5c600802.png', 1, 0, '10', '2019-12-14 12:38:39'),
(27, 'Organic-deshi-chicken-eggs-12-pcs', 4, 9, '<p>organic-deshi-chicken-eggs-12-pcs</p>', 180.00, 'upload/0c2b926ecd.png', 1, 0, '25', '2019-12-14 12:39:58'),
(28, 'Bashundhara-facial-tissue-1Box', 6, 9, '<p>bashundhara-facial-tissue-chaldal-logo-120x2-ply</p>', 55.00, 'upload/326147fc09.png', 1, 0, '5', '2019-12-14 12:42:17'),
(29, 'Big-broom-31-sholar-1-pcs', 6, 9, '<p>big-broom-31-sholar-1-pcs</p>', 35.00, 'upload/61d219f9da.jpg', 1, 0, '15', '2019-12-14 12:43:33'),
(31, 'Npoly-laundry-basket-15x15-inch-blue', 6, 9, '<p>npoly-laundry-basket-15x15-inch-blue</p>', 50.00, 'upload/2b53786d71.jpg', 1, 0, '10', '2019-12-14 12:46:16'),
(32, 'Cocola-egg-noodles-180-gm', 9, 9, '<p>cocola-egg-noodles-180-gm</p>', 60.00, 'upload/ada8936e55.png', 1, 0, '12', '2019-12-14 12:48:29'),
(33, 'Cutting-pliers-china-1-pcs', 12, 9, '<p>cutting-pliers-china-1-pcs</p>', 120.00, 'upload/adf8b8216e.jpg', 3, 0, '25', '2019-12-17 06:43:39'),
(34, 'Garlic-premium-big-250-gm', 2, 9, '<p>garlic-premium-big-250-gm</p>', 80.00, 'upload/0c6b9e3429.png', 1, 0, '15', '2019-12-17 06:46:18'),
(35, 'Alpenliebe-creamfills-box-75-pcs', 9, 9, '<p>alpenliebe-creamfills-box-75-pcs</p>', 50.00, 'upload/3af206d32c.png', 1, 0, '8', '2019-12-17 06:47:40'),
(36, 'Cadbury-original-drinking-chocolate-250-gm', 9, 9, '<p>cadbury-original-drinking-chocolate-250-gm</p>', 30.00, 'upload/fc6c68f09e.png', 1, 0, '4', '2019-12-17 06:49:00'),
(37, 'Vitalia-sugar-free-corn-flakes-300-gm', 16, 9, '<p>vitalia-sugar-free-corn-flakes-300-gm</p>', 450.00, 'upload/cf6893483c.png', 3, 0, '4', '2019-12-17 06:50:44'),
(38, 'Pran-sour-curd-500-ml', 4, 12, '<p>pran-sour-curd-500-ml</p>', 60.00, 'upload/06f5ebd5ae.png', 3, 0, '15', '2019-12-17 06:52:03'),
(39, 'Milk-vita-liquid-milk-1-ltr', 4, 9, '<p>milk-vita-liquid-milk-1-ltr</p>', 75.00, 'upload/d86ffc64d5.png', 1, 0, '25', '2019-12-17 07:36:41'),
(40, 'Broiler-chicken-skin-off-net-weight-1-kg', 7, 9, '<p>whole-broiler-chicken-skin-off-net-weight-50-gm-1-kg</p>', 220.00, 'upload/bd95af3583.png', 1, 0, '15', '2019-12-17 07:38:43'),
(41, 'Shing-fish-after-cutting-500-gm', 8, 9, '<p>shing-fish-after-cutting-500-gm</p>', 440.00, 'upload/26edff1641.png', 0, 0, '10', '2019-12-17 07:39:29'),
(42, 'Coriander-leaves-100-gm', 2, 9, '<p>coriander-leaves-100-gm</p>', 15.00, 'upload/cbb843732f.png', 3, 0, '25', '2019-12-17 07:44:49'),
(43, 'Potato-regular-net-weight-50-gm-1-kg', 2, 12, '<p>potato-regular-net-weight-50-gm-1-kg</p>', 40.00, 'upload/c1376a2102.jpg', 1, 0, '25', '2019-12-17 07:45:33'),
(44, 'ginger-thai-net-weight-10-gm-250-gm', 2, 9, '<p>ginger-thai-net-weight-10-gm-250-gm</p>', 25.00, 'upload/26030c330a.jpg', 1, 0, '6', '2019-12-17 09:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_in_table`
--

CREATE TABLE `stock_in_table` (
  `serialNo` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_in_table`
--

INSERT INTO `stock_in_table` (`serialNo`, `productname`, `price`, `quantity`, `date`) VALUES
(1, 'Bitter-gourd-local-net-weight-500-gm', '20', 25, '2019-12-14 10:54:32'),
(2, 'Beef-boneless-net-weight-1-kg', '500', 15, '2019-12-14 10:56:08'),
(3, 'Beef-boneless-net-weight-1-kg', '500.00', 10, '2019-12-14 10:56:26'),
(4, 'Pabda-fish-500-gm', '200', 15, '2019-12-14 17:54:21'),
(5, 'Broiler-chicken-skin-on-net-weight-1-kg', '220', 5, '2019-12-14 17:59:35'),
(6, 'Deshi-pangas-net-weight-1-kg', '125', 10, '2019-12-14 18:00:31'),
(7, 'Canderel-sucralose-tablet-300-pcs', '440', 10, '2019-12-14 18:09:44'),
(8, 'Sweet-pumpkin-1-pcs', '30', 25, '2019-12-14 18:10:43'),
(9, 'Round-brinjals-black-net-weight-500-gm', '40', 15, '2019-12-14 18:11:43'),
(10, 'Red-tomato-net-weight-500-gm', '50', 15, '2019-12-14 18:12:36'),
(11, 'pnion-red-indian-piyaj-500-gm', '55', 50, '2019-12-14 18:13:30'),
(12, 'Paka-pape-net-weight-1-kg', '45', 10, '2019-12-14 18:15:22'),
(13, 'Green-grapes-250-gm', '200', 12, '2019-12-14 18:16:24'),
(14, 'RFL--silver-pressure-cooker-80985-5L', '2200', 30, '2019-12-14 18:18:48'),
(15, 'RFL-topper-silver-pressure-cooker-80985-5L', '2200', 25, '2019-12-14 18:19:36'),
(16, 'Stillness-still-fruits-planer-china-1-pc', '70', 15, '2019-12-14 18:20:20'),
(17, 'Super-star-led-light-white-15-w-pin', '400', 15, '2019-12-14 18:24:49'),
(18, 'Agrobiz--hand-made-muri-200-gm', '45', 10, '2019-12-14 18:26:04'),
(19, 'BD-orange-jelly-500-gm', '75', 25, '2019-12-14 18:27:18'),
(20, 'Chocolate-horlicks-jar-550-gm', '350', 12, '2019-12-14 18:28:42'),
(21, 'Dubli-boot-500-gm', '120', 25, '2019-12-14 18:29:26'),
(22, 'Teer-soyabean-oil-8-ltr', '480', 20, '2019-12-14 18:30:15'),
(23, 'Fresh-soyabean-oil-5-ltr', '470', 10, '2019-12-14 18:31:05'),
(24, 'Fresh-suji-500-gm', '180', 10, '2019-12-14 18:32:31'),
(25, 'Teer-semolina-suji-500-gm', '170', 15, '2019-12-14 18:34:43'),
(26, 'Rupchanda-soyabean-oil-5-ltr', '450', 15, '2019-12-14 18:35:56'),
(27, 'Moshur-dal-deshi-1-kg', '110', 18, '2019-12-14 18:36:50'),
(28, 'Danish-condensed-filled-milk-397-gm', '50', 10, '2019-12-14 18:38:39'),
(29, 'Organic-deshi-chicken-eggs-12-pcs', '180', 25, '2019-12-14 18:39:58'),
(30, 'Bashundhara-facial-tissue-1Box', '55', 5, '2019-12-14 18:42:17'),
(31, 'Big-broom-31-sholar-1-pcs', '35', 15, '2019-12-14 18:43:33'),
(32, 'Boti-Da-1-pcs', '150', 25, '2019-12-14 18:44:55'),
(33, 'Npoly-laundry-basket-15x15-inch-blue', '50', 10, '2019-12-14 18:46:16'),
(34, 'Cocola-egg-noodles-180-gm', '60', 12, '2019-12-14 18:48:29'),
(35, 'Cutting-pliers-china-1-pcs', '120', 25, '2019-12-17 12:43:39'),
(36, 'Garlic-premium-big-250-gm', '80', 15, '2019-12-17 12:46:18'),
(37, 'Alpenliebe-creamfills-box-75-pcs', '50', 8, '2019-12-17 12:47:40'),
(38, 'Alpenliebe-creamfills-box-75-pcs', '50.00', 8, '2019-12-17 12:48:11'),
(39, 'Cadbury-original-drinking-chocolate-250-gm', '30', 4, '2019-12-17 12:49:00'),
(40, 'Vitalia-sugar-free-corn-flakes-300-gm', '450', 4, '2019-12-17 12:50:44'),
(41, 'Pran-sour-curd-500-ml', '60', 15, '2019-12-17 12:52:03'),
(42, 'Milk-vita-liquid-milk-1-ltr', '75', 25, '2019-12-17 13:36:41'),
(43, 'Broiler-chicken-skin-off-net-weight-1-kg', '220', 15, '2019-12-17 13:38:43'),
(44, 'Shing-fish-after-cutting-500-gm', '440', 10, '2019-12-17 13:39:29'),
(45, 'Coriander-leaves-100-gm', '15', 25, '2019-12-17 13:44:49'),
(46, 'Potato-regular-net-weight-50-gm-1-kg', '40', 25, '2019-12-17 13:45:33'),
(47, 'ginger-thai-net-weight-10-gm-250-gm', '25', 6, '2019-12-17 15:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `stock_out_table`
--

CREATE TABLE `stock_out_table` (
  `id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_out_table`
--

INSERT INTO `stock_out_table` (`id`, `customerid`, `productid`, `invoice_no`, `productname`, `quantity`, `Date`) VALUES
(1, 1, 2, 13770714, 'Beef-boneless-net-weight-1-kg', '4', '2019-12-14 10:57:30'),
(2, 1, 1, 483868326, 'Bitter-gourd-local-net-weight-500-gm', '3', '2019-12-14 10:57:30'),
(3, 1, 29, 966724462, 'Big-broom-31-sholar-1-pcs', '1', '2019-12-16 01:11:48'),
(4, 1, 32, 1945187601, 'Cocola-egg-noodles-180-gm', '1', '2019-12-16 11:12:55'),
(5, 1, 27, 1114353404, 'Organic-deshi-chicken-eggs-12-pcs', '4', '2019-12-16 11:13:20'),
(6, 1, 32, 1661231550, 'Cocola-egg-noodles-180-gm', '10', '2019-12-16 12:02:55'),
(7, 1, 31, 641936742, 'Npoly-laundry-basket-15x15-inch-blue', '15', '2019-12-16 12:03:33'),
(8, 1, 29, 1389295824, 'Big-broom-31-sholar-1-pcs', '15', '2019-12-16 12:04:07'),
(9, 1, 28, 1082034120, 'Bashundhara-facial-tissue-1Box', '5', '2019-12-16 12:04:42'),
(10, 1, 43, 1759651222, 'Potato-regular-net-weight-50-gm-1-kg', '1', '2019-12-17 14:43:59'),
(11, 1, 41, 1417417743, 'Shing-fish-after-cutting-500-gm', '5', '2019-12-17 14:48:41'),
(12, 1, 37, 1964053277, 'Vitalia-sugar-free-corn-flakes-300-gm', '1', '2019-12-17 14:57:44'),
(13, 1, 34, 1679189502, 'Garlic-premium-big-250-gm', '1', '2019-12-17 15:05:09'),
(14, 1, 42, 388697423, 'Coriander-leaves-100-gm', '1', '2019-12-17 15:08:35'),
(15, 1, 42, 368103951, 'Coriander-leaves-100-gm', '1', '2019-12-17 15:10:16'),
(16, 1, 43, 673751594, 'Potato-regular-net-weight-50-gm-1-kg', '1', '2019-12-17 15:30:52'),
(17, 1, 44, 1899870178, 'ginger-thai-net-weight-10-gm-250-gm', '6', '2019-12-17 15:33:37');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_table`
--

CREATE TABLE `wishlist_table` (
  `id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist_table`
--

INSERT INTO `wishlist_table` (`id`, `customerid`, `productid`, `productname`, `price`, `image`) VALUES
(1, 1, 24, 'Rupchanda-soyabean-oil-5-ltr', 450.00, 'upload/14a6a4f174.png'),
(2, 1, 28, 'Bashundhara-facial-tissue-1Box', 55.00, 'upload/326147fc09.png'),
(3, 1, 21, 'Fresh-soyabean-oil-5-ltr', 470.00, 'upload/2f598461e4.jpg'),
(5, 1, 12, 'Green-grapes-250-gm', 200.00, 'upload/bd22810db3.jpg'),
(6, 1, 19, 'Dubli-boot-500-gm', 120.00, 'upload/30b22048f4.png'),
(7, 17, 27, 'Organic-deshi-chicken-eggs-12-pcs', 180.00, 'upload/0c2b926ecd.png'),
(8, 17, 6, 'Canderel-sucralose-tablet-300-pcs', 440.00, 'upload/1bf5d0f4e7.jpg'),
(9, 1, 19, 'Dubli-boot-500-gm', 120.00, 'upload/30b22048f4.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `brand_table`
--
ALTER TABLE `brand_table`
  ADD PRIMARY KEY (`brandid`);

--
-- Indexes for table `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `compare_table`
--
ALTER TABLE `compare_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_table`
--
ALTER TABLE `contact_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_table`
--
ALTER TABLE `customer_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_order`
--
ALTER TABLE `pending_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_table`
--
ALTER TABLE `products_table`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_in_table`
--
ALTER TABLE `stock_in_table`
  ADD PRIMARY KEY (`serialNo`);

--
-- Indexes for table `stock_out_table`
--
ALTER TABLE `stock_out_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist_table`
--
ALTER TABLE `wishlist_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brand_table`
--
ALTER TABLE `brand_table`
  MODIFY `brandid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `compare_table`
--
ALTER TABLE `compare_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact_table`
--
ALTER TABLE `contact_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_table`
--
ALTER TABLE `customer_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pending_order`
--
ALTER TABLE `pending_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products_table`
--
ALTER TABLE `products_table`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_in_table`
--
ALTER TABLE `stock_in_table`
  MODIFY `serialNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `stock_out_table`
--
ALTER TABLE `stock_out_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `wishlist_table`
--
ALTER TABLE `wishlist_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
