-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 04:57 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unleashe_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(200) NOT NULL,
  `total_adult` int(50) NOT NULL,
  `total_children` int(50) NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `special_requirement` text NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `total_amount` double DEFAULT NULL,
  `deposit` double NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone_no` varchar(30) NOT NULL,
  `add_line1` varchar(100) NOT NULL,
  `add_line2` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `postcode` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `total_adult`, `total_children`, `checkin_date`, `checkout_date`, `special_requirement`, `payment_status`, `total_amount`, `deposit`, `booking_date`, `first_name`, `last_name`, `email`, `telephone_no`, `add_line1`, `add_line2`, `city`, `state`, `postcode`, `country`) VALUES
(169, 2, 1, '2020-12-01', '2020-12-08', '', 'pending', 245, 24.5, '2020-10-02 14:45:18', 'George', 'Dimopoulos', 'geordedim@gmail.com', '+306932076969', 'Praxitelous 122', '', 'Piraeus', 'Piraeus', '10659', 'Greece'),
(170, 1, 0, '2020-11-15', '2020-11-26', '', 'pending', 575, 57.5, '2020-10-02 14:48:16', 'George', 'Dimopoulos', 'geordedim@gmail.com', '+306932076969', 'Praxitelous 122', '', 'Piraeus', 'Piraeus', '10659', 'Greece'),
(171, 2, 0, '2020-10-02', '2020-10-03', '', 'confirmed', 674, 67.4, '2020-10-02 14:48:59', 'George', 'Dimopoulos', 'geordedim@gmail.com', '+306932076969', 'Praxitelous 122', '', 'Piraeus', 'Piraeus', '10659', 'Greece'),
(172, 3, 2, '2020-10-14', '2020-10-16', '', 'confirmed', 70, 7, '2020-10-02 14:51:27', 'John', 'Nikopoulos', 'johnnik33@gmail.com', '+306972964499', 'Kaniggos 33', '', 'Athens', 'Exarxeia', '10456', 'Greece'),
(173, 2, 0, '2020-10-26', '2020-10-30', 'Top treatment please :)', 'pending', 670, 67, '2020-10-02 14:52:12', 'John', 'Nikopoulos', 'johnnik33@gmail.com', '+306972964499', 'Kaniggos 33', '', 'Athens', 'Exarxeia', '10456', 'Greece'),
(174, 2, 1, '2020-10-24', '2020-10-30', '', 'pending', 90, 9, '2020-10-02 14:53:37', 'Dimosthenis', 'Tsintzinis', 'dimtsin@yahoo.gr', '+306944246985', 'Agorakritou 19', '', 'Volos', 'Nea Ionia', '10333', 'Greece');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(255) NOT NULL,
  `total_room` int(255) NOT NULL,
  `occupancy` int(255) DEFAULT NULL,
  `size` varchar(30) DEFAULT NULL,
  `view` varchar(30) DEFAULT NULL,
  `room_name` varchar(50) NOT NULL,
  `descriptions` text DEFAULT NULL,
  `rate` double NOT NULL,
  `imgpath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `total_room`, `occupancy`, `size`, `view`, `room_name`, `descriptions`, `rate`, `imgpath`) VALUES
(1, 10, 2, '50 sqm', 'Mountain', 'Comfort Room', 'A minimalistic and premium room with great mountainous view.', 35, 'img/1.jpg'),
(2, 15, 1, '30 sqm', 'Moutain', 'Value Room', 'A value for money single person room with great view to the mountains.', 15, 'img/2.jpg'),
(3, 5, 3, '60 sqm', 'City', 'Modern Luxury Room', 'A modern and luxurious room that will fulfill all of your needs.', 75, 'img/3.jpg'),
(6, 3, 2, '55 sqm', 'Forest', 'Royal Luxury Room', 'A very luxurious and royal high-end room for selected customers.', 99, 'img/4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roombook`
--

CREATE TABLE `roombook` (
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `totalroombook` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roombook`
--

INSERT INTO `roombook` (`booking_id`, `room_id`, `totalroombook`, `id`) VALUES
(169, 1, 1, 108),
(170, 2, 2, 109),
(171, 6, 1, 110),
(172, 1, 1, 111),
(173, 3, 2, 112),
(174, 2, 1, 113);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `role` text NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(14, 'admin', '1234', 'admin'),
(15, 'customer', '1234', 'customer'),
(16, 'customer2', '1234', 'customer'),
(18, 'customer3', '1234', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `roombook`
--
ALTER TABLE `roombook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roombook`
--
ALTER TABLE `roombook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
