-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2019 at 12:14 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccoulter12`
--

-- --------------------------------------------------------

--
-- Table structure for table `WD_Products`
--

CREATE TABLE `WD_Products` (
  `id` int(11) NOT NULL,
  `Product_type_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `Information` varchar(500) NOT NULL,
  `path` varchar(255) NOT NULL,
  `published` date NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `WD_Products`
--

INSERT INTO `WD_Products` (`id`, `Product_type_id`, `description`, `Information`, `path`, `published`, `price`, `userid`) VALUES
(30, 2, 'Cork Top MTF', 'Nice jersey worn a handful of times', '62cork.jpeg', '2019-03-25', '25.00', 21),
(31, 4, 'Armagh Half Socks', 'Half Socks never worn. Excellent condition.', '318armagh.jpeg', '2019-03-25', '5.00', 21),
(33, 3, 'Down GAA 2019 Shorts', 'Nice shorts, selling because I have 2 pairs.', '361down.jpg', '2019-03-25', '4.00', 22),
(34, 1, 'Kilkenny Goalkeeper Jersey', 'Kilkenny Senior Keeper Jersey. Small Player Fit. Number 1. ', '975kilk.jpeg', '2019-03-25', '25.00', 22),
(35, 5, 'Karakal Grips', 'Karakal Superhurling grips for sale. DUO colours available.', '660grip.jpg', '2019-03-25', '3.50', 23),
(36, 1, 'Armagh Home Jersey ', 'Lovely jersey only worn a few times. Excellent condition. ', '669armaghhome.jpg', '2019-03-25', '30.00', 23),
(37, 1, 'Limerick Home Jersey', 'Lovely jersey only worn a few times. Excellent condition. ', '865limtop.jpeg', '2019-03-25', '35.00', 24);

-- --------------------------------------------------------

--
-- Table structure for table `WD_Product_Type`
--

CREATE TABLE `WD_Product_Type` (
  `id` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `WD_Product_Type`
--

INSERT INTO `WD_Product_Type` (`id`, `Type`) VALUES
(1, 'Jersey'),
(2, 'Training Top'),
(3, 'Shorts'),
(4, 'Socks'),
(5, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `WD_RatingType`
--

CREATE TABLE `WD_RatingType` (
  `RTID` int(11) NOT NULL,
  `RateingType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `WD_RatingType`
--

INSERT INTO `WD_RatingType` (`RTID`, `RateingType`) VALUES
(1, 'Bad'),
(2, 'Medium'),
(3, 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `WD_Review`
--

CREATE TABLE `WD_Review` (
  `ReviewID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BuyAgain` varchar(255) NOT NULL,
  `SendTime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `WD_Review`
--

INSERT INTO `WD_Review` (`ReviewID`, `UserID`, `BuyAgain`, `SendTime`) VALUES
(19, 22, 'Yea', 'Probably'),
(20, 22, 'No ', 'Bad john '),
(21, 24, 'Yes good timing!', 'Definitely');

-- --------------------------------------------------------

--
-- Table structure for table `WD_USERS`
--

CREATE TABLE `WD_USERS` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `UserType` int(11) DEFAULT NULL,
  `pw` varchar(255) NOT NULL,
  `socialmedia` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(255) NOT NULL,
  `profileimg` varchar(255) DEFAULT NULL,
  `school` varchar(1255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `WD_USERS`
--

INSERT INTO `WD_USERS` (`id`, `user`, `UserType`, `pw`, `socialmedia`, `email`, `phone`, `profileimg`, `school`) VALUES
(18, 'Julie', NULL, 'horse123', 'https://www.facebook.com/julie_black', 'julieeblaack@outlook.com', 123456789, '237', 'Queens'),
(21, 'CormacCoulter', 1, 'ballygalget', 'https://www.facebook.com/cormac.coulter', 'cormaccoulter@hotmail.com', 7730222923, '33cmacprofile.jpeg', 'Queens Belfast '),
(22, 'John', NULL, 'password1', 'https://www.facebook.com/John', 'john@email.com', 773355544, '920man1.jpg', 'Queens '),
(23, 'Eileen McCraedy', NULL, 'jonny123', '', 'eileen@email.com', 455337900, '76', 'St Pats '),
(24, 'Paul Coulter', NULL, 'ballygalget', '', 'paulfcoulter@yahoo.com', 7730223212, '902paulpic.jpg', 'St Pats Ballynahinch');

-- --------------------------------------------------------

--
-- Table structure for table `WD_UserType`
--

CREATE TABLE `WD_UserType` (
  `id` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `WD_UserType`
--

INSERT INTO `WD_UserType` (`id`, `Type`) VALUES
(1, 'Admin'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `WD_Products`
--
ALTER TABLE `WD_Products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserID_FK` (`userid`),
  ADD KEY `ProductType_ID_FK` (`Product_type_id`);

--
-- Indexes for table `WD_Product_Type`
--
ALTER TABLE `WD_Product_Type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `WD_RatingType`
--
ALTER TABLE `WD_RatingType`
  ADD PRIMARY KEY (`RTID`);

--
-- Indexes for table `WD_Review`
--
ALTER TABLE `WD_Review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `FK_USERRATE` (`UserID`);

--
-- Indexes for table `WD_USERS`
--
ALTER TABLE `WD_USERS`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_UserType` (`UserType`);

--
-- Indexes for table `WD_UserType`
--
ALTER TABLE `WD_UserType`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `WD_Products`
--
ALTER TABLE `WD_Products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `WD_Product_Type`
--
ALTER TABLE `WD_Product_Type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `WD_RatingType`
--
ALTER TABLE `WD_RatingType`
  MODIFY `RTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `WD_Review`
--
ALTER TABLE `WD_Review`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `WD_USERS`
--
ALTER TABLE `WD_USERS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `WD_UserType`
--
ALTER TABLE `WD_UserType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `WD_Products`
--
ALTER TABLE `WD_Products`
  ADD CONSTRAINT `ProductType_ID_FK` FOREIGN KEY (`Product_type_id`) REFERENCES `WD_Product_Type` (`id`),
  ADD CONSTRAINT `UserID_FK` FOREIGN KEY (`userid`) REFERENCES `WD_USERS` (`id`);

--
-- Constraints for table `WD_Review`
--
ALTER TABLE `WD_Review`
  ADD CONSTRAINT `FK_USERRATE` FOREIGN KEY (`UserID`) REFERENCES `WD_USERS` (`id`);

--
-- Constraints for table `WD_USERS`
--
ALTER TABLE `WD_USERS`
  ADD CONSTRAINT `FK_UserType` FOREIGN KEY (`UserType`) REFERENCES `WD_UserType` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
