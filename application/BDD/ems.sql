-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 30 déc. 2020 à 09:19
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ems`
--
CREATE DATABASE IF NOT EXISTS `ems` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ems`;

-- --------------------------------------------------------

--
-- Structure de la table `expense_reports`
--

DROP TABLE IF EXISTS `expense_reports`;
CREATE TABLE IF NOT EXISTS `expense_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` varchar(65) NOT NULL,
  `image` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `state` varchar(255) NOT NULL DEFAULT 'En cours',
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `expense_reports`
--

INSERT INTO `expense_reports` (`id`, `price`, `image`, `comment`, `id_user`, `state`, `date`) VALUES
(3, '25€', 'mmm', 'qqq', 2, 'refuser', '2020-12-23'),
(4, '30€', 'ppp', 'qqq', 1, 'valider', '2020-12-24'),
(7, '15€', 'ggg', 'www', 2, 'Valider', '2020-12-26'),
(8, '18€', 'ggg', 'qqq', 1, 'En cours', '2020-12-26'),
(9, '35€', 'ooo', 'sup', 2, 'En cours', '2020-12-26'),
(11, '25€', 'gggooo', 'sup', 1, 'En cours', '2020-12-29');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `password`, `email`, `rank`) VALUES
(1, 'Fauvel', 'Grégory', '123456', 'fauvel411@gmail.com', '1\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$12$vZCSX3GQCKtX00mrRFWDxe2dYacK5.MZk27Tx0ltM.J.n1EiIPFiq'),
(2, 'kiki', '$2y$12$mRx0rUJDAoDXz/xUWNgpOejOt2HNNCRwcEItqnmr9TLIPjUulS4Pu'),
(3, 'momo', '$2y$12$WRO0K763sONt9wGdtyOt3.RF4xiiDj0AL0dS7IghF/WKvmWLL5fHu'),
(4, 'thalassante', '$2y$12$pMT4WxN4Im7h2..uZLsGhugPl57u7aSJiHBs1KGrsXNWoimP39M5G');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
