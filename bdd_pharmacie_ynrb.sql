-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 03 mai 2021 à 18:39
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pharmacie ynrb`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `Identifiant` int(5) NOT NULL,
  `Nom` text NOT NULL,
  `Sécurité` int(10) NOT NULL,
  `Téléphone` int(10) NOT NULL,
  `Adresse` text NOT NULL,
  `Crédits` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`Identifiant`, `Nom`, `Sécurité`, `Téléphone`, `Adresse`, `Crédits`) VALUES
(1, 'NABBAD Yasmine', 2000000001, 672281130, '245 avenue d\'Europe, Colombes', -2.2),
(2, 'BOUMARATE Rayane', 1000000001, 629102637, '55 rue des bourguignons, Paris', 13),
(3, 'YADDAS Maha', 2000000002, 728394018, '666 avenue Anfa, Neuilly-sur-Seine', -3.05),
(4, 'CHERKAOUI ENACIRI Manal', 2000000003, 126739027, '99 rue des fleurs, Courbevoie', -20),
(5, 'NABBAD Rayan', 1000000002, 652817290, '9 boulevard George Ponpidou, Paris', 50),
(6, 'TIJANI Lobna', 2000000004, 627351075, '31 rue Julien Gilbert, Asnières-sur-Seine', -8.05),
(7, 'MASSOUD Inès', 2000000005, 692874894, '31 rue Victor Hugo, Romainville', -3.25),
(8, 'LEMERCIER Camille', 2000000006, 727693497, '31 rue Julien Gilbert, Asnières-sur-Seine', 0),
(9, 'MOTTIER Tristan', 1000000003, 627771075, '9 rue Gilbert Jeune, Paris', 0),
(10, 'PEYRICHOUT Florian', 1000000004, 682702787, '25 avenue Georges Pompidou, Evry', 0),
(11, 'MATHIEU Quentin', 1000000005, 618782920, '91 rue Souliprane, Evry', 4.75),
(12, 'LOPEZ Maria', 2000000008, 672178209, '25 boulevard Juliette Montaigue', 0),
(13, 'LOCOST Damien', 1000000006, 719829378, '278 avenue Jean Peylit', 0);

-- --------------------------------------------------------

--
-- Structure de la table `médicaments`
--

CREATE TABLE `médicaments` (
  `Midentifiant` int(5) NOT NULL,
  `Nom` text NOT NULL,
  `Expire` date NOT NULL,
  `Prix` double NOT NULL,
  `Stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `médicaments`
--

INSERT INTO `médicaments` (`Midentifiant`, `Nom`, `Expire`, `Prix`, `Stock`) VALUES
(0, 'N ', '0000-00-00', 0, 0),
(1, 'ABACAVIR SANDOZ 300 mg', '2021-04-22', 115.5, 10),
(2, 'DOLIPRANE 1000 mg', '2021-08-18', 1.95, 0),
(3, 'IBUPROFENE ALMUS 400 mg', '2021-04-12', 2.57, 5),
(4, 'IBUPROFENE ARROW 400 mg', '2021-03-10', 3.09, 10),
(5, 'DONORMYL 15 mg', '2021-04-29', 3.24, 10),
(6, 'ALVITYL MAGNESIUM VITAMIN B6', '2021-05-11', 3.9, 0),
(7, 'ADVIL 400 mg', '2021-06-30', 4.2, 4),
(8, 'DOLIPRANE 500 mg', '2021-07-29', 2.56, 30),
(9, 'SMECTA 3 g', '2022-06-15', 2.3, 0),
(10, 'ALVITYL MAGNESIUM VITAMIN B9', '2021-05-28', 4, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`Identifiant`);

--
-- Index pour la table `médicaments`
--
ALTER TABLE `médicaments`
  ADD PRIMARY KEY (`Midentifiant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
