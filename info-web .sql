-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 30 sep. 2020 à 11:16
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `info-web`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` text NOT NULL,
  `confirmkey` int(11) NOT NULL,
  `uniqid` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `pseudo`, `mail`, `motdepasse`, `confirmkey`, `uniqid`) VALUES
(5, 'leo', 'leonardlouis509@yahoo.fr', '74fb1cb804ccf1823025b0ee489409f3e6b24687', 2147483647, '0000-00-00'),
(6, 'leonard', 'leonardlouis@yahoo.fr', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2147483647, '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `authentification`
--

CREATE TABLE `authentification` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `confirmkey` varchar(255) NOT NULL,
  `mot-de-passe` text NOT NULL,
  `confirme` int(1) NOT NULL,
  `titre` int(255) NOT NULL,
  `uniqid` datetime NOT NULL DEFAULT current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `n_mdp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `authentification`
--

INSERT INTO `authentification` (`id`, `nom`, `prenom`, `mail`, `confirmkey`, `mot-de-passe`, `confirme`, `titre`, `uniqid`, `created`, `n_mdp`) VALUES
(1, 'John Doe1', '', 'johndoe@example.com', '21099998', 'ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 20, '2020-09-24 14:02:53', '2019-05-08 00:00:00', ''),
(2, 'David Deacon', '', 'daviddeacon@example.com', '21099998', 'ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 21, '2020-09-24 14:02:53', '2019-05-08 00:00:00', ''),
(3, 'Sam White', '', 'samwhite@example.com', '21099998', 'ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 20, '2020-09-24 14:02:53', '2019-05-08 00:00:00', ''),
(4, 'Colin Chaplin', '', 'colinchaplin@example.com', '21099998', 'ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 21, '2020-09-24 14:02:53', '2019-05-08 00:00:00', ''),
(5, 'Ricky Waltz', '', 'rickywaltz@example.com', '21099998', 'ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 22, '2020-09-24 14:02:53', '2019-05-09 00:00:00', ''),
(6, 'Arnold Hall', '', 'arnoldhall@example.com', '21099998', 'ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 21, '2020-09-24 14:02:53', '2019-05-09 00:00:00', ''),
(7, 'Toni Adams', '', 'alvah1981@example.com', '21099998', 'ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 21, '2020-09-24 14:02:53', '2019-05-09 00:00:00', ''),
(8, 'Donald Perry', '', 'donald1983@example.com', '21099998', 'ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 21, '2020-09-24 14:02:53', '2019-05-09 00:00:00', ''),
(9, 'Joe McKinney', '', 'nadia.doole0@example.com', '21099998', 'ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1...', 0, 22, '2020-09-24 14:02:53', '2019-05-09 00:00:00', ''),
(10, 'Angela Horst', '', 'angela1977@example.com', '21099998', 'ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 21, '2020-09-24 14:02:53', '2019-05-09 00:00:00', ''),
(11, 'James Jameson', '', 'james1965@example.com', '21099998', 'ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 22, '2020-09-24 14:02:53', '2019-05-09 00:00:00', ''),
(12, 'Daniel Deacon', '', 'danieldeacon@example.com', '21099998', 'ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 22, '2020-09-24 14:02:53', '2019-05-09 00:00:00', ''),
(13, 'Alain', '', 'csa@gmail.com', '21099998', 'ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, 21, '2020-09-24 14:02:53', '2020-06-23 00:00:00', ''),
(56, 'leo', '', 'l.louis@outlook.fr', '21301829', 'ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V411aa3d74a1d0db668f9350f98cb6f62ed5f57ae', 1, 21, '2020-09-18 16:59:43', '2020-09-18 16:59:43', ''),
(57, 'leonard', 'louis', 'leonardlouis509@yahoo.fr', '21099998', 'ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1V40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 22, '2020-09-18 20:53:51', '2020-09-18 20:53:51', ''),
(58, 'legrand', 'louis', 'exodelouis43@gmail.com', '49732697', 'ODCZi3yYNNo&list=PLiItfFtbus3Dq0IueYp8XJOkWXwDW7K1Vca6640556458446d21c64414acb480095e25507f', 1, 20, '2020-09-23 10:02:26', '2020-09-23 10:02:26', '');

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

CREATE TABLE `formateur` (
  `idFormarteur` int(255) NOT NULL,
  `photoF` varchar(255) NOT NULL,
  `dateF` int(255) NOT NULL,
  `cvF` varchar(255) NOT NULL,
  `domaineF` varchar(255) NOT NULL,
  `keys-word` varchar(255) NOT NULL,
  `type` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `idCo` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formateur`
--

INSERT INTO `formateur` (`idFormarteur`, `photoF`, `dateF`, `cvF`, `domaineF`, `keys-word`, `type`, `username`, `idCo`) VALUES
(24, 'happy-client-3.jpg', 10, 'DP leonard.pdf', 'web développement', '21099998', 22, 'leonardlouis509@yahoo.fr', 0);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `idFormation` int(255) NOT NULL,
  `nomFormation` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `environnementF` text NOT NULL,
  `NHeuresF` varchar(255) NOT NULL,
  `photoF` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`idFormation`, `nomFormation`, `description`, `environnementF`, `NHeuresF`, `photoF`, `username`) VALUES
(98, 'MÉTIERS DU WEBDESIGN Envie de vous former au webdesign ? Vous êtes à la fois créatif et attiré par les métiers du web ? Alors découvrez toutes nos formations au webdesign et devenez un véritable professionnel de la création web et du graphisme.', 'WEBDESIGN : ÉMERGENCE DE NOUVEAUX MÉTIERS\r\nLe webdesign recouvre toutes les étapes de la création d\'un site web. C\'est une adaptation des techniques du design appliquées à l\'univers du numérique. De l\'architecture à l\'arborescence, en passant par la navigation et le graphisme, le webdesigner doit être capable de créer une identité visuelle et de mettre en valeur l\'image d\'une marque. Tempérament créatif doublé d\'une réelle compétence en informatique, il conçoit l\'identité d\'un site en prenant en compte toutes les dimensions techniques. Depuis quelques années, l\'UX designer et l\'UI designer sont deux profils très recherchés. Alors que le premier est un véritable professionnel de l\'expérience utilisateur, le second est un spécialiste de l\'interface. Ils sont capables de concevoir des site web qui répondent aux besoins des utilisateurs. Deux métiers complémentaires qui ont vu le jour depuis l\'avènement des smartphones et des tablettes. Si vous êtes intéressé par les métiers du webdesign , découvrez notre offre de formations dans ce secteur.', 'TOUTES NOS FORMATIONS EN WEBDESIGN Accessibles au niveau Bachelor, nos cursus en webdesign vous formeront aux métiers de webdesigner, d\'UX designer et d\'UI designer . Vous avez la possibilité de vous former en alternance ou en formation continue, en fonction de votre profil et de vos expériences. Les métiers du webdesign sont des profils recherchés par les entreprises et les startups. Grâce à nos formations diplômantes, vous trouverez rapidement un poste dès votre sortie de formation. Après avoir suivi les enseignements communs, vous aurez la possibilité de choisir votre spécialisation en vous orientant vers le CMS, la publication web, l\'intégration graphique ou encore l\'ergonomie web. Tout au long de votre cursus, vous serez accompagnés par une équipe pédagogique et des consultants professionnels qui vous aideront à affiner votre projet. Pour en savoir plus sur le contenu de nos formations, n\'hésitez pas à contacter les équipes de la Infoweb', '8000', 'our-team-2.jpg', 'leonardlouis509@yahoo.fr');

-- --------------------------------------------------------

--
-- Structure de la table `intervenant`
--

CREATE TABLE `intervenant` (
  `idIntervenant` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `keys-word` varchar(255) NOT NULL,
  `domaine` text NOT NULL,
  `dateI` int(255) NOT NULL,
  `photoI` varchar(255) NOT NULL,
  `cvI` varchar(255) NOT NULL,
  `idCo` int(255) NOT NULL,
  `type` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `intervenant`
--

INSERT INTO `intervenant` (`idIntervenant`, `username`, `keys-word`, `domaine`, `dateI`, `photoI`, `cvI`, `idCo`, `type`) VALUES
(33, 'l.louis@outlook.fr', '21301829', 'web développement', 19, 'alternance-digital.jpg', 'message (2).txt', 0, 21);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `nomP` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `descriptionP` text NOT NULL,
  `environnementP` text NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `NHeuresP` varchar(255) NOT NULL,
  `titreP` varchar(255) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `nomP`, `username`, `descriptionP`, `environnementP`, `price`, `image`, `NHeuresP`, `titreP`, `created`) VALUES
(111, 'Assistance comptable', 'exodelouis43@gmail.com', '', '', 0, '3a1840950f.png', '', '', '2020-09-30');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(255) NOT NULL,
  `nomP` varchar(255) NOT NULL,
  `descriptionP` text NOT NULL,
  `environnementP` text NOT NULL,
  `NHeuresP` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `image` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id`, `nomP`, `descriptionP`, `environnementP`, `NHeuresP`, `price`, `image`, `username`, `created`) VALUES
(518, 'Assistance comptable', '', '', '', 0, 'c59905e0c1.png', 'leonardlouis509@yahoo.fr', '2020-09-29'),
(519, 'Assistance comptable', '', '', '', 0, '3a1840950f.png', 'leonardlouis509@yahoo.fr', '2020-09-29');

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire`
--

CREATE TABLE `stagiaire` (
  `idStagiaire` int(255) NOT NULL,
  `keys-word` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `motivation` text NOT NULL,
  `idCo` varchar(255) NOT NULL,
  `idFormation` varchar(255) NOT NULL,
  `idProjet` int(255) NOT NULL,
  `type` int(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stagiaire`
--

INSERT INTO `stagiaire` (`idStagiaire`, `keys-word`, `telephone`, `age`, `images`, `cv`, `motivation`, `idCo`, `idFormation`, `idProjet`, `type`, `username`) VALUES
(69, '49732697', '0775709526', '10', 'happy.jpg', '', '', '', '', 0, 20, 'exodelouis43@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `titre`
--

CREATE TABLE `titre` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `titre`
--

INSERT INTO `titre` (`id`, `nom`) VALUES
(20, 'Stagiaire'),
(21, 'Intervenant'),
(22, 'Formateur ');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `authentification`
--
ALTER TABLE `authentification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`titre`);

--
-- Index pour la table `formateur`
--
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`idFormarteur`),
  ADD KEY `idCo` (`idCo`),
  ADD KEY `type` (`type`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`idFormation`);

--
-- Index pour la table `intervenant`
--
ALTER TABLE `intervenant`
  ADD PRIMARY KEY (`idIntervenant`),
  ADD KEY `idCo` (`idCo`),
  ADD KEY `type` (`type`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD PRIMARY KEY (`idStagiaire`),
  ADD KEY `idProjet` (`idProjet`),
  ADD KEY `type` (`type`);

--
-- Index pour la table `titre`
--
ALTER TABLE `titre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `authentification`
--
ALTER TABLE `authentification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `formateur`
--
ALTER TABLE `formateur`
  MODIFY `idFormarteur` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `idFormation` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT pour la table `intervenant`
--
ALTER TABLE `intervenant`
  MODIFY `idIntervenant` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=523;

--
-- AUTO_INCREMENT pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  MODIFY `idStagiaire` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `titre`
--
ALTER TABLE `titre`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `authentification`
--
ALTER TABLE `authentification`
  ADD CONSTRAINT `authentification_ibfk_1` FOREIGN KEY (`titre`) REFERENCES `titre` (`id`);

--
-- Contraintes pour la table `formateur`
--
ALTER TABLE `formateur`
  ADD CONSTRAINT `formateur_ibfk_2` FOREIGN KEY (`type`) REFERENCES `titre` (`id`);

--
-- Contraintes pour la table `intervenant`
--
ALTER TABLE `intervenant`
  ADD CONSTRAINT `intervenant_ibfk_2` FOREIGN KEY (`type`) REFERENCES `titre` (`id`);

--
-- Contraintes pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD CONSTRAINT `stagiaire_ibfk_3` FOREIGN KEY (`type`) REFERENCES `titre` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
