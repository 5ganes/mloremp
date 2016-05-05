-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2016 at 10:03 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mrsmp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_crop`
--

CREATE TABLE IF NOT EXISTS `tbl_crop` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fiscalYear` varchar(20) CHARACTER SET latin1 NOT NULL,
  `userId` int(10) NOT NULL,
  `manualDate` date NOT NULL,
  `cropName` varchar(100) NOT NULL,
  `cropCode` varchar(10) CHARACTER SET latin1 NOT NULL,
  `areaUnit` int(10) NOT NULL,
  `irrigatedArea` int(10) NOT NULL,
  `unirrigatedArea` int(10) NOT NULL,
  `totalArea` int(10) NOT NULL,
  `productionUnit` varchar(50) NOT NULL,
  `irrigatedProduction` int(10) NOT NULL,
  `unirrigatedProduction` int(10) NOT NULL,
  `totalProduction` int(10) NOT NULL,
  `farmerUnit` int(10) NOT NULL,
  `farmerPrice` int(20) NOT NULL,
  `marketUnit` int(10) NOT NULL,
  `marketPrice` int(20) NOT NULL,
  `onDate` date NOT NULL,
  `publish` varchar(3) CHARACTER SET latin1 NOT NULL,
  `weight` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `tbl_crop`
--

INSERT INTO `tbl_crop` (`id`, `fiscalYear`, `userId`, `manualDate`, `cropName`, `cropCode`, `areaUnit`, `irrigatedArea`, `unirrigatedArea`, `totalArea`, `productionUnit`, `irrigatedProduction`, `unirrigatedProduction`, `totalProduction`, `farmerUnit`, `farmerPrice`, `marketUnit`, `marketPrice`, `onDate`, `publish`, `weight`) VALUES
(3, '2072/2073', 9, '2072-10-13', 'भेडे खुर्सानी', '203', 2, 55, 50, 105, '6', 88, 66, 154, 5, 99, 6, 10, '2016-01-15', 'Yes', 30),
(11, '2071/2072', 9, '2072-10-05', 'पालुङ्गा', '221', 3, 4, 5, 0, '4', 6, 10, 0, 6, 66, 5, 666, '2016-01-17', 'Yes', 40),
(44, '2071/2072', 9, '0000-00-00', 'भेडे खुर्सानी', '203', 1, 7, 7, 14, '4', 7, 9, 16, 4, 7, 4, 7, '2016-01-20', 'No', 50),
(45, '2071/2072', 9, '0000-00-00', 'Paddy(Barse Dhaan)', '098', 1, 0, 0, 0, '4', 0, 0, 0, 4, 0, 4, 0, '2016-01-28', 'Yes', 60),
(46, '2071/2072', 9, '2072-11-12', 'Potato(Aalu)', '5', 2, 9, 7, 0, '5', 7, 6, 0, 6, 9, 5, 7, '2016-02-14', 'Yes', 70);
