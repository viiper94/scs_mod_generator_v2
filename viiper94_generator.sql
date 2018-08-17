-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Сер 17 2018 р., 15:24
-- Версія сервера: 10.1.22-MariaDB
-- Версія PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `viiper94_generator`
--

-- --------------------------------------------------------

--
-- Структура таблиці `accessories`
--

CREATE TABLE `accessories` (
  `id` int(10) UNSIGNED NOT NULL,
  `def` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chassis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ets2',
  `dlc` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `accessories`
--

INSERT INTO `accessories` (`id`, `def`, `alias`, `chassis`, `game`, `dlc`, `created_at`, `updated_at`) VALUES
(1, '/def/vehicle/trailer/car_transporter/cargo_cars_it.sii', 'cargo_cars_it', 'car_transporter', 'ets2', '3', '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(2, '/def/vehicle/trailer/car_transporter/cargo_france_cars.dlc_fr.sii', 'cargo_france_cars', 'car_transporter', 'ets2', '2', '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(3, '/def/vehicle/trailer/car_transporter/cargo_volvo.dlc_north.sii', 'cargo_volvo', 'car_transporter', 'ets2', '1', '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(4, '/def/vehicle/trailer/car_transporter/cargo_octavia.sii', 'cargo_octavia', 'car_transporter', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(5, '/def/vehicle/trailer/car_transporter/cargo_octavia_2.sii', 'cargo_octavia_2', 'car_transporter', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(6, '/def/vehicle/trailer/car_transporter/cargo_octavia_3.sii', 'cargo_octavia_3', 'car_transporter', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(7, '/def/vehicle/trailer/cement_mixer/mixer.sii', 'mixer', 'cement_mixer', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(8, '/def/vehicle/trailer/flat_bed/empty_tank.sii', 'empty_tank', 'flat_bed', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(9, '/def/vehicle/trailer/flat_bed/hi_pressure_tank.sii', 'hi_pressure_tank', 'flat_bed', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(10, '/def/vehicle/trailer/flat_bed/marble_blocks.sii', 'marble_blocks', 'flat_bed', 'ets2', '3', '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(11, '/def/vehicle/trailer/flat_bed/marble_blocks_2.sii', 'marble_blocks_2', 'flat_bed', 'ets2', '3', '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(12, '/def/vehicle/trailer/flat_bed/marble_slabs.sii', 'marble_slabs', 'flat_bed', 'ets2', '3', '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(13, '/def/vehicle/trailer/flat_bed/metal_coil.sii', 'metal_coil', 'flat_bed', 'ets2', '3', '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(14, '/def/vehicle/trailer/flat_bed/metal_pipes.sii', 'metal_pipes', 'flat_bed', 'ets2', '3', '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(15, '/def/vehicle/trailer/flat_bed/over_cargo.sii', 'over_cargo', 'flat_bed', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(16, '/def/vehicle/trailer/flat_bed/square_tubing.sii', 'square_tubing', 'flat_bed', 'ets2', '3', '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(17, '/def/vehicle/trailer/flat_bed/tubes.sii', 'tubes', 'flat_bed', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(18, '/def/vehicle/trailer/flat_bed/ventilator.sii', 'ventilator', 'flat_bed', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(19, '/def/vehicle/trailer/gooseneck/cargo20.sii', 'cargo20', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(20, '/def/vehicle/trailer/gooseneck/cargo20b.sii', 'cargo20b', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(21, '/def/vehicle/trailer/gooseneck/cargo30.sii', 'cargo30', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(22, '/def/vehicle/trailer/gooseneck/cargo40.sii', 'cargo40', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(23, '/def/vehicle/trailer/gooseneck/cistern.sii', 'cistern', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(24, '/def/vehicle/trailer/gooseneck/cistern_alualk.sii', 'cistern_alualk', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(25, '/def/vehicle/trailer/gooseneck/cistern_calcium.sii', 'cistern_calcium', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(26, '/def/vehicle/trailer/gooseneck/cistern_magnesium.sii', 'cistern_magnesium', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(27, '/def/vehicle/trailer/gooseneck/cistern_nitrocel.sii', 'cistern_nitrocel', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(28, '/def/vehicle/trailer/gooseneck/cistern_phosphor.sii', 'cistern_phosphor', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(29, '/def/vehicle/trailer/gooseneck/cistern_potassium.sii', 'cistern_potassium', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(30, '/def/vehicle/trailer/gooseneck/cistern_sodium.sii', 'cistern_sodium', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(31, '/def/vehicle/trailer/gooseneck/nonflam_cistern_acetylene.sii', 'nonflam_cistern_acetylene', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(32, '/def/vehicle/trailer/gooseneck/nonflam_cistern_chlorine.sii', 'nonflam_cistern_chlorine', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(33, '/def/vehicle/trailer/gooseneck/nonflam_cistern_fluorine.sii', 'nonflam_cistern_fluorine', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(34, '/def/vehicle/trailer/gooseneck/nonflam_cistern_neon.sii', 'nonflam_cistern_neon', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:50', '2018-07-31 11:57:50'),
(35, '/def/vehicle/trailer/gooseneck/nonflam_cistern_nitrogen.sii', 'nonflam_cistern_nitrogen', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(36, '/def/vehicle/trailer/gooseneck/toxic_cistern_arsenic.sii', 'toxic_cistern_arsenic', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(37, '/def/vehicle/trailer/gooseneck/toxic_cistern_contamin.sii', 'toxic_cistern_contamin', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(38, '/def/vehicle/trailer/gooseneck/toxic_cistern_cyanide.sii', 'toxic_cistern_cyanide', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(39, '/def/vehicle/trailer/gooseneck/toxic_cistern_hmetal.sii', 'toxic_cistern_hmetal', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(40, '/def/vehicle/trailer/gooseneck/toxic_cistern_hwaste.sii', 'toxic_cistern_hwaste', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(41, '/def/vehicle/trailer/gooseneck/toxic_cistern_lead.sii', 'toxic_cistern_lead', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(42, '/def/vehicle/trailer/gooseneck/toxic_cistern_mercuric.sii', 'toxic_cistern_mercuric', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(43, '/def/vehicle/trailer/gooseneck/toxic_cistern_pesticide.sii', 'toxic_cistern_pesticide', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(44, '/def/vehicle/trailer/gooseneck/empty.sii', 'empty', 'gooseneck', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(45, '/def/vehicle/trailer/livestock/cows.sii', 'cows', 'livestock', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(46, '/def/vehicle/trailer/log_trailer/logs.sii', 'logs', 'log_trailer', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(47, '/def/vehicle/trailer/log_trailer/lumber.sii', 'lumber', 'log_trailer', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(48, '/def/vehicle/trailer/log_trailer/pipes.sii', 'pipes', 'log_trailer', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(49, '/def/vehicle/trailer/opentop/coal.sii', 'coal', 'opentop', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(50, '/def/vehicle/trailer/opentop/gravel.sii', 'gravel', 'opentop', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(51, '/def/vehicle/trailer/opentop/ore.sii', 'ore', 'opentop', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(52, '/def/vehicle/trailer/opentop/sand.sii', 'sand', 'opentop', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(53, '/def/vehicle/trailer/overweight/aircond.dlc_trailers.sii', 'aircond', 'overweight', 'ets2', '5', '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(54, '/def/vehicle/trailer/overweight/boat.sii', 'boat', 'overweight', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(55, '/def/vehicle/trailer/overweight/cat422.sii', 'cat422', 'overweight', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(56, '/def/vehicle/trailer/overweight/catg.sii', 'catg', 'overweight', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(57, '/def/vehicle/trailer/overweight/driller.dlc_trailers.sii', 'driller', 'overweight', 'ets2', '5', '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(58, '/def/vehicle/trailer/overweight/excavator.sii', 'excavator', 'overweight', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(59, '/def/vehicle/trailer/overweight/forklifts.sii', 'forklifts', 'overweight', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(60, '/def/vehicle/trailer/overweight/helicopter.dlc_trailers.sii', 'helicopter', 'overweight', 'ets2', '5', '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(61, '/def/vehicle/trailer/overweight/roller.dlc_trailers.sii', 'roller', 'overweight', 'ets2', '5', '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(62, '/def/vehicle/trailer/overweight/tracks.dlc_trailers.sii', 'tracks', 'overweight', 'ets2', '5', '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(63, '/def/vehicle/trailer/overweight/tractor.dlc_trailers.sii', 'tractor', 'overweight', 'ets2', '5', '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(64, '/def/vehicle/trailer/overweight/tractors.sii', 'tractors', 'overweight', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(65, '/def/vehicle/trailer/overweight/tube.dlc_north.sii', 'wind_tube', 'overweight', 'ets2', '1', '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(66, '/def/vehicle/trailer/overweight/tube.dlc_trailers.sii', 'tube', 'overweight', 'ets2', '5', '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(67, '/def/vehicle/trailer/overweight/twocats.sii', 'twocats', 'overweight', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(68, '/def/vehicle/trailer/overweight/windplant.dlc_north.sii', 'windplant', 'overweight', 'ets2', '1', '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(69, '/def/vehicle/trailer/overweight/yacht.dlc_trailers.sii', 'yacht', 'overweight', 'ets2', '5', '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(70, '/def/vehicle/trailer/s_ki_solid/coal.sii', 'coal', 's_ki_solid', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(71, '/def/vehicle/trailer/s_ki_solid/cover.sii', 'cover', 's_ki_solid', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(72, '/def/vehicle/trailer/s_ki_solid/gravel.sii', 'gravel', 's_ki_solid', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(73, '/def/vehicle/trailer/s_ki_solid/ore.sii', 'ore', 's_ki_solid', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(74, '/def/vehicle/trailer/s_ki_solid/sand.sii', 'sand', 's_ki_solid', 'ets2', NULL, '2018-07-31 11:57:51', '2018-07-31 11:57:51'),
(75, '/def/vehicle/trailer/car_transporter/cargo_cars_it.sii', 'cargo_cars_it', 'car_transporter', 'ets2', '3', '2018-07-31 11:59:23', '2018-07-31 11:59:23'),
(76, '/def/vehicle/trailer/car_transporter/cargo_france_cars.dlc_fr.sii', 'cargo_france_cars', 'car_transporter', 'ets2', '2', '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(77, '/def/vehicle/trailer/car_transporter/cargo_volvo.dlc_north.sii', 'cargo_volvo', 'car_transporter', 'ets2', '1', '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(78, '/def/vehicle/trailer/car_transporter/cargo_octavia.sii', 'cargo_octavia', 'car_transporter', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(79, '/def/vehicle/trailer/car_transporter/cargo_octavia_2.sii', 'cargo_octavia_2', 'car_transporter', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(80, '/def/vehicle/trailer/car_transporter/cargo_octavia_3.sii', 'cargo_octavia_3', 'car_transporter', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(82, '/def/vehicle/trailer/flat_bed/empty_tank.sii', 'empty_tank', 'flat_bed', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(83, '/def/vehicle/trailer/flat_bed/hi_pressure_tank.sii', 'hi_pressure_tank', 'flat_bed', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(84, '/def/vehicle/trailer/flat_bed/marble_blocks.sii', 'marble_blocks', 'flat_bed', 'ets2', '3', '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(85, '/def/vehicle/trailer/flat_bed/marble_blocks_2.sii', 'marble_blocks_2', 'flat_bed', 'ets2', '3', '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(86, '/def/vehicle/trailer/flat_bed/marble_slabs.sii', 'marble_slabs', 'flat_bed', 'ets2', '3', '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(87, '/def/vehicle/trailer/flat_bed/metal_coil.sii', 'metal_coil', 'flat_bed', 'ets2', '3', '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(88, '/def/vehicle/trailer/flat_bed/metal_pipes.sii', 'metal_pipes', 'flat_bed', 'ets2', '3', '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(89, '/def/vehicle/trailer/flat_bed/over_cargo.sii', 'over_cargo', 'flat_bed', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(90, '/def/vehicle/trailer/flat_bed/square_tubing.sii', 'square_tubing', 'flat_bed', 'ets2', '3', '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(91, '/def/vehicle/trailer/flat_bed/tubes.sii', 'tubes', 'flat_bed', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(92, '/def/vehicle/trailer/flat_bed/ventilator.sii', 'ventilator', 'flat_bed', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(93, '/def/vehicle/trailer/gooseneck/cargo20.sii', 'cargo20', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(94, '/def/vehicle/trailer/gooseneck/cargo20b.sii', 'cargo20b', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(95, '/def/vehicle/trailer/gooseneck/cargo30.sii', 'cargo30', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(96, '/def/vehicle/trailer/gooseneck/cargo40.sii', 'cargo40', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(97, '/def/vehicle/trailer/gooseneck/cistern.sii', 'cistern', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(98, '/def/vehicle/trailer/gooseneck/cistern_alualk.sii', 'cistern_alualk', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(99, '/def/vehicle/trailer/gooseneck/cistern_calcium.sii', 'cistern_calcium', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(100, '/def/vehicle/trailer/gooseneck/cistern_magnesium.sii', 'cistern_magnesium', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(101, '/def/vehicle/trailer/gooseneck/cistern_nitrocel.sii', 'cistern_nitrocel', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(102, '/def/vehicle/trailer/gooseneck/cistern_phosphor.sii', 'cistern_phosphor', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(103, '/def/vehicle/trailer/gooseneck/cistern_potassium.sii', 'cistern_potassium', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(104, '/def/vehicle/trailer/gooseneck/cistern_sodium.sii', 'cistern_sodium', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(105, '/def/vehicle/trailer/gooseneck/nonflam_cistern_acetylene.sii', 'nonflam_cistern_acetylene', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(106, '/def/vehicle/trailer/gooseneck/nonflam_cistern_chlorine.sii', 'nonflam_cistern_chlorine', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(107, '/def/vehicle/trailer/gooseneck/nonflam_cistern_fluorine.sii', 'nonflam_cistern_fluorine', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(108, '/def/vehicle/trailer/gooseneck/nonflam_cistern_neon.sii', 'nonflam_cistern_neon', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(109, '/def/vehicle/trailer/gooseneck/nonflam_cistern_nitrogen.sii', 'nonflam_cistern_nitrogen', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(110, '/def/vehicle/trailer/gooseneck/toxic_cistern_arsenic.sii', 'toxic_cistern_arsenic', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(111, '/def/vehicle/trailer/gooseneck/toxic_cistern_contamin.sii', 'toxic_cistern_contamin', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(112, '/def/vehicle/trailer/gooseneck/toxic_cistern_cyanide.sii', 'toxic_cistern_cyanide', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(113, '/def/vehicle/trailer/gooseneck/toxic_cistern_hmetal.sii', 'toxic_cistern_hmetal', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(114, '/def/vehicle/trailer/gooseneck/toxic_cistern_hwaste.sii', 'toxic_cistern_hwaste', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(115, '/def/vehicle/trailer/gooseneck/toxic_cistern_lead.sii', 'toxic_cistern_lead', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(116, '/def/vehicle/trailer/gooseneck/toxic_cistern_mercuric.sii', 'toxic_cistern_mercuric', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(117, '/def/vehicle/trailer/gooseneck/toxic_cistern_pesticide.sii', 'toxic_cistern_pesticide', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(118, '/def/vehicle/trailer/gooseneck/empty.sii', 'empty', 'gooseneck', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(120, '/def/vehicle/trailer/log_trailer/logs.sii', 'logs', 'log_trailer', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(121, '/def/vehicle/trailer/log_trailer/lumber.sii', 'lumber', 'log_trailer', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(122, '/def/vehicle/trailer/log_trailer/pipes.sii', 'pipes', 'log_trailer', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(123, '/def/vehicle/trailer/opentop/coal.sii', 'coal', 'opentop', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(124, '/def/vehicle/trailer/opentop/gravel.sii', 'gravel', 'opentop', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(125, '/def/vehicle/trailer/opentop/ore.sii', 'ore', 'opentop', 'ets2', NULL, '2018-07-31 11:59:24', '2018-07-31 11:59:24'),
(126, '/def/vehicle/trailer/opentop/sand.sii', 'sand', 'opentop', 'ets2', NULL, '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(127, '/def/vehicle/trailer/overweight/aircond.dlc_trailers.sii', 'aircond', 'overweight', 'ets2', '5', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(128, '/def/vehicle/trailer/overweight/boat.sii', 'boat', 'overweight', 'ets2', NULL, '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(129, '/def/vehicle/trailer/overweight/cat422.sii', 'cat422', 'overweight', 'ets2', NULL, '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(130, '/def/vehicle/trailer/overweight/catg.sii', 'catg', 'overweight', 'ets2', NULL, '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(131, '/def/vehicle/trailer/overweight/driller.dlc_trailers.sii', 'driller', 'overweight', 'ets2', '5', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(132, '/def/vehicle/trailer/overweight/excavator.sii', 'excavator', 'overweight', 'ets2', NULL, '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(133, '/def/vehicle/trailer/overweight/forklifts.sii', 'forklifts', 'overweight', 'ets2', NULL, '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(134, '/def/vehicle/trailer/overweight/helicopter.dlc_trailers.sii', 'helicopter', 'overweight', 'ets2', '5', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(135, '/def/vehicle/trailer/overweight/roller.dlc_trailers.sii', 'roller', 'overweight', 'ets2', '5', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(136, '/def/vehicle/trailer/overweight/tracks.dlc_trailers.sii', 'tracks', 'overweight', 'ets2', '5', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(137, '/def/vehicle/trailer/overweight/tractor.dlc_trailers.sii', 'tractor', 'overweight', 'ets2', '5', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(138, '/def/vehicle/trailer/overweight/tractors.sii', 'tractors', 'overweight', 'ets2', NULL, '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(139, '/def/vehicle/trailer/overweight/tube.dlc_north.sii', 'wind_tube', 'overweight', 'ets2', '1', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(140, '/def/vehicle/trailer/overweight/tube.dlc_trailers.sii', 'tube', 'overweight', 'ets2', '5', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(141, '/def/vehicle/trailer/overweight/twocats.sii', 'twocats', 'overweight', 'ets2', NULL, '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(142, '/def/vehicle/trailer/overweight/windplant.dlc_north.sii', 'windplant', 'overweight', 'ets2', '1', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(143, '/def/vehicle/trailer/overweight/yacht.dlc_trailers.sii', 'yacht', 'overweight', 'ets2', '5', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(144, '/def/vehicle/trailer/s_ki_solid/coal.sii', 'coal', 's_ki_solid', 'ets2', NULL, '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(145, '/def/vehicle/trailer/s_ki_solid/cover.sii', 'cover', 's_ki_solid', 'ets2', NULL, '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(146, '/def/vehicle/trailer/s_ki_solid/gravel.sii', 'gravel', 's_ki_solid', 'ets2', NULL, '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(147, '/def/vehicle/trailer/s_ki_solid/ore.sii', 'ore', 's_ki_solid', 'ets2', NULL, '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(148, '/def/vehicle/trailer/s_ki_solid/sand.sii', 'sand', 's_ki_solid', 'ets2', NULL, '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(149, '/def/vehicle/trailer/overweight/aircond_schw.dlc_trailers.sii', 'aircond_schw', 'schw_overweight', 'ets2', '5,4', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(150, '/def/vehicle/trailer/overweight/driller_schw.dlc_trailers.sii', 'driller_schw', 'schw_overweight', 'ets2', '5,4', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(151, '/def/vehicle/trailer/overweight/helicopter_schw.dlc_trailers.sii', 'helicopter_schw', 'schw_overweight', 'ets2', '5,4', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(152, '/def/vehicle/trailer/overweight/roller_schw.dlc_trailers.sii', 'roller_schw', 'schw_overweight', 'ets2', '5,4', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(153, '/def/vehicle/trailer/overweight/tracks_schw.dlc_trailers.sii', 'tracks_schw', 'schw_overweight', 'ets2', '5,4', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(154, '/def/vehicle/trailer/overweight/tractor_schw.dlc_trailers.sii', 'tractor_schw', 'schw_overweight', 'ets2', '5,4', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(155, '/def/vehicle/trailer/overweight/tube_schw.dlc_trailers.sii', 'tube_schw', 'schw_overweight', 'ets2', '5,4', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(156, '/def/vehicle/trailer/overweight/yacht_schw.dlc_trailers.sii', 'yacht_schw', 'schw_overweight', 'ets2', '5,4', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(157, '/def/vehicle/trailer/schw_overweight/boat.dlc_schwarzmuller.sii', 'boat_schw', 'schw_overweight', 'ets2', '4', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(158, '/def/vehicle/trailer/schw_overweight/cat422.dlc_schwarzmuller.sii', 'cat422_schw', 'schw_overweight', 'ets2', '4', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(159, '/def/vehicle/trailer/schw_overweight/catg.dlc_schwarzmuller.sii', 'catg_schw', 'schw_overweight', 'ets2', '4', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(160, '/def/vehicle/trailer/schw_overweight/excavator.dlc_schwarzmuller.sii', 'excavator_schw', 'schw_overweight', 'ets2', '4', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(161, '/def/vehicle/trailer/schw_overweight/forklifts.dlc_schwarzmuller.sii', 'forklifts_schw', 'schw_overweight', 'ets2', '4', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(162, '/def/vehicle/trailer/schw_overweight/tractors.dlc_schwarzmuller.sii', 'tractors_schw', 'schw_overweight', 'ets2', '4', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(163, '/def/vehicle/trailer/schw_overweight/twocats.dlc_schwarzmuller.sii', 'twocats_schw', 'schw_overweight', 'ets2', '4', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(164, '/def/vehicle/trailer/schw_slidepost/logs.dlc_schwarzmuller.sii', 'logs_schw', 'schw_slidep', 'ets2', '4', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(165, '/def/vehicle/trailer/truck_transporter/scaniacargo.sii', 'scaniacargo', 'truck_tranporter', 'ets2', NULL, '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(166, '/def/vehicle/trailer/truck_transporter/volvocargo.sii', 'volvocargo', 'truck_tranporter', 'ets2', NULL, '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(167, '/def/vehicle/trailer/goldhofer_mpa_k/cat_785c.sii', 'cat_785c', 'goldhofer_mpa_k', 'ets2', '7', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(168, '/def/vehicle/trailer/goldhofer_mpa_k/boiler_parts.sii', 'boiler_parts', 'goldhofer_mpa_k_short', 'ets2', '7', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(169, '/def/vehicle/trailer/goldhofer_mpa_k/excavator_bucket.sii', 'excavator_bucket', 'goldhofer_mpa_k_short', 'ets2', '7', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(170, '/def/vehicle/trailer/goldhofer_mpa_k/mystery_box.sii', 'mystery_box', 'goldhofer_mpa_k_short', 'ets2', '7', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(171, '/def/vehicle/trailer/goldhofer_mpa_k_flat/heat_exchanger.sii', 'heat_exchanger', 'goldhofer_mpa_k_flat', 'ets2', '7', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(172, '/def/vehicle/trailer/goldhofer_mpa_k_flat/lattice_structure.sii', 'lattice_structure', 'goldhofer_mpa_k_flat', 'ets2', '7', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(173, '/def/vehicle/trailer/goldhofer_mpa_k_flat/silo.sii', 'silo', 'goldhofer_mpa_k_flat', 'ets2', '7', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(174, '/def/vehicle/trailer/goldhofer_mpa_k_flat_1x4/condensator.sii', 'condensator', 'goldhofer_mpa_special', 'ets2', '7', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(175, '/def/vehicle/trailer/goldhofer_mpa_k_flat_1x4/michelin_59_80_r63.sii', 'michelin_59_80_r63', 'goldhofer_mpa_special', 'ets2', '7', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(176, '/def/vehicle/trailer/goldhofer_mpa_k_flat_1x4/mystery_cylinder.sii', 'mystery_cylinder', 'goldhofer_mpa_special', 'ets2', '7', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(177, '/def/vehicle/trailer/goldhofer_mpa_k_flat_1x4/komatsu_d155ax_5.sii', 'komatsu_d155ax_5', 'goldhofer_mpa', 'ets2', '6', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(178, '/def/vehicle/trailer/goldhofer_mpa_k_flat_1x4/terex_challenger_3160.sii', 'terex_challenger_3160', 'goldhofer_mpa', 'ets2', '6', '2018-07-31 11:59:25', '2018-07-31 11:59:25'),
(179, '/def/vehicle/trailer/goldhofer_mpa_k_flat_1x4/vossloh_g6.sii', 'vossloh_g6', 'goldhofer_mpa', 'ets2', '6', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(180, '/def/vehicle/trailer/goldhofer_mpa_k_flat_1x4/wirtgen_w250i.sii', 'wirtgen_w250i', 'goldhofer_mpa', 'ets2', '6', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(181, '/def/vehicle/trailer/goldhofer_stz_vl/coil.sii', 'coil', 'goldhofer_stz', 'ets2', '6', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(182, '/def/vehicle/trailer/goldhofer_stz_vl/concrete_beam.sii', 'concrete_beam', 'goldhofer_stz', 'ets2', '6', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(183, '/def/vehicle/trailer/goldhofer_stz_vl/metal_centering.sii', 'metal_centering', 'goldhofer_stz', 'ets2', '6', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(184, '/def/vehicle/trailer/goldhofer_stz_vl/transformer.sii', 'transformer', 'goldhofer_stz', 'ets2', '6', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(185, '/def/vehicle/trailer/goldhofer_stz_vl/pilot_boat.sii', 'pilot_boat', 'goldhofer_stz_long', 'ets2', '7', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(186, '/def/vehicle/trailer/van_transporter/iveco_daily.sii', 'iveco_daily', 'van_transporter', 'ets2', '3', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(187, '/def/vehicle/trailer/car/cargo_magnum.sii', 'cargo_magnum', 'car', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(188, '/def/vehicle/trailer/car/cargo_mustang.sii', 'cargo_mustang', 'car', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(189, '/def/vehicle/trailer/car/cargo_tesla.sii', 'cargo_tesla', 'car', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(190, '/def/vehicle/trailer/dump/cargo_cover.sii', 'cover', 'dump', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(191, '/def/vehicle/trailer/dump/cargo_gravel.sii', 'gravel', 'dump', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(192, '/def/vehicle/trailer/dump/cargo_limestone.sii', 'cargo_limestone', 'dump', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(193, '/def/vehicle/trailer/dump/cargo_sand.sii', 'sand', 'dump', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(194, '/def/vehicle/trailer/dump/cargo_wshavs.sii', 'cargo_wshavs', 'dump', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(195, '/def/vehicle/trailer/flatbed/cargo_beams.sii', 'cargo_beams', 'flatbed', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(196, '/def/vehicle/trailer/flatbed/cargo_ctubes_b.sii', 'cargo_ctubes_b', 'flatbed', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(197, '/def/vehicle/trailer/flatbed/cargo_ctubes_s.sii', 'cargo_ctubes_s', 'flatbed', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(198, '/def/vehicle/trailer/flatbed/cargo_etank.sii', 'empty_tank', 'flatbed', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(199, '/def/vehicle/trailer/flatbed/cargo_hay.sii', 'cargo_hay', 'flatbed', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(200, '/def/vehicle/trailer/flatbed/cargo_hptank.sii', 'hi_pressure_tank', 'flatbed', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(201, '/def/vehicle/trailer/flatbed/cargo_pipes.sii', 'pipes', 'flatbed', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(202, '/def/vehicle/trailer/flatbed/cargo_planks.sii', 'cargo_planks', 'flatbed', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(203, '/def/vehicle/trailer/flatbed/cargo_plows.sii', 'cargo_plows', 'flatbed', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(204, '/def/vehicle/trailer/flatbed/cargo_tubes.sii', 'tubes', 'flatbed', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(205, '/def/vehicle/trailer/flatbed/cargo_vent.sii', 'ventilator', 'flatbed', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(206, '/def/vehicle/trailer/gooseneck/cabin.sii', 'cabin', 'gooseneck_ats', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(207, '/def/vehicle/trailer/gooseneck/container_d.sii', 'container_d', 'gooseneck_ats', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(208, '/def/vehicle/trailer/gooseneck/container_s.sii', 'container_s', 'gooseneck_ats', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(209, '/def/vehicle/trailer/log/cargo_wood.sii', 'logs', 'log', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(210, '/def/vehicle/trailer/lowboy/cargo_boom_reel.sii', 'cargo_boom_reel', 'lowboy', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(211, '/def/vehicle/trailer/lowboy/cargo_bulldozer.sii', 'cargo_bulldozer', 'lowboy', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(212, '/def/vehicle/trailer/lowboy/cargo_cat422.sii', 'cat422', 'lowboy', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(213, '/def/vehicle/trailer/lowboy/cargo_cat938g.sii', 'catg', 'lowboy', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(214, '/def/vehicle/trailer/lowboy/cargo_excavator.sii', 'excavator', 'lowboy', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(215, '/def/vehicle/trailer/lowboy/cargo_forklifts.sii', 'forklifts', 'lowboy', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(216, '/def/vehicle/trailer/lowboy/cargo_roller.sii', 'cargo_roller', 'lowboy', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(217, '/def/vehicle/trailer/lowboy/cargo_tractor.sii', 'cargo_tractor', 'lowboy', 'ats', NULL, '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(218, '/def/vehicle/trailer/magnitude_55l/cargo_case_ih_600_q.sii', 'cargo_case_ih_600_q', 'magnitude_55l_1_2', 'ats', '8', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(219, '/def/vehicle/trailer/magnitude_55l/cargo_cat_627h.sii', 'cargo_cat_627h', 'magnitude_55l_1_2', 'ats', '8', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(220, '/def/vehicle/trailer/magnitude_55l/cargo_coil.sii', 'cargo_coil', 'magnitude_55l_1_2', 'ats', '8', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(221, '/def/vehicle/trailer/magnitude_55l/cargo_kalmar_rt240_short.sii', 'cargo_kalmar_rt240_short', 'magnitude_55l_1_2', 'ats', '8', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(222, '/def/vehicle/trailer/magnitude_55l/cargo_komatsu_d155ax_5.sii', 'cargo_komatsu_d155ax_5', 'magnitude_55l_1_2', 'ats', '8', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(223, '/def/vehicle/trailer/magnitude_55l/cargo_terex_challenger_3160.sii', 'cargo_terex_challenger_3160', 'magnitude_55l_1_2', 'ats', '8', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(224, '/def/vehicle/trailer/magnitude_55l/cargo_transformer.sii', 'cargo_transformer', 'magnitude_55l_1_2', 'ats', '8', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(225, '/def/vehicle/trailer/magnitude_55l/cargo_wirtgen_w250i.sii', 'cargo_wirtgen_w250i', 'magnitude_55l_1_2', 'ats', '8', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(226, '/def/vehicle/trailer/magnitude_55l/cargo_case_ih_600_q.sii', 'cargo_case_ih_600_q', 'magnitude_55l_1_2_3', 'ats', '8', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(227, '/def/vehicle/trailer/magnitude_55l/cargo_cat_627h.sii', 'cargo_cat_627h', 'magnitude_55l_1_2_3', 'ats', '8', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(228, '/def/vehicle/trailer/magnitude_55l/cargo_coil.sii', 'cargo_coil', 'magnitude_55l_1_2_3', 'ats', '8', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(229, '/def/vehicle/trailer/magnitude_55l/cargo_kalmar_rt240.sii', 'cargo_kalmar_rt240', 'magnitude_55l_1_2_3', 'ats', '8', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(230, '/def/vehicle/trailer/magnitude_55l/cargo_kalmar_rt240_short.sii', 'cargo_kalmar_rt240_short', 'magnitude_55l_1_2_3', 'ats', '8', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(231, '/def/vehicle/trailer/magnitude_55l/cargo_komatsu_d155ax_5.sii', 'cargo_komatsu_d155ax_5', 'magnitude_55l_1_2_3', 'ats', '8', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(232, '/def/vehicle/trailer/magnitude_55l/cargo_terex_challenger_3160.sii', 'cargo_terex_challenger_3160', 'magnitude_55l_1_2_3', 'ats', '8', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(233, '/def/vehicle/trailer/magnitude_55l/cargo_transformer.sii', 'cargo_transformer', 'magnitude_55l_1_2_3', 'ats', '8', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(234, '/def/vehicle/trailer/magnitude_55l/cargo_wirtgen_w250i.sii', 'cargo_wirtgen_w250i', 'magnitude_55l_1_2_3', 'ats', '8', '2018-07-31 11:59:26', '2018-07-31 11:59:26'),
(235, '/def/vehicle/trailer/magnitude_55l/cargo_case_ih_600_q.sii', 'cargo_case_ih_600_q', 'magnitude_55l_2', 'ats', '8', '2018-07-31 11:59:27', '2018-07-31 11:59:27'),
(236, '/def/vehicle/trailer/magnitude_55l/cargo_cat_627h.sii', 'cargo_cat_627h', 'magnitude_55l_2', 'ats', '8', '2018-07-31 11:59:27', '2018-07-31 11:59:27'),
(237, '/def/vehicle/trailer/magnitude_55l/cargo_coil.sii', 'cargo_coil', 'magnitude_55l_2', 'ats', '8', '2018-07-31 11:59:27', '2018-07-31 11:59:27'),
(238, '/def/vehicle/trailer/magnitude_55l/cargo_kalmar_rt240_short.sii', 'cargo_kalmar_rt240_short', 'magnitude_55l_2', 'ats', '8', '2018-07-31 11:59:27', '2018-07-31 11:59:27'),
(239, '/def/vehicle/trailer/magnitude_55l/cargo_komatsu_d155ax_5.sii', 'cargo_komatsu_d155ax_5', 'magnitude_55l_2', 'ats', '8', '2018-07-31 11:59:27', '2018-07-31 11:59:27'),
(240, '/def/vehicle/trailer/magnitude_55l/cargo_terex_challenger_3160.sii', 'cargo_terex_challenger_3160', 'magnitude_55l_2', 'ats', '8', '2018-07-31 11:59:27', '2018-07-31 11:59:27'),
(241, '/def/vehicle/trailer/magnitude_55l/cargo_transformer.sii', 'cargo_transformer', 'magnitude_55l_2', 'ats', '8', '2018-07-31 11:59:27', '2018-07-31 11:59:27'),
(242, '/def/vehicle/trailer/magnitude_55l/cargo_case_ih_600_q.sii', 'cargo_case_ih_600_q', 'magnitude_55l_2_3', 'ats', '8', '2018-07-31 11:59:27', '2018-07-31 11:59:27'),
(243, '/def/vehicle/trailer/magnitude_55l/cargo_cat_627h.sii', 'cargo_cat_627h', 'magnitude_55l_2_3', 'ats', '8', '2018-07-31 11:59:27', '2018-07-31 11:59:27'),
(244, '/def/vehicle/trailer/magnitude_55l/cargo_coil.sii', 'cargo_coil', 'magnitude_55l_2_3', 'ats', '8', '2018-07-31 11:59:27', '2018-07-31 11:59:27'),
(245, '/def/vehicle/trailer/magnitude_55l/cargo_kalmar_rt240.sii', 'cargo_kalmar_rt240', 'magnitude_55l_2_3', 'ats', '8', '2018-07-31 11:59:27', '2018-07-31 11:59:27'),
(246, '/def/vehicle/trailer/magnitude_55l/cargo_kalmar_rt240_short.sii', 'cargo_kalmar_rt240_short', 'magnitude_55l_2_3', 'ats', '8', '2018-07-31 11:59:27', '2018-07-31 11:59:27'),
(247, '/def/vehicle/trailer/magnitude_55l/cargo_komatsu_d155ax_5.sii', 'cargo_komatsu_d155ax_5', 'magnitude_55l_2_3', 'ats', '8', '2018-07-31 11:59:27', '2018-07-31 11:59:27'),
(248, '/def/vehicle/trailer/magnitude_55l/cargo_terex_challenger_3160.sii', 'cargo_terex_challenger_3160', 'magnitude_55l_2_3', 'ats', '8', '2018-07-31 11:59:27', '2018-07-31 11:59:27'),
(249, '/def/vehicle/trailer/magnitude_55l/cargo_transformer.sii', 'cargo_transformer', 'magnitude_55l_2_3', 'ats', '8', '2018-07-31 11:59:27', '2018-07-31 11:59:27');

-- --------------------------------------------------------

--
-- Структура таблиці `chassis`
--

CREATE TABLE `chassis` (
  `id` int(10) UNSIGNED NOT NULL,
  `def` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias_short` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `axles` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wheels_id` int(11) NOT NULL,
  `supports_wheels` tinyint(1) NOT NULL DEFAULT '1',
  `coupled` tinyint(1) NOT NULL DEFAULT '0',
  `with_accessory` tinyint(1) NOT NULL DEFAULT '0',
  `with_paint_job` tinyint(1) NOT NULL DEFAULT '0',
  `default_paint_job` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `can_random` tinyint(1) NOT NULL DEFAULT '0',
  `game` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ets2',
  `dlc_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `chassis`
--

INSERT INTO `chassis` (`id`, `def`, `alias`, `alias_short`, `axles`, `wheels_id`, `supports_wheels`, `coupled`, `with_accessory`, `with_paint_job`, `default_paint_job`, `can_random`, `game`, `dlc_id`, `created_at`, `updated_at`) VALUES
(2, '/def/vehicle/trailer/brick_trailer/chassis.sii', 'brick_trailer', 'brick_trailer', '3', 1, 1, 0, 0, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:50', '2018-07-31 11:37:50'),
(3, '/def/vehicle/trailer/brick_trailer/chassis_explo.sii', 'explo_brick_trailer', 'explo_brick_trailer', '3', 1, 1, 0, 0, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:05'),
(4, '/def/vehicle/trailer/car_transporter/chassis.sii', 'car_transporter_default', 'car_transporter', '2', 4, 1, 0, 1, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:05'),
(5, '/def/vehicle/trailer/car_transporter/chassis_black.sii', 'car_transporter_black', 'car_transporter', '2', 4, 1, 0, 1, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:05'),
(6, '/def/vehicle/trailer/car_transporter/chassis_blue.sii', 'car_transporter_blue', 'car_transporter', '2', 4, 1, 0, 1, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:05'),
(7, '/def/vehicle/trailer/cement/chassis.sii', 'cement_cistern', 'cement_cistern', '3', 1, 1, 0, 0, 1, '/def/vehicle/trailer/cement/company_paint_job/default.sii', 1, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:05'),
(8, '/def/vehicle/trailer/cement_mixer/chassis.sii', 'cement_mixer', 'cement_mixer', '3', 1, 1, 0, 1, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:05'),
(9, '/def/vehicle/trailer/chemical_cistern/chassis.sii', 'chemical_cistern', 'chemical_cistern', '3', 1, 1, 0, 0, 1, '/def/vehicle/trailer/chemical_cistern/company_paint_job/default.sii', 1, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:05'),
(10, '/def/vehicle/trailer/flat_bed/chassis.sii', 'flat_bed', 'flat_bed', '3', 1, 1, 0, 1, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:05'),
(11, '/def/vehicle/trailer/food_cistern/chassis.sii', 'food_cistern', 'food_cistern', '3', 1, 1, 0, 0, 1, '/def/vehicle/trailer/food_cistern/company_paint_job/default.sii', 1, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:05'),
(12, '/def/vehicle/trailer/fuel_cistern/chassis.sii', 'fuel_cistern', 'fuel_cistern', '3', 1, 1, 0, 0, 1, '/def/vehicle/trailer/fuel_cistern/company_paint_job/default.sii', 1, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:05'),
(13, '/def/vehicle/trailer/glass_trailer/chassis.sii', 'glass_trailer', 'glass_trailer', '3', 1, 1, 0, 0, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:05'),
(14, '/def/vehicle/trailer/gooseneck/chassis.sii', 'gooseneck', 'gooseneck', '3', 1, 1, 0, 1, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(19, '/def/vehicle/trailer/livestock/chassis.sii', 'livestock', 'livestock', '3', 1, 1, 0, 1, 1, '/def/vehicle/trailer/livestock/company_paint_job/default.sii', 1, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(20, '/def/vehicle/trailer/log_trailer/chassis.sii', 'log_trailer', 'log_trailer', '3', 1, 1, 0, 1, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(21, '/def/vehicle/trailer/opentop/chassis.sii', 'opentop', 'opentop', '3', 1, 1, 0, 1, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(22, '/def/vehicle/trailer/overweight/chassis.sii', 'overweight_default', 'overweight', '3', 5, 1, 0, 1, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(23, '/def/vehicle/trailer/overweight/chassis_b.sii', 'overweight_black', 'overweight', '3', 5, 1, 0, 1, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(24, '/def/vehicle/trailer/overweight/chassis_y.sii', 'overweight_yellow', 'overweight', '3', 5, 1, 0, 1, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(25, '/def/vehicle/trailer/panel_transporter/chassis.sii', 'panel_transporter', 'panel_transporter', '2', 1, 1, 0, 0, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(26, '/def/vehicle/trailer/panel_transporter/chassis_floor.sii', 'panel_transporter_floor', 'panel_transporter_floor', '2', 1, 1, 0, 0, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(27, '/def/vehicle/trailer/panel_transporter/chassis_glass.sii', 'panel_transporter_glass', 'panel_transporter_glass', '2', 1, 1, 0, 0, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(28, '/def/vehicle/trailer/panel_transporter/chassis_wall.sii', 'panel_transporter_wall', 'panel_transporter_wall', '2', 1, 1, 0, 0, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(29, '/def/vehicle/trailer/s_ki_solid/chassis.sii', 's_ki_solid', 's_ki_solid', '3', 1, 1, 0, 1, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(30, '/def/vehicle/trailer/schmitz/universal/chassis.sii', 'schmitz_universal', 'schmitz_universal', '3', 2, 1, 0, 0, 1, '/def/vehicle/trailer/schmitz/universal/company_paint_job/default.sii', 0, 'ets2', NULL, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(31, '/def/vehicle/trailer/schw_cistern_food/chassis.dlc_schwarzmuller.sii', 'schw_food_cistern', 'schw_food_cistern', '3', 1, 1, 0, 0, 1, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/default.sii', 0, 'ets2', 4, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(32, '/def/vehicle/trailer/schw_curtain/chassis.dlc_schwarzmuller.sii', 'schw_curtain', 'schw_curtain', '3', 1, 1, 0, 0, 1, '/def/vehicle/trailer/schw_curtain/company_paint_job/default.sii', 0, 'ets2', 4, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(33, '/def/vehicle/trailer/schw_overweight/chassis.dlc_schwarzmuller.sii', 'schw_overweight', 'schw_overweight', '3', 5, 0, 0, 1, 0, NULL, 0, 'ets2', 4, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(34, '/def/vehicle/trailer/schw_reefer/chassis.dlc_schwarzmuller.sii', 'schw_reefer', 'schw_reefer', '3', 1, 1, 0, 0, 1, '/def/vehicle/trailer/schw_reefer/company_paint_job/default.sii', 0, 'ets2', 4, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(35, '/def/vehicle/trailer/schw_slidepost/chassis.dlc_schwarzmuller.sii', 'schw_slidep', 'schw_slidep', '3', 1, 1, 0, 1, 0, NULL, 0, 'ets2', 4, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(36, '/def/vehicle/trailer/truck_transporter/chassis.sii', 'truck_tranporter', 'truck_tranporter', '3', 1, 1, 0, 1, 0, NULL, 0, 'ets2', NULL, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(37, '/def/vehicle/trailer/goldhofer_mpa_k/chassis.sii', 'goldhofer_mpa_k', 'goldhofer_mpa_k', '6', 6, 0, 0, 1, 0, NULL, 0, 'ets2', 7, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(38, '/def/vehicle/trailer/goldhofer_mpa_k/chassis_short.sii', 'goldhofer_mpa_k_short', 'goldhofer_mpa_k_short', '6', 6, 0, 0, 1, 0, NULL, 0, 'ets2', 7, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(39, '/def/vehicle/trailer/goldhofer_mpa_k_flat/chassis.sii', 'goldhofer_mpa_k_flat', 'goldhofer_mpa_k_flat', '10', 6, 0, 0, 1, 0, NULL, 0, 'ets2', 7, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(40, '/def/vehicle/trailer/goldhofer_mpa_k_flat_1x4/chassis.dlc_oversize_cargo.sii', 'goldhofer_mpa_special', 'goldhofer_mpa_special', '5', 6, 0, 0, 1, 0, NULL, 0, 'ets2', 7, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(41, '/def/vehicle/trailer/goldhofer_mpa_k_flat_1x4/chassis.dlc_heavy_cargo.sii', 'goldhofer_mpa_default', 'goldhofer_mpa', '5', 6, 0, 0, 1, 0, NULL, 0, 'ets2', 6, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(42, '/def/vehicle/trailer/goldhofer_mpa_k_flat_1x4/chassis_r.dlc_heavy_cargo.sii', 'goldhofer_mpa_red', 'goldhofer_mpa', '5', 6, 0, 0, 1, 0, NULL, 0, 'ets2', 6, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(43, '/def/vehicle/trailer/goldhofer_mpa_k_flat_1x4/chassis_y.dlc_heavy_cargo.sii', 'goldhofer_mpa_yellow', 'goldhofer_mpa', '5', 6, 0, 0, 1, 0, NULL, 0, 'ets2', 6, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(44, '/def/vehicle/trailer/goldhofer_stz_vl/chassis_short.sii', 'goldhofer_stz_default', 'goldhofer_stz', '4', 6, 0, 0, 1, 0, NULL, 0, 'ets2', 6, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(45, '/def/vehicle/trailer/goldhofer_stz_vl/chassis_short_r.sii', 'goldhofer_stz_red', 'goldhofer_stz', '4', 6, 0, 0, 1, 0, NULL, 0, 'ets2', 6, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(46, '/def/vehicle/trailer/goldhofer_stz_vl/chassis_short_y.sii', 'goldhofer_stz_yellow', 'goldhofer_stz', '4', 6, 0, 0, 1, 0, NULL, 0, 'ets2', 6, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(47, '/def/vehicle/trailer/goldhofer_stz_vl/chassis.sii', 'goldhofer_stz_long', 'goldhofer_stz_long', '4', 6, 0, 0, 1, 0, NULL, 0, 'ets2', 7, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(48, '/def/vehicle/trailer/willig/fuel_cistern/chassis.sii', 'willig_cistern', 'willig_cistern', '3', 1, 1, 0, 0, 1, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/default.sii', 1, 'ets2', NULL, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(49, '/def/vehicle/trailer/van_transporter/chassis.sii', 'van_transporter', 'van_transporter', '3', 4, 1, 0, 1, 0, NULL, 0, 'ets2', 3, '2018-07-31 11:37:51', '2018-08-01 04:41:06'),
(50, '/def/vehicle/trailer/acid/chassis.sii', 'acid', 'acid', '2', 1, 1, 0, 0, 1, '/def/vehicle/trailer/acid/company_paint_job/default.sii', 1, 'ats', NULL, '2018-07-31 11:37:51', '2018-08-01 04:43:39'),
(51, '/def/vehicle/trailer/acid_long/chassis.sii', 'acid_long', 'acid_long', '4', 1, 1, 0, 0, 1, '/def/vehicle/trailer/acid_long/company_paint_job/default.sii', 0, 'ats', NULL, '2018-07-31 11:37:51', '2018-08-01 04:43:39'),
(52, '/def/vehicle/trailer/bottom_dump/chassis.sii', 'bottom_dump', 'bottom_dump', '3', 1, 1, 0, 0, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:51', '2018-08-01 04:43:39'),
(53, '/def/vehicle/trailer/bottom_dump/short_bumper.sii', 'bottom_dump_short', 'bottom_dump_short', '1', 1, 1, 0, 0, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:51', '2018-08-01 04:43:39'),
(54, '/def/vehicle/trailer/bottom_dump/short_hook.sii', 'bottom_dump_pup_double', 'bottom_dump_pup_double', '1', 1, 1, 1, 0, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:51', '2018-08-01 04:43:39'),
(55, '/def/vehicle/trailer/bottom_dump/hook.sii', 'bottom_dump_rm_double', 'bottom_dump_rm_double', '3', 1, 1, 1, 0, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:51', '2018-08-01 04:43:39'),
(62, '/def/vehicle/trailer/car/chassis_b.sii', 'car_black', 'car', '2', 14, 1, 0, 1, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:51', '2018-08-01 04:43:39'),
(63, '/def/vehicle/trailer/car/chassis_r.sii', 'car_red', 'car', '2', 14, 1, 0, 1, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:51', '2018-08-01 04:43:39'),
(64, '/def/vehicle/trailer/cement/chassis.sii', 'cement', 'cement', '2', 1, 1, 0, 0, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:51', '2018-08-01 04:43:39'),
(65, '/def/vehicle/trailer/chemical/chassis.sii', 'chemical', 'chemical', '2', 1, 1, 0, 0, 1, '/def/vehicle/trailer/chemical/company_paint_job/default.sii', 1, 'ats', NULL, '2018-07-31 11:37:51', '2018-08-01 04:43:39'),
(66, '/def/vehicle/trailer/chemical_long/chassis.sii', 'chemical_long', 'chemical_long', '4', 1, 1, 0, 0, 1, '/def/vehicle/trailer/chemical_long/company_paint_job/default.sii', 0, 'ats', NULL, '2018-07-31 11:37:51', '2018-08-01 04:43:39'),
(77, '/def/vehicle/trailer/dump/chassis_b.sii', 'dump_black', 'dump', '2', 1, 1, 0, 1, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:51', '2018-08-01 04:43:39'),
(78, '/def/vehicle/trailer/dump/chassis_g.sii', 'dump_grey', 'dump', '2', 1, 1, 0, 1, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:51', '2018-08-01 04:43:39'),
(81, '/def/vehicle/trailer/food_tank/chassis.sii', 'food_tank', 'food_tank', '2', 1, 1, 0, 0, 1, '/def/vehicle/trailer/food_tank/company_paint_job/default.sii', 1, 'ats', NULL, '2018-07-31 11:37:51', '2018-08-01 04:43:40'),
(82, '/def/vehicle/trailer/fuel/chassis.sii', 'fuel', 'fuel', '2', 1, 1, 0, 0, 1, '/def/vehicle/trailer/fuel/company_paint_job/default.sii', 1, 'ats', NULL, '2018-07-31 11:37:51', '2018-08-01 04:43:40'),
(83, '/def/vehicle/trailer/fuel_long/chassis.sii', 'fuel_long', 'fuel_long', '3', 1, 1, 0, 0, 1, '/def/vehicle/trailer/fuel_long/company_paint_job/default.sii', 1, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(84, '/def/vehicle/trailer/gas/chassis.sii', 'gas', 'gas', '2', 1, 1, 0, 0, 1, '/def/vehicle/trailer/gas/company_paint_job/default.sii', 1, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(85, '/def/vehicle/trailer/gas_long/chassis.sii', 'gas_long', 'gas_long', '2', 1, 1, 0, 0, 1, '/def/vehicle/trailer/gas_long/company_paint_job/default.sii', 1, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(86, '/def/vehicle/trailer/gooseneck/chassis_b.sii', 'gooseneck_ats_blue', 'gooseneck_ats', '2', 1, 1, 0, 1, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(87, '/def/vehicle/trailer/gooseneck/chassis_r.sii', 'gooseneck_ats_red', 'gooseneck_ats', '2', 1, 1, 0, 1, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(88, '/def/vehicle/trailer/log/chassis.sii', 'log', 'log', '2', 1, 1, 0, 1, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(89, '/def/vehicle/trailer/lowboy/chassis_r.sii', 'lowboy_red', 'lowboy', '2', 1, 1, 0, 1, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(90, '/def/vehicle/trailer/lowboy/chassis_y.sii', 'lowboy_yellow', 'lowboy', '2', 1, 1, 0, 1, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(91, '/def/vehicle/trailer/magnitude_55l/chassis_jeep.sii', 'magnitude_55l_1_2', 'magnitude_55l_1_2', '2', 1, 1, 1, 1, 0, NULL, 0, 'ats', 8, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(92, '/def/vehicle/trailer/magnitude_55l/chassis_jeep.sii', 'magnitude_55l_1_2_3', 'magnitude_55l_1_2_3', '2', 1, 1, 1, 1, 0, NULL, 0, 'ats', 8, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(93, '/def/vehicle/trailer/magnitude_55l/chassis_trailer_3.sii', 'magnitude_55l_2', 'magnitude_55l_2', '3', 1, 1, 0, 1, 0, NULL, 0, 'ats', 8, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(94, '/def/vehicle/trailer/magnitude_55l/chassis_trailer_2_spreader.sii', 'magnitude_55l_2_3', 'magnitude_55l_2_3', '2', 1, 1, 1, 1, 0, NULL, 0, 'ats', 8, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(95, '/def/vehicle/trailer/mbt1_barrier/chassis.sii', 'mbt', 'mbt', '2', 1, 1, 0, 0, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(103, '/def/vehicle/trailer/scs_box/curtain_sider/chassis.sii', 'curtain_sider', 'curtain_sider', '3', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_box/curtain_sider/company_paint_job/default.sii', 1, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(104, '/def/vehicle/trailer/scs_box/curtain_sider/chassis_aero.sii', 'curtain_sider_aero', 'curtain_sider_aero', '3', 1, 1, 0, 0, 1, '/def/vehicle/scs_box/curtain_sider/company_paint_job/default.sii', 0, 'ets2', NULL, '2018-07-31 11:37:50', '2018-07-31 11:37:50'),
(105, '/def/vehicle/trailer/scs_box/curtain_sider/chassis_hook.sii', 'curtain_sider_double', 'curtain_sider_double', '3', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_box/curtain_sider/company_paint_job/default.sii', 0, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(106, '/def/vehicle/trailer/scs_box/curtain_sider/chassis_bd.sii', 'curtain_sider_bdouble', 'curtain_sider_bdouble', '3', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_box/curtain_sider/company_paint_job/default.sii', 0, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(107, '/def/vehicle/trailer/scs_box/curtain_sider/chassis_stw.sii', 'curtain_sider_steer', 'curtain_sider_steer', '3', 1, 0, 0, 0, 1, '/def/vehicle/trailer/scs_box/curtain_sider/company_paint_job/default.sii', 1, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(108, '/def/vehicle/trailer/scs_box/reefer/chassis.sii', 'refrigerated', 'refrigerated', '3', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_box/reefer/company_paint_job/default.sii', 1, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(109, '/def/vehicle/trailer/scs_box/reefer/chassis_hook.sii', 'refrigerated_double', 'refrigerated_double', '3', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_box/reefer/company_paint_job/default.sii', 0, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(110, '/def/vehicle/trailer/scs_box/reefer/chassis_bd.sii', 'refrigerated_bdouble', 'refrigerated_bdouble', '3', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_box/reefer/company_paint_job/default.sii', 0, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(111, '/def/vehicle/trailer/scs_box/reefer/chassis_stw.sii', 'refrigerated_steer', 'refrigerated_steer', '3', 1, 0, 0, 0, 1, '/def/vehicle/trailer/scs_box/reefer/company_paint_job/default.sii', 1, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(112, '/def/vehicle/trailer/scs_box/reefer/chassis_aero.sii', 'refrigerated_aero', 'refrigerated_aero', '3', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_box/reefer/company_paint_job/default.sii', 1, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(113, '/def/vehicle/trailer/scs_box/insulated/chassis.sii', 'insulated', 'insulated', '3', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_box/insulated/company_paint_job/default.sii', 1, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(114, '/def/vehicle/trailer/scs_box/insulated/chassis_aero.sii', 'insulated_aero', 'insulated_aero', '3', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_box/insulated/company_paint_job/default.sii', 1, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(115, '/def/vehicle/trailer/scs_box/insulated/chassis_hook.sii', 'insulated_double', 'insulated_double', '3', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_box/insulated/company_paint_job/default.sii', 0, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(116, '/def/vehicle/trailer/scs_box/insulated/chassis_bd.sii', 'insulated_bdouble', 'insulated_bdouble', '3', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_box/insulated/company_paint_job/default.sii', 0, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(117, '/def/vehicle/trailer/scs_box/insulated/chassis_stw.sii', 'insulated_steer', 'insulated_steer', '3', 1, 0, 0, 0, 1, '/def/vehicle/trailer/scs_box/insulated/company_paint_job/default.sii', 1, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(118, '/def/vehicle/trailer/scs_box/dry_van/chassis.sii', 'dry_van', 'dry_van', '3', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_box/dry_van/company_paint_job/default.sii', 1, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(119, '/def/vehicle/trailer/scs_box/dry_van/chassis_aero.sii', 'dry_van_aero', 'dry_van_aero', '3', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_box/dry_van/company_paint_job/default.sii', 1, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(120, '/def/vehicle/trailer/scs_box/dry_van/chassis_hook.sii', 'dry_van_double', 'dry_van_double', '3', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_box/dry_van/company_paint_job/default.sii', 0, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(121, '/def/vehicle/trailer/scs_box/dry_van/chassis_bd.sii', 'dry_van_bdouble', 'dry_van_bdouble', '3', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_box/dry_van/company_paint_job/default.sii', 0, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(122, '/def/vehicle/trailer/scs_box/dry_van/chassis_stw.sii', 'dry_van_steer', 'dry_van_steer', '3', 1, 0, 0, 0, 1, '/def/vehicle/trailer/scs_box/dry_van/company_paint_job/default.sii', 1, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(123, '/def/vehicle/trailer/scs_box/moving_floor/chassis.sii', 'moving_floor', 'moving_floor', '3', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_box/moving_floor/company_paint_job/default.sii', 1, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(124, '/def/vehicle/trailer/scs_box/moving_floor/chassis_stw.sii', 'moving_floor_steer', 'moving_floor_steer', '3', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_box/moving_floor/company_paint_job/default.sii', 1, 'ets2', NULL, '2018-07-31 11:37:50', '2018-08-01 04:41:06'),
(125, '/def/vehicle/trailer/dry_bulk/chassis.sii', 'dry_bulk', 'dry_bulk', '2', 1, 1, 0, 0, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(126, '/def/vehicle/trailer/dry_bulk/chassis.sii', 'drybulk_long', 'drybulk_long', '2', 1, 1, 1, 0, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(127, '/def/vehicle/trailer/dry_bulk/chassis.sii', 'drybulk_ls', 'drybulk_ls', '2', 1, 1, 1, 0, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(128, '/def/vehicle/trailer/dry_bulk/chassis_pup1.sii', 'drybulk_shrt', 'drybulk_shrt', '1', 1, 1, 1, 0, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(129, '/def/vehicle/trailer/scs_flatbed/curtain28_hook.sii', 'curtain28', 'curtain28', '1', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_flatbed/company_paint_job/default.sii', 1, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(130, '/def/vehicle/trailer/scs_flatbed/curtain45_r.sii', 'curtain45_r', 'curtain45_r', '2', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_flatbed/company_paint_job/default.sii', 1, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(131, '/def/vehicle/trailer/scs_flatbed/curtain53_f.sii', 'curtain53_f', 'curtain53_f', '2', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_flatbed/company_paint_job/default.sii', 1, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(132, '/def/vehicle/trailer/scs_flatbed/curtain28_hook.sii', 'curtain28_double', 'curtain28_double', '1', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_flatbed/company_paint_job/default.sii', 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(133, '/def/vehicle/trailer/scs_flatbed/curtain45_hook.sii', 'curtain45_rm_double', 'curtain45_rm_double', '2', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_flatbed/company_paint_job/default.sii', 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(134, '/def/vehicle/trailer/scs_flatbed/curtain28_hook.sii', 'curtain28_triple', 'curtain28_triple', '1', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_flatbed/company_paint_job/default.sii', 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(135, '/def/vehicle/trailer/scs_box/dry_28_hook.sii', 'dry_28', 'dry_28', '1', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_box/company_paint_job/default.sii', 1, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(136, '/def/vehicle/trailer/scs_box/dry_45_r.sii', 'dry_45_r', 'dry_45_r', '2', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_box/company_paint_job/default.sii', 1, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(137, '/def/vehicle/trailer/scs_box/dry_53_f.sii', 'dry_53_f', 'dry_53_f', '2', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_box/company_paint_job/default.sii', 1, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(138, '/def/vehicle/trailer/scs_box/dry_28_hook.sii', 'dry_28_double', 'dry_28_double', '1', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_box/company_paint_job/default.sii', 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(139, '/def/vehicle/trailer/scs_box/dry_45_hook.sii', 'dry_45_rm_double', 'dry_45_rm_double', '2', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_box/company_paint_job/default.sii', 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(140, '/def/vehicle/trailer/scs_box/dry_28_hook.sii', 'dry_28_triple', 'dry_28_triple', '1', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_box/company_paint_job/default.sii', 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(141, '/def/vehicle/trailer/scs_flatbed/flatbed28_hook.sii', 'flatbed28', 'flatbed28', '1', 1, 1, 0, 1, 0, NULL, 1, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(142, '/def/vehicle/trailer/scs_flatbed/flatbed45_r.sii', 'flatbed45_r', 'flatbed45_r', '2', 1, 1, 0, 1, 0, NULL, 1, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(143, '/def/vehicle/trailer/scs_flatbed/flatbed53_f.sii', 'flatbed53_f', 'flatbed53_f', '2', 1, 1, 0, 1, 0, NULL, 1, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(144, '/def/vehicle/trailer/scs_flatbed/flatbed28_hook.sii', 'flatbed28_double', 'flatbed28_double', '1', 1, 1, 1, 1, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(145, '/def/vehicle/trailer/scs_flatbed/flatbed45_hook.sii', 'flatbed45_rm_double', 'flatbed45_rm_double', '2', 1, 1, 1, 1, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(146, '/def/vehicle/trailer/scs_flatbed/flatbed28_hook.sii', 'flatbed28_triple', 'flatbed28_triple', '1', 1, 1, 1, 1, 0, NULL, 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(147, '/def/vehicle/trailer/scs_box/ins_28_hook.sii', 'ins_28', 'ins_28', '1', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_box/company_paint_job/default.sii', 1, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(148, '/def/vehicle/trailer/scs_box/ins_45_r.sii', 'ins_45_r', 'ins_45_r', '2', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_box/company_paint_job/default.sii', 1, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(149, '/def/vehicle/trailer/scs_box/ins_53_f.sii', 'ins_53_f', 'ins_53_f', '2', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_box/company_paint_job/default.sii', 1, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(150, '/def/vehicle/trailer/scs_box/ins_28_hook.sii', 'ins_28_double', 'ins_28_double', '1', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_box/company_paint_job/default.sii', 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(151, '/def/vehicle/trailer/scs_box/ins_45_hook.sii', 'ins_45_rm_double', 'ins_45_rm_double', '2', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_box/company_paint_job/default.sii', 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(152, '/def/vehicle/trailer/scs_box/ins_28_hook.sii', 'ins_28_triple', 'ins_28_triple', '1', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_box/company_paint_job/default.sii', 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(153, '/def/vehicle/trailer/scs_box/ref_28_hook.sii', 'ref_28', 'ref_28', '1', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_box/company_paint_job/default.sii', 1, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(154, '/def/vehicle/trailer/scs_box/ref_45_r.sii', 'ref_45_r', 'ref_45_r', '2', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_box/company_paint_job/default.sii', 1, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(155, '/def/vehicle/trailer/scs_box/ref_53_f.sii', 'ref_53_f', 'ref_53_f', '2', 1, 1, 0, 0, 1, '/def/vehicle/trailer/scs_box/company_paint_job/default.sii', 1, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(156, '/def/vehicle/trailer/scs_box/ref_28_hook.sii', 'ref_28_double', 'ref_28_double', '1', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_box/company_paint_job/default.sii', 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(157, '/def/vehicle/trailer/scs_box/ref_45_hook.sii', 'ref_45_rm_double', 'ref_45_rm_double', '2', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_box/company_paint_job/default.sii', 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40'),
(158, '/def/vehicle/trailer/scs_box/ref_28_hook.sii', 'ref_28_triple', 'ref_28_triple', '1', 1, 1, 1, 0, 1, '/def/vehicle/trailer/scs_box/company_paint_job/default.sii', 0, 'ats', NULL, '2018-07-31 11:37:52', '2018-08-01 04:43:40');

-- --------------------------------------------------------

--
-- Структура таблиці `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ets2',
  `dlc_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `companies`
--

INSERT INTO `companies` (`id`, `name`, `game`, `dlc_id`, `created_at`, `updated_at`) VALUES
(1, 'bcp', 'ets2', NULL, '2018-07-31 12:23:33', '2018-07-31 12:23:33'),
(2, 'drekkar', 'ets2', 1, '2018-07-31 12:23:33', '2018-07-31 12:23:33'),
(3, 'fcp', 'ets2', NULL, '2018-07-31 12:23:33', '2018-07-31 12:23:33'),
(4, 'gnt', 'ets2', 1, '2018-07-31 12:23:33', '2018-07-31 12:23:33'),
(5, 'ika_bohag', 'ets2', NULL, '2018-07-31 12:23:33', '2018-07-31 12:23:33'),
(6, 'itcc', 'ets2', NULL, '2018-07-31 12:23:33', '2018-07-31 12:23:33'),
(7, 'kaarfor', 'ets2', NULL, '2018-07-31 12:23:33', '2018-07-31 12:23:33'),
(8, 'konstnr', 'ets2', 1, '2018-07-31 12:23:33', '2018-07-31 12:23:33'),
(9, 'lkwlog', 'ets2', NULL, '2018-07-31 12:23:33', '2018-07-31 12:23:33'),
(10, 'nbfc', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(11, 'norrsken', 'ets2', 1, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(12, 'ns_oil', 'ets2', 1, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(13, 'posped', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(14, 'renar', 'ets2', 1, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(15, 'sanbuilders', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(16, 'sellplan', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(17, 'stokes', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(18, 'tradeaux', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(19, 'trameri', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(20, 'transinet', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(21, 'tras_med', 'ets2', 3, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(22, 'tree_et', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(23, 'wgcc', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(24, 'bhb_raffin', 'ets2', 2, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(25, 'chimi', 'ets2', 2, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(26, 'cnp', 'ets2', 3, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(27, 'exomar', 'ets2', 3, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(28, 'fattoria_f', 'ets2', 3, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(29, 'huilant', 'ets2', 2, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(30, 'ns_chem', 'ets2', 1, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(31, 'pp_chimica', 'ets2', 3, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(32, 'te_logistica', 'ets2', 3, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(33, 'wilnet_trans', 'ets2', 2, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(34, 'aria_food', 'ets2', 1, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(35, 'euroacres', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(36, 'eurogoodies', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(37, 'nos_pat', 'ets2', 2, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(38, 'subse', 'ets2', 2, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(39, 'acc', 'ets2', 3, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(40, 'aci', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(41, 'agronord', 'ets2', 1, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(42, 'bjork', 'ets2', 1, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(43, 'c_navale', 'ets2', 3, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(44, 'cargotras', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(45, 'cesare_smar', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(46, 'comoto', 'ets2', 3, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(47, 'costruzi', 'ets2', 3, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(48, 'costruzi_2', 'ets2', 3, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(49, 'dans_jardin', 'ets2', 2, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(50, 'eolo_lines', 'ets2', 3, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(51, 'fle', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(52, 'fui', 'ets2', 3, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(53, 'globeur', 'ets2', 2, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(54, 'libellula', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(55, 'lisette_log', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(56, 'nord_crown', 'ets2', 1, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(57, 'piac', 'ets2', 3, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(58, 'polar_fish', 'ets2', 1, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(59, 'polarislines', 'ets2', 1, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(60, 'sal', 'ets2', 3, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(61, 'spinelli', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(62, 'tesore_gust', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(63, 'vpc', 'ets2', 1, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(64, 'norr_food', 'ets2', 1, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(65, 'sag_tre', 'ets2', 1, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(66, 'scania_fac', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(67, 'vitas_pwr', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(68, 'volvo_fac', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(69, 'batisse', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(70, 'boisserie', 'ets2', 2, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(71, 'gomme_monde', 'ets2', 2, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(72, 'nucleon', 'ets2', 2, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(73, 'skoda', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(74, 'voitureux', 'ets2', NULL, '2018-07-31 12:23:34', '2018-07-31 12:23:34'),
(75, 'chemso', 'ats', NULL, '2018-07-31 12:23:35', '2018-07-31 12:23:35'),
(76, 'bushnell', 'ats', NULL, '2018-07-31 12:23:35', '2018-07-31 12:23:35'),
(77, 'charged', 'ats', NULL, '2018-07-31 12:23:35', '2018-07-31 12:23:35'),
(78, 'darchelle', 'ats', NULL, '2018-07-31 12:23:35', '2018-07-31 12:23:35'),
(79, 'print', 'ats', NULL, '2018-07-31 12:23:35', '2018-07-31 12:23:35'),
(80, 'sellgoods', 'ats', NULL, '2018-07-31 12:23:35', '2018-07-31 12:23:35'),
(81, 'sunshine', 'ats', NULL, '2018-07-31 12:23:35', '2018-07-31 12:23:35'),
(82, 'wallbert', 'ats', NULL, '2018-07-31 12:23:35', '2018-07-31 12:23:35'),
(83, 'coastline', 'ats', NULL, '2018-07-31 12:23:35', '2018-07-31 12:23:35'),
(84, 'plaster', 'ats', NULL, '2018-07-31 12:23:35', '2018-07-31 12:23:35'),
(85, 'voltison', 'ats', NULL, '2018-07-31 12:23:35', '2018-07-31 12:23:35'),
(86, 'gallon', 'ats', NULL, '2018-07-31 12:23:35', '2018-07-31 12:23:35'),
(87, 'global_mills', 'ats', NULL, '2018-07-31 12:23:35', '2018-07-31 12:23:35');

-- --------------------------------------------------------

--
-- Структура таблиці `dlc`
--

CREATE TABLE `dlc` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ets2',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `dlc`
--

INSERT INTO `dlc` (`id`, `name`, `game`, `active`, `created_at`, `updated_at`) VALUES
(1, 'scandinavia', 'ets2', 1, '2018-07-31 11:17:46', '2018-07-31 11:17:46'),
(2, 'france', 'ets2', 1, '2018-07-31 11:17:46', '2018-07-31 11:17:46'),
(3, 'italy', 'ets2', 1, '2018-07-31 11:17:46', '2018-07-31 11:17:46'),
(4, 'schwarzmuller', 'ets2', 1, '2018-07-31 11:17:46', '2018-07-31 11:17:46'),
(5, 'high', 'ets2', 1, '2018-07-31 11:17:46', '2018-07-31 11:17:46'),
(6, 'heavy', 'ets2', 1, '2018-07-31 11:17:46', '2018-07-31 11:17:46'),
(7, 'special', 'ets2', 1, '2018-07-31 11:17:46', '2018-07-31 11:17:46'),
(8, 'heavy_ats', 'ats', 1, '2018-07-31 11:17:46', '2018-07-31 11:17:46'),
(9, 'raven', 'ets2', 0, '2018-07-31 14:18:25', '2018-07-31 14:18:25');

-- --------------------------------------------------------

--
-- Структура таблиці `error_codes`
--

CREATE TABLE `error_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `error_codes`
--

INSERT INTO `error_codes` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 2301, 'No chassis', '2018-07-30 21:00:00', '2018-07-30 21:00:00'),
(2, 9502, 'Overweight', '2018-07-30 21:00:00', '2018-07-30 21:00:00'),
(3, 8113, 'File not valid', '2018-07-30 21:00:00', '2018-07-30 21:00:00'),
(4, 6764, 'No target', '2018-07-30 21:00:00', '2018-07-30 21:00:00');

-- --------------------------------------------------------

--
-- Структура таблиці `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `languages`
--

INSERT INTO `languages` (`id`, `locale`, `title`, `active`, `created_at`, `updated_at`) VALUES
(1, 'cs', 'Čeština', 0, '2018-07-31 12:26:45', '2018-07-31 12:26:45'),
(2, 'de', 'Deutsch', 1, '2018-07-31 12:26:45', '2018-07-31 12:26:45'),
(3, 'el', 'Ελληνικά', 1, '2018-07-31 12:26:45', '2018-07-31 12:26:45'),
(4, 'en', 'English', 1, '2018-07-31 12:26:45', '2018-07-31 12:26:45'),
(5, 'es', 'Español', 1, '2018-07-31 12:26:45', '2018-07-31 12:26:45'),
(6, 'fi', 'Suomi', 0, '2018-07-31 12:26:45', '2018-07-31 12:26:45'),
(7, 'fr', 'Français', 1, '2018-07-31 12:26:45', '2018-07-31 12:26:45'),
(8, 'it', 'Italiano', 0, '2018-07-31 12:26:45', '2018-07-31 12:26:45'),
(9, 'ja', '日本語', 0, '2018-07-31 12:26:45', '2018-07-31 12:26:45'),
(10, 'ko', '한국어', 0, '2018-07-31 12:26:45', '2018-07-31 12:26:45'),
(11, 'nl', 'Nederlands', 1, '2018-07-31 12:26:45', '2018-07-31 12:26:45'),
(12, 'nn', 'Nynorsk', 0, '2018-07-31 12:26:45', '2018-07-31 12:26:45'),
(13, 'pl', 'Polski', 1, '2018-07-31 12:26:45', '2018-07-31 12:26:45'),
(14, 'pt', 'Português', 0, '2018-07-31 12:26:45', '2018-07-31 12:26:45'),
(15, 'ro', 'Română', 1, '2018-07-31 12:26:45', '2018-07-31 12:26:45'),
(16, 'ru', 'Русский', 1, '2018-07-31 12:26:45', '2018-07-31 12:26:45'),
(17, 'sv', 'Svenska', 0, '2018-07-31 12:26:45', '2018-07-31 12:26:45'),
(18, 'tr', 'Türkçe', 1, '2018-07-31 12:26:45', '2018-07-31 12:26:45'),
(19, 'uk', 'Українська', 1, '2018-07-31 12:26:45', '2018-07-31 12:26:45'),
(20, 'zh', '简体中文', 0, '2018-07-31 12:26:45', '2018-07-31 12:26:45');

-- --------------------------------------------------------

--
-- Структура таблиці `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2018_07_31_115920_create_chassis_table', 1),
(16, '2018_07_31_120454_create_accessories_table', 1),
(17, '2018_07_31_121331_create_paints_table', 1),
(18, '2018_07_31_122102_create_wheels_table', 1),
(19, '2018_07_31_122135_create_dlc_table', 1),
(20, '2018_07_31_122150_create_companies_table', 1),
(21, '2018_07_31_122218_create_languages_table', 1),
(22, '2018_07_31_122237_create_error_codes_table', 1),
(23, '2018_07_31_123751_create_mods_table', 1),
(24, '2018_07_31_124514_create_settings_table', 1);

-- --------------------------------------------------------

--
-- Структура таблиці `mods`
--

CREATE TABLE `mods` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `params` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ets2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `mods`
--

INSERT INTO `mods` (`id`, `user_id`, `title`, `file_name`, `params`, `type`, `game`, `created_at`, `updated_at`) VALUES
(14, 2, 'Livestock', '1534500849_Livestock', 'a:2:{s:4:\"form\";a:4:{s:7:\"chassis\";s:9:\"livestock\";s:5:\"paint\";s:60:\"/def/vehicle/trailer/livestock/company_paint_job/default.sii\";s:5:\"color\";a:3:{s:3:\"hex\";s:7:\"#ffffff\";s:3:\"rgb\";a:3:{s:1:\"r\";s:3:\"255\";s:1:\"g\";s:3:\"255\";s:1:\"b\";s:3:\"255\";}s:3:\"scs\";a:3:{s:1:\"r\";s:1:\"1\";s:1:\"g\";s:1:\"1\";s:1:\"b\";s:1:\"1\";}}s:3:\"dlc\";a:7:{s:11:\"scandinavia\";s:2:\"on\";s:6:\"france\";s:2:\"on\";s:5:\"italy\";s:2:\"on\";s:13:\"schwarzmuller\";s:2:\"on\";s:4:\"high\";s:2:\"on\";s:5:\"heavy\";s:2:\"on\";s:7:\"special\";s:2:\"on\";}}s:4:\"view\";a:4:{s:7:\"chassis\";s:9:\"livestock\";s:5:\"paint\";s:7:\"default\";s:5:\"color\";s:7:\"#ffffff\";s:3:\"dlc\";a:7:{s:11:\"scandinavia\";s:2:\"on\";s:6:\"france\";s:2:\"on\";s:5:\"italy\";s:2:\"on\";s:13:\"schwarzmuller\";s:2:\"on\";s:4:\"high\";s:2:\"on\";s:5:\"heavy\";s:2:\"on\";s:7:\"special\";s:2:\"on\";}}}', 'trailer', 'ets2', '2018-08-17 07:14:09', '2018-08-17 07:14:09'),
(15, 2, 'Livestock', '1534501262_Livestock', 'a:2:{s:4:\"form\";a:4:{s:7:\"chassis\";s:9:\"livestock\";s:5:\"paint\";s:60:\"/def/vehicle/trailer/livestock/company_paint_job/default.sii\";s:5:\"color\";a:2:{s:3:\"scs\";a:3:{s:1:\"r\";s:1:\"1\";s:1:\"g\";s:1:\"1\";s:1:\"b\";s:1:\"1\";}s:3:\"hex\";s:7:\"#ffffff\";}s:3:\"dlc\";a:7:{s:11:\"scandinavia\";s:2:\"on\";s:6:\"france\";s:2:\"on\";s:5:\"italy\";s:2:\"on\";s:13:\"schwarzmuller\";s:2:\"on\";s:4:\"high\";s:2:\"on\";s:5:\"heavy\";s:2:\"on\";s:7:\"special\";s:2:\"on\";}}s:4:\"view\";a:2:{s:5:\"paint\";s:7:\"default\";s:5:\"color\";s:7:\"#ffffff\";}}', 'trailer', 'ets2', '2018-08-17 07:21:03', '2018-08-17 07:21:03');

-- --------------------------------------------------------

--
-- Структура таблиці `paints`
--

CREATE TABLE `paints` (
  `id` int(10) UNSIGNED NOT NULL,
  `def` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `look` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chassis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ets2',
  `dlc_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `paints`
--

INSERT INTO `paints` (`id`, `def`, `alias`, `look`, `chassis`, `game`, `dlc_id`, `created_at`, `updated_at`) VALUES
(1, '/def/vehicle/trailer/cement/company_paint_job/default.sii', 'default', 'default', 'cement_cistern', 'ets2', NULL, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(2, '/def/vehicle/trailer/cement/company_paint_job/bcp.sii', 'bcp', 'bcp', 'cement_cistern', 'ets2', NULL, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(3, '/def/vehicle/trailer/cement/company_paint_job/drekkar.sii', 'drekkar', 'drekkar', 'cement_cistern', 'ets2', 1, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(4, '/def/vehicle/trailer/cement/company_paint_job/fcp.sii', 'fcp', 'fcp', 'cement_cistern', 'ets2', NULL, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(5, '/def/vehicle/trailer/cement/company_paint_job/gnt.sii', 'gnt', 'gnt', 'cement_cistern', 'ets2', 1, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(6, '/def/vehicle/trailer/cement/company_paint_job/ika_bohag.sii', 'ika_bohag', 'ika_bohag', 'cement_cistern', 'ets2', NULL, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(7, '/def/vehicle/trailer/cement/company_paint_job/itcc.sii', 'itcc', 'itcc', 'cement_cistern', 'ets2', NULL, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(8, '/def/vehicle/trailer/cement/company_paint_job/kaarfor.sii', 'kaarfor', 'kaarfor', 'cement_cistern', 'ets2', NULL, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(9, '/def/vehicle/trailer/cement/company_paint_job/konstnr.sii', 'konstnr', 'konstnr', 'cement_cistern', 'ets2', 1, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(10, '/def/vehicle/trailer/cement/company_paint_job/lkwlog.sii', 'lkwlog', 'lkwlog', 'cement_cistern', 'ets2', NULL, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(11, '/def/vehicle/trailer/cement/company_paint_job/nbfc.sii', 'nbfc', 'nbfc', 'cement_cistern', 'ets2', NULL, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(12, '/def/vehicle/trailer/cement/company_paint_job/norrsken.sii', 'norrsken', 'norrsken', 'cement_cistern', 'ets2', 1, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(13, '/def/vehicle/trailer/cement/company_paint_job/ns_oil.sii', 'ns_oil', 'ns_oil', 'cement_cistern', 'ets2', 1, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(14, '/def/vehicle/trailer/cement/company_paint_job/posped.sii', 'posped', 'posped', 'cement_cistern', 'ets2', NULL, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(15, '/def/vehicle/trailer/cement/company_paint_job/renar.sii', 'renar', 'renar', 'cement_cistern', 'ets2', 1, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(16, '/def/vehicle/trailer/cement/company_paint_job/sanbuilders.sii', 'sanbuilders', 'sanbuilders', 'cement_cistern', 'ets2', NULL, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(17, '/def/vehicle/trailer/cement/company_paint_job/sellplan.sii', 'sellplan', 'sellplan', 'cement_cistern', 'ets2', NULL, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(18, '/def/vehicle/trailer/cement/company_paint_job/stokes.sii', 'stokes', 'stokes', 'cement_cistern', 'ets2', NULL, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(19, '/def/vehicle/trailer/cement/company_paint_job/tradeaux.sii', 'tradeaux', 'tradeaux', 'cement_cistern', 'ets2', NULL, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(20, '/def/vehicle/trailer/cement/company_paint_job/trameri.sii', 'trameri', 'trameri', 'cement_cistern', 'ets2', NULL, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(21, '/def/vehicle/trailer/cement/company_paint_job/transinet.sii', 'transinet', 'transinet', 'cement_cistern', 'ets2', NULL, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(22, '/def/vehicle/trailer/cement/company_paint_job/tras_med.sii', 'tras_med', 'tras_med', 'cement_cistern', 'ets2', 3, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(23, '/def/vehicle/trailer/cement/company_paint_job/tree_et.sii', 'tree_et', 'tree_et', 'cement_cistern', 'ets2', NULL, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(24, '/def/vehicle/trailer/cement/company_paint_job/wgcc.sii', 'wgcc', 'wgcc', 'cement_cistern', 'ets2', NULL, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(25, '/def/vehicle/trailer/chemical_cistern/company_paint_job/default.sii', 'default', 'default', 'chemical_cistern', 'ets2', NULL, '2018-07-31 12:18:02', '2018-07-31 12:18:02'),
(26, '/def/vehicle/trailer/chemical_cistern/company_paint_job/bhb_raffin.sii', 'bhb_raffin', 'bhb_raffin', 'chemical_cistern', 'ets2', 2, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(27, '/def/vehicle/trailer/chemical_cistern/company_paint_job/chimi.sii', 'chimi', 'chimi', 'chemical_cistern', 'ets2', 2, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(28, '/def/vehicle/trailer/chemical_cistern/company_paint_job/cnp.sii', 'cnp', 'cnp', 'chemical_cistern', 'ets2', 3, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(29, '/def/vehicle/trailer/chemical_cistern/company_paint_job/drekkar.sii', 'drekkar', 'drekkar', 'chemical_cistern', 'ets2', 1, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(30, '/def/vehicle/trailer/chemical_cistern/company_paint_job/exomar.sii', 'exomar', 'exomar', 'chemical_cistern', 'ets2', 3, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(31, '/def/vehicle/trailer/chemical_cistern/company_paint_job/fattoria_f.sii', 'fattoria_f', 'fattoria_f', 'chemical_cistern', 'ets2', 3, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(32, '/def/vehicle/trailer/chemical_cistern/company_paint_job/gnt.sii', 'gnt', 'gnt', 'chemical_cistern', 'ets2', 1, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(33, '/def/vehicle/trailer/chemical_cistern/company_paint_job/huilant.sii', 'huilant', 'huilant', 'chemical_cistern', 'ets2', 1, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(34, '/def/vehicle/trailer/chemical_cistern/company_paint_job/lkwlog.sii', 'lkwlog', 'lkwlog', 'chemical_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(35, '/def/vehicle/trailer/chemical_cistern/company_paint_job/nbfc.sii', 'nbfc', 'nbfc', 'chemical_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(36, '/def/vehicle/trailer/chemical_cistern/company_paint_job/norrsken.sii', 'norrsken', 'norrsken', 'chemical_cistern', 'ets2', 1, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(37, '/def/vehicle/trailer/chemical_cistern/company_paint_job/ns_chem.sii', 'ns_chem', 'ns_chem', 'chemical_cistern', 'ets2', 1, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(38, '/def/vehicle/trailer/chemical_cistern/company_paint_job/ns_oil.sii', 'ns_oil', 'ns_oil', 'chemical_cistern', 'ets2', 1, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(39, '/def/vehicle/trailer/chemical_cistern/company_paint_job/pp_chimica.sii', 'pp_chimica', 'pp_chimica', 'chemical_cistern', 'ets2', 3, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(40, '/def/vehicle/trailer/chemical_cistern/company_paint_job/renar.sii', 'renar', 'renar', 'chemical_cistern', 'ets2', 1, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(41, '/def/vehicle/trailer/chemical_cistern/company_paint_job/te_logistica.sii', 'te_logistica', 'te_logistica', 'chemical_cistern', 'ets2', 3, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(42, '/def/vehicle/trailer/chemical_cistern/company_paint_job/transinet.sii', 'transinet', 'transinet', 'chemical_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(43, '/def/vehicle/trailer/chemical_cistern/company_paint_job/tras_med.sii', 'tras_med', 'tras_med', 'chemical_cistern', 'ets2', 3, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(44, '/def/vehicle/trailer/chemical_cistern/company_paint_job/wgcc.sii', 'wgcc', 'wgcc', 'chemical_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(45, '/def/vehicle/trailer/chemical_cistern/company_paint_job/wilnet_trans.sii', 'wilnet_trans', 'wilnet_trans', 'chemical_cistern', 'ets2', 1, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(46, '/def/vehicle/trailer/food_cistern/company_paint_job/default.sii', 'default', 'default', 'food_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(47, '/def/vehicle/trailer/food_cistern/company_paint_job/aria_food.sii', 'aria_food', 'aria_food', 'food_cistern', 'ets2', 1, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(48, '/def/vehicle/trailer/food_cistern/company_paint_job/bcp.sii', 'bcp', 'bcp', 'food_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(49, '/def/vehicle/trailer/food_cistern/company_paint_job/cnp.sii', 'cnp', 'cnp', 'food_cistern', 'ets2', 3, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(50, '/def/vehicle/trailer/food_cistern/company_paint_job/drekkar.sii', 'drekkar', 'drekkar', 'food_cistern', 'ets2', 1, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(51, '/def/vehicle/trailer/food_cistern/company_paint_job/euroacres.sii', 'euroacres', 'euroacres', 'food_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(52, '/def/vehicle/trailer/food_cistern/company_paint_job/eurogoodies.sii', 'eurogoodies', 'eurogoodies', 'food_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(53, '/def/vehicle/trailer/food_cistern/company_paint_job/exomar.sii', 'exomar', 'exomar', 'food_cistern', 'ets2', 3, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(54, '/def/vehicle/trailer/food_cistern/company_paint_job/fattoria_f.sii', 'fattoria_f', 'fattoria_f', 'food_cistern', 'ets2', 3, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(55, '/def/vehicle/trailer/food_cistern/company_paint_job/fcp.sii', 'fcp', 'fcp', 'food_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(56, '/def/vehicle/trailer/food_cistern/company_paint_job/gnt.sii', 'gnt', 'gnt', 'food_cistern', 'ets2', 1, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(57, '/def/vehicle/trailer/food_cistern/company_paint_job/ika_bohag.sii', 'ika_bohag', 'ika_bohag', 'food_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(58, '/def/vehicle/trailer/food_cistern/company_paint_job/itcc.sii', 'itcc', 'itcc', 'food_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(59, '/def/vehicle/trailer/food_cistern/company_paint_job/kaarfor.sii', 'kaarfor', 'kaarfor', 'food_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(60, '/def/vehicle/trailer/food_cistern/company_paint_job/konstnr.sii', 'konstnr', 'konstnr', 'food_cistern', 'ets2', 1, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(61, '/def/vehicle/trailer/food_cistern/company_paint_job/lkwlog.sii', 'lkwlog', 'lkwlog', 'food_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(62, '/def/vehicle/trailer/food_cistern/company_paint_job/nbfc.sii', 'nbfc', 'nbfc', 'food_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(63, '/def/vehicle/trailer/food_cistern/company_paint_job/norrsken.sii', 'norrsken', 'norrsken', 'food_cistern', 'ets2', 1, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(64, '/def/vehicle/trailer/food_cistern/company_paint_job/nos_pat.sii', 'nos_pat', 'nos_pat', 'food_cistern', 'ets2', 2, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(65, '/def/vehicle/trailer/food_cistern/company_paint_job/ns_oil.sii', 'ns_oil', 'ns_oil', 'food_cistern', 'ets2', 1, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(66, '/def/vehicle/trailer/food_cistern/company_paint_job/posped.sii', 'posped', 'posped', 'food_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(67, '/def/vehicle/trailer/food_cistern/company_paint_job/pp_chimica.sii', 'pp_chimica', 'pp_chimica', 'food_cistern', 'ets2', 3, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(68, '/def/vehicle/trailer/food_cistern/company_paint_job/renar.sii', 'renar', 'renar', 'food_cistern', 'ets2', 1, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(69, '/def/vehicle/trailer/food_cistern/company_paint_job/sanbuilders.sii', 'sanbuilders', 'sanbuilders', 'food_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(70, '/def/vehicle/trailer/food_cistern/company_paint_job/sellplan.sii', 'sellplan', 'sellplan', 'food_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(71, '/def/vehicle/trailer/food_cistern/company_paint_job/stokes.sii', 'stokes', 'stokes', 'food_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(72, '/def/vehicle/trailer/food_cistern/company_paint_job/subse.sii', 'subse', 'subse', 'food_cistern', 'ets2', 2, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(73, '/def/vehicle/trailer/food_cistern/company_paint_job/te_logistica.sii', 'te_logistica', 'te_logistica', 'food_cistern', 'ets2', 3, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(74, '/def/vehicle/trailer/food_cistern/company_paint_job/tradeaux.sii', 'tradeaux', 'tradeaux', 'food_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(75, '/def/vehicle/trailer/food_cistern/company_paint_job/trameri.sii', 'trameri', 'trameri', 'food_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(76, '/def/vehicle/trailer/food_cistern/company_paint_job/transinet.sii', 'transinet', 'transinet', 'food_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(77, '/def/vehicle/trailer/food_cistern/company_paint_job/tras_med.sii', 'tras_med', 'tras_med', 'food_cistern', 'ets2', 3, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(78, '/def/vehicle/trailer/food_cistern/company_paint_job/tree_et.sii', 'tree_et', 'tree_et', 'food_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(79, '/def/vehicle/trailer/food_cistern/company_paint_job/wgcc.sii', 'wgcc', 'wgcc', 'food_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(80, '/def/vehicle/trailer/food_cistern/company_paint_job/wilnet_trans.sii', 'wilnet_trans', 'wilnet_trans', 'food_cistern', 'ets2', 2, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(81, '/def/vehicle/trailer/fuel_cistern/company_paint_job/default.sii', 'default', 'default', 'fuel_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(82, '/def/vehicle/trailer/fuel_cistern/company_paint_job/bcp.sii', 'bcp', 'bcp', 'fuel_cistern', 'ets2', NULL, '2018-07-31 12:18:03', '2018-07-31 12:18:03'),
(83, '/def/vehicle/trailer/fuel_cistern/company_paint_job/bhb_raffin.sii', 'bhb_raffin', 'bhb_raffin', 'fuel_cistern', 'ets2', 2, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(84, '/def/vehicle/trailer/fuel_cistern/company_paint_job/cnp.sii', 'cnp', 'cnp', 'fuel_cistern', 'ets2', 3, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(85, '/def/vehicle/trailer/fuel_cistern/company_paint_job/exomar.sii', 'exomar', 'exomar', 'fuel_cistern', 'ets2', 3, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(86, '/def/vehicle/trailer/fuel_cistern/company_paint_job/fattoria_f.sii', 'fattoria_f', 'fattoria_f', 'fuel_cistern', 'ets2', 3, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(87, '/def/vehicle/trailer/fuel_cistern/company_paint_job/fcp.sii', 'fcp', 'fcp', 'fuel_cistern', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(88, '/def/vehicle/trailer/fuel_cistern/company_paint_job/gnt.sii', 'gnt', 'gnt', 'fuel_cistern', 'ets2', 1, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(89, '/def/vehicle/trailer/fuel_cistern/company_paint_job/itcc.sii', 'itcc', 'itcc', 'fuel_cistern', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(90, '/def/vehicle/trailer/fuel_cistern/company_paint_job/lkwlog.sii', 'lkwlog', 'lkwlog', 'fuel_cistern', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(91, '/def/vehicle/trailer/fuel_cistern/company_paint_job/nbfc.sii', 'nbfc', 'nbfc', 'fuel_cistern', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(92, '/def/vehicle/trailer/fuel_cistern/company_paint_job/ns_oil.sii', 'ns_oil', 'ns_oil', 'fuel_cistern', 'ets2', 1, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(93, '/def/vehicle/trailer/fuel_cistern/company_paint_job/posped.sii', 'posped', 'posped', 'fuel_cistern', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(94, '/def/vehicle/trailer/fuel_cistern/company_paint_job/pp_chimica.sii', 'pp_chimica', 'pp_chimica', 'fuel_cistern', 'ets2', 3, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(95, '/def/vehicle/trailer/fuel_cistern/company_paint_job/stokes.sii', 'stokes', 'stokes', 'fuel_cistern', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(96, '/def/vehicle/trailer/fuel_cistern/company_paint_job/te_logistica.sii', 'te_logistica', 'te_logistica', 'fuel_cistern', 'ets2', 3, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(97, '/def/vehicle/trailer/fuel_cistern/company_paint_job/tradeaux.sii', 'tradeaux', 'tradeaux', 'fuel_cistern', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(98, '/def/vehicle/trailer/fuel_cistern/company_paint_job/trameri.sii', 'trameri', 'trameri', 'fuel_cistern', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(99, '/def/vehicle/trailer/fuel_cistern/company_paint_job/transinet.sii', 'transinet', 'transinet', 'fuel_cistern', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(100, '/def/vehicle/trailer/fuel_cistern/company_paint_job/tras_med.sii', 'tras_med', 'tras_med', 'fuel_cistern', 'ets2', 3, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(101, '/def/vehicle/trailer/fuel_cistern/company_paint_job/wgcc.sii', 'wgcc', 'wgcc', 'fuel_cistern', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(102, '/def/vehicle/trailer/fuel_cistern/company_paint_job/wilnet_trans.sii', 'wilnet_trans', 'wilnet_trans', 'fuel_cistern', 'ets2', 2, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(103, '/def/vehicle/trailer/krone/coolliner/company_paint_job/default.sii', 'default', 'default', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(104, '/def/vehicle/trailer/krone/coolliner/company_paint_job/acc.sii', 'acc', 'acc', 'coolliner', 'ets2', 3, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(105, '/def/vehicle/trailer/krone/coolliner/company_paint_job/aci.sii', 'aci', 'aci', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(106, '/def/vehicle/trailer/krone/coolliner/company_paint_job/agronord.sii', 'agronord', 'agronord', 'coolliner', 'ets2', 1, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(107, '/def/vehicle/trailer/krone/coolliner/company_paint_job/aria_food.sii', 'aria_food', 'aria_food', 'coolliner', 'ets2', 1, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(108, '/def/vehicle/trailer/krone/coolliner/company_paint_job/bcp.sii', 'bcp', 'bcp', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(109, '/def/vehicle/trailer/krone/coolliner/company_paint_job/bjork.sii', 'bjork', 'bjork', 'coolliner', 'ets2', 1, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(110, '/def/vehicle/trailer/krone/coolliner/company_paint_job/c_navale.sii', 'c_navale', 'c_navale', 'coolliner', 'ets2', 3, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(111, '/def/vehicle/trailer/krone/coolliner/company_paint_job/cargotras.sii', 'cargotras', 'cargotras', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(112, '/def/vehicle/trailer/krone/coolliner/company_paint_job/cesare_smar.sii', 'cesare_smar', 'cesare_smar', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(113, '/def/vehicle/trailer/krone/coolliner/company_paint_job/cnp.sii', 'cnp', 'cnp', 'coolliner', 'ets2', 3, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(114, '/def/vehicle/trailer/krone/coolliner/company_paint_job/comoto.sii', 'comoto', 'comoto', 'coolliner', 'ets2', 3, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(115, '/def/vehicle/trailer/krone/coolliner/company_paint_job/costruzi.sii', 'costruzi', 'costruzi', 'coolliner', 'ets2', 3, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(116, '/def/vehicle/trailer/krone/coolliner/company_paint_job/costruzi_2.sii', 'costruzi_2', 'costruzi_2', 'coolliner', 'ets2', 3, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(117, '/def/vehicle/trailer/krone/coolliner/company_paint_job/dans_jardin.sii', 'dans_jardin', 'dans_jardin', 'coolliner', 'ets2', 2, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(118, '/def/vehicle/trailer/krone/coolliner/company_paint_job/drekkar.sii', 'drekkar', 'drekkar', 'coolliner', 'ets2', 1, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(119, '/def/vehicle/trailer/krone/coolliner/company_paint_job/eolo_lines.sii', 'eolo_lines', 'eolo_lines', 'coolliner', 'ets2', 3, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(120, '/def/vehicle/trailer/krone/coolliner/company_paint_job/euroacres.sii', 'euroacres', 'euroacres', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(121, '/def/vehicle/trailer/krone/coolliner/company_paint_job/eurogoodies.sii', 'eurogoodies', 'eurogoodies', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(122, '/def/vehicle/trailer/krone/coolliner/company_paint_job/exomar.sii', 'exomar', 'exomar', 'coolliner', 'ets2', 3, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(123, '/def/vehicle/trailer/krone/coolliner/company_paint_job/fattoria_f.sii', 'fattoria_f', 'fattoria_f', 'coolliner', 'ets2', 3, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(124, '/def/vehicle/trailer/krone/coolliner/company_paint_job/fcp.sii', 'fcp', 'fcp', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(125, '/def/vehicle/trailer/krone/coolliner/company_paint_job/fle.sii', 'fle', 'fle', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(126, '/def/vehicle/trailer/krone/coolliner/company_paint_job/fui.sii', 'fui', 'fui', 'coolliner', 'ets2', 3, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(127, '/def/vehicle/trailer/krone/coolliner/company_paint_job/globeur.sii', 'globeur', 'globeur', 'coolliner', 'ets2', 2, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(128, '/def/vehicle/trailer/krone/coolliner/company_paint_job/gnt.sii', 'gnt', 'gnt', 'coolliner', 'ets2', 1, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(129, '/def/vehicle/trailer/krone/coolliner/company_paint_job/ika_bohag.sii', 'ika_bohag', 'ika_bohag', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(130, '/def/vehicle/trailer/krone/coolliner/company_paint_job/itcc.sii', 'itcc', 'itcc', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(131, '/def/vehicle/trailer/krone/coolliner/company_paint_job/kaarfor.sii', 'kaarfor', 'kaarfor', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(132, '/def/vehicle/trailer/krone/coolliner/company_paint_job/konstnr.sii', 'konstnr', 'konstnr', 'coolliner', 'ets2', 1, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(133, '/def/vehicle/trailer/krone/coolliner/company_paint_job/libellula.sii', 'libellula', 'libellula', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(134, '/def/vehicle/trailer/krone/coolliner/company_paint_job/lisette_log.sii', 'lisette_log', 'lisette_log', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(135, '/def/vehicle/trailer/krone/coolliner/company_paint_job/lkwlog.sii', 'lkwlog', 'lkwlog', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(136, '/def/vehicle/trailer/krone/coolliner/company_paint_job/nbfc.sii', 'nbfc', 'nbfc', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(137, '/def/vehicle/trailer/krone/coolliner/company_paint_job/nord_crown.sii', 'nord_crown', 'nord_crown', 'coolliner', 'ets2', 1, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(138, '/def/vehicle/trailer/krone/coolliner/company_paint_job/norrsken.sii', 'norrsken', 'norrsken', 'coolliner', 'ets2', 1, '2018-07-31 12:18:04', '2018-07-31 12:18:04'),
(139, '/def/vehicle/trailer/krone/coolliner/company_paint_job/nos_pat.sii', 'nos_pat', 'nos_pat', 'coolliner', 'ets2', 2, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(140, '/def/vehicle/trailer/krone/coolliner/company_paint_job/ns_oil.sii', 'ns_oil', 'ns_oil', 'coolliner', 'ets2', 1, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(141, '/def/vehicle/trailer/krone/coolliner/company_paint_job/piac.sii', 'piac', 'piac', 'coolliner', 'ets2', 3, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(142, '/def/vehicle/trailer/krone/coolliner/company_paint_job/polar_fish.sii', 'polar_fish', 'polar_fish', 'coolliner', 'ets2', 1, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(143, '/def/vehicle/trailer/krone/coolliner/company_paint_job/polarislines.sii', 'polarislines', 'polarislines', 'coolliner', 'ets2', 1, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(144, '/def/vehicle/trailer/krone/coolliner/company_paint_job/posped.sii', 'posped', 'posped', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(145, '/def/vehicle/trailer/krone/coolliner/company_paint_job/pp_chimica.sii', 'pp_chimica', 'pp_chimica', 'coolliner', 'ets2', 3, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(146, '/def/vehicle/trailer/krone/coolliner/company_paint_job/renar.sii', 'renar', 'renar', 'coolliner', 'ets2', 1, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(147, '/def/vehicle/trailer/krone/coolliner/company_paint_job/sal.sii', 'sal', 'sal', 'coolliner', 'ets2', 3, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(148, '/def/vehicle/trailer/krone/coolliner/company_paint_job/sanbuilders.sii', 'sanbuilders', 'sanbuilders', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(149, '/def/vehicle/trailer/krone/coolliner/company_paint_job/sellplan.sii', 'sellplan', 'sellplan', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(150, '/def/vehicle/trailer/krone/coolliner/company_paint_job/spinelli.sii', 'spinelli', 'spinelli', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(151, '/def/vehicle/trailer/krone/coolliner/company_paint_job/stokes.sii', 'stokes', 'stokes', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(152, '/def/vehicle/trailer/krone/coolliner/company_paint_job/subse.sii', 'subse', 'subse', 'coolliner', 'ets2', 2, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(153, '/def/vehicle/trailer/krone/coolliner/company_paint_job/te_logistica.sii', 'te_logistica', 'te_logistica', 'coolliner', 'ets2', 3, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(154, '/def/vehicle/trailer/krone/coolliner/company_paint_job/tesore_gust.sii', 'tesore_gust', 'tesore_gust', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(155, '/def/vehicle/trailer/krone/coolliner/company_paint_job/tradeaux.sii', 'tradeaux', 'tradeaux', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(156, '/def/vehicle/trailer/krone/coolliner/company_paint_job/trameri.sii', 'trameri', 'trameri', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(157, '/def/vehicle/trailer/krone/coolliner/company_paint_job/transinet.sii', 'transinet', 'transinet', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(158, '/def/vehicle/trailer/krone/coolliner/company_paint_job/tras_med.sii', 'tras_med', 'tras_med', 'coolliner', 'ets2', 3, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(159, '/def/vehicle/trailer/krone/coolliner/company_paint_job/tree_et.sii', 'tree_et', 'tree_et', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(160, '/def/vehicle/trailer/krone/coolliner/company_paint_job/vpc.sii', 'vpc', 'vpc', 'coolliner', 'ets2', 1, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(161, '/def/vehicle/trailer/krone/coolliner/company_paint_job/wgcc.sii', 'wgcc', 'wgcc', 'coolliner', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(162, '/def/vehicle/trailer/krone/coolliner/company_paint_job/wilnet_trans.sii', 'wilnet_trans', 'wilnet_trans', 'coolliner', 'ets2', 2, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(163, '/def/vehicle/trailer/krone/fridge/company_paint_job/default.sii', 'default', 'default', 'fridge', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(164, '/def/vehicle/trailer/krone/fridge/company_paint_job/acc.sii', 'acc', 'acc', 'fridge', 'ets2', 3, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(165, '/def/vehicle/trailer/krone/fridge/company_paint_job/aci.sii', 'aci', 'aci', 'fridge', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(166, '/def/vehicle/trailer/krone/fridge/company_paint_job/agronord.sii', 'agronord', 'agronord', 'fridge', 'ets2', 1, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(167, '/def/vehicle/trailer/krone/fridge/company_paint_job/aria_food.sii', 'aria_food', 'aria_food', 'fridge', 'ets2', 1, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(168, '/def/vehicle/trailer/krone/fridge/company_paint_job/bcp.sii', 'bcp', 'bcp', 'fridge', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(169, '/def/vehicle/trailer/krone/fridge/company_paint_job/bjork.sii', 'bjork', 'bjork', 'fridge', 'ets2', 1, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(170, '/def/vehicle/trailer/krone/fridge/company_paint_job/c_navale.sii', 'c_navale', 'c_navale', 'fridge', 'ets2', 3, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(171, '/def/vehicle/trailer/krone/fridge/company_paint_job/cargotras.sii', 'cargotras', 'cargotras', 'fridge', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(172, '/def/vehicle/trailer/krone/fridge/company_paint_job/cesare_smar.sii', 'cesare_smar', 'cesare_smar', 'fridge', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(173, '/def/vehicle/trailer/krone/fridge/company_paint_job/cnp.sii', 'cnp', 'cnp', 'fridge', 'ets2', 3, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(174, '/def/vehicle/trailer/krone/fridge/company_paint_job/comoto.sii', 'comoto', 'comoto', 'fridge', 'ets2', 3, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(175, '/def/vehicle/trailer/krone/fridge/company_paint_job/costruzi.sii', 'costruzi', 'costruzi', 'fridge', 'ets2', 3, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(176, '/def/vehicle/trailer/krone/fridge/company_paint_job/costruzi_2.sii', 'costruzi_2', 'costruzi_2', 'fridge', 'ets2', 3, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(177, '/def/vehicle/trailer/krone/fridge/company_paint_job/dans_jardin.sii', 'dans_jardin', 'dans_jardin', 'fridge', 'ets2', 2, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(178, '/def/vehicle/trailer/krone/fridge/company_paint_job/drekkar.sii', 'drekkar', 'drekkar', 'fridge', 'ets2', 1, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(179, '/def/vehicle/trailer/krone/fridge/company_paint_job/eolo_lines.sii', 'eolo_lines', 'eolo_lines', 'fridge', 'ets2', 3, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(180, '/def/vehicle/trailer/krone/fridge/company_paint_job/euroacres.sii', 'euroacres', 'euroacres', 'fridge', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(181, '/def/vehicle/trailer/krone/fridge/company_paint_job/eurogoodies.sii', 'eurogoodies', 'eurogoodies', 'fridge', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(182, '/def/vehicle/trailer/krone/fridge/company_paint_job/exomar.sii', 'exomar', 'exomar', 'fridge', 'ets2', 3, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(183, '/def/vehicle/trailer/krone/fridge/company_paint_job/fattoria_f.sii', 'fattoria_f', 'fattoria_f', 'fridge', 'ets2', 3, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(184, '/def/vehicle/trailer/krone/fridge/company_paint_job/fcp.sii', 'fcp', 'fcp', 'fridge', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(185, '/def/vehicle/trailer/krone/fridge/company_paint_job/fle.sii', 'fle', 'fle', 'fridge', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(186, '/def/vehicle/trailer/krone/fridge/company_paint_job/fui.sii', 'fui', 'fui', 'fridge', 'ets2', 3, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(187, '/def/vehicle/trailer/krone/fridge/company_paint_job/globeur.sii', 'globeur', 'globeur', 'fridge', 'ets2', 2, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(188, '/def/vehicle/trailer/krone/fridge/company_paint_job/gnt.sii', 'gnt', 'gnt', 'fridge', 'ets2', 1, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(189, '/def/vehicle/trailer/krone/fridge/company_paint_job/ika_bohag.sii', 'ika_bohag', 'ika_bohag', 'fridge', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(190, '/def/vehicle/trailer/krone/fridge/company_paint_job/itcc.sii', 'itcc', 'itcc', 'fridge', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(191, '/def/vehicle/trailer/krone/fridge/company_paint_job/kaarfor.sii', 'kaarfor', 'kaarfor', 'fridge', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(192, '/def/vehicle/trailer/krone/fridge/company_paint_job/konstnr.sii', 'konstnr', 'konstnr', 'fridge', 'ets2', 1, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(193, '/def/vehicle/trailer/krone/fridge/company_paint_job/libellula.sii', 'libellula', 'libellula', 'fridge', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(194, '/def/vehicle/trailer/krone/fridge/company_paint_job/lisette_log.sii', 'lisette_log', 'lisette_log', 'fridge', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(195, '/def/vehicle/trailer/krone/fridge/company_paint_job/lkwlog.sii', 'lkwlog', 'lkwlog', 'fridge', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(196, '/def/vehicle/trailer/krone/fridge/company_paint_job/nbfc.sii', 'nbfc', 'nbfc', 'fridge', 'ets2', NULL, '2018-07-31 12:18:05', '2018-07-31 12:18:05'),
(197, '/def/vehicle/trailer/krone/fridge/company_paint_job/nord_crown.sii', 'nord_crown', 'nord_crown', 'fridge', 'ets2', 1, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(198, '/def/vehicle/trailer/krone/fridge/company_paint_job/norrsken.sii', 'norrsken', 'norrsken', 'fridge', 'ets2', 1, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(199, '/def/vehicle/trailer/krone/fridge/company_paint_job/nos_pat.sii', 'nos_pat', 'nos_pat', 'fridge', 'ets2', 2, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(200, '/def/vehicle/trailer/krone/fridge/company_paint_job/ns_oil.sii', 'ns_oil', 'ns_oil', 'fridge', 'ets2', 1, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(201, '/def/vehicle/trailer/krone/fridge/company_paint_job/piac.sii', 'piac', 'piac', 'fridge', 'ets2', 3, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(202, '/def/vehicle/trailer/krone/fridge/company_paint_job/polar_fish.sii', 'polar_fish', 'polar_fish', 'fridge', 'ets2', 1, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(203, '/def/vehicle/trailer/krone/fridge/company_paint_job/polarislines.sii', 'polarislines', 'polarislines', 'fridge', 'ets2', 1, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(204, '/def/vehicle/trailer/krone/fridge/company_paint_job/posped.sii', 'posped', 'posped', 'fridge', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(205, '/def/vehicle/trailer/krone/fridge/company_paint_job/pp_chimica.sii', 'pp_chimica', 'pp_chimica', 'fridge', 'ets2', 3, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(206, '/def/vehicle/trailer/krone/fridge/company_paint_job/renar.sii', 'renar', 'renar', 'fridge', 'ets2', 1, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(207, '/def/vehicle/trailer/krone/fridge/company_paint_job/sal.sii', 'sal', 'sal', 'fridge', 'ets2', 3, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(208, '/def/vehicle/trailer/krone/fridge/company_paint_job/sanbuilders.sii', 'sanbuilders', 'sanbuilders', 'fridge', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(209, '/def/vehicle/trailer/krone/fridge/company_paint_job/sellplan.sii', 'sellplan', 'sellplan', 'fridge', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(210, '/def/vehicle/trailer/krone/fridge/company_paint_job/spinelli.sii', 'spinelli', 'spinelli', 'fridge', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(211, '/def/vehicle/trailer/krone/fridge/company_paint_job/stokes.sii', 'stokes', 'stokes', 'fridge', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(212, '/def/vehicle/trailer/krone/fridge/company_paint_job/subse.sii', 'subse', 'subse', 'fridge', 'ets2', 2, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(213, '/def/vehicle/trailer/krone/fridge/company_paint_job/te_logistica.sii', 'te_logistica', 'te_logistica', 'fridge', 'ets2', 3, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(214, '/def/vehicle/trailer/krone/fridge/company_paint_job/tesore_gust.sii', 'tesore_gust', 'tesore_gust', 'fridge', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(215, '/def/vehicle/trailer/krone/fridge/company_paint_job/tradeaux.sii', 'tradeaux', 'tradeaux', 'fridge', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(216, '/def/vehicle/trailer/krone/fridge/company_paint_job/trameri.sii', 'trameri', 'trameri', 'fridge', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(217, '/def/vehicle/trailer/krone/fridge/company_paint_job/transinet.sii', 'transinet', 'transinet', 'fridge', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(218, '/def/vehicle/trailer/krone/fridge/company_paint_job/tras_med.sii', 'tras_med', 'tras_med', 'fridge', 'ets2', 3, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(219, '/def/vehicle/trailer/krone/fridge/company_paint_job/tree_et.sii', 'tree_et', 'tree_et', 'fridge', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(220, '/def/vehicle/trailer/krone/fridge/company_paint_job/vpc.sii', 'vpc', 'vpc', 'fridge', 'ets2', 1, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(221, '/def/vehicle/trailer/krone/fridge/company_paint_job/wgcc.sii', 'wgcc', 'wgcc', 'fridge', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(222, '/def/vehicle/trailer/krone/fridge/company_paint_job/wilnet_trans.sii', 'wilnet_trans', 'wilnet_trans', 'fridge', 'ets2', 2, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(223, '/def/vehicle/trailer/krone/profiliner/company_paint_job/default.sii', 'default', 'default', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(224, '/def/vehicle/trailer/krone/profiliner/company_paint_job/acc.sii', 'acc', 'acc', 'profiliner', 'ets2', 3, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(225, '/def/vehicle/trailer/krone/profiliner/company_paint_job/aci.sii', 'aci', 'aci', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(226, '/def/vehicle/trailer/krone/profiliner/company_paint_job/agronord.sii', 'agronord', 'agronord', 'profiliner', 'ets2', 1, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(227, '/def/vehicle/trailer/krone/profiliner/company_paint_job/aria_food.sii', 'aria_food', 'aria_food', 'profiliner', 'ets2', 1, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(228, '/def/vehicle/trailer/krone/profiliner/company_paint_job/batisse.sii', 'batisse', 'batisse', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(229, '/def/vehicle/trailer/krone/profiliner/company_paint_job/bcp.sii', 'bcp', 'bcp', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(230, '/def/vehicle/trailer/krone/profiliner/company_paint_job/bhb_raffin.sii', 'bhb_raffin', 'bhb_raffin', 'profiliner', 'ets2', 2, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(231, '/def/vehicle/trailer/krone/profiliner/company_paint_job/bjork.sii', 'bjork', 'bjork', 'profiliner', 'ets2', 1, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(232, '/def/vehicle/trailer/krone/profiliner/company_paint_job/boisserie.sii', 'boisserie', 'boisserie', 'profiliner', 'ets2', 2, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(233, '/def/vehicle/trailer/krone/profiliner/company_paint_job/c_navale.sii', 'c_navale', 'c_navale', 'profiliner', 'ets2', 3, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(234, '/def/vehicle/trailer/krone/profiliner/company_paint_job/cargotras.sii', 'cargotras', 'cargotras', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(235, '/def/vehicle/trailer/krone/profiliner/company_paint_job/cesare_smar.sii', 'cesare_smar', 'cesare_smar', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(236, '/def/vehicle/trailer/krone/profiliner/company_paint_job/chimi.sii', 'chimi', 'chimi', 'profiliner', 'ets2', 2, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(237, '/def/vehicle/trailer/krone/profiliner/company_paint_job/cnp.sii', 'cnp', 'cnp', 'profiliner', 'ets2', 3, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(238, '/def/vehicle/trailer/krone/profiliner/company_paint_job/comoto.sii', 'comoto', 'comoto', 'profiliner', 'ets2', 3, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(239, '/def/vehicle/trailer/krone/profiliner/company_paint_job/costruzi.sii', 'costruzi', 'costruzi', 'profiliner', 'ets2', 3, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(240, '/def/vehicle/trailer/krone/profiliner/company_paint_job/costruzi_2.sii', 'costruzi_2', 'costruzi_2', 'profiliner', 'ets2', 3, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(241, '/def/vehicle/trailer/krone/profiliner/company_paint_job/dans_jardin.sii', 'dans_jardin', 'dans_jardin', 'profiliner', 'ets2', 2, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(242, '/def/vehicle/trailer/krone/profiliner/company_paint_job/drekkar.sii', 'drekkar', 'drekkar', 'profiliner', 'ets2', 1, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(243, '/def/vehicle/trailer/krone/profiliner/company_paint_job/eolo_lines.sii', 'eolo_lines', 'eolo_lines', 'profiliner', 'ets2', 3, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(244, '/def/vehicle/trailer/krone/profiliner/company_paint_job/euroacres.sii', 'euroacres', 'euroacres', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(245, '/def/vehicle/trailer/krone/profiliner/company_paint_job/eurogoodies.sii', 'eurogoodies', 'eurogoodies', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(246, '/def/vehicle/trailer/krone/profiliner/company_paint_job/exomar.sii', 'exomar', 'exomar', 'profiliner', 'ets2', 3, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(247, '/def/vehicle/trailer/krone/profiliner/company_paint_job/fattoria_f.sii', 'fattoria_f', 'fattoria_f', 'profiliner', 'ets2', 3, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(248, '/def/vehicle/trailer/krone/profiliner/company_paint_job/fcp.sii', 'fcp', 'fcp', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(249, '/def/vehicle/trailer/krone/profiliner/company_paint_job/fle.sii', 'fle', 'fle', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:06', '2018-07-31 12:18:06'),
(250, '/def/vehicle/trailer/krone/profiliner/company_paint_job/fui.sii', 'fui', 'fui', 'profiliner', 'ets2', 3, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(251, '/def/vehicle/trailer/krone/profiliner/company_paint_job/globeur.sii', 'globeur', 'globeur', 'profiliner', 'ets2', 2, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(252, '/def/vehicle/trailer/krone/profiliner/company_paint_job/gnt.sii', 'gnt', 'gnt', 'profiliner', 'ets2', 1, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(253, '/def/vehicle/trailer/krone/profiliner/company_paint_job/gomme_monde.sii', 'gomme_monde', 'gomme_monde', 'profiliner', 'ets2', 2, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(254, '/def/vehicle/trailer/krone/profiliner/company_paint_job/huilant.sii', 'huilant', 'huilant', 'profiliner', 'ets2', 2, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(255, '/def/vehicle/trailer/krone/profiliner/company_paint_job/ika_bohag.sii', 'ika_bohag', 'ika_bohag', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(256, '/def/vehicle/trailer/krone/profiliner/company_paint_job/itcc.sii', 'itcc', 'itcc', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(257, '/def/vehicle/trailer/krone/profiliner/company_paint_job/kaarfor.sii', 'kaarfor', 'kaarfor', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(258, '/def/vehicle/trailer/krone/profiliner/company_paint_job/konstnr.sii', 'konstnr', 'konstnr', 'profiliner', 'ets2', 1, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(259, '/def/vehicle/trailer/krone/profiliner/company_paint_job/libellula.sii', 'libellula', 'libellula', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(260, '/def/vehicle/trailer/krone/profiliner/company_paint_job/lisette_log.sii', 'lisette_log', 'lisette_log', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(261, '/def/vehicle/trailer/krone/profiliner/company_paint_job/lkwlog.sii', 'lkwlog', 'lkwlog', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(262, '/def/vehicle/trailer/krone/profiliner/company_paint_job/nbfc.sii', 'nbfc', 'nbfc', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(263, '/def/vehicle/trailer/krone/profiliner/company_paint_job/nord_crown.sii', 'nord_crown', 'nord_crown', 'profiliner', 'ets2', 1, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(264, '/def/vehicle/trailer/krone/profiliner/company_paint_job/norr_food.sii', 'norr_food', 'norr_food', 'profiliner', 'ets2', 1, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(265, '/def/vehicle/trailer/krone/profiliner/company_paint_job/norrsken.sii', 'norrsken', 'norrsken', 'profiliner', 'ets2', 1, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(266, '/def/vehicle/trailer/krone/profiliner/company_paint_job/nos_pat.sii', 'nos_pat', 'nos_pat', 'profiliner', 'ets2', 2, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(267, '/def/vehicle/trailer/krone/profiliner/company_paint_job/ns_chem.sii', 'ns_chem', 'ns_chem', 'profiliner', 'ets2', 1, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(268, '/def/vehicle/trailer/krone/profiliner/company_paint_job/ns_oil.sii', 'ns_oil', 'ns_oil', 'profiliner', 'ets2', 1, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(269, '/def/vehicle/trailer/krone/profiliner/company_paint_job/nucleon.sii', 'nucleon', 'nucleon', 'profiliner', 'ets2', 2, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(270, '/def/vehicle/trailer/krone/profiliner/company_paint_job/piac.sii', 'piac', 'piac', 'profiliner', 'ets2', 3, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(271, '/def/vehicle/trailer/krone/profiliner/company_paint_job/polar_fish.sii', 'polar_fish', 'polar_fish', 'profiliner', 'ets2', 1, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(272, '/def/vehicle/trailer/krone/profiliner/company_paint_job/polarislines.sii', 'polarislines', 'polarislines', 'profiliner', 'ets2', 1, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(273, '/def/vehicle/trailer/krone/profiliner/company_paint_job/posped.sii', 'posped', 'posped', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(274, '/def/vehicle/trailer/krone/profiliner/company_paint_job/pp_chimica.sii', 'pp_chimica', 'pp_chimica', 'profiliner', 'ets2', 3, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(275, '/def/vehicle/trailer/krone/profiliner/company_paint_job/renar.sii', 'renar', 'renar', 'profiliner', 'ets2', 1, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(276, '/def/vehicle/trailer/krone/profiliner/company_paint_job/sag_tre.sii', 'sag_tre', 'sag_tre', 'profiliner', 'ets2', 1, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(277, '/def/vehicle/trailer/krone/profiliner/company_paint_job/sal.sii', 'sal', 'sal', 'profiliner', 'ets2', 3, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(278, '/def/vehicle/trailer/krone/profiliner/company_paint_job/sanbuilders.sii', 'sanbuilders', 'sanbuilders', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(279, '/def/vehicle/trailer/krone/profiliner/company_paint_job/scania_fac.sii', 'scania_fac', 'scania_fac', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(280, '/def/vehicle/trailer/krone/profiliner/company_paint_job/sellplan.sii', 'sellplan', 'sellplan', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(281, '/def/vehicle/trailer/krone/profiliner/company_paint_job/skoda.sii', 'skoda', 'skoda', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(282, '/def/vehicle/trailer/krone/profiliner/company_paint_job/spinelli.sii', 'spinelli', 'spinelli', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(283, '/def/vehicle/trailer/krone/profiliner/company_paint_job/stokes.sii', 'stokes', 'stokes', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(284, '/def/vehicle/trailer/krone/profiliner/company_paint_job/subse.sii', 'subse', 'subse', 'profiliner', 'ets2', 2, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(285, '/def/vehicle/trailer/krone/profiliner/company_paint_job/te_logistica.sii', 'te_logistica', 'te_logistica', 'profiliner', 'ets2', 3, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(286, '/def/vehicle/trailer/krone/profiliner/company_paint_job/tesore_gust.sii', 'tesore_gust', 'tesore_gust', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(287, '/def/vehicle/trailer/krone/profiliner/company_paint_job/tradeaux.sii', 'tradeaux', 'tradeaux', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(288, '/def/vehicle/trailer/krone/profiliner/company_paint_job/trameri.sii', 'trameri', 'trameri', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(289, '/def/vehicle/trailer/krone/profiliner/company_paint_job/transinet.sii', 'transinet', 'transinet', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(290, '/def/vehicle/trailer/krone/profiliner/company_paint_job/tras_med.sii', 'tras_med', 'tras_med', 'profiliner', 'ets2', 3, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(291, '/def/vehicle/trailer/krone/profiliner/company_paint_job/tree_et.sii', 'tree_et', 'tree_et', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(292, '/def/vehicle/trailer/krone/profiliner/company_paint_job/vitas_pwr.sii', 'vitas_pwr', 'vitas_pwr', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(293, '/def/vehicle/trailer/krone/profiliner/company_paint_job/voitureux.sii', 'voitureux', 'voitureux', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(294, '/def/vehicle/trailer/krone/profiliner/company_paint_job/volvo_fac.sii', 'volvo_fac', 'volvo_fac', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(295, '/def/vehicle/trailer/krone/profiliner/company_paint_job/vpc.sii', 'vpc', 'vpc', 'profiliner', 'ets2', 1, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(296, '/def/vehicle/trailer/krone/profiliner/company_paint_job/wgcc.sii', 'wgcc', 'wgcc', 'profiliner', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(297, '/def/vehicle/trailer/krone/profiliner/company_paint_job/wilnet_trans.sii', 'wilnet_trans', 'wilnet_trans', 'profiliner', 'ets2', 2, '2018-07-31 12:18:07', '2018-07-31 12:18:07');
INSERT INTO `paints` (`id`, `def`, `alias`, `look`, `chassis`, `game`, `dlc_id`, `created_at`, `updated_at`) VALUES
(298, '/def/vehicle/trailer/krone/profiliner/company_paint_job/default.sii', 'default', 'default', 'proficarrier', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(299, '/def/vehicle/trailer/krone/profiliner/company_paint_job/agronord.sii', 'agronord', 'agronord', 'proficarrier', 'ets2', 1, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(300, '/def/vehicle/trailer/krone/profiliner/company_paint_job/aria_food.sii', 'aria_food', 'aria_food', 'proficarrier', 'ets2', 1, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(301, '/def/vehicle/trailer/krone/profiliner/company_paint_job/bjork.sii', 'bjork', 'bjork', 'proficarrier', 'ets2', 1, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(302, '/def/vehicle/trailer/krone/profiliner/company_paint_job/drekkar.sii', 'drekkar', 'drekkar', 'proficarrier', 'ets2', 1, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(303, '/def/vehicle/trailer/krone/profiliner/company_paint_job/gnt.sii', 'gnt', 'gnt', 'proficarrier', 'ets2', 1, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(304, '/def/vehicle/trailer/krone/profiliner/company_paint_job/ika_bohag.sii', 'ika_bohag', 'ika_bohag', 'proficarrier', 'ets2', NULL, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(305, '/def/vehicle/trailer/krone/profiliner/company_paint_job/konstnr.sii', 'konstnr', 'konstnr', 'proficarrier', 'ets2', 1, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(306, '/def/vehicle/trailer/krone/profiliner/company_paint_job/nord_crown.sii', 'nord_crown', 'nord_crown', 'proficarrier', 'ets2', 1, '2018-07-31 12:18:07', '2018-07-31 12:18:07'),
(307, '/def/vehicle/trailer/krone/profiliner/company_paint_job/norr_food.sii', 'norr_food', 'norr_food', 'proficarrier', 'ets2', 1, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(308, '/def/vehicle/trailer/krone/profiliner/company_paint_job/norrsken.sii', 'norrsken', 'norrsken', 'proficarrier', 'ets2', 1, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(309, '/def/vehicle/trailer/krone/profiliner/company_paint_job/ns_chem.sii', 'ns_chem', 'ns_chem', 'proficarrier', 'ets2', 1, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(310, '/def/vehicle/trailer/krone/profiliner/company_paint_job/ns_oil.sii', 'ns_oil', 'ns_oil', 'proficarrier', 'ets2', 1, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(311, '/def/vehicle/trailer/krone/profiliner/company_paint_job/polar_fish.sii', 'polar_fish', 'polar_fish', 'proficarrier', 'ets2', 1, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(312, '/def/vehicle/trailer/krone/profiliner/company_paint_job/polarislines.sii', 'polarislines', 'polarislines', 'proficarrier', 'ets2', 1, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(313, '/def/vehicle/trailer/krone/profiliner/company_paint_job/renar.sii', 'renar', 'renar', 'proficarrier', 'ets2', 1, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(314, '/def/vehicle/trailer/krone/profiliner/company_paint_job/sag_tre.sii', 'sag_tre', 'sag_tre', 'proficarrier', 'ets2', 1, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(315, '/def/vehicle/trailer/krone/profiliner/company_paint_job/scania_fac.sii', 'scania_fac', 'scania_fac', 'proficarrier', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(316, '/def/vehicle/trailer/krone/profiliner/company_paint_job/vitas_pwr.sii', 'vitas_pwr', 'vitas_pwr', 'proficarrier', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(317, '/def/vehicle/trailer/krone/profiliner/company_paint_job/volvo_fac.sii', 'volvo_fac', 'volvo_fac', 'proficarrier', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(318, '/def/vehicle/trailer/krone/profiliner/company_paint_job/vpc.sii', 'vpc', 'vpc', 'proficarrier', 'ets2', 1, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(319, '/def/vehicle/trailer/livestock/company_paint_job/default.sii', 'default', 'default', 'livestock', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(320, '/def/vehicle/trailer/livestock/company_paint_job/aria_food.sii', 'aria_food', 'aria_food', 'livestock', 'ets2', 1, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(321, '/def/vehicle/trailer/livestock/company_paint_job/nos_pat.sii', 'nos_pat', 'nos_pat', 'livestock', 'ets2', 2, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(322, '/def/vehicle/trailer/schmitz/universal/company_paint_job/default.sii', 'default', 'default', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(323, '/def/vehicle/trailer/schmitz/universal/company_paint_job/acc.sii', 'acc', 'acc', 'schmitz_universal', 'ets2', 3, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(324, '/def/vehicle/trailer/schmitz/universal/company_paint_job/aci.sii', 'aci', 'aci', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(325, '/def/vehicle/trailer/schmitz/universal/company_paint_job/agronord.sii', 'agronord', 'agronord', 'schmitz_universal', 'ets2', 1, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(326, '/def/vehicle/trailer/schmitz/universal/company_paint_job/aria_food.sii', 'aria_food', 'aria_food', 'schmitz_universal', 'ets2', 1, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(327, '/def/vehicle/trailer/schmitz/universal/company_paint_job/batisse.sii', 'batisse', 'batisse', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(328, '/def/vehicle/trailer/schmitz/universal/company_paint_job/bcp.sii', 'bcp', 'bcp', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(329, '/def/vehicle/trailer/schmitz/universal/company_paint_job/bhb_raffin.sii', 'bhb_raffin', 'bhb_raffin', 'schmitz_universal', 'ets2', 2, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(330, '/def/vehicle/trailer/schmitz/universal/company_paint_job/bjork.sii', 'bjork', 'bjork', 'schmitz_universal', 'ets2', 1, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(331, '/def/vehicle/trailer/schmitz/universal/company_paint_job/boisserie.sii', 'boisserie', 'boisserie', 'schmitz_universal', 'ets2', 2, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(332, '/def/vehicle/trailer/schmitz/universal/company_paint_job/c_navale.sii', 'c_navale', 'c_navale', 'schmitz_universal', 'ets2', 3, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(333, '/def/vehicle/trailer/schmitz/universal/company_paint_job/cargotras.sii', 'cargotras', 'cargotras', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(334, '/def/vehicle/trailer/schmitz/universal/company_paint_job/cesare_smar.sii', 'cesare_smar', 'cesare_smar', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(335, '/def/vehicle/trailer/schmitz/universal/company_paint_job/chimi.sii', 'chimi', 'chimi', 'schmitz_universal', 'ets2', 2, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(336, '/def/vehicle/trailer/schmitz/universal/company_paint_job/cnp.sii', 'cnp', 'cnp', 'schmitz_universal', 'ets2', 3, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(337, '/def/vehicle/trailer/schmitz/universal/company_paint_job/comoto.sii', 'comoto', 'comoto', 'schmitz_universal', 'ets2', 3, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(338, '/def/vehicle/trailer/schmitz/universal/company_paint_job/costruzi.sii', 'costruzi', 'costruzi', 'schmitz_universal', 'ets2', 3, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(339, '/def/vehicle/trailer/schmitz/universal/company_paint_job/costruzi_2.sii', 'costruzi_2', 'costruzi_2', 'schmitz_universal', 'ets2', 3, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(340, '/def/vehicle/trailer/schmitz/universal/company_paint_job/dans_jardin.sii', 'dans_jardin', 'dans_jardin', 'schmitz_universal', 'ets2', 2, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(341, '/def/vehicle/trailer/schmitz/universal/company_paint_job/drekkar.sii', 'drekkar', 'drekkar', 'schmitz_universal', 'ets2', 1, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(342, '/def/vehicle/trailer/schmitz/universal/company_paint_job/eolo_lines.sii', 'eolo_lines', 'eolo_lines', 'schmitz_universal', 'ets2', 3, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(343, '/def/vehicle/trailer/schmitz/universal/company_paint_job/euroacres.sii', 'euroacres', 'euroacres', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(344, '/def/vehicle/trailer/schmitz/universal/company_paint_job/eurogoodies.sii', 'eurogoodies', 'eurogoodies', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(345, '/def/vehicle/trailer/schmitz/universal/company_paint_job/exomar.sii', 'exomar', 'exomar', 'schmitz_universal', 'ets2', 3, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(346, '/def/vehicle/trailer/schmitz/universal/company_paint_job/fattoria_f.sii', 'fattoria_f', 'fattoria_f', 'schmitz_universal', 'ets2', 3, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(347, '/def/vehicle/trailer/schmitz/universal/company_paint_job/fcp.sii', 'fcp', 'fcp', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(348, '/def/vehicle/trailer/schmitz/universal/company_paint_job/fle.sii', 'fle', 'fle', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(349, '/def/vehicle/trailer/schmitz/universal/company_paint_job/fui.sii', 'fui', 'fui', 'schmitz_universal', 'ets2', 3, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(350, '/def/vehicle/trailer/schmitz/universal/company_paint_job/globeur.sii', 'globeur', 'globeur', 'schmitz_universal', 'ets2', 2, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(351, '/def/vehicle/trailer/schmitz/universal/company_paint_job/gnt.sii', 'gnt', 'gnt', 'schmitz_universal', 'ets2', 1, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(352, '/def/vehicle/trailer/schmitz/universal/company_paint_job/gomme_monde.sii', 'gomme_monde', 'gomme_monde', 'schmitz_universal', 'ets2', 2, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(353, '/def/vehicle/trailer/schmitz/universal/company_paint_job/huilant.sii', 'huilant', 'huilant', 'schmitz_universal', 'ets2', 2, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(354, '/def/vehicle/trailer/schmitz/universal/company_paint_job/ika_bohag.sii', 'ika_bohag', 'ika_bohag', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(355, '/def/vehicle/trailer/schmitz/universal/company_paint_job/itcc.sii', 'itcc', 'itcc', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(356, '/def/vehicle/trailer/schmitz/universal/company_paint_job/kaarfor.sii', 'kaarfor', 'kaarfor', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(357, '/def/vehicle/trailer/schmitz/universal/company_paint_job/konstnr.sii', 'konstnr', 'konstnr', 'schmitz_universal', 'ets2', 1, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(358, '/def/vehicle/trailer/schmitz/universal/company_paint_job/libellula.sii', 'libellula', 'libellula', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(359, '/def/vehicle/trailer/schmitz/universal/company_paint_job/lisette_log.sii', 'lisette_log', 'lisette_log', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(360, '/def/vehicle/trailer/schmitz/universal/company_paint_job/lkwlog.sii', 'lkwlog', 'lkwlog', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:08', '2018-07-31 12:18:08'),
(361, '/def/vehicle/trailer/schmitz/universal/company_paint_job/nbfc.sii', 'nbfc', 'nbfc', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(362, '/def/vehicle/trailer/schmitz/universal/company_paint_job/nord_crown.sii', 'nord_crown', 'nord_crown', 'schmitz_universal', 'ets2', 1, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(363, '/def/vehicle/trailer/schmitz/universal/company_paint_job/norr_food.sii', 'norr_food', 'norr_food', 'schmitz_universal', 'ets2', 1, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(364, '/def/vehicle/trailer/schmitz/universal/company_paint_job/norrsken.sii', 'norrsken', 'norrsken', 'schmitz_universal', 'ets2', 1, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(365, '/def/vehicle/trailer/schmitz/universal/company_paint_job/nos_pat.sii', 'nos_pat', 'nos_pat', 'schmitz_universal', 'ets2', 2, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(366, '/def/vehicle/trailer/schmitz/universal/company_paint_job/ns_oil.sii', 'ns_oil', 'ns_oil', 'schmitz_universal', 'ets2', 1, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(367, '/def/vehicle/trailer/schmitz/universal/company_paint_job/nucleon.sii', 'nucleon', 'nucleon', 'schmitz_universal', 'ets2', 2, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(368, '/def/vehicle/trailer/schmitz/universal/company_paint_job/piac.sii', 'piac', 'piac', 'schmitz_universal', 'ets2', 3, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(369, '/def/vehicle/trailer/schmitz/universal/company_paint_job/polar_fish.sii', 'polar_fish', 'polar_fish', 'schmitz_universal', 'ets2', 1, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(370, '/def/vehicle/trailer/schmitz/universal/company_paint_job/polarislines.sii', 'polarislines', 'polarislines', 'schmitz_universal', 'ets2', 1, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(371, '/def/vehicle/trailer/schmitz/universal/company_paint_job/posped.sii', 'posped', 'posped', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(372, '/def/vehicle/trailer/schmitz/universal/company_paint_job/pp_chimica.sii', 'pp_chimica', 'pp_chimica', 'schmitz_universal', 'ets2', 3, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(373, '/def/vehicle/trailer/schmitz/universal/company_paint_job/renar.sii', 'renar', 'renar', 'schmitz_universal', 'ets2', 1, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(374, '/def/vehicle/trailer/schmitz/universal/company_paint_job/sag_tre.sii', 'sag_tre', 'sag_tre', 'schmitz_universal', 'ets2', 1, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(375, '/def/vehicle/trailer/schmitz/universal/company_paint_job/sal.sii', 'sal', 'sal', 'schmitz_universal', 'ets2', 3, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(376, '/def/vehicle/trailer/schmitz/universal/company_paint_job/sanbuilders.sii', 'sanbuilders', 'sanbuilders', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(377, '/def/vehicle/trailer/schmitz/universal/company_paint_job/scania_fac.sii', 'scania_fac', 'scania_fac', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(378, '/def/vehicle/trailer/schmitz/universal/company_paint_job/sellplan.sii', 'sellplan', 'sellplan', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(379, '/def/vehicle/trailer/schmitz/universal/company_paint_job/skoda.sii', 'skoda', 'skoda', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(380, '/def/vehicle/trailer/schmitz/universal/company_paint_job/spinelli.sii', 'spinelli', 'spinelli', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(381, '/def/vehicle/trailer/schmitz/universal/company_paint_job/stokes.sii', 'stokes', 'stokes', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(382, '/def/vehicle/trailer/schmitz/universal/company_paint_job/subse.sii', 'subse', 'subse', 'schmitz_universal', 'ets2', 2, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(383, '/def/vehicle/trailer/schmitz/universal/company_paint_job/te_logistica.sii', 'te_logistica', 'te_logistica', 'schmitz_universal', 'ets2', 3, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(384, '/def/vehicle/trailer/schmitz/universal/company_paint_job/tesore_gust.sii', 'tesore_gust', 'tesore_gust', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(385, '/def/vehicle/trailer/schmitz/universal/company_paint_job/tradeaux.sii', 'tradeaux', 'tradeaux', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(386, '/def/vehicle/trailer/schmitz/universal/company_paint_job/trameri.sii', 'trameri', 'trameri', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(387, '/def/vehicle/trailer/schmitz/universal/company_paint_job/transinet.sii', 'transinet', 'transinet', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(388, '/def/vehicle/trailer/schmitz/universal/company_paint_job/tras_med.sii', 'tras_med', 'tras_med', 'schmitz_universal', 'ets2', 3, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(389, '/def/vehicle/trailer/schmitz/universal/company_paint_job/tree_et.sii', 'tree_et', 'tree_et', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(390, '/def/vehicle/trailer/schmitz/universal/company_paint_job/vitas_pwr.sii', 'vitas_pwr', 'vitas_pwr', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(391, '/def/vehicle/trailer/schmitz/universal/company_paint_job/voitureux.sii', 'voitureux', 'voitureux', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(392, '/def/vehicle/trailer/schmitz/universal/company_paint_job/volvo_fac.sii', 'volvo_fac', 'volvo_fac', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(393, '/def/vehicle/trailer/schmitz/universal/company_paint_job/vpc.sii', 'vpc', 'vpc', 'schmitz_universal', 'ets2', 1, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(394, '/def/vehicle/trailer/schmitz/universal/company_paint_job/wgcc.sii', 'wgcc', 'wgcc', 'schmitz_universal', 'ets2', NULL, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(395, '/def/vehicle/trailer/schmitz/universal/company_paint_job/wilnet_trans.sii', 'wilnet_trans', 'wilnet_trans', 'schmitz_universal', 'ets2', 2, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(396, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/default.sii', 'default', 'default', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(397, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/aria_food.sii', 'aria_food', 'aria_food', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(398, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/bcp.sii', 'bcp', 'bcp', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(399, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/bhb_raffin.sii', 'bhb_raffin', 'bhb_raffin', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(400, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/cnp.sii', 'cnp', 'cnp', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(401, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/drekkar.sii', 'drekkar', 'drekkar', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(402, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/euroacres.sii', 'euroacres', 'euroacres', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(403, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/eurogoodies.sii', 'eurogoodies', 'eurogoodies', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(404, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/exomar.sii', 'exomar', 'exomar', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(405, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/fattoria_f.sii', 'fattoria_f', 'fattoria_f', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(406, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/fcp.sii', 'fcp', 'fcp', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(407, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/globeur.sii', 'globeur', 'globeur', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(408, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/gnt.sii', 'gnt', 'gnt', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(409, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/huilant.sii', 'huilant', 'huilant', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(410, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/ika_bohag.sii', 'ika_bohag', 'ika_bohag', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(411, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/itcc.sii', 'itcc', 'itcc', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(412, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/kaarfor.sii', 'kaarfor', 'kaarfor', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(413, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/konstnr.sii', 'konstnr', 'konstnr', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(414, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/lisette_log.sii', 'lisette_log', 'lisette_log', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(415, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/lkwlog.sii', 'lkwlog', 'lkwlog', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(416, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/nbfc.sii', 'nbfc', 'nbfc', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(417, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/norr_food.sii', 'norr_food', 'norr_food', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(418, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/norrsken.sii', 'norrsken', 'norrsken', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:09', '2018-07-31 12:18:09'),
(419, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/nos_pat.sii', 'nos_pat', 'nos_pat', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(420, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/ns_oil.sii', 'ns_oil', 'ns_oil', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(421, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/posped.sii', 'posped', 'posped', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(422, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/pp_chimica.sii', 'pp_chimica', 'pp_chimica', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(423, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/renar.sii', 'renar', 'renar', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(424, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/sanbuilders.sii', 'sanbuilders', 'sanbuilders', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(425, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/sellplan.sii', 'sellplan', 'sellplan', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(426, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/skoda.sii', 'skoda', 'skoda', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(427, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/stokes.sii', 'stokes', 'stokes', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(428, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/te_logistica.sii', 'te_logistica', 'te_logistica', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(429, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/tradeaux.sii', 'tradeaux', 'tradeaux', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(430, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/trameri.sii', 'trameri', 'trameri', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(431, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/transinet.sii', 'transinet', 'transinet', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(432, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/tras_med.sii', 'tras_med', 'tras_med', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(433, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/tree_et.sii', 'tree_et', 'tree_et', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(434, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/wgcc.sii', 'wgcc', 'wgcc', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(435, '/def/vehicle/trailer/schw_cistern_food/company_paint_job/wilnet_trans.sii', 'wilnet_trans', 'wilnet_trans', 'schw_food_cistern', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(436, '/def/vehicle/trailer/schw_curtain/company_paint_job/default.sii', 'default', 'default', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(437, '/def/vehicle/trailer/schw_curtain/custom_paint_job/schw_logo.sii', 'schw_logo', 'empty', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(438, '/def/vehicle/trailer/schw_curtain/company_paint_job/acc.sii', 'acc', 'acc', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(439, '/def/vehicle/trailer/schw_curtain/company_paint_job/aci.sii', 'aci', 'aci', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(440, '/def/vehicle/trailer/schw_curtain/company_paint_job/agronord.sii', 'agronord', 'agronord', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(441, '/def/vehicle/trailer/schw_curtain/company_paint_job/aria_food.sii', 'aria_food', 'aria_food', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(442, '/def/vehicle/trailer/schw_curtain/company_paint_job/batisse.sii', 'batisse', 'batisse', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(443, '/def/vehicle/trailer/schw_curtain/company_paint_job/bcp.sii', 'bcp', 'bcp', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(444, '/def/vehicle/trailer/schw_curtain/company_paint_job/bhb_raffin.sii', 'bhb_raffin', 'bhb_raffin', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(445, '/def/vehicle/trailer/schw_curtain/company_paint_job/bjork.sii', 'bjork', 'bjork', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(446, '/def/vehicle/trailer/schw_curtain/company_paint_job/boisserie.sii', 'boisserie', 'boisserie', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(447, '/def/vehicle/trailer/schw_curtain/company_paint_job/c_navale.sii', 'c_navale', 'c_navale', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(448, '/def/vehicle/trailer/schw_curtain/company_paint_job/cargotras.sii', 'cargotras', 'cargotras', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(449, '/def/vehicle/trailer/schw_curtain/company_paint_job/cesare_smar.sii', 'cesare_smar', 'cesare_smar', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(450, '/def/vehicle/trailer/schw_curtain/company_paint_job/chimi.sii', 'chimi', 'chimi', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(451, '/def/vehicle/trailer/schw_curtain/company_paint_job/cnp.sii', 'cnp', 'cnp', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(452, '/def/vehicle/trailer/schw_curtain/company_paint_job/comoto.sii', 'comoto', 'comoto', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(453, '/def/vehicle/trailer/schw_curtain/company_paint_job/costruzi.sii', 'costruzi', 'costruzi', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(454, '/def/vehicle/trailer/schw_curtain/company_paint_job/costruzi_2.sii', 'costruzi_2', 'costruzi_2', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(455, '/def/vehicle/trailer/schw_curtain/company_paint_job/dans_jardin.sii', 'dans_jardin', 'dans_jardin', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(456, '/def/vehicle/trailer/schw_curtain/company_paint_job/drekkar.sii', 'drekkar', 'drekkar', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(457, '/def/vehicle/trailer/schw_curtain/company_paint_job/eolo_lines.sii', 'eolo_lines', 'eolo_lines', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(458, '/def/vehicle/trailer/schw_curtain/company_paint_job/euroacres.sii', 'euroacres', 'euroacres', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(459, '/def/vehicle/trailer/schw_curtain/company_paint_job/eurogoodies.sii', 'eurogoodies', 'eurogoodies', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(460, '/def/vehicle/trailer/schw_curtain/company_paint_job/exomar.sii', 'exomar', 'exomar', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(461, '/def/vehicle/trailer/schw_curtain/company_paint_job/fattoria_f.sii', 'fattoria_f', 'fattoria_f', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(462, '/def/vehicle/trailer/schw_curtain/company_paint_job/fcp.sii', 'fcp', 'fcp', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(463, '/def/vehicle/trailer/schw_curtain/company_paint_job/fle.sii', 'fle', 'fle', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(464, '/def/vehicle/trailer/schw_curtain/company_paint_job/fui.sii', 'fui', 'fui', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(465, '/def/vehicle/trailer/schw_curtain/company_paint_job/globeur.sii', 'globeur', 'globeur', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(466, '/def/vehicle/trailer/schw_curtain/company_paint_job/gnt.sii', 'gnt', 'gnt', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(467, '/def/vehicle/trailer/schw_curtain/company_paint_job/gomme_monde.sii', 'gomme_monde', 'gomme_monde', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(468, '/def/vehicle/trailer/schw_curtain/company_paint_job/huilant.sii', 'huilant', 'huilant', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(469, '/def/vehicle/trailer/schw_curtain/company_paint_job/ika_bohag.sii', 'ika_bohag', 'ika_bohag', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(470, '/def/vehicle/trailer/schw_curtain/company_paint_job/itcc.sii', 'itcc', 'itcc', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(471, '/def/vehicle/trailer/schw_curtain/company_paint_job/kaarfor.sii', 'kaarfor', 'kaarfor', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(472, '/def/vehicle/trailer/schw_curtain/company_paint_job/konstnr.sii', 'konstnr', 'konstnr', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(473, '/def/vehicle/trailer/schw_curtain/company_paint_job/libellula.sii', 'libellula', 'libellula', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(474, '/def/vehicle/trailer/schw_curtain/company_paint_job/lisette_log.sii', 'lisette_log', 'lisette_log', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:10', '2018-07-31 12:18:10'),
(475, '/def/vehicle/trailer/schw_curtain/company_paint_job/lkwlog.sii', 'lkwlog', 'lkwlog', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(476, '/def/vehicle/trailer/schw_curtain/company_paint_job/nbfc.sii', 'nbfc', 'nbfc', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(477, '/def/vehicle/trailer/schw_curtain/company_paint_job/nord_crown.sii', 'nord_crown', 'nord_crown', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(478, '/def/vehicle/trailer/schw_curtain/company_paint_job/norr_food.sii', 'norr_food', 'norr_food', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(479, '/def/vehicle/trailer/schw_curtain/company_paint_job/norrsken.sii', 'norrsken', 'norrsken', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(480, '/def/vehicle/trailer/schw_curtain/company_paint_job/nos_pat.sii', 'nos_pat', 'nos_pat', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(481, '/def/vehicle/trailer/schw_curtain/company_paint_job/ns_chem.sii', 'ns_chem', 'ns_chem', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(482, '/def/vehicle/trailer/schw_curtain/company_paint_job/ns_oil.sii', 'ns_oil', 'ns_oil', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(483, '/def/vehicle/trailer/schw_curtain/company_paint_job/nucleon.sii', 'nucleon', 'nucleon', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(484, '/def/vehicle/trailer/schw_curtain/company_paint_job/piac.sii', 'piac', 'piac', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(485, '/def/vehicle/trailer/schw_curtain/company_paint_job/polar_fish.sii', 'polar_fish', 'polar_fish', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(486, '/def/vehicle/trailer/schw_curtain/company_paint_job/polarislines.sii', 'polarislines', 'polarislines', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(487, '/def/vehicle/trailer/schw_curtain/company_paint_job/posped.sii', 'posped', 'posped', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(488, '/def/vehicle/trailer/schw_curtain/company_paint_job/pp_chimica.sii', 'pp_chimica', 'pp_chimica', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(489, '/def/vehicle/trailer/schw_curtain/company_paint_job/renar.sii', 'renar', 'renar', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(490, '/def/vehicle/trailer/schw_curtain/company_paint_job/sag_tre.sii', 'sag_tre', 'sag_tre', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(491, '/def/vehicle/trailer/schw_curtain/company_paint_job/sal.sii', 'sal', 'sal', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(492, '/def/vehicle/trailer/schw_curtain/company_paint_job/sanbuilders.sii', 'sanbuilders', 'sanbuilders', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(493, '/def/vehicle/trailer/schw_curtain/company_paint_job/scania_fac.sii', 'scania_fac', 'scania_fac', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(494, '/def/vehicle/trailer/schw_curtain/company_paint_job/sellplan.sii', 'sellplan', 'sellplan', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(495, '/def/vehicle/trailer/schw_curtain/company_paint_job/skoda.sii', 'skoda', 'skoda', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(496, '/def/vehicle/trailer/schw_curtain/company_paint_job/spinelli.sii', 'spinelli', 'spinelli', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(497, '/def/vehicle/trailer/schw_curtain/company_paint_job/stokes.sii', 'stokes', 'stokes', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(498, '/def/vehicle/trailer/schw_curtain/company_paint_job/subse.sii', 'subse', 'subse', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(499, '/def/vehicle/trailer/schw_curtain/company_paint_job/te_logistica.sii', 'te_logistica', 'te_logistica', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(500, '/def/vehicle/trailer/schw_curtain/company_paint_job/tesore_gust.sii', 'tesore_gust', 'tesore_gust', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(501, '/def/vehicle/trailer/schw_curtain/company_paint_job/tradeaux.sii', 'tradeaux', 'tradeaux', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(502, '/def/vehicle/trailer/schw_curtain/company_paint_job/trameri.sii', 'trameri', 'trameri', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(503, '/def/vehicle/trailer/schw_curtain/company_paint_job/transinet.sii', 'transinet', 'transinet', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(504, '/def/vehicle/trailer/schw_curtain/company_paint_job/tras_med.sii', 'tras_med', 'tras_med', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(505, '/def/vehicle/trailer/schw_curtain/company_paint_job/tree_et.sii', 'tree_et', 'tree_et', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(506, '/def/vehicle/trailer/schw_curtain/company_paint_job/vitas_pwr.sii', 'vitas_pwr', 'vitas_pwr', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(507, '/def/vehicle/trailer/schw_curtain/company_paint_job/voitureux.sii', 'voitureux', 'voitureux', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(508, '/def/vehicle/trailer/schw_curtain/company_paint_job/volvo_fac.sii', 'volvo_fac', 'volvo_fac', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(509, '/def/vehicle/trailer/schw_curtain/company_paint_job/vpc.sii', 'vpc', 'vpc', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(510, '/def/vehicle/trailer/schw_curtain/company_paint_job/wgcc.sii', 'wgcc', 'wgcc', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(511, '/def/vehicle/trailer/schw_curtain/company_paint_job/wilnet_trans.sii', 'wilnet_trans', 'wilnet_trans', 'schw_curtain', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(512, '/def/vehicle/trailer/schw_reefer/company_paint_job/default.sii', 'default', 'default', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(513, '/def/vehicle/trailer/schw_reefer/custom_paint_job/schw_logo.sii', 'schw_logo', 'empty', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(514, '/def/vehicle/trailer/schw_reefer/company_paint_job/acc.sii', 'acc', 'acc', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(515, '/def/vehicle/trailer/schw_reefer/company_paint_job/aci.sii', 'aci', 'aci', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(516, '/def/vehicle/trailer/schw_reefer/company_paint_job/aria_food.sii', 'aria_food', 'aria_food', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(517, '/def/vehicle/trailer/schw_reefer/company_paint_job/bcp.sii', 'bcp', 'bcp', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(518, '/def/vehicle/trailer/schw_reefer/company_paint_job/bhb_raffin.sii', 'bhb_raffin', 'bhb_raffin', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(519, '/def/vehicle/trailer/schw_reefer/company_paint_job/c_navale.sii', 'c_navale', 'c_navale', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(520, '/def/vehicle/trailer/schw_reefer/company_paint_job/cargotras.sii', 'cargotras', 'cargotras', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(521, '/def/vehicle/trailer/schw_reefer/company_paint_job/cesare_smar.sii', 'cesare_smar', 'cesare_smar', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(522, '/def/vehicle/trailer/schw_reefer/company_paint_job/cnp.sii', 'cnp', 'cnp', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(523, '/def/vehicle/trailer/schw_reefer/company_paint_job/comoto.sii', 'comoto', 'comoto', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(524, '/def/vehicle/trailer/schw_reefer/company_paint_job/costruzi.sii', 'costruzi', 'costruzi', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(525, '/def/vehicle/trailer/schw_reefer/company_paint_job/costruzi_2.sii', 'costruzi_2', 'costruzi_2', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(526, '/def/vehicle/trailer/schw_reefer/company_paint_job/dans_jardin.sii', 'dans_jardin', 'dans_jardin', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(527, '/def/vehicle/trailer/schw_reefer/company_paint_job/drekkar.sii', 'drekkar', 'drekkar', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(528, '/def/vehicle/trailer/schw_reefer/company_paint_job/eolo_lines.sii', 'eolo_lines', 'eolo_lines', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(529, '/def/vehicle/trailer/schw_reefer/company_paint_job/euroacres.sii', 'euroacres', 'euroacres', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(530, '/def/vehicle/trailer/schw_reefer/company_paint_job/eurogoodies.sii', 'eurogoodies', 'eurogoodies', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(531, '/def/vehicle/trailer/schw_reefer/company_paint_job/exomar.sii', 'exomar', 'exomar', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(532, '/def/vehicle/trailer/schw_reefer/company_paint_job/fattoria_f.sii', 'fattoria_f', 'fattoria_f', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:11', '2018-07-31 12:18:11'),
(533, '/def/vehicle/trailer/schw_reefer/company_paint_job/fle.sii', 'fle', 'fle', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(534, '/def/vehicle/trailer/schw_reefer/company_paint_job/fui.sii', 'fui', 'fui', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(535, '/def/vehicle/trailer/schw_reefer/company_paint_job/globeur.sii', 'globeur', 'globeur', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(536, '/def/vehicle/trailer/schw_reefer/company_paint_job/gnt.sii', 'gnt', 'gnt', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(537, '/def/vehicle/trailer/schw_reefer/company_paint_job/kaarfor.sii', 'kaarfor', 'kaarfor', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(538, '/def/vehicle/trailer/schw_reefer/company_paint_job/libellula.sii', 'libellula', 'libellula', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(539, '/def/vehicle/trailer/schw_reefer/company_paint_job/lisette_log.sii', 'lisette_log', 'lisette_log', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(540, '/def/vehicle/trailer/schw_reefer/company_paint_job/lkwlog.sii', 'lkwlog', 'lkwlog', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(541, '/def/vehicle/trailer/schw_reefer/company_paint_job/nord_crown.sii', 'nord_crown', 'nord_crown', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(542, '/def/vehicle/trailer/schw_reefer/company_paint_job/norr_food.sii', 'norr_food', 'norr_food', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(543, '/def/vehicle/trailer/schw_reefer/company_paint_job/norrsken.sii', 'norrsken', 'norrsken', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(544, '/def/vehicle/trailer/schw_reefer/company_paint_job/nos_pat.sii', 'nos_pat', 'nos_pat', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(545, '/def/vehicle/trailer/schw_reefer/company_paint_job/piac.sii', 'piac', 'piac', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(546, '/def/vehicle/trailer/schw_reefer/company_paint_job/polar_fish.sii', 'polar_fish', 'polar_fish', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(547, '/def/vehicle/trailer/schw_reefer/company_paint_job/polarislines.sii', 'polarislines', 'polarislines', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(548, '/def/vehicle/trailer/schw_reefer/company_paint_job/posped.sii', 'posped', 'posped', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(549, '/def/vehicle/trailer/schw_reefer/company_paint_job/pp_chimica.sii', 'pp_chimica', 'pp_chimica', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(550, '/def/vehicle/trailer/schw_reefer/company_paint_job/renar.sii', 'renar', 'renar', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(551, '/def/vehicle/trailer/schw_reefer/company_paint_job/sal.sii', 'sal', 'sal', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(552, '/def/vehicle/trailer/schw_reefer/company_paint_job/sellplan.sii', 'sellplan', 'sellplan', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(553, '/def/vehicle/trailer/schw_reefer/company_paint_job/spinelli.sii', 'spinelli', 'spinelli', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(554, '/def/vehicle/trailer/schw_reefer/company_paint_job/stokes.sii', 'stokes', 'stokes', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(555, '/def/vehicle/trailer/schw_reefer/company_paint_job/subse.sii', 'subse', 'subse', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(556, '/def/vehicle/trailer/schw_reefer/company_paint_job/te_logistica.sii', 'te_logistica', 'te_logistica', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(557, '/def/vehicle/trailer/schw_reefer/company_paint_job/tesore_gust.sii', 'tesore_gust', 'tesore_gust', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(558, '/def/vehicle/trailer/schw_reefer/company_paint_job/tradeaux.sii', 'tradeaux', 'tradeaux', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(559, '/def/vehicle/trailer/schw_reefer/company_paint_job/trameri.sii', 'trameri', 'trameri', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(560, '/def/vehicle/trailer/schw_reefer/company_paint_job/transinet.sii', 'transinet', 'transinet', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(561, '/def/vehicle/trailer/schw_reefer/company_paint_job/tras_med.sii', 'tras_med', 'tras_med', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(562, '/def/vehicle/trailer/schw_reefer/company_paint_job/wilnet_trans.sii', 'wilnet_trans', 'wilnet_trans', 'schw_reefer', 'ets2', 4, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(563, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/default.sii', 'default', 'default', 'willig_cistern', 'ets2', NULL, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(564, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/bcp.sii', 'bcp', 'bcp', 'willig_cistern', 'ets2', NULL, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(565, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/bhb_raffin.sii', 'bhb_raffin', 'bhb_raffin', 'willig_cistern', 'ets2', 2, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(566, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/cnp.sii', 'cnp', 'cnp', 'willig_cistern', 'ets2', 3, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(567, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/exomar.sii', 'exomar', 'exomar', 'willig_cistern', 'ets2', 3, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(568, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/fattoria_f.sii', 'fattoria_f', 'fattoria_f', 'willig_cistern', 'ets2', 3, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(569, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/fcp.sii', 'fcp', 'fcp', 'willig_cistern', 'ets2', NULL, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(570, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/gnt.sii', 'gnt', 'gnt', 'willig_cistern', 'ets2', 1, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(571, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/itcc.sii', 'itcc', 'itcc', 'willig_cistern', 'ets2', NULL, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(572, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/lkwlog.sii', 'lkwlog', 'lkwlog', 'willig_cistern', 'ets2', NULL, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(573, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/nbfc.sii', 'nbfc', 'nbfc', 'willig_cistern', 'ets2', NULL, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(574, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/ns_oil.sii', 'ns_oil', 'ns_oil', 'willig_cistern', 'ets2', 1, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(575, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/posped.sii', 'posped', 'posped', 'willig_cistern', 'ets2', NULL, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(576, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/pp_chimica.sii', 'pp_chimica', 'pp_chimica', 'willig_cistern', 'ets2', 3, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(577, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/stokes.sii', 'stokes', 'stokes', 'willig_cistern', 'ets2', NULL, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(578, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/te_logistica.sii', 'te_logistica', 'te_logistica', 'willig_cistern', 'ets2', 3, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(579, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/tradeaux.sii', 'tradeaux', 'tradeaux', 'willig_cistern', 'ets2', NULL, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(580, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/trameri.sii', 'trameri', 'trameri', 'willig_cistern', 'ets2', NULL, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(581, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/transinet.sii', 'transinet', 'transinet', 'willig_cistern', 'ets2', NULL, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(582, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/tras_med.sii', 'tras_med', 'tras_med', 'willig_cistern', 'ets2', 3, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(583, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/wgcc.sii', 'wgcc', 'wgcc', 'willig_cistern', 'ets2', NULL, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(584, '/def/vehicle/trailer/willig/fuel_cistern/company_paint_job/wilnet_trans.sii', 'wilnet_trans', 'wilnet_trans', 'willig_cistern', 'ets2', 2, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(585, '/def/vehicle/trailer/acid/company_paint_job/default.sii', 'default', 'default', 'acid', 'ats', NULL, '2018-07-31 12:18:12', '2018-07-31 12:18:12');
INSERT INTO `paints` (`id`, `def`, `alias`, `look`, `chassis`, `game`, `dlc_id`, `created_at`, `updated_at`) VALUES
(586, '/def/vehicle/trailer/acid/company_paint_job/chemso.sii', 'chemso', 'chemso', 'acid', 'ats', NULL, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(587, '/def/vehicle/trailer/acid_long/company_paint_job/default.sii', 'default', 'default', 'acid_long', 'ats', NULL, '2018-07-31 12:18:12', '2018-07-31 12:18:12'),
(588, '/def/vehicle/trailer/acid_long/company_paint_job/chemso.sii', 'chemso', 'chemso', 'acid_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(589, '/def/vehicle/trailer/box/company_paint_job/default.sii', 'default', 'default', 'box', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(590, '/def/vehicle/trailer/box/company_paint_job/bushnell.sii', 'bushnell', 'bushnell', 'box', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(591, '/def/vehicle/trailer/box/company_paint_job/charged.sii', 'charged', 'charged', 'box', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(592, '/def/vehicle/trailer/box/company_paint_job/darchelle.sii', 'darchelle', 'darchelle', 'box', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(593, '/def/vehicle/trailer/box/company_paint_job/print.sii', 'print', 'print', 'box', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(594, '/def/vehicle/trailer/box/company_paint_job/sellgoods.sii', 'sellgoods', 'sellgoods', 'box', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(595, '/def/vehicle/trailer/box/company_paint_job/sunshine.sii', 'sunshine', 'sunshine', 'box', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(596, '/def/vehicle/trailer/box/company_paint_job/wallbert.sii', 'wallbert', 'wallbert', 'box', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(597, '/def/vehicle/trailer/box_long/company_paint_job/default.sii', 'default', 'default', 'box_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(598, '/def/vehicle/trailer/box_long/company_paint_job/bushnell.sii', 'bushnell', 'bushnell', 'box_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(599, '/def/vehicle/trailer/box_long/company_paint_job/charged.sii', 'charged', 'charged', 'box_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(600, '/def/vehicle/trailer/box_long/company_paint_job/darchelle.sii', 'darchelle', 'darchelle', 'box_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(601, '/def/vehicle/trailer/box_long/company_paint_job/print.sii', 'print', 'print', 'box_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(602, '/def/vehicle/trailer/box_long/company_paint_job/sellgoods.sii', 'sellgoods', 'sellgoods', 'box_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(603, '/def/vehicle/trailer/box_long/company_paint_job/sunshine.sii', 'sunshine', 'sunshine', 'box_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(604, '/def/vehicle/trailer/box_long/company_paint_job/wallbert.sii', 'wallbert', 'wallbert', 'box_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(605, '/def/vehicle/trailer/box_wabash/company_paint_job/default.sii', 'default', 'default', 'box_', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(606, '/def/vehicle/trailer/box_wabash/company_paint_job/bushnell.sii', 'bushnell', 'bushnell', 'box_', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(607, '/def/vehicle/trailer/box_wabash/company_paint_job/charged.sii', 'charged', 'charged', 'box_', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(608, '/def/vehicle/trailer/box_wabash/company_paint_job/darchelle.sii', 'darchelle', 'darchelle', 'box_', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(609, '/def/vehicle/trailer/box_wabash/company_paint_job/print.sii', 'print', 'print', 'box_', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(610, '/def/vehicle/trailer/box_wabash/company_paint_job/sellgoods.sii', 'sellgoods', 'sellgoods', 'box_', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(611, '/def/vehicle/trailer/box_wabash/company_paint_job/sunshine.sii', 'sunshine', 'sunshine', 'box_', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(612, '/def/vehicle/trailer/box_wabash/company_paint_job/wallbert.sii', 'wallbert', 'wallbert', 'box_', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(613, '/def/vehicle/trailer/chemical/company_paint_job/default.sii', 'default', 'default', 'chemical', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(614, '/def/vehicle/trailer/chemical/company_paint_job/chemso.sii', 'chemso', 'chemso', 'chemical', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(615, '/def/vehicle/trailer/chemical_long/company_paint_job/default.sii', 'default', 'default', 'chemical_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(616, '/def/vehicle/trailer/chemical_long/company_paint_job/chemso.sii', 'chemso', 'chemso', 'chemical_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(617, '/def/vehicle/trailer/curtain/company_paint_job/default.sii', 'default', 'default', 'curtain', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(618, '/def/vehicle/trailer/curtain/company_paint_job/charged.sii', 'charged', 'charged', 'curtain', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(619, '/def/vehicle/trailer/curtain/company_paint_job/chemso.sii', 'chemso', 'chemso', 'curtain', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(620, '/def/vehicle/trailer/curtain/company_paint_job/coastline.sii', 'coastline', 'coastline', 'curtain', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(621, '/def/vehicle/trailer/curtain/company_paint_job/plaster.sii', 'plaster', 'plaster', 'curtain', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(622, '/def/vehicle/trailer/curtain/company_paint_job/print.sii', 'print', 'print', 'curtain', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(623, '/def/vehicle/trailer/curtain/company_paint_job/sellgoods.sii', 'sellgoods', 'sellgoods', 'curtain', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(624, '/def/vehicle/trailer/curtain/company_paint_job/sunshine.sii', 'sunshine', 'sunshine', 'curtain', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(625, '/def/vehicle/trailer/curtain/company_paint_job/voltison.sii', 'voltison', 'voltison', 'curtain', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(626, '/def/vehicle/trailer/curtain/company_paint_job/wallbert.sii', 'wallbert', 'wallbert', 'curtain', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(627, '/def/vehicle/trailer/curtain_long/company_paint_job/default.sii', 'default', 'default', 'curtain_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(628, '/def/vehicle/trailer/curtain_long/company_paint_job/charged.sii', 'charged', 'charged', 'curtain_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(629, '/def/vehicle/trailer/curtain_long/company_paint_job/chemso.sii', 'chemso', 'chemso', 'curtain_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(630, '/def/vehicle/trailer/curtain_long/company_paint_job/coastline.sii', 'coastline', 'coastline', 'curtain_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(631, '/def/vehicle/trailer/curtain_long/company_paint_job/plaster.sii', 'plaster', 'plaster', 'curtain_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(632, '/def/vehicle/trailer/curtain_long/company_paint_job/print.sii', 'print', 'print', 'curtain_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(633, '/def/vehicle/trailer/curtain_long/company_paint_job/sellgoods.sii', 'sellgoods', 'sellgoods', 'curtain_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(634, '/def/vehicle/trailer/curtain_long/company_paint_job/sunshine.sii', 'sunshine', 'sunshine', 'curtain_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(635, '/def/vehicle/trailer/curtain_long/company_paint_job/voltison.sii', 'voltison', 'voltison', 'curtain_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(636, '/def/vehicle/trailer/curtain_long/company_paint_job/wallbert.sii', 'wallbert', 'wallbert', 'curtain_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(637, '/def/vehicle/trailer/food_tank/company_paint_job/default.sii', 'default', 'default', 'food_tank', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(638, '/def/vehicle/trailer/food_tank/company_paint_job/bushnell.sii', 'bushnell', 'bushnell', 'food_tank', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(639, '/def/vehicle/trailer/food_tank/company_paint_job/global_mills.sii', 'global_mills', 'global_mills', 'food_tank', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(640, '/def/vehicle/trailer/fuel/company_paint_job/default.sii', 'default', 'default', 'fuel', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(641, '/def/vehicle/trailer/fuel/company_paint_job/chemso.sii', 'chemso', 'chemso', 'fuel', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(642, '/def/vehicle/trailer/fuel/company_paint_job/gallon.sii', 'gallon', 'gallon', 'fuel', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(643, '/def/vehicle/trailer/fuel_long/company_paint_job/default.sii', 'default', 'default', 'fuel_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(644, '/def/vehicle/trailer/fuel_long/company_paint_job/chemso.sii', 'chemso', 'chemso', 'fuel_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(645, '/def/vehicle/trailer/fuel_long/company_paint_job/gallon.sii', 'gallon', 'gallon', 'fuel_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(646, '/def/vehicle/trailer/gas/company_paint_job/default.sii', 'default', 'default', 'gas', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(647, '/def/vehicle/trailer/gas/company_paint_job/gallon.sii', 'gallon', 'gallon', 'gas', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(648, '/def/vehicle/trailer/gas_long/company_paint_job/default.sii', 'default', 'default', 'gas_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(649, '/def/vehicle/trailer/gas_long/company_paint_job/gallon.sii', 'gallon', 'gallon', 'gas_long', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(650, '/def/vehicle/trailer/reefer/company_paint_job/default.sii', 'default', 'default', 'reefer', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(651, '/def/vehicle/trailer/reefer/company_paint_job/bushnell.sii', 'bushnell', 'bushnell', 'reefer', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(652, '/def/vehicle/trailer/reefer/company_paint_job/darchelle.sii', 'darchelle', 'darchelle', 'reefer', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(653, '/def/vehicle/trailer/reefer/company_paint_job/sellgoods.sii', 'sellgoods', 'sellgoods', 'reefer', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(654, '/def/vehicle/trailer/reefer/company_paint_job/sunshine.sii', 'sunshine', 'sunshine', 'reefer', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(655, '/def/vehicle/trailer/reefer/company_paint_job/wallbert.sii', 'wallbert', 'wallbert', 'reefer', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(656, '/def/vehicle/trailer/box_wabash/company_paint_job/default.sii', 'default', 'default', 'reefer_', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(657, '/def/vehicle/trailer/box_wabash/company_paint_job/bushnell.sii', 'bushnell', 'bushnell', 'reefer_', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(658, '/def/vehicle/trailer/box_wabash/company_paint_job/darchelle.sii', 'darchelle', 'darchelle', 'reefer_', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(659, '/def/vehicle/trailer/box_wabash/company_paint_job/print.sii', 'print', 'print', 'reefer_', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(660, '/def/vehicle/trailer/box_wabash/company_paint_job/sellgoods.sii', 'sellgoods', 'sellgoods', 'reefer_', 'ats', NULL, '2018-07-31 12:18:13', '2018-07-31 12:18:13'),
(661, '/def/vehicle/trailer/box_wabash/company_paint_job/sunshine.sii', 'sunshine', 'sunshine', 'reefer_', 'ats', NULL, '2018-07-31 12:18:14', '2018-07-31 12:18:14'),
(662, '/def/vehicle/trailer/box_wabash/company_paint_job/wallbert.sii', 'wallbert', 'wallbert', 'reefer_', 'ats', NULL, '2018-07-31 12:18:14', '2018-07-31 12:18:14'),
(663, '/def/vehicle/trailer/reefer3000r/company_paint_job/default.sii', 'default', 'default', 'reefer3000r', 'ats', NULL, '2018-07-31 12:18:14', '2018-07-31 12:18:14'),
(664, '/def/vehicle/trailer/reefer3000r/company_paint_job/bushnell.sii', 'bushnell', 'bushnell', 'reefer3000r', 'ats', NULL, '2018-07-31 12:18:14', '2018-07-31 12:18:14'),
(665, '/def/vehicle/trailer/reefer3000r/company_paint_job/darchelle.sii', 'darchelle', 'darchelle', 'reefer3000r', 'ats', NULL, '2018-07-31 12:18:14', '2018-07-31 12:18:14'),
(666, '/def/vehicle/trailer/reefer3000r/company_paint_job/sellgoods.sii', 'sellgoods', 'sellgoods', 'reefer3000r', 'ats', NULL, '2018-07-31 12:18:14', '2018-07-31 12:18:14'),
(667, '/def/vehicle/trailer/reefer3000r/company_paint_job/sunshine.sii', 'sunshine', 'sunshine', 'reefer3000r', 'ats', NULL, '2018-07-31 12:18:14', '2018-07-31 12:18:14'),
(668, '/def/vehicle/trailer/reefer3000r/company_paint_job/wallbert.sii', 'wallbert', 'wallbert', 'reefer3000r', 'ats', NULL, '2018-07-31 12:18:14', '2018-07-31 12:18:14'),
(669, '/def/vehicle/trailer/reefer3000r_long/company_paint_job/default.sii', 'default', 'default', 'reefer3000r_long', 'ats', NULL, '2018-07-31 12:18:14', '2018-07-31 12:18:14'),
(670, '/def/vehicle/trailer/reefer3000r_long/company_paint_job/bushnell.sii', 'bushnell', 'bushnell', 'reefer3000r_long', 'ats', NULL, '2018-07-31 12:18:14', '2018-07-31 12:18:14'),
(671, '/def/vehicle/trailer/reefer3000r_long/company_paint_job/darchelle.sii', 'darchelle', 'darchelle', 'reefer3000r_long', 'ats', NULL, '2018-07-31 12:18:14', '2018-07-31 12:18:14'),
(672, '/def/vehicle/trailer/reefer3000r_long/company_paint_job/sellgoods.sii', 'sellgoods', 'sellgoods', 'reefer3000r_long', 'ats', NULL, '2018-07-31 12:18:14', '2018-07-31 12:18:14'),
(673, '/def/vehicle/trailer/reefer3000r_long/company_paint_job/sunshine.sii', 'sunshine', 'sunshine', 'reefer3000r_long', 'ats', NULL, '2018-07-31 12:18:14', '2018-07-31 12:18:14'),
(674, '/def/vehicle/trailer/reefer3000r_long/company_paint_job/wallbert.sii', 'wallbert', 'wallbert', 'reefer3000r_long', 'ats', NULL, '2018-07-31 12:18:14', '2018-07-31 12:18:14');

-- --------------------------------------------------------

--
-- Структура таблиці `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `language`, `theme`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Євгеній Зайчук', 'viiper94@gmail.com', '$2y$10$hmIaYHMdsPgWS1qF2tEvQe.soAIUo9FmxqvphjZSywYaEjucTN5K.', '1534489569.jpg', NULL, NULL, 0, 'bcad3pEcPM6rPnzSfwjVhj6an4t7s9e6uadtmOqTU5cJYvEHvYxgtdYeKbA1', '2018-08-08 07:49:04', '2018-08-17 04:07:30');

-- --------------------------------------------------------

--
-- Структура таблиці `wheels`
--

CREATE TABLE `wheels` (
  `id` int(10) UNSIGNED NOT NULL,
  `def` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `game` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ets2',
  `dlc` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `wheels`
--

INSERT INTO `wheels` (`id`, `def`, `alias`, `active`, `game`, `dlc`, `created_at`, `updated_at`) VALUES
(1, '/def/vehicle/t_wheel/single.sii', 'w_single', 1, 'ets2', NULL, '2018-07-31 11:17:10', '2018-07-31 11:17:10'),
(2, '/def/vehicle/t_wheel/385_65_r22_5.sii', 'w_385_65_r22_5', 1, 'ets2', NULL, '2018-07-31 11:17:10', '2018-07-31 11:17:10'),
(3, '/def/vehicle/t_wheel/435_50_r19_5.sii', 'w_435_50_r19_5', 1, 'ets2', NULL, '2018-07-31 11:17:10', '2018-07-31 11:17:10'),
(4, '/def/vehicle/t_wheel/cartrans.sii', 'w_cartrans', 1, 'ets2', NULL, '2018-07-31 11:17:10', '2018-07-31 11:17:10'),
(5, '/def/vehicle/t_wheel/overweight.sii', 'w_overweight', 1, 'ets2', NULL, '2018-07-31 11:17:10', '2018-07-31 11:17:10'),
(6, '/def/vehicle/t_wheel/overweight_f.sii', 'w_overweight_f', 0, 'ets2', NULL, '2018-07-31 11:17:11', '2018-07-31 11:17:11'),
(7, '/def/vehicle/r_wheel/1.dlc_raven.sii', 'w_1.dlc_raven', 0, 'ets2', 9, '2018-07-31 11:17:11', '2018-07-31 11:17:11'),
(8, '/def/vehicle/r_wheel/steel.sii', 'w_steel', 1, 'ets2', NULL, '2018-07-31 11:17:11', '2018-07-31 11:17:11'),
(9, '/def/vehicle/r_wheel/steel_single.sii', 'w_steel_single', 1, 'ets2', NULL, '2018-07-31 11:17:11', '2018-07-31 11:17:11'),
(10, '/def/vehicle/r_wheel/1.sii', 'w_1', 1, 'ets2', NULL, '2018-07-31 11:17:11', '2018-07-31 11:17:11'),
(11, '/def/vehicle/r_wheel/2.sii', 'w_2', 1, 'ets2', NULL, '2018-07-31 11:17:11', '2018-07-31 11:17:11'),
(12, '/def/vehicle/r_wheel/3.sii', 'w_3', 1, 'ets2', NULL, '2018-07-31 11:17:11', '2018-07-31 11:17:11'),
(13, '/def/vehicle/t_wheel/single.sii', 'w_single', 1, 'ats', NULL, '2018-07-31 11:17:11', '2018-07-31 11:17:11'),
(14, '/def/vehicle/t_wheel/single_small.sii', 'w_single_small', 1, 'ats', NULL, '2018-07-31 11:17:11', '2018-07-31 11:17:11'),
(15, '/def/vehicle/t_wheel/front.sii', 'w_front', 1, 'ats', NULL, '2018-07-31 11:17:11', '2018-07-31 11:17:11'),
(16, '/def/vehicle/r_wheel/chrome.sii', 'w_chrome', 1, 'ats', NULL, '2018-07-31 11:17:11', '2018-07-31 11:17:11'),
(17, '/def/vehicle/r_wheel/steel.sii', 'w_steel', 1, 'ats', NULL, '2018-07-31 11:17:11', '2018-07-31 11:17:11');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `chassis`
--
ALTER TABLE `chassis`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `dlc`
--
ALTER TABLE `dlc`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `error_codes`
--
ALTER TABLE `error_codes`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `mods`
--
ALTER TABLE `mods`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `paints`
--
ALTER TABLE `paints`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Індекси таблиці `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Індекси таблиці `wheels`
--
ALTER TABLE `wheels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT для таблиці `chassis`
--
ALTER TABLE `chassis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT для таблиці `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT для таблиці `dlc`
--
ALTER TABLE `dlc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблиці `error_codes`
--
ALTER TABLE `error_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблиці `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблиці `mods`
--
ALTER TABLE `mods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблиці `paints`
--
ALTER TABLE `paints`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=675;
--
-- AUTO_INCREMENT для таблиці `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблиці `wheels`
--
ALTER TABLE `wheels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
