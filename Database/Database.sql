-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 05:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rehab_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(255) NOT NULL,
  `ContactNumber` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerName`, `ContactNumber`, `Address`) VALUES
(1, 'Asad', '4365768', 'TNT colony'),
(2, 'Nadeem', '9867423', 'fatima colony'),
(3, 'Sonia', '0311518', 'TIP colony'),
(18, 'Khan', '3434242', 'Lhr'),
(19, 'Sheryar', '243657', 'Isd'),
(21, 'Huzaifa', '34565', 'sofia'),
(22, 'Haseeb', '435675', 'fsd'),
(23, 'naveed', '35754', 'Isb'),
(24, 'Daniyal', '00987', 'Isb'),
(25, 'Arushma', '675887', 'Isb'),
(26, 'Ghina', '098776', 'Isb');

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `DealerID` int(11) NOT NULL,
  `DealerName` varchar(255) NOT NULL,
  `ContactNumber` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`DealerID`, `DealerName`, `ContactNumber`, `Address`) VALUES
(1, 'naveed', '32435466', 'gch'),
(2, 'nadeem', '43456546', 'krh'),
(3, 'Ali', '343345', 'bcd'),
(4, 'Haseeb', '8798654', 'lhr'),
(5, 'Shazil', '8765809', 'gjr'),
(6, 'Haider', '987655', 'mla'),
(7, 'Usama', '098765', 'uyt'),
(8, 'Imran', '3456789', 'isd'),
(9, 'Danish', '089765', 'fsd'),
(10, 'Awais', '234516', 'rlp'),
(11, 'rohail', '987766', 'ghfttr');

-- --------------------------------------------------------

--
-- Table structure for table `financialtransaction`
--

CREATE TABLE `financialtransaction` (
  `TransactionID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `DealerID` int(11) DEFAULT NULL,
  `Amount` float NOT NULL,
  `Remaining_Amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `financialtransaction`
--

INSERT INTO `financialtransaction` (`TransactionID`, `CustomerID`, `DealerID`, `Amount`, `Remaining_Amount`) VALUES
(1, NULL, 21, 50000, 10000),
(2, 1, 11, 40000, 0),
(3, 2, 31, 30000, 0),
(4, 3, 41, 50000, 0),
(5, 1, 51, 60000, 0),
(6, 4, 61, 70000, 0),
(7, 7, 81, 80000, 0),
(8, 9, 21, 90000, 0),
(9, 8, 50, 100000, 0),
(10, 3, 79, 110000, 0),
(11, 2, 68, 120000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `powder`
--

CREATE TABLE `powder` (
  `PowderID` int(11) NOT NULL,
  `RockID` int(11) NOT NULL,
  `Weight` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `powder`
--

INSERT INTO `powder` (`PowderID`, `RockID`, `Weight`) VALUES
(11, 3, 50),
(12, 1, 10),
(13, 3, 20),
(14, 1, 30),
(15, 1, 50),
(16, 1, 50),
(17, 1, 50),
(18, 1, 50),
(19, 1, 50),
(20, 1, 50),
(21, 1, 50),
(22, 1, 50),
(23, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `PurchaseID` int(11) NOT NULL,
  `TransactionID` int(11) NOT NULL,
  `DealerID` int(11) NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `Remaining_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`PurchaseID`, `TransactionID`, `DealerID`, `TotalAmount`, `Remaining_amount`) VALUES
(1, 12, 101, 350, 0),
(2, 13, 102, 3150, 0),
(3, 14, 103, 3015, 0),
(4, 16, 104, 4015, 0),
(5, 17, 105, 5015, 0),
(6, 18, 106, 6015, 0),
(7, 19, 107, 7015, 0),
(8, 20, 108, 8015, 0),
(9, 21, 109, 9015, 0),
(10, 22, 110, 10015, 0),
(11, 23, 111, 12015, 0),
(12, 18, 2, 4221, 0),
(13, 20, 3, 3015, 250);

-- --------------------------------------------------------

--
-- Table structure for table `rock`
--

