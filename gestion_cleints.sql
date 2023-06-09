-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 15 mai 2023 à 17:59
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `prototype-fil-rouge`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `Id_client` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client`  (`Id_client`, `nom`, `email`, `password`) VALUES
(1, 'mamado', 'mamado@gmail.com', '$2y$10$xYRniXHynSgPB55wBunuK.jamz87QKPUp7711gTr.tCDfV6nGK6A2'),
(2, 'kamila', 'kamila@gmail.com', '$2y$10$AyEUZk7MZW4q/MESDbb5..hVLy61v3tXXkKzg5sEadFhUZ2L7vxpm'),
(3, 'oranos', 'oranos@gmail.com', '$2y$10$MuF3MOn0Y7yyC0zpDlBrSesZ10EXAD4TABBq0qvwCtuooqKo2RUTq'),
(4, 'hicham', 'hicham@gmail.com', '$2y$10$Z1Tll36CX2EdDEJh9fcMIO69/lavgNTpO9B.54NlKOmsGM6Ful2EC'),
(5, 'yasin', 'yasin@gmail.com', '$2y$10$LjS0XMxWLSEraLlv1UsSTukEtHX3c56XcUJs6OcFSaqcBuNdj9Vee'),
(6, 'chiha', 'chiha@gmail.com', '$2y$10$w/aSWMXoWVb5Tbjtqa7CzucfEMgMDHk.YJq99tGHW5xmiILR4pXvO'),
(7, 'talib', 'talib@gmail.com', '$2y$10$qH7EjjYSigJ8msum5Jx.ZuApct6WFEIMkkoMb1GkOiITcYUFwGB.e'),
(8, 'jamal', 'jamal@gmail.com', '$2y$10$AZ6YQvrgnC/KbF.HQ7k81.Edbn4W8brsY/W3TbUhF4n5Zw1fxO0L2'),
(9, 'milodi', 'milodi@gmail.com', '$2y$10$u8SbYN7Pubo1gp4PodBuwOrN1/njz1v4kExA5N2RDrdoq7mVqoYXC'),
(10, 'nano', 'milodi@gmail.com', '$2y$10$Mbd3zHX3q/d5rlA2qaoBLub9L/Zbobf8Bsphhd9EKxnk7SpLvVHYa'),
(11, 'jamal', 'jamal@gmail.com', '$2y$10$hXIpvZGHMjwfau8/HpJBKuxbRfQ2uadvgzMDKWs5VnsaIpt0Mm6fW'),
(12, 'ploma', 'ploma@gmail.com', '$2y$10$fCsUouoYLUNFfRZEuW.i1u8BRtD3M7XlHLBOiazTnbBKBwcg78enu'),
(13, 'tiji', 'tiji@gmail.com', '$2y$10$sEASqal4gW5VUYpOqTi8ru2dX4tzItTvnPTtwA1XcVKJ42SiZCzZe'),
(14, 'naomi', 'naomi@gmail.com', '$2y$10$1cQEZd4ka/qTblfelhMCeOV.Q/1PiBbg62r57MgB8BbAPHbWqcjZG'),
(15, '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `Id_srvice` int(11) NOT NULL,
  `type` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `Id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`Id_srvice`, `type`, `price`, `nom`, `Id_client`) VALUES
(1, 'sell', 34, 'hfhhhf', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`Id_client`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`Id_srvice`),
  ADD KEY `Id_client` (`Id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `Id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `Id_srvice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`Id_client`) REFERENCES `client` (`Id_client`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
