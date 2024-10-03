-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 22 mai 2024 à 00:57
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
-- Base de données : `portfolio3`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `roles`, `password`) VALUES
(21, 'alexduduch77@gmail.com', '[\"ROLE_SUPER_ADMIN\"]', '$2y$13$9Xcyb/Z1bo7Utf7whdKPEeWt2FBvoTLDdUVmuAc3GFVpIVg5tFlqq'),
(22, 'alexduduch60@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$6RamVO2srpu7OIZ8mNMX8uMpjmFeNedgZmdtHeTvThRHIlWzcXbhi');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240503133114', '2024-05-03 15:31:23', 417),
('DoctrineMigrations\\Version20240503150524', '2024-05-03 17:05:29', 111),
('DoctrineMigrations\\Version20240508161645', '2024-05-08 18:16:56', 53);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `contenu` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `nom`, `prenom`, `email`, `sujet`, `contenu`) VALUES
(111, 'Duchemin', 'Alexandre', 'alexduduch77@gmail.com', 'Demande de partenariat', 'dede'),
(112, 'Delafontaine', 'Théo', 'théodelafontainer@gmail.com', 'Demande de partenariat', 'Il a manger le bébé'),
(113, 'Evan', 'Jerequiel', 'evanoslhomos@gmail.com', 'Demande de partenariat', 'tu t\'tais'),
(114, 'Deroche', 'Stanislas', 'stan.d@gmail.com', 'Demande de partenariat', 'ouaaaaii c\'est micheel, tu donnes pas de nouvelles, on peut pas te faire confiance'),
(115, 'Matyeux', 'Dos Santos', 'mat.dos@gmail.com', 'Demande de partenariat', 'hassoul'),
(116, 'Fauvel', 'David', 'david.fauvel@gmail.com', 'Autre..', 'MAIS PTN HEAL'),
(117, 'Brian', 'jsaisplus', 'alexduduch77@gmail.com', 'Demande de partenariat', 'Is in de kitchen'),
(118, 'Florient', 'jsaisplus', 'alexduduch77@gmail.com', 'Demande de partenariat', 'Where is bryan ?'),
(119, 'Deoliveira', 'Pauline', 'pauline.dlvr@gmail.com', 'Autre..', 'meeeeeeh'),
(120, 'Harsuike', 'Florie', 'florie.h@gmail.com', 'Demande de partenariat', 'dede'),
(121, 'Leteissier', 'Natan', 'natan.lts@gmail.com', 'Autre..', 'Je suis étienne');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id` int(11) NOT NULL,
  `techno_id_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image_name_projet` varchar(255) DEFAULT NULL,
  `alt` varchar(255) NOT NULL,
  `temps_realisation` varchar(255) NOT NULL,
  `lien` longtext NOT NULL,
  `lien_github` longtext NOT NULL,
  `image_name_projet_apercu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id`, `techno_id_id`, `nom`, `description`, `image_name_projet`, `alt`, `temps_realisation`, `lien`, `lien_github`, `image_name_projet_apercu`) VALUES
(7, 72, 'Cv Alex Johnson', 'Premier projet d\'intégration de première année en bts sio. En groupe de deux, nous avions une maquette à reproduire en html css', 'profil-66362f95f40c7912278343.png', 'Logo du projet', '1 semaine', 'https://test.com', 'https://github.com/DuDuch23/Projet-1-cv', 'maquette-desktop-66362f9601925079420413.jpg'),
(8, 71, 'Disney+', 'Deuxième projet d\'intégration de première année de BTS SIO. En groupe de deux, à l\'aide d\'une maquette, nous devions reproduire une partie du site Disney+ regroupant certains films et séries. Le projet a été réalisé en HTML, CSS et JavaScript.', 'disney-logo-6636315657cea644081330.png', 'Logo Disney+', '2 semaines', 'https://test.com', 'https://github.com/DuDuch23/Projet_2_Disney', 'disney-66363156584fe252772692.png'),
(9, 71, 'Projet CSE (Lycée Saint-Vincent)', 'Projet de fin d\'année d\'un site CSE pour le lycée Saint Vincent de Senlis en groupe de 3. Nous avions une maquette Figma complète montrant à quoi le site devait ressembler, avec ses différentes parties. J\'étais chargé de créer le header, la page d\'accueil, la page de contact et leurs back-offices. J\'ai aussi l\'intention de l\'améliorer.', 'lsv-6636338117268469642825.png', 'logo lycée saint vincent', '3 mois', 'https://test.com', 'https://github.com/DuDuch23/CseLSV', 'apercu-projet-cse-6636338122105039257562.png'),
(10, 75, 'Footclub', 'Projet d\'intégration POO (PHP Orienté Objet). Première intégration et utilisation de la programmation orientée objet pour apprendre les bases.', 'ballon-foot-661818f1437f4539700626-663bc2d5d1209683117916.webp', 'ballon de foot', '1 mois', 'https://test.com', 'https://github.com/DuDuch23/footclub', 'article-test-661818f13e9eb771001585-663bc2d5d741e438484525.png'),
(11, 74, 'Portfolio v1', 'La première version de mon Portfolio', 'image-portfolio-66397aa68c9a3906837191.jpeg', 'logo portfolio', '2 mois', 'https://test.com', 'https://github.com/DuDuch23/portfolio', 'apercu-portfoliov1-66397aa68d3c7796446430.png'),
(12, 72, 'Portfolio v2', 'Amélioration de la première version de mon portfolio en y intégrant un backoffice ... (à continuer)', 'v2-663bcbe1b5143146458094.png', 'logo portfolio v2', '2 mois', 'https://test.com', 'https://github.com/DuDuch23/Portfolio_V2/tree/main', 'apercu-portfoliov1-66397aa68d3c7796446430-663bcbe1bdcff350634791.png'),
(13, 71, 'CoffeeShop', 'Premier projet d\'intégration sur le framework Symfony. Réalisé sur plusieurs semaines, création des différentes parties et connaissances de bases dans un projet Symfony telles que les contrôleurs, les entités, les formulaires, Data Fixtures et le CRUD.', 'background-coffee2-663bcf5b9d6ed280331437.jpg', 'photo de café', '4 mois (à améliorer)', 'https://test.com', 'https://github.com/DuDuch23/CoffeeShop', 'apercu-coffeeshop-663bcf5b9e449673748631.png'),
(14, 71, 'PoesieInspire', 'Il s\'agit d\'un projet de BTS blanc, un POC, à réaliser en 4 heures afin de tester nos compétences et nos connaissances acquises avec le framework Symfony.', 'poesie-664650f22aa6f436616759.png', 'poesie', '4h', 'https://test.com', 'https://github.com/DuDuch23/PoesieInspire', 'apercu-poesieinspire-664650f22c3fd532771523.png'),
(15, 71, 'Agence EFIC', 'Durant mon stage de deuxième année de BTS SIO, j\'ai été assigné à une tâche, celle de m\'occuper du site vitrine de l\'entreprise. Je devais le mettre à jour, le rendre plus élégant, en quelque sorte l\'entretenir durant toute la durée de mon stage.', 'e-commerce-664687b052a68115050223.png', 'logo e commerce', '2 mois', 'https://agence-efic.fr/', 'https://pasdelien.com', 'apercu-siteefic-664687b0533da693129379.png'),
(16, 71, 'MathIndex', 'Il s\'agit de notre projet de fin d\'année de BTS SIO. Notre objectif était de développer un site d\'hébergement d\'exercices de mathématiques en ligne sous le framework Symfony. Chaque utilisateur pouvait rechercher, soumettre et télécharger des exercices. Il y a également une page pour les administrateurs regroupant toutes les données administrables.', 'formule-66468a1cc8f4f748092971.png', 'logo mathématique', '3 mois', 'https://test.com', 'https://github.com/DuDuch23/MathIndex', 'apercu-mathindex-66468a1cc999e196495621.png'),
(17, 71, 'Travel Agency', 'C\'est un site vitrine des plus basique développé en html et css. Ce projet provient de ma certification Udemy pour apprendre les bases du html et css.', 'voyage-664d1f57b1bea581785331.png', 'voyage', '30 min', 'https://test.com', 'https://github.com/DuDuch23/Travel-Agency/tree/main/Travel-Agency', 'apercu-travel-agency-664d1f57b3654693148271.png'),
(18, 73, 'Snake', 'Ceci est un représentation du célèbre jeu Snake programmé en JavaScript orientée objet. Le but de ce projet était de comprendre la programmation orientée objet, la manipulation du DOM et la gestion des évènements utilisateurs.', 'serpent-664d200d3683c109998546.png', 'serpent', '4h', 'https://test.com', 'https://github.com/DuDuch23/Travel-Agency/tree/main/Javascript', 'apercu-snake-664d200d37370608711429.png'),
(19, 79, 'Top 5 des meilleurs actrices', 'Ceci est en projet en lien avec ma formation Udemy. C\'est un projet réalisé avec Jquery, permettant de rendre le site dynamique, créer une interface utilisateur dynamique.', 'chaise-664d210d77a5a223097927.png', 'film', '3.5h', 'https://test.com', 'https://github.com/DuDuch23/Travel-Agency/tree/main/ProjetJquery', 'apercu-top-5-664d210d784a8307602446.png'),
(20, 80, 'Cv en ligne', 'Ceci est un projet issue de ma formation Udemy, pour apprendre à créer un cv en ligne grâce à la bibliothèque Bootstrap.', 'cv-664d218495abd949555735.png', 'cv', '5h', 'https://test.com', 'https://github.com/DuDuch23/Travel-Agency/tree/main/ProjetBootstrap', 'apercu-cv-ligne-664d218496943818207160.png'),
(21, 79, 'Formulaire de contact dynamique', 'Ce projet issue de ma formation Udemy, m\'a permis de me familiariser avec la création de contenu dynamique grâce à Jquery. Ceci est un formulaire de contact dynamique, sans avoir à recharger la page.', 'courriel-de-contact-664d22383dc57255757744.png', 'contact', '6.5h', 'https://test.com', 'https://github.com/DuDuch23/Travel-Agency/tree/main/ProjetPhp', 'apercu-formulaire-contact-664d22383e94c944103528.png'),
(22, 74, 'Burger Code', 'Ce dernier projet de ma formation Udemy, est un projet complet regroupé la totalité de ce qu\'il y a été appris durant cette formation. Le but était de créer un site de fast food, dynamique, responsive et affichant tout le stock de produits. Burger code contient également une interface administratrice.', 'burger-664d22f2ed21e508078305.png', 'burger', '6.5h', 'https://test.com', 'https://github.com/DuDuch23/Travel-Agency/tree/main/BurgerCode', 'apercu-burger-code-664d22f2edaa0862185068.png');

-- --------------------------------------------------------

--
-- Structure de la table `techno`
--

CREATE TABLE `techno` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `image_name_techno` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `techno`
--

INSERT INTO `techno` (`id`, `nom`, `image_name_techno`) VALUES
(71, 'html', 'html5.png'),
(72, 'css', 'css3.png'),
(73, 'js', 'js.png'),
(74, 'php', 'php.png'),
(75, 'symfony', 'symfony.png'),
(76, 'c#', 'csharp.jpg'),
(77, 'python', 'python.png'),
(79, 'jquery', 'jquery.png'),
(80, 'bootstrap', 'bootstrap.svg'),
(81, 'tailwind', 'tailwind.png');

-- --------------------------------------------------------

--
-- Structure de la table `timeline`
--

CREATE TABLE `timeline` (
  `id` int(11) NOT NULL,
  `techno_nom_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` longtext NOT NULL,
  `alt` varchar(255) NOT NULL,
  `techno_image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `timeline`
