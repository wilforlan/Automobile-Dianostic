-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 10, 2016 at 11:52 PM
-- Server version: 5.6.30
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `location` text NOT NULL,
  `mobile` int(60) NOT NULL,
  `vehicle_type` varchar(60) NOT NULL,
  `license_number` varchar(60) NOT NULL,
  `date_issued` varchar(60) NOT NULL,
  `engine_number` varchar(60) NOT NULL,
  `chasis_number` varchar(60) NOT NULL,
  `year_purchased` varchar(60) NOT NULL,
  `state_purchased` varchar(60) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `name`, `location`, `mobile`, `vehicle_type`, `license_number`, `date_issued`, `engine_number`, `chasis_number`, `year_purchased`, `state_purchased`, `created`) VALUES
(1, 'Williams Isaac', 'Ota', 234768888, 'Volvo', 'Ty6778', '2018', '4567uh', 'erty56789', '2018', 'Lagos', '2016-10-09 07:40:57'),
(2, 'Ajilore Rapheal', 'Ota', 234768888, 'Volvo', 'Ty6778', '2018', '4567uh', 'erty56789', '2018', 'Lagos', '2016-10-09 07:41:58'),
(3, 'Ilavare Gbenga', 'Lagos', 234567890, 'Panel Van', 'YTYS78999', '1998', 'YTYHS58789', '7877JGUI', '2015', 'ILOGBO', '2016-10-09 12:48:44'),
(4, 'Adenekan Esther', 'Lagos State', 91883873, 'Muteng', 'YTHS6789', '2016', 'TYY67789', '9080JHU', '2016', 'Lagos', '2016-10-10 10:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE IF NOT EXISTS `diagnosis` (
  `diag_id` int(11) NOT NULL,
  `nature_of_fault` text NOT NULL,
  `possible_fault` text NOT NULL,
  `probable_solution` text NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`diag_id`, `nature_of_fault`, `possible_fault`, `probable_solution`, `picture`) VALUES
(1, 'Vehicle Break Down', 'Bad Engine Oil', 'Nothing, Just Change Oil', ''),
(2, 'Auto Failure', 'Bad Rollers and Battery', 'Change Roller Belts and Battery', ''),
(3, 'Car Burglar', 'Broken Mirror', 'Nuy new one', 'photo2.jpg'),
(4, 'Over Heating', 'Due to Less water in Radiator', 'Add Water to radiator', 'ens5.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `resetTokens`
--

CREATE TABLE IF NOT EXISTS `resetTokens` (
  `token` varchar(40) NOT NULL COMMENT 'The Unique Token Generated',
  `uid` int(11) NOT NULL COMMENT 'The User Id',
  `requested` varchar(20) NOT NULL COMMENT 'The Date when token was created'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` tinytext NOT NULL,
  `password` varchar(64) NOT NULL,
  `password_salt` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `attempt` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `password_salt`, `name`, `created`, `attempt`) VALUES
(1, 'admin', 'admin@admin.com', '7abc6104d7cf0b6149a3e8309fc63e4ac9e1e6c5755cf4551db6a596b58b8fc1', 'Nnx9DTb9PimeMkpxqi6g', 'Ajilore Rapheal', '2016-10-09 17:12:44', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_devices`
--

CREATE TABLE IF NOT EXISTS `user_devices` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT 'The user''s ID',
  `token` varchar(15) NOT NULL COMMENT 'A unique token for the user''s device',
  `last_access` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`diag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_devices`
--
ALTER TABLE `user_devices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `diag_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_devices`
--
ALTER TABLE `user_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
