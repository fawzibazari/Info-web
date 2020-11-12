-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 11 sep. 2020 à 11:18
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
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `authentification`
--

INSERT INTO `authentification` (`id`, `nom`, `prenom`, `mail`, `confirmkey`, `mot-de-passe`, `confirme`, `titre`, `uniqid`, `created`) VALUES
(43, 'mike', 'louis', 'exodelouis43@gmail.com', '79814209', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 20, '2020-09-08 15:31:28', '2020-09-08 15:31:28'),
(46, 'legrand', 'fawzi', 'l.louis@outlook.fr', '53952222', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 21, '2020-09-08 16:58:46', '2020-09-08 16:58:46'),
(47, 'legrand', 'louis', 'leonardlouis509@yahoo.fr', '06794115', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 22, '2020-09-08 17:00:43', '2020-09-08 17:00:43');

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
(21, '', 0, '', '', '86449687', 22, 'leonardlouis509@yahoo.fr', 0),
(22, '', 0, '', '', '06794115', 22, 'leonardlouis509@yahoo.fr', 0);

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
  `photoF` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`idFormation`, `nomFormation`, `description`, `environnementF`, `nbHeuresF`, `photoF`) VALUES
(75, 'DÉVELOPPEUR WEB MOBILE', 'Le développeur d’application mobile possède une expertise poussée en environnement et en développement mobile. Sa mission principale est de concevoir pour ses clients des applications, des sites web ou des jeux destinés exclusivement aux supports mobiles, il choisit la bonne solution technique en fonction du projet : il peut s’agir de la version mobile d’un site Internet ou d’une véritable application consultable sur smartphone et/ou tablette. Pour ce faire il analyse le cahier des charges du chef de projet avec qui il travaille en étroite collaboration. De plus, il peut aussi se charger de la maintenance ou de la création de nouvelles fonctionnalités de l’application.', 'Le développeur mobile possède généralement un diplôme de niveau bac+3 à bac+5. Actuellement, les formations en développement mobile sont encore rares, même si des spécialisations se développent au sein des cursus de programmeur web. Les écoles supérieures', '500', ''),
(76, 'DÉVELOPPEUR WEB ET MOBILE', 'ubuyfètyfytyycvyv', '', '', '');

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
(28, 'l.louis@outlook.fr', '64545224', '', 0, '', '', 0, 21);

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
  `image` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id`, `nomP`, `descriptionP`, `environnementP`, `NHeuresP`, `price`, `image`, `username`, `created`) VALUES
(111, 'LES MÉTIERS DU DIGITAL', ' jbyvuy', ' Le web regroupe divers champs dans lesquels sont regroupés une multitude de métiers spécialisés :Le marketing digital : comprenant le SEO (référencement naturel), le SEA (référencement payant), le SMO (optimisation des réseaux sociaux), le Display (l’achat d’espaces publicitaires sur le web). Le but est d’améliorer la visibilté de la marque sur le web.Le développement et programmation web : Maitrise des langages de programmation liée au web : développement Mobile ou Web, full stack, front end, back end, HTML, JS, PHP, NodeJS, python, ruby…', '5000', 55, '', 'leonardlouis509@yahoo.fr', '2020-09-08'),
(112, 'LES MÉTIERS DU DIGITAL lj', ' Le monde du web et du digital en général, abonde de multiples disciplines. Si vous pensez effectuer une formation supérieure dans le digital, il est important de bien s’orienter et choisir le domaine qui vous ressemble. Du développeur web au chef de projet webmarketing et du consultant SEO au directeur artistique il y a des gaps importants. Il est courant d’entendre : « tu travailles dans l’informatique en fait » lorsque l’on vous demande quel est votre métier. Ces réactions minimalistes prouvent une fois de plus qu’il y a une réelle méconnaissance du grand public des métiers du web de toutes les professions liées au digital. En effet, ces métiers du web présentent tous des spécifications. Les uns seront plutôt centrés sur le code et le développement d’application web ou mobile et la technique en général. D’autres seront centrés sur la promotion de l’offre et de la marque ou sur la création artistique. Le but est de savoir si vous avez un penchant pour la technique, la création, ou plus pour le webmarketing et la gestion de projet. Il est donc primordial de bien connaitre les diverses professions liées à l’environnement digital, ainsi que les champs d’intervention. Le but est de se poser les bonnes questions et faire le choix d’une spécialité. C’est pourquoi notre école du digital vous propose, un glossaire des métiers du digital, afin de vous aiguiller dans votre choix de formation digitale à Paris.', ' Le web regroupe divers champs dans lesquels sont regroupés une multitude de métiers spécialisés :\r\n\r\nLe marketing digital : comprenant le SEO (référencement naturel), le SEA (référencement payant), le SMO (optimisation des réseaux sociaux), le Display (l’achat d’espaces publicitaires sur le web). Le but est d’améliorer la visibilté de la marque sur le web.\r\nLe développement et programmation web : Maitrise des langages de programmation liée au web : développement Mobile ou Web, full stack, front end, back end, HTML, JS, PHP, NodeJS, python, ruby…', '200', 555, 'leo.jpg', 'leonardlouis509@yahoo.fr', '2020-09-08');

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
(63, '72818877', '79814209', '11', '', '', 'kioio', '', 'DÉVELOPPEUR WEB MOBILE', 0, 20, 'exodelouis43@gmail.com');

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
-- AUTO_INCREMENT pour la table `authentification`
--
ALTER TABLE `authentification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `formateur`
--
ALTER TABLE `formateur`
  MODIFY `idFormarteur` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `idFormation` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `intervenant`
--
ALTER TABLE `intervenant`
  MODIFY `idIntervenant` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  MODIFY `idStagiaire` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
