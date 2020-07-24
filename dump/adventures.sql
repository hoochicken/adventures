-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: hero_mysql
-- Erstellungszeit: 23. Jul 2020 um 14:07
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
  `le` int NOT NULL,
  `le_current` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `hero`
--

INSERT INTO `hero` (`id`, `name`, `le`, `le_current`) VALUES
(1, 'Mary', 10, 10),
(2, 'Mill', 15, 15),
(3, 'Larissa', 20, 20),
(4, 'Olivia', 17, 17),
(5, 'Bernd', 14, 13);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
