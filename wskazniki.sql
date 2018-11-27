-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Lis 2018, 08:13
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wskazniki`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `item`
--

CREATE TABLE `item` (
  `ID` int(11) NOT NULL,
  `Name` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `item`
--

INSERT INTO `item` (`ID`, `Name`) VALUES
(1, 'ADDCO BOOST'),
(2, 'ADDCO OilPressure'),
(3, 'ADDCO OilTemp'),
(4, 'ADDCO EGT'),
(5, 'ADDCO AFR'),
(6, 'ADDCO WaterTemp'),
(10, 'DEFI Boost'),
(11, 'DEFI OilPressure'),
(12, 'DEFI OilTemp'),
(13, 'DEFI EGT'),
(20, 'Greddy Boost'),
(21, 'Greddy OilPressure'),
(22, 'Greddy OilTemp'),
(23, 'Greddy EGT'),
(30, 'Nakladki 4 x BREMBO Red'),
(31, 'Nakladki 4 x BREMBO Blue'),
(32, 'Nakladki 4 x BREMBO Yellow'),
(33, 'Nakladki 4 x BREMBO Gold'),
(50, 'Lotki male 4 szt.'),
(51, 'Lotki duze 6 szt.'),
(52, 'Lotki plaskie plastik 4 szt.'),
(60, 'Blow Off 1.8t'),
(70, 'Obudowa plaska potrojna 3x52mm'),
(71, 'Obudowa na slupek potrojna 3x52mm'),
(100, 'OilPressure sensor czujnik'),
(101, 'Boost sensor czujnik'),
(102, 'EGT sensor czujnik termopara'),
(110, 'Adapter do turbo wezyk Quick tap'),
(109, 'Trojnik M12x1.5 x 1/8NPT'),
(80, 'MP3 AUX USB Adapter 8PIN'),
(90, 'Podstawka pod filtr oleju'),
(98, 'Dystans 5mm'),
(99, 'Daszek maly 52mm');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `seller`
--

CREATE TABLE `seller` (
  `ID` int(11) NOT NULL,
  `Seller_name` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `seller`
--

INSERT INTO `seller` (`ID`, `Seller_name`) VALUES
(1, 'PIVOT CAR ELECTRICAL PARTS'),
(2, 'HANSSENTUNE Racing Store'),
(3, 'LZONE PERFORMANCE Store'),
(4, 'HUBsport DE Store'),
(5, 'Performance Tuning Parts Store'),
(6, 'Car Top ACE Store'),
(7, 'REPLAITZ Store'),
(8, 'EPMAN Racing Store'),
(9, 'PQY RACING Store'),
(10, 'banwinoto Official Store'),
(11, 'Minespeed Store'),
(12, 'TOSPORT RACING Store'),
(13, 'WLR racing Store'),
(14, 'WarmHome Store'),
(15, 'MaxPeedingRods - official from webpage'),
(16, 'TeamOne Store'),
(17, 'CoCo Car Parts'),
(18, 'Awesome for you store');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wskazniki`
--

