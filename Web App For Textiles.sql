-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2023 at 12:40 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adhan-exports`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `aid` int(5) NOT NULL AUTO_INCREMENT,
  `aname` varchar(30) NOT NULL,
  `apass` varchar(30) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `apass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cid` int(5) NOT NULL AUTO_INCREMENT,
  `stid` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `size` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `ddate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `addr` text NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `stid`, `pid`, `qty`, `size`, `date`, `ddate`, `status`, `addr`) VALUES
(1, 7, 2, 10, '50cm', '2023-02-18', '2023-02-25', '', 'pollachi'),
(2, 1, 1, 10, '100cm', '2023-02-24', '2023-03-03', 'cancel', 'coimbatore');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` longtext NOT NULL,
  `cat` varchar(50) NOT NULL,
  `med_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `pimage` varchar(200) NOT NULL,
  `pdescp` text NOT NULL,
  `psize` text NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `cat`, `med_price`, `qty`, `pimage`, `pdescp`, `psize`) VALUES
(1, 'multi color towel', 'towel', 90, 910, '1.jpg', 'multi color towel', '100cm'),
(2, 'bed sheet', 'bedsheet', 1100, 1590, '2.jpg', 'bed sheet', '200cm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `stid` int(5) NOT NULL AUTO_INCREMENT,
  `stfname` varchar(50) NOT NULL,
  `stlname` varchar(50) NOT NULL,
  `stemail` varchar(50) NOT NULL,
  `stname` varchar(30) NOT NULL,
  `stpass` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `addr` text NOT NULL,
  PRIMARY KEY (`stid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`stid`, `stfname`, `stlname`, `stemail`, `stname`, `stpass`, `phone`, `addr`) VALUES
(1, 'ram', 'kumar', 'ram@gmail.com', 'ram', 'ram', '9600318018', ''),
(2, 'praveen', 'D', 'prave34@gmail.com', 'praveen', 'praveen', '0', ''),
(5, 'mohan', 'mohan', 'mohan@gmail.com', 'mohan', 'mohan', '3214234', 'coimbatore'),
(6, 'ramesh', 'ramesh', 'ramesh@gmail.com', 'ramesh', 'ramesh', '7865436721', 'coimbatore'),
(7, 'mukesh', 'm', 'mukesh@gmail.com', 'mukesh', 'mukesh', '8098688310', 'pollachi'),
(9, 'gokul', 'gokul', 'gokul@gmail.com', 'gokul', 'gokul', '9994915435', 'cbe');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
