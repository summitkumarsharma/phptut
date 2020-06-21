-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2020 at 07:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(5) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_description` varchar(200) NOT NULL,
  `category_tstamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `category_tstamp`) VALUES
(1, 'python', 'Python is a powerful programming language. It has efficient high-level data structures and a simple but effective approach to object-oriented programming.', '2020-06-01 17:19:57'),
(2, 'Javascript', 'JavaScript is high-level, often just-in-time compiled, and multi-paradigm', '2020-06-01 17:21:04'),
(3, 'Bootstrap', 'Bootstrap is a free and open-source CSS framework directed at responsive, mobile-first front-end web development.', '2020-06-01 17:22:26'),
(4, 'React', 'React is a JavaScript library for building user interfaces.', '2020-06-01 17:29:48'),
(5, 'PHP', 'PHP is a server scripting language, and a powerful tool for making dynamic and interactive Web pages.', '2020-06-06 00:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(5) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(5) NOT NULL,
  `comment_by` int(5) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(1, 'abc', 1, 1, '2020-06-05 23:11:32'),
(2, 'hhjjj', 1, 2, '2020-06-05 23:36:02'),
(3, 'hhh', 1, 3, '2020-06-05 23:36:58'),
(12, 'kkk', 16, 1, '2020-06-15 23:32:25'),
(13, 'hhhh', 19, 1, '2020-06-15 23:33:48'),
(14, 'jjjjj', 19, 1, '2020-06-15 23:33:56'),
(17, 'uuuu', 27, 1, '2020-06-16 00:25:18'),
(18, 'yyyy', 27, 1, '2020-06-16 00:25:23'),
(19, 'hhhh', 1, 2, '2020-06-16 00:26:36'),
(20, 'hhhh', 1, 2, '2020-06-16 00:27:10'),
(21, 'pppp', 1, 2, '2020-06-16 00:27:22'),
(22, 'yyyy', 1, 2, '2020-06-16 00:27:42'),
(23, 'yyyy', 1, 2, '2020-06-16 01:07:29'),
(24, '&lt;script&gt;hello&lt;/&gt;', 1, 3, '2020-06-16 01:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `contact_idiscuss`
--

CREATE TABLE `contact_idiscuss` (
  `sno` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `msg` text NOT NULL,
  `tstamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_idiscuss`
--

INSERT INTO `contact_idiscuss` (`sno`, `name`, `email`, `phone`, `address`, `msg`, `tstamp`) VALUES
(1, 'sumit', 'sumitkumarsharma06@yahoo.co.in', '989845654', 'mp', 'hi', '2020-06-20 16:22:05'),
(2, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '0', '', '', '2020-06-20 16:25:49'),
(3, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '2147483647', 'QnoD97miners colony', 'test message', '2020-06-20 16:31:24'),
(4, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '2147483647', 'QnoD97miners colony', 'hello', '2020-06-20 16:34:04'),
(5, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '2147483647', 'QnoD97miners colony', 'hi', '2020-06-20 16:35:09'),
(6, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '2147483647', 'QnoD97miners colony', 'kk', '2020-06-20 16:36:44'),
(7, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '2147483647', 'QnoD97miners colony', 'kk', '2020-06-20 16:37:29'),
(8, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '2147483647', 'QnoD97miners colony', 'kk', '2020-06-20 16:38:32'),
(9, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '2147483647', 'QnoD97miners colony', 'll', '2020-06-20 16:38:47'),
(10, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '9993036710', 'QnoD97miners colony', 'hello', '2020-06-20 16:40:03'),
(11, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '9993036710', 'QnoD97miners colony', 'hello', '2020-06-20 16:44:05'),
(12, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '9993036710', 'QnoD97miners colony', 'testing msg', '2020-06-21 15:20:18'),
(13, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '9993036710', 'QnoD97miners colony', 'testing msg', '2020-06-21 15:21:09'),
(14, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '9993036710', 'QnoD97miners colony', 'test2', '2020-06-21 15:21:20'),
(15, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '9993036710', 'QnoD97miners colony', 'test3', '2020-06-21 15:23:45'),
(16, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '9993036710', 'QnoD97miners colony', 'test44', '2020-06-21 15:24:59'),
(17, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '9993036710', 'QnoD97miners colony', 'ttty', '2020-06-21 15:28:12'),
(18, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '9993036710', 'QnoD97miners colony', 'testttt', '2020-06-21 15:33:02'),
(19, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '9993036710', 'QnoD97miners colony', 'testttt', '2020-06-21 15:34:59'),
(20, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '9993036710', 'QnoD97miners colony', 'testttt', '2020-06-21 15:35:28'),
(21, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '9993036710', 'QnoD97miners colony', 'testttt', '2020-06-21 15:36:12'),
(22, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '9993036710', 'QnoD97miners colony', 'testtt5', '2020-06-21 15:38:22'),
(26, 'Sumit Sharma', 'summitkumarsharma@gmail.com', '9993036710', 'QnoD97miners colony', 'testing msg', '2020-06-21 15:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(10) NOT NULL,
  `thread_title` varchar(200) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(10) NOT NULL,
  `thread_user_id` int(10) NOT NULL,
  `thread_tstamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `thread_tstamp`) VALUES
(1, 'Unable to install PyAudio', 'I am Unable to install PyAudio in my pc.', 1, 1, '2020-06-01 20:01:22'),
(3, 'nnnn', 'bbbbbb', 1, 2, '2020-06-04 00:37:01'),
(4, 'nnnn', 'thread_desc', 1, 3, '2020-06-04 00:43:37'),
(17, 'jjj', 'jjjj', 2, 1, '2020-06-15 23:31:58'),
(18, 'hhh', 'jjj', 2, 1, '2020-06-15 23:32:18'),
(19, 'jjjj', 'kkk', 1, 1, '2020-06-15 23:33:38'),
(27, 'Submit Article', 'kkk', 1, 1, '2020-06-16 00:24:00'),
(28, 'Lets Learn Django', 'start from  basic', 1, 2, '2020-06-16 00:26:16'),
(29, '', '&lt;&gt;', 1, 3, '2020-06-16 01:36:56'),
(30, 'java', '&lt;&gt;', 1, 3, '2020-06-16 01:37:29'),
(31, 'lets learn django', 'lets start', 1, 1, '2020-06-21 21:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `users_idiscuss`
--

CREATE TABLE `users_idiscuss` (
  `sno` int(8) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(200) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_idiscuss`
--

INSERT INTO `users_idiscuss` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES
(1, 'abc@gmail.com', '$2y$10$jVNdn0Byn/XIgNgsVs1thO2OTt7wOQ.oDSuAG06siQecBnuhkY/Ka', '2020-06-15 23:27:27'),
(2, 'summitkumarsharma@gmail.com', '$2y$10$.fJfN4u/RjoQUOWJU98.f.w0PseZpa5GidjFQViKZ0ZLQcpFrRypq', '2020-06-12 22:29:52'),
(3, 'a@g.com', '$2y$10$sGHHprFprUtfkETbZ9HRluL0cNc4o7pwYzxIyiH4vMJb569af6QzS', '2020-06-12 22:31:40'),
(5, 'a@bb.com', '$2y$10$0yzsAwIXNaK8WzYdr6y9q.mIvePjf1r.DK0Qi2uaAjtWxWaaP0B3e', '2020-06-12 22:32:54'),
(6, 'b@g.com', '$2y$10$XkjY1e3QAUKcxLsyeRgRquSKZb8a1gSvjmUiTKAZ7PkAIJVKQh9da', '2020-06-12 22:43:11'),
(7, 'cc@g.com', '$2y$10$ArN/qj3yTyyOBSCs7uay3O.EsCY6UdOvcKKSjF5WfayWM0l7yJB4m', '2020-06-12 22:47:43'),
(8, 'hh@g.com', '$2y$10$5DYy9EXHoE2Llf1RH7LZwu9uoN/ZPqVhsd5HIueJWJAFgsiIX82BK', '2020-06-12 23:02:25'),
(9, 'uu@g.com', '$2y$10$cf6Dm96QOpRdiQXuY9T/juslzdY16SSq84LJnl/NQmBDgmuaMWI0C', '2020-06-12 23:03:08'),
(10, 'gg@hh.com', '$2y$10$N2BlcabxtJBiOwgOU3lRfeBRfyhVtwwC9.Ztj4q0PbUUjqHiAXWve', '2020-06-12 23:15:38'),
(11, 'ggg@g.com', '$2y$10$qVw3hvORwsvs9uqvtLYYE.8UbSmRVXqVUFOupKFq7yAPtDE1jabBe', '2020-06-12 23:25:10'),
(12, 'zz@g.com', '$2y$10$zkkKR13qoBzBsyzriGN4ZeeR1UtijIFzg3jmq5yDsV7zUe4CB3hEm', '2020-06-13 00:02:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact_idiscuss`
--
ALTER TABLE `contact_idiscuss`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users_idiscuss`
--
ALTER TABLE `users_idiscuss`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contact_idiscuss`
--
ALTER TABLE `contact_idiscuss`
  MODIFY `sno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users_idiscuss`
--
ALTER TABLE `users_idiscuss`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
