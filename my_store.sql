-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 30 mars 2023 à 03:53
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `my_store`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name_pr` varchar(100) NOT NULL,
  `pr_description` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image_pr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_cmd` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_cl` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address_cl` varchar(100) NOT NULL,
  `total_price` int(255) NOT NULL,
  `time_order` varchar(50) NOT NULL,
  `number_cl` varchar(11) NOT NULL,
  `payment_statu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_cmd`, `user_id`, `name_cl`, `email`, `address_cl`, `total_price`, `time_order`, `number_cl`, `payment_statu`) VALUES
(51, 67, 'abdelellah issile', 'ouchgout@gmail.com', 'LOT NAHDA EL KOBRA OULED TEIMA, OULED TEIMA', 1050, '21-Mar-2023 ', '0770101897', 'LivrÃ©'),
(52, 67, 'abdelellah issile', 'ouchgout@gmail.com', 'LOT NAHDA EL KOBRA OULED TEIMA, OULED TEIMA', 300, '25-Mar-2023 ', '2555', 'LivrÃ©'),
(53, 67, 'abdelellah issile', 'ouchgout@gmail.com', 'LOT NAHDA EL KOBRA OULED TEIMA, OULED TEIMA', 150, '28-Mar-2023 ', '02555', 'pending'),
(54, 67, 'abdelellah issile', 'ouchgout@gmail.com', 'LOT NAHDA EL KOBRA OULED TEIMA, OULED TEIMA', 7500, '30-Mar-2023 ', '022', 'pending');

-- --------------------------------------------------------

--
-- Structure de la table `detaille`
--

CREATE TABLE `detaille` (
  `id` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_pr` varchar(255) NOT NULL,
  `pr_description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image_pr` varchar(255) NOT NULL,
  `time_order` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `detaille`
--

INSERT INTO `detaille` (`id`, `id_commande`, `product_id`, `user_id`, `name_pr`, `pr_description`, `price`, `quantity`, `image_pr`, `time_order`) VALUES
(124, 51, 75, 67, 'Ã©chelle ', 'Ã‰chelle platinium transformable - 2 plans aluminium - H. dÃ©ployÃ© 3 m', 100, 10, 'pngegg (13).png', '21-Mar-2023'),
(125, 51, 79, 67, 'mob', 'Truelle berthelet - lame acier - L. 18.5 cm', 50, 1, 'pngegg (9).png', '21-Mar-2023'),
(126, 52, 79, 67, 'mob', 'Truelle berthelet - lame acier - L. 18.5 cm', 50, 6, 'pngegg (9).png', '25-Mar-2023'),
(127, 53, 75, 67, 'Ã©chelle ', 'Ã‰chelle platinium transformable - 2 plans aluminium - H. dÃ©ployÃ© 3 m', 100, 1, 'pngegg (13).png', '28-Mar-2023'),
(128, 53, 79, 67, 'mob', 'Truelle berthelet - lame acier - L. 18.5 cm', 50, 1, 'pngegg (9).png', '28-Mar-2023'),
(129, 54, 81, 67, 'Brouette ', 'Brouette Ã  arceau renforcÃ© 100 l - roue Ã˜ 40 cm - 140x70x61Â cmÂ -Â 13Â kg', 150, 50, 'pngegg (2).png', '30-Mar-2023');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `pr_description` varchar(255) NOT NULL,
  `category_type` varchar(100) NOT NULL,
  `p_type` varchar(100) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(60,0) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `pr_description`, `category_type`, `p_type`, `product_image`, `product_price`, `quantity`) VALUES
(71, 'truellet', 'truelle Ã  pointe ronde 22cm', 'Materiaux,gros oeuvre', 'Vous_aimerez_aussi', 'pngegg (6).png', '45', 2000),
(75, 'Ã©chelle ', 'Ã‰chelle platinium transformable - 2 plans aluminium - H. dÃ©ployÃ© 3 m', 'Materiaux,gros oeuvre', 'Les_produits_de_mois', 'pngegg (13).png', '100', 1000),
(76, 'brique 9', 'Brique creuse terre cuite P.50 x H.20 x Ep.20 cm-BOUYERÂ LEROUX', 'Materiaux,gros oeuvre', 'Les_produits_de_mois', 'pngegg (5).png', '4', 245),
(77, 'ciment', 'Ciment gris multi-usages- sac de 25 kg', 'Materiaux,gros oeuvre', 'Vous_aimerez_aussi', 'cimarpro_v_octobre_2019.jpeg', '75', 100),
(79, 'mob', 'Truelle berthelet - lame acier - L. 18.5 cm', 'Materiaux,gros oeuvre', 'Les_produits_de_mois', 'pngegg (9).png', '50', 520),
(80, 'fer t16', 'FER ,MatÃ©riaux de construction', 'Materiaux,gros oeuvre', 'Vous_aimerez_aussi', 'pngegg (4).png', '1100', 10000),
(81, 'Brouette ', 'Brouette Ã  arceau renforcÃ© 100 l - roue Ã˜ 40 cm - 140x70x61Â cmÂ -Â 13Â kg', 'Materiaux,gros oeuvre', 'Vous_aimerez_aussi', 'pngegg (2).png', '150', 400);

-- --------------------------------------------------------

--
-- Structure de la table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_type`) VALUES
(67, ' issile', 'issile@gmail.com', '0000', 'user.png', 'user'),
(69, 'admin2', 'admin2@gmail.com', '1111', 'ph.jpg', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_cmd`);

--
-- Index pour la table `detaille`
--
ALTER TABLE `detaille`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_cmd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `detaille`
--
ALTER TABLE `detaille`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT pour la table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
