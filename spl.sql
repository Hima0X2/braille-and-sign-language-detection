-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 04, 2023 at 05:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spl`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `verify_token` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `name`, `password`, `verify_token`) VALUES
('shorifulhabib.iit@gmail.com', 'abc', '202cb962ac59075b964b07152d234b70', '391d732804ea468824b3c96bb1107654'),
('shdhrubo1@gmail.com', 'shoriful', '202cb962ac59075b964b07152d234b70', 'bd4495a1a863b5a020e8b8b98f07e165'),
('shoriful2515@student.nstu.edu.bd', 'shoriful', '202cb962ac59075b964b07152d234b70', 'ecdc4880db86fd98d5ac39b57563d5aa'),
('sanjidasamanta277@gamil.com', 'Sanjida Samanta', '827ccb0eea8a706c4c34a16891f84e7b', 'fa81a4fc2b8c38d784d1006ea9efa2e5'),
('samayrajahan02@gmail.com', 'Sanjida Samanta', '827ccb0eea8a706c4c34a16891f84e7b', '325b6cda59131278eb94620dbb77a0a7');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
