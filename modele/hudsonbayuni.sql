-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 10 mars 2025 à 17:13
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
-- Base de données : `hudsonbayuni`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `mise_en_avant` tinyint(1) NOT NULL DEFAULT 0,
  `collection` varchar(255) NOT NULL,
  `couleur` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `genre` enum('homme','femme','uni-sexe') NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `prix`, `mise_en_avant`, `collection`, `couleur`, `image`, `genre`, `categorie`, `description`) VALUES
(1, 'T-Shirt Hudson Bay University', 30.00, 1, 'Hudson', 'noir', 'tshirt_hudson_bay_gris.png', 'homme', 'T-shirt', 'Un t-shirt confortable et stylé aux couleurs de l\"université Hudson Bay. Conçu en coton bio.'),
(2, 'T-Shirt Hudson Bay University', 45.00, 1, 'Hudson', 'noir', 'tshirt_hudson_bay_noir.png', 'homme', 'T-shirt', 'Un t-shirt premium fabriqué avec des matériaux éco-responsables, idéal pour un look casual.'),
(3, 'T-Shirt Hudson Bay University', 40.00, 1, 'Hudson', 'gris', 'tshirt_hudson_bay_gris_2.png', 'homme', 'T-shirt', 'Découvrez le T-shirt Hudson Bay University en gris, édition 2025. Fabriqué en coton bio et conçu pour offrir un confort optimal tout au long de la journée. Un choix idéal pour un look décontracté et moderne.');

-- --------------------------------------------------------

--
-- Structure de la table `produits_tailles`
--

CREATE TABLE `produits_tailles` (
  `produit_id` int(11) NOT NULL,
  `taille_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `produits_tailles`
--

INSERT INTO `produits_tailles` (`produit_id`, `taille_id`, `quantite`) VALUES
(1, 1, 0),
(1, 2, 9),
(1, 3, 10),
(1, 4, 20),
(2, 2, 40),
(2, 3, 35),
(2, 5, 25),
(3, 1, 0),
(3, 2, 0),
(3, 3, 0),
(3, 4, 0),
(3, 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `profil_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prénom` varchar(255) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `telephone` varchar(10) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `jours_entrainements` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tailles`
--

CREATE TABLE `tailles` (
  `id` int(11) NOT NULL,
  `taille` enum('S','M','L','XL','XXL') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `tailles`
--

INSERT INTO `tailles` (`id`, `taille`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `compte_admin` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `identifiant` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `motdepasse` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `compte_admin`, `identifiant`, `motdepasse`) VALUES
(1, 'Y', 'admin1', '$2y$10$hsiMxdXvp/IriNBB29U/nOaG3S4TZ6Nc/3B.LrIpKAMMWEkJyjM5m');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits_tailles`
--
ALTER TABLE `produits_tailles`
  ADD PRIMARY KEY (`produit_id`,`taille_id`),
  ADD KEY `taille_id` (`taille_id`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`profil_id`),
  ADD KEY `fk_utilisateur` (`utilisateur_id`);

--
-- Index pour la table `tailles`
--
ALTER TABLE `tailles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `profil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tailles`
--
ALTER TABLE `tailles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produits_tailles`
--
ALTER TABLE `produits_tailles`
  ADD CONSTRAINT `produits_tailles_ibfk_1` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produits_tailles_ibfk_2` FOREIGN KEY (`taille_id`) REFERENCES `tailles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `fk_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
