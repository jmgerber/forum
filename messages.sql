-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 03 Septembre 2015 à 10:55
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
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(4096) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_auteur` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `signalement` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_auteur` (`id_auteur`),
  KEY `id_topic` (`id_topic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `contenu`, `date`, `id_auteur`, `id_topic`, `signalement`) VALUES
(2, 'C''est super ce sujet de discussion.\r\n', '2015-09-01 14:15:10', 2, 1, 1),
(3, 'C''est super ce sujet de discussion.\r\n', '2015-09-01 14:15:33', 3, 1, 1),
(26, 'Un nouveau message aha c''est cool.', '2015-09-02 14:06:46', 1, 1, 2),
(27, 'C''est super !\nHello ! 333\nHey\n!!!!', '2015-09-03 08:42:11', 4, 1, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`id_topic`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
