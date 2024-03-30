-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 22 Janvier 2024 à 19:46
-- Version du serveur: 5.1.36
-- Version de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `candidat`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscrits`
--

CREATE TABLE IF NOT EXISTS `inscrits` (
  `ID_inscrit` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Premon` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Formation` varchar(10) NOT NULL,
  `Niveau` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_inscrit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `inscrits`
--

INSERT INTO `inscrits` (`ID_inscrit`, `Nom`, `Premon`, `Email`, `Formation`, `Niveau`) VALUES
(1, 'MENDES', 'MAMY AYETH', 'mamyayethiane@gmail.com', 'ANGLAIS', 'L3'),
(2, 'DIOP', 'KHADY', 'diop-khady@gmail.com', 'Economique', 'L1'),
(3, 'MBENGUE', 'MAIMOUNA', 'mainoush@gmail.com', 'Economique', 'L1'),
(4, 'ILEKA', 'benjamin', 'benjaminileka98@gmail.com', 'Gi', 'L3'),
(5, 'BA', 'AMADOU', 'bamadou@gmail.com', 'gestion', 'L1'),
(6, 'BA', 'SEYDOU', 'dousey@gmail.com', 'gestion', 'L1'),
(7, 'BAYO', 'DOUDOU', 'awa@gmail.com', 'DROIT', 'L1');
