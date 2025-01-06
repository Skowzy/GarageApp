-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 05 jan. 2025 à 22:31
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
-- Base de données : `garageApp`
--

-- --------------------------------------------------------

--
-- Structure de la table `asso_3`
--

CREATE TABLE `asso_3` (
  `rol_id` int(11) NOT NULL,
  `aut_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `asso_3`
--

INSERT INTO `asso_3` (`rol_id`, `aut_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 2),
(4, 5),
(4, 6),
(5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `autorization`
--

CREATE TABLE `autorization` (
  `aut_id` int(11) NOT NULL,
  `aut_label` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `autorization`
--

INSERT INTO `autorization` (`aut_id`, `aut_label`) VALUES
(1, 'Create'),
(2, 'Read'),
(3, 'Update'),
(4, 'Delete'),
(5, 'Execute'),
(6, 'Manage');

-- --------------------------------------------------------

--
-- Structure de la table `car`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `car_brand` varchar(50) DEFAULT NULL,
  `car_model` varchar(100) DEFAULT NULL,
  `car_year` year(4) DEFAULT NULL,
  `car_kilometers` int(11) DEFAULT NULL,
  `car_fuelType` varchar(50) DEFAULT NULL,
  `car_licensePlate` varchar(10) DEFAULT NULL,
  `car_notes` varchar(500) DEFAULT NULL,
  `use_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `car`
--

INSERT INTO `car` (`car_id`, `car_brand`, `car_model`, `car_year`, `car_kilometers`, `car_fuelType`, `car_licensePlate`, `car_notes`, `use_id`) VALUES
(15, 'Skoda', 'Fabia', '1977', 150000, 'essence', 'XD 340 BL', 'lfjdhgfsùdgfdgs', 2),
(16, 'Peugeot', '206', '2004', 180000, 'diesel', 'BL-830-ZV', 'Bientot à la casse', 2),
(17, 'Renault', 'Megane', '2010', 85000, 'essence', 'AA-111-AA', NULL, 3),
(18, 'TEST', 'TEST', '2000', NULL, NULL, NULL, NULL, 3),
(19, 'Toyota', 'Corolla', '2015', 95000, 'hybrid', 'XY-123-ZA', 'Voiture familiale', 6),
(20, 'Ford', 'Fiesta', '2012', 120000, 'diesel', 'AB-456-CD', 'Bon état', 7),
(21, 'Volkswagen', 'Golf', '2018', 60000, 'essence', 'EF-789-GH', 'Idéale pour la ville', 8);

-- --------------------------------------------------------

--
-- Structure de la table `maintenance`
--

CREATE TABLE `maintenance` (
  `mai_id` int(11) NOT NULL,
  `mai_name` varchar(50) DEFAULT NULL,
  `mai_description` varchar(500) DEFAULT NULL,
  `mai_photo` varchar(100) DEFAULT NULL,
  `mai_price` int(11) DEFAULT NULL,
  `mai_date` date DEFAULT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `maintenance`
--

INSERT INTO `maintenance` (`mai_id`, `mai_name`, `mai_description`, `mai_photo`, `mai_price`, `mai_date`, `car_id`) VALUES
(2, 'Vidange + Filtres', 'Changement des filtres à huile et carburant et réalisation de la vidange avec huile synthétique', '', 60, '2024-11-02', 16),
(3, 'MACRON', 'GHJJFGHJFGHGJFH', NULL, 1111, '2025-01-01', 17),
(6, 'ùmjkdfglfgds', 'dfgjhgfjhdfjghd', NULL, 1500, '2025-01-04', 16),
(7, 'Changement de pneus', 'Changement des pneus avant et arrière', '', 400, '2024-12-01', 19),
(8, 'Révision complète', 'Contrôle technique et révision', 'revision.jpg', 200, '2025-01-02', 20),
(9, 'Réparation moteur', 'Réparation des injecteurs', 'moteur.jpg', 1500, '2025-01-03', 21);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `rol_id` int(11) NOT NULL,
  `rol_label` varchar(50) DEFAULT NULL,
  `rol_power` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`rol_id`, `rol_label`, `rol_power`) VALUES
(1, 'admin', 100),
(2, 'user', 50),
(3, 'guest', 10),
(4, 'superadmin', 200),
(5, 'viewer', 5);

-- --------------------------------------------------------

--
-- Structure de la table `user_`
--

CREATE TABLE `user_` (
  `use_id` int(11) NOT NULL,
  `use_firstname` varchar(50) DEFAULT NULL,
  `use_lastname` varchar(50) DEFAULT NULL,
  `use_login` varchar(50) DEFAULT NULL,
  `use_password` varchar(150) DEFAULT NULL,
  `use_lastLogin` timestamp NOT NULL DEFAULT current_timestamp(),
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user_`
--

INSERT INTO `user_` (`use_id`, `use_firstname`, `use_lastname`, `use_login`, `use_password`, `use_lastLogin`, `rol_id`) VALUES
(2, 'Sebastien', 'Trullu', 'trullu.sebastien@gmail.com', '$2y$10$LhVtOh2xGw/wJFRD3fKH0.6Bv9YZBzE.RVCv.PPdD0Bx8c6J4Gm8u', '2025-01-05 16:31:27', 1),
(3, 'Marc', 'Trullu', 'marc30250@gmail.com', '$2y$10$s7/OKh3ztPeHlBTG0dbb/.Qv6AtFn9ko3zcavykeODRfHVipCFqaG', '2025-01-05 14:58:39', 2),
(4, 'test', 'test', 'test@test.com', '$2y$10$eTXTB4EQs3/s.Z6n7bsMNu15hR6qXULk7AWnE5/0U0emqqHJElgcy', '2025-01-04 09:39:23', 2),
(5, 'test2', 'test2', 'test@test.fr', '$2y$10$Y57VGNX6yMlatSvkHQi61eFJo0k3UjqIaXcN/nm2a5f1eQf19fYmu', '2025-01-04 09:39:23', 2),
(6, 'Alice', 'Dupont', 'alice.dupont@gmail.com', '$2y$10$abcd1234', '2025-01-06 09:00:00', 3),
(7, 'Bob', 'Martin', 'bob.martin@gmail.com', '$2y$10$abcd5678', '2025-01-06 10:00:00', 2),
(8, 'Charlie', 'Lambert', 'charlie.lambert@gmail.com', '$2y$10$abcd91011', '2025-01-06 11:00:00', 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `asso_3`
--
ALTER TABLE `asso_3`
  ADD PRIMARY KEY (`rol_id`,`aut_id`),
  ADD KEY `aut_id` (`aut_id`);

--
-- Index pour la table `autorization`
--
ALTER TABLE `autorization`
  ADD PRIMARY KEY (`aut_id`);

--
-- Index pour la table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `use_id` (`use_id`);

--
-- Index pour la table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`mai_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`rol_id`);

--
-- Index pour la table `user_`
--
ALTER TABLE `user_`
  ADD PRIMARY KEY (`use_id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT pour les tables déchargées

--

--
-- AUTO_INCREMENT pour la table `autorization`
--
ALTER TABLE `autorization`
  MODIFY `aut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `mai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `user_`
--
ALTER TABLE `user_`
  MODIFY `use_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `asso_3`
--
ALTER TABLE `asso_3`
  ADD CONSTRAINT `asso_3_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `role` (`rol_id`),
  ADD CONSTRAINT `asso_3_ibfk_2` FOREIGN KEY (`aut_id`) REFERENCES `autorization` (`aut_id`);

--
-- Contraintes pour la table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`use_id`) REFERENCES `user_` (`use_id`);

--
-- Contraintes pour la table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `maintenance_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`);

--
-- Contraintes pour la table `user_`
--
ALTER TABLE `user_`
  ADD CONSTRAINT `user__ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `role` (`rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
