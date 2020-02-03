-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 03, 2020 at 06:11 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `posted_time` datetime NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `posted_time`, `project_id`, `user_id`) VALUES
(69, '123', '2020-01-24 20:57:56', 21, 8),
(70, '123', '2020-01-24 20:57:57', 21, 8),
(71, '123', '2020-01-24 20:57:57', 21, 8),
(72, '123', '2020-01-24 20:57:58', 21, 8),
(73, '123', '2020-01-24 20:57:58', 21, 8),
(74, '123', '2020-01-24 20:57:58', 21, 8),
(75, '123', '2020-01-24 21:01:17', 21, 8),
(76, '123', '2020-01-24 21:01:35', 21, 8),
(77, '456', '2020-01-24 21:06:26', 21, 8),
(78, '12', '2020-01-24 21:11:20', 21, 8),
(79, '123', '2020-01-24 21:13:03', 21, 8),
(80, '123', '2020-01-24 21:13:04', 21, 8),
(81, '123', '2020-01-24 21:13:04', 21, 8),
(82, '123', '2020-01-24 21:13:04', 21, 8),
(83, '123', '2020-01-24 21:13:05', 21, 8),
(84, '12', '2020-01-24 21:13:05', 21, 8),
(85, '123', '2020-01-24 21:13:05', 21, 8),
(86, '123', '2020-01-24 21:13:05', 21, 8),
(87, '123', '2020-01-24 21:21:23', 21, 8),
(88, 'spidey', '2020-01-24 21:24:59', 19, 8),
(89, 'hay', '2020-01-24 21:36:38', 21, 8),
(90, 'wow relaly', '2020-01-24 21:36:46', 19, 8),
(91, 'thats awesome', '2020-01-24 21:36:50', 19, 8),
(92, 'ya man', '2020-01-24 21:36:52', 19, 8),
(93, 'jesus', '2020-01-24 21:36:53', 19, 8),
(94, 'wow wtf', '2020-01-24 21:36:54', 19, 8),
(95, 'to many comments', '2020-01-24 21:36:59', 19, 8),
(96, 'hi', '2020-01-24 21:38:58', 19, 8),
(97, ';;lll', '2020-01-24 21:40:18', 19, 8),
(98, 'kkokok', '2020-01-24 21:40:45', 19, 8),
(99, 'lol', '2020-01-24 22:14:10', 19, 8),
(100, '123', '2020-01-24 22:26:06', 21, 8),
(101, '2312312', '2020-01-24 22:26:25', 19, 8),
(102, 'hi', '2020-01-24 22:27:28', 19, 8),
(103, '123', '2020-01-24 22:27:56', 19, 8),
(104, '12312', '2020-01-24 22:28:06', 21, 8),
(105, 'test', '2020-01-24 22:28:38', 21, 8),
(106, 'wwe', '2020-01-24 22:29:14', 19, 8),
(107, '123', '2020-01-26 23:57:46', 21, 9),
(108, '123', '2020-01-27 00:01:52', 21, 9),
(109, 'Wow cool bionicle!', '2020-01-28 03:48:38', 23, 9),
(110, 'thats a good looking toa', '2020-01-29 22:34:31', 31, 14),
(111, 'wow', '2020-02-01 20:35:57', 34, 17);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `file_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loves`
--

CREATE TABLE `loves` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loves`
--

INSERT INTO `loves` (`id`, `user_id`, `project_id`) VALUES
(5, 8, 15),
(28, 8, 19),
(36, 8, 21),
(38, 9, 19),
(40, 9, 21),
(42, 9, 22),
(44, 9, 23),
(45, 9, 24),
(46, 10, 26),
(47, 14, 29),
(48, 14, 31),
(49, 15, 29),
(51, 16, 33),
(52, 16, 32),
(53, 16, 31),
(54, 16, 30),
(55, 16, 29),
(56, 16, 28),
(69, 16, 34),
(106, 17, 33),
(119, 17, 28),
(120, 17, 34);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date_uploaded` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `date_uploaded`, `user_id`, `file_url`) VALUES
(28, '123', '123', '2020-01-29 21:09:10', 12, '/uploads/12/1580332150parker.png'),
(29, 'asd', 'asd', '2020-01-29 21:21:48', 13, '/uploads/13/1580332908altair.jpg'),
(30, 'sdasd', 'sadas', '2020-01-29 22:03:42', 14, '/uploads/14/1580335422Screen Shot 2019-10-23 at 10.53.24 AM.png'),
(31, 'tahu', 'tata', '2020-01-29 22:04:02', 14, '/uploads/14/1580335442tumblr_inline_p9rgmsyNQS1rlgus1_540.gif'),
(32, '123', '123', '2020-01-29 22:33:40', 14, '/uploads/14/1580337220Screen Shot 2019-10-28 at 10.48.06 AM.png'),
(33, 'test', 'test', '2020-01-30 04:06:49', 15, '/uploads/15/1580357209Screen Shot 2019-10-23 at 10.53.24 AM.png'),
(34, 'the leaf', 'whats beneath the leaf?', '2020-01-30 22:55:15', 16, '/uploads/16/1580424915Screen Shot 2019-11-20 at 1.06.13 PM.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bio` text,
  `profile_pic` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `firstname`, `lastname`, `password`, `bio`, `profile_pic`) VALUES
(12, 'zxc', 'zxc@gmail.ca', 'zxc', 'zxc', '$2y$10$IBGND8.sYOBgvW5nisPoHereiWl5RYvKrUzkbrPbEfrfMQu5uvZ0C', 'zxc', '/uploads/12/1580331820parker.png'),
(13, 'asd', 'asd@gmail.ca', 'asd', 'asd', '$2y$10$NTEFvsw55GjVVsC29cmeR.GpO3Ia4cHlRY2kwspysaW9nZ28enCWa', 'asd', NULL),
(14, '123', '123@gmail.ca', '123', '123', '$2y$10$.xzquotYGpv2TkMEfl/vLuSq7jPZlVZe.nBi.97JkCpfRHzbRba7O', '123', '/uploads/14/1580335381Screen Shot 2019-11-20 at 1.06.13 PM.png'),
(15, '321', '321@gmail.ca', '321', '3213', '$2y$10$mnvAIFOINE.YHMY0yufP6uKAESIOcUp9vyAnQoBJ3z7QXhIqRCFpK', '121', NULL),
(16, 'bam', 'bam@gmail.ca', 'bam', 'bambi', '$2y$10$ELw5euh88.h9l7UpCZ1tguJPickEPVAb/u5VLCoNOEaedMPG4IKgi', 'bambi got shot', '/uploads/16/1580497967Parker.jpg'),
(17, 'lkj', 'lkj@lkj.ca', 'lkj', 'lkj', '$2y$10$82mShIugWyyDnSCpFhiBNONveloulC.bW.O/6GUgeZbxsrNdivfme', 'lkj', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loves`
--
ALTER TABLE `loves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loves`
--
ALTER TABLE `loves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
