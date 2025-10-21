-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2025 at 05:51 PM
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
-- Database: `shcool`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `isbn` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `category`, `year`, `isbn`) VALUES
(1, 'ខ្លាឃ្មុំ', 'ដុរា', 'អក្សរសាស្ត្រ', 2025, '222'),
(2, '2', 'a', 'វិទ្យាសាស្ត្រ', 2002, '333'),
(3, 'តុក្ករា', 'បន', 'វិទ្យាសាស្ត្រ', 2002, '333');

-- --------------------------------------------------------

--
-- Table structure for table `schoolsm`
--

CREATE TABLE `schoolsm` (
  `id` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `DBO` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schoolsm`
--

INSERT INTO `schoolsm` (`id`, `Name`, `Gender`, `DBO`, `Email`) VALUES
(1, 'សុី សុវណ្ណសា22', 'ប្រុស', '1111-11-11', 'googlelove@gamil.com'),
(2, 'ឌីណា ដី1122', 'ប្រុស', '1111-11-11', 'Hr@gamil.com'),
(3, 'ផា រិន168', 'ស្រី', '1111-11-11', 'Hr@gamil.com'),
(5, 'លីដា លីន112255555', 'ស្រី', '1111-12-11', 'love@gamil.com'),
(7, 'រក្សា មុន្នី', 'ស្រី', '22222-02-22', 'love@gamil.com'),
(12, 'លី មី', 'ស្រី', '2222-11-12', 'googlelove@gamil.com'),
(15, 'លីហ្សា ក្មេង', 'ប្រុស', '2222-02-22', 'googlelove@gamil.com'),
(23, 'សុខ គុននីហ្សា', 'ស្រី', '3333-12-23', 'love@gamil.com');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cher`
--

CREATE TABLE `tbl_cher` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `worktime` varchar(250) NOT NULL,
  `salary` varchar(250) NOT NULL,
  `skill` varchar(250) NOT NULL,
  `Date` date DEFAULT NULL,
  `telegram` int(50) NOT NULL,
  `token` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cher`
--

INSERT INTO `tbl_cher` (`id`, `name`, `gender`, `worktime`, `salary`, `skill`, `Date`, `telegram`, `token`) VALUES
(1, 'លី រស្មី', 'ស្រី', 'ការងារពេញម៉ោង', '150', 'គ្រូភាសាអង់គ្លេស', '1111-11-11', 9837374, 'abc123xyz'),
(2, 'ផ្កា ដា', 'ប្រុស', 'ការងាក្រៅម៉ោង', '200', 'គ្រូភាសាចិន', '1111-11-11', 9837374, NULL),
(3, 'មុន្នី រក្សា', 'ស្រី', 'ការងារពេញម៉ោង', '150', 'គ្រូភាសាអង់គ្លេស', '2002-11-20', 9837374, NULL),
(4, 'លក្ខណា សុខ', 'ស្រី', 'ការងារពេញម៉ោង', '150', 'គ្រូភាសាចិន', '2222-11-11', 2147483647, NULL),
(5, 'ហង លីមុី', 'ស្រី', 'ការងារពេញម៉ោង', '200', 'គ្រូភាសាអង់គ្លេស', '2001-11-11', 9837374, NULL),
(7, 'លី​ លកខណា', 'ស្រី', 'ការងារពេញម៉ោង', '150', 'គ្រូភាសាអង់គ្លេស', '2002-11-02', 9837374, NULL),
(8, 'លី​ លកខណា1', 'ស្រី', 'ការងារពេញម៉ោង', '150', 'គ្រូភាសាអង់គ្លេស', '2002-01-11', 9837374, NULL),
(9, 'ហង លីមុី1', 'ស្រី', 'ការងារពេញម៉ោង', '140', 'គ្រូភាសាចិន', '1111-11-11', 9837374, NULL),
(13, 'សិស្ស ស្មោះ', 'ស្រី', 'ការងារពេញម៉ោង', '150', 'គ្រូភាសាចិន', '2222-02-22', 9837374, NULL),
(15, 'ដថដស1111', 'ស្រី', 'ការងារពេញម៉ោង', '140', 'គ្រូភាសាអង់គ្លេស', '0000-00-00', 2147483647, NULL),
(16, 'COCACOLA KHMER', 'ស្រី', 'ការងារពេញម៉ោង', '200', 'គ្រូភាសាអង់គ្លេស', '1111-11-11', 9837374, NULL),
(17, 'ដាវី កុក', 'ស្រី', 'ការងារពេញម៉ោង', '200', 'គ្រូភាសាអង់គ្លេស', '1111-11-11', 9837374, NULL),
(18, 'សូ​ រដ្ធា', 'ប្រុស', 'ការងារពេញម៉ោង', '150', 'គ្រូភាសាអង់គ្លេស', '2222-02-22', 9837374, NULL),
(19, 'បុណ្ណា មេង', 'ប្រុស', 'ការងារពេញម៉ោង', '200', 'គ្រូភាសាអង់គ្លេស', '2004-12-04', 9837374, NULL),
(20, 'សុខ រស្មីប', 'ប្រុស', 'ការងារពេញម៉ោង', '150', 'គ្រូភាសាអង់គ្លេស', '1111-11-11', 9837374, NULL),
(21, 'សុវាន់ ដែន', 'ប្រុស', 'ការងារពេញម៉ោង', '140', 'គ្រូភាសាចិន', '2222-02-22', 9837374, NULL),
(22, 'ភក្ដ្រ អែប', 'ប្រុស', 'ការងារពេញម៉ោង', '200', 'គ្រូភាសាអង់គ្លេស', '1111-11-11', 9837374, NULL),
(24, 'cc', 'ស្រី', 'ការងារពេញម៉ោង', '150', 'គ្រូភាសាអង់គ្លេស', '0000-00-00', 9837374, NULL),
(25, 'លី ណា', 'ស្រី', 'ការងារពេញម៉ោង', '150', 'គ្រូភាសាចិន', '1111-11-11', 9837374, NULL),
(26, 'ឆាយ​ វិរះយុទ្ធ', 'ប្រុស', 'ការងារពេញម៉ោង', '150', 'គ្រូភាសាអង់គ្លេស', '0000-00-00', 9837374, NULL),
(27, 'កែវ រីយ៉ា', 'ស្រី', 'ការងាក្រៅម៉ោង', '150', 'គ្រូភាសាចិន', '2000-11-02', 9837374, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--
-- Error reading structure for table shcool.tbl_teacher: #1932 - Table &#039;shcool.tbl_teacher&#039; doesn&#039;t exist in engine
-- Error reading data for table shcool.tbl_teacher: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `shcool`.`tbl_teacher`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'kilin123456@gmail.com', '123456'),
(3, 'TochKilin@gmail.com', '1234'),
(4, 'dara1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schoolsm`
--
ALTER TABLE `schoolsm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cher`
--
ALTER TABLE `tbl_cher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schoolsm`
--
ALTER TABLE `schoolsm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cher`
--
ALTER TABLE `tbl_cher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
