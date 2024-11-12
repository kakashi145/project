-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2024 at 06:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salary`
--

-- --------------------------------------------------------

--
-- Table structure for table `assistantprofessor`
--

CREATE TABLE `assistantprofessor` (
  `Level` int(11) NOT NULL,
  `Index` int(11) NOT NULL,
  `BasicPay` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assistantprofessor`
--

INSERT INTO `assistantprofessor` (`Level`, `Index`, `BasicPay`) VALUES
(10, 1, 57700.00),
(10, 2, 59100.00),
(10, 3, 60500.00),
(10, 4, 61900.00),
(10, 5, 63400.00),
(10, 6, 64900.00),
(10, 7, 66400.00),
(10, 8, 68000.00),
(10, 9, 69600.00),
(10, 10, 71200.00),
(11, 1, 73100.00),
(11, 2, 74700.00),
(11, 3, 76400.00),
(11, 4, 78200.00),
(11, 5, 80000.00),
(11, 6, 81800.00),
(11, 7, 83600.00),
(11, 8, 85400.00),
(11, 9, 87200.00),
(11, 10, 89000.00),
(12, 1, 90900.00),
(12, 2, 92800.00),
(12, 3, 94700.00),
(12, 4, 96700.00),
(12, 5, 98700.00),
(12, 6, 100700.00),
(12, 7, 102700.00),
(12, 8, 104700.00),
(12, 9, 106700.00),
(12, 10, 108700.00);

-- --------------------------------------------------------

--
-- Table structure for table `associateprofessor`
--

CREATE TABLE `associateprofessor` (
  `Level` int(11) NOT NULL,
  `Index` int(11) NOT NULL,
  `BasicPay` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `associateprofessor`
--

INSERT INTO `associateprofessor` (`Level`, `Index`, `BasicPay`) VALUES
(13, 1, 131400.00),
(13, 2, 135800.00),
(13, 3, 140300.00),
(13, 4, 144900.00),
(13, 5, 149600.00),
(13, 6, 154400.00),
(13, 7, 159300.00),
(13, 8, 164300.00),
(13, 9, 169400.00),
(13, 10, 174600.00),
(14, 1, 180200.00),
(14, 2, 185300.00),
(14, 3, 190500.00),
(14, 4, 195800.00),
(14, 5, 201200.00),
(14, 6, 206600.00),
(14, 7, 212100.00),
(14, 8, 217700.00),
(14, 9, 223400.00),
(14, 10, 229200.00);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `basic_salary` decimal(10,2) DEFAULT NULL,
  `DA` decimal(10,2) DEFAULT NULL,
  `HRA` decimal(10,2) DEFAULT NULL,
  `TA` decimal(10,2) DEFAULT NULL,
  `PA` decimal(10,2) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `HRA_prec` decimal(5,2) DEFAULT NULL,
  `DA_perc` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `name`, `department`, `designation`, `level`, `basic_salary`, `DA`, `HRA`, `TA`, `PA`, `gender`, `phone_number`, `HRA_prec`, `DA_perc`) VALUES
