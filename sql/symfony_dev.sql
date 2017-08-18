-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Ago 18, 2017 alle 19:10
-- Versione del server: 10.1.25-MariaDB
-- Versione PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `symfony_dev`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `fattura`
--

CREATE TABLE `fattura` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `numero` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `fattura`
--

INSERT INTO `fattura` (`id`, `data`, `numero`, `id_cliente`) VALUES
(1, '2017-08-18 18:35:00', 1, 2),
(2, '2017-08-18 19:03:00', 2, 32);

-- --------------------------------------------------------

--
-- Struttura della tabella `riga_fattura`
--

CREATE TABLE `riga_fattura` (
  `id` int(11) NOT NULL,
  `id_fattura_id` int(11) DEFAULT NULL,
  `descrizione` longtext COLLATE utf8_unicode_ci NOT NULL,
  `quantita` int(11) NOT NULL,
  `importo` decimal(10,0) NOT NULL,
  `importo_iva` decimal(10,0) NOT NULL,
  `totale` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `riga_fattura`
--

INSERT INTO `riga_fattura` (`id`, `id_fattura_id`, `descrizione`, `quantita`, `importo`, `importo_iva`, `totale`) VALUES
(1, 1, 'Test Fattura1', 2, '90', '10', '100'),
(2, 1, 'Riga Test 2', 23, '1', '25', '26'),
(3, 2, 'Riga 1 di fattura 2', 22, '12', '4', '16');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `fattura`
--
ALTER TABLE `fattura`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `riga_fattura`
--
ALTER TABLE `riga_fattura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DA5F2ED823BBC1BA` (`id_fattura_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `fattura`
--
ALTER TABLE `fattura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `riga_fattura`
--
ALTER TABLE `riga_fattura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `riga_fattura`
--
ALTER TABLE `riga_fattura`
  ADD CONSTRAINT `FK_DA5F2ED823BBC1BA` FOREIGN KEY (`id_fattura_id`) REFERENCES `fattura` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
