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
(3, 'T-Shirt Hudson Bay University', 40.00, 1, 'Hudson', 'gris', 'tshirt_hudson_bay_gris_2.png', 'homme', 'T-shirt', 'Découvrez le T-shirt Hudson Bay University en gris, édition 2025. Fabriqué en coton bio et conçu pour offrir un confort optimal tout au long de la journée. Un choix idéal pour un look décontracté et moderne.'),
(4, 'Bonnet Hudson Bay Jaune', 25.00, 0, 'Hudson', 'jaune', 'bonnet_hudson_jaune.png', 'homme', 'Bonnet', 'Un bonnet confortable de la collection Hudson Bay. Disponible en jaune, parfait pour un look casual et moderne.'),
(5, 'Bonnet Skyhawks Nation Orange', 20.00, 0, 'Skyhawks', 'orange', 'bonnet_skyhawks_orange.png', 'homme', 'Bonnet', 'Le bonnet Skyhawks Nation en orange, un choix idéal pour garder votre tête au chaud tout en affichant vos couleurs.'),
(6, 'Bonnet Skyhawks Nation Noir', 20.00, 0, 'Skyhawks', 'noir', 'bonnet_skyhawks_noir.png', 'homme', 'Bonnet', 'Bonnet Skyhawks Nation en noir, pour un style discret mais audacieux. Confort et chaleur garantis.'),
(7, 'T-Shirt Hudson Skyhawks Orange', 35.00, 0, 'Hudson Skyhawks', 'orange', 'tshirt_skyhawks_orange.png', 'homme', 'T-shirt', 'Un t-shirt dynamique avec le logo des Hudson Skyhawks. Parfait pour un look décontracté et sport.'),
(8, 'Sweat Hudson Bleu', 50.00, 0, 'Hudson', 'bleu', 'hudson_hoodie_bleu.png', 'homme', 'Sweat', 'Un sweat bleu Hudson Bay en coton bio, idéal pour les journées fraîches tout en restant stylé.'),
(9, 'Sweat Hudson Noir', 50.00, 0, 'Hudson', 'noir', 'hudson_hoodie_noir.png', 'homme', 'Sweat', 'Le sweat Hudson en noir, un incontournable de la collection Hudson Bay, confortable et élégant.'),
(10, 'T-Shirt Skyhawks Nation Gris', 30.00, 0, 'Skyhawks', 'gris', 'tshirt_skyhawks_nation_gris.png', 'homme', 'T-shirt', 'T-shirt de la collection Skyhawks Nation, en gris. Conçu pour les fans du style décontracté et sportif.');
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
(1, 'Cérémonie de remise des diplômes 2025', 'L’Université Hudson Bay se prépare à célébrer la réussite de ses étudiants avec une cérémonie de remise des diplômes inoubliable. Les familles, amis et professeurs seront réunis pour applaudir les nouveaux diplômés.', 'vue/assets/actualites/diplomes.jpg', 'Université Hudson Bay', 'Événement', 'L’Université Hudson Bay est fière d’annoncer sa traditionnelle cérémonie de remise des diplômes. Cet événement tant attendu marque la fin du parcours universitaire pour de nombreux étudiants et représente un moment chargé d’émotion pour les diplômés, leurs familles et leurs professeurs. Chaque promotion est mise à lhonneur avec des discours inspirants et des remises de diplômes solennelles.', 'La cérémonie se déroulera dans l’auditorium principal de l’université, décoré pour l’occasion. Des interventions spéciales de professeurs et d’anciens étudiants sont prévues afin d’encourager les nouveaux diplômés dans leur futur parcours professionnel. La remise des diplômes sera suivie d’une séance photo officielle, permettant aux étudiants de conserver un souvenir impérissable de cet événement.', 'Un cocktail de célébration sera offert à la fin de la cérémonie, où diplômés, professeurs et familles pourront échanger et partager leurs expériences. Ce sera également l’occasion pour les étudiants de réseauter et de discuter de leurs futurs projets. Nous invitons toute la communauté universitaire à venir féliciter nos diplômés et à célébrer cette étape importante.', '0', '2025-06-15'),

