-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 03:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_add_nums`
--

CREATE TABLE `api_add_nums` (
  `id` int(11) NOT NULL,
  `api_cred_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `phone` bigint(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `api_add_nums`
--

INSERT INTO `api_add_nums` (`id`, `api_cred_id`, `created_at`, `updated_at`, `deleted_at`, `phone`) VALUES
(1, 1, NULL, NULL, NULL, 919747065788);

-- --------------------------------------------------------

--
-- Table structure for table `api_cred`
--

CREATE TABLE `api_cred` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `english_content` varchar(255) DEFAULT NULL,
  `arabic_content` longtext DEFAULT NULL,
  `media_url` varchar(255) NOT NULL,
  `instance_id` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `api_cred`
--

INSERT INTO `api_cred` (`id`, `url`, `english_content`, `arabic_content`, `media_url`, `instance_id`, `access_token`, `branch_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'https://pingerbot.in/api/send', 'Dear Valued Client,Thank you for choosing Bin Khamis International Trading Company as your wholesaler. Attached is your invoice. We appreciate your partnership and look forward to serving you again soon!', 'Dear Valued Client,Thank you for choosing Bin Khamis International Trading Company as your wholesaler. Attached is your invoice. We appreciate your partnership and look forward to serving you again soon!', 'https://pdf.wmsv4.stallionsoft.com/public/invoices/', '65D3031F5CA94', '65bb367d638b1', 1, 4, NULL, '2024-03-10 21:35:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_code` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_name`, `branch_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'svjg', '807696', '2024-03-10 09:52:33', '2024-03-10 16:12:57', NULL),
(2, 'ABC', NULL, '2024-03-10 16:22:59', NULL, NULL),
(3, 'WakkaBen', NULL, '2024-03-10 16:23:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ftp_cred`
--

CREATE TABLE `ftp_cred` (
  `id` int(11) NOT NULL,
  `server` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ftp_cred`
--

INSERT INTO `ftp_cred` (`id`, `server`, `user`, `password`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ftp.wmsv4.stallionsoft.com', 'user@pdf.wmsv4.stallionsoft.com', 'Pdfreader@123', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pdfpath`
--

CREATE TABLE `pdfpath` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `arabic_path` varchar(255) DEFAULT NULL,
  `english_path` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pdfpath`
--

INSERT INTO `pdfpath` (`id`, `branch_id`, `arabic_path`, `english_path`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'D:/2024/PDF/arabic/', 'D:/2024/PDF/english/', 4, NULL, '2024-03-10 20:30:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL COMMENT '1=>super admin,2=>admin,3=>user',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `branch_id`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ginu', 'ginu', 'jinuav07@gmail.com', '*ED609D7AF0508498757789DC2E087E35FDBEBBAD', NULL, 1, '2024-03-10 17:39:05', NULL, NULL),
(2, 'vishak', 'vishak', 'vishak@gmail.com', '*63846538BB18B6272942CD37D7A50EFD9A53F76A', 1, 3, '2024-03-10 19:29:33', '2024-03-10 19:46:06', '2024-03-10 19:53:03'),
(4, 'vishak', 'vishak', 'vishak@gmail.com', '*63846538BB18B6272942CD37D7A50EFD9A53F76A', 1, 3, '2024-03-10 19:53:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voice`
--

CREATE TABLE `voice` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `voice`
--

INSERT INTO `voice` (`id`, `name`) VALUES
(1, 'alexa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_add_nums`
--
ALTER TABLE `api_add_nums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_cred`
--
ALTER TABLE `api_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ftp_cred`
--
ALTER TABLE `ftp_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdfpath`
--
ALTER TABLE `pdfpath`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voice`
--
ALTER TABLE `voice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_add_nums`
--
ALTER TABLE `api_add_nums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `api_cred`
--
ALTER TABLE `api_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ftp_cred`
--
ALTER TABLE `ftp_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pdfpath`
--
ALTER TABLE `pdfpath`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `voice`
--
ALTER TABLE `voice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
