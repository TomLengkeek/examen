-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 22 jun 2022 om 21:05
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
-- Tabelstructuur voor tabel `leerling`
--

DROP TABLE IF EXISTS `leerling`;
CREATE TABLE IF NOT EXISTS `leerling` (
  `email` varchar(125) NOT NULL,
  `rol` varchar(15) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `telefoonnummer` int(10) NOT NULL,
  `mededeling` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `leerling`
--

INSERT INTO `leerling` (`email`, `rol`, `naam`, `telefoonnummer`, `mededeling`) VALUES
('luuc@gmail.com', 'leerling', 'Luuc Stigter', 684759388, ''),
('stan@gmail.com', 'leerling', 'Stan Stigter', 684938333, ''),
('henk@gmail.com', 'leerling', 'Henk de Steen', 684938599, '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leerlingen`
--

DROP TABLE IF EXISTS `leerlingen`;
CREATE TABLE IF NOT EXISTS `leerlingen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(50) NOT NULL,
  `pakket` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_leerling_pakketten_idx` (`pakket`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `leerlingen`
--

INSERT INTO `leerlingen` (`id`, `naam`, `pakket`) VALUES
(3, 'Konijn', 'Pakket 1'),
(4, 'Slavink', 'Pakket 2'),
(6, 'Otto', 'Pakket 1');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lessen`
--

DROP TABLE IF EXISTS `lessen`;
CREATE TABLE IF NOT EXISTS `lessen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `leerling` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_lessen_leerlingen_idx` (`leerling`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `lessen`
--

INSERT INTO `lessen` (`id`, `datum`, `leerling`) VALUES
(45, '2022-06-20', 3),
(46, '2022-06-20', 6),
(47, '2022-06-21', 4),
(48, '2022-06-21', 6),
(49, '2022-06-22', 3),
(50, '2022-08-22', 6),
(51, '2022-08-22', 3),
(52, '2022-10-22', 4),
(53, '2022-11-22', 3);

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
-- Tabelstructuur voor tabel `pakketten`
--

DROP TABLE IF EXISTS `pakketten`;
CREATE TABLE IF NOT EXISTS `pakketten` (
  `naam` varchar(50) NOT NULL,
  `prijs` int(10) NOT NULL,
  `aantalLessen` int(3) NOT NULL,
  `cbrExamen` int(2) NOT NULL,
  `betaalTermijnen` varchar(20) NOT NULL,
  PRIMARY KEY (`naam`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `pakketten`
--

INSERT INTO `pakketten` (`naam`, `prijs`, `aantalLessen`, `cbrExamen`, `betaalTermijnen`) VALUES
('Pakket 1', 400, 5, 1, '2 X 220,00'),
('Pakket 2', 590, 10, 1, '2 X 310,00'),
('Pakket 3', 735, 15, 1, '3 X 235,00'),
('Pakket 4', 890, 20, 1, '4 X 235,00');

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
-- Beperkingen voor tabel `leerlingen`
--
ALTER TABLE `leerlingen`
  ADD CONSTRAINT `FK_leerling_pakketten` FOREIGN KEY (`pakket`) REFERENCES `pakketten` (`naam`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `lessen`
--
ALTER TABLE `lessen`
  ADD CONSTRAINT `FK_lessen_leerlingen` FOREIGN KEY (`leerling`) REFERENCES `leerlingen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