(2, 'Conférence sur l’intelligence artificielle et l’avenir du numérique', 'Le département d’informatique organise une conférence exceptionnelle sur l’IA et son impact sur le futur du numérique. Des experts de renommée mondiale viendront partager leur expertise.', 'vue/assets/actualites/ia.jpg', 'Département d’Informatique', 'Conférence', 'Le département d’informatique de l’Université Hudson Bay organise une conférence exceptionnelle dédiée à l’intelligence artificielle et son impact sur le futur du numérique. Cette conférence réunira des experts renommés du domaine, dont des chercheurs en IA, des entrepreneurs du secteur technologique et des étudiants curieux d’en apprendre plus sur les dernières avancées.', 'Parmi les thèmes abordés, nous discuterons de l’évolution rapide de l’apprentissage automatique, de l’intelligence artificielle générative, et des défis éthiques que pose cette technologie. Des études de cas seront présentées, mettant en avant des applications concrètes de l’IA dans différents secteurs, tels que la médecine, la finance et l’industrie.', 'Les participants auront l’opportunité de poser leurs questions aux intervenants et de participer à des débats sur les perspectives d’avenir de l’intelligence artificielle. Un espace networking sera mis en place pour favoriser les échanges entre professionnels, étudiants et passionnés du numérique. Ne manquez pas cette occasion d’enrichir vos connaissances et de découvrir les opportunités offertes par ce domaine en pleine expansion !', '0', '2025-04-10'),

(3, 'Tournoi interuniversitaire de basketball', 'L’équipe des Hudson Bay Falcons affrontera les meilleures équipes universitaires de la région lors du tournoi annuel. Venez nombreux pour encourager nos joueurs !', 'vue/assets/actualites/basketball.jpg', 'Service des sports', 'Sport', 'Le tournoi interuniversitaire de basketball approche à grands pas, et l’équipe des Hudson Bay Falcons est prête à relever le défi ! Ce tournoi tant attendu réunira les meilleures équipes universitaires de la région dans une compétition intense et passionnante. Nos joueurs se sont entraînés dur pour défendre les couleurs de l’université et viser la victoire.', 'Le tournoi se déroulera sur trois jours et inclura des matchs de qualification, des demi-finales et une grande finale. Chaque match sera une occasion unique de voir s’affronter des talents prometteurs dans une ambiance survoltée. Les supporters auront un rôle clé à jouer : leur énergie et leurs encouragements seront essentiels pour motiver notre équipe !', 'Nous invitons toute la communauté universitaire à venir assister aux rencontres et à soutenir les Hudson Bay Falcons. Des stands de rafraîchissements seront disponibles sur place, et une cérémonie de remise des prix viendra clôturer l’événement. Venez nombreux pour vibrer au rythme du basketball universitaire !', '1', '2025-03-25'),

(4, 'Lancement du programme de mentorat étudiant', 'L’université met en place un programme de mentorat pour aider les étudiants à s’orienter et réussir leurs études. Les inscriptions sont ouvertes dès maintenant !', 'vue/assets/actualites/mentorat.jpg', 'Service d’Orientation', 'Éducation', 'L’Université Hudson Bay lance un tout nouveau programme de mentorat étudiant destiné à accompagner les nouveaux inscrits dans leur parcours académique et personnel. Ce programme vise à créer des liens entre les étudiants expérimentés et les nouveaux arrivants, afin de leur offrir un soutien personnalisé et adapté à leurs besoins.', 'Les mentors, issus de différentes disciplines, partageront leurs conseils et leurs expériences pour aider les étudiants à mieux s’organiser, à gérer leur stress et à s’adapter à la vie universitaire. Des rencontres régulières seront organisées afin de discuter des problématiques rencontrées et de proposer des solutions adaptées.', 'Les inscriptions sont désormais ouvertes ! Que vous soyez un étudiant souhaitant bénéficier d’un accompagnement ou que vous souhaitiez devenir mentor, nous vous invitons à rejoindre cette belle initiative. Ensemble, faisons de l’université un lieu d’entraide et de réussite pour tous.', '1', '2025-05-01'),

