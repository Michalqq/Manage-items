-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Lis 2018, 15:26
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
(1, 30, '2018-11-07', NULL, 27.8075, NULL, NULL, NULL, 5, NULL),
(2, 1, '2018-11-23', NULL, 59.715, NULL, NULL, NULL, 1, NULL),
(3, 1, '2018-11-23', NULL, 59.715, NULL, NULL, NULL, 1, NULL),
(4, 1, '2018-11-23', NULL, 59.715, NULL, NULL, NULL, 1, NULL),
(5, 1, '2018-11-23', NULL, 59.715, NULL, NULL, NULL, 1, NULL),
(6, 10, '2218-11-23', NULL, 41, NULL, NULL, NULL, 1, NULL),
(7, 4, '2218-11-25', NULL, 41, NULL, NULL, NULL, 1, NULL),
(8, 30, '2018-11-07', NULL, 27.8075, NULL, NULL, NULL, 5, NULL),
(9, 30, '2018-11-07', NULL, 27.8075, NULL, NULL, NULL, 5, NULL),
(10, 30, '2018-11-07', NULL, 27.8075, NULL, NULL, NULL, 5, NULL),
(11, 30, '2018-10-30', NULL, 29.0475, NULL, NULL, NULL, 5, 1),
(12, 30, '2018-10-30', NULL, 29.0475, NULL, NULL, NULL, 5, 1),
(13, 30, '2018-10-29', NULL, 28.8925, NULL, NULL, NULL, 5, 1),
(14, 30, '2018-10-29', NULL, 28.8925, NULL, NULL, NULL, 5, 1),
(15, 31, '2018-10-29', NULL, 28.8925, NULL, NULL, NULL, 5, 1),
(16, 33, '2018-09-21', NULL, 34.835, NULL, NULL, NULL, 5, 1),
(17, 33, '2018-09-21', NULL, 34.835, NULL, NULL, NULL, 5, 1),
(18, 33, '2018-09-21', NULL, 34.835, NULL, NULL, NULL, 5, 1),
(19, 33, '2018-09-21', NULL, 34.835, NULL, NULL, NULL, 5, 1),
(20, 52, '2018-09-26', NULL, 18.478, NULL, NULL, NULL, 13, 1),
(21, 52, '2018-09-26', NULL, 18.478, NULL, NULL, NULL, 13, 1),
(22, 52, '2018-09-26', NULL, 18.478, NULL, NULL, NULL, 13, 1),
(23, 52, '2018-09-26', NULL, 18.478, NULL, NULL, NULL, 13, 1),
(24, 52, '2018-09-26', NULL, 18.478, NULL, NULL, NULL, 13, 1),
(25, 50, '2018-10-18', NULL, 9.5775, NULL, NULL, NULL, 10, 1),
(26, 50, '2018-10-18', NULL, 9.5775, NULL, NULL, NULL, 10, 1),
(27, 50, '2018-10-18', NULL, 9.5775, NULL, NULL, NULL, 10, 1),
(28, 50, '2018-10-18', NULL, 9.5775, NULL, NULL, NULL, 10, 1),
(29, 51, '2018-10-18', NULL, 11.3525, NULL, NULL, NULL, 9, 1),
(30, 51, '2018-10-18', NULL, 11.3525, NULL, NULL, NULL, 9, 1),
(31, 51, '2018-10-18', NULL, 11.3525, NULL, NULL, NULL, 9, 1),
(32, 51, '2018-10-18', NULL, 11.3525, NULL, NULL, NULL, 9, 1),
(33, 99, '2018-03-16', NULL, 6, NULL, NULL, NULL, 18, 1),
(34, 99, '2018-03-16', NULL, 6, NULL, NULL, NULL, 18, 1),
(35, 99, '2018-03-16', NULL, 6, NULL, NULL, NULL, 18, 1),
(36, 98, '2018-04-19', NULL, 47.413, NULL, NULL, NULL, 17, 1),
(37, 100, '2018-08-05', '2018-11-28', 26, NULL, NULL, 51.52, 1, 1),
(38, 100, '2018-08-05', NULL, 26, NULL, NULL, NULL, 1, 1),
(39, 5, '2018-08-05', NULL, 73.856, NULL, NULL, NULL, 1, 1),
(40, 5, '2018-08-05', NULL, 73.856, NULL, NULL, NULL, 1, 1),
(41, 5, '2018-08-05', NULL, 73.856, NULL, NULL, NULL, 1, 1),
(42, 6, '2018-08-06', NULL, 73.6, NULL, NULL, NULL, 1, 1),
(43, 90, '2018-08-22', NULL, 35.62, NULL, NULL, NULL, 1, 1),
(44, 90, '2018-08-22', NULL, 35.62, NULL, NULL, NULL, 1, 1),
(45, 90, '2018-08-22', NULL, 35.62, NULL, NULL, NULL, 1, 1),
(46, 110, '2018-08-28', NULL, 10.692, NULL, NULL, NULL, 4, 1),
(47, 110, '2018-08-28', NULL, 10.692, NULL, NULL, NULL, 4, 1),
(48, 110, '2018-08-28', NULL, 10.692, NULL, NULL, NULL, 4, 1),
(49, 110, '2018-08-28', NULL, 10.692, NULL, NULL, NULL, 4, 1),
(50, 110, '2018-08-28', NULL, 10.692, NULL, NULL, NULL, 4, 1),
(51, 21, '2018-08-31', NULL, 126.651, NULL, NULL, NULL, 2, 1),
(52, 80, '2018-09-10', NULL, 81.365, NULL, NULL, NULL, 6, 1),
(53, 4, '2018-09-25', NULL, 67.8725, NULL, NULL, NULL, 1, 1),
(54, 4, '2018-09-25', NULL, 67.8725, NULL, NULL, NULL, 1, 1),
(55, 109, '2018-09-26', NULL, 25.88, NULL, NULL, NULL, 12, 1),
(56, 109, '2018-09-26', NULL, 25.88, NULL, NULL, NULL, 12, 1),
(57, 109, '2018-09-26', NULL, 25.88, NULL, NULL, NULL, 12, 1),
(58, 109, '2018-09-26', NULL, 25.88, NULL, NULL, NULL, 12, 1),
(59, 109, '2018-09-26', NULL, 25.88, NULL, NULL, NULL, 12, 1),
(60, 70, '2018-09-27', '2018-11-28', 10.843, NULL, NULL, 27.6, 11, 1),
(61, 70, '2018-09-27', NULL, 10.843, NULL, NULL, NULL, 11, 1),
(62, 3, '2018-10-03', NULL, 78.11, NULL, NULL, NULL, 1, 1),
(63, 3, '2018-10-03', NULL, 78.11, NULL, NULL, NULL, 1, 1),
(64, 3, '2018-10-03', NULL, 78.11, NULL, NULL, NULL, 1, 1),
(65, 12, '2018-10-03', NULL, 100.265, NULL, NULL, NULL, 8, 1),
(66, 12, '2018-10-03', NULL, 100.265, NULL, NULL, NULL, 8, 1),
(67, 1, '2018-10-08', NULL, 62.045, NULL, NULL, NULL, 1, 1),
(68, 60, '2018-10-08', '2018-11-28', 51.086, NULL, NULL, 110.4, 3, 1),
(69, 20, '2018-10-10', NULL, 103, NULL, NULL, NULL, 2, 1),
(70, 20, '2018-10-16', NULL, 134.525, NULL, NULL, NULL, 2, 1),
(71, 20, '2018-10-16', NULL, 134.525, NULL, NULL, NULL, 2, 1),
(72, 80, '2018-10-23', NULL, 83.3225, NULL, NULL, NULL, 6, 1),
(73, 80, '2018-10-23', NULL, 83.3225, NULL, NULL, NULL, 6, 1),
(74, 80, '2018-10-23', NULL, 83.3225, NULL, NULL, NULL, 6, 1),
(75, 80, '2018-10-27', NULL, 83.3225, NULL, NULL, NULL, 6, 1),
(76, 80, '2018-10-27', NULL, 83.3225, NULL, NULL, NULL, 6, 1),
(77, 80, '2018-10-27', NULL, 83.3225, NULL, NULL, NULL, 6, 1),
(78, 80, '2018-10-27', NULL, 83.3225, NULL, NULL, NULL, 6, 1),
(79, 1, '2018-10-27', NULL, 85.2325, NULL, NULL, NULL, 1, 1),
(80, 23, '2018-10-30', NULL, 128.395, NULL, NULL, NULL, 2, NULL),
(81, 23, '2018-10-30', NULL, 128.395, NULL, NULL, NULL, 2, NULL),
(82, 2, '2018-10-30', '2018-11-28', 65.4925, NULL, NULL, 105.8, 1, 1),
(83, 2, '2018-10-30', NULL, 65.4925, NULL, NULL, NULL, 1, 1),
(84, 2, '2018-10-30', NULL, 65.4925, NULL, NULL, NULL, 1, 1),
(85, 2, '2018-10-30', NULL, 65.4925, NULL, NULL, NULL, 1, 1),
(86, 101, '2018-11-07', NULL, 20.774, NULL, NULL, NULL, 4, NULL),
(87, 101, '2018-11-07', NULL, 20.774, NULL, NULL, NULL, 4, NULL),
(88, 101, '2018-11-07', NULL, 20.774, NULL, NULL, NULL, 4, NULL),
(89, 101, '2018-11-07', NULL, 20.774, NULL, NULL, NULL, 4, NULL),
(90, 101, '2018-11-07', NULL, 20.774, NULL, NULL, NULL, 4, NULL),
(91, 4, '2018-11-11', NULL, 66.6175, NULL, NULL, NULL, 1, NULL),
(92, 4, '2018-11-11', NULL, 66.6175, NULL, NULL, NULL, 1, NULL),
(93, 4, '2018-11-11', NULL, 66.6175, NULL, NULL, NULL, 1, NULL),
(94, 4, '2018-11-11', NULL, 66.6175, NULL, NULL, NULL, 1, NULL),
(95, 1, '2018-11-11', NULL, 59.7975, NULL, NULL, NULL, 1, NULL),
(96, 1, '2018-11-11', NULL, 59.7975, NULL, NULL, NULL, 1, NULL),
(97, 1, '2018-11-11', NULL, 59.7975, NULL, NULL, NULL, 1, NULL),
(98, 1, '2018-11-11', NULL, 59.7975, NULL, NULL, NULL, 1, NULL),
(99, 100, '2018-11-13', NULL, 22.405, NULL, NULL, NULL, 1, NULL),
(100, 100, '2018-11-13', NULL, 22.405, NULL, NULL, NULL, 1, NULL),
(101, 100, '2018-11-13', NULL, 22.405, NULL, NULL, NULL, 1, NULL),
(102, 100, '2018-11-13', NULL, 22.405, NULL, NULL, NULL, 1, NULL),
(103, 60, '2018-11-13', NULL, 52.383, NULL, NULL, NULL, 3, NULL),
(104, 60, '2018-11-13', NULL, 52.383, NULL, NULL, NULL, 3, NULL),
(105, 60, '2018-11-13', NULL, 52.383, NULL, NULL, NULL, 3, NULL),
(106, 22, '2018-11-13', NULL, 100.75, NULL, NULL, NULL, 2, NULL),
(107, 22, '2018-11-13', NULL, 100.75, NULL, NULL, NULL, 2, NULL),
(108, 1, '2018-11-14', NULL, 65.33, NULL, NULL, NULL, 1, NULL),
(109, 1, '2018-11-14', NULL, 65.33, NULL, NULL, NULL, 1, NULL),
(110, 1, '2018-11-14', NULL, 65.33, NULL, NULL, NULL, 1, NULL),
(111, 1, '2018-11-14', NULL, 65.33, NULL, NULL, NULL, 1, NULL),
(112, 10, '2018-11-15', NULL, 85.965, NULL, NULL, NULL, 1, NULL),
(113, 10, '2018-11-15', NULL, 85.965, NULL, NULL, NULL, 1, NULL),
(114, 13, '2018-11-15', NULL, 90.4, NULL, NULL, NULL, 1, NULL),
(115, 13, '2018-11-15', NULL, 90.4, NULL, NULL, NULL, 1, NULL),
(116, 102, '2018-10-26', NULL, 25.894, NULL, NULL, NULL, 14, 1),
(117, 102, '2018-10-26', NULL, 25.894, NULL, NULL, NULL, 14, 1),
(118, 102, '2018-10-26', NULL, 25.894, NULL, NULL, NULL, 14, 1),
(119, 102, '2018-10-26', NULL, 25.894, NULL, NULL, NULL, 14, 1),
(120, 11, '2018-11-27', NULL, 83.045, NULL, NULL, NULL, 8, NULL),
(121, 11, '2018-11-27', NULL, 83.045, NULL, NULL, NULL, 8, NULL),
(122, 4, '2218-11-21', NULL, 41, NULL, NULL, NULL, 1, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `wskazniki`
--
ALTER TABLE `wskazniki`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `wskazniki`
--
ALTER TABLE `wskazniki`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
