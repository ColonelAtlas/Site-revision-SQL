-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 19 fév. 2025 à 07:52
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
) ENGINE=MyISAM AUTO_INCREMENT=212216 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cartes`
--

INSERT INTO `cartes` (`id_carte`, `question`, `reponse_vrai`, `reponse_fausse1`, `reponse_fausse2`, `reponse_fausse3`, `id_deck`, `id_chapitre`) VALUES
(4, 'En quelle année a commencé la Seconde Guerre mondiale ?', '1939', '1914', '1945', '1929', 2, 9),
(212206, 'Quelle activité humaine contribue le plus au réchauffement climatique ?', 'L’émission de gaz à effet de serre par la combustion d’énergies fossiles.', 'La consommation excessive d’eau.', 'La déforestation des forêts tropicales.', 'L’élevage de bovins.', 3, 17),
(7, 'Quelle est l\'unité de base de la vie ?', 'La cellule', 'L\'ADN', 'Le chromosome', 'Le gène', 3, 18),
(8, 'Quel organe est responsable de pomper le sang ?', 'Le cœur', 'Les poumons', 'Le foie', 'Le rein', 3, 18),
(9, 'Quelle molécule porte l\'information génétique ?', 'L\'ADN', 'L\'ARN', 'Les protéines', 'Les lipides', 3, 18),
(212205, 'Quel est le rôle principal des globules blancs ?', 'La défense immunitaire', 'Le transport de l’oxygène.', 'La coagulation sanguine.', 'La digestion des aliments.', 3, 18),
(212204, 'Quel organe est principalement responsable de la filtration du sang ?', 'Le rein.', 'Le foie.', 'Le pancréas.', 'La rate.', 3, 18),
(12, 'Que signifie SQL ?', 'Structured Query Language', 'Sequential Query Language', 'Standard Question Language', 'System Query Language', 4, 11),
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
(52, 'Dans une expérience de Bernoulli, combien de résultats possibles peut-on observer ?', 'Deux', 'Un', 'Trois', 'Quatre', 1, 6),
(53, 'Une fonction est continue sur un intervalle si :', 'Elle ne présente pas de saut ou d\'interruption sur cet intervalle.', 'Elle est dérivable en tout point.', 'Elle est définie sur cet intervalle', 'Elle est strictement croissante.', 1, 5),
(54, 'Si une fonction 𝑓 est continue sur [a, b] et f(a) * f(b) < 0, alors : ', 'Elle admet au moins une racine dans [𝑎,𝑏].', 'Elle est dérivable sur [a, b].', 'Elle est monotone sur [a, b].', 'Elle a une asymptote horizontale.', 1, 5),
(2121, 'Quel président américain met en place le \"New Deal\" pour lutter contre la crise ?', 'Franklin D. Roosevelt.', 'Herbert Hoover.', 'Woodrow Wilson.', 'Harry Truman.', 2, 7),
(12122, 'Quelle est la principale cause du krach boursier de 1929 ?', 'La spéculation excessive et l\'endettement des investisseurs.', 'Une crise agricole aux États-Unis.', 'La Première Guerre mondiale.', 'L\'effondrement de l\'industrie automobile.', 2, 7),
(212199, 'Quel est un trait commun aux régimes totalitaires des années 1930 ?', 'L\'usage de la propagande et de la répression politique.', 'La séparation des pouvoirs.', 'Le respect des droits de l’homme.', 'La démocratie parlementaire.', 2, 8),
(212202, 'Quelle bataille est considérée comme le tournant de la guerre en Europe ?', 'La bataille de Stalingrad.', 'La bataille de Midway.', 'L’attaque de Pearl Harbor.', 'Le débarquement en Normandie.', 2, 9),
(212201, 'Quelle idéologie caractérise le régime nazi ?', 'Le national-socialisme.', 'L\'anarchisme.', 'Le communisme.', 'Le libéralisme.', 2, 8),
(212203, 'Quel événement marque la fin de la Seconde Guerre mondiale en Asie ?', 'Le bombardement atomique d’Hiroshima et Nagasaki.', 'La libération de Paris.', 'La bataille de Guadalcanal.', 'La signature du pacte de Varsovie.', 2, 9),
(212207, 'Quel gaz est majoritairement responsable de l’effet de serre ?', 'Le dioxyde de carbone (CO₂)', 'L’oxygène.', 'L’ozone.', 'L’azote.', 3, 17),
(212208, 'Quelle est l’unité de base du vivant ?', 'La cellule.', 'L’atome.', 'Le tissu.', 'L’ADN.', 3, 16),
(212209, 'Comment appelle-t-on l’ensemble des réactions chimiques dans un organisme ?', 'Le métabolisme.', 'La photosynthèse.', 'La mitose.', 'La fermentation.', 3, 16),
(212210, 'Quelle structure de données suit le principe \"dernier entré, premier sorti\" (LIFO) ?', 'La pile (stack)', 'La file (queue).', 'L’arbre binaire.', 'Le tableau.', 4, 10),
(212211, 'Quelle est la complexité en temps moyen de la recherche dans une table de hachage ?', 'O(1)', 'O(n).', 'O(log n).', 'O(n²).', 4, 10),
(212212, 'Quel langage est principalement utilisé pour manipuler les bases de données relationnelles ?', 'SQL.', 'Python.', 'C++.', 'HTML.', 4, 11),
(212213, 'Quelle est la clé primaire d\'une table en base de données ?', 'Un champ unique identifiant chaque ligne.', 'Un champ contenant uniquement des nombres.', 'Une colonne stockant les mots de passe.', 'Un champ pouvant contenir des valeurs nulles.', 4, 11),
(212214, 'Quel algorithme est utilisé pour trouver le plus court chemin dans un graphe ?', 'L’algorithme de Dijkstra.', 'L’algorithme de tri rapide (quicksort).', 'L’algorithme de recherche dichotomique.', 'L’algorithme de compression de Huffman.', 4, 12),
(212215, 'Quelle notation représente la complexité temporelle du tri par fusion (merge sort) ?', 'O(n log n).', 'O(n²).', 'O(n).', 'O(log n).', 4, 12);

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
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `image`) VALUES
(17, 'user_67b443c794b966.23167094.jpeg'),
(14, 'user_67b381127d0760.13021502.jpeg'),
(20, 'user_67b442d807f458.05426484.jpeg'),
(2, 'user_67b4392bcd8a12.28729918.png'),
(1, 'user_67b43aacef5587.97744961.png'),
(23, 'user_67b441841154f3.41976279.jpg'),
(21, 'user_67b442a27091b8.51333725.jpeg'),
(10, 'user_67b443378ff945.32546720.jpeg'),
(16, 'user_67b44359641451.58729224.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ttl_quizz` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `mdp`, `created_at`, `ttl_quizz`) VALUES
(1, 'Tidiane', 'abcd', '2025-02-17 18:29:21', 99),
(2, 'aza', '1234', '2025-02-17 18:29:21', 3),
(4, 'ad', 'triangle', '2025-02-17 18:29:21', 0),
(5, '_oys', 'boule', '2025-02-17 18:29:21', 0),
(7, 'eczc', 'hj', '2025-02-17 18:29:21', 0),
(8, 'eczc', 'ii', '2025-02-17 18:29:21', 0),
(9, 'ededfe', 'pp', '2025-02-17 18:29:21', 0),
(10, 'atlas', 'blabla', '2025-02-17 18:29:21', 13),
(11, 'test', 'mdptest', '2025-02-17 18:29:21', 0),
(13, 'testblablabla', 'test', '2025-02-17 18:29:21', 0),
(14, 'atlasv2', 'mdp', '2025-02-17 18:29:21', 0),
(15, 'pop', 'pppppp', '2025-02-17 18:29:21', 0),
(16, 'kirikou', 'PMM', '2025-02-17 18:29:21', 67),
(17, 'blopty le boss', '23', '2025-02-17 18:29:21', 59),
(23, 'ethan', '123', '2025-02-18 08:14:05', 999),
(18, 'ze', '9876', '2025-02-17 18:48:59', 0),
(20, 'poly', 'za', '2025-02-17 18:55:48', 2),
(21, 'pol', 'zz', '2025-02-18 07:10:49', 23);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
