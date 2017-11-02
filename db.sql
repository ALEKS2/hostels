-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2017 at 05:04 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostels`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `mobile_phone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `mobile_phone`, `email`, `password`) VALUES
(1, 'aleks', '0753289323', 'aleksnyombi@gmail.com', 'alekzander');

-- --------------------------------------------------------

--
-- Table structure for table `allocations`
--

CREATE TABLE `allocations` (
  `id` int(11) NOT NULL,
  `hoste_id` int(11) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `allocation_id` varchar(200) NOT NULL,
  `room_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocations`
--

INSERT INTO `allocations` (`id`, `hoste_id`, `phone`, `allocation_id`, `room_number`) VALUES
(4, 3, '0753289323', 'Bascon59f9dc76cb77f', 'A1'),
(5, 6, '4444', 'Olympia59f9e63d444ec', ''),
(6, 3, '0753289323', 'Bascon59f9ef0e36a2f', 'A6');

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `id` int(10) NOT NULL,
  `hostel_name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `latitudes` double DEFAULT NULL,
  `longitudes` double DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `university` varchar(100) NOT NULL,
  `single_room_rent_fees` float NOT NULL,
  `double_room_rent_fees` float NOT NULL,
  `booking_fees` double NOT NULL,
  `distance_from_compus` float DEFAULT NULL,
  `description` text NOT NULL,
  `custodian_fname` varchar(100) NOT NULL,
  `custodian_lname` varchar(100) NOT NULL,
  `custodian_mobile_phone` varchar(30) DEFAULT NULL,
  `custodian_username` varchar(30) NOT NULL,
  `custodian_password` varchar(30) NOT NULL,
  `custodian_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`id`, `hostel_name`, `location`, `latitudes`, `longitudes`, `status`, `university`, `single_room_rent_fees`, `double_room_rent_fees`, `booking_fees`, `distance_from_compus`, `description`, `custodian_fname`, `custodian_lname`, `custodian_mobile_phone`, `custodian_username`, `custodian_password`, `custodian_email`) VALUES
(3, 'Bascon', 'Kikoni', 23432, 3243221312, 'mixed', 'Makerere', 600000, 900000, 100000, 100, 'Bascon is a place favourable to students with an environment that surpports the day to day activities of students', 'Nantege', 'Anastizia', '0772345263', 'nantezia', 'nantegezia', 'nantege@gmail.com'),
(4, 'nana', 'Kikoni', 1231231, 878728913, 'single_boys', 'Makerere', 878980000, 7687690, 89798789, 22, 'this is nana hostel', 'Nyombi', 'aleks', '07562215', 'alek', 'aleks', 'aleksnyombi@yahoo,com'),
(5, 'Nakiyinji', 'Kikoni', 100394890283, 273658639572, 'mixed', 'MUST', 7326860000, 2875630000, 7826587236, 300, 'fhksgshj shkjhgjksh sdhgjhsjkgshl fdshgkljshk', 'kibalama', 'musa', '0754353638', 'mus', 'musa', 'mus@gmail.com'),
(6, 'Olympia', 'Kikoni', 0.3356758, 32.5593014, 'single_girls', 'Makerere', 600000, 1000000, 100000, 400, 'It is a hostel of its own kind. It has a Swimming pool and a modern sporting facility. The rooms are large enough.he restaurant at the hostel offers food that would give KFC a run for its money. You can be assured of maximum security and privacy while at this hostel. Every room is entitled to oneâ€™s own wardrobe and the lavatories are 5-star.', 'tumwebaze', 'john', '0756342821', 'johny', 'johny', 'john@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `hostel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `hostel_id`) VALUES
(1, 'images/uploads/59f745fc836800.66786602.jpg', 3),
(2, 'images/uploads/59f7464bb16965.71010945.jpg', 3),
(3, 'images/uploads/59f74745b33535.53200118.jpg', 3),
(4, 'images/uploads/59f748d4c1e876.12730211.jpg', 3),
(5, 'images/uploads/59f74916e97434.30590984.jpg', 3),
(6, 'images/uploads/59f74a0f1774e3.33888771.jpg', 3),
(7, 'images/uploads/59f74b0c07d7f5.14535289.jpg', 3),
(8, 'images/uploads/59f74b36626616.72172530.jpg', 3),
(9, 'images/uploads/59f74b4943c914.21898262.jpeg', 3),
(10, 'images/uploads/59f75209162b02.86298741.jpg', 4),
(11, 'images/uploads/59f757c62c0154.13808337.jpg', 4),
(12, 'images/uploads/59f9e5b94fd6b9.58646480.jpg', 6),
(13, 'images/uploads/59f9e5d2d45d77.69180936.jpg', 6),
(14, 'images/uploads/59f9e6219fddc2.29803757.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `payements`
--

CREATE TABLE `payements` (
  `id` int(10) NOT NULL,
  `hostel_number` varchar(30) NOT NULL,
  `payement_phone_number` varchar(30) NOT NULL,
  `amount` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(10) NOT NULL,
  `room_number` varchar(30) NOT NULL,
  `room_type` varchar(30) NOT NULL,
  `room_status` varchar(30) NOT NULL,
  `hostel_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_number`, `room_type`, `room_status`, `hostel_id`) VALUES
(1, 'A3', 'single', 'taken', 3),
(2, 'A6', 'double', 'taken', 3),
(3, 'A1', 'single', 'taken', 3),
(4, 'B1', 'single', 'free', 3);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) NOT NULL,
  `transaction_date` date NOT NULL,
  `hostel_number` varchar(30) NOT NULL,
  `customer_phone_number` varchar(30) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allocations`
--
ALTER TABLE `allocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payements`
--
ALTER TABLE `payements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_number` (`room_number`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `allocations`
--
ALTER TABLE `allocations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `payements`
--
ALTER TABLE `payements`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
