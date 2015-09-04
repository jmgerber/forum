-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 04 Septembre 2015 à 14:04
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
(27, 'C''est super !\nHello ! 333\nHey', '2015-09-03 08:42:11', 4, 1, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Contenu de la table `tchat`
--

INSERT INTO `tchat` (`id`, `message`, `date`, `id_auteur`) VALUES
(1, 'Bonjour et bienvenue sur le chat !', '2015-08-04 22:00:00', 1),
(2, 'Super, un chat sur le forum.', '2015-08-18 22:00:00', 2),
(3, 'Ici les gens sont dythirambiques.', '2015-08-25 22:00:00', 5),
(4, 'C''est pas faux !', '2015-08-29 22:00:00', 3),
(5, 'Bonjour c\\''est jeudi', '2015-09-03 08:16:11', 4),
(20, 'aaaa', '2015-09-03 14:24:32', 1),
(21, 'aaaa', '2015-09-03 14:25:39', 1),
(22, 'aaaa', '2015-09-03 14:26:48', 1),
(23, 'aaaaaaaa', '2015-09-03 14:27:36', 1),
(24, 'bbbbb', '2015-09-03 14:28:47', 1),
(25, 'aaaa', '2015-09-03 14:29:07', 1),
(26, 'ccccccc', '2015-09-03 14:29:48', 1),
(27, 'aaa', '2015-09-03 14:30:38', 1),
(28, 'saa', '2015-09-03 14:35:23', 1),
(29, 'sss', '2015-09-03 14:46:06', 1),
(30, 'dede', '2015-09-03 14:51:15', 1),
(31, 'sasa', '2015-09-03 14:51:50', 1),
(32, 'sasa', '2015-09-03 15:00:09', 1),
(33, 'Salut', '2015-09-04 07:01:13', 1),
(34, 'sasa', '2015-09-04 07:02:18', 1),
(35, 'sasa', '2015-09-04 07:02:20', 1),
(36, 'Salut', '2015-09-04 07:02:47', 1),
(37, 'salut', '2015-09-04 07:03:08', 1),
(38, 'sasa', '2015-09-04 07:13:03', 1),
(39, 'sasa', '2015-09-04 07:16:56', 1),
(40, 'de', '2015-09-04 07:17:11', 1),
(41, 'sasa', '2015-09-04 07:19:16', 1),
(42, 'sasa', '2015-09-04 07:46:12', 1),
(43, 'sasa', '2015-09-04 07:48:20', 1),
(44, 'sasa', '2015-09-04 07:55:03', 1),
(45, 'lolo', '2015-09-04 07:56:14', 1),
(46, 'lolo', '2015-09-04 07:56:42', 1),
(47, 'sasa', '2015-09-04 08:03:16', 1),
(48, 'sasa', '2015-09-04 08:42:16', 1),
(49, 'Salut', '2015-09-04 09:53:25', 1),
(50, 'yo', '2015-09-04 09:53:49', 1),
(51, 'Salut', '2015-09-04 09:54:15', 1),
(52, 'Salut', '2015-09-04 09:54:16', 1),
(53, 'kiki', '2015-09-04 10:24:42', 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
(1, 'admin', 'admin@free.fr', '$2y$11$z14THfhNjm.I5gMpUK4PReTi8gjqRCh/BxPHk/ORNuUOPAQZPF9zS', 'http://www.twofeetunder.fr/wp-content/uploads/2014/08/american_dad_001.jpg', 1),
(2, 'gigi', 'gigi@gmail.com', '$2y$10$wlVcU3rIWxegATkTUR9wVe1u/u9e9FBLTqci1wyxvaH2hrfoDSVAi', 'img/avatar2.jpg', 0),
(3, 'fafa', 'fafa@gogo.fr', '$2y$10$VmEqdR07R53vKNYUpQ5AG.PBKruIfIyyNfacnaNzKkPlEtbax7TkG', 'img/avatar3.jpg', 2),
(4, 'toto', 'toto@ducon.fr', '$2y$10$AwSZd/7n1EzvJpirlLG83.HAoB2KpsgYdUERF6U/sewmVSagwqQ0G', 'img/avatar4.jpg', 0),
(5, 'alien', 'alien@mars.fr', '$2y$10$BNYOjInKxHx0q7twjO0kQePfH8GA2Ylaz3sEC9NTHevjGxJg1djoS', 'img/avatar5.jpg', 2);

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
