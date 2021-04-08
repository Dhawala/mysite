-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 08, 2021 at 04:55 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exams`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `LoginName` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `Password` varchar(32) CHARACTER SET utf8mb4 NOT NULL,
  `Privilege` varchar(13) CHARACTER SET utf8mb4 NOT NULL,
  `Web` varchar(7) NOT NULL,
  `Java` varchar(7) NOT NULL,
  `Mobile` varchar(7) NOT NULL,
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `LoginName` (`LoginName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `LoginName`, `Password`, `Privilege`, `Web`, `Java`, `Mobile`) VALUES
(2, 'D.G.G.S. Wijayanayaka.', 'Shashi', 'Abc@123', 'Student', 'Pending', 'Pending', 'Pending'),
(3, 'dhawala', 'dhawala', '123', 'Student', '12', '12', '12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
