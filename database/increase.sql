-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 10 Décembre 2015 à 12:07
-- Version du serveur :  5.5.39
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `increase`
--

-- --------------------------------------------------------

--
-- Structure de la table `acl`
--

CREATE TABLE IF NOT EXISTS `acl` (
`id` int(11) NOT NULL,
  `idRole` int(11) NOT NULL,
  `nom_ressource` varchar(50) NOT NULL,
  `nom_action` varchar(50) NOT NULL,
  `allowed` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=128 ;

--
-- Contenu de la table `acl`
--

INSERT INTO `acl` (`id`, `idRole`, `nom_ressource`, `nom_action`, `allowed`) VALUES
(3, 1, 'index', 'index', 1),
(6, 2, 'index', 'index', 1),
(7, 3, 'index', 'index', 1),
(8, 1, 'Connexion', 'connexion', 1),
(9, 2, 'Connexion', 'connexion', 1),
(10, 3, 'Connexion', 'connexion', 1),
(11, 1, 'Connexion', 'deconnexion', 1),
(12, 2, 'Connexion', 'deconnexion', 1),
(13, 3, 'Connexion', 'deconnexion', 1),
(14, 1, 'Connexion', 'index', 1),
(15, 2, 'Connexion', 'index', 1),
(16, 3, 'Connexion', 'index', 1),
(17, 1, 'Default', 'asAdmin', 1),
(18, 2, 'Default', 'asAdmin', 1),
(19, 3, 'Default', 'asAdmin', 1),
(20, 1, 'Default', 'asAuthor', 1),
(21, 2, 'Default', 'asAuthor', 1),
(22, 3, 'Default', 'asAuthor', 1),
(23, 1, 'Default', 'asUser', 1),
(24, 2, 'Default', 'asUser', 1),
(25, 3, 'Default', 'asUser', 1),
(26, 1, 'Default', 'delete', 1),
(27, 2, 'Default', 'delete', 1),
(28, 3, 'Default', 'delete', 1),
(29, 1, 'Default', 'frm', 1),
(30, 2, 'Default', 'frm', 1),
(31, 3, 'Default', 'frm', 1),
(32, 1, 'Default', 'index', 1),
(33, 2, 'Default', 'index', 1),
(34, 3, 'Default', 'index', 1),
(35, 1, 'Default', 'update', 1),
(36, 2, 'Default', 'update', 1),
(37, 3, 'Default', 'update', 1),
(38, 1, 'Default', '_delete', 1),
(39, 2, 'Default', '_delete', 1),
(40, 3, 'Default', '_delete', 1),
(65, 1, 'Messages', 'index', 1),
(66, 2, 'Messages', 'index', 1),
(67, 3, 'Messages', 'index', 1),
(68, 1, 'Messages', 'messagefil', 1),
(69, 2, 'Messages', 'messagefil', 1),
(70, 3, 'Messages', 'messagefil', 1),
(71, 1, 'projects', 'equipe', 1),
(72, 2, 'projects', 'equipe', 1),
(73, 3, 'projects', 'equipe', 1),
(74, 1, 'projects', 'index', 1),
(75, 2, 'projects', 'index', 1),
(76, 3, 'projects', 'index', 1),
(77, 1, 'projects', 'messagefil', 1),
(78, 2, 'projects', 'messagefil', 2),
(79, 3, 'projects', 'messagefil', 1),
(80, 1, 'projects', 'messages', 1),
(81, 2, 'projects', 'messages', 1),
(82, 3, 'projects', 'messages', 1),
(83, 1, 'Taches', 'add', 1),
(84, 2, 'Taches', 'add', 1),
(85, 3, 'Taches', 'add', 1),
(86, 1, 'Taches', 'delete', 1),
(87, 2, 'Taches', 'delete', 1),
(88, 3, 'Taches', 'delete', 1),
(89, 1, 'Taches', 'frm', 1),
(90, 2, 'Taches', 'frm', 1),
(91, 3, 'Taches', 'frm', 1),
(92, 1, 'Taches', 'index', 1),
(93, 2, 'Taches', 'index', 1),
(94, 3, 'Taches', 'index', 1),
(95, 1, 'Taches', 'show', 1),
(96, 2, 'Taches', 'show', 1),
(97, 3, 'Taches', 'show', 1),
(98, 1, 'Taches', 'update', 1),
(99, 2, 'Taches', 'update', 1),
(100, 3, 'Taches', 'update', 1),
(101, 1, 'Taches', '_delete', 1),
(102, 2, 'Taches', '_delete', 1),
(103, 3, 'Taches', '_delete', 1),
(104, 1, 'UseCases', 'add', 1),
(105, 2, 'UseCases', 'add', 1),
(106, 3, 'UseCases', 'add', 1),
(107, 1, 'UseCases', 'frm', 1),
(108, 2, 'UseCases', 'frm', 1),
(109, 3, 'UseCases', 'frm', 1),
(110, 1, 'UseCases', 'index', 1),
(111, 2, 'UseCases', 'index', 1),
(112, 3, 'UseCases', 'index', 1),
(113, 1, 'UseCases', 'show', 1),
(114, 2, 'UseCases', 'show', 1),
(115, 3, 'UseCases', 'show', 1),
(116, 1, 'users', 'frm', 1),
(117, 2, 'users', 'frm', 1),
(118, 3, 'users', 'frm', 1),
(119, 1, 'users', 'index', 1),
(120, 2, 'users', 'index', 1),
(121, 3, 'users', 'index', 1),
(122, 1, 'users', 'project', 1),
(123, 2, 'users', 'project', 1),
(124, 3, 'users', 'project', 1),
(125, 1, 'users', 'projects', 1),
(126, 2, 'users', 'projects', 1),
(127, 3, 'users', 'projects', 1);

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `nom_action` varchar(50) NOT NULL,
  `nom_ressource` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `action`
--

INSERT INTO `action` (`nom_action`, `nom_ressource`) VALUES
('connexion', 'Connexion'),
('deconnexion', 'Connexion'),
('index', 'Connexion'),
('asAdmin', 'Default'),
('asAuthor', 'Default'),
('asUser', 'Default'),
('delete', 'Default'),
('frm', 'Default'),
('index', 'Default'),
('update', 'Default'),
('_delete', 'Default'),
('index', 'index'),
('index', 'Messages'),
('messagefil', 'Messages'),
('equipe', 'projects'),
('index', 'projects'),
('messagefil', 'projects'),
('messages', 'projects'),
('add', 'Taches'),
('delete', 'Taches'),
('frm', 'Taches'),
('index', 'Taches'),
('show', 'Taches'),
('update', 'Taches'),
('_delete', 'Taches'),
('add', 'UseCases'),
('frm', 'UseCases'),
('index', 'UseCases'),
('show', 'UseCases'),
('frm', 'users'),
('index', 'users'),
('project', 'users'),
('projects', 'users');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`id` int(11) NOT NULL,
  `objet` varchar(255) DEFAULT NULL,
  `content` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idUser` int(11) NOT NULL,
  `idProjet` int(11) NOT NULL,
  `idFil` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `objet`, `content`, `date`, `idUser`, `idProjet`, `idFil`) VALUES
(2, 'Essai', 'Aucun contenu', '2015-03-12 23:00:00', 1, 1, NULL),
(7, 'Ok', 'Rien à répondre', '2015-03-13 13:33:51', 2, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE IF NOT EXISTS `projet` (
`id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text,
  `dateLancement` date DEFAULT NULL,
  `dateFinPrevue` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id`, `nom`, `description`, `dateLancement`, `dateFinPrevue`, `image`, `idClient`) VALUES
(1, 'Increase', 'A Phalcon web application to manage the progress of projects, and improve communication with the customer', '2015-03-16', '2015-03-29', NULL, 1),
(2, 'Open-beer', 'A free, public database, API and web application for beer information.', '2015-03-15', '2015-03-29', NULL, 1),
(3, 'Essai', 'test&lt;html&gt;la suite', '2015-03-10', '2015-03-09', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ressource`
--

CREATE TABLE IF NOT EXISTS `ressource` (
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ressource`
--

INSERT INTO `ressource` (`nom`, `description`) VALUES
('Connexion', ''),
('Default', ''),
('index', 'index'),
('Messages', ''),
('projects', ''),
('Taches', ''),
('UseCases', ''),
('users', '');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `libelle`) VALUES
(1, 'user'),
(2, 'author'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE IF NOT EXISTS `tache` (
`id` int(11) NOT NULL,
  `libelle` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `avancement` smallint(6) DEFAULT NULL,
  `codeUseCase` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `tache`
--

INSERT INTO `tache` (`id`, `libelle`, `date`, `avancement`, `codeUseCase`) VALUES
(1, 'Interview client +rédaction', '2015-03-22', 100, 'I-UC1'),
(2, 'MCD', '2015-03-22', 100, 'I-UC2'),
(3, 'Génération base', '2015-03-22', 100, 'I-UC3'),
(4, 'Uses cases', '2015-03-23', 100, 'I-UC4'),
(5, 'Connexion REST', '2015-03-13', 50, 'OB-UC1'),
(6, 'Liste des bières', '2015-03-22', 100, 'OB-UC2'),
(7, 'Liste des bières par brasserie', '2015-03-22', 10, 'OB-UC2');

-- --------------------------------------------------------

--
-- Structure de la table `usecase`
--

CREATE TABLE IF NOT EXISTS `usecase` (
  `code` varchar(15) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `poids` smallint(6) DEFAULT NULL,
  `avancement` smallint(6) DEFAULT NULL,
  `idProjet` int(11) NOT NULL,
  `idDev` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `usecase`
--

INSERT INTO `usecase` (`code`, `nom`, `poids`, `avancement`, `idProjet`, `idDev`) VALUES
('', 'oo', 10, 0, 3, 4),
('I-UC-Dev1', 'Connexion utilisateur', 5, 0, 1, 4),
('I-UC-Dev2', 'Gestion des ACL', 10, 0, 1, 4),
('I-UC-Dev3-Cli', 'Lister mes projets (client)', 5, 0, 1, 4),
('I-UC-Dev4-Cli', 'Visualiser avancement projet (client)', 10, 0, 1, 4),
('I-UC-Dev5', 'Laisser un message, répondre', 2, 0, 1, 4),
('I-UC-Dev6', 'Saisir l''anvancement d''un Use case', 5, 0, 1, 4),
('I-UC-Dev7', 'Saisir une tâche réalisée', 2, 0, 1, 4),
('I-UC-Dev8', 'Se déconnecter', 2, 0, 1, 2),
('I-UC-Dev9', 'Lister les messages (nouveaux, archivés...)', 2, 0, 1, 2),
('I-UC1', 'Règles de gestion', 2, 100, 1, 2),
('I-UC2', 'Analyse des données', 2, 100, 1, 2),
('I-UC3', 'Base de données', 2, 100, 1, 2),
('I-UC4', 'Analyse fonctionnelle', 20, 100, 1, 4),
('OB-UC1', 'Connexion au server REST', 10, 0, 2, 5),
('OB-UC2', 'Gestion des bières (liste/ajout/modification)', 10, 0, 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `identite` varchar(100) DEFAULT NULL,
  `idRole` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `mail`, `password`, `identite`, `idRole`) VALUES
(1, 'jcheron@kobject.net', 'ffffff9afffffff15b336e6affffff9619ffffff92ffffff8537ffffffdf30ffffffb2ffffffe6ffffffa2376569fffffffcfffffff9ffffffd7ffffffe773ffffffecffffffceffffffde65606529ffffffa0', 'JC HERON', 1),
(2, 'igor.minar@gmail.com', 'ffffff9afffffff15b336e6affffff9619ffffff92ffffff8537ffffffdf30ffffffb2ffffffe6ffffffa2376569fffffffcfffffff9ffffffd7ffffffe773ffffffecffffffceffffffde65606529ffffffa0', 'Igor MINAR', 1),
(4, 'misko.hevery@gmail.com', 'ffffff9afffffff15b336e6affffff9619ffffff92ffffff8537ffffffdf30ffffffb2ffffffe6ffffffa2376569fffffffcfffffff9ffffffd7ffffffe773ffffffecffffffceffffffde65606529ffffffa0', 'Miško Hevery', 2),
(5, 'pete.bacon@gmail.com', 'ffffff9afffffff15b336e6affffff9619ffffff92ffffff8537ffffffdf30ffffffb2ffffffe6ffffffa2376569fffffffcfffffff9ffffffd7ffffffe773ffffffecffffffceffffffde65606529ffffffa0', 'Pete Bacon Darwin', 2),
(7, 'moi@kobject.net', 'ffffff9afffffff15b336e6affffff9619ffffff92ffffff8537ffffffdf30ffffffb2ffffffe6ffffffa2376569fffffffcfffffff9ffffffd7ffffffe773ffffffecffffffceffffffde65606529ffffffa0', 'moi', 3),
(10, 'admin@gmail.com', 'ffffff9afffffff15b336e6affffff9619ffffff92ffffff8537ffffffdf30ffffffb2ffffffe6ffffffa2376569fffffffcfffffff9ffffffd7ffffffe773ffffffecffffffceffffffde65606529ffffffa0', 'admin', 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `acl`
--
ALTER TABLE `acl`
 ADD PRIMARY KEY (`id`), ADD KEY `nom_ressource` (`nom_ressource`), ADD KEY `nom_action` (`nom_action`), ADD KEY `nom_action_2` (`nom_action`), ADD KEY `idRole` (`idRole`);

--
-- Index pour la table `action`
--
ALTER TABLE `action`
 ADD PRIMARY KEY (`nom_action`,`nom_ressource`), ADD KEY `nom_ressource` (`nom_ressource`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_message_user1_idx` (`idUser`), ADD KEY `fk_message_projet1_idx` (`idProjet`), ADD KEY `fk_message_message1_idx` (`idFil`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `nom_UNIQUE` (`nom`), ADD KEY `fk_projet_user1_idx` (`idClient`);

--
-- Index pour la table `ressource`
--
ALTER TABLE `ressource`
 ADD PRIMARY KEY (`nom`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tache_useCase1_idx` (`codeUseCase`);

--
-- Index pour la table `usecase`
--
ALTER TABLE `usecase`
 ADD PRIMARY KEY (`code`,`idProjet`), ADD KEY `fk_useCase_projet_idx` (`idProjet`), ADD KEY `fk_useCase_user1_idx` (`idDev`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `mail_UNIQUE` (`mail`), ADD KEY `idRole` (`idRole`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `acl`
--
ALTER TABLE `acl`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `acl`
--
ALTER TABLE `acl`
ADD CONSTRAINT `acl_ibfk_1` FOREIGN KEY (`nom_ressource`) REFERENCES `ressource` (`nom`),
ADD CONSTRAINT `acl_ibfk_2` FOREIGN KEY (`nom_action`) REFERENCES `action` (`nom_action`),
ADD CONSTRAINT `acl_ibfk_3` FOREIGN KEY (`idRole`) REFERENCES `role` (`id`);

--
-- Contraintes pour la table `action`
--
ALTER TABLE `action`
ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`nom_ressource`) REFERENCES `ressource` (`nom`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
ADD CONSTRAINT `fk_message_message1` FOREIGN KEY (`idFil`) REFERENCES `message` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_message_projet1` FOREIGN KEY (`idProjet`) REFERENCES `projet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_message_user1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
ADD CONSTRAINT `fk_projet_user1` FOREIGN KEY (`idClient`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tache`
--
ALTER TABLE `tache`
ADD CONSTRAINT `fk_tache_useCase1` FOREIGN KEY (`codeUseCase`) REFERENCES `usecase` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `usecase`
--
ALTER TABLE `usecase`
ADD CONSTRAINT `fk_useCase_projet` FOREIGN KEY (`idProjet`) REFERENCES `projet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_useCase_user1` FOREIGN KEY (`idDev`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
