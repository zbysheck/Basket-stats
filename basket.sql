-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 31 Mar 2014, 07:24
-- Wersja serwera: 5.0.91
-- Wersja PHP: 5.3.20

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `uslugi_bdj2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `firmy`
--

CREATE TABLE IF NOT EXISTS `druzyny` (
  `druzyny_id` int(11) NOT NULL auto_increment,
  `nazwa` char(255) NOT NULL,
  PRIMARY KEY  (`druzyny_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `druzyny` (`druzyny_id`, `nazwa`) VALUES
(1, 'pchelki'),
(2, 'zuczki');

CREATE TABLE IF NOT EXISTS `zawodniczki` (
  `zawodniczki_id` int(11) NOT NULL auto_increment,
  `nazwa` char(255) NOT NULL,
  `id_team` int(11) NOT NULL,
  PRIMARY KEY  (`zawodniczki_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO `zawodniczki` (`zawodniczki_id`, `nazwa`, `id_team`) VALUES
(1, 'asia', 1),
(2, 'kasia', 1),
(3, 'basia', 1),
(4, 'ania', 2),
(5, 'frania', 2),
(6, 'bania', 2);

CREATE TABLE IF NOT EXISTS `mecze` (
  `mecze_id` int(11) NOT NULL auto_increment,
  `data_meczu` date,
  `id_team1` int(11) NOT NULL,
  `id_team2` int(11) NOT NULL,
  PRIMARY KEY  (`mecze_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `mecze` (`mecze_id`,  `data_meczu`,  `id_team1`,  `id_team2`) VALUES
(1, '20140310', 1, 2),
(2, '20140220', 1, 2);

CREATE TABLE IF NOT EXISTS `zawodniczki-mecze` (
  `zawodniczki-mecze_id` int(11) NOT NULL auto_increment,
  `mecze_id` int(11) NOT NULL,
  `zawodniczki_id` int(11) NOT NULL,
  `minuty` int(11) NOT NULL,
  `celne3` int(11) NOT NULL,
  `wykonane3` int(11) NOT NULL,
  `celne2` int(11) NOT NULL,
  `wykonane2` int(11) NOT NULL,
  `celne1` int(11) NOT NULL,
  `wykonane1` int(11) NOT NULL,
  `zbiorki_atak` int(11) NOT NULL,
  `zbiorki_obrona` int(11) NOT NULL,
  `asysty` int(11) NOT NULL,
  `faule` int(11) NOT NULL,
  `straty` int(11) NOT NULL,
  `przechwyty` int(11) NOT NULL,
  `bloki` int(11) NOT NULL,
  PRIMARY KEY  (`zawodniczki-mecze_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

INSERT INTO `zawodniczki-mecze` (`zawodniczki-mecze_id`, `mecze_id`, `zawodniczki_id`, `minuty`, `celne3`, `wykonane3`, `celne2`, `wykonane2`, `celne1`, `wykonane1`, `zbiorki_atak`, `zbiorki_obrona`, `asysty`, `faule`, `straty`, `przechwyty`, `bloki`) VALUES
(1, 1, 1, 40, 3, 5, 12, 18, 7, 9, 12, 13, 11, 12, 15, 11, 9),
(2, 1, 2, 39, 3, 5, 12, 18, 7, 9, 12, 13, 11, 12, 15, 11, 9),
(3, 1, 3, 47, 3, 5, 12, 18, 7, 9, 12, 13, 11, 12, 15, 11, 9),
(4, 1, 4, 41, 3, 5, 12, 18, 7, 9, 12, 13, 11, 12, 15, 11, 9),
(5, 1, 5, 37, 3, 5, 12, 18, 7, 9, 12, 13, 11, 12, 15, 11, 9),
(6, 1, 6, 35, 3, 5, 12, 18, 7, 9, 12, 13, 11, 12, 15, 11, 9),
(7, 2, 1, 25, 3, 5, 12, 18, 7, 9, 12, 13, 11, 12, 15, 11, 9),
(8, 2, 2, 38, 3, 5, 12, 18, 7, 9, 12, 13, 11, 12, 15, 11, 9),
(9, 2, 3, 38, 3, 5, 12, 18, 7, 9, 12, 13, 11, 12, 15, 11, 9),
(10, 2, 4, 40, 3, 5, 12, 18, 7, 9, 12, 13, 11, 12, 15, 11, 9),
(11, 2, 5, 40, 3, 5, 12, 18, 7, 9, 12, 13, 11, 12, 15, 11, 9),
(12, 2, 6, 40, 3, 5, 12, 18, 7, 9, 12, 13, 11, 12, 15, 11, 9);




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
