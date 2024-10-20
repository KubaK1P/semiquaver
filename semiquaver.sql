-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Paź 2024, 16:53
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `semiquaver`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gitara`
--

CREATE TABLE `gitara` (
  `Id_gitary` int(11) NOT NULL,
  `Cena_jednostkowa` decimal(6,2) NOT NULL,
  `Id_pickupu` bigint(20) NOT NULL,
  `Id_strun` bigint(20) NOT NULL,
  `Id_gryfu` bigint(20) NOT NULL,
  `Id_ciala` bigint(20) NOT NULL,
  `Id_kluczy` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gitara_koszyk`
--

CREATE TABLE `gitara_koszyk` (
  `Id_gitary` int(11) NOT NULL,
  `Id_koszyka` bigint(20) NOT NULL,
  `Ilosc` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria_produktu`
--

CREATE TABLE `kategoria_produktu` (
  `Id_kategorii_produktu` int(11) NOT NULL,
  `Nazwa_kategorii_produktu` varchar(20) NOT NULL,
  `Opis_kategorii_produktu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `Id_koszyka` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oferta`
--

CREATE TABLE `oferta` (
  `Id_oferty` bigint(20) NOT NULL,
  `Id_produktu` bigint(20) NOT NULL,
  `Opis_oferty` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oferta_koszyk`
--

CREATE TABLE `oferta_koszyk` (
  `Id_oferty` bigint(20) NOT NULL,
  `Id_koszyka` bigint(20) NOT NULL,
  `ilosc` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opinia`
--

CREATE TABLE `opinia` (
  `Id_opinii` bigint(20) NOT NULL,
  `Tresc_opinii` text NOT NULL,
  `Id_oferty` bigint(20) NOT NULL,
  `Id_klienta` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stan_magazynu`
--

CREATE TABLE `stan_magazynu` (
  `Id_magazynu` int(11) NOT NULL,
  `Id_produktu` bigint(20) NOT NULL,
  `ilosc` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `gitara`
--
ALTER TABLE `gitara`
  ADD PRIMARY KEY (`Id_gitary`),
  ADD KEY `Id_pickupu` (`Id_pickupu`),
  ADD KEY `Id_strun` (`Id_strun`),
  ADD KEY `Id_gryfu` (`Id_gryfu`),
  ADD KEY `Id_ciala` (`Id_ciala`),
  ADD KEY `Id_kluczy` (`Id_kluczy`);

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
-- Indeksy dla tabeli `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`Id_oferty`),
  ADD KEY `Id_produktu` (`Id_produktu`);

--
-- Indeksy dla tabeli `oferta_koszyk`
--
ALTER TABLE `oferta_koszyk`
  ADD KEY `Id_oferty` (`Id_oferty`),
  ADD KEY `Id_koszyka` (`Id_koszyka`);

--
-- Indeksy dla tabeli `opinia`
--
ALTER TABLE `opinia`
  ADD PRIMARY KEY (`Id_opinii`),
  ADD KEY `Id_oferty` (`Id_oferty`),
  ADD KEY `Id_klienta` (`Id_klienta`);

--
-- Indeksy dla tabeli `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`Id_produktu`),
  ADD KEY `Id_kategorii_produktu` (`Id_kategorii_produktu`);

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
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `gitara`
--
ALTER TABLE `gitara`
  MODIFY `Id_gitary` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `kategoria_produktu`
--
ALTER TABLE `kategoria_produktu`
  MODIFY `Id_kategorii_produktu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `klient`
--
ALTER TABLE `klient`
  MODIFY `Id_klienta` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `Id_koszyka` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `magazyn`
--
ALTER TABLE `magazyn`
  MODIFY `Id_magazynu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `oferta`
--
ALTER TABLE `oferta`
  MODIFY `Id_oferty` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `opinia`
--
ALTER TABLE `opinia`
  MODIFY `Id_opinii` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `produkt`
--
ALTER TABLE `produkt`
  MODIFY `Id_produktu` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  MODIFY `Id_zamowienia` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `gitara`
--
ALTER TABLE `gitara`
  ADD CONSTRAINT `gitara_ibfk_1` FOREIGN KEY (`Id_pickupu`) REFERENCES `produkt` (`Id_produktu`),
  ADD CONSTRAINT `gitara_ibfk_2` FOREIGN KEY (`Id_strun`) REFERENCES `produkt` (`Id_produktu`),
  ADD CONSTRAINT `gitara_ibfk_3` FOREIGN KEY (`Id_gryfu`) REFERENCES `produkt` (`Id_produktu`),
  ADD CONSTRAINT `gitara_ibfk_4` FOREIGN KEY (`Id_ciala`) REFERENCES `produkt` (`Id_produktu`),
  ADD CONSTRAINT `gitara_ibfk_5` FOREIGN KEY (`Id_kluczy`) REFERENCES `produkt` (`Id_produktu`);

--
-- Ograniczenia dla tabeli `gitara_koszyk`
--
ALTER TABLE `gitara_koszyk`
  ADD CONSTRAINT `gitara_koszyk_ibfk_1` FOREIGN KEY (`Id_gitary`) REFERENCES `gitara` (`Id_gitary`),
  ADD CONSTRAINT `gitara_koszyk_ibfk_2` FOREIGN KEY (`Id_koszyka`) REFERENCES `koszyk` (`Id_koszyka`);

--
-- Ograniczenia dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD CONSTRAINT `koszyk_ibfk_1` FOREIGN KEY (`Id_koszyka`) REFERENCES `klient` (`Id_klienta`);

--
-- Ograniczenia dla tabeli `oferta`
--
ALTER TABLE `oferta`
  ADD CONSTRAINT `oferta_ibfk_1` FOREIGN KEY (`Id_produktu`) REFERENCES `produkt` (`Id_produktu`);

--
-- Ograniczenia dla tabeli `oferta_koszyk`
--
ALTER TABLE `oferta_koszyk`
  ADD CONSTRAINT `oferta_koszyk_ibfk_1` FOREIGN KEY (`Id_oferty`) REFERENCES `oferta` (`Id_oferty`),
  ADD CONSTRAINT `oferta_koszyk_ibfk_2` FOREIGN KEY (`Id_koszyka`) REFERENCES `koszyk` (`Id_koszyka`);

--
-- Ograniczenia dla tabeli `opinia`
--
ALTER TABLE `opinia`
  ADD CONSTRAINT `opinia_ibfk_1` FOREIGN KEY (`Id_oferty`) REFERENCES `oferta` (`Id_oferty`),
  ADD CONSTRAINT `opinia_ibfk_2` FOREIGN KEY (`Id_klienta`) REFERENCES `klient` (`Id_klienta`);

--
-- Ograniczenia dla tabeli `produkt`
--
ALTER TABLE `produkt`
  ADD CONSTRAINT `produkt_ibfk_1` FOREIGN KEY (`Id_kategorii_produktu`) REFERENCES `kategoria_produktu` (`Id_kategorii_produktu`);

--
-- Ograniczenia dla tabeli `stan_magazynu`
--
ALTER TABLE `stan_magazynu`
  ADD CONSTRAINT `stan_magazynu_ibfk_1` FOREIGN KEY (`Id_magazynu`) REFERENCES `magazyn` (`Id_magazynu`),
  ADD CONSTRAINT `stan_magazynu_ibfk_2` FOREIGN KEY (`Id_produktu`) REFERENCES `produkt` (`Id_produktu`);

--
-- Ograniczenia dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD CONSTRAINT `zamowienie_ibfk_1` FOREIGN KEY (`Id_klienta`) REFERENCES `klient` (`Id_klienta`),
  ADD CONSTRAINT `zamowienie_ibfk_2` FOREIGN KEY (`Id_koszyka`) REFERENCES `koszyk` (`Id_koszyka`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
