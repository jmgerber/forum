-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 01 Septembre 2015 à 09:05
-- Version du serveur: 5.5.43-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `forum-viandes`
--

-- --------------------------------------------------------

--
-- Structure de la table `tchat`
--

CREATE TABLE IF NOT EXISTS `tchat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(4096) NOT NULL,
  `date` date NOT NULL,
  `id_auteur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_auteur` (`id_auteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `tchat`
--

INSERT INTO `tchat` (`id`, `message`, `date`, `id_auteur`) VALUES
(1, 'Bonjour et bienvenue sur le chat !', '2015-08-05', 1),
(2, 'Super, un chat sur le forum.', '2015-08-19', 2),
(3, 'Ici les gens sont dythirambiques.', '2015-08-26', 5),
(4, 'C''est pas faux !', '2015-08-30', 3);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tchat`
--
ALTER TABLE `tchat`
  ADD CONSTRAINT `tchat_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
