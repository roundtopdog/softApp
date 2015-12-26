-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2015 at 07:40 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softapp`
--
CREATE DATABASE IF NOT EXISTS `softapp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `softapp`;

-- --------------------------------------------------------

--
-- Table structure for table `mates`
--
-- Creation: Dec 24, 2015 at 01:21 PM
--

CREATE TABLE `mates` (
  `mateID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `softwareID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `mates`:
--   `mateID`
--       `rooms` -> `roomID`
--   `roomID`
--       `software` -> `softwareID`
--   `mateID`
--       `rooms` -> `roomID`
--   `mateID`
--       `software` -> `softwareID`
--

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--
-- Creation: Dec 24, 2015 at 02:50 PM
--

CREATE TABLE `rooms` (
  `roomID` int(11) NOT NULL,
  `roomName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `rooms`:
--

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomID`, `roomName`) VALUES
(7, 'bal');

-- --------------------------------------------------------

--
-- Table structure for table `software`
--
-- Creation: Dec 24, 2015 at 01:23 PM
--

CREATE TABLE `software` (
  `softwareID` int(11) NOT NULL,
  `softwareName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `software`:
--

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`softwareID`, `softwareName`) VALUES
(3, 'Notepad ++'),
(4, 'SublimeText 3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mates`
--
ALTER TABLE `mates`
  ADD PRIMARY KEY (`mateID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomID`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`softwareID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mates`
--
ALTER TABLE `mates`
  MODIFY `mateID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `softwareID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mates`
--
ALTER TABLE `mates`
  ADD CONSTRAINT `mates_ibfk_1` FOREIGN KEY (`mateID`) REFERENCES `rooms` (`roomID`),
  ADD CONSTRAINT `mates_ibfk_2` FOREIGN KEY (`mateID`) REFERENCES `software` (`softwareID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
