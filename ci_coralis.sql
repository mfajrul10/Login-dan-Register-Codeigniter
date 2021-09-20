-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2021 at 07:24 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_coralis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `user_id`, `created`) VALUES
(1, '47173c2c3dfc4d6274441a9f17fd1c', 1, '2021-09-18'),
(2, '3c766d2df6f8772b91361f1678e437', 1, '2021-09-18'),
(3, '2cd2252e6ac1d70e480980d4db18f7', 15, '2021-09-18'),
(4, 'f847aa88c1555fecc7c75ddd8d1c61', 15, '2021-09-18'),
(5, 'ea526ce461e0324abb843e03af300d', 15, '2021-09-18'),
(6, 'a5c57f772231e1c1d3c50e676660f2', 15, '2021-09-18'),
(7, '9292dc6ae09d793dcae30a38d75102', 15, '2021-09-18'),
(8, '81bff2af4116438dace53407dbaf81', 15, '2021-09-18'),
(9, '63a698d6ca0f72d7e795854ce8c161', 15, '2021-09-18'),
(10, '1e58d319f23378eb436cdc4bfd69ca', 15, '2021-09-18'),
(11, '02c402c627c11f7d309e32cb7a53cf', 15, '2021-09-18'),
(12, '4638b6ad8def900043e6bb2500baea', 15, '2021-09-18'),
(13, 'b795f17e25e99f68a2ba3f984c3388', 15, '2021-09-18'),
(14, '7a2b51653059826a6a57dece9a6245', 15, '2021-09-18'),
(15, '9fe1d3c213a4e12e83d37f88573820', 15, '2021-09-18'),
(16, '8a0d7fc22e995a0b170f6f5c23033d', 15, '2021-09-18'),
(17, '118e63dd73986e0386753d9e4043b0', 15, '2021-09-18'),
(18, '9c93ecd68bf4a46fcda78b7a30cd27', 29, '2021-09-18'),
(19, 'e08e17fb40fa3b36f7dd63852a0a90', 29, '2021-09-18'),
(20, '3717d20cc0c81851c72483a3149365', 29, '2021-09-18'),
(21, 'a99cd72b7f3da11da75fb4157d5741', 29, '2021-09-18'),
(22, '96a29c59b4b6f6ec3c941da63a2bac', 29, '2021-09-18'),
(23, 'e8287cd497254d9adc3cb9a54014ce', 29, '2021-09-18'),
(24, 'e5b976c185dcd43cc69b805c8953a6', 29, '2021-09-18'),
(25, '70dae7f30b8c6b6347edad1e6ffe77', 31, '2021-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `password`, `image`) VALUES
(31, 'Jaya', 'jayaj4794@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '663219154.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
