-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 10 jan. 2025 à 00:44
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
-- Base de données : `garageapp`
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
-- Structure de la table `brand`
--

CREATE TABLE `brand` (
                         `bra_id` int(11) NOT NULL,
                         `bra_label` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `brand`
--

INSERT INTO `brand` (`bra_id`, `bra_label`) VALUES
                                                (1, 'Renault'),
                                                (2, 'Peugeot'),
                                                (3, 'Citroën'),
                                                (4, 'Volkswagen'),
                                                (5, 'BMW'),
                                                (6, 'Mercedes-Benz'),
                                                (7, 'Audi'),
                                                (8, 'Ford'),
                                                (9, 'Toyota'),
                                                (10, 'Nissan'),
                                                (11, 'Hyundai'),
                                                (12, 'Kia');

-- --------------------------------------------------------

--
-- Structure de la table `car`
--

CREATE TABLE `car` (
                       `car_id` int(11) NOT NULL,
                       `car_year` year(4) DEFAULT NULL,
                       `car_kilometers` int(11) DEFAULT NULL,
                       `car_fuelType` varchar(50) DEFAULT NULL,
                       `car_licensePlate` varchar(50) DEFAULT NULL,
                       `car_notes` varchar(500) DEFAULT NULL,
                       `car_modelId` int(11) NOT NULL,
                       `car_brandId` int(11) NOT NULL,
                       `car_useId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `car`
--

INSERT INTO `car` (`car_id`, `car_year`, `car_kilometers`, `car_fuelType`, `car_licensePlate`, `car_notes`, `car_modelId`, `car_brandId`, `car_useId`) VALUES
                                                                                                                                                           (1, '2000', 100000, 'Diesel', 'BL-830-ZV', NULL, 26, 3, 6),
                                                                                                                                                           (2, '2004', 185000, 'diesel', 'BL-830-ZV', NULL, 138, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `maintenance`
--

CREATE TABLE `maintenance` (
                               `mai_id` int(11) NOT NULL,
                               `mai_description` varchar(500) DEFAULT NULL,
                               `mai_price` decimal(15,2) DEFAULT NULL,
                               `mai_photo` varchar(50) DEFAULT NULL,
                               `mai_date` date DEFAULT NULL,
                               `mai_typeId` int(11) NOT NULL,
                               `mai_carId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `maintenance`
--

INSERT INTO `maintenance` (`mai_id`, `mai_description`, `mai_price`, `mai_photo`, `mai_date`, `mai_typeId`, `mai_carId`) VALUES
    (1, '', 60.00, NULL, '2024-11-02', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `model`
--

CREATE TABLE `model` (
                         `mod_id` int(11) NOT NULL,
                         `mod_label` varchar(50) DEFAULT NULL,
                         `mod_brandId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `model`
--

INSERT INTO `model` (`mod_id`, `mod_label`, `mod_brandId`) VALUES
                                                               (1, 'Clio', 1),
                                                               (2, 'Mégane', 1),
                                                               (3, 'Captur', 1),
                                                               (4, 'Twingo', 1),
                                                               (5, 'Espace', 1),
                                                               (6, 'Kadjar', 1),
                                                               (7, 'Zoé', 1),
                                                               (8, 'Arkana', 1),
                                                               (9, 'Kangoo', 1),
                                                               (10, 'Master', 1),
                                                               (11, 'Trafic', 1),
                                                               (12, '208', 2),
                                                               (13, '308', 2),
                                                               (14, '2008', 2),
                                                               (15, '3008', 2),
                                                               (16, '5008', 2),
                                                               (17, '508', 2),
                                                               (18, '108', 2),
                                                               (19, 'Rifter', 2),
                                                               (20, 'Partner', 2),
                                                               (21, 'Expert', 2),
                                                               (22, 'Traveller', 2),
                                                               (23, 'C3', 3),
                                                               (24, 'C4', 3),
                                                               (25, 'C5 Aircross', 3),
                                                               (26, 'C1', 3),
                                                               (27, 'C3 Aircross', 3),
                                                               (28, 'Berlingo', 3),
                                                               (29, 'Jumpy', 3),
                                                               (30, 'SpaceTourer', 3),
                                                               (31, 'C5 X', 3),
                                                               (32, 'Ami', 3),
                                                               (33, 'ë-C4', 3),
                                                               (34, 'Golf', 4),
                                                               (35, 'Polo', 4),
                                                               (36, 'Tiguan', 4),
                                                               (37, 'Passat', 4),
                                                               (38, 'Touareg', 4),
                                                               (39, 'T-Roc', 4),
                                                               (40, 'T-Cross', 4),
                                                               (41, 'Arteon', 4),
                                                               (42, 'Touran', 4),
                                                               (43, 'Caddy', 4),
                                                               (44, 'ID.3', 4),
                                                               (45, 'Série 3', 5),
                                                               (46, 'X3', 5),
                                                               (47, 'Série 1', 5),
                                                               (48, 'Série 5', 5),
                                                               (49, 'X1', 5),
                                                               (50, 'X5', 5),
                                                               (51, 'Série 4', 5),
                                                               (52, 'i3', 5),
                                                               (53, 'Z4', 5),
                                                               (54, 'M3', 5),
                                                               (55, 'M5', 5),
                                                               (56, 'Classe C', 6),
                                                               (57, 'Classe A', 6),
                                                               (58, 'GLE', 6),
                                                               (59, 'Classe E', 6),
                                                               (60, 'Classe S', 6),
                                                               (61, 'GLA', 6),
                                                               (62, 'GLC', 6),
                                                               (63, 'GLS', 6),
                                                               (64, 'CLA', 6),
                                                               (65, 'CLS', 6),
                                                               (66, 'EQC', 6),
                                                               (67, 'A3', 7),
                                                               (68, 'A4', 7),
                                                               (69, 'Q5', 7),
                                                               (70, 'A1', 7),
                                                               (71, 'A5', 7),
                                                               (72, 'A6', 7),
                                                               (73, 'A7', 7),
                                                               (74, 'A8', 7),
                                                               (75, 'Q2', 7),
                                                               (76, 'Q3', 7),
                                                               (77, 'Q7', 7),
                                                               (78, 'Fiesta', 8),
                                                               (79, 'Focus', 8),
                                                               (80, 'Kuga', 8),
                                                               (81, 'Mondeo', 8),
                                                               (82, 'Puma', 8),
                                                               (83, 'Ecosport', 8),
                                                               (84, 'Galaxy', 8),
                                                               (85, 'S-MAX', 8),
                                                               (86, 'Mustang', 8),
                                                               (87, 'Ranger', 8),
                                                               (88, 'Transit', 8),
                                                               (89, 'Yaris', 9),
                                                               (90, 'Corolla', 9),
                                                               (91, 'RAV4', 9),
                                                               (92, 'C-HR', 9),
                                                               (93, 'Prius', 9),
                                                               (94, 'Auris', 9),
                                                               (95, 'Camry', 9),
                                                               (96, 'Hilux', 9),
                                                               (97, 'Land Cruiser', 9),
                                                               (98, 'Aygo', 9),
                                                               (99, 'Proace', 9),
                                                               (100, 'Qashqai', 10),
                                                               (101, 'Juke', 10),
                                                               (102, 'Micra', 10),
                                                               (103, 'Leaf', 10),
                                                               (104, 'X-Trail', 10),
                                                               (105, 'Navara', 10),
                                                               (106, '370Z', 10),
                                                               (107, 'GT-R', 10),
                                                               (108, 'Murano', 10),
                                                               (109, 'Pathfinder', 10),
                                                               (110, 'NV200', 10),
                                                               (111, 'Tucson', 11),
                                                               (112, 'i30', 11),
                                                               (113, 'Kona', 11),
                                                               (114, 'i10', 11),
                                                               (115, 'i20', 11),
                                                               (116, 'Santa Fe', 11),
                                                               (117, 'Nexo', 11),
                                                               (118, 'Ioniq', 11),
                                                               (119, 'Bayon', 11),
                                                               (120, 'Staria', 11),
                                                               (121, 'i40', 11),
                                                               (122, 'Sportage', 12),
                                                               (123, 'Ceed', 12),
                                                               (124, 'Picanto', 12),
                                                               (125, 'Rio', 12),
                                                               (126, 'Stonic', 12),
                                                               (127, 'Sorento', 12),
                                                               (128, 'Niro', 12),
                                                               (129, 'EV6', 12),
                                                               (130, 'Carnival', 12),
                                                               (131, 'Optima', 12),
                                                               (132, 'Soul', 12),
                                                               (135, 'test', 11),
                                                               (138, '206', 2);

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
-- Structure de la table `type`
--

CREATE TABLE `type` (
                        `typ_id` int(11) NOT NULL,
                        `typ_label` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`typ_id`, `typ_label`) VALUES
                                               (1, 'Vidange'),
                                               (2, 'Remplacement filtre à huile'),
                                               (3, 'Remplacement filtre à air'),
                                               (4, 'Remplacement filtre d\'habitacle'),
                                               (5, 'Remplacement bougies d\'allumage'),
                                               (6, 'Remplacement liquide de frein'),
                                               (7, 'Remplacement liquide de refroidissement'),
                                               (8, 'Contrôle des plaquettes de frein'),
                                               (9, 'Remplacement des plaquettes de frein'),
                                               (10, 'Contrôle des disques de frein'),
                                               (11, 'Remplacement des disques de frein'),
                                               (12, 'Remplacement des pneus'),
                                               (14, 'Remplacement de la batterie'),
                                               (15, 'Contrôle de l\'éclairage'),
                                               (16, 'Remplacement des ampoules'),
                                               (17, 'Contrôle des amortisseurs'),
                                               (18, 'Remplacement des amortisseurs'),
                                               (19, 'Contrôle de la courroie de distribution'),
                                               (20, 'Remplacement de la courroie de distribution'),
                                               (21, 'Recharge de la climatisation'),
                                               (22, 'Contrôle du système d\'échappement'),
                                               (23, 'Contrôle de la direction');

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
                         `use_lastLogin` datetime DEFAULT NULL,
                         `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user_`
--

INSERT INTO `user_` (`use_id`, `use_firstname`, `use_lastname`, `use_login`, `use_password`, `use_lastLogin`, `rol_id`) VALUES
                                                                                                                            (2, 'Sebastien', 'Trullu', 'trullu.sebastien@gmail.com', '$2y$10$LhVtOh2xGw/wJFRD3fKH0.6Bv9YZBzE.RVCv.PPdD0Bx8c6J4Gm8u', '2025-01-08 21:46:17', 1),
                                                                                                                            (3, 'Marc', 'Trullu', 'marc30250@gmail.com', '$2y$10$s7/OKh3ztPeHlBTG0dbb/.Qv6AtFn9ko3zcavykeODRfHVipCFqaG', '2025-01-09 09:34:05', 2),
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
-- Index pour la table `brand`
--
ALTER TABLE `brand`
    ADD PRIMARY KEY (`bra_id`);

--
-- Index pour la table `car`
--
ALTER TABLE `car`
    ADD PRIMARY KEY (`car_id`),
    ADD KEY `mod_id` (`car_modelId`),
    ADD KEY `bra_id` (`car_brandId`),
    ADD KEY `use_id` (`car_useId`);

--
-- Index pour la table `maintenance`
--
ALTER TABLE `maintenance`
    ADD PRIMARY KEY (`mai_id`),
    ADD KEY `typ_id` (`mai_typeId`),
    ADD KEY `car_id` (`mai_carId`);

--
-- Index pour la table `model`
--
ALTER TABLE `model`
    ADD PRIMARY KEY (`mod_id`),
    ADD KEY `bra_id` (`mod_brandId`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
    ADD PRIMARY KEY (`rol_id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
    ADD PRIMARY KEY (`typ_id`);

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
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
    MODIFY `bra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `car`
--
ALTER TABLE `car`
    MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `maintenance`
--
ALTER TABLE `maintenance`
    MODIFY `mai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `model`
--
ALTER TABLE `model`
    MODIFY `mod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
    MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
    MODIFY `typ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `user_`
--
ALTER TABLE `user_`
    MODIFY `use_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
    ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`car_modelId`) REFERENCES `model` (`mod_id`),
    ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`car_brandId`) REFERENCES `brand` (`bra_id`),
    ADD CONSTRAINT `car_ibfk_3` FOREIGN KEY (`car_useId`) REFERENCES `user_` (`use_id`);

--
-- Contraintes pour la table `maintenance`
--
ALTER TABLE `maintenance`
    ADD CONSTRAINT `maintenance_ibfk_1` FOREIGN KEY (`mai_typeId`) REFERENCES `type` (`typ_id`),
    ADD CONSTRAINT `maintenance_ibfk_2` FOREIGN KEY (`mai_carId`) REFERENCES `car` (`car_id`);

--
-- Contraintes pour la table `model`
--
ALTER TABLE `model`
    ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`mod_brandId`) REFERENCES `brand` (`bra_id`);

--
-- Contraintes pour la table `user_`
--
ALTER TABLE `user_`
    ADD CONSTRAINT `user__ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `role` (`rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
