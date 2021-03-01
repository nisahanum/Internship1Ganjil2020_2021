-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2021 at 10:40 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c50_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dataset`
--

CREATE TABLE `tb_dataset` (
  `id_dataset` int(11) NOT NULL,
  `bulan` varchar(16) DEFAULT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `potensial` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dataset`
--

INSERT INTO `tb_dataset` (`id_dataset`, `bulan`, `id_perusahaan`, `id_jenis`, `jumlah`, `total`, `potensial`) VALUES
(1, 'januari', 7, 4, 37, 263000, 'tidak'),
(2, 'januari', 6, 3, 873, 108402501, 'potensial'),
(3, 'januari', 11, 4, 266, 3201001, 'potensial'),
(4, 'januari', 24, 1, 5, 95500, 'tidak'),
(5, 'januari', 22, 1, 2, 3131000, 'tidak'),
(6, 'januari', 8, 4, 1809, 13224500, 'potensial'),
(7, 'januari', 18, 4, 490, 5064500, 'potensial'),
(8, 'januari', 17, 4, 7168, 51412301, 'potensial'),
(9, 'januari', 27, 4, 846, 31064000, 'potensial'),
(10, 'januari', 3, 1, 13, 180500, 'tidak'),
(11, 'januari', 26, 1, 191, 6272603, 'tidak'),
(12, 'januari', 15, 1, 80, 9253600, 'potensial'),
(13, 'januari', 2, 2, 356, 410969000, 'potensial'),
(14, 'januari', 14, 1, 107, 1107500, 'potensial'),
(15, 'januari', 28, 4, 340, 2145000, 'potensial'),
(16, 'januari', 1, 4, 13, 1164100, 'tidak'),
(17, 'januari', 19, 4, 559, 4057000, 'potensial'),
(18, 'januari', 5, 4, 20, 373500, 'tidak'),
(19, 'januari', 7, 4, 37, 263000, 'tidak'),
(20, 'januari', 6, 3, 873, 108402501, 'potensial'),
(21, 'januari', 11, 4, 266, 3201001, 'potensial'),
(22, 'januari', 24, 1, 5, 95500, 'tidak'),
(23, 'januari', 22, 1, 2, 3131000, 'tidak'),
(24, 'januari', 8, 4, 1809, 13224500, 'potensial'),
(25, 'januari', 18, 4, 490, 5064500, 'potensial'),
(26, 'januari', 17, 4, 7168, 51412301, 'potensial'),
(27, 'januari', 27, 4, 846, 31064000, 'potensial'),
(28, 'januari', 3, 1, 13, 180500, 'tidak'),
(29, 'januari', 26, 1, 191, 6272603, 'tidak'),
(30, 'januari', 15, 1, 80, 9253600, 'potensial'),
(31, 'januari', 2, 2, 356, 410969000, 'potensial'),
(32, 'januari', 14, 1, 107, 1107500, 'potensial'),
(33, 'januari', 28, 4, 340, 2145000, 'potensial'),
(34, 'januari', 1, 4, 13, 1164100, 'tidak'),
(35, 'januari', 19, 4, 559, 4057000, 'potensial'),
(36, 'januari', 5, 4, 20, 373500, 'tidak'),
(37, 'februari', 7, 4, 16, 112000, 'tidak'),
(38, 'februari', 6, 3, 1352, 46271500, 'potensial'),
(39, 'februari', 11, 4, 187, 2158500, 'tidak'),
(40, 'februari', 24, 1, 1, 10000, 'tidak'),
(41, 'februari', 22, 1, 0, 0, 'tidak'),
(42, 'februari', 8, 4, 1023, 7891500, 'potensial'),
(43, 'februari', 18, 4, 930, 8170000, 'potensial'),
(44, 'februari', 17, 4, 9908, 70493001, 'potensial'),
(45, 'februari', 27, 1, 707, 25670000, 'potensial'),
(46, 'februari', 3, 4, 18, 508500, 'tidak'),
(47, 'februari', 26, 1, 101, 3364000, 'potensial'),
(48, 'februari', 15, 1, 89, 6174597, 'potensial'),
(49, 'februari', 2, 2, 341, 387082500, 'potensial'),
(50, 'februari', 14, 1, 82, 826500, 'tidak'),
(51, 'februari', 28, 4, 395, 2575000, 'potensial'),
(52, 'februari', 12, 2, 298, 21414755, 'potensial'),
(53, 'februari', 1, 4, 13, 1170000, 'tidak'),
(54, 'februari', 19, 4, 106, 771800, 'potensial'),
(55, 'februari', 5, 4, 4, 56500, 'tidak'),
(56, 'februari', 7, 4, 16, 112000, 'tidak'),
(57, 'februari', 6, 3, 1352, 46271500, 'potensial'),
(58, 'februari', 11, 4, 187, 2158500, 'tidak'),
(59, 'februari', 24, 1, 1, 10000, 'tidak'),
(60, 'februari', 22, 1, 0, 0, 'tidak'),
(61, 'februari', 8, 4, 1023, 7891500, 'potensial'),
(62, 'februari', 18, 4, 930, 8170000, 'potensial'),
(63, 'februari', 17, 4, 9908, 70493001, 'potensial'),
(64, 'februari', 27, 1, 707, 25670000, 'potensial'),
(65, 'februari', 3, 4, 18, 508500, 'tidak'),
(66, 'februari', 26, 1, 101, 3364000, 'potensial'),
(67, 'februari', 15, 1, 89, 6174597, 'potensial'),
(68, 'februari', 2, 2, 341, 387082500, 'potensial'),
(69, 'februari', 14, 1, 82, 826500, 'tidak'),
(70, 'februari', 28, 4, 395, 2575000, 'potensial'),
(71, 'februari', 12, 2, 298, 21414755, 'potensial'),
(72, 'februari', 1, 4, 13, 1170000, 'tidak'),
(73, 'februari', 19, 4, 106, 771800, 'potensial'),
(74, 'februari', 5, 4, 4, 56500, 'tidak'),
(75, 'maret', 7, 4, 242, 1694000, 'potensial'),
(76, 'maret', 6, 3, 4, 1127000, 'tidak'),
(77, 'maret', 11, 4, 346, 3749500, 'potensial'),
(78, 'maret', 24, 1, 3, 49000, 'tidak'),
(79, 'maret', 23, 2, 28, 56040057, 'potensial'),
(80, 'maret', 8, 4, 1238, 9278500, 'potensial'),
(81, 'maret', 18, 4, 805, 7170500, 'potensial'),
(82, 'maret', 17, 4, 4799, 34395000, 'potensial'),
(83, 'maret', 27, 4, 736, 28573000, 'potensial'),
(84, 'maret', 3, 1, 11, 183700, 'tidak'),
(85, 'maret', 26, 1, 184, 4740500, 'potensial'),
(86, 'maret', 15, 1, 307, 5827301, 'potensial'),
(87, 'maret', 2, 2, 425, 500404500, 'potensial'),
(88, 'maret', 21, 1, 46, 460000, 'tidak'),
(89, 'maret', 13, 1, 459, 42472996, 'potensial'),
(90, 'maret', 28, 4, 437, 2885000, 'potensial'),
(91, 'maret', 1, 4, 13, 1335000, 'tidak'),
(92, 'maret', 19, 4, 619, 4401500, 'potensial'),
(93, 'maret', 7, 4, 242, 1694000, 'potensial'),
(94, 'maret', 6, 3, 4, 1127000, 'tidak'),
(95, 'maret', 11, 4, 346, 3749500, 'potensial'),
(96, 'maret', 24, 1, 3, 49000, 'tidak'),
(97, 'maret', 23, 2, 28, 56040057, 'potensial'),
(98, 'maret', 8, 4, 1238, 9278500, 'potensial'),
(99, 'maret', 18, 4, 805, 7170500, 'potensial'),
(100, 'maret', 17, 4, 4799, 34395000, 'potensial'),
(101, 'maret', 27, 4, 736, 28573000, 'potensial'),
(102, 'maret', 3, 1, 11, 183700, 'tidak'),
(103, 'maret', 26, 1, 184, 4740500, 'potensial'),
(104, 'maret', 15, 1, 307, 5827301, 'potensial'),
(105, 'maret', 2, 2, 425, 500404500, 'potensial'),
(106, 'maret', 21, 1, 46, 460000, 'tidak'),
(107, 'maret', 13, 1, 459, 42472996, 'potensial'),
(108, 'maret', 28, 4, 437, 2885000, 'potensial'),
(109, 'maret', 1, 4, 13, 1335000, 'tidak'),
(110, 'maret', 19, 4, 619, 4401500, 'potensial'),
(111, 'maret', 5, 4, 2, 25500, 'tidak'),
(112, 'april', 7, 4, 194, 1367000, 'potensial'),
(113, 'april', 6, 3, 0, 0, 'tidak'),
(114, 'april', 11, 4, 259, 2895000, 'potensial'),
(115, 'april', 24, 1, 1, 15500, 'tidak'),
(116, 'april', 23, 2, 0, 0, 'tidak'),
(117, 'april', 8, 4, 5, 161200, 'tidak'),
(118, 'april', 18, 4, 431, 3603000, 'potensial'),
(119, 'april', 17, 4, 956, 6848500, 'potensial'),
(120, 'april', 27, 1, 79, 2914000, 'potensial'),
(121, 'april', 3, 1, 0, 0, 'tidak'),
(122, 'april', 26, 1, 50, 1856500, 'potensial'),
(123, 'april', 15, 1, 13, 1684400, 'potensial'),
(124, 'april', 2, 2, 136, 160388000, 'potensial'),
(125, 'april', 21, 1, 26, 260000, 'tidak'),
(126, 'april', 13, 1, 48, 3706495, 'potensial'),
(127, 'april', 28, 4, 227, 1461000, 'potensial'),
(128, 'april', 1, 4, 1, 15000, 'tidak'),
(129, 'april', 19, 4, 0, 0, 'tidak'),
(130, 'april', 5, 4, 0, 0, 'tidak'),
(131, 'april', 25, 1, 1, 18000, 'tidak'),
(132, 'maret', 5, 4, 2, 25500, 'tidak'),
(133, 'april', 7, 4, 194, 1367000, 'potensial'),
(134, 'april', 6, 3, 0, 0, 'tidak'),
(135, 'april', 11, 4, 259, 2895000, 'potensial'),
(136, 'april', 24, 1, 1, 15500, 'tidak'),
(137, 'april', 23, 2, 0, 0, 'tidak'),
(138, 'april', 8, 4, 5, 161200, 'tidak'),
(139, 'april', 18, 4, 431, 3603000, 'potensial'),
(140, 'april', 17, 4, 956, 6848500, 'potensial'),
(141, 'april', 27, 1, 79, 2914000, 'potensial'),
(142, 'april', 3, 1, 0, 0, 'tidak'),
(143, 'april', 26, 1, 50, 1856500, 'potensial'),
(144, 'april', 15, 1, 13, 1684400, 'potensial'),
(145, 'april', 2, 2, 136, 160388000, 'potensial'),
(146, 'april', 21, 1, 26, 260000, 'tidak'),
(147, 'april', 13, 1, 48, 3706495, 'potensial'),
(148, 'april', 28, 4, 227, 1461000, 'potensial'),
(149, 'april', 1, 4, 1, 15000, 'tidak'),
(150, 'april', 19, 4, 0, 0, 'tidak'),
(151, 'april', 5, 4, 0, 0, 'tidak'),
(152, 'april', 25, 1, 1, 18000, 'tidak'),
(153, 'mei', 7, 4, 299, 2135500, 'potensial'),
(154, 'mei', 6, 3, 1265, 45222503, 'potensial'),
(155, 'mei', 11, 4, 732, 8340000, 'potensial'),
(156, 'mei', 24, 1, 0, 0, 'tidak'),
(157, 'mei', 23, 2, 0, 0, 'tidak'),
(158, 'mei', 8, 4, 280, 252500, 'tidak'),
(159, 'mei', 18, 4, 3108, 24576001, 'potensial'),
(160, 'mei', 17, 4, 4340, 27827201, 'potensial'),
(161, 'mei', 27, 4, 339, 11759500, 'potensial'),
(162, 'mei', 3, 1, 0, 0, 'tidak'),
(163, 'mei', 26, 1, 67, 1250000, 'tidak'),
(164, 'mei', 15, 1, 19, 2345424, 'tidak'),
(165, 'mei', 2, 2, 228, 305222000, 'potensial'),
(166, 'mei', 14, 4, 64, 640000, 'tidak'),
(167, 'mei', 13, 1, 106, 7845581, 'potensial'),
(168, 'mei', 28, 4, 50, 322000, 'tidak'),
(169, 'mei', 1, 4, 3, 90000, 'tidak'),
(170, 'mei', 19, 4, 0, 0, 'tidak'),
(171, 'mei', 5, 4, 0, 0, 'tidak'),
(172, 'mei', 20, 2, 9, 1376800, 'tidak'),
(173, 'mei', 16, 4, 1421, 11784500, 'potensial'),
(174, 'mei', 7, 4, 299, 2135500, 'potensial'),
(175, 'mei', 6, 3, 1265, 45222503, 'potensial'),
(176, 'mei', 11, 4, 732, 8340000, 'potensial'),
(177, 'mei', 24, 1, 0, 0, 'tidak'),
(178, 'mei', 23, 2, 0, 0, 'tidak'),
(179, 'mei', 8, 4, 280, 252500, 'potensial'),
(180, 'mei', 18, 4, 3108, 24576001, 'potensial'),
(181, 'mei', 17, 4, 4340, 27827201, 'potensial'),
(182, 'mei', 27, 4, 339, 11759500, 'potensial'),
(183, 'mei', 3, 1, 0, 0, 'tidak'),
(184, 'mei', 26, 1, 67, 1250000, 'tidak'),
(185, 'mei', 15, 1, 19, 2345424, 'tidak'),
(186, 'mei', 2, 2, 228, 305222000, 'potensial'),
(187, 'mei', 14, 4, 64, 640000, 'tidak'),
(188, 'mei', 13, 1, 106, 7845581, 'tidak'),
(189, 'mei', 28, 4, 50, 322000, 'tidak'),
(190, 'mei', 1, 4, 3, 90000, 'tidak'),
(191, 'mei', 19, 4, 0, 0, 'potensial'),
(192, 'mei', 5, 4, 0, 0, 'tidak'),
(193, 'mei', 20, 2, 9, 1376800, 'tidak'),
(194, 'mei', 16, 4, 1421, 11784500, 'tidak'),
(195, 'juni', 7, 4, 1222, 9032500, 'potensial'),
(196, 'juni', 6, 3, 123, 3968500, 'potensial'),
(197, 'juni', 11, 4, 256, 2839000, 'potensial'),
(198, 'juni', 24, 1, 2, 25500, 'tidak'),
(199, 'juni', 23, 2, 0, 0, 'tidak'),
(200, 'juni', 8, 4, 990, 7214001, 'potensial'),
(201, 'juni', 18, 4, 5028, 32288002, 'potensial'),
(202, 'juni', 17, 4, 19343, 143217001, 'potensial'),
(203, 'juni', 27, 4, 451, 12747000, 'potensial'),
(204, 'juni', 3, 1, 3, 30000, 'tidak'),
(205, 'juni', 26, 1, 104, 2621000, 'potensial'),
(206, 'juni', 15, 1, 36, 4219015, 'tidak'),
(207, 'juni', 2, 2, 285, 357691500, 'potensial'),
(208, 'juni', 21, 4, 85, 855500, 'tidak'),
(209, 'juni', 13, 1, 0, 0, 'tidak'),
(210, 'juni', 28, 4, 0, 0, 'tidak'),
(211, 'juni', 1, 4, 7, 510000, 'tidak'),
(212, 'juni', 10, 4, 15802, 145852460, 'tidak'),
(213, 'juni', 5, 4, 0, 0, 'tidak'),
(214, 'juni', 20, 2, 18, 2945404, 'tidak'),
(215, 'juni', 16, 4, 0, 0, 'potensial'),
(216, 'juni', 7, 4, 1222, 9032500, 'potensial'),
(217, 'juni', 6, 3, 123, 3968500, 'potensial'),
(218, 'juni', 11, 4, 256, 2839000, 'potensial'),
(219, 'juni', 24, 1, 2, 25500, 'tidak'),
(220, 'juni', 23, 2, 0, 0, 'tidak'),
(221, 'juni', 8, 4, 990, 7214001, 'potensial'),
(222, 'juni', 18, 4, 5028, 32288002, 'potensial'),
(223, 'juni', 17, 4, 19343, 143217001, 'potensial'),
(224, 'juni', 27, 4, 451, 12747000, 'potensial'),
(225, 'juni', 3, 1, 3, 30000, 'tidak'),
(226, 'juni', 26, 1, 104, 2621000, 'potensial'),
(227, 'juni', 15, 1, 36, 4219015, 'tidak'),
(228, 'juni', 2, 2, 285, 357691500, 'potensial'),
(229, 'juni', 21, 4, 85, 855500, 'tidak'),
(230, 'juni', 13, 1, 0, 0, 'tidak'),
(231, 'juni', 28, 4, 0, 0, 'tidak'),
(232, 'juni', 1, 4, 7, 510000, 'tidak'),
(233, 'juni', 10, 4, 15802, 145852460, 'tidak'),
(234, 'juni', 5, 4, 0, 0, 'tidak'),
(235, 'juni', 20, 2, 18, 2945404, 'tidak'),
(236, 'juni', 16, 4, 0, 0, 'potensial'),
(237, 'juli', 7, 4, 626, 4397000, 'potensial'),
(238, 'juli', 6, 3, 1063, 28928500, 'potensial'),
(239, 'juli', 11, 4, 226, 3115024, 'potensial'),
(240, 'juli', 24, 1, 5, 98500, 'tidak'),
(241, 'juli', 23, 2, 0, 0, 'tidak'),
(242, 'juli', 8, 4, 636, 4774000, 'tidak'),
(243, 'juli', 18, 4, 10960, 58004500, 'potensial'),
(244, 'juli', 17, 4, 16227, 115412503, 'potensial'),
(245, 'juli', 27, 4, 468, 12438700, 'potensial'),
(246, 'juli', 3, 1, 1, 15500, 'tidak'),
(247, 'juli', 26, 1, 101, 2419500, 'potensial'),
(248, 'juli', 15, 1, 31, 3537699, 'potensial'),
(249, 'juli', 2, 2, 325, 415857500, 'potensial'),
(250, 'juli', 21, 4, 72, 720000, 'tidak'),
(251, 'juli', 13, 1, 0, 0, 'tidak'),
(252, 'juli', 28, 4, 0, 0, 'tidak'),
(253, 'juli', 1, 4, 1, 15000, 'tidak'),
(254, 'juli', 10, 4, 31, 286130, 'tidak'),
(255, 'juli', 5, 4, 0, 0, 'potensial'),
(256, 'juli', 20, 2, 12, 2681303, 'tidak'),
(257, 'juli', 9, 4, 2099, 12594000, 'tidak'),
(258, 'juli', 7, 4, 626, 4397000, 'potensial'),
(259, 'juli', 6, 3, 1063, 28928500, 'potensial'),
(260, 'juli', 11, 4, 226, 3115024, 'tidak'),
(261, 'juli', 24, 1, 5, 98500, 'tidak'),
(262, 'juli', 23, 2, 0, 0, 'tidak'),
(263, 'juli', 8, 4, 636, 4774000, 'tidak'),
(264, 'juli', 18, 4, 10960, 58004500, 'potensial'),
(265, 'juli', 17, 4, 16227, 115412503, 'potensial'),
(266, 'juli', 27, 4, 468, 12438700, 'potensial'),
(267, 'juli', 3, 1, 1, 15500, 'tidak'),
(268, 'juli', 26, 1, 101, 2419500, 'tidak'),
(269, 'juli', 15, 1, 31, 3537699, 'tidak'),
(270, 'juli', 2, 2, 325, 415857500, 'potensial'),
(271, 'juli', 21, 4, 72, 720000, 'tidak'),
(272, 'juli', 13, 1, 0, 0, 'tidak'),
(273, 'juli', 28, 4, 0, 0, 'tidak'),
(274, 'juli', 1, 4, 1, 15000, 'tidak'),
(275, 'juli', 10, 4, 31, 286130, 'tidak'),
(276, 'juli', 5, 4, 0, 0, 'tidak'),
(277, 'juli', 20, 2, 12, 2681303, 'tidak'),
(278, 'juli', 9, 4, 2099, 12594000, 'tidak'),
(279, 'agustus', 7, 4, 832, 5161000, 'potensial'),
(280, 'agustus', 6, 3, 480, 7483500, 'potensial'),
(281, 'agustus', 11, 4, 165, 1697500, 'potensial'),
(282, 'agustus', 24, 1, 14, 140000, 'tidak'),
(283, 'agustus', 23, 2, 0, 0, 'tidak'),
(284, 'agustus', 8, 4, 496, 3578500, 'tidak'),
(285, 'agustus', 18, 4, 6400, 32425000, 'potensial'),
(286, 'agustus', 17, 4, 12113, 86348501, 'potensial'),
(287, 'agustus', 27, 4, 426, 18580499, 'potensial'),
(288, 'agustus', 3, 1, 4, 51000, 'tidak'),
(289, 'agustus', 26, 1, 155, 4581500, 'tidak'),
(290, 'agustus', 15, 1, 12, 1702997, 'tidak'),
(291, 'agustus', 2, 2, 370, 470054000, 'potensial'),
(292, 'agustus', 21, 1, 263, 351000, 'tidak'),
(293, 'agustus', 13, 1, 0, 0, 'potensial'),
(294, 'agustus', 28, 4, 78, 490000, 'tidak'),
(295, 'agustus', 1, 4, 3, 75000, 'tidak'),
(296, 'agustus', 10, 4, 0, 0, 'tidak'),
(297, 'agustus', 4, 4, 266, 1729500, 'tidak'),
(298, 'agustus', 20, 2, 22, 369800, 'tidak'),
(299, 'agustus', 9, 4, 2359, 14154000, 'potensial'),
(300, 'agustus', 7, 4, 832, 5161000, 'potensial'),
(301, 'agustus', 6, 3, 480, 7483500, 'potensial'),
(302, 'agustus', 11, 4, 165, 1697500, 'potensial'),
(303, 'agustus', 24, 1, 14, 140000, 'tidak'),
(304, 'agustus', 23, 2, 0, 0, 'tidak'),
(305, 'agustus', 8, 4, 496, 3578500, 'potensial'),
(306, 'agustus', 18, 4, 6400, 32425000, 'potensial'),
(307, 'agustus', 17, 4, 12113, 86348501, 'potensial'),
(308, 'agustus', 27, 4, 426, 18580499, 'potensial'),
(309, 'agustus', 3, 1, 4, 51000, 'tidak'),
(310, 'agustus', 26, 1, 155, 4581500, 'tidak'),
(311, 'agustus', 15, 1, 12, 1702997, 'tidak'),
(312, 'agustus', 2, 2, 370, 470054000, 'potensial'),
(313, 'agustus', 21, 1, 263, 351000, 'tidak'),
(314, 'agustus', 13, 1, 0, 0, 'tidak'),
(315, 'agustus', 28, 4, 78, 490000, 'tidak'),
(316, 'agustus', 1, 4, 3, 75000, 'tidak'),
(317, 'agustus', 10, 4, 0, 0, 'potensial'),
(318, 'agustus', 4, 4, 266, 1729500, 'tidak'),
(319, 'agustus', 20, 2, 22, 369800, 'tidak'),
(320, 'agustus', 9, 4, 2359, 14154000, 'tidak'),
(321, 'september', 7, 4, 1434, 9351000, 'potensial'),
(322, 'september', 6, 3, 793, 57115000, 'potensial'),
(323, 'september', 11, 4, 308, 3638000, 'potensial'),
(324, 'september', 24, 1, 0, 0, 'tidak'),
(325, 'september', 23, 2, 0, 0, 'tidak'),
(326, 'september', 8, 4, 46, 529500, 'potensial'),
(327, 'september', 18, 4, 7627, 39022500, 'potensial'),
(328, 'september', 17, 4, 24553, 173008003, 'potensial'),
(329, 'september', 27, 4, 609, 21156000, 'potensial'),
(330, 'september', 3, 1, 43, 1158000, 'tidak'),
(331, 'september', 26, 1, 194, 6783097, 'potensial'),
(332, 'september', 15, 1, 327, 10529301, 'tidak'),
(333, 'september', 2, 2, 460, 570650000, 'potensial'),
(334, 'september', 21, 4, 43, 452500, 'tidak'),
(335, 'september', 13, 1, 0, 0, 'tidak'),
(336, 'september', 28, 4, 86, 484000, 'tidak'),
(337, 'september', 1, 4, 3, 45000, 'tidak'),
(338, 'september', 10, 4, 0, 0, 'tidak'),
(339, 'september', 4, 4, 250, 16625500, 'tidak'),
(340, 'september', 20, 2, 4, 609700, 'tidak'),
(341, 'september', 9, 4, 0, 0, 'potensial'),
(342, 'september', 7, 4, 1434, 9351000, 'potensial'),
(343, 'september', 6, 3, 793, 57115000, 'potensial'),
(344, 'september', 11, 4, 308, 3638000, 'potensial'),
(345, 'september', 24, 1, 0, 0, 'tidak'),
(346, 'september', 23, 2, 0, 0, 'tidak'),
(347, 'september', 8, 4, 46, 529500, 'potensial'),
(348, 'september', 18, 4, 7627, 39022500, 'potensial'),
(349, 'september', 17, 4, 24553, 173008003, 'potensial'),
(350, 'september', 27, 4, 609, 21156000, 'potensial'),
(351, 'september', 3, 1, 43, 1158000, 'tidak'),
(352, 'september', 26, 1, 194, 6783097, 'potensial'),
(353, 'september', 15, 1, 327, 10529301, 'tidak'),
(354, 'september', 2, 2, 460, 570650000, 'potensial'),
(355, 'september', 21, 4, 43, 452500, 'tidak'),
(356, 'september', 13, 1, 0, 0, 'tidak'),
(357, 'september', 28, 4, 86, 484000, 'tidak'),
(358, 'september', 1, 4, 3, 45000, 'tidak'),
(359, 'september', 10, 4, 0, 0, 'tidak'),
(360, 'september', 4, 4, 250, 16625500, 'tidak'),
(361, 'september', 20, 2, 4, 609700, 'tidak'),
(362, 'september', 9, 4, 0, 0, 'potensial'),
(363, 'oktober', 7, 4, 896, 582000, 'potensial'),
(364, 'oktober', 6, 3, 1150, 51330000, 'potensial'),
(365, 'oktober', 11, 4, 225, 2328000, 'potensial'),
(366, 'oktober', 24, 1, 0, 0, 'tidak'),
(367, 'oktober', 23, 2, 0, 0, 'tidak'),
(368, 'oktober', 8, 4, 165, 1250500, 'tidak'),
(369, 'oktober', 18, 4, 5500, 26356500, 'potensial'),
(370, 'oktober', 17, 4, 11216, 72890500, 'potensial'),
(371, 'oktober', 27, 4, 404, 18125000, 'potensial'),
(372, 'oktober', 3, 1, 2, 58500, 'tidak'),
(373, 'oktober', 26, 1, 151, 5342000, 'potensial'),
(374, 'oktober', 15, 1, 142, 1996300, 'potensial'),
(375, 'oktober', 2, 2, 466, 608373500, 'potensial'),
(376, 'oktober', 21, 4, 39, 395500, 'tidak'),
(377, 'oktober', 13, 1, 0, 0, 'tidak'),
(378, 'oktober', 28, 4, 134, 846000, 'tidak'),
(379, 'oktober', 1, 4, 5, 225000, 'tidak'),
(380, 'oktober', 10, 4, 0, 0, 'tidak'),
(381, 'oktober', 4, 4, 74, 1247500, 'potensial'),
(382, 'oktober', 20, 2, 0, 0, 'tidak'),
(383, 'oktober', 9, 4, 0, 0, 'tidak'),
(384, 'oktober', 7, 4, 896, 582000, 'potensial'),
(385, 'oktober', 6, 3, 1150, 51330000, 'potensial'),
(386, 'oktober', 11, 4, 225, 2328000, 'tidak'),
(387, 'oktober', 24, 1, 0, 0, 'tidak'),
(388, 'oktober', 23, 2, 0, 0, 'tidak'),
(389, 'oktober', 8, 4, 165, 1250500, 'tidak'),
(390, 'oktober', 18, 4, 5500, 26356500, 'potensial'),
(391, 'oktober', 17, 4, 11216, 72890500, 'potensial'),
(392, 'oktober', 27, 4, 404, 18125000, 'potensial'),
(393, 'oktober', 3, 1, 2, 58500, 'tidak'),
(394, 'oktober', 26, 1, 151, 5342000, 'tidak'),
(395, 'oktober', 15, 1, 142, 1996300, 'tidak'),
(396, 'oktober', 2, 2, 466, 608373500, 'potensial'),
(397, 'oktober', 21, 4, 39, 395500, 'tidak'),
(398, 'oktober', 13, 1, 0, 0, 'tidak'),
(399, 'oktober', 28, 4, 134, 846000, 'tidak'),
(400, 'oktober', 1, 4, 5, 225000, 'tidak'),
(401, 'oktober', 10, 4, 0, 0, 'tidak'),
(402, 'oktober', 4, 4, 74, 1247500, 'tidak'),
(403, 'oktober', 20, 2, 0, 0, 'tidak'),
(404, 'oktober', 9, 4, 0, 0, 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_grafik`
--

CREATE TABLE `tb_grafik` (
  `potensial` varchar(16) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_grafik`
--

INSERT INTO `tb_grafik` (`potensial`, `total`) VALUES
('Tidak', 3),
('Potensial', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_dataset` int(11) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `bulan` varchar(16) DEFAULT NULL,
  `perusahaan` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `hasil` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_hasil`
--

INSERT INTO `tb_hasil` (`id_dataset`, `tahun`, `bulan`, `perusahaan`, `jenis`, `jumlah`, `total`, `hasil`) VALUES
(1, 2020, 'november', 'BLBI ABIYOSO', 'PPKH', 2, 100000, 'Tidak'),
(2, 2020, 'november', 'ATEJA TRITUNGGAL CORPORATION', 'LOGISTIK', 2, 21000000, 'Potensial'),
(3, 2020, 'november', 'SINAR CONTINENTAL', 'EXP CORPORATE', 2, 20000, 'Potensial'),
(4, 2020, 'november', 'BPJS KESEHATAN', 'SKH', 2, 14000, 'Potensial'),
(5, 2020, 'november', 'RSUD CIBABAT', 'EXP CORPORATE', 5, 44000, 'Potensial'),
(6, 2020, 'november', 'KPP PRATAMA SOREANG', 'SKH', 4, 28000, 'Potensial'),
(7, 2020, 'november', 'BPKAD', 'SKH', 2, 14000, 'Potensial'),
(8, 2020, 'november', 'KPP PRATAMA CIMAHI', 'SKH', 8, 56000, 'Potensial'),
(9, 2020, 'november', 'BALAI DIKLAT KEUANGAN', 'SKH', 1, 1250000, 'Tidak'),
(10, 2020, 'november', 'ADIRA DINAMIKA FINANCE', 'EXP CORPORATE', 4, 40000, 'Tidak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'EXP CORPORATE'),
(2, 'LOGISTIK'),
(3, 'PPKH'),
(4, 'SKH');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perusahaan`
--

CREATE TABLE `tb_perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `alamat_perusahaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_perusahaan`
--

INSERT INTO `tb_perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat_perusahaan`) VALUES
(1, 'ADIRA DINAMIKA FINANCE', 'Bandung'),
(2, 'ATEJA TRITUNGGAL CORPORATION', 'Batujajar'),
(3, 'BALAI DIKLAT KEUANGAN', 'Cimahi'),
(4, 'BAPENDA', 'Cimahi'),
(5, 'BJB', 'Cimahi'),
(6, 'BLBI ABIYOSO', 'Leuwi Gajah'),
(7, 'BPJS KESEHATAN', 'Cimahi'),
(8, 'BPJS KETENAGAKERJAAN', 'Cimahi'),
(9, 'BPJS KIS PBI', 'Cimahi'),
(10, 'BPKAD', 'Cimahi'),
(11, 'BPKP JABAR', 'Bandung'),
(12, 'BUNDA JAYA HERBAL', 'Cimahi'),
(13, 'COD BUNDA JAYA', 'Cimahi'),
(14, 'DINAS PERIJINAN BANDUNG BARAT', 'Ngamprah'),
(15, 'FAMILY ONLINE SHOP', 'Cimahi'),
(16, 'KELULUSAN 2020', 'Cimahi'),
(17, 'KPP PRATAMA CIMAHI', 'Cimahi'),
(18, 'KPP PRATAMA SOREANG', 'Soreang'),
(19, 'MEGA FINANCE', 'Cimahi'),
(20, 'PD ANANG', 'Cimahi'),
(21, 'PERIJINAN PEMKAB BANDUNG', 'Soreang'),
(22, 'PT ALFA OMEGA INDUSTRI', 'Cimahi'),
(23, 'PT ANUGRAH DWIJAYA LOG', 'Cimahi'),
(24, 'RSUD CIBABAT', 'Cimahi'),
(25, 'SEVENTMM', 'Cimahi'),
(26, 'SINAR CONTINENTAL', 'Cimahi'),
(27, 'ULTRAJAYA MILK INDUSTRY', 'Cimahi'),
(28, 'WOM FINANCE', 'Cimahi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `kode_petugas` varchar(16) NOT NULL,
  `nama_petugas` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `ket_petugas` varchar(255) DEFAULT NULL,
  `telpon` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`kode_petugas`, `nama_petugas`, `jabatan`, `ket_petugas`, `telpon`) VALUES
('P01', 'Aliansyah', 'Mandor Makam', 'Ditugaskan sebagai Mandor Makam ', '0822 5373 0431'),
('P02', 'Abdul Kadir', 'Pemelihara makam', 'Memelihara dan menjaga TPU Guntung', '0821 5135 3165'),
('P03', 'Alfian', 'Pemelihara makam', 'Memelihara dan menjaga TPU Nasrani', '085387025429'),
('P04', 'April Roni', 'Pemelihara makam', 'Memelihara dan menjaga TPU Nasrani', '081254480921'),
('P05', 'Asis', 'Pemelihara makam', 'Memelihara dan menjaga TPU Bontang Lestari ', '0853 4939 7823/0852 4720 6567'),
('P06', 'Usman', 'Pemelihara makam', 'Memelihara dan menjaga TPU Bontang Lestari ', '081348268869'),
('P07', 'Rahmat Albar', 'Pemelihara makam', 'Memelihara dan menjaga TPU Bontang Lestari ', '081347965336'),
('P08', 'Sawaluddin', 'Pemelihara makam', 'Memelihara dan menjaga TPU Kanaan', '085247885577'),
('P09', 'Anton Linggi Allo', 'Pemelihara makam', 'Memelihara dan menjaga TPU Kanaan', '081346147735'),
('P10', 'Yermia Matius Tilumbeng', 'Pemelihara makam', 'Memelihara dan menjaga TPU Kanaan', '0813 4719 9406'),
('P11', 'Bambang Irawan', 'Pemelihara makam', 'Memelihara dan menjaga TPU Lempake', '0821 5553 1353'),
('P12', 'Marto Bin Sarmijan', 'Pemelihara makam', 'Memelihara dan menjaga TPU Lempake', '085387089571'),
('P13', 'Misianto', 'Pemelihara makam', 'Memelihara dan menjaga TPU Satimpo', '0812 5465 6702'),
('P14', 'Tumiran', 'Pemelihara makam', 'Memelihara dan menjaga TPU Satimpo  menggantikan Alm. Lasimin', '0853 9068 7384'),
('P15', 'Misnan Subari', 'Pemelihara makam', 'Memelihara dan menjaga TPU Tanjung Laut', '081347419391'),
('P16', 'Rahmad Arifin', 'Pemelihara makam', 'Memelihara dan menjaga TPU Bontang Kuala', '0813 4646 1044'),
('P17', 'Agus Suriyanto', 'Pemelihara makam', 'Memelihara dan menjaga TPU Api-Api menggantikan Alm. Fattah', '0896 1397 2751');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `no_transaksi` varchar(16) NOT NULL,
  `id_user` int(255) DEFAULT NULL,
  `id_perusahaan` int(255) DEFAULT NULL,
  `id_jenis` int(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `berat` double DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `alamat_kirim` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`no_transaksi`, `id_user`, `id_perusahaan`, `id_jenis`, `tanggal`, `berat`, `harga`, `alamat_kirim`) VALUES
('TR000001', 1, 1, 1, '2020-11-10', 10, 10000, 'Cimahi'),
('TR000002', 1, 3, 4, '2020-11-10', 50, 1250000, 'Bandung'),
('TR000003', 1, 17, 4, '2020-11-09', 20, 7000, 'bandung'),
('TR000004', 1, 1, 1, '2020-11-02', 10, 10000, 'Cililin'),
('TR000005', 1, 1, 1, '2020-11-02', 10, 10000, 'Gatot Subroto'),
('TR000006', 1, 1, 1, '2020-11-02', 10, 10000, 'Batujajar'),
('TR000007', 1, 6, 3, '2020-11-03', 10000, 50000, 'Batujajar'),
('TR000008', 1, 6, 3, '2020-11-03', 10000, 50000, 'Cililin'),
('TR000009', 1, 2, 2, '2020-11-04', 20000, 14000000, 'Jakarta'),
('TR000010', 1, 2, 2, '2020-11-04', 10000, 7000000, 'Baros'),
('TR000011', 1, 24, 1, '2020-11-06', 10, 7000, 'Cililin'),
('TR000012', 1, 24, 1, '2020-11-05', 10, 7000, 'Baros'),
('TR000013', 1, 26, 1, '2020-11-06', 10, 10000, 'Cimahi'),
('TR000014', 1, 26, 1, '2020-11-06', 10, 10000, 'Baros'),
('TR000015', 1, 7, 4, '2020-11-06', 20, 7000, 'Cibabat'),
('TR000016', 1, 7, 4, '2020-11-06', 10, 7000, 'Kebon Kopi'),
('TR000017', 1, 17, 4, '2020-11-06', 20, 7000, 'Cililin'),
('TR000018', 1, 17, 4, '2020-11-06', 20, 7000, 'Baros'),
('TR000019', 1, 17, 4, '2020-11-06', 20, 7000, 'Cibabat'),
('TR000020', 1, 17, 4, '2020-11-06', 20, 7000, 'Bandung'),
('TR000021', 1, 17, 4, '2020-11-06', 20, 7000, 'Padalarang'),
('TR000022', 1, 17, 4, '2020-11-06', 20, 7000, 'Batujajar'),
('TR000023', 1, 18, 4, '2020-11-09', 20, 7000, 'Soreang'),
('TR000024', 1, 18, 4, '2020-11-09', 20, 7000, 'Kopo'),
('TR000025', 1, 17, 4, '2020-11-09', 20, 7000, 'Kopo'),
('TR000026', 1, 18, 4, '2020-11-09', 20, 7000, 'Bandung'),
('TR000027', 1, 18, 4, '2020-11-09', 20, 7000, 'Soreang'),
('TR000028', 1, 24, 1, '2020-11-09', 10, 10000, 'Cimahi'),
('TR000029', 1, 24, 1, '2020-11-09', 10, 10000, 'Cibabat'),
('TR000030', 1, 24, 1, '2020-11-09', 10, 10000, 'Bandung'),
('TR000031', 1, 10, 4, '2020-11-09', 20, 7000, 'Cimareme'),
('TR000032', 1, 10, 4, '2020-11-09', 20, 7000, 'Cimahi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `user` varchar(16) DEFAULT NULL,
  `pass` varchar(16) DEFAULT NULL,
  `level` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `user`, `pass`, `level`) VALUES
(1, 'Administrator', 'admin', 'admin', 'admin'),
(2, 'User', 'user', 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dataset`
--
ALTER TABLE `tb_dataset`
  ADD PRIMARY KEY (`id_dataset`);

--
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_dataset`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`kode_petugas`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dataset`
--
ALTER TABLE `tb_dataset`
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
