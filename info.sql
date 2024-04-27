-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 20, 2024 at 03:12 AM
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
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `Name` varchar(17) DEFAULT NULL,
  `Regd` varchar(15) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Done',
  `washes` int(4) NOT NULL DEFAULT 40,
  `rack` int(11) DEFAULT NULL,
  `pass` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`Name`, `Regd`, `email`, `contact`, `status`, `washes`, `rack`, `pass`) VALUES
('Navaneeth Krishna', 'AP22110011253', 'navaneethkrishna_bondada@srmap.edu.in', '9182181223', 'Pending', 29, 0, '123456'),
('Shreya Sharma', 'AP22110011254', 'shreyasharma@srmap.edu.in', '9182181224', 'Pending', 28, 0, '123456'),
('Rohan Gupta', 'AP22110011255', 'rohangupta@srmap.edu.in', '9182181225', 'Pending', 38, 0, '123456'),
('Arjun Singh', 'AP22110011256', 'arjunsingh@srmap.edu.in', '9182181226', 'Pending', 18, 0, '123456'),
('Priya Patel', 'AP22110011257', 'priyapatel@srmap.edu.in', '9182181227', 'Done', 0, 0, '123456'),
('Karan Mehta', 'AP22110011259', 'karanmehta@srmap.edu.in', '9182181229', 'Pending', 4, 0, '123456'),
('Sneha Reddy', 'AP22110011260', 'snehareddy@srmap.edu.in', '9182181230', 'Done', 0, 0, '123456'),
('Rajesh Kumar', 'AP22110011261', 'rajeshkumar@srmap.edu.in', '9182181231', 'Done', 26, 0, '123456'),
('Divya Singh', 'AP22110011262', 'divyasingh@srmap.edu.in', '9182181232', 'Done', 19, 0, '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
