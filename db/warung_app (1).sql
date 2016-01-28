-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2016 at 04:23 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `warung_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
`bank_id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_account_number` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`bank_id`, `bank_name`, `bank_account_number`) VALUES
(1, 'Mandiri', ''),
(2, 'BCA', ''),
(3, 'BRI', '');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
`branch_id` int(11) NOT NULL,
  `branch_name` varchar(200) NOT NULL,
  `branch_img` text NOT NULL,
  `branch_desc` text NOT NULL,
  `branch_address` text NOT NULL,
  `branch_phone` varchar(100) NOT NULL,
  `branch_city` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `branch_name`, `branch_img`, `branch_desc`, `branch_address`, `branch_phone`, `branch_city`) VALUES
(1, 'Margomulyo', '1443152710_3-giraffe-restaurant-website.jpg', 'Caband pertama23', 'Gilang rt 24 rw 7 kav gg mangga taman sidoarjo23', '214748364723', 'Sidoarjo23'),
(2, 'Gedangan', '', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE IF NOT EXISTS `buildings` (
`building_id` int(11) NOT NULL,
  `building_name` varchar(100) NOT NULL,
  `building_img` text NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`building_id`, `building_name`, `building_img`, `branch_id`) VALUES
(1, 'Ruang 1', '20150424120435_border-meja.png', 1),
(2, 'Ruang 2', '20150424010411_room2.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `employee_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `employee_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `item_limit` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `unit_id`, `item_limit`) VALUES
(7, 'Minyak goreng', 2, 3000),
(6, 'Beras', 3, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `item_stocks`
--

CREATE TABLE IF NOT EXISTS `item_stocks` (
`item_stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_stock_qty` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_stocks`
--

