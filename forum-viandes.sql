-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 07 Septembre 2015 à 11:01
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
  `ban_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(5, 'Agneau'),
(3, 'Boeuf'),
(7, 'Cheval'),
(20, 'Gibiers'),
(23, 'Humain'),
(9, 'Kangourou'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `contenu`, `date`, `id_auteur`, `id_topic`, `signalement`) VALUES
(3, 'C''est super ce sujet de discussion.\r\n', '2015-09-01 14:15:33', 3, 1, 4),
(26, 'Un nouveau message aha c''est cool.', '2015-09-02 14:06:46', 1, 1, 2),
(27, 'C''est super !\nHello ! 333\nHey\n!!!!', '2015-09-03 08:42:11', 4, 1, 0),
(30, 'C''est super', '2015-09-03 09:57:35', 1, 1, 0),
(32, 'Nouvelle recette Ã  venir !', '2015-09-04 12:41:47', 3, 1, 4),
(43, 'Je ne fais pas confiance aux anglais aprÃ¨s la crise de la vache folle.', '2015-09-04 14:02:39', 2, 7, 0),
(46, 'Moi non plus ! C''est bien vrai !', '2015-09-04 14:07:45', 2, 7, 0),
(48, 'Il a fait couler beaucoup d''encre.', '2015-09-04 14:11:29', 2, 12, 1),
(49, 'Je suis bien d''accord. En plus, c''est une espÃ¨ce en voie de disparition.', '2015-09-07 08:53:35', 6, 13, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `tchat`
--

INSERT INTO `tchat` (`id`, `message`, `date`, `id_auteur`) VALUES
(1, 'Bonjour et bienvenue sur le chat !', '2015-08-04 22:00:00', 1),
(2, 'Super, un chat sur le forum.', '2015-08-18 22:00:00', 2),
(3, 'Ici les gens sont dythirambiques.', '2015-08-25 22:00:00', 5),
(4, 'C''est pas faux !', '2015-08-29 22:00:00', 3),
(5, 'Bonjour c\\''est jeudi', '2015-09-03 08:16:11', 4),
(13, 'Coucou', '2015-09-03 12:18:18', 1),
(14, 'C''est pas faux', '2015-09-04 14:20:34', 1),
(15, 'C''est pas faux', '2015-09-04 14:20:37', 1),
(16, 'Hello', '2015-09-04 14:30:53', 1),
(17, 'Hello', '2015-09-04 14:32:43', 1),
(18, 'fqsfdsqfqs', '2015-09-04 14:33:48', 1),
(19, 'ftyy', '2015-09-04 14:34:33', 1),
(20, 'aaaa', '2015-09-04 14:36:24', 1),
(21, 'aaaa', '2015-09-04 14:37:43', 1),
(22, 'aaaa', '2015-09-04 14:38:06', 1),
(23, 'aaaa', '2015-09-04 14:40:35', 1),
(24, 'bbbbbbbbbb', '2015-09-04 14:41:10', 1),
(25, 'ccccc', '2015-09-04 14:41:34', 1),
(26, 'cccccddddd', '2015-09-04 14:41:36', 1),
(27, 'eeeeeeee', '2015-09-04 14:41:38', 1),
(28, 'toto', '2015-09-04 14:43:28', 4),
(29, 'eeeeeeee', '2015-09-04 14:43:31', 1),
(30, 'eeeeeeee', '2015-09-04 14:43:44', 1),
(31, 'bonjour toto :)', '2015-09-04 14:44:05', 1),
(32, 'dddd', '2015-09-04 14:46:02', 1),
(33, 'fqsfsqd', '2015-09-04 14:52:07', 1),
(34, 'je suis content', '2015-09-04 14:52:30', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `topics`
--

INSERT INTO `topics` (`id`, `titre`, `date`, `id_auteur`, `id_category`) VALUES
(1, 'Recette avec du boeuf de Kobe', '2015-08-30 22:00:00', 4, 3),
(2, 'Faut-il enlever les plumes avant de faire un poule au pot ?', '2015-08-30 22:00:00', 5, 6),
(3, 'Lancement d''une nouvelle gamme de porc certifié Halal', '2015-08-30 22:00:00', 3, 1),
(4, 'Enfant', '2015-09-03 13:02:09', 3, 23),
(5, 'Adolescent', '2015-09-03 13:02:09', 3, 23),
(6, 'Adulte', '2015-09-03 13:02:48', 3, 23),
(7, 'Agneau franÃ§ais ou anglais', '2015-09-03 13:22:04', 1, 5),
(8, 'Navarin d''agneau', '2015-09-03 14:51:51', 4, 5),
(9, 'Mangez-vous du cheval ?', '2015-09-03 14:52:06', 4, 7),
(12, 'Le scandale de Carcassonne', '2015-09-04 14:11:12', 2, 7),
(13, 'C''est immangeable le kangourou', '2015-09-07 08:53:09', 6, 9);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `email`, `password`, `avatar`, `statut`) VALUES
(1, 'admin', 'admin@free.fr', '$2y$10$wDyM/VWoryMKQYsVQXTWouGurhBVlh/T9KgScSxcfDnfH905eKs0G', 'img/avatar1.jpg', 1),
(2, 'gigi', 'gigi@gmail.com', '$2y$10$wlVcU3rIWxegATkTUR9wVe1u/u9e9FBLTqci1wyxvaH2hrfoDSVAi', 'img/avatar2.jpg', 0),
(3, 'fafa', 'fafa@gogo.fr', '$2y$10$VmEqdR07R53vKNYUpQ5AG.PBKruIfIyyNfacnaNzKkPlEtbax7TkG', 'img/avatar3.jpg', 2),
(4, 'toto', 'toto@ducon.fr', '$2y$10$AwSZd/7n1EzvJpirlLG83.HAoB2KpsgYdUERF6U/sewmVSagwqQ0G', 'img/avatar4.jpg', 0),
(5, 'alien', 'alien@mars.fr', '$2y$10$BNYOjInKxHx0q7twjO0kQePfH8GA2Ylaz3sEC9NTHevjGxJg1djoS', 'img/avatar5.jpg', 2),
(6, 'herve', 'herve@free.fr', '$2y$11$JWMrRFVXqyNoxO4F6f8ADuZOfj03APzz/wXr.B/1amQH/liXrnB6q', 'img/avatar6.jpg', 0);

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
