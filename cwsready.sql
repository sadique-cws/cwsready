-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 04:47 AM
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
-- Database: `cwsready`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `image`, `description`) VALUES
(2, 'php advance', 'php.jpg', 'lorem epsum emmet'),
(3, 'news', 'f2297bb75a04b6088fd83b2887495ad6.jpg', 'dsjfhjsdf'),
(4, 'Wxpython  ( python )', 'takeaway.jpg', 'Wxpython  ( python )');

-- --------------------------------------------------------

--
-- Table structure for table `otp_expiry`
--

CREATE TABLE `otp_expiry` (
  `id` int(11) NOT NULL,
  `otp` int(11) NOT NULL,
  `is_expired` int(11) NOT NULL,
  `create_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otp_expiry`
--

INSERT INTO `otp_expiry` (`id`, `otp`, `is_expired`, `create_at`) VALUES
(1, 430333, 0, 2021),
(2, 968331, 0, 2021),
(3, 401002, 1, 2021),
(4, 804519, 0, 2021),
(5, 714015, 1, 2021),
(6, 925675, 0, 2021),
(7, 650940, 1, 2021),
(8, 565771, 0, 2021),
(9, 146681, 0, 2021),
(10, 128579, 1, 2021),
(11, 680580, 0, 2021),
(12, 610120, 1, 2021),
(13, 861828, 0, 2021),
(14, 987861, 0, 2021),
(15, 646929, 1, 2021),
(16, 476976, 1, 2021),
(17, 762243, 1, 2021),
(18, 751759, 1, 2021),
(19, 520170, 1, 2021),
(20, 753438, 0, 2021),
(21, 197302, 1, 2021),
(22, 279744, 1, 2021),
(23, 687149, 1, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date_of_payment` date DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `sc_id` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `due_months` varchar(255) NOT NULL,
  `pay_request` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `student_id`, `date_of_payment`, `amount`, `sc_id`, `status`, `due_months`, `pay_request`) VALUES
(24, 1, '2021-01-18', 700, 9, '1', '2021-01-01', '1'),
(25, 11, '2021-01-18', 700, 12, '1', '2021-01-18', '1');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `dp` varchar(200) NOT NULL,
  `status` enum('1','2','3') NOT NULL,
  `gender` enum('m','f','o') NOT NULL,
  `education` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `father_name`, `contact`, `email`, `dob`, `address`, `dp`, `status`, `gender`, `education`, `password`) VALUES
(1, 'Alok kumar', 'Udendra Kushawaha', '9113751193', 'kumaralok1884@gmail.com', '1998-12-26', 'Manjhali chowk near madhubani ', 'pp.jfif', '2', 'm', 'Bca Hons', '356a192b7913b04c54574d18c28d46e6395428ab'),
(11, 'chintu kumar', 'mr Akon', '7667119285', 'chintu@gmail.com', '2021-01-17', 'manjhali chowk', 'f2297bb75a04b6088fd83b2887495ad6.jpg', '2', 'm', 'Bca Hons', 'e42b14457aea216ab04a1a2174b57105b42cc5b4');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `date_of_join` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL,
  `course_request` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`id`, `student_id`, `course_id`, `date_of_join`, `status`, `course_request`) VALUES
(9, 1, 3, '2021-01-18 06:23:59', 0, '0'),
(10, 1, 2, '2021-01-17 17:46:47', 0, '0'),
(11, 1, 4, '2021-01-18 16:29:36', 0, '0'),
(12, 11, 4, '2021-01-19 03:07:02', 0, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_expiry`
--
ALTER TABLE `otp_expiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_payment` (`student_id`),
  ADD KEY `sc_payment` (`sc_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_sc` (`student_id`),
  ADD KEY `course_sc` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `otp_expiry`
--
ALTER TABLE `otp_expiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_course`
--
ALTER TABLE `student_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `sc_payment` FOREIGN KEY (`sc_id`) REFERENCES `student_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_payment` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `course_sc` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_sc` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
