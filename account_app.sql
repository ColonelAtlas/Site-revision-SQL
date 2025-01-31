-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 31 jan. 2025 à 09:24
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `account_app`
--

-- --------------------------------------------------------

--
-- Structure de la table `cartes`
--

DROP TABLE IF EXISTS `cartes`;
CREATE TABLE IF NOT EXISTS `cartes` (
  `id_carte` int NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `reponse_vrai` varchar(255) NOT NULL,
  `reponse_fausse1` varchar(255) NOT NULL,
  `reponse_fausse2` varchar(255) NOT NULL,
  `reponse_fausse3` varchar(255) NOT NULL,
  `id_deck` int NOT NULL,
  `id_chapitre` int NOT NULL,
  PRIMARY KEY (`id_carte`),
  KEY `id_deck` (`id_deck`),
  KEY `id_chapitre` (`id_chapitre`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cartes`
--

INSERT INTO `cartes` (`id_carte`, `question`, `reponse_vrai`, `reponse_fausse1`, `reponse_fausse2`, `reponse_fausse3`, `id_deck`, `id_chapitre`) VALUES
(1, 'Quel est le carré de 5 ?', '25', '20', '30', '35', 1, 0),
(2, 'Combien font 8 x 7 ?', '56', '49', '63', '48', 1, 0),
(3, 'Quelle est la valeur de π approximée ?', '3.14', '3', '3.5', '3.1416', 1, 0),
(4, 'En quelle année a commencé la Seconde Guerre mondiale ?', '1939', '1914', '1945', '1929', 2, 0),
(5, 'Qui a été le premier président des États-Unis ?', 'George Washington', 'Abraham Lincoln', 'Thomas Jefferson', 'John Adams', 2, 0),
(6, 'Quel événement a marqué la fin de l\'Empire romain ?', 'La chute de Constantinople', 'La bataille de Hastings', 'La prise de la Bastille', 'La guerre de Cent Ans', 2, 0),
(7, 'Quelle est l\'unité de base de la vie ?', 'La cellule', 'L\'ADN', 'Le chromosome', 'Le gène', 3, 0),
(8, 'Quel organe est responsable de pomper le sang ?', 'Le cœur', 'Les poumons', 'Le foie', 'Le rein', 3, 0),
(9, 'Quelle molécule porte l\'information génétique ?', 'L\'ADN', 'L\'ARN', 'Les protéines', 'Les lipides', 3, 0),
(10, 'Quel langage est utilisé pour le développement web côté client ?', 'JavaScript', 'Python', 'Java', 'C++', 4, 0),
(11, 'Quel est le rôle du HTML ?', 'Structurer une page web', 'Appliquer des styles', 'Créer des animations', 'Gérer une base de données', 4, 0),
(12, 'Que signifie SQL ?', 'Structured Query Language', 'Sequential Query Language', 'Standard Question Language', 'System Query Language', 4, 0),
(13, 'La récurrence se compose de combien d’étapes ?', 'Deux', 'Une', 'Trois', 'Quatre', 1, 1),
(14, 'Quelle est la première étape de la démonstration par récurrence ?', 'Initialisation', 'Induction', 'Hypothèse', 'Conclusion', 1, 1),
(15, 'Dans l’hypothèse de récurrence, que suppose-t-on ?', 'P(k) est vraie', 'P(k+1) est fausse', 'P(k) et P(k+1) sont fausses', 'Rien', 1, 1),
(16, 'Que prouve-t-on lors de l’étape d’induction ?', 'P(k+1) à partir de P(k)', 'P(k)', 'P(k) est fausse', 'Rien', 1, 1),
(17, 'Quelle propriété doit satisfaire une démonstration par récurrence ?', 'Valider P(n) pour tout n ≥ n₀', 'Valider P(n) pour un n particulier', 'Ne prouver rien', 'Utiliser une fonction', 1, 1),
(18, 'Quelle est la limite de la suite 1/n quand n tend vers l’infini ?', '0', '1', '∞', '-1', 1, 2),
(19, 'Comment appelle-t-on une suite qui a une limite finie ?', 'Convergente', 'Divergente', 'Croissante', 'Alternée', 1, 2),
(20, 'Quelle est la limite de la suite n² quand n tend vers l’infini ?', '∞', '0', '1', '-∞', 1, 2),
(21, 'La suite (-1)^n est-elle convergente ?', 'Non', 'Oui, vers 0', 'Oui, vers 1', 'Oui, vers -1', 1, 2),
(22, 'Si une suite est majorée et croissante, que peut-on conclure ?', 'Elle converge', 'Elle diverge', 'Elle est constante', 'Rien', 1, 2),
(23, 'Quelle est la limite de sin(x)/x quand x tend vers 0 ?', '1', '0', '∞', '-1', 1, 3),
(24, 'Que signifie lim f(x) = L lorsque x tend vers a ?', 'f(x) se rapproche de L', 'f(x) tend vers ∞', 'f(x) est constant', 'f(x) est décroissant', 1, 3),
(25, 'Si lim f(x) = ∞ et g(x) = 1/f(x), alors lim g(x) = ?', '0', '∞', '1', '-∞', 1, 3),
(26, 'La limite d’une fonction est-elle forcément atteinte ?', 'Non', 'Oui', 'Seulement si elle est croissante', 'Seulement si elle est décroissante', 1, 3),
(27, 'Quelle est la limite de e^x lorsque x tend vers -∞ ?', '0', '∞', '1', '-1', 1, 3),
(28, 'Quelle est la dérivée de sin(2x) ?', '2cos(2x)', 'cos(2x)', '2sin(x)', '-2sin(x)', 1, 4),
(29, 'Quelle est la formule pour dériver f(g(x)) ?', 'f\'(g(x)) * g\'(x)', 'f\'(x) + g\'(x)', 'f\'(x) * g\'(x)', 'f(x) * g(x)', 1, 4),
(30, 'Quelle est la dérivée de e^(3x) ?', '3e^(3x)', 'e^(3x)', 'x * e^(3x)', '0', 1, 4),
(31, 'Quelle est la dérivée de ln(2x) ?', '1/x', '2/x', '1/2x', '-1/x', 1, 4),
(32, 'La dérivée d’une fonction composée est-elle nécessairement continue ?', 'Oui', 'Non', 'Seulement si elle est croissante', 'Seulement si elle est décroissante', 1, 4),
(33, 'Quelle est la probabilité d’un événement impossible ?', '0', '1', '0.5', '-1', 1, 6),
(34, 'Dans une expérience où il y a deux issues, quel type de variable modélise les résultats ?', 'Une variable de Bernoulli', 'Une variable normale', 'Une variable uniforme', 'Une variable continue', 1, 6),
(35, 'La somme des probabilités de tous les événements élémentaires dans un espace probabilisé est ?', '1', '0', '∞', '-1', 1, 6),
(36, 'Dans la loi de Bernoulli, quelle est la probabilité de succès ?', 'p', 'q', '1-p', 'pq', 1, 6),
(37, 'Dans une loi binomiale, que représente le paramètre \"n\" ?', 'Le nombre d’épreuves', 'La probabilité de succès', 'Le nombre de succès', 'La probabilité d’échec', 1, 6),
(38, 'Si A et B sont indépendants, quelle est la probabilité de leur intersection P(A ∩ B) ?', 'P(A) * P(B)', 'P(A) + P(B)', 'P(A)', 'P(B)', 1, 6),
(39, 'Quelle est l’espérance mathématique d’une variable aléatoire suivant une loi de Bernoulli ?', 'p', 'q', 'n', 'np', 1, 6),
(40, 'Quelle est la variance d’une variable aléatoire suivant une loi de Bernoulli ?', 'p(1-p)', 'p', 'q', 'p^2', 1, 6),
(41, 'Si P(A) = 0.6 et P(B) = 0.4, et que A et B sont indépendants, quelle est P(A ∩ B) ?', '0.24', '1.0', '0.2', '0.0', 1, 6),
(42, 'Quelle loi permet de modéliser le nombre de succès dans une série de n épreuves indépendantes ?', 'Loi binomiale', 'Loi de Bernoulli', 'Loi uniforme', 'Loi normale', 1, 6),
(43, 'Dans une loi binomiale B(n, p), que représente le paramètre \"p\" ?', 'La probabilité de succès', 'La probabilité d’échec', 'Le nombre d’épreuves', 'Le nombre d’échecs', 1, 6),
(44, 'Une expérience suit une loi de Bernoulli avec p=0.3. Quelle est la probabilité d’échec ?', '0.7', '0.3', '1.0', '0.5', 1, 6),
(45, 'Une pièce équilibrée est lancée 10 fois. Quelle est la probabilité d’obtenir exactement 5 fois \"pile\" ?', 'C(10,5) * 0.5^10', '0.5', '1.0', 'C(5,10) * 0.5^10', 1, 6),
(46, 'La loi de Bernoulli est un cas particulier de quelle autre loi ?', 'Loi binomiale', 'Loi uniforme', 'Loi normale', 'Loi exponentielle', 1, 6),
(47, 'Pour une loi binomiale B(n, p), quel est le nombre moyen de succès attendu ?', 'n * p', 'n / p', 'p / n', 'n + p', 1, 6),
(48, 'Deux événements A et B sont-ils indépendants si P(A ∩ B) = P(A) * P(B) ?', 'Oui', 'Non', 'Toujours', 'Jamais', 1, 6),
(49, 'Dans un jeu, la probabilité de gagner est 0.2. Quelle est la probabilité de perdre ?', '0.8', '0.2', '1.0', '0.5', 1, 6),
(50, 'Si P(A) = 0.4 et P(B|A) = 0.5, quelle est P(A ∩ B) ?', '0.2', '0.1', '0.4', '0.5', 1, 6),
(51, 'Quelle est la probabilité de l’événement complémentaire de A ?', '1 - P(A)', '1 / P(A)', 'P(A)', '1 + P(A)', 1, 6),
(52, 'Dans une expérience de Bernoulli, combien de résultats possibles peut-on observer ?', 'Deux', 'Un', 'Trois', 'Quatre', 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `chapitre`
--

DROP TABLE IF EXISTS `chapitre`;
CREATE TABLE IF NOT EXISTS `chapitre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_chapitre` varchar(255) NOT NULL,
  `id_deck` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_deck` (`id_deck`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `chapitre`
--

INSERT INTO `chapitre` (`id`, `nom_chapitre`, `id_deck`) VALUES
(1, 'Raisonnement par récurrence', 1),
(2, 'Limites de suites', 1),
(3, 'Limites de fonctions', 1),
(4, 'Dérivée de fonctions', 1),
(5, 'Continuité des fonctions', 1),
(6, 'Succession d’épreuves indépendantes, lois de Bernoulli et binomiale', 1),
(7, 'L\'impact de la crise de 1929', 2),
(8, 'Les régimes totalitaires', 2),
(9, 'La Seconde Guerre mondiale', 2),
(10, 'Structures de données', 4),
(11, 'Bases de données', 4),
(12, 'Algorithmique', 4),
(18, 'Corps humain et santé', 3),
(17, 'Enjeux planétaires et contemporain', 3),
(16, 'La Terre, la Vie et l\'organisation du vivant', 3);

-- --------------------------------------------------------

--
-- Structure de la table `decks`
--

DROP TABLE IF EXISTS `decks`;
CREATE TABLE IF NOT EXISTS `decks` (
  `id_deck` int NOT NULL AUTO_INCREMENT,
  `nom_deck` varchar(255) NOT NULL,
  PRIMARY KEY (`id_deck`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `decks`
--

INSERT INTO `decks` (`id_deck`, `nom_deck`) VALUES
(1, 'Mathématiques'),
(2, 'Histoire'),
(3, 'SVT'),
(4, 'NSI');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `mdp`) VALUES
(1, 'Tidiane Ndiouck', '$2y$10$fq6A3z6Wje.bYXZE9ZYg/O5sEuRvOxSUtN43nQ/oPQxfiFpYTyHgu'),
(2, 'aa', '$2y$10$l6oyzC2iQ9I6uQxeDPebtO4CM2rFBGl.cMTjKkqydwyfyJ7lLVJLu'),
(3, 'ad', 'd9e83874d260f2f10d48d98c0b773b836096d426'),
(4, 'ad', 'd9e83874d260f2f10d48d98c0b773b836096d426'),
(5, '_oys', '395df8f7c51f007019cb30201c49e884b46b92fa'),
(6, '_oys', '395df8f7c51f007019cb30201c49e884b46b92fa'),
(7, 'eczc', '84a516841ba77a5b4648de2cd0dfcb30ea46dbb4'),
(8, 'eczc', '84a516841ba77a5b4648de2cd0dfcb30ea46dbb4'),
(9, 'ededfe', '4a0a19218e082a343a1b17e5333409af9d98f0f5'),
(10, 'atlas', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(11, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(12, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(13, 'testblablabla', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(14, 'atlasv2', '9cf95dacd226dcf43da376cdb6cbba7035218921'),
(15, 'pop', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(16, 'kirikou', '3694b814c885489f681499d14fd7991b5ebb155f'),
(17, 'blop', '695d1218171016ba0addc51a2d1f01e375077539');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
