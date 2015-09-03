-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 03 Septembre 2015 à 11:41
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
-- Structure de la table `bannis`
--

CREATE TABLE IF NOT EXISTS `bannis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(5, 'Agneau'),
(3, 'Boeuf'),
(7, 'Cheval'),
(8, 'Lapin'),
(4, 'Mouton'),
(1, 'Porc'),
(2, 'Veau'),
(6, 'Volaille');

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

-- --------------------------------------------------------

--
-- Structure de la table `tchat`
--

CREATE TABLE IF NOT EXISTS `tchat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(4096) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_auteur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_auteur` (`id_auteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `tchat`
--

INSERT INTO `tchat` (`id`, `message`, `date`, `id_auteur`) VALUES
(1, 'Bonjour et bienvenue sur le chat !', '2015-08-04 22:00:00', 1),
(2, 'Super, un chat sur le forum.', '2015-08-18 22:00:00', 2),
(3, 'Ici les gens sont dythirambiques.', '2015-08-25 22:00:00', 5),
(4, 'C''est pas faux !', '2015-08-29 22:00:00', 3),
(5, 'Bonjour c\\''est jeudi', '2015-09-03 08:16:11', 4);

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(512) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_auteur` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_auteur` (`id_auteur`),
  KEY `id_category` (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `topics`
--

INSERT INTO `topics` (`id`, `titre`, `date`, `id_auteur`, `id_category`) VALUES
(1, 'Recette avec du boeuf de Kobe', '2015-08-30 22:00:00', 4, 3),
(2, 'Faut-il enlever les plumes avant de faire un poule au pot ?', '2015-08-30 22:00:00', 5, 6),
(3, 'Lancement d''une nouvelle gamme de porc certifié Halal', '2015-08-30 22:00:00', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(512) NOT NULL,
  `avatar` varchar(512) NOT NULL,
  `statut` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `email`, `password`, `avatar`, `statut`) VALUES
(1, 'admin', 'admin@free.fr', '$2y$10$wDyM/VWoryMKQYsVQXTWouGurhBVlh/T9KgScSxcfDnfH905eKs0G', '/forum/img/avatar1.jpg', 1),
(2, 'gigi', 'gigi@gmail.com', '$2y$10$wlVcU3rIWxegATkTUR9wVe1u/u9e9FBLTqci1wyxvaH2hrfoDSVAi', '/forum/img/avatar2.jpg', 0),
(3, 'fafa', 'fafa@gogo.fr', '$2y$10$VmEqdR07R53vKNYUpQ5AG.PBKruIfIyyNfacnaNzKkPlEtbax7TkG', '/forum/img/avatar3.jpg', 2),
(4, 'toto', 'toto@ducon.fr', '$2y$10$AwSZd/7n1EzvJpirlLG83.HAoB2KpsgYdUERF6U/sewmVSagwqQ0G', '/forum/img/avatar4.jpg', 0),
(5, 'alien', 'alien@mars.fr', '$2y$10$BNYOjInKxHx0q7twjO0kQePfH8GA2Ylaz3sEC9NTHevjGxJg1djoS', '/forum/img/avatar5.jpg', 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `bannis`
--
ALTER TABLE `bannis`
  ADD CONSTRAINT `bannis_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`id_topic`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tchat`
--
ALTER TABLE `tchat`
  ADD CONSTRAINT `tchat_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
