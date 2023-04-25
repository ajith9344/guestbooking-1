-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 05:00 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guestbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetails`
--

CREATE TABLE `bookingdetails` (
  `id` int(10) NOT NULL,
  `adminid` int(10) UNSIGNED NOT NULL,
  `mansionname` varchar(100) NOT NULL,
  `roomno` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` text NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `totaldays` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookingdetails`
--

INSERT INTO `bookingdetails` (`id`, `adminid`, `mansionname`, `roomno`, `email`, `mobile`, `startdate`, `enddate`, `totaldays`) VALUES
(40, 71, 'admin1', 101, 'user1@gmail.com', '9344778307', '2023-03-03', '2023-03-18', 4),
(41, 74, 'admin3', 219, 'user2@gmail.com', '9344778307', '2023-03-03', '2023-03-16', 11);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `roomid` int(100) NOT NULL,
  `location` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `roomid`, `location`) VALUES
(55, 63, 'imageuploads/point3d-commercial-imaging-ltd-oxeCZrodz78-unsplash.jpg'),
(56, 64, 'imageuploads/img10.jpg'),
(57, 65, 'imageuploads/img1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `roomdetails`
--

CREATE TABLE `roomdetails` (
  `id` int(10) NOT NULL,
  `userid` int(100) NOT NULL,
  `mansionname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `roomno` int(10) NOT NULL,
  `roomsize` int(50) NOT NULL,
  `roomtype` varchar(10) NOT NULL,
  `noofbed` int(10) NOT NULL,
  `min` int(100) NOT NULL,
  `max` int(100) NOT NULL,
  `rent` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomdetails`
--

INSERT INTO `roomdetails` (`id`, `userid`, `mansionname`, `address`, `roomno`, `roomsize`, `roomtype`, `noofbed`, `min`, `max`, `rent`) VALUES
(63, 71, 'admin1', 'sdfghjkl', 101, 100, 'AC', 2, 10, 100, 1000),
(64, 72, 'admin2', 'fcgvhbjn', 201, 100, 'non AC', 3, 10, 30, 500),
(65, 74, 'admin3', 'redfghbn', 219, 100, 'AC', 1, 10, 100, 500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `mobile`) VALUES
(71, 'admin1@gmail.com', '8608835736'),
(72, 'admin2@gmail.com', '9344778307'),
(73, 'user1@gmail.com', '9768268689'),
(74, 'admin3@gmail.com', '8608835736'),
(75, 'user2@gmail.com', '8608835736');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomdetails`
--
ALTER TABLE `roomdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `roomdetails`
--
ALTER TABLE `roomdetails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `roomdetails`
--
ALTER TABLE `roomdetails`
  ADD CONSTRAINT `roomdetails_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
