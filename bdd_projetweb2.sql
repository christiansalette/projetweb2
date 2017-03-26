-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 25 Mars 2017 à 00:53
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bdd_projetweb2`
--
CREATE DATABASE IF NOT EXISTS `bdd_projetweb2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bdd_projetweb2`;

-- --------------------------------------------------------

--
-- Structure de la table `pjt_compositions`
--
-- Création :  Ven 24 Mars 2017 à 23:35
--

DROP TABLE IF EXISTS `pjt_compositions`;
CREATE TABLE IF NOT EXISTS `pjt_compositions` (
  `idComposition` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `urlComposition` varchar(30) NOT NULL,
  `idProposition` int(10) unsigned NOT NULL,
  `idStation` tinyint(4) NOT NULL,
  PRIMARY KEY (`idComposition`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `pjt_compositions`
--

INSERT INTO `pjt_compositions` (`idComposition`, `urlComposition`, `idProposition`, `idStation`) VALUES
(1, '16/beaudry_01c.jpg', 1, 16),
(2, '15/berriuqam_01c.jpg', 2, 15),
(3, '15/berriuqam_02c.jpg', 3, 15),
(4, '18/frontenac_01c.jpg', 4, 18),
(5, '18/frontenac_02c.jpg', 5, 18),
(6, '10/guyconcordia_01c.jpg', 6, 10),
(7, '10/guyconcordia_02c.jpg', 7, 10),
(8, '8/lionelgroulx_01c.jpg', 8, 8),
(9, '8/lionelgroulx_02c.jpg', 9, 8),
(10, '49/jeantalon_01c.jpg', 10, 49);

-- --------------------------------------------------------

--
-- Structure de la table `pjt_lignes`
--
-- Création :  Ven 24 Mars 2017 à 15:57
--

DROP TABLE IF EXISTS `pjt_lignes`;
CREATE TABLE IF NOT EXISTS `pjt_lignes` (
  `idLigne` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nomLigne` varchar(6) NOT NULL,
  PRIMARY KEY (`idLigne`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `pjt_lignes`
--

INSERT INTO `pjt_lignes` (`idLigne`, `nomLigne`) VALUES
(1, 'Verte'),
(2, 'Orange'),
(3, 'Jaune'),
(4, 'Bleue');

-- --------------------------------------------------------

--
-- Structure de la table `pjt_lignes_stations`
--
-- Création :  Ven 24 Mars 2017 à 15:57
--

DROP TABLE IF EXISTS `pjt_lignes_stations`;
CREATE TABLE IF NOT EXISTS `pjt_lignes_stations` (
  `idLigne` tinyint(4) NOT NULL,
  `idStation` tinyint(4) NOT NULL,
  PRIMARY KEY (`idLigne`,`idStation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pjt_lignes_stations`
--

INSERT INTO `pjt_lignes_stations` (`idLigne`, `idStation`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(2, 8),
(2, 15),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 52),
(2, 53),
(2, 54),
(2, 55),
(2, 56),
(3, 15),
(3, 57),
(3, 58),
(4, 34),
(4, 49),
(4, 59),
(4, 60),
(4, 61),
(4, 62),
(4, 63),
(4, 64),
(4, 65),
(4, 66),
(4, 67),
(4, 68);

-- --------------------------------------------------------

--
-- Structure de la table `pjt_messages`
--
-- Création :  Ven 24 Mars 2017 à 15:57
--

DROP TABLE IF EXISTS `pjt_messages`;
CREATE TABLE IF NOT EXISTS `pjt_messages` (
  `idMessage` bigint(11) NOT NULL AUTO_INCREMENT,
  `sujet` varchar(50) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `idReponse` bigint(11) DEFAULT NULL,
  `idUtilisateur` bigint(11) NOT NULL,
  PRIMARY KEY (`idMessage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `pjt_propositions`
--
-- Création :  Ven 24 Mars 2017 à 23:35
--

DROP TABLE IF EXISTS `pjt_propositions`;
CREATE TABLE IF NOT EXISTS `pjt_propositions` (
  `idProposition` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `urlProposition` varchar(30) NOT NULL,
  `dateAjout` date NOT NULL,
  `nbrVotes` int(10) unsigned NOT NULL DEFAULT '0',
  `idUtilisateur` int(10) unsigned NOT NULL,
  `idStation` tinyint(4) NOT NULL,
  PRIMARY KEY (`idProposition`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `pjt_propositions`
--

INSERT INTO `pjt_propositions` (`idProposition`, `urlProposition`, `dateAjout`, `nbrVotes`, `idUtilisateur`, `idStation`) VALUES
(1, '16/beaudry_01o.jpg', '2017-03-24', 0, 1, 16),
(2, '15/berriuqam_01o.jpg', '2017-03-24', 0, 1, 15),
(3, '15/berriuqam_02o.jpg', '2017-03-24', 0, 2, 15),
(4, '18/frontenac_01o.jpg', '2017-03-24', 0, 1, 18),
(5, '18/frontenac_02o.jpg', '2017-03-24', 0, 2, 18),
(6, '10/guyconcordia_01o.jpg', '2017-03-24', 0, 2, 10),
(7, '10/guyconcordia_02o.jpg', '2017-03-24', 0, 3, 10),
(8, '8/lionelgroulx_01o.jpg', '2017-03-24', 0, 3, 8),
(9, '8/lionelgroulx_02o.jpg', '2017-03-24', 0, 3, 8),
(10, '49/jeantalon_01o.jpg', '2017-03-24', 0, 1, 49);

-- --------------------------------------------------------

--
-- Structure de la table `pjt_stations`
--
-- Création :  Ven 24 Mars 2017 à 15:57
--

DROP TABLE IF EXISTS `pjt_stations`;
CREATE TABLE IF NOT EXISTS `pjt_stations` (
  `idStation` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nomStation` varchar(35) NOT NULL,
  PRIMARY KEY (`idStation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- Contenu de la table `pjt_stations`
--

INSERT INTO `pjt_stations` (`idStation`, `nomStation`) VALUES
(1, 'ANGRIGNON'),
(2, 'MONK'),
(3, 'JOLICOEUR'),
(4, 'VERDUN'),
(5, 'DE L''ÉGLISE'),
(6, 'LASALLE'),
(7, 'CHARLEVOIX'),
(8, 'LIONEL-GROULX'),
(9, 'ATWATER'),
(10, 'GUY-CONCORDIA'),
(11, 'PEEL'),
(12, 'MCGILL'),
(13, 'PLACE-DES-ARTS'),
(14, 'SAINT-LAURENT'),
(15, 'BERRI-UQAM'),
(16, 'BEAUDRY'),
(17, 'PAPINEAU'),
(18, 'FRONTENAC'),
(19, 'PRÉFONTAINE'),
(20, 'JOLIETTE'),
(21, 'PIE-IX'),
(22, 'VIAU'),
(23, 'ASSOMPTION'),
(24, 'CADILLAC'),
(25, 'LANGELIER'),
(26, 'RADISSON'),
(27, 'HONORÉ-BEAUGRAND'),
(28, 'CÔTE-VERTU'),
(29, 'DU COLLÈGE'),
(30, 'DE LA SAVANE'),
(31, 'NAMUR'),
(32, 'PLAMONDON'),
(33, 'CÔTE-SAINTE-CATHERINE'),
(34, 'SNOWDON'),
(35, 'VILLA-MARIA'),
(36, 'VENDÔME'),
(37, 'PLACE-SAINT-HENRI'),
(38, 'GEORGES-VANIER'),
(39, 'LUCIEN-L''ALLIER'),
(40, 'BONAVENTURE'),
(41, 'SQUARE-VICTORIA–OACI'),
(42, 'PLACE-D''ARMES'),
(43, 'CHAMP-DE-MARS'),
(44, 'SHERBROOKE'),
(45, 'MONT-ROYAL'),
(46, 'LAURIER'),
(47, 'ROSEMONT'),
(48, 'BEAUBIEN'),
(49, 'JEAN-TALON'),
(50, 'JARRY'),
(51, 'CRÉMAZIE'),
(52, 'SAUVÉ'),
(53, 'HENRI-BOURASSA'),
(54, 'CARTIER'),
(55, 'DE LA CONCORDE'),
(56, 'MONTMORENCY'),
(57, 'LONGUEUIL–UNIVERSITÉ-DE-SHERBROOKE'),
(58, 'JEAN-DRAPEAU'),
(59, 'CÔTE-DES-NEIGES'),
(60, 'UNIVERSITÉ-DE-MONTRÉAL'),
(61, 'ÉDOUARD-MONTPETIT'),
(62, 'OUTREMONT'),
(63, 'ACADIE'),
(64, 'PARC'),
(65, 'DE CASTELNAU'),
(66, 'FABRE'),
(67, 'D''IBERVILLE'),
(68, 'SAINT-MICHEL');

-- --------------------------------------------------------

--
-- Structure de la table `pjt_utilisateurs`
--
-- Création :  Ven 24 Mars 2017 à 21:21
--

DROP TABLE IF EXISTS `pjt_utilisateurs`;
CREATE TABLE IF NOT EXISTS `pjt_utilisateurs` (
  `idUtilisateur` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `courriel` varchar(50) NOT NULL,
  `motdepasse` varchar(50) NOT NULL,
  `url_avatar` varchar(100) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `pjt_utilisateurs`
--

INSERT INTO `pjt_utilisateurs` (`idUtilisateur`, `pseudo`, `courriel`, `motdepasse`, `url_avatar`, `role`) VALUES
(1, 'un', 'henry.abernathy@yahoo.com', 'un', NULL, 0),
(2, 'deux', 'timothy.stehr@hotmail.com', 'deux', NULL, 0),
(3, 'trois', 'toy.domenica@yahoo.com', 'trois', NULL, 0),
(4, 'Keith', 'timmothy.fritsch@monahan.biz', 'accusantium', NULL, 0),
(5, 'Zachery', 'gstark@kessler.org', 'nulla', NULL, 0),
(6, 'Ezra', 'owen16@gmail.com', 'earum', NULL, 0),
(7, 'Lincoln', 'simonis.linnie@friesen.com', 'nihil', NULL, 0),
(8, 'Alec', 'twalsh@becker.info', 'unde', NULL, 0),
(9, 'Diego', 'noemi19@hotmail.com', 'reprehenderit', NULL, 0),
(10, 'Robyn', 'upton.vernie@hotmail.com', 'voluptas', NULL, 0),
(11, 'admin1', 'admin1@admin.com', 'admin1', NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
