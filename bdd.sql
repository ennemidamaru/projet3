-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 16 mars 2020 à 12:57
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet3`
--

-- --------------------------------------------------------

--
-- Structure de la table `actors`
--

DROP TABLE IF EXISTS `actors`;
CREATE TABLE IF NOT EXISTS `actors` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `logo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `opinion`
--

DROP TABLE IF EXISTS `opinion`;
CREATE TABLE IF NOT EXISTS `opinion` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` smallint(5) UNSIGNED DEFAULT NULL,
  `destination_id` smallint(5) DEFAULT NULL,
  `comments` text NOT NULL,
  `likes` int(1) NOT NULL,
  `dislikes` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`user_id`),
  UNIQUE KEY `id_destination` (`destination_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lastname` varchar(40) DEFAULT NULL,
  `firstname` varchar(40) DEFAULT NULL,
  `username` tinytext,
  `password` varchar(255) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `username`, `password`, `question`, `answer`) VALUES
(1, 'abcd', 'zgezhgzeh', 'test1', '00c8be9bd9d8714890183abf93a9c0d8', 'oazibfoazibfoazf ?', 'ok'),
(2, 'nom2', 'prenom2', 'le2', 'b5b5', 'egezzgzeg ?', 'huh'),
(3, 'nom3', 'prenom3', '333333', 'b5b5', 'ddqzfazgz ?', 'fazgzg'),
(4, 'user4', 'user4', 'user4', '5f4dcc3b5aa765d61d8327deb882cf99', 'question', 'reponse'),
(5, 'aaaaa', 'bbbbb', 'test', '$2y$10$ZRkWTpTKSMpnsScV9Kv4guVjC52Fm4/uhr9IDhW28c3NwfBQOHL5G', 'aaaaa', 'bbbbb'),
(6, NULL, NULL, 'damn', '$2y$10$.ZG6PH36/P3PxtoGTK1fJusLrrksVosq4NcubME.EwzGk0s2e3a6q', NULL, NULL),
(7, 'zeg', 'rhgzehzeh', 'testfin', '$2y$10$2Pp/dD1mX9qfM/bTn8mYg.q5lvpp5MO2Uzz1yPYIqdJWRcHLnrN6a', 'zeg', 'gez');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `opinion`
--
ALTER TABLE `opinion`
  ADD CONSTRAINT `FK_opinion_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
