-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 02 Janvier 2017 à 23:25
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forum`
--
CREATE DATABASE IF NOT EXISTS `forum` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `forum`;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `idmessage` int(11) NOT NULL,
  `contenumessage` longtext,
  `datemessage` date DEFAULT NULL,
  `datemodificationmessage` date DEFAULT NULL,
  `sujetmessage` int(11) DEFAULT NULL,
  `utilisateurmessage` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`idmessage`, `contenumessage`, `datemessage`, `datemodificationmessage`, `sujetmessage`, `utilisateurmessage`) VALUES
(1, 'Starcraft 2 c\'est la vie !', '2016-12-17', '2016-12-17', 5, 4),
(2, 'Ce jeux est Ã‰norme Ã©norme Ã‡ â˜¼Pâ€¼â˜ºâ˜»', '2016-12-17', '2016-12-17', 5, 4),
(3, 'C\'est le meilleur point ..', '2016-12-19', '2016-12-19', 7, 4),
(4, 'Super\r\n', '2016-12-19', '2016-12-19', 13, 8),
(5, 'Les molÃ©cules, c\'est de la bulle !', '2016-12-19', '2016-12-19', 3, 10);

-- --------------------------------------------------------

--
-- Structure de la table `sujet`
--

CREATE TABLE `sujet` (
  `idsujet` int(11) NOT NULL,
  `libellesujet` varchar(100) DEFAULT NULL,
  `descriptionsujet` longtext,
  `utilisateursujet` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sujet`
--

INSERT INTO `sujet` (`idsujet`, `libellesujet`, `descriptionsujet`, `utilisateursujet`) VALUES
(4, 'Minecraft', 'Minecraft c\'est ma vie !!!', 4),
(3, 'Les molÃ©cules', 'Les molÃ©cules c\'est mieux quand sa bouge !!!', 4),
(5, 'Starcraft II', 'C\'est ma life', 4),
(6, 'PokÃ©mon Go', 'Des pokÃ©mons ici, lÃ  oÃ¹ ailleurs.', 4),
(7, 'Pickachu', 'Le meilleur des pokÃ©mon et de loin !', 4),
(8, 'hearthstone', 'le meilleur jeu de carte du moment', 7),
(9, 'call of duty', 'une licence que j\'ai dÃ©vorÃ© du dÃ©but jusqu\'Ã  la fin', 7),
(10, 'counter strike ', 'un jeu rÃ©aliste que j\'ai jouÃ© pendant plusieurs centaine d\'heures', 7),
(11, 'rust ', 'un jeu de survie rÃ©aliste qui ne cesse des sâ€™amÃ©liore  ', 7),
(12, 'don\'t starve ', 'un jeu de survie seul ou en coop ultra amusent ', 7),
(13, 'league of legends ', 'une jeu de combat ultra fun ', 7);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idutilisateur` int(11) NOT NULL,
  `pseudoutilisateur` varchar(50) NOT NULL,
  `emailutilisateur` varchar(50) NOT NULL,
  `mdputilisateur` varchar(500) NOT NULL,
  `avatarutilisateur` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idutilisateur`, `pseudoutilisateur`, `emailutilisateur`, `mdputilisateur`, `avatarutilisateur`) VALUES
(4, 'pboudeaud', 'pierre.boudeaud@live.fr', '$2y$10$cl3.0GQat0WI7tVDXqLEE.4rp5O09x33tScQQ7wuDROxEGQHy6MFG', '8b775cbc5fea74e8359d41996066c6a4'),
(5, 'admin', 'admin@devmb.fr', '$2y$10$f4ITcGLofP0vtmg7yowt0uJDcQhPLKvU59AYGcEm9HhSAqLAr0wdi', '44d1382cc5ed07ebc298c971908d6bba'),
(6, 'lmarchand', 'laetitia-jb@outlook.com', '$2y$10$lhTZPvTIli4KdKl9HqGY0eAUEBTWHl5ZedRELsKdHxqQfwdZGYyfi', 'a2aed01df9f014789d6b2ac8a1067648'),
(7, 'alpha022', 'valentin.boudeaud@live.fr', '$2y$10$ge9qTTLCPO.snvlwuyTKrOEZVFSe5M3GoDoe5d/3KredN8RA5WUd2', 'e0acd4cc7caae0147b9017f2118f2bf2'),
(8, 'Rouky17', 'rouky@live.fr', '$2y$10$KWugrbXyTHZihXRc/tvMDOIiIc2XSB/zBL2bMNfaZgV.wqyC9ziFW', '088d2080888262adf70539a1d223b772'),
(10, 'chokolie', 'nathalie.boudeaud@live.fr', '$2y$10$pGCFNn9vR.fnZF4qZtojh.2AMNnHOU7CBKmDu3W0mJbnaRZndDxP2', '224f19549fd468e0e8de328cc6be521d');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`idmessage`),
  ADD KEY `fk_message_sujet` (`sujetmessage`),
  ADD KEY `fk_message_utilisateur` (`utilisateurmessage`);

--
-- Index pour la table `sujet`
--
ALTER TABLE `sujet`
  ADD PRIMARY KEY (`idsujet`),
  ADD KEY `fk_utilisateur_sujet` (`utilisateursujet`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idutilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `sujet`
--
ALTER TABLE `sujet`
  MODIFY `idsujet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idutilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
