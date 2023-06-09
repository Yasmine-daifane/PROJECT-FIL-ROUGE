-- phpMyAdmin SQL Dump

-- version 5.2.0

-- https://www.phpmyadmin.net/

--

-- Hôte : 127.0.0.1

-- Généré le : mar. 09 mai 2023 à 23:21

-- Version du serveur : 10.4.27-MariaDB

-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Base de données : `prototype-fil-rouge`

--

-- --------------------------------------------------------

--

-- Structure de la table `project`

--
CREATE TABLE client(
   Id_client INT AUTO_INCREMENT,
   nom VARCHAR(100) NOT NULL,
   email VARCHAR(200) NOT NULL,
   password VARCHAR(1000) NOT NULL,
   PRIMARY KEY(Id_client)
);

-- Déchargement des données de la table `project`

CREATE TABLE services(
   Id_srvice INT AUTO_INCREMENT,
   type VARCHAR(500) NOT NULL,
   price INT NOT NULL,
   nom VARCHAR(200) NOT NULL,
   Id_client INT NOT NULL,
   PRIMARY KEY(Id_srvice),
   FOREIGN KEY(Id_client) REFERENCES client(Id_client)
);
