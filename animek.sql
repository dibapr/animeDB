-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 08:28 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animek`
--

-- --------------------------------------------------------

--
-- Table structure for table `anime`
--

CREATE TABLE `anime` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `desc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anime`
--

INSERT INTO `anime` (`id`, `image`, `title`, `genre`, `date`, `desc`) VALUES
(2, 'kaguya.jpg', 'Kaguya-sama: Love is War', 'Romance, Comedy', '2019-01-12', 'At the renowned Shuchiin Academy, Miyuki Shirogane and Kaguya Shinomiya are the student body\'s top representatives. Ranked the top student in the nation and respected by peers and mentors alike, Miyuki serves as the student council president. Alongside him, the vice president Kaguya—eldest daughter of the wealthy Shinomiya family—excels in every field imaginable.'),
(3, 'onepiece.jpg', 'One Piece', 'Action', '1999-10-20', 'Gol D. Roger was known as the \"Pirate King,\" the strongest and most infamous being to have sailed the Grand Line. The capture and execution of Roger by the World Government brought a change throughout the world. His last words before his death revealed the existence of the greatest treasure in the world, One Piece.'),
(4, 'sao.jpg', 'Sword Art Online', 'Action', '2012-07-08', 'Kazuto Kirigaya, nicknamed \"Kirito,\" is among the lucky few enthusiasts who get their hands on the first shipment of the game. He logs in to find himself, with ten-thousand others, in the scenic and elaborate world of Aincrad, one full of fantastic medieval weapons and gruesome monsters.'),
(44, '62be8a9b8f27f.jpg', 'Fairy Tail', 'Action, Adventure, Fantasy', '2009-10-12', 'In the enchanted Kingdom of Fiore, the lively Lucy Heartfilia has one wish: to join the renowned Fairy Tail—one of the many magical wizard guilds scattered around the continent. Luckily, a chance encounter with Natsu Dragneel, the &quot;Salamander&quot; of Fairy Tail, whisks her into the legendary guild.\r\n\r\nFrom Natsu&#039;s rivalrous antics with ice wizard Gray Fullbuster to the frightening presence of the unmatched combat goddess Erza Scarlet, Fairy Tail&#039;s powerful mages have a slight penchant for trouble. Through all the lucrative odd jobs and adventures to save the world from destruction lies an absolute and unyielding trust stronger than family that has formed between each guild member.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$eyCTbG4yEGT3epiV63BhT.SMlAU1IbO5D/xr09fNssfVs7FHO2pcW'),
(2, 'diba', '$2y$10$MViA5ah5rkJ3zqgYErkWaeuQfxfFSNw6z3VtrVZvEEY3yY1cXU926'),
(3, 'bayu', '$2y$10$CE1/vhZGyQsqCCKso7Jpsejq4sOfcm2ARVrh05qdEbIweihSlpgom');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anime`
--
ALTER TABLE `anime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
