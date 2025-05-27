-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2025 at 10:23 AM
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
-- Database: `db_porto_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `address` text DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `photo` varchar(100) NOT NULL,
  `content` text DEFAULT NULL,
  `judul` varchar(256) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `name`, `date`, `address`, `code`, `email`, `phone`, `photo`, `content`, `judul`, `status`, `created_at`, `update_at`) VALUES
(1, 'hehe', '2025-05-24', NULL, NULL, 'fghdsf@gmail.com', NULL, 'stack-of-money.png', NULL, NULL, 0, '2025-05-24 08:12:15', '2025-05-27 06:58:35'),
(2, 'ray', '2025-05-26', NULL, NULL, 'ray@gmail.com', NULL, 'aneka-minuman-segar.jpg', NULL, NULL, 1, '2025-05-26 01:04:34', NULL),
(3, 'mas', '2025-05-26', '', NULL, 'mas@gmail.com', NULL, '852913_720.jpg', NULL, NULL, 1, '2025-05-26 04:11:20', NULL),
(4, 'mas', '2025-05-26', '', NULL, 'mas@gmail.com', NULL, '852913_720.jpg', NULL, NULL, 1, '2025-05-26 04:19:41', NULL),
(5, 'ter', '2025-05-26', 'jlan mawar', NULL, 'ter@gmail.com', NULL, 'jw.jpg', NULL, NULL, 1, '2025-05-26 04:44:48', NULL),
(6, 'key', '2025-05-27', 'Jl. Masjid Al-Mabruk III Jl. Raya Condet No.52, RT.12/RW.3, Balekambang, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13530', NULL, 'key123@gmail.com', NULL, 'jw.jpg', NULL, NULL, 0, '2025-05-27 07:07:24', NULL),
(7, 'jamet', '2025-05-03', 'karung kurang', NULL, 'jamet123@gmail.com', NULL, 'WhatsApp Image 2025-04-14 at 15.06.16.jpeg', NULL, NULL, 0, '2025-05-27 07:08:19', NULL),
(8, 'jamet', '2025-05-03', 'karung kurang', NULL, 'jamet123@gmail.com', NULL, 'jw.jpg', NULL, NULL, 0, '2025-05-27 07:18:40', NULL),
(9, 'jon', '1997-03-20', 'JL kuburan keramat', NULL, 'jamet123@gmail.com', NULL, 'jw.jpg', NULL, NULL, 1, '2025-05-27 07:28:16', NULL),
(10, 'JON', '1997-03-20', 'JL kuburan keramat', NULL, 'jon123@gmail.com', NULL, 'jw.jpg', NULL, NULL, 1, '2025-05-27 07:28:41', NULL),
(11, 'JON', '1997-03-20', 'JL kuburan keramat AWW', NULL, 'jon123@gmail.com', NULL, 'jw.jpg', NULL, NULL, 1, '2025-05-27 07:28:59', NULL),
(12, 'kon', '1997-03-20', 'JL kuburan keramat AWW', NULL, 'jon123@gmail.com', NULL, 'jw.jpg', NULL, NULL, 1, '2025-05-27 07:30:53', NULL),
(13, 'mon', '1997-03-20', 'JL kuburan keramat AWW', NULL, 'jon123@gmail.com', NULL, 'jw.jpg', NULL, NULL, 1, '2025-05-27 07:36:12', NULL),
(14, 'mhon', '1997-03-20', 'JL kuburan keramat AWW', NULL, 'jon123@gmail.com', NULL, 'jw.jpg', NULL, NULL, 1, '2025-05-27 07:36:27', NULL),
(15, 'mhon', '1997-03-20', 'JL kuburan keramat AWW', NULL, 'jon123@gmail.com', NULL, 'jw.jpg', NULL, NULL, 1, '2025-05-27 07:38:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `create_at`, `update_at`) VALUES
(1, 'zay', 'admin@gmail.com', 'asdasd', 'asdasd', '2025-05-26 05:06:45', NULL),
(2, 'Hura', 'Hura123@gmail.com', 'tolong kami', 'dasfsddfdfgdf', '2025-05-26 05:07:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `profile_name` varchar(45) DEFAULT NULL,
  `profesion` varchar(55) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `profile_name`, `profesion`, `description`, `photo`) VALUES
(4, 'JON', NULL, '                 <div style=\"text-align: left;\"><p data-start=\"0\" data-end=\"150\" style=\"text-align: left;\"><span class=\"relative -mx-px my-[-0.2rem] rounded px-px py-[0.2rem] transition-colors duration-100 ease-in-out\">badut yang tampan dan pemberani, bukan sekadar pelawak yang menghibur dengan tawa.</span> <span class=\"relative -mx-px my-[-0.2rem] rounded px-px py-[0.2rem] transition-colors duration-100 ease-in-out\">Di balik topeng ceria dan kostum warna-warni, terdapat tekad yang kuat untuk membawa kebahagiaan dan semangat kepada orang lain.</span> <span class=\"relative -mx-px my-[-0.2rem] rounded px-px py-[0.2rem] transition-colors duration-100 ease-in-out\">Setiap gerakan dan senyumku bukan hanya untuk mengundang tawa, tetapi juga untuk menunjukkan bahwa keberanian sejati datang dari kemampuan untuk menghadapi tantangan dengan hati yang tulus.</span></p>\r\n<p data-start=\"152\" data-end=\"390\" style=\"text-align: left;\"><span class=\"relative -mx-px my-[-0.2rem] rounded px-px py-[0.2rem] transition-colors duration-100 ease-in-out\">Sebagai badut, aku sering kali menjadi simbol dari harapan dan keceriaan, terutama bagi mereka yang sedang menghadapi kesulitan.</span> <span class=\"relative -mx-px my-[-0.2rem] rounded px-px py-[0.2rem] transition-colors duration-100 ease-in-out\">Namun, menjadi badut juga berarti menghadapi stigma dan tantangan tersendiri.</span> <span class=\"relative -mx-px my-[-0.2rem] rounded px-px py-[0.2rem] transition-colors duration-100 ease-in-out\">Seperti yang dialami oleh Andi, seorang badut muda yang harus bekerja keras untuk bertahan hidup, meskipun usianya masih sangat muda.</span> <span class=\"relative -mx-px my-[-0.2rem] rounded px-px py-[0.2rem] transition-colors duration-100 ease-in-out\">Meskipun sering kali diremehkan, aku tetap berdiri teguh, membuktikan bahwa di balik tawa yang kuberikan, terdapat keberanian dan ketulusan yang tak ternilai.</span></p></div>', '6833ee0cb48b5_jw.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_level`, `name`, `email`, `password`, `create_at`, `update_at`) VALUES
(1, 1, 'hamzah', 'admin@gmail.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', '2025-05-21 01:45:04', '2025-05-23 01:14:56'),
(2, 2, 'Hura123', 'Hura123@gmail.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', '2025-05-21 07:28:38', '2025-05-23 01:58:13'),
(11, 2, 'key', 'key123@gmail.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', '2025-05-27 02:54:16', '2025-05-27 06:46:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_level_to_level_id` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `id_level_to_level_id` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
