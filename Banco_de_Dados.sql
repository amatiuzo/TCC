-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2020 at 08:16 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fazenda`
--

-- --------------------------------------------------------

--
-- Table structure for table `bufalos`
--

CREATE TABLE `bufalos` (
  `brinco` int(4) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `nasc_ano` year(4) NOT NULL,
  `nasc_dia` int(2) NOT NULL,
  `nasc_mes` int(2) NOT NULL,
  `brinco_mae` int(10) NOT NULL,
  `raca` varchar(50) NOT NULL,
  `produz_leite` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bufalos`
--

INSERT INTO `bufalos` (`brinco`, `nome`, `nasc_ano`, `nasc_dia`, `nasc_mes`, `brinco_mae`, `raca`, `produz_leite`) VALUES
(3, 'Testhg', 2018, 0, 0, 21, 'Gato', 'Sim'),
(11, 'Ron', 2018, 0, 0, 12, 'Gato', 'Sim'),
(15, 'Ron', 2018, 0, 0, 78, 'Gato', 'Sim'),
(17, 'gilmar', 2000, 0, 0, 36, 'Baio', 'Nao'),
(23, 'Testre', 2018, 0, 0, 12, 'Gato', 'Nao'),
(74, 'modds', 2014, 0, 0, 3625, 'garo', 'Sim'),
(406, 'Testa', 2018, 0, 0, 36, 'Baio', 'Sim'),
(407, 'Rica', 2019, 0, 0, 55, 'Baio', 'Sim'),
(474, 'Hemam', 2019, 0, 0, 3, 'Baio', 'Sim'),
(961, 'Carl', 1966, 0, 0, 7, 'Baio', 'Nao'),
(965, 'Carlos', 1966, 0, 0, 56, 'Baio', 'Nao');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `code` varchar(25) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `painel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `status`, `code`, `senha`, `nome`, `painel`) VALUES
(1, 'Ativo', '11', '11', 'andree', 'professor'),
(2, 'Ativo', '111', '11', 'andre', 'controle');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bufalos`
--
ALTER TABLE `bufalos`
  ADD PRIMARY KEY (`brinco`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
