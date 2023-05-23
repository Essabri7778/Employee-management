-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 23 mai 2023 à 23:29
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
(1, 'benmamoun', 'nassim', 'admin', 'admin');

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
(3, 4, 1),
(4, 4, 3),
(5, 4, 4),
(6, 4, 5),
(7, 4, 6),
(8, 4, 7),
(9, 5, 1),
(10, 5, 3),
(11, 5, 4),
(12, 5, 5),
(13, 5, 6),
(14, 5, 7);

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
(1, 'benmamoun', 'hamza', '', 'nassim@gmail.com', '0623124312', 'nassim'),
(4, 'BENMAMOUN', 'hamza', 'rabat', 'said.benmamoun@etu.uae.ac.ma', '0673627313', 'nassim'),
(5, 'essabri', 'fz', 'rabat', 'dede.benmamoun@etu.uae.ac.ma', '0673627313', 'guye');

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
(3, 'Devoirs', 4, '2023-05-03', '13:51:00', 'S13'),
(4, 'Examens', 1, '2023-05-11', '15:56:00', 'S12'),
(5, 'Devoirs', 3, '2023-05-28', '16:52:00', 'S2'),
(6, 'Examens', 5, '2023-05-20', '17:00:00', 'S15'),
(7, 'examen', 3, '2023-05-30', '17:34:39', 'S23'),
(8, 'Examens', 7, '2023-05-03', '02:22:00', 's34');

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
(1, 'JEE', 'SPRING & servlets & Hibernate'),
(3, 'WEB', 'javascript'),
(4, 'gestion de projet', 'comment gérer un projet '),
(5, 'controle de gestion', 'money money'),
(6, 'algo', 'algoooooooooooo'),
(7, 'DB', 'DBBBBBBBB');

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
(1, 3, 5, '16'),
(2, 7, 5, '19'),
(3, 8, 4, '18');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
