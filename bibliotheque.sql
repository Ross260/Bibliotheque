-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 10 déc. 2024 à 12:13
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
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id_emprunt` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `titre_livre` varchar(50) NOT NULL,
  `date_emprunt` text NOT NULL,
  `date_remise` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`id_emprunt`, `nom`, `titre_livre`, `date_emprunt`, `date_remise`) VALUES
(6, 'gogo', '1984', '21/11/2024', '06/12/2024'),
(10, 'gogo', 'Exorciste', '10/12/2024', '25/12/2024');

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
(2, 'Exorciste', 'HORREUR', 'William Peter Blatty', 'indisponible', 'Une œuvre glaçante inspirée d’un véritable cas de possession démoniaque.', ''),
(3, 'Orgueil et Préjugés', 'ROMANCE', 'Jane Austen', 'indisponible', 'Une comédie romantique intemporelle sur les relations, les préjugés et les premières impressions.', ''),
(4, 'Les Hauts de Hurlevent', 'ROMANCE', 'Emily Brontë', 'indisponible', 'Une histoire d\'amour intense et tragique, empreinte de passion et de vengeance.', ''),
(5, 'Le Comte de Monte-Cristo', 'HISTORIQUE', 'Alexandre Dumas', 'disponible', 'Un chef-d’œuvre de vengeance et de rédemption dans le contexte du XIXᵉ siècle.', ''),
(6, 'Les Piliers de la Terre', 'HISTORIQUE', 'Ken Follett', 'disponible', 'Un roman épique qui plonge dans l\'Angleterre médiévale du XIIᵉ siècle, suivant la construction d\'une cathédrale au cœur des intrigues politiques, religieuses et sociales de l\'époque.', ''),
(7, 'La Vérité sur l\'affaire Harry Quebert', 'POLICIER', 'Joël Dicker', 'indisponible', 'Un roman haletant où un écrivain enquête sur la disparition d’une jeune fille survenue 30 ans plus tôt, mettant au jour des secrets dans une petite ville du New Hampshire.', ''),
(8, '1984', 'FICTION', 'George Orwell', 'indisponible', 'Une dystopie glaçante sur un futur où règne la surveillance totale.', ''),
(9, 'Le Meilleur des mondes', 'FICTION', 'Aldous Huxley', 'disponible', 'Une vision futuriste et inquiétante d’une société déshumanisée.', ''),
(10, 'Le Chien des Baskerville', 'POLICIER', 'Arthur Conan Doyle', 'indisponible', 'Une enquête de Sherlock Holmes mêlant mystère et ambiance gothique.', ''),
(11, 'sdf', 'romance', 'sdfsd', 'indisponible', 'sdfsdfsdf', '_791e2350-e58c-436d-81be-f96c075c3216.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_resa` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `titre_livre` varchar(50) NOT NULL,
  `date_resa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_resa`, `nom`, `titre_livre`, `date_resa`) VALUES
(1, 'gogo', 'Shining', '22/06/2024'),
(2, 'gogo', 'Exorciste', '22/06/2024'),
(3, 'gogo', 'Exorciste', '22/06/2024'),
(4, 'gogo', 'Shining', '22/06/2024'),
(5, 'gogo', 'Shining', '22/06/2024'),
(6, 'gogo', 'Shining', '22/06/2024');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `mdp`) VALUES
(1, 'nexus', 'gogo', 'new_user@gmail.com', '1234'),
(2, 'nexus', 'gogo', 'new_user@gmail.com', '1234'),
(3, 'nexus', 'gogo', 'new_user@gmail.com', '1234'),
(4, 'nexggg', 'gogo', 'new_user2@gmail.com', '12345'),
(5, 'nexggg', 'gogo', 'new_user2@gmail.com', '12345'),
(6, 'Donald', 'sae', 'donaldsae@gmail.com', '1234');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id_emprunt`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id_livre`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_resa`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id_emprunt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id_livre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_resa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
