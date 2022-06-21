-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 21 jun 2022 om 23:50
-- Serverversie: 5.7.31
-- PHP-versie: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examen`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `instructeurs`
--

DROP TABLE IF EXISTS `instructeurs`;
CREATE TABLE IF NOT EXISTS `instructeurs` (
  `email` varchar(125) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `telefoonnummer` int(20) NOT NULL,
  `mededeling` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `instructeurs`
--

INSERT INTO `instructeurs` (`email`, `rol`, `naam`, `telefoonnummer`, `mededeling`) VALUES
('hans@gmail.com', 'instructeur', 'Hans Odijk', 648984322, '0'),
('micheal@gmail.com', 'instructeur', 'micheal de steen', 694858599, '0');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `keuringen`
--

DROP TABLE IF EXISTS `keuringen`;
CREATE TABLE IF NOT EXISTS `keuringen` (
  `datum` date NOT NULL,
  `kosten` int(5) DEFAULT NULL,
  PRIMARY KEY (`datum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `keuringen`
--

INSERT INTO `keuringen` (`datum`, `kosten`) VALUES
('2022-04-28', 290),
('2022-05-04', 400),
('2022-06-01', 100),
('2022-06-05', 200);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leerlingen`
--

DROP TABLE IF EXISTS `leerlingen`;
CREATE TABLE IF NOT EXISTS `leerlingen` (
  `email` varchar(125) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `telefoonnummer` int(20) NOT NULL,
  `mededeling` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `leerlingen`
--

INSERT INTO `leerlingen` (`email`, `rol`, `naam`, `telefoonnummer`, `mededeling`) VALUES
('luucstigter@gmail.com', 'leerling', 'Luuc Stigter', 683593733, ''),
('arjan@gmail.com', 'leerling', 'Arjan de Ruijter ', 684639300, ''),
('stan@gmail.com', 'leerling', 'stan stigter', 684849333, ''),
('rick@gmail.com', 'leerling', 'Rick Stigter', 684933443, '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `onderhoudsbeurten`
--

DROP TABLE IF EXISTS `onderhoudsbeurten`;
CREATE TABLE IF NOT EXISTS `onderhoudsbeurten` (
  `datum` date NOT NULL,
  `kosten` int(5) NOT NULL,
  PRIMARY KEY (`datum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `onderhoudsbeurten`
--

INSERT INTO `onderhoudsbeurten` (`datum`, `kosten`) VALUES
('2022-05-24', 310),
('2022-06-02', 140),
('2022-06-15', 260),
('2022-06-22', 300);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `wagenpark`
--

DROP TABLE IF EXISTS `wagenpark`;
CREATE TABLE IF NOT EXISTS `wagenpark` (
  `kenteken` varchar(11) NOT NULL,
  `merk` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `kilometerstand` int(7) NOT NULL,
  `datumKeuring` date NOT NULL,
  `datumOnderhoudsbeurt` date NOT NULL,
  PRIMARY KEY (`kenteken`),
  KEY `FK_wagenpark_keuringen_idx` (`datumKeuring`),
  KEY `FK_wagenpark_onderhoudsbeurten_idx` (`datumOnderhoudsbeurt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `wagenpark`
--

INSERT INTO `wagenpark` (`kenteken`, `merk`, `type`, `kilometerstand`, `datumKeuring`, `datumOnderhoudsbeurt`) VALUES
('FF-651-C', 'tesla', 'model y', 40000, '2022-06-05', '2022-06-22'),
('GB-001-B', 'BMW', 'i4', 100000, '2022-06-01', '2022-06-22'),
('GH-451-B', 'tesla', 'model 3', 120000, '2022-05-04', '2022-06-15'),
('YH-851-L', 'Mazda', 'MX-30', 140000, '2022-04-28', '2022-06-22');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `wagenpark`
--
ALTER TABLE `wagenpark`
  ADD CONSTRAINT `FK_wagenpark_keuringen` FOREIGN KEY (`datumKeuring`) REFERENCES `keuringen` (`datum`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_wagenpark_onderhoudsbeurten` FOREIGN KEY (`datumOnderhoudsbeurt`) REFERENCES `onderhoudsbeurten` (`datum`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