(5, 'L’Université Hudson Bay s’engage !', 'Dans le cadre de la Journée de la Terre, l’université organise une grande opération de nettoyage et de sensibilisation à l’écologie. Ateliers, conférences et activités collaboratives seront au programme. Rejoignez-nous pour faire la différence !', 'vue/assets/actualites/environnement.jpg', 'Club Écologie', 'Écologie', 'Dans le cadre de la Journée de la Terre, l’Université Hudson Bay réaffirme son engagement en faveur de l’environnement en organisant une grande opération de sensibilisation et de nettoyage. Cet événement vise à promouvoir des pratiques écologiques et à encourager la communauté universitaire à adopter un mode de vie plus respectueux de la planète.', 'Au programme : ateliers interactifs sur le recyclage et la gestion des déchets, conférences animées par des experts en écologie, et participation active à un nettoyage collectif du campus et des espaces verts environnants. Chaque geste compte, et ensemble, nous pouvons avoir un impact positif sur notre environnement.', 'Nous invitons étudiants, professeurs et personnels administratifs à se joindre à cette initiative. Rejoignez-nous pour une journée placée sous le signe de la solidarité et de la protection de notre planète. Ensemble, faisons la différence !', '1', '2025-04-22'),

(6, 'Festival culturel : découvrez les talents du campus', 'Musique, danse, théâtre et expositions… Le Festival culturel de l’Université Hudson Bay met en lumière les talents de nos étudiants. Un moment festif et créatif à ne pas manquer !', 'vue/assets/actualites/culture.jpg', 'Faculté des Arts', 'Culture', 'Le Festival culturel de l’Université Hudson Bay revient cette année avec une programmation riche et variée. Cet événement met en avant les talents artistiques de nos étudiants à travers la musique, la danse, le théâtre et les arts visuels. C’est l’occasion idéale de découvrir la diversité et la créativité qui animent notre campus !', 'Tout au long de la journée, des spectacles en direct, des expositions et des performances artistiques se succéderont dans les différents espaces de l’université. Des ateliers interactifs seront également proposés pour permettre aux participants de s’initier à différentes formes d’art et d’expression.', 'L’entrée est libre et ouverte à tous ! Venez nombreux pour encourager nos artistes en herbe et partager un moment convivial et festif. Ce festival est une célébration de la culture et du talent étudiant, alors ne manquez pas cette belle occasion !', '0', '2025-06-05');


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
(3, 5, 0),

(4, 1, 5),  -- Bonnet Hudson Bay Jaune (S)
(4, 2, 15), -- Bonnet Hudson Bay Jaune (M)
(4, 3, 10), -- Bonnet Hudson Bay Jaune (L)
(4, 4, 20), -- Bonnet Hudson Bay Jaune (XL)
(4, 5, 30), -- Bonnet Hudson Bay Jaune (XXL)

(5, 1, 0),  -- Bonnet Skyhawks Nation Orange (S)
(5, 2, 20), -- Bonnet Skyhawks Nation Orange (M)
(5, 3, 35), -- Bonnet Skyhawks Nation Orange (L)
(5, 4, 25), -- Bonnet Skyhawks Nation Orange (XL)
(5, 5, 10), -- Bonnet Skyhawks Nation Orange (XXL)

(6, 1, 0),  -- Bonnet Skyhawks Nation Noir (S)
(6, 2, 25), -- Bonnet Skyhawks Nation Noir (M)
(6, 3, 40), -- Bonnet Skyhawks Nation Noir (L)
(6, 4, 18), -- Bonnet Skyhawks Nation Noir (XL)
(6, 5, 12), -- Bonnet Skyhawks Nation Noir (XXL)

(7, 1, 0),  -- T-Shirt Hudson Skyhawks Orange (S)
(7, 2, 50), -- T-Shirt Hudson Skyhawks Orange (M)
(7, 3, 40), -- T-Shirt Hudson Skyhawks Orange (L)
(7, 4, 30), -- T-Shirt Hudson Skyhawks Orange (XL)
(7, 5, 20), -- T-Shirt Hudson Skyhawks Orange (XXL)

(8, 1, 0),  -- Sweat Hudson Bleu (S)
(8, 2, 60), -- Sweat Hudson Bleu (M)
(8, 3, 55), -- Sweat Hudson Bleu (L)
(8, 4, 40), -- Sweat Hudson Bleu (XL)
(8, 5, 30), -- Sweat Hudson Bleu (XXL)

