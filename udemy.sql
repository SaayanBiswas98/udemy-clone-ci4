-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 04:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udemy`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(120) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `video` text NOT NULL,
  `course_id` int(200) NOT NULL,
  `view_status` varchar(255) NOT NULL,
  `play_status` varchar(200) NOT NULL,
  `track` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `title`, `description`, `video`, `course_id`, `view_status`, `play_status`, `track`) VALUES
(12, 'Intro', 'added a few comments', '1707539599_5eb54d3b38e181800609.mp4', 8, 'open', '', 0),
(13, 'Introduction', 'dummy description', '1707540971_26c6894dfee369a41c84.mp4', 11, 'open', 'played', 3),
(14, 'Basics', 'this is the 1st ever post', '1707541010_5c353d8fbe7ceb2f76ab.mp4', 11, 'open', '', 0),
(18, 'introduction', 'this is the 1st ever post', '1707576758_ee0a66bcb6f88ba4fb49.mp4', 13, 'open', 'played', 0),
(20, 'Basics', 'this is the 1st ever post', '1707577128_53adef7d461f391a68ef.mp4', 13, 'open', 'played', 5),
(21, 'Oops concept', 'this is the 1st ever post', '1707577240_818946dda1b975ea17eb.mp4', 13, 'open', 'played', 7),
(24, 'introduction', 'this is the 1st ever post', '1707624524_f145f134c83474372e2f.mp4', 17, 'open', '', 0),
(25, 'basics', 'dummy text', '1707624624_e71d25d3b25f569842a3.mp4', 17, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(120) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(122) NOT NULL,
  `image` varchar(255) NOT NULL,
  `purchased` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `price`, `image`, `purchased`) VALUES
(8, 'Crypto Currency tutorial', 'added a few comments', 122, '1707539456_b0d17678f9fab663c0ec.webp', 'paid'),
(11, 'Advance machine learning', 'dummy text', 80, '1707540875_747187211b5f7b6835ad.jpg', 'paid'),
(13, 'laravel tutorial', 'this is the 1st ever post', 75, '1707575296_8079c33d63efb0bd8852.png', 'paid'),
(17, 'PHP tutorial', 'this is the 1st ever post', 70, '1707624500_0cffdd85056070bd47d6.jpg', 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `purchased`
--

CREATE TABLE `purchased` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `status` varchar(250) NOT NULL,
  `course_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchased`
--

INSERT INTO `purchased` (`id`, `name`, `price`, `status`, `course_id`) VALUES
(17, 'Crypto Currency tutorial', 122, 'paid', 8),
(20, 'Advance machine learning', 80, 'paid', 11),
(21, 'laravel tutorial', 75, 'paid', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchased`
--
ALTER TABLE `purchased`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `purchased`
--
ALTER TABLE `purchased`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
