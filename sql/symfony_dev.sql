-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Ago 23, 2017 alle 11:51
-- Versione del server: 10.1.26-MariaDB
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
(1, '2017-08-21 17:08:00', 1, 22),
(2, '2017-08-22 13:03:00', 2, 22),
(3, '2017-08-22 18:25:00', 203, 21),
(4, '2017-06-05 16:43:00', 204, 203);

-- --------------------------------------------------------

--
-- Struttura della tabella `riga_fattura`
--

CREATE TABLE `riga_fattura` (
  `id` int(11) NOT NULL,
  `id_fattura_id` int(11) DEFAULT NULL,
  `descrizione` longtext COLLATE utf8_unicode_ci NOT NULL,
  `quantita` int(11) NOT NULL,
  `importo` decimal(12,2) NOT NULL,
  `importo_iva` decimal(12,2) NOT NULL,
  `totale` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `riga_fattura`
--

INSERT INTO `riga_fattura` (`id`, `id_fattura_id`, `descrizione`, `quantita`, `importo`, `importo_iva`, `totale`) VALUES
(1, 1, 'Try first', 22, '234.00', '22.00', '285.48'),
(2, 1, 'lalala song dvd', 2, '20.50', '22.00', '25.01'),
(3, 2, 'Acquisto DVD', 1, '12.69', '22.00', '15.48'),
(4, 3, 'Fornitura CD di Pinco Pallino', 20, '214.65', '22.00', '261.87'),
(5, 3, 'Fornitura CD di Tizio Caio', 11, '215.50', '22.00', '262.91'),
(6, 1, 'Rivendita monitor', 3, '150.00', '22.00', '183.00'),
(7, 1, 'Esportazione CPU in Germania', 20, '22458.69', '19.00', '26725.84'),
(9, 3, 'Test vendita dopo averne eliminato una voce', 25, '185.20', '22.00', '225.94');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `riga_fattura`
--
ALTER TABLE `riga_fattura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