(101, 'Gitesh', 'Computer Science', 'Assistant Professor', 10, 57700.00, 10386.00, 13848.00, 5000.00, 3000.00, 'Male', '1234567890', NULL, NULL),
(102, 'Jane Smith', 'Mathematics', 'Associate Professor', 13, 135800.00, 24444.00, 32592.00, 5500.00, 3500.00, 'Female', '9876543210', NULL, NULL),
(103, 'Michael Johnson', 'Physics', 'Senior Professor', 14, 144200.00, 25956.00, 34608.00, 6000.00, 4000.00, 'Male', '5556667778', NULL, NULL),
(104, 'Emily Davis', 'Electrical Engineering', 'Assistant Professor', 11, 74700.00, 13446.00, 17928.00, 5000.00, 3200.00, 'Female', '4445556667', NULL, NULL),
(105, 'David Brown', 'Mechanical Engineering', 'Associate Professor', 13, 149600.00, 26928.00, 35904.00, 6000.00, 3800.00, 'Male', '3334445556', NULL, NULL),
(106, 'Emma Wilson', 'Civil Engineering', 'Senior Professor', 15, 182200.00, 32796.00, 43728.00, 6500.00, 4500.00, 'Female', '2223334445', NULL, NULL),
(107, 'Olivia Miller', 'Computer Science', 'Assistant Professor', 12, 100700.00, 18126.00, 24168.00, 5200.00, 3400.00, 'Female', '1112223334', NULL, NULL),
(108, 'Lucas Anderson', 'Mathematics', 'Associate Professor', 14, 180200.00, 32436.00, 43248.00, 6300.00, 4200.00, 'Male', '9998887776', NULL, NULL),
(109, 'Sophia Martinez', 'Physics', 'Senior Professor', 15, 205100.00, 36918.00, 49224.00, 7000.00, 4800.00, 'Female', '8887776665', NULL, NULL),
(110, 'Liam Thomas', 'Electrical Engineering', 'Assistant Professor', 10, 61900.00, 11142.00, 14856.00, 5100.00, 3300.00, 'Male', '7776665554', NULL, NULL),
(111, 'sarthak', 'Electrical Engineering', 'Assistant Professor', 10, 61900.00, 11142.00, 14856.00, 5100.00, 3300.00, 'Male', '7776665554', NULL, NULL);

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `calculate_allowances` BEFORE INSERT ON `employee` FOR EACH ROW BEGIN
    SET NEW.DA = NEW.basic_salary * NEW.DA_perc;   -- DA percentage is taken from the employee's DA_perc
    SET NEW.HRA = NEW.basic_salary * NEW.HRA_prec; -- HRA percentage is taken from the employee's HRA_prec
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update` BEFORE UPDATE ON `employee` FOR EACH ROW BEGIN
    SET NEW.DA = NEW.basic_salary * NEW.DA_perc;   -- DA percentage is taken from the employee's DA_perc
    SET NEW.HRA = NEW.basic_salary * NEW.HRA_prec; -- HRA percentage is taken from the employee's HRA_prec
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(100) NOT NULL,
  `name` varchar(190) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  `profile` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `name`, `username`, `password`, `email`, `phone`, `address`, `usertype`, `profile`) VALUES
(1, 'admin', 'super admin', 'admin', NULL, NULL, NULL, 'admin', 'upload/3_1521639658.jpg'),
(15, 'gitesh Khadye', 'giteshk14', 'giteshk14', 'giteshk14', NULL, NULL, 'user', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seniorprofessor`
--

CREATE TABLE `seniorprofessor` (
  `Level` int(11) NOT NULL,
  `Index` int(11) NOT NULL,
  `BasicPay` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seniorprofessor`
--

INSERT INTO `seniorprofessor` (`Level`, `Index`, `BasicPay`) VALUES
(14, 1, 144200.00),
(14, 2, 148500.00),
(14, 3, 152900.00),
(14, 4, 157400.00),
(14, 5, 162000.00),
(14, 6, 166700.00),
(14, 7, 171500.00),
(14, 8, 176400.00),
(14, 9, 181500.00),
(14, 10, 186700.00),
(15, 1, 182200.00),
(15, 2, 187700.00),
(15, 3, 193300.00),
(15, 4, 199100.00),
(15, 5, 205100.00),
(15, 6, 211300.00),
(15, 7, 217600.00),
(15, 8, 224100.00),
(15, 9, 230800.00),
(15, 10, 237600.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assistantprofessor`
--
ALTER TABLE `assistantprofessor`
  ADD PRIMARY KEY (`Level`,`Index`);

--
-- Indexes for table `associateprofessor`
--
ALTER TABLE `associateprofessor`
  ADD PRIMARY KEY (`Level`,`Index`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`,`username`);

--
-- Indexes for table `seniorprofessor`
--
ALTER TABLE `seniorprofessor`
  ADD PRIMARY KEY (`Level`,`Index`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
