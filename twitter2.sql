-- phpMyAdmin SQL Dump
-- version 4.6.5.2deb1+deb.cihar.com~xenial.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 07 Lut 2017, 10:01
-- Wersja serwera: 5.7.17-0ubuntu0.16.04.1
-- Wersja PHP: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `twitter2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Comments`
--

CREATE TABLE `Comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `text` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Comments`
--

INSERT INTO `Comments` (`id`, `user_id`, `post_id`, `text`, `date`) VALUES
(1, 2, 9, 'Ulalala!', '2017-02-02 12:07:15'),
(4, 2, 9, 'O ja!', '2017-02-02 12:10:28'),
(6, 10, 10, 'Nie!', '2017-02-02 14:00:01'),
(7, 10, 9, 'Mogolia weak! Remove chan!', '2017-02-02 16:04:24'),
(8, 8, 12, 'A co cie to boli leszczu?', '2017-02-02 16:36:15'),
(10, 12, 12, 'Liszka pliszka slepa kiszka :)\r\n', '2017-02-02 21:23:50'),
(11, 12, 16, 'Tiru riru nie ma żwiru.', '2017-02-02 21:27:42'),
(13, 23, 16, 'Czemu masz w avatarze kobiete?', '2017-02-03 18:15:20'),
(14, 10, 18, 'Kamil Szczoch jest lepszy od Ciebie! Deal with it!', '2017-02-03 18:27:12'),
(15, 25, 18, 'Jak się zaczęła pana przygoda z muzyką?', '2017-02-04 17:58:52'),
(16, 25, 19, 'Jakie jest pana hoby?', '2017-02-04 18:00:13');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Messages`
--

CREATE TABLE `Messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `text` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Messages`
--

INSERT INTO `Messages` (`id`, `sender_id`, `reciever_id`, `text`, `date`, `is_read`) VALUES
(1, 8, 2, 'Co jest Mongole?', '2017-02-03 10:29:15', 0),
(2, 12, 10, 'testyTestytesty', '2017-02-03 10:50:43', 1),
(3, 10, 12, 'testyTestytesty', '2017-02-03 10:50:43', 1),
(4, 10, 12, 'testyTestytesty', '2017-02-03 10:50:43', 1),
(5, 12, 10, 'testyTestytesty', '2017-02-03 10:50:43', 1),
(6, 12, 10, 'testyTestytesty', '2017-02-03 10:50:43', 1),
(7, 10, 12, 'testyTestytesty', '2017-02-03 10:50:43', 1),
(8, 12, 10, 'testyTestytesty', '2017-02-03 11:43:01', 1),
(9, 10, 12, 'testyTestytesty', '2017-02-03 11:43:01', 1),
(10, 10, 12, 'testyTestytesty', '2017-02-03 11:43:01', 1),
(356, 10, 12, 'Ziooom', '2017-02-03 14:31:19', 0),
(357, 10, 13, 'Ziomek Co jest?', '2017-02-03 14:49:22', 0),
(358, 10, 13, 'Ty gnoju! Oddawaj moje ciężko zarobione pieniądze na kradzieży samochodów! Z tego maluchu radio było warte 100! Znajdę cię!', '2017-02-03 15:17:40', 0),
(359, 23, 10, 'Jesteś łysy i kradniesz bity!', '2017-02-03 18:12:27', 1),
(360, 10, 23, 'A ty już nei umiesz skakać!', '2017-02-03 18:12:57', 1),
(361, 23, 10, 'Wal się na Ryj!', '2017-02-03 18:13:26', 1),
(362, 23, 13, 'Żyjesz?', '2017-02-03 18:22:02', 0),
(363, 24, 23, 'Kup se kupe', '2017-02-03 19:57:57', 0),
(364, 10, 23, 'E!', '2017-02-03 20:00:28', 0),
(365, 10, 24, 'Co to za dziwne imie ziom?', '2017-02-03 20:01:06', 1),
(366, 24, 10, 'Staropolskie', '2017-02-03 20:01:46', 1),
(367, 10, 25, 'I jak program?', '2017-02-05 15:24:54', 1),
(368, 25, 10, 'Dobhrze! 120% oglądalności!', '2017-02-05 15:26:40', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Tweets`
--

CREATE TABLE `Tweets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(140) COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Tweets`
--

