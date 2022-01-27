-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 27 juil. 2021 à 14:48
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `grec`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(155) NOT NULL,
  `content` varchar(8000) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(155) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_article`),
  UNIQUE KEY `unique*` (`title`),
  KEY `fk_article_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `title`, `content`, `time`, `image`, `id_user`) VALUES
(7, 'Ouranos', 'Dans la mythologie grecque, Ouranos (en grec ancien Οὐρανός / Ouranós) est une divinité primordiale personnifiant le Ciel étoilé et l\'Esprit démiurgique.', '2021-07-26 16:27:06', 'Ouranos.jpg', 6),
(8, 'Gaïa', 'Dans la mythologie grecque, Gaïa ou Gaya (du grec ancien Γαῖα / Gaîa ou Γαῖη / Gaîē), ou Gê (du grec ancien Γῆ / Gê, « Terre »), est une divinité primordiale identifié à la « Déesse mère ». Ancêtre maternelle des races divines, elle enfante aussi de nombreuses créatures.', '2021-07-26 16:40:55', 'Gaïa.jpg', 6),
(15, 'Athéna', 'Elle est également appelée « Pallas Athéna », déesse de la sagesse, de la stratégie militaire, des artisans, des artistes et des maîtres d\'école. ... Athéna était considérée comme la patronne et protectrice de plusieurs villes de Grèce, notamment celle d\'Athènes.', '2021-07-27 13:46:34', 'Athéna.jpg', 6),
(17, 'Chronos', 'Chronos est la personnification du temps qui apparait principalement dans les traditions orphiques qui le considèrent comme le fils de Gaïa et d\'Hydros (Eaux primordiales). ... Dans la mythologie alexandrine et romaine, Chronos est le père des Heures, personnifications des douze heures du jour ou de la nuit.', '2021-07-27 14:06:55', 'Chronos.jpg', 6),
(18, 'Zeus', 'Zeus (en grec ancien Ζεύς / Zeús) est le dieu suprême dans la mythologie grecque. Fils du titan Cronos et de la titanide Rhéa, marié à sa sœur Héra1, il a engendré, avec cette déesse et avec d\'autres, plusieurs dieux et déesses, et, avec des mortelles, de nombreux héros, comme l\'a expliqué la théogonie d\'Hésiode (viiie siècle av. J.-C.).', '2021-07-27 14:08:11', 'Zeus.jpg', 6),
(19, 'Aphrodite', 'Aphrodite, déesse grecque de l\'amour, du désir et de la beauté Ἀφροδίτη ... Grande déesse de la fécondité et de l\'amour chez les Babyloniens et chez les Phéniciens, elle devient chez les Grecs l\'une des douze divinités olympiennes, la déesse de l\'amour et de la beauté.', '2021-07-27 14:08:58', 'Aphrodite.jpg', 6),
(20, 'Artemis', 'Artémis (en grec ancien Ἄρτεμις / Ártemis) est, dans la religion grecque antique, la déesse de la nature sauvage, de la chasse et des accouchements. ... Elle est l\'une des déesses associées à la Lune (avec Hécate et Séléné) par opposition à son frère Apollon qui est associé au Soleil.', '2021-07-27 14:09:44', 'Artemis.jpg', 6),
(22, 'Hadès', 'Dans la mythologie grecque, Hadès (en grec ancien ᾍδης ou Ἅιδης / Háidês) est une divinité chthonienne, frère aîné de Zeus et de Poséidon. Comme Zeus gouverne le Ciel et Poséidon la Mer, Hadès règne sous la terre et pour cette raison il est souvent considéré comme le « maître des Enfers ». Il est marié à Perséphone. Il correspond au Sarapis ptolémaïque et au Pluton romain.', '2021-07-27 15:11:56', 'Hadès.jpg', 6);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `name_role` varchar(155) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'admin'),
(2, 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(155) NOT NULL,
  `password` varchar(155) DEFAULT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `uniqu` (`pseudo`),
  KEY `fk_user_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `password`, `id_role`) VALUES
(6, 'admin', '$2y$10$ctHTD7an.fV08Fi1pAuFqu7gFVpUKNINRywzarrMdAVKHAyKXrMMS', 1),
(7, 'blabla', '$2y$10$1uuR8sNxhVc.p4gx3Q90YucpofwTXkImFzdHI3inh1apGZr1VO7Pq', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
