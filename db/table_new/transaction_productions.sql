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
-- Table structure for table `transaction_productions`
--

CREATE TABLE `transaction_productions` (
  `transaction_production_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `transaction_production_code` varchar(100) NOT NULL,
  `transaction_production_date` date NOT NULL,
  `resep_id` int(11) NOT NULL,
  `transaction_production_target` int(11) NOT NULL,
  `transaction_production_hasil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction_productions`
--
ALTER TABLE `transaction_productions`
  ADD PRIMARY KEY (`transaction_production_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction_productions`
--
ALTER TABLE `transaction_productions`
  MODIFY `transaction_production_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
