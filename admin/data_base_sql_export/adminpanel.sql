-- phpMyAdmin SQL Dump
-- version 2.11.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 06, 2022 at 12:50 AM
-- Server version: 4.1.22
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `adminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE IF NOT EXISTS `consultation` (
  `idc` int(11) NOT NULL auto_increment,
  `idmed` int(11) NOT NULL default '0',
  `idpas` int(11) NOT NULL default '0',
  `idmedica` int(11) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `tarif` int(11) NOT NULL default '0',
  PRIMARY KEY  (`idc`),
  UNIQUE KEY `idmedica` (`idmedica`),
  UNIQUE KEY `idpas` (`idpas`),
  UNIQUE KEY `idmed_2` (`idmed`),
  KEY `idmed` (`idmed`,`idpas`,`idmedica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='table de consultation' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`idc`, `idmed`, `idpas`, `idmedica`, `date`, `tarif`) VALUES
(1, 2, 2, 1, '2022-01-09 00:00:00', 215000),
(2, 3, 4, 2, '2022-01-02 00:00:00', 80);

-- --------------------------------------------------------

--
-- Table structure for table `medecin`
--

CREATE TABLE IF NOT EXISTS `medecin` (
  `idmed` int(11) NOT NULL auto_increment,
  `nom` varchar(30) NOT NULL default '',
  `prenom` varchar(30) NOT NULL default '',
  `sex` varchar(10) NOT NULL default '',
  `profession` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`idmed`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='medcin Rh table' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `medecin`
--

INSERT INTO `medecin` (`idmed`, `nom`, `prenom`, `sex`, `profession`) VALUES
(1, 'amine', 'banzarti', 'male', 'geneco'),
(2, 'Ali', 'dougaze', 'male', 'generaliste'),
(3, 'Hamza', 'Ifa', 'famme', 'psycho');

-- --------------------------------------------------------

--
-- Table structure for table `medicament`
--

CREATE TABLE IF NOT EXISTS `medicament` (
  `idmedica` int(11) NOT NULL auto_increment,
  `libell` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`idmedica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `medicament`
--

INSERT INTO `medicament` (`idmedica`, `libell`) VALUES
(1, 'Doliprane'),
(2, 'vixe');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `idp` int(11) NOT NULL auto_increment,
  `nomp` varchar(30) NOT NULL default '',
  `prenomp` varchar(30) NOT NULL default '',
  `sex` varchar(30) NOT NULL default '',
  `dateness` date NOT NULL default '0000-00-00',
  `City` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`idp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='table Rh for pations' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`idp`, `nomp`, `prenomp`, `sex`, `dateness`, `City`) VALUES
(1, 'bouden', 'rabiee', 'male', '2022-01-02', 'tunis'),
(2, 'ali', 'mourali', 'famme', '2022-01-10', 'nabeul'),
(4, 'amiro', 'belhaj', 'male', '2022-01-10', 'soussa');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL default '',
  `email` varchar(30) NOT NULL default '',
  `password` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Sessions user  table' AUTO_INCREMENT=26 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`) VALUES
(23, 'wejden', 'elmakki@gmail.cmmmmmm', 'uwu'),
(25, 'admin', 'admin@g.c', '123');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `consultation_ibfk_1` FOREIGN KEY (`idmed`) REFERENCES `medecin` (`idmed`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultation_ibfk_2` FOREIGN KEY (`idpas`) REFERENCES `patient` (`idp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consultation_ibfk_3` FOREIGN KEY (`idmedica`) REFERENCES `medicament` (`idmedica`) ON DELETE CASCADE ON UPDATE CASCADE;