INSERT INTO `Tweets` (`id`, `user_id`, `text`, `date`) VALUES
(9, 2, 'Mogolia Strong!', '2017-02-02 10:46:37'),
(10, 2, 'Kupseklej!', '2017-02-02 12:14:11'),
(11, 10, 'Elo jestem Riczi!', '2017-02-02 13:34:41'),
(12, 10, 'Co się kroi ziomy?', '2017-02-02 15:30:53'),
(14, 12, 'Riki tiki dwa koniki ;)', '2017-02-02 21:20:16'),
(15, 12, 'Buraki ziemniaki dwa slepaki.', '2017-02-02 21:24:34'),
(16, 12, 'Elo zielo skrzelozielo :)', '2017-02-02 21:26:41'),
(17, 13, 'kmvkmkm\r\n', '2017-02-03 08:59:14'),
(18, 23, 'Nikt nie skacze tak jak ja! Trzy kryształowe Kupy!', '2017-02-03 18:26:33'),
(19, 24, 'Jam jest Zbyszko z Bogdańca, do tańca i do różańca :)', '2017-02-03 19:54:36'),
(20, 25, 'He! Dobhra!', '2017-02-04 17:58:20');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `hashed_password` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_polish_ci NOT NULL DEFAULT 'img/default.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `Users`
--

INSERT INTO `Users` (`id`, `username`, `email`, `hashed_password`, `image`) VALUES
(2, 'Mongoł', 'mongo@db.pl', '$2y$10$uLRDIsF87bwU5svKhzCUceaMJJcfe1f.I8EQ/gsxnKZVbJpZsUkfC', 'img/default.jpeg'),
(7, 'lkl', 'dsad', '$2y$10$VzjUOs.Ho0NWAoVFg1evR.Ei7Ws8dZik.84s7CJ3mlA8g3ufR.FJK', 'img/default.jpeg'),
(8, 'Janek', 'mariusz@test.pl', '$2y$10$lb1oDec4jDjLEHoaeFhja.dKo.1fJJwKI7k1/j1OEs9rgETFV21Rm', 'img/default.jpeg'),
(10, 'Riczi Onomatopeja', 'peja@4fun.tv', '$2y$10$vJH.j8mgMKoWK2UoAL4CM./Ul/TG9KZEI6hKMjI4/2RzKOzBPx6iW', 'img/peja.jpg'),
(12, 'Janusz', 'pingodingo@op.pl', '$2y$10$hVAC7J1G96LPwxPjZoSIt.w/YEdWaLSqQKrrvfYXBNneYoWVEGQTe', 'img/ropowicz.jpg'),
(13, 'michal', 'imchal@wp.pl', '$2y$10$Mcyt2EhQ4clumSPNfYRr9uZdVHWGCwWrSrUwJ47Yhw73w2UfcPl3a', 'img/default.jpeg '),
(16, 'Janusz', 'user@wp.pl', '$2y$10$QYoOsV11OtNNJnNhBJk5ieCJnF9a7WBHFAgL6sJVQsvGOhPpRIuBm', 'img/default.jpeg '),
(22, 'Aua', 'aw@wp.pl', '$2y$10$dGlauibDVpjay9.JMkfgROatcyuMwvRTv.Qw6xzKZMw25HeF.7G7.', 'img/strzelba.jpg'),
(23, 'Adam Mariusz', 'am@wp.pl', '$2y$10$Vk7aZpzWT.yVBll.Wnqtmud1jft3feDmBCK4oDGuu4G2ogtIPzf.2', 'img/mariusz.jpg'),
(24, 'Zbyszko', 'ratri_wawa@poczta.onet.pl', '$2y$10$l8aBGCuKPIDdvrCfFs4MBOnW2ZOahkJo6UTViRzZlg7Fqs2uZxlCW', 'img/default.jpeg '),
(25, 'Andrzej Strzelba', 'as@wp.pl', '$2y$10$oeWHpd9YUpNYJNjQzLV3.O1zKpReKmOeHbUCAjhXBHHLFhYFIpVjS', 'img/strzelba.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `reciever_id` (`reciever_id`);

--
-- Indexes for table `Tweets`
--
ALTER TABLE `Tweets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Comments`
--
ALTER TABLE `Comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT dla tabeli `Messages`
--
ALTER TABLE `Messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;
--
-- AUTO_INCREMENT dla tabeli `Tweets`
--
ALTER TABLE `Tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT dla tabeli `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `Comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `Tweets` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `Messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `Messages_ibfk_2` FOREIGN KEY (`reciever_id`) REFERENCES `Users` (`id`);

--
-- Ograniczenia dla tabeli `Tweets`
--
ALTER TABLE `Tweets`
  ADD CONSTRAINT `Tweets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
