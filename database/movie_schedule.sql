-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 07:17 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `widget_crop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, '1234', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `menu_name` text NOT NULL,
  `position` int(3) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `content` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `subject_id`, `menu_name`, `position`, `visible`, `content`) VALUES
(20, 1, 'Warcraft', 1, 1, 'Warcraft: The Beginning (2016)\r\n\r\nStoryline:\r\n\r\nThe peaceful realm of Azeroth stands on the brink of war as its civilization faces a fearsome race of invaders: orc warriors fleeing their dying home to colonize another. As a portal opens to connect the two worlds, one army faces destruction and the other faces extinction. From opposing sides, two heroes are set on a collision course that will decide the fate of their family, their people, and their home.\r\n\r\nDirector : Duncan Jones\r\nWriters  : Duncan Jones (screenplay), Charles Leavitt (screenplay)\r\nStars    : Travis Fimmel, Paula Patton, Ben Foster'),
(39, 2, 'The Legend of Tarzan', 7, 1, 'The Legend of Tarzan (2016)'),
(48, 2, 'Coming Soon', 8, 1, 'light out'),
(41, 2, 'Suicide Squad', 9, 1, 'Suicide Squad (2016)'),
(42, 2, 'Fantastic Beasts and Where to Find Them', 10, 1, 'Fantastic Beasts and Where to Find Them (2016)'),
(31, 1, 'Captain America 3 Civil War', 5, 1, 'Captain America 3 : Civil War (2016)'),
(32, 1, 'Boishommo', 6, 1, 'Boishommo (2016)'),
(33, 1, 'The Angry Birds', 7, 1, 'The Angry Birds (2016)'),
(34, 1, 'X-Men Apocalypse', 8, 1, 'X-Men: Apocalypse (2016)'),
(37, 2, 'The Conjuring 2', 5, 1, 'The Conjuring 2 (2016)'),
(38, 2, 'Warcraft', 6, 1, 'Warcraft (2016)'),
(22, 1, 'The Jungle Book', 2, 1, 'The Jungle Book (2016)\r\n\r\nStoryline :\r\n\r\nThe man-cub Mowgli flees the jungle after a threat from the tiger Shere Khan. Guided by Bagheera the panther and the bear Baloo, Mowgli embarks on a journey of self-discovery, though he also meets creatures who don\'t have his best interests at heart.\r\n\r\nDirector : Jon Favreau\r\nWriters  : Justin Marks (screenplay), Rudyard Kipling (book)\r\nStars    : Neel Sethi, Bill Murray, Ben Kingsley \r\n'),
(23, 1, 'Now You See Me 2', 3, 1, 'Now You See Me 2 (2016)\r\n\r\nStoryline :'),
(24, 1, 'The Conjuring 2', 4, 1, 'The Conjuring 2 (2016)'),
(26, 2, 'The Peanuts Movie', 1, 1, 'The Peanuts Movie (2016)'),
(36, 2, 'Independence Day Resurgence', 4, 1, 'Independence Day: Resurgence (2016)'),
(35, 2, 'Ice Age Collision Course', 3, 1, 'Ice Age: Collision Course (2016)'),
(30, 2, 'Finding Dory', 2, 1, 'Finding Dory (2016)'),
(43, 45, 'dghdhdd', 1, 1, 'ttttttttttttttttttttttttttttttttttttttttttttttttt'),
(44, 1, 'Raya', 1, 1, 'yuaefuawfuwagfuifuiui'),
(45, 1, 'Warcraft', 9, 1, 'uasfgaugfwefui'),
(46, 47, 'Forest', 1, 1, 'okay done'),
(47, 1, 'The Angry Birds', 3, 1, 'oyftyupodpyyu'),
(50, 2, 'Spider Man', 9, 0, 'Spider Man 2021\r\n# No Way Home'),
(51, 2, 'No Way Home', 1, 1, 'No Way Home');

-- --------------------------------------------------------

--
-- Table structure for table `showtime`
--

CREATE TABLE `showtime` (
  `id` int(11) NOT NULL,
  `show_date` date NOT NULL,
  `name` text NOT NULL,
  `catagory` text NOT NULL,
  `morning` time DEFAULT NULL,
  `midday` time DEFAULT NULL,
  `evening` time DEFAULT NULL,
  `matinee` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `showtime`
--

INSERT INTO `showtime` (`id`, `show_date`, `name`, `catagory`, `morning`, `midday`, `evening`, `matinee`) VALUES
(15, '2020-06-21', 'Warcraft', '3D-Premium', '11:20:00', '14:00:00', '00:00:00', '19:30:00'),
(14, '2020-06-20', 'Warcraft', '3D-Premium', '11:20:00', '14:00:00', '00:00:00', '19:30:00'),
(13, '2020-06-20', 'The Angry Birds', '3D-Regular', '11:00:00', '00:00:00', '00:00:00', '19:30:00'),
(12, '2020-06-19', 'Now You See Me 2', '2D-Regular', '00:00:00', '00:00:00', '00:00:00', '19:20:00'),
(10, '2020-06-19', 'Captain America 3 Civil War', '3D-Regular', '13:10:00', '00:00:00', '00:00:00', '00:00:00'),
(9, '2020-06-19', 'The Conjuring 2', '2D-Regular', '10:50:00', '13:40:00', '00:00:00', '19:10:00'),
(16, '2020-06-21', 'The Angry Birds', '3D-Regular', '11:00:00', '00:00:00', '00:00:00', '19:30:00'),
(17, '2020-06-21', 'Captain America 3 Civil War', '3D-Regular', '13:10:00', '00:00:00', '00:00:00', '00:00:00'),
(18, '2016-06-21', 'The Conjuring 2', '2D-Regular', '10:50:00', '13:40:00', '00:00:00', '19:10:00'),
(19, '2020-06-21', 'Now You See Me 2', '2D-Regular', '00:00:00', '00:00:00', '00:00:00', '19:20:00'),
(20, '2016-06-22', 'Warcraft', '3D-Premium', '11:20:00', '14:00:00', '00:00:00', '19:30:00'),
(21, '2020-06-20', 'The Jungle Book', '3D-VIP', '00:00:00', '00:00:00', '00:00:00', '19:30:00'),
(22, '2016-06-21', 'The Jungle Book', '3D-VIP', '00:00:00', '00:00:00', '00:00:00', '19:30:00'),
(23, '2016-06-22', '19:30:00', '3D-VIP', '00:00:00', '00:00:00', '00:00:00', '19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(30) NOT NULL,
  `position` int(3) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `menu_name`, `position`, `visible`) VALUES
(1, 'Now Showing', 1, 1),
(2, 'Coming Soon', 2, 1),
(47, '2 weeks later', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `catagory` text NOT NULL,
  `seat` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`catagory`, `seat`, `price`) VALUES
('2D', 'Regular', 200),
('2D', 'Premium', 250),
('3D', 'Regular', 350),
('3D', 'Premium', 400),
('2D', 'VIP-Regular', 500),
('2D', 'VIP-Premium', 700),
('3D', 'VIP-Regular', 600),
('3D', 'VIP-Premium', 800),
('2D', 'STAR-Regular', 350),
('2D', 'STAR-Premium', 450),
('3D', 'STAR-Regular', 400),
('3D', 'STAR-Premium', 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `showtime`
--
ALTER TABLE `showtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `showtime`
--
ALTER TABLE `showtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
