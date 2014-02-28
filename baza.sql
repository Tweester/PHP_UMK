-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 28 Lut 2014, 19:20
-- Wersja serwera: 5.6.14
-- Wersja PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `crt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_name` text COLLATE utf8_polish_ci NOT NULL,
  `gallery_active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=43 ;

--
-- Zrzut danych tabeli `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_name`, `gallery_active`) VALUES
(41, 'Galeria', 1),
(42, 'Galeria 2', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gallery_photo`
--

CREATE TABLE IF NOT EXISTS `gallery_photo` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_gallery` int(11) NOT NULL,
  `photo_path` text COLLATE utf8_polish_ci NOT NULL,
  `photo_active` int(11) NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=37 ;

--
-- Zrzut danych tabeli `gallery_photo`
--

INSERT INTO `gallery_photo` (`photo_id`, `photo_gallery`, `photo_path`, `photo_active`) VALUES
(31, 41, 'gallery/galeria/1393329588', 0),
(32, 41, 'gallery/galeria/din', 0),
(33, 41, 'gallery/galeria/podstawy-gotowania-b-iext8635590', 0),
(34, 42, 'gallery/galeria - Kopia/1393329588', 0),
(35, 42, 'gallery/galeria - Kopia/din', 0),
(36, 42, 'gallery/galeria - Kopia/podstawy-gotowania-b-iext8635590', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `modules_id` int(11) NOT NULL AUTO_INCREMENT,
  `modules_path` text COLLATE utf8_polish_ci NOT NULL,
  `modules_name` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`modules_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `modules`
--

INSERT INTO `modules` (`modules_id`, `modules_path`, `modules_name`) VALUES
(1, 'news', 'News'),
(2, 'tournament', 'Zawody'),
(3, 'team', 'Organizatorzy'),
(4, 'tournament_registration', 'Rejestracja'),
(5, 'gallery', 'Galeria');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(100) COLLATE utf8_bin NOT NULL,
  `news_context` varchar(1000) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `news_date` date NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_context`, `news_date`) VALUES
(1, 'Harmonogram zawodów ', 'Podajemy wstępny harmonogram zawodów Copernicus Robots Tournament 2014.\r\n\r\n8.00-10.00 REJESTRACJA ZAWODNIKÓW\r\n8.00-10.30 POMIARY\r\n11.00-14.30- pokazy Free Style\r\n11.00-14.00 ELIMINACJE MINISUMO\r\n11.00-12.30 ELIMINACJE LineFollower\r\n12.30-13.30 NANOSUMO\r\n13.00-14.00 MIKROSUMO\r\n13.30-14.30 SUMO\r\n14.45 – dekoracja zwycięzców MIKROSUMO, NANOSUMO,SUMO, Free Style\r\n15.00-16.00 FINAŁ LineFollower\r\n15.30-16.30 FINAŁ MINISUMO\r\n16.30- dekoracja zwycięzców LineFollowe i minisumo\r\n16.45-deatchmatch i dekoracja zwycięzcy.\r\n\r\nHarmonogram zawodów może ulec zmianie.', '2014-02-15'),
(2, 'Moduły Startowe', 'Na zawodach! Copernicus Robots Tournament 2014 do robotów klasy sumo, minisumo, microsumo oraz nanosumo będą wymagane moduły startowe. Ma to na celu zwiększyć bezpieczeństwo oraz zapobiec falstartom. W trakcie zawodów wymagane będą moduły zgodne ze standardem wprowadzonym na RobotChallenge. http://www.startmodule.com/', '2014-01-01');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news_coments`
--

