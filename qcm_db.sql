-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 07 oct. 2018 à 13:54
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

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
  `id_qcm` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_qcm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_question`, `label_question`, `id_user_fk`, `id_theme_fk`) VALUES
(1, 'Combien font 2 + 2 ?', 1, 1),
(2, 'yo', 1, 1),
(3, 'yo', 1, 1),
(4, 'blblbla', 1, 1),
(5, '18 + 2 = combien?', 1, 1),
(6, '18 + 2 = combien?', 1, 1),
(7, 'combien pour 5/2 ?', 1, 1),
(8, 'combien pour 5/2 ?', 1, 1),
(9, '3+2', 1, 1),
(10, '3+2', 1, 1),
(11, 'A+B?', 1, 1),
(12, 'faut-il?', 1, 1),
(13, 'y\'a t\'il?', 1, 1),
(14, 'test avant la soupe', 1, 1),
(15, 'test avant la soupe', 1, 1),
(16, 'ggff', 1, 1),
(17, 'pourquoi?', 1, 1),
(18, 'pourquoi?', 1, 1),
(19, 'pourquoi?', 1, 1),
(20, 'pourquoi?', 1, 1),
(21, 'f', 1, 1),
(22, 'non?', 1, 1),
(23, 'non?', 1, 1),
(24, 'dds', 1, 1),
(25, 'magret ce midi?', 1, 1),
(26, 'magret ce midi?', 1, 1),
(27, 'magret ou spliff?', 1, 1),
(28, 'magret ou spliff?', 1, 1),
(29, 'cowabunga?', 1, 1),
(30, 'gg', 1, 1),
(31, 'gg', 1, 1),
(32, 'tr', 1, 1),
(33, 'tr', 1, 1),
(34, 'quand est-ce qu\'on mange?', 1, 1),
(35, 'avant les frites?', 1, 1),
(36, 'avant les frites?', 1, 1),
(37, 'pourquoi', 1, 1),
(38, 'pourquoi', 1, 1),
(39, 'tu as bien mangé?', 1, 1),
(40, 'tu as bien mangé?', 1, 1),
(41, 'tu as bien mangé?', 1, 1),
(42, 'tu as bien mangé?', 1, 1),
(43, '1+1?', 1, 1),
(44, '1+1?', 1, 1),
(45, 'qui déchire?', 1, 1),
(46, 'qui déchire?', 1, 1),
(47, 'qui déchire?', 1, 1),
(48, 'qui déchire?', 1, 1),
(49, 'qui?', 1, 1),
(50, 'qui?', 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`id_reponse`, `label_reponse`, `validite`, `id_question_fk`) VALUES
(1, '4', 1, 1),
(2, '8', 0, 1),
(3, 'A', 0, 1),
(5, 'faut-il?', 1, 4),
(6, 'bonjour', 1, 1),
(7, 'bonjour', 1, 1),
(8, 'fffff', 0, 1),
(9, 'on se rapproche?', 1, 1),
(10, 'jamais', 0, 1),
(11, 'jamais', 0, 1),
(12, 'on fait du code', 1, 35),
(13, 'on fait du code', 1, 36),
(14, 'parceque', 0, 37),
(15, 'parceque', 0, 38),
(16, 'certainement', 1, 39),
(17, 'pas vraiment', 0, 41),
(18, 'certainement', 1, 42),
(19, 'pas vraiment', 0, 42),
(20, '11', 0, 43),
(21, '2', 1, 43),
(22, '2', 1, 44),
(23, 'batman', 0, 45),
(24, 'pskl', 1, 45),
(25, 'batman', 0, 46),
(26, 'pskl', 1, 46),
(27, 'batman', 0, 47),
(28, 'pskl', 1, 47),
(29, 'A', 0, 47),
(30, 'batman', 0, 48),
(31, 'pskl', 1, 48),
(32, 'A', 0, 48),
(33, 'paskl', 1, 49),
(34, 'batman', 0, 49),
(35, 'flash', 0, 49),
(36, 'wonderwoman', 0, 49),
(37, 'paskl', 1, 50),
(38, 'batman', 0, 50),
(39, 'flash', 0, 50),
(40, 'wonderwoman', 0, 50);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `id_theme` int(11) NOT NULL AUTO_INCREMENT,
  `label_theme` varchar(50) NOT NULL,
  PRIMARY KEY (`id_theme`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`id_theme`, `label_theme`) VALUES
(1, 'mathématiques');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `login_user`, `mdp_user`, `role_user`, `email_user`) VALUES
(1, 'test', 'test', 'prof', 'prof@prof.fr'),
(2, 'etu', 'etu', 'etu', 'etu@etu.fr');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
