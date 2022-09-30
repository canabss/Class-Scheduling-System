-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql201.epizy.com
-- Generation Time: Feb 21, 2021 at 09:33 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_27914526_class_schedule`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `course_acronym` varchar(10) NOT NULL,
  `major` varchar(50) NOT NULL,
  `course_description` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_title`, `course_acronym`, `major`, `course_description`) VALUES
(2, 'Bachelor in Information Technology', 'BSIT', 'Programming ', 'Introduction to Programming'),
(4, 'Bachelor in Education', 'BE', 'General Education', 'General Education'),
(5, 'Bachelor in Education', 'BEED', 'General Education', 'General Education'),
(7, 'Bachelor  in ESports', 'BES', 'Major in professional eSports player', 'Introduction to eSports'),
(8, 'Bachelor of Arts in Hostory', 'AB HISTORY', 'History', 'History');

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `professor_id` varchar(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `rank` varchar(25) NOT NULL,
  `department` varchar(100) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`professor_id`, `fname`, `mname`, `lname`, `rank`, `department`, `type`) VALUES
('18500123', 'Jayson', 'Madrigal', 'Balate', 'Instructpr 1', 'Industrial and Information Technology Department', 'regular'),
('20-1234', 'Contine', 'Elto', 'Ginip', 'Instructor 1', 'Industrial and Information Technology Department', 'regular'),
('2020-1234', 'Mike', 'Dela Cruz', 'Santos', 'Instructpr 1', 'Industrial and Information Technology Department', 'regular'),
('2312', 'James', 'Artugue', 'Canaber', 'Instructor I', 'Industrial and Information Technology Department', 'part-time'),
('jajaha', 'Mark', 'Ariel', 'A', 'Larama', 'Business Administration Department', 'regular'),
('123456789', 'Sophia', 'Pacardo', 'Dvd', 'Asdsa', 'Business Administration Department', 'part-time');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_no` varchar(11) NOT NULL,
  `building_name` varchar(50) NOT NULL,
  `room_description` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_no`, `building_name`, `room_description`) VALUES
('109', 'Bldg A', 'Educ Bldg'),
('123123', '123', '123'),
('309', 'Bldg C', 'For Educ Students'),
('A 109', 'Bldg A', 'Something Educational'),
('A119', 'Bldg A', 'Multi Purpose Bldg'),
('uwu', 'Hshs', 'Ushs');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `schedule_id` int(11) NOT NULL,
  `room_no` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL,
  `day` varchar(25) NOT NULL,
  `time_in` varchar(10) NOT NULL,
  `time_out` varchar(10) NOT NULL,
  `section` varchar(25) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `academic_year` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `professor` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`schedule_id`, `room_no`, `department`, `day`, `time_in`, `time_out`, `section`, `semester`, `academic_year`, `subject`, `professor`) VALUES
(2, '123123', 'Industrial and Information Technology Department', 'Monday', '12:00 pm', '2:00 pm', 'IT3C', '1st', '2020-2021', 'Introduction to Computing', 'James Artugue Canaber'),
(3, '123123', 'Industrial and Information Technology Department', 'Tuesday', '7:00 am', '10:00 am', 'IT3CK', '2nd', '2020-2021', 'Introduction to Computing', 'James Artugue Canaber'),
(4, '109', 'Industrial and Information Technology Department', 'Monday', '4:30 pm', '5:30 pm', 'TWICE', '1st', '2020-2021', 'General Education', 'James Artugue Canaber'),
(5, '109', 'Industrial and Information Technology Department', 'Saturday', '11:30 am', '1:30 pm', '1A', '1st', '2020-2021', 'Introduction to Computing', 'Jayson Madrigal Balate'),
(6, '109', 'Industrial and Information Technology Department', 'Tuesday', '9:30 am', '11:00 am', 'IT1B', '1st', '2020-2021', 'Introduction to Computing', 'Contine Elto Ginip'),
(7, '109', 'Business Administration Department', 'Monday', '2:00 pm', '3:30 pm', '1A', '1st', '2020-2021', 'General Education', '1111 Arala A'),
(8, '109', 'Industrial and Information Technology Department', 'Monday', '8:00 am', '10:00 am', '3C', '1st', '2020-2021', 'Introduction to Computing', 'Mike Dela Cruz Santos'),
(13, 'A 109', 'Industrial and Information Technology Department', 'Tuesday', '7:00 am', '9:00 am', '3C', '1st', '2020-2021', 'Foreign Language 1', 'James Artugue Canaber'),
(10, 'A119', 'Industrial and Information Technology Department', 'Tuesday', '10:00 am', '12:00 pm', '3C', '1st', '2020-2021', 'General Education', 'Jayson Madrigal Balate'),
(11, '109', 'Industrial and Information Technology Department', 'Monday', '10:00 am', '1:00 pm', '3C', '1st', '2020-2021', 'Application Development and Emerging Twchnologies', 'Jayson Madrigal Balate');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `major` varchar(50) NOT NULL,
  `year_level` varchar(25) NOT NULL,
  `section` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `course_title`, `major`, `year_level`, `section`) VALUES
