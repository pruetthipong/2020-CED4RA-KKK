-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 05:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newnormal`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `stdid` varchar(13) NOT NULL,
  `username` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `stdid`, `username`, `surname`, `lastname`, `email`, `password`) VALUES
(3, '2147483647', 'patchasss', 'fdsf', 'aa', 'pagg@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, '2147483647', 'admin', 'csdc', 'cdscsd', 'cdsdcsdc@dsdsd', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, '2147483647', '123', 'fcfcg', 'sss', 'a2aw@qqq', '3fa4bf009f28f3f7d673535f65d434b3'),
(6, '6002041620064', 'mmmmm', 'aaaaaaaaaa', 'minminmin', 'minminmin@ddd', '4a7d1ed414474e4033ac29ccb8653d9b'),
(7, '600', 'adminsds2sdd', 'dsdsad3', 'dsds4', 'dsds@dd5', 'f190ce9ac8445d249747cab7be43f7d5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
