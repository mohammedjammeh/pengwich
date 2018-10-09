-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2017 at 03:15 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengwich`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `comment` text NOT NULL,
  `dataTime` datetime NOT NULL,
  `mealID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `followerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `followingID` int(11) NOT NULL,
  `dateTime` datetime NOT NULL,
  `userID` int(11) NOT NULL,
  `followerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredientID` int(11) NOT NULL,
  `ingredient` varchar(255) NOT NULL,
  `mealID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE `instructions` (
  `instructionID` int(11) NOT NULL,
  `instruction` varchar(255) NOT NULL,
  `mealID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likeID` int(11) NOT NULL,
  `dateTime` datetime NOT NULL,
  `mealID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mealists`
--

CREATE TABLE `mealists` (
  `mealistID` int(11) NOT NULL,
  `mealistName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `mealID` int(11) NOT NULL,
  `mealFile` varchar(255) NOT NULL,
  `mealTitle` text NOT NULL,
  `dateTime` datetime NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meal_belongs_to`
--

CREATE TABLE `meal_belongs_to` (
  `mealBelongsToID` int(11) NOT NULL,
  `mealID` int(11) NOT NULL,
  `mealistID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notificationID` int(11) NOT NULL,
  `notificationType` enum('like','comment','follow') NOT NULL,
  `notified` set('yes','no') NOT NULL,
  `userID` int(11) NOT NULL,
  `notificationUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  `bio` varchar(250) DEFAULT NULL,
  `profileImg` varchar(32) DEFAULT NULL,
  `backgroundImg` varchar(32) DEFAULT NULL,
  `joined` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `salt`, `name`, `location`, `bio`, `profileImg`, `backgroundImg`, `joined`) VALUES
(22, 'manlikemo', 'a467f1d5c664661039332b47dd9ce1817e58dfe71cfc614ea00e02379e5e2379', 'Ãìw˜Ÿæ¶íIÂàSá¦èËûo;miCŽÃœž›', 'Mohammed Jammeh', 'Kingston Upon Hull', 'You know how we do. Eat good, sleep good and chill good.', '59cf48739931c.jpg', '59cf4873996dd.jpg', '2017-09-13 01:26:35');

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE `users_session` (
  `userSessionID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_session`
--

INSERT INTO `users_session` (`userSessionID`, `userID`, `hash`) VALUES
(8, 22, '0e180303d4e2f10307927b2e5299030bfcfd1a52769438e7b1fb5ae3365322e0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `mealID` (`mealID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`followerID`);

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`followingID`),
  ADD KEY `followerID` (`followerID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredientID`),
  ADD KEY `mealID` (`mealID`);

--
-- Indexes for table `instructions`
--
ALTER TABLE `instructions`
  ADD PRIMARY KEY (`instructionID`),
  ADD KEY `mealID` (`mealID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likeID`),
  ADD KEY `mealID` (`mealID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `mealists`
--
ALTER TABLE `mealists`
  ADD PRIMARY KEY (`mealistID`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`mealID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `meal_belongs_to`
--
ALTER TABLE `meal_belongs_to`
  ADD PRIMARY KEY (`mealBelongsToID`),
  ADD KEY `mealID` (`mealID`),
  ADD KEY `mealistID` (`mealistID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notificationID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`userSessionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `followerID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `following`
--
ALTER TABLE `following`
  MODIFY `followingID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredientID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `instructions`
--
ALTER TABLE `instructions`
  MODIFY `instructionID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mealists`
--
ALTER TABLE `mealists`
  MODIFY `mealistID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `mealID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meal_belongs_to`
--
ALTER TABLE `meal_belongs_to`
  MODIFY `mealBelongsToID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `userSessionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`mealID`) REFERENCES `meals` (`mealID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON UPDATE CASCADE;

--
-- Constraints for table `following`
--
ALTER TABLE `following`
  ADD CONSTRAINT `following_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `following_ibfk_2` FOREIGN KEY (`followerID`) REFERENCES `followers` (`followerID`) ON UPDATE CASCADE;

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`mealID`) REFERENCES `meals` (`mealID`) ON UPDATE CASCADE;

--
-- Constraints for table `instructions`
--
ALTER TABLE `instructions`
  ADD CONSTRAINT `instructions_ibfk_1` FOREIGN KEY (`mealID`) REFERENCES `meals` (`mealID`) ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`mealID`) REFERENCES `meals` (`mealID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON UPDATE CASCADE;

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meals_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON UPDATE CASCADE;

--
-- Constraints for table `meal_belongs_to`
--
ALTER TABLE `meal_belongs_to`
  ADD CONSTRAINT `meal_belongs_to_ibfk_1` FOREIGN KEY (`mealID`) REFERENCES `meals` (`mealID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `meal_belongs_to_ibfk_2` FOREIGN KEY (`mealistID`) REFERENCES `mealists` (`mealistID`) ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
