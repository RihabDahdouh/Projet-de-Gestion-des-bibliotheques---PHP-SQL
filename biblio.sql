-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2019 at 08:21 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblio`
--

-- --------------------------------------------------------

--
-- Table structure for table `emprunt`
--

CREATE TABLE `emprunt` (
  `id_emprunt` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_livre` int(11) NOT NULL,
  `id_gestionnaire` int(11) NOT NULL,
  `dt_debut` date NOT NULL,
  `dt_retour` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emprunt`
--

INSERT INTO `emprunt` (`id_emprunt`, `id_etudiant`, `id_livre`, `id_gestionnaire`, `dt_debut`, `dt_retour`) VALUES
(1, 14001418, 5, 1, '2019-11-26', '2019-11-28'),
(2, 13003031, 1, 2, '2019-11-26', '2019-11-27'),
(3, 14000054, 4, 1, '2019-11-12', '2019-11-30'),
(5, 14000108, 6, 1, '2019-12-22', '2019-12-29'),
(7, 14000108, 6, 1, '2019-12-22', '2020-01-25'),
(8, 14000149, 4, 1, '2019-12-22', '2019-12-20'),
(9, 14001914, 8, 1, '2019-12-29', '2019-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `num_apogee` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `image` varchar(45) DEFAULT 'SANS_IMAGE.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`num_apogee`, `nom`, `prenom`, `image`) VALUES
(13003031, 'ALMOUHAK', 'KAOUTAR', '13003031.PNG'),
(13007111, 'AKSBI', 'OUSSAMA', '13007111.PNG'),
(13007921, 'CHTIBY', 'SAFAA', '13007921.PNG'),
(14000054, 'BAHOUMI', 'BASMA', '14000054.PNG'),
(14000108, 'EL ATTAOUI', 'ANAS', '14000108.PNG'),
(14000149, 'BELOUIZA', 'CHARIFA', '14000149.PNG'),
(14001418, 'BELHAJ', 'laila', '14001418.PNG'),
(14001914, 'ABERCHANE', 'OUMAIMA', '14001914.PNG'),
(14003733, 'EDDOUMY', 'MONCEF', '14003733.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `gestionaire`
--

CREATE TABLE `gestionaire` (
  `id_gestionaire` int(11) NOT NULL,
  `login` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gestionaire`
--

INSERT INTO `gestionaire` (`id_gestionaire`, `login`, `pass`, `nom`, `prenom`) VALUES
(1, 'marso', 'azerty', 'Marso', 'Mohamed'),
(2, 'nouri', 'azerty', 'Nouri', 'Fatiha');

-- --------------------------------------------------------

--
-- Table structure for table `livre`
--

CREATE TABLE `livre` (
  `isbn` int(11) NOT NULL,
  `titre_livre` varchar(100) NOT NULL,
  `auteur` varchar(40) NOT NULL,
  `image_livre` varchar(45) NOT NULL DEFAULT 'SANS_IMAGE.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `livre`
--

INSERT INTO `livre` (`isbn`, `titre_livre`, `auteur`, `image_livre`) VALUES
(1, 'LIVRE A', 'Auteur 1', '1.PNG'),
(2, 'LIVRE B', 'Auteur 2', '2.PNG'),
(3, 'LIVRE C', 'Auteur 3', '3.PNG'),
(4, 'LIVRE D', 'Auteur 4', '4.PNG'),
(5, 'LIVRE E', 'Auteur 5', '5.PNG'),
(6, 'LIVRE F', 'Auteur 6', '6.PNG'),
(7, 'LIVRE G', 'Auteur 7', '7.PNG'),
(8, 'LIVRE H', 'Auteur 8', '8.PNG'),
(9, 'LIVRE I', 'Auteur 9', '9.PNG'),
(10, 'LIVRE J', 'Auteur 10', '10.PNG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id_emprunt`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_livre` (`id_livre`),
  ADD KEY `id_gestionnaire` (`id_gestionnaire`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`num_apogee`);

--
-- Indexes for table `gestionaire`
--
ALTER TABLE `gestionaire`
  ADD PRIMARY KEY (`id_gestionaire`);

--
-- Indexes for table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`isbn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id_emprunt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gestionaire`
--
ALTER TABLE `gestionaire`
  MODIFY `id_gestionaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`num_apogee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emprunt_ibfk_3` FOREIGN KEY (`id_gestionnaire`) REFERENCES `gestionaire` (`id_gestionaire`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
