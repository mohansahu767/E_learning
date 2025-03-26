-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 12:10 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin_pass` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'ILearn', 'ilearn@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` text COLLATE utf8_bin NOT NULL,
  `course_desc` text COLLATE utf8_bin NOT NULL,
  `course_author` varchar(255) COLLATE utf8_bin NOT NULL,
  `course_img` text COLLATE utf8_bin NOT NULL,
  `course_duration` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_desc`, `course_author`, `course_img`, `course_duration`) VALUES
(23, 'Android', 'In the Android Developer Fundamentals course, you learn basic Android programming concepts and build a variety of apps, using the Java programming language.', 'Amit Kumar Biswas', '../image/courseimg/Android_Study.jpg', '3 month'),
(24, 'Computer Graphics', 'Learn to create images of 3D scenes in both real-time and with realistic ray tracing in this introductory computer graphics course.                                                                                           \r\n', 'Amit Kumar Biswas', '../image/courseimg/Computer_graphics.jpg', '3 month'),
(25, 'Computer Networks', 'This course covers basics & advanced topics in Computer Networking such as Software-Defined Networking (SDN), Data Center Networking and Content Distribution.', 'Amit Kumar Biswas', '../image/courseimg/Computer Network.jpg', '3 month'),
(26, 'C Programming', 'This C Programming Foundation self-paced course will help you master C Language from basic to advanced level.', 'Amit Kumar Biswas', '../image/courseimg/C Programming.jpg', '3 month'),
(27, 'Machine Learning', 'This course provides a broad introduction to machine learning and statistical pattern recognition.', 'Amit Kumar Biswas', '../image/courseimg/Machine.jpg', '3 month'),
(28, 'Artificial Intelligence', 'In this course you will learn how to embed intelligent behavior in machines with terms like ML , DL & Neural Networks.', 'Amit Kumar Biswas', '../image/courseimg/AI.jpg', '3 month'),
(29, 'Python Programming', 'This course aims to teach everyone the basics and advance of programming computers using Python.', 'Amit Kumar Biswas', '../image/courseimg/Python.jpg', '3 month'),
(32, 'PHP', 'This PHP training course introduces the PHP framework and syntax and covers in depth the most important techniques used to build dynamic Web sites.', 'Amit Kumar Biswas', '../image/courseimg/Php.jpg', '3 month');

-- --------------------------------------------------------

--
-- Table structure for table `courseorder`
--

CREATE TABLE `courseorder` (
  `co_id` int(11) NOT NULL,
  `order_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_bin NOT NULL,
  `respmsg` text COLLATE utf8_bin NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `courseorder`
--

INSERT INTO `courseorder` (`co_id`, `order_id`, `stu_email`, `course_id`, `status`, `respmsg`, `order_date`) VALUES
(24, 'ENROLL9880984', 'kk@gmail.com', 23, 'Success', 'Done', '2022-12-18'),
(25, 'ENROLL53414951', 'kk@gmail.com', 24, 'Success', 'Done', '2022-12-18'),
(26, 'ENROLL29563095', 'kk@gmail.com', 25, 'Success', 'Done', '2022-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_content` text COLLATE utf8_bin NOT NULL,
  `stu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_content`, `stu_id`) VALUES
(14, 'hi ', 185),
(16, 'This is helpful ', 185),
(17, 'plz upload python course', 186);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL,
  `lesson_name` text COLLATE utf8_bin NOT NULL,
  `lesson_desc` text COLLATE utf8_bin NOT NULL,
  `lesson_link` text COLLATE utf8_bin NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `lesson_name`, `lesson_desc`, `lesson_link`, `course_id`, `course_name`) VALUES