CREATE TABLE `rock` (
  `RockID` int(11) NOT NULL,
  `RockType` varchar(50) NOT NULL,
  `Rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rock`
--

INSERT INTO `rock` (`RockID`, `RockType`, `Rate`) VALUES
(1, 'Lums', 88),
(2, 'Phosphate', 77),
(3, 'lums', 30);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SalesID` int(11) NOT NULL,
  `TransactionID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `PowderID` int(11) NOT NULL,
  `TotalAmount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SalesID`, `TransactionID`, `CustomerID`, `PowderID`, `TotalAmount`) VALUES
(2, 13, 1, 12, 20000),
(3, 4, 2, 11, 2000),
(8, 18, 21, 16, 2500),
(9, 10, 22, 18, 3500),
(10, 11, 23, 19, 4500),
(11, 14, 24, 20, 5500),
(12, 15, 25, 21, 6500);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TransactionID`, `Date`) VALUES
(1, '2023-06-04'),
(2, '2023-06-14'),
(3, '2023-06-04'),
(4, '2023-06-01'),
(7, '2023-07-04'),
(8, '2023-08-04'),
(9, '2023-09-04'),
(10, '2023-12-04'),
(11, '2023-10-04'),
(12, '2023-09-12'),
(13, '2023-06-12'),
(14, '2023-07-20'),
(15, '2023-08-20'),
(16, '2023-06-12'),
(17, '2023-06-12'),
(18, '2023-06-04'),
(19, '2023-10-04'),
(20, '2023-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `CNIC` int(15) NOT NULL,
  `Number` int(15) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Question` varchar(100) NOT NULL,
  `Answer` int(11) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `user_role`, `CNIC`, `Number`, `Address`, `Question`, `Answer`, `fee`) VALUES
(1, 'Uzair', 'rehab', 'Admin', 1234, 123450, 'Lhr', 'Enter Your Favourite Number', 10, 0),
(2, 'Sheryar', 'fatima', 'Admin', 112233, 443322, 'Isb', 'Enter Your Favourite Number', 2, 0),
(3, 'Mohib', 'huzaifa', 'Admin', 2334, 434565, 'Gjr', 'Enter Your Favourite Number', 3, 0),
(4, 'Mohibullah', 'huzaifa', 'staff', 11228, 345566, 'rpw', 'Enter Your Favourite Number', 5, 5000),
(5, 'Mohiz', 'ayesha', 'staff', 11227, 98766, 'fsd', 'Enter Your Favourite Number', 2, 0),
(6, 'Haider', 'saira', 'staff', 11229, 87656, 'uyt', 'Enter Your Favourite Number', 4, 0),
(7, 'Abbasi', 'maham', 'staff', 12345, 987656, 'krc', 'Enter Your Favourite Number', 6, 0),
(8, 'Huzaifa', 'anusha', 'staff', 126475, 678854, 'krh', 'Enter Your Favourite Number', 7, 0),
(9, 'Aashir', 'maryam', 'staff', 12987, 454366, 'hyb', 'Enter Your Favourite Number', 9, 0),
(10, 'Asad', 'anusha', 'staff', 189766, 87654, 'mly', 'Enter Your Favourite Number', 8, 0),
(11, 'Khan', 'tahreem', 'staff', 109876, 87665, 'ibr', 'Enter Your Favourite Number', 1, 0),
(12, 'ali', 'kkk', 'staff', 2147483647, 995206256, 'tip housing society', 'Enter Your Favourite Number', 6, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`DealerID`);

--
-- Indexes for table `financialtransaction`
--
ALTER TABLE `financialtransaction`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `DealerID` (`DealerID`);

--
-- Indexes for table `powder`
--
ALTER TABLE `powder`
  ADD PRIMARY KEY (`PowderID`),
  ADD KEY `RockID` (`RockID`) USING BTREE;

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`PurchaseID`);

--
-- Indexes for table `rock`
--
ALTER TABLE `rock`
  ADD PRIMARY KEY (`RockID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SalesID`),
  ADD KEY `TransactionID` (`TransactionID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `PowderID` (`PowderID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
  MODIFY `DealerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `financialtransaction`
--
ALTER TABLE `financialtransaction`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `powder`
--
ALTER TABLE `powder`
  MODIFY `PowderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `PurchaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rock`
--
ALTER TABLE `rock`
  MODIFY `RockID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SalesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `powder`
--
ALTER TABLE `powder`
  ADD CONSTRAINT `powder_ibfk_1` FOREIGN KEY (`RockID`) REFERENCES `rock` (`RockID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
