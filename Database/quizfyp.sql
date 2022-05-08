-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 03:17 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizfyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `allowedgroup`
--

CREATE TABLE `allowedgroup` (
  `id` int(11) NOT NULL,
  `groupName` text NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allowedgroup`
--

INSERT INTO `allowedgroup` (`id`, `groupName`, `isActive`) VALUES
(1, 'CS', 1),
(4, 'SE', 1),
(5, 'SADasd', 1),
(6, 'asdasd', 1),
(7, 'ADEEL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `obtained`
--

CREATE TABLE `obtained` (
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `obtainedMarks` float NOT NULL,
  `remarks` text NOT NULL,
  `timeTaken` text NOT NULL,
  `date` text NOT NULL,
  `quizID` int(11) NOT NULL,
  `correct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obtained`
--

INSERT INTO `obtained` (`id`, `student`, `obtainedMarks`, `remarks`, `timeTaken`, `date`, `quizID`, `correct`) VALUES
(4, 19, 100, 'Excellent', '00:06', '20-4-2022', 98, 2),
(7, 19, 100, 'Excellent', '00:08', '20-4-2022', 99, 2);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `correct` text NOT NULL,
  `pic` text NOT NULL,
  `quizID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `a`, `b`, `c`, `d`, `correct`, `pic`, `quizID`) VALUES
(85, 'With Image', 'a', 'b', 'c', 'd', 'a', 'FKB.png', 98),
(86, 'Without Image', 'a', 'b', 'c', 'd', 'a', 'NULL', 98),
(87, 'With Image', 'a', 'b', 'c', 'd', 'a', '105e7243080e78fd2589d0615346e763-700.jpg', 99),
(88, 'Without Image', 'a', 'b', 'c', 'd', 'a', '', 99);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `QuizName` text NOT NULL,
  `grp` int(11) NOT NULL,
  `type` text NOT NULL,
  `total` int(11) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `QuizName`, `grp`, `type`, `total`, `isActive`) VALUES
(98, 'Final Try', 1, 'Goal Based', 2, 1),
(99, 'Quiz Checking', 1, 'Goal Based', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `grp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `Name`, `Email`, `Password`, `grp`) VALUES
(19, 'Adeel', 'adeel', '25d55ad283aa400af464c76d713c07ad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'adeel', '1234', ''),
(2, 'adeel', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowedgroup`
--
ALTER TABLE `allowedgroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obtained`
--
ALTER TABLE `obtained`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student` (`student`),
  ADD KEY `quizID` (`quizID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizID` (`quizID`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grp` (`grp`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grp` (`grp`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allowedgroup`
--
ALTER TABLE `allowedgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `obtained`
--
ALTER TABLE `obtained`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obtained`
--
ALTER TABLE `obtained`
  ADD CONSTRAINT `obtained_ibfk_1` FOREIGN KEY (`student`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `obtained_ibfk_2` FOREIGN KEY (`quizID`) REFERENCES `quiz` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quizID`) REFERENCES `quiz` (`id`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`grp`) REFERENCES `allowedgroup` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`grp`) REFERENCES `allowedgroup` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
