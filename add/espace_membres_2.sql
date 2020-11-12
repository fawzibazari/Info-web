-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 10 sep. 2020 à 19:43
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `espace_membres`
--

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `idFormation` int(255) NOT NULL,
  `nomFormation` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `environnementF` varchar(255) NOT NULL,
  `nbHeuresF` varchar(255) NOT NULL,
  `img` varchar(2550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`idFormation`, `nomFormation`, `description`, `environnementF`, `nbHeuresF`, `img`) VALUES
(1, 'dd', 'ddd', 'dddd', '123', ''),
(55, 'ddddd', 'dddddd', 'dddd', '123', '');

-- --------------------------------------------------------

--
-- Structure de la table `ip_location`
--

CREATE TABLE `ip_location` (
  `sl_no` int(11) NOT NULL,
  `statusCode` varchar(300) NOT NULL,
  `ipAddress` varchar(300) NOT NULL,
  `countryCode` varchar(300) NOT NULL,
  `countryName` varchar(300) NOT NULL,
  `regionName` varchar(300) NOT NULL,
  `zipCode` varchar(300) NOT NULL,
  `latitude` varchar(300) NOT NULL,
  `longitude` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` text NOT NULL,
  `confirmkey` varchar(255) NOT NULL,
  `confirme` int(1) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `uniqid` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mail`, `motdepasse`, `confirmkey`, `confirme`, `avatar`, `uniqid`) VALUES
(6, 'hhh', 'hh@hh.fr', '4493f90157094eb4c0bf171f6caf9cef359f1f03', '65437896270901', 0, '', 5),
(15, 'fawzi', 'kgkg@gmail.com', '$2y$04$kGh4wFz9IIs0hXX/RBHrXeaM6D/tE02v3WopB6ZZ7qgqw0A.ikTaC', '98530601391825', 0, '', 5),
(16, 'gregoire', 'g@q.f', '$2y$04$vd/6gHthEd1r3uU01Pk9euhkEapxpkon79SCzEAs.prLr.YmNg2qq', '39440668006650', 0, '', 5),
(17, 'mec', 'mec@mec.v', '$2y$04$iHzdell8nCKYv4AndVHdCOT4m15S8rCPcfuQ3RR1CiB2BW2P3Ermi', '05292986811327', 1, '', 5),
(18, 'ss', 's@s.s', '$2y$04$F0RR1BXDU8y1d427UWZ1seVQ5PO.GJJl9JK79L4qVeTm9c4nsjJmC', '44509741046476', 0, '', 5),
(19, 'raph', 'r@r.r', '099600a10a944114aac406d136b625fb416dd779', '26486832039382', 0, '', 5),
(20, 'z', 'z@z.z', '099600a10a944114aac406d136b625fb416dd779', '73753481986076', 0, '', 5),
(21, 'tarik', 't@t.t', '099600a10a944114aac406d136b625fb416dd779', '92984231004879', 0, '21.png', 5);

-- --------------------------------------------------------

--
-- Structure de la table `online`
--

CREATE TABLE `online` (
  `id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `user_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `online`
--

INSERT INTO `online` (`id`, `time`, `user_ip`) VALUES
(6, 1599730402, '::1');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `code`) VALUES
(1, 'Laptop Core i5', 600.00, 'product-images/laptop.jpg', 'Laptop01');

-- --------------------------------------------------------

--
-- Structure de la table `recuperation`
--

CREATE TABLE `recuperation` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `statistique`
--

CREATE TABLE `statistique` (
  `id` mediumint(11) UNSIGNED NOT NULL,
  `sessid` varchar(50) NOT NULL,
  `referer` varchar(250) NOT NULL,
  `time` text NOT NULL,
  `parcours` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`idFormation`);

--
-- Index pour la table `ip_location`
--
ALTER TABLE `ip_location`
  ADD PRIMARY KEY (`sl_no`),
  ADD UNIQUE KEY `ipAddress_2` (`ipAddress`),
  ADD UNIQUE KEY `ipAddress_3` (`ipAddress`),
  ADD KEY `ipAddress` (`ipAddress`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`);

--
-- Index pour la table `recuperation`
--
ALTER TABLE `recuperation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `statistique`
--
ALTER TABLE `statistique`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `idFormation` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `recuperation`
--
ALTER TABLE `recuperation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `statistique`
--
ALTER TABLE `statistique`
  MODIFY `id` mediumint(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
