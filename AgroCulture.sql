-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2024 at 10:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AgroCulture`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogdata`
--

CREATE TABLE `blogdata` (
  `blogId` int(10) NOT NULL,
  `blogUser` varchar(256) NOT NULL,
  `blogTitle` varchar(256) NOT NULL,
  `blogContent` longtext NOT NULL,
  `blogTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `likes` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blogdata`
--

INSERT INTO `blogdata` (`blogId`, `blogUser`, `blogTitle`, `blogContent`, `blogTime`, `likes`) VALUES
(19, 'ThePhenom', 'First Blog', '<p>Its Awesome website<img alt=\"wink\" src=\"https://cdn.ckeditor.com/4.8.0/full/plugins/smiley/images/wink_smile.png\" style=\"height:23px; width:23px\" title=\"wink\" /></p>\r\n', '2018-02-25 13:09:41', 2),
(20, 'supriyo18', 'abcs', '', '2024-04-26 18:39:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blogfeedback`
--

CREATE TABLE `blogfeedback` (
  `blogId` int(10) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `commentUser` varchar(256) NOT NULL,
  `commentPic` varchar(256) NOT NULL DEFAULT 'profile0.png',
  `commentTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blogfeedback`
--

INSERT INTO `blogfeedback` (`blogId`, `comment`, `commentUser`, `commentPic`, `commentTime`) VALUES
(19, 'Mast yarr', 'ThePhenom', 'profile0.png', '2018-02-25 13:09:54'),
(19, 'great', 'supriyo18', 'profile0.png', '2024-04-26 18:39:03'),
(20, 'why', 'supriyo18', 'profile0.png', '2024-04-26 18:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `bid` int(100) NOT NULL,
  `bname` varchar(100) NOT NULL,
  `busername` varchar(100) NOT NULL,
  `bpassword` varchar(100) NOT NULL,
  `bhash` varchar(100) NOT NULL,
  `bemail` varchar(100) NOT NULL,
  `bmobile` varchar(100) NOT NULL,
  `baddress` text NOT NULL,
  `bactive` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`bid`, `bname`, `busername`, `bpassword`, `bhash`, `bemail`, `bmobile`, `baddress`, `bactive`) VALUES
(7, 'bipasha', 'bipasha', '$2y$10$6al5TapcM2py9s8dj.miS.IUiCQJ/PvSiGRv1w2oRZ74hENmiaQRu', 'd6c651ddcd97183b2e40bc464231c962', 'bip@gmail.com', '4567896512', 'balurghat', 0),
(9, 'Parthiv', 'parthiv', '$2y$10$tRv5qwBKgZ89iVi87AOjc..DkQeARmtdLxpOR.jCrPbziWfYiaFwK', '6a9aeddfc689c1d0e3b9ccc3ab651bc5', 'parthivpathak@gmail.com', '6789654320', 'kolkata', 0);

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `fid` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `fusername` varchar(255) NOT NULL,
  `fpassword` varchar(255) NOT NULL,
  `fhash` varchar(255) NOT NULL,
  `femail` varchar(255) NOT NULL,
  `fmobile` varchar(255) NOT NULL,
  `faddress` text NOT NULL,
  `factive` int(255) NOT NULL DEFAULT 0,
  `frating` int(11) NOT NULL DEFAULT 0,
  `picExt` varchar(255) NOT NULL DEFAULT 'png',
  `picStatus` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`fid`, `fname`, `fusername`, `fpassword`, `fhash`, `femail`, `fmobile`, `faddress`, `factive`, `frating`, `picExt`, `picStatus`) VALUES
(4, 'supriyo', 'supriyo18', '$2y$10$FSljCUQCtYPm1kD5uhwsp.94FiTX.XZJAAFCnabWndyD3VeB7BIhu', '621461af90cadfdaf0e8d4cc25129f91', 'supriyosarkar339@gmail.com', '8918907805', 'kolkata', 0, 0, 'png', 0),
(5, 'Akshudhe', 'aj8144', '$2y$10$B16v3206IbOoW1Z9W8yoSenqNbFSpo/VyZk0QPmZdYYit454zfUmC', '1700002963a49da13542e0726b7bb758', 'akshudhe@icloud.com', '8813040444', 'Haryana, Ambala', 0, 0, 'png', 0),
(6, 'sup', 'sup', '$2y$10$R8D57rLqyjS0ly68LiSzkO9y4Haa5eQco8rWNez3670LUJHMGNNym', 'ab233b682ec355648e7891e66c54191b', 'sup@ex.com', '9547855983', 'blg', 0, 0, 'png', 0),
(7, 'Bipasha', 'Bipasha', '$2y$10$woGiFLdQbmIm0l.drB/vTueARNlW6QLtofxdIgx4bdcgXqsZkLlAG', 'eefc9e10ebdc4a2333b42b2dbb8f27b6', 'bip@gmail.com', '1234567890', 'kolktaa', 0, 0, 'png', 0),
(9, 'Aryan', 'aryan', '$2y$10$eShJ417eIBwsuF8yN7M8HOceSp1nye3pbk1ocL6MlrNyCs4AWOsvG', '85422afb467e9456013a2a51d4dff702', 'aryan@gmail.com', '1234567890', 'Haryana', 0, 0, 'png', 0),
(10, 'Nikhil', 'nikhil', '$2y$10$HAtUAYyiVN6cjs9IG.JTTOrFE4HnU7Tb3Y.ob0qZ6E2xGoDY.db82', 'e49b8b4053df9505e1f48c3a701c0682', 'nikhil@gmai.com', '3456781239', 'Gujarat', 0, 0, 'png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fproduct`
--

CREATE TABLE `fproduct` (
  `fid` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `pcat` varchar(255) NOT NULL,
  `pinfo` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `pimage` varchar(255) NOT NULL DEFAULT 'blank.png',
  `picStatus` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fproduct`
--

INSERT INTO `fproduct` (`fid`, `pid`, `product`, `pcat`, `pinfo`, `price`, `pimage`, `picStatus`) VALUES
(4, 38, 'Apple', 'Fruit', '<p>Fresh Apple from our farm.</p>\r\n\r\n<p>price/kg</p>\r\n', 250, 'Apple4.jpg', 1),
(4, 39, 'Banana', 'Fruit', '<p>Fresh Banana from our farm. price/kg</p>\r\n', 100, 'Banana4.jpg', 1),
(4, 41, 'Orange', 'Fruit', '<p>Fresh Orange</p>\r\n', 300, 'Orange4.jpeg', 1),
(4, 42, 'Pineapple', 'Fruit', '', 200, 'Pineapple4.jpeg', 1),
(4, 43, 'Watermelon', 'Fruit', '', 100, 'Watermelon4.jpg', 1),
(9, 44, 'Cauliflower', 'Vegetable', '', 90, 'Cauliflower9.jpeg', 1),
(9, 45, 'Onion', 'Vegetable', '', 50, 'Onion9.jpeg', 1),
(9, 46, 'Carrot', 'Vegetable', '', 40, 'Carrot9.jpg', 1),
(9, 47, 'Potato', 'Vegetable', '', 20, 'Potato9.jpeg', 1),
(9, 48, 'Tomato', 'Vegetable', '', 30, 'Tomato4.jpg', 1),
(10, 49, 'Wheat', 'Grains', '', 170, 'Wheat10.jpg', 1),
(10, 50, 'Oats', 'Grains', '', 210, 'Oats10.jpg', 1),
(4, 51, 'Tomato', 'Vegetable', '<p>Fresh Tomato from fields</p>\r\n', 50, 'Tomato4.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `likedata`
--

CREATE TABLE `likedata` (
  `blogId` int(10) NOT NULL,
  `blogUserId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `likedata`
--

INSERT INTO `likedata` (`blogId`, `blogUserId`) VALUES
(19, 3),
(19, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mycart`
--

CREATE TABLE `mycart` (
  `bid` int(10) NOT NULL,
  `pid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mycart`
--

INSERT INTO `mycart` (`bid`, `pid`) VALUES
(3, 27),
(3, 30),
(4, 28),
(6, 34),
(4, 35);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `pid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rating` int(10) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`pid`, `name`, `rating`, `comment`) VALUES
(35, 'supriyo', 5, 'so good');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` int(10) NOT NULL,
  `bid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `mode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `bid`, `pid`, `name`, `city`, `mobile`, `email`, `pincode`, `addr`, `price`, `quantity`, `mode`) VALUES
(12, 9, 38, 'Parthiv', 'kolkata', '1234567890', 'parthivpathak@gmail.com', '733101', 'kolkata,wb', 1000, 4, 'Online'),
(13, 9, 51, 'parthiv', 'kolkata', '1234567890', 'parthivpathak@gmail.com', '733101', 'kolkata', 500, 10, 'Online'),
(14, 7, 48, 'bipasha', 'kolkata', '8918907805', 'ss@ex.com', '733101', 'Balurghat, West Bengal', 60, 2, 'COD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogdata`
--
ALTER TABLE `blogdata`
  ADD PRIMARY KEY (`blogId`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `bid` (`bid`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`fid`),
  ADD UNIQUE KEY `fid` (`fid`);

--
-- Indexes for table `fproduct`
--
ALTER TABLE `fproduct`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `likedata`
--
ALTER TABLE `likedata`
  ADD KEY `blogId` (`blogId`),
  ADD KEY `blogUserId` (`blogUserId`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogdata`
--
ALTER TABLE `blogdata`
  MODIFY `blogId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `bid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `fid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fproduct`
--
ALTER TABLE `fproduct`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `buyer_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `farmer` (`fid`);

--
-- Constraints for table `likedata`
--
ALTER TABLE `likedata`
  ADD CONSTRAINT `likedata_ibfk_1` FOREIGN KEY (`blogId`) REFERENCES `blogdata` (`blogId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
