-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2022 at 04:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omrsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificaterequest`
--

CREATE TABLE `certificaterequest` (
  `uni_id` int(11) NOT NULL,
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `fullAddress` varchar(200) NOT NULL,
  `transId` varchar(50) NOT NULL,
  `register_id` int(20) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificaterequest`
--

INSERT INTO `certificaterequest` (`uni_id`, `id`, `name`, `mobile`, `fullAddress`, `transId`, `register_id`, `status`) VALUES
(1, 1, 'Tamim Mahmud ', '01764954098', 'Dhaka Khilgao', '11', 2, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `enduser`
--

CREATE TABLE `enduser` (
  `id` int(11) NOT NULL,
  `under_register_id` int(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `MobileNumber` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enduser`
--

INSERT INTO `enduser` (`id`, `under_register_id`, `Name`, `MobileNumber`, `password`, `email`) VALUES
(1, 2, 'Tamim', 1764954098, '202cb962ac59075b964b07152d234b70', 'tamim@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(200) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'admin', 'admin', 1234567890, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-04-28 05:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `tblregistration`
--

CREATE TABLE `tblregistration` (
  `ID` int(10) NOT NULL,
  `RegistrationNumber` varchar(100) DEFAULT NULL,
  `UserID` int(10) DEFAULT NULL,
  `DateofMarriage` varchar(200) NOT NULL,
  `HusbandName` varchar(200) DEFAULT NULL,
  `HusImage` varchar(200) NOT NULL,
  `HusbandReligion` varchar(50) DEFAULT NULL,
  `Husbanddob` varchar(200) DEFAULT NULL,
  `HusbandSBM` varchar(50) DEFAULT NULL,
  `HusbandAdd` mediumtext DEFAULT NULL,
  `HusbandZipcode` int(10) DEFAULT NULL,
  `HusbandCity` varchar(200) DEFAULT NULL,
  `HusbandNidno` varchar(200) DEFAULT NULL,
  `HusbandMobno` varchar(11) NOT NULL,
  `WifeName` varchar(200) DEFAULT NULL,
  `WifeImage` varchar(200) NOT NULL,
  `WifeReligion` varchar(200) DEFAULT NULL,
  `Wifedob` varchar(200) DEFAULT NULL,
  `WifeSBM` varchar(50) DEFAULT NULL,
  `WifeAdd` mediumtext DEFAULT NULL,
  `WifeZipcode` int(10) DEFAULT NULL,
  `WifeCity` varchar(200) DEFAULT NULL,
  `WifeNidNo` varchar(200) DEFAULT NULL,
  `WifeMobNo` varchar(11) NOT NULL,
  `WitnessNamefirst` varchar(200) DEFAULT NULL,
  `WitnessAddressFirst` mediumtext DEFAULT NULL,
  `WitnessNamesec` varchar(200) DEFAULT NULL,
  `WitnessAddresssec` mediumtext DEFAULT NULL,
  `WitnessNamethird` varchar(200) DEFAULT NULL,
  `WitnessAddressthird` mediumtext DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(100) DEFAULT NULL,
  `Remark` varchar(120) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `nikahimg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblregistration`
--

INSERT INTO `tblregistration` (`ID`, `RegistrationNumber`, `UserID`, `DateofMarriage`, `HusbandName`, `HusImage`, `HusbandReligion`, `Husbanddob`, `HusbandSBM`, `HusbandAdd`, `HusbandZipcode`, `HusbandCity`, `HusbandNidno`, `HusbandMobno`, `WifeName`, `WifeImage`, `WifeReligion`, `Wifedob`, `WifeSBM`, `WifeAdd`, `WifeZipcode`, `WifeCity`, `WifeNidNo`, `WifeMobNo`, `WitnessNamefirst`, `WitnessAddressFirst`, `WitnessNamesec`, `WitnessAddresssec`, `WitnessNamethird`, `WitnessAddressthird`, `RegDate`, `Status`, `Remark`, `UpdationDate`, `nikahimg`) VALUES
(6, '783224784', 2, '04/13/2022', 'Tamim', '4e1268f91ae3d2bee7cf9a0be44093af1649956905.jpg', 'Muslim', '04/01/2022', 'Bachelor', 'X', 1205, 'Dhaka', '0135245', '01764954098', 'Nishat', '06492be059a3532280549df8acfdad341649956905.png', 'Muslim', '04/01/2022', 'Bachelor', 'Y', 1205, 'Dhaka', '1325415', '01750066650', 'A', 'A', 'V', 'V', 'C', 'C', '2022-05-04 09:09:30', 'Verified', 'Verified.', '2022-05-04 09:09:30', ''),
(7, '396362087', 2, '04/08/2022', 'Anik', '4e1268f91ae3d2bee7cf9a0be44093af1654957448.jpg', 'Muslim', '06/13/1995', 'Bachelor', 'dfvxc', 1205, 'Dhaka', '191715', '01755667788', 'Nishat', 'a2ffab7fd9045aa6e3e9c785f23f6cbd1654957448.png', 'Muslim', '06/02/1995', 'Bachelor', 'fvgb', 1205, 'Dhaka', '191716', '01766557788', 'A', 'f', 'V', 'f', 'f', 'f', '2022-06-11 14:24:08', NULL, NULL, NULL, '93df2ea1c909e051464f5cb25a1951c01654957448.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(150) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Address`, `Password`, `RegDate`) VALUES
(1, 'Abir', 'Singh', 7979778979, 'Uttara Housing Limited', '202cb962ac59075b964b07152d234b70', '2020-04-28 06:12:34'),
(2, 'Helal', 'Uddin', 1234567890, 'Tunirhat Panchagarh', '202cb962ac59075b964b07152d234b70', '2020-05-02 10:46:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificaterequest`
--
ALTER TABLE `certificaterequest`
  ADD PRIMARY KEY (`uni_id`);

--
-- Indexes for table `enduser`
--
ALTER TABLE `enduser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblregistration`
--
ALTER TABLE `tblregistration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificaterequest`
--
ALTER TABLE `certificaterequest`
  MODIFY `uni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enduser`
--
ALTER TABLE `enduser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblregistration`
--
ALTER TABLE `tblregistration`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
