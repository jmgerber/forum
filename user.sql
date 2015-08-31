-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 31 Août 2015 à 16:47
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
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(512) NOT NULL,
  `avatar` varchar(512) NOT NULL,
  `statut` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `email`, `password`, `avatar`, `statut`) VALUES
(1, 'admin', 'admin@free.fr', '$2y$10$wDyM/VWoryMKQYsVQXTWouGurhBVlh/T9KgScSxcfDnfH905eKs0G', '/sites/forum/img/avatar1.jpg', 1),
(2, 'gigi', 'gigi@gmail.com', '$2y$10$wlVcU3rIWxegATkTUR9wVe1u/u9e9FBLTqci1wyxvaH2hrfoDSVAi', '/sites/forum/img/avatar2.jpg', 0),
(3, 'fafa', 'fafa@gogo.fr', '$2y$10$VmEqdR07R53vKNYUpQ5AG.PBKruIfIyyNfacnaNzKkPlEtbax7TkG', '/sites/forum/img/avatar3.jpg', 2),
(4, 'toto', 'toto@ducon.fr', '$2y$10$AwSZd/7n1EzvJpirlLG83.HAoB2KpsgYdUERF6U/sewmVSagwqQ0G', '/sites/forum/img/avatar4.jpg', 0),
(5, 'alien', 'alien@mars.fr', '$2y$10$BNYOjInKxHx0q7twjO0kQePfH8GA2Ylaz3sEC9NTHevjGxJg1djoS', '/sites/forum/img/avatar5.jpg', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
