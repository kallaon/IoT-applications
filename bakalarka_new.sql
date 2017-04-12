-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Po 10.Apr 2017, 11:01
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
(2, 1, 1, 'OOOososo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, 1, 'flow1', '2017-03-25 15:39:57', '2017-03-25 15:39:57'),
(5, 4, 3, 'barometer', '2017-03-27 11:24:22', '2017-03-27 11:24:22'),
(6, 4, 2, 'Hyydromer', '2017-03-27 11:29:28', '2017-03-27 11:29:28'),
(7, 4, 2, 'Skuska', '2017-03-27 11:30:43', '2017-03-27 11:30:43'),
(8, 4, 1, 'Termometero', '2017-03-27 11:32:01', '2017-03-27 11:32:01'),
(10, 4, 1, 'sduska2', '2017-03-27 12:11:45', '2017-03-27 12:11:45'),
(11, 11, 1, 'prosim', '2017-04-03 21:32:13', '2017-04-03 21:32:13'),
(12, 11, 3, 'Este', '2017-04-03 21:36:55', '2017-04-03 21:36:55');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `device_value`
--

CREATE TABLE `device_value` (
  `id` int(11) NOT NULL,
  `id_device` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `device_val` decimal(63,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Sťahujem dáta pre tabuľku `device_value`
--

INSERT INTO `device_value` (`id`, `id_device`, `created_at`, `updated_at`, `device_val`) VALUES
(1, 2, '2017-03-25 00:00:00', '0000-00-00 00:00:00', '22'),
(2, 4, '2017-04-04 00:00:00', '0000-00-00 00:00:00', '56'),
(3, 11, '2017-04-04 11:18:54', '2017-04-04 11:18:54', '100'),
(4, 11, '2017-04-07 13:17:51', '2017-04-07 13:17:51', '100'),
(5, 11, '2017-04-07 13:17:59', '2017-04-07 13:17:59', '88'),
(6, 11, '2017-04-07 13:18:01', '2017-04-07 13:18:01', '44'),
(7, 11, '2017-04-07 13:18:03', '2017-04-07 13:18:03', '24'),
(8, 11, '2017-04-07 13:18:05', '2017-04-07 13:18:05', '1'),
(9, 11, '2017-04-07 13:18:06', '2017-04-07 13:18:06', '16'),
(10, 11, '2017-04-07 13:18:08', '2017-04-07 13:18:08', '56'),
(11, 11, '2017-04-07 13:18:10', '2017-04-07 13:18:10', '77'),
(12, 4, '2017-04-13 00:00:00', '2017-04-20 00:00:00', '40'),
(13, 4, '2017-04-12 00:00:00', '2017-04-12 00:00:00', '100'),
(14, 11, '2017-04-10 10:28:10', '2017-04-10 10:28:10', '456'),
(15, 11, '2017-04-10 10:29:08', '2017-04-10 10:29:08', '456888888'),
(16, 11, '2017-04-10 10:33:46', '2017-04-10 10:33:46', '456888888');

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
(4, 'Testerko', 'templogin@androidhive.info', '$2y$10$mA81bzGIBtfXf7ZKL6bVzuo22AQqSCKAlRp9VaILYUew5PJ1nZI6.', '2017-03-24 18:56:55', '2017-03-24 18:56:55', '9979b0c09964176c6505d745a11e61f9'),
(6, 'sdadasd', 'aaas@flow.sk', '$2y$10$PeFcOvfPGKrRo1De0bVSWuPrWJU0H7/QwmViYP/Tc36qbswmat.xC', '2017-04-02 11:32:05', '2017-04-02 11:32:05', '01700512b186dfa2bb92b357e151d2f8'),
(8, 'aaaaaaaaa', 'lloooo@sssl.sk', '$2y$10$O6m92yK8zr3PPSeMAbhR3uJ6CziJ0TsghCChcp92HNp2s5rZbNVGO', '2017-04-02 12:42:25', '2017-04-02 12:42:25', '361a1818f447b72d0fa246752a4c3019'),
(9, 'meno', 'lloooo@sssl.sk', '$2y$10$tSta27aVX1GPWq8Q3bznv.FMR8j9vfzBwaOyiZMTIUcKzOSzfCwNi', '2017-04-02 12:43:30', '2017-04-02 12:43:30', 'd3bd5239de63aa6b82469c2d869124ef'),
(10, 'dnes', 'dnes@dnes.com', '$2y$10$.qdQgc2E3PgQxD26pK/ChOrP1r7Nf9H3YfoNdOuJ6iBfSxJUy/iVK', '2017-04-03 08:49:31', '2017-04-03 08:49:31', '051c97bd4289a9eef0b4f39f2a1231af'),
(11, 'toiste', 'toiste@toiste.com', '$2y$10$sc2ceL5sDycKVvbPQF7bHO2ndapg0.6NuruX21GOy52I85PPM33zK', '2017-04-03 09:37:21', '2017-04-03 19:51:06', '0e25c084bb8a1882be8bf54e842d6c16'),
(12, 'aaaaaa', 'aaaaaaaaaa', 'ddddddddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'aaaaa'),
(13, 'asdasdad', 'asdasda', 'dsad', '2017-04-03 00:00:00', '2017-04-03 00:00:00', 'ada'),
(14, 'aaaaaaaaa', 'bakis@ma.ss', '$2a$10$5ff086b092959c293f1bbuV53JCZK4FwzQoU33OcVlSnwWUstY1u2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '950d5437e1858e2f0c445e3d6b5b9708'),
(15, 'aaaaaaaaas', 'bakias@ma.ss', '$2a$10$8cd91d86b47f4f45c1745eJVjfQhaLiGaU3spjCWV.lTBobPZV9M6', '2017-04-04 10:00:18', '0000-00-00 00:00:00', '9deb8d698846c06d712e30fbbae0fa57'),
(16, 'aaaaaaaaasaaaaaa', 'bakias@mas.ss', '$2a$10$fbe05ac50df089041ecc5uC28XUMBkslAMeqTM3s.C.kVIEZBZXOG', '2017-04-04 10:01:31', '2017-04-04 10:01:31', '309e37d5d03a3c662e19e8bf7fc3ee4c'),
(17, 'aaaaaaaaasaaaaaa', 'bakias@mddas.ss', '$2a$10$e619ee26f44a9621ef381uTSHac0QgkVgB6hcAu0.EwnVvW1Whwlm', '2017-04-04 10:45:44', '2017-04-04 10:45:44', '815a4454f6d4a5e82c9b96800c58a4e3'),
(18, 'aaaaaaaaasaaaaaa', 'bakias@mddas.ss', '$2a$10$9522e6a731b8b2999f467e6M82NUV92PwMW3x9fOkv/F2gGtpsZFy', '2017-04-04 10:54:46', '2017-04-04 10:54:46', 'd0f6a212f8f8305753d8506c1146111c'),
(19, 'aaaaaaaaasaaaaaa', 'bakias@mddas.ss', '$2a$10$42a3f00793947dfc4e477u86AL9LmZ2uW9uaQZYzq9GaVrYhrc3lS', '2017-04-04 10:54:48', '2017-04-04 10:54:48', '6960177e2e445a1ba9826e9faec8a3b3'),
(20, 'aaaaaaaaasaaaaaa', 'bakias@mddas.ss', '$2a$10$15c51cc7e321759b97edfu6CzKlk2VG6dpW3zRwmcTbKwrngaFN.u', '2017-04-04 10:54:50', '2017-04-04 10:54:50', 'b6fae06041c52a33f6c6509b50652622'),
(21, 'aaaaaaaaasaaaaaaa', 'bakias@mddas.ss', '$2a$10$61a8c33e7f234f45cf0c5O6iyEvaDU/xAGsQkzeTx3gobw.d8V/1.', '2017-04-04 10:55:18', '2017-04-04 10:55:18', '6fb592e45339a9277549b86d25e732d7'),
(22, 'email', 'bakiass@mddas.ss', '$2a$10$2bc0b5ed0a0f1b8225d45uDAXz0eWfEglYl4UTnjU/7hiDWbPtDra', '2017-04-04 10:56:33', '2017-04-04 10:56:33', 'c50e6fc0b21707be27c348e87f900671'),
(23, 'hesloje', 'hesloje@hesloje.sk', '$2a$10$9bd1837b80c314cdb8161uNziNW1GuyMu030AX5v3fcXhKYdgc9eW', '2017-04-04 11:13:25', '2017-04-04 11:13:25', '0a2c6659a9d2a3d01dccf9551ed41aee');

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
-- Indexy pre tabuľku `device_value`
--
ALTER TABLE `device_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_device` (`id_device`);

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
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `device`
--
ALTER TABLE `device`
  MODIFY `id_device` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pre tabuľku `device_value`
--
ALTER TABLE `device_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pre tabuľku `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pre tabuľku `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
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
-- Obmedzenie pre tabuľku `device_value`
--
ALTER TABLE `device_value`
  ADD CONSTRAINT `device_value_ibfk_1` FOREIGN KEY (`id_device`) REFERENCES `device` (`id_device`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