INSERT INTO `item_stocks` (`item_stock_id`, `item_id`, `item_stock_qty`, `branch_id`) VALUES
(3, 6, 43800, 1),
(4, 7, 200, 1),
(5, 7, 7000, 2),
(6, 6, 1000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE IF NOT EXISTS `journals` (
`journal_id` int(11) NOT NULL,
  `journal_type_id` int(11) NOT NULL,
  `data_id` int(11) NOT NULL,
  `data_url` text NOT NULL,
  `journal_debit` int(11) NOT NULL,
  `journal_credit` int(11) NOT NULL,
  `journal_piutang` int(11) NOT NULL,
  `journal_hutang` int(11) NOT NULL,
  `journal_date` date NOT NULL,
  `journal_desc` text NOT NULL,
  `bank_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`journal_id`, `journal_type_id`, `data_id`, `data_url`, `journal_debit`, `journal_credit`, `journal_piutang`, `journal_hutang`, `journal_date`, `journal_desc`, `bank_id`, `user_id`, `branch_id`) VALUES
(14, 1, 13, '', 36000, 0, 0, 0, '2015-10-13', 'Meja 4', 0, 11, 1),
(15, 2, 18, 'purchase.php?page=form&id=', 0, 300000, 0, 0, '2015-10-13', 'Beras', 0, 11, 2),
(16, 1, 14, '', 32000, 0, 0, 0, '2015-10-13', 'Meja 4', 0, 11, 1),
(17, 1, 15, '', 34000, 0, 0, 0, '2015-10-13', 'Meja 4', 0, 11, 1),
(18, 3, 18, 'jurnal_umum.php?page=form&id=', 500000, 0, 0, 0, '2015-10-13', 'Modal kecil', 0, 11, 1),
(19, 1, 16, '', 36000, 0, 0, 0, '2015-10-16', 'Meja 4', 0, 11, 1),
(20, 1, 17, '', 66000, 0, 0, 0, '2015-11-15', 'Meja 4', 0, 11, 1),
(21, 1, 1, '', 71000, 0, 0, 0, '2015-11-23', 'Meja 4', 1, 11, 1),
(22, 1, 2, '', 0, 0, 0, 0, '2015-11-30', 'Meja 4', 0, 11, 1),
(23, 1, 3, '', 0, 0, 0, 0, '2015-11-30', 'Meja 4', 0, 11, 1),
(24, 1, 4, '', 0, 0, 0, 0, '2015-11-30', 'Meja 4', 0, 11, 1),
(25, 1, 5, '', 0, 0, 0, 0, '2015-11-30', 'Meja 4', 0, 11, 1),
(26, 1, 6, '', 0, 0, 0, 0, '2015-12-01', 'Meja 4', 0, 11, 1),
(27, 1, 7, '', 0, 0, 0, 0, '2015-12-01', 'Meja 4', 0, 11, 1),
(28, 1, 8, '', 0, 0, 0, 0, '2015-12-01', 'Meja 4', 0, 11, 1),
(29, 1, 9, '', 19000, 0, 0, 0, '2015-12-01', 'Meja 4', 1, 11, 1),
(30, 1, 10, '', 36000, 0, 0, 0, '2015-12-08', 'Meja 4', 0, 11, 1),
(31, 1, 11, '', 19000, 0, 0, 0, '2016-01-16', 'Meja 1', 0, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `journal_types`
--

CREATE TABLE IF NOT EXISTS `journal_types` (
`journal_type_id` int(11) NOT NULL,
  `journal_type_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal_types`
--

INSERT INTO `journal_types` (`journal_type_id`, `journal_type_name`) VALUES
(1, 'Penjualan'),
(2, 'Pembelian'),
(3, 'Pemasukan lainnya'),
(4, 'Pengeluaran lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`member_id` int(11) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `member_phone` varchar(100) NOT NULL,
  `member_email` varchar(200) NOT NULL,
  `member_settlement` int(11) NOT NULL,
  `member_discount` int(11) NOT NULL,
  `member_discount_type` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_name`, `member_phone`, `member_email`, `member_settlement`, `member_discount`, `member_discount_type`) VALUES
(1, 'Timor timor', '0858 3030 2124', '', 1325, 5, 2),
(2, 'Utara Utara', '0858 3030 3333', '', 0, 10, 1),
(3, 'Mobilio', '-', '', 0, 10, 1),
(4, 'Candra', '08112523235', 'ade@gmail.com', 0, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member_items`
--

CREATE TABLE IF NOT EXISTS `member_items` (
`member_item_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_items`
--

INSERT INTO `member_items` (`member_item_id`, `member_id`, `menu_id`) VALUES
(1, 1, 3),
(5, 2, 1),
(6, 2, 3),
(7, 1, 2),
(8, 1, 5),
(9, 1, 13),
(10, 1, 1),
(11, 1, 14),
(117, 3, 1),
(118, 3, 2),
(119, 3, 20),
(120, 3, 21),
(121, 3, 31),
(122, 3, 32),
(123, 3, 41),
(124, 3, 42),
(125, 3, 3),
(126, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`menu_id` int(11) NOT NULL,
  `menu_type_id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_original_price` int(11) NOT NULL,
  `menu_margin_price` int(11) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_img` text NOT NULL,
  `partner_id` int(11) NOT NULL,
  `out_time` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `menu_type_id`, `menu_name`, `menu_original_price`, `menu_margin_price`, `menu_price`, `menu_img`, `partner_id`, `out_time`) VALUES
(1, 1, 'Soto Kudus', 9000, 0, 9000, 'sotokudus.jpg', 1, '1'),
(2, 1, 'Lontong Pecel ', 10000, 0, 10000, 'kolomkita-detik-com.jpg', 1, '1'),
(3, 1, 'Ayam Bakar', 16000, 1000, 17000, 'ayam-bakar-bandung.jpg', 1, '5'),
(4, 1, 'Ayam Kremes', 17000, 0, 17000, 'ayamkremes.jpg', 1, '5'),
(5, 1, 'Tahu Gimbal', 14000, 0, 14000, 'tahugimbalcvr.jpg', 1, '5'),
(6, 1, 'Mie Goreng Jogja', 15000, 1000, 16000, 'bakmi-akup.jpg', 1, '5'),
(12, 1, 'Mie Godhog Jogja Mie Godhog Jogja Mie Godhog Jogja', 16000, 0, 16000, 'dashboard-design-26.jpg', 1, '5'),
(13, 1, 'Lentog Kudus', 9000, 0, 9000, '', 1, '5'),
(14, 2, 'Sate Paru', 4500, 0, 4500, '', 1, '5'),
(15, 2, 'Sate Pindang Telur Puyuh', 4000, 0, 4000, '', 1, '5'),
(16, 2, 'Perkedel', 4000, 0, 4000, '', 1, '5'),
(17, 2, 'Tahu Bacem', 4000, 0, 4000, '', 1, '5'),
(18, 2, 'Tempe bacem', 4000, 0, 4000, '', 1, '5'),
(19, 2, 'Limpa Goreng', 7500, 0, 7500, '', 1, '5'),
(20, 2, 'Telor Asin', 4500, 0, 4500, '', 1, '5'),
(21, 4, 'Sinom & Beras Kencur', 7000, 0, 7000, '', 1, '5'),
(22, 4, 'Es Dawet', 8000, 0, 8000, '', 1, '5'),
(23, 4, 'Es Tape Ketan Hitam', 7000, 0, 7000, '', 1, '5'),
(24, 4, 'Es Teler', 11000, 0, 11000, '', 1, '5'),
(25, 4, 'Teh Tarik', 8000, 0, 8000, '', 1, '5'),
(26, 4, 'Es Cao', 5000, 0, 5000, '', 1, '5'),
(27, 4, 'Es Kolak 8', 8000, 0, 8000, '', 1, '5'),
(28, 5, 'Jus Strawberry', 10000, 0, 10000, '', 1, '5'),
(29, 5, 'Jus Melon', 10000, 0, 10000, '', 1, '5'),
(30, 5, 'Jus Wortel', 10000, 0, 10000, '', 1, '5'),
(31, 5, 'Jus Sirsak', 10000, 0, 10000, '', 1, '5'),
(32, 5, 'Jus Jambu Merah', 10000, 0, 10000, '', 1, '5'),
(33, 5, 'Jus Tomat', 10000, 0, 10000, '', 1, '5'),
(34, 5, 'Jus Timun', 10000, 0, 10000, '', 1, '5'),
(35, 5, 'Jus Jeruk', 10000, 0, 10000, '', 1, '5'),
(36, 5, 'Jus Alpukat ', 12000, 0, 12000, '', 1, '5'),
(37, 5, 'Mix Jus', 13000, 0, 13000, '', 1, '5'),
(38, 6, 'Teh Manis Hangat', 4000, 0, 4000, '', 1, '5'),
(39, 6, 'Teh Tawar Hangat', 4000, 0, 4000, '', 1, '5'),
(40, 6, 'Es Teh', 4000, 0, 4000, '', 1, '5'),
(41, 3, 'Pisang Goreng Salju', 7000, 0, 7000, '', 1, '5'),
(42, 3, 'Tahu Kritis (Krispi Petis)', 7000, 0, 7000, '', 1, '5'),
(43, 6, 'Es Teh Tawar', 4000, 0, 4000, '', 1, '5'),
(44, 6, 'Es Teh Tarik', 8000, 0, 8000, '', 1, '5'),
(45, 6, 'Es Lemon Tea', 6000, 0, 6000, '', 1, '5'),
(46, 7, 'Kopi Hitam', 7000, 0, 7000, '', 1, '5'),
(47, 7, 'Kopi Susu', 8000, 0, 8000, '', 1, '5'),
(48, 7, 'Kopi Tarik', 8000, 0, 8000, '', 1, '5'),
(49, 8, 'Teh Botol', 4500, 0, 4500, '', 1, '5'),
(50, 8, 'Fruit Tea', 4500, 0, 4500, '', 1, '5'),
(51, 8, 'Fanta', 5000, 0, 5000, '', 1, '5'),
(52, 8, 'Sprite', 5000, 0, 5000, '', 1, '5'),
(53, 8, 'Coca-cola', 5000, 0, 5000, '', 1, '5'),
(54, 8, 'Air Mineral Besar', 4000, 0, 4000, '', 1, '5'),
(55, 8, 'Air Mineral Kecil', 3000, 0, 3000, '', 1, '5'),
(56, 9, 'Jeruk Manis', 6000, 0, 6000, '', 1, '5'),
(57, 9, 'Jeruk Nipis', 6000, 0, 6000, '', 1, '5'),
(58, 9, 'Es Sirup', 4000, 0, 4000, '', 1, '5'),
(59, 9, 'Es Sirup Susu', 6000, 0, 6000, '', 1, '5'),
(60, 9, 'Mega Mendung', 10000, 0, 10000, '', 1, '5'),
(61, 9, 'Fanta Susu', 10000, 0, 10000, '', 1, '5'),
(62, 3, 'cheese stick keju 1', 17000, 0, 17000, '', 1, '5'),
(63, 3, 'cheese stick keju 2', 15000, 0, 15000, '', 1, '5'),
(64, 3, 'Blinjo manis', 14000, 4000, 18000, '', 1, '5'),
(65, 3, 'Sutelo 1', 9000, 0, 9000, '', 1, '5'),
(66, 3, 'Sutelo 2', 7500, 0, 7500, '', 1, '5'),
(67, 3, 'Pisang mr kepok', 13000, 0, 13000, '', 1, '5'),
(68, 3, 'Kerupuk pedas', 6500, 0, 6500, '', 1, '5'),
(69, 3, 'Peyek', 4000, 0, 4000, '', 1, '5'),
(70, 3, 'Blinjo asin', 4000, 0, 4000, '', 1, '5'),
(71, 3, 'Rambak', 5000, 0, 5000, '', 1, '5'),
(72, 3, 'Kacang', 2000, 0, 2000, '', 1, '5'),
(73, 3, 'Brem Madiun', 5500, 3000, 8500, '', 1, '5'),
(74, 3, 'Kacang Oven Uwenak', 9500, 2500, 12000, '', 1, '5'),
(75, 3, 'Yangko Mulya', 18000, 2000, 20000, '', 1, '5'),
(76, 3, 'Kentang Rimbaku', 19000, 3000, 22000, '', 1, '5'),
(77, 3, 'Sale Pisang Barlin', 14000, 3000, 17000, '', 1, '5'),
(78, 3, 'Almond Crispy', 48500, 6500, 55000, '', 1, '5'),
(79, 3, 'Kue Blinjo Wisata Rasa', 23000, 4500, 27500, '', 1, '5'),
(80, 3, 'Ender-Ender', 16000, 3000, 19000, '', 1, '5'),
(81, 3, 'Lili Peanut', 14000, 3000, 17000, '', 1, '5'),
(82, 3, 'Kue Bolu Oky', 10500, 3500, 14000, '', 1, '5'),
(83, 3, 'Bipang Premium', 12500, 3500, 16000, '', 1, '5'),
(84, 3, 'Kacang Atom', 16000, 3000, 19000, '', 1, '5'),
(85, 3, 'Bugelen Pro', 14500, 2500, 17000, '', 1, '5'),
(86, 1, 'acar', 2000, 3000, 5000, 'best-logo-2013-2.jpg', 1, '5');

-- --------------------------------------------------------

--
-- Table structure for table `menu_recipes`
--

CREATE TABLE IF NOT EXISTS `menu_recipes` (
`menu_recipe_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_recipes`
--

INSERT INTO `menu_recipes` (`menu_recipe_id`, `menu_id`, `item_id`, `item_qty`) VALUES
(1, 1, 6, 100),
(2, 2, 6, 100),
(4, 2, 7, 200);

-- --------------------------------------------------------

--
-- Table structure for table `menu_types`
--

CREATE TABLE IF NOT EXISTS `menu_types` (
`menu_type_id` int(11) NOT NULL,
  `menu_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_types`
--

INSERT INTO `menu_types` (`menu_type_id`, `menu_type_name`) VALUES
(1, 'Makanan Utama'),
(2, 'Menu Pelengkap'),
(3, 'Camilan'),
(4, 'Minuman Utama'),
(5, 'Aneka Jus'),
(6, 'Teh'),
(7, 'Kopi'),
(8, 'Soft Drink'),
(9, 'Minuman Lain');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
`note_id` int(11) NOT NULL,
  `note_category_id` int(11) NOT NULL,
  `note_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `note_category_id`, `note_name`) VALUES
(1, 1, 'No MSG'),
(2, 1, 'Halal'),
(3, 1, 'No Halal'),
(4, 1, 'Vegetarian'),
(5, 1, 'No Bawang'),
(6, 1, 'No Daging'),
(7, 2, 'No Sambal'),
(8, 2, 'Tidak Pedas'),
(9, 2, 'Sendang'),
(10, 2, 'Pedas'),
(11, 2, 'Extra Pedas'),
(12, 3, 'Cepat'),
(13, 3, 'Sedang'),
(14, 3, 'Lambat'),
(15, 3, 'Tunggu'),
(16, 3, 'Satu-satu'),
(17, 4, 'Anak-Anak'),
(18, 4, 'Dewasa'),
(19, 4, 'Kecil'),
(20, 4, 'Sedang'),
(21, 4, 'Besar');

-- --------------------------------------------------------

--
-- Table structure for table `note_categories`
--

CREATE TABLE IF NOT EXISTS `note_categories` (
`note_category_id` int(11) NOT NULL,
  `note_category_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note_categories`
--

INSERT INTO `note_categories` (`note_category_id`, `note_category_name`) VALUES
(1, 'General'),
(2, 'Extra'),
(3, 'Penyajian'),
(4, 'Porsi');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE IF NOT EXISTS `partners` (
`partner_id` int(11) NOT NULL,
  `partner_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`partner_id`, `partner_name`) VALUES
(1, 'Hikaru Resto');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
`payment_id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_jumlah` int(11) NOT NULL,
  `payment_sisa` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE IF NOT EXISTS `payment_methods` (
`payment_method_id` int(11) NOT NULL,
  `payment_method_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`payment_method_id`, `payment_method_name`) VALUES
(1, 'Cash'),
(2, 'Debit'),
(3, 'Credit');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
`purchase_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `purchase_qty` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `purchase_total` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `purchase_date`, `item_id`, `purchase_qty`, `purchase_price`, `purchase_total`, `supplier_id`, `branch_id`) VALUES
(18, '2015-10-13', 6, 1000, 300000, 0, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

CREATE TABLE IF NOT EXISTS `reserved` (
`reserved_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `amount` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
`supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_phone` int(11) NOT NULL,
  `supplier_email` varchar(100) NOT NULL,
  `supplier_addres` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `supplier_phone`, `supplier_email`, `supplier_addres`) VALUES
(2, 'Toko Mandiri', 31, '', 'Jalan Letjen Sutoyo no 6 Surabaya'),
(3, 'Toko Cahaya Abadi', 21, 'cahayaabadi@yahoo.com', 'Jalan Imam Bonjol No 23 Surabaya'),
(4, 'Toko Lestari', 8312, 'tokolestari@gmail.com', 'Jalan KH. Ahmad Dahlan no 2 Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
`table_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `data_x` int(11) NOT NULL,
  `data_y` int(11) NOT NULL,
  `chair_number` int(11) NOT NULL,
  `table_status_id` int(11) NOT NULL,
  `tms_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `building_id`, `table_name`, `data_x`, `data_y`, `chair_number`, `table_status_id`, `tms_id`) VALUES
(0, 0, '-', 0, 0, 0, 1, 0),
(1, 1, '1', 147, 264, 2, 1, 1),
(2, 1, '2', 279, 197, 2, 1, 2),
(3, 1, '3', 242, 323, 2, 1, 2),
(4, 1, '4', 377, 253, 2, 2, 0),
(5, 2, '5', 299, 294, 2, 1, 0),
(6, 2, '6', 432, 226, 2, 1, 0),
(7, 2, '7', 545, 171, 2, 1, 0),
(8, 2, '8', 442, 369, 2, 1, 0),
(9, 1, '9', 856, 266, 2, 2, 0),
(10, 1, '5', 491, 312, 2, 1, 2),
(14, 2, '9', 590, 297, 2, 1, 0),
(15, 1, '7', 731, 329, 2, 1, 0),
(16, 1, '8', 719, 195, 2, 2, 0),
(17, 1, '6', 602, 253, 2, 1, 2),
(18, 2, '10', 707, 237, 2, 1, 0),
(19, 2, '11', 598, 448, 2, 1, 0),
(20, 2, '12', 726, 391, 2, 1, 0),
(21, 2, '13', 846, 325, 2, 1, 0),
(22, 1, '10', 602, 394, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_items`
--

CREATE TABLE IF NOT EXISTS `table_items` (
`table_item_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_qty` int(11) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_total_price` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_items`
--

INSERT INTO `table_items` (`table_item_id`, `table_id`, `menu_id`, `menu_qty`, `menu_price`, `menu_total_price`) VALUES
(1, 1, 1, 2, 4000, 8000),
(2, 1, 2, 1, 12000, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `table_mergers`
--

CREATE TABLE IF NOT EXISTS `table_mergers` (
`table_merger_id` int(11) NOT NULL,
  `table_parent_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_mergers`
--

INSERT INTO `table_mergers` (`table_merger_id`, `table_parent_id`, `table_id`) VALUES
(65, 1, 2),
(66, 1, 3),
(67, 1, 10),
(68, 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `table_merger_status`
--

CREATE TABLE IF NOT EXISTS `table_merger_status` (
`tms_id` int(11) NOT NULL,
  `tms_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_merger_status`
--

INSERT INTO `table_merger_status` (`tms_id`, `tms_name`) VALUES
(1, 'parent merger'),
(2, 'child merger');

-- --------------------------------------------------------

--
-- Table structure for table `table_status`
--

CREATE TABLE IF NOT EXISTS `table_status` (
`table_status_id` int(11) NOT NULL,
  `table_status_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_status`
--

INSERT INTO `table_status` (`table_status_id`, `table_status_name`) VALUES
(1, 'Kosong'),
(2, 'Order'),
(3, 'Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
`transaction_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_total` int(11) NOT NULL,
  `transaction_discount` int(11) NOT NULL,
  `transaction_grand_total` int(11) NOT NULL,
  `transaction_payment` int(11) NOT NULL,
  `transaction_change` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_account_number` varchar(100) NOT NULL,
  `transaction_code` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `table_id`, `branch_id`, `member_id`, `transaction_date`, `transaction_total`, `transaction_discount`, `transaction_grand_total`, `transaction_payment`, `transaction_change`, `payment_method_id`, `bank_id`, `user_id`, `bank_account_number`, `transaction_code`) VALUES
(9, 4, 1, 0, '2015-12-01 13:47:53', 19000, 0, 19000, 19000, 0, 3, 1, 11, '', 1448974073),
(10, 4, 1, 0, '2015-12-08 08:22:58', 36000, 0, 36000, 36000, 0, 1, 0, 11, '', 1449559378),
(11, 1, 1, 0, '2016-01-16 14:54:48', 19000, 0, 19000, 19000, 0, 1, 0, 11, '', 1452952488);

-- --------------------------------------------------------

--
-- Table structure for table `transactions_tmp`
--

CREATE TABLE IF NOT EXISTS `transactions_tmp` (
`transaction_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `tot_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_code` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions_tmp`
--

INSERT INTO `transactions_tmp` (`transaction_id`, `table_id`, `member_id`, `transaction_date`, `tot_id`, `user_id`, `transaction_code`) VALUES
(1, 4, 0, '2015-12-09 05:37:53', 1, 11, 1449635873),
(2, 16, 0, '2016-01-03 13:07:11', 1, 11, 1451822831),
(4, 9, 0, '2016-01-16 15:06:02', 1, 11, 1452953162);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE IF NOT EXISTS `transaction_details` (
`transaction_detail_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `transaction_detail_original_price` int(11) NOT NULL,
  `transaction_detail_margin_price` int(11) NOT NULL,
  `transaction_detail_price` int(11) NOT NULL,
  `transaction_detail_price_discount` int(11) NOT NULL,
  `transaction_detail_grand_price` int(11) NOT NULL,
  `transaction_detail_qty` int(11) NOT NULL,
  `transaction_detail_total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`transaction_detail_id`, `transaction_id`, `menu_id`, `transaction_detail_original_price`, `transaction_detail_margin_price`, `transaction_detail_price`, `transaction_detail_price_discount`, `transaction_detail_grand_price`, `transaction_detail_qty`, `transaction_detail_total`) VALUES
(20, 9, 1, 9000, 0, 9000, 0, 9000, 1, 9000),
(21, 9, 2, 10000, 0, 10000, 0, 10000, 1, 10000),
(22, 10, 1, 9000, 0, 9000, 0, 9000, 1, 9000),
(23, 10, 2, 10000, 0, 10000, 0, 10000, 1, 10000),
(24, 10, 3, 16000, 1000, 17000, 0, 17000, 1, 17000),
(25, 11, 1, 9000, 0, 9000, 0, 9000, 1, 9000),
(26, 11, 2, 10000, 0, 10000, 0, 10000, 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_new_tmp`
--

CREATE TABLE IF NOT EXISTS `transaction_new_tmp` (
`tnt_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `tnt_price` int(11) NOT NULL,
  `tnt_discount` int(11) NOT NULL,
  `tnt_grand_price` int(11) NOT NULL,
  `tnt_qty` int(11) NOT NULL,
  `tnt_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_order_types`
--

CREATE TABLE IF NOT EXISTS `transaction_order_types` (
`tot_id` int(11) NOT NULL,
  `tot_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_order_types`
--

INSERT INTO `transaction_order_types` (`tot_id`, `tot_name`) VALUES
(1, 'Dining'),
(2, 'Take away'),
(3, 'Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_tmp_details`
--

CREATE TABLE IF NOT EXISTS `transaction_tmp_details` (
`transaction_detail_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `transaction_detail_original_price` int(11) NOT NULL,
  `transaction_detail_margin_price` int(11) NOT NULL,
  `transaction_detail_price` int(11) NOT NULL,
  `transaction_detail_price_discount` int(11) NOT NULL,
  `transaction_detail_grand_price` int(11) NOT NULL,
  `transaction_detail_qty` int(11) NOT NULL,
  `transaction_detail_total` int(11) NOT NULL,
  `transaction_detail_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_tmp_details`
--

INSERT INTO `transaction_tmp_details` (`transaction_detail_id`, `transaction_id`, `menu_id`, `transaction_detail_original_price`, `transaction_detail_margin_price`, `transaction_detail_price`, `transaction_detail_price_discount`, `transaction_detail_grand_price`, `transaction_detail_qty`, `transaction_detail_total`, `transaction_detail_status`) VALUES
(1, 1, 1, 9000, 0, 9000, 0, 9000, 1, 9000, 1),
(2, 1, 2, 10000, 0, 10000, 0, 10000, 1, 10000, 1),
(3, 1, 3, 16000, 1000, 17000, 0, 17000, 1, 17000, 1),
(4, 2, 2, 10000, 0, 10000, 0, 10000, 1, 10000, 1),
(5, 2, 4, 17000, 0, 17000, 0, 17000, 1, 17000, 1),
(8, 4, 1, 9000, 0, 9000, 0, 9000, 1, 9000, 1),
(9, 4, 2, 10000, 0, 10000, 0, 10000, 1, 10000, 1),
(10, 4, 3, 16000, 1000, 17000, 0, 17000, 1, 17000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
`unit_id` int(11) NOT NULL,
  `unit_name` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_name`) VALUES
(1, 'Biji'),
(2, 'ml'),
(3, 'Gram'),
(4, 'Pack'),
(5, 'Kodi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `user_login` varchar(100) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_code` varchar(100) DEFAULT NULL,
  `user_phone` varchar(100) DEFAULT NULL,
  `user_img` text NOT NULL,
  `user_active_status` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type_id`, `user_login`, `user_password`, `user_name`, `user_code`, `user_phone`, `user_img`, `user_active_status`, `branch_id`) VALUES
(11, 1, 'melon', '3a2cf27458c9aa3e358f8fc0f002bff6', 'melon', 'A0001', '03125435432', '', 1, 1),
(16, 2, 'afan', '31d2ded22b8d2c27df1f45357f3a101b', 'Afan', '', '08112523235', '1444362477_4.jpg', 1, 1),
(18, 3, 'andri', '6bd3108684ccc9dfd40b126877f850b0', 'andri', '', '-', '1444373121_1 copy.jpg', 1, 2),
(19, 3, 'wawan', '0a000f688d85de79e3761dec6816b2a5', 'Wawan', '', '-', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
`user_type_id` int(11) NOT NULL,
  `user_type_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`user_type_id`, `user_type_name`) VALUES
(1, 'Administrator'),
(2, 'Owner'),
(3, 'Manager'),
(4, 'Cashier'),
(5, 'Waitress');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE IF NOT EXISTS `vouchers` (
`voucher_id` int(11) NOT NULL,
  `voucher_code` varchar(100) NOT NULL,
  `voucher_type_id` int(11) NOT NULL,
  `voucher_value` int(11) NOT NULL,
  `voucher_date` date NOT NULL,
  `voucher_active_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`voucher_id`, `voucher_code`, `voucher_type_id`, `voucher_value`, `voucher_date`, `voucher_active_status`) VALUES
(2, '1234', 1, 200000, '2015-12-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_types`
--

CREATE TABLE IF NOT EXISTS `voucher_types` (
`voucher_type_id` int(11) NOT NULL,
  `voucher_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher_types`
--

INSERT INTO `voucher_types` (`voucher_type_id`, `voucher_type_name`) VALUES
(1, 'Voucher Diskon');

-- --------------------------------------------------------

--
-- Table structure for table `widget_tmp`
--

CREATE TABLE IF NOT EXISTS `widget_tmp` (
`wt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `wt_desc` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `widget_tmp`
--

INSERT INTO `widget_tmp` (`wt_id`, `user_id`, `menu_id`, `jumlah`, `table_id`, `wt_desc`) VALUES
(1, 11, 1, 1, 4, ''),
(2, 11, 2, 1, 4, ''),
(3, 11, 3, 1, 4, ''),
(4, 11, 2, 1, 16, ''),
(5, 11, 4, 1, 16, ''),
(8, 11, 1, 1, 9, ''),
(9, 11, 2, 1, 9, ''),
(10, 11, 3, 1, 9, '');

-- --------------------------------------------------------

--
-- Table structure for table `widget_tmp_details`
--

CREATE TABLE IF NOT EXISTS `widget_tmp_details` (
`wtd_id` int(11) NOT NULL,
  `wt_id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `widget_tmp_details`
--

INSERT INTO `widget_tmp_details` (`wtd_id`, `wt_id`, `note_id`) VALUES
(1, 1, 1),
(2, 1, 8),
(3, 2, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
 ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
 ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
 ADD PRIMARY KEY (`building_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `item_stocks`
--
ALTER TABLE `item_stocks`
 ADD PRIMARY KEY (`item_stock_id`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
 ADD PRIMARY KEY (`journal_id`);

--
-- Indexes for table `journal_types`
--
ALTER TABLE `journal_types`
 ADD PRIMARY KEY (`journal_type_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `member_items`
--
ALTER TABLE `member_items`
 ADD PRIMARY KEY (`member_item_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menu_recipes`
--
ALTER TABLE `menu_recipes`
 ADD PRIMARY KEY (`menu_recipe_id`);

--
-- Indexes for table `menu_types`
--
ALTER TABLE `menu_types`
 ADD PRIMARY KEY (`menu_type_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
 ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `note_categories`
--
ALTER TABLE `note_categories`
 ADD PRIMARY KEY (`note_category_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
 ADD PRIMARY KEY (`partner_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
 ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
 ADD PRIMARY KEY (`payment_method_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
 ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `reserved`
--
ALTER TABLE `reserved`
 ADD PRIMARY KEY (`reserved_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
 ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
 ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `table_items`
--
ALTER TABLE `table_items`
 ADD PRIMARY KEY (`table_item_id`);

--
-- Indexes for table `table_mergers`
--
ALTER TABLE `table_mergers`
 ADD PRIMARY KEY (`table_merger_id`);

--
-- Indexes for table `table_merger_status`
--
ALTER TABLE `table_merger_status`
 ADD PRIMARY KEY (`tms_id`);

--
-- Indexes for table `table_status`
--
ALTER TABLE `table_status`
 ADD PRIMARY KEY (`table_status_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
 ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transactions_tmp`
--
ALTER TABLE `transactions_tmp`
 ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
 ADD PRIMARY KEY (`transaction_detail_id`);

--
-- Indexes for table `transaction_new_tmp`
--
ALTER TABLE `transaction_new_tmp`
 ADD PRIMARY KEY (`tnt_id`);

--
-- Indexes for table `transaction_order_types`
--
ALTER TABLE `transaction_order_types`
 ADD PRIMARY KEY (`tot_id`);

--
-- Indexes for table `transaction_tmp_details`
--
ALTER TABLE `transaction_tmp_details`
 ADD PRIMARY KEY (`transaction_detail_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
 ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
 ADD PRIMARY KEY (`user_type_id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
 ADD PRIMARY KEY (`voucher_id`);

--
-- Indexes for table `voucher_types`
--
ALTER TABLE `voucher_types`
 ADD PRIMARY KEY (`voucher_type_id`);

--
-- Indexes for table `widget_tmp`
--
ALTER TABLE `widget_tmp`
 ADD PRIMARY KEY (`wt_id`);

--
-- Indexes for table `widget_tmp_details`
--
ALTER TABLE `widget_tmp_details`
 ADD PRIMARY KEY (`wtd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `item_stocks`
--
ALTER TABLE `item_stocks`
MODIFY `item_stock_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
MODIFY `journal_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `journal_types`
--
ALTER TABLE `journal_types`
MODIFY `journal_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `member_items`
--
ALTER TABLE `member_items`
MODIFY `member_item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `menu_recipes`
--
ALTER TABLE `menu_recipes`
MODIFY `menu_recipe_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu_types`
--
ALTER TABLE `menu_types`
MODIFY `menu_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `note_categories`
--
ALTER TABLE `note_categories`
MODIFY `note_category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
MODIFY `partner_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
MODIFY `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `reserved`
--
ALTER TABLE `reserved`
MODIFY `reserved_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `table_items`
--
ALTER TABLE `table_items`
MODIFY `table_item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `table_mergers`
--
ALTER TABLE `table_mergers`
MODIFY `table_merger_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `table_merger_status`
--
ALTER TABLE `table_merger_status`
MODIFY `tms_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `table_status`
--
ALTER TABLE `table_status`
MODIFY `table_status_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `transactions_tmp`
--
ALTER TABLE `transactions_tmp`
MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
MODIFY `transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `transaction_new_tmp`
--
ALTER TABLE `transaction_new_tmp`
MODIFY `tnt_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction_order_types`
--
ALTER TABLE `transaction_order_types`
MODIFY `tot_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaction_tmp_details`
--
ALTER TABLE `transaction_tmp_details`
MODIFY `transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `voucher_types`
--
ALTER TABLE `voucher_types`
MODIFY `voucher_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `widget_tmp`
--
ALTER TABLE `widget_tmp`
MODIFY `wt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `widget_tmp_details`
--
ALTER TABLE `widget_tmp_details`
MODIFY `wtd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
