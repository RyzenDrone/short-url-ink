-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 28, 2023 at 11:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visit`
--

-- --------------------------------------------------------

--
-- Table structure for table `shortened_urls`
--

CREATE TABLE `shortened_urls` (
  `id` int(11) NOT NULL,
  `long_url` varchar(1000) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `visits` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shortened_urls`
--

INSERT INTO `shortened_urls` (`id`, `long_url`, `slug`, `visits`) VALUES
(177, 'https://www.google.com/search?rlz=1C5CHFA_enID1013ID1013&sxsrf=AB5stBj2ygrXyu18TKTPZoxsqzxpe5swrw:1688968128721&q=karet&tbm=isch&sa=X&ved=2ahUKEwixqeXKuIOAAxX_3zgGHfq-Bt8Q0pQJegQIDxAB&biw=1440&bih=654&dpr=2', 'link-info-karet2023', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shortened_urls`
--
ALTER TABLE `shortened_urls`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shortened_urls`
--
ALTER TABLE `shortened_urls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
