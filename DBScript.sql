-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : hi5bu.myd.infomaniak.com
-- Généré le :  mer. 01 avr. 2020 à 12:43
-- Version du serveur :  5.7.27-log
-- Version de PHP :  7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hi5bu_bulletins`
--

-- --------------------------------------------------------

--
-- Structure de la table `Domain`
--

CREATE TABLE `Domain` (
  `Domain_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text,
  `Color` varchar(7) NOT NULL DEFAULT '#FFFFFF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Skill`
--

CREATE TABLE `Skill` (
  `Skill_ID` int(11) NOT NULL,
  `Subdomain_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Code` int(11) NOT NULL,
  `Trimester` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `SkillAcquire`
--

CREATE TABLE `SkillAcquire` (
  `SkillAcq_ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  `Skill_ID` int(11) NOT NULL,
  `Trimester` int(11) NOT NULL,
  `Note` varchar(255) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Student`
--

CREATE TABLE `Student` (
  `Student_ID` int(11) NOT NULL,
  `Teacher_ID` int(11) NOT NULL,
  `Name` varchar(63) NOT NULL,
  `Frist_Name` varchar(63) NOT NULL,
  `Avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Subdomain`
--

CREATE TABLE `Subdomain` (
  `Subdomain_ID` int(11) NOT NULL,
  `Domain_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text,
  `Code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Teacher`
--

CREATE TABLE `Teacher` (
  `Teacher_ID` int(11) NOT NULL,
  `Name` varchar(63) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Passwd` varchar(255) NOT NULL,
  `Avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Domain`
--
ALTER TABLE `Domain`
  ADD PRIMARY KEY (`Domain_ID`);

--
-- Index pour la table `Skill`
--
ALTER TABLE `Skill`
  ADD PRIMARY KEY (`Skill_ID`),
  ADD UNIQUE KEY `Code` (`Code`),
  ADD KEY `FK_Subdomain` (`Subdomain_ID`);

--
-- Index pour la table `SkillAcquire`
--
ALTER TABLE `SkillAcquire`
  ADD PRIMARY KEY (`SkillAcq_ID`),
  ADD KEY `FK_Skill` (`Skill_ID`),
  ADD KEY `FK_Student` (`Student_ID`);

--
-- Index pour la table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`Student_ID`),
  ADD KEY `FK_Teacher` (`Teacher_ID`);

--
-- Index pour la table `Subdomain`
--
ALTER TABLE `Subdomain`
  ADD PRIMARY KEY (`Subdomain_ID`),
  ADD UNIQUE KEY `Code` (`Code`),
  ADD KEY `FK_Domain` (`Domain_ID`);

--
-- Index pour la table `Teacher`
--
ALTER TABLE `Teacher`
  ADD PRIMARY KEY (`Teacher_ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Domain`
--
ALTER TABLE `Domain`
  MODIFY `Domain_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Skill`
--
ALTER TABLE `Skill`
  MODIFY `Skill_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `SkillAcquire`
--
ALTER TABLE `SkillAcquire`
  MODIFY `SkillAcq_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Student`
--
ALTER TABLE `Student`
  MODIFY `Student_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Subdomain`
--
ALTER TABLE `Subdomain`
  MODIFY `Subdomain_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Teacher`
--
ALTER TABLE `Teacher`
  MODIFY `Teacher_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Skill`
--
ALTER TABLE `Skill`
  ADD CONSTRAINT `FK_Subdomain` FOREIGN KEY (`Subdomain_ID`) REFERENCES `Subdomain` (`Subdomain_ID`);

--
-- Contraintes pour la table `SkillAcquire`
--
ALTER TABLE `SkillAcquire`
  ADD CONSTRAINT `FK_Skill` FOREIGN KEY (`Skill_ID`) REFERENCES `Skill` (`Skill_ID`),
  ADD CONSTRAINT `FK_Student` FOREIGN KEY (`Student_ID`) REFERENCES `Student` (`Student_ID`);

--
-- Contraintes pour la table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `FK_Teacher` FOREIGN KEY (`Teacher_ID`) REFERENCES `Teacher` (`Teacher_ID`);

--
-- Contraintes pour la table `Subdomain`
--
ALTER TABLE `Subdomain`
  ADD CONSTRAINT `FK_Domain` FOREIGN KEY (`Domain_ID`) REFERENCES `Domain` (`Domain_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
