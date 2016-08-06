-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 05, 2016 at 04:38 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flight_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cust_id` varchar(100) NOT NULL,
  `loc_from` varchar(50) NOT NULL,
  `loc_to` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_date`, `flight_date`, `cust_id`, `loc_from`, `loc_to`) VALUES
  (1, '2016-08-05 08:20:54', '0000-00-00 00:00:00', '88730336357a1eb1b4541b', 'KOlkata', 'Chennai'),
  (2, '2016-08-05 08:22:25', '0000-00-00 00:00:00', '88730336357a1eb1b4541b', 'Kolkata', 'Chennai'),
  (3, '2016-08-05 08:24:56', '2016-08-06 04:54:56', '88730336357a1eb1b4541b', 'Kolkata', 'Chennai'),
  (4, '2016-08-05 08:38:22', '2016-08-07 05:08:22', '88730336357a1eb1b4541b', 'Howrah', 'Chennai'),
  (8, '2016-08-05 13:01:42', '2016-08-07 18:30:00', '88730336357a1eb1b4541b', 'df', 'ewrwer'),
  (9, '2016-08-05 13:32:26', '2016-08-07 18:30:00', '88730336357a1eb1b4541b', 'df', 'ewrwer'),
  (10, '2016-08-05 13:38:08', '2016-08-16 18:30:00', '88730336357a1eb1b4541b', 'Kempegowda International Airport', 'HAL Airport'),
  (11, '2016-08-05 13:39:47', '2016-08-03 18:30:00', '88730336357a1eb1b4541b', 'HAL Airport', 'Rajiv Gandhi International Airport'),
  (17, '2016-08-05 14:31:24', '2016-08-22 18:30:00', '88730336357a1eb1b4541b', 'Cochin International Airport', 'Cochin International Airport'),
  (18, '2016-08-05 14:33:23', '2016-09-07 18:30:00', '88730336357a1eb1b4541b', 'Rajiv Gandhi International Airport', 'Cochin International Airport'),
  (19, '2016-08-05 14:33:50', '2016-12-07 18:30:00', '88730336357a1eb1b4541b', 'Rajiv Gandhi International Airport', 'Sardar Vallabhbhai Patel International Airport');

-- --------------------------------------------------------

--
-- Table structure for table `loginAttempts`
--

CREATE TABLE `loginAttempts` (
  `IP` varchar(20) NOT NULL,
  `Attempts` int(11) NOT NULL,
  `LastLogin` datetime NOT NULL,
  `Username` varchar(65) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loginAttempts`
--

INSERT INTO `loginAttempts` (`IP`, `Attempts`, `LastLogin`, `Username`, `ID`) VALUES
  ('127.0.0.1', 1, '2016-08-03 15:00:56', 'arka', 1),
  ('127.0.0.1', 2, '2016-08-03 15:14:13', 'adf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` char(23) NOT NULL,
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `mod_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `email`, `verified`, `mod_timestamp`) VALUES
  ('88730336357a1eb1b4541b', 'arka', '$2y$10$78nK7jLgfXJMFOgiexwaDuw9YTbXYOIg/q8n/Iz.25atvqmFaHpcK', 'arkashet@gmail.com', 1, '2016-08-03 13:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `age` smallint(6) NOT NULL,
  `cust_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`id`, `first_name`, `last_name`, `age`, `cust_id`) VALUES
  (3, 'hello', 'hello1', 50, '88730336357a1eb1b4541b'),
  (4, 'hello', 'hello1', 50, '88730336357a1eb1b4541b'),
  (5, 'akra1', 'sh', 20, '88730336357a1eb1b4541b'),
  (6, 'akra2', 'dsf', 22, '88730336357a1eb1b4541b'),
  (7, 'akra2', 'dsf', 22, '88730336357a1eb1b4541b'),
  (8, 'akra2e', 'dsf3', 34, '88730336357a1eb1b4541b'),
  (9, 'akra2e', 'dsf3', 34, '88730336357a1eb1b4541b');

-- --------------------------------------------------------

--
-- Table structure for table `passengers_bookings`
--

CREATE TABLE `passengers_bookings` (
  `pass_id` varchar(100) NOT NULL,
  `book_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passengers_bookings`
--

INSERT INTO `passengers_bookings` (`pass_id`, `book_id`) VALUES
  ('2', '4'),
  ('5', '4'),
  ('7', '4'),
  ('9', '4'),
  ('1', '8'),
  ('3', '8'),
  ('4', '8'),
  ('1', '9'),
  ('3', '9'),
  ('4', '9'),
  ('1', '10'),
  ('3', '10'),
  ('4', '10'),
  ('1', '11'),
  ('3', '11'),
  ('4', '11'),
  ('1', '17'),
  ('3', '17'),
  ('4', '17'),
  ('1', '18'),
  ('3', '18'),
  ('4', '18'),
  ('1', '19'),
  ('3', '19'),
  ('4', '19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginAttempts`
--
ALTER TABLE `loginAttempts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `loginAttempts`
--
ALTER TABLE `loginAttempts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;