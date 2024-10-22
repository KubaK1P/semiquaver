-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Paź 21, 2024 at 12:10 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `semiquaver`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gitara`
--

CREATE TABLE `gitara` (
  `Id_gitary` int(11) NOT NULL,
  `Cena_jednostkowa` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gitara_koszyk`
--

CREATE TABLE `gitara_koszyk` (
  `Id_gitary` int(11) NOT NULL,
  `Id_koszyka` bigint(20) NOT NULL,
  `Ilosc` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria_produktu`
--

CREATE TABLE `kategoria_produktu` (
  `Id_kategorii_produktu` int(11) NOT NULL,
  `Nazwa_kategorii_produktu` varchar(20) NOT NULL,
  `Opis_kategorii_produktu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `Id_klienta` bigint(20) NOT NULL,
  `Nazwisko` varchar(24) NOT NULL,
  `Imie` varchar(24) NOT NULL,
  `Nr_telefonu` varchar(24) NOT NULL,
  `Email` varchar(24) NOT NULL,
  `Miasto` varchar(24) NOT NULL,
  `Ulica` varchar(24) NOT NULL,
  `Wiek` int(3) DEFAULT NULL,
  `Plec` enum('K','M') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `Id_koszyka` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `magazyn`
--

CREATE TABLE `magazyn` (
  `Id_magazynu` int(11) NOT NULL,
  `Kod_magazynu` varchar(6) NOT NULL,
  `Miasto` varchar(20) NOT NULL,
  `Ulica` varchar(20) DEFAULT NULL,
  `Nr_telefonu` varchar(20) DEFAULT 'NOT_ASSIGNED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opinia`
--

CREATE TABLE `opinia` (
  `Id_opinii` bigint(20) NOT NULL,
  `Tresc_opinii` text NOT NULL,
  `Id_klienta` bigint(20) DEFAULT NULL,
  `Id_produktu` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkt`
--

CREATE TABLE `produkt` (
  `Id_produktu` bigint(20) NOT NULL,
  `Nazwa_produktu` varchar(50) NOT NULL,
  `Opis_produktu` text DEFAULT NULL,
  `Cena_jednostkowa` decimal(8,2) NOT NULL,
  `Zdjecie_produktu` varchar(50) NOT NULL,
  `Id_kategorii_produktu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkt_gitara`
--

CREATE TABLE `produkt_gitara` (
  `Id_produktu` bigint(20) NOT NULL,
  `Id_gitary` int(11) NOT NULL,
  `Ilosc` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkt_koszyk`
--

CREATE TABLE `produkt_koszyk` (
  `Id_produktu` bigint(20) NOT NULL,
  `Id_koszyka` bigint(20) NOT NULL,
  `ilosc` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stan_magazynu`
--

CREATE TABLE `stan_magazynu` (
  `Id_magazynu` int(11) NOT NULL,
  `Id_produktu` bigint(20) NOT NULL,
  `ilosc` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienie`
--

CREATE TABLE `zamowienie` (
  `Id_zamowienia` bigint(20) NOT NULL,
  `Id_klienta` bigint(20) NOT NULL,
  `Data_zlozenia` datetime NOT NULL DEFAULT current_timestamp(),
  `Data_zakonczenia` datetime DEFAULT NULL,
  `Id_koszyka` bigint(20) NOT NULL,
  `Cena_calkowita` decimal(10,2) NOT NULL,
  `Status` enum('Przyjete','Oplacone','W_trakcie','Wykonane','Anulowane') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `gitara`
--
ALTER TABLE `gitara`
  ADD PRIMARY KEY (`Id_gitary`);

--
-- Indeksy dla tabeli `gitara_koszyk`
--
ALTER TABLE `gitara_koszyk`
  ADD KEY `Id_gitary` (`Id_gitary`),
  ADD KEY `Id_koszyka` (`Id_koszyka`);

--
-- Indeksy dla tabeli `kategoria_produktu`
--
ALTER TABLE `kategoria_produktu`
  ADD PRIMARY KEY (`Id_kategorii_produktu`);

--
-- Indeksy dla tabeli `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`Id_klienta`);

--
-- Indeksy dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`Id_koszyka`);

--
-- Indeksy dla tabeli `magazyn`
--
ALTER TABLE `magazyn`
  ADD PRIMARY KEY (`Id_magazynu`);

--
-- Indeksy dla tabeli `opinia`
--
ALTER TABLE `opinia`
  ADD PRIMARY KEY (`Id_opinii`),
  ADD KEY `Id_klienta` (`Id_klienta`),
  ADD KEY `Id_produktu` (`Id_produktu`);

--
-- Indeksy dla tabeli `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`Id_produktu`),
  ADD KEY `Id_kategorii_produktu` (`Id_kategorii_produktu`);

--
-- Indeksy dla tabeli `produkt_gitara`
--
ALTER TABLE `produkt_gitara`
  ADD KEY `Id_produktu` (`Id_produktu`),
  ADD KEY `Id_gitary` (`Id_gitary`);

--
-- Indeksy dla tabeli `produkt_koszyk`
--
ALTER TABLE `produkt_koszyk`
  ADD KEY `Id_produktu` (`Id_produktu`),
  ADD KEY `Id_koszyka` (`Id_koszyka`);

--
-- Indeksy dla tabeli `stan_magazynu`
--
ALTER TABLE `stan_magazynu`
  ADD KEY `Id_magazynu` (`Id_magazynu`),
  ADD KEY `Id_produktu` (`Id_produktu`);

--
-- Indeksy dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD PRIMARY KEY (`Id_zamowienia`),
  ADD KEY `Id_klienta` (`Id_klienta`),
  ADD KEY `Id_koszyka` (`Id_koszyka`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gitara`
--
ALTER TABLE `gitara`
  MODIFY `Id_gitary` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoria_produktu`
--
ALTER TABLE `kategoria_produktu`
  MODIFY `Id_kategorii_produktu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klient`
--
ALTER TABLE `klient`
  MODIFY `Id_klienta` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `Id_koszyka` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `magazyn`
--
ALTER TABLE `magazyn`
  MODIFY `Id_magazynu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opinia`
--
ALTER TABLE `opinia`
  MODIFY `Id_opinii` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produkt`
--
ALTER TABLE `produkt`
  MODIFY `Id_produktu` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zamowienie`
--
ALTER TABLE `zamowienie`
  MODIFY `Id_zamowienia` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gitara_koszyk`
--
ALTER TABLE `gitara_koszyk`
  ADD CONSTRAINT `gitara_koszyk_ibfk_1` FOREIGN KEY (`Id_gitary`) REFERENCES `gitara` (`Id_gitary`),
  ADD CONSTRAINT `gitara_koszyk_ibfk_2` FOREIGN KEY (`Id_koszyka`) REFERENCES `koszyk` (`Id_koszyka`);

--
-- Constraints for table `koszyk`
--
ALTER TABLE `koszyk`
  ADD CONSTRAINT `koszyk_ibfk_1` FOREIGN KEY (`Id_koszyka`) REFERENCES `klient` (`Id_klienta`);

--
-- Constraints for table `opinia`
--
ALTER TABLE `opinia`
  ADD CONSTRAINT `opinia_ibfk_2` FOREIGN KEY (`Id_klienta`) REFERENCES `klient` (`Id_klienta`),
  ADD CONSTRAINT `opinia_ibfk_3` FOREIGN KEY (`Id_produktu`) REFERENCES `produkt` (`Id_produktu`);

--
-- Constraints for table `produkt`
--
ALTER TABLE `produkt`
  ADD CONSTRAINT `produkt_ibfk_1` FOREIGN KEY (`Id_kategorii_produktu`) REFERENCES `kategoria_produktu` (`Id_kategorii_produktu`);

--
-- Constraints for table `produkt_gitara`
--
ALTER TABLE `produkt_gitara`
  ADD CONSTRAINT `produkt_gitara_ibfk_1` FOREIGN KEY (`Id_produktu`) REFERENCES `produkt` (`Id_produktu`),
  ADD CONSTRAINT `produkt_gitara_ibfk_2` FOREIGN KEY (`Id_gitary`) REFERENCES `gitara` (`Id_gitary`);

--
-- Constraints for table `produkt_koszyk`
--
ALTER TABLE `produkt_koszyk`
  ADD CONSTRAINT `produkt_koszyk_ibfk_1` FOREIGN KEY (`Id_produktu`) REFERENCES `produkt` (`Id_produktu`),
  ADD CONSTRAINT `produkt_koszyk_ibfk_2` FOREIGN KEY (`Id_koszyka`) REFERENCES `koszyk` (`Id_koszyka`);

--
-- Constraints for table `stan_magazynu`
--
ALTER TABLE `stan_magazynu`
  ADD CONSTRAINT `stan_magazynu_ibfk_1` FOREIGN KEY (`Id_magazynu`) REFERENCES `magazyn` (`Id_magazynu`),
  ADD CONSTRAINT `stan_magazynu_ibfk_2` FOREIGN KEY (`Id_produktu`) REFERENCES `produkt` (`Id_produktu`);

--
-- Constraints for table `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD CONSTRAINT `zamowienie_ibfk_1` FOREIGN KEY (`Id_klienta`) REFERENCES `klient` (`Id_klienta`),
  ADD CONSTRAINT `zamowienie_ibfk_2` FOREIGN KEY (`Id_koszyka`) REFERENCES `koszyk` (`Id_koszyka`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
