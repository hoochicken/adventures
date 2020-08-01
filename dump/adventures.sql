-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: hero_mysql
-- Erstellungszeit: 01. Aug 2020 um 18:26
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
-- Tabellenstruktur für Tabelle `action`
--

CREATE TABLE `action` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `description` varchar(1023) NOT NULL,
  `attributes` varchar(1023) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `action`
--

INSERT INTO `action` (`id`, `name`, `label`, `description`, `attributes`, `state`) VALUES
(1, 'look', 'Look', '', '{}', 1),
(2, 'chat', 'Chat', '', '{}', 1),
(3, 'attack', 'Attack', '', '{}', 1),
(4, 'walk', 'Walk', '', '{}', 1),
(5, 'cheat', 'Cheat', '', '{}', 1),
(6, 'spell', 'Spell', '', '{}', 1);

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

INSERT INTO `hero` (`id`, `name`, `type`, `class`, `description`, `pic`, `le`, `le_current`, `inventory`, `weapon`, `at`, `pa`, `attributes`, `state`) VALUES
(1, 'Maryan', 1, 1, '', '', 20, 20, '', 1, 10, 10, '{}', 1),
(2, 'Grump', 1, 2, '', '', 19, 18, '', 3, 15, 12, '{}', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `heroclass`
--

CREATE TABLE `heroclass` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `attributes` varchar(1023) NOT NULL DEFAULT '{}',
  `state` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `herotype`
--

CREATE TABLE `herotype` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `attributes` varchar(1023) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '{}',
  `state` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `item`
--

CREATE TABLE `item` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `decription` varchar(1023) NOT NULL,
  `itemtype` int NOT NULL,
  `pic` varchar(255) NOT NULL,
  `worth` float NOT NULL,
  `weight` float NOT NULL,
  `attributes` varchar(1023) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '{}',
  `state` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `item`
--

INSERT INTO `item` (`id`, `name`, `decription`, `itemtype`, `pic`, `worth`, `weight`, `attributes`, `state`) VALUES
(1, 'Schwert', 'Irgendein Schwert', 2, '', 2.3, 5.4, '{}', 1),
(2, 'Truhe', '', 3, '', 100.3, 15.2, '{}', 1),
(5, 'Bogen', '', 2, '', 10.2, 5.6, '{}', 1),
(6, 'Karfunkelstein', '', 1, '', 5.5, 3.2, '{}', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `item4hero`
--

CREATE TABLE `item4hero` (
  `item_id` int NOT NULL,
  `hero_id` int NOT NULL,
  `attributes` varchar(1023) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '{}',
  `state` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `itemtype`
--

CREATE TABLE `itemtype` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `attributes` varchar(1023) NOT NULL DEFAULT '{}',
  `state` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `itemtype`
--

INSERT INTO `itemtype` (`id`, `name`, `attributes`, `state`) VALUES
(1, 'Item', '{}', 1),
(2, 'Weapon', '{}', 1),
(3, 'Immobile', '{}', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `place`
--

CREATE TABLE `place` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1023) NOT NULL,
  `type` int NOT NULL,
  `attributes` varchar(1023) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '{}',
  `state` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `place`
--

INSERT INTO `place` (`id`, `name`, `description`, `type`, `attributes`, `state`) VALUES
(1, 'Wald', '', 1, '{}', 1),
(2, 'Sanddüne', '', 1, '{}', 1),
(3, 'Steinkreis', '', 1, '{}', 1),
(4, 'Hütte des Hellsehers', '', 1, '{}', 1),
(5, 'Berghöhle', '', 1, '{}', 1),
(6, 'Einhornwiese', '', 1, '{}', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `route`
--

CREATE TABLE `route` (
  `id` int NOT NULL,
  `in` int NOT NULL,
  `out` int NOT NULL,
  `attributes` varchar(1023) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '{}',
  `state` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Daten für Tabelle `route`
--

INSERT INTO `route` (`id`, `in`, `out`, `attributes`, `state`) VALUES
(1, 1, 2, '{}', 1),
(3, 3, 2, '{}', 1),
(4, 2, 1, '{}', 1),
(5, 2, 3, '{}', 1),
(7, 3, 4, '{}', 1),
(8, 4, 5, '{}', 1),
(9, 5, 6, '{}', 1),
(10, 6, 5, '{}', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `heroclass`
--
ALTER TABLE `heroclass`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `herotype`
--
ALTER TABLE `herotype`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `itemtype`
--
ALTER TABLE `itemtype`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `in` (`in`,`out`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `action`
--
ALTER TABLE `action`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `hero`
--
ALTER TABLE `hero`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `heroclass`
--
ALTER TABLE `heroclass`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `herotype`
--
ALTER TABLE `herotype`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `item`
--
ALTER TABLE `item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `itemtype`
--
ALTER TABLE `itemtype`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `place`
--
ALTER TABLE `place`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `route`
--
ALTER TABLE `route`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
