-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 07:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ollcflibsysdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `accID` int(11) NOT NULL,
  `accUsername` text NOT NULL,
  `accPassword` text NOT NULL,
  `accType` text NOT NULL,
  `accToken` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`accID`, `accUsername`, `accPassword`, `accType`, `accToken`) VALUES
(1, 'admin', 'admin', 'Admin', ''),
(2, 'Maesa', 'maesa123', 'User', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--

CREATE TABLE `tblbook` (
  `bookID` text NOT NULL,
  `catID` text NOT NULL,
  `bookTitle` text NOT NULL,
  `bookAuthor` text NOT NULL,
  `bookSubject` text NOT NULL,
  `bookPageCount` text NOT NULL,
  `bookQuantity` text NOT NULL,
  `bookLocation` text NOT NULL,
  `bookDescription` text NOT NULL,
  `bookPhoto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`bookID`, `catID`, `bookTitle`, `bookAuthor`, `bookSubject`, `bookPageCount`, `bookQuantity`, `bookLocation`, `bookDescription`, `bookPhoto`) VALUES
('1231313', '15', 'Book Title', 'Book Author', 'Book Subject', '120', '1', '202', 'Book Description', ''),
('12356', '14', 'Epic Reads Book Club Sampler', 'Megan McCafferty', 'Club', '213', '5', '201', 'Looking for your book club\'s next discussion-worthy read? Want a fun, thought-provoking book just for yourself? Preview six of summer\'s teen book club picks with sneak peeks of Fall from Grace by Charles Benoit, The Lost Code by Kevin Emerson, Something Strange and Deadly by Susan Dennard, Thumped by Megan McCafferty, Tiger Lily by Jodi Lynn Anderson, and A Want So Wicked by Suzanne Young.', 'epic.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblborrowed`
--

CREATE TABLE `tblborrowed` (
  `borrID` int(11) NOT NULL,
  `accID` text NOT NULL,
  `bookID` text NOT NULL,
  `borrDate` text NOT NULL,
  `borrDateDue` text NOT NULL,
  `borrQuantity` text NOT NULL,
  `processBy` text NOT NULL,
  `borrDateReturn` text NOT NULL,
  `receivedBy` text NOT NULL,
  `borrStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblborrowed`
--

INSERT INTO `tblborrowed` (`borrID`, `accID`, `bookID`, `borrDate`, `borrDateDue`, `borrQuantity`, `processBy`, `borrDateReturn`, `receivedBy`, `borrStatus`) VALUES
(21, '2', '12356', '2024-09-24', '2024-10-01', '1', 'Lyka Shane APuya', '2024-09-24', '', 'Returned'),
(22, '2', '12356', '2024-09-24', '2024-10-01', '1', 'Lyka Shane APuya', '', '', 'Approved'),
(23, '2', '12356', '2024-09-24', '2024-10-01', '1', 'Lyka Shane APuya', '', '', 'Declined');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `catID` int(11) NOT NULL,
  `catTitle` text NOT NULL,
  `catDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`catID`, `catTitle`, `catDescription`) VALUES
(14, 'Fiction', 'sfsfsfsfsf'),
(15, 'Novel', 'GG');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `deptID` text NOT NULL,
  `deptTitle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblprofile`
--

CREATE TABLE `tblprofile` (
  `accID` text NOT NULL,
  `deptID` text NOT NULL,
  `profFullname` text NOT NULL,
  `profGender` text NOT NULL,
  `profNumber` text NOT NULL,
  `profAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblprofile`
--

INSERT INTO `tblprofile` (`accID`, `deptID`, `profFullname`, `profGender`, `profNumber`, `profAddress`) VALUES
('1', '', 'Lyka Shane APuya', '', '', ''),
('2', '', 'Desiree Maesa', '', '', ''),
('3', '', 'asd', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserlog`
--

CREATE TABLE `tbluserlog` (
  `logID` text NOT NULL,
  `accID` text NOT NULL,
  `logDTIn` text NOT NULL,
  `logDTOut` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`accID`);

--
-- Indexes for table `tblbook`
--
ALTER TABLE `tblbook`
  ADD PRIMARY KEY (`bookID`(255));

--
-- Indexes for table `tblborrowed`
--
ALTER TABLE `tblborrowed`
  ADD PRIMARY KEY (`borrID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`deptID`(255));

--
-- Indexes for table `tblprofile`
--
ALTER TABLE `tblprofile`
  ADD PRIMARY KEY (`accID`(255));

--
-- Indexes for table `tbluserlog`
--
ALTER TABLE `tbluserlog`
  ADD PRIMARY KEY (`logID`(255));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `accID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblborrowed`
--
ALTER TABLE `tblborrowed`
  MODIFY `borrID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
