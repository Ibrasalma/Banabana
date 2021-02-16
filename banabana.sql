-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for banabana
CREATE DATABASE IF NOT EXISTS `banabana` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `banabana`;

-- Dumping structure for table banabana.argent
CREATE TABLE IF NOT EXISTS `argent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `montant` float NOT NULL,
  `detail` text,
  `recu` varchar(255) DEFAULT NULL,
  `date_reception` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`),
  CONSTRAINT `argent_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table banabana.client
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tel` varchar(15) NOT NULL,
  `domaine` varchar(25) DEFAULT NULL,
  `date_enregistre` datetime NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table banabana.commander
CREATE TABLE IF NOT EXISTS `commander` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_rec` varchar(50) NOT NULL,
  `client` int(11) NOT NULL,
  `vendeur` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix_unitaire` float NOT NULL,
  `date_commande` date NOT NULL,
  `specification` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client` (`client`),
  KEY `produit` (`produit`),
  KEY `vendeur` (`vendeur`),
  CONSTRAINT `commander_ibfk_1` FOREIGN KEY (`client`) REFERENCES `client` (`id`),
  CONSTRAINT `commander_ibfk_2` FOREIGN KEY (`produit`) REFERENCES `produit` (`id_produit`),
  CONSTRAINT `commander_ibfk_3` FOREIGN KEY (`vendeur`) REFERENCES `vendeur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table banabana.contact
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table banabana.depense
CREATE TABLE IF NOT EXISTS `depense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `motif` text NOT NULL,
  `date_` datetime NOT NULL,
  `montant` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`),
  CONSTRAINT `depense_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table banabana.facture
CREATE TABLE IF NOT EXISTS `facture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_recu` varchar(50) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_vendeur` int(11) NOT NULL,
  `date_` datetime NOT NULL,
  `montant_total` float NOT NULL,
  `avance` float NOT NULL DEFAULT '0',
  `photo_recu` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `numero_recu` (`numero_recu`),
  KEY `id_client` (`id_client`),
  KEY `id_vendeur` (`id_vendeur`),
  CONSTRAINT `recu_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  CONSTRAINT `recu_ibfk_2` FOREIGN KEY (`id_vendeur`) REFERENCES `vendeur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table banabana.ligne_commande
CREATE TABLE IF NOT EXISTS `ligne_commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_com` int(11) NOT NULL,
  `prix_total` float NOT NULL,
  `date_paye` datetime NOT NULL,
  `avance` float NOT NULL,
  `total_paye` float NOT NULL,
  `reste` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_com` (`id_com`),
  CONSTRAINT `ligne_commande_ibfk_1` FOREIGN KEY (`id_com`) REFERENCES `commande` (`id_com`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table banabana.livraison
CREATE TABLE IF NOT EXISTS `livraison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_facture` int(11) NOT NULL,
  `statut` varchar(25) NOT NULL,
  `date_livre` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_facture` (`id_facture`),
  CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`id_facture`) REFERENCES `facture` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table banabana.login
CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(10) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table banabana.payement
CREATE TABLE IF NOT EXISTS `payement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_receipt` int(11) NOT NULL,
  `versement` float NOT NULL,
  `total_paye` float NOT NULL,
  `reste` float NOT NULL,
  `date_paye` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_receipt` (`id_receipt`),
  CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`id_receipt`) REFERENCES `facture` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table banabana.produit
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prix_brut` float DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `detail` text,
  PRIMARY KEY (`id_produit`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table banabana.vendeur
CREATE TABLE IF NOT EXISTS `vendeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `boutique` varchar(10) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tel` varchar(15) NOT NULL,
  `wechat` varchar(25) NOT NULL,
  `domaine` varchar(25) DEFAULT NULL,
  `date_enregistre` datetime NOT NULL,
  `carte_visite` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
