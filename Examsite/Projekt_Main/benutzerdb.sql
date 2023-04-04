-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Dez 2022 um 16:46
-- Server-Version: 10.4.25-MariaDB
-- PHP-Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `benutzerdb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzertb`
--

CREATE TABLE `benutzertb` (
  `BenutzerID` int(11) NOT NULL,
  `Benutzername` varchar(50) NOT NULL,
  `Passwort` varchar(255) NOT NULL,
  `Anrede` int(15) NOT NULL,
  `Vorname` varchar(50) NOT NULL,
  `Nachname` varchar(50) NOT NULL,
  `EMail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `benutzertb`
--

INSERT INTO `benutzertb` (`BenutzerID`, `Benutzername`, `Passwort`, `Anrede`, `Vorname`, `Nachname`, `EMail`) VALUES
(9, 'Franzn', '$2y$10$s9T0hYlfGiYjFYZ2fSOefe.r1LiJrmUOtml2m5RiSv4zdF8AuwH2G', 1, 'Franz', 'Maiaer', 'example@gmx.at'),
(13, 'Flual', '$2y$10$1UCmjJPWg6veTpFiWZhjme02cLklBMdh02mx8wCXhCHJAQyaQ6JWy', 1, 'Florian', 'Stangl', 'Flo.Stangl8@gmx.at');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tanrede`
--

CREATE TABLE `tanrede` (
  `AnredeID` int(11) NOT NULL,
  `Anrede` varchar(50) NOT NULL,
  `Anredetext` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tanrede`
--

INSERT INTO `tanrede` (`AnredeID`, `Anrede`, `Anredetext`) VALUES
(1, 'Herr', 'Sehr geehrter Herr'),
(2, 'Frau', 'Sehr geehrte Frau');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzertb`
--
ALTER TABLE `benutzertb`
  ADD PRIMARY KEY (`BenutzerID`),
  ADD UNIQUE KEY `Benutzername` (`Benutzername`),
  ADD UNIQUE KEY `EMail` (`EMail`),
  ADD KEY `benutzerdb_ibfk_2` (`Anrede`);

--
-- Indizes für die Tabelle `tanrede`
--
ALTER TABLE `tanrede`
  ADD PRIMARY KEY (`AnredeID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzertb`
--
ALTER TABLE `benutzertb`
  MODIFY `BenutzerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `benutzertb`
--
ALTER TABLE `benutzertb`
  ADD CONSTRAINT `benutzerdb_ibfk_2` FOREIGN KEY (`Anrede`) REFERENCES `tanrede` (`AnredeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