--

INSERT INTO `timeline` (`id`, `techno_nom_id`, `date`, `description`, `alt`, `techno_image_id`) VALUES
(1, 71, '2020-09-01', 'J\'ai commencé à apprendre les bases du HTML en classe de seconde, puis j\'ai eu l\'occasion de les mettre en pratique dès la première année de mon BTS SIO.', 'html', 71),
(2, 72, '2020-09-01', 'J\'ai commencé à apprendre les bases du css lorsque j\'ai intégré ma première année de bts sio, puis j\'ai eu l\'occasion de les mettre en pratique dès la première année dans tout mes projets.', 'css', 0),
(3, 73, '2022-09-01', 'J\'ai appris le Javascript sur internet et grâce à des formations pour les mettres en pratique dans différents projets.', 'js', 0),
(4, 76, '2022-10-01', 'blabla', 'csharp', 0),
(6, 74, '2023-01-01', 'L\'apprentissage du php a débuté par un projet de fin d\'année.', 'php', 0),
(7, 75, '2023-11-01', 'L\'apprentissage du symfony a débuté après l\'apprentissage du php orienté objet (POO). Pour ensuite déboucher sur un projet symfony (le projet CoffeeShop)', 'symfony', 0),
(8, 81, '2024-02-01', 'L\'apprentissage de la bibliothèque tailwind par le projet de fin de deuxième année et sur le portfolio en version symfony.', 'tailwind', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `photo_profil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `roles`, `password`, `photo_profil`) VALUES
(81, 'Delafontaine', 'Théo', 'théodelafontainer@gmail.com', '[\"ROLE_VISITEUR\"]', '$2y$13$bCMPc5bLvyRFGSIdcq6q6.F5B4Wa4d4/7BcnA45mtzMRJb4yTnruO', NULL),
(82, 'Harsuike', 'Florie', 'florie.h@gmail.com', '[\"ROLE_VISITEUR\"]', '$2y$13$zWzUYOFsiJP7n9IFSX55GeTbPp8ymP.SGy1K4lpBFbul.qQlgVBSK', NULL),
(83, 'Deroche', 'Stanislas', 'stan.d@gmail.com', '[\"ROLE_VISITEUR\"]', '$2y$13$QF27I4mJelX2Z9lvfYhTVuAw65FGRSJSYLYaAWQIaraKPzm/UthL6', NULL),
(84, 'Fauvel', 'David', 'david.fauvel@gmail.com', '[\"ROLE_VISITEUR\"]', '$2y$13$Ni2fJ/hDimL4EXIiSffr/.zFGbXsQqWcuAfPvMPnlwKuuyDjgcD9G', NULL),
(85, 'Jerequiel', 'Evan', 'evanoslhomos@gmail.com', '[\"ROLE_VISITEUR\"]', '$2y$13$O8Q0JLJHDheeg8ykCM3IZe6TnnmPeP0HbA8zuJapMc7.U8EQOxZEm', NULL),
(86, 'Dos Santos', 'Matyeux', 'mat.dos@gmail.com', '[\"ROLE_VISITEUR\"]', '$2y$13$jutkqqbB4cs2uE7CtyNo0u8sebjv.80wW9ZO6u3yyIyfX97ycjf8m', NULL),
(87, 'Deoliveira', 'Pauline', 'pauline.dlvr@gmail.com', '[\"ROLE_VISITEUR\"]', '$2y$13$pxGgeyt1pNUedv70AZ98K.QYQWZWlR6acFxeHtEoxrpPNjB5luOpe', NULL),
(88, 'Lantez', 'Téo', 'téolantez@gmail.com', '[\"ROLE_VISITEUR\"]', '$2y$13$7CcZDQNXjdpjcbNHbadXpOVWgaIBCJYIRfdh0S6LV706pFBIxGasu', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_49CF2272E7927C74` (`email`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_50159CA95C5087BC` (`techno_id_id`);

--
-- Index pour la table `techno`
--
ALTER TABLE `techno`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_46FEC666FFE93300` (`techno_nom_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `techno`
--
ALTER TABLE `techno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT pour la table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `FK_50159CA95C5087BC` FOREIGN KEY (`techno_id_id`) REFERENCES `techno` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
