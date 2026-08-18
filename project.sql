-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2026 at 05:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `bid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `bdate` date NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `payment_status` varchar(80) NOT NULL,
  `no_of_kids` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_destination`
--

CREATE TABLE `tbl_destination` (
  `did` int(11) NOT NULL,
  `dname` varchar(80) NOT NULL,
  `dpic` text NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_destination`
--

INSERT INTO `tbl_destination` (`did`, `dname`, `dpic`, `type`) VALUES
(34, 'KASHMIR', 'uploads/kashmir.jpg', 'Domestic'),
(35, 'US', 'uploads/us (2).avif', 'International'),
(36, 'HAWAII', 'uploads/hawaii.avif', 'International'),
(37, 'DUBAI', 'uploads/dubai.avif', 'International'),
(38, 'LEH-LADAKH', 'uploads/leh.jpg', 'Domestic'),
(39, 'BALI', 'uploads/bali.webp', 'Domestic'),
(40, 'THAILAND', 'uploads/thailand.jpg', 'International'),
(41, 'MALDIVES', 'uploads/maldives.avif', 'International'),
(42, 'VIETNAM', 'uploads/vietnam.jpg', 'International'),
(43, 'JAIPUR', 'uploads/jaipur.webp', 'Domestic');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `image`) VALUES
(2, 'uploads/jaipur.webp'),
(4, 'uploads/vietnam.jpg'),
(5, 'uploads/maldives.avif'),
(7, 'uploads/thailand.jpg'),
(8, 'uploads/bali.webp'),
(9, 'uploads/leh.jpg'),
(11, 'uploads/goa.avif'),
(13, 'uploads/dubai.avif'),
(15, 'uploads/us (2).avif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `pid` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `did` int(11) NOT NULL,
  `pic` text NOT NULL,
  `type` varchar(80) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` text NOT NULL,
  `no_of_people` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`pid`, `pname`, `did`, `pic`, `type`, `price`, `description`, `no_of_people`, `date`, `time`) VALUES
(14, 'KASHMIR: PARADISE OF BLOOM', 34, 'uploads/kashmir.jpg', 'Domestic', 59984, 'a 3 day tour to kashmir the heaven on earth', 50, '2026-09-05', '20:01'),
(15, 'LEH LADAKH: UNCHARTED THRILLS', 38, 'uploads/leh.jpg', 'Domestic', 100000, 'An 8 day 7 night trip to Leh-Ladakh. A getaway with family and friends on an adventurous yet enjoyable ride on the hills of himalayan ghats', 20, '2026-09-30', '21:03'),
(16, 'JAIPUR: ROYAL PINK CITY LEGACY', 43, 'uploads/jaipur.webp', 'Domestic', 80000, 'A 5 day 4 night tour to jaipur. Known as pink city with the variety of castles and dune', 20, '2026-08-30', '21:10'),
(17, 'HAWAII: ALOHA ISLAND BREEZE', 36, 'uploads/hawaii.avif', 'International', 120000, 'Experience the perfect blend of leisure, adventure, and local culture with this specially crafted travel package. Enjoy handpicked accommodation, hassle-free transfers, expert guided tours, and personalized itineraries designed for modern travelers.', 50, '2027-03-16', '01:07'),
(18, 'THAILAND: BEACH, BAZZAR AND TEMPLE', 40, 'uploads/thailand.jpg', 'International', 180000, 'Experience the perfect blend of leisure, adventure, and local culture with this specially crafted travel package. Enjoy handpicked accommodation, hassle-free transfers, expert guided tours, and personalized itineraries designed for modern travelers.', 30, '2026-08-16', '21:15'),
(19, 'MALDIVES: OVERWATER HAVEN', 41, 'uploads/maldives.avif', 'International', 235000, 'Experience the perfect blend of leisure, adventure, and local culture with this specially crafted travel package. Enjoy handpicked accommodation, hassle-free transfers, expert guided tours, and personalized itineraries designed for modern travelers.', 45, '2027-03-21', '03:16'),
(20, 'VIETNAM: DRAGON BAY CRUISE', 42, 'uploads/vietnam.jpg', 'International', 178000, 'Experience the perfect blend of leisure, adventure, and local culture with this specially crafted travel package. Enjoy handpicked accommodation, hassle-free transfers, expert guided tours, and personalized itineraries designed for modern travelers.', 40, '2026-09-05', '00:00'),
(21, 'BALI: SACRED ISLAND', 39, 'uploads/bali.webp', 'International', 156000, 'Experience the perfect blend of leisure, adventure, and local culture with this specially crafted travel package. Enjoy handpicked accommodation, hassle-free transfers, expert guided tours, and personalized itineraries designed for modern travelers.', 20, '2026-10-28', '02:19'),
(22, 'DUBAI: GLITZ, DUNES AND SKYLINES', 37, 'uploads/dubai.avif', 'International', 280000, 'Experience the perfect blend of leisure, adventure, and local culture with this specially crafted travel package. Enjoy handpicked accommodation, hassle-free transfers, expert guided tours, and personalized itineraries designed for modern travelers.', 25, '2026-09-05', '00:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobileno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `password`, `email`, `mobileno`) VALUES
(10, 'Aryan Singh', '123', 'aryansingh30706@gmail.com', '7896541236'),
(11, 'ncnsnu', '123', 'aryansingh30706@gmail.com', '7896547896'),
(12, 'Dhruv', '12345', 'dhruv@gmail.com', '7412589632'),
(13, 'aryan', '12345', 'aryan@gmail.com', '7125896325'),
(14, 'aryan', '12345', 'aryansingh30706@gmail.com', '7412589632'),
(15, 'bhavya', '123', 'bhavya@gmail.com', '7896541236'),
(16, 'aryan', '123', 'aryansingh30706@gmail.com', '7412589632');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `tbl_destination`
--
ALTER TABLE `tbl_destination`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_destination`
--
ALTER TABLE `tbl_destination`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
