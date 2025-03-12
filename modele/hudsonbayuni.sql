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
(1, 'T-Shirt Hudson Bay University', 30.00, 1, 'Hudson', 'noir', 'tshirt_hudson_bay_gris.png', 'homme', 'T-shirt', 'Un t-shirt confortable et stylé aux couleurs de l’université Hudson Bay. Conçu en coton bio.'),
(2, 'T-Shirt Hudson Bay University', 45.00, 1, 'Hudson', 'noir', 'tshirt_hudson_bay_noir.png', 'homme', 'T-shirt', 'Un t-shirt premium fabriqué avec des matériaux éco-responsables, idéal pour un look casual.'),
(3, 'T-Shirt Hudson Bay University', 40.00, 1, 'Hudson', 'gris', 'tshirt_hudson_bay_gris_2.png', 'homme', 'T-shirt', 'Découvrez le T-shirt Hudson Bay University en gris, édition 2025. Fabriqué en coton bio et conçu pour offrir un confort optimal tout au long de la journée. Un choix idéal pour un look décontracté et moderne.');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `categories` varchar(100) NOT NULL,
  `txt_1` text NOT NULL,
  `txt_2` text NOT NULL,
  `txt_3` text NOT NULL,
  `mise_en_avant` varchar(1) NOT NULL,
  `date` varchar(100) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `description`, `image`, `auteur`, `categories`, `txt_1`, `txt_2`, `txt_3`, `mise_en_avant`, `date`) VALUES
(1, 'Cérémonie de remise des diplômes 2025', 'L’Université Hudson Bay se prépare à célébrer la réussite de ses étudiants avec une cérémonie de remise des diplômes inoubliable. Les familles, amis et professeurs seront réunis pour applaudir les nouveaux diplômés.', 'vue/assets/actualites/diplomes.jpg', 'Université Hudson Bay', 'Événement', '', '', '', '0', '2025-06-15'),

(2, 'Conférence sur l’intelligence artificielle et l’avenir du numérique', 'Le département d’informatique organise une conférence exceptionnelle sur l’IA et son impact sur le futur du numérique. Des experts de renommée mondiale viendront partager leur expertise.', 'vue/assets/actualites/ia.jpg', 'Département d’Informatique', 'Conférence', '', '', '', '0', '2025-04-10'),

(3, 'Tournoi interuniversitaire de basketball', 'L’équipe des Hudson Bay Falcons affrontera les meilleures équipes universitaires de la région lors du tournoi annuel. Venez nombreux pour encourager nos joueurs !', 'vue/assets/actualites/basketball.jpg', 'Service des sports', 'Sport', '', '', '', '1', '2025-03-25'),

(4, 'Lancement du programme de mentorat étudiant', 'L’université met en place un programme de mentorat pour aider les étudiants à s’orienter et à réussir leurs études. Les inscriptions sont ouvertes dès maintenant !', 'vue/assets/actualites/mentorat.jpg', 'Service d’Orientation', 'Éducation', '', '', '', '1', '2025-05-01'),

(5, 'Journée de l’environnement : L’Université Hudson Bay s’engage !', 'Dans le cadre de la Journée de la Terre, l’université organise une grande opération de nettoyage et de sensibilisation à l’écologie. Ateliers, conférences et activités collaboratives seront au programme. Rejoignez-nous pour faire la différence !', 'vue/assets/actualites/environnement.jpg', 'Club Écologie', 'Écologie', '', '', '', '1', '2025-04-22'),

(6, 'Festival culturel : découvrez les talents du campus', 'Musique, danse, théâtre et expositions… Le Festival culturel de l’Université Hudson Bay met en lumière les talents de nos étudiants. Un moment festif et créatif à ne pas manquer !', 'vue/assets/actualites/culture.jpg', 'Faculté des Arts', 'Culture', '', '', '', '0', '2025-06-05');


-- --------------------------------------------------------

-- --
-- -- Structure de la table `cursus`
-- --

