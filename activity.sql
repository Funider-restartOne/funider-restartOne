-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jun 16, 2017 at 11:08 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `activity`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `id_users_activity` int(11) NOT NULL,
  `type_of_activity` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `activity_date` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `meeting_address` varchar(255) NOT NULL,
  `Postcode` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `id_users_activity`, `type_of_activity`, `title`, `activity_date`, `start_time`, `end_time`, `meeting_address`, `Postcode`, `Description`, `created_at`, `updated_at`) VALUES
(39, 20, 'football', 'new game', '2017-12-12', '12:12', '12:12', 'here', '1231qw', 'fuck', '2017-05-26 16:24:49', '2017-05-26 16:24:49'),
(40, 19, 'basketball', 'new one', '1212-12-12', '12:12', '12:12', 'here', '1231qw', 'let''s go', '2017-05-26 16:28:45', '2017-05-26 16:28:45'),
(41, 19, 'running', 'asvdsc', '1212-12-12', '12:12', '12:12', '1212', '1212', 'sdcwcDescription here...', '2017-05-27 03:11:44', '2017-05-27 03:11:44'),
(42, 20, 'running', 'sometitle', '1212-12-12', '12:12', '12:12', 'afbjkq12`', 'kwjbdfkb`', 'Description here...', '2017-06-08 17:26:47', '2017-06-08 17:26:47'),
(43, 19, 'football', 'last game', '2222-02-11', '12:12', '12:12', 'hazendijk121', '3079 pg', 'this is the last game', '2017-06-15 23:27:39', '2017-06-15 23:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `chat` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `chat`, `created_at`, `updated_at`, `users_id`) VALUES
(1, 'hello', '2017-06-12 02:38:02', '2017-06-12 02:38:02', 19),
(2, 'hello there', '2017-06-12 02:40:53', '2017-06-12 02:40:53', 19),
(3, 'hello there !', '2017-06-12 02:41:29', '2017-06-12 02:41:29', 19),
(4, 'fuck', '2017-06-12 02:48:05', '2017-06-12 02:48:05', 19),
(5, 'hello', '2017-06-12 12:06:36', '2017-06-12 12:06:36', 19),
(6, 'now', '2017-06-12 12:17:46', '2017-06-12 12:17:46', 20),
(7, 'fuck', '2017-06-12 17:53:56', '2017-06-12 17:53:56', 19),
(8, 'fuck', '2017-06-12 17:54:45', '2017-06-12 17:54:45', 19),
(9, 'sdafa', '2017-06-12 17:54:57', '2017-06-12 17:54:57', 19),
(11, 'hello 1', '2017-06-12 22:28:10', '2017-06-12 22:28:10', 19),
(12, 'bye 1', '2017-06-16 16:18:44', '2017-06-16 16:18:44', 19),
(13, 'ok', '2017-06-16 18:16:20', '2017-06-16 18:16:20', 19),
(14, 'why', '2017-06-16 18:16:42', '2017-06-16 18:16:42', 19),
(15, 'cool', '2017-06-16 18:27:50', '2017-06-16 18:27:50', 19),
(16, 'now', '2017-06-16 18:40:05', '2017-06-16 18:40:05', 19),
(17, 'ok', '2017-06-16 19:30:16', '2017-06-16 19:30:16', 19),
(18, 'well done 11', '2017-06-16 19:37:03', '2017-06-16 19:37:03', 19),
(19, 'seems good', '2017-06-16 21:39:00', '2017-06-16 21:39:00', 20);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_c` int(11) NOT NULL,
  `messages_id` int(11) NOT NULL,
  `users_messages_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_c`, `messages_id`, `users_messages_id`, `comment`, `created_at`, `updated_at`) VALUES
(19, 12, 19, 'anas''s first comment update', '2017-05-25 15:44:38', '2017-05-25 15:45:02'),
(22, 13, 20, 'hello this is a new comment for you guys', '2017-06-08 16:38:15', '2017-06-08 16:38:15'),
(25, 16, 19, 'comment', '2017-06-15 23:06:45', '2017-06-15 23:06:45'),
(29, 16, 19, 'hello', '2017-06-15 23:15:49', '2017-06-15 23:15:49'),
(30, 17, 19, 'hi', '2017-06-16 01:22:04', '2017-06-16 01:22:04'),
(31, 17, 19, 'hello there', '2017-06-16 01:22:19', '2017-06-16 01:22:19'),
(32, 17, 19, 'we are awsome', '2017-06-16 03:45:07', '2017-06-16 03:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `users_id`, `title`, `message`, `created_at`, `updated_at`) VALUES
(12, 19, 'anas''s title update', 'anas''s post update', '2017-05-25 15:43:21', '2017-05-25 15:44:17'),
(13, 19, 'nbdvsad', 'hgfjhdgf', '2017-06-08 14:43:11', '2017-06-08 14:43:11'),
(16, 19, 'this is the last title', 'this is the last message', '2017-06-11 17:56:48', '2017-06-11 17:56:48'),
(17, 19, 'this is the last one', 'this is the last one', '2017-06-15 23:17:52', '2017-06-16 03:43:46'),
(18, 19, 'with love', 'bye', '2017-06-16 03:50:41', '2017-06-16 03:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `Participants`
--

CREATE TABLE `Participants` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `activity_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Participants`
--

INSERT INTO `Participants` (`id`, `user_id`, `activity_id`) VALUES
(26, '19', 41),
(39, '20', 40),
(41, '20', 41),
(42, '20', 42),
(43, '20', 39),
(44, '19', 39);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `post_code`, `email`, `password`, `created_at`, `updated_at`) VALUES
(19, 'anas', 'alrz', '3079 PG', 'anas@alrz.com', '123123123', '2017-05-25 15:42:52', '2017-05-25 15:42:52'),
(20, 'ana', 'anos', '1231qw', 'ana@anas.com', '123123123', '2017-05-26 03:54:27', '2017-05-26 03:54:27'),
(21, 'fred', 'fred', '1233qw', 'fred@fred.com', '123123123', '2017-06-16 00:14:52', '2017-06-16 00:14:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users_activity` (`id_users_activity`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_c`),
  ADD KEY `messages_id` (`messages_id`),
  ADD KEY `users_messages_id` (`users_messages_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `Participants`
--
ALTER TABLE `Participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `Participants`
--
ALTER TABLE `Participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`id_users_activity`) REFERENCES `users` (`id`);

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`messages_id`) REFERENCES `messages` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`users_messages_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
