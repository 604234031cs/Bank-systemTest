-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2020 at 10:32 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebank`
--
CREATE DATABASE IF NOT EXISTS `ebank` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ebank`;

-- --------------------------------------------------------

--
-- Table structure for table `account_bank`
--

DROP TABLE IF EXISTS `account_bank`;
CREATE TABLE `account_bank` (
  `acc_id` int(16) NOT NULL,
  `acc_name` varchar(50) DEFAULT NULL,
  `c_id` int(4) DEFAULT NULL,
  `branch_name` varchar(50) DEFAULT NULL,
  `pin_suc` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_bank`
--

INSERT INTO `account_bank` (`acc_id`, `acc_name`, `c_id`, `branch_name`, `pin_suc`) VALUES
(123123, 'มุมิ', 19, 'ธนาคารA', 123456),
(777777, 'รูนี', 20, 'ธนาคารB', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `banker`
--

DROP TABLE IF EXISTS `banker`;
CREATE TABLE `banker` (
  `b_id` varchar(10) NOT NULL,
  `b_name` varchar(50) DEFAULT NULL,
  `b_sname` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `phone_number` varchar(10) DEFAULT NULL,
  `b_username` varchar(20) DEFAULT NULL,
  `b_password` varchar(20) DEFAULT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banker`
--

INSERT INTO `banker` (`b_id`, `b_name`, `b_sname`, `address`, `phone_number`, `b_username`, `b_password`, `uid`) VALUES
('officer001', 'สมชาย', 'รำลูกกา', '140/42633', '096545653', 'officer', '1234', 24);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `date_bill` timestamp NOT NULL DEFAULT current_timestamp(),
  `loan_id` int(11) DEFAULT NULL,
  `acc_id` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `date_bill`, `loan_id`, `acc_id`) VALUES
(5, '2020-03-12 04:47:02', 11, 123123);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE `branch` (
  `branch_name` varchar(50) NOT NULL,
  `branch_city` varchar(50) DEFAULT NULL,
  `assets` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_name`, `branch_city`, `assets`) VALUES
('ธนาคารA', 'A', 5000),
('ธนาคารB', 'B', 5000),
('ธนาคารC', 'C', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `c_id` int(4) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_lastname` varchar(50) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_sex` varchar(5) NOT NULL,
  `uid` int(11) NOT NULL,
  `c_password` varchar(30) NOT NULL,
  `c_address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_lastname`, `c_email`, `c_sex`, `uid`, `c_password`, `c_address`, `phone_number`) VALUES
(19, 'จิวารีย์', 'รอดเนียม', 'muna@gmil.com', 'หญิง', 48, '123456', '397 ม.2 ต.หนองธง อ.ป่าบอน จ.พัทลุง 93170', '0996171189'),
(20, 'รูฮานี', 'สมุทร', 'runee@gmail.com', 'หญิง', 49, '123123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

DROP TABLE IF EXISTS `deposit`;
CREATE TABLE `deposit` (
  `id_deposit` int(11) NOT NULL,
  `number_deposit` double DEFAULT NULL,
  `date_deposit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `number_deposit_balance` double DEFAULT NULL,
  `c_id` int(4) DEFAULT NULL,
  `acc_id` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`id_deposit`, `number_deposit`, `date_deposit`, `number_deposit_balance`, `c_id`, `acc_id`) VALUES
(40, 200, '2020-03-12 04:45:01', NULL, 19, 123123),
(41, 300, '2020-03-12 04:45:01', NULL, 20, 777777);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

DROP TABLE IF EXISTS `loan`;
CREATE TABLE `loan` (
  `loan_id` int(11) NOT NULL,
  `amount` double DEFAULT NULL,
  `acc_id` int(16) DEFAULT NULL,
  `branch_name` varchar(50) DEFAULT NULL,
  `date_loan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(15) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loan_id`, `amount`, `acc_id`, `branch_name`, `date_loan`, `status`, `c_id`) VALUES
(11, 2000, 123123, 'ธนาคารC', '2020-03-12 04:47:02', 'อนุมัติ', 19);

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

DROP TABLE IF EXISTS `userlogin`;
CREATE TABLE `userlogin` (
  `uid` int(11) NOT NULL,
  `uusername` varchar(30) NOT NULL,
  `upassword` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`uid`, `uusername`, `upassword`, `status`) VALUES
(24, 'officer', '1234', 'officer'),
(48, 'muna@gmil.com', '123456', 'customer'),
(49, 'runee@gmail.com', '123123', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_bank`
--
ALTER TABLE `account_bank`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `banker`
--
ALTER TABLE `banker`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_email` (`c_email`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id_deposit`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id_deposit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
