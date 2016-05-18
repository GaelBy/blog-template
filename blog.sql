-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 18 Mai 2016 à 16:10
-- Version du serveur: 5.5.47-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(31) NOT NULL,
  `title` varchar(63) NOT NULL,
  `description` varchar(127) NOT NULL,
  `content` varchar(1023) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_article` int(10) unsigned NOT NULL,
  `author` varchar(31) NOT NULL,
  `content` varchar(511) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(31) NOT NULL,
  `email` varchar(63) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(7) NOT NULL DEFAULT 'user' COMMENT 'user ou admin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `date`, `status`) VALUES
(1, 'Gael', 'a.bc@fake.com', '6f57f5d7e5d32efc66f7ef71d6b65aa8418cdd2e', '2016-05-18 14:01:25', 'admin'),
(2, 'Arteast', 'arteast.academy@outlook.com', '9f30faff608f538afe9e716c7384c1dd7305236d', '2016-05-18 14:02:54', 'admin'),
(3, 'Mickwan', 'fake@fake.fake', 'c2c590a2b00217d7c6e8ad58431674ae1db74a81', '2016-05-18 14:03:43', 'admin'),
(4, 'Marlone', 'bertrandmarlone@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2016-05-18 14:05:04', 'admin'),
(5, 'toto', 'toto@toto.to', '45c571a156ddcef41351a713bcddee5ba7e95460', '2016-05-18 14:07:18', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
