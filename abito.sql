-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 11 mars 2026 à 16:39
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
-- Base de données : `abito`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `ida` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `mdpa` varchar(250) NOT NULL,
  `grade` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idc` int(11) NOT NULL,
  `titrec` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idm` int(11) NOT NULL,
  `datem` date NOT NULL,
  `comment` varchar(250) NOT NULL,
  `idu` int(11) NOT NULL,
  `idp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favori`
--

CREATE TABLE `favori` (
  `idf` int(11) NOT NULL,
  `datef` date NOT NULL,
  `idu` int(11) NOT NULL,
  `idp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idp` int(11) NOT NULL,
  `titrep` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `prix` float NOT NULL,
  `ph1` text NOT NULL,
  `ph2` text NOT NULL,
  `ph3` text NOT NULL,
  `vue` int(11) NOT NULL DEFAULT 0,
  `ville` varchar(50) NOT NULL,
  `datep` date NOT NULL,
  `disp` varchar(3) NOT NULL DEFAULT 'oui',
  `idu` int(11) NOT NULL,
  `idc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idu` int(11) NOT NULL,
  `nomu` varchar(50) NOT NULL,
  `emailu` varchar(250) NOT NULL,
  `mdpu` varchar(250) NOT NULL,
  `telu` varchar(20) NOT NULL,
  `activation` int(11) NOT NULL DEFAULT 1,
  `signaler` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ida`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idc`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idm`),
  ADD KEY `idu` (`idu`,`idp`),
  ADD KEY `idp` (`idp`);

--
-- Index pour la table `favori`
--
ALTER TABLE `favori`
  ADD PRIMARY KEY (`idf`),
  ADD KEY `idu` (`idu`),
  ADD KEY `idp` (`idp`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idp`),
  ADD KEY `idu` (`idu`),
  ADD KEY `idc` (`idc`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idu`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `ida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `favori`
--
ALTER TABLE `favori`
  MODIFY `idf` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`idp`) REFERENCES `produit` (`idp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`idu`) REFERENCES `utilisateur` (`idu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `favori`
--
ALTER TABLE `favori`
  ADD CONSTRAINT `favori_ibfk_1` FOREIGN KEY (`idp`) REFERENCES `produit` (`idp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favori_ibfk_2` FOREIGN KEY (`idu`) REFERENCES `utilisateur` (`idu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idc`) REFERENCES `categorie` (`idc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`idu`) REFERENCES `utilisateur` (`idu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
