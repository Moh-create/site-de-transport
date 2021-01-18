-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 18 jan. 2021 à 10:23
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e-commerce`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pays_by_Id` (IN `codeP` CHAR(10))  BEGIN
SELECT *
FROM pays
WHERE codePays = codeP;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `supprimer_Utilisateur` (IN `idUserIn` INT, OUT `supprimer` BOOLEAN)  BEGIN
declare testUser int;
declare testCommande int;
declare testLivraison int;



set testCommande = 0;
set testLivraison = 0;
set supprimer = false;



select id into testUser from utilisateur where id = idUserIn;

IF(testUser is null)THEN
   
    select 'je ne suis pas rentre';
   
   
   ELSE

	
    select count(*) into testCommande from commande where id = idUserIn;
    
    if(testCommande > 0)THEN
    	DELETE FROM `commande` WHERE id = idUserIn;
    End IF;
    
    select count(*) into testLivraison from livraison where id = idUserIn;
    
    if(testLivraison > 0)THEN
    	DELETE FROM `livraison` where id = idUserIn;
    End if;
    
    DELETE FROM `utilisateur` where id = idUserIn;
    set supprimer = true;
    
    
 
    
    
End IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idCommande` varchar(10) NOT NULL,
  `dateCommande` bigint(20) DEFAULT NULL,
  `etat` varchar(50) DEFAULT 'attente',
  `id` int(11) NOT NULL,
  `idLivraison` varchar(50) DEFAULT NULL,
  `idPointRelaisEurope` int(11) DEFAULT NULL,
  `idPointRelaisAfrique` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `dateCommande`, `etat`, `id`, `idLivraison`, `idPointRelaisEurope`, `idPointRelaisAfrique`) VALUES
('04415105', 1610721900, 'attente', 150, NULL, 7, 6),
('2af055f5', 1610723532, 'attente', 151, NULL, 5, 6),
('5b7afb80', 1610537871, 'en cours', 142, NULL, 7, 8),
('749a7a8c', 1609929638, 'attente', 142, NULL, 7, 6),
('991b58bf', 1610723405, 'attente', 142, NULL, 7, 6),
('b0f3218d', 1610721886, 'attente', 150, NULL, 7, 6),
('b2a9c266', 1609930651, 'attente', 142, '215574', 7, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `idLivraison` varchar(50) NOT NULL,
  `adresseRue` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  `codeVille` varchar(5) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`idLivraison`, `adresseRue`, `telephone`, `etat`, `codeVille`, `id`) VALUES
('215574', 'av. du Progrès 256', '(+243)815168532', 'Barumbu Bon-Marché', 'BA', 142);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `codePays` char(5) NOT NULL,
  `nomPays` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`codePays`, `nomPays`) VALUES
('CD', 'RÉPUBLIQUE DÉMOCRATIQUE DU CONGO'),
('CG', 'RÉPUBLIQUE DU CONGO'),
('FR', 'FRANCE');

-- --------------------------------------------------------

--
-- Structure de la table `pointrelais`
--

CREATE TABLE `pointrelais` (
  `idPointRelais` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresseRue` varchar(110) DEFAULT NULL,
  `adresseVille` varchar(110) DEFAULT NULL,
  `adresseCodePostal` varchar(50) DEFAULT NULL,
  `codePays` char(5) NOT NULL,
  `afficher` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pointrelais`
--

INSERT INTO `pointrelais` (`idPointRelais`, `nom`, `adresseRue`, `adresseVille`, `adresseCodePostal`, `codePays`, `afficher`) VALUES
(5, 'Global Trade Invest', '12 Rue des Chauffours', 'Cergy', '95000', 'FR', 1),
(6, 'Immeuble Corail-Residence De La Musique Tambourine', '', '', '', 'CG', 1),
(7, 'Global Trade Invest Chez ETOUMBAKOUNDOU', '1 allé Francois de la Rochefoucauld', 'Sarcelles', '95200', 'FR', 1),
(8, 'Goo', 'test', NULL, NULL, 'CD', 0);

-- --------------------------------------------------------

--
-- Structure de la table `useradmin`
--

CREATE TABLE `useradmin` (
  `idUser` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `motDePasse` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `useradmin`
--

INSERT INTO `useradmin` (`idUser`, `nom`, `motDePasse`) VALUES
(1, 'admin1', '$2y$10$MO5SkdSJ718GHvwcid3NDuzuGw7cpFW2qw5FlKwRl8qU17kLpE8je'),
(2, 'admin', 'test'),
(3, 'admin', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `genre` char(3) DEFAULT NULL,
  `nom` varchar(70) NOT NULL,
  `prenom` varchar(70) DEFAULT NULL,
  `email` varchar(110) DEFAULT NULL,
  `motDePasse` text NOT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `adresseRue` varchar(110) DEFAULT NULL,
  `idPointRelais` int(11) DEFAULT NULL,
  `codeVille` varchar(5) DEFAULT NULL,
  `adressePostal` varchar(25) DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  `token` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `genre`, `nom`, `prenom`, `email`, `motDePasse`, `telephone`, `adresseRue`, `idPointRelais`, `codeVille`, `adressePostal`, `etat`, `token`) VALUES
(4, 'M', 'ggfg', 'ggsgsj', 'gfgjfigji@gg.h', 'gfgd', 'hththt', 'hghggh', 5, 'PA', 'hhghhg', NULL, NULL),
(23, 'g', 'mp', 'hi', 'fgfg', 'jojojo', 'plp', 'fffmm', NULL, 'PA', 'adressePostal', NULL, NULL),
(45, 'gen', ':nom', ':prenom', ':email', ':motDePasse', ':telephone', ':adresseRue', NULL, 'PA', ':adressePostal', NULL, NULL),
(92, 'P', 'gfgfg', 'fgf', 'gfgfgfgf', 'fdfddf', '5454', 'fgfdfd', 5, 'PA', 'gfgfgfggh', NULL, NULL),
(93, 'P', 'gfgfg', 'fgf', 'gfgfgfgf', 'fdfddf', '5454', 'fgfdfd', 5, 'PA', 'gfgfgfggh', NULL, NULL),
(95, 'gfg', ':nom', ':prenom', ':email', ':motDePasse', ':telephone', ':adresseRue', NULL, 'PA', NULL, ':etat', NULL),
(96, 'M', 'cvgfgdf', 'dfgdf', 'fdgfdgdfg@fggfd.hh', 'rregrege', '+334545454', 'dfgdfgdfg', NULL, 'PA', NULL, '63636', NULL),
(97, 'M', 'cvgfgdf', 'dfgdf', 'teetetet@gggg.gf', 'ggfsdgf', '+334545454', 'dfgdfgdfg', NULL, 'PA', '63636', NULL, NULL),
(98, 'M', 'cvgfgdf', 'dfgdf', 'teetetet@gggg.gf', '$2y$10$Omt2qzSVJls2y/nBfmIhFulnStjz4z.AXcLoStIpqjIXQJSW9zoZm', '+33252353', 'dfgdfgdfg', NULL, 'PA', '0', NULL, NULL),
(99, 'M', 'cvgfgdf', 'dfgdf', 'teetetet@gggg.gf', '$2y$10$LLqzhjptN68PfikqMNF.0uypZndj7jPJ4FcWp9UcpRoLIIGrWKlrK', '+33252353', 'dfgdfgdfg', NULL, 'PA', '0', NULL, NULL),
(101, 'F', 'fsfsdfds', 'dfsfs', 'sfsdfsd@gjj.hh', '$2y$10$J53Aq7ngnjCG8iA7beHc9ODFgzoTYgk7m9lTcJRttuA7YbRQpIxau', '+3358585', 'dsfsdfsdfsdfsdf', NULL, 'PA', '0', NULL, NULL),
(102, 'F', 'fsfsdfds', 'dfsfs', 'sfsdfsd@gjj.hh', '$2y$10$BTffSx7Xet9FtbIZ0pFQMOJS0Av7j322GsCDxX6eV9I/MGPZIU9z.', '+3358585', 'dsfsdfsdfsdfsdf', NULL, 'PA', '0', NULL, NULL),
(103, 'F', 'fsfsdfds', 'dfsfs', 'sfsdfsd@gjj.hh', '$2y$10$9d8L2GyUIX948ci3whazuuFJtyeARnLxHFf/OXQ5rStZ.60LfwO6W', '+3358585', 'dsfsdfsdfsdfsdf', NULL, 'PA', NULL, NULL, NULL),
(104, 'F', 'fsfsdfds', 'dfsfs', 'sfsdfsd@gjj.hh', '$2y$10$BNMoCJaaGzt1GQPZRqkO6OV9BeLTFhsYFvSdBjDjbJsNi8fjDLzEK', '+3358585', 'dsfsdfsdfsdfsdf', NULL, 'PA', '0', NULL, NULL),
(105, 'F', 'fsfsdfds', 'dfsfs', 'sfsdfsd@gjj.hh', '$2y$10$AuyyI87SQWoruL7u875WEuvwYRa4gVNCQ9B1KBAcx.IxR.KR6BxvG', '+3358585', 'dsfsdfsdfsdfsdf', NULL, 'PA', '47542', NULL, NULL),
(106, 'F', 'fsfsdfds', 'dfsfs', 'sfsdfsd@gjj.hh', '$2y$10$pm2Twd8eY2FEGnhjTTjKmellUcksqIaMghm3AhU.UH3T149dBq/Ai', '+3358585', 'dsfsdfsdfsdfsdf', NULL, 'PA', '47542', NULL, NULL),
(107, 'F', 'fsfsdfds', 'dfsfs', 'sfsdfsd@gjj.hh', '$2y$10$yAzUXttQ4jOpS87wHg8iFupO.heruFFTgxVUxOdvHap8d1YMkLvj6', '+3358585', 'dsfsdfsdfsdfsdf', NULL, 'PA', '0', NULL, NULL),
(108, 'F', 'fsfsdfds', 'dfsfs', 'sfsdfsd@gjj.hh', '$2y$10$RLdF3GsKZO3ICqYEintb1Ojyb6nc2nS3LKZRZVNKIscT1TKKwkEEe', '+3358585', 'dsfsdfsdfsdfsdf', NULL, 'PA', '0', NULL, NULL),
(109, 'M', 'hfghfhf', 'fghfgh', 'gstgre@jhjgh.hj', '$2y$10$sq7uQnuqzfy1cLWfJILwHeUBQL1yQee3NoNxVRh2RhP4/3C4QyCY6', '+3344255', 'dgdgdg', NULL, 'PA', NULL, '555555', NULL),
(110, 'M', 'hfghfhf', 'fghfgh', 'gstgre@jhjgh.hj', '$2y$10$c/6QxPvEgR8cdy1pSq/3buKzf8NtlPYVt.XZJ2uUeZUc.QoFvkdam', '+3344255', 'dgdgdg', NULL, 'PA', '665555', NULL, NULL),
(111, ':ge', ':nom', ':prenom', ':email', ':motDePasse', ':telephone', 'adresseRue', NULL, 'PA', NULL, '', NULL),
(112, 'M', 'GFGFHFG', 'GFHGF', 'gfhgfhgf@ghghg.ggh', '$2y$10$GHqJxmMya925wkeir.9ifOmQ8/KKRCfQWW6CQz2C3Lqp3PKABjot2', '+3389696', 'fgfhfgh', NULL, 'BA', NULL, 'gfhgfhgfh', NULL),
(113, 'M', 'quatre', 'Dufour', 'dufour@gmail.com', '$2y$10$OclcMpVt/B6BPO1npRF0rOzBYifV9gndcis94/ECKwiktVveDh4de', '+332222222', '7 rue des f', NULL, 'PA', '85000', NULL, NULL),
(114, 'M', 'pierre', 'Dufour', 'dufour@gmail.com', '$2y$10$qfHvF/Wz2g00gREMWlT/POQWFw5Y2IXT13wbgjfDgdfj2H03XeFKa', '+332222222', '7 rue des f', NULL, 'KI', NULL, '85000', NULL),
(115, 'M', 'rgdgd', 'fdgdfgdf', 'dfsdfd@ghghgf.de', '$2y$10$WggooXY9tcB6dUe.Mivb1eomrpPo.hyvnHodYm8mccOQYMLRi3SI2', '+334242424', 'dgfgfdgfdgf', NULL, 'PA', '14242', NULL, NULL),
(116, 'M', 'hgfhgf', 'fhgf', 'papa@gmail.com', '$2y$10$kFG05BNZXfAK7Y6FGXeyee0/RBCr5.yUuzEnUqijS9LHEuirlxB.G', '+334525255', '25 rue de la paix', NULL, 'PA', '25556', NULL, NULL),
(117, 'M', 'hgfhgf', 'test', 'papa@gmail.com', '$2y$10$l9wP0pbqxage5Dr.8ZlNYeV3sGjrxDhCmSkkZv9gdslM7g/sfPS9y', '+334525255', '25 rue de la paix', NULL, 'PA', '25556', NULL, NULL),
(121, 'M', 'hene', 'pepe', 'tho@gfggfh.kn', '$2y$10$z.d3VZ9hg5ndfTfTTtSDb.pmYx9jvlY7RwoIDP8FTMOW0wSjxd2kK', '+33122525', '25 rue de la paix', NULL, 'PA', '25556', NULL, NULL),
(122, 'M', 'hththt', 'pepe', 'tho@gfggfh.kn', '$2y$10$4l8Zs8tRYB9n/0IrYoOqyu9xzvdYNbPsLw52TEK46AYrzDpghBUci', '+33122525', '25 rue de la paix', NULL, 'PA', '25556', NULL, NULL),
(123, 'M', 'bnbn', 'pepe', 'tho@gfggfh.kn', '$2y$10$lQLkOIr.DLbS0FZX1kcqq.E1HpNiPsCb/Dh56BGISiOzoztpn9WSK', '+33122525', '25 rue de la paix', NULL, 'PA', '25556', NULL, NULL),
(127, 'M', 'fgfgdd', 'pepe', 'tho@gfggfh.kn', '$2y$10$ZMEVH9RCFwXkiQw.0UK9CeyPCAw4MD58lJtt8KWZlREdZbJf7jDHy', '+33122525', '25 rue de la paix', NULL, 'PA', '25556', NULL, NULL),
(128, 'M', 'aaaaaa', 'pepe', 'tho@gfggfh.kn', '$2y$10$.dfDqdDSpH7jjhydzXDwe.SZKtHjuRgtSCoOwDrSEPiXfbf2Rvqou', '+33122525', '25 rue de la paix', NULL, 'PA', '25556', NULL, NULL),
(129, 'M', 'ghghgfhf', 'pepe', 'tho@gfggfh.kn', '$2y$10$SABEaXFRbhVwZ0B3JR7xruTN13YQig9Uy7NJH0kLQDDXCTkY2DjmC', '+33122525', '25 rue de la paix', NULL, 'PA', '25556', NULL, NULL),
(130, 'M', 'ghghgfhf', 'pepe', 'tho@gfggfh.kn', '$2y$10$fDUE370ec54RvRc8Q4KVpOsVckc.Yux5Ins9uX1sGvfVHFeIZ8YPG', '+33122525', '25 rue de la paix', NULL, 'PA', '25556', NULL, NULL),
(134, 'M', 'dsdsds', ':prenom', ':email', ':motDePasse', ':telephone', ':adresseRue', 5, 'PA', ':adressePostal', NULL, NULL),
(135, 'M', 'NJNHJ', 'HGHJGJ', 'dfgfg@hjhj.jkj', '$2y$10$BgPHIHk.KklkrlZ5hMleKOIqREZ4E9JWCjjmt87mqE9NvZDgJzmMe', '+3314425425', 'ghgfhgf ghhg', NULL, 'PA', '88822', NULL, NULL),
(136, ':ge', ':nom', ':prenom', ':email', ':motDePasse', ':telephone', ':adresseRue', 5, 'PA', ':adressePostal', NULL, NULL),
(137, 'M', 'fgfgfgf', 'HGHJGJ', 'dfgfg@hjhj.jkj', '$2y$10$ErnNiXDREuE6WxQoejSkHO1N4JLTJt9E1wKs9OXLlpztiUyVR.6YK', '+3314425425', 'ghgfhgf ghhg', 7, 'PA', '88822', NULL, NULL),
(138, 'M', 'bnbnbn', 'HGHJGJ', 'dfgfg@hjhj.jkj', '$2y$10$TkLXL7/2FnnesWAVyM3VF.rSshPPKHPyAVRJcdVe1bK/JoaTMekT.', '+3314425425', 'ghgfhgf ghhg', NULL, 'PA', '88822', NULL, NULL),
(139, 'M', 'mmmmm', 'HGHJGJ', 'dfgfg@hjhj.jkj', '$2y$10$.nsj.F/kkguOmHhhBKKcJOKh2wuV2haCmp.tRH7DlvLowcKfjsiAO', '+3314425425', 'ghgfhgf ghhg', 5, 'PA', '88822', NULL, NULL),
(140, 'M', 'omomo', 'HGHJGJ', 'dfgfg@hjhj.jkj', '$2y$10$DxslM31fkE5lsvqni4.Pt.Y/Wct0pzYXi5g46Inq7mBMSXx38MnJK', '+3314425425', 'ghgfhgf ghhg', 7, 'PA', '88822', NULL, NULL),
(141, 'M', 'hhhgh', 'HGHJGJ', 'dfgfg@hjhj.jkj', '$2y$10$L28b99mY/uEYEHYyA6j3hOrwYPM/rO04UrkwFdhG6K7BPwiGHb4W6', '+3314425425', 'ghgfhgf ghhg', 5, 'PA', '88822', NULL, NULL),
(142, 'M', 'hele', 'ouiuoui', 'ouioui@hotmail.com', '$2y$10$Mk3IroDp0kOiYNp7aDRvGu3ZbXhFyM6I0wnWA0lcCH6GWQwWb/lR.', '+335478547', '12 rue tests', 7, 'PA', '75000', NULL, 'd38d0efb2e4c'),
(143, 'M', 'aqszed', 'aqszed', 'hghgfhgf@jjj.gh', '$2y$10$CgBPZ6jPHqYn9.vw7Ysf6uTbTnCQOkQ3hzMzD.xcoCOaSBoIuQEoS', '+2437474747', 'gfhgfhfghfghf', 5, 'PN', NULL, NULL, NULL),
(144, 'M', 'aqszed', 'gfgf', 'hghgfhgf@jjj.gh', '$2y$10$5.nzCIKVcUjRVp0b8NWTWuVOm.aAIHDEwc3uCLMCAOF4PRWPfOb7O', '+2437474747', 'hgh hghgg', 7, 'PN', NULL, NULL, NULL),
(145, 'M', 'ghghgh', 'ghghgh', 'gfggfgf@jkjkj.iii', '$2y$10$hDE0vyPHM5828iXYuRrZt.HNFhqLpptZ1ydO/XABR6fuAo.Muc15u', '+335656565656', '\'OR 1+1\'', 5, 'PA', '95500', NULL, NULL),
(146, 'M', 'jhjhjh', 'hjhjh', 'fghgh@kju.kl', '$2y$10$EHgkMw6wNeuJewoHYEWhQOSCI93R9FMvay4.e/OHgksI3Mz80hCEu', '+3356696969', '\'OR 1=1\'', 7, 'PA', '42454', NULL, NULL),
(148, 'M', 'Eric', 'Dupont', 'eric.mont@gmail.com', '$2y$10$.nviqgPoMAGdJT8QNN4HiuzSQz88UzVcRYw0KXdRQq7qheAdpbFkq', '+33452555', '25 rue de la chance', 7, 'PA', '69000', NULL, NULL),
(149, 'M', 'Eric', 'Pierre', 'eric.mont@gmail.com', '$2y$10$H3g0x1o4oGMd5g75l/04k.IokdIJPB5GHQsL2lAIWlMWCps/36zBi', '+3355555555', '25 rue de la chance', 5, 'PA', '75000', NULL, NULL),
(150, 'M', 'Marc', 'Vander', 'marc.vander@gmail.com', '$2y$10$5FwJN2lLDOTBATaBY.AN5ed1kg2PoYi4PXdt5iMGC7c1dwmEBAhDa', '+33784512369', '25 rue de paris', 7, 'PA', '75000', NULL, NULL),
(151, 'M', 'fghgh', 'ghfhg', 'hghgh@hj.jk', '$2y$10$jWbjGWO9XuMcBO.pIKAGcO41T7uX6Mb726FCXY/jWPXBCI8E4o07q', '+33523535', 'fgfgfgf', 5, 'PA', '75000', NULL, NULL);

--
-- Déclencheurs `utilisateur`
--
DELIMITER $$
CREATE TRIGGER `ajoutPointRelaisEurope` BEFORE INSERT ON `utilisateur` FOR EACH ROW BEGIN
declare `numeroLastId`   int;
declare numMinPointRelaisFr int;
declare numMaxPointRelaisFr int;

declare p int;
declare h int;
set h = 0;
select idPointRelais into numeroLastId FROM `utilisateur` where id = (SELECT max(id) FROM `utilisateur`);

if (numeroLastId IS null) then
	SELECT min(idPointRelais) into numMinPointRelaisFr from `pointrelais` where codePays ='FR';
    
    SET New.idPointRelais = numMinPointRelaisFr;  
ELSE

    IF(numeroLastId is NOT null) THEN
    	SELECT max(idPointRelais) into numMaxPointRelaisFr from `pointrelais` where codePays ='FR';

    	If(numeroLastId = numMaxPointRelaisFr) then
            	SELECT min(idPointRelais) into numMinPointRelaisFr from `pointrelais` where codePays ='FR';
                SET New.idPointRelais = numMinPointRelaisFr;
    	ELSE
      
            	while numeroLastId <= numMaxPointRelaisFr  && h = 0
                	Do
                	set numeroLastId = numeroLastId + 1;
                	SELECT idPointRelais into p from `pointrelais` where codePays ='FR' and idPointRelais = numeroLastId;

                	if(p is not null)THEN
                    		set numeroLastId = p;
                    		SET New.idPointRelais = numeroLastId;
                    		set h = 1;
                	END IF;

             	END WHILE;    				
	    END IF;

    END IF;

END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `codeVille` varchar(5) NOT NULL,
  `nomVille` varchar(50) DEFAULT NULL,
  `codePays` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`codeVille`, `nomVille`, `codePays`) VALUES
('BA', 'Brazzaville', 'CG'),
('KI', 'Kinshasa', 'CD'),
('PA', 'PARIS', 'FR'),
('PN', 'Pointe-Noire', 'CG');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `id` (`id`),
  ADD KEY `idLivraison` (`idLivraison`),
  ADD KEY `idPointRelaisEurope` (`idPointRelaisEurope`),
  ADD KEY `idPointRelaisAfrique` (`idPointRelaisAfrique`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`idLivraison`),
  ADD KEY `codeVille` (`codeVille`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`codePays`);

--
-- Index pour la table `pointrelais`
--
ALTER TABLE `pointrelais`
  ADD PRIMARY KEY (`idPointRelais`),
  ADD KEY `codePays` (`codePays`);

--
-- Index pour la table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`idUser`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPointRelais` (`idPointRelais`),
  ADD KEY `codeVille` (`codeVille`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`codeVille`),
  ADD KEY `codePays` (`codePays`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pointrelais`
--
ALTER TABLE `pointrelais`
  MODIFY `idPointRelais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`idLivraison`) REFERENCES `livraison` (`idLivraison`),
  ADD CONSTRAINT `commande_ibfk_3` FOREIGN KEY (`idPointRelaisEurope`) REFERENCES `pointrelais` (`idPointRelais`),
  ADD CONSTRAINT `commande_ibfk_4` FOREIGN KEY (`idPointRelaisAfrique`) REFERENCES `pointrelais` (`idPointRelais`);

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`codeVille`) REFERENCES `ville` (`codeVille`),
  ADD CONSTRAINT `livraison_ibfk_2` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `pointrelais`
--
ALTER TABLE `pointrelais`
  ADD CONSTRAINT `pointrelais_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`idPointRelais`) REFERENCES `pointrelais` (`idPointRelais`),
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`codeVille`) REFERENCES `ville` (`codeVille`);

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `ville_ibfk_1` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
