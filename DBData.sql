--
-- Structure de la table `domain`
--

-- CREATE TABLE `domain` (
--   `Domain_ID` int(11) NOT NULL,
--   `Name` varchar(255) NOT NULL,
--   `Description` text,
--   `Color` varchar(7) NOT NULL DEFAULT '#FFFFFF'
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `domain`
--

INSERT INTO `domain` (`Domain_ID`, `Name`, `Description`, `Color`) VALUES
(0, 'Apprendre ensemble pour vivre ensemble', NULL, '#FFFFFF'),
(1, 'Mobiliser le langage dans toutes ses dimensions', NULL, '#fc5603'),
(2, 'Agir, s\'exprimer, comprendre à travers l\'activité physique', NULL, '#fc03f0'),
(3, 'Agir, s\'exprimer, comprendre à travers les activités artistiques', NULL, '#FFFF00'),
(4, 'Construire les premiers outils pour structurer sa pensée', NULL, '#00FF00'),
(5, 'Explorer le monde', NULL, '#0084FF');

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

-- CREATE TABLE `skill` (
--   `Skill_ID` int(11) NOT NULL,
--   `Domain_ID` int(11) NOT NULL,
--   `Name` varchar(255) NOT NULL,
--   `Code` int(11) DEFAULT NULL,
--   `Trimester` int(11) NOT NULL,
--   `Image` varchar(255) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `skill`
--

INSERT INTO `skill` (`Skill_ID`, `Domain_ID`, `Name`, `Code`, `Trimester`, `Image`) VALUES
(6, 0, 'Je pose mon manteau à mon crochet', 1, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(11, 5, 'Je connais quelques règles d\'hygiène : je me lave les mains et me les essuie.', 1, 1, 'http://laclasse.depotter.fr/src/img/brevets/52.png'),
(12, 0, 'Je range mon bonnet et mon écharpe dans ma manche.', 2, 1, 'http://laclasse.depotter.fr/src/img/brevets/2.png'),
(13, 0, 'J\'enfile mon manteau.', 3, 1, 'http://laclasse.depotter.fr/src/img/brevets/8.png'),
(14, 0, 'J\'écoute la maîtresse quand elle parle.', 4, 2, 'http://laclasse.depotter.fr/src/img/brevets/6.png'),
(15, 0, 'Je m\'assois correctement au coin regroupement au signal', 5, 2, 'http://laclasse.depotter.fr/src/img/brevets/7.png'),
(16, 0, 'J\'accepte les activités proposées', 5, 2, 'http://laclasse.depotter.fr/src/img/brevets/10.png'),
(17, 0, 'Je suis poli avec les autres : bonjour, au revoir', 7, 3, 'http://laclasse.depotter.fr/src/img/brevets/4.png'),
(18, 0, 'Je suis poli avec les autres : s\'il te plait, merci', 8, 3, 'http://laclasse.depotter.fr/src/img/brevets/5.png'),
(19, 0, 'Je range la classe', 9, 3, 'http://laclasse.depotter.fr/src/img/brevets/9.png'),
(20, 0, 'Je me déplace avec le groupe', 10, 3, 'http://laclasse.depotter.fr/src/img/brevets/3.png'),
(21, 1, 'J\'entre en relation (verbale ou non verbale) avec les adultes', 1, 1, 'http://laclasse.depotter.fr/src/img/brevets/11.png'),
(22, 1, 'Je manipule un livre correctement', 2, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(23, 1, 'Je réalise des boudins en pâte à modeler', 3, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(24, 1, 'J\'écoute et je comprends une consigne simple en petit groupe', 4, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(25, 1, 'Je raconte le contenu de mon cahier de vie', 5, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(26, 1, 'Je repère le titre d\'un livre', 6, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(27, 1, 'Je réalise des boules en pâte à modeler', 7, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(28, 1, 'Je réponds à l\'adulte de manière compréhensible', 8, 2, 'http://laclasse.depotter.fr/src/img/brevets/12.png'),
(29, 1, 'Je décris une image', 9, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(30, 1, 'Je réponds à des questions simples sur une histoire entendue', 10, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(31, 1, 'Je récite une comptine', 11, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(32, 1, 'Je reconnais mon prénom à l\'aide de mon initiale', 12, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(33, 2, 'Je me déplace en courant', 1, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(34, 1, 'Je me déplace en pédalant sur un tricycle', 2, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(35, 2, 'Je m\'exprime sur une musique', 3, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(36, 2, 'Je me déplace en sautant', 4, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(37, 2, 'Je me déplace en marchant en équilibre', 5, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(38, 2, 'Je prends part à un jeu collectif', 6, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(39, 2, 'Je lance : une balle, un sac, un anneau', 7, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(40, 2, 'Je monte et je descends les escaliers en alternant les pieds', 8, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(41, 2, 'J\'effectue un parcours en salle de motricité', 9, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(42, 3, 'Je reconnais les couleurs : rouge, bleu, jaune, vert', 1, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(43, 3, 'J\'écoute de la musique en étant attentif', 2, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(44, 3, 'Je chante', 3, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(45, 3, 'Je joue les rythmes avec mon corps', 4, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(46, 3, 'J\'utilise mes compétences graphiques (cercle et lignes) pour réaliser des dessins figuratifs', 5, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(47, 3, 'Je découvre les différents outils, supports et matériaux', 6, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(48, 3, 'Je découvre les instruments de musique', 7, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(49, 3, 'Je participe à un projet artistique collectif', 8, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(50, 4, 'J\'évalue une quantité : peu, beaucoup', 1, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(51, 4, 'Je réalise des puzzles d\'encastrements', 2, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(52, 4, 'Je trie selon les couleurs', 3, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(53, 4, 'Je connais la comptine numérique jusqu\'à...(10)', 4, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(54, 3, 'Je trie selon les formes', 5, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(55, 4, 'Je distingue petit / grand', 6, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(56, 4, 'Je réalise un algorithme binaire', 7, 2, 'http://laclasse.depotter.fr/src/img/brevets/49.png'),
(57, 4, 'Je reconnais une quantité sans compter jusqu\'à...', 8, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(58, 4, 'Je connais les différentes représentations du nombre jusqu\'à 3', 9, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(59, 4, 'Je réalise un puzzle ...(9 minimum)', 10, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(60, 5, 'Je connais les différentes parties de mon corps', 2, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(61, 5, 'Je jette les déchets dans la bonne poubelle', 3, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(62, 5, 'Je découpe en tenant correctement mes ciseaux et mon papier', 4, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(63, 5, 'Je colle', 5, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(64, 5, 'J\'ordonne une suite d\'images', 6, 3, 'http://laclasse.depotter.fr/src/img/brevets/50.png'),
(65, 5, 'Je me situe dans l\'espace', 7, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(66, 5, 'J\'observe les animaux', 8, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(67, 5, 'J\'observe les végétaux : graine / pas graine', 9, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(68, 5, 'Je pince un objet entre 2 doigts', 10, 3, 'http://laclasse.depotter.fr/src/img/brevets/58.png');

-- --------------------------------------------------------