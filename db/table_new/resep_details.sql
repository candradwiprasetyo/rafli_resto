-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2016 at 11:14 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rafli_resto`
--

-- --------------------------------------------------------

--
-- Table structure for table `resep_details`
--

CREATE TABLE `resep_details` (
  `resep_detail_id` int(11) NOT NULL,
  `resep_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `resep_detail_qty` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resep_details`
--

INSERT INTO `resep_details` (`resep_detail_id`, `resep_id`, `item_id`, `resep_detail_qty`, `user_id`) VALUES
(13, 7, 7, 10, 11),
(14, 8, 6, 500, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resep_details`
--
ALTER TABLE `resep_details`
  ADD PRIMARY KEY (`resep_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resep_details`
--
ALTER TABLE `resep_details`
  MODIFY `resep_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
