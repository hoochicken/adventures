-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: hero_mysql
-- Erstellungszeit: 02. Aug 2020 um 13:34
-- Server-Version: 8.0.21
-- PHP-Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `herodb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `hero`
--

CREATE TABLE `hero` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` int NOT NULL,
  `class` int NOT NULL,
  `description` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `le` int NOT NULL,
  `le_current` int NOT NULL,
  `ae` int NOT NULL DEFAULT '0',
  `ae_current` int NOT NULL DEFAULT '0',
  `inventory` varchar(1023) NOT NULL,
  `weapon` int NOT NULL,
  `at` int NOT NULL,
  `pa` int NOT NULL,
  `attributes` varchar(1023) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '{}',
  `state` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `hero`
--

INSERT INTO `hero` (`id`, `name`, `type`, `class`, `description`, `pic`, `le`, `le_current`, `ae`, `ae_current`, `inventory`, `weapon`, `at`, `pa`, `attributes`, `state`) VALUES
(1, 'Maryan', 1, 1, '', '', 20, 16, 3, 2, '', 1, 10, 10, '{}', 1),
(2, 'Grump', 1, 2, '', '', 19, 18, 10, 8, '', 3, 15, 12, '{}', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `hero`
--
ALTER TABLE `hero`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
