-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2019 at 03:57 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(255) NOT NULL,
  `catid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `rupee` int(5) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `catid`, `name`, `author`, `rupee`, `img`) VALUES
(1, 0, 'java', 'author', 250, 'img/scan0001.jpg'),
(2, 0, 'Toc', 'Kalp Mishra', 300, 'img/Screenshot (21).png'),
(3, 0, 'Toc', 'Kalp Mishra', 300, 'img/Screenshot (21).png'),
(4, 0, 'Toc', 'Kalp Mishra', 300, 'img/Screenshot (21).png'),
(5, 0, 'Toc', 'Kalp Mishra', 300, 'img/Screenshot (21).png'),
(6, 0, 'Toc', 'Kalp Mishra', 300, 'img/Screenshot (21).png'),
(7, 0, 'java', 'author', 150, 'img/Annotation 2019-11-17 205133.png'),
(8, 0, 'Toc', 'author', 152, 'img/mx-master-3 (1).jpg'),
(9, 0, 'Toc', 'author', 152, 'img/mx-master-3 (1).jpg'),
(10, 0, 'Toc', 'author', 152, 'img/mx-master-3 (1).jpg'),
(11, 0, 'Toc', 'author', 152, 'img/mx-master-3 (1).jpg'),
(12, 0, 'Toc', 'author', 152, 'img/mx-master-3 (1).jpg'),
(13, 0, 'Toc', 'author', 152, 'img/mx-master-3 (1).jpg'),
(14, 0, 'Toc', 'author', 152, 'img/mx-master-3 (1).jpg'),
(15, 0, 'Toc', 'author', 152, 'img/mx-master-3 (1).jpg'),
(16, 0, 'java', 'author', 150, 'img/Annotation 2019-11-17 205133.png'),
(17, 0, 'Toc', 'author', 125, 'img/mx-master-3 (1).jpg'),
(18, 0, 'Toc', 'author', 125, 'img/mx-master-3 (1).jpg'),
(19, 0, 'Toc', 'author', 120, 'img/mx-master-3 (1).jpg'),
(20, 0, 'Toc', 'author', 120, 'img/mx-master-3 (1).jpg'),
(21, 0, 'Toc', 'author', 120, 'img/mx-master-3 (1).jpg'),
(22, 0, 'Toc', 'author', 120, 'img/mx-master-3 (1).jpg'),
(23, 0, 'Toc', 'author', 120, 'img/mx-master-3 (1).jpg'),
(24, 0, 'Toc', 'author', 120, 'img/mx-master-3 (1).jpg'),
(25, 0, 'Toc', 'author', 120, 'img/mx-master-3 (1).jpg'),
(26, 0, 'Toc', 'author', 120, 'img/mx-master-3 (1).jpg'),
(27, 3, 'Toc', 'author', 135, 'img/mx-master-3 (1).jpg'),
(28, 0, 'Toc', 'author', 120, 'img/mx-master-3 (1).jpg'),
(29, 3, 'Toc', 'author', 120, 'img/mx-master-3 (1).jpg'),
(30, 3, 'Toc', 'author', 520, 'img/mx-master-3 (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(255) NOT NULL,
  `catid` int(255) NOT NULL,
  `catagories` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `catid`, `catagories`) VALUES
(1, 1, 'Computer science'),
(2, 2, 'Math'),
(3, 3, 'Physics'),
(4, 4, 'M.C.A.'),
(5, 5, 'B.C.A.'),
(6, 6, 'B.Tech');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `user`, `password`) VALUES
(2, 'verma', '123'),
(3, 'ab', '123'),
(5, 'ram', 'jai'),
(6, 'jai', 'shri'),
(7, 'jai', 'shree'),
(9, 'jai', 'singh'),
(10, 'jai', 'ram'),
(13, 'udit', 'narayan'),
(14, 'kumar', 'viswas'),
(15, 'mona', 'verma'),
(16, 'vi', 'mal'),
(17, 'admin', 'admin123'),
(18, 'hverma', '064'),
(19, 'king', 'khan'),
(20, 'king', 'kobra'),
(21, 'ram', 'ram'),
(22, 'hari', 'verma'),
(23, 'shree', 'ram'),
(24, 'hi', 'ram'),
(25, 'kumar', 'sanu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
