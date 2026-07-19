-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 01:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `370project`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_number` int(11) NOT NULL,
  `sc` varchar(150) DEFAULT NULL,
  `pdf_file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_number`, `sc`, `pdf_file_path`) VALUES
(3, 'cse370', 'uploads/CSE331_Assignment_Fall_2023.pdf'),
(6, 'cse321', 'assignments/CSE370_Section_12_Quiz_3 (1).pdf'),
(7, 'cse321', 'assignments/CSE331_Assignment_Fall_2023 (1).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `sc` varchar(150) NOT NULL,
  `cname` varchar(250) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `sc`, `cname`, `image`) VALUES
(1, 'CSE111', 'Programming', 'Untitled design (1).jpg'),
(11, 'cse321', 'os', '394365657_271646269186797_5888373612969845879_n.jpg'),
(15, 'cse370', 'Database', '400084323_17864355237022330_1458363144282434364_n.jpg'),
(17, 'Mat216', 'Complex', 'asset-v1_buX+CSE370+2020_Fall+type@asset+block@database-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_number` int(11) NOT NULL,
  `sc` varchar(150) DEFAULT NULL,
  `pdf_file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_number`, `sc`, `pdf_file_path`) VALUES
(3, 'cse370', 'uploads/6579302661542.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` char(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` int(8) NOT NULL,
  `st_id` int(8) NOT NULL,
  `dept` char(20) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `password`, `st_id`, `dept`, `phone`) VALUES
(1, 'Ahanaf Tanvir', 'ahanaf.tanvir40@gmail.com', 12345, 12345, 'cse', '017'),
(2, 'Latif', 'latif@gmail.com', 1234, 1337, 'CSE', '01710000');

-- --------------------------------------------------------

--
-- Table structure for table `students_courses`
--

CREATE TABLE `students_courses` (
  `student_name` char(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `selected_course_1` varchar(100) NOT NULL,
  `selected_course_2` varchar(100) NOT NULL,
  `selected_course_3` varchar(100) NOT NULL,
  `grade_course_id_1` varchar(2) NOT NULL,
  `grade_course_id_2` varchar(2) NOT NULL,
  `grade_course_id_3` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students_courses`
--

INSERT INTO `students_courses` (`student_name`, `email`, `selected_course_1`, `selected_course_2`, `selected_course_3`, `grade_course_id_1`, `grade_course_id_2`, `grade_course_id_3`) VALUES
('Ahanaf Tanvir', 'ahanaf.tanvir40@gmail.com', 'CSE111', 'cse321', 'cse370', 'A', 'B', 'C'),
('Latif', 'latif@gmail.com', 'cse111', 'cse321', 'cse370', 'D', 'E', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `dept` varchar(256) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `password`, `teacher_id`, `dept`, `phone`) VALUES
(0, 'Abdul', 'abdul@g.bracu', '', 123, 'CSE', 17),
(0, 'rahim', 'rahim@gmail', '1234', 12345, 'CSE', 111),
(0, 'john', 'john@gmail.com', '1234', 2022, 'CSE', 199123123),
(0, 'johndoe', 'johndoe@gmail.com', '123', 2024, 'CSE', 12345);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_number`),
  ADD KEY `sc` (`sc`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`sc`),
  ADD UNIQUE KEY `idx_id` (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_number`),
  ADD KEY `sc` (`sc`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`sc`) REFERENCES `cms` (`sc`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`sc`) REFERENCES `cms` (`sc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
