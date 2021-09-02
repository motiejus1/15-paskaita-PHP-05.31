-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2021 m. Rgs 02 d. 17:07
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klientuvaldymosistema`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `klientai_rikiavimas`
--

DROP TABLE IF EXISTS `klientai_rikiavimas`;
CREATE TABLE IF NOT EXISTS `klientai_rikiavimas` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `rikiavimo_pavadinimas` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `rikiavimo_stulpelis` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `klientai_rikiavimas`
--

INSERT INTO `klientai_rikiavimas` (`ID`, `rikiavimo_pavadinimas`, `rikiavimo_stulpelis`) VALUES
(15, 'ID', 'klientai.ID'),
(21, 'Kliento pavardė', 'klientai.pavarde'),
(17, 'Kliento teisės', 'klientai_teises.pavadinimas');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