(72, 'Computer Network and Internet', '', '../lessonvid/', 25, 'Computer Networks'),
(73, 'Layer Architecture', '', '../lessonvid/', 25, 'Computer Networks'),
(74, 'Introduction to OSI Reference Model', '', '../lessonvid/', 25, 'Computer Networks'),
(75, 'OSI Layers Description', '', '../lessonvid/', 25, 'Computer Networks'),
(76, 'TCP-IP Reference Model', '', '../lessonvid/', 25, 'Computer Networks'),
(77, 'TCP', '', '../lessonvid/', 25, 'Computer Networks'),
(78, 'UDP', '', '../lessonvid/', 25, 'Computer Networks'),
(79, 'HTTP', '', '../lessonvid/', 25, 'Computer Networks'),
(80, 'HTTPS', '', '../lessonvid/', 25, 'Computer Networks'),
(81, 'Internet Addresssing', '', '../lessonvid/', 25, 'Computer Networks'),
(91, 'Installation of VSCode and gcc compiler ', '', '../lessonvid/', 26, 'C Programming'),
(92, 'Installation of Turbo C++ Compiler ', '', '../lessonvid/', 26, 'C Programming'),
(93, 'History & Introduction', '', '../lessonvid/', 26, 'C Programming'),
(94, 'Statement and Expression', '', '../lessonvid/', 26, 'C Programming'),
(95, 'C Programming- Introduction', '', '../lessonvid/', 26, 'C Programming'),
(96, 'Control Statement if-else', '', '../lessonvid/', 26, 'C Programming'),
(97, 'Logical Operator AND & OR', '', '../lessonvid/', 26, 'C Programming'),
(98, 'Logical Operator NOT', '', '../lessonvid/', 26, 'C Programming'),
(99, 'Conditional Operator', '', '../lessonvid/', 26, 'C Programming'),
(100, 'Type-Conversion (int-char)', '', '../lessonvid/', 26, 'C Programming'),
(101, 'Introduction', 'Android Introduction', '../lessonvid/Android_1_Intro.mp4', 23, 'Android'),
(102, 'Android Studio Installation', 'Android Studio Installation', '../lessonvid/Android_2_install.mp4', 23, 'Android'),
(103, 'Android Features', 'Android Features', '../lessonvid/Android_3_features.mp4', 23, 'Android'),
(104, 'Android Architecture', 'Android Architecture', '../lessonvid/', 23, 'Android'),
(105, 'Android Application Components', 'Android Application Components', '../lessonvid/', 23, 'Android'),
(106, 'New Project', 'New Project', '../lessonvid/', 23, 'Android'),
(107, 'Android Studio Open and Close Project', 'Android Studio Open and Close Project', '../lessonvid/', 23, 'Android'),
(108, 'Android Project File Structure', 'Android Project File Structure', '../lessonvid/', 23, 'Android'),
(109, 'Create AVD', 'Create AVD', '../lessonvid/', 23, 'Android'),
(110, 'Android Project Run', 'Android Project Run', '../lessonvid/', 23, 'Android'),
(111, 'Application of CG', 'Application of CG', '../lessonvid/CG_1.mp4', 24, 'Computer Graphics'),
(112, 'Display System', 'Display System', '../lessonvid/CG_2.mp4', 24, 'Computer Graphics'),
(113, 'CRT', 'CRT', '../lessonvid/', 24, 'Computer Graphics'),
(114, 'Color Monitor', 'Color Monitor', '../lessonvid/', 24, 'Computer Graphics'),
(115, 'DVST Monitor', 'DVST Monitor', '../lessonvid/', 24, 'Computer Graphics'),
(116, 'Coordinate Geometry', 'Coordinate Geometry', '../lessonvid/', 24, 'Computer Graphics'),
(117, 'Points in Coordinate Geometry', 'Points in Coordinate Geometry', '../lessonvid/', 24, 'Computer Graphics'),
(118, 'DDA Line Algorithm', 'DDA Line Algorithm', '../lessonvid/', 24, 'Computer Graphics'),
(119, 'DDA line different conditions', 'DDA line different conditions', '../lessonvid/', 24, 'Computer Graphics'),
(120, 'DDA Algorithm Numerical ', 'DDA Algorithm Numerical ', '../lessonvid/', 24, 'Computer Graphics'),
(121, 'DDA Numerical ', 'DDA Numerical ', '../lessonvid/', 24, 'Computer Graphics'),
(122, 'ad', 'aaaa', '../lessonvid/CG_1.mp4', 23, 'Android');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_email` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_pass` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_occ` varchar(255) COLLATE utf8_bin NOT NULL,
  `stu_img` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_name`, `stu_email`, `stu_pass`, `stu_occ`, `stu_img`) VALUES
(185, ' NN', 'nn@gmail.com', '1234', ' Student', '../image/stu/N_.jfif'),
(186, 'KK', 'kk@gmail.com', '1234', 'Student', '../image/stu/K.jfif'),
(187, '  VK', 'vk@gmail.com', '1234', '  Student', '../image/stu/V.jfif'),
(188, 'SS', 'ss@gmail.com', '1234', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `courseorder`
--
ALTER TABLE `courseorder`
  ADD PRIMARY KEY (`co_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `courseorder`
--
ALTER TABLE `courseorder`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
