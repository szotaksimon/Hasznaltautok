-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2021 at 12:05 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hasznaltautok`
--

-- --------------------------------------------------------

--
-- Table structure for table `hirdetes`
--

CREATE TABLE `hirdetes` (
  `id` int(11) NOT NULL,
  `marka` varchar(45) NOT NULL,
  `modell` varchar(45) NOT NULL,
  `kivitel` varchar(45) NOT NULL,
  `evjarat` year(4) NOT NULL,
  `ar` int(11) NOT NULL,
  `uzemanyag` varchar(45) NOT NULL,
  `allapot` varchar(45) NOT NULL,
  `leiras` varchar(450) NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hirdetes`
--

INSERT INTO `hirdetes` (`id`, `marka`, `modell`, `kivitel`, `evjarat`, `ar`, `uzemanyag`, `allapot`, `leiras`, `datum`) VALUES
(81, 'Audi', 'A6', 'Sedan', 2010, 3500000, 'Dízel', 'Normál', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lore', '2021-11-02'),
(82, 'Alfa Romeo', '156', 'Sedan', 2000, 1500000, 'Benzin', 'Kitűnő', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised.', '2021-11-02'),
(83, 'Citroën', 'Picasso', 'Egyterű', 2000, 450000, 'Benzin', 'Megkímélt', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lore', '2021-11-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hirdetes`
--
ALTER TABLE `hirdetes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hirdetes`
--
ALTER TABLE `hirdetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
