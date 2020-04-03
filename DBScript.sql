-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  ven. 03 avr. 2020 à 08:00
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

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
-- Structure de la table `domain`
--

DROP TABLE IF EXISTS `domain`;
CREATE TABLE IF NOT EXISTS `domain` (
  `Domain_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Description` text,
  `Color` varchar(7) NOT NULL DEFAULT '#FFFFFF',
  PRIMARY KEY (`Domain_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `domain`
--

INSERT INTO `domain` (`Domain_ID`, `Name`, `Description`, `Color`) VALUES
(3, 'Apprendre ensemble pour vivre ensemble', NULL, '#FFFFFF');

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

DROP TABLE IF EXISTS `skill`;
CREATE TABLE IF NOT EXISTS `skill` (
  `Skill_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Domain_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Code` int(11) DEFAULT NULL,
  `Trimester` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  PRIMARY KEY (`Skill_ID`),
  UNIQUE KEY `Code` (`Code`),
  KEY `FK_Domain` (`Domain_ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `skill`
--

INSERT INTO `skill` (`Skill_ID`, `Domain_ID`, `Name`, `Code`, `Trimester`, `Image`) VALUES
(6, 3, 'Je pose mon manteau à mon crochet', 1, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png');

-- --------------------------------------------------------

--
-- Structure de la table `skillacquire`
--

DROP TABLE IF EXISTS `skillacquire`;
CREATE TABLE IF NOT EXISTS `skillacquire` (
  `SkillAcq_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Student_ID` int(11) NOT NULL,
  `Skill_ID` int(11) NOT NULL,
  `ObsDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Note` varchar(255) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`SkillAcq_ID`),
  KEY `FK_Skill` (`Skill_ID`),
  KEY `FK_Student` (`Student_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `skillacquire`
--

INSERT INTO `skillacquire` (`SkillAcq_ID`, `Student_ID`, `Skill_ID`, `ObsDate`, `Note`, `Status`) VALUES
(1, 27, 6, '2020-04-03 09:48:30', 'Quentin y arrive très bien', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Teacher_ID` int(11) DEFAULT NULL,
  `Name` varchar(63) NOT NULL,
  `Frist_Name` varchar(63) NOT NULL,
  `Avatar` varchar(255) DEFAULT NULL,
  `Login` varchar(100) NOT NULL,
  `Password` varchar(64) NOT NULL,
  PRIMARY KEY (`User_ID`),
  KEY `FK_Teacher` (`Teacher_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`User_ID`, `Teacher_ID`, `Name`, `Frist_Name`, `Avatar`, `Login`, `Password`) VALUES
(2, NULL, 'de Potter', 'Blandine', 'https://cdn.pixabay.com/photo/2018/04/18/18/56/user-3331256__340.png', 'blandine', '$2y$10$MAntk6mStcWUX9yVRlZ26uKM49wP.Zl8fVwOEN.xfkv8z6XIASl32'),
(27, 2, 'de Potter', 'Quentin', 'https://images.radio-canada.ca/q_auto,w_1250/v1/ici-info/16x9/eleve-primaire-hausse-ontario.jpg', 'eleve', '$2y$10$MAntk6mStcWUX9yVRlZ26uKM49wP.Zl8fVwOEN.xfkv8z6XIASl32');

-- --------------------------------------------------------

--
-- Structure de la vue `v_skillacquire`
--
CREATE VIEW `v_skillacquire` AS
select `s`.`Skill_ID` AS `Skill_ID`,`sa`.`Student_ID` AS `Student_ID`,`s`.`Code` AS `Code`,`s`.`Name` AS `Name`,`s`.`Image` AS `Image`,`s`.`Trimester` AS `Trimester`,`s`.`Domain_ID` AS `Domain_ID`,`sa`.`Note` AS `Note`,`sa`.`Status` AS `Status`,`sa`.`ObsDate` AS `ObsDate` from `skill` `s` natural join `skillacquire` `sa` ;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `FK_Domain` FOREIGN KEY (`Domain_ID`) REFERENCES `domain` (`Domain_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `skillacquire`
--
ALTER TABLE `skillacquire`
  ADD CONSTRAINT `FK_Skill` FOREIGN KEY (`Skill_ID`) REFERENCES `skill` (`Skill_ID`),
  ADD CONSTRAINT `FK_Student` FOREIGN KEY (`Student_ID`) REFERENCES `user` (`User_ID`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_Teacher` FOREIGN KEY (`Teacher_ID`) REFERENCES `user` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
