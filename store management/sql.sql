-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2020 at 01:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `Email`, `Password`) VALUES
(1, 'Developer_SAP@gmail.com', '12345'),
(2, 'Prerana@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Stand-in structure for view `bill`
-- (See below for the actual view)
--
CREATE TABLE `bill` (
`Timestamp` timestamp
,`UID` int(11)
,`IID_arr` varchar(100)
,`Count_arr` varchar(100)
,`Cost_arr` varchar(100)
,`Total_cost_per_item` varchar(100)
,`Total_cost` int(11)
,`Name` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CID` int(11) NOT NULL,
  `Cname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CID`, `Cname`) VALUES
(0, 'Frozen'),
(1, 'Dairy'),
(2, 'Stationary'),
(3, 'General'),
(4, 'Electronic');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `IID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `Iname` varchar(100) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`IID`, `CID`, `Iname`, `Stock`, `Cost`) VALUES
(1, 0, 'Nugget', 5, 120),
(2, 0, 'Peas', 90, 75),
(3, 1, 'Milk', 60, 24),
(4, 1, 'Cheese', 65, 15),
(5, 2, 'Pen', 775, 5),
(6, 2, 'Scale', 100, 15),
(7, 2, 'Rubber', 200, 5),
(8, 3, 'Gun', 5, 5000),
(9, 3, 'Case', 100, 5),
(10, 3, 'Samosa', 14900, 5);

--
-- Triggers `items`
--
DELIMITER $$
CREATE TRIGGER `DeleteMessage` AFTER UPDATE ON `items` FOR EACH ROW BEGIN 
	DELETE FROM message WHERE Stats=1;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `UID` int(11) NOT NULL,
  `IID_arr` varchar(100) NOT NULL,
  `Count_arr` varchar(100) NOT NULL,
  `Cost_arr` varchar(100) NOT NULL,
  `Total_cost_per_item` varchar(100) NOT NULL,
  `Total_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`Timestamp`, `UID`, `IID_arr`, `Count_arr`, `Cost_arr`, `Total_cost_per_item`, `Total_cost`) VALUES
('2020-05-14 13:51:41', 1, '1,2,3,4,5', '5,12,15,2,10', '120,75,24,15,5', '600,900,360,30,50', 1940),
('2020-05-14 13:51:41', 2, '2,4,6,8,10', '13,17,19,1,3', '75,15,15,5000,5', '975,255,285,5000,15', 6530),
('2020-05-16 17:58:41', 0, '10,', '1000,', '5,', '5000,', 5000),
('2020-05-16 18:05:25', 0, '3,6,', '10,30,', '24,15,', '240,450,', 690),
('2020-05-16 18:17:05', 0, '1,', '5,', '120,', '600,', 600),
('2020-05-17 06:38:56', 1, '3,6,1,3,4,', '10,10,2,10,9,', '24,15,120,24,15,', '240,150,240,240,135,', 1005),
('2020-05-17 09:44:28', 1, '5,', '100,', '5,', '500,', 500),
('2020-05-17 09:50:24', 0, '1,6,4,', '3,90,10,', '120,15,15,', '360,1350,150,', 1860),
('2020-05-17 09:55:05', 1, '4,', '10,', '15,', '150,', 150),
('2020-05-17 10:33:58', 0, '6,3,4,', '10,10,5,', '15,24,15,', '150,240,75,', 465),
('2020-05-17 10:38:08', 0, '2,', '10,', '75,', '750,', 750),
('2020-05-17 14:01:08', 3, '5,', '10,', '5,', '50,', 50),
('2020-05-18 09:15:12', 1, '5,', '90,', '5,', '450,', 450),
('2020-05-18 09:18:12', 0, '5,5,', '10,15,', '5,5,', '50,75,', 125),
('2020-05-20 07:15:45', 0, '10,', '200,', '5,', '1000,', 1000),
('2020-05-20 10:26:20', 0, '10,', '100,', '5,', '500,', 500);

-- --------------------------------------------------------

--
-- Structure for view `bill`
--
DROP TABLE IF EXISTS `bill`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bill`  AS  select `purchase`.`Timestamp` AS `Timestamp`,`purchase`.`UID` AS `UID`,`purchase`.`IID_arr` AS `IID_arr`,`purchase`.`Count_arr` AS `Count_arr`,`purchase`.`Cost_arr` AS `Cost_arr`,`purchase`.`Total_cost_per_item` AS `Total_cost_per_item`,`purchase`.`Total_cost` AS `Total_cost`,`customer`.`Name` AS `Name` from (`purchase` join `customer` on(`purchase`.`UID` = `customer`.`UID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`IID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
