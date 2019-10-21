-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2019 at 07:31 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `post_date` text NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`cid`, `pid`, `comment`, `post_date`, `author_id`) VALUES
(413, 66, 'Yeah Michigan almost had them but they couldn\'t come though in the end ðŸ˜£', '03/03/19 08:12:49 pm', 13),
(416, 77, 'Awesome ', '03/03/19 08:27:12 pm', 16),
(436, 77, 'cool', '03/10/19 10:21:20 pm', 13),
(437, 86, 'Welcome Keya!\r\n\r\n', '03/10/19 11:10:10 pm', 17),
(438, 87, 'Hey John Welcome to Blog-IT-Out!', '03/10/19 11:11:39 pm', 13),
(439, 87, 'Welcome John ', '03/10/19 11:15:03 pm', 18),
(444, 94, 'Get back to work ðŸ˜‰', '03/11/19 01:45:43 pm', 16),
(445, 86, 'Thanks John ðŸ˜ƒ', '03/11/19 01:47:00 pm', 16);

-- --------------------------------------------------------

--
-- Table structure for table `blog_likes`
--

CREATE TABLE `blog_likes` (
  `lid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_likes`
--

INSERT INTO `blog_likes` (`lid`, `pid`, `uid`) VALUES
(152, 77, 16),
(184, 77, 17),
(186, 66, 17),
(203, 86, 17),
(252, 87, 13),
(253, 86, 13),
(254, 77, 13),
(257, 94, 16);

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `pid` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` longtext NOT NULL,
  `post_date` text,
  `author_id` int(11) DEFAULT NULL,
  `likes` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`pid`, `title`, `content`, `post_date`, `author_id`, `likes`) VALUES
(66, 'Michigan Losing to State â˜¹ï¸', 'Man what a sucky loss today, but it\'s all good they will get them next year.', '02/24/19 09:03:32 pm  (edited)', 13, 0),
(77, 'Chicken DinnersðŸ” ðŸ½ï¸ ', 'We won 4 chicken dinners tonight in PUBG! ðŸ’ªðŸ¤˜ðŸ”¥', '03/02/19 01:15:24 am (edited)', 13, 0),
(86, 'My First Post ðŸ™Œ', 'Hello World ðŸ˜ƒ', '03/10/19 11:09:21 pm', 16, 0),
(87, 'Whats up!!', 'My name is John and I just Joined the Blog!', '03/10/19 11:10:43 pm', 17, 0),
(94, 'Posting from Work', 'Lunch time ðŸ˜‹', '03/11/19 01:14:35 pm', 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog_users`
--

CREATE TABLE `blog_users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_users`
--

INSERT INTO `blog_users` (`id`, `username`, `email`, `password`, `is_admin`) VALUES
(13, 'tylerbuell', 'tylerjrbuell@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(16, 'keyaruby', 'makeyahoard13@gmail.com', 'b96a1d270be3d462585744000351f768', 0),
(17, 'John Doe', 'Jd@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(18, 'admin', 'admin@admin.com', 'df44dfbf4bdbdb2a389d1c2f024889a4', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `PIDForeignKey` (`pid`) USING BTREE,
  ADD KEY `blog_comments_ibfk_1` (`author_id`);

--
-- Indexes for table `blog_likes`
--
ALTER TABLE `blog_likes`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `blog_likes_ibfk_1` (`pid`),
  ADD KEY `blog_likes_ibfk_2` (`uid`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`pid`) USING BTREE,
  ADD KEY `author_id` (`author_id`) USING BTREE;

--
-- Indexes for table `blog_users`
--
ALTER TABLE `blog_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=446;

--
-- AUTO_INCREMENT for table `blog_likes`
--
ALTER TABLE `blog_likes`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `blog_users`
--
ALTER TABLE `blog_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `PIDForeignKey` FOREIGN KEY (`pid`) REFERENCES `blog_posts` (`pid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `blog_comments_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `blog_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `blog_likes`
--
ALTER TABLE `blog_likes`
  ADD CONSTRAINT `blog_likes_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `blog_posts` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_likes_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `blog_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `UserIDForeignKey` FOREIGN KEY (`author_id`) REFERENCES `blog_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
