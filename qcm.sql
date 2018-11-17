-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 17 nov. 2018 à 16:24
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `qcm`
--

-- --------------------------------------------------------

--
-- Structure de la table `a_rempli`
--

DROP TABLE IF EXISTS `a_rempli`;
CREATE TABLE IF NOT EXISTS `a_rempli` (
  `id_user_fk` int(11) NOT NULL,
  `id_qcm_fk` int(11) NOT NULL,
  `id_reponse_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_user_fk`,`id_qcm_fk`,`id_reponse_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `a_rempli`
--

INSERT INTO `a_rempli` (`id_user_fk`, `id_qcm_fk`, `id_reponse_fk`) VALUES
(3, 5, 125),
(3, 5, 130),
(3, 5, 133);

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `id_contenir` int(11) NOT NULL AUTO_INCREMENT,
  `id_qcm_fk` int(11) NOT NULL,
  `id_question_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_contenir`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`id_contenir`, `id_qcm_fk`, `id_question_fk`) VALUES
(30, 5, 72),
(31, 5, 73),
(32, 5, 74),
(33, 6, 75),
(34, 6, 77),
(35, 6, 75),
(36, 6, 76),
(37, 7, 70),
(38, 7, 71),
(39, 7, 69);

-- --------------------------------------------------------

--
-- Structure de la table `notation`
--

DROP TABLE IF EXISTS `notation`;
CREATE TABLE IF NOT EXISTS `notation` (
  `id_user_fk` int(11) NOT NULL,
  `id_qcm_fk` int(11) NOT NULL,
  `note_obtenue_notation` float NOT NULL,
  PRIMARY KEY (`id_user_fk`,`id_qcm_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `qcm`
--

DROP TABLE IF EXISTS `qcm`;
CREATE TABLE IF NOT EXISTS `qcm` (
  `id_qcm_fk` int(11) NOT NULL AUTO_INCREMENT,
  `label_qcm` text NOT NULL,
  `id_user_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_qcm_fk`),
  KEY `id_user_fk` (`id_user_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `qcm`
--

INSERT INTO `qcm` (`id_qcm_fk`, `label_qcm`, `id_user_fk`) VALUES
(5, 'Maths Tp 3', 1),
(6, 'Algo-4A-10 novembre', 1),
(7, 'Anglais Pop', 1);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `label_question` varchar(50) NOT NULL,
  `id_user_fk` int(11) NOT NULL,
  `id_theme_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_question`),
  KEY `id_theme_fk` (`id_theme_fk`),
  KEY `id_user_fk` (`id_user_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_question`, `label_question`, `id_user_fk`, `id_theme_fk`) VALUES
(69, 'to be or not ...?', 1, 4),
(70, 'Staying ... ?', 1, 4),
(71, 'what a xxxx wolrd?', 1, 4),
(72, 'a + b = ?', 1, 1),
(73, '1 + 2 = ?', 1, 1),
(74, '2 * 2 = ?', 1, 1),
(75, 'if (il pleut demain)', 1, 2),
(76, 'tant que (il pleut)', 1, 2),
(77, 'fromage ou dessert?', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `id_reponse` int(11) NOT NULL AUTO_INCREMENT,
  `label_reponse` varchar(50) NOT NULL,
  `validite` tinyint(1) NOT NULL,
  `id_question_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_reponse`),
  KEY `id_question_fk` (`id_question_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id_reponse`, `label_reponse`, `validite`, `id_question_fk`) VALUES
(112, 'toubib', 0, 69),
(113, 'to buy', 0, 69),
(114, 'to bee', 0, 69),
(115, 'to be', 1, 69),
(116, 'alive', 1, 70),
(117, 'at night', 0, 70),
(118, 'at light', 0, 70),
(119, 'in bed', 0, 70),
(120, 'man\'s', 0, 71),
(121, 'beautifull', 0, 71),
(122, 'wonderfull', 1, 71),
(123, 'nice', 0, 71),
(124, '1', 0, 72),
(125, 'ab', 0, 72),
(126, 'ba', 0, 72),
(127, '2', 1, 72),
(128, 'x', 0, 73),
(129, '3', 1, 73),
(130, 'trois', 0, 73),
(131, '1+2', 0, 73),
(132, '22', 0, 74),
(133, '2,2', 1, 74),
(134, '4', 1, 74),
(135, '44', 0, 74),
(136, 'parapluie aujourd\'hui', 0, 75),
(137, 'parapluie hier', 0, 75),
(138, 'parapluie demain', 1, 75),
(139, 'lunettes de soleil', 0, 75),
(140, 'arroser le jardin', 0, 76),
(141, 'remplir la piscine', 0, 76),
(142, 'étendre le linge', 0, 76),
(143, 'rester à l\'intérieur', 1, 76),
(144, 'pourquoi?', 0, 77),
(145, 'comment?', 0, 77),
(146, 'chocolatine', 1, 77),
(147, 'juste un verre de prune', 0, 77);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `id_theme` int(11) NOT NULL AUTO_INCREMENT,
  `label_theme` varchar(50) NOT NULL,
  PRIMARY KEY (`id_theme`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`id_theme`, `label_theme`) VALUES
(1, 'mathématiques'),
(2, 'algorithmique'),
(3, 'biologie'),
(4, 'langues');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `login_user` varchar(20) NOT NULL,
  `mdp_user` varchar(20) NOT NULL,
  `role_user` varchar(20) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `login_user`, `mdp_user`, `role_user`, `email_user`) VALUES
(1, 'test', 'test', 'prof', 'prof@prof.fr'),
(2, 'etu', 'etu', 'etu', 'etu@etu.fr'),
(3, 'etu2', 'etu2', 'etu', 'etu2@etu.fr');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `qcm`
--
ALTER TABLE `qcm`
  ADD CONSTRAINT `qcm_ibfk_1` FOREIGN KEY (`id_user_fk`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
