-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 12 déc. 2024 à 16:57
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- 
-- Base de données : `hudsonbayuni`
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `produits`
-- 

CREATE TABLE `produits` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nom` VARCHAR(255) NOT NULL,
  `prix` DECIMAL(10,2) NOT NULL,
  `mise_en_avant` TINYINT(1) NOT NULL DEFAULT 0,
  `collection` VARCHAR(255) NOT NULL,
  `couleur` VARCHAR(100) NOT NULL,
  `image` VARCHAR(100) NOT NULL, 
  `genre` ENUM('homme', 'femme', 'uni-sexe') NOT NULL,
  `categorie` VARCHAR(100) NOT NULL,  
  `description` TEXT NOT NULL        
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

-- 
-- Déchargement des données de la table `produits`
-- 

INSERT INTO `produits` (`id`, `nom`, `prix`, `mise_en_avant`, `collection`, `couleur`, `image`, `genre`, `categorie`, `description`) VALUES
(1, 'T-Shirt Hudson Bay University', 45.00, 1, 'Hudson', 'noir', 'tshirt_hudson_bay_gris.png', 'homme', 'T-shirt', 'Un t-shirt confortable et stylé aux couleurs de l\"université Hudson Bay. Conçu en coton bio.'),
(2, 'T-Shirt Hudson Bay University', 45.00, 1, 'Hudson', 'noir', 'tshirt_hudson_bay_noir.png', 'homme', 'T-shirt', 'Un t-shirt premium fabriqué avec des matériaux éco-responsables, idéal pour un look casual.'),
(3, 'T-Shirt Hudson Bay University', 40.00, 1, 'Hudson', 'gris', 'tshirt_hudson_bay_gris_2.png', 'homme', 'T-shirt', 'Découvrez le T-shirt Hudson Bay University en gris, édition 2025. Fabriqué en coton bio et conçu pour offrir un confort optimal tout au long de la journée. Un choix idéal pour un look décontracté et moderne.');

-- --------------------------------------------------------

-- 
-- Structure de la table `tailles` pour gérer les tailles des produits
-- 

CREATE TABLE `tailles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `taille` ENUM('S', 'M', 'L', 'XL', 'XXL') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

-- 
-- Déchargement des données de la table `tailles`
-- 

INSERT INTO `tailles` (`taille`) VALUES
('S'),
('M'),
('L'),
('XL'),
('XXL');

-- --------------------------------------------------------

-- 
-- Structure de la table `produits_tailles` pour lier les tailles aux produits
-- 

CREATE TABLE `produits_tailles` (
  `produit_id` INT(11) NOT NULL,
  `taille_id` INT(11) NOT NULL,
  `quantite` INT(11) NOT NULL DEFAULT 0,  -- Optionnel : pour gérer le stock de chaque taille
  PRIMARY KEY (`produit_id`, `taille_id`),
  FOREIGN KEY (`produit_id`) REFERENCES `produits`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`taille_id`) REFERENCES `tailles`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

-- 
-- Déchargement des données de la table `produits_tailles`
-- 

INSERT INTO `produits_tailles` (`produit_id`, `taille_id`, `quantite`) VALUES
(1, 1, 0),
(1, 2, 9),  -- Taille M, stock de 9 unités
(1, 3, 10),  -- Taille L, stock de 10 unités
(1, 4, 20),  -- Taille XL, stock de 20 unités
(2, 2, 40),  -- Taille M, stock de 40 unités
(2, 3, 35),  -- Taille L, stock de 35 unités
(2, 5, 25),  -- Taille XXL, stock de 25 unités
(3, 1, 0),  
(3, 2, 0),  
(3, 3, 0),  
(3, 4, 0),  
(3, 5, 0);  

-- --------------------------------------------------------

-- 
-- Structure de la table `utilisateurs`
-- 

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `compte_admin` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `identifiant` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `motdepasse` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- 
-- Déchargement des données de la table `utilisateurs`
-- 

INSERT INTO `utilisateurs` (`id`, `compte_admin`, `identifiant`, `motdepasse`) VALUES
(1, 'N', 'ngapeth', '$2y$10$rwZz//to9AX28TqROEzPi.Os/9WHxXhzn8EIYhPqzr9Vz9LnNRH1e');

-- --------------------------------------------------------

-- 
-- Structure de la table `profil`
-- 

CREATE TABLE `profil` (
  `profil_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `utilisateur_id` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prénom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_naissance` DATE,
  `telephone` varchar(10) NOT NULL, 
  /* VARCHAR CAR SINON, IL PREND PAS LE ZERO DE LA BASE DE DONNEES */
  `adresse` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `jours_entrainements` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bio` TEXT,
  CONSTRAINT `fk_utilisateur`
  FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs`(`id`)
  ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Déchargement des données de la table `profil`
-- 

INSERT INTO `profil` (`profil_id`, `utilisateur_id`, `nom`, `prénom`) VALUES
(1, 1, 'Hervin', 'Ngapeth');

-- 
-- AUTO_INCREMENT pour les tables déchargées
-- 

ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

ALTER TABLE `profil`
  MODIFY `profil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

COMMIT;
