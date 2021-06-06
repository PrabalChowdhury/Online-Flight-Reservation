-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 04:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_flight_server`
--
CREATE DATABASE IF NOT EXISTS `online_flight_server` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `online_flight_server`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `login_key` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `login_key`) VALUES
(1, 'Admin', 'admin@gmail.com', '123456', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `flight_id` char(10) NOT NULL,
  `flight_from` varchar(20) NOT NULL,
  `flight_to` varchar(20) NOT NULL,
  `flight_date` date NOT NULL,
  `flight_time` time NOT NULL,
  `flight_name` varchar(30) NOT NULL,
  `book_id` char(10) NOT NULL,
  `passenger_id` char(5) NOT NULL,
  `method` varchar(20) NOT NULL,
  `passenger_name` varchar(30) NOT NULL,
  `passenger_email` varchar(40) NOT NULL,
  `passenger_age` int(3) NOT NULL,
  `passenger_country` varchar(20) NOT NULL,
  `booking_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`flight_id`, `flight_from`, `flight_to`, `flight_date`, `flight_time`, `flight_name`, `book_id`, `passenger_id`, `method`, `passenger_name`, `passenger_email`, `passenger_age`, `passenger_country`, `booking_type`) VALUES
('ER001', 'London', 'Dhaka', '2021-05-05', '22:49:10', 'Euro Airways', 'ER001_1', '1', 'credit', 'alif', 'alif@gmail.com', 0, '', 'credit'),
('ER011', 'Dhaka', 'Rajshahi', '2021-05-04', '10:10:00', 'Euro Airways', 'ER011_5', '5', 'credit', 'Khadija', 'khadija@gmail.com', 0, '', 'credit'),
('ER001', 'London', 'Dhaka', '2021-05-05', '22:49:10', 'Euro Airways', 'ER001_1', '1', 'credit', 'alif', 'alif@gmail.com', 0, '', 'credit'),
('ER001', 'London', 'Dhaka', '2021-05-05', '22:49:10', 'Euro Airways', 'ER001_6', '6', 'credit', 'Farah', 'farah@gmail.com', 0, '', 'credit'),
('ER001', 'London', 'Dhaka', '2021-05-05', '22:49:10', 'Euro Airways', 'ER001_6', '6', '', 'Farah', 'farah@gmail.com', 0, '', ''),
('ER002', 'Dubai', 'Dhaka', '2021-05-13', '21:55:33', 'Euro Airways', 'ER002_6', '6', 'credit', 'Farah', 'farah@gmail.com', 0, '', 'credit'),
('ER085', 'Dubai', 'Dhaka', '2021-04-14', '22:31:05', 'Euro Airways', 'ER085_1', '1', 'credit', 'alif', 'alif@gmail.com', 0, '', 'credit'),
('ER001', 'Bangladesh', 'London', '2021-05-05', '22:49:10', 'Euro Airways', 'ER001_1', '1', 'credit', 'alif', 'alif@gmail.com', 0, '', 'credit'),
('ER002', 'Dhaka', 'London', '2021-05-05', '22:49:10', 'Euro Airways', 'ER00_5', '5', 'credit', 'Khadija', 'khadija@gmail.com', 0, '', 'credit'),
('ER002', 'Dhaka', 'London', '2021-05-05', '22:49:10', 'Euro Airways', 'ER00_5', '4', 'credit', 'Prabal', 'prabal@gmail.com', 0, '', 'credit');;

-- --------------------------------------------------------

--
-- Table structure for table `flight_table`
--

CREATE TABLE `flight_table` (
  `flight_id` char(10) NOT NULL,
  `flight_name` varchar(20) NOT NULL,
  `flight_from` varchar(20) NOT NULL,
  `flight_time` time DEFAULT NULL,
  `flight_date` date DEFAULT NULL,
  `flight_to` varchar(30) NOT NULL,
  `booking_type` varchar(20) NOT NULL,
  `booking_id` int(6) NOT NULL,
  `passenger_name` varchar(30) NOT NULL,
  `passenger_email` varchar(30) NOT NULL,
  `passenger_age` int(11) NOT NULL,
  `passenger_country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight_table`
--

INSERT INTO `flight_table` (`flight_id`, `flight_name`, `flight_from`, `flight_time`, `flight_date`, `flight_to`, `booking_type`, `booking_id`, `passenger_name`, `passenger_email`, `passenger_age`, `passenger_country`) VALUES
('ER001', 'Euro Airways', 'Dhaka', '22:49:10', '2021-05-05', 'London', 'booked', 1, 'Prabal Chowdhury', 'prabal@gmail.com', 22, 'Bangladesh'),
('ER011', 'Euro Airways', 'Rajshahi', '10:10:00', '2021-05-04', 'Dhaka', 'booked', 2, 'Arnab Saha', 'arnab@gmail.com', 20, 'Bangladesh'),
('ER001', 'Euro Airways', 'Dhaka', '22:49:10', '2021-05-05', 'London', 'booked', 3, 'Zinia Ahmed', 'zinia@gmail.com', 22, 'Singapore'),
('ER001', 'Euro Airways', 'London', '22:49:10', '2021-05-05', 'Bangladesh', 'booked', 18, 'alif', 'alif@gmail.com', 21, 'Bangladesh'),
('ER085', 'Euro Airways', 'Dhaka', '22:31:05', '2021-04-14', 'Dubai', 'cancelled', 75, 'Khadija Urmi', 'khadija@gmail.com', 21, 'Bangladesh'),
('ER001', 'Euro Airways', 'Bangladesh', '10:10:00', '2021-05-04', 'London', 'booked', 78, 'Khadija', 'khadija@gmail.com', 21, 'Bangladesh'),
('ER001', 'Euro Airways', 'London', '22:49:10', '2021-05-05', 'Bangladesh', 'booked', 85, 'Khadija', 'khadija@gmail.com', 21, 'Bangladesh'),
('ER001', 'Euro Airways', 'London', '22:49:10', '2021-05-05', 'Bangladesh', 'booked', 95, 'alif', 'alif@gmail.com', 21, 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `Date of Birth` date DEFAULT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `Address`, `Date of Birth`, `password`) VALUES
(1, 'alif', 'khan', 'alif@gmail.com', 'eastern point, 8-9, shantinagar, 1217', '1998-04-23', 'wewe'),
(2, 'Abdullah', 'Ayan', 'ayan@gmail.com', 'humayun road, block-b, mohammadpur, 1207', '1990-09-13', 'uweuwe'),
(5, 'Khadija', 'Urmi', 'khadija@gmail.com', '  68/a, east hajipara (1st floor), rampura, 1219', '1999-08-08', '123'),
(6, 'Farah', 'Jasmin', 'farah@gmail.com', 'house #19, road #7, baridhara, 1212', '1999-05-20', '123434'),
(4, 'Prabal', 'Chowdhury', 'prabal@gmail.com', 'house #32, road #5, Mohakhali, 1212', '1999-06-21', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight_table`
--
ALTER TABLE `flight_table`
  ADD PRIMARY KEY (`booking_id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
