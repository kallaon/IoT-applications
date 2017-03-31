-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Pi 31.Mar 2017, 12:53
-- Verzia serveru: 10.1.21-MariaDB
-- Verzia PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `bakalarka`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `device`
--

CREATE TABLE `device` (
  `id_device` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `device_name` varchar(32) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Sťahujem dáta pre tabuľku `device`
--

INSERT INTO `device` (`id_device`, `user_id`, `id_type`, `device_name`, `updated_at`, `created_at`) VALUES
(2, 1, 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, 1, 'flow1', '2017-03-25 15:39:57', '2017-03-25 15:39:57'),
(5, 4, 3, 'barometer', '2017-03-27 11:24:22', '2017-03-27 11:24:22'),
(6, 4, 2, 'Hyydromer', '2017-03-27 11:29:28', '2017-03-27 11:29:28'),
(7, 4, 2, 'Skuska', '2017-03-27 11:30:43', '2017-03-27 11:30:43'),
(8, 4, 1, 'Termometero', '2017-03-27 11:32:01', '2017-03-27 11:32:01'),
(10, 4, 1, 'sduska2', '2017-03-27 12:11:45', '2017-03-27 12:11:45');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `device_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Sťahujem dáta pre tabuľku `type`
--

INSERT INTO `type` (`id_type`, `device_name`) VALUES
(1, 'thermometer'),
(2, 'hygrometer'),
(3, 'barometer');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `api_key` varchar(32) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=COMPACT;

--
-- Sťahujem dáta pre tabuľku `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `api_key`) VALUES
(1, 'meno', 'lloooo@sssl.sk', '$2y$10$8iYKvPUlNRq2LSQU1jnRme41oWBrZ16O1G8BbmcAESTSoJPH.p81S', '2017-03-22 17:19:51', '2017-03-22 17:21:34', '84fa661ed3b0a6c8cd0bdb8f8919ae27'),
(2, 'heslo', 'ssssssss@sss.sk', '$2y$10$s3k15eRlIUtEIqR6wh6TB.mxj1UXXNvVmHf7z1660kory9LXf2eGu', '2017-03-24 14:57:27', '2017-03-24 14:57:27', '4ed9652a7576a11db691e79ebe803ae4'),
(3, 'heslo', 'dsadasdas@sdasd.sk', '$2y$10$/8V8GL24ZPIlsZ9qSLu82ORecvnDHLFreIxSJMwwR6kV1S9QfbS1m', '2017-03-24 18:20:05', '2017-03-24 18:20:05', '84a36d26fda4834a97a49f2bb768692a'),
(4, 'Testerko', 'templogin@androidhive.info', '$2y$10$mA81bzGIBtfXf7ZKL6bVzuo22AQqSCKAlRp9VaILYUew5PJ1nZI6.', '2017-03-24 18:56:55', '2017-03-24 18:56:55', '9979b0c09964176c6505d745a11e61f9');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `values`
--

CREATE TABLE `values` (
  `id` int(11) NOT NULL,
  `id_device` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `device_value` decimal(63,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sťahujem dáta pre tabuľku `values`
--

INSERT INTO `values` (`id`, `id_device`, `created_at`, `device_value`) VALUES
(1, 2, '2017-03-25 00:00:00', '22');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id_device`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `id_type` (`id_type`);

--
-- Indexy pre tabuľku `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexy pre tabuľku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `values`
--
ALTER TABLE `values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_device` (`id_device`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `device`
--
ALTER TABLE `device`
  MODIFY `id_device` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pre tabuľku `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pre tabuľku `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pre tabuľku `values`
--
ALTER TABLE `values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `id_type` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Obmedzenie pre tabuľku `values`
--
ALTER TABLE `values`
  ADD CONSTRAINT `values_ibfk_1` FOREIGN KEY (`id_device`) REFERENCES `device` (`id_device`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
