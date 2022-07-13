-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Creato il: Lug 13, 2022 alle 13:42
-- Versione del server: 5.7.34
-- Versione PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdo`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL,
  `n_patente` varchar(100) NOT NULL,
  `scadenza` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `admin`
--

INSERT INTO `admin` (`id`, `nome`, `cognome`, `n_patente`, `scadenza`, `email`, `password`) VALUES
(1, 'Matteo', 'Rossi', '123456', '2022-07-08', 'matteo@rossi.it', '$2y$12$JWfnFENOPBpsYxteQd3le.URT560sgazY16HijXtvtu.YB3eyMkhe'),
(2, 'Mario', 'Bianchi', '132432148', '2023-03-17', 'mario@bianchi.it', '$2y$12$UmbUVPauHKzfVwyBQXVV5uH4ZeamntMZ3a1ivoyTm/2eJaZW5hS/W'),
(3, 'Piero', 'Rossi', '34958084', '2023-03-14', 'piero@rossi.it', '$2y$12$CtSH8gsgRb0MjPtwdWfQbOHxf0y.RYHoMjEX5bV0jZLVgoiDipuBu'),
(4, 'Veronica', 'Viola', '42141249', '2024-05-17', 'veronica@viola.it', '$2y$12$vinc3lx6K9MpgyVPi3HzLOvXB/A4K5adfxSHb3Lyr9ZPwXwcn35hq'),
(5, 'Giulio', 'Bianchi', '435231345', '2030-06-02', 'giulio@bianchi.it', '$2y$12$EDab3nMlmb.9GSJkIT0DXeSzOV9A5BPWvuIbukGA9/74G/ihkaH7i'),
(6, 'Geronimo', 'fucsia', '38599273', '2028-07-15', 'geronimo@fucsia.it', '$2y$12$h453956PM/lo5t6SFuMI5.U5Z9almCVYa47R.D7ARIvmBhvV8WoVq');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
