-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2025 at 07:53 PM
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
  `Cena_jednostkowa` decimal(6,2) NOT NULL,
  `Id_pickupu` bigint(20) NOT NULL,
  `Id_strun` bigint(20) NOT NULL,
  `Id_mostka` bigint(20) NOT NULL,
  `Id_drewna` bigint(20) NOT NULL,
  `Id_kluczy` bigint(20) NOT NULL,
  `Id_klienta` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gitara`
--

INSERT INTO `gitara` (`Id_gitary`, `Cena_jednostkowa`, `Id_pickupu`, `Id_strun`, `Id_mostka`, `Id_drewna`, `Id_kluczy`, `Id_klienta`) VALUES
(2, 2852.00, 20, 10, 12, 15, 17, 2),
(3, 2012.00, 19, 9, 12, 15, 17, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gitara_koszyk`
--

CREATE TABLE `gitara_koszyk` (
  `Id_gitary` int(11) NOT NULL,
  `Id_koszyka` bigint(20) NOT NULL,
  `Ilosc` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gitara_koszyk`
--

INSERT INTO `gitara_koszyk` (`Id_gitary`, `Id_koszyka`, `Ilosc`) VALUES
(2, 3, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria_produktu`
--

CREATE TABLE `kategoria_produktu` (
  `Id_kategorii_produktu` int(11) NOT NULL,
  `Nazwa_kategorii_produktu` varchar(60) NOT NULL,
  `Opis_kategorii_produktu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoria_produktu`
--

INSERT INTO `kategoria_produktu` (`Id_kategorii_produktu`, `Nazwa_kategorii_produktu`, `Opis_kategorii_produktu`) VALUES
(1, 'Instrumenty klawiszowe', 'Pianina, akordeony, keyboardy itp.'),
(8, 'Instrumenty Smyczkowe', 'Skrzypce, altówki, wiolonczele, kontrabasy'),
(9, 'Instrumenty dęte', 'Flety, oboje, trąbki, tuby, inne flety'),
(10, 'Gitary', 'Elektroakustyczne, Akustyczne, Klasyczne, Elektryczne'),
(11, 'Pickupy', 'pickupy do gitar'),
(12, 'Akcesoria', 'Pulpity, paski, stroiki'),
(13, 'Struny', 'Struny do gitar'),
(14, 'Mostki', 'mostki do gitar'),
(15, 'Klucze', 'Klucze do gitar'),
(16, 'Drewno', 'Drewno do gitar');

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
  `Plec` enum('K','M') DEFAULT NULL,
  `haslo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klient`
--

INSERT INTO `klient` (`Id_klienta`, `Nazwisko`, `Imie`, `Nr_telefonu`, `Email`, `Miasto`, `Ulica`, `Wiek`, `Plec`, `haslo`) VALUES
(1, 'test', 'test', '000000000', 'test@test.com', 'Test', 'Test', 99, 'M', '123'),
(2, 'Kuś', 'Jakub', '516483644', 'kubakus2604@gmail.com', 'Gliwice', 'Tylna', 18, 'M', '$2y$10$Y5sfri6D1j24YLQaZPA7QuHe2COz7FWxQcsNvOQVPCwmAzdiZPAMS'),
(3, 'Geodecki', 'Bartosz', '500500500', '1p22geo@gmail.com', 'Zabrze', 'Sobieskiego', 13, 'M', '$2y$10$OyNPuDkSzKLqLjR1sYIVTe5QDRfMqXab4LF5AUHDiJIZesP9rc.sG'),
(4, 'Zambrzycka', 'Magdalena', '789432874', '1p22zambrzycka@gmail.com', 'BRAK_INFORMACJI', 'BRAK_INFORMACJI', 16, 'K', '$2y$10$SNbHX6cGkIY5dfhMLnZcielcPLixzA2S5ILtRuBnUupv96GP2sjyW'),
(5, 'koszyk', 'koszyk', '213769420', 'koszyk@gmail.com', 'koszyk', 'koszyk', 44, 'M', '$2y$10$mYm47fVQfAgCMMgI8Dnfv./10IU6khjCKzANa3.qX5az.nlurdkZ6');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `Id_koszyka` bigint(20) NOT NULL,
  `Id_klienta` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `koszyk`
--

INSERT INTO `koszyk` (`Id_koszyka`, `Id_klienta`) VALUES
(2, 1),
(3, 2),
(4, 3),
(5, 4),
(1, 5);

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
  `Id_produktu` bigint(20) NOT NULL,
  `Id_klienta` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `opinia`
--

INSERT INTO `opinia` (`Id_opinii`, `Tresc_opinii`, `Id_produktu`, `Id_klienta`) VALUES
(1, 'Jakubs review for pianino yamaha', 1, 2),
(2, 'Polecam gorąco fajny fortepian, kupiłem dla dziecka na urodziny\r\nFajna cena polecam', 1, 3),
(3, 'Super pianino', 1, 4),
(4, 'Fajny flet', 7, 4),
(5, 'Niezbyt fajny flet poprzeczny widziałem lepsze', 7, 3);

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

--
-- Dumping data for table `produkt`
--

INSERT INTO `produkt` (`Id_produktu`, `Nazwa_produktu`, `Opis_produktu`, `Cena_jednostkowa`, `Zdjecie_produktu`, `Id_kategorii_produktu`) VALUES
(1, 'Pianino Yamaha', 'W naszych umysłach, pianino nie jest \"skończonym\" instrumentem; nieustannie staramy się go ulepszać dla tych, którzy lubią na nim grać. W dążeniu do \"ideału\" instrumentu - idealnego brzmienia, idealnego rezonansu, a nawet idealnego stylu - kontynuujemy proces ewolucji pianina na wiele sposobów, włączając w to stosowanie innowacyjnych metod produkcji oraz skrupulatny dobór nowych materiałów. Marka fortepianów Yamaha jest znana i kochana na całym świecie, a my dbamy o to, żeby podtrzymać tę reputację.', 6999.99, '../img/product-example.jpg', 1),
(2, 'Skrzypce Stradivarius', 'SkrzepceSkrzepceSk\r\nrzepceSkrzepceSkrzepceSkrzepceSkrzepceSkrzepceSkrzepceSkrzepce                                                                                       SkrzepceSkrzepceSkr\r\nzepceSkrzepceSkrzepceSkrzepceSkrzepceSkrzepceSkrzepceSkrzepce', 300.00, '../img/product-example2.jpg', 8),
(3, 'Flet prosty', 'Denerwujący instrument, który bardzo lubię', 30.00, '../img/product-example3.jpg', 9),
(4, 'Altowka', 'Altowka fajna niedroga dobra cena na allergo i moderato tempo', 250.00, '../img/product-example2.jpg', 8),
(5, 'Keyboard Donner', 'W naszych umysłach, keyboard nie jest \"skończonym\" instrumentem; nieustannie staramy się go ulepszać dla tych, którzy lubią na nim grać. W dążeniu do \"ideału\" instrumentu - idealnego brzmienia, idealnego rezonansu, a nawet idealnego stylu - kontynuujemy proces ewolucji pianina na wiele sposobów, włączając w to stosowanie innowacyjnych metod produkcji oraz skrupulatny dobór nowych materiałów. Marka fortepianów Yamaha jest znana i kochana na całym świecie, a my dbamy o to, żeby podtrzymać tę reputację.', 3000.00, '../img/keyboard.png', 1),
(6, 'Keyboard Casio', 'W naszych umysłach, keyboard nie jest Casio zegarek, kasio keyboard muzyka, tak, superowy instrument', 737.00, '../img/casio.png', 1),
(7, 'Flet poprzeczny', 'krzywy flet', 60.00, '../img/flet.png', 9),
(8, 'Pickup do gitary akustycznej TP-011', 'Kolor: Czarny\r\nMateriał: PCV, ABS\r\nW skład zestawu wchodzi\r\n1 x Pickup\r\n1 x Kabel 2.8m\r\nZastosowanie: Gitara akustyczna', 100.00, '../img/pickup_1.png', 11),
(9, 'Pickup do gitary akustycznej Fender ', 'Pojedyncza cewka magnetyczna\r\nProsta instalacja', 162.00, '../img/pickup_2.png', 11),
(10, 'Przetwornik do gitary elektrycznej Greg Koch ', 'Dla nikogo zainteresowanego nie było niespodzianką, gdy Greg Koch poprosił o przetestowanie możliwości technologii Fluence zastosowanej w P90 – zwłaszcza po sukcesie, jaki odniósł jego sygnowany zestaw pickupów Gristle-Tone. Podobnie jak one, przetworniki P90 sygnowane nazwiskiem Grega są głęboko zakorzenione w tradycji, co w efekcie przekłada się na dźwięki, które tylko on potrafi wyczarować.', 1202.00, '../img/pickup_3.png', 11),
(11, 'Ernie Ball 2221', 'Rozmiar: .010 - .046\r\nRegular Slinky\r\nNiklowana stal\r\nWyprodukowano w USA', 23.00, '../img/struny_1.png', 13),
(12, 'Elixir Nanoweb Light-Heavy', 'String Set for Electric Guitars\r\nLight heavy gauge\r\nNano web\r\nGauge: 010-052\r\nString gauges: 010-013 - 017-032 - 042-052', 70.00, '../img/struny_2.png', 13),
(13, 'Daddario EXL140-10P', 'String Sets\r\nFor electric guitar\r\nNickel-plated steel\r\nBright, clear sound\r\nGauges: 010-013-017-w030-w042-w052\r\nPack includes: 10 Sets\r\n', 258.00, '../img/struny_3.png', 13),
(14, 'Mostek gitarowy Chromowane mostki Tremolo', 'mostek aaa', 201.00, '../img/mostek_1.png', 14),
(15, 'Schaller Mostek do gitary elektrycznej STM', 'mostek aaaaaaaaaaaaaaaaaaaaaaaa 2', 250.00, '../img/mostek_2.png', 14),
(16, 'Solidne Klucze stroiki do gitary klasycznej', 'klucze aaa', 25.00, '../img/klucze_1.png', 15),
(17, 'klucze stroiki Gitara Klasyczna Akustyczna', 'klucze aaaaaaaaaaaaaaaaaaaaa 2', 30.00, '../img/klucze_2.png', 15),
(18, 'dąb', 'drewno dobre', 300.00, '../img/drewno_1.png', 16),
(19, 'mahoń', 'drewno czarne', 500.00, '../img/drewno_2.png', 16),
(20, 'brzoza', 'brzoza drewno', 300.00, '../img/drewno_3.png', 16);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkt_koszyk`
--

CREATE TABLE `produkt_koszyk` (
  `Id_produktu` bigint(20) NOT NULL,
  `Id_koszyka` bigint(20) NOT NULL,
  `ilosc` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkt_koszyk`
--

INSERT INTO `produkt_koszyk` (`Id_produktu`, `Id_koszyka`, `ilosc`) VALUES
(6, 4, 1),
(7, 3, 2),
(1, 3, 1),
(2, 4, 2),
(6, 3, 1),
(3, 3, 4);

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
  ADD PRIMARY KEY (`Id_gitary`),
  ADD KEY `Id_pickupu` (`Id_pickupu`),
  ADD KEY `Id_strun` (`Id_strun`),
  ADD KEY `Id_gryfu` (`Id_mostka`),
  ADD KEY `Id_ciala` (`Id_drewna`),
  ADD KEY `Id_kluczy` (`Id_kluczy`),
  ADD KEY `Id_klienta` (`Id_klienta`);

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
  ADD PRIMARY KEY (`Id_koszyka`),
  ADD KEY `Id_klienta` (`Id_klienta`);

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
  MODIFY `Id_gitary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategoria_produktu`
--
ALTER TABLE `kategoria_produktu`
  MODIFY `Id_kategorii_produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `klient`
--
ALTER TABLE `klient`
  MODIFY `Id_klienta` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `Id_koszyka` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `magazyn`
--
ALTER TABLE `magazyn`
  MODIFY `Id_magazynu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opinia`
--
ALTER TABLE `opinia`
  MODIFY `Id_opinii` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produkt`
--
ALTER TABLE `produkt`
  MODIFY `Id_produktu` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `zamowienie`
--
ALTER TABLE `zamowienie`
  MODIFY `Id_zamowienia` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gitara`
--
ALTER TABLE `gitara`
  ADD CONSTRAINT `gitara_ibfk_1` FOREIGN KEY (`Id_pickupu`) REFERENCES `produkt` (`Id_produktu`),
  ADD CONSTRAINT `gitara_ibfk_2` FOREIGN KEY (`Id_strun`) REFERENCES `produkt` (`Id_produktu`),
  ADD CONSTRAINT `gitara_ibfk_3` FOREIGN KEY (`Id_mostka`) REFERENCES `produkt` (`Id_produktu`),
  ADD CONSTRAINT `gitara_ibfk_4` FOREIGN KEY (`Id_drewna`) REFERENCES `produkt` (`Id_produktu`),
  ADD CONSTRAINT `gitara_ibfk_5` FOREIGN KEY (`Id_kluczy`) REFERENCES `produkt` (`Id_produktu`),
  ADD CONSTRAINT `gitara_ibfk_6` FOREIGN KEY (`Id_klienta`) REFERENCES `klient` (`Id_klienta`);

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
  ADD CONSTRAINT `koszyk_ibfk_1` FOREIGN KEY (`Id_klienta`) REFERENCES `klient` (`Id_klienta`);

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
