-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 25 mai 2023 à 13:39
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_platforme_scolaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `login`, `mot_de_passe`) VALUES
(1, 'Admin', 'Admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `affectation_etudiant_module`
--

CREATE TABLE `affectation_etudiant_module` (
  `id` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_module` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `affectation_etudiant_module`
--

INSERT INTO `affectation_etudiant_module` (`id`, `id_etudiant`, `id_module`) VALUES
(27, 3, 1),
(28, 3, 2),
(29, 3, 3),
(30, 3, 5),
(31, 3, 6),
(32, 3, 7),
(63, 1, 1),
(64, 1, 2),
(65, 1, 3),
(66, 1, 6),
(67, 1, 7),
(68, 1, 9),
(113, 2, 2),
(114, 2, 3),
(115, 2, 5),
(116, 2, 6),
(117, 2, 8),
(118, 2, 12);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `adresse`, `email`, `telephone`, `mot_de_passe`) VALUES
(1, 'Benmamoun', 'Nassim', 'Rabat', 'nassim@gmail.com', '0612345678', 'password1'),
(2, 'Essabri', 'Fatima Zahrae', 'Meknes', 'fatimazahrae@gmail.com', '0623456789', 'password2'),
(3, 'Chentoui', 'Abdelali', 'Meknes', 'abdelali@gmail.com', '0634567890', 'password3');

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `id_module` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `salle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evaluation`
--

INSERT INTO `evaluation` (`id`, `type`, `id_module`, `date`, `heure`, `salle`) VALUES
(9, 'Projet', 1, '2023-11-11', '10:10:00', 'A'),
(10, 'Projet', 2, '2023-11-11', '11:10:00', 'A'),
(12, 'Devoirs', 1, '2023-05-25', '00:30:00', 'S3'),
(13, 'Examens', 1, '2023-06-03', '05:30:00', 'S7'),
(14, 'Devoirs', 2, '2023-06-11', '15:00:00', 'S20'),
(15, 'Examens', 2, '2023-06-07', '09:00:00', 'S15');

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `modules` (`id`, `nom`, `description`) VALUES
(1, 'JavaScript', 'Cours de JavaScript'),
(2, 'PHP', 'Cours de PHP'),
(3, 'ENGLISH', 'Cours de ENGLISH'),
(5, 'Mathématiques', 'Cours de mathématiques'),
(6, 'JEE', 'Cours de frameworks de JEE'),
(7, 'PYTHON', 'Cours de PYTHON'),
(8, 'c#', 'Cours de c#'),
(9, 'Français', 'Cours de français'),
(11, 'gestion de projet', 'cours de gestion de projet'),
(12, 'Java', 'Programmation Java'),
(13, 'controle de gestion', 'Cours de marketing');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `id_evaluation` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `valeur` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `id_evaluation`, `id_etudiant`, `valeur`) VALUES
(4, 9, 1, '20'),
(5, 9, 3, '20'),
(6, 9, 2, '20'),
(7, 10, 1, '20'),
(13, 10, 3, '20'),
(14, 15, 1, '20'),
(15, 14, 1, '20');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `affectation_etudiant_module`
--
ALTER TABLE `affectation_etudiant_module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_etudiant` (`id_etudiant`),
  ADD KEY `fk_id_mod` (`id_module`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_module` (`id_module`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_etd` (`id_etudiant`),
  ADD KEY `fk_id_eval` (`id_evaluation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `affectation_etudiant_module`
--
ALTER TABLE `affectation_etudiant_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affectation_etudiant_module`
--
ALTER TABLE `affectation_etudiant_module`
  ADD CONSTRAINT `fk_id_etudiant` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_mod` FOREIGN KEY (`id_module`) REFERENCES `modules` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `fk_id_module` FOREIGN KEY (`id_module`) REFERENCES `modules` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `fk_id_etd` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_eval` FOREIGN KEY (`id_evaluation`) REFERENCES `evaluation` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