(1, 'Bachelor in Information Technology', 'Programming ', '1st', '3C'),
(2, 'Bachelor in Education', 'General Education', '2nd', '2B'),
(3, 'Bachelor in ESports', 'Gaming', '3rd', '1A'),
(4, 'Bachelor in Information Technology', 'Programming ', '1st', 'IT1A'),
(5, 'Bachelor in ESports', 'Major in professional eSports player', '1st', 'IT1B'),
(6, 'Bachelor in Information Technology', 'Programming ', '1st', 'IT1A');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `term` varchar(50) NOT NULL,
  `academic_year` varchar(50) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `term`, `academic_year`, `description`) VALUES
(1, '2nd', '2020-2021', 'Happyo'),
(6, '1st', '2020-2021', 'PANDEMIC STARTS');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` varchar(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `section` varchar(11) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `major` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `fname`, `mname`, `lname`, `age`, `gender`, `year`, `section`, `course_id`, `major`, `status`) VALUES
('00012', 'Andrea', 'B', 'Brillantes', 21, 'female', '1st', '1A', 'Bachelor in Information Technology', 'Programming ', 'regular'),
('0012', 'Peter', 'Spider', 'Man', 20, 'male', '1st', '1A', 'Bachelor in Information Technology', 'Programming ', 'regular'),
('0123', 'Mikaela', 'Johnson', 'Bataa', 19, 'female', '1st', '2B', 'Bachelor in Education', 'General Education', 'regular'),
('112', 'Dawd', 'Awrdaw', 'Dwada', 20, 'female', '1st', 'IT3C', 'dawd', 'Awdawd', 'irregular'),
('123456', 'Lester', 'Bernal', 'Villamor', 21, 'male', '3rd', 'TWICE', 'Bachelor in Information Technology', 'Programming ', 'regular'),
('18-500090', 'James', 'Aladin', 'Lebron', 21, 'male', '1st', 'TWICE', 'Bachelor in Education', 'General Education', 'regular'),
('2010123', 'Raymon', 'Dolor', 'Acun', 20, 'male', '1st', '1A', 'Bachelor in Information Technology', 'Programming ', 'regular'),
('2018-500895', 'Dawd', 'Awrdaw', 'Dwada', 21, 'female', '1st', 'IT3C', 'dawd', 'Awdawd', 'regular'),
('18500686', 'Lester', 'Bernal', 'Villamor', 21, 'male', '3rd', '3C', 'Bachelor in Information Technology', 'Programming ', 'regular'),
('18-500812', 'Juan', 'Dela', 'Cruz', 21, 'male', '3rd', '3C', 'Bachelor in Information Technology', 'Programming ', 'regular'),
('18500905', 'Rigor', 'Papa', 'Borcena', 20, 'male', '2nd', '3C', 'Bachelor in Information Technology', 'Programming ', 'regular');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_code` varchar(50) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `subject_description` varchar(100) NOT NULL,
  `course` varchar(50) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `year` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_code`, `subject_title`, `subject_description`, `course`, `semester`, `year`) VALUES
('AB ECO', 'Economics', 'Arts in Economics', 'Bachelor of Arts in Hostory', '1st', '2nd'),
('BACHELOR IN SCIENCE MAJOR IN HOTEL MANAGEMENT', 'BSHM', 'HOTEL MANAGEMENT', 'Bachelor in Education', '1st', '1st'),
('BE103', 'General Education', 'General Education', 'dawd', '1st', '1st'),
('BES101', 'Introduction to ESports', 'Introduction to eSports', 'Bachelor in ESports', '1st', '1st'),
('DWA', 'Introduction to Computing', 'Dwar', 'dawd', '2nd', '2nd'),
('IT 301', 'Application Development and Emerging Twchnologies', 'ADET', 'Bachelor in Information Technology', '1st', '3rd'),
('IT 302', 'Social and Professional Issues', 'SPI', 'Bachelor in Information Technology', '1st', '3rd'),
('IT 303', 'System Analysis and Design', 'SAD 1', 'Bachelor in Information Technology', '1st', '3rd'),
('IT 304', 'Web Systems and Technologies 1', 'WST 1', 'Bachelor in Information Technology', '1st', '3rd'),
('IT 305', 'Quantitative Methods', 'QM', 'Bachelor in Information Technology', '1st', '3rd'),
('IT 306', 'Elective 1', 'E1', 'Bachelor in Information Technology', '1st', '3rd'),
('IT 307', 'Elective 2', 'E2', 'Bachelor in Information Technology', '1st', '3rd'),
('FL 301', 'Foreign Language 1', 'FL1', 'Bachelor in Information Technology', '1st', '3rd');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, '2018-500895', '2018-500895', 'student'),
(3, '2312', '2312', 'professor'),
(4, '112', '112', 'student'),
(5, 'jajaha', 'jajaha', 'professor'),
(6, '2020-1234', '2020-1234', 'professor'),
(7, '18-500090', '18-500090', 'student'),
(8, '123456', '123456', 'student'),
(9, '18500123', '18500123', 'professor'),
(10, '0123', '0123', 'student'),
(11, '20-1234', '20-1234', 'professor'),
(12, '2010123', '2010123', 'student'),
(13, '0012', '0012', 'student'),
(14, '00012', '00012', 'student'),
(15, '18500686', '18500686', 'student'),
(16, '18-500812', '18-500812', 'student'),
(17, '18500905', '18500905', 'student'),
(18, '123456789', '123456789', 'professor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`professor_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_no`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_code`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
