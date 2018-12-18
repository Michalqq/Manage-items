-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Gru 2018, 09:28
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
(40, 'Camber arms BMW E36 E46 wahacze Maxpeedingrods 2szt'),
(50, 'Lotki male 4 szt.'),
(51, 'Lotki duze 6 szt.'),
(52, 'Lotki plaskie plastik 4 szt.'),
(60, 'Blow Off 1.8t'),
(61, 'Adaptery skretu BMW E36 black'),
(62, 'Regulator sily hamowania korektor'),
(70, 'Obudowa plaska potrojna 3x52mm'),
(71, 'Obudowa na slupek potrojna 3x52mm'),
(80, 'MP3 AUX USB Adapter 8PIN'),
(90, 'Podstawka pod filtr oleju'),
(98, 'Dystans 5mm'),
(99, 'Daszek maly 52mm'),
(100, 'OilPressure sensor czujnik'),
(101, 'Boost sensor czujnik map'),
(102, 'EGT sensor czujnik termopara'),
(109, 'Trojnik M12x1.5 x 1/8NPT'),
(110, 'Adapter do turbo wezyk Quick tap');

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
(0, 'Test'),
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
(18, 'Awesome for you store'),
(19, 'Kris Store');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wskazniki`
--

CREATE TABLE `wskazniki` (
  `ID` int(11) NOT NULL,
  `Item_ID` int(11) NOT NULL,
  `Buy_date` date NOT NULL,
  `Sell_date` date DEFAULT NULL,
  `Buy_price` decimal(10,2) NOT NULL,
  `Cash_on_delivery` decimal(10,2) DEFAULT NULL,
  `If_cash_on_delivery` tinyint(1) DEFAULT NULL,
  `Sell_price` decimal(10,2) DEFAULT NULL,
  `seller_ID` int(11) NOT NULL,
  `delivered_to_Poland` int(11) DEFAULT NULL,
  `Last_action_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wskazniki`
--

INSERT INTO `wskazniki` (`ID`, `Item_ID`, `Buy_date`, `Sell_date`, `Buy_price`, `Cash_on_delivery`, `If_cash_on_delivery`, `Sell_price`, `seller_ID`, `delivered_to_Poland`, `Last_action_date`) VALUES
(1, 30, '2018-11-07', NULL, '27.81', NULL, NULL, NULL, 5, NULL, NULL),
(2, 1, '2018-11-23', NULL, '59.72', NULL, NULL, NULL, 1, NULL, NULL),
(3, 1, '2018-11-23', NULL, '59.72', NULL, NULL, NULL, 1, NULL, NULL),
(4, 1, '2018-11-23', NULL, '59.72', NULL, NULL, NULL, 1, NULL, NULL),
(5, 1, '2018-11-23', NULL, '59.72', NULL, NULL, NULL, 1, NULL, NULL),
(6, 10, '2218-11-23', NULL, '41.00', NULL, NULL, NULL, 1, NULL, NULL),
(7, 4, '2218-11-25', NULL, '41.00', NULL, NULL, NULL, 1, NULL, NULL),
(8, 30, '2018-11-07', NULL, '27.81', NULL, NULL, NULL, 5, NULL, NULL),
(9, 30, '2018-11-07', NULL, '27.81', NULL, NULL, NULL, 5, NULL, NULL),
(10, 30, '2018-11-07', NULL, '27.81', NULL, NULL, NULL, 5, NULL, NULL),
(11, 30, '2018-10-30', '2018-12-17', '29.05', '85.00', 1, '61.64', 5, 2, '2018-12-17 13:16:12'),
(12, 30, '2018-10-30', NULL, '29.05', NULL, NULL, NULL, 5, 1, NULL),
(13, 30, '2018-10-29', NULL, '28.89', NULL, NULL, NULL, 5, 1, NULL),
(14, 30, '2018-10-29', NULL, '28.89', NULL, NULL, NULL, 5, 1, NULL),
(15, 31, '2018-10-29', NULL, '28.89', NULL, NULL, NULL, 5, 1, NULL),
(16, 33, '2018-09-21', NULL, '34.83', NULL, NULL, NULL, 5, 1, NULL),
(17, 33, '2018-09-21', NULL, '34.83', NULL, NULL, NULL, 5, 1, NULL),
(18, 33, '2018-09-21', NULL, '34.83', NULL, NULL, NULL, 5, 1, NULL),
(19, 33, '2018-09-21', NULL, '34.83', NULL, NULL, NULL, 5, 1, NULL),
(20, 52, '2018-09-26', NULL, '18.48', NULL, NULL, NULL, 13, 1, NULL),
(21, 52, '2018-09-26', NULL, '18.48', NULL, NULL, NULL, 13, 1, NULL),
(22, 52, '2018-09-26', NULL, '18.48', NULL, NULL, NULL, 13, 1, NULL),
(23, 52, '2018-09-26', NULL, '18.48', NULL, NULL, NULL, 13, 1, NULL),
(24, 52, '2018-09-26', NULL, '18.48', NULL, NULL, NULL, 13, 1, NULL),
(25, 50, '2018-10-18', NULL, '9.58', NULL, NULL, NULL, 10, 1, NULL),
(26, 50, '2018-10-18', NULL, '9.58', NULL, NULL, NULL, 10, 1, NULL),
(27, 50, '2018-10-18', NULL, '9.58', NULL, NULL, NULL, 10, 1, NULL),
(28, 50, '2018-10-18', NULL, '9.58', NULL, NULL, NULL, 10, 1, NULL),
(29, 51, '2018-10-18', '2018-12-13', '11.35', NULL, NULL, '45.08', 9, 3, '2018-12-13 11:17:33'),
(30, 51, '2018-10-18', NULL, '11.35', NULL, NULL, NULL, 9, 1, NULL),
(31, 51, '2018-10-18', NULL, '11.35', NULL, NULL, NULL, 9, 1, NULL),
(32, 51, '2018-10-18', NULL, '11.35', NULL, NULL, NULL, 9, 1, NULL),
(36, 98, '2018-04-19', NULL, '47.41', NULL, NULL, NULL, 17, 1, NULL),
(37, 100, '2018-08-05', '2018-11-28', '26.00', NULL, NULL, '51.52', 1, 1, NULL),
(38, 100, '2018-08-05', NULL, '26.00', NULL, NULL, NULL, 1, 1, NULL),
(39, 5, '2018-08-05', '2018-12-17', '73.86', '213.00', 1, '87.40', 1, 2, '2018-12-17 13:14:26'),
(40, 5, '2018-08-05', '2018-12-17', '73.86', '213.00', 1, '88.40', 1, 2, '2018-12-17 13:14:47'),
(41, 5, '2018-08-05', NULL, '73.86', NULL, NULL, NULL, 1, 1, NULL),
(42, 6, '2018-08-06', NULL, '73.60', NULL, NULL, NULL, 1, 1, NULL),
(43, 90, '2018-08-22', '2018-12-13', '35.62', NULL, NULL, '55.93', 1, 3, '2018-12-13 11:18:16'),
(44, 90, '2018-08-22', '2018-12-13', '35.62', NULL, NULL, '55.93', 1, 3, '2018-12-13 11:18:27'),
(45, 90, '2018-08-22', NULL, '35.62', NULL, NULL, NULL, 1, 1, NULL),
(46, 110, '2018-08-28', NULL, '10.69', NULL, NULL, NULL, 4, 1, NULL),
(47, 110, '2018-08-28', NULL, '10.69', NULL, NULL, NULL, 4, 1, NULL),
(48, 110, '2018-08-28', NULL, '10.69', NULL, NULL, NULL, 4, 1, NULL),
(49, 110, '2018-08-28', NULL, '10.69', NULL, NULL, NULL, 4, 1, NULL),
(50, 110, '2018-08-28', NULL, '10.69', NULL, NULL, NULL, 4, 1, NULL),
(51, 21, '2018-08-31', '2018-12-10', '126.65', '678.00', 1, '183.99', 2, 3, '2018-12-18 08:22:09'),
(52, 80, '2018-09-10', '2018-11-29', '81.36', NULL, NULL, '150.40', 6, 3, '2018-12-03 00:09:10'),
(53, 4, '2018-09-25', NULL, '67.87', NULL, NULL, NULL, 1, 1, NULL),
(54, 4, '2018-09-25', NULL, '67.87', NULL, NULL, NULL, 1, 1, NULL),
(55, 109, '2018-09-26', '2018-12-10', '25.88', '678.00', 1, '31.28', 12, 3, '2018-12-18 08:22:30'),
(56, 109, '2018-09-26', '2018-12-11', '25.88', NULL, NULL, '38.50', 12, 3, '2018-12-11 13:42:42'),
(57, 109, '2018-09-26', '2018-12-11', '25.88', NULL, NULL, '38.50', 12, 3, '2018-12-11 13:42:46'),
(58, 109, '2018-09-26', '2018-12-13', '25.88', NULL, NULL, '31.28', 12, 3, '2018-12-13 11:16:29'),
(59, 109, '2018-09-26', NULL, '25.88', NULL, NULL, NULL, 12, 1, NULL),
(60, 70, '2018-09-27', '2018-11-28', '10.84', NULL, NULL, '27.60', 11, 1, NULL),
(61, 70, '2018-09-27', NULL, '10.84', NULL, NULL, NULL, 11, 1, NULL),
(62, 3, '2018-10-03', '2018-12-05', '78.11', NULL, NULL, '101.78', 1, 3, '2018-12-05 08:50:04'),
(63, 3, '2018-10-03', NULL, '78.11', NULL, NULL, NULL, 1, 1, NULL),
(64, 3, '2018-10-03', NULL, '78.11', NULL, NULL, NULL, 1, 1, NULL),
(65, 12, '2018-10-03', NULL, '100.26', NULL, NULL, NULL, 8, 1, NULL),
(66, 12, '2018-10-03', NULL, '100.26', NULL, NULL, NULL, 8, 1, NULL),
(67, 1, '2018-10-08', '2018-12-05', '62.04', NULL, NULL, '127.98', 1, 3, '2018-12-05 08:49:28'),
(68, 60, '2018-10-08', '2018-11-28', '51.09', NULL, NULL, '110.40', 3, 1, NULL),
(69, 20, '2018-10-10', '2018-12-03', '103.00', NULL, NULL, '172.70', 2, 3, '2018-12-03 09:14:21'),
(70, 20, '2018-10-16', '2018-12-10', '134.52', '678.00', 1, '183.99', 2, 3, '2018-12-18 08:22:50'),
(71, 20, '2018-10-16', '2018-12-17', '134.52', '213.00', 1, '183.99', 2, 2, '2018-12-17 13:15:35'),
(72, 80, '2018-10-23', '2018-12-03', '83.32', '178.00', 1, '150.40', 6, 3, '2018-12-13 11:13:25'),
(73, 80, '2018-10-23', '2018-12-07', '83.32', '168.00', 1, '150.00', 6, 3, '2018-12-18 08:33:58'),
(74, 80, '2018-10-23', '2018-12-10', '83.32', '168.00', 1, '150.00', 6, 2, '2018-12-10 08:38:20'),
(75, 80, '2018-10-27', '2018-12-10', '83.32', NULL, NULL, '150.40', 6, 3, '2018-12-10 08:38:49'),
(76, 80, '2018-10-27', '2018-12-13', '83.32', NULL, NULL, '150.40', 6, 3, '2018-12-13 11:17:07'),
(77, 80, '2018-10-27', '2018-12-17', '83.32', '183.00', 1, '155.10', 6, 2, '2018-12-17 13:11:59'),
(78, 80, '2018-10-27', '2018-12-17', '83.32', '178.00', 1, '150.40', 6, 2, '2018-12-17 13:12:57'),
(79, 1, '2018-10-27', '2018-12-05', '85.23', '160.00', 1, '139.00', 1, 3, '2018-12-18 09:02:17'),
(80, 23, '2018-10-30', '2018-12-10', '128.40', '678.00', 1, '202.39', 2, 3, '2018-12-18 08:22:55'),
(81, 23, '2018-10-30', NULL, '128.40', NULL, NULL, NULL, 2, 1, '2018-12-06 08:26:51'),
(82, 2, '2018-10-30', '2018-11-28', '65.49', NULL, NULL, '105.80', 1, 1, NULL),
(83, 2, '2018-10-30', '2018-12-05', '65.49', NULL, NULL, '0.00', 1, 3, '2018-12-05 08:33:42'),
(84, 2, '2018-10-30', NULL, '65.49', NULL, NULL, NULL, 1, 1, NULL),
(85, 2, '2018-10-30', NULL, '65.49', NULL, NULL, NULL, 1, 1, NULL),
(86, 101, '2018-11-07', '2018-11-29', '20.77', NULL, NULL, '64.40', 4, 1, '2018-11-29 00:00:00'),
(87, 101, '2018-11-07', '2018-12-05', '20.77', '88.00', 1, '64.40', 4, 3, '2018-12-13 11:13:07'),
(88, 101, '2018-11-07', '2018-12-17', '20.77', '88.00', 1, '64.40', 4, 2, '2018-12-17 13:11:06'),
(89, 101, '2018-11-07', NULL, '20.77', NULL, NULL, NULL, 4, 1, '2018-11-29 00:00:00'),
(90, 101, '2018-11-07', NULL, '20.77', NULL, NULL, NULL, 4, 1, '2018-11-29 00:00:00'),
(91, 4, '2018-11-11', NULL, '66.62', NULL, NULL, NULL, 1, NULL, NULL),
(92, 4, '2018-11-11', NULL, '66.62', NULL, NULL, NULL, 1, NULL, NULL),
(93, 4, '2018-11-11', NULL, '66.62', NULL, NULL, NULL, 1, NULL, NULL),
(94, 4, '2018-11-11', NULL, '66.62', NULL, NULL, NULL, 1, NULL, NULL),
(95, 1, '2018-11-11', NULL, '59.80', NULL, NULL, NULL, 1, NULL, NULL),
(96, 1, '2018-11-11', NULL, '59.80', NULL, NULL, NULL, 1, NULL, NULL),
(97, 1, '2018-11-11', NULL, '59.80', NULL, NULL, NULL, 1, NULL, NULL),
(98, 1, '2018-11-11', NULL, '59.80', NULL, NULL, NULL, 1, NULL, NULL),
(99, 100, '2018-11-13', NULL, '22.41', NULL, NULL, NULL, 1, NULL, NULL),
(100, 100, '2018-11-13', NULL, '22.41', NULL, NULL, NULL, 1, NULL, NULL),
(101, 100, '2018-11-13', NULL, '22.41', NULL, NULL, NULL, 1, NULL, NULL),
(102, 100, '2018-11-13', NULL, '22.41', NULL, NULL, NULL, 1, NULL, NULL),
(103, 60, '2018-11-13', NULL, '52.38', NULL, NULL, NULL, 3, NULL, NULL),
(104, 60, '2018-11-13', NULL, '52.38', NULL, NULL, NULL, 3, NULL, NULL),
(105, 60, '2018-11-13', NULL, '52.38', NULL, NULL, NULL, 3, NULL, NULL),
(106, 22, '2018-11-13', NULL, '100.75', NULL, NULL, NULL, 2, NULL, NULL),
(107, 22, '2018-11-13', NULL, '100.75', NULL, NULL, NULL, 2, NULL, NULL),
(108, 1, '2018-11-14', NULL, '65.33', NULL, NULL, NULL, 1, NULL, NULL),
(109, 1, '2018-11-14', NULL, '65.33', NULL, NULL, NULL, 1, NULL, NULL),
(110, 1, '2018-11-14', NULL, '65.33', NULL, NULL, NULL, 1, NULL, NULL),
(111, 1, '2018-11-14', NULL, '65.33', NULL, NULL, NULL, 1, NULL, NULL),
(112, 10, '2018-11-15', NULL, '85.96', NULL, NULL, NULL, 1, NULL, NULL),
(113, 10, '2018-11-15', NULL, '85.96', NULL, NULL, NULL, 1, NULL, NULL),
(114, 13, '2018-11-15', NULL, '90.40', NULL, NULL, NULL, 1, NULL, NULL),
(115, 13, '2018-11-15', NULL, '90.40', NULL, NULL, NULL, 1, NULL, NULL),
(116, 102, '2018-10-26', NULL, '25.89', NULL, NULL, NULL, 14, 1, NULL),
(117, 102, '2018-10-26', NULL, '25.89', NULL, NULL, NULL, 14, 1, NULL),
(118, 102, '2018-10-26', NULL, '25.89', NULL, NULL, NULL, 14, 1, NULL),
(119, 102, '2018-10-26', NULL, '25.89', NULL, NULL, NULL, 14, 1, NULL),
(120, 11, '2018-11-27', NULL, '83.04', NULL, NULL, NULL, 8, NULL, NULL),
(121, 11, '2018-11-27', NULL, '83.04', NULL, NULL, NULL, 8, NULL, NULL),
(122, 4, '2218-11-21', NULL, '41.00', NULL, NULL, NULL, 1, NULL, NULL),
(123, 60, '2018-11-29', NULL, '51.08', NULL, NULL, NULL, 3, NULL, '2018-11-29 00:00:00'),
(124, 60, '2018-11-29', NULL, '51.08', NULL, NULL, NULL, 3, NULL, '2018-11-29 00:00:00'),
(125, 60, '2018-11-29', NULL, '51.08', NULL, NULL, NULL, 3, NULL, '2018-11-29 00:00:00'),
(126, 60, '2018-11-29', NULL, '51.08', NULL, NULL, NULL, 3, NULL, '2018-11-29 00:00:00'),
(127, 98, '2018-11-29', NULL, '2.00', NULL, NULL, NULL, 1, NULL, '2018-11-29 00:00:00'),
(138, 80, '2018-12-03', NULL, '85.04', NULL, NULL, NULL, 6, NULL, '2018-12-03 09:20:14'),
(139, 80, '2018-12-03', NULL, '85.04', NULL, NULL, NULL, 6, NULL, '2018-12-03 09:20:14'),
(140, 80, '2018-12-03', NULL, '85.04', NULL, NULL, NULL, 6, NULL, '2018-12-03 09:20:14'),
(141, 80, '2018-12-03', NULL, '85.04', NULL, NULL, NULL, 6, NULL, '2018-12-03 09:20:14'),
(142, 70, '2018-12-03', NULL, '8.91', NULL, NULL, NULL, 11, NULL, '2018-12-03 09:28:48'),
(143, 70, '2018-12-03', NULL, '8.91', NULL, NULL, NULL, 11, NULL, '2018-12-03 09:28:48'),
(144, 70, '2018-12-03', NULL, '8.91', NULL, NULL, NULL, 11, NULL, '2018-12-03 09:28:48'),
(145, 70, '2018-12-03', NULL, '8.91', NULL, NULL, NULL, 11, NULL, '2018-12-03 09:28:48'),
(146, 70, '2018-12-03', NULL, '8.91', NULL, NULL, NULL, 11, NULL, '2018-12-03 09:28:48'),
(147, 61, '2018-12-05', NULL, '108.27', NULL, NULL, NULL, 9, NULL, '2018-12-05 14:01:47'),
(148, 61, '2018-12-05', NULL, '108.27', NULL, NULL, NULL, 9, NULL, '2018-12-05 14:01:47'),
(149, 101, '2018-12-05', NULL, '21.14', NULL, NULL, NULL, 4, NULL, '2018-12-05 14:26:52'),
(150, 101, '2018-12-05', NULL, '21.14', NULL, NULL, NULL, 4, NULL, '2018-12-05 14:26:52'),
(151, 101, '2018-12-05', NULL, '21.14', NULL, NULL, NULL, 4, NULL, '2018-12-05 14:26:52'),
(152, 101, '2018-12-05', NULL, '21.14', NULL, NULL, NULL, 4, NULL, '2018-12-05 14:26:52'),
(153, 101, '2018-12-05', NULL, '21.14', NULL, NULL, NULL, 4, NULL, '2018-12-05 14:26:52'),
(154, 62, '2018-12-05', NULL, '35.91', NULL, NULL, NULL, 8, NULL, '2018-12-05 15:17:31'),
(155, 62, '2018-12-05', NULL, '35.91', NULL, NULL, NULL, 8, NULL, '2018-12-05 15:17:31'),
(156, 62, '2018-12-05', NULL, '35.91', NULL, NULL, NULL, 8, NULL, '2018-12-05 15:17:31'),
(157, 62, '2018-12-05', NULL, '35.91', NULL, NULL, NULL, 8, NULL, '2018-12-05 15:17:31'),
(158, 40, '2018-12-10', '2018-12-10', '200.00', NULL, NULL, '269.08', 15, 3, '2018-12-10 08:43:29'),
(159, 21, '2018-12-10', NULL, '108.04', NULL, NULL, NULL, 2, NULL, '2018-12-10 13:41:08'),
(160, 23, '2018-12-10', NULL, '131.23', NULL, NULL, NULL, 2, NULL, '2018-12-10 13:41:19'),
(161, 20, '2018-12-10', NULL, '103.40', NULL, NULL, NULL, 2, NULL, '2018-12-10 13:41:30'),
(162, 20, '2018-12-10', NULL, '103.40', NULL, NULL, NULL, 2, NULL, '2018-12-10 13:41:30'),
(163, 40, '2018-12-11', '2018-12-11', '189.40', NULL, NULL, '269.08', 15, 3, '2018-12-11 13:49:20'),
(164, 40, '2018-12-11', '2018-12-11', '202.93', NULL, NULL, '269.08', 15, 3, '2018-12-11 13:49:33'),
(165, 80, '2018-12-13', NULL, '77.79', NULL, NULL, NULL, 19, NULL, '2018-12-13 11:15:16'),
(166, 80, '2018-12-13', NULL, '77.79', NULL, NULL, NULL, 19, NULL, '2018-12-13 11:15:16'),
(167, 80, '2018-12-13', NULL, '77.79', NULL, NULL, NULL, 19, NULL, '2018-12-13 11:15:16'),
(168, 80, '2018-12-13', NULL, '77.79', NULL, NULL, NULL, 19, NULL, '2018-12-13 11:15:16'),
(169, 80, '2018-12-13', NULL, '77.79', NULL, NULL, NULL, 19, NULL, '2018-12-13 11:15:16'),
(170, 90, '2018-12-13', NULL, '36.79', NULL, NULL, NULL, 1, NULL, '2018-12-13 11:26:02'),
(171, 90, '2018-12-13', NULL, '36.79', NULL, NULL, NULL, 1, NULL, '2018-12-13 11:26:02'),
(172, 90, '2018-12-13', NULL, '36.79', NULL, NULL, NULL, 1, NULL, '2018-12-13 11:26:02'),
(173, 2, '2018-12-13', NULL, '60.97', NULL, NULL, NULL, 8, NULL, '2018-12-13 14:41:08'),
(174, 2, '2018-12-13', NULL, '60.97', NULL, NULL, NULL, 8, NULL, '2018-12-13 14:41:08'),
(175, 2, '2018-12-13', NULL, '60.97', NULL, NULL, NULL, 8, NULL, '2018-12-13 14:41:08'),
(176, 2, '2018-12-13', NULL, '60.97', NULL, NULL, NULL, 8, NULL, '2018-12-13 14:41:08'),
(177, 3, '2018-12-13', NULL, '57.47', NULL, NULL, NULL, 8, NULL, '2018-12-13 14:41:19'),
(178, 3, '2018-12-13', NULL, '57.47', NULL, NULL, NULL, 8, NULL, '2018-12-13 14:41:19'),
(179, 3, '2018-12-13', NULL, '57.47', NULL, NULL, NULL, 8, NULL, '2018-12-13 14:41:19'),
(180, 3, '2018-12-13', NULL, '57.47', NULL, NULL, NULL, 8, NULL, '2018-12-13 14:41:19');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT dla tabeli `seller`
--
ALTER TABLE `seller`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `wskazniki`
--
ALTER TABLE `wskazniki`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
