-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 20 nov. 2024 à 14:30
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
-- Base de données : `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id_livre` int(11) NOT NULL,
  `nom_livre` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `etat` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id_livre`, `nom_livre`, `categorie`, `auteur`, `etat`, `description`, `photo`) VALUES
(1, 'Shining', 'HORREUR', 'Stephen King', 'disponible', 'L’histoire terrifiante d’un hôtel hanté et de son gardien qui sombre peu à peu dans la folie.', ''),
(2, 'Exorciste', 'HORREUR', 'William Peter Blatty', 'disponible', 'Une œuvre glaçante inspirée d’un véritable cas de possession démoniaque.', ''),
(3, 'Orgueil et Préjugés', 'ROMANCE', 'Jane Austen', 'disponible', 'Une comédie romantique intemporelle sur les relations, les préjugés et les premières impressions.', ''),
(4, 'Les Hauts de Hurlevent', 'ROMANCE', 'Emily Brontë', 'disponible', 'Une histoire d\'amour intense et tragique, empreinte de passion et de vengeance.', ''),
(5, 'Le Comte de Monte-Cristo', 'HISTORIQUE', 'Alexandre Dumas', 'disponible', 'Un chef-d’œuvre de vengeance et de rédemption dans le contexte du XIXᵉ siècle.', ''),
(6, 'Les Piliers de la Terre', 'HISTORIQUE', 'Ken Follett', 'disponible', 'Un roman épique qui plonge dans l\'Angleterre médiévale du XIIᵉ siècle, suivant la construction d\'une cathédrale au cœur des intrigues politiques, religieuses et sociales de l\'époque.', ''),
(7, 'La Vérité sur l\'affaire Harry Quebert', 'POLICIER', 'Joël Dicker', 'disponible', 'Un roman haletant où un écrivain enquête sur la disparition d’une jeune fille survenue 30 ans plus tôt, mettant au jour des secrets dans une petite ville du New Hampshire.', ''),
(8, '1984', 'FICTION', 'George Orwell', 'disponible', 'Une dystopie glaçante sur un futur où règne la surveillance totale.', ''),
(9, 'Le Meilleur des mondes', 'FICTION', 'Aldous Huxley', 'disponible', 'Une vision futuriste et inquiétante d’une société déshumanisée.', ''),
(10, 'Le Chien des Baskerville', 'POLICIER', 'Arthur Conan Doyle', 'disponible', 'Une enquête de Sherlock Holmes mêlant mystère et ambiance gothique.', '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  `avatar` varchar(50) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `mdp`, `avatar`) VALUES
(1, 'nexus', 'gogo', 'new_user@gmail.com', '1234', 'default.png'),
(2, 'nexus', 'gogo', 'new_user@gmail.com', '1234', 'default.png'),
(3, 'nexus', 'gogo', 'new_user@gmail.com', '1234', 'default.png'),
(4, 'nexggg', 'gogo', 'new_user2@gmail.com', '12345', 'default.png'),
(5, 'nexggg', 'gogo', 'new_user2@gmail.com', '12345', 'default.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id_livre`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