CREATE TABLE IF NOT EXISTS `news_coments` (
  `coment_id` int(11) NOT NULL AUTO_INCREMENT,
  `coment_news_id` int(11) NOT NULL,
  `coment_author` text COLLATE utf8_polish_ci NOT NULL,
  `coment_date` text COLLATE utf8_polish_ci NOT NULL,
  `coment_context` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`coment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=18 ;

--
-- Zrzut danych tabeli `news_coments`
--

INSERT INTO `news_coments` (`coment_id`, `coment_news_id`, `coment_author`, `coment_date`, `coment_context`) VALUES
(1, 1, 'Komentator 3', '2014-02-21', 'Komentarz 3'),
(2, 1, 'Komentator 2', '2014-02-20', 'Komentarz 2'),
(3, 1, 'Komentator 1', '2014-02-01', 'Komentarz 1'),
(4, 2, 'Komentator 2', '2014-02-21', 'Komentatarz 2'),
(5, 2, 'Komentator 1', '2014-02-18', 'Komentarz 1'),
(8, 1, 'Test1', '2014-02-24', 'Testowy 1'),
(9, 2, 'Test 2', '2014-02-24', 'Testowy 2'),
(10, 1, 'Test 3', '2014-02-24', 'Testowy 3'),
(11, 1, 'Test 4', '2014-02-24', 'Testowo 4'),
(12, 1, 'Test 5', '2014-02-24', 'Testowo 5'),
(13, 2, 'Test 6', '2014-02-24', 'Testowy 6'),
(14, 1, 'Test 7', '2014-02-24', 'Testowy 7'),
(15, 1, 'Test 8 ', '2014-02-24', 'Testowy 8'),
(16, 1, 'Test 9', '2014-02-24', 'Testowy9'),
(17, 1, 'gdsofgsj', '2014-02-24', 'gsjogsdjogpsd');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_user` text COLLATE utf8_polish_ci NOT NULL,
  `session_key` text COLLATE utf8_polish_ci NOT NULL,
  `session_active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=105 ;

--
-- Zrzut danych tabeli `session`
--

INSERT INTO `session` (`session_id`, `session_user`, `session_key`, `session_active`) VALUES
(94, 'Tweester', '1840', 1),
(95, 'Tweester', '1317', 1),
(96, 'Tweester', '1841', 1),
(97, 'Tweester', '1135', 1),
(98, 'Tweester', '1156', 1),
(99, 'Tweester', '1923', 1),
(100, 'Tweester', '1790', 1),
(101, 'Tweester', '1897', 1),
(102, 'Tweester', '5585144', 1),
(103, 'Tweester', '4e6899966b50198824c78f9e451d552b', 1),
(104, 'Tweester', '70a6d9190bb5f300e93c070a068bcab2', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` text COLLATE utf8_polish_ci NOT NULL,
  `team_rank_name` text COLLATE utf8_polish_ci NOT NULL,
  `team_rank` int(11) NOT NULL,
  `team_info` text COLLATE utf8_polish_ci NOT NULL,
  `team_photo` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `team`
--

INSERT INTO `team` (`team_id`, `team_name`, `team_rank_name`, `team_rank`, `team_info`, `team_photo`) VALUES
(1, 'Katarzyna Bożyk', 'Główny Koordynator', 1, 'Testowy opis Katarzyna Bożyk', 'katboz'),
(2, 'Kamil Gorczyca', 'Koordynator ds. Sponsoringu Eventu', 2, 'Testowy opis Kamil Gorczyca', 'kamgor');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tournament`
--

CREATE TABLE IF NOT EXISTS `tournament` (
  `tournament_id` int(11) NOT NULL AUTO_INCREMENT,
  `tournament_name` text COLLATE utf8_polish_ci NOT NULL,
  `tournament_context` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`tournament_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `tournament`
--

INSERT INTO `tournament` (`tournament_id`, `tournament_name`, `tournament_context`) VALUES
(1, 'Sumo, MiniSumo, MicroSumo i NanoSumo', 'W! tej konkurencji 2 roboty odpowiednich dla swojej kategorii wymiarów (które są zdefiniowane w regulaminie) walczą ze sobą na okrągłym czarnym ringu otoczonym białą linią (rozmiar w zależności od kategorii podany jest w regulaminie).\r\nDaną rundę wygrywa robot, który wypchnie drugiego robota poza obszar ringu.\r\nWalkę wygrywa robot, który jako pierwszy wygrywa 2 rundy.'),
(2, 'LineFollower 2', 'W tej konkurencji robot porusza się po trasie wyznaczonej przez czarną linię na białej planszy.\r\nWygrywa robot, który na trasie konkursowej uzyska najkrótszy czas przejazdu.'),
(3, 'FreeStyle', 'W tej konkurencji roboty są prezentowane przed specjalnie powołanym jury i oceniane pod względem wykonania ze strony technicznej, estetycznej oraz innowacyjności pomysłu.\r\nWygrywa robot, który uzyska najwyższą ocenę.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tournament_class`
--

CREATE TABLE IF NOT EXISTS `tournament_class` (
  `tc_id` int(11) NOT NULL AUTO_INCREMENT,
  `tc_idname` int(11) NOT NULL,
  `tc_name` text COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`tc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `tournament_class`
--

INSERT INTO `tournament_class` (`tc_id`, `tc_idname`, `tc_name`) VALUES
(1, 1, 'Line Follower'),
(2, 2, 'NanoSumo'),
(3, 3, 'MicroSumo'),
(4, 4, 'MiniSumo'),
(5, 5, 'Sumo'),
(6, 6, 'FreeStyle');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tournament_registration`
--

CREATE TABLE IF NOT EXISTS `tournament_registration` (
  `tr_id` int(11) NOT NULL AUTO_INCREMENT,
  `tr_name` text COLLATE utf8_polish_ci NOT NULL,
  `tr_surname` text COLLATE utf8_polish_ci NOT NULL,
  `tr_email` text COLLATE utf8_polish_ci NOT NULL,
  `tr_active` int(1) NOT NULL DEFAULT '0',
  `tr_robot_name` text COLLATE utf8_polish_ci NOT NULL,
  `tr_tournament` int(11) NOT NULL,
  `tr_country` text COLLATE utf8_polish_ci NOT NULL,
  `tr_city` text COLLATE utf8_polish_ci NOT NULL,
  `tr_company` int(11) NOT NULL,
  PRIMARY KEY (`tr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `tournament_registration`
--

INSERT INTO `tournament_registration` (`tr_id`, `tr_name`, `tr_surname`, `tr_email`, `tr_active`, `tr_robot_name`, `tr_tournament`, `tr_country`, `tr_city`, `tr_company`) VALUES
(1, 'Mateusz 2', 'Schalau', 'tweester.pl@gmail.com', 1, 'Robotocos', 5, 'Poland', 'Toruń', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` text COLLATE utf8_polish_ci NOT NULL,
  `user_password` text COLLATE utf8_polish_ci NOT NULL,
  `user_mail` text COLLATE utf8_polish_ci NOT NULL,
  `user_admin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_mail`, `user_admin`) VALUES
(1, 'Tweester', 'pass123', 'tweester.pl@gmail.com', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
