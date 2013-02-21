-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2013 at 07:54 PM
-- Server version: 5.5.29
-- PHP Version: 5.3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `a2doc`
--

-- --------------------------------------------------------

--
-- Table structure for table `adherents`
--

CREATE TABLE IF NOT EXISTS `adherents` (
  `idadherents` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `pass` varchar(10) NOT NULL,
  PRIMARY KEY (`idadherents`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `adherents`
--

INSERT INTO `adherents` (`idadherents`, `nom`, `prenom`, `mail`, `pass`) VALUES
(1, 'noel', 'emeline', 'noel@coria.fr', 'toto'),
(2, 'boutin', 'Guillaume', 'G@G.fr', 'toto');

-- --------------------------------------------------------

--
-- Table structure for table `adherents_has_competences`
--

CREATE TABLE IF NOT EXISTS `adherents_has_competences` (
  `adherents_idadherents` int(11) NOT NULL,
  `competences_idCompetences` int(11) NOT NULL,
  PRIMARY KEY (`adherents_idadherents`,`competences_idCompetences`),
  KEY `fk_adherents_has_competences_competences1_idx` (`competences_idCompetences`),
  KEY `fk_adherents_has_competences_adherents1_idx` (`adherents_idadherents`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `adherents_has_Diplôme`
--

CREATE TABLE IF NOT EXISTS `adherents_has_Diplôme` (
  `adherents_idadherents` int(11) NOT NULL,
  `Diplôme_idDiplôme` int(11) NOT NULL,
  PRIMARY KEY (`adherents_idadherents`,`Diplôme_idDiplôme`),
  KEY `fk_adherents_has_Diplôme_Diplôme1_idx` (`Diplôme_idDiplôme`),
  KEY `fk_adherents_has_Diplôme_adherents1_idx` (`adherents_idadherents`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `adherents_has_entreprise`
--

CREATE TABLE IF NOT EXISTS `adherents_has_entreprise` (
  `adherents_idadherents` int(11) NOT NULL,
  `entreprise_identreprise` int(11) NOT NULL,
  PRIMARY KEY (`adherents_idadherents`,`entreprise_identreprise`),
  KEY `fk_adherents_has_entreprise_entreprise1_idx` (`entreprise_identreprise`),
  KEY `fk_adherents_has_entreprise_adherents_idx` (`adherents_idadherents`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `compétences`
--

CREATE TABLE IF NOT EXISTS `compétences` (
  `idCompetences` int(11) NOT NULL AUTO_INCREMENT,
  `dénomination` varchar(45) NOT NULL,
  `Niveau_idNiveau` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idCompetences`,`Niveau_idNiveau`),
  KEY `fk_compétences_Niveau1_idx` (`Niveau_idNiveau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Date`
--

CREATE TABLE IF NOT EXISTS `Date` (
  `idDate` int(11) NOT NULL AUTO_INCREMENT,
  `jour` int(11) DEFAULT NULL,
  `mois` int(11) DEFAULT NULL,
  `année` int(11) DEFAULT NULL,
  `News_idNews` int(11) NOT NULL,
  `adherents_idadherents` int(11) NOT NULL,
  PRIMARY KEY (`idDate`,`News_idNews`,`adherents_idadherents`),
  KEY `fk_Date_News1_idx` (`News_idNews`),
  KEY `fk_Date_adherents1_idx` (`adherents_idadherents`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Diplôme`
--

CREATE TABLE IF NOT EXISTS `Diplôme` (
  `idDiplôme` int(11) NOT NULL AUTO_INCREMENT,
  `dénomination` varchar(45) DEFAULT NULL,
  `specialité` varchar(45) DEFAULT NULL,
  `établissement` varchar(45) DEFAULT NULL,
  `Date_idDate` int(11) NOT NULL,
  `Date_News_idNews` int(11) NOT NULL,
  `Date_adherents_idadherents` int(11) NOT NULL,
  PRIMARY KEY (`idDiplôme`,`Date_idDate`,`Date_News_idNews`,`Date_adherents_idadherents`),
  KEY `fk_Diplôme_Date1_idx` (`Date_idDate`,`Date_News_idNews`,`Date_adherents_idadherents`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `entreprise`
--

CREATE TABLE IF NOT EXISTS `entreprise` (
  `identreprise` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `activite` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`identreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Message forums`
--

CREATE TABLE IF NOT EXISTS `Message forums` (
  `idMessage forums` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(45) DEFAULT NULL,
  `contenu` text,
  `adherents_idadherents` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idMessage forums`,`adherents_idadherents`),
  KEY `fk_Message forums_adherents1_idx` (`adherents_idadherents`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `News`
--

CREATE TABLE IF NOT EXISTS `News` (
  `idNews` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text,
  `date` date NOT NULL,
  PRIMARY KEY (`idNews`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `News`
--

INSERT INTO `News` (`idNews`, `contenu`, `date`) VALUES
(2, 'L''association a de l''avenir', '2013-02-19'),
(5, 'essai avec plus de caracteres pour voir si cela va etre ecris sur deux ligne ou pas', '2013-02-04'),
(7, 'tourjours et jamais se rencontreront peut etre demain, il faut voir si Chuck Norris mange plus de pommmes de Superman, parce qu''en fonction du beurre qu''ils mettront dessus on decidera du gagnant. Mais attention catwoman est en embuscade avec un perroquet sur le bras elle va peut etre apprendre a voler. Pour l''instant Gérard tient bon, il ne lache pas la bouteille et va bientot etre plus rouge que Gerard ment.', '2013-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `Niveau`
--

CREATE TABLE IF NOT EXISTS `Niveau` (
  `idNiveau` int(11) NOT NULL AUTO_INCREMENT,
  `Niveau` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idNiveau`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Niveau`
--

INSERT INTO `Niveau` (`idNiveau`, `Niveau`) VALUES
(1, 'découverte'),
(2, 'autonomie'),
(3, 'maîtrise'),
(4, 'expertise');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adherents_has_competences`
--
ALTER TABLE `adherents_has_competences`
  ADD CONSTRAINT `fk_adherents_has_competences_adherents1` FOREIGN KEY (`adherents_idadherents`) REFERENCES `adherents` (`idadherents`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_adherents_has_competences_competences1` FOREIGN KEY (`competences_idCompetences`) REFERENCES `compétences` (`idCompetences`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `adherents_has_Diplôme`
--
ALTER TABLE `adherents_has_Diplôme`
  ADD CONSTRAINT `fk_adherents_has_Diplôme_adherents1` FOREIGN KEY (`adherents_idadherents`) REFERENCES `adherents` (`idadherents`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_adherents_has_Diplôme_Diplôme1` FOREIGN KEY (`Diplôme_idDiplôme`) REFERENCES `Diplôme` (`idDiplôme`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `adherents_has_entreprise`
--
ALTER TABLE `adherents_has_entreprise`
  ADD CONSTRAINT `fk_adherents_has_entreprise_adherents` FOREIGN KEY (`adherents_idadherents`) REFERENCES `adherents` (`idadherents`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_adherents_has_entreprise_entreprise1` FOREIGN KEY (`entreprise_identreprise`) REFERENCES `entreprise` (`identreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `compétences`
--
ALTER TABLE `compétences`
  ADD CONSTRAINT `fk_compétences_Niveau1` FOREIGN KEY (`Niveau_idNiveau`) REFERENCES `Niveau` (`idNiveau`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Date`
--
ALTER TABLE `Date`
  ADD CONSTRAINT `fk_Date_adherents1` FOREIGN KEY (`adherents_idadherents`) REFERENCES `adherents` (`idadherents`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Date_News1` FOREIGN KEY (`News_idNews`) REFERENCES `News` (`idNews`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Diplôme`
--
ALTER TABLE `Diplôme`
  ADD CONSTRAINT `fk_Diplôme_Date1` FOREIGN KEY (`Date_idDate`, `Date_News_idNews`, `Date_adherents_idadherents`) REFERENCES `Date` (`idDate`, `News_idNews`, `adherents_idadherents`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Message forums`
--
ALTER TABLE `Message forums`
  ADD CONSTRAINT `fk_Message forums_adherents1` FOREIGN KEY (`adherents_idadherents`) REFERENCES `adherents` (`idadherents`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
