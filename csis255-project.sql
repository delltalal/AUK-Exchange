-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 10:48 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csis255-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Phone_Num` bigint(20) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `Username`, `Fname`, `Lname`, `Email`, `Location`, `Phone_Num`, `Password`) VALUES
(1, 'hmdlhndi', 'Hamad', 'Al-hendi', 'hmdlhndi@auk.edu.kw', 'Qadsiya', 55776912, 'password'),
(2, 'yasmin.O', 'Yasmin', 'Al-Othman', 'yasmin123@auk.edu.kw', 'Salmiya', 50806776, 'pass123'),
(3, 'ahmad123', 'Ahmad', 'Al-Mutairi', 'almutairi@auk.edu.kw', 'Daiya', 50302332, 'wordpass');

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `ID` int(50) NOT NULL,
  `account_fk` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date_added` date NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`ID`, `account_fk`, `name`, `price`, `description`, `date_added`, `Image`, `Category`) VALUES
(1, 1, 'Biology Book', 10, 'A book for biology 100 course. Mint condition.', '2021-05-27', 'Biology-book.jpg', 'Textbook'),
(2, 1, 'CSIS 255 Book', 10, 'A CSIS 255 book with material about HTML and CSS. Very good condition.', '2021-05-27', 'CSIS255-book.jpg', 'Textbook'),
(3, 1, 'Used Macbook 2020', 200, 'Used Macbook 2020 with great specs:\r\n- M1 chipset.\r\n- 1TB storage\r\n\r\nSelling because I am buying a new one.', '2021-05-27', 'Macbook.jpg', 'Technology'),
(4, 2, 'Color-aid', 20, 'Color-aid paper that is used for ART 101. Very used but still useful for the course.', '2021-05-27', 'Color-aid.jpg', 'Stationery'),
(5, 3, 'Calculus II Book', 15, 'Calculus II book that can be used for MATH 203. Great condition.', '2021-05-27', 'Math-book.jpg', 'Textbook'),
(6, 3, 'CPEG 210 Book', 17, 'Book about digital design. Very useful for this course. ', '2021-05-27', 'CPEG210-book.jpg', 'Textbook'),
(7, 2, 'English 101 Book', 5, 'English book for ENGL 101. Very worn but still useable.', '2021-05-27', 'English-book.jpg', 'Textbook'),
(8, 3, 'Scientific Calculator', 10, 'Scientific calculator for the math courses. Used but still very useful and fully functional.', '2021-05-27', 'Scientific-calculator.jpg', 'Technology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `account_fk` (`account_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `listings_ibfk_1` FOREIGN KEY (`account_fk`) REFERENCES `accounts` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