CREATE TABLE `wskazniki` (
  `ID` int(11) NOT NULL,
  `Item_ID` int(11) NOT NULL,
  `Buy_date` date NOT NULL,
  `Sell_date` date DEFAULT NULL,
  `Buy_price` float NOT NULL,
  `Cash_on_delivery` float DEFAULT NULL,
  `If_cash_on_delivery` tinyint(1) DEFAULT NULL,
  `Sell_price` float DEFAULT NULL,
  `seller_ID` int(11) NOT NULL,
  `delivered_to_Poland` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wskazniki`
--

INSERT INTO `wskazniki` (`ID`, `Item_ID`, `Buy_date`, `Sell_date`, `Buy_price`, `Cash_on_delivery`, `If_cash_on_delivery`, `Sell_price`, `seller_ID`, `delivered_to_Poland`) VALUES
(2, 1, '2018-11-23', NULL, 59.715, NULL, NULL, NULL, 1, NULL),
(3, 1, '2018-11-23', NULL, 59.715, NULL, NULL, NULL, 1, NULL),
(4, 1, '2018-11-23', NULL, 59.715, NULL, NULL, NULL, 1, NULL),
(5, 1, '2018-11-23', NULL, 59.715, NULL, NULL, NULL, 1, NULL),
(6, 10, '2218-11-23', NULL, 41, NULL, NULL, NULL, 1, NULL),
(7, 4, '2218-11-25', NULL, 41, NULL, NULL, NULL, 1, NULL),
(7, 30, '2018-11-07', NULL, 27.8075, NULL, NULL, NULL, 5, NULL),
(7, 30, '2018-11-07', NULL, 27.8075, NULL, NULL, NULL, 5, NULL),
(7, 30, '2018-11-07', NULL, 27.8075, NULL, NULL, NULL, 5, NULL),
(7, 30, '2018-11-07', NULL, 27.8075, NULL, NULL, NULL, 5, NULL),
(7, 30, '2018-10-30', NULL, 29.0475, NULL, NULL, NULL, 5, 1),
(7, 30, '2018-10-30', NULL, 29.0475, NULL, NULL, NULL, 5, 1),
(7, 30, '2018-10-29', NULL, 28.8925, NULL, NULL, NULL, 5, 1),
(7, 30, '2018-10-29', NULL, 28.8925, NULL, NULL, NULL, 5, 1),
(7, 31, '2018-10-29', NULL, 28.8925, NULL, NULL, NULL, 5, 1),
(7, 33, '2018-09-21', NULL, 34.835, NULL, NULL, NULL, 5, 1),
(7, 33, '2018-09-21', NULL, 34.835, NULL, NULL, NULL, 5, 1),
(7, 33, '2018-09-21', NULL, 34.835, NULL, NULL, NULL, 5, 1),
(7, 33, '2018-09-21', NULL, 34.835, NULL, NULL, NULL, 5, 1),
(7, 52, '2018-09-26', NULL, 18.478, NULL, NULL, NULL, 13, 1),
(7, 52, '2018-09-26', NULL, 18.478, NULL, NULL, NULL, 13, 1),
(7, 52, '2018-09-26', NULL, 18.478, NULL, NULL, NULL, 13, 1),
(7, 52, '2018-09-26', NULL, 18.478, NULL, NULL, NULL, 13, 1),
(7, 52, '2018-09-26', NULL, 18.478, NULL, NULL, NULL, 13, 1),
(7, 50, '2018-10-18', NULL, 9.5775, NULL, NULL, NULL, 10, 1),
(7, 50, '2018-10-18', NULL, 9.5775, NULL, NULL, NULL, 10, 1),
(7, 50, '2018-10-18', NULL, 9.5775, NULL, NULL, NULL, 10, 1),
(7, 50, '2018-10-18', NULL, 9.5775, NULL, NULL, NULL, 10, 1),
(7, 51, '2018-10-18', NULL, 11.3525, NULL, NULL, NULL, 9, 1),
(7, 51, '2018-10-18', NULL, 11.3525, NULL, NULL, NULL, 9, 1),
(7, 51, '2018-10-18', NULL, 11.3525, NULL, NULL, NULL, 9, 1),
(7, 51, '2018-10-18', NULL, 11.3525, NULL, NULL, NULL, 9, 1),
(7, 99, '2018-03-16', NULL, 6, NULL, NULL, NULL, 18, 1),
(7, 99, '2018-03-16', NULL, 6, NULL, NULL, NULL, 18, 1),
(7, 99, '2018-03-16', NULL, 6, NULL, NULL, NULL, 18, 1),
(7, 98, '2018-04-19', NULL, 47.413, NULL, NULL, NULL, 17, 1),
(7, 100, '2018-08-05', NULL, 26, NULL, NULL, NULL, 1, 1),
(7, 100, '2018-08-05', NULL, 26, NULL, NULL, NULL, 1, 1),
(7, 5, '2018-08-05', NULL, 73.856, NULL, NULL, NULL, 1, 1),
(7, 5, '2018-08-05', NULL, 73.856, NULL, NULL, NULL, 1, 1),
(7, 5, '2018-08-05', NULL, 73.856, NULL, NULL, NULL, 1, 1),
(7, 6, '2018-08-06', NULL, 73.6, NULL, NULL, NULL, 1, 1),
(7, 90, '2018-08-22', NULL, 35.62, NULL, NULL, NULL, 1, 1),
(7, 90, '2018-08-22', NULL, 35.62, NULL, NULL, NULL, 1, 1),
(7, 90, '2018-08-22', NULL, 35.62, NULL, NULL, NULL, 1, 1),
(7, 110, '2018-08-28', NULL, 10.692, NULL, NULL, NULL, 4, 1),
(7, 110, '2018-08-28', NULL, 10.692, NULL, NULL, NULL, 4, 1),
(7, 110, '2018-08-28', NULL, 10.692, NULL, NULL, NULL, 4, 1),
(7, 110, '2018-08-28', NULL, 10.692, NULL, NULL, NULL, 4, 1),
(7, 110, '2018-08-28', NULL, 10.692, NULL, NULL, NULL, 4, 1),
(7, 21, '2018-08-31', NULL, 126.651, NULL, NULL, NULL, 2, 1),
(7, 80, '2018-09-10', NULL, 81.365, NULL, NULL, NULL, 6, 1),
(7, 4, '2018-09-25', NULL, 67.8725, NULL, NULL, NULL, 1, 1),
(7, 4, '2018-09-25', NULL, 67.8725, NULL, NULL, NULL, 1, 1),
(7, 109, '2018-09-26', NULL, 25.88, NULL, NULL, NULL, 12, 1),
(7, 109, '2018-09-26', NULL, 25.88, NULL, NULL, NULL, 12, 1),
(7, 109, '2018-09-26', NULL, 25.88, NULL, NULL, NULL, 12, 1),
(7, 109, '2018-09-26', NULL, 25.88, NULL, NULL, NULL, 12, 1),
(7, 109, '2018-09-26', NULL, 25.88, NULL, NULL, NULL, 12, 1),
(7, 70, '2018-09-27', NULL, 10.843, NULL, NULL, NULL, 11, 1),
(7, 70, '2018-09-27', NULL, 10.843, NULL, NULL, NULL, 11, 1),
(7, 3, '2018-10-03', NULL, 78.11, NULL, NULL, NULL, 1, 1),
(7, 3, '2018-10-03', NULL, 78.11, NULL, NULL, NULL, 1, 1),
(7, 3, '2018-10-03', NULL, 78.11, NULL, NULL, NULL, 1, 1),
(7, 12, '2018-10-03', NULL, 100.265, NULL, NULL, NULL, 8, 1),
(7, 12, '2018-10-03', NULL, 100.265, NULL, NULL, NULL, 8, 1),
(7, 1, '2018-10-08', NULL, 62.045, NULL, NULL, NULL, 1, 1),
(7, 60, '2018-10-08', NULL, 51.086, NULL, NULL, NULL, 3, 1),
(7, 20, '2018-10-10', NULL, 103, NULL, NULL, NULL, 2, 1),
(7, 20, '2018-10-16', NULL, 134.525, NULL, NULL, NULL, 2, 1),
(7, 20, '2018-10-16', NULL, 134.525, NULL, NULL, NULL, 2, 1),
(7, 80, '2018-10-23', NULL, 83.3225, NULL, NULL, NULL, 6, 1),
(7, 80, '2018-10-23', NULL, 83.3225, NULL, NULL, NULL, 6, 1),
(7, 80, '2018-10-23', NULL, 83.3225, NULL, NULL, NULL, 6, 1),
(7, 80, '2018-10-27', NULL, 83.3225, NULL, NULL, NULL, 6, 1),
(7, 80, '2018-10-27', NULL, 83.3225, NULL, NULL, NULL, 6, 1),
(7, 80, '2018-10-27', NULL, 83.3225, NULL, NULL, NULL, 6, 1),
(7, 80, '2018-10-27', NULL, 83.3225, NULL, NULL, NULL, 6, 1),
(7, 1, '2018-10-27', NULL, 85.2325, NULL, NULL, NULL, 1, 1),
(7, 23, '2018-10-30', NULL, 128.395, NULL, NULL, NULL, 2, NULL),
(7, 23, '2018-10-30', NULL, 128.395, NULL, NULL, NULL, 2, NULL),
(7, 2, '2018-10-30', NULL, 65.4925, NULL, NULL, NULL, 1, 1),
(7, 2, '2018-10-30', NULL, 65.4925, NULL, NULL, NULL, 1, 1),
(7, 2, '2018-10-30', NULL, 65.4925, NULL, NULL, NULL, 1, 1),
(7, 2, '2018-10-30', NULL, 65.4925, NULL, NULL, NULL, 1, 1),
(7, 101, '2018-11-07', NULL, 20.774, NULL, NULL, NULL, 4, NULL),
(7, 101, '2018-11-07', NULL, 20.774, NULL, NULL, NULL, 4, NULL),
(7, 101, '2018-11-07', NULL, 20.774, NULL, NULL, NULL, 4, NULL),
(7, 101, '2018-11-07', NULL, 20.774, NULL, NULL, NULL, 4, NULL),
(7, 101, '2018-11-07', NULL, 20.774, NULL, NULL, NULL, 4, NULL),
(7, 4, '2018-11-11', NULL, 66.6175, NULL, NULL, NULL, 1, NULL),
(7, 4, '2018-11-11', NULL, 66.6175, NULL, NULL, NULL, 1, NULL),
(7, 4, '2018-11-11', NULL, 66.6175, NULL, NULL, NULL, 1, NULL),
(7, 4, '2018-11-11', NULL, 66.6175, NULL, NULL, NULL, 1, NULL),
(7, 1, '2018-11-11', NULL, 59.7975, NULL, NULL, NULL, 1, NULL),
(7, 1, '2018-11-11', NULL, 59.7975, NULL, NULL, NULL, 1, NULL),
(7, 1, '2018-11-11', NULL, 59.7975, NULL, NULL, NULL, 1, NULL),
(7, 1, '2018-11-11', NULL, 59.7975, NULL, NULL, NULL, 1, NULL),
(7, 100, '2018-11-13', NULL, 22.405, NULL, NULL, NULL, 1, NULL),
(7, 100, '2018-11-13', NULL, 22.405, NULL, NULL, NULL, 1, NULL),
(7, 100, '2018-11-13', NULL, 22.405, NULL, NULL, NULL, 1, NULL),
(7, 100, '2018-11-13', NULL, 22.405, NULL, NULL, NULL, 1, NULL),
(7, 60, '2018-11-13', NULL, 52.383, NULL, NULL, NULL, 3, NULL),
(7, 60, '2018-11-13', NULL, 52.383, NULL, NULL, NULL, 3, NULL),
(7, 60, '2018-11-13', NULL, 52.383, NULL, NULL, NULL, 3, NULL),
(7, 22, '2018-11-13', NULL, 100.75, NULL, NULL, NULL, 2, NULL),
(7, 22, '2018-11-13', NULL, 100.75, NULL, NULL, NULL, 2, NULL),
(7, 1, '2018-11-14', NULL, 65.33, NULL, NULL, NULL, 1, NULL),
(7, 1, '2018-11-14', NULL, 65.33, NULL, NULL, NULL, 1, NULL),
(7, 1, '2018-11-14', NULL, 65.33, NULL, NULL, NULL, 1, NULL),
(7, 1, '2018-11-14', NULL, 65.33, NULL, NULL, NULL, 1, NULL),
(7, 10, '2018-11-15', NULL, 85.965, NULL, NULL, NULL, 1, NULL),
(7, 10, '2018-11-15', NULL, 85.965, NULL, NULL, NULL, 1, NULL),
(7, 13, '2018-11-15', NULL, 90.4, NULL, NULL, NULL, 1, NULL),
(7, 13, '2018-11-15', NULL, 90.4, NULL, NULL, NULL, 1, NULL),
(7, 102, '2018-10-26', NULL, 25.894, NULL, NULL, NULL, 14, 1),
(7, 102, '2018-10-26', NULL, 25.894, NULL, NULL, NULL, 14, 1),
(7, 102, '2018-10-26', NULL, 25.894, NULL, NULL, NULL, 14, 1),
(7, 102, '2018-10-26', NULL, 25.894, NULL, NULL, NULL, 14, 1),
(7, 11, '2018-11-27', NULL, 83.045, NULL, NULL, NULL, 8, NULL),
(7, 11, '2018-11-27', NULL, 83.045, NULL, NULL, NULL, 8, NULL),
(8, 4, '2218-11-21', NULL, 41, NULL, NULL, NULL, 1, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `wskazniki`
--
ALTER TABLE `wskazniki`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `item`
--
ALTER TABLE `item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `seller`
--
ALTER TABLE `seller`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `wskazniki`
--
ALTER TABLE `wskazniki`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
