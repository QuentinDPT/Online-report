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
(1, 'Apprendre ensemble pour vivre ensemble', NULL, '#FFFFFF'),
(2, 'Mobiliser le langage dans toutes ses dimensions', NULL, '#fc5603'),
(3, 'Agir, s\'exprimer, comprendre à travers l\'activité physique', NULL, '#fc03f0'),
(4, 'Agir, s\'exprimer, comprendre à travers les activités artistiques', NULL, '#FFFF00'),
(5, 'Construire les premiers outils pour structurer sa pensée', NULL, '#00FF00'),
(6, 'Explorer le monde', NULL, '#0084FF');

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
(6 , 1, 'Je pose mon manteau à mon crochet', 1, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(11, 6, 'Je connais quelques règles d\'hygiène : je me lave les mains et me les essuie.', 1, 1, 'http://laclasse.depotter.fr/src/img/brevets/52.png'),
(12, 1, 'Je range mon bonnet et mon écharpe dans ma manche.', 2, 1, 'http://laclasse.depotter.fr/src/img/brevets/2.png'),
(13, 1, 'J\'enfile mon manteau.', 3, 1, 'http://laclasse.depotter.fr/src/img/brevets/8.png'),
(14, 1, 'J\'écoute la maîtresse quand elle parle.', 4, 2, 'http://laclasse.depotter.fr/src/img/brevets/6.png'),
(15, 1, 'Je m\'assois correctement au coin regroupement au signal', 5, 2, 'http://laclasse.depotter.fr/src/img/brevets/7.png'),
(16, 1, 'J\'accepte les activités proposées', 5, 2, 'http://laclasse.depotter.fr/src/img/brevets/10.png'),
(17, 1, 'Je suis poli avec les autres : bonjour, au revoir', 7, 3, 'http://laclasse.depotter.fr/src/img/brevets/4.png'),
(18, 1, 'Je suis poli avec les autres : s\'il te plait, merci', 8, 3, 'http://laclasse.depotter.fr/src/img/brevets/5.png'),
(19, 1, 'Je range la classe', 9, 3, 'http://laclasse.depotter.fr/src/img/brevets/9.png'),
(20, 1, 'Je me déplace avec le groupe', 10, 3, 'http://laclasse.depotter.fr/src/img/brevets/3.png'),
(21, 2, 'J\'entre en relation (verbale ou non verbale) avec les adultes', 1, 1, 'http://laclasse.depotter.fr/src/img/brevets/11.png'),
(22, 2, 'Je manipule un livre correctement', 2, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(23, 2, 'Je réalise des boudins en pâte à modeler', 3, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(24, 2, 'J\'écoute et je comprends une consigne simple en petit groupe', 4, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(25, 2, 'Je raconte le contenu de mon cahier de vie', 5, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(26, 2, 'Je repère le titre d\'un livre', 6, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(27, 2, 'Je réalise des boules en pâte à modeler', 7, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(28, 2, 'Je réponds à l\'adulte de manière compréhensible', 8, 2, 'http://laclasse.depotter.fr/src/img/brevets/12.png'),
(29, 2, 'Je décris une image', 9, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(30, 2, 'Je réponds à des questions simples sur une histoire entendue', 10, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(31, 2, 'Je récite une comptine', 11, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(32, 2, 'Je reconnais mon prénom à l\'aide de mon initiale', 12, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(33, 3, 'Je me déplace en courant', 1, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(34, 2, 'Je me déplace en pédalant sur un tricycle', 2, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(35, 3, 'Je m\'exprime sur une musique', 3, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(36, 3, 'Je me déplace en sautant', 4, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(37, 3, 'Je me déplace en marchant en équilibre', 5, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(38, 3, 'Je prends part à un jeu collectif', 6, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(39, 3, 'Je lance : une balle, un sac, un anneau', 7, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(40, 3, 'Je monte et je descends les escaliers en alternant les pieds', 8, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(41, 3, 'J\'effectue un parcours en salle de motricité', 9, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(42, 4, 'Je reconnais les couleurs : rouge, bleu, jaune, vert', 1, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(43, 4, 'J\'écoute de la musique en étant attentif', 2, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(44, 4, 'Je chante', 3, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(45, 4, 'Je joue les rythmes avec mon corps', 4, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(46, 4, 'J\'utilise mes compétences graphiques (cercle et lignes) pour réaliser des dessins figuratifs', 5, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(47, 4, 'Je découvre les différents outils, supports et matériaux', 6, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(48, 4, 'Je découvre les instruments de musique', 7, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(49, 4, 'Je participe à un projet artistique collectif', 8, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(50, 5, 'J\'évalue une quantité : peu, beaucoup', 1, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(51, 5, 'Je réalise des puzzles d\'encastrements', 2, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(52, 5, 'Je trie selon les couleurs', 3, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(53, 5, 'Je connais la comptine numérique jusqu\'à...(10)', 4, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(54, 4, 'Je trie selon les formes', 5, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(55, 5, 'Je distingue petit / grand', 6, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(56, 5, 'Je réalise un algorithme binaire', 7, 2, 'http://laclasse.depotter.fr/src/img/brevets/49.png'),
(57, 5, 'Je reconnais une quantité sans compter jusqu\'à...', 8, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(58, 5, 'Je connais les différentes représentations du nombre jusqu\'à 3', 9, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(59, 5, 'Je réalise un puzzle ...(9 minimum)', 10, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(60, 6, 'Je connais les différentes parties de mon corps', 2, 1, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(61, 6, 'Je jette les déchets dans la bonne poubelle', 3, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(62, 6, 'Je découpe en tenant correctement mes ciseaux et mon papier', 4, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(63, 6, 'Je colle', 5, 2, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(64, 6, 'J\'ordonne une suite d\'images', 6, 3, 'http://laclasse.depotter.fr/src/img/brevets/50.png'),
(65, 6, 'Je me situe dans l\'espace', 7, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(66, 6, 'J\'observe les animaux', 8, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(67, 6, 'J\'observe les végétaux : graine / pas graine', 9, 3, 'http://laclasse.depotter.fr/src/img/brevets/1.png'),
(68, 6, 'Je pince un objet entre 2 doigts', 10, 3, 'http://laclasse.depotter.fr/src/img/brevets/58.png');

-- --------------------------------------------------------
