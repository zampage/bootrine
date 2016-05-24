-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 24. Mai 2016 um 08:33
-- Server-Version: 5.6.25
-- PHP-Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `bootrine`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `gid` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `private` int(11) NOT NULL,
  `FKuid` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `iid` int(11) NOT NULL,
  `path` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `FKgid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `IDX_472B783AF15E5ADC` (`FKuid`);

--
-- Indizes für die Tabelle `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`iid`),
  ADD KEY `IDX_C53D045FEEFC2DC2` (`FKgid`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `image`
--
ALTER TABLE `image`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `FK_472B783AF15E5ADC` FOREIGN KEY (`FKuid`) REFERENCES `user` (`uid`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_C53D045FEEFC2DC2` FOREIGN KEY (`FKgid`) REFERENCES `gallery` (`gid`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
