-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 20 mai 2023 à 20:52
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
  `ID` int(11) NOT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `Prénom` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `MotDePasse` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etdmodule`
--

CREATE TABLE `etdmodule` (
  `ID` int(11) NOT NULL,
  `ID_Étudiant` int(11) DEFAULT NULL,
  `ID_Module` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE `modules` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `ID` int(11) NOT NULL,
  `ID_Évaluation` int(11) DEFAULT NULL,
  `ID_Étudiant` int(11) DEFAULT NULL,
  `Valeur` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `étudiants`
--

CREATE TABLE `étudiants` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `Prénom` varchar(100) DEFAULT NULL,
  `Adresse` varchar(200) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Téléphone` varchar(20) DEFAULT NULL,
  `mot_de_passe` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `évaluations`
--

CREATE TABLE `évaluations` (
  `ID` int(11) NOT NULL,
  `Type` varchar(100) DEFAULT NULL,
  `ID_Module` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Heure` time DEFAULT NULL,
  `Salle` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `etdmodule`
--
ALTER TABLE `etdmodule`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Étudiant` (`ID_Étudiant`),
  ADD KEY `ID_Module` (`ID_Module`);

--
-- Index pour la table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Évaluation` (`ID_Évaluation`),
  ADD KEY `ID_Étudiant` (`ID_Étudiant`);

--
-- Index pour la table `étudiants`
--
ALTER TABLE `étudiants`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `évaluations`
--
ALTER TABLE `évaluations`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Module` (`ID_Module`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etdmodule`
--
ALTER TABLE `etdmodule`
  ADD CONSTRAINT `etdmodule_ibfk_1` FOREIGN KEY (`ID_Étudiant`) REFERENCES `étudiants` (`ID`),
  ADD CONSTRAINT `etdmodule_ibfk_2` FOREIGN KEY (`ID_Module`) REFERENCES `modules` (`ID`);

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`ID_Évaluation`) REFERENCES `évaluations` (`ID`),
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`ID_Étudiant`) REFERENCES `étudiants` (`ID`);

--
-- Contraintes pour la table `évaluations`
--
ALTER TABLE `évaluations`
  ADD CONSTRAINT `évaluations_ibfk_1` FOREIGN KEY (`ID_Module`) REFERENCES `modules` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
