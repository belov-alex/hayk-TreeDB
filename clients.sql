-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2017 at 04:02 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hayk`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `user_id` int(11) NOT NULL,
  `referral_id` int(11) DEFAULT '0',
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` datetime DEFAULT NULL,
  `last_update` datetime NOT NULL,
  `client_paid` bigint(20) DEFAULT NULL,
  `referred_clients` int(11) DEFAULT '0',
  `referred_amount` bigint(20) DEFAULT NULL,
  `bonus_points` int(11) NOT NULL,
  `comments` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`user_id`, `referral_id`, `first_name`, `last_name`, `telephone`, `email`, `reg_date`, `last_update`, `client_paid`, `referred_clients`, `referred_amount`, `bonus_points`, `comments`) VALUES
(1, 0, 'John', 'Doe', '+49030-12345612', 'john@example.com', '2017-10-08 00:00:00', '2017-10-18 11:24:57', 666, 13, NULL, 0, 'no comments'),
(6, 0, 'Alex', 'Belov', '+49030-12345874', 'fftt@gmail.com', '2017-10-12 12:44:26', '2017-10-18 11:18:59', 333, 2, NULL, 0, 'Â¯(Â°_o)/Â¯'),
(7, 1, 'Gary', 'Webb', '+49030-12345814', 'webb@daylight.com', '2017-10-13 12:50:47', '2017-10-13 12:50:47', 500, 12, NULL, 1, ''),
(8, 0, 'Bill', 'Gray', '+49030-12345444', '15@34.ce', '2017-10-13 13:37:07', '2017-10-18 11:22:11', 200, 0, NULL, 0, 'comm'),
(9, 0, 'Lux', 'Luminous', '+49030-12345611', 'lux@riot.de', '2017-10-13 13:37:53', '2017-10-18 11:23:52', 234, 2, NULL, 0, 'let there be light'),
(10, 7, 'Nicola', 'Tesla', '+49030-12345678', 'tesla@moon.org', '2017-10-17 11:48:05', '2017-10-17 11:48:05', 500, 0, NULL, 0, 'no comments'),
(11, 7, 'Veigar', 'Graybeard', '+49030-12345678', 'veigar@riot.de', '2017-10-17 12:07:08', '2017-10-17 12:48:18', 100, 0, NULL, 0, ''),
(12, 7, 'Pavlov', 'Ivan', '+49030-12348765', 'pavlov@home.ru', '2017-10-18 11:15:56', '2017-10-18 11:15:56', 300, 1, NULL, 0, 'a lot of comments'),
(17, 7, 'Ahri', 'Nine-Tailed', '+49030-12345615', 'ahri@riot.de', '2017-10-18 14:58:54', '2017-10-18 14:58:54', 100, 6, NULL, 0, 'referred clients increment testing'),
(22, 7, 'Lissandra', 'Icewitch', '+49030-12345616', 'lissandra@riot.de', '2017-10-18 16:15:58', '2017-10-18 16:15:58', 100, 0, NULL, 0, ''),
(23, 17, 'Karthus', 'Deathsinger', '+49030-12345617', 'karthus@riot.de', '2017-10-24 09:16:39', '2017-10-24 09:16:39', 100, 5, NULL, 0, 'https://www.mobafire.com/league-of-legends/champion/karthus-21'),
(24, 23, 'Twisted Fate', 'Cardmaster', '+49030-12345618', 'twisted_fate@riot.de', '2017-10-24 09:22:33', '2017-10-24 09:22:33', 100, 0, NULL, 0, ''),
(25, 23, 'Zilean', 'Chronokeeper', '+49030-12345619', 'zilean@riot.de', '2017-10-24 09:34:13', '2017-10-24 09:34:13', 100, 1, NULL, 0, ''),
(26, 23, 'Aurelion Sol', 'Star Forger', '+49030-12345620', 'sol@riot.de', '2017-10-24 09:37:00', '2017-10-24 09:37:00', 100, 0, NULL, 0, ''),
(27, 23, 'Karma', 'Enlightened', '+49030-12345621', 'karma@riot.de', '2017-10-24 09:45:39', '2017-10-24 09:45:39', 100, 0, NULL, 0, ''),
(28, 9, 'Soraka', 'Starchild', '+49030-12345622', 'soraka@riot.de', '2017-10-24 09:49:07', '2017-10-24 09:49:07', 100, 0, NULL, 0, ''),
(29, 9, 'Velkoz', 'Voideye', '+49030-12345623', 'velkoz@riot.de', '2017-10-24 10:02:47', '2017-10-24 10:02:47', 100, 0, NULL, 0, ''),
(30, 12, 'Max', 'Multireferall', '+49030-12345624', 'max@multimax.de', '2017-10-24 10:06:50', '2017-10-24 10:06:50', 100, 0, NULL, 0, ''),
(31, 25, 'Maurice', 'Multireferall', '+49030-12345625', 'mau@multimaurice.de', '2017-10-24 10:12:09', '2017-10-24 10:12:09', 200, 0, NULL, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