-- CREATE TABLE `cursus` (
--   `id` int(11) NOT NULL,
--   `nom` varchar(255) NOT NULL,
--   `description` text NOT NULL,
--   `txt_1` text NOT NULL,
--   `txt_2` text NOT NULL,
--   `txt_3` text NOT NULL,
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --
-- -- Déchargement des données de la table `produits`
-- --

-- INSERT INTO `produits` (``) VALUES


-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

CREATE TABLE `administration` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `metiers` varchar(255) NOT NULL,
  `titre_honorifique` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `administration`
--

INSERT INTO `administration` (`id`, `nom`, `prenom`, `image`, `metiers`, `titre_honorifique`) VALUES
(1, 'Snyder', 'Chrystian', 'vue/assets/images/Snyder.PNG', 'Président de l’Université', ''),
(2, 'Carter', 'Olivia', 'vue/assets/universite/perso1.jpeg', 'Vice-présidente Académique', 'Dr.'),
(3, 'Baker', 'Jonathan', 'vue/assets/universite/perso5.jpeg', 'Doyen - Faculté des Lettres', 'Dr.'),
(4, 'Watson', 'Emily', 'vue/assets/universite/perso8.jpeg', 'Responsable du département de Littérature', 'Prof.'),
(5, 'Collins', 'Richard', 'vue/assets/universite/perso10.jpeg', 'Responsable du département de Philosophie', 'Prof.'),
(6, 'Bennett', 'Sophia', 'vue/assets/universite/perso11.jpeg', 'Responsable du département d’Histoire', 'Prof.'),
(7, 'Harris', 'Benjamin', 'vue/assets/universite/perso12.jpeg', 'Doyen - Faculté de Médecine', 'Dr.'),
(8, 'Mitchell', 'Laura', 'vue/assets/universite/perso2.jpeg', 'Responsable du département de Chirurgie', 'Dr.'),
(9, 'Reed', 'Thomas', 'vue/assets/universite/perso7.jpeg', 'Responsable du département de Neurologie', 'Dr.'),
(10, 'Foster', 'Hannah', 'vue/assets/universite/perso9.jpeg', 'Responsable du département de Biologie Médicale', 'Dr.'),
(11, 'Parker', 'Daniel', 'vue/assets/universite/perso14.jpeg', 'Doyen - Faculté d’Ingénierie', 'Dr.'),
(12, 'Evans', 'Lucas', 'vue/assets/universite/perso17.jpeg', 'Responsable du département d’Informatique', 'Prof.'),
(13, 'Wright', 'Samuel', 'vue/assets/universite/perso16.jpeg', 'Responsable du département de Génie Civil', 'Prof.'),
(14, 'Adams', 'Victoria', 'vue/assets/universite/perso15.jpeg', 'Doyenne - Faculté Business', 'Dr.'),
(15, 'Scott', 'Nathan', 'vue/assets/universite/perso18.jpeg', 'Responsable du département de Finance', 'Prof.'),
(16, 'Turner', 'Jessica', 'vue/assets/universite/perso13.jpeg', 'Responsable du département de Marketing', 'Prof.'),
(17, 'Carter', 'Michael', 'vue/assets/universite/perso20.jpeg', 'Responsable du département d’Entrepreneuriat', 'Prof.'),
(18, 'Clarke', 'Isabella', 'vue/assets/universite/perso19.jpeg', 'Doyenne - Faculté des Arts', 'Dr.'),
(19, 'Brooks', 'Oliver', 'vue/assets/universite/perso21.jpeg', 'Responsable du département d’Arts Visuels', 'Prof.'),
(20, 'White', 'Charlotte', 'vue/assets/universite/perso22.jpeg', 'Responsable du département de Théâtre', 'Prof.'),
(21, 'Young', 'Henry', 'vue/assets/universite/perso25.jpeg', 'Responsable du département de Musique', 'Prof.'),
(22, 'Robinson', 'Matthew', 'vue/assets/universite/perso26.jpeg', 'Doyen - Faculté des Sciences', 'Dr.'),
(23, 'Tinson', 'Emilie', 'vue/assets/universite/perso24.jpeg', 'Responsable du département de Mathématiques', 'Prof.'),
(24, 'Cooper', 'Emma', 'vue/assets/universite/perso23.jpeg', 'Responsable du département de Physique', 'Prof.'),
(25, 'Martinez', 'David', 'vue/assets/universite/perso27.jpeg', 'Responsable du département de Biologie', 'Prof.'),
(26, 'Lewis', 'Katherine', 'vue/assets/universite/perso28.jpeg', 'Vice-présidente Administrative', 'Dr.'),
(27, 'Hughes', 'Megan', 'vue/assets/universite/perso31.jpeg', 'Directrice des Ressources Humaines', ''),
(28, 'Wilson', 'Robert', 'vue/assets/universite/perso30.jpeg', 'Directeur Financier', ''),
(29, 'Devis', 'Laurent', 'vue/assets/universite/perso29.jpeg', 'Responsable Communication', '');



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
-- Index pour la table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
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
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
