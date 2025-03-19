-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 17 mars 2025 à 10:40
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sitestage`
--

-- --------------------------------------------------------

--
-- Structure de la table `compteentreprise`
--

CREATE TABLE `compteentreprise` (
  `entreprise_Id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `codePostal` int(11) NOT NULL,
  `site` varchar(50) NOT NULL,
  `motDePasse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compteetudiant`
--

CREATE TABLE `compteetudiant` (
  `etudiant_Id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `classe` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cv` blob NOT NULL,
  `lettreMotivation` blob NOT NULL,
  `motDePasse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `compteprofesseur`
--

CREATE TABLE `compteprofesseur` (
  `prof_Id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `motDePasse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `demandestage`
--

CREATE TABLE `demandestage` (
  `demandeStage_Id` int(11) NOT NULL,
  `dateDeb` date NOT NULL,
  `dateFin` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `etudiant_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `message_Id` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `entreprise_Id` int(11) NOT NULL,
  `etudiant_Id` int(11) NOT NULL,
  `prof_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `offrestage`
--

CREATE TABLE `offrestage` (
  `offreStage_Id` int(11) NOT NULL,
  `dateDeb` date NOT NULL,
  `dateFin` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `entreprise_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

CREATE TABLE `stage` (
  `stage_Id` int(11) NOT NULL,
  `dateDeb` date NOT NULL,
  `dateFin` date NOT NULL,
  `tuteur` varchar(50) NOT NULL,
  `etudiant_Id` int(11) NOT NULL,
  `prof_Id` int(11) NOT NULL,
  `entreprise_Id` int(11) NOT NULL,
  `prof_Id_professeur` int(11) NOT NULL,
  `etudiant_Id_compteEtudiant` int(11) NOT NULL,
  `entreprise_Id_compteEntreprise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compteentreprise`
--
ALTER TABLE `compteentreprise`
  ADD PRIMARY KEY (`entreprise_Id`);

--
-- Index pour la table `compteetudiant`
--
ALTER TABLE `compteetudiant`
  ADD PRIMARY KEY (`etudiant_Id`);

--
-- Index pour la table `compteprofesseur`
--
ALTER TABLE `compteprofesseur`
  ADD PRIMARY KEY (`prof_Id`);

--
-- Index pour la table `demandestage`
--
ALTER TABLE `demandestage`
  ADD PRIMARY KEY (`demandeStage_Id`),
  ADD KEY `demandeStage_compteEtudiant_FK` (`etudiant_Id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_Id`),
  ADD UNIQUE KEY `message_AK` (`entreprise_Id`,`etudiant_Id`,`prof_Id`);

--
-- Index pour la table `offrestage`
--
ALTER TABLE `offrestage`
  ADD PRIMARY KEY (`offreStage_Id`),
  ADD KEY `offreStage_compteEntreprise_FK` (`entreprise_Id`);

--
-- Index pour la table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`stage_Id`),
  ADD UNIQUE KEY `Stage_AK` (`etudiant_Id`,`prof_Id`,`entreprise_Id`),
  ADD KEY `Stage_professeur_FK` (`prof_Id_professeur`),
  ADD KEY `Stage_compteEtudiant0_FK` (`etudiant_Id_compteEtudiant`),
  ADD KEY `Stage_compteEntreprise1_FK` (`entreprise_Id_compteEntreprise`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compteentreprise`
--
ALTER TABLE `compteentreprise`
  MODIFY `entreprise_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compteetudiant`
--
ALTER TABLE `compteetudiant`
  MODIFY `etudiant_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compteprofesseur`
--
ALTER TABLE `compteprofesseur`
  MODIFY `prof_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `demandestage`
--
ALTER TABLE `demandestage`
  MODIFY `demandeStage_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `message_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `offrestage`
--
ALTER TABLE `offrestage`
  MODIFY `offreStage_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stage`
--
ALTER TABLE `stage`
  MODIFY `stage_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `demandestage`
--
ALTER TABLE `demandestage`
  ADD CONSTRAINT `demandeStage_compteEtudiant_FK` FOREIGN KEY (`etudiant_Id`) REFERENCES `compteetudiant` (`etudiant_Id`);

--
-- Contraintes pour la table `offrestage`
--
ALTER TABLE `offrestage`
  ADD CONSTRAINT `offreStage_compteEntreprise_FK` FOREIGN KEY (`entreprise_Id`) REFERENCES `compteentreprise` (`entreprise_Id`);

--
-- Contraintes pour la table `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `Stage_compteEntreprise1_FK` FOREIGN KEY (`entreprise_Id_compteEntreprise`) REFERENCES `compteentreprise` (`entreprise_Id`),
  ADD CONSTRAINT `Stage_compteEtudiant0_FK` FOREIGN KEY (`etudiant_Id_compteEtudiant`) REFERENCES `compteetudiant` (`etudiant_Id`),
  ADD CONSTRAINT `Stage_professeur_FK` FOREIGN KEY (`prof_Id_professeur`) REFERENCES `compteprofesseur` (`prof_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
