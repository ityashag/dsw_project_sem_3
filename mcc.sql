-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 06:36 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcc`
--
create database mcc;
use mcc;
-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `cid` int(11) DEFAULT NULL,
  `sl_id` int(11) DEFAULT NULL,
  `se_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`cid`, `sl_id`, `se_id`) VALUES
(1, 1, 1),
(1, 2, 4),
(1, 2, 5),
(1, 1, 1),
(1, 1, 26),
(1, 1, 36),
(3, 2, 16),
(3, 2, 17),
(3, 1, 5),
(3, 1, 6),
(4, 3, 4),
(4, 3, 5),
(4, 3, 6),
(4, 3, 7),
(4, 2, 35),
(4, 2, 44),
(4, 2, 35),
(4, 2, 44),
(4, 2, 35),
(4, 2, 44),
(4, 2, 35),
(4, 2, 44),
(4, 2, 35),
(4, 2, 44),
(4, 2, 35),
(4, 2, 44),
(4, 2, 35),
(4, 2, 44),
(4, 2, 35),
(4, 2, 44),
(4, 2, 35),
(4, 2, 44),
(4, 2, 35),
(4, 2, 44),
(4, 2, 35),
(4, 2, 44),
(4, 2, 35),
(4, 2, 44),
(4, 2, 35),
(4, 2, 44),
(4, 2, 35),
(4, 2, 44),
(4, 2, 35),
(4, 2, 44),
(4, 2, 35),
(4, 2, 44),
(4, 2, 35),
(4, 2, 44),
(4, 1, 91),
(4, 1, 100),
(4, 2, 1),
(4, 2, 2),
(4, 6, 3),
(4, 6, 4),
(4, 6, 5),
(4, 6, 6),
(4, 3, 36),
(4, 3, 37),
(4, 3, 24),
(4, 3, 25),
(3, 4, 5),
(3, 4, 6),
(3, 4, 12),
(3, 4, 13),
(3, 4, 14),
(3, 4, 15),
(3, 4, 16),
(3, 4, 17),
(3, 4, 18),
(3, 4, 19);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `cname` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `pass`, `cname`, `age`, `email`, `phone_no`) VALUES
(1, 'corn', 'Aditya', 21, 'aditya@gmail.com', '9876543210'),
(2, 'cat', 'Shubhay', 20, 'shubhay@gmail.com', '9182736450'),
(3, 'mojo', 'Lavish', 0, 'lavishboss@gamil.com', '1122'),
(4, 'chill', 'Atharv', 0, 'atharv@gmail.com', '2211'),
(5, 'daaru', 'Mogish', 0, 'psychotic@shemail.com', '6969');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `mid` int(11) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `mprice` int(11) NOT NULL,
  `photo` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`mid`, `mname`, `mprice`, `photo`) VALUES
(1, 'The Batman', 330, 'Batman.jpg'),
(2, 'RRR', 250, 'rrr.jpg'),
(4, 'Avatar', 800, 'avatar.jpg'),
(5, 'KGF 2', 240, 'kgf.jpg'),
(6, 'Godfather', 210, 'godfather.jpg'),
(7, 'Spiderman', 500, 'spiderman.jpg'),
(8, 'Shutter Island', 450, 'shutter_island.jpg'),
(3789, 'pk', 303, 'bbgg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `se_id` int(11) NOT NULL,
  `sname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`se_id`, `sname`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'A3'),
(4, 'A4'),
(5, 'A5'),
(6, 'A6'),
(7, 'A7'),
(8, 'A8'),
(9, 'A9'),
(10, 'A10'),
(11, 'B1'),
(12, 'B2'),
(13, 'B3'),
(14, 'B4'),
(15, 'B5'),
(16, 'B6'),
(17, 'B7'),
(18, 'B8'),
(19, 'B9'),
(20, 'B10'),
(21, 'C1'),
(22, 'C2'),
(23, 'C3'),
(24, 'C4'),
(25, 'C5'),
(26, 'C6'),
(27, 'C7'),
(28, 'C8'),
(29, 'C9'),
(30, 'C10'),
(31, 'D1'),
(32, 'D2'),
(33, 'D3'),
(34, 'D4'),
(35, 'D5'),
(36, 'D6'),
(37, 'D7'),
(38, 'D8'),
(39, 'D9'),
(40, 'D10'),
(41, 'E1'),
(42, 'E2'),
(43, 'E3'),
(44, 'E4'),
(45, 'E5'),
(46, 'E6'),
(47, 'E7'),
(48, 'E8'),
(49, 'E9'),
(50, 'E10'),
(51, 'F1'),
(52, 'F2'),
(53, 'F3'),
(54, 'F4'),
(55, 'F5'),
(56, 'F6'),
(57, 'F7'),
(58, 'F8'),
(59, 'F9'),
(60, 'F10'),
(61, 'G1'),
(62, 'G2'),
(63, 'G3'),
(64, 'G4'),
(65, 'G5'),
(66, 'G6'),
(67, 'G7'),
(68, 'G8'),
(69, 'G9'),
(70, 'G10'),
(71, 'H1'),
(72, 'H2'),
(73, 'H3'),
(74, 'H4'),
(75, 'H5'),
(76, 'H6'),
(77, 'H7'),
(78, 'H8'),
(79, 'H9'),
(80, 'H10'),
(81, 'I1'),
(82, 'I2'),
(83, 'I3'),
(84, 'I4'),
(85, 'I5'),
(86, 'I6'),
(87, 'I7'),
(88, 'I8'),
(89, 'I9'),
(90, 'I10'),
(91, 'J1'),
(92, 'J2'),
(93, 'J3'),
(94, 'J4'),
(95, 'J5'),
(96, 'J6'),
(97, 'J7'),
(98, 'J8'),
(99, 'J9'),
(100, 'J10');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `sl_id` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `timing` int(11) DEFAULT NULL,
  `dt` date DEFAULT NULL,
  `mid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`sl_id`, `tid`, `timing`, `dt`, `mid`) VALUES
(1, 1, 1, '2022-11-11', 1),
(2, 2, 2, '2022-11-28', 2),
(3, 1, 3, '2022-12-04', 4),
(4, 2, 5, '2022-11-30', 5),
(5, 1, 3, '2022-11-29', 6),
(8, 1, 3, '2022-12-02', 7),
(9, 1, 2, '2022-12-02', 8);

-- --------------------------------------------------------

--
-- Table structure for table `theatre`
--

CREATE TABLE `theatre` (
  `tid` int(11) NOT NULL,
  `tname` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `phone_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theatre`
--

INSERT INTO `theatre` (`tid`, `tname`, `city`, `pass`, `phone_no`) VALUES
(1, 'PVR Mahagun', 'Noida', 'batman', '1234567890'),
(2, 'PVR Shipra', 'Ghaziabad', 'McDonalds', '1029384756');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`se_id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `theatre`
--
ALTER TABLE `theatre`
  ADD PRIMARY KEY (`tid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
