-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28 Mai 2017 la 22:43
-- Versiune server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bestparts`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `cart_entry`
--

CREATE TABLE `cart_entry` (
  `ID` int(11) NOT NULL,
  `ID_Utilizator` int(11) NOT NULL,
  `ID_Produs` int(11) NOT NULL,
  `Nr_Produse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `cart_entry`
--

INSERT INTO `cart_entry` (`ID`, `ID_Utilizator`, `ID_Produs`, `Nr_Produse`) VALUES
(25, 13, 10, 3),
(26, 13, 7, 4);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `categorii_produse`
--

CREATE TABLE `categorii_produse` (
  `ID_Categorie` int(11) NOT NULL,
  `Categorie` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `categorii_produse`
--

INSERT INTO `categorii_produse` (`ID_Categorie`, `Categorie`) VALUES
(8, 'Carcase'),
(6, 'HDD'),
(4, 'Memorii'),
(3, 'Placi de baza'),
(2, 'Placi Video'),
(1, 'Procesoare'),
(5, 'SSD'),
(7, 'Surse');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `istoric`
--

CREATE TABLE `istoric` (
  `ID` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `Pret_total` int(11) NOT NULL,
  `Data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `istoric`
--

INSERT INTO `istoric` (`ID`, `ID_User`, `Pret_total`, `Data`) VALUES
(1, 25, 155, '2018-03-03'),
(2, 25, 40, '2018-03-04'),
(3, 26, 1000, '2017-05-28'),
(4, 26, 600, '2017-05-28'),
(5, 26, 10500, '2017-05-28'),
(6, 26, 500, '2017-05-28'),
(7, 26, 1300, '2017-05-28'),
(8, 26, 2800, '2017-05-28');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `produse`
--

CREATE TABLE `produse` (
  `ID_Produs` int(11) NOT NULL,
  `Denumire` varchar(300) NOT NULL,
  `Pret` int(11) NOT NULL,
  `Detalii` varchar(1000) DEFAULT NULL,
  `Disponibil` int(11) NOT NULL,
  `Categorie` int(11) NOT NULL,
  `Imagine` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `produse`
--

INSERT INTO `produse` (`ID_Produs`, `Denumire`, `Pret`, `Detalii`, `Disponibil`, `Categorie`, `Imagine`) VALUES
(1, 'HDD Toshiba DT01ACA 500GB, 7200rpm, 32MB cache, SATA III', 400, 'Capacitate:500GB;Viteza Rotatie:7200rpm;Interfata:SATA III;', 0, 6, 'img/produse/2tb-sata-iii-intellipower-64mb-red-634d503f2c67cbfac87a89dfac9c765c.jpg'),
(7, 'HyperFury SSD 240GB', 500, 'Spatiu stocare:240GB;Viteza scriere:200MB/s;Viteza citire: 600MB/s;', 99, 5, 'img/produse/hyperx-fury-240gb-sata-iii-25-inch-016ed9bd52d373a1f95a153d60e8e589.jpg'),
(8, 'XPG 2048MB DDR3', 200, 'Tip memorie:DDR3;Frecventa:1333MHz;DualChannel:Da;', 23, 4, 'img/produse/adataxpg.jpg'),
(9, 'Procesor Intel Core i7', 2100, 'Model:6700K;Generatie:Skylake;Frecventa:2800MHz', 20, 1, 'img/produse/78339ed9aaa.jpg'),
(10, 'Procesor Intel Core i5', 1100, 'Model:5300HQ;Generatie:Haswell;Frecventa:2300MHz', 22, 1, 'img/produse/procesor-intel-core-i5-4460-3-2ghz-up-to-3-4ghz-4th-gen-haswell-4872.jpg'),
(11, 'Procesor AMD Ryzen', 2200, 'Model:Ryzen 7;Frecventa:3.0GHz;Core-uri:8', 12, 1, 'img/produse/ryzen_content2.png');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE `users` (
  `ID_Utilizator` int(11) NOT NULL,
  `Nume_Utilizator` varchar(45) NOT NULL,
  `Credit` int(11) DEFAULT '10000',
  `Parola` binary(64) DEFAULT NULL,
  `Nume` varchar(45) DEFAULT NULL,
  `Adresa_Email` varchar(45) NOT NULL,
  `Indiciu_parola` varchar(45) DEFAULT NULL,
  `Prenume` varchar(45) DEFAULT NULL,
  `Data_Nasterii` date DEFAULT NULL,
  `Sex` char(1) DEFAULT NULL,
  `Adresa` varchar(45) DEFAULT NULL,
  `Localitate` varchar(45) DEFAULT NULL,
  `Judet` varchar(45) DEFAULT NULL,
  `Numar_Telefon` varchar(10) DEFAULT NULL,
  `Tip_Plata` varchar(2) DEFAULT NULL,
  `Tip_Utilizator` varchar(45) NOT NULL DEFAULT 'basic'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`ID_Utilizator`, `Nume_Utilizator`, `Credit`, `Parola`, `Nume`, `Adresa_Email`, `Indiciu_parola`, `Prenume`, `Data_Nasterii`, `Sex`, `Adresa`, `Localitate`, `Judet`, `Numar_Telefon`, `Tip_Plata`, `Tip_Utilizator`) VALUES
(13, 'danut95', 100000, 0x36613637336639383762613662376430613632633833643966343833613135383662653031333466623932386664383164353039353533343730656137333633, 'Nume...', 'cos.avram@gmail.com', 'danut95', 'Prenume...', '0000-00-00', NULL, NULL, NULL, NULL, '3234564', NULL, 'admin'),
(17, 'aergae', 10000, 0x67617264670000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, NULL, 'ffdrsg@dd.c', 'sgas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'basic'),
(19, 'aerdgsr', 10000, 0x62663634383435303366313834656339366665323965643037343862666263643935356531373461663837663961363062646133663236363163353135666665, NULL, 'grth@dfdh.dr', 'awregerd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'basic'),
(24, 'fgsfgh', 10000, 0x66383565323534306563373933663664313235303161636238316230626234303335613633343761643261653239393439396637656631316432303766646466, NULL, 'rtgf@grf.yf', 'rejetyj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'basic'),
(25, 'aaergvbrt', 10000, 0x38383132376631333132373364303766653233373932336238353330613664373932323630343936633532336163633536336133363965336330366335366135, NULL, 'rhth@gd.vrt', 'eryjetyj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'basic'),
(26, 'danut96', 26630, 0x37373738636332616330333937353466653063333938343634623236353534616463633633383036656436346562363937356562383663343665656431643165, NULL, 'fdee@jj.cl', 'jkasflakj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'basic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_entry`
--
ALTER TABLE `cart_entry`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`),
  ADD KEY `ID_Utilizator_idx` (`ID_Utilizator`),
  ADD KEY `FK_idprod_idx` (`ID_Produs`);

--
-- Indexes for table `categorii_produse`
--
ALTER TABLE `categorii_produse`
  ADD PRIMARY KEY (`ID_Categorie`),
  ADD UNIQUE KEY `ID_Categorie_UNIQUE` (`ID_Categorie`),
  ADD UNIQUE KEY `Categorie_UNIQUE` (`Categorie`);

--
-- Indexes for table `istoric`
--
ALTER TABLE `istoric`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`),
  ADD KEY `FK_user_idx` (`ID_User`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`ID_Produs`),
  ADD UNIQUE KEY `ID_Produs_UNIQUE` (`ID_Produs`),
  ADD KEY `FK_1_idx` (`Categorie`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_Utilizator`),
  ADD UNIQUE KEY `ID_User_UNIQUE` (`ID_Utilizator`),
  ADD UNIQUE KEY `Nume_Utilizator_UNIQUE` (`Nume_Utilizator`),
  ADD UNIQUE KEY `Adresa_Email_UNIQUE` (`Adresa_Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_entry`
--
ALTER TABLE `cart_entry`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `categorii_produse`
--
ALTER TABLE `categorii_produse`
  MODIFY `ID_Categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `istoric`
--
ALTER TABLE `istoric`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `ID_Produs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID_Utilizator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `cart_entry`
--
ALTER TABLE `cart_entry`
  ADD CONSTRAINT `FK_idprod` FOREIGN KEY (`ID_Produs`) REFERENCES `produse` (`ID_Produs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_iduser` FOREIGN KEY (`ID_Utilizator`) REFERENCES `users` (`ID_Utilizator`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrictii pentru tabele `istoric`
--
ALTER TABLE `istoric`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID_Utilizator`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrictii pentru tabele `produse`
--
ALTER TABLE `produse`
  ADD CONSTRAINT `FK_1` FOREIGN KEY (`Categorie`) REFERENCES `categorii_produse` (`ID_Categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
