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

CREATE TABLE IF NOT EXISTS `options` (
  `option_id` int(11) NOT NULL auto_increment,
  `name` char(255) NOT NULL,
  `value` char(255) NOT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `options` (`option_id`, `name`, `value`) VALUES
(1, 'Team Name', 'BIGdynia'),
(2, 'logo', 'http://link.pl'),
(3, 'aktualny sezon', '1');

CREATE TABLE IF NOT EXISTS `season` (
  `season_id` int(11) NOT NULL auto_increment,
  `year` int(11) NOT NULL,
  PRIMARY KEY  (`team_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `season` (`season_id`, `year`) VALUES
(1, '2013'),
(2, '2014');


CREATE TABLE IF NOT EXISTS `team` (
  `team_id` int(11) NOT NULL auto_increment,
  `name` char(255) NOT NULL,
  PRIMARY KEY  (`team_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `team` (`team_id`, `name`) VALUES
(1, 'pchelki'),
(2, 'zuczki');

CREATE TABLE IF NOT EXISTS `player` (
  `player_id` int(11) NOT NULL auto_increment,
  `name` char(255) NOT NULL,
  PRIMARY KEY  (`player_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO `player` (`player_id`, `name`) VALUES
(1, 'asia'),
(2, 'kasia'),
(3, 'basia'),
(4, 'ania'),
(5, 'frania'),
(6, 'bania');

CREATE TABLE IF NOT EXISTS `game` (
  `game_id` int(11) NOT NULL auto_increment,
  `game_date` date,
  `team_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  PRIMARY KEY  (`game_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `game` (`game_id`,  `game_date`,  `team_id`) VALUES
(1, '20140310', 2),
(2, '20140220', 2);

CREATE TABLE IF NOT EXISTS `stat` (
  `stat_id` int(11) NOT NULL auto_increment,
  `game_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `minutes` int(11) NOT NULL,
  `fg3` int(11) NOT NULL, #field goal 3 points - trafiony rzut za 3
  `fga3` int(11) NOT NULL, #field goal attempt 3 point - wykonany rzut za 3 
  `fg2` int(11) NOT NULL, 
  `fga2` int(11) NOT NULL,
  `fg1` int(11) NOT NULL,
  `fga1` int(11) NOT NULL,
  `orb` int(11) NOT NULL, # offensive rebounds - zbiorka w ataku
  `drb` int(11) NOT NULL, # offensive rebounds - zbiorka w obronie
  `assists` int(11) NOT NULL, # asysty
  `fauls` int(11) NOT NULL, # faule
  `turnovers` int(11) NOT NULL, # strata
  `steals` int(11) NOT NULL, #przechwyt
  `blocks` int(11) NOT NULL,
  PRIMARY KEY  (`stat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

INSERT INTO `stat` (`stat_id`, `game_id`, `player_id`, `minutes`, `fg3`, `fga3`, `fg2`, `fga2`, `fg1`, `fga1`, `orb`, `drb`, `assists`, `fauls`, `turnovers`, `steals`, `blocks`) VALUES
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