(9, 1, 0),  -- Sweat Hudson Noir (S)
(9, 2, 70), -- Sweat Hudson Noir (M)
(9, 3, 60), -- Sweat Hudson Noir (L)
(9, 4, 50), -- Sweat Hudson Noir (XL)
(9, 5, 35); -- Sweat Hudson Noir (XXL)

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
  `compte_admin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `identifiant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `motdepasse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `compte_admin`, `identifiant`, `motdepasse`) VALUES
(1, 'Y', 'admin1', '$2y$10$hsiMxdXvp/IriNBB29U/nOaG3S4TZ6Nc/3B.LrIpKAMMWEkJyjM5m');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
-- 

CREATE TABLE `panier` (
    `id` int(11) NOT NULL,
    `utilisateur_id` int(11) NOT NULL,
    `produit_id` int(11) NOT NULL,
    `taille` VARCHAR(50), 
    `quantite` int(11) NOT NULL DEFAULT 0,
    `date_ajout` TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Déchargement des données de la table `panier`
--






-- --------------------------------------------------------

-- Structure de la table `cursus`
CREATE TABLE `cursus` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(255) NOT NULL, -- Nom ou titre du programme
  `presentation` TEXT NOT NULL, -- Présentation générale
  `objectif` TEXT NOT NULL, -- Objectif général
  `matieres_principales` TEXT NOT NULL, -- Liste des matières principales
  `options_possibles` TEXT NOT NULL, -- Liste des options possibles
  `debouches` TEXT NOT NULL, -- Débouchés professionnels
  `admission_conditions` TEXT NOT NULL, -- Conditions d'admission
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------
-- Déchargement des données de la table `cursus`
-- --------------------------------------------------------

INSERT INTO `cursus` 
(`titre`, `presentation`, `objectif`, `matieres_principales`, `options_possibles`, `debouches`, `admission_conditions`) 
VALUES 
('Programmes - Sciences',
    'Le programme de Sciences de notre Université est conçu pour offrir une formation approfondie en sciences fondamentales. Grâce à un équilibre entre théorie et pratique, il permet aux étudiants de développer des compétences analytiques, expérimentales et technologiques avancées.',
    'Former des scientifiques compétents capables d’analyser, de comprendre et d’innover dans les domaines des sciences fondamentales et appliquées. Ce programme met un accent sur l’interdisciplinarité et l’adaptabilité aux défis scientifiques et sociétaux contemporains.',
    'Mathématiques avancées et modélisation, Physique appliquée et quantique, Chimie organique, inorganique et analytique, Biologie moléculaire et biotechnologies, Sciences de la Terre et de l’environnement',
    'Intelligence artificielle et calcul scientifique, Neurosciences et biophysique, Énergies renouvelables et développement durable, Nanotechnologies et matériaux avancés',
    'Recherche académique et industrielle, Enseignement et formation scientifique, Industrie pharmaceutique et biotechnologique, Ingénierie et innovation technologique, Écologie et développement durable. Les opportunités incluent également la poursuite d’études en Master et Doctorat dans des institutions prestigieuses à l’international.',
    'Diplôme de fin d’études secondaires avec mention scientifique, Examen d’entrée basé sur les connaissances en mathématiques et sciences, Lettre de motivation détaillant les objectifs académiques et professionnels, Entretien avec un jury académique. Les candidatures sont ouvertes chaque année du 1er avril au 30 juin. Les résultats sont communiqués en août.'
),
('Programmes - Médecine',
    'Le programme de Médecine propose une formation exhaustive qui combine l’étude approfondie des sciences médicales et la pratique clinique. Ce programme vise à préparer les étudiants à relever les défis de la santé publique tout en développant leur expertise médicale.',
    'Former des professionnels de la santé compétents, capables de diagnostiquer et traiter des maladies, tout en contribuant à l’amélioration des systèmes de santé et à la recherche biomédicale.',
    'Anatomie humaine, Physiologie, Biochimie clinique, Pathologie générale et spécialisée, Pharmacologie, Médecine générale et spécialisée',
    'Recherche médicale et innovation, Médecine d’urgence et soins intensifs, Santé publique et épidémiologie, Chirurgie avancée',
    'Pratique médicale dans des hôpitaux et cliniques, Recherche biomédicale, Santé publique et organisation de systèmes de santé, Poursuite des études spécialisées en médecine (cardiologie, neurologie, etc.).',
    'Diplôme de fin des études secondaires avec mention scientifique, Examen d’entrée en Médecine (concours), Lettre de motivation soulignant les ambitions médicales, Entretien avec un jury médical. Les candidatures sont ouvertes du 1er mai au 30 juin.'
),
('Programmes - Business',
    'Le programme de Business de Hudson Bay forme des leaders des affaires à travers une approche interdisciplinaire. Il combine les compétences analytiques, stratégiques et managériales nécessaires pour réussir dans un environnement commercial mondial en constante évolution.',
    'Former des gestionnaires et entrepreneurs capables de diriger des organisations, élaborer des stratégies commerciales innovantes et contribuer au développement économique durable.',
    'Économie et finance, Comptabilité, Marketing et stratégie, Gestion des ressources humaines, Entrepreneuriat et innovation',
    'Commerce international, Gestion de projets, Analyse des données commerciales, Développement durable et responsabilité sociétale',
    'Carrière dans la gestion des entreprises, Conseil et audit, Lancement de start-ups et projets entrepreneuriaux, Poursuite des études en MBA ou autres Masters spécialisés.',
    'Diplôme de fin des études secondaires avec mention économique ou générale, Dossier académique solide, Examen d’entrée basé sur des connaissances en gestion et économie, Entretien de motivation. Candidatures ouvertes du 15 avril au 31 juillet.'
),
('Programmes - Art',
    'Le programme d’Art de Hudson Bay encourage la créativité et l’expression artistique à travers une formation pluridisciplinaire en arts plastiques, design et histoire de l’art. Ce cursus favorise un épanouissement personnel et professionnel dans les domaines créatifs.',
    'Former des artistes et designers polyvalents, capables de produire des œuvres originales et de contribuer au développement culturel et artistique mondial.',
    'Peinture, Sculpture, Histoire de l’art, Design graphique, Photographie, Art numérique',
    'Illustration et animation, Arts de la scène, Architecture et design d’intérieur, Conservation et restauration d’œuvres',
    'Carrière d’artiste indépendant, Métiers du design et de la communication visuelle, Animation et médias numériques, Postes dans des musées et galeries d’art.',
    'Diplôme de fin des études secondaires, Portfolio artistique, Entretien de présentation des travaux, Lettre de motivation expliquant les aspirations artistiques. Candidatures ouvertes du 1er mars au 30 juin.'
),
('Programmes - Lettres',
    'Le programme de Lettres de Hudson Bay offre une formation rigoureuse en littérature, langues et philosophie. Il vise à développer des compétences en analyse, communication et pensée critique, indispensables dans une société en quête de réflexion et de créativité.',
    'Former des spécialistes des lettres capables d’analyser des textes complexes, de transmettre des savoirs littéraires et culturels, et de contribuer à la vie intellectuelle.',
    'Littérature française et comparée, Langues modernes et anciennes, Philosophie, Linguistique, Écriture créative',
    'Traduction et interprétation, Journalisme et médias, Études culturelles et genre, Enseignement et recherche',
    'Carrière dans l’enseignement et la recherche académique, Métiers de la communication et du journalisme, Édition et traduction, Poursuite d’études en littérature, linguistique ou philosophie.',
    'Diplôme de fin d’études secondaires avec mention littéraire, Dossier académique solide, Épreuve écrite sur un sujet littéraire, Entretien de motivation. Candidatures ouvertes du 1er avril au 31 juillet.'
),
('Programmes - Ingénierie',
    'Le programme d’Ingénierie de l’Université Hudson Bay forme des ingénieurs qualifiés dans des disciplines variées, capables de relever les défis technologiques et sociétaux du XXIe siècle. Ce cursus allie théorie avancée et expériences pratiques pour offrir une formation complète.',
    'Former des ingénieurs compétents, capables d’innover, de concevoir et de gérer des projets complexes dans des environnements techniques variés.',
    'Mathématiques appliquées, Physique avancée, Informatique et programmation, Électronique et automatisation, Mécanique des structures',
    'Énergies renouvelables, Robotique et intelligence artificielle, Génie civil et construction, Systèmes de transport et mobilité durable',
    'Carrière d’ingénieur dans les secteurs de l’énergie, de l’automobile, et des télécommunications, Recherche et développement technologique, Poursuite d’études en génie ou management industriel.',
    'Diplôme de fin d’études secondaires avec mention scientifique, Concours d’entrée basé sur les mathématiques et la physique, Lettre de motivation expliquant les projets professionnels. Candidatures ouvertes du 1er mai au 31 juillet.'
);

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
-- Index pour la table `panier`
--
ALTER TABLE `panier`
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
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
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

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `produits_tailles_panier_1` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `f_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
