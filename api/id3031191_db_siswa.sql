-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2018 at 06:33 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3031191_db_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(23) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `encrypted_password` varchar(80) NOT NULL,
  `salt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `unique_id`, `nama`, `email`, `encrypted_password`, `salt`) VALUES
(1, '5b0a4fd27e9358.39566534', 'Shab', 'shabrina@gmail.com', '6xw5ZuoDdhNDwxPBvFM5owxfF19kNTA2ZDM0ZGEz', 'd506d34da3'),
(2, '5b0a5021b352d5.08272044', 'Mega', 'mega@gmail.com', 'Uw0ZlVEhxXaSNHVQGrc1837xWP8yN2I0MWJiOGNj', '27b41bb8cc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
